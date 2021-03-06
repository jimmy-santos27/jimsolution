<?php
require_once("../include/initialize.php");

$ACTIONS = "<button class=\'btn btn-primary\' id=\"editBTN\"><span class=\"fa fa-edit fw-fa\"></a> </button>";
$dtFROM = $_SESSION['fromdate'];
$dtTO = $_SESSION['todate'];
$keyWord =  $_SESSION["keyWord"];
$query = "SELECT  CONCAT('DT_',ORID) as ID, ORID,ENTDATE,CUSTNAME,ORNO,FORMAT(CASHAMT,2) AS CASHAMT,FORMAT(CARDAMT,2) AS CARDAMT, FORMAT(TOTALCHK,2) AS TOTALCHK,";
$query .= "FORMAT(OFFCREDIT,2) AS OFFCREDIT, FORMAT(CASHAMT+CARDAMT+TOTALCHK+OFFCREDIT,2) AS AMTPAID,";
$query .= " concat('<a title=\'Edit\' href=\'index.php?view=" . md5('edit') ."&id='";
$query .= ", ORID ,";
$query .= "'&pid=\'   class=\'btn btn-primary btn-xs  \'><span class=\"fa fa-edit fw-fa\"></span></a>'   ";
$query .= " ,' <a title=\'Preview\' href=\'index.php?view=" . md5('view') ."&id='";
$query .= ", ORID ,";
$query .= "'&pid=\'   class=\'btn btn-xs  \' style=\"background: green; color: white ; \"  ><span  class=\"fa fa-print fw-fa\"></span></a>'   ";

$query .= " ,'<a title=\'Delete\' href=\'controller.php?action=" . md5('delete') ."&id='";
$query .= ", ORID ,";
$query .= "'&pid=\'   class=\'btn btn-danger btn-xs  \'><span class=\"fa fa-trash-o fw-fa\"></span></a>') as ACTIONS ";


if($_SESSION['U_ROLE']=='Administrator' or $_SESSION['U_ROLE']=='Supervisor')
{
    $query .= "  FROM `tblarpayhead`  where ENTDATE >='".$dtFROM."' and ENTDATE <= '".$dtTO."' and CUSTNAME LIKE '". $keyWord."%'  order by  CUSTNAME, ENTDATE";


}else{
    $query .= "  FROM `tblarpayhead`  where ENTDATE >='".$dtFROM."' and ENTDATE <= '".$dtTO."' and USERID=".$_SESSION['USERID']." and CUSTNAME LIKE '". $keyWord."%'  order by  CUSTNAME, ENTDATE";

}


//echo $query;

$mydb->setQuery($query);
$data = $mydb->loadResultList();

// Set Data Table Parameter Format
$results = ["sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data ];

//Return Json Query
echo json_encode($results);
?>