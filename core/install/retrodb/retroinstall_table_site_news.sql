
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
(1, '2019-01-04 19:33:20', '<span class="lang-article-install-title">RetroCMS foi Instalado com Sucesso</span>', '<span class="lang-article-install-sub">Clique aqui para mais informações.</span>', '<center><img src=\"https://i.imgur.com/UbURF00.png\" alt=\"RetroCMS\" vspace=\"5\"></center>\r\n<br>\r\n<b> Parabéns </b>\r\n<p>Olá , se você consegue ler esta noticia , siginifica que a instalação do RetroCMS foi executada com sucesso.\r\nCaso você seja o administrador , recomendamos que disabilite esta noticia acessando o painel de controle clicando\r\n<a href=\"../../theallseeineye\">aqui</a>.</p>\r\n\r\n<br>\r\n\r\n<b> O que é o RetroCMS </b>\r\n<p>Um CMS construido em PHP compativel com o servidor Kepler (creditos ao Quackster), atualmente compativel com versões \r\nv14 - v17. Sua concepção começou ainda em meados de 2010 (creditos a m.tiago) com alguns prototipos simples atualmente \r\nse utiliza de conceitos de PDO construido sobre uma arquitetura MVC. Para mais informações <a href=\"https://github.com\r\n/Negociation/RetroCMS\">acesse</a> a thread de desenvolvimento do projeto no forum Ragezone.\r\n</p>\r\n\r\n<br>\r\n\r\n<b> Beta Preview </b>\r\n<table width=\"100%\">\r\n<tbody><tr>\r\n\r\n<td style=\"vertical-align: top;\"><p>Você esta executando uma versão Beta do RetroCMS , especificamente a versão 0.9.0 de \r\ncodenome \"Aquamarine\" que foi liberada em Maio/2019. Recomendamos que mantenha o sistema atualizado para isso basta \r\nverificar atualizações no Github do projeto clicando <a href=\"https://github.com/Negociation/RetroCMS\">aqui</a>, \r\nnão se esqueça de selecionar a ramificação correta referente a sua versão neste caso Beta 3.</p></td>\r\n\r\n<td valign=\"top\"><img src=\"http://localhost/c_images/content/maintenance.gif\" alt=\"\"></td>\r\n\r\n</tr></tbody></table>\r\n\r\n<br>\r\n<b> Adobe Sockwave Player (End of Life) </b>\r\n<table width=\"100%\"><tbody><tr>\r\n\r\n<td><img src=\"http://i.imgur.com/6zrNiqZ.gif\" alt=\"\" width=\"100\" height=\"100\"></td>\r\n\r\n<td>\r\nPara acessar o hotel é necessário o uso do Adobe Sockwave Player, infelizmente o mesmo teve o seu fim decretado em 04/19 , \r\npara continuar o acesso é necessário utilizar um browser compativel , para isto recomendamos o uso do Pale Moon (32-bit) \r\nou Internet Explorer.</td>\r\n\r\n</tr></tbody></table>\r\n\r\n', 1, 1);
