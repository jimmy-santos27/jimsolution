<script src="js/modernizr.min.js"></script>
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/infragistics.core.js"></script>
<script src="js/infragistics.lob.js"></script>
<script src="js/modules/infragistics.ext_core.js"></script>
<script src="js/modules/infragistics.ext_collections.js"></script>
<script src="js/modules/infragistics.ext_text.js"></script>
<script src="js/modules/infragistics.ext_io.js"></script>
<script src="js/modules/infragistics.ext_ui.js"></script>
<script src="js/modules/infragistics.documents.core_core.js"></script>
<script src="js/modules/infragistics.ext_collectionsextended.js"></script>
<script src="js/modules/infragistics.excel_core.js"></script>
<script src="js/modules/infragistics.ext_threading.js"></script>
<script src="js/modules/infragistics.ext_web.js"></script>
<script src="js/modules/infragistics.xml.js"></script>
<script src="js/modules/infragistics.documents.core_openxml.js"></script>
<script src="js/modules/infragistics.excel_serialization_openxml.js"></script>
<link href="css/infragistics.theme.css" rel="stylesheet"></link>
<link href="css/infragistics.css" rel="stylesheet"></link>

<?php
    $POID = $_GET['id'];
?>
<div id="ImportExcel">
    <div class="row">
        <div class="col-lg-2 pull-left" >
            <label for="input" class="btn btn-primary">Select Formatted Excel File</label>
            <input type="file"style="visibility:hidden;" id="input" style="visibility:hidden;" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" Title="Choose Excel File"></input>
        </div>
        <div class="pull-right col-lg-2">
            <button type="submit" id="importXL" class="btn btn-danger" name="importXL">Save Excel P.O.</button>
        </div>
    </div>
    <div class="row">
    <div id="result">

    </div>
    <table id="grid1" STYLE="width: 100%">
        <thead>
        <tr>
            <th>
                QTY
            </th>
            <th>
                UNIT
            </th>
            <th>
                QTY PER BOX
            </th>
            <th>
                PRODUCT
            </th>
            <th>
                CODE
            </th>
            <th>
                FOR. COST
            </th>
            <th>
                FOR. AMT
            </th>
            <th>
                PHP COST
            </th>
            <th>
                PHP AMT
            </th>
        </tr>
        </thead>
    </table>
    <div class="row">
</div>


<style>
    #grid1 thead th{
        background-color: #c2c4c5;
        font-weight: normal;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
        height: 30px;
        text-align: center;
        color: white;
    }
    #sampleContainer ol {
        padding: 0px 0px 0px 15px;
        margin: 0;
    }

    #sampleContainer input {
        margin: 10px 0;
    }
    #result {
        display: none;
        color: red;
    }
</style>
<script>
    $(function () {
        var import_data = [];
        $("#input").on("change", function () {
            var excelFile,
                fileReader = new FileReader();

            $("#result").hide();

            fileReader.onload = function (e) {
                var buffer = new Uint8Array(fileReader.result);

                $.ig.excel.Workbook.load(buffer, function (workbook) {
                    var column, row, newRow, cellValue, columnIndex, i,
                        worksheet = workbook.worksheets(0),
                        columnsNumber = 0,
                        gridColumns = [],
                        data = [],
                        worksheetRowsCount;

                    // Both the columns and rows in the worksheet are lazily created and because of this most of the time worksheet.columns().count() will return 0
                    // So to get the number of columns we read the values in the first row and count. When value is null we stop counting columns:
                    while (worksheet.rows(0).getCellValue(columnsNumber)) {
                        columnsNumber++;
                    }

                    // Iterating through cells in first row and use the cell text as key and header text for the grid columns
                    for (columnIndex = 0; columnIndex < columnsNumber; columnIndex++) {
                        column = worksheet.rows(0).getCellText(columnIndex);
                        gridColumns.push({ headerText: column, key: column });
                    }

                    // We start iterating from 1, because we already read the first row to build the gridColumns array above
                    // We use each cell value and add it to json array, which will be used as dataSource for the grid
                    for (i = 1, worksheetRowsCount = worksheet.rows().count() ; i < worksheetRowsCount; i++) {
                        newRow = {};
                        row = worksheet.rows(i);

                        for (columnIndex = 0; columnIndex < columnsNumber; columnIndex++) {
                            cellValue = row.getCellText(columnIndex);
                            newRow[gridColumns[columnIndex].key] = cellValue;
                        }

                        data.push(newRow);
                    }
                    import_data = data;
                    // we can also skip passing the gridColumns use autoGenerateColumns = true, or modify the gridColumns array
                    createGrid(data, gridColumns);
                }, function (error) {
                    $("#result").text("The excel file is corrupted.");
                    $("#result").show(1000);
                });
            }

            if (this.files.length > 0) {
                excelFile = this.files[0];
                if (excelFile.type === "application/vnd.ms-excel" || excelFile.type === "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || (excelFile.type === "" && (excelFile.name.endsWith("xls") || excelFile.name.endsWith("xlsx")))) {
                    fileReader.readAsArrayBuffer(excelFile);
                } else {
                    $("#result").text("The format of the file you have selected is not supported. Please select a valid Excel file ('.xls, *.xlsx').");
                    $("#result").show(1000);
                }
            }

        });

        $("#importXL").on("click", function () {
            if (import_data.length <= 0 ){
                alert("No Excel Data Imported...");
            } else {
                var id = "<?php echo $POID;?>";
                var pono ="<?php echo $_GET['pono'];?>";
                var view ="<?php echo md5('edit');?>";
                //alert("fsdfs");
                $.ajax({
                    url: "po_import/importSave.php",
                    type: "post",
                    data: {data:import_data, id : id, pono: pono} ,
                    success: function (response) {
                        document.location.href = "index.php?view="+view+'&id='+id+'&pid=';
                        // You will get response from your PHP page (what you echo or print)
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.responseText + textStatus + errorThrown);
                    }
                });




            }
        });
    });



    function createGrid(data, gridColumns) {

        if ($("#grid1").data("igGrid") !== undefined) {
            $("#grid1").igGrid("destroy");
        }

        $("#grid1").igGrid({
            columns: gridColumns,
            autoGenerateColumns: true,
            dataSource: data,
            width: "100%"
        });
       // alert(data[0]["Qty"]+"sdfsdf");

    }



</script>