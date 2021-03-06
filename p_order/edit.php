<?php


if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
function createRandomPassword()
{
    $chars = "JS0123456789GMEI0987654321";
    srand((double)microtime() * 1000000);
    $i = 0;
    $pass = '';
    $date=new Datetime();
    $yymm = date_format($date,"ym");
    while ($i <= 4) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);
        if ($tmp =="")
        {
            $tmp = "0";
        }

        $pass = $pass . $tmp;

        $i++;

    }
    return $yymm.$pass;
}
$finalcode = 'PO-' . createRandomPassword();
date_default_timezone_set("Asia/Taipei");
$myArray = array(array());
$mySupp = array(array());

$POID = $_GET['id'];
$POPID = $_GET['pid'];

if ($POPID==""){ $POPID= "0000";}

$TranHead = new PurchaseOrderHead();
$TranDetl = new PurchaseOrderDetl();
$Products = new Product();
$HeadResult = $TranHead->single_pohorder($POID);


$PDArray = array(array());
$rCounter = 0;


//$customer = New Customer();
//$singleCustomer = $customer->single_customer($singleSales->CUSTOMERID);
$CTRLHIDDEN="";
$total=0;
if ( $HeadResult->PRINTED=="yes"){
    $CTRLHIDDEN = " display: none; ";

}
?>




