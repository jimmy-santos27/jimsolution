<?php
require_once("../include/initialize.php");
//$title = "Contact Me";
$newProduct = new Product();
$view = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';
$bypass = true;
if ($view == "DTDELETE"){
    $view = md5("delete");
}
$title="Products";
$categories = "";
//echo $view."  -  ".md5('add');
switch ($view) {

    case md5('add') :
        $header='add';
        $header=$view;
        if ($newProduct->productisnew("PROCODE",$_POST["PROCODE"]))
        {
            $_SESSION['message'] = "";
            $_SESSION['msgtype'] = "";



            //echo "SELECT * FROM `tblcategory` where CATEGID =" . $_POST["CATEGID"];

            $arrayFields = "PROCODE,PRONAME,entdate, AGING, CARBRAND, CARMAKE, ITEMMAKE, YEARMODEL, OTHERNAME,
                            CATEGORIES, SIDES, COUNTRY, ITEMBRAND, COLOR, VOLTS, WATTS, STOCKTYPE, LOCATION, QTYPERBOX,
                            PRODESC,  REORDER, MAXQTY, PROPRICE, WPROPRICE, PPROPRICE, PROMARGIN, PURPRICE, FORPURPRICE,
                            FOREX, SUPPITEM, suppname, SUPPLIERID,REMARKS,FLOORPRICE,FLOORRATE, SMANRATE, BEGQTY, BEGAVGCOST,
                            PROQTY, AVGCOST, YRSMODEL, UNIT";

            $formGet = array($_POST["PROCODE"],$_POST["PRONAME"],$_POST["entdate"],$_POST["AGING"],$_POST["CARBRAND"],
                            $_POST["CARMAKE"],$_POST["ITEMMAKE"],$_POST["YEARMODEL"],$_POST["OTHERNAME"],$_POST["CATEGORIES"],
                            $_POST["SIDES"],$_POST["COUNTRY"],$_POST["ITEMBRAND"],$_POST["COLOR"],$_POST["VOLTS"],$_POST["WATTS"],
                            $_POST["STOCKTYPE"],$_POST["LOCATION"],$_POST["QTYPERBOX"],$_POST["PRODESC"] ,
                            $_POST["REORDER"],$_POST["MAXQTY"],$_POST["PROPRICE"],$_POST["WPROPRICE"],$_POST["PPROPRICE"],
                            $_POST["PROMARGIN"],$_POST["PURPRICE"],$_POST["FORPURPRICE"],$_POST["FOREX"],
                            $_POST["SUPPITEM"],$_POST["suppname"],$_POST["SUPPLIERID"], $_POST["REMARKS"],
                            $_POST["FLOORPRICE"], $_POST["FLOORRATE"], $_POST["SMANRATE"], $_POST["PROQTY"], $_POST["AVGCOST"],
                            $_POST["PROQTY"], $_POST["AVGCOST"],$_POST["YRSMODEL"],$_POST["UNIT"]);



            if ($newProduct->create($arrayFields,$formGet)){
                $PROID = $mydb->insert_id();
                $imageFileName = "";
                //echo "ssss-".$_FILES['IMAGES']["tmp_name"]."-";
                if ($_FILES['IMAGES'] && $_FILES['IMAGES']["tmp_name"] !="") {
                    $imageFileName = UploadImageFile($PROID);

                }
                $arrayFields = array("IMAGES");
                $formGet = array($imageFileName);

                $newProduct->updateSave($arrayFields,$formGet,$PROID);


                $_SESSION['message'] .= "Added New Product...";
                $_SESSION['msgtype'] .= "success";
                redirect("index.php?view=".$view);
            }else {

                $_SESSION['message'] .= "Unable to Add New Product!!!";
                $_SESSION['msgtype'] .= "error";
                header("location:javascript://history.go(-1)");
            }


        }else {
            $_SESSION['message'] = "Product Code Already Exist!!!";
            $_SESSION['msgtype'] = "error";
            //  echo "<script>alert('Product Code Already Exist!!!')</script>";
             header("location:javascript://history.go(-1)");

        }

        break;
    case md5('edit') :
        $Inactive = "No";
        if (isset($_POST["INACTIVE"])){
            if ($_POST["INACTIVE"] =="on"){
                $Inactive = $_POST["INACTIVE"] ;
            }

        }
        $header='edit';
        $Productid = $_POST['PROID'];

        if(isset($_POST["save"])) {
            $arrayFields = array("PROCODE","PRONAME","entdate","AGING","CARBRAND","CARMAKE","ITEMMAKE","YEARMODEL","OTHERNAME",
                            "CATEGORIES","SIDES","COUNTRY","ITEMBRAND","COLOR","VOLTS","WATTS","STOCKTYPE","LOCATION","QTYPERBOX",
                            "PRODESC","REORDER","MAXQTY","PROPRICE","WPROPRICE","PPROPRICE","PROMARGIN","PURPRICE","FORPURPRICE","FOREX",
                            "SUPPITEM","suppname","SUPPLIERID","REMARKS","INACTIVE","FLOORPRICE","FLOORRATE","SMANRATE","YRSMODEL",
                            "UNIT");

            $formGet = array($_POST["PROCODE"],$_POST["PRONAME"],$_POST["entdate"],$_POST["AGING"],$_POST["CARBRAND"],
                $_POST["CARMAKE"],$_POST["ITEMMAKE"],$_POST["YEARMODEL"],$_POST["OTHERNAME"],$_POST["CATEGORIES"],
                $_POST["SIDES"],$_POST["COUNTRY"],$_POST["ITEMBRAND"],$_POST["COLOR"],$_POST["VOLTS"],$_POST["WATTS"],
                $_POST["STOCKTYPE"],$_POST["LOCATION"],$_POST["QTYPERBOX"],$_POST["PRODESC"] ,
                $_POST["REORDER"],$_POST["MAXQTY"],$_POST["PROPRICE"],$_POST["WPROPRICE"],$_POST["PPROPRICE"],$_POST["PROMARGIN"],
                $_POST["PURPRICE"],$_POST["FORPURPRICE"],$_POST["FOREX"],$_POST["SUPPITEM"],$_POST["suppname"],
                $_POST["SUPPLIERID"],$_POST["REMARKS"],$Inactive,$_POST["FLOORPRICE"],$_POST["FLOORRATE"],$_POST["SMANRATE"],
                $_POST["YRSMODEL"], $_POST["UNIT"]);

            //$arrayFields = array("PROMODEL", "PROBRAND", "PROCODE", "PRONAME", "PRODESC",   "PROPRICE", "PURPRICE", "CATEGID", "CATEGORIES", "entdate" );
           // $formGet = array($_POST["PROMODEL"], $_POST["PROBRAND"], $_POST["PROCODE"], $_POST["PRONAME"], $_POST["PRODESC"],   doubleval($_POST["PROPRICE"]), doubleval($_POST["PURPRICE"]), $_POST["CATEGID"], $categories, $_POST["entdate"]);
            //$newProduct->update($Productid);
            $newProduct->updateSave($arrayFields, $formGet, $Productid);

            $_SESSION['message'] = "Product Updated...";
            $_SESSION['msgtype'] = "success";
        } elseif(isset($_POST["upload"])) {

            $imageFileName = "";
            if ( $_FILES['IMAGES'] && $_FILES['IMAGES']["tmp_name"] !="") {
                $imageFileName = UploadImageFile($Productid);

            }
            $arrayFields = array("IMAGES");
            $formGet = array($imageFileName);

            $newProduct->updateSave($arrayFields,$formGet,$Productid);


        }
        redirect("index.php?view=".$view."&id=".$Productid);
        break;
    case md5('delete') :
        $header='delete';
        $Productid = $_GET['id'];
        $newProduct->delete($Productid);
        $_SESSION['message'] = "Deleted Product... ID : ".$Productid;
        //$_SESSION['msgtype'] = "success";
        echo '{"type" : "success" }';
        break;
    default :
        $_SESSION['message'] = "";
        $_SESSION['msgtype'] = "";
        redirect("index.php?view=".$view);

}

//require_once ("../theme/templates.php");

function UploadImageFile($id){
    $target_dir = "uploads/";
    $target_file = $target_dir .$id."_".basename($_FILES["IMAGES"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $imgFileName = "";

    //if(isset($_POST["save"])) {

        $check = getimagesize($_FILES["IMAGES"]["tmp_name"]);

        if($check != false) {
            echo "File is an image - " . $check["mime"] . ".";
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                unlink($target_file);
                //$_SESSION['message'] = "File is not an image!!!";
                //$_SESSION['msgtype'] = "error";
            }
            if ($_FILES["IMAGES"]["size"] > 500000) {
                    // Check file size
                echo "Sorry, your file is too large.";
                $_SESSION['message'] = "Sorry, your file is too large!!!";
                $_SESSION['msgtype'] = "error";
            } else if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "bmp" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed!!!";
                $_SESSION['msgtype'] = "error";
            } else  if (move_uploaded_file($_FILES["IMAGES"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["IMAGES"]["name"]) . " has been uploaded.";
                $imgFileName = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
            }

        } else {
            echo "File is not an image.";
            $_SESSION['message'] = "File is not an image!!!";
            $_SESSION['msgtype'] = "error";

        }
    //}
    return $imgFileName;
}
?>

