<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
  $ID = $_GET['id'];
  $COUNTRY = New Area();
  $singleCOUNTRY = $COUNTRY->GetSingleRecord($ID,"tblcountry");


?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="editPanel">

            <!-- /.panel-heading -->
            <div class="panel-body">

                 <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>" method="POST">
                     <div class="form-group">
                         <div class="col-md-12">
                             <?php include("../theme/head_nav.php"); ?>
                         </div>
                     </div>
                     <hr>
                          <div class="form-group">
                            <div class="col-md-8">
                              <label class="col-md-4 control-label" for="Country ID">Country :</label>

                              <div class="col-md-8">
                               <input  id="ID" name="ID"   type="HIDDEN" value="<?php echo $singleCOUNTRY->Id; ?>">
                                 <input class="form-control input-sm" id="COUNTRY" name="COUNTRY" placeholder=
                                    "Country" type="text" value="<?php echo $singleCOUNTRY->COUNTRY; ?>">
                              </div>
                            </div>
                          </div>
                         <div class="form-group">
                             <div class="col-md-8">
                                 <label class="col-md-4 control-label" for="Country">Currency:</label>
                                 <div class="col-md-8">
                                     <input class="form-control input-sm" id="FOREX" name="FOREX" REQUIRED placeholder=
                                     "Currency" type="text" value="<?php echo $singleCOUNTRY->FOREX; ?>">
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
