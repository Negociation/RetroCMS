
-- --------------------------------------------------------

--
-- Estrutura da tabela `housekeeping_audit_log`
--

CREATE TABLE `housekeeping_audit_log` (
  `action` enum('alert_user','kick_user','ban_user','room_alert','room_kick') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL DEFAULT '-1',
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `extra_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
