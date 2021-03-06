<?php

    include("../include/initialize.php");

    //echo $qfld. "<Br>".$tblHead;


?>


<div class="row" style="padding:  5px 10px 5px 10px">

    <?php
        PrintHeader();
        PrintBodyPanel($mydb);
       // PrintDataView($mydb, $tblHead, $qfld)

    ?>



    <!--*** CONTENT GOES HERE ***-->


<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        font-size: x-small ;
        counter-reset: page;
        counter-reset: pageTotal;
    }

    .page-header, .page-header-space {
        height: 85px;
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
            background: #ffffff

        }


        button {display: none;}
        input {display: none;}
        body {margin: 0;}
    }




    #pTable {
        font-family: Arial, Helvetica, sans-serif;
        font-size: x-small ;
        border-collapse: collapse;

        border: 0px solid #ddd;
        font-weight: normal;
    }

    #pTable thead{
        color: #2e6da4;
        position: fixed;
        top: 35mm;
        width: 96%;
        margin-top: 10px;
        padding: 7px 0px 7px 0px;
        font-size: x-small ;
        font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        background: #ffffff;
        color: black;
        border: 0px;

        border-top: 1px solid #d0d2d0;
        border-bottom:  1px solid #d0d2d0;
        text-align: left;
    }
    #prntTblHeader{
        display: none;
        margin-top: 10px;
        font-size: x-small ;
        font-weight: bold;

        font-family: Arial, Helvetica, sans-serif;
        background: #ffffff;
        color: black;
        border: 0px;
        height: 30px;
        border-top: 1px solid #d0d2d0;
        border-bottom:  1px solid #d0d2d0;
        text-align: left;
    }
    #pTable tbody tr {
        color: black;
        border-bottom: 0px solid #ddd;

        page-break-before: always;
    }

    #pTable thead tr {
        font-size: x-small;
        color:#2e6da4;
        font-weight: normal;
        padding: 1px;
    }

     #pTable tbody tr:hover {
         color:#2e6da4;
         background-color: #e8f2ff;

    }


    .tableFixHead          { overflow-y: auto;   height:400px; border: 0px solid #cccccc; border-radius: 0px;  }
    table {
        border-spacing: 0;

        border: 0px solid #ddd;
    }

    th {
        cursor: pointer;
    }

    th, td {
        text-align: left;

    }

     tr:nth-child(even) {
        background-color: #f2f2f2;
        color: #3e6b96;
    }
</style>