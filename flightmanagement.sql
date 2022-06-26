-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 07:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flightmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `flight_details`
--

CREATE TABLE `flight_details` (
  `flight_no` varchar(128) NOT NULL,
  `from_city` varchar(128) DEFAULT NULL,
  `to_city` varchar(128) DEFAULT NULL,
  `departure_date` date NOT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `arrival_time` time DEFAULT NULL,
  `seats_economy` int(5) DEFAULT NULL,
  `seats_business` int(5) DEFAULT NULL,
  `price_economy` int(10) DEFAULT NULL,
  `price_business` int(10) DEFAULT NULL,
  `jet_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_details`
--

INSERT INTO `flight_details` (`flight_no`, `from_city`, `to_city`, `departure_date`, `arrival_date`, `departure_time`, `arrival_time`, `seats_economy`, `seats_business`, `price_economy`, `price_business`, `jet_id`) VALUES
('23434', 'rajshahi', 'beijing', '2021-03-26', '2021-03-27', '10:21:00', '10:21:00', 100, 20, 9000, 12000, '10004'),
('AA100', 'chittagong', 'Hillingdon, London, United Kingdom', '2021-03-22', '2021-03-23', '13:00:00', '14:00:00', 150, 73, 3000, 3750, '10004'),
('AA100', 'chittagong', 'Hillingdon, London, United Kingdom', '2021-03-26', '2021-03-27', '13:00:00', '14:00:00', 150, 73, 3000, 3750, '10004'),
('AA101', 'chittagong', 'barishal', '2021-03-25', '2021-03-26', '21:00:00', '01:00:00', 192, 96, 5000, 7500, '10001'),
('AA1011', 'chittagong', 'barishal', '2021-03-25', '2021-03-26', '21:00:00', '01:00:00', 195, 96, 5000, 7500, '10001'),
('AA102', 'chittagong', 'rajshahi', '2021-03-25', '2021-03-26', '10:00:00', '12:00:00', 189, 68, 2500, 3000, '10002'),
('AA103', 'chittagong', 'sylhet', '2021-03-25', '2021-03-26', '17:00:00', '17:45:00', 150, 73, 1200, 1500, '10004'),
('AA1031', 'sylhet', 'dhaka', '2021-03-25', '2021-03-26', '17:00:00', '17:45:00', 150, 75, 1200, 1500, '10004'),
('AA106', 'chittagong', 'khulna', '2021-03-22', '2021-03-23', '13:00:00', '14:00:00', 150, 73, 3000, 3750, '10004'),
('AA106', 'chittagong', 'khulna', '2021-03-26', '2021-03-27', '13:00:00', '14:00:00', 150, 73, 3000, 3750, '10004'),
('AIR707MXPA', 'chittagong', 'sylhet', '2021-03-22', '2021-03-23', '10:00:00', '18:00:00', 232, 128, 7500, 12000, 'AIR707MAX'),
('AIR707MXPA', 'chittagong', 'sylhet', '2021-03-26', '2021-03-27', '10:00:00', '18:00:00', 232, 128, 7500, 12000, 'AIR707MAX'),
('AIRBUS69BA', 'rajshahi', 'khulna', '2021-03-22', '2021-03-23', '10:00:00', '13:00:00', 69, 86, 6500, 7800, 'AIRBUS69'),
('AIRBUS69BA', 'rajshahi', 'khulna', '2021-03-26', '2021-03-27', '10:00:00', '13:00:00', 69, 86, 6500, 7800, 'AIRBUS69'),
('AIRBUS707P', 'sylhet', 'khulna', '2021-03-22', '2021-03-23', '00:00:00', '18:00:00', 74, 65, 6969, 7856, 'AIRBUS707'),
('AIRBUS707P', 'sylhet', 'khulna', '2021-03-26', '2021-03-27', '00:00:00', '18:00:00', 74, 65, 6969, 7856, 'AIRBUS707'),
('ctg_to_ams', 'chittagong', 'Haarlemmermeer, North Holland, Netherlands', '2021-03-25', '2021-03-26', '11:00:00', '01:30:00', 200, 30, 16000, 20000, 'AIRBUS69'),
('ctg_to_atl', 'chittagong', 'Atlanta, Georgia, United States', '2021-03-25', '2021-03-26', '11:00:00', '05:24:00', 150, 30, 12000, 16000, '10001'),
('ctg_to_bkk', 'chittagong', 'Bang Phli, Samut Prakan, Thailand', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 200, 26, 14000, 18000, '10007'),
('ctg_to_cdg', 'chittagong', 'Roissy-en-France, lle-de-France, France', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, 'AIR707MAX'),
('ctg_to_del', 'chittagong', 'Delhi, India', '2021-03-25', '2021-03-26', '11:00:00', '05:49:00', 200, 26, 14000, 18000, 'AIRBUS707'),
('ctg_to_dfd', 'chittagong', 'Dallas-Fort Worth, Texas, United States', '2021-03-25', '2021-03-26', '11:00:00', '01:30:00', 200, 30, 16000, 20000, 'AIR707MAX'),
('ctg_to_dha', 'chittagong', 'dhaka', '2021-03-23', '2021-03-24', '04:15:00', '07:15:00', 147, 40, 6000, 8000, 'AIRBUS70'),
('ctg_to_dha', 'chittagong', 'dhaka', '2021-03-25', '2021-03-26', '19:15:00', '07:15:00', 145, 40, 6000, 8000, 'AIRBUS70'),
('ctg_to_dhaka', 'chittagong', 'Dhaka', '2021-03-12', '2021-03-18', '04:21:00', '04:20:00', 89, 25, 8000, 11000, '10001'),
('ctg_to_dxb', 'chittagong', 'Garhoud, Dubai, United Arab Emirates', '2021-03-22', '2021-03-23', '19:34:00', '01:30:00', 200, 30, 16000, 20000, '10003'),
('ctg_to_dxb', 'chittagong', 'Garhoud, Dubai, United Arab Emirates', '2021-03-25', '2021-03-26', '11:00:00', '01:30:00', 200, 30, 16000, 20000, '10003'),
('ctg_to_fra', 'chittagong', 'Frankfurt, Hesse, Germany', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 200, 26, 14000, 18000, 'AIRBUS70'),
('ctg_to_hnd', 'chittagong', 'Ota, Tokyo, Japan', '2021-03-22', '2021-03-23', '19:34:00', '01:30:00', 200, 30, 16000, 20000, '10004'),
('ctg_to_hnd', 'chittagong', 'Ota, Tokyo, Japan', '2021-03-25', '2021-03-26', '11:00:00', '01:30:00', 200, 30, 16000, 20000, '10004'),
('ctg_to_icn', 'chittagong', 'Incheon, South Korea', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, 'AIRBUS70'),
('ctg_to_kul', 'chittagong', 'Sepang, Selangor, Malaysia', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 200, 26, 14000, 18000, 'BOING707'),
('ctg_to_lax', 'chittagong', 'Los Angeles, California', '2021-03-25', '2021-03-26', '10:34:00', '01:30:00', 200, 30, 16000, 20000, '10002'),
('ctg_to_lhr', 'chittagong', 'Hillingdon,London,United Kingdom', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, '10007'),
('ctg_to_mad', 'chittagong', 'Barajas,Madrid,Spain', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 199, 26, 14000, 18000, 'BOING707'),
('ctg_to_ord', 'chittagong', 'Chicago, Illinois, United States', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, '10004'),
('ctg_to_pvg', 'chittagong', 'Pudong,Shanghai,China', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, 'AIR707MAX'),
('ctg_to_sin', 'chittagong', 'Changi,East Region,Singapore', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 200, 26, 14000, 18000, 'AIRBUS707M'),
('ctg_to_sylthet', 'chittagong', 'sylhet', '2021-03-25', '2021-03-26', '20:27:00', '20:27:00', 3000, 50, 8000, 12000, '10001'),
('dhaka_to_cdg', 'dhaka', 'Roissy-en-France, lle-de-France, France', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, 'AIR707MAX'),
('dhaka_to_ctg', 'dhaka', 'chittagong', '2021-03-12', '2021-03-18', '04:21:00', '04:20:00', 89, 25, 8000, 11000, '10001'),
('dhaka_to_del', 'dhaka', 'Delhi, India', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 200, 26, 14000, 18000, 'AIRBUS707'),
('dhaka_to_dfd', 'dhaka', 'Dallas-Fort Worth, Texas, United States', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, 'AIR707MAX'),
('dhaka_to_dxb', 'dhaka', 'Garhoud, Dubai, United Arab Emirates', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, '10003'),
('dhaka_to_fra', 'dhaka', 'Frankfurt, Hesse, Germany', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 200, 26, 14000, 18000, 'AIRBUS70'),
('dhaka_to_hnd', 'dhaka', 'Ota, Tokyo, Japan', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 198, 30, 16000, 20000, '10004'),
('dhaka_to_icn', 'dhaka', 'Incheon, South Korea', '2021-03-25', '2021-03-26', '19:34:00', '01:30:00', 200, 30, 16000, 20000, 'AIRBUS70'),
('dhaka_to_kul', 'dhaka', 'Sepang, Selangor, Malaysia', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 200, 26, 14000, 18000, 'BOING707'),
('dhaka_to_lax', 'dhaka', 'Los Angeles, California', '2021-03-25', '2021-03-26', '10:34:00', '01:30:00', 200, 30, 14000, 18000, 'BOING707'),
('dhaka_to_mad', 'dhaka', 'Barajas,Madrid,Spain', '2021-03-22', '2021-03-23', '19:49:00', '05:49:00', 200, 25, 14000, 18000, 'BOING707'),
('dhaka_to_mad', 'dhaka', 'Barajas,Madrid,Spain', '2021-03-25', '2021-03-26', '19:49:00', '05:49:00', 200, 25, 14000, 18000, 'BOING707');

-- --------------------------------------------------------

--
-- Table structure for table `jet_details`
--

CREATE TABLE `jet_details` (
  `jet_id` varchar(15) NOT NULL,
  `jet_type` varchar(20) DEFAULT NULL,
  `total_capacity` int(5) DEFAULT NULL,
  `active` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jet_details`
--

INSERT INTO `jet_details` (`jet_id`, `jet_type`, `total_capacity`, `active`) VALUES
('10001', 'Dreamliner', 300, 'Yes'),
('10002', 'Airbus A380', 275, 'Yes'),
('10003', 'ATR', 500, 'Yes'),
('10004', 'Boeing 737', 225, 'Yes'),
('10005', 'AIR707DB', 250, 'Yes'),
('10007', 'Test_Model', 250, 'Yes'),
('AIR707', 'AIR707DB', 250, 'Yes'),
('AIR707MAX', 'AIRBUS 707 MX', 250, 'Yes'),
('AIR707MAXDB', 'AIRBUS 707 MX DB', 250, 'No'),
('AIRBUS69', 'AIRBUS69-5526', 780, 'Yes'),
('AIRBUS70', 'AIRBUS69-5527', 654, 'Yes'),
('AIRBUS707', 'AIRBUS69-5527', 655, 'Yes'),
('AIRBUS707M', '707 MAX', 596, 'Yes'),
('BOING707', 'BOING707-5569', 485, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `passenger_id` int(11) NOT NULL,
  `pnr` varchar(15) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` varchar(8) DEFAULT NULL,
  `meal_choice` varchar(5) DEFAULT NULL,
  `frequent_flier_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`passenger_id`, `pnr`, `name`, `age`, `gender`, `meal_choice`, `frequent_flier_no`) VALUES
(1, '1996449', 'Mr Karim', 32, 'male', 'yes', NULL),
(1, '2890301', 'Mr. Brown', 32, 'male', 'yes', NULL),
(1, '4233339', 'Kallol Dhar', 23, 'male', 'yes', NULL),
(1, '4742983', 'K', 23, 'male', 'yes', NULL),
(1, '5810071', 'Mr. Brown', 32, 'male', 'yes', NULL),
(1, '7627442', 'Kd', 34, 'male', 'yes', NULL),
(1, '8598281', 'Mr. Brown', 32, 'male', 'yes', NULL),
(1, '9391764', 'Mr. Brown', 32, 'male', 'yes', NULL),
(2, '1996449', 'Mr. Brown', 40, 'male', 'yes', NULL),
(2, '4233339', 'Mr. Karim', 32, 'male', 'yes', NULL),
(2, '4742983', 'Mr K', 23, 'male', 'yes', NULL),
(2, '5810071', 'Kallol Dhar', 23, 'male', 'yes', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` varchar(20) NOT NULL,
  `pnr` varchar(15) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` int(6) DEFAULT NULL,
  `payment_mode` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `pnr`, `payment_date`, `payment_amount`, `payment_mode`) VALUES
('135697572', '8598281', '2021-03-18', 14250, 'net banking'),
('138423592', '4742983', '2021-03-17', 19500, 'debit card'),
('267710620', '5810071', '2021-03-18', 32500, 'credit card'),
('415107203', '7627442', '2021-03-17', 3250, 'net banking'),
('649489119', '2890301', '2021-03-18', 6250, 'debit card'),
('693249005', '1996449', '2021-03-23', 12500, 'credit card'),
('702507483', '9391764', '2021-03-18', 18250, 'debit card'),
('974302474', '4233339', '2021-03-18', 12500, 'credit card');

--
-- Triggers `payment_details`
--
DELIMITER $$
CREATE TRIGGER `update_ticket_after_payment` AFTER INSERT ON `payment_details` FOR EACH ROW UPDATE ticket_details
     SET booking_status='CONFIRMED', payment_id= NEW.payment_id
   WHERE pnr = NEW.pnr
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `pnr` varchar(15) NOT NULL,
  `date_of_reservation` date DEFAULT NULL,
  `flight_no` varchar(25) DEFAULT NULL,
  `journey_date` date DEFAULT NULL,
  `class` varchar(10) DEFAULT NULL,
  `booking_status` varchar(20) DEFAULT NULL,
  `no_of_passengers` int(5) DEFAULT NULL,
  `lounge_access` varchar(5) DEFAULT NULL,
  `priority_checkin` varchar(5) DEFAULT NULL,
  `insurance` varchar(5) DEFAULT NULL,
  `payment_id` varchar(20) DEFAULT NULL,
  `customer_id` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket_details`
--

INSERT INTO `ticket_details` (`pnr`, `date_of_reservation`, `flight_no`, `journey_date`, `class`, `booking_status`, `no_of_passengers`, `lounge_access`, `priority_checkin`, `insurance`, `payment_id`, `customer_id`) VALUES
('1996449', '2021-03-23', 'ctg_to_dha', '2021-03-25', 'economy', 'CONFIRMED', 2, 'No', 'No', 'No', '693249005', 'kallol'),
('2890301', '2021-03-18', 'ctg_to_dha', '2021-03-25', 'economy', 'CONFIRMED', 1, 'No', 'No', 'No', '649489119', 'kallol'),
('4233339', '2021-03-18', 'ctg_to_dha', '2021-03-25', 'economy', 'CONFIRMED', 2, 'No', 'No', 'No', '974302474', 'kallol'),
('4742983', '2021-03-17', NULL, NULL, 'economy', 'CONFIRMED', 2, 'No', 'No', 'No', '138423592', 'kallol'),
('5810071', '2021-03-18', 'dhaka_to_hnd', '2021-03-25', 'economy', 'CONFIRMED', 2, 'No', 'No', 'No', '267710620', 'kallol'),
('7627442', '2021-03-17', 'AA102', '2021-03-25', 'business', 'CONFIRMED', 1, 'No', 'No', 'No', '415107203', 'kallol'),
('8598281', '2021-03-18', 'ctg_to_mad', '2021-03-25', 'economy', 'CONFIRMED', 1, 'No', 'No', 'No', '135697572', 'kallol'),
('9391764', '2021-03-18', 'dhaka_to_mad', '2021-03-25', 'business', 'CONFIRMED', 1, 'No', 'No', 'No', '702507483', 'kallol');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersFName` varchar(128) NOT NULL,
  `usersLName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) CHARACTER SET latin1 NOT NULL,
  `usersGender` varchar(10) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `usersAuthority` varchar(6) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersFName`, `usersLName`, `usersEmail`, `usersUid`, `usersGender`, `usersPwd`, `usersAuthority`) VALUES
(13, 'Sanjida', 'Rahman', 'sr@gmail.com', 'sanjida', 'female', '$2y$10$Qn36TuIbzue02jKkqq8h/.OyW/h/y/.rhFEE/Dnyz9EeWqmX0ZBuu', 'false'),
(14, 'Kausar', 'Shajed', 'ks@gmail.com', 'kausar', 'male', '$2y$10$18cXyOaYtfDU4wouy.sphObIVo/ZLIOKsrGKDaW1J5AI.unPwrpOG', 'false'),
(15, 'Nourshed', 'Trena', 'nr@gmail.com', 'trena', 'female', '$2y$10$zMb7YbKSLH8XtvpcrOf48ulX.GlpmGB3vME4wng0UNDCgIt2P4xVm', 'false'),
(16, 'Fabiha', 'Rahman', 'fr@gmail.com', 'fabiha', 'female', '$2y$10$c/TFPLkM3oBaUF1F1.hb/.TIeoQpthQzn9OMQx/JiERAWW.ar0lQi', 'false'),
(17, 'Homaira', 'Afroz', 'ha@gmail.com', 'homaira', 'female', '$2y$10$Yns3J/EUUekYecIoJcJFme.H9bN6j8.zoaL6VphjQzNYyy7bsTIMG', 'false'),
(19, 'aaa', 'aaa', 'aa@c.do', 'aaa', 'male', '$2y$10$M16/Lgw.5zqqPYl4Sujl7eV6Esg/MIfQyOp9qHQyuVIMndQHoM.S2', 'false'),
(20, 'ddd', 'ddd', 'ddd@d.com', 'ddd', 'male', '$2y$10$ZVzjv8mb/Pu1UMWW0ghNH.FBKIWJPMNal.lb8I8/EY69297Pd9HUu', 'false'),
(21, 'admin', 'admin', 'admin@gmail.com', 'admin', 'male', '$2y$10$w10fAt4cipkO0qnVmq2tvuKiQXO1gPe51yP60x6xwbRkxV6GBUvqu', 'true'),
(22, 'user', 'user', 'user@user.com', 'user', 'female', '$2y$10$/RcUOiIFQ2904WkNW2e8h.O4X7/SjZ/sVgjB7tRaLvrrphcGBJag2', 'false'),
(24, 'V', 'V', 'v@v.com', 'v', 'male', '$2y$10$QTGBkN7FxYPK5XAoRVbdtedwq6iwzpDTU6JE/jTyzwjtXxQMAzOde', 'false'),
(25, 'Kallol', 'Dhar', 'kalloldhar7@gmail.com', 'kallol', 'male', '$2y$10$uaLOcLh.OsYM20ou9jIKauuqJ/d3DV1SGPlJD72z8Tx9O5cLTY/I.', 'false'),
(26, 'u', 'u', 'u@u.com', 'u', 'male', '$2y$10$92IAsGkgTcyzbOGrdBO29eW8uI4zk4aSsVPCYBZ8.hGZKIM.XDROe', 'false'),
(27, 'x', 'x', 'x@x.com', 'x', 'male', '$2y$10$XeZOU8HWerjXDKIBqVrCtu1n5IFD8PaEiRGuquGrtRBGeGAmXLdg.', 'false'),
(32, 'dfdfdf', 'dfdfdf', 'dfdf@ddd.com', 'sdfd', 'male', '$2y$10$Xg3gi.JSqziVEOCKtsb.q./WGE2TWLWdswcLTKimIac/uDoxD3YWO', 'true'),
(33, 'd', 'd', 'd@ld.com', 'd', 'male', '$2y$10$.LfURDBdDOsCoMOrFESAF.wtyLTG0oCmxuat1LkXQN.vP/jJqYK/u', 'true'),
(34, 'sd', 'sd', 'admin5@admin.com', 'ssd', 'male', '$2y$10$dfl2W39wOB1PD8.teKBe5O2V6n6xUO.qkRlfAUsLe5srIweWoPyra', 'true'),
(35, 'admin2', 'admin2', 'admin2@admin.com', 'admin2', 'male', '$2y$10$ArxC3lKB8/kKsjGmtUmlT.cHgou1vEWbPiUdE.QnjCb6oNDQ7UT4u', 'true'),
(36, 'admin3', 'admin3', 'admin3@admin.com', 'admin3', 'male', '$2y$10$6t1nrMnuqq8AD1VpBZUnnOyfnfA63ic0yljidacCg.98Y9wJMNSrK', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD PRIMARY KEY (`flight_no`,`departure_date`),
  ADD KEY `jet_id` (`jet_id`);

--
-- Indexes for table `jet_details`
--
ALTER TABLE `jet_details`
  ADD PRIMARY KEY (`jet_id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`passenger_id`,`pnr`),
  ADD KEY `pnr` (`pnr`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `pnr` (`pnr`);

--
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `journey_date` (`journey_date`),
  ADD KEY `flight_no` (`flight_no`),
  ADD KEY `flight_no_2` (`flight_no`,`journey_date`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`),
  ADD UNIQUE KEY `usersUid` (`usersUid`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_details`
--
ALTER TABLE `flight_details`
  ADD CONSTRAINT `flight_details_ibfk_1` FOREIGN KEY (`jet_id`) REFERENCES `jet_details` (`jet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`pnr`) REFERENCES `ticket_details` (`pnr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`pnr`) REFERENCES `ticket_details` (`pnr`) ON UPDATE CASCADE;

--
-- Constraints for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD CONSTRAINT `ticket_details_ibfk_3` FOREIGN KEY (`flight_no`,`journey_date`) REFERENCES `flight_details` (`flight_no`, `departure_date`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_details_ibfk_4` FOREIGN KEY (`customer_id`) REFERENCES `users` (`usersUid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
