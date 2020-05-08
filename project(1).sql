-- Adminer 4.7.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `announcements`;
CREATE TABLE `announcements` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `announcements` (`id`, `text`) VALUES
(1,	'Divers - L\'eSport, une usine à rêves qui inquiète les familles'),
(2,	'League Of Legends - L\'équipe chinoise FPX remporte les Mondiaux 2019 de League of Legends'),
(3,	'Fortnite - Team SoloMid construit un centre à 13 millions de dollars'),
(61,	'Divers - zerze');

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `text` text NOT NULL,
  `id_users` int NOT NULL,
  `id_news` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_users_FK` (`id_users`),
  KEY `comments_news0_FK` (`id_news`),
  CONSTRAINT `comments_news0_FK` FOREIGN KEY (`id_news`) REFERENCES `news` (`id`),
  CONSTRAINT `comments_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `comments` (`id`, `date`, `text`, `id_users`, `id_news`) VALUES
(1,	'2020-02-04 00:00:00',	'[blok]gdfgdf[/blok]',	1,	4),
(2,	'2020-02-04 00:00:00',	'[blok]Send[/blok]',	1,	4),
(3,	'2020-02-04 00:00:00',	'[blok]ezrtzerter[/blok]',	1,	4),
(4,	'2020-02-04 00:00:00',	'[blok]h[/blok]',	1,	4),
(5,	'2020-02-04 00:00:00',	'[blok]zerze[/blok]',	1,	9),
(6,	'2020-02-04 00:00:00',	'[blok]zerze[/blok]',	1,	9),
(7,	'2020-02-04 00:00:00',	'[blok]zerzerzerzerzerzerze[/blok]',	1,	9),
(8,	'2020-02-04 00:00:00',	'[blok]zerazerazerazerzerze[/blok]',	1,	9),
(9,	'2020-02-04 00:00:00',	'[blok]u[/blok]',	1,	5),
(10,	'2020-02-04 00:00:00',	'[blok]i[/blok]',	1,	5),
(11,	'2020-02-05 00:00:00',	'[blok]jhgjhgjh;gjhgk[/blok]',	1,	4),
(12,	'2020-02-05 00:00:00',	'[blok]ghjklm[/blok]',	1,	4),
(13,	'2020-02-05 00:00:00',	'[blok]efefezrfzerez[/blok]',	1,	4),
(14,	'2020-02-11 00:00:00',	'[title][strong]J\'aime bien cet article !&nbsp;[/strong][/title]',	1,	5),
(15,	'2020-02-12 00:00:00',	'[blok]e[/blok]',	1,	4),
(16,	'2020-02-12 00:00:00',	'[blok]zerzerez[/blok]',	1,	4),
(17,	'2020-02-12 00:00:00',	'[blok]e[/blok]',	1,	4),
(18,	'2020-02-12 00:00:00',	'[blok]errr[/blok]',	1,	4),
(19,	'2020-02-18 00:00:00',	'[blok]hjklmù[/blok]',	1,	4),
(20,	'2020-02-18 00:00:00',	'[blok]zezez[/blok]',	1,	9),
(21,	'2020-02-18 00:00:00',	'',	1,	9),
(22,	'2020-02-18 00:00:00',	'[blok]test[/blok]',	1,	4),
(23,	'2020-02-18 00:00:00',	'[blok]test[/blok]',	1,	5),
(24,	'2020-02-18 00:00:00',	'[title][strong][i][del]essai[/del][/i][/strong][/title]',	1,	9),
(25,	'2020-02-19 00:00:00',	'<div>essai</div>',	1,	4),
(26,	'2020-02-19 00:00:00',	'<div>hjg</div>',	1,	9),
(27,	'2020-02-19 00:00:00',	'Bonjour',	1,	10),
(28,	'2020-02-19 00:00:00',	'salut',	1,	9),
(29,	'2020-02-20 00:00:00',	'po',	1,	4),
(30,	'2020-02-21 00:00:00',	'lmù',	1,	12),
(31,	'2020-02-21 00:00:00',	'jkkj',	1,	9),
(32,	'2020-02-21 00:00:00',	'd',	1,	9),
(33,	'2020-02-21 00:00:00',	'Slut',	38,	4),
(34,	'2020-02-23 00:00:00',	'lmm',	1,	12),
(35,	'2020-02-24 00:00:00',	'thumb-161326.png 61.61 KB',	1,	3),
(36,	'2020-02-24 00:00:00',	'thumb-161326.png 61.61 KB',	1,	9),
(37,	'2020-02-24 00:00:00',	'dsdsdsds',	1,	6),
(38,	'2020-02-28 00:00:00',	'Salut',	1,	3),
(39,	'2020-02-28 00:00:00',	'&lt;script&gt;alert(&#39;salut&#39;);&lt;/script&gt;',	1,	12),
(40,	'2020-02-28 00:00:00',	'yjyg',	1,	12),
(41,	'2020-02-28 00:00:00',	'rf',	1,	12),
(43,	'2020-03-05 00:00:00',	'ds',	1,	2),
(44,	'2020-03-13 00:00:00',	'qsdqss',	1,	12),
(45,	'2020-03-13 00:00:00',	'dqsdqs',	1,	12),
(46,	'2020-03-13 00:00:00',	'qsdqs',	1,	4),
(47,	'2020-03-13 00:00:00',	'qsdqs',	1,	4),
(48,	'2020-03-13 00:00:00',	'sqdsq',	1,	3),
(49,	'2020-03-13 00:00:00',	'J&#39;essaye',	1,	9),
(50,	'2020-03-13 00:00:00',	'd',	1,	12),
(51,	'2020-03-13 00:00:00',	'qsd',	1,	12),
(52,	'2020-03-13 00:00:00',	'zerzeze',	1,	12),
(53,	'2020-03-13 00:00:00',	'sq',	1,	12),
(54,	'2020-03-13 00:00:00',	'qsdqs',	1,	9),
(55,	'2020-03-13 00:00:00',	'allons',	1,	9),
(56,	'2020-03-13 00:00:00',	'qsdsq',	1,	9),
(57,	'2020-03-13 00:00:00',	'smart',	1,	9),
(58,	'2020-03-13 00:00:00',	'brrrrrrrrrrrrrrrrrrrr',	1,	3),
(59,	'2020-03-13 23:43:13',	'sdsds',	1,	12);

DROP TABLE IF EXISTS `forum_category`;
CREATE TABLE `forum_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `cover_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `forum_category` (`id`, `name`, `cover_img`, `logo`) VALUES
(1,	'League Of Legends',	'https://i.imgur.com/S919SiU.png',	'https://www.freepngimg.com/download/league_of_legends/8-2-league-of-legends-png-pic.png'),
(2,	'Legend Of Runeterra',	'https://vignette.wikia.nocookie.net/leagueoflegends/images/c/c7/Freljord_LoR_Background.jpg',	'https://vignette.wikia.nocookie.net/leagueoflegends/images/b/b0/Legends_of_Runeterra_logo.png/revision/latest?cb=20191019033651'),
(3,	'TeamFight Tactics',	'https://cdn.gamer-network.net/2019/usgamer/TEAMFIGHT-TACTICS-ISLAND-LEAD.jpg/EG11/thumbnail/1920x1080/format/jpg/quality/75/teamfight-tactics-vs-dota-underlords-the-state-of-auto-chess-now-that-the-dust-has-settled.jpg',	'https://upload.wikimedia.org/wikipedia/commons/1/1e/Teamfight_Tactics_logo.png');

