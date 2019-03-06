
-- --------------------------------------------------------

--
-- Estrutura da tabela `catalogue_packages`
--

CREATE TABLE `catalogue_packages` (
  `id` int(11) NOT NULL,
  `salecode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `definition_id` int(11) DEFAULT NULL,
  `special_sprite_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `catalogue_packages`
--

INSERT INTO `catalogue_packages` (`id`, `salecode`, `definition_id`, `special_sprite_id`, `amount`) VALUES
(1, 'a0 deal102', 184, 0, 5),
(2, 'a0 deal104', 184, 0, 3),
(3, 'a0 deal105', 180, 0, 5),
(4, 'a0 deal106', 180, 0, 3),
(5, 'a0 deal107', 181, 0, 5),
(6, 'a0 deal108', 181, 0, 3),
(7, 'a0 deal109', 182, 0, 5),
(8, 'a0 deal114', 182, 0, 3),
(9, 'a0 deal115', 183, 0, 5),
(10, 'a0 deal116', 183, 0, 3),
(11, 'deal_dogfood', 155, 0, 6),
(12, 'deal_catfood', 156, 0, 6),
(13, 'deal_crocfood', 236, 0, 6),
(14, 'deal_cabbage', 157, 0, 6),
(15, 'sound_machine_deal', 232, 0, 1),
(16, 'sound_machine_deal', 239, 0, 1),
(17, 'deal_hcrollers', 226, 0, 5),
(18, 'deal_throne', 107, 0, 10);
