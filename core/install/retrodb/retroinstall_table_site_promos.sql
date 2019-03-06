
-- --------------------------------------------------------

--
-- Estrutura da tabela `site_promos`
--

CREATE TABLE `site_promos` (
  `id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buttonTextTop` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `buttonUrlTop` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `buttonTextBottom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `buttonUrlBottom` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '../../client',
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `site_promos`
--

INSERT INTO `site_promos` (`id`, `image`, `text`, `buttonTextTop`, `buttonUrlTop`, `buttonTextBottom`, `buttonUrlBottom`, `status`) VALUES
(1, '../../c_images/album1054/beta_updated_promo.gif', 'Warning: Beta Preview Only for Tests. For more information access the GitHub directory.<br /\\>', 'Github', 'https://github.com/Negociation/RetroCMS', 'none', '../../client', 1),
(2, 'https://i.imgur.com/BSDLmRF.png', 'Windows added to Hotel, what your waiting for ?', 'none', '', 'Check In', '../../client', 1),
(3, 'https://i.imgur.com/B0v5asa.png', 'RetroCMS foi instalado com sucesso.<br /\\>', 'Mais', './news/article/1', 'Check In', '../../client', 1);
