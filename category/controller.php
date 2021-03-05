<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newCategory = new Category();
if ($view == "DTDELETE"){
    $view = md5("delete");
}

switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newCategory->categoryisnew("CATEGORIES",$_POST["CATEGORIES"]))
        {
              $arrayFields = "CATEGORIES";
              $formGet = array($_POST["CATEGORIES"] );
              if ($newCategory->create($arrayFields,$formGet)){
                  $_SESSION['message'] = "Added New Category...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Category!!!";
                  $_SESSION['msgtype'] = "error";
                  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "Category Code Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Category Code Already Exist!!!')</script>";
            header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $Categoryid = $_POST['CATEGID'];
        $arrayFields = array("CATEGORIES" );
        $formGet = array($_POST["CATEGORIES"] );

        $newCategory->updateSave($arrayFields,$formGet,$Categoryid);
        $_SESSION['message'] = "Category Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$Categoryid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $Categoryid = $_GET['id'];
        $newCategory->delete($Categoryid);
        $_SESSION['message'] = "Deleted Category... ID : ".$Categoryid;
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
