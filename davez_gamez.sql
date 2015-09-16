-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2015 at 09:45 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `davez_gamez`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessories`
--

CREATE TABLE IF NOT EXISTS `accessories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `price` double NOT NULL,
  `picurl1` varchar(255) NOT NULL,
  `picurl2` varchar(255) NOT NULL,
  `picurl3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `accessories`
--

INSERT INTO `accessories` (`id`, `name`, `description`, `price`, `picurl1`, `picurl2`, `picurl3`) VALUES
(1, 'PlayStation One Controller ', 'PRICE DROP Excellent condition. Can post if required. Buyer pays for postage. ', 10, 'images/playstation controller.jpg', '', ''),
(2, 'DSI & DS Lite Play Cases ', 'Brand new in boxes. \r\nOne white and two black. \r\nCan post if required at buyers expense. &euro;7 each. ', 7, 'images/dsianddsliteplaycases190120151523.jpg', '', ''),
(3, 'Nintendo DSI XL Flip Case Brand New ', 'Brand new in box. Light brown in colour. Can post if required at buyers expense. ', 10, 'images/dsixlflipcase160220152049.jpg', '', ''),
(4, 'PlayStation 3 PS Move Boxing Gloves Brand New ', 'Brand new in box. Can post if required at buyers expense. ', 9, 'images/psmoveboxingglove160220152049.jpg', '', ''),
(5, 'PlayStation 3 PS Move Hand Gun Brand New ', 'Brand new in box. Can post if required at buyers expense. ', 10, 'images/psmovehandgun160220152049.jpg', '', ''),
(6, 'Sports Wheel for PS3 Move Brand New ', 'Condition: New\r\n\r\nCan post if required at buyers expense. ', 7, 'images/sportswheelps3180220151523.jpg', '', ''),
(7, 'Nintendo Wii Glo Golf Club Brand New ', 'Nintendo Wii Glo Golf Clubs x 2\r\n\r\nBrand New in boxes\r\n\r\nCan post if required at buyers expense.\r\n\r\n&euro;7 each. ', 7, 'images/WiiGloGolfClub200220150829.jpg', '', ''),
(8, 'Xbox 360 Wired controller Extension cable ', 'Brand new in packaging. Works great with Guitar Hero 3 and Rock band. Can post if required at buyers expense. ', 10, 'images/Xbox360WiredcontrollerExtensioncable260220151646.jpg', '', ''),
(9, 'Playstation 3 Racing Wheel Brand New ', 'Orb Black Playstation 3 Racing Wheel Brand New. Can post if required at buyers expense. ', 7, 'images/Ps3RacingWheelBrandNew290120151620.jpg', '', ''),
(10, 'Nintendo DSi XL/DSi/DS Lite/DS Game Cases Brand New ', 'Logic 3 Nintendo DSi XL/DSi/DS Lite/DS Game Cases Brand New. 6 in pack. Can post if required at buyers expense. ', 6, 'images/DsGameCasesBrandNew290120151618.jpg', '', ''),
(11, 'NDSL Protective Case Brand New ', 'Brand New Vankoss protective case is the perfect solution to guard your NDSL player and fits the player''s desire. NDSL can be played within the hard protective case.\r\n\r\nCan post if required at buyers expense. ', 8, 'images/DSLProtectiveCaseBrandNew30012015.jpg', '', ''),
(12, 'Nintendo DSi/DS Lite & 3DS Dual Car Charger Brand New', 'Joystick Junkies Nintendo DSi/DS Lite & 3DS Dual Car Charger Brand New.\r\n\r\nCable connects to car charger via USB. Cable can also be used on PC & Laptops to charge your console.\r\n\r\nCan post if required at buyers expense. ', 10, 'images/NintendoDSiDS Lite3DSDualCarChargerBrandNew300120151129.jpg', '', ''),
(13, 'Nintendo Wii Controller and Nunchuck Protectors Brand New Pink ', 'Nintendo Wii Controller and Nunchuck Protectors Brand New Pink. Official Nintendo merchandise. Can post if required at buyers expense', 10, 'images/NintendoWiiControllerandNunchuckProtectorsBrandNewPink050220151127.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  `last_log_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `last_log_date`) VALUES
(1, 'david', 'password', '2015-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `consoles`
--

CREATE TABLE IF NOT EXISTS `consoles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `picurl1` varchar(255) NOT NULL,
  `picurl2` varchar(255) NOT NULL,
  `picurl3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `consoles`
--

INSERT INTO `consoles` (`id`, `name`, `description`, `price`, `picurl1`, `picurl2`, `picurl3`) VALUES
(1, 'Nintendo Entertainment System', 'Nintendo NES console. Excellent condition. Comes with 2 controllers (one controller has a little yellowing), Zapper Gun, Power cable, AV cable and one game Mario/Duck Hunt (with sleeve) (2 games on one cart). Can send via registered post at buyers expense. Has been tested fully and works perfectly. ', 129, 'images/nes.jpg', '', ''),
(2, 'Playstation 2 Console', 'PRICE DROP.Excellent condition. Working perfectly. Comes with 2 controllers (one red Gamestop one) and one original one, DVD remote, Power cable, TV Scart connector, 2 memory cards (8 and 64mb), original box and instructions. Super collectors item. Please also check out the games I also have for sale. Can post if required. Buyer pays for postage. ', 35, 'images/ps2 100215.jpg', '', ''),
(3, 'Nintendo Wii Console', 'PRICE DROP Black Nintendo Wii console. Excellent condition. Only used a couple of times. Comes with power supply, AV cable and sensor bar. No remote or nunchuck included but these can be purchased cheaply. Can send via registered post if required. However this may cost a lot. ', 65, 'images/blackwii17012015.jpg', '', ''),
(4, 'Playstation 1 Console with extras', 'PlayStation One Console. \r\nPerfect condition and working order. Comes with 2 original controllers, memory card, Power cable and AV cable. No games included. \r\nCan post if required at buyers expense. ', 50, 'images/psone_200220150825.jpg', '', ''),
(5, 'Nintendo Wii ', 'In perfect condition and working order. Comes with original box and documents, 1 controller with Wii motion add on, TV cable with scart adapter, sensor bar, Power adapter and 1 game Wii Play. Can post if required at buyers expense. ', 60, 'images/wii200120151223.jpg', '', ''),
(6, 'N64 with games and all cables ', 'Nintendo 64. Perfect condition and working order. Comes with original power cable, AV cable, one controller and 4 games - Beetle Adventure Racing, Multi Racing Championship, Fifa 99 and NBA Pro 99. Can post if required at buyers expense. ', 65, 'images/n64220220151016.jpg', '', ''),
(7, 'Playstation 2 Silver Fat Console with accessories ', 'Playstation 2 Silver Fat Console. Model Number SCPH-50003. Comes with one original silver controller, 8mb memory card, AV lead and power cable (this is a Sky one but works the very same). There is a dent on the top left hand side of the console and the 2nd memory card slot is unsuable. This does not affect performance in any way. Can post if required at buyers expense. ', 20, 'images/Playstation2SilverFat290120151651.jpg', '', ''),
(8, 'Playstation 2 Fat Console with accessories ', 'Playstation 2 Fat Console with accessories. Model Number SCPH-30003R. In perfect working order. Comes with one original controller, AV Cable, Power cable and USB Headset (in box). Can post if required at buyers expense. Postage costs &euro;10. ', 30, 'images/fatps229012015.jpg', '', ''),
(9, 'Xbox Original Console with Games ', 'Xbox Original Console with Games. Has been tested and is in perfect working order. Comes with one controller, AV cable, power cable and 3 games (Fable, Beyond Good & Evil and Brothers in Arms Road to Hill 30. Can send via registered post if required at buyers expense but this will cost quite a lot. ', 60, 'images/XboxOriginalConsolewithGames050220151215.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `picurl1` varchar(255) NOT NULL,
  `picurl2` varchar(255) NOT NULL,
  `picurl3` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `description`, `price`, `picurl1`, `picurl2`, `picurl3`, `date_created`) VALUES
(1, 'GRAND THEFT AUTO EPISODES FROM LIBERTY CITY for Xbox 360', 'As new perfect condition.', 20, './images/gta episodes xbox360.jpg', '', '', '2015-02-23 21:06:58'),
(3, 'Fifa 2004 for Nintendo Gamecube', 'Excellent condition. Manual included. Can post if required. Buyer pays for postage. ', 5, 'images/fifa 2004 gamecube.jpg', '', '', '2015-02-23 21:02:43'),
(4, 'World Poker Tour for Gameboy Advance', 'Can post if required. Buyer pays for postage. ', 6, 'images/world poker tour gba.jpg', '', '', '2015-02-23 21:09:33'),
(5, 'My Health Coach Stop Smoking With Alan Carr for Nintendo Ds Brand New', ' Condition: New\r\n\r\nCan post if required. Buyer pays for postage. ', 7, 'images/My Health Coach Stop Smoking with Allen Carr for Nintendo Ds.jpg', '', '', '2015-02-23 21:50:00'),
(6, 'PSP games', 'In excellent condition and working order. Both include manuals.\r\n\r\nRidge Racer &euro;5 SOLD\r\nWorld Series Poker &euro;5\r\n\r\nCan post if required. Buyer pays for postage. ', 5, 'images/psp games 240115.jpg', '', '', '2015-02-23 23:21:41'),
(8, 'Playstation One Games', ' Super collection of PlayStation One Games. All in perfect condition. Priced individually or can sell as bundle. Can post if required. Buyer pays for postage.\r\n\r\nSydney 2000 &euro;3\r\nPremier Manager 98 &euro;3\r\nNascar 98 &euro;3\r\nKnockout Kings 2000 &euros;4\r\nNo Fear Downhill Mountain Biking &euro;4\r\nPGA Tour 98 &euro;2\r\nSoviet Strike &euro;3\r\nPro Evolution Soccer 2 &euro;2\r\nToca Touring Car Championship &euro;5\r\n\r\nSome pictured games have already been sold. Games still available are listed above.\r\n\r\n', 2, 'images/psone games 08012015.jpg', '', '', '2015-02-24 01:51:09'),
(9, 'N64 Games x 6', 'Perfect working condition. \r\nCarts only. \r\nNo boxes. \r\nCan post if required. \r\nBuyer pays for postage. \r\nPostage costs &euro;1.65 per cartridge.\r\n\r\nBeetle Adventure Racing &euro;10\r\n007 The World is not Enough &euro;12 SOLD\r\nSuper Mario 64 &euro;15 SOLD\r\nDuke Nukem 64 &euro;12 SOLD\r\nTurok Dinosaur Hunter &euro;12 SOLD\r\nMulti Racing Championship &euro;10 ', 10, 'images/N64gamesx6190120151132.jpg', '', '', '2015-02-26 20:17:45'),
(10, 'PC Games', 'All games have been tested and are working perfectly.\r\n\r\nFootball Manager 2009 &euro;4\r\nSonic Mega Collection Plus &euro;8\r\nCompany of Heroes Opposing Fronts Brand New &euro;10\r\nCharlottes Web Discovery Farm &euro;4\r\nPeppa Pig Puddles of Fun &euro;4\r\n\r\nCan post if required. Buyer pays for postage. ', 4, 'images/pcgames_080220151305.jpg', '', '', '2015-03-11 21:18:10'),
(11, 'Playstation 2 games', 'NEW TITLES ADDED 29/01/2015\r\n\r\nSome of the games on the list below are not in pictures.\r\n\r\nLarge collection of PlayStation 2 games. All priced individually or can sell as a bundle. New games added weekly. Can post at buyers expense. All games have been tested and are working 100%.\r\n\r\nGames are as follows:\r\n\r\n007 Nightfire with manual &euro;7\r\n007 Quantum of Solace with manual &euro;8\r\n\r\nA\r\n\r\nAge of Empires 2 The Age of Kings no manual &euro;8\r\n\r\nB\r\n\r\nBatman Vengeance with manual &euro;9\r\nBratz The Movie with manual &euro;5\r\nBrave The Search for Spirit Dancer with manual &euro;10\r\nBurnout 3 Takedown with manual &euro;7\r\n\r\nC\r\n\r\nCanis Canem Edit with manual &euro;10\r\nCharlie and the Chocolate Factory with manual &euro;7\r\nChicken Little without manual &euro;6\r\nCodename: Kids Next Door Operation Videogame with manual &euro;6\r\nConflict : Desert Storm with manual &euro;5\r\nCrash Bandicoot Nitro Kart with manual &euro;10\r\n\r\nD\r\n\r\nDance UK Xtra Trax with manual &euro;4\r\nDestroy all Humans with manual &euro;6\r\nDogz with manual &euro;6\r\nDragonball Z Budokai without manual &euro;10\r\n\r\nF\r\n\r\nFifa Street with manual &euro;5\r\nFifa 2002 without manual &euro;2\r\nFifa 08 with manual &euro;4\r\n\r\nG\r\n\r\nGaelic Games Football x 2 with manual &euro;8 each\r\nGaelic Games Hurling with manual &euro;8\r\nGrand Theft Auto San Andreas with manual &euro;10\r\nGrand Theft Auto Vice City with manual &euro;8\r\n\r\nH\r\n\r\nHarry Potter and the Prisoner of Azkaban with manual &euro;5\r\nHello Kitty Roller Rescue with manual &euro;10\r\nHitman 2 without manual &euro;6\r\n\r\nI\r\n\r\nInternational Cue Club without manual &euro;2\r\nInternational Superstar Soccer without manual &euro;4\r\n\r\nJ\r\n\r\nJust Cause with manual &euro;5\r\n\r\nL\r\n\r\nLara Croft Tomb Raider Legend with manual &euro;7\r\nLassie with manual &euro;8\r\nLegends of Wrestling 2 without manual &euro;5\r\nLMA Manager 2003 without manual &euro;4\r\n\r\nM\r\n\r\nMadden 2001 with manual &euro;5\r\nMortal Kombat Deception with manual &euro;10\r\n\r\n\r\nN\r\n\r\nNeed for Speed Carbon with manual &euro;8\r\nNeed for Speed Hot Pursuit 2 with manual &euro;8\r\nNHL 2005 without manual &euro;5\r\n\r\nO\r\n\r\nOver the Hedge with manual &euro;7\r\n\r\nP\r\n\r\nPDC World Championship Darts 2008 with manual &euro;6\r\nPES 2008 without manual &euro;3\r\nPES 4 x 2 with/without manual &euro;3 each\r\nPES 5 x 2 with/without manual &euro;3 each\r\nPES 6 x 2 with/without manual &euro;3 each\r\nPeter Pan The Legend of Neverland with manual &euro;7\r\nPro Evolution Soccer Management without manual &euro;5\r\n\r\nR\r\n\r\nRobots with manual &euro;6\r\nRockband with manual &euro;5\r\nRugby 2008 with manual &euro;4\r\nRugby 2004 x 2 without manual &euro;4 each\r\nRugrats Royal Ransom without manual &euro;10\r\n\r\nS\r\n\r\nSeek and Destroy with manual &euro;5\r\nSensible Soccer 2006 with manual &euro;5\r\nSingstar 80''s with manual &euro;6\r\nSmackdown Just Bring It with manual &euro;5\r\nSmackdown vs Raw 2006 without manual &euro;7\r\nSonic Heroes without manual &euro;7\r\nSpyro A Heroes Tale with manual &euro;10\r\nStar Wars Bounty Hunter with manual &euro;10\r\nStar Wars Episode 3 Revenge of the Sith with manual x 2 &euro;5 each\r\nStar Wars Battlefront with manual &euro;8\r\n\r\nT\r\n\r\nTenchu Fatal Shadows (Disc Only) &euro;7\r\nThe Getaway with manual &euro;5\r\nThe Great British Football Quiz with manual &euro;3\r\nThe Godfather with manual &euro;7\r\nThe Golden Compass with manual &euro;7\r\nThe Incredibles with manual &euro;6\r\nThe Incredible Hulk Ultimate Destruction with manual RARE &euro;17\r\nThe Matrix Path of Neo with manual &euro;8\r\nThe Simpson''s Game with manual &euro;8\r\nThe Simpson''s Hit and Run without manual x 2 &euro;12 each\r\nThe Spongebob Squarepants Movie without manual &euro;5\r\nThe Ultimate World Cup Quiz with manual &euro;2\r\nTony Hawk''s Underground with manual &euro;5\r\nThunderbirds with manual &euro;7\r\nTiger Woods PGA Tour 2003 with manual &euro;3\r\nTrivial Pursuit Unhinged with manual &euro;6\r\nTrue Crime Streets of LA with manual &euro;5\r\n\r\nV\r\n\r\nVirtua Cop Elite Edition with manual &euro;7\r\n\r\nW\r\n\r\nWho wants to be a millionaire with manual &euro;5\r\n\r\nPlease note that if paying by PayPal buyer must pay fees.\r\n\r\nThanks ', 5, 'images/ps2games_290120151239.jpg', '', '', '2015-02-26 20:18:11'),
(12, 'Nintendo 3DS and DS Games', 'All in perfect condition and working order.\r\n\r\nClub Penguin Elite Penguin Force without manual &euro;5\r\nLego Star Wars 2 The Original Trilogy with manual &euro;7\r\nClub Penguin Herbert''s Revenge with manual &euro;5\r\nMoshi Monsters Moshling Zoo the without manual &euro;15\r\n\r\nCan post if required. Buyer pays for postage', 5, 'images/nintendo3dsanddsgames090220151158.jpg', '', '', '2015-02-24 19:33:16'),
(13, 'Xbox Games', 'NEW TITLES ADDED 11/01/2015 NOT IN PICTURE .Original Xbox Games. All games have been tested and are working perfectly.\r\n\r\nColin McRae Rally with manual &euro;4\r\nColin McRae Rally 04 with manual &euro;4\r\nGrabbed by the Ghoulies with manual &euro;6\r\nSoulcalibur 2 with manual &euro;7\r\nPanter Dragoon Orta with manual RARE &euro;15\r\nStar Wars Knights of the Old Republic with manual &euro;8 SOLD\r\nToca Race Driver 3 with manual &euro;5\r\nHitman 2 Silent Assassin with manual &euro;7\r\nPrisoner of War with manual &euro;7\r\nBrothers in Arms Road to Hill 30 with manual &euro;5\r\nTrue Crime Streets of LA with manual &euro;5\r\nThe Thing with manual &euro;4 SOLD\r\nNeed for Speed Most Wanted with manual &euro;9\r\nBeyond Good and Evil with manual &euro;5\r\nTom Clancy''s Ghost Recon with manual &euro;6\r\nFable with manual &euro;7\r\nFifa Football 2004 with manual &euro;5\r\nStar Trek Shattered Universe with manual &euro;10\r\nFight Night 2004 with manual &euro;5\r\nNeed for Speed Underground 2 with manual &euro;7\r\nTiger Woods PGA Tour 2004 with manual &euro;3\r\nMoto GP Ultimate Racing Technology 2 with\r\nmanual &euro;10\r\nLord of the Rings The Return of the King without manual &euro;8\r\nPrince of Persia Warrior Within with manual &euro;5\r\nLord of the Rings The Third Age with manual &euro;6\r\nLMA Manager 2005 with manual &euro;4\r\n\r\nCan post if required. Buyer pays for postage. ', 5, 'images/xboxgames110220150823.jpg', '', '', '2015-02-24 19:39:18'),
(14, 'Xbox 360 Games ', 'NEW TITLES ADDED 30/01/2015\r\n\r\nCollection of Xbox 360 Games\r\n\r\nAll in perfect condition and working order\r\n\r\nMore titles added weekly\r\n\r\nMajin and the Forsaken Kingdom with manual &euro;15\r\n\r\nHarry Potter & The Deathly Hallows Part 1 with manual &euro;10\r\n\r\nWhere the Wild Things Are The Videogame with manual &euro;15\r\n\r\nGrand Theft Auto IV with manual &euro;20 SOLD\r\n\r\nGrand Theft Auto Episodes from Liberty City with manual &euro;12 SOLD\r\n\r\n2010 Fifa World Cup South Africa with manual &euro;4 SOLD\r\n\r\nDarksiders 2 Limited Edition Brand New with manual &euro;20\r\n\r\nFifa 13 without manual &euro;6\r\n\r\nFifa 14 without manual &euro;20 SOLD\r\n\r\nForza Motorsport 4 with manual &euro;15 SOLD\r\n\r\nPES 6 with manual &euro;4\r\n\r\nRockstar Table Tennis with manual &euro;4\r\n\r\nVirtua Tennis 3 with manual &euro;4\r\n\r\nBlue Dragon 3 discs with manual &euro;10\r\n\r\n', 4, 'images/xbox360games080220151305.jpg', '', '', '2015-02-26 20:01:56'),
(15, 'PlayStation 2 Games ', 'NEW TITLES ADDED 29/01/2015\r\n\r\nSome of the games on the list below are not in pictures.\r\n\r\nLarge collection of PlayStation 2 games. All priced individually or can sell as a bundle. New games added weekly. Can post at buyers expense. All games have been tested and are working fully.\r\n\r\nGames are as follows:\r\n\r\n007 Nightfire with manual &euro;7\r\n007 Quantum of Solace with manual &euro;8\r\nA\r\n\r\nAge of Empires 2 The Age of Kings no manual &euro;8\r\n\r\nB\r\n\r\nBatman Vengeance with manual &euro;9\r\nBratz The Movie with manual &euro;5\r\nBrave The Search for Spirit Dancer with manual &euro;10\r\nBurnout 3 Takedown with manual &euro;7\r\n\r\nC\r\n\r\nCanis Canem Edit with manual &euro;10\r\nCharlie and the Chocolate Factory with manual &euro;7\r\nChicken Little without manual &euro;6\r\nCodename: Kids Next Door Operation Videogame with manual &euro;6\r\nConflict : Desert Storm with manual &euro;5\r\nCrash Bandicoot Nitro Kart with manual &euro;10\r\n\r\nD\r\n\r\nDance UK Xtra Trax with manual &euro;4\r\nDestroy all Humans with manual &euro;6\r\nDogz with manual &euro;6\r\nDragonball Z Budokai without manual &euro;10\r\n\r\nF\r\n\r\nFifa Street with manual &euro;5\r\nFifa 2002 without manual &euro;2\r\nFifa 08 with manual &euro;4\r\n\r\nG\r\n\r\nGaelic Games Football x 2 with manual &euro;8 each\r\nGaelic Games Hurling with manual &euro;8\r\nGrand Theft Auto San Andreas with manual &euro;10\r\nGrand Theft Auto Vice City with manual &euro;8\r\n\r\nH\r\n\r\nHarry Potter and the Prisoner of Azkaban with manual &euro;5\r\nHello Kitty Roller Rescue with manual &euro;10\r\nHitman 2 without manual &euro;6\r\n\r\nI\r\n\r\nInternational Cue Club without manual &euro;2\r\nInternational Superstar Soccer without manual &euro;4\r\n\r\nJ\r\n\r\nJust Cause with manual &euro;5\r\n\r\nL\r\n\r\nLara Croft Tomb Raider Legend with manual &euro;7\r\nLassie with manual &euro;8\r\nLegends of Wrestling 2 without manual &euro;5\r\nLMA Manager 2003 without manual &euro;4\r\n\r\nM\r\n\r\nMadden 2001 with manual &euro;5\r\nMortal Kombat Deception with manual &euro;10\r\n\r\n\r\nN\r\n\r\nNeed for Speed Carbon with manual &euro;8\r\nNeed for Speed Hot Pursuit 2 with manual &euro;8\r\nNHL 2005 without manual &euro;5\r\n\r\nO\r\n\r\nOver the Hedge with manual &euro;7\r\n\r\nP\r\n\r\nPDC World Championship Darts 2008 with manual &euro;6\r\nPES 2008 without manual &euro;3\r\nPES 4 x 2 with/without manual &euro;3 each\r\nPES 5 x 2 with/without manual &euro;3 each\r\nPES 6 x 2 with/without manual &euro;3 each\r\nPeter Pan The Legend of Neverland with manual &euro;7\r\nPro Evolution Soccer Management without manual &euro;5\r\n\r\nR\r\n\r\nRobots with manual &euro;6\r\nRockband with manual &euro;5\r\nRugby 2008 with manual &euro;4\r\nRugby 2004 x 2 without manual &euro;4 each\r\nRugrats Royal Ransom without manual &euro;10\r\n\r\nS\r\n\r\nSeek and Destroy with manual &euro;5\r\nSensible Soccer 2006 with manual &euro;5\r\nSingstar 80''s with manual &euro;6\r\nSmackdown Just Bring It with manual &euro;5\r\nSmackdown vs Raw 2006 without manual &euro;7\r\nSonic Heroes without manual &euro;7\r\nSpyro A Heroes Tale with manual &euro;10\r\nStar Wars Bounty Hunter with manual &euro;10\r\nStar Wars Episode 3 Revenge of the Sith with manual x 2 &euro;5 each\r\nStar Wars Battlefront with manual &euro;8\r\n\r\nT\r\n\r\nTenchu Fatal Shadows (Disc Only) &euro;7\r\nThe Getaway with manual &euro;5\r\nThe Great British Football Quiz with manual &euro;3\r\nThe Godfather with manual &euro;7\r\nThe Golden Compass with manual &euro;7\r\nThe Incredibles with manual &euro;6\r\nThe Incredible Hulk Ultimate Destruction with manual RARE &euro;17\r\nThe Matrix Path of Neo with manual &euro;8\r\nThe Simpson''s Game with manual &euro;8\r\nThe Simpson''s Hit and Run without manual x 2 &euro;12 each\r\nThe Spongebob Squarepants Movie without manual &euro;5\r\nThe Ultimate World Cup Quiz with manual &euro;2\r\nTony Hawk''s Underground with manual &euro;5\r\nThunderbirds with manual &euro;7\r\nTiger Woods PGA Tour 2003 with manual &euro;3\r\nTrivial Pursuit Unhinged with manual &euro;6\r\nTrue Crime Streets of LA with manual &euro;5\r\n\r\nV\r\n\r\nVirtua Cop Elite Edition with manual &euro;7\r\n\r\nW\r\n\r\nWho wants to be a millionaire with manual &euro;5\r\n\r\nPlease note that if paying by PayPal buyer must pay fees.\r\n\r\nThanks \r\n\r\n\r\n', 5, 'images/ps2games04022015.jpg', '', '', '2015-02-26 21:37:36'),
(16, 'PlayStation 3 Games ', 'All in perfect condition and working order.\r\n\r\nCall of Duty 4 Modern Warfare with manual &euro;8\r\nMadden NFL 10 with manual &euro;7\r\nKane and Lynch Dead Men without manual &euro;8 SOLD\r\nLA Noire with manual &euro;15 SOLD\r\nResistance Fall of man with manual &euro;6\r\nNHL 2K9 with manual &euro;5\r\n\r\nCan post if required at buyers expense. ', 7, 'images/ps3games200220150829.jpg', '', '', '2015-02-26 20:38:34'),
(17, 'Championship Pool SNES Boxed ', 'Includes manual and game insert. Box in very good condition. Cart works perfectly. Can post if required at buyers expense. ', 20, 'images/ChampionshipPoolSNESBoxed200220150829.jpg', '', '', '2015-02-26 20:42:57'),
(18, 'Tomb Raider 2 PlayStation One ', 'Perfect condition and working order. Manual included. Can post if required at buyers expense. ', 15, 'images/tombraider2psx.jpg', '', '', '2015-02-26 20:46:52'),
(19, 'Nintendo Wii Games ', 'NEW TITLES ADDED 22/01/2015\r\n\r\nWorking fine. A few scratches but this doesn''t affect gameplay.\r\n\r\nNinja Reflex with manual &euro;5\r\nCarnival Funfair Games with manual &euro;7\r\nTiger Woods PGA Tour 09 All Play with manual &euro;5\r\nTrauma Center Second Opinion with manual &euro;5\r\n\r\nCan post if required at buyers expense. ', 5, 'images/wiigames200220150829.jpg', '', '', '2015-02-26 20:55:21'),
(20, 'Sudoku Master Nintendo DS Brand New', 'Brand new in plastic wrapping. Can post if required at buyers expense. ', 15, 'images/SudokuMasterDs.jpg', '', '', '2015-02-26 21:08:53'),
(21, 'Goldeneye 007 Nintendo DS Brand New ', 'Brand new in plastic wrapping. Can post if required at buyers expense. ', 15, 'images/Goldeneye007Ds.jpg', '', '', '2015-02-26 21:11:43'),
(22, 'Nintendo Wii Games ', 'NEW TITLES ADDED 02/02/2015 All games listed are not pictured!!!!\r\n\r\nNintendo Wii Games\r\n\r\nAll in perfect condition and working order.\r\n\r\nIndividually priced or can sell as a bundle.\r\n\r\nSonic and the Secret Rings with manual &euro;12\r\n\r\nChicken Little Ace in Action with manual &euro;8\r\n\r\nNinja Reflex with manual &euro;5\r\n\r\nCarnival Fun Games with manual &euro;7\r\n\r\nSuper Mario Galaxy without manual &euro;12 SOLD\r\n\r\nFifa 08 with manual &euro;5\r\n\r\nWii Music with manual &euro;6\r\n\r\nWii Sports/Wii Sports Resort &euro;12 SOLD\r\n\r\nDiabolik The Original Sin &euro;10\r\n\r\nFifa 09 All Play &euro;7\r\n\r\n\r\n\r\nAll games include manual apart from WIi Sports\r\n\r\nCan post if required. Buyer pays for postage.', 10, 'images/NintendoWiiGames080220151305.jpg', '', '', '2015-02-27 21:33:01'),
(23, 'Need for Speed Pro Street PS2 Brand New ', '2 Brand new in wrapping. \r\n1 Brand new without wrapping. \r\nCan post if required at buyers expense. &euro;12 each for the sealed games and &euro;8 for the unsealed game.', 8, 'images/NFSProStreet040220151823.jpg', '', '', '2015-03-02 22:26:53'),
(24, 'High School Musical 3 Dance PS2 Brand New ', 'Brand new in wrapping. \r\nCan post if required at buyers expense. &euro;10 each. ', 10, 'images/HighSchoolMusical3DancePS2BrandNew040220151830.jpg', '', '', '2015-03-02 22:28:05'),
(25, 'Chicken Little Ace in Action Nintendo Wii ', 'In perfect working order. Includes manual. Can post if required at buyers expense. ', 8, 'images/ChickenLittleAceinActionNintendoWii040220151819.jpg', '', '', '2015-02-27 20:58:55'),
(26, 'Sonic and the Secret Rings Nintendo Wii ', 'In perfect working order. Comes with manual. Can post if required at buyers expense. ', 12, 'images/SonicandtheSecretRingsNintendoWii 040220151817.jpg', '', '', '2015-02-27 21:01:48'),
(27, 'Jak and Daxter The Precursor Legacy PS2 ', 'No manual. Works fine. Can post if required at buyers expense. ', 10, 'images/JakandDaxterThePrecursorLegacyPS2Platinum.jpg', '', '', '2015-02-27 21:14:01'),
(28, 'Grand Theft Auto San Andreas PS2 ', 'Includes manual. No map. Can post if required at buyers expense. Works fine. ', 10, 'images/GrandTheftAutoSanAndreasPS2.jpg', '', '', '2015-02-27 21:15:53'),
(29, 'Rayman 3 Hoodlum Havoc PS2 ', 'Includes manual. Works fine. Can post if required at buyers expense. ', 10, 'images/Rayman3HoodlumHavocPS2.jpg', '', '', '2015-02-27 21:18:22'),
(30, 'Sega Superstars PS2 ', 'No manual. Works fine. Can post if required at buyers expense. Requires Eye Toy Camera. ', 9, 'images/SegaSuperstarsPS2.jpg', '', '', '2015-02-27 21:20:20'),
(31, 'Sega Soccer Slam PS2 ', 'No manual. Works fine. Can post if required at buyers expense. ', 7, 'images/SegaSoccerSlamPS2.jpg', '', '', '2015-02-27 21:23:27'),
(32, 'I Ninja PS2 ', 'Includes manual. Perfect condition and working order. Can post if required at buyers expense. ', 9, 'images/INinjaPs2.jpg', '', '', '2015-02-27 21:26:05'),
(33, 'TY The Tasmanian Tiger PS2 ', 'Includes manual. In perfect working order. Can post if required at buyers expense. ', 6, 'images/TYTheTasmanianTigerPS2.jpg', '', '', '2015-02-27 21:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE IF NOT EXISTS `other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `picurl1` varchar(255) NOT NULL,
  `picurl2` varchar(255) NOT NULL,
  `picurl3` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `details` text NOT NULL,
  `category` varchar(64) NOT NULL,
  `subcategory` varchar(64) NOT NULL,
  `picurl1` text NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_name` (`product_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `details`, `category`, `subcategory`, `picurl1`, `date_added`) VALUES
(1, 'GRAND THEFT AUTO EPISODES FROM LIBERTY CITY for Xbox 360', '20.00', 'As new perfect condition.', 'Games', 'Used', 'inventory_images/1.jpg', '2015-08-18'),
(2, 'Fifa 2004 for Nintendo Gamecube', '5.00', 'Excellent condition. Manual included. Can post if required. Buyer pays for postage. ', 'Games', 'Used', 'inventory_images/2.jpg', '2015-08-19'),
(3, 'Nintendo Entertainment System', '129.00', 'Nintendo NES console. Excellent condition. Comes with 2 controllers (one controller has a little yellowing), Zapper Gun, Power cable, AV cable and one game Mario/Duck Hunt (with sleeve) (2 games on one cart). Can send via registered post at buyers expense. Has been tested fully and works perfectly. ', 'Consoles', 'Used', 'inventory_images/3.jpg', '2015-08-21'),
(4, 'PlayStation One Controller ', '10.00', 'PRICE DROP Excellent condition. Can post if required. Buyer pays for postage. ', 'Accessories', 'Used', 'inventory_images/4.jpg', '2015-08-21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
