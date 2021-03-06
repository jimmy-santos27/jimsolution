<link rel="shortcut icon" href="../images/solution.png">
<?php
require_once("../include/initialize.php");
//checkAdmin();
  	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$_SESSION['view']=$view;
$header=$view;
$title="Purchase Order";
$ContentIcon ="fa fa-clipboard fa-fw";
date_default_timezone_set("Asia/Taipei");
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
        $content    = 'view.php';
        break;



    default :
		$content    = 'list.php';		
}
require_once ("../theme/templates.php");
?>


<style>

    #headTable tr td{
        padding-top: 7px;
        font-size: 14px;
        color:  #478500;
        font-weight: bold;
    }
    #resultTable {
        width: 100%;
        border-radius: 3px;
        background: #ffffff;
        padding: 2px;
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

        padding: 1px 1px;

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





<script src="po_import/js/modernizr.min.js"></script>

<script src="po_import/js/jquery-ui.min.js"></script>
<script src="po_import/js/infragistics.core.js"></script>
<script src="po_import/js/infragistics.lob.js"></script>
<script src="po_import/js/modules/infragistics.ext_core.js"></script>
<script src="po_import/js/modules/infragistics.ext_collections.js"></script>
<script src="po_import/js/modules/infragistics.ext_text.js"></script>
<script src="po_import/js/modules/infragistics.ext_io.js"></script>
<script src="po_import/js/modules/infragistics.ext_ui.js"></script>
<script src="po_import/js/modules/infragistics.documents.core_core.js"></script>
<script src="po_import/js/modules/infragistics.ext_collectionsextended.js"></script>
<script src="po_import/js/modules/infragistics.excel_core.js"></script>
<script src="po_import/js/modules/infragistics.ext_threading.js"></script>
<script src="po_import/js/modules/infragistics.ext_web.js"></script>
<script src="po_import/js/modules/infragistics.xml.js"></script>
<script src="po_import/js/modules/infragistics.documents.core_openxml.js"></script>
<script src="po_import/js/modules/infragistics.excel_serialization_openxml.js"></script>
<link href="po_import/css/infragistics.theme.css" rel="stylesheet"></link>
<link href="po_import/css/infragistics.css" rel="stylesheet"></link>





















<script>
    var cmdCtr = 0;
//    $("#PROID").hide(dw);

    function ProdDetailEntry(pid,cmd)
    {

        if (cmd == 1) {

            var purprodArray = <?php echo json_encode($PDArray);?>;




            // $("#PRONAME").show();

            document.getElementById("PID").value = pid;
            document.getElementById("OLDPID").value = pid;
            document.getElementById("POPID").value = pid;
            document.getElementById("OLDPOPID").value = pid;




            document.getElementById("OLDPROID").value = purprodArray[pid]["PROID"];
            document.getElementById("PROID").value = purprodArray[pid]["PROID"];

            document.getElementById("PRONAME").value = purprodArray[pid]["PRONAME"];
            document.getElementById("OLDPRONAME").value = purprodArray[pid]["PRONAME"];

            document.getElementById("PROCODE").value = purprodArray[pid]["PROCODE"];
            document.getElementById("OLDPROCODE").value = purprodArray[pid]["PROCODE"];

            document.getElementById("QTY").value = purprodArray[pid]["QTY"];
            document.getElementById("OLDQTY").value = purprodArray[pid]["QTY"];


            document.getElementById("UNIT").value = purprodArray[pid]["UNIT"];


            document.getElementById("QTYPERBOX").value = purprodArray[pid]["QTYPERBOX"];


            document.getElementById("FLOORPRICE").value = purprodArray[pid]["FLOORPRICE"];
            document.getElementById("OLDFLOORPRICE").value = purprodArray[pid]["FLOORPRICE"];


            document.getElementById("FLOORRATE").value = purprodArray[pid]["FLOORRATE"];
            document.getElementById("OLDFLOORRATE").value = purprodArray[pid]["FLOORRATE"];

            document.getElementById("PURPRICE").value = purprodArray[pid]["PURPRICE"];
            document.getElementById("OLDPURPRICE").value = purprodArray[pid]["PURPRICE"];


            document.getElementById("FORPURPRICE").value = purprodArray[pid]["FORPURPRICE"];
            document.getElementById("OLDFORPURPRICE").value = purprodArray[pid]["FORPURPRICE"];

            document.getElementById("FORAMOUNT").value = purprodArray[pid]["FORAMOUNT"];
            document.getElementById("OLDFORAMOUNT").value = purprodArray[pid]["FORAMOUNT"];
            document.getElementById("AMOUNT").value = purprodArray[pid]["AMOUNT"];
            document.getElementById("OLDAMOUNT").value = purprodArray[pid]["AMOUNT"];


            document.getElementById("SUPPITEM").value = purprodArray[pid]["SUPPITEM"];
            document.getElementById("OLDSUPPITEM").value = purprodArray[pid]["SUPPITEM"];

            cmdCtr = 0;
            $('#ItemEntry').show();
            $('#ItemEntry2').show();
            $('#itemsave').show();
            $('#save').hide();

            $('#QTY').focus();

        }else {
            document.getElementById("PID").value = "0";
            document.getElementById("OLDPID").value = "0";
            document.getElementById("POPID").value = "0";
            document.getElementById("OLDPOPID").value = "0";




            document.getElementById("OLDPROID").value = "0";
            document.getElementById("PROID").value = "0";

            document.getElementById("PRONAME").value = "";
            document.getElementById("OLDPRONAME").value = "";

            document.getElementById("PROCODE").value = "";
            document.getElementById("OLDPROCODE").value = "";

            document.getElementById("QTY").value ="0";
            document.getElementById("OLDQTY").value = "0";

            document.getElementById("UNIT").value = "";


            document.getElementById("QTYPERBOX").value = "0";


            document.getElementById("FLOORPRICE").value = "0";
            document.getElementById("FLOORPRICE").value ="0";

            document.getElementById("FLOORRATE").value = "0";
            document.getElementById("OLDFLOORRATE").value = "0";

            document.getElementById("PURPRICE").value = "0";
            document.getElementById("OLDPURPRICE").value = "0";

            document.getElementById("FORPURPRICE").value = "0";
            document.getElementById("OLDFORPURPRICE").value = "0";

            document.getElementById("FORAMOUNT").value = "0";
            document.getElementById("OLDFORAMOUNT").value = "0";
            document.getElementById("AMOUNT").value = "0";
            document.getElementById("OLDAMOUNT").value = "0";

            document.getElementById("SUPPITEM").value = "0";
            document.getElementById("OLDSUPPITEM").value = "0";

        }

    }



