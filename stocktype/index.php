<link rel="shortcut icon" href="../images/solution.png">
<?php
require_once("../include/initialize.php");
//checkAdmin();
  	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$title="Stock Type";
$ContentIcon ="fa fa-tags fa-fw";
switch ($view) {

    case md5('add') :
        $header='add';
        $content    = 'add.php';
        break;

    case md5('edit') :
        $header='edit';
        $content    = 'edit.php';
        break;

    case md5('view') :
        $content    = 'view.php';
        break;


    default :
		$content    = 'list.php';		
}
require_once ("../theme/templates.php");
?>
  
