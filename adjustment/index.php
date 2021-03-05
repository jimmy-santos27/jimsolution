<link rel="shortcut icon" href="../images/solution.png">
<?php
require_once("../include/initialize.php");
//checkAdmin();
if (!isset($_SESSION['USERID'])){

    redirect(web_root."index.php");
}
$TranHead = new AdjustHead();
$TranDetl = new AdjustDetl();
$Customer = new Customer();
$Products = new Product();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$title="Inventory Adjustment";
$ContentIcon ="fa fa-shopping-gears fa-fw";
if ($view == "new"){
    $view = md5("add");
}
//echo md5('view');
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
        font-size: 10px;
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



</style>

<script>
    var cmdCtr = 0;
    $("#PROID").hide(dw);
    function ProdDetailEntry(pid,cmd)
    {

        if (cmd == 1) {

            var purprodArray = <?php echo json_encode($PDArray);?>;

            $('#PROID').val( purprodArray[pid]["PROID"]);





           // $("#PRONAME").show();

            document.getElementById("PID").value = pid;


            document.getElementById("ADJPID").value = purprodArray[pid]["ADJPID"];
            //document.getElementById("PROQTY").value = purprodArray[pid]["PROQTY"];

            document.getElementById("OLDPROID").value = purprodArray[pid]["PROID"];
            document.getElementById("PROID").value = purprodArray[pid]["PROID"];

            document.getElementById("PRONAME").value = purprodArray[pid]["PRONAME"];
            document.getElementById("OLDPRONAME").value = purprodArray[pid]["PRONAME"];

             document.getElementById("PROCODE").value = purprodArray[pid]["PROCODE"];
            document.getElementById("OLDPROCODE").value = purprodArray[pid]["PROCODE"];

            document.getElementById("QTY").value = purprodArray[pid]["QTY"];
            document.getElementById("OLDQTY").value = purprodArray[pid]["QTY"];

            document.getElementById("QTYRESET").value = purprodArray[pid]["QTYRESET"];
            document.getElementById("OLDQTYRESET").value = purprodArray[pid]["QTYRESET"];

            document.getElementById("UNIT").value = purprodArray[pid]["UNIT"];
            document.getElementById("OLDUNIT").value = purprodArray[pid]["UNIT"];

            $("#PRONAME").attr('readonly','readonly');
            $("#PROCODE").attr('readonly','readonly');

            showProductEntry();

            $("#QTY").focus();

        }else {
             $("#PRONAME").removeAttr('readonly');
            $("#PROCODE").removeAttr('readonly');
             document.getElementById("ADJPID").value = "";

            document.getElementById("PID").value = "";
            document.getElementById("OLDPID").value = "";

            document.getElementById("PROID").value = "";
            document.getElementById("OLDPROID").value = "";

            document.getElementById("PRONAME").value = "";
            document.getElementById("OLDPRONAME").value = "";

            document.getElementById("PROCODE").value = "";
            document.getElementById("OLDPROCODE").value = "";

            document.getElementById("UNIT").value = "";
            document.getElementById("OLDUNIT").value = "";

            document.getElementById("OLDQTY").value = "0";
            document.getElementById("QTY").value = "0";
            document.getElementById("PROQTY").value = "0";
            document.getElementById("QTYRESET").value = "0";
            document.getElementById("OLDQTYRESET").value = "0";


        }

    }



</script>


