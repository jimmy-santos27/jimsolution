<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$slsID = "";
$newSOH = new SalesOrderHead();
$newSOD = new SalesOrderDetl();
$PRODUCTS = new Product();
$Stocks = new StockIn();
$Customer = new Customer();


$_SESSION['message'] = "";
$_SESSION['msgtype'] = "ssss";
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
if ($view == md5('add') || $view == md5('edit') ) {

    $PROPRICE = str_replace( ',', '', $_POST["PROPRICE"] );
    $DISCAMT = str_replace( ',', '', $_POST["DISCAMT"] );
    $DAMOUNT = str_replace( ',', '', $_POST["AMOUNT"] );
    $OLDAMOUNT = "0";
    if ($view == md5('edit')) {
        $OLDAMOUNT = str_replace(',', '', $_POST["OLDAMOUNT"]);
    }


    $TNO = $_POST["INVOICENO"];

    $INVOICENO = $_POST["INVOICENO"];
    $DRNO = $_POST["DRNO"];
    IF ($_POST["SLSTYPE"] == "2") {
        //$invdrcount = $newSOH->isDRInvoiceNew("DRNO", $_POST["DRNO"] );
        $mydb->setQuery("SELECT  count(DRNO) as invdrno FROM tblslshead where  DRNO= '" . $_POST["DRNO"] . "' group by DRNO   order by DRNO  LIMIT 1 ");
        $cur = $mydb->loadResultList();

        foreach ($cur as $result) {
            $invdrcount = $result->invdrno;
        }

        $TNO = $_POST["DRNO"];
    } else {
        //$invdrcount = $newSOH->isDRInvoiceNew("INVOICENO",$_POST["INVOICENO"]);
        $mydb->setQuery("SELECT  count(INVOICENO) as invdrno FROM tblslshead where  INVOICENO= '" . $_POST["INVOICENO"] . "' group by INVOICENO   order by INVOICENO  LIMIT 1 ");
        $cur = $mydb->loadResultList();

        foreach ($cur as $result) {
            $invdrcount = $result->invdrno;
        }

    }
}

