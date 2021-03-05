<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newCOUNTRY = new Area();
$tbl_name = "tblcountry";
if ($view == "DTDELETE"){
    $view = md5("delete");
}

switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newCOUNTRY->RecordIsNew("COUNTRY",$_POST["COUNTRY"],$tbl_name))
        {
              $arrayFields = "COUNTRY,FOREX";
              $formGet = array($_POST["COUNTRY"],$_POST["FOREX"]);
              if ($newCOUNTRY->InsertRecord($arrayFields,$formGet,$tbl_name)){
                  $_SESSION['message'] = "Added New Country...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Country!!!";
                  $_SESSION['msgtype'] = "error";
                  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "Country Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Area Code Already Exist!!!')</script>";
          header("location:javascript://history.go(-1)");

        }
      echo $_SESSION['message'];
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $COUNTRYid = $_POST['ID'];
        $arrayFields = array("COUNTRY","FOREX");
        $formGet = array($_POST["COUNTRY"],$_POST["FOREX"]);

        $newCOUNTRY->UpdateRecord($arrayFields,$formGet,$COUNTRYid,$tbl_name);
        $_SESSION['message'] = "Country Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$COUNTRYid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $COUNTRYid = $_GET['id'];
        $newCOUNTRY->DeleteRecord($COUNTRYid,$tbl_name);
        $_SESSION['message'] = "Deleted Country... ID : ".$COUNTRYid;
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
