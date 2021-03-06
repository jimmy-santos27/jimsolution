
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
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="addPanel">

            <!-- /.panel-heading -->
            <div class="panel-body" style="font-weight: normal">

                <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('add');?>" method="POST">
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
                        addInput( "pono", "text",$finalcode,"Auto Generate","form-control input-sm","col-md-2"," readonly ");
                        addInput( "POID", "hidden","","Auto Generate","form-control input-sm","col-md-2"," hidden ");
                        addLegend("Reference", "col-md-1","");
                        addInput( "refno", "text","","Reference No.","form-control input-sm","col-md-2","   ");
                        addLegend("Date", "col-md-1","");
                        addInput( "entdate", "date",date('Y-m-d'),"P.O. Date","form-control input-sm","col-md-2","   required ");
                        addLegend("Forex", "col-md-1","");
                        addInput( "FOREXRATE", "text","1","Forex Rate","form-control input-sm form-num","col-md-1"," REQUIRED  ");
                        addInput( "FOREX", "text","","Currency","form-control input-sm","col-md-1"," required  ");
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
                        <div class="col-md-11" >
                            <textarea  placeholder="Note" class="form-control input-sm" id="note" name="note"    value=""></textarea>
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
                                    <th hidden width="7%" align="center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="ItemEntry">


                                    <tr>
                                        <td>
                                            <input required  class="form-control input-sm form-num" onblur="qtyValidation()" id="QTY"  name="QTY" type="text"  value="0" onfocus="updatePrice()"   >
                                            <input hidden class="form-control input-sm form-num" id="PROQTY"  name="PROQTY" type="hidden"  value="0"  >

                                        </td>
                                        <td>
                                            <input  class="form-control input-sm " id="UNIT"  name="UNIT" type="text"  value="" >
                                        </td>
                                        <td>
                                            <input  required  class="form-control input-sm form-num" id="QTYPERBOX"  name="QTYPERBOX" type="text"  value="0" >
                                        </td>

                                        <td>
                                            <input hidden class="form-control input-sm " id="PROID"  name="PROID" type="hidden"  value="" >
                                            <input required   class="form-control input-sm " id="PRONAME"  name="PRONAME" type="text"  value="" >
                                        </td>

                                        <td>
                                            <input  class="form-control input-sm " id="POPID"  name="POPID" type="hidden"  value="" >
                                            <input required   class="form-control input-sm " id="PROCODE"  name="PROCODE" type="text"  value="" >
                                        </td>
                                        <td >

                                            <button   id="myBtn2" type = "button"  style="height: 32px;  " class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>

                                        </td>
                                        <td>
                                            <input  required  onblur="priceValidation()" class="form-control input-sm form-num" id="FORPURPRICE"   name="FORPURPRICE" type="text" value="0"    >
                                        </td>

                                        <td>
                                            <input READONLY onblur="priceValidation()" class="form-control input-sm form-num" id="FORAMOUNT"   name="FORAMOUNT" type="text" value="0"    >
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
                                <tr>
                                    <td colspan="2">Suppplier Item: </td>

                                    <td colspan="2">
                                        <input  class="form-control input-sm " id="SUPPITEM"  name="SUPPITEM" type="text"  value="" >
                                    </td>
                                    <td colspan="2">Floor Price: </td>

                                    <td colspan="1">
                                        <input   required class="form-control input-sm form-num" id="FLOORPRICE"  name="FLOORPRICE" type="text"  value="0" >
                                    </td>
                                    <td colspan="1">Rate </td>

                                    <td colspan="1">
                                        <input  required   class="form-control input-sm form-num" id="FLOORRATE"  name="FLOORRATE" type="text"  value="0" >
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
                        <div class="container">
                            <button class="btn btn-primary btn-sm" style="width: 100%"  name="save" type="submit" >
                                <span class="fa fa-save fw-fa"></span> Save
                            </button>
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
                <span class="close pull-right" id="btnClose">&times;</span>
            </div>

        </div>
        <div  id="MyModalPage">

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