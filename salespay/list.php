<?php 
	  if (!isset($_SESSION['USERID'])){
        redirect(web_root."admin/index.php");
     }
$dtColumnHidden = "8";
?>

<div class="row">
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
                        <th width="7%" align="center">ID</th>
                        <th width="7%" align="center">O.R. No.</th>
                        <th width="8%" align="center">Date</th>
                        <th width="25%" align="center">Customer</th>
                        <th width="8%" align="center">Cash</th>
                        <th width="7%" align="center">Card</th>
                        <th width="8%" align="center">Check</th>
                        <th width="7%" align="center">Offset / Credit</th>
                        <th width="8%" align="center">Total</th>

				  	</tr>
				  </thead> 

					
				</table>


                 </div>


            </div>
        </div>
    </div>
</div>

