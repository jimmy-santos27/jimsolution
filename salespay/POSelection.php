<?php
$keyId  =   $_GET["id"];
include("../include/initialize.php");

if ( (intval($keyId) !=  0)) {


    $mydb->setQuery("SELECT * FROM tblpodetl as a, tblpohead as b where a.POID = b.POID and b.SUPPLIERID=".$keyId."  order by a.PRONAME");
    $cur = $mydb->loadResultList();
    $myArray = array(array());
    if (count($cur) <=0){

        $mydb->setQuery("SELECT * FROM `tblproduct` order by PRONAME, PROMODEL, PROBRAND");
        $cur = $mydb->loadResultList();
        $myArray = array(array());


        foreach ($cur as $result) {
            $myArray = $myArray + array(
                    $result->PROID => array(
                        "PRONAME" => $result->PRONAME,
                        "PROMODEL" => $result->PROMODEL,
                        "PROBRAND" => $result->PROBRAND,
                        "PROCODE" => $result->PROCODE ,
                        "PURPRICE" => $result->PURPRICE
                    ));

            ?>
            <option value="<?php echo $result->PROID;?>" >
                <?php echo $result->PRONAME; ?> &nbsp; &nbsp; &nbsp; <?php echo $result->PROMODEL; ?> &nbsp; &nbsp; &nbsp; <?php echo $result->PROBRAND; ?>  - <?php echo $result->PROCODE; ?>
            </option>
            <?PHP

        }
    }else {












        foreach ($cur as $result) {
            //$itemSelected = "'" . $result->PROBRAND . "','" . $result->PROCODE . "','" . $result->PURPRICE . "'";
            $myArray = $myArray + array(
                    $result->PROID => array(
                        "PRONAME" => $result->PRONAME,
                        "PROCODE" => $result->PROCODE,
                        "PURPRICE" => $result->PURPRICE
                    ));

            ?>
            <option
                value="<?php echo $result->PROID; ?>">
                <?php echo $result->PRONAME; ?> &nbsp; &nbsp; &nbsp;  <?php echo $result->pono; ?>&nbsp; &nbsp; &nbsp; QTY: <?php echo $result->QTY; ?>

            </option>
            <?PHP

        }
    }

 }
?>