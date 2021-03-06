<?php
require_once("../include/initialize.php");

$OCID= isset($_REQUEST['OCID'])? $_REQUEST['OCID']:"0" ;

$query = "SELECT CONCAT('ORD_',SOID) AS ID, SOID, ENTDATE, PAYMODE, NOTE, DEL_STATUS, FORWARDERS, TRACKNO, format(TOTAL,2) as TOTAL, FORMAT(PAIDAMT,2) AS PAIDAMT from tblorderhead where OCID = {$OCID} order by ENTDATE DESC   ";

$mydb->setQuery($query);
$data = $mydb->loadResultList();

// Set Data Table Parameter Format
$results = ["sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => 10,
    "aaData" => $data ];

//Return Json Query
echo json_encode($results);
?>