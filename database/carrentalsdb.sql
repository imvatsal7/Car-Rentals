/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.36-MariaDB : Database - carrentalsdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`carrentalsdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `carrentalsdb`;

/*Table structure for table `brand` */

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `BrandID` varchar(20) NOT NULL,
  `Brand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`BrandID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `brand` */

insert  into `brand`(`BrandID`,`Brand`) values ('ABARTH','Abarth'),('ACURA','Acura'),('ALFAROM','Alfa Romeo'),('APOLLO','Apollo'),('ASKAM','Askam'),('ASTONMARTIN','Aston Martin'),('AUDI','Audi'),('BENTLEY','Bentley'),('BMW','BMW'),('BUICK','Buick'),('CADILLAC','Cadillac'),('CHEVROLET','Chevrolet'),('CHRYSLER','Chrysler'),('CITROEN','Citroen'),('DACIA','DACIA'),('DODGE','DODGE'),('FERARRI','Ferrari'),('FIAT','Fiat'),('FORD','Ford'),('GMC','GMC'),('HONDA','Honda'),('HUMMER','Hummer'),('HYUNDAI','Hyundai'),('INFINITI','Infiniti'),('ISUZU','ISUZU'),('JAGUAR','Jaguar'),('JEEP','Jeep'),('KIA','KIA'),('LAMBORGHINI','Lamborghini'),('LANCIA','Lancia'),('LANDROVER','Land Rover'),('LEXUS','Lexus'),('LINCOLN','Lincoln'),('LOTUS','Lotus'),('MASERATI','Maserati'),('MAZDA','Mazda'),('MERCEDESB','Mercedes Benz'),('MERCURY','Mercury'),('MINI','Mini'),('MITSUBISHI','Mitsubishi'),('NISSAN','Nissa'),('OPEL','Opel'),('PEUGEOT','Peugeot'),('PONTIAC','Pontiac'),('PORSCHE','Porsche'),('RAM','RAM'),('RENAULT','Renault'),('SAAB','Saab'),('SATURN','Saturn'),('SCION','Scion'),('SEAT','Seat'),('SKODA','Skoda'),('SMART','Smart'),('SSANGYOU','Ssang Young'),('SUBARU','Subaru'),('SUZUKI','Suzuki'),('TESLA','Tesla'),('TOYOTA','Toyota'),('VOLKSWAGEN','Volkswagen'),('VOLVO','Volvo'),('WIESMAN','Wiesman');

/*Table structure for table `cars` */

DROP TABLE IF EXISTS `cars`;

CREATE TABLE `cars` (
  `CarNumber` varchar(20) NOT NULL,
  `CarTypeID` varchar(20) DEFAULT NULL,
  `BrandID` varchar(20) DEFAULT NULL,
  `CarName` varchar(200) DEFAULT NULL,
  `Description` varchar(40) DEFAULT NULL,
  `Price` decimal(10,2) DEFAULT NULL,
  `EngineCapacity` varchar(20) DEFAULT NULL,
  `Model` varchar(20) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `YearOfManufac` varchar(20) DEFAULT NULL,
  `TypeOfGas` varchar(20) DEFAULT NULL,
  `Mileage` varchar(20) DEFAULT NULL,
  `Inspector` varchar(20) DEFAULT NULL,
  `InsuranceType` varchar(100) DEFAULT NULL,
  `LastDateOfServ` date DEFAULT NULL,
  `NextService` date DEFAULT NULL,
  `KnownDefects` varchar(100) DEFAULT NULL,
  `AirConditioning` enum('Yes','No') DEFAULT NULL,
  `Heat` enum('Yes','No') DEFAULT NULL,
  `Transmission` enum('Automatic','Manual') DEFAULT NULL,
  `CarStatus` enum('Active','Inactive') DEFAULT NULL,
  `CarImage` text,
  `CarDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`CarNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cars` */

