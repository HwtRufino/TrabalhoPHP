-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2022 às 02:40
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `consulta`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id`, `data`) VALUES
(4, '2026-01-01'),
(21, '0000-00-00'),
(58, '0000-00-00'),
(96, '2022-05-05'),
(999, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) DEFAULT NULL,
  `rg` varchar(256) DEFAULT NULL,
  `servico` varchar(256) DEFAULT NULL,
  `data` varchar(256) DEFAULT NULL,
  `datanasc` date DEFAULT NULL,
  `telefone` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `consultas`
--

INSERT INTO `consultas` (`id`, `nome`, `rg`, `servico`, `data`, `datanasc`, `telefone`) VALUES
(8, 'FDSADFASDASDASD', '1234123123', 'Zé da cuca', '2022-12-14T01:06', '2022-12-20', '18996775017');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `id` int(11) NOT NULL,
  `nome` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `comentario` text NOT NULL,
  `telefone` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `rg` int(20) NOT NULL,
  `datanasc` date NOT NULL,
  `endereco` varchar(256) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `nome_mae` varchar(100) NOT NULL,
  `nome_pai` varchar(100) NOT NULL,
  `profissao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `rg`, `datanasc`, `endereco`, `telefone`, `nome_mae`, `nome_pai`, `profissao`) VALUES
(1, 'Alcides', 893987552, '2013-12-12', 'Rua Fatec, nº 157', '18993145', 'Maria', 'Mario', 'Programador'),
(2, 'Hewerthon', 697841587, '2022-12-21', 'Rua Fatec, nº157', '18995784521', 'Fernanda', 'Marcos', 'Desenvolvedor'),
(3, 'Jose Carlos', 542110005, '2022-12-20', 'Rua Fatec II, 157 - Presidente Prudente-SP', '18995444871', 'Celia', 'Ronaldo', 'Diretor De Projetos'),
(4, 'Lucas M', 569980012, '2022-12-21', 'Rua Fatec, n°650 - PP-SP', '2578558971', 'Debora', 'Carlos', 'Especialista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `descricao` varchar(256) NOT NULL,
  `preco` decimal(10,0) NOT NULL,
  `nome` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `servico`
--

INSERT INTO `servico` (`id`, `descricao`, `preco`, `nome`) VALUES
(8, 'O profissional de Psicologia cuida da mente das pessoas. Assim como os médicos são fundamentais para a boa saúde do corpo, o psicólogo dedica seu trabalho à saúde mental. Ele estuda, analisa e trata as questões internas, que refletem no comportamento do in', '0', 'Médico'),
(9, 'O profissional de Psicologia cuida da mente das pessoas. Assim como os médicos são fundamentais para a boa saúde do corpo, o psicólogo dedica seu trabalho à saúde mental. Ele estuda, analisa e trata as questões internas, que refletem no comportamento do in', '0', 'Dentista'),
(10, 'O profissional de Psicologia cuida da mente das pessoas. Assim como os médicos são fundamentais para a boa saúde do corpo, o psicólogo dedica seu trabalho à saúde mental. Ele estuda, analisa e trata as questões internas, que refletem no comportamento do in', '0', 'Psicólogo'),
(11, 'O profissional de Psicologia cuida da mente das pessoas. Assim como os médicos são fundamentais para a boa saúde do corpo, o psicólogo dedica seu trabalho à saúde mental. Ele estuda, analisa e trata as questões internas, que refletem no comportamento do in', '0', 'Terapeuta'),
(12, 'adssaasdasd', '0', 'Zé da cuca');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'wdnick', '$2y$10$t.60ac0TdITvUAkWwRdkUOjjSs8o21tHzWdgNRfZV41kn4Szt0xsS'),
(2, 'abc', '$2y$10$XsIxQPwlZ/XZqTFQaUamve0V7gwJqe2rejBEF48hmz1B56oMe/PAO'),
(3, 'abcd', '$2y$10$ijgfZJnNKSOWBcdnWUwYKevF5nqublBZDZNWdyb0uWch/4BKMni2K');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de tabela `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
