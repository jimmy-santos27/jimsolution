
<div class="table-responsive">

    <table  id="REPTAB2" class="table table-hover">

        <?php
        include("../include/initialize.php");

        $query = "SELECT * FROM tblreportfld WHERE  INSTR(reportcode,'".$_GET["menucode"]."') order by indx";
        //echo $query;
        $mydb->setQuery($query);
        $cur = $mydb->loadResultList();
        $ARR1 =ARRAY();
        $ctr=0;
        foreach ($cur as $result) {
            ?>
            <tr>
                <td>
                    <input type="checkbox" checked   name="selector[]" id="selector[]" value="<?php echo $ctr;?>"/><?php echo $result->fldTitle;?>
                    <input hidden id="fldTitle[]" name="fldTitle[]" type="text" value="<?php echo $result->fldTitle;?>">
                    <input hidden id="fldName[]" name="fldName[]" type="text" value="<?php echo $result->fldName;?>">
                    <input hidden id="fldSize[]" name="fldSize[]" type="text" value="<?php echo $result->fldSize;?>">
                    <input hidden id="fldType[]" name="fldType[]" type="text" value="<?php echo $result->ftype;?>">
                </td>
            </tr>

            <?php
            $ctr=$ctr+1;

         }
        ?>
    </table>
</div>
