
<!--
<div class="row">
    <table id="dboard" >
        <tr>

            <?php
            $colCtr=1;
            while ($colCtr<=3) {
                echo "<td style='alignment: top'>";
                $query = "SELECT * FROM tblmenu WHERE menutype = 1 and dbcolumn=".$colCtr." and USERID = " . $_SESSION['USERID']." order by menucode ";
                $mydb->setQuery($query);
                $cur = $mydb->loadResultList();
                $i = 0;
                foreach ($cur as $result) {
                    $i += 1;
                    echo '<div class="col-lg-12">';
                    echo '<div class="panel panel-default">';
                    echo '<div class="panel-heading">';
                    echo '<i class="' . $result->icon . '"></i>' . $result->menuname;
                    echo '<div class="pull-right">';
                    echo '<div class="btn-group">';
                    //echo '<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">X';
                    echo '<span class="close"></span>';
                    echo '</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="panel-body">';
                    $mcode = $result->menucode;
                    $query = "SELECT * FROM tblmenu WHERE groupmenu = $result->menucode and menutype = 2 and USERID = " . $_SESSION['USERID'] ." order by menucode ";

                    $mydb->setQuery($query);
                    $cur2 = $mydb->loadResultList();

                    foreach ($cur2 as $result2) {

                        echo '<a  href="' . web_root . $result2->link . '">';
                        echo '<div class="col-lg-6" id="btnMENU" >';
                        echo '<i class="' . $result2->icon . '"></i> ' . $result2->menuname;
                        echo '</div>';
                        echo '</a>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                $colCtr = $colCtr + 1;
                echo "</td>";
            }
            ?>
        </tr>
    </table>
</div>
!-->

<div class="row">

            <?php
            $colCtr=1;
            while ($colCtr<=3) {
                echo " ";
                $query = "SELECT * FROM tblmenu WHERE menutype = 1 and dbcolumn=".$colCtr." and USERID = " . $_SESSION['USERID']." order by menucode ";
                $mydb->setQuery($query);
                $cur = $mydb->loadResultList();
                $i = 0;
                foreach ($cur as $result) {
                    $i += 1;
                    echo '<div class="col-lg-12">';
                    echo '<div class="panel panel-default">';
                    echo '<div class="panel-heading">';
                    echo '<i class="' . $result->icon . '"></i>' . $result->menuname;


                    echo '<div class="pull-right" style="margin-top: 0px; ">
 
                            <div class="btn-group"   >
                                <a href="#" id="' .$result->menucode.'" class="btn btn-primary btn-xs btnpanel" style="padding:3px; height: 22px; width: 30px ;background: none">
                                    <i id="icon' .$result->menucode.'"  class="fa fa-angle-double-up fw-fa"></i></a>
                            </div>
                        </div>';

                    echo '</div>';
                    echo '<div class="panel-body" id="panelbody' .$result->menucode.'">';
                    $mcode = $result->menucode;
                    $query = "SELECT * FROM tblmenu WHERE groupmenu = $result->menucode and menutype = 2 and USERID = " . $_SESSION['USERID'] ." order by menucode ";

                    $mydb->setQuery($query);
                    $cur2 = $mydb->loadResultList();

                    foreach ($cur2 as $result2) {
                        echo '<div class="col-lg-4">';
                        echo '<a  href="' . web_root . $result2->link . '">';
                        echo '<div class="col-lg-11" id="btnMENU" >';
                        echo '<i class="' . $result2->icon . '"></i> ' . $result2->menuname;
                        echo '</div>';
                        echo '</div>';
                        echo '</a>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                $colCtr = $colCtr + 1;
                echo " ";
            }
            ?>
        </tr>
    </table>
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






