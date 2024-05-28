-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2024, 04:54:31
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
-- Veritabanı: `gym-kulubu-yonetim-uygulamasi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `content`, `created_at`) VALUES
(12, 'Basics Tips for Increasing Strength', 'Strength training is an essential part of any fitness regimen, whether you\'re a beginner or a seasoned athlete. Here are some fundamental tips to help you increase your strength effectively and safely:\r\n\r\n1. FOCUS ON COMPOUND MOVEMENTS\r\nCompound exercises like squats, deadlifts, bench press, overhead press, and barbell rows engage multiple muscle groups and joints, allowing you to lift heavier weights and stimulate more muscle growth. Incorporate these exercises into your routine to build a strong foundation.\r\n\r\n2. PROGRESSIVE OVERLOAD\r\nTo gain strength, you must progressively increase the weight you lift over time. This concept, known as progressive overload, forces your muscles to adapt to the increased stress, leading to growth and strength gains. Gradually add weight, increase reps, or improve your lifting technique to continuously challenge your muscles.\r\n\r\n3. PROPER FORM AND TECHNIQUE\r\nMaintaining proper form is crucial to prevent injuries and maximize effectiveness. Focus on learning the correct technique for each exercise. Use a mirror, record yourself, or work with a trainer to ensure you\'re performing movements correctly. Good form not only helps prevent injuries but also ensures you\'re targeting the right muscles.\r\n\r\n4. CONSISTENCY IS KEY\r\nStrength training requires consistent effort over time. Aim for at least three to four training sessions per week, and stick to your schedule. Consistency allows your muscles to adapt and grow stronger. Remember, progress takes time, so be patient and persistent.\r\n\r\n5. ADEQUATE RECOVERY\r\nRest and recovery are just as important as the workouts themselves. Ensure you\'re getting enough sleep, staying hydrated, and allowing your muscles time to recover between sessions. Overtraining can lead to burnout and injuries, so listen to your body and incorporate rest days into your routine.\r\n\r\n6. NUTRITION MATTERS\r\nFueling your body with the right nutrients is essential for strength gains. Consume a balanced diet rich in protein, healthy fats, and complex carbohydrates to support muscle repair and growth. Consider tracking your macronutrient intake to ensure you\'re meeting your nutritional needs.\r\n\r\n7. SET REALISTIC GOALS\r\nSetting achievable and realistic goals keeps you motivated and focused. Break down your long-term strength goals into smaller, manageable milestones. Celebrate your progress along the way to stay motivated and committed to your training.\r\n\r\n8. STAY HYDRATED\r\nHydration is crucial for optimal performance and recovery. Drink plenty of water throughout the day, especially before, during, and after your workouts. Proper hydration helps maintain muscle function and overall health.\r\n\r\n9. WARM-UP AND COOL DOWN\r\nAlways start your workout with a proper warm-up to prepare your muscles and joints for the stress of lifting. Incorporate dynamic stretches and light cardio to increase blood flow. After your workout, cool down with static stretches to promote flexibility and reduce muscle soreness.\r\n\r\n10. LISTEN TO YOUR BODY\r\nPay attention to how your body responds to different exercises and training volumes. If you experience pain or discomfort, adjust your technique or reduce the weight. It\'s important to differentiate between the normal discomfort of a challenging workout and pain that could indicate an injury.\r\n\r\nBY FOLLOWING THESE BASIC TIPS , YOU\'LL CREATE A STRONG FOUNDATİON FOR INCREASING YOUR STRENGTH AND ACHİEVİNG YOUR FITNESS GOALS. REMEMBER, STRENGTH TRAINING IS A JOURNEY, SO STAY DEDICATED, STAY CONSISTENT, AND ENJOY THE PROCESS OF BECOMING STRONGER AND HEALTHIER.\r\n', '2024-05-27 19:51:42');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `community_forum`
--

CREATE TABLE `community_forum` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `experience` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `community_forum`
--

INSERT INTO `community_forum` (`id`, `user_id`, `experience`, `created_at`) VALUES
(1, 1, 'I was able to 225 lb bench at the end of the 3x5 program.', '2024-05-28 02:13:40'),
(2, 3, 'Woohoo, I finally smashed my plateous!', '2024-05-28 02:16:16'),
(3, 5, 'Exercising the rotator cuff muscles reduced my shoulder problems.', '2024-05-28 02:17:08');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `events`
--

INSERT INTO `events` (`id`, `event_name`, `description`, `date`, `time`, `location`, `created_by`) VALUES
(3, 'Bench press vücut ağırlığının %70\'iyle en yüksek tekrarı yapma yarışması', 'En yüksek tekrarı yapan kazanır.', '2024-06-30', '19:00:00', 'Powerhouse Gym Address : 123 Main St, Anytown,  USA  Phone:+1 555-123-4567', NULL),
(4, 'Deadlift Party', 'Katılan herkes kendi o günkü 1 tekrar maksimum deadliftini yapacak . Erkekler ve kadınlardan ipf dots skoruna göre ilk 3\'e ödül.', '2024-07-05', '19:00:00', 'Powerhouse Gym', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `info`
--

INSERT INTO `info` (`id`, `type`, `title`, `content`, `created_by`, `created_at`) VALUES
(2, NULL, 'Working Hours on Weekdays', '09.00-01.00 ', NULL, '2024-05-27 00:23:13'),
(3, NULL, 'Working Hours on Weekends', '10.00-22.00 ', NULL, '2024-05-27 00:32:20'),
(4, NULL, ' For everyone', 'who wants to get stronger , do fitness and stay health', NULL, '2024-05-27 00:50:11');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `info_exchange`
--

CREATE TABLE `info_exchange` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'user1', '$2y$10$sWiPvpNt1iwQJQiR4.fHneVFFzgRqbUJkFSLgRVq1rbFCXigfn0zK', 'user'),
(2, 'admin', 'admin123', 'admin'),
(3, 'user2', '$2y$10$iOoa8n7GHjdg3ZrU/H5ofOdpTzHLZL4300.AJtIJ4ftvvaqx4SJbG', 'user'),
(4, 'user2', '$2y$10$sJFkNsDcw36BkobGFSyJt.doMPc.OGgWlM/5erWTyaeOLZQFz7W72', 'user'),
(5, 'user3', '$2y$10$dThYNF1H6qO9u0RymuU1k.aaNhWIju.rTWN4j1cwHR0pJZQoAwTh6', 'user');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `workout_notes`
--

CREATE TABLE `workout_notes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `week` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `workout_notes`
--

