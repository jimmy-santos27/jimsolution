<!-- Bootstrap Core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="../css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../font/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<link href="../font/font-awesome.min.css" rel="stylesheet" type="text/css">
<!-- DataTables CSS -->


<link href="../css/dataTables.bootstrap.css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>


<link href="../css/BSolutionTable.css" rel="stylesheet">
<link href="../css/datatables.jsolution.css" rel="stylesheet">


<?php
include("../include/initialize.php");


$repCode = $_GET["repCode"];
$dtFROM = $_GET["dtFROM"];
$dtTO = $_GET["dtTO"];
$dtASOF = $_GET["dtASOF"];
$getParam = $_GET["param"];
$setParam = json_decode($getParam, true);
$filteredProducts= "";
foreach ($setParam as $row){
    $filteredProducts = $row["PRODUCTFILTER"];
    //echo $row['PROID'];
    //echo $pProducts;
}



$_SESSION['fromdate'] = $dtFROM;
$_SESSION['todate'] = $dtTO;
$_SESSION['asofdate'] = $dtASOF;

$dataQuery = "";
// echo $repCode;
$repMenu = new MenuList();


$cur = $repMenu->FilteredList(" where menucode = '{$repCode}' and menutype = 4 limit 1");

$jsonArray = array();
$dtColumns = "";
$cDateFilter ="";
$presetFilter = "";
$pgTitle = "<span class='pgCompany'>".REGNAME."</span>";
$dtFilter ="";
$reportName ="";
foreach ($cur as $result){
    $reportName = $result->menuname;
    switch ($result->dtFunction) {
        case "CounterReceipt" :
            $pgTitle .= "<br><span class='pgTitle'>" . $result->menuname . "</span>";
            $pgTitle .= "<br><span class='pgTitle'>From " . date_format(date_create($dtFROM), "M d Y") . " To " . date_format(date_create($dtTO), "M d Y") . "</span>";

            ?>


            <div style=" top:20px; left:90%; position: fixed; float: right; z-index: 10 ">
                <button  onclick="Clickheretoprint()" style="color: #2e6da4" class="btn btn-default btn-large pull-right">
                    <i class="fa fa-print fa-fw"></i></button>
            </div>
            <?php
            //prepare Date Filtering parameteres
            if ($result->dtrange != "no" || $result->asof != "no") {
                if ($result->dtrange != "no") {
                    $cDateFilter = $result->dtrange . " >= '" . $dtFROM . "' and " . $result->dtrange . " <= '" . $dtTO . "'";
                } else {
                    $cDateFilter = $result->asof . " <= '" . $dtASOF . "'";
                }
            }
            //Store prepared filter from table report to variable
            $presetFilter = $result->where_filter;

            //Combine preset and date filter to variable
            if ($presetFilter != "" and $cDateFilter != "") {
                $presetFilter .= " and " . $cDateFilter;
            } else if ($presetFilter == "" and $cDateFilter != "") {
                $presetFilter = $cDateFilter;
            }
            if ($presetFilter != "") {
                $presetFilter = " where " . $presetFilter;
            }
            //combine Filtered Product parameters and filtered variable
            if ($presetFilter != "" and $filteredProducts != "") {
                $presetFilter .= " and " . $filteredProducts;
            } else if ($filteredProducts != "") {
                $presetFilter .= " where " . $filteredProducts;
            }

            if ($row['CUSTOMERID'] != "" and $row['CUSTOMERID'] != null){
                if ($presetFilter !="") {
                    $presetFilter .= " and CUSTOMERID = ".$row['CUSTOMERID'];

                }else{
                    $presetFilter .= " where CUSTOMERID = ".$row['CUSTOMERID'];

                }
                $pSUPPLIERID = " CUSTOMERID = ".$row['CUSTOMERID'];
            }

            $dataQuery = $result->queryString . " " . $presetFilter . " " . $result->sorting;
            //echo $dataQuery;

            $mydb->setQuery($dataQuery);
            $data = $mydb->loadResultList();
            echo '<div id="content" style="   margin:0px; padding:0px; background-color:#fff;   ">';
            echo '<div class="col-lg-10" style="padding:10px;background-color:#fff"; margin-left: auto; margin-right: auto>';
            //
            $ctr =0;

            $cust="";
            $td = '';
            $total = 0;
            $ftrText = "<br><br>If found correct, check may collected on:<br><br>";
            $ftrText .= "<p style='padding-left: 100px'/>_______________________________________<br>";
            $ftrText .= "<p> Received by:</p>";
            $ftrText .= "<p style='padding-left: 100px'/>_______________________________________";
            $ftrText .= "<p style='padding-left: 100px'/>(Authorized signature over printed name)";
            $ftrText .= "<hr>";

            foreach ($data as $result2) {
                if ($cust != $result2->CUSTOMERID){

                    if($cust!=""){
                        echo '<tr ><td style="border: 1px solid #cccccc" colspan="2">GRAND TOTAL </td><td style="border: 1px solid #cccccc">'.$ctr.'pcs</td><td align="right" style="border: 1px solid #cccccc">'.number_format($total,2).'</td></tr>';
                        $td .= '<tr ><td style="border: 1px solid #cccccc" colspan="2">GRAND TOTAL </td><td style="border: 1px solid #cccccc">'.$ctr.'pcs</td><td align="right" style="border: 1px solid #cccccc">'.number_format($total,2).'</td></tr>';
                        $td .= '</table>'.$row["textParam"].$ftrText. '</div>';
                        echo '</table>'.$row["textParam"].$ftrText. '</div></td><td class="cReceipt" id="'.$cust.'_2">'.$td.'</td></tr></table>';
                        echo ' </div>';


                    }
                    echo '<div class="pagebreak"><table id="cReceipt"> <tr> <td class="cReceipt" id="'.$result2->CUSTOMERID.'">';
                    echo '<div class="col-lg-12" >';
                    echo $pgTitle.'<br>';
                    echo $result2->CUSTNAME.'<table cellpadding="0" cellspacing="0" > <thead> <tr > <th style="border:1px solid #ccc"> Invoice </th> <th style="border:1px solid #ccc"> D.R. No. </th> <th style="border:1px solid #ccc"> Date </th> <th style="border:1px solid #ccc"> Amount </th> </tr> </thead>';
                    $cust = $result2->CUSTOMERID;
                    $td = '<div class="col-lg-12" style="margin-left:15px">'.$pgTitle.'<br>'.$result2->CUSTNAME."<table cellpadding='0' cellspacing='0'  >  <thead> <tr> <th  style='border:1px solid #ccc'> Invoice </th> <th style='border:1px solid #ccc'> D.R. No. </th> <th style='border:1px solid #ccc'> Date </th> <th style='border:1px solid #ccc'> Amount </th> </tr> </thead>";
                    $ctr =0;
                    $total =0;
                }
                echo '<tr><td width="115px">'.$result2->INVOICENO.'</td><td width="115px">'.$result2->DRNO.'</td><td width="115px">'.$result2->ENTDATE.'</td><td width="115px" align="right" >'.$result2->TOTAL.'</td></tr>';
                $td .= '<tr><td width="115px">'.$result2->INVOICENO.'</td><td width="115px">'.$result2->DRNO.'</td><td width="115px">'.$result2->ENTDATE.'</td><td width="115px"  align="right">'.$result2->TOTAL.'</td></tr>';
                $total += $result2->TAMT ;
                $ctr ++;
            }
            if($cust!=""){
                echo '<tr  ><td style="border: 1px solid #cccccc" colspan="2">GRAND TOTAL </td><td style="border: 1px solid #cccccc">'.$ctr.'pcs</td><td style="border: 1px solid #cccccc" align="right">'.number_format($total,2).'</td></tr>';
                $td .= '<tr><td style="border: 1px solid #cccccc" colspan="2">GRAND TOTAL </td><td style="border: 1px solid #cccccc">'.$ctr.'pcs</td><td style="border: 1px solid #cccccc" align="right">'.number_format($total,2).'</td></tr>';

                $td .= '</table>'.$row["textParam"].$ftrText. '</div>';
                echo '</table>'.$row["textParam"].$ftrText. '</div></td><td class="cReceipt" id="'.$cust.'_2">'.$td.'</td></tr></table>';


            }

            echo ' </div></div>';
            break;
        case "ProductBrochure" :
           ?>
           <div style=" top:20px; left:90%; position: fixed; float: right; z-index: 10 ">
               <button  onclick="Clickheretoprint()" style="color: #2e6da4" class="btn btn-default btn-large pull-right">
                   <i class="fa fa-print fa-fw"></i></button>
           </div>
           <?php
           //prepare Date Filtering parameteres
           if ($result->dtrange != "no" || $result->asof != "no") {
               if ($result->dtrange != "no") {
                   $cDateFilter = $result->dtrange . " >= '" . $dtFROM . "' and " . $result->dtrange . " <= '" . $dtTO . "'";
               } else {
                   $cDateFilter = $result->asof . " <= '" . $dtASOF . "'";
               }
           }
           //Store prepared filter from table report to variable
           $presetFilter = $result->where_filter;

           //Combine preset and date filter to variable
           if ($presetFilter != "" and $cDateFilter != "") {
               $presetFilter .= " and " . $cDateFilter;
           } else if ($presetFilter == "" and $cDateFilter != "") {
               $presetFilter = $cDateFilter;
           }
           if ($presetFilter != "") {
               $presetFilter = " where " . $presetFilter;
           }
           //combine Filtered Product parameters and filtered variable
           if ($presetFilter != "" and $filteredProducts != "") {
               $presetFilter .= " and " . $filteredProducts;
           } else if ($filteredProducts != "") {
               $presetFilter .= " where " . $filteredProducts;
           }

           if ($row['SUPPLIERID'] != "" and $row['SUPPLIERID'] != null){
               if ($presetFilter !="") {
                   $presetFilter .= " and SUPPLIERID = ".$row['SUPPLIERID'];

               }else{
                   $presetFilter .= " where SUPPLIERID = ".$row['SUPPLIERID'];

               }
               $pSUPPLIERID = " SUPPLIERID = ".$row['SUPPLIERID'];

           }
           //echo '<div class="col-lg-12" style="padding-top:10px; background-color:#fff"><table id="dash-table" class = "table table-borderless">';

           //echo '</table></div>';

           $dataQuery = $result->queryString . " " . $presetFilter . " " . $result->sorting;
           //echo $dataQuery;

           $mydb->setQuery($dataQuery);
           $data = $mydb->loadResultList();
           echo '<div id="content" class="container" style="margin:0px; padding:0px; background-color:#fff;   ">';
           echo '<div class="col-lg-10" style="padding:0px;background-color:#fff"; margin-left: auto; margin-right: auto>';
          //
           $ctr =0;
           $pbctr =0;
           foreach ($data as $result2) {
               if (file_exists('../products/'.$result2->IMAGES)){
                   if ($pbctr>=15){
                       echo ' <div class="pagebreak"> </div> ';
                       $pbctr=0;
                   }
                   $pbctr++;
                   if ($ctr==0){
                       echo '<table border="0px" cellpadding="0px" cellspacing="0px">';
                       $ctr=1;
                       echo '<tr><td width="280px">';
                   }else{
                       $ctr++;
                       echo '<td width="280px">';


                   }
                   echo '<div class="col-lg-12" style="padding:3px;  background-color:#fff">';
                   // echo '<img src="../products/'.$result2->IMAGES.'" style="width:300px;height:200px;" />';
                   echo '<div style="height:210px;margin:5px; border: 1px solid #c0c0c0;">';
                        echo $result2->IMGDISPLAY;
                        echo '<div class="textBrochure"> ';
                        echo '<span class="priceBrochure pull-left">'.$result2->PROCODE.'</span>';
                        if ($row['CUSTTYPE']!='0' and $row['CUSTTYPE']!='') {
                           echo '<span class="pull-right"> P';
                           if ($row['CUSTTYPE']=='1') { echo $result2->PROPRICE;}
                           if ($row['CUSTTYPE']=='2') { echo $result2->WPROPRICE.'*';}
                           if ($row['CUSTTYPE']=='3') { echo $result2->PPROPRICE.'-';}
                       echo '</span> ';
                   }


                        echo $result2->PRONAME;

                        echo   ' </div>';

                   echo '</div>';

                   echo '</div></td>';
                   if ($ctr==3){
                       echo '</tr></table> ';
                       $ctr=0;
                   }
               }
           }
            echo ' </div></div>';
           break;
        default :
            //Standard Format of Preview Report
            // Preview Print Starts Here
            // Page Header & Table Header
            $pgTitle .= "<br><span class='pgTitle'>" . $result->menuname . "</span>";
            echo '<div class="col-lg-12" style="padding-top:10px; background-color:#fff"><table id="dash-table" class = "table table-borderless">';
            echo '<thead>';

            //prepare Date Filtering parameteres
            if ($result->dtrange != "no" || $result->asof != "no") {
                if ($result->dtrange != "no") {
                    $pgTitle .= "<br><span class='pgTitle'>From " . date_format(date_create($dtFROM), "M d Y") . " To " . date_format(date_create($dtTO), "M d Y") . "</span>";
                    $cDateFilter = $result->dtrange . " >= '" . $dtFROM . "' and " . $result->dtrange . " <= '" . $dtTO . "'";
                } else {
                    //        echo "<tr><td class='pgFilter' COLSPAN='".$result->dtColSpan ."'> Asof ". date_format(date_create($dtASOF),"M d Y") ."</td></tr>";
                    $pgTitle .= "<br><span class='pgTitle'>Asof " . date_format(date_create($dtASOF), "M d Y") . "</span>";
                    $cDateFilter = $result->asof . " <= '" . $dtASOF . "'";
                }
            }
            //Store prepared filter from table report to variable
            $presetFilter = $result->where_filter;

            //Combine preset and date filter to variable
            if ($presetFilter != "" and $cDateFilter != "") {
                $presetFilter .= " and " . $cDateFilter;
            } else if ($presetFilter == "" and $cDateFilter != "") {
                $presetFilter = $cDateFilter;
            }
            if ($presetFilter != "") {
                $presetFilter = " where " . $presetFilter;
            }

            //setup table column header
            $dtColumns = $result->dtColumns;
            $colHeader = explode(",", $result->dtColumnHeader);
            foreach ($colHeader as $colName) {
                echo '<th>' . $colName . '</th>';
            }
            echo '</tr></thead>';

            // Page Header & Table Header - ends here

            //combine Filtered Product parameters and filtered variable
            if ($presetFilter != "" and $filteredProducts != "") {
                $presetFilter .= " and " . $filteredProducts;
            } else if ($filteredProducts != "") {
                $presetFilter .= " where " . $filteredProducts;
            }


            $dataQuery = $result->queryString . " " . $presetFilter . " " . $result->sorting;


            if ($result->dtColTotal != "" and $result->dtColTotal != null) {

                echo '<tfoot><tr>';
                $tColumn = explode(",", $result->dtColTotal);
                $usedCol = 0;
                foreach ($tColumn as $colTotal) {

                    if ($usedCol <= $colTotal) {
                        //echo $colTotal;
                        if ($usedCol <= 0) {
                            echo '<th  colspan="' . ($colTotal) . '" style="text-align:right"> Grand Total </th>';
                            echo '<th></th>';
                        } else {
                            echo '<th  colspan="' . ($colTotal - $usedCol) . '" style="text-align:right"></th>';

                        }
                        $usedCol = $colTotal;
                    }

                }
                echo '</tr> </tfoot>';

                echo '</table></div>';

            }
           //echo $dataQuery;
    }
}






