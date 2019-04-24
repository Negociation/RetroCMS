
-- --------------------------------------------------------

--
-- Estrutura da tabela `items_pets`
--

CREATE TABLE `items_pets` (
  `id` int(11) NOT NULL,
  `item_id` bigint(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `type` varchar(1) NOT NULL,
  `race` int(3) NOT NULL,
  `colour` varchar(6) NOT NULL,
  `nature_positive` int(3) NOT NULL,
  `nature_negative` int(3) NOT NULL,
  `friendship` float NOT NULL DEFAULT '1',
  `born` bigint(11) NOT NULL,
  `last_kip` bigint(11) NOT NULL,
  `last_eat` bigint(11) NOT NULL,
  `last_drink` bigint(11) NOT NULL,
  `last_playtoy` bigint(11) NOT NULL,
  `last_playuser` bigint(11) NOT NULL,
  `x` int(3) NOT NULL DEFAULT '0',
  `y` int(3) NOT NULL DEFAULT '0',
  `rotation` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
