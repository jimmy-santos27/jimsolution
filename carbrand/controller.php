<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newCARBRAND = new Area();
$tbl_name = "tblcarbrand";
if ($view == "DTDELETE"){
    $view = md5("delete");
}

switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newCARBRAND->RecordIsNew("CARBRAND",$_POST["CARBRAND"],$tbl_name))
        {
              $arrayFields = "CARBRAND";
              $formGet = array($_POST["CARBRAND"]);
              if ($newCARBRAND->InsertRecord($arrayFields,$formGet,$tbl_name)){
                  $_SESSION['message'] = "Added New CAR BRAND...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New CAR BRAND!!!";
                  $_SESSION['msgtype'] = "error";
                //  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "CAR BRAND Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Area Code Already Exist!!!')</script>";
          //header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $CARBRANDid = $_POST['ID'];
        $arrayFields = array("CARBRAND");
        $formGet = array($_POST["CARBRAND"]);

        $newCARBRAND->UpdateRecord($arrayFields,$formGet,$CARBRANDid,$tbl_name);
        $_SESSION['message'] = "CAR BRAND Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$CARBRANDid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $CARBRANDid = $_GET['id'];
        $newCARBRAND->DeleteRecord($CARBRANDid,$tbl_name);
        $_SESSION['message'] = "Deleted CAR BRAND... ID : ".$CARBRANDid;
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
