
-- --------------------------------------------------------

--
-- Estrutura da tabela `rank_fuserights`
--

CREATE TABLE `rank_fuserights` (
  `min_rank` int(11) NOT NULL,
  `fuseright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `rank_fuserights`
--

INSERT INTO `rank_fuserights` (`min_rank`, `fuseright`) VALUES
(1, 'default'),
(1, 'fuse_login'),
(1, 'fuse_buy_credits'),
(1, 'fuse_trade'),
(1, 'fuse_room_queue_default'),
(2, 'fuse_enter_full_rooms'),
(3, 'fuse_enter_locked_rooms'),
(3, 'fuse_kick'),
(3, 'fuse_mute'),
(4, 'fuse_ban'),
(4, 'fuse_room_mute'),
(4, 'fuse_room_kick'),
(4, 'fuse_receive_calls_for_help'),
(4, 'fuse_remove_stickies'),
(5, 'fuse_mod'),
(5, 'fuse_superban'),
(5, 'fuse_pick_up_any_furni'),
(5, 'fuse_ignore_room_owner'),
(5, 'fuse_any_room_controller'),
(2, 'fuse_room_alert'),
(5, 'fuse_moderator_access'),
(6, 'fuse_administrator_access'),
(6, 'fuse_see_flat_ids'),
(5, 'fuse_credits');
