-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 14-Set-2016 às 09:18
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
  `description` int(11) NOT NULL,
  `corretude` int(11) NOT NULL,
  `Questao_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`Questao_id`),
  KEY `fk_Alternativa_Questao1_idx` (`Questao_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Aula`
--

CREATE TABLE IF NOT EXISTS `Aula` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `qtChapters` int(11) NOT NULL,
  `Disciplina_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Aula_Disciplina1_idx` (`Disciplina_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `fk_Capitulo_Aula1_idx` (`Aula_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `Disciplina`
--

INSERT INTO `Disciplina` (`id`, `nome`, `user_id`) VALUES
(1, 'Geografia', 1),
(2, 'teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Imagem`
--

CREATE TABLE IF NOT EXISTS `Imagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caminho` varchar(255) NOT NULL,
  `Galeria_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Imagem_Galeria1_idx` (`Galeria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `qteImagens` int(11) NOT NULL,
  `topicos` text NOT NULL,
  `exerciciosResolvidos` tinyint(1) NOT NULL,
  `tipo` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) NOT NULL,
  `referencias` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjQuestionario`
--

CREATE TABLE IF NOT EXISTS `ObjQuestionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `ObjQuestionario`
--

INSERT INTO `ObjQuestionario` (`id`, `assunto`) VALUES
(1, 'guerra '),
(2, 'guerra2');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `ObjTexto`
--

CREATE TABLE IF NOT EXISTS `ObjTexto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(255) NOT NULL,
  `Capitulo_id` int(11) NOT NULL,
  `conteudo` text NOT NULL,
  `topicos` text,
  `exerciciosResolvidos` tinyint(1) DEFAULT NULL,
  `tipo` text,
  `duracao` int(11) NOT NULL,
  `serie` varchar(45) NOT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `referencias` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Questao`
--

CREATE TABLE IF NOT EXISTS `Questao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nivel` varchar(16) NOT NULL,
  `assunto` varchar(255) DEFAULT NULL,
  `enunciado` text NOT NULL,
  `duracao` int(11) NOT NULL,
  `dica` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'professor', 'dJYHUWqoo9pmRiiENmx31iCrMAiRlD9r', '$2y$13$GG4jOk7nVZ6K/Qk9OwtJyuWJFueh3v6MYztIVpCu1sDxgYAAXba3.', NULL, 'professor@gmail.com', 10, 1473709954, 1473709954);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `Alternativa`
--
ALTER TABLE `Alternativa`
  ADD CONSTRAINT `fk_Alternativa_Questao1` FOREIGN KEY (`Questao_id`) REFERENCES `Questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Aula`
--
ALTER TABLE `Aula`
  ADD CONSTRAINT `fk_Aula_Disciplina1` FOREIGN KEY (`Disciplina_id`) REFERENCES `Disciplina` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Capitulo`
--
ALTER TABLE `Capitulo`
  ADD CONSTRAINT `fk_Capitulo_Aula1` FOREIGN KEY (`Aula_id`) REFERENCES `Aula` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Limitadores para a tabela `Imagem`
--
ALTER TABLE `Imagem`
  ADD CONSTRAINT `fk_Imagem_Galeria1` FOREIGN KEY (`Galeria_id`) REFERENCES `ObjGaleria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ObjQuestionario_has_Questao`
--
ALTER TABLE `ObjQuestionario_has_Questao`
  ADD CONSTRAINT `fk_ObjQuestionario_has_Questao_ObjQuestionario1` FOREIGN KEY (`ObjQuestionario_id`) REFERENCES `ObjQuestionario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ObjQuestionario_has_Questao_Questao1` FOREIGN KEY (`Questao_id`) REFERENCES `Questao` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
