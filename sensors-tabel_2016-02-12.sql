-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 12/02/2016 às 10:53
-- Versão do servidor: 5.6.28
-- Versão do PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `senseui`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `sensors`
--

CREATE TABLE `sensors` (
  `id` int(11) NOT NULL,
  `mac_address` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `location` varchar(45) NOT NULL,
  `description` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `sensors`
--

INSERT INTO `sensors` (`id`, `mac_address`, `name`, `type`, `location`, `description`, `created`, `modified`) VALUES
(1, '00:00:00:00:00:00', 'Ultrassonico 1', 'HCSR04', 'Privada 1', '', '2016-02-04 17:51:28', '2016-02-04 17:51:28'),
(2, '00:00:00:00:00:01', 'Ultrassonico 2', 'HCSR04', 'Pia 1', '', '2016-02-04 17:52:18', '2016-02-04 17:52:18'),
(3, '00:00:00:00:00:02', 'Ultrassonico 3', 'HCSR04', 'Batente 1', '', '2016-02-04 17:52:57', '2016-02-04 17:52:57'),
(4, '00:00:00:00:00:03', 'Ultrassonico 4', 'HCSR04', 'Impressora', '', '2016-02-04 17:58:30', '2016-02-05 10:19:32'),
(5, '00:00:00:00:00:04', 'Ultrassonico 5', 'HCSR04', 'Privada 2', '', '2016-02-04 17:59:07', '2016-02-05 10:19:48'),
(6, '00:00:00:00:00:05', 'Ultrassonico 6', 'HCSR04', 'Pia 2', '', '2016-02-04 17:59:36', '2016-02-04 17:59:36'),
(7, '00:00:00:00:00:06', 'Ultrassonico 7', 'HCSR04', 'Batente 2', '', '2016-02-04 18:00:21', '2016-02-04 18:00:21'),
(8, '00:00:00:00:00:07', 'Ultrassonico 8', 'HCSR04', 'Porta 1', '', '2016-02-04 18:03:00', '2016-02-04 18:03:17'),
(9, '00:00:00:00:00:08', 'Ultrassonico 9', 'HCSR04', 'Porta 2', '', '2016-02-04 18:12:18', '2016-02-04 18:12:18'),
(10, '00:00:00:00:00:09', 'Ultrassonico 10', 'HCSR04', 'Centro 1', '', '2016-02-04 18:13:21', '2016-02-04 18:13:21'),
(11, '00:00:00:00:00:10', 'Ultrassonico 11', 'HCSR04', 'Centro 2', '', '2016-02-05 10:20:15', '2016-02-05 10:20:15'),
(12, '00:00:00:00:00:11', 'Ultrassonico 12', 'HCSR04', 'Armario 3', '', '2016-02-05 10:21:17', '2016-02-05 10:21:17'),
(13, '00:00:00:00:00:12', 'Ultrassonico 13', 'HCSR04', 'Armario 2', '', '2016-02-05 10:21:39', '2016-02-05 10:21:39'),
(14, '00:00:00:00:00:13', 'Ultrassonico 14', 'HCSR04', 'Armario 1', '', '2016-02-05 10:22:01', '2016-02-05 10:22:01'),
(15, '00:00:00:00:00:14', 'Ultrassonico 15', 'HCSR04', 'Estante 3', '', '2016-02-05 10:22:30', '2016-02-05 10:22:30'),
(16, '00:00:00:00:00:15', 'Ultrassonico 16', 'HCSR04', 'Estante 2', '', '2016-02-05 10:22:51', '2016-02-05 10:23:48'),
(17, '00:00:00:00:00:16', 'Ultrassonico 17', 'HCSR04', 'Estante 1', '', '2016-02-05 10:23:29', '2016-02-05 10:24:08'),
(18, '00:00:00:00:00:17', 'PIR 1', 'PIR', 'Mesa 1', '', '2016-02-05 10:34:11', '2016-02-05 10:34:11'),
(19, '00:00:00:00:00:18', 'PIR 2', 'PIR', 'Mesa 2', '', '2016-02-05 10:34:31', '2016-02-05 10:34:31'),
(20, '00:00:00:00:00:19', 'PIR 3', 'HCSR04', 'Mesa 3', '', '2016-02-05 10:34:55', '2016-02-05 10:34:55'),
(21, '00:00:00:00:00:20', 'PIR 4', 'PIR', 'Mesa 4', '', '2016-02-05 10:35:19', '2016-02-05 10:35:19'),
(22, '18fe34f370bd', 'Ultrassonico Tinho', 'HCSR04', 'Mesa Tinho', '', '2016-02-05 13:29:42', '2016-02-05 13:29:42');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `sensors`
--
ALTER TABLE `sensors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mac_address_UNIQUE` (`mac_address`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `sensors`
--
ALTER TABLE `sensors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
