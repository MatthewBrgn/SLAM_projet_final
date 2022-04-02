--
-- Base de données: `anoiresort`
--

-- --------------------------------------------------------


drop database if exists anoiresortmb;
CREATE DATABASE IF NOT EXISTs anoiresortmb;
use anoiresortmb;

grant all privileges on anoiresortmb.* to 'usersio'@'localhost' identified by 'sio';


-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idCli` INT NOT NULL AUTO_INCREMENT,
  `nomCli` varchar(15),
  `prenomCli` varchar(15),
  `mailCli` varchar(35),
  PRIMARY KEY (`idCli`)
);

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `idReserv` INT NOT NULL AUTO_INCREMENT,
  `idCli` INT NOT NULL,
  `numCh` char(2) NOT NULL,
  `dateDebut` date,
  `dateFin` date,
  `NbAdulte` INT(1),
  `codeConfirmation` CHAR(1) DEFAULT NULL,
  PRIMARY KEY (`idReserv`)
);



--
-- Structure de la table `chambres`
--

CREATE TABLE IF NOT EXISTS `chambres` (
  `numCh` char(2) NOT NULL,
  `idHotel` INT(2) NOT NULL,
  `optionCh` varchar(155) NOT NULL,
  `codeSuite` char(1) NOT NULL,
  `optionSuite` varchar(155),
  `nomCh` varchar(50) NOT NULL,
  `prixCh` decimal(4) NOT NULL,
  `images` varchar(150) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numCh`)
);


--
-- Structure de la table `hotel`
--

CREATE TABLE IF NOT EXISTS `hotel` (
  `idHotel` INT(2) NOT NULL,
  `adresseRueHotel` varchar(25) NOT NULL,
  `villeHotel` varchar(15) NOT NULL,
  `nomHotel` varchar(50) NOT NULL,
  `prixSpa` decimal(2),
  `prixHamam` decimal(2),
  PRIMARY KEY (`idHotel`)
);



--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idCli`) REFERENCES `client` (`idCli`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`numCh`) REFERENCES `chambres` (`numCh`);


--
-- Contraintes pour la table `chambres`
--
ALTER TABLE `chambres`
  ADD CONSTRAINT `chambres_ibfk_1` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`idHotel`);




-- --------------------------------------------------------
--
-- Contenu de la table `hotel`
--

INSERT INTO `hotel` (`idHotel`, `adresseRueHotel`, `villeHotel`, `nomHotel`, `prixSpa`, `prixHamam`) VALUES
(01, 'Wiang Nuea, Province de Mae Hong Son 58130, Thaïlande', 'Pai', 'Asia Borea Resort', '14', NULL),
(02, 'Wiang, Province de Chiang Mai 50190, Thaïlande', 'Phrao', 'Bamboo Hotel', '9', '6'),
(03, 'San Sali, Province de Chiang Rai 57170, Thaïlande', 'Wiang Pa Pao', 'Forest Resort', '12', NULL),
(04, 'Mae Pong, Province de Chiang Mai 50220, Thaïlande', 'Doi Saket', 'Hirando Resort', NULL, '12'),
(05, 'Ban Pae, Province de Chiang Mai 50240, Thaïlande', 'Chom Thong', 'Indiana Hotel', '9', '12'),
(06, 'Mae Na Chon, Province de Chiang Mai 50270, Thaïlande', 'Mae Chaem', 'Jenitsu Hotel', '17', '14');

--
-- Contenu de la table `chambres`
--

INSERT INTO `chambres` (`numCh`, `idHotel`, `optionCh`, `codeSuite`, `optionSuite`, `nomCh`, `prixCh`, `images`) VALUES
('C1', 04, 'Wifi, accès TV', 'N', NULL, 'Chambre La Classico', '145', 'La_Classico.jpg'),
('C2', 06, 'Wifi, spa', 'N', NULL, 'Chambre Sinaï', '80', 'Chambre_Sinaï.jpg'),
('C3', 01, 'Wifi, accès TV', 'N', NULL, 'Original Room', '95', 'Original_Room.jpg'),
('C4', 02, 'Wifi, accès TV, spa', 'N', NULL, 'Chambre Onooda', '120', 'Chambre_Onooda.jpg'),
('C5', 03, 'Wifi', 'N', NULL, 'The penthouse room', '65', 'The_penthouse_room.jpg'),
('C6', 02, 'Wifi, accès TV, spa', 'N', NULL, 'Chambre Boisée', '350', 'Chambre_boisée.jpg'),
('S1', 05, 'Wifi', 'O', 'Chauffeur, spa, hamam, service de restauration à la demande', 'Suite Khao', '840', 'Suite_Khao.jpg'),
('S2', 01, 'Wifi, accès TV', 'O', 'spa, service de restauration à la demande', 'La Red Suite', '700', 'La_Red_Suite.jpg'),
('S3', 04, 'Wifi, accès TV', 'O', 'Chauffeur, hamam, service de restauration à la demande', 'La Working Suite', '980', 'La_Working_Suite.jpg'),
('S4', 03, 'Wifi', 'O', 'Chauffeur, spa', 'Suite El Flora', '650', 'img\suites\Forest_Resort\Suite_El_Flora.jpg'),
('S5', 02, 'Wifi, accès TV', 'O', 'spa, hamam, service de restauration à la demande', 'Suite MaxiCity', '1400', 'Suite_MaxiCity.jpg'),
('S6', 02, 'Wifi, accès TV', 'O', 'spa, hamam, service de restauration à la demande', 'Suite Le Patio', '890', 'Suite_Le_Patio.jpg'),
('S7', 06, 'Wifi', 'O', 'Chauffeur, spa, hamam, accès TV', 'Wooden Suite', '1250', 'Wooden_Suite.jpg');