<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newCARMAKE = new Area();
$tbl_name = "tblcarmake";
if ($view == "DTDELETE"){
    $view = md5("delete");
}

switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newCARMAKE->RecordIsNew("CARMAKE",$_POST["CARMAKE"],$tbl_name))
        {
              $arrayFields = "CARMAKE";
              $formGet = array($_POST["CARMAKE"]);
              if ($newCARMAKE->InsertRecord($arrayFields,$formGet,$tbl_name)){
                  $_SESSION['message'] = "Added New Car Make...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Car Make!!!";
                  $_SESSION['msgtype'] = "error";
                //  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "Car Make Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Area Code Already Exist!!!')</script>";
          //header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $CARMAKEid = $_POST['ID'];
        $arrayFields = array("CARMAKE");
        $formGet = array($_POST["CARMAKE"]);

        $newCARMAKE->UpdateRecord($arrayFields,$formGet,$CARMAKEid,$tbl_name);
        $_SESSION['message'] = "Car Make Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$CARMAKEid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $CARMAKEid = $_GET['id'];
        $newCARMAKE->DeleteRecord($CARMAKEid,$tbl_name);
        $_SESSION['message'] = "Deleted Car Make... ID : ".$CARMAKEid;
        //$_SESSION['msgtype'] = "success";
        echo '{"type" : "success" }';
        break;
    default :
        $_SESSION['message'] = "";
        $_SESSION['msgtype'] = "";
        redirect("index.php?view=".$view);

}

//require_once ("../theme/templates.php");
?>
