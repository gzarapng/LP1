--
-- Base de Dados: `db_rh`
--
CREATE DATABASE IF NOT EXISTS `db_rh` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_rh`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_func`
--

CREATE TABLE IF NOT EXISTS `tb_func` (
  `MATRICULA` int NOT NULL AUTO_INCREMENT,
  `NOME` varchar(40) NOT NULL,
  `SETOR` varchar(25) NOT NULL,
  `NASCIMENTO` date NOT NULL,
  `SEXO` char NOT NULL,
  `ESTAGIO` boolean NOT NULL,
  `SALARIO` float NOT NULL,
  PRIMARY KEY (`MATRICULA`)
) DEFAULT CHARSET=utf8;

-- ------------------------


--
-- Usuário BD
-- 

CREATE USER IF NOT EXISTS 'aluno'@'localhost' IDENTIFIED BY 'aluno';


GRANT ALL PRIVILEGES ON `db_rh` . * TO 'aluno'@'localhost';