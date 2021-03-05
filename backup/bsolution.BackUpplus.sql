

CREATE TABLE `rblreports` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `REPORTNAME` varchar(255) DEFAULT NULL,
  `LINK` varchar(255) DEFAULT NULL,
  `ICON` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblarea` (
  `AREAID` int(11) NOT NULL AUTO_INCREMENT,
  `AREA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AREAID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

INSERT INTO tblarea VALUES("1","CAINTA, RIZAL");
INSERT INTO tblarea VALUES("4","SAN MIGUEL, BULACAN");
INSERT INTO tblarea VALUES("5","QUEZON CITY");
INSERT INTO tblarea VALUES("6","MANILA");
INSERT INTO tblarea VALUES("7","LAS PINAS");
INSERT INTO tblarea VALUES("8","SAN JUAN");
INSERT INTO tblarea VALUES("9","MANDALUYONG");
INSERT INTO tblarea VALUES("10","MALABON");
INSERT INTO tblarea VALUES("11","NAVOTAS");
INSERT INTO tblarea VALUES("12","CALOOCAN");
INSERT INTO tblarea VALUES("13","MAKATI");
INSERT INTO tblarea VALUES("14","TAGUIG");
INSERT INTO tblarea VALUES("15","PATEROS");
INSERT INTO tblarea VALUES("16","PARANAQUE");
INSERT INTO tblarea VALUES("17","MUNTINLUPA");
INSERT INTO tblarea VALUES("18","CEBU CITY");
INSERT INTO tblarea VALUES("19","DAVAO CITY");
INSERT INTO tblarea VALUES("20","BAGUIO CITY");
INSERT INTO tblarea VALUES("21","CABANATUAN, NUEVA ECIJA");



