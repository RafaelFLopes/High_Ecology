-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2024 às 14:51
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
-- Banco de dados: `highecology`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `Cod_Aluno` int(7) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Senha` varchar(8) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `CPF` varchar(15) NOT NULL,
  `Imagem` blob DEFAULT NULL,
  `Matriculado` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aluno`
--

INSERT INTO `aluno` (`Cod_Aluno`, `Nome`, `Senha`, `Email`, `CPF`, `Imagem`, `Matriculado`) VALUES
(1144, 'Rafael Lopes', '123', 'rafael@gmail.com', '1234567890', 0x2e2e2f696d672f75706c6f616473696d6167656d5f323032342d31312d32305f3230343434333831392e706e67, 1),
(1145, 'Murillo Castro', '123', 'murillo@gmail.com', '1234567890', 0x2e2e2f696d672f75706c6f6164736d7572696c6c6f2070657266696c2e706e67, 0),
(1146, 'Mohamed', '123', 'mohamed@gmail.com', '1234567890', 0x2e2e2f696d672f75706c6f616473646967c3a36f202d2070657266696c2e706e67, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `assinaturas`
--

CREATE TABLE `assinaturas` (
  `Cod_Assinatura` int(7) NOT NULL,
  `Cod_Aluno` int(11) NOT NULL,
  `Plano` varchar(15) NOT NULL,
  `Forma_Pagamento` varchar(200) NOT NULL,
  `Data_Assinatura` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `assinaturas`
--

INSERT INTO `assinaturas` (`Cod_Assinatura`, `Cod_Aluno`, `Plano`, `Forma_Pagamento`, `Data_Assinatura`) VALUES
(29, 0, 'growth', 'Pix', '2024-11-20'),
(30, 1144, 'growth', 'Pix', '2024-11-20'),
(31, 0, 'seed', 'Pix', '2024-11-20'),
(32, 1145, 'seed', 'Pix', '2024-09-20'),
(47, 1145, 'growth', 'Cartão', '2024-10-19'),
(48, 1145, 'seed', 'Pix', '2024-08-20'),
(49, 1145, 'seed', 'Pix', '2024-05-21'),
(50, 1145, 'growth', 'Cartão', '2024-03-21'),
(51, 0, 'growth', 'Pix', '2024-11-28'),
(52, 1146, 'growth', 'Pix', '2024-11-28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `certificado`
--

CREATE TABLE `certificado` (
  `Cod_Aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `conteudos`
--

CREATE TABLE `conteudos` (
  `id` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `titulo_principal` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `titulo1` varchar(255) NOT NULL,
  `texto1` text NOT NULL,
  `imagem1` varchar(255) DEFAULT NULL,
  `titulo2` varchar(255) NOT NULL,
  `texto2` varchar(255) NOT NULL,
  `imagem2` varchar(255) DEFAULT NULL,
  `titulo3` varchar(255) NOT NULL,
  `texto3` varchar(255) NOT NULL,
  `imagem3` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `conteudos`
--

INSERT INTO `conteudos` (`id`, `id_modulo`, `titulo_principal`, `descricao`, `titulo1`, `texto1`, `imagem1`, `titulo2`, `texto2`, `imagem2`, `titulo3`, `texto3`, `imagem3`, `criado_em`) VALUES
(10, 68, 'TESTE SUPREMO', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'TESTE', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', 'vini perfil.jpg', 'TESTEAAAAAA', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'vini perfil.jpg', 'TESTE', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', 'murillo perfil.png', '2024-11-26 11:39:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id`, `title`, `description`, `image`, `created_at`) VALUES
(38, 'Biologia', 'Biologia é a ciência natural que estuda a vida e os organismos vivos.', 'biologia - curso.png', '2024-11-08 18:09:55'),
(39, 'Ecologia', 'Ecologia é a especialidade da biologia que estuda o meio ambiente e os seres vivos que vivem nele.', 'ecologia-curso.jpg', '2024-11-08 18:11:01'),
(40, 'Oceanografia', 'A Oceanografia é estudo dos oceanos e zonas costeiras sob todos os aspetos.', 'oceanografia-curso.png', '2024-11-08 18:12:02'),
(41, 'Silvicultura', 'Silvicultura é o estudo dos métodos naturais e artificiais de regenerar os povoamentos florestais.', 'silvicultura-curso.jpg', '2024-11-08 18:12:55'),
(42, 'Sustentabilidade', 'Sustentabilidade é o estudo de estratégias para o estabelecimento de prioridades conservacionistas.', 'sustentabilidade-curso.png', '2024-11-08 18:13:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulos`
--

CREATE TABLE `modulos` (
  `id_mod` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `titulo_mod` varchar(255) NOT NULL,
  `descricao_mod` text NOT NULL,
  `image_mod` varchar(255) NOT NULL,
  `created_at_mod` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modulos`
--

INSERT INTO `modulos` (`id_mod`, `id_curso`, `titulo_mod`, `descricao_mod`, `image_mod`, `created_at_mod`) VALUES
(68, 38, 'Módulo I Biologia', 'Introdução à Biologia.', 'biologia - modulo 1.png', '2024-11-12 01:31:54'),
(69, 38, 'Módulo II Biologia', ' Ecologia e Conservação.', 'biologia - modulo 2.png', '2024-11-12 01:32:09'),
(70, 38, 'Módulo III Biologia', 'Evolução e Seleção Natural.', 'biologia - modulo 3.png', '2024-11-12 01:32:52'),
(71, 39, 'Módulo I Ecologia', ' Fundamentos da Ecologia.', 'ecologia-modulo1.png', '2024-11-12 01:33:53'),
(72, 39, 'Módulo II Ecologia', 'Conservação e Preservação Ambiental.', 'ecologia-modulo2.png', '2024-11-12 01:34:09'),
(73, 39, 'Módulo III Ecologia', 'Cadeias Alimentares e Teias Tróficas.', 'ecologia-modulo3.png', '2024-11-12 01:34:27'),
(74, 40, 'Módulo I Oceanografia', 'Introduzindo à Oceanografia.', 'ocenaografia - modulo 1.png', '2024-11-12 01:35:22'),
(75, 40, 'Módulo II Oceanografia', 'Vida Marinha e Ecossistemas Oceânicos.', 'oceanografia - modulo2.png', '2024-11-12 01:35:43'),
(76, 40, 'Módulo III Oceanografia', 'Processos Oceânicos.', 'oceanografia - modulo3.png', '2024-11-12 01:35:56'),
(77, 41, 'Módulo I Silvicultura', 'Introduzindo à silvicultura.', 'silvicultura - modulo1.png', '2024-11-12 01:37:56'),
(78, 41, 'Módulo II Silvicultura', ' Pragas e Doenças Florestais.', 'silvicultura - modulo2.png', '2024-11-12 01:38:18'),
(79, 41, 'Módulo III Silvicultura', ' Manejo Florestal Sustentável.', 'silvicultura - modulo3.png', '2024-11-12 01:38:31'),
(80, 42, 'Módulo I Sustentabilidade', ' Introduzindo à Sustentabilidade.', 'sustentabilidade - modulo1.png', '2024-11-12 01:39:02'),
(81, 42, 'Módulo II Sustentabilidade', '  Sustentabilidade Ambiental.', 'sustentabilidade - modulo2.png', '2024-11-12 01:39:13'),
(82, 42, 'Módulo III Sustentabilidade', 'Princípios da Sustentabilidade.', 'sustentabilidade- modulo3.png', '2024-11-12 01:39:25');

-- --------------------------------------------------------

--
-- Estrutura para tabela `planos`
--

CREATE TABLE `planos` (
  `Cod_Plano` int(7) NOT NULL,
  `Valor` varchar(15) NOT NULL,
  `Tipo` varchar(250) NOT NULL,
  `Descricao` varchar(1000) NOT NULL,
  `Vantagem1` varchar(255) NOT NULL,
  `Vantagem2` varchar(250) NOT NULL,
  `Vantagem3` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `planos`
--

INSERT INTO `planos` (`Cod_Plano`, `Valor`, `Tipo`, `Descricao`, `Vantagem1`, `Vantagem2`, `Vantagem3`) VALUES
(4, '69,99', 'seed', 'Acesso moderado aos conteúdos fornecidos pela plataforma High Ecology', 'Certificados', 'Conquistas', 'Acesso moderado aos cursos'),
(5, '99,99', 'growth', 'Acesso total a gama de cursos disponibilizado por professor da plataforma High Ecology', 'Certificados', 'Conquistas', 'Acesso total aos cursos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `Cod_Adm` int(7) NOT NULL,
  `Senha` varchar(8) NOT NULL,
  `Nome` varchar(60) NOT NULL,
  `Email` varchar(320) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--

INSERT INTO `professor` (`Cod_Adm`, `Senha`, `Nome`, `Email`) VALUES
(2, '123', 'Rafael', 'professor@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `progresso`
--

CREATE TABLE `progresso` (
  `Cod_Aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `data_inicio` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `progresso`
--

INSERT INTO `progresso` (`Cod_Aluno`, `id_curso`, `status`, `data_inicio`) VALUES
(1144, 38, 'visualizado', '2024-11-27'),
(1144, 39, 'visualizado', '2024-11-27'),
(1146, 38, 'visualizado', '2024-11-28'),
(1146, 39, 'visualizado', '2024-11-28'),
(1146, 40, 'visualizado', '2024-11-28'),
(1146, 42, 'visualizado', '2024-11-28'),
(1146, 41, 'visualizado', '2024-11-28'),
(2, 38, 'visualizado', '2024-11-28'),
(1144, 40, 'visualizado', '2024-11-28'),
(1144, 41, 'visualizado', '2024-11-28'),
(1144, 42, 'visualizado', '2024-11-28');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`Cod_Aluno`);

--
-- Índices de tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  ADD PRIMARY KEY (`Cod_Assinatura`);

--
-- Índices de tabela `conteudos`
--
ALTER TABLE `conteudos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_mod`);

--
-- Índices de tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`Cod_Plano`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`Cod_Adm`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `Cod_Aluno` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1147;

--
-- AUTO_INCREMENT de tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  MODIFY `Cod_Assinatura` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de tabela `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_mod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `Cod_Plano` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `Cod_Adm` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
