<?php
if (!isset($_SESSION['U_ROLE'])) {
    redirect(web_root."index.php");
    //$_SESSION['U_ROLE'];
}
$MenuList = new MenuList();
$navID = isset($_GET['NavID'])? $_GET['NavID'] : "DASHBOARD";
if (!$MenuList->validUserAccess($navID, $_SESSION['USERID'])){
   // echo $navID.'-'.$_SESSION['USERID'];
    redirect(web_root."index.php");
}


if (!isset($_SESSION["ARCUSTOMERID"])){
    $_SESSION["ARCUSTOMERID"]="";
}

$myArray = array(array());
$mySupp = array(array());
$PDArray = array(array());

$datatabledom="";
$datatablerows=0;
$datatablesort="true";
date_default_timezone_set("Asia/Taipei");
$dtFROM =date("Y-m-d");
$dtTO   =date("Y-m-d");
$keyWord ="";
$dtColumnHidden = "0";
$previewUrl= "";
if (isset($_POST["fromdate"])) {
    $dtFROM =   $_POST["fromdate"];
    $dtTO   =   $_POST["todate"];

    $_SESSION['fromdate'] = $_POST["fromdate"];
    $_SESSION['todate'] = $_POST["todate"];


}else {

    $dtFROM =   $_SESSION['fromdate'];
    $dtTO   =   $_SESSION['todate'];

}
if (isset($_POST["keyword"])) {
    $keyWord =   $_POST["keyword"];
    $_SESSION['keyWord'] = $_POST["keyword"];
}else {
    $keyWord =  $_SESSION["keyWord"];
}
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

    <link rel="stylesheet" href="<?php echo web_root; ?>css/bootstrap-select.min.css"/>
    <link rel="stylesheet" href="<?php echo web_root; ?>css/ajax-bootstrap-select.css"/>


    <!-- Custom CSS -->
    <link href="<?php echo web_root; ?>css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo web_root; ?>font/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- DataTables CSS -->


    <link href="<?php echo web_root; ?>css/dataTables.bootstrap.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo web_root; ?>css/datatables.min.css"/>




     <!-- datetime picker CSS -->

    <link href="<?php echo web_root; ?>css/datepicker.css" rel="stylesheet" media="screen">

    <link rel="stylesheet" href="<?php echo web_root; ?>css/bootstrap-select-min.css" />

    <link href="<?php echo web_root; ?>css/BSolutionTable.css" rel="stylesheet">

    <style>
        /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
        .dropdown-container {
            display: none;
            background-color: #f0fafb;
        }
        .dropdown-container ul a:hover{
            color: #00b3ff;
            background-color: #FFF2F2;
        }
        /* Optional: Style the caret down icon */
        .fa-caret-down {
            float: right;
            padding-right: 8px;
        }
        .numericCol{
            text-align: right;
        }


    </style>



</head>


<?php
admin_confirm_logged_in();

$user = New User();
$singleuser = $user->single_user($_SESSION['USERID']);

if (!isset($_SESSION['USERID'])) {
    redirect(web_root . "admin/index.php");
}

date_default_timezone_set("Asia/Taipei");
$dtFROM = date("Y-m-d");
$dtTO = date("Y-m-d");
if (isset($_POST["fromdate"])) {
    $dtFROM = $_POST["fromdate"];
    $dtTO = $_POST["todate"];
    $_SESSION['fromdate'] = $_POST["fromdate"];
    $_SESSION['todate'] = $_POST["todate"];

} else {
    $dtFROM = $_SESSION['fromdate'];
    $dtTO = $_SESSION['todate'];
}

?>

<body >


        <div id="pageBody">


            <style>
                .tblnavmenu {
                    background-color: #f0f0ee;
                    border-radius: 3px;
                    border: 1px solid #c9cccf;
                    position: fixed;
                    z-index: 100;
                }
                body {
                    overflow-y: hidden; /* Hide vertical scrollbar */
                    overflow-x: hidden; /* Hide horizontal scrollbar */

                    color : #2e6da4;

                }
                .panel{
                    border: none;
                }
                form{
                    border: 0px;
                }
                #pageBody{
                    height: 580px;
                    background: #fff;
                    overflow-y: auto;
                    overflow-x: hidden;
                }

                #wdb , #wactive {
                    padding: 10px 15px 10px 15px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    border-right: 0px solid #e7e7ff ;
                    color: #ffffff;
                }


                #wactive {
                    color: #2e6da4;
                    background-color: #edf1f5;
                }

                .form-group{
                    margin-bottom: 5px;

                }
                #dash-table, #dash-table3 {
                    border-bottom: 1px solid #e0dfe3;
                    font-size: 10pt;
                    width: 100%;

                }
                #dash-table th, #dash-table3 th {

                    vertical-align: middle;

                }
                #dash-table tfoot td, #dash-table3 tfoot td {
                    border-top: 1px solid #e0dfe3 !important;

                }
                #dash-table td, #dash-table td{
                    padding-right: 3px;
                    padding-left: 3px;
                }
                #DTPrint{
                    border-bottom: 1px solid #e0dfe3;

                }
                #DTPrint th{
                    border-bottom: 1px solid #e0dfe3;

                }
                #DTPrint td{
                    padding-right: 3px;
                    padding-left: 3px;
                }
                .pHeader{
                    font-size: larger;
                }
                .pTeader{
                    font-size: large;
                }


                #DTList{
                    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    font-size: 10pt;
                    font-weight: normal;
                    border-bottom: 1px solid #c2c4c5;
                }
                #DTList thead th{
                    vertical-align: middle;
                    font-weight: bold;
                    background-color: #eff0ef;
                    text-align: center;
                    padding: 2px;
                    border-bottom: #c2c4c5;
                }
                #DTList tbody td{
                    vertical-align: middle;

                    padding: 2px;
                }
                #DTList thead th:hover{
                    background-color: #e7e7ff;
                    color: #0e90d2;
                }
                .numericCol{
                    text-align: right;
                }
                .noshow{
                    display : none;

                }

            </style>



            <!--- NOTIFICATION POPUP WINDOW / MODAL !--->
            <div class="row" >
                <div class="col-lg-12">


                    <div class="modal fade red in" id="ModalMsg"    >

                        <div class="modal-dialog" style="width: 50%">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header" style="background:#8b0000;color: #ffffff">
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                    <h5 class="modal-title"><i class="fa fa-warning fa-fw"></i>Notification</h5>
                                </div>
                                <div class="modal-body"  >
                                    <?php
                                    $Notify =0;
                                    if(isset($_SESSION['message'])){
                                        if ( $_SESSION['message'] != "" and $_SESSION['msgtype'] != "") {
                                            $Notify =1;
                                        }
                                    }
                                    check_message();
                                    ?>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" onclick="" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Body -->
            <div class="row" style="margin: 0px 0px 0px 0px" >
                <div class="col-lg-12" >
                   <?php require_once $content; ?>
                 </div>
             </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->







