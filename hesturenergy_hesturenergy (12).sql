-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 19, 2024 at 06:25 PM
-- Server version: 5.7.44
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hesturenergy_hesturenergy`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `attendance_date` varchar(100) NOT NULL,
  `attendance_status` varchar(100) NOT NULL,
  `attendance_type` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `user_id`, `attendance_date`, `attendance_status`, `attendance_type`, `created_date`, `updated_date`) VALUES
(1, 1, '2024-03-29', 'Present', 'Daily', '0000-00-00', '2024-03-29 14:32:57'),
(2, 2, '2024-03-29', 'Present', 'Daily', '0000-00-00', '2024-03-29 14:32:57'),
(3, 1, '2024-03-01', 'Present', 'Daily', '0000-00-00', '2024-03-29 14:34:22'),
(4, 2, '2024-03-01', 'Present', 'Daily', '0000-00-00', '2024-03-29 14:34:22'),
(5, 2, '2024-03-02', 'Present', 'Daily', '0000-00-00', '2024-03-29 14:34:44'),
(6, 1, '2024-03-03', 'Paid Leave', 'Daily', '0000-00-00', '2024-03-29 14:35:02'),
(7, 2, '2024-03-03', 'Paid Leave', 'Daily', '0000-00-00', '2024-03-29 14:35:02'),
(8, 1, '2024-03-02', 'Absent', 'Daily', '0000-00-00', '2024-03-29 14:35:43'),
(11, 3, '2024-04-02', 'Present', 'Daily', '0000-00-00', '2024-04-01 18:57:10'),
(12, 4, '2024-04-11', 'Present', 'Daily', '0000-00-00', '2024-04-11 08:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_backup`
--

CREATE TABLE `attendance_backup` (
  `id` int(11) NOT NULL,
  `employees` varchar(200) NOT NULL,
  `attendance_type` varchar(200) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` varchar(150) NOT NULL,
  `created_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_backup`
--

INSERT INTO `attendance_backup` (`id`, `employees`, `attendance_type`, `attendance_date`, `attendance_status`, `created_date`) VALUES
(1, 'prasanna', 'Daily', '2024-03-25', 'Present', '2024-03-25'),
(2, 'pavithra', 'Daily', '2024-03-25', 'Present', '2024-03-25'),
(3, 'prasanna', 'Daily', '2024-03-24', 'Abesnt', '2024-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `gst` varchar(200) NOT NULL,
  `po_code` varchar(200) NOT NULL,
  `created_date` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `city`, `state`, `zip`, `phone`, `email`, `company_name`, `gst`, `po_code`, `created_date`, `created_by`) VALUES
(1, 'Rajesh', 'kjjkj', 'Hyderabad', 'Telangana', '5000072', '8143011112', 'info@royalinfosys.com', 'Royal IT', '0', 'Raj1580', '2024-04-11', 8),
(2, 'rao', 'Xasd', 'hyderabad', 'Telangana', '5000072', '8143011112', 'accounts@royalitpark.com', 'royalitpark', '5', 'rao1690', '2024-04-11', 8);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `first_name` varchar(128) DEFAULT NULL,
  `last_name` varchar(128) DEFAULT NULL,
  `em_email` varchar(64) DEFAULT NULL,
  `em_password` varchar(512) NOT NULL,
  `em_role` enum('ADMIN','DEALER') NOT NULL DEFAULT 'DEALER',
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `em_gender` enum('Male','Female') NOT NULL DEFAULT 'Male',
  `em_phone` varchar(64) DEFAULT NULL,
  `address` text NOT NULL,
  `em_birthday` varchar(128) DEFAULT NULL,
  `em_gst` varchar(128) DEFAULT NULL,
  `em_image` varchar(128) DEFAULT NULL,
  `doc_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `em_id`, `first_name`, `last_name`, `em_email`, `em_password`, `em_role`, `status`, `em_gender`, `em_phone`, `address`, `em_birthday`, `em_gst`, `em_image`, `doc_status`) VALUES