<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="editPanel">

            <!-- /.panel-heading -->
            <div class="panel-body">

                <?php
                viewPrintButton(2);
                ?>


                <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>" method="POST">
                    <div class="form-group">
                        <div class="col-md-12" >
                            <?php include("../theme/head_nav.php"); ?>
                        </div>
                    </div>
                    <!---
                   P.O. Header - start
                   !--->
                    <hr>
                    <div class="form-group">
                        <?php
                        addLegend("P.O. No.", "col-md-1","");
                        addInput( "pono", "text",$HeadResult->pono,"Auto Generate","form-control input-sm","col-md-2"," readonly ");
                        addInput( "POID", "hidden","$HeadResult->POID","Auto Generate","form-control input-sm","col-md-2"," hidden ");
                        addLegend("Reference", "col-md-1","");
                        addInput( "refno", "text","$HeadResult->refno","Reference No.","form-control input-sm","col-md-2","   ");
                        addLegend("Date", "col-md-1","");
                        addInput( "entdate", "date",$HeadResult->entdate,"P.O. Date","form-control input-sm","col-md-2","   required ");
                        addLegend("Forex", "col-md-1","");
                        addInput( "FOREXRATE", "text","$HeadResult->FOREXRATE","Forex Rate","form-control input-sm form-num","col-md-1"," REQUIRED  ");
                        addInput( "FOREX", "text","$HeadResult->FOREX","Currency","form-control input-sm","col-md-1"," required  ");
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        addLegend("Supplier", "col-md-1","");
                        addInput( "SUPPNAME", "text","$HeadResult->suppname","Supplier Name","form-control input-sm","col-md-4"," autocomplete=\"off\" spellcheck=\"false\" ");
                        addInput( "SUPPLIERID", "hidden","$HeadResult->SUPPLIERID","Supplier ID","form-control input-sm","col-md-1"," hidden ");
                        addInput( "SUPPCODE", "hidden","$HeadResult->suppcode","Supplier Code","form-control input-sm","col-md-1"," hidden ");
                        addInput( "CREDITLIMIT", "hidden","0","CREDIT LIMIT","form-control input-sm","col-md-1"," hidden  ");
                        addInput( "STATNAME", "hidden","0","Supplier Type","form-control input-sm","col-md-1"," hidden ");
                        ?>
                        <div class="col-md-1">
                            <button id="myBtn" style="height: 32px" type = "button" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                        </div>
                        <?php
                        addLegend("Terms", "col-md-1","");
                        addInput( "terms", "text","$HeadResult->terms","Terms","form-control input-sm form-num","col-md-2","   ");
                        addLegend("Due Date", "col-md-1","");
                        addInput( "duedate", "date",$HeadResult->duedate,"Due Date Date","form-control input-sm","col-md-2","  ");
                        ?>
                    </div>


                    <div class="form-group">
                        <div class="col-md-1 " >
                            Remarks
                        </div>
                        <div class="col-md-11" >
                            <textarea  placeholder="Note" class="form-control input-sm" id="note" name="note"    value=""><?php echo $HeadResult->note;?></textarea>
                        </div>

                    </div>

                    <!---
                   P.O. Header - end
                     <div class="container">
                   !--->
                    <hr>

                    <div class="form-group">
                        <div class="col-md-12 " >
                            <table class="table table-bordered" id="resultTable" data-responsive="table">

                                <thead>
                                <tr>
                                    <!-- <th>No.</th> -->
                                    <th width="7%" align="center">Qty.</th>
                                    <th width="7%" align="center">Unit</th>
                                    <th width="7%" align="center" >Qty/Box</th>
                                    <th width="30%" align="center" >Products</th>
                                    <th width="10%" align="center" colspan="2">Code</th>
                                    <th width="8%" align="center">For. Cost</th>
                                    <th width="8%" align="center">For. Amt.</th>
                                    <th width="8%" align="center"  >Php Cost</th>
                                    <th width="8%" align="center">Php Amt.</th>
                                    <th   width="7%" align="center">Action</th>
                                </tr>
                                </thead>
                                <tbody >
                                <?php
                                $TDResult = $TranDetl->listofProductPerPO($POID);
                                $total2=0.00;
                                $total=0.00;
                                foreach ($TDResult as $result) {
                                    $total = $total + $result->AMOUNT;
                                    $total2 = $total2 + $result->FORAMOUNT;
                                    $rCounter = $rCounter +1;


                                    $PDArray = $PDArray + array(
                                            $result->Id => array(
                                                "PROID" => $result->PROID,
                                                "POID" => $result->POID,
                                                "QTY" => $result->QTY,
                                                "UNIT" => $result->UNIT,
                                                "QTYPERBOX"=> $result->QTYPERBOX,
                                                "PRONAME" => $result->PRONAME ,
                                                "PROCODE" => $result->PROCODE,
                                                "FORPURPRICE"=> $result->FORPURPRICE,
                                                "FORAMOUNT" => $result->FORAMOUNT ,
                                                "PURPRICE" => $result->PURPRICE,
                                                "SUPPITEM" => $result->SUPPITEM ,
                                                "FLOORPRICE" => $result->FLOORPRICE,
                                                "FLOORRATE" => $result->FLOORRATE,
                                                "AMOUNT" => $result->AMOUNT
                                            ));



                                    echo '<tr>';
                                    echo '<td class = "numericCol">' . number_format($result->QTY).'</td>';
                                    echo '<td>' . $result->UNIT.'</td>';
                                    echo '<td class = "numericCol">' . $result->QTYPERBOX.'</td>';

                                    echo '<td>' . $result->PRONAME.'</td>';
                                    echo '<td colspan="2">' . $result->PROCODE.'</td>';
                                    echo '<td class = "numericCol">' . number_format($result->FORPURPRICE,2).'</td>';
                                    echo '<td class = "numericCol">' . number_format($result->FORAMOUNT,2).'</td>';
                                    echo '<td class = "numericCol">' . number_format($result->PURPRICE,2).'</td>';
                                    echo '<td class = "numericCol">' . number_format($result->AMOUNT,2).'</td>';
                                    echo '<td align="center">';
                                    if ($result->QTYRECEIVED == 0 ||  $CTRLHIDDEN =="" ) {
                                        echo '<a title="Edit" href="#" onclick="ProdDetailEntry(' . $result->Id . ',1)" class="btn btn-primary btn-xs  "><span class="fa fa-edit fw-fa"/></a>
				  		                    <a title="Delete" href="controller.php?action=' . md5('itemdelete') . '&id=' . $POID . '&pid=' . $result->Id . '" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "/></a>';
                                    }

                                    echo '</td></tr>';
                                }

                                ?>

                                <tr id="ItemEntry" hidden>
                                    <td>
                                        <input required  class="form-control input-sm form-num" onblur="qtyValidation()" id="QTY"  name="QTY" type="text"  value="0" onfocus="updatePrice()"   >
                                        <input hidden class="form-control input-sm form-num" id="OLDQTY"  name="OLDQTY" type="hidden"  value="0"  >

                                    </td>
                                    <td>
                                        <input  class="form-control input-sm " id="UNIT"  name="UNIT" type="text"  value="" >
                                    </td>
                                    <td>
                                        <input  required  class="form-control input-sm form-num" id="QTYPERBOX"  name="QTYPERBOX" type="text"  value="0" >
                                    </td>

                                    <td>
                                        <input hidden class="form-control input-sm " id="PROID"  name="PROID" type="hidden"  value="" >
                                        <input hidden class="form-control input-sm " id="OLDPROID"  name="OLDPROID" type="hidden"  value="" >
                                        <input   class="form-control input-sm " id="PRONAME"  name="PRONAME" type="text"  value="" >
                                        <input   class="form-control input-sm " id="OLDPRONAME"  name="OLDPRONAME" type="hidden"  value="" >
                                    </td>

                                    <td>
                                        <input  class="form-control input-sm " id="POPID"  name="POPID" type="hidden"  value="" >
                                        <input  class="form-control input-sm " id="OLDPOPID"  name="OLDPOPID" type="hidden"  value="" >
                                        <input  class="form-control input-sm " id="PID"  name="PID" type="hidden"  value="" >
                                        <input  class="form-control input-sm " id="OLDPID"  name="OLDPID" type="hidden"  value="" >
                                        <input   class="form-control input-sm " id="PROCODE"  name="PROCODE" type="text"  value="" >
                                        <input   class="form-control input-sm " id="OLDPROCODE"  name="OLDPROCODE" type="hidden"  value="" >
                                    </td>
                                    <td >

                                        <button   id="myBtn2" type = "button"  style="height: 32px;  " class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>

                                    </td>
                                    <td>
                                        <input  required  onblur="priceValidation()" class="form-control input-sm form-num" id="FORPURPRICE"   name="FORPURPRICE" type="text" value="0"    >
                                        <input  required  onblur="priceValidation()" class="form-control input-sm form-num" id="OLDFORPURPRICE"   name="OLDFORPURPRICE" type="HIDDEN" value="0"    >
                                    </td>

                                    <td>
                                        <input READONLY onblur="priceValidation()" class="form-control input-sm form-num" id="FORAMOUNT"   name="FORAMOUNT" type="text" value="0"    >
                                        <input READONLY onblur="priceValidation()" class="form-control input-sm form-num" id="OLDFORAMOUNT"   name="OLDFORAMOUNT" type="HIDDEN" value="0"    >
                                    </td>

                                    <td>
                                        <input   required onblur="priceValidation()" class="form-control input-sm form-num" id="PURPRICE"   name="PURPRICE" type="text" value="0"    >
                                        <input   required onblur="priceValidation()" class="form-control input-sm form-num" id="OLDPURPRICE"   name="OLDPURPRICE" type="HIDDEN" value="0"    >
                                    </td>

                                    <td>
                                        <input class="form-control input-sm form-num" id="AMOUNT"   name="AMOUNT" type="text" value="0" readonly>
                                        <input class="form-control input-sm form-num" id="OLDAMOUNT"   name="OLDAMOUNT" type="hidden" value="0" readonly>
                                    </td>
                                    <td  >
                                        <button id="myBtnCloseItem" onclick="closeProductEntry()" type = "button"  style="width:100%; height: 32px; background: #8b0000; border-color: #641e20" class="btn btn-primary btn-xs">
                                            <i class="fa fa-undo fw-fa"></i>&nbsp;</button>
                                    </td>
                                </tr>
                                <tr id="ItemEntry2" hidden>
                                    <td colspan="2">Suppplier Item: </td>

                                    <td colspan="2">
                                        <input  class="form-control input-sm " id="SUPPITEM"  name="SUPPITEM" type="text"  value="" >
                                        <input  class="form-control input-sm " id="OLDSUPPITEM"  name="OLDSUPPITEM" type="HIDDEN"  value="" >
                                    </td>
                                    <td colspan="2" style="text-align: right; font-weight: bold;">Floor Price: </td>

                                    <td colspan="1">
                                        <input   required class="form-control input-sm form-num" id="FLOORPRICE"  name="FLOORPRICE" type="text"  value="0" >
                                        <input   required class="form-control input-sm form-num" id="OLDFLOORPRICE"  name="OLDFLOORPRICE" type="HIDDEN"  value="0" >
                                    </td>
                                    <td colspan="1" style="text-align: right; font-weight: bold;">Rate </td>

                                    <td colspan="1">
                                        <input  required   class="form-control input-sm form-num" id="FLOORRATE"  name="FLOORRATE" type="text"  value="0" >
                                        <input  required   class="form-control input-sm form-num" id="OLDFLOORRATE"  name="OLDFLOORRATE" type="HIDDEN"  value="0" >
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                </tbody>
                                <!--  Sales Total Row !-->
                                <tfoot>
                                <tr style="background-color: #e7e7ff; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
                                    <td style="border-right: 0px solid;" colspan="4">
                                        <button  id="myBtnAddItem" onclick="showProductEntry()" type = "button"  style="height: 32px; background: #0ea432; border-color: #478500;<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-xs">
                                            <i class="fa fa-plus-circle fw-fa"></i>&nbsp;&nbsp;&nbsp;Add Item&nbsp;&nbsp;&nbsp;</button>
                                        <button    class="btn  btn-primary btn-sm" style="height: 32px; display: none; background: #f0ad4e; border-color: #f5e79e; <?php echo $CTRLHIDDEN;?>" id="itemsave" name="itemsave" type="submit" >
                                            <span class="fa fa-save fw-fa"></span>&nbsp; Save Item&nbsp;</button>
                                        <button  style="<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-sm"  id="save"  name="save" type="submit" >
                                            <span class="fa fa-save fw-fa"></span>&nbsp; Save Header&nbsp;
                                        </button>
                                        <button  style="<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-sm"  id="btnImportXL"  name="btnImportXL" type="button" >
                                            <span class="fa fa-save fw-fa"></span>&nbsp; Import Excel P.O.&nbsp;
                                        </button>
                                    </td>
                                    <td colspan="3" style="text-align: right ; font-weight:bold; border-left: 0px solid;   ">
                                        Total Amount
                                    </td>
                                    <td style="text-align: right"><?php echo number_format($HeadResult->FORTOTAL,2) ?> </td>
                                    <td style="text-align: right">  </td>
                                    <td style="text-align: right"><?php echo number_format($HeadResult->total,2) ?> </td>
                                    <td>

                                    </td>

                                </tr>

                                </tfoot>
                            </table>
                        </div>

                        <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->

                    </div>
                </form>






            </div>
        </div>
    </div>

