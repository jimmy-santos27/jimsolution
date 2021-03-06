<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
  $ID = $_GET['id'];
  $STATUSTYPE = New Area();
  $singleSTATUSTYPE = $STATUSTYPE->GetSingleRecord($ID,"tblaccountstatus");


?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="editPanel">

            <!-- /.panel-heading -->
            <div class="panel-body">

                 <form class="form-horizontal span6"action="controller.php?action=<?php echo md5('edit');?>" method="POST">
                     <div class="form-group">
                         <div class="col-md-12">
                             <?php include("../theme/head_nav.php"); ?>
                         </div>
                     </div>
                     <hr>

                     <div class="form-group">
                         <div class="col-md-2">
                         </div>
                         <?php
                         addLegend("Status Type", "col-md-2","");
                         addInput( "STATNAME","text",$singleSTATUSTYPE->STATNAME,"Status Type","form-control input-sm","col-md-4"," HIDD ");
                         addInput( "ID","hidden",$singleSTATUSTYPE->Id,"ID","form-control input-sm","col-md-4"," hidden ");

                         ?>

                     </div>




                     <div class="form-group">
                         <div class="col-md-4">
                         </div>
                         <div class="col-md-8">
                             <button class="btn btn-primary btn-sm col-md-4" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>

                         </div>

                     </div>




                 </form>
            </div>
        </div>
    </div>
</div>
