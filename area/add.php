
<?php
     if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="addPanel">

            <!-- /.panel-heading -->
            <div class="panel-body">


                 <form class="form-horizontal span6" action="controller.php?action=<?php echo md5('add');?>" method="POST">
                     <div class="form-group">
                         <div class="col-md-12">
                             <?php include("../theme/head_nav.php"); ?>
                         </div>
                     </div>
                     <hr>

                    <div class="form-group">
                        <div class="col-md-2">
                          <label class="col-md-4 control-label" for="Area">Area:</label>
                        </div>

                        <div class="col-md-10">
                         <input class="form-control input-sm" id="AREA" name="AREA" REQUIRED placeholder=
                            "Area" type="text" value="">
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




<?php

 //   include("list.php");
?>