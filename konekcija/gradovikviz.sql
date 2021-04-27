-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 10:49 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradovikviz`
--

-- --------------------------------------------------------

--
-- Table structure for table `futer`
--

CREATE TABLE `futer` (
  `idFuter` int(255) NOT NULL,
  `putanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `faFa` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `futer`
--

INSERT INTO `futer` (`idFuter`, `putanja`, `faFa`) VALUES
(1, 'instagram.com', '<i class=\"fab fa-instagram\"></i>'),
(2, 'facebook.com', '<i class=\"fab fa-facebook-square\"></i>'),
(3, 'gmail.com', '<i class=\"fas fa-envelope-open-text\"></i>'),
(4, 'dokumentacija.pdf', '<i class=\"fas fa-book\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `gradovi`
--

CREATE TABLE `gradovi` (
  `idGrada` int(255) NOT NULL,
  `putanjaSlike` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `altSlike` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opisGrada` text COLLATE utf8_unicode_ci NOT NULL,
  `imeGrada` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gradovi`
--

INSERT INTO `gradovi` (`idGrada`, `putanjaSlike`, `altSlike`, `opisGrada`, `imeGrada`) VALUES
(1, 'slike/beograd.jpg', 'Beograd', '<span class=\"boja1\">Beograd</span> je glavni i najnaseljeniji grad <span class=\"boja1\">Republike Srbije </span>i privredno, kulturno i obrazovno središte zemlje. Grad leži na ušću <span class=\"boja1\">Save</span> u <span class=\"boja1\"> Dunav </span>, gde se <span class=\"boja1\">Panonska nizija</span> spaja sa <span class=\"boja1\">Balkanskim poluostrvom</span>.<span class=\"boja1\"> Beograd</span> je upravno središte Grada <span class=\"boja1\">Beograda</span>, posebne teritorijalne jedinice sa svojom mesnom samoupravom. Po broju stanovnika četvrti je u jugoistočnoj <span class=\"boja1\">Evropi</span> posle <span class=\"boja1\">Istanbula</span>,<span class=\"boja1\"> Atine</span> i<span class=\"boja1\"> Bukurešta </span>.', 'Beograd'),
(2, 'slike/novisad.jpg', 'NoviSad', '<span class=\"boja1\">Novi Sad</span> je najveći grad <span class=\"boja1\">Autonomne Pokrajine Vojvodine</span> i njen administrativni centar, posle<span class=\"boja1\"> Beograda</span> drugi grad u <span class=\"boja1\">Srbiji</span> po broju stanovnika i površini. Prema konačnim rezultatima popisa stanovništva iz 2011. godine, na administrativnoj teritoriji grada <span class=\"boja1\">Novog Sada</span> je živelo 341.625 stanovnika, dok je u samom naselju <span class=\"boja1\">Novi Sad</span> živelo 250.439 stanovnika.', 'Novi Sad'),
(3, 'slike/loznica.jpg', 'Loznica', 'Grad u podnožju planine <span class=\"boja2\">Gučevo</span>, u <span class=\"boja2\">Podrinju</span>. Kroz grad protiče rečica <span class=\"boja2\">Štira</span> i <span class=\"boja2\">Zlatni Potok</span>.<span class=\"boja2\"> Loznica </span>se nalazi na nadmorskoj visini od 142 m. Drumom od <span class=\"boja2\">Beograda</span> je udaljen 139 km, 136 km od <span class=\"boja2\">Novog Sad</span> 75 km od <span class=\"boja2\">Valjeva</span>, 53 km od <span class=\"boja2\">Šapca</span> i 6 km od <span class=\"boja2\">Banje Koviljače</span>. Takoođe ima i 6 km do poznatog selca <span class=\"boja2\">Tršić</span> odakle je i <span class=\"boja2\">Vuk Stefanović-Karadžić</span>. Na udaljenosti od 17 km od <span class=\"boja2\">Loznice</span> se nalazi i <span class=\"boja2\">Manastir Tronoša</span> podignut u 14. veku.', 'Loznica'),
(4, 'slike/sabac.jpg', 'Sabac', '<span class=\"boja2\">Šabac</span> je grad u <span class=\"boja2\">Mačvanskom okrugu</span>. Prema popisu iz 2011. imao je 53.919 stanovnika.<span class=\"boja2\">Šabac</span>, koji se nalazi u <span class=\"boja2\">zapadnoj Srbiji</span> na obali reke <span class=\"boja2\">Save</span>, razvio se oko utvrđenja podignutih uz reku (Zaslon, Bigir Delen). Privredno je, kulturno i administrativno središte <span class=\"boja2\">Mačvanskog okruga</span>. <span class=\"boja2\">Letnjikovac</span> je selo koje se nalazi pored <span class=\"boja2\">Šapca</span>.\r\nOpština i grad <span class=\"boja2\">Šabac</span> zahvataju severni deo <span class=\"boja2\">severozapadne Srbije</span>.', 'Šabac'),
(5, 'slike/subotica.jpg', 'subotica', '<span class=\"boja3\">Subotica</span> je najseverniji grad u <span class=\"boja3\">Srbiji</span>, drugi po broju stanovnika u <span class=\"boja3\">Vojvodini</span>. Prema popisu iz 2011. godine ima 97.910 stanovnika. Nalazi se na 10 km udaljenosti od granice <span class=\"boja3\">Srbije</span> sa <span class=\"boja3\">Mađarskom</span>, na severnoj širini od 46°5\'55\" i istočnoj dužini od 19°39\'47\". Administrativni je centar <span class=\"boja3\">Severnobačkog okruga</span>.<span class=\"boja3\">Subotica</span> se prvi put pominje 1391. pod latinskim imenom <span class=\"boja3\">Zabatka</span>. ', 'Subotica'),
(6, 'slike/nis.jpg', 'nis', '<span class=\"boja3\">Niš</span> je najveći grad u <span class=\"boja3\">jugoistočnoj Srbiji</span> i sedište <span class=\"boja3\">Nišavskog upravnog okruga</span>. Na području grada<span class=\"boja3\"> Niša</span> je, prema popisu iz 2011, živelo 260.237 stanovnika, dok je u samom naseljenom mestu živelo 183.164 stanovnika,pa je tako po broju stanovnika <span class=\"boja3\">Niš</span> treći grad po veličini u<span class=\"boja3\"> Srbiji</span> (posle <span class=\"boja3\">Beograda</span> i<span class=\"boja3\"> Novog Sada</span>).Nalazi se 237 km jugoistočno od <span class=\"boja3\">Beograda</span> na reci<span class=\"boja3\"> Nišavi</span>. ', 'Niš'),
(7, 'slike/kraljevo.jpg', 'Kraljevo', '<span class=\"boja4\">Kraljevo</span> je grad u <span class=\"boja4\">Srbiji</span> u<span class=\"boja4\"> Raškom okrugu</span>. Prema popisu iz 2011. bilo je 63030 stanovnika (prema popisu iz 1991. bilo je 57926 stanovnika).\r\n<span class=\"boja4\">Kraljevo</span> se nalazi na trima rekama:<span class=\"boja4\"> Ibar</span>,<span class=\"boja4\"> Zapadna Morava</span> i <span class=\"boja4\">Ribnica</span>. Opština ima 63030 stanovnika. Gradsko područje <span class=\"boja4\">Kraljeva</span> čini naselje <span class=\"boja4\">Kraljevo</span> i još sledeća naselja: <span class=\"boja4\">Tavnik, Adrani, Čibukovac, Grdica, Jarčujak, Konarevo, Mataruge, Mataruška Banja, Metikoš, Ratina, Ribnica, Vitanovac, Vrba, Zaklopača</span> i<span class=\"boja4\"> Žiča</span>.', 'Kraljevo'),
(8, 'slike/krusevac.jpg', 'Krusevac', '<span class=\"boja4\">Kruševac</span> je grad koji se nalazi u središnjem delu <span class=\"boja4\">Srbije</span>, u dolini <span class=\"boja4\">Zapadnog Pomoravlja</span>, na reci <span class=\"boja4\">Rasini</span>. <span class=\"boja4\">Kruševac</span> danas ima preko 75.000 stanovnika na teritoriji grada i oko 140 hiljada stanovnika na teritoriji opštine. <span class=\"boja4\">Opština Kruševac</span> obuhvata 101 naselje.<span class=\"boja4\"> Kruševac</span> je centar <span class=\"boja4\">Rasinskog okruga</span>.<span class=\"boja4\"> Opština Kruševac</span> zahvata površinu od 854 km².\r\nPoznat je kao srednjovekovna srpska prestonica.', 'Kruševac'),
(9, 'slike/pirot.jpg', 'Pirot', '<span class=\"boja5\">Pirot</span> je gradsko naselje u <span class=\"boja5\">opštini Pirot</span> u <span class=\"boja5\">Pirotskom okrugu</span>. Prema popisu iz 2011. bilo je 38432 stanovnika (prema popisu iz 1991. bilo je 40267 stanovnika).\r\nGrad je podignut na mestu <span class=\"boja5\">rimskog utvrđenja Turres</span> (3. vek) i utvrđenog vizantijskog gradića<span class=\"boja5\"> Quimedava </span>(4. vek). U 14. veku spominje se kao<span class=\"boja5\"> Pirot</span>; u 16. i 17. veku bio je lepa i bogata turska varoš. ', 'Pirot'),
(10, 'slike/zajecar.jpg', 'Zajecar', '<span class=\"boja5\">Zaječar</span> je grad u <span class=\"boja5\">Zaječarskom okrugu</span>. Administrativni je centar <span class=\"boja5\">Zaječarskog okuruga</span> i ujedno je jedan od većih gradova <span class=\"boja5\">Istočne Srbije</span>. Prema popisu iz 2011. bilo je 43.860 stanovnika (prema popisu iz 2002. bilo je 39.625 stanovnika). U ovom popisu je u urbano gradsko naselje prvi put uračunato više prigraskih naselja koja gravitiraju ka naselju <span class=\"boja5\">Zaječar</span>. To su <span class=\"boja5\">Grljan</span>,<span class=\"boja5\"> Zvezdan</span> i<span class=\"boja5\"> Veliki Izvor</span>.', 'Zaječar');

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnika` int(255) NOT NULL,
  `ime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `korisnicko_ime` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `idUloge` int(50) NOT NULL,
  `poruka` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `pol` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `datum_registracije` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnika`, `ime`, `prezime`, `email`, `lozinka`, `korisnicko_ime`, `idUloge`, `poruka`, `pol`, `datum_registracije`) VALUES
(29, 'Lazar', 'Lazarevic', 'lazar@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'lazar', 2, NULL, 'muski', '2020-03-23 22:33:37'),
(37, 'Jank', 'Jankovic', 'janjank@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'janjan', 2, 'Poruka od Jank', 'muski', '2020-03-26 06:48:38'),
(38, 'Danijela', 'Radovanovic', 'danijela@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'danijela', 1, NULL, 'muski', '2020-03-26 19:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(50) NOT NULL,
  `naziv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_roditelja` int(50) DEFAULT NULL,
  `vidljiv` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `naziv`, `putanja`, `id_roditelja`, `vidljiv`) VALUES
(1, 'Početna', 'index.php', NULL, 0),
(2, 'Logovanje', 'login.php', NULL, 1),
(3, 'Registracija', 'register.php', NULL, 1),
(4, 'Autor', 'autor.php', NULL, 0),
(5, 'O gradovima', 'gradovi.php?strana=1', NULL, 2),
(6, 'Kviz', 'kviz.php', NULL, 2),
(7, 'Admin', 'admin.php', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `odgovor`
--

CREATE TABLE `odgovor` (
  `idOdgovora` int(255) NOT NULL,
  `odgovor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tacan` tinyint(10) NOT NULL,
  `idPitanja` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovor`
--

INSERT INTO `odgovor` (`idOdgovora`, `odgovor`, `tacan`, `idPitanja`) VALUES
(1, 'Beograd', 1, 1),
(2, 'Leskovac', 0, 1),
(3, 'Kruševac', 0, 1),
(4, 'Niš', 1, 2),
(5, 'Paraćin', 0, 2),
(6, 'Kragujevac', 0, 2),
(7, 'Novi Sad', 1, 3),
(8, 'Loznica', 0, 3),
(9, 'Paraćin', 0, 3),
(10, 'Subotica', 1, 4),
(11, 'Sremska Mitrovica', 0, 4),
(12, 'Inđija', 0, 4),
(13, 'Beograd', 0, 5),
(14, 'Šabac', 1, 5),
(15, 'Kraljevo', 0, 5),
(16, 'Dimitrovgrad', 0, 6),
(17, 'Loznica', 1, 6),
(18, 'Leskovac', 0, 6),
(19, '37000', 1, 7),
(20, '11500', 0, 7),
(21, '11300', 0, 7),
(22, 'Kraljevo', 1, 8),
(23, 'Subotica', 0, 8),
(24, 'Loznica', 0, 8),
(25, 'Užice', 0, 9),
(26, 'Valjevo', 1, 9),
(27, 'Loznica', 0, 9),
(28, 'Beograd', 0, 10),
(29, 'Užice', 1, 10),
(30, 'Kruševac', 0, 10),
(31, 'Jagodina', 1, 11),
(32, 'Valjevo', 0, 11),
(33, 'Vršac', 0, 11),
(35, 'Pirot', 1, 12),
(36, 'Subotica', 0, 12),
(37, 'Beograd', 0, 12),
(38, 'Zaječar', 0, 13),
(39, 'Beograd', 1, 13),
(40, 'Loznica', 0, 13),
(41, 'Leskovac', 0, 14),
(42, 'Kragujevac', 1, 14),
(43, 'Kruševac', 0, 14),
(44, 'Niš', 0, 15),
(45, 'Zaječar', 1, 15),
(46, 'Vršac', 0, 15);

-- --------------------------------------------------------

--
-- Table structure for table `pitanja`
--

CREATE TABLE `pitanja` (
  `idPitanja` int(255) NOT NULL,
  `pitanje` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pitanja`
--

INSERT INTO `pitanja` (`idPitanja`, `pitanje`) VALUES
(1, 'Koji je glavni grad Srbije?'),
(2, 'Koji grad je najveći u jugoističnoj Srbiji?'),
(3, 'Koji grad je najveći grad Autonomne Pokrajine Vojvodine?'),
(4, 'Koji grad je najseverniji grad Srbije?'),
(5, 'Koji grad priprada Mačvanskom okrugu?'),
(6, 'Koji grad se nalazi u blizini granice sa Bosnom i Hercegovinom?'),
(7, 'Koji je poštanski broj za Kruševac?'),
(8, 'Koji grad se nalazi na rekama Ibru,Zapadnoj Moravi i Ribnici?'),
(9, 'Koji grad pripada Kolubarskom okrugu?'),
(10, 'Koji grad pripada Zlatiborskom okrugu?'),
(11, 'Koji grad pripada Pomoravskom okrugu?'),
(12, 'Koji grad se nalazi u blizini Stare planine?'),
(13, 'U kom gradu se nalazi Spomenik zahvalnosti Francuskoj?'),
(14, 'Koji grad je bio prva srpska prestonica?'),
(15, 'U blizi kog grada se nalazi arheološko nalazište Gamzigrad?');

-- --------------------------------------------------------

--
-- Table structure for table `rezultat`
--

CREATE TABLE `rezultat` (
  `idRez` int(255) NOT NULL,
  `rezultatKor` int(50) NOT NULL,
  `idKorisnika` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `idUloge` int(50) NOT NULL,
  `imeUloge` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`idUloge`, `imeUloge`) VALUES
(1, 'admin'),
(2, 'korisnik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `futer`
--
ALTER TABLE `futer`
  ADD PRIMARY KEY (`idFuter`);

--
-- Indexes for table `gradovi`
--
ALTER TABLE `gradovi`
  ADD PRIMARY KEY (`idGrada`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnika`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`),
  ADD KEY `idUloge` (`idUloge`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`),
  ADD UNIQUE KEY `naziv` (`naziv`);

--
-- Indexes for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD PRIMARY KEY (`idOdgovora`),
  ADD KEY `idPitanja` (`idPitanja`);

--
-- Indexes for table `pitanja`
--
ALTER TABLE `pitanja`
  ADD PRIMARY KEY (`idPitanja`);

--
-- Indexes for table `rezultat`
--
ALTER TABLE `rezultat`
  ADD PRIMARY KEY (`idRez`),
  ADD KEY `idKorisnika` (`idKorisnika`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`idUloge`),
  ADD UNIQUE KEY `imeUloge` (`imeUloge`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `futer`
--
ALTER TABLE `futer`
  MODIFY `idFuter` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gradovi`
--
ALTER TABLE `gradovi`
  MODIFY `idGrada` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnika` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `odgovor`
--
ALTER TABLE `odgovor`
  MODIFY `idOdgovora` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pitanja`
--
ALTER TABLE `pitanja`
  MODIFY `idPitanja` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rezultat`
--
ALTER TABLE `rezultat`
  MODIFY `idRez` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `idUloge` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`idUloge`) REFERENCES `uloge` (`idUloge`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `odgovor`
--
ALTER TABLE `odgovor`
  ADD CONSTRAINT `odgovor_ibfk_1` FOREIGN KEY (`idPitanja`) REFERENCES `pitanja` (`idPitanja`) ON DELETE CASCADE;

--
-- Constraints for table `rezultat`
--
ALTER TABLE `rezultat`
  ADD CONSTRAINT `rezultat_ibfk_1` FOREIGN KEY (`idKorisnika`) REFERENCES `korisnik` (`idKorisnika`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
