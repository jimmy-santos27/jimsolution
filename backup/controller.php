<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newArea = new Area();
switch ($view) {
    case 'add' :
      if ($newArea->areaisnew("AREA",$_POST["AREA"]))
        {
              $arrayFields = "AREA";
              $formGet = array($_POST["AREA"]);
              if ($newArea->create($arrayFields,$formGet)){
                  $_SESSION['message'] = "Added New Area...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Area!!!";
                  $_SESSION['msgtype'] = "error";
                //  redirect("index.php?view=".$view);
              }
        }else {
            $_SESSION['message'] = "Area Code Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Area Code Already Exist!!!')</script>";
          //header("location:javascript://history.go(-1)");

        }
        break;
    case 'edit' :
        $Areaid = $_POST['AREAID'];
        $arrayFields = array("AREA");
        $formGet = array($_POST["AREA"]);

        $newArea->updateSave($arrayFields,$formGet,$Areaid);
        $_SESSION['message'] = "Area Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$Areaid);
        break;
    case 'delete' :
        $Areaid = $_GET['id'];
        $newArea->delete($Areaid);
        $_SESSION['message'] = "Deleted Area... ID : ".$Areaid;
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view);
        break;
    default :
        $_SESSION['message'] = "";
        $_SESSION['msgtype'] = "";
        redirect("index.php?view=".$view);

}

//require_once ("../theme/templates.php");
?>
