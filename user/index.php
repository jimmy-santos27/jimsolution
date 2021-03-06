<link rel="shortcut icon" href="../images/solution.png">
<?php
require_once("../include/initialize.php");
if(!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
if (!isset($_SESSION['U_ROLE']) && ($_SESSION['U_ROLE'] !='Administrator' && $_SESSION['U_ROLE'] !='Supervisor')){
    redirect(web_root."index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$title="Users";
$header=$view;
$ContentIcon ="fa fa-group fa-fw";
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
require_once ("../theme/insidePagePanel.php");


//require_once '../theme/Templates.php';
 //unset($_POST);
?>





<style>

    #repList{
        height: 480px;
        overflow-y: auto;

        border-radius:3px;
        border: 1px solid #e7e7ff;
        padding: 0px;
        margin: 0px;

    }
    #repFields{
        margin-left: 5px;
        padding-left: 15px;
        height: 350px;
        overflow-y: auto;

        border-radius:3px;
        border: 1px solid #2e6da4;
        padding: 0px;
        margin: 0px;

    }
    #repFields table tr td{
        padding-left: 15px
    }
    #repFields table{
        padding-left: 15px
        width: 100%;
        font-size: smaller;
        color: #3e6b96;
    }
    #repList table{
        width: 100%;
        font-size: 10pt;
        color: #3e6b96;
    }
    #repList td{
        height: 30px;
        vertical-align: middle;

    }
    .table-hover tr:hover{
        background: #2e6da4;
        color: #00b3ff;
        cursor: pointer;

    }
    .selected-rep{
        background: #e8f2ff;
        color: #00b3ff;
    }
    #RepModal{
        z-index: 1600;
        color: #2e6da4;
        font-size: 14px;

    }
    .modal-body{
        padding: 5px 20px 5px 20px;
    }
    .modal-dialog{
        width: 100%;
        height:100%;
    }
    #ListBody{

        overflow-y: auto;
    }


    .table-fixed {
        width: 100%;
        font-size: xx-small;

        border-radius: 5px;
    }
    .table-fixed tbody{
        width: 100%;
        border: 1px solid #d0d2d0;
        height: 180px;
        overflow-y:auto;
        display:block;
        font-size: xx-small;

    }
    .table-fixed thead {
        display: inherit;
        border-top: 1px solid #d0d2d0;
        border-left: 1px solid #d0d2d0;
        border-right: 1px solid #d0d2d0;
    }

    .table-fixed  tfoot {
        display: inherit;
        border-bottom: 0px;
    }
    .table-fixed  tfoot {
        padding: 0px;
    }

    .table-fixed tr{
        border-bottom: 1px solid #d0d2d0;
    }
    .table-fixed thead {
        background-color: #ffffff;
        border-color:#cfd1cf;
    }
    #myInput {
        background-image: url('../css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    [contenteditable] {
        border: solid 1px lightgreen;
        padding: 5px;
        border-radius: 3px;
    }
    #pageNav >ul >li >a:hover{
        cursor: pointer;
    }
    #pageNav >ul >li >a{

        color: #a0a0a0;
        cursor: default;
        background-color: transparent;
        border: 1px solid #ddd;
    }
    #pageNav >ul >li.active >a{
        color: #3b5998;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }

</style>



<script>
    var txtParam="";
    var button='<button class="close" type="button" title="Remove this page">×</button>';
    var tabID = 1;
    function resetTab(){
        var tabs=$("#tab-list li:not(:first)");
        var len=1
        $(tabs).each(function(k,v){
            len++;
            $(this).find('a').html('Tab ' + len + button);
        })
        tabID--;
    }

    function wAnd(param1, param2){
        if ((param1  ) !=""){
            return " and ";
        }else { return "";}

    }



</script>