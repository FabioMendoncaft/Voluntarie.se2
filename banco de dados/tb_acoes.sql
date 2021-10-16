-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2021 às 14:07
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `baseteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_acoes`
--

CREATE TABLE `tb_acoes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `descricao` varchar(400) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `data_criacao` datetime DEFAULT current_timestamp(),
  `data_evento` datetime DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `imagem` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_acoes`
--

INSERT INTO `tb_acoes` (`id`, `id_usuario`, `titulo`, `descricao`, `logradouro`, `cidade`, `bairro`, `uf`, `complemento`, `data_criacao`, `data_evento`, `categoria`, `imagem`) VALUES
(7, 2, 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'Rua Severino Bernardino Pereira', 'Recife', 'Mangabeira', 'PE', '', '2021-10-09 10:24:26', '2021-10-23 10:24:00', '4', '383890c6c0d26df3ba68f0b1b621fa6e.'),
(13, 1, 'Baleia azul', 'Ajude-nos a jogar esse jogo e chegar ao level final!!!', 'Rua Severino Bernardino Pereira', 'Recife', 'Mangabeira', 'PE', '', '2021-10-15 20:54:16', '2021-10-24 20:53:00', '2', 'IMG-616a14a8395233.86624054.jpg'),
(14, 1, 'Vamos simbora', 'sdasdasdasad', 'Rua Severino Bernardino Pereira', 'Recife', 'Mangabeira', 'PE', '', '2021-10-15 21:14:05', '2021-10-30 21:11:00', '2', 'IMG-616a194d3837f1.11624385.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_acoes`
--
ALTER TABLE `tb_acoes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_acoes`
--
ALTER TABLE `tb_acoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
