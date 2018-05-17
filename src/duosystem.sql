-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
<<<<<<< HEAD
-- Host: localhost:3306
-- Generation Time: May 15, 2018 at 12:32 AM
-- Server version: 5.7.22-0ubuntu0.17.10.1
-- PHP Version: 7.1.15-0ubuntu0.17.10.1
=======
-- Host: localhost
-- Generation Time: May 17, 2018 at 03:56 PM
-- Server version: 5.5.60-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.25
>>>>>>> Finalizando projeto duosystem

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duosystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `atividades`
--

CREATE TABLE `atividades` (
  `id` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atividades`
--

INSERT INTO `atividades` (`id`, `id_status`, `nome`, `descricao`, `data_inicio`, `data_fim`, `situacao`) VALUES
<<<<<<< HEAD
(1, 1, 'Backup', 'teste 123...', '2018-05-15', '2018-05-31', 1),
=======
(1, 1, 'Backup', 'teste 1234...', '2018-05-01', '2018-05-31', 0),
>>>>>>> Finalizando projeto duosystem
(2, 4, 'Backup xx', 'teste 123456...', '2018-05-02', '2018-05-30', 1),
(9, 3, 'Rodox', 'teste para duosystem', '2018-05-10', '2018-05-15', 1),
(10, 2, 'Layout do carrinho', 'Arrumar calculadora...', '2018-05-14', '2018-05-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

<<<<<<< HEAD
CREATE TABLE `status` (
  `id` int(11) NOT NULL,
=======
CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL,
>>>>>>> Finalizando projeto duosystem
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `descricao`) VALUES
(1, 'Pendente'),
(2, 'Em Desenvolvimento'),
(3, 'Em Teste'),
(4, 'Concluído');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atividades`
--
ALTER TABLE `atividades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atividades`
--
ALTER TABLE `atividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
