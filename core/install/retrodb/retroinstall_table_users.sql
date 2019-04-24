
-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `figure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1000118001270012900121001',
  `pool_figure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `motto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT :startmotto,
  `credits` int(11) NOT NULL DEFAULT :startcredits,
  `tickets` int(11) NOT NULL DEFAULT :starttickets,
  `film` int(11) NOT NULL DEFAULT :startfilms,
  `rank` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
  `console_motto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT :startconsole,
  `last_online` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `birthday` bigint(100) NOT NULL DEFAULT '1546300800',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff@retrocms.com',
  `sso_ticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `club_subscribed` bigint(11) NOT NULL DEFAULT '0',
  `club_expiration` bigint(11) NOT NULL DEFAULT '0',
  `club_gift_due` bigint(11) NOT NULL DEFAULT '0',
  `badge` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `badge_active` tinyint(1) NOT NULL DEFAULT '0',
  `allow_stalking` tinyint(1) NOT NULL DEFAULT '1',
  `allow_friend_requests` tinyint(1) NOT NULL DEFAULT '1',
  `allow_home_access` tinyint(1) NOT NULL DEFAULT '1',
  `sound_enabled` tinyint(1) NOT NULL DEFAULT '1',
  `tutorial_finished` tinyint(1) NOT NULL DEFAULT '0',
  `battleball_points` int(11) NOT NULL DEFAULT '0',
  `snowstorm_points` int(11) NOT NULL DEFAULT '0',
  `user_language` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT :startlanguage
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
