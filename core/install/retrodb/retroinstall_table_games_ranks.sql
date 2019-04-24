
-- --------------------------------------------------------

--
-- Estrutura da tabela `games_ranks`
--

CREATE TABLE `games_ranks` (
  `id` int(5) NOT NULL,
  `type` enum('battleball','snowstorm') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'battleball',
  `title` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `min_points` int(10) NOT NULL,
  `max_points` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `games_ranks`
--

INSERT INTO `games_ranks` (`id`, `type`, `title`, `min_points`, `max_points`) VALUES
(1, 'battleball', 'Beginner', 0, 10000),
(2, 'battleball', 'Amateur', 10001, 100000),
(3, 'battleball', 'Intermediate', 100001, 500000),
(4, 'battleball', 'Expert', 500001, 0),
(5, 'snowstorm', 'Beginner', 0, 10000),
(6, 'snowstorm', 'Amateur', 10001, 100000),
(7, 'snowstorm', 'Intermediate', 100001, 500000),
(8, 'snowstorm', 'Expert', 500001, 0);
