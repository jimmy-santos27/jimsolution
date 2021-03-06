<?php
require_once("../include/initialize.php");
$Products = new Product();
date_default_timezone_set("Asia/Taipei");
if(!empty($_REQUEST["action"])) {
    switch($_REQUEST["action"]) {
        case "newAccount":
            $email = addslashes(htmlspecialchars($_REQUEST['email']));
            $mydb->setQuery("select count(*) as tcount from tblcustomeronline where EMAILADD = '{$email}' limit 1");
            $result = $mydb->loadSingleResult();
            if (isset($result->tcount) and $result->tcount <= 0){
                $mField =" OCNAME, ADDRESS, AREA, PHONE, EMAILADD, ENTDATE, ACCOUNTPASS";
                $mValue = "'".addslashes(htmlspecialchars($_REQUEST['fullname']))."',";
                $mValue .= "'".addslashes(htmlspecialchars($_REQUEST['address']))."',";
                $mValue .= "'".addslashes(htmlspecialchars($_REQUEST['area']))."',";
                $mValue .= "'".$_REQUEST['phone']."',";
                $mValue .= "'".$email."',";
                $mValue .= "'". date("Y-m-d") . "',";
                $mValue .= "sha1('".addslashes(htmlspecialchars($_REQUEST['password']))."')";


                $sql = "insert into tblcustomeronline ( {$mField} ) values({$mValue})";
               // echo $sql;
                $mydb->setQuery($sql);
                if ($mydb->executeQuery()) {
                    $id = $mydb->insert_id();
                    $_SESSION['ACCOUNTUSER']= $_REQUEST['fullname'];
                    $_SESSION['ACCOUNTID']= $id;
                    echo "SUCCESS";

                }else{
                    echo  "Problem inserting of record from database...";
                }
            }else{
                echo  "Email account already used...";
            }

            break;

        case "checkOut":

            if (isset($_SESSION['ACCOUNTID']) and isset($_SESSION['ACCOUNTUSER']) ){
                $imgFile =  UploadImageFile(0);
                if ($imgFile !="") {
                    $mField = " OCNAME, OCID, ENTDATE, TOTAL, PAIDAMT, PAYMODE, NOTE";
                    $mValue = "'" . addslashes(htmlspecialchars($_SESSION['ACCOUNTUSER'])) . "',";
                    $mValue .= addslashes(htmlspecialchars($_SESSION['ACCOUNTID'])) . ",";
                    $mValue .= "'" . date('Y-m-d') . "',";
                    $mValue .= str_replace(",", "", $_REQUEST['TOTAL']) . ",";
                    $mValue .= str_replace(",", "", $_REQUEST['PAIDAMT']) . ",";
                    $mValue .= "'" . addslashes(htmlspecialchars($_REQUEST['PAYMODE'])) . "',";
                    $mValue .= "'" . addslashes(htmlspecialchars($_REQUEST['NOTE'])) . "'";


                    $sql = "insert into tblorderhead ( {$mField} ) values({$mValue})";
                    //echo $sql;
                    $mydb->setQuery($sql);
                    if ($mydb->executeQuery()) {
                        $id = $mydb->insert_id();
                        $imgFile = UploadImageFile($id);
                        $sql = "update tblorderhead set  PAYRECEIPT ='{$imgFile}' where SOID = {$id}";
                        //echo $sql;
                        $mydb->setQuery($sql);
                        $mydb->executeQuery();
                        if (isset($_SESSION["cart_item"])) {

                            // echo "eh meron";
                            foreach ($_SESSION["cart_item"] as $item) {
                                $item_price = $item["quantity"] * $item["price"];

                                $mField = " PROID, PRONAME, QTY, PROPRICE, AMOUNT, SOID, OCID";
                                $mValue = $item["code"] . ",";
                                $mValue .= "'" . $item["name"] . "',";
                                $mValue .= $item["quantity"] . ",";
                                $mValue .= $item["price"] . ",";
                                $mValue .= $item_price . ",";
                                $mValue .= $id . ",";
                                $mValue .= $_SESSION['ACCOUNTID'];
                                $sql = "insert into tblorderdetl ( {$mField} ) values({$mValue})";
                                //echo $sql;
                                $mydb->setQuery($sql);
                                $mydb->executeQuery();

                            }
                            echo "SUCCESS";
                            unset($_SESSION["cart_item"]);

                        }else { echo "Problem accessing session cart..."; }




                    } else {
                        echo "Problem inserting of record from database...";
                    }
                }
            }else{
                echo  "Email account already used...";
            }



            //UploadImageFile();
            break;
        case "signIn":
            $email = addslashes(htmlspecialchars($_REQUEST['email']));
            $pass = addslashes(htmlspecialchars($_REQUEST['password']));
            //echo "select * from tblcustomeronline where EMAILADD = '{$email}' and ACCOUNTPASS= sha1('{$pass}') limit 1";
            $mydb->setQuery("select * from tblcustomeronline where EMAILADD = '{$email}' and ACCOUNTPASS = sha1('{$pass}') limit 1");
            $cur = $mydb->loadResultList();
            $cmdResult="Invalid Password or E-mail account not found!!!";
            foreach ($cur as $result){
                $id = isset($result->OCID)? $result->OCID : 0;
                if ($id > 0){
                    $_SESSION['ACCOUNTUSER']= $result->OCNAME;
                    $_SESSION['ACCOUNTID']= $result->OCID;
                    $cmdResult = "SUCCESS";

                }
            }
            echo  $cmdResult;

            break;
        case "signOut":
            unset($_SESSION['ACCOUNTUSER']);
            unset($_SESSION['ACCOUNTID']);
            echo "SUCCESS";
            break;
        case "add":
            if(!empty($_REQUEST["quantity"])) {
                $productByCode = $Products->single_product( $_REQUEST["code"]  );
                $itemArray =  array(array('name'=>$productByCode->PRONAME, 'code'=>$productByCode->PROID, 'quantity'=>$_REQUEST["quantity"], 'price'=>$productByCode->PROPRICE, 'image'=>$web_root.$productByCode->IMAGES));

                if(!empty($_SESSION["cart_item"])) {
                    //if(in_array($productByCode->PROID,array_keys($_SESSION["cart_item"]))) {
                        $newItem = true;
                        foreach($_SESSION["cart_item"]   as $k => $v ) {
                                //echo "<br>code". $k . " - " .$v['code'];
                                //echo "aa:".json_encode($v['code'])."<br>";
                                if( isset($v['code']) && $productByCode->PROID == $v['code']) {
                                    if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                        $_SESSION["cart_item"][$k]["quantity"] = 0;
                                    }
                                    $_SESSION["cart_item"][$k]["quantity"] += $_REQUEST["quantity"];
                                    $newItem = false;
                                }
                        }
                    //} else {
                        //echo "keys: " .json_encode(array_keys($_SESSION["cart_item"]));

                    if ($newItem){
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                        //array_push($_SESSION["cart_item"], $itemArray);
                    }
                    //}
                } else {
                    //array_push($_SESSION["cart_item"],$itemArray);
                    $_SESSION["cart_item"] = $itemArray;
                }
            //	echo "<br>".json_encode($_SESSION["cart_item"]);


            }

            echo "done add";
        break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {

                foreach($_SESSION["cart_item"]   as $k => $v ) {

                    if( isset($v['code']) && $_REQUEST["code"] == $v['code']) {
                        unset($_SESSION["cart_item"][$k]);
                        if(empty($_SESSION["cart_item"]))
                            unset($_SESSION["cart_item"]);
                    }
                }
            }
            echo "done remove";
        break;
        case "empty":
            $_SESSION["cart_item"]="";
            unset($_SESSION["cart_item"]);
            ?>
            <script>
                window.localStorage.removeItem('cart_item');
            </script>
            <?php
            echo "done empty";
        break;
    }
}
unset($_REQUEST);






