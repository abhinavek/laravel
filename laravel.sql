-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 09:44 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_06_01_113428_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Not tittle',
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'my first post1', 'my first post1', '', '2017-06-01 23:27:32', '2017-06-01 23:27:32'),
(3, 'my first post2', 'afassdfas', '', '2017-06-02 00:35:36', '2017-06-02 00:35:36'),
(4, 'wwwww', 'qqqqqq', '', '2017-06-02 00:44:25', '2017-06-06 05:29:25'),
(5, 'my first post4', 'sdfsfsa', '', '2017-06-02 00:45:01', '2017-06-02 00:45:01'),
(6, 'test1', 'Lorem ipsum dolor sit amet, wisi porta mauris eget pede, labore lectus, ipsum eu, mauris nunc. Non ligula suspendisse deserunt interdum. Aenean massa sed risus massa et, urna gravida sed nunc, sit condimentum mauris neque mattis imperdiet. Neque phasellus voluptatum praesent elit, augue commodo metus ultrices sed. In sed molestie, iaculis cum enim a. Dolor placerat magna, nullam potenti sed, tempor porttitor dolor, erat maecenas. Eleifend est qui elit sed pede lacus.', '', NULL, NULL),
(7, 'test2', 'Lorem ipsum dolor sit amet, wisi porta mauris eget pede, labore lectus, ipsum eu, mauris nunc. Non ligula suspendisse deserunt interdum. Aenean massa sed risus massa et, urna gravida sed nunc, sit condimentum mauris neque mattis imperdiet. Neque phasellus voluptatum praesent elit, augue commodo metus ultrices sed. In sed molestie, iaculis cum enim a. Dolor placerat magna, nullam potenti sed, tempor porttitor dolor, erat maecenas. Eleifend est qui elit sed pede lacus.', '', NULL, NULL),
(8, 'test3', 'Lorem ipsum dolor sit amet, wisi porta mauris eget pede, labore lectus, ipsum eu, mauris nunc. Non ligula suspendisse deserunt interdum. Aenean massa sed risus massa et, urna gravida sed nunc, sit condimentum mauris neque mattis imperdiet. Neque phasellus voluptatum praesent elit, augue commodo metus ultrices sed. In sed molestie, iaculis cum enim a. Dolor placerat magna, nullam potenti sed, tempor porttitor dolor, erat maecenas. Eleifend est qui elit sed pede lacus.', '', NULL, NULL),
(9, 'test4', 'Lorem ipsum dolor sit amet, wisi porta mauris eget pede, labore lectus, ipsum eu, mauris nunc. Non ligula suspendisse deserunt interdum. Aenean massa sed risus massa et, urna gravida sed nunc, sit condimentum mauris neque mattis imperdiet. Neque phasellus voluptatum praesent elit, augue commodo metus ultrices sed. In sed molestie, iaculis cum enim a. Dolor placerat magna, nullam potenti sed, tempor porttitor dolor, erat maecenas. Eleifend est qui elit sed pede lacus.', '', NULL, NULL),
(10, 'test5', 'Lorem ipsum dolor sit amet, wisi porta mauris eget pede, labore lectus, ipsum eu, mauris nunc. Non ligula suspendisse deserunt interdum. Aenean massa sed risus massa et, urna gravida sed nunc, sit condimentum mauris neque mattis imperdiet. Neque phasellus voluptatum praesent elit, augue commodo metus ultrices sed. In sed molestie, iaculis cum enim a. Dolor placerat magna, nullam potenti sed, tempor porttitor dolor, erat maecenas. Eleifend est qui elit sed pede lacus.', '', NULL, NULL),
(11, 'asdf', 'asdfszcsdcfsdc', 'asdd', '2017-06-14 05:46:07', '2017-06-14 05:46:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
