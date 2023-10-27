-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 12:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deverzamelaar`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `sent_at`) VALUES
(8, 'Testing Contact Form', 'test@deverzamelaar.com', 'Dit is een test bericht voor de contact formulier. Dit word in de database gezet.', '2023-10-09 12:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `name`, `email`, `phone_number`, `address`, `purchase_date`) VALUES
(1, NULL, 'nebi', 'jan@gmail.com', '2314214124', 'janpierter', '2023-10-04 09:26:48'),
(2, NULL, 'nebi', 'jan@gmail.com', '2314214124', 'janpierter', '2023-10-04 09:28:51'),
(3, 5, 'sadasdas', 'asdsa@mgail.com', '12312312321321', 'adasdasdas', '2023-10-04 09:31:02'),
(4, 5, 'asdasd', 'asdasd@gmail.com', '213421432142', 'jijdiajdijaidj TEST', '2023-10-04 09:31:33'),
(5, 2, 'sadasd', 'asdasdsa@gmakl.com', '123213', 'asdas', '2023-10-04 09:44:07'),
(6, 2, 'Test123', 'test123@gmail.com', '06124214124214', 'janpiederstraart', '2023-10-04 10:08:29'),
(7, 2, 'silvester', '123jan@gmail.com', '12312312312312', 'janstraat', '2023-10-06 09:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_admin`) VALUES
(2, 'nebi', '$2y$10$if4oBkPdmaVag0UNeRDmVO9.Af.HlL/USaAmSTRpMSSL2cua1q1DO', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verzameling`
--

CREATE TABLE `verzameling` (
  `ID` int(11) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `beschrijving` text NOT NULL,
  `prijs` varchar(11) NOT NULL,
  `eigenschappen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `verzameling`
--

INSERT INTO `verzameling` (`ID`, `naam`, `image`, `beschrijving`, `prijs`, `eigenschappen`) VALUES
(1, 'FC24', 'https://www.datocms-assets.com/56706/1691400281-ea-sports-fc24.jpg', 'EA SPORTS FC™ 24 brengt je dichter bij voetbal dan ooit tevoren, gedreven door een drietal technologieën die in elke wedstrijd zorgen voor realistische gameplay. HyperMotionV legt voetbal vast zoals het wordt gespeeld en brengt die wedstrijdbeweging in het spel.', '79,99', 'Sport, Multiplayer'),
(2, 'GTA: San Andreas', 'https://media.s-bol.com/kXr3J3E6yolK/QkNWzJG/853x1200.jpg', 'Grand Theft Auto: San Andreas is een open-wereld actie-avonturenspel waarin spelers als Carl Johnson, door de fictieve Amerikaanse staat San Andreas reizen, zich mengen in gang-conflicten, missies voltooien, en vrijelijk de stedelijke en landelijke omgevingen verkennen, terwijl ze verwikkeld zijn in een verhaal van misdaad en wraak.', '9,99', 'Open world, Multiplayer, Actie'),
(3, 'Uncharted 2', 'https://media.s-bol.com/J6DYkVj79l9o/550x632.jpg', 'Uncharted 2: Among Thieves is een actie-avonturenspel waarin speler Nathan Drake op een globaal avontuur gaat, vol gevaarlijke locaties en schatzoektochten, gecombineerd met pakkende puzzels en intensieve gevechten, allemaal verpakt in een cinematografisch verhaal van verraad en vriendschap.', '5,49', 'Story mode, Multiplayer, Avontuur'),
(4, 'Halo: Combat Evolved', 'https://media.s-bol.com/pZRGNAG3G2W2/550x782.jpg', 'Halo: Combat Evolved is een sci-fi first-person shooter waarin spelers de rol aannemen van Master Chief, een super-soldaat die de mensheid moet beschermen tegen de dreigende Covenant-alliantie en de mysterieuze Halo-structuur onderzoekt, terwijl hij intensieve grond- en voertuiggevechten ervaart.', '19,99', 'FPS, Multiplayer'),
(5, 'Super Mario Bros U', 'https://media.s-bol.com/YoyN5PPy3V9/550x786.jpg', 'New Super Mario Bros. U is een side-scrolling platformspel waarin spelers als Mario, Luigi, en vrienden door kleurrijke werelden reizen, vijanden verslaan, munten verzamelen, en prinses Peach redden, met zowel solo als multiplayer-modi voor extra speelplezier en uitdagingen.', '43,99', 'Platform spel, Multiplayer'),
(6, 'PS2 Console', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/PS2-Fat-Console-Set.png/1200px-PS2-Fat-Console-Set.png', 'De PlayStation 2 (PS2), uitgebracht in het jaar 2000, staat bekend als een van de meest succesvolle gameconsoles aller tijden. Met zijn uitgebreide bibliotheek van memorabele games, zoals \"Final Fantasy X\", \"Grand Theft Auto: San Andreas\" en \"Metal Gear Solid 2\", biedt de PS2 een nostalgische duik in het verleden voor liefhebbers van retro gaming.\r\n\r\n\r\n\r\n\r\n', '77,80', 'Spelconsole, Playstation'),
(7, 'FNAF: Freddy plush', 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/08496144-caf2-4bd4-a145-83d3ae160692/dbjqepp-a140e11c-fa4a-4682-90cb-8228b858f538.png/v1/fill/w_769,h_1038/funko_fnaf_freddy_plush_png__3_by_superfredbear734_dbjqepp-fullview.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTAzOCIsInBhdGgiOiJcL2ZcLzA4NDk2MTQ0LWNhZjItNGJkNC1hMTQ1LTgzZDNhZTE2MDY5MlwvZGJqcWVwcC1hMTQwZTExYy1mYTRhLTQ2ODItOTBjYi04MjI4Yjg1OGY1MzgucG5nIiwid2lkdGgiOiI8PTc2OSJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.510b0wboyb1dLjZt0OZTTtDp68vrkJ6jtUtPf9CQ4nU', 'Ontdek de knuffelbare FNAF Freddy Plush, rechtstreeks uit de beruchte, nachtmerrie-achtige pizzeria van Five Nights at Freddy\'s! Met zijn iconische tophoed en mysterieuze glimlach is deze onweerstaanbaar griezelige pluche een essentiële aanwinst voor verzamelaars en fans van het spookachtige spel. Laat Freddy je collectie spookachtig verrijken!', '11,99', 'Horror, knuffelbeer'),
(8, 'God of War: Ragnarok', 'https://media.s-bol.com/RjZX7BlY32ow/pYo00p/550x703.jpg', 'Verken de mythische wereld van \'God of War: Ragnarok\', waarin Kratos en Atreus een epische reis maken door een universum vol Noorse goden, adembenemende gevechten en ontroerende momenten. Terwijl de vader-zoon band wordt getest in heroïsche gevechten, hangt het lot van de wereld in de balans. Beleef een reis van kracht en verlossing.', '47,99', 'Actie-avontuur, Vechtspel, Schietspel'),
(9, 'League of Legends: €20 Giftcard', 'https://gamecardsdirect.com/content/picture/35739/league-of-legends-20-eu.webp', 'Verrijk je League of Legends-avontuur met een €20 giftcard! Ontgrendel champions, koop unieke skins en verhoog je in-game mogelijkheden. Een ideaal geschenk voor elke LoL-enthousiasteling! (Giftcard te gebruiken in de volgende games: League of Legends, Teamfight Tactics, Legends of Runeterra en Valorant', '20,00', 'Giftcards, Opwaarderen ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `verzameling`
--
ALTER TABLE `verzameling`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `verzameling`
--
ALTER TABLE `verzameling`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `verzameling` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
