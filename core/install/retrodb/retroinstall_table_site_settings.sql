
-- --------------------------------------------------------

--
-- Estrutura da tabela `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `setting` varchar(100) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `site_settings` (`id`, `setting`, `value`) VALUES
(1, '	\r\nAdvTop_Status', 'true'),
(2, 'AdvTop_Image', 'http://localhost/c_images/album728/ads_habbogroup_clubjoin.png'),
(3, 'AdvTop_URL', '#'),
(4, 'AdvMiddle_Status', 'true'),
(5, 'AdvMiddle_Image', 'http://localhost/c_images/album728/ads_habbogroup_bbpromo.gif'),
(6, 'AdvMiddle_URL', '#'),
(7, 'AdvRight_Status', 'true'),
(8, 'AdvRight_Image', 'http://localhost/c_images/album728/ads_habbogroup_bbpromo.gif'),
(9, 'AdvRight_URL', '#'),
(10, 'Hotel_Version', :version),
(11, 'Hotel_Url', :url),
(12, 'Hotel_Web', :web),
(13, 'Hotel_Name', :name),
(14, 'Hotel_Nick', :nick),
(15, 'Hotel_Closed', '0'),
(16, 'Hotel_Texts', :texts),
(17, 'Hotel_Variables', :vars),
(18, 'Hotel_Dcr', :dcr),
(19, 'Hotel_Host', :host),
(20, 'Hotel_Port', :port),
(21, 'Hotel_MusHost', :mushost),
(22, 'Hotel_MusPort', :musport);