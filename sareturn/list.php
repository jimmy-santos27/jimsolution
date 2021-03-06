<?php 
	  if (!isset($_SESSION['USERID'])){
        redirect(web_root."admin/index.php");
     }
$dtColumnHidden = "7";
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
                        <th width="10%" align="center">Trans. ID</th>
                        <th width="25%" align="center">Customer Name</th>
                        <th width="10%" align="center">S.R. No.</th>
                        <th width="10%" align="center">Ref. No.</th>
                        <th width="10%" align="center">Date</th>
                        <th width="17%" align="center">Checked By</th>
                        <th width="10%" align="center">Amount</th>

				  	</tr>
				  </thead> 

					
				</table>


                 </div>


            </div>
        </div>
    </div>
</div>

