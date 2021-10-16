-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16-Out-2021 às 14:08
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
-- Estrutura da tabela `tb_imagem_perfil`
--

CREATE TABLE `tb_imagem_perfil` (
  `id` int(11) NOT NULL,
  `id_usuario` int(32) DEFAULT NULL,
  `imagem_url` varchar(200) DEFAULT NULL,
  `data_criacao` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_imagem_perfil`
--

INSERT INTO `tb_imagem_perfil` (`id`, `id_usuario`, `imagem_url`, `data_criacao`) VALUES
(8, 1, 'IMG-6165c1ef397756.75127618.jpg', '2021-10-12 14:12:15'),
(9, 1, 'IMG-6165c21e4781b8.22397752.jpg', '2021-10-12 14:13:02'),
(10, 1, 'IMG-6165c5138664b9.92072318.jpg', '2021-10-12 14:25:39'),
(11, 2, 'IMG-6165c52f0d8901.26456739.jpg', '2021-10-12 14:26:07'),
(12, 1, 'IMG-6165c53b3296d6.67340521.jpg', '2021-10-12 14:26:19'),
(13, 1, 'IMG-6165ca38c68ed3.67638474.jpg', '2021-10-12 14:47:36'),
(14, 1, 'IMG-6165cf731e04a4.29408208.jpg', '2021-10-12 15:09:55');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_imagem_perfil`
--
ALTER TABLE `tb_imagem_perfil`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_imagem_perfil`
--
ALTER TABLE `tb_imagem_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
