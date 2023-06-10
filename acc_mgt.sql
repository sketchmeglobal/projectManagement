-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 07:35 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acc_mgt`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_master`
--

CREATE TABLE `acc_master` (
  `am_id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `am_code` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email_id` varchar(99) NOT NULL,
  `official_address` text CHARACTER SET utf16 NOT NULL,
  `shipping_address` text NOT NULL,
  `place_of_supply` text,
  `supplier_buyer` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Supplier,1=Buyer',
  `city` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `insured_amount` double DEFAULT NULL,
  `credit_limit` double DEFAULT NULL,
  `instruction` text,
  `purchase_order_instruction` text,
  `payment_term` varchar(255) DEFAULT NULL,
  `owner_name` varchar(100) CHARACTER SET utf16 NOT NULL,
  `owner_nationality` int(11) DEFAULT NULL,
  `owner_email` varchar(222) DEFAULT NULL,
  `manager_name` varchar(222) DEFAULT NULL,
  `manager_nationality` int(11) DEFAULT NULL,
  `manager_email` varchar(222) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_master`
--

INSERT INTO `acc_master` (`am_id`, `name`, `am_code`, `phone`, `email_id`, `official_address`, `shipping_address`, `place_of_supply`, `supplier_buyer`, `city`, `country_id`, `insured_amount`, `credit_limit`, `instruction`, `purchase_order_instruction`, `payment_term`, `owner_name`, `owner_nationality`, `owner_email`, `manager_name`, `manager_nationality`, `manager_email`, `user_id`, `create_date`, `modify_date`, `status`) VALUES
(12, 'ROY TRADER', 'AP-001', '87897899887', 'myemail@gmail.com', '', '', NULL, 0, '0', 99, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Mr. Owen', NULL, NULL, 1, '2020-06-24 09:24:08', '2023-04-18 12:46:03', 1),
(31, 'Sealord Group LTD', 'SLG', '-', '-', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 09:52:24', '2021-08-12 09:52:24', 1),
(32, 'Cap Blanc Pelagique SARL', 'CBP SARL', '-', '-', '', '', NULL, 0, '0', 99, NULL, NULL, NULL, NULL, NULL, '', NULL, 'example@gmail.com', 'Mr. Frido', NULL, NULL, 0, '2021-08-12 09:53:19', '2023-04-18 11:07:03', 1),
(33, 'Daisui Co. LTD', 'DAI JP', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 09:57:41', '2021-08-12 09:57:41', 1),
(34, 'Burum Seafood Trading LLC', 'BURUM', '-', '-', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:00:44', '2021-08-12 10:00:44', 1),
(35, 'CEPP SARL', 'CEPP', '-', '-', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:01:10', '2021-08-12 10:01:10', 1),
(36, 'Maoming Hongye Aquatic Products Co. Ltd', 'Maoming- Mark', '-', '-', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:02:03', '2021-08-12 10:02:03', 1),
(37, 'Trust Link Ventures Ltd', 'Trustlink', '-', 'saby@seafoodmiddleeast.com, brian@fsmiddleeast.ae', '<p>\r\n	Mr John Smith 132, My Street, Bigtown BG23 4YZ England</p>\r\n', '<p>\r\n	Mr Daniel Izuchukwu Nwoye 8, My Street, Ilassan Lekki, Lagos 105102 Nigeria.</p>\r\n', NULL, 1, 'Tema', 81, NULL, NULL, '<p>\r\n	One morning, when Gregor Samsa woke from troubled dreams, he found himself transformed in his bed into a horrible vermin.</p>\r\n', '<p>\r\n	One morning,</p>\r\n', '14 Days from Arrival Date', 'Mr. ABC', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:03:01', '2022-08-18 09:31:27', 1),
(38, 'African Everest Limited Company', 'African Everest', '-', 'brian@fsmiddleeast.ae, saby@seafoodmiddleeast.com', '<p>\r\n	Official Address</p>\r\n', '<p>\r\n	Shipping address</p>\r\n', '<p>\r\n	Supply address</p>\r\n', 1, 'Tema', 81, NULL, NULL, NULL, NULL, NULL, 'Mr. Robert Ocran', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:03:34', '2022-03-28 09:21:29', 1),
(39, 'Congelcam SA', 'Congelcam', '-', 'saby@seafoodmiddleeast.com; brian@fsmiddleeast.ae', '<p>\r\n	P.O Box 5295</p>\r\n<p>\r\n	Douala</p>\r\n<p>\r\n	Zone Portuaire Face Ancien Nestle</p>\r\n<p>\r\n	Cameroon</p>\r\n', '<p>\r\n	P.O Box 5295</p>\r\n<p>\r\n	Douala</p>\r\n<p>\r\n	Zone Portuaire Face Ancien Nestle</p>\r\n<p>\r\n	Cameroon</p>\r\n', '<p>\r\n	P.O Box 5295</p>\r\n<p>\r\n	Douala</p>\r\n<p>\r\n	Zone Portuaire Face Ancien Nestle</p>\r\n<p>\r\n	Cameroon</p>\r\n', 1, 'Douala', 37, NULL, NULL, NULL, NULL, 'TT Against Scan Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:04:34', '2022-11-04 14:17:28', 1),
(40, 'North South Seafood Trading LLC', 'North South- Robert', '-', '-', 'abctest', '', NULL, 1, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:05:45', '2022-06-08 12:52:29', 1),
(41, 'Hashi Energy LTD', 'Hashi- UN', '-', '-', '', '', NULL, 1, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:06:16', '2021-08-12 10:06:16', 1),
(42, 'Amisachi LTD', 'Amisachi- Annirudha', '-', 'brian@fsmiddleeast.ae, saby@seafoodmiddleeast.com', '', '', NULL, 1, 'Tema', 81, NULL, NULL, NULL, '<p>\r\n	Lorem</p>\r\n', '30 Days from BL Date', 'Anirudh Mukherjee', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-12 10:06:54', '2022-08-18 09:34:18', 1),
(43, 'AFRI VENTURES FZE', 'AFRI', '', '', '', '', NULL, 1, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:10:50', '2021-08-17 09:10:50', 1),
(44, 'CDDA', 'CDDA', '', '', '', '', NULL, 1, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:13:44', '2021-08-17 09:13:44', 1),
(45, 'CDPA-CI', 'CDPA-CI', '', 'export@seafoodmiddleeast.com', '<p>\r\n	CDPA-CI SARL</p>\r\n<p>\r\n	06 BP 86 Abidjan 05</p>\r\n<p>\r\n	Trich Ville Rue Des Forgerons</p>\r\n', '<p>\r\n	CDPA-CI SARL</p>\r\n<p>\r\n	06 BP 86 Abidjan 05</p>\r\n<p>\r\n	Trich Ville Rue Des Forgerons</p>\r\n', '<p>\r\n	CDPA-CI SARL</p>\r\n<p>\r\n	06 BP 86 Abidjan 05</p>\r\n<p>\r\n	Trich Ville Rue Des Forgerons</p>\r\n', 1, '0', 53, NULL, NULL, NULL, NULL, 'Immediate Payment on Scan copy of Final Docs', '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:14:25', '2022-09-03 05:58:59', 1),
(46, 'Just Ack Company Ltd', 'Just Ack', '', '', '', '', NULL, 1, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:15:12', '2021-08-17 09:15:12', 1),
(47, 'Kyokuyo Ltd', 'Kyokuyo', '', '', '', '', NULL, 1, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:16:14', '2021-08-17 09:16:14', 1),
(48, 'Lake Bounty', 'LBO', '', '', '', '', NULL, 1, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:16:51', '2021-08-17 09:16:51', 1),
(49, 'Martin Pecheur SARL', 'Martin', '', '', '', '', NULL, 1, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:17:16', '2021-08-17 09:17:16', 1),
(50, 'Ocean Fresh - Jordan', 'OFRESH', '', '0', '', '', NULL, 1, '0', 44, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:18:12', '2022-07-14 06:12:28', 1),
(51, 'UNITED TRADERS INCORPORATED', 'UTI', '', 'export@seafoodmiddleeast.com', '<div>\r\n	UNITED TRADERS INCORPORATED SAL</div>\r\n<div>\r\n	H/O: Matter A. Jawde St, 2020</div>\r\n<div>\r\n	Bldg, Jal El Dib, Lebanon</div>\r\n<div>\r\n	Jal El Dib</div>\r\n<div>\r\n	Lebanon</div>\r\n', '<div>\r\n	AFRIDAL</div>\r\n<div>\r\n	01 BP 11980 ABIDJAN 01</div>\r\n<div>\r\n	RUE DES , P&Ecirc;CHEURS</div>\r\n<div>\r\n	TREICHVILLE, PORT DE P&Ecirc;CHE,</div>\r\n<div>\r\n	ABIDJAN, COTE D&rsquo;IVOIRE</div>\r\n', '<div>\r\n	AFRIDAL</div>\r\n<div>\r\n	01 BP 11980 ABIDJAN 01</div>\r\n<div>\r\n	RUE DES , P&Ecirc;CHEURS</div>\r\n<div>\r\n	TREICHVILLE, PORT DE P&Ecirc;CHE,</div>\r\n<div>\r\n	ABIDJAN, COTE D&rsquo;IVOIRE</div>\r\n', 1, '0', 53, NULL, NULL, NULL, NULL, 'TT Against Scan Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:18:54', '2022-09-03 05:53:20', 1),
(52, 'West Africa Enterprise INC', 'West Africa', '', 'saby@seafoodmiddleeast.com; brian@fsmiddleeast.ae', '', '', NULL, 1, '0', 120, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:19:19', '2022-03-26 05:18:48', 1),
(53, 'Blue Marine House', 'BM', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:21:44', '2021-08-17 09:21:44', 1),
(54, 'Chunbo Moolsan Co., Ltd', 'Chunbo', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:22:38', '2021-08-17 09:22:38', 1),
(55, 'COMAVIP SA', 'COMAVIP', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:23:54', '2021-08-17 09:23:54', 1),
(56, 'Cornelis Vrolijk B.V.', 'Vrolijk', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:24:36', '2021-08-17 09:24:36', 1),
(57, 'E & K CO LTD', 'Eunkang', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:25:18', '2021-08-17 09:25:18', 1),
(58, 'ETS Cherif Ahmed Cherivou', 'ETS CAC', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:26:06', '2021-08-17 09:26:06', 1),
(59, 'FH Group Procurement Sarl', 'FH Group', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:26:30', '2021-08-17 09:26:30', 1),
(60, 'ICELAND PELAGIC EHF', 'ICE PELA', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:27:22', '2021-08-17 09:27:22', 1),
(61, 'Independent Fisheries Ltd', 'INDEP', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:27:44', '2021-08-17 09:27:44', 1),
(62, 'KYOREI CO., LTD', 'Kyorie', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:28:37', '2021-08-17 09:28:37', 1),
(63, 'MARUHA NICHIRO CORPORATION', 'Maruha', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:30:10', '2021-08-17 09:30:10', 1),
(64, 'Oman Fisheries Co. S.A.O.G.', 'Oman Biju', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:30:44', '2021-08-17 09:30:44', 1),
(65, 'Parlevliet & Van Der Plas B.V', 'P&V', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:31:24', '2021-08-17 09:31:24', 1),
(66, 'PORTSIDE FISH COMPANY LIMITED', 'Portside', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:32:00', '2021-08-17 09:32:00', 1),
(67, 'Sea Freeze International LLC', 'Seafreese Rafeeq', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:32:33', '2021-08-17 09:32:33', 1),
(68, 'SOMASCIR.SA', 'SOMASCIR.SA', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:33:12', '2021-08-17 09:33:12', 1),
(69, 'Span Ice Ehf.', 'Span Ice Ehf.', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:33:29', '2021-08-17 09:33:29', 1),
(70, 'SUNRISE FISHERIES CO LLC', 'Sunrise- Oman', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-08-17 09:34:24', '2021-08-17 09:34:24', 1),
(71, 'Tamimi Fisheries Company Ltd', 'Tamimi- Yemen', '', '', '', '', NULL, 0, '0', 0, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-09-09 10:13:08', '2021-09-09 10:13:08', 1),
(72, 'michael  pvt test', '0001', '1234567890', '', '', '', NULL, 0, '', 63, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-09 10:11:31', '2021-10-09 10:26:28', 1),
(73, 'Ratan', '0002', '', '', '', '', NULL, 1, '', 2, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-09 10:35:36', '2021-10-09 10:35:36', 1),
(74, 'Victoria Perch Ltd', 'Victoria', '', '', '', '', NULL, 0, 'Tanzania', 210, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-23 07:16:13', '2021-10-23 07:16:13', 1),
(75, 'Nordic Seafood SA', 'Nord Denmark', '', '', '', '', NULL, 1, 'Copenhagen', 58, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-23 10:52:28', '2021-10-23 10:52:28', 1),
(76, 'Marine Foods B.V.', 'Marine Foods Holland', '', '', '', '', NULL, 0, 'Scheveningen', 150, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-26 08:56:34', '2021-10-26 08:56:34', 1),
(77, 'Mauritania Seafood SARL', 'MR SF SARL', '', '', '', '', NULL, 0, 'Nouadhibou', 135, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-27 09:50:37', '2021-10-27 09:50:37', 1),
(78, 'Fish Mart - Anand', 'Anand', '', '', '', '', NULL, 0, 'Gujurat', 99, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-28 10:40:31', '2021-10-28 10:40:31', 1),
(79, 'The Golden Al Sinyar', 'Golden Oman', '', '', '', '', NULL, 0, '', 161, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-28 12:38:58', '2021-10-28 12:38:58', 1),
(80, 'ASMAK MUSCAT INTL LLC', 'ASMAK', '', '', '', '', NULL, 0, '', 161, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-28 13:22:30', '2021-10-28 13:22:30', 1),
(81, 'Lake Treasure Ltd', 'Lake Treasure', '', '', '', '', NULL, 0, '', 110, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-10-29 13:48:58', '2021-10-29 13:48:58', 1),
(82, 'raja', '001', '', '', '', '', NULL, 0, '', 3, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-11-05 09:57:37', '2021-11-05 10:26:58', 1),
(83, 'Demo Test', '1122', '123456789', 'pritamkhanofficial@gmail.com', '', '', NULL, 1, '', 44, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2021-11-05 09:58:43', '2022-08-13 11:49:43', 1),
(84, 'UNSOS Agility DGS Logistics Services KSCC', 'Agility', '', 'brian@fsmiddleeast.ae, saby@seafoodmiddleeast.com', '', '', NULL, 1, 'Safat', 114, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2022-07-13 13:11:17', '2022-07-13 13:11:17', 1),
(85, 'Weitate Sidi Mboirick', 'Weitate Sidi', '', 'brian@fsmiddleeast.ae, saby@seafoodmiddleeast.com', '', '', NULL, 0, 'Nouadhibou', 135, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2022-07-13 13:12:19', '2022-07-13 13:12:19', 1),
(86, 'White Lions Ocean Products SL', 'White Lions', '', 'brian@fsmiddleeast.ae, saby@seafoodmiddleeast.com', '', '', NULL, 0, 'Nouadhibou', 135, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2022-07-13 13:13:32', '2022-07-13 13:13:32', 1),
(87, 'Tongwei Hainan Aquatic Products Co., Ltd', 'Tongwei- Victor', '', 'brian@fsmiddleeast.ae, saby@seafoodmiddleeast.com', '', '', NULL, 0, 'Haikou', 44, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2022-07-13 13:16:04', '2022-07-13 13:16:04', 1),
(88, 'SARGUS SARL', 'SARGUS', '', 'brian@fsmiddleeast.ae, saby@seafoodmiddleeast.com', '', '', NULL, 0, 'Agadir', 144, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2022-07-13 13:25:29', '2022-07-13 13:25:29', 1),
(89, 'Five Blue Oceans SL', '5 Blue', '', 'brian@fsmiddleeast.ae, saby@seafoodmiddleeast.com', '', '', NULL, 0, 'Dakar', 188, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2022-07-13 13:26:14', '2022-07-13 13:26:14', 1),
(90, 'Lake Bounty Ltd', 'Rakesh', '', 'export@seafoodmiddleeast.com', '<p>\r\n	Lake Bounty Ltd</p>\r\n<p>\r\n	Plot M 245 Ntinda Idustrial Area</p>\r\n<p>\r\n	PO Box: 71080, Kampala</p>\r\n<p>\r\n	Uganda</p>\r\n', '<p>\r\n	Lake Bounty Ltd</p>\r\n<p>\r\n	Plot M 245 Ntinda Idustrial Area</p>\r\n<p>\r\n	PO Box: 71080, Kampala</p>\r\n<p>\r\n	Uganda</p>\r\n', '<p>\r\n	Lake Bounty Ltd</p>\r\n<p>\r\n	Plot M 245 Ntinda Idustrial Area</p>\r\n<p>\r\n	PO Box: 71080, Kampala</p>\r\n<p>\r\n	Uganda</p>\r\n', 0, 'Kampala', 222, NULL, NULL, NULL, '<p>\r\n	Skinless- Boneless and Pin Bone-In</p>\r\n<p>\r\n	Label must be in Arabic Language</p>\r\n', 'Cash against Docs through Bank', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-09-02 15:48:50', '2022-09-02 15:48:50', 1),
(91, 'SOGDA Limited', 'SOGDA', '', 'export@seafoodmiddleeast.com', '', '', NULL, 0, '', 226, NULL, NULL, NULL, NULL, '10% Advance; Balance on Scan copy of Original Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-09-04 15:51:50', '2022-09-04 15:51:50', 1),
(92, 'Mankoadze Fisheries Ltd', 'Mankoadze', '', 'robertocran@gmail.com', '<p>\r\n	Mankoadze Fisheries Ltd</p>\r\n<p>\r\n	PO Box: C 103</p>\r\n<p>\r\n	Tema</p>\r\n<p>\r\n	Ghana</p>\r\n', '<p>\r\n	Mankoadze Fisheries Ltd</p>\r\n<p>\r\n	PO Box: C 103</p>\r\n<p>\r\n	Tema</p>\r\n<p>\r\n	Ghana</p>\r\n', '<p>\r\n	Mankoadze Fisheries Ltd</p>\r\n<p>\r\n	PO Box: C 103</p>\r\n<p>\r\n	Tema</p>\r\n<p>\r\n	Ghana</p>\r\n', 1, 'Tema, Ghana', 81, NULL, NULL, NULL, NULL, '30% Advance & Balance 70% against scan copy of Final Documents', 'Robert Ocran', NULL, 'robertocran@gmail.com', NULL, NULL, NULL, 0, '2022-09-29 10:18:46', '2022-09-29 10:18:46', 1),
(93, 'Inalca Societa per Azioni', 'Inalca', '', 'export@seafoodmiddleeast.com', '<p>\r\n	Inalca Societa per Azioni</p>\r\n<p>\r\n	Via Spilamberto 30/C</p>\r\n<p>\r\n	IT-41014 Castelvetro di Modena</p>\r\n<p>\r\n	Italy</p>\r\n<p>\r\n	Vat No: IT 0256 2260 360</p>\r\n', '<p>\r\n	INALCA BRAZZAVILLE SARLU</p>\r\n<p>\r\n	15 BOULEVARD CHARLES DE GAULLE,</p>\r\n<p>\r\n	IMMEUBLE LINCOLN, POINTE NOIRE</p>\r\n<p>\r\n	REPUBLIQUE DU CONGO</p>\r\n', '<p>\r\n	INALCA BRAZZAVILLE SARLU</p>\r\n<p>\r\n	15 BOULEVARD CHARLES DE GAULLE,</p>\r\n<p>\r\n	IMMEUBLE LINCOLN, POINTE NOIRE</p>\r\n<p>\r\n	REPUBLIQUE DU CONGO</p>\r\n', 1, 'Pointe Noire', 49, NULL, NULL, NULL, NULL, 'Payment against Scan copy of Original Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-10-11 12:41:08', '2022-10-11 12:41:08', 1),
(94, 'Hong Kong (Chen Yu) Marine Co., Ltd', 'HK Cnehyu', '', 'caihx@fzhongdong.com', '', '', NULL, 0, 'Nouadhibou', 135, NULL, NULL, NULL, NULL, '50% Advance; Bal on Scan Copy of Org Docs', 'Cai', NULL, NULL, NULL, NULL, NULL, 0, '2022-10-24 08:45:31', '2022-11-04 13:30:57', 1),
(95, 'Guangdong Province Hairun Supply Chain Co., Ltd', 'Guangdong- Eunice', '', 'eunice@cutefoods.com', '', '', NULL, 0, 'Guangdong', 44, NULL, NULL, NULL, NULL, '10% Advance; Balance on Scan copy of Original Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-11-04 10:51:52', '2022-11-04 13:28:55', 1),
(96, 'Foshan Yelongfoods Co., Ltd', 'Foshan Eunice', '', 'eunice@cutefoods.com', '', '', NULL, 0, 'Guangdong', 44, NULL, NULL, NULL, NULL, '10% Advance; Balance on Scan copy of Original Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-11-04 10:53:04', '2022-11-04 13:29:18', 1),
(97, 'Mauri-Asmak SARL', 'Cherivou', '', 'export@seafoodmiddleeast.com', '<p>\r\n	Mauri-Asmak SARL</p>\r\n<p>\r\n	Llot N 35, Zone plage des pecheurs</p>\r\n<p>\r\n	RC 3313</p>\r\n<p>\r\n	Nouakchott, Mauritania</p>\r\n', '<p>\r\n	Mauri-Asmak SARL</p>\r\n<p>\r\n	Llot N 35, Zone plage des pecheurs</p>\r\n<p>\r\n	RC 3313</p>\r\n<p>\r\n	Nouakchott, Mauritania</p>\r\n', '<p>\r\n	Mauri-Asmak SARL</p>\r\n<p>\r\n	Llot N 35, Zone plage des pecheurs</p>\r\n<p>\r\n	RC 3313</p>\r\n<p>\r\n	Nouakchott, Mauritania</p>\r\n', 0, 'Nouakchott', 135, NULL, NULL, NULL, NULL, 'TT Against Scan Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-11-10 09:02:38', '2022-11-10 09:02:38', 1),
(98, 'Raoping Yuxiang Aquaculture Co., Ltd', 'Eunice- Raoping', '', 'eunice@cutefoods.com', '<p>\r\n	Raoping Yuxiang Aquaculture Co., Ltd</p>\r\n<p>\r\n	No. 1-2, Lane-6, Dongxing South Road</p>\r\n<p>\r\n	Jingdong Jingzhou Town, Raoping Country</p>\r\n', '<p>\r\n	Raoping Yuxiang Aquaculture Co., Ltd</p>\r\n<p>\r\n	No. 1-2, Lane-6, Dongxing South Road</p>\r\n<p>\r\n	Jingdong Jingzhou Town, Raoping Country</p>\r\n', '<p>\r\n	Raoping Yuxiang Aquaculture Co., Ltd</p>\r\n<p>\r\n	No. 1-2, Lane-6, Dongxing South Road</p>\r\n<p>\r\n	Jingdong Jingzhou Town, Raoping Country</p>\r\n', 0, 'Raoping, China', 44, NULL, NULL, NULL, NULL, '10% Advance; Balance on Scan copy of Original Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-11-10 09:06:44', '2022-11-10 09:06:44', 1),
(99, 'ETS Ennasr Pour La fiche Artisanale', 'ETS Cherivou- 3', '', 'export@seafoodmiddleeast.com', '', '', NULL, 0, 'Nouadhibou', 135, NULL, NULL, NULL, NULL, 'TT Against Scan Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-12-07 07:25:25', '2022-12-07 07:25:25', 1),
(100, 'HANBADA CO.,LTD', 'Hanbada', '', 'export@seafoodmiddleeast.com', '', '', NULL, 0, 'Busan', 112, NULL, NULL, NULL, NULL, '20% Advance; Balance on Scan copy of Original Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-12-07 13:30:04', '2022-12-07 13:30:04', 1),
(101, '3M Seafood SA', '3M', '', 'export@seafoodmiddleeast.com', '', '', NULL, 0, 'Nouadhibou', 135, NULL, NULL, NULL, NULL, '100% After receipt of Copy Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-12-08 06:29:45', '2022-12-08 06:29:45', 1),
(102, 'Nyanza Perch', 'Nyanza', '', 'export@seafoodmiddleeast.com', '', '', NULL, 0, 'Jinja', 222, NULL, NULL, NULL, NULL, 'TT Against Document Copies', '', NULL, NULL, NULL, NULL, NULL, 0, '2022-12-21 06:29:33', '2022-12-21 06:29:33', 1),
(103, 'Mauritania Multi-Vendors', 'MR Vendors', '', 'export@seafoodmiddleeast.com', '', '', NULL, 0, 'Nouadhibou, Nouakchott', 135, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2023-01-07 06:49:11', '2023-01-07 06:49:11', 1),
(104, 'UNASSIGNED VENDORS', 'U-V', '', 'export@seafoodmiddleeast.com', '', '', NULL, 0, 'All Countries', 135, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2023-01-07 06:52:20', '2023-01-07 06:52:20', 1),
(105, 'Société ELEDJA SARL ', 'Société ELEDJA SARL ', '', 'export@seafoodmiddleeast.com', '', '', NULL, 1, 'Cotonou', 23, NULL, NULL, NULL, NULL, '20 % Advance payment and balance on scan copy of original Docs', '', NULL, NULL, NULL, NULL, NULL, 0, '2023-01-19 14:32:44', '2023-01-19 14:32:44', 1),
(106, 'SAN Distribution SARL', 'SAN Distribution SARL', '', 'export@seafoodmiddleeast.com', '<p>\r\n	<strong>SAN Distribution SARL</strong></p>\r\n<p>\r\n	<strong>RUE 506 LOT 672 TOKPA-JERICHO</strong></p>\r\n<p>\r\n	<strong>BP 5843 </strong></p>\r\n<p>\r\n	<strong>COTONOU-BENIN</strong></p>\r\n', '<p>\r\n	<strong>SAN Distribution SARL</strong></p>\r\n<p>\r\n	<strong>RUE 506 LOT 672 TOKPA-JERICHO</strong></p>\r\n<p>\r\n	<strong>BP 5843 </strong></p>\r\n<p>\r\n	<strong>COTONOU-BENIN</strong></p>\r\n', '<p>\r\n	<strong>SAN Distribution SARL</strong></p>\r\n<p>\r\n	<strong>RUE 506 LOT 672 TOKPA-JERICHO</strong></p>\r\n<p>\r\n	<strong>BP 5843 </strong></p>\r\n<p>\r\n	<strong>COTONOU-BENIN</strong></p>\r\n', 1, 'Cotonou', 23, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 0, '2023-01-19 14:33:47', '2023-01-19 14:33:47', 1),
(107, 'INDUSTRIA ALIMENTAR CARNES DE MOCAMBIQUE LDA (BEIRA)', 'B-MZM', '', 'export@seafoodmiddleeast.com', '<p>\r\n	INDUSTRIA ALIMENTAR CARNES DE MOCAMBIQUE LDA</p>\r\n<p>\r\n	AUTO ESTRADA DO VAZ , N&deg; 1</p>\r\n<p>\r\n	BAIRRO VAZ</p>\r\n<p>\r\n	CIDADE DA BEIRA , URBANO 1</p>\r\n<p>\r\n	MOCAMBIQUE</p>\r\n', '<p>\r\n	INDUSTRIA ALIMENTAR CARNES DE MOCAMBIQUE LDA</p>\r\n<p>\r\n	AUTO ESTRADA DO VAZ , N&deg; 1</p>\r\n<p>\r\n	BAIRRO VAZ</p>\r\n<p>\r\n	CIDADE DA BEIRA , URBANO 1</p>\r\n<p>\r\n	MOCAMBIQUE</p>\r\n', '<p>\r\n	INDUSTRIA ALIMENTAR CARNES DE MOCAMBIQUE LDA</p>\r\n<p>\r\n	AUTO ESTRADA DO VAZ , N&deg; 1</p>\r\n<p>\r\n	BAIRRO VAZ</p>\r\n<p>\r\n	CIDADE DA BEIRA , URBANO 1</p>\r\n<p>\r\n	MOCAMBIQUE</p>\r\n', 1, 'Beira', 145, NULL, NULL, NULL, NULL, 'TT Against Copy of Docs', '', NULL, NULL, NULL, NULL, NULL, 0, '2023-01-28 09:47:47', '2023-01-28 09:47:47', 1),
(108, 'INDUSTRIA ALIMENTAR CARNES DE MOCAMBIQUE LDA (MAPUTO)', 'M-MZM', '', 'export@seafoodmiddleeast.com', '<p>\r\n	INDUSTRIA ALIMENTAR CARNES DE MOCAMBIQUE LDA</p>\r\n<p>\r\n	AVENIDA DE MOCAMBIQUE KM 9,5</p>\r\n<p>\r\n	BAIRRO DO ZIMPETO DISTRITO</p>\r\n<p>\r\n	CIDADE DA MAPUTO, URBANO 5</p>\r\n<p>\r\n	MOCAMBIQUE</p>\r\n', '<p>\r\n	INDUSTRIA ALIMENTAR CARNES DE MOCAMBIQUE LDA</p>\r\n<p>\r\n	AVENIDA DE MOCAMBIQUE KM 9,5</p>\r\n<p>\r\n	BAIRRO DO ZIMPETO DISTRITO</p>\r\n<p>\r\n	CIDADE DA MAPUTO, URBANO 5</p>\r\n<p>\r\n	MOCAMBIQUE</p>\r\n', '<p>\r\n	INDUSTRIA ALIMENTAR CARNES DE MOCAMBIQUE LDA</p>\r\n<p>\r\n	AVENIDA DE MOCAMBIQUE KM 9,5</p>\r\n<p>\r\n	BAIRRO DO ZIMPETO DISTRITO</p>\r\n<p>\r\n	CIDADE DA MAPUTO, URBANO 5</p>\r\n<p>\r\n	MOCAMBIQUE</p>\r\n', 1, 'Maputo', 145, NULL, NULL, NULL, NULL, 'TT Against Copy of Docs', '', NULL, NULL, NULL, NULL, NULL, 0, '2023-01-28 09:49:22', '2023-01-28 09:49:22', 1),
(109, 'Kaysaint INC', 'Kaysaint Echo', '', 'export@seafoodmiddleeast.com', '', '', NULL, 0, '', 44, NULL, NULL, NULL, NULL, '10% Advance; Balance on Scan copy of Original Documents', '', NULL, NULL, NULL, NULL, NULL, 0, '2023-03-02 11:46:58', '2023-03-02 11:46:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `document_master`
--

CREATE TABLE `document_master` (
  `document_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `documents` longtext NOT NULL,
  `shared_with_me` longtext NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `document_master`
--

INSERT INTO `document_master` (`document_id`, `created_by`, `documents`, `shared_with_me`, `created_on`, `updated_on`) VALUES
(7, 1, '{\"folders\":[{\"fold_id\":3384,\"folderName\":\"Videos\",\"parentFolderId\":\"0\"},{\"fold_id\":5907,\"folderName\":\"Projects\",\"parentFolderId\":\"0\"},{\"fold_id\":6578,\"folderName\":\"Sea Food\",\"parentFolderId\":\"5907\"},{\"fold_id\":5493,\"folderName\":\"Tea Garden\",\"parentFolderId\":\"5907\"},{\"fold_id\":6111,\"folderName\":\"School Mgt.\",\"parentFolderId\":\"5907\"},{\"fold_id\":6032,\"folderName\":\"Sea Food One\",\"parentFolderId\":\"6578\"},{\"fold_id\":2236,\"folderName\":\"Sea Food Two\",\"parentFolderId\":\"6578\"},{\"fold_id\":5657,\"folderName\":\"Sea Food Three\",\"parentFolderId\":\"6578\"},{\"fold_id\":9591,\"folderName\":\"Tea Garden One\",\"parentFolderId\":\"5493\"},{\"fold_id\":7826,\"folderName\":\"Tea Garden Two\",\"parentFolderId\":\"5493\"},{\"fold_id\":9121,\"folderName\":\"Tea Garden Three\",\"parentFolderId\":\"5493\"},{\"fold_id\":6132,\"folderName\":\"School Mgt. One\",\"parentFolderId\":\"6111\"},{\"fold_id\":5867,\"folderName\":\"School Mgt. Two\",\"parentFolderId\":\"6111\"},{\"fold_id\":1526,\"folderName\":\"School Mgt. Three\",\"parentFolderId\":\"6111\"},{\"fold_id\":7583,\"folderName\":\"demo project\",\"parentFolderId\":\"7826\"}],\"files\":[{\"parentFolderId\":\"0\",\"file_id\":3948,\"file_name\":\"HelloWorld_-_Sheet1.csv\",\"file_type\":\"text\\/plain\",\"meta_data\":{\"file_name\":\"HelloWorld_-_Sheet1.csv\",\"file_type\":\"text\\/plain\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld_-_Sheet1.csv\",\"raw_name\":\"HelloWorld_-_Sheet1\",\"orig_name\":\"HelloWorld_-_Sheet1.csv\",\"client_name\":\"HelloWorld - Sheet1.csv\",\"file_ext\":\".csv\",\"file_size\":0.04,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"0\",\"file_id\":7537,\"file_name\":\"HelloWorld_-_Sheet1.pdf\",\"file_type\":\"application\\/pdf\",\"meta_data\":{\"file_name\":\"HelloWorld_-_Sheet1.pdf\",\"file_type\":\"application\\/pdf\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld_-_Sheet1.pdf\",\"raw_name\":\"HelloWorld_-_Sheet1\",\"orig_name\":\"HelloWorld_-_Sheet1.pdf\",\"client_name\":\"HelloWorld - Sheet1.pdf\",\"file_ext\":\".pdf\",\"file_size\":18.95,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"0\",\"file_id\":2091,\"file_name\":\"HelloWorld.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"meta_data\":{\"file_name\":\"HelloWorld.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld.docx\",\"raw_name\":\"HelloWorld\",\"orig_name\":\"HelloWorld.docx\",\"client_name\":\"HelloWorld.docx\",\"file_ext\":\".docx\",\"file_size\":9.82,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"0\",\"file_id\":6755,\"file_name\":\"HelloWorld.txt\",\"file_type\":\"text\\/plain\",\"meta_data\":{\"file_name\":\"HelloWorld.txt\",\"file_type\":\"text\\/plain\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld.txt\",\"raw_name\":\"HelloWorld\",\"orig_name\":\"HelloWorld.txt\",\"client_name\":\"HelloWorld.txt\",\"file_ext\":\".txt\",\"file_size\":0.03,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"0\",\"file_id\":9299,\"file_name\":\"HelloWorld.zip\",\"file_type\":\"application\\/zip\",\"meta_data\":{\"file_name\":\"HelloWorld.zip\",\"file_type\":\"application\\/zip\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld.zip\",\"raw_name\":\"HelloWorld\",\"orig_name\":\"HelloWorld.zip\",\"client_name\":\"HelloWorld.zip\",\"file_ext\":\".zip\",\"file_size\":7.38,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"0\",\"file_id\":6407,\"file_name\":\"images.jpeg\",\"file_type\":\"image\\/jpeg\",\"meta_data\":{\"file_name\":\"images.jpeg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/images.jpeg\",\"raw_name\":\"images\",\"orig_name\":\"images.jpeg\",\"client_name\":\"images.jpeg\",\"file_ext\":\".jpeg\",\"file_size\":7.81,\"is_image\":true,\"image_width\":275,\"image_height\":183,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"275\\\" height=\\\"183\\\"\"}},{\"parentFolderId\":\"0\",\"file_id\":3179,\"file_name\":\"jpg_images.jpg\",\"file_type\":\"image\\/jpeg\",\"meta_data\":{\"file_name\":\"jpg_images.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/jpg_images.jpg\",\"raw_name\":\"jpg_images\",\"orig_name\":\"jpg_images.jpg\",\"client_name\":\"jpg_images.jpg\",\"file_ext\":\".jpg\",\"file_size\":7.44,\"is_image\":true,\"image_width\":225,\"image_height\":225,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"225\\\" height=\\\"225\\\"\"}},{\"parentFolderId\":\"0\",\"file_id\":4490,\"file_name\":\"png_images.png\",\"file_type\":\"image\\/png\",\"meta_data\":{\"file_name\":\"png_images.png\",\"file_type\":\"image\\/png\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/png_images.png\",\"raw_name\":\"png_images\",\"orig_name\":\"png_images.png\",\"client_name\":\"png_images.png\",\"file_ext\":\".png\",\"file_size\":27.22,\"is_image\":true,\"image_width\":329,\"image_height\":153,\"image_type\":\"png\",\"image_size_str\":\"width=\\\"329\\\" height=\\\"153\\\"\"}},{\"parentFolderId\":\"0\",\"file_id\":8305,\"file_name\":\"student_list.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"meta_data\":{\"file_name\":\"student_list.xlsx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.spreadsheetml.sheet\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/student_list.xlsx\",\"raw_name\":\"student_list\",\"orig_name\":\"student_list.xlsx\",\"client_name\":\"student_list.xlsx\",\"file_ext\":\".xlsx\",\"file_size\":8.07,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"5907\",\"file_id\":3178,\"file_name\":\"images1.jpeg\",\"file_type\":\"image\\/jpeg\",\"meta_data\":{\"file_name\":\"images1.jpeg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/images1.jpeg\",\"raw_name\":\"images1\",\"orig_name\":\"images.jpeg\",\"client_name\":\"images.jpeg\",\"file_ext\":\".jpeg\",\"file_size\":7.81,\"is_image\":true,\"image_width\":275,\"image_height\":183,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"275\\\" height=\\\"183\\\"\"}},{\"parentFolderId\":\"6578\",\"file_id\":4306,\"file_name\":\"images2.jpeg\",\"file_type\":\"image\\/jpeg\",\"meta_data\":{\"file_name\":\"images2.jpeg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/images2.jpeg\",\"raw_name\":\"images2\",\"orig_name\":\"images.jpeg\",\"client_name\":\"images.jpeg\",\"file_ext\":\".jpeg\",\"file_size\":7.81,\"is_image\":true,\"image_width\":275,\"image_height\":183,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"275\\\" height=\\\"183\\\"\"}},{\"parentFolderId\":\"6032\",\"file_id\":4877,\"file_name\":\"jpg_images1.jpg\",\"file_type\":\"image\\/jpeg\",\"meta_data\":{\"file_name\":\"jpg_images1.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/jpg_images1.jpg\",\"raw_name\":\"jpg_images1\",\"orig_name\":\"jpg_images.jpg\",\"client_name\":\"jpg_images.jpg\",\"file_ext\":\".jpg\",\"file_size\":7.44,\"is_image\":true,\"image_width\":225,\"image_height\":225,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"225\\\" height=\\\"225\\\"\"}},{\"parentFolderId\":\"2236\",\"file_id\":7486,\"file_name\":\"HelloWorld_-_Sheet11.pdf\",\"file_type\":\"application\\/pdf\",\"meta_data\":{\"file_name\":\"HelloWorld_-_Sheet11.pdf\",\"file_type\":\"application\\/pdf\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld_-_Sheet11.pdf\",\"raw_name\":\"HelloWorld_-_Sheet11\",\"orig_name\":\"HelloWorld_-_Sheet1.pdf\",\"client_name\":\"HelloWorld - Sheet1.pdf\",\"file_ext\":\".pdf\",\"file_size\":18.95,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"5657\",\"file_id\":4429,\"file_name\":\"HelloWorld1.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"meta_data\":{\"file_name\":\"HelloWorld1.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld1.docx\",\"raw_name\":\"HelloWorld1\",\"orig_name\":\"HelloWorld.docx\",\"client_name\":\"HelloWorld.docx\",\"file_ext\":\".docx\",\"file_size\":9.82,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"5493\",\"file_id\":3359,\"file_name\":\"HelloWorld_-_Sheet11.csv\",\"file_type\":\"text\\/plain\",\"meta_data\":{\"file_name\":\"HelloWorld_-_Sheet11.csv\",\"file_type\":\"text\\/plain\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld_-_Sheet11.csv\",\"raw_name\":\"HelloWorld_-_Sheet11\",\"orig_name\":\"HelloWorld_-_Sheet1.csv\",\"client_name\":\"HelloWorld - Sheet1.csv\",\"file_ext\":\".csv\",\"file_size\":0.04,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"9591\",\"file_id\":9617,\"file_name\":\"HelloWorld1.txt\",\"file_type\":\"text\\/plain\",\"meta_data\":{\"file_name\":\"HelloWorld1.txt\",\"file_type\":\"text\\/plain\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld1.txt\",\"raw_name\":\"HelloWorld1\",\"orig_name\":\"HelloWorld.txt\",\"client_name\":\"HelloWorld.txt\",\"file_ext\":\".txt\",\"file_size\":0.03,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"9121\",\"file_id\":4635,\"file_name\":\"HelloWorld1.zip\",\"file_type\":\"application\\/zip\",\"meta_data\":{\"file_name\":\"HelloWorld1.zip\",\"file_type\":\"application\\/zip\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld1.zip\",\"raw_name\":\"HelloWorld1\",\"orig_name\":\"HelloWorld.zip\",\"client_name\":\"HelloWorld.zip\",\"file_ext\":\".zip\",\"file_size\":7.38,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"7826\",\"file_id\":2358,\"file_name\":\"HelloWorld2.txt\",\"file_type\":\"text\\/plain\",\"meta_data\":{\"file_name\":\"HelloWorld2.txt\",\"file_type\":\"text\\/plain\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld2.txt\",\"raw_name\":\"HelloWorld2\",\"orig_name\":\"HelloWorld.txt\",\"client_name\":\"HelloWorld.txt\",\"file_ext\":\".txt\",\"file_size\":0.03,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"1526\",\"file_id\":7125,\"file_name\":\"HelloWorld_-_Sheet12.pdf\",\"file_type\":\"application\\/pdf\",\"meta_data\":{\"file_name\":\"HelloWorld_-_Sheet12.pdf\",\"file_type\":\"application\\/pdf\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld_-_Sheet12.pdf\",\"raw_name\":\"HelloWorld_-_Sheet12\",\"orig_name\":\"HelloWorld_-_Sheet1.pdf\",\"client_name\":\"HelloWorld - Sheet1.pdf\",\"file_ext\":\".pdf\",\"file_size\":18.95,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}}]}', '', '2023-05-03 21:56:25', '2023-05-11 10:11:01'),
(17, 12, '', '{\"folders\":[{\"fold_id\":5907,\"folderName\":\"Projects\",\"parentFolderId\":\"0\"},{\"fold_id\":6578,\"folderName\":\"Sea Food\",\"parentFolderId\":\"5907\"},{\"fold_id\":5493,\"folderName\":\"Tea Garden\",\"parentFolderId\":\"5907\"},{\"fold_id\":6111,\"folderName\":\"School Mgt.\",\"parentFolderId\":\"5907\"},{\"fold_id\":6032,\"folderName\":\"Sea Food One\",\"parentFolderId\":\"6578\"},{\"fold_id\":2236,\"folderName\":\"Sea Food Two\",\"parentFolderId\":\"6578\"},{\"fold_id\":5657,\"folderName\":\"Sea Food Three\",\"parentFolderId\":\"6578\"},{\"fold_id\":9591,\"folderName\":\"Tea Garden One\",\"parentFolderId\":\"5493\"},{\"fold_id\":7826,\"folderName\":\"Tea Garden Two\",\"parentFolderId\":\"5493\"},{\"fold_id\":9121,\"folderName\":\"Tea Garden Three\",\"parentFolderId\":\"5493\"},{\"fold_id\":6132,\"folderName\":\"School Mgt. One\",\"parentFolderId\":\"6111\"},{\"fold_id\":5867,\"folderName\":\"School Mgt. Two\",\"parentFolderId\":\"6111\"},{\"fold_id\":1526,\"folderName\":\"School Mgt. Three\",\"parentFolderId\":\"6111\"},{\"fold_id\":7583,\"folderName\":\"demo project\",\"parentFolderId\":\"7826\"},{\"fold_id\":3384,\"folderName\":\"Videos\",\"parentFolderId\":\"0\"}],\"files\":[{\"parentFolderId\":\"5907\",\"file_id\":3178,\"file_name\":\"images1.jpeg\",\"file_type\":\"image\\/jpeg\",\"meta_data\":{\"file_name\":\"images1.jpeg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/images1.jpeg\",\"raw_name\":\"images1\",\"orig_name\":\"images.jpeg\",\"client_name\":\"images.jpeg\",\"file_ext\":\".jpeg\",\"file_size\":7.81,\"is_image\":true,\"image_width\":275,\"image_height\":183,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"275\\\" height=\\\"183\\\"\"}},{\"parentFolderId\":\"6578\",\"file_id\":4306,\"file_name\":\"images2.jpeg\",\"file_type\":\"image\\/jpeg\",\"meta_data\":{\"file_name\":\"images2.jpeg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/images2.jpeg\",\"raw_name\":\"images2\",\"orig_name\":\"images.jpeg\",\"client_name\":\"images.jpeg\",\"file_ext\":\".jpeg\",\"file_size\":7.81,\"is_image\":true,\"image_width\":275,\"image_height\":183,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"275\\\" height=\\\"183\\\"\"}},{\"parentFolderId\":\"6032\",\"file_id\":4877,\"file_name\":\"jpg_images1.jpg\",\"file_type\":\"image\\/jpeg\",\"meta_data\":{\"file_name\":\"jpg_images1.jpg\",\"file_type\":\"image\\/jpeg\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/jpg_images1.jpg\",\"raw_name\":\"jpg_images1\",\"orig_name\":\"jpg_images.jpg\",\"client_name\":\"jpg_images.jpg\",\"file_ext\":\".jpg\",\"file_size\":7.44,\"is_image\":true,\"image_width\":225,\"image_height\":225,\"image_type\":\"jpeg\",\"image_size_str\":\"width=\\\"225\\\" height=\\\"225\\\"\"}},{\"parentFolderId\":\"2236\",\"file_id\":7486,\"file_name\":\"HelloWorld_-_Sheet11.pdf\",\"file_type\":\"application\\/pdf\",\"meta_data\":{\"file_name\":\"HelloWorld_-_Sheet11.pdf\",\"file_type\":\"application\\/pdf\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld_-_Sheet11.pdf\",\"raw_name\":\"HelloWorld_-_Sheet11\",\"orig_name\":\"HelloWorld_-_Sheet1.pdf\",\"client_name\":\"HelloWorld - Sheet1.pdf\",\"file_ext\":\".pdf\",\"file_size\":18.95,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"5657\",\"file_id\":4429,\"file_name\":\"HelloWorld1.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"meta_data\":{\"file_name\":\"HelloWorld1.docx\",\"file_type\":\"application\\/vnd.openxmlformats-officedocument.wordprocessingml.document\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld1.docx\",\"raw_name\":\"HelloWorld1\",\"orig_name\":\"HelloWorld.docx\",\"client_name\":\"HelloWorld.docx\",\"file_ext\":\".docx\",\"file_size\":9.82,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"5493\",\"file_id\":3359,\"file_name\":\"HelloWorld_-_Sheet11.csv\",\"file_type\":\"text\\/plain\",\"meta_data\":{\"file_name\":\"HelloWorld_-_Sheet11.csv\",\"file_type\":\"text\\/plain\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld_-_Sheet11.csv\",\"raw_name\":\"HelloWorld_-_Sheet11\",\"orig_name\":\"HelloWorld_-_Sheet1.csv\",\"client_name\":\"HelloWorld - Sheet1.csv\",\"file_ext\":\".csv\",\"file_size\":0.04,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"9591\",\"file_id\":9617,\"file_name\":\"HelloWorld1.txt\",\"file_type\":\"text\\/plain\",\"meta_data\":{\"file_name\":\"HelloWorld1.txt\",\"file_type\":\"text\\/plain\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld1.txt\",\"raw_name\":\"HelloWorld1\",\"orig_name\":\"HelloWorld.txt\",\"client_name\":\"HelloWorld.txt\",\"file_ext\":\".txt\",\"file_size\":0.03,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"9121\",\"file_id\":4635,\"file_name\":\"HelloWorld1.zip\",\"file_type\":\"application\\/zip\",\"meta_data\":{\"file_name\":\"HelloWorld1.zip\",\"file_type\":\"application\\/zip\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld1.zip\",\"raw_name\":\"HelloWorld1\",\"orig_name\":\"HelloWorld.zip\",\"client_name\":\"HelloWorld.zip\",\"file_ext\":\".zip\",\"file_size\":7.38,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"7826\",\"file_id\":2358,\"file_name\":\"HelloWorld2.txt\",\"file_type\":\"text\\/plain\",\"meta_data\":{\"file_name\":\"HelloWorld2.txt\",\"file_type\":\"text\\/plain\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld2.txt\",\"raw_name\":\"HelloWorld2\",\"orig_name\":\"HelloWorld.txt\",\"client_name\":\"HelloWorld.txt\",\"file_ext\":\".txt\",\"file_size\":0.03,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}},{\"parentFolderId\":\"1526\",\"file_id\":7125,\"file_name\":\"HelloWorld_-_Sheet12.pdf\",\"file_type\":\"application\\/pdf\",\"meta_data\":{\"file_name\":\"HelloWorld_-_Sheet12.pdf\",\"file_type\":\"application\\/pdf\",\"file_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/\",\"full_path\":\"F:\\/xampp\\/htdocs\\/sfme\\/upload\\/documents\\/HelloWorld_-_Sheet12.pdf\",\"raw_name\":\"HelloWorld_-_Sheet12\",\"orig_name\":\"HelloWorld_-_Sheet1.pdf\",\"client_name\":\"HelloWorld - Sheet1.pdf\",\"file_ext\":\".pdf\",\"file_size\":18.95,\"is_image\":false,\"image_width\":null,\"image_height\":null,\"image_type\":\"\",\"image_size_str\":\"\"}}]}', '2023-05-11 07:26:17', '2023-05-11 08:00:40');

-- --------------------------------------------------------

--
-- Table structure for table `project_detail`
--

CREATE TABLE `project_detail` (
  `project_id` int(11) NOT NULL,
  `project_description` longtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_detail`
--

INSERT INTO `project_detail` (`project_id`, `project_description`, `created_at`, `modified_at`) VALUES
(2, '{\"projectDetail\":{\"title\":\"Project management\",\"description\":\"this is project management software details\"},\"contactDetail\":[{\"contact_obj\":4154,\"cont_person_name\":\"suman\",\"org_name\":\"suman software\",\"contact_email\":\"suman@ordering.co\",\"contact_first_ph\":\"09733935161\",\"contact_second_ph\":\"5632102541\",\"contact_persn_address\":\"kolkata\"}],\"requirementDetail\":[{\"doc_obj\":7694,\"req_gather_title\":\"Basic requirement\",\"req_gather_desc\":\"after complete basic requirement the next requirement will be provided\",\"req_gather_by\":\"1\",\"req_gather_by_name\":\" Mr. Jana \",\"req_gather_date\":\"2023-06-09\",\"files\":[]}],\"quotationDetail\":[{\"bi_obj\":6758,\"bi_PartyId\":\"1\",\"bi_PartyId_name\":\"Party 1\",\"bi_QuotationNo\":\"10001\",\"bi_QuotationDate\":\"2023-06-09\",\"bi_SubPartyName\":\"sketchem global\",\"bi_InvoiceDate\":\"2023-06-09\",\"bi_NoticeNo\":\"20001\",\"bi_PaymentMode\":\"3\",\"bi_PaymentModeName\":\"Cheque\",\"bi_InstrumentNumber\":\"1000 2000 3000\",\"bi_Remarks\":\"ok\",\"bi_OtherClientInfo\":\"ok\",\"bi_ImportantNotes\":\"ok\",\"particulars\":[{\"parti_obj\":7735,\"par_TaskType\":\"1\",\"par_TaskType_name\":\"Web Design\",\"par_HSNCode\":\"50001\",\"par_Duration\":\"1\",\"par_StartDate\":\"2023-06-09\",\"par_Amount\":\"1000\",\"par_Taxable\":\"1\"},{\"parti_obj\":1367,\"par_TaskType\":\"2\",\"par_TaskType_name\":\"Web Development\",\"par_HSNCode\":\"50002\",\"par_Duration\":\"5\",\"par_StartDate\":\"2023-06-12\",\"par_Amount\":\"5000\",\"par_Taxable\":\"1\"}],\"tax_GrossAmount\":\"6000\",\"tax_DiscountPercentage\":\"1\",\"tax_DiscountAmount\":\"60\",\"tax_TaxableAmount\":\"10\",\"tax_SGST_Rate\":\"1\",\"tax_SGST_Amount\":\"1\",\"tax_CGST_Rate\":\"1\",\"tax_CGST_Amount\":\"1\",\"tax_IGST_Rate\":\"1\",\"tax_IGST_Amount\":\"1\",\"tax_NetAmount\":\"6073\",\"tax_TotalTax\":\"13\",\"tax_Bank\":\"2\",\"tax_BankName\":\"SBI\",\"tax_ShowStamp\":\"1\",\"tax_ShowStampName\":\"\",\"commissions\":[{\"comi_obj\":5084,\"comi_emp_id\":\"2\",\"comi_emp_name\":\"Mr. Roy\",\"comi_rate_type\":\"1\",\"comi_rate_type_name\":\"\",\"comi_amount\":\"100\"}]}]}', '2023-06-09 08:56:26', '2023-06-09 09:14:03'),
(4, '{\"projectDetail\":{\"title\":\"School management\",\"description\":\"School management Software\"},\"contactDetail\":[],\"requirementDetail\":[],\"quotationDetail\":[{\"bi_obj\":4271,\"bi_PartyId\":\"1\",\"bi_PartyId_name\":\"Party 1\",\"bi_QuotationNo\":\"10001\",\"bi_QuotationDate\":\"2023-06-10\",\"bi_SubPartyName\":\"Global Sketch me\",\"bi_InvoiceDate\":\"2023-06-10\",\"bi_NoticeNo\":\"1002\",\"bi_PaymentMode\":\"1\",\"bi_PaymentModeName\":\"Cash\",\"bi_InstrumentNumber\":\"\",\"bi_Remarks\":\"\",\"bi_OtherClientInfo\":\"\",\"bi_ImportantNotes\":\"\",\"particulars\":[{\"parti_obj\":9627,\"par_TaskType\":\"1\",\"par_TaskType_name\":\"Web Design\",\"par_HSNCode\":\"1002\",\"par_Duration\":\"2\",\"par_StartDate\":\"2023-06-10\",\"par_Amount\":\"1000\",\"par_Taxable\":\"2\"}],\"tax_GrossAmount\":\"10\",\"tax_DiscountPercentage\":\"1\",\"tax_DiscountAmount\":\"1\",\"tax_TaxableAmount\":\"1\",\"tax_SGST_Rate\":\"1\",\"tax_SGST_Amount\":\"1\",\"tax_CGST_Rate\":\"1\",\"tax_CGST_Amount\":\"1\",\"tax_IGST_Rate\":\"1\",\"tax_IGST_Amount\":\"1\",\"tax_NetAmount\":\"1\",\"tax_TotalTax\":\"1\",\"tax_Bank\":\"1\",\"tax_BankName\":\"HDFC\",\"tax_ShowStamp\":\"1\",\"tax_ShowStampName\":\"\"}],\"client\":{\"client_obj\":3953,\"account_name\":\"G.B. Pant National Institute\",\"account_address1\":\"G.B. Pant National Institute of Himalayan Environment & Sustainable Development\",\"account_address2\":\"Kosi-katarmal, Almora-263 643, Uttarakhand.\",\"account_gst_no\":\"1\",\"account_telephone\":\"9856320158\",\"cbill_payment_mode\":\"cash\",\"important_note\":\"Quotation is not final\",\"other_client_details\":\"Other information is not mandatory\"}}', '2023-06-10 20:35:30', '2023-06-10 21:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `usertype` int(1) DEFAULT NULL COMMENT '1=admin,2=resource,3=marketing, 4=exporter, 5=Doc.Mgr',
  `username` varchar(30) DEFAULT NULL,
  `email` varchar(99) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `acc_masters` varchar(255) DEFAULT NULL COMMENT 'for permission',
  `offer_ids` text COMMENT 'for exporter',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `blocked` tinyint(1) NOT NULL DEFAULT '0',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `usertype`, `username`, `email`, `pass`, `acc_masters`, `offer_ids`, `verified`, `blocked`, `registration_date`) VALUES
(1, 1, 'admin', 'accountmanagementsystem.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '12,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109', NULL, 1, 0, '2020-02-18 09:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_change_mails`
--

CREATE TABLE `user_change_mails` (
  `cm_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `otp` varchar(99) DEFAULT NULL,
  `new_email` varchar(99) DEFAULT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_change_mails`
--

INSERT INTO `user_change_mails` (`cm_id`, `user_id`, `otp`, `new_email`, `used`) VALUES
(1, 1, 'CM6119286854D26', 'saby@seafoodmiddleeast.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `ud_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(99) DEFAULT NULL,
  `lastname` varchar(99) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `img` varchar(999) DEFAULT NULL,
  `company_details` text NOT NULL,
  `bank_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`ud_id`, `user_id`, `firstname`, `lastname`, `contact`, `img`, `company_details`, `bank_details`) VALUES
(1, 1, 'Mr.', 'Trader', '+971501551059', '0bec25e568078e01afe2dcd48050d79b.jpg', '{\"company_name\":\"Sketchme Global\",\"address1\":\"Kolkata - 700303\",\"GST\":\"0123456789\",\"phone\":\"9766325874\",\"email\":\"info@mail.com\",\"website\":\"https:\\/\\/sketchmeglobal.com\\/\",\"PAN\":\"BCCPJ02114\",\"contact_person\":\"Mr. Das\",\"mobile1\":\"9685201324\",\"mobile2\":\"9836521401\",\"alternate_email\":\"contact@mail.com\",\"company_subtitle\":\"[Think - Design - Develop - Maintain]\",\"company_detail\":\"[Website Designing - Website Development - Software Development - Android Apps - System Maintenance - Domain Name - Server Space]\"}', '{\"bank_name\":\"HDFC\",\"bank_address\":\"No 43\\/3, Feeder Road, Belghoria, North 24 Parganas-700056\",\"bank_account_no\":\"50200049710035\",\"bank_ifs_code\":\"HDFC0001925 (5th character is zero)\",\"bank_micr_code\":\"700240059\",\"bank_branch_code\":\"1925\"}');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `ul_id` int(11) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `pk_id` int(11) NOT NULL,
  `action_taken` enum('add','edit','delete','other') NOT NULL,
  `old_data` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `up_id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL COMMENT 'menu id',
  `user_id` int(11) NOT NULL,
  `view_permission` tinyint(1) NOT NULL DEFAULT '1',
  `add_permission` tinyint(1) NOT NULL DEFAULT '1',
  `edit_permission` tinyint(1) NOT NULL DEFAULT '1',
  `delete_permission` tinyint(1) NOT NULL DEFAULT '1',
  `print_permission` tinyint(1) NOT NULL DEFAULT '1',
  `download_permission` tinyint(1) NOT NULL DEFAULT '1',
  `block_permission` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'menu block',
  `custom1` tinyint(1) DEFAULT '1',
  `custom2` tinyint(1) DEFAULT '1',
  `custom3` tinyint(1) DEFAULT '1',
  `custom4` tinyint(1) DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`up_id`, `m_id`, `user_id`, `view_permission`, `add_permission`, `edit_permission`, `delete_permission`, `print_permission`, `download_permission`, `block_permission`, `custom1`, `custom2`, `custom3`, `custom4`, `status`, `create_date`, `modify_date`) VALUES
(1, 3, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 17:54:43'),
(2, 5, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:04:55'),
(3, 7, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:13:40'),
(4, 8, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:22:12'),
(5, 9, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:28:41'),
(6, 10, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:28:41'),
(7, 12, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:28:41'),
(8, 13, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:28:41'),
(9, 14, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:28:41'),
(10, 15, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:51:38'),
(11, 16, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:51:38'),
(12, 17, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:51:38'),
(13, 18, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:51:38'),
(14, 11, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, '2020-04-18 16:13:27', '2020-04-18 18:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `user_reset_passwords`
--

CREATE TABLE `user_reset_passwords` (
  `rp_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `otp` varchar(99) DEFAULT NULL,
  `time` varchar(30) DEFAULT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_master`
--
ALTER TABLE `acc_master`
  ADD PRIMARY KEY (`am_id`);

--
-- Indexes for table `document_master`
--
ALTER TABLE `document_master`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `project_detail`
--
ALTER TABLE `project_detail`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_change_mails`
--
ALTER TABLE `user_change_mails`
  ADD PRIMARY KEY (`cm_id`),
  ADD KEY `user_change_mails_ibfk_1` (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`ud_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`ul_id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`up_id`),
  ADD KEY `menu_id` (`m_id`);

--
-- Indexes for table `user_reset_passwords`
--
ALTER TABLE `user_reset_passwords`
  ADD PRIMARY KEY (`rp_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_master`
--
ALTER TABLE `acc_master`
  MODIFY `am_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `document_master`
--
ALTER TABLE `document_master`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `project_detail`
--
ALTER TABLE `project_detail`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_change_mails`
--
ALTER TABLE `user_change_mails`
  MODIFY `cm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `ud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `ul_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `up_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_reset_passwords`
--
ALTER TABLE `user_reset_passwords`
  MODIFY `rp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_change_mails`
--
ALTER TABLE `user_change_mails`
  ADD CONSTRAINT `user_change_mails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_reset_passwords`
--
ALTER TABLE `user_reset_passwords`
  ADD CONSTRAINT `user_reset_passwords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
