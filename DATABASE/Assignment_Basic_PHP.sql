-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2022 at 10:59 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Assignment_Basic_PHP`
--

-- --------------------------------------------------------

--
-- Table structure for table `coduri_postale`
--

CREATE TABLE `coduri_postale` (
  `id` int(11) NOT NULL,
  `id_localitate` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coduri_postale`
--

INSERT INTO `coduri_postale` (`id`, `id_localitate`, `nume`) VALUES
(1, 1, '430071'),
(2, 1, '430122'),
(3, 1, '430161'),
(4, 2, '435200'),
(5, 3, '00042'),
(6, 3, '00042'),
(7, 3, '00118');

-- --------------------------------------------------------

--
-- Table structure for table `cos_produse`
--

CREATE TABLE `cos_produse` (
  `id` int(11) NOT NULL,
  `id_produs` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cos_produse`
--

INSERT INTO `cos_produse` (`id`, `id_produs`) VALUES
(8, 1),
(14, 1),
(16, 1),
(17, 1),
(18, 1),
(20, 1),
(22, 1),
(24, 1),
(25, 1),
(26, 1),
(9, 2),
(19, 2),
(15, 3),
(21, 3),
(23, 3);

-- --------------------------------------------------------

--
-- Table structure for table `localitati`
--

CREATE TABLE `localitati` (
  `id` int(11) NOT NULL,
  `id_tara` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `localitati`
--

INSERT INTO `localitati` (`id`, `id_tara`, `nume`) VALUES
(1, 1, 'Baia Mare'),
(2, 1, 'Borsa'),
(3, 2, 'Roma');

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `id` int(11) NOT NULL,
  `titlu` varchar(50) NOT NULL,
  `link_imagine` varchar(1000) NOT NULL,
  `descriere` varchar(10000) NOT NULL,
  `valoare_rating` float NOT NULL,
  `pret_normal` float NOT NULL,
  `pret_reducere` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`id`, `titlu`, `link_imagine`, `descriere`, `valoare_rating`, `pret_normal`, `pret_reducere`) VALUES
(1, 'Interfon', 'https://new.genway.ro/assets/imagini/produse/fs7v3.jpg', 'Descriere produs nr 1 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis molestiae libero sunt voluptatum accusamus voluptatibus illo impedit consequuntur soluta, odio dolores eaque placeat tempora totam laborum quae sit omnis fugiat expedita fugit debitis, quaerat cupiditate unde laboriosam! Harum fugit quas dolore nobis fuga recusandae amet totam ducimus voluptatibus omnis nostrum quidem deserunt vero, nisi mollitia modi illum inventore dignissimos dolor, dicta minus eos? Ducimus natus harum, quibusdam aut quaerat id placeat nesciunt error doloremque rerum ratione in et deserunt. Accusantium eveniet alias et vel hic ullam voluptates dolore veniam officiis tempora? Fugit provident blanditiis autem eveniet repellendus unde repudiandae dolorem?', 1, 420, 110),
(2, 'Camera Video', 'https://new.genway.ro/assets/imagini/produse/poza_00000002.jpg', 'Descriere produs nr 2 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis molestiae libero sunt voluptatum accusamus voluptatibus illo impedit consequuntur soluta, odio dolores eaque placeat tempora totam laborum quae sit omnis fugiat expedita fugit debitis, quaerat cupiditate unde laboriosam! Harum fugit quas dolore nobis fuga recusandae amet totam ducimus voluptatibus omnis nostrum quidem deserunt vero, nisi mollitia modi illum inventore dignissimos dolor, dicta minus eos? Ducimus natus harum, quibusdam aut quaerat id placeat nesciunt error doloremque rerum ratione in et deserunt. Accusantium eveniet alias et vel hic ullam voluptates dolore veniam officiis tempora? Fugit provident blanditiis autem eveniet repellendus unde repudiandae dolorem?', 2.5, 420, 0),
(3, 'Reportofon', 'https://new.genway.ro/assets/imagini/produse/bi04.jpg', 'Descriere produs nr 3 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis molestiae libero sunt voluptatum accusamus voluptatibus illo impedit consequuntur soluta, odio dolores eaque placeat tempora totam laborum quae sit omnis fugiat expedita fugit debitis, quaerat cupiditate unde laboriosam! Harum fugit quas dolore nobis fuga recusandae amet totam ducimus voluptatibus omnis nostrum quidem deserunt vero, nisi mollitia modi illum inventore dignissimos dolor, dicta minus eos? Ducimus natus harum, quibusdam aut quaerat id placeat nesciunt error doloremque rerum ratione in et deserunt. Accusantium eveniet alias et vel hic ullam voluptates dolore veniam officiis tempora? Fugit provident blanditiis autem eveniet repellendus unde repudiandae dolorem?', 0, 420, 100),
(4, 'GPS', 'https://new.genway.ro/assets/imagini/produse/sistem_fotovoltaic_cu_montaj_inclus.jpg', 'Descriere produs nr 4 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis molestiae libero sunt voluptatum accusamus voluptatibus illo impedit consequuntur soluta, odio dolores eaque placeat tempora totam laborum quae sit omnis fugiat expedita fugit debitis, quaerat cupiditate unde laboriosam! Harum fugit quas dolore nobis fuga recusandae amet totam ducimus voluptatibus omnis nostrum quidem deserunt vero, nisi mollitia modi illum inventore dignissimos dolor, dicta minus eos? Ducimus natus harum, quibusdam aut quaerat id placeat nesciunt error doloremque rerum ratione in et deserunt. Accusantium eveniet alias et vel hic ullam voluptates dolore veniam officiis tempora? Fugit provident blanditiis autem eveniet repellendus unde repudiandae dolorem?', 4.2, 220, 0),
(5, 'Contor', 'https://new.genway.ro/assets/imagini/produse/sistem_fotovoltaic_cu_montaj_inclus_3.jpg', 'Descriere produs nr 5 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis molestiae libero sunt voluptatum accusamus voluptatibus illo impedit consequuntur soluta, odio dolores eaque placeat tempora totam laborum quae sit omnis fugiat expedita fugit debitis, quaerat cupiditate unde laboriosam! Harum fugit quas dolore nobis fuga recusandae amet totam ducimus voluptatibus omnis nostrum quidem deserunt vero, nisi mollitia modi illum inventore dignissimos dolor, dicta minus eos? Ducimus natus harum, quibusdam aut quaerat id placeat nesciunt error doloremque rerum ratione in et deserunt. Accusantium eveniet alias et vel hic ullam voluptates dolore veniam officiis tempora? Fugit provident blanditiis autem eveniet repellendus unde repudiandae dolorem?', 5, 420, 0),
(6, 'Alarma', 'https://new.genway.ro/assets/imagini/produse/KIT_AUDIO.png', 'Descriere produs nr 6 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis molestiae libero sunt voluptatum accusamus voluptatibus illo impedit consequuntur soluta, odio dolores eaque placeat tempora totam laborum quae sit omnis fugiat expedita fugit debitis, quaerat cupiditate unde laboriosam! Harum fugit quas dolore nobis fuga recusandae amet totam ducimus voluptatibus omnis nostrum quidem deserunt vero, nisi mollitia modi illum inventore dignissimos dolor, dicta minus eos? Ducimus natus harum, quibusdam aut quaerat id placeat nesciunt error doloremque rerum ratione in et deserunt. Accusantium eveniet alias et vel hic ullam voluptates dolore veniam officiis tempora? Fugit provident blanditiis autem eveniet repellendus unde repudiandae dolorem?', 2.25, 550, 120),
(7, 'Panou Solar', 'https://new.genway.ro/assets/imagini/produse/KIT_VIDEO_1.jpg', 'Descriere produs nr 7 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis molestiae libero sunt voluptatum accusamus voluptatibus illo impedit consequuntur soluta, odio dolores eaque placeat tempora totam laborum quae sit omnis fugiat expedita fugit debitis, quaerat cupiditate unde laboriosam! Harum fugit quas dolore nobis fuga recusandae amet totam ducimus voluptatibus omnis nostrum quidem deserunt vero, nisi mollitia modi illum inventore dignissimos dolor, dicta minus eos? Ducimus natus harum, quibusdam aut quaerat id placeat nesciunt error doloremque rerum ratione in et deserunt. Accusantium eveniet alias et vel hic ullam voluptates dolore veniam officiis tempora? Fugit provident blanditiis autem eveniet repellendus unde repudiandae dolorem?', 4.76, 440, 20),
(8, 'Bec', 'https://new.genway.ro/assets/imagini/produse/pl_600_1.jpg', 'Descriere produs nr 8 Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reiciendis molestiae libero sunt voluptatum accusamus voluptatibus illo impedit consequuntur soluta, odio dolores eaque placeat tempora totam laborum quae sit omnis fugiat expedita fugit debitis, quaerat cupiditate unde laboriosam! Harum fugit quas dolore nobis fuga recusandae amet totam ducimus voluptatibus omnis nostrum quidem deserunt vero, nisi mollitia modi illum inventore dignissimos dolor, dicta minus eos? Ducimus natus harum, quibusdam aut quaerat id placeat nesciunt error doloremque rerum ratione in et deserunt. Accusantium eveniet alias et vel hic ullam voluptates dolore veniam officiis tempora? Fugit provident blanditiis autem eveniet repellendus unde repudiandae dolorem?', 4, 440, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tari`
--

CREATE TABLE `tari` (
  `id` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tari`
--

INSERT INTO `tari` (`id`, `nume`) VALUES
(1, 'Romania'),
(2, 'Italia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coduri_postale`
--
ALTER TABLE `coduri_postale`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_localitate` (`id_localitate`);

--
-- Indexes for table `cos_produse`
--
ALTER TABLE `cos_produse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produs` (`id_produs`);

--
-- Indexes for table `localitati`
--
ALTER TABLE `localitati`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tara` (`id_tara`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tari`
--
ALTER TABLE `tari`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coduri_postale`
--
ALTER TABLE `coduri_postale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cos_produse`
--
ALTER TABLE `cos_produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `localitati`
--
ALTER TABLE `localitati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tari`
--
ALTER TABLE `tari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coduri_postale`
--
ALTER TABLE `coduri_postale`
  ADD CONSTRAINT `coduri_postale_ibfk_1` FOREIGN KEY (`id_localitate`) REFERENCES `localitati` (`id`);

--
-- Constraints for table `cos_produse`
--
ALTER TABLE `cos_produse`
  ADD CONSTRAINT `cos_produse_ibfk_1` FOREIGN KEY (`id_produs`) REFERENCES `produse` (`id`);

--
-- Constraints for table `localitati`
--
ALTER TABLE `localitati`
  ADD CONSTRAINT `localitati_ibfk_1` FOREIGN KEY (`id_tara`) REFERENCES `tari` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
