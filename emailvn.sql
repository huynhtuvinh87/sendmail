-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2017 at 08:46 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emailvn`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(11) UNSIGNED NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `app_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_fee` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_per_recipient` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_ssl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bounce_setup` int(11) DEFAULT '0',
  `complaint_setup` int(11) DEFAULT '0',
  `app_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allocated_quota` int(11) DEFAULT '-1',
  `current_quota` int(11) DEFAULT '0',
  `day_of_reset` int(11) DEFAULT '1',
  `month_of_next_reset` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_next_reset` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_logo_filename` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed_attachments` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'jpeg,jpg,gif,png,pdf,zip',
  `reports_only` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `userID`, `app_name`, `from_name`, `from_email`, `reply_to`, `currency`, `delivery_fee`, `cost_per_recipient`, `smtp_host`, `smtp_port`, `smtp_ssl`, `smtp_username`, `smtp_password`, `bounce_setup`, `complaint_setup`, `app_key`, `allocated_quota`, `current_quota`, `day_of_reset`, `month_of_next_reset`, `year_of_next_reset`, `test_email`, `brand_logo_filename`, `allowed_attachments`, `reports_only`) VALUES
(1, 1, 'Đay là demo', 'Nguyễn Hiến', 'demo@emailmaket.net', 'demo@emailmaket.net', 'USD', '', '', 'smtp.sparkpostmail.com', '587', 'tls', 'SMTP_Injection', '48909cdfd1a0795e872ab88e12c49ba7b92b4e98', 0, 0, 'Bomkhy2lIBHojztYR9qLKZJ0Sr3jDs', -1, 0, 1, '', NULL, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0),
(2, 1, 'Test', 'Vinh Huynh', 'minaworksvn@gmail.com', 'minaworksvn@gmail.com', 'USD', '', '', 'smtp.gmail.com', '587', 'tls', 'minaworksvn@gmail.com', 'minaworksvn17', 0, 0, 'Fl1PFsx4e4vQoduCjHnmiZ1171qJWj', -1, 0, 1, '', NULL, 'giicmsvn@gmail.com', NULL, 'jpeg,jpg,gif,png,pdf,zip', 0),
(3, 1, 'Vinh Huyngh', 'Vinh', 'huynhtuvinh87@gmail.com', 'huynhtuvinh87@gmail.com', 'USD', NULL, NULL, 'smtp.gmail.com', '587', 'TLS', 'huynhtuvinh87@gmail.com', 'SADDDDSGFASAASF', 0, 0, 'w6RrctFo06e1wJSOSyrICihdTafhfU', 20000, 0, 7, NULL, NULL, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0),
(4, 1, 'Vinh', 'Vinh Huynh', 'huynhtuvinh87@gmail.com', 'huynhtuvinh87@gmail.com', 'USD', NULL, NULL, 'smtp.gmail.com', '587', 'TLS', 'huynhtuvinh87@gmail.com', 'EDGVSDF343RT5', 0, 0, 'EnOIns9kK1nXB04jhUkBEGLA2Mrsid', 20000, 0, 7, NULL, NULL, NULL, NULL, 'jpeg,jpg,gif,png,pdf,zip', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ares`
--

CREATE TABLE `ares` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `list` int(11) DEFAULT NULL,
  `custom_field` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ares_emails`
--

CREATE TABLE `ares_emails` (
  `id` int(11) UNSIGNED NOT NULL,
  `ares_id` int(11) DEFAULT NULL,
  `from_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plain_text` longtext COLLATE utf8mb4_unicode_ci,
  `html_text` longtext COLLATE utf8mb4_unicode_ci,
  `query_string` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_condition` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` int(11) DEFAULT NULL,
  `recipients` int(100) DEFAULT '0',
  `opens` longtext COLLATE utf8mb4_unicode_ci,
  `wysiwyg` int(11) DEFAULT '0',
  `opens_tracking` int(1) DEFAULT '1',
  `links_tracking` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` int(11) UNSIGNED NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `from_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plain_text` longtext COLLATE utf8mb4_unicode_ci,
  `html_text` longtext COLLATE utf8mb4_unicode_ci,
  `query_string` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `to_send` int(100) DEFAULT NULL,
  `to_send_lists` mediumtext COLLATE utf8mb4_unicode_ci,
  `recipients` int(100) DEFAULT '0',
  `timeout_check` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opens` longtext COLLATE utf8mb4_unicode_ci,
  `wysiwyg` int(11) DEFAULT '0',
  `quota_deducted` int(11) DEFAULT NULL,
  `send_date` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lists` mediumtext COLLATE utf8mb4_unicode_ci,
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `errors` longtext COLLATE utf8mb4_unicode_ci,
  `bounce_setup` int(11) DEFAULT '0',
  `complaint_setup` int(11) DEFAULT '0',
  `opens_tracking` int(1) DEFAULT '1',
  `links_tracking` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `userID`, `app`, `from_name`, `from_email`, `reply_to`, `title`, `label`, `plain_text`, `html_text`, `query_string`, `sent`, `to_send`, `to_send_lists`, `recipients`, `timeout_check`, `opens`, `wysiwyg`, `quota_deducted`, `send_date`, `lists`, `timezone`, `errors`, `bounce_setup`, `complaint_setup`, `opens_tracking`, `links_tracking`) VALUES
(1, 1, 2, 'Vinh Huynh', 'minaworksvn@gmail.com', 'minaworksvn@gmail.com', 'Test thử', '', '', '<html>\r\n<head>\r\n	<title></title>\r\n</head>\r\n<body>\r\n<p>Use the following tags in your subject, plain text or HTML code and they&#39;ll automatically be formatted when your campaign is sent. For web version and unsubscribe tags, you can style them with inline CSS.</p>\r\n</body>\r\n</html>\r\n', '', '1499309101', 1, '1', 1, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` int(11) UNSIGNED NOT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  `ares_emails_id` int(11) DEFAULT NULL,
  `link` varchar(1500) DEFAULT NULL,
  `clicks` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) UNSIGNED NOT NULL,
  `app` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opt_in` int(11) DEFAULT '0',
  `confirm_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribed_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribed_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thankyou` int(11) DEFAULT '0',
  `thankyou_subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thankyou_message` longtext COLLATE utf8mb4_unicode_ci,
  `goodbye` int(11) DEFAULT '0',
  `goodbye_subject` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goodbye_message` longtext COLLATE utf8mb4_unicode_ci,
  `confirmation_subject` longtext COLLATE utf8mb4_unicode_ci,
  `confirmation_email` longtext COLLATE utf8mb4_unicode_ci,
  `unsubscribe_all_list` int(11) DEFAULT '1',
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci,
  `prev_count` int(100) DEFAULT '0',
  `currently_processing` int(100) DEFAULT '0',
  `total_records` int(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `app`, `userID`, `name`, `opt_in`, `confirm_url`, `subscribed_url`, `unsubscribed_url`, `thankyou`, `thankyou_subject`, `thankyou_message`, `goodbye`, `goodbye_subject`, `goodbye_message`, `confirmation_subject`, `confirmation_email`, `unsubscribe_all_list`, `custom_fields`, `prev_count`, `currently_processing`, `total_records`) VALUES
(1, 2, 1, 'huynhtuvinh87@gmail.com', 0, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, 1, NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s3_key` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s3_secret` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_key` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `license` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `timezone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tied_to` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `paypal` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cron` int(11) DEFAULT '0',
  `cron_ares` int(11) DEFAULT '0',
  `send_rate` int(100) DEFAULT '0',
  `language` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'en_US',
  `cron_csv` int(11) DEFAULT '0',
  `ses_endpoint` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auth_enabled` int(11) DEFAULT '0',
  `auth_key` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `company`, `username`, `password`, `s3_key`, `s3_secret`, `api_key`, `license`, `timezone`, `tied_to`, `app`, `paypal`, `cron`, `cron_ares`, `send_rate`, `language`, `cron_csv`, `ses_endpoint`, `auth_enabled`, `auth_key`) VALUES
(1, 'S2 Email Domain', 'S2 Email Domain', 's2@emailvn.top', '3bf9b979445ae8b30ee180ad57dacbbe162ab3e3faa02db28eaf2c612f3821d15ce7c84df43a6e3c5443f850cf8d5b26df99d16a1e7ef0ca9d88e4e99a964550', '', '', 'tqAY3HyMtpW2fTtmkUl3', 'RfbYfKKxOyosQ6cLsk7QelFJPxX1fZzg', 'Asia/Ho_Chi_Minh', NULL, NULL, NULL, 1, 0, 0, 'en_US', 0, 'email.us-east-1.amazonaws.com', 0, NULL),
(2, 'Nguyễn Hiến', 'Đay là demo', 'demo@emailmaket.net', 'b28ad347afc5e371fc427f8f26541f49b84b9712bfdd486242fb1a9ec8273435de8e193a4a5c8883ab4636b7dd8087b9479bd1cf61c7486d5ee442df9cb3beac', NULL, NULL, NULL, NULL, 'Asia/Ho_Chi_Minh', 1, 1, NULL, 0, 0, 0, 'en_US', 0, NULL, 0, NULL),
(3, 'Vinh Huynh', 'Test', 'minaworksvn@gmail.com', '3460214e4e352e18cadeb5e6e9efc58d394787396e9794af1e908c15daa93d36ec2e3c8e6e6b773a23ca30b541f43f8b76fadb9a23ad20b9522df3f3670350c4', NULL, NULL, NULL, NULL, 'Asia/Ho_Chi_Minh', 1, 2, NULL, 0, 0, 0, 'en_US', 0, NULL, 0, NULL),
(5, 'Vinh Huynh', 'Vinh', 'huynhtuvinh87@gmail.com', 'a5b253d8484925a3b4fba260768416dfdcbeaed639bb3435c566cbf54721f846903725c7283cf9ab1f090f179d015f46a50b5e798695547eda6e2342db8918a2', NULL, NULL, NULL, NULL, 'Asia/Ho_Chi_Minh', 1, 4, NULL, 0, 0, 10, 'vi_VN', 0, NULL, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE `queue` (
  `id` int(11) UNSIGNED NOT NULL,
  `query_str` longtext,
  `campaign_id` int(11) DEFAULT NULL,
  `subscriber_id` int(11) DEFAULT NULL,
  `sent` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(11) UNSIGNED NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_fields` longtext COLLATE utf8mb4_unicode_ci,
  `list` int(11) DEFAULT NULL,
  `unsubscribed` int(11) DEFAULT '0',
  `bounced` int(11) DEFAULT '0',
  `bounce_soft` int(11) DEFAULT '0',
  `complaint` int(11) DEFAULT '0',
  `last_campaign` int(11) DEFAULT NULL,
  `last_ares` int(11) DEFAULT NULL,
  `timestamp` int(100) DEFAULT NULL,
  `join_date` int(100) DEFAULT NULL,
  `confirmed` int(11) DEFAULT '1',
  `messageID` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `userID`, `name`, `email`, `custom_fields`, `list`, `unsubscribed`, `bounced`, `bounce_soft`, `complaint`, `last_campaign`, `last_ares`, `timestamp`, `join_date`, `confirmed`, `messageID`) VALUES
(1, 1, '', 'giicmsvn@gmail.com', NULL, 1, 0, 0, 0, 0, 1, NULL, 1499308890, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) UNSIGNED NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL,
  `template_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `html_text` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'MMhaEXrgi7MNh1fiRQ2abT_ePpXIMzy5', '$2y$13$IqiGuk1J59sEKcc7gpFexeBbTYh24quDUdGtt6AYcEwFwnGRvpYqO', NULL, 'admin', 10, 1489110367, 1489110367),
(3, 'huynhtuvinh87', 'huynhtuvinh87@gmail.com', 'O4r5C3wM1pEOPyX41auDrAhLuWHHkFlL', '$2y$13$ktM.CD/Fi/sxyEfcthTk8uOIGs3pJviwvoAWhCWinlEcLKNGIZ.m.', NULL, 'member', 10, 1499315459, 1499315459),
(4, 'huynhtuvinh', 'huy@gmail.com', 'Ty8ccK7t6d6j-FyZN6kvsaAVhe3eWWkY', '$2y$13$56majIt/cy58sSz/dz44TO2hE8oY/ShLcaaZRQvKFsQcqny8mHKLu', NULL, 'member', 10, 1499315906, 1499315906);

-- --------------------------------------------------------

--
-- Table structure for table `user_meta`
--

CREATE TABLE `user_meta` (
  `user_id` int(11) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_meta`
--

INSERT INTO `user_meta` (`user_id`, `meta_key`, `meta_value`) VALUES
(3, 'fullname', 'Vinh Huynh'),
(3, 'smtp_host', 'smtp.gmail.com'),
(3, 'smtp_post', '465'),
(3, 'smtp_ssl', 'ssl'),
(3, 'smtp_username', 'huynhtuvinh87@gmail.com'),
(3, 'smtp_password', 'Vinh@1985'),
(4, 'fullname', 'Vinh Huynh'),
(4, 'smtp_host', ''),
(4, 'smtp_post', ''),
(4, 'smtp_ssl', ''),
(4, 'smtp_username', ''),
(4, 'smtp_password', '');

-- --------------------------------------------------------

--
-- Table structure for table `zapier`
--

CREATE TABLE `zapier` (
  `id` int(11) UNSIGNED NOT NULL,
  `subscribe_endpoint` varchar(100) DEFAULT NULL,
  `event` varchar(100) DEFAULT NULL,
  `list` int(11) DEFAULT NULL,
  `app` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ares`
--
ALTER TABLE `ares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ares_emails`
--
ALTER TABLE `ares_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queue`
--
ALTER TABLE `queue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_id` (`subscriber_id`),
  ADD KEY `st_id` (`sent`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `s_list` (`list`),
  ADD KEY `s_unsubscribed` (`unsubscribed`),
  ADD KEY `s_bounced` (`bounced`),
  ADD KEY `s_bounce_soft` (`bounce_soft`),
  ADD KEY `s_complaint` (`complaint`),
  ADD KEY `s_confirmed` (`confirmed`),
  ADD KEY `s_timestamp` (`timestamp`),
  ADD KEY `s_email` (`email`),
  ADD KEY `s_last_campaign` (`last_campaign`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zapier`
--
ALTER TABLE `zapier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ares`
--
ALTER TABLE `ares`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ares_emails`
--
ALTER TABLE `ares_emails`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `queue`
--
ALTER TABLE `queue`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `zapier`
--
ALTER TABLE `zapier`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
