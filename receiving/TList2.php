<?php
$keyId  =   $_GET["id"];
include("../include/initialize.php");

if ( (intval($keyId) !=  0)) {

    $query = "SELECT a.*, (a.QTY -a.QTYRECEIVED) as qtybal, b.SUPPLIERID FROM tblpodetl as a, tblpohead as b ".
            " where a.POID = b.POID and b.SUPPLIERID=".$keyId."  and (a.QTY -a.QTYRECEIVED) > 0   order by a.pono, a.PRONAME";

    $mydb->setQuery($query);
    $cur = $mydb->loadResultList();

    if (count($cur) <=0){
        echo "Sorry!!! No Purchase Order Avaialable for this Supplier...";
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
                    <input type="checkbox" name="chkall" id="chkall" onclick="return checkall2('selector[]','chkall','myTable');"> P.O. No.</th>
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
                '.$result->pono. '</td>';
                echo '<td onclick="chkSelectOn('.$ctr.')"  >'.$result->PRONAME.'  
                    <input hidden id="POPIDselector[]" name="POPIDselector[]" type="text" value="'.$result->Id.'">
                    <input hidden id="PONOselector[]" name="PONOselector[]" type="text" value="'.$result->pono.'">                    
                    <input hidden id="POIDselector[]" name="POIDselector[]" type="text" value="'.$result->POID.'">
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

