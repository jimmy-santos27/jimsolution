<?php
    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
  $Supplierid = $_GET['id'];
  $Supplier = New Supplier();
  $singleSupplier = $Supplier->single_supplier($Supplierid);

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
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Supplier Name", "col-md-2","");
                        addInput( "SUPPNAME", "text", $singleSupplier->suppname ,"Supllier Name","form-control input-sm","col-md-8"," REQUIRED ");
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                            <input hidden id="SUPPLIERID" name="SUPPLIERID"   type="HIDDEN" value="<?php echo $singleSupplier->SUPPLIERID; ?>">
                        </div>
                        <?php
                        addLegend("Supllier Code", "col-md-2","");
                        addInput( "SUPPCODE","text",$singleSupplier->suppcode,"Supllier Code","form-control input-sm","col-md-2"," REQUIRED ");
                        addLegend(" ", "col-md-2","");
                        addLegend("Supllier Since", "col-md-2","");
                        addInput( "DATEJOIN","date", $singleSupplier->DATEJOIN ,"mm/dd/yyyy","form-control input-sm","col-md-2"," REQUIRED ");
                        ?>


                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Contact Person", "col-md-2","");
                        addInput( "CONTACT","text",$singleSupplier->CONTACT,"Contact Person","form-control input-sm","col-md-4","   ");
                        addLegend("Position", "col-md-1","");
                        addInput( "POSITION","text",$singleSupplier->POSITION,"Position","form-control input-sm","col-md-3","   ");
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Telephone No.", "col-md-2","");
                        addInput( "PHONE","text",$singleSupplier->PHONE,"Telephone No.","form-control input-sm","col-md-8"," ");
                        ?>

                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>

                        <?php
                        addLegend("Fax. No.", "col-md-2","");
                        addInput( "FAXNO","text",$singleSupplier->FAXNO,"Fax No.","form-control input-sm","col-md-3"," ");
                        ?>
                        <?php
                        addLegend("Mobile No.", "col-md-2","");
                        addInput( "MOBILENO","text",$singleSupplier->MOBILENO,"Mobile No.","form-control input-sm","col-md-3"," required");
                        ?>
                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Address", "col-md-2","");
                        addInput( "ADDRESS","text",$singleSupplier->address,"Address","form-control input-sm","col-md-8"," required ");
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
                            <option value="<?php echo$singleSupplier->area;?>"><?php echo$singleSupplier->area;?></option>
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
                        <div class="col-md-2">
                            <input type ='checkbox' id="ISHIDDEN" value="yes" <?php if ($singleSupplier->ISHIDDEN=='yes'){echo "checked"; };?> name = "ISHIDDEN"> Hide Purchase
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-md-1">
                        </div>
                        <?php
                        addLegend("Email Address", "col-md-2","");
                        addInput( "EMAILADD","email",$singleSupplier->EMAILADD,"Email Address","form-control input-sm","col-md-4"," ");

                        addLegend("Status", "col-md-1","" );
                        ?>

                        <div class="col-md-3">
                            <select id="STATNAME" NAME = "STATNAME" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo$singleSupplier->STATNAME;?>"><?php echo$singleSupplier->STATNAME;?></option>
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
                        addInput( "CREDITLIMIT","text",$singleSupplier->creditlimit,"Credit Limit","form-control input-sm form-num","col-md-2","   ");


                        addLegend("Terms", "col-md-1","" );
                        addInput( "TERMS","TERMS",$singleSupplier->TERMS,"Terms (days)","form-control input-sm form-num","col-md-1","   ");
                        addLegend("Currency", "col-md-1","" );
                        ?>

                        <div class="col-md-2">
                            <select id="FOREX" NAME = "FOREX" x-placement="FOREX" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo$singleSupplier->FOREX;?>"><?php echo$singleSupplier->FOREX;?></option>
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
                             "Remarks" title="Remarks"   value=""><?php echo$singleSupplier->note;?></textarea>
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