function UploadImageFile($id){
    $SOID = isset($id) ? $id:0;
    $folder = "oCustomer/";
    $target_dir = "../images/".$folder;
    $imgFileName = "";
    //echo json_encode(array('errorMsg' => $target_dir));
    //$target_file = $target_dir .$id."_".basename($_FILES["file1"]["name"]);
    $target_file = $target_dir .$SOID."_".basename($_FILES["file1"]["name"]);
    //echo $target_file;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image


    $check = getimagesize($_FILES["file1"]["tmp_name"]);
    if($check != false) {
        //echo "File is an image - " . $check["mime"] . ".";
        // Check if file already exists
        if (file_exists($target_file)) {
            // echo "Sorry, file already exists.";
            //echo json_encode(array('errorMsg' => 'File already exist...'));

            if ($SOID > 0){
                unlink($target_file);
                if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
                    //echo "The file " . basename($_FILES["file1"]["name"]) . " has been uploaded.";
                    $imgFileName = $SOID."_".basename($_FILES["file1"]["name"]);
                }
            }else { $imgFileName = $SOID."_".basename($_FILES["file1"]["name"]);}

        }else if ($_FILES["file1"]["size"] > 5000000) {
            // Check file size

            echo  'File is to large... must not exceed 500KB...';

        } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "bmp" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            echo 'Invalid Format... format accepted [jpg, png, bmp, gif]...';

        } else {
            //echo $SOID ."  _  ".$target_file;
            if ($SOID > 0) {

                if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
                    //echo "The file " . basename($_FILES["file1"]["name"]) . " has been uploaded.";
                    $imgFileName = $SOID."_".basename($_FILES["file1"]["name"]);
                } else {
                    echo 'there was an error ecountered during uploading... try again...';
                    ///echo "Sorry, there was an error uploading your file.";
                }
            }else { $imgFileName = $SOID."_".basename($_FILES["file1"]["name"]); }
        }

    } else {
        echo 'Please upload a correct image file...';
    }
    //}
    return ($imgFileName!="")? "images/".$folder.$imgFileName:$imgFileName;
}


?>
