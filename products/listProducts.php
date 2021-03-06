<?php
    require_once("../include/initialize.php");
    $ACTIONS = "<button class=\'btn btn-primary\' id=\"editBTN\"><span class=\"fa fa-edit fw-fa\"></a> </button>";
    $dtFROM = $_SESSION['fromdate'];
    $dtTO = $_SESSION['todate'];
    $keyWord =  $_SESSION["keyWord"];
    $query = "SELECT PRONAME, PROCODE, CATEGORIES, PROPRICE, WPROPRICE, PPROPRICE, PROQTY, LOCATION,";
    $query .= " concat('<a title=\'Edit\' href=\'index.php?view=" . md5('edit') ."&id='";
    $query .= ", PROID ,";
    $query .= "'&pid=\'   class=\'btn btn-primary btn-xs  \'><span class=\"fa fa-edit fw-fa\"></span></a>'   ";
    $query .= " ,'<a title=\'Delete\' href=\'index.php?view=" . md5('delete') ."&id='";
    $query .= ", PROID ,";
    $query .= "'&pid=\'   class=\'btn btn-danger btn-xs  \'><span class=\"fa fa-trash-o fw-fa\"></span></a>') as ACTIONS ";
    $query .= "  FROM `tblproduct`  where entdate >='".$dtFROM."' and entdate <= '".$dtTO."' and PRONAME LIKE '". $keyWord."%'  order by  PRONAME, PROCODE";



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