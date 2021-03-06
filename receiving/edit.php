<?php

if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
$RRID = $_GET['id'];
$TranID =$_GET['id'];
$RRPID = $_GET['pid'];

$TranHead = new ReceivingHead();
$TranDetl = new ReceivingDetl();
$PODETL = new PurchaseOrderDetl();
$Supplier = new Supplier();

$THResult = $TranHead->single_purchasehorder($TranID);

$previewUrl= "index.php?view=".md5('view')."&id=". $_GET['id'] ."&pid=";
if ( $THResult->RRID =="" || $TranID ==""){
    redirect(web_root."index.php");
}

$CTRLHIDDEN='';

$phidden = "";
if ($RRPID==""){
    $RRPID= "000";
    $phidden= "HIDDEN";
}

if (isset($_SESSION["PDArray"])) {
    unset($_SESSION["PDArray"]);
}

function createRandomPassword()


{
    $chars = "JRS00112233GMEI445566778899GRACE";
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
$finalcode = 'RR-' . createRandomPassword();
date_default_timezone_set("Asia/Taipei");
$myArray = array(array());
$mySupp = array(array());
$PDArray = array(array());


?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default"  >
            <?php
            viewPrintButton(2);
            ?>

            <!-- /.panel-heading -->
            <div class="panel-body" style="font-weight: normal">

                <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>" method="POST">



                    <div class="form-group">
                        <?php
                        addLegend("R.R. No.", "col-md-1","");
                        addInput( "RRNO", "text",$THResult->rrno,"Auto Generate","form-control input-sm","col-md-2"," readonly ");
                        addInput( "RRID", "hidden",$THResult->RRID,"Auto Generate","form-control input-sm","col-md-2"," hidden ");
                        addLegend("Reference", "col-md-1","");
                        addInput( "refno", "text",$THResult->refno,"Reference No.","form-control input-sm","col-md-2","   ");
                        addLegend("Date", "col-md-1","");
                        addInput( "entdate", "date",$THResult->entdate,"R.R. Date","form-control input-sm","col-md-2","   required ");
                        addLegend("Forex", "col-md-1","display:none");
                        addInput( "FOREXRATE", "text",$THResult->FOREXRATE,"Forex Rate","form-control input-sm form-num","col-md-1"," hidden  ");
                        addInput( "FOREX", "text",$THResult->FOREX,"Currency","form-control input-sm","col-md-1"," hidden ");
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        addLegend("Supplier", "col-md-1","");
                        addInput( "SUPPNAME", "text",$THResult->suppname,"Supplier Name","form-control input-sm","col-md-4"," autocomplete=\"off\" spellcheck=\"false\" ");
                        addInput( "SUPPLIERID", "hidden",$THResult->SUPPLIERID,"Supplier ID","form-control input-sm","col-md-1"," hidden ");
                        addInput( "SUPPCODE", "hidden",$THResult->suppcode,"Supplier Code","form-control input-sm","col-md-1"," hidden ");
                        addInput( "CREDITLIMIT", "hidden","0","CREDIT LIMIT","form-control input-sm","col-md-1"," hidden  ");
                        addInput( "BALANCE", "hidden","","0","form-control input-sm","col-md-1"," hidden ");
                        addInput( "STATNAME", "hidden","","Supplier Type","form-control input-sm","col-md-1"," hidden ");
                        ?>
                        <div class="col-md-1">
                            <button id="myBtn" style="height: 32px" type = "button" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                        </div>
                        <?php
                        addLegend("Terms", "col-md-1","");
                        addInput( "terms", "text",$THResult->terms,"Terms","form-control input-sm form-num","col-md-2","   ");
                        addLegend("Due Date", "col-md-1","");
                        addInput( "duedate", "date",$THResult->duedate,"Due Date Date","form-control input-sm","col-md-2","  ");
                        ?>
                    </div>


                    <div class="form-group">
                        <div class="col-md-1 " >
                            Remarks
                        </div>
                        <div class="col-md-9" >
                            <textarea  placeholder="Note" class="form-control input-sm" id="note" name="note"    value=""><?php echo $THResult->note;?></textarea>
                        </div>
                        <div hidden class="col-md-2">
                            <button type="button" class="btn btn-primary btn-sm" style="background-color: #3c3c3c; border: #c2c4c5"  id="POList" onclick="ListDisplay()"  data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus-circle fw-fa"></i> Import From P.O.</button>
                            <!-- Modal -->
                            <?php require_once ("../theme/ModalList.php"); ?>
                        </div>
                    </div>

                    <!---
                   P.O. Header - end
                     <div class="container">
                   !--->


                    <div class="form-group" style=" border-radius: 0px;  padding: 0px; margin: 0px;">



                            <section class="">
                                <div class="container1"  >
                                    <table class="table-striped"  data-responsive="table">

                                        <thead>
                                        <tr>
                                            <!-- <th>No.</th> -->
                                            <th hidden width="7%" align="center">P.O. No.<div>P.O. No.</div></th>
                                            <th width="7%" align="center">Qty.<div>Qty.</div></th>
                                            <th width="7%" align="center">Unit<div>Unit</div></th>
                                            <th width="7%" align="center" >Qty per box<div>Qty per box</div></th>
                                            <th width="30%" align="center" >Products<div>Products</div></th>
                                            <th width="10%" align="center" colspan="2">Code<div>Code</div></th>

                                            <th width="8%" align="center"  >Php Cost<div>Php Cost</div></th>
                                            <th width="8%" align="center">Php Amt.<div>Php Amt.</div></th>
                                            <th   width="7%" align="center">Action<div>Action</div></th>
                                        </tr>
                                        </thead>
                                        <tbody >
                                        <?php
                                        $TDResult = $TranDetl->listPerTransID($TranID);
                                        $total2=0.00;
                                        $total=0.00;
                                        $rCounter=0;
                                        $tpcs = 0;
                                        foreach ($TDResult as $result) {
                                            $total = $total + $result->AMOUNT;
                                            $total2 = $total2 + $result->FORAMOUNT;
                                            $rCounter = $rCounter +1;
                                            $tpcs = $tpcs + $result->QTY;

                                            $PDArray = $PDArray + array(
                                                    $result->Id => array(
                                                        "PROID" => $result->PROID,
                                                        "RRID" => $result->RRID,
                                                        "pono" => $result->pono,
                                                        "POPID" => $result->POPID,
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
                                            echo '<td hidden>' . ($result->pono).'</td>';
                                            echo '<td class = "numericCol">' . number_format($result->QTY).'</td>';
                                            echo '<td>' . $result->UNIT.'</td>';
                                            echo '<td class = "numericCol">' . $result->QTYPERBOX.'</td>';

                                            echo '<td  > ' . $result->PRONAME.' </td>';
                                            echo '<td colspan="2">' . $result->PROCODE.'</td>';
                                            echo '<td hidden class = "numericCol">' . number_format($result->FORPURPRICE,2).'</td>';
                                            echo '<td hidden class = "numericCol">' . number_format($result->FORAMOUNT,2).'</td>';
                                            echo '<td class = "numericCol">' . number_format($result->PURPRICE,2).'</td>';
                                            echo '<td class = "numericCol">' . number_format($result->AMOUNT,2).'</td>';
                                            echo '<td align="center">';
                                            if ( $CTRLHIDDEN =="" ) {
                                                echo '<a title="Edit" href="javascript:void(0)" onclick="ProdDetailEntry(' . $result->Id . ',1)" class="btn btn-primary btn-xs  "><span class="fa fa-edit fw-fa"/></a>
				  		                    <a title="Delete" href="controller.php?action=' . md5('itemdelete') . '&id=' . $TranID . '&pid=' . $result->Id . '" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "/></a>';
                                            }

                                            echo '</td></tr>';
                                        }

                                        ?>

                                        <tr id="ItemEntry" hidden>
                                            <td hidden>
                                                <input  class="form-control input-sm " id="pono"  name="pono" type="hidden"  value=""    >


                                            </td>
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
                                            <td hidden>
                                                <input   required  onblur="priceValidation()" class="form-control input-sm form-num" id="FORPURPRICE"   name="FORPURPRICE" type="hidden" value="0"    >
                                                <input  required  onblur="priceValidation()" class="form-control input-sm form-num" id="OLDFORPURPRICE"   name="OLDFORPURPRICE" type="HIDDEN" value="0"    >
                                            </td>

                                            <td hidden>
                                                <input READONLY onblur="priceValidation()" class="form-control input-sm form-num" id="FORAMOUNT"   name="FORAMOUNT" type="hidden" value="0"    >
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
                                        <tr  id="ItemEntry2" hidden>
                                            <td hidden colspan="2">Suppplier Item: </td>

                                            <td hidden colspan="3">
                                                <input  class="form-control input-sm " id="SUPPITEM"  name="SUPPITEM" type="hidden"  value="" >
                                                <input  class="form-control input-sm " id="OLDSUPPITEM"  name="OLDSUPPITEM" type="HIDDEN"  value="" >
                                            </td>
                                            <td hidden  colspan="2" style="text-align: right; font-weight: bold;">Floor Price: </td>

                                            <td hidden colspan="1">
                                                <input   required class="form-control input-sm form-num" id="FLOORPRICE"  name="FLOORPRICE" type="hidden"  value="0" >
                                                <input   required class="form-control input-sm form-num" id="OLDFLOORPRICE"  name="OLDFLOORPRICE" type="HIDDEN"  value="0" >
                                            </td>
                                            <td hidden colspan="1" style="text-align: right; font-weight: bold;">Rate </td>

                                            <td hidden colspan="1">
                                                <input  required   class="form-control input-sm form-num" id="FLOORRATE"  name="FLOORRATE" type="hidden"  value="0" >
                                                <input  required   class="form-control input-sm form-num" id="OLDFLOORRATE"  name="OLDFLOORRATE" type="HIDDEN"  value="0" >
                                            </td>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        </tbody>
                                        <!--  Sales Total Row !-->

                                    </table>

                                </div>
                            </section>
                            <div style="border: 1px solid #dff1ff; display: inline-block;padding: 10px; height: 40px; vertical-align: middle;background-color: #f0f0ee; font-weight: bold; width: 100%; margin-bottom: 10px">
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

                                    height: 300px; overflow-y: auto; border: 0px solid #f0eee8; padding: 0px; margin: 0px;
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

                            <div class="col-lg-12">
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

<div class="modal fade red in" id="myModal2"    >

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


