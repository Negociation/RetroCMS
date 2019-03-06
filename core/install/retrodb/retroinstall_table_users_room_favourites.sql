
-- --------------------------------------------------------

--
-- Estrutura da tabela `users_room_favourites`
--

CREATE TABLE `users_room_favourites` (
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users_room_favourites`
--

INSERT INTO `users_room_favourites` (`room_id`, `user_id`) VALUES
(1000, 1);
