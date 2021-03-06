<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
$datatabledom="rt";
?>
<div class="row" style="margin: 10px; padding: 0px; width: 100%"   >
    <div class="col-md-12"    id="pageNav" >
        <!-- Nav tabs -->
        <ul id="tab-list2" class="nav nav-tabs" role="tablist" style="display: none; border: none">
            <li class="active"> <a href="#tab1" role="tab" data-toggle="tab"><span><i class="fa fa-user fa-fw"> </i> &nbsp; Users&nbsp; </span> </span></a></li>
        </ul>

        <!-- Tab panes -->
        <div id="tab-content" class="tab-content" style="border-radius:3px; width: 100%; height:470px;background-color:#fff;border:none">
            <div class="tab-pane fade in active" id="tab1">
                <div class="table-responsive col-lg-12" style="padding: 50px;">
                    <table id="dash-table" class="table table-striped table-bordered  table-responsive" style="font-size:12px" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Account Name</th>
                            <th>Username</th>
                            <th>Role</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
