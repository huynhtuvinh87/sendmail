-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2017 at 09:58 AM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `post_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`post_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(26, '', '', '', 1497365647, 1497365647),
(24, 'Determine your reasons for using stevia.', 'Manage your blood glucose levels. If you are a diabetic, stevia may be an attractive option because it is 100 to 300 times sweeter than sugar and does not raise your blood glucose level. Identify the sugary foods and drinks that you usually consume, and consider replacing the sugar with stevia.\r\nReduce caloric intake. Stevia contains no calories, making it a possible sugar alternative for high-calorie foods and drinks.\r\nLimit dental health issues. Particularly for children, stevia is useful for limiting sugar intake in fruit juices and baked goods that may cause tooth decay.', 'aid1387330-v4-728px-Use-Stevia-Step-5.jpg.webp', 1497365660, 1497365660),
(23, ' Expanding your options', 'Change what you\'ve been cooking. If all you\'ve been doing is opening cans and ripping over packages of instant food, it\'s time to get daring and dip your fingers into food-from-scratch. Don\'t worry––there are plenty of recipes which explain exactly what to do in order to create real food that tastes great.', 'aid716823-v4-728px-Be-a-Great-Cook-Step-1-Version-2.jpg.webp', 1497365673, 1497365673),
(23, 'Visit your local library', ' Go to the cookbook section and borrow some cookbooks that tickle your fancy. Try to stick with less complicated recipes to begin with though––you don\'t want to be put off before you\'ve even started.\r\nBasics cookbooks are very good books to begin with. These books tend to explain terminology and techniques, as well as providing samples of simple but essential recipes. You can learn a lot from even just one such book, and then graduate onto cookbooks that seem like favourites to you.\r\nWhen reading a cookbook, check out how recipes are written and look for the basic terms and methods. Also notice that particular types of food (for example, bread, soup, meat, cake, etc.) have specific requirements in common to many recipes within that type of food.', 'aid716823-v4-728px-Be-a-Great-Cook-Step-2-Version-2.jpg.webp', 1497365674, 1497365674),
(23, 'Check out free recipes on the internet', ' There are recipes everywhere on the internet, including on wikiHow. You have so many choices that it is important to work out which sites you like and trust instead of spending all day collecting recipes, so be discerning in your selection. It also helps to find recipes that allow comments; that way, you can see what others say about the recipes and what changes or additions they suggest.\r\nGet to know the food bloggers. There are bound to be some you love because they cook the sort of food you like and share interesting anecdotes that make reading their blog worthwhile. You can usually subscribe to such blogs to get regular updates and when you\'re game, you can also share comments about your experiences of the recipes they\'re suggesting.', 'aid716823-v4-728px-Be-a-Great-Cook-Step-3-Version-2.jpg.webp', 1497365674, 1497365674),
(22, 'bfsf ưefc', 'fsd wqwdfdfdfdfdfdfdf', '58d8fcbdc3f864513a711a68-contest.jpg', 1497365692, 1497365692),
(22, 'dfsssssssss', 'dfssssssss', '2016-11-09_gaboxoi2-600x375.jpg', 1497365692, 1497365692),
(27, '', '', '', 1497412365, 1497412365),
(29, '', '', 'lam-sao-day-.jpg', 1497432301, 1497432301),
(65, '', '', '', 1497591911, 1497591911);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` text,
  `status` int(11) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1488976099),
('m130524_201442_init', 1488976127);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `code` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `note` text,
  `status` tinyint(4) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `code`, `fullname`, `email`, `phone`, `address`, `total`, `note`, `status`, `created_at`, `updated_at`) VALUES
(8, 750555419, 'Vinh', 'huynhtuvinh87@gmail.com', 905951699, 'Đà Nẵng', NULL, NULL, 0, 1498533958, 1498533958),
(9, 475650024, 'sac', 'sfsd@gmail.com', 545454564, 'scascs', 100000, '', 0, 1498536041, 1498536041);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `author` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `parent_id`, `type`, `title`, `slug`, `content`, `image`, `status`, `author`, `views`, `created_at`, `updated_at`) VALUES
(75, NULL, 'blog', 'Tin về phong thủy', 'tin-v-phong-thy', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>T&ocirc;i kh&ocirc;ng tin</p>\r\n</body>\r\n</html>', NULL, 1, 1, 0, 1497865459, 1497865894),
(76, NULL, 'blog', 'Tin về phong thủy trên xe', 'tin-v-phong-thy-tren-xe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', NULL, 1, 1, 0, 1497865836, 1497865836),
(77, NULL, 'product', 'Nhẫn Tỳ hưu Myanmar', 'nhan-ty-huu-myanmar', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 'nhan-ty-huu-myanmar-1498102986.jpg', 1, 1, 0, 1498102986, 1498532491),
(78, NULL, 'product', 'Phật bản mệnh đá mã não đỏ ', 'phat-ban-menh-da-ma-nao-do', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Phật bản mệnh đ&aacute; hắc m&atilde; nảo đỏ &ndash; tuổi Tuất, Hợi (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x d&agrave;y): 2.3 cm x 4 cm x 0.4 cm<br />+ Khối lượng: 15gr<br />+ &Yacute; nghĩa: Phật A Di Đ&agrave; cư tr&uacute; tại thế giới T&acirc;y phương Cực Lạc, dựa v&agrave;o nguyện lực v&ocirc; lượng của ng&agrave;i để phổ độ ch&uacute;ng sinh. Những người sinh năm Tuất, Hợi sẽ nhận được sự ph&ugrave; hộ của ng&agrave;i, một đời b&igrave;nh an, gặp hung ho&aacute; c&aacute;t, được v&atilde;ng sinh v&agrave;o thế giới Cực Lạc.<br />+ C&aacute;ch sử dụng: Trang sức đeo cổ, ngọc bội.</p>\r\n</body>\r\n</html>', 'phat-ban-menh-da-ma-nao-do-1498103137.jpg', 1, 1, 0, 1498103137, 1498103137),
(79, NULL, 'product', 'Tỳ hưu mã não đỏ', 'ty-huu-ma-nao-do', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ hưu m&atilde; n&atilde;o đỏ (Quảng Đ&ocirc;ng)<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 3cm x 1.6cm x 1cm<br />+ Khối lượng: 7g<br />+ &Yacute; nghĩa: chi&ecirc;u t&agrave;i vượng lộc, tịch t&agrave; h&oacute;a s&aacute;t.<br />+ C&aacute;ch sử dụng: trang sức mặt d&acirc;y chuyền.</p>\r\n</div>\r\n</body>\r\n</html>', 'ty-huu-ma-nao-do-1498104990.jpg', 1, 1, 0, 1498103289, 1498104990),
(80, NULL, 'product', 'Tỳ hưu Hoàng Long lớn', 'ty-huu-hoang-long-lon', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 'ty-huu-hoang-long-lon-1498105070.jpg', 1, 1, 0, 1498105070, 1498105070),
(81, NULL, 'product', 'Tỳ hưu đá Đông Linh xanh', 'ty-huu-da-dong-linh-xanh', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n\r\n</body>\r\n</html>', 'ty-huu-da-dong-linh-xanh-1498105230.jpg', 1, 1, 0, 1498105230, 1498105230),
(82, NULL, 'product', 'Tỳ hưu trên chuông hoàng long', 'ty-huu-tren-chuong-hoang-long', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<h1 class=\"title\">&nbsp;</h1>\r\n<div>&nbsp;</div>\r\n<div>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ hưu đ&aacute; ngọc Ho&agrave;ng Long v&agrave;ng (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 3.5cm x 2.5cm x 1cm<br />+ Khối lượng: 13g<br />+ &Yacute; nghĩa: chi&ecirc;u t&agrave;i lộc,vượng lộc, tịch t&agrave; h&oacute;a s&aacute;t, hợp mệnh Thổ, Kim, Mộc.<br />+ C&aacute;ch sử dụng: mặt d&acirc;y chuyền, ngọc bội, m&oacute;c kh&oacute;a xe&hellip;</p>\r\n</div>\r\n<form class=\"cart\" enctype=\"multipart/form-data\" method=\"post\">\r\n<div class=\"quantity buttons_added\"><input class=\"minus\" type=\"button\" value=\"-\" /><input class=\"input-text qty text\" title=\"SL\" min=\"1\" name=\"quantity\" size=\"4\" step=\"1\" type=\"number\" value=\"1\" /><input class=\"plus\" type=\"button\" value=\"+\" /></div>\r\n<button class=\"single_add_to_cart_button button alt\" type=\"submit\">Đặt Mua</button></form>\r\n</body>\r\n</html>', 'ty-huu-tren-chuong-hoang-long-1498105330.jpg', 1, 1, 0, 1498105330, 1498105330),
(83, NULL, 'product', 'Tỳ hưu đông linh đứng', 'ty-huu-dong-linh-dung', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ hưu đ&aacute; ngọc Đ&ocirc;ng Linh ((tại Việt Nam)).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 3.2cm x 1.1cm x 2.9cm<br />+ Khối lượng: 14g<br />+ &Yacute; nghĩa: chi&ecirc;u t&agrave;i ph&aacute;t lộc, may mắn trong c&ocirc;ng danh, thăng tiến trong c&ocirc;ng việc, tốt cho sức khỏe.<br />+ C&aacute;ch sử dụng: trang sức mặt d&acirc;y chuyền, ngọc bội, m&oacute;c</p>\r\n</body>\r\n</html>', 'ty-huu-dong-linh-dung-1498105425.jpg', 1, 1, 0, 1498105425, 1498532178),
(84, NULL, 'product', 'Cặp Tỳ Hưu đá Hoàng Long ngậm tiền nhỏ', 'cap-ty-huu-da-hoang-long-ngam-tien-nho', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Cặp Tỳ Hưu đ&aacute; Ho&agrave;ng Long ngậm tiền nhỏ ((tại Việt Nam)).<br />+ K&iacute;ch thước (cao x d&agrave;i x rộng): 2,3cm x 4,5cm x 1cm<br />+ Khối lượng: 23gr<br />+ &Yacute; nghĩa: thu h&uacute;t, chi&ecirc;u t&agrave;i lộc, mang may mắn cho người đeo, hợp mệnh Kim v&agrave; Mộc&hellip;<br />+ C&aacute;ch sử dụng: trang sức. mặt d&acirc;y chuyền, m&oacute;c kh&oacute;a, mang theo người&hellip;</p>\r\n</body>\r\n</html>', 'cap-ty-huu-da-hoang-long-ngam-tien-nho-1498105512.jpg', 1, 1, 0, 1498105512, 1498105512),
(85, NULL, 'product', 'Tỳ Hưu đeo cổ đá Hoàng Long đứng nhỏ', 'ty-huu-deo-co-da-hoang-long-dung-nho', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ Hưu đeo cổ đ&aacute; Ho&agrave;ng Long đứng nhỏ ((tại Việt Nam)).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 2,8cm x 1,1cm x 1,8cm<br />+ Khối lượng: 16gr<br />+ &Yacute; nghĩa: thu h&uacute;t, chi&ecirc;u t&agrave;i lộc, mang may mắn cho người đeo, trừ t&agrave;, h&oacute;a s&aacute;t, hợp mệnh Kim v&agrave; Mộc&hellip;<br />+ C&aacute;ch sử dụng: trang sức, mặt d&acirc;y chuyền, m&oacute;c kh&oacute;a, bọc trong v&iacute;&hellip;.</p>\r\n</body>\r\n</html>', 'ty-huu-deo-co-da-hoang-long-dung-nho-1498105593.jpg', 1, 1, 0, 1498105593, 1498105593),
(86, NULL, 'product', 'Tỳ Hưu đứng đá Miến Điện', 'ty-huu-dung-da-mien-dien', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ Hưu đứng đ&aacute; Miến Điện (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 3,2cm x 2,3cm x 1,4cm<br />+ Khối lượng: 20gr<br />+ &Yacute; nghĩa: thu h&uacute;t, chi&ecirc;u t&agrave;i lộc, mang may mắn cho người đeo, trừ t&agrave;, h&oacute;a s&aacute;t,..<br />+ C&aacute;ch sử dụng: trang sức, mặt d&acirc;y chuyền, m&oacute;c kh&oacute;a, bọc trong v&iacute;&hellip;.</p>\r\n</body>\r\n</html>', 'ty-huu-dung-da-mien-dien-1498105681.jpg', 1, 1, 0, 1498105681, 1498531675),
(87, NULL, 'product', 'Móc khóa Tỳ Hưu đứng đá Miến Điện', 'moc-khoa-ty-huu-dung-da-mien-dien', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện:M&oacute;c kh&oacute;a Tỳ Hưu đứng đ&aacute; Miến Điện (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 3,2cm x 2,3cm x 1,4cm<br />+ Khối lượng: 25gr<br />+ &Yacute; nghĩa: thu h&uacute;t, chi&ecirc;u t&agrave;i lộc, mang may mắn cho người đeo, trừ t&agrave;, h&oacute;a s&aacute;t,..<br />+ C&aacute;ch sử dụng: trang sức, mặt d&acirc;y chuyền, m&oacute;c kh&oacute;a, bọc trong v&iacute;&hellip;.</p>\r\n</body>\r\n</html>', 'moc-khoa-ty-huu-dung-da-mien-dien-1498105798.jpg', 1, 1, 0, 1498105798, 1498105798),
(88, NULL, 'product', 'Tỳ hưu đá kim sa', 'ty-huu-da-kim-sa', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ hưu đ&aacute; kim sa ((tại Việt Nam)).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 3cm x 1cm x 0.5cm<br />+ Khối lượng: 7g<br />+ &Yacute; nghĩa: chi&ecirc;u t&agrave;i vượng lộc, tịch t&agrave; h&oacute;a s&aacute;t.<br />+ C&aacute;ch sử dụng: trang sức mặt d&acirc;y chuyền, m&oacute;c kh&oacute;a xe, ngọc bội&hellip;</p>\r\n</body>\r\n</html>', 'ty-huu-da-kim-sa-1498105923.jpg', 1, 1, 0, 1498105923, 1498105923),
(89, NULL, 'product', '3 Tỳ hưu Hoàng Long', '3-ty-huu-hoang-long', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ hưu đ&aacute; ngọc Ho&agrave;ng Long v&agrave;ng (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 4.2cm x 2.5cm x 1cm<br />+ Khối lượng: 19g<br />+ &Yacute; nghĩa: h&uacute;t t&agrave;i lộc, tăng vận may.<br />+ C&aacute;ch sử dụng: trang sức mặt d&acirc;y chuyền, ngọc bội, d&acirc;y treo.</p>\r\n</body>\r\n</html>', '3-ty-huu-hoang-long-1498106002.jpg', 1, 1, 0, 1498106002, 1498531710),
(90, NULL, 'product', 'Chuỗi Tỳ hưu Hoàng Long', 'chuoi-ty-huu-hoang-long', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ hưu đ&aacute; ngọc Ho&agrave;ng Long T&acirc;n Cương.((tại Việt Nam))<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): bi lớn, th&iacute;ch hợp tay nam, 13 hạt.<br />+ Khối lượng: 54g<br />+ &Yacute; nghĩa: chi&ecirc;u t&agrave;i ph&aacute;t lộc, tịch t&agrave;, thuận lợi c&ocirc;ng việc, may mắn sức khỏe.<br />+ C&aacute;ch sử dụng: trang sức v&ograve;ng đeo tay.</p>\r\n</body>\r\n</html>', 'chuoi-ty-huu-hoang-long-1498106089.jpg', 1, 1, 0, 1498106089, 1498532401),
(91, NULL, 'product', 'Vòng Tỳ Hưu mã não đỏ lớn12 li', 'vong-ty-huu-ma-nao-do-lon12-li', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Chuỗi Tỳ Hưu đ&aacute; m&atilde; n&atilde;o đỏ lớn 12 li ((tại Việt Nam))<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): bi lớn, 13 hạt, th&iacute;ch hợp tay nam.<br />+ Khối lượng: 46g<br />+ &Yacute; nghĩa: Chuỗi Tỳ Hưu trang sức phong thủy mang may mắn về t&agrave;i lộc, hợp mệnh Hỏa, Thổ, Thủy.<br />+ C&aacute;ch sử dụng: v&ograve;ng chuỗi đeo tay.</p>\r\n</body>\r\n</html>', 'vong-ty-huu-ma-nao-do-lon12-li-1498106198.jpg', 1, 1, 0, 1498106198, 1498106198),
(92, NULL, 'product', 'Chuỗi tỳ hưu và đồng tiền phỉ thúy', 'chuoi-ty-huu-va-dong-tien-phi-thuy', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Chuỗi hạt ngọc Phỉ Th&uacute;y treo 1 tỳ hưu v&agrave; 1 chiếc l&aacute; (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): bi tr&ograve;n, 19 hạt.<br />+ Khối lượng: 31.6g<br />+ &Yacute; nghĩa: trang sức phong thủy bổ trợ sức khỏe, mang b&igrave;nh an che chở v&agrave; chi&ecirc;u t&agrave;i lộc. Hợp mệnh Kim, Mộc, Hỏa<br />+ C&aacute;ch sử dụng: v&ograve;ng chuỗi đeo tay</p>\r\n</body>\r\n</html>', 'chuoi-ty-huu-va-dong-tien-phi-thuy-1498106377.jpg', 1, 1, 0, 1498106377, 1498106377),
(93, NULL, 'product', 'Chuỗi Tỳ hưu mắt mèo', 'chuoi-ty-huu-mat-meo', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Chuỗi đ&aacute; mắt m&egrave;o Tỳ hưu trung ((tại Việt Nam)).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): bi nhỏ, 18 hạt.<br />+ Khối lượng: 21g<br />+ &Yacute; nghĩa: mang lại may mắn về t&agrave;i lộc, hợp mệnh Thổ, Kim.<br />+ C&aacute;ch sử dụng: trang sức v&ograve;ng đeo tay.</p>\r\n</body>\r\n</html>', 'chuoi-ty-huu-mat-meo-1498106488.jpg', 1, 1, 0, 1498106488, 1498106488),
(94, NULL, 'product', 'Chuỗi tỳ hưu hắc ngà bi trung', 'chuoi-ty-huu-hac-nga-bi-trung', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: chuỗi tỳ hưu thạch anh đen &ndash; đ&aacute; hắc ng&agrave; (Nam MỸ).<br />+ K&iacute;ch thước: đường k&iacute;nh bi 0.9cm.<br />+ Khối lượng: 26g<br />+ &Yacute; nghĩa: c&oacute; t&aacute;c dụng chi&ecirc;u t&agrave;i, trừ t&agrave;, may mắn, mang đến điềm l&agrave;nh v&agrave; b&igrave;nh an, tốt cho sức khỏe&hellip;<br />+ C&aacute;ch sử dụng: Trang sức v&ograve;ng đeo tay.</p>\r\n</body>\r\n</html>', 'chuoi-ty-huu-hac-nga-bi-trung-1498106654.jpg', 1, 1, 0, 1498106654, 1498106654),
(95, NULL, 'product', 'Mặt nhẫn Tỳ hưu thạch anh', 'mat-nhan-ty-huu-thach-anh', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Mặt nhẫn Tỳ hưu đ&aacute; thạch anh v&agrave;ng (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 1.5cm x 0.8cm x 0.8cm<br />+ Khối lượng: 3g<br />+ &Yacute; nghĩa: đem lại may mắn về t&agrave;i lộc, tăng nh&acirc;n duy&ecirc;n, tr&aacute;nh điều thị phi, hợp mệnh Kim, Thổ, Mộc.<br />+ C&aacute;ch sử dụng: trang sức mặt d&acirc;y chuyền, mặt nhẫn.</p>\r\n</body>\r\n</html>', 'mat-nhan-ty-huu-thach-anh-1498106730.jpg', 1, 1, 0, 1498106730, 1498106730),
(96, NULL, 'product', 'Mặt thạch anh tóc vàng', 'mat-thach-anh-toc-vang', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Mặt thạch anh t&oacute;c v&agrave;ng (Nam Mỹ, Brazil)<br />+ K&iacute;ch thước (d&agrave;i x rộng): 2.5cm x 1.5cm<br />+ Khối lượng: 1.8gr<br />+ &Yacute; nghĩa: Thạch anh gi&uacute;p tăng cường sức khỏe, giải trừ bệnh tật, lưu th&ocirc;ng kh&iacute; huyết, giảm căng thẳng mệt mỏi.<br />+ C&aacute;ch sử dụng: Trang sức mặt d&acirc;y chuyền, bỏ b&oacute;p v&iacute;.</p>\r\n</body>\r\n</html>', 'mat-thach-anh-toc-vang-1498107035.jpg', 1, 1, 0, 1498107035, 1498107035),
(97, NULL, 'product', 'Tỳ hưu thạch anh vàng', 'ty-huu-thach-anh-vang', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Tỳ hưu thạch anh v&agrave;ng chạm vảy rồng tr&ecirc;n lưng (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 3cm x 1.8cm x 1.5cm<br />+ Khối lượng: 18g<br />+ &Yacute; nghĩa: Tỳ Hưu c&oacute; t&aacute;c dụng chi&ecirc;u t&agrave;i, ph&aacute;t lộc , bổ trợ c&ocirc;ng danh, tr&aacute;nh tiểu nh&acirc;n thị phi<br />+ C&aacute;ch sử dụng: trang sức mặt d&acirc;y chuyền.</p>\r\n</body>\r\n</html>', 'ty-huu-thach-anh-vang-1498107202.jpg', 1, 1, 0, 1498107202, 1498107202),
(98, NULL, 'product', 'Mặt thạch anh tóc vàng', 'mat-thach-anh-toc-vang', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Mặt thạch anh t&oacute;c v&agrave;ng (Nam Mỹ, Brazil)<br />+ K&iacute;ch thước (d&agrave;i x rộng): 3.2cm x 2.9cm<br />+ Khối lượng: 2.6gr<br />+ &Yacute; nghĩa: Thạch anh gi&uacute;p tăng cường sức khỏe, giải trừ bệnh tật, lưu th&ocirc;ng kh&iacute; huyết, giảm căng thẳng mệt mỏi.<br />+ C&aacute;ch sử dụng: Trang sức mặt d&acirc;y chuyền, bỏ b&oacute;p v&iacute;.</p>\r\n</body>\r\n</html>', 'mat-thach-anh-toc-vang-1498107724.jpg', 1, 1, 0, 1498107724, 1498107724),
(99, NULL, 'product', 'Chuỗi thạch anh vàng trong A Uruguay (8li) 23hạt ', 'chuoi-thach-anh-vang-trong-a-uruguay-8li-23hat', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Chuỗi thạch anh v&agrave;ng trong Uruguay (tại Việt Nam).<br />+ K&iacute;ch thước : 23 bi tr&ograve;n, (8li)<br />+ Khối lượng: 17.1 gr<br />+ &Yacute; nghĩa: trang sức phong thủy bổ trợ sức khỏe, loại đ&aacute; chi&ecirc;u t&agrave;i, gi&uacute;p đầu &oacute;c tỉnh t&aacute;o, gi&uacute;p ngủ ngon.<br />+ C&aacute;ch sử dụng: trang sức đeo tay</p>\r\n</body>\r\n</html>', 'chuoi-thach-anh-vang-trong-a-uruguay-8li-23hat-1498107859.jpg', 1, 1, 0, 1498107859, 1498107859),
(100, NULL, 'product', 'Chuỗi thạch anh vàng trong A Uruguay (12li) 17 hạt ', 'chuoi-thach-anh-vang-trong-a-uruguay-12li-17-hat', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Chuỗi thạch anh v&agrave;ng trong Uruguay (tại Việt Nam).<br />+ K&iacute;ch thước : 17 bi tr&ograve;n, (12li)<br />+ Khối lượng: 44.3 gr<br />+ &Yacute; nghĩa: trang sức phong thủy bổ trợ sức khỏe, loại đ&aacute; chi&ecirc;u t&agrave;i, gi&uacute;p đầu &oacute;c tỉnh t&aacute;o, gi&uacute;p ngủ ngon.<br />+ C&aacute;ch sử dụng: trang sức đeo tay</p>\r\n</body>\r\n</html>', 'chuoi-thach-anh-vang-trong-a-uruguay-12li-17-hat-1498109525.jpg', 1, 1, 0, 1498109525, 1498109525),
(101, NULL, 'product', 'Chuỗi thạch anh tóc vàng', 'chuoi-thach-anh-toc-vang', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Chuỗi thạch anh t&oacute;c v&agrave;ng đậm (tại Việt Nam).<br />+ K&iacute;ch thước: bi vừa<br />+ Khối lượng: 22.6g<br />+ &Yacute; nghĩa: bổ trợ sức khỏe, tăng cường tr&iacute; nhớ, lưu th&ocirc;ng kh&iacute; huyết, loại đ&aacute; chi&ecirc;u t&agrave;i, thu h&uacute;t kh&iacute; tốt&hellip;<br />+ C&aacute;ch sử dụng: trang sức v&ograve;ng đeo tay.</p>\r\n</body>\r\n</html>', 'chuoi-thach-anh-toc-vang-1498109663.jpg', 1, 1, 0, 1498109663, 1498109663),
(102, NULL, 'product', 'Chuỗi đá thạch anh tóc vàng A+ Uruguay 8li 21bi ', 'chuoi-da-thach-anh-toc-vang-a-uruguay-8li-21bi', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Chuỗi đ&aacute; thạch anh t&oacute;c v&agrave;ng A+ Uruguay. (tại Việt Nam).<br />+ K&iacute;ch thước: Chuỗi bi tr&ograve;n 8li, 21bi.<br />+ Khối lượng: 26.2gr<br />+ &Yacute; nghĩa: Thạch anh t&oacute;c v&agrave;ng c&oacute; c&ocirc;ng dụng bổ trợ sức khỏe, tăng cường tr&iacute; nhớ, lưu th&ocirc;ng kh&iacute; huyết. Loại đ&aacute; chi&ecirc;u t&agrave;i, thu h&uacute;t c&aacute;t kh&iacute; tốt, hợp với người mệnh Kim, Thổ.<br />+ C&aacute;ch sử dụng: trang sức v&ograve;ng đeo tay.</p>\r\n</body>\r\n</html>', 'chuoi-da-thach-anh-toc-vang-a-uruguay-8li-21bi-1498109900.jpg', 1, 1, 0, 1498109900, 1498109900),
(103, NULL, 'product', 'Vòng tay Tỳ Hưu mã não đỏ nhỏ', 'vong-tay-ty-huu-ma-nao-do-nho', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Chuỗi Tỳ Hưu đ&aacute; m&atilde; n&atilde;o đỏ cỡ nhỏ 8 li ((tại Việt Nam))<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): bi nhỏ, 18 bi.<br />+ Khối lượng: 17g<br />+ &Yacute; nghĩa: trang sức phong thủy mang may mắn về t&agrave;i lộc, hợp mệnh Hỏa, Thổ, Thủy.<br />+ C&aacute;ch sử dụng: v&ograve;ng chuỗi đeo tay.</p>\r\n</body>\r\n</html>', 'vong-tay-ty-huu-ma-nao-do-nho-1498112628.jpg', 1, 1, 0, 1498112628, 1498112628),
(104, NULL, 'product', 'Phật Quan Âm đá hắc ngà nhỏ ', 'phat-quan-am-da-hac-nga-nho', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Phật quan &acirc;m đ&aacute; hắc ng&agrave; (thạch anh đen) ((tại Việt Nam)).<br />+ K&iacute;ch thước (d&agrave;i x rộng): 3cm x 1.8cm<br />+ Khối lượng: 30g<br />+ &Yacute; nghĩa: Phật quan &acirc;m biểu tượng của b&igrave;nh an, chế h&oacute;a hung kh&iacute;, mang lại điềm l&agrave;nh, che chở độ hộ độ mạng cho người sử dụng.<br />+ C&aacute;ch sử dụng: Trang sức mặt d&acirc;y chuyền&hellip;</p>\r\n</body>\r\n</html>', 'phat-quan-am-da-hac-nga-nho-1498112780.jpg', 1, 1, 0, 1498112780, 1498112780),
(105, NULL, 'product', 'Phật bản mệnh đá mắt mèo nhỏ-Phổ Hiền Bồ Tát (Thìn+Tỵ) ', 'phat-ban-menh-da-mat-meo-nho-pho-hien-bo-tat-thinty', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Phật bản mệnh đ&aacute; mắt m&egrave;o &ndash; tuổi Th&igrave;n, Tỵ (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x d&agrave;y): 2.7 cm x 1.8cm x 0.5cm<br />+ Khối lượng: 6gr<br />+ &Yacute; nghĩa: Phật Phổ Hiền Bồ t&aacute;t bổ trợ cho người tuổi Th&igrave;n, Tỵ l&agrave; thần bảo vệ cho những người sinh năm Th&igrave;n, Tỵ. Phổ Hiền Bồ t&aacute;t ph&ugrave; hộ cho họ k&eacute;o d&agrave;i tuổi thọ, cả đời y&ecirc;n ổn v&agrave; tr&aacute;nh xa c&aacute;c loại bệnh tật, tai hoạ. Những người sinh năm tăng th&ecirc;m tr&iacute; nhớ, ph&ugrave; hộ cho họ c&oacute; của cải dồi d&agrave;o, gia đ&igrave;nh y&ecirc;n vui ho&agrave; hợp.<br />+ C&aacute;ch sử dụng: Trang sức đeo cổ, ngọc bội.</p>\r\n</body>\r\n</html>', 'phat-ban-menh-da-mat-meo-nho-pho-hien-bo-tat-thinty-1498113047.jpg', 1, 1, 0, 1498113047, 1498113047),
(106, NULL, 'product', 'Phật Di Lạc thạch anh hồng lớn', 'phat-di-lac-thach-anh-hong-lon', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Phật Di Lạc thạch anh hồng ((tại Việt Nam))<br />+ K&iacute;ch thước (d&agrave;i x rộng) : 3cm x 2.5cm<br />+ Khối lượng: 14g<br />+ &Yacute; nghĩa: Phật Di Lạc biểu tượng của sự vui vẻ, an lạc như &yacute;, ban phước nạp t&agrave;i.<br />+ C&aacute;ch sử dụng: Trang sức mặt d&acirc;y chuyền,..</p>\r\n</body>\r\n</html>', 'phat-di-lac-thach-anh-hong-lon-1498113179.jpg', 1, 1, 0, 1498113179, 1498113179),
(107, NULL, 'product', 'Phật Quan Âm đá hắc ngà lớn', 'phat-quan-am-da-hac-nga-lon', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Phật quan &acirc;m đ&aacute; hắc ng&agrave; (thạch anh đen) ((tại Việt Nam)).<br />+ K&iacute;ch thước (d&agrave;i x rộng): 3.8cm x 2.2cm<br />+ Khối lượng: 16g<br />+ &Yacute; nghĩa: Phật quan &acirc;m biểu tượng của b&igrave;nh an, chế h&oacute;a hung kh&iacute;, mang lại điềm l&agrave;nh, che chở độ hộ độ mạng cho người sử dụng.<br />+ C&aacute;ch sử dụng: Trang sức mặt d&acirc;y chuyền&hellip;</p>\r\n</body>\r\n</html>', 'phat-quan-am-da-hac-nga-lon-1498113263.jpg', 1, 1, 0, 1498113263, 1498113263),
(108, NULL, 'product', 'Mặt thạch anh ưu linh xanh', 'mat-thach-anh-uu-linh-xanh', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Mặt thạch anh ưu linh xanh (Nam Mỹ, Brazil)<br />+ K&iacute;ch thước (d&agrave;i x rộng): 2.5cm x 1.5cm<br />+ Khối lượng: 4 gr<br />+ &Yacute; nghĩa: Thạch anh ưu linh xanh gi&uacute;p tăng cường sức khỏe, giải trừ bệnh tật, lưu th&ocirc;ng kh&iacute; huyết, giảm căng thẳng mệt mỏi.<br />+ C&aacute;ch sử dụng: Trang sức mặt d&acirc;y chuyền, bỏ b&oacute;p v&iacute;.</p>\r\n</body>\r\n</html>', 'mat-thach-anh-uu-linh-xanh-1498113386.jpg', 1, 1, 0, 1498113386, 1498113386),
(109, NULL, 'product', 'Ve ngọc xanh nhỏ', 've-ngoc-xanh-nho', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Ve ngọc Myanmar v&acirc;n xanh l&yacute; (tại Việt Nam).<br />+ K&iacute;ch thước (d&agrave;i x rộng x cao): 2.8cm x 1.3cm x 0.3cm<br />+ Khối lượng: 4gr<br />+ &Yacute; nghĩa: biểu tượng của cuộc sống tốt đẹp d&agrave;i l&acirc;u, h&igrave;nh tượng ve sầu lột x&aacute;c mang lại sự trẻ trung, miếng ngọc hộ mệnh tr&aacute;nh kẻ tiểu nh&acirc;n, tốt cho những ai c&ograve;n đi học, củng cố tinh thần, gia tăng &yacute; ch&iacute;, đem lại kết quả cao trong c&aacute;c kỳ thi.<br />+ C&aacute;ch sử dụng: Trang sức mặt d&acirc;y chuyền đeo cổ, ngọc bội, m&oacute;c kh&oacute;a&hellip;</p>\r\n</body>\r\n</html>', 've-ngoc-xanh-nho-1498113528.jpg', 1, 1, 0, 1498113528, 1498797681),
(110, NULL, 'product', 'Ngọc bội Quan Âm mã não trắng', 'ngoc-boi-quan-am-ma-nao-trang', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>+ Chất liệu v&agrave; ho&agrave;n thiện: Ngọc bội Phật Quan &Acirc;m đ&aacute; m&atilde; n&atilde;o trắng ((tại Việt Nam)).<br />+ K&iacute;ch thước (đường k&iacute;nh): 35cm<br />+ Khối lượng: 35g<br />+ &Yacute; nghĩa: biểu tượng của b&igrave;nh an, chế h&oacute;a hung kh&iacute;, mang lại điềm l&agrave;nh cho người sử dụng.<br />+ C&aacute;ch sử dụng: trang sức mặt d&acirc;y chuyền, ngọc bội.</p>\r\n</body>\r\n</html>', 'ngoc-boi-quan-am-ma-nao-trang-1498114918.jpg', 1, 1, 0, 1498114918, 1498792575),
(111, NULL, 'slide', 'ACFasS', 'acfass', NULL, NULL, 1, 1, 0, 1498442913, 1498442913),
(112, NULL, 'slide', 'DSS', 'dss', NULL, NULL, 1, 1, 0, 1498442941, 1498442941),
(113, NULL, 'page', 'Giới thiệu', 'gioi-thieu', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong>I. QU&Aacute; TR&Igrave;NH H&Igrave;NH TH&Agrave;NH V&Agrave; PH&Aacute;T TRIỂN</strong></p>\r\n<p>Trong những năm qua, x&atilde; hội ph&aacute;t triển, kinh tế tăng trưởng đồng thời l&agrave; chất lượng cuộc sống của người d&acirc;n ng&agrave;y c&agrave;ng c&agrave;ng được n&acirc;ng cao nhiều trung t&acirc;m thương mại, nh&agrave; cao tầng, biệt thự được mọc ra k&egrave;m theo đấy l&agrave; nhu cầu mua sắm c&aacute;c mặt h&agrave;ng phục vụ nhu cầu cuộc sống h&agrave;ng ng&agrave;y như hoa v&agrave; qu&agrave; tặng.</p>\r\n<p>GiftShop khai trương si&ecirc;u thị số 442 Đội Cấn, Cống Vị, Ba Đ&igrave;nh, H&agrave; Nội, ch&iacute;nh thức tham gia v&agrave;o lĩnh vực kinh doanh b&aacute;n lẻ trực tuyến, tạo ra một phong c&aacute;ch mua sắm ho&agrave;n to&agrave;n mới với người d&acirc;n thủ đ&ocirc;, th&ocirc;ng qua cung cấp c&aacute;c sản phẩm v&agrave; dịch vụ tới người ti&ecirc;u d&ugrave;ng.</p>\r\n<p><strong>II. MỤC TI&Ecirc;U CHIẾN LƯỢC</strong></p>\r\n<p>1. Tối đa ho&aacute; gi&aacute; trị đầu tư của c&aacute;c cổ đ&ocirc;ng; giữ vững tốc độ tăng trưởng lợi nhuận v&agrave; t&igrave;nh h&igrave;nh t&agrave;i ch&iacute;nh l&agrave;nh mạnh;</p>\r\n<p>2. Kh&ocirc;ng ngừng n&acirc;ng cao động lực l&agrave;m việc v&agrave; năng lực c&aacute;n bộ; GiftShop phải lu&ocirc;n dẫn đầu ng&agrave;nh b&aacute;n lẻ trong việc s&aacute;ng tạo, ph&aacute;t triển ch&iacute;nh s&aacute;ch đ&atilde;i ngộ v&agrave; cơ hội thăng tiến nghề nghiệp cho c&aacute;n bộ của m&igrave;nh;</p>\r\n<p>3. Duy tr&igrave; sự h&agrave;i l&ograve;ng, trung th&agrave;nh v&agrave; gắn b&oacute; của kh&aacute;ch h&agrave;ng với GiftShop; x&acirc;y dựng GiftShop th&agrave;nh một trong những c&ocirc;ng ty h&agrave;ng đầu Việt Nam c&oacute; chất lượng dịch vụ tốt nhất do kh&aacute;ch h&agrave;ng lựa chọn.</p>\r\n<p>4. Ph&aacute;t triển GiftShop th&agrave;nh một trong những c&ocirc;ng ty h&agrave;ng đầu Việt Nam về: quản l&yacute; tốt nhất, m&ocirc;i trường l&agrave;m việc tốt nhất, văn ho&aacute; doanh nghiệp ch&uacute; trọng kh&aacute;ch h&agrave;ng, th&uacute;c đẩy hợp t&aacute;c v&agrave; s&aacute;ng tạo, linh hoạt nhất khi m&ocirc;i trường kinh doanh thay đổi.</p>\r\n<p><strong>III. THẾ MẠNH V&Agrave; ĐỊNH HƯỚNG CỦA C&Ocirc;NG TY</strong></p>\r\n<p>Với kim chỉ nam l&agrave; &ldquo;<em>Kh&ocirc;ng ngừng ph&aacute;t triển v&igrave; kh&aacute;ch h&agrave;ng</em>&rdquo;, GiftShop đ&atilde; quy tụ được Ban l&atilde;nh đạo c&oacute; bề d&agrave;y kinh nghiệm trong lĩnh vực b&aacute;n lẻ, kh&ocirc;ng chỉ mạnh về kinh doanh m&agrave; c&ograve;n mạnh về c&ocirc;ng nghệ, c&oacute; nhiều tiềm năng ph&aacute;t triển, kết hợp với đội ngũ nh&acirc;n vi&ecirc;n trẻ, năng động v&agrave; chuy&ecirc;n nghiệp, tạo n&ecirc;n thế mạnh n&ograve;ng cốt của c&ocirc;ng ty để thực hiện tốt c&aacute;c mục ti&ecirc;u đề ra.</p>\r\n<p>Hơn nữa, tr&ecirc;n cơ sở nguồn lực của c&ocirc;ng ty v&agrave; nhu cầu của x&atilde; hội, GiftShop<strong>&nbsp;</strong>lựa chọn ph&aacute;t triển kinh doanh hoa v&agrave; qu&agrave; tặng phục vụ nhu cầu thiết yếu của người d&acirc;n với c&aacute;c sản phẩm đa dạng, phong ph&uacute;, mang lại gi&aacute; trị gia tăng cho người ti&ecirc;u d&ugrave;ng th&ocirc;ng qua c&aacute;c dịch vụ sau b&aacute;n h&agrave;ng.</p>\r\n<p>Qua qu&aacute; tr&igrave;nh ph&aacute;t triển, b&ecirc;n cạnh việc thiết lập được một hệ thống đối t&aacute;c nước trong nước v&agrave; ngo&agrave;i đến từ c&aacute;c doanh nghiệp lớn, c&oacute; thế mạnh trong lĩnh vực ban..., c&ocirc;ng ty sẽ đầu tư v&agrave;o c&aacute;c ng&agrave;nh nghề mới như bất động sản, khai th&aacute;c kho&aacute;ng, đầu tư t&agrave;i ch&iacute;nh... trong thời gian tới.</p>\r\n</body>\r\n</html>', NULL, 1, 1, 0, 1498447992, 1498447992),
(114, NULL, 'page', 'Liên hệ', 'lien-he', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p><strong>I. QU&Aacute; TR&Igrave;NH H&Igrave;NH TH&Agrave;NH V&Agrave; PH&Aacute;T TRIỂN</strong></p>\r\n<p>Trong những năm qua, x&atilde; hội ph&aacute;t triển, kinh tế tăng trưởng đồng thời l&agrave; chất lượng cuộc sống của người d&acirc;n ng&agrave;y c&agrave;ng c&agrave;ng được n&acirc;ng cao nhiều trung t&acirc;m thương mại, nh&agrave; cao tầng, biệt thự được mọc ra k&egrave;m theo đấy l&agrave; nhu cầu mua sắm c&aacute;c mặt h&agrave;ng phục vụ nhu cầu cuộc sống h&agrave;ng ng&agrave;y như hoa v&agrave; qu&agrave; tặng.</p>\r\n<p>GiftShop khai trương si&ecirc;u thị số 442 Đội Cấn, Cống Vị, Ba Đ&igrave;nh, H&agrave; Nội, ch&iacute;nh thức tham gia v&agrave;o lĩnh vực kinh doanh b&aacute;n lẻ trực tuyến, tạo ra một phong c&aacute;ch mua sắm ho&agrave;n to&agrave;n mới với người d&acirc;n thủ đ&ocirc;, th&ocirc;ng qua cung cấp c&aacute;c sản phẩm v&agrave; dịch vụ tới người ti&ecirc;u d&ugrave;ng.</p>\r\n<p><strong>II. MỤC TI&Ecirc;U CHIẾN LƯỢC</strong></p>\r\n<p>1. Tối đa ho&aacute; gi&aacute; trị đầu tư của c&aacute;c cổ đ&ocirc;ng; giữ vững tốc độ tăng trưởng lợi nhuận v&agrave; t&igrave;nh h&igrave;nh t&agrave;i ch&iacute;nh l&agrave;nh mạnh;</p>\r\n<p>2. Kh&ocirc;ng ngừng n&acirc;ng cao động lực l&agrave;m việc v&agrave; năng lực c&aacute;n bộ; GiftShop phải lu&ocirc;n dẫn đầu ng&agrave;nh b&aacute;n lẻ trong việc s&aacute;ng tạo, ph&aacute;t triển ch&iacute;nh s&aacute;ch đ&atilde;i ngộ v&agrave; cơ hội thăng tiến nghề nghiệp cho c&aacute;n bộ của m&igrave;nh;</p>\r\n<p>3. Duy tr&igrave; sự h&agrave;i l&ograve;ng, trung th&agrave;nh v&agrave; gắn b&oacute; của kh&aacute;ch h&agrave;ng với GiftShop; x&acirc;y dựng GiftShop th&agrave;nh một trong những c&ocirc;ng ty h&agrave;ng đầu Việt Nam c&oacute; chất lượng dịch vụ tốt nhất do kh&aacute;ch h&agrave;ng lựa chọn.</p>\r\n<p>4. Ph&aacute;t triển GiftShop th&agrave;nh một trong những c&ocirc;ng ty h&agrave;ng đầu Việt Nam về: quản l&yacute; tốt nhất, m&ocirc;i trường l&agrave;m việc tốt nhất, văn ho&aacute; doanh nghiệp ch&uacute; trọng kh&aacute;ch h&agrave;ng, th&uacute;c đẩy hợp t&aacute;c v&agrave; s&aacute;ng tạo, linh hoạt nhất khi m&ocirc;i trường kinh doanh thay đổi.</p>\r\n<p><strong>III. THẾ MẠNH V&Agrave; ĐỊNH HƯỚNG CỦA C&Ocirc;NG TY</strong></p>\r\n<p>Với kim chỉ nam l&agrave; &ldquo;<em>Kh&ocirc;ng ngừng ph&aacute;t triển v&igrave; kh&aacute;ch h&agrave;ng</em>&rdquo;, GiftShop đ&atilde; quy tụ được Ban l&atilde;nh đạo c&oacute; bề d&agrave;y kinh nghiệm trong lĩnh vực b&aacute;n lẻ, kh&ocirc;ng chỉ mạnh về kinh doanh m&agrave; c&ograve;n mạnh về c&ocirc;ng nghệ, c&oacute; nhiều tiềm năng ph&aacute;t triển, kết hợp với đội ngũ nh&acirc;n vi&ecirc;n trẻ, năng động v&agrave; chuy&ecirc;n nghiệp, tạo n&ecirc;n thế mạnh n&ograve;ng cốt của c&ocirc;ng ty để thực hiện tốt c&aacute;c mục ti&ecirc;u đề ra.</p>\r\n<p>Hơn nữa, tr&ecirc;n cơ sở nguồn lực của c&ocirc;ng ty v&agrave; nhu cầu của x&atilde; hội, GiftShop<strong>&nbsp;</strong>lựa chọn ph&aacute;t triển kinh doanh hoa v&agrave; qu&agrave; tặng phục vụ nhu cầu thiết yếu của người d&acirc;n với c&aacute;c sản phẩm đa dạng, phong ph&uacute;, mang lại gi&aacute; trị gia tăng cho người ti&ecirc;u d&ugrave;ng th&ocirc;ng qua c&aacute;c dịch vụ sau b&aacute;n h&agrave;ng.</p>\r\n<p>Qua qu&aacute; tr&igrave;nh ph&aacute;t triển, b&ecirc;n cạnh việc thiết lập được một hệ thống đối t&aacute;c nước trong nước v&agrave; ngo&agrave;i đến từ c&aacute;c doanh nghiệp lớn, c&oacute; thế mạnh trong lĩnh vực ban..., c&ocirc;ng ty sẽ đầu tư v&agrave;o c&aacute;c ng&agrave;nh nghề mới như bất động sản, khai th&aacute;c kho&aacute;ng, đầu tư t&agrave;i ch&iacute;nh... trong thời gian tới.</p>\r\n</body>\r\n</html>', NULL, 1, 1, 0, 1498448006, 1498448006),
(115, NULL, 'blog', 'egfwe', 'egfwe', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>cfsd</p>\r\n</body>\r\n</html>', NULL, 1, 1, 0, 1498451994, 1498532462);

-- --------------------------------------------------------

--
-- Table structure for table `post_meta`
--

CREATE TABLE `post_meta` (
  `post_id` int(11) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_meta`
