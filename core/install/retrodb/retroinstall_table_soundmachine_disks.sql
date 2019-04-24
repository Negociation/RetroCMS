
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
