SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dating`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=222 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `from`, `to`, `message`, `sent`, `recd`) VALUES
(113, 'administrator', 'tessadt2aa', ':)', '2015-05-04 15:54:13', 1),
(114, 'tessadt2aa', 'administrator', 'not get it :(', '2015-05-04 15:54:40', 1),
(115, 'tessadt2aa', 'administrator', 'not get it again :(', '2015-05-04 15:55:27', 1),
(116, 'administrator', 'tessadt2aa', ':)', '2015-05-04 15:59:43', 1),
(117, 'tessadt2aa', 'administrator', 'again :)', '2015-05-04 15:59:49', 1),
(118, 'tessadt2aa', 'administrator', 'again 2 :)', '2015-05-04 16:00:03', 1),
(119, 'administrator', 'tessadt2aa', 'hi :)', '2015-05-05 07:16:13', 1),
(120, 'tessadt2aa', 'administrator', 'ok :)', '2015-05-05 07:16:48', 1),
(121, 'administrator', 'tessadt2aa', 'ok :)', '2015-05-05 07:23:22', 1),
(122, 'tessadt2aa', 'administrator', 'k', '2015-05-05 07:23:47', 1),
(123, 'tessadt2aa', 'administrator', 'h :D', '2015-05-05 07:24:08', 1),
(124, 'tessadt2aa', 'administrator', 'ok :)', '2015-05-05 07:26:54', 1),
(125, 'tessadt2aa', 'administrator', 'h :)', '2015-05-05 07:27:03', 1),
(126, 'tessadt2aa', 'administrator', 'h:)', '2015-05-05 07:29:54', 1),
(127, 'tessadt2aa', 'administrator', 'hahaha', '2015-05-05 07:30:39', 1),
(128, 'tessadt2aa', 'administrator', 'hahaha2 :)', '2015-05-05 07:30:42', 1),
(129, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:31:23', 1),
(130, 'administrator', 'tessadt2aa', 'h:)', '2015-05-05 07:31:28', 1),
(131, 'tessadt2aa', 'administrator', 'h:)', '2015-05-05 07:32:28', 1),
(132, 'tessadt2aa', 'administrator', 'ok', '2015-05-05 07:32:57', 1),
(133, 'administrator', 'tessadt2aa', 'h', '2015-05-05 07:33:13', 1),
(134, 'tessadt2aa', 'administrator', 'a', '2015-05-05 07:34:16', 1),
(135, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:34:25', 1),
(136, 'administrator', 'tessadt2aa', ':)', '2015-05-05 07:34:42', 1),
(137, 'tessadt2aa', 'administrator', 'd:)', '2015-05-05 07:34:47', 1),
(138, 'tessadt2aa', 'administrator', ':D', '2015-05-05 07:35:46', 1),
(139, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:35:52', 1),
(140, 'administrator', 'tessadt2aa', ':)', '2015-05-05 07:36:04', 1),
(141, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:36:53', 1),
(142, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:37:19', 1),
(143, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:37:38', 1),
(144, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:38:09', 1),
(145, 'tessadt2aa', 'administrator', 'hi :)', '2015-05-05 07:39:41', 1),
(146, 'administrator', 'tessadt2aa', ':)', '2015-05-05 07:48:54', 1),
(147, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:49:06', 1),
(148, 'tessadt2aa', 'administrator', ':)', '2015-05-05 07:49:13', 1),
(149, 'administrator', 'tessadt2aa', ':)', '2015-05-05 07:52:02', 1),
(150, 'administrator', 'tessadt2aa', ':D', '2015-05-05 07:52:06', 1),
(151, 'administrator', 'tessadt2aa', ':)', '2015-05-05 07:52:15', 1),
(152, 'administrator', 'tessadt2aa', ':)', '2015-05-05 08:02:23', 1),
(153, 'administrator', 'tessadt2aa', ')', '2015-05-05 08:02:40', 1),
(154, 'administrator', 'tessadt2aa', ':)', '2015-05-05 08:03:25', 1),
(155, 'tessadt2aa', 'administrator', ':)', '2015-05-05 08:03:46', 1),
(156, 'administrator', 'tessadt2aa', 'ss', '2015-05-05 08:04:17', 1),
(157, 'administrator', 'tessadt2aa', ':)', '2015-05-05 08:04:23', 1),
(158, 'administrator', 'tessadt2aa', 'a', '2015-05-05 08:06:03', 1),
(159, 'administrator', 'tessadt2aa', ':)', '2015-05-05 08:06:09', 1),
(160, 'administrator', 'tessadt2aa', 'a', '2015-05-05 08:06:48', 1),
(161, 'administrator', 'tessadt2aa', 'aaa', '2015-05-05 08:06:52', 1),
(162, 'administrator', 'tessadt2aa', 'a', '2015-05-05 08:07:11', 1),
(163, 'administrator', 'tessadt2aa', 'log', '2015-05-05 08:07:24', 1),
(164, 'administrator', 'tessadt2aa', 'a', '2015-05-05 08:08:19', 1),
(165, 'administrator', 'tessadt2aa', 'log', '2015-05-05 08:08:29', 1),
(166, 'administrator', 'tessadt2aa', ':)', '2015-05-05 08:08:32', 1),
(167, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:09:16', 1),
(168, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:09:40', 1),
(169, 'administrator', 'tessadt2aa', 'a', '2015-05-05 08:11:09', 1),
(170, 'administrator', 'tessadt2aa', 'hh', '2015-05-05 08:12:06', 1),
(171, 'administrator', 'tessadt2aa', 'gg', '2015-05-05 08:12:35', 1),
(172, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:12:57', 1),
(173, 'administrator', 'tessadt2aa', 'gg', '2015-05-05 08:13:06', 1),
(174, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:13:22', 1),
(175, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:13:52', 1),
(176, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:16:59', 1),
(177, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:17:03', 1),
(178, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:24:35', 1),
(179, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:24:41', 1),
(180, 'administrator', 'tessadt2aa', 'bb', '2015-05-05 08:24:57', 1),
(181, 'administrator', 'tessadt2aa', 'ss', '2015-05-05 08:25:27', 1),
(182, 'administrator', 'tessadt2aa', 'ff', '2015-05-05 08:25:42', 1),
(183, 'administrator', 'tessadt2aa', 'yy', '2015-05-05 08:25:45', 1),
(184, 'tessadt2aa', 'administrator', 'ok', '2015-05-05 08:27:05', 1),
(185, 'tessadt2aa', 'administrator', 'hi :)', '2015-05-05 08:27:13', 1),
(186, 'administrator', 'tessadt2aa', 'hi :)', '2015-05-05 08:27:19', 1),
(187, 'administrator', 'tessadt2aa', 'hi', '2015-05-05 08:27:45', 1),
(188, 'administrator', 'tessadt2aa', 'hi', '2015-05-05 08:28:13', 1),
(189, 'administrator', 'tessadt2aa', 'hi :)', '2015-05-05 08:28:35', 1),
(190, 'administrator', 'tessadt2aa', 'ok', '2015-05-05 08:29:18', 1),
(191, 'administrator', 'tessadt2aa', 'okdd', '2015-05-05 08:29:22', 1),
(192, 'administrator', 'tessadt2aa', 'hh', '2015-05-05 08:29:54', 1),
(193, 'administrator', 'tessadt2aa', 'yy', '2015-05-05 08:29:56', 1),
(194, 'administrator', 'tessadt2aa', 'gg', '2015-05-05 08:30:48', 1),
(195, 'administrator', 'tessadt2aa', 'yy', '2015-05-05 08:30:53', 1),
(196, 'administrator', 'tessadt2aa', 'f', '2015-05-05 08:31:35', 1),
(197, 'administrator', 'tessadt2aa', 'gg', '2015-05-05 08:31:37', 1),
(198, 'administrator', 'tessadt2aa', 'ff', '2015-05-05 08:32:14', 1),
(199, 'administrator', 'tessadt2aa', 'yy', '2015-05-05 08:32:17', 1),
(200, 'administrator', 'tessadt2aa', 'tt', '2015-05-05 08:32:19', 1),
(201, 'administrator', 'tessadt2aa', 'tt', '2015-05-05 08:32:43', 1),
(202, 'administrator', 'tessadt2aa', 'tt', '2015-05-05 08:32:46', 1),
(203, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:33:44', 1),
(204, 'administrator', 'tessadt2aa', 'f', '2015-05-05 08:33:49', 1),
(205, 'administrator', 'tessadt2aa', 'tt', '2015-05-05 08:34:36', 1),
(206, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:34:55', 1),
(207, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:35:09', 1),
(208, 'administrator', 'tessadt2aa', 'aa', '2015-05-05 08:35:23', 1),
(209, 'administrator', 'tessadt2aa', '99aa', '2015-05-05 08:35:30', 1),
(210, 'administrator', 'tessadt2aa', '9897', '2015-05-05 08:35:36', 1),
(211, 'administrator', 'tessadt2aa', '9897', '2015-05-05 08:35:51', 1),
(212, 'administrator', 'tessadt2aa', ':)', '2015-05-06 12:15:54', 1),
(213, 'administrator', 'tessadt2aa', ':)', '2015-05-06 12:15:58', 1),
(214, 'administrator', 'tessadt2aa', 's:', '2015-05-06 12:15:59', 1),
(215, 'administrator', 'tessadt2aa', 's', '2015-05-06 12:16:15', 1),
(216, 'administrator', 'tessadt2aa', ':)', '2015-05-06 12:16:17', 1),
(217, 'administrator', 'tessadt2aa', ':D', '2015-05-06 12:16:19', 1),
(218, 'administrator', 'tessadt2aa', ':)', '2015-05-06 12:16:21', 1),
(219, 'tessadt2aa', 'administrator', ':)', '2015-05-06 12:16:42', 1),
(220, 'tessadt2aa', 'administrator', ':D', '2015-05-06 12:16:44', 1),
(221, 'tessadt2aa', 'administrator', '-:D', '2015-05-06 12:16:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emotions`
--