?>
<style>
    #content{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
        font-weight: normal;
    }
    #content td{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10pt;
        font-weight: normal;
    }
    .textBrochure{
        font-size: 10pt;
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
        padding-left: 10px;
        text-align : center;
        vertical-align: middle;
        height: 58px;

    }
    .imgBrochure{

        border-bottom: 1px solid #c0c0c0;

    }
    .cReceipt thead th{
        font-size: 10pt;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        border: 1px solid #a0a0a0;
        background-color: #f0f0ee;
        width: 115px;
        height:30px;
        vertical-align: middle;
        text-align: center;
    }
    .cReceipt{
        width: 540px;
        margin-right: 10px;
    }


    @media print {

        .pull-right {
            float: right;
        }
        .pull-left {
            float: left;
        }
        .pagebreak {
            clear: both;
            page-break-after: always;
        }
        .textBrochure{
            font-size: 10pt;
            font-weight: normal;
            font-family: Arial, Helvetica, sans-serif;
            padding-left: 10px;
            text-align : center;
            vert-align: middle;
            overflow: hidden;
            height: 58px;

        }
        .imgBrochure{

            border-bottom: 1px solid #c0c0c0;

        }
    }
    .pgCompany, . {

        font-size: 12pt;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;

    }

    .pgTitle, .pgFilter{
        font-size: 10pt;
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
    }
    #dash-table tfoot  tr td ,  #dash-table tfoot  tr th{
        border-top: 1px solid #e7e7ff;
        background-color: #f0eee8;
        color: #3b5998;
        padding: 5px 0px 5px 0px;
    }
    #dash-table thead th {
        border-top: 1px solid black;
        border-bottom: 1px solid black;

    }
    .numericCol{
        text-align: right;
    }
    tr.group{
        background-color: #f0f0ee !important;
        font-weight: bold;
    }
    tr.group:hover {
        background-color: #cddaea !important;
    }
