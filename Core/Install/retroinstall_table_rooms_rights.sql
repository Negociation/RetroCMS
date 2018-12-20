
-- --------------------------------------------------------

--
-- Estrutura da tabela `rooms_rights`
--

CREATE TABLE `rooms_rights` (
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