</body>
</html>
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

<script src="<?php echo web_root; ?>js/buttons.html5.min.js"></script>
<script src="<?php echo web_root; ?>js/buttons.print.min.js"></script>
<script src="<?php echo web_root; ?>js/buttons.colVis.min.js"></script>
<script src="<?php echo web_root; ?>js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo web_root; ?>js/typeahead.min.js"></script>

<script src="<?php echo web_root; ?>js/sweetalert.min.js"></script>
<!--
<script type="text/javascript" src="<?php echo web_root; ?>js/bootstrap-datepicker.js" charset="UTF-8"></script>
!-->
<!-- Select Box search Script -->
<script src="<?php echo web_root; ?>js/bootstrap-select.min.js"></script>
<script src="<?php echo web_root; ?>js/ajax-bootstrap-select.js"></script>

<!-- Developer Script -->
<script type="text/javascript" language="javascript" src="<?php echo web_root; ?>js/BSForm.js"></script>

<script type="text/javascript">
    $(document).on("click", ".PROID", function () {
        // var id = $(this).attr('id');
        var proid = $(this).data('id')
        // alert(proid)
        $(".modal-body #proid").val( proid )

    });

</script>

<!-- Data Tables - Use for reference -->


<script>
    var deleteConfirmation= {
        title: "Are you sure you want to delete this record?",
        text: "Once deleted, you will not be able to recover this record!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    };
    var bouncedConfirmation={content: "input", };


    var dtSorting = true;
    var rightNow = new Date();
    var rightNowString = rightNow.toISOString().slice(0,10).replace(/-/g,"");
    var dw
    $(document).ready(function() {
        $('form input.form-num').blur(function(){
            if($(this).val() == ""){
                $(this).val("0");

            }
        });

        $('form input.form-num').blur(function(){
            if($(this).val() == ""){
                $(this).val("0");
            }
        });
        var Title = "<?php echo $title;?>";
        var fileTitle = "<?php echo $title;?>"+"_"+rightNowString;
        var datatabledom = "<?php echo $datatabledom;?>";
        if (datatabledom==""){
            datatabledom = 'Brt';
        }
        var sdtSorting = "<?php echo $datatablesort;?>";
        if (sdtSorting =="" || sdtSorting == "true"){
            dtSorting = true;
        }else {dtSorting  = false;}
        var datatablerows = "<?php echo $datatablerows;?>";
        if (datatablerows==0){
            datatablerows = '10';
        }

        var dtColumnHidden = "<?php echo $dtColumnHidden;?>";
        var aoDTColumns
        var  aoDTnumeric = [-1];
        var isNumeric = "";
        var dbTable = "<?php echo $title;?>";
        var cmdBtnControl ="";

        // SETUP DATA TABLE COLUMNS PARAMETERS
        if (dbTable.toUpperCase()== "PRODUCTS") {
            aoDTColumns = [
                { mData: 'PRONAME' } ,
                { mData: 'PROCODE' },
                { mData: 'CATEGORIES' },
                { mData: 'PROPRICE' },
                { mData: 'WPROPRICE' },
                { mData: 'PPROPRICE' },
                { mData: 'LOCATION' },
                { mData: 'PROQTY' },


            ];
            aoDTnumeric = [3,4,5,7];
            isNumeric = "numericCol";

         }

        if (dbTable.toUpperCase()== "CUSTOMER") {
            aoDTColumns = [
                { mData: 'custname' } ,
                { mData: 'custcode' },
                { mData: 'area' },
                { mData: 'PHONE' },
                { mData: 'ENTDATE' },
                { mData: 'TERMS' },
                { mData: 'creditlimit' },
                { mData: 'balance' },


            ];
            aoDTnumeric = [6,7];
            isNumeric = "numericCol";
        }

        if (dbTable.toUpperCase()== "SUPPLIER") {
            aoDTColumns = [
                { mData: 'suppname' } ,
                { mData: 'suppcode' },
                { mData: 'area' },
                { mData: 'PHONE' },
                { mData: 'DATEJOIN' },
                { mData: 'TERMS' },
                { mData: 'creditlimit' },


            ];
            aoDTnumeric = [6];
            isNumeric = "numericCol";
        }

        if (dbTable.toUpperCase()== "SALESMAN") {
            aoDTColumns = [
                { mData: 'smanname' } ,
                { mData: 'smancode' },
                { mData: 'area' },
                { mData: 'PHONE' },
                { mData: 'DATEJOIN' },

             ];

        }

        if (dbTable.toUpperCase()== "AREA") {
            aoDTColumns = [
                { mData: 'AREA' } ,


            ];

        }

        if (dbTable.toUpperCase()== "CAR BRAND") {
            aoDTColumns = [
                { mData: 'CARBRAND' } ,


            ];

        }

        if (dbTable.toUpperCase()== "CAR MAKE") {
            aoDTColumns = [
                { mData: 'CARMAKE' } ,


            ];

        }

        if (dbTable.toUpperCase()== "CATEGORY") {
            aoDTColumns = [
                { mData: 'CATEGORIES' } ,


            ];

        }

        if (dbTable.toUpperCase()== "COLOR") {
            aoDTColumns = [
                { mData: 'COLOR' } ,


            ];

        }

        if (dbTable.toUpperCase()== "COUNTRY") {
            aoDTColumns = [
                { mData: 'COUNTRY' } ,
                { mData: 'FOREX' } ,


            ];

        }

        if (dbTable.toUpperCase()== "ITEM MAKE") {
            aoDTColumns = [
                { mData: 'ITEMMAKE' } ,


            ];

        }

        if (dbTable.toUpperCase()== "ITEM BRAND") {
            aoDTColumns = [
                { mData: 'ITEMBRAND' } ,


            ];

        }

        if (dbTable.toUpperCase()== "STATUS TYPE") {
            aoDTColumns = [
                { mData: 'STATNAME' } ,


            ];

        }

        if (dbTable.toUpperCase()== "STOCK TYPE") {
            aoDTColumns = [
                { mData: 'STOCKTYPE' } ,


            ];

        }

        if (dbTable.toUpperCase()== "INVENTORY ADJUSTMENT") {
            aoDTColumns = [
                { mData: 'ADJID' } ,
                { mData: 'ADJNO' } ,
                { mData: 'ENTDATE' } ,
                { mData: 'ADJTYPE' } ,
                { mData: 'CUSTNAME' } ,
                { mData: 'APPROVEDBY' } ,
                { mData: 'REFNO' } ,


            ];
            cmdBtnControl ="ADJ";
        }
        if (dbTable.toUpperCase()== "INVOICING") {
            aoDTColumns = [
                { mData: 'SLSID' } ,
                { mData: 'ENTDATE' },
                { mData: 'CUSTNAME' },
                { mData: 'INVOICENO' },
                { mData: 'DRNO' },
                { mData: 'TERMS' },
                { mData: 'DUEDATE' },
                { mData: 'TOTAL' }

            ];
            aoDTnumeric = [7];
            cmdBtnControl ="SA";
            isNumeric = "numericCol";

        }

        if (dbTable.toUpperCase()== "SALES RETURN") {
            aoDTColumns = [
                { mData: 'SRID' } ,
                { mData: 'CUSTNAME' },
                { mData: 'SRNO' },
                { mData: 'ENTDATE' },
                { mData: 'REFNO' },
                { mData: 'CHECKEDBY' },
                { mData: 'TOTAL' }


            ];
            aoDTnumeric = [6];
            isNumeric = "numericCol";
            cmdBtnControl ="SR";

        }
        dtColTotal="";
        if (dbTable.toUpperCase()== "CUSTOMER RECEIVABLES") {
            aoDTColumns = [
                { mData: 'ENTDATE' },
                { mData: 'DUEDATE' },
                { mData: 'AGING' },
                { mData: 'SLSID' },
                { mData: 'STYPE' },
                { mData: 'INVDR' },
                { mData: 'PDCDATE' },
                { mData: 'TOTAL' },
                { mData: 'DEBITAMT' },
                { mData: 'CREDITAMT' },
                { mData: 'PAIDAMT' },
                { mData: 'BALANCE' }

            ];

            aoDTnumeric = [ 7,8,9,10,11];
            isNumeric = "numericCol";
            dtColTotal = " 7,8,9,10,11";
        }
        if (dbTable.toUpperCase()== "OFFICIAL RECEIPT") {
            aoDTColumns = [
                { mData: 'ORID' },
                { mData: 'ORNO' },
                { mData: 'ENTDATE' },
                { mData: 'CUSTNAME' },
                { mData: 'CASHAMT' },
                { mData: 'CARDAMT' },
                { mData: 'TOTALCHK' },
                { mData: 'OFFCREDIT' },
                { mData: 'AMTPAID' }


            ];

            cmdBtnControl ="OR"
            aoDTnumeric = [ 4,5,6,7,8];
            isNumeric = "numericCol";

        }

        if (dbTable.toUpperCase()== "PURCHASE ORDER") {

            aoDTColumns = [
                {mData: 'pono'},
                {mData: 'entdate'},
                {mData: 'suppname'},
                {mData: 'refno'},
                {mData: 'terms'},
                {mData: 'FOREX'},
                {mData: 'net'}

            ];
            aoDTnumeric = [6];
            isNumeric = "numericCol";
            cmdBtnControl ="PO";
        }
        if (dbTable.toUpperCase()== "PURCHASE RETURN") {

            aoDTColumns = [
                {mData: 'prno'},
                {mData: 'entdate'},
                {mData: 'suppname'},
                {mData: 'refno'},
                {mData: 'net'}

            ];
            aoDTnumeric = [4];
            isNumeric = "numericCol";
            cmdBtnControl ="PR";
        }


        if (dbTable.toUpperCase()== "RECEIVING REPORT") {

            aoDTColumns = [
                {mData: 'rrno'},
                {mData: 'entdate'},
                {mData: 'suppname'},
                {mData: 'refno'},
                {mData: 'terms'},
                {mData: 'duedate'},
                {mData: 'net'}

            ];
            aoDTnumeric = [6];
            isNumeric = "numericCol";
            cmdBtnControl ="RR";
        }
        if (dbTable.toUpperCase()== "USERS") {

            aoDTColumns = [
                {mData: 'U_NAME'},
                {mData: 'U_USERNAME'},
                {mData: 'U_ROLE'}

            ];
            cmdBtnControl ="USR";

        }
        datatablerows = '99999999999999';
        $('#dash-table').removeClass();
        $('#dash-table').addClass("table table-borderless");

        $('#dash-table').dataTable({

            "pageLength": datatablerows,               // Defaults number of rows to display in table
            "columnDefs": [
                {
                    "targets": 'dialPlanButtons',
                    "searchable": false,    // Stops search in the fields
                    "sorting": false,       // Stops sorting
                    "orderable": false      // Stops ordering
                },
                { targets: aoDTnumeric , className: isNumeric },
            ],
            "responsive": true,
            "scrollY": 370,
            "scrollX" : true,
            "Processing": true,
            "ajax": "listTable.php",
            "rowId": 'ID',
            "aoColumns": aoDTColumns,
            "dom": 'rtif',
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                // Total over all pages
                var dtCT = dtColTotal.split(",");

                for(var i=0;i<dtCT.length;i++) {
                    //alert(dtCT[i]);
                    total = api
                        .column( dtCT[i] )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Total over this page
                    pageTotal = api
                        .column( dtCT[i], { page: 'current'} )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );

                    // Update footer
                    $( api.column( dtCT[i] ).footer() ).html(

                        '' + total.toLocaleString(undefined, { minimumFractionDigits: 2 }) +''
                    );

                }

            },
            "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], // Sets up the amount of records to display
            "buttons": [

                {
                    "extend": 'colvis',

                },
                {
                    "extend": 'excel',
                    "filename": fileTitle+'_gmei',
                    "text": '<i class="fa fa-file-excel-o" style="color: green;"></i>',
                    "titleAttr": 'Excel'

                },
                {
                    "extend": 'csvHtml5',
                    "filename": fileTitle+'_gmei',
                    "text": '<i class="fa fa-file-text-o" style="color: #f39c12"></i>',
                    "titleAttr": 'CSV'

                },
                {
                    "extend": 'pdfHtml5',

                    "filename": fileTitle+'_gmei',
                    "text": '<i class="fa fa-file-pdf-o"  style="color: #b73a1c";  ></i>',
                    "titleAttr": 'PDF',
                    "customize": function (doc) {
                        //Remove the title created by datatTables
                        doc.content.splice(0,1);

                        //Create a date string that we use in the footer. Format is dd-mm-yyyy
                        var now = new Date();
                        var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
                        // Logo converted to base64

                        // The above call should work, but not when called from codepen.io
                        // So we use a online converter and paste the string in.
                        // Done on http://codebeautify.org/image-to-base64-converter
                        // It's a LONG string scroll down to see the rest of the code !!!
                        var logo = 'data:image/png;base64,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';
                        // A documentation reference can be found at
                        // https://github.com/bpampuch/pdfmake#getting-started
                        // Set page margins [left,top,right,bottom] or [horizontal,vertical]
                        // or one number for equal spread
                        // It's important to create enough space at the top for a header !!!
                        doc.pageMargins = [20,60,20,30];
                        // Set the font size fot the entire document
                        doc.defaultStyle.fontSize = 7;
                        // Set the fontsize for the table header
                        doc.styles.tableHeader.fontSize = 7;
                        // Create a header object with 3 columns
                        // Left side: Logo
                        // Middle: brandname
                        // Right side: A document title
                        doc['header']=(function() {
                            return {
                                columns: [
                                    {
                                        image: logo,
                                        width: 100
                                    },
                                    {
                                        alignment: 'left',
                                        italics: true,
                                        text: $("#pgHeader").text(),
                                        fontSize: 18,
                                        margin: [10,0]
                                    },
                                    {
                                        alignment: 'right',
                                        fontSize: 14,
                                        text: ''
                                    }
                                ],
                                margin: 20
                            }
                        });
                        // Create a footer object with 2 columns
                        // Left side: report creation date
                        // Right side: current page and total pages
                        doc['footer']=(function(page, pages) {
                            return {
                                columns: [
                                    {
                                        alignment: 'left',
                                        text: ['Created on: ', { text: jsDate.toString() }]
                                    },
                                    {
                                        alignment: 'right',
                                        text: ['page ', { text: page.toString() },	' of ',	{ text: pages.toString() }]
                                    }
                                ],
                                margin: 20
                            }
                        });

                        // Change dataTable layout (Table styling)
                        // To use predefined layouts uncomment the line below and comment the custom lines below
                        // doc.content[0].layout = 'lightHorizontalLines'; // noBorders , headerLineOnly
                        var objLayout = {};
                        objLayout['hLineWidth'] = function(i) { return .5; };
                        objLayout['vLineWidth'] = function(i) { return .5; };
                        objLayout['hLineColor'] = function(i) { return '#aaa'; };
                        objLayout['vLineColor'] = function(i) { return '#aaa'; };
                        objLayout['paddingLeft'] = function(i) { return 4; };
                        objLayout['paddingRight'] = function(i) { return 4; };
                        doc.content[0].layout = objLayout;
                    }


                },
                {
                    "extend": 'print',
                    "filename": fileTitle,
                    "title": Title,
                    "text": '<i class="fa fa-print"  style="color: #3b5998;"  ></i>',
                    "titleAttr": 'Print',
                    "customize": function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '10pt' )
                            .prepend(
                                '<img src="../images/solution.png" style="position:absolute; top:0; left:0;" />'
                            );

                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', '10pt' );
                     },
                    exportOptions: {
                        columns: ':visible'
                    }
                }

            ]

        });


        var tabID = 1;


        // data-toggle="tooltip" data-placement="top" title="Click here for options..."
        $('body').on('mouseover', function(e) {
            $('#dash-table').attr("data-toggle","tooltip");
            $('#dash-table').attr("data-placement","top");
            $('#dash-table').attr("title","Click here to display menu options...");
            //alert("dfsdfs")
            $('[data-toggle="tooltip"]').tooltip({animation : true});
        });

        $('#dash-table').on('click', 'tbody tr', function(e) {



            var x = e.pageX;
            var y = e.pageY;
           // alert("dsfs");
            var currentrow = this;
            var tbid = this.id;
            var tranID = tbid.substring(3,tbid.length) ;

            if (tbid.substring(0,2)=="DT"){ tranID= tbid.substring(3,tbid.length); }

            //alert(tbid)
            var tranNav =  '<li><a href="javascript:void(0)" id="DTADD"><i class="fa fa-plus-square fa-fw"></i>New</a></li>' +
                '<li><a href="javascript:void(0)" id="DTEDIT"><i class="fa fa-edit fa-fw"></i>Edit </a></li>' +
                '<li><a href="javascript:void(0)" id="DTDELETE"><i class="fa fa-remove fa-fw"></i>Delete</a></li>' ;
            switch (cmdBtnControl) {
                case "SA":
                    //tranNav  = tranNav + '<li><a href="javascript:void(0)" id="DTPRINTINV"><i class="fa fa-print fa-fw"></i>Print Invoice</a></li>'+
                    //    '<li><a href="javascript:void(0)" id="DTPRINTDR"><i class="fa fa-print fa-fw"></i>Print D.R.</a></li>';


                    tranNav  = tranNav + '<li><a href="javascript:void(0)" id="DTPRINTINV"><i class="fa fa-print fa-fw"></i>Print</a></li>' ;
                    break;
                case "":

                    break;
                case "USR":
                    tranNav = '<li><a href="javascript:void(0)" id="DTNAVACCESS"><i class="fa fa-shield fa-fw"></i>Assign Menu Access</a></li>'+
                        '<li><a href="javascript:void(0)" id="DTREPACCESS"><i class="fa fa-user-secret fa-fw"></i>Assign Report Access</a></li>';
                    break;
                default:
                    tranNav =tranNav +  '<li><a href="javascript:void(0)" id="DTPREVIEW"><i class="fa fa-print fa-fw"></i>Print</a></li>';

            }

            $("#DTNAV").remove();
           // alert(y + ' ' +x)
            $("#pageBody").append('<div class="tblnavmenu" id="DTNAV" style="  top:' + y + 'px; left:' + x + 'px ">' +
                '<ul class="nav" id="DTNAVMENU"> ' +
                tranNav +
                '<li><a href="javascript:void(0)" id="DTCLOSE"><i class="fa fa-undo fa-fw"></i>Close</a></li>' +
                '</ul> </div>');

            //$("#DTNAV").show()

            //alert("dsfs");
            $("#DTADD").click(function () {
                $("#DTNAV").remove();
                window.location.href = 'index.php?view=34ec78fcc91ffb1e54cd85e4a0924332';
            });
            $("#DTEDIT").click(function () {
                $("#DTNAV").remove();
                //alert('index.php?view=de95b43bceeb4b998aed4aed5cef1ae7&id='+tranID+'&pid=');
                if (tbid !=""){

                    window.location.href = 'index.php?view=de95b43bceeb4b998aed4aed5cef1ae7&id='+tranID+'&pid=';
                }
            });

            $("#DTPRINTDR").click(function () {
                $("#DTNAV").remove();
                if (tbid !="") {
                    window.location.href = 'index.php?view=1bda80f2be4d3658e0baa43fbe7ae8c1&id=' + tranID + '&pid=&format=2';
                }
            });
            $("#DTPRINTINV").click(function () {

                $("#DTNAV").remove();
                if (tbid !="") {
                    window.location.href = 'index.php?view=1bda80f2be4d3658e0baa43fbe7ae8c1&id=' + tranID + '&pid=&format=2';
                }
            });
            $("#DTPREVIEW").click(function () {
                $("#DTNAV").remove();
                if (tbid !=""){
                    window.location.href = 'index.php?view=1bda80f2be4d3658e0baa43fbe7ae8c1&id='+tranID+'&pid=';
                }
            });

            $('#DTNAVACCESS').click(function() {
                $("#DTNAV").remove();

                var userSelected = $("#"+tbid+" td:first").text();
                createUserPagePanel(this.text,tranID,1,userSelected);

            });
            $('#DTREPACCESS').click(function() {
                $("#DTNAV").remove();
                //alert("dsfsd");
                var userSelected = $("#"+tbid+" td:first").text();
                createUserPagePanel(this.text,tranID,2,userSelected);

            });

            $("#DTDELETE").click(function () {
                $("#DTNAV").remove();
                if (tbid !="") {
                    swal(deleteConfirmation).then((cmd) => {
                        if (cmd) {

                            ajaxController("DTDELETE", tranID, tbid, cmd)
                                .then(results => {
                                    // alert(results)
                                    result = $.parseJSON(results);
                                    if (result['type'] == "success") {


                                        $(currentrow).remove();

                                    }
                                });

                        }

                    });
                }
               // window.location.href = 'controller.php?action=099af53f601532dbd31e0ea99ffdeb64&id='+tranID+'&pid=';

            });
            $("#DTCLOSE").click(function () {
                $("#DTNAV").remove();

            });
            $("#DTNAV").mouseleave(function(){
                //$("#DTNAV").remove();
            })

        });


        function createUserPagePanel(e,tranID,type, User){


            tabID++;
            $("#tab-list .active").removeClass();
            $('#tab-list').append($('<li id="li_'+tabID +'"><a href="#tab' + tabID + '" role="tab" data-toggle="tab"><span> ' +e + '  &nbsp </span>  <button class="close" type="button" title="Remove this page">×</button></a></li>'));
            $('#tab-content').append($('<div class="tab-pane fade" id="tab' + tabID + '">  </div>'));
            $("#tab" + tabID).append($('<iframe style="width: 100%; height: 100%; border: 0px;" id="iframe2_' + tabID + '">  </iframe>'));
            $("#li_" + tabID).addClass("active");
            $("#pageNav .tab-pane.fade.active.in").removeClass("active in");
            $("#tab" + tabID).addClass("active in");
            filteredProduct = "";

            $('#iframe2_'+ tabID).attr('src', 'TList.php?id='+tranID+'&type='+type+'&User='+User);
            $('#tab-list').on('click', '.close', function() {
                var tabID = $(this).parents('a').attr('href');
                $(this).parents('li').remove();
                $(tabID).remove();

                //display first tab
                var tabFirst = $('#tab-list a:first');

                tabFirst.tab('show');
            });

            var list = document.getElementById("tab-list");
        }


        function ajaxController(cmdAction, tranID, tbid, swalInput){

            var result = $.ajax({
                "url": "controller.php",
                "type": "get",
                "data": {"id": tranID, "cid": tbid, "action": cmdAction, swalInput: swalInput},
                success: function (response) {
                    //alert(response + swalInput);
                    results =  $.parseJSON(response);
                    if ((results.hasOwnProperty('type') &&  results['type'] != "success"  )  ) {
                        swal(results['type']);
                        results =  $.parseJSON('{"type":"error"}');
                    }else if (!results.hasOwnProperty('type')){
                        swal(response);
                        results =  $.parseJSON('{"type":"error"}');
                    }

                    return results;

                },
                error: function (jqXHR, textStatus, errorThrown) {
                    swal(jqXHR + "<br>" + textStatus + "<br>" + errorThrown);
                    console.log(textStatus, errorThrown);
                    results =  $.parseJSON('{"type":"error"}');
                    return results;
                }
            });
            return result;
        }




        $('#dash-table3').dataTable({

            "ordering": true,               // Allows ordering
            "searching":false,              // Searchbox
            "paging": false,                 // Pagination
            "info": false,                  // Shows 'Showing X of X' information
            "pagingType": 'simple_numbers', // Shows Previous, page numbers & next buttons only
            "pageLength": -1,               // Defaults number of rows to display in table
            "bAutoWidth": false,


        });




    });

    $(document).ready(function() {

        $('#CUSTOMERID').change( function(){
             $('#CUSTNAME').val($(this).find("option:selected").text());
        });


        $('#dash-table2').DataTable({
            responsive: true ,
            "sort": false,
            "lengthMenu": [[-1, 10, 25, 50, 100], ["All", 10, 25, 50, 100 ]]
        });

        $('#DTPrint').DataTable({
            "ordering": false,               // Allows ordering
            "searching": false,              // Searchbox
            "paging": false,                 // Pagination
            "info": false,                  // Shows 'Showing X of X' information
            "pagingType": 'simple_numbers' // Shows Previous, page numbers & next buttons only



        });

    });


