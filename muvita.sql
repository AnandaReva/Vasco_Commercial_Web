-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 02:28 PM
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
-- Database: `muvita`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_sizes`
--

CREATE TABLE `available_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `stock` bigint(20) UNSIGNED NOT NULL,
  `weight` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available_sizes`
--

INSERT INTO `available_sizes` (`id`, `product_variant_id`, `size_id`, `price`, `stock`, `weight`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 257000.00, 318, 400, NULL, NULL),
(8, 1, 2, 255000.00, 331, 300, NULL, '2024-01-07 06:58:00'),
(9, 1, 3, 250000.00, 35, 250, NULL, '2024-01-03 04:02:23'),
(10, 1, 4, 250000.00, 205, 200, NULL, NULL),
(11, 2, 2, 300000.00, 210, 300, NULL, '2024-01-07 07:06:35'),
(12, 2, 3, 290000.00, 106, 250, NULL, '2024-01-03 18:28:00'),
(13, 4, 1, 375000.00, 226, 200, NULL, NULL),
(14, 4, 2, 360000.00, 122, 300, NULL, NULL),
(15, 4, 3, 360000.00, 258, 250, NULL, NULL),
(16, 4, 4, 350000.00, 239, 200, NULL, NULL),
(17, 5, 1, 375000.00, 76, 400, NULL, NULL),
(18, 5, 2, 360000.00, 318, 300, NULL, '2024-01-09 06:25:44'),
(19, 5, 3, 360000.00, 49, 250, NULL, NULL),
(20, 5, 4, 350000.00, 268, 200, NULL, NULL),
(43, 32, 2, 200000.00, 32, NULL, '2024-01-07 04:09:20', '2024-01-07 04:09:20'),
(44, 32, 3, 240000.00, 23, NULL, '2024-01-07 04:09:20', '2024-01-07 04:09:20'),
(45, 33, 2, 300000.00, 34, NULL, '2024-01-07 04:09:20', '2024-01-07 04:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Shirts', '2023-08-27 13:35:25', '2023-08-27 13:35:25'),
(2, 'Denims', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(3, 'T-Shirts', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(4, 'Pants', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(5, 'Sweaters', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(6, 'Outwears', '2023-08-27 13:36:16', '2023-08-27 13:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`) VALUES
(1, 'Red'),
(2, 'Blue'),
(3, 'Green'),
(4, 'Yellow'),
(5, 'Black'),
(6, 'White'),
(7, 'purple'),
(8, 'Grey'),
(9, 'Magenta'),
(10, 'Brown');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cost` decimal(10,2) NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `etd` varchar(255) DEFAULT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `weight` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deliveries`
--

