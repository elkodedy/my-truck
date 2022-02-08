-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2021 at 10:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_coreweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_corebase_crud`
--

CREATE TABLE `tbl_corebase_crud` (
  `corebase_crud_id` int(11) NOT NULL,
  `corebase_crud_name` varchar(100) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_corebase_crud`
--

INSERT INTO `tbl_corebase_crud` (`corebase_crud_id`, `corebase_crud_name`, `createtime`) VALUES
(1, 'data 1', '2021-02-05 11:28:32'),
(2, 'data 2', '2021-02-05 11:28:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`group_id`, `group_name`, `createtime`) VALUES
(1, 'Administrator', '2021-02-02 19:26:11'),
(2, 'Inputer Berita', '2021-02-05 14:03:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `log_id` int(11) NOT NULL,
  `log_time` datetime NOT NULL,
  `log_message` varchar(200) NOT NULL,
  `log_ipaddress` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_appname` varchar(100) NOT NULL,
  `setting_short_appname` varchar(10) NOT NULL,
  `setting_origin_app` varchar(100) NOT NULL,
  `setting_owner_name` varchar(100) NOT NULL,
  `setting_phone` varchar(30) NOT NULL,
  `setting_email` varchar(100) NOT NULL,
  `setting_address` text NOT NULL,
  `setting_logo` varchar(50) NOT NULL,
  `setting_background` varchar(50) NOT NULL,
  `setting_color` varchar(30) NOT NULL,
  `setting_layout` varchar(20) NOT NULL,
  `setting_apikey_map` text NOT NULL,
  `setting_apikey_firebase` text NOT NULL,
  `setting_running_text` text NOT NULL,
  `setting_about` text NOT NULL,
  `setting_coordinate` text NOT NULL,
  `setting_instagram` text NOT NULL,
  `setting_facebook` text NOT NULL,
  `setting_youtube` text NOT NULL,
  `setting_twitter` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`setting_id`, `setting_appname`, `setting_short_appname`, `setting_origin_app`, `setting_owner_name`, `setting_phone`, `setting_email`, `setting_address`, `setting_logo`, `setting_background`, `setting_color`, `setting_layout`, `setting_apikey_map`, `setting_apikey_firebase`, `setting_running_text`, `setting_about`, `setting_coordinate`, `setting_instagram`, `setting_facebook`, `setting_youtube`, `setting_twitter`, `createtime`) VALUES
(1, 'Core Website TS', 'COREWEB TS', 'Kendari', 'Tehnos Studio Office', '+6281234567890', 'technos-studio@gmail.com', 'Jl. Supu Yusuf No.9', 'base-logo120210610081031.png', 'base-background120210610080736.jpg', 'skin-purple', 'default', 'AIzaSyC8aB4MpC1orBp300KQQAiVEnWdpry4OPg', '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '-3.973438605292762, 122.5218264386339', 'https://www.instagram.com/', 'https://m.facebook.com/', 'https://www.youtube.com/', 'https://twitter.com/', '2021-02-02 13:29:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_lastlogin` datetime NOT NULL,
  `group_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_password`, `user_fullname`, `user_photo`, `user_email`, `user_lastlogin`, `group_id`, `createtime`) VALUES
(1, 'administrator', '$2y$10$6ELmhIbfosdPtGcQReBXbuMevkFPXZTJUi4au9oh4mxx1iF90tqyy', 'Administrator Coreweb', '', 'fadlinarsin12@gmail.com', '2021-02-02 19:40:31', 1, '2021-02-02 19:40:31'),
(2, 'inputer', '$2y$10$F90X8MJyYPfpPzZyu4n0X.yia6vhyTebdi9rOQqyjvTjAXyY4v.92', 'Inputer PTSP', '', 'inputer@gmail.com', '0000-00-00 00:00:00', 2, '2021-02-05 13:59:47'),
(3, 'tegar', '$2y$10$H2cWm3e446fCZCS.u5BpSuwlEFTd4GldERyrY5nGMOxzOHMcT2GU2', 'Tegar', '', 'tegararyu@gmail.com', '0000-00-00 00:00:00', 1, '2021-04-23 11:08:04'),
(5, 'alief', '$2y$10$hnODZcu0JpcYYGs5.VAmDu/KquZZ8nrS7Aewo06/U5s/sY87j8PHe', 'Alief Agung Nugraha', '', 'idgamers79@gmail.com', '0000-00-00 00:00:00', 1, '2021-04-23 11:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_content`
--

CREATE TABLE `tbl_web_content` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(30) NOT NULL,
  `content_text` text NOT NULL,
  `content_image` varchar(50) NOT NULL,
  `content_menu` varchar(30) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_content`
--

INSERT INTO `tbl_web_content` (`content_id`, `content_title`, `content_text`, `content_image`, `content_menu`, `createtime`) VALUES
(1, 'Sejarah', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 'sejarah', '2021-06-10 09:24:13'),
(2, 'Sambutan Kepala Dinas', '<p dir=\"ltr\" style=\"text-align:justify\">Assalamu&rsquo;Alaikum,Wr.Wb</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp; Kepala. Dinas X</p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <strong>KEPALA DINAS</strong></p>\r\n\r\n<p dir=\"ltr\" style=\"text-align:right\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jabatan</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NIP. 000000000000</p>\r\n', 'content-20210610164323.png', 'sambutan', '2021-06-11 01:13:05'),
(3, 'Tupoksi Dinas', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 'tupoksi', '2021-06-10 09:26:58'),
(4, 'Visi Misi', '<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>VISI</strong></span></p>\r\n\r\n<p style=\"text-align:justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p style=\"text-align:center\"><span style=\"font-size:20px\"><strong>MISI</strong></span></p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 'visi', '2021-06-10 09:24:37'),
(5, 'Maklumat Pelayanan', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '', 'maklumat', '2021-06-10 09:27:08'),
(6, 'Struktur Organisasi', '<p>-</p>\r\n', 'content-20210611091905.png', 'struktur', '2021-06-11 09:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_faq`
--

CREATE TABLE `tbl_web_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_question` text NOT NULL,
  `faq_answer` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_faq`
--

INSERT INTO `tbl_web_faq` (`faq_id`, `faq_question`, `faq_answer`, `createtime`) VALUES
(2, 'Dimana Lokasi Techno\'s Studio ?', 'Anda bisa mencari lokasi kantor kami di google maps dengan keyword \"Techno\'s Studio\", atau mengunjungi kami di Jl. Supu Yusuf No.9', '2021-06-12 06:20:36'),
(3, 'Berapa anggota dari Techno\'s Studio ?', 'Kantor kami beranggotakan kurang lebih 15-17 Orang', '2021-06-12 06:21:26'),
(4, 'Apa saja layanan yang disediakan oleh Techno\'s Studio ?', 'Kami menyediakan jasa konsultasi dan pembuatan aplikasi berbasis web, desktop hingga android', '2021-06-12 06:22:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_field`
--

CREATE TABLE `tbl_web_field` (
  `field_id` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_field`
--

INSERT INTO `tbl_web_field` (`field_id`, `field_name`, `createtime`) VALUES
(1, 'Semua', '2021-03-02 16:01:40'),
(2, 'Kepala Dinas', '2021-03-02 16:02:04'),
(3, 'Sekretariat', '2021-03-02 16:02:23'),
(4, 'Bidang Publikasi', '2021-03-02 16:02:42'),
(5, 'Bidang Bendahara', '2021-03-02 16:02:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_gallery`
--

CREATE TABLE `tbl_web_gallery` (
  `gallery_id` int(11) NOT NULL,
  `gallery_name` varchar(200) NOT NULL,
  `gallery_cover` text NOT NULL,
  `gallery_url` text DEFAULT NULL,
  `gallery_description` text NOT NULL,
  `gallery_date` date NOT NULL,
  `gallery_type` varchar(10) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_gallery`
--

INSERT INTO `tbl_web_gallery` (`gallery_id`, `gallery_name`, `gallery_cover`, `gallery_url`, `gallery_description`, `gallery_date`, `gallery_type`, `createtime`) VALUES
(1, 'Kegiatan X 2021', 'gallery-20210610175925.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.', '2021-06-01', 'photo', '2021-06-10 17:59:25'),
(2, 'Kegiatan Y 2021', 'gallery-20210610175946.png', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.', '2021-06-03', 'photo', '2021-06-10 17:59:46'),
(4, 'Pameran X', 'video-20210610183617.mp4', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.', '2021-06-15', 'video', '2021-06-10 18:36:17'),
(8, 'Pameran Y', '', 'https://www.youtube.com/embed/iM-BVd2Wzrw', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', '2021-06-10', 'video', '2021-06-10 21:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_gallery_photo`
--

CREATE TABLE `tbl_web_gallery_photo` (
  `gallery_photo_id` int(11) NOT NULL,
  `gallery_photo_name` varchar(200) NOT NULL,
  `gallery_photo_token` varchar(100) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_gallery_photo`
--

INSERT INTO `tbl_web_gallery_photo` (`gallery_photo_id`, `gallery_photo_name`, `gallery_photo_token`, `gallery_id`, `createtime`) VALUES
(19, 'photo-2-20210611190214-8120.png', 'token-20210611190205-0.2128556498343348', 2, '2021-06-11 19:02:14'),
(20, 'photo-1-20210611190252-1850.png', 'token-20210611190247-0.7843863151726149', 1, '2021-06-11 19:02:52'),
(21, 'photo-2-20210611190716-6055.png', 'token-20210611190712-0.6079270910029597', 2, '2021-06-11 19:07:16'),
(22, 'photo-2-20210611190722-2313.png', 'token-20210611190719-0.4930588848195715', 2, '2021-06-11 19:07:22'),
(23, 'photo-2-20210611190725-8204.png', 'token-20210611190719-0.6381562621644137', 2, '2021-06-11 19:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_link`
--

CREATE TABLE `tbl_web_link` (
  `link_id` int(11) NOT NULL,
  `link_name` varchar(50) NOT NULL,
  `link_url` text NOT NULL,
  `link_image` text NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_link`
--

INSERT INTO `tbl_web_link` (`link_id`, `link_name`, `link_url`, `link_image`, `createtime`) VALUES
(1, 'Link A', 'http://www.sultraprov.go.id/', 'link-20210610163800.png', '2021-06-10 16:38:00'),
(2, 'Link B', 'http://www.sultraprov.go.id/', 'link-20210610163939.png', '2021-06-10 16:39:39'),
(3, 'Link C', 'http://www.sultraprov.go.id/', 'link-20210610163951.png', '2021-06-10 16:39:51'),
(4, 'Link D', 'http://www.sultraprov.go.id/', 'link-20210610164004.png', '2021-06-10 16:40:04'),
(5, 'Link E', 'http://www.sultraprov.go.id/', 'link-20210610164025.png', '2021-06-10 16:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_message`
--

CREATE TABLE `tbl_web_message` (
  `message_id` int(11) NOT NULL,
  `message_name` varchar(100) NOT NULL,
  `message_phone` varchar(20) NOT NULL,
  `message_email` varchar(100) NOT NULL,
  `message_subject` varchar(100) NOT NULL,
  `message_text` text NOT NULL,
  `message_reply` text NOT NULL,
  `message_code` varchar(50) NOT NULL,
  `message_status` int(11) NOT NULL,
  `message_date` date NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_message`
--

INSERT INTO `tbl_web_message` (`message_id`, `message_name`, `message_phone`, `message_email`, `message_subject`, `message_text`, `message_reply`, `message_code`, `message_status`, `message_date`, `createtime`) VALUES
(1, 'Indrawijaya Latif', '081234567890', 'indra027@gmail.com', 'Permintaan Data', 'Bolehkah saya meminta data mengenai produk Hukum A ?', 'Silahkan datang ke kantor kami untuk mengambil data produk Hukum A, Terimakasih', 'M-20210612085700', 1, '2021-06-12', '2021-06-12 08:57:00'),
(2, 'Indrawijaya Latif', '081234567890', 'indra027@gmail.com', 'Permintaan Data', 'Bolehkah saya meminta data mengenai produk Hukum B ?', 'Silhakan datang ke kantor', 'M-20210612085804', 1, '2021-06-12', '2021-06-12 08:58:04'),
(3, 'Indrawijaya Latif', '081234567890', 'indra027@gmail.com', 'Permintaan Data', 'OY minta', '', 'M-20210612183658', 0, '2021-06-12', '2021-06-12 18:36:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_news`
--

CREATE TABLE `tbl_web_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_cover` varchar(50) NOT NULL,
  `news_text` text NOT NULL,
  `news_date` date NOT NULL,
  `news_count_view` int(11) NOT NULL,
  `news_slug` text NOT NULL,
  `news_category_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_news`
--

INSERT INTO `tbl_web_news` (`news_id`, `news_title`, `news_cover`, `news_text`, `news_date`, `news_count_view`, `news_slug`, `news_category_id`, `field_id`, `user_id`, `createtime`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'thumbnailnews-20210611083510.png', '<div id=\"li-text\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.</p>\r\n\r\n<p>Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt eget. Leo a diam sollicitudin tempor id. A lacus vestibulum sed arcu non odio euismod lacinia. In tellus integer feugiat scelerisque. Feugiat in fermentum posuere urna nec tincidunt praesent. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Et malesuada fames ac turpis egestas sed. Sit amet nisl suscipit adipiscing bibendum est ultricies. Arcu ac tortor dignissim convallis aenean et tortor at. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Eros donec ac odio tempor orci dapibus ultrices. Elementum nibh tellus molestie nunc. Et magnis dis parturient montes nascetur. Est placerat in egestas erat imperdiet. Consequat interdum varius sit amet mattis vulputate enim.</p>\r\n\r\n<p>Sit amet nulla facilisi morbi tempus. Nulla facilisi cras fermentum odio eu. Etiam erat velit scelerisque in dictum non consectetur a erat. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ut sem nulla pharetra diam. Fames ac turpis egestas maecenas. Bibendum neque egestas congue quisque egestas diam. Laoreet id donec ultrices tincidunt arcu non sodales neque. Eget felis eget nunc lobortis mattis aliquam faucibus purus. Faucibus interdum posuere lorem ipsum dolor sit.</p>\r\n</div>\r\n', '2021-06-10', 6, 'lorem-ipsum-dolor-sit-amet-consectetur-adipiscing-elit-sed-do-eiusmod-tempor-incididunt-ut-labore-et-dolore-magna-aliqua', 1, 2, 1, '2021-06-10 13:07:48'),
(2, 'Di Rutan Raha, Kadivmin Tekankan Pentingnya Akuntabilitas Dalam Pengelolaan Keuangan dan BMN', 'thumbnailnews-20210611083436.png', '<p>Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt eget. Leo a diam sollicitudin tempor id. A lacus vestibulum sed arcu non odio euismod lacinia. In tellus integer feugiat scelerisque. Feugiat in fermentum posuere urna nec tincidunt praesent. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Et malesuada fames ac turpis egestas sed. Sit amet nisl suscipit adipiscing bibendum est ultricies. Arcu ac tortor dignissim convallis aenean et tortor at. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Eros donec ac odio tempor orci dapibus ultrices. Elementum nibh tellus molestie nunc. Et magnis dis parturient montes nascetur. Est placerat in egestas erat imperdiet. Consequat interdum varius sit amet mattis vulputate enim.</p>\r\n\r\n<p>Sit amet nulla facilisi morbi tempus. Nulla facilisi cras fermentum odio eu. Etiam erat velit scelerisque in dictum non consectetur a erat. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ut sem nulla pharetra diam. Fames ac turpis egestas maecenas. Bibendum neque egestas congue quisque egestas diam. Laoreet id donec ultrices tincidunt arcu non sodales neque. Eget felis eget nunc lobortis mattis aliquam faucibus purus. Faucibus interdum posuere lorem ipsum dolor sit.</p>\r\n', '2021-06-10', 7, 'di-rutan-raha-kadivmin-tekankan-pentingnya-akuntabilitas-dalam-pengelolaan-keuangan-dan-bmn', 1, 1, 1, '2021-06-10 13:12:34'),
(3, 'Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor.', 'thumbnailnews-20210611083549.png', '<div id=\"li-text\">\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.</p>\r\n\r\n<p>Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt eget. Leo a diam sollicitudin tempor id. A lacus vestibulum sed arcu non odio euismod lacinia. In tellus integer feugiat scelerisque. Feugiat in fermentum posuere urna nec tincidunt praesent. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Et malesuada fames ac turpis egestas sed. Sit amet nisl suscipit adipiscing bibendum est ultricies. Arcu ac tortor dignissim convallis aenean et tortor at. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Eros donec ac odio tempor orci dapibus ultrices. Elementum nibh tellus molestie nunc. Et magnis dis parturient montes nascetur. Est placerat in egestas erat imperdiet. Consequat interdum varius sit amet mattis vulputate enim.</p>\r\n\r\n<p>Sit amet nulla facilisi morbi tempus. Nulla facilisi cras fermentum odio eu. Etiam erat velit scelerisque in dictum non consectetur a erat. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ut sem nulla pharetra diam. Fames ac turpis egestas maecenas. Bibendum neque egestas congue quisque egestas diam. Laoreet id donec ultrices tincidunt arcu non sodales neque. Eget felis eget nunc lobortis mattis aliquam faucibus purus. Faucibus interdum posuere lorem ipsum dolor sit.</p>\r\n</div>\r\n', '2021-06-11', 7, 'nunc-pulvinar-sapien-et-ligula-ullamcorper-malesuada-proin-neque-convallis-a-cras-semper-auctor', 1, 1, 1, '2021-06-11 08:35:49'),
(4, 'Etiam erat velit scelerisque in dictum non consectetur a erat', 'thumbnailnews-20210611083657.png', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nisl tincidunt eget nullam non. Quis hendrerit dolor magna eget est lorem ipsum dolor sit. Volutpat odio facilisis mauris sit amet massa. Commodo odio aenean sed adipiscing diam donec adipiscing tristique. Mi eget mauris pharetra et. Non tellus orci ac auctor augue. Elit at imperdiet dui accumsan sit. Ornare arcu dui vivamus arcu felis. Egestas integer eget aliquet nibh praesent. In hac habitasse platea dictumst quisque sagittis purus. Pulvinar elementum integer enim neque volutpat ac.</p>\r\n\r\n<p>Senectus et netus et malesuada. Nunc pulvinar sapien et ligula ullamcorper malesuada proin. Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt eget. Leo a diam sollicitudin tempor id. A lacus vestibulum sed arcu non odio euismod lacinia. In tellus integer feugiat scelerisque. Feugiat in fermentum posuere urna nec tincidunt praesent. Porttitor rhoncus dolor purus non enim praesent elementum facilisis. Nisi scelerisque eu ultrices vitae auctor eu augue ut lectus. Ipsum faucibus vitae aliquet nec ullamcorper sit amet risus. Et malesuada fames ac turpis egestas sed. Sit amet nisl suscipit adipiscing bibendum est ultricies. Arcu ac tortor dignissim convallis aenean et tortor at. Pretium viverra suspendisse potenti nullam ac tortor vitae purus. Eros donec ac odio tempor orci dapibus ultrices. Elementum nibh tellus molestie nunc. Et magnis dis parturient montes nascetur. Est placerat in egestas erat imperdiet. Consequat interdum varius sit amet mattis vulputate enim.</p>\r\n\r\n<p>Sit amet nulla facilisi morbi tempus. Nulla facilisi cras fermentum odio eu. Etiam erat velit scelerisque in dictum non consectetur a erat. Enim nulla aliquet porttitor lacus luctus accumsan tortor posuere. Ut sem nulla pharetra diam. Fames ac turpis egestas maecenas. Bibendum neque egestas congue quisque egestas diam. Laoreet id donec ultrices tincidunt arcu non sodales neque. Eget felis eget nunc lobortis mattis aliquam faucibus purus. Faucibus interdum posuere lorem ipsum dolor sit.</p>\r\n', '2021-06-11', 23, 'etiam-erat-velit-scelerisque-in-dictum-non-consectetur-a-erat', 1, 1, 1, '2021-06-11 08:36:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_news_category`
--

CREATE TABLE `tbl_web_news_category` (
  `news_category_id` int(11) NOT NULL,
  `news_category_name` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_news_category`
--

INSERT INTO `tbl_web_news_category` (`news_category_id`, `news_category_name`, `createtime`) VALUES
(1, 'Berita', '2021-06-10 12:15:50'),
(2, 'Agenda', '2021-06-10 12:15:54'),
(3, 'Artikel', '2021-06-10 12:15:58'),
(4, 'Pengumuman', '2021-06-10 12:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_regulation`
--

CREATE TABLE `tbl_web_regulation` (
  `regulation_id` int(11) NOT NULL,
  `regulation_name` text NOT NULL,
  `regulation_file` varchar(50) NOT NULL,
  `regulation_category_id` int(11) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_regulation`
--

INSERT INTO `tbl_web_regulation` (`regulation_id`, `regulation_name`, `regulation_file`, `regulation_category_id`, `createtime`) VALUES
(1, 'Produk Hukum A', 'regulation-20210610164158.pdf', 1, '2021-06-10 16:41:58'),
(2, 'Produk Hukum B', 'regulation-20210610164209.pdf', 1, '2021-06-10 16:42:09'),
(3, 'Produk Hukum C', 'regulation-20210610164219.pdf', 2, '2021-06-10 16:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_regulation_category`
--

CREATE TABLE `tbl_web_regulation_category` (
  `regulation_category_id` int(11) NOT NULL,
  `regulation_category_name` varchar(30) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_regulation_category`
--

INSERT INTO `tbl_web_regulation_category` (`regulation_category_id`, `regulation_category_name`, `createtime`) VALUES
(1, 'UUD', '2021-06-10 12:29:59'),
(2, 'Perpres', '2021-06-10 12:30:08'),
(3, 'Permen', '2021-06-10 12:30:16'),
(4, 'Pergub', '2021-06-10 12:30:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_slider`
--

CREATE TABLE `tbl_web_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(50) NOT NULL,
  `slider_text` varchar(200) NOT NULL,
  `slider_image` varchar(50) NOT NULL,
  `createtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_web_slider`
--

INSERT INTO `tbl_web_slider` (`slider_id`, `slider_title`, `slider_text`, `slider_image`, `createtime`) VALUES
(2, '', '', 'slider-20210611003256.png', '2021-06-11 00:35:30'),
(3, '', '', 'slider-20210611003303.png', '2021-06-11 00:35:36'),
(4, '', '', 'slider-20210611003311.png', '2021-06-11 00:35:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_corebase_crud`
--
ALTER TABLE `tbl_corebase_crud`
  ADD PRIMARY KEY (`corebase_crud_id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `tbl_web_faq`
--
ALTER TABLE `tbl_web_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `tbl_web_gallery`
--
ALTER TABLE `tbl_web_gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_web_gallery_photo`
--
ALTER TABLE `tbl_web_gallery_photo`
  ADD PRIMARY KEY (`gallery_photo_id`);

--
-- Indexes for table `tbl_web_link`
--
ALTER TABLE `tbl_web_link`
  ADD PRIMARY KEY (`link_id`);

--
-- Indexes for table `tbl_web_message`
--
ALTER TABLE `tbl_web_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_web_news_category`
--
ALTER TABLE `tbl_web_news_category`
  ADD PRIMARY KEY (`news_category_id`);

--
-- Indexes for table `tbl_web_regulation`
--
ALTER TABLE `tbl_web_regulation`
  ADD PRIMARY KEY (`regulation_id`);

--
-- Indexes for table `tbl_web_regulation_category`
--
ALTER TABLE `tbl_web_regulation_category`
  ADD PRIMARY KEY (`regulation_category_id`);

--
-- Indexes for table `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_corebase_crud`
--
ALTER TABLE `tbl_corebase_crud`
  MODIFY `corebase_crud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=534;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_web_content`
--
ALTER TABLE `tbl_web_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_web_faq`
--
ALTER TABLE `tbl_web_faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_web_field`
--
ALTER TABLE `tbl_web_field`
  MODIFY `field_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_web_gallery`
--
ALTER TABLE `tbl_web_gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_web_gallery_photo`
--
ALTER TABLE `tbl_web_gallery_photo`
  MODIFY `gallery_photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_web_link`
--
ALTER TABLE `tbl_web_link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_web_message`
--
ALTER TABLE `tbl_web_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_web_news`
--
ALTER TABLE `tbl_web_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_web_news_category`
--
ALTER TABLE `tbl_web_news_category`
  MODIFY `news_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_web_regulation`
--
ALTER TABLE `tbl_web_regulation`
  MODIFY `regulation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_web_regulation_category`
--
ALTER TABLE `tbl_web_regulation_category`
  MODIFY `regulation_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_web_slider`
--
ALTER TABLE `tbl_web_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
