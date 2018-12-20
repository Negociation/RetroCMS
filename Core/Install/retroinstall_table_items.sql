
-- --------------------------------------------------------

--
-- Estrutura da tabela `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT '0',
  `definition_id` int(11) NOT NULL,
  `x` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `y` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `z` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `wall_position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `rotation` int(11) DEFAULT '0',
  `custom_data` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
