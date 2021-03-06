<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}

date_default_timezone_set("Asia/Taipei");
$CTRLHIDDEN = "   ";
$TranID = $_GET['id'];
$SLSPID = $_GET['pid'];
$TranPay = new SalesPayHead();
$newSOD = new SalesOrderDetl();
$Products = new Product();
if ($SLSPID==""){ $SLSPID= "0";}

$PDArray = array(array());
$rCounter = 0;
$sResult = $TranPay->singleRecord($TranID,1);

$customer = New Customer();
$singleCustomer = $customer->single_customer($sResult->CUSTOMERID);
if ($sResult->ISPRINTED=="T" || $sResult->CANCELLED=="T"){
     $CTRLHIDDEN = " display: none; ";

}

$previewUrl= "index.php?view=".md5('view')."&id=". $_GET['id'] ."&pid=";
?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="editPanel">

            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php
                viewPrintButton(3);
                ?>


                <form id="formEdit" class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>" method="POST">
                    <div class="row" >

                        <div class="col-md-9" >
                            <?php include("../theme/head_nav.php"); ?>
                        </div>
                        <div class="col-md-2">
                            <?php
                            addLegend(" ", "col-lg-6","");
                            addLegend(str_pad($TranID, 10, '0', STR_PAD_LEFT), "col-lg-5","");
                            ;
                            addInput( "ORID", "hidden",$TranID,"Auto Generate","form-control input-sm","col-lg-1"," readonly ");
                            ?>

                        </div>


                    </div>
                    <div class="col-lg-12" style="border-top: 1px solid #e7e7ff; margin-top: 10px;padding-bottom: 20px;"></div>
                    <!--- Payment entry - start  !--->
                    <div class="row">
                        <!--- Payment Header - start  !--->
                        <div class="col-lg-6" >
                            <div class="form-group">
                                <?php
                                addLegend("O.R. No.", "col-md-3","");
                                addInput( "ORNO", "text",$sResult->ORNO,"O.R. No.","form-control input-sm form-num","col-md-3"," readonly  ");
                                addInput( "ORNO2", "text",$sResult->ORNO,"O.R. No.","form-control input-sm","col-md-3"," hidden  ");


                                addLegend("Date", "col-md-2","");
                                addInput( "ENTDATE", "date",$sResult->ENTDATE,"O.R. Date","form-control input-sm","col-md-4","   required ");
                                ?>
                            </div>
                            <div class="form-group">


                                <?php

                                addLegend("Customer", "col-md-3","");


                                ?>

                                    <?php


                                    addInput( "CUSTNAME", "text",$sResult->CUSTNAME,"Customer Name","form-control input-sm","col-md-9"," readonly  ");

                                    addInput( "CUSTOMERID", "hidden",$sResult->CUSTOMERID,"Customer","form-control input-sm form-num","col-md-3","   ");

                                    ?>

                            </div>
                            <div class="form-group">
                                <?php

                                addLegend("Cash Amount", "col-md-3","");
                                addInput( "CASHAMT", "text",$sResult->CASHAMT,"Cash Amount","form-control input-sm form-num","col-md-3","   ");
                                addLegend("Card Amount", "col-md-3","");
                                addInput( "CARDAMT", "text",$sResult->CARDAMT,"Credit/Debit Card Amount","form-control input-sm form-num","col-md-3","   ");

                                ?>

                            </div>
                            <div <?php if($sResult->CARDAMT==0){ echo "hidden";}?> class="form-group" id="CCINFO">
                                <?php
                                addLegend("Card Name", "col-md-3","");
                                addInput( "CARDNAME", "text",$sResult->CARDNAME,"Credit Card Owner's Name","form-control input-sm","col-md-9","  ");
                                addLegend("Card No.", "col-md-3","");
                                addInput( "CCNO", "text",$sResult->CCNO,"Credit Card NO.","form-control input-sm","col-md-9","  ");
                                addLegend("Expiry Date", "col-md-3","");
                                addInput( "CCEXPIRY", "date",$sResult->CCEXPIRY,"Expiry Date.","form-control input-sm","col-md-3","   ");
                                addLegend("Approval No", "col-md-3","");
                                addInput( "CCAPPROVAL", "text",$sResult->CCAPPROVAL,"Approval No","form-control input-sm","col-md-3","   ");
                                ?>

                            </div>

                            <div class="form-group">
                                <div class="col-md-12" >
                                    Remarks
                                </div>
                                <div class="col-md-12" >
                                    <textarea  placeholder="Note" class="form-control input-sm" id="NOTE" name="NOTE"  ><?php echo $sResult->NOTE;?></textarea>
                                </div>

                            </div>
                            <div class="form-group">
                                <style>

                                    .TblSummary{
                                        font-size: 10pt;
                                        font-family: Arial, Helvetica, sans-serif;
                                        border: 1px solid #c4e3f3 !important;
                                        background-color: floralwhite;
                                    }
                                    .TblSummary th {
                                        background-color: #c4e3f3;
                                        color: #02475A;
                                        padding: 3px;
                                        border-bottom: 1px solid #c4e3f3 !important;
                                    }
                                    .TblSummary td{
                                        padding: 3px;
                                        border-left: 1px solid #e7e7ff;
                                    }
                                    .TblSummary td:first-child{
                                        border-left: 1px solid #c4e3f3 !important;
                                    }
                                    .TblSummary tfoot td{

                                        border-top: 1px solid #c4e3f3 !important;
                                    }
                                    .discrepancy td{
                                        color:black;
                                        background-color: #f7a8ab;
                                    }
                                </style>
                                <div class="col-md-12" >
                                    <table width="100%" class="TblSummary table table-striped">
                                        <thead>
                                            <tr> <th colspan="4">SUMMARY</th></tr>
                                        </thead>
                                        <tr>
                                            <td width="25%">
                                                Total Payment
                                            </td>
                                            <td width="25%" class="numericCol">
                                                <span class="PAIDAMT"><?php echo   number_format( $sResult->PAIDAMT,2);?> </span>
                                            </td>
                                            <td width="25%">
                                                Bounced Check
                                            </td>
                                            <td width="25%" class="numericCol" >
                                                <span class="totalbounced"><?php echo   number_format( $sResult->TOTALBOUNCED,2);?> </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="25%">
                                                Sales Payment
                                            </td>
                                            <td width="25%" class="numericCol" align="right">
                                                <span id="sTOTALSALES"><?php echo   number_format( $sResult->TOTALSALES,2);?> </span>
                                            </td>
                                            <td width="25%" >
                                                Bounced Sales
                                            </td>
                                            <td width="25%" class="numericCol"
                                                <span id="sBOUNCEDSALES"><?php echo   number_format( $sResult->BOUNCEDSALES,2);?> </span>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td width="25%">
                                                Offset/CM/Short/Discount
                                            </td>
                                            <td width="25%" class="numericCol">
                                                <span class="OFFCREDIT"><?php echo   number_format(  $sResult->OFFCREDIT,2);?> </span>
                                            </td>
                                            <td   >

                                            </td>
                                            <td   >

                                            </td>


                                        </tr>
                                        <tfoot>
                                            <tr class="discrepancy">
                                                <td width="25%" >
                                                    Discrepancy
                                                </td>
                                                <td width="25%"  class="numericCol">
                                                    <span class="PAYMENTDIFF"><?php echo   number_format( (($sResult->PAIDAMT + $sResult->OFFCREDIT - $sResult->TOTALSALES)),2);?> </span>
                                                </td>
                                                <td width="25%">
                                                    Discrepancy
                                                </td>
                                                <td width="25%" class="numericCol">
                                                    <span class="BOUNCEDDIFF"><?php echo   number_format( ($sResult->TOTALBOUNCED - $sResult->BOUNCEDSALES),2);?> </span>
                                                </td>

                                            </tr>
                                        </tfoot>

                                    </table>
                                </div>

                            </div>



                        </div>
                        <!--- Payment Header - end  !--->


                        <div class="col-lg-6" >
                            <!--- Check Detail - start  !--->
                            <div class="form-group" style=" border-radius: 0px;  padding: 0px; margin: 0px;" >
                                <section class="">
                                <div class="container1"  >

                                    <table id="PAYCHECK" class="table-striped"  data-responsive="table">

                                        <thead>
                                        <tr class="header">
                                            <!-- <th>No.</th> -->
                                            <th width="30%" align="center" >Bank<div>Bank</div></th>
                                            <th width="15%" align="center" >Check No.<div>Check No.</div></th>
                                            <th width="14%" align="center">Check Date<div>Check Date</div></th>
                                            <th width="14%" align="center">Clearing<div>Clearing</div></th>
                                            <th width="14%" align="center">Amount<div>Amount</div></th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr hidden id ="CheckEntry">
                                            <td>
                                                <input   class="form-control input-sm form-num" id="ORCID"  name="ORCID" type="hidden"  value="0" >
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
                                            <td COLSPAN="2">
                                                <input   class="form-control input-sm form-num" id="CHKAMOUNT"  name="CHKAMOUNT" type="text"  value="0" >
                                            </td>
                                        </tr>
                                        <?php
                                            $cur = $TranPay->listDetails($TranID, 3);
                                            $ChecksList = array(array());
                                            foreach ($cur as $lResult){
                                                $BouncedTag = "";
                                                if ($lResult->BOUNCED =="T"){
                                                    $BouncedTag = "BOUNCED";
                                                }
                                                $ChecksList = $ChecksList + array(
                                                        $lResult->ORCID => array(
                                                            "BANK" => $lResult->BANK,
                                                            "CHKNO" => $lResult->CHKNO,
                                                            "CHKDATE" => $lResult->CHKDATE,
                                                            "CLEARDATE" => $lResult->CLEARDATE,
                                                            "CHKAMOUNT"=> $lResult->CHKAMOUNT
                                                        ));
                                                echo '<tr id = "PC'.$lResult->ORCID.'" CLASS="'.$BouncedTag.'">
                                                        <td>'.$lResult->BANK.'</td>
                                                        <td>'.$lResult->CHKNO.'</td>
                                                        <td>'.$lResult->CHKDATE.'</td>
                                                        <td>'.$lResult->CLEARDATE.'</td>
                                                        <td class="numericCol">'.number_format($lResult->CHKAMOUNT,2).'</td>';


                                             }

                                        ?>


                                        </tbody>
                                    </table>
                                </div>
                                </section>



                            </div>
                            <!--- Check Total - start  !--->
                            <div class="col-lg-12"  style="padding: 0px 0px 0px 0px; " >
                                <div  class="col-lg-6" style="border: 1px solid #c3daf9;padding: 5px;" >
                                    <span class="BOUNCED fa fa-stop fa-fw"  ></span>Bounced Check :
                                    <span class="totalbounced"><?php echo   number_format( $sResult->TOTALBOUNCED,2);?> </span>
                                </div>

                                <div class="col-lg-6"   style="padding: 5px; text-align: right;  border: 1px solid #c3daf9">
                                    Total Check Amount :  <span id="totalcheck"><?php echo   number_format( $sResult->TOTALCHK,2);?> </span>
                                </div>
                            </div>
                            <!--- Sales Detail - start  !--->
                            <div id="SalesPanel" class="form-group" style=" border-radius: 0px;  padding: 0px; margin:0px; margin-top: 37px;" >

                                <section class="">
                                    <div class="container2"  >

                                        <table id="PAYDETL" class="table-striped"  data-responsive="table">


                                        <thead>
                                        <tr>
                                            <!-- <th>No.</th> -->


                                            <th width="10%" align="center" >Sales ID<div>Sales ID</div></th>
                                            <th width="10%" align="center" >Invoice<div>Invoice</div></th>
                                            <th width="10%" align="center">D.R. No.<div>D.R. No.</div></th>
                                            <th width="10%" align="center">Type<div>Type</div></th>
                                            <th width="10%" align="center">R.R. No.<div>R.R. No.</div></th>
                                            <th width="10%" align="center">Amount<div>Amount</div></th>

                                            <th width="10%" align="center">Bounced<div>Bounced</div></th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr id="SalesEntry" hidden>
                                            <td>
                                                <input   class="form-control input-sm form-num" id="ORPID"  name="ORPID" type="hidden"  value="0" >
                                                <input   class="form-control input-sm form-num" id="SLSID"  name="SLSID" type="text"  value="" >
                                            </td>
                                            <td>
                                                <input   class="form-control input-sm " PLACEHOLDER="Invoice No." id="INVOICENO"  name="INVOICENO" type="text"  value="" >
                                            </td>
                                            <td>
                                                <input   class="form-control input-sm " PLACEHOLDER="D.R. No." id="DRNO"  name="DRNO" type="text"  value="" >
                                            </td>
                                            <td>
                                                <select   id="PAYTYPE" NAME = "PAYTYPE" x-placement="Payment Type" class="selectpicker"  data-value="Payment"  >
                                                    <option selected value = 'Payment'>Payment</option>
                                                    <option value = 'Offset'>Offset</option>
                                                    <option value = 'Discounting'>Discounting</option>
                                                    <option value = 'Credit Memo'>Credit Memo</option>
                                                </select>

                                            </td>
                                            <td>
                                                <input   class="form-control input-sm form-num" PLACEHOLDER="R.R. ID." id="RRID"  name="RRID" type="hidden"  value="0" >
                                                <input   class="form-control input-sm " PLACEHOLDER="R.R. No." id="RRNO"  name="RRNO" type="text"  value="" >
                                            </td>
                                            <td >
                                                <input   class="form-control input-sm form-num" id="BALANCE"  name="BALANCE" type="hidden"  value="0" >
                                                <input   class="form-control input-sm form-num" id="AMOUNT"  name="AMOUNT" type="text"  value="0" >
                                            </td>
                                            <td >
                                                <input   class="form-control input-sm form-num" id="BOUNCEDAMT"  name="BOUNCEDAMT" type="text"  value="0" >
                                            </td>
                                        </tr>

                                        <!--  Sales Product List !-->
                                        <?php

                                        $cur = $TranPay->listDetails($TranID, 2);
                                        $total=0.00;
                                        foreach ($cur as $result) {
                                            $rCounter = $rCounter +1;
                                            $total = $total + $result->AMOUNT;

                                            $PDArray = $PDArray + array(
                                                    $result->ORPID => array(
                                                        "INVOICENO" => $result->INVOICENO,
                                                        "DRNO" => $result->DRNO,
                                                        "RRID" => $result->RRID,
                                                        "RRNO" => $result->RRNO,
                                                        "SLSID" => $result->SLSID,
                                                        "PTYPE" => $result->PTYPE,
                                                        "AMOUNT" => $result->AMOUNT,
                                                        "DISCOUNT" => $result->DISCOUNT,
                                                        "BOUNCEDAMT" => $result->BOUNCEDAMT
                                                    ));

                                            echo '<tr id="PS'.$result->ORPID.'">';
                                            echo '<td>' . $result->SLSID.'</td>';
                                            echo '<td>' . $result->INVOICENO.'</td>';
                                            echo '<td>' . $result->DRNO.'</td>';
                                            echo '<td>' . $result->PTYPE.'</td>';
                                            echo '<td>' . $result->RRNO.'</td>';

                                            echo '<td style="text-align: right">' . number_format($result->AMOUNT,2).'</td>';


                                            echo '<td id="PSB'.$result->ORPID.'" width="6%" style="text-align: right">' . $result->BOUNCEDAMT.'</td>';



                                            echo '</tr>';
                                        }

                                        ?>


                                        <!--  Product Entry Row !-->






                                        </tbody>

                                        </table>
                                    </div>
                                </section>
                                <div class="col-lg-12"  style="padding: 0px 0px 0px 0px; " >
                                    <div  class="col-lg-6" style="border: 1px solid #c3daf9;padding: 5px;" >
                                        <span class="BOUNCED fa fa-stop fa-fw"  ></span>Bounced Sales :
                                        <span class="BOUNCEDSALES"><?php echo   number_format( $sResult->BOUNCEDSALES,2);?> </span>
                                    </div>

                                    <div class="col-lg-6"   style="padding: 5px; text-align: right;  border: 1px solid #c3daf9">
                                        Total Sales Payment :  <span class="TOTALSALES"><?php echo   number_format( $sResult->TOTALSALES,2);?> </span>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>



                    <div class="row" >
                        <div class="col-lg-6"  id="navToolBar">




                            <button  style="<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-sm navPanel1 navSalesDefault"  id="Save"  name="Save" type="submit" >
                                <span class="fa fa-save fw-fa"></span>&nbsp; Save Receipt&nbsp;
                            </button>
                            <button  id="myBtnAddSales" onclick="addSalesEntry()" type = "button"  style="height: 32px; background: #0ea432; border-color: #478500;<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-xs navPanel1 navSalesDefault">
                                <i class="fa fa-plus-circle fw-fa"></i>&nbsp;&nbsp;&nbsp;Add AR Sales&nbsp;&nbsp;&nbsp;</button>


                            <button  class="btn  btn-primary btn-sm navPanel1 navSalesAddEdit" style="height: 32px; display: none;  background: #f0ad4e; border-color: #f5e79e; <?php echo $CTRLHIDDEN;?>" id="SalesSave" name="SalesSave" type="submit" >
                                <span class="fa fa-save fw-fa"></span>&nbsp; Save Sales &nbsp;</button>
                            <button  id="myBtnCloseSales" onclick="undoSales()" type = "button"  style=" height: 32px;  display: none;  background: #8b0000; border-color: #641e20;<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-xs navPanel1 navSalesAddEdit">
                                <i class="fa fa-undo fw-fa"></i>&nbsp;</button>




                            <button  id="myBtnAddCheck" onclick="showCheckEntry()" type = "button"  style="height: 32px; background: #0ea432; border-color: #478500;<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-xs navCheckPanel">
                                <i class="fa fa-plus-circle fw-fa"></i>&nbsp;&nbsp;&nbsp;Add Check&nbsp;&nbsp;&nbsp;</button>
                            <button    class="btn  btn-primary btn-sm navCheckPanel navCheckSave" style=" display: none; height: 32px; display: none; background: #f0ad4e; border-color: #f5e79e; <?php echo $CTRLHIDDEN;?>" id="CheckSave" name="CheckSave" type="submit" >
                                <span class="fa fa-save fw-fa"></span>&nbsp; Save Check&nbsp;</button>
                            <button id="myBtnCloseCheck" onclick="undoCheck()" type = "button"  style=" display: none; height: 32px; display: none; background: #8b0000; border-color: #641e20;<?php echo $CTRLHIDDEN;?>" class="btn btn-primary btn-xs navCheckPanel  navCheckSave">
                                <i class="fa fa-undo fw-fa"></i>&nbsp;</button>

                        </div>



                    </div>


                </form>









            </div>
        </div>
    </div>


