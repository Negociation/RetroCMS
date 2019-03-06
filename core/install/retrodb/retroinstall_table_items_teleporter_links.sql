
-- --------------------------------------------------------

--
-- Estrutura da tabela `items_teleporter_links`
--

CREATE TABLE `items_teleporter_links` (
  `item_id` int(11) NOT NULL,
  `linked_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `items_teleporter_links`
--

INSERT INTO `items_teleporter_links` (`item_id`, `linked_id`) VALUES
(14, 15),
(15, 14),
(32, 33),
(33, 32);