(1, 'Soy1332', 'Admin', ' G', 'admin@gmail.com', '23d42f5f3f66498b2c8ff4c20b8c5ac826e47146', 'ADMIN', 'ACTIVE', 'Male', NULL, '', NULL, NULL, 'userav-min.png', 0),
(7, 'Gan1748', 'Pavithra', 'Gannina', 'prasanna@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'DEALER', 'INACTIVE', 'Female', '1234567898', '', NULL, '', NULL, 2),
(8, 'sne1019', 'Sneha', 'sneha123', 'sneha@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'DEALER', 'ACTIVE', 'Female', '1234567898', ' Hyderabad', NULL, '10', NULL, 1),
(15, 'Gan1708', 'ramya', 'Gannina', 'ramya@gmail.com', '7bf5e6b465d3157ea72a1225a58d60ba565792e7', 'DEALER', 'ACTIVE', 'Female', '1478523695', '', NULL, '10', NULL, 2),
(16, 'G1602', 'Rajesh', 'G', 'rajesh@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'DEALER', 'INACTIVE', 'Female', '1478523695', ' hyd ', NULL, '10', NULL, 0),
(17, 'rao1634', 'rao', 'rao', 'accounts@royalitpark.com', '92d580fbb9de97f9dde6645fc5b4f6ddc7265345', 'DEALER', 'ACTIVE', 'Male', '8143011112', 'royal@123', NULL, '36458349', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `employee_file`
--

CREATE TABLE `employee_file` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `file_title` varchar(512) DEFAULT NULL,
  `file_url` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee_file`
--

INSERT INTO `employee_file` (`id`, `em_id`, `file_title`, `file_url`) VALUES
(1, 'Gan1748', 'test document', 'TM11.png'),
(2, 'Gan1748', 'test doc 2', 'TM.png'),
(3, 'sne1019', 'test document 1', 'carousel-2.jpg'),
(5, 'Gan1708', 'new document 2', 'bg_header.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `holiday_name` varchar(256) DEFAULT NULL,
  `from_date` varchar(64) DEFAULT NULL,
  `to_date` varchar(64) DEFAULT NULL,
  `number_of_days` varchar(64) DEFAULT NULL,
  `year` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holiday`
--

INSERT INTO `holiday` (`id`, `holiday_name`, `from_date`, `to_date`, `number_of_days`, `year`) VALUES
(3, 'New Year\'s Day', '2024-01-01', '2024-01-02', '1', '01-2024'),
(5, 'Christmas', '2024-12-24', '2024-12-24', '0', '12-2024'),
(6, 'ramjan', '2024-04-11', '2024-04-11', '0', '04-2024');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `inov_num` varchar(200) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `model` varchar(150) NOT NULL,
  `number_plate` varchar(150) NOT NULL,
  `amount` varchar(150) NOT NULL,
  `service_type` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `cid`, `inov_num`, `vehicle_id`, `model`, `number_plate`, `amount`, `service_type`, `created_date`, `created_by`) VALUES
(1, 1, '1087', 1, 'Model-1', '1001', '250', 'Paid', '2024-04-08 14:26:50', 8),
(2, 1, '1568', 1, 'Model-1', '1001', '1000', 'Un-Paid', '2024-04-11 03:36:25', 8),
(3, 2, '1159', 3, '', '', '1000', 'Un-Paid', '2024-04-11 09:48:07', 8);

-- --------------------------------------------------------

--
-- Table structure for table `jobcode`
--

CREATE TABLE `jobcode` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `job_code` varchar(150) NOT NULL,
  `vehicle` varchar(100) NOT NULL,
  `number_plate` varchar(100) NOT NULL,
  `indate` varchar(150) NOT NULL,
  `outdate` varchar(150) NOT NULL,
  `kmsrun` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `chasis` varchar(200) NOT NULL,
  `enginno` varchar(200) NOT NULL,
  `service_type` varchar(150) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobcode`
--

INSERT INTO `jobcode` (`id`, `cid`, `job_code`, `vehicle`, `number_plate`, `indate`, `outdate`, `kmsrun`, `model`, `chasis`, `enginno`, `service_type`, `status`, `created_date`, `created_by`) VALUES
(1, 1, '1575', '1', '1001', '2024-04-07T20:06', '2024-04-08T20:06', '15', 'Model-1', '120', '123', 'Paid', 'Completed', '2024-04-08 14:37:47', 8),
(2, 2, '1623', '3', 'tr01222', '2024-04-11T15:19', '2024-04-12T15:19', '2000', '444', '4546657', 'r676575', 'Free', 'Completed', '2024-04-11 09:50:48', 8);

-- --------------------------------------------------------

--
-- Table structure for table `jobcode_item`
--

CREATE TABLE `jobcode_item` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `job_code` varchar(200) NOT NULL,
  `pitem` varchar(150) NOT NULL,
  `pprice` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobcode_item`
--

INSERT INTO `jobcode_item` (`id`, `cid`, `job_code`, `pitem`, `pprice`, `created_date`) VALUES
(1, 1, '1575', 'item1', '5', '2024-04-08 14:37:47'),
(2, 2, '1623', 'labour charge', '2500', '2024-04-11 09:50:48'),
(3, 2, '1623', 'seat', '110', '2024-04-11 09:50:48');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `lead_from` varchar(500) NOT NULL,
  `follow_up_date` date NOT NULL,
  `address` text NOT NULL,
  `created_date` varchar(200) NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT '0' COMMENT '0 : not deleted | 1 : deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `fname`, `mobile`, `email`, `lead_from`, `follow_up_date`, `address`, `created_date`, `updated_at`, `status_id`, `is_deleted`) VALUES
(1, 'Pavithra', '1478523695', 'pavithra@gmail.com', 'Google', '2024-03-20', 'Hyderabad', '2024-03-20', '0000-00-00 00:00:00', 1, 0),
(3, 'Sneha', '1478523695', 'sneha@gmail.com', 'Google', '2024-03-24', 'Hyd', '2024-03-20', '0000-00-00 00:00:00', 2, 0),
(4, 'prasanna', '1478523655', 'prasanna@gmail.com', 'Google', '2024-03-24', 'Hyderabad', '2024-03-24', '0000-00-00 00:00:00', 2, 0),
(5, 'rao', '8143011112', 'accounts@royalitpark.com', 'Google', '2024-04-11', 'hi', '2024-04-11', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `leave_type`
--

CREATE TABLE `leave_type` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_type`
--

INSERT INTO `leave_type` (`id`, `title`) VALUES
(1, 'Absent'),
(2, 'Present'),
(3, 'Half day'),
(4, 'Paid Leave'),
(5, 'UnPaid Leave'),
(6, 'Holiday'),
(7, 'Sunday');

-- --------------------------------------------------------

--
-- Table structure for table `led_timeline`
--

CREATE TABLE `led_timeline` (
  `id` int(14) NOT NULL,
  `emp_id` varchar(256) DEFAULT NULL,
  `notes` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `led_timeline`
--

INSERT INTO `led_timeline` (`id`, `emp_id`, `notes`, `created_date`) VALUES
(1, '5', 'Hi admin', '2024-03-20 14:44:08'),
(2, '1', 'Hello admin.', '2024-03-20 15:55:26'),
(3, '1', 'Testing Time Line', '2024-03-21 06:51:55'),
(5, '1', 'hi', '2024-03-23 05:58:49'),
(6, '4', 'hai', '2024-04-01 18:54:56'),
(7, '5', 'ghgoihvoivoyvo', '2024-04-11 08:34:41'),
(8, '5', 'follow up april 20th', '2024-04-11 08:35:07');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `cid` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `description`, `cid`, `created_date`, `created_by`) VALUES
(1, 'payment pending', 'next time free service ew', 2, '2024-04-11 09:55:01', 0);

-- --------------------------------------------------------

--
-- Table structure for table `office_shift`
--

CREATE TABLE `office_shift` (
  `id` int(11) NOT NULL,
  `shift_name` varchar(200) NOT NULL,
  `shift_from` varchar(200) NOT NULL,
  `shift_to` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office_shift`
--

INSERT INTO `office_shift` (`id`, `shift_name`, `shift_from`, `shift_to`, `created_date`) VALUES
(2, 'Shift -1', '9AM', '5PM', '2024-03-21 15:18:33'),
(3, 'Shift -2 ', '10AM', '7PM', '2024-03-21 15:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `pos_item`
--

CREATE TABLE `pos_item` (
  `id` int(11) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `pos_code` varchar(50) NOT NULL,
  `vitem` varchar(200) NOT NULL,
  `vqty` varchar(150) NOT NULL,
  `vprice` varchar(150) NOT NULL,
  `vtotal` varchar(150) NOT NULL,
  `vtax` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pos_item`
--

INSERT INTO `pos_item` (`id`, `pos_id`, `pos_code`, `vitem`, `vqty`, `vprice`, `vtotal`, `vtax`, `created_date`) VALUES
(1, 1, '11065', 'item1', '1', '1', '1', '1', '2024-04-08 14:16:54'),
(2, 1, '21726', '', '', '', '', '', '2024-04-10 13:04:29'),
(3, 1, '21182', '', '', '', '', '', '2024-04-10 13:05:42'),
(4, 1, '11176', '', '', '', '', '', '2024-04-10 13:08:01'),
(5, 2, '31429', 'seat', '1', '1', '1', '12', '2024-04-11 09:45:39'),
(6, 2, '31429', 'stand', '1', '1', '1', '5', '2024-04-11 09:45:39');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `pos_code` varchar(150) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date` varchar(150) NOT NULL,
  `vehicle_name` varchar(150) NOT NULL,
  `model` varchar(100) NOT NULL,
  `vehicle_price` varchar(150) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `total` varchar(150) NOT NULL,
  `tax` varchar(100) NOT NULL,
  `number_plate` varchar(150) NOT NULL,
  `need_item` varchar(50) NOT NULL,
  `service_type` varchar(150) NOT NULL,
  `fixed_service_charge` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `pos_code`, `customer_id`, `date`, `vehicle_name`, `model`, `vehicle_price`, `qty`, `total`, `tax`, `number_plate`, `need_item`, `service_type`, `fixed_service_charge`, `created_date`, `created_by`) VALUES
(1, '11065', 1, '', '1', 'Model-1', '1001', '2', '30000', '1', '1001', 'Yes', '', '', '2024-04-08 14:16:54', 8),
(5, '31429', 2, '', '3', 'Model-3', '11222', '1', '11222', '5', 'trii', 'Yes', '', '', '2024-04-11 09:45:39', 8);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `sitelogo` varchar(128) DEFAULT NULL,
  `sitetitle` varchar(256) DEFAULT NULL,
  `description` varchar(512) DEFAULT NULL,
  `copyright` varchar(128) DEFAULT NULL,
  `contact` varchar(128) DEFAULT NULL,
  `currency` varchar(128) DEFAULT NULL,
  `symbol` varchar(64) DEFAULT NULL,
  `system_email` varchar(128) DEFAULT NULL,
  `address` varchar(256) DEFAULT NULL,
  `address2` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `sitelogo`, `sitetitle`, `description`, `copyright`, `contact`, `currency`, `symbol`, `system_email`, `address`, `address2`) VALUES
(1, 'hestur-1-svg.png', 'Hesturenergy', 'Just a demo description and nothing else!', 'Hesturenergy', '0001110000', 'USD', '$', 'contact@gmail.com', 'Hesturenergy', 'Hesturenergy');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(150) NOT NULL,
  `location` varchar(150) NOT NULL,
  `shift_name` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL DEFAULT 'ACTIVE',
  `created_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fullname`, `email`, `phone`, `location`, `shift_name`, `address`, `username`, `password`, `status`, `created_date`) VALUES
(1, 'prasanna', 'prasanna@gmail.com', '0478523695', 'Hyderabad', 'Shift -2 ', 'Hyd', '', '', 'ACTIVE', '2024-03-24'),
(2, 'pavithra', 'pavithra@gmail.com', '1478523695', 'hyderabad', 'Shift -1', 'hyd', '', '', 'ACTIVE', '2024-03-25'),
(3, 'Rahul', 'vallajirahul12@gmail.com', '6303096348', 'Hyderabad', 'Shift -1', 'testing', '', '', 'ACTIVE', '2024-04-02'),
(4, 'rao', 'accounts@royalitpark.com', '8143011112', 'hyderabad', 'Shift -1', 'fghf', '', '', 'ACTIVE', '2024-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `staff_file`
--

CREATE TABLE `staff_file` (
  `id` int(14) NOT NULL,
  `em_id` varchar(64) DEFAULT NULL,
  `file_title` varchar(512) DEFAULT NULL,
  `file_url` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff_file`
--

INSERT INTO `staff_file` (`id`, `em_id`, `file_title`, `file_url`) VALUES
(2, '4', 'Document one', 'bg_header1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle`
--

CREATE TABLE `tbl_vehicle` (
  `id` int(11) NOT NULL,
  `vehicle_name` varchar(200) NOT NULL,
  `vehicle_price` varchar(200) NOT NULL,
  `gst` varchar(50) NOT NULL,
  `model` varchar(150) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_vehicle`
--

INSERT INTO `tbl_vehicle` (`id`, `vehicle_name`, `vehicle_price`, `gst`, `model`, `created_date`) VALUES
(1, 'Test vehicle', '15000', '0', 'Model-1', '2024-04-01 11:00:24'),
(2, 'New one', '1200', '1', 'Model-2', '2024-04-01 11:32:47'),
(3, 'Bajaj Platina', '15000', '0', 'Model-3', '2024-04-06 05:59:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_backup`
--
ALTER TABLE `attendance_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_file`
--
ALTER TABLE `employee_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobcode`
--
ALTER TABLE `jobcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobcode_item`
--
ALTER TABLE `jobcode_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_type`
--
ALTER TABLE `leave_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `led_timeline`
--
ALTER TABLE `led_timeline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `office_shift`
--
ALTER TABLE `office_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos_item`
--
ALTER TABLE `pos_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_file`
--
ALTER TABLE `staff_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attendance_backup`
--
ALTER TABLE `attendance_backup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `employee_file`
--
ALTER TABLE `employee_file`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobcode`
--
ALTER TABLE `jobcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobcode_item`
--
ALTER TABLE `jobcode_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_type`
--
ALTER TABLE `leave_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `led_timeline`
--
ALTER TABLE `led_timeline`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `office_shift`
--
ALTER TABLE `office_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pos_item`
--
ALTER TABLE `pos_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff_file`
--
ALTER TABLE `staff_file`
  MODIFY `id` int(14) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_vehicle`
--
ALTER TABLE `tbl_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
