<link rel="shortcut icon" href="../images/solution.png">
<?php
require_once("../include/initialize.php");
//checkAdmin();
  	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$title="Customer Receivables";
$ContentIcon ="fa fa-rub fa-fw";
switch ($view) {

    default :
		$content    = 'arlist.php';
}
require_once ("../theme/templates.php");
?>
<script language="JavaScript">
    alert("fsfsdfs");
    //alert($('#CUSTOMERID').text());
    $(document).ready(function() {
        $('#CUSTOMERID').selectpicker().ajaxSelectPicker(selectOption('customer'));
        $('#CUSTOMERID').trigger("change");

        $('#CUSTOMERID').change( function(){
            alert($('#CUSTOMERID').text());
        });


        $('#ARInquiry').dataTable({


            "ajax": {
                "url": "arlistTable.php",
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
    }
</script>