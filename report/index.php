<link rel="shortcut icon" href="../images/solution.png">


<?php
require_once("../include/initialize.php");
//checkAdmin();
# code...
if(!isset($_SESSION['USERID'])){
	redirect(web_root."index.php");
}
$AClass = new Area();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;

$title ='Report';
$ContentIcon ="fa fa-print fa-fw";
$hidden = "hidden";
$isSubmitted = "no";
$_SESSION["selector"] =array();
$_SESSION["fldName"] =array();
$_SESSION["fldTitle"] =array();
$_SESSION["fldSize"] =array();
$_SESSION["reportTitle"] ="";
$_SESSION['fldType'] =array();
$_SESSION['repKey'] ="";
if (isset($_POST["submit"]) && isset($_POST["selector"])){
    $_POST["submit"]= null;
    $hidden = "";
    $isSubmitted = "yes";
    if (isset($_POST["selector"])) {
        $_SESSION["selector"] = $_POST["selector"];
        $_SESSION["fldName"] = $_POST["fldName"];
        $_SESSION["fldTitle"] = $_POST["fldTitle"];
        $_SESSION["fldSize"] = $_POST["fldSize"];
        $_SESSION["reportTitle"] = $_POST["reportTitle"];
        $_SESSION['fldType'] =$_POST["fldType"];
        //echo  $_POST["reportID"];
        $_SESSION['repKey'] = $_POST["reportID"];

    }

}else { //unset($_SESSION["ReportTbl"]);
    }
switch ($view) {
	case 'list' :

		$content    = 'list.php';		
		break;
	// case 'list' :
	// 	$content    = 'list.php';		
	// 	break;	
			
	default :
		$content    = 'list.php';		
}
try{
    require_once '../theme/templates.php';
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>





<style>

    #repList{
        height: 480px;
        overflow-y: auto;

        border-radius:3px;
        border: 1px solid #e7e7ff;
        padding: 0px;
        margin: 0px;

    }
    #repFields{
        margin-left: 5px;
        padding-left: 15px;
        height: 350px;
        overflow-y: auto;

        border-radius:3px;
        border: 1px solid #2e6da4;
        padding: 0px;
        margin: 0px;

    }
    #repFields table tr td{
        padding-left: 15px
    }
    #repFields table{
        padding-left: 15px
        width: 100%;
        font-size: smaller;
        color: #3e6b96;
    }
    #repList table{
        width: 100%;
        font-size: 10pt;
        color: #3e6b96;
    }
    #repList td{
        height: 30px;
        vertical-align: middle;

    }
    .table-hover tr:hover{
        background: #2e6da4;
        color: #00b3ff;
        cursor: pointer;

    }
    .selected-rep{
        background: #e8f2ff;
        color: #00b3ff;
    }
    #RepModal{
        z-index: 1600;
        color: #2e6da4;
        font-size: 14px;

    }
    .modal-body{
        padding: 5px 20px 5px 20px;
    }
    .modal-dialog{
        width: 100%;
        height:100%;
    }
    #ListBody{

        overflow-y: auto;
    }


    .table-fixed {
        width: 100%;
        font-size: xx-small;

        border-radius: 5px;
    }
    .table-fixed tbody{
        width: 100%;
        border: 1px solid #d0d2d0;
        height: 180px;
        overflow-y:auto;
        display:block;
        font-size: xx-small;

    }
    .table-fixed thead {
        display: inherit;
        border-top: 1px solid #d0d2d0;
        border-left: 1px solid #d0d2d0;
        border-right: 1px solid #d0d2d0;
    }

    .table-fixed  tfoot {
        display: inherit;
        border-bottom: 0px;
    }
    .table-fixed  tfoot {
        padding: 0px;
    }

    .table-fixed tr{
        border-bottom: 1px solid #d0d2d0;
    }
    .table-fixed thead {
        background-color: #ffffff;
        border-color:#cfd1cf;
    }
    #myInput {
        background-image: url('../css/searchicon.png');
        background-position: 10px 10px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    [contenteditable] {
        border: solid 1px lightgreen;
        padding: 5px;
        border-radius: 3px;
    }
    #pageNav >ul >li >a:hover{
        cursor: pointer;
    }
    #pageNav >ul >li >a{

        color: #a0a0a0;
        cursor: default;
        background-color: transparent;
        border: 1px solid #ddd;
    }
    #pageNav >ul >li.active >a{
        color: #3b5998;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }

