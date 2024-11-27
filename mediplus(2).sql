-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 27, 2024 at 07:12 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mediplus`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `categorie_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `tag_ids` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_discrption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `s_discrption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `t_discrption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `l_discrption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `socal_media` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = No, 1 = Yes',
  `total_view` int NOT NULL DEFAULT '0',
  `meta_title` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_keyword` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_discrption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `categorie_id`, `user_id`, `tag_ids`, `image`, `title`, `sub_title`, `f_discrption`, `f_image`, `l_image`, `s_discrption`, `t_discrption`, `l_discrption`, `socal_media`, `tag`, `total_view`, `meta_title`, `meta_keyword`, `meta_discrption`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '[\"1\",\"3\",\"4\",\"5\"]', 'uploads/images/blog/blog1_134.jpg', 'More than 80 clinical trials launch to test of the coronavirus .', '<p>Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do\r\n                                eiusmod tempor incididunt sed do incididunt sed.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam.</p>\r\n										<p>Pellentesque habitant morbi tristique senectus et netus et \r\nmalesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet \r\ndolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum \r\nconsequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales \r\ntempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. \r\nNam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non \r\ncommod</p><p></p>', 'uploads/images/blog/blog1_134.jpg', 'uploads/images/blog/blog1_134.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam.</p>', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam. Nam ac risus vitae sem vehicula egestas. Sed \r\nvelit nulla, viverra non commodo et, sodales id dui.</p>\r\n										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\nSuspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis \r\nvitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi \r\ntristique senectus et netus et malesuada fames ac turpis egestas. \r\nAliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse</p><p></p>', '[\"2\",\"3\",\"4\",\"5\"]', '1', 18, '<h1 class=\"news-title\"><a>More than 80 clinical trials launch to test of the coronavirus .</a></h1>', '<h1 class=\"news-title\"><a>More than 80 clinical trials launch to test of the coronavirus .</a></h1><p></p>', '<h1 class=\"news-title\"><a>More than 80 clinical trials launch to test of the coronavirus .</a></h1><p></p>', '1', '1', '2024-01-26 06:32:15', '2024-11-17 09:53:55'),
(5, 1, 1, '[\"1\",\"3\",\"4\",\"5\",\"6\"]', 'uploads/images/blog/blog3_948.jpg', 'We provide highly business soliutions.', '<p>Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do\r\n                                eiusmod tempor incididunt sed do incididunt sed.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam.</p>\r\n										<p>Pellentesque habitant morbi tristique senectus et netus et \r\nmalesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet \r\ndolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum \r\nconsequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales \r\ntempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. \r\nNam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non \r\ncommod</p><p></p>', 'uploads/images/blog/blog1_181.jpg', 'uploads/images/blog/blog2_633.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam.</p>', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam. Nam ac risus vitae sem vehicula egestas. Sed \r\nvelit nulla, viverra non commodo et, sodales id dui.</p>\r\n										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\nSuspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis \r\nvitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi \r\ntristique senectus et netus et malesuada fames ac turpis egestas. \r\nAliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse</p><p></p>', '[\"2\",\"3\",\"4\",\"5\"]', '1', 12, '<p>We provide highly business soliutions.<br></p>', '<p>We provide highly business soliutions.<br></p>', '<p>We provide highly business soliutions.<br></p>', '2', '1', '2024-01-26 07:23:06', '2024-07-26 12:01:54'),
(6, 1, 1, '[\"1\",\"3\",\"4\",\"5\",\"6\"]', 'uploads/images/blog/blog2_994.jpg', 'Top five way for solving teeth problems.', '<p>Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do\r\n                                eiusmod tempor incididunt sed do incididunt sed.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam.</p>\r\n										<p>Pellentesque habitant morbi tristique senectus et netus et \r\nmalesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet \r\ndolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum \r\nconsequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales \r\ntempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. \r\nNam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non \r\ncommod</p><p></p>', 'uploads/images/blog/blog1_217.jpg', 'uploads/images/blog/blog3_919.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam.</p>', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam. Nam ac risus vitae sem vehicula egestas. Sed \r\nvelit nulla, viverra non commodo et, sodales id dui.</p>\r\n										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. \r\nSuspendisse facilisis ultricies tortor, nec sollicitudin lorem sagittis \r\nvitae. Curabitur rhoncus commodo rutrum. Pellentesque habitant morbi \r\ntristique senectus et netus et malesuada fames ac turpis egestas. \r\nAliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse</p><p></p>', '[\"2\",\"3\",\"4\",\"5\"]', '1', 9, '<h2><a href=\"http://127.0.0.1:8000/blog-single.html\">Top five way for solving teeth problems.</a></h2><p></p>', '<h2><a href=\"http://127.0.0.1:8000/blog-single.html\">Top five way for solving teeth problems.</a></h2><p></p>', '<h2><a href=\"http://127.0.0.1:8000/blog-single.html\">Top five way for solving teeth problems.</a></h2><p></p>', '2', '1', '2024-01-26 07:23:14', '2024-11-17 09:53:59'),
(7, 4, 1, '[\"3\",\"4\",\"6\"]', 'uploads/images/blog/blog2_148.jpg', 'Our hospital always provide good services', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p><p></p>', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p><p></p>', 'uploads/images/blog/blog1_294.jpg', 'uploads/images/blog/blog3_796.jpg', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p><p></p>', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p><p></p>', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p><p></p>', '[\"2\",\"3\",\"4\",\"5\",\"6\"]', '1', 0, '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p><p></p>', '<p>Top five way for solving teeth problems.<br></p>', '<p>Top five way for solving teeth problems.</p>', '4', '1', '2024-08-17 12:35:50', '2024-08-17 12:35:50'),
(8, 5, 1, '[\"1\",\"3\",\"4\",\"5\",\"6\",\"7\"]', 'uploads/images/blog/blog3_672.jpg', 'What To Do After A Car Accident In Massachusetts? Get All the Details!', '<p>Top five way for solving teeth problems.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam.</p>\r\n										<p>Pellentesque habitant morbi tristique senectus et netus et \r\nmalesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet \r\ndolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum \r\nconsequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales \r\ntempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. \r\nNam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non \r\ncommod</p><p><br></p><p></p>', 'uploads/images/blog/blog2_639.jpg', 'uploads/images/blog/blog1_266.jpg', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p><p></p>', '<p>Aliquam nec lacus pulvinar, laoreet dolor quis, pellentesque ante. Cras \r\nnulla orci, pharetra at dictum consequat, pretium pretium nulla. \r\nSuspendisse porttitor nunc a sodales tempor. Mauris sed felis maximus, \r\ninterdum metus vel, tincidunt diam. Nam ac risus vitae sem vehicula \r\negestas. Sed velit nulla, viverra non commodo et, sodales</p><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse \r\nfacilisis ultricies tortor, nec sollicitudin lorem sagittis vitae. \r\nCurabitur rhoncus commodo rutrum. Pellentesque habitant morbi tristique \r\nsenectus et netus et malesuada fames ac turpis egestas. Aliquam nec \r\nlacus pulvinar, laoreet dolor quis, pellentesque ante. Cras nulla orci, \r\npharetra at dictum consequat, pretium pretium nulla. Suspendisse \r\nporttitor nunc a sodales tempor. Mauris sed felis maximus, interdum \r\nmetus vel, tincidunt diam.</p>\r\n										<p>Pellentesque habitant morbi tristique senectus et netus et \r\nmalesuada fames ac turpis egestas. Aliquam nec lacus pulvinar, laoreet \r\ndolor quis, pellentesque ante. Cras nulla orci, pharetra at dictum \r\nconsequat, pretium pretium nulla. Suspendisse porttitor nunc a sodales \r\ntempor. Mauris sed felis maximus, interdum metus vel, tincidunt diam. \r\nNam ac risus vitae sem vehicula egestas. Sed velit nulla, viverra non \r\ncommod</p><p><br></p><p></p>', '[\"2\",\"3\",\"4\"]', '1', 0, 'Top five way for solving teeth problems.', '<p>Top five way for solving teeth problems.</p>', '<p>Top five way for solving teeth problems.</p>', '5', '1', '2024-08-17 12:37:32', '2024-08-17 12:37:32');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `categorie_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `categorie_name`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Apparel', '1', '1', '2024-01-19 09:01:28', '2024-01-19 09:01:28'),
(3, 'Women\'s Apparel', '2', '1', '2024-01-19 09:19:44', '2024-01-19 09:19:44'),
(4, 'Bags Collection', '3', '1', '2024-01-19 09:20:03', '2024-01-19 09:20:03'),
(5, 'Accessories', '4', '1', '2024-01-19 09:20:16', '2024-01-19 09:20:16'),
(6, 'Sun Glasses', '5', '1', '2024-01-19 09:20:29', '2024-01-19 09:20:29');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `comment_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `replay_comment` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `user_id`, `comment_id`, `comment`, `replay_comment`, `created_at`, `updated_at`) VALUES
(1, 3, 1, NULL, 'Nice Blog', NULL, '2024-01-28 08:42:42', '2024-01-28 08:42:42'),
(2, 3, 1, NULL, 'Very Nice', NULL, '2024-01-28 10:37:21', '2024-01-28 10:37:21'),
(3, 3, 1, '1', NULL, 'Tnx', '2024-01-28 10:50:49', '2024-01-28 10:50:49'),
(4, 3, 1, '2', NULL, 'Tnx You So Much', '2024-01-28 10:51:11', '2024-01-28 10:51:11'),
(5, 3, 1, '1', NULL, 'Tex Second Time', '2024-01-28 10:51:45', '2024-01-28 10:51:45'),
(6, 6, 1, NULL, 'Hello', NULL, '2024-01-28 11:26:21', '2024-01-28 11:26:21'),
(7, 6, 1, '6', NULL, 'Tnx', '2024-01-28 11:26:30', '2024-01-28 11:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tags`
--

CREATE TABLE `blog_tags` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tags`
--

INSERT INTO `blog_tags` (`id`, `tag_name`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Business', '1', '1', '2024-01-19 10:22:35', '2024-01-26 06:12:16'),
(3, 'Wordpress', '2', '1', '2024-01-19 10:26:24', '2024-01-26 06:12:26'),
(4, 'Html', '3', '1', '2024-01-19 10:26:38', '2024-01-26 06:12:36'),
(5, 'Multipurpose', '4', '1', '2024-01-19 10:27:06', '2024-01-26 06:12:08'),
(6, 'Education', '5', '1', '2024-01-19 10:27:18', '2024-01-26 06:11:56'),
(7, 'Template', '6', '1', '2024-01-19 10:27:39', '2024-01-26 06:11:47'),
(8, 'Ecommerce', '7', '1', '2024-01-19 10:28:12', '2024-01-19 10:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `bulldings`
--

CREATE TABLE `bulldings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bulldings`
--

INSERT INTO `bulldings` (`id`, `name`, `location`, `image`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Steven Gentry', 'Rerum sequi rem sit', 'uploads/images/bulldings/gallery-img-3-7(5)_188.png', '1', '1', '2024-11-20 11:41:25', '2024-11-20 11:41:25'),
(3, 'Serina Bray', 'Irure error voluptas', 'uploads/images/bulldings/gallery-img-3-7(5)_972.png', '2', '1', '2024-11-20 11:41:45', '2024-11-20 11:41:45'),
(4, 'Brendan Peters', 'Rerum aut suscipit d', 'uploads/images/bulldings/gallery-img-3-7(4)_957.png', '3', '1', '2024-11-20 11:42:05', '2024-11-21 12:21:15');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `image`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Centra Hospital', 'uploads/images/clients/client1_524.png', '1', '1', '2024-01-18 10:05:51', '2024-01-18 10:18:57'),
(3, 'Panace Clinic', 'uploads/images/clients/client2_908.png', '2', '1', '2024-01-18 10:20:34', '2024-01-18 10:20:34'),
(4, 'Pharmacy', 'uploads/images/clients/client4_259.png', '3', '1', '2024-01-18 10:20:56', '2024-01-18 10:20:56'),
(5, 'Candiac science', 'uploads/images/clients/client3_131.png', '4', '1', '2024-01-18 10:21:39', '2024-01-18 10:21:39'),
(6, 'Health Care', 'uploads/images/clients/client5_143.png', '5', '1', '2024-01-18 10:22:07', '2024-01-18 10:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_models`
--

CREATE TABLE `contact_form_models` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = No, 1 = Yes',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_form_models`
--

INSERT INTO `contact_form_models` (`id`, `name`, `email`, `phone`, `subject`, `message`, `condition`, `created_at`, `updated_at`) VALUES
(1, 'Nita Lynn', 'rusicytur@mailinator.com', '+1 (463) 643-4698', 'Quae officia elit e', 'In irure maiores et', '1', '2024-07-25 12:41:57', '2024-07-25 12:41:57'),
(2, 'Ivory Chang', 'tobymosude@mailinator.com', '+1 (156) 218-1968', 'Accusamus id delectu', 'Molestias accusamus', '1', '2024-08-28 12:00:55', '2024-08-28 12:00:55');

-- --------------------------------------------------------

--
-- Table structure for table `day_models`
--

CREATE TABLE `day_models` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Close, 1 = Open',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_models`
--

INSERT INTO `day_models` (`id`, `name`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Friday', '1', '1', '2024-07-28 11:29:20', '2024-07-28 11:30:07'),
(3, 'Saturday', '2', '1', '2024-07-28 11:29:44', '2024-07-28 11:29:44'),
(4, 'Sunday', '3', '0', '2024-07-28 11:30:39', '2024-07-28 11:30:39'),
(5, 'Monday', '4', '1', '2024-07-28 11:30:51', '2024-07-28 11:30:51'),
(6, 'Tuesday', '5', '1', '2024-07-28 11:31:03', '2024-07-28 11:31:03'),
(7, 'Wednesday', '6', '1', '2024-07-28 11:31:15', '2024-07-28 11:31:15'),
(8, 'Thursday', '7', '1', '2024-07-28 11:31:26', '2024-07-28 11:31:26');

-- --------------------------------------------------------

--
-- Table structure for table `department_models`
--

CREATE TABLE `department_models` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Punlish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `department_models`
--

INSERT INTO `department_models` (`id`, `icon`, `name`, `sub_name`, `description`, `image`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, '<i class=\"icofont-heart-beat\"></i>', 'Cardiac Clinic', 'Lorem Sit', '<p class=\"p1\">“Vivamus ut tellus sed tellus finibus egestas. Mauris\r\n                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>\r\n                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra\r\n                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam\r\n                                            pharetra commodo. </p>\r\n                                        <ul class=\"list\">\r\n                                            <li><i class=\"fa fa-check\"></i>Maecenas vitae luctus nibh. Curabitur\r\n                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>\r\n                                            <li><i class=\"fa fa-check\"></i> Maecenas pharetra ante vel est lobortis</li>\r\n                                            <li><i class=\"fa fa-check\"></i>Lorem ipsum dolor sit amet, consectetur.</li>\r\n                                        </ul>', 'uploads/images/department/department-1_454.png', '0', '1', '2024-05-14 10:38:32', '2024-05-14 10:38:32'),
(2, '<i class=\"icofont-brain-alt\"></i>', 'Neurology', 'Quis Est', '<p class=\"p1\">“Vivamus ut tellus sed tellus finibus egestas. Mauris\r\n                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>\r\n                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra\r\n                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam\r\n                                            pharetra commodo. </p>\r\n                                        <ul class=\"list\">\r\n                                            <li><i class=\"fa fa-check\"></i>Maecenas vitae luctus nibh. Curabitur\r\n                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>\r\n                                            <li><i class=\"fa fa-check\"></i> Maecenas pharetra ante vel est lobortis</li>\r\n                                            <li><i class=\"fa fa-check\"></i>Lorem ipsum dolor sit amet, consectetur.</li>\r\n                                        </ul>', 'uploads/images/department/department-1_374.png', '1', '1', '2024-05-14 10:40:01', '2024-05-14 10:40:01'),
(3, '<i class=\"icofont-tooth\"></i>', 'Dentistry', 'Sit Dolor', '<p class=\"p1\">“Vivamus ut tellus sed tellus finibus egestas. Mauris\r\n                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>\r\n                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra\r\n                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam\r\n                                            pharetra commodo. </p>\r\n                                        <ul class=\"list\">\r\n                                            <li><i class=\"fa fa-check\"></i>Maecenas vitae luctus nibh. Curabitur\r\n                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>\r\n                                            <li><i class=\"fa fa-check\"></i> Maecenas pharetra ante vel est lobortis</li>\r\n                                            <li><i class=\"fa fa-check\"></i>Lorem ipsum dolor sit amet, consectetur.\r\n                                            </li>\r\n                                        </ul>', 'uploads/images/department/department-1_565.png', '2', '1', '2024-05-14 10:40:48', '2024-05-14 10:40:48'),
(4, '<i class=\"icofont-heart-beat\"></i>', 'Gastroenterology', 'Lorem Sit', '<p class=\"p1\">“Vivamus ut tellus sed tellus finibus egestas. Mauris\r\n                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>\r\n                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra\r\n                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam\r\n                                            pharetra commodo. </p>\r\n                                        <ul class=\"list\">\r\n                                            <li><i class=\"fa fa-check\"></i>Maecenas vitae luctus nibh. Curabitur\r\n                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>\r\n                                            <li><i class=\"fa fa-check\"></i> Maecenas pharetra ante vel est lobortis\r\n                                            </li>\r\n                                            <li><i class=\"fa fa-check\"></i>Lorem ipsum dolor sit amet, consectetur.\r\n                                            </li>\r\n                                        </ul>', 'uploads/images/department/department-1_556.png', '3', '1', '2024-05-14 10:41:31', '2024-05-14 10:41:31'),
(5, '<i class=\"icofont-bone\"></i>', 'Orthopedagogy', 'Lorem Sit', '<p class=\"p1\">“Vivamus ut tellus sed tellus finibus egestas. Mauris\r\n                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>\r\n                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra\r\n                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam\r\n                                            pharetra commodo. </p>\r\n                                        <ul class=\"list\">\r\n                                            <li><i class=\"fa fa-check\"></i>Maecenas vitae luctus nibh. Curabitur\r\n                                                pharetra luctus est, sit amet aliquam ex posuere id. </li>\r\n                                            <li><i class=\"fa fa-check\"></i> Maecenas pharetra ante vel est lobortis\r\n                                            </li>\r\n                                            <li><i class=\"fa fa-check\"></i>Lorem ipsum dolor sit amet, consectetur.\r\n                                            </li>\r\n                                        </ul>', 'uploads/images/department/department-1_220.png', '4', '1', '2024-05-14 10:42:35', '2024-05-14 11:27:46'),
(6, '<i class=\"icofont-bone\"></i>', 'Pain Management', 'Lorem Sit', '<p class=\"p1\">“Vivamus ut tellus sed tellus finibus egestas. Mauris\r\n                                            adipiscing aliquet et nisl nec eleifend adipiscing elit.”</p>\r\n                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra\r\n                                            ante vel est lobortis, a commodo magna rhoncus. In quis nisi non quam\r\n                                            pharetra commodo. </p>\r\n                                        <ul class=\"list\"><li><i class=\"fa fa-check\"></i>Maecenas vitae luctus nibh. Curabitur\r\n                                                pharetra luctus est, sit amet aliquam ex posuere id. </li><li><i class=\"fa fa-check\"></i> Maecenas pharetra ante vel est lobortis\r\n                                            </li><li><i class=\"fa fa-check\"></i>Lorem ipsum dolor sit amet, consectetur.\r\n                                            </li></ul><p></p>', 'uploads/images/department/department-1_220_872.png', '5', '0', '2024-08-27 11:32:01', '2024-11-17 09:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_models`
--

CREATE TABLE `doctor_models` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `room_id` bigint UNSIGNED NOT NULL,
  `bullding_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vimo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fdegree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdegree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tdegree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ldegree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `workday` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fbiography` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `education` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lbiography` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('0','1','2') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending , 1 = Active , 2 = Cancel',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_models`
--

INSERT INTO `doctor_models` (`id`, `user_id`, `department_id`, `room_id`, `bullding_id`, `image`, `phone`, `location`, `facebook`, `twitter`, `vimo`, `pinterest`, `position`, `fdegree`, `sdegree`, `tdegree`, `ldegree`, `workday`, `fbiography`, `education`, `lbiography`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 14, 3, 'uploads/images/doctors/team1_507.png', '+07 554 332 322', '4th Floor, 408 No Chamber', '#', '#', '#', '#', 'Neurosurgeon.', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\">\r\n                                    <li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li>\r\n                                    <li class=\"day\">Saturday <span>9.00-18.30</span></li>\r\n                                    <li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li>\r\n                                </ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra eiusmod tempor \r\nincididunt ut labore et dolore magna.</p><p></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p></p>', '1', '2024-11-22 16:52:45', '2024-11-24 10:33:14'),
(2, 9, 2, 11, 3, 'uploads/images/doctors/team2_506.png', '+07 554 332 322', '4th Floor, 408 No Chamber', NULL, NULL, NULL, NULL, 'Neurosurgeon.', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\">\r\n                                    <li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li>\r\n                                    <li class=\"day\">Saturday <span>9.00-18.30</span></li>\r\n                                    <li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li>\r\n                                </ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra eiusmod tempor \r\nincididunt ut labore et dolore magna.</p><p></p>', '1', '2024-11-22 16:58:20', '2024-11-24 10:35:01'),
(3, 25, 3, 2, 3, 'uploads/images/doctors/team3_351.png', '+1 (696) 463-6894', 'Illo et est consequa', 'Quod modi ut eos qua', 'Reprehenderit elit', 'Eum ut delectus qui', 'Dolore beatae sint', 'Neurosurgeon.', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra eiusmod tempor \r\nincididunt ut labore et dolore magna.</p><p><br></p>', '1', '2024-11-22 17:02:29', '2024-11-24 10:35:55'),
(4, 14, 4, 1, 2, 'uploads/images/doctors/team4_937.png', '+1 (561) 232-7517', 'Eveniet lorem in qu', 'Voluptatem in ipsum', 'Hic id et numquam na', 'Voluptatibus deserun', 'Laborum harum volupt', 'Neurosurgeon.', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra eiusmod tempor \r\nincididunt ut labore et dolore magna.</p><p><br></p>', '1', '2024-11-22 17:02:29', '2024-11-24 10:36:11'),
(5, 15, 2, 4, 2, 'uploads/images/doctors/team1_389.png', '+1 (281) 878-7991', 'Ipsa in veritatis e', 'Adipisci esse volupt', 'Aut in duis dolorem', 'Dolor quia voluptate', 'Illum sunt necessit', 'Neurosurgeon.', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra eiusmod tempor \r\nincididunt ut labore et dolore magna.</p><p><br></p>', '1', '2024-11-22 17:07:45', '2024-11-24 10:36:33'),
(6, 17, 2, 10, 3, 'uploads/images/doctors/team2_270.png', '+1 (517) 681-8185', 'Excepturi hic vel qu', 'Magni ratione expedi', 'Quisquam nisi magnam', 'Molestias ea laborio', 'Doloribus aspernatur', 'Dental Surgeon', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra eiusmod tempor \r\nincididunt ut labore et dolore magna.</p><p><br></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br></p>', NULL, '1', '2024-11-22 17:07:45', '2024-11-22 17:07:45'),
(7, 11, 1, 13, 3, 'uploads/images/doctors/team3_580.png', '+1 (902) 542-8639', 'Sed esse perferendi', 'Voluptatem architect', 'Et hic blanditiis se', 'Laboris architecto i', 'Earum Nam autem vero', 'Dental Surgeon', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra</p>\r\n<br>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt consectetur adipiscing elit, sed do eiusmod \r\ntempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra eiusmod tempor \r\nincididunt ut labore et dolore magna.</p><p><br></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br></p>', '1', '2024-11-22 17:12:56', '2024-11-22 17:12:56'),
(8, 10, 4, 3, 3, 'uploads/images/doctors/team4_469.png', '+1 (224) 797-9278', 'Officia eum fugiat s', 'Nesciunt a quia mag', 'Ut voluptatibus alia', 'Aperiam consectetur', 'Culpa lorem esse c', 'Neurosurgeon.', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br></p>', '1', '2024-11-22 17:12:56', '2024-11-22 17:12:56'),
(9, 2, 1, 12, 3, 'uploads/images/doctors/istockphoto-1387312234-612x612_420.png', '+1 (888) 820-3074', '4th Floor, 408 No Chamber', '#', '#', '#', '#', 'Dental Surgeon', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br><br></p><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '1', '2024-11-15 17:12:56', '2024-11-22 17:12:56'),
(10, 8, 3, 5, 3, 'uploads/images/doctors/depositphotos_12660354-stock-photo-smiling-doctor-at-work_689.png', '+1 (888) 820-3074', '4th Floor, 408 No Chamber', '#', '#', '#', '#', 'Dental Surgeon', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '1', '2024-11-22 17:12:56', '2024-11-24 10:37:34'),
(11, 22, 5, 6, 2, 'uploads/images/doctors/istockphoto-1387312234-612x612_981.png', '+1 (888) 820-3074', '4th Floor, 408 No Chamber', '#', '#', '#', '#', 'Neurosurgeon.', 'MBBS in Neurology, PHD in Neurosurgeon.', '#', '#', '#', '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br><br></p><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '1', '2024-11-22 17:21:07', '2024-11-24 10:37:46'),
(12, 23, 4, 8, 3, 'uploads/images/doctors/depositphotos_12660354-stock-photo-smiling-doctor-at-work_130.png', '+1 (888) 820-3074', 'Anywhere', '#', '#', '#', '#', 'Neurosurgeon.', 'MBBS in Neurology, PHD in Neurosurgeon.', '#', '#', '#', '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br><br></p><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '1', '2024-11-22 17:21:07', '2024-11-22 17:21:07'),
(13, 27, 2, 9, 3, 'uploads/images/doctors/doctor-details_936.jpg', '+1 (888) 820-3074', 'Anywhere', '#', '#', '#', '#', 'Dental Surgeon', 'MBBS in Neurology, PHD in Neurosurgeon.', NULL, NULL, NULL, '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul><p></p>', '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul><p></p>', '<ul><li>PHD degree in Neorology at University of Mediserv (2006)</li><li>Master of Neoro Surgery at University of Mediserv (2002)</li><li>MBBS degree in Neurosciences at University of Mediserv (2002)</li><li>Higher Secondary Certificate at Mediserv collage (1991)</li></ul><p><br><br></p><p></p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do \r\neiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum \r\nsuspendisse ultrices gravida. Risus commodo viverra maecenas accumsan \r\nlacus vel facilisis.Lorem ipsum dolor sit amet, consectetur adipiscing \r\nelit, sed do eiusmod tempor incididunt.</p><br>\r\n<p>Risus commodo viverra maecenas accumsan lacus vel facilisis.Lorem \r\nipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor\r\n incididunt.</p><p><br><br></p><p></p>', '0', '2024-11-22 17:24:29', '2024-11-24 10:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `heading`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 'NEW_USER_MAIL', 'Email Verify', 'Email Verify Mail', '<p><b>Hello </b><span style=\"font-size: 0.875rem;\">! [name]<br></span><br></p><p>This email is to inform you that has signed up in your network. Please click the link below to verify the profile</p><p><br></p><p align=\"center\"><span style=\"font-size: 15px; font-weight: 400;\">[verify-token-button]</span></p><p align=\"center\"><span style=\"font-size: 15px; font-weight: 400;\"><br></span></p><p><span style=\"font-size: 15px; font-weight: 400;\">[verify-token]</span></p>', NULL, '2024-03-21 10:28:24'),
(5, 'PASSWORD_RESET_MAIL', 'Reset password', 'Reset password request', '<p>Hi,&nbsp; [name]</p><p><br></p><p>MADIPLUS has received a request to reset the password for your account. If you did not request to reset your password, please ignore this email.</p><p><br></p><p align=\"center\">[reset-password-button]<br></p><p align=\"center\"><br></p><p align=\"left\">or copy the link to your browser: [reset-token]<br><b><br>Sincerely yours,<br>MADIPLUS Team</b><br></p>', NULL, '2024-03-21 10:33:26'),
(6, 'NEW_DOCTOR_MAIL', 'New Doctor Added Mail !', 'New Doctor Added Mail !', '<h3>Welcome to Our MEDIPLUS!</h3>\r\n    <p>Hello [name],</p>\r\n    <br>\r\n    <p>We are excited to have you on board as a new doctor in our medical practice.</p>\r\n<br>\r\n    <p>Your account has been successfully created.</p>\r\n<br>\r\n    <p>You can access your dashboard using the following link:</p>\r\n<br>\r\n    [redirect-dashboard-button]\r\n<br>\r\n    <p>Thank you and welcome aboard!</p>\r\n<br>', '2024-03-26 16:39:39', '2024-03-26 11:16:06'),
(7, 'PATIENT_APPONTMENT_MAIL', ' Your Appointment Has Been Successfully Scheduled!', ' Your Appointment Has Been Successfully Scheduled!', '<p>Hi,&nbsp; [name]</p><p><br></p><p>MADIPLUS has received a request to reset the password for your account. If you did not request to reset your password, please ignore this email.</p><p><br></p><p align=\"center\">[reset-password-button]<br></p><p align=\"center\"><br></p><p align=\"left\">or copy the link to your browser: [reset-token]<br><b><br>Sincerely yours,<br>MADIPLUS Team</b><br></p>', '2024-11-18 17:26:55', '2024-11-18 17:26:55'),
(8, 'NEW_PATIENT_APPONTED\r\n', 'A New User Appointment ', 'A New User Appointment ', '<p>Hi,&nbsp; [name]</p><p><br></p><p>MADIPLUS has received a request to reset the password for your account. If you did not request to reset your password, please ignore this email.</p><p><br></p><p align=\"center\">[reset-password-button]<br></p><p align=\"center\"><br></p><p align=\"left\">or copy the link to your browser: [reset-token]<br><b><br>Sincerely yours,<br>MADIPLUS Team</b><br></p>', '2024-11-18 17:29:45', '2024-11-18 17:29:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feautes`
--

CREATE TABLE `feautes` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discrption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feautes`
--

INSERT INTO `feautes` (`id`, `icon`, `title`, `discrption`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(2, '<i class=\"icofont icofont-ambulance-cross\"></i>', 'Emergency Help', '<p>Lorem ipsum sit, consectetur adipiscing elit. Maecenas mi quam vulputate.</p>', '1', '1', '2024-01-12 11:18:34', '2024-01-12 11:18:34'),
(3, '<i class=\"icofont icofont-medical-sign-alt\"></i>', 'Enriched Pharmecy', '<p>Lorem ipsum sit, consectetur adipiscing elit. Maecenas mi quam vulputate.</p>', '2', '1', '2024-01-12 11:19:54', '2024-01-12 11:19:54'),
(4, '<i class=\"icofont icofont-stethoscope\"></i>', 'Medical Treatment', '<p>Lorem ipsum sit, consectetur adipiscing elit. Maecenas mi quam vulputate.</p>', '3', '1', '2024-01-12 11:20:48', '2024-01-12 11:20:56');

-- --------------------------------------------------------

--
-- Table structure for table `fun_facts`
--

CREATE TABLE `fun_facts` (
  `id` bigint UNSIGNED NOT NULL,
  `icons` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `counter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fun_facts`
--

INSERT INTO `fun_facts` (`id`, `icons`, `counter`, `title`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(3, '<i class=\"icofont icofont-home\"></i>', '3468', 'Hospital Rooms', '1', '1', '2024-01-13 09:45:16', '2024-01-13 09:45:16'),
(4, '<i class=\"icofont icofont-user-alt-3\"></i>', '557', 'Specialist Doctors', '2', '1', '2024-01-13 09:45:42', '2024-01-13 09:45:42'),
(5, '<i class=\"icofont-simple-smile\"></i>', '4379', 'Happy Patients', '3', '1', '2024-01-13 09:46:10', '2024-01-13 09:46:10'),
(6, '<i class=\"icofont icofont-table\"></i>', '32', 'Years of Experience', '4', '1', '2024-01-13 09:46:34', '2024-01-13 09:46:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `child_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending , 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `url`, `target`, `order_by`, `parent_id`, `child_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Home', 'home', '#', '0', '1', '0', '0', '1', '2024-01-06 12:07:01', '2024-01-06 12:07:01'),
(7, 'Doctors', 'doctors', '/frontend/doctors', '0', '2', '0', '0', '1', '2024-01-06 13:55:06', '2024-05-21 12:20:41'),
(8, 'Services', 'services', '/frontend/services', '0', '3', '0', '0', '1', '2024-01-06 13:55:35', '2024-05-21 12:21:28'),
(9, 'Pages', 'pages', '#', '0', '4', '0', '0', '1', '2024-01-06 13:55:54', '2024-01-06 13:55:54'),
(10, 'Blogs', 'blogs', '/frontend/blogs', '0', '5', '0', '0', '1', '2024-01-06 13:56:39', '2024-07-26 11:54:53'),
(11, 'Contact Us', 'contact-us', '/frontend/contact', '0', '6', '0', '0', '1', '2024-01-06 13:57:09', '2024-07-25 11:30:06'),
(12, 'Time Table', 'time-table', '/frontend/time-table', '0', '7', '9', '0', '1', '2024-01-06 13:57:33', '2024-07-26 11:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_12_145156_create_roles_table', 1),
(6, '2023_12_12_145157_create_users_table', 1),
(7, '2023_12_23_150042_create_settings_table', 2),
(8, '2023_12_23_152250_create_menus_table', 3),
(9, '2023_12_26_170620_create_email_templates_table', 4),
(10, '2024_01_08_140155_create_silder_sections_table', 5),
(11, '2024_01_12_115623_create_schedules_table', 6),
(13, '2024_01_12_164609_create_feautes_table', 8),
(14, '2024_01_13_150109_create_fun_facts_table', 9),
(20, '2024_01_18_132054_create_pricing_tables_table', 14),
(21, '2024_01_18_151655_create_clients_table', 15),
(24, '2024_01_19_140343_create_blog_categories_table', 17),
(25, '2024_01_19_152847_create_blog_tags_table', 18),
(27, '2024_01_24_153829_create_socal_media_table', 20),
(29, '2024_01_19_163204_create_blogs_table', 21),
(31, '2024_01_27_164730_create_blog_comments_table', 22),
(38, '2024_02_02_162024_create_subscribers_table', 28),
(39, '2024_02_02_174739_create_porfolio_categories_table', 29),
(41, '2024_01_14_162740_create_portfolio_sections_table', 30),
(44, '2024_03_22_093343_create_protfolio_galleries_table', 31),
(51, '2024_05_13_165713_create_reviews_table', 34),
(52, '2024_03_24_165240_create_department_models_table', 35),
(53, '2024_01_16_163339_create_services_table', 36),
(54, '2024_07_25_182925_create_contact_form_models_table', 37),
(55, '2024_07_28_163728_create_day_models_table', 38),
(59, '2024_07_28_175057_create_slot_models_table', 39),
(61, '2024_08_06_170949_create_time_tables_table', 40),
(62, '2024_08_07_165449_create_time_page_models_table', 41),
(63, '2024_08_07_172426_create_user_locations_table', 42),
(64, '2024_08_14_162023_create_visitors_table', 43),
(65, '2024_08_19_161416_create_notifications_table', 44),
(66, '2024_08_23_171851_create_jobs_table', 45),
(72, '2024_03_26_083499_create_bulldings_table', 48),
(75, '2024_03_26_083500_create_rooms_table', 49),
(76, '2024_03_26_083501_create_doctor_models_table', 50),
(78, '2024_11_17_160133_create_patient_appontments_table', 51);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('10b56b1f-03f8-489d-9bea-a57aea7a2c2b', 'App\\Notifications\\UserRegisteredNotification', 'App\\Models\\User', 1, '{\"user_id\":81,\"message\":\"A New User Has Registered: Herrod\",\"status\":\"new_user_create\"}', NULL, '2024-08-24 11:45:02', '2024-08-24 11:45:02'),
('155a480e-2018-4d5a-95e7-1549d1a94f36', 'App\\Notifications\\UserRegisteredNotification', 'App\\Models\\User', 1, '{\"user_id\":80,\"message\":\"A New User Has Registered: Cassidy\",\"status\":\"new_user_create\"}', NULL, '2024-08-24 11:43:41', '2024-08-24 11:43:41'),
('38e13a27-a90d-4592-96fb-2d1fb47f20bd', 'App\\Notifications\\UserRegisteredNotification', 'App\\Models\\User', 1, '{\"user_id\":83,\"message\":\"A New User Has Registered: Carson\",\"status\":\"new_user_create\"}', NULL, '2024-08-24 11:46:45', '2024-08-24 11:46:45'),
('5473bc9e-3791-4654-8772-81589092f481', 'App\\Notifications\\UserRegisteredNotification', 'App\\Models\\User', 1, '{\"user_id\":82,\"message\":\"A New User Has Registered: Kalia\",\"status\":\"new_user_create\"}', NULL, '2024-08-24 11:45:25', '2024-08-24 11:45:25'),
('c27ae0d4-19d1-4454-a732-cd42a3c6f31c', 'App\\Notifications\\UserRegisteredNotification', 'App\\Models\\User', 1, '{\"user_id\":79,\"message\":\"A New User Has Registered: Yvonne\",\"status\":\"new_user_create\"}', NULL, '2024-08-24 11:40:09', '2024-08-24 11:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient_appontments`
--

CREATE TABLE `patient_appontments` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `slot_id` bigint UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending , 1 = Publish , 2 = Cancel 3 = Suspend',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `porfolio_categories`
--

CREATE TABLE `porfolio_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending , 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `porfolio_categories`
--

INSERT INTO `porfolio_categories` (`id`, `name`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(2, 'General Treatment', '1', '1', '2024-02-04 09:14:47', '2024-02-04 09:14:47'),
(3, 'Teeth Whitening', '2', '1', '2024-02-04 09:15:00', '2024-02-04 09:15:00'),
(4, 'Heart Surgery', '3', '1', '2024-02-04 09:15:11', '2024-02-04 09:15:11'),
(5, 'Ear Treatment', '4', '1', '2024-02-04 09:15:28', '2024-02-04 09:15:28'),
(6, 'Vision Problems', '5', '1', '2024-02-04 09:15:39', '2024-02-04 09:15:39'),
(7, 'Blood Transfusion', '6', '1', '2024-02-04 09:15:50', '2024-02-04 09:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_sections`
--

CREATE TABLE `portfolio_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `client_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_sections`
--

INSERT INTO `portfolio_sections` (`id`, `category_id`, `client_name`, `date`, `phone`, `age`, `title`, `btn_title`, `image`, `btn_url`, `btn_target`, `order_by`, `discription`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 'Md Emon Hossen', '2024-03-28', '01834507987', '24', 'Here is the name of this project here', 'View Details', 'uploads/images/potfolio/pf3_712.jpg', 'test', '0', '1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do \r\neiusmod tempor a ti incididunt ut labore et dolore to in magna aliqua. \r\nUt enim ad minim veniam, quis to the in nostrud.abore et dolore magna \r\naliqua uis nostrud.Lorem ipsum dolor sit amet, in a in to in a \r\nconsectetur.ncididunt ut labore et dolore magna aliqua. Ut enim ad minim\r\n veniam, quis to the in nostrud.abore et dolore magna in a aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod</p>\r\n								<p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis to the in nostrud.abore et dolore magna to in aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. </p>\r\n								<p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis to the in nostrud.abore et dolore magna a aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis to the in \r\nnostrud.abore et dolore magna aliqua uis nostrud.Lorem ipsum dolor sit \r\namet, in aed do eiusmod. dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis to the in \r\nnostrud.abore et dolore magna aliqua uis nostrud.</p><p></p>', '1', '2024-03-22 04:23:30', '2024-03-22 04:23:30'),
(7, 2, 'Md Emon Hossen', '2024-03-29', '01909758928', '24', 'Here is the name of this project here', 'View Details', 'uploads/images/potfolio/pf4_235.jpg', 'test', '0', '2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do \r\neiusmod tempor a ti incididunt ut labore et dolore to in magna aliqua. \r\nUt enim ad minim veniam, quis to the in nostrud.abore et dolore magna \r\naliqua uis nostrud.Lorem ipsum dolor sit amet, in a in to in a \r\nconsectetur.ncididunt ut labore et dolore magna aliqua. Ut enim ad minim\r\n veniam, quis to the in nostrud.abore et dolore magna in a aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod</p>\r\n								<p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis to the in nostrud.abore et dolore magna to in aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. </p>\r\n								<p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis to the in nostrud.abore et dolore magna a aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis to the in \r\nnostrud.abore et dolore magna aliqua uis nostrud.Lorem ipsum dolor sit \r\namet, in aed do eiusmod. dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis to the in \r\nnostrud.abore et dolore magna aliqua uis nostrud.</p><p></p>', '1', '2024-03-22 04:24:57', '2024-03-22 04:24:57'),
(8, 6, 'Md Emon Hossen', '2024-03-26', '016555841251', '24', 'Here is the name of this project here', 'View Details', 'uploads/images/potfolio/pf2_686.jpg', 'test', '0', '3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do \r\neiusmod tempor a ti incididunt ut labore et dolore to in magna aliqua. \r\nUt enim ad minim veniam, quis to the in nostrud.abore et dolore magna \r\naliqua uis nostrud.Lorem ipsum dolor sit amet, in a in to in a \r\nconsectetur.ncididunt ut labore et dolore magna aliqua. Ut enim ad minim\r\n veniam, quis to the in nostrud.abore et dolore magna in a aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod</p>\r\n								<p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis to the in nostrud.abore et dolore magna to in aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. </p>\r\n								<p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis to the in nostrud.abore et dolore magna a aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis to the in \r\nnostrud.abore et dolore magna aliqua uis nostrud.Lorem ipsum dolor sit \r\namet, in aed do eiusmod. dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis to the in \r\nnostrud.abore et dolore magna aliqua uis nostrud.</p><p></p>', '1', '2024-03-22 04:25:41', '2024-03-22 04:25:41'),
(9, 4, 'Md Emon Hossen', '2024-03-21', '+8801909758928', '24', 'Here is the name of this project here', 'View Details', 'uploads/images/potfolio/pf1_891.jpg', 'test', '0', '4', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do \r\neiusmod tempor a ti incididunt ut labore et dolore to in magna aliqua. \r\nUt enim ad minim veniam, quis to the in nostrud.abore et dolore magna \r\naliqua uis nostrud.Lorem ipsum dolor sit amet, in a in to in a \r\nconsectetur.ncididunt ut labore et dolore magna aliqua. Ut enim ad minim\r\n veniam, quis to the in nostrud.abore et dolore magna in a aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod</p>\r\n								<p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis to the in nostrud.abore et dolore magna to in aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. </p>\r\n								<p>ncididunt ut labore et dolore magna aliqua. Ut enim ad minim \r\nveniam, quis to the in nostrud.abore et dolore magna a aliqua uis \r\nnostrud.Lorem ipsum dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis to the in \r\nnostrud.abore et dolore magna aliqua uis nostrud.Lorem ipsum dolor sit \r\namet, in aed do eiusmod. dolor sit amet, in aed do eiusmod.ncididunt ut \r\nlabore et dolore magna aliqua. Ut enim ad minim veniam, quis to the in \r\nnostrud.abore et dolore magna aliqua uis nostrud.</p><p></p>', '1', '2024-03-22 04:26:34', '2024-03-22 04:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `pricing_tables`
--

CREATE TABLE `pricing_tables` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discrption` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pricing_tables`
--

INSERT INTO `pricing_tables` (`id`, `icon`, `title`, `price`, `price_label`, `discrption`, `btn_title`, `btn_url`, `btn_target`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(3, '<i class=\"icofont icofont-ui-cut\"></i>', 'Plastic Suggery', '$199', '/ Per Visit', '<ul class=\"table-list\">\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Lorem ipsum dolor sit</li>\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Cubitur sollicitudin fentum</li>\r\n                        <li class=\"cross\"><i class=\"icofont icofont-ui-close\"></i>Nullam interdum enim</li>\r\n                        <li class=\"cross\"><i class=\"icofont icofont-ui-close\"></i>Donec ultricies metus</li>\r\n                        <li class=\"cross\"><i class=\"icofont icofont-ui-close\"></i>Pellentesque eget nibh</li>\r\n                    </ul>', 'Book Now', '#', '0', '1', '1', '2024-01-18 08:20:27', '2024-01-18 08:20:27'),
(4, '<i class=\"icofont icofont-tooth\"></i>', 'Teeth Whitening', '$299', '/ Per Visit', '<ul class=\"table-list\">\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Lorem ipsum dolor sit</li>\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Cubitur sollicitudin fentum</li>\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Nullam interdum enim</li>\r\n                        <li class=\"cross\"><i class=\"icofont icofont-ui-close\"></i>Donec ultricies metus</li>\r\n                        <li class=\"cross\"><i class=\"icofont icofont-ui-close\"></i>Pellentesque eget nibh</li>\r\n                    </ul>', 'Book Now', '#', '0', '2', '1', '2024-01-18 08:21:27', '2024-01-18 08:21:27'),
(5, '<i class=\"icofont-heart-beat\"></i>', 'Heart Suggery', '$399', '/ Per Visit', '<ul class=\"table-list\">\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Lorem ipsum dolor sit</li>\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Cubitur sollicitudin fentum</li>\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Nullam interdum enim</li>\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Donec ultricies metus</li>\r\n                        <li><i class=\"icofont icofont-ui-check\"></i>Pellentesque eget nibh</li>\r\n                    </ul>', 'Book Now', '#', '0', '3', '1', '2024-01-18 08:22:23', '2024-01-18 08:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `protfolio_galleries`
--

CREATE TABLE `protfolio_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `portfolio_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `protfolio_galleries`
--

INSERT INTO `protfolio_galleries` (`id`, `portfolio_id`, `image`, `created_at`, `updated_at`) VALUES
(7, 6, 'uploads/images/potfolio/gallery/call-bg---Copy-(2)_339.jpg', '2024-03-22 04:23:30', '2024-03-22 04:23:30'),
(8, 6, 'uploads/images/potfolio/gallery/call-bg---Copy-(3)_309.jpg', '2024-03-22 04:23:30', '2024-03-22 04:23:30'),
(9, 6, 'uploads/images/potfolio/gallery/call-bg---Copy_873.jpg', '2024-03-22 04:23:30', '2024-03-22 04:23:30'),
(10, 6, 'uploads/images/potfolio/gallery/call-bg_281.jpg', '2024-03-22 04:23:30', '2024-03-22 04:23:30'),
(11, 7, 'uploads/images/potfolio/gallery/call-bg---Copy-(2)_917.jpg', '2024-03-22 04:24:57', '2024-03-22 04:24:57'),
(12, 7, 'uploads/images/potfolio/gallery/call-bg---Copy-(3)_541.jpg', '2024-03-22 04:24:57', '2024-03-22 04:24:57'),
(13, 7, 'uploads/images/potfolio/gallery/call-bg---Copy_281.jpg', '2024-03-22 04:24:57', '2024-03-22 04:24:57'),
(14, 7, 'uploads/images/potfolio/gallery/call-bg_292.jpg', '2024-03-22 04:24:57', '2024-03-22 04:24:57'),
(15, 8, 'uploads/images/potfolio/gallery/call-bg---Copy-(2)_897.jpg', '2024-03-22 04:25:41', '2024-03-22 04:25:41'),
(16, 8, 'uploads/images/potfolio/gallery/call-bg---Copy-(3)_165.jpg', '2024-03-22 04:25:41', '2024-03-22 04:25:41'),
(17, 8, 'uploads/images/potfolio/gallery/call-bg---Copy_192.jpg', '2024-03-22 04:25:41', '2024-03-22 04:25:41'),
(18, 8, 'uploads/images/potfolio/gallery/call-bg_615.jpg', '2024-03-22 04:25:41', '2024-03-22 04:25:41'),
(21, 9, 'uploads/images/potfolio/gallery/call-bg---Copy_761.jpg', '2024-03-22 04:26:34', '2024-03-22 04:26:34'),
(22, 9, 'uploads/images/potfolio/gallery/call-bg_885.jpg', '2024-03-22 04:26:34', '2024-03-22 04:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `review` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0, = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `review`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 24, '<p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit\r\n                            turpis, vel pretium eros. </p>', '0', '1', '2024-05-13 11:23:01', '2024-05-13 11:23:01'),
(3, 19, '<p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit turpis, vel pretium eros. </p>', '1', '1', '2024-05-14 09:29:07', '2024-05-14 09:29:07'),
(4, 18, '<p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit turpis, vel pretium eros. </p>', '2', '1', '2024-05-14 09:29:20', '2024-05-14 09:29:20'),
(5, 17, '<p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit turpis, vel pretium eros. </p>', '3', '1', '2024-05-14 09:29:33', '2024-05-14 09:29:33'),
(6, 13, '<p>Lorem ipsum dolor sit amet consectetur eliet adipiscing. Aliquam nec suscipit turpis, vel pretium eros. </p>', '4', '1', '2024-05-14 09:29:46', '2024-05-14 09:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2023-12-20 10:16:02', '2023-12-20 10:16:02'),
(2, 'Doctor', 'doctor', '2023-12-20 10:16:03', '2023-12-20 10:16:03'),
(3, 'Client', 'client', '2023-12-20 10:16:03', '2023-12-20 10:16:03');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint UNSIGNED NOT NULL,
  `bullding_id` bigint UNSIGNED NOT NULL,
  `room_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending , 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `bullding_id`, `room_no`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '101', '2', '1', '2024-11-21 11:48:10', '2024-11-22 10:13:17'),
(2, 3, '101', '1', '1', '2024-11-21 11:51:11', '2024-11-22 10:12:58'),
(3, 3, '102', '4', '1', '2024-11-21 12:14:34', '2024-11-22 10:14:06'),
(4, 2, '102', '3', '1', '2024-11-21 12:16:18', '2024-11-22 10:12:39'),
(5, 3, '103', '6', '1', '2024-11-22 10:14:50', '2024-11-22 10:17:59'),
(6, 2, '103', '5', '1', '2024-11-22 10:15:28', '2024-11-22 10:17:47'),
(7, 2, '104', '7', '1', '2024-11-22 10:15:50', '2024-11-22 10:15:50'),
(8, 3, '104', '8', '1', '2024-11-22 10:16:09', '2024-11-22 10:16:09'),
(9, 3, '105', '9', '1', '2024-11-22 10:18:42', '2024-11-22 10:18:42'),
(10, 3, '106', '10', '1', '2024-11-22 10:19:53', '2024-11-22 10:19:53'),
(11, 3, '107', '11', '1', '2024-11-22 10:20:14', '2024-11-22 10:20:14'),
(12, 3, '108', '12', '1', '2024-11-22 10:20:27', '2024-11-22 10:20:27'),
(13, 3, '109', '13', '1', '2024-11-22 10:21:27', '2024-11-22 10:21:27'),
(14, 3, '110', '14', '1', '2024-11-22 10:21:47', '2024-11-22 10:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `btn_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending,1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `icon`, `title`, `sub_title`, `discription`, `btn_title`, `url`, `order_by`, `target`, `status`, `created_at`, `updated_at`) VALUES
(1, '<i class=\"fa fa-ambulance\"></i>', 'Lorem Amet', 'Emergency Cases', '<p>Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus\r\n                                    convallis sodales.</p>', 'LEARN MORE', '#', '1', '0', '1', '2024-01-12 08:17:20', '2024-01-12 08:57:00'),
(2, '<i class=\"icofont-prescription\"></i>', 'Fusce Porttitor', 'Doctors Timetable', '<p>Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus\r\n                                    convallis sodales.</p>', 'LEARN MORE', '#', '2', '0', '1', '2024-01-12 08:18:41', '2024-01-12 08:55:54'),
(3, '<i class=\"icofont-ui-clock\"></i>', 'Donec luctus', 'Opening Hours', '<ul class=\"time-sidual\">\r\n                                    <li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li>\r\n                                    <li class=\"day\">Saturday <span>9.00-18.30</span></li>\r\n                                    <li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li>\r\n                                </ul>', 'LEARN MORE', '#', '3', '0', '1', '2024-01-12 08:20:14', '2024-01-26 06:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fdescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `simage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tdescription` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `name`, `title`, `short_description`, `fimage`, `special_text`, `fdescription`, `simage`, `heading`, `sdescription`, `tdescription`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, '<i class=\"icofont icofont-prescription\"></i>', 'General Treatment', 'Our hospital always provide good services', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'uploads/images/service/service-details-bg_863.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem \r\nmagni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio \r\nrem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?\r\n                    </p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', 'uploads/images/service/signup-bg_858.jpg', 'We always take care <br> our patient', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', '1', '1', '2024-05-22 11:46:20', '2024-06-29 10:47:04'),
(2, '<i class=\"icofont icofont-tooth\"></i>', 'Teeth Whitening', 'Our hospital always provide good services', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', 'uploads/images/service/service-details-bg_663.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem \r\nmagni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio \r\nrem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?\r\n                    </p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', 'uploads/images/service/signup-bg_610.jpg', 'We always take care <br> our patient', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p></p>', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p></p><p></p>', '2', '1', '2024-05-22 11:47:42', '2024-06-29 10:46:54'),
(3, '<i class=\"icofont icofont-heart-alt\"></i>', 'Heart Surgery', 'Our hospital always provide good services', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', 'uploads/images/service/service-details-bg_345.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem \r\nmagni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio \r\nrem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?\r\n                    </p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', 'uploads/images/service/signup-bg_228.jpg', 'We always take care <br> our patient', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p><p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p></p>', '3', '1', '2024-05-22 11:48:51', '2024-06-29 10:46:45'),
(4, '<i class=\"icofont icofont-listening\"></i>', 'Ear Treatment', 'Our hospital always provide good services', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p></p>', 'uploads/images/service/service-details-bg_990.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem \r\nmagni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio \r\nrem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?\r\n                    </p>', 'uploads/images/service/signup-bg_669.jpg', 'We always take care <br> our patient', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem \r\nmagni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio \r\nrem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?\r\n                    </p><p></p>', '4', '1', '2024-05-22 11:49:59', '2024-06-29 10:46:09'),
(5, '<i class=\"icofont icofont-eye-alt\"></i>', 'Vision Problems', 'Our hospital always provide good services', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p></p>', 'uploads/images/service/service-details-bg_831.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem \r\nmagni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio \r\nrem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?\r\n                    </p>', 'uploads/images/service/signup-bg_848.jpg', 'We always take care <br> our patient', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem \r\nmagni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio \r\nrem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?\r\n                    </p><p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', '5', '1', '2024-05-22 11:51:04', '2024-06-29 10:46:27'),
(6, '<i class=\"icofont icofont-blood\"></i>', 'Blood Transfusion', 'Our hospital always provide good services', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', 'uploads/images/service/service-details-bg_140.jpg', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio rem \r\nmagni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint optio \r\nrem magni, dolorum aut vel nostrum quae, fugit necessitatibus eius \r\nperferendis. Quia optio tenetur pariatur aliquam obcaecati enim quam \r\neum?\r\n                    </p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', 'uploads/images/service/signup-bg_208.jpg', 'We always take care <br> our patient', '<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto \r\nblanditiis obcaecati veritatis magnam pariatur molestiae in maxime. \r\nAnimi quae vitae in inventore. Totam mollitia aspernatur provident \r\nveniam aperiam placeat impedit! Lorem ipsum dolor sit amet, consectetur \r\nadipisicing elit. Saepe rem natus nobis, dolorum nam excepturi iure \r\nautem nemo ducimus temporibus facere, est eum voluptatem, culpa optio \r\nfugit assumenda quod? Praesentium.</p>\r\n                            <p>Lorem ipsum dolor sit amet consectetur \r\nadipisicing elit. Id, laudantium ullam, iure distinctio officia libero \r\nvoluptatem obcaecati vero deleniti minima nemo itaque alias nisi eveniet\r\n soluta architecto quae laboriosam unde.</p><p></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p><p>Lorem Ipsum is simply dummy text of the printing and typesetting \r\nindustry. Lorem Ipsum has been the industry\'s standard dummy text ever \r\nsince the 1500s, when an unknown printer took a galley of type and \r\nscrambled it to make a type specimen book. It has survived not only five\r\n centuries, but also the leap into electronic typesetting, remaining \r\nessentially unchanged. It was popularised in the 1960s with the release \r\nof Letraset sheets containing Lorem Ipsum passages, and more recently \r\nwith desktop publishing software like Aldus PageMaker including versions\r\n of Lorem Ipsum.</p>', '6', '1', '2024-05-22 11:52:01', '2024-06-29 10:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `option_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `option_key`, `option_value`, `created_at`, `updated_at`) VALUES
(5, 'funfact_image', 'uploads/images/section-bg/fun-bg_565.jpg', '2024-05-11 10:49:12', '2024-05-12 10:10:19'),
(6, 'call_action_image', 'uploads/images/theme-image/call-bg_134_455.jpg', '2024-05-11 11:29:53', '2024-08-01 11:44:53'),
(7, 'testimonials_image', 'uploads/images/section-bg/testi-bg_591.jpg', '2024-05-11 11:51:51', '2024-05-12 10:12:40'),
(8, 'team_image', 'uploads/images/section-bg/testi-bg_648.jpg', '2024-05-12 09:38:29', '2024-05-12 10:12:46'),
(9, 'client_image', 'uploads/images/section-bg/client-bg_740.jpg', '2024-05-12 09:45:40', '2024-05-12 10:12:54'),
(10, 'breadcrumb_image', 'uploads/images/section-bg/bread-bg_671.jpg', '2024-05-12 09:53:17', '2024-05-12 10:14:41'),
(11, 'common_image', 'uploads/images/section-bg/section-img_928.png', '2024-05-12 10:22:56', '2024-05-12 10:46:33'),
(12, 'common_white_image', 'uploads/images/section-bg/section-img2_498.png', '2024-05-12 10:46:39', '2024-05-12 10:46:39'),
(13, 'con_title', 'Contact With Us', '2024-07-25 11:16:42', '2024-07-25 11:18:35'),
(14, 'con_sub_title', 'If you have any questions please fell free to contact with us.', '2024-07-25 11:16:42', '2024-07-25 11:18:35'),
(15, 'con_map_url', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.4076948981037!2d90.36399517595868!3d23.804097386711568!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0d0ca0ef3cf%3A0x6956b18efc000d59!2sIslami%20Shamaj%20Kalyan%20Masjid!5e0!3m2!1sen!2sbd!4v1721928029019!5m2!1sen!2sbd\" width=\"400\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2024-07-25 11:16:42', '2024-07-25 11:20:57'),
(16, 'con_phone_number', '+(000) 1234 56789', '2024-07-25 11:16:42', '2024-07-25 11:18:35'),
(17, 'con_email', 'info@company.com', '2024-07-25 11:16:42', '2024-07-25 11:18:35'),
(18, 'con_address', '2 Fir e Brigade Road', '2024-07-25 11:16:42', '2024-07-25 11:18:35'),
(19, 'con_address_two', 'Chittagonj, Lakshmipur', '2024-07-25 11:16:42', '2024-07-25 11:18:35'),
(20, 'con_open_day', 'Mon - Sat: 8am - 5pm', '2024-07-25 11:16:42', '2024-07-25 11:18:35'),
(21, 'con_weekend_day', 'Sunday Closed', '2024-07-25 11:16:42', '2024-07-25 11:18:35'),
(22, 'con_terms_and_condition', 'Do you want to subscribe our Newsletter ?', '2024-07-25 11:52:53', '2024-07-25 11:52:53'),
(23, 'theme_phone', '+880 1234 56789', '2024-07-30 11:27:17', '2024-07-30 11:27:17'),
(24, 'theme_email', 'support@yourmail.com', '2024-07-30 11:27:17', '2024-07-30 11:27:17'),
(25, 'theme_primary_logo', 'uploads/images/theme-image/logso_908.png', '2024-07-30 11:27:17', '2024-07-30 11:27:17'),
(26, 'theme_secondary_logo', 'uploads/images/theme-image/dark-logo_216.png', '2024-07-30 11:27:17', '2024-07-30 11:27:17'),
(27, 'theme_btn_text', 'Book Appointment', '2024-07-30 11:27:17', '2024-07-30 11:27:17'),
(28, 'theme_btn_url', '#', '2024-07-30 11:27:17', '2024-07-30 11:27:17'),
(29, 'feautes_title', 'We Are Always Ready to Help You & Your Family', '2024-07-30 11:43:38', '2024-07-30 11:43:38'),
(30, 'feautes_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts', '2024-07-30 11:43:38', '2024-07-30 11:43:38'),
(31, 'why_choose_section_title', 'We Offer Different Services To Improve Your Health', '2024-08-01 11:02:16', '2024-08-01 11:02:16'),
(32, 'why_choose_section_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts', '2024-08-01 11:02:16', '2024-08-01 11:02:16'),
(33, 'why_choose_title', 'Who We Are', '2024-08-01 11:02:16', '2024-08-01 11:02:16'),
(34, 'why_choose_youtube_url', 'https://www.youtube.com/watch?v=FUCIFwYXh8g', '2024-08-01 11:02:16', '2024-08-01 11:02:16'),
(35, 'why_choose_f_title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas pharetra antege vel est\r\n                            lobortis, a commodo magna rhoncus. In quis nisi non emet quam pharetra commodo. </p>', '2024-08-01 11:02:16', '2024-08-01 11:02:16'),
(36, 'why_choose_s_title', '<p>Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\r\n                        </p>', '2024-08-01 11:02:16', '2024-08-01 11:02:16'),
(37, 'why_choose_t_title', '<div class=\"col-lg-6\">\r\n                                <ul class=\"list\"><li><i class=\"fa fa-caret-right\"></i>Maecenas vitae luctus nibh. </li><li><i class=\"fa fa-caret-right\"></i>Duis massa massa.</li><li><i class=\"fa fa-caret-right\"></i>Aliquam feugiat interdum.</li></ul>\r\n                            </div>\r\n                            <div class=\"col-lg-6\">\r\n                                <ul class=\"list\"><li><i class=\"fa fa-caret-right\"></i>Maecenas vitae luctus nibh. </li><li><i class=\"fa fa-caret-right\"></i>Duis massa massa.</li><li><i class=\"fa fa-caret-right\"></i>Aliquam feugiat interdum.</li></ul>\r\n                            </div><p></p>', '2024-08-01 11:02:16', '2024-08-01 11:02:16'),
(38, 'why_choose_image', 'uploads/images/theme-image/video-bg_1721_546.jpg', '2024-08-01 11:02:16', '2024-08-01 11:02:16'),
(39, 'call_to_title', 'Do you need Emergency Medical Care? Call @ 1234 56789', '2024-08-01 11:44:53', '2024-08-01 11:54:19'),
(40, 'call_to_f_btn_title', 'Contact Now', '2024-08-01 11:44:53', '2024-08-01 11:44:53'),
(41, 'call_to_f_btn_url', '#', '2024-08-01 11:44:53', '2024-08-01 11:44:53'),
(42, 'call_to_f_btn_target', '0', '2024-08-01 11:44:53', '2024-08-01 11:44:53'),
(43, 'call_to_l_btn_title', 'Learn More', '2024-08-01 11:44:53', '2024-08-01 11:44:53'),
(44, 'call_to_l_btn_url', '#', '2024-08-01 11:44:53', '2024-08-01 11:44:53'),
(45, 'call_to_l_btn_target', '0', '2024-08-01 11:44:53', '2024-08-01 11:44:53'),
(46, 'call_to_sub_title', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque porttitor dictum turpis nec gravida.<br></p>', '2024-08-01 11:44:53', '2024-08-01 11:44:53'),
(47, 'portfolio_section_title', 'We Maintain Cleanliness Rules Inside Our Hospital', '2024-08-01 12:00:04', '2024-08-01 12:00:04'),
(48, 'portfolio_section_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts', '2024-08-01 12:00:04', '2024-08-01 12:00:04'),
(49, 'services_section_title', 'We Offer Different Services To Improve Your Health', '2024-08-01 12:05:40', '2024-08-01 12:05:40'),
(50, 'services_section_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts', '2024-08-01 12:05:40', '2024-08-01 12:05:40'),
(51, 'testimonials_section_title', 'What Our Patients Say About Our Medical Treatments', '2024-08-01 12:16:54', '2024-08-01 12:16:54'),
(52, 'departments_section_title', 'We Offer Different Departments To Diagnose Your Diseases', '2024-08-01 12:24:44', '2024-08-01 12:24:44'),
(53, 'pricing_section_title', 'We Provide You The Best Treatment In Resonable Price', '2024-08-01 12:40:32', '2024-08-01 12:40:32'),
(54, 'pricing_section_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts', '2024-08-01 12:40:32', '2024-08-01 12:40:32'),
(55, 'team_section_title', 'We Have Specialist Doctors To Solve Your Problems', '2024-08-01 12:47:54', '2024-08-01 12:47:54'),
(56, 'team_section_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts', '2024-08-01 12:47:54', '2024-08-01 12:47:54'),
(57, 'blog_section_title', 'Keep up with Our Most Recent Medical News.', '2024-08-01 12:58:05', '2024-08-01 12:58:05'),
(58, 'blog_section_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts', '2024-08-01 12:58:05', '2024-08-01 12:58:05'),
(59, 'appointment_section_title', 'We Are Always Ready to Help You. Book An Appointment', '2024-08-01 13:33:08', '2024-08-01 13:33:08'),
(60, 'appointment_section_description', 'Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts', '2024-08-01 13:33:08', '2024-08-01 13:33:08'),
(61, 'appointment_title', '( We will be confirm by an Text Message )', '2024-08-01 13:33:08', '2024-08-01 13:33:08'),
(62, 'appointment_btn_title', 'Book An Appointment', '2024-08-01 13:33:08', '2024-08-01 13:33:08'),
(63, 'appointment_btn_url', '#', '2024-08-01 13:33:08', '2024-08-01 13:33:08'),
(64, 'appointment_image', 'uploads/images/theme-image/contact-img_627_278.png', '2024-08-01 13:33:08', '2024-08-01 13:33:08'),
(65, 'newsletter_section_title', 'Sign up for Newsletter', '2024-08-01 13:47:27', '2024-08-01 13:47:27'),
(66, 'newsletter_section_description', 'Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu, homero alterum.', '2024-08-01 13:47:27', '2024-08-01 13:47:27'),
(67, 'facebook', 'facebook', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(68, 'twitter', 'twitter', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(69, 'linkedin', 'linkedin', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(70, 'instagram', 'instagram', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(71, 'youtube', 'youtube', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(72, 'whatsapp', 'whatsapp', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(73, 'tiktok', 'tiktok', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(74, 'telegram', 'telegram', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(75, 'pinterest', 'pinterest', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(76, 'reddit', 'reddit', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(77, 'quora', 'quora', '2024-08-01 14:21:18', '2024-08-01 14:21:18'),
(78, 'footer_title', '<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>', '2024-08-02 05:21:13', '2024-08-02 05:21:13'),
(79, 'quik_links_left', '<li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>Home</a></li>\r\n                                        <li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>About Us</a></li>\r\n                                        <li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>Services</a></li>\r\n                                        <li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>Our Cases</a></li>\r\n                                        <li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>Pricing</a></li>', '2024-08-02 05:21:13', '2024-08-02 05:31:42'),
(80, 'quik_links_right', '<li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>Consuling</a></li>\r\n                                        <li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>Finance</a></li>\r\n                                        <li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>Testimonials</a></li>\r\n                                        <li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>FAQ</a></li>\r\n                                        <li><a href=\"\"><i class=\"fa fa-caret-right\" aria-hidden=\"true\"></i>Contact Us</a></li>', '2024-08-02 05:21:13', '2024-08-02 05:31:42'),
(81, 'open_hours_title', '<p>Lorem ipsum dolor sit ame consectetur adipisicing elit do eiusmod tempor incididunt.</p>', '2024-08-02 05:21:13', '2024-08-02 05:21:13'),
(82, 'open_hours_time', '<ul class=\"time-sidual\"><li class=\"day\">Monday - Fridayp <span>8.00-20.00</span></li><li class=\"day\">Saturday <span>9.00-18.30</span></li><li class=\"day\">Monday - Thusday <span>9.00-15.00</span></li></ul><p></p>', '2024-08-02 05:21:13', '2024-08-02 05:21:13'),
(83, 'newslettter_title', '<p>Subscribe to our newsletter to get allour news in your inbox.. Lorem ipsum dolor sit amet,\r\n                            consectetur adipisicing elit,</p>', '2024-08-02 05:21:13', '2024-08-02 05:21:13'),
(84, 'copy_rignts', '<p>© Copyright 2024 | All Rights Reserved by <a href=\"http://127.0.0.1:8000/#\" target=\"\">MEDIPLUS</a></p>', '2024-08-02 05:21:13', '2024-08-02 05:21:13'),
(85, 'favicon', 'uploads/images/theme-image/Untitled_734.png', '2024-08-02 09:39:56', '2024-08-02 09:39:56'),
(86, 'time_table_title', 'Determine Your Date to Come', '2024-08-06 10:54:00', '2024-08-06 10:55:19'),
(87, 'time_table_description', '<p>Lorem ipsum dolor sit amet consectetur adipiscing elit praesent aliquet. pretiumts</p>', '2024-08-06 10:54:00', '2024-08-06 10:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `silder_sections`
--

CREATE TABLE `silder_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `f_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_spcial_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_spcial_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_btn_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_btn_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `f_btn_target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_btn_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_btn_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_btn_target` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending , 1 = Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `silder_sections`
--

INSERT INTO `silder_sections` (`id`, `f_title`, `f_spcial_title`, `l_title`, `l_spcial_title`, `description`, `f_btn_title`, `f_btn_url`, `f_btn_target`, `l_btn_title`, `l_btn_url`, `l_btn_target`, `image`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'We Provide', 'Medical', 'Services That You Can', 'Trust!', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl pellentesque, faucibus libero eu, gravida quam. <br></p>', 'Get Appointment', '#', '0', 'Learn More', '#', '0', 'uploads/images/silders/slider2_563.jpg', '1', '1', '2024-01-08 10:36:38', '2024-01-09 09:37:35'),
(2, 'We Provide', 'Medical', 'Services That You Can', 'Trust!', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl<br>pellentesque, faucibus libero eu, gravida quam. <br></p>', 'Get Appointment', '#', '0', 'Conatct Now', '#', '0', 'uploads/images/silders/slider_685.jpg', '2', '1', '2024-01-09 09:41:03', '2024-01-09 09:41:31'),
(3, 'We Provide', 'Medical', 'Services That You Can', 'Trust!', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris sed nisl<br>pellentesque, faucibus libero eu, gravida quam. <br></p>', 'Conatct Now', '#', '0', 'Conatct Now', '#', '0', 'uploads/images/silders/slider3_980.jpg', '3', '1', '2024-01-09 09:42:43', '2024-01-09 09:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `slot_models`
--

CREATE TABLE `slot_models` (
  `id` bigint UNSIGNED NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_zone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slot_models`
--

INSERT INTO `slot_models` (`id`, `start_time`, `start_zone`, `end_time`, `end_zone`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, '09:00', 'AM', '09:30', 'AM', '1', '1', '2024-07-29 10:50:22', '2024-07-29 10:50:22'),
(2, '09:30', 'AM', '10:00', 'AM', '2', '1', '2024-07-29 10:59:15', '2024-07-29 10:59:15'),
(3, '10:00', 'AM', '10:30', 'AM', '3', '1', '2024-07-29 10:59:52', '2024-07-29 10:59:52'),
(4, '10:30', 'AM', '11:00', 'AM', '4', '1', '2024-07-29 11:01:54', '2024-07-29 11:01:54'),
(5, '11:00', 'AM', '11:30', 'AM', '5', '1', '2024-07-29 11:02:28', '2024-07-29 11:02:28'),
(6, '11:30', 'AM', '12:00', 'PM', '6', '1', '2024-07-29 11:04:01', '2024-07-29 11:04:01'),
(7, '12:00', 'PM', '12:30', 'PM', '7', '1', '2024-07-29 11:05:25', '2024-07-29 11:05:25'),
(8, '12:30', 'PM', '01:00', 'PM', '8', '1', '2024-07-29 11:05:59', '2024-07-29 11:05:59'),
(9, '02:00', 'PM', '02:30', 'PM', '9', '1', '2024-07-29 11:06:44', '2024-07-29 11:06:44'),
(10, '02:30', 'PM', '03:00', 'PM', '10', '1', '2024-07-29 11:07:21', '2024-07-29 11:07:21'),
(11, '03:00', 'PM', '03:30', 'PM', '11', '1', '2024-07-29 11:08:13', '2024-07-29 11:08:13'),
(12, '03:30', 'PM', '04:00', 'PM', '12', '1', '2024-07-29 11:08:50', '2024-07-29 11:08:50'),
(13, '04:00', 'PM', '04:30', 'PM', '13', '1', '2024-07-29 11:09:25', '2024-07-29 11:09:25'),
(14, '04:30', 'PM', '05:00', 'PM', '14', '1', '2024-07-29 11:09:51', '2024-07-29 11:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `socal_media`
--

CREATE TABLE `socal_media` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `target` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Same Page, 1 = New Tab',
  `order_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending , 1 = Publish',
  `class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socal_media`
--

INSERT INTO `socal_media` (`id`, `icon`, `name`, `url`, `target`, `order_by`, `status`, `class`, `created_at`, `updated_at`) VALUES
(2, '<i class=\"fa fa-facebook\"></i>', 'Facebook', 'https://www.facebook.com/sharer/sharer.php?u=', '0', '1', '1', '#3b579d', '2024-01-24 10:23:55', '2024-01-30 10:27:15'),
(3, '<i class=\"fa fa-twitter\"></i>', 'Twitter', 'https://twitter.com/intent/tweet?url=&text=', '0', '2', '1', '#2caae1', '2024-01-24 10:24:51', '2024-01-30 10:27:34'),
(4, '<i class=\"fa fa-google-plus\"></i>', 'Google', 'https://plus.google.com/share?url=', '0', '3', '1', '#dc4a38', '2024-01-24 10:25:58', '2024-01-30 10:31:18'),
(5, '<i class=\"fa fa-linkedin\"></i>', 'Linkedin', 'http://www.linkedin.com/shareArticle?mini=true&url=&title=', '0', '4', '1', '#0177b5', '2024-01-24 10:26:25', '2024-01-30 10:28:11'),
(6, '<i class=\"fa fa-pinterest\"></i>', 'Pinterest', 'http://pinterest.com/pin/create/button/?url=&media=&description=', '0', '5', '1', '#cc2127', '2024-01-24 10:26:47', '2024-01-30 10:27:57');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 = Pending , 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'qicy@mailinator.com', '1', '2024-02-02 11:00:39', '2024-02-02 11:00:39'),
(2, 'mamurjorbd@gmail.com', '1', '2024-02-02 11:04:11', '2024-02-02 11:04:11'),
(3, 'macefe4099@ikuromi.com', '1', '2024-02-02 11:05:24', '2024-02-02 11:05:24'),
(4, 'mamurjor.emon@gmail.com', '1', '2024-02-02 11:05:46', '2024-02-02 11:05:46'),
(5, 'hynycyfyg@mailinator.com', '1', '2024-08-15 13:11:38', '2024-08-15 13:11:38'),
(6, 'nacy@mailinator.com', '1', '2024-08-17 12:15:13', '2024-08-17 12:15:13'),
(7, 'pumicopagi@mailinator.com', '1', '2024-08-17 12:15:22', '2024-08-17 12:15:22'),
(8, 'kedijev@mailinator.com', '1', '2024-08-17 12:15:30', '2024-08-17 12:15:30'),
(9, 'xojeve@mailinator.com', '1', '2024-08-17 12:15:37', '2024-08-17 12:15:37'),
(10, 'xelehuwop@mailinator.com', '1', '2024-08-17 12:16:10', '2024-08-17 12:16:10'),
(11, 'zefuqohe@mailinator.com', '1', '2024-08-17 12:16:11', '2024-09-16 18:00:00'),
(12, 'cobocufo@mailinator.com', '1', '2024-08-17 12:16:18', '2024-08-17 12:16:18'),
(13, 'gapurus@mailinator.com', '1', '2024-08-17 12:16:24', '2024-08-17 12:16:24'),
(14, 'kaxu@mailinator.com', '1', '2024-08-28 11:48:05', '2024-08-28 11:48:05'),
(15, 'kypax@mailinator.com', '1', '2024-08-28 11:48:05', '2024-08-28 11:48:05');

-- --------------------------------------------------------

--
-- Table structure for table `time_page_models`
--

CREATE TABLE `time_page_models` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `day_id` bigint UNSIGNED NOT NULL,
  `time_id` bigint UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending, 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_page_models`
--

INSERT INTO `time_page_models` (`id`, `user_id`, `day_id`, `time_id`, `status`, `created_at`, `updated_at`) VALUES
(19, 3, 2, 1, '1', '2024-08-09 11:59:46', '2024-08-09 11:59:46'),
(20, 9, 2, 3, '1', '2024-08-09 12:00:03', '2024-08-09 12:00:03'),
(21, 25, 3, 1, '1', '2024-08-09 12:00:22', '2024-08-09 12:00:22'),
(22, 14, 2, 6, '1', '2024-08-09 12:00:35', '2024-08-09 12:00:35'),
(23, 17, 7, 2, '1', '2024-08-09 12:00:48', '2024-08-09 12:00:48'),
(24, 14, 6, 2, '1', '2024-08-09 12:01:00', '2024-08-09 12:01:00'),
(25, 11, 7, 3, '1', '2024-08-09 12:01:12', '2024-08-09 12:01:12'),
(26, 17, 6, 6, '1', '2024-08-09 12:01:24', '2024-08-09 12:01:24'),
(27, 14, 5, 3, '1', '2024-08-09 12:01:36', '2024-08-09 12:01:36'),
(28, 15, 5, 2, '1', '2024-08-09 12:01:50', '2024-08-09 12:01:50'),
(29, 17, 7, 6, '1', '2024-08-09 12:02:04', '2024-08-09 12:02:04'),
(30, 14, 6, 3, '1', '2024-08-09 12:02:16', '2024-08-09 12:02:16'),
(31, 25, 8, 4, '1', '2024-08-09 12:02:35', '2024-08-09 12:02:35'),
(32, 25, 3, 3, '1', '2024-08-09 12:02:59', '2024-08-09 12:02:59'),
(33, 10, 2, 4, '1', '2024-08-09 12:03:16', '2024-08-09 12:05:08'),
(34, 15, 6, 1, '1', '2024-08-09 12:05:22', '2024-08-09 12:05:22');

-- --------------------------------------------------------

--
-- Table structure for table `time_tables`
--

CREATE TABLE `time_tables` (
  `id` bigint UNSIGNED NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Pending , 1 = Publish',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_tables`
--

INSERT INTO `time_tables` (`id`, `time`, `order_by`, `status`, `created_at`, `updated_at`) VALUES
(1, '09:00', '1', '1', '2024-08-07 10:14:53', '2024-08-07 10:26:14'),
(2, '12:00', '2', '1', '2024-08-07 10:15:10', '2024-08-07 10:15:10'),
(3, '15:00', '3', '1', '2024-08-07 10:16:15', '2024-08-07 10:26:06'),
(4, '18:00', '4', '1', '2024-08-07 10:16:27', '2024-08-07 10:25:56'),
(6, '23:00', '5', '1', '2024-08-09 10:55:29', '2024-08-09 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 = Active, 2 = Pending, 3 = Cancel',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `verify_code`, `avatar`, `phone`, `country`, `city`, `state`, `zip_code`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ayon', 'Emon', 'admin@gmail.com', '2023-12-20 16:17:19', '$2y$12$8tCvwvtUZJdjplBQssk3DexCkx8MKpO9M27VQlK2QQkI9x7474Z/2', NULL, 'uploads/images/profile/team1_658.jpg', '01834507987', NULL, NULL, NULL, NULL, '1', NULL, '2023-12-20 10:16:03', '2024-08-12 11:37:24'),
(2, 2, 'Doctor', 'Doctor', 'doctor@gmail.com', '2024-08-15 12:22:37', '$2y$12$3nyb4H9Azm9UScJsmNom4umMZfy764VVm0vCgApntQg.VEGZm3AMK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-12-20 10:16:03', '2024-08-15 12:22:37'),
(3, 3, 'Client', 'Client', 'client@gmail.com', '2023-12-06 18:00:00', '$2y$12$BwK0UXDc1sJRkxj6n2/qsO.o8XTT/W.Ak/0fcbJECffN72j1kkHX.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-12-20 10:16:03', '2024-03-26 10:18:44'),
(8, 2, 'Lee', 'Irma', 'magago9516@glaslack.com', '2024-08-15 12:26:44', '$2y$12$lhyHNf1CbBxhLp4HfLUdseB44XEVH.I3NN/gBbsT6mc6B87N1jXXW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-12-31 10:51:44', '2024-08-15 12:26:44'),
(9, 2, 'Ifeoma', 'Fitzgerald', 'sebebav559@nimadir.com', '2024-03-25 18:00:00', '$2y$12$WCOT8t1hYuLboqyPl2hEJ.6Eo8z2IffQrojipAvXHkP5Ubv4GbTZW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '4kLSVMK8Fx2MiaVJbhtd1AOgLFxVwMBNzrPPckpz4iPdtmAi5labJBn5jpnN', '2023-12-31 10:52:03', '2024-03-26 11:18:03'),
(10, 2, 'Brenden', 'Celeste', 'nepeh@mailinator.com', '2024-05-16 11:49:49', '$2y$12$MwsrsGAMXrXY1AYeCPiS9.5xk1UVnpepA9qgLwRr49HfVtrYCIlKi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'wEdyLUlU13zucd5Fuhv1Xr9c0u6fg0d5cJrZiZMQCKN7LwEj2iKzuYCjpMMD', '2023-12-31 10:57:25', '2024-05-16 11:49:49'),
(11, 2, 'Helen', 'Joseph', 'lyva@mailinator.com', '2024-05-16 11:48:38', '$2y$12$QW7eBByNOCB6CpMUGRLIHefsL5UU6QvpkL6Gw/It/WduBjCqdCPlu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'yiYmpm9NIv2vcZUL1rjnFA44QyL8Ejvj25MxDUlMsBq6AtDgi3vraj1DiLOa', '2023-12-31 10:58:16', '2024-05-16 11:48:38'),
(12, 3, 'Tatiana', 'Signe', 'piviresaj@mailinator.com', NULL, '$2y$12$nf2RrMDfwRMFI0nui64r1OOgjj9ntH/Tfy0AyaUmcyKCHeVm0ytUW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'UqIcqRg0YtCjuDqy32FKGgJdPXRhgpy53LyCabDDMOD39CYaJTXVjrzp82sU', '2023-12-31 11:18:01', '2023-12-31 11:18:01'),
(13, 3, 'Sebastian', 'Madeline', 'woreqy@mailinator.com', NULL, '$2y$12$UbTIVi4miiDd3I5s2U0wyOzB5eSOIStlJZ4YWxgGGxontovAtNLY.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'LKmS1kYqficf6jJ8WIEeenSTD3XnH7aPDvtGFowCtkp47C6jIZjvPvNQ5Lz5', '2023-12-31 11:18:51', '2023-12-31 11:18:51'),
(14, 2, 'Cedric', 'Coby', 'ganima6299@watrf.com', '2024-05-12 11:56:34', '$2y$12$RIZprtIZEL5u3mUMKQFe7.r/DiiUJrybxVA50dbVBjUVszKzhKxQi', 'h6khyMCsLUZ7dMNSfGDTMzzZJsZcdBR2DIBdkA7uLxSMQqpdWIs1H9eAenp09Oya', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2023-12-31 11:41:10', '2024-05-12 11:56:34'),
(15, 2, 'Hiram', 'Audra', 'wetoge9072@watrf.com', '2024-05-16 11:45:16', '$2y$12$xbfUl9CgxGCjARRrd9Jdl.dzRbZiKl/4aos1SaQPGnl8XWmzrBGf6', 'zuN5Doni4937sg1cPsvJBN1qEzryItMOoKhCQcuqGGiuzhTe0M571d6evtQW0OOa', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'ivggiSIUlVSECIUspmzeAZzp8wrtqsNl2T4ImyopE3Ag3YTkunFzxYGYry27', '2023-12-31 11:43:56', '2024-05-16 11:45:16'),
(16, 3, 'Noble', 'Walker', 'lahovam405@wenkuu.com', '2024-01-01 19:56:53', '$2y$12$GG3ZnG9s4T8rWVolz6OnDucGV4pqzDCzHdNRx0Dyj5to6G2hDJ5Zy', 'OF9x4G5XfFNV3u3n0IvqzlSXHQNnPnDR0w5PbKWozp7zAeBHQblTrcWH1vEcQYv5', NULL, NULL, NULL, NULL, NULL, NULL, '1', '4UbTvtcC6HoBnooSkewT16egIiM4efb8mYjUTZ6oYyvJqXM73oiVmHsTehEH', '2024-01-02 07:56:18', '2024-01-02 07:56:53'),
(17, 2, 'Oleg', 'Tashya', 'desiv73619@vkr1.com', '2024-05-16 11:46:42', '$2y$12$krQ2vxeXJZe88gNCe0k28Owu7NmHg2aXz4SJpJaeiqMnNQPVWItxG', 'Uc0NUe5V7f715T5kBGzWLfhyYAVI3OaWuVqodddAZ7486ENTBaUpCtiFJVqXysEG', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-01-02 07:58:38', '2024-05-16 11:46:42'),
(18, 3, 'TaShya', 'Ulysses', 'lirid18569@vkr1.com', NULL, '$2y$12$2domN.LD1QQDs4v4LeObDOqvPhlizy8CnCs9g7nkpNysrj2ZU9wrC', '6Ez0cDTwxW8ZEo0UaJFBZp1ILWq30IVYqOOdadBCjzgfjAFLsfS5KRfXafnxICTd', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'nJH4jGIv3kwdPVkzXi4PA16v0c72ISbhOlZ9UjOSBZFfOFVq97Wz902pYHpU', '2024-01-02 08:00:50', '2024-01-02 08:00:50'),
(19, 3, 'Amos', 'Kuame', 'rinagoj120@vkr1.com', NULL, '$2y$12$zMsSldAoDQFtejfHPkpNmeyJTVeBrhnT/cwu6sgZG3g9YoPOzMAGG', 'fvj7fzu6lZ06ET2yK37wEm24yvjVU93GHMxij8yv6teA976huI5lfrXscadpZpGK', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'UhaA7V7SzYCRNxDebZ8ljULB47SVGY7hCv9SjqgwYzglBwXBUl12xFa8oi2R', '2024-01-02 08:07:43', '2024-01-02 08:07:43'),
(20, 1, 'Colton', 'Hyatt', 'pyvylijab@mailinator.com', NULL, '$2y$12$2Qe.SmaMT5uq/.Eu5ZcRveXxZeL7Vr8gWVsMsff66esxtIF2FPn.S', 'uLRUtVXfgQm82PDMqGVUH4HWR7JafwORSTVSWkQkMQdkd1gkFI5Qd4CiYdFQwoZo', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-01-02 08:12:05', '2024-03-01 09:52:48'),
(21, 3, 'Basia', 'Fredericka', 'wopuropat@mailinator.com', NULL, '$2y$12$hUXd0aC9BnQfzdZPnKrWf.vHKDh.mm2So/pOxl2fTTUMayG.RTlJm', '1WzfDDU4V03hU2KjrEYjbFdv8QSB6VU6byHTDN02xEuBXwx2NiRarPq4o4XZWrjp', NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2024-01-02 08:13:48', '2024-08-15 12:50:04'),
(22, 2, 'Hedy', 'Remedios', 'bowowej120@vkr1.com', '2024-08-15 12:30:17', '$2y$12$wSAxmvoeiPC7wrGbbYwVLOUxFuR2XsXGs9phzVbncxEJQu5KNjLN6', 'sbxDxEv9hXzTF9PlzK2nOQxOalMD6YnS9INYKh6MIBqWz6NNsNxgnx6G09SFUSXY', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'rL4WFrDEosYJsnLTnvKUeheWueJR1kJMUcfIHpFxFmnTZF64UdHZu37RvsfG', '2024-01-02 08:14:31', '2024-08-15 12:30:17'),
(23, 2, 'Kiara', 'Chaney', 'jesaji3487@watrf.com', '2024-08-15 12:35:14', '$2y$12$sz8QvoUaICDf2KKpMyJ7ku.T6Wr4pWuCPxLX2RrRAngTiBRkfCHHW', 'DQR2gdYV2bwpdSKu37uiH9lRxozgBomP7ogGh8h9KoaF279K3fXoERAPXF50Tn2Y', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'lF0GWYiu0neHfE2OqwHwODEKyAp85iMoyvYc4xCMYptPHpmhOwkKFotc6xjQ', '2024-01-02 08:18:48', '2024-08-15 12:35:14'),
(24, 3, 'Chadwick', 'Dolan', 'rawigem876@mnsaf.com', '2024-03-20 22:58:00', '$2y$12$MezrAf.eWfnXthpXmPhiO.MUwnXzKTrjI7OHlUmsJF3F63955MNnC', 'q3YxwGmqpRS2aQ7w76LDs0mrASTzFHhDA38PO6ICpKO41coIkZVJJWoq1xva', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'o5t81VetIZ5vi5aoEB5O81lWscOTptV3dANW7jbb2XuzHQVHNDpYMzuSKHon', '2024-03-21 10:57:40', '2024-03-21 11:17:34'),
(25, 2, 'Lara', 'Kelly', 'foyixe6394@nimadir.com', '2024-05-12 11:55:26', '$2y$12$K5fDLwEhJLCvs70yKIzUDOJhJGWLMmimBofWFxo/vzx/P3E3.2cQy', '', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'xhciNEQb8WRB8WEWu199sCGhhCHq15bIuSSXUbvx0sAFxVEoW71kUqJGGX0T', '2024-03-22 02:25:32', '2024-05-12 11:55:26'),
(26, 3, 'Amanda', 'Mercedes', 'sahep77561@kinsef.com', '2024-07-03 00:20:12', '$2y$12$94uCxeFjF2RmlVuxT0YCjuKkeyDRJSrEwwe3wvsuXmN6PkiGjKpxa', '1ojcxRNt3RDhFFn16UP5wvNBwN9vqzSM4rbjdcHVZ0oOy5kBGXKeSUMX6HE9Q6qk', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'xpyB8LIrWfDcyG76ZzS4lREnMqXz5Gmffg109KQ8L2jbyPk3bUTGtwONqi4n', '2024-07-03 00:19:51', '2024-07-03 00:20:12'),
(27, 2, 'Rina', 'Herrod', 'pamisen673@mvpalace.com', '2024-08-15 12:36:21', '$2y$12$3WXt49hTwbde4QMpseJjGOAI24O15uCBpnsKKghjPlKZ7wXFs0WdW', 'jUGhUyqWQ5vmUAefaDj01GsvvvfCsmvnsz4iFYMVzPisyGp5IIc7EK3TVhMVB5wY', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'd5NVuEGx8kPdM22192nXvLhDFmpLIZqIIdzzHLCuXClXmiaLQt1cHzUtnQe7', '2024-08-09 12:25:27', '2024-08-15 12:36:21'),
(28, 1, 'Dale', 'Eric', 'nicasik181@acpeak.com', '2024-08-12 23:20:05', '$2y$12$HnDV4HryNQOmqHhiCZwX3ugy/AUjQEaQdGxkinF0BBEIzmS03Ymwa', 'lKiCtTQuOicI8NpMMgjKDXY47YgR5dUIsJuxGAIok7DFet8RRZ2xV0m8rduPhuFY', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'SY0m1SsJOyWS8dbGexCqL2030Mjt29dJtwqkDEN8bYoDNQ8kyi8bRRhdu8V7', '2024-08-13 11:19:44', '2024-08-15 12:50:47'),
(79, 3, 'Yvonne', 'Branden', 'muhy@mailinator.com', NULL, '$2y$12$XaF1htDWbiRZEbE2bUgiCOvnDXu3t1z3l6hLOaxYtsVpjVuIPj5Gu', 'pU7PCGEy9Pwdyw3SL171SLBSVlbIzQLUPZ74NubPZbVnmXfsTkEgTAOJcPfLHRiF', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'BSTaqCStm8zWbSTDcRUQ2XwQK01dYFsmmnF5BArhIt1rz4PyRrLFIPTRV5vy', '2024-08-24 11:40:08', '2024-08-24 11:40:08'),
(80, 3, 'Cassidy', 'Iona', 'kopedypet@mailinator.com', NULL, '$2y$12$GM1xbe9/kQC4RPIU5pGtquLrXugn2BJDh3rQQjxRis9D.rjw3hcgW', 'IkE15Sbrf2fhBUOAf2o5HiZ9mFg2lZoh1Pm9dCYhaYY3VF085Gt2U0UJRZISk5Y1', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'wcI5Wpjw7nWjIZuXsc2ODe3b3oxue8x9lKOVkTzqYMZvL2fWvz1upxmE5Tcv', '2024-08-24 11:43:40', '2024-08-24 11:43:40'),
(81, 3, 'Herrod', 'Hope', 'laseboja@mailinator.com', NULL, '$2y$12$5jATXvYf62EV76ZScKGEbOvJOSPed9ThGyXA/UmV8gCr7PbIPpX2O', '0VmLpvmDtH22frPFUQUrfbYzfCDLNl06O92zGKlP7KPLidKB1kyOZ0hQKfOSZh0i', NULL, NULL, NULL, NULL, NULL, NULL, '1', '4SUiSUkyw2xKoC2eJX7eWHNynJQbOQVaJGTiW9tk3Wrsf0bKPIIW8IqioLIt', '2024-08-24 11:45:01', '2024-08-24 11:45:01'),
(82, 3, 'Kalia', 'Helen', 'kypuwyge@mailinator.com', NULL, '$2y$12$/fT5VUYiawdD.eRJi9Srqe5sTjj0/kkaK0I2b.5EDXGnnTyTRz6yS', '6Zhd8AgvOUqrqTZVDG2A4YWjmUGjcyClXcEhh7OeZ2Do6Pw8IrjTaeQZSUfi7ivK', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'Snw2O6qidoZJ8Tu3Ql4N6YW0S1IyIRD6vioo1jMLc5QN2sg8mqoi776II98Q', '2024-08-24 11:45:24', '2024-08-24 11:45:24'),
(83, 3, 'Carson', 'Alfreda', 'dykos@mailinator.com', NULL, '$2y$12$lemANgMmKp6L5U03HDD6q.HEIMmFsLZiDNvonHVOx1wK08fns3hl2', '876cj5FY5ONykh2w6bZcvGedbZjnwoqMKN0K61IurK2AbkP74LQJ5dIUm8nQsdza', NULL, NULL, NULL, NULL, NULL, NULL, '1', 'YfYhmbpyUE0i7vq1vdNtZX8J1nfk3UbO0NB2vwha4R3tBpz7tagHZpejCJX9', '2024-08-24 11:46:45', '2024-08-24 11:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_locations`
--

CREATE TABLE `user_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `region_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_locations`
--

INSERT INTO `user_locations` (`id`, `user_id`, `ip_address`, `country`, `country_code`, `region_code`, `city_name`, `zip_code`, `postal_code`, `area_code`, `created_at`, `updated_at`) VALUES
(1, 27, '8.8.8.8', 'United States', 'US', 'VA', 'Ashburn', '20149', NULL, 'VA', '2024-08-09 12:25:28', '2024-08-09 12:25:28'),
(2, 28, '8.8.8.8', 'United States', 'US', 'VA', 'Ashburn', '20149', NULL, 'VA', '2024-08-13 11:19:46', '2024-08-13 11:19:46'),
(53, 79, '8.8.8.8', 'United States', 'US', 'VA', 'Ashburn', '20149', NULL, 'VA', '2024-08-24 11:40:09', '2024-08-24 11:40:09'),
(54, 80, '8.8.8.8', 'United States', 'US', 'VA', 'Ashburn', '20149', NULL, 'VA', '2024-08-24 11:43:41', '2024-08-24 11:43:41'),
(55, 81, '8.8.8.8', 'United States', 'US', 'VA', 'Ashburn', '20149', NULL, 'VA', '2024-08-24 11:45:02', '2024-08-24 11:45:02'),
(56, 82, '8.8.8.8', 'United States', 'US', 'VA', 'Ashburn', '20149', NULL, 'VA', '2024-08-24 11:45:25', '2024-08-24 11:45:25'),
(57, 83, '8.8.8.8', 'United States', 'US', 'VA', 'Ashburn', '20149', NULL, 'VA', '2024-08-24 11:46:45', '2024-08-24 11:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_address`, `created_at`, `updated_at`) VALUES
(2, '127.0.0.1', '2024-08-14 11:43:58', '2024-08-14 11:43:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_categorie_id_foreign` (`categorie_id`),
  ADD KEY `blogs_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`),
  ADD KEY `blog_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog_tags`
--
ALTER TABLE `blog_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulldings`
--
ALTER TABLE `bulldings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bulldings_name_unique` (`name`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form_models`
--
ALTER TABLE `contact_form_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_form_models_email_unique` (`email`);

--
-- Indexes for table `day_models`
--
ALTER TABLE `day_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `day_models_name_unique` (`name`);

--
-- Indexes for table `department_models`
--
ALTER TABLE `department_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_models`
--
ALTER TABLE `doctor_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_models_user_id_foreign` (`user_id`),
  ADD KEY `doctor_models_department_id_foreign` (`department_id`),
  ADD KEY `doctor_models_room_id_foreign` (`room_id`),
  ADD KEY `doctor_models_bullding_id_foreign` (`bullding_id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feautes`
--
ALTER TABLE `feautes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fun_facts`
--
ALTER TABLE `fun_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `patient_appontments`
--
ALTER TABLE `patient_appontments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patient_appontments_user_id_foreign` (`user_id`),
  ADD KEY `patient_appontments_doctor_id_foreign` (`doctor_id`),
  ADD KEY `patient_appontments_slot_id_foreign` (`slot_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `porfolio_categories`
--
ALTER TABLE `porfolio_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_sections_category_id_foreign` (`category_id`);

--
-- Indexes for table `pricing_tables`
--
ALTER TABLE `pricing_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `protfolio_galleries`
--
ALTER TABLE `protfolio_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `protfolio_galleries_portfolio_id_foreign` (`portfolio_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_bullding_id_foreign` (`bullding_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `silder_sections`
--
ALTER TABLE `silder_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slot_models`
--
ALTER TABLE `slot_models`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slot_models_start_time_unique` (`start_time`),
  ADD UNIQUE KEY `slot_models_end_time_unique` (`end_time`);

--
-- Indexes for table `socal_media`
--
ALTER TABLE `socal_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `time_page_models`
--
ALTER TABLE `time_page_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_page_models_user_id_foreign` (`user_id`),
  ADD KEY `time_page_models_day_id_foreign` (`day_id`),
  ADD KEY `time_page_models_time_id_foreign` (`time_id`);

--
-- Indexes for table `time_tables`
--
ALTER TABLE `time_tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `time_tables_time_unique` (`time`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_locations_user_id_foreign` (`user_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `visitors_ip_address_unique` (`ip_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blog_tags`
--
ALTER TABLE `blog_tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bulldings`
--
ALTER TABLE `bulldings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_form_models`
--
ALTER TABLE `contact_form_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `day_models`
--
ALTER TABLE `day_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department_models`
--
ALTER TABLE `department_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor_models`
--
ALTER TABLE `doctor_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feautes`
--
ALTER TABLE `feautes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fun_facts`
--
ALTER TABLE `fun_facts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `patient_appontments`
--
ALTER TABLE `patient_appontments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `porfolio_categories`
--
ALTER TABLE `porfolio_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pricing_tables`
--
ALTER TABLE `pricing_tables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `protfolio_galleries`
--
ALTER TABLE `protfolio_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `silder_sections`
--
ALTER TABLE `silder_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slot_models`
--
ALTER TABLE `slot_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `socal_media`
--
ALTER TABLE `socal_media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `time_page_models`
--
ALTER TABLE `time_page_models`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `time_tables`
--
ALTER TABLE `time_tables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `user_locations`
--
ALTER TABLE `user_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctor_models`
--
ALTER TABLE `doctor_models`
  ADD CONSTRAINT `doctor_models_bullding_id_foreign` FOREIGN KEY (`bullding_id`) REFERENCES `bulldings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_models_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `department_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_models_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `doctor_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patient_appontments`
--
ALTER TABLE `patient_appontments`
  ADD CONSTRAINT `patient_appontments_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctor_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_appontments_slot_id_foreign` FOREIGN KEY (`slot_id`) REFERENCES `slot_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `patient_appontments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolio_sections`
--
ALTER TABLE `portfolio_sections`
  ADD CONSTRAINT `portfolio_sections_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `porfolio_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `protfolio_galleries`
--
ALTER TABLE `protfolio_galleries`
  ADD CONSTRAINT `protfolio_galleries_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolio_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_bullding_id_foreign` FOREIGN KEY (`bullding_id`) REFERENCES `bulldings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_page_models`
--
ALTER TABLE `time_page_models`
  ADD CONSTRAINT `time_page_models_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `day_models` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_page_models_time_id_foreign` FOREIGN KEY (`time_id`) REFERENCES `time_tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `time_page_models_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_locations`
--
ALTER TABLE `user_locations`
  ADD CONSTRAINT `user_locations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
