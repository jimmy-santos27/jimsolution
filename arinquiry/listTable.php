<?php
require_once("../include/initialize.php");
$ACTIONS = "<button class=\'btn btn-primary\' id=\"editBTN\"><span class=\"fa fa-edit fw-fa\"></a> </button>";
$dtFROM = $_SESSION['fromdate'];
$dtTO = $_SESSION['todate'];
$keyWord =  $_SESSION["keyWord"];
$AClass = new Area();

$dtArray = array();
$prod = '{"ENTDATE":"","DUEDATE":"","AGING":"","SLSID":"","STYPE":"","INVDR":"","TOTAL":"","DEBITAMT":"","CREDITAMT":"","PAIDAMT":"","FORCLEARING":"","BALANCE":"","PDCDATE":""}';
array_push($dtArray,  json_decode($prod,true));
if ($_SESSION["ARCUSTOMERID"]!="") {
    $query = "SELECT ENTDATE, DUEDATE, DATEDIFF(CURDATE(),ENTDATE) AS AGING, SLSID, IF(SLSTYPE=2,'DR','SI') AS STYPE,";
    $query .= " IF(SLSTYPE=2,DRNO,INVOICENO) AS INVDR, FORMAT(TOTAL,2) AS TOTAL, FORMAT(DEBITAMT,2) AS DEBITAMT, ";
    $query .= " FORMAT(CREDITAMT,2) AS CREDITAMT, FORMAT(PAIDAMT,2) AS PAIDAMT, TOTAL AS FORCLEARING, ";
    $query .= " FORMAT((TOTAL+DEBITAMT-CREDITAMT-PAIDAMT),2) AS BALANCE  from tblslshead where CANCELLED!='Y' AND CUSTOMERID=" . $_SESSION["ARCUSTOMERID"];

    $mydb->setQuery($query);
    $data = $mydb->loadResultList();

    $dtArray = array();
    $cust = "";
    $prod = "";
    foreach ($data as $result) {
        $prod = str_replace("}", "", json_encode($result));

        //  $pCUSTOMERID = " CUSTOMERID = 2";
        $qry = "select b.SLSID, c.CHKDATE, a.ORID  from tblarpayhead as a, tblarpaydetl as b, tblarpaycheck as c where b.SLSID = {$result->SLSID} and c.ORID = a.ORID and  c.CHKDATE > CURDATE() order by  c.CHKDATE  limit 1";
        $cur = $AClass->getQueryList($qry);
        $CTR = 0;
        foreach ($cur as $result2) {
            $CTR = 1;
            $prod .= ', "PDCDATE": "' . $result2->CHKDATE . '"';


        }
        if ($CTR == 0) {
            $prod .= ', "PDCDATE": ""';
        }
        $prod .= "}";
        //  $prod = str_replace('\"','"', $prod);
        //  echo $prod;
        array_push($dtArray, json_decode($prod, true));
    }
}
$data = $dtArray;



// Set Data Table Parameter Format
$results = ["sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data ];

//Return Json Query
echo json_encode($results);
?>

