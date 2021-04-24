-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2021 at 10:41 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CR10-RasmiSilasari-BigLibrary`
--
CREATE DATABASE IF NOT EXISTS `CR10-RasmiSilasari-BigLibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `CR10-RasmiSilasari-BigLibrary`;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `medID` int(10) UNSIGNED NOT NULL,
  `medTitle` varchar(100) DEFAULT NULL,
  `medImage` text DEFAULT NULL,
  `autName` varchar(30) DEFAULT NULL,
  `autSurname` varchar(30) DEFAULT NULL,
  `ISBN` varchar(30) DEFAULT NULL,
  `medDesc` text DEFAULT NULL,
  `pubDate` date DEFAULT NULL,
  `pubName` varchar(30) DEFAULT NULL,
  `pubAddress` text DEFAULT NULL,
  `pubSize` varchar(10) DEFAULT NULL,
  `medType` varchar(10) DEFAULT NULL,
  `medStatus` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`medID`, `medTitle`, `medImage`, `autName`, `autSurname`, `ISBN`, `medDesc`, `pubDate`, `pubName`, `pubAddress`, `pubSize`, `medType`, `medStatus`) VALUES
(1, 'Flache Kuchen', 'https://cover.ekz.de/9783833820083.jpg', 'Ilse', 'König', '978-3-8338-2008-3', 'Süße und salzige Tartes, Pies, Apfelkuchen und mehr', '2018-09-03', 'Dorling Kindersley', 'Viaduct Gardens 8, London', 'Big', 'Book', 'Available'),
(2, 'Kleine Kuchen zum Verschenken', 'https://images-na.ssl-images-amazon.com/images/I/61uIiwHMmuL._SX477_BO1,204,203,200_.jpg', 'Karina', 'Schmidt', '978-3-7724-5916-0', 'Süße Rezepte, die Freude machen (Kreative Manufaktur)', '2014-02-10', 'Bassermann Verlag', 'Bayerstraße 71 - 73, München', 'Medium', 'Book', 'Reserved'),
(3, 'BBQ Kuchen', 'https://images-na.ssl-images-amazon.com/images/I/512TFhXUc8L._SX382_BO1,204,203,200_.jpg', 'Georg', 'Lenz', '978-3-7724-8014-0', 'Süße Leckereien vom Grill', '2016-01-18', 'Pandora', 'Antwerpenerstraße 6-12, Köln', 'Small', 'Book', 'Reserved'),
(4, 'Kuchen trifft Orient', 'https://images-na.ssl-images-amazon.com/images/I/61K55Vu1oHL._SX458_BO1,204,203,200_.jpg', 'Huda', 'Al-Jundi', '978-3-7724-8041-6', 'Süße Schätze aus dem Morgenland', '2017-08-09', 'Decca', 'Albert Embankment 9, London', 'Medium', 'Book', 'Reserved'),
(5, 'Kuchen steht Kopf', 'https://images-na.ssl-images-amazon.com/images/I/61frOwR-miL._SX258_BO1,204,203,200_.jpg', 'Huet-Gomez', 'Christelle', '978-3-7995-1199-5', 'Rezepte für Upside Down Cakes', '2017-08-28', 'Dorling Kindersley', 'Viaduct Gardens 8, London', 'Big', 'Book', 'Available'),
(6, 'Die besten Kuchen aus der Pfanne', 'https://images-na.ssl-images-amazon.com/images/I/51b+FAnCCBL._SX382_BO1,204,203,200_.jpg', 'Stéphanie de', 'Turckheim', '978-3-8094-3771-0', 'Rezepte ohne Backhofen', '2017-08-14', 'Bassermann Verlag', 'Bayerstraße 71 - 73, München', 'Medium', 'Book', 'Reserved'),
(7, 'Tomorrow', 'https://images-na.ssl-images-amazon.com/images/I/71%2BA28dlRBL._SY445_.jpg', 'Cyril', 'Dion', 'B01G9J8TAS', 'Umwelt-Doku, in der die Macher, darunter Schauspielerin Mélanie Laurent, durch zehn Länder reisen und mit Organisationen und Wissenschaftlern über Problemlösungen in Klimaschutz, Energie- und Landwirtschaft sprechen.', '2016-10-14', 'Pandora', 'Antwerpenerstraße 6-12, Köln', 'Small', 'DVD', 'Reserved'),
(8, 'But Beautiful', 'https://images-na.ssl-images-amazon.com/images/I/71Sfl4zlkML._SY445_.jpg', 'Erwin', 'Wagenhofer', 'B07Z75PQ55', 'Eindringliches Porträt von Menschen, die sich für ihre Mitmenschen, die Umwelt und die Kunst engagieren. Neuer Dokumentarfilm des nicht nur für \"Feed the World\" geschätzten Erwin Wagenhofer.', '2020-04-17', 'Decca', 'Albert Embankment 9, London', 'Medium', 'DVD', 'Available'),
(9, 'Cowspiracy', 'https://images-na.ssl-images-amazon.com/images/I/71f2XFi2q1L._SY445_.jpg', 'Kip', 'Andersen', 'B018L3O6DO', 'Cowspiracy', '2016-03-18', 'Dorling Kindersley', 'Viaduct Gardens 8, London', 'Big', 'DVD', 'Reserved'),
(10, 'Before the Flood', 'https://images-na.ssl-images-amazon.com/images/I/81VKZxiApVL._SY445_.jpg', 'Fisher', 'Stevens', 'B01N3B2FTB', 'Der Dokumentarfilm \"Before the Flood\" ist eine fesselnde Darstellung der dramatischen Veränderungen, die in aller Welt aufgrund des Klimawandels eintreten, sowie der Maßnahmen, die wir als Einzelpersonen und als Gesellschaft ergreifen können, um einen katastrophalen Zusammenbruch des Lebens auf unserem Planeten zu verhindern.', '2017-05-17', 'Bassermann Verlag', 'Bayerstraße 71 - 73, München', 'Medium', 'DVD', 'Available'),
(11, 'More than Honey', 'https://images-na.ssl-images-amazon.com/images/I/816gHkoVCTL._SY445_.jpg', 'Dieter', 'Meyer', 'B00GEKOFCO', 'Dokumentation über das rätselhafte weltweite Bienensterben und die Bedeutung der Bienen für den Menschen und die Natur.', '2014-01-31', 'Pandora', 'Antwerpenerstraße 6-12, Köln', 'Small', 'DVD', 'Reserved'),
(12, 'Die Sonaten für Violine und Klavier', 'https://images-na.ssl-images-amazon.com/images/I/518SX7PTYPL.jpg', 'Itzhak', 'Perlman', 'B00004SA87', 'Der Tonfall der mozartschen Violinsonaten ist lyrisch, unendlich melodiös, lieblich und pastoral. Die zwei- beziehungsweise dreisätzigen Stücke sind in aller Regel kurz, nur die letzten Sonaten haben eine Spieldauer von annähernd 25 Minuten.', '2000-01-01', 'Decca', 'Albert Embankment 9, London', 'Medium', 'CD', 'Reserved'),
(13, 'Das Wohltemperierte Klavier', 'https://images-na.ssl-images-amazon.com/images/I/71H6YVxRPVL._SL1328_.jpg', 'Sviatoslov', 'Richter', 'B000026OHN', 'His renderings are true to the pieces as they were originally written, before Glenn Gould revolutionized the way they would be played.', '1992-01-01', 'Dorling Kindersley', 'Viaduct Gardens 8, London', 'Big', 'CD', 'Reserved'),
(14, 'Sämtliche Werke für Klavier', 'https://images-na.ssl-images-amazon.com/images/I/810LPevRqxL._SL1500_.jpg', 'Bertrand', 'Chamayou', 'B017TBVQL4', 'Eine grandiose Mischung aus Behaglichkeit und Exotik, als Hörer glaubt man, jedes Glitzern genau erkennen zu können. Selbst im Tumult bleibt diese Aufnahme herrlich transparent. Große Kunst.', '2016-01-01', 'Bassermann Verlag', 'Bayerstraße 71 - 73, München', 'Medium', 'CD', 'Reserved'),
(15, 'Die Acht Grossen Suiten', 'https://images-na.ssl-images-amazon.com/images/I/71e2PEGDHWL._SL1400_.jpg', 'Lisa', 'Smirnova', 'B005MASIFW', 'Die Interpretation der Sonaten von Perahia (absoluter Ohrwurm) dazu verhält sich wie ein Vortrag von Einstein zu einem Physikprofessor in Kassel.', '2012-01-01', 'Pandora', 'Antwerpenerstraße 6-12, Köln', 'Small', 'CD', 'Available'),
(16, 'Around the Universe', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/495px-No-Image-Placeholder.svg.png', 'Marion', 'Stenema', '792837472492', 'A touching story about finding the purpose of life.', '2001-12-03', 'Portobello', 'Hazlitt Road 12, London', 'Medium', 'Book', 'Reserved'),
(17, 'Enter Here', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/495px-No-Image-Placeholder.svg.png', 'Rema', 'Phillips', '38479237487', 'Documentary about art revolution and the way it changes museum history.', '2010-05-26', 'Portobello', 'Hazlitt Road 12, London', 'Medium', 'DVD', 'Available');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`medID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `medID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
