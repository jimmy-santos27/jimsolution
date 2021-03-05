<?php 
	  if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
	  $CUSTOMERID="";
	  if (isset($_POST['CUSTOMERID'])){
          $CUSTOMERID=$_POST['CUSTOMERID'];
          $CUSTNAME = $_POST['CUSTNAME'];
          echo $CUSTNAME;
      }

?>
<script>
    $('select[name=CUSTOMERID]').val('<?php echo $CUSTNAME;?>');
    //$('#CUSTOMERID').selectpicker('refresh')
</script>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="addPanel">

            <!-- /.panel-heading -->
            <div class="panel-body">
	 		    <form action="inquiry.php" Method="POST">
                <div class="row">
                    <div class="col-md-1">
                        Customer
                    </div>
                    <div class="col-md-4">

                        <input type="hidden" id="CUSTNAME" NAME="CUSTNAME">

                        <select required id="CUSTOMERID" NAME = "CUSTOMERID" x-placement="Customer" class="selectpicker with-ajax" data-show-subtext="true" data-live-search="true" >

                        </select>
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-default" type="submit">go</button>
                    </div>
                    <div class="col-md-3">
                            Credit Limit :
                    </div>
                    <div class="col-md-3">
                            Balance :
                    </div>


                </div>
                    <hr>
			     <div class="table-responsive">

				<table id="dash-tableqqqq" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<!-- <th>No.</th> -->
				  		<th width="8%">Date</th>
                        <th width="8%">Due Date</th>
                        <th width="5%">Aging</th>
                        <th width="10%">Sales No.</th>
                        <th width="12%" colspan="2">Invoice / D.R.</th>
                        <th width="10%" align="center">Amount</th>
                        <th width="9%" align="center">Debit</th>
                        <th width="9%" align="center">Credit</th>
                        <th width="10%" align="center">Amt Paid</th>
                        <th width="10%" align="center">For Clearing</th>
                        <th width="10%" align="center">Balance</th>
                  	</tr>
				  </thead> 

					
				</table>
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

