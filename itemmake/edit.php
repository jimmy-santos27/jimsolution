<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
  $ID = $_GET['id'];
  $ITEMMAKE = New Area();
  $singleITEMMAKE = $ITEMMAKE->GetSingleRecord($ID,"tblitemmake");


?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="editPanel">

            <!-- /.panel-heading -->
            <div class="panel-body">

                 <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>"  method="POST">
                     <div class="form-group">
                         <div class="col-md-12">
                             <?php include("../theme/head_nav.php"); ?>
                         </div>
                     </div>
                     <hr>
                          <div class="form-group">
                            <div class="col-md-8">
                              <label class="col-md-4 control-label" for="Item Make ID">Item Make :</label>

                              <div class="col-md-8">
                               <input  id="ID" name="ID"   type="HIDDEN" value="<?php echo $singleITEMMAKE->Id; ?>">
                                 <input class="form-control input-sm" id="ITEMMAKE" name="ITEMMAKE" placeholder=
                                    "Item Make" type="text" value="<?php echo $singleITEMMAKE->ITEMMAKE; ?>">
                              </div>
                            </div>
                          </div>




                              <div class="form-group">
                                  <div class="col-md-8">
                                      <label class="col-md-4 control-label" for=
                                      "idno"></label>

                                      <div class="col-md-8">
                                          <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>

                                      </div>
                                  </div>
                              </div>



                 </form>
            </div>
        </div>
    </div>
</div>
