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
