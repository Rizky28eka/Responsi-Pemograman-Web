-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2024 at 11:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobile_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `androids`
--

CREATE TABLE `androids` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `spek` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `androids`
--

INSERT INTO `androids` (`id`, `nama`, `harga`, `spek`, `foto`) VALUES
(1, 'Infinix Note 30 Pro', 'Rp. 2.000.000', 'asdnakjsnd', 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/102/MTA-130590676/infinix_infinix_note_30_pro_8-256_garansi_resmi_full04_stn3x9vn.jpg'),
(2, 'Realme Note 50', 'Rp. 1.212.000', 'asdllnaksj', 'https://images.tokopedia.net/img/cache/700/VqbcmM/2024/2/26/00ffbb24-41d7-4721-b0f3-a86ace4d21be.jpg'),
(3, 'Samsung Galaxy A05s', 'Rp. 2.110.000', 'aslknd', 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/90/MTA-140281036/br-m036969-02885_samsung-galaxy-a05s-ram-6-128-gb-garansi-resmi-nasional_full04-ca805804.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `iPhones`
--

CREATE TABLE `iPhones` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `spek` text NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `iPhones`
--

INSERT INTO `iPhones` (`id`, `nama`, `harga`, `spek`, `foto`) VALUES
(12, 'Iphone 11', 'Rp. 6.500.000', 'asjdnaksjnd', 'https://bb-scm-prod-pim.oss-ap-southeast-5.aliyuncs.com/products/f2795e2b7319b317027b2ebe74163462/helix/01-APPLE-8DVPHAPP0-APPMHDC3ID-A-WhiteRevSS.jpg'),
(13, 'Iphone 12', 'Rp. 8.500.000', 'asdjnkjn', 'https://bb-scm-prod-pim.oss-ap-southeast-5.aliyuncs.com/products/bd14e008b23cba56383dc2b4b9b0e551/helix/01-APPLE-8DVPHAPP0-APPMGJ63ID-A-WhiteRevSS.jpg'),
(14, 'Iphone 13', 'Rp. 9.200.000', 'askdjnasknj', 'https://bb-scm-prod-pim.oss-ap-southeast-5.aliyuncs.com/products/3fac0aa2302d41397a4d013a8f442e47/helix/01-APPLE-8DVPHAPP0-APPMNGK3ID-A-GreenRevSS.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(10, 'admin', '$2y$10$J9QmvUJ6e/DNxQGCRiSSeutP6JoCIn1XyNm3gKtMM2TJPSocIxq7S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `androids`
--
ALTER TABLE `androids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iPhones`
--
ALTER TABLE `iPhones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `androids`
--
ALTER TABLE `androids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iPhones`
--
ALTER TABLE `iPhones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
