
-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--


CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `figure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pool_figure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'M',
  `motto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `credits` int(11) NOT NULL DEFAULT :startcredits,
  `tickets` int(11) NOT NULL DEFAULT 0,
  `film` int(11) NOT NULL DEFAULT 0,
  `console_motto` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Kepler + RetroCMS |',
  `rank` tinyint(1) UNSIGNED NOT NULL DEFAULT 1,
  `last_online` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `sso_ticket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_subscribed` bigint(11) NOT NULL DEFAULT 0,
  `club_expiration` bigint(11) NOT NULL DEFAULT 0,
  `club_gift_due` bigint(11) NOT NULL DEFAULT 0,
  `badge` char(3) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `badge_active` tinyint(1) NOT NULL DEFAULT 1,
  `allow_stalking` tinyint(1) NOT NULL DEFAULT 1,
  `allow_friend_requests` tinyint(1) NOT NULL DEFAULT 1,
  `sound_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `tutorial_finished` tinyint(1) NOT NULL DEFAULT 0,
  `battleball_points` int(11) NOT NULL DEFAULT 0,
  `snowstorm_points` int(11) NOT NULL DEFAULT 0,
  `home_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `birthday` bigint(11) NOT NULL DEFAULT 0,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'staff@retrocms.com'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
