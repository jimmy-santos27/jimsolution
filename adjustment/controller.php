<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$TranID = "";

$Stocks = new StockIn();


$TranHead = new AdjustHead();
$TranDetl = new AdjustDetl();
$Customer = new Customer();
$Products = new Product();


$_SESSION['message'] = "";
$_SESSION['msgtype'] = "ssss";
$QTYRESET = "0";
$DDATE = "0000-00-00";
if ($view== md5('add') || $view== md5('edit')){
    $LESSQTY = '0';
    $ADDQTY = '0';

    if ((strtoupper($_POST["ADJTYPE"]) == "REPLACEMENT") || (strtoupper($_POST["ADJTYPE"]) == "LESS")
        || (strtoupper($_POST["ADJTYPE"])=="DAMAGE")) {
        $LESSQTY = $_POST["QTY"];
        $ADDQTY = $_POST["OLDQTY"];

    }else if ((strtoupper($_POST["ADJTYPE"])=="RETURN") || (strtoupper($_POST["ADJTYPE"])=="BEGINNING")){
        $LESSQTY = $_POST["OLDQTY"];
        $ADDQTY = $_POST["QTY"];
    }else if ((strtoupper($_POST["ADJTYPE"])=="RESET")){
        $QTYRESET = $_POST["QTYRESET"];
        $LESSQTY = $_POST["OLDQTY"];
        $ADDQTY = $_POST["QTY"];
    }


    if (  ($_POST["ADJPID"] =="" || $_POST["ADJPID"] =="0") || $view== md5('add')) {
        if ((strtoupper($_POST["ADJTYPE"]) == "REPLACEMENT") || (strtoupper($_POST["ADJTYPE"]) == "LESS")
            || (strtoupper($_POST["ADJTYPE"]) == "DAMAGE")) {
            $LESSQTY = $_POST["QTY"];
            $ADDQTY = '0';
        } else if ((strtoupper($_POST["ADJTYPE"]) == "RETURN") || (strtoupper($_POST["ADJTYPE"]) == "BEGINNING")) {
            $LESSQTY = "0";
            $ADDQTY = $_POST["QTY"];
        } else if ((strtoupper($_POST["ADJTYPE"]) == "RESET")) {
      //      echo $_POST["QTYRESET"];
            $QTYRESET = $_POST["QTYRESET"];
            $LESSQTY = $_POST["QTYRESET"];
            $ADDQTY = $_POST["QTY"];

        }
    }



}
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}

