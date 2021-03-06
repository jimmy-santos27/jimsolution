<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="addPanel">


            <!-- /.panel-heading -->
            <div class="panel-body">

                <form action="controller.php?action=delete" Method="POST">

                    <div class="table-responsive">
                        <table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">

                            <thead>
                            <tr>
                                <!-- <th>No.</th> -->
                                <th>
                                    <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
                                    Item Make</th>

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
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
