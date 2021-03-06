<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$TranID="";
$PRID = "";
$cCode = "";
$cName = "";
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
$TranHead = new PuReturnHead();
$TranDetl = new PuReturnDetl();
$RRDetl = new ReceivingDetl();
$PRODUCTS = new Product();
$Stocks = new StockIn();
$Supplier = new Supplier();
$_SESSION['message'] = "";
$_SESSION['msgtype'] = "";
switch ($view) {
    case md5('add') :
        $bypass = false;
        $header='add';

        if ($TranHead->PRHisnew("prno",$_POST["PRNO"]) and $_POST["SUPPLIERID"] != "") {
            $supResult = $Supplier->single_supplier($_POST["SUPPLIERID"]);
            if ($supResult->suppname != "") {
                $arrayFields = "suppname,suppcode,SUPPLIERID, prno,refno,entdate,  note,USERID,U_NAME";
                $formGet = array($supResult->suppname, $supResult->suppcode, $supResult->SUPPLIERID, $_POST["PRNO"], $_POST["refno"],
                    $_POST["entdate"],  $_POST["note"], $_SESSION["USERID"], $_SESSION["U_NAME"]);
                if ($TranHead->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "Purchase Return Header Added...";

                    $TranID = $mydb->insert_id();

                    InsertProductSelection($mydb, $TranDetl, $TranHead, $RRDetl, $TranID, $Stocks, $PRODUCTS);

                    $TotalResult= $TranDetl->getTotal($TranID);

                    $TranHead->UpdateTotal($TranID, $TotalResult->TOTAL );

                    $Supplier->UpdateBalance($supResult->SUPPLIERID, 0 , $TotalResult->TOTAL );

                }
            }
        }

        break;

    case md5('edit') :
        $bypass = false;
        $header='edit';
        $PRID  = $_POST['PRID'];
        $TranID  = $_POST['PRID'];
        $TranPID = $_POST["PID"];

        $HResult =$TranHead->singleTranID($TranID);
        $oldTotal= $HResult->total;
        $supResult = $Supplier->single_supplier($_POST["SUPPLIERID"]);
        if ($HResult->PRID != "") {
            if ((isset($_POST["itemsave"]) || isset($_POST["saveSelection"]))) {

                if (isset($_POST["saveSelection"])) {
                    InsertPOSelection($mydb, $TranDetl, $TranHead, $RRDetl, $TranID, $Stocks, $PRODUCTS);
                } else if ($_POST["PROID"] != "" && $TranPID == "") {

                    InsertProductSelection($mydb, $TranDetl, $TranHead, $RRDetl, $TranID, $Stocks, $PRODUCTS);
                } else {
                  //  $DResult =$TranDetl->singleItemRecord($TranPID);

                    UpdateProductSelection($mydb, $TranDetl, $TranHead, $RRDetl, $TranID, $Stocks, $PRODUCTS, $TranPID);
                }
                $TotalResult = $TranDetl->getTotal($TranID);
                $TranHead->UpdateTotal($TranID, $TotalResult->TOTAL );
                $Supplier->UpdateBalance($supResult->SUPPLIERID, $TotalResult->TOTAL, $oldTotal);
            } else {
                //Update Header
                $arrayFields =array("refno","entdate","terms","duedate","note" );
                $formGet = array($_POST["refno"], $_POST["entdate"], intval($_POST["terms"]), $_POST["duedate"],
                    $_POST["note"] );
                if ($TranHead->updateSave($arrayFields, $formGet, $PRID)) {
                    $_SESSION['message'] .= "Finished Saving Receiving Header ID:" . $TranID;
                    $_SESSION['msgtype'] = "success";

                }else {
                    $_SESSION['message'] .= "Error Update Receiving Header ID:" . $TranID;
                    $_SESSION['msgtype'] = "error";
                }
            }
        }else {
            $_SESSION['message'] = "Invalid Receiving Report ID:" . $TranID;
            $_SESSION['msgtype'] = "error";
        }

        break;
    case md5('itemdelete') :
        $bypass = false;
        $header='itemdelete';
        $pid = $_GET['pid'];
        $TranID = $_GET['id'];
        $DResult =$TranDetl->singleItemRecord($pid);
        $HResult =$TranHead->single_purchasehorder($TranID);

        if ($DResult->PROID > 0 && $HResult->PRID >0 ) {
            // delete command
            $TranDetl->delete($pid);
            // Delete from stock index table
            $Stocks->deleteTPID($pid, "RR");
            //Update Inventory Qty from Product Table
            $PRODUCTS->qtydeduct($DResult->PROID, $DResult->QTY);
            //Update P.O. Product Qty received
            if ($DResult->POPID !=""){
                $RRDetl->qtyreceiveddeduct($DResult->POPID, $DResult->QTY);
            }

            //Update RR Total
            $TotalResult = $TranDetl->getTotal($TranID);
            $TOTAL= 0 + $TotalResult->TOTAL;
            $FORTOTAL= 0 + $TotalResult->FORTOTAL;
            $TranHead->UpdateTotal($TranID, $TOTAL, $FORTOTAL);

            //Update AP Balance from Supplier Table
            $Supplier->UpdateBalance($HResult->SUPPLIERID, 0, $DResult->AMOUNT);

            $_SESSION['message'] = "Deleted Product : " . $DResult->PRONAME;
            $_SESSION['msgtype'] = "success";
        }else {

            $_SESSION['message'] = "Unable to Delete... Invalid Product/Transaction ID";

            $_SESSION['msgtype'] = "error";
        }

        break;
    case md5('delete') :
        $header='delete';
        $TranID=$_GET['id'];
        $HResult =$TranHead->single_purchasehorder($TranID);
        if ( $HResult->PRID > 0 && ($HResult->DEBIT + $HResult->CREDIT + $HResult->PAIDAMT) == 0 ) {
            $cur = $TranDetl->listPerTransID($TranID);
            foreach ($cur as $DResult) {
                // delete command
                $TranDetl->delete($DResult->Id);
                // Delete from stock index table
                $Stocks->deleteTPID($DResult->Id, "RR");
                //Update Inventory Qty from Product Table
                $PRODUCTS->qtydeduct($DResult->PROID, $DResult->QTY);
                //Update P.O. Product Qty received
                if ($DResult->POPID !=""){
                    $RRDetl->qtyreceiveddeduct($DResult->POPID, $DResult->QTY);
                }
            }
            $TranDetl->deletePerTran($TranID);
            $TranHead->delete($TranID);
            //Update AP Balance from Supplier Table

            $Supplier->UpdateBalance($HResult->SUPPLIERID, 0, $HResult->total);
           // $_SESSION['message'] = "Successfully Deleted Transaction... R.R. No.:".$TranID;

           // $_SESSION['msgtype'] = "success";
            //$_SESSION['msgtype'] = "success";
            echo '{"type" : "success" }';


        }else {

            $_SESSION['message'] = "Unable to Delete Transaction... Related Payment/Debit/Credit Transaction found...";
            $_SESSION['msgtype'] = "error";
            //$_SESSION['msgtype'] = "success";
            echo '{"type" : "error" }';

        }

        break;
    default :
        $header="";
        $_SESSION['message'] = "";
        $_SESSION['msgtype'] = "";
        redirect("index.php?view=".$view);

}
if (!$bypass) {
    if ($_SESSION['msgtype'] == "error") {
     //   echo $_SESSION['message'];
        if ($TranID != "") {
             redirect("index.php?view=" . md5('edit') . "&id=" . $TranID . "&pid=");
        } else {
             redirect("index.php?view=" . md5('add'));
        }
    }  else if ($_SESSION['msgtype'] == "success") {
        redirect("index.php?view=" . md5('edit') . "&id=" . $TranID . "&pid=");
    }
}





