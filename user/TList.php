<!-- Bootstrap Core CSS -->

<?php

$keyId  =   $_GET["id"];
$type  =   $_GET["type"];
$UserSelected =$_GET["User"];;
include("../include/initialize.php");
$MenuList = new MenuList();
$tblHeaderName ="Report Title";
if ( (intval($keyId) !=  0)) {
    if (intval($type) == 1){
        $tblHeaderName ="Menu Title";
        $cur = $MenuList->FilteredList(" where menutype <= 3 and menutype <> 0 order by menucode");
    }else{
        $cur = $MenuList->FilteredList(" where menutype in (1,3,4,5) order by groupmenu, menucode");
    }

    if (count($cur) <=0){
        echo "Sorry!!! No Access Level Available...";
    }else {
?>



    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- DataTables CSS -->
    <link href="../css/dataTables.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/datatables.min.css"/>
    <link href="../css/BSolutionTable.css" rel="stylesheet">
    <link href="../css/datatables.jsolution.css" rel="stylesheet">

    <!-- Select Box search Script -->


        <!-- jQuery -->
        <script src="../js/jquery-3.5.1.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>
        <!-- DataTables JavaScript -->


        <script src="../js/jquery.dataTables.min.js"></script>

        <script src="../js/dataTables.bootstrap.min.js"></script>

        <script src="../js/sweetalert.min.js"></script>

        <script type="text/javascript" language="javascript" src="../js/BSForm.js"></script>
        <!--
<script type="text/javascript" src="../js/bootstrap-datepicker.js" charset="UTF-8"></script>
!-->
        <!-- Select Box search Script -->

        <!-- /.panel -->
    <div class="row" style="padding: 40px; margin: 0px;">
        <span class="userSelected"><?php echo $UserSelected;?></span>
        <table id="dash-table3"    class="table table-bordered" style="width:80%;font-size:12px; margin-left:auto; margin-right:auto;" cellspacing="0" >
            <thead>
            <tr>

                <th style="text-align: center; width: 80%" >
                    <?php echo $tblHeaderName;?>
                </th>
                <th>
                    <input type="checkbox" name="chkall" id="chkall" onclick="return checkallUser('selector[]','chkall','dash-table3');"> Access
                </th>
                <?php
                    if (intval($type) == 1){
                        echo '<th>
                            <input type="checkbox" name="chkalladd" id="chkalladd" onclick="return checkallUser(\'selectoradd[]\',\'chkalladd\',\'dash-table3\');"> Add
                        </th>';
                        echo '<th>
                            <input type="checkbox" name="chkalledit" id="chkalledit" onclick="return checkallUser(\'selectoredit[]\',\'chkalledit\',\'dash-table3\');"> Edit
                        </th>';
                        echo '<th>
                            <input type="checkbox" name="chkalldelete" id="chkalldelete" onclick="return checkallUser(\'selectordelete[]\',\'chkalldelete\',\'dash-table3\');"> Delete
                        </th>';
                    }
                ?>

            </tr>
            </thead>

            <tbody >
            <?php
            $ctr = 0;
            foreach ($cur as $result) {
                $groupMenuTag ="";
                if ($result->menucode == $result->groupmenu){$groupMenuTag ="groupMenu";}
                echo '<tr class="'.$groupMenuTag.'" style="font-size: 12px; height: 20px; vertical-align: middle"  id="'.$result->Id.'">';
                    $spacer ="&nbsp;&nbsp;";
                    if ($result->menutype >1){$spacer .="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";}
                echo '<td> '.$spacer. $result->menuname.' <input type="hidden" name="MENUID[]" id="MENUID[]" value="'.$result->Id. '"/> </td>';
                echo '<td><input type="checkbox" onclick="return checkAccessUser('.$result->Id.','.$ctr.' )" name="selector[]" id="selector[]" value="'.$ctr. '"/> &nbsp;&nbsp;Yes </td> ';
                if (intval($type) == 1){
                    echo '<td><input type="checkbox" onclick="return checkAccessUser('.$result->Id.','.$ctr.' )" name="selectoradd[]" id="selectoradd[]" value="'.$ctr. '"/> &nbsp;&nbsp;Yes </td>';
                    echo '<td><input type="checkbox" onclick="return checkAccessUser('.$result->Id.','.$ctr.' )" name="selectoredit[]" id="selectoredit[]" value="'.$ctr. '"/> &nbsp;&nbsp;Yes </td>';
                    echo '<td><input type="checkbox" onclick="return checkAccessUser('.$result->Id.','.$ctr.' )" name="selectordelete[]" id="selectordelete[]" value="'.$ctr. '"/> &nbsp;&nbsp;Yes </td>';

                }
                echo '</tr>';
                $ctr ++;
            }
            ?>
            </tbody>


        </table>

        </div>
        <?php
    }

 }else{   }


?>

