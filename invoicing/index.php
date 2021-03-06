<link rel="shortcut icon" href="../images/solution.png">

<?php
require_once("../include/initialize.php");
//checkAdmin();
  	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$title="Invoicing";
$ContentIcon ="fa fa-shopping-cart fa-fw";
$pgActive = "0";
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
        $pgActive = "1";
		$content    = 'list.php';		
}
require_once ("../theme/insidePagePanel.php");
//require_once ("../theme/templates.php");
?>

<script>
    $( "#CUSTOMERID" ).change(function() {
        var suppArray = <?php echo json_encode($mySupp); ?>;

        document.getElementById("terms").value = suppArray[document.getElementById("CUSTOMERID").value]["TERMS"];
        updateValue("duedate");

    });


    function updateValue(keyId) {
        alert(keyId);
        if (keyId=="duedate"){
            var days = document.getElementById("TERMS").value;
            var date = new Date(document.getElementById("ENTDATE").value);
           // var date = new Date(document.getElementById("INVDATE").value);
           // if ($("#SLSTYPE").val()=="2"){
           //     date = new Date(document.getElementById("DRDATE").value);
            //}
            date.setDate(date.getDate() + parseInt(days));
            document.getElementById("DUEDATE").valueAsDate = date;
        }


    }




</script>


<script>

    function updatePrice_v1(){
        var pid = document.getElementById("PROID").value;
        var prodarray = <?php echo json_encode($myArray); ?>;
        document.getElementById("PROPRICE").value =  prodarray[pid]["PROPRICE"];

    }


</script>
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
        font-size: 10pt;
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
    //$("#PROID").hide(dw);
    function ProdDetailEntry(pid,cmd)
    {

        if (cmd == 1) {

            var purprodArray = <?php echo json_encode($PDArray);?>;

            $('#PROID').append($("<option></option>")
                .attr("value", purprodArray[pid]["PROID"])
                .attr("selected", "selected")
                .text(purprodArray[pid]["PRONAME"]));



           // $("#PRONAME").show();

            document.getElementById("PID").value = pid;
            document.getElementById("OLDPID").value = pid;

            document.getElementById("OLDPROID").value = purprodArray[pid]["PROID"];
            document.getElementById("PROID").value = purprodArray[pid]["PROID"];

            document.getElementById("PRONAME").value = purprodArray[pid]["PRONAME"];
            document.getElementById("OLDPRONAME").value = purprodArray[pid]["PRONAME"];

            document.getElementById("PROCODE").value = purprodArray[pid]["PROCODE"];
            document.getElementById("OLDPROCODE").value = purprodArray[pid]["PROCODE"];

            document.getElementById("QTY").value = purprodArray[pid]["QTY"];
            document.getElementById("OLDQTY").value = purprodArray[pid]["QTY"];

            document.getElementById("PROQTY").value = purprodArray[pid]["PROQTY"];
            document.getElementById("FLOORPRICE").value = purprodArray[pid]["FLOORPRICE"];

            document.getElementById("PROPRICE").value = purprodArray[pid]["PROPRICE"];
            document.getElementById("OLDPROPRICE").value = purprodArray[pid]["PROPRICE"];

            document.getElementById("DISCPER").value = purprodArray[pid]["DISCPER"];
            document.getElementById("OLDDISCPER").value = purprodArray[pid]["DISCPER"];

            document.getElementById("DISCAMT").value = purprodArray[pid]["DISCAMT"];
            document.getElementById("OLDDISCAMT").value = purprodArray[pid]["DISCAMT"];

            document.getElementById("AMOUNT").value = purprodArray[pid]["AMOUNT"];
            document.getElementById("OLDAMOUNT").value = purprodArray[pid]["AMOUNT"];

            document.getElementById("UNIT").value = purprodArray[pid]["UNIT"];
            document.getElementById("OLDUNIT").value = purprodArray[pid]["UNIT"];

            $("#PRONAME").attr('readonly','readonly');
            $("#PROCODE").attr('readonly','readonly');

            showProductEntry();

            $("#QTY").focus();

        }else {
            $("#PRONAME").removeAttr('readonly');
            $("#PROCODE").removeAttr('readonly');
            document.getElementById("AMOUNT").value = "0.00";
            document.getElementById("OLDAMOUNT").value = "0.00";

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

            document.getElementById("PROPRICE").value = "0.00";
            document.getElementById("OLDPROPRICE").value = "0.00";

            document.getElementById("DISCPER").value = document.getElementById("DISCOUNTPER").value;

            document.getElementById("OLDDISCPER").value = "0";

            document.getElementById("DISCAMT").value = "0.00"
            document.getElementById("OLDDISCAMT").value = "0.00";


        }

    }



