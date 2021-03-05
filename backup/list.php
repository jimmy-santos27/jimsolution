<?php
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}

?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">

            <!-- /.panel-heading -->
            <div class="panel-body" style="margin: 50px">

                <div class="row" >
                    <div class="col-md-12">
                        <label class="col-md-2 control-label" for="BackUp">BackUp Name</label>
                        <div class="col-md-6">

                            <input  class="form-control input-sm" id = "backupname" required NAME ="backupname" VALUE="BackUp">

                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <label class="col-md-2 control-label" for="BackUp">  </label>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-sm"  name="BackUp" onclick="myFunction()"   >
                                <span class="fa fa-save fw-fa"></span> BackUp / Download Database
                            </button>


                        </div>
                    </div>
                </div>


                <br> <br> <br> <br>

                <script>
                    function myFunction() {
                        if (document.getElementById("backupname").value != ""){
                            window.open("backup.php?backupname="+document.getElementById("backupname").value);
                        }

                    }
                </script>
            </div>
        </div>
    </div>
</div>
