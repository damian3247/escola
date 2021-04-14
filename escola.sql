-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2020 a las 04:51:34
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escola`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome_aluno` varchar(400) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `genero` varchar(150) NOT NULL,
  `id_turma_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome_aluno`, `telefone`, `email`, `data_nascimento`, `genero`, `id_turma_fk`) VALUES
(2, 'dfdf', '99665544', 'eeeerrr@dkdk', '0000-00-00', 'masculino', 0),
(3, 'Damian', '9876541544', 'df454d@djjd', '2020-10-24', 'masculino', 0),
(5, 'Damián Agustín Nieva', '65999275529', 'damian3247@hotmail.com', '2020-10-20', 'femenino', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alunos_turmas`
--

CREATE TABLE `alunos_turmas` (
  `id_aluno_fk` int(11) NOT NULL,
  `id_turma_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escolas`
--

CREATE TABLE `escolas` (
  `id_escola` int(11) NOT NULL,
  `nome_escola` varchar(200) NOT NULL,
  `endereco` varchar(400) NOT NULL,
  `situacao` varchar(50) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escolas`
--

INSERT INTO `escolas` (`id_escola`, `nome_escola`, `endereco`, `situacao`, `data`) VALUES
(3, 'master', 'rua 5 goiabeiras', 'ativa', '2020-09-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `ano` int(4) NOT NULL,
  `nivel_ensino` varchar(150) NOT NULL COMMENT 'fundamental ou medio',
  `serie` varchar(150) NOT NULL,
  `turno` varchar(150) NOT NULL,
  `id_escola_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turmas`
--

INSERT INTO `turmas` (`id_turma`, `ano`, `nivel_ensino`, `serie`, `turno`, `id_escola_fk`) VALUES
(5, 1995, 'medio', '2000', 'tarde', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Indices de la tabla `alunos_turmas`
--
ALTER TABLE `alunos_turmas`
  ADD PRIMARY KEY (`id_aluno_fk`,`id_turma_fk`);

--
-- Indices de la tabla `escolas`
--
ALTER TABLE `escolas`
  ADD PRIMARY KEY (`id_escola`);

--
-- Indices de la tabla `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `escolas`
--
ALTER TABLE `escolas`
  MODIFY `id_escola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
