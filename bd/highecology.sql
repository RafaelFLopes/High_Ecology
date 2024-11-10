-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Nov-2024 às 19:14
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `highecology`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `Cod_Aluno` int(7) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Senha` varchar(8) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `Imagem` blob DEFAULT NULL,
  `Cod_Curso` int(7) DEFAULT NULL,
  `Cod_Plano` int(7) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`Cod_Aluno`, `Nome`, `Senha`, `Email`, `CPF`, `Imagem`, `Cod_Curso`, `Cod_Plano`) VALUES
(1121, 'Murillo', '123', 'aluno@gmail.com', '123456789', NULL, NULL, NULL),
(1122, 'Vinicius Rafael Bonfim', '12345', 'vinicius@gmail.com', '5555555555', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinatura`
--

CREATE TABLE `assinatura` (
  `Cod_Plano` int(7) NOT NULL,
  `Valor` decimal(4,0) NOT NULL,
  `Tipo` tinyint(1) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Conteudo` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(38, 'Biologia', 'Biologia é a ciência natural que estuda a vida e os organismos vivos.', 'biologia - curso.png', '2024-11-08 18:09:55'),
(39, 'Ecologia', 'Ecologia é a especialidade da biologia que estuda o meio ambiente e os seres vivos que vivem nele.', 'ecologia-curso.jpg', '2024-11-08 18:11:01'),
(40, 'Oceanografia', 'A Oceanografia é estudo dos oceanos e zonas costeiras sob todos os aspetos.', 'oceanografia-curso.png', '2024-11-08 18:12:02'),
(41, 'Silvicultura', 'Silvicultura é o estudo dos métodos naturais e artificiais de regenerar os povoamentos florestais.', 'silvicultura-curso.jpg', '2024-11-08 18:12:55'),
(42, 'Sustentabilidade', 'Sustentabilidade é o estudo de estratégias para o estabelecimento de prioridades conservacionistas.', 'sustentabilidade-curso.png', '2024-11-08 18:13:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `Cod_Adm` int(7) NOT NULL,
  `Senha` varchar(8) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Email` varchar(320) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`Cod_Adm`, `Senha`, `Nome`, `Email`) VALUES
(2, '123', 'Rafael', 'professor@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Cod_Aluno`);

--
-- Índices para tabela `assinatura`
--
ALTER TABLE `assinatura`
  ADD PRIMARY KEY (`Cod_Plano`);

--
-- Índices para tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`Cod_Adm`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `Cod_Aluno` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1123;

--
-- AUTO_INCREMENT de tabela `assinatura`
--
ALTER TABLE `assinatura`
  MODIFY `Cod_Plano` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `Cod_Adm` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
