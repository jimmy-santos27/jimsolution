
<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
function createRandomPassword()
{
    $chars = "003232303232023232023456789";
    srand((double)microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);
        if ($tmp =="")
        {
            $tmp = "0";
        }

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$finalcode = 'OR-' . createRandomPassword();
date_default_timezone_set("Asia/Taipei");
$Customer = new Customer();
$TranHead = new SalesPayHead();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="addPanel">

            <!-- /.panel-heading -->
            <div class="panel-body" style="font-weight: normal">

                 <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('add');?>" method="POST">
                     <div class="row" >

                         <div class="col-md-10" >
                             <?php include("../theme/head_nav.php"); ?>
                         </div>
                         <div class="col-md-2">
                             <?php
                             addLegend("", "col-lg-1","");
                             addLegend($finalcode, "col-lg-10","");
                             addInput( "ORID", "hidden",$finalcode,"Auto Generate","form-control input-sm","col-lg-1"," readonly ");
                             ?>

                         </div>


                     </div>
                     <hr>
                     <!--- Payment entry - start  !--->
                    <div class="row">
                        <!--- Payment Header - start  !--->
                        <div class="col-lg-6" >
                            <div class="form-group">
                                 <?php
                                     addLegend("O.R. No.", "col-md-3","");
                                     addInput( "ORNO", "text",$TranHead->lastReceipt(),"O.R. No.","form-control input-sm form-num","col-md-3"," required  ");
                                     addInput( "ORNO2", "text",$TranHead->lastReceipt(),"O.R. No.","form-control input-sm","col-md-3"," hidden  ");


                                     addLegend("Date", "col-md-2","");
                                     addInput( "ENTDATE", "date",date('Y-m-d'),"O.R. Date","form-control input-sm","col-md-4","   required ");
                                 ?>
                            </div>
                            <div class="form-group">


                                <?php

                                 addLegend("Customer", "col-md-3","");


                                 ?>
                                <div class="col-md-9">
                                    <input type="hidden" id="CUSTNAME" NAME="CUSTNAME" VALUE="">

                                    <select required id="CUSTOMERID" NAME = "CUSTOMERID" x-placement="Customer" class="selectpicker with-ajax" data-show-subtext="true" data-live-search="true" >

                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <?php

                                addLegend("Cash Amount", "col-md-3","");
                                addInput( "CASHAMT", "text","0","Cash Amount","form-control input-sm form-num","col-md-3","   ");
                                addLegend("Card Amount", "col-md-3","");
                                addInput( "CARDAMT", "text","0","Credit/Debit Card Amount","form-control input-sm form-num","col-md-3","   ");

                                ?>

                            </div>
                            <div hidden class="form-group" id="CCINFO">
                                <?php
                                addLegend("Card Name", "col-md-3","");
                                addInput( "CARDNAME", "text","","Credit Card Owner's Name","form-control input-sm","col-md-9","  ");
                                addLegend("Card No.", "col-md-3","");
                                addInput( "CCNO", "text","","Credit Card NO.","form-control input-sm","col-md-9","  ");
                                addLegend("Expiry Date", "col-md-3","");
                                addInput( "CCEXPIRY", "date",date('Y-m-d'),"Expiry Date.","form-control input-sm","col-md-3","   ");
                                addLegend("Approval No", "col-md-3","");
                                addInput( "CCAPPROVAL", "text","","Approval No","form-control input-sm","col-md-3","   ");
                                ?>

                            </div>

                            <div class="form-group">
                                <div class="col-md-12" >
                                    Remarks
                                </div>
                                <div class="col-md-12" >
                                    <textarea  placeholder="Note" class="form-control input-sm" id="NOTE" name="NOTE"    value=""></textarea>
                                </div>

                            </div>
                        </div>
                        <!--- Payment Header - end  !--->

                        <!--- Check Detail - start  !--->
                        <div class="col-lg-6" >

                            <div class="form-group" style=" border: 1px solid #CCCCCC; border-radius: 3px;  padding: 0px; margin: 0px;" >
                                <div class="col-md-12 "  style="height: 180px; overflow-y: auto; border: 0px solid #f0eee8; padding: 0px; margin: 0px;" >
                                    <table class="table table-bordered" id="resultTable" data-responsive="table">

                                        <thead>
                                        <tr>
                                            <!-- <th>No.</th> -->
                                            <th width="40%" align="center" >Bank</th>
                                            <th width="15%" align="center" >Check No.</th>
                                            <th width="15%" align="center">Check Date</th>
                                            <th width="15%" align="center">Clearing</th>
                                            <th width="15%" align="center">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <input   class="form-control input-sm " id="BANK"  name="BANK" type="text"  value="" >
                                            </td>
                                            <td>
                                                <input  class="form-control input-sm " id="CHKNO"  name="CHKNO" type="text"  value="" >
                                            </td>
                                            <td>
                                                <input   class="form-control input-sm " id="CHKDATE"  name="CHKDATE" type="DATE" value="<?php echo date('Y-m-d');?>"  >
                                            </td>
                                            <td>
                                                <input  class="form-control input-sm " id="CLEARDATE"  name="CLEARDATE" type="DATE"  value="<?php echo date('Y-m-d');?>"  >
                                            </td>
                                            <td>
                                                <input   class="form-control input-sm form-num" id="CHKAMOUNT"  name="CHKAMOUNT" type="text"  value="0" >
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>


                    </div>
                     <hr>

                     <div class="container">
                         <button class="btn btn-primary btn-sm" style="width: 100%"  name="save" type="submit" >
                             <span class="fa fa-save fw-fa"></span> Save
                         </button>

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

