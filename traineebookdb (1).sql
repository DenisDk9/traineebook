-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 04-Dez-2018 às 10:21
-- Versão do servidor: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traineebookdb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

DROP TABLE IF EXISTS `aluno`;
CREATE TABLE IF NOT EXISTS `aluno` (
  `id_aluno` int(9) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `cpf` int(11) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `universidade` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `ano_entrada` int(4) DEFAULT NULL,
  `ano_formatura` int(4) DEFAULT NULL,
  `senha` varchar(16) NOT NULL,
  `emai_verificado` tinyint(1) DEFAULT NULL,
  `perfil_verificado` tinyint(1) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `poder` int(2) DEFAULT NULL,
  `id_endereco` int(9) DEFAULT NULL,
  `rua` varchar(60) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `estado` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `fk_endXaluno` (`id_endereco`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `cpf`, `curso`, `universidade`, `email`, `ano_entrada`, `ano_formatura`, `senha`, `emai_verificado`, `perfil_verificado`, `telefone`, `poder`, `id_endereco`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(1, 'teste', NULL, NULL, NULL, 'teste2', NULL, NULL, 'teste3', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, '', NULL, NULL, NULL, 'teste2', NULL, NULL, 'teste3', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, '', NULL, NULL, NULL, '1@gmail.com', NULL, NULL, 'pp', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Denis', NULL, NULL, NULL, '1@gmail.com', NULL, NULL, 'pp', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Denis Luciano Lopes', 125, 'CCP3', 'UFjf4', 'denis.lopes3012@gmail.com', NULL, NULL, '123', 0, NULL, 1245, NULL, NULL, 'Helio de souza limaaa', 142, 'santo antoniA', 'viÃ§osaa', 'mg'),
(6, '', NULL, NULL, NULL, '', NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'teste', NULL, NULL, NULL, 'teste@teste', NULL, NULL, 'teste', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'estudante', 123, 'ccp', 'ufv', 'teste@teste2', NULL, NULL, '123', NULL, NULL, 123, NULL, NULL, 'Helio de souza lima', 120, 'santo antonio', 'viÃ§osa', 'mg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_estagio`
--

DROP TABLE IF EXISTS `dados_estagio`;
CREATE TABLE IF NOT EXISTS `dados_estagio` (
  `id_dados_estagio` int(9) NOT NULL AUTO_INCREMENT,
  `motivoNaoAprovado` text,
  `datainicio` date DEFAULT NULL,
  `datafim` date DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL,
  `motivacao` text,
  `id_aluno` int(9) NOT NULL,
  `id_estagio` int(9) NOT NULL,
  PRIMARY KEY (`id_dados_estagio`),
  KEY `fk_dados_estXaluno` (`id_aluno`),
  KEY `fk_dados_estXestagio` (`id_estagio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados_estagio`
--

INSERT INTO `dados_estagio` (`id_dados_estagio`, `motivoNaoAprovado`, `datainicio`, `datafim`, `aprovado`, `motivacao`, `id_aluno`, `id_estagio`) VALUES
(1, NULL, NULL, NULL, 0, 'pq sim', 5, 8),
(2, NULL, NULL, NULL, 0, 'ssss', 5, 1),
(3, NULL, NULL, NULL, 0, 'cuuuuuuu', 5, 2),
(4, NULL, NULL, NULL, 0, 'ciencias', 5, 2),
(5, NULL, NULL, NULL, 0, 'pq sim', 8, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(9) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `senha` varchar(16) DEFAULT NULL,
  `rua` varchar(60) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `estado` varchar(60) DEFAULT NULL,
  `cidade` varchar(60) DEFAULT NULL,
  `bairro` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome`, `email`, `telefone`, `senha`, `rua`, `numero`, `estado`, `cidade`, `bairro`) VALUES
(1, 'Teste empresa', 'empresa@empresa.com', 45345, '123', 'Helio de souza limaaaaaaafsdfds', 146, 'mg', 'q', 'santo antonibfdfds'),
(2, 'empresa do carai', 'empresa@cu.com', 123, '123', 'ffff', 12, 'mg', 'viÃ§osa', 'santo antoniA'),
(3, 'empresasp', 'empresa@sp.com', 45345, '123', 'Helio de souza lima', 142, 'mg', 'viÃ§osaa', 'santo antonib'),
(4, 'empresa fodida', 'empresa2@empresa.com', 3892, '123', 'seila', 111, 'mg', 'viÃ§osa', 'santo antonio');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(9) NOT NULL AUTO_INCREMENT,
  `pais` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  `bairro` varchar(255) NOT NULL,
  `numero` int(9) NOT NULL,
  `cep` int(8) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estagio`
--

DROP TABLE IF EXISTS `estagio`;
CREATE TABLE IF NOT EXISTS `estagio` (
  `id_estagio` int(9) NOT NULL AUTO_INCREMENT,
  `area` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `ativo` tinyint(1) DEFAULT NULL,
  `requisitos` varchar(255) DEFAULT NULL,
  `id_empresa` int(9) NOT NULL,
  PRIMARY KEY (`id_estagio`),
  KEY `fk_empXestagio` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estagio`
--

INSERT INTO `estagio` (`id_estagio`, `area`, `descricao`, `ativo`, `requisitos`, `id_empresa`) VALUES
(1, 'CCP', 'cuzao', 1, 'cu', 1),
(2, 'Ciencia do cu', 'cuzisse', 1, 'cuzao', 2),
(3, 'aaaaa', 'teste', 1, 'teste', 2),
(4, 'aaaaa', 'tessste', 1, 'teste', 2),
(5, 'aaaaa', 'tesste', 1, 'testa', 3),
(7, 'Testando', 'Testando a quebra de linha nessa porra', 1, 'testessss', 1),
(8, 'testando mais um', 'teste testando', 1, 'tessssste', 1),
(9, 'testa outro', 'testando outro nessa budega', 1, 'testesss', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `localiza_empresa`
--

DROP TABLE IF EXISTS `localiza_empresa`;
CREATE TABLE IF NOT EXISTS `localiza_empresa` (
  `id_localiza_empresa` int(9) NOT NULL AUTO_INCREMENT,
  `sede_matriz` tinyint(1) DEFAULT NULL,
  `id_empresa` int(9) NOT NULL,
  `id_endereco` int(9) NOT NULL,
  PRIMARY KEY (`id_localiza_empresa`),
  KEY `fk_localiza_emprXempresa` (`id_empresa`),
  KEY `fk_localiza_emprXendereco` (`id_endereco`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_endXaluno` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`);

--
-- Limitadores para a tabela `dados_estagio`
--
ALTER TABLE `dados_estagio`
  ADD CONSTRAINT `fk_dados_estXaluno` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id_aluno`),
  ADD CONSTRAINT `fk_dados_estXestagio` FOREIGN KEY (`id_estagio`) REFERENCES `estagio` (`id_estagio`);

--
-- Limitadores para a tabela `estagio`
--
ALTER TABLE `estagio`
  ADD CONSTRAINT `fk_empXestagio` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`);

--
-- Limitadores para a tabela `localiza_empresa`
--
ALTER TABLE `localiza_empresa`
  ADD CONSTRAINT `fk_localiza_emprXempresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `fk_localiza_emprXendereco` FOREIGN KEY (`id_endereco`) REFERENCES `endereco` (`id_endereco`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