--

INSERT INTO `post_meta` (`post_id`, `meta_key`, `meta_value`) VALUES
(76, 'description', 'Tin về phong thủy trên xe'),
(76, 'picture', NULL),
(75, 'description', 'Tôi không tin\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(75, 'picture', 'http://admin.shop.loc/uploads/tin-v-phong-thy.jpg'),
(78, 'tag', ''),
(78, 'images', 'a:0:{}'),
(78, 'description', ''),
(78, 'price', ''),
(78, 'price_sale', ''),
(78, 'price_fake', ''),
(79, 'tag', ''),
(79, 'images', 'a:0:{}'),
(79, 'description', ''),
(79, 'price', ''),
(79, 'price_sale', ''),
(79, 'price_fake', ''),
(80, 'tag', ''),
(80, 'images', 'a:0:{}'),
(80, 'description', '+ Chất liệu và hoàn thiện: Tỳ hưu đá ngọc Hoàng Long (Tân Cương, (tại Việt Nam)).\r\n+ Kích thước (dài x rộng x cao): 3.5cm x 2cm x 1cm\r\n+ Khối lượng: 16g\r\n+ Ý nghĩa: đem lại may mắn về tài lộc, thích hợp cho người kinh doanh, buôn bán, hợp mệnh Thổ, Mộc, Kim.\r\n+ Cách sử dụng: trang sức mặt dây chuyền.'),
(80, 'price', ''),
(80, 'price_sale', ''),
(80, 'price_fake', ''),
(81, 'tag', ''),
(81, 'images', 'a:0:{}'),
(81, 'description', '+ Chất liệu và hoàn thiện: Tỳ hưu đeo cổ đá ngọc Đông Linh cõng tiền nhỏ ((tại Việt Nam)).\r\n+ Kích thước (dài x rộng x cao): 3cm x 1.7cm x 1.4cm\r\n+ Khối lượng: 9g\r\n+ Ý nghĩa: tài lộc hanh thông, công việc thành công nhanh chóng.\r\n+ Cách sử dụng: trang sức mặt dây chuyền, móc khóa, ngọc bội…'),
(81, 'price', ''),
(81, 'price_sale', ''),
(81, 'price_fake', ''),
(82, 'tag', ''),
(82, 'images', 'a:0:{}'),
(82, 'description', ''),
(82, 'price', ''),
(82, 'price_sale', ''),
(82, 'price_fake', ''),
(102, 'tag', ''),
(102, 'images', 'a:0:{}'),
(102, 'description', ''),
(102, 'price', '50000'),
(102, 'price_sale', ''),
(102, 'price_fake', '50000'),
(101, 'tag', ''),
(101, 'images', 'a:0:{}'),
(101, 'description', ''),
(101, 'price', '100000'),
(101, 'price_sale', ''),
(101, 'price_fake', '50000'),
(100, 'tag', ''),
(100, 'images', 'a:0:{}'),
(100, 'description', ''),
(100, 'price', '1000000'),
(100, 'price_sale', ''),
(100, 'price_fake', '500000'),
(99, 'tag', ''),
(99, 'images', 'a:0:{}'),
(99, 'description', ''),
(99, 'price', ''),
(99, 'price_sale', ''),
(99, 'price_fake', ''),
(98, 'tag', ''),
(98, 'images', 'a:0:{}'),
(98, 'description', ''),
(98, 'price', ''),
(98, 'price_sale', ''),
(98, 'price_fake', ''),
(97, 'tag', ''),
(97, 'images', 'a:0:{}'),
(97, 'description', ''),
(97, 'price', ''),
(97, 'price_sale', ''),
(97, 'price_fake', ''),
(96, 'tag', ''),
(96, 'images', 'a:0:{}'),
(96, 'description', ''),
(96, 'price', ''),
(96, 'price_sale', ''),
(96, 'price_fake', ''),
(95, 'tag', ''),
(95, 'images', 'a:0:{}'),
(95, 'description', ''),
(95, 'price', ''),
(95, 'price_sale', ''),
(95, 'price_fake', ''),
(94, 'tag', ''),
(94, 'images', 'a:0:{}'),
(94, 'description', ''),
(94, 'price', ''),
(94, 'price_sale', ''),
(94, 'price_fake', ''),
(93, 'tag', ''),
(93, 'images', 'a:0:{}'),
(93, 'description', ''),
(93, 'price', ''),
(93, 'price_sale', ''),
(93, 'price_fake', ''),
(92, 'tag', ''),
(92, 'images', 'a:0:{}'),
(92, 'description', ''),
(92, 'price', ''),
(92, 'price_sale', ''),
(92, 'price_fake', ''),
(91, 'tag', ''),
(91, 'images', 'a:0:{}'),
(91, 'description', ''),
(91, 'price', ''),
(91, 'price_sale', ''),
(91, 'price_fake', ''),
(88, 'tag', ''),
(88, 'images', 'a:0:{}'),
(88, 'description', ''),
(88, 'price', ''),
(88, 'price_sale', ''),
(88, 'price_fake', ''),
(87, 'tag', ''),
(87, 'images', 'a:0:{}'),
(87, 'description', ''),
(87, 'price', ''),
(87, 'price_sale', ''),
(87, 'price_fake', ''),
(85, 'tag', ''),
(85, 'images', 'a:0:{}'),
(85, 'description', ''),
(85, 'price', ''),
(85, 'price_sale', ''),
(85, 'price_fake', ''),
(84, 'tag', ''),
(84, 'images', 'a:0:{}'),
(84, 'description', ''),
(84, 'price', ''),
(84, 'price_sale', ''),
(84, 'price_fake', ''),
(103, 'tag', ''),
(103, 'images', 'a:0:{}'),
(103, 'description', ''),
(103, 'price', ''),
(103, 'price_sale', ''),
(103, 'price_fake', ''),
(104, 'tag', ''),
(104, 'images', 'a:0:{}'),
(104, 'description', ''),
(104, 'price', ''),
(104, 'price_sale', ''),
(104, 'price_fake', ''),
(105, 'tag', ''),
(105, 'images', 'a:0:{}'),
(105, 'description', ''),
(105, 'price', ''),
(105, 'price_sale', ''),
(105, 'price_fake', ''),
(106, 'tag', ''),
(106, 'images', 'a:0:{}'),
(106, 'description', ''),
(106, 'price', ''),
(106, 'price_sale', ''),
(106, 'price_fake', ''),
(107, 'tag', ''),
(107, 'images', 'a:0:{}'),
(107, 'description', ''),
(107, 'price', ''),
(107, 'price_sale', ''),
(107, 'price_fake', ''),
(108, 'tag', ''),
(108, 'images', 'a:0:{}'),
(108, 'description', ''),
(108, 'price', ''),
(108, 'price_sale', ''),
(108, 'price_fake', ''),
(111, 'description', 'SDSDDS'),
(111, 'meta_keywords', NULL),
(111, 'meta_description', NULL),
(111, 'picture', 'http://admin.thegioitailoc.loc/uploads/acfass.jpg'),
(111, 'link', 'http://admin.thegioitailoc.loc/slide/create'),
(111, 'price', '23'),
(111, 'price_sale', '32'),
(112, 'description', 'SFCA'),
(112, 'meta_keywords', NULL),
(112, 'meta_description', NULL),
(112, 'picture', 'http://admin.thegioitailoc.loc/uploads/dss.jpg'),
(112, 'link', 'http://admin.thegioitailoc.loc/slide/create'),
(112, 'price', ''),
(112, 'price_sale', ''),
(113, 'description', NULL),
(113, 'meta_keywords', NULL),
(113, 'meta_description', NULL),
(113, 'picture', NULL),
(113, 'page_type', NULL),
(113, 'widget', NULL),
(114, 'description', NULL),
(114, 'meta_keywords', NULL),
(114, 'meta_description', NULL),
(114, 'picture', NULL),
(114, 'page_type', NULL),
(114, 'widget', NULL),
(86, 'tag', ''),
(86, 'images', 'a:0:{}'),
(86, 'description', ''),
(86, 'featured', '0'),
(86, 'price', ''),
(86, 'price_sale', ''),
(86, 'price_fake', ''),
(86, 'buy_many', '0'),
(89, 'tag', ''),
(89, 'images', 'a:0:{}'),
(89, 'description', ''),
(89, 'featured', '1'),
(89, 'price', ''),
(89, 'price_sale', ''),
(89, 'price_fake', ''),
(89, 'buy_many', '0'),
(83, 'tag', ''),
(83, 'images', 'a:0:{}'),
(83, 'description', ''),
(83, 'featured', '0'),
(83, 'price', ''),
(83, 'price_sale', ''),
(83, 'price_fake', ''),
(83, 'buy_many', '0'),
(90, 'tag', ''),
(90, 'images', 'a:0:{}'),
(90, 'description', ''),
(90, 'featured', '0'),
(90, 'price', ''),
(90, 'price_sale', ''),
(90, 'price_fake', ''),
(90, 'buy_many', '0'),
(115, 'description', 'sssss'),
(115, 'picture', 'http://thegioitailoc.loc/images/default.jpg'),
(115, 'featured_blog', '0'),
(77, 'tag', ''),
(77, 'images', 'a:0:{}'),
(77, 'description', ''),
(77, 'featured', '0'),
(77, 'price', ''),
(77, 'price_sale', ''),
(77, 'price_fake', ''),
(77, 'buy_many', '0'),
(110, 'tag', ''),
(110, 'images', 'a:0:{}'),
(110, 'description', ''),
(110, 'featured', '0'),
(110, 'price', ''),
(110, 'price_sale', ''),
(110, 'price_fake', ''),
(110, 'buy_many', '0'),
(110, 'tracking_link', ''),
(109, 'tag', ''),
(109, 'images', 'a:0:{}'),
(109, 'description', ''),
(109, 'featured', '0'),
(109, 'price', ''),
(109, 'price_sale', ''),
(109, 'price_fake', ''),
(109, 'buy_many', '0'),
(109, 'tracking_link', '');

-- --------------------------------------------------------

--
-- Table structure for table `post_view`
--

CREATE TABLE `post_view` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `last_visit` int(11) NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_view`
--

INSERT INTO `post_view` (`id`, `post_id`, `ip`, `last_visit`, `hit`) VALUES
(13, 26, '127.0.0.1', 1497283592, 1),
(14, 64, '127.0.0.1', 1497588832, 1),
(15, 63, '127.0.0.1', 1497592756, 1),
(16, 65, '127.0.0.1', 1497601236, 1),
(17, 69, '127.0.0.1', 1497857523, 1),
(18, 73, '127.0.0.1', 1497867329, 1),
(19, 74, '127.0.0.1', 1497926451, 1),
(20, 71, '127.0.0.1', 1497926548, 1),
(21, 72, '127.0.0.1', 1497926620, 1),
(22, 70, '127.0.0.1', 1498016000, 1),
(23, 109, '127.0.0.1', 1498113587, 1),
(24, 105, '127.0.0.1', 1498280880, 1),
(25, 110, '127.0.0.1', 1498283247, 1),
(26, 82, '127.0.0.1', 1498284250, 1),
(27, 80, '127.0.0.1', 1498284318, 1),
(28, 79, '127.0.0.1', 1498284462, 1),
(29, 78, '127.0.0.1', 1498461567, 1),
(30, 101, '127.0.0.1', 1498490098, 1),
(31, 100, '127.0.0.1', 1498491805, 1),
(32, 102, '127.0.0.1', 1498493127, 1),
(33, 106, '127.0.0.1', 1498971113, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `order_id`, `name`, `url`, `image`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 8, 'Chuỗi thạch anh tóc vàng', 'http://thegioitailoc.loc/chuoi-thach-anh-toc-vang', 'http://thegioitailoc.loc/uploads/chuoi-thach-anh-toc-vang-1498109663.jpg', 1, 100000, 1498533958, 1498533958),
(2, 9, 'Chuỗi thạch anh tóc vàng', 'http://thegioitailoc.loc/chuoi-thach-anh-toc-vang', 'http://thegioitailoc.loc/uploads/chuoi-thach-anh-toc-vang-1498109663.jpg', 1, 100000, 1498536041, 1498536041);

-- --------------------------------------------------------

--
-- Table structure for table `qa`
--

CREATE TABLE `qa` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qa`
--

INSERT INTO `qa` (`id`, `title`, `email`, `created_at`, `updated_at`) VALUES
(1, 'dvvvvvsdcvf', 'scfcfcfcf@gmail.com', 1497328642, 1497328642),
(2, 'dsfcaadc', 'h@gmail.com', 1497329063, 1497329063),
(3, 'dvsafa', 'hr@gmail.com', 1497329326, 1497329326),
(4, 'ừqwda', 'h@gmail.com', 1497329519, 1497329519),
(5, 'ứcdaaD', 'h@gmail.com', 1497329640, 1497329640),
(6, 'âdd', 'asdad@gmail.com', 1497329688, 1497329688);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `term_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`term_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 78, 1498103138, 1498103138),
(1, 79, 1498104991, 1498104991),
(1, 80, 1498105071, 1498105071),
(1, 82, 1498105330, 1498105330),
(2, 86, 1498531676, 1498531676),
(2, 89, 1498531711, 1498531711),
(2, 83, 1498532179, 1498532179),
(2, 90, 1498532401, 1498532401),
(1, 77, 1498532492, 1498532492),
(20, 110, 1498792576, 1498792576),
(21, 110, 1498792576, 1498792576),
(23, 110, 1498792576, 1498792576),
(24, 110, 1498792576, 1498792576),
(1, 109, 1498797682, 1498797682),
(20, 109, 1498797682, 1498797682),
(22, 109, 1498797682, 1498797682);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `post_id`, `ip`, `star`, `email`, `fullname`, `content`, `created_at`, `updated_at`) VALUES
(1, 109, '127.0.0.1', 3, 'huynhtuvinh87@gmail.com', 'Vinh Huynh', 'dqssssssssssss', 1498966560, 1498966560);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `name`, `description`, `type`) VALUES
(1, 'General', NULL, 'general');

