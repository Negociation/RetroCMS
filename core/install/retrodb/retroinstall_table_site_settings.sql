
-- --------------------------------------------------------

--
-- Estrutura da tabela `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `setting_value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `site_settings`
--

INSERT INTO `site_settings` (`id`, `setting_name`, `setting_value`) VALUES
(1, 'Hotel_Name', :name),
(2, 'Hotel_Nick', :nick),
(3, 'Hotel_Version', :version),
(4, 'Hotel_Web', :web),
(5, 'Hotel_Url', :url),
(6, 'Hotel_Language', :language),
(7, 'Hotel_Dcr', :dcr),
(8, 'Hotel_Texts', :texts),
(9, 'Hotel_Vars', :vars),
(10, 'Hotel_Host', :host),
(11, 'Hotel_Port', :port),
(12, 'Hotel_MUS', :musport),
(13, 'Hotel_Windows', :windows);
