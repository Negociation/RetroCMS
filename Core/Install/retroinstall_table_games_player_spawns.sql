
-- --------------------------------------------------------

--
-- Estrutura da tabela `games_player_spawns`
--

CREATE TABLE `games_player_spawns` (
  `type` enum('battleball','snowstorm') CHARACTER SET utf8mb4 NOT NULL DEFAULT 'battleball',
  `map_id` enum('6','5','4','3','2','1') CHARACTER SET utf8mb4 NOT NULL,
  `team_id` enum('3','2','1','0') CHARACTER SET utf8mb4 NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `z` enum('9','8','7','6','5','4','3','2','1','0') CHARACTER SET utf8mb4 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `games_player_spawns`
--

INSERT INTO `games_player_spawns` (`type`, `map_id`, `team_id`, `x`, `y`, `z`) VALUES
('battleball', '5', '0', 22, 11, '6'),
('battleball', '5', '1', 0, 11, '2'),
('battleball', '5', '2', 11, 22, '0'),
('battleball', '5', '3', 11, 0, '4'),
('battleball', '1', '0', 0, 15, '2'),
('battleball', '1', '1', 27, 12, '6'),
('battleball', '1', '2', 12, 27, '0'),
('battleball', '1', '3', 15, 0, '4'),
('battleball', '2', '0', 0, 9, '2'),
('battleball', '2', '1', 32, 10, '6'),
('battleball', '2', '2', 14, 9, '6'),
('battleball', '2', '3', 18, 9, '2'),
('battleball', '4', '3', 21, 8, '6'),
('battleball', '4', '2', 7, 8, '2'),
('battleball', '4', '1', 14, 0, '4'),
('battleball', '4', '0', 14, 16, '0'),
('battleball', '3', '0', 21, 14, '6'),
('battleball', '3', '1', 7, 14, '2'),
('battleball', '3', '2', 14, 21, '0'),
('battleball', '3', '3', 14, 7, '4');
