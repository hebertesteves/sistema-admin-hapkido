-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 24-Out-2023 às 09:55
-- Versão do servidor: 8.0.32
-- versão do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `escolarhap`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `datanasc` date DEFAULT NULL,
  `faixas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anoinicio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id`, `nome`, `email`, `cpf`, `telefone`, `sexo`, `datanasc`, `faixas`, `anoinicio`, `endereco`, `foto`) VALUES
(2, 'Pogba', 'pogba@gmail.com', '654.387.900-0', '(21) 31313-1453', 'Masculino', '1967-09-10', 'Branca', '2013', 'Juventus', 'pogba.jpg'),
(3, 'Giovana', 'giovana.sp@gmail.com', '231.399.121-3', '(11) 97321-3213', 'Feminino', '2023-03-16', 'Branca', '2023', 'ETEC RAPOSO', '738341e4fe7280f80a6cca75e626797b.jpg'),
(4, 'Cristiano Ronaldo', 'cr7@gmail.com', '111.222.435-67', '(11) 99988-8773', 'Masculino', '1972-02-08', 'Amarela ponta verde', '2017', 'Portugual', 'download.jpg'),
(5, 'Marcelo Abreu Monteiro', 'abreu@gmail.com', '629.807.891-20', '(11) 99993-2135', 'Masculino', '2006-03-15', 'Branca', '2023', 'Habbis', 'sem-foto.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `aulas`
--

DROP TABLE IF EXISTS `aulas`;
CREATE TABLE IF NOT EXISTS `aulas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `turma` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` text,
  `periodo` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `aulas`
--

INSERT INTO `aulas` (`id`, `turma`, `nome`, `descricao`, `periodo`) VALUES
(13, 4, 'Socos Basicos', '', 9),
(14, 4, 'Chute Basico', '', 9),
(15, 4, 'Queda Basico', '', 9),
(16, 4, 'Alogamentos', '', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamadas`
--

DROP TABLE IF EXISTS `chamadas`;
CREATE TABLE IF NOT EXISTS `chamadas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `turma` int NOT NULL,
  `aluno` int NOT NULL,
  `aula` int NOT NULL,
  `presenca` varchar(5) NOT NULL,
  `justificativa` varchar(255) DEFAULT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `chamadas`
--

INSERT INTO `chamadas` (`id`, `turma`, `aluno`, `aula`, `presenca`, `justificativa`, `data`) VALUES
(1, 3, 4, 5, 'P', NULL, '2023-10-15'),
(2, 3, 3, 5, 'P', NULL, '2023-10-15'),
(3, 3, 5, 5, 'F', NULL, '2023-10-15'),
(4, 3, 2, 5, 'F', NULL, '2023-10-15'),
(5, 3, 4, 6, 'P', NULL, '2023-10-15'),
(6, 3, 3, 6, 'J', NULL, '2023-10-15'),
(7, 4, 4, 13, 'F', NULL, '2023-10-17'),
(8, 4, 3, 13, 'P', NULL, '2023-10-17'),
(9, 4, 2, 13, 'P', NULL, '2023-10-17'),
(10, 4, 4, 14, 'F', NULL, '2023-10-17'),
(11, 4, 3, 14, 'P', NULL, '2023-10-17'),
(12, 4, 2, 14, 'P', NULL, '2023-10-17'),
(13, 4, 4, 15, 'P', NULL, '2023-10-21'),
(14, 4, 3, 15, 'P', NULL, '2023-10-21'),
(15, 4, 2, 15, 'P', NULL, '2023-10-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

DROP TABLE IF EXISTS `disciplinas`;
CREATE TABLE IF NOT EXISTS `disciplinas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id`, `nome`) VALUES
(1, 'Adultos'),
(5, 'Criança ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `turma` int NOT NULL,
  `aluno` int NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id`, `turma`, `aluno`, `data`) VALUES
(11, 2, 3, '2023-10-01'),
(13, 4, 3, '2023-10-01'),
(15, 4, 2, '2023-10-01'),
(16, 1, 5, '2023-10-01'),
(17, 1, 4, '2023-10-09'),
(18, 3, 4, '2023-10-15'),
(19, 3, 3, '2023-10-15'),
(20, 3, 5, '2023-10-15'),
(21, 3, 2, '2023-10-15'),
(22, 4, 4, '2023-10-15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodos`
--

DROP TABLE IF EXISTS `periodos`;
CREATE TABLE IF NOT EXISTS `periodos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `turma` int NOT NULL,
  `nome` varchar(50) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_final` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `periodos`
--

INSERT INTO `periodos` (`id`, `turma`, `nome`, `data_inicio`, `data_final`) VALUES
(4, 2, '1º Bimestre', '2020-11-01', '2020-11-27'),
(5, 2, '2º Bimestre', '2020-11-01', '2020-11-27'),
(6, 3, '1º Bimestre', '2020-11-01', '2020-11-27'),
(7, 3, '2º Bimestre', '2020-11-01', '2020-11-27'),
(8, 3, '3º Bimestre', '2020-11-01', '2020-11-28'),
(9, 4, '1° Bimestre', '2023-02-06', '2023-03-06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `datanasc` date DEFAULT NULL,
  `faixas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `anoinicio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id`, `nome`, `email`, `cpf`, `telefone`, `sexo`, `datanasc`, `faixas`, `anoinicio`, `endereco`, `foto`) VALUES
(3, 'Barry Allen ', 'barry@gmail.com', '579.321.323-21', '(98) 91893-1233', 'Masculino', '2021-02-08', 'Preta', '2013', 'Central City', 'flash.jpg'),
(15, 'Heebert ', 'hebertesteves.sp@gmail.com', '478.779.298-97', '(11) 97038-2953', 'Masculino', '2023-08-20', 'Preta', '2012', 'Rua Oscar Pedroso Horta', '174239163_1796269163889452_3435936350029434128_n.jpg'),
(16, 'Neymar', 'neymar@hotmail.com', '654.387.900-1', '(11) 67832-13', 'Masculino', '1979-06-05', 'Preta', '2012', 'Rua José Lidon', '6592d22f05d29398784337cd02a37e26.jpg'),
(18, 'Messi', 'messi10@gmail.com', '432.908.054-00', '(11) 98412-5383', 'Masculino', '1987-06-24', 'Preta', '2019', 'Miami', 'messi.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

DROP TABLE IF EXISTS `salas`;
CREATE TABLE IF NOT EXISTS `salas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sala` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id`, `sala`, `descricao`) VALUES
(1, '01', 'Quarta 19:30-20:30'),
(2, '02', 'Quarta 20:30-21:50'),
(3, '03', 'Sexta 19:30-20:30'),
(4, '04', 'Sexta 20:30-21:50');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `disciplina` int NOT NULL,
  `sala` int NOT NULL,
  `professor` int NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_final` date DEFAULT NULL,
  `horario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `dia` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `disciplina`, `sala`, `professor`, `data_inicio`, `data_final`, `horario`, `dia`, `ano`) VALUES
(3, 5, 1, 15, '2023-02-06', '2023-12-20', '19:30 a 20:30', 'Segunda e Quarta', 2023),
(4, 1, 2, 16, '2023-02-06', '2023-12-20', '20:30 a 21:50', 'Segunda e Quarta', 2023);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`) VALUES
(2, 'Perla dos Reis Oliveira', '456.312.3', 'perlla.sp@terra.com.br', '123', 'secretaria'),
(11, 'Hebertzinho', '47877929897', 'hebertesteves.sp@gmail.com', '123', 'professor'),
(13, 'Administrador ', '000.000.000-10', 'hebertesteves14.sp@gmail.com', '123', 'Admin'),
(14, 'Neymar', '654.387.900-1', 'neymar@hotmail.com', '123', 'professor'),
(15, 'Barry Allen ', '579.321.323-21', 'barry@gmail.com', '123', 'professor'),
(17, 'Pogba', '654.387.900-0', 'pogba@gmail.com', '123', 'aluno'),
(18, 'Giovana', '231.399.121-3', 'giovana.sp@gmail.com', '123', 'aluno'),
(19, 'Cristiano Ronaldo', '111.222.435-67', 'cr7@gmail.com', '123', 'aluno'),
(20, 'Messi', '432.908.054-00', 'messi10@gmail.com', '123', 'professor'),
(21, 'Marcelo Abreu Monteiro', '629.807.891-20', 'abreu@gmail.com', '123', 'aluno');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