</div>


<style>
    form{
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 11pt;
    }


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
        font-size: 10pt;
        background-color: #0e8c8c;
        color: #ffffff;
        height: 40px;
        vertical-align: middle;
        text-align: center;
    }
    #TBListPopup >tbody >tr >td {
        vertical-align: middle;
        font-size: 10pt;
    }
    #TBListPopup{
        font-size: 11pt;
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
<style>
    section {
        position: relative;
        border: 1px solid #cddaea;

        padding-top: 37px;
        background: #fff;

    }
    section.positioned {
        position: absolute;
        top:100px;
        left:100px;
        box-shadow: 0 0 15px #464e50;
    }
    .container1 {

        height: 130px; overflow-y: auto; border: 0px solid #f0eee8; padding: 0px; margin: 0px;
    }
    .container2 {

        height: 178px; overflow-y: auto; border: 0px solid #f0eee8; padding: 0px; margin-top: 0px;
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
        color: #000;
        padding: 9px 2px;
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
        padding: 9px 2px;
        top: 0;
        margin-left: -2px;
        line-height: normal;
        border-left: 1px solid #e7e7ff;

        font-weight: normal;


    }
    section th:first-child div{
        border: none;
    }
    section tr:hover td {
        background-color: #02475A !important;
        color: white;
        cursor: pointer;
    }


    #navToolBar {
        padding: 10px;
        border-radius: 5px;
        position: absolute;

        background-color: #f1f1f1;
        text-align: center;
        border: 1px solid #d3d3d3;
        width: auto;
        bottom:10px;
        height: 50px;
        left: 30px;

    }

    #navToolBarheader {
        padding: 10px;
        cursor: move;
        z-index: 10;
        background-color: #2196F3;
        color: #fff;

    }
