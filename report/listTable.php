<?php
require_once("../include/initialize.php");
$Customer = new Customer();
$CUSTNAME = "";
$dtFROM = $_GET["dtFROM"];
$dtTO = $_GET["dtTO"];
$dataQuery = $_GET["dataQuery"];
$dtFunc =$_GET["dtFunc"];
$getParam =json_encode($_GET["setParam"]);
$setParam = json_decode($getParam, true);
$filteredProducts= "";
$preFilter = $_GET["preFilter"];
$preFilter2 = $preFilter;
$querySort = $_GET["querySort"];
$queryString = $_GET["queryString"];
$pCUSTOMERID =""; $pSUPPLIERID =""; $pSALESMANID =""; $pAREA =""; $pSTATNAME =""; $pFOREX =""; $pCUSTTYPE =""; $pPROID ="";
foreach ($setParam as $row){
    $filteredProducts = $row["PRODUCTFILTER"];
    if ($row['CUSTOMERID'] != "" and  $row['CUSTOMERID'] != null){
        if ($preFilter2 !="") {
            $preFilter2 .= " and CUSTOMERID = ".$row['CUSTOMERID'];
            $pCUSTOMERID = " CUSTOMERID = ".$row['CUSTOMERID'];
        }else{
            $preFilter2 .= " where CUSTOMERID = ".$row['CUSTOMERID'];
            $pCUSTOMERID .= " CUSTOMERID = ".$row['CUSTOMERID'];
        }
        $CUSTNAME = $Customer->getCustName($row['CUSTOMERID']);
    }


    if ($row['SUPPLIERID'] != "" and $row['SUPPLIERID'] != null){
        if ($preFilter2 !="") {
            $preFilter2 .= " and SUPPLIERID = ".$row['SUPPLIERID'];
            $pSUPPLIERID = " SUPPLIERID = ".$row['SUPPLIERID'];
        }else{
            $preFilter2 .= " where SUPPLIERID = ".$row['SUPPLIERID'];
            $pSUPPLIERID = " SUPPLIERID = ".$row['SUPPLIERID'];
        }
        if ($dtFunc == 'sPriceList'){
            $pSUPPLIERID = " b.SUPPLIERID = ".$row['SUPPLIERID'];
        }

    }

    if ($row['SALESMANID'] != "" and $row['SALESMANID'] != null){
        if ($preFilter2 !="") {
            $preFilter2 .= " and SALESMANID = ".$row['SALESMANID'];
            $pSALESMANID = "  SALESMANID = ".$row['SALESMANID'];
        }else{
            $preFilter2 .= " where SALESMANID = ".$row['SALESMANID'];
            $pSALESMANID .= "  SALESMANID = ".$row['SALESMANID'];
        }
    }
    if ($row['PROID'] != "" and $row['PROID'] != null){
        if ($preFilter2 !="") {
            $preFilter2 .= " and PROID = ".$row['PROID'];
            $pPROID = "  PROID = ".$row['PROID'];
        }else{
            $preFilter2 .= " where PROID = ".$row['PROID'];
            $pPROID .= "  PROID = ".$row['PROID'];
        }
    }
    if ($row['CUSTTYPE'] != "" and $row['CUSTTYPE'] != null){
        if ($preFilter2 !="") {
            $preFilter2 .= " and CUSTTYPE = ".$row['CUSTTYPE'];
            $pCUSTTYPE = "  CUSTTYPE = ".$row['CUSTTYPE'];
        }else{
            $preFilter2 .= " where CUSTTYPE = ".$row['CUSTTYPE'];
            $pCUSTTYPE .= "  CUSTTYPE = ".$row['CUSTTYPE'];
        }
    }
    if ($row['STATNAME'] != "" and $row['STATNAME'] != null){
        if ($preFilter2 !="") {
            $preFilter2 .= " and STATNAME = '".$row['STATNAME']."'";
            $pSTATNAME = "  STATNAME = '".$row['STATNAME']."'";
        }else{
            $preFilter2 .= " where STATNAME = '".$row['STATNAME']."'";
            $pSTATNAME .= "   STATNAME = '".$row['STATNAME']."'";
        }
    }

    if ($row['AREA'] != "" and $row['AREA'] != null){
        if ($preFilter2 !="") {
            $preFilter2 .= " and AREA = '".$row['AREA']."'";
            $pAREA = " AREA = '".$row['AREA']."'";
        }else{
            $preFilter2 .= " where AREA = '".$row['AREA']."'";
            $pAREA .= "  AREA = '".$row['AREA']."'";
        }
    }

}