DROP TABLE IF EXISTS `forum_messages`;
CREATE TABLE `forum_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `id_users` int NOT NULL,
  `id_forum_subjects` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_messages_users_FK` (`id_users`),
  KEY `forum_messages_forum_subjects0_FK` (`id_forum_subjects`),
  CONSTRAINT `forum_messages_forum_subjects0_FK` FOREIGN KEY (`id_forum_subjects`) REFERENCES `forum_subjects` (`id`),
  CONSTRAINT `forum_messages_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `forum_messages` (`id`, `text`, `id_users`, `id_forum_subjects`) VALUES
(1,	'qsdsqdsq',	1,	1),
(2,	'd',	29,	1),
(3,	'l',	27,	1);

DROP TABLE IF EXISTS `forum_subjects`;
CREATE TABLE `forum_subjects` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `id_forum_category` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `forum_subjects_forum_category_FK` (`id_forum_category`),
  CONSTRAINT `forum_subjects_forum_category_FK` FOREIGN KEY (`id_forum_category`) REFERENCES `forum_category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `forum_subjects` (`id`, `name`, `date`, `id_forum_category`) VALUES
(1,	'Salut a tous',	'2020-03-02',	1),
(2,	'test',	'2020-03-02',	2),
(3,	'ezez',	'2020-03-02',	1);

DROP TABLE IF EXISTS `like_tutorial`;
CREATE TABLE `like_tutorial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `like_dislike` int NOT NULL,
  `id_tutorial` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `like_tutorial_tutorial_FK` (`id_tutorial`),
  KEY `like_tutorial_users0_FK` (`id_users`),
  CONSTRAINT `like_tutorial_tutorial_FK` FOREIGN KEY (`id_tutorial`) REFERENCES `tutorial` (`id`),
  CONSTRAINT `like_tutorial_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `like_tutorial` (`id`, `like_dislike`, `id_tutorial`, `id_users`) VALUES
(31,	1,	1,	1),
(32,	1,	1,	1),
(33,	1,	1,	1),
(34,	1,	1,	1),
(36,	1,	1,	1),
(37,	1,	1,	1),
(38,	1,	1,	1),
(39,	1,	1,	1),
(43,	1,	3,	1),
(44,	2,	2,	1),
(45,	2,	7,	1),
(46,	2,	4,	1),
(47,	2,	6,	1);

DROP TABLE IF EXISTS `list_games`;
CREATE TABLE `list_games` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `list_games` (`id`, `name`) VALUES
(1,	'League Of Legends'),
(2,	'TeamFight Tactics'),
(3,	'Legend Of Runeterra');

DROP TABLE IF EXISTS `list_rank`;
CREATE TABLE `list_rank` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `list_rank` (`id`, `name`) VALUES
(1,	'Utilisateur'),
(2,	'Modérateur'),
(3,	'Journaliste'),
(4,	'Administrateur');

