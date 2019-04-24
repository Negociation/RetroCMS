
-- --------------------------------------------------------

--
-- Estrutura da tabela `users_tags`
--

CREATE TABLE `users_tags` (
  `user_id` int(11) DEFAULT NULL,
  `tag` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
