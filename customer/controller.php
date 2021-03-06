<?php
require_once("../include/initialize.php");
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$salesman = New Salesman();
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
$newCustomer = new Customer();
switch ($view) {
    case md5('add') :
        $header='add';
        $header=$view;
      if ($newCustomer->customerisnew("custcode",$_POST["CUSTCODE"]))
        {
              $smanname = "";
              $smancode = "";
              if ($_POST["SALESMANID"]!="" and $_POST["SALESMANID"]!="0") {
                  //echo $_POST["SALESMANID"]."dsd";
                  $singleSman = $salesman->single_salesman($_POST["SALESMANID"]);
                  $smanname = $singleSman->smanname;
                  $smancode = $singleSman->smancode;
              }
              $ishidden = "";
              $badacct = "";
                if (isset($_POST["ISHIDDEN"])){
                    $ishidden = $_POST["ISHIDDEN"];

                }
                if (isset($_POST["BADACCT"])){
                    $badacct = $_POST["BADACCT"];
                }

              $arrayFields = "custname,custcode,address,area,PHONE,EMAILADD,TERMS,ENTDATE,note,creditlimit, SALESMANID,
                            CONTACT, STATNAME, DISCOUNTPER, FAXNO, MOBILENO, CUSTTYPE, SMANCODE, SMANNAME, ISHIDDEN, BADACCT, TINNO";
              $formGet = array($_POST["CUSTNAME"],$_POST["CUSTCODE"],$_POST["ADDRESS"],$_POST["AREA"],$_POST["PHONE"],$_POST["EMAILADD"],
                            intval($_POST["TERMS"]),$_POST["ENTDATE"],$_POST["NOTE"],doubleval($_POST["CREDITLIMIT"]), $_POST["SALESMANID"],
                            $_POST["CONTACT"],$_POST["STATNAME"],$_POST["DISCOUNTPER"],$_POST["FAXNO"],$_POST["MOBILENO"],$_POST["CUSTTYPE"],
                            $smancode, $smanname,$ishidden,$badacct,$_POST["TINNO"]);
              if ($newCustomer->create($arrayFields,$formGet)){
                  $_SESSION['message'] = "Added New Customer...";
                  $_SESSION['msgtype'] = "success";
                  redirect("index.php?view=".$view);
              }else {
                  $_SESSION['message'] = "Unable to Add New Customer!!!";
                  $_SESSION['msgtype'] = "error";
                  header("location:javascript://history.go(-1)");
              }
        }else {
            $_SESSION['message'] = "Customer Code Already Exist!!!";
            $_SESSION['msgtype'] = "error";
             echo "<script>alert('Customer Code Already Exist!!!')</script>";
            header("location:javascript://history.go(-1)");

        }
        break;
    case md5('edit') :
        $header='edit';
        $header=$view;
        $customerid = $_POST['CUSTOMERID'];



        $smanname = "";
        $smancode = "";
        if ($_POST["SALESMANID"]!="" and $_POST["SALESMANID"]!="0") {
            //echo $_POST["SALESMANID"]."dsd";
            $singleSman = $salesman->single_salesman($_POST["SALESMANID"]);
            $smanname = $singleSman->smanname;
            $smancode = $singleSman->smancode;
        }
        $ishidden = "";
        $badacct = "";
        if (isset($_POST["ISHIDDEN"])){
            $ishidden = $_POST["ISHIDDEN"];

        }
        if (isset($_POST["BADACCT"])){
            $badacct = $_POST["BADACCT"];
        }

        $arrayFields = array("custname","custcode","address","area","PHONE","EMAILADD","TERMS","ENTDATE","note","creditlimit","SALESMANID",
                        "CONTACT","STATNAME","DISCOUNTPER","FAXNO","MOBILENO","CUSTTYPE","SMANCODE","SMANNAME","ISHIDDEN","BADACCT","TINNO");

        $formGet = array($_POST["CUSTNAME"],$_POST["CUSTCODE"],$_POST["ADDRESS"],$_POST["AREA"],$_POST["PHONE"],$_POST["EMAILADD"],
            intval($_POST["TERMS"]),$_POST["ENTDATE"],$_POST["NOTE"],doubleval($_POST["CREDITLIMIT"]), $_POST["SALESMANID"],
            $_POST["CONTACT"],$_POST["STATNAME"],$_POST["DISCOUNTPER"],$_POST["FAXNO"],$_POST["MOBILENO"],$_POST["CUSTTYPE"],
            $smancode, $smanname,$ishidden,$badacct,$_POST["TINNO"]);

         //$newCustomer->update($customerid);
        $newCustomer->updateSave($arrayFields,$formGet,$customerid);
        $_SESSION['message'] = "Customer Updated...";
        $_SESSION['msgtype'] = "success";
        redirect("index.php?view=".$view."&id=".$customerid);
        break;
    case md5('delete') :
        $header='delete';
        $header=$view;
        $customerid = $_GET['id'];
        $newCustomer->delete($customerid);
        $_SESSION['message'] = "Deleted Customer... ID : ".$customerid;
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
