-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 13-Jun-2022 às 22:56
-- Versão do servidor: 5.7.34
-- versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ProjetoTI`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `dispositivos`
--

CREATE TABLE `dispositivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `divisao` varchar(15) NOT NULL,
  `tipoDispositivo` varchar(50) NOT NULL,
  `consumo` float NOT NULL,
  `estado` varchar(7) NOT NULL,
  `valor` int(100) DEFAULT NULL,
  `valorMaximo` int(11) NOT NULL,
  `valorMinimo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `dispositivos`
--

INSERT INTO `dispositivos` (`id`, `nome`, `divisao`, `tipoDispositivo`, `consumo`, `estado`, `valor`, `valorMaximo`, `valorMinimo`) VALUES
(1, 'Estores', 'Quarto', 'Estores', 10, 'Off', 0, 1, 0),
(2, 'Candeeiro de Mesa', 'Quarto', 'Lampada', 10, 'Off', 0, 1, 0),
(3, 'Candeeiro de Teto', 'Sala_de_Estar', 'Lampada', 10, 'On', 1, 1, 0),
(4, 'Porta', 'Jardim', 'Porta', 0.1, 'Off', 0, 1, 0),
(6, 'Televisão', 'Sala_de_Estar', 'TV', 0.05, 'Off', 0, 1, 0),
(7, 'Coluna', 'Sala_de_Estar', 'Coluna', 1.76, 'Off', 0, 100, 0),
(8, 'Candeeiro de Teto', 'Garagem', 'Lampada', 10, 'Off', 0, 1, 0),
(9, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 29, 'On', 1, 1, 0),
(13, 'Ventoinha', 'Casa_de_Banho', 'Ventoinha', 3, 'Off', 0, 1, 0),
(14, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 10, 'On', 1, 1, 0),
(15, 'Candeeiro de Teto', 'Quarto', 'Lampada', 10, 'On', 1, 1, 0),
(16, 'Candeeiro de Teto', 'Cozinha', 'Lampada', 10, 'Off', 0, 1, 0),
(17, 'Maquina de Cafe', 'Cozinha', 'Cafe', 0.1, 'Off', 0, 1, 0),
(19, 'Exaustor', 'Cozinha', 'Ventoinha', 10, 'Off', 0, 2, 0),
(21, 'Candeeiro do Jardim', 'Jardim', 'Lampada', 10, 'On', 1, 1, 0),
(22, 'Regas', 'Jardim', 'Regas', 3, 'Off', 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historicoDispositivos`
--

CREATE TABLE `historicoDispositivos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `divisao` varchar(50) NOT NULL,
  `tipoDispositivo` varchar(50) NOT NULL,
  `estado` varchar(7) NOT NULL,
  `valor` int(100) NOT NULL,
  `dia` varchar(50) NOT NULL,
  `hora` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historicoDispositivos`
--

