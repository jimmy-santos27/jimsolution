<div class="row" style="height: 600px!important;margin-left: 0px; background: #fff;"  >
    <div class="col-md-12" style="margin: 0px; padding-left: 9px"     id="pageNav">
        <!-- Nav tabs -->
        <ul style="display: none;margin:0px;" id="tab-list" class="nav nav-tabs" role="tablist">
            <li class="active"> <a href="#tab1" role="tab" data-toggle="tab"><span><i class="fa fa-tachometer fa-fw"> </i> &nbsp; Dashboard&nbsp; </span> </span></a></li>
        </ul>

        <!-- Tab panes -->
        <div id="tab-content" class="tab-content" style=" margin:0px; width: 100%;   background-color:#fff;  overflow-y: auto;">
            <div class="tab-pane fade in active" id="tab1" style="height:615px; ">
                <div class="table-responsive col-lg-12 dbResponsive"  style="padding: 0px;">

                    <div class="shops-display">
                        <?php
                            $Products = new Product();
                            $cur = $Products->randomListImages(15,'','',0);
                            foreach ($cur as $result){
                                ?>
                                

                                    <div class="shops-itemized">
                                    <table width="100%">
                                        <tr><td class="shops-container" ><img class="shops-img"   src="<?php echo web_root.$result->IMAGES?>"></td></tr>
                                        <tr><td class="shops-name"><?php echo  $result->PRONAME?> </td></tr>
                                        <tr><td class="shops-price"><?php echo 'P '.number_format($result->PROPRICE,2)?> </td></tr>
                                    </table>
                                    </div>


                                
                                <?php
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
                        .shops-display{
                            margin-top: 20px;
                            margin-left: auto;
                            margin-right: auto;
                            padding: 0px;
                            border: none;
                            max-width: 1100px;
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
            </div>
        </div>
    </div>
</div>







    <style>
        #dboard {
            padding-top: 10px;

        }
        #dboard tr,td{
            width: 33.3%;
            vertical-align: top;
        }
        #btnMENU {
            border-radius: 5px;
            border: 1px solid #cccc;

            padding: 18px;
            margin-right : 12px;
            margin-bottom : 12px;
            background: #f0fafb;
            width: 100%;
            height: 60px;
            font-size: small;
            color: #0e8c8c;

        }
        #btnMENU:hover{
            background: #0ea432;
            color: #fff;
        }


    </style>






