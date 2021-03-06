<link rel="shortcut icon" href="../images/solution.png">

<?php
require_once("../include/initialize.php");
//checkAdmin();
  	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
$ChecksList = array(array());
$TranID="";
$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$title="Official Receipt";
$ContentIcon ="fa fa-money fa-fw";
switch ($view) {

    case md5('add') :
        $header='add';
        $content    = 'add.php';
        break;

    case md5('edit') :
        $header='edit';
        $content    = 'edit.php';
        break;

    case md5('view') :
        $header='<span>&nbsp;Print Preview </span>';
        $content    = 'view.php';
        break;


    default :
		$content    = 'list.php';
}
require_once ("../theme/insidePagePanel.php");
//require_once ("../theme/templates.php");
?>




<style>

    #resultTable {
        width: 100%;
        border-radius: 3px;
        background: #ffffff;
        padding: 2px;
    }
    #headTable tr td{
        padding-top: 7px;
        font-size: 14px;
        color: #2b669a;
        font-weight: bold;
    }

    #resultTable thead tr th {
        background: #f0fafb;
        color:#0d71bb;
        padding: 10px 10px;
        text-align: center;
        vertical-align: middle;
        border-top: 0 none;
        font-size: 11px;
        font-weight: bold;
    }

    #resultTable tbody tr td{
        font: 10px 'Arial';
        text-align: left;
        padding: 1px 1px;
        vertical-align: middle;

    }

    #resultTable td{
        padding:3px;
    }
    #resultTable tr{
        background: #fff;
    }
    #resultTable tr:hover {
        color: #2b669a;
        background-color:#F9F9FF;
    }

    .tblnavmenu {
        background-color: #f0f0ee;
        border-radius: 3px;
        border: 1px solid #c9cccf;
        position: fixed;


    }
    .BOUNCED {

        color: #641e20;
    }
    .BOUNCED td{
        background-color: #641e20 !important;
        color: #fff;
    }

</style>

