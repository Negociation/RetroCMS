
-- --------------------------------------------------------

--
-- Estrutura da tabela `rooms_events`
--

CREATE TABLE `rooms_events` (
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `expire_time` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
