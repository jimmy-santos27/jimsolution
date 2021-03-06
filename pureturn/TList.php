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
                    <th  style="text-align: center; width: 7%" >Qty</th>
                    <th  style="text-align: center; width: 8%" >Unit</th>
                    <th  style="text-align: center; width: 7%" >Qty/Box</th>
                    <th  style="text-align: center; width: 8%" >For. Cost</th>
                    <th  style="text-align: center; width: 10%" >For. Amt</th>
                    <!-- <th>Category</th> -->
                    <th  style="text-align: center; width: 8%" >Php Cost</th>
                    <th  style="text-align: center; width: 10%" >Php Amt</th>

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
                    <input hidden id="POPIDselector[]" name="POPIDselector[]" type="text" value="'.$result->Id.'"></td>';

                    echo '<td style="text-align: right">'.number_format($result->qtybal,0).'</td>';
                    echo '<td style="text-align: right">'.$result->UNIT.'</td>';
                    echo '<td style="text-align: right">'.$result->QTYPERBOX.'</td>';
                    echo '<td style="text-align: right">'.number_format($result->FORPURPRICE,2).'</td>';
                    echo '<td style="text-align: right">'.number_format(($result->FORPURPRICE * $result->qtybal),2).'</td>';
                    echo '<td style="text-align: right">'.number_format($result->PURPRICE,2).'</td>';
                    echo '<td style="text-align: right">'.number_format(($result->PURPRICE * $result->qtybal),2).'</td>';

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

