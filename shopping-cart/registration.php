<link href="../font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="style.css" type="text/css" rel="stylesheet" />



<?php
require_once("../include/initialize.php");

$isSignUp="none";
$isSignIn="none";
$action = (isset($_REQUEST['action']) && $_REQUEST['action'])? $_REQUEST['action']:"";
$action2 = $action;
if ($action == "signCheckout" && !isset($_SESSION['ACCOUNTUSER'])  ){
    $action = "signUp";
}else{
    if ($action == "signIn2"  ){
        $action = "signIn";
    }
}
//echo $action;
switch ($action){
    case "signOut":
        if (isset($_SESSION['ACCOUNTUSER'])){ unset($_SESSION['ACCOUNTUSER']); };
        if (isset($_SESSION['ACCOUNTID'])){  unset($_SESSION['ACCOUNTID']); };
        echo "SUCCESS";
        break;
    case "signIn":
        $isSignIn="block";
        ?>
        <div class="container" id="signInPanel" style="display: <?php echo $isSignIn;?> ">



            <div class="card bg-light">
                <article class="card-body col-lg-12" style="max-width: 500px;">
                    <h4 class="card-title mt-5 text-center"><i class="fa fa-user-mds"></i>Sign In</h4>

                    <form id="formSignIn">


                        <div class="form-group input-group">
                            <div  class="input-group-btn">
                                <i class="fa fa-envelope btn btn-default dropdown-toggle-split"></i>
                            </div>
                            <input name="email" id = "email" required class="form-control" placeholder="Email address" type="email">
                        </div>

                        <div class="form-group input-group">

                            <div  class="input-group-btn">
                                <i class="fa fa-lock btn btn-default dropdown-toggle-split"></i>
                            </div>
                            <input name = "password" id="password" class="form-control" required placeholder="Enter your Password" type="password">
                        </div> <!-- form-group// -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Sign In  </button>
                        </div> <!-- form-group// -->

                    </form>
                </article>
            </div> <!-- card.// -->

        </div>
        <?php
        break;
    case "signCheckout":
        $isSignIn="block";
        ?>
        <div class="container" id="CheckOutPanel" style="display: block ">
            <div class="card bg-light">

                <article class="card-body col-lg-12" style="max-width: 500px;">
                    <div class="txt-heading text-center">  <i class="fa fa-cart-plus"> </i> Checkout - Cart</div>
                    <div class="divider-text"></div>
                    <form id="formCheckout" enctype="multipart/form-data"  >

                        <div class="form-group input-group">
                            <div  class="input-group-btn">
                                <p class="btn btn-default dropdown-toggle-split">Total Amount</p>

                            </div>
                            <input name="TOTAL" id = "TOTAL" value ="<?php echo number_format($_SESSION["CARTTOTAL"],2);?>" required class="form-control numericCol" placeholder="Total Amount"  readonly type="text">
                        </div>

                        <div class="form-group input-group">

                            <div  class="input-group-btn">
                                <p class="btn btn-default dropdown-toggle-split">Amount Paid</p>
                            </div>
                            <input name="PAIDAMT" id = "PAIDAMT" value ="<?php echo number_format($_SESSION["CARTTOTAL"],2);?>" readonly class="form-control form-num numericCol"  placeholder="Amount Paid"  type="text">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">

                            <div  class="input-group-btn">
                                <p class="btn btn-default dropdown-toggle-split">Payment Mode</p>
                            </div>
                            <select id="PAYMODE" name ="PAYMODE" class="form-control" style="height: 34px"  >
                                <option style="padding:10px; ">Cash On Delivery</option>
                                <option>Bank Deposit</option>
                                <option>Cash Transfer</option>
                                <option>Other Methods</option>
                            </select>
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <input type="file" required class="custom-file-input" id="file1" name="file1">
                            <label class="custom-file-label" style="height: 34px" for="customFile">Upload Proof Of Payment</label>

                        </div> <!-- form-group// -->

                        <div>
                            <i class="fa fa-sticky-note-o" style="margin: 10px;"> Notes </i>

                            <textarea class="form-control" name="NOTE" id="NOTE" cols="40" rows="5"></textarea>

                        </div>
                         <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Finished  </button>

                        </div> <!-- form-group// -->

                    </form>
                </article>
            </div> <!-- card.// -->
            <script>
                $(".custom-file-input").on("change", function() {
                    var fileName = $(this).val().split("\\").pop();
                    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            </script>
        </div>
        <?php
        break;
    case "signUp":
        $isSignUp="block";
        ?>
        <div class="container" id="signUpPanel" style="display: <?php echo $isSignUp;?> " >



            <div class="card bg-light">
                <article class="card-body col-lg-12" style="max-width: 500px;">
                    <h4 class="card-title mt-5 text-center">Create Account</h4>

                    <form id="formRegistration">
                        <div class="form-group input-group">

                            <div  class="input-group-btn">
                                <i class="fa fa-user btn btn-default dropdown-toggle-split"></i>
                            </div>
                            <input name="fullname" id="fullname"  required class="form-control " placeholder="Full name" type="text">

                        </div>

                        <div class="form-group input-group">
                            <div  class="input-group-btn">
                                <i class="fa fa-envelope btn btn-default dropdown-toggle-split"></i>
                            </div>
                            <input name="email" id = "email" required class="form-control" placeholder="Email address" type="email">
                        </div>
                        <div class="form-group input-group">
                            <div  class="input-group-btn">
                                <i class="fa fa-phone btn btn-default dropdown-toggle-split"></i>
                            </div>

                            <input name="phone" id="phone"  required class="form-control  col-lg-12 form-num" placeholder="Phone number" type="text">
                        </div>
                        <div class="form-group input-group">
                            <div  class="input-group-btn">
                                <i class="fa fa-truck btn btn-default dropdown-toggle-split"></i>
                            </div>
                            <input name="address"  id="address"  class="form-control" required placeholder="Delivery Address" type="address">
                        </div>
                        <div class="form-group input-group">
                            <div  class="input-group-btn">
                                <i class="fa fa-map-marker btn btn-default dropdown-toggle-split"></i>
                            </div>

                            <input name="area" id = "area" required class="form-control" placeholder="Town/City and Province" type="address">
                        </div>

                        <div class="form-group input-group">

                            <div  class="input-group-btn">
                                <i class="fa fa-lock btn btn-default dropdown-toggle-split"></i>
                            </div>
                            <input name = "password" id="password" class="form-control" required placeholder="Create password (min 8 digits/characters)" type="password">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <div  class="input-group-btn">
                                <i class="fa fa-user-secret btn btn-default dropdown-toggle-split"></i>
                            </div>
                            <input name = "password2" id="password2"  class="form-control" required placeholder="Repeat password" type="password">
                        </div> <!-- form-group// -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Create Account  </button>
                        </div> <!-- form-group// -->
                        <p class="text-center">Have an account? <a href="javascript:void(0)" onclick="signIn('In2')" >Sign In</a> </p>
                    </form>
                </article>
            </div> <!-- card.// -->

        </div>
        <?php
        break;
    case "signProfile":

    if (isset($_SESSION['ACCOUNTID']) && $_SESSION['ACCOUNTID'] !="" ){

        $mydb->setQuery("select * from tblcustomeronline where OCID = ".$_SESSION['ACCOUNTID']." limit 1");
        $result = $mydb->loadSingleResult();
        echo '<div class="card bg-light">';
        echo '<article class="card-body col-lg-12" style="max-width: 500px;">';
        echo '<h4 class="card-title mt-5 text-left"><i class="fa fa-id-card-o"></i> Profile</h4>';
        echo '<hr>';
        echo "<div class ='col-lg-3 colprofile'>Name : </div><div class ='col-lg-9 colprofile'>".$result->OCNAME . "</div>";
        echo "<div class ='col-lg-3 colprofile'>Email : </div><div class ='col-lg-9 colprofile'>".$result->EMAILADD. "</div>";
        echo "<div class ='col-lg-3 colprofile'>Address : </div><div class ='col-lg-9 colprofile'>".$result->ADDRESS. "</div>";
        echo "<div class ='col-lg-3 colprofile'>Area : </div><div class ='col-lg-9 colprofile'> ".$result->AREA . "</div>";
        echo "<div class ='col-lg-3 colprofile'>Phone : </div><div class ='col-lg-9 colprofile'>".$result->PHONE . "</div>";
        echo "<div class ='col-lg-3 colprofile'>Date : </div><div class ='col-lg-9 colprofile'>".date_format(  date_create($result->ENTDATE),"m/d/Y") . "</div>";
        echo '</article>';
        echo '</div>';

    }
    break;
    case "viewTranDetail":

        if (isset($_SESSION['ACCOUNTID']) && $_SESSION['ACCOUNTID'] !="" ){

            $mydb->setQuery("select * from tblorderdetl where SOID = ".$_REQUEST['ROWID']." ");
            $cur = $mydb->loadResultList();

            echo '<div class="card bg-light">';
            echo '<article class="card-body col-lg-12" style="max-width: 500px;">';
            echo '<h4 class="card-title mt-5 text-left"><i class="fa fa-shopping-bag"></i> ID:'.$_REQUEST['ROWID'].' - Transaction Details</h4>';
            echo '<hr>';
            echo '<div class="table-wrapper-scroll-y my-custom-scrollbar">';

            echo '<table id="trandetail" class="table table-bordered table-striped mb-0" >';
            echo '<thead><tr><th>ID</th><th>Product</th><th>Qty.</th><th>Price</th><th>Amount</th></tr>';
            foreach( $cur as $result ){
                echo '<tr>';
                echo '<td>'. $result->SOPID .'</td>';
                echo '<td>'. $result->PRONAME .'</td>';
                echo '<td class="numericCol">'. number_format( $result->QTY,0) .'</td>';
                echo '<td class="numericCol">'. number_format( $result->PROPRICE,2) .'</td>';
                echo '<td class="numericCol">'. number_format( $result->AMOUNT,2) .'</td>';
                echo '</tr>';
            }
            echo '</table>';
            echo '</div>';
            echo '</article>';
            echo '</div>';

        }
    break;

    default:
        break;

}

?>

<script src="../js/sweetalert.min.js"></script>

<style>
    .my-custom-scrollbar {
        position: relative;
        height: 380px;
        overflow: auto;
    }
    .table-wrapper-scroll-y {
        display: block;
    }
    #trandetail tr td{
        height: 30px;
        font-family: Helvetica, Arial, clean, sans-serif;
        vertical-align: middle;
        font-size: 10pt;
    }
    #trandetail thead th{
        height: 30px;
        font-family: Helvetica, Arial, clean, sans-serif;
        font-size: 10pt;
        font-weight: bold;
        background-color: #4e555b;
        color: white;
    }
    #trandetail{
        height: 300px; overflow-y: auto
    }
    body{
        font-size: 10pt;
        font-family: "Helvetica", "Arial", sans-serif;
    }

    .colprofile{
        font-family: "Helvetica", "Arial", sans-serif;
        font-size: 11pt;
        margin-bottom: 20px;
        color: #3a87ad;
    }
    .divider-text {
        position: relative;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .divider-text span {
        padding: 7px;
        font-size: 10pt;
        position: relative;
        z-index: 2;
    }
    .divider-text:after {
        content: "";
        position: absolute;
        width: 100%;
        border-bottom: 1px solid #ddd;
        top: 55%;
        left: 0;
        z-index: 1;
    }

    .btn-facebook {
        background-color: #405D9D;
        color: #fff;
    }
    .btn-twitter {
        background-color: #42AEEC;
        color: #fff;
    }
</style>

<script>
    var mainAction = "<?php echo $action2;?>";
    var formRegistration = $('#formRegistration');
    formRegistration.on('submit', function(ev){
        ev.preventDefault();

        if ( ($("#password").val() != $("#password2").val()) || ($("#password").val().length < 8 )) {

            swal("Invalid Password!", "Minimum of 8 and you must match your repeat password!!!", "error");
            $("#password").val("");
            $("#password2").val("");
            $("#password").focus()
            return false;

        } else{


            $.ajax({

                url: "controller.php?action=newAccount",
                data: formRegistration.serialize() ,

                success: function(data) {
                    if (data=="SUCCESS"){
                        signIn("Checkout");
                    }else{
                        swal("Error Sign Up... ", data,"warning");
                    }

                }
            })

        }


    });

    var formSignIn = $('#formSignIn');
    formSignIn.on('submit', function(ev){
        ev.preventDefault();

        $.ajax({

            url: "controller.php?action=signIn",
            data: formSignIn.serialize() ,

            success: function(data) {

                if (data=="SUCCESS"){
                    //alert(data + mainAction)
                    if (mainAction =="signIn2"){
                        signIn("Checkout");

                    }else {
                        window.location = 'index.php';
                    }
                }else{
                    swal("Error Signing In... ", data,"warning");
                }

            }
        })


    });


    var form = $("#formCheckout").closest("form");
    var formCheckout = $('#formCheckout');
    formCheckout.on('submit', function(ev){


        ev.preventDefault();


        $.ajax({
            url: "controller.php?action=checkOut",
            type: "POST",
            data: new FormData(form[0]),
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {

                if (data=="SUCCESS"){
                    swal("Checkout", "Monitor your Order through your Transaction Page...", "success")
                        .then(function(e){
                        window.location = 'index.php';
                    });


                }else{
                    swal("Error... ", data,"warning");
                }
            }
        });



    });


    function regAction(cmd){
        if (cmd =="signIn"){
            $("#signInPanel").show();
            $("#signUpPanel").hide();
        }
    }

    $('input.form-num').on('change, keyup', function() {

        var currentInput = $(this).val();
        var fixedInput = currentInput.replace(/[A-Za-z!@#$%^&*()]/g, '');
        $(this).val(fixedInput);
        //console.log(fixedInput);
    });

</script>