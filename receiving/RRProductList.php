
<div class="row" id="MyModalContent">
    <?php

    include("../include/initialize.php");


    $keyw = $_GET['keyw'];
    $keyw2 = $_GET['keyw2'];
    $keyw3 = $_GET['keyw3'];
    $keyw4 = $_GET['keyw4'];
    $keyprice = $_GET['keyprice'];
    $param ="";

    if ($keyw !="")
    {
        $param= " a.rrno like '".addslashes(trim($keyw))."%'  and ";
    }
    if ($keyw2 !="")
    {
        $param .= " a.PRONAME like '".addslashes(trim($keyw2))."%' and ";
    }else if ($keyw4 !="")
    {
        $param .= " a.PROCODE like '".addslashes(trim($keyw4))."%' and ";
    }
    $query="dfasdfas";
    $query = "SELECT a.*, (a.qty - QTYRET) as qbal, b.SUPPLIERID, b.entdate FROM tblpurchasedetl as a, tblpurchasehead  as b where ".$param . " b.RRID = a.RRID and b.SUPPLIERID = '". $keyw3 . "' and (a.qty - a.QTYRET) > 0 order by a.PRONAME, a.PROCODE, a.rrno";
    //echo $query;

    $mydb->setQuery($query);

    $cur = $mydb->loadResultList();
    echo '<table id="TBListPopup"  class="table table-bordered">';
    echo '<thead> <tr>
    <td width="40%">Product Name</td>
    <td width="15%">Code</td>
    <td width="15%">R.R. No.</td>
    <td width="10%">Qty</td>
    <td width="10%">Unit</td>
    <td HIDDEN width="10%">Qty per Box</td>
    <td hidden width="10%">For. Cost</td>
    <td width="10%">Php Cost</td>
    <td width="10%" hidden>Php Amt.</td>
    <td width="10%" hidden>For. Amt.</td>
    <td width="10%" hidden>Floor Price</td>
    <td width="10%" hidden>Floor Rate</td>
    <td width="10%" hidden>Supp Item No</td>
    <td width="10%" hidden>Product ID</td>
    </tr> </thead>';
    if ( count($cur)   <= 0){
        echo "No record found with your keyword..." . $keyw . " / ". $keyw2;
    }
    foreach ($cur as $result) {
        $overlimitmark = "";
        echo '<tr height="30px" onclick="updateRRProduct('.$result->Id.')" style="color:'.$overlimitmark.'" id="'.$result->Id.'" >';
        echo '<td class="cname" >'.$result->PRONAME.'</td>';
        echo '<td  class="ccode"  >'.$result->PROCODE.'</td> ';
        echo '<td  class="crrno"  >'.$result->rrno.'</td> ';
        echo '<td align="right"   class="cqty" >'.trim(($result->qbal)).'</td>';
        echo '<td  class="cunit"  >'.$result->UNIT.'</td> ';
        echo '<td HIDDEN align="right"   class="cqtybox" >'.trim(($result->QTYPERBOX)).'</td>';
        echo '<td hidden align="right"   class="cforpurprice" >'.trim(($result->FORPURPRICE)).'</td>';
        echo '<td align="right"   class="cpurprice" >'.trim(($result->PURPRICE)).'</td>';
        echo '<td hidden align="right"   class="cforamount" >'.trim(($result->FORAMOUNT)).'</td>';
        echo '<td hidden align="right"   class="camount" >'.trim(($result->AMOUNT)).'</td>';
        echo '<td  hidden class="cfloorprice" >'.trim( ($result->FLOORPRICE)).'</td>';
        echo '<td  hidden class="cfloorrate" >'.trim(($result->FLOORRATE)).'</td>';
        echo '<td  hidden class="csuppitem" >'.$result->SUPPITEM.'</td>';
        echo '<td  hidden class="cproid" >'.$result->PROID.'</td>';


    }
    echo '</table>';


    ?>



</div>
<div class="legends">
    <!---
            <span style="color: blue;">[ Blue: Normal ] </span>
            <span style="color: red;">[ Red : Negative ] </span>
            <span style="color: black;">[ Black : Zero ] </span>
            <span style="color: orange;">[ Orange : Minimum Qty ] </span>
    -->
</div>
