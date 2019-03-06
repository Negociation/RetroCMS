
-- --------------------------------------------------------

--
-- Estrutura da tabela `soundmachine_playlists`
--

CREATE TABLE `soundmachine_playlists` (
  `item_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `soundmachine_playlists`
--

INSERT INTO `soundmachine_playlists` (`item_id`, `song_id`, `slot_id`) VALUES
(1, 2, 1),
(1, 1, 2),
(65, 3, 1),
(61, 3, 0),
(61, 4, 1);
