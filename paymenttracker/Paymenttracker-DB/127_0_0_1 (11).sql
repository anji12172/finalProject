-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2015 at 02:14 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `classinvoicer`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_clients`
--

CREATE TABLE IF NOT EXISTS `ci_clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) NOT NULL,
  `client_address` varchar(100) NOT NULL,
  `postal_code` varchar(100) NOT NULL,
  `client_city` varchar(100) NOT NULL,
  `client_country` varchar(20) NOT NULL,
  `client_phone` varchar(100) NOT NULL,
  `client_fax` varchar(20) NOT NULL,
  `client_email` varchar(100) NOT NULL,
  `client_date_created` datetime NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `ci_clients`
--

TRUNCATE TABLE `ci_clients`;
--
-- Dumping data for table `ci_clients`
--

INSERT INTO `ci_clients` (`client_id`, `client_name`, `client_address`, `postal_code`, `client_city`, `client_country`, `client_phone`, `client_fax`, `client_email`, `client_date_created`) VALUES
(1, 'CP', 'Hyderabad', '123423', 'Hyderabad', 'IN', '123456789', '123456789', 'ccp@cp.com', '2015-02-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_config`
--

CREATE TABLE IF NOT EXISTS `ci_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `date_format` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `ci_config`
--

TRUNCATE TABLE `ci_config`;
--
-- Dumping data for table `ci_config`
--

INSERT INTO `ci_config` (`id`, `name`, `email`, `address`, `postal_code`, `fax`, `phone`, `website`, `currency`, `logo`, `date_format`) VALUES
(1, 'xyz', 'xyz@xyz.com', '', '', '', '', '', '$', '', ''),
(2, 'xyz', 'xyz@xyz.com', '', '', '', '', '', '$', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_consultants`
--

CREATE TABLE IF NOT EXISTS `ci_consultants` (
  `conslt_id` int(11) NOT NULL AUTO_INCREMENT,
  `conslt_name` varchar(255) NOT NULL,
  `conslt_skill` varchar(255) NOT NULL,
  `conslt_buy_price` double NOT NULL,
  `conslt_sell_price` double NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`conslt_id`),
  KEY `FK_ci_consultant_1` (`client_id`),
  KEY `FK_ci_consultant_2` (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `ci_consultants`
--

TRUNCATE TABLE `ci_consultants`;
--
-- Dumping data for table `ci_consultants`
--

INSERT INTO `ci_consultants` (`conslt_id`, `conslt_name`, `conslt_skill`, `conslt_buy_price`, `conslt_sell_price`, `client_id`, `emp_id`) VALUES
(1, 'NONE', 'NULL', 0, 0, NULL, NULL),
(2, 'Bell India', 'bell', 150060, 2500060, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ci_email_templates`
--

CREATE TABLE IF NOT EXISTS `ci_email_templates` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `template_title` varchar(200) NOT NULL,
  `email_body` text NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `ci_email_templates`
--

TRUNCATE TABLE `ci_email_templates`;
-- --------------------------------------------------------

--
-- Table structure for table `ci_employer`
--

CREATE TABLE IF NOT EXISTS `ci_employer` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `emp_cmpname` varchar(255) NOT NULL,
  `emp_cpname` varchar(255) NOT NULL,
  `emp_email` varchar(255) NOT NULL,
  `emp_phoneno` varchar(255) NOT NULL,
  `emp_city` varchar(255) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `conslt_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Truncate table before insert `ci_employer`
--

TRUNCATE TABLE `ci_employer`;
--
-- Dumping data for table `ci_employer`
--

INSERT INTO `ci_employer` (`emp_id`, `emp_cmpname`, `emp_cpname`, `emp_email`, `emp_phoneno`, `emp_city`, `emp_address`, `conslt_id`) VALUES
(3, 'Microsoft', 'Nandella', 'abc@abc.com', '+914561237891', 'bad', 'hyder\r\nbad', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ci_invoice_items`
--

CREATE TABLE IF NOT EXISTS `ci_invoice_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `item_quantity` decimal(10,2) NOT NULL,
  `item_description` longtext NOT NULL,
  `item_taxrate_id` int(11) NOT NULL,
  `item_order` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_price` decimal(10,2) NOT NULL,
  `item_discount` double NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `ci_invoice_items`
--

TRUNCATE TABLE `ci_invoice_items`;
--
-- Dumping data for table `ci_invoice_items`
--

INSERT INTO `ci_invoice_items` (`item_id`, `invoice_id`, `item_quantity`, `item_description`, `item_taxrate_id`, `item_order`, `item_name`, `item_price`, `item_discount`) VALUES
(1, 1, '4.00', 'ty', 0, 1, 'dd', '76876.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_invoices`
--

CREATE TABLE IF NOT EXISTS `ci_invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `invoice_status` enum('PAID','UNPAID','CANCELLED') NOT NULL DEFAULT 'UNPAID',
  `invoice_number` varchar(50) NOT NULL,
  `invoice_discount` double NOT NULL,
  `invoice_terms` longtext NOT NULL,
  `invoice_due_date` datetime NOT NULL,
  `invoice_date_created` date NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Truncate table before insert `ci_invoices`
--

TRUNCATE TABLE `ci_invoices`;
--
-- Dumping data for table `ci_invoices`
--

INSERT INTO `ci_invoices` (`invoice_id`, `user_id`, `client_id`, `invoice_status`, `invoice_number`, `invoice_discount`, `invoice_terms`, `invoice_due_date`, `invoice_date_created`) VALUES
(1, 1, 1, 'UNPAID', '1', 0, '', '2015-10-03 00:00:00', '2015-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `ci_payment_methods`
--

CREATE TABLE IF NOT EXISTS `ci_payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method_name` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `ci_payment_methods`
--

TRUNCATE TABLE `ci_payment_methods`;
-- --------------------------------------------------------

--
-- Table structure for table `ci_payments`
--

CREATE TABLE IF NOT EXISTS `ci_payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `payment_amount` decimal(10,2) NOT NULL,
  `payment_note` longtext NOT NULL,
  `payment_date` date NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `ci_payments`
--

TRUNCATE TABLE `ci_payments`;
-- --------------------------------------------------------

--
-- Table structure for table `ci_products`
--

CREATE TABLE IF NOT EXISTS `ci_products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_description` longtext NOT NULL,
  `product_unitprice` decimal(10,2) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `ci_products`
--

TRUNCATE TABLE `ci_products`;
--
-- Dumping data for table `ci_products`
--

INSERT INTO `ci_products` (`product_id`, `product_name`, `product_description`, `product_unitprice`) VALUES
(1, 'None', 'none', '0.00'),
(2, 'Software', 'this is used to help people', '1234.00');

-- --------------------------------------------------------

--
-- Table structure for table `ci_quotes`
--

CREATE TABLE IF NOT EXISTS `ci_quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `quote_subject` varchar(300) NOT NULL,
  `date_created` date NOT NULL,
  `valid_until` date NOT NULL,
  `quote_discount` double NOT NULL,
  `customer_notes` text NOT NULL,
  `quote_status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `ci_quotes`
--

TRUNCATE TABLE `ci_quotes`;
-- --------------------------------------------------------

--
-- Table structure for table `ci_quotes_items`
--

CREATE TABLE IF NOT EXISTS `ci_quotes_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `item_name` varchar(300) NOT NULL,
  `item_description` text NOT NULL,
  `item_price` double NOT NULL,
  `item_quantity` double NOT NULL,
  `Item_tax_rate_id` int(11) NOT NULL,
  `item_discount` double NOT NULL,
  `item_order` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `ci_quotes_items`
--

TRUNCATE TABLE `ci_quotes_items`;
-- --------------------------------------------------------

--
-- Table structure for table `ci_tax_rates`
--

CREATE TABLE IF NOT EXISTS `ci_tax_rates` (
  `tax_rate_id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_rate_name` varchar(100) NOT NULL,
  `tax_rate_percent` decimal(5,2) NOT NULL,
  PRIMARY KEY (`tax_rate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Truncate table before insert `ci_tax_rates`
--

TRUNCATE TABLE `ci_tax_rates`;
-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE IF NOT EXISTS `ci_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_phone` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_date_created` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Truncate table before insert `ci_users`
--

TRUNCATE TABLE `ci_users`;
--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`user_id`, `first_name`, `last_name`, `user_email`, `user_phone`, `username`, `password`, `user_date_created`) VALUES
(1, 'admin', 'admin', 'mknizam16@yahoo.com', '', 'nizam', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2015-02-14'),
(2, 'admin', 'admin', 'mknizam16@yahoo.com', '', 'nizam', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2015-02-14');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ci_consultants`
--
ALTER TABLE `ci_consultants`
  ADD CONSTRAINT `FK_ci_consultant_1` FOREIGN KEY (`client_id`) REFERENCES `ci_clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ci_consultant_2` FOREIGN KEY (`emp_id`) REFERENCES `ci_employer` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
