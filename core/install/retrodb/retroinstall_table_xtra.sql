
--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogue_items`
--
ALTER TABLE `catalogue_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `catalogue_packages`
--
ALTER TABLE `catalogue_packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalogue_pages`
--
ALTER TABLE `catalogue_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games_ranks`
--
ALTER TABLE `games_ranks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `items_definitions`
--
ALTER TABLE `items_definitions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_moodlight_presets`
--
ALTER TABLE `items_moodlight_presets`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `items_pets`
--
ALTER TABLE `items_pets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `items_photos`
--
ALTER TABLE `items_photos`
  ADD PRIMARY KEY (`photo_id`),
  ADD UNIQUE KEY `photo_id` (`photo_id`);

--
-- Indexes for table `items_teleporter_links`
--
ALTER TABLE `items_teleporter_links`
  ADD UNIQUE KEY `item_id` (`item_id`);

--
-- Indexes for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `public_items`
--
ALTER TABLE `public_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rare_cycle`
--
ALTER TABLE `rare_cycle`
  ADD PRIMARY KEY (`sale_code`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rooms_bots`
--
ALTER TABLE `rooms_bots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms_categories`
--
ALTER TABLE `rooms_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `rooms_events`
--
ALTER TABLE `rooms_events`
  ADD PRIMARY KEY (`room_id`),
  ADD UNIQUE KEY `room_id` (`room_id`);

--
-- Indexes for table `rooms_models`
--
ALTER TABLE `rooms_models`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`setting`);

--
-- Indexes for table `site_advertisements`
--
ALTER TABLE `site_advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soundmachine_playlists`
--
ALTER TABLE `soundmachine_playlists`
  ADD KEY `machineid` (`item_id`),
  ADD KEY `songid` (`song_id`);

--
-- Indexes for table `soundmachine_songs`
--
ALTER TABLE `soundmachine_songs`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users_badges`
--
ALTER TABLE `users_badges`
  ADD KEY `users_badges_users_FK` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalogue_items`
--
ALTER TABLE `catalogue_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1350;

--
-- AUTO_INCREMENT for table `catalogue_packages`
--
ALTER TABLE `catalogue_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `games_ranks`
--
ALTER TABLE `games_ranks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items_definitions`
--
ALTER TABLE `items_definitions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;

--
-- AUTO_INCREMENT for table `items_pets`
--
ALTER TABLE `items_pets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `public_items`
--
ALTER TABLE `public_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3462;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `rooms_bots`
--
ALTER TABLE `rooms_bots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `rooms_categories`
--
ALTER TABLE `rooms_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `rooms_models`
--
ALTER TABLE `rooms_models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `soundmachine_songs`
--
ALTER TABLE `soundmachine_songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `users_badges`
--
ALTER TABLE `users_badges`
  ADD CONSTRAINT `users_badges_users_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);


--
-- Trigger for Custom Windows
--


CREATE TRIGGER `Tgr_Windows` AFTER INSERT ON `rooms` FOR EACH ROW BEGIN  
DECLARE hotelVersion INT;
DECLARE windowsStatus BOOLEAN;

SELECT setting_value INTO hotelVersion FROM site_settings WHERE setting_name='Hotel_Version';

SELECT setting_value INTO hotelVersion FROM site_settings WHERE setting_name='Hotel_Windows';

	IF( hotelVersion = 17 AND windowsStatus = true) THEN
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
	END IF;
END

