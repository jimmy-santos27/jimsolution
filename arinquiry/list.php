<?php 
	  if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
	  $CREDITLIMIT = "";
    if ($CUSTOMERID !=""){
        $SingleCustomer = $Customers->single_customer($CUSTOMERID);
        $CREDITLIMIT =  number_format($SingleCustomer->creditlimit,2);
    }
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="addPanel">

            <!-- /.panel-heading -->
            <div class="panel-body">
	 		    <form action="index.php" Method="POST">

                    <div class="row">
                        <div class="col-md-1">
                            Customer
                        </div>
                        <div class="col-md-4">

                            <input type="hidden" id="CUSTNAME" NAME="CUSTNAME" VALUE="<?php echo $CUSTNAME;?>">

                            <select required id="CUSTOMERID" NAME = "CUSTOMERID" x-placement="Customer" class="selectpicker with-ajax" data-show-subtext="true" data-live-search="true" >
                                <option VALUE="<?php echo $CUSTOMERID;?>"><?php echo $CUSTNAME;?></option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-default" type="submit">go</button>
                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-3">

                        </div>


                    </div>
                    <hr>
			        <div class="table-responsive">
                    <table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">

                      <thead>
                        <tr>
                            <!-- <th>No.</th> -->
                            <th width="9%">Date</th>
                            <th width="9%">Due Date</th>
                            <th width="3%">Due</th>
                            <th width="10%">Sales No.</th>
                            <th width="2%">ST</th>
                            <th width="10%"   >Invoice / D.R.</th>
                            <th width="9%" align="center">PDC</th>
                            <th width="10%" align="center">Amount</th>
                            <th width="9%" align="center">Debit</th>
                            <th width="9%" align="center">Credit</th>
                            <th width="10%" align="center">Amt Paid</th>

                            <th width="10%" align="center">Balance</th>
                        </tr>
                      </thead>
                        <tfoot><tr>
                            <th colspan="3" style=" vertical-align: middle; text-align: center; background-color: #464e50; color: white "> Credit Limit : <?php echo $CREDITLIMIT;?> </th>
                            <th colspan="4"  style="text-align:right";> Total </th>
                            <th class="numericCol"  style="text-align:right"></th>
                            <th class="numericCol" style="text-align:right"></th>
                            <th class="numericCol" style="text-align:right"></th>

                            <th class="numericCol" style="text-align:right"></th>
                            <th class="numericCol" style="text-align:right"></th>

                        </tr> </tfoot>


                    </table>
                    </div>
                    <div class="btn-group">
                    <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
                    <?php
                    if($_SESSION['U_ROLE']=='Administrator'){
                    // echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
                    ; }?>
                    </div>
			
			
				</form>
            </div>
        </div>
    </div>
</div>
<style>
    .numericCol{
        text-align: right;
    }
    #dash-table >tfoot >tr >th{
        padding :10px 0px 10px 0px;

    }
</style>