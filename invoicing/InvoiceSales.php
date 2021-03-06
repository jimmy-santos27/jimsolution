
<div class="row" id="MyModalContent">
<?php

include("../include/initialize.php");


$keyw = $_GET['keyw'];
$stype = $_GET['stype'];
$custID = $_GET['cid'];

$param ="";
$keyId ="INVOICENO";
 if ( $stype =="2" )
{
    $keyId ="DRNO";
}
if ($stype =="3" )
{
    $keyId ="SLSID";
}
$param= " and ({$keyId} like '%".addslashes(trim($keyw))."%'  )  ";

//echo "SELECT *, (TOTAL + DEBITAMT - CREDITAMT - PAIDAMT - SRAMT) AS BALANCE  FROM  tblslshead as b
//        WHERE CUSTOMERID='".$custID."' and ((TOTAL + DEBITAMT - CREDITAMT - PAIDAMT - SRAMT)<>0) ".$param . "  order by {$keyId}, ENTDATE";

$mydb->setQuery("SELECT *, (TOTAL + DEBITAMT - CREDITAMT - PAIDAMT - SRAMT) AS BALANCE  FROM  tblslshead as b 
        WHERE CUSTOMERID='".$custID."' and ((TOTAL + DEBITAMT - CREDITAMT - PAIDAMT - SRAMT) <>0) ".$param . "  order by {$keyId}, ENTDATE  ");

$cur = $mydb->loadResultList();


echo '<table id="TBListPopup"  class="table table-bordered">';
echo '<thead> <tr>
    <td width="10%">Sales ID</td>
    <td width="10%">Invoice No.</td>
    <td width="10%">D.R. No.</td>
    <td width="10%">Date</td>
    <td width="10%">Terms</td>
    <td width="10%">Due</td>
    <td width="10%">Balance</td>';

echo '</tr></thead>';
if ( count($cur)   <= 0){
    echo "No record found with your keyword..." . $keyw  ;
}
foreach ($cur as $result) {



    echo '<tr height="30px" id="INVDR'.$result->SLSID.'" onclick="updateInvoiceDR('.$result->SLSID.')"   >';
    echo '<td class="csid" >'.$result->SLSID.'</td>';
    echo '<td  class="cinvoiceno"  >'.$result->INVOICENO.'</td> ';
    echo '<td  class="cdrno"  >'.$result->DRNO.'</td> ';
    echo '<td  class="centdate"  >'.$result->ENTDATE.'</td> ';
    echo '<td  class="cterms"  >'.$result->TERMS.'</td> ';
    echo '<td  class="cduedate"  >'.$result->DUEDATE.'</td> ';
    echo '<td  class="cbalance" align="right" >'.trim(number_format($result->BALANCE,2)).'</td> </tr>';



}
echo '</table>';


?>



</div>

