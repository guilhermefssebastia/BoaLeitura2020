-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2020 às 07:04
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbboaleitura`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcadastrocli`
--

CREATE TABLE `tbcadastrocli` (
  `codCli` int(11) NOT NULL,
  `nomeCli` varchar(45) NOT NULL,
  `CPFcli` varchar(14) NOT NULL,
  `emailCli` varchar(50) NOT NULL,
  `EndCli` varchar(50) NOT NULL,
  `TelCli` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcadastrocli`
--

INSERT INTO `tbcadastrocli` (`codCli`, `nomeCli`, `CPFcli`, `emailCli`, `EndCli`, `TelCli`) VALUES
(1, 'José', '12345678998745', 'jose@gmail.com', 'Rua A', '11959550348');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcadastrolivros`
--

CREATE TABLE `tbcadastrolivros` (
  `codLivro` int(11) NOT NULL,
  `nomeLivro` varchar(25) NOT NULL,
  `IBSNlivro` int(13) NOT NULL,
  `autor` varchar(25) NOT NULL,
  `situacao` char(5) NOT NULL,
  `descricao` text NOT NULL,
  `codCli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbcadastrolivros`
--

INSERT INTO `tbcadastrolivros` (`codLivro`, `nomeLivro`, `IBSNlivro`, `autor`, `situacao`, `descricao`, `codCli`) VALUES
(1, 'A Bahia', 2147483647, 'José', 'Novo', 'Arroz com feijão', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbconta`
--

CREATE TABLE `tbconta` (
  `CodConta` int(11) NOT NULL,
  `NomeConta` varchar(50) NOT NULL,
  `SenhaConta` varchar(25) NOT NULL,
  `codCli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `codUsu` int(11) NOT NULL,
  `codCli` int(11) NOT NULL,
  `nomeUsu` varchar(20) NOT NULL,
  `senhaUsu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tbusuario`
--

INSERT INTO `tbusuario` (`codUsu`, `codCli`, `nomeUsu`, `senhaUsu`) VALUES
(1, 1, 'josé', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcadastrocli`
--
ALTER TABLE `tbcadastrocli`
  ADD PRIMARY KEY (`codCli`),
  ADD UNIQUE KEY `CPFcli` (`CPFcli`);

--
-- Índices para tabela `tbcadastrolivros`
--
ALTER TABLE `tbcadastrolivros`
  ADD PRIMARY KEY (`codLivro`),
  ADD KEY `codCli` (`codCli`);

--
-- Índices para tabela `tbconta`
--
ALTER TABLE `tbconta`
  ADD PRIMARY KEY (`CodConta`),
  ADD KEY `fk_codCli_codCli` (`codCli`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`codUsu`),
  ADD KEY `codCli` (`codCli`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcadastrocli`
--
ALTER TABLE `tbcadastrocli`
  MODIFY `codCli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbcadastrolivros`
--
ALTER TABLE `tbcadastrolivros`
  MODIFY `codLivro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tbconta`
--
ALTER TABLE `tbconta`
  MODIFY `CodConta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `codUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbcadastrolivros`
--
ALTER TABLE `tbcadastrolivros`
  ADD CONSTRAINT `tbcadastrolivros_ibfk_1` FOREIGN KEY (`codCli`) REFERENCES `tbcadastrocli` (`codCli`);

--
-- Limitadores para a tabela `tbconta`
--
ALTER TABLE `tbconta`
  ADD CONSTRAINT `fk_codCli_codCli` FOREIGN KEY (`CodCli`) REFERENCES `tbcadastrocli` (`codCli`);

--
-- Limitadores para a tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD CONSTRAINT `tbusuario_ibfk_1` FOREIGN KEY (`codCli`) REFERENCES `tbcadastrocli` (`codCli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
