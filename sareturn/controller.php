<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$SRID = "";
$SRHead = new SalesReturnHead();
$SRDetl = new SalesReturnDetl();
$SODetl = new SalesOrderDetl();
$SOHead = new SalesOrderHead();
$PRODUCTS = new Product();
$Stocks = new StockIn();
$Customer = new Customer();

$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
$_SESSION['message'] = "";
$_SESSION['msgtype'] = "ssss";

if ($view == md5('add') || $view == md5('edit') ) {

    $PROPRICE = str_replace( ',', '', $_POST["PROPRICE"] );
    $DISCAMT = str_replace( ',', '', $_POST["DISCAMT"] );
    $DAMOUNT = str_replace( ',', '', $_POST["AMOUNT"] );
    $OLDAMOUNT = str_replace( ',', '', $_POST["OLDAMOUNT"] );


    $TNO = $_POST["SRNO"];

    $SRNO = $_POST["SRNO"];

}
$LESSTOACCT = "0";
$DDATE = "0000-00-00";
if (isset($_POST["LESSTOACCOUNT"]) ){
    $LESSTOACCT = $_POST["LESSTOACCOUNT"];
    $DDATE = $_POST["DEDUCTDATE"];
}

switch ($view) {
    case md5('add') :
        $bypass = false;
        $header='add';
        $header=$view;
        $invdrcount = 0;




        if ($_POST["CUSTOMERID"]!="" and $_POST["CUSTNAME"]!="" and $SRNO != "" )
        {
            // SRHEADER INSERT PROCEDURE
            $arrayFields = "CUSTNAME,CUSTCODE,CUSTOMERID,SRNO,REFNO,ENTDATE, NOTE,USERID,U_NAME,
                             CHECKEDBY, LESSTOACCOUNT,DEDUCTDATE";
            $formGet = array($_POST["CUSTNAME"], $_POST["CUSTCODE"], $_POST["CUSTOMERID"], $SRNO, $_POST["REFNO"],
                             $_POST["ENTDATE"],   $_POST["NOTE"],$_SESSION["USERID"],$_SESSION["U_NAME"],
                             $_POST["CHECKEDBY"],$LESSTOACCT,$DDATE);

            if ($SRHead->create($arrayFields, $formGet)) {
                $SRID = $mydb->insert_id();
                $_SESSION['message'] .= "Added Sales Return Header/Customer Details...<BR>";
                if ($_POST["PROID"]!= "" and $_POST["PROCODE"]!= "" and $_POST["PRONAME"]!= "" && $_POST["QTY"] <> "0" && $_POST["QTY"] != "") {

                    // SRDETAIL INSERT PROCEDURE
                    $result = $PRODUCTS->single_product($_POST["PROID"]);
                    $arrayFields = "SRID,INVOICENO,DRNO,SLSPID,PROID,PRONAME,PROCODE,PROPRICE, DISCPER,DISCAMT,QTY, AMOUNT,UNIT";
                    $formGet = array($SRID, $_POST["INVOICENO"],  $_POST["DRNO"], $_POST["SLSPID"], $_POST["PROID"],
                            $result->PRONAME, $result->PROCODE, $PROPRICE, $_POST["DISCPER"], $DISCAMT, $_POST["QTY"],
                            $DAMOUNT,$_POST["UNIT"]);
                    if ($SRDetl->create($arrayFields, $formGet)) {
                        $SRPID = $mydb->insert_id();

                        //Update Product Inventory / Qty Onhand
                        $PRODUCTS->qtyplus($_POST["PROID"],$_POST["QTY"]);

                        //Update Sales Detl Return Qty
                        $SODetl->updateSRQTY($_POST["SLSPID"],$_POST["QTY"],0);

                        $result = $SRDetl->getSalesTotal($SRID);
                        $SRHead->UpdateTotal($SRID, $result->TOTAL, $result->TOTAL);


                        if ($LESSTOACCT =="1" ) {

                            //Update Accounts Receivable Return Amount
                            if ( $_POST["SLSPID"] != "") {
                                $SOHead->updateAMT($_POST["SLSPID"], "SRAMT", $DAMOUNT, 0);
                            }
                            //Update Customer Balance - Less Return
                            $Customer->UpdateBalance($_POST["CUSTOMERID"], 0, $DAMOUNT);
                        }
                        //Insert product movent in StockIn - Stock Card
                        $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYIN, PRICE, USERID";
                        $formGet = array($_POST["ENTDATE"], $SRID, $SRPID, "SR",  $TNO,  $_POST['PROID'],$_POST['QTY'],
                            $PROPRICE, $_SESSION["USERID"]);
                        $Stocks->create($arrayFields, $formGet);

                        $_SESSION['message'] .= "Product Details Added...";
                        $_SESSION['msgtype'] = "success";

                    }else{
                        $_SESSION['message'] .= "Unable to Add Product Details... Saving Process Terminated...";
                        $_SESSION['msgtype'] = "error";

                    }

                }else{
                    $_SESSION['message'] .= "Invalid Product Details... Saving Process Terminated... <br>";
                    $_SESSION['message'] .= "Product : ".$_POST["PRONAME"]."<br>";
                    $_SESSION['message'] .= "Code : ".$_POST["PROCODE"]."<br>";
                    $_SESSION['message'] .= "QTY : ".$_POST["QTY"]."<br>";

                    $_SESSION['msgtype'] = "error";

                }


            } else {
                $_SESSION['message'] = "Unable to Add New Invoice!!!";
                $_SESSION['msgtype'] = "error";

            }
        }else {
            $_SESSION['message'] = "Invalid Customer/Invoice/Delivery Entry!!!<br>";
            $_SESSION['message'] .= "Customer   : ".$_POST["CUSTNAME"]."<br>";
            $_SESSION['message'] .= "Customer ID: ".$_POST["CUSTOMERID"]."<br>";
            $_SESSION['message'] .= "S.R. No.: ".$SRNO."<br>";
            $_SESSION['msgtype'] = "error";
         }

        break;
    case md5('edit') :
        $bypass = false;
        $header='edit';
        $header=$view;
        $SRID  = $_POST['SRID'];
        $SRPID = $_POST["PID"];
        $_SESSION['message'] ="";
        $cCode = "";
        $cName = "";

         if (isset($_POST["itemsave"]) ) {
             if ($_POST["PROID"] != ""  && $_POST["PRONAME"] != "" && $_POST["PROCODE"] != "" && $_POST["QTY"] <> "0" && $_POST["QTY"] != "" ) {
                 $result = $PRODUCTS->single_product($_POST["PROID"]);

                 if ($SRPID != "" ) {
                     // Update SR Details
                     $arrayFields = array(  "PROPRICE",  "DISCPER", "DISCAMT", "QTY", "AMOUNT","UNIT");
                     $formGet = array( $PROPRICE, $_POST["DISCPER"], $DISCAMT, $_POST["QTY"], $DAMOUNT,$_POST["UNIT"] );
                     if ($SRDetl->updateSave($arrayFields, $formGet, $_POST["PID"])) {

                         // Update Product Inventory/Qty Onhand (return qty)
                         $PRODUCTS->qtyplus($_POST["PROID"],$_POST["QTY"]);
                         $PRODUCTS->qtydeduct($_POST["PROID"],$_POST["OLDQTY"]);

                         if ($LESSTOACCT =="1" ) {

                             //Update Accounts Receivable Return Amount
                             if (  $_POST["SLSPID"] != "") {
                                 $SOHead->updateAMT($_POST["SLSPID"], "SRAMT", $DAMOUNT, $OLDAMOUNT);
                             }
                             $Customer->UpdateBalance($_POST["OLDCUSTOMERID"], $OLDAMOUNT, $DAMOUNT);
                         }
                         //Update Stock Card Table
                         $arrayFields = array("ENTDATE", "TID", "TPID", "TTYPE", "TNO", "PROID", "QTYIN", "PRICE", "USERID");
                         $formGet = array($_POST["ENTDATE"], $SRID, $SRPID, "SR",  $TNO,  $_POST['PROID'],$_POST['QTY'], $PROPRICE, $_SESSION["USERID"]);
                         $Stocks->updateSave($arrayFields, $formGet, $SRPID,"SR" );

                         $_SESSION['message'] .= "Product Save... ";
                         $_SESSION['msgtype'] = "success";
                     } else {
                         $_SESSION['message'] .= "Unable to Save Product... ";
                         $_SESSION['msgtype'] = "error";
                     }
                 }
                 else {
                     $result = $PRODUCTS->single_product($_POST["PROID"]);
                     // Update SR Details
                     $arrayFields = "SRID,SLSPID,PROID,PRONAME,PROCODE,PROPRICE, DISCPER,DISCAMT,QTY, AMOUNT,UNIT,INVOICENO,DRNO";
                     $formGet = array($SRID,$_POST["SLSPID"], $_POST["PROID"], $result->PRONAME, $result->PROCODE, $PROPRICE, $_POST["DISCPER"],
                         $DISCAMT, $_POST["QTY"], $DAMOUNT,$_POST["UNIT"], $_POST["INVOICENO"], $_POST["DRNO"] );
                     if ($SRDetl->create($arrayFields, $formGet)) {
                         $SRPID = $mydb->insert_id();

                         // Update Product Inventory/Qty Onhand (return qty)
                         $PRODUCTS->qtyplus($_POST["PROID"], $_POST["QTY"]);
                         if ($LESSTOACCT =="1"  ) {
                             //Update Accounts Receivable Return Amount
                             if ($_POST["SLSPID"] != "") {
                                 $SOHead->updateAMT($_POST["SLSPID"], "SRAMT", $DAMOUNT, 0);
                             }
                             $Customer->UpdateBalance($_POST["OLDCUSTOMERID"], 0, $DAMOUNT);
                         }

                         $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYIN, PRICE, USERID";
                         $formGet = array($_POST["ENTDATE"], $SRID, $SRPID, "SR",  $TNO,  $_POST['PROID'],$_POST['QTY'], $PROPRICE, $_SESSION["USERID"]);
                         $Stocks->create($arrayFields, $formGet);


                         $_SESSION['message'] .= "Product Details Added...";
                         $_SESSION['msgtype'] = "success";

                     }else{
                         $_SESSION['message'] .= "Unable to Add Product Details... Saving Process Terminated...";
                         $_SESSION['msgtype'] = "error";

                     }

                 }
                 if ($_SESSION['msgtype'] == "success") {
                     $result = $SRDetl->getSalesTotal($SRID);
                     $SRHead->UpdateTotal($SRID, $result->TOTAL, $result->TOTAL);

                 }

             }else{
                 $_SESSION['message'] .= "Invalid Product Details... Saving Process Terminated... <br>";

                 $_SESSION['message'] .= "Product : ".$_POST["PRONAME"]."<br>";
                 $_SESSION['message'] .= "Code : ".$_POST["PROCODE"]."<br>";
                 $_SESSION['message'] .= "QTY : ".$_POST["QTY"]."<br>";

                 $_SESSION['msgtype'] = "error";

             }
         } else {

             $arrayFields = array("CUSTNAME","CUSTCODE","CUSTOMERID",  "REFNO","ENTDATE",
                            "NOTE","USERID","U_NAME", "CHECKEDBY", "LESSTOACCOUNT","DEDUCTDATE");
             $formGet = array($_POST["CUSTNAME"], $_POST["CUSTCODE"], $_POST["CUSTOMERID"],  $_POST["REFNO"],
                 $_POST["ENTDATE"], $_POST["NOTE"], $_SESSION["USERID"],$_SESSION["U_NAME"], $_POST["CHECKEDBY"],
                 $LESSTOACCT, $_POST["DEDUCTDATE"] );

             if ($SRHead->updateSave($arrayFields, $formGet,$_POST["SRID"])) {
                 if ($_POST["CUSTOMERID"] != $_POST["OLDCUSTOMERID"]){
                     $SDresult = $SRDetl->getSalesTotal($_POST["SRID"]);

                 }


                 $_SESSION['message'] .= "Updated Sales Invoice...";
                 $_SESSION['msgtype'] = "success";

             }


         }




        break;
    case md5('itemdelete') :
        $bypass = false;
        $SRID = $_GET['id'];
        $header='itemdelete';
        $header=$view;
        $pid = $_GET['pid'];
        $SDresult = $SRDetl->single_iteminvoice($pid);

        $SRDetl->delete($pid);
        $PRODUCTS->qtydeduct($SDresult->PROID,$SDresult->QTY);


        $_SESSION['message'] = "Deleted Sales Product...";
        $_SESSION['msgtype'] = "success";

        $SDresult2 = $SRDetl->getSalesTotal($_GET['id']);




        $Stocks->deleteTPID($pid,"SR");

        $TOTAL = 0;
        $TOTAL = $TOTAL + $SDresult2->TOTAL;
        $SHresult = $SRHead->single_tran($_GET['id']);
        if ($SHresult->LESSTOACCOUNT =="1" ) {
            //Update Accounts Receivable Return Amount
            if ($SDresult->SLSPID > 0 ) {
                $SOHead->updateAMT($SDresult->SLSPID, "SRAMT", 0, $SDresult->AMOUNT);
            }
            $Customer->UpdateBalance($SHresult->CUSTOMERID ,$SHresult->TOTAL, $TOTAL );
        }


        $SRHead->UpdateTotal($SRID, $TOTAL, $TOTAL);


        break;
    case md5('delete') :
        $bypass = true;
        $header='delete';
        $header=$view;

        $cur = $SRDetl->listofSReturnPerID($_GET['id']);
        $total ="0";
        foreach ($cur as $result) {

            $PRODUCTS->qtyplus($result->PROID,$result->QTY);

            $Stocks->deleteTPID($result->SRPID, "SR");

            if ($SHresult-> LESSTOACCOUNT =="1" ) {
                //Update Accounts Receivable Return Amount
                if ( $result->SLSPID > 0) {
                    $SOHead->updateAMT($result->SLSPID, "SRAMT", 0, $result->AMOUNT);
                }
            }
        }
        $SHresult = $SRHead->single_tran($_GET['id']);
        if ($SHresult-> LESSTOACCOUNT =="1"  )
        {
            //Update Accounts Receivable Return Amount


            $Customer->UpdateBalance($SHresult->CUSTOMERID ,$SHresult->TOTAL, $TOTAL );
        }


        $SRDetl->deleteInvoice($_GET['id']);
        $SRHead->delete($_GET['id']);
        //$_SESSION['message'] = "Sales Deleted...";
        //$_SESSION['msgtype'] = "success";
        echo '{"type" : "success" }';
        break;
    default :
        $_SESSION['message'] = "";
        $_SESSION['msgtype'] = "";
        redirect("index.php?view=".$view);

}
if (!$bypass) {
    if ($_SESSION['msgtype'] == "error") {
        echo $_SESSION['message'];
        redirect("index.php?view=" . md5('edit') . "&id=" . $SRID . "&pid=");

    } else {
        redirect("index.php?view=" . md5('edit') . "&id=" . $SRID . "&pid=");
    }
}
?>
