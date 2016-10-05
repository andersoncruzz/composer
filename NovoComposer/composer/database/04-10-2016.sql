-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 04-Out-2016 às 23:24
-- Versão do servidor: 5.6.31-0ubuntu0.14.04.2
-- versão do PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `composer`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Alternativa`
--

CREATE TABLE IF NOT EXISTS `Alternativa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(500) NOT NULL,
  `corretude` int(11) NOT NULL,
  `Questao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Questao_id`),
  KEY `fk_Alternativa_Questao1_idx` (`Questao_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Extraindo dados da tabela `Alternativa`
--

INSERT INTO `Alternativa` (`id`, `description`, `corretude`, `Questao_id`) VALUES
(66, 'Alternativa A', 1, 17),
(67, 'Alternativa B', 2, 17),
(68, 'Alternativa C', 3, 17),
(69, 'Alternativa D', 4, 17),
(70, 'Alternativa E', 5, 17),
(71, 'Alternativa A', 1, 18),
(72, 'Alternativa B', 2, 18),
(73, 'Alternativa C', 3, 18),
(74, 'Alternativa D', 4, 18),
(75, 'Alternativa E', 5, 18),
(76, 'Alternativa A', 2, 19),
(77, 'Alternativa B', 3, 19),
(78, 'Alternativa C', 4, 19),
(79, 'Alternativa D', 5, 19),
(80, 'Alternativa E', 6, 19),
(81, 'Alternativa A', 1, 20),
(82, 'Alternativa B', 2, 20),
(83, 'Alternativa C', 3, 20),
(84, 'Alternativa D', 4, 20),
(85, 'Alternativa E', 5, 20),
(86, 'Alternativa A', 1, 21),
(87, 'Alternativa B', 5, 21),
(88, 'Alternativa C', 3, 21),
(89, 'Alternativa D', 5, 21),
(90, 'Alternativa E', 0, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aula`
--

CREATE TABLE IF NOT EXISTS `Aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `qtChapters` int(11) NOT NULL,
  `Disciplina_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Aula_Disciplina1_idx` (`Disciplina_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `Aula`
--

INSERT INTO `Aula` (`id`, `subject`, `qtChapters`, `Disciplina_id`) VALUES
(10, 'Segunda Guerra Mundial', 0, 8),
(11, 'Holocausto', 0, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo`
--

CREATE TABLE IF NOT EXISTS `Capitulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `qtObjects` int(11) NOT NULL,
  `Aula_id` int(11) NOT NULL,
  `dificuldade` int(11) DEFAULT NULL,
  `ordem` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `fk_Capitulo_Aula1_idx` (`Aula_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `Capitulo`
--

INSERT INTO `Capitulo` (`id`, `titulo`, `qtObjects`, `Aula_id`, `dificuldade`, `ordem`) VALUES
(15, 'Consequências da Primeira Guerra Mundial', 0, 10, 1, '{"0":{"tipo":"Texto\\/Html","descricao":"Testando relacao","ordem":1,"id":3},"1":{"tipo":"objgaleria","descricao":"Teste de Galeria","ordem":3,"id":3},"2":{"tipo":"objgaleria","descricao":"Teste de Galeria ","ordem":5,"id":4},"3":{"tipo":"questionario","descricao":"Teste quiz","ordem":4,"id":40},"4":{"tipo":"questionario","descricao":"Teste","ordem":5,"id":41},"5":{"tipo":"questionario","descricao":"la","ordem":6,"id":42},"6":{"tipo":"questionario","descricao":"Mudando o form","ordem":7,"id":43},"7":{"tipo":"objapresentacao","descricao":"Teste da s\\u00e9rie","ordem":8,"id":7},"8":{"tipo":"objapresentacao","descricao":"OI","ordem":9,"id":8},"9":{"tipo":"Texto\\/Html","descricao":"Teste dos tipos","ordem":10,"id":6},"11":{"tipo":"objvideo","descricao":"alallalalallalalalal","ordem":11,"id":6}}'),
(16, 'Período entre as guerras', 0, 10, 3, NULL),
(17, 'A Segunda Guerra', 0, 10, 4, NULL),
(18, 'Holocausto', 0, 10, 5, NULL),
(19, 'Atividades Complementares', 0, 10, 5, NULL),
(20, 'Novo Capítulo ', 0, 11, 1, NULL),
(21, 'Testando métricas', 0, 10, 3, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjApresentacao`
--

CREATE TABLE IF NOT EXISTS `Capitulo_has_ObjApresentacao` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjApresentacao_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjApresentacao_id`),
  KEY `fk_Capitulo_has_ObjApresentacao_ObjApresentacao1_idx` (`ObjApresentacao_id`),
  KEY `fk_Capitulo_has_ObjApresentacao_Capitulo1_idx` (`Capitulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjApresentacao`
--

INSERT INTO `Capitulo_has_ObjApresentacao` (`Capitulo_id`, `ObjApresentacao_id`) VALUES
(15, 4),
(20, 5),
(15, 6),
(15, 7),
(15, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjDinamico`
--

CREATE TABLE IF NOT EXISTS `Capitulo_has_ObjDinamico` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjDinamico_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjDinamico_id`),
  KEY `fk_Capitulo_has_ObjDinamico_ObjDinamico1_idx` (`ObjDinamico_id`),
  KEY `fk_Capitulo_has_ObjDinamico_Capitulo1_idx` (`Capitulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjGaleria`
--

CREATE TABLE IF NOT EXISTS `Capitulo_has_ObjGaleria` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjGaleria_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjGaleria_id`),
  KEY `fk_Capitulo_has_ObjGaleria_ObjGaleria1_idx` (`ObjGaleria_id`),
  KEY `fk_Capitulo_has_ObjGaleria_Capitulo1_idx` (`Capitulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjGaleria`
--

INSERT INTO `Capitulo_has_ObjGaleria` (`Capitulo_id`, `ObjGaleria_id`) VALUES
(15, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjQuestionario`
--

CREATE TABLE IF NOT EXISTS `Capitulo_has_ObjQuestionario` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjQuestionario_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjQuestionario_id`),
  KEY `fk_Capitulo_has_ObjQuestionario_ObjQuestionario1_idx` (`ObjQuestionario_id`),
  KEY `fk_Capitulo_has_ObjQuestionario_Capitulo1_idx` (`Capitulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjQuestionario`
--

INSERT INTO `Capitulo_has_ObjQuestionario` (`Capitulo_id`, `ObjQuestionario_id`) VALUES
(15, 41),
(15, 42),
(15, 43);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjTexto`
--

CREATE TABLE IF NOT EXISTS `Capitulo_has_ObjTexto` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjTexto_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjTexto_id`),
  KEY `fk_Capitulo_has_ObjTexto_ObjTexto1_idx` (`ObjTexto_id`),
  KEY `fk_Capitulo_has_ObjTexto_Capitulo1_idx` (`Capitulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjTexto`
--

INSERT INTO `Capitulo_has_ObjTexto` (`Capitulo_id`, `ObjTexto_id`) VALUES
(15, 3),
(15, 4),
(15, 5),
(15, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Capitulo_has_ObjVideo`
--

CREATE TABLE IF NOT EXISTS `Capitulo_has_ObjVideo` (
  `Capitulo_id` int(11) NOT NULL,
  `ObjVideo_id` int(11) NOT NULL,
  PRIMARY KEY (`Capitulo_id`,`ObjVideo_id`),
  KEY `fk_Capitulo_has_ObjVideo_ObjVideo1_idx` (`ObjVideo_id`),
  KEY `fk_Capitulo_has_ObjVideo_Capitulo1_idx` (`Capitulo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `Capitulo_has_ObjVideo`
--

INSERT INTO `Capitulo_has_ObjVideo` (`Capitulo_id`, `ObjVideo_id`) VALUES
(15, 4),
(15, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Disciplina`
--

CREATE TABLE IF NOT EXISTS `Disciplina` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Disciplina_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `Disciplina`
--

INSERT INTO `Disciplina` (`id`, `nome`, `user_id`) VALUES
(8, 'História', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Imagem`
--

CREATE TABLE IF NOT EXISTS `Imagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caminho` varchar(255) NOT NULL,
  `legenda` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `Imagem`
--

INSERT INTO `Imagem` (`id`, `caminho`, `legenda`) VALUES
(12, 'arquivos/imagem_12.jpg', 'Soldados marchando'),
(13, 'arquivos/imagem_13.jpeg', 'Pintura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1473709560),
('m130524_201442_init', 1473709562);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjApresentacao`
--

CREATE TABLE IF NOT EXISTS `ObjApresentacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `qteSlides` int(11) NOT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `referencias` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `ObjApresentacao`
--

INSERT INTO `ObjApresentacao` (`id`, `assunto`, `caminho`, `qteSlides`, `topicos`, `exerciciosResolvidos`, `tipo`, `duracao`, `serie`, `avaliacao`, `referencias`) VALUES
(4, 'Os efeitos', 'arquivos/slides_tmp.pdf', 0, 'Razao, Proporção', 1, 'Conceito,Exemplo,Exercicio Resolvido', 10, '4', 0, 'lalalalla'),
(5, 'TCC', 'arquivos/slides_tmp.pdf', 0, '#promobile', 1, 'Conceito', 1, '2', 0, 'dsfsdf'),
(6, 'Teste da série', 'arquivos/slides_tmp.pdf', 0, 'lalal', 0, 'Exemplo', 3, '2', 0, 'lalalal'),
(7, 'Teste da série', 'arquivos/slides_tmp.pdf', 0, 'lalal', 0, 'Exemplo', 3, '2', 0, 'lalalal'),
(8, 'OI', 'arquivos/slides_tmp.pdf', 0, 'lalalal', 1, 'Exemplo', 3, '2ª ano - Ensino Médio', 0, 'llalalallala');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjDinamico`
--

CREATE TABLE IF NOT EXISTS `ObjDinamico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `descricao` text,
  `topicos` text,
  `exerciciosResolvidos` tinyint(1) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text,
  `tipo` text,
  `serie` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjGaleria`
--

CREATE TABLE IF NOT EXISTS `ObjGaleria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `qteImagens` int(11) DEFAULT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `ObjGaleria`
--

INSERT INTO `ObjGaleria` (`id`, `assunto`, `qteImagens`, `topicos`, `exerciciosResolvidos`, `tipo`, `duracao`, `serie`, `avaliacao`, `referencias`) VALUES
(3, 'Teste de Galeria', NULL, '#primeiraguerra, #consequencias', 0, 'Conceito', 3, '4', NULL, 'referencias'),
(4, 'Teste de Galeria ', NULL, 'topicos', 1, 'Exemplo,Exercicio Resolvido', 4, 'Se', NULL, 'referencias');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjGaleria_has_Imagem`
--

CREATE TABLE IF NOT EXISTS `ObjGaleria_has_Imagem` (
  `ObjGaleria_id` int(11) NOT NULL,
  `Imagem_id` int(11) NOT NULL,
  PRIMARY KEY (`ObjGaleria_id`,`Imagem_id`),
  KEY `fk_ObjGaleria_has_Imagem_Imagem1_idx` (`Imagem_id`),
  KEY `fk_ObjGaleria_has_Imagem_ObjGaleria1_idx` (`ObjGaleria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjGaleria_has_Imagem`
--

INSERT INTO `ObjGaleria_has_Imagem` (`ObjGaleria_id`, `Imagem_id`) VALUES
(3, 12),
(4, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjQuestionario`
--

CREATE TABLE IF NOT EXISTS `ObjQuestionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Extraindo dados da tabela `ObjQuestionario`
--

INSERT INTO `ObjQuestionario` (`id`, `assunto`) VALUES
(38, 'Primeira Guerra'),
(39, 'Holocausto'),
(40, 'Teste quiz'),
(41, 'Teste'),
(42, 'la'),
(43, 'Mudando o form');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjQuestionario_has_Questao`
--

CREATE TABLE IF NOT EXISTS `ObjQuestionario_has_Questao` (
  `ObjQuestionario_id` int(11) NOT NULL,
  `Questao_id` int(11) NOT NULL,
  PRIMARY KEY (`ObjQuestionario_id`,`Questao_id`),
  KEY `fk_ObjQuestionario_has_Questao_Questao1_idx` (`Questao_id`),
  KEY `fk_ObjQuestionario_has_Questao_ObjQuestionario1_idx` (`ObjQuestionario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ObjQuestionario_has_Questao`
--

INSERT INTO `ObjQuestionario_has_Questao` (`ObjQuestionario_id`, `Questao_id`) VALUES
(43, 17),
(43, 18),
(43, 19),
(43, 20),
(43, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjTexto`
--

CREATE TABLE IF NOT EXISTS `ObjTexto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `conteudo` text NOT NULL,
  `topicos` text,
  `exerciciosResolvidos` tinyint(1) DEFAULT NULL,
  `tipo` text,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `ObjTexto`
--

INSERT INTO `ObjTexto` (`id`, `assunto`, `conteudo`, `topicos`, `exerciciosResolvidos`, `tipo`, `duracao`, `serie`, `avaliacao`, `referencias`) VALUES
(3, 'Testando relacao', '<p>fgdfgdfgsdfg</p>\r\n', 'dfgds', 1, 'Conceito', 2, '2', NULL, 'fgd'),
(4, 'Teste dos tipos', '<p>lalalla</p>\r\n', 'llalal', 1, 'Aplicacao,Representacao Grafica', 5, '9ª ano - Ensino Fundamental', NULL, 'lallalalal'),
(5, 'Teste dos tipos', '<p>lalalla</p>\r\n', 'llalal', 1, 'Aplicacao,Representacao Grafica', 5, '9ª ano - Ensino Fundamental', NULL, 'lallalalal'),
(6, 'Teste dos tipos', '<p>lalalla</p>\r\n', 'llalal', 1, 'Aplicacao,Representacao Grafica', 5, '9ª ano - Ensino Fundamental', NULL, 'lallalalal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjVideo`
--

CREATE TABLE IF NOT EXISTS `ObjVideo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `referencias` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `ObjVideo`
--

INSERT INTO `ObjVideo` (`id`, `assunto`, `caminho`, `topicos`, `exerciciosResolvidos`, `tipo`, `duracao`, `serie`, `avaliacao`, `referencias`) VALUES
(4, 'Video', 'arquivos/video_tmp.mp4', 'Video', 0, 'Conceito', 3, '3', 0, 'lalalal'),
(5, 'Video Teste', 'arquivos/video_tmp.mp4', 'video, teste', 0, 'Formula', 3, '5', 0, 'lalalal'),
(6, 'alallalalallalalalal', 'arquivos/video_tmp.mp4', 'llalalal', 0, 'Formula', 3, '1ª ano - Ensino Fundamental', 0, 'lalalal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Questao`
--

CREATE TABLE IF NOT EXISTS `Questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` int(11) NOT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `enunciado` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `dica` text NOT NULL,
  `conteudo` int(11) NOT NULL,
  `correta` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `Questao`
--

INSERT INTO `Questao` (`id`, `nivel`, `assunto`, `enunciado`, `duracao`, `dica`, `conteudo`, `correta`) VALUES
(17, 3, 'Testando dificuldade', 'Enunciado de Testando dificuldade ', 2, 'essa é a dica de Testando dificuldade', 0, 'b'),
(18, 1, 'Esse é um assunto ', '<p>Testando <strong>altera&ccedil;&atilde;o</strong> para HTML/Editor</p>\r\n', 1, 'lalal', 0, 'd'),
(19, 1, 'Testando a dica', '<p>Testando a dica com <span style="color:#FF0000"><span style="background-color:#8B4513">HTML</span></span></p>\r\n', 4, '<p><em>teste</em></p>\r\n\r\n<p><em>teste</em></p>\r\n\r\n<p>Testando a dica&nbsp;</p>\r\n', 0, 'a'),
(20, 1, 'Teste da duração', '<p><strong>Teste da dura&ccedil;&atilde;o</strong></p>\r\n', 2, '<p><em>Teste da dura&ccedil;&atilde;o</em></p>\r\n', 0, 'b'),
(21, 1, 'Testando conteúdo relacionado', '<p>Testando relacionar o conte&uacute;do com a quest&atilde;o atrav&eacute;s de <strong>text input</strong></p>\r\n', 3, '<p>oi, olha que dica legal</p>\r\n', 15, 'a');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'professor', 'UjZAPOLRotScuYpJFEcyp3O1aucj9X6V', '$2y$13$.MQd2.zLLfPhUX3sDT3KHOp3.VZTssjhpkvRGlhlt5Eb6WyaQXHTO', NULL, 'professor@gmail.com', 10, 1474393067, 1474393067),
(3, 'eribeiro', 'gHZ7fTrYMKtOlWfN1_dLjZLGO5k7tf1Z', '$2y$13$QlRlUUc1.b8UmjtA9WJPQ./MADxBRie8IJep0jNQCUBpEdPRTPnWe', NULL, 'erick.ribeiro.17@hotmail.com', 10, 1474459019, 1474459019),
(4, 'erickribeiro', 'g0TnYAFX3IhUSeTl2U5bOlcjTVE0DkNr', '$2y$13$s5JOEzjOl/c9gTKkMUH6O.4xv5zjmyc8A07EE6CSZJvJFJV3JMMQi', NULL, 'erick.ribeiro.18@hotmail.com', 10, 1474889801, 1474889801);

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
  ADD CONSTRAINT `fk_Aula_Disciplina1` FOREIGN KEY (`Disciplina_id`) REFERENCES `Disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo`
--
ALTER TABLE `Capitulo`
  ADD CONSTRAINT `fk_Capitulo_Aula1` FOREIGN KEY (`Aula_id`) REFERENCES `Aula` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjApresentacao`
--
ALTER TABLE `Capitulo_has_ObjApresentacao`
  ADD CONSTRAINT `fk_Capitulo_has_ObjApresentacao_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjApresentacao_ObjApresentacao1` FOREIGN KEY (`ObjApresentacao_id`) REFERENCES `ObjApresentacao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjDinamico`
--
ALTER TABLE `Capitulo_has_ObjDinamico`
  ADD CONSTRAINT `fk_Capitulo_has_ObjDinamico_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjDinamico_ObjDinamico1` FOREIGN KEY (`ObjDinamico_id`) REFERENCES `ObjDinamico` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjGaleria`
--
ALTER TABLE `Capitulo_has_ObjGaleria`
  ADD CONSTRAINT `fk_Capitulo_has_ObjGaleria_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjGaleria_ObjGaleria1` FOREIGN KEY (`ObjGaleria_id`) REFERENCES `ObjGaleria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjQuestionario`
--
ALTER TABLE `Capitulo_has_ObjQuestionario`
  ADD CONSTRAINT `fk_Capitulo_has_ObjQuestionario_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjQuestionario_ObjQuestionario1` FOREIGN KEY (`ObjQuestionario_id`) REFERENCES `ObjQuestionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjTexto`
--
ALTER TABLE `Capitulo_has_ObjTexto`
  ADD CONSTRAINT `fk_Capitulo_has_ObjTexto_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjTexto_ObjTexto1` FOREIGN KEY (`ObjTexto_id`) REFERENCES `ObjTexto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo_has_ObjVideo`
--
ALTER TABLE `Capitulo_has_ObjVideo`
  ADD CONSTRAINT `fk_Capitulo_has_ObjVideo_Capitulo1` FOREIGN KEY (`Capitulo_id`) REFERENCES `Capitulo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Capitulo_has_ObjVideo_ObjVideo1` FOREIGN KEY (`ObjVideo_id`) REFERENCES `ObjVideo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Disciplina`
--
ALTER TABLE `Disciplina`
  ADD CONSTRAINT `fk_Disciplina_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ObjGaleria_has_Imagem`
--
ALTER TABLE `ObjGaleria_has_Imagem`
  ADD CONSTRAINT `fk_ObjGaleria_has_Imagem_Imagem1` FOREIGN KEY (`Imagem_id`) REFERENCES `Imagem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ObjGaleria_has_Imagem_ObjGaleria1` FOREIGN KEY (`ObjGaleria_id`) REFERENCES `ObjGaleria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ObjQuestionario_has_Questao`
--
ALTER TABLE `ObjQuestionario_has_Questao`
  ADD CONSTRAINT `fk_ObjQuestionario_has_Questao_ObjQuestionario1` FOREIGN KEY (`ObjQuestionario_id`) REFERENCES `ObjQuestionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ObjQuestionario_has_Questao_Questao1` FOREIGN KEY (`Questao_id`) REFERENCES `Questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
