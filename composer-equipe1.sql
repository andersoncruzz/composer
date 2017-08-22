-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 22-Ago-2017 às 12:03
-- Versão do servidor: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `composer-equipe1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Alternativa`
--

CREATE TABLE `Alternativa` (
  `id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `corretude` int(11) NOT NULL,
  `Questao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Alternativa`
--

INSERT INTO `Alternativa` (`id`, `description`, `corretude`, `Questao_id`) VALUES
(1, '', 5, 1),
(2, '', 4, 1),
(3, '', 3, 1),
(4, '', 2, 1),
(5, '', 0, 1),
(6, 'perfect', 5, 2),
(7, 'correct', 4, 2),
(8, 'good', 3, 2),
(9, 'right', 2, 2),
(10, 'okay', 0, 2),
(11, 'perfect', 5, 5),
(12, 'perfect', 40000, 6),
(13, 'correct', 4, 6),
(14, 'good', 3, 6),
(15, 'right', 2, 6),
(16, 'okay', 0, 6),
(17, '.', 1000000000, 7),
(18, '.', 4, 7),
(19, '.', 3, 7),
(20, '.', 2, 7),
(21, '.', 0, 7),
(22, 'teste', 5, 8),
(23, 'A', 5, 9),
(24, 'A', 0, 10),
(25, 'B', 4, 10),
(26, 'C', 5, 10),
(27, 'D', 4, 10),
(28, 'E', 0, 10),
(29, 'Lisp', 0, 11),
(30, 'Pascal', 4, 11),
(31, 'C', 3, 11),
(32, 'Basic', 0, 11),
(33, 'Java', 5, 11),
(34, 'Lisp', 0, 12),
(35, 'Pascal', 4, 12),
(36, 'C', 3, 12),
(37, 'Basic', 0, 12),
(38, 'Java', 5, 12),
(39, 'Lisp', 0, 13),
(40, 'Pascal', 4, 13),
(41, 'C', 3, 13),
(42, 'Basic', 0, 13),
(43, 'Java', 5, 13),
(44, 'Lisp', 0, 14),
(45, 'Pascal', 4, 14),
(46, 'C', 3, 14),
(47, 'Basic', 0, 14),
(48, 'Java', 5, 14),
(49, 'Lisp', 0, 15),
(50, 'Pascal', 0, 15),
(51, 'C', 3, 15),
(52, 'Basic', 0, 15),
(53, 'Java', 5, 15),
(54, 'Lisp', 0, 16),
(55, 'Pascal', 4, 16),
(56, 'C', 3, 16),
(57, 'Basic', 0, 16),
(58, 'Java', 5, 16),
(59, 'Lisp', 0, 17),
(60, 'Pascal', 4, 17),
(61, 'C', 3, 17),
(62, 'Basic', 0, 17),
(63, 'Java', 5, 17),
(64, 'Desc 1', 5, 18),
(65, 'Desc 2', 5, 18),
(66, 'Desc 1', 5, 19),
(67, 'Desc 2', 5, 19),
(68, 'Desc 3', 5, 19),
(69, 'Desc 4', 5, 19),
(70, 'Desc 5', 5, 19),
(71, 'c', 5, 21),
(72, 'a', 4, 21),
(73, 'b', 3, 21),
(74, 'd', 2, 21),
(75, 'e', 0, 21),
(76, 'a', 5, 22),
(77, 'b', 4, 22),
(78, 'c', 3, 22),
(79, 'd', 2, 22),
(80, 'e', 0, 22),
(81, 'a', 5, 23),
(82, 'b', 4, 23),
(83, 'c', 3, 23),
(84, 'd', 2, 23),
(85, 'e', 0, 23);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aula`
--

CREATE TABLE `Aula` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `qtChapters` int(11) DEFAULT NULL,
  `Disciplina_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Aula`
--

INSERT INTO `Aula` (`id`, `subject`, `qtChapters`, `Disciplina_id`) VALUES
(1, 'Aula 1', NULL, 2),
(5, 'A001', NULL, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo`
--

CREATE TABLE `Capitulo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `qtObjects` int(11) DEFAULT NULL,
  `Aula_id` int(11) NOT NULL,
  `dificuldade` int(11) DEFAULT NULL,
  `ordem` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo`
--

INSERT INTO `Capitulo` (`id`, `titulo`, `qtObjects`, `Aula_id`, `dificuldade`, `ordem`) VALUES
(1, 'Capitulo 1', NULL, 1, 1, '[{"tipo":"objquestionario","descricao":"Question\\u00e1rio - Assunto","ordem":1,"id":13},{"tipo":"objtexto","descricao":"Assunto Texto","ordem":2,"id":32},{"tipo":"objgaleria","descricao":"Assunto Galeria","ordem":3,"id":4},{"tipo":"objapresentacao","descricao":"Apresenta\\u00e7\\u00e3o 1","ordem":4,"id":10},{"tipo":"objvideo","descricao":"Video","ordem":5,"id":6},{"tipo":"objdinamico","descricao":"Objeto Dinamico","ordem":6,"id":4},{"tipo":"objvideo","descricao":"teste","ordem":7,"id":1},{"tipo":"objquestionario","descricao":"fdaf","ordem":8,"id":14},{"tipo":"objgaleria","descricao":"Andre","ordem":9,"id":5}]'),
(8, 'C001', NULL, 5, 1, '{"0":{"tipo":"objquestionario","descricao":"TESTQ001","ordem":1,"id":15},"1":{"tipo":"objgaleria","descricao":"G001","ordem":3,"id":6},"3":{"tipo":"objapresentacao","descricao":"P001","ordem":3,"id":11}}'),
(9, 'C002', NULL, 5, 5, '{"1":{"tipo":"objtexto","descricao":"T001","ordem":1,"id":35},"2":{"tipo":"objdinamico","descricao":"CD001","ordem":2,"id":5}}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjApresentacao`
--

CREATE TABLE `Capitulo_has_ObjApresentacao` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjApresentacao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjApresentacao`
--

INSERT INTO `Capitulo_has_ObjApresentacao` (`Capitulo_id`, `ObjApresentacao_id`) VALUES
(1, 10),
(8, 11);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjDinamico`
--

CREATE TABLE `Capitulo_has_ObjDinamico` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjDinamico_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjDinamico`
--

INSERT INTO `Capitulo_has_ObjDinamico` (`Capitulo_id`, `ObjDinamico_id`) VALUES
(1, 4),
(9, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjGaleria`
--

CREATE TABLE `Capitulo_has_ObjGaleria` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjGaleria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjGaleria`
--

INSERT INTO `Capitulo_has_ObjGaleria` (`Capitulo_id`, `ObjGaleria_id`) VALUES
(1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjQuestionario`
--

CREATE TABLE `Capitulo_has_ObjQuestionario` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjQuestionario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjQuestionario`
--

INSERT INTO `Capitulo_has_ObjQuestionario` (`Capitulo_id`, `ObjQuestionario_id`) VALUES
(1, 13),
(1, 14),
(8, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjTexto`
--

CREATE TABLE `Capitulo_has_ObjTexto` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjTexto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjTexto`
--

INSERT INTO `Capitulo_has_ObjTexto` (`Capitulo_id`, `ObjTexto_id`) VALUES
(1, 32),
(9, 35);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjVideo`
--

CREATE TABLE `Capitulo_has_ObjVideo` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjVideo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjVideo`
--

INSERT INTO `Capitulo_has_ObjVideo` (`Capitulo_id`, `ObjVideo_id`) VALUES
(1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Disciplina`
--

CREATE TABLE `Disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Disciplina`
--

INSERT INTO `Disciplina` (`id`, `nome`, `user_id`) VALUES
(2, 'Disciplina 1', 26),
(5, 'D001', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Imagem`
--

CREATE TABLE `Imagem` (
  `id` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `legenda` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Imagem`
--

INSERT INTO `Imagem` (`id`, `caminho`, `legenda`) VALUES
(3, 'arquivos/imagem_3.png', 'testfoto'),
(4, 'arquivos/imagem_4.jpg', 'Zangief'),
(5, 'arquivos/imagem_5.jpg', 'Test Image');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjApresentacao`
--

CREATE TABLE `ObjApresentacao` (
  `id` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `qteSlides` int(11) NOT NULL DEFAULT '0',
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) NOT NULL DEFAULT '0',
  `referencias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjApresentacao`
--

INSERT INTO `ObjApresentacao` (`id`, `assunto`, `caminho`, `qteSlides`, `topicos`, `exerciciosResolvidos`, `tipo`, `duracao`, `serie`, `avaliacao`, `referencias`) VALUES
(1, 'Algoritmos e Programacao', 'arquivos/slides_1.pdf', 0, '.', 0, 'Exemplo', 2, '1ª ano - Ensino Fundamental', 0, '.'),
(2, 'TESTPRTN001', 'arquivos/slides_2.pptx', 0, 'test', 0, 'Conceito', 8, 'Outro(s)', 0, 'nrf'),
(3, 'Iniciando a Programação', 'arquivos/slides_3.pdf', 0, 'Conceitos Básicos', 0, 'Conceito', 100, 'Outro(s)', 0, 'Notas de Aula'),
(4, 'Iniciando a Programação', 'arquivos/slides_4.pdf', 0, 'Conceitos Básicos', 0, 'Conceito', 1, 'Outro(s)', 0, 'Notas de Aula'),
(5, 'Iniciando a Programação', 'arquivos/slides_5.pdf', 0, 'Conceitos básicos', 0, 'Conceito', 1, 'Outro(s)', 0, 'Notas de aula'),
(6, 'Iniciando a Programação', 'arquivos/slides_6.pdf', 0, 'Conceitos Básicos', 0, 'Conceito', 2, 'Outro(s)', 0, 'Notas de Aula'),
(7, 'Iniciando a Programação', 'arquivos/slides_7.pdf', 0, 'Conceitos basicos', 0, 'Conceito', 5, 'Outro(s)', 0, 'Notas de aula'),
(8, 'Iniciando a Programação', 'arquivos/slides_8.pdf', 0, 'Conceitos básicos', 0, 'Conceito', 50, 'Outro(s)', 0, 'Notas de Aula'),
(9, 'Iniciando a Programação', 'arquivos/slides_9.pdf', 0, 'Conceitos Básicos', 0, 'Conceito', 2, 'Outro(s)', 0, 'Notas de Aula'),
(10, 'Apresentação 1', 'arquivos/slides_10.pdf', 0, 'Topicos Apresentacao', 0, 'Tutorial', 15, '1ª ano - Ensino Fundamental', 0, 'Referencias Apresentacao'),
(11, 'P001', 'arquivos/slides_11.pptx', 0, 'test', 0, 'Conceito', 5, 'Outro(s)', 0, 'ref');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjDinamico`
--

CREATE TABLE `ObjDinamico` (
  `id` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `descricao` text,
  `topicos` text,
  `exerciciosResolvidos` tinyint(1) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text,
  `tipo` text,
  `serie` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjDinamico`
--

INSERT INTO `ObjDinamico` (`id`, `assunto`, `caminho`, `descricao`, `topicos`, `exerciciosResolvidos`, `duracao`, `avaliacao`, `referencias`, `tipo`, `serie`) VALUES
(1, 'TESTOBJDYN', 'arquivos/dinamico_newdynaobj.zip', 'INTRO', 'INTRO', 0, 10, 0, 'NOREF', 'Formula', 'Outro(s)'),
(2, 'TESTOBJDYN1', 'arquivos/dinamico_newdynaobj.zip', 'INTRO', 'INTRO', 0, 10, 0, 'NOREF', '', '1ª ano - Ensino Fundamental'),
(3, 'TESTOBJDYN', '', 'INTRO new', 'INTRO', 0, 10, 0, 'NOREF', '', 'Outro(s)'),
(4, 'Objeto Dinamico', 'arquivos/dinamico_VSCode-darwin-stable (1).zip', 'Descricao Objeto Dinamico', 'Topicos', 0, 20, 0, 'Ref Obj Din', 'Exemplo', '1ª ano - Ensino Fundamental'),
(5, 'CD001', 'arquivos/dinamico_newdynaobj.zip', 'test', 'test', 0, 5, 0, 'ref', 'Tutorial', 'Outro(s)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjGaleria`
--

CREATE TABLE `ObjGaleria` (
  `id` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `qteImagens` int(11) DEFAULT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjGaleria`
--

INSERT INTO `ObjGaleria` (`id`, `assunto`, `qteImagens`, `topicos`, `exerciciosResolvidos`, `tipo`, `duracao`, `serie`, `avaliacao`, `referencias`) VALUES
(2, 'TESTOBJFOTO', NULL, 'intro', 0, 'Formula', 10, 'Outro(s)', NULL, 'noref'),
(3, 'TESTOBJFOTO', NULL, 'intro', 0, 'Conceito,Formula', 10, '1ª ano - Ensino Fundamental', NULL, 'noref'),
(4, 'Assunto Galeria', NULL, 'Tópicos Galeria', 0, 'Conceito', 3, '1ª ano - Ensino Fundamental', NULL, 'Referências'),
(5, 'Andre', NULL, 'teste', 0, 'Conceito', 1, 'Outro(s)', NULL, 'teste'),
(6, 'G001', NULL, 'test', 0, 'Conceito', 5, '1ª ano - Ensino Fundamental', NULL, 'ref');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjGaleria_has_Imagem`
--

CREATE TABLE `ObjGaleria_has_Imagem` (
  `ObjGaleria_id` int(11) NOT NULL,
  `Imagem_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjGaleria_has_Imagem`
--

INSERT INTO `ObjGaleria_has_Imagem` (`ObjGaleria_id`, `Imagem_id`) VALUES
(3, 3),
(4, 4),
(6, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjQuestionario`
--

CREATE TABLE `ObjQuestionario` (
  `id` int(11) NOT NULL,
  `assunto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjQuestionario`
--

INSERT INTO `ObjQuestionario` (`id`, `assunto`) VALUES
(1, 'TESTQ002'),
(2, 'Questionario'),
(3, 'TESTQ001'),
(4, 'exercicio'),
(5, 'teste'),
(6, 'Exercício de Programção'),
(7, 'Exercício de Programção'),
(8, 'Exercício de Programção'),
(9, 'Exercício de Programação'),
(10, 'Exercício de Programação'),
(11, 'Exercício de Programação'),
(12, 'Exercício de Programação'),
(13, 'Questionário - Assunto'),
(14, 'fdaf'),
(15, 'TESTQ001');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjQuestionario_has_Questao`
--

CREATE TABLE `ObjQuestionario_has_Questao` (
  `ObjQuestionario_id` int(11) NOT NULL,
  `Questao_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjQuestionario_has_Questao`
--

INSERT INTO `ObjQuestionario_has_Questao` (`ObjQuestionario_id`, `Questao_id`) VALUES
(1, 4),
(1, 5),
(3, 7),
(4, 8),
(4, 9),
(4, 10),
(6, 11),
(7, 12),
(8, 13),
(9, 14),
(10, 15),
(11, 16),
(12, 17),
(13, 18),
(13, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjTexto`
--

CREATE TABLE `ObjTexto` (
  `id` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `topicos` text,
  `exerciciosResolvidos` tinyint(1) DEFAULT NULL,
  `tipo` text,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjTexto`
--

INSERT INTO `ObjTexto` (`id`, `assunto`, `conteudo`, `topicos`, `exerciciosResolvidos`, `tipo`, `duracao`, `serie`, `avaliacao`, `referencias`) VALUES
(29, 'TESTOBJTEXT', '<p>HELLO WORLD .... THIS IS A NEW BABY.</p>\r\n', 'INTRO', 0, '', 15, 'Outro(s)', NULL, 'NO REF.'),
(30, 'TESTOBJTEXT', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed posuere eros. Nullam varius suscipit lacus, eu ornare est ornare a. Ut pulvinar diam sed est feugiat, imperdiet ultricies felis viverra. Sed imperdiet ligula in bibendum tincidunt. Etiam malesuada auctor odio, iaculis viverra arcu suscipit eu. Suspendisse ullamcorper nisl at dolor mattis, ut vehicula tellus eleifend. Morbi lorem eros, mattis nec leo vitae, aliquet faucibus nisl. Nam dictum sagittis consequat. Nulla non lectus vitae nibh euismod vestibulum. Etiam tristique arcu ut eros feugiat luctus. Fusce iaculis mollis lorem. Phasellus varius facilisis justo, eget laoreet dolor tristique eget. Vestibulum porttitor, tellus ac tempor convallis, mi leo interdum elit, quis tristique urna turpis et ex. Fusce lacus odio, gravida ac neque sed, euismod laoreet libero. Fusce nec pharetra arcu.</p>\r\n\r\n<p>In eget felis vitae dui interdum tempor vitae eu augue. Phasellus quis luctus quam. Nulla pellentesque facilisis lectus, quis porttitor ex sodales vel. Cras orci odio, sodales at nisi vel, convallis dignissim enim. Vivamus tristique accumsan lacinia. Quisque a mollis nulla. Sed eget consectetur odio. Donec vitae tempor dui. Nullam vel turpis ut justo elementum convallis id sed sapien. Donec at tincidunt nisl. Fusce fermentum eget justo vel venenatis. Phasellus diam massa, luctus sed aliquet nec, gravida non magna. Nam urna purus, tincidunt at viverra id, viverra ac erat.</p>\r\n\r\n<p>Aliquam eget imperdiet mauris. Donec venenatis pretium sodales. Suspendisse sit amet velit diam. Quisque id mauris faucibus, viverra ligula eget, imperdiet lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin tellus augue, condimentum vitae aliquet vel, imperdiet sed elit. Phasellus euismod rutrum ligula sit amet sollicitudin. Vivamus hendrerit fringilla lectus sed bibendum. Aenean dapibus mi et purus placerat, et congue diam luctus.</p>\r\n\r\n<p>Cras lorem urna, mattis id pretium eu, lobortis et magna. Donec maximus, augue sed varius iaculis, ex risus consectetur eros, sit amet vestibulum leo risus vel quam. Aenean libero neque, porttitor eget porta a, semper quis ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porta rhoncus sapien, et aliquam eros bibendum eget. Nam dui urna, aliquet finibus orci non, interdum commodo velit. Aliquam molestie convallis mattis.</p>\r\n\r\n<p>Donec quis nisl congue, luctus lectus dignissim, fermentum augue. Suspendisse mattis fermentum lectus, at gravida felis blandit blandit. Ut pulvinar neque nec velit tincidunt, vitae commodo libero venenatis. Morbi iaculis finibus nisl ac semper. Nunc viverra vestibulum elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer pretium vel nisi vel pellentesque. Vestibulum quis fermentum leo, quis iaculis tellus. Nullam varius imperdiet nisl, quis interdum nulla sollicitudin in. Sed pellentesque purus ac nibh interdum, ac sollicitudin libero gravida. Sed condimentum augue nulla, sed accumsan nisl efficitur vel. Aliquam condimentum mollis ligula ut aliquam. Fusce et leo at urna ultrices luctus sit amet id lectus. Maecenas vitae scelerisque sapien. Nunc nec porttitor ipsum.</p>\r\n', 'INTRO', 0, '', 10, 'Outro(s)', NULL, 'INTRO'),
(31, 'TESTOBJTEXT', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed posuere eros. Nullam varius suscipit lacus, eu ornare est ornare a. Ut pulvinar diam sed est feugiat, imperdiet ultricies felis viverra. Sed imperdiet ligula in bibendum tincidunt. Etiam malesuada auctor odio, iaculis viverra arcu suscipit eu. Suspendisse ullamcorper nisl at dolor mattis, ut vehicula tellus eleifend. Morbi lorem eros, mattis nec leo vitae, aliquet faucibus nisl. Nam dictum sagittis consequat. Nulla non lectus vitae nibh euismod vestibulum. Etiam tristique arcu ut eros feugiat luctus. Fusce iaculis mollis lorem. Phasellus varius facilisis justo, eget laoreet dolor tristique eget. Vestibulum porttitor, tellus ac tempor convallis, mi leo interdum elit, quis tristique urna turpis et ex. Fusce lacus odio, gravida ac neque sed, euismod laoreet libero. Fusce nec pharetra arcu.</p>\r\n\r\n<p>In eget felis vitae dui interdum tempor vitae eu augue. Phasellus quis luctus quam. Nulla pellentesque facilisis lectus, quis porttitor ex sodales vel. Cras orci odio, sodales at nisi vel, convallis dignissim enim. Vivamus tristique accumsan lacinia. Quisque a mollis nulla. Sed eget consectetur odio. Donec vitae tempor dui. Nullam vel turpis ut justo elementum convallis id sed sapien. Donec at tincidunt nisl. Fusce fermentum eget justo vel venenatis. Phasellus diam massa, luctus sed aliquet nec, gravida non magna. Nam urna purus, tincidunt at viverra id, viverra ac erat.</p>\r\n\r\n<p>Aliquam eget imperdiet mauris. Donec venenatis pretium sodales. Suspendisse sit amet velit diam. Quisque id mauris faucibus, viverra ligula eget, imperdiet lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin tellus augue, condimentum vitae aliquet vel, imperdiet sed elit. Phasellus euismod rutrum ligula sit amet sollicitudin. Vivamus hendrerit fringilla lectus sed bibendum. Aenean dapibus mi et purus placerat, et congue diam luctus.</p>\r\n\r\n<p>Cras lorem urna, mattis id pretium eu, lobortis et magna. Donec maximus, augue sed varius iaculis, ex risus consectetur eros, sit amet vestibulum leo risus vel quam. Aenean libero neque, porttitor eget porta a, semper quis ante. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc porta rhoncus sapien, et aliquam eros bibendum eget. Nam dui urna, aliquet finibus orci non, interdum commodo velit. Aliquam molestie convallis mattis.</p>\r\n\r\n<p>Donec quis nisl congue, luctus lectus dignissim, fermentum augue. Suspendisse mattis fermentum lectus, at gravida felis blandit blandit. Ut pulvinar neque nec velit tincidunt, vitae commodo libero venenatis. Morbi iaculis finibus nisl ac semper. Nunc viverra vestibulum elementum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer pretium vel nisi vel pellentesque. Vestibulum quis fermentum leo, quis iaculis tellus. Nullam varius imperdiet nisl, quis interdum nulla sollicitudin in. Sed pellentesque purus ac nibh interdum, ac sollicitudin libero gravida. Sed condimentum augue nulla, sed accumsan nisl efficitur vel. Aliquam condimentum mollis ligula ut aliquam. Fusce et leo at urna ultrices luctus sit amet id lectus. Maecenas vitae scelerisque sapien. Nunc nec porttitor ipsum.</p>\r\n', 'intro', 0, '', 10, 'Outro(s)', NULL, 'noref'),
(32, 'Assunto Texto', '<p>Conte&uacute;do Texto</p>\r\n', 'Topicos Texto', 1, 'Aplicacao', 4, '1ª ano - Ensino Fundamental', NULL, 'Referêcias'),
(33, 'TEXT001', '<p>This is a text object</p>\r\n', 'Introduction', 0, 'Conceito', 10, 'Outro(s)', NULL, 'Basic Introduction'),
(34, 'T001', '<p>test</p>\r\n', 'test', 0, 'Conceito', 12, 'Outro(s)', NULL, 'ref'),
(35, 'T001', '<p>TEST</p>\r\n', 'TEST', 0, 'Conceito', 10, 'Outro(s)', NULL, 'REF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjVideo`
--

CREATE TABLE `ObjVideo` (
  `id` int(11) NOT NULL,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `referencias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjVideo`
--

INSERT INTO `ObjVideo` (`id`, `assunto`, `caminho`, `topicos`, `exerciciosResolvidos`, `tipo`, `duracao`, `serie`, `avaliacao`, `referencias`) VALUES
(1, 'teste', 'arquivos/video_1.mp4', 'teste', 0, 'Conceito', 2, '1ª ano - Ensino Fundamental', 0, 'teste'),
(2, 'teste', '', 'teste', 0, 'Formula', 1, '1ª ano - Ensino Fundamental', 0, 'teste'),
(3, 'tes', 'arquivos/video_3.mp4', 'tes', 0, 'Formula', 0, '1ª ano - Ensino Fundamental', 0, 'tes'),
(4, 'TESTVID001', 'arquivos/video_4.mp4', 'test', 0, 'Conceito', 5, 'Outro(s)', 0, 'noref'),
(5, 'yula', 'arquivos/video_5.mp4', 'intro', 0, 'Formula,Representacao Grafica', 10, 'Outro(s)', 0, 'noref'),
(6, 'Video', 'arquivos/video_6.mp4', 'Topicos Vieo', 0, 'Representacao Grafica', 20, '1ª ano - Ensino Fundamental', 0, 'Referencias Video'),
(7, 'V001', 'arquivos/video_7.mp4', 'test', 0, 'Tutorial', 5, 'Outro(s)', 0, 'ref');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Questao`
--

CREATE TABLE `Questao` (
  `id` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `enunciado` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `dica` text NOT NULL,
  `conteudo` int(11) NOT NULL,
  `correta` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Questao`
--

INSERT INTO `Questao` (`id`, `nivel`, `assunto`, `enunciado`, `duracao`, `dica`, `conteudo`, `correta`) VALUES
(1, 1, 'Introduction', '<p>STATEMENT</p>\r\n', 15, '<p>NONE</p>\r\n', 29, 'a'),
(2, 1, 'Introduction', '<p>STATEMENT</p>\r\n', 15, '<p>NONE</p>\r\n', 29, 'b'),
(3, 1, 'concept', '<p>statement</p>\r\n', 15, '<p>dica</p>\r\n', 29, 'a'),
(4, 1, 'concept', '<p>statement</p>\r\n', 15, '<p>dica</p>\r\n', 29, 'a'),
(5, 1, 'concept', '<p>statement</p>\r\n', 15, '<p>dica</p>\r\n', 29, 'a'),
(6, 5, 'concept1', '<p>statement new</p>\r\n', 15, '<p>dica 2</p>\r\n', 29, 'a'),
(7, 1, 'test1', '<p>jjj</p>\r\n', 10, '<p>rtert</p>\r\n', 29, 'a'),
(8, 1, 'teste', '<p>teste</p>\r\n', 1, '<p>teste</p>\r\n', 29, 'a'),
(9, 1, 'teste', '<p>teste</p>\r\n', 1, '<p>teste</p>\r\n', 29, 'a'),
(10, 1, 'teste', '<p>teste</p>\r\n', 1, '<p>teste</p>\r\n', 29, 'c'),
(11, 5, 'Exercício de Programação', '<p>Qual das linguagens a seguir &eacute; orientada a objetos?</p>\r\n', 5, '<p>Emrpregada em bilh&otilde;es de dispositivos</p>\r\n', 29, 'c'),
(12, 1, 'Exercício de Programação', '<p>Qual das linguagens a seguir &eacute; orientada a objetos?</p>\r\n', 1, '<p>Lembre-se do que foi dado em aula!!</p>\r\n', 29, 'e'),
(13, 3, 'Exercício de Programação', '<p><br />\r\nQual das linguagens a seguir &eacute; orientada a objetos?</p>\r\n', 1, '<p>Dica</p>\r\n', 29, 'e'),
(14, 1, 'Exercício de Programação', '<p>Qual das linguagens a seguir &eacute; orientada a objetos ?</p>\r\n', 1, '<p>x&iacute;cara</p>\r\n', 29, 'e'),
(15, 3, 'Questao qualquer', '<p>Qual das linguagens a seguir &eacute; orientada a objetos?</p>\r\n', 5, '<p>Dica qualquer</p>\r\n', 29, 'e'),
(16, 3, 'Exercicio de Programação', '<p>Qual das linguagens a seguir &eacute; orientada a objetos?</p>\r\n', 30, '<p>Essa linguagem tamb&eacute;m pode ser estruturada</p>\r\n', 29, 'e'),
(17, 3, '', '<p>Qual das linguagens a seguir &eacute; orientada a objetos ?</p>\r\n', 1, '<p>blabla</p>\r\n', 29, 'e'),
(18, 1, 'Assunto', '<p>Enunciado&nbsp;Enunciado&nbsp;Enunciado&nbsp;Enunciado&nbsp;</p>\r\n', 5, '<p>Dica Dica Dica</p>\r\n', 29, 'a'),
(19, 1, 'Assunto', '<p>Enunciado&nbsp;Enunciado&nbsp;Enunciado&nbsp;Enunciado&nbsp;</p>\r\n', 5, '<p>Dica Dica Dica</p>\r\n', 29, 'a'),
(20, 1, 'test', '<p>r</p>\r\n', 12, '<p>t</p>\r\n', 29, 'a'),
(21, 1, 'test', '<p>r</p>\r\n', 12, '<p>t</p>\r\n', 29, 'a'),
(22, 3, 'q1', '<p>test</p>\r\n', 7, '<p>test</p>\r\n', 29, 'a'),
(23, 1, 'q1', '<p>test</p>\r\n', 15, '<p>test</p>\r\n', 29, 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(13, 'teste', 'bgZ5V0yoarLXgSqWToNHiCK5cRxJ7tAq', '$2y$13$6/O.oshhpsgjwXcCbS62ieiKMeAHMk9lCQE8FuJ467XBFkHKDnC2W', NULL, 'teste@teste.com', 10, 1492659130, 1492659130),
(14, 'testuser001', 'But3YTuUWTtvYU9BQDJKForO4gHG5A0b', '$2y$13$ENL2jGhGCDDJao.7G8NtIeh.69giLyUIExrvoYjaK2eDXXkLNkhFa', 'FeFPh4hAVE0ZA4-_w9jg7jmZ1mVwI6D8_1492698673', 'anibrata@icomp.ufam.edu.br', 10, 1492698115, 1492698673),
(15, 'testuser002', 'v-YY-hDgbMe2otjhVVOgDcagRPxsqKzf', '$2y$13$Dy/79JuZoimGGyY8VLSOeuF1btrDmr0v3tNg/9WJD6nzppquaSP/u', NULL, 'anibratapal@gmail.com', 10, 1492698784, 1492698784),
(16, 'gabriel', 'as4Rsxyn0KUvAepgc9jy1JJonoUVJKGP', '$2y$13$qkl0804.LZmopcQcnmWQ4ukpESRyUb50KByg1vznowuPUgScp8fT6', NULL, 'gabriel.leitao@icomp.ufam.edu.br', 10, 1492723059, 1492723059),
(17, 'kpereira', 'FDGJGB7Y43IQ8pEDy4un0uHsFQLJgYRC', '$2y$13$ueqlrkms46fBtNCmN3nVouM3q1yMJ4QbCJ.7NWYExGPP2RA6yMLxm', NULL, 'karla.susiane@gmail.com', 10, 1493040370, 1493040370),
(18, 'andre', '2DrUcuF_IIWAAbuvAuZzORTBMjt80E-f', '$2y$13$BRJaQJfL/0jws0jlR4gIJeXczdudZwpUaA7fWn8O0Mk2Fyzggw4K2', NULL, 'alvsoares@oi.com.br', 10, 1493128113, 1493128113),
(19, 'efeitosa', 'Zl9seQ5UQPfFRtqBrGK5zQojav4dnKAV', '$2y$13$21g9gDRRfgVd0MAG0cMFHuCPHRLgEdy2MlBpy72UscEMqZMUo.Tua', NULL, 'efeitosa@icomp.ufam.edu.br', 10, 1493213244, 1493213244),
(20, 'elaineharada', 'frjVdrMnsDEkgKvwhb8tXxTa5LtXtbw7', '$2y$13$vUHBx.M9kgtLAjoApjobbuXHVVbwd68ANLUFuLWzz849/h/IoqPwu', NULL, 'elaine@icomp.ufam.edu.br', 10, 1493215500, 1493215500),
(21, 'awdren', 'N0mQW9Joq0AHrVEPVZxHIufSXSk9ohRH', '$2y$13$tn0gohDGDA1DIcTsJCIz8uNJIoalps8PGiWaVuzk0q1L8dH0oN/P6', NULL, 'awdrenfontao@gmail.com', 10, 1493219372, 1493219372),
(22, 'esouto', 'zuNU6ILcsdndeKARgMrfiiEFwMD8zSzn', '$2y$13$D1YjDg98/awpiVjAvda1Q.kXMWvZ.qR9m5BagZBWC1XIRZHZxNHwW', NULL, 'esouto@icomp.ufam.edu.br', 10, 1493230584, 1493230584),
(23, 'David', 'pxm6uoMDAH7fr5LQk0REhjo2StA0-11H', '$2y$13$d7zdeuP4GposnNF7NNA8Ru54XMC3wWcS15wy9W3DzOycSwfX7pt/C', NULL, 'david@icomp.ufam.edu.br', 10, 1493233998, 1493233998),
(24, 'Josiane', 'NIithTCWqN_Yez2-d8JQrFapCb7EvKoN', '$2y$13$4zPDgWzrpcfv/fNCo1XOW.6lByKdnyz.8CG3Jvhe32IUQ1hnIiODy', NULL, 'josiane@icomp.ufam.edu.br', 10, 1493302418, 1493302418),
(25, 'ludigoncalves', 'fR4m-wdWiadcdeyxlLLEJ1KV9k9CTY2V', '$2y$13$ojF4ZVPtxE.6flzO/nzYYeetItj3.xbxQyCe.pMwWjpJ4NssJUo9u', NULL, 'ludigoncalves.11@gmail.com', 10, 1493304510, 1493304510),
(26, 'sergio.cavalcante', 'cINo6rrrIxIoqUzXwCPr5YzgEIhm-qmo', '$2y$13$SBQBeSWia.LrQp0aGoj81.guAKHTwCNhK3HGZj5zrdkM/lP5vGNl2', NULL, 'sergio.cavalcante@gmail.com', 10, 1493387996, 1493387996),
(27, 'ppchourio', 'hoIwkvPy_OjLiIZ5u7T01E7majVCcu89', '$2y$13$7jmyZHUEFeB3M5S5PwjXa.mcVVMseBpYShIiFeQpp1EtWuzvfCsja', NULL, 'ppchourio@gmail.com', 10, 1494301153, 1494301153);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Alternativa`
--
ALTER TABLE `Alternativa`
  ADD PRIMARY KEY (`id`,`Questao_id`),
  ADD KEY `fk_Alternativa_Questao1_idx` (`Questao_id`);

--
-- Indexes for table `Aula`
--
ALTER TABLE `Aula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Aula_Disciplina1_idx` (`Disciplina_id`);

--
-- Indexes for table `Capitulo`
--
ALTER TABLE `Capitulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `fk_Capitulo_Aula1_idx` (`Aula_id`);

--
-- Indexes for table `Capitulo_has_ObjApresentacao`
--
ALTER TABLE `Capitulo_has_ObjApresentacao`
  ADD PRIMARY KEY (`Capitulo_id`,`ObjApresentacao_id`),
  ADD KEY `fk_Capitulo_has_ObjApresentacao_ObjApresentacao1_idx` (`ObjApresentacao_id`),
  ADD KEY `fk_Capitulo_has_ObjApresentacao_Capitulo1_idx` (`Capitulo_id`);

--
-- Indexes for table `Capitulo_has_ObjDinamico`
--
ALTER TABLE `Capitulo_has_ObjDinamico`
  ADD PRIMARY KEY (`Capitulo_id`,`ObjDinamico_id`),
  ADD KEY `fk_Capitulo_has_ObjDinamico_ObjDinamico1_idx` (`ObjDinamico_id`),
  ADD KEY `fk_Capitulo_has_ObjDinamico_Capitulo1_idx` (`Capitulo_id`);

--
-- Indexes for table `Capitulo_has_ObjGaleria`
--
ALTER TABLE `Capitulo_has_ObjGaleria`
  ADD PRIMARY KEY (`Capitulo_id`,`ObjGaleria_id`),
  ADD KEY `fk_Capitulo_has_ObjGaleria_ObjGaleria1_idx` (`ObjGaleria_id`),
  ADD KEY `fk_Capitulo_has_ObjGaleria_Capitulo1_idx` (`Capitulo_id`);

--
-- Indexes for table `Capitulo_has_ObjQuestionario`
--
ALTER TABLE `Capitulo_has_ObjQuestionario`
  ADD PRIMARY KEY (`Capitulo_id`,`ObjQuestionario_id`),
  ADD KEY `fk_Capitulo_has_ObjQuestionario_ObjQuestionario1_idx` (`ObjQuestionario_id`),
  ADD KEY `fk_Capitulo_has_ObjQuestionario_Capitulo1_idx` (`Capitulo_id`);

--
-- Indexes for table `Capitulo_has_ObjTexto`
--
ALTER TABLE `Capitulo_has_ObjTexto`
  ADD PRIMARY KEY (`Capitulo_id`,`ObjTexto_id`),
  ADD KEY `fk_Capitulo_has_ObjTexto_ObjTexto1_idx` (`ObjTexto_id`),
  ADD KEY `fk_Capitulo_has_ObjTexto_Capitulo1_idx` (`Capitulo_id`);

--
-- Indexes for table `Capitulo_has_ObjVideo`
--
ALTER TABLE `Capitulo_has_ObjVideo`
  ADD PRIMARY KEY (`Capitulo_id`,`ObjVideo_id`),
  ADD KEY `fk_Capitulo_has_ObjVideo_ObjVideo1_idx` (`ObjVideo_id`),
  ADD KEY `fk_Capitulo_has_ObjVideo_Capitulo1_idx` (`Capitulo_id`);

--
-- Indexes for table `Disciplina`
--
ALTER TABLE `Disciplina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Disciplina_user1_idx` (`user_id`);

--
-- Indexes for table `Imagem`
--
ALTER TABLE `Imagem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `ObjApresentacao`
--
ALTER TABLE `ObjApresentacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ObjDinamico`
--
ALTER TABLE `ObjDinamico`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ObjGaleria`
--
ALTER TABLE `ObjGaleria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ObjGaleria_has_Imagem`
--
ALTER TABLE `ObjGaleria_has_Imagem`
  ADD PRIMARY KEY (`ObjGaleria_id`,`Imagem_id`),
  ADD KEY `fk_ObjGaleria_has_Imagem_Imagem1_idx` (`Imagem_id`),
  ADD KEY `fk_ObjGaleria_has_Imagem_ObjGaleria1_idx` (`ObjGaleria_id`);

--
-- Indexes for table `ObjQuestionario`
--
ALTER TABLE `ObjQuestionario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ObjQuestionario_has_Questao`
--
ALTER TABLE `ObjQuestionario_has_Questao`
  ADD PRIMARY KEY (`ObjQuestionario_id`,`Questao_id`),
  ADD KEY `fk_ObjQuestionario_has_Questao_Questao1_idx` (`Questao_id`),
  ADD KEY `fk_ObjQuestionario_has_Questao_ObjQuestionario1_idx` (`ObjQuestionario_id`);

--
-- Indexes for table `ObjTexto`
--
ALTER TABLE `ObjTexto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ObjVideo`
--
ALTER TABLE `ObjVideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Questao`
--
ALTER TABLE `Questao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Alternativa`
--
ALTER TABLE `Alternativa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `Aula`
--
ALTER TABLE `Aula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Capitulo`
--
ALTER TABLE `Capitulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `Disciplina`
--
ALTER TABLE `Disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Imagem`
--
ALTER TABLE `Imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ObjApresentacao`
--
ALTER TABLE `ObjApresentacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ObjDinamico`
--
ALTER TABLE `ObjDinamico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ObjGaleria`
--
ALTER TABLE `ObjGaleria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ObjQuestionario`
--
ALTER TABLE `ObjQuestionario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `ObjTexto`
--
ALTER TABLE `ObjTexto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `ObjVideo`
--
ALTER TABLE `ObjVideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `Questao`
--
ALTER TABLE `Questao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Alternativa`
--
ALTER TABLE `Alternativa`
  ADD CONSTRAINT `fk_Alternativa_Questao1` FOREIGN KEY (`Questao_id`) REFERENCES `Questao` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Aula`
--
ALTER TABLE `Aula`
  ADD CONSTRAINT `fk_Aula_Disciplina1` FOREIGN KEY (`Disciplina_id`) REFERENCES `Disciplina` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo`
--
ALTER TABLE `Capitulo`
  ADD CONSTRAINT `fk_Capitulo_Aula1` FOREIGN KEY (`Aula_id`) REFERENCES `Aula` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjApresentacao`
--
ALTER TABLE `Capitulo_has_ObjApresentacao`
  ADD CONSTRAINT `fk_Capitulo_has_ObjApresentacao_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjApresentacao_ObjApresentacao1` FOREIGN KEY (`ObjApresentacao_id`) REFERENCES `ObjApresentacao` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjDinamico`
--
ALTER TABLE `Capitulo_has_ObjDinamico`
  ADD CONSTRAINT `fk_Capitulo_has_ObjDinamico_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjDinamico_ObjDinamico1` FOREIGN KEY (`ObjDinamico_id`) REFERENCES `ObjDinamico` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjGaleria`
--
ALTER TABLE `Capitulo_has_ObjGaleria`
  ADD CONSTRAINT `fk_Capitulo_has_ObjGaleria_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjGaleria_ObjGaleria1` FOREIGN KEY (`ObjGaleria_id`) REFERENCES `ObjGaleria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjQuestionario`
--
ALTER TABLE `Capitulo_has_ObjQuestionario`
  ADD CONSTRAINT `fk_Capitulo_has_ObjQuestionario_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjQuestionario_ObjQuestionario1` FOREIGN KEY (`ObjQuestionario_id`) REFERENCES `ObjQuestionario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjTexto`
--
ALTER TABLE `Capitulo_has_ObjTexto`
  ADD CONSTRAINT `fk_Capitulo_has_ObjTexto_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjTexto_ObjTexto1` FOREIGN KEY (`ObjTexto_id`) REFERENCES `ObjTexto` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjVideo`
--
ALTER TABLE `Capitulo_has_ObjVideo`
  ADD CONSTRAINT `fk_Capitulo_has_ObjVideo_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjVideo_ObjVideo1` FOREIGN KEY (`ObjVideo_id`) REFERENCES `ObjVideo` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Disciplina`
--
ALTER TABLE `Disciplina`
  ADD CONSTRAINT `fk_Disciplina_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ObjGaleria_has_Imagem`
--
ALTER TABLE `ObjGaleria_has_Imagem`
  ADD CONSTRAINT `fk_ObjGaleria_has_Imagem_Imagem1` FOREIGN KEY (`Imagem_id`) REFERENCES `Imagem` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ObjGaleria_has_Imagem_ObjGaleria1` FOREIGN KEY (`ObjGaleria_id`) REFERENCES `ObjGaleria` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ObjQuestionario_has_Questao`
--
ALTER TABLE `ObjQuestionario_has_Questao`
  ADD CONSTRAINT `fk_ObjQuestionario_has_Questao_ObjQuestionario1` FOREIGN KEY (`ObjQuestionario_id`) REFERENCES `ObjQuestionario` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ObjQuestionario_has_Questao_Questao1` FOREIGN KEY (`Questao_id`) REFERENCES `Questao` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
