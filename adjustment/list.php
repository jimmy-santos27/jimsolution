<?php

	  if (!isset($_SESSION['USERID'])){
        redirect(web_root."index.php");
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
                        <th width="7%" align="center">Trans. ID</th>
                        <th width="9%" align="center">Adj. No.</th>
                        <th width="8%" align="center">Date</th>
                        <th width="12%" align="center">Type</th>
                        <th width="26%" align="center">Customer Name</th>
                        <th width="20%" align="center">Approved By</th>
                        <th width="8%" align="center">Ref. No.</th>

				  	</tr>
				  </thead> 

					
				</table>


                 </div>


            </div>
        </div>
    </div>
</div>

