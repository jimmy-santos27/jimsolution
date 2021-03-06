<?php

if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}

$PRID = $_GET['id'];
$TranID =$_GET['id'];
$RRPID = $_GET['pid'];

$TranHead = new PuReturnHead();
$TranDetl = new PuReturnDetl();
$RRDetl = new ReceivingDetl();
$Supplier = new Supplier();
$tpcs = 0;
$THResult = $TranHead->singleTranID($TranID);


if ( $THResult->PRID =="" || $TranID ==""){
    //redirect(web_root."index.php");
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
        <div class="panel panel-default" >

            <!-- /.panel-heading -->
            <div class="panel-body" style="font-weight: normal">

                <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>" method="POST">

                    <!---
                   P.O. Header - start
                   !--->

                    <div class="form-group">
                        <?php
                        addLegend("P.R. No.", "col-md-1","");
                        addInput( "PRNO", "text",$THResult->prno,"Auto Generate","form-control input-sm","col-md-2"," readonly ");
                        addInput( "PRID", "hidden",$THResult->PRID,"Auto Generate","form-control input-sm","col-md-2"," hidden ");
                        addLegend("Reference", "col-md-1","");
                        addInput( "refno", "text",$THResult->refno,"Reference No.","form-control input-sm","col-md-2","   ");
                        addLegend("Date", "col-md-1","");
                        addInput( "entdate", "date",$THResult->entdate,"R.R. Date","form-control input-sm","col-md-2","   required ");
                         ?>
                    </div>

                    <div class="form-group">
                        <?php
                        addLegend("Supplier", "col-md-1","");
                        addInput( "SUPPNAME", "text",$THResult->suppname,"Supplier Name","form-control input-sm","col-md-4"," readonly ");
                        addInput( "SUPPLIERID", "hidden",$THResult->SUPPLIERID,"Supplier ID","form-control input-sm","col-md-1"," hidden ");
                        addInput( "SUPPCODE", "hidden",$THResult->suppcode,"Supplier Code","form-control input-sm","col-md-1"," hidden ");
                        addInput( "CREDITLIMIT", "hidden","0","CREDIT LIMIT","form-control input-sm","col-md-1"," hidden  ");
                        addInput( "BALANCE", "hidden","","0","form-control input-sm","col-md-1"," hidden ");
                        addInput( "STATNAME", "hidden","","Supplier Type","form-control input-sm","col-md-1"," hidden ");
                        ?>
                        <div hidden class="col-md-1">
                            <button id="myBtn" style="height: 32px" type = "button" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-md-1 " >
                            Remarks
                        </div>
                        <div class="col-md-9" >
                            <textarea  placeholder="Note" class="form-control input-sm" id="note" name="note"    value=""><?php echo $THResult->note;?></textarea>
                        </div>

                    </div>

                    <!---
                   P.O. Header - end
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
                                            <th width="10%" align="center">R.R. No.<div>R.R. No.</div></th>

                                            <th width="30%" align="center" >Products<div>Products</div></th>
                                            <th width="12%" align="center" colspan="2">Code<div>Code</div></th>
                                            <th width="10%" align="center">Qty.<div>Qty.</div></th>
                                            <th width="10%" align="center">Unit<div>Unit</div></th>

                                            <th width="10%" align="center"  >Php Cost<div>Php Cost</div></th>
                                            <th width="10%" align="center">Php Amt.<div>Php Amt.</div></th>
                                            <th   width="8%" align="center">Action<div>Action</div></th>
                                        </tr>
                                        </thead>
                                        <tbody >
                                        <?php
                                        $TDResult = $TranDetl->listPerTransID($TranID);
                                        $total2=0.00;
                                        $total=0.00;
                                        $rCounter=0;
                                        foreach ($TDResult as $result) {
                                            $total = $total + $result->AMOUNT;

                                            $rCounter = $rCounter +1;
                                            $tpcs = $tpcs + $result->QTY;

                                            $PDArray = $PDArray + array(
                                                    $result->Id => array(
                                                        "PROID" => $result->PROID,
                                                        "PRID" => $result->PRID,
                                                        "rrno" => $result->rrno,
                                                        "RRPID" => $result->RRPID,
                                                        "QTY" => $result->QTY,
                                                        "UNIT" => $result->UNIT,

                                                        "PRONAME" => $result->PRONAME ,
                                                        "PROCODE" => $result->PROCODE,

                                                        "PURPRICE" => $result->PURPRICE,

                                                        "AMOUNT" => $result->AMOUNT
                                                    ));



                                            echo '<tr>';
                                            echo '<td >' . ($result->rrno).'</td>';


                                            echo '<td ><div >' . $result->PRONAME.'</div></td>';
                                            echo '<td colspan="2">' . $result->PROCODE.'</td>';
                                            echo '<td class = "numericCol">' . number_format($result->QTY).'</td>';
                                            echo '<td>' . $result->UNIT.'</td>';

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
                                            <td>
                                                <input  class="form-control input-sm " id="rrno"  name="rrno" type="text"  value=""    >


                                            </td>


                                            <td>
                                                <input hidden class="form-control input-sm " id="PROID"  name="PROID" type="hidden"  value="" >
                                                <input hidden class="form-control input-sm " id="OLDPROID"  name="OLDPROID" type="hidden"  value="" >
                                                <input   class="form-control input-sm " id="PRONAME"  name="PRONAME" type="text"  value="" >
                                                <input   class="form-control input-sm " id="OLDPRONAME"  name="OLDPRONAME" type="hidden"  value="" >
                                            </td>

                                            <td>
                                                <input  class="form-control input-sm " id="RRPID"  name="RRPID" type="hidden"  value="" >
                                                <input  class="form-control input-sm " id="OLDRRPID"  name="OLDRRPID" type="hidden"  value="" >
                                                <input  class="form-control input-sm " id="PID"  name="PID" type="hidden"  value="" >

                                                <input  class="form-control input-sm " id="OLDPID"  name="OLDPID" type="hidden"  value="" >
                                                <input   class="form-control input-sm " id="PROCODE"  name="PROCODE" type="text"  value="" >
                                                <input   class="form-control input-sm " id="OLDPROCODE"  name="OLDPROCODE" type="hidden"  value="" >
                                            </td>
                                            <td >

                                                <button   id="myBtn2" type = "button"  style="height: 32px;  " class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>

                                            </td>
                                            <td>
                                                <input required  class="form-control input-sm form-num" onblur="qtyValidation()" id="QTY"  name="QTY" type="text"  value="0" onfocus="updatePrice()"   >
                                                <input hidden class="form-control input-sm form-num" id="OLDQTY"  name="OLDQTY" type="hidden"  value="0"  >

                                            </td>
                                            <td>
                                                <input  class="form-control input-sm " id="UNIT"  name="UNIT" type="text"  value="" >
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

                                        </tbody>
                                        <!--  Sales Total Row !-->

                                    </table>
                                </div>
                            </section>

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
                            <div style="border: 1px solid #cddaea; display: inline-block;padding: 10px; height: 40px; vertical-align: middle;background-color: #f0f0ee; font-weight: bold; width: 100%; margin-bottom: 5px">
                                <div  style=" float:left; vertical-align: middle; ">

                                    Counter : <?php echo number_format($rCounter,0) ?> | Qty : <?php echo number_format($tpcs,0) ?>
                                </div>
                                <div  style=" float:right; vertical-align: middle ">

                                    Total Amount : <?php echo number_format($THResult->total,2) ?>
                                </div>
                            </div>
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
<div id="myModal2" class="cmodal">

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
