-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2025 lúc 03:30 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tblog`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(3, 'Wild Life', 'Thế giới hoang d&atilde;'),
(4, 'Travel', 'Tourist information center\r\n'),
(8, 'Life', 'Life, in a biological sense, refers to the state of being characterized by the ability to carry out functions such as metabolism, growth, response to stimuli, and reproduction. It encompasses the period from birth to death and is fundamentally different from non-living matter due to the capacity for these processes. Philosophically, life can also be viewed as a process of organizing, adapting, and evolving within highly organized structures. '),
(9, 'Technology and AI', 'echnology is a broad term referring to the application of scientific knowledge for practical purposes, encompassing tools, processes, and systems developed to solve problems. Artificial Intelligence (AI) is a specific area of technology focused on creating machines that can perform tasks that typically require human intelligence, such as learning, reasoning, and problem-solving. In essence, AI is a subset of technology that aims to simulate human intelligence in machines. '),
(10, 'Science fiction', 'Khoa học viễn tưởng (science fiction) l&agrave; thể loại văn học, phim ảnh hoặc nghệ thuật m&ocirc; tả những c&acirc;u chuyện tưởng tượng dựa tr&ecirc;n c&aacute;c nguy&ecirc;n l&yacute; khoa học hoặc c&ocirc;ng nghệ, thường nằm ngo&agrave;i hiện thực hiện tại.\r\n\r\n'),
(11, 'Toy', 'An object for children to play with');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(50) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) UNSIGNED DEFAULT NULL,
  `author_id` int(11) UNSIGNED DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `thumbnail`, `date_time`, `category_id`, `author_id`, `is_featured`) VALUES
(10, 'What is Deep learning', 'Deep learning is a subset of machine learning that uses artificial neural networks with multiple layers to analyze data and learn patterns, much like the human brain. It&#039;s particularly effective in handling complex tasks like image recognition, natural language processing, and speech recognition, often requiring large datasets for training. \r\n', '1753922555blog2.jpg', '2025-07-31 00:42:35', 9, 1, 1),
(11, 'What is woman', 'I am a lawyer, and in law there are two sorts of woman: a person who was born a woman and has not transitioned to become a man under the Gender Recognition Act 2004; and a person who was born a man and has transitioned to become a woman under the same Act. But in practice there are people who were born either a woman or a man and experience gender dysphoria but have not yet completed the legal transition to the other gender. The current law requires them to live in the other gender for two years before their transition can be recognised in law. There are other people who are driven to live in the other gender, even if they do not intend to complete a legal transition. For practical purposes, people who live as women in this way are women.\r\n\r\nGenuinely trans people are among the most vulnerable and marginalised of groups in our society and deserve our understanding and support. They are not to be confused with men who like dressing up as women, any more than people who live as men are to be confused with women who like dressing up as men. Nor are they to be confused with men who are not genuinely trans but who pretend to live as women in order to gain access to women&rsquo;s spaces for ulterior reasons. I do not know how common this is and I understand how deeply concerned some women, especially those who have suffered abuse at the hands of men, are about that risk. It is, quite simply, bad behaviour and should not be tolerated. The difficulty lies in knowing which is which.', '1753923068blog4.jpg', '2025-07-31 00:51:08', 8, 1, 0),
(12, 'What is avengers', 'The Avengers are a team of superheroes in the Marvel Universe, primarily featured in the Marvel Cinematic Universe (MCU). They are known as &quot;Earth&#039;s Mightiest Heroes&quot; and are dedicated to protecting the planet from various threats. The team&#039;s roster has evolved over time, but it often includes iconic characters like Iron Man, Captain America, Thor, Hulk, Black Widow, and Hawkeye. \r\nThe Avengers were first assembled by Nick Fury and S.H.I.E.L.D. to combat the threat of Loki and his army in the 2012 film &quot;The Avengers&quot;. The team&#039;s formation marked a significant turning point in the MCU, leading to numerous sequels and further adventures for the individual heroes and the team as a whole. \r\nBeyond the core team, there are also various spin-off Avengers teams, such as A-Force, Avengers Academy, and others, further expanding the scope of the Avengers&#039; presence in the Marvel Universe. ', '1753923195blog10.jpg', '2025-07-31 00:53:15', 10, 1, 0),
(13, ' Robot (Robotics)', 'Robots are machines that can move, think, and work like humans. They are used in factories, hospitals, and even in homes. Some robots help build cars, while others help doctors in surgery. In the future, robots might be our daily assistants.', '1753923332blog2.jpg', '2025-07-31 00:55:32', 9, 1, 0),
(14, 'Gears of Life', 'Life is like a machine full of gears. Each gear represents a part of our lives&mdash;family, friends, dreams, and hard work. When the gears turn smoothly, life moves forward. But when one gear gets stuck, everything slows down. That&rsquo;s why balance is important.', '1753923373blog11.jpg', '2025-07-31 00:56:13', 8, 1, 0),
(15, 'Silicon Valley', 'Silicon Valley is a place in California, USA, known for its technology companies. It is home to famous companies like Apple, Google, and Facebook. Many people with big ideas come here to build new inventions. Silicon Valley is the heart of the tech world.', '1753923398blog8.jpg', '2025-07-31 00:56:38', 4, 1, 0),
(16, 'Rubik&#039;s Cube', 'The Rubik&#039;s Cube is a colorful puzzle with six sides. Each side has nine squares of the same color. The goal is to twist and turn the cube until all the colors match on each side. Solving it takes logic, patience, and practice. It&#039;s fun and challenging!', '1753923515blog9.jpg', '2025-07-31 00:58:35', 11, 1, 0),
(17, 'Easter (Lễ Phục Sinh)', 'Easter is a Christian holiday that celebrates the resurrection of Jesus. It is a time of hope, joy, and new life. Many people decorate eggs, go to church, and spend time with family. In some places, children hunt for chocolate eggs hidden by the Easter Bunny.', '1753923540blog6.jpg', '2025-07-31 00:59:00', 8, 1, 0),
(18, 'Sunset (Ho&agrave;ng h&ocirc;n)', 'A sunset is when the sun goes down and the sky turns orange, pink, and purple. It is a peaceful time of day when everything feels calm. Some people like to sit and watch the sunset to relax. It&#039;s a beautiful ending to the day.', '1753923557blog7.jpg', '2025-07-31 00:59:17', 8, 1, 0),
(19, 'Rainbow', 'A rainbow appears in the sky when sunlight shines through raindrops. It shows seven beautiful colors: red, orange, yellow, green, blue, indigo, and violet. Rainbows often appear after rain and make the sky look magical. Some people believe rainbows bring good luck and hope.', '1753923712blog5.jpg', '2025-07-31 01:01:52', 8, 15, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `avatar`, `is_admin`) VALUES
(1, 'tien', 'trung', 'trunghachcf', 'thihachcf@gmail.com', '$2y$10$2D2KewvuwMwGPqimjRKitupeduVqZyVvV7Pl99YXfV9f6EXUm61XK', 'avatar0.png', 1),
(15, 'Vũ Linh', 'Hoàng', 'vulinhhoang', 'vulinhhoang@gmail.com', '$2y$10$mByfiHxmhqAcrl5rMmCuQe7F51rug3cDgnXmtWBkTL7DnO7Sh7CkC', '1753923615avatar2.jpg', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_post_category` (`category_id`),
  ADD KEY `FK_post_user` (`author_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(50) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_post_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `FK_post_user` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
