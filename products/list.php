
<!-- /.panel -->



            <!-- /.panel-heading -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-default"  id="addPanel">

                        <!-- /.panel-heading -->
                        <div class="panel-body" >
                            <?php
                            $dtColumnHidden = "8";
                            $filteredType = 1;
                            require_once ("../theme/listFiltered.php");
                            ?>

                             <div class="dataTable_wrapper"  >

                                <div class="table-responsive">
                                    <table id="dash-table"  class="table table-striped table-bordered table-hover "  style="font-size:12px; border-radius: 3px" cellspacing="0" >

                                        <thead  >
                                        <tr>
                                            <!-- <th>#</th> -->
                                            <th style="width: 30%;">Description</th>
                                            <th style="width: 15%;">Code</th>
                                            <th style="width: 15%;">Category</th>
                                            <th style="width: 7%;">Retail</th>
                                            <th style="width: 7%;">Wholesale</th>
                                            <th style="width: 7%;">Provincial</th>
                                            <th style="width: 7%;">Locator#</th>
                                            <th style="width: 6%;"">Qty</th>

                                        </tr>
                                        </thead>




                                    </table>

                                </div>


                             </div>
                        </div>

                    </div>
                </div>


                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