CREATE TABLE IF NOT EXISTS `emotions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `emotions`
--

INSERT INTO `emotions` (`id`, `word`, `img`) VALUES
(1, '0:-)', 'angel.gif'),
(2, ':)', 'smile.gif'),
(3, ':(', 'sad.gif'),
(4, ';)', 'wink.gif'),
(5, ':P', 'blum3.gif'),
(6, '8)', 'dirol.gif'),
(7, '@=', 'bomb.gif'),
(8, ':diablo:', 'diablo.gif'),
(9, ':music:', 'music2.gif'),
(10, '*KISSED*', 'air_kiss.gif'),
(11, '*TIRED*', 'boredom.gif'),
(12, '*STOP*', 'stop.gif'),
(13, '*KISSING*', 'kiss_3.gif'),
(14, '*GOOD*', 'good.gif'),
(15, '*DRINK*', 'drinks.gif'),
(16, '*IN_LOVE*', 'man_in_love.gif'),
(17, ':WACKO:', 'wacko.gif'),
(18, '*WASSUP*', 'mamba.gif'),
(19, '*BRAVO*', 'clapping.gif'),
(20, '*ROFL*', 'rofl.gif'),
(21, '*PARDON*', 'pardon.gif'),
(22, '*NO*', 'nea.gif'),
(23, '*LOL*', 'lol.gif'),
(24, '*CRAZY*', 'crazy.gif'),
(25, '*DONT_KNOW*', 'dntknw.gif'),
(26, '*SORRY*', 'sorry2.gif'),
(27, '*YAHOO*', 'yahoo.gif'),
(28, '*DANCE*', 'dance4.gif'),
(29, '*db*', 'pleasantry.gif'),
(30, '*HAPPY*', 'i-m_so_happy.gif'),
(31, '*HELP*', 'help.gif'),
(32, '/m/', 'new_russian.gif'),
(33, '*OK*', 'ok.gif'),
(34, '*ACUTE*', 'acute.gif'),
(35, '*BB*', 'bb.gif'),
(36, '*BYE*', 'bye.gif'),
(37, '*HI*', 'hi.gif'),
(38, '*SCRATCH*', 'scratch_one-s_head.gif'),
(39, '*YES!*', 'yes2.gif'),
(40, '*SMOKE*', 'smoke.gif'),
(41, '*BOSS*', 'big_boss.gif'),
(42, '*SARCASTIC*', 'sarcastic.gif'),
(43, '*BOAST*', 'boast.gif'),
(44, '*HOHO*', 'prankster2.gif'),
(45, '*SHOUT*', 'shout.gif'),
(46, '*VAVA*', 'black_eye.gif'),
(47, '*SEARCH*', 'search.gif'),
(48, '*BEACH*', 'beach.gif'),
(49, '*FOCUS*', 'focus.gif'),
(50, '*HUNTER*', 'hunter.gif'),
(51, '*GIRL_CRY*', 'girl_cray2.gif'),
(52, '*GIRL_CRAZY*', 'girl_crazy.gif'),
(53, '*HOSPITAL*', 'girl_hospital.gif'),
(54, '*GIRL_IN_LOVE*', 'girl_in_love.gif'),
(55, '*PINKGLASSES*', 'girl_pinkglassesf.gif'),
(56, '*HYSTERIC*', 'hysteric.gif'),
(57, '*TENDER*', 'tender.gif'),
(58, '*SPRUSE_UP*', 'spruce_up.gif'),
(59, '*FLIRT*', 'flirt.gif'),
(60, '*GIVE_HEART*', 'give_heart.gif'),
(61, '*CURTSEY*', 'curtsey.gif'),
(62, '*GIRL_DRINK*', 'girl_drink1.gif'),
(63, '*HAHA*', 'girl_haha.gif'),
(64, '*IMPOSSIBLE*', 'girl_impossible.gif'),
(65, '*SIGH*', 'girl_sigh.gif'),
(66, '*MOIL*', 'moil.gif'),
(67, '*YES*', 'yes3.gif'),
(68, '*MEGA_SHOK*', 'swoon2.gif'),
(69, '*THANK*', 'thank_you.gif'),
(70, '*KING*', 'king.gif'),
(71, '*LAZY*', 'lazy.gif'),
(72, '*FRIEND*', 'friends.gif'),
(73, '*PUNISH*', 'punish.gif'),
(74, '*WIZARD*', 'wizard.gif'),
(75, '*V*', 'victory.gif'),
(76, '*SPITEFUL*', 'spiteful.gif'),
(77, '*TEASE*', 'tease.gif'),
(78, '*SCARE*', 'scare.gif'),
(79, '*THIS*', 'this.gif'),
(80, '*PAINT*', 'paint2.gif'),
(81, '*TRAINING*', 'training1.gif'),
(82, '*PARTY*', 'party2.gif'),
(83, '*HELLO*', 'preved.gif'),
(84, '*MAIL*', 'mail1.gif'),
(85, '*WALL*', 'dash1.gif'),
(86, '*VAMPIRE*', 'vampire.gif'),
(87, '*GAMER*', 'gamer4.gif'),
(88, '*POPCORN*', 'popcorm1.gif'),
(89, '*IREFUL*', 'ireful1.gif'),
(90, ':-)', 'smile.gif'),
(91, ':-(', 'sad.gif'),
(92, ';-)', 'wink.gif'),
(93, ':p', 'blum3.gif'),
(94, ':-P', 'blum3.gif'),
(95, '8-)', 'dirol.gif'),
(96, ':-D', 'biggrin.gif'),
(97, ':-[', 'blush2.gif'),
(98, 'o_o', 'shok.gif'),
(99, ':-*', 'kiss2.gif'),
(100, ';-(', 'cray2.gif'),
(101, ':-X', 'secret.gif'),
(102, ':x', 'secret.gif'),
(103, ':-@', 'aggressive.gif'),
(104, ':-|', 'fool.gif'),
(105, ':-/', 'beee.gif'),
(106, '8P', 'mosking.gif'),
(107, ':-!', 'bad.gif'),
(108, '(F)', 'give_rose.gif');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `match`
--

CREATE TABLE IF NOT EXISTS `match` (
  `match_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `matched_user_id` int(11) NOT NULL,
  PRIMARY KEY (`match_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `match`
--

INSERT INTO `match` (`match_id`, `user_id`, `matched_user_id`) VALUES
(1, 3, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_desc` text NOT NULL,
  `page_content` text NOT NULL,
  `page_addtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `page_img` varchar(255) NOT NULL,
  `page_user_id` int(11) NOT NULL,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_url` (`page_url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `page_name`, `page_url`, `page_desc`, `page_content`, `page_addtime`, `page_img`, `page_user_id`) VALUES
(1, 'About Us', 'about', 'About US', 'We are passionate about Dating and Relationship, that\'s why we create this online dating service to offer you the best way to meet people in the easiest way!', '2015-06-14 10:20:08', '', 0),
(2, 'TOS', 'tos', ' Terms of Service', 'Your Terms of Service Here', '2015-06-14 10:20:08', '', 0),
(3, 'Contact Us', 'contact', ' Contact Us', '<p>You can contact us at: <a href="mailto:your-email@your-dating-site.com?subject=Contact Request">your-email@your-dating-site.com</a><br /><br /> Please edit the page through the <em>Admin Panel -> Page</em></p>', '2015-06-14 10:20:08', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=195 ;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `user_id`, `title`, `url`, `priority`) VALUES
(172, 1, 'My house!', 'eb4f-51.jpg', 5),
(173, 1, 'Some flowers', 'ac84-52.jpg', 2),
(176, 1, 'My garden!ff', '7ad8-63.jpg', 6),
(191, 1, '', '295ac-IMG_20131026_001043.jpg', 4),
(188, 1, '', 'e80c1-Screenshot-from-2014-07-27-16-47-22.png', 3),
(192, 1, '', '1c6aa-IMG_20131026_001145.jpg', 1),
(190, 9, '', 'ee5b5-IMG_20131026_001048.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(255) NOT NULL,
  `promo_text` text NOT NULL,
  `service_description` text NOT NULL,
  `header_html_code_injection` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `site_title`, `promo_text`, `service_description`, `header_html_code_injection`) VALUES
(1, 'Online Dating Service', '<div class="center">\r\n<h1 class="pH0">The First "One Day Date Service" - Easy Flirt, Easy Date, Easy Meeting</h1>\r\n<h3 class="pH3">Made in a few minutes ONLY...!</h3>\r\n</div>', '<div class="center">\r\n<p>&nbsp;</p>\r\n        <div class="section-title">\r\n            <h1>How that really Works?</h1>\r\n            <h4>It''s As Simple As That!</h4>\r\n        </div>\r\n        <section class="row features">\r\n            <div class="col-sm-6 col-md-4">\r\n                <div class="thumbnail">\r\n                    <div class="icon-wrap"><i class="fa fa-users"></i></div>\r\n                    <div class="caption">\r\n                        <h4 class="zigzag-lead">Join Thousands of People</h4>\r\n                        <p>Join <a href="http://sofun.co">SoFun</a> and Meet New FUN People (always near from you).</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n            <div class="col-sm-6 col-md-4">\r\n                <div class="thumbnail">\r\n                    <div class="icon-wrap"><i class="fa fa-user-plus"></i></div>\r\n                    <div class="caption">\r\n                        <h4 class="zigzag-lead">Find the best Matcher!</h4>\r\n                        <p>Vote and find the most related person.</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n            <div class="col-sm-6 col-md-4">\r\n                <div class="thumbnail">\r\n                    <div class="icon-wrap"><i class="fa fa-comments"></i></div>\r\n                    <div class="caption">\r\n                        <h4 class="zigzag-lead">Start to Chat and +++</h4>\r\n                        <p>Once your match accepted you, you''ll start a wonderful relationship! You''ll see!!</p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n        </section>\r\n<p>&nbsp;</p>\r\n<h1>Why this Dating Site is so different from the competitors?</h1>\r\n<section>\r\n<p>We has created a new and unique dating generation service that any other websites currently offer</p>\r\n<p>This website wants to propose a dating service simple and really really fast.<br />\r\n That''s mean the you will be able to date someone in a few minutes after the registration and meet him/her today/tonight.<br />\r\n <strong>Exciting that, isn''t it?<strong></p>\r\n</section>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n</div>', '');

-- --------------------------------------------------------

--
-- Table structure for table `site_setting`
--

CREATE TABLE IF NOT EXISTS `site_setting` (
  `site_setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_setting_key` varchar(255) NOT NULL,
  `site_setting_value` text NOT NULL,
  PRIMARY KEY (`site_setting_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `prefer_opposite_sex` tinyint(1) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `sex` enum('male','female') NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=194 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `profile_photo`, `prefer_opposite_sex`, `country`, `state`, `city`, `sex`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$06$5VDhY7WPX4chzWL1Ma1x6.diPNYz2viFZmILZHjQ5eFvaQpozbkc6', '', 'admin@ph2date.com', '1.jpg', 1, 'United Kingdom', 'Greater Manchester', 'Manchester', 'male', '', 'xziQVXT1tn6Yd9rGAFlkFO7eddab62f68e1c5312', 1423081602, NULL, 1268889823, 1430914821, 1, 'Admin', 'istrator', '0'),
(4, '94.118.46.64', 'goldendog410', '$2y$08$2nwNWcGO.KnowjRev7P.WOE1ocuqUefNdEcUQzAES8PBHuS4w0cLW', NULL, 'jennie.watson84@example.com', '61.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106263, 1413106263, 1, 'jennie', 'watson', '(331)-816-8912'),
(5, '94.118.46.64', 'biggoose556', '$2y$08$TflHXBahfMr4chTBOh3oqOfWNheKjocpSZqVsfBAcO/17ja0N1WSu', NULL, 'loretta.hunt65@example.com', '8.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106263, 1413106263, 1, 'loretta', 'hunt', '(363)-113-5787'),
(6, '94.118.46.64', 'silverlion211', '$2y$08$JENp7CX108PeXPdmcyyNh.PokdbrQ/d87n0pWbJfOv1cW.qVky3zS', NULL, 'raymond.morrison12@example.com', '85.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106264, 1413106264, 1, 'raymond', 'morrison', '(722)-796-7033'),
(7, '94.118.46.64', 'crazytiger966', '$2y$08$iw0h9.STAvROcI0pDuDia.D9ONupVlJpYMEpJfCNGL/X0DRBGpgDy', NULL, 'gregory.brooks29@example.com', '42.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106264, 1413106264, 1, 'gregory', 'brooks', '(518)-727-9612'),
(8, '94.118.46.64', 'whiteostrich676', '$2y$08$qzpGMV6UPO.BNOAFtrbzF.ZTU85TyFk8c0oxk2TufUcXbsvlF7C6y', NULL, 'kenzi.fletcher58@example.com', '50.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106265, 1413106265, 1, 'kenzi', 'fletcher', '(532)-870-1051'),
(9, '94.118.46.64', 'blackrabbit697', '$2y$08$5k.5LSu.4vYN2g20OOX78uAqsnFVCU2vrGZCBIwgJRyX7B5uA5IcK', NULL, 'lester.wade85@example.com', '70.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106265, 1413106265, 1, 'lester', 'wade', '(967)-682-5052'),
(10, '94.118.46.64', 'redbutterfly507', '$2y$08$D2wZVR5I4GISaUCQncUQPe49IPjW9GSP1V2Q.SsDdMwae4iLtA2HO', NULL, 'ethan.walker27@example.com', '52.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106265, 1413106265, 1, 'ethan', 'walker', '(781)-401-5176'),
(11, '94.118.46.64', 'smallwolf276', '$2y$08$0gMy.lnNx/dEPbtlQGQOdudQTA9d08vFNuFgorJtBWmHVbL3Tfc/y', NULL, 'ron.robinson95@example.com', '47.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106266, 1413106266, 1, 'ron', 'robinson', '(932)-974-4600'),
(12, '94.118.46.64', 'redtiger117', '$2y$08$kSThoNpzVVRHz7lUlOWnCedNamGJsGdYshSyiNkyNL7Lx4302UmO2', NULL, 'jamie.taylor85@example.com', '54.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106266, 1413106266, 1, 'jamie', 'taylor', '(750)-690-5786'),
(13, '94.118.46.64', 'beautifulostrich857', '$2y$08$hkGyP7vvtbV9ra9I0g0jS.8X/2glIztE7JgRxSHkMgyWB6zQbswP6', NULL, 'paula.vargas33@example.com', '0.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106266, 1413106266, 1, 'paula', 'vargas', '(160)-104-6805'),
(14, '94.118.46.64', 'heavysnake604', '$2y$08$03kE/YKzI07v6E8AGRu7AuuPBNxhNI75/W1yKJr5NHYaOUzsW7C3i', NULL, 'danielle.king59@example.com', '76.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106267, 1413106267, 1, 'danielle', 'king', '(156)-688-7986'),
(15, '94.118.46.64', 'heavyelephant403', '$2y$08$7MrVZltRLjiXJLrAlBLq0.YR45PXSVD2tcc.Mo3HlGVChVYzu3Rsu', NULL, 'priscilla.graham89@example.com', '94.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106267, 1413106267, 1, 'priscilla', 'graham', '(669)-791-1088'),
(16, '94.118.46.64', 'purplecat768', '$2y$08$y4eetTmaKPwrhY2FuFU/V.mj.vznDY2Rxv6VmBDUm06GmluRJ4Gpa', NULL, 'shelly.holland26@example.com', '75.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106268, 1413106268, 1, 'shelly', 'holland', '(697)-574-8815'),
(17, '94.118.46.64', 'orangesnake726', '$2y$08$tvjjVuGJhBZRlKPVSahjKO4nvtfRwRE03FmLp4Zq5oWp7PJLY7sUm', NULL, 'ken.riley32@example.com', '84.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106268, 1413106268, 1, 'ken', 'riley', '(174)-314-5596'),
(18, '94.118.46.64', 'purpleswan742', '$2y$08$dHHLrWfyQdI4omFwsQmB.ekC3RtBon.n7HYABiGd4PZLrz8CV9d9e', NULL, 'sara.fox75@example.com', '82.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106268, 1413106268, 1, 'sara', 'fox', '(784)-510-7939'),
(19, '94.118.46.64', 'goldenpeacock657', '$2y$08$eSJneQUsMfe/mHFZp/fZCewNHeKVwa6pyj9pOebXsQon2NKMqIRXi', NULL, 'dianne.williamson78@example.com', '73.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106269, 1413106269, 1, 'dianne', 'williamson', '(732)-759-6309'),
(20, '94.118.46.64', 'beautifulswan899', '$2y$08$wub4LAVNx3JNLkyaAJIrI.Mg13eAWexlE0tm7ZilI3YO/n7M70Mj6', NULL, 'benjamin.diaz17@example.com', '49.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106269, 1413106269, 1, 'benjamin', 'diaz', '(993)-734-5398'),
(21, '94.118.46.64', 'crazyladybug782', '$2y$08$pDp71oLuEEQMrygZscb8ruSPKHk8.XZzi9IPRnpNUWGILcmORf7ae', NULL, 'karl.elliott56@example.com', '59.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106269, 1413106269, 1, 'karl', 'elliott', '(482)-914-3263'),
(22, '94.118.46.64', 'beautifulsnake327', '$2y$08$LGzTb1fYrfpebP3mUiHucOoIP.5FO4SQNjkBahUUyXfbZOaOZub.m', NULL, 'salvador.jensen11@example.com', '24.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106270, 1413106270, 1, 'salvador', 'jensen', '(822)-454-7418'),
(23, '94.118.46.64', 'biglion952', '$2y$08$KFgJYdz2F7udmngYXXcMWuzvbIxkIjzofHOoP8v0XGO539kTdIUMG', NULL, 'paula.lawson81@example.com', '19.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106270, 1413106270, 1, 'paula', 'lawson', '(932)-584-4186'),
(24, '94.118.46.64', 'bigfrog943', '$2y$08$P4JXeAKRuBlkKWCoCVOj5udo8SCpo4D51mF8VJ81S8jF9swJE9Uu2', NULL, 'kurt.gutierrez33@example.com', '5.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106271, 1413106271, 1, 'kurt', 'gutierrez', '(769)-134-3000'),
(25, '94.118.46.64', 'lazyostrich9', '$2y$08$7xYZKgKtNXHA9TuvVIMVoO2rFGiGXK9QoPFzskSXe8vX8v7RdBRie', NULL, 'lena.burke97@example.com', '11.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106271, 1413106271, 1, 'lena', 'burke', '(684)-262-8569'),
(26, '94.118.46.64', 'purplefrog98', '$2y$08$fWZ0JquSBnhg0vpWC8Mbd.Xk4xE7vU7tTfmveAsMEdSzCtENMzOQK', NULL, 'ethan.sanchez23@example.com', '6.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106271, 1413106271, 1, 'ethan', 'sanchez', '(661)-457-3938'),
(27, '94.118.46.64', 'blackleopard74', '$2y$08$9KTQd1niaDN21J3Ua8mRUOHXopBaM3kMMoZquSvyH1wG9MtcRmj4C', NULL, 'clarence.rivera51@example.com', '80.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106272, 1413106272, 1, 'clarence', 'rivera', '(707)-864-6970'),
(28, '94.118.46.64', 'heavybird335', '$2y$08$eujbhIeQXUHOLJ/5tDXnyec.KG4cfA7P/uwRifimK4xeYhF2ov6Sq', NULL, 'catherine.mitchell45@example.com', '39.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106272, 1413106272, 1, 'catherine', 'mitchell', '(664)-285-1053'),
(29, '94.118.46.64', 'smallbear835', '$2y$08$e0U1bDTEgVsKqVya522V2ekKT3/S10.Hwt9ey0itv7rUMhq4A6PxK', NULL, 'virgil.graves49@example.com', '13.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106273, 1413106273, 1, 'virgil', 'graves', '(297)-471-3682'),
(30, '94.118.46.64', 'yellowfish252', '$2y$08$TdjKEVgoTvU1Im1GsdD.4.1QWr9PviyQqtzHVjtR6ppvJfXi4khKe', NULL, 'kenzi.jordan55@example.com', '28.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106273, 1413106273, 1, 'kenzi', 'jordan', '(983)-615-7298'),
(31, '94.118.46.64', 'smallgoose317', '$2y$08$960zZnsgNF8abeLroPat8e/E8cAJk6Gesft.5Ai1PLfRQ3GCKFIAC', NULL, 'jamie.collins49@example.com', '37.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106273, 1413106273, 1, 'jamie', 'collins', '(466)-144-3351'),
(32, '94.118.46.64', 'brownbear106', '$2y$08$3MbKV5eZ9q4TFKVGCeHN2.pYW.bamwBbI5YmIdCMrO6svum0NpkkW', NULL, 'juan.hernandez44@example.com', '2.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106274, 1413106274, 1, 'juan', 'hernandez', '(143)-866-9438'),
(33, '94.118.46.64', 'goldengoose1', '$2y$08$jVJGwB/cec.q4kWaJ7y2z.7CPiQx2qcGayhqQ1f1asoCGIkdiSzaC', NULL, 'don.clark98@example.com', '71.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106274, 1413106274, 1, 'don', 'clark', '(400)-589-3988'),
(34, '94.118.46.64', 'lazytiger361', '$2y$08$47QNXe7QKomUnV76L0ZU3enkDst56pcqaxawaK0ORGHBT244kB3hO', NULL, 'deanna.frazier43@example.com', '86.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106275, 1413106275, 1, 'deanna', 'frazier', '(741)-561-3277'),
(35, '94.118.46.64', 'purplefish323', '$2y$08$8ufGa28I8SkvVlODdpyLXOkZefidPp5YBUx7/8oqsGadsiW1qFMhW', NULL, 'gordon.sanchez83@example.com', '53.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106275, 1413106275, 1, 'gordon', 'sanchez', '(783)-557-1388'),
(36, '94.118.46.64', 'smalltiger124', '$2y$08$2gwYjfY0XTy7M5ftrD7pnOUBu7xmbtq8qz.PJDu6M3LZrJZipyhrG', NULL, 'patsy.hall70@example.com', '38.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106275, 1413106275, 1, 'patsy', 'hall', '(671)-516-3241'),
(37, '94.118.46.64', 'ticklishpeacock340', '$2y$08$uZQIjZe4TSmDML/9rzSFv.N6eMFuH.mvcWThDg0H8GI1Teu0aegJq', NULL, 'terrence.washington94@example.com', '11.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106276, 1413106276, 1, 'terrence', 'washington', '(609)-237-3305'),
(38, '94.118.46.64', 'greengorilla305', '$2y$08$lukIihNsLrafaHQvnEDdy.wTqaVY.3zRNxXZsuMlqAy.ZrtFIgTkK', NULL, 'heidi.parker97@example.com', '52.jpg', 0, 'United Kingdom', '', '', 'female', NULL, NULL, NULL, NULL, 1413106277, 1413106277, 1, 'heidi', 'parker', '(876)-328-9062'),
(39, '94.118.46.64', 'crazyelephant371', '$2y$08$n76OtzUcs8o7TVi7lPJdhe7FO/ig..SUXylxhbQMQkxDshHh9Z24m', NULL, 'louis.banks26@example.com', '82.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106277, 1413106277, 1, 'louis', 'banks', '(512)-499-7143'),
(40, '94.118.46.64', 'blueleopard550', '$2y$08$Ix.1r2QRFoQnTQHKKA.rDODKpnj9DtMk5e5BVPEO9Icgsa8T1IiuW', NULL, 'leo.alvarez76@example.com', '64.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106278, 1413106278, 1, 'leo', 'alvarez', '(481)-201-5398'),
(41, '94.118.46.64', 'bluefrog365', '$2y$08$jzBKi27/384BWHw0nGgV7.8JWhaajWPVT1bco3SjxBFGC1C0zqQI6', NULL, 'manuel.fleming94@example.com', '99.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106278, 1413106278, 1, 'manuel', 'fleming', '(648)-738-3778'),
(42, '94.118.46.64', 'brownbird981', '$2y$08$UIKQpS36LYxj2KSRr6WURu4rUi8jo2cB4KqvvTIoIVyOp72Vg0d2.', NULL, 'bobby.wilson79@example.com', '5.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106281, 1413106281, 1, 'bobby', 'wilson', '(375)-325-5244'),
(43, '94.118.46.64', 'yellowostrich358', '$2y$08$JS25TYX9NG.0IxolHOKiJ.4BSJL5N9B/OX/95x8kTek1fLXkRKvaG', NULL, 'enrique.young98@example.com', '71.jpg', 0, 'United Kingdom', '', '', 'male', NULL, NULL, NULL, NULL, 1413106282, 1413106282, 1, 'enrique', 'young', '(625)-987-9963');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=192 ;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 8, 2),
(10, 9, 2),
(11, 10, 2),
(12, 11, 2),
(13, 12, 2),
(14, 13, 2),
(15, 14, 2),
(16, 15, 2),
(17, 16, 2),
(18, 17, 2),
(19, 18, 2),
(20, 19, 2),
(21, 20, 2),
(22, 21, 2),
(23, 22, 2),
(24, 23, 2),
(25, 24, 2),
(26, 25, 2),
(27, 26, 2),
(28, 27, 2),
(29, 28, 2),
(30, 29, 2),
(31, 30, 2),
(32, 31, 2),
(33, 32, 2),
(34, 33, 2),
(35, 34, 2),
(36, 35, 2),
(37, 36, 2),
(38, 37, 2),
(39, 38, 2),
(40, 39, 2),
(41, 40, 2),
(42, 41, 2),
(43, 42, 2),
(44, 43, 2),
(45, 44, 2),
(46, 45, 2),
(47, 46, 2),
(48, 47, 2),
(49, 48, 2),
(50, 49, 2),
(51, 50, 2),
(52, 51, 2),
(53, 52, 2),
(54, 53, 2),
(55, 54, 2),
(56, 55, 2),
(57, 56, 2),
(58, 57, 2),
(59, 58, 2),
(60, 59, 2),
(61, 60, 2),
(62, 61, 2),
(63, 62, 2),
(64, 63, 2),
(65, 64, 2),
(66, 65, 2),
(67, 66, 2),
(68, 67, 2),
(69, 68, 2),
(70, 69, 2),
(71, 70, 2),
(72, 71, 2),
(73, 72, 2),
(74, 73, 2),
(75, 74, 2),
(76, 75, 2),
(77, 76, 2),
(78, 77, 2),
(79, 78, 2),
(80, 79, 2),
(81, 80, 2),
(82, 81, 2),
(83, 82, 2),
(84, 83, 2),
(85, 84, 2),
(86, 85, 2),
(87, 86, 2),
(88, 87, 2),
(89, 88, 2),
(90, 89, 2),
(91, 90, 2),
(92, 91, 2),
(93, 92, 2),
(94, 93, 2),
(95, 94, 2),
(96, 95, 2),
(97, 96, 2),
(98, 97, 2),
(99, 98, 2),
(100, 99, 2),
(101, 100, 2),
(102, 101, 2),
(103, 102, 2),
(104, 103, 2),
(105, 104, 2),
(106, 105, 2),
(107, 106, 2),
(108, 107, 2),
(109, 108, 2),
(110, 109, 2),
(111, 110, 2),
(112, 111, 2),
(113, 112, 2),
(114, 113, 2),
(115, 114, 2),
(116, 115, 2),
(117, 116, 2),
(118, 117, 2),
(119, 118, 2),
(120, 119, 2),
(121, 120, 2),
(122, 121, 2),
(123, 122, 2),
(124, 123, 2),
(125, 124, 2),
(126, 125, 2),
(127, 126, 2),
(128, 127, 2),
(129, 128, 2),
(130, 129, 2),
(131, 130, 2),
(132, 131, 2),
(133, 132, 2),
(134, 133, 2),
(135, 134, 2),
(136, 135, 2),
(137, 136, 2),
(138, 137, 2),
(139, 138, 2),
(140, 139, 2),
(141, 140, 2),
(142, 141, 2),
(143, 142, 2),
(144, 143, 2),
(145, 144, 2),
(146, 145, 2),
(147, 146, 2),
(148, 147, 2),
(149, 148, 2),
(150, 149, 2),
(151, 150, 2),
(152, 151, 2),
(153, 152, 2),
(154, 153, 2),
(155, 154, 2),
(156, 155, 2),
(157, 156, 2),
(158, 157, 2),
(159, 158, 2),
(160, 159, 2),
(161, 160, 2),
(162, 161, 2),
(163, 162, 2),
(164, 163, 2),
(165, 164, 2),
(166, 165, 2),
(167, 166, 2),
(168, 167, 2),
(169, 168, 2),
(170, 169, 2),
(171, 170, 2),
(172, 171, 2),
(173, 172, 2),
(174, 173, 2),
(175, 174, 2),
(176, 175, 2),
(177, 176, 2),
(178, 177, 2),
(179, 178, 2),
(180, 179, 2),
(181, 180, 2),
(182, 181, 2),
(183, 182, 2),
(184, 183, 2),
(185, 184, 2),
(186, 185, 2),
(187, 186, 2),
(188, 187, 2),
(189, 188, 2),
(190, 189, 2),
(191, 190, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_likes`
--

CREATE TABLE IF NOT EXISTS `user_likes` (
  `user_likes_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `liked_user_id` int(11) NOT NULL,
  `operation` enum('like','pass') NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_likes_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `user_likes`
--

INSERT INTO `user_likes` (`user_likes_id`, `user_id`, `liked_user_id`, `operation`, `time`) VALUES
(1, 3, 1, 'like', '2014-09-22 17:48:24'),
(2, 1, 3, 'like', '2014-09-23 16:53:39'),
(3, 1, 4, 'pass', '2014-09-24 07:41:52'),
(4, 1, 7, 'like', '2014-09-24 07:41:55'),
(5, 1, 57, 'like', '2014-09-24 09:10:41'),
(6, 1, 58, 'pass', '2014-09-24 09:10:53'),
(7, 1, 61, 'like', '2014-09-25 02:38:15'),
(8, 1, 63, 'pass', '2014-09-25 02:38:17'),
(9, 184, 144, 'pass', '2014-10-14 13:24:12'),
(10, 184, 145, 'like', '2014-10-14 13:24:19'),
(11, 184, 146, 'pass', '2014-10-14 13:24:22'),
(12, 184, 147, 'pass', '2014-10-14 13:24:54'),
(13, 184, 148, 'like', '2014-10-14 13:25:06'),
(14, 184, 149, 'like', '2014-10-14 13:25:14'),
(15, 184, 150, 'like', '2014-10-14 13:25:20'),
(16, 186, 144, 'pass', '2014-11-08 21:18:35'),
(17, 186, 145, 'like', '2014-11-08 21:18:38'),
(18, 186, 146, 'like', '2014-11-08 21:18:41'),
(19, 186, 147, 'like', '2014-11-08 21:18:55'),
(20, 186, 148, 'like', '2014-11-08 21:20:21'),
(21, 1, 66, 'like', '2015-01-24 11:38:13'),
(22, 1, 68, 'like', '2015-02-04 20:17:17'),
(23, 1, 69, 'pass', '2015-02-04 20:17:20'),
(24, 1, 73, 'pass', '2015-02-04 20:17:25'),
(25, 1, 83, 'pass', '2015-02-04 20:17:27'),
(26, 1, 84, 'pass', '2015-02-04 20:18:49'),
(27, 1, 85, 'pass', '2015-02-04 20:18:51'),
(28, 1, 86, 'like', '2015-02-04 20:18:52'),
(29, 1, 88, 'like', '2015-02-04 20:18:54'),
(30, 1, 91, 'pass', '2015-02-04 20:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `video_name` varchar(250) NOT NULL,
  `video_file` varchar(250) DEFAULT NULL,
  `video_desc` text NOT NULL,
  `video_img` varchar(255) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `converted` tinyint(1) NOT NULL DEFAULT '0',
  `converted_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
