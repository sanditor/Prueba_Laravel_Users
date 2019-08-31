-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-08-2019 a las 22:26:37
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba2_laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobbies`
--

DROP TABLE IF EXISTS `hobbies`;
CREATE TABLE IF NOT EXISTS `hobbies` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hobbies_users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `hobbies`
--

INSERT INTO `hobbies` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 29, 'Jugar Futbol', 'Deporte brusco', '2019-08-25 21:19:39', '2019-08-31 13:40:04'),
(2, 4, 'Tennis', 'Deporte blanco', '2019-08-25 21:44:22', '2019-08-31 14:00:51'),
(3, 4, 'Baloncesto', 'Deporte de mucha concentración', '2019-08-25 21:53:23', '2019-08-31 02:57:38'),
(4, 29, 'Ciclismo', 'Deporte de cardio', '2019-08-25 21:56:56', '2019-08-31 13:39:45'),
(5, 4, 'Billar', 'Deporte de precision', '2019-08-25 22:26:30', '2019-08-31 13:58:05'),
(7, 29, 'Natacion', 'Deporte de saber respirar', '2019-08-25 22:40:30', '2019-08-31 21:35:43'),
(8, 4, 'Canotaje', 'Deporte de agilidad', '2019-08-25 22:49:31', '2019-08-31 21:44:06'),
(10, 29, 'Ciclismo', 'Deporte de moda', '2019-08-26 15:56:41', '2019-08-30 23:16:55'),
(12, 4, 'nadar', 'Hermoso deporte', '2019-08-30 00:17:41', '2019-08-30 00:17:41'),
(13, 29, 'Rana', 'juego Popular', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2019_08_27_193141_create_roles_table', 1),
(14, '2019_08_27_193702_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrador', '2019-08-28 07:31:35', '2019-08-28 07:31:35'),
(2, 'user', 'Usuario Normal', '2019-08-28 07:31:35', '2019-08-28 07:31:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 18, 1, NULL, NULL),
(2, 19, 2, NULL, NULL),
(11, 4, 2, NULL, NULL),
(13, 29, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `username`, `email`, `city`, `hobbies`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(4, 'User', 'Carlos', 'Carlos', 'carlitos@carlitos.com', 'Bogota', 'Montar cicla', '$2y$10$HGj31iZlDJ5Ybdme011KvOiQKhCZkla8JL/PJZZamVmS/Un2R00L.', '2019-08-25 18:57:49', '2019-08-31 15:45:57', 'G1SeqoCdQ0BjBkaZIXZ7GS6etRlY2oEiJYPIypOMYUjUOd3bPFYblTkJZ8RF'),
(29, 'Admin', 'santi', 'Santiago', 'santi@santi.com', 'Bogota', 'Dormir y comer', '$2y$10$F4p2mzx9SkA3TbT1UvHYyee1Gy5gPNHhgZcCzz8Hl4S/9w4Oslp/m', '2019-08-29 20:20:20', '2019-08-29 20:20:20', 'x07JvMDh5R4tbzDNtkxbWFP81gU0qk7ljDB2qXBZdU50qavmW52VhkamYCDv');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hobbies`
--
ALTER TABLE `hobbies`
  ADD CONSTRAINT `fk_hobbies_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