</style>
<script>
    var repFields = <?php echo json_encode($ReportFlds);?>;

    var repWfunc ="";
    function selRepList(e){
        repWfunc="";
       // alert(repFields[e.substr(3,15)]["wDtRange"]);
        if ((repFields[e.substr(3,15)]["wDtRange"]).toUpperCase()=="NO"){$("#dtRange").hide()}else {  $("#dtRange").show() }
        if ((repFields[e.substr(3,15)]["wAsof"]).toUpperCase()=="NO"){$("#dtAsof").hide()}else {  $("#dtAsof").show() }

        $("#productFilter").hide();
        $("#bySupplier").hide();
        $("#byCustomer").hide();
        var requiredGroup=""
        $("#bySalesman").hide();
        $("#byArea").hide();
        $("#byStatus").hide();
        $("#byCurrency").hide();
        $("#byCustomerType").hide();
        $("#bySProduct").hide();
        $(".selectpicker").removeAttr("required") ;
        $(".selectpicker").selectpicker('val','');

        if ((repFields[e.substr(3,15)]["wByGroup"] )!="" && (repFields[e.substr(3,15)]["wByGroup"] )!=null) {

            var repByGroup = (repFields[e.substr(3, 15)]["wByGroup"]).split(',');
            //swal(repByGroup.length() );
            repWfunc= (repFields[e.substr(3, 15)]["wdtFunction"]);
            for (var i = 0, len = repByGroup.length; i < len; i++) {
                value = repByGroup[i];


                if (value.trim().substr(0,1) == "*"){
                    //alert(value.length);
                    requiredGroup = value.substr(1,value.length);
                    value = requiredGroup;
                    if (value.toUpperCase()=="CUSTOMER"){
                        //  alert("dss");
                        $("#CUSTOMERID").attr("required", true);
                    }
                    if (value.toUpperCase()=="SUPPLIER"){
                        $("#SUPPLIERID").attr("required", true) ;
                    }
                    if (value.toUpperCase()=="SALESMAN"){
                        $("#SALESMANID").attr("required", true) ;
                    }
                    if (value.toUpperCase()=="SPRODUCT"){
                        $("#PROID").attr("required", true) ;
                    }

                }

                if (value.toUpperCase().trim() == "PRODUCTS" || value.toUpperCase().trim() == "PRODUCT"){
                    $("#productFilter").show();
                }else{
                    $("#by"+value.trim() ).show();
                   // alert(value );
                }

            }


        }


        document.getElementById("reportTitle").value =  $("#"+e).text().trim();
        document.getElementById("reportID").value =  e.substr(3,15);
        $("#REPTAB1 tr").removeClass();
        $("#"+e).addClass("selected-rep");
        localStorage.setItem("repTitleSelected", e);
       // $("#PageFields").show();
        $("#PageConditions").show();


    }




    $("#REPTAB1 tr").click(function(){

         selRepList(this.id);
    });
    function printData()
    {
        var divToPrint=document.getElementById("ListBody");

        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }


    function openPrintDialogue(){
        var divToPrint=document.getElementById("ListBody");
        $('<iframe>', {
            name: 'myiframe',
            class: 'printFrame',
            style: "overflow-y: hidden"
        })
            .appendTo('body')
            .contents().find('body')
            .append(divToPrint.outerHTML);

        window.frames['myiframe'].focus();
        window.frames['myiframe'].print();

        setTimeout(() => { $(".printFrame").remove(); }, 1000);
    };




    $('#Print').on('click',function(){


        //$(".page-header-space").show();
        $(".tableFixHead").css("overflow-y", "hidden");
         $("#pTable thead").css("top", "10mm");
        $("#pTable thead").css("width", "100%");
        //$("#pTable tbody").css("top", "35mm");
        $(".tableFixHead").css("height", "100%");
        $('.page-footer').show()
         //$("#pTable thead").hide();
        //alert($("#prntTblHeader").width() +" " + $("#pTable").width() );

        openPrintDialogue();
        //printData();
        //$("#ListBody").print();
        $('.page-footer').hide()
  
        $(".tableFixHead").css("overflow-y", "auto");
         $("#pTable thead").css("top", "35mm");
         $("#pTable thead").css("width", "96%");

        $(".tableFixHead").css("height", "350px");
       // $(".page-header-space").hide();
        //$("#RepModal").modal('hide');
    });

    $("#PrintToExcel").click(function (e) {
            let file = new Blob([$('#ListBody').html() ], {type:"application/vnd.ms-excel"});
            let url = URL.createObjectURL(file);
            let a = $("<a />", {
                href: url,
                download: "<?php echo PrintSaveAsXlsName();?>"}).appendTo("body").get(0).click();
            e.preventDefault();

    });
    $(document).ready(function() {

        if (localStorage.getItem("repTitleSelected") != null ) {
            selRepList(localStorage.getItem("repTitleSelected"));
            var w = $("#repList");
            var row = $('#' + localStorage.getItem("repTitleSelected"))
            // alert(row.offset().top);
            if (row.length) {
                w.scrollTop(row.offset().top - (w.height() / 2));
            }

        }
        var isSubmitted = "<?php echo $isSubmitted;?>";

        if (isSubmitted =="yes"){
            ListDisplay2();
            $("#RepModal").modal('show');
        }
    });


