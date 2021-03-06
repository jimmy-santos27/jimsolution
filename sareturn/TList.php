<?php
$keyId  =   $_GET["id"];
include("../include/initialize.php");

if ( (intval($keyId) !=  0)) {


    $mydb->setQuery("SELECT a.*, (a.QTY -a.QTYRET) as qtybal, b.SUPPLIERID FROM tblpurchasedetl as a, tblpurchasehead as b where a.RRID = b.RRID and b.SUPPLIERID=".$keyId."  and (a.QTY -a.QTYRET) > 0   order by a.rrno, a.PRONAME");
    //echo  "SELECT a.*, (a.QTY -a.QTYRET) as qtybal, b.SUPPLIERID FROM tblpurchasedetl as a, tblpureturnhead as b where a.RRID = b.RRID and b.SUPPLIERID=".$keyId."  and (a.QTY -a.QTYRET) > 0   order by a.rrno, a.PRONAME";
    $cur = $mydb->loadResultList();

    if (count($cur) <=0){
        echo "Sorry!!! No Purchases Avaialable for this Supplier...";
    }else {

?>


        <!-- /.panel -->

        <input type="text" class="form-control input-sm"  id="myInput" onkeyup="myTblFilter('myInput','myTable')" placeholder="Search" title="Type in a name">

        <div class="tableFixHead">

        <table id="myTable"   class="table table-bordered" style="font-size:12px" cellspacing="0" >

            <thead>
            <tr>
                <!-- <th>#</th> -->
                <!-- <th>Model</th>  -->
                <th style="text-align: center; width: 12%" >
                    <input type="checkbox" name="chkall" id="chkall" onclick="return checkall2('selector[]','chkall','myTable');"> R.R. No.</th>
                <th  style="text-align: center; width: 30%" >Product</th>
                <th  style="text-align: center; width: 10%" >Qty</th>
                <!-- <th>Category</th> -->
                <th  style="text-align: center; width: 10%" >Price</th>
                <th style="text-align: center; width: 7%" >%</th>
                <th style="text-align: center; width: 10%" >Discount</th>
                <th  style="text-align: center; width: 10%" >Amount</th>
                <!-- <th width="6%">Action</th>  -->

            </tr>
            </thead>

            <tbody >
            <?php
            $ctr = 0;
            foreach ($cur as $result) {
                echo '<tr style="font-size: 12px; height: 20px; vertical-align: middle" >';
                echo '<td onclick="chkSelectOn('.$ctr.')"  >
                <input type="checkbox"  onchange="chkSelect('.$ctr.')" name="selector[]" id="selector[]" value="'.$ctr. '"/>
                '.$result->rrno. '</td>';
                echo '<td onclick="chkSelectOn('.$ctr.')"  >'.$result->PRONAME.'  
                    <input hidden id="RRNOselector[]" name="RRNOselector[]" type="text" value="'.$result->rrno.'">
                    <input hidden id="RRPIDselector[]" name="RRPIDselector[]" type="text" value="'.$result->Id.'">
                    <input hidden id="POPIDselector[]" name="POPIDselector[]" type="text" value="'.$result->POPID.'">  
                    <input hidden id="PROCODEselector[]" name="PROCODEselector[]" type="text" value="'.$result->PROCODE.'">
                    <input hidden id="PROIDselector[]" name="PROIDselector[]" type="text" value="'.$result->PROID.'">
                    <input hidden id="PRONAMEselector[]" name="PRONAMEselector[]" type="text" value="'.$result->PRONAME.'"></td>';

                echo '<td style="text-align: right"><input readonly  class="form-control input-sm"   id="QTYselector[]" style="text-align: right" name="QTYselector[]" type="number" max="'.$result->QTY.'"  value="'.$result->QTY.'"  onfocusout="updateAmount2('.$ctr.')"> </td>';
                echo '<td style="text-align: right"><input  readonly class="form-control input-sm"  id="PURPRICEselector[]" style="text-align: right" name="PURPRICEselector[]" type="number"   value="'.$result->PURPRICE.'"    onfocusout="updateAmount2('.$ctr.')"> </td>';
                echo '<td style="text-align: right"><input  readonly   class="form-control input-sm"  id="DISCPERselector[]" style="text-align: right" name="DISCPERselector[]" type="number"  value="'.$result->DISCPER.'"    onfocusout="updateAmount2('.$ctr.')"></td>';
                echo '<td style="text-align: right"><input  readonly  class="form-control input-sm"  id="DISCAMTselector[]" style="text-align: right" name="DISCAMTselector[]" type="number"  value="'.$result->DISCAMT.'"   onfocusout="updateAmount2('.$ctr.')"> </td>';
                echo '<td style="text-align: right"><input readonly class="form-control input-sm"  id="AMOUNTselector[]" style="text-align: right" name="AMOUNTselector[]" type="number"  value="'.$result->AMOUNT.'"  > </td></tr>';
                $ctr = $ctr + 1;
            }
            ?>
            </tbody>


        </table>

</div>
        <?php
    }

 }else{  echo "Please Choose Supplier...";}


?>


<!-- Page-Level Demo Scripts - Tables - Use for reference -->