insert  into `cars`(`CarNumber`,`CarTypeID`,`BrandID`,`CarName`,`Description`,`Price`,`EngineCapacity`,`Model`,`Color`,`YearOfManufac`,`TypeOfGas`,`Mileage`,`Inspector`,`InsuranceType`,`LastDateOfServ`,`NextService`,`KnownDefects`,`AirConditioning`,`Heat`,`Transmission`,`CarStatus`,`CarImage`,`CarDateTime`,`UserID`) values ('GT-102','67bd5f2e698f','ASKAM','Datsun GO+','Very nice','5000.00','Above 3.1','dfffg','red','2018','Diesel','10000 - 20000','gffg','fgfgfg','2018-11-08','2018-11-18','ddfff','Yes','No','Automatic','Active','../upload/datsun-go-plus.jpg','2018-11-20 11:14:52','48fcf7af2cf6'),('GT-890','9938f035fc3f','ABARTH','Maruti Suzuki Swift','A hatchback is a car type with a rear do','6776.00','2.1 to 3.0','dfffg','white','2018','Diesel','5000 - 10000','gffg','fgfgfg','2018-11-05','2018-11-12','ddfff','Yes','No','Automatic','Inactive','../upload/maruti-suzuki.jpg','2018-11-12 11:17:16','48fcf7af2cf6'),('GT-908','c9cc9568d511','ALFAROM','Mercedes-Benz GLE Co','A coupe is classically defined as a clos','3434.00','2.1 to 3.0','dfffg','white','2018','LPG','5000 - 10000','gffg','fgfgfg','2018-11-04','2018-11-11','ddfff','Yes','No','Automatic','Active','../upload/mercedes-benz-gle-coupe.jpg','2018-11-20 13:07:36','48fcf7af2cf6');

/*Table structure for table `cartypes` */

DROP TABLE IF EXISTS `cartypes`;