$data = array();
$dtArray = array();

$AClass = new Area();
// Set Data Table Parameter Format

switch ($dtFunc) {
    case 'cPriceList' :
        //customer price list
       // $queryString= "select a.PRONAME, a.PROCODE, a.PROID, a.CATEGORIES, FORMAT(a.PROPRICE,2) AS PROPRICE, FORMAT(a.WPROPRICE,2) AS WPROPRICE, FORMAT(a.PPROPRICE,2) AS PPROPRICE, FORMAT(a.PURPRICE,2) AS PURPRICE, FORMAT(a.FORPURPRICE,2) AS FORPURPRICE, a.FOREX, a.LOCATION, B.CUSTNAME,B.CUSTOMERID, b.ENTDATE, c.QTY, c.UNIT, c.PROPRICE as SELLPRICE from tblproduct as a, tblslshead as b, tbLslsdetl as c  ";
       // $pCUSTOMERID = " CUSTOMERID = '2'";
       // $preFilter ="where a.PROID = c.PROID and b.SLSID = c.SLSID and b.ENTDATE >= '1988-01-01' and b.ENTDATE <= '2020-06-19'";
       // $querySort="order by b.CUSTNAME, a.PRONAME, B.ENTDATE DESC";
        if ($pCUSTOMERID != "" and $pCUSTOMERID != null){
            $preFilter .= (($preFilter!="") ? " and " .  $pCUSTOMERID : " where ".  $pCUSTOMERID) ;
        }
        $mydb->setQuery($queryString .  " ".$preFilter ." ".$querySort);
        $data = $mydb->loadResultList();

        $cust="";
        $prod="";
        foreach ($data as $result){
            //echo $result->PRONAME .' - '. $result->PROID.' - '.$prod ."<br>";
            if ($result->CUSTOMERID != $cust || $prod != $result->PROID){
            //    echo $result->CUSTNAME  ."<br>";
                $cust=$result->CUSTOMERID;
                $prod=$result->PROID;
                 array_push($dtArray, $result);
            }
        }
        $data = $dtArray;
        break;
    case 'cPriceList2' : //customer price list
        ///$dataQuery = "select PROID, PRONAME, PROCODE, CATEGORIES, entdate, PROQTY, FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct where upper(INACTIVE) !='YES' and entdate >= '1988-01-01' and entdate <= '2020-06-19' order by CATEGORIES, PRONAME, PROCODE";

        $mydb->setQuery($dataQuery);
        $data = $mydb->loadResultList();
       // echo $dataQuery;
        $cust="";
        $prod="";
        foreach ($data as $result){
            $prod = str_replace("}","",json_encode($result));

          //  $pCUSTOMERID = " CUSTOMERID = 2";
            $qry = "select B.CUSTNAME,B.CUSTOMERID, b.ENTDATE, c.QTY, c.UNIT, c.PROPRICE as SELLPRICE,c.PROID from tblslshead as b, tbLslsdetl as c where b.SLSID = c.SLSID and c.PROID =".$result->PROID." and  {$pCUSTOMERID} order by  b.ENTDATE desc limit 1";

            $cur = $AClass->getQueryList($qry);
            $CTR =0;
            foreach ($cur as $result2){
                $CTR =1;
                $prod .=', "CUSTNAME": "'.$result2->CUSTNAME.'"';
                $prod .=', "LASTDATE": "'.$result2->ENTDATE.'"';
                $prod .=', "QTY": "'.$result2->QTY.'"';
                $prod .=', "SELLPRICE": "'.$result2->SELLPRICE.'"';

            }
            if ($CTR ==0){
                $prod .=', "CUSTNAME": "'.$CUSTNAME.'"';
                $prod .=', "LASTDATE": ""';
                $prod .=', "QTY": "0"';
                $prod .=', "SELLPRICE": "'.$result->PROPRICE.'"';
            }
            $prod .="}";
          //  $prod = str_replace('\"','"', $prod);
          //  echo $prod;
            array_push($dtArray,  json_decode($prod,true));
        }
        $data = $dtArray;
       // echo "sdfs";
        break;

    case 'sPriceList' :

       //  $queryString= "select a.PRONAME, a.PROCODE, a.PROID, a.CATEGORIES, a.SUPPITEM, a.QTYPERBOX, a.PROQTY, a.REORDER, a.MAXQTY, FORMAT(a.PROPRICE,2) AS PROPRICE, FORMAT(a.WPROPRICE,2) AS WPROPRICE, FORMAT(a.PPROPRICE,2) AS PPROPRICE, FORMAT(a.PURPRICE,2) AS PURPRICE, FORMAT(a.FORPURPRICE,2) AS FORPURPRICE, a.FOREX, a.LOCATION, B.SUPPNAME,B.SUPPLIERID, b.ENTDATE, c.QTY, c.UNIT, FORMAT(c.FORPURPRICE,2) as UNITCOST from tblproduct as a, tblpurchasehead as b, tblpurchasedetl as c ";
       //  $pSUPPLIERID = " b.SUPPLIERID = '7'";
       //  $preFilter =" where a.PROID = c.PROID and b.RRID = c.RRID and a.PROQTY <= a.REORDER and b.ENTDATE >= '2008-06-20' and b.ENTDATE <= '2020-06-20'";
       //  $querySort="order by b.SUPPNAME, a.PRONAME, B.ENTDATE DESC, B.RRID DESC";
        if ($pSUPPLIERID != "" and $pSUPPLIERID != null){
            $preFilter .= (($preFilter!="") ? " and " .  $pSUPPLIERID : " where ".  $pSUPPLIERID) ;
        }
       // echo $queryString .  " ".$preFilter ." ".$querySort;

        $mydb->setQuery($queryString .  " ".$preFilter ." ".$querySort);
        $data = $mydb->loadResultList();

        $cust="";
        $prod="";
        foreach ($data as $result){
            //echo $result->PRONAME .' - '. $result->PROID.' - '.$prod ."<br>";
            if ($result->SUPPLIERID != $cust || $prod != $result->PROID){
                //    echo $result->CUSTNAME  ."<br>";
                $cust=$result->SUPPLIERID;
                $prod=$result->PROID;
                array_push($dtArray, $result);
            }
        }
        $data = $dtArray;
        break;
    default:
        //$queryString="SELECT CUSTNAME, CUSTCODE, ENTDATE, if(slstype=1,b.INVOICENO,b.DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE, PRONAME, PROID, PROCODE, QTY, FORMAT(PROPRICE,2) AS PROPRICE, DISCPER, FORMAT(DISCAMT,2) AS DISCAMT, FORMAT(AMOUNT,2) AS AMOUNT, UNIT FROM tblslsdetl as a, tblslshead as b";
        //$preFilter2 =" where a.SLSID = B.SLSID and CANCELLED !='Y' and ENTDATE >= '1997-06-19' and ENTDATE <= '2020-06-19' ";
       // $querySort =" order by PRONAME, PROID, CUSTNAME, CUSTOMERID, ENTDATE, b.SLSID";
       //echo $queryString .  " ".$preFilter2 ." ".$querySort;

       // $q = "SELECT CUSTNAME, CUSTCODE, ENTDATE, if(slstype=1,b.INVOICENO,b.DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE, PRONAME, PROID, PROCODE, QTY, FORMAT(PROPRICE,2) AS PROPRICE, DISCPER, FORMAT(DISCAMT,2) AS DISCAMT, FORMAT(AMOUNT,2) AS AMOUNT, UNIT FROM tblslsdetl as a, tblslshead as b where a.SLSID = B.SLSID and CANCELLED !='Y' and ENTDATE >= '2020-07-01' and ENTDATE <= '2020-07-18' order by ENTDATE, b.SLSID";
        $mydb->setQuery($queryString .  " ".$preFilter2 ." ".$querySort);
        //$mydb->setQuery($q);
        $data = $mydb->loadResultList();

}


$results = ["sEcho" => 1,
    "iTotalRecords" => count($data),
    "iTotalDisplayRecords" => count($data),
    "aaData" => $data ];

//Return Json Query
echo json_encode($results);

?>