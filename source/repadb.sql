-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 05:23 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `qty` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `comment` varchar(150) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `profpic` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `name`, `comment`, `date`, `profpic`) VALUES
(54, 'Tóth Bence', 'otos? 👉👈', '2024.04.12 21:21', '661989a219a223.66149690.png'),
(65, 'Zoltai Zétény', 'otos? 👉👈', '2024.04.21 10:39', '6624d08493f258.87476895.png');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `cardNumber` varchar(64) NOT NULL,
  `cardName` varchar(128) NOT NULL,
  `expMonth` varchar(2) NOT NULL,
  `expDay` varchar(2) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `type`) VALUES
(117, 'Sárgarépa, vegyes méret', '449', 'product1.jpg', 'repa'),
(118, 'Sárgarépa, előre szeletelt', '899', 'product2.jpg', 'repa'),
(119, 'Vörösrépa, vegyes méret', '799', 'product3.jpg', 'repa'),
(120, 'Sárgarépa, bébirépa', '549', 'product4.webp', 'repa'),
(121, 'Sárgarépa L-méret', '649', 'product5.jpeg', 'repa'),
(122, 'Sárgarépa S-méret', '399', 'product6.jpg', 'repa'),
(123, 'Sárgarépa M-méret', '599', 'product7.jpg', 'repa'),
(124, 'Répa MysteryBox', '14999', 'product8.jpg', 'repa'),
(128, 'Repa logo póló', '4999', 'logotshirt.jpg', 'merch'),
(129, 'Repa tesók póló', '4999', 'illustrationtshirt.jpg', 'merch'),
(130, 'Repa logo bögre', '2999', 'logocup.png', 'merch'),
(131, 'Repa tesók bögre', '2999', 'illustrationcup.png', 'merch'),
(132, 'Repa logo pullóver', '9990', 'logohoodie.jpg', 'merch'),
(133, 'Repa tesók pullóver', '9990', 'illustrationhoodie.jpg', 'merch'),
(134, 'Repa tesók logo pullóver', '9990', 'lilhoodie.jpg', 'merch'),
(135, 'Repa tesók táska', '990', 'illustrationbag.jpg', 'merch'),
(136, 'Repa logo táska', '990', 'logobag.jpg', 'merch'),
(143, 'Ajándék', '0', 'illustrationbag.jpg', 'gift');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `text` varchar(5000) NOT NULL,
  `type` varchar(24) NOT NULL,
  `picture` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `text`, `type`, `picture`) VALUES
