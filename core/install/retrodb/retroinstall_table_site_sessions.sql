
-- --------------------------------------------------------

--
-- Estrutura da tabela `site_sessions`
--

CREATE TABLE `site_sessions` (
  `id` varchar(50) NOT NULL,
  `username` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
