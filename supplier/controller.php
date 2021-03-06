<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$newSupplier = new Supplier();
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newSupplier->SUPPLIERisnew("suppcode",$_POST["SUPPCODE"]))
        {
              $arrayFields = "suppname,suppcode,address,area,PHONE,EMAILADD,TERMS,DATEJOIN,note,creditlimit,
                            CONTACT, POSITION, MOBILENO, FAXNO, STATNAME, FOREX";
              $formGet = array($_POST["SUPPNAME"],$_POST["SUPPCODE"],$_POST["ADDRESS"],$_POST["AREA"],$_POST["PHONE"],
                            $_POST["EMAILADD"],intval($_POST["TERMS"]),$_POST["DATEJOIN"],$_POST["NOTE"],
                            doubleval($_POST["CREDITLIMIT"]),$_POST["CONTACT"],$_POST["POSITION"],$_POST["MOBILENO"],
                            $_POST["FAXNO"],$_POST["STATNAME"],$_POST["FOREX"]);
              if ($newSupplier->create($arrayFields,$formGet)){
                  $_SESSION['message'] = "Added New Supplier...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Supplier!!!";
                  $_SESSION['msgtype'] = "error";
              }
        }else {
            $_SESSION['message'] = "Supplier Code Already Exist!!!";
            $_SESSION['msgtype'] = "error";
          //  echo "<script>alert('Supplier Code Already Exist!!!')</script>";
          header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $SUPPLIERid = $_POST['SUPPLIERID'];
        $ishidden = "";

        if (isset($_POST["ISHIDDEN"])){
            $ishidden = $_POST["ISHIDDEN"];

        }
        $arrayFields = array("suppname","suppcode","address","area","PHONE","EMAILADD","TERMS","DATEJOIN","note","creditlimit",
                            "CONTACT","POSITION","MOBILENO","FAXNO","STATNAME","FOREX","ISHIDDEN");
        $formGet = array($_POST["SUPPNAME"],$_POST["SUPPCODE"],$_POST["ADDRESS"],$_POST["AREA"],$_POST["PHONE"],
            $_POST["EMAILADD"],intval($_POST["TERMS"]),$_POST["DATEJOIN"],$_POST["NOTE"],
            doubleval($_POST["CREDITLIMIT"]),$_POST["CONTACT"],$_POST["POSITION"],$_POST["MOBILENO"],
            $_POST["FAXNO"],$_POST["STATNAME"],$_POST["FOREX"],$ishidden);


         //$newSupplier->update($Supplierid);
        $newSupplier->updateSave($arrayFields,$formGet,$SUPPLIERid);
        $_SESSION['message'] = "Supplier Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$SUPPLIERid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $SUPPLIERid = $_GET['id'];
        $newSupplier->delete($SUPPLIERid);
        $_SESSION['message'] = "Deleted Supplier... ID : ".$SUPPLIERid;
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