(1, 'Sárga répás brokkoli krémleves', '<h3>Hozzávalók:</h3>\r\n                    <p>50 dkg brokkoli</p>\r\n                    <p>3 közepes db sárgarépa</p>\r\n                    <p>1 közepes db burgonya</p>\r\n                    <p>1 közepes db vöröshagyma</p>\r\n                    <p>2 ek olívaolaj</p>\r\n                    <p>1 db leveskocka (zöldség)</p>\r\n                    <p>1 csipet só</p>\r\n                    <p>7 dl víz</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A zöldségeket megtisztítjuk (a brokkoli szárát is meghámozzuk), apróra vágjuk.</p>\r\n                    <p>A hagymát olajon megfonnyasztjuk.</p>\r\n                    <p>Felöntjük 7 dl vízzel, hozzáadjuk a leveskockát, a sót, a zöldségeket, és puhára pároljuk.</p>\r\n                    <p>Díszítéshez kevés zöldséget kiveszünk, a többit botmixerrel pürésítjük.</p>\r\n                    <p>Tálaláskor barackmag vagy kökénymagolajat locsolhatunk rá.</p>', 'leves', 'sarga-repas-brokkoli-kremleves-vegan-recept-foto.jpg'),
(7, 'Sárgarépás sütőtökleves', '<h3>Hozzávalók:</h3>\r\n                    <p>5 dkg vaj</p>\r\n                    <p>1 db közepes fej vöröshagyma, 50 dkg sütőtök (tisztítva mérve), 2 db közepes sárgarépa (kb. 20 dkg tisztítva mérve)</p>\r\n                    <p>10 dl víz, 1-2 ek citromlé, 1 tk balzsamecet</p>\r\n                    <p>2 db erőleveskocka (vagy ételízesítő)</p>\r\n                    <p>1 tk só, 1-2 ek cukor vagy méz, 1/2 mk őrölt fehér bors, 1/2 mk őrölt fahéj, 1/2 mk őrölt gyömbér</p>\r\n                    <p>1 dl főzőtejszín</p>\r\n                    <p>1/4 mk chilipehely (elmaradhat)</p>\r\n                    <p>1/4 mk durvára őrölt fekete bors (elmaradhat)</p>\r\n                    <p>5 dkg pirított tökmag</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Vajon megdinszteljük az apróra vágott vöröshagymát, majd hozzáadjuk a sütőtököt és a sárgarépát.</p>\r\n                    <p>Felöntjük vízzel, hozzáadjuk a leveskockát és a fűszereket, majd puhára főzzük.</p>\r\n                    <p>Pürésítjük, majd ízesítjük cukorral, citromlével, tejszínnel és sóval.</p>\r\n                    <p>Megpirítjuk a tökmagot serpenyőben.</p>\r\n                    <p>Tálaláskor tejszínnel megcsorgatjuk, balzsamecettel, chilipehellyel és borssal ízesítjük.</p>', 'leves', 'sargarepas-sutotokleves-recept-foto.webp'),
(8, 'Sárgarépás csirkehúsleves', '<h3>Hozzávalók:</h3>\r\n                    <p>2 db egész csirkecomb</p>\r\n                    <p>1 teáskanál só, 2 evőkanál liszt, 1 evőkanál olívaolaj</p>\r\n                    <p>3 dkg vaj</p>\r\n                    <p>2 db sárgarépa, 1 db közepes vöröshagyma, 2 gerezd fokhagyma</p>\r\n                    <p>4 dl hideg víz</p>\r\n                    <p>1,2 liter húsleves</p>\r\n                    <p>ízlés szerint őrölt fekete bors, ízlés szerint só, ízlés szerint petrezselyemzöld</p>\r\n                    <p>1 dl vastagabb cérnametélt</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Csirkecombokat sós vízben megfőzzük. Kihűlés után feldolgozzuk. Vöröshagymát finomra vágjuk, fokhagymát, sárgarépát lereszeljük.</p>\r\n                    <p>Olívaolajat, vajat és a répát lábasba tesszük, és addig pároljuk, míg a répa kis levet enged. Hozzáadjuk a vágott hagymát, majd beletesszük a fokhagymát.</p>\r\n                    <p>2 evőkanál liszttel megszórjuk, majd keverjük, míg a zsiradék fel nem veszi a lisztet. Ráöntjük a 4 dl hideg vizet, majd a félretett húslevet. Összefőzzük, a cérnametéltet beletesszük, elkavarjuk. Beletesszük a felaprított húst. Ízlés szerint sózzuk, borsozzuk, összeforraljuk.</p>', 'leves', 'sargarepas-csirkehusleves-recept-foto.webp'),
(9, 'Burgonyás sárgarépás krémleves', '<h3>Hozzávalók:</h3>\r\n                    <p>50 dkg burgonya</p>\r\n                    <p>500 ml tej</p>\r\n                    <p>500 ml víz</p>\r\n                    <p>25 dkg vékony sárgarépa</p>\r\n                    <p>5 dkg 82%-os vaj</p>\r\n                    <p>1 evőkanál finomra vágott petrezselyem</p>\r\n                    <p>Ízlés szerint só</p>\r\n                    <p>2 db tojássárgája</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A fél kg krumplit meghámozom, kockára vágva megfőzöm a fele mennyiségű sós tejes vízben. Nagyon kell rá figyelni, mert könnyen kifut.</p>\r\n                    <p>A sárgarépát megtisztítom, vékony karikára vágom, és 3 dkg vajon, a petrezselyem nagy részével s egy pici sóval meghintve kis lángon megpárolom.</p>\r\n                    <p>Amikor a burgonya megpuhult, leturmixolom, felöntöm a maradék tejjel és vízzel, állandó keverés közben felforralom.</p>\r\n                    <p>Egy leveses tálban a maradék vajat elhabarom a két tojássárgájával,</p>\r\n                    <p>Fokozatosan rámerem a forró levest, miközben keverem.</p>\r\n                    <p>Beleteszem a megpárolt petrezselymes sárgarépát, megszórom a maradék petrezselyemmel és azonnal tálalom.</p>', 'leves', 'burgonyas-sargarepas-kremleves-recept-foto.webp'),
(10, 'Almás-répás céklakrémleves', '<h3>Hozzávalók:</h3>\r\n                    <p>2 db cékla</p>\r\n                    <p>2 db sárgarépa</p>\r\n                    <p>1 db alma</p>\r\n                    <p>Szükség szerint víz</p>\r\n                    <p>3 ek joghurt</p>\r\n                    <p>1 db leveskocka</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Előkészítjük a répát, céklát, almát.</p>\r\n                    <p>Megtisztítjuk és feldaraboljuk őket, egy lábasba tesszük.</p>\r\n                    <p>Felöntjük annyi vízzel, ami ellepi és felforraljuk. Kb. 4 perc.</p>\r\n                    <p>Ha felforrt, akkor beletesszük a leveskockát és alacsony lángon addig főzzük, amíg meg nem puhul minden hozzávaló. Kb. 12 perc.</p>\r\n                    <p>Hagyjuk kihűlni.</p>\r\n                    <p>Ha kihűlt, akkor mehet a turmixba. Botmixerrel is lehet, de úgy darabosabb maradhat.</p>\r\n                    <p>Ha kész vagyunk, akkor keverünk bele joghurtot és kész is.</p>', 'leves', 'almas-repas-ceklakremleves-recept-foto.webp'),
(11, 'Sárgarépás kolbászos tejfölös leves', '<h3>Hozzávalók:</h3>\r\n                    <p>1 kg krumpli, 3 db nagy sárgarépa, 1 db vöröshagyma, 2 cikk fokhagyma</p>\r\n                    <p>10 dkg füstölt kolbász, 5 dkg csípős füstölt kolbász</p>\r\n                    <p>3 L húsleves alap vagy víz</p>\r\n                    <p>3-4 db babérlevél</p>\r\n                    <p>2 tk vegeta</p>\r\n                    <p>1/2 mk őrölt köménymag, 1/2 mk őrölt bors</p>\r\n                    <p>2,5 dl tejföl</p>\r\n                    <p>1,5 ek liszt (habaráshoz)</p>\r\n                    \r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A hozzávalókat előkészítem.</p>\r\n                    <p>Egy edénybe zsírt teszek, majd beleteszem a vöröshagymát, és kicsit megpirítom.</p>\r\n                    <p>Ráteszem a fokhagymát, a sárgarépát, a fűszereket. majd pár percig párolom.</p>\r\n                    <p>Ráteszem a feldarabolt kolbászt, afeldarabolt krumplit, majd felengedem húslevessel vagy vízzel.</p>\r\n                    <p>Beleteszem a babérlevelet, majd ráteszek egy fedőt, és hagyom főni. Addig a tejfölt és a lisztet elkeverem csomómentesre kevés vízzel.</p>\r\n                    <p>Mikor már puha minden, hozzáadom a tejfölös habarást és az ecetet, majd jól kiforralom.</p>', 'leves', '957-krumplis-sargarepas-kolbaszos-tejfolos-leves-habarassal-recept-foto.webp'),
(12, 'Egyedényes kelbimbós-répás tészta, vegán', '<h3>Hozzávalók:</h3>\r\n                    <p>6 marék tojásmentes tészta</p>\r\n                    <p>100 ml növényi főzőkrém</p>\r\n                    <p>1 mk füstölt paprika</p>\r\n                    <p>1 db zöldségleves kocka</p>\r\n                    <p>Szükség szerint annyi víz, ami ellepi a zöldségeket</p>\r\n                    <p>Ízlés szerint só, bors</p>\r\n                    <p>1 db vöröshagyma</p>\r\n                    <p>1 gerezd fokhagyma</p>\r\n                    <p>1 db nagyobb répa</p>\r\n                    <p>400 gr kelbimbó</p>\r\n                    <p>2 ek sörélesztőpehely</p>\r\n                    \r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A vöröshagymát, fokhagymát felaprítom. A répákat karikákra vágom, a kelbimbót, ketté vágom. Felmelegítem az edényt, olívaolajat. Megpirítom a vöröshagymát, majd ezt követik a fokhagymadarabok, só, bors, répa karikák. Ezután hozzáadom a félbevágott kelbimbókat. Kb. 5 perc pirítás után felengedem vízzel.</p>\r\n                    <p>Beledobok egy zöldségkockát. Beleszórom a füstölt fűszer paprikát. Hagyom hogy felfőjön a víz, hozzáadok 6 maréknyi csőtésztát. Amikor a víz már majdnem teljesen elfőtt hozzáadom a főzőkémet és a sörélesztőpelyhet. Elkeverem és tálalhatom is.</p>', 'foetel', 'egyedenyes-kelbimbos-repas-teszta-vegan-recept-foto.webp'),
(13, 'Tilápia céklával, majonézes-répás retek saláta', '<h3>Hozzávalók:</h3>\r\n                    <p>4 db cékla</p>\r\n                    <p>1 tk só, 1/2 mk őrölt fekete bors</p>\r\n                    <p>Kevés étolaj</p>\r\n                    <p>1 kg tilápia filé</p>\r\n                    <p>3 gerezd zúzott fokhagyma</p>\r\n                    <p>Csipet só, csipet őrölt fekete bors, csipet őrölt édes pirospaprika</p>\r\n                    <p>50 g olvasztott vaj</p>\r\n                    <p>2 db sárgarépa, 3 db vajretek</p>\r\n                    <p>2 fej sonkahagyma</p>\r\n                    <p>2 ek tejföl, 2 ek majonéz, 2 tk cukor, 1 tk citromlé, 1 tk só</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A céklát, retket, hagymát vékony karikákra vágjuk, a répát pedig lereszeljük.</p>\r\n                    <p>A tejfölt, majonézt összekeverjük a sóval, borssal, cukorral és citromlével. Hozzáadjuk a zöldségeket, majd tálalásig hűtőbe tesszük.</p>\r\n                    <p>Az olajat, sót, borsot összekeverjük, majd ebbe forgatjuk bele a céklát. Ropogósra sütjük előmelegített sütőben 150°C-on 20 perc alatt.</p>\r\n                    <p>A halat sózzuk, borsozzuk. Az olvasztott vajat összekeverjük a fokhagymával, sóval, borssal és pirospaprikával, majd ebben sütjük meg a hal szeleteket serpenyőben.</p>', 'foetel', 'fokhagymas-tilapia-cekla-chips-szel-majonezes-hagymas-repas-retek-salata-recept-foto.webp'),
(14, 'Darált húsos, sárgarépás barna rizs', '<h3>Hozzávalók:</h3>\r\n                    <p>50 dkg darált hús / sertés</p>\r\n                    <p>25 dkg barna rizs</p>\r\n                    <p>15 dkg sárgarépa / reszelve</p>\r\n                    <p>1 fej hagyma</p>\r\n                    <p>2 gerezd fokhagyma</p>\r\n                    <p>7 dkg paradicsompüré</p>\r\n                    <p>5 evőkanál étolaj</p>\r\n                    <p>Fűszerek ízlés szerint: só, őrölt fekete bors, kakukkfű, petrezselyemzöld</p>\r\n                    \r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A rizst 2 evőkanál étolajon megpirítjuk, majd felöntjük 2x mennyiségű vízzel, és tetszés szerint fűszerezzük. Alacsony hőfokon megpároljuk.</p>\r\n                    <p>A hagymát apróra vágjuk, majd 3 evőkanál étolajon kissé megpirítjuk. Hozzáadjuk a fokhagymát és a reszelt répát, tovább pirítjuk. Ezután belekeverjük a paradicsompürét.</p>\r\n                    <p>Végül hozzáadjuk a darált húst, sót, borsot és kakukkfűvet. Adunk hozzá fél dl vizet, majd megpároljuk. A rizst összekeverjük a húsos répával.</p>\r\n                    <p>A kész ételt megszórjuk petrezselyemzölddel, és készre fűszerezzük. Savanyúsággal, salátával vagy befőttel szervírozhatjuk.</p>', 'foetel', 'daralt-husos-sargarepas-barna-rizs-recept-foto.webp'),
(15, 'Sárgarépás, narancsos sütőben sült csirkemell', '<h3>Hozzávalók:</h3>\r\n                    <p>600 gramm csirkemell</p>\r\n                    <p>1 db vöröshagyma, 1 db lilahagyma, 2 gerezd fokhagyma</p>\r\n                    <p>2-3 db sárgarépa, 1 db savanykás alma, 1 db narancs frissen facsart leve</p>\r\n                    <p>1 evőkanál citromlé, 3 evőkanál méz, 2 evőkanál mustár, 20 ml olívaolaj</p>                   \r\n\r\n                    <p>1 mokkáskanál gyömbérpor, 1 teáskanál korianderlevél, 1 teáskanál őrölt rozmaring, 1 mokkáskanál frissen őrölt fekete bors, 1 mokkáskanál chilisó, 1 evőkanál só</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A zöldségeket feldolgozom.</p>\r\n                    <p>Marinád elkészítése: Elkeverem az olívaolajat, mézet, fokhagymát, narancs levét, citromlevet, mustárt, gyömbérport, chilisót, korianderlevelet, őrölt rozmaringot, borsot, és sót.</p>\r\n                    <p>A sárgarépát csíkokra, a hagymát nagyobb darabokra, az almát cikkekre vágom. A húst tisztítom, majd vastagabb csíkokra vágom.</p>\r\n                    <p>A sárgarépa csíkokat, csirkemelleket marinádba megforgatom, tepsiben szétterített alma, hagyma darabokra helyezem.</p>\r\n                    <p>Sütés 220°C-on, 35 percig fólia alatt.</p>', 'foetel', 'sargarepas-narancsos-sutoben-sult-csirkemell-recept-foto.webp'),
(16, 'Ajváros gnocchi répás  marhaköftével', '<h3>Hozzávalók:</h3>\r\n                    <p>20 dkg répa, 40 dkg marhahús</p>\r\n                    <p>1 kisebb vöröshagyma, 3 gerezd fokhagyma</p>\r\n                    <p>1/4 tk római kömény, 3 ek étolaj, só, bors</p>\r\n                    <p>50 dkg bolti gnocci</p>\r\n                    <p>2 dl tejszín</p>\r\n                    <p>3 ek Podravka ajvár</p>\r\n                    <p>só, frissen őrölt bors</p>\r\n                    <p>friss petrezselyemzöld</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A répát reszeljük le, fonnyasszuk meg 2 evőkanál étolajon a hagymával, köménnyel és fokhagymával együtt.</p>\r\n                    <p>A gnocchit főzzük meg. Olvasszunk vajat, borítsuk bele a gnocchit, pirítsuk 3-4 percig. Az ajvárt keverjük ki tejszínnel, majd öntsük a gnocchira. Forraljuk össze.</p>\r\n                    <p>A köfte többi hozzávalóit dolgozzuk össze vele, hengereket formázunk belőlük. Forró serpenyőben 2-3 evőkanál olajon süssük 8-10 percen át.</p>\r\n                    <p>Ezután nyársakra fűzzük. A gnocchit sózzuk, borsozzuk, majd petrezselyemmel megszórva köftével tálaljuk.</p>', 'foetel', 'ajvaros-gnocchi-repas-marhakoftevel-recept-foto.webp'),
(17, 'Sárgarépás tarhonya', '<h3>Hozzávalók:</h3>\r\n                    <p>15 dkg füstölt kolozsvári szalonna, 20 dkg tarhonya</p>\r\n                    <p>2 evőkanál olaj</p>\r\n                    <p>1 db közepes vöröshagyma, 4 gerezd fokhagyma</p>\r\n                    <p>1/2 db fehér paprika, 6 db közepes burgonya, 1 db nagyobb sárgarépa</p>\r\n                    <p>1 evőkanál őrölt pirospaprika, 1 evőkanál vegeta, 1 evőkanál szárított zöldségkeverék, 1 teáskanál őrölt feketebors, 1 mokkáskanál őrölt fűszerkömény</p>                   \r\n                    <p>Ízlés szerint só</p>\r\n                    <p>5 dkg füstölt kolbász</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A zöldségeket tisztítani, darabolni.</p>\r\n                    <p>A kisebb kockára vágott szalonnát az olajon kisütni. A pörcöt félretenni. A visszamaradt zsiradékon a tarhonyát pirítani, majd az aprított hagymákat, paprikát, paradicsomot megdinsztelni.</p>\r\n                    <p>Hozzáadni a kis kockára darabolt sárgarépát, a szeletelt kolbászt. Néhány percig együtt pirítani, majd felönteni 2 liter vízzel.</p>\r\n                    <p>Amikor felforrt, belekerül a kockára vágott burgonya, a szalonnapörc és a fűszerek. Az egészet félpuhára főzni, majd hozzáadni a pirított tarhonyát.</p>', 'foetel', 'sargarepas-oreg-tarhonya-recept-foto.webp'),
(18, 'Sárgarépás muffin', '<h3>Hozzávalók:</h3>\r\n                    <p>150 g margarin</p>\r\n                    <p>250 g reszelt sárgarépa</p>\r\n                    <p>200 g kristálycukor</p>\r\n                    <p>200 g liszt</p>\r\n                    <p>1,5 kk fahéj</p>\r\n                    <p>2 tk sütőpor</p>\r\n                    <p>2 tojás</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Melegítsd elő a sütőt 180 °C-ra, majd olvaszd meg a margarint a mikrohullámú sütőben.</p>\r\n                    <p>Hámozd meg és reszeld le a sárgarépát.</p>\r\n                    <p>Egy tálban keverd össze a reszelt sárgarépát, a kristálycukrot és az olvasztott margarint.</p>\r\n                    <p>Szitáld hozzá a lisztet, a sütőport és a fahéjat.</p>\r\n                    <p>A tojásokat verd fel külön egy kis tálban, majd öntsd a masszához.</p>\r\n                    <p>Kanalazd a masszát muffinformákba és süsd 20 percig.</p>\r\n                    <p>Ha elkészült, szórd meg porcukorral.</p>', 'desszert', 'sargarepas-muffin-recept-foto.webp'),
(19, 'Répás kókuszos csokis kuglóf (glutén-mentes)', '<h3>Hozzávalók:</h3>\r\n                    <p>280 g reszelt sárgarépa</p>\r\n                    <p>160 g liszt</p>\r\n                    <p>120 g kókuszreszelék (és még egy kevés a kuglófforma kiszórásához)</p>\r\n                    <p>100 g darált dió</p>\r\n                    <p>150 g cukor</p>\r\n                    <p>4 db tojás</p>\r\n                    <p>1 db citrom reszelt héja</p>\r\n                    <p>1 csomag sütőpor</p>\r\n                    <p>1 dl olívaolaj</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Bekapcsoljuk a sütőt 180°-ra.</p>\r\n                    <p>Egy tálban összekeverjük az sárgarépát, tojást, cukrot, citromhéjat, olajat.</p>\r\n                    <p>Egy másik tálban összekeverjük a zabot, diót, kókuszreszeléket és a sütőport.</p>\r\n                    <p>Hozzákeverjük a száraz összetevőket a répás masszához.</p>\r\n                    <p>Kiolajozott és kókuszreszelékkel megszórt kuglófformába töltjük és 180°-on 35 percig sütjük.</p>\r\n                    <p>A 4 kocka étcsokit egy lábosban alacsony fokon felolvasztjuk és ráöntjük a kuglófra.</p>', 'desszert', 'repas-kokuszos-csokis-kuglof-gluten-mentes-recept-foto.webp'),
(20, 'Sárgarépás kenyér', '<h3>Hozzávalók:</h3>\r\n                    <p>380 g liszt</p>\r\n                    <p>100 g tisztított répa</p>\r\n                    <p>4 g só</p>\r\n                    <p>140 ml víz</p>\r\n                    <p>5 g instant élesztő</p>\r\n                    <p>1 evőkanál méz</p>\r\n                    <p>25 g étolaj</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Főzd meg, majd pürésítsd a répát.</p>\r\n                    <p>Mérd ki a lisztet, majd add hozzá az alapanyagot és a répapürét.</p>\r\n                    <p>Dagaszd, keleszd a tésztát egy órán át meleg helyen.</p>\r\n                    <p>Formászd, majd tedd bele az olajjal kikent sütőformába a tekercset, majd pihentesd egy órát.</p>\r\n                    <p>180°C-os sütőbe helyezd a kenyeret, majd 30 perc múlva vedd ki és hagyd kihűlni.</p>', 'desszert', 'sargarepas-kenyer-recept-foto.webp'),
(21, 'Török sárgarépás szelet', '<h3>Hozzávalók:</h3>\r\n                    <p>50 dkg sárgarépa</p>\r\n                    <p>20 dkg kristálycukor</p>\r\n                    <p>0.5 tk őrölt fahéj</p>\r\n                    <p>1 tk vaníliaaroma</p>\r\n                    <p>10 dkg dió, mogyoró, mandula vagy pisztáciabél</p>\r\n                    <p>5 dkg kókuszreszelék</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Meghámozzuk és aprítóban finomra vágjuk, vagy reszeljük a sárgarépát.</p>\r\n                    <p>Hozzákeverjük a cukrot, a fahéjat és a vaníliát, majd hozzáadjuk 2,5 dl vizet.</p>\r\n                    <p>Főzzük kis lángon, amíg az összes folyadék elpárolog. Közben lefedjük, de hagyunk egy kis részt a távozó hőnek.</p>\r\n                    <p>Belekeverjük a durvára vágott dióféléket, majd a masszát egy sütőpapírral bélelt tepsibe simítjuk.</p>\r\n                    <p>A hűtőbe tesszük legalább 1 órára, majd négyzetekre vágjuk és megforgatjuk mindegyiket a kókuszreszelékben.</p>', 'desszert', 'lead_L_torok-sargarepas-szelet-recept-shutterstock_776930677.jpg'),
(22, 'Répatorta krémes töltelékkel', '<h3>Hozzávalók:</h3>\r\n                    <p>400 g reszelt sárgarépa</p>\r\n                    <p>130 g cukor</p>\r\n                    <p>1 kk. kanál gm. őrölt fahéj</p>\r\n                    <p>1 . kk. vanília aroma</p>\r\n                    <p>kb. 100 ml víz</p>\r\n                    <p>50-50 g dió és mandula (lehet más olajos mag is)</p>\r\n                    <p>gluténmentes kókuszreszelék</p>\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>A diót száraz serpenyőben megpirítjuk, majd durvára vágjuk.</p>\r\n                    <p>A répát megtisztítjuk és lereszeljük.</p>\r\n                    <p>Egy tálban összekeverjük a liszteket, a sütőport, a fahéjat és a sót.</p>\r\n                    <p>A tojásokat habosra verjük a cukrokkal, majd hozzáadjuk az olajat.</p>\r\n                    <p>Hozzáadjuk a lisztes keveréket, a sárgarépát és a diót, majd összeforgatjuk.</p>\r\n                    <p>A masszát kivajazott tortaformába öntjük, és 180 fokos sütőben 30 percig sütjük.</p>\r\n                    <p>Kihűtjük, majd hosszában félbevágjuk.</p>\r\n                    <p>A vajas krémsajtot habosra keverjük, hozzáadjuk a vanília belsejét, a citrom héját és a porcukrot.</p>\r\n                    <p>A mascarponés krémmel megkenjük a tortát.</p>', 'desszert', 'lead_L_kremes-repatorta-recept.jpg'),
(23, 'Répás palacsinta friss krémsajttal', '<h3>Hozzávalók:</h3>\r\n                    <p>45 dkg sárgarépa, 2.5 dkg dió</p>\r\n                    <p>15 dkg liszt</p>\r\n                    <p>2 tk sütőpor</p>\r\n                    <p>1 db tojás, 25 dl tej, 4 ek vaj, 17.5 dkg tejszínes krémsajt</p>\r\n                    <p>0.25 tk só, 5 dkg porcukor, 4 ek barna cukor, 1 tk őrölt fahéj</p>\r\n\r\n\r\n                    <br>\r\n\r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Megtisztítjuk és reszeljük a répát.</p>\r\n                    <p>A diót apróra vágjuk, majd összekeverjük a liszttel, sütőporral, fahéjjal, sóval és gyömbérrel.</p>\r\n                    <p>Tojást habosra keverünk a barna cukorral és tejjel.</p>\r\n                    <p>Hozzáadjuk a répát, majd a lisztes keverékbe forgatjuk.</p>\r\n                    <p>30 percig pihentetjük a tésztát.</p>\r\n                    <p>Egy tálban porcukrot és krémsajtot habosra keverünk.</p>\r\n                    <p>Forró serpenyőben kevés vajon kisütjük a tésztát.</p>\r\n                    <p>Palacsintákat készítünk, majd 50 fokos sütőben melegen tartjuk.</p>\r\n                    <p>Kisütött palacsintákat és krémsajtot rétegezünk.</p>\r\n                    <p>Friss gyümölccsel tálaljuk.</p>', 'desszert', 'lead_L_repas-palacsinta-friss-kremsajttal-(1)-(1).jpg'),
(24, 'Sárgarépás energiagolyó', '<h3>Hozzávalók:</h3>\r\n                    <p>10 dkg dióbél</p>\r\n                    <p>15 dkg aszalt datolya</p>\r\n                    <p>2 db sárgarépa</p>\r\n                    <p>1 tk cukrozatlan kakaópor</p>\r\n                    <p>8 dkg kókuszreszelék</p>\r\n                    <p>0.5 tk őrölt fahéj</p>\r\n                    <p>0.5 tk őrölt szerecsendió</p>\r\n                    <p>Só ízlés szerint</p>\r\n\r\n                    <br>\r\n                    \r\n                    <h3>Elkészítés:</h3>\r\n                    <p>Késes aprítóba tesszük a diót és a datolyát, majd kissé darabosra vágjuk.</p>\r\n                    <p>Hozzáforgatjuk a meghámozott és lereszelt sárgarépát, a kakaóport, a kókuszreszelék felét, a fűszereket, és 1 csipet sót.</p>\r\n                    <p>Összedolgozzuk, majd a masszából kis golyókat formázunk.</p>\r\n                    <p>Meghempergetjük mindet a maradék kókuszreszelékben, majd betesszük a hűtőbe a golyókat, hogy kissé megszilárduljanak.</p>\r\n                    <p>Szobahőmérsékleten kínáljuk.</p>', 'desszert', 'lead_L_shutterstock_788423437.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `usersTel` varchar(11) NOT NULL,
  `usersNickname` varchar(24) NOT NULL,
  `pfp` varchar(64) NOT NULL,
  `hasDiscountCode` int(1) NOT NULL,
  `admin` int(1) NOT NULL,
  `sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersEmail`, `usersUid`, `usersPwd`, `usersTel`, `usersNickname`, `pfp`, `hasDiscountCode`, `admin`, `sum`) VALUES
