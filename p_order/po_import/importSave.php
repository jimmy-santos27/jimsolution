<?php
require_once("../../include/initialize.php");

$POID = "";

$data_arr= $_POST["data"];

$POID = $_POST["id"];
$TranHead = new PurchaseOrderHead();
$TranDetl = new PurchaseOrderDetl();
$Products = new Product();
$HeadResult = $TranHead->single_pohorder($POID);
$_SESSION['message'] = "";
if ($HeadResult->POID != "") {

    $_SESSION['msgtype'] = "success";
    foreach ($data_arr as $key ) {

  //      $_SESSION['message'] .=$key["QTY"]. " - ". $key["UNIT"]   . " - ". $key["CODE"]. " - ". $key["PRODUCT"].
  //               " - ". $key["QTY PER BOX"]. " - ". $key["FOR. COST"]. " - ". $key["FOR. AMT"]. " - ".
  //              $key["PHP COST"]. " - ". $key["PHP AMT"] ."<br>";
        if ($key["CODE"]!="") {
            $PROResult = $Products->singleItemCode($key["CODE"]);
            if ($PROResult->PROCODE != "") {

                $arrayFields = "POID, PROID, PRONAME, PROCODE , PURPRICE, pono, QTY, AMOUNT, UNIT, QTYPERBOX, FLOORPRICE,
                             FLOORRATE, SUPPITEM, FORPURPRICE,FORAMOUNT";
                $formGet = array($POID, $PROResult->PROID, $PROResult->PRONAME, $PROResult->PROCODE,
                    str_replace(',', '',$key["PHP COST"]), $_POST["pono"], str_replace(',', '',$key["QTY"]),
                    str_replace(',', '',$key["PHP AMT"]), $key["UNIT"], $key["QTY PER BOX"], $PROResult->FLOORPRICE,
                    $PROResult->FLOORRATE, $PROResult->SUPPITEM, str_replace(',', '',$key["FOR. COST"]),
                    str_replace(',', '',$key["FOR. AMT"]));
                if ($TranDetl->create($arrayFields, $formGet)) {
                    $_SESSION['message'] .= "<br>Product Added... " . $key["CODE"]." - ".$key["PRODUCT"]." - ".$key["QTY"].$key["UNIT"];

                } else {
                    $_SESSION['message'] .= "<br>Can\'t insert record... Please check format of your excel data...";
                    $_SESSION['msgtype'] = "error";
                }
            } else {
                $_SESSION['message'] .= "<br>Item Not Found... " . $key["PRODUCT"];
                $_SESSION['msgtype'] = "error";
            }
        }
   }
   $TDResult = $TranDetl->getTotal($HeadResult->POID);
   $TranHead->UpdateTotal($HeadResult->POID,$TDResult->TOTAL,$TDResult->FORTOTAL);

} else {
    $_SESSION['message'] = "Invalid P.O... Make sure to save supplier header before processing Excel Products.";
    $_SESSION['msgtype'] = "error";

}
echo  $_SESSION['msgtype'];




//mysqli_close($conn);

?>