CREATE TABLE `tblautonumber` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AUTOSTART` varchar(11) NOT NULL,
  `AUTOINC` int(11) NOT NULL,
  `AUTOEND` int(11) NOT NULL,
  `AUTOKEY` varchar(12) NOT NULL,
  `AUTONUM` int(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tblautonumber VALUES("1","0","1","25","PROID","10");
INSERT INTO tblautonumber VALUES("2","0","1","66","ordernumber","0");



CREATE TABLE `tblcategory` (
  `CATEGID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORIES` varchar(255) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `CATCODE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CATEGID`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO tblcategory VALUES("10","SEDAN","","SD001");
INSERT INTO tblcategory VALUES("11","SUV","","SUV001");
INSERT INTO tblcategory VALUES("12","Van","","V001");
INSERT INTO tblcategory VALUES("13","TRUCK - 40FTR","","T40F001");



CREATE TABLE `tblcustomer` (
  `CUSTOMERID` int(11) NOT NULL AUTO_INCREMENT,
  `custname` varchar(255) DEFAULT NULL,
  `custcode` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAILADD` varchar(40) DEFAULT NULL,
  `CUSUNAME` varchar(20) DEFAULT NULL,
  `CUSPASS` varchar(90) DEFAULT NULL,
  `TERMS` tinyint(3) NOT NULL DEFAULT 0,
  `DATEJOIN` date NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `creditlimit` double(12,2) DEFAULT 0.00,
  `balance` double(12,2) DEFAULT 0.00,
  PRIMARY KEY (`CUSTOMERID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO tblcustomer VALUES("1","Jimmy R. Santos","JRS001","CAINTA","CAINTA, RIZAL","9278842558","jimmyrsantos@yahoo.com","","","30","2020-03-30"," ","25000.00","");
INSERT INTO tblcustomer VALUES("2","Rose Santos","RS001","Esla","CAINTA","9278842558","jimmyrsantos@yahoo.com","","","0","2020-03-30"," ","0.00","");
INSERT INTO tblcustomer VALUES("3","Mark Jeremy Santos","MJ001","ESLA","Cainta","9278842558","jimmyrsantos@yahoo.com","","","0","2020-03-30"," ","0.00","");
INSERT INTO tblcustomer VALUES("7","BusinessTools Softwaire Incorporated ltd.","BTS001","sdafasdf","cainta","654656","jimmy.roque@gmail.com","","","30","2020-04-01"," ","0.00","");
INSERT INTO tblcustomer VALUES("10","PLDT","PL001","AYALA, MAKATI CITY","MAKATI","9278842558","jimmy.roque@gmail.com","","","0","2020-04-03"," ","0.00","");



CREATE TABLE `tblmenu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `menucode` varchar(255) DEFAULT NULL,
  `groupmenu` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `menutype` int(5) DEFAULT 0,
  `icon` varchar(255) DEFAULT NULL,
  `caret` varchar(255) DEFAULT NULL,
  `USERID` varchar(255) DEFAULT NULL,
  `STATUS` int(1) DEFAULT 0,
  `dbcolumn` int(1) DEFAULT 1,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

INSERT INTO tblmenu VALUES("1","Product Inventory","1000","1000","#","1","fa fa-bar-chart fa-fw","fa fa-caret-down","128","","1");
INSERT INTO tblmenu VALUES("2","Products","1001","1000","products/index.php","2","fa fa-bars fa-fw","","128","","1");
INSERT INTO tblmenu VALUES("3","Categories","1002","1000","category/index.php","2","fa fa-cubes fa-fw","","128","","1");
INSERT INTO tblmenu VALUES("4","Sales","2000","2000","#","1","fa fa-shopping-cart fa-fw","fa fa-caret-down","128","","2");
INSERT INTO tblmenu VALUES("5","Invoicing","2001","2000","invoicing/index.php","2","fa fa-shopping-cart fa-fw","","128","","2");
INSERT INTO tblmenu VALUES("6","Sales Return","2002","2000","sreturns/index.php","2","fa fa-sliders fa-fw","","128","","2");
INSERT INTO tblmenu VALUES("7","","2003","","#","2","","","128","","2");
INSERT INTO tblmenu VALUES("8","Customer","2004","2000","customer/index.php","2","fa fa-group fa-fw","","128","","2");
INSERT INTO tblmenu VALUES("9","Salesman","2005","2000","salesman/index.php","2","fa fa-user fa-fw","","128","","2");
INSERT INTO tblmenu VALUES("10","Area","2006","2000","area/index.php","2","fa fa-globe fa-fw","","128","","2");
INSERT INTO tblmenu VALUES("11","Purchase","3000","3000","#","1","fa fa-truck fa-fw","fa fa-caret-down","128","","3");
INSERT INTO tblmenu VALUES("12","Purchase Order","3001","3000","p_order/index.php","2","fa fa-clipboard fa-fw","","128","","3");
INSERT INTO tblmenu VALUES("13","Receiving Report","3002","3000","receiving/index.php","2","fa fa-list-alt fa-fw","#","128","","3");
INSERT INTO tblmenu VALUES("14","Purchase Return","3003","3000","pureturn/index.php","2","fa fa-sliders fa-fw","#","128","","3");
INSERT INTO tblmenu VALUES("16","Settings","9000","9000","#","1","fa fa-gear fa-fw","fa fa-caret-down","128","","1");
INSERT INTO tblmenu VALUES("17","Users","9001","9000","user/index.php","2","fa fa-group fa-fw","","128","","1");
INSERT INTO tblmenu VALUES("18","Back-Up Data","9002","9000","backup/index.php","2","fa fa-save fa-fw","","128","","1");
INSERT INTO tblmenu VALUES("19","Restore Data","9003","9000","#","2","fa fa-archive fa-fw","","128","","1");
INSERT INTO tblmenu VALUES("20","Supplier","3005","3000","supplier/index.php","2","fa fa-group fa-fw","","128","","3");
INSERT INTO tblmenu VALUES("22","Report","9900","9900","report/index.php","1","fa fa-print fa-fw","#","128","","1");



CREATE TABLE `tblorder` (
  `ORDERID` int(11) NOT NULL AUTO_INCREMENT,
  `PROID` int(11) NOT NULL,
  `ORDEREDQTY` int(11) NOT NULL,
  `ORDEREDPRICE` double NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `USERID` int(11) NOT NULL,
  PRIMARY KEY (`ORDERID`),
  KEY `USERID` (`USERID`),
  KEY `PROID` (`PROID`),
  KEY `ORDEREDNUM` (`ORDEREDNUM`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO tblorder VALUES("4","4","1","4498.2","60","0");
INSERT INTO tblorder VALUES("5","2","1","22198","61","0");
INSERT INTO tblorder VALUES("6","6","1","10900","62","0");
INSERT INTO tblorder VALUES("7","3","1","7190","63","0");
INSERT INTO tblorder VALUES("8","2","1","22198","64","0");
INSERT INTO tblorder VALUES("9","3","1","7190","65","0");



CREATE TABLE `tblpodetl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `POID` int(11) DEFAULT 0,
  `pono` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(100) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `QTY` double(12,2) DEFAULT 0.00,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `QTYRECEIVED` double(12,2) DEFAULT 0.00,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

INSERT INTO tblpodetl VALUES("14","3","PO-06033300","13","Adventure","MI002","650000.00","1.00","0.00","0.00","650000.00","0.00");
INSERT INTO tblpodetl VALUES("15","4","PO-50222228","17","TOYOTA WIGO","TW001","490000.00","2.00","0.00","0.00","980000.00","0.00");
INSERT INTO tblpodetl VALUES("16","5","PO-20078057","12","VIOS ATX","TO001","540000.00","1.00","0.00","0.00","540000.00","0.00");
INSERT INTO tblpodetl VALUES("17","6","PO-30022703","14","Montero Sports","MO001","870000.00","1.00","0.00","0.00","870000.00","0.00");
INSERT INTO tblpodetl VALUES("18","7","PO-83340003","16","Elantra ","NE001","480000.00","2.00","0.00","0.00","960000.00","0.00");
INSERT INTO tblpodetl VALUES("19","8","PO-23005038","13","Adventure","MI002","650000.00","1.00","0.00","0.00","650000.00","0.00");
INSERT INTO tblpodetl VALUES("20","8","PO-23005038","16","Elantra ","NE001","480000.00","1.00","0.00","0.00","480000.00","0.00");
INSERT INTO tblpodetl VALUES("21","8","PO-23005038","15","Innova","TO002","840000.00","1.00","0.00","0.00","840000.00","0.00");
INSERT INTO tblpodetl VALUES("22","8","PO-23005038","7","MIRAGE G4 GLX - MT","MI001","475000.00","1.00","0.00","0.00","475000.00","0.00");
INSERT INTO tblpodetl VALUES("23","8","PO-23005038","14","Montero Sports","MO001","870000.00","1.00","0.00","0.00","870000.00","0.00");
INSERT INTO tblpodetl VALUES("24","8","PO-23005038","12","VIOS ATX","TO001","540000.00","1.00","0.00","0.00","540000.00","0.00");
INSERT INTO tblpodetl VALUES("25","8","PO-23005038","17","TOYOTA WIGO","TW001","490000.00","1.00","0.00","0.00","490000.00","0.00");
INSERT INTO tblpodetl VALUES("26","9","PO-00382806","13","Adventure","MI002","650000.00","1.00","0.00","0.00","650000.00","0.00");
INSERT INTO tblpodetl VALUES("27","10","PO-23006005","13","Adventure","MI002","650000.00","1.00","0.00","0.00","650000.00","0.00");
INSERT INTO tblpodetl VALUES("28","10","PO-23006005","16","Elantra ","NE001","480000.00","1.00","0.00","0.00","480000.00","0.00");
INSERT INTO tblpodetl VALUES("29","10","PO-23006005","21","HONDA BRV ATX","HBA00001","985000.00","1.00","0.00","0.00","985000.00","0.00");
INSERT INTO tblpodetl VALUES("30","10","PO-23006005","27","HONDA CRV ATX","HCA00001","1150000.00","1.00","0.00","0.00","1150000.00","0.00");
INSERT INTO tblpodetl VALUES("31","10","PO-23006005","15","Innova","TO002","840000.00","1.00","0.00","0.00","840000.00","0.00");
INSERT INTO tblpodetl VALUES("32","10","PO-23006005","7","MIRAGE G4 GLX - MT","MI001","475000.00","1.00","0.00","0.00","475000.00","0.00");
INSERT INTO tblpodetl VALUES("33","10","PO-23006005","14","Montero Sports","MO001","870000.00","1.00","0.00","0.00","870000.00","0.00");
INSERT INTO tblpodetl VALUES("34","10","PO-23006005","20","Suzuki Esmteem","SES0001","500000.00","1.00","0.00","0.00","500000.00","0.00");
INSERT INTO tblpodetl VALUES("35","10","PO-23006005","17","TOYOTA WIGO","TW001","490000.00","1.00","0.00","0.00","490000.00","0.00");
INSERT INTO tblpodetl VALUES("36","10","PO-23006005","12","VIOS ATX","TO001","540000.00","2.00","0.00","0.00","1080000.00","0.00");
INSERT INTO tblpodetl VALUES("38","12","PO-00033360","16","Elantra ","NE001","480000.00","2.00","0.00","0.00","960000.00","0.00");
INSERT INTO tblpodetl VALUES("37","11","PO-22485003","14","Montero Sports","MO001","870000.00","1.00","0.00","0.00","870000.00","0.00");



CREATE TABLE `tblpohead` (
  `POID` int(11) NOT NULL AUTO_INCREMENT,
  `pono` varchar(20) DEFAULT NULL,
  `refno` varchar(20) DEFAULT NULL,
  `entdate` date DEFAULT NULL,
  `suppname` varchar(255) DEFAULT NULL,
  `suppcode` varchar(20) DEFAULT NULL,
  `SUPPLIERID` int(11) DEFAULT NULL,
  `total` double(12,2) DEFAULT 0.00,
  `discountamt` double(12,2) DEFAULT 0.00,
  `discountper` double(6,2) DEFAULT 0.00,
  `net` double(12,2) DEFAULT 0.00,
  `note` varchar(500) DEFAULT NULL,
  `terms` int(5) DEFAULT 0,
  `duedate` date DEFAULT NULL,
  `paidamt` double(12,2) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `U_NAME` varchar(122) DEFAULT NULL,
  PRIMARY KEY (`POID`),
  KEY `pono` (`pono`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tblpohead VALUES("3","PO-06033300","","2020-04-04","JRS Marketing Corp","JRS001","8","650000.00","0.00","0.00","650000.00","","0","2020-04-04","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("4","PO-50222228","12312","2020-04-04","JS SOLUTIONS INC.","JSS001","9","980000.00","0.00","0.00","980000.00","","12","2020-04-16","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("5","PO-20078057","","2020-04-04","JS SOLUTIONS INC.","JSS001","9","540000.00","0.00","0.00","540000.00","","12","2020-04-16","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("6","PO-30022703","","2020-04-04","JS SOLUTIONS INC.","JSS001","9","870000.00","0.00","0.00","870000.00","","0","2020-04-04","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("7","PO-83340003","","2020-04-06","JS SOLUTIONS INC.","JSS001","9","960000.00","0.00","0.00","960000.00","","18","2020-04-24","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("8","PO-23005038","7978968","2020-04-16","JS SOLUTIONS INC.","JSS001","9","4345000.00","0.00","0.00","4345000.00","","30","2020-05-16","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("9","PO-00382806","4487","2020-04-18","BSS Solutions Inc.","BSS001","10","650000.00","0.00","0.00","650000.00","","10","2020-04-28","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("10","PO-23006005","3423","2020-04-19","BSS Solutions Inc.","BSS001","10","7520000.00","0.00","0.00","7520000.00","","10","2020-04-29","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("11","PO-22485003","34234","2020-04-21","JS SOLUTIONS INC.","JSS001","9","870000.00","0.00","0.00","870000.00","","10","2020-05-01","","128","Jimmy R. Santos");
INSERT INTO tblpohead VALUES("12","PO-00033360","","2020-04-22","JRS Marketing Corp","JRS001","8","960000.00","0.00","0.00","960000.00","","0","2020-04-22","","128","Jimmy R. Santos");



CREATE TABLE `tblproduct` (
  `PROID` int(11) NOT NULL AUTO_INCREMENT,
  `PROMODEL` varchar(30) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PROBRAND` varchar(255) DEFAULT NULL,
  `PRONAME` varchar(255) DEFAULT NULL,
  `PRODESC` varchar(255) DEFAULT NULL,
  `PROQTY` double(12,2) DEFAULT 0.00,
  `PROPRICE` double(12,2) DEFAULT 0.00,
  `CATEGID` int(11) DEFAULT NULL,
  `IMAGES` varchar(255) DEFAULT NULL,
  `PROSTATS` varchar(30) DEFAULT NULL,
  `CATEGORIES` varchar(255) DEFAULT NULL,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `entdate` date DEFAULT NULL,
  `INACTIVE` char(3) DEFAULT 'No',
  PRIMARY KEY (`PROID`),
  UNIQUE KEY `PROCODE` (`PROCODE`),
  UNIQUE KEY `PRONAME` (`PRONAME`),
  KEY `CATEGID` (`CATEGID`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO tblproduct VALUES("7","MIRAGE G4 2016","MI001","","MIRAGE G4 GLX - MT","                        

                                            ","0.00","585000.00","10","","","SEDAN","475000.00","","No");
INSERT INTO tblproduct VALUES("12","Toyota Vios","TO001","","VIOS ATX","                        

                      ","0.00","620000.00","3","","","","540000.00","","No");
INSERT INTO tblproduct VALUES("13","Mitsubishi Adventure GLX","MI002","","Adventure","wala                        

                      ","0.00","725000.00","3","","","","650000.00","","No");
INSERT INTO tblproduct VALUES("14","Montero Sports GLX","MO001","","Montero Sports","                        

                      ","0.00","990000.00","3","","","","870000.00","","No");
INSERT INTO tblproduct VALUES("15","Toyota Innova","TO002","","Innova","                        

                      ","0.00","950000.00","3","","","","840000.00","","No");
INSERT INTO tblproduct VALUES("16","Nissan","NE001","","Elantra ","                        

                                                                                                              ","0.00","550000.00","10","","","SEDAN","480000.00","","No");
INSERT INTO tblproduct VALUES("17","WIGO2016","TW001","","TOYOTA WIGO","                        

                      ","0.00","580000.00","10","","","SEDAN","490000.00","","No");
INSERT INTO tblproduct VALUES("20","Suzuki","SES0001","","Suzuki Esmteem","

                    ","0.00","650000.00","10","","","SEDAN","500000.00","","No");
INSERT INTO tblproduct VALUES("21","HONDA","HBA00001","","HONDA BRV ATX","

                    ","0.00","1100000.00","11","","","SUV","985000.00","","No");
INSERT INTO tblproduct VALUES("27","HONDA A","HCA00001","","HONDA CRV ATX","

                    ","0.00","1200000.00","11","","","SUV","1150000.00","","No");



CREATE TABLE `tblpromopro` (
  `PROMOID` int(11) NOT NULL AUTO_INCREMENT,
  `PROID` int(11) NOT NULL,
  `PRODISCOUNT` double NOT NULL,
  `PRODISPRICE` double NOT NULL,
  `PROBANNER` tinyint(4) NOT NULL,
  `PRONEW` tinyint(4) NOT NULL,
  PRIMARY KEY (`PROMOID`),
  UNIQUE KEY `PROID` (`PROID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tblpromopro VALUES("1","1","0","33298","1","0");
INSERT INTO tblpromopro VALUES("2","2","0","22198","1","0");
INSERT INTO tblpromopro VALUES("3","3","0","7190","1","0");
INSERT INTO tblpromopro VALUES("4","4","10","4498.2","1","0");
INSERT INTO tblpromopro VALUES("5","5","0","5698","1","0");
INSERT INTO tblpromopro VALUES("6","6","0","10900","1","0");



CREATE TABLE `tblpurchasedetl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RRID` int(11) DEFAULT 0,
  `POID` int(11) DEFAULT 0,
  `POPID` int(11) DEFAULT 0,
  `rrno` varchar(20) DEFAULT NULL,
  `pono` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(100) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `QTY` double(9,2) DEFAULT 0.00,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `QTYRET` double(9,2) DEFAULT 0.00,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

INSERT INTO tblpurchasedetl VALUES("81","17","9","26","RR-25766300","PO-00382806","13","Adventure","MI002","650000.00","1.00","0.00","0.00","650000.00","1.00");



CREATE TABLE `tblpurchasehead` (
  `RRID` int(11) NOT NULL AUTO_INCREMENT,
  `rrno` varchar(20) DEFAULT NULL,
  `refno` varchar(20) DEFAULT NULL,
  `entdate` date DEFAULT NULL,
  `suppname` varchar(255) DEFAULT NULL,
  `suppcode` varchar(20) DEFAULT NULL,
  `SUPPLIERID` int(11) DEFAULT NULL,
  `total` double(12,2) DEFAULT 0.00,
  `discountamt` double(12,2) DEFAULT 0.00,
  `discountper` double(6,2) DEFAULT 0.00,
  `net` double(12,2) DEFAULT 0.00,
  `note` varchar(500) DEFAULT NULL,
  `terms` int(5) DEFAULT 0,
  `duedate` date DEFAULT NULL,
  `PAIDAMT` double(12,2) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `U_NAME` varchar(122) DEFAULT NULL,
  `DEBIT` double(12,2) DEFAULT 0.00,
  `CREDIT` double(12,2) DEFAULT 0.00,
  PRIMARY KEY (`RRID`),
  KEY `rrno` (`rrno`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

INSERT INTO tblpurchasehead VALUES("17","RR-25766300","","2020-04-22","BSS Solutions Inc.","BSS001","10","650000.00","0.00","0.00","650000.00","","30","2020-05-22","","128","Jimmy R. Santos","0.00","0.00");



CREATE TABLE `tblpureturndetl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PRID` int(11) DEFAULT 0,
  `prno` varchar(20) DEFAULT NULL,
  `POPID` int(11) DEFAULT 0,
  `RRPID` int(11) DEFAULT 0,
  `rrno` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(100) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `QTY` double(9,2) DEFAULT 0.00,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `RETTYPE` char(20) DEFAULT 'Others',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

INSERT INTO tblpureturndetl VALUES("90","24","PR-51532080","26","81","RR-25766300","13","Adventure","MI002","650000.00","1.00","0.00","0.00","650000.00","Others");



CREATE TABLE `tblpureturnhead` (
  `PRID` int(11) NOT NULL AUTO_INCREMENT,
  `prno` varchar(20) DEFAULT NULL,
  `refno` varchar(20) DEFAULT NULL,
  `entdate` date DEFAULT NULL,
  `suppname` varchar(255) DEFAULT NULL,
  `suppcode` varchar(20) DEFAULT NULL,
  `SUPPLIERID` int(11) DEFAULT NULL,
  `total` double(12,2) DEFAULT 0.00,
  `discountamt` double(12,2) DEFAULT 0.00,
  `discountper` double(6,2) DEFAULT 0.00,
  `net` double(12,2) DEFAULT 0.00,
  `note` varchar(500) DEFAULT NULL,
  `terms` int(5) DEFAULT 0,
  `duedate` date DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `U_NAME` varchar(122) DEFAULT NULL,
  PRIMARY KEY (`PRID`),
  KEY `rrno` (`prno`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO tblpureturnhead VALUES("24","PR-51532080","","2020-04-22","BSS Solutions Inc.","BSS001","10","650000.00","0.00","0.00","650000.00","","0","","128","Jimmy R. Santos");



CREATE TABLE `tblsalesman` (
  `SALESMANID` int(11) NOT NULL AUTO_INCREMENT,
  `smanname` varchar(255) DEFAULT NULL,
  `smancode` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAILADD` varchar(40) DEFAULT NULL,
  `DATEJOIN` date NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`SALESMANID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tblsalesman VALUES("11","SMAN 1","SM001","SDFASDF","CAINTA, RIZAL","32423423","jimmyrsantos@yahoo.com","2020-04-04"," ");
INSERT INTO tblsalesman VALUES("12","SMAN 2","SM002","CAL","CALOOCAN","332423","jimmy.roque@gmail.com","2020-04-04"," ");



CREATE TABLE `tblsetting` (
  `SETTINGID` int(11) NOT NULL AUTO_INCREMENT,
  `PLACE` text NOT NULL,
  `BRGY` varchar(90) NOT NULL,
  `DELPRICE` double NOT NULL,
  PRIMARY KEY (`SETTINGID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tblsetting VALUES("1","Kabankalan City","Brgy. 1","50");
INSERT INTO tblsetting VALUES("2","Himamaylan City","Brgy. 1","70");



CREATE TABLE `tblslsdetl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SLSID` int(11) DEFAULT 0,
  `invoiceno` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(100) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PROPRICE` double(12,2) DEFAULT 0.00,
  `QTY` int(6) DEFAULT 0,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO tblslsdetl VALUES("4","4","SA-40332363","15","Innova","TO002","785000.00","1","0.00","0.00","785000.00");



CREATE TABLE `tblslshead` (
  `SLSID` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceno` varchar(20) DEFAULT NULL,
  `drno` varchar(20) DEFAULT NULL,
  `refno` varchar(20) DEFAULT NULL,
  `entdate` date DEFAULT NULL,
  `custname` varchar(255) DEFAULT NULL,
  `custcode` varchar(20) DEFAULT NULL,
  `CUSTOMERID` int(11) DEFAULT NULL,
  `total` double(12,2) DEFAULT 0.00,
  `discountamt` double(12,2) DEFAULT 0.00,
  `discountper` double(6,2) DEFAULT 0.00,
  `net` double(12,2) DEFAULT 0.00,
  `note` varchar(500) DEFAULT NULL,
  `terms` int(5) DEFAULT 0,
  `duedate` date DEFAULT NULL,
  `paidamt` double(12,2) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `U_NAME` varchar(122) DEFAULT NULL,
  PRIMARY KEY (`SLSID`),
  KEY `invoiceno` (`invoiceno`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO tblslshead VALUES("4","SA-40332363","","","2020-03-27","CASH SALES","CASH","0","785000.00","0.00","0.00","785000.00","","10","2020-04-06","","124","Kenjie Palacios");



CREATE TABLE `tblstockin` (
  `STOCKINID` int(11) NOT NULL AUTO_INCREMENT,
  `ENTDATE` datetime DEFAULT NULL,
  `TID` int(11) DEFAULT 0,
  `TPID` int(11) DEFAULT 0,
  `TTYPE` char(3) DEFAULT NULL,
  `TNO` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `QTYIN` double(12,2) DEFAULT 0.00,
  `QTYOUT` double(12,2) DEFAULT 0.00,
  `PRICE` double(12,2) DEFAULT 0.00,
  `USERID` int(11) DEFAULT 0,
  PRIMARY KEY (`STOCKINID`),
  KEY `PROID` (`PROID`,`USERID`),
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;

INSERT INTO tblstockin VALUES("88","2020-04-22 00:00:00","17","81","RR","RR-25766300","13","1.00","0.00","650000.00","128");
INSERT INTO tblstockin VALUES("94","2020-04-22 00:00:00","24","90","PR","PR-51532080","13","0.00","1.00","650000.00","128");



CREATE TABLE `tblsummary` (
  `SUMMARYID` int(11) NOT NULL AUTO_INCREMENT,
  `ORDEREDDATE` datetime NOT NULL,
  `CUSTOMERID` int(11) NOT NULL,
  `ORDEREDNUM` int(11) NOT NULL,
  `DELFEE` double NOT NULL,
  `PAYMENT` double NOT NULL,
  `PAYMENTMETHOD` varchar(30) NOT NULL,
  `ORDEREDSTATS` varchar(30) NOT NULL,
  `ORDEREDREMARKS` varchar(125) NOT NULL,
  `CLAIMEDADTE` datetime NOT NULL,
  `HVIEW` tinyint(4) NOT NULL,
  `USERID` int(11) NOT NULL,
  PRIMARY KEY (`SUMMARYID`),
  UNIQUE KEY `ORDEREDNUM` (`ORDEREDNUM`),
  KEY `CUSTOMERID` (`CUSTOMERID`),
  KEY `USERID` (`USERID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO tblsummary VALUES("4","2016-02-27 11:26:30","1","60","0","4523.2","Cash on Delivery","Delivered","Your order has been delivered.","0000-00-00 00:00:00","0","0");
INSERT INTO tblsummary VALUES("5","2016-02-27 01:08:44","1","61","0","22198","Cash on Pickup","Delivered","Your order has been delivered.","2016-02-27 00:00:00","1","0");
INSERT INTO tblsummary VALUES("6","2016-02-27 01:44:48","1","62","0","10900","Cash on Pickup","Pending","Your order is on process.","0000-00-00 00:00:00","1","0");
INSERT INTO tblsummary VALUES("7","2016-02-27 05:46:45","1","63","0","7260","Cash on Delivery","Confirmed","Your order has been confirmed.","0000-00-00 00:00:00","1","0");
INSERT INTO tblsummary VALUES("8","2016-02-27 05:51:34","1","64","70","22268","Cash on Delivery","Cancelled","Your order has been cancelled due to lack of communication and incomplete information.","0000-00-00 00:00:00","1","0");
INSERT INTO tblsummary VALUES("9","2016-02-27 06:13:43","1","65","70","7260","Cash on Delivery","Pending","Your order is on process.","0000-00-00 00:00:00","1","0");



CREATE TABLE `tblsupplier` (
  `SUPPLIERID` int(11) NOT NULL AUTO_INCREMENT,
  `suppname` varchar(255) DEFAULT NULL,
  `suppcode` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAILADD` varchar(40) DEFAULT NULL,
  `TERMS` tinyint(3) NOT NULL DEFAULT 0,
  `DATEJOIN` date NOT NULL,
  `note` varchar(500) DEFAULT NULL,
  `creditlimit` double(12,2) DEFAULT 0.00,
  `balance` double(12,2) DEFAULT 0.00,
  `pdc_note` double(12,2) DEFAULT 0.00,
  `blacklisted` char(3) DEFAULT 'No',
  PRIMARY KEY (`SUPPLIERID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

INSERT INTO tblsupplier VALUES("8","JRS Marketing Corp","JRS001","cainta","cainta","654656","jimmy.roque@gmail.com","0","2020-04-02"," ","0.00","0.00","0.00","No");
INSERT INTO tblsupplier VALUES("9","JS SOLUTIONS INC.","JSS001","34","24234","23432","jimmyrsantos@yahoo.com","0","2020-04-03"," ","0.00","0.00","0.00","No");
INSERT INTO tblsupplier VALUES("10","BSS Solutions Inc.","BSS001","cuBAO","cainta","9278842558","jimmy.roque27@gmail.com","30","2020-04-14"," ","100000.00","0.00","0.00","No");



CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT,
  `U_NAME` varchar(122) DEFAULT NULL,
  `U_USERNAME` varchar(122) DEFAULT NULL,
  `U_PASS` varchar(122) DEFAULT NULL,
  `U_ROLE` varchar(30) DEFAULT NULL,
  `USERIMAGE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

INSERT INTO tbluseraccount VALUES("124","Kenjie Palacios","kenjie","d033e22ae348aeb5660fc2140aec35850c4da997","Administrator","photos/COC-war-base-design.jpg");
INSERT INTO tbluseraccount VALUES("128","Jimmy R. Santos","jimmy","1cd02e31b43620d7c664e038ca42a060d61727b9","Administrator","");