<style>
    .userSelected{
        border-radius: 3px;
        background-color: #02475A;
        color: white;
        padding: 10px;
    }
    #dash-table, #dash-table3 {
        border-bottom: 1px solid #e0dfe3;
        font-size: 10pt;
        width: 100%;

    }
    #dash-table th, #dash-table3 th {
        border-bottom: 1px solid #e0dfe3 !important;
        vertical-align: middle;

    }
    #dash-table tfoot td, #dash-table3 tfoot td {
        border-top: 1px solid #e0dfe3  !important;

    }
    #dash-table td, #dash-table td{
        padding-right: 3px;
        padding-left: 3px;
    }
    .groupMenu{
        background-color: #f0eee8 !important;
    }

</style>
<script>
    $('#dash-table3').dataTable({

        "ordering": false,               // Allows ordering
        "searching":false,              // Searchbox
        "paging": false,                 // Pagination
        "info": false,                  // Shows 'Showing X of X' information
        "pagingType": 'simple_numbers', // Shows Previous, page numbers & next buttons only
        "pageLength": -1,               // Defaults number of rows to display in table
        "bAutoWidth": false,
        "scrollY": 350,


    });
    function checkAccessUser(tranID, ctr){
        var isChecked = 'F';
        chkelement = document.getElementsByName("selector[]");
        if (chkelement.item(ctr).checked){
            isChecked = 'T';
        }
        var isCheckedAdd = 'F';
        var isCheckedEdit = 'F';
        var isCheckedDelete = 'F';
        var type = '<?php echo $type;?>';
        if (type =="1") {
            chkelement = document.getElementsByName("selectoradd[]");
            if (chkelement.item(ctr).checked) {
                isCheckedAdd = 'T';
            }

            chkelement = document.getElementsByName("selectoredit[]");
            if (chkelement.item(ctr).checked) {
                isCheckedEdit = 'T';
            }

            chkelement = document.getElementsByName("selectordelete[]");
            if (chkelement.item(ctr).checked) {
                isCheckedDelete = 'T';
            }
        }
        ajaxController(tranID,<?php echo $keyId;?>, type,"SingleMenu",isChecked,isCheckedAdd,isCheckedEdit,isCheckedDelete  );

    }

    function ajaxController(tranID, UID, type, action, isChecked,isCheckedAdd,isCheckedEdit,isCheckedDelete){
        var result = $.ajax({
            "url": "controller.php",
            "type": "get",
            "data": {"id": tranID, "uid": UID, "type": type,  "action": action, "status": isChecked, "chkAdd":isCheckedAdd, "chkEdit":isCheckedEdit,"chkDelete":isCheckedDelete},
            success: function (response) {
               // alert(response  );
                try{
                    results =  $.parseJSON(response);
                    if ((results.hasOwnProperty('type') &&  results['type'] != "success"  )  ) {
                        swal(results['type']);
                        results =  $.parseJSON('{"type":"error"}');
                    }else if (!results.hasOwnProperty('type')){
                        swal(response);
                        results =  $.parseJSON('{"type":"error"}');
                    }

                    return results;
                }catch (e) {
                    swal(e);
                    results =  $.parseJSON('{"type":"error"}');
                    return results ;
                }

            },
            error: function (jqXHR, textStatus, errorThrown) {
                swal(jqXHR + "<br>" + textStatus + "<br>" + errorThrown);
                console.log(textStatus, errorThrown);
                results =  $.parseJSON('{"type":"error"}');
                return results;
            }
        });
        return result;
    }
    function checkallUser(selector, chkAll, tblname )
    {
        var tranID = '<?php echo $keyId;?>';
        var type = '<?php echo $type;?>';

        var table = document.getElementById(tblname);
        var tr = table.getElementsByTagName("tr");
        var strs =" ";
        var isCheckedAll = "F";
        if(document.getElementById(chkAll).checked)
        {
            isCheckedAll = "T";
            var chkelement=document.getElementsByName(selector);
            var mel=   document.getElementsByName("MENUID[]");
            for(var i=0;i<chkelement.length;i++)
            {
                // strs = strs +" : "+ i.toString()+ tr[i].style.display +" - "+  chkelement[i].value;
                chkelement.item(i).checked = true;
                if (tr[i+1].style.display != "") {
                    chkelement.item(i).checked = false;


                }

                var mid = mel.item(i).value ;
                //alert(mid)
             //   if (type=="1") {
                    checkAccessUser(mid, i);
              //  }
            }
        }
        else
        {
            var chkelement=document.getElementsByName(selector);
            var mel=   document.getElementsByName("MENUID[]");
            for(var i=0;i<chkelement.length;i++)
            {
                var mid = mel.item(i).value ;
                chkelement.item(i).checked = false;
               // if (type=="1") {
                    checkAccessUser(mid, i);
            //    }

            }
        }



        if (type=="2"){
        //    ajaxController(tranID,"<?php echo $keyId;?>", type,"AllMenu" , isCheckedAll );
        }



    }

</script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