CREATE TABLE `cartypes` (
  `CarTypeID` varchar(20) NOT NULL,
  `CarType` varchar(100) DEFAULT NULL,
  `CarTypeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`CarTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `cartypes` */

insert  into `cartypes`(`CarTypeID`,`CarType`,`CarTypeDate`) values ('2b3b78843337','Pickup','2018-11-05 14:14:36'),('53fc94a259b2','Sedan','2018-11-05 13:45:47'),('67bd5f2e698f','Crossover','2018-11-05 13:49:14'),('9938f035fc3f','Hatchback','2018-11-05 13:46:20'),('c9cc9568d511','Coupe','2018-11-05 12:59:35'),('d543fc4df931','MPV','2018-11-05 14:11:48'),('d59cd9432732','Convertible','2018-11-05 13:59:33'),('fff496085d90','SUV','2018-11-05 13:55:06');

/*Table structure for table `clients` */

DROP TABLE IF EXISTS `clients`;

CREATE TABLE `clients` (
  `ClientID` varchar(20) NOT NULL,
  `cFullName` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `cEmail` varchar(50) DEFAULT NULL,
  `cAccountType` enum('Company','Individual') DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `cStatus` enum('Active','Inactive','Pending') DEFAULT NULL,
  `cDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ClientID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `clients` */

insert  into `clients`(`ClientID`,`cFullName`,`PhoneNumber`,`cEmail`,`cAccountType`,`CompanyName`,`Address`,`cStatus`,`cDateTime`,`UserID`) values ('fd09a30b-8602-4c48-a','Jonas Aning','+13433456789','jonas@gmail.com','Individual','','HsNo. 458','Active','2018-11-20 13:07:36','48fcf7af2cf6'),('fe6dec85-a2cf-4f0a-9','Tieku Abofa','+233566636663','tieku@gmail.com','Individual','','HsNo. 88','Active','2018-11-20 11:14:52','48fcf7af2cf6');

/*Table structure for table `debtors` */

DROP TABLE IF EXISTS `debtors`;

CREATE TABLE `debtors` (
  `DebtID` varchar(20) NOT NULL,
  `PaymentID` varchar(20) DEFAULT NULL,
  `Debt` decimal(10,2) DEFAULT NULL,
  `DebtPaid` decimal(10,2) DEFAULT NULL,
  `dDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`DebtID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `debtors` */

insert  into `debtors`(`DebtID`,`PaymentID`,`Debt`,`DebtPaid`,`dDateTime`,`UserID`) values ('5bf3ecac59d49','5bf3ecac59d48','337814.00','0.00','2018-11-20 11:14:52','48fcf7af2cf6'),('5bf40718b9667','5bf40718b9666','78061.20','0.00','2018-11-20 13:07:36','48fcf7af2cf6');

/*Table structure for table `debtpaid` */

DROP TABLE IF EXISTS `debtpaid`;

CREATE TABLE `debtpaid` (
  `DebtPaidID` varchar(20) NOT NULL,
  `PaymentID` varchar(20) DEFAULT NULL,
  `AmountPaid` decimal(10,2) DEFAULT NULL,
  `aDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`DebtPaidID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `debtpaid` */

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `PaymentID` varchar(20) NOT NULL,
  `ReservationID` varchar(20) DEFAULT NULL,
  `SubTotal` decimal(10,2) DEFAULT NULL,
  `Discount` bigint(20) DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL,
  `AmntPaid` decimal(10,2) DEFAULT NULL,
  `Balance` decimal(10,2) DEFAULT NULL,
  `pStatus` enum('Complement','Paid','Debtor') DEFAULT NULL,
  `pDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`PaymentID`,`ReservationID`,`SubTotal`,`Discount`,`Total`,`AmntPaid`,`Balance`,`pStatus`,`pDateTime`,`UserID`) values ('5bf3ecac59d48','5bf3ec3a6e6e7','1080000.00',0,'1080000.00','742186.00','337814.00','Debtor','2018-11-20 13:09:21','48fcf7af2cf6'),('5bf40718b9666','5bf40701a0434','82416.00',5,'78295.20','234.00','78061.20','Debtor','2018-11-20 13:07:36','48fcf7af2cf6');

/*Table structure for table `reservation` */

DROP TABLE IF EXISTS `reservation`;

CREATE TABLE `reservation` (
  `ReservationID` varchar(20) NOT NULL,
  `ClientID` varchar(20) DEFAULT NULL,
  `CarNumber` varchar(20) DEFAULT NULL,
  `Resource` enum('City','Elegance','Family','Sport') DEFAULT NULL,
  `CheckInDate` datetime DEFAULT NULL,
  `CheckOutDate` datetime DEFAULT NULL,
  `Duration` int(11) DEFAULT NULL,
  `TotalCharge` decimal(10,2) DEFAULT NULL,
  `ReservDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserID` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ReservationID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reservation` */

insert  into `reservation`(`ReservationID`,`ClientID`,`CarNumber`,`Resource`,`CheckInDate`,`CheckOutDate`,`Duration`,`TotalCharge`,`ReservDate`,`UserID`) values ('5bf3ec3a6e6e7','fe6dec85-a2cf-4f0a-9','GT-102','Elegance','2018-11-21 12:00:00','2018-11-30 12:00:00',216,'1080000.00','2018-11-20 11:12:58','48fcf7af2cf6'),('5bf40701a0434','fd09a30b-8602-4c48-a','GT-908','Family','2018-11-20 12:00:00','2018-11-21 12:00:00',24,'82416.00','2018-11-20 13:07:13','48fcf7af2cf6');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `UserID` varchar(20) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `PhoneNo` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `UserType` enum('Administrator','General Manager','Manager','Normal','Receptionist') DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Status` enum('Active','Inactive') DEFAULT NULL,
  `DateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`UserID`,`FullName`,`PhoneNo`,`Email`,`UserType`,`Username`,`Password`,`Status`,`DateTime`) values ('48fcf7af2cf6','Tieku Abofa','+233554554554','tieku@gmail.com','Administrator','tieku2018','3c435738fc3c5615e95df0e8e57b07646036b0183ca233b1344289acde0e3add','Active','2018-11-05 09:37:31');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
