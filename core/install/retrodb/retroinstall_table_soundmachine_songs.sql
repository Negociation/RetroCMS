
-- --------------------------------------------------------

--
-- Estrutura da tabela `soundmachine_songs`
--

CREATE TABLE `soundmachine_songs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `item_id` int(11) NOT NULL,
  `length` int(3) NOT NULL DEFAULT '0',
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `burnt` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `soundmachine_songs`
--

INSERT INTO `soundmachine_songs` (`id`, `user_id`, `title`, `item_id`, `length`, `data`, `burnt`) VALUES
(1, 1, 'Teste', 2, 3, '1:1,1:2:0,1:3:0,1:4:0,1:', 1),
(2, 1, 'Teste 2', 2, 16, '1:2,8;4,4;6,1;9,2;8,1:2:0,16:3:0,16:4:0,16:', 1),
(3, 1, 'Teste', 61, 9, '1:347,1;344,2;348,1;346,1;344,2;347,1;348,1:2:0,9:3:0,9:4:0,9:', 1),
(4, 1, 'Alhmabra', 61, 16, '1:559,4;572,4;575,4;558,4:2:0,16:3:0,16:4:0,16:', 1);
