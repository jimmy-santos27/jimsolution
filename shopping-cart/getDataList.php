<?php
require_once("../include/initialize.php");
$Products = new Product();
?>

<link href="../font/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <div class="shops-display">

        <?php

        $Products = new Product();
        $kw= isset($_REQUEST["keyword"])? $_REQUEST["keyword"] :"";
        $filter= isset($_REQUEST["filter"])? $_REQUEST["filter"] :"";
        $rows= isset($_REQUEST["rows"])? $_REQUEST["rows"] :"";

        $cur = $Products->randomListImages(8,  $kw, $filter, $rows );

        $ctr =0 ;
        foreach ($cur as $result){
            $ctr ++;
            ?>
            <div class="shops-itemized">
                <form method="post" action="javascript:void(0)">
                    <table width="100%">
                        <tr><td class="shops-container" ><img class="shops-img"   src="<?php echo web_root.$result->IMAGES?>"></td></tr>
                        <tr><td class="shops-name"><?php echo  $result->PRONAME?> </td></tr>
                        <tr><td class="shops-price">
                                <span class="pull-left"><?php echo 'P '.number_format($result->PROPRICE,2)?> </span>
                                <div class="cart-action">
                                    <input type="text" class="product-quantity form-num" id="qty_<?php echo $result->PROID; ?>" name="quantity" value="1" size="3" />

                                    <button type="submit" onclick="pushCart(<?php echo $result->PROID; ?>,'add')" class="btnAddAction" >add <i class="fa fa-cart-plus"></i></button>
                                </div>
                            </td></tr>
                    </table>
                </form>
            </div>



            <?php
        }
        if ($rows = 0){
            echo ($ctr ==0)? "<div class='item-cart' style='width: 80%'>Not Found!!!</div>" :"";
        }
        ?>




    </div>
    <style>
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


