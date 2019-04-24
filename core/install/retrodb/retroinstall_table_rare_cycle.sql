
-- --------------------------------------------------------

--
-- Estrutura da tabela `rare_cycle`
--

CREATE TABLE `rare_cycle` (
  `sale_code` varchar(255) NOT NULL,
  `reuse_time` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rare_cycle`
--

INSERT INTO `rare_cycle` (`sale_code`, `reuse_time`) VALUES
('scifidoor*3', 1556299675);
