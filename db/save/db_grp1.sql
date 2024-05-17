-- phpMyAdmin SQL Dump
-- version 5.0.4deb2+deb11u1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 17, 2024 at 09:03 AM
-- Server version: 10.5.23-MariaDB-0+deb11u1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_grp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE `connexion` (
  `id` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `passwd` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`id`, `login`, `passwd`, `admin`) VALUES
(12, 'admin', 'echooo', 1),
(16, 'julie', '$passwd', 0),
(34, 'Teva', 'Philippe', 0),
(35, 'chloe', 'chloe', 0),
(37, 'tempo', 'tempo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dialogue`
--

CREATE TABLE `dialogue` (
  `id` float NOT NULL,
  `id_histoire` int(11) NOT NULL,
  `id_personnage` int(11) NOT NULL,
  `texte` varchar(500) NOT NULL,
  `id_suite_dialogue_1` int(11) NOT NULL,
  `id_suite_dialogue_2` int(11) NOT NULL,
  `id_suite_dialogue_3` int(11) NOT NULL,
  `dé` tinyint(1) NOT NULL,
  `premier_dialogue` tinyint(1) NOT NULL,
  `id_dialogue_necessaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dialogue`
--

INSERT INTO `dialogue` (`id`, `id_histoire`, `id_personnage`, `texte`, `id_suite_dialogue_1`, `id_suite_dialogue_2`, `id_suite_dialogue_3`, `dé`, `premier_dialogue`, `id_dialogue_necessaire`) VALUES
(1, 1, 1, 'Voici le premier dialogue', 2, 0, 0, 0, 1, 0),
(2, 1, 2, 'Ceci est le 2nd dialogue', 3, 4, 0, 1, 0, 0),
(3, 1, 3, '3ème', 4, 0, 0, 0, 0, 0),
(4, 1, 1, 'Je suis le 4eme.', 5, 0, 0, 0, 0, 0),
(5, 1, 1, 'Je suis le 5ème', 11, 12, 0, 0, 0, 0),
(11, 1, 1, 'Je nécessite l\'id 3 !', 0, 0, 0, 0, 0, 0),
(12, 1, 1, 'Je ne nécessite pas le dialogue 3.', 0, 0, 0, 0, 0, 0),
(13, 2, 1, 'Nous suivons l’histoire d’une jeune femme du nom d\'Ophélia, née avec les Oprimales, dans les galeries sousterraine de la planète Opéria.', 14, 0, 0, 0, 1, 0),
(14, 2, 1, 'Essayant de se protéger des tempêtes de sable qui font ravages à la surface, les peuples ont dû trouver de nouveaux lieux pour vivre.', 15, 0, 0, 0, 0, 0),
(15, 2, 1, 'Elle a grandi dans une famille modeste et pourtant bien heureuse, ils vivaient près des mines de ressources pour les vendre aux Opales, la société vivant sous l’eau, dans une ville bien mieux entretenue et modernisée que la leur. ', 16, 17, 18, 0, 0, 0),
(16, 2, 1, 'Elle vit avec sa mère et son père, aillant la chance d’être fille unique, elle peut avoir plus de nourriture ou de jeu pour elle, ses parents étant pauvres.', 19, 0, 0, 0, 0, 0),
(17, 2, 1, 'Elle vit avec ses parents et un grand frère, souvent très protecteur avec elle, mais très joueur également. L’avantage d’avoir son grand frère, c\'est qu’étant plus âgé, il travaille déjà à la mine pour aider ses parents financièrement.', 19, 0, 0, 0, 0, 0),
(18, 2, 1, 'Elle vit avec ses parents et sa sœur jumelle. Elle a toujours eu une amie avec qui jouer et malgré le manque d’argent, elle ne manquait pas de s’amuser avec sa sœur sans jouet.', 19, 0, 0, 0, 0, 0),
(19, 2, 1, 'Ophélia vivait ainsi pendant 19 ans, dans la joie, malgré leur condition de vie non optimale. Ils se sentaient tous proches les uns des autres, tous les Oprimales se voyaient comme une grande famille.', 20, 0, 0, 0, 0, 0),
(20, 2, 1, '19ans plus tard, Ophélia se trouvait dans leur maison pour préparer le repas de toute la famille en \r\nattendant qu’ils rentrent de la mine ne pouvant malheureusement pas travailler à son tour à cause \r\nd’un problème pulmonaire. Cette jeune femme :', 21, 22, 0, 0, 0, 0),
(21, 2, 1, 'Est une magnifique femme de taille moyenne avec une musculature déjà dessinée, des cheveux roux foncé quelque peu bouclés et de magnifiques yeux verts, mais au visage plus froid et renfermé.', 23, 0, 0, 0, 0, 0),
(22, 2, 1, 'Est une très belle jeune femme, d’une grande douceur, avec un tour de taille fin et élégant, des cheveux blonds, mis longs et très lisses ainsi que de beaux yeux noisette.', 23, 0, 0, 0, 0, 0),
(23, 2, 1, 'Soudainement, un grand tremblement se fait ressentir dans toutes les galeries, Ophélia se rattrape de justesse sur la table à manger avant de tomber à terre.', 24, 0, 0, 0, 0, 0),
(24, 2, 1, 'Quand ce tremblement s’est terminé, la jeune \r\nfemme ressenti une sensation bien étrange, de douleur ou de perte. Elle se précipite à l’extérieur de sa \r\nmaison et cours au niveau des mines.', 25, 0, 0, 0, 0, 0),
(25, 2, 1, 'Un effondrement est à l’origine de cette secousse. Tous les mineurs ont péri dans cette catastrophe, ce jour-là Ophélia perdit chaque membre de sa famille.', 26, 0, 0, 0, 0, 0),
(26, 2, 1, 'Ce tragique événement bouleverse gravement la jeune femme. Son caractère et sa vision de la vie ont été changés. Tout ce qu’elle souhaite à présent, c\'est se venger des Opales et des conditions de travail qu’ils imposaient à son peuple.', 27, 28, 0, 0, 0, 0),
(27, 2, 1, 'Ophélia veut se venger à tout prix, quitte à ce que des gens en souffrent, ce serait même un bonus.', 29, 0, 0, 0, 0, 0),
(28, 2, 1, 'Ophélia veut se venger, mais surtout protéger les autres membres de sa communauté. Elle fera de son mieux pour trouver une solution qui arrangera tout le monde.', 29, 0, 0, 0, 0, 0),
(29, 2, 1, 'La jeune Ophélia prend finalement la décision de rejoindre le peuple des rebelles, vivant à la surface des collines, ils se nomment les Opérials. Elle souhaite trouver de l’aide pour accomplir sa vengeance.', 30, 0, 0, 0, 0, 0),
(30, 2, 1, 'Elle se prépare, mais est consciente que ce qui l’attend est loin d’être facile.', 31, 0, 0, 0, 0, 0),
(31, 2, 1, 'Elle devra affronter les tempêtes pour réussir à franchir ses collines, savoir comment s’en protéger et survivre plusieurs nuits à l’extérieur. ', 32, 0, 0, 0, 0, 0),
(32, 2, 1, 'Une fois son équipement préparé et ses au revoir faits à ses amis, la jeune femme sort enfin des souterrains.', 33, 35, 0, 1, 0, 0),
(33, 2, 1, 'La voilà à la surface, en sortant, elle a la chance d’assister à une magnifique danse des aurores boréales couleur lavande, le sable étant retombé, le ciel est dégagé. Étant sorti pendant la nuit, elle décide d’en profiter pour avancer un peu avant que les tempêtes ne reprennent.', 32, 0, 0, 0, 0, 0),
(34, 2, 1, 'Elle voit au loin sa destination, étant dans un désert de sable couleur quartz rose, les collines sont très visibles. Ophélia arrivera à sa destination au bout de 4 jours. Son trajet se fait sans trop d’encombre, elle a pu dormir à l\'abri, mais a subi de grosses tempêtes de sable.', 37, 0, 0, 0, 0, 0),
(35, 2, 1, 'Une fois à la surface, à peine la porte franchie, une tempête de sable éclate. Ophélia se retrouve à devoir se couvrir le visage pour survivre au sable. La tempête ne se calmera pas avant plusieurs heures, elle se voit affronter cette météo longtemps en avançant petit à petit avant de trouver un abri suffisamment convenable pour dormir tout juste quelques heures.', 36, 0, 0, 0, 0, 0),
(36, 2, 1, 'Cette météo déchainée durera plusieurs jours, avec une journée où elle devra s’arrêter pour s’abriter de la tornade de sable qui fait ravage. Il lui faudra 7 jours pour atteindre le village des Opérials.', 37, 0, 0, 0, 0, 0),
(37, 2, 1, 'Enfin arrivée à destination, la météo est clémente, dans ses hauteurs les tempêtes sont bien plus \r\ntolérables, cependant elle doit encore faire attention à sa respiration avec ses problèmes pulmonaires.', 38, 0, 0, 0, 0, 0),
(38, 2, 1, 'La jeune Ophélia arrive dans un petit village au croisement de plusieurs collines qui les protègent, ce village n’est pas très riche ni pauvre, ils se suffisent à eux-mêmes.', 39, 0, 0, 0, 0, 0),
(39, 2, 1, 'Les habitations sont bien \r\nconvenables, bien décorées et suffisamment solide pour résister au vent. On peut apercevoir qu’ils \r\narrivent à chasser suffisamment de nourriture pour nourrir chaque membre du peuple.', 40, 0, 0, 0, 0, 0),
(40, 2, 1, 'Le peuple l’aperçoit assez vite, surtout avec son accoutrement bien différent de leur habitude. Ils sont habillés avec des habits bien chauds et surtout de couleur plus vive pour se fondre dans la couleur du quartz rose du sable.', 41, 0, 0, 0, 0, 0),
(41, 2, 1, 'À contrario, les Oprimales travaillant dans les mines ont tendance à être habillés en sombre pour minimiser la visibilité des taches sur les vêtements. Leur chef approche d’Ophélia et lui demande :', 42, 43, 0, 1, 0, 0),
(42, 2, 1, ' Elle est vite et bien accueillie par le peuple.', 44, 0, 0, 0, 0, 0),
(43, 2, 1, 'Elle devra faire ses preuves pour être acceptée par ce peuple.', 49, 0, 0, 0, 0, 0),
(44, 2, 1, 'Bonjour, que fais-tu ici ? Pouvons-nous t’aider ?', 45, 46, 0, 0, 0, 0),
(45, 2, 1, 'Réponse sincère et amicale. ', 46, 0, 0, 0, 0, 0),
(46, 2, 1, 'Bonjour, je m’appelle Ophélia et j’étais à la recherche de votre peuple.', 47, 0, 0, 0, 0, 0),
(47, 2, 1, 'Eh bien… soit la bienvenue, je m’appelle Alex, je suis le chef de ce peuple, si tu m’en disais un peu plus. ', 48, 0, 0, 0, 0, 0),
(48, 2, 1, 'Sur ses paroles, Ophélia est accueillie par les membres du village et pourra choisir son habitat. ', 59, 0, 0, 0, 0, 0),
(49, 2, 1, 'Bonjour, que fais-tu, étrangère ? Personne n’entre dans nos terres sans notre accord. ', 50, 51, 0, 0, 0, 0),
(50, 2, 1, 'Réponse douce et amicale pour adoucir la situation.', 52, 0, 0, 0, 0, 0),
(51, 2, 1, 'Réponse franche et agressive.', 53, 0, 0, 0, 0, 0),
(52, 2, 1, 'Pardon pour mon intrusion, j’étais à la recherche de votre peuple. ', 54, 0, 0, 0, 0, 0),
(53, 2, 1, 'Pourtant je suis là, alors autant que je vous sois utile.', 54, 0, 0, 0, 0, 0),
(54, 2, 1, 'Bien, viens discuter avec moi. Je suis Alex, le chef de ce peuple. On va voir en quoi tu peux te rendre utile. ', 55, 0, 0, 0, 0, 0),
(55, 2, 1, ' Ok.', 56, 0, 0, 0, 0, 0),
(56, 2, 1, 'Sur ses mots, la jeune femme entre dans le village, dévisagée par la population très surprises.', 57, 0, 0, 0, 0, 0),
(57, 2, 1, ' Elle devra apprendre à chasser, cuisiner, créer de nouveaux abris ou réparer les anciens avant que sa place ne soit enfin acceptée.', 58, 0, 0, 0, 0, 0),
(58, 2, 1, 'Cela prendra plusieurs jours, voire des semaines, avant qu’on ne lui propose un lieu où vivre plus acceptable.', 59, 0, 0, 0, 0, 0),
(59, 2, 1, 'Alex lui montre plusieurs habitations en assez bon état et non habitées pour qu’elle choisisse sa future maison.', 60, 61, 62, 0, 0, 0),
(60, 2, 1, 'Une maison de taille moyenne, sans jardin, mais au centre du village, non loin de l’habitat du chef et du lieu de rassemblement lors d’événements. Beaucoup décorés de couleur plutôt rougeâtre.', 63, 0, 0, 0, 0, 0),
(61, 2, 1, 'Une maison de taille moyenne avec jardin, plus éloignée du centre du village et des autres habitats. Avec des décorations plus sobres, voire minimes, de couleur plutôt beige.', 63, 0, 0, 0, 0, 0),
(62, 2, 1, 'Une maison de petite taille avec jardin, plus proche d’autres habitations, semblable à un quartier pas très loin du centre du village. La décoration est assez sobre sans avoir trop de couleurs rose violacé clair.', 63, 0, 0, 0, 0, 0),
(63, 2, 1, 'Ophélia se sent faire partie de la communauté et souhaite faire part de son plan pour se venger des Opales à Alex et au guerrier du peuple.', 64, 0, 0, 0, 0, 0),
(64, 2, 1, 'Elle a souvent dû faire face à Alex qui vient souvent la voir et discuter avec elle.', 65, 66, 0, 0, 0, 0),
(65, 2, 1, 'Elle est devenue amie avec lui depuis.', 67, 0, 0, 0, 0, 0),
(66, 2, 1, 'Elle ne l’apprécie pas vraiment, mais accepte de rester à bon terme, car c’est le chef du peuple.', 67, 0, 0, 0, 0, 0),
(67, 2, 1, 'La jeune femme prend enfin son courage pour aller parler de son plan qu’elle travaille depuis des semaines dans sa tête. Elle demande à Alex de réunir le comité de guerre pour révéler ses idées et son vécu.', 68, 0, 0, 0, 0, 0),
(68, 2, 1, 'Elle demande s’il accepte de la suivre dans cette quête pour aider les Oprimales à vivre mieux et enfin pouvoir faire de ses trois civilisations un seul et unique peuple.', 69, 0, 0, 0, 0, 0),
(69, 2, 1, 'La plupart des personnes sont \r\nenthousiaste à cette idée et demande qu’elle soit son plan : ', 71, 72, 0, 0, 0, 27),
(70, 2, 1, 'La plupart des personnes sont \r\nenthousiaste à cette idée et demande qu’elle soit son plan :', 73, 74, 0, 1, 0, 28),
(71, 2, 1, 'La destruction d’un bâtiment des Opales en guise de vengeance et de signal d’alarme.', 75, 0, 0, 0, 0, 0),
(72, 2, 1, 'Tuer le chef du peuple des Opales pour mettre une personne de confiance à la place.', 75, 0, 0, 0, 0, 0),
(73, 2, 1, 'Faire en sorte que les Oprimales fassent une grève contre les Opales.', 79, 0, 0, 0, 0, 0),
(74, 2, 1, 'Faire en sorte que les Oprimales fassent une grève contre les Opales.', 79, 0, 0, 0, 0, 0),
(75, 2, 1, 'Les guerriers Opérials sont très surpris de ce plan agressif et violent que propose Ophélia, mais aillant été en contact avec elle ses derniers jours, ils ont pu apercevoir la colère qu’elle avait en elle.', 76, 0, 0, 0, 0, 0),
(76, 2, 1, 'Elle a pu leur montrer le réel impact de cette société et leur faire comprendre le danger qu’elle impose aux autres peuples. ', 78, 0, 0, 0, 0, 0),
(77, 2, 1, 'Elle a réussi à les convaincre que la violence est la seule solution.', 81, 0, 0, 0, 0, 0),
(78, 2, 1, 'Les guerriers Opérials apprécie un plan qui semble suffisamment efficace et sans trop de violence afin de préserver la bonté de la société.', 79, 0, 0, 0, 0, 0),
(79, 2, 1, 'Malgré tout, quelques membres des guerriers craignent que cela \r\nne suffira pas pour reprendre le pouvoir d’un peuple aussi égoïste et dominateur.', 80, 0, 0, 0, 0, 0),
(80, 2, 1, 'Seul l’avenir le dira. ', 81, 0, 0, 0, 0, 0),
(81, 2, 1, 'Les guerriers, Alex et Ophélia organisent leur mission respective pour atteindre leur but : ', 83, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `histoire`
--

CREATE TABLE `histoire` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `url_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `histoire`
--

INSERT INTO `histoire` (`id`, `nom`, `url_img`) VALUES
(1, 'La conquête des étoiles.', 'r2d2.jpg'),
(2, 'Opéria : Un monde appart', 'strom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Personnage`
--

CREATE TABLE `Personnage` (
  `id` int(11) NOT NULL,
  `url_image` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `couleur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Personnage`
--

INSERT INTO `Personnage` (`id`, `url_image`, `nom`, `couleur`) VALUES
(1, 'r2d2.jpg', 'R2D', '#77B5F2'),
(2, 'C3Pedro.jpg', 'C3Pedro', '#E9D136'),
(3, 'strom.jpg', 'Stormstopeur', '#F48B39'),
(20, 'testperso.jpg', 'Ophélia', '#76DD8D'),
(21, 'test', 'test', '#986a44'),
(22, 'test', 'test', '#986a44'),
(23, 'test', 'test', '#986a44');

-- --------------------------------------------------------

--
-- Table structure for table `progression`
--

CREATE TABLE `progression` (
  `id` int(11) NOT NULL,
  `id_histoire` int(11) NOT NULL,
  `id_dialogue` int(11) NOT NULL,
  `id_progression_precedent` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `progression`
--

INSERT INTO `progression` (`id`, `id_histoire`, `id_dialogue`, `id_progression_precedent`, `id_user`) VALUES
(2, 1, 1, 0, 16),
(5, 2, 13, 0, 16),
(249, 1, 1, 0, 35),
(250, 2, 13, 0, 35),
(251, 2, 14, 250, 35),
(252, 2, 15, 251, 35),
(293, 1, 2, 249, 35),
(294, 1, 3, 293, 35),
(302, 1, 1, 0, 36),
(303, 2, 13, 0, 36),
(309, 2, 14, 303, 36),
(310, 2, 15, 309, 36),
(311, 2, 17, 310, 36),
(320, 1, 4, 294, 35),
(332, 2, 18, 252, 35),
(390, 2, 13, 0, 34),
(431, 2, 14, 390, 34),
(432, 2, 15, 431, 34),
(437, 2, 13, 0, 12),
(438, 1, 1, 0, 12),
(439, 2, 0, 332, 35),
(443, 1, 1, 0, 34),
(444, 1, 2, 2, 16),
(445, 1, 4, 444, 16),
(446, 1, 0, 445, 16),
(447, 1, 2, 443, 34),
(448, 1, 3, 447, 34),
(449, 1, 0, 448, 34),
(452, 1, 2, 438, 12),
(453, 1, 4, 452, 12),
(454, 1, 0, 453, 12),
(494, 1, 1, 0, 37),
(495, 1, 2, 494, 37),
(496, 1, 3, 495, 37),
(497, 1, 4, 496, 37),
(533, 2, 13, 0, 37),
(534, 1, 5, 497, 37),
(535, 1, 11, 534, 37),
(536, 2, 14, 533, 37),
(537, 2, 15, 536, 37),
(538, 2, 16, 537, 37),
(539, 2, 19, 538, 37),
(540, 2, 20, 539, 37),
(541, 2, 21, 540, 37),
(542, 2, 23, 541, 37),
(543, 2, 24, 542, 37),
(544, 2, 25, 543, 37),
(545, 2, 26, 544, 37),
(546, 2, 27, 545, 37),
(547, 2, 29, 546, 37),
(548, 2, 30, 547, 37),
(549, 2, 31, 548, 37),
(550, 2, 32, 549, 37),
(551, 2, 33, 550, 37),
(552, 2, 32, 551, 37),
(553, 2, 33, 552, 37),
(554, 2, 32, 553, 37),
(555, 2, 35, 554, 37),
(556, 2, 0, 555, 37);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connexion`
--
ALTER TABLE `connexion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dialogue`
--
ALTER TABLE `dialogue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `histoire`
--
ALTER TABLE `histoire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Personnage`
--
ALTER TABLE `Personnage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `progression`
--
ALTER TABLE `progression`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connexion`
--
ALTER TABLE `connexion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `dialogue`
--
ALTER TABLE `dialogue`
  MODIFY `id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `histoire`
--
ALTER TABLE `histoire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Personnage`
--
ALTER TABLE `Personnage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `progression`
--
ALTER TABLE `progression`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=557;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
