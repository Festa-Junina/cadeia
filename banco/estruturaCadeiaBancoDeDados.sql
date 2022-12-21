/*

SCRIPT SQL COM A ESTRUTURA DO BANCO DE DADOS `cadeia-app`;

*/

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `cadeia-app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `cadeia-app`;

CREATE TABLE IF NOT EXISTS `funcao` (
  `idFuncao` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idFuncao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `ordemprisao` (
  `idOrdem` int(11) NOT NULL AUTO_INCREMENT,
  `idTicket` int(11) NOT NULL,
  `idTipoMeliante` int(11) NOT NULL,
  `idTurmaMeliante` int(11) DEFAULT NULL,
  `idStatusOrdem` int(11) NOT NULL,
  `nomeMeliante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricaoMeliante` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localVisto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomeDenunciante` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefoneDenunciante` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assumidaPor` int(11) DEFAULT NULL,
  `presoPor` int(11) DEFAULT NULL,
  `horaOrdem` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idOrdem`),
  KEY `idTicket` (`idTicket`),
  KEY `idTipoMeliante` (`idTipoMeliante`),
  KEY `idTurmaMeliante` (`idTurmaMeliante`),
  KEY `idStatusOrdem` (`idStatusOrdem`),
  KEY `assumidaPor` (`assumidaPor`),
  KEY `presoPor` (`presoPor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
DELIMITER $$
CREATE TRIGGER `tr_desvalidarTicket` AFTER INSERT ON `ordemprisao` FOR EACH ROW BEGIN
	UPDATE ticket SET valido=false WHERE idTicket = NEW.idTicket;
END
$$
DELIMITER ;

CREATE TABLE IF NOT EXISTS `pergunta` (
  `idPergunta` int(11) NOT NULL AUTO_INCREMENT,
  `idCategoria` int(11) NOT NULL,
  `enunciado` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternativaA` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternativaB` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternativaC` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternativaD` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alternativaCorreta` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'A',
  PRIMARY KEY (`idPergunta`),
  KEY `idCategoria` (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `perguntacategoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `prisao` (
  `idPrisao` int(11) NOT NULL AUTO_INCREMENT,
  `idOrdemPrisao` int(11) NOT NULL,
  `idStatusPrisao` int(11) NOT NULL,
  `horaPrisao` timestamp NOT NULL DEFAULT current_timestamp(),
  `quantidadePerguntasRespondidas` int(11) NOT NULL,
  `atualizacaoStatus` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idPrisao`),
  KEY `idOrdemPrisao` (`idOrdemPrisao`),
  KEY `idStatusPrisao` (`idStatusPrisao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `statusordem` (
  `idStatusOrdem` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idStatusOrdem`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `statusprisao` (
  `idStatusPrisao` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idStatusPrisao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `ticket` (
  `idTicket` int(11) NOT NULL AUTO_INCREMENT,
  `ticket` int(11) NOT NULL,
  `valido` tinyint(1) NOT NULL,
  PRIMARY KEY (`idTicket`),
  UNIQUE KEY `ticket` (`ticket`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `tipomeliante` (
  `idTipoMeliante` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idTipoMeliante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `turmameliante` (
  `idTurmaMeliante` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`idTurmaMeliante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `idFuncao` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `login` (`login`),
  KEY `idFuncao` (`idFuncao`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `ordemprisao`
  ADD CONSTRAINT `ordemprisao_ibfk_1` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`),
  ADD CONSTRAINT `ordemprisao_ibfk_2` FOREIGN KEY (`idTipoMeliante`) REFERENCES `tipomeliante` (`idTipoMeliante`),
  ADD CONSTRAINT `ordemprisao_ibfk_3` FOREIGN KEY (`idTurmaMeliante`) REFERENCES `turmameliante` (`idTurmaMeliante`),
  ADD CONSTRAINT `ordemprisao_ibfk_4` FOREIGN KEY (`idStatusOrdem`) REFERENCES `statusordem` (`idStatusOrdem`),
  ADD CONSTRAINT `ordemprisao_ibfk_5` FOREIGN KEY (`assumidaPor`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `ordemprisao_ibfk_6` FOREIGN KEY (`presoPor`) REFERENCES `usuario` (`idUsuario`);

ALTER TABLE `pergunta`
  ADD CONSTRAINT `perguntaCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `perguntacategoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `prisao`
  ADD CONSTRAINT `prisao_ibfk_1` FOREIGN KEY (`idOrdemPrisao`) REFERENCES `ordemprisao` (`idOrdem`),
  ADD CONSTRAINT `prisao_ibfk_2` FOREIGN KEY (`idStatusPrisao`) REFERENCES `statusprisao` (`idStatusPrisao`);

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idFuncao`) REFERENCES `funcao` (`idFuncao`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
