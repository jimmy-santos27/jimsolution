<?php
require_once("../include/initialize.php");
if (!isset($_SESSION['U_ROLE'])) {
redirect(web_root."index.php");
}

require_once("../include/initialize.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?php echo $title;?></title>




<!-- Bootstrap Core CSS -->
<link href="<?php echo web_root; ?>css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="<?php echo web_root; ?>css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="<?php echo web_root; ?>font/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="<?php echo web_root; ?>font/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- DataTables CSS -->


<link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>css/datatables.min.css"/>




<!-- datetime picker CSS -->
<link href="<?php echo web_root; ?>css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<link href="<?php echo web_root; ?>css/datepicker.css" rel="stylesheet" media="screen">

<link rel="stylesheet" href="<?php echo web_root; ?>css/bootstrap-select-min.css" />

<link href="<?php echo web_root; ?>css/BSolutionTable.css" rel="stylesheet">



<!-- jQuery -->
<script src="<?php echo web_root; ?>js/jquery-3.5.1.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo web_root; ?>js/bootstrap.min.js"></script>
<!-- DataTables JavaScript -->
<script src="<?php echo web_root; ?>js/jspdf.min.js"></script>
<script src="<?php echo web_root; ?>js/addimages.js"></script>
<script src="<?php echo web_root; ?>js/html2canvas.min.js"></script>

<script src="<?php echo web_root; ?>js/jquery.dataTables.min.js"></script>
<script src="<?php echo web_root; ?>js/dataTables.buttons.min.js"></script>
<script src="<?php echo web_root; ?>js/buttons.flash.min.js"></script>
<script src="<?php echo web_root; ?>js/jszip.min.js"></script>
<script src="<?php echo web_root; ?>js/pdfmake.min.js"></script>
<script src="<?php echo web_root; ?>js/vfs_fonts.js"></script>
<script src="<?php echo web_root; ?>js/buttons.html5.min.js"></script>
<script src="<?php echo web_root; ?>js/buttons.print.min.js"></script>
<script src="<?php echo web_root; ?>js/buttons.colVis.min.js"></script>
<script src="<?php echo web_root; ?>js/dataTables.bootstrap.min.js"></script>

<!-- Select Box search Script -->
<script src="../js/bootstrap-select.min.js"></script>

<!-- Developer Script -->
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/BSForm.js"></script>
<html>
    <body>
        <!-- /.panel-heading -->
        <div class="row">

            <div class="col-lg-12">
                <div class="panel panel-default"  id="addPanel">

                    <!-- /.panel-heading -->
                    <div class="panel-body" >


                         <div class="dataTable_wrapper"  >

                            <div class="table-responsive">
                                <table id="DTProducts"  class="table table-striped table-bordered table-hover "  style="font-size:8px; border-bottom: 1px solid # border-radius: 5px" cellspacing="0" >

                                    <thead  >
                                    <tr>
                                        <!-- <th>#</th> -->
                                        <th style="width: 30%;">Item Name</th>
                                        <th style="width: 10%;">Item Code</th>
                                        <th style="width: 14%;">Category</th>
                                        <th style="width: 8%;">Retail</th>
                                        <th style="width: 8%;">Wholesale</th>
                                        <th style="width: 8%;">Provincial</th>
                                        <th style="width: 8%;">Locator</th>
                                        <th style="width: 6%;">Qty</th>
                                        <th style="width: 8%;">Action.</th>


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


    </body>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#DTProducts').dataTable({
                "bProcessing": true,
                "sAjaxSource": "listProducts.php",
                "aoColumns": [
                    { mData: 'PRONAME' } ,
                    { mData: 'PROCODE' },
                    { mData: 'CATEGORIES' },
                    { mData: 'PROPRICE' },
                    { mData: 'WPROPRICE' },
                    { mData: 'PPROPRICE' },
                    { mData: 'LOCATION' },
                    { mData: 'PROQTY' },
                    { mData: 'ACTIONS' }

                ]
            });
        });
    </script>
</html>
