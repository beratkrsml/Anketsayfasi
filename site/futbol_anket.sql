-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 04 Eki 2024, 10:23:43
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `futbol_anket`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anket_cevaplari`
--

CREATE TABLE `anket_cevaplari` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `futbol_takimi` varchar(255) DEFAULT NULL,
  `oy_zamani` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `anket_cevaplari`
--

INSERT INTO `anket_cevaplari` (`id`, `ad_soyad`, `email`, `futbol_takimi`, `oy_zamani`) VALUES
(1, 'Berat Karaismail', 'karaismailberat@gmail.com', 'Trabzonspor', '2024-10-03 15:05:04'),
(2, 'Caner Sev', 'canersev@gmail.com', 'Beşiktaş', '2024-10-04 08:06:41'),
(3, 'Eren Can', 'caner@gmail.com', 'Trabzonspor', '2024-10-04 08:09:33'),
(4, 'Güven Dağ', 'dagguv@gmail.com', 'Samsunspor', '2024-10-04 08:10:18'),
(5, 'Lemi Çelik', 'celiklem@gmail.com', 'Trabzonspor', '2024-10-04 08:10:44'),
(6, 'Tufan Kaya', 'kayatuf@gmail.com', 'Galatasaray', '2024-10-04 08:11:45'),
(7, 'Orhan Uygun', 'orhan@gmail.com', 'Beşiktaş', '2024-10-04 08:12:23'),
(8, 'Salih Erdem', 'saliher@gmail.com', 'Göztepe', '2024-10-04 08:14:02'),
(9, 'Can Salim', 'Cancan@gmail.com', 'Trabzonspor', '2024-10-04 08:14:34'),
(10, 'Serdar Güven', 'Serdar@gmail.com', 'Trabzonspor', '2024-10-04 08:18:55'),
(11, 'Civan Sel', 'civsel@gmail.com', 'Fenerbahçe', '2024-10-04 08:19:45');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anket_cevaplari`
--
ALTER TABLE `anket_cevaplari`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `anket_cevaplari`
--
ALTER TABLE `anket_cevaplari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