</script>

<!-- Modal Transaction List Checkbox -->
<script>
    function ListDisplay()
    {
         document.getElementById("ListBody").innerHTML = null;
        $.ajax({
            url: 'TList.php?id='+document.getElementById("SUPPLIERID").value,
            success: function(data) {

                document.getElementById("ListBody").innerHTML = data
            }
        });
    }

</script>

<!-- Modal User Drop Down -->
<script>
    /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {

                dropdownContent.style.display = "block";
            }
        });
    }
</script>



<!-- Notification Show After Page Loading -->
<script>
    var prevUrl = '<?php echo $previewUrl; ?>';
    var prntTitle = '<?php echo $title;?>';

    var selector = 'area';

    var selectOption = function(selector) {
        var option = {
            ajax: {
                url: '../include/ajax.php',
                type: 'POST',
                dataType: 'json',
                // Use "{{{q}}}" as a placeholder and Ajax Bootstrap Select will
                // automatically replace it with the value of the search query.
                data: {
                    q: '{{{q}}}', tbl: selector
                }
            },
            locale: {
                emptyTitle: '-- Select ' + selector + ' --'
            },
            log: 3,
            preprocessData: function (data) {
                var i, l = data.length, array = [];
                if (l) {
                    for (i = 0; i < l; i++) {
                        array.push($.extend(true, data[i], {
                            text: data[i].Name,
                            value: data[i].ID
                        }));
                    }
                }
                // You must always return a valid array when processing data. The
                // data argument passed is a clone and cannot be modified directly.
                return array;
            }
        };

        return option;
    };


 $(document).ready(function(){
     if ($('#CUSTOMERID').hasClass('selectpicker')){
         $('#CUSTOMERID').selectpicker().ajaxSelectPicker(selectOption('customer'));
     }
     if ($('#SUPPLIERID').hasClass('selectpicker')){
         $('#SUPPLIERID').selectpicker().ajaxSelectPicker(selectOption('supplier'));
     }
     if ($('#SALESMANID').hasClass('selectpicker')){
         $('#SALESMANID').selectpicker().ajaxSelectPicker(selectOption('salesman'));
     }
     if ($('#AREA').hasClass('selectpicker')){
         $('#AREA').selectpicker().ajaxSelectPicker(selectOption('salesman'));
     }
     if ($('#CARBRAND').hasClass('selectpicker')){
         $('#CARBRAND').selectpicker().ajaxSelectPicker(selectOption('carbrand'));
     }
     if ($('#CARMAKE').hasClass('selectpicker')){
         $('#CARMAKE').selectpicker().ajaxSelectPicker(selectOption('carmake'));
     }
     if ($('#ITEMMAKE').hasClass('selectpicker')){
         $('#ITEMMAKE').selectpicker().ajaxSelectPicker(selectOption('itemmake'));
     }
     if ($('#ITEMBRAND').hasClass('selectpicker')){
         $('#ITEMBRAND').selectpicker().ajaxSelectPicker(selectOption('itembrand'));
     }
     if ($('#CATEGORIES').hasClass('selectpicker')){
         $('#CATEGORIES').selectpicker().ajaxSelectPicker(selectOption('category'));
     }
     if ($('#COUNTRY').hasClass('selectpicker')){
         $('#COUNTRY').selectpicker().ajaxSelectPicker(selectOption('country'));
     }

     if ($('#COLOR').hasClass('selectpicker')){
         $('#COLOR').selectpicker().ajaxSelectPicker(selectOption('color'));
     }
     if ($('#STOCKTYPE').hasClass('selectpicker')){
         $('#STOCKTYPE').selectpicker().ajaxSelectPicker(selectOption('stocktype'));
     }

     if ($('#STATNAME').hasClass('selectpicker')){
         $('#STATNAME').selectpicker().ajaxSelectPicker(selectOption('accountstatus'));
     }
     if ($('#FOREX').hasClass('selectpicker')){
         $('#FOREX').selectpicker().ajaxSelectPicker(selectOption('currency'));
     }
     if ($('#PROID').hasClass('selectpicker')){
         $('#PROID').selectpicker().ajaxSelectPicker(selectOption('product'));
     }

     //$('#AREA').selectpicker().ajaxSelectPicker(selectOption('area'));






     // Input Validation of Entries
     $("#TERMS").blur(function(){

         updateDuedate("sales");
     });
     $("#terms").blur(function(){

         updateDuedate("p.o.");
     });
     $("#INVDATE").blur(function(){

         updateDuedate("sales");
     });
     $("#DRDATE").blur(function(){

         updateDuedate("sales");
     });
     $("#TERMS").focus(function(){

         updateDuedate("sales");
     });

     function updateDuedate(keyId) {

         if (keyId=="sales"){
             var days = $("#TERMS").val();
             var date = new Date($("#ENTDATE").val());
            // var date = new Date($("#INVDATE").val());
            // if ($("#SLSTYPE").val()=="2"){
            //     date = new Date($("#DRDATE").val());
            // }
             date.setDate(date.getDate() + parseInt(days));
             document.getElementById("DUEDATE").valueAsDate = date;
         }
         if (keyId=="p.o."){
             var days = $("#terms").val();
             var date = new Date($("#entdate").val());

             date.setDate(date.getDate() + parseInt(days));
             document.getElementById("duedate").valueAsDate = date;
         }



     }

     $("#SLSTYPE").change(function() {

         if ($("#SLSTYPE" ).val() == "2")
         {
             $("#DRNO").val($("#DRNO2").val());
             $("#INVOICENO").val("");
             $("#DRDATE").val( $("#ENTDATE").val());
             $("#INVDATE").val( "0000-00-00");
         }else {
             $("#INVOICENO").val($("#INVOICENO2").val());
             $("#INVDATE").val( $("#ENTDATE").val());
             $("#DRDATE").val( "0000-00-00");
             $("#DRNO").val("");
         }
         updateDuedate("sales");
     });

     //$(".LoadingPanel").hide();

     $(document).on('keypress', ':input:not(textarea):not([type=submit])', function (e) {
         if (e.which == 13) e.preventDefault();
     });

    var i = "<?php echo $Notify; ?>";
    if (i >= 1) {
       // $("#ModalMsg").modal('show');
    }


     $('form').attr('autocomplete', 'off');


     $(document).on("click", ".btnpanel", function () {
         if ($('#'+$(this).attr("id")).attr("INACTIVE")=="yes"){
             $('#'+$(this).attr("id")).removeAttr("INACTIVE");
             $('#panelbody'+$(this).attr("id")).show();
             $('#icon'+$(this).attr("id")).removeClass();
             $('#icon'+$(this).attr("id")).addClass("fa fa-angle-double-up fw-fa");
         }else{
             $('#'+$(this).attr("id")).attr("INACTIVE","yes");
             $('#panelbody'+$(this).attr("id")).hide();
             $('#icon'+$(this).attr("id")).removeClass();
             $('#icon'+$(this).attr("id")).addClass("fa fa-angle-double-down fw-fa");

         }

    });

     $('input.form-num').on('change, keyup', function() {
         var currentInput = $(this).val();
         var fixedInput = currentInput.replace(/[A-Za-z!@#$%^&*()]/g, '');
         $(this).val(fixedInput);
         //console.log(fixedInput);
     });
     $('.AUTOCUSTCODE').blur(function() {
         var currentInput = $(this).val();
         $('#CUSTCODE').val(generateAutoCode(currentInput));
         //console.log(fixedInput);
     });
     $('.AUTOSUPPCODE').blur(function() {
         var currentInput = $(this).val();
         $('#SUPPCODE').val(generateAutoCode(currentInput));
         //console.log(fixedInput);
     });
     $('.AUTOSMANCODE').blur(function() {
         var currentInput = $(this).val();
         $('#SMANCODE').val(generateAutoCode(currentInput));
         //console.log(fixedInput);
     });






     $("#btnPrint").click(function () {

         printCommand();
     });


     $('#btnPDF2').click(function () {
         printCommand();


     });

     $("#btnExcel").click(function(e) {
         let file = new Blob([$('#printContent').html()], {type:"application/vnd.ms-excel"});
         let url = URL.createObjectURL(file);
         let a = $("<a />", {
             href: url,
             download: prntTitle+rightNowString+".xls"}).appendTo("body").get(0).click();
         e.preventDefault();
     });

     $("#btnEditPrint").on("click", function () {

         window.location.href = prevUrl;
     });

     $("#btnPDF").on("click", function () {
         printCommand();
     });

 });


 function generateAutoCode(currentInput){
     var randomString = function(length) {
         var text = "";
         var possible = "0123456789ABCDEFGH0123456789IJKLM0123456789NOPQRST0123456789UVWXY0123456789Z0123456789";
         for(var i = 0; i < length; i++) {
             text += possible.charAt(Math.floor(Math.random() * possible.length));
         }

         return text;
     }
     // random string length
     var random = randomString(7);
     var acronym = currentInput.split(/\s/).reduce((response,word)=> response+=word.slice(0,1),'');
     if (acronym.length >=3){
         acronym = acronym.substr(0,3);
     } else {
         acronym = currentInput.substr(0,3);
     }
     var dt = new Date();
     dt = dt.getFullYear().toString().substr(2,4);

     return (acronym+ dt +random ).toUpperCase();
 }
 function updateAmount(){
     //alert("DFSDFSD");

     var proprice = parseFloat($("#PROPRICE").val().replace(',', ''));
     if (document.getElementById("PROPRICE").value=="") {
         proprice = 0.00;
         document.getElementById("PROPRICE").value="0";
     }

     var qty = parseFloat($("#QTY").val().replace(',', ''));
     if (document.getElementById("QTY").value=="") {
         qty = 0.00;
         document.getElementById("QTY").value="0";
     }

     var discamt = parseFloat($("#DISCAMT").val().replace(',', ''));
     if (document.getElementById("DISCAMT").value==""){
         discamt = 0.00;
         document.getElementById("DISCAMT").value="0";
     }
     var discper = parseFloat($("#DISCPER").val().replace(',', ''));
     if (document.getElementById("DISCPER").value=="") {
         discper = 0.00;
         document.getElementById("DISCPER").value="0";
     }else {
         if (Number.isNaN(discper/100) ) {

         }else{
             discamt = (proprice * qty) * (discper/100);
             $("#DISCAMT").val((discamt).toLocaleString());
         }
     }
     $("#AMOUNT").val(((proprice * qty) - discamt).toLocaleString());
 }

</script>

<!-- Print Command -->
<script>






</script>
<script type="text/javascript">



    function printCommand() {

        var contents = $("#printContent").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>'+ prntTitle +'</title>');
        frameDoc.document.write('</head><body  style="width: 900px; height=600; font-size:12pt; font-family:Arial ; font-weight:normal;">');


       // frameDoc.document.write('</head><body>');
        //Append the external CSS file.

        frameDoc.document.write('<link href="../css/bootstrap.min.css" rel="stylesheet">');

        <!-- Custom CSS -->
        frameDoc.document.write('<link href="../css/dataTables.bootstrap.css" rel="stylesheet">');

        frameDoc.document.write('<link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>');

        frameDoc.document.write('<link href="../css/BSolutionTable.css" rel="stylesheet">');
        frameDoc.document.write('<link href="../css/datatables.jsolution.css" rel="stylesheet">');

        //Append the DIV contents.
        frameDoc.document.write(contents);

        frameDoc.document.write('</body></html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);

    }



</script>
