-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2012 at 12:51 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventorydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'root'),
('casas', 'mystore');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_id` int(11) NOT NULL,
  `delivery_date` datetime NOT NULL,
  `amount_paid` double(10,2) NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`delivery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`delivery_id`, `supplier_id`, `delivery_date`, `amount_paid`, `emp_id`) VALUES
(22, 1, '2012-06-12 07:49:12', 10000.00, 37),
(24, 2, '2012-06-12 22:03:31', 1300.00, 37),
(25, 3, '2012-06-14 06:53:15', 37.44, 37),
(26, 4, '2012-06-14 07:10:02', 4412.30, 37),
(28, 4, '2012-06-16 16:09:38', 17.89, 37);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_detail`
--

CREATE TABLE IF NOT EXISTS `delivery_detail` (
  `delivery_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `delivered_qty` int(11) NOT NULL,
  `d_unit_price` double(10,2) NOT NULL,
  `d_total_price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_detail`
--

INSERT INTO `delivery_detail` (`delivery_id`, `product_id`, `delivered_qty`, `d_unit_price`, `d_total_price`) VALUES
(22, 193, 200, 50.00, 10000.00),
(23, 59, 1, 90.25, 90.25),
(23, 60, 1, 152.00, 152.00),
(24, 3, 20, 5.00, 100.00),
(24, 52, 20, 60.00, 1200.00),
(25, 2, 3, 11.73, 35.19),
(25, 4, 1, 2.25, 2.25),
(26, 54, 10, 19.34, 193.40),
(26, 57, 10, 421.89, 4218.90),
(27, 4, 10, 2.25, 22.50),
(28, 58, 1, 17.89, 17.89);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `date_hired` date NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_name`, `address`, `contact_no`, `date_hired`, `username`, `password`, `email`) VALUES
(2, 'Don Bhrayan M. Singh', 'Talamban', 2147483647, '2011-11-23', 'dsingh', 'password', ''),
(3, 'Rene Oftana', 'Labangon', 2147483647, '2011-11-07', 'roftana', 'password', ''),
(24, 'Sherlock Holmes', 'WestMester Abbey Street', 999999999, '2011-11-02', 'shomes', 'wilson', ''),
(25, 'Nikko Gagno', 'Labangon Opon Merida', 1290301923, '2011-11-23', 'ngagno', 'password', ''),
(26, 'John Doe', 'Unknown', 23908123, '2011-09-29', 'jdoe', 'password', ''),
(27, 'Ludica Oja', 'Matalom', 2147483647, '2011-11-24', 'loja', 'password', ''),
(28, 'Aireen Minoza', 'apsodjfp', 2031231239, '2011-11-23', 'aminoza', 'password', ''),
(29, 'sirpardillo', 'aoahdofihaosdf', 1237198237, '2011-11-20', 'spar', 'password', ''),
(30, 'don juan carlos', 'qwqowiue', 1231, '2011-11-23', 'qoiwueio', 'woieuq', ''),
(31, 'john joseph don', 'oiquweoiquwoe', 19213, '2011-11-07', 'oahf', 'iheurhuiwer', ''),
(32, 'John Bolton', 'Heaven', 0, '2011-12-03', 'jbolt', 'password', ''),
(33, 'ann', 'talamban', 12983162, '2011-12-05', 'aiw', 'poapsedfi', ''),
(34, 'Bryan Bojorque L.', '119 Limehills', 9306309, '2012-05-26', 'bryan', 'password', 'a@a.com'),
(35, '', 'USA CA, 112435 Block 5 Niggah.', 0, '2012-05-28', 'Jane', 'password', 'jane@doe.com'),
(36, 'Jane Doe L.', '110 Yoyalo', 9306309, '2012-05-28', 'jane2', 'password', 'jane@jane.com'),
(37, 'Bryan L. Bojorque', '119 Limehills Subd Yati Liloan', 932909145, '2012-05-31', 'bryan.l.bojorque', 'password', 'bojorque.l.bojorque@inventorys');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_price` double(5,2) NOT NULL,
  `balance_qty` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `unit_price`, `balance_qty`) VALUES
