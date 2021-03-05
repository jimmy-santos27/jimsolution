
<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
date_default_timezone_set("Asia/Taipei");
function createRandomPassword()
{
    $chars = "12345678909876543210";
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
$finalcode = 'AD' . createRandomPassword();

$Customer = new Customer();
$TranHead = new AdjustHead();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default"  >

            <!-- /.panel-heading -->
            <div class="panel-body" style="font-weight: normal">

                 <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('add');?>" method="POST">

                     <!---
                    Sales Header - start
                    !--->

                     <div class="form-group">
                         <?php
                         addLegend("Adj. No.", "col-md-1","");
                         addInput( "ADJNO", "text",$finalcode,"Auto Generate","form-control input-sm","col-md-2"," readonly ");
                         addInput( "ADJID", "hidden","","Auto Generate","form-control input-sm","col-md-2"," hidden ");
                         addLegend(" ", "col-md-2","");

                         addLegend("Reference", "col-md-1","");
                         addInput( "REFNO", "text","","Reference No.","form-control input-sm","col-md-2","   ");
                         addLegend("Date", "col-md-1","");
                         addInput( "ENTDATE", "date",date('Y-m-d'),"Sales Date","form-control input-sm","col-md-2","   required ");
                          ?>
                     </div>

                     <div class="form-group">
                         <?php

                         addLegend("Type", "col-md-1","");
                         ?>
                         <div class="col-md-2" >
                             <select id="ADJTYPE"  NAME="ADJTYPE" class="form-control input-sm" data-show-subtext="true"
                                     required>

                                 <option value="Replacement">Replacement</option>
                                 <option value="Beginning">Beginning Balance</option>
                                 <option value="Return">Return Adjustment</option>
                                 <option value="Less">Less Adjustment</option>
                                 <option value="Damage">Damage Product</option>
                                 <option value="Reset">Reset Product</option>

                             </select>
                         </div>
                         <?php
                         addLegend(" ", "col-md-2","");
                         addLegend("Customer", "col-md-1","");
                         addInput( "CUSTNAME", "text","","Customer Name","form-control input-sm","col-md-4","    ");
                         addInput( "CUSTOMERID", "hidden","0","Customer ID","form-control input-sm","col-md-1"," hidden ");
                         addInput( "CUSTCODE", "hidden","","Customer Code","form-control input-sm","col-md-1"," hidden ");
                          ?>
                         <div class="col-md-1">
                            <button id="myBtn" style="height: 32px" type = "button" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                         </div>

                      </div>

                     <div class="form-group">
                         <?php


                         addLegend("Approved By", "col-md-1","");
                         addInput( "APPROVEDBY", "text","","APPROVEDBY","form-control input-sm","col-md-4"," required   ");
                         ?>

                     </div>
                     <div class="form-group">
                         <div class="col-md-1 " >
                             Remarks
                         </div>
                         <div class="col-md-11" >
                             <textarea  placeholder="Note" class="form-control input-sm" id="NOTE" name="NOTE"    value=""></textarea>
                         </div>

                     </div>

                     <!---
                    Sales Header - end
                      <div class="container">
                    !--->


                     <div class="form-group">
                         <div class="col-md-12 " >
                            <table class="table table-bordered" id="resultTable" data-responsive="table">

                        <thead>
                        <tr>
                            <!-- <th>No.</th> -->

                            <th width="45%" align="center" >Products</th>
                            <th width="15%" align="center" colspan="2">Code</th>
                            <th width="10%" align="center">Qty.</th>
                            <th hidden class="QRESET" width="10%" align="center">Qty Reset</th>
                            <th width="10%" align="center">Unit</th>

                        </tr>
                        </thead>
                        <tbody>


                <tr id="ItemEntry" >
 
                    <td>
                        <input hidden class="form-control input-sm " id="PROID"  name="PROID" type="hidden"  value="" >
                        <input required   class="form-control input-sm " id="PRONAME"  name="PRONAME" type="text"  value="" >
                    </td>

                    <td>
                        <input  class="form-control input-sm " id="ADJPID"  name="ADJPID" type="hidden"  value="" >
                        <input required   class="form-control input-sm " id="PROCODE"  name="PROCODE" type="text"  value="" >
                    </td>
                    <td>
                         <button   id="myBtn2" type = "button"  style="height: 32px; " class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                    </td>
                    <td>
                        <input required title="Quantity" class="form-control input-sm form-num" id="QTY"  name="QTY" type="text"  value="0"    >
                        <input required title="Quantity" class="form-control input-sm form-num" id="OLDQTY"  name="OLDQTY" type="hidden"  value="0"    >
                    </td>
                    <td hidden class = "QRESET">
                        <input readonly class="form-control input-sm form-num" id="QTYRESET"  name="QTYRESET" type="text"  value="0">
                        <input hidden class="form-control input-sm form-num" id="PROQTY"  name="PROQTY" type="hidden"  value="0"  >
                    </td>
                    <td>
                        <input required READONLY class="form-control input-sm " id="UNIT"  name="UNIT" type="text"  value="" >
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