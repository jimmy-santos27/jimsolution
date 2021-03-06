<?php

require_once("../include/initialize.php");

$dtFROM = $_SESSION['fromdate'];
$dtTO = $_SESSION['todate'];
$keyWord =  $_SESSION["keyWord"];

    $query = "SELECT CONCAT('DT_',POID) as ID, pono, entdate, suppname, refno, FOREX, FOREXRATE, terms, duedate, format(net,2) as net  ,";
    $query .= " concat('<a title=\'Edit\' href=\'index.php?view=" . md5('edit') ."&id='";
    $query .= ", POID ,";
    $query .= "'&pid=\'   class=\'btn btn-primary btn-xs  \'><span class=\"fa fa-edit fw-fa\"></span></a>'   ";
    $query .= " ,' <a title=\'Preview\' href=\'index.php?view=" . md5('view') ."&id='";
    $query .= ", POID ,";
    $query .= "'&pid=\'   class=\'btn btn-xs  \' style=\"background: green; color: white ; \"  ><span  class=\"fa fa-print fw-fa\"></span></a>'   ";

    $query .= " ,'<a title=\'Delete\' href=\'controller.php?action=" . md5('delete') ."&id='";
    $query .= ", POID ,";
    $query .= "'&pid=\'   class=\'btn btn-danger btn-xs  \'><span class=\"fa fa-trash-o fw-fa\"></span></a>') as ACTIONS ";

    if($_SESSION['U_ROLE']=='Administrator' or $_SESSION['U_ROLE']=='Supervisor')
    {
        $query .= "  FROM `tblpohead`  where entdate >='".$dtFROM."' and entdate <= '".$dtTO."' and suppname LIKE '". $keyWord."%'  order by  suppname, pono";


    }else{
        $query .= "  FROM `tblpohead`  where entdate >='".$dtFROM."' and entdate <= '".$dtTO."' and USERID=".$_SESSION['USERID']." and suppname LIKE '". $keyWord."%'  order by  suppname, pono";

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