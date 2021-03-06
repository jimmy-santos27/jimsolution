<link rel="shortcut icon" href="../images/solution.png">

<?php
require_once("../include/initialize.php");
//checkAdmin();
if (!isset($_SESSION['USERID'])){
    redirect(web_root."index.php");
}
date_default_timezone_set("Asia/Taipei");

$ID = $_GET['id'];
$Customer = new Customer();
$SHReturn = new SalesReturnHead();
$SDReturn = new SalesReturnDetl();
 
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

                $singleSR = $SHReturn->single_tran($ID);
                $cur = $SDReturn->listofSReturnPerID($ID);
                $TranTotal = $singleSR->TOTAL;

                $ReceiptHeader = array(
                array("label"=>"Customer Name:", "name"=> $singleSR->CUSTNAME,"nw"=>"50%",
                    "label2"=>"Date:", "name2"=> $singleSR->ENTDATE,"nw2"=>"25%",
                    "label3"=>"S.R. No.:",  "name3"=> $singleSR->SRNO,"nw3"=>"25%"),
                array("label"=>"Checked By:", "name"=> $singleSR->CHECKEDBY,"nw"=>"50%",
                    "label2"=>" ", "name2"=> "","nw2"=>"25%",
                    "label3"=>"Reference:",  "name3"=> $singleSR->REFNO,"nw3"=>"25%"));

                $tableHeader =  array(
                    array("label"=>"Qty.", "w"=>"5%","fldname"=>"QTY","TYPE"=>'I'),
                    array("label"=>"Unit", "w"=>"6%","fldname"=>"UNIT","TYPE"=>'C'),
                    array("label"=>"Code", "w"=>"10%","fldname"=>"PROCODE","TYPE"=>'C'),
                    array("label"=>"Description", "w"=>"51%","fldname"=>"PRONAME","TYPE"=>'C'),
                    array("label"=>"Price", "w"=>"9%","fldname"=>"PROPRICE","TYPE"=>'N'),
                    array("label"=>"Discount", "w"=>"9%","fldname"=>"DISCAMT","TYPE"=>'N'),
                    array("label"=>"Amount", "w"=>"10%","fldname"=>"AMOUNT","TYPE"=>'N'));

                viewHeader($title, "center", $ReceiptHeader);

                viewBody($tableHeader,$cur, $singleSR,"dash-table","table table-bordered",$TranTotal);

                viewPrintButton(1);



                ?>
                <div id="editor"></div>
				
				
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



    #pgHeader, #pgHeader-space {
        height: 140px;

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
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
    }

    @page {
        margin: 20mm;


    }
    #pgHeader {
        counter-increment: pageTotal;
    }

    .page-number::before {
        counter-increment: pageTotal;
        counter-increment: page;
        content: "Page " counter(page) " of " counter(pageTotal);
    }

    @media print {

        thead {
            display: table-header-group;
        }

        tfoot {display: table-footer-group;}

        #pgHeader {
            color: #3e6b96;
            position: fixed;
            top: 0mm;
            width: 100%;
            border-bottom: 0px solid #d0d2d0; /* for demo */
            background: #ffffff

        }
        #dash-table{
            color: #3b5998;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 10px;
        }

    }

    #dash-table{
        color: #3b5998;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
    }

</style>