</script>


<script>

    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal


    var btn = document.getElementById("myBtn");
    var btn2 = document.getElementById("myBtn2");
    // Get the <span> element that closes the modal
    var span = document.getElementById("btnClose");

    var SUPPLIER = document.getElementById("SUPPNAME");
    // When the user clicks the button, open the modal
    SUPPLIER.onchange = function() {
        modalListSUPPLIER();

    }


    var PRODUCT = document.getElementById("PRONAME");
    // When the user clicks the button, open the modal
    PRODUCT.onchange = function() {
        modalListProduct(1);
    }

    btn2.onclick = function() {
        modalListProduct(2);

    }
    btn.onclick = function() {
        modalListSUPPLIER();

    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {

        modal.style.display = "none";
    }
    var btnXL = document.getElementById("btnImportXL");
    btnXL.onclick = function() {
        modalListXL();

    }

    function modalListClose(){
        modal.style.display = "none";
    }
    function modalListSUPPLIER(){
        modal.style.display = "block";
        var keyw = $("#SUPPNAME").val();
        $('.cmodal-content').css("width","80%");
        $("#closerow").css("left","85%");
        $('#myInput').show();
        $('#MyModalPage').empty();
        $('html, body').css("cursor", "wait");
        $.ajax({
            url: '../supplier/SupplierList.php?keyw='+$("#SUPPNAME").val(),
            success: function(data) {

                $('#MyModalPage').html(data);
                $('html, body').css("cursor", "default");

            }
        });
    }
    function modalListXL(){
        modal.style.display = "block";

     //   window.open("po_import/import_po.php", "PopupWindow", "width=800,height=600,scrollbars=yes,resizable=no");
   //     window.open()



        $('#MyModalPage').empty();
        $('.cmodal-content').css("width","90%");
        $("#closerow").css("left","93%");
        $('#myInput').hide();
        $('html, body').css("cursor", "wait");
        $.ajax({
            url: 'po_import/import_po.php?id='+$("#POID").val()+'&pono='+$("#pono").val(),
            success: function(data) {

                $('#MyModalPage').html(data);
                $('html, body').css("cursor", "default");
                $('#grid1').css("font-size", "xx-small");
                $('#grid1').css("font-family", " Arial, Helvetica, sans-serif ");

            }
        });


    }
    function modalListProduct(cmd){
        var keyw = $("#PRONAME").val();
        if ($("#PRONAME").val() !="" || cmd == 2  )
        {
            $('#myInput').show();
            modal.style.display = "block";
            $('.cmodal-content').css("width","80%");
            $("#closerow").css("left","85%");
            $('html, body').css("cursor", "wait");
            $('#MyModalPage').empty();
            $.ajax({
                url: '../products/ProductList.php?keyw='+keyw+'&keyprice=4&keyw2='+$("#PROCODE").val(),
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
        $('#ItemEntry').show();
        $('#ItemEntry2').show();
        $('#itemsave').show();
        $('#save').hide();
        ProdDetailEntry(0,0); // EMPTY INPUT
        $('#QTY').focus();
    }

    function updateSUPPLIER(custId) {
        //  alert(custId+"ddas"+ this.id);

        $("#SUPPLIERID").val(custId);
        $("#SUPPNAME").val($('#'+custId +' .cname' ).text());
        $("#SUPPCODE").val($('#'+custId +' .ccode' ).text());
        $("#terms").val($('#'+custId +' .cterms' ).text());
        $("#CREDITLIMIT").val($('#'+custId +' .ccreditlimit' ).text());
        $("#BALANCE").val($('#'+custId +' .cbalance' ).text());
        $("#SUPPITEM").val($('#'+custId +' .csuppitem' ).text());
        $("#STATNAME").val($('#'+custId +' .cstatname' ).text());
        $("#FOREX").val($('#'+custId +' .cforex' ).text());


        if ($("#FOREX").val()=="")
        { $("#FOREX").val("PHP");
            $("#FOREXRATE").val("1.00");}

        updateValue("duedate");

        $("#terms").focus();
        modal.style.display = "none";

    }
    function updateProduct(custId) {
        //  alert(custId+"ddas"+ this.id);

        $("#PROID").val(custId);
        $("#PRONAME").val($('#'+custId +' .cname' ).text());
        $("#PROCODE").val($('#'+custId +' .ccode' ).text());
        $("#UNIT").val($('#'+custId +' .cunit' ).text());
        $("#PURPRICE").val($('#'+custId +' .cprice' ).text());
        $("#SUPPITEM").val($('#'+custId +' .csuppitem' ).text());


        $("#QTYPERBOX").val($('#'+custId +' .cqtyperbox' ).text());
        $("#FORPURPRICE").val($('#'+custId +' .cforpurprice' ).text());
        $("#FLOORPRICE").val($('#'+custId +' .cfloorprice' ).text());
        $("#FLOORRATE").val($('#'+custId +' .cfloorrate' ).text());



        $('#FORAMOUNT').attr('readonly', true);
        $('#AMOUNT').attr('readonly', true);

        $("#FORPURPRICE").focus();
        modal.style.display = "none";

    }


    var tooltip =  document.getElementById("toolTip");
    var tooltipmsg = "";
    function showTooltip() {
        tooltip.style.display="block";
        $('#toolTip').delay(3500).hide(0);

    }

    function qtyValidation(){
        updateAmount();

    }
    function priceValidation(){
       /*
        if (parseFloat( $("#PROPRICE").val().replace(/,/g , '')) <  parseFloat( $("#FLOORPRICE").val().replace(/,/g , ''))){
            tooltip.style.left = 750;
            tooltip.style.top = 370;
            tooltipmsg = "You're Price ["+ $("#PROPRICE").val()+ "] is below Floor Price ["+$("#FLOORPRICE").val() +"]";
            $("#toolTip p").html(tooltipmsg);


            showTooltip( );
        }
        */
        updateAmount();
    }


</script>

<script>

    function updateValue(keyId) {

        if (keyId=="duedate"){
            var days = document.getElementById("terms").value;
            var date = new Date(document.getElementById("entdate").value);
            date.setDate(date.getDate() + parseInt(days));
            document.getElementById("duedate").valueAsDate = date;
        }


    }
</script>


<script>

    function updatePrice(){
        var pid = document.getElementById("PROID").value;
        //document.getElementById("PROPRICE").value = pid;
        var prodarray = <?php echo json_encode($myArray); ?>;
        document.getElementById("PURPRICE").value =  prodarray[pid]["PURPRICE"];

    }
    function updateAmount(){
        //Compute Amount
        var FOREXRATE =  parseFloat(document.getElementById("FOREXRATE").value);
        if (FOREXRATE <= 0){FOREXRATE=1; }
        var FORPURPRICE =  parseFloat(document.getElementById("FORPURPRICE").value);
        if (document.getElementById("FORPURPRICE").value=="") {
            FORPURPRICE = 0.00;
            document.getElementById("FORPURPRICE").value="0";
        }
        var PURPRICE = parseFloat(document.getElementById("PURPRICE").value);
        if (document.getElementById("PURPRICE").value=="") {
            PURPRICE = 0.00;
            document.getElementById("PURPRICE").value="0";
        }
        if (FORPURPRICE>0){
            PURPRICE = FORPURPRICE*FOREXRATE;
            document.getElementById("PURPRICE").value= PURPRICE;
        }

        var qty = parseFloat(document.getElementById("QTY").value);
        if (document.getElementById("QTY").value=="") {
            qty = 0;
            document.getElementById("QTY").value="0";
        }
        document.getElementById("FORAMOUNT").value = (FORPURPRICE * qty) ;
        document.getElementById("AMOUNT").value = (PURPRICE * qty) ;
    }

</script>



