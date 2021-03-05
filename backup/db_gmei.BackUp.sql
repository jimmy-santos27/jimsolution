

CREATE TABLE `tblaccountstatus` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `STATNAME` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

INSERT INTO tblaccountstatus VALUES("1","GOOD ACCT");
INSERT INTO tblaccountstatus VALUES("7","DELAYED PAYMENT");
INSERT INTO tblaccountstatus VALUES("6","RUDE CUSTOMER");
INSERT INTO tblaccountstatus VALUES("5","BAD ACCOUNT");
INSERT INTO tblaccountstatus VALUES("8","Very Good Acct.");



CREATE TABLE `tblarea` (
  `AREAID` int(11) NOT NULL AUTO_INCREMENT,
  `AREA` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`AREAID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

INSERT INTO tblarea VALUES("2","2-COD");
INSERT INTO tblarea VALUES("28","aaaa");
INSERT INTO tblarea VALUES("27","test");
INSERT INTO tblarea VALUES("7","WEEKDAY-FRI");
INSERT INTO tblarea VALUES("8","WEEKDAYS");
INSERT INTO tblarea VALUES("9","PM-COD");
INSERT INTO tblarea VALUES("10","WEEKDAY-THURS");
INSERT INTO tblarea VALUES("11","WEEKDAY");
INSERT INTO tblarea VALUES("12","AM-WEEKLY");
INSERT INTO tblarea VALUES("13","WEEKDAY-WED");
INSERT INTO tblarea VALUES("14","WEEKDAY-MON");
INSERT INTO tblarea VALUES("15","PROV");
INSERT INTO tblarea VALUES("16","4-COD");
INSERT INTO tblarea VALUES("17","3-COD");
INSERT INTO tblarea VALUES("18","AM-COD");
INSERT INTO tblarea VALUES("19","GENERATOR");
INSERT INTO tblarea VALUES("20","WEEKDAY-TUES");
INSERT INTO tblarea VALUES("21","PM-WEEKLY");
INSERT INTO tblarea VALUES("22","3-WEEKLY");
INSERT INTO tblarea VALUES("23","WEEKDAY-COD");
INSERT INTO tblarea VALUES("24","2-WEEKLY");
INSERT INTO tblarea VALUES("25","4-WEEKLY");
INSERT INTO tblarea VALUES("26","TA");



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



CREATE TABLE `tblcarbrand` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CARBRAND` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `CARBRAND` (`CARBRAND`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

INSERT INTO tblcarbrand VALUES("1","MAZDA");
INSERT INTO tblcarbrand VALUES("2","ISUZU");
INSERT INTO tblcarbrand VALUES("3","TOYOTA");
INSERT INTO tblcarbrand VALUES("4","UNIVERSAL");
INSERT INTO tblcarbrand VALUES("5","FORD");
INSERT INTO tblcarbrand VALUES("6","FUSO");
INSERT INTO tblcarbrand VALUES("7","MITSUBISHI");
INSERT INTO tblcarbrand VALUES("8","HINO");
INSERT INTO tblcarbrand VALUES("9","HONDA");
INSERT INTO tblcarbrand VALUES("10","NISSAN");
INSERT INTO tblcarbrand VALUES("20","LAMBORGHINI ( TEST )");
INSERT INTO tblcarbrand VALUES("12","KIA");
INSERT INTO tblcarbrand VALUES("13","DAIHATSU");
INSERT INTO tblcarbrand VALUES("14","NISSAN/DATS");
INSERT INTO tblcarbrand VALUES("15","HYUNDAI");
INSERT INTO tblcarbrand VALUES("16","SUZUKI");
INSERT INTO tblcarbrand VALUES("17","OTHER");
INSERT INTO tblcarbrand VALUES("18","CHEVROLET");



CREATE TABLE `tblcarmake` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CARMAKE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `CARMAKE` (`CARMAKE`)
) ENGINE=MyISAM AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;

INSERT INTO tblcarmake VALUES("1","HIACE");
INSERT INTO tblcarmake VALUES("2","ELF");
INSERT INTO tblcarmake VALUES("3","NPR");
INSERT INTO tblcarmake VALUES("4","RENEGADE");
INSERT INTO tblcarmake VALUES("5","T-3500,T-4100");
INSERT INTO tblcarmake VALUES("6","ELF,JBR");
INSERT INTO tblcarmake VALUES("7","FIERRA");
INSERT INTO tblcarmake VALUES("8","TAMARAW FX");
INSERT INTO tblcarmake VALUES("9","FIGHTER");
INSERT INTO tblcarmake VALUES("10","KC-20");
INSERT INTO tblcarmake VALUES("11","L-300");
INSERT INTO tblcarmake VALUES("12","ELF, NHR,C150,C250");
INSERT INTO tblcarmake VALUES("13","FM, FV");
INSERT INTO tblcarmake VALUES("14","BENZ TYPE");
INSERT INTO tblcarmake VALUES("15","TRUCK");
INSERT INTO tblcarmake VALUES("16","TAMARAW OLD");
INSERT INTO tblcarmake VALUES("17","CANTER");
INSERT INTO tblcarmake VALUES("18","COROLLA");
INSERT INTO tblcarmake VALUES("19","EXR");
INSERT INTO tblcarmake VALUES("20","PAJERO");
INSERT INTO tblcarmake VALUES("21","FTR, HINO");
INSERT INTO tblcarmake VALUES("22","CIVIC");
INSERT INTO tblcarmake VALUES("23","HILUX");
INSERT INTO tblcarmake VALUES("24","CORONA");
INSERT INTO tblcarmake VALUES("25","TFR");
INSERT INTO tblcarmake VALUES("26","BIDA");
INSERT INTO tblcarmake VALUES("27","NKR");
INSERT INTO tblcarmake VALUES("28","GEMINI");
INSERT INTO tblcarmake VALUES("29","GALANT");
INSERT INTO tblcarmake VALUES("30","LITE ACE");
INSERT INTO tblcarmake VALUES("31","B-2200");
INSERT INTO tblcarmake VALUES("32","GIGA");
INSERT INTO tblcarmake VALUES("33","NHR,NPR");
INSERT INTO tblcarmake VALUES("34","VOLKSWAGEN");
INSERT INTO tblcarmake VALUES("35","PATROL");
INSERT INTO tblcarmake VALUES("36","LAND CRUISER");
INSERT INTO tblcarmake VALUES("37","TAMARAW  FX");
INSERT INTO tblcarmake VALUES("38","LASER");
INSERT INTO tblcarmake VALUES("39","REVO");
INSERT INTO tblcarmake VALUES("40","LANCER");
INSERT INTO tblcarmake VALUES("41","SENTRA");
INSERT INTO tblcarmake VALUES("42","DATSUN P-UP");
INSERT INTO tblcarmake VALUES("43","HIACE GRANDIA");
INSERT INTO tblcarmake VALUES("44","PATHFINDER");
INSERT INTO tblcarmake VALUES("45","DYNA");
INSERT INTO tblcarmake VALUES("46","KB-26");
INSERT INTO tblcarmake VALUES("47","ADVENTURE");
INSERT INTO tblcarmake VALUES("48","L-200");
INSERT INTO tblcarmake VALUES("49","BUS");
INSERT INTO tblcarmake VALUES("50","CRESSIDA");
INSERT INTO tblcarmake VALUES("51","FRONTIER");
INSERT INTO tblcarmake VALUES("52","VIOS");
INSERT INTO tblcarmake VALUES("53","HILANDER");
INSERT INTO tblcarmake VALUES("54","B-2500");
INSERT INTO tblcarmake VALUES("55","ACCORD");
INSERT INTO tblcarmake VALUES("56","CRV");
INSERT INTO tblcarmake VALUES("57","CITY");
INSERT INTO tblcarmake VALUES("58","COROLLA '95-'96 AE");
INSERT INTO tblcarmake VALUES("59","MIRAGE");
INSERT INTO tblcarmake VALUES("60","NKR NEW, NPR");
INSERT INTO tblcarmake VALUES("61","323");
INSERT INTO tblcarmake VALUES("62","ALTIS");
INSERT INTO tblcarmake VALUES("63","CXM");
INSERT INTO tblcarmake VALUES("64","AUXILLARY FAN W/O");
INSERT INTO tblcarmake VALUES("65","L-200, L-300");
INSERT INTO tblcarmake VALUES("66","TERRANO");
INSERT INTO tblcarmake VALUES("67","313  TRUCK");
INSERT INTO tblcarmake VALUES("68","TELSTAR");
INSERT INTO tblcarmake VALUES("69","TMK");
INSERT INTO tblcarmake VALUES("70","FSR, EXR");
INSERT INTO tblcarmake VALUES("71","CXM,FSR,EXR");
INSERT INTO tblcarmake VALUES("72","BENZ  TRUCK");
INSERT INTO tblcarmake VALUES("73","KB-21, KB-26, KB-4");
INSERT INTO tblcarmake VALUES("74","CROWN");
INSERT INTO tblcarmake VALUES("75","STARLET");
INSERT INTO tblcarmake VALUES("76","FUEGO");
INSERT INTO tblcarmake VALUES("77","620-720");
INSERT INTO tblcarmake VALUES("78","KB-21");
INSERT INTO tblcarmake VALUES("79","T-4100");
INSERT INTO tblcarmake VALUES("80","AUV");
INSERT INTO tblcarmake VALUES("81","VAN  TYPE");
INSERT INTO tblcarmake VALUES("82","COURIER");
INSERT INTO tblcarmake VALUES("83","TOYOTA, MITSUBISHI");
INSERT INTO tblcarmake VALUES("84","KB-20");
INSERT INTO tblcarmake VALUES("85","TMK,TD");
INSERT INTO tblcarmake VALUES("86","HATCHBACK");
INSERT INTO tblcarmake VALUES("87","TOURIST BUS");
INSERT INTO tblcarmake VALUES("88","T-2500,T-4100");
INSERT INTO tblcarmake VALUES("89","T-2500");
INSERT INTO tblcarmake VALUES("90","LANCER, COROLLA, G");
INSERT INTO tblcarmake VALUES("91","STANZA");
INSERT INTO tblcarmake VALUES("92","T-3500");
INSERT INTO tblcarmake VALUES("93","MINI BRAZILIA");
INSERT INTO tblcarmake VALUES("94","BUS  TYPE");
INSERT INTO tblcarmake VALUES("95","JBR, SBR");
INSERT INTO tblcarmake VALUES("96","HILANDER, NHR, NPR");
INSERT INTO tblcarmake VALUES("97","CPB 12, UD, TRUCK");
INSERT INTO tblcarmake VALUES("98","FM");
INSERT INTO tblcarmake VALUES("99","BENZ  TYPE");
INSERT INTO tblcarmake VALUES("100","TAXI");
INSERT INTO tblcarmake VALUES("101","SH");
INSERT INTO tblcarmake VALUES("102","KT WIDE");
INSERT INTO tblcarmake VALUES("103","E-2000  VAN");
INSERT INTO tblcarmake VALUES("104","FESTIVA");
INSERT INTO tblcarmake VALUES("105","ANFRA");
INSERT INTO tblcarmake VALUES("106","TROOPER");
INSERT INTO tblcarmake VALUES("191","GALLARDO");
INSERT INTO tblcarmake VALUES("108","DV57");
INSERT INTO tblcarmake VALUES("109","T-4100, E-3000");
INSERT INTO tblcarmake VALUES("110","CH520 TRUCK");
INSERT INTO tblcarmake VALUES("111","SUNNY  P-UP");
INSERT INTO tblcarmake VALUES("112","CROSSWIND");
INSERT INTO tblcarmake VALUES("113","KS TRUCK");
INSERT INTO tblcarmake VALUES("114","ELF,NPR");
INSERT INTO tblcarmake VALUES("115","JBR");
INSERT INTO tblcarmake VALUES("116","KB-20, KB-25");
INSERT INTO tblcarmake VALUES("117","E-3000");
INSERT INTO tblcarmake VALUES("118","CALIFORNIA");
INSERT INTO tblcarmake VALUES("119","CPB 12 UD TRUCK");
INSERT INTO tblcarmake VALUES("120","CORTINA");
INSERT INTO tblcarmake VALUES("121","NKR, NPR, NISSAN 3");
INSERT INTO tblcarmake VALUES("122","CAR");
INSERT INTO tblcarmake VALUES("123","BFM");
INSERT INTO tblcarmake VALUES("124","AUV,FIERRA 4");
INSERT INTO tblcarmake VALUES("125","VOLVO");
INSERT INTO tblcarmake VALUES("126","B-10");
INSERT INTO tblcarmake VALUES("127","BESTA");
INSERT INTO tblcarmake VALUES("128","CIMARRON");
INSERT INTO tblcarmake VALUES("129","FV-320");
INSERT INTO tblcarmake VALUES("130","SUNNY P-UP,C-20,C-");
INSERT INTO tblcarmake VALUES("131","TRACTOR");
INSERT INTO tblcarmake VALUES("132","RANGER");
INSERT INTO tblcarmake VALUES("133","BENZ");
INSERT INTO tblcarmake VALUES("134","ATOS");
INSERT INTO tblcarmake VALUES("135","FORTUNER");
INSERT INTO tblcarmake VALUES("136","GH");
INSERT INTO tblcarmake VALUES("137","INNOVA");
INSERT INTO tblcarmake VALUES("138","H-6300");
INSERT INTO tblcarmake VALUES("139","AVANZA");
INSERT INTO tblcarmake VALUES("140","BUS, JEEPNEY");
INSERT INTO tblcarmake VALUES("141","V-12");
INSERT INTO tblcarmake VALUES("142","PRIDE");
INSERT INTO tblcarmake VALUES("143","URVAN, CARAVAN");
INSERT INTO tblcarmake VALUES("144","HI ACE");
INSERT INTO tblcarmake VALUES("145","BUS, TRUCK");
INSERT INTO tblcarmake VALUES("146","D-MAX");
INSERT INTO tblcarmake VALUES("147","CHAPA TYPE");
INSERT INTO tblcarmake VALUES("148","HILUX '93-'95");
INSERT INTO tblcarmake VALUES("149","LADY");
INSERT INTO tblcarmake VALUES("150","UNIVERSE");
INSERT INTO tblcarmake VALUES("151","GRACE");
INSERT INTO tblcarmake VALUES("152","STAREX");
INSERT INTO tblcarmake VALUES("153","EAGLE");
INSERT INTO tblcarmake VALUES("154","ESCAPE");
INSERT INTO tblcarmake VALUES("155","EXALTA");
INSERT INTO tblcarmake VALUES("156","DATSUN");
INSERT INTO tblcarmake VALUES("157","OTHER");
INSERT INTO tblcarmake VALUES("158","JAZZ");
INSERT INTO tblcarmake VALUES("159","ACCENT");
INSERT INTO tblcarmake VALUES("160","KC-2700");
INSERT INTO tblcarmake VALUES("161","APV");
INSERT INTO tblcarmake VALUES("162","MAZDA 3");
INSERT INTO tblcarmake VALUES("163","X-TRAIL");
INSERT INTO tblcarmake VALUES("164","RAV-4");
INSERT INTO tblcarmake VALUES("165","RIO");
INSERT INTO tblcarmake VALUES("166","CARRY");
INSERT INTO tblcarmake VALUES("167","EVERY/SCRUM");
INSERT INTO tblcarmake VALUES("168","I-10");
INSERT INTO tblcarmake VALUES("169","VANETTE");
INSERT INTO tblcarmake VALUES("170","MONTERO");
INSERT INTO tblcarmake VALUES("171","GETZ");
INSERT INTO tblcarmake VALUES("172","CAMRY");
INSERT INTO tblcarmake VALUES("173","SWIFT");
INSERT INTO tblcarmake VALUES("174","PICANTO");
INSERT INTO tblcarmake VALUES("175","OUTLANDER");
INSERT INTO tblcarmake VALUES("176","LYNX");
INSERT INTO tblcarmake VALUES("177","YARIS");
INSERT INTO tblcarmake VALUES("178","MATRIX");
INSERT INTO tblcarmake VALUES("179","OPTRA");
INSERT INTO tblcarmake VALUES("180","ALTO");
INSERT INTO tblcarmake VALUES("181","FOCUS");
INSERT INTO tblcarmake VALUES("182","TUCSON");
INSERT INTO tblcarmake VALUES("183","GRAND VITARA");
INSERT INTO tblcarmake VALUES("184","ELANTRA");
INSERT INTO tblcarmake VALUES("185","FIESTA");
INSERT INTO tblcarmake VALUES("186","AVEO");
INSERT INTO tblcarmake VALUES("189","1113");



CREATE TABLE `tblcategory` (
  `CATEGID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEGORIES` varchar(100) DEFAULT NULL,
  `USERID` int(11) DEFAULT NULL,
  `CATCODE` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CATEGID`),
  UNIQUE KEY `CATEGID` (`CATEGID`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=latin1;

INSERT INTO tblcategory VALUES("1","WINDOW RISER","","");
INSERT INTO tblcategory VALUES("2","TAIL LAMP","","");
INSERT INTO tblcategory VALUES("3","WINDOW LOCK","","");
INSERT INTO tblcategory VALUES("4","SIDE MIRROR","","");
INSERT INTO tblcategory VALUES("5","REAR VIEW MIRROR","","");
INSERT INTO tblcategory VALUES("6","PLATE LAMP","","");
INSERT INTO tblcategory VALUES("7","SIDE LAMP","","");
INSERT INTO tblcategory VALUES("8","TAIL LENS","","");
INSERT INTO tblcategory VALUES("9","SIDE MIRROR CLAMP","","");
INSERT INTO tblcategory VALUES("10","BUMPER MIRROR","","");
INSERT INTO tblcategory VALUES("11","PARK LAMP","","");
INSERT INTO tblcategory VALUES("12","CLEARANCE LAMP","","");
INSERT INTO tblcategory VALUES("13","BUMPER","","");
INSERT INTO tblcategory VALUES("14","STROBE LAMP","","");
INSERT INTO tblcategory VALUES("15","BUMPER MOULDING","","");
INSERT INTO tblcategory VALUES("16","TAIL LAMP FILLER","","");
INSERT INTO tblcategory VALUES("17","HEAD LAMP FRAME","","");
INSERT INTO tblcategory VALUES("18","HEAD LAMP HOUSING","","");
INSERT INTO tblcategory VALUES("19","FOG LAMP","","");
INSERT INTO tblcategory VALUES("20","PANEL BOARD","","");
INSERT INTO tblcategory VALUES("21","SIDE BUMPER","","");
INSERT INTO tblcategory VALUES("22","WINDOW MECHANISM","","");
INSERT INTO tblcategory VALUES("23","BACK MIRROR","","");
INSERT INTO tblcategory VALUES("24","MATTING","","");
INSERT INTO tblcategory VALUES("25","WIPER LINKAGE","","");
INSERT INTO tblcategory VALUES("26","HORN","","");
INSERT INTO tblcategory VALUES("27","MUDGUARD","","");
INSERT INTO tblcategory VALUES("28","VALANCE PANEL","","");
INSERT INTO tblcategory VALUES("29","MIRROR ARM","","");
INSERT INTO tblcategory VALUES("30","GRILLE","","");
INSERT INTO tblcategory VALUES("31","HEAD LAMP","","");
INSERT INTO tblcategory VALUES("32","FENDER","","");
INSERT INTO tblcategory VALUES("33","TAIL LAMP GARNISH","","");
INSERT INTO tblcategory VALUES("34","INNER DOOR HANDLE","","");
INSERT INTO tblcategory VALUES("35","OUTER DOOR HANDLE","","");
INSERT INTO tblcategory VALUES("36","CAR COVER","","");
INSERT INTO tblcategory VALUES("37","HOOD","","");
INSERT INTO tblcategory VALUES("38","ANTENNA","","");
INSERT INTO tblcategory VALUES("39","TAIL GATE","","");
INSERT INTO tblcategory VALUES("40","REVOLVING MOTOR","","");
INSERT INTO tblcategory VALUES("41","TIRE BLACK","","");
INSERT INTO tblcategory VALUES("42","OIL","","");
INSERT INTO tblcategory VALUES("43","READING LAMP","","");
INSERT INTO tblcategory VALUES("44","SAFETY BELT","","");
INSERT INTO tblcategory VALUES("45","SOCKET","","");
INSERT INTO tblcategory VALUES("46","WIPER ARM AND BLADE","","");
INSERT INTO tblcategory VALUES("47","POWER WINDOW","","");
INSERT INTO tblcategory VALUES("48","SWITCH","","");
INSERT INTO tblcategory VALUES("49","BULB","","");
INSERT INTO tblcategory VALUES("50","HORN RELAY","","");
INSERT INTO tblcategory VALUES("51","WHEEL CAP","","");
INSERT INTO tblcategory VALUES("52","STEPPING BOARD PANEL","","");
INSERT INTO tblcategory VALUES("53","PEANUT BULB","","");
INSERT INTO tblcategory VALUES("54","GRILLE ORNAMENT","","");
INSERT INTO tblcategory VALUES("55","WEATHER STRIP","","");
INSERT INTO tblcategory VALUES("56","LENS","","");
INSERT INTO tblcategory VALUES("57","REVOLVING LAMP","","");
INSERT INTO tblcategory VALUES("58","HYDRAULIC JACK","","");
INSERT INTO tblcategory VALUES("59","SIDE SKIRT","","");
INSERT INTO tblcategory VALUES("60","LAMP","","");
INSERT INTO tblcategory VALUES("61","VACUUM CLEANER","","");
INSERT INTO tblcategory VALUES("62","MUFFLER PIPE","","");
INSERT INTO tblcategory VALUES("63","WIPER MOTOR","","");
INSERT INTO tblcategory VALUES("64","AUXILLARY FAN ONLY","","");
INSERT INTO tblcategory VALUES("65","HANDLE COVER","","");
INSERT INTO tblcategory VALUES("66","TROUBLE LAMP","","");
INSERT INTO tblcategory VALUES("67","FACE PANEL","","");
INSERT INTO tblcategory VALUES("68","DOOR","","");
INSERT INTO tblcategory VALUES("69","FAN BLADE","","");
INSERT INTO tblcategory VALUES("70","CLAMP","","");
INSERT INTO tblcategory VALUES("71","AUXILLARY FAN","","");
INSERT INTO tblcategory VALUES("72","BACK-SEE","","");
INSERT INTO tblcategory VALUES("73","WIPER BLADE","","");
INSERT INTO tblcategory VALUES("74","CENTER PANEL","","");
INSERT INTO tblcategory VALUES("75","CORNER LENS","","");
INSERT INTO tblcategory VALUES("76","BRAKE FLUID","","");
INSERT INTO tblcategory VALUES("77","OUTER CHANNEL","","");
INSERT INTO tblcategory VALUES("78","HEAD LAMP RING","","");
INSERT INTO tblcategory VALUES("79","BRAKE LAMP","","");
INSERT INTO tblcategory VALUES("80","GAUGE","","");
INSERT INTO tblcategory VALUES("81","CAR FAN","","");
INSERT INTO tblcategory VALUES("82","RUN CHANNEL","","");
INSERT INTO tblcategory VALUES("83","SHIFT BOOT","","");
INSERT INTO tblcategory VALUES("84","ROOM LAMP","","");
INSERT INTO tblcategory VALUES("85","WINDSHIELD WASHER","","");
INSERT INTO tblcategory VALUES("86","GAUGE FACE KIT","","");
INSERT INTO tblcategory VALUES("87","PEDAL PAD","","");
INSERT INTO tblcategory VALUES("88","BACK CUSHION","","");
INSERT INTO tblcategory VALUES("89","CASSETTE HOLDER","","");
INSERT INTO tblcategory VALUES("90","AIR COMPRESSOR","","");
INSERT INTO tblcategory VALUES("91","AUTO COOLANT","","");
INSERT INTO tblcategory VALUES("92","FENDER MIRROR","","");
INSERT INTO tblcategory VALUES("93","SIDE GARNISH","","");
INSERT INTO tblcategory VALUES("94","CLOCK","","");
INSERT INTO tblcategory VALUES("95","DOOR LOCK","","");
INSERT INTO tblcategory VALUES("96","FENDER LAMP","","");
INSERT INTO tblcategory VALUES("97","MAGNETIC VALVE","","");
INSERT INTO tblcategory VALUES("98","AIR FRESHENER","","");
INSERT INTO tblcategory VALUES("99","SIREN HORN","","");
INSERT INTO tblcategory VALUES("100","REVOLVING LENS","","");
INSERT INTO tblcategory VALUES("101","SIDE REFLECTOR","","");
INSERT INTO tblcategory VALUES("102","EWD","","");
INSERT INTO tblcategory VALUES("103","STEPPING BOARD","","");
INSERT INTO tblcategory VALUES("104","AIR CLEANER","","");
INSERT INTO tblcategory VALUES("105","DOOR KNOB","","");
INSERT INTO tblcategory VALUES("106","MIRROR LENS","","");
INSERT INTO tblcategory VALUES("107","REFLECTOR","","");
INSERT INTO tblcategory VALUES("108","HOOD CATCH","","");
INSERT INTO tblcategory VALUES("109","SIDE GRILLE","","");
INSERT INTO tblcategory VALUES("110","HEAD LENS","","");
INSERT INTO tblcategory VALUES("111","BULB SOCKET","","");
INSERT INTO tblcategory VALUES("112","TIRE VALVE","","");
INSERT INTO tblcategory VALUES("113","STEERING PINION","","");
INSERT INTO tblcategory VALUES("114","BACK UP LAMP","","");
INSERT INTO tblcategory VALUES("115","HEAD LAMP FILLER","","");
INSERT INTO tblcategory VALUES("116","CIGARETTE LIGHTER","","");
INSERT INTO tblcategory VALUES("117","SPOILER","","");
INSERT INTO tblcategory VALUES("118","INNER CHANNEL","","");
INSERT INTO tblcategory VALUES("119","KEY CHAIN","","");
INSERT INTO tblcategory VALUES("120","BLOWER","","");
INSERT INTO tblcategory VALUES("121","GAS CAP","","");
INSERT INTO tblcategory VALUES("122","AUXILLARY FAN MOTOR","","");
INSERT INTO tblcategory VALUES("123","GLASS LENS","","");
INSERT INTO tblcategory VALUES("124","WIPER ARM","","");
INSERT INTO tblcategory VALUES("125","PANEL BULB","","");
INSERT INTO tblcategory VALUES("126","YELLOW CAP","","");
INSERT INTO tblcategory VALUES("127","SIDE LENS","","");
INSERT INTO tblcategory VALUES("128","CARBURETOR KIT","","");
INSERT INTO tblcategory VALUES("129","SPARK PLUG","","");
INSERT INTO tblcategory VALUES("130","FLASHING LAMP","","");
INSERT INTO tblcategory VALUES("131","SUN VISOR","","");
INSERT INTO tblcategory VALUES("132","DRIVER UNIT","","");
INSERT INTO tblcategory VALUES("133","FENDER MOULDING","","");
INSERT INTO tblcategory VALUES("134","CORNER PANEL","","");
INSERT INTO tblcategory VALUES("135","FENDER LINER","","");
INSERT INTO tblcategory VALUES("136","INSIDE DOOR LOCK","","");
INSERT INTO tblcategory VALUES("137","CORNER VANE","","");
INSERT INTO tblcategory VALUES("138","CLEARANCE BRACKET","","");
INSERT INTO tblcategory VALUES("139","TAIL LAMP FRAME","","");
INSERT INTO tblcategory VALUES("140","PARK LENS","","");
INSERT INTO tblcategory VALUES("141","SIDE LAMP REFLECTOR","","");
INSERT INTO tblcategory VALUES("142","CYLINDER KEY SET","","");
INSERT INTO tblcategory VALUES("143","HINGE","","");
INSERT INTO tblcategory VALUES("144","LOWER PANEL","","");
INSERT INTO tblcategory VALUES("145","RADIATOR FAN","","");
INSERT INTO tblcategory VALUES("146","OZONIZER","","");
INSERT INTO tblcategory VALUES("147","NOZZLE","","");
INSERT INTO tblcategory VALUES("148","TAIL GATE LOCK","","");
INSERT INTO tblcategory VALUES("149","PILOT LAMP","","");
INSERT INTO tblcategory VALUES("150","INNER PULL HANDLE","","");
INSERT INTO tblcategory VALUES("151","AIRCON FAN","","");
INSERT INTO tblcategory VALUES("152","TRUNK LID","","");
INSERT INTO tblcategory VALUES("153","SIREN CONTROL","","");
INSERT INTO tblcategory VALUES("154","RADIATOR MOTOR","","");
INSERT INTO tblcategory VALUES("155","SKI RACK","","");
INSERT INTO tblcategory VALUES("156","DOOR PROTECTOR","","");
INSERT INTO tblcategory VALUES("157","FLAT CUSHION","","");
INSERT INTO tblcategory VALUES("158","HEAD LAMP RELAY","","");
INSERT INTO tblcategory VALUES("159","DRINK HOLDER","","");
INSERT INTO tblcategory VALUES("160","WINDSHIELD WASHER MOTOR","","");
INSERT INTO tblcategory VALUES("161","FOG LENS","","");
INSERT INTO tblcategory VALUES("162","FENDER GUIDE","","");
INSERT INTO tblcategory VALUES("163","INDEX LAMP","","");
INSERT INTO tblcategory VALUES("164","SEAT CUSHION","","");
INSERT INTO tblcategory VALUES("165","ROOM LENS","","");
INSERT INTO tblcategory VALUES("166","STROBE LENS","","");
INSERT INTO tblcategory VALUES("167","SWAN LENS","","");
INSERT INTO tblcategory VALUES("168","FRAME","","");
INSERT INTO tblcategory VALUES("169","WAX","","");
INSERT INTO tblcategory VALUES("170","PAGER","","");
INSERT INTO tblcategory VALUES("171","COMPARTMENT LOCK","","");
INSERT INTO tblcategory VALUES("172","HEAD LAMP RIM","","");
INSERT INTO tblcategory VALUES("173","DOOR MECHANISM","","");
INSERT INTO tblcategory VALUES("174","HEAD LAMP COVER","","");
INSERT INTO tblcategory VALUES("175","TRUNK OPENER","","");
INSERT INTO tblcategory VALUES("176","HOOD LOCK","","");
INSERT INTO tblcategory VALUES("177","BACK MIRROR LENS","","");
INSERT INTO tblcategory VALUES("178","PLATE LAMP HOUSING","","");
INSERT INTO tblcategory VALUES("179","PLATE LAMP STICKER","","");
INSERT INTO tblcategory VALUES("180","DOOR STRIKER","","");
INSERT INTO tblcategory VALUES("181","DOOR REFLECTOR","","");
INSERT INTO tblcategory VALUES("183","CAB LENS","","");
INSERT INTO tblcategory VALUES("184","DOOR KNOB GUIDE","","");
INSERT INTO tblcategory VALUES("185","FENDER GUIDE LENS","","");
INSERT INTO tblcategory VALUES("186","FLUORESCENT TUBE","","");
INSERT INTO tblcategory VALUES("187","MICROPHONE","","");
INSERT INTO tblcategory VALUES("188","NECK REST","","");
INSERT INTO tblcategory VALUES("189","SIDE MARKER","","");
INSERT INTO tblcategory VALUES("190","SINGLE FACE LENS","","");
INSERT INTO tblcategory VALUES("191","TIRE CARRIER","","");
INSERT INTO tblcategory VALUES("192","BODY MOULDING","","");
INSERT INTO tblcategory VALUES("193","WINDSHIELD LAMP","","");
INSERT INTO tblcategory VALUES("194","SEAT COVER","","");
INSERT INTO tblcategory VALUES("195","KDS REPLACEMENTS","","");
INSERT INTO tblcategory VALUES("196","CENTRAL LOCK","","");
INSERT INTO tblcategory VALUES("197","POLICE SIREN","","");
INSERT INTO tblcategory VALUES("198","HEAD LAMP MOULDING","","");
INSERT INTO tblcategory VALUES("199","CAR FAN SWITCH","","");
INSERT INTO tblcategory VALUES("200","HEAD LAMP GARNISH","","");
INSERT INTO tblcategory VALUES("201","DOOR STAY","","");
INSERT INTO tblcategory VALUES("202","LICENSE FRAME","","");
INSERT INTO tblcategory VALUES("203","PLATE LAMP COVER","","");
INSERT INTO tblcategory VALUES("204","HORN SWITCH","","");
INSERT INTO tblcategory VALUES("205","BEGINNING BALANCE","","");
INSERT INTO tblcategory VALUES("206","WANG WANG","","");
INSERT INTO tblcategory VALUES("207","BACK REST","","");
INSERT INTO tblcategory VALUES("208","AIR FILTER","","");
INSERT INTO tblcategory VALUES("209","OUTSIDE HANDLE","","");
INSERT INTO tblcategory VALUES("210","INSIDE HANDLE","","");
INSERT INTO tblcategory VALUES("211","CONNECTING BOARD","","");
INSERT INTO tblcategory VALUES("212","REPLACE CLUTCH DISC","","");
INSERT INTO tblcategory VALUES("213","PRESSURE PLATE","","");
INSERT INTO tblcategory VALUES("214","RELEASE BEARING","","");
INSERT INTO tblcategory VALUES("215","SHOCK ABSORBER","","");
INSERT INTO tblcategory VALUES("216","DOOR EDGE","","");
INSERT INTO tblcategory VALUES("217","PLATE FRAME","","");
INSERT INTO tblcategory VALUES("218","CONNECTING BOARD PANEL","","");
INSERT INTO tblcategory VALUES("219","PLUG IN FUSE","","");
INSERT INTO tblcategory VALUES("220","GENERATOR","","");
INSERT INTO tblcategory VALUES("221","BOOT COVER","","");
INSERT INTO tblcategory VALUES("222","COMPLIANCE BUSHING","","");
INSERT INTO tblcategory VALUES("223","STEERING COUPLING","","");
INSERT INTO tblcategory VALUES("224","DASH BOARD COVER","","");
INSERT INTO tblcategory VALUES("225","BATTERY TERMINAL","","");
INSERT INTO tblcategory VALUES("226","WIPER PANEL","","");
INSERT INTO tblcategory VALUES("227","RELAY","","");
INSERT INTO tblcategory VALUES("228","GLASS CHANNEL","","");
INSERT INTO tblcategory VALUES("229","COOLANT TANK","","");
INSERT INTO tblcategory VALUES("230","SIGNAL SWITCH","","");
INSERT INTO tblcategory VALUES("231","RAIN GUTTER","","");
INSERT INTO tblcategory VALUES("232","TAIL GATE HANDLE","","");
INSERT INTO tblcategory VALUES("239","CAPACITOR ( TEST )","","");



CREATE TABLE `tblcolor` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `COLOR` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `COLOR` (`COLOR`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

INSERT INTO tblcolor VALUES("1","BLACK");
INSERT INTO tblcolor VALUES("2","AMBER");
INSERT INTO tblcolor VALUES("3","BROWN");
INSERT INTO tblcolor VALUES("4","CHROME");
INSERT INTO tblcolor VALUES("5","RED");
INSERT INTO tblcolor VALUES("6","VIOLET");
INSERT INTO tblcolor VALUES("7","GREEN");
INSERT INTO tblcolor VALUES("8","BLACK, GRAY");
INSERT INTO tblcolor VALUES("9","CLEAR");
INSERT INTO tblcolor VALUES("10","BLUE, CLEAR");
INSERT INTO tblcolor VALUES("11","GRAY");
INSERT INTO tblcolor VALUES("12","BLACK BODY");
INSERT INTO tblcolor VALUES("13","A/C");
INSERT INTO tblcolor VALUES("15","PAINTED");
INSERT INTO tblcolor VALUES("16","R/A/R");
INSERT INTO tblcolor VALUES("17","R/C");
INSERT INTO tblcolor VALUES("18","CHROME  BOD");
INSERT INTO tblcolor VALUES("19","CHROME/PAIN");
INSERT INTO tblcolor VALUES("20","A/R");
INSERT INTO tblcolor VALUES("21","BLUE");
INSERT INTO tblcolor VALUES("22","SINGLE FILA");
INSERT INTO tblcolor VALUES("23","ASSORTED CO");
INSERT INTO tblcolor VALUES("24","CLEAR, YELL");
INSERT INTO tblcolor VALUES("25","RAINBOW");
INSERT INTO tblcolor VALUES("26","YELLOW");
INSERT INTO tblcolor VALUES("27","CLEAR-YELLO");
INSERT INTO tblcolor VALUES("28","CHROME BODY");
INSERT INTO tblcolor VALUES("29","CHROME/CHAR");
INSERT INTO tblcolor VALUES("30","RED-BLUE");
INSERT INTO tblcolor VALUES("31","NEON GREEN");
INSERT INTO tblcolor VALUES("32","DARK GREEN");
INSERT INTO tblcolor VALUES("33","WHITE-BLACK");
INSERT INTO tblcolor VALUES("34","WHITE");
INSERT INTO tblcolor VALUES("35","AMBER, BLUE");
INSERT INTO tblcolor VALUES("36","NEON YELLOW");
INSERT INTO tblcolor VALUES("37","PINK");
INSERT INTO tblcolor VALUES("38","G/C");
INSERT INTO tblcolor VALUES("39","B/C");
INSERT INTO tblcolor VALUES("40","V/C");
INSERT INTO tblcolor VALUES("41","R/C/B");
INSERT INTO tblcolor VALUES("42","R/C/V");
INSERT INTO tblcolor VALUES("43","R/C/C");
INSERT INTO tblcolor VALUES("44","R/A/W");
INSERT INTO tblcolor VALUES("45","R/C/G");
INSERT INTO tblcolor VALUES("46","GOLD");
INSERT INTO tblcolor VALUES("47","NEON PINK");
INSERT INTO tblcolor VALUES("48","MAROON");
INSERT INTO tblcolor VALUES("49","CHROME/BLAC");
INSERT INTO tblcolor VALUES("50","GRAY-GRAY");
INSERT INTO tblcolor VALUES("51","ALL MAROON");
INSERT INTO tblcolor VALUES("52","BLACK-BLACK");
INSERT INTO tblcolor VALUES("53","BLUE-GRAY");
INSERT INTO tblcolor VALUES("54","BEIGE");
INSERT INTO tblcolor VALUES("55","BLUE-BLUE");
INSERT INTO tblcolor VALUES("56","BLACK-BROWN");
INSERT INTO tblcolor VALUES("57","RED-RED");
INSERT INTO tblcolor VALUES("58","BLACK-CHROM");
INSERT INTO tblcolor VALUES("59","R/C, ALL CL");
INSERT INTO tblcolor VALUES("60","AMBER, RED");
INSERT INTO tblcolor VALUES("61","SILVER");
INSERT INTO tblcolor VALUES("62","BLACK, BROW");
INSERT INTO tblcolor VALUES("63","BLACK, CHRO");
INSERT INTO tblcolor VALUES("64","GREEN BODY");
INSERT INTO tblcolor VALUES("65","NEON BLUE");
INSERT INTO tblcolor VALUES("66","GOLD-VIOLET");
INSERT INTO tblcolor VALUES("67","BLUE, GREEN");
INSERT INTO tblcolor VALUES("68","RED/AMBER");
INSERT INTO tblcolor VALUES("69","BLUE CHROME");
INSERT INTO tblcolor VALUES("70","NEON GOLD");
INSERT INTO tblcolor VALUES("71","R/A");
INSERT INTO tblcolor VALUES("72","BLACK  BODY");
INSERT INTO tblcolor VALUES("73","RH");
INSERT INTO tblcolor VALUES("74","BRONZE");
INSERT INTO tblcolor VALUES("75","AMBER-GRAY");
INSERT INTO tblcolor VALUES("76","NEON- AMBER GREEN");
INSERT INTO tblcolor VALUES("78","Lava Red ( Test )");



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
  `creditlimit` double(12,2) DEFAULT 0.00,
  `balance` double(12,2) DEFAULT 0.00,
  `BADACCT` char(3) DEFAULT NULL,
  `DISCOUNTPER` double(6,2) DEFAULT 0.00,
  `SMANNAME` varchar(100) DEFAULT NULL,
  `SMANCODE` char(20) DEFAULT NULL,
  `SALESMANID` int(11) DEFAULT NULL,
  `TINNO` varchar(20) DEFAULT NULL,
  `CUSTTYPE` int(1) DEFAULT 0,
  `ISHIDDEN` char(3) DEFAULT NULL,
  `DRDATE` date DEFAULT NULL,
  PRIMARY KEY (`CUSTOMERID`),
  UNIQUE KEY `custname` (`custname`)
) ENGINE=InnoDB AUTO_INCREMENT=617 DEFAULT CHARSET=latin1;

INSERT INTO tblcustomer VALUES("1","168 CORP.","16800001","3 Tangali St. G. Roxas Quezon City","2","","JACQUELYN WONG","3636447","0916-9821868","","","90","","","100000.00","35300.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("2","A&D HARDWARE","A&D00001","279 Malagasang St. Cavite","3-COD","","11231","046-4711360, 046-471-1346","dasfsdfas","sdafsd","jim@jim.com","90","2010-01-01","3 T-shirt, 8 calendar, 1 ham","10000000.00","276362.60","","7.00","SMAN 1","SMAN001","2","","1","","");
INSERT INTO tblcustomer VALUES("3","A. BONIFACIO AUTO SUPPLY","A. 00001","246 (578) A. Bonifacio Ave. Balintawak QC Phils.","2-COD","","","364-2290, 361-5024, 3634759, 4152076/77","","361-7206","","90","","","50000000.00","97190.00","no","0.00","","","","103-967-844-000","2","no","");
INSERT INTO tblcustomer VALUES("4","AARON SAMUEL INC.","AAR00001","33 Interior 68-C Banaue St. Quezon City","PM","","","712-9558, 414-8752, 712-9580","","","","90","","2 T-shirt, 1 Gift B","10000000.00","465142.00","no","0.00","","","","228-782-048-000","2","no","");
INSERT INTO tblcustomer VALUES("5","ABC PREMIERE A/P SUPPLY/ ABC BY TIRE","ABC00001","2520 Taft Ave. Pasay City","3","","Auntie Belen","831-5337, 834-1265","","831-5491","","90","","2 T-shirt, 1 Gift B, ABC By Tire & Auto Supply","5000000.00","128918.00","no","0.00","","","","330-151-541-801","1","no","");
INSERT INTO tblcustomer VALUES("6","ABC AUTO PARTS & GEN.MDSE.","ABC00002","159 Banaue St. Quezon City","PM","","","732-0020, 732-1174","","","","90","","2 T-shirt","10000000.00","22789.00","no","0.00","","","","126-733-180","1","no","");
INSERT INTO tblcustomer VALUES("7","AFTERSHOCK AUTO PARTS","AFT00001","84 Unit 12 Solmac Bldg.","PM","","","743-7531, 743-7904, 743-7608","","","","90","","","2000000.00","182090.00","no","0.00","","","","161-365-296","1","no","");
INSERT INTO tblcustomer VALUES("8","AIKI MOTOR PARTS","AIK00001","39 Banaue ST. Quezon City","AM","","REY","711-0015","","","","90","","2 T-shirt","700000.00","83820.00","no","0.00","","","","104-013-887","1","no","");
INSERT INTO tblcustomer VALUES("9","AKAYA MKTG.","AKA00001","13 Bayaya St. Quezon City","2","","","371-7793, 731-6450, 411-4415","","371-0454","","90","","2 T-shirt, 1 Gift","10000000.00","893840.00","no","0.00","","","","109-903-222-000","2","no","");
INSERT INTO tblcustomer VALUES("10","AL SPARE PARTS AND SERVICE CENTER","AL 00001","179 J. Abad Santos Manila","4","","","253-5651, 253-5637","","","","45","","1 raffle","2000000.00","12595.00","no","0.00","","","","029-000-320-081","3","no","");
INSERT INTO tblcustomer VALUES("11","ALABANG PARTS CENTER","ALA00001","Fabricare Bldg. No. 591 Unit 102-103 Alabang Zapote Rd","3","","","772-1653, 772-1656","","772-1659","","90","","2 T-shirt","30000.00","720.00","no","0.00","","","","225-924-945-000","1","no","");
INSERT INTO tblcustomer VALUES("12","ALDEX HARDWARE AND GEN. MDSE CENTER","ALD00001","646 Evangelista St.","4","","","735-9337","","234-1522","","90","","","10000.00","0.00","no","0.00","","","","032-100-094-209","1","no","");
INSERT INTO tblcustomer VALUES("13","ALISON GEN. MDSG.","ALI00001","40 Banaue St. Quezon City","PM","","","7492115, 749-2113, 749-2106","","749-2122","","90","","3 T-shirt, 1 Gift","20000000.00","125560.00","no","0.00","","","","290-103-766-475","2","no","");
INSERT INTO tblcustomer VALUES("14","ALLIED AUTO SUPPLY","ALL00001","376 Banaue St. Quezon City","PM","","","712-1877, 742-7830","","","","90","","","10000.00","0.00","no","0.00","","","","038-000-376-020","1","no","");
INSERT INTO tblcustomer VALUES("15","ALTO MOTOR PARTS","ALT00001","385-D Banawe St., QC","PM","","","7113053, 7421159, 7437975","","","","90","","","50000000.00","14805.00","no","0.00","","","","038-000-376-020","1","no","");
INSERT INTO tblcustomer VALUES("16","AMBASSADOR INMOGO, INC.","AMB00001","","2-COD","","","","","","","0","","","100000.00","38060.00","no","5.00","","","","000-152-467-000","3","no","");
INSERT INTO tblcustomer VALUES("17","ARDEX MOTOR CORP.","ARD00001","1273 Batangas St. Sta. Cruz Manila","4","","","253-0582, 254-2095, 254-2112/108/151","","253-0061","ardex@info.com.ph","90","","2 T-shirt, Maker, Known","20000.00","0.00","no","0.00","","","","031-000-328-879","1","no","");
INSERT INTO tblcustomer VALUES("18","ARMORTECH INTERNATIONAL TRANSPORTER CORP.","ARM00001","N. Roxas Quezon City","WEEKDAY-FRI","","Mhel, Rose","7407772-73, 7119514,","","7421137","","90","","same envelope as CTK, P&E","5000.00","0.00","no","0.00","","","","228-775-014-000","3","no","");
INSERT INTO tblcustomer VALUES("19","ATC II TRADERS INC.","ATC00001","1218 CM Recto Manila","4","","AUGUSTO T. CHUA","244-7787, 244-7854","","245-6833","","90","","2 T-shirt, if COD, less 7%","5000000.00","131740.00","no","0.00","","","","103-907-593-000","1","no","");
INSERT INTO tblcustomer VALUES("20","ATCO PARTS CENTER, INC.","ATC00002","2758-60 Taft Ave. Ext. Pasay City","3","","IMEE, CHERRY (ACCTS)","831-4177, 831-6365, 833-0859, 8348750, 5110288/89","","831-9386","info_atco@yahoo.com.ph","90","","3 T-shirt, 1 Gift B, 1 Raffle","10000000.00","210780.00","no","0.00","","","","051-004-503-703","1","no","");
INSERT INTO tblcustomer VALUES("21","*ATCO AUTO SUPPLY-LAS PINAS","ATC00003","41 Real St. Las Pinas City","3","","asdasda","874-1841","sadsada","","","90","0001-01-01","","1000000.00","2100.00","","0.00","SMAN 1","SMAN001","2","004-087-717-333","1","yes","");
INSERT INTO tblcustomer VALUES("22","ATLAS","ATL00001","Benavidez St. Manila","4","","","244-1940, 244-1959","","","","90","","","10000000.00","45480.00","no","0.00","","","","110-779-526-000","1","no","");
INSERT INTO tblcustomer VALUES("23","ATY INDUSTRIAL SALES","ATY00001","1384 Alvarado Ext. Manila","4","","","252-1860, 252-1890, 252-1867","","","","90","","","10000.00","200.00","no","0.00","","","","380-000-369-614","1","no","");
INSERT INTO tblcustomer VALUES("24","AUTOBACS ACCESSORIES CENTER","AUT00001","30 H-I BANAUE ST. QUEZON CITY","WEEKDAYS","","","741-1947, 731-6488, 712-0389","","","","90","","","10000.00","0.00","no","0.00","","","","038-104-006-677","1","no","");
INSERT INTO tblcustomer VALUES("25","AUTOBUFF MOTOR SALES","AUT00002","655 Banaue St. Quezon City","PM-COD","","711-1372, 743-3191, 415-3610","","","","","7","","","100000.00","6880.00","no","10.00","","","","038-183-461-458","2","no","");
INSERT INTO tblcustomer VALUES("26","AUTOTECH","AUT00004","143 Espina St. Navotas City","2","","","281-7480, 281-7484","","","","90","","2 T-shirt, Autotest, FORMERLY AUTOTEST AND AUTOMAC","100000.00","28300.00","no","0.00","","","","210-789-133-000","2","no","");
INSERT INTO tblcustomer VALUES("27","B&S CORP.","B&S00001","28 Ubay St. Quezon City","2","","BEN CHAN","712-3964, 781-0698","","711-9226","","90","","2 T-shirt, Automate","1000000.00","222945.00","no","0.00","","","","243-339-623-000","2","no","");
INSERT INTO tblcustomer VALUES("28","AUTOMAX JAPAN SURPLUS PARTS INC.","AUT00005","241 Banawe St cor. Quezon Ave. Quezon City","PM-COD","","","7406078, 7405440","","","","7","","","5000000.00","26297.30","no","7.00","","","","006-732-765","1","no","");
INSERT INTO tblcustomer VALUES("29","AUTOPHIL","AUT00006","","4","","","","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("30","AUTORAMA PARTS CENTER","AUT00007","176 Banaue St. Quezon City","PM","","","743-8227, 743-8291-93","","","","90","","","10000.00","2100.00","no","0.00","","","","000-399-371","1","no","");
INSERT INTO tblcustomer VALUES("31","AUTOSPECS MOTOR SALES","AUT00008","37 H-I Banaue St. cor. Dapitan Quezon City","PM-COD","","","743-9376, 711-5046, 732-3835, 414-2463","","","","7","","2 T-shirt, 1 Ham, 1 Raffle, some are terms","10000000.00","256448.50","no","10.00","","","","038-103-938-784","2","no","");
INSERT INTO tblcustomer VALUES("32","AUTOSYNC","AUT00009","35-M Banaue St. Bgy. Lourdes Quezon City","WEEKDAY-THURS","","","","","","","90","","associated with New OK, also KARZ","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("33","BARICA HEAVY EQUIPMENT PARTS CENTER","BAR00001","221 Rizal Ave. Caloocan CIty","2","","","365-8499, 365-9328, 365-8658","","","","90","","1 Gift C","20000.00","70.00","no","0.00","","","","100-454-961-000","1","no","");
INSERT INTO tblcustomer VALUES("34","BAS MOTOR SHOP","BAS00001","6 Oliveros Drive, Balintawak, QC","WEEKDAY","","","361-1923, 508-1021, 782-1497","","","","90","","2 T-shirt, Random","1000000.00","99675.00","no","0.00","","","","109-917-084-003","3","no","");
INSERT INTO tblcustomer VALUES("35","BBW SALES INT'L","BBW00001","35-B Banaue St. Quezon City","PM","","","741-7906","","","","90","","2 T-shirt","20000.00","1360.00","no","0.00","","","","038-146-635-317","1","no","");
INSERT INTO tblcustomer VALUES("36","BEARSEA AUTO SUPPLY","BEA00001","Mc Arthur Hiway, Valenzuela City","2","","","291-6446, 293-8360","","","","90","","2 T-shirt, Oversea Valenzuela","10000.00","3700.00","no","0.00","","","","211-134-185","1","no","");
INSERT INTO tblcustomer VALUES("37","BEDFORD AUTO SUPPLY","BED00001","86 Mc Arthur Hiway Valenzuela City","2","","","291-6420, 291-6422","","","","90","","3 T-shirt","10000000.00","120180.00","no","0.00","","","","102-227-877-000","1","no","");
INSERT INTO tblcustomer VALUES("38","BENTLEY MOTOR PARTS","BEN00001","31 P. Paterno St. Quezon City","AM","","","732-1887, 732-4234, 732-4391","","","","90","","2 T-shirt","150000.00","76885.00","no","0.00","","","","105-620-186-000","1","no","");
INSERT INTO tblcustomer VALUES("39","BESMAN AUTO SUPPLY","BES00001","46-F Mc. Arthur Hiway Marulas Valenzuela City","2","","","291-8474, 291-8482, 293-1462","","","","90","","","5000000.00","110000.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("40","BESTCOLT","BES00002","53-A Banaue St. Quezon City","AM-WEEKLY","","","741-9860, 413-5708, 413-5709","","","","90","","3 T-shirt,  Coltline","50000000.00","93470.00","no","0.00","","","","000-204-450-000","1","no","");
INSERT INTO tblcustomer VALUES("41","BESTFORD","BES00003","","4","","","","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("42","BETA AUTO SUPPLY","BET00001","84-D Mc Arthur Hiway Valenzuela City","2-COD","","","361-3523, 291-6430, 291-6414","","","","0","","2 T-shirt","500000.00","111112.50","no","10.00","","","","102-227-908-000","1","no","");
INSERT INTO tblcustomer VALUES("43","BIGIE MULTI SALES INC.","BIG00001","25 B-2 Ubay St. Sienna Quezon City","2","","","413-5201, 711-0480","0920-2237274","749-6655","","90","","2 T-shirt, 1 Gift, 2 T-shirt Ruel, Margie, 2 Calendar Alice, 2 Calendar Ruel,","10000000.00","853024.00","no","0.00","","","","226-615-829-000","2","no","");
INSERT INTO tblcustomer VALUES("44","BM CAR PARTS AND ACCESSORIES","BM 00001","175 Banaue St. Quezon City","WEEKDAY","","","410-4476, 711-4064, 410-0174","","","","90","","Memeng","10000.00","0.00","no","0.00","","","","104-020-216","1","no","");
INSERT INTO tblcustomer VALUES("45","BOSS MARK","BOS00001","","WEEKDAY","","","","","","","90","","","10000.00","0.00","no","0.00","","","","201-044-706-000","1","no","");
INSERT INTO tblcustomer VALUES("46","BRIGIDO AUTO SUPPLY","BRI00001","","WEEKDAY","","","","","","","90","","2 T-shirt","10000.00","500.00","no","0.00","","","","195-334-216-000","1","no","");
INSERT INTO tblcustomer VALUES("47","BUENAL","BUE00001","","2","","","2916566","","","","90","","Buenda","10000.00","57150.00","no","0.00","","","","024-100-580-196","1","no","");
INSERT INTO tblcustomer VALUES("48","BW COMMERCIAL","BW 00001","30-Q Banaue St. Quezon City","PM","","BENJAMIN WONG (MANAGER)","741-1752, 743-1573, 448-6046","0918-8603764","741-1752, 741-1573","","90","","","1000000.00","23650.00","no","0.00","","","","139-261-204-000","1","no","");
INSERT INTO tblcustomer VALUES("49","C&R M/P","C&R00001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","105-177-175","1","no","");
INSERT INTO tblcustomer VALUES("50","C-3 AUDIO","C-300001","385 E Banaue St. cor. N. Roxas St. Quezon City","WEEKDAY-WED","","MITY CHUA/ROSE","732-3613, 711-6994, 410-4379","","","","120","","","1800000.00","206290.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("51","CAR DE LUXE AUTO SUPPLY","CAR00001","74 Banaue St. Quezon City","WEEKDAY-MON","","","732-6195, 732-0302","","","","120","","","1500000.00","49700.00","no","0.00","","","","000-408-416-000","1","no","");
INSERT INTO tblcustomer VALUES("52","CAR POWER AUTO SUPPLY","CAR00002","2754 Taft Ave. Pasay City","3","","","831-7583, 831-8588, 511-0370","","","","120","","Cut off: 24th of the month","10000.00","0.00","no","0.00","","","","051-100-056-681","1","no","");
INSERT INTO tblcustomer VALUES("53","CARLINE PARTS CENTER","CAR00003","60 Banaue St. Quezon City","AM","","SIONY MANUTA","712-0368, 742-6651, 743-4061, 413-4060, 712-0318","0922-8771867","413-4061","","150","","2 T-shirt, 1 Raffle","10000000.00","49880.00","no","0.00","","","","104-006-305","1","no","");
INSERT INTO tblcustomer VALUES("54","CARLUCK SOUTHMAYON","CAR00004","Legaspi, Albay","PROV","","","","","","","120","","","8000000.00","63270.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("55","XXXCARLUCK-SOUTHMAYON","CAR00005","Rizal St. Legaspi City","PROV","","","052-820-5109","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("56","RNY","RNY00001","971 G. Masangkay St. Manila","4","","LITO","244-7665, 244-1838, 244-1855","","","","120","","Carmatic","15000.00","1500.00","no","0.00","","","","103-911-123-000","1","no","");
INSERT INTO tblcustomer VALUES("57","CAROLINAS","CAR00006","R-10 Don Bosco Compound Tondo Manila","4-COD","","CESAR","994-1855, 252-7340, 482-3714, 244-7851252-7593","","","","0","","COD Net","10000.00","24310.00","no","0.00","","","","241-851-612-000","1","no","");
INSERT INTO tblcustomer VALUES("58","CAR-V IND'L SALES","CAR00007","25-5 Arroyo Bldg.-Lacson Gonzaga St. Bacolod City","PROV","","","034-434-4661, 432-3418, 433-3835","","434-4660","","90",""," fax: (034)4344660","500000.00","160450.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("59","CEBU FORTUNE","CEB00001","","PROV","","","","","","","120","","","5000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("60","CEBU PIONEER","CEB00002","Cebu City","PROV","","","032-2537079, 256-0983","0916-4257440","","","30","","","100000.00","67750.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("61","CHANDLER PHILS INC.","CHA00001","86 Dapitan St. Sto. Domingo Bgy. Matalahib, Quezon City","PM","","JESS MONZON","7315886, 7315884/89/90, 731-5892,711-4776","","731-5893","jsmonzon@gmail.com","120","","1 Gift C, 1 raffle, with form 2307, sister company of CJ","50000.00","12115.00","no","0.00","","","","000-369-576-000","3","no","");
INSERT INTO tblcustomer VALUES("62","CHASE MOTOR PARTS","CHA00002","76 Banaue St. Quezon City","AM","","","712-0904, 732-2233","","","","120","","2 T-shirt","150000.00","66370.00","no","0.00","","","","133-084-345-000","1","no","");
INSERT INTO tblcustomer VALUES("63","RISING SUN A/P ( J.P. CHICA'S)","J.P00001","42 BMA Ave. Tatalon Quezon City","PM-COD","","","742-4446, 711-2617","","","","7","","","1000000.00","95060.50","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("64","CJ AUTOMOTIVE","CJ 00001","1419 Vito Cruz Manila","PM","","","8964152, 896-3628, 896-3783","","","","120","","sister company of Chandler","10000.00","2750.00","no","0.00","","","","049-004-839-421","3","no","");
INSERT INTO tblcustomer VALUES("65","CKD JAPAN SURPLUS PARTS, INC.","CKD00001","189 Banaue St. near Agno St. Quezon City","PM-COD","","","740-4509, 712-2993, 740-5208","0917-8000013, 0926-6243072, 0917-8570540","","","7","","same envelope as Sprint","10000000.00","17990.00","no","7.00","","","","237-650-722","1","no","");
INSERT INTO tblcustomer VALUES("66","CLIFFORD","CLI00001","115 E. Rodriguez Ave. Quezon City","WEEKDAY","","","412-6119, 410-2391","0917-522-8882","","","120","","","50000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("67","CMC (COMMUNICATIONS MDSG. CORP)","CMC00001","962 Benavidez St. Manila","4","","","244-8366, 244-8367","","244-8363","","120","","2 T-shirt","30000.00","7230.00","no","0.00","","","","030-000-333-261","1","no","");
INSERT INTO tblcustomer VALUES("68","COLEMAN","COL00001","","WEEKDAY","","","6452435, 6452447","0917-6295574","","","0","","","5000.00","17180.00","no","0.00","","","","048-100-195-270","3","no","");
INSERT INTO tblcustomer VALUES("69","COLTMASTER AUTO SUPPLY","COL00002","165 Banaue St. Quezon City","PM","","","781-1833","","","","90","","2 T-shirt","1000000.00","76828.00","no","0.00","","","","038-104-011-838","1","no","");
INSERT INTO tblcustomer VALUES("70","COMMUTER AUTOMOTIVE SUPPLY CO. INC.","COM00001","1017 G. Masangkay St. Manila","4","","","244-7690, 244-7697","","244-7696","","90","","2 T-shirt, 1 Raffle","10000000.00","16720.00","no","0.00","","","","000-329-561-000","1","no","");
INSERT INTO tblcustomer VALUES("71","CROSSWIND AUTO SUPPLY","CRO00001","Banaue St. Quezon City","PM-COD","","","732-4331, 743-3222, 711-3535","","","","60","","2 T-shirt, 1 Raffle","3000000.00","34374.00","no","0.00","","","","217-378-874-000","1","no","");
INSERT INTO tblcustomer VALUES("72","CRUIZER PARTS CENTER","CRU00001","8168-C Dr. A. Santos Ave. Paranaque","3-COD","","","820-2663, 820-2665","","","","7","","2 T-shirt, same envelope with Gant","200000.00","108354.00","no","10.00","","","","901-448-066-000","1","no","");
INSERT INTO tblcustomer VALUES("73","CTK INC.","CTK00001","70 N. Roxas St. cor. Banaue Quezon City","WEEKDAY-FRI","","MHEL, ROSE, LITTLE GRANT","7407772-73, 7119514","","7421137","","90","","same envelope with Armortech, CTK, P&E","10000000.00","125000.00","no","0.00","OFF-000001","OFF-000001","","","3","no","");
INSERT INTO tblcustomer VALUES("74","D' KAN SAI","D' 00001","1556 T J. Abad. Santos Manila","4","","","251-5236, 255-1335","","","","120","","Unispeed","10000.00","700.00","no","0.00","","","","103-985-598-000","1","no","");
INSERT INTO tblcustomer VALUES("75","DAVAO GALAXY","DAV00001","Davao City","PROV","","ALEX","082-2276564, 224-2620","0917-6121379","","","120","","","500000000.00","900776.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("76","DCL PARTS SALES","DCL00001","72-A Kitanlad St Bgy. Tatalon Quezon City, 97 Silencio St. Bgy. Santol QC","AM","","Domeng","741-2981, 741-2091, 715-2030 (BODEGA)","","7412993","","120","","LMT","500000.00","160945.00","no","0.00","","","","110-437-431","1","no","");
INSERT INTO tblcustomer VALUES("77","DEIREL ENT.","DEI00001","2939 Bagac St. Manila","2","","ROMAN","256-0846","","254-2182","","90","","2+1 (Roman) T-shirt, 1 Gift Roman, 1 Ham","10000000.00","1412865.00","no","0.00","","","","102-471-491-000","2","no","");
INSERT INTO tblcustomer VALUES("78","DEL AIR","DEL00001","Banaue St. near Youngbros","AM-COD","","","741-6590, 741-1669","","","","7","","","100000.00","33390.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("79","XDENSO MOTOR SALES","DEN00001","","PM","","","","","","","90","","","10000.00","0.00","no","0.00","","","","000-393-828","1","no","");
INSERT INTO tblcustomer VALUES("80","DET","DET00001","2647 Dimasalang","3","","","843-5143","","","","120","","Transcity","10000.00","4830.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("81","DOLLAR DIESEL","DOL00001","84 Mc Arthur Hiway Valenzuela City","2","","","291-5401, 444-8631","","","","120","","","50000.00","14170.00","no","0.00","","","","132-410-637","1","no","");
INSERT INTO tblcustomer VALUES("82","DOUALE MAY TRADING","DOU00001","No. 17 A. Mabini St. Arty Subd. Valenzuela City","4","","ALEX CHING, MANNY","468-8834, 514-8879, 291-5515, 444-1559","0918-9067616","","alexching_517@yahoo.com","90","","RJB","30000.00","26820.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("83","DPJ","DPJ00001","ILOILO CITY","PROV","","","","","","","7","","","500000.00","302560.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("84","DUMAGUETE AUTO SUPPLY","DUM00001","","WEEKDAY","","","","","","","90","","2 T-shirt, 1 Gift","200000.00","154370.00","no","0.00","","","","035-225-04-10","3","no","");
INSERT INTO tblcustomer VALUES("85","E. BRION","E. 00001","161 BAtimana comp. Marulas Valenzuela Cebu: 22 Gen Echavez St.","PROV","","","032-2328942","","032-2338741, 292-3472","","120","","","5000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("86","ECL INTERGROUP","ECL00001","38 Banaue St. Quezon City","AM","","","712-0002, 712-0271","","","","120","","Barashi","10000.00","0.00","no","0.00","","","","000-071-803-000","1","no","");
INSERT INTO tblcustomer VALUES("87","EDSA CAR SERVICE CENTER","EDS00001","449 Santol St. Sta. Mesa Manila","3","","","714-1071, 714-1683","","714-7372","","90","","Richmond, Summit Autoworks","20000.00","3100.00","no","0.00","","","","105-613-313-000","3","no","");
INSERT INTO tblcustomer VALUES("88","ELEJANDRE TAROG","ELE00001","1645 Acasel Bldg, Sales St,","GENERATOR","","","3148537","","","","90","","","5000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("89","EMERALD AUTO PARTS","EME00001","180 Kabignayan St. Quezon Cit","WEEKDAY-TUES","","","743-1055, 711-5101","","","","90","","2 T-shirt, 1 Raffle","10000000.00","265070.00","no","0.00","","","","106-326-368","1","no","");
INSERT INTO tblcustomer VALUES("90","EMPRESS AUTO SUPPLY","EMP00001","Leon Kilat cor. Magallanes Cebu City","PROV","","","032-254-9059","","032-2560975","","120","","","1000000.00","112050.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("91","ERICK MOTOR SALES","ERI00001","10 Banaue St. Quezon City","AM","","WILLY UY","353-8888","0917-8671885","","","120","","2 T-shirt, Walco","100000.00","3900.00","no","0.00","","","","104-009-767","1","no","");
INSERT INTO tblcustomer VALUES("92","EUROPEAN AUTO SUPPLY","EUR00001","2766 Taft Ave. Pasay City","3","","PABLO TAN","831-4192, 831-8139, 831-1757","","","","120","","2 T-shirt, 1 Gift B","10000000.00","47155.00","no","0.00","","","","051-103-766-935","1","no","");
INSERT INTO tblcustomer VALUES("93","EVEDAN AUTO SUPPLY","EVE00001","1165 G. Masangkay St. Manila","4","","","254-7883, 254-7904, 254-7891","","","","120","","","10000.00","0.00","no","0.00","","","","103-904-728-000","1","no","");
INSERT INTO tblcustomer VALUES("94","EVERBEST TRADING","EVE00002","567 Araneta Ave. quezon City","WEEKDAY","","","713-5264, 712-2312, 712-2608","","","","120","","743-3233, 716-5361","10000.00","0.00","no","0.00","","","","110-780-176-000","1","no","");
INSERT INTO tblcustomer VALUES("95","EVERBRIGHT","EVE00003","3122 Bagac St. ,Manugit Tondo Mla.","2","","","2530649, 253-0689","","","","120","","Sealtest","150000.00","42340.00","no","0.00","","","","202-785-782-340","2","no","");
INSERT INTO tblcustomer VALUES("96","XEXCEED AUTO SUPPLY","EXC00001","","PM-WEEKLY","","","","","","","90","","same envelope as Prostreet","10000.00","0.00","no","0.00","","","","005-517-285-000","1","no","");
INSERT INTO tblcustomer VALUES("97","EXCEL AUTO SUPPLY","EXC00002","2752 Taft Ave. Pasay City","3-COD","","","831-7491","","","","7","","","10000.00","0.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("98","NEW EXTENSIVE","NEW00001","1188 CM Recto Ave. Manila","4-COD","","","247-7458, 244-2015","","244-8223","","7","","","100000000.00","703986.00","no","10.00","","","","030-103-932-474","2","no","");
INSERT INTO tblcustomer VALUES("99","FAIR DEAL AUTOMOTIVE SUPPLY TRADER","FAI00001","115-B Mc Arthur Hiway Marulas Valenzuela","2","","","291-6514","","","","120","","2 T-shirt","100000.00","31486.00","no","0.00","","","","102-227-737-000","1","no","");
INSERT INTO tblcustomer VALUES("100","FAMELAND COMMERCIAL","FAM00001","1055 G. Masangkay St. Manila","4","","","244-0207, 244-7855","","","","120","","","10000.00","2950.00","no","0.00","","","","103-934-669-000","1","no","");
INSERT INTO tblcustomer VALUES("101","FARUCA","FAR00001","","WEEKDAY","","","","","","","0","","","500.00","0.00","yes","0.00","","","","112-334-012-000","3","no","");
INSERT INTO tblcustomer VALUES("102","FAST AUTO SUPPLY","FAS00001","","WEEKDAY","","","","","","","0","","","5000.00","0.00","no","0.00","","","","924-559-375","3","no","");
INSERT INTO tblcustomer VALUES("103","FATIMA AUTO SUPPLY","FAT00001","","2","","","","","","","120","","2 T-shirt, Gan","10000.00","0.00","no","0.00","","","","102-233-405","1","no","");
INSERT INTO tblcustomer VALUES("104","FEDESU A/P INC.","FED00001","217 Rizal AVe. cor. 3rd Ave. Caloocan City","2","","","363-6238, 361-7297","","","","90","","","10000.00","0.00","no","2.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("105","FELCO AUTO SUPPLY","FEL00001","Blumentritt","4","","","254-0551, 254-0336","","","","90","","","10000.00","820.00","no","0.00","","","","031-103-901-732","1","no","");
INSERT INTO tblcustomer VALUES("106","FELSON AUTO SUPPLY","FEL00002","2940 Taft Ave. Pasay City","3","","","833-8177, 832-3547","","831-1426","","120","","2 T-shirt, 1 Raffle","10000.00","0.00","no","0.00","","","","051-100-084-465","1","no","");
INSERT INTO tblcustomer VALUES("107","FLEET PARTS","FLE00001","","2","","","","","","","120","","","10000.00","0.00","no","0.00","","","","038-103-068-395","1","no","");
INSERT INTO tblcustomer VALUES("108","FORDLAND SPARE PARTS CORP.","FOR00001","45 Banaue St. Quezon City","AM","","","7321206, 7324539","","","","120","","2 T-shirt, 1 Gift B","400000.00","71210.00","no","0.00","","","","000-389-756-000","1","no","");
INSERT INTO tblcustomer VALUES("109","FORDLINE AUTO PARTS CORP.","FOR00002","","PM","","","","","","","90","","2+1 (Manny) T-shirt, 1 raffle, collection at Motor1one","10000.00","0.00","no","0.00","","","","031-000-200-292","1","no","");
INSERT INTO tblcustomer VALUES("110","FRESHMAN MKTG.","FRE00001","18 Ubay St. Bgy. Sienna Sta. Mesa Heights Quezon City","2","","","741-3264, 743-2626, 781-4510, 7490141","","","","30","","2 T-shirt, 1 Ham, 1 Gift, 1 Raffle","600000000.00","963501.20","no","8.00","","","","109-910-167-000","2","no","");
INSERT INTO tblcustomer VALUES("111","FUTURA AUTO SUPPLY","FUT00001","135-137 Banaue St. Kaliraya Quezon City","PM-COD","","","742-5175","","","","7","","GIVE 7% DISCOUNT IF HE ASKS FOR IT.","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("112","GANT MOTOR SALES INC.","GAN00001","2742 D Taft AVe. cor. Vergel Street Pasay City","3-COD","","","831-6932, 831-8938, 831-0994","","833-3662","","7","","3 T-shirt, same envelope as Cruizer","500000.00","133305.00","no","10.00","","","","000-303-030-000","1","no","");
INSERT INTO tblcustomer VALUES("113","GATES ENTS.","GAT00001","","WEEKDAY","","","","","","","90","","2 T-shirt, 1 Gift","300000.00","13060.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("114","GEOPARTS SALES INC.","GEO00001","2324 S. Reyes Sta. Cruz Manila","4","","","365-2406, 365-3920, 361-7152","","","","90","","","10000000.00","1537118.00","no","0.00","","","","031-003-978-593","2","no","");
INSERT INTO tblcustomer VALUES("115","GLACIER MOTOR PARTS","GLA00001","505-B Edsa Pasay City","3","","","831-4728, 834-0512, 834-0513","","","","120","","","10000.00","850.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("116","GOLD LINE TOURS INC.","GOL00001","11 Don Ramon St. Talayan Village Quezon City","2","","","712-2929, 732-9097, 732-9205","","743-3389","","120","","","200000.00","15140.00","no","0.00","","","","000-885-525-000","3","no","");
INSERT INTO tblcustomer VALUES("117","D'GOLD METAL IND'L SALES INC.","GOL00002","41 9th Ave. West Grace Park Caloocan City","2","","","361-1005, 366-7783","","366-7782","","120","","","100000.00","26046.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("118","GOLDEN AXLE AUTO SUPPLY / EMTECH","GOL00003","248 Mc ARthur Hiway Karuhatan Valenzuela","2","","","293-6097, 291-5195","","","","120","","","50000.00","2900.00","no","0.00","","","","143-367-021","1","no","");
INSERT INTO tblcustomer VALUES("119","GOLDEN BRIDGE","GOL00004","Makati City","WEEKDAY","","","381-9329, 556-5272, 387-9329, 906-2348","","330-5364","","180","","","500000.00","148599.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("120","GOLDEN ISUZU","GOL00005","","3","","","","","","","150","","2 T-shirt","1000000.00","14560.00","no","0.00","","","","051-004-678-067","1","no","");
INSERT INTO tblcustomer VALUES("121","GOLDRICH","GOL00006","","WEEKDAY","","","","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("122","GOODFRIEND MOTOR PARTS","GOO00001","32 Banaue sT. quezon City","AM","","BENITO P. ONG","712-1148, 731-5796, 712-0085","","732-6196","","90","","2 T-shirt, 1 Ham, 1 Gift A, 1 Raffle","1000000.00","175300.00","no","0.00","","","","100-460-376-000","1","no","");
INSERT INTO tblcustomer VALUES("123","GOODMARK AUTO SUPPLY","GOO00002","435-C E. de los Santos Ave. Pasay City","WEEKDAY","","","831-3590, 844-9106","","","","120","","","10000.00","0.00","no","0.00","","","","510-103-767-449","1","no","");
INSERT INTO tblcustomer VALUES("124","NEW GRACETOWN ENTS.","GRA00001","Caloocan City","2","","","361-3155","","","","120","","","10000.00","100.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("125","GRAIECEARL","GRA00002","","2","","","","","","","120","","","180000.00","51962.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("126","GREAT SEA AUTO SUPPLY","GRE00001","1158 Rizal Ave. Caloocan City","2","","","364-9476, 361-0978, 364-9810","","","","120","","2 T-shirt, Oversea Caloocan","10000000.00","47550.00","no","0.00","","","","000-297-309-000","1","no","");
INSERT INTO tblcustomer VALUES("127","GREENLAND","GRE00002","921-923 Luzon St.","4","","","251-0871, 254-9002, 251-0526","","","","120","","","10000.00","0.00","no","0.00","","","","031-110-420-466","1","no","");
INSERT INTO tblcustomer VALUES("128","JOLLIBRAKE AUTO SUPPLY","JOL00001","KM-88 Mc Arthur Hiway Valenzuela City","2","","","2918431, 2918477, 4447884","","","","90","","2 T-shirt, GTX","5000000.00","12490.00","no","0.00","","","","171-122-559","1","no","");
INSERT INTO tblcustomer VALUES("129","GULONG A/S","GUL00001","1063 Benavidez Manila","4","","","244-2010, 244-2008, 244-2007","","","","120","","formerly RMJ Gen. Mdsg.","10000000.00","8940.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("130","HAPPEE","HAP00001","","WEEKDAY","","","367-2084","","410-0388","","90","","","20000.00","1570.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("131","HATTERAS","HAT00001","2263 Taft Ave. Pasay City","4","","","833-8582, 833-8583","","","","120","","","10000.00","0.00","no","0.00","","","","103-374-265-000","1","no","");
INSERT INTO tblcustomer VALUES("132","HI VERSION AUTO SUPPLY","HI 00001","Commonwealth","WEEKDAY","","","431-3764","","","","90","","","10000.00","0.00","no","0.00","","","","105-577-977-000","1","no","");
INSERT INTO tblcustomer VALUES("133","HOC GUAN MOTOR PARTS","HOC00001","1008 G. Masangkay St. Bdo. Manila","4","","","244-1783, 244-1781, 244-1778, 480-6468","","","","120","","2+1 (Filo) T-shirt","250000.00","71503.00","no","0.00","","","","103-901-944-000","1","no","");
INSERT INTO tblcustomer VALUES("134","HONGSON","HON00001","1137 CM Recto Manila","4","","","254-9032, 254-9085","","","","120","","","10000.00","0.00","no","0.00","","","","031-103-910-198","1","no","");
INSERT INTO tblcustomer VALUES("135","HRC AUTO SUPPLY","HRC00001","51 Banaue St. Quezon City","AM","","","712-0303, 711-7021","","","","120","","","10000.00","0.00","no","0.00","","","","203-240-469-040","1","no","");
INSERT INTO tblcustomer VALUES("136","HYDROFLEX INDUSTRIAL SALES","HYD00001","2129 Ipil ST. Manila","4","","","253-0869, 256-3855","","","","120","","Nippon Iloilo","10000.00","0.00","no","0.00","","","","540-102-265-040","1","no","");
INSERT INTO tblcustomer VALUES("137","ICHIBAN","ICH00001","43 Banaue st. Quezon City","AM","","","732-1770, 732-1406","","","","90","","","10000.00","1450.00","no","0.00","","","","038-115-147-049","1","no","");
INSERT INTO tblcustomer VALUES("138","ICON","ICO00001","","PM","","","","","","","60","","same envelope as Pyracone","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("139","III AUTO WORKS AND GEN. MDSE.","III00001","970 B T. Mapua St. Naila","4","","","253-5673, 742-4228","","","","90","","ottotech","60000.00","11090.00","no","0.00","","","","188-286-786-000","3","no","");
INSERT INTO tblcustomer VALUES("140","ILOILO AUTO SUPPLY","ILO00001","Ledsma-Valeria Street,  Iloilo City","4","","","245-4681, 255-8641","","","","60","","1135 Aguilar St. Mailing Tower Room  907-908 (former address?)","1000000.00","3070.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("141","ILOILO RADIANT","ILO00002","","PROV","","","","","","","120","","","5000000.00","1346070.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("142","INFINITE MOTOR SALES INC.","INF00001","2B Agno St. Quezon City","WEEKDAY","","","741-7387, 732-5246, 743-6456","","","","120","","","10000.00","180.00","no","0.00","","","","001-027-451-000","1","no","");
INSERT INTO tblcustomer VALUES("143","INTENSE CAR ACCS.& AUTO SUPPLY","INT00001","289-F Banaue ST. cor. M. Cuenco Quezon City","WEEKDAY","","","413-6750, 731-6479","","","","120","","","10000.00","0.00","no","0.00","","","","236-342-016-000","1","no","");
INSERT INTO tblcustomer VALUES("144","MC CORD TRADING CORP.","MC 00001","201 Apo St. Alcaraz , 302 Del Monte Ave. QC","2","","JOHNNY GO KANG, STEVE CRISOLOGO","748-7355, 743-8037, 448-7355, 712-4527, 731-8192,","0917-8438037","711-5793, 743-8037","mccord@skydsl.com .ph,int_mktg","7","","Intercon","10000000.00","672080.55","no","7.00","","","","038-004-612-606","1","no","");
INSERT INTO tblcustomer VALUES("145","INTERWOVEN AUTO PARTS","INT00002","4 Caraballo St. Talayan","WEEKDAY","","","711-3578, 711-4674, 413-7869","","","","120","","","10000.00","0.00","no","0.00","","","","300-103-961-709","1","no","");
INSERT INTO tblcustomer VALUES("146","ISUZU SPECIALIST SALES INC.","ISU00001","126-128 Rizal Ave. Grace Park","2","","","362-0787, 361-4266, 362-0585","","","","120","","","1000000.00","27929.14","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("147","J. ASAHI AUTOMOTIVE","JAS00002","Banaue St. Quezon City","WEEKDAY","","","712-0234, 712-2435, 732-8893","","","","0","","","100000.00","48380.00","no","0.00","","","","117-117-766","3","no","");
INSERT INTO tblcustomer VALUES("148","JAD AUTO SUPPLY","JAD00001","2111 S. Reyes Manila","WEEKDAY","","","252-8162, 495-0606","","","","120","","","10000.00","0.00","no","0.00","","","","901-445-918","1","no","");
INSERT INTO tblcustomer VALUES("149","JAGJEKK AUTO SUPPLY","JAG00001","","PM-COD","","","","","","","7","","","1000000.00","8300.00","no","5.00","","","","175-383-146-000","1","no","");
INSERT INTO tblcustomer VALUES("150","JAPA MOTOR PARTS","JAP00001","289 G Banaue St. cor. M. Cuenco Quezon City","WEEKDAY","","","732-6454, 416-1336","","","","120","","","10000.00","0.00","no","0.00","","","","104-018-238-000","1","no","");
INSERT INTO tblcustomer VALUES("151","JAPCARS","JAP00002","","AM-COD","","","","","","","7","","sister company of New Laoag","500000.00","9310.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("152","NEW LAOAG","NEW00002","","WEEKDAY-COD","","","","","","","7","","2 T-shirt, 1 Raffle, sister company of Japcars","200000.00","60695.00","no","5.00","","","","104-023-599","1","no","");
INSERT INTO tblcustomer VALUES("153","JASRINE","JAS00001","D 112 Sumulong Highway Mayamot Antipolo City","WEEKDAY","","","250-1870","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("154","JAYTEX MKTG.","JAY00001","","2-WEEKLY","","","415-3398, 363-0336","","","","90","","same envelope as Tumitzu","10000.00","0.00","no","0.00","","","","038-119-046-189","1","no","");
INSERT INTO tblcustomer VALUES("155","JCSC","JCS00001","","4-COD","","","","","","","7","","","10000.00","580.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("156","JDN MDSG.","JDN00001","","4","","","","","","","120","","2 T-shirt","30000.00","0.00","no","0.00","","","","031-103-187-823","2","no","");
INSERT INTO tblcustomer VALUES("157","JEBY","JEB00001","","PM","","","","","","","120","","","100000.00","20630.00","no","0.00","","","","280-182-407-727","1","no","");
INSERT INTO tblcustomer VALUES("158","JEMELEE A/S","JEM00001","","3","","","","","","","120","","2 T-shirt","10000.00","0.00","no","0.00","","","","051-103-768-806","1","no","");
INSERT INTO tblcustomer VALUES("159","JES1","JES00001","","PM","","","","","","","120","","formerly jesstown, issue invoice","10000.00","4580.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("160","JETCO MOTOR PARTS","JET00001","1142 CM Recto Manila","4","","","244-7893, 244-7879","","244-7875","","120","","2 T-shirt, 1 Raffle","10000.00","250.00","no","0.00","","","","030-103-926-824","1","no","");
INSERT INTO tblcustomer VALUES("161","JJALL","JJA00001","651 Evangelista St","GENERATOR","","Chonie","","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("162","JKTS","JKT00001","G. Masangkay","4","","","","","","","90","","","50000.00","20810.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("163","JLC","JLC00001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","103-926-824-000","1","no","");
INSERT INTO tblcustomer VALUES("164","JN2","JN200001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("165","JOHN JEROME","JOH00001","","WEEKDAY","","","","","","","120","","","200000.00","136590.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("166","MR CAJIPE TRADING","JOW00001","","WEEKDAY","","","","","","","7","","","10000000.00","192494.20","no","7.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("167","JR MULTI BUSINESS RESOURCES INC.","JR 00001","Don Manuel Quezon City","PM","","Agnes","740-0445, 741-9279","","743-0269","","90","","2 T-shirt, 1 Gift B, TJM","1000000.00","343380.00","no","0.00","","","","004-817-264-000","2","no","");
INSERT INTO tblcustomer VALUES("168","JRO","JRO00001","","WEEKDAY-COD","","","","","","","7","","formerly Ellaine, NEW JIL's former worker","5000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("169","JSC KIMSTAR","JSC00001","","PROV","","","","","","","120","","","200000.00","54725.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("170","JUBILEE MDSG.","JUB00001","420 Unit 14 Whitenasco Bldg. Araneta Ave. Bgy. Dona Imelda Quezon City","2","","","7494392, 7492698","","","","90","","2 T-shirt","50000.00","30730.00","no","0.00","","","","000-408-302","2","no","");
INSERT INTO tblcustomer VALUES("171","JYRO MKTG.","JYR00001","29 Pao St. Quezon City","2","","","415-9415, 740-6678","","","","90","","2 T-shirt, 1 Raffle","30000.00","0.00","no","0.00","","","","160-966-799","2","no","");
INSERT INTO tblcustomer VALUES("172","KAH HEAVY EQUIPMENT","KAH00001","566 T. Pinpin","AM","","","242-4854, 242-4868, 242-4867","","","","120","","","10000.00","0.00","no","0.00","","","","200-080-767-000","1","no","");
INSERT INTO tblcustomer VALUES("173","KAR ASIA","KAR00001","Davao City","WEEKDAY","","","","","","","90","","2 T-shirt, 1 Raffle","25000.00","0.00","no","0.00","","","","000-075-589-000","3","no","");
INSERT INTO tblcustomer VALUES("174","KARR GLASS AUTO SAFETY GLASS","KAR00002","","PM","","","731-4617, 743-1608, 731-4869","","","","120","","","25000.00","26930.00","no","0.00","","","","204-880-772-001","3","no","");
INSERT INTO tblcustomer VALUES("175","KAT-KAR AUTO SUPPLY","KAT00001","1140 G. Masangkay St. Manila","4","","HENRY BATARAO UY","2549301, 485-9356","0920-2582767, 0922-8809085","252-1494","","120","","","10000000.00","138140.00","no","0.00","","","","102-820-284-000","3","no","");
INSERT INTO tblcustomer VALUES("176","KENRICK TRADING","KEN00001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","038-108-964-011","1","no","");
INSERT INTO tblcustomer VALUES("177","KENSCO MKTG.","KEN00002","1905 S. Reyes St.","4","","","254-0828, 254-0827, 254-0825","","","","120","","2 T-shirt","1000000.00","79825.00","no","0.00","","","","031-103-900-619","2","no","");
INSERT INTO tblcustomer VALUES("178","KEVIN AUTOMOTIVE","KEV00001","","WEEKDAY","","","7146843, 714-6855, 414-7197","","","","120","","","10000.00","0.00","no","0.00","","","","137-242-894-000","1","no","");
INSERT INTO tblcustomer VALUES("179","KEVS AUTO SUPPLY","KEV00002","6962 Washington St. Pio del Pilar Makati City","WEEKDAY","","","812-5968, 575-6577","","","","120","","","10000.00","0.00","no","0.00","","","","115-484-984-000","1","no","");
INSERT INTO tblcustomer VALUES("180","KIMRY","KIM00001","","4","","","252-1045","","","","120","","2 T-shirt, 1 Raffle, Jerry Ong","10000.00","480.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("181","KIMRICH MOTOR PARTS","KIM00002","10 Manunggal St. Kitanlad Quezon City","WEEKDAY-WED","","","7407366, 7429267","","","","90","","","50000.00","13800.00","no","0.00","","","","133-078-034-000","1","no","");
INSERT INTO tblcustomer VALUES("182","KINGSPEED","KIN00001","65 Banaue St. Quezon City","WEEKDAY","","","7120335","","","","120","","2 T-shirt, 1 Nice Calendar","50000.00","16150.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("183","KNOWN INDUSTRIES, INC.","KNO00001","","4-WEEKLY","","","","","","","75","","deducts tax, Maker, Lancom","50000.00","7260.00","no","0.00","","","","000-240-764-000, 031","1","no","");
INSERT INTO tblcustomer VALUES("184","KYL TRADING","KYL00001","24 Banaue St. Quezon City","AM","","","712-0101, 712-0092, 996-1996","","","","120","","Benison","50000.00","16580.00","no","0.00","","","","211-367-859-000","1","no","");
INSERT INTO tblcustomer VALUES("185","KYOJIN","KYO00001","508 A. Bonifacio St.","2","","Amy, Nita","3663416, 7406588, 7314683","","330-1823","","120","","","500000.00","335330.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("186","LARSEN","LAR00001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","907-775-461-000","1","no","");
INSERT INTO tblcustomer VALUES("187","LAWTON AUTO SUPPLY","LAW00001","Paco Manila","3","","","523-0768, 524-5493","","","","90","","","10000.00","0.00","no","0.00","","","","034-004-741-947","1","no","");
INSERT INTO tblcustomer VALUES("188","LDM ENTERPRISES","LDM00001","66 Banaue St. Quezon City","WEEKDAY","","","731-0667","","","","120","","","10000.00","0.00","no","0.00","","","","301-100-460-327","1","no","");
INSERT INTO tblcustomer VALUES("189","LEVIN AUTOMOTIVE","LEV00001","95-A Banaue St. Quezon City","PM-COD","","","711-4057, 711-9255","","712-3706","","7","","2 T-shirt, 1 Ham, 1 Gift, 1 Raffle","10000000.00","334887.00","no","10.00","","","","038-103-976-339","2","no","");
INSERT INTO tblcustomer VALUES("190","LEYMAN'S TRADING","LEY00001","1045 P. Gil","WEEKDAY","","","521-7846, 525-3378","","","","120","","","10000.00","0.00","no","0.00","","","","110-512-959-000","1","no","");
INSERT INTO tblcustomer VALUES("191","LIGHT OF GLORY TAXI SERVICES","LIG00001","Iloilo City","PROV","","","033-336-0693","","","","0","","COD Net bank to bank","500000.00","321720.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("192","LOADSTAR","LOA00001","","PM-COD","","","4163912, 7492817","","","","7","","2 T-shirt, sister company of Mit-toyo","30000.00","10453.20","no","7.00","","","","004-838-561-000","1","no","");
INSERT INTO tblcustomer VALUES("193","LUCID","LUC00001","","WEEKDAY-WED","","","","","","","120","","sister company of New Seyken","30000.00","29940.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("194","LUCKY 2 MOTOR PARTS","LUC00002","59 Banaue St. Quezon City","AM","","LEONCIO","7117949, 7121102, 711-4044, 711-3991","0920-8546112 (NESTOR), 0915-8216583 (LENIE)","742-6192","luckytwomotorparts@yahoo.com","120","","2 T-shirt, 1 Gift B, 0908-9040754 (Gina), 0919-6133802 (Gary)","5000000.00","340515.00","no","0.00","","","","104-020-265","1","no","");
INSERT INTO tblcustomer VALUES("195","LUCKY GOLD AUTO SUPPLY","LUC00003","Taft Ave. Pasay City","3","","","831-8467, 832-5657, 833-8696","","","","90","","","10000.00","0.00","no","0.00","","","","510-103-171-973","1","no","");
INSERT INTO tblcustomer VALUES("196","LUCKY J SURPLUS CENTER","LUC00004","643 Araneta Ave. cor. Kitanlad Quezon City","AM","","","712-0025, 712-0028","","741-5616","","120","","","10000.00","14380.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("197","LV TRADING","LV 00001","1204 La Torre near Chang Kai","4","","","252-0538, 252-0541","","","","90","","","150000.00","9630.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("198","LVC MOTOR PARTS","LVC00001","397 Banaue St. Quezon City","PM","","","7437558, 743-7557, 712-9722","","","","120","","2 T-shirt","1000000.00","31750.00","no","0.00","","","","038-119-691-806","1","no","");
INSERT INTO tblcustomer VALUES("199","LIONG MEI GENERATION CORP.","LY 00001","1202-06 CM Recto Ave. Manila","4","","MANAGER: ANGELO. SALESMAN: ROMY, SANDY, MIKE, CHRI","244-7861, 244-9905, 482-0866, 244-7680, 245-5198","","244-7775","lyas_1202@yahoo.com","7","","3 T-shirt, 1 Gift B, 1 Raffle. SALES LADY: TONET. PURCHASER: RON","10000000.00","138241.00","no","8.00","","","","103-920-220-000","2","no","");
INSERT INTO tblcustomer VALUES("200","M. AROTA","M. 00001","","WEEKDAY","","","","","","","0","","","5000.00","0.00","no","0.00","","","","155-006-493-000","3","no","");
INSERT INTO tblcustomer VALUES("201","M. DE LUNA","M. 00002","","WEEKDAY","","","455-2937, 455-8970","","","","120","","","200000.00","49300.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("202","M-1","M-100001","Agno St. Quezon City","PM","","","712-7210, 416-3115, 416-6518","","","","7","","M-10","10000000.00","32339.50","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("203","MADISON AUTO PERFORMANCE","MAD00001","Banaue St. Quezon City","WEEKDAY-TUES","","","7135006, 712-1009, 732-8630, 7321963","","","","120","","2 T-shirt, collection 3rd week of the month. Araneta: 715-9683, 716-6524","5000000.00","588819.00","no","0.00","","","","104-006-506","1","no","");
INSERT INTO tblcustomer VALUES("204","MAGNETIC AUTO SUPPLY/ FINNALD'S A/S","MAG00001","OLD ANTIPOLO corner MAKATA ST.","4-WEEKLY","","","254-2206","","","","90","","2 T-shirt","3000000.00","432269.00","no","0.00","","","","000-329-232","1","no","");
INSERT INTO tblcustomer VALUES("205","MANHATTAN AUTO SUPPLY","MAN00001","1017 Benavidez St. Manila","4","","","244-1932, 244-1936","","","","120","","2+1 (Cora) T-shirt","6000000.00","91610.00","no","0.00","","","","103-910-741-000","1","no","");
INSERT INTO tblcustomer VALUES("206","MANTA INDUSTRIAL","MAN00002","1111 G. Masangkay St. Manila","4","","","254-8542","","","","120","","","10000.00","0.00","no","0.00","","","","031-003-901-153","1","no","");
INSERT INTO tblcustomer VALUES("207","MARANT DISTRIBUTOR","MAR00001","","2","","","","","","","120","","","10000.00","2140.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("208","MARCO MOTOR SALES","MAR00002","3231 C Zapote Manila","3","","ZALDY/MARLON","8901749, 896-7655, 896-7637","","","","120","","2 T-shirt, 1 Raffle","100000.00","26990.00","no","0.00","","","","049-100-208-868","3","no","");
INSERT INTO tblcustomer VALUES("209","MARQZ AUTO SUPPLY","MAR00003","","PM","","","","","","","90","","1 T-shirt","10000.00","0.00","no","0.00","","","","004-813-655-000","1","no","");
INSERT INTO tblcustomer VALUES("210","MATSUBA SALES CENTER","MAT00001","","PM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","038-000-377-190","1","no","");
INSERT INTO tblcustomer VALUES("211","MAXIMUS AUTO SUPPLY INC.","MAX00001","","PM","","","","","","","90","","2 T-shirt","10000.00","0.00","no","0.00","","","","208-023-665-000","1","no","");
INSERT INTO tblcustomer VALUES("212","MAZFORD PARTS","MAZ00001","69 Banawe cor Kabignayan St","PM-COD","","","7320395, 7407671","","","","7","","","30000.00","3800.00","no","7.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("213","MC ARTHUR AUTO SUPPLY","MC 00002","","2","","","","","","","90","","","10000.00","0.00","no","0.00","","","","200-443-844-000","1","no","");
INSERT INTO tblcustomer VALUES("214","MEGA LUCK CAR ACCESSORIES","MEG00001","Banawe Street  or # 5 Kabignayan St. QC","WEEKDAY-THURS","","","","","","","90","","2 T-shirt, 1 Raffle","10000000.00","1318160.00","no","0.00","","","","210-392-490-000","1","no","");
INSERT INTO tblcustomer VALUES("215","MEGASON TRADING","MEG00002","1757 Dimasalang St.","2","","","781-7712","","","","120","","","30000.00","0.00","no","0.00","","","","115-152-151-001","1","no","");
INSERT INTO tblcustomer VALUES("216","MERIT MKTG.","MER00001","MALABON","2","","","447-1511, 287-8741","","","","120","","2 T-shirt","30000.00","0.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("217","METRO MARIWASA ENTS.","MET00001","","AM","","","","","","","90","","","500000.00","55660.00","no","0.00","","","","101-335-398","1","no","");
INSERT INTO tblcustomer VALUES("218","METRO PARTS","MET00002","Paterno St. Quezon City","AM-COD","","","448-5332","","","","7","","c/o Toyocars","10000000.00","283506.00","no","10.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("219","NEW METROSTAR AUTO SUPPLY","MET00003","1013 A. Bonifacio Ave. , Brgy Balingasa, Caloocan City","2","","","2919999, 432-1185, 365-4434, 364-6974, 416-1111","","","","120","","M-11, ARJ","10000000.00","496150.00","no","0.00","","","","007-816-593-000","2","no","");
INSERT INTO tblcustomer VALUES("220","MG7 A/P","MG700001","","PM-COD","","","","","","","7","","","500000.00","41520.40","no","7.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("221","MINTEX MKTG.","MIN00001","","2","","","","","","","120","","","10000.00","0.00","no","0.00","","","","104-006-339","1","no","");
INSERT INTO tblcustomer VALUES("222","MITPARTS CORP.","MIT00001","183 Banaue St. cor. Agno St. Quezon City","PM-COD","","","711-2911, 743-8289, 7436640","0915-6705310","","mit_parts@yahoo.com","7","","2 T-shirt","1000000.00","34291.20","no","7.00","","","","003-297-371","1","no","");
INSERT INTO tblcustomer VALUES("223","MITSUI","MIT00002","","2","","","9831111 BHEL, 3646974, 983-1111","","","","120","","","100000.00","31970.00","no","0.00","","","","232-937-432-000","2","no","");
INSERT INTO tblcustomer VALUES("224","MIT-TOYO","MIT00003","","PM-COD","","","416-7718, 7437642","","","","7","","sister company of Loadstar","1000000.00","32590.00","no","7.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("225","MIYACO AUTO SUPPLY","MIY00001","","PROV","","","","","","","120","","1 Gift B","5000.00","11200.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("226","MJSP TRADING","MJS00001","","3","","","","","","","90","","3 T-shirt, 1 Calendar","1000000.00","24850.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("227","MOMYX TRADING","MOM00001","926 Sisa Street Sampaloc","WEEKDAY","","","740-7473","","","","90","","","10000.00","1100.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("228","MORNING GLORY AUTO SUPPLY/PARTNERS","MOR00001","15 Banaue St. Quezon City","AM-WEEKLY","","SALLY A. GELLEGANI","743-7607, 572-8526","0922-8563742, 0927-7877117","","","90","","(assoc. w/ Partners)","200000000.00","222060.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("229","MOTOR1ONE AUTO PARTS CORP.","MOT00001","53 B Banawe St., QC","PM","","","781-0450, 711-0366, 781-0424","","","","120","","Motorline","50000.00","8680.00","no","0.00","","","","104-008-808","1","no","");
INSERT INTO tblcustomer VALUES("230","MOTORIST AUTO SUPPLY","MOT00002","","PM","","","","","","","120","","2 T-shirt","1000000.00","2390.00","no","0.00","","","","000-387-271","1","no","");
INSERT INTO tblcustomer VALUES("231","MOTORIX AUTO SUPPLY","MOT00003","68 Banaue St. Quezon City","AM","","","712-1074, 712-1087","","","","120","","2 T-shirt","600000.00","22370.00","no","0.00","","","","039-104-008-808","1","no","");
INSERT INTO tblcustomer VALUES("232","MOTORMASTER INC.","MOT00004","1277 CM Recto Ave. Manila","4","","","254-8707, 254-9225, 254-8761, 254-9728","","","","120","","2 T-shirt , 254-9164, 254-9226","500000.00","5120.00","no","0.00","","","","031-000-311-458","1","no","");
INSERT INTO tblcustomer VALUES("233","MTBG PARTS","MTB00001","","AM-COD","","","","","","","7","","COD","10000.00","600.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("234","MULTILINE AUTO PARTS CORP.","MUL00001","","PM","","","","","","","90","","2 T-shirt","10000.00","0.00","no","0.00","","","","004-836-653","1","no","");
INSERT INTO tblcustomer VALUES("235","MULTILINK PARTS CENTER","MUL00002","2742 Taft Ave. Pasay City","3","","","831-1136, 831-9142, 831-2949","","","","120","","2 T-shirt, 1 Gift B","10000000.00","79037.00","no","0.00","","","","180-805-754-000","1","no","");
INSERT INTO tblcustomer VALUES("236","MULTIMOTORS A/P INC.","MUL00003","46 Banawe St QC","PM","","","741-1118, 741-1116, 712-1361, 711-0333","","","","90","","","30000.00","6820.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("237","MULTIPARTS BOY","MUL00004","Banaue St.","PM","","","732-4216, 731-9344","","","","120","","","10000.00","2950.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("238","NAN KAI AUTO SUPPLY","NAN00001","37M Banaue St. Quezon City","PM","","","742-7827, 732-3542","","","","120","","","10000.00","0.00","no","0.00","","","","380-000-087-883","1","no","");
INSERT INTO tblcustomer VALUES("239","CAR WEALTH MDSG.(NEW ALPHA)","NEW00003","44 Banaue St. Quezon City","AM","","","7319559, 741-7676, 711-0699","","","","120","","2 T-shirt","300000.00","35120.00","no","0.00","","","","133-704-152","1","no","");
INSERT INTO tblcustomer VALUES("240","NEW BANAWE AUTO SUPPLY","NEW00004","22 Banaue St. Quezon City","AM","","REGINALD TANTO","712-0115, 712-0124","","749-9762","","120","","1 T-shirt, 1 Gift C","10000000.00","477880.00","no","0.00","","","","901-256-028-000","1","no","");
INSERT INTO tblcustomer VALUES("241","NEW EL BURGOS","NEW00005","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","005-459-810-000","1","no","");
INSERT INTO tblcustomer VALUES("242","NEW FORDMASTER AUTO PARTS","NEW00006","61 Banaue St. near Kabignayan St. Quezon City","AM","","JENNY, NANCY, JOSE","744-8960, 712-0337, 742-7224","0929-6666505","","","120","","2 T-shirt","20000.00","3920.00","no","0.00","","","","003-959-743-000","1","no","");
INSERT INTO tblcustomer VALUES("243","NEW JIL MOTOR PARTS","NEW00007","13 Banaue St. Quezon City","AM-WEEKLY","","EDWARD","712-0004, 732-1263, 732-3491","","","","90","","2 T-shirt, 1 Raffle","200000000.00","762844.00","no","0.00","","","","103-989-181-000","1","no","");
INSERT INTO tblcustomer VALUES("244","NEW JOHNSON","NEW00008","G. Masangkay St. Manila","4","","","244-9720, 244-2274, 244-7767","","","","120","","","10000.00","0.00","no","0.00","","","","030-327-885-000","1","no","");
INSERT INTO tblcustomer VALUES("245","NEW JOLEN AUTO SUPPLY","NEW00009","84-A Mc Arthur Valenzuela City","2","","","291-2469","","","","90","","","10000.00","500.00","no","0.00","","","","100-999-902-000","1","no","");
INSERT INTO tblcustomer VALUES("246","NEW MILLION DOLLAR","NEW00010","84-C Mc Arthur Marulas Valenzuela","2","","","291-8433, 444-8632, 443-3021, 444-3754","","","","120","","2 T-shirt","10000000.00","244511.00","no","0.00","","","","173-178-537-000","1","no","");
INSERT INTO tblcustomer VALUES("247","NEW OK CAR ACCESSORIES","NEW00011","","PM","","","7120315","","","","120","","2 T-shirt, 1 Raffle","10000000.00","33340.00","no","0.00","","","","103-989-296-000","1","no","");
INSERT INTO tblcustomer VALUES("248","NEW SEYKEN MOTOR PARTS","NEW00012","80 Banaue St. Quezon City","WEEKDAY-WED","","","712-0823, 712-9520","","","","120","","3 T-shirt, 1 Gift B, 1 Raffle, sister company Lucid","10000000.00","911385.00","no","0.00","","","","111-372-180-000","1","no","");
INSERT INTO tblcustomer VALUES("249","NEW WILCO MOTOR SALES","NEW00013","","AM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","1259-C-1184-A-4","1","no","");
INSERT INTO tblcustomer VALUES("250","NEW YUSON","NEW00014","","WEEKDAY","","Wilma","5416786, 820-2371, 820-2586","","","","90","","MSYU Trading: 521-6008, 524-5567 MSYU: 901444577000","10000.00","1890.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("251","F&P COMMERCIAL","F&P00001","314 Lara St. Manila","4","","FRANCO","242-8761, 242-7752, 242-5778","","","","90","","Newland, 2 T-shirt, 1 Gift","1500000.00","300071.00","no","0.00","","","","103-893-925-000","1","no","");
INSERT INTO tblcustomer VALUES("252","NEWMAN AUTO SUPPLY","NEW00015","235 Mc Arthur Hiway Valenzuela","2","","","4448236, 2915214, 2922048","","","","120","","2 T-shirt, 1 Gift B","5000000.00","176629.00","no","0.00","","","","024-199-134-654","1","no","");
INSERT INTO tblcustomer VALUES("253","NFH","NFH00001","Dagat Dagatan","WEEKDAY","","","","","","","120","","Nathaniel Uy","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("254","NICK LAUS","NIC00001","1195 Malabon St., Cor Mendoza","WEEKDAY","","","7118414","","","","120","","","100000.00","67820.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("255","NICKEL","NIC00002","2324 S. Reyes Sta. Cruz Manila","4","","","365-4459, 365-4458","","364-2329","","120","","","400000.00","55270.00","no","0.00","","","","031-003-978-593","1","no","");
INSERT INTO tblcustomer VALUES("256","NIPPON ILOILO","NIP00001","2129 Ipil St. Manila","4","","","256-3855, 253-0869, 256-7985","","","","120","","","10000.00","0.00","no","0.00","","","","102-265-040-000","1","no","");
INSERT INTO tblcustomer VALUES("257","NISMAN COMMERCIAL","NIS00001","1042 G. Masangkay St. Manila","4","","","244-7825, 244-7794, 244-7763","","","","120","","2 T-shirt","10000.00","750.00","no","0.00","","","","126-426-934-000","1","no","");
INSERT INTO tblcustomer VALUES("258","NISPARTS CENTER","NIS00002","Banaue St. Quezon City","PM-COD","","","712-8021, 712-8028","","","","7","","","20000.00","1900.00","no","0.00","","","","216-268-569-000","1","no","");
INSERT INTO tblcustomer VALUES("259","NISSAN PARTS CENTER","NIS00003","235 Banaue St. Quezon City","PM","","","732-0458, 732-0450, 732-2695","","","","120","","","10000.00","0.00","no","0.00","","","","390-103-969-320","1","no","");
INSERT INTO tblcustomer VALUES("260","NISSAN TRADING","NIS00004","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","103-886-919","1","no","");
INSERT INTO tblcustomer VALUES("261","NITSUGA AUTO SUPPLY","NIT00001","","PM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","000-398-442-000","1","no","");
INSERT INTO tblcustomer VALUES("262","OLYMPIC AUTOMOTIVE CENTER CO.","OLY00001","2533 Taft Ave. Pasay City","3","","","831-8036, 831-3712, 831-1497","","831-3712","","90","","2 T-shirt, 1 Gift B","2000000.00","291525.00","no","0.00","","","","005-061-392-956","1","no","");
INSERT INTO tblcustomer VALUES("263","OMM DIESEL","OMM00001","696 Evangelista St cor Porv","GENERATOR","","","7341748","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("264","NEW OT AUTO SUPPLY","OT 00001","Quezon Ave. Quezon City","2-COD","","","712-2198","","","","7","","3 T-shirt (2 Boy), 2 Calendar Boy (Yours Trading)","50000.00","22453.50","no","5.00","","","","000-392-956","3","no","");
INSERT INTO tblcustomer VALUES("265","PACIFIC PARTS CORP.","PAC00001","1171 J. Abad Santos Manila","4","","","253-3456, 253-0364, 252-1181","","","","120","","2 T-shirt","500000.00","0.00","no","0.00","","","","029-300-330-523","1","no","");
INSERT INTO tblcustomer VALUES("266","PARKLAND MOTOR PARTS","PAR00001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","003-506-882-000","1","no","");
INSERT INTO tblcustomer VALUES("267","XXX PARTNERS","PAR00002","47 Bokawkan Rd. Baguio City","AM-WEEKLY","","Sally","7113991","","","","90","","2+1 (Sally) T-shirt, 1 Gift Sally","300000.00","168575.00","no","0.00","","","","159-092-008","1","no","");
INSERT INTO tblcustomer VALUES("268","PARTSLINK","PAR00003","CM Recto Manila","4","","","243-7240, 245-9628","","","","120","","","50000.00","10800.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("269","PARTSTAR AUTOMOTIVE INC.","PAR00004","2762 Taft Ave. Pasay City","3","","","834-8074, 556-7091, 556-3824, 511-0446/47","0922-8997654","831-9382","www.partstar.com.ph","120","","2 T-shirt, 1 Gift B     , 831-9383","30000.00","5870.00","no","0.00","","","","909-336-605-000","1","no","");
INSERT INTO tblcustomer VALUES("270","PAULYN","PAU00001","","WEEKDAY-COD","","","","","","","0","","\","100000.00","19156.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("271","PEONY","PEO00001","P. Noval Manila","4","","","","","","","120","","","70000.00","31097.10","no","7.00","","","","103-901-522-000","2","no","");
INSERT INTO tblcustomer VALUES("272","PEPE AUTO SUPPLY","PEP00001","1024 G. Masangkay St. Manila","4","","","244-1817, 244-6931, 244-6139, 381-7596","0917-8960918, 0922-4840059","244-6532","","120","","2 T-shirt, 1 Raffle, has own counter","8000000.00","476120.00","no","0.00","","","","115-153-459-000","1","no","");
INSERT INTO tblcustomer VALUES("273","PHILBEST","PHI00001","G. Araneta Ave. Quezon City","WEEKDAY-THURS","","","7166546, 448-5262, 7166560","","","","90","","","10000000.00","51040.00","no","0.00","","","","242-666-047-000","1","no","");
INSERT INTO tblcustomer VALUES("274","PIONEER INTERTRADE","PIO00001","","4","","","","","","","120","","","10000.00","0.00","no","0.00","","","","029-103-920-999","1","no","");
INSERT INTO tblcustomer VALUES("275","PRESTO MOTOR PARTS","PRE00001","","PM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","039-007-505","1","no","");
INSERT INTO tblcustomer VALUES("276","PRIME AUTOMOTIVE","PRI00001","","3","","","","","","","120","","","10000.00","0.00","no","0.00","","","","190-353-000","1","no","");
INSERT INTO tblcustomer VALUES("277","PROLUCK","PRO00001","C-3 Caloocan","2","","","","","","","90","","","10000.00","39400.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("278","DRAGSTRIP AUTO PARTS & SUPPLY  (PROSTREET)","PRO00002","41-B Agustin Banaue cor. Kaliraya Quezon City","PM-WEEKLY","","","743-3216, 743-3210","","743-7608","","120","","same envelope as Exceed","250000.00","51470.00","no","0.00","","","","306-272-904-000","1","no","");
INSERT INTO tblcustomer VALUES("279","PROTECT AUTO SUPPLY","PRO00003","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","163-369-325","1","no","");
INSERT INTO tblcustomer VALUES("280","PYRACONES MKTG.","PYR00001","50A Kaliraya St. Quezon City","PM","","","712-2991, 7423-9194, 413-6007","","","","60","","same envelope with Icon","10000.00","0.00","no","0.00","","","","183-470-442-000","1","no","");
INSERT INTO tblcustomer VALUES("281","QC TOYORAMA MOTOR CORP.","QC 00001","28 Banaue St. Quezon City","AM-COD","","MIKE CHUA","712-0105, 712-0016, 731-9999","","","","7","","","1000000.00","100240.50","no","10.00","","","","039-000-388-579","1","no","");
INSERT INTO tblcustomer VALUES("282","QUEZON DIESEL","QUE00001","","4","","","","","","","120","","","10000.00","1600.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("283","RAINA COMMERCIAL","RAI00001","1046 Benavidez St. Manila","4","","LORETO TAN","244-8162, 254-8550","","244-8149","","120","","2 T-shirt","50000000.00","51950.00","no","0.00","","","","103-930-005-000","1","no","");
INSERT INTO tblcustomer VALUES("284","RAJ HIGH SERIES / MAME","RAJ00001","573 Lim Bldg, J-A Laurel Av","PROV","","","","","","","120","","","5000.00","30080.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("285","RAM DIESEL PARTS CENTER","RAM00001","17-18 Teodor St. cor. 4th Ave. Caloocan City","2","","","3617549, 3616831, 3659373 TO 75","","","","120","","2 T-shirt","5000000.00","543190.00","no","0.00","","","","027-000-301-703","1","no","");
INSERT INTO tblcustomer VALUES("286","RANDOM","RAN00001","47 Scout Torillo","WEEKDAY","","","4124073","","","","90","","same envelope with Bas","5000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("287","RBM AUTO SUPPLY","RBM00001","2748 Taft Ave. Pasay City","3","","","831-4892, 834-2258","0916-3882740","831-4907","","120","","2 T-shirt, 1 Raffle","10000.00","0.00","no","0.00","","","","330-103-773-896","1","no","");
INSERT INTO tblcustomer VALUES("288","RDD AUTO GLASS","RDD00001","A. Bonifacio Ave. Caloocan City","2","","","583-0200, 350-7391, 367-4996","","","","120","","2 T-shirt","10000000.00","36905.00","no","0.00","","","","000-373-88NV","2","no","");
INSERT INTO tblcustomer VALUES("289","RE AUTO SUPPLY","RE 00001","No. 39 D. Aquino Caloocan City","2","","","366-5253, 362-2313 C-3: 287-9267","","362-5252","","30","","2 T-shirt, 1 Gift","1000000.00","307840.00","no","0.00","","","","906-038-702-000","1","no","");
INSERT INTO tblcustomer VALUES("290","REY SANTIAGO","REY00001","","WEEKDAY","","","235-4569, 440-6293, 381-6757","","","","120","","","200000.00","37049.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("291","RHINO AUTO SUPPLY","RHI00001","","PM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","028-108-094-410","1","no","");
INSERT INTO tblcustomer VALUES("292","RICHCAR","RIC00001","34-G Banaue St. Quezon City","PM","","","732-3798, 712-3680","","","","120","","","10000.00","0.00","no","0.00","","","","167-998-773-000","1","no","");
INSERT INTO tblcustomer VALUES("293","RICHKON MKTG.","RIC00002","24  Violeta St. Roxas District Quezon City","2","","NOLI RODRIGUEZ","4108062","","410-8062","","120","","IGT MKTG.","200000.00","22530.00","no","0.00","","","","245-621-524-000","1","no","");
INSERT INTO tblcustomer VALUES("294","RICHLAND AUTO SUPPLY","RIC00003","940 G. Masangkay St. Manila","4","","","244-0181, 244-8740","","","","120","","","10000.00","7400.00","no","0.00","","","","103-902-548","1","no","");
INSERT INTO tblcustomer VALUES("295","RICHMASTER GEN. MDSG.","RIC00004","42-F Roosevelt Ave. Quezon City","2","","","929-1118, 374-3883","","","","120","","","10000.00","4180.00","no","0.00","","","","038-103-961-477","1","no","");
INSERT INTO tblcustomer VALUES("296","RICHMOND AUTO CENTER","RIC00005","","2","","","252-1229, 252-1225","","","","120","","","10000.00","0.00","no","0.00","","","","202-639-726-000","1","no","");
INSERT INTO tblcustomer VALUES("297","RMJ GEN. MSDG.","RMJ00001","","4","","","","","","","120","","2 T-shirt","10000.00","0.00","no","0.00","","","","030-103-915-385","1","no","");
INSERT INTO tblcustomer VALUES("298","ROAD SUN AUTO SUPPLY","ROA00001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","189-019-972-000","1","no","");
INSERT INTO tblcustomer VALUES("299","ROBENSAN TRADING","ROB00001","1941 S. Reyes St. Manila","2","","","254-0816, 254-0813","","253-1528","","120","","","10000.00","0.00","no","0.00","","","","106-380-864-000","1","no","");
INSERT INTO tblcustomer VALUES("300","ROCKY AUTO SUPPLY","ROC00001","","PM","","","414-0327","","","","90","","Adventure","150000.00","19334.00","no","0.00","","","","103-961-235","1","no","");
INSERT INTO tblcustomer VALUES("301","ROLDAN GEN MSDG.","ROL00001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","170-711-446-000","1","no","");
INSERT INTO tblcustomer VALUES("302","ROLLMARK, ROLMAN","ROL00002","","3-COD","","","498-1610, 302-5146","","","","0","","","0.00","32800.00","no","0.00","","","","206-028-332-000","3","no","");
INSERT INTO tblcustomer VALUES("303","ROLLWAY","ROL00003","1124 G. Masangkay St. Manila","4","","","254-8554, 254-3070","","254-3070","","120","","","10000.00","8800.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("304","ROXAS SURPLUS","ROX00001","","PROV","","RAUL","036-6213567","0917-3121739","0366215208","","0","","","1000000.00","314955.10","no","3.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("305","RP LAGUNA","RP 00001","","WEEKDAY","","","","","","","0","","","0.00","0.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("306","RR&J AUTO SUPPLY","RRJ00001","52 4th Ave. Caloocan City","2","","","363-1264, 363-7042, 365-6595","","365-3806","","120","","2 T-shirt, 1 Gift B","10000000.00","897250.00","no","0.00","","","","205-820-721-000","1","no","");
INSERT INTO tblcustomer VALUES("307","R-ZEL MOTOR PARTS","R-Z00001","216 Banaue St. Quezon City","PM-COD","","","411-5671, 410-8744","","","","7","","COD","10000.00","0.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("308","SAFETY SALES CENTER","SAF00001","500 A. Bonifacio Avenue","2","","","363-0832, 363-0833","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("309","SEIWA AUTOMOTIVE","SEI00001","37-G Banaue St. Quezon City","PM","","","732-7554, 732-5706, 732-5308","","","","120","","1 Gift C","100000.00","12715.00","no","0.00","","","","104-027-462-000","1","no","");
INSERT INTO tblcustomer VALUES("310","SHAKRA","SHA00001","48 Kaliraya St. Quezon CIty","PM-COD","","742-4162, 740-9320, 468-7548","","0927-3523270","","","90","","same envelope as Type Z, MG7 A/P COD NET 2 MONTHS","500000.00","17830.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("311","SHARE MOTOR SALES","SHA00002","14 Banaue St. Quezon City","AM","","","711-4101, 712-0008, 732-3998","","","","120","","2 T-shirt, 1 Ham, 1 Gift A, 1 Raffle","1000000.00","196340.00","no","0.00","","","","104-007-539","1","no","");
INSERT INTO tblcustomer VALUES("312","SHOCKLINE SALES INC.","SHO00001","","AM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","005-616-748","1","no","");
INSERT INTO tblcustomer VALUES("313","SILVER ACE TRADING","SIL00001","","PM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","300-103-993-986","1","no","");
INSERT INTO tblcustomer VALUES("314","SIMCO TRADERS","SIM00001","41 Sto. Tomas St. Quezon City","2","","","712-1025, 414-2253","","","","120","","","10000.00","0.00","no","0.00","","","","000-320-291-000","1","no","");
INSERT INTO tblcustomer VALUES("315","SIMPLEX PASAY","SIM00002","2742 B Taft Ave. Manila","3","","JERRY LO","832-0868, 511-0374, 511-0375, 831-3610","","812-9289","","120","","2 T-shirt","250000.00","46700.00","no","0.00","","","","103-770-702-000","1","no","");
INSERT INTO tblcustomer VALUES("316","SORGA GEN. MDSG.","SOR00001","","PM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","380-131-812-377","1","no","");
INSERT INTO tblcustomer VALUES("317","SOUTH ROW","SOU00001","JCO Bldg. Apt. C. cor. Abad Santos Street","3","","","541-5750","","","","120","","","10000000.00","50698.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("318","SOUTHSTAR AUTOMOTIVE SALES","SOU00002","Cavite City","3-COD","","CLARA","489-7129","0917-5021847","046-4173048","","7","","2 T-shirt","150000.00","60061.00","no","10.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("319","SP INT'L SALES INC.","SP 00001","76-C Kitanlad St. Quezon City","AM","","Joue Sio","7120084, 7324339","","732-1499","","90","","ACCESSORIES SHOWROOM: DIAMOND MOTOR CORP. ORTIGAS AVE. cor. Roosevelt St. San Juan M.Manila TEL: 727-0351, loc 246 Direct Line: 723-1286","40000.00","2545.00","no","0.00","","","","000-388-714-000","1","no","");
INSERT INTO tblcustomer VALUES("320","SPACETECH CAR ACCESSORIES","SPA00001","No. 20 Banaue St. Banaue Bldg. Quezon City","AM","","BILLIE TIU CHUA","711-0131","","","","120","","2 T-shirt","300000.00","102077.00","no","0.00","","","","204-131-439","1","no","");
INSERT INTO tblcustomer VALUES("321","SPRINT AUTO SUPPLY","SPR00001","191 Banaue St. Quezon City","PM-COD","","","7113535, 7122993, 732-4867, 743-8286/90","","","","7","","2 T-shirt, same envelope as CKD","30000.00","3610.00","no","7.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("322","SQUARE MOTOR SALES","SQU00001","2820 Taft aVe. Pasay City","3","","","831-2697, 831-9514, 833-4679","","","","120","","","10000.00","1380.00","no","0.00","","","","029-000-325-190","1","no","");
INSERT INTO tblcustomer VALUES("323","SR-3 AUTO SUPPLY","SR-00001","2260 T. Mapua St. Manila","4-WEEKLY","","","253-1201","","","","90","","2 T-shirt, formerly SRJ","10000000.00","319260.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("324","ST. MARK AUTO SUPPLY","ST.00001","Roosevelt Ave. Quezon City","2-WEEKLY","","","371-5439","","","","120","","counter needed","1300000.00","23575.00","no","0.00","","","","038-118-208-671","1","no","");
INSERT INTO tblcustomer VALUES("325","STABILITY AUTO SUPPLY","STA00001","7P Sorsogon St.","WEEKDAY","","","374-6963","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("326","STANLEY-JAPAN SURPLUS PARTS, INC.","STA00002","","PM-COD","","711-0211, 743-3150","","","","","7","","2 T-shirt","1500000.00","34059.70","no","7.00","","","","004-616-748","1","no","");
INSERT INTO tblcustomer VALUES("327","STREAMLINE MOTOR PARTS AND INDUSTRIAL SALES","STR00001","2315 Taft Ave. Pasay City","3","","","831-5716, 831-2576","","","","120","","2 T-shirt, 1 Ham","200000.00","36680.00","no","0.00","","","","051-103-767-640","1","no","");
INSERT INTO tblcustomer VALUES("328","STREET TECH CAR ACCESSORIES","STR00002","35-K Banaue St. Quezon City","WEEKDAY-TUES","","","4125307","","","","120","","","500000.00","91320.00","no","0.00","","","","159-799-277-000","1","no","");
INSERT INTO tblcustomer VALUES("329","SUMMIT MOTOR WORKS","SUM00001","4748 Valenzuela St. Bacood Sta. Mesa","3","","SAMMY CHUA","713-9017, 715-5126","","","","90","","same envelope as Edsa Car","5000.00","1000.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("330","SUNLY MOTOR PARTS","SUN00001","1570 Anacleto St. Manila","4","","","254-1930, 254-1864","","","","120","","2 T-shirt","100000.00","5100.00","no","0.00","","","","103-910-913-000","1","no","");
INSERT INTO tblcustomer VALUES("331","SUNOCO MOTOR SALES","SUN00002","95-D Banaue St. Quezon City","PM","","","711-3616, 711-3606","","","","120","","2 T-shirt, 1 Gift C","10000.00","0.00","no","0.00","","","","038-103-976-628","1","no","");
INSERT INTO tblcustomer VALUES("332","SUNRISER AUTO PARTS, INC.","SUN00003","158 Banaue St. cor. Kaliraya St. QC","PM-COD","","LECK","741-4656, 712-7809, 416-0684","","","","7","","same envelope as MR 2","50000.00","44109.50","no","7.00","","","","242-356-780-000","1","no","");
INSERT INTO tblcustomer VALUES("333","MR-2 MOTOR PARTS AND SERVICES","MR-00001","","PM-COD","","","","","","","7","","2 T-shirt, same envelope as Sunriser","10000.00","0.00","no","7.00","","","","301-000-398-419","1","no","");
INSERT INTO tblcustomer VALUES("334","SURE AUTO SUPPLY","SUR00001","2750 Taft Ave. Pasay City","3","","","831-9402, 833-6395","","831-1777","","90","","2 T-shirt","200000.00","35570.00","no","0.00","","","","103-766-821-000","1","no","");
INSERT INTO tblcustomer VALUES("335","SVK MKTG.","SVK00001","Blk 4 Lot 6 PIna Santol Subd. Sta. Mesa","3-COD","","","713-6288, 713-6204","","780-9762","","30","","2 T-shirt, 1 Gift","300000.00","136740.00","no","10.00","","","","032-104-011-168","2","no","");
INSERT INTO tblcustomer VALUES("336","TAIHO MOTOR PARTS","TAI00001","","PM","","","","","","","90","","2 T-shirt, 1 Gift","10000.00","0.00","no","0.00","","","","038-103-978-996","1","no","");
INSERT INTO tblcustomer VALUES("337","TAURUS","TAU00001","","PM","","","","","","","120","","","10000.00","0.00","no","0.00","","","","048-104-122-736","1","no","");
INSERT INTO tblcustomer VALUES("338","TEXACO","TEX00001","Caloocan City","2","","","363-6913","","","","120","","T-5","500000.00","13470.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("339","THK MOTOR PARTS","THK00001","No. 18 Banaue St. Quezon City","AM","","Emily, Lita","7320390, 7321374","","712-0113","","120","","","1000000.00","71555.00","no","0.00","","","","104-006-427","1","no","");
INSERT INTO tblcustomer VALUES("340","TOPS AUTO SUPPLY","TOP00001","","3","","","","","","","120","","2 T-shirt","10000.00","0.00","no","0.00","","","","004-676-708","1","no","");
INSERT INTO tblcustomer VALUES("341","TOYOCARS MOTOR PARTS CORP.","TOY00001","26 Banaue St. Quezon City","AM-COD","","FERNANDO PANUGAYAN","731-7523, 740-5450, 712-0030, 742-6300","","4134879","toyo_car@yahoo.com","7","","3 T-shirt","300000.00","214338.50","no","10.00","","","","107-982-028-000","1","no","");
INSERT INTO tblcustomer VALUES("342","TOYOHASHI MOTOR PARTS","TOY00002","","AM","","","","","","","120","","2 T-shirt","10000.00","0.00","no","0.00","","","","116-202-058-000","1","no","");
INSERT INTO tblcustomer VALUES("343","TOYOSCO AUTO SUPPLY","TOY00003","815 Edsa","AM","","Carol","8334810, 833-4813, 833-4807","","","","120","","","80000.00","8500.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("344","XXXTUMITZU","TUM00001","Damar","2-WEEKLY","","","","","","","90","","Geneva, Jaytex","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("345","TY ENT.","TY 00001","EDSA, Balintawak","2","","","","","","","90","","2 T-shirt","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("346","TYPE Z MOTOR PARTS TRADING","TYP00001","4-A BMA Ave. Quezon City","PM-COD","","","742-4162, 413-6878, 468-7548","","","","60","","3 T-shirt, same envelope as Shakra, MG7 A/P, COD NET","80000.00","0.00","no","0.00","","","","118-211-571-000","1","no","");
INSERT INTO tblcustomer VALUES("347","UE AUTO SUPPLY","UE 00001","","WEEKDAY","","","","","","","120","","","10000.00","0.00","no","0.00","","","","000-336-337-000","1","no","");
INSERT INTO tblcustomer VALUES("348","ULTRAMAX AUTO SUPPLY AND CAR ACCESSORIES","ULT00001","177 Banaue St. Quezon City","PM","","","712-3437, 711-3731","","","","90","","2 T-shirt","250000.00","142488.00","no","0.00","","","","104-012-115-000","1","no","");
INSERT INTO tblcustomer VALUES("349","UNISON MOTOR PARTS","UNI00001","1972 Taft Ave. Pasay City","WEEKDAY","","","831-0831, 831-5714","","","","120",""," Worthwhile","10000.00","0.00","no","0.00","","","","000-304-099-051","1","no","");
INSERT INTO tblcustomer VALUES("350","URICH GEN. MDSG.","URI00001","","WEEKDAY","","FREDERICK","437-5336, 381-3699","","","","90","","2 T-shirt, 2 Calendar","50000.00","68660.00","no","0.00","","","","101-948-232-000","3","no","");
INSERT INTO tblcustomer VALUES("351","USHIO MKTG.","USH00001","52 Banaue St. Quezon City","WEEKDAY-THURS","","","7120027, 712-0107","","","","90","","2 T-shirt, 1 Ham, 1 Raffle","50000000.00","42250.00","no","0.00","","","","104-006-749-000","1","no","");
INSERT INTO tblcustomer VALUES("352","VALQUA BRAKE AND CLUTCH SALES","VAL00001","913 Aurora Blvd. Cubao City","WEEKDAY","","","912-5150, 912-5151, 913-4111","0920-4882590","912-5150","","120","","","10000.00","16640.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("353","VIC SOCO","VIC00001","","WEEKDAY","","","","","","","120","","","1000000.00","11150.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("354","W2TN","W2T00001","564 Banawe St. corner Samat","PM","","","","","","","90","","sister company of Wiley","10000.00","100.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("355","WALT MKTG.","WAL00001","12 Sgt. Rivera St. A. Bonifacio Ave. Quezon City","2","","WILLIE ONG","3643638, 3622430, 365-2405","","","","90","","","15000000.00","802854.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("356","WARREN MOTOR SALES","WAR00001","1054 Benavidez Manila","4","","","244-1775, 244-7677, 247-1879","","","","120","","","10000.00","0.00","no","0.00","","","","103-900-513-000","1","no","");
INSERT INTO tblcustomer VALUES("357","WAS AUTO SUPPLY","WAS00001","128 Banaue St. Quezon City","WEEKDAY","","","712-3104, 712-3112","","","","120","","","10000.00","0.00","no","0.00","","","","301-104-011-739","1","no","");
INSERT INTO tblcustomer VALUES("358","WELLER MOTOR PARTS","WEL00001","1236 CM Recto Ave. Manila","4","","","244-8228, 244-0211","","244-8202","","120","","2 T-shirt","5000000.00","111296.00","no","0.00","","","","103-900-513-000","1","no","");
INSERT INTO tblcustomer VALUES("359","WHEELMAN","WHE00001","G. Masangkay Manila","4","","","321-0182, 321-0181, 321-0281, 254-8532","","","","90","","c/o Manta","10000.00","500.00","no","0.00","","","","100-762-536-000","1","no","");
INSERT INTO tblcustomer VALUES("360","WHIZCO AUTO SUPPLY","WHI00001","2315 S. Reyes St, Sta. Cruz Manila","4","","","254-1636, 254-1656, 254-1660","","","","90","","1 T-shirt","10000000.00","308765.00","no","0.00","","","","132-410-686-000","1","no","");
INSERT INTO tblcustomer VALUES("361","WIL-CRIS","WIL00001","La Torre, Talayan Village","4","","","254-8652, 254-9717, 256-3303","","","","7","","formerly Wilbess","10000000.00","128610.45","no","7.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("362","WILBROS MOTOR SALES INC.","WIL00002","","PM","","","","","","","90","","","10000.00","0.00","no","0.00","","","","301-001-249-343","1","no","");
INSERT INTO tblcustomer VALUES("363","WILCOR AUTO SUPPLY","WIL00003","72-C Kitanlad St. QC. BODEGA: 107 Santol St. Galas  qc","AM","","CORAZON LOBENDINO","749-2042, 712-7009, 716-3568, 714-5767","","","","90","","","10000000.00","45160.00","no","0.00","","","","201-022-285-000","1","no","");
INSERT INTO tblcustomer VALUES("364","WYLEY MOTOR SALES","WYL00004","","PM","","","7411421, 7403228, 414-6663","","","","90","","2 T-shirt, sister company of W2TN","100000000.00","109660.00","no","0.00","","","","039-100-455-001","2","no","");
INSERT INTO tblcustomer VALUES("365","WILTO","WIL00005","","PM","","","","","","","90","","","10000.00","0.00","no","0.00","","","","107-091-676-000","1","no","");
INSERT INTO tblcustomer VALUES("366","WM INDUSTRIAL","WM 00001","","4","","","","","","","90","","formerly Michiba","1000000.00","275895.00","no","0.00","","","","103-914-230-000","1","no","");
INSERT INTO tblcustomer VALUES("367","YAMATO MOTOR PARTS","YAM00001","92E Banaue St. Quezon City","PM","","","7119306","","","","90","","2 T-shirt","10000000.00","74069.00","no","0.00","","","","038-104-005-722","1","no","");
INSERT INTO tblcustomer VALUES("368","YEN COMMERCIAL","YEN00001","Kaliraya St. Quezon City","AM","","","712-0286","","","","90","","2 T-shirt","10000.00","0.00","no","0.00","","","","039-000-173-792","1","no","");
INSERT INTO tblcustomer VALUES("369","YOUNG BROS PARTS CENTER","YOU00001","Main: 64 Banaue St. Quezon City  Branch: 37F Banaue St. Quezon CIty","4","","","712-0226, 712-0210, 731-0889","","732-8903","","90","","2 T-shirt   Branch: 732-4886, 734-4657","50000.00","17790.00","no","0.00","","","","001-878-085","1","no","");
INSERT INTO tblcustomer VALUES("370","YOUNG SALES CO. INC.","YOU00002","12 Samat St. Quezon City","PM","","","712-6684, 732-4322","","","","90","","2 T-shirt","10000.00","0.00","no","0.00","","","","000-366-019","1","no","");
INSERT INTO tblcustomer VALUES("371","YOUNG'S AUTO CENTER","YOU00003","1165 Abad Santos Manila","PM","","","253-3450, 253-3461","","","","90","","","10000.00","0.00","no","0.00","","","","004-117-305","1","no","");
INSERT INTO tblcustomer VALUES("372","ZESA MULTI SALES","ZES00001","39 BMA Ave. Pasig","PM","","","7310589, 416-2925, 656-7040, 656-9869","","","","90","","2 T-shirt","150000.00","63535.00","no","0.00","","","","103-866-462-001","1","no","");
INSERT INTO tblcustomer VALUES("373","ALJHENG","ALJ00001","","PROV","","","","","","","90","","","50000.00","47614.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("374","AUTOSPECS MOTOR SALES-TERMS","AUT00010","371 H-I Banaue St. cor. Dapitan Quezon City","PM","","","743-9376, 711-5046, 732-3835, 414-2463","","","","90","","","1000000.00","10210.00","no","0.00","","","","038-103-938-784","2","no","");
INSERT INTO tblcustomer VALUES("375","CENTAUR","CEN00001","","PROV","","","032-256-2290/98","","","","120","","","50000.00","50136.25","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("376","CRESTA MOTOR PARTS","CRE00001","64-C West Ave. Quezon City","WEEKDAY","","","371-4715, 415-1304, 416-4161","","","","90","","","10000.00","1445.00","no","0.00","","","","038-103-989-201","3","no","");
INSERT INTO tblcustomer VALUES("377","EMPEROR/PRINCE LUKE","EMP00002","","PROV","","","","","","","90","","","5000.00","4300.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("378","G-3 SUPPLY AND MKTG.","G-300001","Door 6-1 A MIMRIC Bldg. Sta. Ana Ave. Davao City","PROV","","","227-3494","","","","120","","","1000000.00","24755.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("379","HINO PARTS SPECIALIST","HIN00001","","2","","","","","","","90","","Sister company of Isuzu Specialist","30000.00","40912.50","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("380","MIDLINE PARTS SUPPLY CENTER (MPSC)","MID00001","Bacolod City","PROV","","","","0928-5063788","0344350135","","120","","","500000.00","162440.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("381","MINDANAO ACE","MIN00002","","PROV","","","","","","","120","","","300000.00","68365.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("382","TACH MOTION AUTO SUPPLY","NEW00016","48 Banaue St. Quezon City","AM","","","712-0269, 413-0093, 732-0027","","712-0221","","90","","","1000000.00","213846.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("383","PACITA CALLANO","PAC00002","","WEEKDAY","","","","","","","90","","","500000000.00","21805.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("384","POPOY","POP00001","","WEEKDAY","","","","","","","90","","","10000.00","2700.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("385","ROADSTAR AUTO SUPPLY","ROA00002","Cagayan de Oro City","PROV","","","08822-725446, 726374, 2314295, 088-3563875","0917-7120214, 0922-8560807","","","120","","","500000.00","116792.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("386","RYAN AUDIO","RYA00001","","WEEKDAY","","","","","","","90","","","10000.00","1990.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("387","APPENZEL INC.","APP00001","Valenzuela City","WEEKDAY","","JENNIFER LAM SZE","294-3138","","","","90","","","10000.00","3550.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("388","KAPITAN PARTS CENTER  (BORROMEO)","KAP00001","Cebu City","PROV","","","032-2543751, 255-2522","","","","7","","","500000000.00","1966941.25","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("389","CANCELLED","CAN00001","","WEEKDAY","","","","","","","365","","","10000000.00","53557.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("390","LANCOM","LAN00001","","4","","","","","","","90","","","100000.00","49648.57","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("391","KARZ AUTO ACCESSORIES","KAR00003","35-M Banaue St. Bgy. Lourdes Quezon City","WEEKDAY-THURS","","","411-7811","","","","120","","","80000.00","59520.00","no","0.00","","","","274-032-216-000","2","no","");
INSERT INTO tblcustomer VALUES("392","KONTAKPOINT","KON00001","41-A Agno St. Quezon City","PM","","","743-8222 LOC 32, 743-8223 LOC 125-127","","","","120","","","10000.00","1720.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("393","BON","BON00001","","WEEKDAY-COD","","","","","","","0","","","0.00","1300.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("394","OKIA AUTO SUPPLY","OKI00001","620 Mc Arthur Hiway Malanday Valenzuela","WEEKDAY-COD","","MELSON P. LOQUE","445-3294, 986-6188, 211-8985","0917-8067664, 0922-8113186","291-4037","","0","","Lagpas Meralco","20000.00","30630.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("395","CALL AUTO PARTS TRADING","CAL00001","Kaliraya St. Quezon City","WEEKDAY-COD","","","412-5992","","","","0","","Kenrick Tao","1000000.00","11390.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("396","METRO PRO","MET00004","Sapocoy St. G. Roxas Quezon City","2","","","364-2796, 364-2496","","","","120","","DAKAR","20000.00","2310.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("397","SLOVER AUTO PARTS","SLO00001","BANAUE ST. QC","AM","","","","","","","60","","","5000.00","130.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("398","AUTOWOODS","AUT00011","25 Mayamot St. Sumulong Hiway Antipolo City","WEEKDAY","","WOODY","394-0458","","","","0","","","25000.00","39391.50","no","5.00","DAN-000001","DAN-000001","","","1","no","");
INSERT INTO tblcustomer VALUES("399","TONETH","TON00001","","WEEKDAY-COD","","","","","","","0","","Antoneth Manait","0.00","3915.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("400","CM RECTO AUTO SUPPLY","CMR00001","1029 CM Recto AVe. Manila","4","","","252-1192, 252-1186, 252-1187","","","","120","","","50000.00","16200.00","no","0.00","","","","029-000-620-627","1","no","");
INSERT INTO tblcustomer VALUES("401","MAYOR FERDINAND ARNAIZ","MAY00001","","","","","","","","","0","","","0.00","4630.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("402","FREDERICH GEN. MDSE.","FRE00002","295-F P. Tuazon Cubao Quezon City","WEEKDAY","","","381-3699, 437-5336","","","","120","","URICH","5000000.00","146460.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("403","WALCO MOTOR PARTS","WAL00002","17 Banaue St. Quezon City","AM","","","712-1489, 711-0299, 711-0277, 353-0123","","","","120","","Erick's","50000000.00","121155.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("404","RENE","REN00001","","WEEKDAY","","","","","","","0","","","10000.00","1360.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("405","CENTRAL ABUNDA","CEN00002","","WEEKDAY","","","","","","","0","","","0.00","850.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("406","CASH","CA00001","","WEEKDAY","","","","","","","0","","FOR ALL CASH PAYMENTS","100000000.00","245067.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("407","GTX","GTX00001","","2","","","","","","","90","","","5000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("408","TRANSDART","TRA00001","","WEEKDAY","","","","","","","0","","","10000.00","6320.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("409","YAMATA","YAM00002","","WEEKDAY","","","","","","","0","","","0.00","11520.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("410","ASTRONIC MULTITRADE CORP.","AST00001","","WEEKDAY","","","","","","","0","","","500000.00","76330.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("411","DENNY PARTS CENTER / JAPACOR ENT","DEN00002","2359 CL MONTELIBANO AVE., CAPITOL HEIGHTS BACOLOD CITY","PROV","","","034-7077045","","","","0","","","50000.00","25335.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("412","CENMACO","CEN00003","512 Mariano Marcos","WEEKDAY","","SALLY","725-0592, 725-1519","","","","0","","","100000000.00","133788.74","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("413","ANITA GAW","AN00001","","WEEKDAY","","","285-3153","","","","0","","ilaw","50000.00","2770.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("414","MON FLORENDO","MON00001","","WEEKDAY","","","","","","","0","","","0.00","450.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("415","BRO MKTG.","BRO00001","","WEEKDAY","","","","","","","0","","","100000.00","91431.50","no","5.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("416","NOLIE YAGIN","NOL00001","","WEEKDAY","","","","","","","0","","","100000.00","4909.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("417","FANNY","FAN00001","","WEEKDAY","","","","","","","0","","","200000.00","33260.75","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("418","GLOBESCO PAINT","GLO00001","A. BONIFACIO C-3 STO. DOMINGO","WEEKDAY","","","","","","","0","","","0.00","900.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("419","CESAR SAULAN","CES00001","","WEEKDAY","","","","","","","0","","","0.00","700.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("420","KAT INDUSTRIAL SALES","KAT00002","BACOLOD CITY","PROV","","","","","","","0","","","0.00","2350.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("421","TISOY","TIS00001","","WEEKDAY","","","","","","","0","","","0.00","1820.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("422","DYPO AUTO PARTS","DYP00001","DOOR NO. 2 RJR BLDG. BACOLOD CITY","PROV","","","707-7055, 476-4284","","","","120","","","150000.00","14630.00","no","0.00","OFF-000001","OFF-000001","","","3","no","");
INSERT INTO tblcustomer VALUES("423","SHELTON PHILS","SHE00001","Iloilo City","PROV","","","","","","","30","","","10000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("424","JHUN AUTO PARTS","JHU00001","308 Bgy. Darawa Tanauan City","WEEKDAY","","","","0915-3716541","","","0","","","0.00","7210.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("425","TOMITZU","TOM00001","","WEEKDAY","","","","","","","120","","","30000.00","1895.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("426","FELIX MAGDUGO","FEL00004","","WEEKDAY","","","","","","","0","","","5000.00","2190.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("427","STREET CONCEPT ENT.","STR00003","LMT BLDG, de Leon ST. Jaro, Iloilo City","PROV","","","","","","","0","","","200000.00","83405.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("428","ARCE MKTG.","ARC00001","Roxas City","PROV","","","","","","","0","","","0.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("429","TD MKTG","TDM00001","Iloilo City","PROV","","","","","","","0","","","10000000.00","171517.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("430","WILLIE MANZANO","WIL00004","","WEEKDAY","","","","","","","0","","","150000000.00","633673.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("431","NORTHWEST INSURANCE AND SURETY","NOR00001","272 Dasmarinas Manila","WEEKDAY","","","242-9331, 242-9334, 242-9342","","","","0","","COLORLUX 200 STO. DOMINGO CO. INC. QC","0.00","1500.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("432","METROTRUCK BUILDERS","MET00005","","WEEKDAY","","","","","","","0","","","0.00","4650.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("433","MERCURY MOTOR SALES","MER00002","","4","","REYMOND","244-7349/50/51","","","","120","","","20000.00","600.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("434","KHRIS KAT","KHR00001","","WEEKDAY","","","","","","","0","","","50000.00","9205.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("435","KKK HEAVY EQUIPMENT","KKK00001","1165 Edsa Balintawak, Quezon City","WEEKDAY","","","733-0991","","","","0","","","1000000.00","21339.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("436","NOLIE QUIMSON","NOL00002","","WEEKDAY","","","","","","","0","","","0.00","400.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("437","INTRAMUROS","INT00003","","WEEKDAY","","","742-5562","","","","0","","","10000.00","4930.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("438","CAMILLE BONIFACIO","CAM00001","","WEEKDAY","","","","","","","0","","","0.00","1500.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("439","EDNA TAN","EDN00001","","WEEKDAY","","","","","","","0","","","0.00","230.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("440","COLORLUX","COL00003","200 STO. DOMINGO AVE. QUEZON CITY","WEEKDAY","","EDWARD ANG","365-0617","","","","0","","","10000000.00","2420.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("441","JOESONS COMMERCIAL","JOE00001","Lapasan Branch, Cagayan de Oro City","WEEKDAY","","","412-3584","0923-6582724, 0917-7222650","08822-722950","raquel.josesons@yahoo.com or s","0","","del to Goldsam Ent. 76-B P. Florentio St. Banaue Quezon City.","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("443","NEW PROGRESS ENT.","NEW00018","","WEEKDAY","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("444","XDORIS","DOR00001","","WEEKDAY","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("445","XTOYORAMA","TOY-00004","","AM-COD","","","","","","","7","","","0.00","0.00","no","10.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("446","DY KIM KEE","DYK00001","","4","","","","","","","0","","","0.00","900.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("447","MAME AUTO PARTS","MAM00001","MONTEVERDE ST, DAVAO","PROV","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("448","LOUIE ACHUELA","LOU00001","","WEEKDAY","","","","","","","0","","","0.00","50.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("449","APEH","APE00001","","WEEKDAY","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("450","ROMY GIRON","ROM00001","","WEEKDAYS","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("451","GOLDEN M'S","GOLD00001","27 E. Rodriguez St. Quezon City","WEEKDAYS","","JANET","716-5914","","","","0","","","1000000.00","2450.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("452","SEICHI","SEI00002","","WEEKDAYS","","","","","","","0","","","50000.00","3260.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("453","MANLY EXPRESS INC.","MAN00003","","WEEKDAY","","","438-1448, 912-2956, 912-2740","","","","0","","","1000000.00","25400.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("454","TRIMARK","TRI00001","","","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("455","JAYSON","JAY00002","1540-1542 A. Rivera St. Tondo Manila","","","","253-5213, 251-6965, 253-6733","","","","90","","","10000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("456","XXX AUTOMAC AUTO SALES","AUT00003","8 dde Guzman St. Bangkulasi Navotas","2","","","281-7480, 281-7484","","","","90","","Supertest","50000.00","0.00","no","0.00","","","","210-789-133-000","2","no","");
INSERT INTO tblcustomer VALUES("457","RAYMUND CHUA","RAY00001","","WEEKDAY","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("458","TRANSIT AUTOMOTIVE","TRANS-0001","","WEEKDAY","","","","","","","0","","","0.00","360.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("459","DY'S AUTO SUPPLY","DYS00001","A. BONIFACIO QUEZON CITY","2","","","","","","","120","","","10000000.00","86200.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("460","WRANGLER","WRA-00001","","WEEKDAY","","","","","","","0","","","100000.00","23860.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("461","MENOR TRADING","MEN00001","BLK 2, LOT 5 P4 NATIVIDAD SUBD. DEPARO CALOOCAN CITY","WEEKDAY","","","3552392","","","","90","","c/o Boss PHilip BIGIE","100000000.00","35210.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("462","CHESTER (4A)","CHE-00001","","","","","","","","","0","","","0.00","2700.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("463","MARK TAN","MAR-00001","","","","","","","","","0","","","0.00","4100.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("464","ANTHONY","ANT00001","","WEEKDAY","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("465","BLAZER","BLA-00001","","","","","","","","","0","","","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("466","TONYO'S A/S","TON-00001","","PROV","","","","","","","0","","","0.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("467","LIM-YU","LIM-00001","","PROV","","","522-2648, 526-9828","","","","0","","","1000000.00","35470.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("468","GEORGE","GEO00002","","WEEKDAY","","","","","","","0","","","0.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("469","RYN AUTO PARTS","RYN-00001","304 F. Roxas St. 8th Ave. Caloocan City","2","","","352-7493, 986-2225","","","","120","","Brand New/Surplus and Heavy Equipment","1000000.00","203911.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("470","MELCHOR (WALCO)","MEL@L 9999","","WEEKDAY-COD","","","","","","","0","","","0.00","1009.40","no","2.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("471","SONG YANGG MOTOR SALES","SON00001","41 KALIRAYA ST. COR. BANAUE DONA JOSEFA QUEZON CITY","AM-COD","","JIMMY A. MORILLA","   742-8335","0917-8810979","411-4018","songyangg@yahoo.com","7","","","50000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("472","HORSE POWER","HOR-000001","","","","","","","","","0","","","0.00","350.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("473","NATHANIEL UY","NAT00001","85 N. Domingo Cruz Bldg","WEEKDAY","","","287-4083, 054-4720210, 054-2556789/6028","","","","120","","","50000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("474","CHALLENGER INTERNATIONAL","CHA00003","481 Pacheco cor. Velasquez and Sta. Maria St. Tondo Manila","3","","JUANITO YANG (JOHNNY)","255-1321, 255-1322","0919-3334458","","","0","","","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("475","SOLVER AUTO PARTS","SOL00001","41 Kaliraya St. Banaue Tatalon Quezon City BRANCH: 1473 Laguna St. cor. S. Reyes Blumentritt","WEEKDAY","","BIMBO GONZALES, ERNIE","408-8863, 749-0126, 774-2161","0917-3555948","","","0","","","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("476","ULTIMATE","ULT00002","191 Banaue St. cor. Agno St. Dona Josefa QC","WEEKDAY","","FRANCISCO RONCE","742-5478,742-4237","0918-5234932","","","0","","","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("477","VINMARC AUTO SUPPLY","VIN00001","1608 Singalong St. Paco Manila","WEEKDAY","","","524-5485","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("478","KEVIN LIM","KEV-00001","","WEEKDAY","","","","","","","0","","","0.00","530.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("479","ELAINE HAWSON","ELA00001","","WEEKDAY","","","","","","","0","","","0.00","350.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("480","XTACH MOTION AUTO SUPPLY","TAC-00007","","AM","","","","","","","0","","","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("481","FRANCIS","F-111","","AM-WEEKLY","","","","","","","0","","","40000.00","3180.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("482","XGOLD METAL","G111","","2","","","","","","","0","","","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("483","ABBOR TRADING","ABB-0001","2397 General Belarmino, Bangkal, Makati City","3","","","","","","","0","","","50000.00","35550.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("484","CHARLIE SO","CHA-00001","","","","","","","","","0","","","0.00","8260.00","no","5.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("485","SDMG","SDM@L 9999","","","","","","","","","0","","","0.00","280.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("486","ALTACO","ALT@L 9999","Aguinaldo Highway","","","","","","","","0","","                                                                                                                                                                                                                                                             C","20000.00","1900.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("487","KERBY LIM","KER@L 9999","","WEEKDAY","","","","","","","120","","","0.00","2800.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("488","ENTONG C/O ATCO","ENT@L 9999","","WEEKDAY","","","","","","","0","","","0.00","160.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("489","RYAN SY","RYA@L 9999","","","","","","","","","0","","ahente ni MIt-toyo","50000.00","62036.50","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("490","SG N D GLOBAL TRANSPORT INC.","SG@L 99999","","WEEKDAY","","","","","","","0","","","0.00","950.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("491","USE ME","USE@L 9999","","","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("492","JOHNNY C/O MAGNETIC","JOH@L 9999","","","","","","","","","0","","","0.00","1900.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("493","PHILIP AUTO SUPPLY","PHI@L 9999","3572 Dagat dagatan C C","WEEKDAY-COD","","","4916391","","","","0","","","0.00","2000.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("494","AUTOWHIZ PARTS CENTER","AUT@L 9999"," 3 PTC Bldg., M.J. Cuenco, Mabolo, Cebu City","PROV","","KENNETH TO CHIP","(032)231-0722, 412-7668","09173215092, 09234651874","(032)231-6133","","90","","","1500000.00","602025.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("495","TRITON JAPAN AUTO PARTS","TRI@L 1000","","","","","","","","","7","","","10000000.00","188680.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("496","J. LUKBAN","J.@L 99999","979-A A. Bonifacio Street, Caloocan","","","","332-6258, 332-5368, 332-6665","","","","120","","","1110925.00","68260.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("497","DEXTER AUTO SUPPLY","DEX@L 9999","F. TANEDO STREET TARLAC CITY","PROV","","","","","","","0","","","0.00","1310.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("498","JVNI AUTO SUPPLY","JVN@L 9999","   Sta Ana Ave., Davao City","PROV","","","","","","","120","","","600000.00","61400.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("499","G POWER","G P@L 9999","No. 45 Kaliraya St.., Tatalon Quezon City","AM","","BANJO","334-0634","","","","60","","","200000.00","29440.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("500","RYAN","RYA@L 9999","","WEEKDAY","","","","","","","0","","","0.00","62036.50","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("501","STREET KINGS AUTO SUPPLY","STR@L 9999","Door 6 Far East Cereal Bldg, Sta. Ana Ave, Davao City","","","","(082)222-6555, 222-6556","","(082)227-9152","","30","","","1000000.00","162430.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("502","EPEJ TRADING","EPE@L 9999","Paco, Manila","4","","","","","","","7",""," started 8/5/10","10000.00","1300.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("503","PISTON AUTO SUPPLY","PIS@L 9999","Santiago City, Isabela","PROV","","","","","","","30","","","0.00","2000.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("504","FAMOUS AUTO SUPPLY","FAM@L 9999","Cauayan City Isabela","PROV","","","","","","","120","","","300000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("505","TAGUM CT AUTO SUPPLY","TAG@L 9999","Tagum","PROV","","","","","","","120","","","250000.00","86100.00","no","0.00","RAN-000001","RAN-000001","","","3","no","");
INSERT INTO tblcustomer VALUES("506","BW PARTS CENTER","BW@L 99999","BACOLOD","PROV","","","","","","","0","","","0.00","4805.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("507","315 AUTO PARTS SALES","315@L 9999","","PROV","","","","","","","7","","via Sea King Cargo, value 30%","50000.00","150905.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("508","RBR MOTORS","RBR@L 9999","CARANGLAAN DISTRICT, DAGUPAN CITY","PROV","","4979053","09238234112 09235815560","","","","90","","","5000000.00","244695.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("509","RAYCO MARKETING","RAY@L 9999","M H DEL PILAR ST. TARLAC CITY","PROV","","","","","","","0","","","0.00","1360.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("510","OREGON AUTO SUPPLY","ORE@L 9999","CM Recto","4","","","","","","","0","","","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("511","JOWELLES AUTO PARTS","JOW@L 9999","Cauayan City, Isabela- Deliver to #45 Kamuning St. QC","PROV","","","","","","","30","","","400000.00","55040.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("512","TRITIUM","TRI@ 99999","","4","","","","","","","0","","","100000000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("513","LEJAN TRUCK","LEJ@L 9999","A. Bonifacio St","2","","","","","","","0","","","500000.00","32250.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("514","XXX KAPITAN PARTS CENTER (MANDAUE)","KAP@L 9999","Subang Daku Mandaue City","PROV","","","","","","","0","","","5000000.00","113395.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("515","AVL AUTO SUPPLY","AVL@L 9999","ILOILO CITY","PROV","","","","","","","30","","","500000.00","9600.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("516","ELA AUTO PARTS","ELA@L 9999","BANAWE CORNER DAPITAN","AM-WEEKLY","","","","","","","1","","","50000.00","9680.00","no","0.00","FEL-000001","FEL-000001","","","0","no","");
INSERT INTO tblcustomer VALUES("517","PURITY PAPER","PUR@L 9999","","WEEKDAY-COD","","","","","","","0","","","0.00","1000.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("518","RJB","RJB@L 9999","","WEEKDAYS","","","","","","","0","","","500000.00","25480.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("519","MOTORCARS AUTO PARTS CO.","MOT@L 9999"," 40 B Kaliraya St., Banawe, QC","PM-COD","","SONNY RAMCHAND","5426168, 5427800, 7438784","09165324067","5161029","motorcars_autopartsco@yahoo.co","7","","other contact nos. 7438789, 4142005","0.00","0.00","no","0.00","OFF-000001","OFF-000001","","","1","no","");
INSERT INTO tblcustomer VALUES("520","TOYOZU INC.","TOY@L 9999","MONTEVERDE STREET, DAVAO CITY","PROV","","","","","","","0","","","1000000.00","171895.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("521","ONGKING AUTO SUPPLY","ONG@L 9999","ABANAO EXT. BAGUIO CITY","PROV","","","","","","","0","","","1000000.00","11175.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("522","FORD TOWN AUTO SUPPLY","FOR@L 9999","DAVAO CITY","PROV","","","","","","","0","","","50000.00","11200.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("523","LMT C/O DCL","LMT@L 9999","","AM","","","","","","","0","","","250000.00","7440.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("524","CARLUCK PARTS CENTER","CAR@L 9999","Banawe Street","WEEKDAY-THURS","","","","","","","0","","","100000.00","17210.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("525","KELVIN LIM","KEL@L 9999","","WEEKDAY","","","","","","","0","","","0.00","2000.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("526","CARMIX","CAR@L 9999","BANAWE ST.","","","","","","","","0","","","0.00","17210.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("527","DBO AUTO PARTS","DBO@L 9999","BACOLOD CITY","PROV","","","","","","","0","","","500000.00","17105.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("528","PRINCE LUKE","PRI@L 9999","Cebu City","PROV","","","","","","","0","","","200000.00","10150.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("529","FLEET WOOD","FLE@L 9999","CALOOCAN ST.","","","","","","","","0","","","0.00","920.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("530","ALJEANN AUTO SUPPLY","ALJ@L 9999","Sevilla, San Fernando City, La Union","PROV","","","","","","","0","","","0.00","2560.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("531","HRN AUTO SUPPLY","HRN@L 9999","Valeria Street, Iloilo City","PROV","","","","","","","0","","date started: 3/30/11","200000.00","15000.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("532","MONTOM A/S","MON@L 9999","Antipolo St, Blumentritt","4","","","","","","","0","","","100000.00","1015.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("533","BRIXTONE AUTOCARE CENTER","BRI@L 9999","253 G. ARANETA AVE.","WEEKDAY","","716-0586M 713-3955, 414-8182","","","","","7","","","10000.00","3855.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("534","GI AUTO SUPPLY","GI@L 99999","Munoz","4","","","","","","","0","","","500000.00","29520.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("535","JACK MOTOR PARTS","JAC@L 9999","Fugoso Street","4","","","","","","","0","","","500000.00","300.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("536","ABC PREMIERE- COD ACCT","ABC@L 9999","PASAY CITY","3","","","","","","","0","","","0.00","4190.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("537","DYNAMIC PARTS CENTER INC.","DYN@L 9999","2333 Tomas Mapua St., Sta. Cruz Manila","4","","","254-1853, 254-1932,","","254-1865","garnetautosupply@yahoo.com","150","","","5000000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("538","RN CASAUAY","RN@L 99999","","WEEKDAY","","","","","","","0","","CUSTOMER OF MORNING GLORY","500000.00","97130.00","no","3.00","NOL-000001","NOL-000001","","","1","no","");
INSERT INTO tblcustomer VALUES("539","MURAHAMA TRUCKPARTS CENTER","MUR@L 9999","","2","","1083 A. BONIFACIO AVE. GY BALINGASA QC","3666217, 3622175, 3641465, 3666217, 3638785","","362-4050","","120","","Contact person: RR","150000.00","0.00","no","0.00","","","","","2","no","");
INSERT INTO tblcustomer VALUES("540","MQ BEARING","MQ@L 99999","","4","","","","","","","7","","","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("541","BF AUTO PARTS","BM@L 99999","Sucat, Paranaque","","","","","","","","0","","formerly Tops Auto Supply","100000.00","36360.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("542","RNL AUTO SUPPLY","RNL@L 9999","KM 4 LA TRINIDAD, BENGUET","PROV","","","","","","","0","","","500000.00","7360.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("543","DYNATRON AUTOMOTIVE","DYN@L 9998","KM 6 LA TRINIDAD BENGUET","PROV","","","","","","","0","","","200000.00","41800.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("544","DIDEON TRADING","DID@L 9999","KM 4 LA TRINIDAD, BENGUET","PROV","","","","","","","0","","","0.00","2130.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("545","TOTAL MOTORPARTS","TOT@L 9999","KM 6 LA TRINIDAD, BENGUET","PROV","","","","","","","0","","","1500000.00","10030.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("546","TM AUTO SUPPLY","TM@L 99999","PUGUIS, LA TRINIDAD, BENGUET","PROV","","","","","","","0","","","1000000.00","37985.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("547","ALMOND AUTO SUPPLY","ALM@L 9999","A. Bonifacio Street, Baguio City","PROV","","","","","","","0","","","500000.00","12590.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("548","DAGUPAN AUTO SUPPLY","DAG@L 9999","Dagupan City","PROV","","","","","","","0","","","200000.00","40370.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("549","DS AUTO SUPPLY","DS@L 99999","San Carlos CIty, Pangasinan","PROV","","","","","","","0","","","1000000.00","11010.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("550","NIQ AUTO PARTS","NIQ@L 9999","KM 6 La Trinidad, Benguet","PROV","","","","","","","0","","","1000000.00","85330.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("551","EUROPA PARTS & ACCESSORIES","EUR@L 9999","Baguio CIty","PROV","","","","","","","0","","","10000000.00","2370.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("552","NINA MARC AUTO SUPPLY","NIN@L 9999","LAOAG CITY","PROV","","","","","","","0","","VIA WILLIAM TRUCKING 6RD OR 74TH STREET NEAR CORNER 10TH AVENUE CALOOCAN (364-8083 OR 367-9651)","0.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("553","4 AC WATCHERS  BULACAN","4 A@L 9999","","PROV","","","","","","","0","","","100000.00","211009.00","no","0.00","DANNY","DAN-000001","","","3","no","");
INSERT INTO tblcustomer VALUES("554","ALWIN","ALW@L 9999","","","","","","","","","0","","formerly Excelsior's salesman","0.00","43030.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("555","ALPHARD AUTO PARTS INC","ALP@L 9999","31-C P. FLORENTINO CORNER BANAWE","PM","","","7409320, 4136878, 4687632","","","","0","","c/o MG7","1000000.00","41180.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("556","TET A/P","TET@L 9999","2162 SALVADOR COMPOUND GEN. T. DE LEON VALENZUELA","","","JOEL","4459206, 3997110","","","","0","","","0.00","8000.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("557","HYUKIZU","HYU@L 9999","Banawe St.","PM-COD","","","708-3140, 708-6827","","","","0","","","100000.00","1900.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("558","YUKON TRADING","YUK@L 9999","La Trinidad, Benguet","PROV","","","","","","","30","","","1000000.00","28950.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("559","CLH TRADING","CLH@L 9999","224 D. Tuazon Street, Quezon City","","","","","","","","0","","","0.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("560","TRUCKERS PARTS SUPPLY","TRU@L 9999","Osmena Street, Cagayan De Oro City","PROV","","","","","","","0","","","50000.00","21455.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("561","MITSUKI TRADING","MIT@L 9999","Roosevelt Avenue, Munoz","2","","","","","","","0","","","50000.00","8440.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("562","LOUIE AUTO SUPPLY","LOU@L 9999","KM 4 La Trinidad, Benguet","PROV","","","","","","","0","","","2000000.00","161535.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("563","RAINBOW AUTO PARTS","RAI@L 9999","Baguio City","PROV","","","","","","","0","","","200000.00","18145.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("564","ATTOYAH AUTO PARTS","ATT@L 9999","17-B Cardiz Street, Banawe, Q. C.","AM-COD","","LAURO OR TECHIE (0923-8301127, 409-2903)","0917-4647724, 0929-8222122","","","attoyah_sk@yahoo.com.ph","7","","382-3364","50000.00","34580.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("565","ZENBU MOTOR PARTS","ZEN@L 9999","164 Banawe St. corner Kaliraya St., QC","AM","","IAN PADILLA","7438836, 7405837, 7412261","09167737139","","","60","","","200000.00","3300.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("566","ELVIE ENTERPRISES","ELV@L 9999","42 Burgos St. Lapaz Iloilo CIty","PROV","","","3200585","","","","60","","","200000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("567","ARNEL LONTOC","ARN@L 9999","","WEEKDAY","","","","","","","0","","ahente ni excelsior","0.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("568","SPICER AUTO SUPPLY","SPI@L 9999","Pasay City","3","","","","","","","0","",".","50000.00","14060.00","no","0.00","POP-000001","POP-000001","","","0","no","");
INSERT INTO tblcustomer VALUES("569","ARGUELLES AUTO & MOTORCYCLE SUPPLY","ARG@L 9999","#2 BGY. BANABA, GOV. DRIVE, SILANG CAVITE","PROV","","","","","","","0","","","10000000.00","351210.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("570","MOTORMIX","MTT@L 9999","314S EDSA, CALOOCAN","","","","","","","","0","","","200000.00","0.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("571","JEMMA MARKETING","JEM@L 9999","TONDO","","","","","","","","0","","","40000.00","1360.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("572","JESA AUTO PARTS","JES@L 9999","Valeria St. Iloilo City","PROV","","","","","","","30","","","2000000.00","28995.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("573","EXL TRADING","EXL@L 9999","Agora, Cagayan De Oro","PROV","","","","","","","0","","","500000.00","20865.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("574","POWER A/P","POW@L 9999","Mandaue","PROV","","","","","","","0","","","200000.00","22340.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("575","TAISHIN","TAI@L 9999","Remigio Street, Sta. Cruz Manila","","","","","","","","0","","","500000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("576","BUGUIAS AUTO SUPPLY","BUG@L 9999","","PROV","","","","","","","0","","","100000.00","0.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("577","FRONTE","FRO@L 9999","","AM","","","","","","","0","","","20000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("578","TOPBEST AUTO SUPPLY","TOP@L 9999","826 A. Bonifacio Ave. , Balintawak, Q.C.","2","","WILSON ONG","363-9010, 404-4062","","366-6435","","90","","started 1/24/12","5000000.00","58920.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("579","INTEGRA","INT@L 9999","","WEEKDAY","","","","","","","0","","","10000.00","1000.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("580","RICHRON","RIC@L 9999","195 C Kanlaon Street, Retiro, QC","PROV","","GLORIA SAMONTE","7418970","","","","0","","","1000000.00","95200.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("581","HIGH OCTANE (C/O METRO MARIWASA)","HIG@L 9999","","AM","","","","","","","90","","","1000000.00","6000.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("582","FMK AUTO PARTS CENTER INC.","FMK@L 9999","","","","","","","","","7","","","100000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("583","JUBILEE AUTO TECH CORP","JUB@L 9999","30 Landargun Street, corner G Araneta Avenue, Quezon City","","","","713-5092, 713-5162,415-621","","","","7","","","100000.00","4075.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("584","ES MANUEL TRADING","ES@L 99999","#5-C Cardiz St. Banawe Quezon City","","","CRIS MANUEL","7083235","09208665483, 09223291191","","","0","","","100000.00","7860.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("585","PYEZA PARTS DEPOT INC.","PYE@L 9999","Subangdaku, Mandaue Cebu City","PROV","","","","","","","0","","","1000000000.00","759800.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("586","VITON ENT.","VIT@L 9999"," MINDANAO AVE","","","","","","","","120","","","1000000.00","33560.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("587","FREENOR AUTO SUPPLY","FRE@L 9999","72-D Kitanlad St., Banawe, Q.C.","","","","410-0472, 353-5121","","","","7","","","50000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("588","ROADSWINDS MOTOR PARTS CORP.","ROA@L 9999","1472 Antipolo St., Sta. Cruz, Manila","","","MON, BOY, ANDY","254-1607, 254-1606","","","","7","","","50000.00","11340.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("589","CENTURY IRON WORKS","CEN@L 9999","289 8TH Avenure Caloocan City","2","","","363-8603","","","","0","","","100000.00","1200.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("590","AUTOCITY INC.","AUT@L 9999","758 del Monte Avenue Quezon City","","","","","","","","0","","","100000.00","602025.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("591","FUJI PARTS CENTER","FUJ@L 9999","DAVAO CITY","PROV","","","","","","","60","","","50000.00","5650.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("592","ESQUIRE","ESQ@L 9999","Paz St.","3","","","","","","","0","","","0.00","3000.00","no","0.00","","","","","0","no","");
INSERT INTO tblcustomer VALUES("593","HK M/P","HK@L 99999","Jaro, Iloilo City","PROV","","","","","","","7","","","1000000.00","4600.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("594","PAGSAWITAN AUTO SUPPLY","PAG@L 9999","5 PAGSAWITAN NATL. H-WAY
STA. CRUZ, LAGUNA","PROV","","","","","","","30","","","500000.00","30950.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("595","ART DIAZ","ART@L 9999","","WEEKDAY-COD","","","","","","","0","","","10000.00","70.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("596","CEBU MASSIVE","CEB@L 9999","Leon Kilat Street, Cebu City","PROV","","","","","","","90","","MGM freight 50 %","10000000.00","80900.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("597","TRUST MARKETING & AUTO SUPPLY","TRU@L1000","Subangdaku, Mandaue City","PROV","","RODRIGO "RUDY" CAMBAL","422-5803, 344-9514, 422-5802","","344-4196","","150","","","5000000.00","112215.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("598","MANDAUE FORTUNE MOTOR PARTS CORP.","MAN@L 9999","Subangdaku, Mandaue City","PROV","","HENRY T. UY","3452444, 3468440","09228760671","32-3460617","","90","","","0.00","24380.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("599","698 AUTO SUPPLY","698@L 9999","CENTRAL PICO, LA TRINIDAD, BENGUET","PROV","","","","","","","0","","","100000.00","9475.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("600","EVAN C/O CTK","EVA@L 9999","","","","","","","","","0","","","1000000.00","3100.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("601","GLORIOUS AUTO SUPPLY","GLO@L 9999","B-24 Gochan Bldg, Leon Kilat St., Cebu City","PROV","","RONNIE TO CHIP","(032)255-0920, 2554185","09176237790","(032)256-3274","","90","","","10000000.00","5200.00","no","0.00","","","","","3","no","");
INSERT INTO tblcustomer VALUES("602","DZL ENTERPISES","DZL@L 9999","524 D. EDSA CALOOCAN CITY, FRONTING SSS","2-COD","","","3677198","09223205070","","","0","","","100000.00","0.00","no","0.00","","","","","1","no","");
INSERT INTO tblcustomer VALUES("614","1111AAAASSS","AAA1111","TEST ADDRESS","2-COD","","JAMESSS","9122299","9278842558","9122298","jimmyrsantos@yahoo.com","25","2020-03-31","testDSFASDFAS","123123.00","0.00","yes","10.00","SMAN 1","SMAN001","2","DSAFDF31231","2","","");
INSERT INTO tblcustomer VALUES("615","*1ABC COMP","1A20AP8JE23","EWRWERQWE","GENERATOR","GOOD ACCT","JIM","","808900","","","20","2020-06-03","TETS","100000.00","48330.00","","10.00","SMAN 1","SMAN001","2","","2","","");
INSERT INTO tblcustomer VALUES("616","GTA - CUSTOMS (TEST)","G-C2003V6800","GTA CUSTOMS , Los Angeles City, USA","WEEKDAYS","GOOD ACCT","GTECHGAMING","7543356","9776070274","543211","markjeremysantos@gmail.com","10","2012-12-05","TEST.","20000.00","0.00","","5.00","","","0","225","1","","");



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



CREATE TABLE `tblitembrand` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ITEMBRAND` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `ITEMBRAND` (`ITEMBRAND`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

INSERT INTO tblitembrand VALUES("1","MEC");
INSERT INTO tblitembrand VALUES("2","FPI");
INSERT INTO tblitembrand VALUES("3","TYC");
INSERT INTO tblitembrand VALUES("4","POWERSONIC");
INSERT INTO tblitembrand VALUES("5","STEBEL");
INSERT INTO tblitembrand VALUES("6","EAGLE");
INSERT INTO tblitembrand VALUES("7","PEACE");
INSERT INTO tblitembrand VALUES("8","HELLA");
INSERT INTO tblitembrand VALUES("9","DENJI");
INSERT INTO tblitembrand VALUES("10","KOITO");
INSERT INTO tblitembrand VALUES("11","SK BRAND");
INSERT INTO tblitembrand VALUES("12","MITSUBA");
INSERT INTO tblitembrand VALUES("13","STANLEY");
INSERT INTO tblitembrand VALUES("14","XACTA");
INSERT INTO tblitembrand VALUES("15","SANDEN");
INSERT INTO tblitembrand VALUES("16","TM");
INSERT INTO tblitembrand VALUES("17","MITSUI");
INSERT INTO tblitembrand VALUES("18","GE");
INSERT INTO tblitembrand VALUES("19","PRESTONE");
INSERT INTO tblitembrand VALUES("20","ANIMAR");
INSERT INTO tblitembrand VALUES("21","FIAMM");
INSERT INTO tblitembrand VALUES("22","DEPO,LUCID");
INSERT INTO tblitembrand VALUES("23","JONGMEI");
INSERT INTO tblitembrand VALUES("24","OLYMPIC");
INSERT INTO tblitembrand VALUES("25","TYPE R");
INSERT INTO tblitembrand VALUES("26","FLOSSER");
INSERT INTO tblitembrand VALUES("27","ASTRA");
INSERT INTO tblitembrand VALUES("28","OSRAM");
INSERT INTO tblitembrand VALUES("29","DEPO, LUCID");
INSERT INTO tblitembrand VALUES("30","MY CARR");
INSERT INTO tblitembrand VALUES("31","SOAR");
INSERT INTO tblitembrand VALUES("32","BRUCE");
INSERT INTO tblitembrand VALUES("33","CIBIE");
INSERT INTO tblitembrand VALUES("34","BOSCH");
INSERT INTO tblitembrand VALUES("35","CAB");
INSERT INTO tblitembrand VALUES("36","IRIS");
INSERT INTO tblitembrand VALUES("37","NIKEN");
INSERT INTO tblitembrand VALUES("38","CIRCUIT");
INSERT INTO tblitembrand VALUES("39","MOCC");
INSERT INTO tblitembrand VALUES("40","ULTIMA");
INSERT INTO tblitembrand VALUES("41","NGK");
INSERT INTO tblitembrand VALUES("42","NIKKO");
INSERT INTO tblitembrand VALUES("43","SOM");
INSERT INTO tblitembrand VALUES("44","FUJI");
INSERT INTO tblitembrand VALUES("45","RED  ZONE");
INSERT INTO tblitembrand VALUES("46","TRANSISTOR");
INSERT INTO tblitembrand VALUES("47","TURTLE WAX");
INSERT INTO tblitembrand VALUES("48","VHT");
INSERT INTO tblitembrand VALUES("49","VOYAGER");
INSERT INTO tblitembrand VALUES("50","HITEC");
INSERT INTO tblitembrand VALUES("51","XENON");
INSERT INTO tblitembrand VALUES("52","NANE");
INSERT INTO tblitembrand VALUES("53","BIGIE");
INSERT INTO tblitembrand VALUES("54","CICADA");
INSERT INTO tblitembrand VALUES("55","YANKEE");
INSERT INTO tblitembrand VALUES("56","GT");
INSERT INTO tblitembrand VALUES("57","SPORTS SHOT");
INSERT INTO tblitembrand VALUES("58","DEPO");
INSERT INTO tblitembrand VALUES("59","JLONG");
INSERT INTO tblitembrand VALUES("60","SGM");
INSERT INTO tblitembrand VALUES("61","YMT");
INSERT INTO tblitembrand VALUES("62","KOTO");
INSERT INTO tblitembrand VALUES("63","WBC");
INSERT INTO tblitembrand VALUES("64","Lego #1");
INSERT INTO tblitembrand VALUES("65","Lego #2");
INSERT INTO tblitembrand VALUES("66","Lego #3");
INSERT INTO tblitembrand VALUES("67","Lego #4");
INSERT INTO tblitembrand VALUES("68","Lego #5");



CREATE TABLE `tblitemmake` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ITEMMAKE` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `ITEMMAKE` (`ITEMMAKE`)
) ENGINE=MyISAM AUTO_INCREMENT=616 DEFAULT CHARSET=latin1;

INSERT INTO tblitemmake VALUES("1","HU-1121");
INSERT INTO tblitemmake VALUES("2","M-1066");
INSERT INTO tblitemmake VALUES("3","HU-2228,HG-4410");
INSERT INTO tblitemmake VALUES("4","E-036");
INSERT INTO tblitemmake VALUES("5","E-366");
INSERT INTO tblitemmake VALUES("6","E-134");
INSERT INTO tblitemmake VALUES("7","E-359");
INSERT INTO tblitemmake VALUES("8","E-177");
INSERT INTO tblitemmake VALUES("9","M-466");
INSERT INTO tblitemmake VALUES("10","M-716");
INSERT INTO tblitemmake VALUES("11","E-032");
INSERT INTO tblitemmake VALUES("12","HORSE");
INSERT INTO tblitemmake VALUES("13","E-362");
INSERT INTO tblitemmake VALUES("14","E-368");
INSERT INTO tblitemmake VALUES("15","6X12");
INSERT INTO tblitemmake VALUES("16","E-166");
INSERT INTO tblitemmake VALUES("17","M-462");
INSERT INTO tblitemmake VALUES("18","E-552");
INSERT INTO tblitemmake VALUES("19","E-551");
INSERT INTO tblitemmake VALUES("20","E-364");
INSERT INTO tblitemmake VALUES("21","E-550");
INSERT INTO tblitemmake VALUES("22","OKAMURA");
INSERT INTO tblitemmake VALUES("23","E-038");
INSERT INTO tblitemmake VALUES("24","E-381");
INSERT INTO tblitemmake VALUES("25","E-382");
INSERT INTO tblitemmake VALUES("26","E-167");
INSERT INTO tblitemmake VALUES("27","E-168");
INSERT INTO tblitemmake VALUES("28","E-363");
INSERT INTO tblitemmake VALUES("29","E-383");
INSERT INTO tblitemmake VALUES("30","E-361");
INSERT INTO tblitemmake VALUES("31","E-548");
INSERT INTO tblitemmake VALUES("32","SYF-20");
INSERT INTO tblitemmake VALUES("33","E-547");
INSERT INTO tblitemmake VALUES("34","E-549");
INSERT INTO tblitemmake VALUES("35","E-275");
INSERT INTO tblitemmake VALUES("36","E-343");
INSERT INTO tblitemmake VALUES("37","M-2025");
INSERT INTO tblitemmake VALUES("38","E-248");
INSERT INTO tblitemmake VALUES("39","E-566");
INSERT INTO tblitemmake VALUES("40","E-554");
INSERT INTO tblitemmake VALUES("41","E-555");
INSERT INTO tblitemmake VALUES("42","E-556");
INSERT INTO tblitemmake VALUES("43","S-1161");
INSERT INTO tblitemmake VALUES("44","HG-2063");
INSERT INTO tblitemmake VALUES("45","HG-2081");
INSERT INTO tblitemmake VALUES("46","PVC");
INSERT INTO tblitemmake VALUES("47","CL-9142");
INSERT INTO tblitemmake VALUES("48","SUPERTONE");
INSERT INTO tblitemmake VALUES("49","E-449");
INSERT INTO tblitemmake VALUES("50","E-444");
INSERT INTO tblitemmake VALUES("51","E-445");
INSERT INTO tblitemmake VALUES("52","TOHO");
INSERT INTO tblitemmake VALUES("53","E-448");
INSERT INTO tblitemmake VALUES("54","E-432");
INSERT INTO tblitemmake VALUES("55","SYS-4128");
INSERT INTO tblitemmake VALUES("56","M-111");
INSERT INTO tblitemmake VALUES("57","MF-06-106");
INSERT INTO tblitemmake VALUES("58","MAGNET  TYPE");
INSERT INTO tblitemmake VALUES("59","HARRY");
INSERT INTO tblitemmake VALUES("60","MASTER");
INSERT INTO tblitemmake VALUES("61","KZ-63");
INSERT INTO tblitemmake VALUES("62","HG-5092,  HGMB1026");
INSERT INTO tblitemmake VALUES("63","KZ-51");
INSERT INTO tblitemmake VALUES("64","3-POINTS");
INSERT INTO tblitemmake VALUES("65","HG-5051");
INSERT INTO tblitemmake VALUES("66","IGNITION CABLE");
INSERT INTO tblitemmake VALUES("607","Lego - Harry Potter #1");
INSERT INTO tblitemmake VALUES("68","FLASHER RELAY");
INSERT INTO tblitemmake VALUES("69","11X39");
INSERT INTO tblitemmake VALUES("70","11X36");
INSERT INTO tblitemmake VALUES("71","1034");
INSERT INTO tblitemmake VALUES("72","8X31");
INSERT INTO tblitemmake VALUES("73","SYF-140");
INSERT INTO tblitemmake VALUES("74","DJ-818");
INSERT INTO tblitemmake VALUES("75","DJ-8045");
INSERT INTO tblitemmake VALUES("76","DJ-8050");
INSERT INTO tblitemmake VALUES("77","DJ-8058");
INSERT INTO tblitemmake VALUES("78","DJ-8065");
INSERT INTO tblitemmake VALUES("79","DJ-8100");
INSERT INTO tblitemmake VALUES("80","DJ-95");
INSERT INTO tblitemmake VALUES("81","NS-90");
INSERT INTO tblitemmake VALUES("82","DJ-808");
INSERT INTO tblitemmake VALUES("83","DJ-505");
INSERT INTO tblitemmake VALUES("84","DJ-606");
INSERT INTO tblitemmake VALUES("85","DJ-199");
INSERT INTO tblitemmake VALUES("86","DJ-404");
INSERT INTO tblitemmake VALUES("87","DJ-200");
INSERT INTO tblitemmake VALUES("88","DJ-91");
INSERT INTO tblitemmake VALUES("89","DJ-88");
INSERT INTO tblitemmake VALUES("90","HU-2218");
INSERT INTO tblitemmake VALUES("91","4000");
INSERT INTO tblitemmake VALUES("92","ROLL");
INSERT INTO tblitemmake VALUES("93","HELLA TYPE");
INSERT INTO tblitemmake VALUES("94","105-8045");
INSERT INTO tblitemmake VALUES("95","2 TONS");
INSERT INTO tblitemmake VALUES("96","30 TONS");
INSERT INTO tblitemmake VALUES("97","4721");
INSERT INTO tblitemmake VALUES("98","VDC");
INSERT INTO tblitemmake VALUES("99","M-2014");
INSERT INTO tblitemmake VALUES("100","18-1048");
INSERT INTO tblitemmake VALUES("101","MAGIC");
INSERT INTO tblitemmake VALUES("102","SYS");
INSERT INTO tblitemmake VALUES("103","MITSUBA WIPER MOTOR");
INSERT INTO tblitemmake VALUES("104","84-8");
INSERT INTO tblitemmake VALUES("105","4401");
INSERT INTO tblitemmake VALUES("106","4402");
INSERT INTO tblitemmake VALUES("107","UNIVERSAL HANDLE COVER");
INSERT INTO tblitemmake VALUES("108","DJ-6002");
INSERT INTO tblitemmake VALUES("109","HG-2161");
INSERT INTO tblitemmake VALUES("110","DJ-7003");
INSERT INTO tblitemmake VALUES("111","M-805");
INSERT INTO tblitemmake VALUES("112","E-422");
INSERT INTO tblitemmake VALUES("113","E-430");
INSERT INTO tblitemmake VALUES("114","2-POINTS");
INSERT INTO tblitemmake VALUES("115","HOSE CLAMP");
INSERT INTO tblitemmake VALUES("116","E-156");
INSERT INTO tblitemmake VALUES("117","14"");
INSERT INTO tblitemmake VALUES("118","15"");
INSERT INTO tblitemmake VALUES("119","YANKEE");
INSERT INTO tblitemmake VALUES("120","4001");
INSERT INTO tblitemmake VALUES("121","4651");
INSERT INTO tblitemmake VALUES("122","4652");
INSERT INTO tblitemmake VALUES("123","9212, 9214");
INSERT INTO tblitemmake VALUES("124","SYS-9214");
INSERT INTO tblitemmake VALUES("125","PRESTONE");
INSERT INTO tblitemmake VALUES("126","WS-001");
INSERT INTO tblitemmake VALUES("127","6002");
INSERT INTO tblitemmake VALUES("128","6052");
INSERT INTO tblitemmake VALUES("129","6014");
INSERT INTO tblitemmake VALUES("130","4002");
INSERT INTO tblitemmake VALUES("131","6001");
INSERT INTO tblitemmake VALUES("132","6024");
INSERT INTO tblitemmake VALUES("133","5006");
INSERT INTO tblitemmake VALUES("134","#13");
INSERT INTO tblitemmake VALUES("135","#14");
INSERT INTO tblitemmake VALUES("136","OFFROAD, DJ-906");
INSERT INTO tblitemmake VALUES("137","#6");
INSERT INTO tblitemmake VALUES("138","SJ-118");
INSERT INTO tblitemmake VALUES("139","E-392");
INSERT INTO tblitemmake VALUES("140","DJ-5001");
INSERT INTO tblitemmake VALUES("141","DJ-5002");
INSERT INTO tblitemmake VALUES("142","TACOMETER");
INSERT INTO tblitemmake VALUES("143","OFFROAD, DJ-902");
INSERT INTO tblitemmake VALUES("144","DJ-8035");
INSERT INTO tblitemmake VALUES("145","SJ-128");
INSERT INTO tblitemmake VALUES("146","H-740");
INSERT INTO tblitemmake VALUES("147","M-740");
INSERT INTO tblitemmake VALUES("148","DJ-100");
INSERT INTO tblitemmake VALUES("149","S-502");
INSERT INTO tblitemmake VALUES("150","S-501");
INSERT INTO tblitemmake VALUES("151","2 TRUMPETS");
INSERT INTO tblitemmake VALUES("152","9K-104");
INSERT INTO tblitemmake VALUES("153","9K-103, M-1074");
INSERT INTO tblitemmake VALUES("154","CL-207");
INSERT INTO tblitemmake VALUES("155","S-5902");
INSERT INTO tblitemmake VALUES("156","LAMBADA");
INSERT INTO tblitemmake VALUES("157","BEEP-BEEP");
INSERT INTO tblitemmake VALUES("158","THIS  CAR  IS  BACKING  UP");
INSERT INTO tblitemmake VALUES("159","MACARENA");
INSERT INTO tblitemmake VALUES("160","VS-540");
INSERT INTO tblitemmake VALUES("161","BACK SUPPORT");
INSERT INTO tblitemmake VALUES("162","MOTORCYCLE");
INSERT INTO tblitemmake VALUES("163","TOP LAMP");
INSERT INTO tblitemmake VALUES("164","1133");
INSERT INTO tblitemmake VALUES("165","2801");
INSERT INTO tblitemmake VALUES("166","DL-200");
INSERT INTO tblitemmake VALUES("167","M-760");
INSERT INTO tblitemmake VALUES("168","SUPER OFFROADER, 1281");
INSERT INTO tblitemmake VALUES("169","DJ-901");
INSERT INTO tblitemmake VALUES("170","2830");
INSERT INTO tblitemmake VALUES("171","E-380");
INSERT INTO tblitemmake VALUES("172","E-104");
INSERT INTO tblitemmake VALUES("173","CL-703");
INSERT INTO tblitemmake VALUES("174","VS-539");
INSERT INTO tblitemmake VALUES("175","1230, M-2017");
INSERT INTO tblitemmake VALUES("176","VS-562");
INSERT INTO tblitemmake VALUES("177","VS-558");
INSERT INTO tblitemmake VALUES("178","VS-559");
INSERT INTO tblitemmake VALUES("179","VS-564");
INSERT INTO tblitemmake VALUES("180","VS-567");
INSERT INTO tblitemmake VALUES("181","VS-568");
INSERT INTO tblitemmake VALUES("182","VS-571");
INSERT INTO tblitemmake VALUES("183","2548");
INSERT INTO tblitemmake VALUES("184","O-10");
INSERT INTO tblitemmake VALUES("185","M-2015");
INSERT INTO tblitemmake VALUES("186","M-2016");
INSERT INTO tblitemmake VALUES("187","SUPER OFFROADER, 1282");
INSERT INTO tblitemmake VALUES("188","E-294");
INSERT INTO tblitemmake VALUES("189","A-1");
INSERT INTO tblitemmake VALUES("190","3 IN 1 COCKPIT");
INSERT INTO tblitemmake VALUES("191","M-2010");
INSERT INTO tblitemmake VALUES("192","M-2011");
INSERT INTO tblitemmake VALUES("193","M-2020");
INSERT INTO tblitemmake VALUES("194","VS-893");
INSERT INTO tblitemmake VALUES("195","M-4");
INSERT INTO tblitemmake VALUES("196","JA-F2");
INSERT INTO tblitemmake VALUES("197","UFO");
INSERT INTO tblitemmake VALUES("198","JA-102");
INSERT INTO tblitemmake VALUES("199","DOUBLE FACE");
INSERT INTO tblitemmake VALUES("200","DUAL ANTENNA");
INSERT INTO tblitemmake VALUES("201","CH-535");
INSERT INTO tblitemmake VALUES("202","YH-5020");
INSERT INTO tblitemmake VALUES("203","YH-5021");
INSERT INTO tblitemmake VALUES("204","1141-1");
INSERT INTO tblitemmake VALUES("205","HG-3107,HG-5056");
INSERT INTO tblitemmake VALUES("206","CALIFORNIA SCENT");
INSERT INTO tblitemmake VALUES("207","GLX");
INSERT INTO tblitemmake VALUES("208","DJ-7001");
INSERT INTO tblitemmake VALUES("209","DJ-6052");
INSERT INTO tblitemmake VALUES("210","DJ-112");
INSERT INTO tblitemmake VALUES("211","H-1");
INSERT INTO tblitemmake VALUES("212","H-3");
INSERT INTO tblitemmake VALUES("213","H-2");
INSERT INTO tblitemmake VALUES("214","CHB");
INSERT INTO tblitemmake VALUES("215","M-2013");
INSERT INTO tblitemmake VALUES("216","H-4");
INSERT INTO tblitemmake VALUES("217","3770");
INSERT INTO tblitemmake VALUES("218","DJ-1030");
INSERT INTO tblitemmake VALUES("219","CBX");
INSERT INTO tblitemmake VALUES("220","VS-886");
INSERT INTO tblitemmake VALUES("221","VS-894");
INSERT INTO tblitemmake VALUES("222","SY-26");
INSERT INTO tblitemmake VALUES("223","MY CARR");
INSERT INTO tblitemmake VALUES("224","SCREW TYPE");
INSERT INTO tblitemmake VALUES("225","SY-8");
INSERT INTO tblitemmake VALUES("226","KDS");
INSERT INTO tblitemmake VALUES("227","E-467");
INSERT INTO tblitemmake VALUES("228","E-493");
INSERT INTO tblitemmake VALUES("229","S-5904");
INSERT INTO tblitemmake VALUES("230","E-652");
INSERT INTO tblitemmake VALUES("231","E-651");
INSERT INTO tblitemmake VALUES("232","E-495");
INSERT INTO tblitemmake VALUES("233","M-3100");
INSERT INTO tblitemmake VALUES("234","SY-16");
INSERT INTO tblitemmake VALUES("235","GI");
INSERT INTO tblitemmake VALUES("236","HU-1036");
INSERT INTO tblitemmake VALUES("237","E-74");
INSERT INTO tblitemmake VALUES("238","APOLLO");
INSERT INTO tblitemmake VALUES("239","BH-1155");
INSERT INTO tblitemmake VALUES("240","MINI");
INSERT INTO tblitemmake VALUES("241","WF-326");
INSERT INTO tblitemmake VALUES("242","3 TRUMPETS");
INSERT INTO tblitemmake VALUES("243","5 TRUMPETS");
INSERT INTO tblitemmake VALUES("244","SYS-4127");
INSERT INTO tblitemmake VALUES("245","4124");
INSERT INTO tblitemmake VALUES("246","4126");
INSERT INTO tblitemmake VALUES("247","4126, 4124");
INSERT INTO tblitemmake VALUES("248","4127");
INSERT INTO tblitemmake VALUES("249","E-482");
INSERT INTO tblitemmake VALUES("250","OVAL");
INSERT INTO tblitemmake VALUES("251","HU-1026");
INSERT INTO tblitemmake VALUES("252","PL-3254");
INSERT INTO tblitemmake VALUES("253","YC-385");
INSERT INTO tblitemmake VALUES("254","1375");
INSERT INTO tblitemmake VALUES("255","1385");
INSERT INTO tblitemmake VALUES("256","DJ-8054");
INSERT INTO tblitemmake VALUES("257","DJ-8057");
INSERT INTO tblitemmake VALUES("258","S-1150");
INSERT INTO tblitemmake VALUES("259","5"3/4 INNER");
INSERT INTO tblitemmake VALUES("260","5"3/4 OUTER");
INSERT INTO tblitemmake VALUES("261","E-347");
INSERT INTO tblitemmake VALUES("262","GALAXY");
INSERT INTO tblitemmake VALUES("263","DJ-767");
INSERT INTO tblitemmake VALUES("264","DJ-7002");
INSERT INTO tblitemmake VALUES("265","6000");
INSERT INTO tblitemmake VALUES("266","M-470, GREEN BODY");
INSERT INTO tblitemmake VALUES("267","EP-106");
INSERT INTO tblitemmake VALUES("268","A-160");
INSERT INTO tblitemmake VALUES("269","E-250");
INSERT INTO tblitemmake VALUES("270","E-350");
INSERT INTO tblitemmake VALUES("271","DISCO KM-105");
INSERT INTO tblitemmake VALUES("272","BH-1030");
INSERT INTO tblitemmake VALUES("273","BH-1022");
INSERT INTO tblitemmake VALUES("274","D-11");
INSERT INTO tblitemmake VALUES("275","M-770");
INSERT INTO tblitemmake VALUES("276","DJ-757");
INSERT INTO tblitemmake VALUES("277","D-16");
INSERT INTO tblitemmake VALUES("278","M-463");
INSERT INTO tblitemmake VALUES("279","SEARCHER");
INSERT INTO tblitemmake VALUES("280","RH-148");
INSERT INTO tblitemmake VALUES("281","M-472");
INSERT INTO tblitemmake VALUES("282","6 TONE");
INSERT INTO tblitemmake VALUES("283","1141");
INSERT INTO tblitemmake VALUES("284","JA-F1");
INSERT INTO tblitemmake VALUES("285","JA-101");
INSERT INTO tblitemmake VALUES("286","PUMA");
INSERT INTO tblitemmake VALUES("287","06-2314");
INSERT INTO tblitemmake VALUES("288","CA-12V");
INSERT INTO tblitemmake VALUES("289","CA-24V");
INSERT INTO tblitemmake VALUES("290","2201");
INSERT INTO tblitemmake VALUES("291","HELLA");
INSERT INTO tblitemmake VALUES("292","4405");
INSERT INTO tblitemmake VALUES("293","CH-327");
INSERT INTO tblitemmake VALUES("294","1245");
INSERT INTO tblitemmake VALUES("295","VS-541");
INSERT INTO tblitemmake VALUES("296","VS-543");
INSERT INTO tblitemmake VALUES("297","V-10");
INSERT INTO tblitemmake VALUES("298","6"");
INSERT INTO tblitemmake VALUES("299","M-467");
INSERT INTO tblitemmake VALUES("300","2804");
INSERT INTO tblitemmake VALUES("301","KZ-53");
INSERT INTO tblitemmake VALUES("302","C-105");
INSERT INTO tblitemmake VALUES("303","5520");
INSERT INTO tblitemmake VALUES("304","1275");
INSERT INTO tblitemmake VALUES("305","IPF");
INSERT INTO tblitemmake VALUES("306","KKD");
INSERT INTO tblitemmake VALUES("307","S-5224");
INSERT INTO tblitemmake VALUES("308","COMBINATION");
INSERT INTO tblitemmake VALUES("309","SUPER GRIP");
INSERT INTO tblitemmake VALUES("310","BAMBOO");
INSERT INTO tblitemmake VALUES("311","BEADS");
INSERT INTO tblitemmake VALUES("312","PHONE  TYPE");
INSERT INTO tblitemmake VALUES("313","PG-16");
INSERT INTO tblitemmake VALUES("314","PG-17");
INSERT INTO tblitemmake VALUES("315","BOSCH  RELAY");
INSERT INTO tblitemmake VALUES("316","LTF21W2");
INSERT INTO tblitemmake VALUES("317","CL-918");
INSERT INTO tblitemmake VALUES("318","DJ-949");
INSERT INTO tblitemmake VALUES("319","E-613");
INSERT INTO tblitemmake VALUES("320","E-614");
INSERT INTO tblitemmake VALUES("321","M-474");
INSERT INTO tblitemmake VALUES("322","M-464");
INSERT INTO tblitemmake VALUES("323","E-267");
INSERT INTO tblitemmake VALUES("324","E-271");
INSERT INTO tblitemmake VALUES("325","RH-130");
INSERT INTO tblitemmake VALUES("326","RH-131");
INSERT INTO tblitemmake VALUES("327","HU-1110");
INSERT INTO tblitemmake VALUES("328","MOCC");
INSERT INTO tblitemmake VALUES("329","HU-1041");
INSERT INTO tblitemmake VALUES("330","JET  AIR");
INSERT INTO tblitemmake VALUES("331","1270");
INSERT INTO tblitemmake VALUES("332","1238");
INSERT INTO tblitemmake VALUES("333","KJ-9");
INSERT INTO tblitemmake VALUES("334","6 SOUND");
INSERT INTO tblitemmake VALUES("335","A-29");
INSERT INTO tblitemmake VALUES("336","SIDE PILLAR");
INSERT INTO tblitemmake VALUES("337","M-585");
INSERT INTO tblitemmake VALUES("338","1247");
INSERT INTO tblitemmake VALUES("339","#67");
INSERT INTO tblitemmake VALUES("340","OPEN TYPE SINGLE");
INSERT INTO tblitemmake VALUES("341","RUBBER  DUCKIE");
INSERT INTO tblitemmake VALUES("342","285S");
INSERT INTO tblitemmake VALUES("343","CUSTOM VAN");
INSERT INTO tblitemmake VALUES("344","WHIP");
INSERT INTO tblitemmake VALUES("345","MF-039");
INSERT INTO tblitemmake VALUES("346","D-5");
INSERT INTO tblitemmake VALUES("347","LTES5");
INSERT INTO tblitemmake VALUES("348","LTD2W60");
INSERT INTO tblitemmake VALUES("349","LTF81W2");
INSERT INTO tblitemmake VALUES("350","3 WIDE MIRROR");
INSERT INTO tblitemmake VALUES("351","BABY TURBO");
INSERT INTO tblitemmake VALUES("352","M-473");
INSERT INTO tblitemmake VALUES("353","RAPID RELAY");
INSERT INTO tblitemmake VALUES("354","4191");
INSERT INTO tblitemmake VALUES("355","4291");
INSERT INTO tblitemmake VALUES("356","NAUTILUS");
INSERT INTO tblitemmake VALUES("357","9123");
INSERT INTO tblitemmake VALUES("358","M-471");
INSERT INTO tblitemmake VALUES("359","4412");
INSERT INTO tblitemmake VALUES("360","BP6ES");
INSERT INTO tblitemmake VALUES("361","ELECTRONIC");
INSERT INTO tblitemmake VALUES("362","INTERIOR");
INSERT INTO tblitemmake VALUES("363","NIKKO");
INSERT INTO tblitemmake VALUES("364","PILLOW  BOOT");
INSERT INTO tblitemmake VALUES("365","SY-731");
INSERT INTO tblitemmake VALUES("366","SOM");
INSERT INTO tblitemmake VALUES("367","HG-5001");
INSERT INTO tblitemmake VALUES("368","HU-5026");
INSERT INTO tblitemmake VALUES("369","HG-5050,HU-3156");
INSERT INTO tblitemmake VALUES("370","HG-5507,HU-3197,HU-3198");
INSERT INTO tblitemmake VALUES("371","HG-5076");
INSERT INTO tblitemmake VALUES("372","HG-5061");
INSERT INTO tblitemmake VALUES("373","HG-5062");
INSERT INTO tblitemmake VALUES("374","HU-3023,HG-5004");
INSERT INTO tblitemmake VALUES("375","HG-5003");
INSERT INTO tblitemmake VALUES("376","HG-5077");
INSERT INTO tblitemmake VALUES("377","HG-5096");
INSERT INTO tblitemmake VALUES("378","E-607");
INSERT INTO tblitemmake VALUES("379","HG-2022");
INSERT INTO tblitemmake VALUES("380","HG-2023");
INSERT INTO tblitemmake VALUES("381","HU-1005, HU-1003");
INSERT INTO tblitemmake VALUES("382","M-594L");
INSERT INTO tblitemmake VALUES("383","HG-5072");
INSERT INTO tblitemmake VALUES("384","HG-5044");
INSERT INTO tblitemmake VALUES("385","E-418");
INSERT INTO tblitemmake VALUES("386","E-473");
INSERT INTO tblitemmake VALUES("387","HG-5045");
INSERT INTO tblitemmake VALUES("388","HG-5092,  HGMB1024");
INSERT INTO tblitemmake VALUES("389","HU-5086");
INSERT INTO tblitemmake VALUES("390","1455");
INSERT INTO tblitemmake VALUES("391","E-346");
INSERT INTO tblitemmake VALUES("392","HU-3032");
INSERT INTO tblitemmake VALUES("393","HU-5079,FJ-045");
INSERT INTO tblitemmake VALUES("394","HU-5083");
INSERT INTO tblitemmake VALUES("395","HU-5090");
INSERT INTO tblitemmake VALUES("396","JF-10");
INSERT INTO tblitemmake VALUES("397","VS-882");
INSERT INTO tblitemmake VALUES("398","E-417");
INSERT INTO tblitemmake VALUES("399","E-423");
INSERT INTO tblitemmake VALUES("400","HU-4085");
INSERT INTO tblitemmake VALUES("401","KN-750L");
INSERT INTO tblitemmake VALUES("402","CL-520");
INSERT INTO tblitemmake VALUES("403","HU-1024");
INSERT INTO tblitemmake VALUES("404","34802");
INSERT INTO tblitemmake VALUES("405","TIY-505");
INSERT INTO tblitemmake VALUES("406","SJ-119");
INSERT INTO tblitemmake VALUES("407","CL-203");
INSERT INTO tblitemmake VALUES("408","M-666");
INSERT INTO tblitemmake VALUES("409","HG-4407");
INSERT INTO tblitemmake VALUES("410","SYF-88");
INSERT INTO tblitemmake VALUES("411","E-357,SB-10");
INSERT INTO tblitemmake VALUES("412","S-67");
INSERT INTO tblitemmake VALUES("413","SWAN LAMP");
INSERT INTO tblitemmake VALUES("414","CL-715");
INSERT INTO tblitemmake VALUES("415","M-2002");
INSERT INTO tblitemmake VALUES("416","HU-1044");
INSERT INTO tblitemmake VALUES("417","TIY-528");
INSERT INTO tblitemmake VALUES("418","TIY-504");
INSERT INTO tblitemmake VALUES("419","SJ-101");
INSERT INTO tblitemmake VALUES("420","KOA 2139");
INSERT INTO tblitemmake VALUES("421","HG-5104");
INSERT INTO tblitemmake VALUES("422","2336");
INSERT INTO tblitemmake VALUES("423","4125");
INSERT INTO tblitemmake VALUES("424","37034");
INSERT INTO tblitemmake VALUES("425","#158");
INSERT INTO tblitemmake VALUES("426","#619");
INSERT INTO tblitemmake VALUES("427","#634");
INSERT INTO tblitemmake VALUES("428","#69");
INSERT INTO tblitemmake VALUES("429","10X31");
INSERT INTO tblitemmake VALUES("430","10X36");
INSERT INTO tblitemmake VALUES("431","11X44");
INSERT INTO tblitemmake VALUES("432","250  PSI   MINI");
INSERT INTO tblitemmake VALUES("433","3 PINS");
INSERT INTO tblitemmake VALUES("434","4 PINS");
INSERT INTO tblitemmake VALUES("435","AIR  TYPE");
INSERT INTO tblitemmake VALUES("436","AIR PRESSURE");
INSERT INTO tblitemmake VALUES("437","AMPERE");
INSERT INTO tblitemmake VALUES("438","ASTRO");
INSERT INTO tblitemmake VALUES("439","BADMINTON  DESIGN");
INSERT INTO tblitemmake VALUES("440","BFM");
INSERT INTO tblitemmake VALUES("441","BH-1151");
INSERT INTO tblitemmake VALUES("442","BH-1209");
INSERT INTO tblitemmake VALUES("443","BH-1251");
INSERT INTO tblitemmake VALUES("444","BULL");
INSERT INTO tblitemmake VALUES("445","CB  TYPE");
INSERT INTO tblitemmake VALUES("446","CL-204");
INSERT INTO tblitemmake VALUES("447","CL-307");
INSERT INTO tblitemmake VALUES("448","DING DONG BELL");
INSERT INTO tblitemmake VALUES("449","DISCO LAMP UFO");
INSERT INTO tblitemmake VALUES("450","E-0347,GT  PHANTOM");
INSERT INTO tblitemmake VALUES("451","E-304");
INSERT INTO tblitemmake VALUES("452","EAGLE  TYPE");
INSERT INTO tblitemmake VALUES("453","FLORESCENT  TWIN");
INSERT INTO tblitemmake VALUES("454","FLOWER");
INSERT INTO tblitemmake VALUES("455","FOR  REAR  GLASS");
INSERT INTO tblitemmake VALUES("456","GT  PHANTOM");
INSERT INTO tblitemmake VALUES("457","HOOD ORNAMENT");
INSERT INTO tblitemmake VALUES("458","HU-1006");
INSERT INTO tblitemmake VALUES("459","HU-1010");
INSERT INTO tblitemmake VALUES("460","HU-1046");
INSERT INTO tblitemmake VALUES("461","HU-1093");
INSERT INTO tblitemmake VALUES("462","HU-3033");
INSERT INTO tblitemmake VALUES("463","HU-3051");
INSERT INTO tblitemmake VALUES("464","HU-5053");
INSERT INTO tblitemmake VALUES("465","INCOMPLETE");
INSERT INTO tblitemmake VALUES("466","J-130");
INSERT INTO tblitemmake VALUES("467","JBA-60");
INSERT INTO tblitemmake VALUES("468","LEATHER");
INSERT INTO tblitemmake VALUES("469","LOCK  TYPE");
INSERT INTO tblitemmake VALUES("470","M-2018");
INSERT INTO tblitemmake VALUES("471","M-2021");
INSERT INTO tblitemmake VALUES("472","M-2022");
INSERT INTO tblitemmake VALUES("473","M-3101");
INSERT INTO tblitemmake VALUES("474","M-38");
INSERT INTO tblitemmake VALUES("475","M-803");
INSERT INTO tblitemmake VALUES("476","MAGNETIC");
INSERT INTO tblitemmake VALUES("477","MEAN  MOTHER");
INSERT INTO tblitemmake VALUES("478","MEDIUM");
INSERT INTO tblitemmake VALUES("479","MINI UFO");
INSERT INTO tblitemmake VALUES("480","MONZA");
INSERT INTO tblitemmake VALUES("481","ND FUEL");
INSERT INTO tblitemmake VALUES("482","ND-129");
INSERT INTO tblitemmake VALUES("483","NIKEN");
INSERT INTO tblitemmake VALUES("484","NS-1160");
INSERT INTO tblitemmake VALUES("485","NS-1162");
INSERT INTO tblitemmake VALUES("486","NS-1181");
INSERT INTO tblitemmake VALUES("487","NS-157");
INSERT INTO tblitemmake VALUES("488","OIL");
INSERT INTO tblitemmake VALUES("489","PIERROR");
INSERT INTO tblitemmake VALUES("490","PL-1074");
INSERT INTO tblitemmake VALUES("491","PL-1076");
INSERT INTO tblitemmake VALUES("492","PL-1079");
INSERT INTO tblitemmake VALUES("493","PLUG-IN");
INSERT INTO tblitemmake VALUES("494","POLE  TYPE");
INSERT INTO tblitemmake VALUES("495","POLICE  SIREN");
INSERT INTO tblitemmake VALUES("496","POWER  TONE");
INSERT INTO tblitemmake VALUES("497","RACING");
INSERT INTO tblitemmake VALUES("498","RB-160");
INSERT INTO tblitemmake VALUES("499","S-2031");
INSERT INTO tblitemmake VALUES("500","S-2036");
INSERT INTO tblitemmake VALUES("501","S-5919");
INSERT INTO tblitemmake VALUES("502","SIREN");
INSERT INTO tblitemmake VALUES("503","SJ-309");
INSERT INTO tblitemmake VALUES("504","SJ-359");
INSERT INTO tblitemmake VALUES("505","SKI DESIGN");
INSERT INTO tblitemmake VALUES("506","SKULL LAMP");
INSERT INTO tblitemmake VALUES("507","SL-3");
INSERT INTO tblitemmake VALUES("508","SPEEDOMETER");
INSERT INTO tblitemmake VALUES("509","SPM-10");
INSERT INTO tblitemmake VALUES("510","SWAN LENS");
INSERT INTO tblitemmake VALUES("511","SYF-300");
INSERT INTO tblitemmake VALUES("512","TEMPERATURE");
INSERT INTO tblitemmake VALUES("513","TRANSISTOR  ECHO");
INSERT INTO tblitemmake VALUES("514","TURTLE WAX");
INSERT INTO tblitemmake VALUES("515","V-940");
INSERT INTO tblitemmake VALUES("516","VHT");
INSERT INTO tblitemmake VALUES("517","VOYAGER");
INSERT INTO tblitemmake VALUES("518","VS-864");
INSERT INTO tblitemmake VALUES("519","VS-878");
INSERT INTO tblitemmake VALUES("520","WF-126");
INSERT INTO tblitemmake VALUES("521","WOODEN");
INSERT INTO tblitemmake VALUES("522","16"");
INSERT INTO tblitemmake VALUES("523","17"");
INSERT INTO tblitemmake VALUES("524","18"");
INSERT INTO tblitemmake VALUES("525","19"");
INSERT INTO tblitemmake VALUES("526","SJ-709");
INSERT INTO tblitemmake VALUES("527","E-266");
INSERT INTO tblitemmake VALUES("528","20"");
INSERT INTO tblitemmake VALUES("529","21"");
INSERT INTO tblitemmake VALUES("530","22"");
INSERT INTO tblitemmake VALUES("531","24"");
INSERT INTO tblitemmake VALUES("532","27"");
INSERT INTO tblitemmake VALUES("533","E-264");
INSERT INTO tblitemmake VALUES("534","#7");
INSERT INTO tblitemmake VALUES("535","S-5920A");
INSERT INTO tblitemmake VALUES("536","FAN FAREN");
INSERT INTO tblitemmake VALUES("537","VS-892");
INSERT INTO tblitemmake VALUES("538","POWERSONIC");
INSERT INTO tblitemmake VALUES("539","H-7");
INSERT INTO tblitemmake VALUES("540","9005");
INSERT INTO tblitemmake VALUES("541","9006");
INSERT INTO tblitemmake VALUES("542","NANE");
INSERT INTO tblitemmake VALUES("543","KEY MATE");
INSERT INTO tblitemmake VALUES("544","SJ-707");
INSERT INTO tblitemmake VALUES("545","BH-1376");
INSERT INTO tblitemmake VALUES("546","SH-1371");
INSERT INTO tblitemmake VALUES("547","DJ-400");
INSERT INTO tblitemmake VALUES("548","DJ-99");
INSERT INTO tblitemmake VALUES("549","E-265");
INSERT INTO tblitemmake VALUES("550","TORA-TORA");
INSERT INTO tblitemmake VALUES("551","GEN");
INSERT INTO tblitemmake VALUES("552","RED ZONE");
INSERT INTO tblitemmake VALUES("553","PLASTIC BASE,STEEL & SCREW");
INSERT INTO tblitemmake VALUES("554","GT");
INSERT INTO tblitemmake VALUES("555","CL-500");
INSERT INTO tblitemmake VALUES("556","HU-2223");
INSERT INTO tblitemmake VALUES("557","NS-515");
INSERT INTO tblitemmake VALUES("558","WF-902");
INSERT INTO tblitemmake VALUES("559","LTF 3101 A/F");
INSERT INTO tblitemmake VALUES("560","LTF 3102 B/F");
INSERT INTO tblitemmake VALUES("561","LTF W2");
INSERT INTO tblitemmake VALUES("562","LTF2000");
INSERT INTO tblitemmake VALUES("563","DPS 3030");
INSERT INTO tblitemmake VALUES("564","COMFORT");
INSERT INTO tblitemmake VALUES("565","KB-9800");
INSERT INTO tblitemmake VALUES("566","40FYMJK");
INSERT INTO tblitemmake VALUES("567","VS-359");
INSERT INTO tblitemmake VALUES("568","M-1467 TOP LAMP");
INSERT INTO tblitemmake VALUES("569","644 A210 A/F");
INSERT INTO tblitemmake VALUES("570","E-427");
INSERT INTO tblitemmake VALUES("571","E-426");
INSERT INTO tblitemmake VALUES("572","BH-1381");
INSERT INTO tblitemmake VALUES("573","KZ-56");
INSERT INTO tblitemmake VALUES("574","2002");
INSERT INTO tblitemmake VALUES("575","10 TONS");
INSERT INTO tblitemmake VALUES("576","15 TONS");
INSERT INTO tblitemmake VALUES("577","18-1023");
INSERT INTO tblitemmake VALUES("578","20 TONS");
INSERT INTO tblitemmake VALUES("579","3 TONS");
INSERT INTO tblitemmake VALUES("580","5 TONS");
INSERT INTO tblitemmake VALUES("581","DISCO");
INSERT INTO tblitemmake VALUES("582","ELECTRONIC SIREN");
INSERT INTO tblitemmake VALUES("583","FL-10");
INSERT INTO tblitemmake VALUES("584","HOTDOG");
INSERT INTO tblitemmake VALUES("585","WD-40");
INSERT INTO tblitemmake VALUES("586","WT-15");
INSERT INTO tblitemmake VALUES("587","WANG WANG");
INSERT INTO tblitemmake VALUES("588","MITAN BANANA");
INSERT INTO tblitemmake VALUES("589","5X10");
INSERT INTO tblitemmake VALUES("590","H-100");
INSERT INTO tblitemmake VALUES("591","NO. 12");
INSERT INTO tblitemmake VALUES("592","RH-136");
INSERT INTO tblitemmake VALUES("593","RH-426");
INSERT INTO tblitemmake VALUES("594","RH-434");
INSERT INTO tblitemmake VALUES("595","LY-929");
INSERT INTO tblitemmake VALUES("596","K-5");
INSERT INTO tblitemmake VALUES("597","OFFROAD");
INSERT INTO tblitemmake VALUES("598","NEWTON ALARM");
INSERT INTO tblitemmake VALUES("599","SWALLOW");
INSERT INTO tblitemmake VALUES("600","JET AIR");
INSERT INTO tblitemmake VALUES("601","SJ-127");
INSERT INTO tblitemmake VALUES("602","MF-512");
INSERT INTO tblitemmake VALUES("603","M-1400");
INSERT INTO tblitemmake VALUES("604","HT8010");
INSERT INTO tblitemmake VALUES("605","WAGNEER");
INSERT INTO tblitemmake VALUES("606","test");
INSERT INTO tblitemmake VALUES("608","Lego - Harry Potter #2");
INSERT INTO tblitemmake VALUES("609","Lego - Harry Potter #3");
INSERT INTO tblitemmake VALUES("610","Lego - Harry Potter #4");
INSERT INTO tblitemmake VALUES("611","Lego - Harry Potter #5");
INSERT INTO tblitemmake VALUES("612","Lego - Harry Potter #6");
INSERT INTO tblitemmake VALUES("613","Lego - Harry Potter #7");
INSERT INTO tblitemmake VALUES("614","Lego - Harry Potter #8");
INSERT INTO tblitemmake VALUES("615","SPORTS CAR");



CREATE TABLE `tblmenu` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(255) DEFAULT NULL,
  `menucode` varchar(50) DEFAULT NULL,
  `groupmenu` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `tblName` varchar(50) DEFAULT NULL,
  `menutype` int(5) DEFAULT 0,
  `icon` varchar(255) DEFAULT NULL,
  `caret` varchar(255) DEFAULT NULL,
  `USERID` varchar(255) DEFAULT NULL,
  `STATUS` int(1) DEFAULT 0,
  `dbcolumn` int(1) DEFAULT 1,
  `dtrange` char(3) DEFAULT 'no',
  `asof` char(3) DEFAULT 'no',
  `bygroup` varchar(50) DEFAULT NULL,
  `func_name` varchar(255) DEFAULT NULL,
  `sorting` varchar(50) DEFAULT NULL,
  `where_filter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `menucode` (`menucode`,`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

INSERT INTO tblmenu VALUES("1","Products Master File","1000","1000","#","tblProduct","1","fa fa-bar-chart fa-fw","fa fa-caret-down","128","","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","INACTIVE !='No'");
INSERT INTO tblmenu VALUES("2","Products","1001","1000","products","","2","fa fa-bars fa-fw","","128","","1","no","no","","PrintDataView","","");
INSERT INTO tblmenu VALUES("3","Categories","1005","1000","category","","2","fa fa-cubes fa-fw","","128","","1","no","no","","PrintDataImg","","");
INSERT INTO tblmenu VALUES("4","Sales","2000","2000","#","","1","fa fa-shopping-cart fa-fw","fa fa-caret-down","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("5","Invoicing","2001","2000","invoicing","","2","fa fa-shopping-cart fa-fw","","128","","2","no","no","","","","");
INSERT INTO tblmenu VALUES("6","Sales Return","2002","2000","sareturn","","2","fa fa-sliders fa-fw","","128","","2","no","no","","","","");
INSERT INTO tblmenu VALUES("8","Customer","1101","1100","customer","","2","fa fa-group fa-fw","","128","","2","no","no","","","","");
INSERT INTO tblmenu VALUES("9","Salesman","1103","1100","salesman","","2","fa fa-user fa-fw","","128","","2","no","no","","","","");
INSERT INTO tblmenu VALUES("10","Area","1104","1100","area","","2","fa fa-globe fa-fw","","128","","2","no","no","","","","");
INSERT INTO tblmenu VALUES("11","Purchase","3000","3000","#","","1","fa fa-truck fa-fw","fa fa-caret-down","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("12","Purchase Order","3001","3000","p_order","","2","fa fa-clipboard fa-fw","","128","","3","no","no","","","","");
INSERT INTO tblmenu VALUES("13","Receiving Report","3002","3000","receiving","","2","fa fa-list-alt fa-fw","#","128","","3","no","no","","","","");
INSERT INTO tblmenu VALUES("14","Purchase Return","3003","3000","pureturn","","2","fa fa-sliders fa-fw","#","128","","3","no","no","","","","");
INSERT INTO tblmenu VALUES("16","Settings","9000","9000","#","","1","fa fa-gear fa-fw","fa fa-caret-down","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("17","Users","9001","9000","user","","2","fa fa-group fa-fw","","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("18","Back-Up Data","9002","9000","backup","","2","fa fa-save fa-fw","","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("19","Restore Data","9003","9000","#","","2","fa fa-archive fa-fw","","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("20","Supplier","1102","1100","supplier","","2","fa fa-group fa-fw","","128","","3","no","no","","","","");
INSERT INTO tblmenu VALUES("22","Report","9900","9900","report","","3","fa fa-print fa-fw","#","128","","1","no","no","","","","");
INSERT INTO tblmenu VALUES("23","List of Products","1001","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","INACTIVE !='No'");
INSERT INTO tblmenu VALUES("24","Product Brochure","1002","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataImg","PRONAME, CATEGORIES","INACTIVE !='No'");
INSERT INTO tblmenu VALUES("25","New Release Products","1003","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","yes","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","INACTIVE !='No'");
INSERT INTO tblmenu VALUES("26","Product For Re-Order","1004","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","INACTIVE !='No' and qty <= REORDER");
INSERT INTO tblmenu VALUES("31","Customers","2100","2100","","tblcustomer","5","fa fa-list-alt fa-fw","","128","0","1","no","no","","PrintDataView","","");
INSERT INTO tblmenu VALUES("32","Customers List","2101","2100","","tblcustomer","4","fa fa-list-alt fa-fw","","128","0","1","no","no","","PrintDataView","","");
INSERT INTO tblmenu VALUES("33","Inactive Products","1005","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","INACTIVE ='No'");
INSERT INTO tblmenu VALUES("34","Products with Zero (0) Stocks","1006","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","qty <= 0 and INACTIVE !='No'");
INSERT INTO tblmenu VALUES("35","Products By Supplier","1007","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","INACTIVE !='No'");
INSERT INTO tblmenu VALUES("36","Products By Customer","1008","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","no","no","CATEGORIES, BRAND/MODEL","PrintDataView","PRONAME, CATEGORIES","INACTIVE !='No'");
INSERT INTO tblmenu VALUES("37","Product Log (In/Out)","1009","1000","","tblProduct","4","fa fa-list-alt fa-fw","","128","0","1","no","yes","PRONAME","PrintDataView","PRONAME, CATEGORIES","INACTIVE !='No'");
INSERT INTO tblmenu VALUES("38","Car Brand","1002","1000","carbrand","","2","fa fa-car fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("39","Car Make","1003","1000","carmake","","2","fa fa-cab fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("40","Item Make","1004","1000","itemmake","","2","fa fa-industry fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("41","Country Made","1006","1000","country","","2","fa fa-flag fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("42","Item Brand","1007","1000","itembrand","","2","fa fa-steam fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("43","Color","1008","1000","color","","2","fa fa-th fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("44","Stock Type","1009","1000","stocktype","","2","fa fa-tags fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("45","Master File","1100","1100","#","","1","fa fa-building fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("46","Status","1105","1100","status","","2","fa fa-bell fa-fw","","128","0","1","no","no","","","","");
INSERT INTO tblmenu VALUES("47","Replacement","2003","2000","adjustment","","2","fa fa-gears fa-fw","","128","0","2","no","no","","","","");
INSERT INTO tblmenu VALUES("48","Inventory Adustment","1010","1000","adjustment/index.php?view=new","","2","fa fa-gears fa-fw","","128","0","1","no","no","","","","");



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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tblpodetl VALUES("1","1","PO-2006160M2","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","200.00","10.00","0.00","0.00","2000.00","10.00","200.00","2000.00","120512","200","1300.00","30.00","PCS");
INSERT INTO tblpodetl VALUES("2","2","PO-20062S71I","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","200.00","1.00","0.00","0.00","200.00","1.00","200.00","200.00","120512","200","1300.00","30.00","PCS");



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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tblpohead VALUES("1","PO-2006160M2","","2020-06-12","AAASDFS","AA342","58","2000.00","0.00","0.00","2000.00","TEST","30","2020-07-12","","128","Jimmy R. Santos","CNY","1.00","2000.00","0.00","no");
INSERT INTO tblpohead VALUES("2","PO-20062S71I","","2020-06-12","AAASDFS","AA342","58","200.00","0.00","0.00","200.00","","30","2020-07-12","","128","Jimmy R. Santos","CNY","1.00","200.00","0.00","no");



CREATE TABLE `tblproduct` (
  `PROID` int(11) NOT NULL AUTO_INCREMENT,
  `PROCODE` varchar(20) DEFAULT NULL,
  `PRONAME` varchar(255) DEFAULT NULL,
  `entdate` date DEFAULT NULL,
  `CARBRAND` varchar(50) DEFAULT NULL,
  `PROMODEL` varchar(30) DEFAULT NULL,
  `PROBRAND` varchar(255) DEFAULT NULL,
  `PRODESC` varchar(255) DEFAULT NULL,
  `PROQTY` double(12,2) DEFAULT 0.00,
  `MAXQTY` double(12,2) DEFAULT 0.00,
  `REORDER` double(12,2) DEFAULT 0.00,
  `PROPRICE` double(12,2) DEFAULT 0.00,
  `WPROPRICE` double(12,2) DEFAULT 0.00,
  `PPROPRICE` double(12,2) DEFAULT 0.00,
  `PROMARGIN` double(6,2) DEFAULT 0.00,
  `CATEGID` int(11) DEFAULT NULL,
  `IMAGES` varchar(255) DEFAULT NULL,
  `PROSTATS` varchar(30) DEFAULT NULL,
  `CATEGORIES` varchar(255) DEFAULT NULL,
  `PURPRICE` double(12,2) DEFAULT 0.00,
  `FORPURPRICE` double(12,2) DEFAULT 0.00,
  `FOREX` char(5) DEFAULT 'PHP',
  `AVGCOST` double(12,2) NOT NULL DEFAULT 0.00,
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
  `ITEMBRAND` varchar(100) DEFAULT NULL,
  `COLOR` varchar(50) DEFAULT NULL,
  `VOLTS` int(5) DEFAULT 0,
  `WATTS` int(5) DEFAULT 0,
  `STOCKTYPE` varchar(50) DEFAULT NULL,
  `UNIT` char(20) DEFAULT NULL,
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
  PRIMARY KEY (`PROID`),
  UNIQUE KEY `PROCODE` (`PROCODE`),
  KEY `CATEGID` (`CATEGID`),
  KEY `PRONAME` (`PRONAME`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO tblproduct VALUES("1","51205","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","2020-06-11","LAMBORGHINI ( TEST )","","","","101.00","300.00","50.00","10500.00","12000.00","11550.00","10.00","","uploads/1_download.jPEG","","GLASS LENS","10000.00","200.00","PHP","180.00","1300.00","30.00","No","GALLARDO","SPORTS CAR","2020","2020","FRONT","","PHILIPPINES","Lego #1","Lava Red ( Test )","220","110","ACCESSORIES","PCS","5","C-55","200","TEST...","YOUNGBROS","YOU-000001","120512","100.00","180.00","10.00");



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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tblpurchasedetl VALUES("11","11","1","1","RR-2006I50E7","PO-2006160M2","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","200.00","10.00","0.00","0.00","2000.00","0.00","PCS","120512","0","200.00","2000.00","30.00","1300.00");
INSERT INTO tblpurchasedetl VALUES("12","12","2","2","RR-2006MG1SJ","PO-20062S71I","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","200.00","1.00","0.00","0.00","200.00","0.00","PCS","120512","0","200.00","200.00","30.00","1300.00");



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
  PRIMARY KEY (`RRID`),
  KEY `rrno` (`rrno`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

INSERT INTO tblpurchasehead VALUES("11","RR-2006I50E7","","2020-06-12","AAASDFS","AA342","58","2000.00","0.00","0.00","2000.00","","21","2020-07-03","0.00","128","Jimmy R. Santos","0.00","0.00","CNY","1.00","2000.00");
INSERT INTO tblpurchasehead VALUES("12","RR-2006MG1SJ","","2020-06-12","AAASDFS","AA342","58","200.00","0.00","0.00","200.00","","30","2020-07-12","0.00","128","Jimmy R. Santos","0.00","0.00","CNY","1.00","200.00");



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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tblsalesman VALUES("2","SMAN 1","SMAN001","SDFSDF","","SDFS","SDFSSDFDSDFS@YAHOO.COM","2020-05-31"," ","","0.00");
INSERT INTO tblsalesman VALUES("3","DAFDSF3dsafdf","DFADSdfadsf","SDF43232sdf","AM-COD","ADFS322432as","JIMa@JIM.COM","2020-04-01","SDFASDaaaaaaFA","DFADSFdsfas","12.00");
INSERT INTO tblsalesman VALUES("4","GTECHMAN","GTE2061C8207","GTA SAN ANDREAS","WEEKDAYS","9270564223","GTECHGAMING@GMAIL.COM","2020-06-11","test...","ADMIN","10.00");



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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




CREATE TABLE `tblslshead` (
  `SLSID` int(11) NOT NULL AUTO_INCREMENT,
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
  `PAIDAMT` double(12,2) DEFAULT NULL,
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
  PRIMARY KEY (`SLSID`),
  KEY `invoiceno` (`INVOICENO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO tblstockadjustdetl VALUES("2","10","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","10.00","PCS","0.00");
INSERT INTO tblstockadjustdetl VALUES("3","11","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","10.00","PCS","0.00");
INSERT INTO tblstockadjustdetl VALUES("4","12","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","20.00","PCS","0.00");
INSERT INTO tblstockadjustdetl VALUES("7","14","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","1.00","PCS","0.00");
INSERT INTO tblstockadjustdetl VALUES("8","15","1","LAMBORGHINI ( TEST ) GALLARDO SPORTS CAR 2020 GLASS LENS FRONT PHILIPPINES Lego #1 Lava Red ( Test ) 220V 110W","51205","9.00","PCS","0.00");



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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

INSERT INTO tblstockadjusthead VALUES("15","AD200600030","Less","23123","2020-06-11","","","0","DSFASDF","128","Jimmy R. Santos","DFSAD","no");
INSERT INTO tblstockadjusthead VALUES("14","AD200603000","Replacement","321","2020-06-11","A. BONIFACIO AUTO SUPPLY","A. 00001","3","ADFSDFASD","128","Jimmy R. Santos","HH","no");
INSERT INTO tblstockadjusthead VALUES("12","AD200607602","Less","","2020-06-11","","","0","SFS","128","Jimmy R. Santos","HHH","no");
INSERT INTO tblstockadjusthead VALUES("10","AD200602063","Beginning","","2020-06-11","","","0","TEST","128","Jimmy R. Santos","JRS","no");
INSERT INTO tblstockadjusthead VALUES("11","AD200601080","Return","31231","2020-06-11","","","0","","128","Jimmy R. Santos","TEST","no");



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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO tblstockin VALUES("2","2020-06-11 00:00:00","10","2","AD","AD200602063","1","10.00","0.00","180.00","128");
INSERT INTO tblstockin VALUES("3","2020-06-11 00:00:00","11","3","AD","AD200601080","1","10.00","0.00","180.00","128");
INSERT INTO tblstockin VALUES("4","2020-06-11 00:00:00","12","4","AD","AD200607602","1","0.00","20.00","180.00","128");
INSERT INTO tblstockin VALUES("7","2020-06-11 00:00:00","14","7","AD","AD200603000","1","0.00","1.00","180.00","128");
INSERT INTO tblstockin VALUES("8","2020-06-11 00:00:00","15","8","AD","AD200600030","1","0.00","9.00","180.00","128");
INSERT INTO tblstockin VALUES("17","2020-06-12 00:00:00","11","11","RR","RR-2006I50E7","1","10.00","0.00","200.00","128");
INSERT INTO tblstockin VALUES("18","2020-06-12 00:00:00","12","12","RR","RR-2006MG1SJ","1","1.00","0.00","200.00","128");



CREATE TABLE `tblstocktype` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `STOCKTYPE` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `STOCKTYPE` (`STOCKTYPE`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO tblstocktype VALUES("1","HU/HG/VS PRODUCTS");
INSERT INTO tblstocktype VALUES("2","LAMP");
INSERT INTO tblstocktype VALUES("3","MIRROR");
INSERT INTO tblstocktype VALUES("4","LENS");
INSERT INTO tblstocktype VALUES("5","BODY PARTS");
INSERT INTO tblstocktype VALUES("6","FRAME/HOUSING");
INSERT INTO tblstocktype VALUES("7","ACCESSORIES");
INSERT INTO tblstocktype VALUES("8","WIPER");
INSERT INTO tblstocktype VALUES("9","BULB");
INSERT INTO tblstocktype VALUES("14","LED LIGHTS ( TEST )");



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
  `creditlimit` double(12,2) DEFAULT 0.00,
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

INSERT INTO tblsupplier VALUES("7","TYC","TYC-000001","","","","","30","","","0.00","21515012.60","0.00","No","","","","NTD","","","");
INSERT INTO tblsupplier VALUES("8","MEC","LIH-000001","","","","","75","","","0.00","11555567.10","0.00","No","","","","NTD","","","");
INSERT INTO tblsupplier VALUES("9","FORTUNE","FOR-000001","","","","","30","","","0.00","8382917.75","0.00","No","","","","USD","","","");
INSERT INTO tblsupplier VALUES("10","HIEC","HIE-000001","","","","","30","","","0.00","0.00","0.00","No","","","","USD","","","");
INSERT INTO tblsupplier VALUES("11","AUTOSAX","AUT-000001","","","","","30","","","0.00","14106932.20","0.00","No","","","","NTD","","","");
INSERT INTO tblsupplier VALUES("12","YAMATA","YAM-000001","F","","","","0","","","0.00","2469025.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("13","FRESHMAN","FRE-000001","18 Ubay St. Bgy. Sienna Sta. Mesa Heights Quezon City","","743-2626, 781-4510, 749-0111","","120","","","0.00","3092814.00","0.00","No","ALVIN","SALES/ACCOUNTS","","PHP","","","");
INSERT INTO tblsupplier VALUES("14","SVK MKTG.","SVK-000001","B4 L6 Pina Santol Subd. Manila","","713-6204, 713-6288","","30","","","0.00","79645.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("15","DEIREL ENT.","DEI-000001","2939 Bagac St. Manuguit Tondo Manila","","256-0846","","120","","","0.00","1317265.80","0.00","No","ROMAN","","254-2182","PHP","","","");
INSERT INTO tblsupplier VALUES("16","JIALU MKTG.","JIA-000001","2nd Floor 60 Bagong Lote Potrero Malabon City","","3656380, 3656381","","120","","","0.00","1134826.00","0.00","No","YUMI","ACCOUNTS","","PHP","","","");
INSERT INTO tblsupplier VALUES("17","MITSUI","MIT-000001","","","9831111, 361-3333","","120","","","0.00","30360.00","0.00","No","RIZA","ACCOUNTS","","PHP","","","");
INSERT INTO tblsupplier VALUES("18","SHERATONE","SHE-000001","","","","","120","","","0.00","23030.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("19","INTRAMUROS","INT-000001","115 Hon G. Roxas St. SMH Quezon City","","","","0","","","0.00","128490.00","0.00","No","REMY","","","PHP","","","");
INSERT INTO tblsupplier VALUES("20","METROSTAR","MET-000001","","","","","120","","","0.00","278309.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("21","JR MULTI BUSINESS RESOURCES, INC.","JR -000001","111 Don Manuel Agregado Street, Sta. Mesa Heights, Quezon City","","732-4870, 741-0569, 741-9279","","0","","","0.00","174225.00","0.00","No","","415-0597, 415-0988","02-7430269","","","","");
INSERT INTO tblsupplier VALUES("22","XXXBESTAT AUTOPHIL CORP.","BES-000001","115 Hon G. Roxas St. SMH Quezon City","","364-4204","","180","","","0.00","1047974.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("23","LEVIN AUTOMOTIVE PARTS CENTER","LEV-000001","95-A Banaue St. cor. Macopa St. Quezon City","","711-4057, 711-4129, 711-9255","","7","","","0.00","136500.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("24","TYLER MKTG.","TYL-000001","","","","","120","","","0.00","4100.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("25","NEW EXTENSIVE AUTO SUPPLY","NEW-000001","","","","","7","","","0.00","12800.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("26","METRO-PRO SALES CENTER","MET-000002","16 Sapocoy St. Bgy. Manresa Quezon City","","412-7427, 364-2496, 416-8106","","120","","","0.00","0.00","0.00","No","","","364-2796","PHP","","","");
INSERT INTO tblsupplier VALUES("27","YOUNGBROS","YOU-000001","","","","","120","","","0.00","0.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("28","PRIME LINK MULTI PARTS","PRI-000001","35-D Kabignayan St. Tatalon Dist. 4 Quezon City
TIN: 205-890-911-000-VAT","","732-9265","","0","","","0.00","104490.00","0.00","No","MARIA OROSA CO SIA CHUA","","732-9598","","","","");
INSERT INTO tblsupplier VALUES("29","WYLEY MULTI SALES","WYL-000001","395 BANAUE ST. PROSPERITY BLDG. 4TH FLOOR QUEZON CITY","","741-1421, 740-3231/3228","","120","","","0.00","88887.00","0.00","No","ABIGAIL SIA NG","","414-6662","PHP","","","");
INSERT INTO tblsupplier VALUES("30","AQUILINO MKTG","AQU-000001","56 Sicaba St. St. Peter Quezon City","","731-7028, 731-7029, 732-7712","","0","","","0.00","89615.00","0.00","No","","","TEL: 732-7710","","","","");
INSERT INTO tblsupplier VALUES("31","CB 1","JIA-000002","JIANG TONG CHINA","","","","0","","","0.00","16186347.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("32","B & S","BAS-000001","Ubay St. Quezon City","","","","0","","","0.00","680.00","0.00","No","BEN","","","PHP","","","");
INSERT INTO tblsupplier VALUES("33","GRAICEARL","GRA-000001","","","","","0","","","0.00","3528.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("34","HAP HIENGL MARKETING CORPORATION","HAP-000001","9 Juliana St., Potrero, Malabon City","","361-3382, 366-8079","","0","","","0.00","212360.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("35","JOWEY","JOW-000001","","","","","0","","","0.00","27090.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("36","NEW JIL","NEW-000002","","","","","0","","","0.00","14750.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("37","BIGIE M/S","BIG-000001","","","","","0","","","0.00","57050.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("38","123 CHINAMAN","123-000001","","","","","0","","","0.00","2260812.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("39","WILLIAM LEE","WIL-000001","","","","","0","","","0.00","8000.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("40","MORNING GLORY","MOR-000001","","","","","0","","","0.00","26400.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("41","GOLDEN BRIDGE","GOL-000001","Makati","","","","0","","","0.00","59940.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("42","WIL-CRIS","WIL-000002","","","","","0","","","0.00","70666.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("43","SOUTHEAST MARKETING","SOU-000001","137 Reparo St. Bagong Lote, Potrero Malabon CIty","","","","210","","","0.00","2591029.20","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("44","M.R. CAJIPE TRADING","M.R-000001","","","","","0","","","0.00","251411.50","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("45","TAICUN TRADING LTD. CO.","TAI-000001","","","","","0","","","0.00","3200.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("46","3B","3B -000001","","","","","0","","","0.00","159180.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("47","PHILBEST","PHI-000001","","","","","120","","","0.00","49470.00","0.00","No","","","","PHP","","","");
INSERT INTO tblsupplier VALUES("48","RF GENERAL MERCHANTILE CO.","RF -000001","25 Ubay St., Brgy. Siena, Quezon City","","413-5201, 482-5022, 711-0480","","0","","","0.00","37602.00","0.00","No","RUEL","","749-6655","","","","");
INSERT INTO tblsupplier VALUES("49","GEOPARTS","GEO-000001","2324 Severino Reyes St, Sta. Cruz Manila","","364-9939, 364-9924, 363-2762","","0","","","0.00","3150.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("50","CB 2","CB -000002","HAO CHEN","","","","0","","","0.00","2077258.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("51","INTERCON MARKETING","INT-000002","","","","","0","","","0.00","12350.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("52","AUTOSPECS","AUT-000002","","","","","0","","","0.00","4800.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("53","KINGSPEED","KIN-000001","","","","","0","","","0.00","74670.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("54","ALISON","ALI-000001","","","","","0","","","0.00","15092.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("55","4 AC WATCHERS  BULACAN","4 A-000001","","","","","0","","","0.00","24510.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("56","JIMMY","JIM-000001","","","","","0","","","0.00","200.00","0.00","No","","","","","","","");
INSERT INTO tblsupplier VALUES("58","AAASDFS","AA342","DSFASDFAS","AM-COD","342342DF23","JIM@JIM.COM","30","2019-01-01","SDAF","34320.00","-2400.00","0.00","No","DFASDF","ASDFASD","FSDF3423","CNY","F23423423","","BAD ACCOUNT");
INSERT INTO tblsupplier VALUES("60","111AAA22223212323","11AAA111","CAINTA","3-COD","123-123-12","JIMMM@J.COM","20","2020-01-01","AAAAA","230.00","0.00","0.00","No","SDFASDF23232","ACCOUNT MANAGER","232323","YEN","92711111111","yes","GOOD ACCT");



CREATE TABLE `tbluseraccount` (
  `USERID` int(11) NOT NULL AUTO_INCREMENT,
  `U_NAME` varchar(122) DEFAULT NULL,
  `U_USERNAME` varchar(122) DEFAULT NULL,
  `U_PASS` varchar(122) DEFAULT NULL,
  `U_ROLE` varchar(30) DEFAULT NULL,
  `USERIMAGE` varchar(255) DEFAULT NULL,
  `OVERWRITE` int(1) DEFAULT 0,
  PRIMARY KEY (`USERID`)
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

INSERT INTO tbluseraccount VALUES("124","Kenjie Palacios","kenjie","d033e22ae348aeb5660fc2140aec35850c4da997","Administrator","photos/COC-war-base-design.jpg","0");
INSERT INTO tbluseraccount VALUES("128","Jimmy R. Santos","jimmy","1cd02e31b43620d7c664e038ca42a060d61727b9","Administrator","","0");

