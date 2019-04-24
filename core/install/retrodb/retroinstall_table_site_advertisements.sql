
-- --------------------------------------------------------

--
-- Estrutura da tabela `site_advertisements`
--

CREATE TABLE `site_advertisements` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `site_advertisements`
--

INSERT INTO `site_advertisements` (`id`, `image`, `url`, `type`, `status`) VALUES
(1, '../../c_images/album728/ads_habbogroup_clubjoin.png', '../../#', 1, 1),
(2, '../../c_images/album728/ads_habbogroup_habbogarden.png', '../../#', 1, 1),
(3, '../../c_images/album728/ads_habbogroup_traxintro.png', '../../#', 2, 1),
(4, '../../c_images/album728/ads_habbogroup_monstersofhabbo.png', '../../#', 2, 1),
(5, '../../c_images/album728/ads_habbogroup_bbpromo.gif', '../../#', 3, 1),
(6, '../../c_images/album728/160x600_WS_CN.gif', '../../#', 3, 1);