INSERT INTO `historicoDispositivos` (`id`, `nome`, `divisao`, `tipoDispositivo`, `estado`, `valor`, `dia`, `hora`) VALUES
(1, 'Candeeiro de Chao', 'Quarto', 'Lampada', 'On', 56, '09/04/2022', '22:51:43'),
(2, 'Candeeiro de Chao', 'Quarto', 'Lampada', 'On', 34, '09/04/2022', '22:52:04'),
(3, 'Candeeiro de Chao', 'Quarto', 'Lampada', 'On', 45, '09/04/2022', '22:52:28'),
(4, 'Portão da Garagem', 'Garagem', 'Porta_da_Garagem', 'On', 56, '09/04/2022', '23:30:58'),
(5, 'Portão da Garagem', 'Garagem', 'Porta_da_Garagem', 'On', 46, '09/04/2022', '23:31:02'),
(6, 'Estores', 'Cozinha', 'Estores', 'On', 98, '09/04/2022', '23:35:33'),
(178, 'Sensor de Humidade', 'Cozinha', 'Humidade', 'On', 40, '09/04/2022', '23:35:33'),
(179, 'Portão da Garagem', 'Garagem', 'Porta_da_Garagem', 'On', 77, '09/04/2022', '23:54:29'),
(180, 'Candeeiro de Chao', 'Quarto', 'Lampada', 'On', 100, '09/04/2022', '23:55:59'),
(181, 'Regas', 'Jardim', 'Regas', 'On', 30, '19/04/2022', '11:00:20'),
(182, 'Regas', 'Jardim', 'Regas', 'On', 65, '19/04/2022', '11:00:25'),
(183, 'Candeeiro de Teto', 'Sala_de_Estar', 'Lampada', 'On', 29, '07/06/2022', '09:41:20'),
(184, 'Candeeiro de Teto', 'Sala_de_Estar', 'Lampada', 'On', 23, '07/06/2022', '09:41:24'),
(185, 'Candeeiro de Teto', 'Sala_de_Estar', 'Lampada', 'On', 23, '07/06/2022', '10:36:39'),
(186, 'Candeeiro de Teto', 'Sala_de_Estar', 'Lampada', 'On', 29, '07/06/2022', '10:36:42'),
(187, 'Candeeiro de Teto', 'Sala_de_Estar', 'Lampada', 'On', 29, '07/06/2022', '10:36:45'),
(188, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'On', 0, '07/06/2022', '14:15:52'),
(189, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'Off', 50, '07/06/2022', '14:15:59'),
(190, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'On', 0, '07/06/2022', '14:17:13'),
(191, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'Off', 0, '07/06/2022', '14:24:25'),
(192, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'Off', 0, '07/06/2022', '14:24:30'),
(193, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'Off', 0, '07/06/2022', '14:27:33'),
(194, 'CO2 Detetor', 'Cozinha', 'Sensor', 'On', 77, '07/06/2022', '14:43:08'),
(195, 'CO2 Detetor', 'Cozinha', 'Sensor', 'On', 77, '07/06/2022', '14:43:13'),
(196, 'CO2 Detetor', 'Cozinha', 'Sensor', 'On', 77, '07/06/2022', '14:43:15'),
(197, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '07/06/2022', '17:09:08'),
(198, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '07/06/2022', '17:09:46'),
(199, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '07/06/2022', '17:17:10'),
(200, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '07/06/2022', '17:21:48'),
(201, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '07/06/2022', '17:22:23'),
(202, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '07/06/2022', '17:22:36'),
(203, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '07/06/2022', '17:28:10'),
(204, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '07/06/2022', '17:28:26'),
(205, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '09/06/2022', '18:45:42'),
(206, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '09/06/2022', '18:47:21'),
(207, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:19:28'),
(208, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:19:32'),
(209, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:19:52'),
(210, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:20:10'),
(211, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:20:14'),
(212, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:21:01'),
(213, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:26:48'),
(214, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:26:52'),
(215, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:57:20'),
(216, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:57:50'),
(217, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:58:38'),
(218, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '10/06/2022', '22:59:27'),
(219, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 50, '11/06/2022', '00:57:30'),
(220, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 63, '11/06/2022', '01:07:13'),
(221, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 63, '11/06/2022', '01:08:13'),
(222, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 63, '11/06/2022', '01:08:27'),
(223, 'Candeeiro de Teto', 'Sala_de_Estar', 'Lampada', 'On', 29, '11/06/2022', '01:12:10'),
(224, 'Painel Solar', 'Jardim', 'Painel_Solar', 'On', 0, '11/06/2022', '01:14:21'),
(225, 'Painel Solar', 'Jardim', 'Painel_Solar', 'Off', 50, '11/06/2022', '01:14:23'),
(226, 'Painel Solar', 'Jardim', 'Painel_Solar', 'On', 50, '11/06/2022', '01:26:32'),
(227, 'Painel Solar', 'Jardim', 'Painel_Solar', 'On', 50, '11/06/2022', '01:26:38'),
(228, 'Painel Solar', 'Jardim', 'Painel_Solar', 'On', 50, '11/06/2022', '01:26:41'),
(229, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 63, '12/06/2022', '17:57:11'),
(230, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 63, '12/06/2022', '17:57:14'),
(231, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 1, '13/06/2022', '16:13:54'),
(232, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 1, '13/06/2022', '16:37:43'),
(233, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 1, '13/06/2022', '16:42:25'),
(234, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 1, '13/06/2022', '16:42:30'),
(235, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 1, '13/06/2022', '16:42:33'),
(236, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '16:42:49'),
(237, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '16:42:54'),
(238, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '16:42:58'),
(239, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '16:43:34'),
(240, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 1, '13/06/2022', '16:43:37'),
(241, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 0, '13/06/2022', '16:43:39'),
(242, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 2, '13/06/2022', '16:57:58'),
(243, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '16:58:34'),
(244, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '16:58:38'),
(245, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 1, '13/06/2022', '16:58:41'),
(246, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 0, '13/06/2022', '16:58:46'),
(247, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '16:58:51'),
(248, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '17:12:30'),
(249, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '17:12:34'),
(250, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '17:12:39'),
(251, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 2, '13/06/2022', '17:12:44'),
(252, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '17:12:47'),
(253, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'On', 100, '13/06/2022', '17:21:05'),
(254, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'On', 100, '13/06/2022', '17:30:26'),
(255, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '17:38:33'),
(256, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '17:38:40'),
(257, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '17:38:44'),
(258, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 0, '13/06/2022', '20:55:09'),
(259, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 2, '13/06/2022', '20:55:23'),
(260, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 2, '13/06/2022', '20:56:25'),
(261, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '20:56:38'),
(262, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 1, '13/06/2022', '20:57:39'),
(263, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 1, '13/06/2022', '20:57:41'),
(264, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '20:58:23'),
(265, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '20:59:40'),
(266, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 0, '13/06/2022', '21:00:31'),
(267, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 0, '13/06/2022', '21:01:13'),
(268, 'Exaustor', 'Cozinha', 'Ventoinha', 'On', 2, '13/06/2022', '21:09:52'),
(269, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:21:00'),
(270, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:22:53'),
(271, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:23:24'),
(272, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:23:26'),
(273, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:24:58'),
(274, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:25:49'),
(275, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:25:52'),
(276, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:25:56'),
(277, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:28:53'),
(278, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'On', 0, '13/06/2022', '21:30:26'),
(279, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'Off', 1, '13/06/2022', '21:31:12'),
(280, 'Televisão', 'Sala_de_Estar', 'TV', 'On', 1, '13/06/2022', '21:33:38'),
(281, 'Televisão', 'Sala_de_Estar', 'TV', 'On', 1, '13/06/2022', '21:34:18'),
(282, 'Televisão', 'Sala_de_Estar', 'TV', 'On', 1, '13/06/2022', '21:34:32'),
(283, 'Candeeiro de Teto', 'Quarto', 'Lampada', 'On', 1, '13/06/2022', '21:35:22'),
(284, 'Candeeiro de Teto', 'Quarto', 'Lampada', 'On', 0, '13/06/2022', '21:35:38'),
(285, 'Candeeiro de Teto', 'Quarto', 'Lampada', 'Off', 0, '13/06/2022', '21:36:25'),
(286, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'On', 100, '13/06/2022', '21:37:03'),
(287, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:37:32'),
(288, 'Regas', 'Jardim', 'Regas', 'On', 65, '13/06/2022', '21:40:43'),
(289, 'Regas', 'Jardim', 'Regas', 'On', 0, '13/06/2022', '21:40:54'),
(290, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'Off', 0, '13/06/2022', '21:43:43'),
(291, 'Candeeiro de Teto', 'Casa_de_Banho', 'Lampada', 'Off', 1, '13/06/2022', '21:43:56'),
(292, 'Coluna', 'Sala_de_Estar', 'Coluna', 'Off', 50, '13/06/2022', '21:52:29'),
(293, 'Coluna', 'Sala_de_Estar', 'Coluna', 'On', 100, '13/06/2022', '21:53:32'),
(294, 'Coluna', 'Sala_de_Estar', 'Coluna', 'On', 1, '13/06/2022', '21:53:36'),
(295, 'Coluna', 'Sala_de_Estar', 'Coluna', 'On', 0, '13/06/2022', '21:53:40'),
(296, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '21:59:45'),
(297, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '22:04:42'),
(298, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '22:05:20'),
(299, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '22:06:50'),
(300, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '22:06:55'),
(301, 'Coluna', 'Sala_de_Estar', 'Coluna', 'Off', 0, '13/06/2022', '22:07:57'),
(302, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'Off', 1, '13/06/2022', '22:14:30'),
(303, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'On', 0, '13/06/2022', '22:15:12'),
(304, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'Off', 1, '13/06/2022', '22:15:22'),
(305, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'On', 0, '13/06/2022', '22:16:11'),
(306, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'Off', 1, '13/06/2022', '22:16:18'),
(307, 'Portão Garagem', 'Garagem', 'Porta_da_Garagem', 'Off', 1, '13/06/2022', '22:16:29'),
(308, 'Regas', 'Jardim', 'Regas', 'Off', 1, '13/06/2022', '22:28:22'),
(309, 'Regas', 'Jardim', 'Regas', 'On', 0, '13/06/2022', '22:28:34'),
(310, 'Regas', 'Jardim', 'Regas', 'Off', 1, '13/06/2022', '22:28:47'),
(311, 'Candeeiro de Teto', 'Quarto', 'Lampada', 'On', 1, '13/06/2022', '22:34:38'),
(312, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '23:53:57'),
(313, 'Exaustor', 'Cozinha', 'Ventoinha', 'Off', 0, '13/06/2022', '23:54:02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `privileges` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`username`, `password`, `privileges`) VALUES
('admin', '$2y$10$DwyTp7/lEkwWsBqUcoP6U.rFrkUNX.cW7w1N4VDARSMprArOjmaeK', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensores`
--

CREATE TABLE `sensores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `divisao` varchar(50) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  `estado` varchar(7) NOT NULL,
  `tipoSensor` varchar(50) NOT NULL,
  `alerta` tinyint(1) DEFAULT NULL,
  `bateria` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `sensores`
--

INSERT INTO `sensores` (`id`, `nome`, `divisao`, `valor`, `estado`, `tipoSensor`, `alerta`, `bateria`) VALUES
(1, 'Sensor de Movimento', 'Quarto', NULL, 'On', 'Movimento', 0, 1),
(2, 'Carro', 'Garagem', 50, 'On', 'Carro', NULL, 70),
(3, 'Sensor de Humidade', 'Casa_de_Banho', 41, 'On', 'Humidade', NULL, 100),
(4, 'Sensor de Fumo', 'Cozinha', NULL, 'On', 'Fumo', 0, 100),
(5, 'Painel Solar', 'Jardim', 0, 'On', 'Painel_Solar', 0, 100),
(7, 'Sensor de CO2', 'Cozinha', 0, 'Off', 'CO2', 0, 0),
(8, 'Sensor de Humidade', 'Cozinha', 10, 'On', 'Humidade', NULL, 100),
(9, 'Sensor de Chuva', 'Jardim', 20, 'On', 'Agua', 1, 100),
(11, 'Sensor de CO', 'Cozinha', NULL, 'On', 'CO', 1, 100),
(12, 'Sirene', 'Sala_de_Estar', NULL, 'On', 'Sirene', NULL, 100),
(13, 'Sensor de Movimento', 'Sala_de_Estar', 0, 'On', 'Movimento', 0, 1),
(14, 'PC-Siren', 'Sala_de_Estar', NULL, 'On', 'Sirene', 0, 100);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `historicoDispositivos`
--
ALTER TABLE `historicoDispositivos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `sensores`
--
ALTER TABLE `sensores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `historicoDispositivos`
--
ALTER TABLE `historicoDispositivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT de tabela `sensores`
--
ALTER TABLE `sensores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
