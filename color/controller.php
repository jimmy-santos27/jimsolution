<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newCOLOR = new Area();
$tbl_name = "tblcolor";
if ($view == "DTDELETE"){
    $view = md5("delete");
}

switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newCOLOR->RecordIsNew("COLOR",$_POST["COLOR"],$tbl_name))
        {
              $arrayFields = "COLOR";
              $formGet = array($_POST["COLOR"]);
              if ($newCOLOR->InsertRecord($arrayFields,$formGet,$tbl_name)){
                  $_SESSION['message'] = "Added New Color...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Color!!!";
                  $_SESSION['msgtype'] = "error";
                //  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "Color Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Area Code Already Exist!!!')</script>";
          //header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $COLORid = $_POST['ID'];
        $arrayFields = array("COLOR");
        $formGet = array($_POST["COLOR"]);

        $newCOLOR->UpdateRecord($arrayFields,$formGet,$COLORid,$tbl_name);
        $_SESSION['message'] = "Color Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$COLORid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $COLORid = $_GET['id'];
        $newCOLOR->DeleteRecord($COLORid,$tbl_name);
        $_SESSION['message'] = "Deleted Color... ID : ".$COLORid;
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
