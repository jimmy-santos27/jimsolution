
<?php
     if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }
    $autocode ="AUTOCUSTCODE";
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
                         addLegend("Customer Name", "col-md-2","");
                         addInput( "CUSTNAME", "text","","Customer Name","form-control input-sm". $autocode,"col-md-8"," REQUIRED ");
                         ?>
                     </div>
                     <div class="form-group">
                         <div class="col-md-1">
                         </div>
                         <?php
                            addLegend("Customer Code", "col-md-2","");
                            addInput( "CUSTCODE","text","","Customer Code","form-control input-sm","col-md-2"," REQUIRED ");
                         ?>
                         <div class="col-md-2" >
                             Customer Type
                         </div>
                         <div class="col-md-2">
                             <select  id="CUSTTYPE" name="CUSTTYPE" REQUIRED TITLE="Customer Type" class="selectpicker" data-show-subtext="true" data-live-search="true">
                             <option value ="1">Retail</option>
                             <option value ="2">Wholesale</option>
                             <option value ="3">Provincial</option>
                             </select>
                         </div>
                         <?php
                         addLegend("Discount", "col-md-1","");
                         addInput( "DISCOUNTPER","text","0","Discount %","form-control input-sm form-num","col-md-1","  ");
                         ?>

                     </div>
                     <div class="form-group">
                         <div class="col-md-1">
                         </div>
                         <?php
                         addLegend("Contact Person", "col-md-2","");
                         addInput( "CONTACT","text","","Contact Person","form-control input-sm","col-md-4"," REQUIRED ");
                         addLegend("Customer Since", "col-md-2","");
                         addInput( "ENTDATE","date", date("Y-m-d") ,"mm/dd/yyyy","form-control input-sm","col-md-2"," REQUIRED ");
                         ?>
                     </div>
                     <div class="form-group">
                         <div class="col-md-1">
                         </div>
                         <?php
                         addLegend("Telephone No.", "col-md-2","");
                         addInput( "PHONE","text","","Telephone No.","form-control input-sm","col-md-2"," ");
                         ?>
                         <?php
                         addLegend("Fax. No.", "col-md-1","");
                         addInput( "FAXNO","text","","Fax No.","form-control input-sm","col-md-2"," ");
                         ?>
                         <?php
                         addLegend("Mobile", "col-md-1","");
                         addInput( "MOBILENO","text","","Mobile No.","form-control input-sm","col-md-2"," required");
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


                             </select>
                         </div>
                         <div class="col-md-2">
                             <input type ='checkbox' id="ISHIDDEN" value="yes" name = "ISHIDDEN"> Hide Sales
                         </div>
                         <div class="col-md-2">
                            <input type ='checkbox' id="BADACCT" value="yes" name = "BADACCT"> Bad Account
                         </div>

                     </div>
                     <div class="form-group">
                         <div class="col-md-1">
                         </div>
                         <?php
                         addLegend("Email Address", "col-md-2","");
                         addInput( "EMAILADD","email","","Email Address","form-control input-sm","col-md-4"," ");
                         ?>
                         <?php
                         addLegend("TIN No.", "col-md-1"," ");
                         addInput( "TINNO","text","","Tax Identification No.","form-control input-sm","col-md-3"," ");
                         ?>
                     </div>


                     <div class="form-group">
                         <div class="col-md-1">
                         </div>
                         <?php
                         addLegend("Salesman", "col-md-2","" );
                         ?>

                         <div class="col-md-4">
                             <select id="SALESMANID" NAME = "SALESMANID" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                             </select>
                         </div>
                         <?php
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

                             addLegend("Balance", "col-md-1","" );
                             addInput( "BALANCE","text","0","Balance","form-control input-sm form-num","col-md-2"," readonly  ");
                             addLegend("Terms", "col-md-1","" );
                             addInput( "TERMS","TERMS","0","Terms (days)","form-control input-sm form-num","col-md-1","   ");
                             addLegend("Days", "col-md-1","" );
                         ?>
                     </div>





                     <div class="form-group">
                         <div class="col-md-1"> </div>
                         <div class="col-md-2">Remarks</div>
                         <div class="col-md-8">
                             <textarea class="form-control input-sm" id="NOTE" name="NOTE" placeholder=
                             "Remarks" title="Remarks"   value=""></textarea>
                         </div>

                     </div>


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

