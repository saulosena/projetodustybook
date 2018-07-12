-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 12-Jul-2018 às 03:46
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dustybook`
--
CREATE DATABASE IF NOT EXISTS `dustybook` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dustybook`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

DROP TABLE IF EXISTS `livros`;
CREATE TABLE IF NOT EXISTS `livros` (
  `nomel` varchar(200) NOT NULL,
  `autorl` varchar(200) NOT NULL,
  `edl` int(4) NOT NULL,
  `valorl` float(4,2) NOT NULL,
  `fotol` varchar(30) NOT NULL,
  `material` varchar(20) NOT NULL,
  `temal` varchar(20) NOT NULL,
  `comentariol` varchar(2000) NOT NULL,
  `anoedl` int(4) NOT NULL,
  `id_livro` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `fk_livro` (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=67 ;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`nomel`, `autorl`, `edl`, `valorl`, `fotol`, `material`, `temal`, `comentariol`, `anoedl`, `id_livro`, `id_usuario`) VALUES
('educacao mito e ficcao', 'tania aguiar', 1, 80.00, '15313596351.jpg', 'filosofia', 'academico', 'bom livro para estudo filosofico', 1988, 9, 5),
('matematica financeira moderna', 'rodrigo de losso', 1, 99.99, '15313597331.jpg', 'matematica', 'academico', 'bom livro de calculo', 2011, 8, 10),
('manual de producao de televisao', 'hebert zettl', 1, 99.99, '15313598551.jpg', 'jornalismo', 'academico', 'bom livro para quem pretender ser jornalista', 2016, 7, 1),
('introducao a quimica experimental', 'roberto ribeiro', 1, 70.50, '15313594081.jpg', 'quimica', 'academico', 'bom livro de estudos', 2018, 6, 4),
('ainda e cedo (renato russo)', 'fernando moraes', 1, 50.00, '15313596861.jpg', 'biografia', 'biografia', 'um livro emocionante', 2018, 5, 5),
('algoritimos e logica de programacao', 'marcelo maques gomes', 2, 80.00, '15313590741.jpg', 'programacao', 'academico', 'otimo livro para aprender a  programar', 2015, 4, 1),
('normas da abnt', 'jamil ibrahin iskandar', 6, 50.00, '15313590261.jpg', 'metodologia cientifi', 'academico', 'livro facil e de bom entendimento', 2008, 3, 1),
('metodologia do trabalho cientifico', 'everaldo da silva', 4, 80.00, '15313595031.jpg', 'metodoliga cientific', 'academico', 'bom livro para desenvolver artigos', 2000, 2, 4),
('abc do trabalho academico e cientifico', 'ronaldo sergio de araujo coelho', 1, 99.99, '15313593351.jpg', 'metodologia cientifi', 'academico', 'bom livro para desenvolver tcc', 2018, 1, 3),
('adiministracao financeira', 'michael c. ehrhardt', 1, 60.00, '15313595781.jpg', 'administracao', 'academico', 'bom livro de estudos', 2018, 10, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestoes`
--

DROP TABLE IF EXISTS `sugestoes`;
CREATE TABLE IF NOT EXISTS `sugestoes` (
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sugestao` varchar(3000) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `status` varchar(11) NOT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `sugestoes`
--

INSERT INTO `sugestoes` (`nome`, `email`, `sugestao`, `tipo`, `status`, `id`) VALUES
('user', 'usuario7@email.com', 'O site e bonito.', 'elogio', 'sugestao', 4),
('user', 'usuario5@email.com', 'O site e legal.', 'elogio', 'sugestao', 3),
('user', 'usuario11@email.com', 'O site e facil.', 'elogio', 'sugestao', 2),
('user', 'usuario2@email.com', 'O site e bom.', 'elogio', 'sugestao', 1),
('klinger', 'usuario8@email.com', 'O site e util.', 'elogio', 'sugestao', 5),
('alan', 'user@email.com', 'O site e revolucionario.', 'elogio', 'processando', 6),
('josefina', 'usuario4@email.com', 'O site e simples.', 'elogio', 'processando', 7),
('ricardo', 'usuario8@email.com', 'O site e otimo.', 'elogio', 'processando', 8),
('flavio', 'chato@email.com', 'O site e rim.', 'reclamacao', 'processando', 9),
('fatima', 'ze@email.com', 'O site e pessimo.', 'reclamacao', 'processando', 10),
('ze', 'user1@email.com', 'O site e lento.', 'reclamacao', 'resolvido', 11),
('maria', 'user2@email.com', 'O site falta melhorar.', 'reclamacao', 'resolvido', 12),
('joao', 'user3@email.com', 'O site e lento.', 'reclamacao', 'resolvido', 13),
('usuario', 'user8@email.com', 'O site razoevel.', 'reclamacao', 'resolvido', 14),
('user5', 'user5@email.com', 'O site nao presta.', 'reclamacao', 'resolvido', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `data_nasc` date NOT NULL,
  `telefone1` int(11) NOT NULL,
  `telefone2` int(11) DEFAULT NULL,
  `endereco` varchar(200) NOT NULL,
  `numero_end` int(5) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `cep` int(8) NOT NULL,
  `email` varchar(150) NOT NULL,
  `senha` varchar(15) NOT NULL,
  `complemento` varchar(200) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `adm` int(1) DEFAULT NULL,
  `foto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `sobrenome`, `id`, `data_nasc`, `telefone1`, `telefone2`, `endereco`, `numero_end`, `cidade`, `estado`, `cep`, `email`, `senha`, `complemento`, `sexo`, `adm`, `foto`) VALUES
('usuario 8', 'm', 10, '2000-12-13', 2147483647, NULL, 'rua a', 1, 'maceio', 'alagoas', 57000000, 'user5@email.com', '1234', '', 'masculino', 0, '15313327811.jpg'),
('usuario 7', 'd', 9, '2017-06-13', 2147483647, NULL, 'rua a', 1, 'maceio', 'alagoas', 57000000, 'user4@email.com', '1234', '', 'masculino', 0, '15313331321.png'),
('usuario4', 'user', 6, '2007-08-13', 2147483647, NULL, 'rua a', 1, 'maceio', 'alagoas', 57000000, 'user1@email.com', '1234', '', 'masculino', 0, '15313333201.jpg'),
('usuario 6', 'a', 8, '1950-06-13', 2147483647, NULL, 'rua a', 1, 'maceio', 'alagoas', 57000000, 'user3@email.com', '1234', '', 'masculino', 0, '15313334091.png'),
('usuario5', 'user', 7, '2017-12-13', 2147483647, NULL, 'rua a', 1, 'maceio', 'alagoas', 57000000, 'user2@email.com', '1234', 'beco c', 'masculino', 0, '15313333551.gif'),
('usuario3', 'user', 5, '2005-06-15', 2147483647, 2147483647, 'rua a', 10, 'maceio', 'alagoas', 57000000, 'usuario3@email.com', '1234', '', 'feminino', 0, '15313330341.jpg'),
('usuario2', 'user', 4, '1857-06-13', 2147483647, NULL, 'rua e', 4, 'maceio', 'alagoas', 57000000, 'usuario2@email.com', '1234', '', 'masculino', 0, '15313331761.jpg'),
('usuario1', 'usuario', 3, '2010-08-15', 2147483647, NULL, 'rua c', 3, 'maceio', 'alagoas', 57000000, 'usuario1@email.com', '1234', '', 'feminino', 0, '15313329581.jpg'),
('adm2', 'adm2', 2, '2015-06-13', 2147483647, 2147483647, 'rua b', 2, 'maceio', 'alagoas', 57000000, 'adm2@email.com', '1234', 'beco a', 'masculino', 1, '15313328901.jpg'),
('adm1', 'adm', 1, '2017-06-13', 2147483647, NULL, 'rua a', 1, 'maceio', 'alagoas', 57000000, 'adm1@email.com', '123', '', 'masculino', 1, '15313334411.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
