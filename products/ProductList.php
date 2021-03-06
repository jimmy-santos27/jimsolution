
<div class="row" id="MyModalContent">
<?php

include("../include/initialize.php");


$keyw = $_GET['keyw'];

$keyw2 = $_GET['keyw2'];
$keyprice = $_GET['keyprice'];
$param ="";
if ($keyw !="")
{
    $param= " where PRONAME like '".addslashes(trim($keyw))."%'  ";
} elseif ($keyw2 !="")
{
    $param= " where PROCODE like '".addslashes(trim($keyw2))."%'  ";
}
$mydb->setQuery("SELECT PROID, PRONAME, PROCODE, UNIT, PROQTY, PROPRICE, WPROPRICE, PPROPRICE, SMANRATE, REORDER, FLOORRATE,".
                "FLOORPRICE, QTYPERBOX, PURPRICE, FORPURPRICE, SUPPITEM FROM `tblproduct`  ".$param . "  order by PRONAME, PROCODE");
$cur = $mydb->loadResultList();
echo '<table id="TBListPopup"  class="table table-bordered">';
echo '<thead> <tr>
    <td width="45%">Product Name</td>
    <td width="15%">Code</td>
    
    <td width="10%">Onhand Qty</td>
    <td width="10%" hidden>Re-order</td>
    <td width="10%">Unit</td>
    <td width="10%">Price/Cost</td>
    <td width="10%" hidden>Floor Price</td>
    <td width="10%" hidden>Floor Rate</td>
    <td width="10%" hidden>Foreign Cost</td>
    <td width="10%" hidden>Supp Item No</td>
    <td width="10%" hidden>Qty Per Box</td>
   
    </tr> </thead>';
if ( count($cur)   <= 0){
    echo "No record found with your keyword..." . $keyw . " / ". $keyw2;
}
foreach ($cur as $result) {

    $overlimitmark = "";

    if ($result->PROQTY<0){ $overlimitmark = " red"; }
    else if ($result->PROQTY == 0){ $overlimitmark = " black"; }
    else if ($result->PROQTY<=$result->REORDER){ $overlimitmark = " orange"; }

    echo '<tr height="30px" onclick="updateProduct('.$result->PROID.')" style="color:'.$overlimitmark.'" id="'.$result->PROID.'" >';
    echo '<td class="cname" >'.$result->PRONAME.'</td>';
    echo '<td  class="ccode"  >'.$result->PROCODE.'</td> ';

    echo '<td align="right"   class="cqty" >'.trim(($result->PROQTY)).'</td>';
    echo '<td hidden align="right"   class="creorder" >'.trim(($result->REORDER)).'</td>';
    echo '<td class="cunit" >'.$result->UNIT.'</td>';
    // Purchase Cost
    if ($keyprice==4){
        echo '<td align="right"    class="cprice" >'.trim(($result->PURPRICE)).'</td>';
    }
    //Wholesale Price
    if ($keyprice==3){
        echo '<td align="right"    class="cprice" >'.trim(($result->WPROPRICE)).'</td>';
    }
    //Provincial Price
    if ($keyprice==2){
        echo '<td align="right"    class="cprice" >'.trim(($result->PPROPRICE)).'</td>';
    }
    //Retail Price
    if ($keyprice<=1){
        echo '<td align="right"    class="cprice" >'.trim(($result->PROPRICE)).'</td>';
    }

    echo '<td  hidden class="cfloorprice" >'.trim( ($result->FLOORPRICE)).'</td>';
    echo '<td  hidden class="cfloorrate" >'.trim(($result->FLOORRATE)).'</td>';
    echo '<td  hidden class="cforpurprice" >'.trim(($result->FORPURPRICE)).'</td> ';
    echo '<td  hidden class="csuppitem" >'.$result->SUPPITEM.'</td>';
    echo '<td  hidden class="cqtyperbox" >'.$result->QTYPERBOX.'</td></tr>';

}
echo '</table>';


?>



</div>
<script>
if ( typeof ($("#modalLegends").html() ) != "undefined" && $("#modalLegends") ){
    $("#modalLegends").html("<span style='color: blue;'> [ Blue: Normal ] </span>\n" +
    "  <span style='color: red;'>[ Red : Negative ] </span>"+
    "<span style='color: black;'>[ Black : Zero ] </span>" +
    "<span style='color: orange;'>[ Orange : Minimum Qty ] </span>") ;
}
</script>