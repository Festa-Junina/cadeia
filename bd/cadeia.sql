-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Nov-2022 às 18:08
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cadeia`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `policiais`
--

CREATE TABLE `policiais` (
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `id_policial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `policiais`
--

INSERT INTO `policiais` (`nome`, `email`, `senha`, `id_policial`) VALUES
('caue', 'caue@gmail.com', '12345', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `policiais`
--
ALTER TABLE `policiais`
  ADD PRIMARY KEY (`id_policial`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `policiais`
--
ALTER TABLE `policiais`
  MODIFY `id_policial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
