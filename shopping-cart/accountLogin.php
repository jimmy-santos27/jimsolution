
<link href="../font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<div class="container">



    <div class="card bg-light">
        <article class="card-body col-lg-12" style="max-width: 500px;">
            <h4 class="card-title mt-5 text-center"><i class="fa fa-user-mds"></i>Sign In</h4>

            <form id="formLogin">


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
<!--container end.//-->

<style>
    body{
        font-size: 10pt;
        font-family: "Helvetica", "Arial", sans-serif;
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
                    alert(data)

                }
            })

        }


    });

    $('input.form-num').on('change, keyup', function() {

        var currentInput = $(this).val();
        var fixedInput = currentInput.replace(/[A-Za-z!@#$%^&*()]/g, '');
        $(this).val(fixedInput);
        //console.log(fixedInput);
    });
</script>