DROP TABLE IF EXISTS `nb_online`;
CREATE TABLE `nb_online` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_time` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nb_online_users_AK` (`id_users`),
  CONSTRAINT `nb_online_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `nb_online` (`id`, `last_time`, `id_users`) VALUES
(16,	1588027366,	1);

DROP TABLE IF EXISTS `news`;
CREATE TABLE `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(255) NOT NULL,
  `cover_img` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `star` tinyint(1) NOT NULL,
  `id_users` int NOT NULL,
  `id_news_category` int NOT NULL,
  `active` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `news_users_FK` (`id_users`),
  KEY `news_news_category0_FK` (`id_news_category`),
  CONSTRAINT `news_news_category0_FK` FOREIGN KEY (`id_news_category`) REFERENCES `news_category` (`id`),
  CONSTRAINT `news_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `news` (`id`, `date`, `title`, `cover_img`, `text`, `star`, `id_users`, `id_news_category`, `active`) VALUES
(2,	'2020-03-15 18:37:59',	'Worlds 2019 : FunPlus roi de la faille',	'../public/assets/img/news_cover/league-of-legends-worlds-2017 - 396985.jpg',	'Mauris accumsan enim eu erat placerat, non cursus libero \r\npretium. In id nibh ut ipsum cursus accumsan. Vestibulum blandit tortor a\r\n sapien commodo, at suscipit ligula lacinia. Duis nec mauris in mi \r\nconsectetur malesuada ut ut ligula. Ut sed magna sed ligula finibus \r\nscelerisque non at arcu. Quisque sodales ligula metus, in placerat \r\ntellus rutrum vitae. Nunc volutpat felis at mi efficitur volutpat. Sed \r\nipsum ligula, eleifend sit amet mattis quis, aliquet sed nunc. Aenean \r\nnon sagittis nunc, vitae scelerisque mauris. Phasellus porttitor sed \r\ndolor sit amet pretium. In aliquet eleifend porttitor. In vulputate \r\naccumsan turpis placerat lobortis. Curabitur consectetur orci id tortor \r\ndignissim luctus. Donec id magna risus. Proin pretium urna eget \r\nultricies elementum.',	0,	1,	1,	1),
(3,	'2019-11-07 23:00:00',	'Mercato : Huni devrait jouer pour Dignitas la saison prochaine',	'https://nexus.leagueoflegends.com/wp-content/uploads/2019/06/Banner_T2_Image_tnp3w61gzna8r2n3rojp.jpg',	' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer dapibus erat eget risus accumsan, sed vulputate magna porttitor. Integer ultricies a neque sodales varius. Proin suscipit finibus rhoncus. Vivamus consectetur quam convallis, eleifend mauris sed, sollicitudin eros. Sed lacus felis, porttitor ut diam vitae, maximus imperdiet felis. Nunc fringilla nulla scelerisque arcu consectetur feugiat. Quisque nec turpis elementum, porta sapien sit amet, varius metus. Quisque ornare vel odio bibendum accumsan. Aenean luctus varius eros in molestie. Vestibulum aliquam libero et imperdiet tristique. Maecenas nisl nisl, vestibulum sit amet nunc eu, bibendum rhoncus metus. Aenean et semper neque. Sed nec purus sit amet est semper aliquet. Aliquam et augue ut nibh congue facilisis sodales vitae felis. ',	0,	2,	1,	1),
(4,	'2019-11-07 23:00:00',	'L&#39;UFA, la bagarre à la française, c&#39;est ce week-end',	'http://cdn.mos.cms.futurecdn.net/ARuw5zmTC4b9yaacU2hK4L.png',	'Nullam bibendum felis ligula, molestie pharetra purus maximus eu. Sed in magna varius, commodo metus id, pellentesque dolor. Fusce finibus tellus a tortor pulvinar faucibus. Curabitur ac neque lacus. Nulla nunc dolor, accumsan eget porta eu, iaculis et augue. Donec nec ex ornare, tempus ex vitae, suscipit orci. Maecenas fringilla quam id nibh suscipit egestas. Vestibulum lobortis finibus massa vel hendrerit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Morbi mollis, erat eu pellentesque aliquet, tellus lectus consequat orci, ac viverra justo leo sit amet est. Sed laoreet turpis ac viverra bibendum. Nulla facilisi. Integer purus ante, rutrum vel sapien a, cursus pellentesque dolor.',	0,	1,	1,	1),
(5,	'2019-11-07 23:00:00',	'Nerf du « Turbo build », Epic Games fait machine arrière',	'https://newstrotteur.fr/wp-content/uploads/2019/07/teamfight-tactics-little-legends-1.jpg',	' Mauris accumsan enim eu erat placerat, non cursus libero pretium. In id nibh ut ipsum cursus accumsan. Vestibulum blandit tortor a sapien commodo, at suscipit ligula lacinia. Duis nec mauris in mi consectetur malesuada ut ut ligula. Ut sed magna sed ligula finibus scelerisque non at arcu. Quisque sodales ligula metus, in placerat tellus rutrum vitae. Nunc volutpat felis at mi efficitur volutpat. Sed ipsum ligula, eleifend sit amet mattis quis, aliquet sed nunc. Aenean non sagittis nunc, vitae scelerisque mauris. Phasellus porttitor sed dolor sit amet pretium. In aliquet eleifend porttitor. In vulputate accumsan turpis placerat lobortis. Curabitur consectetur orci id tortor dignissim luctus. Donec id magna risus. Proin pretium urna eget ultricies elementum. ',	0,	1,	1,	1),
(6,	'2019-11-07 23:00:00',	'Le mercato Fortnite saison 2019/2020',	'https://static.hitek.fr/img/actualite/ill_m/1944625799/Background.jpg',	' Mauris accumsan enim eu erat placerat, non cursus libero pretium. In id nibh ut ipsum cursus accumsan. Vestibulum blandit tortor a sapien commodo, at suscipit ligula lacinia. Duis nec mauris in mi consectetur malesuada ut ut ligula. Ut sed magna sed ligula finibus scelerisque non at arcu. Quisque sodales ligula metus, in placerat tellus rutrum vitae. Nunc volutpat felis at mi efficitur volutpat. Sed ipsum ligula, eleifend sit amet mattis quis, aliquet sed nunc. Aenean non sagittis nunc, vitae scelerisque mauris. Phasellus porttitor sed dolor sit amet pretium. In aliquet eleifend porttitor. In vulputate accumsan turpis placerat lobortis. Curabitur consectetur orci id tortor dignissim luctus. Donec id magna risus. Proin pretium urna eget ultricies elementum. ',	1,	29,	1,	1),
(7,	'2019-11-07 23:00:00',	'Mise à jour du patch 10.40.1 : Hors du temps',	'https://www.breakflip.com/uploads/Legends%20of%20Runeterra/Champions/yasuo-legends-of-runeterra.png',	' Mauris accumsan enim eu erat placerat, non cursus libero pretium. In id nibh ut ipsum cursus accumsan. Vestibulum blandit tortor a sapien commodo, at suscipit ligula lacinia. Duis nec mauris in mi consectetur malesuada ut ut ligula. Ut sed magna sed ligula finibus scelerisque non at arcu. Quisque sodales ligula metus, in placerat tellus rutrum vitae. Nunc volutpat felis at mi efficitur volutpat. Sed ipsum ligula, eleifend sit amet mattis quis, aliquet sed nunc. Aenean non sagittis nunc, vitae scelerisque mauris. Phasellus porttitor sed dolor sit amet pretium. In aliquet eleifend porttitor. In vulputate accumsan turpis placerat lobortis. Curabitur consectetur orci id tortor dignissim luctus. Donec id magna risus. Proin pretium urna eget ultricies elementum. ',	0,	2,	1,	1),
(8,	'2019-11-07 23:00:00',	'Team SoloMid construit un centre à 13 millions de dollars',	'https://lolstatic-a.akamaihd.net/frontpage/apps/prod/rg-league-display-2017/fr_FR/cb24025fade09e3f965776440dffcc65024d3266/assets/img/content/splash/content-original-championillustrations-group-slashes.jpg',	' Mauris accumsan enim eu erat placerat, non cursus libero pretium. In id nibh ut ipsum cursus accumsan. Vestibulum blandit tortor a sapien commodo, at suscipit ligula lacinia. Duis nec mauris in mi consectetur malesuada ut ut ligula. Ut sed magna sed ligula finibus scelerisque non at arcu. Quisque sodales ligula metus, in placerat tellus rutrum vitae. Nunc volutpat felis at mi efficitur volutpat. Sed ipsum ligula, eleifend sit amet mattis quis, aliquet sed nunc. Aenean non sagittis nunc, vitae scelerisque mauris. Phasellus porttitor sed dolor sit amet pretium. In aliquet eleifend porttitor. In vulputate accumsan turpis placerat lobortis. Curabitur consectetur orci id tortor dignissim luctus. Donec id magna risus. Proin pretium urna eget ultricies elementum. ',	0,	1,	1,	1),
(9,	'2019-11-11 23:00:00',	'Le mercato League of Legends saison 2019/2020',	'https://www.miraigamers.com/wp-content/uploads/2019/10/League-Of-Legend-Origin-le-Documentaire-instructif-a-ne-pas-rater-1620x800.jpg',	' Mauris accumsan enim eu erat placerat, non cursus libero pretium. In id nibh ut ipsum cursus accumsan. Vestibulum blandit tortor a sapien commodo, at suscipit ligula lacinia. Duis nec mauris in mi consectetur malesuada ut ut ligula. Ut sed magna sed ligula finibus scelerisque non at arcu. Quisque sodales ligula metus, in placerat tellus rutrum vitae. Nunc volutpat felis at mi efficitur volutpat. Sed ipsum ligula, eleifend sit amet mattis quis, aliquet sed nunc. Aenean non sagittis nunc, vitae scelerisque mauris. Phasellus porttitor sed dolor sit amet pretium. In aliquet eleifend porttitor. In vulputate accumsan turpis placerat lobortis. Curabitur consectetur orci id tortor dignissim luctus. Donec id magna risus. Proin pretium urna eget ultricies elementum. ',	0,	1,	1,	1),
(10,	'2019-11-11 23:00:00',	'Chine : un couvre-feu et des restrictions jeux vidéo pour les adolescents',	'https://static2.cbrimages.com/wordpress/wp-content/uploads/2020/01/league-of-legends-season-10-feature-header.jpg',	' Mauris accumsan enim eu erat placerat, non cursus libero pretium. In id nibh ut ipsum cursus accumsan. Vestibulum blandit tortor a sapien commodo, at suscipit ligula lacinia. Duis nec mauris in mi consectetur malesuada ut ut ligula. Ut sed magna sed ligula finibus scelerisque non at arcu. Quisque sodales ligula metus, in placerat tellus rutrum vitae. Nunc volutpat felis at mi efficitur volutpat. Sed ipsum ligula, eleifend sit amet mattis quis, aliquet sed nunc. Aenean non sagittis nunc, vitae scelerisque mauris. Phasellus porttitor sed dolor sit amet pretium. In aliquet eleifend porttitor. In vulputate accumsan turpis placerat lobortis. Curabitur consectetur orci id tortor dignissim luctus. Donec id magna risus. Proin pretium urna eget ultricies elementum. ',	0,	2,	1,	0),
(11,	'2019-11-11 23:00:00',	'LoR : guide de base pour bien débuter Legends of Runeterra',	'https://www.breakflip.com/uploads/Legends%20of%20Runeterra/Champions/draven-legends-of-runeterra.png',	'<div>Après l’annonce d’<a href=\"https://www.connectesport.com/gameward-izidream-rejoignent-lfl-ligue-francaise-league-of-legends-aaa-se-retire/\">IziDream et GameWard en LFL</a>, Riot Games France présente une autre grande nouveauté de l’année 2020 ! La <strong>Division 2</strong> s’annonce comme une nouvelle pierre à l’édifice que constitue la compétition française sur League of Legends. La nouvelle ligue nationale sera diffusée sur l’Equipe, qui en est le partenaire officiel.<br><br></div><div>Tout ce qu’il faut savoir sur la Division 2<br><br></div><div>Dix équipes combattront pendant une année complète pour élire les deux meilleures d’entre elles. Ces dernières affronteront les deux dernières équipes de la LFL pour espérer rejoindre la cour des grands. De la même manière, les deux dernières équipes de la Division 2 affronteront les deux meilleures équipes du Lol Open Tour pour avoir une chance de conserver leur place.<br><br></div><div><strong>Format de la compétition<br></strong><br></div><ul><li>La <strong>Division 2</strong> se déroulera sur une saison complète (et non 2 segments comme la LFL), de mi-janvier à août soit 18 journées de compétition / an.</li><li>Les matchs seront disputés les dimanches après-midi afin de permettre aux joueurs ayant une activité pendant la semaine de participer.</li><li>Les équipes se rencontreront en matchs allers-retours en 1 manche gagnante (2*RR BO1).</li><li>Les 2 meilleures équipes de la ligue nationale seront qualifiées pour le tournoi de promotion en LFL. Les équipes B des équipes LFL n’ont pas la possibilité de participer aux matchs de barrages. Les équipes sélectionnées seront les 2 meilleurs équipes de Division 2 hors équipe B des équipes de LFL.</li><li>Les 2 dernières équipes du classement seront retenues pour les barrages avec l’Open Tour France.</li></ul><div><strong>Les équipes<br></strong><br></div><ul><li>Bastille Legacy</li><li>FC Nantes</li><li>Team Oplon</li><li>TrainHard</li><li>Unfazed Esport</li><li>Zephyr Esport</li><li>Lunary (équipe B de Solary)</li><li>Tony Parker Adequat Academy (équipe B de LDLC)</li><li>M’AZING (équipe B de MCES)</li><li>GamersOrigin Academy (équipe B de GO)</li></ul><div><strong>Promotions/Relégations<br></strong><br></div><div>A partir de 2020, l’Open Tour France devient le passage obligé pour toute nouvelle équipe souhaitant rejoindre la Division 2. En effet, de nouvelles équipes auront désormais la possibilité de rejoindre l’écosystème compétitif de League of Legends via les tournois de qualification de l’Open Tour France.<br><br></div><div>A la fin de la saison, des barrages seront mis en place entre la ligue nationale et l’Open Tour. Les 2 premières équipes de l’OTF joueront en barrage contre les 2 dernières équipes de la Division 2.<br><br></div>\r\n\r\n',	0,	1,	1,	1),
(12,	'2020-02-20 04:00:00',	'Preview de skins : Blackfrost Alistar/Rek&#39;Sai/Renekton + Hextech Sejuani',	'../public/assets/img/news_cover/eager_apprendice1-1 - 856499.jpg',	'Mauris accumsan enim eu erat placerat, non cursus libero pretium. In id nibh ut ipsum cursus accumsan. Vestibulum blandit tortor a sapien commodo, at suscipit ligula lacinia. Duis nec mauris in mi consectetur malesuada ut ut ligula. Ut sed magna sed ligula finibus scelerisque non at arcu. Quisque sodales ligula metus, in placerat tellus rutrum vitae. Nunc volutpat felis at mi efficitur volutpat. Sed ipsum ligula, eleifend sit amet mattis quis, aliquet sed nunc. Aenean non sagittis nunc, vitae scelerisque mauris. Phasellus porttitor sed dolor sit amet pretium. In aliquet eleifend porttitor. In vulputate accumsan turpis placerat lobortis. Curabitur consectetur orci id tortor dignissim luctus. Donec id magna risus. Proin pretium urna eget ultricies elementum.',	0,	1,	1,	1);

DROP TABLE IF EXISTS `news_category`;
CREATE TABLE `news_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `news_category` (`id`, `name`) VALUES
(1,	'League Of Legends'),
(3,	'Legend Of Runeterra'),
(4,	'TeamFight Tactics');