<script>

    // Get the modal
    var modal = document.getElementById("myModal");
    if (typeof($("#ADJTYPE").val() != "undefined") && typeof($("#CUSTNAME").val()) != "undefined"){

        var ADJUSTMENTTYPE = document.getElementById("ADJTYPE");
        ADJUSTMENTTYPE.onchange = function() {
            if (ADJUSTMENTTYPE.value != "Replacement"){
                $("#CUSTCODE").val("");
                $("#CUSTOMERID").val("0");
                $("#CUSTNAME").val("");
                $("#CUSTNAME").attr('readonly', true)
                $("#myBtn").hide();
                if (ADJUSTMENTTYPE.value != "Reset"){
                    $(".QRESET").hide();
                    $("#QTYRESET").val("0");
                }else{
                    $(".QRESET").show();

                }
            } else {

                $("#CUSTNAME").attr('readonly', false );
                $("#myBtn").show();
            }


        }

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        var btn2 = document.getElementById("myBtn2");
        // Get the <span> element that closes the modal
        var span = document.getElementById("btnClose");
        var CUSTOMER = document.getElementById("CUSTNAME");
        // When the user clicks the button, open the modal
        CUSTOMER.onchange = function() {
            modalListCustomer();

        }


        var PRODUCT = document.getElementById("PRONAME");
        // When the user clicks the button, open the modal
        PRODUCT.onchange = function() {
            modalListProduct(1);
        }

        PRODUCT.onchange = function() {
            modalListProduct(1);
        }
        // When the user clicks the button, open the modal
        btn2.onclick = function() {
            modalListProduct(2);

        }
        btn.onclick = function() {
            modalListCustomer();

        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {

            modal.style.display = "none";
        }

    }


    function modalListClose(){
        modal.style.display = "none";
    }
    function modalListCustomer(){
        modal.style.display = "block";
        var keyw = $("#CUSTNAME").val();
        $('#lgCustomer').show();
        $('#lgProductSales').hide();
        $('#MyModalPage').empty();
        $('html, body').css("cursor", "wait");
        $.ajax({
            url: '../customer/CustomerList.php?keyw='+$("#CUSTNAME").val(),
            success: function(data) {

                $('#MyModalPage').html(data);
                $('html, body').css("cursor", "default");

            }
        });
    }
    function modalListProduct(cmd){
        var keyw = $("#PRONAME").val();
        if ($("#PRONAME").val() !="" || cmd == 2  )
        {

                $('#lgCustomer').hide();
                $('#lgProductSales').show();
                modal.style.display = "block";

                $('html, body').css("cursor", "wait");
                $('#MyModalPage').empty();
                $.ajax({
                    url: '../products/ProductList.php?keyw=' + keyw + '&keyprice=' + $("#CUSTTYPE").val() + '&keyw2=' + $("#PROCODE").val(),
                    success: function (data) {

                        $('#MyModalPage').html(data);
                        $('html, body').css("cursor", "default");
                    }
                });

        }


    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {

            modal.style.display = "none";
        }
    }
    function closeProductEntry(){
        $('#EntryProduct').hide();
        $('#itemsave').hide();
        $('#save').show();
        ProdDetailEntry(0,0); // EMPTY INPUT
    }
    function showProductEntry() {
        cmdCtr = 0;
        $('#EntryProduct').show();
        $('#itemsave').show();
        $('#save').hide();

        $('#PRONAME').focus();
    }

    function updateCustomer(custId) {
        //  alert(custId+"ddas"+ this.id);

        $("#CUSTOMERID").val(custId);
        $("#CUSTNAME").val($('#'+custId +' .cname' ).text());
        $("#CUSTCODE").val($('#'+custId +' .ccode' ).text());

        $("#CHECKEDBY").focus();
        if ( $("#CUSTOMERID").val() !="0")
        {
            $("#ItemEntry").show();
            $("#myBtn2").show();
        }

        modal.style.display = "none";

    }
    function updateProduct(custId) {
        //  alert(custId+"ddas"+ this.id);

        $("#PROID").val(custId);
        $("#PRONAME").val($('#'+custId +' .cname' ).text());
        $("#PROCODE").val($('#'+custId +' .ccode' ).text());
        $("#UNIT").val($('#'+custId +' .cunit' ).text());

        $("#REORDER").val($('#'+custId +' .creorder' ).text());
        $("#PROQTY").val($('#'+custId +' .cqty' ).text());
        $("#QTYRESET").val($('#'+custId +' .cqty' ).text());

        $('#QTY').attr('readonly', false);
        $('#UNIT').attr('readonly', false);
        $("#QTY").focus();
        modal.style.display = "none";

    }

    function updateProductInvoiceDR(custId) {
        //  alert(custId+"ddas"+ this.id);

        $("#PROID").val(custId);
        $("#PRONAME").val($('#'+custId +' .cname' ).text());
        $("#PROCODE").val($('#'+custId +' .ccode' ).text());
        $("#UNIT").val($('#'+custId +' .cunit' ).text());
        $("#PROQTY").val($('#'+custId +' .cqty' ).text());

        $("#ADJID").val($('#'+custId +' .cADJID' ).text());
        $("#ADJPID").val($('#'+custId +' .cpid' ).text());
        $('#QTY').attr('readonly', false);
        $('#UNIT').attr('readonly', false);

        $("#QTY").focus();
        modal.style.display = "none";

    }

    var tooltip =  document.getElementById("toolTip");
    var tooltipmsg = "";
    function showTooltip() {
         tooltip.style.display="block";
         $('#toolTip').delay(3500).hide(0);

    }

    function qtyValidation(){

        if (  parseFloat( $("#QTY").val().replace(/,/g , ''))  > (parseFloat( $("#PROQTY").val()   .replace(/,/g , '')) +  parseFloat( $("#OLDQTY").val()   .replace(/,/g , '')))){
            tooltip =  document.getElementById("toolTip");
            tooltipmsg = "";
            tooltip.style.left = 700;
            tooltip.style.top = 270;

            tooltipmsg = "Qty Return ["+ $("#QTY").val()+ "] is greater than Sales Qty  ["+(parseFloat( $("#PROQTY").val()   .replace(/,/g , '')) +  parseFloat( $("#OLDQTY").val()   .replace(/,/g , ''))) +"]";
            $("#toolTip p").html(tooltipmsg);
            $("#QTY").val("0");

            showTooltip();
        }
        updateAmount();

    }
    function priceValidation(){

        updateAmount();
    }


</script>
