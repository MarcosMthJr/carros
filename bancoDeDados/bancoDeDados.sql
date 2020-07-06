-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 06-Jul-2020 às 07:07
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `convesWeb`
--
CREATE DATABASE IF NOT EXISTS `convesWeb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `convesWeb`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

CREATE TABLE `carro` (
  `id` int(11) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `ano` int(11) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `potencia` varchar(5) NOT NULL,
  `valor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`id`, `modelo`, `ano`, `marca`, `potencia`, `valor`) VALUES
(56, 'Uno', 2010, 'Fiat', '1.0', '15.000,00'),
(57, 'Corsa', 2008, 'Chevrolet', '1.0', '12.000,00'),
(58, 'Celta', 2010, 'Chevrolet', '1.0', '18.000,00'),
(59, 'Honda', 2018, 'Civic', '2.0', '32.000,00'),
(66, 'Palio', 2010, 'Fiat', '1.0', '16.000,00'),
(68, 'Golf TSI', 2019, 'Volkswagen', '2.0', '91.790,00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carro`
--
ALTER TABLE `carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
