
-- --------------------------------------------------------

--
-- Estrutura da tabela `items_photos`
--

CREATE TABLE `items_photos` (
  `photo_id` int(11) NOT NULL,
  `photo_user_id` bigint(11) NOT NULL,
  `timestamp` bigint(11) NOT NULL,
  `photo_data` blob NOT NULL,
  `photo_checksum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
