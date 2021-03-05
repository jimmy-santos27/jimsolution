<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
  $CATEGID = $_GET['id'];
  $Category = New Category();
  $singleCategory = $Category->single_category($CATEGID);

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
                              <label class="col-md-4 control-label" for="Category ID">Category Name:</label>

                              <div class="col-md-8">
                               <input  id="CATEGID" name="CATEGID"   type="HIDDEN" value="<?php echo $singleCategory->CATEGID; ?>">
                                 <input class="form-control input-sm" id="CATEGORIES" name="CATEGORIES" placeholder=
                                    "CATEGORIES" type="text" value="<?php echo $singleCategory->CATEGORIES; ?>">
                              </div>
                            </div>
                          </div>

                              <div hidden class="form-group">
                                  <div class="col-md-8">
                                      <label class="col-md-4 control-label" for="Category Code">Category Code:</label>
                                      <div class="col-md-8">
                                          <input class="form-control input-sm" id="CATCODE" name="CATCODE"  placeholder=
                                          "Category Code" type="text" value="<?php echo $singleCategory->CATCODE; ?>">
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
  