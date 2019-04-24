
-- --------------------------------------------------------

--
-- Estrutura da tabela `users_bans`
--

CREATE TABLE `users_bans` (
  `ban_type` enum('MACHINE_ID','IP_ADDRESS','USER_ID') NOT NULL,
  `banned_value` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `banned_until` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
