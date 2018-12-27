
-- --------------------------------------------------------

--
-- Estrutura da tabela `users_badges`
--

CREATE TABLE `users_badges` (
  `user_id` int(11) NOT NULL,
  `badge` char(3) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
