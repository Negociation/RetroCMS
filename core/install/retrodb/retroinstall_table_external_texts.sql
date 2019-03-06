
-- --------------------------------------------------------

--
-- Estrutura da tabela `external_texts`
--

CREATE TABLE `external_texts` (
  `entry` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `text` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `external_texts`
--

INSERT INTO `external_texts` (`entry`, `text`) VALUES
('handitem1', 'Tea'),
('handitem10', 'Latte'),
('handitem11', 'Mocha'),
('handitem12', 'Macchiato'),
('handitem13', 'Espresso'),
('handitem14', 'Filter'),
('handitem15', 'Iced'),
('handitem16', 'Cappuccino'),
('handitem17', 'Java'),
('handitem18', 'Tap'),
('handitem19', 'Habbo Cola'),
('handitem2', 'Juice'),
('handitem20', 'Camera'),
('handitem21', 'Hamburger'),
('handitem22', 'Lime Habbo Soda'),
('handitem23', 'Beetroot Habbo Soda'),
('handitem24', 'Bubble juice from 1999'),
('handitem25', 'Love potion'),
('handitem3', 'Carrot'),
('handitem4', 'Ice-cream'),
('handitem5', 'Milk'),
('handitem6', 'Blackcurrant'),
('handitem7', 'Water'),
('handitem8', 'Regular'),
('handitem9', 'Decaff'),
('modtool_rankerror', 'You do not have the rights for this action on this user!'),
('player_commands_no_args', 'You have not supplied any arguments!'),
('roomatic_givename', 'Give your room a name!'),
('roomdimmer_furni_limit', 'You can only have one roomdimmer per room'),
('room_sound_furni_limit', 'You can only place one sound furni per room'),
('successfully_purchase_gift_for', 'Successfully purchased gift for user %user%!');