switch ($view) {
    case md5('add') :
        $bypass = false;
        $header='add';
        $header=$view;
        $invdrcount = 0;



        if ($invdrcount >0){
            IF ($_POST["SLSTYPE"] == "2"){
                $DRNO = $newSOH->lastInvoiceDR("DRNO" );
                $TNO = $DRNO;
                $_SESSION['message'] = "D.R. No. : ".$_POST["DRNO"] . " Already Used while saving... New D.R.: ".$DRNO."...<br>";
            }else {
                $INVOICENO = $newSOH->lastInvoiceDR("INVOICENO" );
                $_SESSION['message'] = "Invoice No. : ".$_POST["DRNO"] . " Already Used while saving... New Invoice No.: ".$INVOICENO."...<br>";
                $TNO = $INVOICENO;
            }
        }

        if ($_POST["CUSTOMERID"]!="" and $_POST["CUSTNAME"]!="" and ($INVOICENO != "" or $DRNO !=""))
        {

            $arrayFields = "CUSTNAME,CUSTCODE,CUSTOMERID,INVOICENO,DRNO,REFNO,ENTDATE,TERMS,DUEDATE, NOTE,USERID,U_NAME,
                            INVDATE,DRDATE,SLSTYPE,SMANNAME, SALESMANID, DELIVEREDBY";
            $formGet = array($_POST["CUSTNAME"], $_POST["CUSTCODE"], $_POST["CUSTOMERID"], $INVOICENO, $DRNO,
                            $_POST["REFNO"], $_POST["ENTDATE"], intval($_POST["TERMS"]), $_POST["DUEDATE"],
                            $_POST["NOTE"],$_SESSION["USERID"],$_SESSION["U_NAME"], $_POST["INVDATE"],
                            $_POST["DRDATE"], $_POST["SLSTYPE"], $_POST["SMANNAME"], $_POST["SALESMANID"],  $_POST["DELIVEREDBY"]);


            if ($newSOH->create($arrayFields, $formGet)) {
                $slsID = $mydb->insert_id();
                $_SESSION['message'] .= "Added Sales Header/Customer Details...<BR>";
                if ($_POST["PROID"]!= "" and $_POST["PROCODE"]!= "" and $_POST["PRONAME"]!= "" && $_POST["QTY"] <> "0" && $_POST["QTY"] != "") {

                    $result = $PRODUCTS->single_product($_POST["PROID"]);

                    $arrayFields = "SLSID,PROID,PRONAME,PROCODE,PROPRICE, DISCPER,DISCAMT,QTY, AMOUNT,UNIT";
                    $formGet = array($slsID, $_POST["PROID"], $result->PRONAME, $result->PROCODE, $PROPRICE,
                          $_POST["DISCPER"], $DISCAMT, $_POST["QTY"], $DAMOUNT,$_POST["UNIT"]);
                    if ($newSOD->create($arrayFields, $formGet)) {
                        $slsPID = $mydb->insert_id();

                        $PRODUCTS->qtydeduct($_POST["PROID"],$_POST["QTY"]);

                        $Customer->UpdateBalance($_POST["CUSTOMERID"],$DAMOUNT,0);
                        $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYOUT, PRICE, USERID";
                        $formGet = array($_POST["ENTDATE"], $slsID, $slsPID, "SA",  $TNO,  $_POST['PROID'],$_POST['QTY'], $PROPRICE, $_SESSION["USERID"]);
                        $Stocks->create($arrayFields, $formGet);

                        $result = $newSOD->getSalesTotal($slsID);
                        $newSOH->UpdateTotal($slsID, $result->TOTAL, $result->TOTAL);
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
            $_SESSION['message'] .= "Invoice No.: ".$INVOICENO."<br>";
            $_SESSION['message'] .= "D.R. No.   : ".$DRNO."<br>";
            $_SESSION['msgtype'] = "error";
            $_SESSION['message'] .= " Customer Code Already Exist!!!";

        }

        break;
    case md5('edit') :
        $bypass = false;
        $header='edit';
        $header=$view;
        $slsID  = $_POST['SLSID'];
        $slsPID = $_POST["PID"];
        $_SESSION['message'] ="";
        $cCode = "";
        $cName = "";

         if (isset($_POST["itemsave"]) ) {
             if ($_POST["PROID"] != ""  && $_POST["PRONAME"] != "" && $_POST["PROCODE"] != "" && $_POST["QTY"] <> "0" && $_POST["QTY"] != "" ) {
                 $result = $PRODUCTS->single_product($_POST["PROID"]);

                 if ($slsPID != "" ) {
                     $arrayFields = array(  "PROPRICE",  "DISCPER", "DISCAMT", "QTY", "AMOUNT","UNIT");
                     $formGet = array( $PROPRICE, $_POST["DISCPER"], $DISCAMT, $_POST["QTY"], $DAMOUNT,$_POST["UNIT"]);
                     if ($newSOD->updateSave($arrayFields, $formGet, $_POST["PID"])) {

                         $PRODUCTS->qtyplus($_POST["PROID"],$_POST["OLDQTY"]);
                         $PRODUCTS->qtydeduct($_POST["PROID"],$_POST["QTY"]);


                         $Customer->UpdateBalance($_POST["OLDCUSTOMERID"],$DAMOUNT,$OLDAMOUNT);

                         $arrayFields = array("ENTDATE", "TID", "TPID", "TTYPE", "TNO", "PROID", "QTYOUT", "PRICE", "USERID");
                         $formGet = array($_POST["ENTDATE"], $slsID, $slsPID, "SA",  $TNO,  $_POST['PROID'],$_POST['QTY'], $PROPRICE, $_SESSION["USERID"]);
                         $Stocks->updateSave($arrayFields, $formGet, $slsPID,"SA" );

                         $_SESSION['message'] .= "Product Save... ";
                         $_SESSION['msgtype'] = "success";
                     } else {
                         $_SESSION['message'] .= "Unable to Save Product... ";
                         $_SESSION['msgtype'] = "error";
                     }
                 }
                 else {
                     $result = $PRODUCTS->single_product($_POST["PROID"]);

                     $arrayFields = "SLSID,PROID,PRONAME,PROCODE,PROPRICE, DISCPER,DISCAMT,QTY, AMOUNT,UNIT";
                     $formGet = array($slsID, $_POST["PROID"], $result->PRONAME, $result->PROCODE, $PROPRICE,
                         $_POST["DISCPER"], $DISCAMT, $_POST["QTY"], $DAMOUNT,$_POST["UNIT"]);
                     if ($newSOD->create($arrayFields, $formGet)) {
                         $slsPID = $mydb->insert_id();

                         $PRODUCTS->qtydeduct($_POST["PROID"],$_POST["QTY"]);

                         $Customer->UpdateBalance($_POST["OLDCUSTOMERID"],$DAMOUNT,0);

                         $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYOUT, PRICE, USERID";
                         $formGet = array($_POST["ENTDATE"], $slsID, $slsPID, "SA",  $TNO,  $_POST['PROID'],$_POST['QTY'], $PROPRICE, $_SESSION["USERID"]);
                         $Stocks->create($arrayFields, $formGet);


                         $_SESSION['message'] .= "Product Details Added...";
                         $_SESSION['msgtype'] = "success";

                     }else{
                         $_SESSION['message'] .= "Unable to Add Product Details... Saving Process Terminated...";
                         $_SESSION['msgtype'] = "error";

                     }

                 }
                 if ($_SESSION['msgtype'] == "success") {
                     $result = $newSOD->getSalesTotal($slsID);
                     $newSOH->UpdateTotal($slsID, $result->TOTAL, $result->TOTAL);

                 }

             }else{
                 $_SESSION['message'] .= "Invalid Product Details... Saving Process Terminated... <br>";

                 $_SESSION['message'] .= "Product : ".$_POST["PRONAME"]."<br>";
                 $_SESSION['message'] .= "Code : ".$_POST["PROCODE"]."<br>";
                 $_SESSION['message'] .= "QTY : ".$_POST["QTY"]."<br>";

                 $_SESSION['msgtype'] = "error";

             }
         } else {

             $arrayFields = array("CUSTNAME","CUSTCODE","CUSTOMERID","INVOICENO","DRNO","REFNO","ENTDATE","TERMS","DUEDATE", "NOTE","USERID","U_NAME",
                            "INVDATE","DRDATE", "SMANNAME","SALESMANID","DELIVEREDBY");
             $formGet = array($_POST["CUSTNAME"], $_POST["CUSTCODE"], $_POST["CUSTOMERID"], $INVOICENO, $DRNO, $_POST["REFNO"], $_POST["ENTDATE"], intval($_POST["TERMS"]),
                 $_POST["DUEDATE"],  $_POST["NOTE"], $_SESSION["USERID"],$_SESSION["U_NAME"], $_POST["INVDATE"],
                 $_POST["DRDATE"],  $_POST["SMANNAME"], $_POST["SALESMANID"], $_POST["DELIVEREDBY"]);

             if ($newSOH->updateSave($arrayFields, $formGet,$_POST["SLSID"])) {
                 if ($_POST["CUSTOMERID"] != $_POST["OLDCUSTOMERID"]){
                     $SDresult = $newSOD->getSalesTotal($_POST["SLSID"]);

                     $Customer->UpdateBalance($_POST["CUSTOMERID"],$SDresult->TOTAL,0);
                     $Customer->UpdateBalance($_POST["OLDCUSTOMERID"],0,$SDresult->TOTAL);
                 }


                 $_SESSION['message'] .= "Updated Sales Invoice...";
                 $_SESSION['msgtype'] = "success";

             }


         }




        break;
    case md5('itemdelete') :
        $bypass = false;
        $slsID = $_GET['id'];
        $header='itemdelete';
        $header=$view;
        $pid = $_GET['pid'];
        $SDresult = $newSOD->single_iteminvoice($pid);

        $newSOD->delete($pid);
        $PRODUCTS->qtyplus($SDresult->PROID,$SDresult->QTY);


        $_SESSION['message'] = "Deleted Sales Product...";
        $_SESSION['msgtype'] = "success";

        $SDresult = $newSOD->getSalesTotal($_GET['id']);




        $Stocks->deleteTPID($pid,"SA");

        $TOTAL = 0;
        $TOTAL = $TOTAL + $SDresult->TOTAL;
        $SHresult = $newSOH->single_invoice($_GET['id']);
        $Customer->UpdateBalance($SHresult->CUSTOMERID, $TOTAL,$SHresult->TOTAL);

        $newSOH->UpdateTotal($slsID, $TOTAL, $TOTAL);


        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $mydb->setQuery("select * FROM `tblslsdetl` where SLSID =".$_GET['id']);
        $cur = $mydb->loadResultList();
        $total ="0";
        foreach ($cur as $result) {


            $PRODUCTS->qtyplus($result->PROID,$result->QTY);
            $Stocks->deleteTPID($result->Id, "SA");
        }
        $SHresult = $newSOH->single_invoice($_GET['id']);
        $Customer->UpdateBalance($SHresult->CUSTOMERID, 0 ,$SHresult->TOTAL);

        $newSOD->deleteInvoice($_GET['id']);
        $newSOH->delete($_GET['id']);
        $_SESSION['message'] = "Sales Deleted...";
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
        //  redirect("index.php");

    } else {
        redirect("index.php?view=" . md5('edit') . "&id=" . $slsID . "&pid=");
    }
}
//require_once ("../theme/templates.php");
?>
