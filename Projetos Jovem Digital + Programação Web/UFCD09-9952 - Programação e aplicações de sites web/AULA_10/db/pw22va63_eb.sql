-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 23-Fev-2023 às 17:52
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pw22va63_eb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `distritos`
--

CREATE TABLE `distritos` (
  `id` int(11) NOT NULL,
  `distritos` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `distritos`
--

INSERT INTO `distritos` (`id`, `distritos`) VALUES
(1, 'Aveiro'),
(2, 'Beja'),
(3, 'Braga'),
(4, 'Bragança'),
(5, 'Castelo Branco'),
(6, 'Coimbra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registo`
--

CREATE TABLE `registo` (
  `id` int(11) NOT NULL,
  `utilizador` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `distritos` varchar(50) NOT NULL,
  `tempo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `registo`
--

INSERT INTO `registo` (`id`, `utilizador`, `email`, `password`, `genero`, `distritos`, `tempo`) VALUES
(8, 'Elio', 'xremix20@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'masculino', 'Aveiro', 1676652712),
(9, 'Mariana', 'mariana@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'feminino', 'Bragança', 1676652744),
(10, 'Elio', 'xremix20@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'masculino', 'Aveiro', 1677169290),
(11, 'Elio', 'xremix20@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'masculino', 'Aveiro', 1677169303),
(12, 'Elio', 'xremix20@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'masculino', 'Aveiro', 1677169704),
(13, 'Elio', 'xremix20@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'masculino', 'Aveiro', 1677169807),
(14, 'Elio', 'xremix20@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'masculino', 'Aveiro', 1677169916),
(15, 'Elio', 'xremix20@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'masculino', 'Aveiro', 1677170181),
(16, 'Elio', 'xremix201@gmail.com', '550e1bafe077ff0b0b67f4e32f29d751', 'masculino', 'Aveiro', 1677170958);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `distritos`
--
ALTER TABLE `distritos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `registo`
--
ALTER TABLE `registo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `distritos`
--
ALTER TABLE `distritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `registo`
--
ALTER TABLE `registo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
