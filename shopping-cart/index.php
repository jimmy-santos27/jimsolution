<link rel="shortcut icon" href="../images/solution.png">

<?php
require_once("../include/initialize.php");
$_SESSION["CARTTOTAL"] =0;

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';
$header=$view;
$title="Shopping Cart";
$ContentIcon ="fa fa-cart fa-fw";
switch ($view) {
    case 'signup' :
        $content    = 'registration.php';
        break;
    case 'transaction' :
        $content    = 'transaction.php';
        break;
    case 'login' :
        break;

    default :
        $content    = 'list.php';
        break;
}
require_once ("../theme/TemplatePublic.php");
?>
<script src="../js/sweetalert.min.js"></script>
<div class="modal fade red in" id="myModal"  >

    <div class="modal-dialog" >
        <!-- Modal content-->
        <div class="modal-content"   >

            <div class="modal-body"  id="MyModalPage"  >


            </div>
            <div class="modal-footer" style="height: 30px">
                <div class="col-lg-2"><button type="button" class="btn btn-default btn-warning" id="btnCloseModal"  data-dismiss="modal">Close</button></div>
            </div>
        </div>

    </div>
</div>
<style>

    /* The Modal (background) */

    .modal-dialog{
        left: auto;
        right: auto;
        top: auto;
        bottom: auto;

    }

    .modal-content{
        background-color: #fefefe;
        margin:auto !important;
        padding: 10px;
        border: 1px solid #888;

        overflow: hidden;
        border-radius: 5px;
    }

    /* The Close Button */
    .close {
        position: relative;
        color: #8b0000;
        font-size: 12pt;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

</style>



<script>
    var rows = 0;
    loadShoppingCart("");
    function loadShoppingCart(data){

        var localItem =  '<?php echo (isset($_SESSION["cart_item"])? json_encode($_SESSION["cart_item"]) : "");?>';
        //alert(localItem+"---------"+window.localStorage.getItem('cart_item'))
        if (typeof(window.localStorage.getItem('cart_item')) &&  localItem==""){
            localItem = window.localStorage.getItem('cart_item');
        }

        //alert(localItem+"dfadfasd")
        window.localStorage.setItem('cart_item', (localItem) );
        //alert( data );
        var jqxhr = $.ajax({
            url: "shoppingCart.php",
            data: {"myCart": localItem},
            success: function(data) {
                $("#viewCart").html( data);
            }
        });


    }

    $('input.form-num').on('change, keyup', function() {

        var currentInput = $(this).val();
        var fixedInput = currentInput.replace(/[A-Za-z!@#$%^&*()]/g, '');
        $(this).val(fixedInput);
        //console.log(fixedInput);
    });
    function pushCart(id, cmd) {

        var qty = '0';
        if (typeof($("#qty_"+id).val())){
            qty =$("#qty_"+id).val();
        }

        $.ajax({
            type: "POST",
            url: "controller.php",
            data: {"action":cmd, "code": id, "quantity": qty },

            success: function(data) {

                if (cmd=="empty"){

                    window.localStorage.removeItem('cart_item' );
                    // alert(cmd+window.localStorage.getItem('cart_item' ))
                }
                loadShoppingCart(data);
            }
        })

    }
    $(document).ready(function(e){


        $('.search-panel .dropdown-menu').find('a').click(function(e) {
            e.preventDefault();
            var oldKey = $("#search_concept").text();
            var param = $(this).attr("href").replace("#","");
            var concept = $(this).text();
            $('.search-panel span#search_concept').text(concept);
            $('.input-group #search_param').val(param);
            $(this).text(oldKey)
            rows=0;
            getDataList();
            $("#show-more-product-grid").html("");

        });

    });
    function showMoreDataList() {
        rows = rows + 8;
        getShowMoreDataList(rows)
    }
    function getShowMoreDataList(rows) {

        $.ajax({
            type: "POST",
            url: "getDataList.php",
            data: {"keyword":$("#xKey").val(), "filter": $("#search_concept").text(), "rows" : rows  },
            success: function(data) {
                $("#show-more-product-grid").html( $("#show-more-product-grid").html()+ data);
            }
        })
    }
    function getDataList() {

        $.ajax({
            type: "POST",
            url: "getDataList.php",
            data: {"keyword":$("#xKey").val(), "filter": $("#search_concept").text(), "rows" : rows  },

            success: function(data) {


                $("#product-grid").html( data);
            }
        })
    }
    function checkOut()
    {
        $('#myModal').show()
        $('#MyModalPage').empty();

        $.ajax({
            url: 'registration.php?action=checkOut',
            success: function(data) {

                $('#MyModalPage').html(data);



            }
        });

    }


    function adminLogIn()
    {
         $('#myModal').show()

        $('#MyModalPage').empty();

        $.ajax({
            url: '../login.php',
            success: function(data) {
                    $('#MyModalPage').html(data);
              }
        });

    }


    function signIn(cmd)
    {
        //  alert(cmd)
        if (cmd=="Out"){
            $('#myModal').hide();
        } else{ $('#myModal').show();}

        $('#MyModalPage').empty();

        $.ajax({
            url: 'registration.php?action=sign'+cmd,
            success: function(data) {
                //swal(data)
                if (cmd=="Out") {
                    $('#myModal').hide();

                    window.location='index.php'
                }else if (data.trim() != "SUCCESS"){

                    $('#MyModalPage').html(data);

                }




            }
        });

    }
    $("#btnCloseModal").click(function(e){

        $('#myModal').hide()
        window.location = '#';
    });

</script>


