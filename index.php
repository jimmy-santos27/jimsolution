<?php
require_once("include/initialize.php");
?>
<title><?php echo REGNAME;?></title>
<link rel="shortcut icon" href="images/solution.png">
<script>
   // localStorage.setItem("sidebar", "active");
</script>
<?php


	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."shopping-cart/index.php");
     } 
$content='home.php';
$view = (isset($_GET['page']) && $_GET['page'] != '') ? $_GET['page'] : '';
switch ($view) {
	case '1' :
        $title="Dashboard";	
		$content='home.php';		
		break;	
	default :
	    $title="Dashboard";	
		$content ='home.php';		
}
require_once("theme/templates.php");
?>

