
-- --------------------------------------------------------

--
-- Estrutura da tabela `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `owner_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) DEFAULT '2',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ccts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `wallpaper` int(4) DEFAULT '0',
  `floor` int(4) DEFAULT '0',
  `showname` tinyint(1) DEFAULT '1',
  `superusers` tinyint(1) DEFAULT '0',
  `accesstype` tinyint(3) DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `visitors_now` int(11) DEFAULT '0',
  `visitors_max` int(11) DEFAULT '25',
  `rating` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Extraindo dados da tabela `rooms`
--

INSERT INTO `rooms` (`id`, `owner_id`, `category`, `name`, `description`, `model`, `ccts`, `wallpaper`, `floor`, `showname`, `superusers`, `accesstype`, `password`, `visitors_now`, `visitors_max`, `rating`, `created_at`, `updated_at`) VALUES
(1, '0', 3, 'Welcome Lounge', 'welcome_lounge', 'newbie_lobby', 'hh_room_nlobby', 0, 0, 0, 0, 0, '', 0, 40, 0, '2018-08-11 07:54:01', '2019-03-04 18:46:05'),
(2, '0', 3, 'Theatredome', 'theatredrome', 'theater', 'hh_room_theater', 0, 0, 0, 0, 0, '', 0, 100, 0, '2018-08-11 07:54:01', '2019-03-04 18:47:35'),
(3, '0', 3, 'Library', 'library', 'library', 'hh_room_library', 0, 0, 0, 0, 0, '', 0, 30, 0, '2018-08-11 07:54:01', '2019-03-04 18:47:57'),
(4, '0', 5, 'TV Studio', 'tv_studio', 'tv_studio', 'hh_room_tv_studio_general', 0, 0, 0, 0, 0, '', 0, 20, 0, '2018-08-11 07:54:01', '2019-02-27 18:11:51'),
(5, '0', 5, 'Cinema', 'habbo_cinema', 'cinema_a', 'hh_room_cinema', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2019-01-26 21:00:54'),
(6, '0', 5, 'Power Gym', 'sport', 'sport', 'hh_room_sport', 0, 0, 0, 0, 0, '', 0, 35, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(7, '0', 5, 'Olympic Stadium', 'ballroom', 'ballroom', 'hh_room_ballroom', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2019-01-26 21:01:18'),
(8, '0', 5, 'Habbo Kitchen', 'hotel_kitchen', 'cr_kitchen', 'hh_room_kitchen', 0, 0, 0, 0, 0, '', 0, 20, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(9, '0', 6, 'The Dirty Duck Pub', 'the_dirty_duck_pub', 'pub_a', 'hh_room_pub', 0, 0, 0, 0, 0, '', 0, 40, 0, '2018-08-11 07:54:01', '2019-01-27 17:47:52'),
(10, '0', 6, 'Cafe Ole', 'cafe_ole', 'cafe_ole', 'hh_room_cafe', 0, 0, 0, 0, 0, '', 0, 35, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(11, '0', 6, 'Gallery Cafe', 'eric\'s_eaterie', 'cr_cafe', 'hh_room_erics', 0, 0, 0, 0, 0, '', 0, 35, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(12, '0', 6, 'Space Cafe', 'space_cafe', 'space_cafe', 'hh_room_space_cafe', 0, 0, 0, 0, 0, '', 0, 35, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(13, '0', 7, 'Rooftop Terrace', 'rooftop', 'rooftop', 'hh_room_rooftop', 0, 0, 0, 0, 0, '', 0, 30, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(14, '0', 7, 'Rooftop Cafe', 'rooftop', 'rooftop_2', 'hh_room_rooftop', 0, 0, 0, 0, 0, '', 0, 20, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(15, '0', 6, 'Palazzo Pizza', 'pizza', 'pizza', 'hh_room_pizza', 0, 0, 0, 0, 0, '', 0, 40, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(16, '0', 6, 'Habburgers', 'habburger\'s', 'habburger', 'hh_room_habburger', 0, 0, 0, 0, 0, '', 0, 40, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(17, '0', 8, 'Grandfathers Lounge', 'dusty_lounge', 'dusty_lounge', 'hh_room_dustylounge', 0, 0, 0, 0, 0, '', 0, 45, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(18, '0', 7, 'Oriental Tearoom', 'tearoom', 'tearoom', 'hh_room_tearoom', 0, 0, 0, 0, 0, '', 0, 40, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(19, '0', 7, 'Oldskool Lounge', 'old_skool', 'old_skool0', 'hh_room_old_skool', 0, 0, 0, 0, 0, '', 0, 45, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(20, '0', 7, 'Oldskool Dancefloor', 'old_skool', 'old_skool1', 'hh_room_old_skool', 0, 0, 0, 0, 0, '', 0, 45, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(21, '0', 7, 'The Chromide Club', 'the_chromide_club', 'malja_bar_a', 'hh_room_disco', 0, 0, 0, 0, 0, '', 0, 45, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(22, '0', 7, 'The Chromide Club II', 'the_chromide_club', 'malja_bar_b', 'hh_room_disco', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(23, '0', 7, 'Club Massiva', 'club_massiva', 'bar_a', 'hh_room_bar', 0, 0, 0, 0, 0, '', 0, 45, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(24, '0', 7, 'Club Massiva II', 'club_massiva2', 'bar_b', 'hh_room_bar', 0, 0, 0, 0, 0, '', 0, 70, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(25, '0', 6, 'Sunset Cafe', 'sunset_cafe', 'sunset_cafe', 'hh_room_sunsetcafe', 0, 0, 0, 0, 0, '', 0, 35, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(26, '0', 7, 'Oasis Spa', 'cafe_gold', 'cafe_gold0', 'hh_room_gold', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(27, '0', 9, 'Treehugger Garden', 'chill', 'chill', 'hh_room_chill', 0, 0, 0, 0, 0, '', 0, 30, 0, '2018-08-11 07:54:01', '2018-11-16 22:37:29'),
(28, '0', 8, 'Club Mammoth', 'club_mammoth', 'club_mammoth', 'hh_room_clubmammoth', 0, 0, 0, 0, 0, '', 0, 45, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(29, '0', 9, 'Floating Garden', 'floatinggarden', 'floatinggarden', 'hh_room_floatinggarden', 0, 0, 0, 0, 0, '', 0, 80, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(30, '0', 9, 'Picnic Fields', 'picnic', 'picnic', 'hh_room_picnic', 0, 0, 0, 0, 0, '', 0, 55, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(31, '0', 9, 'Sun Terrace', 'sun_terrace', 'sun_terrace', 'hh_room_sun_terrace', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(32, '0', 9, 'Peaceful Park', 'gate_park', 'gate_park', 'hh_room_gate_park', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2018-11-17 00:14:57'),
(33, '0', 9, 'Peaceful Park B', 'gate_park', 'gate_park_2', 'hh_room_gate_park', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2018-11-17 00:14:48'),
(34, '0', 9, 'The Park', 'park', 'park_a', 'hh_room_park_general,hh_room_park', 0, 0, 0, 0, 0, '', 0, 45, 0, '2018-08-11 07:54:01', '2018-11-17 00:10:33'),
(35, '0', 9, 'The Infobus', 'park', 'park_b', 'hh_room_park_general,hh_room_park', 0, 0, 0, 0, 0, '', 0, 20, 0, '2018-08-11 07:54:01', '2018-11-17 00:10:49'),
(36, '0', 10, 'Habbo Lido', 'habbo_lido', 'pool_a', 'hh_room_pool,hh_people_pool', 0, 0, 0, 0, 0, '', 0, 60, 0, '2018-08-11 07:54:01', '2019-01-27 17:30:58'),
(37, '0', 10, 'Lido B', 'habbo_lido_ii', 'pool_b', 'hh_room_pool,hh_people_pool', 0, 0, 0, 0, 0, '', 0, 60, 0, '2018-08-11 07:54:01', '2019-01-27 15:44:30'),
(38, '0', 10, 'Rooftop Rumble', 'rooftop_rumble', 'md_a', 'hh_room_terrace,hh_paalu,hh_people_pool,hh_people_paalu', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2019-01-27 17:32:10'),
(39, '0', 11, 'Main Lobby', 'main_lobby', 'lobby_a', 'hh_room_lobby', 0, 0, 0, 0, 0, '', 0, 100, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(40, '0', 11, 'Basement Lobby', 'basement_lobby', 'floorlobby_a', 'hh_room_floorlobbies', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(41, '0', 11, 'Median Lobby', 'median_lobby', 'floorlobby_b', 'hh_room_floorlobbies', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(42, '0', 11, 'Skylight Lobby', 'skylight_lobby', 'floorlobby_c', 'hh_room_floorlobbies', 0, 0, 0, 0, 0, '', 0, 50, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(43, '0', 6, 'Ice Cafe', 'ice_cafe', 'ice_cafe', 'hh_room_icecafe', 0, 0, 0, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(44, '0', 6, 'Net Cafe', 'netcafe', 'netcafe', 'hh_room_netcafe', 0, 0, 0, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2019-01-27 17:32:37'),
(45, '0', 5, 'Beauty Salon', 'beauty_salon_loreal', 'beauty_salon0', 'hh_room_beauty_salon_general', 0, 0, 0, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2019-01-26 21:01:10'),
(46, '0', 5, 'The Den', 'the_den', 'cr_staff', 'hh_room_den', 0, 0, 0, 0, 0, '', 0, 100, 0, '2018-08-11 07:54:01', '2019-01-26 21:01:06'),
(47, '0', 12, 'Lower Hallways', 'hallway', 'hallway2', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2019-01-26 22:10:06'),
(48, '0', 12, 'Lower Hallways I', 'hallway', 'hallway0', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(49, '0', 12, 'Lower Hallways II', 'hallway', 'hallway1', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(50, '0', 12, 'Lower Hallways III', 'hallway', 'hallway3', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(51, '0', 12, 'Lower Hallways IV', 'hallway', 'hallway5', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(52, '0', 12, 'Lower Hallways V', 'hallway', 'hallway4', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2019-01-26 22:16:24'),
(53, '0', 12, 'Upper Hallways', 'hallway_ii', 'hallway9', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(54, '0', 12, 'Upper Hallways I', 'hallway_ii', 'hallway8', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(55, '0', 12, 'Upper Hallways II', 'hallway_ii', 'hallway7', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(56, '0', 12, 'Upper Hallways III', 'hallway_ii', 'hallway6', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(57, '0', 12, 'Upper Hallways IV', 'hallway_ii', 'hallway10', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(58, '0', 12, 'Upper Hallways V', 'hallway_ii', 'hallway11', 'hh_room_hallway', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-11-16 22:28:00'),
(59, '0', 7, 'Star Lounge', 'star_lounge', 'star_lounge', 'hh_room_starlounge', 0, 0, 1, 0, 0, '', 0, 35, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(60, '0', 8, 'Club Orient', 'orient', 'orient', 'hh_room_orient', 0, 0, 1, 0, 0, '', 0, 35, 0, '2018-08-11 07:54:01', '2018-11-16 22:28:00'),
(61, '0', 13, 'Cunning Fox Gamehall', 'cunning_fox_gamehall', 'entryhall', 'hh_room_gamehall,hh_games', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2019-01-26 21:02:03'),
(62, '0', 13, 'TicTacToe hall', 'cunning_fox_gamehall/1', 'hallA', 'hh_room_gamehall,hh_games', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-11-16 22:41:26'),
(63, '0', 13, 'Battleships hall', 'cunning_fox_gamehall/2', 'hallB', 'hh_room_gamehall,hh_games', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-11-16 22:40:42'),
(64, '0', 13, 'Chess hall', 'cunning_fox_gamehall/3', 'hallC', 'hh_room_gamehall,hh_games', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-11-16 22:40:30'),
(65, '0', 13, 'Poker hall', 'cunning_fox_gamehall/4', 'hallD', 'hh_room_gamehall,hh_games', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2018-08-11 07:54:01'),
(66, '0', 13, 'Battleball Lobby', 'bb_lobby_beginner_0', 'bb_lobby_1', 'hh_game_bb,hh_game_bb_room,hh_game_bb_ui,hh_gamesys', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2019-01-27 15:22:44'),
(67, '0', 13, 'Snowstorm Lobby', 'sw_lobby_beginner_0', 'snowwar_lobby_1', 'hh_gamesys,hh_game_snowwar,hh_game_snowwar_room,hh_game_snowwar_ui', 0, 0, 1, 0, 0, '', 0, 25, 0, '2018-08-11 07:54:01', '2019-01-27 15:21:44'),
(1026, '1', 2, '80 Quadrados', '', 'model_f', '', 1901, 501, 1, 0, 0, '', 0, 25, 0, '2019-01-28 19:24:35', '2019-03-04 18:25:25'),
(1054, '1', 101, 'Meu Cafofo', '', 'model_g', '', 0, 0, 1, 0, 0, '', 0, 25, 0, '2019-01-28 21:47:59', '2019-03-05 16:27:59'),
(1055, '1', 2, 'ok', '', 'model_m', '', 0, 0, 1, 0, 0, '', 0, 25, 0, '2019-01-28 22:15:29', '2019-02-26 16:21:53'),
(1056, '1', 2, 'Ok', '', 'model_i', '', 0, 0, 1, 0, 0, '', 0, 25, 0, '2019-02-26 16:14:17', '2019-02-26 18:40:55'),
(1057, '1', 101, 'Espreguiçadeiras', '', 'model_d', '', 1901, 107, 1, 0, 0, '', 0, 25, 0, '2019-02-26 17:06:02', '2019-02-26 17:38:30'),
(1058, '1', 2, 'Espreguiçadeiras', '', 'model_a', '', 1901, 106, 1, 0, 0, '', 0, 25, 0, '2019-02-26 18:02:46', '2019-03-05 16:36:56');

--
-- Acionadores `rooms`
--
DELIMITER $$
CREATE TRIGGER `Tgr_Windows` AFTER INSERT ON `rooms` FOR EACH ROW BEGIN 
IF (NEW.model = 'model_a') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=8,0 l=3,57 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_b') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=8,0 l=28,67 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_d') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1414, '0', '0', '0.0', ':w=8,0 l=13,57 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_e') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=7,2 l=0,53 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_f') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1414, '0', '0', '0.0', ':w=5,2 l=12,58 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_g') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=4,4 l=23,66 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_h') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=8,1 l=0,54 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_i') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=5,0 l=12,37 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=12,0 l=4,33 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_j') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=8,6 l=0,31 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=3,6 l=10,36 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_k') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=20,0 l=12,37 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=4,8 l=12,37 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=12,4 l=12,37 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_l') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=5,0 l=4,33 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=17,0 l=0,31 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_m') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1414, '0', '0', '0.0', ':w=17,0 l=6,35 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1414, '0', '0', '0.0', ':w=14,0 l=2,33 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_n') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=5,0 l=4,33 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=17,0 l=0,31 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=11,0 l=2,32 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_o') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=3,14 l=14,38 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_p') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=9,0 l=0,31 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=14,0 l=12,37 r', 0, '16', 0);

END IF;

IF (NEW.model = 'model_q') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=14,0 l=14,38 r', 0, '16', 0);
END IF;

IF (NEW.model = 'model_r') THEN
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=14,0 l=12,53 r', 0, '16', 0);
INSERT INTO `items` (`order_id`, `user_id`, `room_id`, `definition_id`, `x`, `y`, `z`, `wall_position`, `rotation`, `custom_data`, `is_hidden`) VALUES
(0, NEW.owner_id, NEW.id, 1413, '0', '0', '0.0', ':w=20,0 l=12,53 r', 0, '16', 0);
END IF;
END
$$
DELIMITER ;
