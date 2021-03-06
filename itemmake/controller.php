<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newITEMMAKE = new Area();
$tbl_name = "tblitemmake";
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newITEMMAKE->RecordIsNew("ITEMMAKE",$_POST["ITEMMAKE"],$tbl_name))
        {
              $arrayFields = "ITEMMAKE";
              $formGet = array($_POST["ITEMMAKE"]);
              if ($newITEMMAKE->InsertRecord($arrayFields,$formGet,$tbl_name)){
                  $_SESSION['message'] = "Added New Item Make...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Item Make!!!";
                  $_SESSION['msgtype'] = "error";
                  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "Item Make Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Area Code Already Exist!!!')</script>";
          redirect("index.php?view=".$view);

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $ITEMMAKEid = $_POST['ID'];
        $arrayFields = array("ITEMMAKE");
        $formGet = array($_POST["ITEMMAKE"]);

        $newITEMMAKE->UpdateRecord($arrayFields,$formGet,$ITEMMAKEid,$tbl_name);
        $_SESSION['message'] = "Item Make Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$ITEMMAKEid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $ITEMMAKEid = $_GET['id'];
        $newITEMMAKE->DeleteRecord($ITEMMAKEid,$tbl_name);
        $_SESSION['message'] = "Deleted Item Make... ID : ".$ITEMMAKEid;
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
