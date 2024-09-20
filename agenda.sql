-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2024 às 02:11
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

CREATE DATABASE IF NOT EXISTS `agenda`;
USE `agenda`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_contacts`
--

CREATE TABLE `tab_contacts` (
  `con_id` int(11) NOT NULL,
  `con_name` varchar(80) NOT NULL,
  `con_phone_number` varchar(15) NOT NULL,
  `con_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `con_updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tab_contacts`
--

INSERT INTO `tab_contacts` (`con_id`, `con_name`, `con_phone_number`, `con_created_at`, `con_updated_at`) VALUES
(1, 'Junnyldo Costa', '41998475685', '2024-09-19 15:08:02', '2024-09-19 15:08:02'),
(2, 'Usuário Teste', '41995837539', '2024-09-19 19:59:22', '2024-09-19 19:59:22'),
(3, 'Unity Tester', '99981655032', '2024-09-19 19:59:22', '2024-09-19 19:59:22');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tab_contacts`
--
ALTER TABLE `tab_contacts`
  ADD PRIMARY KEY (`con_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_contacts`
--
ALTER TABLE `tab_contacts`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