function InsertPOSelection($mydb, $TranDetl, $TranHead, $RRDetl, $TranID, $Stocks, $PRODUCTS) {
/*
    if (isset($_POST['selector']) ) {
        $selector = $_POST['selector'];
        $POPID = $_POST['POPIDselector'];
        for ($x = 0; $x < count($selector); $x++) {
            $Okey =  $selector[$x];

            $PODResult = $RRDetl->singleTranProduct($POPID[$Okey]);
            $prodResult = $PRODUCTS->single_product($PODResult->PROID);
            if ($PODResult->PROID != "" && $prodResult->PROID != ""){


                $arrayFields = "PRID, POID, POPID, pono, PRNO, PROID, PRONAME, PROCODE , PURPRICE, QTY, AMOUNT, UNIT, QTYPERBOX, 
                         FLOORPRICE, FLOORRATE, SUPPITEM, FORPURPRICE,FORAMOUNT";
                $QTY = ($PODResult->QTY - $PODResult->QTYRECEIVED);
                $TOTAL = ($QTY * $PODResult->PURPRICE);
                $FORTOTAL = ($QTY * $PODResult->FORPURPRICE);

                $formGet = array($TranID, $PODResult->POID, $PODResult->Id,$PODResult->pono, $_POST["PRNO"], $prodResult->PROID,
                    $prodResult->PRONAME, $prodResult->PROCODE, $PODResult->PURPRICE, $QTY , $TOTAL, $PODResult->UNIT,
                    $PODResult->QTYPERBOX, $PODResult->FLOORPRICE, $PODResult->FLOORRATE, $PODResult->SUPPITEM,
                    $PODResult->FORPURPRICE, $FORTOTAL);

                if ($TranDetl->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "<br>Added ";
                    $_SESSION['message'] .= " Product:".$PODResult->PRONAME;
                    $_SESSION['msgtype'] = "success";

                    $RRPID = $mydb->insert_id();
                    //Update P.O. Product Qty
                    $RRDetl->qtyreceivedplus($PODResult->Id, $QTY);


                    //Update Product Qty
                    $PRODUCTS->qtyplus($prodResult->PROID, $QTY);

                    //Insert to tblStockIn
                    $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYIN, PRICE, USERID";
                    $formGet = array($_POST["entdate"], $TranID, $RRPID, "RR", $_POST["PRNO"], $prodResult->PROID,  $QTY,
                        $PODResult->PURPRICE, $_SESSION["USERID"]);
                    $Stocks->create($arrayFields, $formGet);
                }else{
                    $_SESSION['message'] .= "<br>Error while inserting products to database...";
                    $_SESSION['message'] .= "<br>Product ID:".$PODResult->PROID;
                    $_SESSION['message'] .= "<br>Name:".$PODResult->PRONAME;
                    $_SESSION['msgtype'] = "error";
                }

            } else {
                $_SESSION['message'] .= "<br>Product Not Found!!!";
                $_SESSION['message'] .= "<br>Product ID:".$PODResult->PROID;
                $_SESSION['message'] .= " Name:".$PODResult->PRONAME;
                $_SESSION['msgtype'] = "error";
            }
        }
    }
*/
}

