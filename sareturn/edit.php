<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
  
date_default_timezone_set("Asia/Taipei");
$CTRLHIDDEN = "   ";
$SRID = $_GET['id'];
$SRPID = $_GET['pid'];

$Customer = new Customer();
$SHReturn = new SalesReturnHead();
$SDReturn = new SalesReturnDetl();
$SDOrder = new SalesOrderDetl();
$Products = new Product();
if ($SRPID==""){ $SRPID= "0000";}

$PDArray = array(array());
$rCounter = 0;

$tpcs=0;
$singleSR = $SHReturn->single_tran($SRID);

$customer = New Customer();
$singleCustomer = $customer->single_customer($singleSR->CUSTOMERID);

if (  $singleSR->PRINTED=="yes"){
    $CTRLHIDDEN = " display: none; ";

}
$previewUrl= "index.php?view=".md5('view')."&id=". $_GET['id'] ."&pid=";

?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default"  >

            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php
                viewPrintButton(2);
                ?>


                <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>" method="POST">

                    <!---
                   Sales Header - start
                   !--->

                    <div class="form-group">
                        <?php

                        addLegend("Return Id: " , "col-md-1","");
                        addLegend( $singleSR->SRID, "col-md-1","");
                        addInput( "SRID", "hidden",$singleSR->SRID,"Auto Generate","form-control input-sm","col-md-1"," hidden ");

                        addLegend("S.R. No.", "col-md-1","");
                        addInput( "SRNO", "text",$singleSR->SRNO,"Auto Generate","form-control input-sm","col-md-2"," readonly ");

                        addLegend("Reference", "col-md-1","");
                        addInput( "REFNO", "text",$singleSR->REFNO,"Reference No.","form-control input-sm","col-md-2","   ");
                        addLegend("Date", "col-md-1","");
                        addInput( "ENTDATE", "date",$singleSR->ENTDATE,"Sales Date","form-control input-sm","col-md-2","   required ");
                             ?>
                    </div>

                    <div class="form-group">
                        <?php
                        addLegend("Customer", "col-md-1","");
                        addInput( "CUSTNAME", "text",$singleSR->CUSTNAME,"Customer Name","form-control input-sm","col-md-4"," READONLY ");
                        addInput( "OLDCUSTOMERID", "hidden",$singleSR->CUSTOMERID,"Customer ID","form-control input-sm","col-md-1"," hidden ");
                        addInput( "CUSTOMERID", "hidden",$singleSR->CUSTOMERID,"Customer ID","form-control input-sm","col-md-1"," hidden ");
                        addInput( "CUSTCODE", "hidden",$singleSR->CUSTCODE,"Customer Code","form-control input-sm","col-md-1"," hidden ");

                         ?>
                        <div hidden class="col-md-3" >
                            <input name="LESSTOACCOUNT" id="LESSTOACCOUNT" type="checkbox"  value="1" <?php if ($singleSR->LESSTOACCOUNT=="1"){echo "checked";}?> title="Mark Check as Deduct to Account"> Deduct from Sales
                        </div>
                        <?php
                          //addLegend(" ", "col-md-1","");
                          addInput( "DEDUCTDATE", "text",date('Y-m-d'),"Sales Date","noshow","col-md-2"," hidden  ");

                        addLegend("Checked By", "col-md-1","");
                        addInput( "CHECKEDBY", "text",$singleSR->CHECKEDBY,"CHECKEDBY","form-control input-sm","col-md-4","    ");

                        ?>

                    </div>
                    <div hidden class="form-group">
                        <?php

                        addInput( "SMANNAME", "hidden","","Salesman","form-control input-sm","col-md-4","  hidden ");
                        addInput( "SMANCODE", "hidden","","Salesman Code","form-control input-sm","col-md-1"," hidden ");
                        addInput( "SALESMANID", "hidden","","Salesman ID","form-control input-sm","col-md-1"," hidden ");
                        addInput( "DISCOUNTPER", "hidden","","Customer Discount","form-control input-sm","col-md-1"," hidden ");

                  ?>

                    </div>
                    <div class="form-group">
                        <?php

                        addInput( "DISCOUNTPER", "hidden",$singleCustomer->DISCOUNTPER,"Customer Discount","form-control input-sm","col-md-1"," hidden ");





                         addInput( "TERMS", "text","0","Terms","form-control input-sm form-num","col-md-2","  hidden  ");
                         addInput( "DUEDATE", "date",date('Y-m-d'),"Sales Date","form-control input-sm","col-md-2"," hidden   ");
                         ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1 " >
                            Remarks
                        </div>
                        <div class="col-md-11" >
                            <textarea  placeholder="Note" class="form-control input-sm" id="NOTE" name="NOTE"    value=""><?php echo $singleSR->NOTE;?></textarea>
                        </div>

                    </div>

                    <!---
                   Sales Header - end
                     <div class="container">
                   !--->

                    <div class="form-group">
                        <div class="col-md-12 " >
                            <section class="">
                                <div class="container1"  >
                                    <table class="table-striped"   data-responsive="table">

                                        <thead>
                                        <tr>
                                            <!-- <th>No.</th> -->


                                            <th width="8%" align="center" >Invoice No<div>Invoice No</div></th>
                                            <th hidden width="8%" align="center" >D.R. No.<div>D.R. No.</div></th>

                                            <th width="28%" align="center" >Products<div>Products</div></th>
                                            <th width="12%" align="center" colspan="2">Code<div>Code</div></th>
                                            <th width="8%" align="center">Qty.<div>Qty.</div></th>
                                            <th width="8%" align="center">Unit<div>Unit</div></th>
                                            <th width="8%" align="center">Price<div>Price</div></th>
                                            <th width="6%" align="center">Disc %<div>Disc %</div></th>
                                            <th width="8%" align="center"  >Discount<div>Discount</div></th>
                                            <th width="8%" align="center">Amount<div>Amount</div></th>
                                            <th   width="8%" align="center">Action<div>Action</div></th>
                                        </tr>
                                        </thead>
                                        <tbody>



                                        <!--  Sales Product List !-->
                                        <?php
                                        //$mydb->setQuery("SELECT * FROM `tblslsdetl` where SRID=".$SRID);
                                        // $cur = $mydb->loadResultList();

                                        $cur = $mydb->loadResultList();
                                        $cur = $SDReturn->listofSReturnPerID($SRID);
                                        $total=0.00;
                                        foreach ($cur as $result) {
                                            $rCounter = $rCounter +1;
                                            $tpcs = $tpcs + $result->QTY;
                                            $PROQTY = 0;
                                            if ($result->SLSPID > 0 ){
                                                $result2 = $SDOrder->single_iteminvoice($result->SLSPID);
                                                $PROQTY = ($result2->QTY - $result2->SRQTY);
                                            }


                                            $total = $total + $result->AMOUNT;

                                            $PDArray = $PDArray + array(
                                                    $result->SRPID => array(
                                                        "INVOICENO" => $result->INVOICENO,
                                                        "DRNO" => $result->DRNO,
                                                        "PROID" => $result->PROID,
                                                        "SRID" => $result->SRID,
                                                        "SLSPID" => $result->SLSPID,
                                                        "QTY" => $result->QTY,
                                                        "UNIT" => $result->UNIT,
                                                        "PROQTY"=> $PROQTY,
                                                        "PROPRICE" => $result->PROPRICE,
                                                        "DISCPER" => $result->DISCPER,
                                                        "DISCAMT" => $result->DISCAMT,
                                                        "AMOUNT" => $result->AMOUNT,
                                                         "PRONAME" => $result->PRONAME ,
                                                        "PROCODE" => $result->PROCODE
                                                    ));

                                            echo '<tr>';
                                            echo '<td>' . $result->INVOICENO.'</td>';
                                            echo '<td hidden>' . $result->DRNO.'</td>';
                                            echo '<td>' . $result->PRONAME.'</td>';
                                            echo '<td COLSPAN="2">' . $result->PROCODE.'</td>';
                                            echo '<td style="text-align: right">' . number_format($result->QTY).'</td>';
                                            echo '<td>' . $result->UNIT.'</td>';
                                            echo '<td style="text-align: right">' . number_format($result->PROPRICE,2).'</td>';

                                            echo '<td width="6%" style="text-align: right">' . $result->DISCPER.'%</td>';
                                            echo '<td style="text-align: right">' . number_format($result->DISCAMT,2).'</td>';
                                            echo '<td style="text-align: right"> ' . number_format($result->AMOUNT,2).'</td>';
                                            echo '<td align="center"><a style="'. $CTRLHIDDEN .'" title="Edit" href="javascript:void(0)" onclick="ProdDetailEntry('.$result->SRPID.',1)" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
                                            <a title="Delete"  style="'. $CTRLHIDDEN .'"  href="controller.php?action='.md5('itemdelete').'&id='.$SRID.'&pid='.$result->SRPID.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';


                                            echo '</tr>';
                                        }

                                        ?>


                                        <!--  Product Entry Row !-->
                                        <tr id="EntryProduct" hidden>
                                            <td>
                                                <input   class="form-control input-sm " id="INVOICENO"  name="INVOICENO" type="text"  value="" >

                                            </td>
                                            <td hidden>
                                                <input    class="form-control input-sm " id="DRNO"  name="DRNO" type="text"  value="" >

                                            </td>

                                            <td>
                                                <input hidden class="form-control input-sm " id="OLDPID"  name="OLDPID" type="hidden"  value="" >
                                                <input hidden class="form-control input-sm " id="OLDPROID"  name="OLDPROID" type="hidden"  value="" >
                                                <input hidden class="form-control input-sm " id="OLDPRONAME"  name="OLDPRONAME" type="hidden"  value="" >

                                                <input hidden class="form-control input-sm " id="SLSPID"  name="SLSPID" type="hidden"  value="0" >
                                                <input hidden class="form-control input-sm " id="PID"  name="PID" type="hidden"  value="" >
                                                <input hidden class="form-control input-sm " id="PROID"  name="PROID" type="hidden"  value="" >
                                                <input  class="form-control input-sm " id="PRONAME"  name="PRONAME" type="text"  value="" >
                                            </td>

                                            <td>
                                                <input hidden class="form-control input-sm " id="OLDPROCODE"  name="OLDPROCODE" type="hidden"  value="" >
                                                <input class="form-control input-sm " id="PROCODE"  name="PROCODE" type="text"  value="" >
                                            </td>
                                            <td width="2%px">

                                                <button id="myBtn2" type = "button"  style="height: 32px" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>

                                            </td>
                                            <td>
                                                <input   class="form-control input-sm form-num" id="QTY"  name="QTY" type="text"  value="0" onfocus="updatePrice()"  onblur="qtyValidation()">
                                                <input hidden class="form-control input-sm form-num" id="OLDQTY"  name="OLDQTY" type="hidden"  value="0"  >

                                                <input hidden class="form-control input-sm form-num" id="PROQTY"  name="PROQTY" type="hidden"  value="0"  >
                                                <input hidden class="form-control input-sm form-num" id="REORDER"  name="REORDER" type="hidden"  value="0"  >
                                                <input hidden class="form-control input-sm form-num" id="FLOORPRICE"  name="FLOORPRICE" type="hidden"  value="0">
                                            </td>
                                            <td>
                                                <input required READONLY class="form-control input-sm " id="OLDUNIT"  name="OLDUNIT" type="hidden"  value="" >
                                                <input  class="form-control input-sm " id="UNIT"  name="UNIT" type="text"  value="" >
                                            </td>

                                            <!--
                            <td colspan="2">
                                <select id="PROID" NAME = "PROID" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                                    <option> </option>
                                    <?PHP
                                            /*
                                            $mydb->setQuery("SELECT PROID, PRONAME, PROCODE, PROQTY, PROPRICE, UNIT, WPROPRICE, PPROPRICE, PROBRAND, PROMODEL FROM `tblproduct` where INACTIVE='No' and PROQTY > 0 order by PRONAME, PROMODEL, PROBRAND");
                                            $cur = $mydb->loadResultList();
                                            $myArray = array(array());
                                            $myProdArray = array(array());
                                            foreach ($cur as $result) {

                                                $itemSelected = "'".$result->PROBRAND."','".$result->PROCODE."','".$result->PROPRICE."'";
                                                $myArray = $myArray + array(
                                                        $result->PROID => array(
                                                            "PRONAME" => $result->PRONAME,
                                                            "PROMODEL" => $result->PROMODEL,
                                                            "PROBRAND" => $result->PROBRAND,
                                                            "PROCODE" => $result->PROCODE ,
                                                            "PROPRICE" => $result->PROPRICE
                                                        ));
                                                $myProdArray = $myProdArray + array( $result->PROID => $result->PROPRICE);

                                                ?>
                                        <option  value="<?php echo $result->PROID;?>" >
                                            <?php echo $result->PRONAME; ?> - <?php echo $result->PROMODEL; ?> - <?php echo $result->PROBRAND; ?>  - <?php echo $result->PROCODE; ?>
                                        </option>
                                        <?PHP

                                            }
                                            */
                                            ?>
                                </select>
                                <input hidden id="PROCODE" name="PROCODE" type="text" value="">


                            </td>
                            !-->


                                            <td>
                                                <input HIDDEN class="form-control input-sm form-num" id="OLDPROPRICE"   name="OLDPROPRICE" type="hidden" value="0"   onfocusout="updateAmount()">
                                                <input   class="form-control input-sm form-num" id="PROPRICE"   name="PROPRICE" type="text" value="0"     onblur="priceValidation()" >
                                            </td>
                                            <td>
                                                <input HIDDEN class="form-control input-sm form-num" id="OLDDISCPER"   name="OLDDISCPER"  type="hidden" value="0" PLACEHOLDER="%" onfocusout="updateAmount()">
                                                <input  class="form-control input-sm form-num" id="DISCOUNTPER"   name="DISCOUNTPER"  type="hidden" value="<?php echo $singleCustomer->DISCOUNTPER;?>" PLACEHOLDER="%" onfocusout="updateAmount()">
                                                <input   class="form-control input-sm form-num" id="DISCPER"   name="DISCPER"  type="text" value="0" PLACEHOLDER="%" onfocusout="updateAmount()">
                                            </td>
                                            <td>
                                                <input HIDDEN class="form-control input-sm form-num" id="OLDDISCAMT"   name="OLDDISCAMT"   type="hidden" value="0" onfocusout="updateAmount()">
                                                <input READONLY class="form-control input-sm form-num" id="DISCAMT"   name="DISCAMT"   type="text" value="0" onfocusout="updateAmount()">
                                            </td>
                                            <td>
                                                <input HIDDEN class="form-control input-sm form-num" id="OLDAMOUNT"   name="OLDAMOUNT" type="hidden" value="0" readonly>
                                                <input class="form-control input-sm form-num" id="AMOUNT"   name="AMOUNT" type="text" value="0" readonly>
                                            </td>
                                            <td  >
                                                <button id="myBtnCloseItem" onclick="closeProductEntry()" type = "button"  style="width:100%; height: 32px; background: #8b0000; border-color: #641e20" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-undo fw-fa"></i>&nbsp;</button>
                                            </td>
                                        </tr>


                                        <!--  Sales Total Row !-->




                                        </tbody>
                                    </table>

                                </div>
                            </section>

                            <div style="border: 1px solid #cddaea; display: inline-block;padding: 10px; height: 40px; vertical-align: middle;background-color: #f0f0ee; font-weight: bold; width: 100%; margin-bottom: 5px">
                                <div  style=" float:left; vertical-align: middle; ">

                                    Counter : <?php echo number_format($rCounter,0) ?> | Qty : <?php echo number_format($tpcs,0) ?>
                                </div>
                                <div  style=" float:right; vertical-align: middle ">

                                    Total Amount : <?php echo number_format($total,2) ?>
                                </div>
                            </div>
                            <style>
                                section {
                                    position: relative;
                                    border: 1px solid #cddaea;

                                    padding-top: 37px;
                                    background: #f0f0ee;

                                }
                                section.positioned {
                                    position: absolute;
                                    top:100px;
                                    left:100px;
                                    box-shadow: 0 0 15px #464e50;
                                }
                                .container1 {

                                    height: 260px; overflow-y: auto; border: 0px solid #f0eee8; padding: 0px; margin: 0px;
                                }

                                section table {
                                    border-spacing: 0;
                                    width: 100%;

                                }

                                section td + td {
                                    border-left:1px solid #e7e7ff;
                                }
                                section td  {
                                    border-bottom:1px solid #e7e7ff;
                                    background: #e8f2ff;
                                    color: #0d6aad;
                                    padding: 9px 1px;
                                    font-size: 11px;
                                }
                                section th {
                                    font-size: 10pt;
                                    height: 0;
                                    line-height: 0;
                                    padding-top: 0;
                                    padding-bottom: 0;
                                    color: transparent;
                                    border: none;
                                    white-space: nowrap;
                                    font-weight: normal;
                                    border-bottom:1px solid #CCCCCC;

                                }
                                section th div{
                                    position: absolute;
                                    font-size: 10pt;
                                    color: #3b5998;
                                    padding: 9px 1px;
                                    top: 0;
                                    margin-left: -1px;
                                    line-height: normal;
                                    border-left: 1px solid #e7e7ff;

                                    font-weight: normal;


                                }
                                section th:first-child div{
                                    border: none;
                                }
                                section tr:hover td {
                                    background-color: #f8efc0 !important;
                                    color: #0d6aad;
                                    cursor: pointer;
                                }


                            </style>
                            <div class="col-lg-12 "  >
                                <button  id="myBtnAddItem" onclick="showProductEntry()" type = "button"  style="height: 32px; background: #0ea432; border-color: #478500;<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-xs">
                                    <i class="fa fa-plus-circle fw-fa"></i>&nbsp;&nbsp;&nbsp;Add Item&nbsp;&nbsp;&nbsp;</button>
                                <button    class="btn  btn-primary btn-sm" style="height: 32px; display: none; background: #f0ad4e; border-color: #f5e79e; <?php echo $CTRLHIDDEN;?>" id="itemsave" name="itemsave" type="submit" >
                                    <span class="fa fa-save fw-fa"></span>&nbsp; Save Item&nbsp;</button>
                                <button  style="<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-sm"  id="save"  name="save" type="submit" >
                                    <span class="fa fa-save fw-fa"></span>&nbsp; Save Header&nbsp;
                                </button>
                                <div class="col-lg-2 pull-right" >
                                    <a  href="index.php" class="btn btn-danger btn-sm" style="width: 100%"  name="cancel"   >
                                        <span class="fa fa-close fw-fa"></span> Close
                                    </a>
                                </div>




                                <?php
                                if($_SESSION['U_ROLE']=='Administrator'){
                                    // echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
                                    ; }?>
                                <br>
                            </div>
                        </div>

                        <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->

                    </div>
                </form>

            </div>
        </div>
    </div>


