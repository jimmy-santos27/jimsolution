<link rel="shortcut icon" href="../images/solution.png">
<?php
require_once("../include/initialize.php");
//checkAdmin();
  	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$Customers = new Customer();
$title="Customer Receivables";
$_SESSION["ARCUSTOMERID"]="";
$CUSTOMERID="";
$CUSTNAME = "";
$CREDITLIMIT = "";
if (isset($_POST['CUSTOMERID'])){
    $CUSTOMERID=$_POST['CUSTOMERID'];
    $_SESSION["ARCUSTOMERID"]=$CUSTOMERID;
    $CUSTNAME = $_POST['CUSTNAME'];

  //  echo $CUSTNAME;
}
$ContentIcon ="fa fa-group fa-fw";
$datatablerows = 25;
switch ($view) {




    default :
		$content    = 'list.php';		
}
require_once ("../theme/templates.php");

?>


<script>

</script>