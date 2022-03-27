-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2022 at 02:35 AM
-- Server version: 5.7.37-cll-lve
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cityligh_bordereaux_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bordereaux`
--

CREATE TABLE `bordereaux` (
  `id_bordereau` int(11) NOT NULL,
  `numero_bordereau` text NOT NULL,
  `numero_conteneur` text NOT NULL,
  `nom_client` text NOT NULL,
  `numero_client` text NOT NULL,
  `marque` text NOT NULL,
  `nombre_colis` int(11) NOT NULL,
  `cubage` decimal(10,2) NOT NULL,
  `date_embarquement` date NOT NULL,
  `date_entree_magazin` date DEFAULT NULL,
  `prix_total` int(11) NOT NULL,
  `montant_percu` int(11) NOT NULL,
  `date_paiement` date DEFAULT NULL,
  `mode_paiement` text NOT NULL,
  `reste` int(11) NOT NULL,
  `statut` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bordereaux`
--

INSERT INTO `bordereaux` (`id_bordereau`, `numero_bordereau`, `numero_conteneur`, `nom_client`, `numero_client`, `marque`, `nombre_colis`, `cubage`, `date_embarquement`, `date_entree_magazin`, `prix_total`, `montant_percu`, `date_paiement`, `mode_paiement`, `reste`, `statut`) VALUES
(1, '214741547', 'HASU4918053', 'NANA FUBA', '692997194', 'NANA FUBA', 45, 1.05, '2022-01-27', NULL, 367500, 367500, '2022-02-09', 'VirementB', 0, 'Regle'),
(2, '214741547', 'HASU4918053', 'ALEX-B', '671855013', 'ALEX-B', 7, 0.20, '2022-01-27', NULL, 70000, 70000, '2022-03-15', 'Especes', 0, 'Regle'),
(3, '214741547', 'HASU4918053', 'ERIC/EMMA', '111111111', 'ERIC/EMMA', 0, 23.05, '2022-01-27', NULL, 8067500, 7837000, '2022-03-12', 'Especes', 230500, 'Incomplet'),
(4, '214741457', 'HASU4918053', 'MAV', '1111111111', 'MAV', 287, 6.95, '2022-01-27', NULL, 2432500, 2432500, '2022-02-08', 'Especes', 0, 'Regle'),
(5, '214741547', 'HASU4918053', 'MAUREN', '6700162721', 'MAUREN', 5, 0.40, '2022-01-27', NULL, 140000, 0, NULL, 'Especes', 140000, 'Impaye'),
(6, '214741547', 'HASU4918053', 'PATERSONE', '683126634', 'PATERSONE', 2, 0.10, '2022-01-27', NULL, 35000, 35000, '2022-02-16', 'Especes', 0, 'Regle'),
(7, '214741547', 'HASU4918053', 'MK', '111111111', 'MK', 97, 1.10, '2022-01-27', NULL, 385000, 0, NULL, 'Especes', 385000, 'Impaye'),
(8, '214741547', 'HASU4918053', '896', '111111111', '896', 10, 10.40, '2022-01-27', NULL, 3640000, 3640000, '2022-02-01', 'VirementB', 0, 'Regle'),
(9, '215888759', 'MRSU4265880', 'DD', '679134878', 'DD', 500, 8.70, '2022-01-27', '2022-03-15', 3045000, 0, '2022-03-22', 'Especes', 3045000, 'Impaye'),
(10, '215888759', 'MRSU4265880', 'KAFESS', '697627429', 'KAFESS', 101, 1.65, '2022-01-27', '2022-03-15', 561000, 0, NULL, 'Especes', 561000, 'Impaye'),
(11, '215888759', 'MRSU4265880', 'FP', '677606010', 'FP', 0, 9.05, '2022-01-27', '2022-03-15', 3077000, 3077000, '2022-03-16', 'Especes', 0, 'Incomplet'),
(12, '215888759', 'MRSU4265880', 'GUY', '678306565', 'GUY', 0, 6.15, '2022-01-27', '2022-03-15', 2091000, 0, NULL, 'Especes', 2091000, 'Impaye'),
(13, '215888759', 'MRSU4265880', 'GUY', '678306565', 'GUY', 0, 6.15, '2022-01-27', '2022-03-15', 2091000, 0, NULL, 'Especes', 2091000, 'Impaye'),
(14, '215888759', 'MRSU4265880', 'GUY', '678306565', 'GUY', 0, 6.15, '2022-01-27', '2022-03-15', 2091000, 0, NULL, 'Especes', 2091000, 'Impaye');

-- --------------------------------------------------------

--
-- Table structure for table `ligne`
--

CREATE TABLE `ligne` (
  `id` int(11) NOT NULL,
  `prix_unitaire` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ligne`
--

INSERT INTO `ligne` (`id`, `prix_unitaire`, `date`) VALUES
(1, 250000, '2022-03-16 13:07:51'),
(2, 350000, '2022-03-16 13:16:50'),
(4, 340000, '2022-03-22 19:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `fonction` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fonction`) VALUES
(1, 'Admin', 'wtkW4uH_tM)Z', 'admin'),
(2, 'Cedric.Takenwa', 'T30CW7V]jPDp', 'admin'),
(3, 'Gilbert.Tchinda', '1=Pz6.WaLczY', 'reader'),
(4, 'Celestin.Noupa', 'sa9EhN!@/DP7', 'reader'),
(6, 'Merime.Piebeng', 'PiEb.ImE-22', 'admin'),
(7, 'new_user_test', 'new_user_passwd', 'reader'),
(10, 'BILL CARGO', 'Bill@2022', 'reader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bordereaux`
--
ALTER TABLE `bordereaux`
  ADD PRIMARY KEY (`id_bordereau`);

--
-- Indexes for table `ligne`
--
ALTER TABLE `ligne`
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
-- AUTO_INCREMENT for table `bordereaux`
--
ALTER TABLE `bordereaux`
  MODIFY `id_bordereau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ligne`
--
ALTER TABLE `ligne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