<script>

    function ccInfo(){
        $("#CCINFO").hide()
        if (parseFloat($("#CARDAMT").val()) > 0) {
            $("#CCINFO").show()
        }else{
            $("#CCNO").val("");
            $("#CARDNAME").val("");
            $("#CCAPPROVAL").val("");
        }

    }
    $(document).ready(function(){
        ccInfo();
        $("#CARDAMT").blur(function(){
            ccInfo();
        });


    });
    var tooltip =  document.getElementById("toolTip");
    var tooltipmsg = "";
    function showTooltip() {
        tooltip.style.display="block";
        $('#toolTip').delay(3500).hide(0);

    }
    function blankCheck(){
        $('#BANK').val("");
        $('#ORCID').val("");
        $('#CHKNO').val("");
        $('#CHKAMOUNT').val("0");
    }
    function editCheckEntry(pid) {
        showCheckEntry();
        var checksList = <?php echo json_encode($ChecksList);?>;
        $('#BANK').val(checksList[pid]["BANK"] );
        $('#CHKNO').val(checksList[pid]["CHKNO"] );
        $('#ORCID').val(pid);
        $('#CHKDATE').val(checksList[pid]["CHKDATE"] );
        $('#CLEARDATE').val(checksList[pid]["CLEARDATE"] );
        $('#CHKAMOUNT').val(checksList[pid]["CHKAMOUNT"] );

    }
    function showCheckEntry() {
        blankCheck();
        $('.navPanel1').hide();
        $('#myBtnAddCheck').hide();

        //$('#SalesPanel').hide();
        $('#CheckEntry').show();
        $('#CheckSave').show();
        $('#myBtnCloseCheck').show();
        $('#BANK').focus();
    }
    function undoCheck(){
        blankCheck();
        $('.navPanel1').show();
        $('#myBtnAddCheck').show();
        $('#CheckEntry').hide();
        $('#CheckSave').hide();
        $('#myBtnCloseCheck').hide();
        $(".navSalesAddEdit").hide();

    }


    function blankSales(){
        $('#SLSID').val("0");
        $('#INVOICENO').val("");
        $('#DRNO').val("");
        $('#PAYTYPE').val("");
        $('#RRNO').val("");
        $('#RRID').val("0");
        $('#AMOUNT').val("0");
        $('#BOUNCEDAMT').val("0");
        $('#ORPID').val("0");
    }
    function editSalesEntry(pid) {
        $('#SalesPanel').show();
        $('.navSalesDefault').hide();
        $('.navCheckPanel').hide();
        $('#BOUNCEDAMT').show();
        $('#SalesEntry').show();
        $('.navSalesAddEdit').show();

        var SalesList = <?php echo json_encode($PDArray);?>;
        $('#SLSID').val(SalesList[pid]["SLSID"]);
        $('#INVOICENO').val(SalesList[pid]["INVOICENO"]);
        $('#DRNO').val(SalesList[pid]["DRNO"]);
        $('#PAYTYPE').val(SalesList[pid]["PTYPE"]);
        $('#RRNO').val(SalesList[pid]["RRNO"]);
        $('#RRID').val(SalesList[pid]["RRID"]);
        $('#AMOUNT').val(SalesList[pid]["AMOUNT"]);
        $('#BOUNCEDAMT').val(SalesList[pid]["BOUNCEDAMT"]);
        $('#ORPID').val([pid]);

        $('#SLSID').focus()


    }
    $(".navSalesAddEdit").hide();
    function showSalesEntry() {
        if ($('#SalesPanel').is(':visible')) {
            $('#SalesPanel').hide();
        }else{
            $('#SalesPanel').show();
        }
    }
    function addSalesEntry() {
        blankSales();
        $('#SalesPanel').show();
        $('.navSalesDefault').hide();
        $('.navCheckPanel').hide();
        $('#BOUNCEDAMT').hide();
        $('#SalesEntry').show();
        $('.navSalesAddEdit').show();


        $('#SLSID').focus();
    }
    function undoSales(){
        blankSales();
        $('.navSalesDefault').show();
        $('.navCheckPanel').show();
        $('#SalesEntry').hide();
        $('.navSalesAddEdit').hide();
        $(".navCheckSave").hide();
    }


    function submitValidationWarning(msg,tofocus){
        swal({
            text : msg,
            icon: "warning",
            dangerMode: true})
            .then((cmd) =>{
                if (tofocus!="") {
                    $(tofocus).focus();
                }
            });
    }
    $("#PAYTYPE").change(function(){
        try {
            if ($("#PAYTYPE").val() == null){
                $("#PAYTYPE").val("Payment");
            }
            $('#RRNO').val("");
            $('#RRID').val("0");
            $('#RRNO').removeAttr('readonly');
            if ($("#PAYTYPE").val().toUpperCase()!="OFFSET"){
                $('#RRNO').attr('readonly', true);
            }


        }
        catch(err) {
            swal(err.message);
        }
    });

    $("#Save").click(function(){
        try {
            if ($("#CUSTOMERID").val()==""){
                submitValidationWarning("Invalid Customer is not allowed","#CUSTOMERID");
                event.preventDefault();
            }

            if (parseFloat( $("#CARDAMT").val())> 0 && ($("#CARDNAME").val()=="" || $("#CCAPPROVAL").val()=="" || $("#CCNO").val()=="" )){
                submitValidationWarning("Invalid Credit Card Details...","#CARDNAME");
                event.preventDefault();
            }


        }
        catch(err) {
            swal(err.message);
            event.preventDefault();
        }



    });

    $("#SalesSave").click(function(){
        try {

            if ($("#PAYTYPE").val() == null){
                $("#PAYTYPE").val("Payment");
            }

            if ($("#DRNO").val()=="" && $("#INVOICENO").val()==""){
                submitValidationWarning("Invalid Sales Invoice / D.R. No.","#INVOICENO");
                event.preventDefault();
            } else  if( ($("#PAYTYPE").val().toUpperCase()=="OFFSET" && parseFloat($("#RRID").val())<= 0)){
                submitValidationWarning("Invalid R.R. No.","#RRNO");
                event.preventDefault();
            } else if ( parseFloat($("#AMOUNT").val())<=0 || parseFloat($("#AMOUNT").val()) > parseFloat($("#BALANCE").val()) ){
                submitValidationWarning("Please Enter Valid Sales Amount... Balance :"+$("#BALANCE").val(),"#RRNO");
                event.preventDefault();
            }
        }

        catch(err) {
            swal(err.message);
            event.preventDefault();
        }



    });

    $("#CheckSave").click(function(){
        try {

            if ($("#BANK").val()=="" || $("#CHKNO").val()==""  ){
                submitValidationWarning("Invalid Bank / Check No.","#BANK");
                event.preventDefault();
            }
            if ( parseFloat($("#CHKAMOUNT").val())<= 0 ){
                submitValidationWarning("Invalid Check Amount","#CHKAMOUNT");
                event.preventDefault();
            }

        }

        catch(err) {
            swal(err.message);
            event.preventDefault();
        }



    });
    //Sales Invoice Nav Menu
    $("#PAYDETL tr").on("click",function(e){
        var bounceAmount = "0.00";
        var tranID = "<?php echo $TranID;?>";
        if (this.id !="SalesEntry") {
            var x = e.pageX;
            var y = e.pageY;

            var currentrow = this;
            var tbid = this.id.substring(2, 11);
            //alert(tbid)
            $("#PSNAV").remove();
            $('body').append('<div class="tblnavmenu" id="PSNAV" style="z-index: 100; top:' + y + 'px; left:' + x + 'px ">' +
                '<ul class="nav" id="PSNAVMENU"> ' +
                '<li><a href="#" id="PSADD"><i class="fa fa-plus-square fa-fw"></i>New</a></li>' +
                '<li><a href="#" id="PSEDIT"><i class="fa fa-edit fa-fw"></i>Edit </a></li>' +
                '<li><a href="#" id="PSDELETE"><i class="fa fa-remove fa-fw"></i>Delete</a></li>' +
                '<li><a href="#" id="PSBOUNCED"><i class="fa fa-tag fa-fw"></i>Apply New Bounced Amount</a></li>' +
                '<li><a href="#" id="PSCLOSE"><i class="fa fa-undo fa-fw"></i>Close</a></li>' +
                '</ul> </div>');

            $("#PSEDIT").click(function () {
                //alert(currentrow.id)
                var row2 = $(currentrow) ;

                var row = $("#SalesEntry");
                row.insertBefore(row2.next());

                $("#PSNAV").remove();
                editSalesEntry(tbid);
            });
            $("#PSADD").click(function () {
                $("#PSNAV").remove();
                addSalesEntry();
            });

            $("#PSDELETE").click(function () {
                $("#PSNAV").remove();
                swal(deleteConfirmation).then((cmd) => {
                    if (cmd){
                        ajaxController("SalesDelete", tranID, tbid, bouncedate)
                            .then(results =>{
                                // alert(results)
                                result = $.parseJSON(results);
                                if (result['type']=="success"){

                                    $(".BOUNCEDSALES").text(result['BOUNCEDSALES']);
                                    $("#sBOUNCEDSALES").text(result['BOUNCEDSALES']);

                                    $(".TOTALSALES").text(result['TOTALSALES']);
                                    $("#sTOTALSALES").text(result['TOTALSALES']);
                                    $("#sTOTALSALES").text(result['TOTALSALES']);


                                    $(currentrow).remove();

                                }
                            });

                    }

                });
            });


            $("#PSBOUNCED").click(function () {
                $("#PSNAV").remove();

                    swal({
                        title: "Apply New Bounced Amount to Sales",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        content: {
                            element: "input",
                            attributes: {
                                placeholder: "Bounced Amount",
                                type: "number",
                                value:  bounceAmount ,
                            },
                        },
                    }).then((cmd) => {
                        //alert(cmd +"  23123");

                        if (cmd ==""){ cmd = bounceAmount;}
                        if (cmd !=null ) {
                            ajaxController("BOUNCEDSALES", tranID, tbid, cmd)
                                .then(results =>{
                                    result = $.parseJSON(results);

                                    if (result['type']=="success"){

                                        $("#PSB"+tbid).text(cmd);
                                        $(".BOUNCEDSALES").text(result['BOUNCEDSALES']);

                                        $("#sBOUNCEDSALES").text(result['BOUNCEDSALES']);


                                        $("#totalcheck").text(result['totalcheck']);
                                        //$(".totalbounced").text(result['totalbounced']);

                                    }
                                });
                        }
                    });



            });
            $("#PSCLOSE").click(function () {
                $("#PSNAV").remove();
            });
        }
    });


    //Checks Nav Menu
    $("#PAYCHECK tr").on("click",function(e){
        var bouncedate = new Date().toJSON().slice(0,10);
        var tranID = "<?php echo $TranID;?>";
        if (this.id !="CheckEntry") {
            var x = e.pageX;
            var y = e.pageY;

            var currentrow = this;
            var tbid = this.id.substring(2, 11);
            //alert(tbid)
            $("#PCNAV").remove();
            $('body').append('<div class="tblnavmenu" id="PCNAV" style="z-index: 100; top:' + y + 'px; left:' + x + 'px ">' +
                '<ul class="nav" id="PCNAVMENU"> ' +
                '<li><a href="#" id="PCADD"><i class="fa fa-plus-square fa-fw"></i>New</a></li>' +
                '<li><a href="#" id="PCEDIT"><i class="fa fa-edit fa-fw"></i>Edit </a></li>' +
                '<li><a href="#" id="PCDELETE"><i class="fa fa-remove fa-fw"></i>Delete</a></li>' +
                '<li><a href="#" id="PCBOUNCED"><i class="fa fa-tag fa-fw"></i>Mark as Bounced</a></li>' +
                '<li><a href="#" id="PCCLOSE"><i class="fa fa-undo fa-fw"></i>Close</a></li>' +
                '</ul> </div>');

            $("#PCEDIT").click(function () {
                //alert(currentrow.id)
                var row2 = $(currentrow) ;

                var row = $("#CheckEntry");
                row.insertBefore(row2.next());

                $("#PCNAV").remove();
                editCheckEntry(tbid);
            });
            $("#PCADD").click(function () {
                $("#PCNAV").remove();
                showCheckEntry();
            });

            $("#PCDELETE").click(function () {
                $("#PCNAV").remove();
                 swal(deleteConfirmation).then((cmd) => {
                    if (cmd){
                        ajaxController("CheckDelete", tranID, tbid, bouncedate)
                        .then(results =>{
                           // alert(results)
                            result = $.parseJSON(results);
                            if (result['type']=="success"){
                                $(".totalbounced").text(result['totalbounced']);
                                $("#totalcheck").text(result['totalcheck']);
                                $(currentrow).remove();

                            }
                        });

                    }

                });
            });


            $("#PCBOUNCED").click(function () {
                $("#PCNAV").remove();
                if ($(currentrow).hasClass("BOUNCED")){

                    ajaxController("BOUNCED", tranID, tbid, bouncedate)
                    .then(results =>{
                        result = $.parseJSON(results);
                        if (result['type']=="success"){

                            $(".totalbounced").text(result['totalbounced']);
                            $(currentrow).removeClass();

                        }
                    });
                }else {
                    swal({
                        title: "Enter Bounced Date",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        content: {
                            element: "input",
                            attributes: {
                                placeholder: "Date",
                                type: "date",
                                value:  bouncedate ,
                            },
                        },
                    }).then((cmd) => {
                        //swal(cmd )

                        if (cmd ==""){ cmd = bouncedate;}
                        if (cmd !=null) {
                            ajaxController("BOUNCED", tranID, tbid, cmd)
                            .then(results =>{
                                result = $.parseJSON(results);

                                if (result['type']=="success"){

                                    $(".totalbounced").text(result['totalbounced']);
                                    $(currentrow).addClass("BOUNCED");
                                }
                            });
                        }
                    });
                }


            });
            $("#PCCLOSE").click(function () {
                $("#PCNAV").remove();
            });
        }
    });



    var span = document.getElementById("btnClose");
    var modal = document.getElementById("myModal");
    var BYINVOICE = document.getElementById("INVOICENO");
    var BYSLSID = document.getElementById("SLSID");
    var BYDR = document.getElementById("DRNO");
    BYINVOICE.onchange = function() {

        modalListByInvoiceDR(1);
    }

    span.onclick = function() {

        modal.style.display = "none";
    }

    function modalListClose(){
        modal.style.display = "none";
    }
    BYDR.onchange = function() {
        modalListByInvoiceDR(2);
    }
    BYSLSID.onchange = function() {
        modalListByInvoiceDR(3);
    }
    function updateInvoiceDR(custId) {
        //  alert(custId+"ddas"+ $('#INVDR'+custId +' .cinvoiceno' ).text());

        $("#SLSID").val(custId);
        $("#INVOICENO").val($('#INVDR'+custId +' .cinvoiceno' ).text());
        $("#DRNO").val($('#INVDR'+custId +' .cdrno' ).text());
        $("#BALANCE").val($('#INVDR'+custId +' .cbalance' ).text());
         modal.style.display = "none";

    }
    function modalListByInvoiceDR(cmd){
        var keyw ;
        if ($("#INVOICENO").val() !="" || $("#DRNO").val() !="" || $("#SLSID").val() !="" )
        {
            keyw = $("#INVOICENO").val();
            if (cmd ==2) {  keyw = $("#DRNO").val(); }
            else if (cmd ==3){ keyw = $("#SLSID").val(); }

            modal.style.display = "block";
            $('html, body').css("cursor", "wait");
            $('#MyModalPage').empty();

            $.ajax({
                url: '../invoicing/InvoiceSales.php',
                type: "get",
                data: {"keyw" : keyw, "stype":cmd, "cid": $("#CUSTOMERID").val() },
                success: function(data) {

                    $('#MyModalPage').html(data);
                    $('html, body').css("cursor", "default");
                }
            });
        }


    }


</script>

