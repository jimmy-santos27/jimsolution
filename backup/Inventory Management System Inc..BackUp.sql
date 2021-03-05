

CREATE TABLE `glogin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registered` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE `tblaccountstatus` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `STATNAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tblaccountstatus VALUES("1","GOOD ACCT");
INSERT INTO tblaccountstatus VALUES("5","BAD ACCOUNT");
INSERT INTO tblaccountstatus VALUES("6","RUDE CUSTOMER");
INSERT INTO tblaccountstatus VALUES("7","DELAYED PAYMENT");
INSERT INTO tblaccountstatus VALUES("8","Very Good Acct.");



CREATE TABLE `tblarea` (
  `AREAID` int(11) NOT NULL AUTO_INCREMENT,
  `AREA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AREAID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tblarea VALUES("1","CAINTA, RIZAL");
INSERT INTO tblarea VALUES("2","SAN MIGUEL, BULACAN");
INSERT INTO tblarea VALUES("3","PASIG CITY");
INSERT INTO tblarea VALUES("4","QUEZON CITY");



CREATE TABLE `tblarpaycheck` (
  `ORCID` int(11) NOT NULL AUTO_INCREMENT,
  `ORID` int(11) DEFAULT NULL,
  `CHKNO` varchar(20) DEFAULT NULL,
  `CHKAMOUNT` double(12,2) DEFAULT 0.00,
  `CHKDATE` varchar(10) DEFAULT NULL,
  `BANK` varchar(100) DEFAULT NULL,
  `ACCTNO` varchar(30) DEFAULT NULL,
  `CLEARDATE` varchar(10) DEFAULT NULL,
  `BOUNCED` char(1) DEFAULT 'F',
  `BOUNCEDATE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ORCID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblarpaydetl` (
  `ORPID` int(11) NOT NULL AUTO_INCREMENT,
  `ORID` int(255) DEFAULT NULL,
  `ORNO` varchar(20) DEFAULT NULL,
  `SLSID` int(11) DEFAULT NULL,
  `INVOICENO` varchar(20) DEFAULT NULL,
  `DRNO` char(20) DEFAULT NULL,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `BOUNCEDAMT` double(12,2) DEFAULT 0.00,
  `DISCOUNT` double(12,2) DEFAULT 0.00,
  `PTYPE` char(30) DEFAULT 'PAY',
  `CMAMT` double(12,2) DEFAULT 0.00,
  `RRNO` varchar(20) DEFAULT NULL,
  `RRID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ORPID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblarpayhead` (
  `ORID` int(11) NOT NULL AUTO_INCREMENT,
  `ORNO` char(20) DEFAULT NULL,
  `CUSTNAME` varchar(255) DEFAULT NULL,
  `CUSTOMERID` int(11) DEFAULT 0,
  `PAIDAMT` double(12,2) DEFAULT 0.00,
  `CASHAMT` double(12,2) DEFAULT 0.00,
  `TOTALCHK` double(12,2) DEFAULT 0.00,
  `CARDAMT` double(12,2) DEFAULT 0.00,
  `CARDNAME` varchar(100) DEFAULT NULL,
  `CCNO` varchar(20) DEFAULT NULL,
  `CCEXPIRY` char(10) DEFAULT NULL,
  `CCAPPROVAL` varchar(20) DEFAULT NULL,
  `ENTDATE` varchar(10) DEFAULT NULL,
  `REFNO` varchar(20) DEFAULT NULL,
  `PAYTYPE` int(1) DEFAULT 1,
  `NOTE` longtext DEFAULT NULL,
  `CANCELLED` char(1) DEFAULT 'F',
  `ISPRINTED` char(1) DEFAULT 'F',
  `TOTALBOUNCED` double(12,2) DEFAULT 0.00,
  `OFFCREDIT` double(12,2) DEFAULT 0.00,
  `USERID` int(11) DEFAULT 0,
  `U_NAME` varchar(100) DEFAULT NULL,
  `TOTALSALES` double(12,2) DEFAULT 0.00,
  `BOUNCEDSALES` double(12,2) DEFAULT 0.00,
  PRIMARY KEY (`ORID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblautonumber` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CODENAME` varchar(50) DEFAULT NULL,
  `FLDNAME` varchar(50) DEFAULT NULL,
  `STARTVALUE` char(3) DEFAULT NULL,
  `AUTOTYPE` char(3) DEFAULT 'RAN',
  `RANDOMKEY` varchar(255) DEFAULT '123ABC456DEF789GHJ0K',
  `CODESIZE` int(2) DEFAULT 7,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tblautonumber VALUES("1","Product Code","PROCODE","","INC","2312SFASJDOFIO32904283403423049OEIRW03894","7");
INSERT INTO tblautonumber VALUES("2","Customer Code","custcode","","RAN","123456789JIMMY01212412","7");
INSERT INTO tblautonumber VALUES("3","Supplier Code","suppcode","","RAN","ABCD123210996867JLJKL3423","7");
INSERT INTO tblautonumber VALUES("4","Salesman Code","smancode","","RAN","SDFADF3324212LJKHHOMMX,ZNV318906756445677","7");



CREATE TABLE `tblcarbrand` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CARBRAND` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `CARBRAND` (`CARBRAND`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblcarmake` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CARMAKE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `CARMAKE` (`CARMAKE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblcategory` (
  `CATEGID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORIES` varchar(100) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `CATCODE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CATEGID`),
  UNIQUE KEY `CATEGID` (`CATEGID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tblcategory VALUES("1","T-SHIRT","","");
INSERT INTO tblcategory VALUES("2","SHORT","","");
INSERT INTO tblcategory VALUES("3","PANTS","","");



CREATE TABLE `tblcolor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `COLOR` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `COLOR` (`COLOR`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO tblcolor VALUES("1","TEAL GREEN");
INSERT INTO tblcolor VALUES("2","BLACK");
INSERT INTO tblcolor VALUES("3","OLD ROSE");
INSERT INTO tblcolor VALUES("4","WHITE");
INSERT INTO tblcolor VALUES("5","PINK");
INSERT INTO tblcolor VALUES("6","ARMY GREEN");
INSERT INTO tblcolor VALUES("7","NAVY BLUE");
INSERT INTO tblcolor VALUES("8","BLACK - WHITE DOT");
INSERT INTO tblcolor VALUES("9","BLACK - WHITE LINE");
INSERT INTO tblcolor VALUES("10","BEIGE");
INSERT INTO tblcolor VALUES("11","TEST COLOR");



CREATE TABLE `tblcountry` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `COUNTRY` varchar(100) DEFAULT NULL,
  `FOREX` char(5) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `COUNTRY` (`COUNTRY`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO tblcountry VALUES("1","TAIWAN","NTD");
INSERT INTO tblcountry VALUES("2","CHINA","CNY");
INSERT INTO tblcountry VALUES("3","THAILAND","THB");
INSERT INTO tblcountry VALUES("4","JAPAN","YEN");
INSERT INTO tblcountry VALUES("6","GERMANY","EUR");
INSERT INTO tblcountry VALUES("7","U.S.","USD");
INSERT INTO tblcountry VALUES("8","ITALY","EUR");
INSERT INTO tblcountry VALUES("9","SOUTH KOREA","KRW");
INSERT INTO tblcountry VALUES("11","PHILIPPINES","PHP");
INSERT INTO tblcountry VALUES("18","SINGAPORE","SGD");
INSERT INTO tblcountry VALUES("20","AUSTRALIA","AUD");
INSERT INTO tblcountry VALUES("21","UNITED KINGDOM","GBP");



CREATE TABLE `tblcustomer` (
  `CUSTOMERID` int(11) NOT NULL AUTO_INCREMENT,
  `custname` varchar(255) DEFAULT NULL,
  `custcode` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `STATNAME` varchar(50) DEFAULT NULL,
  `CONTACT` varchar(100) DEFAULT NULL,
  `PHONE` varchar(50) DEFAULT NULL,
  `MOBILENO` varchar(50) DEFAULT NULL,
  `FAXNO` varchar(50) DEFAULT NULL,
  `EMAILADD` varchar(40) DEFAULT NULL,
  `TERMS` int(5) NOT NULL DEFAULT 0,
  `ENTDATE` char(10) DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `creditlimit` double(12,2) DEFAULT 99999999.99,
  `balance` double(12,2) DEFAULT 0.00,
  `BADACCT` char(3) DEFAULT NULL,
  `DISCOUNTPER` double(6,2) DEFAULT 0.00,
  `SMANNAME` varchar(100) DEFAULT NULL,
  `SMANCODE` char(20) DEFAULT NULL,
  `SALESMANID` int(11) DEFAULT NULL,
  `TINNO` varchar(20) DEFAULT NULL,
  `CUSTTYPE` int(1) DEFAULT 1,
  `TYPENAME` varchar(30) DEFAULT 'Retail',
  `ISHIDDEN` char(3) DEFAULT NULL,
  `DRDATE` date DEFAULT NULL,
  PRIMARY KEY (`CUSTOMERID`),
  UNIQUE KEY `custname` (`custname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tblcustomer VALUES("1","CASH SALE","CS001","CAINTA","CAINTA, RIZAL","","JUAN","","","","","0","2020-07-08","","99999999.00","0.00","","0.00","","","","","1","Retail","","");
INSERT INTO tblcustomer VALUES("2","customer 1","c1","a","PASIG CITY","","a","","","","","0","2020-07-09","","1111111.00","0.00","","0.00","","","","","1","Retail","","");



CREATE TABLE `tblcustomeronline` (
  `OCID` int(11) NOT NULL AUTO_INCREMENT,
  `OCNAME` varchar(255) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `AREA` varchar(255) DEFAULT NULL,
  `PHONE` varchar(50) DEFAULT NULL,
  `EMAILADD` varchar(40) DEFAULT NULL,
  `ENTDATE` char(10) DEFAULT NULL,
  `ACCOUNTPASS` varchar(100) DEFAULT 'REQUIRED',
  PRIMARY KEY (`OCID`),
  UNIQUE KEY `custname` (`OCNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO tblcustomeronline VALUES("1","Jimmy","Sto. Domingo, Cainta, Rizal","Cainta, Rizal","23423423","jim@yahoo.com","2020-07-12","234c2a83c30184c6414b5f3d9c93109cc156d299");
INSERT INTO tblcustomeronline VALUES("2","Rose","cubao","qc","09561869090","rosemarie79@yahoo.com","2020-07-15","234c2a83c30184c6414b5f3d9c93109cc156d299");
INSERT INTO tblcustomeronline VALUES("3","Jeremy","ESLA URBAN","Cainta, Rizal","09776070274","markjeremysantos@gmail.com","2020-07-16","7c222fb2927d828af22f592134e8932480637c0d");
INSERT INTO tblcustomeronline VALUES("8","Jeremy Santos","Unit 305, Esla Urban Villas, Esla Homes, Cainta, Rizal, 1900","Cainta, Rizal ","09776070274","markjeremysantos234@gmail.com","2020-07-16","7c222fb2927d828af22f592134e8932480637c0d");
INSERT INTO tblcustomeronline VALUES("12","mark jeremy santos","Cainta Rizal","Rizal Cainta","12345678910","markjeremysantos0512@gmail.com","2020-07-16","7c222fb2927d828af22f592134e8932480637c0d");
INSERT INTO tblcustomeronline VALUES("13","jEREMY 1","unit 305","Cainta, Rizal","0123982342","markjeremysantos1234@gmail.com","2020-07-16","7c222fb2927d828af22f592134e8932480637c0d");
INSERT INTO tblcustomeronline VALUES("14","Jeremy 2","unit 3055","Cainta, Rizal","0123812372","markjeremysantosph@gmail.com","2020-07-16","7c222fb2927d828af22f592134e8932480637c0d");
INSERT INTO tblcustomeronline VALUES("15","jeremy3","unit55","unit 3055","01923923","markjeremy@gmail.com","2020-07-16","7c222fb2927d828af22f592134e8932480637c0d");
INSERT INTO tblcustomeronline VALUES("16","test","32423423eewrw","Cainta, Rizal","3242342","test@yahoo.com","2020-07-16","7c222fb2927d828af22f592134e8932480637c0d");
INSERT INTO tblcustomeronline VALUES("17","Jaimee","Cainta Rizal","Cainta, Rizal","23123123","jam@yahoo.com","2020-07-16","7c222fb2927d828af22f592134e8932480637c0d");



CREATE TABLE `tblforwarders` (
  `FID` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `CONAME` varchar(100) DEFAULT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `CONTACT` varchar(100) DEFAULT NULL,
  `PHONE` varchar(100) DEFAULT NULL,
  `EMAILADD` varchar(255) DEFAULT NULL,
  `RATE` double(12,2) DEFAULT 0.00,
  `ENTDATE` char(10) DEFAULT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tblforwarders VALUES("00000000001","LBC","","JOHN","0912222299","J@J.COM","0.00","2020-07-15");
INSERT INTO tblforwarders VALUES("00000000002","JRS EXPRESS","CUBAO","MIKE","EWAN","EAW","0.00","2020-07-15");



CREATE TABLE `tblholdings` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `REGNAME` varchar(255) DEFAULT NULL,
  `REGADDRESS` varchar(255) DEFAULT NULL,
  `REGCONTACTNO` varchar(255) DEFAULT NULL,
  `REGEMAIL` varchar(255) DEFAULT NULL,
  `LICENSEKEY` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tblholdings VALUES("1","21e091b9bace8960825f5adfaf7f080d048c6582","Unit 305 Esla Urban Villa, Esla Homes, Sto. Domingo, Cainta, Rizal","09278842558","jimmyrsantos@yahoo.com","");



CREATE TABLE `tblicons` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `iconname` varchar(100) DEFAULT NULL,
  `iconcode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=439 DEFAULT CHARSET=latin1;

INSERT INTO tblicons VALUES("1","address-book","fa fa-address-book");
INSERT INTO tblicons VALUES("2","address-book-o","fa fa-address-book-o");
INSERT INTO tblicons VALUES("3","address-card","fa fa-address-card");
INSERT INTO tblicons VALUES("4","address-card-o","fa fa-address-card-o");
INSERT INTO tblicons VALUES("5","adjust","fa fa-adjust");
INSERT INTO tblicons VALUES("6","american-sign-language-interpreting","fa fa-american-sign-language-interpreting");
INSERT INTO tblicons VALUES("7","anchor","fa fa-anchor");
INSERT INTO tblicons VALUES("8","archive","fa fa-archive");
INSERT INTO tblicons VALUES("9","area-chart","fa fa-area-chart");
INSERT INTO tblicons VALUES("10","arrows","fa fa-arrows");
INSERT INTO tblicons VALUES("11","arrows-h","fa fa-arrows-h");
INSERT INTO tblicons VALUES("12","arrows-v","fa fa-arrows-v");
INSERT INTO tblicons VALUES("13","asl-interpreting","fa fa-asl-interpreting");
INSERT INTO tblicons VALUES("14","assistive-listening-systems","fa fa-assistive-listening-systems");
INSERT INTO tblicons VALUES("15","asterisk","fa fa-asterisk");
INSERT INTO tblicons VALUES("16","at","fa fa-at");
INSERT INTO tblicons VALUES("17","automobile","fa fa-automobile");
INSERT INTO tblicons VALUES("18","audio-description","fa fa-audio-description");
INSERT INTO tblicons VALUES("19","balance-scale","fa fa-balance-scale");
INSERT INTO tblicons VALUES("20","ban","fa fa-ban");
INSERT INTO tblicons VALUES("21","bank","fa fa-bank");
INSERT INTO tblicons VALUES("22","bar-chart","fa fa-bar-chart");
INSERT INTO tblicons VALUES("23","bar-chart-o","fa fa-bar-chart-o");
INSERT INTO tblicons VALUES("24","barcode","fa fa-barcode");
INSERT INTO tblicons VALUES("25","bars","fa fa-bars");
INSERT INTO tblicons VALUES("26","bath","fa fa-bath");
INSERT INTO tblicons VALUES("27","bathtub","fa fa-bathtub");
INSERT INTO tblicons VALUES("28","battery-0","fa fa-battery-0");
INSERT INTO tblicons VALUES("29","battery-1","fa fa-battery-1");
INSERT INTO tblicons VALUES("30","battery-2","fa fa-battery-2");
INSERT INTO tblicons VALUES("31","battery-3","fa fa-battery-3");
INSERT INTO tblicons VALUES("32","battery-4","fa fa-battery-4");
INSERT INTO tblicons VALUES("33","battery-empty","fa fa-battery-empty");
INSERT INTO tblicons VALUES("34","battery-full","fa fa-battery-full");
INSERT INTO tblicons VALUES("35","battery-half","fa fa-battery-half");
INSERT INTO tblicons VALUES("36","battery-quarter","fa fa-battery-quarter");
INSERT INTO tblicons VALUES("37","battery-three-quarters","fa fa-battery-three-quarters");
INSERT INTO tblicons VALUES("38","bed","fa fa-bed");
INSERT INTO tblicons VALUES("39","beer","fa fa-beer");
INSERT INTO tblicons VALUES("40","bell","fa fa-bell");
INSERT INTO tblicons VALUES("41","bell-o","fa fa-bell-o");
INSERT INTO tblicons VALUES("42","bell-slash","fa fa-bell-slash");
INSERT INTO tblicons VALUES("43","bell-slash-o","fa fa-bell-slash-o");
INSERT INTO tblicons VALUES("44","bicycle","fa fa-bicycle");
INSERT INTO tblicons VALUES("45","binoculars","fa fa-binoculars");
INSERT INTO tblicons VALUES("46","birthday-cake","fa fa-birthday-cake");
INSERT INTO tblicons VALUES("47","blind","fa fa-blind");
INSERT INTO tblicons VALUES("48","bolt","fa fa-bolt");
INSERT INTO tblicons VALUES("49","bomb","fa fa-bomb");
INSERT INTO tblicons VALUES("50","book","fa fa-book");
INSERT INTO tblicons VALUES("51","bookmark","fa fa-bookmark");
INSERT INTO tblicons VALUES("52","bookmark-o","fa fa-bookmark-o");
INSERT INTO tblicons VALUES("53","braille","fa fa-braille");
INSERT INTO tblicons VALUES("54","briefcase","fa fa-briefcase");
INSERT INTO tblicons VALUES("55","bug","fa fa-bug");
INSERT INTO tblicons VALUES("56","building","fa fa-building");
INSERT INTO tblicons VALUES("57","building-o","fa fa-building-o");
INSERT INTO tblicons VALUES("58","bullhorn","fa fa-bullhorn");
INSERT INTO tblicons VALUES("59","bullseye","fa fa-bullseye");
INSERT INTO tblicons VALUES("60","bus","fa fa-bus");
INSERT INTO tblicons VALUES("61","cab","fa fa-cab");
INSERT INTO tblicons VALUES("62","calculator","fa fa-calculator");
INSERT INTO tblicons VALUES("63","calendar","fa fa-calendar");
INSERT INTO tblicons VALUES("64","calendar-o","fa fa-calendar-o");
INSERT INTO tblicons VALUES("65","calendar-check-o","fa fa-calendar-check-o");
INSERT INTO tblicons VALUES("66","calendar-minus-o","fa fa-calendar-minus-o");
INSERT INTO tblicons VALUES("67","calendar-plus-o","fa fa-calendar-plus-o");
INSERT INTO tblicons VALUES("68","calendar-times-o","fa fa-calendar-times-o");
INSERT INTO tblicons VALUES("69","camera","fa fa-camera");
INSERT INTO tblicons VALUES("70","camera-retro","fa fa-camera-retro");
INSERT INTO tblicons VALUES("71","car","fa fa-car");
INSERT INTO tblicons VALUES("72","caret-square-o-down","fa fa-caret-square-o-down");
INSERT INTO tblicons VALUES("73","caret-square-o-left","fa fa-caret-square-o-left");
INSERT INTO tblicons VALUES("74","caret-square-o-right","fa fa-caret-square-o-right");
INSERT INTO tblicons VALUES("75","caret-square-o-up","fa fa-caret-square-o-up");
INSERT INTO tblicons VALUES("76","cart-arrow-down","fa fa-cart-arrow-down");
INSERT INTO tblicons VALUES("77","cart-plus","fa fa-cart-plus");
INSERT INTO tblicons VALUES("78","cc","fa fa-cc");
INSERT INTO tblicons VALUES("79","certificate","fa fa-certificate");
INSERT INTO tblicons VALUES("80","check","fa fa-check");
INSERT INTO tblicons VALUES("81","check-circle","fa fa-check-circle");
INSERT INTO tblicons VALUES("82","check-circle-o","fa fa-check-circle-o");
INSERT INTO tblicons VALUES("83","check-square","fa fa-check-square");
INSERT INTO tblicons VALUES("84","check-square-o","fa fa-check-square-o");
INSERT INTO tblicons VALUES("85","child","fa fa-child");
INSERT INTO tblicons VALUES("86","circle","fa fa-circle");
INSERT INTO tblicons VALUES("87","circle-o","fa fa-circle-o");
INSERT INTO tblicons VALUES("88","circle-o-notch","fa fa-circle-o-notch");
INSERT INTO tblicons VALUES("89","circle-thin","fa fa-circle-thin");
INSERT INTO tblicons VALUES("90","clock-o","fa fa-clock-o");
INSERT INTO tblicons VALUES("91","clone","fa fa-clone");
INSERT INTO tblicons VALUES("92","close","fa fa-close");
INSERT INTO tblicons VALUES("93","cloud","fa fa-cloud");
INSERT INTO tblicons VALUES("94","cloud-download","fa fa-cloud-download");
INSERT INTO tblicons VALUES("95","cloud-upload","fa fa-cloud-upload");
INSERT INTO tblicons VALUES("96","code","fa fa-code");
INSERT INTO tblicons VALUES("97","code-fork","fa fa-code-fork");
INSERT INTO tblicons VALUES("98","coffee","fa fa-coffee");
INSERT INTO tblicons VALUES("99","cog","fa fa-cog");
INSERT INTO tblicons VALUES("100","cogs","fa fa-cogs");
INSERT INTO tblicons VALUES("101","comment","fa fa-comment");
INSERT INTO tblicons VALUES("102","comment-o","fa fa-comment-o");
INSERT INTO tblicons VALUES("103","comments","fa fa-comments");
INSERT INTO tblicons VALUES("104","comments-o","fa fa-comments-o");
INSERT INTO tblicons VALUES("105","commenting","fa fa-commenting");
INSERT INTO tblicons VALUES("106","commenting-o","fa fa-commenting-o");
INSERT INTO tblicons VALUES("107","compass","fa fa-compass");
INSERT INTO tblicons VALUES("108","copyright","fa fa-copyright");
INSERT INTO tblicons VALUES("109","credit-card","fa fa-credit-card");
INSERT INTO tblicons VALUES("110","credit-card-alt","fa fa-credit-card-alt");
INSERT INTO tblicons VALUES("111","creative-commons","fa fa-creative-commons");
INSERT INTO tblicons VALUES("112","crop","fa fa-crop");
INSERT INTO tblicons VALUES("113","crosshairs","fa fa-crosshairs");
INSERT INTO tblicons VALUES("114","cube","fa fa-cube");
INSERT INTO tblicons VALUES("115","cubes","fa fa-cubes");
INSERT INTO tblicons VALUES("116","cutlery","fa fa-cutlery");
INSERT INTO tblicons VALUES("117","dashboard","fa fa-dashboard");
INSERT INTO tblicons VALUES("118","database","fa fa-database");
INSERT INTO tblicons VALUES("119","deaf","fa fa-deaf");
INSERT INTO tblicons VALUES("120","deafness","fa fa-deafness");
INSERT INTO tblicons VALUES("121","desktop","fa fa-desktop");
INSERT INTO tblicons VALUES("122","diamond","fa fa-diamond");
INSERT INTO tblicons VALUES("123","dot-circle-o","fa fa-dot-circle-o");
INSERT INTO tblicons VALUES("124","download","fa fa-download");
INSERT INTO tblicons VALUES("125","drivers-license","fa fa-drivers-license");
INSERT INTO tblicons VALUES("126","drivers-license-o","fa fa-drivers-license-o");
INSERT INTO tblicons VALUES("127","edit","fa fa-edit");
INSERT INTO tblicons VALUES("128","ellipsis-h","fa fa-ellipsis-h");
INSERT INTO tblicons VALUES("129","ellipsis-v","fa fa-ellipsis-v");
INSERT INTO tblicons VALUES("130","envelope","fa fa-envelope");
INSERT INTO tblicons VALUES("131","envelope-o","fa fa-envelope-o");
INSERT INTO tblicons VALUES("132","envelope-open","fa fa-envelope-open");
INSERT INTO tblicons VALUES("133","envelope-open-o","fa fa-envelope-open-o");
INSERT INTO tblicons VALUES("134","envelope-square","fa fa-envelope-square");
INSERT INTO tblicons VALUES("135","eraser","fa fa-eraser");
INSERT INTO tblicons VALUES("136","exchange","fa fa-exchange");
INSERT INTO tblicons VALUES("137","exclamation","fa fa-exclamation");
INSERT INTO tblicons VALUES("138","exclamation-circle","fa fa-exclamation-circle");
INSERT INTO tblicons VALUES("139","exclamation-triangle","fa fa-exclamation-triangle");
INSERT INTO tblicons VALUES("140","external-link","fa fa-external-link");
INSERT INTO tblicons VALUES("141","external-link-square","fa fa-external-link-square");
INSERT INTO tblicons VALUES("142","eye","fa fa-eye");
INSERT INTO tblicons VALUES("143","eye-slash","fa fa-eye-slash");
INSERT INTO tblicons VALUES("144","eyedropper","fa fa-eyedropper");
INSERT INTO tblicons VALUES("145","fax","fa fa-fax");
INSERT INTO tblicons VALUES("146","female","fa fa-female");
INSERT INTO tblicons VALUES("147","fighter-jet","fa fa-fighter-jet");
INSERT INTO tblicons VALUES("148","file-archive-o","fa fa-file-archive-o");
INSERT INTO tblicons VALUES("149","file-audio-o","fa fa-file-audio-o");
INSERT INTO tblicons VALUES("150","file-code-o","fa fa-file-code-o");
INSERT INTO tblicons VALUES("151","file-excel-o","fa fa-file-excel-o");
INSERT INTO tblicons VALUES("152","file-image-o","fa fa-file-image-o");
INSERT INTO tblicons VALUES("153","file-movie-o","fa fa-file-movie-o");
INSERT INTO tblicons VALUES("154","file-pdf-o","fa fa-file-pdf-o");
INSERT INTO tblicons VALUES("155","file-photo-o","fa fa-file-photo-o");
INSERT INTO tblicons VALUES("156","file-picture-o","fa fa-file-picture-o");
INSERT INTO tblicons VALUES("157","file-powerpoint-o","fa fa-file-powerpoint-o");
INSERT INTO tblicons VALUES("158","file-sound-o","fa fa-file-sound-o");
INSERT INTO tblicons VALUES("159","file-video-o","fa fa-file-video-o");
INSERT INTO tblicons VALUES("160","file-word-o","fa fa-file-word-o");
INSERT INTO tblicons VALUES("161","file-zip-o","fa fa-file-zip-o");
INSERT INTO tblicons VALUES("162","film","fa fa-film");
INSERT INTO tblicons VALUES("163","filter","fa fa-filter");
INSERT INTO tblicons VALUES("164","fire","fa fa-fire");
INSERT INTO tblicons VALUES("165","fire-extinguisher","fa fa-fire-extinguisher");
INSERT INTO tblicons VALUES("166","flag","fa fa-flag");
INSERT INTO tblicons VALUES("167","flag-checkered","fa fa-flag-checkered");
INSERT INTO tblicons VALUES("168","flag-o","fa fa-flag-o");
INSERT INTO tblicons VALUES("169","flash","fa fa-flash");
INSERT INTO tblicons VALUES("170","flask","fa fa-flask");
INSERT INTO tblicons VALUES("171","folder","fa fa-folder");
INSERT INTO tblicons VALUES("172","folder-o","fa fa-folder-o");
INSERT INTO tblicons VALUES("173","folder-open","fa fa-folder-open");
INSERT INTO tblicons VALUES("174","folder-open-o","fa fa-folder-open-o");
INSERT INTO tblicons VALUES("175","frown-o","fa fa-frown-o");
INSERT INTO tblicons VALUES("176","futbol-o","fa fa-futbol-o");
INSERT INTO tblicons VALUES("177","gamepad","fa fa-gamepad");
INSERT INTO tblicons VALUES("178","gavel","fa fa-gavel");
INSERT INTO tblicons VALUES("179","gear","fa fa-gear");
INSERT INTO tblicons VALUES("180","gears","fa fa-gears");
INSERT INTO tblicons VALUES("181","genderless","fa fa-genderless");
INSERT INTO tblicons VALUES("182","gift","fa fa-gift");
INSERT INTO tblicons VALUES("183","glass","fa fa-glass");
INSERT INTO tblicons VALUES("184","globe","fa fa-globe");
INSERT INTO tblicons VALUES("185","graduation-cap","fa fa-graduation-cap");
INSERT INTO tblicons VALUES("186","group","fa fa-group");
INSERT INTO tblicons VALUES("187","hard-of-hearing","fa fa-hard-of-hearing");
INSERT INTO tblicons VALUES("188","hdd-o","fa fa-hdd-o");
INSERT INTO tblicons VALUES("189","handshake-o","fa fa-handshake-o");
INSERT INTO tblicons VALUES("190","hashtag","fa fa-hashtag");
INSERT INTO tblicons VALUES("191","headphones","fa fa-headphones");
INSERT INTO tblicons VALUES("192","heart","fa fa-heart");
INSERT INTO tblicons VALUES("193","heart-o","fa fa-heart-o");
INSERT INTO tblicons VALUES("194","heartbeat","fa fa-heartbeat");
INSERT INTO tblicons VALUES("195","history","fa fa-history");
INSERT INTO tblicons VALUES("196","home","fa fa-home");
INSERT INTO tblicons VALUES("197","hotel","fa fa-hotel");
INSERT INTO tblicons VALUES("198","hourglass","fa fa-hourglass");
INSERT INTO tblicons VALUES("199","hourglass-1","fa fa-hourglass-1");
INSERT INTO tblicons VALUES("200","hourglass-2","fa fa-hourglass-2");
INSERT INTO tblicons VALUES("201","hourglass-3","fa fa-hourglass-3");
INSERT INTO tblicons VALUES("202","hourglass-end","fa fa-hourglass-end");
INSERT INTO tblicons VALUES("203","hourglass-half","fa fa-hourglass-half");
INSERT INTO tblicons VALUES("204","hourglass-o","fa fa-hourglass-o");
INSERT INTO tblicons VALUES("205","hourglass-start","fa fa-hourglass-start");
INSERT INTO tblicons VALUES("206","i-cursor","fa fa-i-cursor");
INSERT INTO tblicons VALUES("207","id-badge","fa fa-id-badge");
INSERT INTO tblicons VALUES("208","id-card","fa fa-id-card");
INSERT INTO tblicons VALUES("209","id-card-o","fa fa-id-card-o");
INSERT INTO tblicons VALUES("210","image","fa fa-image");
INSERT INTO tblicons VALUES("211","inbox","fa fa-inbox");
INSERT INTO tblicons VALUES("212","industry","fa fa-industry");
INSERT INTO tblicons VALUES("213","info","fa fa-info");
INSERT INTO tblicons VALUES("214","info-circle","fa fa-info-circle");
INSERT INTO tblicons VALUES("215","institution","fa fa-institution");
INSERT INTO tblicons VALUES("216","key","fa fa-key");
INSERT INTO tblicons VALUES("217","keyboard-o","fa fa-keyboard-o");
INSERT INTO tblicons VALUES("218","language","fa fa-language");
INSERT INTO tblicons VALUES("219","laptop","fa fa-laptop");
INSERT INTO tblicons VALUES("220","leaf","fa fa-leaf");
INSERT INTO tblicons VALUES("221","legal","fa fa-legal");
INSERT INTO tblicons VALUES("222","lemon-o","fa fa-lemon-o");
INSERT INTO tblicons VALUES("223","level-down","fa fa-level-down");
INSERT INTO tblicons VALUES("224","level-up","fa fa-level-up");
INSERT INTO tblicons VALUES("225","life-bouy","fa fa-life-bouy");
INSERT INTO tblicons VALUES("226","life-buoy","fa fa-life-buoy");
INSERT INTO tblicons VALUES("227","life-ring","fa fa-life-ring");
INSERT INTO tblicons VALUES("228","life-saver","fa fa-life-saver");
INSERT INTO tblicons VALUES("229","lightbulb-o","fa fa-lightbulb-o");
INSERT INTO tblicons VALUES("230","line-chart","fa fa-line-chart");
INSERT INTO tblicons VALUES("231","location-arrow","fa fa-location-arrow");
INSERT INTO tblicons VALUES("232","lock","fa fa-lock");
INSERT INTO tblicons VALUES("233","low-vision","fa fa-low-vision");
INSERT INTO tblicons VALUES("234","magic","fa fa-magic");
INSERT INTO tblicons VALUES("235","magnet","fa fa-magnet");
INSERT INTO tblicons VALUES("236","mail-forward","fa fa-mail-forward");
INSERT INTO tblicons VALUES("237","mail-reply","fa fa-mail-reply");
INSERT INTO tblicons VALUES("238","mail-reply-all","fa fa-mail-reply-all");
INSERT INTO tblicons VALUES("239","male","fa fa-male");
INSERT INTO tblicons VALUES("240","map","fa fa-map");
INSERT INTO tblicons VALUES("241","map-o","fa fa-map-o");
INSERT INTO tblicons VALUES("242","map-pin","fa fa-map-pin");
INSERT INTO tblicons VALUES("243","map-signs","fa fa-map-signs");
INSERT INTO tblicons VALUES("244","map-marker","fa fa-map-marker");
INSERT INTO tblicons VALUES("245","meh-o","fa fa-meh-o");
INSERT INTO tblicons VALUES("246","microchip","fa fa-microchip");
INSERT INTO tblicons VALUES("247","microphone","fa fa-microphone");
INSERT INTO tblicons VALUES("248","microphone-slash","fa fa-microphone-slash");
INSERT INTO tblicons VALUES("249","minus","fa fa-minus");
INSERT INTO tblicons VALUES("250","minus-circle","fa fa-minus-circle");
INSERT INTO tblicons VALUES("251","minus-square","fa fa-minus-square");
INSERT INTO tblicons VALUES("252","minus-square-o","fa fa-minus-square-o");
INSERT INTO tblicons VALUES("253","mobile","fa fa-mobile");
INSERT INTO tblicons VALUES("254","mobile-phone","fa fa-mobile-phone");
INSERT INTO tblicons VALUES("255","money","fa fa-money");
INSERT INTO tblicons VALUES("256","moon-o","fa fa-moon-o");
INSERT INTO tblicons VALUES("257","mortar-board","fa fa-mortar-board");
INSERT INTO tblicons VALUES("258","motorcycle","fa fa-motorcycle");
INSERT INTO tblicons VALUES("259","mouse-pointer","fa fa-mouse-pointer");
INSERT INTO tblicons VALUES("260","music","fa fa-music");
INSERT INTO tblicons VALUES("261","navicon","fa fa-navicon");
INSERT INTO tblicons VALUES("262","newspaper-o","fa fa-newspaper-o");
INSERT INTO tblicons VALUES("263","object-group","fa fa-object-group");
INSERT INTO tblicons VALUES("264","object-ungroup","fa fa-object-ungroup");
INSERT INTO tblicons VALUES("265","paint-brush","fa fa-paint-brush");
INSERT INTO tblicons VALUES("266","paper-plane","fa fa-paper-plane");
INSERT INTO tblicons VALUES("267","paper-plane-o","fa fa-paper-plane-o");
INSERT INTO tblicons VALUES("268","paw","fa fa-paw");
INSERT INTO tblicons VALUES("269","pencil","fa fa-pencil");
INSERT INTO tblicons VALUES("270","pencil-square","fa fa-pencil-square");
INSERT INTO tblicons VALUES("271","pencil-square-o","fa fa-pencil-square-o");
INSERT INTO tblicons VALUES("272","percent","fa fa-percent");
INSERT INTO tblicons VALUES("273","phone","fa fa-phone");
INSERT INTO tblicons VALUES("274","phone-square","fa fa-phone-square");
INSERT INTO tblicons VALUES("275","photo","fa fa-photo");
INSERT INTO tblicons VALUES("276","picture-o","fa fa-picture-o");
INSERT INTO tblicons VALUES("277","pie-chart","fa fa-pie-chart");
INSERT INTO tblicons VALUES("278","plane","fa fa-plane");
INSERT INTO tblicons VALUES("279","plug","fa fa-plug");
INSERT INTO tblicons VALUES("280","plus","fa fa-plus");
INSERT INTO tblicons VALUES("281","plus-circle","fa fa-plus-circle");
INSERT INTO tblicons VALUES("282","plus-square","fa fa-plus-square");
INSERT INTO tblicons VALUES("283","plus-square-o","fa fa-plus-square-o");
INSERT INTO tblicons VALUES("284","podcast","fa fa-podcast");
INSERT INTO tblicons VALUES("285","power-off","fa fa-power-off");
INSERT INTO tblicons VALUES("286","print","fa fa-print");
INSERT INTO tblicons VALUES("287","puzzle-piece","fa fa-puzzle-piece");
INSERT INTO tblicons VALUES("288","qrcode","fa fa-qrcode");
INSERT INTO tblicons VALUES("289","question","fa fa-question");
INSERT INTO tblicons VALUES("290","question-circle","fa fa-question-circle");
INSERT INTO tblicons VALUES("291","question-circle-o","fa fa-question-circle-o");
INSERT INTO tblicons VALUES("292","quote-left","fa fa-quote-left");
INSERT INTO tblicons VALUES("293","quote-right","fa fa-quote-right");
INSERT INTO tblicons VALUES("294","random","fa fa-random");
INSERT INTO tblicons VALUES("295","recycle","fa fa-recycle");
INSERT INTO tblicons VALUES("296","refresh","fa fa-refresh");
INSERT INTO tblicons VALUES("297","registered","fa fa-registered");
INSERT INTO tblicons VALUES("298","remove","fa fa-remove");
INSERT INTO tblicons VALUES("299","reorder","fa fa-reorder");
INSERT INTO tblicons VALUES("300","reply","fa fa-reply");
INSERT INTO tblicons VALUES("301","reply-all","fa fa-reply-all");
INSERT INTO tblicons VALUES("302","retweet","fa fa-retweet");
INSERT INTO tblicons VALUES("303","road","fa fa-road");
INSERT INTO tblicons VALUES("304","rocket","fa fa-rocket");
INSERT INTO tblicons VALUES("305","rss","fa fa-rss");
INSERT INTO tblicons VALUES("306","rss-square","fa fa-rss-square");
INSERT INTO tblicons VALUES("307","s15","fa fa-s15");
INSERT INTO tblicons VALUES("308","search","fa fa-search");
INSERT INTO tblicons VALUES("309","search-minus","fa fa-search-minus");
INSERT INTO tblicons VALUES("310","search-plus","fa fa-search-plus");
INSERT INTO tblicons VALUES("311","send","fa fa-send");
INSERT INTO tblicons VALUES("312","send-o","fa fa-send-o");
INSERT INTO tblicons VALUES("313","server","fa fa-server");
INSERT INTO tblicons VALUES("314","share","fa fa-share");
INSERT INTO tblicons VALUES("315","share-alt","fa fa-share-alt");
INSERT INTO tblicons VALUES("316","share-alt-square","fa fa-share-alt-square");
INSERT INTO tblicons VALUES("317","share-square","fa fa-share-square");
INSERT INTO tblicons VALUES("318","share-square-o","fa fa-share-square-o");
INSERT INTO tblicons VALUES("319","shield","fa fa-shield");
INSERT INTO tblicons VALUES("320","ship","fa fa-ship");
INSERT INTO tblicons VALUES("321","shopping-bag","fa fa-shopping-bag");
INSERT INTO tblicons VALUES("322","shopping-basket","fa fa-shopping-basket");
INSERT INTO tblicons VALUES("323","shopping-cart","fa fa-shopping-cart");
INSERT INTO tblicons VALUES("324","shower","fa fa-shower");
INSERT INTO tblicons VALUES("325","sign-in","fa fa-sign-in");
INSERT INTO tblicons VALUES("326","sign-out","fa fa-sign-out");
INSERT INTO tblicons VALUES("327","sign-language","fa fa-sign-language");
INSERT INTO tblicons VALUES("328","signal","fa fa-signal");
INSERT INTO tblicons VALUES("329","signing","fa fa-signing");
INSERT INTO tblicons VALUES("330","sitemap","fa fa-sitemap");
INSERT INTO tblicons VALUES("331","sliders","fa fa-sliders");
INSERT INTO tblicons VALUES("332","smile-o","fa fa-smile-o");
INSERT INTO tblicons VALUES("333","snowflake-o","fa fa-snowflake-o");
INSERT INTO tblicons VALUES("334","soccer-ball-o","fa fa-soccer-ball-o");
INSERT INTO tblicons VALUES("335","sort","fa fa-sort");
INSERT INTO tblicons VALUES("336","sort-alpha-asc","fa fa-sort-alpha-asc");
INSERT INTO tblicons VALUES("337","sort-alpha-desc","fa fa-sort-alpha-desc");
INSERT INTO tblicons VALUES("338","sort-amount-asc","fa fa-sort-amount-asc");
INSERT INTO tblicons VALUES("339","sort-amount-desc","fa fa-sort-amount-desc");
INSERT INTO tblicons VALUES("340","sort-asc","fa fa-sort-asc");
INSERT INTO tblicons VALUES("341","sort-desc","fa fa-sort-desc");
INSERT INTO tblicons VALUES("342","sort-down","fa fa-sort-down");
INSERT INTO tblicons VALUES("343","sort-numeric-asc","fa fa-sort-numeric-asc");
INSERT INTO tblicons VALUES("344","sort-numeric-desc","fa fa-sort-numeric-desc");
INSERT INTO tblicons VALUES("345","sort-up","fa fa-sort-up");
INSERT INTO tblicons VALUES("346","space-shuttle","fa fa-space-shuttle");
INSERT INTO tblicons VALUES("347","spinner","fa fa-spinner");
INSERT INTO tblicons VALUES("348","spoon","fa fa-spoon");
INSERT INTO tblicons VALUES("349","square","fa fa-square");
INSERT INTO tblicons VALUES("350","square-o","fa fa-square-o");
INSERT INTO tblicons VALUES("351","star","fa fa-star");
INSERT INTO tblicons VALUES("352","star-half","fa fa-star-half");
INSERT INTO tblicons VALUES("353","star-half-empty","fa fa-star-half-empty");
INSERT INTO tblicons VALUES("354","star-half-full","fa fa-star-half-full");
INSERT INTO tblicons VALUES("355","star-half-o","fa fa-star-half-o");
INSERT INTO tblicons VALUES("356","star-o","fa fa-star-o");
INSERT INTO tblicons VALUES("357","sticky-note","fa fa-sticky-note");
INSERT INTO tblicons VALUES("358","sticky-note-o","fa fa-sticky-note-o");
INSERT INTO tblicons VALUES("359","street-view","fa fa-street-view");
INSERT INTO tblicons VALUES("360","suitcase","fa fa-suitcase");
INSERT INTO tblicons VALUES("361","sun-o","fa fa-sun-o");
INSERT INTO tblicons VALUES("362","support","fa fa-support");
INSERT INTO tblicons VALUES("363","tablet","fa fa-tablet");
INSERT INTO tblicons VALUES("364","tachometer","fa fa-tachometer");
INSERT INTO tblicons VALUES("365","tag","fa fa-tag");
INSERT INTO tblicons VALUES("366","tags","fa fa-tags");
INSERT INTO tblicons VALUES("367","tasks","fa fa-tasks");
INSERT INTO tblicons VALUES("368","taxi","fa fa-taxi");
INSERT INTO tblicons VALUES("369","television","fa fa-television");
INSERT INTO tblicons VALUES("370","terminal","fa fa-terminal");
INSERT INTO tblicons VALUES("371","thermometer","fa fa-thermometer");
INSERT INTO tblicons VALUES("372","thermometer-0","fa fa-thermometer-0");
INSERT INTO tblicons VALUES("373","thermometer-1","fa fa-thermometer-1");
INSERT INTO tblicons VALUES("374","thermometer-2","fa fa-thermometer-2");
INSERT INTO tblicons VALUES("375","thermometer-3","fa fa-thermometer-3");
INSERT INTO tblicons VALUES("376","thermometer-4","fa fa-thermometer-4");
INSERT INTO tblicons VALUES("377","thermometer-empty","fa fa-thermometer-empty");
INSERT INTO tblicons VALUES("378","thermometer-full","fa fa-thermometer-full");
INSERT INTO tblicons VALUES("379","thermometer-half","fa fa-thermometer-half");
INSERT INTO tblicons VALUES("380","thermometer-quarter","fa fa-thermometer-quarter");
INSERT INTO tblicons VALUES("381","thermometer-three-quarters","fa fa-thermometer-three-quarters");
INSERT INTO tblicons VALUES("382","thumb-tack","fa fa-thumb-tack");
INSERT INTO tblicons VALUES("383","thumbs-down","fa fa-thumbs-down");
INSERT INTO tblicons VALUES("384","thumbs-o-up","fa fa-thumbs-o-up");
INSERT INTO tblicons VALUES("385","thumbs-up","fa fa-thumbs-up");
INSERT INTO tblicons VALUES("386","ticket","fa fa-ticket");
INSERT INTO tblicons VALUES("387","times","fa fa-times");
INSERT INTO tblicons VALUES("388","times-circle","fa fa-times-circle");
INSERT INTO tblicons VALUES("389","times-circle-o","fa fa-times-circle-o");
INSERT INTO tblicons VALUES("390","times-rectangle","fa fa-times-rectangle");
INSERT INTO tblicons VALUES("391","times-rectangle-o","fa fa-times-rectangle-o");
INSERT INTO tblicons VALUES("392","tint","fa fa-tint");
INSERT INTO tblicons VALUES("393","toggle-down","fa fa-toggle-down");
INSERT INTO tblicons VALUES("394","toggle-left","fa fa-toggle-left");
INSERT INTO tblicons VALUES("395","toggle-right","fa fa-toggle-right");
INSERT INTO tblicons VALUES("396","toggle-up","fa fa-toggle-up");
INSERT INTO tblicons VALUES("397","toggle-off","fa fa-toggle-off");
INSERT INTO tblicons VALUES("398","toggle-on","fa fa-toggle-on");
INSERT INTO tblicons VALUES("399","trademark","fa fa-trademark");
INSERT INTO tblicons VALUES("400","trash","fa fa-trash");
INSERT INTO tblicons VALUES("401","trash-o","fa fa-trash-o");
INSERT INTO tblicons VALUES("402","tree","fa fa-tree");
INSERT INTO tblicons VALUES("403","trophy","fa fa-trophy");
INSERT INTO tblicons VALUES("404","truck","fa fa-truck");
INSERT INTO tblicons VALUES("405","tty","fa fa-tty");
INSERT INTO tblicons VALUES("406","tv","fa fa-tv");
INSERT INTO tblicons VALUES("407","umbrella","fa fa-umbrella");
INSERT INTO tblicons VALUES("408","universal-access","fa fa-universal-access");
INSERT INTO tblicons VALUES("409","university","fa fa-university");
INSERT INTO tblicons VALUES("410","unlock","fa fa-unlock");
INSERT INTO tblicons VALUES("411","unlock-alt","fa fa-unlock-alt");
INSERT INTO tblicons VALUES("412","unsorted","fa fa-unsorted");
INSERT INTO tblicons VALUES("413","upload","fa fa-upload");
INSERT INTO tblicons VALUES("414","user","fa fa-user");
INSERT INTO tblicons VALUES("415","user-circle","fa fa-user-circle");
INSERT INTO tblicons VALUES("416","user-circle-o","fa fa-user-circle-o");
INSERT INTO tblicons VALUES("417","user-o","fa fa-user-o");
INSERT INTO tblicons VALUES("418","user-plus","fa fa-user-plus");
INSERT INTO tblicons VALUES("419","user-secret","fa fa-user-secret");
INSERT INTO tblicons VALUES("420","user-times","fa fa-user-times");
INSERT INTO tblicons VALUES("421","users","fa fa-users");
INSERT INTO tblicons VALUES("422","vcard","fa fa-vcard");
INSERT INTO tblicons VALUES("423","vcard-o","fa fa-vcard-o");
INSERT INTO tblicons VALUES("424","video-camera","fa fa-video-camera");
INSERT INTO tblicons VALUES("425","volume-control-phone","fa fa-volume-control-phone");
INSERT INTO tblicons VALUES("426","volume-down","fa fa-volume-down");
INSERT INTO tblicons VALUES("427","volume-off","fa fa-volume-off");
INSERT INTO tblicons VALUES("428","volume-up","fa fa-volume-up");
INSERT INTO tblicons VALUES("429","warning","fa fa-warning");
INSERT INTO tblicons VALUES("430","wheelchair","fa fa-wheelchair");
INSERT INTO tblicons VALUES("431","wheelchair-alt","fa fa-wheelchair-alt");
INSERT INTO tblicons VALUES("432","window-close","fa fa-window-close");
INSERT INTO tblicons VALUES("433","window-close-o","fa fa-window-close-o");
INSERT INTO tblicons VALUES("434","window-maximize","fa fa-window-maximize");
INSERT INTO tblicons VALUES("435","window-minimize","fa fa-window-minimize");
INSERT INTO tblicons VALUES("436","window-restore","fa fa-window-restore");
INSERT INTO tblicons VALUES("437","wifi","fa fa-wifi");
INSERT INTO tblicons VALUES("438","wrench","fa fa-wrench");



CREATE TABLE `tblitembrand` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ITEMBRAND` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `ITEMBRAND` (`ITEMBRAND`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tblitembrand VALUES("1","MALL BRAND");



CREATE TABLE `tblitemmake` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ITEMMAKE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `ITEMMAKE` (`ITEMMAKE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblmenu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `menucode` varchar(50) DEFAULT NULL,
  `groupmenu` varchar(255) DEFAULT NULL,
  `menutype` int(5) DEFAULT 0,
  `link` varchar(255) DEFAULT NULL,
  `tblName` varchar(50) DEFAULT NULL,
  `tblName2` varchar(255) DEFAULT NULL,
  `queryString` longtext DEFAULT NULL,
  `queryString2` longtext DEFAULT NULL,
  `dtColumns` longtext DEFAULT NULL,
  `dtColumnHeader` longtext DEFAULT NULL,
  `dtColnumeric` longtext DEFAULT NULL,
  `dtColGroup` char(10) DEFAULT '-1',
  `dtColSpan` int(3) DEFAULT 1,
  `dtColTotal` longtext DEFAULT NULL,
  `dtFunction` longtext DEFAULT NULL,
  `dtPaperSize` char(20) DEFAULT 'paper',
  `dtOrientation` varchar(20) DEFAULT 'portrait',
  `icon` varchar(255) DEFAULT NULL,
  `caret` varchar(255) DEFAULT NULL,
  `USERID` varchar(255) DEFAULT NULL,
  `STATUS` int(1) DEFAULT 0,
  `dbcolumn` int(1) DEFAULT 1,
  `dtrange` char(10) DEFAULT 'no',
  `asof` char(20) DEFAULT 'no',
  `bygroup` longtext DEFAULT NULL,
  `func_name` varchar(255) DEFAULT NULL,
  `sorting` longtext DEFAULT NULL,
  `where_filter` longtext DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `menucode` (`menucode`,`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1;

INSERT INTO tblmenu VALUES("1","Master File","1000","1000","1","#","tblProduct","","","","","","","","1","","","","","fa fa-bar-chart fa-fw","fa fa-caret-down","128","","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","INACTIVE !='No'");
INSERT INTO tblmenu VALUES("2","Products","1001A","1000","2","dataGridForm","tblproduct","","SELECT *, PROID AS KEYID FROM tblproduct","","[{ 	"colName": "KEYID", 
	"idName": "PROID", 
	"Upload": "IMAGES",
	"title": "ID", 
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "PRONAME", 
	"title": "Description",
	"tdStyle":"width='350'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "PROCODE", 
	"title": "Code", 
	
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "ITEMBRAND", 
	"title": "Brand", 
	
	
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=ITEMBRAND',  method:'get',  valueField:'id', textField:'text',  panelHeight:'auto'" 
},{ 	"colName": "CATEGORIES", 
	"title": "Category", 
	
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=CATEGORIES',  method:'get',  valueField:'id', textField:'text',  panelHeight:'auto'" 
},{ 	"colName": "COLOR", 
	"title": "Color", 
	
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=COLOR',  method:'get',  valueField:'id', textField:'text',  panelHeight:'auto'" 
},{ 	"colName": "entdate", 
	"title": "Date", 
	
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""
},{ 	"colName": "PROQTY", 
	"title": "Qty", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"spinner", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberspinner",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "UNIT", 
	"title": "Unit", 
	
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"cssStyle":" style='width:250px'",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "PROPRICE", 
	"title": "Sell Price", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"number", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "WPROPRICE", 
	"title": "WHOLESALE", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"number", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "PURPRICE", 
	"title": "Unit Cost", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"number", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "AVGCOST", 
	"title": "Avg. Cost", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"number", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "IMAGES", 
	"title": "Picture", 
	"tdStyle":"align='right'",
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
}]

","","","","70","","","","","fa fa-bars fa-fw","","128","","1","no","no","","PrintDataView","","where concat(if(ISNULL(PRONAME) ,"",PRONAME), if(ISNULL(ITEMBRAND),"",ITEMBRAND), if(ISNULL(CATEGORIES),"",CATEGORIES)) like");
INSERT INTO tblmenu VALUES("3","Categories","1005","1000","2","dataGridForm","tblcategory","","SELECT *, CATEGID AS KEYID FROM tblcategory","","[{ 	"colName": "KEYID", 
	"title": "ID",
	"idName":"CATEGID", 
	"tdStyle":"width='10%'",
	"display": "yes", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "CATEGORIES", 
	"title": "Category", 
	"tdStyle":"width='90%'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
}]
","","","","50","","","","","fa fa-cubes fa-fw","","128","","1","no","no","","PrintDataImg","","where CATEGORIES LIKE ");
INSERT INTO tblmenu VALUES("4","Sales","2000","2000","1","#","","","","","","","","","1","","","","","fa fa-shopping-cart fa-fw","fa fa-caret-down","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("5","Invoicing","2001","2000","2","invoicing","","","","","","","","","1","","","","","fa fa-shopping-cart fa-fw","","128","","2","no","no","","","","");
INSERT INTO tblmenu VALUES("6","Sales Return","2002","2000","2","sareturn","","","","","","","","","1","","","","","fa fa-sliders fa-fw","","128","","2","no","no","","","","");
INSERT INTO tblmenu VALUES("8","Customer","1101","1000","2","dataGridForm","tblcustomer","","SELECT *, CUSTOMERID AS KEYID FROM tblcustomer","","[{ 	"colName": "KEYID", 
	"idName": "CUSTOMERID", 
	"title": "ID", 
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "custname", 
	"title": "Customer",
	"tdStyle":"width='350'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "custcode", 
	"title": "Code", 
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"cssStyle":" style='width:250px'",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "TYPENAME", 
	"title": "Type", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"none", 
	"class":"",
	"cssStyle":" style='width:250px'",
	"sortable":"false",
	"defVal":""  
},{ 	"colName": "CUSTTYPE", 
	"colId": "TYPENAME", 
	"title": "Type", 
	"display": "hidden", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=CUSTTYPE', method: 'get', valueField:'id',textField:'text',panelHeight:'auto', onSelect: function(rec){$('#TYPENAME').val(rec.text); }" 
},{ 	"colName": "CONTACT", 
	"title": "Representative",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "address", 
	"title": "Address", 
	"display": "hidden", 
	"input":"textbox", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "area", 
	"title": "Area", 
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=AREA', method:'get', valueField:'id', textField:'text', panelHeight:'auto'" 
},{ 	"colName": "PHONE", 
	"title": "Tel. Nos.", 
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "MOBILENO", 
	"title": "Mobile No.", 
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "EMAILADD", 
	"title": "Email", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "ENTDATE", 
	"title": "Date", 
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""
 
}]
 ","","","","60","","","","","fa fa-group fa-fw","","128","","2","no","no","","","","where custname LIKE ");
INSERT INTO tblmenu VALUES("9","Salesman","1103","1000","888","dataGridForm","tblsalesman","","SELECT *, SALESMANID AS KEYID FROM tblsalesman","","[{ 	"colName": "KEYID", 
	"idName": "SALESMANID", 
	"title": "ID", 
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "smanname", 
	"title": "Salesman",
	"tdStyle":"width='350'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "smancode", 
	"title": "Code", 
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"cssStyle":" style='width:250px'",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "RANK", 
	"title": "Rank", 
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "RATE", 
	"title": "Rate", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"spinner", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberspinner",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "address", 
	"title": "Address", 
	"display": "hidden", 
	"input":"textbox", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "AREA", 
	"title": "Area", 
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=AREA',  method:'get',  valueField:'id', textField:'text',  panelHeight:'auto'" 
},{ 	"colName": "PHONE", 
	"title": "Contact No.", 
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "EMAILADD", 
	"title": "Email", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "DATEJOIN", 
	"title": "Date", 
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""
  
}]

","","","","70","","","","","fa fa-user fa-fw","","128","","2","no","no","","","","where smanname LIKE ");
INSERT INTO tblmenu VALUES("10","Area","1104","1000","2","dataGridForm","tblarea","","SELECT *, AREAID AS KEYID FROM tblarea","","[{ 	"colName": "KEYID", 
	"title": "ID",
	"idName":"AREAID", 
	"tdStyle":"width='10%'",
	"display": "yes", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "AREA", 
	"title": "Area", 
	"tdStyle":"width='90%'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"defVal":"" 
}]
","","","","50","","","","","fa fa-globe fa-fw","","128","","2","no","no","","","","where AREA LIKE ");
INSERT INTO tblmenu VALUES("11","Purchase","3000","3000","1","#","","","","","","","","","1","","","","","fa fa-truck fa-fw","fa fa-caret-down","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("12","Purchase Order","3001","3000","888","p_order","","","","","","","","","1","","","","","fa fa-clipboard fa-fw","","128","","3","no","no","","","","");
INSERT INTO tblmenu VALUES("13","Receiving Report","3002","3000","2","receiving","","","","","","","","","1","","","","","fa fa-list-alt fa-fw","#","128","","3","no","no","","","","");
INSERT INTO tblmenu VALUES("14","Purchase Return","3003","3000","2","pureturn","","","","","","","","","1","","","","","fa fa-sliders fa-fw","#","128","","3","no","no","","","","");
INSERT INTO tblmenu VALUES("16","Settings","9000","9000","1","#","","","","","","","","","1","","","","","fa fa-gear fa-fw","fa fa-caret-down","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("17","User","9001","1000","2","dataGridForm","tbluseraccount","","SELECT *, USERID AS KEYID, "" AS U_PASSWORD FROM tbluseraccount","","[{ 	"colName": "KEYID", 
	"idName": "USERID", 
	"title": "ID", 
	"tdStyle":"width='40'",
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},
{ 	"colName": "U_NAME", 
	"title": "Full Name", 
	"display": "", 
	"tdStyle":"width='250'",
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "U_USERNAME", 
	"title": "Username", 
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":""  
},{ 	"colName": "U_PASSWORD", 
	"idName":"U_PASS",
	"title": "Password", 
	"display": "hidden", 
	"input":"password", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-passwordbox",
	"defVal":"" 
},{ 	"colName": "U_ROLE", 
	"title": "Role", 
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true" ,
	"defVal":"url:'getCombo.php?comboName=U_ROLE', method:'get', valueField:'id', textField:'text', panelHeight:'auto'" 
},{ 	"colName": "U_DATE", 
	"title": "Date", 
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true" ,
	"defVal":""
},{ 	"colName": "U_STATUS", 
	"title": "Status", 
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false",
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true" ,
	"defVal":"url:'getCombo.php?comboName=U_STATUS', method:'get', valueField:'id', textField:'text', panelHeight:'auto'"  }]
","","","","50","","","","","fa fa-group fa-fw","","128","","1","no","no","","","","where concat(u_name, u_username ) like ");
INSERT INTO tblmenu VALUES("18","Back-Up Data","9002","9000","2","backup","","","","","","","","","1","","","","","fa fa-save fa-fw","","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("19","Restore Data","9003","9000","88888","#","","","","","","","","","1","","","","","fa fa-archive fa-fw","","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("20","Supplier","1102","1000","2","dataGridForm","tblsupplier","","SELECT *, SUPPLIERID AS KEYID FROM tblsupplier","","[{ 	"colName": "KEYID", 
	"idName": "SUPPLIERID", 
	"title": "ID", 
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "suppname", 
	"title": "Supplier",
	"tdStyle":"width='350'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "suppcode", 
	"title": "Code", 
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"cssStyle":" style='width:250px'",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "CONTACT", 
	"title": "Representative",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "address", 
	"title": "Address", 
	"display": "hidden", 
	"input":"textbox", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "AREA", 
	"title": "Area", 
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=AREA',  method:'get',  valueField:'id', textField:'text',  panelHeight:'auto'" 
},{ 	"colName": "PHONE", 
	"title": "Tel. Nos.", 
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "MOBILENO", 
	"title": "Mobile No.", 
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "EMAILADD", 
	"title": "Email", 
	"display": "", 
	"input":"email", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "DATEJOIN", 
	"title": "Date", 
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""
}]
 ","","","","60","","","","","fa fa-group fa-fw","","128","","3","no","no","","","","where suppname LIKE ");
INSERT INTO tblmenu VALUES("109","Online Store","12000","12000","1","#","","","","","","","","-1","1","","","paper","portrait","fa fa-shopping-cart fa-fw","fa fa-caret-down","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("110","Online Order","12001","12000","2","dataGridTran","tblorderhead","tblorderdetl","SELECT *, PAYRECEIPT AS IMAGES, SOID AS KEYID  FROM tblorderhead","SELECT *, SOPID AS KEYID2 FROM tblorderdetl","[{ 	"colName": "KEYID", 
	"idName": "SOID", 
	"SHOWIMAGES": "IMAGES",
	"tdStyle":"width='90'",
	"title": "ID", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"sortable":"true",
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "OCNAME", 
	"title": "Customer",
	"tdStyle":"width='250'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "ENTDATE", 
	"title": "Date", 
	"tdStyle":"width='80'",
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"hidden", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "SLSID", 
	"title": "SLS ID", 
	"tdStyle":"width='80'",
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"hidden", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "INVOICENO", 
	"title": "Invoice", 
	"tdStyle":"width='80'",
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"hidden", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "PAYMODE", 
	"title": "Payment Mode", 
	"tdStyle":"width='100'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"hidden", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "NOTE", 
	"title": "Note",
	"tdStyle":"width='300'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "DEL_STATUS", 
	"title": "Delivery Status", 
	"display": "", 
	"input":"text", 
	"tdStyle":"width='100'",
	"required": "true", 
	"readonly":"true", 
	"hidden":"hidden", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "TRACKNO", 
	"title": "Tracking No.", 
	"tdStyle":"width='100'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"hidden", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":""  
},{ 	"colName": "FORWARDERS", 
	"title": "Forwarder", 
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"hidden", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":""  
 },{ 	"colName": "PAYRECEIPT", 
	"title": "Attachment",
	"tdStyle":"width='200'",
	"display": "hidden", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "TOTAL", 
	"title": "Total", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"number", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "PAIDAMT", 
	"title": "Amt. Paid", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"number", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 

}]

","","[{ 	"colName": "KEYID2", 
	"idName": "SOPID", 
	"tdStyle":"width='80'",
	"title": "ID", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"sortable":"true",
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "PROID", 
	"title": "Product ID",
	"tdStyle":"width='80'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "PRONAME", 
	"title": "Product",
	"tdStyle":"width='350'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"true", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "QTY", 
	"title": "Qty", 
	"tdStyle":"align='right' width='70'",
	"display": "", 
 
	"input":"spinner", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberspinner",
	"sortable":"false",
	"defVal":""   
},{ 	"colName": "PROPRICE", 
	"title": "Price", 
	"tdStyle":"align='right' width='80'",
	"display": "", 
	 
	"input":"number", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "AMOUNT", 
	"title": "Amount", 
	"tdStyle":"align='right' width='80'",
	"display": "", 
	 
	"input":"number", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 
}]

","-1","70","","","paper","portrait","fa fa-bars fa-fw","","128","0","1","no","no","","PrintDataView","","where concat(SOID, OCNAME,ENTDATE,PAYMODE,DEL_STATUS) like");
INSERT INTO tblmenu VALUES("22","Report","9900","9900","3","report","","","","","","","","","1","","","","","fa fa-print fa-fw","#","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("23","Product List","1001A","1000","4","","tblProduct","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY,  FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'entdate' } ,
	{ 'data': 'PROQTY' } ,
	{ 'data': 'UNIT' } ,
                { 'data': 'PROPRICE' } ,
 	{ 'data': 'WPROPRICE' } ,
	{ 'data': 'PURPRICE' }
           
 ","Product Name, Code , Category , Date , Qty , Unit  ,  Sell Price  , Wholesale,  Php Cost ","[4,6,7,8]","-1","9","","","","landscape","fa fa-file-text fa-fw","","128","0","1","entdate","no","Products ","PrintDataView","order by PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("24","Product Brochure","1002","1000","4","","tblProduct","","select PRONAME, PROCODE, IMAGES, CATEGORIES, SUPPLIERID, SUPPNAME, FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, CONCAT('<img class="imgBrochure" src="../', IMAGES , '" width="280px" height="150px" id="PICID"/> ') as IMGDISPLAY from tblproduct","","{IMGDISPLAY}","Product","[-1]","-1","1","","ProductBrochure","paper","portrait","fa fa-pause fa-fw","","128","0","1","entdate","no","Products, CustomerType","PrintDataImg","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES' and IMAGES !=""");
INSERT INTO tblmenu VALUES("25","New Release Products","1003","1000","4","","tblProduct","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY,  FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'entdate' } ,
	{ 'data': 'PROQTY' } ,
	{ 'data': 'UNIT' } ,
                { 'data': 'PROPRICE' } ,
 	{ 'data': 'WPROPRICE' } ,
	{ 'data': 'PURPRICE' }
           
 ","Product Name, Code , Category , Date , Qty , Unit  ,  Sell Price  , Wholesale,  Php Cost ","[4,6,7,8]","2","9","","","","landscape","fa fa-navicon fa-fw","","128","0","1","entdate","no","Products ","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("114","Annual Receiving Report by Supplier","3002A","3000","4","","","","SELECT SUPPNAME, SUPPLIERID, SUPPCODE, FORMAT(SUM(IF(MONTH(ENTDATE)=1,TOTAL,0)),2) AS JAN , FORMAT(SUM(IF(MONTH(ENTDATE)=2,TOTAL,0)),2) AS FEB, FORMAT(SUM(IF(MONTH(ENTDATE)=3,TOTAL,0)),2) AS MAR, FORMAT(SUM(IF(MONTH(ENTDATE)=4,TOTAL,0)),2) AS APR, FORMAT(SUM(IF(MONTH(ENTDATE)=5,TOTAL,0)),2) AS MAY, FORMAT(SUM(IF(MONTH(ENTDATE)=6,TOTAL,0)),2) AS JUN, FORMAT(SUM(IF(MONTH(ENTDATE)=7,TOTAL,0)),2) AS JUL, FORMAT(SUM(IF(MONTH(ENTDATE)=8,TOTAL,0)),2) AS AUG, FORMAT(SUM(IF(MONTH(ENTDATE)=9,TOTAL,0)),2) AS SEP, FORMAT(SUM(IF(MONTH(ENTDATE)=10,TOTAL,0)),2) AS OCT, FORMAT(SUM(IF(MONTH(ENTDATE)=11,TOTAL,0)),2) AS NOV, FORMAT(SUM(IF(MONTH(ENTDATE)=12,TOTAL,0)),2) AS DECEM, FORMAT(SUM(TOTAL),2) AS CTOTAL  FROM tblpurchasehead","","{ 'data': 'SUPPNAME' },
{ 'data': 'JAN'},
{ 'data': 'FEB' },
{ 'data': 'MAR' },
{ 'data': 'APR'},
{ 'data': 'MAY'} ,
{ 'data': 'JUN'},
{ 'data': 'JUL'},
{ 'data': 'AUG'},
{ 'data': 'SEP'},
{ 'data': 'OCT'},
{ 'data': 'NOV'},
{ 'data': 'DECEM'},
{ 'data': 'CTOTAL'}
","Supplier, Jan, Feb, Mar, Apr, May, June, July, Aug, Sep, Oct, Nov, Dec, Total","[1,2,3,4,5,6,7,8,9,10,11,12,13]","-1","14","1,2,3,4,5,6,7,8,9,10,11,12,13","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","entdate","no","","","GROUP BY SUPPNAME, SUPPLIERID ORDER BY SUPPNAME, SUPPLIERID"," ");
INSERT INTO tblmenu VALUES("26","Re-Order Product - PMF","1005A","1000","4","","tblProduct","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY, UNIT,  REORDER, MAXQTY, LOCATION, SUPPNAME, SUPPLIERID from tblproduct","","
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
 	{ 'data': 'SUPPNAME' } ,
                { 'data': 'PROQTY' } ,
 	{ 'data': 'REORDER' } ,
	{ 'data': 'MAXQTY' }  
 ","Product Name, Code , Category , Suppllier, Qty , Min Qty  , Max Qty","[4,5,6]","2","7","","","paper","landscape","fa fa-thermometer fa-fw","","128","0","1","no","no","Supplier, Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES' and PROQTY <= REORDER");
INSERT INTO tblmenu VALUES("33","Inactive Products","1005C","1000","100","","tblProduct","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY, FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct","","	{ 'data': 'entdate' } ,
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'PROQTY' } ,
	{ 'data': 'UNIT' } ,
                { 'data': 'PROPRICE' } ,
 	{ 'data': 'WPROPRICE' } ,
	{ 'data': 'PPROPRICE' } ,
	{ 'data': 'LOCATION' }
 ","Product Name, Code , Category , Date , Qty , Unit  ,  Sell Price  , Wholesale, Provincial, Locator ","[4,6,7,8]","2","10","","","paper","landscape","fa fa-info fa-fw","","128","0","1","no","no","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='NO'");
INSERT INTO tblmenu VALUES("35","Products By Supplier","1004","1000","4","","tblProduct","","select a.PRONAME, a.PROCODE, a.PROID, a.CATEGORIES,     FORMAT(a.PROPRICE,2) AS PROPRICE, FORMAT(a.WPROPRICE,2) AS WPROPRICE, FORMAT(a.PPROPRICE,2) AS PPROPRICE, FORMAT(a.PURPRICE,2) AS PURPRICE, FORMAT(a.FORPURPRICE,2) AS FORPURPRICE, a.FOREX,  a.LOCATION, B.SUPPNAME,B.SUPPLIERID, b.ENTDATE, c.QTY, c.UNIT,  FORMAT(c.PURPRICE,2) as UNITCOST from tblproduct as a,  tblpurchasehead as b, tblpurchasedetl as c","","                { 'data': 'SUPPNAME' },
                { 'data': 'PRONAME' },
                { 'data': 'PROCODE' },
                { 'data': 'PROPRICE' },
 	{ 'data': 'WPROPRICE'} ,
	{ 'data': 'PPROPRICE'} ,
                { 'data': 'UNITCOST'},
	{ 'data': 'ENTDATE'},
	{ 'data': 'QTY'}
 ","Supplier, Product Name, Code ,  Retail, Wholesale, Provincial, Unit Cost, Last Sold, QTY","[3,4,5,6,8]","0","9","","sPriceList","paper","landscape","fa fa-list-alt fa-fw","","128","0","1","b.ENTDATE","no","Supplier, Products","PrintDataView","order by b.SUPPNAME, a.PRONAME, B.ENTDATE DESC, B.RRID DESC","a.PROID = c.PROID and b.RRID = c.RRID");
INSERT INTO tblmenu VALUES("36","Customer Price List - Sold Item","1004D","1000","100","","tblProduct","","select a.PRONAME, a.PROCODE, a.PROID, a.CATEGORIES,     FORMAT(a.PROPRICE,2) AS PROPRICE, FORMAT(a.WPROPRICE,2) AS WPROPRICE, FORMAT(a.PPROPRICE,2) AS PPROPRICE, FORMAT(a.PURPRICE,2) AS PURPRICE, FORMAT(a.FORPURPRICE,2) AS FORPURPRICE, a.FOREX,  a.LOCATION, B.CUSTNAME,B.CUSTOMERID, b.ENTDATE, c.QTY, c.UNIT,  FORMAT(c.PROPRICE,2) as SELLPRICE from tblproduct as a,  tblslshead as b, tbLslsdetl as c","","                { 'data': 'CUSTNAME' },
                { 'data': 'PRONAME' },
                { 'data': 'PROCODE' },
                { 'data': 'PROPRICE' },
 	{ 'data': 'WPROPRICE'} ,
	{ 'data': 'PPROPRICE'} ,
                { 'data': 'SELLPRICE'},
	{ 'data': 'ENTDATE'},
	{ 'data': 'QTY'}
 ","Customer, Product Name, Code ,  Retail, Wholesale, Provincial, Cust Price, Last Sold, QTY","[3,4,5,6,8]","0","9","","cPriceList","paper","landscape","fa fa-tags fa-fw","","","0","1","b.ENTDATE","no","*Customer, Products","PrintDataView","order by b.CUSTNAME, a.PRONAME, B.ENTDATE DESC","a.PROID = c.PROID and b.SLSID = c.SLSID");
INSERT INTO tblmenu VALUES("37","Product Log (In/Out)","1009","1000","4","","tblProduct","","","","","","","","1","","","","","fa fa-list-alt fa-fw","","128","0","1","no","yes","Supplier, Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("38","Car Brand","1002","1000","22","carbrand/index.php","","","","","","","","","1","","","","","fa fa-car fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("39","Car Make","1003","1000","22","carmake","","","","","","","","","1","","","","","fa fa-cab fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("40","Item Make","1004","1000","22","itemmake","","","","","","","","","1","","","","","fa fa-industry fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("41","Country Made","1006","1000","22","country","","","","","","","","","1","","","","","fa fa-flag fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("42","Item Brand","1007","1000","2","dataGridForm","tblitembrand","","SELECT *, Id AS KEYID FROM tblitembrand","","[{ 	"colName": "KEYID", 
	"title": "ID",
	"idName":"Id", 
	"tdStyle":"width='10%'",
	"display": "yes", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "ITEMBRAND", 
	"title": "Brand", 
	"tdStyle":"width='90%'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
}]
","","","","50","","","","","fa fa-steam fa-fw","","128","0","1","no","no","","","","where ITEMBRAND LIKE ");
INSERT INTO tblmenu VALUES("43","Color","1008","1000","2","dataGridForm","tblcolor","","SELECT *, Id AS KEYID FROM tblcolor","","[{ 	"colName": "KEYID", 
	"title": "ID",
	"idName":"Id", 
	"tdStyle":"width='10%'",
	"display": "yes", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "COLOR", 
	"title": "Color", 
	"tdStyle":"width='90%'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
}]
","","","","50","","","","","fa fa-th fa-fw","","128","0","1","no","no","","","","where COLOR LIKE ");
INSERT INTO tblmenu VALUES("44","Stock Type","1009","1000","22","stocktype","","","","","","","","","1","","","","","fa fa-tags fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("45","Master File","1100","1100","11","#","","","","","","","","","1","","","","","fa fa-building fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("46","Status","1105","1100","22","status","","","","","","","","","1","","","","","fa fa-bell fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("47","Replacement","2003","2000","2","adjustment","","","","","","","","","1","","","","","fa fa-gears fa-fw","","128","0","2","no","no","","","","");
INSERT INTO tblmenu VALUES("48","Inventory Adustment","1001B","1000","2","adjustment","","","","","","","","","1","","","","","fa fa-gears fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("49","Sales Report - Date Range","2020","2000","4","","","","SELECT CUSTNAME, CUSTCODE, ENTDATE, if(slstype=1,b.INVOICENO,b.DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE, PRONAME, PROID, PROCODE, QTY, FORMAT(PROPRICE,2) AS PROPRICE, DISCPER, FORMAT(DISCAMT,2) AS DISCAMT,  FORMAT(AMOUNT,2) AS AMOUNT, UNIT FROM tblslsdetl as a, tblslshead as b","","{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'CUSTNAME' },
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'UNIT'},
{ 'data': 'PROPRICE'} ,
{ 'data': 'DISCAMT'},
{ 'data': 'AMOUNT'}
","No., Date, Customer, Product,Qty, Unit, Unit Price, Discount, Amount","[4,6,7,8]","-1","9","8","","paper","landscape","fa fa-map-o fa-fw","","","0","1","ENTDATE","no","","","order by ENTDATE, b.SLSID","a.SLSID = B.SLSID and CANCELLED !='Y'");
INSERT INTO tblmenu VALUES("50","Price List (Retail)","1004A","1000","4","","tblProduct","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY,  FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                 { 'data': 'PROPRICE' } 
  ","Product Name, Code , Category , Price","[3]","2","4","","","paper","portrait","fa fa-star fa-fw","","","0","1","entdate","no","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("51","Price List (Wholesale)","1004B","1000","4","","tblProduct","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY,  FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
 	{ 'data': 'WPROPRICE' } 
 ","Product Name, Code , Category , Price","[3]","2","4","","","paper","portrait","fa fa-star-half fa-fw","","","0","1","entdate","no","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("52","Price List (Provincial)","1004C","1000","100","","tblProduct","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY,  FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
 	{ 'data': 'PPROPRICE' } 
 ","Product Name, Code , Category , Price","[3]","2","100","","","paper","portrait","fa fa-star-o fa-fw","","","0","1","entdate","no","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("54","Inventory ZERO Level","10052C","1000","4","","tblProduct","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY, UNIT,  REORDER, MAXQTY, LOCATION from tblproduct","","
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'PROQTY' } ,
 	{ 'data': 'REORDER' } ,
	{ 'data': 'MAXQTY' }  
 ","Product Name, Code , Category , Qty , Min Qty  , Max Qty","[3,4,5]","2","5","","","paper","portrait","fa fa-thermometer-empty fa-fw","","","0","1","no","no","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES' and PROQTY = 0");
INSERT INTO tblmenu VALUES("56","Customer Price List - All Item","1004E","1000","100","","tblProduct","","select PROID, PRONAME, PROCODE, CATEGORIES, entdate, PROQTY, FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct","","                { 'data': 'CUSTNAME' },
                { 'data': 'PRONAME' },
                { 'data': 'PROCODE' },
                { 'data': 'PROPRICE' },
 	{ 'data': 'WPROPRICE'} ,
	{ 'data': 'PPROPRICE'} ,
                { 'data': 'SELLPRICE'},
	{ 'data': 'LASTDATE'},
	{ 'data': 'QTY'}
 
 ","Customer, Product Name, Code ,  Retail, Wholesale, Provincial, Cust Price, Last Sold, QTY","[3,4,5,6,8]","-1","9","","cPriceList2","paper","portrait","fa fa-tags fa-fw","","","0","1","entdate","no","*Customer, Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("57","Customer List","1101","1100","4","","","","select *, IF(CUSTTYPE=3,'P',IF(CUSTTYPE=2,'W','R')) as CTYPE from tblcustomer","","{ 'data': 'custname' }, 
{ 'data': 'custcode' },
{ 'data': 'area' },
{ 'data': 'ENTDATE' },
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'DISCOUNTPER'},
{ 'data': 'CTYPE'},
{ 'data': 'SMANNAME'}
","Customer, Code, Area, Date, Contact, Tel. No., Mobile No., Fax No., Email, Discount, Type, Salesman 
","[9]","-1","12","","","paper","landscape","fa fa-file-text fa-fw","","128","0","1","ENTDATE","no","","","order by custname, custcode","upper(BADACCT) !='YES'");
INSERT INTO tblmenu VALUES("58","Customer List - Bad Account","1102","1100","100","","","","select *, IF(CUSTTYPE=3,'P',IF(CUSTTYPE=2,'W','R')) as CTYPE from tblcustomer","","{ 'data': 'custname' }, 
{ 'data': 'custcode' },
{ 'data': 'area' },
{ 'data': 'ENTDATE' },
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'DISCOUNTPER'},
{ 'data': 'CTYPE'},
{ 'data': 'SMANNAME'}
","Customer, Code, Area, Date, Contact, Tel. No., Mobile No., Fax No., Email, Discount, Type, Salesman 
","[9]","-1","12","","","paper","landscape","fa fa-file-text fa-fw","","128","0","1","ENTDATE","no","","","order by area, custname, custcode","upper(BADACCT) ='YES'");
INSERT INTO tblmenu VALUES("59","Customer List By Salesman","1103","1100","100","","","","select *, IF(CUSTTYPE=3,'P',IF(CUSTTYPE=2,'W','R')) as CTYPE from tblcustomer","","{ 'data': 'custname' }, 
{ 'data': 'custcode' },
{ 'data': 'SMANNAME'},
{ 'data': 'area' },
{ 'data': 'ENTDATE' },
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'DISCOUNTPER'},
{ 'data': 'CTYPE'}
","Customer, Code, Salesman , Area, Date, Contact, Tel. No., Mobile No., Fax No., Email, Discount, Type
","[9]","2","12","","","paper","landscape","fa fa-file-text fa-fw","","128","0","1","ENTDATE","no","Salesman","","order by SMANNAME, custname, custcode","upper(BADACCT) !='YES'");
INSERT INTO tblmenu VALUES("60","Customer List By Area","1104","1100","4","","","","select *, IF(CUSTTYPE=3,'P',IF(CUSTTYPE=2,'W','R')) as CTYPE from tblcustomer","","{ 'data': 'custname' }, 
{ 'data': 'custcode' },
{ 'data': 'area' },
{ 'data': 'ENTDATE' },
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'DISCOUNTPER'},
{ 'data': 'CTYPE'},
{ 'data': 'SMANNAME'}
","Customer, Code, Area, Date, Contact, Tel. No., Mobile No., Fax No., Email, Discount, Type, Salesman 
","[9]","2","12","","","paper","landscape","fa fa-file-text fa-fw","","128","0","1","ENTDATE","no","Area","","order by area, custname, custcode","upper(BADACCT) !='YES'");
INSERT INTO tblmenu VALUES("61","Supplier List","1120","1100","4","","","","select * from tblsupplier","","{ 'data': 'suppname' }, 
{ 'data': 'suppcode' },
{ 'data': 'DATEJOIN' },
{ 'data': 'area'},
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'STATNAME'}
","Supplier, Code,  Date, Area, Contact, Tel. No., Mobile No., Fax No., Email, Status","[-1]","-1","10","","","paper","landscape","fa fa-vcard-o fa-fw","","128","0","1","DATEJOIN","no","","","order by suppname","upper(BLACKLISTED) !='YES'");
INSERT INTO tblmenu VALUES("62","Supplier List By Area","1121","1100","4","","","","select * from tblsupplier","","{ 'data': 'suppname' }, 
{ 'data': 'suppcode' },
{ 'data': 'DATEJOIN' },
{ 'data': 'area'},
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'STATNAME'}
","Supplier, Code,  Date, Area, Contact, Tel. No., Mobile No., Fax No., Email, Status","[-1]","3","10","","","paper","portrait","fa fa-vcard-o fa-fw","","128","0","1","DATEJOIN","no","Area","","order by area, suppname","upper(BLACKLISTED) !='YES'");
INSERT INTO tblmenu VALUES("63","Supplier List By Currency","1122","1100","100","","","","select * from tblsupplier","","{ 'data': 'suppname' }, 
{ 'data': 'suppcode' },
{ 'data': 'DATEJOIN' },
{ 'data': 'FOREX'},
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'STATNAME'}
","Supplier, Code,  Date, Currency, Contact, Tel. No., Mobile No., Fax No., Email, Status","[-1]","3","10","","","paper","portrait","fa fa-vcard-o fa-fw","","128","0","1","DATEJOIN","no","","","order by FOREX, suppname","upper(BLACKLISTED) !='YES'");
INSERT INTO tblmenu VALUES("65","Customer List By Status","1105","1100","100","","","","select *, IF(CUSTTYPE=3,'P',IF(CUSTTYPE=2,'W','R')) as CTYPE from tblcustomer","","{ 'data': 'custname' }, 
{ 'data': 'custcode' },
{ 'data': 'STATNAME' },
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'CTYPE'},
{ 'data': 'SMANNAME'}
","Customer, Code, Status, Contact, Tel. No., Mobile No., Fax No., Email, Type, Salesman 
","[-1]","2","10","","","paper","landscape","fa fa-file-text fa-fw","","128","0","1","ENTDATE","no","Status","","order by STATNAME, custname, custcode","upper(BADACCT) !='YES'");
INSERT INTO tblmenu VALUES("66","Customer List By Type","1106","1100","4","","","","select *, IF(CUSTTYPE=3,'Provincial',IF(CUSTTYPE=2,'Wholesale','Retail')) as CTYPE from tblcustomer","","{ 'data': 'custname' }, 
{ 'data': 'custcode' },
{ 'data': 'CTYPE'},
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'},
{ 'data': 'SMANNAME'}
","Customer, Code, Type, Contact, Tel. No., Mobile No., Fax No., Email, Salesman 
","[-1]","2","9","","","paper","landscape","fa fa-file-text fa-fw","","128","0","1","ENTDATE","no","CustomerType","","order by CUSTTYPE, custname, custcode","upper(BADACCT) !='YES'");
INSERT INTO tblmenu VALUES("67","Supplier List By Status","1123","1100","100","","","","select * from tblsupplier","","{ 'data': 'suppname' }, 
{ 'data': 'suppcode' },
{ 'data': 'DATEJOIN' },
{ 'data': 'STATNAME'},
{ 'data': 'area'},
{ 'data': 'CONTACT' },
{ 'data': 'PHONE'} ,
{ 'data': 'MOBILENO'} ,
{ 'data': 'FAXNO'},
{ 'data': 'EMAILADD'}
","Supplier, Code,  Date, Status, Area, Contact, Tel. No., Mobile No., Fax No., Email","[-1]","3","10","","","paper","portrait","fa fa-vcard-o fa-fw","","128","0","1","DATEJOIN","no","Status","","order by STATNAME, SUPPNAME","upper(BLACKLISTED) !='YES'");
INSERT INTO tblmenu VALUES("68","Salesman List","1140","1100","100","","","","select * from tblsalesman","","{ 'data': 'smanname' }, 
{ 'data': 'smancode' },
{ 'data': 'DATEJOIN' },
{ 'data': 'area'},
{ 'data': 'PHONE'} ,
{ 'data': 'EMAILADD'},
{ 'data': 'RANK'},
{ 'data': 'RATE'}
","Salesman, Code,  Date, Area, Tel. No., Email, Rank, Rate","[7]","-1","8","","","paper","landascape","fa fa-assistive-listening-systems fa-fw","","128","0","1","DATEJOIN","no","","","order by smanname","");
INSERT INTO tblmenu VALUES("69","Product List By Categories","1001B","1000","4","","","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY,  FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'entdate' } ,
	{ 'data': 'PROQTY' } ,
	{ 'data': 'UNIT' } ,
                { 'data': 'PROPRICE' } ,
 	{ 'data': 'WPROPRICE' } ,
	{ 'data': 'PURPRICE' }
           
 ","Product Name, Code , Category , Date , Qty , Unit  ,  Sell Price  , Wholesale,  Php Cost ","[4,6,7,8]","2","9","","","paper","landscape","fa fa-file-text fa-fw","","","0","1","entdate","no","Products ","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("70","Product List w/ Remarks","1001C","1000","100","","","","select PRONAME, PROCODE, CATEGORIES, entdate, REMARKS as note,  LOCATION from tblproduct",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'entdate' } ,
                { 'data': 'note' },
	{ 'data': 'LOCATION' }
 ","Product Name, Code , Category , Date , Remarks,  Locator ","[-1]","2","6","","","paper","landscape","fa fa-file-text fa-fw","","","0","1","entdate","no","Products","PrintDataView","order by PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("71","Product Aging Report","1005D","1000","100","","","","SELECT * FROM (select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY, FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION,  DATE_FORMAT(date_add(entdate, interval (AGING * 365) day),'%Y-%m-%d') as AGINGDATE from tblproduct where upper(INACTIVE) !='YES' ) AS A ",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'AGINGDATE' } ,
	{ 'data': 'PROQTY' } ,
	{ 'data': 'UNIT' } ,
                { 'data': 'PROPRICE' } ,
 	{ 'data': 'WPROPRICE' } ,
	{ 'data': 'PPROPRICE' } ,
	{ 'data': 'LOCATION' }
 ","Product Name, Code , Category , Aging , Qty , Unit  ,  Sell Price  , Wholesale, Provincial, Locator ","[4,6,7,8]","2","10","","","paper","landscape","fa fa-calendar-o t fa-fw","","","0","1","no","AGINGDATE","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","");
INSERT INTO tblmenu VALUES("73","Sales Report - Invoice","2021A","2000","100","","","","SELECT CUSTNAME, CUSTCODE, ENTDATE, b.INVOICENO AS INVDR, INVDATE AS INVDRDATE, PRONAME, PROID, PROCODE, QTY, FORMAT(PROPRICE,2) AS PROPRICE, DISCPER, FORMAT(DISCAMT,2) AS DISCAMT,  FORMAT(AMOUNT,2) AS AMOUNT, UNIT FROM tblslsdetl as a, tblslshead as b","","{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'CUSTNAME' },
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'UNIT'},
{ 'data': 'PROPRICE'} ,
{ 'data': 'DISCAMT'},
{ 'data': 'AMOUNT'}
","Invoice No., Date, Customer, Product,Qty, Unit, Unit Price, Discount, Amount","[4,6,7,8]","-1","9","8","","paper","landscape","fa fa-tasks fa-fw","","","0","1","INVDATE","no","","","order by INVDATE, b.SLSID","a.SLSID = B.SLSID and CANCELLED !='Y' and SLSTYPE != 2");
INSERT INTO tblmenu VALUES("74","Sales Report - Delivery","2021B","2000","100","","","","SELECT CUSTNAME, CUSTCODE, ENTDATE,b.DRNO AS INVDR, DRDATE AS INVDRDATE, PRONAME, PROID, PROCODE, QTY, FORMAT(PROPRICE,2) AS PROPRICE, DISCPER, FORMAT(DISCAMT,2) AS DISCAMT,  FORMAT(AMOUNT,2) AS AMOUNT, UNIT FROM tblslsdetl as a, tblslshead as b","","{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'CUSTNAME' },
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'UNIT'},
{ 'data': 'PROPRICE'} ,
{ 'data': 'DISCAMT'},
{ 'data': 'AMOUNT'}
","D.R. No., Date, Customer, Product,Qty, Unit, Unit Price, Discount, Amount","[4,6,7,8]","-1","9","8","","paper","landscape","fa fa-truck fa-fw","","","0","1","DRDATE","no","","","order by DRDATE, b.SLSID","a.SLSID = B.SLSID and CANCELLED !='Y' and SLSTYPE = 2");
INSERT INTO tblmenu VALUES("75","Sales Summary By Transaction","2022A","2000","4","","","","SELECT *, if(slstype=1,INVOICENO,DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE,  FORMAT(TOTAL,2) AS TAMT FROM  tblslshead ","","{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'CUSTNAME' },
{ 'data': 'NOTE' },
{ 'data': 'TERMS'},
{ 'data': 'DUEDATE'} ,
{ 'data': 'TAMT'}","No., Date, Customer, Remarks,Terms,Due Date,  Amount","[6]","-1","7","6","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","ENTDATE","no","Customer, Salesman","","order by ENTDATE, SLSID"," CANCELLED !='Y'");
INSERT INTO tblmenu VALUES("76","Sales Summary By Invoice","2022B","2000","100","","","","select * from (SELECT a.*, INVOICENO AS INVDR,  INVDATE AS INVDRDATE,  FORMAT(TOTAL,2) AS TAMT, b.TINNO FROM  tblslshead as a, tblcustomer as b where CANCELLED !='Y' and SLSTYPE != 2 and a.CUSTOMERID = b.CUSTOMERID) as c","","{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'CUSTNAME' },
{ 'data': 'SMANNAME' },
{ 'data': 'TINNO' },
{ 'data': 'TERMS'},
{ 'data': 'DUEDATE'} ,
{ 'data': 'TAMT'}","Invoice No., Date, Customer, Salesman, Tin No.,Terms,Due Date,  Amount","[7]","-1","8","7","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","INVDATE","no","Customer, Salesman","","order by INVDATE, SLSID","");
INSERT INTO tblmenu VALUES("77","Sales Summary By D.R.","2022C","2000","100","","","","select * from (SELECT a.*, a.DRNO AS INVDR,  a.DRDATE AS INVDRDATE,  FORMAT(TOTAL,2) AS TAMT, b.TINNO FROM  tblslshead as a, tblcustomer as b where CANCELLED !='Y' and SLSTYPE != 2 and a.CUSTOMERID = b.CUSTOMERID) as c","","{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'CUSTNAME' },
{ 'data': 'TINNO' },
{ 'data': 'TERMS'},
{ 'data': 'DUEDATE'} ,
{ 'data': 'TAMT'}","D.R. No., Date, Customer, Tin No.,Terms,Due Date,  Amount","[6]","-1","7","7","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","DRDATE","no","Customer, Salesman","","order by DRDATE, SLSID","");
INSERT INTO tblmenu VALUES("78","Sales Report By Customer","2021C","2000","4","","","","SELECT CUSTNAME, CUSTCODE, ENTDATE, if(slstype=1,b.INVOICENO,b.DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE, PRONAME, PROID, PROCODE, QTY, FORMAT(PROPRICE,2) AS PROPRICE, DISCPER, FORMAT(DISCAMT,2) AS DISCAMT,  FORMAT(AMOUNT,2) AS AMOUNT, UNIT FROM tblslsdetl as a, tblslshead as b","","{ 'data': 'CUSTNAME' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'UNIT'},
{ 'data': 'PROPRICE'} ,
{ 'data': 'DISCAMT'},
{ 'data': 'AMOUNT'}
","Customer, No., Date, Product,Qty, Unit, Unit Price, Discount, Amount","[4,6,7,8]","0","9","4,8","","paper","landscape","fa fa-th-list fa-fw","","","0","1","ENTDATE","no","Customer","","order by CUSTNAME, CUSTOMERID, ENTDATE, b.SLSID","a.SLSID = B.SLSID and CANCELLED !='Y'");
INSERT INTO tblmenu VALUES("81","Sales By Customer/Product","2023D","2000","100","","","","SELECT CUSTNAME, CUSTCODE, ENTDATE, if(slstype=1,b.INVOICENO,b.DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE, PRONAME, PROID, PROCODE, QTY, FORMAT(PROPRICE,2) AS PROPRICE, DISCPER, FORMAT(DISCAMT,2) AS DISCAMT,  FORMAT(AMOUNT,2) AS AMOUNT, UNIT,SMANNAME,SALESMANID FROM tblslsdetl as a, tblslshead as b","","{ 'data': 'CUSTNAME' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'UNIT'},
{ 'data': 'PROPRICE'} ,
{ 'data': 'DISCAMT'},
{ 'data': 'AMOUNT'}
","Customer, No., Date,  Product,  Qty, Unit, Unit Price, Discount, Amount","[5,6,7,8]","0","9","9","","paper","landscape","fa fa-th-list fa-fw","","","0","1","ENTDATE","no","SProduct, Customer, Salesman","","order by CUSTNAME, CUSTOMERID, SMANNAME, PRONAME, PROID,  ENTDATE, b.SLSID","a.SLSID = B.SLSID and CANCELLED !='Y'");
INSERT INTO tblmenu VALUES("82","Sales Report By Product","2021D","2000","4","","","","SELECT CUSTNAME, CUSTCODE, ENTDATE, if(slstype=1,b.INVOICENO,b.DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE, PRONAME, PROID, PROCODE, QTY, FORMAT(PROPRICE,2) AS PROPRICE, DISCPER, FORMAT(DISCAMT,2) AS DISCAMT,  FORMAT(AMOUNT,2) AS AMOUNT, UNIT FROM tblslsdetl as a, tblslshead as b","","{ 'data': 'PRONAME' },
{ 'data': 'CUSTNAME' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'QTY' },
{ 'data': 'UNIT'},
{ 'data': 'PROPRICE'} ,
{ 'data': 'DISCAMT'},
{ 'data': 'AMOUNT'}
","Product, Customer, No., Date, Qty, Unit, Unit Price, Discount, Amount","[4,6,7,8]","0","9","4,8","","paper","landscape","fa fa-th-list fa-fw","","","0","1","ENTDATE","no","SProduct
","","order by PRONAME, PROID, CUSTNAME, CUSTOMERID, ENTDATE, b.SLSID","a.SLSID = B.SLSID and CANCELLED !='Y'");
INSERT INTO tblmenu VALUES("83","Inventory - Sales & Cost Value","10051","1000","4","","","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY,  FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION, FORMAT((PROQTY * PROPRICE),2) as SALESVALUE, FORMAT((PROQTY * PURPRICE),2) as COSTVALUE  from tblproduct","","                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
	{ 'data': 'PROQTY' } ,
	{ 'data': 'UNIT' } ,
                { 'data': 'PROPRICE' } ,
 	{ 'data': 'SALESVALUE' } ,
	{ 'data': 'PURPRICE' },
                { 'data': 'COSTVALUE' }
	 
 ","Product Name, Code , Category ,Qty , Unit  ,  Selling Price  , Selling Total, Unit Cost, Total Cost ","[3,5,6,7,8]","2","9","6,8","","paper","landscape","fa fa-file-text fa-fw","","","0","1","entdate","no","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES' AND PROQTY >0");
INSERT INTO tblmenu VALUES("84","Inventory Onhand - Cost","10052","1000","100","","","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY,  FORMAT(PROPRICE,2) AS PROPRICE, FORMAT(WPROPRICE,2) AS WPROPRICE, FORMAT(PPROPRICE,2) AS PPROPRICE, FORMAT(PURPRICE,2) AS PURPRICE, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FOREX, UNIT, LOCATION from tblproduct",""," 
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'entdate' } ,
	{ 'data': 'PROQTY' } ,
	{ 'data': 'UNIT' } ,
                { 'data': 'PROPRICE' } ,
 	{ 'data': 'WPROPRICE' } ,
	{ 'data': 'PPROPRICE' } ,
	{ 'data': 'PURPRICE' },
                { 'data': 'FOREX' } ,
                { 'data': 'FORPURPRICE' },
	{ 'data': 'LOCATION' }
 ","Product Name, Code , Category , Date , Qty , Unit  ,  Sell Price  , Wholesale, Provincial, Php Cost, Forex,  Foreign Cost,  Locator ","[4,6,7,8,9,11]","-1","13","","","paper","landscape","fa fa-file-text fa-fw","","","0","1","entdate","no","Products","PrintDataView","order by PRONAME, PROCODE","upper(INACTIVE) !='YES'");
INSERT INTO tblmenu VALUES("85","Re-Order Product By Supplier","1005AA","1000","4","","","","select a.PRONAME, a.PROCODE, a.PROID, a.CATEGORIES, a.REMARKS, a.SUPPITEM, a.QTYPERBOX, a.PROQTY, a.REORDER, a.MAXQTY,   FORMAT(a.PROPRICE,2) AS PROPRICE, FORMAT(a.WPROPRICE,2) AS WPROPRICE, FORMAT(a.PPROPRICE,2) AS PPROPRICE, FORMAT(a.PURPRICE,2) AS PURPRICE, FORMAT(a.FORPURPRICE,2) AS FORPURPRICE, a.FOREX,  a.LOCATION, B.SUPPNAME,B.SUPPLIERID, b.ENTDATE, c.QTY, c.UNIT,  FORMAT(c.FORPURPRICE,2) as UNITCOST from tblproduct as a,  tblpurchasehead as b, tblpurchasedetl as c","","                { 'data': 'SUPPNAME' },
	{ 'data': 'SUPPITEM' },
                { 'data': 'PRONAME' },
             	{ 'data': 'PROQTY'},
	{ 'data': 'QTY'},
	{ 'data': 'ENTDATE'},
	{ 'data': 'UNITCOST'},
	{ 'data': 'PROPRICE'} ,
 	{ 'data': 'WPROPRICE'} ,
	{ 'data': 'PPROPRICE'} ,
                { 'data': 'QTYPERBOX'} ,
	{ 'data': 'REMARKS'}","Supplier, Item No, Product Name, Bal, Prev. Order, Date, PENG, Retail, Wholesale, Provincial, Qty Per Box, Remarks
","[3,4,6,7,8,9,10]
 ","0","12","","sPriceList","paper","landscape","fa fa-thermometer fa-fw","","","0","1","b.ENTDATE","no","*Supplier, Products","PrintDataView","order by b.SUPPNAME, a.PRONAME, B.ENTDATE DESC, B.RRID DESC","a.PROID = c.PROID and b.RRID = c.RRID and a.PROQTY <= a.REORDER");
INSERT INTO tblmenu VALUES("86","Inventory NEGATIVE Level","10052D","1000","4","","","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY, UNIT,  REORDER, MAXQTY, LOCATION from tblproduct","","
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'PROQTY' } ,
 	{ 'data': 'REORDER' } ,
	{ 'data': 'MAXQTY' }  
 ","Product Name, Code , Category , Qty , Min Qty  , Max Qty","[3,4,5]","2","5","","","paper","portrait","fa fa-warning fa-fw","","","0","1","no","no","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES' and PROQTY < 0");
INSERT INTO tblmenu VALUES("87","Inventory w/ Stock","10052B","1000","4","","","","select PRONAME, PROCODE, CATEGORIES, entdate, PROQTY, UNIT,  REORDER, MAXQTY, LOCATION from tblproduct","","
                { 'data': 'PRONAME' } ,
                { 'data': 'PROCODE' } ,
                { 'data': 'CATEGORIES' } ,
                { 'data': 'PROQTY' } ,
 	{ 'data': 'REORDER' } ,
	{ 'data': 'MAXQTY' }  
 ","Product Name, Code , Category , Qty , Min Qty  , Max Qty","[3,4,5]","2","5","","","paper","portrait","fa fa-thermometer-full fa-fw","","","0","1","no","no","Products","PrintDataView","order by CATEGORIES, PRONAME, PROCODE","upper(INACTIVE) !='YES' and PROQTY > 0");
INSERT INTO tblmenu VALUES("88","Sales Annually By Customer","2024A","2000","4","","","","SELECT CUSTNAME, CUSTOMERID, CUSTCODE, FORMAT(SUM(IF(MONTH(ENTDATE)=1,TOTAL,0)),2) AS JAN , FORMAT(SUM(IF(MONTH(ENTDATE)=2,TOTAL,0)),2) AS FEB, FORMAT(SUM(IF(MONTH(ENTDATE)=3,TOTAL,0)),2) AS MAR, FORMAT(SUM(IF(MONTH(ENTDATE)=4,TOTAL,0)),2) AS APR, FORMAT(SUM(IF(MONTH(ENTDATE)=5,TOTAL,0)),2) AS MAY, FORMAT(SUM(IF(MONTH(ENTDATE)=6,TOTAL,0)),2) AS JUN, FORMAT(SUM(IF(MONTH(ENTDATE)=7,TOTAL,0)),2) AS JUL, FORMAT(SUM(IF(MONTH(ENTDATE)=8,TOTAL,0)),2) AS AUG, FORMAT(SUM(IF(MONTH(ENTDATE)=9,TOTAL,0)),2) AS SEP, FORMAT(SUM(IF(MONTH(ENTDATE)=10,TOTAL,0)),2) AS OCT, FORMAT(SUM(IF(MONTH(ENTDATE)=11,TOTAL,0)),2) AS NOV, FORMAT(SUM(IF(MONTH(ENTDATE)=12,TOTAL,0)),2) AS DECEM, FORMAT(SUM(TOTAL),2) AS CTOTAL  FROM tblslshead","","{ 'data': 'CUSTNAME' },
{ 'data': 'JAN'},
{ 'data': 'FEB' },
{ 'data': 'MAR' },
{ 'data': 'APR'},
{ 'data': 'MAY'} ,
{ 'data': 'JUN'},
{ 'data': 'JUL'},
{ 'data': 'AUG'},
{ 'data': 'SEP'},
{ 'data': 'OCT'},
{ 'data': 'NOV'},
{ 'data': 'DECEM'},
{ 'data': 'CTOTAL'}
","Customer,Jan, Feb, Mar, Apr, May, June, July, Aug, Sep, Oct, Nov, Dec, Total","[1,2,3,4,5,6,7,8,9,10,11,12,13]","-1","14","1,2,3,4,5,6,7,8,9,10,11,12,13","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","ENTDATE","no","","","GROUP BY CUSTNAME ORDER BY CUSTNAME","CANCELLED !='Y' ");
INSERT INTO tblmenu VALUES("89","Sales Annually By Salesman","2024B","2000","100","","","","SELECT SMANNAME, SALESMANID, FORMAT(SUM(IF(MONTH(ENTDATE)=1,TOTAL,0)),2) AS JAN , FORMAT(SUM(IF(MONTH(ENTDATE)=2,TOTAL,0)),2) AS FEB, FORMAT(SUM(IF(MONTH(ENTDATE)=3,TOTAL,0)),2) AS MAR, FORMAT(SUM(IF(MONTH(ENTDATE)=4,TOTAL,0)),2) AS APR, FORMAT(SUM(IF(MONTH(ENTDATE)=5,TOTAL,0)),2) AS MAY, FORMAT(SUM(IF(MONTH(ENTDATE)=6,TOTAL,0)),2) AS JUN, FORMAT(SUM(IF(MONTH(ENTDATE)=7,TOTAL,0)),2) AS JUL, FORMAT(SUM(IF(MONTH(ENTDATE)=8,TOTAL,0)),2) AS AUG, FORMAT(SUM(IF(MONTH(ENTDATE)=9,TOTAL,0)),2) AS SEP, FORMAT(SUM(IF(MONTH(ENTDATE)=10,TOTAL,0)),2) AS OCT, FORMAT(SUM(IF(MONTH(ENTDATE)=11,TOTAL,0)),2) AS NOV, FORMAT(SUM(IF(MONTH(ENTDATE)=12,TOTAL,0)),2) AS DECEM, FORMAT(SUM(TOTAL),2) AS CTOTAL  FROM tblslshead","","{ 'data': 'SMANNAME' },
{ 'data': 'JAN'},
{ 'data': 'FEB' },
{ 'data': 'MAR' },
{ 'data': 'APR'},
{ 'data': 'MAY'} ,
{ 'data': 'JUN'},
{ 'data': 'JUL'},
{ 'data': 'AUG'},
{ 'data': 'SEP'},
{ 'data': 'OCT'},
{ 'data': 'NOV'},
{ 'data': 'DECEM'},
{ 'data': 'CTOTAL'}
","Salesman, Jan, Feb, Mar, APR, MAY, JUNE, JULY, AUG, SEP, OCT, NOV, DEC, TOTAL","[1,2,3,4,5,6,7,8,9,10,11,12,13]","-1","14","1,2,3,4,5,6,7,8,9,10,11,12,13","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","ENTDATE","no","","","GROUP BY SMANNAME ORDER BY SMANNAME","CANCELLED !='Y' ");
INSERT INTO tblmenu VALUES("90","Sales Annually By Product Amount","2024C","2000","4","","","","SELECT PRONAME, PROID, PROCODE, FORMAT(SUM(IF(MONTH(ENTDATE)=1,AMOUNT,0)),2) AS JAN , FORMAT(SUM(IF(MONTH(ENTDATE)=2,AMOUNT,0)),2) AS FEB, FORMAT(SUM(IF(MONTH(ENTDATE)=3,AMOUNT,0)),2) AS MAR, FORMAT(SUM(IF(MONTH(ENTDATE)=4,AMOUNT,0)),2) AS APR, FORMAT(SUM(IF(MONTH(ENTDATE)=5,AMOUNT,0)),2) AS MAY, FORMAT(SUM(IF(MONTH(ENTDATE)=6,AMOUNT,0)),2) AS JUN, FORMAT(SUM(IF(MONTH(ENTDATE)=7,AMOUNT,0)),2) AS JUL, FORMAT(SUM(IF(MONTH(ENTDATE)=8,AMOUNT,0)),2) AS AUG, FORMAT(SUM(IF(MONTH(ENTDATE)=9,AMOUNT,0)),2) AS SEP, FORMAT(SUM(IF(MONTH(ENTDATE)=10,AMOUNT,0)),2) AS OCT, FORMAT(SUM(IF(MONTH(ENTDATE)=11,AMOUNT,0)),2) AS NOV, FORMAT(SUM(IF(MONTH(ENTDATE)=12,AMOUNT,0)),2) AS DECEM, FORMAT(SUM(AMOUNT),2) AS CTOTAL  FROM tblslshead as b, tblslsdetl as c","","{ 'data': 'PRONAME' },
{ 'data': 'JAN'},
{ 'data': 'FEB' },
{ 'data': 'MAR' },
{ 'data': 'APR'},
{ 'data': 'MAY'} ,
{ 'data': 'JUN'},
{ 'data': 'JUL'},
{ 'data': 'AUG'},
{ 'data': 'SEP'},
{ 'data': 'OCT'},
{ 'data': 'NOV'},
{ 'data': 'DECEM'},
{ 'data': 'CTOTAL'}
","Product, Jan, Feb, Mar, Apr, May, June, July, Aug, Sep, Oct, Nov, Dec, Total","[1,2,3,4,5,6,7,8,9,10,11,12,13]","-1","14","1,2,3,4,5,6,7,8,9,10,11,12,13","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","ENTDATE","no","","","GROUP BY PRONAME ORDER BY PRONAME","CANCELLED !='Y' and b.SLSID = c.SLSID");
INSERT INTO tblmenu VALUES("93","Sales - Counter Receipt","2021E","2000","100","","","","SELECT CUSTNAME, CUSTCODE, CUSTOMERID, ENTDATE, if(slstype=1,b.INVOICENO,b.DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE,  FORMAT(TOTAL,2) AS TOTAL, TOTAL AS TAMT, INVOICENO, DRNO FROM   tblslshead as b","","","","","","","","CounterReceipt","paper","landscape","fa fa-th-list fa-fw","","","0","1","ENTDATE","no","Customer","","order by CUSTNAME, CUSTOMERID, ENTDATE, b.SLSID","CANCELLED !='Y'");
INSERT INTO tblmenu VALUES("94","Sales Commission","2025A","2000","100","","","","SELECT a.*, if(slstype=1,INVOICENO,DRNO) AS INVDR, if(slstype=1,INVDATE,DRDATE) AS INVDRDATE,  FORMAT(TOTAL,2) AS TAMT, b.RATE, FORMAT((a.TOTAL * (b.RATE/100)),2) as COMAMT FROM  tblslshead as a, tblsalesman as b","","{ 'data': 'SMANNAME' },
{ 'data': 'INVDR' },
{ 'data': 'ENTDATE'},
{ 'data': 'CUSTNAME' },
{ 'data': 'TAMT'},
{ 'data': 'RATE'} ,
{ 'data': 'COMAMT'}","Salesman, No., Date, Customer, Amt. Sold, Rate, Commission","[4,5,6]","0","7","4,6","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","a.ENTDATE","no","Salesman","","order by a.SMANNAME, a.SALESMANID, a.ENTDATE, a.SLSID","a.CANCELLED !='Y' and a.SMANNAME !='' and a.SALESMANID = b.SALESMANID");
INSERT INTO tblmenu VALUES("95","Sales Commission Summary","2025B","2000","100","","","","SELECT a.*,   FORMAT(sum(TOTAL),2) AS TAMT, b.RATE, FORMAT((sum(a.TOTAL) * (b.RATE/100)),2) as COMAMT FROM  tblslshead as a, tblsalesman as b","","{ 'data': 'SMANNAME' },
{ 'data': 'TAMT'},
{ 'data': 'RATE'} ,
{ 'data': 'COMAMT'}","Salesman,  Amt. Sold, Rate, Commission","[1,2,3]","-1","4","1,2,3","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","a.ENTDATE","no","Salesman","","group by a.SMANNAME, a.SALESMANID order by a.SMANNAME, a.SALESMANID, a.ENTDATE, a.SLSID","a.CANCELLED !='Y' and a.SMANNAME !='' and a.SALESMANID = b.SALESMANID");
INSERT INTO tblmenu VALUES("96","Sales Summary By Product","2022E","2000","4","","","","SELECT PRONAME, PROID, PROCODE, SUM(QTY) AS QTY,  FORMAT(SUM(AMOUNT),2) AS AMOUNT, ENTDATE FROM tblslsdetl as a, tblslshead as b","","{ 'data': 'PRONAME' },
{ 'data': 'PROCODE' },
{ 'data': 'QTY' },
{ 'data': 'AMOUNT'}
","Product, Code,   Qty,  Amount","[2,3]","-1","4","2,3","","paper","landscape","fa fa-th-list fa-fw","","","0","1","ENTDATE","no","SProduct","","group by PRONAME, PROID order by PRONAME, PROID","a.SLSID = B.SLSID and CANCELLED !='Y'");
INSERT INTO tblmenu VALUES("97","Sales Summary By Customer","2022D","2000","4","","","","SELECT *,  FORMAT(SUM(TOTAL),2) AS TAMT FROM  tblslshead ","","{ 'data': 'CUSTNAME' },
{ 'data': 'TAMT'}","Customer, Amount","[1]","-1","2","1","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","ENTDATE","no","Customer","","group by CUSTNAME, CUSTOMERID ORDER BY CUSTNAME"," CANCELLED !='Y'");
INSERT INTO tblmenu VALUES("98","Receiving Report By Date Range","3001A","3000","4","","","","select PRONAME, PROID, PROCODE, QTY, UNIT, QTYPERBOX, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FORMAT(PURPRICE,2)  AS PURPRICE, FORMAT(AMOUNT,2) AS AMOUNT, FORMAT(FORAMOUNT,2) AS FORAMOUNT, SUPPNAME, SUPPCODE, SUPPLIERID, ENTDATE, TERMS, b.RRNO, b.RRID FROM tblpurchasehead as a, tblpurchasedetl as b ","","{ 'data': 'RRNO' },
{ 'data': 'ENTDATE'},
{ 'data': 'SUPPNAME' },
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'UNIT'},
{ 'data': 'QTYPERBOX'} ,
{ 'data': 'FORPURPRICE'} ,
{ 'data': 'FORAMOUNT'} ,
{ 'data': 'PURPRICE'} ,
{ 'data': 'AMOUNT'}","RR No., Date, Supplier, Product,Qty, Unit, Qty/Box, For. Price, For. Amt., Php Price, Php Amt.","[4,6,7,8,9,10]","-1","11","7,8,9,10","","paper","landscape","fa fa-map-o fa-fw","","","0","1","entdate","no","Supplier","","order by ENTDATE, b.RRID","a.RRID = B.RRID ");
INSERT INTO tblmenu VALUES("99","Receiving Report By Supplier","3001B","3000","4","","","","SELECT rrno, RRID, suppname, SUPPLIERID, entdate, terms, duedate, note, FORMAT(FORTOTAL,2) AS FORTOTAL, FORMAT(TOTAL,2) AS TOTAL, FORMAT(IMPORTCOST,2) AS IMPORTCOST, FORMAT(OTHERCHARGES,2) AS OTHERCHARGES, FORMAT(NET,2) AS NET, FOREX, FOREXRATE FROM tblpurchasehead","","{ 'data': 'suppname' },
{ 'data': 'rrno' },
{ 'data': 'entdate'},
{ 'data': 'terms' },
{ 'data': 'duedate' },
{ 'data': 'note' },
{ 'data': 'FOREX'},
{ 'data': 'FOREXRATE'} ,
{ 'data': 'IMPORTCOST'},
{ 'data': 'OTHERCHARGES'},
{ 'data': 'FORTOTAL'},
{ 'data': 'TOTAL'},
{ 'data': 'NET'}

","Supplier, RR No., Date, Terms, Duedate, Remarks, Forex, Rate, Importation Cost, Other Charges, For. Amt, Php Amt., Net Amt","[7,8,9,10,11,12]","0","13","8,9,10,11,12","","paper","landscape","fa fa-map-o fa-fw","","","0","1","entdate","no","Supplier","","order by SUPPNAME, ENTDATE","");
INSERT INTO tblmenu VALUES("101","Receiving Product By Supplier","3001C","3000","4","","","","select PRONAME, PROID, PROCODE, QTY, UNIT, QTYPERBOX, FORMAT(FORPURPRICE,2) AS FORPURPRICE, FORMAT(PURPRICE,2)  AS PURPRICE, FORMAT(AMOUNT,2) AS AMOUNT, FORMAT(FORAMOUNT,2) AS FORAMOUNT, SUPPNAME, SUPPCODE, SUPPLIERID, ENTDATE, TERMS, b.RRNO, b.RRID FROM tblpurchasehead as a, tblpurchasedetl as b ","","{ 'data': 'SUPPNAME' },
{ 'data': 'PRONAME' },
{ 'data': 'RRNO' },
{ 'data': 'ENTDATE'},
{ 'data': 'TERMS'},
{ 'data': 'QTY' },
{ 'data': 'UNIT'},
{ 'data': 'FORPURPRICE'} ,
{ 'data': 'FORAMOUNT'} ,
{ 'data': 'PURPRICE'} ,
{ 'data': 'AMOUNT'}","Supplier, Product, RR No., Date, Terms, Qty, Unit,  For. Price, For. Amt., Php Price, Php Amt.","[5,7,8,9,10]","0","11","7,8,9,10","","paper","landscape","fa fa-map-o fa-fw","","","0","1","entdate","no","Supplier","","order by SUPPNAME, PRONAME, ENTDATE, b.RRID","a.RRID = B.RRID ");
INSERT INTO tblmenu VALUES("102","Sales Payment","2102","2100","7","salespay/index.php?view=34ec78fcc91ffb1e54cd85e4a0924332","","","","","","","","-1","1","","","paper","portrait","fa fa-money fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("103","Accounts Receivable","2100","2100","6","#","","","","","","","","-1","1","","","paper","portrait","fa fa-rub fa-fw","","","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("104","Customer Receivables","2101","2100","7","arinquiry","","","","","","","","-1","1","","","paper","portrait","fa fa-rub fa-fw","","","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("105","User Access Level","9001B","9000","2","user","tbluseraccount","","SELECT *, USERID AS KEYID, "" AS U_PASSWORD FROM tbluseraccount","","[{ 	"colName": "KEYID", 
	"idName": "USERID", 
	"title": "ID", 
	"tdStyle":"width='40'",
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},
{ 	"colName": "U_NAME", 
	"title": "Full Name", 
	"display": "", 
	"tdStyle":"width='250'",
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "U_USERNAME", 
	"title": "Username", 
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":""  
},{ 	"colName": "U_PASSWORD", 
	"idName":"U_PASS",
	"title": "Password", 
	"display": "hidden", 
	"input":"password", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-passwordbox",
	"defVal":"" 
},{ 	"colName": "U_ROLE", 
	"title": "Role", 
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true" ,
	"defVal":"url:'getCombo.php?comboName=U_ROLE', method:'get', valueField:'id', textField:'text', panelHeight:'auto'" 
},{ 	"colName": "U_DATE", 
	"title": "Date", 
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true" ,
	"defVal":""
},{ 	"colName": "U_STATUS", 
	"title": "Status", 
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false",
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true" ,
	"defVal":"url:'getCombo.php?comboName=U_STATUS', method:'get', valueField:'id', textField:'text', panelHeight:'auto'"  }]
","","","-1","50","","","paper","portrait","fa fa-group fa-fw","","128","0","1","no","no","","","","where concat(u_name, u_username ) like ");
INSERT INTO tblmenu VALUES("106","Auto Number/Code","9001C","9000","9888","dataGridForm","tblautonumber","","SELECT *, ID AS KEYID  FROM tblautonumber","","[{ 	"colName": "KEYID", 
	"idName": "ID", 
	"title": "ID", 
	"tdStyle":"width='40'",
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "CODENAME", 
	"title": "Name", 
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":""  
},{ 	"colName": "FLDNAME", 
	"title": "Field", 
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "AUTOTYPE", 
	"title": "Type", 
	"display": "", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=AUTOTYPE',  method:'get',  valueField:'id', textField:'text',  panelHeight:'auto'" 
 
},{ 	"colName": "STARTVALUE", 
	"title": "Format", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false",
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":""  
},{ 	"colName": "RANDOMKEY", 
	"title": "Random Key", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false",
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":""  
},{ 	"colName": "CODESIZE", 
	"title": "Leading Zero", 
	"display": "", 
	"input":"spinner", 
	"required": "false", 
	"readonly":"false",
	"hidden":"false", 
	"class":"easyui-numberspinner",
	"sortable":"true" ,
	"defVal":""  
}]
","","","-1","50","","","paper","portrait","fa fa-group fa-fw","","128","0","1","no","no","","","","where concat(CODENAME, fldname ) like ");
INSERT INTO tblmenu VALUES("107","Purchases","3002B","3000","8888","dataGridTran","tblpurchasehead","tblpurchasedetl","SELECT *, RRID AS KEYID  FROM tblpurchasehead","SELECT *, Id AS KEYID  FROM tblpurchasedetl","[{ 	"colName": "KEYID", 
	"idName": "RRID", 
	"autoNum":"rrno",
	"title": "ID", 
	"tdStyle":"width='40'",
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "rrno", 
	"title": "Purchase No.", 
	"tdStyle":"width='100'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"cssStyle":" style='width:250px'",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "SUPPLIERID", 
	"colId":"suppname",
	"title": "Supplier", 
	"display": "hidden", 
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true" ,
	"defVal":"url:'getCombo.php?comboName=SUPPLIERID',  method:'get',  valueField:'id', textField:'text',  panelHeight:'auto'  " 
},{ 	"colName": "suppname", 
	"title": "Supplier", 
	"tdStyle":"width='350'",
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"none", 
	"class":"",
	"cssStyle":" style='width:250px'",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "refno", 
	"title": "Ref. No.", 
	"tdStyle":"width='100'",
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"cssStyle":" style='width:250px'",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "entdate", 
	"title": "Date", 
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":"" 
 
},{ 	"colName": "terms", 
	"title": "Terms", 
	"tdStyle":"width='50'",
	"display": "", 
	"input":"spinner", 
	"required": "false", 
	"readonly":"false",
	"hidden":"false", 
	"class":"easyui-numberspinner",
	"sortable":"true" ,
	"defVal":""  
},{ 	"colName": "duedate", 
	"title": "Due Date", 
	"display": "", 
	"input":"date", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "note", 
	"title": "Remarks", 
	"tdStyle":"width='300'",
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "total", 
	"title": "Total", 
	"tdStyle":"align='right'",
	"display": "", 
	"input":"number", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"none", 
	"class":"easyui-numberbox",
	"sortable":"true",
	"defVal":"" 
}]
","","[{ 	"colName": "KEYID2", 
	"idName": "Id", 
	"title": "ID", 
	"tdStyle":"width='40'",
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "RRID", 
	"title": "RR ID", 
	"tdStyle":"width='100'",
	"display": "hidden", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "PROID", 
	"colId":"PRONAME",
	"title": "Description", 
	"display": "hidden", 
	"input":"COMBO", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"url:'getCombo.php?comboName=PROID',  method:'get',  valueField:'id', textField:'text',  panelHeight:'auto'" 
},{ 	"colName": "PRONAME", 
	"title": "Product", 
	"tdStyle":"width='400'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "PROCODE", 
	"title": "Code", 
	"tdStyle":"width='100'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "QTY", 
	"title": "Qty.", 
	"tdStyle":"width='70' align='right'",
	"display": "", 
	"input":"spinner", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberspinner",
	"sortable":"true" ,
	"defVal":"" 

},{ 	"colName": "UNIT", 
	"title": "Unit", 
	"tdStyle":"width='70'",
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "PURPRICE", 
	"title": "Unit Cost", 
	"tdStyle":"width='90' align='right'",
	"display": "", 
	"input":"number", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "DISCAMT", 
	"title": "Discount", 
	"tdStyle":"width='90' align='right'",
	"display": "", 
	"input":"number", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "AMOUNT", 
	"title": "Amount", 
	"tdStyle":"width='90' align='right'",
	"display": "", 
	"input":"number", 
	"required": "false", 
	"readonly":"true", 
	"hidden":"false", 
	"class":"easyui-numberbox",
	"sortable":"true",
	"defVal":"" 
}]
","-1","60","","","paper","portrait","fa fa-list-alt fa-fw","#","128","0","3","no","no","","","","where concat(suppname, rrno ) like ");
INSERT INTO tblmenu VALUES("108","Page Menu","9001C","9000","2","dataGridForm","tblmenupublic","","SELECT *, Id AS KEYID FROM tblmenupublic","","[{ 	"colName": "KEYID", 
	"idName": "Id", 
	"title": "ID", 
	"tdStyle":"width='40'",
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "menuname", 
	"title": "Menu Name", 
	"display": "", 
	"tdStyle":"width='250'",
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"cssStyle":" style='width:500px'",
	"sortable":"true" ,
	"defVal":"" 
},{ 	"colName": "link", 
	"title": "Link", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"cssStyle":" style='width:500px'",
	"sortable":"true" ,
	"defVal":""  
},{ 	"colName": "seticon", 
	"title": "Icon", 
	"display": "", 
	"input":"combo", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"cssStyle":" style='width:350px'",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=ICONS', method:'get', valueField:'id', textField:'text', panelHeight:'auto',onChange:function(newvalue,oldvalue){showIcon(newvalue)}" 
},{ 	"colName": "contents", 
	"title": "Content", 
	"display": "hidden", 
	"input":"textarea", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true" ,
	"defVal":"'" 
  }]
","","","-1","90","","","paper","portrait","fa fa-group fa-fw","","128","0","1","no","no","","","","where menuname like ");
INSERT INTO tblmenu VALUES("112","Forwarders","1101C","1000","2","dataGridForm","tblforwarders","","SELECT *, FID AS KEYID FROM tblforwarders","","[{ 	"colName": "KEYID", 
	"idName": "FID", 
	"title": "ID", 
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "CONAME", 
	"title": "Forwarder",
	"tdStyle":"width='350'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
 
},{ 	"colName": "CONTACT", 
	"title": "Representative",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "ADDRESS", 
	"title": "Address", 
	"display": "hidden", 
	"input":"textbox", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
 
},{ 	"colName": "PHONE", 
	"title": "Contact Nos.", 
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
 
},{ 	"colName": "EMAILADD", 
	"title": "Email", 
	"display": "", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "ENTDATE", 
	"title": "Date", 
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""
 
}]
 ","","","-1","60","","","paper","portrait","fa fa-group fa-fw","","128","0","2","no","no","","","","where CONAME  LIKE ");
INSERT INTO tblmenu VALUES("111","Online Customer","12002","12000","2","dataGridForm","tblcustomeronline","","SELECT *, OCID AS KEYID FROM tblcustomeronline","","[{ 	"colName": "KEYID", 
	"idName": "OCID", 
	"title": "ID", 
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "OCNAME", 
	"title": "Full Name",
	"tdStyle":"width='250'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "EMAILADD", 
	"title": "Email",
	"tdStyle":"width='150'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "ADDRESS", 
	"title": "Address", 
	"tdStyle":"width='250'",
	"display": "yes", 
	"input":"textbox", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "AREA", 
	"title": "Area", 
	"display": "", 
	"tdStyle":"width='150'",
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=AREA', method:'get', valueField:'id', textField:'text', panelHeight:'auto'" 
},{ 	"colName": "PHONE", 
	"title": "Contact Nos.", 
	"tdStyle":"width='100'",
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 

},{ 	"colName": "ENTDATE", 
	"title": "Date", 
	"tdStyle":"width='80'",
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""
 
}]
 ","","","","60","","","paper","portrait","fa fa-group fa-fw","","128","0","2","no","no","","","","where CONCAT(OCNAME,AREA) LIKE ");
INSERT INTO tblmenu VALUES("113","Online Shipping","12003","12000","2","dataGridTran/index.php","tblcustomeronline","","SELECT *, OCID AS KEYID FROM tblcustomeronline","","[{ 	"colName": "KEYID", 
	"idName": "OCID", 
	"title": "ID", 
	"display": "hidden", 
	"input":"text", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"true", 
	"class":"easyui-textbox" ,
	"defVal":"" 
},{ 	"colName": "OCNAME", 
	"title": "Full Name",
	"tdStyle":"width='250'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "EMAILADD", 
	"title": "Email",
	"tdStyle":"width='150'",
	"display": "", 
	"input":"text", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"true",
	"defVal":"" 
},{ 	"colName": "ADDRESS", 
	"title": "Address", 
	"tdStyle":"width='250'",
	"display": "yes", 
	"input":"textbox", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 
},{ 	"colName": "AREA", 
	"title": "Area", 
	"display": "", 
	"tdStyle":"width='150'",
	"input":"combo", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-combobox",
	"sortable":"true",
	"defVal":"url:'getCombo.php?comboName=AREA', method:'get', valueField:'id', textField:'text', panelHeight:'auto'" 
},{ 	"colName": "PHONE", 
	"title": "Contact Nos.", 
	"tdStyle":"width='100'",
	"display": "", 
	"input":"textbox", 
	"required": "false", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-textbox",
	"sortable":"false",
	"defVal":"" 

},{ 	"colName": "ENTDATE", 
	"title": "Date", 
	"tdStyle":"width='80'",
	"display": "", 
	"input":"date", 
	"required": "true", 
	"readonly":"false", 
	"hidden":"false", 
	"class":"easyui-datebox",
	"sortable":"true",
	"defVal":""
 
}]
 ","","","","60","","","paper","portrait","fa fa-group fa-fw","","128","0","2","no","no","","","","where CONCAT(OCNAME,AREA) LIKE ");
INSERT INTO tblmenu VALUES("115","Annual Receiving Product Amount","3002B1","3000","4","","","","SELECT PRONAME, PROID, PROCODE, FORMAT(SUM(IF(MONTH(ENTDATE)=1,AMOUNT,0)),2) AS JAN , FORMAT(SUM(IF(MONTH(ENTDATE)=2,AMOUNT,0)),2) AS FEB, FORMAT(SUM(IF(MONTH(ENTDATE)=3,AMOUNT,0)),2) AS MAR, FORMAT(SUM(IF(MONTH(ENTDATE)=4,AMOUNT,0)),2) AS APR, FORMAT(SUM(IF(MONTH(ENTDATE)=5,AMOUNT,0)),2) AS MAY, FORMAT(SUM(IF(MONTH(ENTDATE)=6,AMOUNT,0)),2) AS JUN, FORMAT(SUM(IF(MONTH(ENTDATE)=7,AMOUNT,0)),2) AS JUL, FORMAT(SUM(IF(MONTH(ENTDATE)=8,AMOUNT,0)),2) AS AUG, FORMAT(SUM(IF(MONTH(ENTDATE)=9,AMOUNT,0)),2) AS SEP, FORMAT(SUM(IF(MONTH(ENTDATE)=10,AMOUNT,0)),2) AS OCT, FORMAT(SUM(IF(MONTH(ENTDATE)=11,AMOUNT,0)),2) AS NOV, FORMAT(SUM(IF(MONTH(ENTDATE)=12,AMOUNT,0)),2) AS DECEM, FORMAT(SUM(AMOUNT),2) AS CTOTAL  FROM tblpurchasehead as b, tblpurchasedetl as c","","{ 'data': 'PRONAME' },
{ 'data': 'JAN'},
{ 'data': 'FEB' },
{ 'data': 'MAR' },
{ 'data': 'APR'},
{ 'data': 'MAY'} ,
{ 'data': 'JUN'},
{ 'data': 'JUL'},
{ 'data': 'AUG'},
{ 'data': 'SEP'},
{ 'data': 'OCT'},
{ 'data': 'NOV'},
{ 'data': 'DECEM'},
{ 'data': 'CTOTAL'}
","Product, Jan, Feb, Mar, Apr, May, June, July, Aug, Sep, Oct, Nov, Dec, Total","[1,2,3,4,5,6,7,8,9,10,11,12,13]","-1","14","1,2,3,4,5,6,7,8,9,10,11,12,13","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","entdate","no","","","GROUP BY PRONAME, PROID ORDER BY PRONAME, PROID"," b.RRID = c.RRID");
INSERT INTO tblmenu VALUES("116","Sales Annually By Product Qty","2024C2","2000","4","","","","SELECT PRONAME, PROID, PROCODE, FORMAT(SUM(IF(MONTH(ENTDATE)=1,QTY,0)),2) AS JAN , FORMAT(SUM(IF(MONTH(ENTDATE)=2,QTY,0)),2) AS FEB, FORMAT(SUM(IF(MONTH(ENTDATE)=3,QTY,0)),2) AS MAR, FORMAT(SUM(IF(MONTH(ENTDATE)=4,QTY,0)),2) AS APR, FORMAT(SUM(IF(MONTH(ENTDATE)=5,QTY,0)),2) AS MAY, FORMAT(SUM(IF(MONTH(ENTDATE)=6,QTY,0)),2) AS JUN, FORMAT(SUM(IF(MONTH(ENTDATE)=7,QTY,0)),2) AS JUL, FORMAT(SUM(IF(MONTH(ENTDATE)=8,QTY,0)),2) AS AUG, FORMAT(SUM(IF(MONTH(ENTDATE)=9,QTY,0)),2) AS SEP, FORMAT(SUM(IF(MONTH(ENTDATE)=10,QTY,0)),2) AS OCT, FORMAT(SUM(IF(MONTH(ENTDATE)=11,QTY,0)),2) AS NOV, FORMAT(SUM(IF(MONTH(ENTDATE)=12,QTY,0)),2) AS DECEM, FORMAT(SUM(QTY),2) AS CTOTAL  FROM tblslshead as b, tblslsdetl as c","","{ 'data': 'PRONAME' },
{ 'data': 'JAN'},
{ 'data': 'FEB' },
{ 'data': 'MAR' },
{ 'data': 'APR'},
{ 'data': 'MAY'} ,
{ 'data': 'JUN'},
{ 'data': 'JUL'},
{ 'data': 'AUG'},
{ 'data': 'SEP'},
{ 'data': 'OCT'},
{ 'data': 'NOV'},
{ 'data': 'DECEM'},
{ 'data': 'CTOTAL'}
","Product, Jan, Feb, Mar, Apr, May, June, July, Aug, Sep, Oct, Nov, Dec, Total","[1,2,3,4,5,6,7,8,9,10,11,12,13]","-1","14","1,2,3,4,5,6,7,8,9,10,11,12,13","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","ENTDATE","no","","","GROUP BY PRONAME ORDER BY PRONAME","CANCELLED !='Y' and b.SLSID = c.SLSID");
INSERT INTO tblmenu VALUES("117","Annual Receiving Product Qty","3002B2","3000","4","","","","SELECT PRONAME, PROID, PROCODE, FORMAT(SUM(IF(MONTH(ENTDATE)=1,QTY,0)),2) AS JAN , FORMAT(SUM(IF(MONTH(ENTDATE)=2,QTY,0)),2) AS FEB, FORMAT(SUM(IF(MONTH(ENTDATE)=3,QTY,0)),2) AS MAR, FORMAT(SUM(IF(MONTH(ENTDATE)=4,QTY,0)),2) AS APR, FORMAT(SUM(IF(MONTH(ENTDATE)=5,QTY,0)),2) AS MAY, FORMAT(SUM(IF(MONTH(ENTDATE)=6,QTY,0)),2) AS JUN, FORMAT(SUM(IF(MONTH(ENTDATE)=7,QTY,0)),2) AS JUL, FORMAT(SUM(IF(MONTH(ENTDATE)=8,QTY,0)),2) AS AUG, FORMAT(SUM(IF(MONTH(ENTDATE)=9,QTY,0)),2) AS SEP, FORMAT(SUM(IF(MONTH(ENTDATE)=10,QTY,0)),2) AS OCT, FORMAT(SUM(IF(MONTH(ENTDATE)=11,QTY,0)),2) AS NOV, FORMAT(SUM(IF(MONTH(ENTDATE)=12,QTY,0)),2) AS DECEM, FORMAT(SUM(QTY),2) AS CTOTAL  FROM tblpurchasehead as b, tblpurchasedetl as c","","{ 'data': 'PRONAME' },
{ 'data': 'JAN'},
{ 'data': 'FEB' },
{ 'data': 'MAR' },
{ 'data': 'APR'},
{ 'data': 'MAY'} ,
{ 'data': 'JUN'},
{ 'data': 'JUL'},
{ 'data': 'AUG'},
{ 'data': 'SEP'},
{ 'data': 'OCT'},
{ 'data': 'NOV'},
{ 'data': 'DECEM'},
{ 'data': 'CTOTAL'}
","Product, Jan, Feb, Mar, Apr, May, June, July, Aug, Sep, Oct, Nov, Dec, Total","[1,2,3,4,5,6,7,8,9,10,11,12,13]","-1","14","1,2,3,4,5,6,7,8,9,10,11,12,13","","paper","landscape","fa fa-clipboard fa-fw","","","0","1","entdate","no","","","GROUP BY PRONAME, PROID ORDER BY PRONAME, PROID"," b.RRID = c.RRID");
INSERT INTO tblmenu VALUES("118","Online Sales - Date Range","12001","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, PRONAME, PROID,   QTY, FORMAT(PROPRICE,2) AS PROPRICE,  FORMAT(AMOUNT,2) AS AMOUNT FROM tblorderdetl as a, tblorderhead as b","","{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'CUSTNAME' },
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","No., Date, Customer, Product,Qty, Unit Price,  Amount","[4,5,6]","-1","7","6","","paper","landscape","fa fa-map-o fa-fw","","","0","1","ENTDATE","no","","","order by b.ENTDATE, b.SOID","a.SOID = b.SOID  ");
INSERT INTO tblmenu VALUES("119","Online Sales By Product","12002","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, PRONAME, PROID,   QTY, FORMAT(PROPRICE,2) AS PROPRICE,  FORMAT(AMOUNT,2) AS AMOUNT FROM tblorderdetl as a, tblorderhead as b","","{ 'data': 'PRONAME' },
{ 'data': 'CUSTNAME' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","Product, Customer, No., Date,  Qty, Unit Price,  Amount","[4,5,6]","0","7","6","","paper","landscape","fa fa-map-o fa-fw","","","0","1","ENTDATE","no","SProduct","","order by a.PRONAME, a.PROID, b.ENTDATE","a.SOID = b.SOID  ");
INSERT INTO tblmenu VALUES("120","Online Sales By Customer","12003","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, PRONAME, PROID,   QTY, FORMAT(PROPRICE,2) AS PROPRICE,  FORMAT(AMOUNT,2) AS AMOUNT FROM tblorderdetl as a, tblorderhead as b","","{ 'data': 'CUSTNAME' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","Customer, No., Date,  Product, Qty, Unit Price,  Amount","[4,5,6]","0","7","6","","paper","landscape","fa fa-map-o fa-fw","","","0","1","ENTDATE","no","","","order by CUSTNAME, b.SOID, b.ENTDATE","a.SOID = b.SOID  ");
INSERT INTO tblmenu VALUES("121","Online Sales For Shipping","12004A","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, b.DEL_STATUS, b.PROCESSDATE, b.FORWARDERS, b.TRACKNO, b.ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, a.PRONAME, a.PROID, a.QTY, FORMAT(a.PROPRICE,2) AS PROPRICE,  FORMAT(a.AMOUNT,2) AS AMOUNT, c.ADDRESS, c.PHONE, c.AREA FROM tblorderdetl as a, tblorderhead as b, tblcustomeronline as c","","{ 'data': 'AREA' },
{ 'data': 'CUSTNAME' },
{ 'data': 'PHONE' },
{ 'data': 'ADDRESS' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","Area, Customer, Contact No., Address, Order No., Date,  Product, Qty, Unit Price,  Amount","[7,8,9]","0","10","9","","paper","landscape","fa fa-map-o fa-fw","","","0","1","b.ENTDATE","no"," ","","order by AREA, CUSTNAME, CUSTCODE, b.SOID, b.ENTDATE","a.SOID = b.SOID  and b.OCID = c.OCID and b.DEL_STATUS ='On Process'");
INSERT INTO tblmenu VALUES("122","Online Sales Forwarded","12004B","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, b.DEL_STATUS, b.PROCESSDATE, b.FORWARDERS, b.TRACKNO, b.ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, a.PRONAME, a.PROID, a.QTY, FORMAT(a.PROPRICE,2) AS PROPRICE,  FORMAT(a.AMOUNT,2) AS AMOUNT, c.ADDRESS, c.PHONE, c.AREA FROM tblorderdetl as a, tblorderhead as b, tblcustomeronline as c","","{ 'data': 'AREA' },
{ 'data': 'CUSTNAME' },
{ 'data': 'FORWARDERS' },
{ 'data': 'TRACKNO' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","Area, Customer, Forwarder, Tracking No., Order No., Date,  Product, Qty, Unit Price,  Amount","[7,8,9]","0","10","9","","paper","landscape","fa fa-map-o fa-fw","","","0","1","b.ENTDATE","no"," ","","order by AREA, CUSTNAME, CUSTCODE, b.SOID, b.ENTDATE","a.SOID = b.SOID  and b.OCID = c.OCID and b.DEL_STATUS ='For Release'");
INSERT INTO tblmenu VALUES("123","Online Sales Delivered","12004C","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, b.DEL_STATUS, b.PROCESSDATE, b.FORWARDERS, b.TRACKNO, b.ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, a.PRONAME, a.PROID, a.QTY, FORMAT(a.PROPRICE,2) AS PROPRICE,  FORMAT(a.AMOUNT,2) AS AMOUNT, c.ADDRESS, c.PHONE, c.AREA FROM tblorderdetl as a, tblorderhead as b, tblcustomeronline as c","","{ 'data': 'AREA' },
{ 'data': 'CUSTNAME' },
{ 'data': 'FORWARDERS' },
{ 'data': 'TRACKNO' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","Area, Customer, Forwarder, Tracking No., Order No., Date,  Product, Qty, Unit Price,  Amount","[7,8,9]","0","10","9","","paper","landscape","fa fa-map-o fa-fw","","","0","1","b.ENTDATE","no"," ","","order by AREA, CUSTNAME, CUSTCODE, b.SOID, b.ENTDATE","a.SOID = b.SOID  and b.OCID = c.OCID and b.DEL_STATUS ='Delivered'");
INSERT INTO tblmenu VALUES("124","Online Sales Returned","12004D","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, b.DEL_STATUS, b.PROCESSDATE, b.FORWARDERS, b.TRACKNO, b.ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, a.PRONAME, a.PROID, a.QTY, FORMAT(a.PROPRICE,2) AS PROPRICE,  FORMAT(a.AMOUNT,2) AS AMOUNT, c.ADDRESS, c.PHONE, c.AREA FROM tblorderdetl as a, tblorderhead as b, tblcustomeronline as c","","{ 'data': 'AREA' },
{ 'data': 'CUSTNAME' },
{ 'data': 'FORWARDERS' },
{ 'data': 'TRACKNO' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","Area, Customer, Forwarder, Tracking No., Order No., Date,  Product, Qty, Unit Price,  Amount","[7,8,9]","0","10","9","","paper","landscape","fa fa-map-o fa-fw","","","0","1","b.ENTDATE","no"," ","","order by AREA, CUSTNAME, CUSTCODE, b.SOID, b.ENTDATE","a.SOID = b.SOID  and b.OCID = c.OCID and b.DEL_STATUS ='Returned'");
INSERT INTO tblmenu VALUES("125","Online Sales Cancelled","12004E","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, b.DEL_STATUS, b.PROCESSDATE, b.FORWARDERS, b.TRACKNO, b.ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, a.PRONAME, a.PROID, a.QTY, FORMAT(a.PROPRICE,2) AS PROPRICE,  FORMAT(a.AMOUNT,2) AS AMOUNT, c.ADDRESS, c.PHONE, c.AREA FROM tblorderdetl as a, tblorderhead as b, tblcustomeronline as c","","{ 'data': 'AREA' },
{ 'data': 'CUSTNAME' },
{ 'data': 'PHONE' },
{ 'data': 'ADDRESS' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","Area, Customer, Contact No., Address, Order No., Date,  Product, Qty, Unit Price,  Amount","[7,8,9]","0","10","9","","paper","landscape","fa fa-map-o fa-fw","","","0","1","b.ENTDATE","no"," ","","order by AREA, CUSTNAME, CUSTCODE, b.SOID, b.ENTDATE","a.SOID = b.SOID  and b.OCID = c.OCID and b.DEL_STATUS ='Cancelled'");
INSERT INTO tblmenu VALUES("126","Online Sales Unprocessed","12004F","12000","4","","","","SELECT b.OCNAME AS CUSTNAME, b.OCID AS CUSTCODE, b.DEL_STATUS, b.PROCESSDATE, b.FORWARDERS, b.TRACKNO, b.ENTDATE, b.SOID AS INVDR, b.ENTDATE AS INVDRDATE, a.PRONAME, a.PROID, a.QTY, FORMAT(a.PROPRICE,2) AS PROPRICE,  FORMAT(a.AMOUNT,2) AS AMOUNT, c.ADDRESS, c.PHONE, c.AREA FROM tblorderdetl as a, tblorderhead as b, tblcustomeronline as c","","{ 'data': 'AREA' },
{ 'data': 'CUSTNAME' },
{ 'data': 'PHONE' },
{ 'data': 'ADDRESS' },
{ 'data': 'INVDR' },
{ 'data': 'INVDRDATE'},
{ 'data': 'PRONAME' },
{ 'data': 'QTY' },
{ 'data': 'PROPRICE'} ,
{ 'data': 'AMOUNT'}
","Area, Customer, Contact No., Address, Order No., Date,  Product, Qty, Unit Price,  Amount","[7,8,9]","0","10","9","","paper","landscape","fa fa-map-o fa-fw","","","0","1","b.ENTDATE","no"," ","","order by AREA, CUSTNAME, CUSTCODE, b.SOID, b.ENTDATE","a.SOID = b.SOID  and b.OCID = c.OCID and (b.DEL_STATUS ='' or isnull(b.DEL_STATUS))");



CREATE TABLE `tblmenu_navuser` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` varchar(255) DEFAULT NULL,
  `STATUS` int(1) DEFAULT 0,
  `MENUID` int(11) DEFAULT 0,
  `ADDBTN` char(1) DEFAULT 'F',
  `EDITBTN` char(1) DEFAULT 'F',
  `DELETEBTN` char(1) DEFAULT 'F',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=1124 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO tblmenu_navuser VALUES("73","128","1","1","T","T","T");
INSERT INTO tblmenu_navuser VALUES("74","128","1","2","T","T","T");
INSERT INTO tblmenu_navuser VALUES("75","128","1","48","T","T","T");
INSERT INTO tblmenu_navuser VALUES("76","128","1","3","T","T","T");
INSERT INTO tblmenu_navuser VALUES("77","128","1","42","T","T","T");
INSERT INTO tblmenu_navuser VALUES("78","128","1","43","T","T","T");
INSERT INTO tblmenu_navuser VALUES("79","128","1","8","T","T","T");
INSERT INTO tblmenu_navuser VALUES("80","128","1","20","T","T","T");
INSERT INTO tblmenu_navuser VALUES("81","128","1","10","T","T","T");
INSERT INTO tblmenu_navuser VALUES("82","128","1","4","T","T","T");
INSERT INTO tblmenu_navuser VALUES("83","128","1","5","T","T","T");
INSERT INTO tblmenu_navuser VALUES("84","128","1","6","T","T","T");
INSERT INTO tblmenu_navuser VALUES("85","128","1","47","T","T","T");
INSERT INTO tblmenu_navuser VALUES("86","128","1","103","T","T","T");
INSERT INTO tblmenu_navuser VALUES("87","128","1","104","T","T","T");
INSERT INTO tblmenu_navuser VALUES("88","128","1","102","T","T","T");
INSERT INTO tblmenu_navuser VALUES("89","128","1","11","T","T","T");
INSERT INTO tblmenu_navuser VALUES("90","128","1","13","T","T","T");
INSERT INTO tblmenu_navuser VALUES("91","128","1","14","T","T","T");
INSERT INTO tblmenu_navuser VALUES("92","128","1","16","T","T","T");
INSERT INTO tblmenu_navuser VALUES("93","128","1","17","T","T","T");
INSERT INTO tblmenu_navuser VALUES("94","128","1","105","T","T","T");
INSERT INTO tblmenu_navuser VALUES("95","128","1","18","T","T","T");
INSERT INTO tblmenu_navuser VALUES("96","128","1","22","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1115","163","1","11","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1097","163","1","1","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1098","163","1","2","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1101","163","1","48","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1099","163","1","3","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1100","163","1","42","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1102","163","1","43","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1103","163","1","8","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1104","163","1","112","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1105","163","1","20","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1106","163","1","10","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1107","163","1","109","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1108","163","1","110","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1109","163","1","111","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1110","163","1","113","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1112","163","1","5","T","T","T");
INSERT INTO tblmenu_navuser VALUES("228","164","1","1","T","F","F");
INSERT INTO tblmenu_navuser VALUES("259","164","1","3","T","F","F");
INSERT INTO tblmenu_navuser VALUES("257","164","1","43","T","F","F");
INSERT INTO tblmenu_navuser VALUES("258","164","1","42","T","F","F");
INSERT INTO tblmenu_navuser VALUES("256","164","1","112","T","F","F");
INSERT INTO tblmenu_navuser VALUES("255","164","1","8","T","F","F");
INSERT INTO tblmenu_navuser VALUES("238","164","1","109","T","F","F");
INSERT INTO tblmenu_navuser VALUES("237","164","1","10","T","F","F");
INSERT INTO tblmenu_navuser VALUES("239","164","1","110","T","F","F");
INSERT INTO tblmenu_navuser VALUES("240","164","1","111","T","F","F");
INSERT INTO tblmenu_navuser VALUES("241","164","1","4","T","F","F");
INSERT INTO tblmenu_navuser VALUES("242","164","1","5","T","F","F");
INSERT INTO tblmenu_navuser VALUES("243","164","1","6","T","F","F");
INSERT INTO tblmenu_navuser VALUES("244","164","1","47","T","F","F");
INSERT INTO tblmenu_navuser VALUES("1114","163","1","47","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1113","163","1","6","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1111","163","1","4","T","T","T");
INSERT INTO tblmenu_navuser VALUES("254","164","1","16","T","F","F");
INSERT INTO tblmenu_navuser VALUES("1117","163","1","14","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1116","163","1","13","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1118","163","1","16","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1119","163","1","17","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1120","163","1","105","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1121","163","1","108","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1122","163","1","18","T","T","T");
INSERT INTO tblmenu_navuser VALUES("1123","163","1","22","T","T","T");



CREATE TABLE `tblmenu_reportuser` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `USERID` varchar(255) DEFAULT NULL,
  `STATUS` int(1) DEFAULT 0,
  `MENUID` int(11) DEFAULT 0,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=233 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO tblmenu_reportuser VALUES("221","163","1","88");
INSERT INTO tblmenu_reportuser VALUES("172","163","1","81");
INSERT INTO tblmenu_reportuser VALUES("220","163","1","96");
INSERT INTO tblmenu_reportuser VALUES("219","163","1","97");
INSERT INTO tblmenu_reportuser VALUES("168","163","1","76");
INSERT INTO tblmenu_reportuser VALUES("169","163","1","77");
INSERT INTO tblmenu_reportuser VALUES("136","163","1","36");
INSERT INTO tblmenu_reportuser VALUES("137","163","1","56");
INSERT INTO tblmenu_reportuser VALUES("192","163","1","83");
INSERT INTO tblmenu_reportuser VALUES("139","163","1","84");
INSERT INTO tblmenu_reportuser VALUES("196","163","1","26");
INSERT INTO tblmenu_reportuser VALUES("199","163","1","85");
INSERT INTO tblmenu_reportuser VALUES("193","163","1","87");
INSERT INTO tblmenu_reportuser VALUES("194","163","1","54");
INSERT INTO tblmenu_reportuser VALUES("195","163","1","86");
INSERT INTO tblmenu_reportuser VALUES("145","163","1","33");
INSERT INTO tblmenu_reportuser VALUES("146","163","1","71");
INSERT INTO tblmenu_reportuser VALUES("197","163","1","37");
INSERT INTO tblmenu_reportuser VALUES("198","163","1","57");
INSERT INTO tblmenu_reportuser VALUES("149","163","1","58");
INSERT INTO tblmenu_reportuser VALUES("150","163","1","59");
INSERT INTO tblmenu_reportuser VALUES("200","163","1","60");
INSERT INTO tblmenu_reportuser VALUES("152","163","1","65");
INSERT INTO tblmenu_reportuser VALUES("201","163","1","66");
INSERT INTO tblmenu_reportuser VALUES("202","163","1","61");
INSERT INTO tblmenu_reportuser VALUES("203","163","1","62");
INSERT INTO tblmenu_reportuser VALUES("156","163","1","63");
INSERT INTO tblmenu_reportuser VALUES("157","163","1","67");
INSERT INTO tblmenu_reportuser VALUES("158","163","1","68");
INSERT INTO tblmenu_reportuser VALUES("204","163","1","109");
INSERT INTO tblmenu_reportuser VALUES("214","163","1","4");
INSERT INTO tblmenu_reportuser VALUES("215","163","1","49");
INSERT INTO tblmenu_reportuser VALUES("162","163","1","73");
INSERT INTO tblmenu_reportuser VALUES("163","163","1","74");
INSERT INTO tblmenu_reportuser VALUES("216","163","1","78");
INSERT INTO tblmenu_reportuser VALUES("217","163","1","82");
INSERT INTO tblmenu_reportuser VALUES("166","163","1","93");
INSERT INTO tblmenu_reportuser VALUES("218","163","1","75");
INSERT INTO tblmenu_reportuser VALUES("135","163","1","52");
INSERT INTO tblmenu_reportuser VALUES("191","163","1","51");
INSERT INTO tblmenu_reportuser VALUES("190","163","1","50");
INSERT INTO tblmenu_reportuser VALUES("189","163","1","35");
INSERT INTO tblmenu_reportuser VALUES("187","163","1","25");
INSERT INTO tblmenu_reportuser VALUES("188","163","1","24");
INSERT INTO tblmenu_reportuser VALUES("129","163","1","70");
INSERT INTO tblmenu_reportuser VALUES("186","163","1","69");
INSERT INTO tblmenu_reportuser VALUES("185","163","1","23");
INSERT INTO tblmenu_reportuser VALUES("184","163","1","1");
INSERT INTO tblmenu_reportuser VALUES("174","163","1","89");
INSERT INTO tblmenu_reportuser VALUES("222","163","1","90");
INSERT INTO tblmenu_reportuser VALUES("176","163","1","94");
INSERT INTO tblmenu_reportuser VALUES("177","163","1","95");
INSERT INTO tblmenu_reportuser VALUES("225","163","1","98");
INSERT INTO tblmenu_reportuser VALUES("224","163","1","11");
INSERT INTO tblmenu_reportuser VALUES("226","163","1","99");
INSERT INTO tblmenu_reportuser VALUES("227","163","1","101");
INSERT INTO tblmenu_reportuser VALUES("231","163","1","16");
INSERT INTO tblmenu_reportuser VALUES("232","163","1","22");
INSERT INTO tblmenu_reportuser VALUES("205","163","1","118");
INSERT INTO tblmenu_reportuser VALUES("206","163","1","119");
INSERT INTO tblmenu_reportuser VALUES("207","163","1","120");
INSERT INTO tblmenu_reportuser VALUES("208","163","1","121");
INSERT INTO tblmenu_reportuser VALUES("209","163","1","122");
INSERT INTO tblmenu_reportuser VALUES("210","163","1","123");
INSERT INTO tblmenu_reportuser VALUES("211","163","1","124");
INSERT INTO tblmenu_reportuser VALUES("212","163","1","125");
INSERT INTO tblmenu_reportuser VALUES("213","163","1","126");
INSERT INTO tblmenu_reportuser VALUES("223","163","1","116");
INSERT INTO tblmenu_reportuser VALUES("228","163","1","114");
INSERT INTO tblmenu_reportuser VALUES("229","163","1","115");
INSERT INTO tblmenu_reportuser VALUES("230","163","1","117");



CREATE TABLE `tblmenupublic` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `seticon` varchar(255) DEFAULT NULL,
  `contents` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO tblmenupublic VALUES("6","About Us","battery-three-quarters","<div style="width:70%; margin:auto; padding:50px">

<h4><p>Missions and Vision</p></h4>
<hr>
Make commerce better for everyone, so businesses can focus on what they do best: building and selling their products.
<br>
<br>
Build the best product, cause no unnecessary harm, use business to inspire and implement solutions.

</div>","","javascript:void(0)");
INSERT INTO tblmenupublic VALUES("7","Contact Us","phone-square","<div style="width:70%; margin:auto; padding:50px">

<h4><p>Contact Us</p></h4>
<hr>
<div class="col-lg-2">Phone No.:</div>
<div class="col-lg-10">632 9122299</div>
<div class="col-lg-2">Email:</div>
<div class="col-lg-10">bmsi0927@gmail.com</div>
<br>
<br>
Build the best product, cause no unnecessary harm, use business to inspire and implement solutions.

</div>","","javascript:void(0)");



CREATE TABLE `tblmenusubpublic` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `seticon` varchar(255) DEFAULT NULL,
  `contents` longtext DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `mainId` int(11) DEFAULT 0,
  `mainmenu` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblorderdetl` (
  `SOPID` int(11) NOT NULL AUTO_INCREMENT,
  `PROID` int(11) NOT NULL,
  `QTY` int(11) NOT NULL DEFAULT 0,
  `PROPRICE` double(12,2) DEFAULT NULL,
  `SOID` int(11) NOT NULL DEFAULT 0,
  `OCID` int(11) NOT NULL DEFAULT 0,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `PRONAME` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SOPID`),
  KEY `USERID` (`OCID`),
  KEY `PROID` (`PROID`),
  KEY `ORDEREDNUM` (`SOID`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

INSERT INTO tblorderdetl VALUES("1","5","1","1231.00","1","1","1231.00","product 2");
INSERT INTO tblorderdetl VALUES("2","14","1","350.00","1","1","350.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("3","8","1","100.00","1","1","100.00","T Shirt - dye - for men");
INSERT INTO tblorderdetl VALUES("4","10","1","200.00","2","1","200.00","T Shirt - Adidas White - Men");
INSERT INTO tblorderdetl VALUES("5","2","1","100.00","3","1","100.00","T-SHIRT - ROUND NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("6","9","1","100.00","4","1","100.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("7","2","1","100.00","4","1","100.00","T-SHIRT - ROUND NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("8","11","1","250.00","4","1","250.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("9","8","1","100.00","5","1","100.00","T Shirt - dye - for men");
INSERT INTO tblorderdetl VALUES("10","11","1","250.00","5","1","250.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("11","7","1","100.00","6","1","100.00","T Shirt - White - Men");
INSERT INTO tblorderdetl VALUES("12","14","1","350.00","6","1","350.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("13","11","1","250.00","7","1","250.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("14","12","1","150.00","7","1","150.00","T SHIRT VIOLET FOR WOMEN");
INSERT INTO tblorderdetl VALUES("15","4","1","190.00","7","1","190.00","product 1");
INSERT INTO tblorderdetl VALUES("16","3","1","100.00","8","1","100.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("17","13","1","145.00","8","1","145.00","T SHIRT TS012 DESIGN MEN");
INSERT INTO tblorderdetl VALUES("18","3","1","100.00","9","1","100.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("19","8","1","100.00","9","1","100.00","T Shirt - dye - for men");
INSERT INTO tblorderdetl VALUES("20","9","1","100.00","9","1","100.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("21","7","1","100.00","10","1","100.00","T Shirt - White - Men");
INSERT INTO tblorderdetl VALUES("22","3","2","100.00","10","1","200.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("23","2","1","100.00","10","1","100.00","T-SHIRT - ROUND NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("24","12","1","150.00","10","1","150.00","T SHIRT VIOLET FOR WOMEN");
INSERT INTO tblorderdetl VALUES("25","9","1","100.00","11","1","100.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("26","14","2","350.00","12","1","700.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("27","8","1","100.00","12","1","100.00","T Shirt - dye - for men");
INSERT INTO tblorderdetl VALUES("28","13","1","145.00","12","1","145.00","T SHIRT TS012 DESIGN MEN");
INSERT INTO tblorderdetl VALUES("29","9","1","100.00","12","1","100.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("30","4","1","190.00","12","1","190.00","product 1");
INSERT INTO tblorderdetl VALUES("31","2","1","100.00","12","1","100.00","T-SHIRT - ROUND NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("32","6","1","10000.00","12","1","10000.00","product 3");
INSERT INTO tblorderdetl VALUES("33","3","2","100.00","12","1","200.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("34","5","1","1231.00","12","1","1231.00","product 2");
INSERT INTO tblorderdetl VALUES("35","7","1","100.00","12","1","100.00","T Shirt - White - Men");
INSERT INTO tblorderdetl VALUES("36","10","1","200.00","12","1","200.00","T Shirt - Adidas White - Men");
INSERT INTO tblorderdetl VALUES("37","5","1","1231.00","13","1","1231.00","product 2");
INSERT INTO tblorderdetl VALUES("38","8","2","100.00","13","1","200.00","T Shirt - dye - for men");
INSERT INTO tblorderdetl VALUES("39","3","1","100.00","13","1","100.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("40","2","1","100.00","13","1","100.00","T-SHIRT - ROUND NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("41","4","1","190.00","13","1","190.00","product 1");
INSERT INTO tblorderdetl VALUES("42","14","1","350.00","13","1","350.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("43","6","1","10000.00","13","1","10000.00","product 3");
INSERT INTO tblorderdetl VALUES("44","10","1","200.00","13","1","200.00","T Shirt - Adidas White - Men");
INSERT INTO tblorderdetl VALUES("45","9","1","100.00","13","1","100.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("46","11","1","250.00","13","1","250.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("47","12","1","150.00","13","1","150.00","T SHIRT VIOLET FOR WOMEN");
INSERT INTO tblorderdetl VALUES("48","6","1","10000.00","14","1","10000.00","product 3");
INSERT INTO tblorderdetl VALUES("49","2","1","100.00","14","1","100.00","T-SHIRT - ROUND NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("50","5","2","1231.00","14","1","2462.00","product 2");
INSERT INTO tblorderdetl VALUES("51","9","2","100.00","14","1","200.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("52","13","2","145.00","14","1","290.00","T SHIRT TS012 DESIGN MEN");
INSERT INTO tblorderdetl VALUES("53","4","1","190.00","14","1","190.00","product 1");
INSERT INTO tblorderdetl VALUES("54","3","1","100.00","14","1","100.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("55","14","1","350.00","14","1","350.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("56","7","1","100.00","14","1","100.00","T Shirt - White - Men");
INSERT INTO tblorderdetl VALUES("57","8","1","100.00","14","1","100.00","T Shirt - dye - for men");
INSERT INTO tblorderdetl VALUES("58","12","1","150.00","14","1","150.00","T SHIRT VIOLET FOR WOMEN");
INSERT INTO tblorderdetl VALUES("59","11","1","250.00","14","1","250.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("60","12","1","150.00","15","1","150.00","T SHIRT VIOLET FOR WOMEN");
INSERT INTO tblorderdetl VALUES("61","9","1","100.00","15","1","100.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("62","6","1","10000.00","15","1","10000.00","product 3");
INSERT INTO tblorderdetl VALUES("63","13","1","145.00","15","1","145.00","T SHIRT TS012 DESIGN MEN");
INSERT INTO tblorderdetl VALUES("64","11","1","250.00","16","1","250.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("65","6","2","10000.00","17","3","20000.00","product 3");
INSERT INTO tblorderdetl VALUES("66","8","2","100.00","17","3","200.00","T Shirt - dye - for men");
INSERT INTO tblorderdetl VALUES("67","11","2","250.00","17","3","500.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("68","9","2","100.00","17","3","200.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("69","13","2","145.00","17","3","290.00","T SHIRT TS012 DESIGN MEN");
INSERT INTO tblorderdetl VALUES("70","4","2","190.00","17","3","380.00","product 1");
INSERT INTO tblorderdetl VALUES("71","10","2","200.00","17","3","400.00","T Shirt - Adidas White - Men");
INSERT INTO tblorderdetl VALUES("72","5","2","1231.00","17","3","2462.00","product 2");
INSERT INTO tblorderdetl VALUES("73","3","2","100.00","18","8","200.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("74","4","2","190.00","18","8","380.00","product 1");
INSERT INTO tblorderdetl VALUES("75","8","1","100.00","18","8","100.00","T Shirt - dye - for men");
INSERT INTO tblorderdetl VALUES("76","5","1","1231.00","18","8","1231.00","product 2");
INSERT INTO tblorderdetl VALUES("77","4","2","190.00","19","12","380.00","product 1");
INSERT INTO tblorderdetl VALUES("78","3","2","100.00","19","12","200.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("79","4","2","190.00","20","13","380.00","product 1");
INSERT INTO tblorderdetl VALUES("80","11","2","250.00","20","13","500.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("81","7","2","100.00","21","14","200.00","T Shirt - White - Men");
INSERT INTO tblorderdetl VALUES("82","12","2","150.00","21","14","300.00","T SHIRT VIOLET FOR WOMEN");
INSERT INTO tblorderdetl VALUES("83","14","1","350.00","22","14","350.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("84","11","1","250.00","22","14","250.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("85","5","2","1231.00","22","14","2462.00","product 2");
INSERT INTO tblorderdetl VALUES("86","3","3","100.00","23","15","300.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("87","12","1","150.00","24","16","150.00","T SHIRT VIOLET FOR WOMEN");
INSERT INTO tblorderdetl VALUES("88","3","1","100.00","25","16","100.00","T-SHIRT V NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("89","2","1","100.00","26","16","100.00","T-SHIRT - ROUND NECK - SPANDEX - SMALL");
INSERT INTO tblorderdetl VALUES("90","4","1","190.00","27","16","190.00","product 1");
INSERT INTO tblorderdetl VALUES("91","14","1","350.00","28","16","350.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("92","9","1","100.00","29","16","100.00","T Shirt Navy Blue with Design for Men");
INSERT INTO tblorderdetl VALUES("93","7","1","100.00","30","16","100.00","T Shirt - White - Men");
INSERT INTO tblorderdetl VALUES("94","11","1","250.00","31","16","250.00","T Shirt with Buttons - Violet for Men");
INSERT INTO tblorderdetl VALUES("95","14","1","350.00","31","16","350.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("96","14","1","350.00","32","16","350.00","Cargo Pants Khaki Pocket - men");
INSERT INTO tblorderdetl VALUES("97","4","1","190.00","33","16","190.00","product 1");
INSERT INTO tblorderdetl VALUES("98","10","1","200.00","34","16","200.00","T Shirt - Adidas White - Men");
INSERT INTO tblorderdetl VALUES("99","13","1","145.00","34","16","145.00","T SHIRT TS012 DESIGN MEN");
INSERT INTO tblorderdetl VALUES("100","5","1","1231.00","35","17","1231.00","product 2");



CREATE TABLE `tblorderhead` (
  `SOID` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `SLSID` int(11) unsigned DEFAULT NULL,
  `INVOICENO` varchar(20) DEFAULT NULL,
  `OCNAME` varchar(255) DEFAULT NULL,
  `OCID` int(11) DEFAULT 0,
  `ENTDATE` varchar(255) DEFAULT NULL,
  `TOTAL` double(12,2) DEFAULT 0.00,
  `PAIDAMT` double(12,2) DEFAULT 0.00,
  `PAYMODE` varchar(50) DEFAULT 'Cash On Delivery',
  `NOTE` longtext DEFAULT NULL,
  `PAYRECEIPT` varchar(255) DEFAULT NULL,
  `DEL_STATUS` varchar(100) DEFAULT NULL,
  `PROCESSDATE` datetime DEFAULT NULL,
  `FORWARDERS` varchar(100) DEFAULT NULL,
  `TRACKNO` varchar(20) DEFAULT NULL,
  `SHIPPINGNOTE` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`SOID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

INSERT INTO tblorderhead VALUES("00000000001","16","0000016","Jimmy","1","2020-07-12","1681.00","1681.00","Cash On Delivery","test","images/oCustomer/1_0c8b7bc9611a23f592b99306ba7f6f66.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000002","15","0000015","Jimmy","1","2020-07-12","200.00","200.00","Cash On Delivery","test","images/oCustomer/2_t-shirt1.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000003","14","0000014","Jimmy","1","2020-07-13","100.00","100.00","Cash On Delivery","","images/oCustomer/3_0c8b7bc9611a23f592b99306ba7f6f66.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000004","13","0000013","Jimmy","1","2020-07-13","450.00","450.00","Cash On Delivery","","images/oCustomer/4_5592074085d1a34e3cd294c7b81b3598.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000005","12","0000012","Jimmy","1","2020-07-13","350.00","350.00","Cash On Delivery","","images/oCustomer/5_carlogo2.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000006","11","0000011","Jimmy","1","2020-07-13","450.00","450.00","Cash On Delivery","","images/oCustomer/6_7dfd2f76d5a7abd854b153eeb225e967.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000007","10","0000010","Jimmy","1","2020-07-13","590.00","590.00","Cash On Delivery","","images/oCustomer/7_c1fe308bfc0c37983269bffa93abd20d.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000008","9","0000009","Jimmy","1","2020-07-13","245.00","245.00","Cash On Delivery","","images/oCustomer/8_carbrand.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000009","8","0000008","Jimmy","1","2020-07-13","300.00","300.00","Cash On Delivery","","images/oCustomer/9_car-honda-scooter-spare-part-vehicle-vector-brakes-and-parts.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000010","7","0000007","Jimmy","1","2020-07-13","550.00","550.00","Cash On Delivery","","images/oCustomer/10_carlogo.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000011","6","0000006","Jimmy","1","2020-07-13","100.00","100.00","Cash On Delivery","","images/oCustomer/11_0c8b7bc9611a23f592b99306ba7f6f66.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000012","5","0000005","Jimmy","1","2020-07-13","13066.00","13066.00","Cash On Delivery","","images/oCustomer/12_0c8b7bc9611a23f592b99306ba7f6f66.png","For Release","2020-07-16 11:54:09","JRS EXPRESS","2311231411a","123res");
INSERT INTO tblorderhead VALUES("00000000013","4","0000004","Jimmy","1","2020-07-13","12871.00","12871.00","Cash On Delivery","","images/oCustomer/13_0c8b7bc9611a23f592b99306ba7f6f66.png","On Process","2020-07-16 00:27:51","","","");
INSERT INTO tblorderhead VALUES("00000000014","3","0000003","Jimmy","1","2020-07-13","14292.00","14292.00","Cash On Delivery","","images/oCustomer/14_0c8b7bc9611a23f592b99306ba7f6f66.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000015","2","0000002","Jimmy","1","2020-07-13","10395.00","10395.00","Cash On Delivery","test","images/oCustomer/15_0c8b7bc9611a23f592b99306ba7f6f66.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000016","1","0000001","Jimmy","1","2020-07-15","250.00","250.00","Bank Deposit","tesfsafasdfas","images/oCustomer/16_solution2large.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000017","","","Jeremy","3","2020-07-16","24432.00","24432.00","Cash On Delivery","Test","images/oCustomer/17_twice logo.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000018","","","Jeremy Santos","8","2020-07-16","1911.00","1911.00","Cash On Delivery","SANA","images/oCustomer/18_106923656_2881990725245102_8856582959141280451_o.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000019","","","mark jeremy santos","12","2020-07-16","580.00","580.00","Cash On Delivery","TEST","images/oCustomer/19_twice logo.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000020","","","jEREMY 1","13","2020-07-16","880.00","880.00","Cash On Delivery","TEST 4","images/oCustomer/20_chichahaharon.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000021","","","Jeremy 2","14","2020-07-16","500.00","500.00","Cash On Delivery","TEST 5","images/oCustomer/21_twice logo.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000022","","","Jeremy 2","14","2020-07-16","3062.00","3062.00","Cash On Delivery","test 6","images/oCustomer/22_chichahaharon.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000023","","","jeremy3","15","2020-07-16","300.00","300.00","Cash On Delivery","test 44","images/oCustomer/23_106923656_2881990725245102_8856582959141280451_o.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000024","","","test","16","2020-07-16","150.00","150.00","Cash On Delivery","","images/oCustomer/24_jcpbusinesscard_back.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000025","","","test","16","2020-07-16","100.00","100.00","Bank Deposit","","images/oCustomer/25_chichahaharon.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000026","","","test","16","2020-07-16","100.00","100.00","Cash On Delivery","","images/oCustomer/26_download.jPEG","","","","","");
INSERT INTO tblorderhead VALUES("00000000027","","","test","16","2020-07-16","190.00","190.00","Bank Deposit","","images/oCustomer/27_134-1341358_free-png-sky-blue-t-shirt-png-images.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000028","","","test","16","2020-07-16","350.00","350.00","Cash On Delivery","","images/oCustomer/28_GTECH GAMING.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000029","","","test","16","2020-07-16","100.00","100.00","Cash On Delivery","","images/oCustomer/29_jcpbusinesscard_front.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000030","","","test","16","2020-07-16","100.00","100.00","Cash On Delivery","","images/oCustomer/30_chichahaharon.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000031","","","test","16","2020-07-16","600.00","600.00","Cash On Delivery","","images/oCustomer/31_jcpbusinesscard_back.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000032","","","test","16","2020-07-16","350.00","350.00","Cash On Delivery","","images/oCustomer/32_jcpbusinesscard_back.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000033","","","test","16","2020-07-16","190.00","190.00","Cash On Delivery","","images/oCustomer/33_RDS2.jpg","","","","","");
INSERT INTO tblorderhead VALUES("00000000034","","","test","16","2020-07-16","345.00","345.00","Cash On Delivery","","images/oCustomer/34_jcpbusinesscard_back.png","","","","","");
INSERT INTO tblorderhead VALUES("00000000035","","","Jaimee","17","2020-07-16","1231.00","1231.00","Cash On Delivery","","images/oCustomer/35_jcpbusinesscard_back.png","","","","","");



CREATE TABLE `tblordershipping` (
  `SOSID` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `SOID` int(11) unsigned zerofill DEFAULT 00000000000,
  `STATUS` varchar(100) DEFAULT NULL,
  `STAT_DATE` datetime DEFAULT NULL,
  `USERID` int(255) DEFAULT NULL,
  `NOTE` longtext DEFAULT NULL,
  `FORWARDERS` varchar(100) DEFAULT NULL,
  `TRACKNO` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`SOSID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO tblordershipping VALUES("00000000017","00000000012","On Process","2020-07-16 11:53:40","128","","","");
INSERT INTO tblordershipping VALUES("00000000018","00000000012","For Release","2020-07-16 11:54:09","128","123res","JRS EXPRESS","2311231411a");
INSERT INTO tblordershipping VALUES("00000000019","00000000013","On Process","2020-07-16 00:27:51","128","","","");



CREATE TABLE `tblpodetl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `POID` int(11) DEFAULT 0,
  `pono` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(255) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `QTY` double(12,2) DEFAULT 0.00,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `QTYRECEIVED` double(12,2) DEFAULT 0.00,
  `FORPURPRICE` double(12,2) DEFAULT 0.00,
  `FORAMOUNT` double(12,2) DEFAULT 0.00,
  `SUPPITEM` varchar(255) DEFAULT NULL,
  `QTYPERBOX` int(6) DEFAULT 0,
  `FLOORPRICE` double(12,2) DEFAULT 0.00,
  `FLOORRATE` double(6,2) DEFAULT 0.00,
  `UNIT` char(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
  `FOREX` varchar(5) DEFAULT NULL,
  `FOREXRATE` double(9,2) DEFAULT 0.00,
  `FORTOTAL` double(12,2) DEFAULT 0.00,
  `FORNET` double(12,2) DEFAULT 0.00,
  `PRINTED` char(3) DEFAULT 'no',
  PRIMARY KEY (`POID`),
  KEY `pono` (`pono`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblproduct` (
  `PROID` int(11) NOT NULL AUTO_INCREMENT,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PRONAME` varchar(255) DEFAULT NULL,
  `entdate` char(10) DEFAULT NULL,
  `CATEGORIES` varchar(255) DEFAULT NULL,
  `ITEMBRAND` varchar(100) DEFAULT NULL,
  `COLOR` varchar(50) DEFAULT NULL,
  `PROQTY` double(12,2) DEFAULT 0.00,
  `UNIT` char(20) DEFAULT NULL,
  `PROPRICE` double(12,2) DEFAULT 0.00,
  `WPROPRICE` double(12,2) DEFAULT 0.00,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `AVGCOST` double(12,2) NOT NULL DEFAULT 0.00,
  `CARBRAND` varchar(50) DEFAULT NULL,
  `PROMODEL` varchar(30) DEFAULT NULL,
  `PROBRAND` varchar(255) DEFAULT NULL,
  `PRODESC` varchar(255) DEFAULT NULL,
  `MAXQTY` double(12,2) DEFAULT 0.00,
  `REORDER` double(12,2) DEFAULT 0.00,
  `PPROPRICE` double(12,2) DEFAULT 0.00,
  `PROMARGIN` double(6,2) DEFAULT 0.00,
  `CATEGID` int(11) DEFAULT NULL,
  `IMAGES` varchar(255) DEFAULT NULL,
  `PROSTATS` varchar(30) DEFAULT NULL,
  `FORPURPRICE` double(12,2) DEFAULT 0.00,
  `FOREX` char(5) DEFAULT 'PHP',
  `FLOORPRICE` double(12,2) DEFAULT 0.00,
  `FLOORRATE` double(6,2) DEFAULT 0.00,
  `INACTIVE` char(3) DEFAULT 'No',
  `CARMAKE` varchar(50) DEFAULT NULL,
  `ITEMMAKE` varchar(50) DEFAULT NULL,
  `YEARMODEL` char(10) DEFAULT NULL,
  `YRSMODEL` varchar(10) DEFAULT NULL,
  `SIDES` char(10) DEFAULT NULL,
  `OTHERNAME` varchar(100) DEFAULT NULL,
  `COUNTRY` varchar(100) DEFAULT NULL,
  `VOLTS` int(5) DEFAULT 0,
  `WATTS` int(5) DEFAULT 0,
  `STOCKTYPE` varchar(50) DEFAULT NULL,
  `AGING` int(5) DEFAULT 0,
  `LOCATION` char(20) DEFAULT NULL,
  `QTYPERBOX` int(5) DEFAULT 0,
  `REMARKS` varchar(300) DEFAULT NULL,
  `suppname` varchar(100) DEFAULT NULL,
  `suppcode` char(20) DEFAULT NULL,
  `SUPPITEM` varchar(100) DEFAULT NULL,
  `BEGQTY` double(10,2) NOT NULL DEFAULT 0.00,
  `BEGAVGCOST` double(12,2) NOT NULL DEFAULT 0.00,
  `SMANRATE` double(6,2) DEFAULT 0.00,
  `SUPPLIERID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PROID`),
  UNIQUE KEY `PROCODE` (`PROCODE`),
  KEY `CATEGID` (`CATEGID`),
  KEY `PRONAME` (`PRONAME`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO tblproduct VALUES("2","TSRS001","T-SHIRT - ROUND NECK - SPANDEX - SMALL","2020-07-01","T-SHIRT","MALL BRAND","BLACK","94.00","PC","100.00","90.00","70.00","70.00","","","","","0.00","0.00","0.00","0.00","","images/products/2_t-shirt1.jpg","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("3","TSVS001","T-SHIRT V NECK - SPANDEX - SMALL","2020-07-01","T-SHIRT","MALL BRAND","ARMY GREEN","-8.00","PC","100.00","90.00","65.00","65.00","","","","","0.00","0.00","0.00","0.00","","images/products/3_t-shirt2.jpg","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("4","cd","product 1","2020-07-10","PANTS","MALL BRAND","","6.00","pc","190.00","190.00","100.00","100.00","","","","","0.00","0.00","0.00","0.00","","images/products/4_5e29ba011c4aba5fdb47eb26d92e6bd0.png","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("5","dafdsfa","product 2","2020-07-10","sdfadsf","dfad","sdfasd","-5.00","pc","1231.00","1000.00","800.00","800.00","","","","","0.00","0.00","0.00","0.00","","images/products/5_7dfd2f76d5a7abd854b153eeb225e967.png","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("6","esfasdfasdfasd","product 3","2020-07-17","asdfsda","","","-4.00","pc","10000.00","9000.00","8000.00","8000.00","","","","","0.00","0.00","0.00","0.00","","images/products/6_birthday-cake-wish-greeting-card-e-card-creative-cars-thumb.jpg","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("7","ts09123","T Shirt - White - Men","2020-07-10","T-SHIRT","MALL BRAND","WHITE","-4.00","pc","100.00","90.00","70.00","70.00","","","","","0.00","0.00","0.00","0.00","","images/products/7_tshirt-png-no-background-2.png","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("8","tsd0012","T Shirt - dye - for men","2020-07-10","T-SHIRT","MALL BRAND","dye","7.00","pc","100.00","90.00","70.00","70.00","","","","","0.00","0.00","0.00","0.00","","images/products/8_bd1e1b2241dc169fe988dd02fab52bf3.png","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("9","tsn00012","T Shirt Navy Blue with Design for Men","2020-07-10","T-SHIRT","MALL BRAND","NAVY BLUE","-8.00","pc","100.00","90.00","70.00","70.00","","","","","0.00","0.00","0.00","0.00","","images/products/9_1184939.65.d65d0S7ayAAA-650x650-b-p-eee.jpg","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("10","TSA032342","T Shirt - Adidas White - Men","2020-07-10","T-SHIRT","Adidas","WHITE","9.00","pc","200.00","190.00","150.00","150.00","","","","","0.00","0.00","0.00","0.00","","images/products/10_tshirt-png-no-background-2.png","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("11","TSB001231","T Shirt with Buttons - Violet for Men","2020-07-10","T-SHIRT","MALL BRAND","VIOLET","-6.00","PC","250.00","230.00","190.00","190.00","","","","","0.00","0.00","0.00","0.00","","images/products/11_images.jpg","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("12","TSWV023432","T SHIRT VIOLET FOR WOMEN","2020-07-10","T-SHIRT","MALL BRAND","VIOLET","10.00","PC","150.00","130.00","100.00","100.00","","","","","0.00","0.00","0.00","0.00","","images/products/12_images (1).jpg","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("13","TSTS01230","T SHIRT TS012 DESIGN MEN","2020-07-10","T-SHIRT","MALL BRAND","BLACK","7.00","PC","145.00","125.00","100.00","100.00","","","","","0.00","0.00","0.00","0.00","","images/products/13_male-chaffinch-transparent-background-paul-gulliver-transparent.jpg","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");
INSERT INTO tblproduct VALUES("14","CPKP12312","Cargo Pants Khaki Pocket - men","2020-07-10","PANTS","MALL BRAND","MILKY BROWN","4.00","PC","350.00","300.00","250.00","250.00","","","","","0.00","0.00","0.00","0.00","","images/products/14_38-386945_cargo-pants-khaki-pocket-cargo-pants-transparent-background.png","","0.00","PHP","0.00","0.00","No","","","","","","","","0","0","","0","","0","","","","","0.00","0.00","0.00","");



CREATE TABLE `tblpromopro` (
  `PROMOID` int(11) NOT NULL AUTO_INCREMENT,
  `PROID` int(11) NOT NULL,
  `PRODISCOUNT` double NOT NULL,
  `PRODISPRICE` double NOT NULL,
  `PROBANNER` tinyint(4) NOT NULL,
  `PRONEW` tinyint(4) NOT NULL,
  PRIMARY KEY (`PROMOID`),
  UNIQUE KEY `PROID` (`PROID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `tblpurchasedetl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `RRID` int(11) DEFAULT 0,
  `POID` int(11) DEFAULT 0,
  `POPID` int(11) DEFAULT 0,
  `rrno` varchar(20) DEFAULT NULL,
  `pono` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(255) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `QTY` double(9,2) DEFAULT 0.00,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `QTYRET` double(9,2) DEFAULT 0.00,
  `UNIT` varchar(20) DEFAULT NULL,
  `SUPPITEM` varchar(100) DEFAULT NULL,
  `QTYPERBOX` int(7) DEFAULT 0,
  `FORPURPRICE` double(12,2) DEFAULT 0.00,
  `FORAMOUNT` double(12,2) DEFAULT 0.00,
  `FLOORRATE` double(6,2) DEFAULT 0.00,
  `FLOORPRICE` double(12,2) DEFAULT 0.00,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO tblpurchasedetl VALUES("3","3","0","0","RR-200718ESJ","","4","product 1","cd","100.00","10.00","0.00","0.00","1000.00","0.00","pc","","0","0.00","0.00","0.00","0.00");
INSERT INTO tblpurchasedetl VALUES("4","4","0","0","RR-2007967J7","","10","T Shirt - Adidas White - Men","TSA032342","150.00","12.00","0.00","0.00","1800.00","0.00","pc","","0","0.00","0.00","0.00","0.00");
INSERT INTO tblpurchasedetl VALUES("5","5","0","0","RR-2007AI2EG","","13","T SHIRT TS012 DESIGN MEN","TSTS01230","100.00","12.00","0.00","0.00","1200.00","0.00","PC","","0","0.00","0.00","0.00","0.00");
INSERT INTO tblpurchasedetl VALUES("6","5","0","0","RR-2007AI2EG","","8","T Shirt - dye - for men","tsd0012","70.00","14.00","0.00","0.00","980.00","0.00","pc","","0","0.00","0.00","0.00","0.00");
INSERT INTO tblpurchasedetl VALUES("7","5","0","0","RR-2007AI2EG","","12","T SHIRT VIOLET FOR WOMEN","TSWV023432","100.00","15.00","0.00","0.00","1500.00","0.00","PC","","0","0.00","0.00","0.00","0.00");



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
  `PAIDAMT` double(12,2) DEFAULT 0.00,
  `USERID` int(11) DEFAULT NULL,
  `U_NAME` varchar(122) DEFAULT NULL,
  `DEBIT` double(12,2) DEFAULT 0.00,
  `CREDIT` double(12,2) DEFAULT 0.00,
  `FOREX` char(5) DEFAULT 'PHP',
  `FOREXRATE` double(7,2) DEFAULT 0.00,
  `FORTOTAL` double(12,2) DEFAULT 0.00,
  `IMPORTCOST` double(12,2) DEFAULT 0.00,
  `OTHERCHARGES` double(12,2) DEFAULT 0.00,
  PRIMARY KEY (`RRID`),
  KEY `rrno` (`rrno`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO tblpurchasehead VALUES("3","RR-200718ESJ","","2020-07-14","SUPPLIER 1","SUP001","1","1000.00","0.00","0.00","1000.00","","0","2020-07-14","0.00","128","JSS Business Solution","0.00","0.00","PHP","1.00","0.00","0.00","0.00");
INSERT INTO tblpurchasehead VALUES("4","RR-2007967J7","","2020-07-15","SUPPLIER 1","SUP001","1","1800.00","0.00","0.00","1800.00","","0","2020-07-15","0.00","163","admin","0.00","0.00","PHP","1.00","0.00","0.00","0.00");
INSERT INTO tblpurchasehead VALUES("5","RR-2007AI2EG","","2020-07-15","SUPPLIER 1","SUP001","1","3680.00","0.00","0.00","3680.00","","0","2020-07-15","0.00","163","admin","0.00","0.00","PHP","1.00","0.00","0.00","0.00");



CREATE TABLE `tblpureturndetl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `PRID` int(11) DEFAULT 0,
  `prno` varchar(20) DEFAULT NULL,
  `POPID` int(11) DEFAULT 0,
  `RRPID` int(11) DEFAULT 0,
  `rrno` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(255) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `QTY` double(9,2) DEFAULT 0.00,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `RETTYPE` char(20) DEFAULT 'Others',
  `UNIT` varchar(20) DEFAULT NULL,
  `QTYPERBOX` double(9,2) DEFAULT 0.00,
  `FLOORPRICE` double(12,2) DEFAULT 0.00,
  `FLOORRATE` double(12,2) DEFAULT 0.00,
  `FORPURPRICE` double(12,2) DEFAULT 0.00,
  `FORAMOUNT` double(12,2) DEFAULT 0.00,
  `SUPPITEM` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
  `FORTOTAL` double(12,2) DEFAULT 0.00,
  PRIMARY KEY (`PRID`),
  KEY `rrno` (`prno`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblreportfld` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fldName` varchar(50) DEFAULT NULL,
  `fldTitle` varchar(255) DEFAULT NULL,
  `fldSize` char(10) DEFAULT NULL,
  `reportcode` varchar(255) DEFAULT NULL,
  `indx` int(5) DEFAULT 0,
  `ftype` char(3) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

INSERT INTO tblreportfld VALUES("1","PROID","Product ID","7%","","0","i");
INSERT INTO tblreportfld VALUES("2","PRONAME","Product Name","350px","1000, 1001, 1002, 1003","1","c");
INSERT INTO tblreportfld VALUES("3","PROCODE","Code","91px","1000, 1001, 1002, 1003","2","c");
INSERT INTO tblreportfld VALUES("4","PROQTY","Qty","80px","1000, 1001, 1003","6","n");
INSERT INTO tblreportfld VALUES("5","PROMODEL","Brand/Model","250px","1000, 1001, 1002, 1003","4","c");
INSERT INTO tblreportfld VALUES("6","CATEGORIES","Category","150px","1000, 1001, 1002, 1003","5","c");
INSERT INTO tblreportfld VALUES("7","PROPRICE","Sell Price","100px","1000, 1001, 1003","7","n");
INSERT INTO tblreportfld VALUES("8","PURPRICE","Unit Cost","100px","1000, 1001, 1003","8","n");
INSERT INTO tblreportfld VALUES("9","entdate","Date","90px","1000, 1001, 1003","3","d");
INSERT INTO tblreportfld VALUES("10","IMAGES","Picture","250px","1002","0","p");
INSERT INTO tblreportfld VALUES("11","REORDER","Re-Order","10%","","10","n");
INSERT INTO tblreportfld VALUES("12","TOTAL","Total","10%","","11","n");
INSERT INTO tblreportfld VALUES("13","CUSTOMERID","Customer ID","","","0","c");
INSERT INTO tblreportfld VALUES("14","custname","Customer Name","300px","2100, 2101","1","c");
INSERT INTO tblreportfld VALUES("15","custcode","Code","90px","2100, 2101","2","c");
INSERT INTO tblreportfld VALUES("16","address","Address","300px","2100, 2101","3","c");
INSERT INTO tblreportfld VALUES("17","area","Area","150px","2100, 2101","4","c");
INSERT INTO tblreportfld VALUES("18","PHONE","Tel. No.","120px","2100, 2101","5","c");
INSERT INTO tblreportfld VALUES("19","EMAILADD","E-mail","150px","2100, 2101","6","c");
INSERT INTO tblreportfld VALUES("20","TERMS","Terms","70px","","7","c");
INSERT INTO tblreportfld VALUES("21","note","Note","300px","2100, 2101","8","c");
INSERT INTO tblreportfld VALUES("22","creditlimit","Credit Limit","100px","","9","n");
INSERT INTO tblreportfld VALUES("23","Balance","AR Balance","100px","","10","n");



CREATE TABLE `tblreports` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `REPORTNAME` varchar(255) DEFAULT NULL,
  `LINK` varchar(255) DEFAULT NULL,
  `ICON` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
  `RANK` varchar(50) DEFAULT NULL,
  `RATE` double(6,2) DEFAULT 0.00,
  PRIMARY KEY (`SALESMANID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `tblsetting` (
  `SETTINGID` int(11) NOT NULL AUTO_INCREMENT,
  `PLACE` text NOT NULL,
  `BRGY` varchar(90) NOT NULL,
  `DELPRICE` double NOT NULL,
  PRIMARY KEY (`SETTINGID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `tblslsdetl` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SLSID` int(11) DEFAULT 0,
  `INVOICENO` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(255) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PROPRICE` double(12,2) DEFAULT 0.00,
  `QTY` int(6) DEFAULT 0,
  `SRQTY` double(12,2) DEFAULT 0.00,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `DRNO` varchar(20) DEFAULT NULL,
  `UNIT` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

INSERT INTO tblslsdetl VALUES("1","1","","11","T Shirt with Buttons - Violet for Men","TSB001231","250.00","1","0.00","0.00","0.00","250.00","","PC");
INSERT INTO tblslsdetl VALUES("2","2","","12","T SHIRT VIOLET FOR WOMEN","TSWV023432","150.00","1","0.00","0.00","0.00","150.00","","PC");
INSERT INTO tblslsdetl VALUES("3","2","","9","T Shirt Navy Blue with Design for Men","tsn00012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("4","2","","6","product 3","esfasdfasdfasd","10000.00","1","0.00","0.00","0.00","10000.00","","pc");
INSERT INTO tblslsdetl VALUES("5","2","","13","T SHIRT TS012 DESIGN MEN","TSTS01230","145.00","1","0.00","0.00","0.00","145.00","","PC");
INSERT INTO tblslsdetl VALUES("6","3","","6","product 3","esfasdfasdfasd","10000.00","1","0.00","0.00","0.00","10000.00","","pc");
INSERT INTO tblslsdetl VALUES("7","3","","2","T-SHIRT - ROUND NECK - SPANDEX - SMALL","TSRS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("8","3","","5","product 2","dafdsfa","1231.00","2","0.00","0.00","0.00","2462.00","","pc");
INSERT INTO tblslsdetl VALUES("9","3","","9","T Shirt Navy Blue with Design for Men","tsn00012","100.00","2","0.00","0.00","0.00","200.00","","pc");
INSERT INTO tblslsdetl VALUES("10","3","","13","T SHIRT TS012 DESIGN MEN","TSTS01230","145.00","2","0.00","0.00","0.00","290.00","","PC");
INSERT INTO tblslsdetl VALUES("11","3","","4","product 1","cd","190.00","1","0.00","0.00","0.00","190.00","","pc");
INSERT INTO tblslsdetl VALUES("12","3","","3","T-SHIRT V NECK - SPANDEX - SMALL","TSVS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("13","3","","14","Cargo Pants Khaki Pocket - men","CPKP12312","350.00","1","0.00","0.00","0.00","350.00","","PC");
INSERT INTO tblslsdetl VALUES("14","3","","7","T Shirt - White - Men","ts09123","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("15","3","","8","T Shirt - dye - for men","tsd0012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("16","3","","12","T SHIRT VIOLET FOR WOMEN","TSWV023432","150.00","1","0.00","0.00","0.00","150.00","","PC");
INSERT INTO tblslsdetl VALUES("17","3","","11","T Shirt with Buttons - Violet for Men","TSB001231","250.00","1","0.00","0.00","0.00","250.00","","PC");
INSERT INTO tblslsdetl VALUES("18","4","","5","product 2","dafdsfa","1231.00","1","0.00","0.00","0.00","1231.00","","pc");
INSERT INTO tblslsdetl VALUES("19","4","","8","T Shirt - dye - for men","tsd0012","100.00","2","0.00","0.00","0.00","200.00","","pc");
INSERT INTO tblslsdetl VALUES("20","4","","3","T-SHIRT V NECK - SPANDEX - SMALL","TSVS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("21","4","","2","T-SHIRT - ROUND NECK - SPANDEX - SMALL","TSRS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("22","4","","4","product 1","cd","190.00","1","0.00","0.00","0.00","190.00","","pc");
INSERT INTO tblslsdetl VALUES("23","4","","14","Cargo Pants Khaki Pocket - men","CPKP12312","350.00","1","0.00","0.00","0.00","350.00","","PC");
INSERT INTO tblslsdetl VALUES("24","4","","6","product 3","esfasdfasdfasd","10000.00","1","0.00","0.00","0.00","10000.00","","pc");
INSERT INTO tblslsdetl VALUES("25","4","","10","T Shirt - Adidas White - Men","TSA032342","200.00","1","0.00","0.00","0.00","200.00","","pc");
INSERT INTO tblslsdetl VALUES("26","4","","9","T Shirt Navy Blue with Design for Men","tsn00012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("27","4","","11","T Shirt with Buttons - Violet for Men","TSB001231","250.00","1","0.00","0.00","0.00","250.00","","PC");
INSERT INTO tblslsdetl VALUES("28","4","","12","T SHIRT VIOLET FOR WOMEN","TSWV023432","150.00","1","0.00","0.00","0.00","150.00","","PC");
INSERT INTO tblslsdetl VALUES("29","5","","14","Cargo Pants Khaki Pocket - men","CPKP12312","350.00","2","0.00","0.00","0.00","700.00","","PC");
INSERT INTO tblslsdetl VALUES("30","5","","8","T Shirt - dye - for men","tsd0012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("31","5","","13","T SHIRT TS012 DESIGN MEN","TSTS01230","145.00","1","0.00","0.00","0.00","145.00","","PC");
INSERT INTO tblslsdetl VALUES("32","5","","9","T Shirt Navy Blue with Design for Men","tsn00012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("33","5","","4","product 1","cd","190.00","1","0.00","0.00","0.00","190.00","","pc");
INSERT INTO tblslsdetl VALUES("34","5","","2","T-SHIRT - ROUND NECK - SPANDEX - SMALL","TSRS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("35","5","","6","product 3","esfasdfasdfasd","10000.00","1","0.00","0.00","0.00","10000.00","","pc");
INSERT INTO tblslsdetl VALUES("36","5","","3","T-SHIRT V NECK - SPANDEX - SMALL","TSVS001","100.00","2","0.00","0.00","0.00","200.00","","PC");
INSERT INTO tblslsdetl VALUES("37","5","","5","product 2","dafdsfa","1231.00","1","0.00","0.00","0.00","1231.00","","pc");
INSERT INTO tblslsdetl VALUES("38","5","","7","T Shirt - White - Men","ts09123","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("39","5","","10","T Shirt - Adidas White - Men","TSA032342","200.00","1","0.00","0.00","0.00","200.00","","pc");
INSERT INTO tblslsdetl VALUES("40","6","","9","T Shirt Navy Blue with Design for Men","tsn00012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("41","7","","7","T Shirt - White - Men","ts09123","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("42","7","","3","T-SHIRT V NECK - SPANDEX - SMALL","TSVS001","100.00","2","0.00","0.00","0.00","200.00","","PC");
INSERT INTO tblslsdetl VALUES("43","7","","2","T-SHIRT - ROUND NECK - SPANDEX - SMALL","TSRS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("44","7","","12","T SHIRT VIOLET FOR WOMEN","TSWV023432","150.00","1","0.00","0.00","0.00","150.00","","PC");
INSERT INTO tblslsdetl VALUES("45","8","","3","T-SHIRT V NECK - SPANDEX - SMALL","TSVS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("46","8","","8","T Shirt - dye - for men","tsd0012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("47","8","","9","T Shirt Navy Blue with Design for Men","tsn00012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("48","9","","3","T-SHIRT V NECK - SPANDEX - SMALL","TSVS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("49","9","","13","T SHIRT TS012 DESIGN MEN","TSTS01230","145.00","1","0.00","0.00","0.00","145.00","","PC");
INSERT INTO tblslsdetl VALUES("50","10","","11","T Shirt with Buttons - Violet for Men","TSB001231","250.00","1","0.00","0.00","0.00","250.00","","PC");
INSERT INTO tblslsdetl VALUES("51","10","","12","T SHIRT VIOLET FOR WOMEN","TSWV023432","150.00","1","0.00","0.00","0.00","150.00","","PC");
INSERT INTO tblslsdetl VALUES("52","10","","4","product 1","cd","190.00","1","0.00","0.00","0.00","190.00","","pc");
INSERT INTO tblslsdetl VALUES("53","11","","7","T Shirt - White - Men","ts09123","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("54","11","","14","Cargo Pants Khaki Pocket - men","CPKP12312","350.00","1","0.00","0.00","0.00","350.00","","PC");
INSERT INTO tblslsdetl VALUES("55","12","","8","T Shirt - dye - for men","tsd0012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("56","12","","11","T Shirt with Buttons - Violet for Men","TSB001231","250.00","1","0.00","0.00","0.00","250.00","","PC");
INSERT INTO tblslsdetl VALUES("57","13","","9","T Shirt Navy Blue with Design for Men","tsn00012","100.00","1","0.00","0.00","0.00","100.00","","pc");
INSERT INTO tblslsdetl VALUES("58","13","","2","T-SHIRT - ROUND NECK - SPANDEX - SMALL","TSRS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("59","13","","11","T Shirt with Buttons - Violet for Men","TSB001231","250.00","1","0.00","0.00","0.00","250.00","","PC");
INSERT INTO tblslsdetl VALUES("60","14","","2","T-SHIRT - ROUND NECK - SPANDEX - SMALL","TSRS001","100.00","1","0.00","0.00","0.00","100.00","","PC");
INSERT INTO tblslsdetl VALUES("61","15","","10","T Shirt - Adidas White - Men","TSA032342","200.00","1","0.00","0.00","0.00","200.00","","pc");
INSERT INTO tblslsdetl VALUES("62","16","","5","product 2","dafdsfa","1231.00","1","0.00","0.00","0.00","1231.00","","pc");
INSERT INTO tblslsdetl VALUES("63","16","","14","Cargo Pants Khaki Pocket - men","CPKP12312","350.00","1","0.00","0.00","0.00","350.00","","PC");
INSERT INTO tblslsdetl VALUES("64","16","","8","T Shirt - dye - for men","tsd0012","100.00","1","0.00","0.00","0.00","100.00","","pc");



CREATE TABLE `tblslshead` (
  `SLSID` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `INVOICENO` varchar(20) DEFAULT NULL,
  `DRNO` varchar(20) DEFAULT NULL,
  `REFNO` varchar(20) DEFAULT NULL,
  `ENTDATE` date DEFAULT NULL,
  `CUSTNAME` varchar(255) DEFAULT NULL,
  `CUSTCODE` varchar(20) DEFAULT NULL,
  `CUSTOMERID` int(11) DEFAULT NULL,
  `TOTAL` double(12,2) DEFAULT 0.00,
  `DISCOUNTAMT` double(12,2) DEFAULT 0.00,
  `DISCOUNTPER` double(6,2) DEFAULT 0.00,
  `NET` double(12,2) DEFAULT 0.00,
  `NOTE` varchar(500) DEFAULT NULL,
  `TERMS` int(5) DEFAULT 0,
  `DUEDATE` date DEFAULT NULL,
  `PAIDAMT` double(12,2) DEFAULT 0.00,
  `DEBITAMT` double(12,2) DEFAULT 0.00,
  `CREDITAMT` double(12,2) DEFAULT 0.00,
  `USERID` int(11) DEFAULT NULL,
  `U_NAME` varchar(122) DEFAULT NULL,
  `INVDATE` char(10) DEFAULT NULL,
  `DRDATE` char(10) DEFAULT NULL,
  `SLSTYPE` int(1) DEFAULT 1,
  `DELIVEREDBY` varchar(100) DEFAULT NULL,
  `SMANNAME` varchar(100) DEFAULT NULL,
  `SALESMANID` int(11) DEFAULT 0,
  `PRINTED` char(3) DEFAULT 'no',
  `SRAMT` double(12,2) DEFAULT 0.00,
  `CANCELLED` char(1) DEFAULT 'F',
  PRIMARY KEY (`SLSID`),
  KEY `invoiceno` (`INVOICENO`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO tblslshead VALUES("00000000001","1","","16","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","tesfsafasdfas","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000002","2","","15","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","test","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000003","3","","14","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000004","4","","13","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000005","5","","12","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000006","6","","11","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000007","7","","10","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000008","8","","9","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000009","9","","8","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000010","10","","7","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000011","11","","6","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000012","12","","5","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000013","13","","4","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000014","14","","3","2020-07-16","Jimmy","OC0000001","1","0.00","0.00","0.00","0.00","","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000015","15","","2","2020-07-16","Jimmy","OC0000001","1","200.00","0.00","0.00","200.00","test","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");
INSERT INTO tblslshead VALUES("00000000016","16","","1","2020-07-16","Jimmy","OC0000001","1","1681.00","0.00","0.00","1681.00","test","0","","0.00","0.00","0.00","163","admin","2020-07-16","","1","","","0","no","0.00","F");



CREATE TABLE `tblsrdetl` (
  `SRPID` int(11) NOT NULL AUTO_INCREMENT,
  `SRID` int(11) DEFAULT 0,
  `SLSPID` int(11) DEFAULT NULL,
  `INVOICENO` varchar(20) DEFAULT NULL,
  `DRNO` varchar(20) DEFAULT NULL,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(255) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PROPRICE` double(12,2) DEFAULT 0.00,
  `QTY` double(9,2) DEFAULT 0.00,
  `DISCPER` double(6,2) DEFAULT 0.00,
  `DISCAMT` double(12,2) DEFAULT 0.00,
  `AMOUNT` double(12,2) DEFAULT 0.00,
  `UNIT` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`SRPID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblsrhead` (
  `SRID` int(11) NOT NULL AUTO_INCREMENT,
  `SRNO` varchar(20) DEFAULT NULL,
  `REFNO` varchar(20) DEFAULT NULL,
  `ENTDATE` date DEFAULT NULL,
  `CUSTNAME` varchar(255) DEFAULT NULL,
  `CUSTCODE` varchar(20) DEFAULT NULL,
  `CUSTOMERID` int(11) DEFAULT NULL,
  `TOTAL` double(12,2) DEFAULT 0.00,
  `DISCOUNTAMT` double(12,2) DEFAULT 0.00,
  `DISCOUNTPER` double(6,2) DEFAULT 0.00,
  `NET` double(12,2) DEFAULT 0.00,
  `NOTE` varchar(500) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `U_NAME` varchar(122) DEFAULT NULL,
  `DEDUCTDATE` char(10) DEFAULT NULL,
  `DRDATE` char(10) DEFAULT NULL,
  `LESSTOACCOUNT` int(1) DEFAULT 1,
  `CHECKEDBY` varchar(100) DEFAULT NULL,
  `PRINTED` char(3) DEFAULT 'no',
  PRIMARY KEY (`SRID`),
  KEY `invoiceno` (`SRNO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblstockadjustdetl` (
  `ADJPID` int(11) NOT NULL AUTO_INCREMENT,
  `ADJID` int(11) DEFAULT 0,
  `PROID` int(11) DEFAULT 0,
  `PRONAME` varchar(255) DEFAULT NULL,
  `PROCODE` varchar(20) DEFAULT NULL,
  `QTY` double(9,2) DEFAULT 0.00,
  `UNIT` varchar(20) DEFAULT NULL,
  `QTYRESET` double(9,2) DEFAULT NULL,
  PRIMARY KEY (`ADJPID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO tblstockadjustdetl VALUES("1","1","14","Cargo Pants Khaki Pocket - men","CPKP12312","10.00","PC","0.00");



CREATE TABLE `tblstockadjusthead` (
  `ADJID` int(11) NOT NULL AUTO_INCREMENT,
  `ADJNO` varchar(20) DEFAULT NULL,
  `ADJTYPE` varchar(20) DEFAULT NULL,
  `REFNO` varchar(20) DEFAULT NULL,
  `ENTDATE` date DEFAULT NULL,
  `CUSTNAME` varchar(255) DEFAULT NULL,
  `CUSTCODE` varchar(20) DEFAULT NULL,
  `CUSTOMERID` int(11) DEFAULT NULL,
  `NOTE` varchar(500) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `U_NAME` varchar(122) DEFAULT NULL,
  `APPROVEDBY` varchar(100) DEFAULT NULL,
  `PRINTED` char(3) DEFAULT 'no',
  PRIMARY KEY (`ADJID`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO tblstockadjusthead VALUES("1","AD200770450","Beginning","","2020-07-14","","","0","test","128","JSS Business Solution","james","no");



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
  PRIMARY KEY (`STOCKINID`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

INSERT INTO tblstockin VALUES("3","2020-07-14 00:00:00","1","1","AD","AD200770450","14","10.00","0.00","250.00","128");
INSERT INTO tblstockin VALUES("4","2020-07-14 00:00:00","3","3","RR","RR-200718ESJ","4","10.00","0.00","100.00","128");
INSERT INTO tblstockin VALUES("5","2020-07-15 00:00:00","4","4","RR","RR-2007967J7","10","12.00","0.00","150.00","163");
INSERT INTO tblstockin VALUES("6","2020-07-15 00:00:00","5","5","RR","RR-2007AI2EG","13","12.00","0.00","100.00","163");
INSERT INTO tblstockin VALUES("7","2020-07-15 00:00:00","5","6","RR","RR-2007AI2EG","8","14.00","0.00","70.00","163");
INSERT INTO tblstockin VALUES("8","2020-07-15 00:00:00","5","7","RR","RR-2007AI2EG","12","15.00","0.00","100.00","163");
INSERT INTO tblstockin VALUES("9","2020-07-16 00:00:00","1","1","SA","1","11","0.00","1.00","250.00","163");
INSERT INTO tblstockin VALUES("10","2020-07-16 00:00:00","2","2","SA","2","12","0.00","1.00","150.00","163");
INSERT INTO tblstockin VALUES("11","2020-07-16 00:00:00","2","3","SA","2","9","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("12","2020-07-16 00:00:00","2","4","SA","2","6","0.00","1.00","10000.00","163");
INSERT INTO tblstockin VALUES("13","2020-07-16 00:00:00","2","5","SA","2","13","0.00","1.00","145.00","163");
INSERT INTO tblstockin VALUES("14","2020-07-16 00:00:00","3","6","SA","3","6","0.00","1.00","10000.00","163");
INSERT INTO tblstockin VALUES("15","2020-07-16 00:00:00","3","7","SA","3","2","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("16","2020-07-16 00:00:00","3","8","SA","3","5","0.00","2.00","1231.00","163");
INSERT INTO tblstockin VALUES("17","2020-07-16 00:00:00","3","9","SA","3","9","0.00","2.00","100.00","163");
INSERT INTO tblstockin VALUES("18","2020-07-16 00:00:00","3","10","SA","3","13","0.00","2.00","145.00","163");
INSERT INTO tblstockin VALUES("19","2020-07-16 00:00:00","3","11","SA","3","4","0.00","1.00","190.00","163");
INSERT INTO tblstockin VALUES("20","2020-07-16 00:00:00","3","12","SA","3","3","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("21","2020-07-16 00:00:00","3","13","SA","3","14","0.00","1.00","350.00","163");
INSERT INTO tblstockin VALUES("22","2020-07-16 00:00:00","3","14","SA","3","7","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("23","2020-07-16 00:00:00","3","15","SA","3","8","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("24","2020-07-16 00:00:00","3","16","SA","3","12","0.00","1.00","150.00","163");
INSERT INTO tblstockin VALUES("25","2020-07-16 00:00:00","3","17","SA","3","11","0.00","1.00","250.00","163");
INSERT INTO tblstockin VALUES("26","2020-07-16 00:00:00","4","18","SA","4","5","0.00","1.00","1231.00","163");
INSERT INTO tblstockin VALUES("27","2020-07-16 00:00:00","4","19","SA","4","8","0.00","2.00","100.00","163");
INSERT INTO tblstockin VALUES("28","2020-07-16 00:00:00","4","20","SA","4","3","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("29","2020-07-16 00:00:00","4","21","SA","4","2","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("30","2020-07-16 00:00:00","4","22","SA","4","4","0.00","1.00","190.00","163");
INSERT INTO tblstockin VALUES("31","2020-07-16 00:00:00","4","23","SA","4","14","0.00","1.00","350.00","163");
INSERT INTO tblstockin VALUES("32","2020-07-16 00:00:00","4","24","SA","4","6","0.00","1.00","10000.00","163");
INSERT INTO tblstockin VALUES("33","2020-07-16 00:00:00","4","25","SA","4","10","0.00","1.00","200.00","163");
INSERT INTO tblstockin VALUES("34","2020-07-16 00:00:00","4","26","SA","4","9","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("35","2020-07-16 00:00:00","4","27","SA","4","11","0.00","1.00","250.00","163");
INSERT INTO tblstockin VALUES("36","2020-07-16 00:00:00","4","28","SA","4","12","0.00","1.00","150.00","163");
INSERT INTO tblstockin VALUES("37","2020-07-16 00:00:00","5","29","SA","5","14","0.00","2.00","350.00","163");
INSERT INTO tblstockin VALUES("38","2020-07-16 00:00:00","5","30","SA","5","8","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("39","2020-07-16 00:00:00","5","31","SA","5","13","0.00","1.00","145.00","163");
INSERT INTO tblstockin VALUES("40","2020-07-16 00:00:00","5","32","SA","5","9","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("41","2020-07-16 00:00:00","5","33","SA","5","4","0.00","1.00","190.00","163");
INSERT INTO tblstockin VALUES("42","2020-07-16 00:00:00","5","34","SA","5","2","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("43","2020-07-16 00:00:00","5","35","SA","5","6","0.00","1.00","10000.00","163");
INSERT INTO tblstockin VALUES("44","2020-07-16 00:00:00","5","36","SA","5","3","0.00","2.00","100.00","163");
INSERT INTO tblstockin VALUES("45","2020-07-16 00:00:00","5","37","SA","5","5","0.00","1.00","1231.00","163");
INSERT INTO tblstockin VALUES("46","2020-07-16 00:00:00","5","38","SA","5","7","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("47","2020-07-16 00:00:00","5","39","SA","5","10","0.00","1.00","200.00","163");
INSERT INTO tblstockin VALUES("48","2020-07-16 00:00:00","6","40","SA","6","9","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("49","2020-07-16 00:00:00","7","41","SA","7","7","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("50","2020-07-16 00:00:00","7","42","SA","7","3","0.00","2.00","100.00","163");
INSERT INTO tblstockin VALUES("51","2020-07-16 00:00:00","7","43","SA","7","2","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("52","2020-07-16 00:00:00","7","44","SA","7","12","0.00","1.00","150.00","163");
INSERT INTO tblstockin VALUES("53","2020-07-16 00:00:00","8","45","SA","8","3","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("54","2020-07-16 00:00:00","8","46","SA","8","8","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("55","2020-07-16 00:00:00","8","47","SA","8","9","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("56","2020-07-16 00:00:00","9","48","SA","9","3","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("57","2020-07-16 00:00:00","9","49","SA","9","13","0.00","1.00","145.00","163");
INSERT INTO tblstockin VALUES("58","2020-07-16 00:00:00","10","50","SA","10","11","0.00","1.00","250.00","163");
INSERT INTO tblstockin VALUES("59","2020-07-16 00:00:00","10","51","SA","10","12","0.00","1.00","150.00","163");
INSERT INTO tblstockin VALUES("60","2020-07-16 00:00:00","10","52","SA","10","4","0.00","1.00","190.00","163");
INSERT INTO tblstockin VALUES("61","2020-07-16 00:00:00","11","53","SA","11","7","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("62","2020-07-16 00:00:00","11","54","SA","11","14","0.00","1.00","350.00","163");
INSERT INTO tblstockin VALUES("63","2020-07-16 00:00:00","12","55","SA","12","8","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("64","2020-07-16 00:00:00","12","56","SA","12","11","0.00","1.00","250.00","163");
INSERT INTO tblstockin VALUES("65","2020-07-16 00:00:00","13","57","SA","13","9","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("66","2020-07-16 00:00:00","13","58","SA","13","2","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("67","2020-07-16 00:00:00","13","59","SA","13","11","0.00","1.00","250.00","163");
INSERT INTO tblstockin VALUES("68","2020-07-16 00:00:00","14","60","SA","14","2","0.00","1.00","100.00","163");
INSERT INTO tblstockin VALUES("69","2020-07-16 00:00:00","15","61","SA","15","10","0.00","1.00","200.00","163");
INSERT INTO tblstockin VALUES("70","2020-07-16 00:00:00","16","62","SA","16","5","0.00","1.00","1231.00","163");
INSERT INTO tblstockin VALUES("71","2020-07-16 00:00:00","16","63","SA","16","14","0.00","1.00","350.00","163");
INSERT INTO tblstockin VALUES("72","2020-07-16 00:00:00","16","64","SA","16","8","0.00","1.00","100.00","163");



CREATE TABLE `tblstocktype` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `STOCKTYPE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `STOCKTYPE` (`STOCKTYPE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `tblsupplier` (
  `SUPPLIERID` int(11) NOT NULL AUTO_INCREMENT,
  `suppname` varchar(100) DEFAULT NULL,
  `suppcode` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `PHONE` varchar(100) DEFAULT NULL,
  `EMAILADD` varchar(100) DEFAULT NULL,
  `TERMS` int(5) NOT NULL DEFAULT 0,
  `DATEJOIN` date DEFAULT NULL,
  `note` varchar(500) DEFAULT NULL,
  `creditlimit` double(12,2) DEFAULT 99999999.99,
  `balance` double(12,2) DEFAULT 0.00,
  `pdc_note` double(12,2) DEFAULT 0.00,
  `blacklisted` char(3) DEFAULT 'No',
  `CONTACT` varchar(100) DEFAULT NULL,
  `POSITION` varchar(255) DEFAULT NULL,
  `FAXNO` varchar(255) DEFAULT NULL,
  `FOREX` varchar(255) DEFAULT NULL,
  `MOBILENO` varchar(50) DEFAULT NULL,
  `ISHIDDEN` varchar(255) DEFAULT NULL,
  `STATNAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`SUPPLIERID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tblsupplier VALUES("1","SUPPLIER 1","SUP001","NONE","","","","0","2020-07-01","","99999999.00","6480.00","0.00","No","JAN","","","","","","");



CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT,
  `U_NAME` varchar(122) DEFAULT NULL,
  `U_USERNAME` varchar(122) DEFAULT NULL,
  `U_PASS` varchar(122) DEFAULT NULL,
  `U_ROLE` varchar(30) DEFAULT NULL,
  `USERIMAGE` varchar(255) DEFAULT NULL,
  `OVERWRITE` int(1) DEFAULT 0,
  `SUPER` char(1) DEFAULT 'F',
  `U_STATUS` char(10) DEFAULT 'Active',
  `U_DATE` char(10) DEFAULT NULL,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB AUTO_INCREMENT=165 DEFAULT CHARSET=latin1;

INSERT INTO tbluseraccount VALUES("128","JSS Business Solution","Maverick","234c2a83c30184c6414b5f3d9c93109cc156d299","Administrator","","0","T","Active","2020-01-02");
INSERT INTO tbluseraccount VALUES("163","admin","admin","d033e22ae348aeb5660fc2140aec35850c4da997","Administrator","","0","F","Active","2020-07-01");
INSERT INTO tbluseraccount VALUES("164","encoder 1","encoder1","0008afee20882a66cfed11d6ede6d5c35ffbb4c8","Encoder","","0","F","Active","2020-07-15");

