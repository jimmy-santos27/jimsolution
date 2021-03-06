<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
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
?>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" >

            <!-- /.panel-heading -->
            <div class="panel-body" style="font-weight: normal">

                <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('add');?>" method="POST">

                    <!---
                   P.O. Header - start
                   !--->

                    <div class="form-group">
                        <?php
                        addLegend("R.R. No.", "col-md-1","");
                        addInput( "RRNO", "text",$finalcode,"Auto Generate","form-control input-sm","col-md-2"," readonly ");
                        addInput( "RRID", "hidden","","Auto Generate","form-control input-sm","col-md-2"," hidden ");
                        addLegend(" ", "col-md-3","");
                        addLegend("Reference", "col-md-1","");
                        addInput( "refno", "text","","Reference No.","form-control input-sm","col-md-2","   ");
                        addLegend("Date", "col-md-1","");
                        addInput( "entdate", "date",date('Y-m-d'),"P.O. Date","form-control input-sm","col-md-2"," required ");
                       // addLegend("Forex", "col-md-1","hidden");
                        addInput( "FOREXRATE", "hidden","1","Forex Rate","form-control input-sm form-num","noshow"," hidden ");
                        addInput( "FOREX", "hidden","","Currency","form-control input-sm","noshow"," hidden  ");
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        addLegend("Supplier", "col-md-1","");
                        addInput( "SUPPNAME", "text","","Supplier Name","form-control input-sm","col-md-4"," autocomplete=\"off\" spellcheck=\"false\" ");
                        addInput( "SUPPLIERID", "hidden","","Supplier ID","form-control input-sm","col-md-1"," hidden ");
                        addInput( "SUPPCODE", "hidden","","Supplier Code","form-control input-sm","col-md-1"," hidden ");
                        addInput( "CREDITLIMIT", "hidden","","CREDIT LIMIT","form-control input-sm","col-md-1"," hidden  ");
                        addInput( "BALANCE", "hidden","","BALANCE","form-control input-sm","col-md-1"," hidden ");
                        addInput( "STATNAME", "hidden","0","Supplier Type","form-control input-sm","col-md-1"," hidden ");
                        ?>
                        <div class="col-md-1">
                            <button id="myBtn" style="height: 32px" type = "button" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                        </div>
                        <?php
                        addLegend("Terms", "col-md-1","");
                        addInput( "terms", "text","0","Terms","form-control input-sm form-num","col-md-2","   ");
                        addLegend("Due Date", "col-md-1","");
                        addInput( "duedate", "date",date('Y-m-d'),"Due Date Date","form-control input-sm","col-md-2","  ");
                        ?>
                    </div>


                    <div class="form-group">
                        <div class="col-md-1 " >
                            Remarks
                        </div>
                        <div class="col-md-9" >
                            <textarea  placeholder="Note" class="form-control input-sm" id="note" name="note"    value=""></textarea>
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

                    <div class="form-group">
                        <div class="col-md-12 " >
                            <table class="table table-bordered" id="resultTable" data-responsive="table">

                                <thead>
                                <tr>
                                    <th hidden width="10%" align="center">P.O. No</th>

                                    <!-- <th>No.</th> -->
                                    <th width="7%" align="center">Qty.</th>
                                    <th width="7%" align="center">Unit</th>
                                    <th width="7%" align="center" >Qty/Box</th>
                                    <th width="25%" align="center" >Products</th>
                                    <th width="10%" align="center" colspan="2">Code</th>
                                    <th hidden width="8%" align="center">For. Cost</th>
                                    <th hidden width="8%" align="center">For. Amt.</th>
                                    <th width="8%" align="center"  >Php Cost</th>
                                    <th width="8%" align="center">Php Amt.</th>
                                    <th hidden width="7%" align="center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="ItemEntry">


                                <tr>
                                    <td hidden>
                                        <input  class="form-control input-sm " id="pono"  name="pono" type="hidden"  value=""    >


                                    </td>
                                    <td>
                                        <input required  class="form-control input-sm form-num" onblur="qtyValidation()" id="QTY"  name="QTY" type="text"  value="0" onfocus="updatePrice()"   >
                                        <input hidden class="form-control input-sm form-num" id="PROQTY"  name="PROQTY" type="hidden"  value="0"  >
                                        <input hidden class="form-control input-sm form-num" id="OLDQTY"  name="OLDQTY" type="hidden"  value="0"  >
                                    </td>
                                    <td>
                                        <input  class="form-control input-sm " id="UNIT"  name="UNIT" type="text"  value="" >
                                    </td>
                                    <td>
                                        <input    class="form-control input-sm form-num" id="QTYPERBOX"  name="QTYPERBOX" type="text"  value="0" >
                                    </td>

                                    <td>
                                        <input hidden class="form-control input-sm " id="PROID"  name="PROID" type="hidden"  value="" >
                                        <input   class="form-control input-sm " id="PRONAME"  name="PRONAME" type="text"  value="" >
                                    </td>

                                    <td>
                                        <input  class="form-control input-sm " id="POPID"  name="POPID" type="hidden"  value="" >
                                        <input   class="form-control input-sm " id="PROCODE"  name="PROCODE" type="text"  value="" >
                                    </td>
                                    <td >

                                        <button   id="myBtn2" type = "button"  style="height: 32px;  " class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>

                                    </td>
                                    <td HIDDEN>
                                        <input   required  onblur="priceValidation()" class="form-control input-sm form-num" id="FORPURPRICE"   name="FORPURPRICE" type="HIDDEN" value="0"    >
                                    </td>

                                    <td HIDDEN>
                                        <input  READONLY onblur="priceValidation()" class="form-control input-sm form-num" id="FORAMOUNT"   name="FORAMOUNT" type="HIDDEN" value="0"    >
                                    </td>

                                    <td>
                                        <input   required onblur="priceValidation()" class="form-control input-sm form-num" id="PURPRICE"   name="PURPRICE" type="text" value="0"    >
                                    </td>

                                    <td>
                                        <input class="form-control input-sm form-num" id="AMOUNT"   name="AMOUNT" type="text" value="0" readonly>
                                        <input class="form-control input-sm form-num" id="OLDAMOUNT"   name="OLDAMOUNT" type="hidden" value="0" readonly>
                                    </td>
                                    <td hidden>
                                    </td>
                                </tr>
                                <tr hidden>
                                    <td colspan="1">Suppplier Item: </td>

                                    <td colspan="4">
                                        <input  class="form-control input-sm " id="SUPPITEM"  name="SUPPITEM" type="HIDDEN"  value="" >
                                    </td>
                                    <td colspan="2">Floor Price: </td>

                                    <td colspan="1">
                                        <input   required class="form-control input-sm form-num" id="FLOORPRICE"  name="FLOORPRICE" type="HIDDEN"  value="0" >
                                    </td>
                                    <td colspan="1">Rate </td>

                                    <td colspan="1">
                                        <input  required   class="form-control input-sm form-num" id="FLOORRATE"  name="FLOORRATE" type="HIDDEN"  value="0" >
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
                        <div class="container">
                            <div class="col-lg-2">
                                <button class="btn btn-primary btn-sm" style="width: 100%;"  name="save" type="submit" >
                                    <span class="fa fa-save fw-fa"></span> Save
                                </button>
                            </div>
                            <div class="col-lg-2 pull-right" >
                                <a  href="index.php" class="btn btn-danger btn-sm" style="width: 100%"  name="cancel"   >
                                    <span class="fa fa-close fw-fa"></span> Cancel
                                </a>
                            </div>
                            <br>


                            <?php
                            if($_SESSION['U_ROLE']=='Administrator'){
                                // echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
                                ; }?>
                            <br>
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

