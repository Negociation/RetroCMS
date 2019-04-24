
-- --------------------------------------------------------

--
-- Estrutura da tabela `room_chatlogs`
--

CREATE TABLE `room_chatlogs` (
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `chat_type` tinyint(1) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `room_chatlogs`
--

INSERT INTO `room_chatlogs` (`user_id`, `room_id`, `timestamp`, `chat_type`, `message`) VALUES
(1, 1, 1556040595, 0, 'hi'),
(1, 1, 1556040595, 0, 'whater'),
(1, 1, 1556040595, 0, 'drink'),
(1, 14, 1556043292, 0, 'hi'),
(1, 14, 1556043292, 0, 'drink'),
(1, 14, 1556043292, 0, 'water'),
(1, 14, 1556043292, 0, 'coffe'),
(1, 14, 1556043292, 0, 'coffe'),
(1, 14, 1556043292, 0, 'hello'),
(1, 1000, 1556048001, 0, ''),
(1, 1000, 1556048001, 0, '');