INSERT INTO `workout_notes` (`id`, `user_id`, `week`, `note`, `created_at`) VALUES
(1, 1, 1, 'Monday\r\nSquat 5x5 80 kg\r\nBench 5x5 60 kg\r\nRow 5x5 60 kg \r\n\r\nWednesday\r\nSquat 5x5 82.5 kg\r\nOverhead Press 5x5 40 kg\r\nDeadlift 1x5 100 kg\r\n\r\nFriday\r\nSquat 5x5 85 kg\r\nBench 5x5 62.5 kg\r\nRow 5x5 62.5 kg \r\n\r\n', '2024-05-28 00:55:48'),
(2, 1, 2, 'Workout 1 Squat 87.5 / Bench 65 / Row 65\r\nWorkout 2 Squat 90 / OHP 42.5 / Deadlift 105\r\nWorkout 3 Squat  92.5 / Bench 67.5 / ROW 67.5', '2024-05-28 01:14:39'),
(3, 1, 3, 'Workout 1 Squat 95 Bench 70 Row 70 / Workout 2 Squat 97.5 OHP 45 Deadlift 105 / Workout 3 Squat 100 Bench 72.5 ROW 72.5 ', '2024-05-28 01:16:36');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `community_forum`
--
ALTER TABLE `community_forum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Tablo için indeksler `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Tablo için indeksler `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Tablo için indeksler `info_exchange`
--
ALTER TABLE `info_exchange`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `workout_notes`
--
ALTER TABLE `workout_notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `community_forum`
--
ALTER TABLE `community_forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `info_exchange`
--
ALTER TABLE `info_exchange`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `workout_notes`
--
ALTER TABLE `workout_notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `community_forum`
--
ALTER TABLE `community_forum`
  ADD CONSTRAINT `community_forum_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `info_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `info_exchange`
--
ALTER TABLE `info_exchange`
  ADD CONSTRAINT `info_exchange_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`);

--
-- Tablo kısıtlamaları `workout_notes`
--
ALTER TABLE `workout_notes`
  ADD CONSTRAINT `workout_notes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