(1, 3.00, 149),
(2, 11.73, 150),
(3, 5.00, 180),
(4, 2.25, 160),
(52, 60.00, 169),
(53, 20.00, 148),
(54, 19.34, 148),
(55, 15.41, 150),
(56, 216.55, 149),
(57, 421.89, 160),
(58, 17.89, 149),
(59, 90.25, 151),
(60, 152.00, 151),
(61, 17.62, 150),
(62, 226.70, 150),
(63, 431.47, 149),
(64, 1.87, 150),
(65, 142.00, 150),
(66, 1.60, 150),
(67, 6.30, 150),
(68, 2.86, 149),
(69, 61.22, 150),
(70, 61.22, 150),
(71, 87.28, 150),
(72, 87.28, 150),
(73, 50.25, 149),
(74, 20.50, 150),
(75, 19.81, 150),
(76, 25.47, 150),
(77, 15.64, 150),
(78, 22.33, 150),
(79, 30.07, 150),
(80, 196.87, 150),
(81, 196.87, 150),
(82, 264.99, 150),
(83, 271.80, 150),
(84, 210.49, 150),
(85, 210.49, 150),
(86, 207.77, 150),
(87, 65.48, 150),
(88, 90.88, 150),
(89, 51.70, 150),
(90, 110.56, 150),
(91, 187.51, 150),
(92, 323.56, 150),
(93, 98.28, 150),
(94, 180.21, 150),
(95, 74.29, 150),
(96, 132.68, 150),
(97, 225.00, 150),
(98, 11.80, 150),
(99, 11.17, 150),
(100, 6.20, 150),
(101, 23.85, 150),
(102, 5.25, 149),
(103, 1.25, 150),
(104, 14.25, 150),
(105, 8.05, 150),
(106, 84.56, 150),
(107, 6.65, 150),
(108, 87.13, 150),
(109, 88.75, 150),
(110, 69.32, 150),
(111, 115.51, 150),
(112, 10.31, 150),
(113, 19.85, 150),
(114, 13.10, 150),
(115, 9.37, 150),
(116, 113.12, 150),
(117, 299.20, 150),
(118, 9.10, 150),
(119, 25.76, 150),
(120, 11.12, 150),
(121, 16.34, 150),
(122, 14.62, 150),
(123, 65.00, 150),
(124, 94.00, 150),
(125, 6.77, 150),
(126, 14.00, 150),
(127, 74.00, 150),
(128, 118.15, 150),
(129, 64.00, 150),
(130, 280.00, 150),
(131, 10.25, 150),
(132, 679.08, 150),
(133, 362.21, 150),
(134, 362.21, 150),
(135, 305.00, 150),
(136, 305.00, 150),
(137, 27.50, 150),
(138, 65.00, 150),
(139, 5.22, 150),
(140, 5.22, 150),
(141, 87.36, 150),
(142, 75.01, 150),
(143, 70.40, 150),
(144, 12.50, 150),
(145, 49.53, 150),
(146, 1.75, 150),
(147, 4.28, 150),
(148, 7.40, 150),
(149, 41.76, 150),
(150, 15.00, 150),
(151, 11.93, 150),
(152, 87.86, 150),
(153, 137.25, 150),
(154, 123.44, 150),
(155, 188.29, 150),
(156, 169.76, 150),
(157, 3.79, 150),
(158, 4.48, 150),
(162, 20.50, 50),
(163, 20.50, 50),
(164, 35.25, 20),
(171, 15.00, 46),
(172, 999.75, 19),
(173, 14.00, 145),
(189, 24.00, 21),
(190, 625.00, 3),
(191, 150.75, 608),
(192, 50.00, 920),
(193, 50.00, 1647),
(194, 25.00, 475),
(195, 25.00, 300),
(196, 100.00, 609);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE IF NOT EXISTS `product_detail` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_generic_name` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `who_added` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_id`, `product_name`, `product_generic_name`, `product_description`, `who_added`, `date_added`) VALUES
(1, 'Advil 200 mg', 'Ibuprofen', '', '', '0000-00-00 00:00:00'),
(2, 'Alaxan 200 mg', 'Ibuprofen', '', '', '0000-00-00 00:00:00'),
(3, 'Alaxan Forte', 'Ibuprofen', '', '', '0000-00-00 00:00:00'),
(4, 'Alaxan Gel', 'Methyl Salicylate + Menthol', '', '', '0000-00-00 00:00:00'),
(52, 'Allerin Reformulated', 'Diphenhydramine HCI', '', '', '0000-00-00 00:00:00'),
(53, 'Allerta 10 mg', 'Loratadine', '', '', '0000-00-00 00:00:00'),
(54, 'Amoxil 250 mg', 'Amoxicillin', '', '', '0000-00-00 00:00:00'),
(55, 'Ampicin 500', 'Ampicillin Trihydrate', '', '', '0000-00-00 00:00:00'),
(56, 'Appebon 500 Syrup 60 mL', 'Buclizine Hydrochloride, Lysine Hydrochloride, Vit B1 + B12 + B6', '', '', '0000-00-00 00:00:00'),
(57, 'Appebon 500 Syrup 120 mL', 'Buclizine Hydrochloride, Lysine Hydrochloride, Vit B1 + B12 + B6', '', '', '0000-00-00 00:00:00'),
(58, 'Appebon 500 Tablet', 'Buclizine Hydrochloride, Lysine Hydrochloride, Vit B1 + B12 + B6, Vit C', '', '', '0000-00-00 00:00:00'),
(59, 'Appebon Kid Syrup 60 mL', 'Iron, L-Lysine, Vit B1 + B12 + B6', '', '', '0000-00-00 00:00:00'),
(60, 'Appebon Kid Syrup 120 mL', 'Iron, L-Lysine, Vit B1 + B12 + B6', '', '', '0000-00-00 00:00:00'),
(61, 'Appebon with Iron Capsule', 'Buclizine Hydrochloride, Lysine Hydrochloride, Iron Fumarate, Vit B1 + B12 + B6', '', '', '0000-00-00 00:00:00'),
(62, 'Appebon with Iron Syrup 60 mL', 'Buclizine HCl, Thiamine HCl, Pyridoxine HCl, Cyanocobalamin, L-Lysine HCl, Fe Sulfate', '', '', '0000-00-00 00:00:00'),
(63, 'Appebon with Iron Syrup 120 mL', 'Buclizine HCl, Thiamine HCl, Pyridoxine HCl, Cyanocobalamin, L-Lysine HCl, Fe Sulfate', '', '', '0000-00-00 00:00:00'),
(64, 'Aspilets 8mg', 'Aspirin', '', '', '0000-00-00 00:00:00'),
(65, 'Ascof', 'Lagundi', '', '', '0000-00-00 00:00:00'),
(66, 'Bayer', 'Aspirin', '', '', '0000-00-00 00:00:00'),
(67, 'Bioflu', 'Phenylephrine HCl, Chlorphenamine Maleate, Paracetamol', '', '', '0000-00-00 00:00:00'),
(68, 'Biogesic 500mg', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(69, 'Biogesic 120mg 60ml strawberry', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(70, 'Biogesic 120mg 60ml orange', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(71, 'Biogesic 250mg 60ml strawberry', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(72, 'Biogesic 250mg 60ml orange', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(73, 'Biogesic Drops 15ml', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(74, 'Bisolvon', 'Bromhexine', '', '', '0000-00-00 00:00:00'),
(75, 'BPNorm 10 mg', 'Fosinopril Sodium', '', '', '0000-00-00 00:00:00'),
(76, 'BPNorm 20 mg', 'Fosinopril Sodium', '', '', '0000-00-00 00:00:00'),
(77, 'Calcibloc 5 mg', 'Nifedipine', '', '', '0000-00-00 00:00:00'),
(78, 'Calcibloc 10 mg', 'Nifedipine', '', '', '0000-00-00 00:00:00'),
(79, 'Calcibloc OD 30 mg', 'Nifedipine', '', '', '0000-00-00 00:00:00'),
(80, 'Calpol Infant Suspension 100ml', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(81, 'Calpol Sugar Free Infant Suspension 100ml', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(82, 'Calpol Infant Suspension 200ml', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(83, 'Calpol Sugar Free Infant Suspension 200ml ', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(84, 'Calpol Infant Suspension 5ml Sachets', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(85, 'Calpol Sugar Free Infant Suspension 5ml Sachets', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(86, 'Calpol Night Sugar Free Suspension 100ml', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(87, 'Ceelin Drops 15ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(88, 'Ceelin Drops 30ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(89, 'Ceelin Syr 60ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(90, 'Ceelin Syr 120ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(91, 'Ceelin Syr 250ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(92, 'Ceelin Syr 500ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(93, 'Ceelin Chewable 100mg', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(94, 'Ceelin Chewable 60ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(95, 'Ceelin Plus 60ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(96, 'Ceelin Plus 120ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(97, 'Ceelin Plus 250ml', 'Ascorbic Acid', '', '', '0000-00-00 00:00:00'),
(98, 'Conzace', 'Multivitamins + Mineral', '', '', '0000-00-00 00:00:00'),
(99, 'Dazomet 500 mg', 'Metronidazole', '', '', '0000-00-00 00:00:00'),
(100, 'Decilone 500 mcg', 'Dexamethasone', '', '', '0000-00-00 00:00:00'),
(101, 'Decilone Forte 4 mg', 'Dexamethasone', '', '', '0000-00-00 00:00:00'),
(102, 'Decolgen Forte', 'Chlorphenamine Maleate, Phenylephrine HCl, Paracetamol', '', '', '0000-00-00 00:00:00'),
(103, 'Decolgen No-Drowse 10mg', 'Phenylephrine HCl, Paracetamol', '', '', '0000-00-00 00:00:00'),
(104, 'Decolgen No-Drowse 500mg', 'Phenylephrine HCl, Paracetamol', '', '', '0000-00-00 00:00:00'),
(105, 'Decolsin Reformulated capsule', 'Dextromethorphan Hydrobromide, Paracetamol, Phenylpropanolamine HCl', '', '', '0000-00-00 00:00:00'),
(106, 'Decolsin Reformulated oral suspension', 'Dextromethorphan Hydrobromide, Paracetamol, Phenylpropanolamine HCl', '', '', '0000-00-00 00:00:00'),
(107, 'Diatabs 2mg', 'Loperamide', '', '', '0000-00-00 00:00:00'),
(108, 'Disudrin Drops 10ml', 'Chlorphenamine, Phenylephrine', '', '', '0000-00-00 00:00:00'),
(109, 'Disudrin Syr 60ml', 'Chlorphenamine, Phenylephrine', '', '', '0000-00-00 00:00:00'),
(110, 'Dolan FP 100mg 60ml', 'Ibuprofen', '', '', '0000-00-00 00:00:00'),
(111, 'Dolan FP 200mg 60ml', 'Ibuprofen', '', '', '0000-00-00 00:00:00'),
(112, 'Dolfenal 250 mg', 'Mefenamic acid', '', '', '0000-00-00 00:00:00'),
(113, 'Dolfenal 500 mg', 'Mefenamic acid', '', '', '0000-00-00 00:00:00'),
(114, 'Dulcolax 5mg', 'Bisacodyl', '', '', '0000-00-00 00:00:00'),
(115, 'Ebutol Forte', 'Ethambutol', '', '', '0000-00-00 00:00:00'),
(116, 'Ebutol Syrup', 'Ethambutol', '', '', '0000-00-00 00:00:00'),
(117, 'Ecocef (vial) 750 mg', 'Cefuroxime', '', '', '0000-00-00 00:00:00'),
(118, 'Econofix', 'Ethambutol, Isoniazid, Pyrazinamide, Rifampicin', '', '', '0000-00-00 00:00:00'),
(119, 'Elantan slow/sustained-release cap', 'Isosorbide Mononitrate', '', '', '0000-00-00 00:00:00'),
(120, 'Elantan tab 20 mg', 'Isosorbide Mononitrate', '', '', '0000-00-00 00:00:00'),
(121, 'Elantan tab 50 mg', 'Isosorbide Mononitrate', '', '', '0000-00-00 00:00:00'),
(122, 'Eldicet 50 mg', 'Pinaverium', '', '', '0000-00-00 00:00:00'),
(123, 'Eleobron GPC 60 mL', 'Guaifenesin, Phenylpropanolamine HCl, Chlorpheniramine Maleate', '', '', '0000-00-00 00:00:00'),
(124, 'Eleobron GPC 120 mL', 'Guaifenesin, Phenylpropanolamine HCl, Chlorpheniramine Maleate', '', '', '0000-00-00 00:00:00'),
(125, 'Eleomox 250 mg', 'Amoxicillin', '', '', '0000-00-00 00:00:00'),
(126, 'Eleomox 250 mg', 'Amoxicillin', '', '', '0000-00-00 00:00:00'),
(127, 'Eleomox 125 mg/5 mL x 60 mL (oral suspension)', 'Amoxicillin', '', '', '0000-00-00 00:00:00'),
(128, 'Eleomox 250 mg/5 mL x 60 mL (oral suspension)', 'Amoxicillin', '', '', '0000-00-00 00:00:00'),
(129, 'Eleomox 100 mg/1 mL x 10 mL (oral drops)', 'Amoxicillin', '', '', '0000-00-00 00:00:00'),
(130, 'Elevex eye drops 0.5 % x 5 mL', 'Timolol Maleate', '', '', '0000-00-00 00:00:00'),
(131, 'Elevit Pronatal', 'Multivitamins + Mineral', '', '', '0000-00-00 00:00:00'),
(132, 'Elica lotion 0.1 % x 30 mL', 'Mometasone Furoate', '', '', '0000-00-00 00:00:00'),
(133, 'Elica cream 0.1 % x 5 g', 'Mometasone Furoate', '', '', '0000-00-00 00:00:00'),
(134, 'Elica ointment 0.1 % x 5 g', 'Mometasone Furoate', '', '', '0000-00-00 00:00:00'),
(135, 'Elicocin ophthalmic solution 5 mL', 'Erythromycin, Colistin Methanesulfonate Sodium', '', '', '0000-00-00 00:00:00'),
(136, 'Elicocin ophth oint 3.5 g', 'Erythromycin, Colistin Methanesulfonate Sodium', '', '', '0000-00-00 00:00:00'),
(137, 'Elin Lidocaine Hydrochloride (Vial) 2 % x 10 mL', 'Lidocaine HCl', '', '', '0000-00-00 00:00:00'),
(138, 'Elin Lidocaine Hydrochloride 2 % x 50 mL', 'Lidocaine HCl', '', '', '0000-00-00 00:00:00'),
(139, 'Enervon C', 'Multivitamins + Mineral', '', '', '0000-00-00 00:00:00'),
(140, 'Enervon C Flex', 'Multivitamins + Mineral', '', '', '0000-00-00 00:00:00'),
(141, 'Enervon C syrup 120ml', 'Multivitamins + Mineral', '', '', '0000-00-00 00:00:00'),
(142, 'E-Zinc syrup', 'Zinc Sulphate Monohydrate', '', '', '0000-00-00 00:00:00'),
(143, 'E-Zinc oral drops', 'Zinc Sulphate Monohydrate', '', '', '0000-00-00 00:00:00'),
(144, 'Flanax', 'Anaprox', '', '', '0000-00-00 00:00:00'),
(145, 'Fozal 10 mg', 'Alfuzosin HCl', '', '', '0000-00-00 00:00:00'),
(146, 'Kiddilets Chewable 80mg', 'Paracetamol', '', '', '0000-00-00 00:00:00'),
(147, 'Kremil-S', 'Aluminum Hydroxide, Magnesium Hydroxide, Simeticone', '', '', '0000-00-00 00:00:00'),
(148, 'Kremil-S Extra Strength', 'Aluminum Hydroxide, Magnesium Hydroxide, Simeticone', '', '', '0000-00-00 00:00:00'),
(149, 'Lanoxin 0.25 mg', 'Digoxin', '', '', '0000-00-00 00:00:00'),
(150, 'Liveraid', 'Silymarin, L-ornithine-L-Aspartate', '', '', '0000-00-00 00:00:00'),
(151, 'Loviscol capsule 500 mg ', 'Carbocisteine', '', '', '0000-00-00 00:00:00'),
(152, 'Loviscol Ped syrup 100 mg/5 mL x 60 mL', 'Carbocisteine', '', '', '0000-00-00 00:00:00'),
(153, 'Loviscol Ped syrup 100 mg/5 mL x 120 mL', 'Carbocisteine', '', '', '0000-00-00 00:00:00'),
(154, 'Loviscol Adult oral suspension 250 mg/5 mL x 60 mL', 'Carbocisteine', '', '', '0000-00-00 00:00:00'),
(155, 'Loviscol Adult oral suspension 250 mg/5 mL x 120 mL', 'Carbocisteine', '', '', '0000-00-00 00:00:00'),
(156, 'Loviscol Infant oral drops 50 mg/1 mL x 15 mL', 'Carbocisteine', '', '', '0000-00-00 00:00:00'),
(157, 'Medicol 200mg', 'Ibuprofen', '', '', '0000-00-00 00:00:00'),
(158, 'Medicol Advance Softgel 200mg', 'Ibuprofen', '', '', '0000-00-00 00:00:00'),
(164, 'Green Cross Alcohol 250mL', 'Isoprophyl Alcohol 40% Solution', '', '', '0000-00-00 00:00:00'),
(171, 'Frenzy Condoms 3 in 1', 'Condoms', 'Used to protect the oten from the bilat!', 'Bryan L. Bojorque', '2002-06-12 16:29:15'),
(172, 'Western Digital HD', 'Hard Drive', 'A fast hard drive with newest technology', 'Bryan L. Bojorque', '2002-06-12 16:38:57'),
(189, 'Frenzy Condom 3 in 1', 'Condom', 'Protection sa oten!', 'Bryan L. Bojorque', '2002-06-12 17:56:18'),
(190, 'Lampshade SD1502', 'Lampshade', 'Excellent lampshade, good for reading in the night.', 'Bryan L. Bojorque', '2002-06-12 18:04:01'),
(191, 'Lunchbox', 'Lunchbox', 'Lunchbox', 'Bryan L. Bojorque', '2005-06-12 07:55:39'),
(192, 'Mugg', 'Mugg', 'Mugg for coffee', 'Bryan L. Bojorque', '2005-06-12 08:02:27'),
(193, 'Shell 2TXL', 'Motor Oil', 'Shell 2TXL', 'Bryan L. Bojorque', '2006-06-12 18:47:28'),
(194, 'Shell Helix', 'Motor Oil', 'Shell Helix', 'Bryan L. Bojorque', '2006-06-12 18:47:50'),
(195, 'Shell Restore & Protect', 'Fuel Injection Cleaner', 'Fuel Injection Cleaner', 'Bryan L. Bojorque', '2006-06-12 18:48:24'),
(196, 'Shell Alvania', 'Grease', 'Shell Alvania', 'Bryan L. Bojorque', '2006-06-12 18:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_ledger`
--

CREATE TABLE IF NOT EXISTS `product_ledger` (
  `ledger_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `trans_type` char(10) NOT NULL,
  `trans_id` int(11) NOT NULL,
  `inventory_debit` char(10) NOT NULL,
  `inventory_credit` char(10) NOT NULL,
  `balance_qty` int(11) NOT NULL,
  PRIMARY KEY (`ledger_id`),
  KEY `product_id` (`product_id`),
  KEY `trans_id` (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `product_ledger`
--

INSERT INTO `product_ledger` (`ledger_id`, `product_id`, `trans_type`, `trans_id`, `inventory_debit`, `inventory_credit`, `balance_qty`) VALUES
(23, 196, 'SALE', 110, 'DEBIT', 'NONE', 9),
(25, 192, 'SALE', 111, 'DEBIT', 'NONE', 21),
(26, 191, 'SALE', 112, 'DEBIT', 'NONE', 6),
(27, 192, 'SALE', 112, 'DEBIT', 'NONE', 20),
(28, 171, 'SALE', 113, 'DEBIT', 'NONE', 49),
(29, 172, 'SALE', 113, 'DEBIT', 'NONE', 29),
(30, 171, 'SALE', 114, 'DEBIT', 'NONE', 48),
(31, 172, 'SALE', 114, 'DEBIT', 'NONE', 28),
(32, 171, 'SALE', 115, 'DEBIT', 'NONE', 47),
(33, 189, 'SALE', 115, 'DEBIT', 'NONE', 22),
(34, 171, 'SALE', 116, 'DEBIT', 'NONE', 46),
(35, 189, 'SALE', 116, 'DEBIT', 'NONE', 21),
(36, 190, 'SALE', 116, 'DEBIT', 'NONE', 3),
(37, 1, 'SALE', 117, 'DEBIT', 'NONE', 149),
(38, 102, 'SALE', 118, 'DEBIT', 'NONE', 149),
(39, 63, 'SALE', 119, 'DEBIT', 'NONE', 149),
(40, 194, 'SALE', 120, 'DEBIT', 'NONE', 75),
(41, 172, 'SALE', 120, 'DEBIT', 'NONE', 27),
(42, 73, 'SALE', 121, 'DEBIT', 'NONE', 149),
(43, 68, 'SALE', 121, 'DEBIT', 'NONE', 149),
(44, 56, 'SALE', 122, 'DEBIT', 'NONE', 149),
(45, 58, 'SALE', 122, 'DEBIT', 'NONE', 148),
(46, 53, 'SALE', 123, 'DEBIT', 'NONE', 149),
(47, 53, 'SALE', 123, 'DEBIT', 'NONE', 148),
(48, 52, 'SALE', 123, 'DEBIT', 'NONE', 149),
(49, 2, 'SALE', 123, 'DEBIT', 'NONE', 149),
(50, 2, 'SALE', 123, 'DEBIT', 'NONE', 148),
(51, 172, 'SALE', 124, 'DEBIT', 'NONE', 25),
(52, 164, 'SALE', 124, 'DEBIT', 'NONE', 23),
(53, 172, 'SALE', 125, 'DEBIT', 'NONE', 23),
(54, 164, 'SALE', 125, 'DEBIT', 'NONE', 22),
(55, 172, 'SALE', 126, 'DEBIT', 'NONE', 21),
(56, 164, 'SALE', 126, 'DEBIT', 'NONE', 21),
(57, 172, 'SALE', 127, 'DEBIT', 'NONE', 19),
(58, 164, 'SALE', 127, 'DEBIT', 'NONE', 20),
(59, 172, 'SALE', 128, 'DEBIT', 'NONE', 17),
(60, 164, 'SALE', 128, 'DEBIT', 'NONE', 19),
(61, 172, 'SALE', 129, 'DEBIT', 'NONE', 15),
(62, 164, 'SALE', 129, 'DEBIT', 'NONE', 18),
(63, 172, 'SALE', 7, 'DEBIT', 'NONE', 17),
(64, 164, 'SALE', 7, 'DEBIT', 'NONE', 19),
(65, 172, 'SALE', 8, 'DEBIT', 'NONE', 19),
(66, 164, 'SALE', 8, 'DEBIT', 'NONE', 20),
(67, 191, 'SALE', 9, 'DEBIT', 'NONE', 106),
(68, 196, 'SALE', 9, 'DEBIT', 'NONE', 109),
(69, 192, 'SALE', 9, 'DEBIT', 'NONE', 170),
(70, 193, 'SALE', 9, 'DEBIT', 'NONE', 170),
(71, 191, 'SALE', 10, 'DEBIT', 'NONE', 206),
(72, 196, 'SALE', 10, 'DEBIT', 'NONE', 209),
(73, 192, 'SALE', 10, 'DEBIT', 'NONE', 320),
(74, 193, 'SALE', 10, 'DEBIT', 'NONE', 320),
(75, 191, 'SALE', 11, 'DEBIT', 'NONE', 306),
(76, 196, 'SALE', 11, 'DEBIT', 'NONE', 309),
(77, 192, 'SALE', 11, 'DEBIT', 'NONE', 470),
(78, 193, 'SALE', 11, 'DEBIT', 'NONE', 470),
(79, 191, 'SALE', 12, 'DEBIT', 'NONE', 406),
(80, 196, 'SALE', 12, 'DEBIT', 'NONE', 409),
(81, 192, 'SALE', 12, 'DEBIT', 'NONE', 620),
(82, 193, 'SALE', 12, 'DEBIT', 'NONE', 620),
(83, 191, 'SALE', 13, 'DEBIT', 'NONE', 506),
(84, 196, 'SALE', 13, 'DEBIT', 'NONE', 509),
(85, 192, 'SALE', 13, 'DEBIT', 'NONE', 770),
(86, 193, 'SALE', 13, 'DEBIT', 'NONE', 770),
(87, 191, 'SALE', 14, 'DEBIT', 'NONE', 606),
(88, 196, 'SALE', 14, 'DEBIT', 'NONE', 609),
(89, 192, 'SALE', 14, 'DEBIT', 'NONE', 920),
(90, 193, 'SALE', 14, 'DEBIT', 'NONE', 920),
(91, 191, 'SALE', 15, 'DEBIT', 'NONE', 607),
(92, 193, 'SALE', 15, 'DEBIT', 'NONE', 921),
(93, 193, 'SALE', 15, 'DEBIT', 'NONE', 922),
(94, 191, 'DELIVERY', 16, 'NONE', 'CREDIT', 608),
(95, 193, 'DELIVERY', 16, 'NONE', 'CREDIT', 923),
(96, 193, 'DELIVERY', 16, 'NONE', 'CREDIT', 924),
(97, 194, 'DELIVERY', 17, 'NONE', 'CREDIT', 275),
(98, 193, 'DELIVERY', 17, 'NONE', 'CREDIT', 1024),
(99, 194, 'DELIVERY', 18, 'NONE', 'CREDIT', 475),
(100, 193, 'DELIVERY', 18, 'NONE', 'CREDIT', 1124),
(101, 195, 'DELIVERY', 19, 'NONE', 'CREDIT', 300),
(102, 193, 'DELIVERY', 19, 'NONE', 'CREDIT', 1274),
(103, 193, 'DELIVERY', 20, 'NONE', 'CREDIT', 1474),
(104, 193, 'DELIVERY', 21, 'NONE', 'CREDIT', 1674),
(105, 193, 'DELIVERY', 22, 'NONE', 'CREDIT', 1874),
(106, 59, 'DELIVERY', 23, 'NONE', 'CREDIT', 151),
(107, 60, 'DELIVERY', 23, 'NONE', 'CREDIT', 151),
(108, 3, 'DELIVERY', 24, 'NONE', 'CREDIT', 170),
(109, 52, 'DELIVERY', 24, 'NONE', 'CREDIT', 169),
(110, 2, 'DELIVERY', 25, 'NONE', 'CREDIT', 151),
(111, 4, 'DELIVERY', 25, 'NONE', 'CREDIT', 151),
(112, 54, 'DELIVERY', 26, 'NONE', 'CREDIT', 160),
(113, 57, 'DELIVERY', 26, 'NONE', 'CREDIT', 160),
(114, 4, 'DELIVERY', 27, 'NONE', 'CREDIT', 161),
(115, 3, 'DELIVERY', 27, 'NONE', 'CREDIT', 180),
(116, 58, 'DELIVERY', 28, 'NONE', 'CREDIT', 149),
(117, 54, 'SALE', 130, 'DEBIT', 'NONE', 148),
(118, 193, 'RETURN', 1, 'NONE', 'DEBIT', 1873),
(119, 193, 'RETURN', 2, 'NONE', 'DEBIT', 1872),
(120, 193, 'RETURN', 3, 'NONE', 'DEBIT', 1871),
(121, 193, 'RETURN', 4, 'NONE', 'DEBIT', 1870),
(122, 193, 'RETURN', 5, 'NONE', 'DEBIT', 1869),
(123, 193, 'RETURN', 6, 'NONE', 'DEBIT', 1868),
(124, 193, 'RETURN', 7, 'NONE', 'DEBIT', 1867),
(125, 4, 'RETURN', 8, 'NONE', 'DEBIT', 160),
(126, 2, 'RETURN', 8, 'NONE', 'DEBIT', 150),
(127, 193, 'RETURN', 9, 'NONE', 'DEBIT', 1847),
(128, 193, 'RETURN', 10, 'NONE', 'DEBIT', 1647);

-- --------------------------------------------------------

--
-- Table structure for table `product_ledger_details`
--

CREATE TABLE IF NOT EXISTS `product_ledger_details` (
  `ledger_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_logs`
--

CREATE TABLE IF NOT EXISTS `product_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_action` varchar(255) NOT NULL,
  `action_reason` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `product_logs`
--

INSERT INTO `product_logs` (`log_id`, `product_id`, `product_action`, `action_reason`, `date_added`) VALUES
(1, 185, 'Add Product', 'sample21sample21sample21sample21', '2002-06-12 17:34:37'),
(2, 187, 'ADD PRODUCT', 'sample25sample25sample25', '2002-06-12 17:36:21'),
(3, 188, 'ADD PRODUCT', 'sample27sample27sample27sample27sample27', '2002-06-12 17:36:45'),
(4, 189, 'ADD PRODUCT', 'BILAT!', '2002-06-12 17:56:18'),
(5, 190, 'ADD PRODUCT', 'Not available in database.', '2002-06-12 18:04:01'),
(6, 191, 'ADD PRODUCT', 'New product arrived.', '2005-06-12 07:55:39'),
(7, 192, 'ADD PRODUCT', 'Theres no mugg.', '2005-06-12 08:02:27'),
(8, 193, 'ADD PRODUCT', 'THIS SUCKS', '2006-06-12 18:47:28'),
(9, 194, 'ADD PRODUCT', 'Add', '2006-06-12 18:47:50'),
(10, 195, 'ADD PRODUCT', 'Add', '2006-06-12 18:48:24'),
(11, 196, 'ADD PRODUCT', 'ADD', '2006-06-12 18:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE IF NOT EXISTS `returns` (
  `returns_id` int(11) NOT NULL AUTO_INCREMENT,
  `returns_date` datetime NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`returns_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`returns_id`, `returns_date`, `emp_id`) VALUES
(1, '2012-06-16 00:00:00', 37),
(2, '2012-06-16 00:00:00', 37),
(3, '2012-06-16 00:00:00', 37),
(4, '2012-06-16 00:00:00', 37),
(5, '2012-06-16 00:00:00', 37),
(6, '2012-06-16 00:00:00', 37),
(7, '2012-06-16 00:00:00', 37),
(8, '2012-06-16 21:36:17', 37),
(9, '2012-06-17 07:02:47', 37),
(10, '2012-06-17 07:48:54', 37);

-- --------------------------------------------------------

--
-- Table structure for table `returns_details`
--

CREATE TABLE IF NOT EXISTS `returns_details` (
  `returns_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `returned_qty` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `total_reimburst` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns_details`
--

INSERT INTO `returns_details` (`returns_id`, `product_id`, `delivery_id`, `returned_qty`, `comments`, `total_reimburst`) VALUES
(7, 193, 22, 1, 'NO COMMENT', 50.00),
(8, 4, 25, 1, 'NO COMMENT', 13.98),
(8, 2, 25, 1, 'NO COMMENT', 13.98),
(9, 193, 22, 20, 'NO COMMENT', 1000.00),
(10, 193, 22, 200, 'NO COMMENT', 10000.00);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_date` datetime NOT NULL,
  `total_price` float NOT NULL,
  `emp_id` int(11) NOT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `sales_date`, `total_price`, `emp_id`) VALUES
(23, '2011-12-04 00:00:00', 696, 2),
(24, '2011-12-04 00:00:00', 118, 2),
(25, '2011-12-04 00:00:00', 707, 2),
(26, '2011-12-05 00:00:00', 64, 2),
(27, '2012-01-18 00:00:00', 100, 3),
(28, '2012-01-18 00:00:00', 30, 3),
(29, '2012-05-29 00:00:00', 0, 34),
(30, '2012-06-06 00:00:00', 0, 37),
(31, '2012-06-06 00:00:00', 0, 37),
(32, '2012-06-06 00:00:00', 0, 37),
(33, '0000-00-00 00:00:00', 1015, 0),
(34, '2012-06-09 07:14:53', 1015, 37),
(35, '2012-06-09 07:15:30', 1015, 37),
(36, '2012-06-09 07:17:29', 625, 37),
(37, '2012-06-09 07:18:52', 625, 37),
(38, '2012-06-09 07:21:24', 1015, 37),
(39, '2012-06-09 07:23:35', 100, 37),
(40, '2012-06-09 07:25:14', 50, 37),
(41, '2012-06-09 07:26:07', 50, 37),
(42, '2012-06-09 07:26:53', 25, 37),
(43, '2012-06-09 07:27:21', 25, 37),
(44, '2012-06-09 07:28:07', 25, 37),
(45, '2012-06-09 07:29:06', 25, 37),
(46, '2012-06-09 07:30:00', 25, 37),
(47, '2012-06-09 07:30:20', 25, 37),
(48, '2012-06-09 07:30:34', 25, 37),
(49, '2012-06-09 07:30:50', 25, 37),
(50, '2012-06-09 07:30:57', 25, 37),
(51, '2012-06-09 07:33:18', 25, 37),
(52, '2012-06-09 07:33:21', 25, 37),
(53, '2012-06-09 08:28:30', 1791, 37),
(54, '2012-06-09 09:24:23', 1841, 37),
(55, '2012-06-09 21:18:45', 1015, 37),
(56, '2012-06-09 21:26:54', 75, 37),
(57, '2012-06-09 21:27:40', 30, 37),
(58, '2012-06-09 21:29:12', 80, 37),
(59, '2012-06-09 21:32:42', 1030, 37),
(60, '2012-06-09 21:34:03', 2045, 37),
(61, '2012-06-09 21:34:20', 2045, 37),
(62, '2012-06-09 21:35:57', 2045, 37),
(63, '2012-06-09 21:37:25', 2045, 37),
(64, '2012-06-09 21:37:38', 1200, 37),
(65, '2012-06-09 21:38:18', 1200, 37),
(66, '2012-06-09 21:39:11', 1200, 37),
(67, '2012-06-09 21:39:27', 1200, 37),
(68, '2012-06-09 21:41:38', 1200, 37),
(69, '2012-06-09 21:42:42', 1200, 37),
(70, '2012-06-09 21:42:44', 1200, 37),
(71, '2012-06-09 21:42:46', 1200, 37),
(72, '2012-06-09 21:42:59', 1200, 37),
(73, '2012-06-09 21:43:01', 1200, 37),
(74, '2012-06-09 21:44:41', 1200, 37),
(75, '2012-06-09 21:44:42', 1200, 37),
(76, '2012-06-09 21:45:41', 1200, 37),
(77, '2012-06-09 21:47:13', 1199.75, 37),
(78, '2012-06-10 06:33:46', 1038.75, 37),
(79, '2012-06-10 07:17:23', 650, 37),
(80, '2012-06-10 07:18:30', 674, 37),
(81, '2012-06-10 07:19:07', 674, 37),
(82, '2012-06-10 07:20:02', 674, 37),
(83, '2012-06-10 07:21:31', 674, 37),
(84, '2012-06-10 07:21:48', 674, 37),
(85, '2012-06-10 07:22:16', 674, 37),
(86, '2012-06-10 07:22:26', 674, 37),
(87, '2012-06-10 07:22:31', 674, 37),
(88, '2012-06-10 07:23:15', 350.75, 37),
(89, '2012-06-10 07:23:31', 150.75, 37),
(90, '2012-06-10 07:23:33', 150.75, 37),
(91, '2012-06-10 07:26:27', 25, 37),
(92, '2012-06-10 07:26:29', 25, 37),
(93, '2012-06-10 07:28:23', 50, 37),
(94, '2012-06-10 07:30:22', 150, 37),
(95, '2012-06-10 07:32:56', 50, 37),
(96, '2012-06-10 07:32:57', 50, 37),
(97, '2012-06-10 07:32:59', 50, 37),
(98, '2012-06-10 07:33:01', 50, 37),
(99, '2012-06-10 07:34:12', 1400, 37),
(100, '2012-06-10 07:35:16', 1400, 37),
(101, '2012-06-10 07:35:17', 1400, 37),
(102, '2012-06-10 07:35:45', 1400, 37),
(103, '2012-06-10 07:35:46', 1400, 37),
(104, '2012-06-10 07:36:01', 1400, 37),
(105, '2012-06-10 07:36:10', 1400, 37),
(106, '2012-06-10 07:36:11', 1400, 37),
(107, '2012-06-10 07:36:16', 1400, 37),
(108, '2012-06-10 07:36:39', 1400, 37),
(109, '2012-06-10 07:37:01', 1400, 37),
(110, '2012-06-10 07:38:31', 200, 37),
(111, '2012-06-10 07:40:58', 100, 37),
(112, '2012-06-10 07:44:23', 200.75, 37),
(113, '2012-06-10 07:54:02', 1014.75, 37),
(114, '2012-06-10 08:10:08', 1014.75, 37),
(115, '2012-06-10 08:19:21', 39, 37),
(116, '2012-06-10 08:36:28', 664, 37),
(117, '2012-06-10 08:41:32', 3, 37),
(118, '2012-06-10 09:34:52', 5.25, 37),
(119, '2012-06-10 21:10:04', 431.47, 37),
(120, '2012-06-10 21:32:27', 1049.75, 37),
(121, '2012-06-11 07:06:46', 53.11, 37),
(122, '2012-06-11 21:38:44', 252.33, 37),
(123, '2012-06-11 21:39:05', 123.46, 37),
(124, '2012-06-11 22:22:19', 2034.75, 37),
(125, '2012-06-11 22:23:45', 2034.75, 37),
(126, '2012-06-11 22:25:41', 2034.75, 37),
(127, '2012-06-11 22:25:54', 2034.75, 37),
(128, '2012-06-11 22:25:58', 2034.75, 37),
(129, '2012-06-11 22:26:41', 2034.75, 37),
(130, '2012-06-16 21:12:03', 232.08, 37);

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE IF NOT EXISTS `sales_details` (
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sales_qty` int(11) NOT NULL,
  `unit_price` double(5,2) NOT NULL,
  `net_price` double(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sales_id`, `product_id`, `sales_qty`, `unit_price`, `net_price`) VALUES
(0, 192, 1, 5.00, 50.00),
(0, 195, 1, 2.00, 25.00),
(0, 195, 1, 2.00, 25.00),
(0, 195, 1, 2.00, 25.00),
(0, 195, 1, 2.00, 25.00),
(0, 195, 1, 2.00, 25.00),
(0, 195, 1, 2.00, 25.00),
(49, 195, 1, 2.00, 25.00),
(50, 195, 1, 2.00, 25.00),
(51, 195, 1, 2.00, 25.00),
(52, 195, 1, 2.00, 25.00),
(53, 191, 0, 0.00, 150.75),
(53, 190, 0, 5.00, 625.00),
(53, 172, 0, 9.00, 999.75),
(53, 171, 1, 1.00, 15.00),
(54, 192, 0, 0.00, 50.00),
(54, 191, 0, 0.00, 150.75),
(54, 190, 0, 5.00, 625.00),
(54, 172, 0, 9.00, 999.75),
(54, 171, 1, 1.00, 15.00),
(55, 171, 0, 5.00, 15.00),
(55, 172, 1, 9.00, 999.75),
(56, 193, 0, 50.00, 0.00),
(56, 194, 1, 25.00, 2.00),
(58, 171, 0, 15.00, 15.00),
(58, 194, 2, 25.00, 30.00),
(60, 171, 0, 5.00, 20.00),
(60, 172, 2, 9.00, 999.99),
(61, 171, 0, 5.00, 20.00),
(61, 172, 2, 9.00, 999.99),
(62, 171, 0, 5.00, 20.00),
(62, 172, 2, 9.00, 999.99),
(63, 171, 0, 5.00, 5.00),
(63, 172, 2, 9.00, 1.00),
(64, 172, 0, 9.00, 9.00),
(64, 193, 0, 0.00, 5.00),
(64, 194, 2, 2.00, 5.00),
(65, 172, 0, 9.00, 9.00),
(65, 193, 0, 0.00, 5.00),
(65, 194, 2, 2.00, 5.00),
(66, 172, 0, 9.00, 999.75),
(66, 193, 0, 5.00, 50.00),
(66, 194, 2, 5.00, 25.00),
(67, 172, 0, 9.00, 999.75),
(67, 193, 0, 5.00, 50.00),
(67, 194, 2, 5.00, 25.00),
(68, 172, 0, 9.00, 999.75),
(68, 193, 0, 5.00, 50.00),
(68, 194, 2, 5.00, 25.00),
(69, 172, 0, 9.00, 9.00),
(69, 193, 0, 5.00, 0.00),
(69, 194, 2, 5.00, 2.00),
(70, 172, 0, 9.00, 9.00),
(70, 193, 0, 5.00, 0.00),
(70, 194, 2, 5.00, 2.00),
(71, 172, 0, 9.00, 9.00),
(71, 193, 0, 5.00, 0.00),
(71, 194, 2, 5.00, 2.00),
(72, 172, 0, 9.00, 9.00),
(72, 193, 0, 5.00, 0.00),
(72, 194, 2, 5.00, 2.00),
(73, 172, 0, 9.00, 9.00),
(73, 193, 0, 5.00, 0.00),
(73, 194, 2, 5.00, 2.00),
(74, 172, 1, 999.75, 999.75),
(74, 193, 3, 150.00, 50.00),
(74, 194, 2, 50.00, 25.00),
(75, 172, 1, 999.75, 999.75),
(75, 193, 3, 150.00, 50.00),
(75, 194, 2, 50.00, 25.00),
(76, 172, 1, 999.75, 999.75),
(76, 193, 3, 50.00, 150.00),
(76, 194, 2, 25.00, 50.00),
(77, 172, 1, 999.75, 999.75),
(77, 193, 3, 50.00, 150.00),
(77, 194, 2, 25.00, 50.00),
(78, 171, 1, 15.00, 15.00),
(78, 189, 1, 24.00, 24.00),
(78, 172, 1, 999.75, 999.75),
(79, 190, 1, 625.00, 625.00),
(79, 194, 1, 25.00, 25.00),
(80, 194, 1, 25.00, 25.00),
(80, 189, 1, 24.00, 24.00),
(80, 190, 1, 625.00, 625.00),
(81, 194, 1, 25.00, 25.00),
(81, 189, 1, 24.00, 24.00),
(81, 190, 1, 625.00, 625.00),
(82, 194, 1, 25.00, 25.00),
(82, 189, 1, 24.00, 24.00),
(82, 190, 1, 625.00, 625.00),
(83, 194, 1, 25.00, 25.00),
(83, 189, 1, 24.00, 24.00),
(83, 190, 1, 625.00, 625.00),
(84, 194, 1, 25.00, 25.00),
(84, 189, 1, 24.00, 24.00),
(84, 190, 1, 625.00, 625.00),
(89, 191, 1, 150.75, 150.75),
(91, 194, 1, 25.00, 25.00),
(94, 194, 1, 25.00, 25.00),
(95, 194, 2, 25.00, 50.00),
(96, 194, 2, 25.00, 50.00),
(97, 194, 2, 25.00, 50.00),
(98, 194, 2, 25.00, 50.00),
(99, 196, 14, 100.00, 999.99),
(100, 196, 14, 100.00, 999.99),
(101, 196, 14, 100.00, 999.99),
(102, 196, 14, 100.00, 999.99),
(103, 196, 14, 100.00, 999.99),
(104, 196, 14, 100.00, 999.99),
(105, 196, 14, 100.00, 999.99),
(106, 196, 14, 100.00, 999.99),
(107, 196, 14, 100.00, 999.99),
(108, 196, 14, 100.00, 999.99),
(109, 196, 14, 100.00, 999.99),
(110, 196, 1, 100.00, 100.00),
(111, 192, 2, 50.00, 100.00),
(112, 191, 1, 150.75, 150.75),
(112, 192, 1, 50.00, 50.00),
(113, 171, 1, 15.00, 15.00),
(113, 172, 1, 999.75, 999.75),
(114, 171, 1, 15.00, 15.00),
(114, 172, 1, 999.75, 999.75),
(115, 171, 1, 15.00, 15.00),
(115, 189, 1, 24.00, 24.00),
(116, 171, 1, 15.00, 15.00),
(116, 189, 1, 24.00, 24.00),
(116, 190, 1, 625.00, 625.00),
(117, 1, 1, 3.00, 3.00),
(118, 102, 1, 5.25, 5.25),
(119, 63, 1, 431.47, 431.47),
(120, 194, 2, 25.00, 50.00),
(120, 172, 1, 999.75, 999.75),
(121, 73, 1, 50.25, 50.25),
(121, 68, 1, 2.86, 2.86),
(122, 56, 1, 216.55, 216.55),
(122, 58, 2, 17.89, 35.78),
(123, 53, 1, 20.00, 20.00),
(123, 53, 1, 20.00, 20.00),
(123, 52, 1, 60.00, 60.00),
(123, 2, 1, 11.73, 11.73),
(123, 2, 1, 11.73, 11.73),
(124, 172, 2, 999.75, 999.99),
(124, 164, 1, 35.25, 35.25),
(125, 172, 2, 999.75, 999.99),
(125, 164, 1, 35.25, 35.25),
(126, 172, 2, 999.75, 999.99),
(126, 164, 1, 35.25, 35.25),
(127, 172, 2, 999.75, 999.99),
(127, 164, 1, 35.25, 35.25),
(128, 172, 2, 999.75, 999.99),
(128, 164, 1, 35.25, 35.25),
(129, 172, 2, 999.75, 999.99),
(129, 164, 1, 35.25, 35.25),
(130, 54, 12, 19.34, 232.08);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  `telephone` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `date_added`, `telephone`, `location`) VALUES
(1, 'ABC CORPORATION', '2012-06-16 02:00:00', 9306309, 'CEBU'),
(2, 'Microsoft', '2012-06-16 02:00:00', 9306309, 'CEBU'),
(3, 'San Miguel Beer', '2012-06-16 00:00:00', 9306309, 'Cebu'),
(4, 'MLullier', '2012-06-16 00:00:00', 9306309, 'Cebu'),
(5, 'Ng Khai Inc.', '2012-06-16 00:00:00', 9306309, 'Cebu'),
(6, 'Kudo Support, Inc.', '2012-06-16 00:00:00', 9306309, 'MEPZ');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_ledger`
--
ALTER TABLE `product_ledger`
  ADD CONSTRAINT `product_ledger_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
