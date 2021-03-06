<link rel="shortcut icon" href="../images/solution.png">
<link href="../css/datatables.jsolution.css" rel="stylesheet">
<?php
require_once("../include/initialize.php");
//checkAdmin();
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
date_default_timezone_set("Asia/Taipei");

$ID = $_GET['id'];
$PrintFormat = $_GET['format'];
$Customer = new Customer();
$HeaderTbl = new SalesOrderHead();
$DetailTbl = new SalesOrderDetl();
 
$rCounter = 0;


?>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" id="addPanel">

            <!-- /.panel-heading -->
            <div id ="printContent" class="panel-body" style="font-weight: normal">

				
                <?php




                $datatabledom="t";
                $datatablerows=100;
                $datatablesort="false";

                $singleSR = $HeaderTbl->single_invoice($ID);
                $singleCust = $Customer->single_customer($singleSR->CUSTOMERID);
                $cur = $DetailTbl->listofSalesPerID($ID);
                $tableHeader =  array(
                    array("label"=>"Qty.", "w"=>"6%","fldname"=>"QTY","TYPE"=>'I'),
                    array("label"=>"Unit", "w"=>"8%","fldname"=>"UNIT","TYPE"=>'C'),
                    array("label"=>"Code", "w"=>"10%","fldname"=>"PROCODE","TYPE"=>'C'),
                    array("label"=>"Description", "w"=>"46%","fldname"=>"PRONAME","TYPE"=>'C'),
                    array("label"=>"Unit Price", "w"=>"10%","fldname"=>"PROPRICE","TYPE"=>'N'),
                    array("label"=>"Discount", "w"=>"10%","fldname"=>"DISCAMT","TYPE"=>'N'),
                    array("label"=>"Amount", "w"=>"10%","fldname"=>"AMOUNT","TYPE"=>'N'));
                $sNo = $singleSR->INVOICENO;

                $TranTotal = $singleSR->TOTAL;
                if ($PrintFormat ==2  ) {
                    if ($singleSR->DRNO!=""){$sNo = $singleSR->DRNO;}
                    // DELIVERY RECEIPT
                    $ptitle = "ORDER SLIP";
                    $setReceiptTitle = "<div style='margin-left: 40%; margin-right: 40%; padding:5px; font-size: large;
                                        font-weight:bold; position: absolute; top:30px; border:1px solid #000; z-index: 111'>". $ptitle."</div>";
                    $ReceiptHeader = array(

                        array("label"=>" ", "name"=>"" ,"nw"=>"50%",
                            "label2"=>" ", "name2"=> "" ,"nw2"=>"25%",
                            "label3"=>"No.:",  "name3"=> $sNo ,"nw3"=>"25%"),
                        array("label"=>" ", "name"=> "","nw"=>"50%",
                            "label2"=>" ", "name2"=> "","nw2"=>"25%",
                            "label3"=>" ",  "name3"=> $singleCust->area,"nw3"=>"25%"),
                        array("label"=>"Customer Name:", "name"=> $singleSR->CUSTNAME,"nw"=>"50%",
                            "label2"=>"", "name2"=> "","nw2"=>"25%",
                            "label3"=>"Date:",  "name3"=>$singleSR->DRDATE,"nw3"=>"25%"),
                        array("label"=>"Salesman:", "name"=> $singleSR->SMANNAME,"nw"=>"50%",
                            "label2"=>" ", "name2"=> "","nw2"=>"25%",
                            "label3"=>"Reference:",  "name3"=> $singleSR->REFNO,"nw3"=>"25%"),
                        array("label"=>"Address:", "name"=> $singleCust->address,"nw"=>"50%",
                            "label2"=>" ", "name2"=> "","nw2"=>"25%",
                            "label3"=>"Terms:",  "name3"=> $singleSR->TERMS,"nw3"=>"25%"));


                    PrintReceipt($ReceiptHeader,$tableHeader,$cur, $singleSR,"dash-table","table table-bordered",$TranTotal );
                    echo $setReceiptTitle;
                } else {
                    if ($singleSR->INVOICENO==""){$sNo = $singleSR->DRNO;}
                    $ReceiptHeader = array(
                        array("label"=>" ", "name"=> "","nw"=>"75%",
                            "label2"=>" ", "name2"=> "","nw2"=>"5%",
                            "label3"=>" ",  "name3"=>  $singleCust->area,"nw3"=>"20%"),
                        array("label"=>" ", "name"=> $singleSR->CUSTNAME,"nw"=>"75%",
                            "label2"=>" ", "name2"=> "","nw2"=>"5%",
                            "label3"=>" ",  "name3"=> $singleSR->INVDATE,"nw3"=>"20%"),
                        array("label"=>" ", "name"=> $singleCust->address,"nw"=>"75%",
                            "label2"=>" ", "name2"=> "","nw2"=>"5%",
                            "label3"=>" ",  "name3"=> $sNo,"nw3"=>"20%"),
                        array("label"=>" ", "name"=> "","nw"=>"75%",
                            "label2"=>" ", "name2"=> "","nw2"=>"5%",
                            "label3"=>" ",  "name3"=> $singleSR->TERMS,"nw3"=>"20%"),
                        array("label"=>" ", "name"=> "","nw"=>"75%",
                            "label2"=>" ", "name2"=> "","nw2"=>"5%",
                            "label3"=>" ",  "name3"=> "$singleSR->SMANNAME","nw3"=>"20%"));
                    PrintReceipt($ReceiptHeader,$tableHeader,$cur, $singleSR,"dash-tablev2","table",$TranTotal );

                }

















                viewPrintButton(1);

                //Preview Ends Here
                ?>


				
			</div>
		</div>
	</div>
</div>


<style>


    #btnExcel, #btnPDF, #btnPrint{
        border:1px solid #e7e7ff;
        margin:2px;
        outline:none;

    }

    #tblPrintReceipt{
        font-size: smaller;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
    }
    #tblPrintReceipt thead tr th{
        vertical-align: middle;
        text-align: center;
        background-color: #eff0ef;
        font-size: smaller;
        font-weight: bold;
        color: #3b5998;
        border-bottom: 1px solid #e7e7ff;

    }
    #tblPrintReceipt tbody tr td{
        border-bottom: 1px solid #e7e7ff;

    }


    .page-header, .page-header-space {
        height: 120px;
    }

    .page-footer, .page-footer-space {
        height: 50px;

    }

    .page-footer {
        position: fixed;
        bottom: 0;
        width: 100%;
        border-top: 1px solid #d0d2d0; /* for demo */
        background: #ffffff;

    }



    .page {
        page-break-after: always;

    }

    @page {
        margin: 20mm;



    }
    .page-header {
        counter-increment: pageTotal;
    }

    .page-number::before {
        counter-increment: pageTotal;
        counter-increment: page;
        content: "Page " counter(page) " of " counter(pageTotal);
    }

    @media print {
        thead {display: table-header-group;}
        tfoot {display: table-footer-group;}
        .page-header {
            color: #3e6b96;
            position: fixed;
            top: 0mm;
            width: 100%;
            border-bottom: 0px solid #d0d2d0; /* for demo */


        }


        button {display: none;}
        input {display: none;}

    }

    #dash-table{
        font-weight: normal;
        font-size: 10px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        border: 1px solid #c2c4c5;

    }
    #dash-table tfoot td{
        font-weight: bold;
        border-top: 1px solid #c2c4c5;

    }

    #dash-tablev2>thead{
        display: none;
    }
    #dash-tablev2{
        color: #3b5998;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
        width: 100%;
    }
    #dash-tablev2  {
        border: 0px;
    }
</style>