</script>


<!-- Modal -->
<script>
    function ListDisplay2()
    {
        document.getElementById("ListBody").innerHTML = null;
        $.ajax({
            url: 'ReportPreview.php',
            success: function(data) {

                document.getElementById("ListBody").innerHTML = data

                //document.getElementById("TableBodyPanel").innerHTML = null;
                //document.getElementById("TableBodyPanel").innerHTML =  document.getElementById("PreviewTable").innerHTML ;
               // $("#PreviewTable").hide();
            }
        });



    }

</script>
<script>


    function repFldSelect(selector, chkAll, tblname )
    {
        var table = document.getElementById(tblname);
        var tr = table.getElementsByTagName("tr");
        var strs =" ";

        if(document.getElementById(chkAll).checked==true)
        {
            var chkelement=document.getElementsByName(selector);

            for(var i=0;i<chkelement.length;i++)
            {

                chkelement.item(i).checked = true;
                if (tr[i+1].style.display != "") {
                    chkelement.item(i).checked = false;


                }

            }
        }
        else
        {
            var chkelement=document.getElementsByName(selector);
            for(var i=0;i<chkelement.length;i++)
            {
                chkelement.item(i).checked = false;

            }
        }

//alert(strs);
    }


    function myTblFilter(inputName, tblname) {

        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById(inputName);
        filter = input.value.toUpperCase();
        table = document.getElementById(tblname);
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
            if (tr[i].style.display != ""){
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            if (tr[i].style.display != ""){
                td = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
            if (tr[i].style.display != ""){
                td = tr[i].getElementsByTagName("td")[4];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

        }
    }


    function sortTable(n) {
        //alert(n);
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = document.getElementById("pTable");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asc";
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
            //start by saying: no switching is done:
            switching = false;
            rows = table.rows;
            /*Loop through all table rows (except the
            first, which contains table headers):*/
            for (i = 1; i < (rows.length - 1); i++) {
                //start by saying there should be no switching:
                shouldSwitch = false;
                /*Get the two elements you want to compare,
                one from current row and one from the next:*/
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /*check if the two rows should switch place,
                based on the direction, asc or desc:*/
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch= true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        //if so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /*If a switch has been marked, make the switch
                and mark that a switch has been done:*/
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                //Each time a switch is done, increase this count by 1:
                switchcount ++;
            } else {
                /*If no switching has been done AND the direction is "asc",
                set the direction to "desc" and run the while loop again.*/
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
</script>

<script>
    var txtParam="";
    var button='<button class="close" type="button" title="Remove this page">×</button>';
    var tabID = 1;
    function resetTab(){
        var tabs=$("#tab-list li:not(:first)");
        var len=1
        $(tabs).each(function(k,v){
            len++;
            $(this).find('a').html('Tab ' + len + button);
        })
        tabID--;
    }

    function wAnd(param1, param2){
        if ((param1  ) !=""){
            return " and ";
        }else { return "";}

    }

    $(document).ready(function() {
        ////select picker ajax process

        $('#CUSTOMERID').selectpicker().ajaxSelectPicker(selectOption('customer'));
        $('#CUSTOMERID').trigger("change");

        // CREATE NEW PAGE TAB & GENERATE REPORT INSIDE NEW IFRAME


        $('#btn-add-tab').click(function() {
            txtParam="";
            if (repWfunc=="CounterReceipt"){
                swal("Enter Remarks:", {
                    content: "input",
                })
                    .then((value) => {
                        //swal(`You typed: ${value}`);
                        txtParam = value;
                        createPagePanel();

                    });
            }else{createPagePanel();}



        });

        $('#tab-list').on('click', '.close', function() {
            var tabID = $(this).parents('a').attr('href');
            $(this).parents('li').remove();
            $(tabID).remove();

            //display first tab
            var tabFirst = $('#tab-list a:first');

            tabFirst.tab('show');
        });

        var list = document.getElementById("tab-list");
    });

    function createPagePanel(){
        if ($("#CUSTOMERID").attr("required") && ($("#CUSTOMERID").val()==null || $("#CUSTOMERID").val()=="")){
            swal("Customer is required", "Please select customer and then try again!!!", "warning");

            $("#CUSTOMERID").focus();
            return;
        }
        if ($("#SUPPLIERID").attr("required") && ($("#SUPPLIERID").val()==null || $("#SUPPLIERID").val()=="")){
            swal("Supplier is required", "Please select supplier and then try again!!!", "warning");
            $("#SUPPLIERID").focus();
            return;
        }
        if ($("#SALESMANID").attr("required") && ($("#SALESMANID").val()==null || $("#SALESMANID").val()=="")){
            swal("Salesman is required", "Please select salesman and then try again!!!", "warning");
            $("#SALESMANID").focus();
            return;
        }
        if ($("#PROID").attr("required") && ($("#PROID").val()==null || $("#PROID").val()=="")){
            swal("Product is required", "Please select Product and then try again!!!", "warning");
            $("#PROID").focus();
            return;
        }

        tabID++;
        $("#tab-list .active").removeClass();
        $('#tab-list').append($('<li id="li_'+tabID +'"><a href="#tab' + tabID + '" role="tab" data-toggle="tab"><span>  ' + $(".selected-rep td").html().replace(/\&nbsp;/g, '') + ' &nbsp </span>  <button class="close" type="button" title="Remove this page">×</button></a></li>'));
        $('#tab-content').append($('<div class="tab-pane fade" id="tab' + tabID + '">  </div>'));
        $("#tab" + tabID).append($('<iframe style="width: 100%; height: 100%;  border: 0px;" id="iframe_' + tabID + '">  </iframe>'));
        $("#li_" + tabID).addClass("active");
        $(".tab-pane.fade.active.in").removeClass("active in");
        $("#tab" + tabID).addClass("active in");
        filteredProduct = "";



        if ($("#productFilter").is(':hidden')){
            if ($('#CARBRAND').val()!="" && $('#CARBRAND').val()!=null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#CARBRAND').val())+ " CARBRAND = '"+$('#CARBRAND').val()+"'";
            }

            if ($('#CARMAKE').val()!="" && $('#CARMAKE').val()!= null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#CARMAKE').val())+ " CARMAKE = '"+$('#CARMAKE').val()+"'";
            }
            if ($('#ITEMBRAND').val()!="" && $('#ITEMBRAND').val()!=null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#ITEMBRAND').val())+ " ITEMBRAND = '"+$('#ITEMBRAND').val()+"'";
            }
            if ($('#ITEMMAKE').val()!="" && $('#ITEMMAKE').val()!= null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#ITEMMAKE').val())+ " ITEMMAKE = '"+$('#ITEMMAKE').val()+"'";
            }
            if ($('#COUNTRY').val()!="" && $('#COUNTRY').val()!=null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#COUNTRY').val())+ " COUNTRY = '"+$('#COUNTRY').val()+"'";
            }
            if ($('#COLOR').val()!="" && $('#COLOR').val()!=null) {
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#COLOR').val())+ " COLOR = '"+$('#COLOR').val()+"'";
            }
            if ($('#STOCKTYPE').val()!="" && $('#STOCKTYPE').val()!= null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#STOCKTYPE').val())+ " STOCKTYPE = '"+$('#STOCKTYPE').val()+"'";
            }
            if ($('#CATEGORIES').val()!="" && $('#CATEGORIES').val()!=null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#CATEGORIES').val())+ " CATEGORIES = '"+$('#CATEGORIES').val()+"'";
            }
            if ($('#WATTS').val()!="" && $('#WATTS').val()!="0"){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#WATTS').val())+ " WATTS = "+$('#WATTS').val();
            }
            if ($('#VOLTS').val()!="" && $('#VOLTS').val()!="0"){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#VOLTS').val())+ " VOLTS = "+$('#VOLTS').val();
            }
            if ($('#LOCATION').val()!="" && $('#LOCATION').val()!=null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#LOCATION').val())+ " LOCATION = '"+$('#LOCATION').val()+"'";
            }
            if ($('#POSITION').val()!="" && $('#POSITION').val()!=null){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#POSITION').val())+ " POSITION = '"+$('#POSITION').val()+"'";
            }
            if ($('#YEARMODEL').val()!="" && $('#YEARMODEL').val()!="0"){
                filteredProduct =  filteredProduct + wAnd(filteredProduct,$('#YEARMODEL').val())+ " YEARMODEL = "+$('#YEARMODEL').val();
            }
            // alert(filteredProduct );

        }


        var paramSet2 = new Array();
        paramSet2 = [{"CUSTOMERID" : $('#CUSTOMERID').val(),
            "SUPPLIERID" : $('#SUPPLIERID').val(),
            "AREA" : $('#AREA').val(),
            "SALESMANID" : $('#SALESMANID').val(),
            "STATNAME" : $('#STATNAME').val(),
            "FOREX" : $('#FOREX').val(),
            "PROID" : $('#PROID').val(),
            "CUSTTYPE" : $('#CUSTTYPE').val(),
            "textParam" : txtParam,
            "PRODUCTFILTER" : filteredProduct}



        ];
        paramSet = JSON.stringify(paramSet2);


        var selectedReportCode = $(".selected-rep").attr("id");
        selectedReportCode = selectedReportCode.substring(3,20) ;
        $('#iframe_'+ tabID).attr('src', 'ReportPage.php?dtFROM='+$("#fromdate").val()+'&dtTO='+$("#todate").val()+'&repCode='+selectedReportCode+'&dtASOF='+$("#asofDate").val()+'&param='+paramSet);

    }

</script>