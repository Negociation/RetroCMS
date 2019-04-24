
-- --------------------------------------------------------

--
-- Estrutura da tabela `users_ip_logs`
--

CREATE TABLE `users_ip_logs` (
  `user_id` int(11) NOT NULL,
  `ip_address` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
