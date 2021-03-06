
<div class="row" id="MyModalContent">
<?php

include("../include/initialize.php");


$keyINV = isset($_GET['keyw'])? $_GET['keyw']:"";
$keyDR = isset($_GET['keyw2'])? $_GET['keyw2']:"";
$keyNAME = isset($_GET['keyw3'])? $_GET['keyw3']:"";
$keyCODE =isset($_GET['keyw4'])? $_GET['keyw4']:"";
$stype = $_GET['stype'];
$custID =$_GET['cid'];

$param = ($keyINV!="")? " and (b.INVOICENO like '%".$keyINV."%') " :"";
$param .= ($keyDR!="")? " and (b.DRNO like '%".$keyDR."%') " :"";
$param .= ($keyNAME!="")? " and (PRONAME like '%".$keyNAME."%') " :"";
$param .= ($keyCODE!="")? " and (PROCODE like '%".$keyCODE."%') " :"";

$sql = "SELECT a.Id as PID, a.PROID, a.PRONAME, a.PROCODE, a.UNIT, a.QTY, a.PROPRICE, a.SRQTY, a.DISCPER, a.DISCAMT, 
        b.SLSID, b.INVOICENO, b.DRNO, b.ENTDATE, b.INVDATE, b.DRDATE  FROM tblslsdetl as a, tblslshead as b 
        WHERE a.SLSID = b.SLSID and b.CUSTOMERID='{$custID}' and ((a.QTY - a.SRQTY) >0) {$param}  order by a.PRONAME, a.PROCODE, b.ENTDATE desc";

//echo $sql;
$mydb->setQuery($sql);

$cur = $mydb->loadResultList();


echo '<table id="TBListPopup"  class="table table-bordered">';
echo '<thead> <tr>
    <td width="40%">Product Name</td>
    <td width="12%">Code</td>
    <td width="10%" hidden>Sales ID</td>
    <td width="10%" hidden>Sales PID</td>';
if ($stype !="2") {
    echo ' <td width = "10%" > Invoice No.</td >';

   }else{
    echo ' <td width = "10%" > D . R . No.</td >';
}
echo '    <td width="10%">Sales Date</td>
    <td width="7%">Qty</td>
    <td HIDDEN width="10%">Unit</td>
    <td width="10%">Price/Cost</td>
    <td hidden width="10%">Discount %</td>
    <td hidden width="10%">Disc Amt</td>
    </tr> </thead>';
if ( count($cur)   <= 0){
    echo "No record found with your keyword..."  ;
}
foreach ($cur as $result) {

    $overlimitmark = "";


    echo '<tr height="30px" onclick="updateProductInvoiceDR('.$result->PROID.')" style="color:'.$overlimitmark.'" id="'.$result->PROID.'" >';
    echo '<td class="cname" >'.$result->PRONAME.'</td>';
    echo '<td  class="ccode"  >'.$result->PROCODE.'</td> ';
    echo '<td  HIDDEN class="csid"  >'.$result->SLSID.'</td> ';
    echo '<td  HIDDEN class="cpid"  >'.$result->PID.'</td> ';
    if ($stype !="2") {
        echo '<td  class="cinvoiceno"  >'.$result->INVOICENO.'</td> ';

    }else{
        echo '<td  class="cdrno"  >'.$result->DRNO.'</td> ';
    }


    echo '<td  class="centdate"  >'.$result->ENTDATE.'</td> ';
    echo '<td align="right"   class="cqty" >'.trim(number_format($result->QTY-$result->SRQTY)).'</td>';
    echo '<td hidden class="cunit" >'.$result->UNIT.'</td>';
    echo '<td align="right"   class="cprice" >'.trim(number_format($result->PROPRICE,2)).'</td>';
    echo '<td hidden align="right"   class="cdiscper" >'.trim(number_format($result->DISCPER,2)).'</td>';
    echo '<td hidden align="right"   class="cdiscamt" >'.trim(number_format(($result->DISCAMT/$result->QTY),2)).'</td>';


}
echo '</table>';


?>
    <script>
        if ( typeof ($("#modalLegends").html() ) != "undefined" && $("#modalLegends") ){
            $("#modalLegends").html("") ;
        }
    </script>


</div>

