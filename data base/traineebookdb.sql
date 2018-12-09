-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 07-Dez-2018 às 22:32
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id_aluno`, `nome`, `cpf`, `curso`, `universidade`, `email`, `ano_entrada`, `ano_formatura`, `senha`, `emai_verificado`, `perfil_verificado`, `telefone`, `poder`, `id_endereco`, `rua`, `numero`, `bairro`, `cidade`, `estado`) VALUES
(10, 'Denis Luciano Lopes', 123456, 'CiÃªncia da computaÃ§Ã£o', 'Universidade Federal de ViÃ§osa', 'denis.lopes3012@gmail.com', NULL, NULL, '123', NULL, NULL, 45345, NULL, NULL, 'Helio de souza limaa', 140, 'santo antonio', 'viÃ§osa', 'Minas Gerais');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dados_estagio`
--

INSERT INTO `dados_estagio` (`id_dados_estagio`, `motivoNaoAprovado`, `datainicio`, `datafim`, `aprovado`, `motivacao`, `id_aluno`, `id_estagio`) VALUES
(31, NULL, NULL, NULL, 0, 'Quero obter conhecimento ', 10, 12);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nome`, `email`, `telefone`, `senha`, `rua`, `numero`, `estado`, `cidade`, `bairro`) VALUES
(7, 'SI Empresas', 'siempresas@ufv.br', 214748364, '123', 'Av PH Rolfs', 66, 'MG', 'ViÃ§osa', 'Santa clara');

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
  `titulo` varchar(255) NOT NULL,
  PRIMARY KEY (`id_estagio`),
  KEY `fk_empXestagio` (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estagio`
--

INSERT INTO `estagio` (`id_estagio`, `area`, `descricao`, `ativo`, `requisitos`, `id_empresa`, `titulo`) VALUES
(11, 'TI', 'Uma Ã³tima oportunidade para quem quer estabilidade e procura uma boa equipe.', 1, 'Formado em ciÃªncia da computaÃ§Ã£o ou afins', 7, 'Analista de sistemas'),
(12, 'TI', 'Emprego na universidade', 1, 'programaÃ§Ã£o 1', 7, 'programador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `formacao`
--

DROP TABLE IF EXISTS `formacao`;
CREATE TABLE IF NOT EXISTS `formacao` (
  `id_formacao` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(10) NOT NULL,
  `grau` varchar(300) NOT NULL,
  `instituicao` varchar(300) NOT NULL,
  `curso` varchar(300) NOT NULL,
  PRIMARY KEY (`id_formacao`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `formacao`
--

INSERT INTO `formacao` (`id_formacao`, `id_aluno`, `grau`, `instituicao`, `curso`) VALUES
(3, 10, 'superior', 'Universidade Federal de ViÃ§osa', 'CiÃªncia da computaÃ§Ã£o');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos_realizados`
--

DROP TABLE IF EXISTS `projetos_realizados`;
CREATE TABLE IF NOT EXISTS `projetos_realizados` (
  `id_projeto` int(11) NOT NULL AUTO_INCREMENT,
  `id_aluno` int(11) NOT NULL,
  `projeto` text NOT NULL,
  PRIMARY KEY (`id_projeto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
