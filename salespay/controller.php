<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$TranID = "";
$TranPay   = new SalesPayHead();
 

$Customer   = new Customer();
 
$_SESSION['message'] = "";
$_SESSION['msgtype'] = "";

$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}


switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
        $TNO = $_POST["ORNO"];
        if (!$TranPay->isNew('ORNO',$_POST["ORNO"])){
            $TNO = $TranPay->lastReceipt();
        }
        if ($_POST["CUSTOMERID"]!="" and $_POST["CUSTNAME"]!="" and (intval( $TNO) > 0  )) {
            $CHKAMOUNT = "0";
            if ($_POST["BANK"]!= "" and $_POST["CHKNO"]!= "" and $_POST["CHKAMOUNT"]!= "" ) {
                $CHKAMOUNT =$_POST["CHKAMOUNT"];
            }
            $PAIDAMT = floatval( $_POST["CASHAMT"]) + floatval( $_POST["CARDAMT"]) + floatval( $CHKAMOUNT);
            $arrayFields = "CUSTNAME, CUSTOMERID, ORNO, ENTDATE,  NOTE, USERID,U_NAME,
                            CASHAMT, CARDAMT, CCNO, CCEXPIRY, CCAPPROVAL, TOTALCHK, PAIDAMT, CARDNAME";
            $formGet = array($_POST["CUSTNAME"], $_POST["CUSTOMERID"], $TNO, $_POST["ENTDATE"], $_POST["NOTE"],
                            $_SESSION["USERID"],$_SESSION["U_NAME"], $_POST["CASHAMT"], $_POST["CARDAMT"],
                            $_POST["CCNO"], $_POST["CCEXPIRY"], $_POST["CCAPPROVAL"], $CHKAMOUNT,
                            $PAIDAMT,$_POST["CARDNAME"]);


            if ($TranPay->create($arrayFields, $formGet, 1)) {
                $TranID = $mydb->insert_id();
                $_SESSION['message'] .= "Added Sales Header/Customer Details...<BR>";
                $_SESSION['msgtype'] = "success";
                if ($CHKAMOUNT > 0 ) {



                    $arrayFields = "ORID, BANK, CHKNO, CHKDATE, CLEARDATE, CHKAMOUNT";
                    $formGet = array($TranID, $_POST["BANK"], $_POST["CHKNO"],$_POST["CHKDATE"],$_POST["CLEARDATE"],$_POST["CHKAMOUNT"]);
                    if ($TranPay->create($arrayFields, $formGet,3)) {
                        $TranCID = $mydb->insert_id();
                        $_SESSION['message'] .= "Check Payment Added...";
                        $_SESSION['msgtype'] = "success";

                    }else{
                        $_SESSION['message'] .= "Unable to Add Check Payment... Saving Process Terminated...";
                        $_SESSION['msgtype'] = "error";

                    }
                }
            } else {
                $_SESSION['message'] = "Unable to Add New Payment!!!";
                $_SESSION['msgtype'] = "error";
            }
        }else {
            $_SESSION['message'] = "Invalid Customer/Invoice/Delivery Entry!!!<br>";
            $_SESSION['message'] .= "Customer   : ".$_POST["CUSTNAME"]."<br>";
            $_SESSION['message'] .= "Customer ID: ".$_POST["CUSTOMERID"]."<br>";
            $_SESSION['message'] .= "O.R. No.: ".$TNO."<br>";
            $_SESSION['msgtype'] = "error";
        }
        $bypass = false;
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $TranID  = $_POST['ORID'];

        $_SESSION['message'] ="";
        $cCode = "";
        $cName = "";

        if (isset($_POST["CheckSave"]) ) {
         //   echo $TranID . "fsdfsd";
             $TranCID = $_POST["ORCID"];
             if ($_POST["BANK"] != "" && $_POST["CHKNO"] != "" && floatval($_POST["CHKAMOUNT"]) > 0) {
                 if (intval($_POST["ORCID"]) > 0){
                     $arrayFields = array("BANK","CHKNO","CHKDATE","CLEARDATE","CHKAMOUNT");
                     $formGet = array($_POST["BANK"], $_POST["CHKNO"],$_POST["CHKDATE"],$_POST["CLEARDATE"],$_POST["CHKAMOUNT"]);
                     if ($TranPay->updateSave($arrayFields, $formGet,$_POST["ORCID"],3)) {
                         $_SESSION['message'] .= "Check Payment Updated Successfully...";
                         $_SESSION['msgtype'] = "success";

                     }else{
                         $_SESSION['message'] .= "Unable to Update Check Payment...";
                         $_SESSION['msgtype'] = "error";

                     }
                 } else {
                     $arrayFields = "ORID, BANK, CHKNO, CHKDATE, CLEARDATE, CHKAMOUNT";
                     $formGet = array($TranID, $_POST["BANK"], $_POST["CHKNO"],$_POST["CHKDATE"],$_POST["CLEARDATE"],$_POST["CHKAMOUNT"]);
                     if ($TranPay->create($arrayFields, $formGet,3)) {
                         $TranCID = $mydb->insert_id();
                         $_SESSION['message'] .= "Check Payment Added...";
                         $_SESSION['msgtype'] = "success";

                     }else{
                         $_SESSION['message'] .= "Unable to Add Check Payment...";
                         $_SESSION['msgtype'] = "error";

                     }
                 }
                 if ($_SESSION['msgtype'] == "success"){
                     $TranPay->updateCheckTotal($TranID);
                     $TranPay->UpdateTotal($TranID);
                 }
             }else{
                 $_SESSION['message'] .= "Invalid Check Details... Saving Terminated... <br>";
                 $_SESSION['msgtype'] = "error";

             }
        } else if (isset($_POST["Save"]) ) {

            //$PAIDAMT = floatval( $_POST["CASHAMT"]) + floatval( $_POST["CARDAMT"]) + floatval( $CHKAMOUNT);

            $arrayFields = array("ENTDATE"," NOTE","USERID","U_NAME", "CASHAMT","CARDAMT","CCNO","CCEXPIRY",
                "CCAPPROVAL",  "CARDNAME");
            $formGet = array(  $_POST["ENTDATE"], $_POST["NOTE"],
                $_SESSION["USERID"],$_SESSION["U_NAME"], $_POST["CASHAMT"], $_POST["CARDAMT"],
                $_POST["CCNO"], $_POST["CCEXPIRY"], $_POST["CCAPPROVAL"],  $_POST["CARDNAME"]);

            if ($TranPay->updateSave($arrayFields, $formGet, $TranID, 1)) {
                $TranPay->UpdateTotal($TranID);
            }
        }else if (isset($_POST["SalesSave"]) ) {
            //   echo $TranID . "fsdfsd";
            $TranPID = $_POST["ORPID"];
            if ($_POST["SLSID"] != "" && ($_POST["INVOICENO"] != "" OR $_POST["DRNO"] != "") && floatval($_POST["AMOUNT"]) > 0) {
                if (intval($_POST["ORPID"]) > 0){
                    $arrayFields = array("SLSID","INVOICENO","DRNO","PTYPE","RRID","RRNO","AMOUNT","BOUNCEDAMT");
                    $formGet = array($_POST["SLSID"], $_POST["INVOICENO"],$_POST["DRNO"],$_POST["PAYTYPE"],$_POST["RRID"],
                        $_POST["RRNO"], $_POST["AMOUNT"], $_POST["BOUNCEDAMT"]);
                    if ($TranPay->updateSave($arrayFields, $formGet,$_POST["ORPID"],2)) {
                        $_SESSION['message'] .= "Sales Payment Updated Successfully...";
                        $_SESSION['msgtype'] = "success";

                    }else{
                        $_SESSION['message'] .= "Unable to Add Sales...";
                        $_SESSION['msgtype'] = "error";

                    }
                } else {
                    $arrayFields = "ORID, SLSID,INVOICENO,DRNO,PTYPE,RRID,RRNO,AMOUNT";
                    $formGet = array($TranID, $_POST["SLSID"], $_POST["INVOICENO"],$_POST["DRNO"],$_POST["PAYTYPE"],$_POST["RRID"],
                        $_POST["RRNO"], $_POST["AMOUNT"]);
                    if ($TranPay->create($arrayFields, $formGet,2)) {
                        $TranCID = $mydb->insert_id();
                        $_SESSION['message'] .= "Sales Payment Added...";
                        $_SESSION['msgtype'] = "success";

                    }else{
                        $_SESSION['message'] .= "Unable to Add Sales Payment...";
                        $_SESSION['msgtype'] = "error";

                    }
                }
                if ($_SESSION['msgtype'] == "success"){
                    $result = $TranPay->updateSalesTotal($TranID);
                }
            }else{
                $_SESSION['message'] .= "Invalid Sales Details... Saving Terminated... <br>";
                $_SESSION['msgtype'] = "error";

            }
        }



        $bypass = false;
        break;
    case "CheckDelete" :

        $pid = $_GET["cid"];
        $TranID = $_GET["id"];

        if ($TranPay->delete($pid,3)){

            $result = $TranPay->updateCheckTotal($TranID);
            $TranPay->UpdateTotal($TranID);
            echo '{"type" : "success", "totalbounced": "'. number_format( $result->BOUNCEAMT,2).'", "totalcheck": "'. number_format( $result->CHKAMOUNT,2).'" }';
        }else { echo '{"type" : "success"}';}
        break;

    case "BOUNCED" :

        $pid = $_GET["cid"];
        $TranID = $_GET["id"];
        $BOUNCEDATE = $_GET["swalInput"];
        if ($TranPay->BouncedTag($pid,$BOUNCEDATE)){

            $result = $TranPay->updateCheckTotal($TranID);
            $TranPay->UpdateTotal($TranID);
            echo '{"type" : "success", "totalbounced": "'. number_format( $result->BOUNCEAMT,2).'", "totalcheck": "'. number_format( $result->CHKAMOUNT,2).'" }';
        }else { echo '{"type" : "success"}';}
        break;
    case "BOUNCEDSALES" :

        $pid = $_GET["cid"];
        $TranID = $_GET["id"];
        $BOUNCEDAMT = $_GET["swalInput"];
        //echo $BOUNCEDAMT. " -  ".$pid;
        if ($TranPay->updateSalesBounced($pid,$BOUNCEDAMT)){

            $result = $TranPay->updateSalesTotal($TranID);
            $TranPay->UpdateTotal($TranID);
            echo '{"type" : "success", "TOTALSALES": "'. number_format( $result->TOTALSALES,2).'", "BOUNCEDSALES": "'. number_format( $result->BOUNCEDSALES,2).'", "OFFCREDIT": "'. number_format( $result->OFFCREDIT,2).'" }';
        }else { echo '{"type" : "error" }';}
        break;
    case md5('itemdelete') :
        $TranID = $_GET['id'];
        $header='itemdelete';
        $header=$view;
        $pid = $_GET['pid'];
        $SDresult = $TranPay->single_iteminvoice($pid);

        $TranPay->delete($pid);
        $PRODUCTS->qtyplus($SDresult->PROID,$SDresult->QTY);


        $_SESSION['message'] = "Deleted Sales Product...";
        $_SESSION['msgtype'] = "success";

        $SDresult = $TranPay->getSalesTotal($_GET['id']);




        $Stocks->deleteTPID($pid,"SA");

        $TOTAL = 0;
        $TOTAL = $TOTAL + $SDresult->TOTAL;
        $SHresult = $TranPay->single_invoice($_GET['id']);
        $Customer->UpdateBalance($SHresult->CUSTOMERID, $TOTAL,$SHresult->TOTAL);

        $TranPay->UpdateTotal($TranID, $TOTAL, $TOTAL);


        break;
    case md5('delete') :
        $header='delete';