</style>


<script>

    //Make the DIV element draggagle:
    dragElement(document.getElementById("navToolBar"));

    function dragElement(elmnt) {
        var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
        if (document.getElementById(elmnt.id + "header")) {
            /* if present, the header is where you move the DIV from:*/
            document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
        } else {
            /* otherwise, move the DIV from anywhere inside the DIV:*/
            elmnt.onmousedown = dragMouseDown;
        }

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // get the mouse cursor position at startup:
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            // call a function whenever the cursor moves:
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // calculate the new cursor position:
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // set the element's new position:
            var newposX = (elmnt.offsetTop - pos2);
            var newposY = (elmnt.offsetLeft - pos1);
            /*
            if ((newposX+elmnt.offsetHeight) > 560)
            {
                newposX = 560 - elmnt.offsetHeight;
            }
            if ((newposX+elmnt.offsetHeight) <= 60 )
            {
                newposX = 60 + elmnt.offsetHeight;
            }

            if ((newposY+elmnt.offsetWidth) > 1200)
            {
                newposX = 1200 - elmnt.offsetWidth;
            }
            if ((newposX+elmnt.offsetWidth) <= 60 )
            {
                newposX = 60 + elmnt.offsetWidth;
            }
            */
            elmnt.style.top =  newposX  + "px";
            elmnt.style.left = newposY + "px";
        }

        function closeDragElement() {
            /* stop moving when mouse button is released:*/
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
</script>