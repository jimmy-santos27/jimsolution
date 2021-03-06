<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newSTATUSTYPE = new Area();
$tbl_name = "tblaccountstatus";
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
        if ($newSTATUSTYPE->RecordIsNew("STATNAME",$_POST["STATNAME"],$tbl_name))
        {
              $arrayFields = "STATNAME";
              $formGet = array($_POST["STATNAME"]);
              if ($newSTATUSTYPE->InsertRecord($arrayFields,$formGet,$tbl_name)){
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
        $STATUSTYPEid = $_POST['ID'];
        $arrayFields = array("STATNAME");
        $formGet = array($_POST["STATNAME"]);

        $newSTATUSTYPE->UpdateRecord($arrayFields,$formGet,$STATUSTYPEid,$tbl_name);
        $_SESSION['message'] = "STOCK TYPE Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$STATUSTYPEid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $STATUSTYPEid = $_GET['id'];
        $newSTATUSTYPE->DeleteRecord($STATUSTYPEid,$tbl_name);
        $_SESSION['message'] = "Deleted STOCK TYPE... ID : ".$STATUSTYPEid;
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
