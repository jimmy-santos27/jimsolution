<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newSTOCKTYPE = new Area();
$tbl_name = "tblstocktype";
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newSTOCKTYPE->RecordIsNew("STOCKTYPE",$_POST["STOCKTYPE"],$tbl_name))
        {
              $arrayFields = "STOCKTYPE";
              $formGet = array($_POST["STOCKTYPE"]);
              if ($newSTOCKTYPE->InsertRecord($arrayFields,$formGet,$tbl_name)){
                  $_SESSION['message'] = "Added New STOCK TYPE...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New STOCK TYPE!!!";
                  $_SESSION['msgtype'] = "error";
                //  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "STOCK TYPE Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Area Code Already Exist!!!')</script>";
          //header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $STOCKTYPEid = $_POST['ID'];
        $arrayFields = array("STOCKTYPE");
        $formGet = array($_POST["STOCKTYPE"]);

        $newSTOCKTYPE->UpdateRecord($arrayFields,$formGet,$STOCKTYPEid,$tbl_name);
        $_SESSION['message'] = "STOCK TYPE Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$STOCKTYPEid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $STOCKTYPEid = $_GET['id'];
        $newSTOCKTYPE->DeleteRecord($STOCKTYPEid,$tbl_name);
        $_SESSION['message'] = "Deleted STOCK TYPE... ID : ".$STOCKTYPEid;
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
