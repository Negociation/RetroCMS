
-- --------------------------------------------------------

--
-- Estrutura da tabela `soundmachine_tracks`
--

CREATE TABLE `soundmachine_tracks` (
  `soundmachine_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `slot_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `soundmachine_tracks`
--

INSERT INTO `soundmachine_tracks` (`soundmachine_id`, `track_id`, `slot_id`) VALUES
(2, 1, 1),
(1, 1, 1),
(1, 1, 5),
(1, 1, 7),
(1, 1, 3),
(1, 1, 9),
(1, 1, 4),
(1, 1, 2),
(1, 2, 6),
(61, 39, 1),
(65, 3, 1),
(61, 63, 2),
(61, 64, 3),
(61, 62, 4);