</script>


<script>

    // Get the modal
    if ("<?php echo $pgActive;?>" != "1"){
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");
        var btn2 = document.getElementById("myBtn2");
        // Get the <span> element that closes the modal
        var span = document.getElementById("btnClose");
        var CUSTOMER = document.getElementById("CUSTNAME");
        var PRODUCT = document.getElementById("PRONAME");



        if (typeof(CUSTOMER) !='undefined' && CUSTOMER) {
            // When the user clicks the button, open the modal
            CUSTOMER.onchange = function() {
                modalListCustomer();

            }
            // When the user clicks the button, open the modal
            PRODUCT.onchange = function () {
                modalListProduct(1);
            }

            btn2.onclick = function () {
                modalListProduct(2);

            }
            btn.onclick = function () {
                modalListCustomer();

            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {

                modal.style.display = "none";
            }
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
                url: '../products/ProductList.php?keyw='+keyw+'&keyprice='+$("#CUSTTYPE").val()+'&keyw2='+$("#PROCODE").val(),
                success: function(data) {

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
        $("#TERMS").val($('#'+custId +' .cterms' ).text());
        $("#CREDITLIMIT").val($('#'+custId +' .ccreditlimit' ).text());
        $("#BALANCE").val($('#'+custId +' .cbalance' ).text());
        $("#SMANNAME").val($('#'+custId +' .csmanname' ).text());
        $("#SMANCODE").val($('#'+custId +' .csmancode' ).text());
        $("#SALESMANID").val($('#'+custId +' .csmanid' ).text());
        if ($("#SALESMANID").val() ==""){$("#SALESMANID").val("0")}
        $("#DISCOUNTPER").val($('#'+custId +' .cdiscountper' ).text());
        $("#CUSTTYPE").val($('#'+custId +' .ccusttype' ).text());
        $("#DISCPER").val($("#DISCOUNTPER").val());

        $("#TERMS").focus();
        modal.style.display = "none";

    }
    function updateProduct(custId) {
        //  alert(custId+"ddas"+ this.id);

        $("#PROID").val(custId);
        $("#PRONAME").val($('#'+custId +' .cname' ).text());
        $("#PROCODE").val($('#'+custId +' .ccode' ).text());
        $("#UNIT").val($('#'+custId +' .cunit' ).text());
        $("#PROPRICE").val($('#'+custId +' .cprice' ).text());

        $("#REORDER").val($('#'+custId +' .creorder' ).text());
        $("#PROQTY").val($('#'+custId +' .cqty' ).text());
        $("#FLOORPRICE").val($('#'+custId +' .cfloorprice' ).text());

        $('#QTY').attr('readonly', false);
        $('#UNIT').attr('readonly', false);

        $('#PROPRICE').attr('readonly', false);
        $('#DISCPER').attr('readonly', false);

        $('#DISCAMT').attr('readonly', false);

        modal.style.display = "none";

        $("#QTY").focus();


    }


    var tooltip =  document.getElementById("toolTip");
    var tooltipmsg = "";
    function showTooltip() {
         tooltip.style.display="block";
         $('#toolTip').delay(3500).hide(0);

    }

    function qtyValidation(){

        if (  parseFloat( $("#QTY").val().replace(/,/g , ''))  > parseFloat(  $("#PROQTY").val().replace(/,/g , ''))){
            tooltip =  document.getElementById("toolTip");
            tooltipmsg = "";
            tooltip.style.left = 550;
            tooltip.style.top = 370;
             
            tooltipmsg = "Qty ["+ $("#QTY").val()+ "] is greater than Qty Onhand ["+$("#PROQTY").val() +"]";
            $("#toolTip p").html(tooltipmsg);
            $("#QTY").val("0");

            showTooltip();
        }
        updateAmount();

    }
    function priceValidation(){
        if (parseFloat( $("#PROPRICE").val().replace(/,/g , '')) <  parseFloat( $("#FLOORPRICE").val().replace(/,/g , ''))){
            tooltip.style.left = 750;
            tooltip.style.top = 370;
            tooltipmsg = "You're Price ["+ $("#PROPRICE").val()+ "] is below Floor Price ["+$("#FLOORPRICE").val() +"]";
            $("#toolTip p").html(tooltipmsg);


            showTooltip( );
        }

        updateAmount();
    }


</script>

<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>