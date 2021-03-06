<?php
require_once("../include/initialize.php");
$ACTIONS = "<button class=\'btn btn-primary\' id=\"editBTN\"><span class=\"fa fa-edit fw-fa\"></a> </button>";
$dtFROM = $_SESSION['fromdate'];
$dtTO = $_SESSION['todate'];
$keyWord =  $_SESSION["keyWord"];



$query = "SELECT *, concat(\"DT_\", USERID) as ID FROM `tbluseraccount`    order by  U_NAME, U_USERNAME";



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