switch ($view) {
    case md5('add') :
        $bypass = false;
        $header='add';
        $header=$view;
        $invdrcount = 0;




        if ($_POST["ADJNO"]!="" and $_POST["APPROVEDBY"]!="" and $_POST["PRONAME"]!=""  and $_POST["QTY"]!="" and $_POST["QTY"]!="0"   )
        {
            // TranHeadER INSERT PROCEDURE
            $arrayFields = "CUSTNAME,CUSTCODE,CUSTOMERID,ADJNO,REFNO,ENTDATE, NOTE,USERID,U_NAME,APPROVEDBY, ADJTYPE";

            $formGet = array($_POST["CUSTNAME"], $_POST["CUSTCODE"], $_POST["CUSTOMERID"], $_POST["ADJNO"], $_POST["REFNO"],
                             $_POST["ENTDATE"],  $_POST["NOTE"],$_SESSION["USERID"],$_SESSION["U_NAME"],$_POST["APPROVEDBY"],
                             $_POST["ADJTYPE"]);


            if ($TranHead->create($arrayFields, $formGet)) {
                $TranID = $mydb->insert_id();
                $_SESSION['message'] .= "Added Adjustment Header...<BR>";

                if ($_POST["PROID"]!= "" and $_POST["PROCODE"]!= "" and $_POST["PRONAME"]!= "" && $_POST["QTY"] <> "0" && $_POST["QTY"] != "") {

                    // TRANDETAIL INSERT PROCEDURE


                    $result = $Products->single_product($_POST["PROID"]);
                    $arrayFields = "ADJID, PROID, PRONAME, PROCODE, QTY, QTYRESET, UNIT";
                    $formGet = array($TranID,  $_POST["PROID"], $result->PRONAME, $result->PROCODE, $_POST["QTY"],
                             $QTYRESET , $_POST["UNIT"]);
                    if ($TranDetl->create($arrayFields, $formGet)) {
                        $ADJPID = $mydb->insert_id();

                        //Update Product Inventory / Qty Onhand
                        echo $ADDQTY ."  - ". $LESSQTY;
                        $Products->qtyplus($_POST["PROID"],($ADDQTY - $LESSQTY));

                        //Insert product movent in StockIn - Stock Card
                        $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYIN,  QTYOUT, PRICE, USERID";
                        $formGet = array($_POST["ENTDATE"], $TranID, $ADJPID, "AD",  $_POST["ADJNO"],  $_POST['PROID'],
                            $ADDQTY, $LESSQTY,  $result->AVGCOST, $_SESSION["USERID"]);

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
            $_SESSION['message'] = "Invalid  Entry!!!<br>";
            $_SESSION['message'] .= "Adj. No.: ".$_POST["ADJNO"]."<br>";
            $_SESSION['msgtype'] = "error";
         }

        break;
    case md5('edit') :
        $bypass = false;
        $header='edit';
        $header=$view;
        $TranID  = $_POST['ADJID'];
        $ADJPID = $_POST["PID"];
        $_SESSION['message'] ="";
        $cCode = "";
        $cName = "";

         if (isset($_POST["itemsave"]) ) {
             if ($_POST["PROID"] != ""  && $_POST["PRONAME"] != "" && $_POST["PROCODE"] != ""    ) {
                 $result = $Products->single_product($_POST["PROID"]);

                 if ($ADJPID != "" & $ADJPID != "0" ) {
                     // Update SR Details
                     $arrayFields = array( "QTY", "UNIT");
                     $formGet = array(  $_POST["QTY"], $_POST["UNIT"] );
                     if ($TranDetl->updateSave($arrayFields, $formGet, $_POST["PID"])) {

                         // Update Product Inventory/Qty Onhand (return qty)

                         //Update Product Inventory / Qty Onhand
                         $Products->qtyplus($_POST["PROID"],($ADDQTY - $LESSQTY));

                         //Update Stock Card Table
                         $arrayFields = array("ENTDATE", "TID", "TPID", "TTYPE", "TNO", "PROID", "QTYIN", "PRICE", "USERID");
                         $formGet = array($_POST["ENTDATE"], $TranID, $ADJPID, "AD",  $_POST["ADJNO"],  $_POST['PROID'],$_POST['QTY'], $result->AVGCOST, $_SESSION["USERID"]);
                         $Stocks->updateSave($arrayFields, $formGet, $ADJPID,"AD" );

                         $_SESSION['message'] .= "Product Save... ";
                         $_SESSION['msgtype'] = "success";
                     } else {
                         $_SESSION['message'] .= "Unable to Save Product... ";
                         $_SESSION['msgtype'] = "error";
                     }
                 }
                 else {
                     $result = $Products->single_product($_POST["PROID"]);
                     // Update SR Details
                     $arrayFields = "ADJID, PROID,PRONAME,PROCODE, QTY, QTYRESET,UNIT ";
                     $formGet = array($TranID,  $_POST["PROID"], $result->PRONAME, $result->PROCODE,
                         $_POST["QTY"], $QTYRESET, $_POST["UNIT"]  );

                     if ($TranDetl->create($arrayFields, $formGet)) {
                         $ADJPID = $mydb->insert_id();

                         // Update Product Inventory/Qty Onhand (return qty)
                         $Products->qtyplus($_POST["PROID"],($ADDQTY - $LESSQTY));


                         $arrayFields = "ENTDATE, TID, TPID, TTYPE, TNO, PROID, QTYIN, PRICE, USERID";
                         $formGet = array($_POST["ENTDATE"], $TranID, $ADJPID, "AD", $_POST["ADJNO"], $_POST['PROID'],$_POST['QTY'], $result->AVGCOST, $_SESSION["USERID"]);
                         $Stocks->create($arrayFields, $formGet);


                         $_SESSION['message'] .= "Product Details Added...";
                         $_SESSION['msgtype'] = "success";

                     }else{
                         $_SESSION['message'] .= "Unable to Add Product Details... Saving Process Terminated...";
                         $_SESSION['msgtype'] = "error";

                     }

                 }


             }else{
                 $_SESSION['message'] .= "Invalid Product Details... Saving Process Terminated... <br>";

                 $_SESSION['message'] .= "Product : ".$_POST["PRONAME"]."<br>";
                 $_SESSION['message'] .= "Code : ".$_POST["PROCODE"]."<br>";
                 $_SESSION['message'] .= "QTY : ".$_POST["QTY"]."<br>";

                 $_SESSION['msgtype'] = "error";

             }
         } else {


             $arrayFields = array( "REFNO","ENTDATE", "NOTE","APPROVEDBY");
             $formGet = array(  $_POST["REFNO"], $_POST["ENTDATE"], $_POST["NOTE"],   $_POST["APPROVEDBY"] );

             if ($TranHead->updateSave($arrayFields, $formGet, $_POST["ADJID"])) {


                 $_SESSION['message'] .= "Updated Adjustment...";
                 $_SESSION['msgtype'] = "success";

             }else {
                 $_SESSION['message'] .= "Unable To Save Header... <br>";

                 $_SESSION['message'] .= "Tran ID : ".$_POST["ADJID"]."<br>";
                 $_SESSION['message'] .= "Tran No : ".$_POST["ADJNO"]."<br>";


                 $_SESSION['msgtype'] = "error";
             }


         }




        break;
    case md5('itemdelete') :
        $TranID = $_GET['id'];
        $header='itemdelete';
        $header=$view;
        $pid = $_GET['pid'];

        $LESSQTY = '0';
        $ADDQTY = '0';
        
        
        
        $TDResult = $TranDetl->single_iteminvoice($pid);
        $THResult = $TranHead->single_tran($TranID);

        if (  ($TDResult->ADJPID !="" || $TDResult->ADJPID >0)  ) {
            if ((strtoupper($THResult->ADJTYPE) == "REPLACEMENT") || (strtoupper($THResult->ADJTYPE) == "LESS")
                || (strtoupper($THResult->ADJTYPE) == "DAMAGE")) {

                $ADDQTY =$TDResult->QTY;
            } else if ((strtoupper($THResult->ADJTYPE) == "RETURN") || (strtoupper($THResult->ADJTYPE) == "BEGINNING")) {

                $LESSQTY = $TDResult->QTY;
            } else if ((strtoupper($THResult->ADJTYPE) == "RESET")) {
                //      echo $_POST["QTYRESET"];
                $QTYRESET = $TDResult->QTYRESET;
                $ADDQTY = $TDResult->QTYRESET;
                $LESSQTY = $TDResult->QTY;

            }
            $TranDetl->delete($pid);

            $Products->qtyplus($TDResult->PROID,($ADDQTY - $LESSQTY));

            $_SESSION['message'] = "Deleted Product...";
            $_SESSION['msgtype'] = "success";
        }else{
            $_SESSION['message'] = "Invalid Product ID...";
            $_SESSION['msgtype'] = "error";
        }





        $Stocks->deleteTPID($pid,"AD");

        $bypass = false;

        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $TranID = $_GET['id'];

        $cur = $TranDetl->listofTranPerID($TranID)  ;

        foreach ($cur as $TDResult) {
            $pid = $TDResult->ADJPID;

            $LESSQTY = '0';
            $ADDQTY = '0';


            $THResult = $TranHead->single_tran($TranID);
            switch (strtoupper($THResult->ADJTYPE)) {
                case "REPLACEMENT" || "LESS" || "DAMAGE":
                    $LESSQTY = '0';
                    $ADDQTY = $TDResult->QTY;

                    break;
                case "RETURN" || "BEGINNING":
                    $LESSQTY = $TDResult->QTY;
                    $ADDQTY = '';
                    break;
                case "RESET":

                    $LESSQTY = $TDResult->QTY;

                    $ADDQTY = $TDResult->QTYRESET;
                    break;
            }

            $Products->qtyplus($TDResult->PROID,($ADDQTY - $LESSQTY));

            $Stocks->deleteTPID($pid, "AD");

        }


        $TranDetl->deleteInvoice($TranID );
        $TranHead->delete($TranID );
        echo '{"type" : "success" }';
        //$_SESSION['message'] = "Adjustment Deleted...";
        //$_SESSION['msgtype'] = "success";
        //redirect("index.php?view=".$view);
        break;
    default :
        $_SESSION['message'] = "";
        $_SESSION['msgtype'] = "";
        redirect("index.php?view=".$view);

}
if (!$bypass) {
    if ($_SESSION['msgtype'] == "error") {
        echo $_SESSION['message'];
        redirect("index.php?view=" . md5('edit') . "&id=" . $TranID . "&pid=");

    } else {
        redirect("index.php?view=" . md5('edit') . "&id=" . $TranID . "&pid=");
    }
}
?>
