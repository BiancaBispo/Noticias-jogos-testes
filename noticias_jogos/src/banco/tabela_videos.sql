-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Maio-2021 às 23:20
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vendas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tabela_videos`
--

DROP TABLE IF EXISTS `tabela_videos`;
CREATE TABLE IF NOT EXISTS `tabela_videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_video` varchar(255) NOT NULL,
  `url_video` varchar(2083) NOT NULL,
  `codigo_video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tabela_videos`
--

INSERT INTO `tabela_videos` (`id`, `nome_video`, `url_video`, `codigo_video`) VALUES
(1, 'SILENT HILL', 'https://www.youtube.com/embed/okhezICFJgQ', 'okhezICFJgQ'),
(2, 'RESIDENT EVIL 8 Official Trailer (2021) Resident Evil Village Game HD', 'https://www.youtube.com/embed/JSapXD9vxYA', 'JSapXD9vxYA'),
(3, 'Ratchet e Clank: Rift Apart Gameplay Trailer I PS5', 'https://www.youtube.com/embed/9p_gg9UW9k4', '9p_gg9UW9k4'),
(4, 'Hogwarts Legacy - Official Reveal Trailer | PS5', 'https://www.youtube.com/embed/1O6Qstncpnc', '1O6Qstncpnc'),
(5, 'HELLBLADE 2 Official Trailer 4K (2020) Video Game ULTRA HD', 'https://www.youtube.com/embed/cwgnU_04fsU', 'cwgnU_04fsU'),
(6, 'Age of Empires', 'https://www.youtube.com/embed/TTaCrP_U4ao', 'TTaCrP_U4ao'),
(24, 'Resident Evil Village - 4th Trailer | 4K | HDR', 'https://www.youtube.com/embed/KkWsga0ja-8', 'KkWsga0ja-8'),
(25, 'CHRONO ODYSSEY Trailer (2021) 4K', 'https://www.youtube.com/embed/dEBufqmFOyA', 'dEBufqmFOyA');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
