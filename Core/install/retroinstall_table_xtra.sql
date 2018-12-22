
--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalogue_items`
--
ALTER TABLE `catalogue_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `external_texts`
--
ALTER TABLE `external_texts`
  ADD KEY `entry` (`entry`(191));

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
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `items_moodlight_presets`
--
ALTER TABLE `items_moodlight_presets`
  ADD PRIMARY KEY (`item_id`);

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
-- Indexes for table `rooms_categories`
--
ALTER TABLE `rooms_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

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
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting` (`setting`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=761;

--
-- AUTO_INCREMENT for table `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

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
