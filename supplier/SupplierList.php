<div class="row" id="MyModalContent">
<?php

include("../include/initialize.php");
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
$UserAccess = new User();
$UserRS = $UserAccess->single_user($_SESSION['USERID']);
$keyw = trim($_GET['keyw']);
if ($_SESSION['U_ROLE'] == "Administrator" || $_SESSION['U_ROLE'] == "Supervisor" || $UserRS->OVERWRITE >=1) {
    $mydb->setQuery("SELECT suppname, suppcode, SUPPLIERID, terms, creditlimit, balance, FOREX, STATNAME FROM `tblsupplier` where suppname like '" . $keyw . "%' order by suppname");
}else{
    $mydb->setQuery("SELECT suppname, suppcode, SUPPLIERID, terms, creditlimit, balance, FOREX, STATNAME FROM `tblsupplier` where creditlimit > balance and  suppname like '".$keyw."%' order by suppname");
}
$cur = $mydb->loadResultList();
echo '<table id="TBListPopup"  class="table table-bordered">';
echo '<thead> <tr><td>Supplier</td>
        <td>Code</td>
        <td>Status</td>
        <td hidden>Terms</td>
        <td>Credit Limit</td>
        <td>Balance</td>
        <td hidden>Currency</td>
         </tr> </thead>';
foreach ($cur as $result) {

    $overlimitmark = "";
    if ($result->creditlimit <= $result->balance)
    {
        $overlimitmark = "red";
    }
    echo '<tr onclick="updateSUPPLIER('.$result->SUPPLIERID.')" style="color:'.$overlimitmark.'" id="'.$result->SUPPLIERID.'" data="'.$result->SUPPLIERID.'">';
    echo '<td class="cname" >'.$result->suppname.'</td>';
    echo '<td  class="ccode"  >'.$result->suppcode.'</td> ';
    echo '<td   class="cstatname" >'.$result->STATNAME.'</td>';
    echo '<td hidden class="cterms" >'.$result->terms.'</td>';
    echo '<td align="right"   class="ccreditlimit" >'.trim(number_format($result->creditlimit,2)).'</td>';
    echo '<td align="right"    class="cbalance" >'.trim(number_format($result->balance,2)).'</td>';
     echo '<td hidden  class="cforex" >'.$result->FOREX.'</td>';


}
echo '</table>';


?>


</div>
<script>
    if ( typeof ($("#modalLegends").html() ) != "undefined" && $("#modalLegends") ){
        $("#modalLegends").html("<span style='color: blue;'> [ Blue: Normal ] </span>\n" +
            "  <span style='color: red;'>[ Red : Negative ] </span>") ;
    }
</script>