-- --------------------------------------------------------

--
-- Table structure for table `setting_meta`
--

CREATE TABLE `setting_meta` (
  `setting_id` int(11) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `setting_meta`
--

INSERT INTO `setting_meta` (`setting_id`, `meta_key`, `meta_value`) VALUES
(1, 'title', 'Boi toan'),
(1, 'description', 'Boi toan'),
(1, 'website', 'http://boitoan.loc/');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `indent` int(11) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `parent_id`, `title`, `slug`, `type`, `status`, `indent`, `order`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Tỳ hưu', 'ty-huu', 'category', 1, 0, 12, 0, 1498102621),
(2, NULL, 'Thiềm thừ', 'thiem-thu', 'category', 1, 0, 2, 0, 1498102656),
(3, NULL, 'Đá quý', 'da-quy', 'category', 1, 0, 3, 0, 1498102679),
(4, NULL, 'Trang sức', 'trang-suc', 'category', 1, 0, 4, 0, 1498102698),
(18, NULL, 'Vật phẩm', 'vat-pham', 'category', 1, 0, 0, 1497850202, 1498102734),
(19, NULL, 'Linh vật', 'linh-vat', 'category', 1, 0, 0, 1497850210, 1498102754),
(20, NULL, 'Bạch dương (29/3-19/4)', 'bach-duong-293-194', 'zodiac', 1, 0, 0, 1498791162, 1498791162),
(21, NULL, 'Kim Ngưu (20/4-20/5)', 'kim-nguu-204-205', 'zodiac', 1, 0, 0, 1498791191, 1498791191),
(22, NULL, 'Tuổi Tý', 'tuoi-ty', 'age', 1, 0, 0, 1498791326, 1498791326),
(23, NULL, 'Tuổi Sửu', 'tuoi-suu', 'age', 1, 0, 0, 1498791351, 1498791351),
(24, NULL, 'Tuổi Dần', 'tuoi-dan', 'age', 1, 0, 0, 1498791363, 1498791363);

-- --------------------------------------------------------

--
-- Table structure for table `term_meta`
--

CREATE TABLE `term_meta` (
  `term_id` int(11) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `term_meta`
--

INSERT INTO `term_meta` (`term_id`, `meta_key`, `meta_value`) VALUES
(1, 'description', ''),
(2, 'description', ''),
(3, 'description', ''),
(4, 'description', ''),
(18, 'description', ''),
(19, 'description', ''),
(20, 'description', ''),
(21, 'description', ''),
(22, 'description', ''),
(23, 'description', ''),
(24, 'description', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `auth_key`, `password_hash`, `password_reset_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'huynhtuvinh87@gmail.com', 'MMhaEXrgi7MNh1fiRQ2abT_ePpXIMzy5', '$2y$13$IqiGuk1J59sEKcc7gpFexeBbTYh24quDUdGtt6AYcEwFwnGRvpYqO', NULL, 'admin', 10, 1489110367, 1489110367),
(6, 'huynhtuvinh12', 'huynhtuvinh14@gmail.com', 'HgUWEIXt4X9IpEJlX2MI5hLSaG3LhW3j', '$2y$13$E8vHZw0HfB6w.4CdxQFuTunRT3YN9FgTyDWz9mmj3Ilk22ZTNVRvm', NULL, 'admin', 10, 1496722598, 1496728846),
(7, 'saaaaaaaaadc', 'h@gmail.com', '4SqxHt1tsnzDCmhVTDMPWQY5SpmP_w6p', '$2y$13$cIHty934LX9Xr0HV.cBTjOiGgzqCkQhB.95jhSxcPNAyvoNk4aZYi', NULL, 'admin', 10, 1496728111, 1496728111),
(8, NULL, 'huynhtuvinh@gmail.com', 'jsFqb3JaqnP1dTCQtzXRMHu8_S8quKcm', '$2y$13$gg7bhZONwg1/CDZsHqfa1OwnLAtazeijZdahNUqvA8PxNAIkDfMLq', NULL, 'member', 10, 1497341170, 1497341170);

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
(7, 'firstname', 'sc'),
(7, 'lastname', 'ssssssssssssd'),
(7, 'address', ''),
(6, 'firstname', 'rứ'),
(6, 'lastname', 'wsf'),
(6, 'address', ''),
(8, 'firstname', 'Huynh'),
(8, 'lastname', 'Vinh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index-post-status` (`status`),
  ADD KEY `index-post-author` (`author`);

--
-- Indexes for table `post_meta`
--
ALTER TABLE `post_meta`
  ADD KEY `index-post_meta-post_id` (`post_id`),
  ADD KEY `index-post_meta-meta_key` (`meta_key`);

--
-- Indexes for table `post_view`
--
ALTER TABLE `post_view`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qa`
--
ALTER TABLE `qa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD KEY `fk-category_post-post_id` (`post_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_meta`
--
ALTER TABLE `setting_meta`
  ADD KEY `fk-setting_meta-setting_id` (`setting_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `term_meta`
--
ALTER TABLE `term_meta`
  ADD KEY `index-category_meta-category_id` (`term_id`),
  ADD KEY `index-category_meta-meta_key` (`meta_key`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `index-user-status` (`status`),
  ADD KEY `index-user-email` (`email`);

--
-- Indexes for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD KEY `index-user_meta-user_id` (`user_id`),
  ADD KEY `index-user_meta-meta_key` (`meta_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
--
-- AUTO_INCREMENT for table `post_view`
--
ALTER TABLE `post_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `qa`
--
ALTER TABLE `qa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk-post-author` FOREIGN KEY (`author`) REFERENCES `user` (`id`);

--
-- Constraints for table `post_meta`
--
ALTER TABLE `post_meta`
  ADD CONSTRAINT `fk-post_meta-post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `fk-category_post-post_id` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_meta`
--
ALTER TABLE `setting_meta`
  ADD CONSTRAINT `fk-setting_meta-setting_id` FOREIGN KEY (`setting_id`) REFERENCES `setting` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `term_meta`
--
ALTER TABLE `term_meta`
  ADD CONSTRAINT `fk-category_meta-category_id` FOREIGN KEY (`term_id`) REFERENCES `term` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_meta`
--
ALTER TABLE `user_meta`
  ADD CONSTRAINT `fk-user_meta-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
