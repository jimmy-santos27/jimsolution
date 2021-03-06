<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newITEMBRAND = new Area();
$tbl_name = "tblitembrand";
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newITEMBRAND->RecordIsNew("ITEMBRAND",$_POST["ITEMBRAND"],$tbl_name))
        {
              $arrayFields = "ITEMBRAND";
              $formGet = array($_POST["ITEMBRAND"]);
              if ($newITEMBRAND->InsertRecord($arrayFields,$formGet,$tbl_name)){
                  $_SESSION['message'] = "Added New Item Brand...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Item Brand!!!";
                  $_SESSION['msgtype'] = "error";
                //  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "Item Brand Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Area Code Already Exist!!!')</script>";
          //header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $ITEMBRANDid = $_POST['ID'];
        $arrayFields = array("ITEMBRAND");
        $formGet = array($_POST["ITEMBRAND"]);

        $newITEMBRAND->UpdateRecord($arrayFields,$formGet,$ITEMBRANDid,$tbl_name);
        $_SESSION['message'] = "Item Brand Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$ITEMBRANDid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $ITEMBRANDid = $_GET['id'];
        $newITEMBRAND->DeleteRecord($ITEMBRANDid,$tbl_name);
        $_SESSION['message'] = "Deleted Item Brand... ID : ".$ITEMBRANDid;
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
