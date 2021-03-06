<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newUser = new User();
$bypass = true;
if ($view == "DTDELETE"){
 $view = md5("delete");
}

switch ($view) {
 case md5('add') :
  $bypass = false;
  $header='add';
  $header=$view;
  if ($newUser->userisnew("U_NAME",$_POST["U_NAME"]))
  {

   $arrayFields = "U_USERNAME,U_NAME,U_ROLE,U_PASS";

   $formGet = array($_POST["U_USERNAME"],$_POST["U_NAME"],$_POST["U_ROLE"],sha1($_POST["U_PASS"]));

   if ($newUser->create($arrayFields,$formGet)){
    $_SESSION['message'] = "Added New User...";
    $_SESSION['msgtype'] = "success";
    redirect("index.php?view=".$view);
   }else {
    $_SESSION['message'] = "Unable to Add New User!!!";
    $_SESSION['msgtype'] = "error";
    header("location:javascript://history.go(-1)");
   }
  }else {
   $_SESSION['message'] = "User Code Already Exist!!!";
   $_SESSION['msgtype'] = "error";
   //  echo "<script>alert('User Code Already Exist!!!')</script>";
   header("location:javascript://history.go(-1)");

  }
  break;
 case md5('edit') :
  $bypass = false;
  $header='edit';
  $header=$view;
  $Userid = $_POST['USERID'];
  $arrayFields = array("U_USERNAME","U_NAME","U_ROLE","U_PASS");
  $formGet = array($_POST["U_USERNAME"],$_POST["U_NAME"],$_POST["U_ROLE"],sha1($_POST["U_PASS"]));
  //$newUser->update($Userid);
  $newUser->updateSave($arrayFields,$formGet,$Userid);
  $_SESSION['message'] = "User Updated...";
  $_SESSION['msgtype'] = "success";
  redirect("index.php?view=".$view."&id=".$Userid);
  break;
 case md5('delete') :
  $header='delete';
  $header=$view;
  $Userid = $_GET['id'];
  $newUser->delete($Userid);
  $_SESSION['message'] = "Deleted User... ID : ".$Userid;
  //$_SESSION['msgtype'] = "success";
  echo '{"type" : "success" }';


  break;

 case ('AllMenu') :

  $TranID = $_GET["id"];
  $Type = $_GET["type"];
  $Status =$_GET["status"];
  $UID =$_GET["uid"];
  //echo $TranID . " - ". $UID . " - ". $Type. " - ".$Status;
  $MenuList= new MenuList();
  try {
   $MenuList->accessToggle($UID, $Type, $Status);

   echo '{"type" : "success" }';
  }catch (Exception $e){
     echo '{"type" : {$e} }';
  }

  break;
 case ('SingleMenu') :

  $TranID = $_GET["id"];
  $Type = $_GET["type"];
  $Status =$_GET["status"];
  $chkAdd =$_GET["chkAdd"];
  $chkEdit =$_GET["chkEdit"];
  $chkDelete =$_GET["chkDelete"];
  $UID =$_GET["uid"];
  //echo $TranID . " - ". $UID . " - ". $Type. " - ".$Status;
  $MenuList= new MenuList();
  try {
   $MenuList->singleToggle($TranID, $UID, $Type, $Status, $chkAdd, $chkEdit, $chkDelete);

   echo '{"type" : "success" }';
  }catch (Exception $e){
   echo '{"type" : {$e} }';
  }

  break;
 default :
  $_SESSION['message'] = "";
  $_SESSION['msgtype'] = "";
  redirect("index.php?view=".$view);

}

//require_once ("../theme/templates.php");
?>
