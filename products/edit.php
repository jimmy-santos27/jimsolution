<?php  

    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }


  $PROID = $_GET['id'];
  $product = New Product();
  $singleproduct = $product->single_product($PROID);
  $AClass = new Area();
?>



<div class="row">
    <form id="editform" class="form-horizontal span6" action="controller.php?action=<?php echo md5('edit');?>" method="POST" enctype="multipart/form-data"    >
        <div class="col-lg-12">
            <div class="panel panel-default" id="editPanel">


                <!-- /.panel-heading -->
                <div class="panel-body" STYLE="color: #2e6da4;  vertical-align: middle;  ">
                    <div class="form-group">
                        <div class="col-md-12">
                            <?php include("../theme/head_nav.php"); ?>
                        </div>
                    </div>
                    <hr>

                    <div class="form-group">
                        <div class="col-md-2">
                            Item Name:
                        </div>
                        <div class="col-md-10">
                            <input  id="PROID" name="PROID"   type="hidden" value="<?php echo $singleproduct->PROID; ?>">
                            <input class="form-control input-sm" id="PRONAME" name="PRONAME" placeholder=
                            "Product Name" type="text" value="<?php echo $singleproduct->PRONAME; ?>" REQUIRED>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Item No.:
                        </div>

                        <div class="col-md-2">
                            <input class="form-control input-sm" id="PROCODE" name="PROCODE" placeholder=
                            "Product Code" type="text" value="<?php echo $singleproduct->PROCODE; ?>" REQUIRED>
                        </div>

                        <div class="col-md-2">
                            Date Started:
                        </div>

                        <div class="col-md-2">
                            <input class="form-control input-sm" id="entdate" name="entdate" REQUIRED placeholder=
                            "mm/dd/yyyy"  type="date" style="width: 133px"  value="<?php echo $singleproduct->entdate; ?>">
                        </div>
                        <div class="col-sm-1">
                            Aging Year:
                        </div>
                        <div class="col-sm-1">
                            <input class="form-control input-sm form-num" id="AGING"  name="AGING" placeholder=
                            "Year" type="text" value="<?php echo $singleproduct->AGING; ?>"  REQUIRED>
                        </div>
                        <div class="col-md-2">
                            <input <?php if($singleproduct->INACTIVE=="on"){ echo 'checked';} ?> type="checkbox" id="INACTIVE" name="INACTIVE"> Inactive
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Car Brand:
                        </div>
                        <div class="col-md-4">
                            <select id="CARBRAND" NAME = "CARBRAND" x-placement="Car Brand" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->CARBRAND; ?>"><?php echo $singleproduct->CARBRAND; ?></option>

                            </select>
                        </div>

                        <div class="col-md-2">
                            Car Make:
                        </div>
                        <div class="col-md-4">
                            <select id="CARMAKE" NAME = "CARMAKE" x-placement="Car Make" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->CARMAKE; ?>"><?php echo $singleproduct->CARMAKE; ?></option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Item Make:
                        </div>
                        <div class="col-md-4">
                            <select id="ITEMMAKE" NAME = "ITEMMAKE" x-placement="Item Make" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->ITEMMAKE; ?>"><?php echo $singleproduct->ITEMMAKE; ?></option>

                            </select>
                        </div>

                        <div class="col-sm-2">
                            Year Model:
                        </div>
                        <div class="col-lg-2">
                            <select id="YEARMODEL" NAME = "YEARMODEL" x-placement="Year Model" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->YEARMODEL; ?>"><?php echo $singleproduct->YEARMODEL; ?></option>
                            <?PHP
                            $curYear = date("Y");
                            while ($curYear >= 1950){

                                ?>
                                <option value="<?php echo $curYear;?>" >
                                    <?php echo $curYear; ?>
                                </option>
                                <?PHP
                                $curYear =$curYear-1;
                            }
                            ?>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm" id="YRSMODEL" name="YRSMODEL" placeholder=
                            "Years Range" type="text" value="<?php echo $singleproduct->YRSMODEL; ?>"  >
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Other Name:
                        </div>
                        <div class="col-md-10">
                            <input class="form-control input-sm" id="OTHERNAME" name="OTHERNAME" placeholder=
                            "Other Item Name" type="text" value="<?php echo $singleproduct->OTHERNAME; ?>"  >
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Categories:
                        </div>
                        <div class="col-md-4">
                            <select id="CATEGORIES" NAME = "CATEGORIES" x-placement="Category" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->CATEGORIES; ?>"><?php echo $singleproduct->CATEGORIES; ?></option>

                            </select>
                        </div>

                        <div class="col-sm-2">
                            Side/Position:
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control input-sm" id="SIDES"  name="SIDES" placeholder=
                            "Sides/Position " type="text" value="<?php echo $singleproduct->SIDES; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Made In:
                        </div>
                        <div class="col-md-4">
                            <select id="COUNTRY" NAME = "COUNTRY" x-placement="Made In" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->COUNTRY; ?>"><?php echo $singleproduct->COUNTRY; ?></option>

                            </select>
                        </div>

                        <div class="col-sm-2">
                            Item Brand:
                        </div>
                        <div class="col-sm-2">
                            <select id="ITEMBRAND" NAME = "ITEMBRAND" x-placement="Item Brand" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->ITEMBRAND; ?>"><?php echo $singleproduct->ITEMBRAND; ?></option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Color:
                        </div>
                        <div class="col-md-4">
                            <select id="COLOR" NAME = "COLOR" x-placement="Color" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->COLOR; ?>"><?php echo $singleproduct->COLOR; ?></option>

                            </select>
                        </div>

                        <div class="col-sm-1">
                            Volts:
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control input-sm form-num" id="VOLTS"  name="VOLTS" placeholder=
                            "Volts" type="text" value="<?php echo $singleproduct->VOLTS; ?>"  REQUIRED>
                        </div>
                        <div class="col-sm-1">
                            Watts:
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control input-sm form-num" id="WATTS"  name="WATTS" placeholder=
                            "Wattage" type="text" value="<?php echo $singleproduct->WATTS; ?>"  REQUIRED>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Stock Type:
                        </div>
                        <div class="col-md-4">
                            <select id="STOCKTYPE" NAME = "STOCKTYPE" x-placement="Stock Type" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->STOCKTYPE; ?>"><?php echo $singleproduct->STOCKTYPE; ?></option>

                            </select>
                        </div>

                        <div class="col-sm-1">
                            Locator:
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control input-sm" id="LOCATION"  name="LOCATION" placeholder=
                            "Locator" type="text" value="<?php echo $singleproduct->LOCATION; ?>">
                        </div>
                        <div class="col-sm-1">
                            Qty/Box:
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control input-sm form-num" id="QTYPERBOX"  name="QTYPERBOX" placeholder=
                            "Qty Per Box" type="text" value="<?php echo $singleproduct->QTYPERBOX; ?>"  REQUIRED>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Other Details:
                        </div>
                        <div class="col-md-10">
                            <input class="form-control input-sm" id="PRODESC" name="PRODESC" placeholder=
                            "Product Other Information" type="text" value="<?php echo $singleproduct->PRODESC; ?>"  >
                        </div>

                    </div>


                    <hr>
                    <div class="form-group">
                        <div class="col-md-2">
                            Supplier Item:
                        </div>
                        <div class="col-md-4">
                            <input class="form-control input-sm" id="SUPPITEM" name="SUPPITEM" placeholder=
                            "Supplier Item No." type="text" value="<?php echo $singleproduct->SUPPITEM; ?>"  >
                        </div>
                        <div class="col-md-1">
                            Supplier:
                        </div>
                        <div class="col-md-5">
                            <input class="form-control input-sm" id="suppname" name="suppname" placeholder=
                            "Supplier Name" type="hidden" value="<?php echo $singleproduct->suppname; ?>"  hidden >


                            <select id="SUPPLIERID" NAME = "SUPPLIERID" x-placement="Supplier" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="<?php echo $singleproduct->SUPPLIERID; ?>"><?php echo $singleproduct->suppname; ?></option>

                            </select>
                        </div>
                    </div>


                    <hr>
                    <div class="form-group">
                        <div class="col-md-2">
                            Qty On-Hand:
                        </div>
                        <div class="col-md-2">
                            <input readonly class="form-control input-sm form-num" id="PROQTY" name="PROQTY" placeholder=
                            "Qty Available" type="text" value="<?php echo $singleproduct->PROQTY; ?>"   >
                        </div>
                        <div class="col-md-1">
                            Unit:
                        </div>
                        <div class="col-md-2">
                            <input  class="form-control input-sm  " id="UNIT" name="UNIT" placeholder=
                            "Unit of Measure" title = "Unit of Measure" type="text" value="<?php echo $singleproduct->UNIT; ?>"   >
                        </div>
                        <div class="col-md-2">
                            ReOrder/Min Qty:
                        </div>
                        <div class="col-md-1">
                            <input class="form-control input-sm form-num" id="REORDER" name="REORDER" placeholder=
                            "Reorder/Minimum Qty" type="text" value="<?php echo $singleproduct->REORDER; ?>"  REQUIRED >
                        </div>

                        <div class="col-md-2">
                            Max Qty:
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="MAXQTY" name="MAXQTY" placeholder=
                            "Maximum Qty" type="text" value="<?php echo $singleproduct->MAXQTY; ?>"   REQUIRED>
                        </div>


                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-2">
                            Purchase Cost:
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="PURPRICE" name="PURPRICE" placeholder=
                            "Purchase Cost In PHP" type="text" value="<?php echo $singleproduct->PURPRICE; ?>"  REQUIRED >
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="FORPURPRICE" name="FORPURPRICE" placeholder=
                            "Foreign Cost" type="text" value="<?php echo $singleproduct->FORPURPRICE; ?>"  REQUIRED >
                        </div>
                        <div class="col-md-2">
                            <select id="FOREX" NAME = "FOREX" x-placement="FOREX" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value="PHP">PHP</option>
                            <option value="USD">USD</option>
                            <option value="HKD">HKD</option>
                            <option value="NTD">NTD</option>
                            <option value="SND">SND</option>
                            <option value="EUR">EUR</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            Ave. Cost:
                        </div>
                        <div class="col-md-2">
                            <input READONLY class="form-control input-sm form-num" id="AVGCOST" name="AVGCOST" placeholder=
                            "Average Cost" type="text" value="<?php echo $singleproduct->AVGCOST; ?>"  REQUIRED >
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Floor Price
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="FLOORPRICE" name="FLOORPRICE" placeholder=
                            "Floor Price" type="text" value="<?php echo $singleproduct->FLOORPRICE; ?>"  REQUIRED >
                        </div>
                        <div class="col-md-2">
                            Floor Rate
                        </div>
                        <div class="col-md-1">
                            <input class="form-control input-sm form-num" id="FLOORRATE" name="FLOORRATE" placeholder=
                            "%" type="text" value="<?php echo $singleproduct->FLOORRATE; ?>"  REQUIRED >
                        </div>
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            Salesman Rate
                        </div>
                        <div class="col-md-1">
                            <input class="form-control input-sm form-num" id="SMANRATE" name="SMANRATE" placeholder=
                            "%" type="text" title="Salesman Rate"  value="<?php echo $singleproduct->SMANRATE; ?>"  REQUIRED >
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-2">
                            Retail Price:
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="PROPRICE" name="PROPRICE" placeholder=
                            "Retail Price" type="text"  value="<?php echo $singleproduct->PROPRICE; ?>"  REQUIRED >
                        </div>
                        <div class="col-md-1">
                            Wholesale:
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="WPROPRICE" name="WPROPRICE" placeholder=
                            "Wholesale Price" type="text" value="<?php echo $singleproduct->WPROPRICE; ?>" REQUIRED  >
                        </div>
                        <div class="col-md-1" STYLE="text-align: right">

                        </div>

                        <div class="col-md-1">
                            Provincial:
                        </div>
                        <div class="col-md-1">
                            <input class="form-control input-sm form-num" id="PROMARGIN" name="PROMARGIN" placeholder=
                            "%" type="text" value="<?php echo $singleproduct->PROMARGIN; ?>" title="Provincial Rate"  REQUIRED >
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="PPROPRICE" name="PPROPRICE" placeholder=
                            "Provincial Price" type="text" value="<?php echo $singleproduct->PPROPRICE; ?>" title="Provincial Price" REQUIRED  >
                        </div>

                    </div>

                    <hr>
                    <div class="form-group">

                        <div class="col-md-12">
                            <div class="col-md-2">
                                Upload Image:
                            </div>

                            <div class="col-md-4">
                                <input type="file" onchange="readURL(this);" name="IMAGES" accept="image/png, .jpeg, .jpg, image/gif, .bmp" value="" id="IMAGES"/>
                            </div>
                            <div class="col-md-4 btn-group">

                                <button class="btn  btn-primary btn-sm" name="upload" type="submit" ><span class="fa fa-upload fw-fa"></span>Upload File</button>

                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-4" >
                                <img id="blah" src="<?php echo $singleproduct->IMAGES;?>"  style="border: solid 1px; border-color: #e7e7ff; width: 300px; height: 200px;" />
                            </div>
                            <div class="col-md-6" >
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                Remarks
                            </div>
                            <div class="col-md-10" >
                                <textarea style="height: 60px;"  class="form-control input-sm"  id="REMARKS" name="REMARKS"  PLACEHOLDER="Remarks"><?php echo $singleproduct->REMARKS;?></textarea>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12">
                            <label class="col-md-2" align = "right"for=
                            "image"> </label>

                            <div class="col-md-12">

                                <button class="btn  btn-primary btn-sm col-md-8" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                            </div>
                        </div>
                    </div>

                    <br>




                </div>


            </div>
        </div>


    </form>
</div>