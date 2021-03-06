<?php
require_once("../include/initialize.php");

$ACTIONS = "<button class=\'btn btn-primary\' id=\"editBTN\"><span class=\"fa fa-edit fw-fa\"></a> </button>";
$dtFROM = $_SESSION['fromdate'];
$dtTO = $_SESSION['todate'];
$keyWord =  $_SESSION["keyWord"];
$query = "SELECT CONCAT('DT_',SLSID) as ID, SLSID, ENTDATE, CUSTNAME, INVOICENO,DRNO, TERMS,DUEDATE, FORMAT(TOTAL,2) AS TOTAL ,";
$query .= " concat('<a title=\'Edit\' href=\'index.php?view=" . md5('edit') ."&id='";
$query .= ", SLSID ,";
$query .= "'&pid=\'   class=\'btn btn-primary btn-xs  \'><span class=\"fa fa-edit fw-fa\"></span></a>'   ";




$query .= "'<ul class=\"nav pull-right\"  >";
$query .= "<li class=\"dropdown\" style=\"margin: 3px\" >";

$query .= "<a  title=\"Preview\" data-toggle=\"dropdown\" href=\"#\"  style=\"height: 20px; width: 30px;  padding: 0px\">";
$query .= "<span class=\"fa fa-print fw-fa btn btn-primary btn-xs\" style=\"background-color: green\"></span>";
$query .= "</a>";
$query .= "<ul class=\"dropdown-menu dropdown-submenu\" style=\"width: 10%; min-width: 80px;\">";
$query .= "<li><a href=\"index.php?view=".md5('view')."&id=',";
$query .= "SLSID,";
$query .= "'&pid=&format=1\">Invoice</a></li>";
$query .= "<li><a href=\"index.php?view=".md5('view')."&id=',";
$query .= "SLSID,";
$query .= "'&pid=&format=2\">D.R.</a></li></ul></li></ul>'";

$query .= " ,'<a title=\'Delete\' href=\'controller.php?action=" . md5('delete') ."&id='";
$query .= ", SLSID ,";
$query .= "'&pid=\'   class=\'btn btn-danger btn-xs  \'><span class=\"fa fa-trash-o fw-fa\"></span></a>') as ACTIONS ";

if($_SESSION['U_ROLE']=='Administrator' or $_SESSION['U_ROLE']=='Supervisor')
{
    $query .= "  FROM `tblslshead`  where ENTDATE >='".$dtFROM."' and ENTDATE <= '".$dtTO."' and CUSTNAME LIKE '". $keyWord."%'  order by  CUSTNAME, ENTDATE";


}else{
    $query .= "  FROM `tblslshead`  where ENTDATE >='".$dtFROM."' and ENTDATE <= '".$dtTO."' and USERID=".$_SESSION['USERID']." and CUSTNAME LIKE '". $keyWord."%'  order by  CUSTNAME, ENTDATE";

}




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