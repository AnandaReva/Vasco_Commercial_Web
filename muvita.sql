-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 08:43 AM
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
  `stock` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available_sizes`
--

INSERT INTO `available_sizes` (`id`, `product_variant_id`, `size_id`, `price`, `stock`) VALUES
(7, 1, 1, 257000.00, 318),
(8, 1, 2, 255000.00, 337),
(9, 1, 3, 250000.00, 42),
(10, 1, 4, 250000.00, 205),
(11, 2, 2, 300000.00, 214),
(12, 2, 3, 290000.00, 108),
(13, 4, 1, 375000.00, 226),
(14, 4, 2, 360000.00, 122),
(15, 4, 3, 360000.00, 258),
(16, 4, 4, 350000.00, 239),
(17, 5, 1, 375000.00, 76),
(18, 5, 2, 360000.00, 328),
(19, 5, 3, 360000.00, 49),
(20, 5, 4, 350000.00, 268);

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
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `customer_name`, `address`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Dalima Halimah', 'Ki. Adisumarmo No. 368, Administrasi Jakarta Utara 96425, NTT', 'vlaksita@example.net', '0817 2881 938', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(2, 'Mulyono Hakim', 'Ds. Sutarjo No. 153, Administrasi Jakarta Barat 10792, Kaltara', 'lsalahudin@example.net', '0895 9344 8406', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(3, 'Purwa Firgantoro', 'Ds. Tambun No. 272, Sawahlunto 48719, NTB', 'rini44@example.com', '(+62) 892 678 106', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(4, 'Olivia Rahmawati S.IP', 'Ds. Hasanuddin No. 150, Palopo 78526, Jatim', 'vicky96@example.org', '(+62) 898 2758 686', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(5, 'Michelle Permata M.Pd', 'Ds. Adisucipto No. 69, Jayapura 63044, Maluku', 'ayu.maheswara@example.org', '0453 6599 716', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(6, 'Warsa Edward Manullang', 'Ki. Pahlawan No. 996, Sawahlunto 96217, Kalteng', 'daniswara46@example.com', '(+62) 760 3918 5805', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(7, 'Daniswara Marbun S.H.', 'Ds. M.T. Haryono No. 908, Medan 42461, Kaltara', 'artanto47@example.org', '(+62) 696 8933 042', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(8, 'Lega Wasita S.Kom', 'Ki. Dewi Sartika No. 194, Banjarbaru 15226, Pabar', 'victoria.wijayanti@example.net', '0710 3980 205', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(9, 'Icha Yuliarti', 'Jln. Sampangan No. 755, Tanjung Pinang 21345, Kaltim', 'budiman.cengkal@example.net', '(+62) 731 5958 986', '2023-12-10 00:57:56', '2023-12-10 00:57:56'),
(10, 'Wira Mahesa Uwais S.I.Kom', 'Ds. Kartini No. 333, Palangka Raya 18001, Sumbar', 'margana99@example.net', '(+62) 204 5613 980', '2023-12-10 00:57:56', '2023-12-10 00:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `deliveries`
--

CREATE TABLE `deliveries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_method` bigint(20) UNSIGNED NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(15, '2023_12_30_053952_create_transactions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `due` date DEFAULT NULL,
  `status` enum('pending','processing','completed','cancelled') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `total_amount` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` bigint(20) UNSIGNED NOT NULL,
  `payment_total` bigint(20) UNSIGNED NOT NULL,
  `due` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(42, 5, 'Striped Crewneck Sweater', 'Add a touch of classic charm with the Striped Crewneck Sweater. The timeless striped pattern and lightweight knit make it a versatile option for layering. Perfect for a casual day at the office or a weekend brunch.', '2023-08-27 13:36:16', '2023-08-27 13:36:16');

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
(11, 12, 'SmartFit Dress Shirt-6', 'product_resources/Shirts/SmartFit Dress Shirt-6.jpg', '2023-12-20 14:08:20', '2023-12-20 14:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `color_id`) VALUES
(1, 25, 5),
(2, 25, 7),
(4, 26, 8),
(5, 26, 10),
(7, 27, 3),
(8, 27, 9),
(10, 28, 2),
(11, 28, 3),
(12, 29, 6);

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
  `price` decimal(10,2) NOT NULL,
  `status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  `snap_token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_customer_name_unique` (`customer_name`);

--
-- Indexes for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deliveries_order_id_foreign` (`order_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

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
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deliveries`
--
ALTER TABLE `deliveries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_files`
--
ALTER TABLE `product_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Constraints for table `deliveries`
--
ALTER TABLE `deliveries`
  ADD CONSTRAINT `deliveries_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
