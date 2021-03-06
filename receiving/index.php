<link rel="shortcut icon" href="../images/solution.png">

<link href="../css/BSolutionTable.css" rel="stylesheet">

<?php
require_once("../include/initialize.php");
//checkAdmin();
  	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$title="Receiving Report";
$ContentIcon ="fa fa-list-alt fa-fw";
$ModalTitle="Receiving Report [Choose From Purchase Order]";
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

if ( $view == md5('edit')){
    ?>
    <script>
        $("#myBtnAddItem").focus();
    </script>
<?php

}


?>

<script>

    function updateValuesss(keyId) {

        if (keyId=="duedate"){
            var days = document.getElementById("terms").value;
            var date = new Date(document.getElementById("entdate").value);
            date.setDate(date.getDate() + parseInt(days));
            document.getElementById("duedate").valueAsDate = date;
        }


    }
</script>



<style>
    #myModal{
        color: #2e6da4;
        font-size: 10pt;

    }
     
</style>


<script>

    function updatePricesss(){
        var pid = document.getElementById("PROID").value;
        var prodarray = <?php echo json_encode($myArray); ?>;
        document.getElementById("PURPRICE").value =  prodarray[pid]["PURPRICE"];

    }
    function updateAmountsss(){
        //alert(document.getElementById("PROPRICE").value);

        var proprice = parseFloat(document.getElementById("PURPRICE").value);
        if (document.getElementById("PURPRICE").value=="") {
            proprice = 0.00;
            document.getElementById("PURPRICE").value="0";
        }

        var qty = parseFloat(document.getElementById("QTY").value);
        if (document.getElementById("QTY").value=="") {
            qty = 0.00;
            document.getElementById("QTY").value="0";
        }

        var discamt = parseFloat(document.getElementById("DISCAMT").value);
        if (document.getElementById("DISCAMT").value==""){
            discamt = 0.00;
            document.getElementById("DISCAMT").value="0";
        }
        var discper = parseFloat(document.getElementById("DISCPER").value);
        if (document.getElementById("DISCPER").value=="") {
            discper = 0.00;
            document.getElementById("DISCPER").value="0";
        }else {
            if (Number.isNaN(discper/100) ) {

            }else{
                discamt = (proprice * qty) * (discper/100);
                document.getElementById("DISCAMT").value = discamt;
            }
        }
        document.getElementById("AMOUNT").value = (proprice * qty) - discamt;
    }




</script>

<script type="text/javascript">
    function stopRKey(evt) {
        var evt = (evt) ? evt : ((event) ? event : null);
        var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
        if ((evt.keyCode == 13) && ((node.type=="text") || (node.type=="number") || (node.type=="date") || (node.type=="radio") || (node.type=="checkbox")) )  {return false;}
    }

    document.onkeypress = stopRKey;
</script>

<script>
    //Modal P.O. Item
    function updateAmount2(ctr){

        var QTYselector=document.getElementsByName("QTYselector[]");
        var PURPRICEselector=document.getElementsByName("PURPRICEselector[]");
        var DISCPERselector=document.getElementsByName("DISCPERselector[]");
        var DISCAMTselector=document.getElementsByName("DISCAMTselector[]");
        var AMOUNTselector=document.getElementsByName("AMOUNTselector[]");

        // alert (PURPRICEselector.item(ctr).value);

        var proprice = parseFloat(PURPRICEselector.item(ctr).value);

        if (proprice =="") {
            proprice = 0.00;
            PURPRICEselector.item(ctr).value="0";
        }

        var qty = parseFloat(QTYselector.item(ctr).value);
        if (qty =="") {
            qty = 0.00;
            QTYselector.item(ctr).value ="0";
        }

        var discamt = parseFloat(DISCAMTselector.item(ctr).value);
        if (discamt ==""){
            discamt = 0.00;
            DISCAMTselector.item(ctr).value="0";
        }
        var discper = parseFloat(DISCPERselector.item(ctr).value);
        if (discper=="") {
            discper = 0.00;
            DISCPERselector.item(ctr).value="0";
        }else {
            if (Number.isNaN(discper/100) ) {

            }else{
                discamt = (proprice * qty) * (discper/100);
                DISCAMTselector.item(ctr).value = discamt;
            }
        }
        AMOUNTselector.item(ctr).value = (proprice * qty) - discamt;



    }

</script>




<script>
    var cmdCtr = 0;
    function ProdDetailEntry(pid,cmd)
    {
        if (cmd == 1) {
            blankItemEntry();
            var purprodArray = <?php echo json_encode($PDArray);?>;

            document.getElementById("PID").value = pid;



            document.getElementById("POPID").value = purprodArray[pid]["POPID"];


            document.getElementById("pono").value = purprodArray[pid]["pono"];

            document.getElementById("OLDPROID").value = purprodArray[pid]["PROID"];
            document.getElementById("PROID").value = purprodArray[pid]["PROID"];

            document.getElementById("PRONAME").value = purprodArray[pid]["PRONAME"];
            document.getElementById("PROCODE").value = purprodArray[pid]["PROCODE"];

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
            //$('#ItemEntry2').show();
            $('#itemsave').show();
            $('#save').hide();

            $('#QTY').focus();

        }else {

            blankItemEntry();

        }

    }

    function blankItemEntry() {
        $('#ItemEntry input').val("");
        $('#ItemEntry2 input').val("");
        $('#ItemEntry input.form-num').val("0");
        $('#ItemEntry2 input.form-num').val("0");
    }

</script>


