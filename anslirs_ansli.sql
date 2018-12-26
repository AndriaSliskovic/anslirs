-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 12, 2018 at 10:07 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anslirs_ansli`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oblast_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `oblast_id`, `created_at`, `updated_at`) VALUES
(1, 'Novi propisi', 1, '2018-10-24 12:18:42', '2018-11-20 12:22:36'),
(2, 'Softver proizvod', 2, '2018-10-24 12:18:42', '2018-11-26 11:26:55'),
(3, 'Softver obavestenje', 2, '2018-10-24 12:18:42', '2018-11-26 09:23:59'),
(4, 'Opste obavestenje', 3, '2018-10-24 12:18:42', '2018-11-20 13:01:42'),
(5, 'Agencija post', 1, '2018-10-24 12:18:42', '2018-11-26 09:25:02'),
(6, 'Softver post', 2, '2018-10-24 12:18:42', '2018-11-26 09:24:16'),
(7, 'Agencija obaveštenje', 1, '2018-10-24 12:18:42', '2018-11-26 09:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `dokumentis`
--

DROP TABLE IF EXISTS `dokumentis`;
CREATE TABLE IF NOT EXISTS `dokumentis` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opis` longtext COLLATE utf8mb4_unicode_ci,
  `putanja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oblast_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `vremeIzrade` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dokumentis_oblast_id_foreign` (`oblast_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumentis`
--

INSERT INTO `dokumentis` (`id`, `name`, `opis`, `putanja`, `oblast_id`, `vremeIzrade`, `created_at`, `updated_at`) VALUES
(5, 'M A obrazac', NULL, 'uploads/dokumenti/1543677434_M-A obrazac.pdf', 1, '2018-11-26', '2018-12-01 14:17:14', '2018-12-01 14:17:14'),
(6, 'IPONO obrazac', 'пореско ослобођење недобитне организације', 'uploads/dokumenti/1543677534_IPONO.pdf', 1, '2015-11-12', '2018-12-01 14:18:54', '2018-12-01 14:18:54'),
(7, 'INZS', NULL, 'uploads/dokumenti/1543678087_INSZ obrazac.pdf', 1, '2014-10-09', '2018-12-01 14:28:07', '2018-12-01 14:28:07'),
(8, 'M obrazac', 'ПРИЈАВА, ПРОМЕНА И ОДЈАВА НА ОБАВЕЗНО СОЦИЈАЛНО ОСИГУРАЊЕ', 'uploads/dokumenti/1543678165_prijava_na_obavezno_socijalno_osiguranje-obrazac_m.pdf', 1, '2014-11-13', '2018-12-01 14:29:25', '2018-12-01 14:29:25'),
(9, 'Raskid radnog odnosa', 'SPORAZUM o prestanku radnog odnosa', 'uploads/dokumenti/1543678258_sporazum_o_prestanku_radnog_odnosa.pdf', 1, '2012-08-21', '2018-12-01 14:30:58', '2018-12-01 14:30:58'),
(10, 'PBN 1', NULL, 'uploads/dokumenti/1543678320_PBN 1.pdf', 1, '2014-10-14', '2018-12-01 14:32:00', '2018-12-01 14:32:00'),
(11, 'PB2 2', NULL, 'uploads/dokumenti/1543678365_PB2-2.pdf', 1, '2014-02-05', '2018-12-01 14:32:45', '2018-12-01 14:32:45'),
(12, 'EPP DV', NULL, 'uploads/dokumenti/1543678408_EPPDV.pdf', 1, '2016-11-01', '2018-12-01 14:33:28', '2018-12-01 14:33:28'),
(13, 'PP OPJ', NULL, 'uploads/dokumenti/1543678446__pp-opj.pdf', 1, '2012-07-04', '2018-12-01 14:34:06', '2018-12-01 14:34:06'),
(14, 'PP DG1', NULL, 'uploads/dokumenti/1543678490_PPDG-1.pdf', 1, '2011-04-06', '2018-12-01 14:34:50', '2018-12-01 14:34:50'),
(15, 'PBN 1', NULL, 'uploads/dokumenti/1543678529_PBN 1.pdf', 1, '2011-01-26', '2018-12-01 14:35:29', '2018-12-01 14:35:29'),
(16, 'PP DG 1', NULL, 'uploads/dokumenti/1543678556_PPDG-1.pdf', 1, '2015-10-26', '2018-12-01 14:35:56', '2018-12-01 14:35:56'),
(17, 'PPPDV', NULL, 'uploads/dokumenti/1543678587_pppdv.pdf', 1, '2016-06-01', '2018-12-01 14:36:27', '2018-12-01 14:36:27'),
(18, 'PPP PO', NULL, 'uploads/dokumenti/1543678624_PPP PO.pdf', 1, '2011-01-19', '2018-12-01 14:37:04', '2018-12-01 14:37:04'),
(19, 'PP OPJ 3', NULL, 'uploads/dokumenti/1543678652_PP_OPJ-3.pdf', 1, '2016-10-05', '2018-12-01 14:37:32', '2018-12-01 14:37:32'),
(20, 'PK 2014', NULL, 'uploads/dokumenti/1543678721_pk 2014.pdf', 1, '2014-11-06', '2018-12-01 14:38:41', '2018-12-01 14:38:41'),
(21, 'PDP 2015', NULL, 'uploads/dokumenti/1543678752_PDP 2015.pdf', 1, '2015-11-26', '2018-12-01 14:39:12', '2018-12-01 14:39:12'),
(22, 'PP OPJ 6', NULL, 'uploads/dokumenti/1543678811__pp-opj-6.pdf', 1, '2016-09-07', '2018-12-01 14:40:11', '2018-12-01 14:40:11'),
(23, 'PP OPJ 1', NULL, 'uploads/dokumenti/1543678839__pp-opj-1.pdf', 1, '2013-02-20', '2018-12-01 14:40:39', '2018-12-01 14:40:39'),
(24, 'PP OD 0', NULL, 'uploads/dokumenti/1543678868_PP od-0.pdf', 1, '2016-11-22', '2018-12-01 14:41:08', '2018-12-01 14:41:08'),
(25, 'BU P', NULL, 'uploads/dokumenti/1543678917_BU-p.pdf', 1, '2013-11-04', '2018-12-01 14:41:57', '2018-12-01 14:41:57'),
(26, 'PB 2', NULL, 'uploads/dokumenti/1543678988_PB 2.pdf', 1, '2012-01-12', '2018-12-01 14:43:08', '2018-12-01 14:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `putanja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT '1',
  `tezina` int(11) DEFAULT '1',
  `oblast_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_oblast_id_foreign` (`oblast_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `putanja`, `level`, `tezina`, `oblast_id`, `created_at`, `updated_at`) VALUES
(1, 'Početna', 'home', 5, 1, 2, '2018-10-24 12:18:42', '2018-11-15 12:30:02'),
(2, 'Knjigovodstvo', 'agencija', 3, 1, 3, '2018-10-24 12:18:42', '2018-11-20 12:02:44'),
(3, 'Softver', 'softver', 5, 3, 2, '2018-10-24 12:18:42', '2018-11-20 12:59:42'),
(4, 'Novosti', 'vesti', 1, 1, 3, '2018-11-20 13:57:27', '2018-11-20 13:57:27'),
(5, 'O nama', 'about', 1, 1, 3, '2018-11-21 11:10:57', '2018-11-21 11:10:57'),
(6, 'Kontakt', 'kontakt', 1, 1, 3, '2018-11-21 13:08:22', '2018-11-21 13:08:22'),
(7, 'Dokumenta', 'download', 1, 1, 1, '2018-11-27 13:04:12', '2018-11-27 13:04:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(35, '2018_03_18_153530_create_password_resets_table', 1),
(36, '2018_10_24_000001_tabela_setting', 1),
(37, '2018_10_24_000002_tabela_oblast', 1),
(38, '2018_10_24_000003_tabela_tipovi', 1),
(39, '2018_10_24_000011_tabela_user', 1),
(40, '2018_10_24_000012_tabela_categorys', 1),
(41, '2018_10_24_000013_tabela_menu', 1),
(42, '2018_10_24_000014_create_profiles_table', 1),
(43, '2018_10_24_000021_tabela_post', 1),
(53, '2018_11_14_094821_tabela_sect_cat', 2),
(54, '2018_11_14_095027_tabela_section', 2),
(55, '2018_11_27_102325_tabela_dokumenti', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oblasts`
--

DROP TABLE IF EXISTS `oblasts`;
CREATE TABLE IF NOT EXISTS `oblasts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oblasts`
--

INSERT INTO `oblasts` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Knjigovodstvo', '2018-10-24 12:18:42', '2018-10-26 09:31:49'),
(2, 'Softver', '2018-10-24 12:18:42', '2018-10-26 09:32:06'),
(3, 'Razno', '2018-10-24 12:18:42', '2018-10-26 09:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naslov` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sadrzaj` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `vremeIzrade` date DEFAULT NULL,
  `skill` int(11) DEFAULT NULL,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `tipovi_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_category_id_foreign` (`category_id`),
  KEY `posts_tipovi_id_foreign` (`tipovi_id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `naslov`, `slug`, `sadrzaj`, `vremeIzrade`, `skill`, `slika`, `category_id`, `tipovi_id`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Osnovana kompanije ANSLI D.O.O.', 'osnovana-kompanije-ansli-doo', '<p class=\"MsoNormal\">Posle 15 godina uspešnog poslovanja agencija&nbsp; “Knjigovodstvo” postaje ANSLI D.O.O.</p>\r\n\r\n<p class=\"MsoNormal\">Malo smo porasli, tako da ćemo sada odvojiti naše poslovanje\r\nna knjigovodstvenu agenciju I na izradu softvera za agencije.</p>\r\n\r\n<p class=\"MsoNormal\">Pored uobičajenog kvaliteta i usluga na koje su navikli naši\r\nkomitenti, pojačali smo naš softverski tim i imamo nameru da poboljšamo našu\r\nkao i da unapredimo naše postojeće softverske pakete.</p>\r\n\r\n<p class=\"MsoNormal\">Uskoro možete očekivati punu tehničku podršku za sve naše proizvode,\r\nizradu novog softvera kao i prilagođavanje svim potrebama naših cenjenih\r\nkomitenata.</p>\r\n\r\n<p class=\"MsoNormal\">Knjigovodsvena agencija nastavlja u standardnom sastavu, sa\r\nprepoznatljivim načinom rada i maksimalno kvalitetnom uslugom.</p>\r\n\r\n<p class=\"MsoNormal\">Sa osnivanjem ANSLI D.O.O. pokrenuli smo i naš zvaničan sajt\r\nna adresi <a href=\"http://www.ansli.rs/\">www.ansli.rs</a> gde možete pratiti\r\nnaše aktivnosti, novosti iz sveta finansija, propise kao i sve korisne linkove\r\nkoji su neophodni za Vaše poslovanje.</p>\r\n\r\n<p class=\"MsoNormal\">Unapred se radujemo našoj budućoj saradnji i svaki predlog,\r\nprimedba i sugestija su svakako dobrodošli.</p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem,</p>\r\n\r\n<p class=\"MsoNormal\">Andria Slišković</p>\r\n\r\n<p class=\"MsoNormal\">direktor ANSLI D.O.O.</p>', '2008-12-10', 5, 'uploads/postovi/1542981608_karusel ansli.png', 4, 3, 5, '2018-10-24 12:18:42', '2018-11-23 13:00:08'),
(9, 'Knjigovodsvene usluge za preduzetnike i pravna lica', 'knjigovodsvene-usluge-za-preduzetnike-i-pravna-lica', '<p class=\"MsoNormal\">Agencija knjigovodstvo koja je osnovana 1993. godine\r\nnastavlja sa radom sada kao privredno duštvo ANSLI D.O.O. . Sa svim našim cenjenim\r\nkomitentima nastavljamo saradnju pod važećim uslovima.</p>\r\n\r\n<p class=\"MsoNormal\">Poslovne knjige vodimo za preduzetnike kao i za pravna lica\r\npo sistemu dvojnog knjigovodstva.</p>\r\n\r\n<p class=\"MsoNormal\">U standardnom paketu vršimo uslugu robnog i materijalnog\r\nknjigovodstva, izradu završnih računa, vođenja glavne knjige, praćenje propisa\r\ni slične knjigovodstvene poslove.</p>\r\n\r\n<p class=\"MsoNormal\">Kao dodatne usluge vršimo poresko savetovanje, zastupanje\r\npred državnim organima, pravne savete u vezi finansija i poreskog postupka,\r\nkurirske usluge kao i konsultantske usluge iz raznih oblasti.</p>\r\n\r\n<p class=\"MsoNormal\">U buduće ćemo se truditi da još više poboljšamo našu uslugu\r\ni da proširimo aktivnosti u još više sfera delatnosti, u zavisnosti od potreba naših\r\nkomitenata.</p>\r\n\r\n<p class=\"MsoNormal\">Ažurnost nam je na prvom mestu, kao i neposredan i\r\npravovremeni kontakt sa našim komitentima. Nadamo se uspešnoj saradnji u\r\nbudućnosti kako postojećim tako i budućim komitentima.</p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem,</p>\r\n\r\n<p class=\"MsoNormal\">Jelena Slišković</p>\r\n\r\n<p class=\"MsoNormal\">rukovodilac knjigovodstvene agencije ANSLI D.O.O.</p>', '2008-12-10', 5, 'uploads/postovi/1542979680_Knjig_skill_5.jpg', 4, 3, 6, '2018-10-26 08:20:19', '2018-11-23 12:28:00'),
(15, 'Softver - izrada knjigovodstvenih programa', 'softver-izrada-knjigovodstvenih-programa', '<p class=\"MsoNormal\">ANSLI D.O.O. je kompanija koja se pored knjigovodstvenih\r\nposlova bavi i izradom aplikacija za knjigovodstvene agencije. &nbsp;Naš program je već proveren i testiran u našoj\r\nagenciji a počeli smo sa distribucijom i ostalim agencijama.</p>\r\n\r\n<p class=\"MsoNormal\">Pored već dobro poznatog programa imamo i čitav niz pratećih\r\nprograma koje smo razvili za potrebe naših komitenata a koje smo spremni da\r\nunapredimo i da dalje distribuiramo.</p>\r\n\r\n<p class=\"MsoNormal\">Sa širenjem palete aplikacija nudimo i kompletnu tehničku\r\npodršku našim korisnicima kao i mogućnost unapređenja istih. Spremni smo da\r\nsvakom korisniku izađemo u susret u skladu sa njegovim zahtevima i potrebama.</p>\r\n\r\n<p class=\"MsoNormal\">Standardna verzija knjigovodstvenog programa je urađena u Microsoft\r\nAccess paketu i predstavlja modernu desk top aplikaciju koja je laka za\r\nupotrebu. Sadrži sve što je potrebno za uspešno i ažurno vođenje poslovnih\r\nknjiga.</p>\r\n\r\n<p class=\"MsoNormal\">Novim korisnicima nudimo i besplatnu obuku rada u našoj\r\naplikaciji, kao i obuku koja obuhvata osnovno poznavanje rada na računaru pod\r\nWindows okruženjem.</p>\r\n\r\n<p class=\"MsoNormal\">Više o našim postojećim proizvodima kao i novostima možete\r\nnaći u posebnom odeljku - SOFTVER našeg zvaničnog sajta koji se nalazi na\r\nadresi <a href=\"http://www.ansli.rs/\">www.ansli.rs</a> .</p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem,</p>\r\n\r\n<p class=\"MsoNormal\">dipl. ing. Andria Slišković</p>', '2008-12-10', 5, 'uploads/postovi/1542981479_slika 9.png', 4, 3, 5, '2018-11-14 13:24:23', '2018-11-23 12:57:59'),
(20, 'Srećna Nova Godina', 'srecna-nova-godina', '<p class=\"MsoNormal\">Svim našim komitentima\r\nželimo srećnu Novu Godinu.<o:p></o:p></p>\r\n\r\n<span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;mso-ansi-language:#241A;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">Jelena Slišković</span>', '2009-01-04', 2, 'uploads/postovi/1543228287_hepy_new_year_2.jpg', 5, 3, 6, '2018-11-14 13:24:23', '2018-11-26 09:31:27'),
(21, 'Srećna Nova Godina', 'srecna-nova-godina', '<p class=\"MsoNormal\">Svim našim cenjenim\r\nkorisnicima želimo srećnu i uspešnu Novu Godinu.<o:p></o:p></p><p class=\"MsoNormal\">\r\n\r\n</p><p class=\"MsoNormal\">Andria Slišković<o:p></o:p></p>', '2009-01-04', 2, 'uploads/postovi/1543228413_hepy_new_year_1.jpg', 6, 1, 5, '2018-11-14 13:24:23', '2018-11-26 09:33:33'),
(22, 'Nova verzija KNJIGOVODSTVO 3.0', 'nova-verzija-knjigovodstvo-30', '<p class=\"MsoNormal\">Svim agencijam kojima smo već isporučili naš program, počekom ove godine ćemo nadograditi već\r\npostojeću aplikaciju. Nova verzija programa ima oznaku 3.0 i u njuj su dodati\r\nnovi delovi koji pokrivaju oblasti finansiskog knjigovodstva kao i novi kontni\r\nplan.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Planiramo da pored\r\nstandardnog paketa ponudimo i tehničku podršku, obuku vaših zaposlenih kao i\r\nproširenje programa prema vašim potrebama. O svemu ovome će te biti naknadno obavešteni\r\ni kontaktirani.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Za standardni paket\r\nuslovi ostaju isti i neće biti potrebno sklapati nove ugovore.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Ukoliko želite dodatne\r\nusluge iz oblasti softvera, ponudićemo vam nove ugovore koji pokrivaju oblasti\r\nkoje su vam potrebne.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">U svakom slučaju imamo\r\nvelike planove za ovu godinu i o svemu će te biti naknadno obavešteni.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">S potovanjem,<o:p></o:p></p>\r\n\r\n<span style=\"font-size:12.0pt;font-family:&quot;Times New Roman&quot;;mso-fareast-font-family:\r\n&quot;Times New Roman&quot;;mso-ansi-language:#241A;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">Andria Slišković</span>', '2009-01-09', 5, 'uploads/postovi/1543228490_novo.png', 2, 4, 5, '2018-11-14 13:24:23', '2018-11-26 09:34:50'),
(23, 'Nova usluga - tehnička podrška', 'nova-usluga-tehnicka-podrska', '<p class=\"MsoNormal\">Ansli d.o.o. vam nudi\r\nnovu uslugu. Usluga tehnička podrška podrazumeva mesečno ažuriranje softvera,\r\nkao i otvoren telefon na kome možete dobiti sve potrebne informacije iz oblasti\r\nknjigovodstva, pravnih saveta, novih propisa i svega što je potrebno za\r\nfunkcionisanje knjigovodstvenih agencija.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Telefon na koji možete\r\npostavljati pitanja je 011-244 08 48 svakoga radnog dana od 09-15h.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Naš softverski tim je\r\nspreman da vam izađe u susret i da u zavisnosti od potreba vaših komitenata\r\nprilagodi softver, kako bi što efikasnije obavljali vašu delatnost.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Sve primedbe,\r\nsugestije i predloge nam možete proslediti van radnog vremena na naš email <a href=\"mailto:ansli@gmx.com\">ansli@gmx.com</a> .<o:p></o:p></p>', '2009-01-27', 4, 'uploads/postovi/1543228816_novo.png', 2, 1, 5, '2018-11-26 09:40:16', '2018-11-26 09:40:16'),
(24, 'Program za male trgovine – mTrgovina 1.0', 'program-za-male-trgovine-mtrgovina-10', '<p class=\"MsoNormal\">Sa zadovoljstvom vam\r\npredstavljamo naš novi proizvod – mTrgovina. Program je namenjen malim\r\ntrgovinama koje obavljaju delatnost u širokom spektru delatnosti.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Za sada je moguće\r\npovezivanje sa fiskalnim kasama proizvođača GALEB kao i sa fiskalnim štampačima\r\nistog proizvođača tipa FP-500 i FP550.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Aplikacija je urađena\r\nu MS Access paketu i moguća je dalja nadgradnja kako bi se pratio promet,\r\nporeske stope, stanje na zalihama i sl.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Za detaljnije\r\ninformacije možete se obratiti našem softverskom timu.<o:p></o:p></p>', '2010-03-12', 4, 'uploads/postovi/1543228909_novo.png', 2, 4, 5, '2018-11-26 09:41:49', '2018-11-26 09:41:49'),
(25, 'Promocija programa – mTrgovina 1.0', 'promocija-programa-mtrgovina-10', '<p class=\"MsoNormal\">U toku aprila meseca\r\nnaš tim će vršiti promociju na licu mesta našeg novog proizvoda mTrgovina\r\n1.0. Molimo naše postojeće korisnike da rezervišu termin kako bi naši\r\nprogrameri mogli što efikasnije da prezentuju novi proizvod.</p>\r\n\r\n<p class=\"MsoNormal\">Takođe svi zainteresovani koji nisu naši korisnici mogu nam\r\nse obratiti na telefon kako bi se dogovorili oko organizovanja prezentacije u\r\nvašim ili našim prostorijama.</p>', '2010-04-01', 3, 'uploads/postovi/1543228970_slika 9.png', 2, 2, 5, '2018-11-26 09:42:50', '2018-11-26 11:02:17'),
(26, 'Nadogradnja programa – mTrgovina 1.5', 'nadogradnja-programa-mtrgovina-15', '<p class=\"MsoNormal\">Nadogradili smo naš\r\nprogram za male trgovine. Nove mogućnosti su praćenje zaliha, korigovanje\r\nporeskih stopa, vođenje trgovačke knjig na licu mesta, pravljenje back up-ova i\r\njoš mnogo toga. Za više informacija kontaktirajte nas putem telefona ili preko\r\nnašeg email-a.<o:p></o:p></p>', '2011-02-22', 3, 'uploads/postovi/1543229043_vazno.png', 3, 2, 5, '2018-11-26 09:44:03', '2018-11-26 09:44:03'),
(27, 'Program BAKERY 1.0', 'program-bakery-10', '<p class=\"MsoNormal\">Sa velikim\r\nzadovoljstvom vam predstavljamo naš novi softverki paket – BAKERY 1.0 . Program\r\nje namenjen svim pekarama. Sadrži sve što je potrebno za vođenje ove pomalo\r\nspecifične delatnosti.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Namenjen je kako malim\r\npekarama, prodajnim jedinicama, tako i pekarama koji imaju sopstvenu\r\nproizvodnju. Nastao je iz višegodišnjeg iskustva agencije „Knjigovostvo“ koja\r\nse već godinama bavi ovom problematikom.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Sadrži kompletno\r\npraćenje prodaje, naručivanje robe, repromaterijala, gotovih proizvoda trećih\r\nlica. Posebna komponenta je praćenje proizvodnje, stanje magacina, utrošak\r\nmaterijala, otpis gotovih proizvoda. Tokom ovog leta će vam biti ponuđen ovaj\r\nnovi paket i demonstrirane njegove mogućnosti.<o:p></o:p></p>', '2012-06-06', 4, 'uploads/postovi/1543229099_novo.png', 2, 4, 5, '2018-11-26 09:44:59', '2018-11-26 11:02:34'),
(28, 'Program velTrgovina 1.0', 'program-veltrgovina-10', '<p class=\"MsoNormal\">Novi program iz palete\r\nprograma koje distribuira Ansli D.O.O. Program je originalno napravljen za\r\npotrebe našeg komitenta koji ima veleprodaju auto delova. Međutim uz neke\r\nkorekcije moguće ga je primeniti i u drugim oblastima. Zato smo i napravili\r\nverziju 1.0 koja se po našem mišljenju može koristiti u raznim oblicima.\r\nPotrebno je samo da nas pozovete kako bi naš tim mogao ovaj sjajan program\r\nprilagoditi vašim potrebama.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Program sadrži sledeđe\r\nkomponente:<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Ulaz robe<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Magacin\r\nveleprodaje<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Kalkulacija\r\nveleprodajnih cena<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Praćenje\r\nkupaca i dobavljača<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Plaćanja u\r\nstranoj i domaćoj valuti<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Obračun\r\nzavisnih troškova<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Formiranje\r\nveleprodajnih cena sa određenim rabatom<o:p></o:p></p>', '2012-08-23', 4, 'uploads/postovi/1543229183_novo.png', 2, 4, 5, '2018-11-26 09:46:23', '2018-11-26 09:46:23'),
(29, 'Promocija programa BAKERY 1.0', 'promocija-programa-bakery-10', '<p class=\"MsoNormal\">U toku septembra\r\nmeseca naš tim će vršiti promociju na licu mesta našeg novog proizvoda BAKERY\r\n1.0. Molimo naše postojeće korisnike da rezervišu termin kako bi naši programeri\r\nmogli što efikasnije da prezentuju novi proizvod.</p>\r\n\r\n<p class=\"MsoNormal\">Takođe svi zainteresovani koji nisu naši korisnici mogu nam\r\nse obratiti na telefon kako bi se dogovorili oko organizovanja prezentacije u\r\nvašim ili našim prostorijama.</p>', '2012-09-03', 3, 'uploads/postovi/1543229250_slika 9.png', 3, 1, 5, '2018-11-26 09:47:30', '2018-11-26 09:47:30'),
(30, 'Opis programa programa BAKERY 1.0', 'opis-programa-programa-bakery-10', '<p class=\"MsoNormal\">Program BAKERY 1.0 sadrži sve što je potrebno kako malim\r\ntako i većim pekarama. U nastavku dajemo kratak opis mogućnosti ovog našeg\r\nnovog proizvoda.</p>\r\n\r\n<p class=\"MsoNormal\">Prodaja :</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Kompletno praćenje prodaje gotovih proizvoda.</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Grupisanje proizvoda po grupama i poreskim\r\nstopama.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Grupisanje proizvoda po odeljenjima po želji\r\nkorisnika.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Prodaja trgovačke robe.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Povezanost sa fiskalnim kasama.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Magacin repromaterijala</p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-indent:36.0pt\">- Stanje repromaterijala<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Proizvodnja :</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Praćenje ukupne proizvodnje.</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Praćenje proizvodnje po odeljenjima odnosno po\r\nvrstama gotovih proizvoda.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Utrošak\r\nrepromaterijala po datim normativima.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Troškovi\r\nproizvodnje.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Magacin gotovih\r\nproizvoda<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-indent:36.0pt\">- Stanje gotovih proizvoda<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Otpis gotovih\r\nproizvoda:<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Praćenje\r\notpisa kako na dnevnom tako i na nivou definisanog perioda<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Otpis u\r\nokviru zakonskog minimuma.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Isporuka proizvoda:<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Namenjen\r\nje pekarama koje vrše prodaju sopstvenih proizvoda drugim licima.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Izrada\r\nizlaznih faktura.<o:p></o:p></p>', '2012-09-04', 5, 'uploads/postovi/1543229414_bakery_2.jpg', 2, 4, 5, '2018-11-26 09:50:14', '2018-11-26 09:50:14'),
(31, 'Program ZARADE 1.0', 'program-zarade-10', '<p class=\"MsoNormal\">Program za obračun zarada je integralni deo našeg\r\nknjigovostvenog programa namenjenog za knjigovodsvene agencije. Naš novi\r\nproizvod - Program ZARADE 1.0 je namenjem malim radnjama koje nemaju potrebu za\r\nuslugama knjigovodsvenih agencija, već samostalno vode poslovne knjige.</p>\r\n\r\n<p class=\"MsoNormal\">Sadrži sve što je\r\npotrebno da se na lak i jednostavan način obračunaju zarade za neograničeni\r\nbroj zaposlenih.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Potrebno je samo\r\njednom uneti opšte podatke za svakog zaposlenog pojedinačno i mesečno vršiti\r\nobračun zarada u zavisnosti od njihovih primanja.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Postoji mogućnost\r\npreračuna neto- bruto kao i inverzno, odnosno preračun sa bruto na neto zaradu.<o:p></o:p></p>', '2013-03-05', 4, 'uploads/postovi/1543229548_novo.png', 2, 4, 5, '2018-11-26 09:51:45', '2018-11-26 09:52:28'),
(32, 'Promocija programa – ZARADE 1.0', 'promocija-programa-zarade-10', '<p class=\"MsoNormal\">U toku aprila meseca\r\nnaš tim će vršiti promociju na licu mesta našeg novog proizvoda mTrgovina\r\n1.0. Molimo naše postojeće korisnike da rezervišu termin kako bi naši\r\nprogrameri mogli što efikasnije da prezentuju novi proizvod.</p>\r\n\r\n<p class=\"MsoNormal\">Takođe svi zainteresovani koji nisu naši korisnici mogu nam\r\nse obratiti na telefon kako bi se dogovorili oko organizovanja prezentacije u\r\nvašim ili našim prostorijama.</p>', '2013-04-01', 3, 'uploads/postovi/1543229601_soft_proiz_1.jpg', 3, 2, 5, '2018-11-26 09:53:21', '2018-11-26 11:02:57'),
(33, 'Nadogradnja programa – BAKERY 1.5', 'nadogradnja-programa-bakery-15', '<p class=\"MsoNormal\">Naš program BAKERY je unadograđen i ubačene su neke nove\r\nmogućnosti koje su se u skladu sa novim propisima pokazale kao potreba naših\r\nkorisnika. Program je testiran u nekoliko naših objekata i pokazao je punu\r\nsnagu već proverenog programskog paketa.</p>\r\n\r\n<p class=\"MsoNormal\">Tokom leta ćemo se potruditi da redizajniramo ceo program\r\nkako bi bio još bolji i lakši za upotrebu.</p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem,</p>\r\n\r\n<p class=\"MsoNormal\">Slišković Andria</p>', '2013-06-12', 4, 'uploads/postovi/1543229663_vazno.png', 3, 2, 5, '2018-11-26 09:54:23', '2018-11-26 09:54:23'),
(34, 'Promocija programa BAKERY 2.0', 'promocija-programa-bakery-20', '<p class=\"MsoNormal\">S ponosom možemo da\r\nobjavimo da je naš već dobro poznati program BAKERY unapređen u verziju 2.0. U\r\ntoku septembra meseca će po unapred određenom rasporedu izvršiti nadogradnju u\r\nvašim objektima kao i vršiti obuku kako bi se što brže navikli na novo\r\nokruženje.<o:p></o:p></p>', '2013-09-02', 3, 'uploads/postovi/1543229792_slika 9.png', 3, 2, 5, '2018-11-26 09:56:03', '2018-11-26 09:56:32'),
(35, 'Opis programa programa BAKERY 2.0', 'opis-programa-programa-bakery-20', '<p class=\"MsoNormal\">Program BAKERY 2.0 je nadograđena vaijanta programa Program\r\nBAKERY 1.0 koji se distribuira od 06.2012. godine. Pored svih prethodnih\r\nfunkcionalnosti izvršili smo neke izmene kako bi se prilagodili novim zahtevima\r\nkako starih tako i novih korisnika.</p>\r\n\r\n<p class=\"MsoNormal\">Dajemo specifikaciju već postojećih kao i novih mogućnosti\r\nnašeg proizvoda :</p>\r\n\r\n<p class=\"MsoNormal\"><i>- Potpuno novo\r\ngrafičko okruženje<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\">Prodaja :</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Kompletno praćenje prodaje gotovih proizvoda.</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Grupisanje proizvoda po grupama i poreskim\r\nstopama.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Grupisanje proizvoda po odeljenjima po želji\r\nkorisnika.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Prodaja trgovačke robe.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Povezanost sa fiskalnim kasama.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Mogućnost\r\ndinamičkog praćenja prometa u toku radnog dana.</i><i><o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Dinamička\r\nizrada cenovnika</i><i><o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Stanje gotovog novca<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Knjiga evidencije prometa i usluga<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\">Magacin repromaterijala</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Stanje repromaterijala.</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Upit stanja za\r\nprethodni period<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\">Proizvodnja :</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Praćenje ukupne proizvodnje.</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Praćenje proizvodnje po odeljenjima odnosno po\r\nvrstama gotovih proizvoda.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Utrošak\r\nrepromaterijala po datim normativima.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Troškovi\r\nproizvodnje.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Proizvodnja za\r\nsvaki poseban proizvod kao i troškovnik datog proizvoda<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Troškovnik\r\nproizvodnje sa ukalkulisanim inputima<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\">Magacin gotovih\r\nproizvoda<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"text-indent:36.0pt\">- Stanje gotovih proizvoda<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Otpis gotovih\r\nproizvoda:<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Praćenje\r\notpisa kako na dnevnom tako i na nivou definisanog perioda<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Otpis u\r\nokviru zakonskog minimuma.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Isporuka proizvoda:<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Namenjen\r\nje pekarama koje vrše prodaju sopstvenih proizvoda drugim licima.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Izrada otpremnica\r\nza svakog kupca pojedinačno<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Izrada zbirnih\r\notpremnica za određeni period<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Izrada faktura\r\nprema kupcima<o:p></o:p></i></p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]--><i>Praćenje plaćanja\r\npo izdatim fakturama<o:p></o:p></i></p>', '2013-09-16', 5, 'uploads/postovi/1543229848_bakery_2.jpg', 2, 4, 5, '2018-11-26 09:57:28', '2018-11-26 09:57:28'),
(36, 'Obaveštenje komitentima – Poreska uprava', 'obavestenje-komitentima-poreska-uprava', '<p class=\"MsoNormal\">Početkom 2014. godine poreska uprava uvodi novi servis –\r\neUprava. Po našim saznanjima radi se o gotovo revolucionarnom servisu. Naime\r\nodlazak u poresku upravu i sva mučenja koja su se do sada podrazumevala, odlazi\r\nu istoriju.</p>\r\n\r\n<p class=\"MsoNormal\">Naš softverski tim će se prilagoditi novim okolnostima i o\r\ntome će te biti naknadno obavešteni.</p>\r\n\r\n<p class=\"MsoNormal\"><o:p>&nbsp;</o:p></p>', '2013-12-16', 3, 'uploads/postovi/1543229903_vazno.png', 3, 2, 5, '2018-11-26 09:58:23', '2018-11-26 09:58:23'),
(37, 'Obaveštenje komitentima – Elektronski potpis', 'obavestenje-komitentima-elektronski-potpis', '<p class=\"MsoNormal\">U skladu sa novim servisom poreske uprave obaveštavamo naše\r\nkomitente da nabave sertifikate kako bi mogli nesmetano da vrše elektronsko\r\npotpisivanje dokumenata. Ovo se prevashodno odnosi na naše komitente koji\r\nkoriste programe KNJIGOVODSTVO i ZARADE.</p>\r\n\r\n<p class=\"MsoNormal\">Po našim saznanjima do sada su dostupni elektronski potpisi\r\nod sledećih sertifikacionih tela :</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->MUP Srbije</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Privredna komora Srbije (PKS)</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Pošta Srbije (PTT)</p>\r\n\r\n<p class=\"MsoNormal\" style=\"margin-left:36.0pt;text-indent:-18.0pt;mso-list:l0 level1 lfo1;\r\ntab-stops:list 36.0pt\"><!--[if !supportLists]-->-<span style=\"font-variant-numeric: normal; font-variant-east-asian: normal; font-stretch: normal; font-size: 7pt; line-height: normal; font-family: &quot;Times New Roman&quot;;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;\r\n</span><!--[endif]-->Halkom</p>', '2013-12-23', 3, 'uploads/postovi/1543229994_vazno.png', 3, 2, 5, '2018-11-26 09:59:35', '2018-11-26 09:59:54'),
(38, 'Legalnost softvera', 'legalnost-softvera', '<p class=\"MsoNormal\">Poštovai korisnici naših usluga i proizvoda. Ovih dana je\r\nPoreska uprava poslala cirkularno pismo svim privrednim subjektima o potrebi\r\nkorišćenja legalnog softvera.</p>\r\n\r\n<p class=\"MsoNormal\">Kako su naše aplikacije urađene u Microsoftovom paketu\r\nAccess i kako se radi o desk top aplikacijama , dužni smo da vas obavestimo da\r\nste u obavezi da kupite legalnu verziju Accessa za svaku jedinicu posebno na\r\nkojoj koristite naše programe. Ovo se naravno ne odnosi na komitente koji već\r\nimaju legalan softver.</p>\r\n\r\n<p class=\"MsoNormal\">Takođe napominjemo da svi komitenti koji rade pod Windows\r\nokruženjem takođe moraju imati legalnu verziju Windowsa koji koriste.</p>\r\n\r\n<p class=\"MsoNormal\">Predlažemo da komitenti koji ne žele da legalizuju svoj\r\nWindows imaju alternativu instaliranja Linux operativnog sistema koji je\r\npotpuno besplatan.</p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem,</p>\r\n\r\n<p class=\"MsoNormal\">Andria Slišković</p>', '2014-05-15', 3, 'uploads/postovi/1543230093_vazno.png', 3, 2, 5, '2018-11-26 10:01:33', '2018-11-26 10:01:33'),
(39, 'Obaveštenje - Web aplikacije', 'obavestenje-web-aplikacije', '<p class=\"MsoNormal\">Suočeni sa problemom legalnosti softvera, naročito\r\nMicrosoftovog Accessa i povećanim troškovima instalacije istog kao i korišćenja\r\nnaših desk top aplikacija, obaveštavamo naše korisnike da će naš tim početi\r\nizradu potpuno novih knjigovodstvenih i ostalih programa koji se zasnivaju na\r\nweb tehnologiji.</p>\r\n\r\n<p class=\"MsoNormal\">U tom slučaju nećete biti u obavezi plaćanja Microsoftu za\r\nnjihove pakete.</p>\r\n\r\n<p class=\"MsoNormal\">S obzirom na kompleksnost problema molimo naše komitente za\r\nstrpljenje. Planirani završetak web aplikacija je do kraja ove godine.</p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem</p>\r\n\r\n<p class=\"MsoNormal\">Andria Slišković</p>', '2016-02-15', 3, 'uploads/postovi/1543913840_karusel ansli.png', 3, 2, 5, '2018-11-26 10:02:31', '2018-12-04 07:57:20'),
(40, 'Web programiranje', 'web-programiranje', '<p class=\"MsoNormal\">S obzirom na trendove na tržištu obaveštavamo kako naše\r\nsadašnje tako i buduće korisnike da će se Ansli D.O.O. pored svega prethodnog\r\nbaviti i web programiranjem. Planiramo da naše postojeće programe potpuno\r\npreuredimo i da ih izradimo kao web aplikacije. U tom slučaju ćemo prevazići\r\nproblem sa legalnosti softvera i svim troškovima vezanim za to.</p>', '2016-04-14', 4, 'uploads/postovi/1543913784_karusel ansli.png', 3, 4, 5, '2018-11-26 10:03:45', '2018-12-04 07:56:24'),
(41, 'Izrada web sajtova', 'izrada-web-sajtova', '<p class=\"MsoNormal\">Ansli D.O.O. nudi novu uslugu – izradu web sajtova.\r\nSoftverski tim i njegovi saradnici su spremni da izađu u susret svim zahtevima\r\nnaših korisnika. Trudićemo se da pružimo maksimalan kvalitet kao i do sada. Ovo\r\nje nova oblast i nove mogućnosti koje su pred svima nama.</p>\r\n\r\n<p class=\"MsoNormal\">Softverski tim se sadrži od iskusnih inženjera kao i mladih\r\nsaradnika, tako da smatramo da smo u mogućnosti da ispunimo sve zahteve\r\nsavremenog tržišta. Naravno kvalitet je uvek na prvom mestu.</p>', '2016-09-26', 4, 'uploads/postovi/1543230331_soft3.png', 2, 4, 5, '2018-11-26 10:05:31', '2018-11-26 10:05:31'),
(42, 'Novi sajt – ANSLI D.O.O.', 'novi-sajt-ansli-doo', '<p class=\"MsoNormal\">Prošlo je već skoro osam godina od osnivanja Ansli D.O.O. i\r\npokretanja zvaničnog sajta na <a href=\"http://www.ansli.rs/\">www.ansli.rs</a> .\r\nČast nam je da vam predstavimo novi izgled našeg sajta koji je sačinio naš tim.\r\nZadržali smo sve naše stare postove i obaveštenja kako bi zadržali kontinuitet.\r\nU odeljku – O NAMA možete videti nove članove našeg softverskog tima. Imamo\r\nprogramere različitih profila kako za bac end tako i za front end web\r\nprogramiranje.</p>\r\n\r\n<p class=\"MsoNormal\">Ambicija nam je da se ubuduće još više pojačamo i unapredimo\r\nnašu uslugu.</p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem,</p>\r\n\r\n<p class=\"MsoNormal\">Slišković Andria – direktor</p>', '2017-10-27', 4, 'uploads/postovi/1543230410_soft1.png', 2, 4, 5, '2018-11-26 10:06:50', '2018-12-03 12:12:38'),
(43, 'Novosti na novom sajtu ANSLI D.O.O.', 'novosti-na-novom-sajtu-ansli-doo', '<p class=\"MsoNormal\">U okviru novog sajta postavili smo poseban odeljak sa\r\nnovostima, gde se nalaze sve već objavljene vesti iz poslovanja Ansli D.O.O. .\r\nSve buduće korisne novosti će se od sada nalaziti u tom odeljku poređani po\r\ndatumima. Nismo želeli da brišemo stare objave iz čisto sentimentalnih razloga.</p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem</p>\r\n\r\n<p class=\"MsoNormal\">Andria Slišković</p>', '2017-11-13', 3, 'uploads/postovi/1543913634_vazno.png', 3, 2, 5, '2018-11-26 10:08:10', '2018-12-04 07:53:54'),
(44, 'Nadogradnja programa – BAKERY 2.5', 'nadogradnja-programa-bakery-25', '<p class=\"MsoNormal\">Nadogradili smo našu desk top aplikaciju namenjenu za\r\npekare. Dodali smo neke nove funkcionalnosti i poboljšali performanse same aplikacije.\r\nOmogućeno je da u isto vreme radi više operatera na povezanim računarima u\r\nmreži. U toku sledećeg meseca ćemo posetiti naše korisnike gde ćemo izvršiti\r\ninastalaciju i obuku zaposlenih koji rade u aplikaciji. Sve ove izmene kao i\r\nobuka zaposlenih će bit izvršeno u okviru redovnog održavanja tako da neće biti\r\nnikakvih dodatnih troškova.</p>', '2016-12-12', 4, 'uploads/postovi/1543230548_bakery_2.jpg', 2, 4, 5, '2018-11-26 10:09:08', '2018-11-26 10:09:08'),
(45, 'Obaveštenje komitentima – Direktori el. potpis', 'obavestenje-komitentima-direktori-el-potpis', '<p class=\"MsoNormal\">Po našim saznanjima svi direktori privrednih subjekata kao i\r\nvlasnici SZTR-a će biti u obavezi da imaju kvalifikovani elektronski potpis,\r\nodnosno sertifikat izdat od ovlašćenog sertifikacionog tela, kako bi mogli da\r\npotpisuju Završne račune i ostala dokumenta.</p>', '2014-01-10', 3, 'uploads/postovi/1543238254_novo.png', 7, 2, 6, '2018-11-26 12:14:58', '2018-11-26 12:17:34'),
(46, 'Obaveštenje komitentima – Završni računi', 'obavestenje-komitentima-zavrsni-racuni', '<p class=\"MsoNormal\">Prema važećim\r\npropisima završni računi će i 2014. godine moći da se podnose u papirnoj\r\nformi. Naravno to će biti moguće i u elektronskom obliku kod komitenata koji\r\nimaju elektronski sertifikat.</p>', '2014-01-10', 3, 'uploads/postovi/1543238223_vazno.png', 7, 2, 6, '2018-11-26 12:17:03', '2018-11-26 12:17:03'),
(47, 'Predaja M4 obrazaca', 'predaja-m4-obrazaca', '<p class=\"MsoNormal\">Predaja M4 obrazaca će se po novim pravilima podnositi u\r\nelektronskom obliku. Krajnji rok za podnošenje je 30.04.2014. Molimo komitente\r\nda nam blagovremeneo dostave dokumentaciju.</p>\r\n\r\n<p class=\"MsoNormal\">Slišković Jelena<o:p></o:p></p>', '2014-03-03', 3, 'uploads/postovi/1543238323_vazno.png', 7, 2, 6, '2018-11-26 12:18:43', '2018-11-26 12:18:43'),
(48, 'Predaja završnih računa za 2014. godinu', 'predaja-zavrsnih-racuna-za-2014-godinu', '<p class=\"MsoNormal\">Od 2015. godine\r\npredaja završnih računa će biti moguća samo u elektronskoj formi putem posebne\r\naplikacije Agencije za privredne registre. Svim našim konitentima agencija\r\nKnjigovodstvo će kao i dosada predavati završne račune, međutim konačni potpis\r\nće stavljati direktori odnosno ovlašćena lica. Zato molimo sve komitente da\r\nukoliko do sada nisu pribavili elektronske potpise da to učine u što kraćem\r\nvremenskom periodu.<o:p></o:p></p>', '2015-01-20', 3, 'uploads/postovi/1543238377_vazno.png', 7, 2, 6, '2018-11-26 12:19:37', '2018-11-26 12:19:37'),
(49, 'Novi M4 obrazac', 'novi-m4-obrazac', '<p class=\"MsoNormal\">U delu – dokumenti\r\nmožete preuzeti novi M4 obrazac. Ovaj obrazac je propisan Zakonom i mogu ga\r\nkoristiti i pravna lica i preduzetnici.<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">S poštovanjem<o:p></o:p></p>\r\n\r\n<p class=\"MsoNormal\">Slišković Jelena<o:p></o:p></p>', '2014-03-20', 3, 'uploads/postovi/1543238464_novo.png', 7, 2, 6, '2018-11-26 12:21:04', '2018-11-26 12:21:04');
INSERT INTO `posts` (`id`, `naslov`, `slug`, `sadrzaj`, `vremeIzrade`, `skill`, `slika`, `category_id`, `tipovi_id`, `user_id`, `created_at`, `updated_at`) VALUES
(50, 'CROSO – novi servis', 'croso-novi-servis', '<p class=\"MsoNormal\">Centralni registar je\r\nomogućio novi servis prijavljivanja i odjavljivanja zaposlenih. Agencija\r\nKnjigovodstvo će kao i do sada svojim komitentima pružati tu usluga, ali\r\nostavljena je mogućnost da svako ovlašćeno lice ima pristup servisu i\r\nsamostalno prijavljuje&nbsp; odjavljuje svoje\r\nzaposlene. Potrebno je imati elektronski potpis i pratiti uputstva koja su data\r\nna zvaničnom sajtu Centralnog Registra.<o:p></o:p></p>', '2014-09-05', 3, 'uploads/postovi/1543238518_novo.png', 7, 2, 6, '2018-11-26 12:21:58', '2018-11-26 12:21:58'),
(51, 'Ograničena maloprodajna cena hleba', 'ogranicena-maloprodajna-cena-hleba', '<p class=\"MsoNormal\">Doneta je uredba o\r\nograničenju cene hleba. Ovo je važno za komitente koji se bave pekarskom\r\ndelatnošću i koji svoje cene treba da usklade u skladu sa ovom uredbom. Za više\r\ninformacija kontaktiraće vas vaš knjigovođa.<o:p></o:p></p>', '2014-10-02', 3, 'uploads/postovi/1543238633_vazno.png', 7, 2, 6, '2018-11-26 12:23:08', '2018-11-26 12:23:53'),
(52, 'Poreska Uprava – porezi i doprinosi, novi servis', 'poreska-uprava-porezi-i-doprinosi-novi-servis', '<p class=\"MsoNormal\">Poreska uprava je\r\nomogućila pregled i praćenje uplata poreza za fizička lica i samostalne\r\ndelatnosti preko svog portala. Potrebno je samo da se registrujete na portal i\r\nda pratite uputstva.<o:p></o:p></p>', '2015-01-16', 3, 'uploads/postovi/1543238701_novo.png', 7, 2, 6, '2018-11-26 12:25:01', '2018-11-26 12:25:01'),
(53, 'Predaja završnih računa za 2015. godinu', 'predaja-zavrsnih-racuna-za-2015-godinu', '<p class=\"MsoNormal\">Predaja završnih računa za 2015. godinu se vrši kao i do\r\nsada preko portala APR-a, s tim što je omogućeno i samostalnim delatnostima da\r\nkoriste aplikaciju na isti način. Molimo komitente da na vreme dostave\r\ndokumentaciju.</p>', '2016-01-13', 3, 'uploads/postovi/1543238749_vazno.png', 7, 2, 6, '2018-11-26 12:25:49', '2018-11-26 12:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `avatar`, `user_id`, `about`, `facebook`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'uploads/users/1540552678_AndriaProfil-2.jpg', 1, NULL, NULL, NULL, '2018-10-24 12:18:42', '2018-10-26 09:18:48'),
(2, 'uploads/users/1540553182_user_33.jpg', 3, '1', NULL, NULL, '2018-10-26 09:19:03', '2018-10-26 10:22:14'),
(3, 'uploads/users/default.png', 2, NULL, NULL, NULL, '2018-10-26 09:21:35', '2018-10-26 09:21:35'),
(4, 'uploads/users/1540553441_89.jpg', 4, NULL, NULL, NULL, '2018-10-26 09:28:25', '2018-10-26 09:30:41'),
(5, 'uploads/users/1542789058_1537520174_AndriaProfil-2.jpg', 5, NULL, NULL, NULL, '2018-11-21 07:30:58', '2018-11-21 07:32:03'),
(6, 'uploads/users/1542979848_jelena_avatar.jpg', 6, NULL, NULL, NULL, '2018-11-21 07:51:20', '2018-11-23 12:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sec_id` int(10) UNSIGNED NOT NULL,
  `naslov` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `podnaslov` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sadrzaj` longtext COLLATE utf8mb4_unicode_ci,
  `slika` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sections_sec_id_foreign` (`sec_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sec_id`, `naslov`, `podnaslov`, `sadrzaj`, `slika`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'ANSLI D.O.O.', 'Kompletna usluga na jednom mestu', 'Osnovano 2008. godine', 'uploads/section/1542809655_karusel ansli.png', NULL, '2018-11-14 10:51:58', '2018-11-21 13:14:15'),
(2, 1, 'Knjigovodstvo', 'Kompletne knjigovodstvene usluge', NULL, 'uploads/section/1542196519_karusel kjnigovodstvo.png', NULL, '2018-11-14 10:55:19', '2018-11-14 10:55:19'),
(3, 1, 'Softver', 'Izrada knjigovodstvenih i svih pratećih programa', NULL, 'uploads/section/1542200039_karusel softver.png', NULL, '2018-11-14 11:53:59', '2018-11-14 11:53:59'),
(4, 2, 'Agencija Knjigovodsvto', NULL, NULL, 'uploads/section/1542202963_knjig1000x1222.jpg', NULL, '2018-11-14 12:02:03', '2018-11-14 12:42:43'),
(5, 3, 'Knjigovodstveni softver', NULL, NULL, 'uploads/section/1542203290_softv1000x1222.jpg', NULL, '2018-11-14 12:48:10', '2018-11-14 12:48:10'),
(6, 4, 'O nama', 'Kompletna usluga na jednom mestu', '<p>Kompanija koja se bavi knjigovodstvenim uslugama i izradom softvera za knjigovodstvene agencije.</p><p>Pored specijalističkog softvera izrađujemo i razne vrste web aplikacija po potrebi komitenata.</p>', 'uploads/section/1542196318_karusel ansli.png', NULL, '2018-11-14 13:03:23', '2018-11-21 13:24:55'),
(7, 5, 'Slišković Andria', 'direktor ANSLI D.O.O.', NULL, 'uploads/section/1542791184_AndriaProfil-2.jpg', NULL, '2018-11-15 10:01:33', '2018-11-21 08:06:24'),
(8, 6, 'Kompletna knjigovodsvena usluga', NULL, NULL, 'uploads/section/1542631745_knjig1.png', NULL, '2018-11-19 11:49:05', '2018-11-19 11:49:05'),
(9, 6, 'Praćenje propisa', NULL, NULL, 'uploads/section/1542631780_knjig2.png', NULL, '2018-11-19 11:49:40', '2018-11-19 11:49:40'),
(10, 6, 'Izrada završnih računa', NULL, NULL, 'uploads/section/1542631810_knjig3.png', NULL, '2018-11-19 11:50:10', '2018-11-19 11:50:10'),
(11, 7, 'PREDUZETNICI', 'Vođenje poslovnih knjiga preduzetnicima', NULL, 'uploads/section/1542631949_karusel kjnigovodstvo.png', NULL, '2018-11-19 11:52:29', '2018-11-19 11:52:29'),
(12, 7, 'PRAVNA LICA', 'Vođenje poslovnih knjiga pravnim licima', NULL, 'uploads/section/1542632010_knjig4.png', NULL, '2018-11-19 11:53:30', '2018-11-19 11:53:30'),
(13, 8, 'Knjigovodsveni softver', 'Izrada programa za knjigovodstvene agencije', NULL, 'uploads/section/1542721736_soft1.png', NULL, '2018-11-20 12:48:56', '2018-11-20 12:48:56'),
(14, 8, 'WEB SAJTOVI', 'Izrada web sajtova svih vrsta', NULL, 'uploads/section/1542721812_soft3.png', NULL, '2018-11-20 12:50:12', '2018-11-20 12:50:12'),
(15, 8, 'Softver za pravna lica', 'Softver za pravna lica', NULL, 'uploads/section/1542722179_slika 9.png', NULL, '2018-11-20 12:56:19', '2018-11-20 12:56:19'),
(16, 10, 'Slišković Jelena', 'Šef knjigovodstva', NULL, 'uploads/section/1542880413_jelena_avatar.jpg', NULL, '2018-11-21 08:01:06', '2018-11-22 08:53:33'),
(17, 11, 'Naš softverski tim', 'IZRADA SOFTVERA', '<div>&nbsp;&nbsp;&nbsp;&nbsp;Još davne 1994. godine u agenciji \"Knjigovodstvo\" je napravljena prva verzija knjigovodstvenog programa \"KNJIGOVODSTVO\" v1.0. Tada nismo ni slutili koliko je još posla pred nama. Sam program je tokom godina doživeo mnoga unapređenja kao i svojih nadogradnji koje su tokom godina postale nezavisne komponente. Sa rastom broja komitenata, prilagođavali smo se njihovim potrebama i zahtevima, tako da je stvorena široka paleta aplikacija. Pored standardnih knjigovodsvenih aplikacija koje su potrebne svakom knjigovođi, počeli smo sa izradom specijalizovanih programa prilagođenih zahtevima tržišta i privrede.</div><div>&nbsp;&nbsp;&nbsp;&nbsp;2008. godine je osnovana kompanija ANSLI D.O.O. koja pored standardnih knjigovodstvenih usluga pruža i usluge izrade komercijalnog softvera različitih vrsta. Naravno da je naša knjigovodstvena agencija snabdevena najboljim mogućim softverom, koji svaki knjigovođa može poželeti. Ali stvorili su se uslovi da i druge agencije imaju istu tu mogućnost. Kod nas se ažurnost podrazumeva i na raspolaganju vam je tehnička podrška kao i konstantno održavanje aplikacija.</div><div>&nbsp;&nbsp;&nbsp;&nbsp;Pored knjigovodstvenih programa imamo i širok spektar korisnih aplikacija namenjenih za trgovine, veleprodaju, proizvodnju, marketing i slično. Više o tome možete saznati u odeljku PROIZVODI, kao i u NOVOSTIMA, gde se na jedan neformalan način trudimo da sa vama podelimo naša iskustva, korisne informacije i novosti.&nbsp;&nbsp;<span style=\"font-size: 1rem; white-space: pre;\">		</span></div><div>&nbsp;&nbsp;&nbsp;&nbsp;S obzirom na trendove na tržištu i ubrzani razvoj internet usluga, naš tim ubrzano radi na prelasku sa postojećih desk-top aplikacija na web aplikacije i uskoro možete očekivati najnovije verzije svih programa koje su prilagođene modernom vremenu.</div><div>&nbsp;&nbsp;&nbsp;&nbsp;Pored svega navedenog ANSLI D.O.O. počinje i sa izradom sajtova kako za komercijane tako i za lične potrebe, koristeći najnovije trendove u sferi web-programiranja.</div><div>&nbsp;&nbsp;&nbsp;&nbsp;Naš tim čine iskusni stručnjaci u raznim oblastima izrade softvera, kao i mlade nade čiji će talenat tek biti dokazan.<br></div>', 'uploads/section/1542286252_karusel ansli.png', NULL, '2018-11-21 11:15:31', '2018-11-21 12:16:01'),
(18, 12, 'Slišković Andria', 'direktor ANSLI D.O.O.', '<span style=\"color: rgb(73, 73, 73); font-family: Rubik, sans-serif; font-size: 14px; text-align: center;\">VB, VBA, MySQL, Web development</span>', 'uploads/section/1542805785_AndriaProfil-2.jpg', NULL, '2018-11-21 11:17:10', '2018-11-21 12:09:45'),
(19, 12, 'Stojanović Marko', 'Programer', '<span style=\"color: rgb(73, 73, 73); font-family: Rubik, sans-serif; font-size: 14px; text-align: center;\">VB, VBA, MySQL, Java</span>', 'uploads/section/1542877884_andrea_av.jpg', NULL, '2018-11-21 11:18:25', '2018-11-22 08:11:24'),
(20, 13, 'Slišković Filip', 'stručni saradnik', 'JavaScript, C#', 'uploads/section/1543841190_avatar-128x128-m1.png', NULL, '2018-11-21 11:51:30', '2018-12-03 11:46:30'),
(21, 13, 'Antić Predrag', 'stručni saradnik', 'System administr.', 'uploads/section/1542878052_john_av.jpg', NULL, '2018-11-21 11:53:47', '2018-12-03 11:47:50'),
(22, 13, 'Petrović Danijela', 'stručni saradnik', 'HTML, CSS', 'uploads/section/1543841304_avatar-128x128-z2.png', NULL, '2018-11-21 11:54:38', '2018-12-03 11:48:24'),
(23, 13, 'Jovanović Nina', 'stručni saradnik', 'Web design', 'uploads/section/1543842192_avatar-128x128-z2.png', NULL, '2018-11-21 11:55:43', '2018-12-03 12:03:12'),
(24, 14, 'Knjigovodstveni tim', 'AGENCIJA KNJIGOVODSTVO', '<p>Agencija \"Knjigovodstvo\" je osnovana 1993. godine. Od tada pa sve do danas trudimo se da održimo konstantan kvalitet usluga. Osposobljeni smo za kompletno pružanje knjigovodstvenih usluga, praćenje propisa, poresko savetovanje, kao i sve druge usluge koje su potrebne kako bi naši komitenti imali uspešno poslovanje.</p><p>Nudimo kompletnu uslugu vođenja knjiga po sistemu dvojnog knjigovodstva, kako za pravna lica tako i za preduzetnike. Vršimo izradu završnih računa, bruto stanja, glavne knjige, knjige ulaznih i izlaznih faktura, knjige evidencije prometa roba i usluga, trgovačke knjige, obračun zarada i zastupanje kod poreskih organa.</p><p>Naše ovlašćene knjigovođe su tu zbog Vas i u svakom trenutku možete dobiti pravu informaciju u vezi propisa, savete i sugestije kako bi se vaše poslovanje što lakše i efikasnije obavljalo.</p><p>Posedujemo jedinstveni i provereni softver za svaki aspekt delatnosti, koji se može prilagoditi vašim potrebama u zavisnosti od delatnosti koju obavljate.</p><p>Pored standardnih usluga pružamo pravne savete naših saradnika gde se možete informisati o Zakonu o poreskom postupku, Zakonu o radu, Zakonu o PDV-u i ostalim zakonima iz oblasti finansija.</p><p>Po želji komitenta postoji mogućnost kurirske službe koja uključuje dostavljanje dokumentacije, odlazak u banku, saradnja sa državnim službama i sl. Vaše je samo da mislite o svom poslu i da se uspešno razvijate, ostalo prepustite nama.</p><p>ZA SVE DODATNE INFORMACIJE KONTAKTIRAJTE NAS PUTE TELEFONA ILI NAZNAČENOG MAILA.</p><p>S POŠTVANJEM ANSLI D.O.O.<br></p><p>                    </p>', 'uploads/section/1542286252_karusel ansli.png', NULL, '2018-11-21 12:22:13', '2018-11-21 12:23:48'),
(25, 15, 'Slišković Jelena', 'Šef računovodstva', 'Ovlašćeni knjigovođa', 'uploads/section/1542877961_jelena_avatar.jpg', NULL, '2018-11-21 12:25:17', '2018-11-22 08:12:41'),
(26, 15, 'Đukić Ljuba', 'Ovlašćeni knjigovođa', '&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;', 'uploads/section/1542878470_maja_av.jpg', NULL, '2018-11-21 12:27:24', '2018-11-22 08:21:10'),
(27, 16, 'Sokolović Brankica', 'Kontista', NULL, 'uploads/section/1543842226_avatar-128x128-z1.png', NULL, '2018-11-21 12:28:17', '2018-12-03 12:03:46'),
(28, 16, 'Anđelković Olga', 'Knjigovođa', NULL, 'uploads/section/1543842152_beta_av.jpg', NULL, '2018-11-21 12:28:55', '2018-12-03 12:02:32'),
(29, 16, 'Marković Vesna', 'Pravni savetnik', NULL, 'uploads/section/1543842258_avatar-128x128-z1.png', NULL, '2018-11-21 12:29:27', '2018-12-03 12:04:18'),
(30, 9, 'Programski paket KNJIGOVODSTVO', 'Program za agencije, finansisko, robno knjigovodstvo, glavna knjiga, sve na jednom mestu ...', NULL, 'uploads/section/1542882885_soft_proiz_1.jpg', NULL, '2018-11-22 08:40:27', '2018-11-22 09:34:45'),
(31, 9, 'Programski paket BAKERY', 'Praćenje proizvodnje, prodaje, prometa, utroška materijala, ukupnih troškova', NULL, 'uploads/section/1542882346_bakery_1.jpg', NULL, '2018-11-22 08:44:00', '2018-11-22 09:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `sect_cats`
--

DROP TABLE IF EXISTS `sect_cats`;
CREATE TABLE IF NOT EXISTS `sect_cats` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sect_cats`
--

INSERT INTO `sect_cats` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Početni karusel', '2018-11-14 10:49:19', '2018-11-14 10:50:57'),
(2, 'Knjigovodstvo opste', '2018-11-14 11:38:50', '2018-11-14 11:38:50'),
(3, 'Softver opste', '2018-11-14 11:55:13', '2018-11-14 11:55:13'),
(4, 'Kompanije opste', '2018-11-14 13:02:13', '2018-11-14 13:02:13'),
(5, 'Direktor', '2018-11-15 09:58:48', '2018-11-15 09:58:48'),
(6, 'Agencija karusel', '2018-11-19 11:43:53', '2018-11-19 11:43:53'),
(7, 'Agencija proizvodi', '2018-11-19 11:51:14', '2018-11-19 11:51:14'),
(8, 'Softver karusel', '2018-11-20 12:43:34', '2018-11-20 12:43:34'),
(9, 'Softver proizvodi', '2018-11-20 12:43:50', '2018-11-20 12:43:50'),
(10, 'knjigovodja', '2018-11-21 07:59:48', '2018-11-21 07:59:48'),
(11, 'Softver about', '2018-11-21 11:14:15', '2018-11-21 11:14:15'),
(12, 'Softver Tim', '2018-11-21 11:16:03', '2018-11-21 11:16:03'),
(13, 'Softver saradnici', '2018-11-21 11:50:23', '2018-11-21 11:50:23'),
(14, 'Agencija about', '2018-11-21 12:18:26', '2018-11-21 12:18:26'),
(15, 'Agencija tim', '2018-11-21 12:18:44', '2018-11-21 12:18:44'),
(16, 'Agencija saradnici', '2018-11-21 12:19:01', '2018-11-21 12:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `imeSajta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mesto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `imeSajta`, `title`, `adresa`, `mesto`, `email`, `telefon`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Ansli D.O.O.', 'Ansli', 'Ruzveltova 46', 'Beograd', 'ansli@gmx.com', '+381 64 1304128', 'uploads/users/logo-ansli.png', '2018-10-24 12:18:42', '2018-10-26 11:32:39');

-- --------------------------------------------------------

--
-- Table structure for table `tipovis`
--

DROP TABLE IF EXISTS `tipovis`;
CREATE TABLE IF NOT EXISTS `tipovis` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipovis`
--

INSERT INTO `tipovis` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Post', '2018-10-24 12:18:42', '2018-11-12 11:44:38'),
(2, 'obavestenje', '2018-10-24 12:18:42', '2018-11-12 11:36:11'),
(3, 'opšti post', '2018-10-24 12:18:42', '2018-11-12 11:46:02'),
(4, 'Glavni post', '2018-11-12 11:47:40', '2018-11-12 11:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `superadmin` tinyint(1) NOT NULL DEFAULT '0',
  `oblast_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_oblast_id_foreign` (`oblast_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `superadmin`, `oblast_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'super@email.com', '1Qwert', 1, 1, 3, '6qwomZG3Tq', '2018-10-24 12:18:42', '2018-10-24 12:18:42'),
(2, 'test1', 'test1@mail.com', '$2y$10$1SMwTaSnqUlsgHREkEx2teLbEKFPAhebXUE7YfkGzmYqIcrhuBVA.', 0, 0, 2, 'farEgPfvamvQnoO4H4byJYGj2XIjZdpkrJ93ahhti6sQyJ3f7FyyLLMyD1RM', '2018-10-24 12:19:50', '2018-10-24 12:19:50'),
(3, 'Admin', 'admin@mail.com', '$2y$10$THGFg7MopVOARhRTa10B6eI5mizp8yaOijJbWc5geVXlyxeZbu03G', 1, 1, 1, '39lCbhWBChCf0vB50NWUjJMwh7Ag65ldKrw3GaGpfdJnSG86JeViWKGvESF3', '2018-10-25 11:47:59', '2018-10-25 11:47:59'),
(4, 'test2', 'test2@mail.com', '$2y$10$AUoUOKOi42GPwJG3sKHrV.q1XEjp0mhESaKW.dJAiCbR5GZbytWoq', 1, 0, 1, 'mzt6l0W0O12IhMxZVvj6hJBnJVjfIHGMoDi4dwPyabzYHddnfFyGcv8P6FdA', '2018-10-26 09:28:24', '2018-10-26 09:28:55'),
(5, 'Andria', 'andriasliskovic@gmail.com', '$2y$10$GGfr1vjtEJT7s4pfPq1IuOvHgV84Lnbsp6i9X3fFxs5prSGNUA1k.', 1, 1, 2, 'ajinyMJrtLGgSLywHOqadXWB1W5OcZEpOYHzeyReWK1NF1t8rtAm5qPRv7PK', '2018-11-21 07:30:36', '2018-11-21 07:30:36'),
(6, 'knjigovodstvo', 'ansli@gmx.com', '$2y$10$GW4OPZ7s7paQvLrSUhh7AOadYK2JjlDHfHU.vofK05X1ht2FZVa8K', 1, 1, 1, NULL, '2018-11-21 07:50:19', '2018-11-21 07:50:19');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokumentis`
--
ALTER TABLE `dokumentis`
  ADD CONSTRAINT `dokumentis_oblast_id_foreign` FOREIGN KEY (`oblast_id`) REFERENCES `oblasts` (`id`);

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_oblast_id_foreign` FOREIGN KEY (`oblast_id`) REFERENCES `oblasts` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_tipovi_id_foreign` FOREIGN KEY (`tipovi_id`) REFERENCES `tipovis` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_sec_id_foreign` FOREIGN KEY (`sec_id`) REFERENCES `sect_cats` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_oblast_id_foreign` FOREIGN KEY (`oblast_id`) REFERENCES `oblasts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
