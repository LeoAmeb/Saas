-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889x
-- Generation Time: Feb 28, 2020 at 07:26 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_nutri_saludable`
--

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `apellido_paterno` varchar(200) DEFAULT NULL,
  `apellido_materno` varchar(200) DEFAULT NULL,
  `correo_electronico` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` text,
  `fecha_nacimiento` date DEFAULT NULL,
  `peso` varchar(2) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido_paterno`, `apellido_materno`, `correo_electronico`, `telefono`, `direccion`, `fecha_nacimiento`, `peso`, `password`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Leonardo', 'Amaya', 'Escobedo', 'leoameb@gmail.com', '8342732302', 'Calle cardenas #456 Las lomas Ciudad Victoria,Tamaulipas', '2000-06-13', '76', NULL, 1, '2020-02-28 04:40:03', '2020-02-28 04:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `cliente_promocion`
--

CREATE TABLE `cliente_promocion` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_promocion` int(11) DEFAULT NULL,
  `clientes_promocion` text,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente_promocion`
--

INSERT INTO `cliente_promocion` (`id`, `id_promocion`, `clientes_promocion`, `activo`, `created_at`, `updated_at`) VALUES
(1, 1, 'leoameb@gmail.com', 1, '2020-02-28 04:46:28', '2020-02-28 04:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promocion`
--

CREATE TABLE `promocion` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre_promocion` varchar(100) DEFAULT NULL,
  `clientes_promocion` text,
  `descuentos_promocion` int(11) DEFAULT NULL,
  `descripcion` text,
  `template` int(11) DEFAULT NULL,
  `serie_promocion` int(11) DEFAULT NULL,
  `fecha_inicial_vigencia` date DEFAULT NULL,
  `fecha_final_vigencia` date DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `promocion`
--

INSERT INTO `promocion` (`id`, `nombre_promocion`, `clientes_promocion`, `descuentos_promocion`, `descripcion`, `template`, `serie_promocion`, `fecha_inicial_vigencia`, `fecha_final_vigencia`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'Cuida tu Salud', NULL, 40, 'Ven a nuestra tienda por servicios para tu salud', 1, 526, '2020-02-27', '2020-03-13', 1, '2020-02-28 04:46:28', '2020-02-28 04:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_name` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_user` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `password_name`, `tipo_user`, `id_cliente`, `remember_token`, `activo`, `created_at`, `updated_at`) VALUES
(1, 'hector89', 'hector@hotmail.com', '$2y$10$rxr0NeYXUf.Xjznz9u9Jn.Vm7vEQpn75WQBiHFiX1SUFtGRYUWvIq', NULL, 1, 0, 'CQlXwcgED4oKOkgyAU9pqgI0VDo5pS94ucjOVBEb6ngu0OB5dgnSErSlmVBA', 1, '2020-02-27 01:27:59', '2020-02-27 01:27:59'),
(10, 'diego.salmedo', 'hector_vargas89@hotmail.com', '$2y$10$jPJfJseBDqWxJaTtU7SJx.maboAs0AcbiUAdG1Vq/MPlehkhkS.te', 'diego89', 2, NULL, NULL, 0, '2020-02-28 02:30:28', '2020-02-28 04:28:59'),
(11, 'Leo.Ameb', 'leoameb@gmail.com', '$2y$10$h8HQ6RujywsfjnM8zDq4beLYMyGH5XVq484Q2reuoncUuFAYJ9bna', 'leo.ameb', 1, NULL, NULL, 1, '2020-02-28 04:30:37', '2020-02-28 04:30:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente_promocion`
--
ALTER TABLE `cliente_promocion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `promocion`
--
ALTER TABLE `promocion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cliente_promocion`
--
ALTER TABLE `cliente_promocion`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--xx
-- AUTO_INCREMENT for table `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;