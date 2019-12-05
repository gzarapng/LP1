--
-- Base de Dados: `db_copperv`
--
CREATE DATABASE IF NOT EXISTS `db_copperv` 
DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `db_copperv`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE IF NOT EXISTS `tb_produtos` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(40) NOT NULL,
  `TIPO` varchar(30) NOT NULL,
  `FOTO` varchar(50) NOT NULL,
  `VALOR` float NOT NULL,
  PRIMARY KEY (`ID`)
) DEFAULT CHARSET=utf8;


-- ------------------------
CREATE TABLE IF NOT EXISTS `tb_users` (
  `COD` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(40) NOT NULL,
  `SENHA` varchar(40) NOT NULL,
  `LOGIN` varchar(40) NOT NULL,
  `EMAIL` varchar(25) NOT NULL,
  `NASCIMENTO` date NOT NULL,
  `SEXO` char NOT NULL,
  `RG` int NOT NULL,
  `CPF` int NOT NULL,
  `ADMIN` int NOT NULL,
  PRIMARY KEY (`COD`)
) DEFAULT CHARSET=utf8;

--
-- Usuário BD
-- 

CREATE USER IF NOT EXISTS 'aluno'@'localhost' IDENTIFIED BY 'aluno';

GRANT ALL PRIVILEGES ON `db_copperv` . * TO 'aluno'@'localhost';