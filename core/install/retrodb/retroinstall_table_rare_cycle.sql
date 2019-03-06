
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
('marquee*6', 1549145588),
('marquee*9', 1551736891),
('pillow*9', 1549056928),
('prize2', 1548791425),
('rare_dragonlamp*0', 1551477448),
('rare_fan*6', 1548884072),
('rare_snowrug', 1548970537),
('rubberchair*5', 1551823291),
('scifidoor*1', 1551919360),
('wooden_screen*5', 1551996091);
