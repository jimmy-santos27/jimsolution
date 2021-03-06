<?php
	 if (!isset($_SESSION['U_ROLE'])) {
      redirect(web_root."index.php");
     }
    $ReportFlds = array(array());

    date_default_timezone_set("Asia/Taipei");
    $dtASOF =date("Y-m-d");
    $dtFROM =date("Y-m-d");
    $dtTO   =date("Y-m-d");
    if (isset($_POST["fromdate"])) {
        $dtFROM =   $_POST["fromdate"];
        $dtTO   =   $_POST["todate"];

        $_SESSION['fromdate'] = $_POST["fromdate"];
        $_SESSION['todate'] = $_POST["todate"];


    }else {

        $dtFROM =   $_SESSION['fromdate'];
        $dtTO   =   $_SESSION['todate'];

    }
?>


    <div class="row"  style="padding: 0px; margin-left: 9px" >
        <div class="col-md-12" style="padding: 0px; "  id="pageNav">

            <!-- Nav tabs -->
            <ul id="tab-list" class="nav nav-tabs" role="tablist">
                <li class="active"> <a href="#tab1" role="tab" data-toggle="tab"><span><i class="fa fa-print fa-fw"> </i> &nbsp; Report &nbsp; </span> </span></a></li>
            </ul>

            <!-- Tab panes -->
            <div id="tab-content" class="tab-content" style="  width: 100%; height:580px; background-color:#fff;  ">
                <div class="tab-pane fade in active" id="tab1">

                    <form id ="FORM1" class="form-horizontal span6" action="<?=  $_SERVER["PHP_SELF"]; ?>" method="POST"   >
                        <div class="panel-body">
                            <div class="col-lg-3">
                                <p style="font-weight: bold; color: #2e6da4; border-bottom: 1px solid #e7e7ff ">Report List</p>
                                <div class="col-lg-12" id="repList" >
                                    <div class="table-responsive" id="repDiv1">
                                        <table  id="REPTAB1" class="table table-hover">

                                            <?php

                                            //$query = "SELECT * FROM tblmenu WHERE menutype = 1 or menutype = 5";
                                            //$mydb->setQuery($query);
                                            $MenuList = new MenuList();
                                            $cur = $MenuList->getMenu($_SESSION["USERID"], 2,"1,5","  ");

                                            //$cur = $myMenu->FilteredList(" WHERE menutype = 1 or menutype = 5 order by groupmenu, menucode ");
                                            $i = 0;
                                            foreach ($cur as $result) {
                                                $ReportFlds =  $ReportFlds + array(
                                                        $result->menucode =>  array(
                                                            "reportTitle" => $result->menuname,
                                                            "tblName" => $result->tblName,
                                                            "wAsof" => $result->asof,
                                                            "wDtRange" => $result->dtrange,
                                                            "wByGroup" => $result->bygroup,
                                                            "wSorting" => $result->sorting,
                                                            "wFunction" => $result->func_name,
                                                            "wLink" => $result->link,
                                                            "strQuery"=> $result->queryString,
                                                            "DTColumns"=> $result->dtColumns,
                                                            "DTColumnHeader"=> $result->dtColumnHeader
                                                        ));

                                                echo "<tr id='rep".$result->menucode."'  ><td style='padding: 3px' > <i class='".$result->icon."'></i> ".$result->menuname ."</td></tr>";

                                                $mcode = $result->menucode;
                                               // $query = "SELECT * FROM tblmenu WHERE groupmenu = $result->menucode and menutype = 4";

                                              //  $mydb->setQuery($query);
                                                //$cur2 = $mydb->loadResultList();
                                                $cur2 = $MenuList->getMenu($_SESSION["USERID"], 2,"4"," and groupmenu = $result->menucode  ");
                                               // $cur2 = $myMenu->FilteredList(" WHERE groupmenu = $result->menucode and menutype = 4 order by groupmenu, menucode ");
                                                $ulvar = "";
                                                foreach ($cur2 as $result2) {
                                                    echo "<tr id='rep".$result2->menucode."'   >  <td  style='padding: 3px'> &nbsp;&nbsp;&nbsp; <i class='".$result2->icon."'></i> ".$result2->menuname ."</td></tr>";
                                                    $ReportFlds =  $ReportFlds + array(
                                                            $result2->menucode =>  array(
                                                                "reportTitle" => $result2->menuname,
                                                                "tblName" => $result2->tblName,
                                                                "wAsof" => $result2->asof,
                                                                "wDtRange" => $result2->dtrange,
                                                                "wByGroup" => $result2->bygroup,
                                                                "wSorting" => $result2->sorting,
                                                                "wFunction" => $result2->func_name,
                                                                "wdtFunction" => $result2->dtFunction,
                                                                "wLink" => $result2->link
                                                            ));

                                                }

                                            }
                                            $_SESSION["ReportTbl"] = $ReportFlds;
                                            ?>
                                            <input  hidden  id="reportTitle" name="reportTitle" value ="">
                                            <input hidden  id="reportID" name="reportID" value ="">
                                            <input hidden  id="wAsof" name="wAsof" value ="">
                                            <input hidden  id="wDtRange" name="wDtRange" value ="">
                                            <input hidden  id="wByGroup" name="wByGroup" value ="">
                                            <input hidden  id="wSorting" name="reportTitle" value ="">
                                        </table>
                                    </div>




                                </div>
                            </div>

                            <div class="col-lg-5" id="productFilter">
                                <p style="font-weight: bold; color: #2e6da4; border-bottom: 1px solid #e7e7ff "> Product Options</p>

                                <div class="form-group">

                                    <div class="col-md-3">
                                        Categories:
                                    </div>
                                    <div class="col-md-9">
                                        <select id="CATEGORIES" NAME = "CATEGORIES" x-placement="Category" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                        </select>
                                    </div>
                                    <div  hidden class="col-md-3"> Car Brand: </div>
                                    <div  hidden class="col-md-9">
                                        <select id="CARBRAND" NAME = "CARBRAND" x-placement="Car Brand" class="selectpicker" data-show-subtext="true" data-live-search="true"" ></select>
                                    </div>
                                    <div hidden class="col-md-3"> Car Make: </div>
                                    <div hidden class="col-md-9">
                                        <select id="CARMAKE" NAME = "CARMAKE" x-placement="Car Make" class="selectpicker" data-show-subtext="true" data-live-search="true"" ></select>
                                    </div>
                                    <div hidden class="col-md-3">
                                        Item Make:
                                    </div>
                                    <div hidden class="col-md-9">
                                        <select id="ITEMMAKE" NAME = "ITEMMAKE" x-placement="Item Make" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                        </select>
                                    </div>

                                    <div class="col-sm-3">
                                        Item Brand:
                                    </div>
                                    <div class="col-sm-9">
                                        <select id="ITEMBRAND" NAME = "ITEMBRAND" x-placement="Item Brand" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                        </select>
                                    </div>


                                    <div hidden class="col-md-3">
                                        Made In:
                                    </div>
                                    <div hidden class="col-md-9">
                                        <select id="COUNTRY" NAME = "COUNTRY" x-placement="Made In" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                                        <
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        Color:
                                    </div>
                                    <div class="col-md-9">
                                        <select id="COLOR" NAME = "COLOR" x-placement="Color" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                        </select>
                                    </div>
                                    <div hidden class="col-md-3">
                                        Stock Type:
                                    </div>
                                    <div hidden class="col-md-9">
                                        <select id="STOCKTYPE" NAME = "STOCKTYPE" x-placement="Stock Type" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                        </select>
                                    </div>


                                    <div hidden class="col-sm-3"> Aging Year: </div>
                                    <div hidden class="col-sm-3">
                                        <input class="form-control input-sm form-num" id="AGING"  name="AGING" placeholder=
                                        "Year" type="text" value="0"  REQUIRED>
                                    </div>
                                    <div hidden class="col-sm-3">
                                        Model Year:
                                    </div>
                                    <div hidden class="col-sm-3">
                                        <select id="YEARMODEL" NAME = "YEARMODEL" x-placement="Year Model" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                                        <option value="">-- Year -</option>
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


                                    <div hidden class="col-sm-3">
                                        Side/Position:
                                    </div>
                                    <div hidden class="col-sm-3">
                                        <input class="form-control input-sm" id="POSITION"  name="POSITION" placeholder=
                                        "Sides/Position " type="text" value="">
                                    </div>
                                    <div hidden class="col-sm-3">
                                        Locator:
                                    </div>
                                    <div hidden class="col-sm-3">
                                        <input class="form-control input-sm" id="LOCATION"  name="LOCATION" placeholder=
                                        "Locator" type="text" value="">
                                    </div>

                                    <div hidden class="col-sm-3">
                                        Volts:
                                    </div>
                                    <div hidden class="col-sm-3">
                                        <input class="form-control input-sm form-num" id="VOLTS"  name="VOLTS" placeholder=
                                        "Volts" type="text" value="0"  REQUIRED>
                                    </div>
                                    <div hidden class="col-sm-3">
                                        Watts:
                                    </div>
                                    <div hidden class="col-sm-3">
                                        <input class="form-control input-sm form-num" id="WATTS"  name="WATTS" placeholder=
                                        "Wattage" type="text" value="0"  REQUIRED>
                                    </div>
                                    <div class="col-sm-3">
                                        Unit Measure:
                                    </div>
                                    <div class="col-sm-3">
                                        <input class="form-control input-sm " id="UNIT"  name="UNIT" placeholder=
                                        "UNIT" type="text" value=""  REQUIRED>
                                    </div>


                                </div>





                            </div>

                            <div hidden class="col-lg-3" id="PageFields2">
                                <p style="font-weight: bold; color: #2e6da4; border-bottom: 1px solid #e7e7ff ">
                                    <input type="checkbox" checked name="chkall" id="chkall" onclick="return repFldSelect('selector[]','chkall','REPTAB2');">
                                    All Collumns</p>
                                <div  class="col-lg-12" id="repFields" >

                                </div>
                            </div>

                            <div <?php echo $hidden;?> class="col-lg-4" id="PageConditions">
                                <p style="font-weight: bold; color: #2e6da4; border-bottom: 1px solid #e7e7ff ">
                                    Filtered By</p>
                                <div  class="col-lg-12" id="repFilter" style="margin-bottom: 20px" >

                                    <div  id="bySupplier" class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                Supplier Name
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control input-sm" id="suppname" name="suppname" placeholder=
                                                "Supplier Name" type="hidden" value=""    >


                                                <select id="SUPPLIERID" NAME = "SUPPLIERID" x-placement="Supplier" class="selectpicker" data-show-subtext="true" data-live-search="true"" >


                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div  id="byCustomer" class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                Customer Name
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control input-sm" id="custname" name="custname" placeholder=
                                                "Customer Name" type="hidden" value=""    >


                                                <select required id="CUSTOMERID" NAME = "CUSTOMERID" x-placement="Customer" class="selectpicker with-ajax" data-show-subtext="true" data-live-search="true" >

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div  id="bySalesman" class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                Salesman Name
                                            </div>
                                            <div class="col-md-12">
                                                <input class="form-control input-sm" id="smanname" name="smanname" placeholder=
                                                "Salesman Name" type="hidden" value=""    >


                                                <select id="SALESMANID" NAME = "SALESMANID" x-placement="Salesman" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div   id="byArea" class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                Area
                                            </div>
                                            <div class="col-md-12">



                                                <select id="AREA" NAME = "AREA" x-placement="Area" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div   id="byStatus" class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                Status
                                            </div>
                                            <div class="col-md-12">

                                                <select id="STATNAME" NAME = "STATNAME" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div   id="bySProduct" class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                Product
                                            </div>
                                            <div class="col-md-12">

                                                <select id="PROID" NAME = "PROID" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div   id="byCurrency" class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                Currency
                                            </div>
                                            <div class="col-md-12">

                                                <select id="FOREX" NAME = "FOREX" class="selectpicker" data-show-subtext="true" data-live-search="true"" >

                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div   id="byCustomerType" class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-12">
                                                Type
                                            </div>
                                            <div class="col-md-12">

                                                <select id="CUSTTYPE" NAME = "CUSTTYPE" class="selectpicker" data-show-subtext="true" data-live-search="true"" >
                                                    <option value="0">-- Select Type --</option>
                                                    <option value="1">Retail</option>
                                                    <option value="2">Wholesale</option>
                                                    <option value="3">Provincial</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dtRange" class="form-group" style="padding-bottom:10px; border-bottom: 1px solid #e7e7ff">
                                        <div class="col-md-6" >
                                            <div class="col-md-12">
                                                Date From
                                            </div>
                                            <div class="col-md-12">

                                                <input class="form-control input-sm" id="fromdate" name="fromdate" REQUIRED placeholder="mm/dd/yyyy"  type="date" style="width: 133px"  value="<?php echo $dtFROM;?>">

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                            To
                                            </div>
                                            <div class="col-md-12">
                                            <input class="form-control input-sm" id="todate" name="todate" REQUIRED placeholder="mm/dd/yyyy"  type="date" style="width: 133px"  value="<?php echo$dtTO;?>">

                                            </div>
                                        </div>


                                    </div>

                                    <div id="dtAsof" class="form-group">
                                        <div class="col-md-6">
                                            <div class="col-md-12">
                                                As Of
                                            </div>
                                            <div class="col-md-12">

                                                <input class="form-control input-sm" id="asofDate" name="asofDate" REQUIRED placeholder="mm/dd/yyyy"  type="date" style="width: 133px"  value="<?php echo $dtTO;?>">
                                            </div>
                                        </div>
                                    </div>




                                </div>

                                <div class="col-lg-12" style="margin-bottom: 150px; ">

                                    <button  style="width: 100%" id="btn-add-tab" type="button" class="btn btn-primary ">Generate Report</button>

                                    <button style="width: 100%; display: none" type="hidden" class="btn btn-default" name="submit" id="submit">Generate Report</button>


                                </div>
                            </div>



                        </div>



                    </form>


                </div>
            </div>
        </div>
    </div>

            <!-- /.panel-heading -->






<?php
$ModalTitle="";
require_once ("../theme/ReportModal.php");
?>







