<link rel="shortcut icon" href="../images/solution.png">
<?php
require_once("../include/initialize.php");
//checkAdmin();
	# code...
if(!isset($_SESSION['USERID'])){
	redirect(web_root."index.php");
}

    $view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

	$header=$view;
	$title="Products";
    $ContentIcon ="fa fa-bars fa-fw";
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
	$title="Products";
		$content    = 'list.php';
	}


   
 
require_once ("../theme/templates.php");
?>

<script>
    $("#CARBRAND").selectpicker("render");
    $("#CARMAKE").selectpicker("render");
    $("#CATEGORIES").selectpicker("render");
    $("#ITEMBRAND").selectpicker("render");
    $("#ITEMMAKE").selectpicker("render");
    $("#COLOR").selectpicker("render");
    $("#COUNTRY").selectpicker("render");
    $("#STOCKTYPE").selectpicker("render");
    $("#YEARMODEL").selectpicker("render");
    $("#SUPPNAME").selectpicker("render");


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(300)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    $(document).ready(function(){


        $('#addform input').change(function(){
            updateProname();
            updateProvincialPrice()
        });
        $('#addform select').change(function(){
            updateProname();

        });
        $('#editform input').change(function(){
             updateProvincialPrice()
        });
        $("#suppcode").change(function(){

            $("#suppname").val($("#suppcode option:selected").text().trim());
        });

    });
    function updateProvincialPrice() {
        if (parseInt( $('#PROMARGIN').val()) >0 && parseInt( $('#PROPRICE').val()) >0  )
        {
            $('#PPROPRICE').val( (parseFloat( $('#PROPRICE').val())  + (parseFloat( $('#PROPRICE').val()) * ( parseFloat($('#PROMARGIN').val())/100  ) )).toFixed(2));
        }else{
          //  $('#PPROPRICE').val($('#PROPRICE').val());
        }
    }
    function updateProname(){
        var proname = ""
        if ($('#CARBRAND').val() != "")
        {
            proname = $('#CARBRAND').val();
        }
        if ($('#CARMAKE').val() != "")
        {
            proname = proname.trim() + " " +$('#CARMAKE').val();
        }

        if ($('#ITEMMAKE').val() != "")
        {
            proname = proname.trim() + " " +$('#ITEMMAKE').val();
        }

        if ($('#YEARMODEL').val() != "")
        {
            if ($('#YRSMODEL').val() == ""){
                $('#YRSMODEL').val($('#YEARMODEL').val());
            }
            proname = proname.trim() + " " +$('#YRSMODEL').val();
        } else if ($('#YRSMODEL').val() != "")
        {
            proname = proname.trim() + " " +$('#YRSMODEL').val();
        }


        if ($('#OTHERNAME').val() != "")
        {
            proname = proname.trim() + " " +$('#OTHERNAME').val();
        }


        if ($('#CATEGORIES').val() != "")
        {
            proname = proname.trim() + " " +$('#CATEGORIES').val();
        }

        if ($('#SIDES').val() != "")
        {
            proname = proname.trim() + " " +$('#SIDES').val();
        }

        if ($('#COUNTRY').val() != "")
        {
            proname = proname.trim() + " " +$('#COUNTRY').val();
        }

        if ($('#ITEMBRAND').val() != "")
        {
            proname = proname.trim() + " " +$('#ITEMBRAND').val();
        }

        if ($('#COLOR').val() != "")
        {
            proname = proname.trim() + " " +$('#COLOR').val();
        }
        if ($('#VOLTS').val() != "" && $('#VOLTS').val() != "0")
        {
            proname = proname.trim() + " " +$('#VOLTS').val()+"V";
        }
        if ($('#WATTS').val() != "" && $('#WATTS').val() != "0")
        {
            proname = proname.trim() + " " +$('#WATTS').val()+"W";
        }
        $('#PROCODE').val($('#PROCODE').val().toUpperCase());
        $('#PRONAME').val(proname.trim());



    }
</script>