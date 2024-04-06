-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2024 at 06:42 PM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(11, 'Uncategorized', 'This is the description for Uncategorized category'),
(17, 'Drink', 'From fizzy sodas to exotic fruit blends, beverages cater to diverse preferences, providing hydration, nourishment, and moments of indulgence. With their ability to refresh, revitalize, and comfort, drinks seamlessly integrate into our daily rituals, offering a delightful respite in every glass.'),
(20, 'Fast Food', 'This is Fast Food category');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `like` int(11) NOT NULL,
  `ListUsersLike` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `message`, `timestamp`, `like`, `ListUsersLike`) VALUES
(122, 19, 35, 'It look good\r\n', '2024-04-04 14:19:28', 1, ' 19'),
(123, 19, 36, 'khong yeu ai', '2024-04-04 14:22:05', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `descript` text NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `LikesPost` int(11) NOT NULL,
  `ListUsersLikePost` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `descript`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`, `LikesPost`, `ListUsersLikePost`) VALUES
(35, 'B&aacute;nh pizza sandwich x&uacute;c x&iacute;ch', 'B&aacute;nh pizza sandwich x&uacute;c x&iacute;ch l&agrave; sự kết hợp độc đ&aacute;o giữa hai m&oacute;n ăn phổ biến v&agrave; ngon miệng: pizza v&agrave; sandwich. B&aacute;nh được l&agrave;m từ lớp bột mềm mịn, phủ đầy x&uacute;c x&iacute;ch thơm ngon, ph&ocirc; mai b&eacute;o ngậy v&agrave; sốt c&agrave; chua đậm đ&agrave;. Với hương vị hấp dẫn v&agrave; cấu tr&uacute;c đa dạng, m&oacute;n n&agrave;y thường l&agrave; sự lựa chọn tuyệt vời cho bữa ăn nhanh hoặc buổi tiệc.', '1.B&aacute;nh pizza sandwich x&uacute;c x&iacute;ch\r\nB&aacute;nh pizza sandwich x&uacute;c x&iacute;ch l&agrave; sự kết hợp độc đ&aacute;o giữa hai m&oacute;n ăn phổ biến v&agrave; ngon miệng: pizza v&agrave; sandwich. B&aacute;nh được l&agrave;m từ lớp bột mềm mịn, phủ đầy x&uacute;c x&iacute;ch thơm ngon, ph&ocirc; mai b&eacute;o ngậy v&agrave; sốt c&agrave; chua đậm đ&agrave;. Với hương vị hấp dẫn v&agrave; cấu tr&uacute;c đa dạng, m&oacute;n n&agrave;y thường l&agrave; sự lựa chọn tuyệt vời cho bữa ăn nhanh hoặc buổi tiệc.\r\n\r\nBước 1:\r\noSơ chế nguy&ecirc;n liệu\r\noC&agrave; rốt b&agrave;o vỏ, rửa sạch, sau đ&oacute; cắt hạt lựu.\r\noH&agrave;nh t&acirc;y lột vỏ, rửa sạch, cắt hạt lựu.\r\noỚt chu&ocirc;ng rửa sạch, cắt miếng d&agrave;i vừa ăn.\r\noBắp mỹ lột vỏ, rửa sạch, sau đ&oacute; t&aacute;ch lấy hạt.\r\noX&uacute;c x&iacute;ch cắt khoanh nhỏ.\r\n\r\nBước 2:\r\noXếp nguy&ecirc;n liệu l&ecirc;n b&aacute;nh\r\noL&oacute;t giấy nến v&agrave; xếp b&aacute;nh sandwich v&agrave;o khu&ocirc;n.\r\noSau đ&oacute;, rưới sốt c&agrave; chua l&ecirc;n mặt, cho th&ecirc;m phần rau củ, x&uacute;c x&iacute;ch rồi phủ ph&ocirc; mai.\r\n\r\nBước 3:\r\noNướng b&aacute;nh\r\noCho b&aacute;nh v&agrave;o l&ograve; nướng ở nhiệt độ 200 độ C trong 15 ph&uacute;t.\r\noLưu &yacute;: V&igrave; b&aacute;nh m&igrave; nhanh gi&ograve;n nhưng rau củ lại l&acirc;u ch&iacute;n n&ecirc;n bạn kh&ocirc;ng cần phải l&agrave;m n&oacute;ng l&ograve; trước.\r\nTh&agrave;nh phẩm:\r\noB&aacute;nh pizza sandwich c&oacute; lớp vỏ gi&ograve;n, phần b&aacute;nh b&ecirc;n trong th&igrave; mềm mềm c&ugrave;ng ph&ocirc; mai b&eacute;o ngậy, rau củ b&ugrave;i vị, cực kỳ thơm ngon v&agrave; bổ dưỡng.', '1712239684Picture1.png', '2024-04-04 13:24:58', 20, 20, 0, 1, ' 19'),
(36, 'Sữa chua nha đam', 'Sữa chua nha đam l&agrave; một sản phẩm dinh dưỡng với hương vị tươi m&aacute;t v&agrave; ngọt dịu. Sự kết hợp ho&agrave;n hảo giữa sự b&eacute;o ngậy của sữa chua v&agrave; hương thơm tự nhi&ecirc;n của nha đam tạo n&ecirc;n một trải nghiệm th&uacute; vị cho vị gi&aacute;c. Sản phẩm gi&agrave;u canxi, protein v&agrave; c&aacute;c dưỡng chất cần thiết cho sức khỏe.', 'Nguy&ecirc;n liệu l&agrave;m Sữa chua nha đam \r\n&bull;	Sữa chua &iacute;t đường 100 gr (2 hũ)\r\n&bull;	Nha đam 1.5 kg \r\n&bull;	Sữa tươi kh&ocirc;ng đường 1 l&iacute;t\r\n&bull;	Sữa đặc 760 ml (2 lon)\r\n&bull;	Nước 1 l&iacute;t\r\n&bull;	Đường ph&egrave;n 120 gr\r\n&bull;	Muối 1 muỗng c&agrave; ph&ecirc;\r\n\r\nDụng cụ thực hiện\r\nNồi cơm điện, nồi thuỷ tinh, bếp ga, v&aacute;, hũ sữa chua,...\r\n\r\nC&aacute;ch chế biến Sữa chua nha đam \r\nBước 1:Sơ chế nha đam\r\n&bull;	Trước hết, với 1.5kg nha đam mua về bạn d&ugrave;ng dao gọt vỏ, rồi cắt nha đam th&agrave;nh hạt lựu.\r\n\r\n&bull;	Đồng thời, bạn đem nha đam ng&acirc;m v&agrave;o thau nước c&ugrave;ng 1 muỗng c&agrave; ph&ecirc; muối khoảng 3 ph&uacute;t, rồi rửa lại nhiều lần với nước đến khi sạch nhớt, để r&aacute;o.\r\nBước  2:Nấu nha đam\r\n&bull;	Bạn bắc nồi l&ecirc;n bếp c&ugrave;ng 1 l&iacute;t nước v&agrave; 120gr đường ph&egrave;n, tiến h&agrave;nh nấu với lửa vừa khoảng 7 - 10 ph&uacute;t.\r\n&bull;	Nước s&ocirc;i, đồng thời đường cũng tan th&igrave; bạn cho to&agrave;n bộ phần nha đam vừa sơ chế v&agrave;o, nấu trong v&ograve;ng 5 - 7 ph&uacute;t. Khi nước s&ocirc;i trở lại th&igrave; bạn tắt bếp.\r\n\r\nBước 3:Pha hỗn hợp sữa\r\n&bull;	Bạn lấy nồi cơm điện rồi cho 2 hũ sữa chua &iacute;t đường v&agrave; 2 lon sữa đặc v&agrave;o, d&ugrave;ng v&aacute; đảo đều nhẹ nh&agrave;ng theo 1 chiều nhất định.\r\n&bull;	Thấy hỗn hợp đ&atilde; được h&ograve;a quyện th&igrave; bạn th&ecirc;m nốt 1 l&iacute;t sữa tươi kh&ocirc;ng đường v&agrave;o, tiếp tục khuấy đều khoảng 1 ph&uacute;t.\r\n\r\nBước 4: Pha hỗn hợp sữa chua nha đam\r\n&bull;	Khi hỗn hợp sữa đ&atilde; được h&ograve;a tan với nhau, th&igrave; bạn cho từ từ nồi nha đam vừa nấu v&agrave;o, đồng thời đảo đều li&ecirc;n tục.\r\n&bull;	M&aacute;ch nhỏ: T&ugrave;y theo sở th&iacute;ch, bạn c&oacute; thể chiết phần hỗn hợp sữa chua vừa pha v&agrave;o hũ sữa chua v&agrave; tiến h&agrave;nh ủ bằng nồi cơm điện cũng được nh&eacute;!\r\nBước 5:Ủ sữa chua\r\n&bull;	Sau đ&oacute;, bạn đặt nồi hỗn hợp sữa chua nha đam v&agrave;o nồi cơm điện, đậy nắp lại v&agrave; đậy k&iacute;n th&ecirc;m bằng 1 c&aacute;i mền, tiến h&agrave;nh ủ khoảng 12 - 24 tiếng.\r\n&bull;	Đến khi sữa chua đ&atilde; s&aacute;nh mịn th&igrave; bạn lấy ra, đặt ở ngăn m&aacute;t tủ lạnh khoảng 1 - 2 tiếng rồi thưởng thức.\r\n\r\nBước 6: Th&agrave;nh phẩm\r\n&bull;	Sữa chua nha đam bằng nồi cơm điện vừa dễ thực hiện m&agrave; lại c&oacute; th&agrave;nh phẩm kh&ocirc;ng khiến mọi người phải uổng ph&iacute; sự chờ mong.\r\n&bull;	Sữa chua với hương thơm dịu nhẹ c&ugrave;ng m&agrave;u trắng mịn m&agrave;ng thật đ&ecirc; m&ecirc;, đ&atilde; thế khi ăn bạn sẽ cảm nhận được sữa chua c&oacute; vị chua chua, ngọt ngọt rất k&iacute;ch th&iacute;ch, th&ecirc;m ch&uacute;t mềm mềm, mọng nước từ nha đam nữa đ&oacute; nha!', '1712239956z5314487409727_9ab252d772a3b806ef9b9e573e28464f.jpg', '2024-04-04 14:12:36', 11, 20, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `avatar`, `is_admin`) VALUES
(19, 'Duy', 'Kh&aacute;nh', 'duykhanh', 'khanhmh2004@gmail.com', '$2y$10$l8XXVVnbHJ7rPjs2hDdimeMfQn1DT60c9PGv2zXJvHP.DpxA41kDm', '1711766947sign.jpg', 1),
(20, 'khoa', 'anh', 'khoa', 'khoa@gmail.com', '$2y$10$T6xncXBVATsWXetPD/GHTeI9C3eTLU5vWSvAMx3/cRxr2s691bd/e', '1711940050IMG_20210516_215503.jpg', 0),
(23, ' Khanh', 'Dinh', 'Khanh', 'khanh@gmail.com', '$2y$10$ThLUDDhBZ6Gf7N8PC1buB.HDVkzpiqTG5ROpEddqEyhDh6dkJnpW2', '1712420818z5037261683516_7dc216f2abb6098843401b679137777d.jpg', 1),
(24, 'Ky', 'cao', 'ky', 'ky@gmail.comm', '$2y$10$ySPA.dh9Cc5vY4.u88N7TeCVpt51cXoAH5BnePEhxVqj9NnRuzwOC', '1712421121z5037261683516_7dc216f2abb6098843401b679137777d.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comment_post` (`post_id`),
  ADD KEY `FK_comment_user` (`user_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_category` (`category_id`),
  ADD KEY `FK_blog_author` (`author_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blog_author` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blog_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