INSERT INTO `deliveries` (`id`, `cost`, `city`, `delivery_address`, `provider`, `service`, `etd`, `recipient`, `created_at`, `updated_at`, `weight`) VALUES
(12, 10000.00, '152', 'Warta Prakarsa (Cak War). Jl. Petemon IV No.32-A, RT 014/RW 008', 'jne', 'CTC', '1-2', 'Candra', '2024-01-09 05:39:21', '2024-01-09 05:39:21', 600),
(13, 10000.00, '151', 'Warta Prakarsa (Cak War). Jl. Petemon IV No.32-A, RT 014/RW 008', 'jne', 'CTC', '1-2', 'Candra', '2024-01-09 05:44:43', '2024-01-09 05:44:43', 600);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(7, '2023_12_05_054024_customer_table', 2),
(8, '2023_12_05_054900_categories_table', 2),
(9, '2023_12_05_055342_product_table', 2),
(10, '2023_12_05_061001_orders_table', 2),
(11, '2023_12_05_061530_order_details_table', 2),
(12, '2023_12_05_061932_payments_table', 2),
(13, '2023_12_05_062750_deliveries_table', 2),
(14, '2023_12_10_080323_create_product_files_table', 3),
(15, '2023_12_30_053952_create_transactions_table', 4),
(17, '2023_12_31_051226_add_columns_to_transactions_table', 5),
(18, '2024_01_01_140653_add_timestamps_to_table', 6),
(19, '2024_01_06_070713_add_delivery_id_to_transactions_table', 7),
(20, '2024_01_06_082914_add_timestamps_to_product_variants_table', 8),
(21, '2020_02_21_103241_create_province', 9),
(22, '2020_02_21_103658_create_city', 9),
(23, '2020_06_17_114209_create_subdistrict', 9),
(25, '2024_01_08_133948_add_weight_to_products_table', 10),
(26, '2024_01_09_041700_add_columns_to_deliveries_table', 11),
(27, '2024_01_09_042030_add_columns_to_deliveries', 12),
(29, '2024_01_09_044549_add_columns_to_deliveries2', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `product_name`, `description`, `created_at`, `updated_at`) VALUES
(25, 1, 'Classic Cotton Short', 'The Classic Cotton Tee is a timeless wardrobe essential that offers both comfort and style. Made from high-quality cotton fabric, this T-shirt is perfect for casual and everyday wear. Its classic design and breathable material make it versatile, allowing you to pair it with jeans for a laid-back look or dress it up with a blazer for a more polished ensemble.', '2023-12-14 13:35:25', '2023-08-27 13:35:25'),
(26, 1, 'Urban Comfort Shirt', 'The Urban Comfort Shirt is designed for the modern urban lifestyle, providing a perfect blend of style and comfort. With a contemporary fit and urban-inspired details, this shirt is suitable for various occasions. Whether you\'re navigating city streets or attending a casual gathering, the Urban Comfort Shirt ensures you look sharp while staying at ease.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(27, 1, 'Everyday Elegance Blouse', 'Elevate your everyday wardrobe with the Everyday Elegance Blouse. This sophisticated blouse combines timeless elegance with comfort, making it suitable for both work and social occasions. The subtle details, such as delicate embroidery or a flattering silhouette, add a touch of refinement to your daily style, allowing you to effortlessly transition from day to evening.', '2023-08-27 13:36:16', '2023-09-07 03:55:10'),
(28, 1, 'Weekend Casual Polo', 'Embrace laid-back style with the Weekend Casual Polo. This polo shirt is crafted for comfort, making it an ideal choice for your weekend escapades and casual outings. The relaxed fit and breathable fabric ensure a cool and effortless look, whether you\'re spending time with friends, heading to a sports event, or simply enjoying a leisurely weekend afternoon.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(29, 1, 'SmartFit Dress Shirt', 'The SmartFit Dress Shirt is tailored for a sharp and polished appearance, making it the perfect choice for formal or business occasions. With a focus on precision fit and quality craftsmanship, this dress shirt exudes professionalism. Whether paired with a suit for the boardroom or worn with dress pants for a special event, the SmartFit Dress Shirt ensures a sophisticated and refined look.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(30, 2, 'Vintage Blue Denim Jeans', 'Denim jeans with a vintage-inspired wash and a classic fit. The distressed details add a touch of rugged charm, making them a versatile choice for casual outings.', '2023-08-27 13:35:25', '2023-08-27 13:35:25'),
(31, 2, 'SlimFit Black Denim Pants', 'Stylish black denim pants with a slim fit, perfect for a modern and edgy look. The stretch fabric ensures comfort, while the sleek design makes them suitable for both casual and semi-formal occasions.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(32, 2, 'High-Rise Distressed Denim Shorts', 'Trendy high-rise denim shorts featuring distressed accents for a laid-back and fashionable vibe. The shorts are designed for comfort and offer a relaxed yet chic style for warm-weather days.', '2023-12-14 05:44:12', NULL),
(33, 3, 'Sunrise Graphic Tee', 'Embrace the warmth of the sunrise with this vibrant graphic tee. Made from soft cotton, it features a unique design that adds a pop of color to your casual wardrobe. Perfect for laid-back weekends or beach outings.', '2023-08-27 13:35:25', '2023-08-27 13:35:25'),
(34, 3, 'Minimalist Pocket Tee', 'Keep it simple and stylish with this minimalist pocket tee. The clean lines and comfortable fit make it a versatile choice for everyday wear. Pair it with jeans or shorts for an effortlessly cool look.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(35, 3, 'Adventure Awaits Tee', 'Fuel your wanderlust with the Adventure Awaits Tee. Crafted for comfort, it features a motivational slogan and a relaxed fit, making it an ideal companion for your explorations or leisurely days.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(36, 4, 'FlexFit Jogger Pants', 'Elevate your athleisure style with these FlexFit Jogger Pants. Designed for both comfort and flexibility, they feature a tapered fit and stretchy fabric, making them perfect for workouts or casual outings.', '2023-08-27 13:35:25', '2023-08-27 13:35:25'),
(37, 4, 'Tailored Chino Trousers', 'Step into sophistication with these tailored chino trousers. Versatile and polished, they offer a refined look suitable for both office settings and smart-casual events. Pair them with a button-down shirt for a classic ensemble.', '2023-12-18 13:36:16', '2023-08-27 13:36:16'),
(38, 4, 'Cargo Adventure Pants', 'Embrace the spirit of adventure with Cargo Adventure Pants. Featuring multiple pockets for utility and a durable yet breathable fabric, these pants are ready for outdoor exploration while maintaining a trendy urban style.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(39, 6, 'Quilted Puffer Jacket', 'Brave the cold in style with the Quilted Puffer Jacket. Featuring a sleek design and insulating fill, this jacket provides both warmth and a contemporary look for winter adventures.', '2023-08-27 13:35:25', '2023-08-27 13:35:25'),
(40, 6, 'Waterproof Shell Parka', 'Face the elements with confidence in the Waterproof Shell Parka. Designed for rainy days, it offers protection without sacrificing style. The adjustable hood and functional details make it a practical choice for unpredictable weather.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(41, 5, 'Cozy Knit Pullover:', 'Wrap yourself in warmth with this Cozy Knit Pullover. The soft and chunky knit provides comfort, while the relaxed fit and subtle details make it a stylish choice for chilly days.', '2023-08-27 13:35:25', '2023-08-27 13:35:25'),
(42, 5, 'Striped Crewneck Sweater', 'Add a touch of classic charm with the Striped Crewneck Sweater. The timeless striped pattern and lightweight knit make it a versatile option for layering. Perfect for a casual day at the office or a weekend brunch.', '2023-08-27 13:36:16', '2023-08-27 13:36:16'),
(50, 1, 'coba3', 'desc3', '2024-01-06 20:01:36', '2024-01-06 20:01:36'),
(51, 1, 'coba4', 'desc4', '2024-01-07 05:30:50', '2024-01-07 05:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_files`
--

CREATE TABLE `product_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_variant_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_files`
--

INSERT INTO `product_files` (`id`, `product_variant_id`, `file_name`, `url`, `created_at`, `updated_at`) VALUES
(3, 1, 'Classic Cotton Short-5', 'product_resources/Shirts/Classic Cotton Short-5.jpg', '2023-12-21 13:31:04', '2023-08-28 05:45:17'),
(4, 2, 'Classic Cotton Short-7', 'product_resources/Shirts/Classic Cotton Short-7.png', '2023-12-19 13:31:04', '2023-08-28 05:45:17'),
(5, 4, 'Urban Comfort Shirt-8', 'product_resources/Shirts/Urban Comfort Shirt-8.png', '2023-12-22 14:00:27', '2023-12-13 14:00:27'),
(6, 5, 'Urban Comfort Shirt-10', 'product_resources/Shirts/Urban Comfort Shirt-10.jpg', '2023-12-15 14:00:27', '2023-12-13 14:00:27'),
(7, 7, 'Everyday Elegance Blouse-3', 'product_resources/Shirts/Everyday Elegance Blouse-3.jpg', '2023-12-20 14:02:43', '2023-12-20 14:02:43'),
(8, 8, 'Everyday Elegance Blouse-9', 'product_resources/Shirts/Everyday Elegance Blouse-9.png', '2023-12-20 14:02:43', '2023-12-20 14:02:43'),
(9, 10, 'Weekend Casual Polo-2', 'product_resources/Shirts/Weekend Casual Polo-2.jpg', '2023-12-20 14:04:24', '2023-12-20 14:04:24'),
(10, 11, 'Weekend Casual Polo-3', 'product_resources/Shirts/Weekend Casual Polo-3.png', '2023-12-20 14:04:24', '2023-12-20 14:04:24'),
(11, 12, 'SmartFit Dress Shirt-6', 'product_resources/Shirts/SmartFit Dress Shirt-6.jpg', '2023-12-20 14:08:20', '2023-12-20 14:08:20'),
(12, 35, 'data_processed.png', 'product_resources/Shirts/data_processed.png', '2024-01-07 05:58:46', '2024-01-07 05:58:46'),
(13, 36, 'dataAPI_padaBlade_dariController.png', 'product_resources/Shirts/dataAPI_padaBlade_dariController.png', '2024-01-07 05:58:46', '2024-01-07 05:58:46'),
(14, 37, 'HTTP_data.png', 'product_resources/Shirts/HTTP_data.png', '2024-01-07 05:58:46', '2024-01-07 05:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 25, 5, NULL, NULL),
(2, 25, 7, NULL, NULL),
(4, 26, 8, NULL, NULL),
(5, 26, 10, NULL, NULL),
(7, 27, 3, NULL, NULL),
(8, 27, 9, NULL, NULL),
(10, 28, 2, NULL, NULL),
(11, 28, 3, NULL, NULL),
(12, 29, 6, NULL, NULL),
(32, 50, 1, '2024-01-06 20:01:41', '2024-01-06 20:01:41'),
(33, 50, 2, '2024-01-06 20:01:41', '2024-01-06 20:01:41'),
(35, 51, 1, '2024-01-07 05:58:46', '2024-01-07 05:58:46'),
(36, 51, 2, '2024-01-07 05:58:46', '2024-01-07 05:58:46'),
(37, 51, 3, '2024-01-07 05:58:46', '2024-01-07 05:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `ro_city`
--

CREATE TABLE `ro_city` (
  `city_id` varchar(20) NOT NULL,
  `province_id` varchar(20) NOT NULL,
  `province` varchar(120) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  `city_name` varchar(128) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ro_city`
--

INSERT INTO `ro_city` (`city_id`, `province_id`, `province`, `type`, `city_name`, `postal_code`, `created_at`, `updated_at`) VALUES
('1', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Barat', '23681', NULL, NULL),
('10', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Timur', '24454', NULL, NULL),
('100', '19', 'Maluku', 'Kabupaten', 'Buru Selatan', '97351', NULL, NULL),
('101', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Buton', '93754', NULL, NULL),
('102', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Buton Utara', '93745', NULL, NULL),
('103', '9', 'Jawa Barat', 'Kabupaten', 'Ciamis', '46211', NULL, NULL),
('104', '9', 'Jawa Barat', 'Kabupaten', 'Cianjur', '43217', NULL, NULL),
('105', '10', 'Jawa Tengah', 'Kabupaten', 'Cilacap', '53211', NULL, NULL),
('106', '3', 'Banten', 'Kota', 'Cilegon', '42417', NULL, NULL),
('107', '9', 'Jawa Barat', 'Kota', 'Cimahi', '40512', NULL, NULL),
('108', '9', 'Jawa Barat', 'Kabupaten', 'Cirebon', '45611', NULL, NULL),
('109', '9', 'Jawa Barat', 'Kota', 'Cirebon', '45116', NULL, NULL),
('11', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Utara', '24382', NULL, NULL),
('110', '34', 'Sumatera Utara', 'Kabupaten', 'Dairi', '22211', NULL, NULL),
('111', '24', 'Papua', 'Kabupaten', 'Deiyai (Deliyai)', '98784', NULL, NULL),
('112', '34', 'Sumatera Utara', 'Kabupaten', 'Deli Serdang', '20511', NULL, NULL),
('113', '10', 'Jawa Tengah', 'Kabupaten', 'Demak', '59519', NULL, NULL),
('114', '1', 'Bali', 'Kota', 'Denpasar', '80227', NULL, NULL),
('115', '9', 'Jawa Barat', 'Kota', 'Depok', '16416', NULL, NULL),
('116', '32', 'Sumatera Barat', 'Kabupaten', 'Dharmasraya', '27612', NULL, NULL),
('117', '24', 'Papua', 'Kabupaten', 'Dogiyai', '98866', NULL, NULL),
('118', '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Dompu', '84217', NULL, NULL),
('119', '29', 'Sulawesi Tengah', 'Kabupaten', 'Donggala', '94341', NULL, NULL),
('12', '32', 'Sumatera Barat', 'Kabupaten', 'Agam', '26411', NULL, NULL),
('120', '26', 'Riau', 'Kota', 'Dumai', '28811', NULL, NULL),
('121', '33', 'Sumatera Selatan', 'Kabupaten', 'Empat Lawang', '31811', NULL, NULL),
('122', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Ende', '86351', NULL, NULL),
('123', '28', 'Sulawesi Selatan', 'Kabupaten', 'Enrekang', '91719', NULL, NULL),
('124', '25', 'Papua Barat', 'Kabupaten', 'Fakfak', '98651', NULL, NULL),
('125', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Flores Timur', '86213', NULL, NULL),
('126', '9', 'Jawa Barat', 'Kabupaten', 'Garut', '44126', NULL, NULL),
('127', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Gayo Lues', '24653', NULL, NULL),
('128', '1', 'Bali', 'Kabupaten', 'Gianyar', '80519', NULL, NULL),
('129', '7', 'Gorontalo', 'Kabupaten', 'Gorontalo', '96218', NULL, NULL),
('13', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Alor', '85811', NULL, NULL),
('130', '7', 'Gorontalo', 'Kota', 'Gorontalo', '96115', NULL, NULL),
('131', '7', 'Gorontalo', 'Kabupaten', 'Gorontalo Utara', '96611', NULL, NULL),
('132', '28', 'Sulawesi Selatan', 'Kabupaten', 'Gowa', '92111', NULL, NULL),
('133', '11', 'Jawa Timur', 'Kabupaten', 'Gresik', '61115', NULL, NULL),
('134', '10', 'Jawa Tengah', 'Kabupaten', 'Grobogan', '58111', NULL, NULL),
('135', '5', 'DI Yogyakarta', 'Kabupaten', 'Gunung Kidul', '55812', NULL, NULL),
('136', '14', 'Kalimantan Tengah', 'Kabupaten', 'Gunung Mas', '74511', NULL, NULL),
('137', '34', 'Sumatera Utara', 'Kota', 'Gunungsitoli', '22813', NULL, NULL),
('138', '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Barat', '97757', NULL, NULL),
('139', '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Selatan', '97911', NULL, NULL),
('14', '19', 'Maluku', 'Kota', 'Ambon', '97222', NULL, NULL),
('140', '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Tengah', '97853', NULL, NULL),
('141', '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Timur', '97862', NULL, NULL),
('142', '20', 'Maluku Utara', 'Kabupaten', 'Halmahera Utara', '97762', NULL, NULL),
('143', '13', 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Selatan', '71212', NULL, NULL),
('144', '13', 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Tengah', '71313', NULL, NULL),
('145', '13', 'Kalimantan Selatan', 'Kabupaten', 'Hulu Sungai Utara', '71419', NULL, NULL),
('146', '34', 'Sumatera Utara', 'Kabupaten', 'Humbang Hasundutan', '22457', NULL, NULL),
('147', '26', 'Riau', 'Kabupaten', 'Indragiri Hilir', '29212', NULL, NULL),
('148', '26', 'Riau', 'Kabupaten', 'Indragiri Hulu', '29319', NULL, NULL),
('149', '9', 'Jawa Barat', 'Kabupaten', 'Indramayu', '45214', NULL, NULL),
('15', '34', 'Sumatera Utara', 'Kabupaten', 'Asahan', '21214', NULL, NULL),
('150', '24', 'Papua', 'Kabupaten', 'Intan Jaya', '98771', NULL, NULL),
('151', '6', 'DKI Jakarta', 'Kota', 'Jakarta Barat', '11220', NULL, NULL),
('152', '6', 'DKI Jakarta', 'Kota', 'Jakarta Pusat', '10540', NULL, NULL),
('153', '6', 'DKI Jakarta', 'Kota', 'Jakarta Selatan', '12230', NULL, NULL),
('154', '6', 'DKI Jakarta', 'Kota', 'Jakarta Timur', '13330', NULL, NULL),
('155', '6', 'DKI Jakarta', 'Kota', 'Jakarta Utara', '14140', NULL, NULL),
('156', '8', 'Jambi', 'Kota', 'Jambi', '36111', NULL, NULL),
('157', '24', 'Papua', 'Kabupaten', 'Jayapura', '99352', NULL, NULL),
('158', '24', 'Papua', 'Kota', 'Jayapura', '99114', NULL, NULL),
('159', '24', 'Papua', 'Kabupaten', 'Jayawijaya', '99511', NULL, NULL),
('16', '24', 'Papua', 'Kabupaten', 'Asmat', '99777', NULL, NULL),
('160', '11', 'Jawa Timur', 'Kabupaten', 'Jember', '68113', NULL, NULL),
('161', '1', 'Bali', 'Kabupaten', 'Jembrana', '82251', NULL, NULL),
('162', '28', 'Sulawesi Selatan', 'Kabupaten', 'Jeneponto', '92319', NULL, NULL),
('163', '10', 'Jawa Tengah', 'Kabupaten', 'Jepara', '59419', NULL, NULL),
('164', '11', 'Jawa Timur', 'Kabupaten', 'Jombang', '61415', NULL, NULL),
('165', '25', 'Papua Barat', 'Kabupaten', 'Kaimana', '98671', NULL, NULL),
('166', '26', 'Riau', 'Kabupaten', 'Kampar', '28411', NULL, NULL),
('167', '14', 'Kalimantan Tengah', 'Kabupaten', 'Kapuas', '73583', NULL, NULL),
('168', '12', 'Kalimantan Barat', 'Kabupaten', 'Kapuas Hulu', '78719', NULL, NULL),
('169', '10', 'Jawa Tengah', 'Kabupaten', 'Karanganyar', '57718', NULL, NULL),
('17', '1', 'Bali', 'Kabupaten', 'Badung', '80351', NULL, NULL),
('170', '1', 'Bali', 'Kabupaten', 'Karangasem', '80819', NULL, NULL),
('171', '9', 'Jawa Barat', 'Kabupaten', 'Karawang', '41311', NULL, NULL),
('172', '17', 'Kepulauan Riau', 'Kabupaten', 'Karimun', '29611', NULL, NULL),
('173', '34', 'Sumatera Utara', 'Kabupaten', 'Karo', '22119', NULL, NULL),
('174', '14', 'Kalimantan Tengah', 'Kabupaten', 'Katingan', '74411', NULL, NULL),
('175', '4', 'Bengkulu', 'Kabupaten', 'Kaur', '38911', NULL, NULL),
('176', '12', 'Kalimantan Barat', 'Kabupaten', 'Kayong Utara', '78852', NULL, NULL),
('177', '10', 'Jawa Tengah', 'Kabupaten', 'Kebumen', '54319', NULL, NULL),
('178', '11', 'Jawa Timur', 'Kabupaten', 'Kediri', '64184', NULL, NULL),
('179', '11', 'Jawa Timur', 'Kota', 'Kediri', '64125', NULL, NULL),
('18', '13', 'Kalimantan Selatan', 'Kabupaten', 'Balangan', '71611', NULL, NULL),
('180', '24', 'Papua', 'Kabupaten', 'Keerom', '99461', NULL, NULL),
('181', '10', 'Jawa Tengah', 'Kabupaten', 'Kendal', '51314', NULL, NULL),
('182', '30', 'Sulawesi Tenggara', 'Kota', 'Kendari', '93126', NULL, NULL),
('183', '4', 'Bengkulu', 'Kabupaten', 'Kepahiang', '39319', NULL, NULL),
('184', '17', 'Kepulauan Riau', 'Kabupaten', 'Kepulauan Anambas', '29991', NULL, NULL),
('185', '19', 'Maluku', 'Kabupaten', 'Kepulauan Aru', '97681', NULL, NULL),
('186', '32', 'Sumatera Barat', 'Kabupaten', 'Kepulauan Mentawai', '25771', NULL, NULL),
('187', '26', 'Riau', 'Kabupaten', 'Kepulauan Meranti', '28791', NULL, NULL),
('188', '31', 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Sangihe', '95819', NULL, NULL),
('189', '6', 'DKI Jakarta', 'Kabupaten', 'Kepulauan Seribu', '14550', NULL, NULL),
('19', '15', 'Kalimantan Timur', 'Kota', 'Balikpapan', '76111', NULL, NULL),
('190', '31', 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', '95862', NULL, NULL),
('191', '20', 'Maluku Utara', 'Kabupaten', 'Kepulauan Sula', '97995', NULL, NULL),
('192', '31', 'Sulawesi Utara', 'Kabupaten', 'Kepulauan Talaud', '95885', NULL, NULL),
('193', '24', 'Papua', 'Kabupaten', 'Kepulauan Yapen (Yapen Waropen)', '98211', NULL, NULL),
('194', '8', 'Jambi', 'Kabupaten', 'Kerinci', '37167', NULL, NULL),
('195', '12', 'Kalimantan Barat', 'Kabupaten', 'Ketapang', '78874', NULL, NULL),
('196', '10', 'Jawa Tengah', 'Kabupaten', 'Klaten', '57411', NULL, NULL),
('197', '1', 'Bali', 'Kabupaten', 'Klungkung', '80719', NULL, NULL),
('198', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Kolaka', '93511', NULL, NULL),
('199', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Kolaka Utara', '93911', NULL, NULL),
('2', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Barat Daya', '23764', NULL, NULL),
('20', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Banda Aceh', '23238', NULL, NULL),
('200', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Konawe', '93411', NULL, NULL),
('201', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Konawe Selatan', '93811', NULL, NULL),
('202', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Konawe Utara', '93311', NULL, NULL),
('203', '13', 'Kalimantan Selatan', 'Kabupaten', 'Kotabaru', '72119', NULL, NULL),
('204', '31', 'Sulawesi Utara', 'Kota', 'Kotamobagu', '95711', NULL, NULL),
('205', '14', 'Kalimantan Tengah', 'Kabupaten', 'Kotawaringin Barat', '74119', NULL, NULL),
('206', '14', 'Kalimantan Tengah', 'Kabupaten', 'Kotawaringin Timur', '74364', NULL, NULL),
('207', '26', 'Riau', 'Kabupaten', 'Kuantan Singingi', '29519', NULL, NULL),
('208', '12', 'Kalimantan Barat', 'Kabupaten', 'Kubu Raya', '78311', NULL, NULL),
('209', '10', 'Jawa Tengah', 'Kabupaten', 'Kudus', '59311', NULL, NULL),
('21', '18', 'Lampung', 'Kota', 'Bandar Lampung', '35139', NULL, NULL),
('210', '5', 'DI Yogyakarta', 'Kabupaten', 'Kulon Progo', '55611', NULL, NULL),
('211', '9', 'Jawa Barat', 'Kabupaten', 'Kuningan', '45511', NULL, NULL),
('212', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Kupang', '85362', NULL, NULL),
('213', '23', 'Nusa Tenggara Timur (NTT)', 'Kota', 'Kupang', '85119', NULL, NULL),
('214', '15', 'Kalimantan Timur', 'Kabupaten', 'Kutai Barat', '75711', NULL, NULL),
('215', '15', 'Kalimantan Timur', 'Kabupaten', 'Kutai Kartanegara', '75511', NULL, NULL),
('216', '15', 'Kalimantan Timur', 'Kabupaten', 'Kutai Timur', '75611', NULL, NULL),
('217', '34', 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu', '21412', NULL, NULL),
('218', '34', 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu Selatan', '21511', NULL, NULL),
('219', '34', 'Sumatera Utara', 'Kabupaten', 'Labuhan Batu Utara', '21711', NULL, NULL),
('22', '9', 'Jawa Barat', 'Kabupaten', 'Bandung', '40311', NULL, NULL),
('220', '33', 'Sumatera Selatan', 'Kabupaten', 'Lahat', '31419', NULL, NULL),
('221', '14', 'Kalimantan Tengah', 'Kabupaten', 'Lamandau', '74611', NULL, NULL),
('222', '11', 'Jawa Timur', 'Kabupaten', 'Lamongan', '64125', NULL, NULL),
('223', '18', 'Lampung', 'Kabupaten', 'Lampung Barat', '34814', NULL, NULL),
('224', '18', 'Lampung', 'Kabupaten', 'Lampung Selatan', '35511', NULL, NULL),
('225', '18', 'Lampung', 'Kabupaten', 'Lampung Tengah', '34212', NULL, NULL),
('226', '18', 'Lampung', 'Kabupaten', 'Lampung Timur', '34319', NULL, NULL),
('227', '18', 'Lampung', 'Kabupaten', 'Lampung Utara', '34516', NULL, NULL),
('228', '12', 'Kalimantan Barat', 'Kabupaten', 'Landak', '78319', NULL, NULL),
('229', '34', 'Sumatera Utara', 'Kabupaten', 'Langkat', '20811', NULL, NULL),
('23', '9', 'Jawa Barat', 'Kota', 'Bandung', '40111', NULL, NULL),
('230', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Langsa', '24412', NULL, NULL),
('231', '24', 'Papua', 'Kabupaten', 'Lanny Jaya', '99531', NULL, NULL),
('232', '3', 'Banten', 'Kabupaten', 'Lebak', '42319', NULL, NULL),
('233', '4', 'Bengkulu', 'Kabupaten', 'Lebong', '39264', NULL, NULL),
('234', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Lembata', '86611', NULL, NULL),
('235', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Lhokseumawe', '24352', NULL, NULL),
('236', '32', 'Sumatera Barat', 'Kabupaten', 'Lima Puluh Koto/Kota', '26671', NULL, NULL),
('237', '17', 'Kepulauan Riau', 'Kabupaten', 'Lingga', '29811', NULL, NULL),
('238', '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Barat', '83311', NULL, NULL),
('239', '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Tengah', '83511', NULL, NULL),
('24', '9', 'Jawa Barat', 'Kabupaten', 'Bandung Barat', '40721', NULL, NULL),
('240', '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Timur', '83612', NULL, NULL),
('241', '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Lombok Utara', '83711', NULL, NULL),
('242', '33', 'Sumatera Selatan', 'Kota', 'Lubuk Linggau', '31614', NULL, NULL),
('243', '11', 'Jawa Timur', 'Kabupaten', 'Lumajang', '67319', NULL, NULL),
('244', '28', 'Sulawesi Selatan', 'Kabupaten', 'Luwu', '91994', NULL, NULL),
('245', '28', 'Sulawesi Selatan', 'Kabupaten', 'Luwu Timur', '92981', NULL, NULL),
('246', '28', 'Sulawesi Selatan', 'Kabupaten', 'Luwu Utara', '92911', NULL, NULL),
('247', '11', 'Jawa Timur', 'Kabupaten', 'Madiun', '63153', NULL, NULL),
('248', '11', 'Jawa Timur', 'Kota', 'Madiun', '63122', NULL, NULL),
('249', '10', 'Jawa Tengah', 'Kabupaten', 'Magelang', '56519', NULL, NULL),
('25', '29', 'Sulawesi Tengah', 'Kabupaten', 'Banggai', '94711', NULL, NULL),
('250', '10', 'Jawa Tengah', 'Kota', 'Magelang', '56133', NULL, NULL),
('251', '11', 'Jawa Timur', 'Kabupaten', 'Magetan', '63314', NULL, NULL),
('252', '9', 'Jawa Barat', 'Kabupaten', 'Majalengka', '45412', NULL, NULL),
('253', '27', 'Sulawesi Barat', 'Kabupaten', 'Majene', '91411', NULL, NULL),
('254', '28', 'Sulawesi Selatan', 'Kota', 'Makassar', '90111', NULL, NULL),
('255', '11', 'Jawa Timur', 'Kabupaten', 'Malang', '65163', NULL, NULL),
('256', '11', 'Jawa Timur', 'Kota', 'Malang', '65112', NULL, NULL),
('257', '16', 'Kalimantan Utara', 'Kabupaten', 'Malinau', '77511', NULL, NULL),
('258', '19', 'Maluku', 'Kabupaten', 'Maluku Barat Daya', '97451', NULL, NULL),
('259', '19', 'Maluku', 'Kabupaten', 'Maluku Tengah', '97513', NULL, NULL),
('26', '29', 'Sulawesi Tengah', 'Kabupaten', 'Banggai Kepulauan', '94881', NULL, NULL),
('260', '19', 'Maluku', 'Kabupaten', 'Maluku Tenggara', '97651', NULL, NULL),
('261', '19', 'Maluku', 'Kabupaten', 'Maluku Tenggara Barat', '97465', NULL, NULL),
('262', '27', 'Sulawesi Barat', 'Kabupaten', 'Mamasa', '91362', NULL, NULL),
('263', '24', 'Papua', 'Kabupaten', 'Mamberamo Raya', '99381', NULL, NULL),
('264', '24', 'Papua', 'Kabupaten', 'Mamberamo Tengah', '99553', NULL, NULL),
('265', '27', 'Sulawesi Barat', 'Kabupaten', 'Mamuju', '91519', NULL, NULL),
('266', '27', 'Sulawesi Barat', 'Kabupaten', 'Mamuju Utara', '91571', NULL, NULL),
('267', '31', 'Sulawesi Utara', 'Kota', 'Manado', '95247', NULL, NULL),
('268', '34', 'Sumatera Utara', 'Kabupaten', 'Mandailing Natal', '22916', NULL, NULL),
('269', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai', '86551', NULL, NULL),
('27', '2', 'Bangka Belitung', 'Kabupaten', 'Bangka', '33212', NULL, NULL),
('270', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai Barat', '86711', NULL, NULL),
('271', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Manggarai Timur', '86811', NULL, NULL),
('272', '25', 'Papua Barat', 'Kabupaten', 'Manokwari', '98311', NULL, NULL),
('273', '25', 'Papua Barat', 'Kabupaten', 'Manokwari Selatan', '98355', NULL, NULL),
('274', '24', 'Papua', 'Kabupaten', 'Mappi', '99853', NULL, NULL),
('275', '28', 'Sulawesi Selatan', 'Kabupaten', 'Maros', '90511', NULL, NULL),
('276', '22', 'Nusa Tenggara Barat (NTB)', 'Kota', 'Mataram', '83131', NULL, NULL),
('277', '25', 'Papua Barat', 'Kabupaten', 'Maybrat', '98051', NULL, NULL),
('278', '34', 'Sumatera Utara', 'Kota', 'Medan', '20228', NULL, NULL),
('279', '12', 'Kalimantan Barat', 'Kabupaten', 'Melawi', '78619', NULL, NULL),
('28', '2', 'Bangka Belitung', 'Kabupaten', 'Bangka Barat', '33315', NULL, NULL),
('280', '8', 'Jambi', 'Kabupaten', 'Merangin', '37319', NULL, NULL),
('281', '24', 'Papua', 'Kabupaten', 'Merauke', '99613', NULL, NULL),
('282', '18', 'Lampung', 'Kabupaten', 'Mesuji', '34911', NULL, NULL),
('283', '18', 'Lampung', 'Kota', 'Metro', '34111', NULL, NULL),
('284', '24', 'Papua', 'Kabupaten', 'Mimika', '99962', NULL, NULL),
('285', '31', 'Sulawesi Utara', 'Kabupaten', 'Minahasa', '95614', NULL, NULL),
('286', '31', 'Sulawesi Utara', 'Kabupaten', 'Minahasa Selatan', '95914', NULL, NULL),
('287', '31', 'Sulawesi Utara', 'Kabupaten', 'Minahasa Tenggara', '95995', NULL, NULL),
('288', '31', 'Sulawesi Utara', 'Kabupaten', 'Minahasa Utara', '95316', NULL, NULL),
('289', '11', 'Jawa Timur', 'Kabupaten', 'Mojokerto', '61382', NULL, NULL),
('29', '2', 'Bangka Belitung', 'Kabupaten', 'Bangka Selatan', '33719', NULL, NULL),
('290', '11', 'Jawa Timur', 'Kota', 'Mojokerto', '61316', NULL, NULL),
('291', '29', 'Sulawesi Tengah', 'Kabupaten', 'Morowali', '94911', NULL, NULL),
('292', '33', 'Sumatera Selatan', 'Kabupaten', 'Muara Enim', '31315', NULL, NULL),
('293', '8', 'Jambi', 'Kabupaten', 'Muaro Jambi', '36311', NULL, NULL),
('294', '4', 'Bengkulu', 'Kabupaten', 'Muko Muko', '38715', NULL, NULL),
('295', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Muna', '93611', NULL, NULL),
('296', '14', 'Kalimantan Tengah', 'Kabupaten', 'Murung Raya', '73911', NULL, NULL),
('297', '33', 'Sumatera Selatan', 'Kabupaten', 'Musi Banyuasin', '30719', NULL, NULL),
('298', '33', 'Sumatera Selatan', 'Kabupaten', 'Musi Rawas', '31661', NULL, NULL),
('299', '24', 'Papua', 'Kabupaten', 'Nabire', '98816', NULL, NULL),
('3', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Besar', '23951', NULL, NULL),
('30', '2', 'Bangka Belitung', 'Kabupaten', 'Bangka Tengah', '33613', NULL, NULL),
('300', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Nagan Raya', '23674', NULL, NULL),
('301', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Nagekeo', '86911', NULL, NULL),
('302', '17', 'Kepulauan Riau', 'Kabupaten', 'Natuna', '29711', NULL, NULL),
('303', '24', 'Papua', 'Kabupaten', 'Nduga', '99541', NULL, NULL),
('304', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Ngada', '86413', NULL, NULL),
('305', '11', 'Jawa Timur', 'Kabupaten', 'Nganjuk', '64414', NULL, NULL),
('306', '11', 'Jawa Timur', 'Kabupaten', 'Ngawi', '63219', NULL, NULL),
('307', '34', 'Sumatera Utara', 'Kabupaten', 'Nias', '22876', NULL, NULL),
('308', '34', 'Sumatera Utara', 'Kabupaten', 'Nias Barat', '22895', NULL, NULL),
('309', '34', 'Sumatera Utara', 'Kabupaten', 'Nias Selatan', '22865', NULL, NULL),
('31', '11', 'Jawa Timur', 'Kabupaten', 'Bangkalan', '69118', NULL, NULL),
('310', '34', 'Sumatera Utara', 'Kabupaten', 'Nias Utara', '22856', NULL, NULL),
('311', '16', 'Kalimantan Utara', 'Kabupaten', 'Nunukan', '77421', NULL, NULL),
('312', '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Ilir', '30811', NULL, NULL),
('313', '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ilir', '30618', NULL, NULL),
('314', '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu', '32112', NULL, NULL),
('315', '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu Selatan', '32211', NULL, NULL),
('316', '33', 'Sumatera Selatan', 'Kabupaten', 'Ogan Komering Ulu Timur', '32312', NULL, NULL),
('317', '11', 'Jawa Timur', 'Kabupaten', 'Pacitan', '63512', NULL, NULL),
('318', '32', 'Sumatera Barat', 'Kota', 'Padang', '25112', NULL, NULL),
('319', '34', 'Sumatera Utara', 'Kabupaten', 'Padang Lawas', '22763', NULL, NULL),
('32', '1', 'Bali', 'Kabupaten', 'Bangli', '80619', NULL, NULL),
('320', '34', 'Sumatera Utara', 'Kabupaten', 'Padang Lawas Utara', '22753', NULL, NULL),
('321', '32', 'Sumatera Barat', 'Kota', 'Padang Panjang', '27122', NULL, NULL),
('322', '32', 'Sumatera Barat', 'Kabupaten', 'Padang Pariaman', '25583', NULL, NULL),
('323', '34', 'Sumatera Utara', 'Kota', 'Padang Sidempuan', '22727', NULL, NULL),
('324', '33', 'Sumatera Selatan', 'Kota', 'Pagar Alam', '31512', NULL, NULL),
('325', '34', 'Sumatera Utara', 'Kabupaten', 'Pakpak Bharat', '22272', NULL, NULL),
('326', '14', 'Kalimantan Tengah', 'Kota', 'Palangka Raya', '73112', NULL, NULL),
('327', '33', 'Sumatera Selatan', 'Kota', 'Palembang', '30111', NULL, NULL),
('328', '28', 'Sulawesi Selatan', 'Kota', 'Palopo', '91911', NULL, NULL),
('329', '29', 'Sulawesi Tengah', 'Kota', 'Palu', '94111', NULL, NULL),
('33', '13', 'Kalimantan Selatan', 'Kabupaten', 'Banjar', '70619', NULL, NULL),
('330', '11', 'Jawa Timur', 'Kabupaten', 'Pamekasan', '69319', NULL, NULL),
('331', '3', 'Banten', 'Kabupaten', 'Pandeglang', '42212', NULL, NULL),
('332', '9', 'Jawa Barat', 'Kabupaten', 'Pangandaran', '46511', NULL, NULL),
('333', '28', 'Sulawesi Selatan', 'Kabupaten', 'Pangkajene Kepulauan', '90611', NULL, NULL),
('334', '2', 'Bangka Belitung', 'Kota', 'Pangkal Pinang', '33115', NULL, NULL),
('335', '24', 'Papua', 'Kabupaten', 'Paniai', '98765', NULL, NULL),
('336', '28', 'Sulawesi Selatan', 'Kota', 'Parepare', '91123', NULL, NULL),
('337', '32', 'Sumatera Barat', 'Kota', 'Pariaman', '25511', NULL, NULL),
('338', '29', 'Sulawesi Tengah', 'Kabupaten', 'Parigi Moutong', '94411', NULL, NULL),
('339', '32', 'Sumatera Barat', 'Kabupaten', 'Pasaman', '26318', NULL, NULL),
('34', '9', 'Jawa Barat', 'Kota', 'Banjar', '46311', NULL, NULL),
('340', '32', 'Sumatera Barat', 'Kabupaten', 'Pasaman Barat', '26511', NULL, NULL),
('341', '15', 'Kalimantan Timur', 'Kabupaten', 'Paser', '76211', NULL, NULL),
('342', '11', 'Jawa Timur', 'Kabupaten', 'Pasuruan', '67153', NULL, NULL),
('343', '11', 'Jawa Timur', 'Kota', 'Pasuruan', '67118', NULL, NULL),
('344', '10', 'Jawa Tengah', 'Kabupaten', 'Pati', '59114', NULL, NULL),
('345', '32', 'Sumatera Barat', 'Kota', 'Payakumbuh', '26213', NULL, NULL),
('346', '25', 'Papua Barat', 'Kabupaten', 'Pegunungan Arfak', '98354', NULL, NULL),
('347', '24', 'Papua', 'Kabupaten', 'Pegunungan Bintang', '99573', NULL, NULL),
('348', '10', 'Jawa Tengah', 'Kabupaten', 'Pekalongan', '51161', NULL, NULL),
('349', '10', 'Jawa Tengah', 'Kota', 'Pekalongan', '51122', NULL, NULL),
('35', '13', 'Kalimantan Selatan', 'Kota', 'Banjarbaru', '70712', NULL, NULL),
('350', '26', 'Riau', 'Kota', 'Pekanbaru', '28112', NULL, NULL),
('351', '26', 'Riau', 'Kabupaten', 'Pelalawan', '28311', NULL, NULL),
('352', '10', 'Jawa Tengah', 'Kabupaten', 'Pemalang', '52319', NULL, NULL),
('353', '34', 'Sumatera Utara', 'Kota', 'Pematang Siantar', '21126', NULL, NULL),
('354', '15', 'Kalimantan Timur', 'Kabupaten', 'Penajam Paser Utara', '76311', NULL, NULL),
('355', '18', 'Lampung', 'Kabupaten', 'Pesawaran', '35312', NULL, NULL),
('356', '18', 'Lampung', 'Kabupaten', 'Pesisir Barat', '35974', NULL, NULL),
('357', '32', 'Sumatera Barat', 'Kabupaten', 'Pesisir Selatan', '25611', NULL, NULL),
('358', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Pidie', '24116', NULL, NULL),
('359', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Pidie Jaya', '24186', NULL, NULL),
('36', '13', 'Kalimantan Selatan', 'Kota', 'Banjarmasin', '70117', NULL, NULL),
('360', '28', 'Sulawesi Selatan', 'Kabupaten', 'Pinrang', '91251', NULL, NULL),
('361', '7', 'Gorontalo', 'Kabupaten', 'Pohuwato', '96419', NULL, NULL),
('362', '27', 'Sulawesi Barat', 'Kabupaten', 'Polewali Mandar', '91311', NULL, NULL),
('363', '11', 'Jawa Timur', 'Kabupaten', 'Ponorogo', '63411', NULL, NULL),
('364', '12', 'Kalimantan Barat', 'Kabupaten', 'Pontianak', '78971', NULL, NULL),
('365', '12', 'Kalimantan Barat', 'Kota', 'Pontianak', '78112', NULL, NULL),
('366', '29', 'Sulawesi Tengah', 'Kabupaten', 'Poso', '94615', NULL, NULL),
('367', '33', 'Sumatera Selatan', 'Kota', 'Prabumulih', '31121', NULL, NULL),
('368', '18', 'Lampung', 'Kabupaten', 'Pringsewu', '35719', NULL, NULL),
('369', '11', 'Jawa Timur', 'Kabupaten', 'Probolinggo', '67282', NULL, NULL),
('37', '10', 'Jawa Tengah', 'Kabupaten', 'Banjarnegara', '53419', NULL, NULL),
('370', '11', 'Jawa Timur', 'Kota', 'Probolinggo', '67215', NULL, NULL),
('371', '14', 'Kalimantan Tengah', 'Kabupaten', 'Pulang Pisau', '74811', NULL, NULL),
('372', '20', 'Maluku Utara', 'Kabupaten', 'Pulau Morotai', '97771', NULL, NULL),
('373', '24', 'Papua', 'Kabupaten', 'Puncak', '98981', NULL, NULL),
('374', '24', 'Papua', 'Kabupaten', 'Puncak Jaya', '98979', NULL, NULL),
('375', '10', 'Jawa Tengah', 'Kabupaten', 'Purbalingga', '53312', NULL, NULL),
('376', '9', 'Jawa Barat', 'Kabupaten', 'Purwakarta', '41119', NULL, NULL),
('377', '10', 'Jawa Tengah', 'Kabupaten', 'Purworejo', '54111', NULL, NULL),
('378', '25', 'Papua Barat', 'Kabupaten', 'Raja Ampat', '98489', NULL, NULL),
('379', '4', 'Bengkulu', 'Kabupaten', 'Rejang Lebong', '39112', NULL, NULL),
('38', '28', 'Sulawesi Selatan', 'Kabupaten', 'Bantaeng', '92411', NULL, NULL),
('380', '10', 'Jawa Tengah', 'Kabupaten', 'Rembang', '59219', NULL, NULL),
('381', '26', 'Riau', 'Kabupaten', 'Rokan Hilir', '28992', NULL, NULL),
('382', '26', 'Riau', 'Kabupaten', 'Rokan Hulu', '28511', NULL, NULL),
('383', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Rote Ndao', '85982', NULL, NULL),
('384', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Sabang', '23512', NULL, NULL),
('385', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sabu Raijua', '85391', NULL, NULL),
('386', '10', 'Jawa Tengah', 'Kota', 'Salatiga', '50711', NULL, NULL),
('387', '15', 'Kalimantan Timur', 'Kota', 'Samarinda', '75133', NULL, NULL),
('388', '12', 'Kalimantan Barat', 'Kabupaten', 'Sambas', '79453', NULL, NULL),
('389', '34', 'Sumatera Utara', 'Kabupaten', 'Samosir', '22392', NULL, NULL),
('39', '5', 'DI Yogyakarta', 'Kabupaten', 'Bantul', '55715', NULL, NULL),
('390', '11', 'Jawa Timur', 'Kabupaten', 'Sampang', '69219', NULL, NULL),
('391', '12', 'Kalimantan Barat', 'Kabupaten', 'Sanggau', '78557', NULL, NULL),
('392', '24', 'Papua', 'Kabupaten', 'Sarmi', '99373', NULL, NULL),
('393', '8', 'Jambi', 'Kabupaten', 'Sarolangun', '37419', NULL, NULL),
('394', '32', 'Sumatera Barat', 'Kota', 'Sawah Lunto', '27416', NULL, NULL),
('395', '12', 'Kalimantan Barat', 'Kabupaten', 'Sekadau', '79583', NULL, NULL),
('396', '28', 'Sulawesi Selatan', 'Kabupaten', 'Selayar (Kepulauan Selayar)', '92812', NULL, NULL),
('397', '4', 'Bengkulu', 'Kabupaten', 'Seluma', '38811', NULL, NULL),
('398', '10', 'Jawa Tengah', 'Kabupaten', 'Semarang', '50511', NULL, NULL),
('399', '10', 'Jawa Tengah', 'Kota', 'Semarang', '50135', NULL, NULL),
('4', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Jaya', '23654', NULL, NULL),
('40', '33', 'Sumatera Selatan', 'Kabupaten', 'Banyuasin', '30911', NULL, NULL),
('400', '19', 'Maluku', 'Kabupaten', 'Seram Bagian Barat', '97561', NULL, NULL),
('401', '19', 'Maluku', 'Kabupaten', 'Seram Bagian Timur', '97581', NULL, NULL),
('402', '3', 'Banten', 'Kabupaten', 'Serang', '42182', NULL, NULL),
('403', '3', 'Banten', 'Kota', 'Serang', '42111', NULL, NULL),
('404', '34', 'Sumatera Utara', 'Kabupaten', 'Serdang Bedagai', '20915', NULL, NULL),
('405', '14', 'Kalimantan Tengah', 'Kabupaten', 'Seruyan', '74211', NULL, NULL),
('406', '26', 'Riau', 'Kabupaten', 'Siak', '28623', NULL, NULL),
('407', '34', 'Sumatera Utara', 'Kota', 'Sibolga', '22522', NULL, NULL),
('408', '28', 'Sulawesi Selatan', 'Kabupaten', 'Sidenreng Rappang/Rapang', '91613', NULL, NULL),
('409', '11', 'Jawa Timur', 'Kabupaten', 'Sidoarjo', '61219', NULL, NULL),
('41', '10', 'Jawa Tengah', 'Kabupaten', 'Banyumas', '53114', NULL, NULL),
('410', '29', 'Sulawesi Tengah', 'Kabupaten', 'Sigi', '94364', NULL, NULL),
('411', '32', 'Sumatera Barat', 'Kabupaten', 'Sijunjung (Sawah Lunto Sijunjung)', '27511', NULL, NULL),
('412', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sikka', '86121', NULL, NULL),
('413', '34', 'Sumatera Utara', 'Kabupaten', 'Simalungun', '21162', NULL, NULL),
('414', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Simeulue', '23891', NULL, NULL),
('415', '12', 'Kalimantan Barat', 'Kota', 'Singkawang', '79117', NULL, NULL),
('416', '28', 'Sulawesi Selatan', 'Kabupaten', 'Sinjai', '92615', NULL, NULL),
('417', '12', 'Kalimantan Barat', 'Kabupaten', 'Sintang', '78619', NULL, NULL),
('418', '11', 'Jawa Timur', 'Kabupaten', 'Situbondo', '68316', NULL, NULL),
('419', '5', 'DI Yogyakarta', 'Kabupaten', 'Sleman', '55513', NULL, NULL),
('42', '11', 'Jawa Timur', 'Kabupaten', 'Banyuwangi', '68416', NULL, NULL),
('420', '32', 'Sumatera Barat', 'Kabupaten', 'Solok', '27365', NULL, NULL),
('421', '32', 'Sumatera Barat', 'Kota', 'Solok', '27315', NULL, NULL),
('422', '32', 'Sumatera Barat', 'Kabupaten', 'Solok Selatan', '27779', NULL, NULL),
('423', '28', 'Sulawesi Selatan', 'Kabupaten', 'Soppeng', '90812', NULL, NULL),
('424', '25', 'Papua Barat', 'Kabupaten', 'Sorong', '98431', NULL, NULL),
('425', '25', 'Papua Barat', 'Kota', 'Sorong', '98411', NULL, NULL),
('426', '25', 'Papua Barat', 'Kabupaten', 'Sorong Selatan', '98454', NULL, NULL),
('427', '10', 'Jawa Tengah', 'Kabupaten', 'Sragen', '57211', NULL, NULL),
('428', '9', 'Jawa Barat', 'Kabupaten', 'Subang', '41215', NULL, NULL),
('429', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kota', 'Subulussalam', '24882', NULL, NULL),
('43', '13', 'Kalimantan Selatan', 'Kabupaten', 'Barito Kuala', '70511', NULL, NULL),
('430', '9', 'Jawa Barat', 'Kabupaten', 'Sukabumi', '43311', NULL, NULL),
('431', '9', 'Jawa Barat', 'Kota', 'Sukabumi', '43114', NULL, NULL),
('432', '14', 'Kalimantan Tengah', 'Kabupaten', 'Sukamara', '74712', NULL, NULL),
('433', '10', 'Jawa Tengah', 'Kabupaten', 'Sukoharjo', '57514', NULL, NULL),
('434', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Barat', '87219', NULL, NULL),
('435', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Barat Daya', '87453', NULL, NULL),
('436', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Tengah', '87358', NULL, NULL),
('437', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Sumba Timur', '87112', NULL, NULL),
('438', '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Sumbawa', '84315', NULL, NULL),
('439', '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Sumbawa Barat', '84419', NULL, NULL),
('44', '14', 'Kalimantan Tengah', 'Kabupaten', 'Barito Selatan', '73711', NULL, NULL),
('440', '9', 'Jawa Barat', 'Kabupaten', 'Sumedang', '45326', NULL, NULL),
('441', '11', 'Jawa Timur', 'Kabupaten', 'Sumenep', '69413', NULL, NULL),
('442', '8', 'Jambi', 'Kota', 'Sungaipenuh', '37113', NULL, NULL),
('443', '24', 'Papua', 'Kabupaten', 'Supiori', '98164', NULL, NULL),
('444', '11', 'Jawa Timur', 'Kota', 'Surabaya', '60119', NULL, NULL),
('445', '10', 'Jawa Tengah', 'Kota', 'Surakarta (Solo)', '57113', NULL, NULL),
('446', '13', 'Kalimantan Selatan', 'Kabupaten', 'Tabalong', '71513', NULL, NULL),
('447', '1', 'Bali', 'Kabupaten', 'Tabanan', '82119', NULL, NULL),
('448', '28', 'Sulawesi Selatan', 'Kabupaten', 'Takalar', '92212', NULL, NULL),
('449', '25', 'Papua Barat', 'Kabupaten', 'Tambrauw', '98475', NULL, NULL),
('45', '14', 'Kalimantan Tengah', 'Kabupaten', 'Barito Timur', '73671', NULL, NULL),
('450', '16', 'Kalimantan Utara', 'Kabupaten', 'Tana Tidung', '77611', NULL, NULL),
('451', '28', 'Sulawesi Selatan', 'Kabupaten', 'Tana Toraja', '91819', NULL, NULL),
('452', '13', 'Kalimantan Selatan', 'Kabupaten', 'Tanah Bumbu', '72211', NULL, NULL),
('453', '32', 'Sumatera Barat', 'Kabupaten', 'Tanah Datar', '27211', NULL, NULL),
('454', '13', 'Kalimantan Selatan', 'Kabupaten', 'Tanah Laut', '70811', NULL, NULL),
('455', '3', 'Banten', 'Kabupaten', 'Tangerang', '15914', NULL, NULL),
('456', '3', 'Banten', 'Kota', 'Tangerang', '15111', NULL, NULL),
('457', '3', 'Banten', 'Kota', 'Tangerang Selatan', '15435', NULL, NULL),
('458', '18', 'Lampung', 'Kabupaten', 'Tanggamus', '35619', NULL, NULL),
('459', '34', 'Sumatera Utara', 'Kota', 'Tanjung Balai', '21321', NULL, NULL),
('46', '14', 'Kalimantan Tengah', 'Kabupaten', 'Barito Utara', '73881', NULL, NULL),
('460', '8', 'Jambi', 'Kabupaten', 'Tanjung Jabung Barat', '36513', NULL, NULL),
('461', '8', 'Jambi', 'Kabupaten', 'Tanjung Jabung Timur', '36719', NULL, NULL),
('462', '17', 'Kepulauan Riau', 'Kota', 'Tanjung Pinang', '29111', NULL, NULL),
('463', '34', 'Sumatera Utara', 'Kabupaten', 'Tapanuli Selatan', '22742', NULL, NULL),
('464', '34', 'Sumatera Utara', 'Kabupaten', 'Tapanuli Tengah', '22611', NULL, NULL),
('465', '34', 'Sumatera Utara', 'Kabupaten', 'Tapanuli Utara', '22414', NULL, NULL),
('466', '13', 'Kalimantan Selatan', 'Kabupaten', 'Tapin', '71119', NULL, NULL),
('467', '16', 'Kalimantan Utara', 'Kota', 'Tarakan', '77114', NULL, NULL),
('468', '9', 'Jawa Barat', 'Kabupaten', 'Tasikmalaya', '46411', NULL, NULL),
('469', '9', 'Jawa Barat', 'Kota', 'Tasikmalaya', '46116', NULL, NULL),
('47', '28', 'Sulawesi Selatan', 'Kabupaten', 'Barru', '90719', NULL, NULL),
('470', '34', 'Sumatera Utara', 'Kota', 'Tebing Tinggi', '20632', NULL, NULL),
('471', '8', 'Jambi', 'Kabupaten', 'Tebo', '37519', NULL, NULL),
('472', '10', 'Jawa Tengah', 'Kabupaten', 'Tegal', '52419', NULL, NULL),
('473', '10', 'Jawa Tengah', 'Kota', 'Tegal', '52114', NULL, NULL),
('474', '25', 'Papua Barat', 'Kabupaten', 'Teluk Bintuni', '98551', NULL, NULL),
('475', '25', 'Papua Barat', 'Kabupaten', 'Teluk Wondama', '98591', NULL, NULL),
('476', '10', 'Jawa Tengah', 'Kabupaten', 'Temanggung', '56212', NULL, NULL),
('477', '20', 'Maluku Utara', 'Kota', 'Ternate', '97714', NULL, NULL),
('478', '20', 'Maluku Utara', 'Kota', 'Tidore Kepulauan', '97815', NULL, NULL),
('479', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Timor Tengah Selatan', '85562', NULL, NULL),
('48', '17', 'Kepulauan Riau', 'Kota', 'Batam', '29413', NULL, NULL),
('480', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Timor Tengah Utara', '85612', NULL, NULL),
('481', '34', 'Sumatera Utara', 'Kabupaten', 'Toba Samosir', '22316', NULL, NULL),
('482', '29', 'Sulawesi Tengah', 'Kabupaten', 'Tojo Una-Una', '94683', NULL, NULL),
('483', '29', 'Sulawesi Tengah', 'Kabupaten', 'Toli-Toli', '94542', NULL, NULL),
('484', '24', 'Papua', 'Kabupaten', 'Tolikara', '99411', NULL, NULL),
('485', '31', 'Sulawesi Utara', 'Kota', 'Tomohon', '95416', NULL, NULL),
('486', '28', 'Sulawesi Selatan', 'Kabupaten', 'Toraja Utara', '91831', NULL, NULL),
('487', '11', 'Jawa Timur', 'Kabupaten', 'Trenggalek', '66312', NULL, NULL),
('488', '19', 'Maluku', 'Kota', 'Tual', '97612', NULL, NULL),
('489', '11', 'Jawa Timur', 'Kabupaten', 'Tuban', '62319', NULL, NULL),
('49', '10', 'Jawa Tengah', 'Kabupaten', 'Batang', '51211', NULL, NULL),
('490', '18', 'Lampung', 'Kabupaten', 'Tulang Bawang', '34613', NULL, NULL),
('491', '18', 'Lampung', 'Kabupaten', 'Tulang Bawang Barat', '34419', NULL, NULL),
('492', '11', 'Jawa Timur', 'Kabupaten', 'Tulungagung', '66212', NULL, NULL),
('493', '28', 'Sulawesi Selatan', 'Kabupaten', 'Wajo', '90911', NULL, NULL),
('494', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Wakatobi', '93791', NULL, NULL),
('495', '24', 'Papua', 'Kabupaten', 'Waropen', '98269', NULL, NULL),
('496', '18', 'Lampung', 'Kabupaten', 'Way Kanan', '34711', NULL, NULL),
('497', '10', 'Jawa Tengah', 'Kabupaten', 'Wonogiri', '57619', NULL, NULL),
('498', '10', 'Jawa Tengah', 'Kabupaten', 'Wonosobo', '56311', NULL, NULL),
('499', '24', 'Papua', 'Kabupaten', 'Yahukimo', '99041', NULL, NULL),
('5', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Selatan', '23719', NULL, NULL),
('50', '8', 'Jambi', 'Kabupaten', 'Batang Hari', '36613', NULL, NULL),
('500', '24', 'Papua', 'Kabupaten', 'Yalimo', '99481', NULL, NULL),
('501', '5', 'DI Yogyakarta', 'Kota', 'Yogyakarta', '55111', NULL, NULL),
('51', '11', 'Jawa Timur', 'Kota', 'Batu', '65311', NULL, NULL),
('52', '34', 'Sumatera Utara', 'Kabupaten', 'Batu Bara', '21655', NULL, NULL),
('53', '30', 'Sulawesi Tenggara', 'Kota', 'Bau-Bau', '93719', NULL, NULL),
('54', '9', 'Jawa Barat', 'Kabupaten', 'Bekasi', '17837', NULL, NULL),
('55', '9', 'Jawa Barat', 'Kota', 'Bekasi', '17121', NULL, NULL),
('56', '2', 'Bangka Belitung', 'Kabupaten', 'Belitung', '33419', NULL, NULL),
('57', '2', 'Bangka Belitung', 'Kabupaten', 'Belitung Timur', '33519', NULL, NULL),
('58', '23', 'Nusa Tenggara Timur (NTT)', 'Kabupaten', 'Belu', '85711', NULL, NULL),
('59', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Bener Meriah', '24581', NULL, NULL),
('6', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Singkil', '24785', NULL, NULL),
('60', '26', 'Riau', 'Kabupaten', 'Bengkalis', '28719', NULL, NULL),
('61', '12', 'Kalimantan Barat', 'Kabupaten', 'Bengkayang', '79213', NULL, NULL),
('62', '4', 'Bengkulu', 'Kota', 'Bengkulu', '38229', NULL, NULL),
('63', '4', 'Bengkulu', 'Kabupaten', 'Bengkulu Selatan', '38519', NULL, NULL),
('64', '4', 'Bengkulu', 'Kabupaten', 'Bengkulu Tengah', '38319', NULL, NULL),
('65', '4', 'Bengkulu', 'Kabupaten', 'Bengkulu Utara', '38619', NULL, NULL),
('66', '15', 'Kalimantan Timur', 'Kabupaten', 'Berau', '77311', NULL, NULL),
('67', '24', 'Papua', 'Kabupaten', 'Biak Numfor', '98119', NULL, NULL),
('68', '22', 'Nusa Tenggara Barat (NTB)', 'Kabupaten', 'Bima', '84171', NULL, NULL),
('69', '22', 'Nusa Tenggara Barat (NTB)', 'Kota', 'Bima', '84139', NULL, NULL),
('7', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tamiang', '24476', NULL, NULL),
('70', '34', 'Sumatera Utara', 'Kota', 'Binjai', '20712', NULL, NULL),
('71', '17', 'Kepulauan Riau', 'Kabupaten', 'Bintan', '29135', NULL, NULL),
('72', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Bireuen', '24219', NULL, NULL),
('73', '31', 'Sulawesi Utara', 'Kota', 'Bitung', '95512', NULL, NULL),
('74', '11', 'Jawa Timur', 'Kabupaten', 'Blitar', '66171', NULL, NULL),
('75', '11', 'Jawa Timur', 'Kota', 'Blitar', '66124', NULL, NULL),
('76', '10', 'Jawa Tengah', 'Kabupaten', 'Blora', '58219', NULL, NULL),
('77', '7', 'Gorontalo', 'Kabupaten', 'Boalemo', '96319', NULL, NULL),
('78', '9', 'Jawa Barat', 'Kabupaten', 'Bogor', '16911', NULL, NULL),
('79', '9', 'Jawa Barat', 'Kota', 'Bogor', '16119', NULL, NULL),
('8', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tengah', '24511', NULL, NULL),
('80', '11', 'Jawa Timur', 'Kabupaten', 'Bojonegoro', '62119', NULL, NULL),
('81', '31', 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow (Bolmong)', '95755', NULL, NULL),
('82', '31', 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Selatan', '95774', NULL, NULL),
('83', '31', 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Timur', '95783', NULL, NULL),
('84', '31', 'Sulawesi Utara', 'Kabupaten', 'Bolaang Mongondow Utara', '95765', NULL, NULL),
('85', '30', 'Sulawesi Tenggara', 'Kabupaten', 'Bombana', '93771', NULL, NULL),
('86', '11', 'Jawa Timur', 'Kabupaten', 'Bondowoso', '68219', NULL, NULL),
('87', '28', 'Sulawesi Selatan', 'Kabupaten', 'Bone', '92713', NULL, NULL),
('88', '7', 'Gorontalo', 'Kabupaten', 'Bone Bolango', '96511', NULL, NULL),
('89', '15', 'Kalimantan Timur', 'Kota', 'Bontang', '75313', NULL, NULL),
('9', '21', 'Nanggroe Aceh Darussalam (NAD)', 'Kabupaten', 'Aceh Tenggara', '24611', NULL, NULL),
('90', '24', 'Papua', 'Kabupaten', 'Boven Digoel', '99662', NULL, NULL),
('91', '10', 'Jawa Tengah', 'Kabupaten', 'Boyolali', '57312', NULL, NULL),
('92', '10', 'Jawa Tengah', 'Kabupaten', 'Brebes', '52212', NULL, NULL),
('93', '32', 'Sumatera Barat', 'Kota', 'Bukittinggi', '26115', NULL, NULL),
('94', '1', 'Bali', 'Kabupaten', 'Buleleng', '81111', NULL, NULL),
('95', '28', 'Sulawesi Selatan', 'Kabupaten', 'Bulukumba', '92511', NULL, NULL),
('96', '16', 'Kalimantan Utara', 'Kabupaten', 'Bulungan (Bulongan)', '77211', NULL, NULL),
('97', '8', 'Jambi', 'Kabupaten', 'Bungo', '37216', NULL, NULL),
('98', '29', 'Sulawesi Tengah', 'Kabupaten', 'Buol', '94564', NULL, NULL),
('99', '19', 'Maluku', 'Kabupaten', 'Buru', '97371', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ro_province`
--

CREATE TABLE `ro_province` (
  `province_id` varchar(20) NOT NULL,
  `province` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ro_province`
--

INSERT INTO `ro_province` (`province_id`, `province`, `created_at`, `updated_at`) VALUES
('1', 'Bali', NULL, NULL),
('10', 'Jawa Tengah', NULL, NULL),
('11', 'Jawa Timur', NULL, NULL),
('12', 'Kalimantan Barat', NULL, NULL),
('13', 'Kalimantan Selatan', NULL, NULL),
('14', 'Kalimantan Tengah', NULL, NULL),
('15', 'Kalimantan Timur', NULL, NULL),
('16', 'Kalimantan Utara', NULL, NULL),
('17', 'Kepulauan Riau', NULL, NULL),
('18', 'Lampung', NULL, NULL),
('19', 'Maluku', NULL, NULL),
('2', 'Bangka Belitung', NULL, NULL),
('20', 'Maluku Utara', NULL, NULL),
('21', 'Nanggroe Aceh Darussalam (NAD)', NULL, NULL),
('22', 'Nusa Tenggara Barat (NTB)', NULL, NULL),
('23', 'Nusa Tenggara Timur (NTT)', NULL, NULL),
('24', 'Papua', NULL, NULL),
('25', 'Papua Barat', NULL, NULL),
('26', 'Riau', NULL, NULL),
('27', 'Sulawesi Barat', NULL, NULL),
('28', 'Sulawesi Selatan', NULL, NULL),
('29', 'Sulawesi Tengah', NULL, NULL),
('3', 'Banten', NULL, NULL),
('30', 'Sulawesi Tenggara', NULL, NULL),
('31', 'Sulawesi Utara', NULL, NULL),
('32', 'Sumatera Barat', NULL, NULL),
('33', 'Sumatera Selatan', NULL, NULL),
('34', 'Sumatera Utara', NULL, NULL),
('4', 'Bengkulu', NULL, NULL),
('5', 'DI Yogyakarta', NULL, NULL),
('6', 'DKI Jakarta', NULL, NULL),
('7', 'Gorontalo', NULL, NULL),
('8', 'Jambi', NULL, NULL),
('9', 'Jawa Barat', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ro_subdistrict`
--

CREATE TABLE `ro_subdistrict` (
  `subdistrict_id` varchar(20) NOT NULL,
  `province_id` varchar(20) NOT NULL,
  `province` varchar(120) DEFAULT NULL,
  `city_id` varchar(20) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `type` varchar(60) DEFAULT NULL,
  `subdistrict_name` varchar(160) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`) VALUES
(1, 'XL'),
(2, 'L'),
(3, 'M'),
(4, 'S'),
(5, 'XXL'),
(6, 'XS');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `snap_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qty` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_variant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `available_size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `total_price`, `status`, `snap_token`, `created_at`, `updated_at`, `qty`, `product_id`, `product_variant_id`, `available_size_id`, `delivery_id`) VALUES
(32, 1, 750000.00, 'success', '02ec81cf-0b50-474d-b848-81665e6235e7', '2024-01-03 04:01:39', '2024-01-03 04:02:23', 3, NULL, 1, 9, NULL),
(33, 2, 290000.00, 'success', '7d4aca39-f84f-4e74-9b0a-df14dea3c08a', '2024-01-03 18:23:03', '2024-01-03 18:26:13', 1, NULL, 2, 12, NULL),
(34, 2, 290000.00, 'success', 'e44f4029-2bdf-4a60-91dc-44a351f06996', '2024-01-03 18:26:51', '2024-01-03 18:28:00', 1, NULL, 2, 12, NULL),
(35, 2, 290000.00, 'pending', NULL, '2024-01-03 20:49:29', '2024-01-03 20:49:29', 1, NULL, 2, 12, NULL),
(36, 1, 1275000.00, 'success', '515bbe5f-eb2d-410a-9daa-aac74e39c9a0', '2024-01-07 06:48:04', '2024-01-07 06:50:40', 5, NULL, 1, 8, NULL),
(37, 1, 255000.00, 'success', 'b9653e14-c589-4c77-9a84-f9c0b09f1bca', '2024-01-07 06:57:18', '2024-01-07 06:58:00', 1, NULL, 1, 8, NULL),
(38, 1, 300000.00, 'success', 'acad17bb-a6b4-4fdb-baa0-79be7bddee85', '2024-01-07 07:00:31', '2024-01-07 07:06:35', 1, 25, 2, 11, NULL),
(39, 1, 580000.00, 'pending', '2fc7c355-0288-424e-af9e-f0c90498b2a5', '2024-01-07 19:24:11', '2024-01-07 19:24:13', 2, 25, 2, 12, NULL),
(40, 1, 580000.00, 'pending', '6b781a13-831c-4c52-95dd-133951cb8090', '2024-01-07 19:25:29', '2024-01-07 19:25:29', 2, 25, 2, 12, NULL),
(41, 1, 730000.00, 'success', '51e037d5-677f-4a1a-966a-2178c5b7a686', '2024-01-08 22:14:00', '2024-01-08 22:15:39', 2, 26, 5, 18, NULL),
(42, 1, 755000.00, 'pending', '018e35ff-b71c-485c-908d-3490caa5bb90', '2024-01-09 05:17:09', '2024-01-09 05:17:11', 2, 26, 5, 18, NULL),
(43, 1, 755000.00, 'pending', '14d25988-47d3-41bf-9839-d83890f4a8dd', '2024-01-09 05:18:08', '2024-01-09 05:18:08', 2, 26, 5, 18, NULL),
(44, 1, 755000.00, 'pending', '1a54c0b0-0dbb-454b-869e-25caf91c3b98', '2024-01-09 05:18:17', '2024-01-09 05:18:17', 2, 26, 5, 18, NULL),
(45, 1, 813000.00, 'pending', 'd63fdcb3-a929-44e5-8698-62ea36cf3778', '2024-01-09 05:19:25', '2024-01-09 05:19:25', 2, 26, 5, 18, NULL),
(46, 1, 813000.00, 'pending', '3c753393-6919-4863-b39a-99b70d2c0342', '2024-01-09 05:20:10', '2024-01-09 05:20:10', 2, 26, 5, 18, NULL),
(47, 1, 813000.00, 'pending', '28aad961-61ae-485f-bddc-3c21ca584b7a', '2024-01-09 05:20:16', '2024-01-09 05:20:16', 2, 26, 5, 18, NULL),
(48, 1, 813000.00, 'pending', '9d21312b-c472-4eca-b867-0e2d2db0be1f', '2024-01-09 05:21:19', '2024-01-09 05:21:20', 2, 26, 5, 18, NULL),
(49, 1, 800000.00, 'pending', '7e9a02a2-db86-4440-946b-c3343850403f', '2024-01-09 05:25:58', '2024-01-09 05:25:59', 2, 26, 5, 18, NULL),
(50, 1, 748000.00, 'pending', 'b009cddd-8be0-4f3c-b1e0-0400709e08be', '2024-01-09 05:32:01', '2024-01-09 05:32:01', 2, 26, 5, 18, NULL),
(51, 1, 730000.00, 'pending', '0b302f31-35ff-462a-a937-af76efe437e5', '2024-01-09 05:36:02', '2024-01-09 05:36:02', 2, 26, 5, 18, NULL),
(52, 1, 730000.00, 'pending', 'a68e25bc-39bb-4a97-aa39-e635b2281b7a', '2024-01-09 05:39:21', '2024-01-09 05:39:21', 2, 26, 5, 18, NULL),
(53, 1, 730000.00, 'success', '3e568d2c-0dee-4e10-883d-dd5e44db1301', '2024-01-09 05:44:43', '2024-01-09 06:25:44', 2, 26, 5, 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nama Depan Nama Belakang', 'namadepannamabelakang1781945@gmail.com', NULL, '$2y$12$0nOArwkMaWMAZkA2Jdo17.pjpp79kc8J6CbwdEsCtuwdQpxgj7vHK', NULL, '2023-12-30 03:48:10', '2023-12-30 03:48:10'),
(2, 'Reva Ananda', 'aarevaananda@gmail.com', NULL, '$2y$12$LbbaTYBCnLOBd0o.BL8l.OCYCre7c9XHLX.97S6A/ytgAxVjJXczu', NULL, '2023-12-30 21:31:38', '2023-12-30 21:31:38'),
(3, 'admin', 'admin@gmail.com', NULL, 'admin123', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_sizes`
--
ALTER TABLE `available_sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `available_size` (`size_id`),
  ADD KEY `available_color_size` (`product_variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveries_order_id_foreign` (`cost`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_files`
--
ALTER TABLE `product_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_files_product_id_foreign` (`product_variant_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_ibfk_1` (`product_id`),
  ADD KEY `product_variants_ibfk_2` (`color_id`);

--
-- Indexes for table `ro_city`
--
ALTER TABLE `ro_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `ro_province`
--
ALTER TABLE `ro_province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `ro_subdistrict`
--
ALTER TABLE `ro_subdistrict`
  ADD PRIMARY KEY (`subdistrict_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_product_id_foreign` (`product_id`),
  ADD KEY `transactions_variant_id_foreign` (`product_variant_id`),
  ADD KEY `transactions_availablesize_id_foreign` (`available_size_id`),
  ADD KEY `transactions_delivery_id_foreign` (`delivery_id`);

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
-- AUTO_INCREMENT for table `available_sizes`
--
ALTER TABLE `available_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product_files`
--
ALTER TABLE `product_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available_sizes`
--
ALTER TABLE `available_sizes`
  ADD CONSTRAINT `available_color_size` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `available_size` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_files`
--
ALTER TABLE `product_files`
  ADD CONSTRAINT `product_files_product_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_variants_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_availablesize_id_foreign` FOREIGN KEY (`available_size_id`) REFERENCES `available_sizes` (`id`),
  ADD CONSTRAINT `transactions_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transactions_variant_id_foreign` FOREIGN KEY (`product_variant_id`) REFERENCES `product_variants` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
