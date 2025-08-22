-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/06/2025 às 00:25
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `papelaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `idFunc` int(11) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `nomeCompleto` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `funcao` enum('gerente','funcionario','repositor') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`idFunc`, `nickname`, `senha`, `nomeCompleto`, `email`, `funcao`) VALUES
(20, 'Yasmin', '$2y$10$YDeQqxuRF9uSbId2ghnSHuNZxBa.r7C2DgShUnj1wNnWy.PbcC2uK', 'Yasmin Cupari Rodrigues', 'yasmin.ro@gmail.com', 'gerente'),
(21, 'Luiza', '$2y$10$8BBhcksqG60mSrWk7ZrisuPojCPZJ68JkOQTBZUwnjXV8tHRSSBQy', 'Luiza Farias Harabura', 'lu.harabura@gmail.com', 'repositor'),
(22, 'Julio', '$2y$10$ML4MfkMsudeKoiM/1cA4qOFTd/Rmd.tpoSNiR3G9pgzWGv124.xGu', 'Julio Cesar Bernardo', 'juju.bernardo@gmail.com', 'funcionario');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`idFunc`),
  ADD UNIQUE KEY `nickname` (`nickname`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
