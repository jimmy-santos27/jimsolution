
<?php
     if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
    $autocode =" AUTOSUPPCODE";
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
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Supplier Name", "col-md-2","");
                        addInput( "SUPPNAME", "text","","Supllier Name","form-control input-sm". $autocode,"col-md-8"," REQUIRED ");
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Supllier Code", "col-md-2","");
                        addInput( "SUPPCODE","text","","Supllier Code","form-control input-sm","col-md-2"," REQUIRED ");
                        addLegend(" ", "col-md-2","");
                        addLegend("Supllier Since", "col-md-2","");
                        addInput( "DATEJOIN","date", date("Y-m-d") ,"mm/dd/yyyy","form-control input-sm","col-md-2"," REQUIRED ");
                        ?>


                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Contact Person", "col-md-2","");
                        addInput( "CONTACT","text","","Contact Person","form-control input-sm","col-md-4","   ");
                        addLegend("Position", "col-md-1","");
                        addInput( "POSITION","text","","Position","form-control input-sm","col-md-3","   ");
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Telephone No.", "col-md-2","");
                        addInput( "PHONE","text","","Telephone No.","form-control input-sm","col-md-8"," ");
                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>

                        <?php
                        addLegend("Fax. No.", "col-md-2","");
                        addInput( "FAXNO","text","","Fax No.","form-control input-sm","col-md-3"," ");
                        ?>
                        <?php
                        addLegend("Mobile No.", "col-md-2","");
                        addInput( "MOBILENO","text","","Mobile No.","form-control input-sm","col-md-3"," required");
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Address", "col-md-2","");
                        addInput( "ADDRESS","text","","Address","form-control input-sm","col-md-8"," required ");
                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Area", "col-md-2","");
                        ?>
                        <div class="col-md-4">
                            <select id="AREA" NAME = "AREA" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option> </option>
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
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Email Address", "col-md-2","");
                        addInput( "EMAILADD","email","","Email Address","form-control input-sm","col-md-4"," ");

                        addLegend("Status", "col-md-1","" );
                        ?>

                        <div class="col-md-3">
                            <select id="STATNAME" NAME = "STATNAME" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="">Select Account Status </option>
                            <?PHP
                            $mydb->setQuery("SELECT * FROM `tblaccountstatus` order by STATNAME");
                            $cur = $mydb->loadResultList();
                            $myArray = array(array());
                            foreach ($cur as $result) {
                                ?>
                                <option value="<?php echo $result->STATNAME;?>" >
                                    <?php echo $result->STATNAME; ?>
                                </option>
                                <?PHP
                            }
                            ?>
                            </select>
                        </div>
                    </div>




                    <hr>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Credit Limit", "col-md-2","" );
                        addInput( "CREDITLIMIT","text","0","Credit Limit","form-control input-sm form-num","col-md-2","   ");


                        addLegend("Terms", "col-md-1","" );
                        addInput( "TERMS","TERMS","0","Terms (days)","form-control input-sm form-num","col-md-1","   ");
                        addLegend("Currency", "col-md-1","" );
                        ?>

                        <div class="col-md-2">
                            <select id="FOREX" NAME = "FOREX" x-placement="FOREX" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="PHP">PHP</option>
                            <?PHP
                            $mydb->setQuery("SELECT * FROM `tblcountry` order by FOREX");
                            $cur = $mydb->loadResultList();
                            $myArray = array(array());
                            foreach ($cur as $result) {
                                ?>
                                <option value="<?php echo $result->FOREX;?>" >
                                    <?php echo $result->FOREX; ?>
                                </option>
                                <?PHP
                            }
                            ?>
                            </select>
                        </div>


                    </div>

                    <hr>



                    <div class="form-group">
                        <div class="col-md-1"> </div>
                        <div class="col-md-2">Remarks</div>
                        <div class="col-md-8">
                             <textarea class="form-control input-sm" id="NOTE" name="NOTE" placeholder=
                             "Remarks" title="Remarks"   value=""></textarea>
                        </div>

                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-3"> </div>
                        <div class="col-md-8">
                            <button class="btn btn-primary btn-sm col-md-9" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                        </div>

                    </div>



                </form>



            </div>
        </div>
    </div>
</div>

