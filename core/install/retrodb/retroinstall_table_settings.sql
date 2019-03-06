
-- --------------------------------------------------------

--
-- Estrutura da tabela `settings`
--

CREATE TABLE `settings` (
  `setting` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `settings`
--

INSERT INTO `settings` (`setting`, `value`) VALUES
('afk.timer.seconds', '900'),
('battleball.create.game.enabled', 'true'),
('battleball.game.lifetime.seconds', '180'),
('battleball.increase.points', 'true'),
('battleball.preparing.game.seconds', '10'),
('battleball.restart.game.seconds', '30'),
('battleball.start.minimum.active.teams', '2'),
('battleball.ticket.charge', '2'),
('carry.timer.seconds', '300'),
('chat.bubble.timeout.seconds', '15'),
('chat.garbled.text', 'true'),
('club.gift.interval', '31'),
('club.gift.present.label', 'From Habbo'),
('club.gift.timeunit', 'DAYS'),
('credits.scheduler.amount', '20'),
('credits.scheduler.enabled', 'true'),
('credits.scheduler.interval', '15'),
('credits.scheduler.timeunit', 'MINUTES'),
('fuck.aaron', 'true'),
('game.finished.listing.expiry.seconds', '300'),
('max.connections.per.ip', '2'),
('messenger.max.friends.club', '600'),
('messenger.max.friends.nonclub', '100'),
('navigator.show.hidden.rooms', 'false'),
('normalise.input.strings', 'false'),
('profile.editing', 'true'),
('rare.cycle.page.id', '2'),
('rare.cycle.page.text', 'Okay this thing is fucking epic!<br><br>The time until the next rare is {rareCountdown}!'),
('rare.cycle.pages', '28,3|29,3|31,3|32,3|33,3|34,3|35,3|36,3|40,3|43,3|30,6|37,6|38,6|39,6|44,6'),
('rare.cycle.refresh.interval', '1'),
('rare.cycle.refresh.timeunit', 'DAYS'),
('rare.cycle.reuse.interval', '3'),
('rare.cycle.reuse.timeunit', 'DAYS'),
('rare.cycle.tick.time', '78111'),
('reset.sso.after.login', 'true'),
('roller.tick.default', '2000'),
('room.dispose.timer.enabled', 'true'),
('room.dispose.timer.seconds', '60'),
('roomdimmer.scripting.allowed', 'true'),
('shutdown.minutes', '1'),
('sleep.timer.seconds', '300'),
('snowstorm.create.game.enabled', 'true'),
('snowstorm.increase.points', 'true'),
('snowstorm.preparing.game.seconds', '10'),
('snowstorm.restart.game.seconds', '30'),
('snowstorm.start.minimum.active.teams', '1'),
('snowstorm.ticket.charge', '2'),
('stack.height.limit', '8'),
('tutorial.enabled', 'false'),
('users.figure.parts.club', '100,105,110,115,120,125,130,135,140,145,150,155,160,165,170,175,176,177,178,180,185,190,195,200,205,206,207,210,215,220,225,230,235,240,245,250,255,260,265,266,267,270,275,280,281,285,290,295,300,305,500,505,510,515,520,525,530,535,540,545,550,555,565,570,575,580,585,590,595,596,600,605,610,615,620,625,626,627,630,635,640,645,650,655,660,665,667,669,670,675,680,685,690,695,696,700,705,710,715,720,725,730,735,740,800,801,802,803,804,805,806,807,808,809,810,811,812,813,814,815,816,817,818,819,820,821,822,823,824,825,826,827,828,829,830,831,832,833,834,835,836,837,838,839,840,841,842,843,844,845,846,847,848,849,850,851,852,853,854,855,856,857,858,859,860,861,862,863,864,865,866,867,868,869,870,871,872,873,875,874,876,877,878'),
('users.figure.parts.default', '100,105,110,115,120,125,130,135,140,145,150,155,160,165,170,175,176,177,178,180,185,190,195,200,205,206,207,210,215,220,225,230,235,240,245,250,255,260,265,266,267,270,275,280,281,285,290,295,300,305,500,505,510,515,520,525,530,535,540,545,550,555,565,570,575,580,585,590,595,596,600,605,610,615,620,625,626,627,630,635,640,645,650,655,660,665,667,669,670,675,680,685,690,695,696,700,705,710,715,720,725,730,735,740,877,878'),
('vouchers.enabled', 'true'),
('welcome.message.content', 'Hello, %username%! And welcome to the Kepler server!'),
('welcome.message.enabled', 'false');
