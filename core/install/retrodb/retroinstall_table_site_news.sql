
-- --------------------------------------------------------

--
-- Estrutura da tabela `site_news`
--

CREATE TABLE `site_news` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Undefined Title',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Undefined Desc',
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `site_news`
--

INSERT INTO `site_news` (`id`, `date`, `title`, `description`, `content`, `author`, `status`) VALUES
(1, '2019-01-04 19:33:20', 'RetroCMS foi Instalado com Sucesso ', 'Clique aqui para mais informações.', 'RetroCMS foi instalado com sucesso.', 1, 1);