<script>

    // Get the modal
    var modal = document.getElementById("myModal2");

    // Get the button that opens the modal


    var btn = document.getElementById("myBtn");
    var btn2 = document.getElementById("myBtn2");
    // Get the <span> element that closes the modal
    var span = document.getElementById("btnClose");
    var PRODUCT = document.getElementById("PRONAME");
    var SUPPLIER = document.getElementById("SUPPNAME");

    var btnXL = document.getElementById("btnImportXL");
    // When the user clicks the button, open the modal
    if (typeof(SUPPLIER) !='undefined' && SUPPLIER){
        SUPPLIER.onchange = function() {
            modalListSUPPLIER();

        }
        // When the user clicks the button, open the modal

        PRODUCT.onchange = function () {
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

    //    btnXL.onclick = function() {
    //        modalListXL();

     //   }
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


    function modalListProduct(cmd){
        var keyw = $("#PRONAME").val();
        if ($("#PRONAME").val() !="" || $("#pono").val() !="" || cmd == 2  )
        {


            $('#myInput').show();
            modal.style.display = "block";
            $('.cmodal-content').css("width","80%");
            $("#closerow").css("left","85%");
            $('html, body').css("cursor", "wait");
            $('#MyModalPage').empty();
            if ($("#pono").val() !=""){
                $.ajax({
                    url: '../p_order/POProductList.php',
                    type: "get",
                    data: { keyw : $("#pono").val(), keyw3 : $("#SUPPLIERID").val(), keyw2 : keyw, keyprice: 4, keyw4 :$("#PROCODE").val() },
                    success: function (data) {

                        $('#MyModalPage').html(data);
                        $('html, body').css("cursor", "default");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.responseText + textStatus + errorThrown);
                    }
                });
            }else {
                $.ajax({
                    url: '../products/ProductList.php?keyw=' + keyw + '&keyprice=4&keyw2=' + $("#PROCODE").val(),
                    success: function (data) {

                        $('#MyModalPage').html(data);
                        $('html, body').css("cursor", "default");
                    }
                });
            }
        }


    }
    // When the user clicks anywhere outside of the modal, close it

    window.onclick = function(event) {
        if (event.target == modal) {

            modal.style.display = "none";
        }
    }
    function closeProductEntry(){

        $('#ItemEntry').hide();
        $('#ItemEntry2').hide();
        $('#itemsave').hide();
        $('#save').show();
        ProdDetailEntry(0,0); // EMPTY INPUT
    }
    function showProductEntry() {
        cmdCtr = 0;
        $('#ItemEntry').show();
        //$('#ItemEntry2').show();
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
    function updatePOProduct(custId) {
        $("#pono").val($('#'+custId +' .cpono' ).text());
        $("#PID").val(custId);
        $("#POPID").val(custId);
        $("#QTY").val($('#'+custId +' .cqty' ).text());
        $("#OLDQTY").val($('#'+custId +' .cqty' ).text());
        updateProduct(custId)
        $("#PROID").val($('#'+custId +' .cproid' ).text());

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

        $("#PURPRICE").focus();
        modal.style.display = "none";

    }


    var tooltip =  document.getElementById("toolTip");
    var tooltipmsg = "";

    function showTooltip() {
        tooltip.style.display="block";
        $('#toolTip').delay(3500).hide(0);

    }

    function qtyValidation(){

        if (parseFloat( $("#OLDQTY").val().replace(/,/g , '')) >0 && $("#pono").val() != "") {

            if (parseFloat($("#QTY").val().replace(/,/g, '')) > parseFloat($("#OLDQTY").val().replace(/,/g, ''))) {

                tooltip =  document.getElementById("toolTip");
                tooltipmsg = "";
                tooltip.style.left = 160;
                tooltip.style.top = 200;
               // alert("Qty [" + $("#QTY").val() + "] is higher than P.O. Qty. [" + $("#OLDQTY").val() + "]");
                tooltipmsg = "Qty [" + $("#QTY").val() + "] is higher than P.O. Qty. [" + $("#OLDQTY").val() + "]";
                $("#toolTip p").html(tooltipmsg);

                $("#QTY").val($("#OLDQTY").val());

                showTooltip();
            }
        }


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

        var emptyTextBoxes = $('form input.form-num').filter(function() { return this.value == ""; });
        var string = "The blank textbox ids are - \n";

        emptyTextBoxes.each(function() {
            $("#"+this.id).val("0");
            string += "\n" + this.id;
        });
        //alert(string);
        //Compute Amount

        var PURPRICE = parseFloat(document.getElementById("PURPRICE").value);
        if (document.getElementById("PURPRICE").value=="") {
            PURPRICE = 0.00;
            document.getElementById("PURPRICE").value="0";
        }
        /*
        var FOREXRATE =  parseFloat(document.getElementById("FOREXRATE").value);
        if (FOREXRATE <= 0){FOREXRATE=1; }
        var FORPURPRICE =  parseFloat(document.getElementById("FORPURPRICE").value);
        if (document.getElementById("FORPURPRICE").value=="") {
            FORPURPRICE = 0.00;
            document.getElementById("FORPURPRICE").value="0";
        }
        if (FORPURPRICE>0){
            PURPRICE = FORPURPRICE*FOREXRATE;
            document.getElementById("PURPRICE").value= PURPRICE;
        }
         */



        var qty = parseFloat(document.getElementById("QTY").value);
        if (document.getElementById("QTY").value=="") {
            qty = 0;
            document.getElementById("QTY").value="0";
        }
    //    document.getElementById("FORAMOUNT").value = (FORPURPRICE * qty) ;
        document.getElementById("AMOUNT").value = (PURPRICE * qty) ;

    }

</script>