function InsertProductSelection($mydb, $TranDetl, $TranHead, $RRDetl, $TranID, $Stocks, $PRODUCTS)
{
    echo isset($_POST["saveSelection"])? $_POST['PROID'] . $_POST['QTY']: "aaaaa".$_POST['RRPID'];
    if (isset($_POST['PROID']) && $_POST['PROID'] != "" && $_POST['PROID'] != "" && floatval( $_POST['QTY'])>0) {

        //Insert Record selected P.O. Item
        if ($_POST["rrno"]!="" && $_POST['RRPID'] !=""){
            $RRDResult = $RRDetl->singleItemRecord($_POST['RRPID']);
            $prodResult = $PRODUCTS->single_product($RRDResult->PROID);
            if ($RRDResult->PROID != "" && $prodResult->PROID != ""){
                 $arrayFields = "PRID,   RRPID, rrno, PRNO, PROID, PRONAME, PROCODE , PURPRICE, QTY, AMOUNT, UNIT";
                 $formGet = array($TranID,   $RRDResult->Id,$RRDResult->rrno, $_POST["PRNO"], $prodResult->PROID,
                    $prodResult->PRONAME, $prodResult->PROCODE, $_POST["PURPRICE"], $_POST["QTY"] , $_POST["AMOUNT"], $_POST["UNIT"]);

                if ($TranDetl->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "<br>Added ";
                    $_SESSION['message'] .= " Product:".$RRDResult->PRONAME;
                    $_SESSION['msgtype'] = "success";

                    $PRID = $mydb->insert_id();
                    //Update P.O. Product Qty
                    $RRDetl->updateQtyReturned($RRDResult->Id, $_POST["QTY"],0);

                    //Update Product Qty
                    $PRODUCTS->qtyplus($prodResult->PROID, $_POST["QTY"]);

                    //Insert to tblStockIn
                    $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYOUT, PRICE, USERID";
                    $formGet = array($_POST["entdate"], $TranID, $PRID, "PR", $_POST["PRNO"], $prodResult->PROID,  $_POST["QTY"],
                        $_POST["PURPRICE"], $_SESSION["USERID"]);
                    $Stocks->create($arrayFields, $formGet);

                }else{
                    $_SESSION['message'] .= "<br>Error while inserting products to database...";
                    $_SESSION['message'] .= "<br>Product ID:".$RRDResult->PROID;
                    $_SESSION['message'] .= "<br>Name:".$RRDResult->PRONAME;
                    $_SESSION['msgtype'] = "error";
                }

            } else {
                $_SESSION['message'] .= "<br>Product Not Found!!!";
                $_SESSION['message'] .= "<br>Product ID:".$_POST["PROID"];
                $_SESSION['message'] .= "<br>Name:".$_POST["PRONAME"];
                $_SESSION['msgtype'] = "error";
            }
        } else {

            $_SESSION['message'] .= "<br>Error" .$_POST["rrno"]. " / " .$_POST['RRPID'] ;
            $_SESSION['message'] .= "<br>Product ID:".$_POST["PROID"];
            $_SESSION['message'] .= "<br> Name:".$_POST["PRONAME"];
            $_SESSION['msgtype'] = "error";
        }
        /*
        else{

            $prodResult = $PRODUCTS->single_product($_POST['PROID']);
            if ($prodResult->PROID != ""  ){
                $arrayFields = "PRID,   PRNO, PROID, PRONAME, PROCODE , PURPRICE, QTY, AMOUNT, UNIT";
                $formGet = array($TranID,  $_POST["PRNO"], $prodResult->PROID,
                    $prodResult->PRONAME, $prodResult->PROCODE, $_POST["PURPRICE"], $_POST["QTY"] , $_POST["AMOUNT"], $_POST["UNIT"]);

                if ($TranDetl->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "<br>Added ";
                    $_SESSION['message'] .= " Product:".$prodResult->PRONAME;
                    $_SESSION['msgtype'] = "success";

                    $PRID = $mydb->insert_id();

                    //Update Product Qty
                    $PRODUCTS->qtyplus($prodResult->PROID, $_POST["QTY"]);

                    //Insert to tblStockIn
                    $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYOUT, PRICE, USERID";
                    $formGet = array($_POST["entdate"], $TranID, $PRID, "PR", $_POST["PRNO"], $prodResult->PROID,  $_POST["QTY"],
                        $_POST["PURPRICE"], $_SESSION["USERID"]);

                    $Stocks->create($arrayFields, $formGet);

                }{
                    $_SESSION['message'] .= "<br>Error while inserting products to database...";
                    $_SESSION['message'] .= "<br>Product ID:".$prodResult->PROID;
                    $_SESSION['message'] .= "<br>Name:".$prodResult->PRONAME;
                    $_SESSION['msgtype'] = "error";
                }

            } else {
                $_SESSION['message'] .= "<br>Product Not Found!!!";
                $_SESSION['message'] .= "<br>Product ID:".$_POST["PROID"];
                $_SESSION['message'] .= " Name:".$_POST["PRONAME"];
                $_SESSION['msgtype'] = "error";
            }

        }
        */

    }else{
        $_SESSION['message'] .= "<br>Invalid Product Entry";
        $_SESSION['message'] .= "<br>Product ID:".$_POST["PROID"];
        $_SESSION['message'] .= " Name:".$_POST["PRONAME"];
        $_SESSION['msgtype'] = "error";
    }
}
function UpdateProductSelection($mydb, $TranDetl, $TranHead, $RRDetl, $TranID, $Stocks, $PRODUCTS,$TranPID)
{
    //echo $TranPID . " - ".$_POST['PROID'] ;
    if ( $TranPID !="") {
        /*
        $QTYPERBOX = isset($_POST["QTYPERBOX"])? $_POST["QTYPERBOX"] : "0";
        $FLOORPRICE = isset($_POST["FLOORPRICE"])? $_POST["FLOORPRICE"] : "0";
        $FLOORRATE = isset($_POST["FLOORRATE"])? $_POST["FLOORRATE"] : "0";
        $SUPPITEM = isset($_POST["SUPPITEM"])? $_POST["SUPPITEM"] : "0";
        $FORPURPRICE = isset($_POST["FORPURPRICE"])? $_POST["FORPURPRICE"] : "0";
        $FORAMOUNT = isset($_POST["FORAMOUNT"])? $_POST["FORAMOUNT"] : "0";

        $arrayFields = array("PURPRICE","QTY","AMOUNT","UNIT","QTYPERBOX","FLOORPRICE","FLOORRATE","SUPPITEM","FORPURPRICE","FORAMOUNT");
        $formGet = array( $_POST["PURPRICE"], $_POST["QTY"] , $_POST["AMOUNT"], $_POST["UNIT"], $QTYPERBOX,
            $FLOORPRICE, $FLOORRATE,$SUPPITEM, $FORPURPRICE, $FORAMOUNT);
        */
        $arrayFields = array("PURPRICE", "QTY", "AMOUNT", "UNIT");
        $formGet = array( $_POST["PURPRICE"], $_POST["QTY"] , $_POST["AMOUNT"], $_POST["UNIT"]);

        if ($TranDetl->updateSave($arrayFields, $formGet, $TranPID)) {
            //Update Product Qty
            $PRODUCTS->qtyplus($_POST['PROID'], $_POST['QTY']);
            $PRODUCTS->qtydeduct($_POST['PROID'], $_POST['OLDQTY']);

            //Update R.R. Product Qty
            if ($_POST['RRPID'] !="" && $_POST['RRPID'] != "0") {
                $RRDetl->updateQtyReturned($_POST['RRPID'], $_POST['QTY'],$_POST['OLDQTY']);

            }

            //Insert to tblStockIn
            $arrayFields = array("ENTDATE",    "TNO",   "QTYIN", "PRICE");
            $formGet = array($_POST["entdate"],  $_POST["PRNO"],  $_POST['QTY'], $_POST['PURPRICE'] );
            $Stocks->updateSave($arrayFields, $formGet, $TranPID,"RR");
            $_SESSION['message'] .= "<br>Finished Saving Receiving Product ";
            $_SESSION['message'] .= "<br>Product Name: ".$_POST["PRONAME"];
            $_SESSION['msgtype'] = "success";
        }
    }
}


?>