(37, 'tothbence0531@gmail.com', 'tothbence0531', '$2y$10$JFbwwmfa8N2ypPXJ0jPx5OprlbaK/KVY8bk0M.9G2004gEiKbMpxK', '069420', 'Tóth Bence', '661989a219a223.66149690.png', 1, 1, 0),
(41, 'ggmark@repa.hu', 'ggmark', '$2y$10$xSC/js7nEhupc5UDjcbJNuskLsixpFzgExDwp8EAJtiPgr/g1P242', '069420', 'Gercsó Márk', '66242e0e86c284.09280412.jpg', 0, 1, 0),
(42, 'llevente@repa.hu', 'lengyellevente', '$2y$10$gphnVbpZ1u70YvGgpjsUBuhPO49MI8nI3a6VqPbY3RnjAzWwK8HR6', '069420', 'Lengyel Levente', '662406ddd761a7.46071466.jpg', 0, 1, 0),
(44, 'isztin@repa.hu', 'isztin', '$2y$10$p7wDR1bBsz6BrqsDGTJymO5y8nsPJdDUkGupzE0lBQcBX2lsMmmYW', '069420', 'Isztin Martin', '66240762474d05.75654402.jpg', 0, 1, 0),
(45, 'zoltaizeteny0@gmail.com', 'zetneki', '$2y$10$yJxEgr02v0iMo7xfzupQ.uOxtC6tRMQDrycTts0fejr4ZgIt1ZKkm', '069420', 'Zoltai Zétény', '6624d08493f258.87476895.png', 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
