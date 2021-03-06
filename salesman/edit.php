<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
  $SALESMANid = $_GET['id'];
  $Salesman = New Salesman();
  $singleSalesman = $Salesman->single_salesman($SALESMANid);

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
                        <div class="col-md-2">


                        </div>
                        <?php


                        addLegend("Salesman Name", "col-md-2","");
                        addInput( "SMANNAME","text",$singleSalesman->smanname,"Enter Salesman Name","form-control input-sm","col-md-6"," required ");
                        addInput( "SALESMANID","hidden",$singleSalesman->SALESMANID,"Enter Salesman Name","form-control input-sm","col-md-1"," hidden ");
                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                        </div>
                        <?php
                        addLegend("Salesman Code", "col-md-2","");
                        addInput( "SMANCODE","text",$singleSalesman->smancode,"Enter Salesman Code","form-control input-sm","col-md-2"," required ");

                        addLegend("Date Joined", "col-md-2", "");
                        addInput("DATEJOIN", "date",$singleSalesman->DATEJOIN,"Date Joined", "form-control input-sm", "col-md-2", " REQUIRED ");


                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                        </div>
                        <?php
                        addLegend("Salesman Rank", "col-md-2","");
                        addInput( "RANK","text",$singleSalesman->RANK,"Enter Salesman Rank","form-control input-sm","col-md-4","   ");

                        addLegend("Rate", "col-md-1", "");
                        addInput("RATE", "text", $singleSalesman->RATE, "Rate %", "form-control input-sm orm-num", "col-md-1", " ");


                        ?>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                        </div>
                        <?php
                        addLegend("Addres", "col-md-2","");
                        addInput( "ADDRESS","text",$singleSalesman->address,"Enter Address","form-control input-sm","col-md-6"," required ");
                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                        </div>
                        <?php
                        addLegend("Area", "col-md-2","");

                        ?>
                        <div class="col-md-4">
                            <select id="AREA" NAME = "AREA" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleSalesman->area;?>"><?php echo $singleSalesman->area;?></option>
                            <?PHP
                            $mydb->setQuery("SELECT * FROM `tblarea` order by AREA");
                            $cur = $mydb->loadResultList();
                            $myArray = array(array());
                            foreach ($cur as $result) {
                                ?>
                                <option value="<?php echo $result->AREA;?>" >
                                    <?php echo $result->AREA; ?>
                                </option>
                                <?PHP
                            }
                            ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                        </div>
                        <?php
                        addLegend("Contact No.", "col-md-2","");
                        addInput( "PHONE","text",$singleSalesman->PHONE,"Enter Contact No.","form-control input-sm","col-md-4"," required ");
                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                        </div>
                        <?php
                        addLegend("Email Address", "col-md-2","");
                        addInput( "EMAILADD","email",$singleSalesman->EMAILADD,"Enter Correct Email Address","form-control input-sm","col-md-4"," required ");
                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-2">
                            Remarks
                        </div>
                        <div class="col-md-6">
                            <textarea class="form-control input-sm" id="NOTE" name="NOTE" placeholder=
                            "NOTE" type="text" value=""><?php echo $singleSalesman->note;?></textarea>
                        </div>
                    </div>







                    <div class="form-group">
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-primary btn-sm col-md-6" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                        </div>
                    </div>



                </form>


                 
            </div>
        </div>
    </div>
</div>
      
