<?php
require_once("../include/initialize.php");
$Products = new Product();
$TotalDisplay = 0;
if (!isset($_SESSION["cart_item"])){
    $localCart = isset($_REQUEST['myCart'])? $_REQUEST['myCart']:"";

    if (isset($localCart) && $localCart !=""){


        $itemArray =  json_decode( $localCart,true );
        //echo json_encode($itemArray);
        $_SESSION["cart_item"] =  $itemArray;
    }
}
?>
<HTML>
<HEAD>
    <TITLE><?php echo REGNAME; ?></TITLE>
    <link href="style.css" type="text/css" rel="stylesheet" />

    <link href="<?php echo web_root; ?>font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../css/bootstrap.4.0.0.min.css" rel="stylesheet" id="bootstrap-css">


</HEAD>
<BODY>



<div class="row" style="margin: 0px">

    <div class="col-lg-9">
        <div class="shops-display">

            <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <span id="search_concept">Random Products</span>
                    </button>
                    <ul class="dropdown-menu" id="search_filter" role="menu">
                        <li><a href="javascript:void(0)">By Product</a></li>
                        <li><a href="javascript:void(0)">By Category</a></li>
                        <li><a href="javascript:void(0)">By Brand</a></li>
                        <li><a href="javascript:void(0)">New Releases </a></li>

                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">
                <input type="text" class="form-control" name="xKey" id="xKey" placeholder="Search...">
                <span class="input-group-btn">
                                <button class="btn btn-default" onclick="getDataList()" type="button"><span class="fa fa-search" style="margin: 3px"></span></button>
                            </span>
            </div>

        </div>
        <div id="product-grid">


            <?php

                include("getDataList.php");
            ?>



        </div>
        <div id="show-more-product-grid">
        </div>
        <?php
            if ($Products->countAll() >8)
            {
            ?>
                <a href="javascript:void(0)"  onclick="showMoreDataList()" class="btn l-btn-plain">
                    Show More
                </a>
            <?php
            }
        ?>
    </div>
    <div class="col-lg-3"  >

        <div id="viewCart">
            <?php
            // include("shoppingCart.php");
            ?>
        </div>

    </div>

    <style>
        #Fixed-Shopping-Cart{
            right:  10px;
            position: fixed;


        }
        .shops-itemized{
            position: relative;
            display: inline-block;
            width: 200px;
            border: 1px solid #1ab7ea;
            border-radius: 4px;
            margin-left: 10px;
            height: auto;
            margin-bottom: 20px;
        }
        .shops-display table{
            font-size: 8pt;
            font-family: "Helvetica", "Arial", sans-serif;
            font-weight: normal;
        }
        .product-quantity{
            text-align: right;
        }

        .shops-display{
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            padding: 0px;
            border: none;
            max-width: 870px;
        }
        .cart-display{
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            padding: 0px;
            border: none;
            max-width: 300px;
        }
        .dbResponsive{

            width: 100%;
        }
        .shops-img {
            object-fit: contain;
            width :180px;
            height :100px;
            border-radius: 3px;
            border: 1px solid  #fdd49a;
        }
        .shops-container{
            alignment: center;

            border-radius: 3px;
            padding: 10px;


        }
        .shops-name{
            padding: 0px 10px 0px 10px;
            height: 35px;
            width: 100%;

            display: table-cell;
            vertical-align: middle;

        }
        .shops-price{
            color: #f0ad4e;
            padding: 10px;
        }

    </style>
</div>



<!-- The Modal -->

<script src="../js/jquery.3.2.1.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="../js/bootstrap.3.1.0.min.js"></script>




<style>

    /* The Modal (background) */

    .modal-dialog{
        left: auto;
        right: auto;
        top: auto;
        bottom: auto;

    }

    .modal-content{
        background-color: #fefefe;
        margin:auto !important;
        padding: 10px;
        border: 1px solid #888;

        overflow: hidden;
        border-radius: 5px;
    }

    /* The Close Button */
    .close {
        position: relative;
        color: #8b0000;
        font-size: 12pt;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

</style>


</BODY>


</HTML>


