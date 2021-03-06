<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."admin/index.php");
}

date_default_timezone_set("Asia/Taipei");
$dtFROM =date("Y-m-d");
$dtTO   =date("Y-m-d");
if (isset($_POST["fromdate"])) {
    $dtFROM =   $_POST["fromdate"];
    $dtTO   =   $_POST["todate"];
    $_SESSION['fromdate'] = $_POST["fromdate"];
    $_SESSION['todate'] = $_POST["todate"];

}else {
    $dtFROM =   $_SESSION['fromdate'];
    $dtTO   =   $_SESSION['todate'];
}

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
                            <th width="10%" align="center">R.R. No.</th>
                            <th width="9%" align="center">Date</th>
                            <th width="30%" align="center">Supplier</th>
                            <th width="9%" align="center">Ref. No.</th>
                            <th width="5%" align="center">Terms</th>
                            <th width="9%" align="center">Due</th>

                            <th width="10%" align="center">Total</th>

                        </tr>
                        </thead>


                    </table>
                </div>


            </div>
        </div>
    </div>
</div>