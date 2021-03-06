<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$TranID="";
$POID = "";
$cCode = "";
$cName = "";
$TranDetl = new PurchaseOrderDetl();
$TranHead = new PurchaseOrderHead();
$Supplier = new Supplier();
$Products = new Product();
$_SESSION['message'] = "";
$_SESSION['msgtype'] = "";

$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
switch ($view) {


    case md5('add') :
        $bypass = false;
        $header='add';
         if ($TranHead->pohorderisnew("pono",$_POST["pono"])) {
            $supResult = $Supplier->single_supplier($_POST["SUPPLIERID"]);
            $prodResult = $Products->single_product($_POST["PROID"]);
            if (  $_POST["QTY"] != ""   and $supResult->suppname != "" and $prodResult->PRONAME !="" ){

                $arrayFields = "suppname,suppcode,SUPPLIERID, pono,refno,entdate,terms,duedate,note,USERID,U_NAME,
                                FOREX, FOREXRATE, FORTOTAL";
                $formGet = array($supResult->suppname, $supResult->suppcode, $supResult->SUPPLIERID, $_POST["pono"], $_POST["refno"],
                            $_POST["entdate"], intval($_POST["terms"]), $_POST["duedate"],
                            $_POST["note"],  $_SESSION["USERID"], $_SESSION["U_NAME"], $_POST["FOREX"], $_POST["FOREXRATE"],
                            $_POST["FORAMOUNT"]);
                if ($TranHead->create($arrayFields, $formGet)) {
                    $_SESSION['message'] = "Added New P.O. Header...";
                    $POID = $mydb->insert_id();
                    $TranID=$POID;
                    $arrayFields = "POID, PROID, PRONAME, PROCODE , PURPRICE, pono, QTY, AMOUNT, UNIT, QTYPERBOX, FLOORPRICE,
                         FLOORRATE, SUPPITEM, FORPURPRICE,FORAMOUNT";
                    $formGet = array($POID, $prodResult->PROID, $prodResult->PRONAME, $prodResult->PROCODE, $_POST["PURPRICE"],
                        $_POST["pono"],$_POST["QTY"], $_POST["AMOUNT"], $_POST["UNIT"], $_POST["QTYPERBOX"], $_POST["FLOORPRICE"],
                        $_POST["FLOORRATE"], $_POST["SUPPITEM"], $_POST["FORPURPRICE"], $_POST["FORAMOUNT"]);
                    if ($TranDetl->create($arrayFields, $formGet)) {
                        $_SESSION['message'] .= "<br>Added Product...";
                        $_SESSION['msgtype'] = "success";
                        $TDResult = $TranDetl->getTotal($POID);
                        $TranHead->UpdateTotal($POID,$TDResult->TOTAL,$TDResult->FORTOTAL);


                    } else {
                        $_SESSION['message'] .= "<br>Unable to Insert P.O. Product!!!";
                        $_SESSION['msgtype'] = "error";
                    }
                } else {
                    $_SESSION['message'] = "Unable to Insert Record from P.O. Header!!!";
                    $_SESSION['msgtype'] = "error";

                }
            }  else {
                $_SESSION['message'] = "Unable to Add P.O. Invalid Entry <br>";
                $_SESSION['message'] .= "Supplier Name:" .$_POST["suppname"]. "<br>";
                $_SESSION['message'] .= "Qty:" .$_POST["QTY"]."<br>";
                $_SESSION['message'] .= "Product Name:".$_POST["PRONAME"]. "<br>";
                $_SESSION['msgtype'] = "error";
            }
        }else {
            $_SESSION['message'] = "Purchase Order Already Exist!!!";
            $_SESSION['msgtype'] = "error";
        }
        break;
    case md5('edit') :
        $bypass = false;
        $header='edit';
        $POID  = $_POST['POID'];
        $TranID=$POID;
        $PID = $_POST["POPID"];
        $_SESSION['message'] ="";
        $cCode = "";
        $cName = "";
        if (isset($_POST["itemsave"]) ) {
            if ($_POST["PROID"] != ""  && $PID !="") {
                //item editing - update process
                $prodResult = $Products->single_product($_POST["PROID"]);
                $arrayFields = array("PROID","PRONAME","PROCODE ","PURPRICE","QTY","AMOUNT","UNIT","QTYPERBOX","FLOORPRICE","
                         FLOORRATE","SUPPITEM","FORPURPRICE","FORAMOUNT");
                $formGet = array( $prodResult->PROID, $prodResult->PRONAME, $prodResult->PROCODE, $_POST["PURPRICE"],
                     $_POST["QTY"], $_POST["AMOUNT"], $_POST["UNIT"], $_POST["QTYPERBOX"], $_POST["FLOORPRICE"],
                    $_POST["FLOORRATE"], $_POST["SUPPITEM"], $_POST["FORPURPRICE"], $_POST["FORAMOUNT"]);
                if ($TranDetl->updateSave($arrayFields, $formGet, $_POST["PID"])) {
                    $_SESSION['message'] .= "Product Save... ";
                    $_SESSION['msgtype'] = "success";
                    $TDResult = $TranDetl->getTotal($POID);
                    $TranHead->UpdateTotal($POID,$TDResult->TOTAL,$TDResult->FORTOTAL);
                }else{ $_SESSION['message'] .= "<br>Unable to Update P.O. Product!!!";
                    $_SESSION['msgtype'] = "error";
                }
            }else if ($_POST["PROID"] != "") {
                $prodResult = $Products->single_product($_POST["PROID"]);
                $arrayFields = "POID, PROID, PRONAME, PROCODE , PURPRICE, pono, QTY, AMOUNT, UNIT, QTYPERBOX, FLOORPRICE,
                         FLOORRATE, SUPPITEM, FORPURPRICE,FORAMOUNT";
                $formGet = array($POID, $prodResult->PROID, $prodResult->PRONAME, $prodResult->PROCODE, $_POST["PURPRICE"],
                    $_POST["pono"],$_POST["QTY"], $_POST["AMOUNT"], $_POST["UNIT"], $_POST["QTYPERBOX"], $_POST["FLOORPRICE"],
                    $_POST["FLOORRATE"], $_POST["SUPPITEM"], $_POST["FORPURPRICE"], $_POST["FORAMOUNT"]);
                if ($TranDetl->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "<br>Added Product...";
                    $_SESSION['msgtype'] = "success";
                    $TDResult = $TranDetl->getTotal($POID);
                    $TranHead->UpdateTotal($POID,$TDResult->TOTAL,$TDResult->FORTOTAL);


                } else {
                    $_SESSION['message'] .= "<br>Unable to Insert P.O. Product!!!";
                    $_SESSION['msgtype'] = "error";
                }

            }else {
                $_SESSION['message'] = "Invalid Product... Unable to Save...";
                $_SESSION['msgtype'] = "error";
            }
        }else {
            $supResult = $Supplier->single_supplier($_POST["SUPPLIERID"]);
            $arrayFields = array("suppname","suppcode","SUPPLIERID","refno","entdate","terms","duedate", "note"," 
                                FOREX","FOREXRATE" );
            $formGet = array($supResult->suppname, $supResult->suppcode, $supResult->SUPPLIERID,   $_POST["refno"],
                $_POST["entdate"], intval($_POST["terms"]), $_POST["duedate"],
                $_POST["note"],  $_POST["FOREX"], $_POST["FOREXRATE"] );
            if ($TranHead->updateSave($arrayFields, $formGet, $_POST["POID"])) {
                $_SESSION['message'] .= "Finished Saving Purchase Order Header...";
                $_SESSION['msgtype'] = "success";
            } else{
                $_SESSION['message'] = "Unable to Save... P.O. Header";
                $_SESSION['msgtype'] = "error";
            }
        }


        break;
    case md5('itemdelete') :
        $bypass = false;
        $header='itemdelete';
        $pid = $_GET['pid'];
        $TranID=$_GET['id'];
        $TDResult1 = $TranDetl->singleTranProduct($pid);
        if ($TDResult1->PROCODE !="")
        {
            $TranDetl->delete($pid);
            $TDResult = $TranDetl->getTotal($TranID);
            $TranHead->UpdateTotal($TranID,$TDResult->TOTAL,$TDResult->FORTOTAL);

            $_SESSION['message'] = "Deleted Product...";
            $_SESSION['message'] = "<br>Product Name: ".$TDResult1->PRONAME;
            $_SESSION['msgtype'] = "success";
        }

        break;
    case md5('delete') :
        $header='delete';
        $TranDetl->deletePO($_GET['id']);
        $TranHead->delete($_GET['id']);
        $_SESSION['message'] = "Deleted...";
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
        if ($TranID != "") {
            redirect("index.php?view=" . md5('edit') . "&id=" . $TranID . "&pid=");
        } else {
            redirect("index.php?view=" . md5('add'));
        }
    } else {
        redirect("index.php?view=" . md5('edit') . "&id=" . $TranID . "&pid=");
    }
}

?>
