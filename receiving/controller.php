<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$TranID="";
$RRID = "";
$cCode = "";
$cName = "";
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
$TranHead = new ReceivingHead();
$TranDetl = new ReceivingDetl();
$PODETL = new PurchaseOrderDetl();
$PRODUCTS = new Product();
$Stocks = new StockIn();
$Supplier = new Supplier();
$_SESSION['message'] = "";
$_SESSION['msgtype'] = "";
switch ($view) {
    case md5('add') :
        $bypass = false;
        $header='add';

        if ($TranHead->RRHpurchaseisnew("rrno",$_POST["RRNO"]) and $_POST["SUPPLIERID"] != "") {
            $supResult = $Supplier->single_supplier($_POST["SUPPLIERID"]);
            if ($supResult->suppname != "") {
                $arrayFields = "suppname,suppcode,SUPPLIERID, rrno,refno,entdate,terms,duedate, note,USERID,U_NAME,
                                FOREX, FOREXRATE, FORTOTAL";
                $formGet = array($supResult->suppname, $supResult->suppcode, $supResult->SUPPLIERID, $_POST["RRNO"], $_POST["refno"],
                    $_POST["entdate"], intval($_POST["terms"]), $_POST["duedate"],
                    $_POST["note"], $_SESSION["USERID"], $_SESSION["U_NAME"], $_POST["FOREX"], $_POST["FOREXRATE"],
                    $_POST["FORAMOUNT"]);
                if ($TranHead->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "Purchase Header Added...";

                    $TranID = $mydb->insert_id();

                    InsertPOSelection($mydb, $TranDetl, $TranHead, $PODETL, $TranID, $Stocks, $PRODUCTS);

                    InsertProductSelection($mydb, $TranDetl, $TranHead, $PODETL, $TranID, $Stocks, $PRODUCTS);

                    $TotalResult= $TranDetl->getTotal($TranID);

                    $TranHead->UpdateTotal($TranID, $TotalResult->TOTAL, $TotalResult->FORTOTAL );

                    $Supplier->UpdateBalance($supResult->SUPPLIERID, $TotalResult->TOTAL, 0 );

                }
            }
        }

        break;

    case md5('edit') :
        $bypass = false;
        $header='edit';
        $RRID  = $_POST['RRID'];
        $TranID  = $_POST['RRID'];
        $TranPID = $_POST["PID"];

        $HResult =$TranHead->single_purchasehorder($TranID);
        $oldTotal= $HResult->total;
        $supResult = $Supplier->single_supplier($_POST["SUPPLIERID"]);
        if ($HResult->RRID != "") {
            if ((isset($_POST["itemsave"]) || isset($_POST["saveSelection"]))) {

                if (isset($_POST["saveSelection"])) {
                    InsertPOSelection($mydb, $TranDetl, $TranHead, $PODETL, $TranID, $Stocks, $PRODUCTS);
                } else if ($_POST["PROID"] != "" && $TranPID == "") {

                    InsertProductSelection($mydb, $TranDetl, $TranHead, $PODETL, $TranID, $Stocks, $PRODUCTS);
                } else {
                    $DResult =$TranDetl->singleItemRecord($TranPID);

                    UpdateProductSelection($mydb, $TranDetl, $TranHead, $PODETL, $TranID, $Stocks, $PRODUCTS, $TranPID);
                }
                $TotalResult = $TranDetl->getTotal($TranID);
                $TranHead->UpdateTotal($TranID, $TotalResult->TOTAL, $TotalResult->FORTOTAL);
                $Supplier->UpdateBalance($supResult->SUPPLIERID, $TotalResult->TOTAL, $oldTotal);
            } else {
                //Update Header
                $arrayFields =array("refno","entdate","terms","duedate","note","FOREX","FOREXRATE");
                $formGet = array($_POST["refno"], $_POST["entdate"], intval($_POST["terms"]), $_POST["duedate"],
                    $_POST["note"],  $_POST["FOREX"], $_POST["FOREXRATE"]);
                if ($TranHead->updateSave($arrayFields, $formGet, $RRID)) {
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

        if ($DResult->PROID > 0 && $HResult->RRID >0 ) {
            // delete command
            $TranDetl->delete($pid);
            // Delete from stock index table
            $Stocks->deleteTPID($pid, "RR");
            //Update Inventory Qty from Product Table
            $PRODUCTS->qtydeduct($DResult->PROID, $DResult->QTY);
            //Update P.O. Product Qty received
            if ($DResult->POPID !=""){
                $PODETL->qtyreceiveddeduct($DResult->POPID, $DResult->QTY);
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
        if ( $HResult->RRID > 0 && ($HResult->DEBIT + $HResult->CREDIT + $HResult->PAIDAMT) == 0 ) {
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
                    $PODETL->qtyreceiveddeduct($DResult->POPID, $DResult->QTY);
                }
            }
            $TranDetl->deletePerTran($TranID);
            $TranHead->delete($TranID);
            //Update AP Balance from Supplier Table

            $Supplier->UpdateBalance($HResult->SUPPLIERID, 0, $HResult->total);
            $_SESSION['message'] = "Successfully Deleted Transaction... R.R. No.:".$TranID;

            $_SESSION['msgtype'] = "success";
            //$_SESSION['msgtype'] = "success";
            echo '{"type" : "success" }';


        }else {

            $_SESSION['message'] = "Unable to Delete Transaction... Related Payment/Debit/Credit Transaction found...";
            $_SESSION['msgtype'] = "error";
            //$_SESSION['msgtype'] = "success";
            echo '{"type" : "error" }';
        }
       //redirect("index.php?view=".$view);
        break;
    default :
        $header="";
        $_SESSION['message'] = "";
        $_SESSION['msgtype'] = "";
        redirect("index.php?view=".$view);

}
if (!$bypass) {
    if ($_SESSION['msgtype'] == "error") {
        echo $_SESSION['message'];
        if ($TranID != "") {
             redirect("index.php?view=" . md5('edit') . "&id=" . $TranID . "&pid=");
        } else {
            //   redirect("index.php?view=" . md5('add'));
        }
    } else {
         redirect("index.php?view=".md5('edit')."&id=".$TranID."&pid=");
    }
}





function InsertPOSelection($mydb, $TranDetl, $TranHead, $PODETL, $TranID, $Stocks, $PRODUCTS) {

    if (isset($_POST['selector']) ) {
        $selector = $_POST['selector'];
        $POPID = $_POST['POPIDselector'];
        for ($x = 0; $x < count($selector); $x++) {
            $Okey =  $selector[$x];

            $PODResult = $PODETL->singleTranProduct($POPID[$Okey]);
            $prodResult = $PRODUCTS->single_product($PODResult->PROID);
            if ($PODResult->PROID != "" && $prodResult->PROID != ""){


                $arrayFields = "RRID, POID, POPID, pono, RRNO, PROID, PRONAME, PROCODE , PURPRICE, QTY, AMOUNT, UNIT, QTYPERBOX, 
                         FLOORPRICE, FLOORRATE, SUPPITEM, FORPURPRICE,FORAMOUNT";
                $QTY = ($PODResult->QTY - $PODResult->QTYRECEIVED);
                $TOTAL = ($QTY * $PODResult->PURPRICE);
                $FORTOTAL = ($QTY * $PODResult->FORPURPRICE);

                $formGet = array($TranID, $PODResult->POID, $PODResult->Id,$PODResult->pono, $_POST["RRNO"], $prodResult->PROID,
                    $prodResult->PRONAME, $prodResult->PROCODE, $PODResult->PURPRICE, $QTY , $TOTAL, $PODResult->UNIT,
                    $PODResult->QTYPERBOX, $PODResult->FLOORPRICE, $PODResult->FLOORRATE, $PODResult->SUPPITEM,
                    $PODResult->FORPURPRICE, $FORTOTAL);

                if ($TranDetl->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "<br>Added ";
                    $_SESSION['message'] .= " Product:".$PODResult->PRONAME;
                    $_SESSION['msgtype'] = "success";

                    $RRPID = $mydb->insert_id();
                    //Update P.O. Product Qty
                    $PODETL->qtyreceivedplus($PODResult->Id, $QTY);


                    //Update Product Qty
                    $PRODUCTS->qtyplus($prodResult->PROID, $QTY);

                    //Insert to tblStockIn
                    $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYIN, PRICE, USERID";
                    $formGet = array($_POST["entdate"], $TranID, $RRPID, "RR", $_POST["RRNO"], $prodResult->PROID,  $QTY,
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

}

function InsertProductSelection($mydb, $TranDetl, $TranHead, $PODETL, $TranID, $Stocks, $PRODUCTS)
{
    if (isset($_POST['PROID']) && $_POST['PROID'] != "" && $_POST['PROID'] != "" && $_POST['QTY']>0) {
        //Insert Record selected P.O. Item
        if ($_POST["pono"]!="" && $_POST['POPID'] !=""){
            $PODResult = $PODETL->singleTranProduct($_POST['POPID']);
            $prodResult = $PRODUCTS->single_product($PODResult->PROID);
            if ($PODResult->PROID != "" && $prodResult->PROID != ""){
                 $arrayFields = "RRID, POID, POPID, pono, RRNO, PROID, PRONAME, PROCODE , PURPRICE, QTY, AMOUNT, UNIT, QTYPERBOX, 
                         FLOORPRICE, FLOORRATE, SUPPITEM, FORPURPRICE,FORAMOUNT";
                 $formGet = array($TranID, $PODResult->POID, $PODResult->Id,$PODResult->pono, $_POST["RRNO"], $prodResult->PROID,
                    $prodResult->PRONAME, $prodResult->PROCODE, $_POST["PURPRICE"], $_POST["QTY"] , $_POST["AMOUNT"], $_POST["UNIT"],
                    $_POST["QTYPERBOX"], $_POST["FLOORPRICE"], $_POST["FLOORRATE"],$_POST["SUPPITEM"],
                    $_POST["FORPURPRICE"], $_POST["FORAMOUNT"]);

                if ($TranDetl->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "<br>Added ";
                    $_SESSION['message'] .= " Product:".$PODResult->PRONAME;
                    $_SESSION['msgtype'] = "success";

                    $RRPID = $mydb->insert_id();
                    //Update P.O. Product Qty
                    $PODETL->qtyreceivedplus($PODResult->Id, $_POST["QTY"]);

                    //Update Product Qty
                    $PRODUCTS->qtyplus($prodResult->PROID, $_POST["QTY"]);

                    //Insert to tblStockIn
                    $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYIN, PRICE, USERID";
                    $formGet = array($_POST["entdate"], $TranID, $RRPID, "RR", $_POST["RRNO"], $prodResult->PROID,  $_POST["QTY"],
                        $_POST["PURPRICE"], $_SESSION["USERID"]);
                    $Stocks->create($arrayFields, $formGet);

                }else{
                    $_SESSION['message'] .= "<br>Error while inserting products to database...";
                    $_SESSION['message'] .= "<br>Product ID:".$PODResult->PROID;
                    $_SESSION['message'] .= "<br>Name:".$PODResult->PRONAME;
                    $_SESSION['msgtype'] = "error";
                }

            } else {
                $_SESSION['message'] .= "<br>Product Not Found!!!";
                $_SESSION['message'] .= "<br>Product ID:".$_POST["PROID"];
                $_SESSION['message'] .= " Name:".$_POST["PRONAME"];
                $_SESSION['msgtype'] = "error";
            }
        }else{

            $prodResult = $PRODUCTS->single_product($_POST['PROID']);
            if ($prodResult->PROID != ""  ){
                $arrayFields = "RRID,   RRNO, PROID, PRONAME, PROCODE , PURPRICE, QTY, AMOUNT, UNIT, QTYPERBOX, 
                         FLOORPRICE, FLOORRATE, SUPPITEM, FORPURPRICE,FORAMOUNT";
                $formGet = array($TranID,  $_POST["RRNO"], $prodResult->PROID,
                    $prodResult->PRONAME, $prodResult->PROCODE, $_POST["PURPRICE"], $_POST["QTY"] , $_POST["AMOUNT"], $_POST["UNIT"],
                    $_POST["QTYPERBOX"], $_POST["FLOORPRICE"], $_POST["FLOORRATE"],$_POST["SUPPITEM"],
                    $_POST["FORPURPRICE"], $_POST["FORAMOUNT"]);

                if ($TranDetl->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "<br>Added ";
                    $_SESSION['message'] .= " Product:".$prodResult->PRONAME;
                    $_SESSION['msgtype'] = "success";

                    $RRPID = $mydb->insert_id();

                    //Update Product Qty
                    $PRODUCTS->qtyplus($prodResult->PROID, $_POST["QTY"]);

                    //Insert to tblStockIn
                    $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYIN, PRICE, USERID";
                    $formGet = array($_POST["entdate"], $TranID, $RRPID, "RR", $_POST["RRNO"], $prodResult->PROID,  $_POST["QTY"],
                        $_POST["PURPRICE"], $_SESSION["USERID"]);

                    $Stocks->create($arrayFields, $formGet);

                }{
                    $_SESSION['message'] .= "<br>Error while inserting products to database...";
                    $_SESSION['message'] .= "<br>Product ID:".$prodResult->PROID;
                    $_SESSION['message'] .= " Name:".$prodResult->PRONAME;
                    $_SESSION['msgtype'] = "error";
                }

            } else {
                $_SESSION['message'] .= "<br>Product Not Found!!!";
                $_SESSION['message'] .= "<br>Product ID:".$_POST["PROID"];
                $_SESSION['message'] .= " Name:".$_POST["PRONAME"];
                $_SESSION['msgtype'] = "error";
            }

        }


    }else{
        $_SESSION['message'] .= "<br>Invalid Product Entry";
        $_SESSION['message'] .= "<br>Product ID:".$_POST["PROID"];
        $_SESSION['message'] .= " Name:".$_POST["PRONAME"];
        $_SESSION['msgtype'] = "error";
    }
}
function UpdateProductSelection($mydb, $TranDetl, $TranHead, $PODETL, $TranID, $Stocks, $PRODUCTS,$TranPID)
{
    echo $TranPID . " - ".$_POST['PROID'] ;
    if ( $TranPID !="") {
        $arrayFields = array("PURPRICE","QTY","AMOUNT","UNIT","QTYPERBOX","FLOORPRICE","FLOORRATE","SUPPITEM","FORPURPRICE","FORAMOUNT");
        $formGet = array( $_POST["PURPRICE"], $_POST["QTY"] , $_POST["AMOUNT"], $_POST["UNIT"], $_POST["QTYPERBOX"],
            $_POST["FLOORPRICE"], $_POST["FLOORRATE"],$_POST["SUPPITEM"], $_POST["FORPURPRICE"], $_POST["FORAMOUNT"]);

        if ($TranDetl->updateSave($arrayFields, $formGet, $TranPID)) {
            //Update Product Qty
            $PRODUCTS->qtyplus($_POST['PROID'], $_POST['QTY']);
            $PRODUCTS->qtydeduct($_POST['PROID'], $_POST['OLDQTY']);

            //Update P.O. Product Qty
            if ($_POST['POPID'] !="" && $_POST['POPID'] != "0") {
                $PODETL->qtyreceivedplus($_POST['POPID'], $_POST['QTY']);
                $PODETL->qtyreceiveddeduct($_POST['POPID'], $_POST['OLDQTY']);
            }

            //Insert to tblStockIn
            $arrayFields = array("ENTDATE",    "TNO",   "QTYIN", "PRICE");
            $formGet = array($_POST["entdate"],  $_POST["RRNO"],  $_POST['QTY'], $_POST['PURPRICE'] );
            $Stocks->updateSave($arrayFields, $formGet, $TranPID,"RR");
            $_SESSION['message'] .= "<br>Finished Saving Receiving Product ";
            $_SESSION['message'] .= "<br>Product Name: ".$_POST["PRONAME"];
            $_SESSION['msgtype'] = "success";
        }
    }
}


?>


