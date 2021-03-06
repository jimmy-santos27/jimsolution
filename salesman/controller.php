<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newSalesman = new Salesman();
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newSalesman->salesmanisnew("smancode",$_POST["SMANCODE"]))
        {
              $arrayFields = "smanname,smancode,address,area,PHONE,EMAILADD,DATEJOIN,note, RANK, RATE";
              $formGet = array($_POST["SMANNAME"],$_POST["SMANCODE"],$_POST["ADDRESS"],$_POST["AREA"], $_POST["PHONE"],
                        $_POST["EMAILADD"],$_POST["DATEJOIN"],$_POST["NOTE"],$_POST["RANK"],$_POST["RATE"]);
              if ($newSalesman->create($arrayFields,$formGet)){
                  $_SESSION['message'] = "Added New Salesman...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Salesman!!!";
                  $_SESSION['msgtype'] = "error";
              }
        }else {
            $_SESSION['message'] = "Salesman Code Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Salesman Code Already Exist!!!')</script>";
          header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $Salesmanid = $_POST['SALESMANID'];
        $arrayFields = array("smanname","smancode","address","area","PHONE","EMAILADD","DATEJOIN","note","RANK","RATE");
        $formGet = array($_POST["SMANNAME"],$_POST["SMANCODE"],$_POST["ADDRESS"],$_POST["AREA"],$_POST["PHONE"],$_POST["EMAILADD"],
            $_POST["DATEJOIN"],$_POST["NOTE"],$_POST["RANK"],$_POST["RATE"]);
        //$newSalesman->update($Salesmanid);
        $newSalesman->updateSave($arrayFields,$formGet,$Salesmanid);
        $_SESSION['message'] = "Salesman Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$Salesmanid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $Salesmanid = $_GET['id'];
        $newSalesman->delete($Salesmanid);
        $_SESSION['message'] = "Deleted Salesman... ID : ".$Salesmanid;
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
