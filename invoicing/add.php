
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
$finalcode = 'SA-' . createRandomPassword();
date_default_timezone_set("Asia/Taipei");
$Customer = new Customer();
$SHOrder = new SalesOrderHead();
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
                        // addLegend("Temp Id", "col-md-1","");
                         addInput( "SLSID", "hidden",$finalcode,"Auto Generate","noshow","col-md-2"," hidden");

                       //  addLegend("Sales", "col-md-1","");
                         ?>
                         <div hidden class="col-md-2" >
                             <select  id="SLSTYPE" name="SLSTYPE" REQUIRED TITLE="Sales Type" class="form-control input-sm"   >
                             <option value ="1">Sales Invoice</option>
                             <option value ="2">Delivery Receipt</option>

                             </select>
                         </div>
                         <?php

                         addLegend("Invoice", "col-md-1","");
                         addInput( "INVOICENO", "text",$SHOrder->lastInvoiceDR("INVOICENO"),"Invoice No.","form-control input-sm","col-md-2","   ");
                         addInput( "INVOICENO2", "text",$SHOrder->lastInvoiceDR("INVOICENO"),"Invoice No.","form-control input-sm","col-md-2"," hidden  ");
                         addLegend(" ", "col-md-2","");
                         addLegend("Reference", "col-md-1","");
                         addInput( "REFNO", "text","","Reference No.","form-control input-sm","col-md-2","   ");

                         //addLegend("D.R. No.", "col-md-1","hidden");
                         addInput( "DRNO", "hidden","","Delivery Receipt No.","noshow","col-md-2","   ");
                         addInput( "DRNO2", "hidden",$SHOrder->lastInvoiceDR("DRNO"),"Delivery Receipt No.","noshow","col-md-2"," hidden  ");



                         ?>

                     </div>

                     <div class="form-group">
                         <?php
                         addLegend("Date", "col-md-1","");
                         addInput( "ENTDATE", "date",date('Y-m-d'),"Sales Date","form-control input-sm","col-md-2","   required ");
                         //addLegend("Inv Date", "col-md-1","");
                         addInput( "INVDATE", "hidden",date('Y-m-d'),"Invoice Date","form-control input-sm ","col-md-2","    ");
                         //addLegend("DR Date", "col-md-1","");
                         addInput( "DRDATE", "hidden","","Delivery Date","noshow","noshow"," hidden");


                         addLegend("Terms", "col-md-1","");
                         addInput( "TERMS", "text","0","Terms","form-control input-sm form-num","col-md-2","    ");
                         addLegend("Due", "col-md-1","");
                         addInput( "DUEDATE", "date",date('Y-m-d'),"Sales Date","form-control input-sm","col-md-2","    ");
                         ?>
                     </div>

                     <div class="form-group">
                         <?php
                         addLegend("Customer", "col-md-1","");
                         addInput( "CUSTNAME", "text","","Customer Name","form-control input-sm","col-md-4"," REQUIRED ");
                         addInput( "CUSTOMERID", "hidden","","Customer ID","form-control input-sm","col-md-1"," hidden ");
                         addInput( "CUSTCODE", "hidden","","Customer Code","form-control input-sm","col-md-1"," hidden ");
                         addInput( "CREDITLIMIT", "hidden","","CREDIT LIMIT","form-control input-sm","col-md-1"," hidden  ");
                         addInput( "BALANCE", "hidden","","BALANCE","form-control input-sm","col-md-1"," hidden ");
                         addInput( "CUSTTYPE", "hidden","0","Customer Type","form-control input-sm","col-md-1"," hidden ");
                         ?>
                         <div class="col-md-1">
                            <button id="myBtn" style="height: 32px" type = "button" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>
                         </div>
                         <?php
                         addLegend("Delivered By", "col-md-2","");
                         addInput( "DELIVEREDBY", "text","","Delivered By","form-control input-sm","col-md-4","    ");
                         ?>
                     </div>

                     <div hidden class="form-group">
                         <?php
                         addLegend("Salesman", "col-md-1","");
                         addInput( "SMANNAME", "hidden","","Salesman","form-control input-sm","col-md-4","  readonly ");
                         addInput( "SMANCODE", "hidden","","Salesman Code","form-control input-sm","col-md-1"," hidden ");
                         addInput( "SALESMANID", "hidden","0","Salesman ID","form-control input-sm form-num","col-md-1"," hidden ");
                         addInput( "DISCOUNTPER", "hidden","","Customer Discount","form-control input-sm","col-md-1"," hidden ");
                         addLegend(" ", "col-md-1","");
                        // addLegend("Delivered By", "col-md-1","");
                      //   addInput( "DELIVEREDBY", "text","","Delivered By","form-control input-sm","col-md-5","    ");
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


                            <th width="32%" align="center" >Products</th>
                            <th width="13%" align="center" colspan="2">Code</th>
                            <th width="8%" align="center">Qty.</th>
                            <th width="8%" align="center">Unit</th>
                            <th width="10%" align="center">Price</th>
                            <th width="6%" align="center">Disc %</th>
                            <th width="10%" align="center"  >Discount</th>
                            <th width="10%" align="center">Amount</th>
                            <th hidden width="7%" align="center">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                <tr>
                    <td>
                        <input hidden class="form-control input-sm  form-num" id="PROID"  name="PROID" type="hidden"  value="" >
                        <input required class="form-control input-sm " id="PRONAME"  name="PRONAME" type="text"  value="" >
                    </td>

                    <td>
                        <input required class="form-control input-sm " id="PROCODE"  name="PROCODE" type="text"  value="" >
                    </td>
                    <td width="2%px">

                        <button id="myBtn2" type = "button"  style="height: 32px" class="btn btn-primary btn-xs"><i class="fa fa-search fw-fa"></i></button>

                    </td>
                    <td>
                        <input required READONLY class="form-control input-sm form-num" onblur="qtyValidation()" id="QTY"  name="QTY" type="text"  value="0" onfocus="updatePrice()"   >
                        <input hidden class="form-control input-sm form-num" id="PROQTY"  name="PROQTY" type="hidden"  value="0"  >
                        <input hidden class="form-control input-sm form-num" id="REORDER"  name="REORDER" type="hidden"  value="0"  >
                        <input hidden class="form-control input-sm form-num" id="FLOORPRICE"  name="FLOORPRICE" type="hidden"  value="0">
                    </td>
                    <td>
                        <input required READONLY class="form-control input-sm " id="UNIT"  name="UNIT" type="text"  value="" >
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
                        <input READONLY onblur="priceValidation()" class="form-control input-sm form-num" id="PROPRICE"   name="PROPRICE" type="text" value="0"    >
                    </td>
                    <td>
                        <input READONLY class="form-control input-sm form-num" id="DISCPER"   name="DISCPER"  type="text" value="0" PLACEHOLDER="%" onfocusout="updateAmount()">
                    </td>
                    <td>
                        <input READONLY class="form-control input-sm form-num" id="DISCAMT"   name="DISCAMT"   type="text" value="0" onfocusout="updateAmount()">
                    </td>
                    <td>
                        <input class="form-control input-sm form-num" id="AMOUNT"   name="AMOUNT" type="text" value="0" readonly>
                    </td>
                    <td hidden>
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