</div>


<style>

    /* The Modal (background) */

    .cmodal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 99999991; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: hidden; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .cmodal-content {
        background-color: #fefefe;

        margin: auto;
        padding: 10px;
        border: 1px solid #888;
        width: 60%;
        height: 90%;

        overflow: hidden;
        border-radius: 5px;
    }
    #MyModalContent{
        background-color: #fefefe;
        margin: 0;
        padding:  0px;
        border: 1px solid #e7e7ff;

        height: 340px;
        overflow-y: auto;
    }
    #TBListPopup tr:hover{
        cursor: pointer;
        background-color: #2e6da4;
        color: #ffffff;
    }
    #TBListPopup >thead >tr >td {
        background-color: #0e8c8c;
        color: #ffffff;
        height: 40px;
        vertical-align: middle;
        text-align: center;
    }
    #TBListPopup >tbody >tr >td {
        vertical-align: middle;
        height: 25px;
    }
    #TBListPopup{
        font-size: 9pt;
        font-weight: normal;
    }
    /* The Close Button */
    .close {
        position: relative;
        color: #8b0000;
        font-size: 14pt;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

</style>

<div class="modal fade red in" id="myModal"    >

    <div class="modal-dialog" style="width: 70%">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:#3a87ad;color: #ffffff">
                <input type="text"   class="form-control input-sm"  id="myInput" onkeyup="myTblFilter('myInput','TBListPopup')" placeholder="Search " title="Enter keyword to search from database...">
            </div>
            <div class="modal-body"  id="MyModalPage" >

            </div>
            <div class="modal-footer">
                <div class="col-lg-10" id="modalLegends" style="text-align: left">

                </div>

                <div class="col-lg-2"><button type="button" class="btn btn-default close" onclick="" id="btnClose" data-dismiss="modal">Close</button></div>
            </div>
        </div>

    </div>
</div>
<!-- The Modal -->


<link href="<?php echo web_root; ?>css/JSToolTip.css" rel="stylesheet">
<div hidden id="toolTip">
    <p>i can haz css tooltip</p>
    <div id="tailShadow"></div>
    <div id="tail1"></div>
    <div id="tail2"></div>
</div>


<script>

</script>