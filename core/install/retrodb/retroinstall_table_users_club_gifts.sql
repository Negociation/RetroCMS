
-- --------------------------------------------------------

--
-- Estrutura da tabela `users_club_gifts`
--

CREATE TABLE `users_club_gifts` (
  `user_id` int(11) NOT NULL,
  `sprite` varchar(50) NOT NULL,
  `date_received` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
