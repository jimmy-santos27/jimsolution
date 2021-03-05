<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
  $AREAID = $_GET['id'];
  $Area = New Area();
  $singleArea = $Area->single_area($AREAID);

?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="editPanel">

            <!-- /.panel-heading -->
            <div class="panel-body" >

                 <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>" method="POST">
                     <div class="form-group">
                         <div class="col-md-12">
                             <?php include("../theme/head_nav.php"); ?>
                         </div>
                     </div>
                     <hr>
                          <div class="form-group">
                            <div class="col-md-8">
                              <label class="col-md-4 control-label" for="Area ID">Area Name:</label>

                              <div class="col-md-8">
                               <input  id="AREAID" name="AREAID"   type="HIDDEN" value="<?php echo $singleArea->AREAID; ?>">
                                 <input class="form-control input-sm" id="AREA" name="AREA" placeholder=
                                    "AREA" type="text" value="<?php echo $singleArea->AREA; ?>">
                              </div>
                            </div>
                          </div>

                     <br><br><br><br><br><br><br>
                     <hr>


                              <div class="form-group">
                                  <div class="col-md-8">
                                      <label class="col-md-4 control-label" for=
                                      "idno"></label>

                                      <div class="col-md-8">
                                          <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>

                                      </div>
                                  </div>
                              </div>

                     <br>

                 </form>
            </div>
        </div>
    </div>
</div>
