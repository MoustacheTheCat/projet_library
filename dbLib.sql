-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 10 nov. 2023 à 08:32
-- Version du serveur : 10.6.12-MariaDB-0ubuntu0.22.04.1
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `library`
--

-- --------------------------------------------------------

--
-- Structure de la table `admins`
--

CREATE TABLE `admins` (
  `admins_id` int(11) NOT NULL,
  `adminFirstName` varchar(100) NOT NULL,
  `adminLastName` varchar(100) NOT NULL,
  `adminBirthday` date NOT NULL,
  `adminEmail` varchar(100) NOT NULL,
  `adminPassword` varchar(100) NOT NULL,
  `adminPhone` varchar(100) NOT NULL,
  `adminAdress` varchar(100) NOT NULL,
  `adminCity` varchar(100) NOT NULL,
  `adminZip` varchar(5) NOT NULL,
  `adminContry` varchar(100) NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admins`
--

INSERT INTO `admins` (`admins_id`, `adminFirstName`, `adminLastName`, `adminBirthday`, `adminEmail`, `adminPassword`, `adminPhone`, `adminAdress`, `adminCity`, `adminZip`, `adminContry`, `createdAt`, `updatedAt`) VALUES
(1, 'admin', 'all', '2023-11-22', 'joubert.mathieu753783@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$UjlUaUREekdhWjVLMUVTZg$UsFaBe4DsxJaLxDYNdn/jKh4LvP7mW+5yX1oI5ZzbDY', '0615835301', '7 allée des oiseaux', 'Paris', '75020', 'France', '2023-11-06 10:38:51', '2023-11-06 10:38:51');

-- --------------------------------------------------------

--
-- Structure de la table `authors`
--

CREATE TABLE `authors` (
  `authors_id` int(11) NOT NULL,
  `authFirstName` varchar(100) DEFAULT NULL,
  `authLastName` varchar(100) DEFAULT NULL,
  `authNatonality` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `authors`
--

INSERT INTO `authors` (`authors_id`, `authFirstName`, `authLastName`, `authNatonality`, `createdAt`, `updatedAt`) VALUES
(1, 'Guillaume', 'Musso', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(27, 'J.R.R.', 'Tolkien', 'Anglais', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(28, 'J.K.', 'Rowling', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(29, 'George', 'Orwell', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(30, 'Antoine de', 'Saint-Exupéry', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(31, 'Jane', 'Austen', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(32, 'Léon', 'Tolstoï', 'Russe', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(33, 'F. Scott', 'Fitzgerald', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(34, 'Paulo', 'Coelho', 'Brésilien', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(35, 'Victor', 'Hugo', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(36, 'Fiodor', 'Dostoïevski', 'Russe', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(39, 'Patrick', 'Süskind', 'Allemand', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(40, 'Stendhal', '', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(43, 'Ernest', 'Hemingway', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(44, 'H.G.', 'Wells', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(45, 'Herman', 'Melville', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(46, 'Margaret', 'Mitchell', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(47, 'Homère', '', 'Grec', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(48, 'Alexandre', 'Dumas', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(49, 'Miguel de', 'Cervantes', 'Espagnol', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(51, 'Franz', 'Kafka', 'Tchèque', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(52, 'Louis-Ferdinand', 'Céline', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(53, 'Oscar', 'Wilde', 'Irlandais', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(54, 'Anne', 'Frank', 'Allemande', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(55, 'Charles', 'Perrault', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(56, 'Louisa May', 'Alcott', 'Américaine', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(57, 'Jules', 'Verne', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(58, 'Arthur', 'Conan Doyle', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(59, 'L. Frank', 'Baum', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(60, 'Thomas', 'Harris', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(61, 'Edgar Allan', 'Poe', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(62, 'Albert', 'Camus', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(63, 'Gaston', 'Leroux', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(66, 'Charles', 'Baudelaire', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(69, 'Molière', '', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(70, 'Mary', 'Shelley', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(71, 'Jean', 'Cocteau', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(72, 'Beaumarchais', '', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(73, 'Honoré de', 'Balzac', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(75, 'Mark', 'Twain', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(77, 'William', 'Shakespeare', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(78, 'Gabriel', 'García Márquez', 'Colombien', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(79, 'Emily', 'Brontë', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(80, 'Khaled', 'Hosseini', 'Afghan', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(81, 'Gustave', 'Flaubert', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(83, 'Leo', 'Tolstoy', 'Russe', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(85, 'Voltaire', '', 'Français', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(87, 'Fyodor', 'Dostoevsky', 'Russe', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(88, 'Anton', 'Chekhov', 'Russe', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(89, 'Margaret', 'Atwood', 'Canadienne', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(90, 'Harper', 'Lee', 'Américaine', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(91, 'Ray', 'Bradbury', 'Américain', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(92, 'Toni', 'Morrison', 'Américaine', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(96, 'Hermann', 'Hesse', 'Allemand', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(98, 'George', 'Eliot', 'Britannique', '2023-11-02 08:39:33', '2023-11-02 08:39:33'),
(101, 'hello', 'world', NULL, '2023-11-02 23:39:09', '2023-11-02 23:39:09'),
(102, 'auth', 'test', NULL, '2023-11-09 21:22:59', '2023-11-09 21:22:59');

-- --------------------------------------------------------

--
-- Structure de la table `books`
--

CREATE TABLE `books` (
  `books_id` int(11) NOT NULL,
  `bookName` varchar(100) DEFAULT NULL,
  `authors_id` int(11) DEFAULT NULL,
  `bookDate` date DEFAULT NULL,
  `bookPriceHT` float DEFAULT NULL,
  `bookPriceTTC` float DEFAULT NULL,
  `bookQuantity` int(11) DEFAULT 20,
  `bookDescription` text DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books`
--

INSERT INTO `books` (`books_id`, `bookName`, `authors_id`, `bookDate`, `bookPriceHT`, `bookPriceTTC`, `bookQuantity`, `bookDescription`, `createdAt`, `updatedAt`) VALUES
(1, 'Skidamarink', 1, '2023-10-30', 47, 56.4, 40, 'Ce roman tourne autour de l’enquête sur le vol de la Joconde.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(2, 'Et après...', 1, '2023-10-30', 18, 21.6, 0, 'Alors que Nathan n’a que huit ans, il manque de mourir en sauvant une fillette de la noyade.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(3, 'Sauve-moi', 1, '2023-10-30', 46, 55.2, 49, 'Sam Galoway, new-yorkais d\'une trentaine d\'années et travailleur opiniâtre depuis le suicide de sa femme Federica', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(4, 'Seras-tu là ?', 1, '2023-10-30', 76, 91.2, 34, 'Et si on vous offrait l’opportunité de revenir en arrière ? L’occasion de revivre chaque instant, de modifier des décisions qui vous ont chargé de regrets et de remords mais ont, avant tout, bouleversé radicalement votre vie.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(5, 'Je reviens te chercher', 1, '2023-10-30', 40, 48, 22, 'Dépêchez-vous de vivre, dépêchez-vous d\'aimer. Nous croyons toujours avoir le temps, mais ce n\'est pas vrai.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(6, 'Que serais-je sans toi ?', 1, '2023-10-30', 73, 87.6, 7, 'Gabrielle a deux hommes dans sa vie. L\'un est son père, l\'autre est son premier amour.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(7, 'La Fille de papier', 1, '2023-10-30', 43, 51.6, 20, 'Tom Boyd, un écrivain célèbre en panne d’inspiration, voit surgir dans sa vie l\'héroïne de ses romans.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(8, '7 ans après', 1, '2023-10-30', 96, 115.2, 30, 'Il raconte l\'histoire de Sebastian et Nikki. Un luthier aux doigts d\'or et une artiste rêvant de s\'engager dans le mannequinat.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(9, 'Demain', 1, '2023-10-30', 51, 61.2, 39, 'Le roman raconte l\'histoire d\'Emma, une jeune New-Yorkaise de 32 ans, à la recherche de l\'homme de sa vie.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(10, 'Central Park', 1, '2023-10-30', 66, 79.2, 2, 'Le roman raconte l\'histoire d\'Alice, capitaine à la brigade criminelle de Paris, et de Gabriel, pianiste de jazz américain.', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(598, 'Le Seigneur des Anneaux', 27, '2023-11-01', 77, 92.4, 1, 'Une épopée fantastique', '2023-11-02 09:37:46', '2023-11-02 09:37:46'),
(599, 'Harry Potter à l\'école des sorciers', 28, '2023-11-01', 84, 100.8, 38, 'L\'histoire d\'un jeune sorcier.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(600, '1984', 29, '2023-11-01', 89, 106.8, 37, 'Une dystopie oppressive.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(601, 'Le Petit Prince', 30, '2023-11-01', 91, 109.2, 38, 'Un conte poétique.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(602, 'Orgueil et Préjugés', 31, '2023-11-01', 88, 105.6, 28, 'Une histoire d\'amour classique.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(603, 'Guerre et Paix', 32, '2023-11-01', 67, 80.4, 26, 'Une saga historique.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(604, 'Le Grand Gatsby', 33, '2023-11-01', 70, 84, 48, 'La vie des riches dans les années 1920.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(605, 'L\'Alchimiste', 34, '2023-11-01', 45, 54, 10, 'La quête d\'un trésor spirituel.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(606, 'Les Misérables', 35, '2023-11-01', 17, 20.4, 8, 'L\'histoire de Jean Valjean.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(608, 'Le Hobbit', 27, '2023-11-01', 48, 57.6, 9, 'Une aventure fantastique.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(610, 'Le Parfum', 39, '2023-11-01', 90, 108, 22, 'L\'histoire d\'un tueur en série olfactif.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(611, 'Le Rouge et le Noir', 40, '2023-11-01', 2, 2.4, 32, 'A classic novel about ambition.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(614, 'Le Vieil Homme et la Mer', 43, '2023-11-01', 40, 48, 42, 'The struggle of a fisherman against a giant fish.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(615, 'La Guerre des Mondes', 44, '2023-11-01', 92, 110.4, 15, 'The invasion of Earth by extraterrestrials.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(616, 'Moby Dick', 45, '2023-11-01', 39, 46.8, 49, 'The quest for the white whale.', '2023-11-02 09:37:58', '2023-11-02 09:37:58'),
(618, 'L\'Odyssée', 47, '2023-11-01', 17, 20.4, 50, 'The journey of Ulysses to return home.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(619, 'Les Trois Mousquetaires', 48, '2023-11-01', 67, 80.4, 50, 'The adventures of Alexandre Dumas\' musketeers.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(620, 'Don Quichotte', 49, '2023-11-01', 86, 103.2, -1, 'The adventures of the knight Don Quixote.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(621, 'Le Comte de Monte-Cristo', 48, '2023-11-01', 24, 28.8, 10, 'Edmond Dantès\' quest for revenge.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(622, 'Le Château', 51, '2023-11-01', 64, 76.8, 48, 'K.\'s struggle against bureaucracy.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(623, 'Voyage au bout de la nuit', 52, '2023-11-01', 46, 55.2, 4, 'Bardamu\'s wanderings around the world.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(624, 'Le Portrait de Dorian Gray', 53, '2023-11-01', 38, 45.6, 32, 'The pursuit of eternal youth.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(625, 'Le Journal d\'Anne Frank', 54, '2023-11-01', 52, 62.4, 44, 'Anne Frank\'s writings during World War II.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(626, 'Cendrillon', 55, '2023-11-01', 43, 51.6, 23, 'The tale of the girl persecuted by her stepmother.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(627, 'Les Quatre Filles du docteur March', 56, '2023-11-01', 60, 72, 33, 'The story of the March sisters during the American Civil War.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(628, 'Le Tour du monde en 80 jours', 57, '2023-11-01', 70, 84, 46, 'Phileas Fogg\'s journey around the world.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(629, 'Les Aventures de Sherlock Holmes', 58, '2023-11-01', 68, 81.6, 30, 'The famous detective\'s investigations.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(630, 'Le Merveilleux Magicien d\'Oz', 59, '2023-11-01', 30, 36, 12, 'Dorothy\'s journey to the land of Oz.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(631, 'Le Silence des agneaux', 60, '2023-11-01', 46, 55.2, 20, 'The pursuit of serial killer Hannibal Lecter.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(632, 'Le Corbeau', 61, '2023-11-01', 38, 45.6, 14, 'Edgar Allan Poe\'s dark poems.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(633, 'La Peste', 62, '2023-11-01', 50, 60, 12, 'An epidemic in the city of Oran.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(634, 'Le Parfum de la dame en noir', 63, '2023-11-01', 34, 40.8, 20, 'Detective Joseph Rouletabille\'s investigations.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(635, 'La Métamorphose', 51, '2023-11-01', 21, 25.2, 10, 'The story of Gregor Samsa transforming into an insect.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(636, 'La Ferme des animaux', 29, '2023-11-01', 1, 1.2, 43, 'A political allegory with animals.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(637, 'Les Fleurs du Mal', 66, '2023-11-01', 42, 50.4, 33, 'Charles Baudelaire\'s dark poetry.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(638, 'L\'Étranger', 62, '2023-11-01', 3, 3.6, 35, 'The story of Meursault, an indifferent man to society.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(639, 'Le Procès', 51, '2023-11-01', 91, 109.2, 25, 'The injustice of the judicial system.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(640, 'Le Malade imaginaire', 69, '2023-11-01', 46, 55.2, 23, 'A comedy by Molière.', '2023-11-02 09:38:08', '2023-11-02 09:38:08'),
(641, 'Frankenstein', 70, '1818-01-01', 55, 66, 39, 'La création d\'une créature vivante par le Dr. Frankenstein.', '2023-11-02 09:39:22', '2023-11-02 09:39:22'),
(642, 'La Machine infernale', 71, '1934-01-01', 35, 42, 23, 'L\'histoire d\'Œdipe et du Sphinx.', '2023-11-02 09:39:22', '2023-11-02 09:39:22'),
(643, 'Le Mariage de Figaro', 72, '1778-01-01', 12, 14.4, 1, 'Une comédie de Beaumarchais.', '2023-11-02 09:39:22', '2023-11-02 09:39:22'),
(644, 'Le Père Goriot', 73, '1835-01-01', 51, 61.2, 39, 'Le monde des pensions parisiennes au XIXe siècle.', '2023-11-02 09:39:22', '2023-11-02 09:39:22'),
(646, 'Les Aventures de Huckleberry Finn', 75, '1884-01-01', 17, 20.4, 39, 'Le voyage d\'Huck sur le fleuve Mississippi.', '2023-11-02 09:39:22', '2023-11-02 09:39:22'),
(647, 'Notre-Dame de Paris', 35, '1831-01-01', 32, 38.4, 26, 'L\'histoire de la belle Esmeralda et du sonneur de cloches Quasimodo.', '2023-11-02 09:39:22', '2023-11-02 09:39:22'),
(648, 'Les Contemplations', 77, '1856-01-01', 9, 10.8, 14, 'Un recueil de poésie de Victor Hugo.', '2023-11-02 09:39:22', '2023-11-02 09:39:22'),
(649, 'Le Maître et Marguerite', 78, '1967-01-01', 48, 57.6, 46, 'Le Diable visite Moscou.', '2023-11-02 09:39:22', '2023-11-02 09:39:22'),
(650, 'Le Portrait de l\'artiste en jeune homme', 79, '1916-01-01', 12, 14.4, 32, 'Roman autobiographique de James Joyce', '2023-10-31 23:00:00', '2023-10-31 23:00:00'),
(651, 'Les Cerfs-volants', 80, '2003-01-01', 15, 18, 24, 'L\'histoire d\'une amitié en Afghanistan', '2023-10-31 23:00:00', '2023-10-31 23:00:00'),
(652, 'Le Nom de la Rose', 81, '1980-01-01', 37, 44.4, 24, 'Un mystère dans un monastère médiéval', '2023-10-31 23:00:00', '2023-10-31 23:00:00'),
(653, 'Les Enfants de la Terre', 73, '1980-01-01', 39, 46.8, 48, 'La saga préhistorique', '2023-10-31 23:00:00', '2023-10-31 23:00:00'),
(654, 'L\'Assommoir', 83, '1877-01-01', 84, 100.8, 15, 'La vie misérable dans les faubourgs de Paris', '2023-10-31 23:00:00', '2023-10-31 23:00:00'),
(656, 'Le Château de ma mère', 85, '2023-11-01', 3, 3.6, 32, 'Souvenirs d\'enfance de Marcel Pagnol', '2023-10-31 23:00:00', '2023-10-31 23:00:00'),
(657, 'Cent ans de solitude', 33, '2023-11-01', 62, 74.4, 16, 'L\'histoire de la famille Buendía', '2023-10-31 23:00:00', '2023-10-31 23:00:00'),
(658, 'Les Hauts de Hurlevent', 87, '2023-11-01', 100, 120, 34, 'L\'amour et la vengeance sur les landes anglaises', '2023-10-31 23:00:00', '2023-10-31 23:00:00'),
(669, 'Crime et Châtiment', 98, '2023-11-01', 11, 13.2, 19, 'Un étudiant criminel en Russie.', '2023-11-02 08:28:28', '2023-11-02 08:28:28'),
(671, 'La Nuit', 62, '2023-11-01', 55, 66, 12, 'Le témoignage d un survivant de l Holocauste.', '2023-11-02 08:28:28', '2023-11-02 08:28:28'),
(672, 'Le Secret de la Forêt', 28, '2021-00-00', 41, 49.2, 41, 'Un roman mystérieux sur la nature.', '2023-11-02 08:28:28', '2023-11-02 08:28:28'),
(673, 'Un Voyage Inattendu', 27, '2021-00-00', 37, 44.4, 18, 'L aventure de toute une vie.', '2023-11-02 08:28:28', '2023-11-02 08:28:28'),
(674, 'La Disparition de l Horizon', 33, '2021-00-00', 63, 75.6, 18, 'Un suspense palpitant.', '2023-11-02 08:28:28', '2023-11-02 08:28:28'),
(675, 'L Énigme de la Nuit', 33, '2021-00-00', 3, 3.6, 39, 'Un thriller captivant.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(676, 'Le Mystère du Passé', 45, '2021-00-00', 24, 28.8, 36, 'Une histoire d amour et de destin.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(677, 'Rendez-vous à Venise', 45, '2021-00-00', 11, 13.2, 14, 'Un voyage romantique à travers l Italie.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(678, 'LÉcho du Passé', 55, '2021-00-00', 83, 99.6, 15, 'Un voyage dans le temps et l espace.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(679, 'Les Secrets de la Cuisine Française', 55, '2021-00-00', 82, 98.4, 33, 'Recettes et anecdotes culinaires.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(680, 'L Ombre de l Écrivain', 27, '2021-00-00', 58, 69.6, 16, 'Un récit fantastique et envoûtant.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(681, 'L Anneau Magique', 27, '2021-11-01', 44, 52.8, 36, 'Un périple épique à la recherche de la magie.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(682, 'Le Monde d Alice', 28, '2021-11-01', 43, 51.6, 28, 'Les aventures extraordinaires d une jeune sorcière.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(683, 'L Énigme du Miroir', 28, '2021-11-01', 81, 97.2, 34, 'Un mystère captivant dans un univers parallèle.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(685, 'Le Meilleur des Mondes', 29, '2021-11-01', 77, 92.4, 34, 'Une vision futuriste de la société et de la technologie.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(687, 'Terre des Hommes', 30, '2021-11-01', 41, 49.2, 20, 'Les aventures de l aviateur Antoine de Saint-Exupéry.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(689, 'Emma', 31, '2021-11-01', 72, 86.4, 46, 'Les aventures d une jeune femme au caractère bien trempé.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(691, 'Anna Karénine', 32, '2021-11-01', 37, 44.4, 28, 'L amour tragique d une femme de la haute société.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(693, 'Sur la Route', 33, '2021-11-01', 69, 82.8, 16, 'Un voyage à travers l Amérique des années 1950.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(694, 'L Alchimiste', 34, '2021-11-01', 31, 37.2, 30, 'La quête spirituelle d un jeune berger.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(695, 'Brida', 34, '2021-11-01', 49, 58.8, 24, 'Le chemin de la sorcellerie et de la magie.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(699, 'L Idiot', 36, '2021-11-01', 52, 62.4, 17, 'L histoire d un homme incompris par la société.', '2023-11-02 08:32:33', '2023-11-02 08:32:33'),
(700, 'test', 101, '2023-11-15', 10, 12, 12, 'hello', '2023-11-02 23:39:09', '2023-11-02 23:39:09'),
(701, 'Test', 102, '2023-11-03', 95, 114, 20, 'hello world i\'m a test !!!!', '2023-11-09 21:22:59', '2023-11-09 21:22:59'),
(702, 'Test', 102, '2023-11-03', 43, 51.6, 20, 'hello world i\'m a test !!!!', '2023-11-09 21:23:57', '2023-11-09 21:23:57');

-- --------------------------------------------------------

--
-- Structure de la table `books_categorys`
--

CREATE TABLE `books_categorys` (
  `books_id` int(11) DEFAULT NULL,
  `categorys_id` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `books_categorys`
--

INSERT INTO `books_categorys` (`books_id`, `categorys_id`, `createdAt`, `updatedAt`) VALUES
(1, 8, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(1, 9, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(1, 10, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(2, 9, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(2, 11, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(3, 9, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(3, 11, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(4, 8, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(4, 9, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(4, 11, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(5, 8, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(5, 9, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(5, 11, '2023-11-02 10:04:51', '2023-11-02 10:04:51'),
(6, 8, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(6, 11, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(7, 8, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(7, 11, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(8, 8, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(8, 9, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(8, 10, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(8, 11, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(9, 8, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(9, 9, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(9, 11, '2023-11-02 10:05:23', '2023-11-02 10:05:23'),
(10, 8, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(10, 9, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(10, 11, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(599, 2, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(599, 11, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(600, 11, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(601, 11, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(602, 11, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(603, 11, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(604, 8, '2023-11-02 10:05:48', '2023-11-02 10:05:48'),
(604, 11, '2023-11-02 10:07:25', '2023-11-02 10:07:25'),
(605, 11, '2023-11-02 10:07:25', '2023-11-02 10:07:25'),
(606, 11, '2023-11-02 10:07:25', '2023-11-02 10:07:25'),
(608, 2, '2023-11-02 10:07:25', '2023-11-02 10:07:25'),
(608, 11, '2023-11-02 10:07:25', '2023-11-02 10:07:25'),
(610, 11, '2023-11-02 10:07:25', '2023-11-02 10:07:25'),
(611, 8, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(611, 11, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(614, 11, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(615, 2, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(615, 11, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(616, 8, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(616, 9, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(616, 11, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(618, 11, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(619, 8, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(619, 9, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(619, 11, '2023-11-02 10:10:31', '2023-11-02 10:10:31'),
(620, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(621, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(622, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(623, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(624, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(625, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(626, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(627, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(628, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(629, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(630, 11, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(631, 3, '2023-11-02 10:11:58', '2023-11-02 10:11:58'),
(631, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(632, 3, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(632, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(633, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(634, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(635, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(636, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(637, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(638, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(639, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(640, 11, '2023-11-02 10:12:28', '2023-11-02 10:12:28'),
(641, 2, '2023-11-02 10:12:50', '2023-11-02 10:12:50'),
(641, 11, '2023-11-02 10:12:50', '2023-11-02 10:12:50'),
(642, 11, '2023-11-02 10:12:50', '2023-11-02 10:12:50'),
(643, 11, '2023-11-02 10:12:50', '2023-11-02 10:12:50'),
(644, 11, '2023-11-02 10:12:50', '2023-11-02 10:12:50'),
(646, 11, '2023-11-02 10:12:50', '2023-11-02 10:12:50'),
(669, 11, '2023-11-02 10:12:50', '2023-11-02 10:12:50'),
(671, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(672, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(673, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(674, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(675, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(676, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(677, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(678, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(679, 11, '2023-11-02 10:13:31', '2023-11-02 10:13:31'),
(680, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(681, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(682, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(683, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(685, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(687, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(689, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(691, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(693, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(694, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(695, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(699, 11, '2023-11-02 10:15:28', '2023-11-02 10:15:28'),
(700, 8, '2023-11-02 23:39:09', '2023-11-02 23:39:09'),
(598, 5, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(598, 7, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(647, 11, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(648, 4, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(649, 7, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(650, 10, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(651, 2, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(652, 3, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(653, 4, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(654, 6, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(656, 8, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(657, 9, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(658, 1, '2023-11-07 09:53:56', '2023-11-07 09:53:56'),
(701, 1, '2023-11-09 21:22:59', '2023-11-09 21:22:59'),
(701, 5, '2023-11-09 21:22:59', '2023-11-09 21:22:59'),
(702, 1, '2023-11-09 21:23:57', '2023-11-09 21:23:57'),
(702, 5, '2023-11-09 21:23:57', '2023-11-09 21:23:57');

-- --------------------------------------------------------

--
-- Structure de la table `categorys`
--

CREATE TABLE `categorys` (
  `categorys_id` int(11) NOT NULL,
  `categoryName` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorys`
--

INSERT INTO `categorys` (`categorys_id`, `categoryName`, `createdAt`, `updatedAt`) VALUES
(1, 'Spiritualité', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(2, 'Science-fiction', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(3, 'Polar', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(4, 'Biologie', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(5, 'Mythologie', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(6, 'Romans-policiers', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(7, 'Fantastique', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(8, 'Romantique', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(9, 'Roman d amour', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(10, 'Fiction', '2023-11-02 10:02:39', '2023-11-02 10:02:39'),
(11, 'Roman', '2023-11-02 10:02:39', '2023-11-02 10:02:39');

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(11) NOT NULL,
  `customerFirstName` varchar(100) NOT NULL,
  `customerLastName` varchar(100) NOT NULL,
  `customerBirthday` date NOT NULL,
  `customerEmail` varchar(100) NOT NULL,
  `customerPassword` varchar(100) NOT NULL,
  `customerPhone` varchar(100) NOT NULL,
  `customerAdress` varchar(100) NOT NULL,
  `customerCity` varchar(100) NOT NULL,
  `customerZip` varchar(5) NOT NULL,
  `customerContry` varchar(100) NOT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`customers_id`, `customerFirstName`, `customerLastName`, `customerBirthday`, `customerEmail`, `customerPassword`, `customerPhone`, `customerAdress`, `customerCity`, `customerZip`, `customerContry`, `createdAt`, `updatedAt`) VALUES
(16, 'customer', 'test', '1990-10-24', 'mattou83075@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$ZklVT2NRNURxZFlpVHl3Zw$K4LIZPce2YGa2SqjxvMLaN3EFFRHceqHDO2Fb6ae97U', '0615835301', '29 rue des ruisseaux', 'Paris', '75020', 'France', '2023-11-07 11:24:53', '2023-11-07 11:24:53');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `ordersNumber` varchar(45) DEFAULT NULL,
  `customers_id` int(11) DEFAULT NULL,
  `ordersStatus` varchar(45) DEFAULT 'En cour de préparation',
  `totalHT` float DEFAULT NULL,
  `totalTTC` float DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`orders_id`, `ordersNumber`, `customers_id`, `ordersStatus`, `totalHT`, `totalTTC`, `createdAt`, `updatedAt`) VALUES
(27, '927032', 16, 'pending', 129.6, 155.52, '2023-11-07 11:27:15', '2023-11-07 11:27:15'),
(28, '286761', 16, 'pending', 352.8, 423.36, '2023-11-07 17:14:07', '2023-11-07 17:14:07');

-- --------------------------------------------------------

--
-- Structure de la table `orders_books`
--

CREATE TABLE `orders_books` (
  `orders_books_id` int(11) NOT NULL,
  `orders_id` int(11) DEFAULT NULL,
  `books_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `totalHT` float DEFAULT NULL,
  `totalTTC` float DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `orders_books`
--

INSERT INTO `orders_books` (`orders_books_id`, `orders_id`, `books_id`, `quantity`, `totalHT`, `totalTTC`, `createdAt`, `updatedAt`) VALUES
(44, 27, 669, 2, 134.4, 161.28, '2023-11-07 11:27:15', '2023-11-07 11:27:15'),
(45, 27, 599, 5, 180, 216, '2023-11-07 11:27:15', '2023-11-07 11:27:15'),
(46, 27, 694, 1, 26.4, 31.68, '2023-11-07 11:27:15', '2023-11-07 11:27:15'),
(47, 28, 691, 4, 486.4, 583.68, '2023-11-07 17:14:07', '2023-11-07 17:14:07'),
(48, 28, 691, 5, 760, 912, '2023-11-07 17:14:07', '2023-11-07 17:14:07'),
(49, 28, 694, 3, 237.6, 285.12, '2023-11-07 17:14:07', '2023-11-07 17:14:07');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`);

--
-- Index pour la table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authors_id`);

--
-- Index pour la table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`books_id`),
  ADD KEY `auth_FK` (`authors_id`) USING BTREE;

--
-- Index pour la table `books_categorys`
--
ALTER TABLE `books_categorys`
  ADD KEY `category_id_book_id_FK` (`categorys_id`),
  ADD KEY `book_id_category_id_FK` (`books_id`);

--
-- Index pour la table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`categorys_id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`),
  ADD KEY `orders_id_customer_FK` (`customers_id`) USING BTREE;

--
-- Index pour la table `orders_books`
--
ALTER TABLE `orders_books`
  ADD PRIMARY KEY (`orders_books_id`),
  ADD KEY `orders_books_FK` (`books_id`),
  ADD KEY `orders_books_FK_1` (`orders_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admins`
--
ALTER TABLE `admins`
  MODIFY `admins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `authors`
--
ALTER TABLE `authors`
  MODIFY `authors_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT pour la table `books`
--
ALTER TABLE `books`
  MODIFY `books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT pour la table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `categorys_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `orders_books`
--
ALTER TABLE `orders_books`
  MODIFY `orders_books_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `auth_FK` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`authors_id`);

--
-- Contraintes pour la table `books_categorys`
--
ALTER TABLE `books_categorys`
  ADD CONSTRAINT `book_id_category_id_FK` FOREIGN KEY (`books_id`) REFERENCES `books` (`books_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_id_book_id_FK` FOREIGN KEY (`categorys_id`) REFERENCES `categorys` (`categorys_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_FK` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`customers_id`);

--
-- Contraintes pour la table `orders_books`
--
ALTER TABLE `orders_books`
  ADD CONSTRAINT `orders_books_FK` FOREIGN KEY (`books_id`) REFERENCES `books` (`books_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_books_FK_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`orders_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;