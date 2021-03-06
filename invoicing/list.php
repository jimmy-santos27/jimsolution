<?php 
	  if (!isset($_SESSION['USERID'])){
        redirect(web_root."admin/index.php");
     }
$dtColumnHidden = "8";
?>

<div class="row" style="margin: 0px; padding: 0px; width: 100%"  >
    <div class="col-lg-12">
        <div class="panel panel-default">

            <!-- /.panel-heading -->
            <div class="panel-body">
                <?php
                $filteredType = 1;
                require_once ("../theme/listFiltered.php");
                ?>
			     <div class="table-responsive">

				    <table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<!-- <th>No.</th> -->
                        <th width="4%" align="center">Trans. ID</th>
                        <th width="8%" align="center">Date</th>
                        <th width="28%" align="center">Customer Name</th>

                        <th width="8%" align="center">Invoice No.</th>

                        <th width="8%" align="center">DR No.</th>

                        <th width="3%" align="center">Terms</th>
                        <th width="8%" align="center">Due Date</th>
                        <th width="9%" align="center">Total</th>

				  	</tr>
				  </thead> 

					
				</table>


                 </div>


            </div>
        </div>
    </div>
</div>

