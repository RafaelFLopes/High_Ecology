-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/11/2024 às 15:46
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
(1146, 'Mohamed', '123', 'mohamed@gmail.com', '1234567890', 0x2e2e2f696d672f75706c6f616473646967c3a36f202d2070657266696c2e706e67, 1),
(1147, 'Aluno', '123', 'teste@gmail.com', '1234567890', 0x2e2e2f696d672f75706c6f61647373642e504e47, 1),
(1148, 'Jovana', '123', 'jovana@gmail.com', '1234567890', 0x2e2e2f696d672f75706c6f61647370726f746f7469706f2e504e47, 1),
(1149, 'Pedro', '123', 'pedro@gmail', '1234567890', 0x2e2e2f696d672f75706c6f61647373642e504e47, 1),
(1150, 'Castro', '123', 'castro@gmail.com', '1234567890', 0x2e2e2f696d672f75706c6f61647370726f746f7469706f2e504e47, 1),
(1151, 'Julia', '123', 'julia@gmail.com', '1234567890', 0x2e2e2f696d672f75706c6f61647370726f746f7469706f2e504e47, 1);

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
(52, 1146, 'growth', 'Pix', '2024-11-28'),
(53, 0, 'growth', 'Pix', '2024-11-28'),
(54, 1147, 'growth', 'Pix', '2024-11-28'),
(55, 0, 'growth', 'Pix', '2024-11-28'),
(56, 1148, 'growth', 'Pix', '2024-11-28'),
(57, 0, 'seed', 'Cartão', '2024-11-28'),
(58, 1149, 'seed', 'Cartão', '2024-11-28'),
(59, 0, 'seed', 'Cartão', '2024-11-28'),
(60, 1150, 'seed', 'Cartão', '2024-11-28'),
(61, 0, 'seed', 'Boleto', '2024-11-28'),
(62, 1151, 'seed', 'Boleto', '2024-11-28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `certificado`
--

CREATE TABLE `certificado` (
  `Cod_Aluno` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `certificado`
--

INSERT INTO `certificado` (`Cod_Aluno`, `id_curso`) VALUES
(1144, 38),
(1144, 39);

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
(11, 68, 'Introdução à Biologia', 'Introdução à Biologia', 'Visão Geral', 'A Biologia é uma ciência que estuda a vida e os seres vivos. Ela envolve a análise e a compreensão dos organismos, desde as células mais básicas até a complexidade dos ecossistemas. A Biologia abrange uma vasta gama de áreas estudo, como genética, anatomia, fisiologia, ecologia, evolução, entre outras. Vamos explorar desde a estrutura celular dos organismos até a diversidade e interações dos diferentes seres vivos. Venha se aventurar neste mundo fascinante!', 'biologia - foto 1.png', 'Introdução à Biologia', 'A Biologia desempenha um papel fundamental na compreensão do mundo ao nosso redor e na solução de problemas globais. Ela nos ajuda a entender como os organismos funcionam, como eles se relacionam entre si e com o ambiente, e como eles evoluíram ao longo d', 'biologia - foto 2.png', 'Principais áreas da Biologia', 'Botânica: A Botânica é o ramo da Biologia que estuda as plantas, desde as mais simples até as mais complexas. Ela investiga a anatomia, a fisiologia, a classificação, a reprodução e a ecologia das plantas.\r\n\r\nZoologia: A Zoologia é o estudo dos animais, i', 'biologia - foto 4.png', '2024-11-29 14:25:52'),
(12, 69, 'Ecologia e Conservação', 'Ecologia e Conservação', 'Ecologia e Conservação', 'A ecologia é a ciência que estuda as interações entre os organismos e o meio ambiente em que vivem. Ela desempenha um papel fundamental na compreensão dos ecossistemas e na conservação da biodiversidade. A conservação, por sua vez, é o conjunto de estratégias e ações voltadas para a proteção e preservação dos recursos naturais, com o objetivo de garantir sua sustentabilidade a longo prazo.', 'biologia - foto 5.png', 'Relação entre ecologia e conservação', 'A ecologia e a conservação estão intimamente relacionadas, pois a compreensão dos processos ecológicos é essencial para o desenvolvimento de estratégias eficientes de conservação. Através do estudo das interações entre os organismos e o meio ambiente, os ', 'biologia - foto 8.png', 'Exemplos de conservação baseada em ecologia', 'Há diversos exemplos de conservação baseada em princípios ecológicos. Um deles é a criação de corredores ecológicos, que consistem na conexão de fragmentos florestais por meio de áreas de vegetação nativa. Esses corredores permitem a dispersão de espécies', 'biologia - foto 7.png', '2024-11-29 14:28:14'),
(13, 70, 'Evolução e Seleção Natural', 'Evolução e Seleção Natural', 'Evolução e Seleção Natural', 'A evolução é um dos princípios fundamentais da biologia, explicando como as espécies mudam e se adaptam ao longo do tempo. A seleção natural é um dos mecanismos principais que impulsionam esse processo evolutivo. Neste contexto, vamos explorar a relação entre evolução e seleção natural, entendendo como essas forças moldam a diversidade da vida em nosso planeta.', 'biologia - foto 14.png', 'Evolução: uma visão geral', 'A evolução pode ser definida como o processo cumulativo de mudanças hereditárias nas populações ao longo das gerações. Essas mudanças ocorrem devido a vários fatores, como mutação, recombinação genética e fluxo gênico. A evolução é impulsionada por forças', 'biologia - foto 10.png', 'Evolução por Seleção Natural: um processo contínuo', 'A evolução por seleção natural é um processo contínuo que ocorre ao longo de milhares ou milhões de anos. Variações aleatórias ocorrem nas populações, e as características que conferem vantagens adaptativas desencadeiam respostas seletivas ao ambiente. Co', 'biologia - foto 14.png', '2024-11-29 14:29:54'),
(14, 71, ' Fundamentos da Ecologia', '\r\nFundamentos da Ecologia', 'Visão Geral', '\r\nEste curso oferece uma introdução abrangente à ecologia, abordando os principais conceitos e princípios dessa ciência. Você aprenderá sobre os diferentes níveis de organização ecológica, desde organismos individuais até ecossistemas complexos, explorando a estrutura e o funcionamento de comunidades e populações. Serão discutidos os ciclos biogeoquímicos, como os ciclos da água, carbono, nitrogênio e fósforo, e sua importância para a manutenção da vida na Terra. Além disso, você estudará a biodiversidade, sua importância para o equilíbrio ecológico e as interações entre os organismos e o ambiente, como relações de predação, competição e mutualismo.', 'ecologia - foto 2.png', 'História da Ecologia e Níveis de organização ecológica', 'A Ecologia como ciência moderna surgiu no final do século XIX, com o desenvolvimento do conceito de \"organismo e ambiente\" por diversos pesquisadores. O termo \"Ecologia\" foi cunhado pelo biólogo alemão Ernst Haeckel em 1866, a partir das palavras gregas \"', 'ecologia - foto 1.png', 'Importância da Ecologia', 'A Ecologia desempenha um papel fundamental na compreensão dos desafios ambientais atuais, como a perda de biodiversidade, as mudanças climáticas e a degradação dos ecossistemas. Ela fornece as bases científicas para a conservação da natureza e o manejo su', 'ecologia - foto 5.png', '2024-11-29 14:35:52'),
(15, 72, 'Conservação e Preservação Ambiental', 'Conservação e Preservação Ambiental', 'Conservação Ambiental', 'A conservação e preservação ambiental são conceitos fundamentais no campo da ecologia, pois visam a proteção e a gestão dos recursos naturais, buscando promover a sustentabilidade e a qualidade de vida das espécies e dos ecossistemas. A conservação ambiental refere-se à utilização sustentável dos recursos naturais, levando em consideração a capacidade de regeneração do meio ambiente. Ela envolve a adoção de práticas que minimizem o impacto humano sobre os ecossistemas, visando à preservação da biodiversidade, dos serviços ecossistêmicos e da qualidade ambiental. Existem diferentes estratégias de conservação ambiental, que podem ser aplicadas em diferentes escalas, desde ações individuais até políticas públicas.', 'ecologia - foto 4.png', 'Preservação Ambiental', 'As reservas biológicas são áreas onde todas as atividades humanas são proibidas, com o objetivo de conservar a flora, a fauna e os processos ecológicos sem qualquer interferência. Essas áreas são especialmente importantes para a preservação de espécies am', 'biologia - foto 4.png', 'Conservação e a Preservação Ambiental', 'A conservação e a preservação ambiental compartilham o objetivo de proteger os recursos naturais, mas o fazem de maneiras distintas. A conservação foca no uso responsável e sustentável dos recursos, permitindo atividades humanas que não comprometam a capa', 'ecologia - foto 3.png', '2024-11-29 14:38:58'),
(16, 73, 'Cadeias Alimentares e Teias Tróficas', 'Cadeias Alimentares e Teias Tróficas', 'Cadeia Alimentar', 'As cadeias alimentares e as teias tróficas são conceitos fundamentais na ecologia para compreender as interações entre os seres vivos em um ecossistema. Essas relações são essenciais para a manutenção do equilíbrio ecológico e o funcionamento adequado de um determinado ambiente.\r\n\r\nUma cadeia alimentar representa a transferência de energia e nutrientes de um organismo para outro, em uma sequência linear. Ela demonstra como os seres vivos estão interligados através da alimentação, em uma sucessão de níveis tróficos.\r\n\r\nOs níveis tróficos são divididos em produtores, consumidores primários, consumidores secundários e decompositores. Os produtores são os organismos autotróficos, como as plantas, que produzem seu próprio alimento através da fotossíntese. Os consumidores primários, por sua vez, são herbívoros que se alimentam diretamente dos produtores. Os consumidores secundários são aqueles que se alimentam dos consumidores primários, podendo ser carnívoros ou onívoros. Por fim, os decompositores são responsáveis por decompor a matéria orgânica em substâncias inorgânicas, fechando o ciclo de nutrientes do ecossistema.\r\n\r\nA energia flui através desses níveis tróficos e diminui à medida que avança na cadeia alimentar. Isso ocorre devido a perdas de energia durante o processo de transferência, metabolismo dos organismos e perdas de calor. Por exemplo, somente uma pequena porção da energia solar capturada pelas plantas é transferida para os herbívoros, e assim por diante.', 'ecologia - foto 7.png', 'Importância da Ecologia', 'Uma teia trófica, por sua vez, é uma representação mais complexa e realista das interações alimentares em um ecossistema. Ao contrário de uma cadeia alimentar linear, uma teia trófica mostra múltiplas interconexões e fluxos de energia entre produtores, co', 'biologia - foto 6.png', 'Resumo dos Módulos', 'A Introdução à Ecologia é um ponto de partida fundamental para entender o funcionamento dos ecossistemas e as interações entre os seres vivos e o ambiente. Neste curso, aprendemos sobre os conceitos básicos da ecologia, como populações, comunidades, bioma', 'ecologia-curso.jpg', '2024-11-29 14:41:20');

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
(1144, 42, 'visualizado', '2024-11-28'),
(2, 39, 'visualizado', '2024-11-28'),
(1148, 38, 'visualizado', '2024-11-29');

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
  MODIFY `Cod_Aluno` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1152;

--
-- AUTO_INCREMENT de tabela `assinaturas`
--
ALTER TABLE `assinaturas`
  MODIFY `Cod_Assinatura` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `conteudos`
--
ALTER TABLE `conteudos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