</style>

<!-- jQuery -->
<script src="../js/jquery-3.5.1.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.min.js"></script>
<!-- DataTables JavaScript -->
<script src="../js/jspdf.min.js"></script>
<script src="../js/addimages.js"></script>
<script src="../js/html2canvas.min.js"></script>

<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/dataTables.buttons.min.js"></script>
<script src="../js/buttons.flash.min.js"></script>
<script src="../js/jszip.min.js"></script>
<script src="../js/pdfmake.min.js"></script>
<script src="../js/vfs_fonts.js"></script>
<script src="../js/buttons.html5.min.js"></script>
<script src="../js/buttons.print.min.js"></script>
<script src="../js/buttons.colVis.min.js"></script>
<script src="../js/dataTables.bootstrap.min.js"></script>
<script src="../js/typeahead.min.js"></script>



<script>

    $(document).ready(function() {


        fileTitle= "<?php echo $result->menuname;?>";
        Title = "<?php echo $pgTitle;?>";
        var dtFROM = "<?php echo $dtFROM;?>";
        var dtTO = "<?php echo $dtTO;?>";
        var dtASOF = "<?php echo $dtASOF;?>";

        var groupColumn = <?php echo $result->dtColGroup;?>;
        var orderGroup = groupColumn;
        var visibleGroup = false;
        if (groupColumn<0){
            orderGroup = 0;
            visibleGroup = true;
        }
        var dtFunc = "<?php echo $result->dtFunction;?>";
        var query = "<?php echo $dataQuery;?>";

        var prefilter = "<?php echo $presetFilter;?>";
        var querySort = "<?php echo $result->sorting;?>";
        var setParam =  <?php echo $_GET["param"]?>;
        var queryString =  "<?php echo $result->queryString;?>";
        var dtColTotal = "<?php echo $result->dtColTotal;?>";
        //alert(query);

        //query ="";
        $('#dash-table').dataTable({


            "ajax": {
                "url": "listTable.php",
                "type" : "get",
                "data": {"dtFROM": dtFROM, "dtTO": dtTO, "dataQuery" : query, "dtFunc" : dtFunc, "preFilter" : prefilter,
                    "querySort" : querySort, "setParam" : setParam, "queryString": queryString }
            },
            "columns": [

                <?php echo $result->dtColumns;?>

            ],

            "columnDefs": [
                {
                    "targets": 'dialPlanButtons',
                    "searchable": false,    // Stops search in the fields
                    "sorting": false,       // Stops sorting
                    "orderable": false      // Stops ordering
                },
                { targets: <?php echo $result->dtColnumeric;?> , className: "numericCol" },
                { "visible":  visibleGroup, "targets": groupColumn }
            ],

            "order": [[ orderGroup , 'asc' ]],
            "displayLength": 25,
            "drawCallback": function ( settings ) {
                if (groupColumn>=0){
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;

                    api.column(groupColumn, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="<?php echo $result->dtColSpan;?>">'+group+'</td></tr>'
                            );

                            last = group;
                        }
                    } );
                }
            },
            "rowCallback": function( row, data ) {
               // if ( data[4] == "A" ) {
              //     $('td:eq(4)', row).html( '<b>A</b>' );
                //}
            },
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

            "dom": "Bflrtip",
            "lengthMenu": [[25, 50, -1], [25, 50, "All"]], // Sets up the amount of records to display
            "buttons": [
                {
                    "extend": 'colvis',

                },
                {
                    "extend": 'excel',
                    "filename": fileTitle+'_gmei',
                    "text": '<i class="fa fa-file-excel-o" style="color: green;"></i>',
                    "titleAttr": 'Excel',"footer":true

                },
                {
                    "extend": 'csvHtml5',
                    "filename": fileTitle+'_gmei',
                    "text": '<i class="fa fa-file-text-o" style="color: #f39c12"></i>',
                    "titleAttr": 'CSV',"footer":true

                },
                {
                    "extend": 'pdfHtml5',

                    "filename": fileTitle+'_gmei',
                    "text": '<i class="fa fa-file-pdf-o"  style="color: #b73a1c";  ></i>',
                    "titleAttr": 'PDF',

                    "footer" : true,
                    "header" : true,
                    "orientation":'landscape',


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

                    /*
     customize: function (doc) {
         var lastColX=null;
         var lastColY=null;
         var bod = []; // this will become our new body (an array of arrays(lines))
         //Loop over all lines in the table
         doc.content[1].table.body.forEach(function(line, i){
             //Group based on first column (ignore empty cells)
             if(lastColX != line[0].text && line[0].text != ''){
                 //Add line with group header
                 bod.push([{text:line[0].text, style:'tableHeader'},'','','','']);
                 //Update last
                 lastColX=line[0].text;
             }
             //Group based on second column (ignore empty cells) with different styling
             if(lastColY != line[1].text && line[1].text != ''){
                 //Add line with group header
                 bod.push(['',{text:line[1].text, style:'subheader'},'','','']);
                 //Update last
                 lastColY=line[1].text;
             }
             //Add line with data except grouped data
             if( i < doc.content[1].table.body.length-1){
                 bod.push(['','',{text:line[2].text, style:'defaultStyle'},
                     {text:line[3].text, style:'defaultStyle'},
                     {text:line[4].text, style:'defaultStyle'}]);
             }
             //Make last line bold, blue and a bit larger
             else{
                 bod.push(['','',{text:line[2].text, style:'lastLine'},
                     {text:line[3].text, style:'lastLine'},
                     {text:line[4].text, style:'lastLine'}]);
             }

         });
         //Overwrite the old table body with the new one.
         doc.content[1].table.headerRows = 3;
         doc.content[1].table.widths = [50, 50, 150, 100, 100];
         doc.content[1].table.body = bod;
         doc.content[1].layout = 'lightHorizontalLines';

         doc.styles = {
             subheader: {
                 fontSize: 10,
                 bold: true,
                 color: 'black'
             },
             tableHeader: {
                 bold: true,
                 fontSize: 10.5,
                 color: 'black'
             },
             lastLine: {
                 bold: true,
                 fontSize: 11,
                 color: 'blue'
             },
             defaultStyle: {
                 fontSize: 10,
                 color: 'black'
             }
         }
     }
    */


                },
                {
                    "extend": 'print',
                    "filename": fileTitle,
                    "title": Title,
                    "text": '<i class="fa fa-print"  style="color: #3b5998;"  ></i>',
                    "titleAttr": 'Print',

                    "customize": function ( win ) {
                        $(win.document.body)
                            .css( 'font-size', '7pt' );


                        $(win.document.body).find( 'table' )
                            .addClass( 'compact' )
                            .css( 'font-size', 'inherit' );
                    },
                    exportOptions: {
                        columns: ':visible'
                    },"footer":true

                }

            ]



        });
    });

</script>

<script language="javascript">
    function Clickheretoprint()
    {
        var PrintTitle = '<?php echo $reportName;?>';
        var contents = $("#content").html();
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({ "position": "absolute", "top": "-1000000px" });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html><head><title>'+PrintTitle+'</title>');
        frameDoc.document.write('</head><body  style="width: 900px; height=600; font-size:10pt; font-family:Arial ; font-weight:normal;">');


        // frameDoc.document.write('</head><body>');
        //Append the external CSS file.

        frameDoc.document.write('<link href="../css/bootstrap.min.css" rel="stylesheet">');

        <!-- Custom CSS -->
        frameDoc.document.write('<link href="../css/dataTables.bootstrap.css" rel="stylesheet">');

        frameDoc.document.write('<link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>');


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
