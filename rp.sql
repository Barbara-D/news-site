-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 03:52 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rp`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Eleanor', 'Shellstrop', 'eleanor', '$2y$10$2gySTEEb/pALxq7Wb7lpX./ywJOkLvWlI0V1pLKtciqVILmW2s9Eq', 1),
(2, 'Chidi', 'Anagonye', 'chidi', '$2y$10$RJI3/cUXz3JBxgdmx4Qsxur7zd4BAeKTNxzNtPBXDNz1hzmRmSssC', 0),
(3, 'Tahani', 'AlJamil', 'tahani', '$2y$10$gjYn97vpFgyMXV32txa61.P9/4Y2YLOhI/LCi91GRAtYNx14YaKz6', 0),
(4, 'Jason', 'Mendoza', 'jason', '$2y$10$rait/YJy/xvGUDjzExJVH.X1KERyLDtsPETDLt.5kIURdbVEfJbiy', 0),
(10, 'Janet', 'Janet', 'janet', '$2y$10$RoDAqggFhgNxx4lEWv/Tlu3n/IECk/0ps8KhQFRqDeCbY3AC5nX/O', 0),
(11, 'Michael', 'Michael', 'michael', '$2y$10$kzjukELpDAT8lb7ql4sKsO6V88q6RX5y4SZLhQ0yQSTctcHAYw.Vu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `sazetak` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `tekst` text CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `slika` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `kategorija` varchar(64) CHARACTER SET latin2 COLLATE latin2_croatian_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(25, '23.06.2019.', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2.jpg', 'Technology', 0),
(26, '23.06.2019.', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', '1.jpg', 'Technology', 0),
(27, '23.06.2019.', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page.', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '3.webp', 'Technology', 0),
(28, '23.06.2019.', 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available.', 'but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '4.jpg', 'Technology', 0),
(29, '23.06.2019.', 'What is Lorem Ipsum?', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum has been the industry&#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '5.jpg', 'Design', 0),
(30, '23.06.2019.', 'Where does it come from?', 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\n', '6.jpg', 'Design', 0),
(31, '23.06.2019.', 'Why do we use it?', 'It is a long established fact that a reader will be distracted by the readable content of a page.', 'The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#039;Content here, content here&#039;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#039;lorem ipsum&#039; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '7.jpg', 'Design', 0),
(32, '23.06.2019.', 'Where can I get some?', 'There are many variations of passages of Lorem Ipsum available.', 'But the majority have suffered alteration in some form, by injected humour, or randomised words which don&#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '8.jpeg', 'Design', 0),
(33, '23.06.2019.', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'Vivamus faucibus leo a urna mattis, et suscipit mauris efficitur. Mauris at lacus ac mauris luctus interdum. Phasellus at mi lorem. Proin consectetur leo sit amet enim molestie faucibus. Donec lectus ligula, bibendum ac augue ac, dapibus malesuada dolor. Pellentesque orci metus, finibus vitae sollicitudin ut, ultrices non libero. Proin ut lectus eget odio maximus sagittis ac quis libero. Vivamus ut viverra augue. Nunc at ultricies justo. Nam porttitor elit lectus, ut sollicitudin elit consequat interdum. Duis ornare eros ipsum, et vulputate tellus fringilla ullamcorper. Maecenas in nisi eu ipsum tempor porttitor. Aliquam aliquet magna a urna dapibus posuere. Proin efficitur nec libero ullamcorper accumsan.\r\n\r\nNullam sapien velit, tincidunt et efficitur nec, faucibus vitae nunc. Proin rutrum gravida laoreet. Mauris semper hendrerit fringilla. Curabitur sit amet bibendum nibh, et tempus urna. Sed non mi a dolor fringilla maximus. Fusce semper ut est non scelerisque. Pellentesque eros erat, egestas sit amet nisi a, tristique dapibus erat. Duis mattis dignissim justo, non convallis orci molestie in. Fusce non turpis et nunc hendrerit porta quis at massa. Sed in tellus sodales diam dignissim lacinia eu et odio. Praesent porttitor molestie tortor, placerat lacinia lorem commodo sit amet. Curabitur eleifend lacinia nisi, eu mollis lectus gravida id. Suspendisse mattis sem id dolor tempus, a suscipit risus fermentum. Morbi convallis maximus metus. Pellentesque vel placerat nunc.', '0.jpg', 'Design', 0),
(34, '23.06.2019.', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'Vivamus faucibus leo a urna mattis, et suscipit mauris efficitur. Mauris at lacus ac mauris luctus interdum. Phasellus at mi lorem. Proin consectetur leo sit amet enim molestie faucibus. Donec lectus ligula, bibendum ac augue ac, dapibus malesuada dolor. Pellentesque orci metus, finibus vitae sollicitudin ut, ultrices non libero. Proin ut lectus eget odio maximus sagittis ac quis libero. Vivamus ut viverra augue. Nunc at ultricies justo. Nam porttitor elit lectus, ut sollicitudin elit consequat interdum. Duis ornare eros ipsum, et vulputate tellus fringilla ullamcorper. Maecenas in nisi eu ipsum tempor porttitor. Aliquam aliquet magna a urna dapibus posuere. Proin efficitur nec libero ullamcorper accumsan.\r\n\r\nNullam sapien velit, tincidunt et efficitur nec, faucibus vitae nunc. Proin rutrum gravida laoreet. Mauris semper hendrerit fringilla. Curabitur sit amet bibendum nibh, et tempus urna. Sed non mi a dolor fringilla maximus. Fusce semper ut est non scelerisque. Pellentesque eros erat, egestas sit amet nisi a, tristique dapibus erat. Duis mattis dignissim justo, non convallis orci molestie in. Fusce non turpis et nunc hendrerit porta quis at massa. Sed in tellus sodales diam dignissim lacinia eu et odio. Praesent porttitor molestie tortor, placerat lacinia lorem commodo sit amet. Curabitur eleifend lacinia nisi, eu mollis lectus gravida id. Suspendisse mattis sem id dolor tempus, a suscipit risus fermentum. Morbi convallis maximus metus. Pellentesque vel placerat nunc.', '0.jpg', 'Technology', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
