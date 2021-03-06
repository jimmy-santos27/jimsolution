<?php
   if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

      // $autonum = New Autonumber();
      // $result = $autonum->single_autonumber(4);
$AClass = new Area();
?>
<div class="row">
    <form id="addform" class="form-horizontal span6" action="controller.php?action=<?php echo md5('add');?>" method="POST" enctype="multipart/form-data"    >
        <div class="col-lg-12">
            <div class="panel panel-default"  id="addPanel">


                <!-- /.panel-heading -->
                <div class="panel-body" STYLE="color: #2e6da4;  vertical-align: middle;   ">
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
                            <input class="form-control input-sm" id="PRONAME" name="PRONAME" placeholder=
                            "Product Name" type="text" value="" REQUIRED>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Item No.:
                        </div>

                        <div class="col-md-2">
                            <input class="form-control input-sm" id="PROCODE" name="PROCODE" placeholder=
                            "Product Code" type="text" value="" REQUIRED>
                        </div>

                        <div class="col-md-2">
                            Date Started:
                        </div>

                        <div class="col-md-2">
                            <input class="form-control input-sm" id="entdate" name="entdate" REQUIRED placeholder=
                            "mm/dd/yyyy"  type="date" style="width: 133px"  value="<?php echo date('Y-m-d');?>">
                        </div>
                        <div class="col-sm-2">
                            Aging Year:
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control input-sm form-num" id="AGING"  name="AGING" placeholder=
                            "Year" type="text" value="0"  REQUIRED>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Car Brand:
                        </div>
                        <div class="col-md-4">
                            <select id="CARBRAND" NAME = "CARBRAND" x-placement="Car Brand" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value=" ">-- CAR BRAND -- </option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            Car Make:
                        </div>
                        <div class="col-md-4">
                            <select id="CARMAKE" NAME = "CARMAKE" x-placement="Car Make" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value=" ">-- CAR MAKE -- </option>

                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Item Make:
                        </div>
                        <div class="col-md-4">
                            <select id="ITEMMAKE" NAME = "ITEMMAKE" x-placement="Item Make" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value=" ">-- ITEM MAKE -- </option>
                            </select>
                        </div>

                        <div class="col-sm-2">
                            Year Model:
                        </div>
                        <div class="col-sm-2">
                            <select id="YEARMODEL" NAME = "YEARMODEL" x-placement="Year Model" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

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
                            "Years Range" type="text" value=""  >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Other Name:
                        </div>
                        <div class="col-md-10">
                            <input class="form-control input-sm" id="OTHERNAME" name="OTHERNAME" placeholder=
                            "Other Item Name" type="text" value=""  >
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Categories:
                        </div>
                        <div class="col-md-4">
                            <select id="CATEGORIES" NAME = "CATEGORIES" x-placement="Category" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value=" ">-- CATEGORIES -- </option>
                            </select>
                        </div>

                        <div class="col-sm-2">
                            Side/Position:
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control input-sm" id="SIDES"  name="SIDES" placeholder=
                            "Sides/Position " type="text" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Made In:
                        </div>
                        <div class="col-md-4">
                            <select id="COUNTRY" NAME = "COUNTRY" x-placement="Made In" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value=" ">-- COUNTRY -- </option>
                            </select>
                        </div>

                        <div class="col-sm-2">
                            Item Brand:
                        </div>
                        <div class="col-sm-4">
                            <select id="ITEMBRAND" NAME = "ITEMBRAND" x-placement="Item Brand" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value=" ">-- ITEM BRAND -- </option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Color:
                        </div>
                        <div class="col-md-4">
                            <select id="COLOR" NAME = "COLOR" x-placement="Color" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value=" ">-- COLOR -- </option>
                            </select>
                        </div>

                        <div class="col-sm-1">
                            Volts:
                        </div>
                        <div class="col-sm-1">
                            <input class="form-control input-sm form-num" id="VOLTS"  name="VOLTS" placeholder=
                            "Volts" type="text" value="0"   >
                        </div>
                        <div class="col-sm-1">
                            Watts:
                        </div>
                        <div class="col-sm-1">
                            <input class="form-control input-sm form-num" id="WATTS"  name="WATTS" placeholder=
                            "Wattage" type="text" value="0"   >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Stock Type:
                        </div>
                        <div class="col-md-4">
                            <select id="STOCKTYPE" NAME = "STOCKTYPE" x-placement="Stock Type" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                            <option value=" ">-- STOCK TYPE -- </option>
                            </select>
                        </div>

                        <div class="col-sm-1">
                            Locator:
                        </div>
                        <div class="col-sm-2">
                            <input class="form-control input-sm" id="LOCATION"  name="LOCATION" placeholder=
                            "Locator" type="text" value="">
                        </div>
                        <div class="col-sm-1">
                            Qty/Box:
                        </div>
                        <div class="col-sm-1">
                            <input class="form-control input-sm form-num" id="QTYPERBOX"  name="QTYPERBOX" placeholder=
                            "Qty Per Box" type="text" value="0"   >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Other Details:
                        </div>
                        <div class="col-md-10">
                            <input class="form-control input-sm" id="PRODESC" name="PRODESC" placeholder=
                            "Product Other Information" type="text" value=""  >
                        </div>

                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-2">
                            Supplier Item:
                        </div>
                        <div class="col-md-4">
                            <input class="form-control input-sm" id="SUPPITEM" name="SUPPITEM" placeholder=
                            "Supplier Item No." type="text" value=""  >
                        </div>
                        <div class="col-md-1">
                            Supplier:
                        </div>
                        <div class="col-md-5">
                            <input class="form-control input-sm" id="suppname" name="suppname" placeholder=
                            "Supplier Name" type="hidden" value=""    >


                            <select id="SUPPLIERID" NAME = "SUPPLIERID" x-placement="Supplier" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                             <option value=" ">-- SUPPLIER -- </option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-2">
                            Qty On-Hand:
                        </div>
                        <div class="col-md-2">
                            <input  class="form-control input-sm form-num" id="PROQTY" name="PROQTY" placeholder=
                            "Qty Available" type="text" value="0"   >
                        </div>
                        <div class="col-md-1">
                            Unit:
                        </div>
                        <div class="col-md-2">
                            <input  class="form-control input-sm  " id="UNIT" name="UNIT" placeholder=
                            "Unit of Measure" title = "Unit of Measure" type="text" value=""   >
                        </div>
                        <div class="col-md-1">
                            Min Qty
                        </div>
                        <div class="col-md-1">
                            <input class="form-control input-sm form-num" id="REORDER" name="REORDER" placeholder=
                            "Reorder/Minimum Qty" type="text" value="0"   >
                        </div>

                        <div class="col-md-1">
                            Max Qty
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="MAXQTY" name="MAXQTY" placeholder=
                            "Maximum Qty" type="text" value="0"    >
                        </div>


                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-2">
                            Purchase Cost:
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="PURPRICE" name="PURPRICE" placeholder=
                            "Purchase Cost In PHP" type="text" value="0"    >
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="FORPURPRICE" name="FORPURPRICE" placeholder=
                            "Foreign Cost" type="text" value="0"   >
                        </div>
                        <div class="col-md-2">
                            <select id="FOREX" NAME = "FOREX" x-placement="FOREX" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                                <option value="PHP">PHP</option>
                                <?PHP
                                $cur = $AClass->getRecordList("tblcountry","FOREX");
                                $myArray = array(array());
                                foreach ($cur as $result) {
                                    ?>
                                    <option value="<?php echo $result->selValue;?>" >
                                        <?php echo $result->selValue; ?>
                                    </option>
                                    <?PHP
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2" style="text-align: right">
                            Ave. Cost:
                        </div>
                        <div class="col-md-2">
                            <input   class="form-control input-sm form-num" id="AVGCOST" name="AVGCOST" placeholder=
                            "Average Cost" type="text" value="0"   >
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-2">
                            Floor Price
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="FLOORPRICE" name="FLOORPRICE" placeholder=
                            "Floor Price" type="text" value="0"   >
                        </div>
                        <div class="col-md-1">
                            <input class="form-control input-sm form-num" id="FLOORRATE" name="FLOORRATE" placeholder=
                            "%" type="text" title="Floor Rate" value="30"   >
                        </div>
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-2" style="text-align: right">
                            Salesman Rate
                        </div>
                        <div class="col-md-1">
                            <input class="form-control input-sm form-num" id="SMANRATE" name="SMANRATE" placeholder=
                            "%" type="text" title="Salesman Rate"  value="0"  >
                        </div>
                    </div>

                    <hr>
                    <div class="form-group">
                        <div class="col-md-2">
                            Retail Price:
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="PROPRICE" name="PROPRICE" placeholder=
                            "Retail Price" type="text" value="0"   >
                        </div>
                        <div class="col-md-1">
                            Wholesale:
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="WPROPRICE" name="WPROPRICE" placeholder=
                            "Wholesale Price" type="text" value="0"   >
                        </div>
                        <div class="col-md-1" STYLE="text-align: right">

                        </div>

                        <div class="col-md-1">
                            Provincial:
                        </div>
                        <div class="col-md-1">
                            <input class="form-control input-sm form-num" id="PROMARGIN" name="PROMARGIN" placeholder=
                            "%" type="text" value="7" TITLE="Provincial Rate/Margin"  >
                        </div>
                        <div class="col-md-2">
                            <input class="form-control input-sm form-num" id="PPROPRICE" name="PPROPRICE" placeholder=
                            "Provincial Price" title="Provincial Price" type="text" value="0"    >
                        </div>

                    </div>

                    <hr>
                    <div class="form-group">

                        <div class="col-md-12">
                            <div class="col-md-2">
                                Upload Image:
                            </div>

                            <div class="col-md-8">
                                <input type="file" onchange="readURL(this);" name="IMAGES" accept="image/png, .jpeg, .jpg, image/gif, .bmp" value="" id="IMAGES"/>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-4" >
                                <img id="blah" src="#"  style="border: solid 1px; border-color: #e7e7ff" />
                            </div>
                            <div class="col-md-6" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                Remarks
                            </div>
                            <div class="col-md-10" >
                                <textarea style="height: 60px;" class="form-control input-sm"  id="REMARKS" name="REMARKS" PLACEHOLDER="Remarks"></textarea>
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
                    <bR>
          

                </div>

            </div>


        </div>



    </form>
</div>
      

<script>

</script>