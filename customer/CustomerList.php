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
    $mydb->setQuery("SELECT custname, custcode, CUSTOMERID, TERMS, creditlimit, balance, SMANCODE, SMANNAME, SALESMANID, DISCOUNTPER FROM `tblcustomer` where custname like '" . $keyw . "%' order by custname");
}else{
    $mydb->setQuery("SELECT custname, custcode, CUSTOMERID, TERMS, creditlimit, balance, SMANCODE, SMANNAME, SALESMANID, DISCOUNTPER FROM `tblcustomer` where creditlimit > balance and  custname like '".$keyw."%' order by custname");
}
$cur = $mydb->loadResultList();
echo '<table id="TBListPopup"  class="table table-bordered">';
echo '<thead> <tr><td>Customer</td><td>Code</td><td>Terms</td><td>Credit Limit</td><td>Balance</td><td hidden>Salesman Name</td> <td hidden>Code</td><td hidden>Discount</td></tr> </thead>';
foreach ($cur as $result) {

    $overlimitmark = "";
    if ($result->creditlimit <= $result->balance)
    {
        $overlimitmark = "red";
    }
    echo '<tr onclick="updateCustomer('.$result->CUSTOMERID.')" style="color:'.$overlimitmark.'" id="'.$result->CUSTOMERID.'" data="'.$result->CUSTOMERID.'">';
    echo '<td class="cname" >'.$result->custname.'</td>';
    echo '<td  class="ccode"  >'.$result->custcode.'</td> ';
    echo '<td class="cterms" >'.$result->TERMS.'</td>';
    echo '<td align="right"   class="ccreditlimit" >'.trim(number_format($result->creditlimit,2)).'</td>';
    echo '<td align="right"    class="cbalance" >'.trim(number_format($result->balance,2)).'</td>';
    echo '<td hidden  class="csmanname" >'.$result->SMANNAME.'</td>';
    echo '<td  hidden class="csmancode" >'.$result->SMANCODE.'</td>';
    echo '<td  hidden class="csmanid" >'.$result->SALESMANID.'</td>';
    echo '<td  hidden class="cdiscountper" >'.$result->DISCOUNTPER.'</td></tr>';


}
echo '</table>';


?>


</div>
<script>

    if ( typeof ($("#modalLegends").html() ) != "undefined" && $("#modalLegends") ){
        $("#modalLegends").html("<span style='color: blue;'> [ Blue: Normal ] </span>\n" +
            "  <span style='color: red;\'>[ Red : Over Limit ] </span>") ;
    }
</script>