DROP TABLE IF EXISTS `private_msg`;
CREATE TABLE `private_msg` (
  `id` int NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `id_users` int NOT NULL,
  `id_users_sender` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `private_msg_users_FK` (`id_users`),
  KEY `private_msg_users0_FK` (`id_users_sender`),
  CONSTRAINT `private_msg_users0_FK` FOREIGN KEY (`id_users_sender`) REFERENCES `users` (`id`),
  CONSTRAINT `private_msg_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


DROP TABLE IF EXISTS `tutorial`;
CREATE TABLE `tutorial` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `title` varchar(255) NOT NULL,
  `resume` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `cover_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `maj_tuto` date DEFAULT NULL,
  `id_users` int NOT NULL,
  `id_news_category` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tutorial_users_FK` (`id_users`),
  KEY `tutorial_news_category0_FK` (`id_news_category`),
  CONSTRAINT `tutorial_news_category0_FK` FOREIGN KEY (`id_news_category`) REFERENCES `news_category` (`id`),
  CONSTRAINT `tutorial_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tutorial` (`id`, `date`, `title`, `resume`, `text`, `cover_img`, `maj_tuto`, `id_users`, `id_news_category`) VALUES
(1,	'2020-02-22',	'L’eSport dans League of Legends',	'Vous parlez de League of Legends sans vous parler de l’eSport, serait considéré comme un oubli car il s’agit d’une composante importante de ce jeu. Si vous jouez à League of Legends vous avez forcément dû entendre parler d’eSport.',	' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed um, quis porttt ngue nec arcu',	'https://images8.alphacoders.com/105/thumb-1920-1054345.jpg',	NULL,	1,	1),
(2,	'2020-02-22',	'Bien débuter sur League of Legends',	'Vous souhaitez vous lancer dans le jeu le plus joué au monde avec pas moins de 60 millions de joueurs, mais vous avez peur de vous perdre avant même de commencer, voici un guide fait spécialement pour vous afin de comprendre le jeu de Riot Games.',	'<h2>Les bases de League of Legends :</h2><div><br></div><ul><li>Les types de parties</li><li>Le mode didacticiel<br><br></li></ul><div>Cela va vous permettre d’assimiler les bases les plus simples de League of Legends comme <strong>le déplacement, les attaques</strong> et aussi vous faire découvrir la Faille de l’invocateur, la carte de jeu <strong>la plus connue</strong> et donc forcément <strong>la plus joué</strong> ( on reviendra en détail là-dessus un peu plus loin dans l’article). Sur cette Faille de l’invocateur le principe sera simple, il faudra à tout prix tenir votre ligne, vos tourelles et celle de vos alliés, les inhibiteurs et en dernier recours votre Nexus. Si vous perdez votre Nexus, vous perdez la partie.<br><br></div><ul><li>Le mode Joueur contre IA<br><br></li></ul><div>Une étape supplémentaire est nécessaire avant de vous faire joyeusement étriper par d’autres joueurs. Commencez donc quelques parties contre des bots de niveau Facile pour vraiment <strong>prendre le jeu en main</strong> puis passez au bot Intermédiaire. Le niveau se corse, mais reste bien éloigné d’une simple partie contre d’autres joueurs. Un autre niveau de bot est à l’étude par Riot Games mais cela n’est encore qu’à l’étape de projet, on en reparlera sûrement plus tard, dans les semaines ou mois à venir.<br><br></div><ul><li>Le Dominion<br><br></li></ul><div>Probablement l’un des modes les moins joués mais pas forcément le moins intéressant. Les parties sont <strong>plus courtes</strong>, ce qui est parfait si vous n’avez pas énormément de temps devant vous ( entre 15 et 20 minutes par partie environ ). Le principe est simple sur le papier, il suffit de capturer des points, un peu comme la capture de territoire dans la plupart des FPS. Là aussi il y a seulement une seule carte nommée <strong>La Brèche de cristal</strong>. Ce mode de jeu a depuis été supprimé par Riot Games.<br><br></div><ul><li>L’ARAM<br><br></li></ul><div>All Random All Mid voilà ce que désigne l’acronyme ARAM. C’est l’un des modes de jeu le plus aléatoire possible. Une seule ligne droite, un champion aléatoire et c’est parti pour l’affrontement. Si vous débutez, ce mode est clairement à éviter car jouer un personnage que vous n’avez jamais essayé peut s’avérer très vite frustrant. Là aussi une seule carte nommée <strong>L’Abîme hurlant</strong>.<br><br></div><div>Votre champion débute <strong>niveau 3</strong>, avec un peu plus d’or que sur une partie normale. On ne peut pas retourner à la base pour se soigner ou pour acheter un item. Pour pouvoir le faire il faut obligatoirement <strong>mourir</strong>. Le long de chaque camp, il y a des icônes de soin qui vous rendent quelques points de vie et de mana.<br><br></div><ul><li>Le mode classique et le mode classé<br><br></li></ul><div>Et voilà nous y sommes, vous avez explosé assez de bots pour le reste de votre vie, vous vous sentez fin prêt pour vous frotter à d’autres joueurs, c’est parti lancez-vous.<br><br></div><div>Le mode classique :<br><br></div><div>Sur une petite carte ( Forêt torturée ) pour faire du 3vs3 ou sur la plus grande ( la célèbre Faille de l’invocateur) pour du 5vs5, vous lancez donc votre partie.<br><br></div><div>Le mode classé :<br><br></div><div>Vous avez une centaine de parties derrière vous, vous avez atteint le fameux niveau 30 et avez acheté plus de 16 champions, vous êtes donc fin prêt pour les parties classées, pour passer du rang bronze jusqu’au rang diamant voire plus.<br><br></div><div>À partir de maintenant nous allons nous concentrer sur le mode classique et en 5vs5 de la faille de l’invocateur, il s’agit du mode iconique du jeu de Riot Games.<br><br></div><div><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:258,&quot;url&quot;:&quot;http://parisesport.com/wp-content/uploads/2017/04/faille-lol-300x258.jpg&quot;,&quot;width&quot;:300}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"http://parisesport.com/wp-content/uploads/2017/04/faille-lol-300x258.jpg\" width=\"300\" height=\"258\"><figcaption class=\"attachment__caption\"></figcaption></figure></div><ul><li>Le positionnement<br><br></li></ul><div>Comme vous le voyez ci-dessus, la carte se divise <strong>en plusieurs parties</strong> : le haut, le milieu, le bas et la partie que l’on appellera la jungle c’est-à-dire les espaces verts entre chaque partie. Avant le lancement de la partie, chacun choisit où il souhaite jouer sachant que la majorité des parties se déroule <strong>de cette façon</strong> : une personne qui défend la partie haute, une celle du milieu, deux personnes pour celle du bas et la dernière qui ira se promener dans cette jungle tout au long de la partie. Pour la ligne du haut un personnage assez résistant est requis, pour la ligne du milieu le plus souvent un mage ou un assassin est présent. Pour la ligne du bas, il faut donc choisir un personnage qui fait de gros dégâts en jouant sur la distance et un support. Pour la jungle, le personnage est choisi en fonction du rôle qu’on veut lui donner ( être résistant, faire des dégâts).<br><br></div><ul><li>Le déroulement de la partie<br><br></li></ul><div>Au début de la partie, il va falloir défendre sa tourelle tout en tentant de détruire celle de l’adversaire. La plupart du temps ça commence en round d’observation et en farm de creeps. Certaines parties peuvent très vite basculer dans la folie si une des deux équipes se risque à bousculer les codes traditionnels des parties. Puis lorsqu’une tourelle d’un des camps cède, il faut se replier à la suivante. Puis il restera encore une dernière tourelle si la deuxième cède à son tour. Si vous perdez vos trois tourelles votre inhibiteur est exposé et le perde commencera à sérieusement mettre à mal votre voie car si votre inhibiteur est détruit, les adversaires se verront dotés de super-sbires. Si ce scénario se produit sur vos trois voies, la partie est très mal engagée pour votre équipe car il ne restera plus que deux tourelles pour protéger votre Nexus.<br><br></div><div>Tout au long de la partie, il faudra tenter de s’accaparer du maximum de petit bonus susceptible de faire pencher la balance de votre côté. Les dragons élémentaires de 4 types qui apparaissent tous les 6 minutes vous accorderont <strong>un bonus</strong> pour le reste de la partie :<br><br></div><div>– le dragon de feu : Il octroie 8/16/24% de dégâts d’attaque et de puissance<br><br></div><div>– le dragon de terre : Il octroie 10/20/30% de dégâts bruts aux monstres épiques et aux tourelles<br><br></div><div>– le dragon d’eau : Il restaure 10% de vos points de vie et de manas manquants toutes les 18/12/6 secondes<br><br></div><div>– le dragon d’air : Il donne un bonus de vitesse hors combat de 15/30/45<br><br></div><div>Puis au bout de 35 minutes de parties les dragons élémentaires laissent leurs places au dragon ancestral. Il est plus difficile à tuer mais offre des bonus très importants.<br><br></div><div>Puis de l’autre côté, se trouve le Baron Nashor le plus puissant des monstres. Le battre vous donnera un gros avantage pendant 3 minutes et 30 secondes. Il vous donne 40 en puissance et dégâts d’attaque et un boost aux sbires lorsque vous êtes proches d’eux, il vous permet de revenir à la base en 4 secondes au lieu de 8 avec le rappel.<br><br></div><ul><li>Les différents sorts<br><br></li></ul><div>Pour chaque partie, vous pourrez choisir<strong> 2 sorts</strong> ( avec un temps de relance allant de 2 à 3 minutes ) parmi la dizaine de proposés.<br><br></div><div><strong>Le Flash</strong>: il permet à votre champion de se téléporter sur une courte distance, il est très utilisé car il permet de se sortir de situations mal embarqué ou même de surprendre l’ennemi en l’utilisant pour attaquer.<br><br></div><div><strong>La Téléportation</strong>: elle permet à votre champion de se téléporter sur les tourelles, les balises et sur les monstres. Il est très souvent utilisé par la ligne du haut.<br><br></div><div><strong>Le Soin</strong>: il est généralement pris par la personne distance sur la ligne du bas pour se soigner et possiblement soigner votre support.<br><br></div><div><strong>L’Embrasement</strong>: il est souvent utilisé sur la ligne du milieu, il permet de taper en soutien de votre champion et réduit les soins reçus sur la cible de 50% pour quelques secondes.<br><br></div><div><strong>Fantôme : </strong>Il permet de courir à travers les unités et d’augmenter votre vitesse de déplacement pour 10 secondes.<br><br></div><div><strong>La Clarté : </strong>Très peu joué, il permet de rendre 50% de son mana à votre champion et 25% aux alliés proches.<br><br></div><div><strong>La Purge : </strong>Il dissipe tous les effets négatifs sur votre champion et réduit de 65% de nouveaux effets négatifs.<br><br></div><div><strong>Le Châtiment : </strong>Il est utilisé seulement par les junglers car il permet d’infliger de lourds dégâts aux monstres tout en vous soignant légèrement.<br><br></div><div><strong>La Barrière : </strong>Le plus souvent utilisée au Mid, elle offre à votre champion un bouclier temporaire pour vous protéger.<br><br></div><div><strong>La Fatigue : </strong>Souvent utilisé par le support, elle permet de ralentir la cible adverse, de réduire son armure et de baisser son attaque.<br><br></div><div>&nbsp;<br><br></div><div><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:70,&quot;url&quot;:&quot;http://parisesport.com/wp-content/uploads/2017/04/sort-lol.png&quot;,&quot;width&quot;:422}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"http://parisesport.com/wp-content/uploads/2017/04/sort-lol.png\" width=\"422\" height=\"70\"><figcaption class=\"attachment__caption\"></figcaption></figure></div><ul><li>Runes, maîtrises, équipements et monnaies<br><br></li></ul><div>À chaque partie vous allez gagner des <strong>Points d’Influence</strong> ( PI ). Ces points vont vous servir à acheter d’autres champions mais aussi des runes qui vont vous apporter différentes statistiques pour <strong>améliorer votre champion</strong>. Au fur et à mesure que vous montez en niveau, vous allez aussi gagner <strong>des points à répartir</strong> dans des tableaux et cela constituera <strong>votre maîtrise</strong>. Au cours de la partie, au fil de l’or que vous gagnez, vous revenez à la base pour acheter de l’équipement en fonction de votre classe dans un premier temps ( les objets conseillés seront une bonne aide au début ) puis avec l’expérience que vous accumuleriez au cours du temps vous réussirait à vous adapter au déroulement des parties et aux différents adversaires. Vous pouvez aussi acheter tout cela avec des <strong>Riot Points</strong> ( RP ) mais pour ces points il vous faudra dépenser de <strong>l’argent réel</strong>.<br><br></div><h2>Avec quels champions du Nexus débuté :</h2><div>théoriquement vous pouvez débuter avec <strong>n’importe quels personnages</strong> mais il est vrai que certains sont plus faciles à prendre en main mais pas pour autant à maîtriser complètement. Je vais quand même vous en conseillez trois :<br><br></div><div>Garen :<br><br></div><div><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:150,&quot;url&quot;:&quot;http://parisesport.com/wp-content/uploads/2017/04/garen-lol-150x150.jpg&quot;,&quot;width&quot;:150}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"http://parisesport.com/wp-content/uploads/2017/04/garen-lol-150x150.jpg\" width=\"150\" height=\"150\"><figcaption class=\"attachment__caption\"></figcaption></figure></div><div>&nbsp;<br><br></div><div>il inflige de bons dégâts, il est suffisamment résistant, c’est idéal pour un débutant même si le fait d’être au corps-à-corps peut s’avérer compliqué. Il se joue au Top. On part sur la Téléportation et l’Embrasement comme sorts. Pour les runes, on part sur 9x Grande Marque de Pénétration d’armure, 9x Grand Sceau d’armure, 9x Grand Glyphe de Résistance magique et 3x Grande Quintessence de Dégâts d’attaque. Garen est très fort en début de partie contre un autre champion corps à corps mais cela s’avère déjà plus délicat contre un champion distance.<br><br></div><div>&nbsp;<br><br></div><div>Teemo :<br><br></div><div><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:150,&quot;url&quot;:&quot;http://parisesport.com/wp-content/uploads/2017/04/teemo-lol-150x150.jpg&quot;,&quot;width&quot;:150}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"http://parisesport.com/wp-content/uploads/2017/04/teemo-lol-150x150.jpg\" width=\"150\" height=\"150\"><figcaption class=\"attachment__caption\"></figcaption></figure></div><div>&nbsp;<br><br></div><div>un gentil petit écureuil d’un côté, un personnage redoutable et souvent détesté par les adversaires de par son invisibilité et surtout de ses champignons. Il mise aussi beaucoup sur son auto-attaque, il est donc idéal pour un débutant. Il se joue au Top également. Et là aussi on part sur la Téléportation et l’Embrasement. Pour les runes, on choisit 9x Grand Sceau d’armure, 9x Grand Glyphe de Résistance magique, 9x Grande Marque de Pénétration Hybride et 3x Grande Quintessence de Puissance. Teemo est lui aussi très puissant en début de partie grâce au poison sur son auto-attaque.<br><br></div><div><br></div><div>Annie :<br><br></div><div><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image&quot;,&quot;height&quot;:150,&quot;url&quot;:&quot;http://parisesport.com/wp-content/uploads/2017/04/annie-lol-150x150.jpg&quot;,&quot;width&quot;:150}\" data-trix-content-type=\"image\" class=\"attachment attachment--preview\"><img src=\"http://parisesport.com/wp-content/uploads/2017/04/annie-lol-150x150.jpg\" width=\"150\" height=\"150\"><figcaption class=\"attachment__caption\"></figcaption></figure></div><div>&nbsp;<br><br></div><div>elle étourdit fréquemment ses adversaires puis leur envoie son ours en même temps, autant vous dire qu’elle ne plaisante pas, et qu’une fois étourdis vos chances de survie sont minces. Elle se joue au Mid la plupart du temps avec quelques apparitions en support. On part sur le Flash et l’Embrasement. Pour les runes, on vise 9x Grand Glyphe de Résistance magique, 9x Grande Marque de Pénétration magique, 9x Grand Sceau de PV/niveau et 3x 3x Grande Quintessence de Puissance.<br><br></div><h2><br></h2><h2><br></h2><div>&nbsp;<br><br></div><h2>Le vocabulaire spécifique à League of Legends :</h2><div>Le but ici est de vous apprendre le<strong> vocabulaire de base</strong> pour vous faire comprendre et comprendre vos coéquipiers<br><br></div><div>Lane : il s’agit des voies/lignes sur la carte ( haut=top, milieu=mid et bas=bot )<br><br></div><div>Aoe : il s’agit d’un sort qui peut cibler une zone et pas seulement une seule cible<br><br></div><div>Back : il s’agit du fait de revenir à la base pour régénérer ses points de vie, son mana ou d’acheter de l’équipement<br><br></div><div>Buff : c’est un effet de court terme ou de long terme qui s’obtient en tuant le Baron Nashor, sorte de dragon géant, ou les divers dragons qui apparaissent plusieurs fois au même endroit durant une partie. Dans la jungle il y a aussi un buff bleu et un buff rouge mais qui sont la plupart du temps réservés à la personne qui s’occupera de cette partie.<br><br></div><div>Bush : il s’agit des buissons qui longent les lanes, vous êtes invisibles aux yeux de l’ennemi une fois à l’intérieur<br><br></div><div>Creep/sbire : il s’agit des monstres qui vont s’affronter entre eux sur les lanes.<br><br></div><div>Last hit : action qui consiste à mettre le coup final au creep adverse pour récupérer de l’or<br><br></div><div>Ward : c’est une sorte de balise de vision, elle vous permet par exemple de voir l’intérieur des bushs ennemis.<br><br></div><div>Farm : Le fait de tuer le plus de creeps possible pour récupérer le plus d’or.<br><br></div>',	'https://lol-stats.net/uploads/SWftuXWLeYAEQo4b0JbrxOVxrOCSg2fmIEi07fdM.jpeg',	'2020-02-24',	1,	1),
(3,	'2020-02-22',	'Choisir son rôle',	'Dans League of Legends, à chaque début de partie, vous devrez sélectionner un champion. Sur la carte de la faille de l’invocateur qui se joue en 5 contre 5, vous devrez réfléchir avant la sélection du champion au poste que vous voudrez occuper. ',	'Bienvenue ! Dans ce guide je vais couvrir ce que je considère être les concepts principaux de League of Legends et vous aider à bien débuter sur LoL. Ce guide est pour les débutants sur LoL et tous ceux qui ont du mal à comprendre les champions, ne sont pas sûrs des objets à acheter ou ne sont pas sûrs de comment arriver du point « A » sortir de la fontaine au point « B », détruire le Nexus ennemi. Chaque chapitre utilise des termes et concepts introduits dans les précédents chapitres. Ce guide devrait être suffisamment clair pour que vous  puissiez mettre cette page en favori et lire le guide en plusieurs fois, à votre rythme. Premièrement si ce n’est pas déjà fait vous pouvez vous inscrire au jeu ICI. Je vous conseille de faire le tutoriel avant de lire ce guide. Les équivalents anglais de beaucoup de termes seront également présent car ils vous serviront beaucoup, sachant que la communauté LoL utilise principalement l’anglais !',	'https://images4.alphacoders.com/659/thumb-1920-659047.png',	NULL,	1,	1),
(4,	'2020-02-22',	'Les différents postes',	'Définition des 5 postes à pourvoir dans une partie standard (5v5) de League of Legends. Le nom de chaque poste est donné en fonction de la ligne que votre champion va occuper en début de game.  Il vous sera aussi donné une liste de champions non exhaustive que vous pourrez rencontrer fréquemment sur les différentes voie.',	' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sed um, quis porttt ngue nec arcu',	'https://images7.alphacoders.com/331/thumb-1920-331608.jpg',	NULL,	1,	1),
(5,	'2020-02-26',	'Notre guide pour bien débuter',	'Il est le jeu vidéo de type « autochess » le plus récent mais aussi le plus populaire : Teamfight Tactics, dérivé de League of Legends, n\'arrête pas de gagner en visibilité. Mais comment y joue-t-on ? On vous aide à débuter dans ce jeu qui demande attention et stratégie, avec 7 astuces. Suivez le guide.',	'',	'https://cdn-www.bluestacks.com/bs-images/30a03ba743c297504a9a6dde78dce771.png',	NULL,	29,	4),
(6,	'2020-02-26',	'Les erreurs à ne pas commettre',	'Combat Tactique (ou Teamfight Tactics) est un jeu assez complexe, et qui peut être difficile à prendre en main au début. Afin de vous guider dans votre progression sur ce jeu de stratégie, nous vous proposons 7 conseils sur des erreurs basiques que nous avons tous déjà expérimenté, afin de les identifier et de commencer à les corriger.',	'',	'https://areajugones.sport.es/wp-content/uploads/2019/06/Teamfight-Tactics-guia-personajes.jpg',	NULL,	1,	4),
(7,	'2020-02-26',	'Le guide avancé de l\'économie',	'La gestion de son or est un des facteurs les plus importants de Teamfight Tactics. Voici tous nos conseils afin de mieux maîtriser votre économie.\r\n',	'',	'https://cdn.mos.cms.futurecdn.net/Q8oCD2MkPgvas6sSb7k52Z.jpg',	NULL,	1,	4);

DROP TABLE IF EXISTS `username_game`;
CREATE TABLE `username_game` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username_game` varchar(255) DEFAULT NULL,
  `id_list_games` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username_game_list_games_FK` (`id_list_games`),
  KEY `username_game_users0_FK` (`id_users`),
  CONSTRAINT `username_game_list_games_FK` FOREIGN KEY (`id_list_games`) REFERENCES `list_games` (`id`),
  CONSTRAINT `username_game_users0_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `username_game` (`id`, `username_game`, `id_list_games`, `id_users`) VALUES
(1,	'zKannkissssssssss',	1,	1),
(2,	'ssssssssssssssssKannki2z',	2,	1),
(3,	'ssssssssssssssssKannkei3',	3,	1);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '/public/assets/img/users_avatars/default.png',
  `key_activation` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `active` int NOT NULL DEFAULT '0',
  `id_list_rank` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `users_list_rank_FK` (`id_list_rank`),
  CONSTRAINT `users_list_rank_FK` FOREIGN KEY (`id_list_rank`) REFERENCES `list_rank` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `users` (`id`, `date`, `username`, `mail`, `password`, `avatar`, `key_activation`, `active`, `id_list_rank`) VALUES
(1,	'2020-04-27 21:43:12',	'Anthony',	'monmail@gmail.com',	'$2y$10$T/hE6LylNzBRnNQ.7ip3OuKY8THZ7GUc25aBa8BpryrPd2E6DZbHS',	'/public/assets/img/users_avatars/default.png',	'2e3e8ef1bc1e847697bf9e2a301e67a7',	1,	4),
(2,	'2020-03-13 11:06:40',	'John Doe',	'envoie@gmail.com',	'$2y$10$h.uk8Pa414ozHs/3/b7xLezaEiYauPDw6zNHiKQ7sSTetiaXwYa9S',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(27,	'2020-03-13 11:06:40',	'Maxime',	'maxime@gmail.com',	'$2y$10$ZbGCkCE/b0ApZSizs0IPguTgCijJRiURQRaL2pR7bG4yExoOqmCk2',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(28,	'2020-03-13 11:06:40',	'John',	'iojojoi@mail.com',	'$2y$10$1NULeHKbRPJn5aODEbzQa.VAd.ur3wmGvMOXUeyXf2SZOp1IbNHCm',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(29,	'2020-03-13 11:06:40',	'Load',	'aaza@mail.com',	'$2y$10$LVhdlj9kOgjA3Azyf1bC3Ok8WUpVx9rC1OC9LmJNDp1c8/GAiYT/.',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(30,	'2020-03-13 11:06:40',	'test',	'aaza@mail.com',	'',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(31,	'2020-03-13 11:06:40',	'Salut',	'salut@mail.com',	'$2y$10$JwkTUR31idvsn2qHtD3/MuGyW5cHqEXn3lKsK4jRRMAmjO0V1ll3S',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(32,	'2020-03-13 11:06:40',	'kkkkk',	'kkk@mail.com',	'$2y$10$LmiTIl3DPw9l1QrFQptj9uIicXr1AJ9l9kgOmV2ty9Ctt86lzrgVa',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(36,	'2020-03-13 11:06:40',	'Kold',	'kold@mail.com',	'$2y$10$j71VTnJRSy3QCyayGElXQ.x7O0Ukwf.8JcG9yQiUt.qREgDV8a.bS',	'/public/assets/img/users_avatars/default.png',	'',	2,	1),
(37,	'2020-03-13 11:06:40',	'Koi',	'koi@mail.com',	'$2y$10$ZZi8d9E3S10sATRUcZfo8utIP4nlBEysK4BLVYGayae5d7T4HSPpy',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(38,	'2020-03-13 11:06:40',	'Testeur',	'testeur@mail.com',	'$2y$10$vf79xNNiEmvPOq47KOCWsu1/MhA/N5fO6c.HDN0H/jAvMrnLwc68S',	'/public/assets/img/users_avatars/default.png',	'',	1,	1),
(41,	'2020-03-13 11:06:40',	'Sakor',	'sakor@mail.com',	'$2y$10$bjrPKueJvmYU6gB.q.tgfuA0.1MQt1uJUUXMLziykE9PicyAoCJq.',	'/public/assets/img/users_avatars/default.png',	'2e3e8ef1bc1e847697bf9e2a301e67a7',	1,	1),
(42,	'2020-03-13 11:06:40',	'Users',	'sadagag790@nuevomail.com',	'$2y$10$4r6km.GRpkNvWDA5PSEOxelcKfUsQLBFuG592SGk8z9mnFQLt1kzu',	'/public/assets/img/users_avatars/default.png',	'c91c53f7530d9c3a95cd06b725e13056',	0,	1),
(43,	'2020-03-13 11:06:40',	'loader',	'digam74582@x3mailer.com',	'$2y$10$2G7k5.aLh25gIEL4ZRz1Z.AJXPjM4jvtp5G/yy/ZgfQQWQl8asKFu',	'/public/assets/img/users_avatars/default.png',	'7937f5c22423ce3b6e82d2de4f68bb85',	0,	1),
(44,	'2020-03-13 11:06:40',	'Koaster',	'koaser@gmail.com',	'$2y$10$BtEjEd/Vc6wA7lFn9LcJa.Js1wSLIUhVDEuMr/OW07nVjpDLjZfKO',	'/public/assets/img/users_avatars/default.png',	'321fbac7306a05098357c4992d9384f7',	1,	1),
(45,	'2020-03-13 11:06:40',	'Sodor',	'sodor@gmail.com',	'$2y$10$JcWZJQ.n3aqurtxWMJgHE.uOIEHdguNR3zRBOY2Vrn9FcCcEoI9KO',	'/public/assets/img/users_avatars/default.png',	'ad3b5a5c7605be50cf29c8c03e946d73',	0,	1),
(46,	'2020-03-13 11:06:40',	'sacha',	'sacha@gmail.com',	'$2y$10$oWKDAHtSTCM7OGGfnNt6f.4/br2T3PLkVhfuk5ENuDQDdSbUsoBS.',	'/public/assets/img/users_avatars/default.png',	'569f6782b54548e916e4777017ad6bb0',	0,	1),
(47,	'2020-03-13 11:06:40',	'Mother',	'mot@gmail.com',	'test',	'/public/assets/img/users_avatars/default.png',	'1004abae35bdffc58ef06a93eb708c90',	0,	1),
(48,	'2020-03-13 11:06:40',	'Storm',	'azeazea@mail.com',	'$2y$10$NC6mTaGtljT7H6soktwYieZ/kPMTF.ASpe5UgjYGjws6KP2qVpRt2',	'/public/assets/img/users_avatars/default.png',	'e2e1ee91dd1efbced641d32d62bebe9d',	0,	1),
(49,	'2020-03-13 11:06:40',	'St6-b',	'ste@mail.com',	'$2y$10$7Z025bbq4myoWN8gKWr8Ouea4vj9hBkhwryhgjq8WlOJYEh/.nOUi',	'/public/assets/img/users_avatars/default.png',	'235d825f24c11b0be287e4eea3096b9c',	0,	1),
(50,	'2020-03-13 11:06:40',	'qsdsqdsq',	'sqdq@mail.com',	'$2y$10$xbP3b2JdCemIUiodBKF3/e7Qn4eJRU1SRNTuiWWpQsGZYElgCWEFi',	'/public/assets/img/users_avatars/default.png',	'b07ad8b062b11f35e781c16394393197',	0,	1),
(51,	'2020-03-13 11:06:40',	'sakor',	'dzaeaze@mail.com',	'$2y$10$PMR50fNu2tcHP2gUgEVbLO2L73KSTaGC7g3V3qNXFPVeVNJs.VPBa',	'/public/assets/img/users_avatars/default.png',	'd95748aa81fbb2ff1717e6fb4464cd8b',	0,	1),
(54,	'2020-03-13 21:12:02',	'Joko',	'saa@gmail.com',	'$2y$10$bZU6kp47nBHPKwJia7fZ1OwOrMD6pys2DimRXeCoUZJixUvOcHd5.',	'/public/assets/img/users_avatars/default.png',	'4bbd979f5d82f79f06a56e3ad0a1f2c3',	0,	1);

-- 2020-05-08 14:42:08
