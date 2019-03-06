
-- --------------------------------------------------------

--
-- Estrutura da tabela `soundmachine_disks`
--

CREATE TABLE `soundmachine_disks` (
  `item_id` bigint(11) NOT NULL,
  `soundmachine_id` int(11) NOT NULL DEFAULT '0',
  `slot_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL,
  `burned_at` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `soundmachine_disks`
--

INSERT INTO `soundmachine_disks` (`item_id`, `soundmachine_id`, `slot_id`, `song_id`, `burned_at`) VALUES
(4, 0, 0, 1, 1548538214),
(7, 0, 0, 1, 1548544281),
(8, 0, 0, 1, 1548544282),
(9, 0, 0, 1, 1548544284),
(10, 0, 0, 1, 1548544285),
(11, 0, 0, 1, 1548544287),
(12, 0, 0, 1, 1548544288),
(34, 0, 0, 2, 1548609019),
(64, 0, 0, 3, 1548789554),
(78, 0, 0, 4, 1548879571);