/*
        $mydb->setQuery("select * FROM `tblslsdetl` where SLSID =".$_GET['id']);
        $cur = $mydb->loadResultList();
        $total ="0";
        foreach ($cur as $result) {


            $PRODUCTS->qtyplus($result->PROID,$result->QTY);
            $Stocks->deleteTPID($result->Id, "SA");
        }
        $SHresult = $TranPay->single_invoice($_GET['id']);
        $Customer->UpdateBalance($SHresult->CUSTOMERID, 0 ,$SHresult->TOTAL);

        $TranPay->deleteInvoice($_GET['id']);
        $TranPay->delete($_GET['id']);
*/
        //$_SESSION['message'] = "Sales Deleted...";
        //$_SESSION['msgtype'] = "success";
        //redirect("index.php?view=".$view);

         echo '{"type" : "success" }';

        break;
    default :
        $_SESSION['message'] = "";
        $_SESSION['msgtype'] = "";
        redirect("index.php?view=".$view);

}

if (!$bypass){
    if ($_SESSION['msgtype'] == "error"){
     //   echo $_SESSION['message'];
        redirect("index.php");
    }else if ($_SESSION['msgtype'] == "success"){
        redirect("index.php?view=".md5('edit')."&id=".$TranID."&pid=");
    }
}
//require_once ("../theme/templates.php");
?>
