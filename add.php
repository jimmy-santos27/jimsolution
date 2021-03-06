<!DOCTYPE html>
<html>
<head>
    <!-- js -->
    <link href="facebook/facebox.css" media="screen" rel="stylesheet" type="text/css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="facebook/facebox.js" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('a[rel*=facebox]').facebox({
                loadingImage : 'facebook/loading.gif',
                closeImage   : 'facebook/closelabel.png'
            })
        })
    </script>
    <title>
        POS
    </title>
    <?php
    ?>

    <link href="vendors/uniform.default.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-v2.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/DT_bootstrap.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- combosearch box-->

    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="vendors/bootstrap.js"></script>



    <link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
    <!--sa poip up-->




    <script language="javascript" type="text/javascript">
        /* Visit http://www.yaldex.com/ for full source code
        and get more free JavaScript, CSS and DHTML scripts! */
        <!-- Begin
        var timerID = null;
        var timerRunning = false;
        function stopclock (){
            if(timerRunning)
                clearTimeout(timerID);
            timerRunning = false;
        }
        function showtime () {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds()
            var timeValue = "" + ((hours >12) ? hours -12 :hours)
            if (timeValue == "0") timeValue = 12;
            timeValue += ((minutes < 10) ? ":0" : ":") + minutes
            timeValue += ((seconds < 10) ? ":0" : ":") + seconds
            timeValue += (hours >= 12) ? " P.M." : " A.M."
            document.clock.face.value = timeValue;
            timerID = setTimeout("showtime()",1000);
            timerRunning = true;
        }
        function startclock() {
            stopclock();
            showtime();
        }
        window.onload=startclock;
        // End -->
    </SCRIPT>

</head>
<?php
function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>
<body>


<div class="container-fluid">
    <div class="row-fluid">


        <?php

        /*
            <div class="span2">
                  <div class="well sidebar-nav">
                      <ul class="nav nav-list">
                      <li><a href="index.php"><i class="icon-dashboard icon-2x"></i> Dashboard </a></li>
                    <li class="active"><a href="sales.php?id=cash&invoice=<?php echo $finalcode ?>"><i class="icon-shopping-cart icon-2x"></i> Sales</a>  </li>
                    <li><a href="products.php"><i class="icon-list-alt icon-2x"></i> Products</a>                                     </li>
                    <li><a href="customer.php"><i class="icon-group icon-2x"></i> Customers</a>                                    </li>
                    <li><a href="supplier.php"><i class="icon-group icon-2x"></i> Suppliers</a>                                    </li>
                    <li><a href="salesreport.php?d1=0&d2=0"><i class="icon-bar-chart icon-2x"></i> Sales Report</a>                </li>
                    <br><br><br><br><br><br>
                    <li>
                     <div class="hero-unit-clock">

                    <form name="clock">
                    <font color="white">Time: <br></font>&nbsp;<input style="width:150px;" type="text" class="trans" name="face" value="" disabled>
                    </form>
                      </div>
                    </li>

                        </ul>

                  </div><!--/.well -->
                </div><!--/span-->
        */
        ?>


        <div class="span10">
            <div class="contentheader">
                <i class="icon-money"></i> Sales
            </div>
            <ul class="breadcrumb">
                <a href="index.php"><li>Dashboard</li></a> /
                <li class="active">Sales</li>
            </ul>
            <div style="margin-top: -19px; margin-bottom: 21px;">
                <a  href="index.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
            </div>

            <form action="incoming.php" method="post" >

                <input type="hidden" name="pt" value="cash" />
                <input type="hidden" name="invoice" value="<?php echo $finalcode ?>" />
                <select name="product" style="width:650px; "class="chzn-select" required>
                    <option></option>
                    <option value="dsafadsfdsafsd">sdafadsfadsfasdf</option>
                    <option value="dssdafsdafadsfdsafsd">sdafasdfasdfsddsfadsfasdf</option>

                </select>
                <input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
                <input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
                <input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
                <Button type="submit" class="btn btn-info" style="width: 123px; height:35px; margin-top:-5px;" />
                <i class="icon-plus-sign icon-large"></i> Add</button>
            </form>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
</body>

</html>