</div>



<?php

//   include("list.php");
?>


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
        padding: 30px 30px 30px 30px;
        border: 1px solid #888;
        width: 70%;
        height: 530px;
        overflow-y: hidden;
    }
    #MyModalContent{
        background-color: #fefefe;
        margin: 0;
        padding:  0px;
        border: 1px solid #e7e7ff;

        height: 400px;
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
    }
    #TBListPopup{
        font-size: xx-small;
        font-weight: normal;
    }
    /* The Close Button */
    .close {
        color: #8b0000;
        float: right;
        font-size: 28px;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

</style>



<!-- The Modal -->
<div id="myModal" class="cmodal">

    <!-- Modal content -->

    <div class="cmodal-content" >

        <div class="row">
            <div class="col-lg-11">
                <input type="text" class="form-control input-sm"  id="myInput" onkeyup="myTblFilter('myInput','TBListPopup')" placeholder="Search " title="Enter keyword to search from database...">
            </div>
        </div>


        <div  id="MyModalPage">

        </div>
        <div class="row" id="closerow"  style="position: absolute; padding: 2px; top: 105px;"  >

            <span class="close pull-right"   id="btnClose">&times;</span>

        </div>

    </div>

</div>

<link href="<?php echo web_root; ?>css/JSToolTip.css" rel="stylesheet">
<div hidden id="toolTip">
    <p>i can haz css tooltip</p>
    <div id="tailShadow"></div>
    <div id="tail1"></div>
    <div id="tail2"></div>
</div>
