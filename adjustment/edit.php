<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
  
date_default_timezone_set("Asia/Taipei");
$CTRLHIDDEN = "   ";

$ADJID = $_GET['id'];
$ADJPID = $_GET['pid'];
$previewUrl= "index.php?view=".md5('view')."&id=". $_GET['id'] ."&pid=";

if ($ADJPID==""){ $ADJPID= "0000";}

$PDArray = array(array());
$rCounter = 0;

$singleSR = $TranHead->single_tran($ADJID);
$QTYRESETTAG = "hidden";
if (strtoupper($singleSR->ADJTYPE) == "RESET"){
    $QTYRESETTAG = "  ";
}
$customer = New Customer();
//$singleCustomer = $customer->single_customer($singleSR->CUSTOMERID);

if (  $singleSR->PRINTED=="yes"){
    $CTRLHIDDEN = " display: none; ";

}


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
                    
                        addInput( "ADJID", "hidden",$singleSR->ADJID,"Auto Generate","form-control input-sm","col-md-2"," hidden ");

                        addLegend("Adj. No.", "col-md-1","");
                        addInput( "ADJNO", "text",$singleSR->ADJNO,"Auto Generate","form-control input-sm","col-md-2"," readonly ");

                        addLegend(" ", "col-md-2","");

                        addLegend("Reference", "col-md-1","");
                        addInput( "REFNO", "text",$singleSR->REFNO,"Reference No.","form-control input-sm","col-md-2","   ");
                        addLegend("Date", "col-md-1","");
                        addInput( "ENTDATE", "date",$singleSR->ENTDATE,"Date","form-control input-sm","col-md-2","   required ");
                        ?>
                    </div>

                    <div class="form-group">
                        <?php

                        addLegend("Type", "col-md-1","");
                        ?>
                        <div class="col-md-2" >
                            <select id="ADJTYPE" readonly NAME="ADJTYPE" class="form-control input-sm" data-show-subtext="true"
                                    required>
                                <option value ="<?php echo $singleSR->ADJTYPE;?>"><?php echo $singleSR->ADJTYPE;?> Adjustment</option>


                            </select>
                        </div>
                        <?php
                        addLegend(" ", "col-md-2","");
                        addLegend("Customer", "col-md-1","");
                        addInput( "CUSTNAME", "text",$singleSR->CUSTNAME,"Customer Name","form-control input-sm","col-md-4"," readonly  ");
                        addInput( "CUSTOMERID", "hidden",$singleSR->CUSTOMERID,"Customer ID","form-control input-sm","col-md-1"," hidden ");
                        addInput( "CUSTCODE", "hidden",$singleSR->CUSTCODE,"Customer Code","form-control input-sm","col-md-1"," hidden ");
                        ?>
                        <div class="col-md-1">
                            <button id="myBtn" style="height: 32px" type = "button" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                        </div>

                    </div>

                    <div class="form-group">
                        <?php


                        addLegend("Approved By", "col-md-1","");
                        addInput( "APPROVEDBY", "text",$singleSR->APPROVEDBY,"APPROVEDBY","form-control input-sm","col-md-4"," required   ");
                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-1 " >
                            Remarks
                        </div>
                        <div class="col-md-11" >

                            <textarea  placeholder="Note" class="form-control input-sm" id="NOTE" name="NOTE"  ><?php echo $singleSR->NOTE;?></textarea>

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

                                            <th width="58%" align="center" >Products<div>Products</div></th>
                                            <th width="12%" align="center" colspan="2">Code<div>Code</div></th>
                                            <th width="8%" align="center">Qty.<div>Qty.</div></th>
                                            <th <?php echo $QTYRESETTAG;?>  class="QRESET" width="8%" align="center">Qty Reset<div>Qty Reset</div></th>
                                            <th width="8%" align="center">Unit<div>Unit</div></th>
                                            <th width="6%" align="center">Action<div>Action</div></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!--  Sales Product List !-->
                                        <?php
                                        //$mydb->setQuery("SELECT * FROM `tblslsdetl` where ADJID=".$ADJID);
                                        // $cur = $mydb->loadResultList();

                                        $cur = $mydb->loadResultList();
                                        $cur = $TranDetl->listofTranPerID($ADJID);
                                        $total=0.00;
                                        foreach ($cur as $result) {
                                            $rCounter = $rCounter +1;


                                            $PDArray = $PDArray + array(
                                                    $result->ADJPID => array(

                                                        "PROID" => $result->PROID,
                                                        "ADJID" => $result->ADJID,

                                                        "QTY" => $result->QTY,
                                                        "UNIT" => $result->UNIT,
                                                        "QTYRESET"=> $result->QTYRESET,

                                                        "PRONAME" => $result->PRONAME ,
                                                        "PROCODE" => $result->PROCODE
                                                    ));

                                            echo '<tr>';

                                            echo '<td>' . $result->PRONAME.'</td>';
                                            echo '<td COLSPAN="2">' . $result->PROCODE.'</td>';
                                            echo '<td style="text-align: right">' . number_format($result->QTY).'</td>';
                                            echo '<td '.$QTYRESETTAG.' style="text-align: right">' . number_format($result->QTYRESET).'</td>';
                                            echo '<td>' . $result->UNIT.'</td>';
                                            echo '<td align="center"><a style="'. $CTRLHIDDEN .'" title="Edit" href="#" onclick="ProdDetailEntry('.$result->ADJPID.',1)" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
                                            <a title="Delete"  style="'. $CTRLHIDDEN .'"  href="controller.php?action='.md5('itemdelete').'&id='.$ADJID.'&pid='.$result->ADJPID.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';


                                            echo '</tr>';
                                        }

                                        ?>

                                        <tr id="EntryProduct" hidden >

                                            <td>

                                                <input hidden class="form-control input-sm " id="PROID"  name="PROID" type="hidden"  value="0" >
                                                <input    class="form-control input-sm " id="PRONAME"  name="PRONAME" type="text"  value="" >

                                                <input hidden class="form-control input-sm " id="OLDPROID"  name="OLDPROID" type="hidden"  value="0" >
                                                <input  class="form-control input-sm " id="OLDPRONAME"  name="OLDPRONAME" type="hidden"  value="" >
                                            </td>

                                            <td>
                                                <input  class="form-control input-sm " id="PID"  name="PID" type="hidden"  value="0" >

                                                <input  class="form-control input-sm " id="ADJPID"  name="ADJPID" type="hidden"  value="0" >
                                                <input  class="form-control input-sm " id="PROCODE"  name="PROCODE" type="text"  value="" >
                                                <input  class="form-control input-sm " id="ADJPID"  name="OLDADJPID" type="hidden"  value="0" >
                                                <input     class="form-control input-sm " id="OLDPROCODE"  name="OLDPROCODE" type="HIDDEN"  value="" >
                                            </td>
                                            <td>
                                                <button   id="myBtn2" type = "button"  style="height: 32px; " class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                                            </td>
                                            <td>
                                                <input   title="Quantity" class="form-control input-sm form-num" id="QTY"  name="QTY" type="text"  value="0" >
                                                <input  title="Quantity" class="form-control input-sm form-num" id="OLDQTY"  name="OLDQTY" type="hidden"  value="0" >
                                            </td>
                                            <td <?php echo $QTYRESETTAG;?> class = "QRESET">
                                                <input  readonly class="form-control input-sm form-num" id="QTYRESET"  name="QTYRESET" type="text"  value="0">
                                                <input hidden class="form-control input-sm form-num" id="PROQTY"  name="PROQTY" type="hidden"   value="0"  >
                                                <input  class="form-control input-sm form-num" id="OLDQTYRESET"  name="OLDQTYRESET" type="HIDDEN"  value="0">
                                                <input hidden class="form-control input-sm form-num" id="OLDPROQTY"  name="OLDPROQTY" type="hidden"   value="0"  >
                                            </td>
                                            <td>
                                                <input  class="form-control input-sm " id="UNIT" placeholder="Unit" title="Enter Unit" name="UNIT" type="text"  value="" >
                                                <input  class="form-control input-sm " id="OLDUNIT" placeholder="Unit" title="Enter Unit" name="OLDUNIT" type="HIDDEN"  value="" >

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
                        </div>



                        <div class="col-lg-12 " style="margin-top: 20px"  >
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
        width: 60%;
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
        <div class="row" style="padding: 0px 15px 0px 15px;" >
            <div class="col-lg-11">
                <input type="text" class="form-control input-sm"  id="myInput" onkeyup="myTblFilter('myInput','TBListPopup')" placeholder="Search " title="Enter keyword to search from database...">
            </div>
            <div class="col-lg-1">
                <span class="close pull-right" onclick="modalListClose()" id="btnClose">&times;</span>
            </div>

        </div>
        <div id="MyModalPage">

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


<script>

</script>