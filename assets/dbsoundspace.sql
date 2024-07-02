-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 27, 2024 lúc 08:20 PM
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
-- Cơ sở dữ liệu: `dbsoundspace`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_ac`
--

CREATE TABLE `admin_ac` (
  `id` int(11) NOT NULL,
  `admin_name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_ac`
--

INSERT INTO `admin_ac` (`id`, `admin_name`, `password`) VALUES
(4, 'vu2k4', '171eb22e38347b1d50a0b9491d103419'),
(5, 'BaoTran', '29c8abdc5640fed9e5cb3926a02d92c7'),
(7, 'son2k4', '6226f7cbe59e99a90b5cef6f94f966fd'),
(8, 'tuong2k4', '56457d997d7135b6ca0a7b792cbcf065'),
(9, 'linh', '892da3d819056410c05bca7747d22735');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albums`
--

CREATE TABLE `albums` (
  `id` int(11) NOT NULL,
  `title` mediumtext DEFAULT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `artworkPath` varchar(500) NOT NULL,
  `Country` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `albums`
--

INSERT INTO `albums` (`id`, `title`, `artist`, `genre`, `artworkPath`, `Country`) VALUES
(1, 'Chill', 19, 17, 'assets/images/artwork/Chill.jpg', ''),
(2, 'Tâm trạng', 19, 21, 'assets/images/artwork/TamTrang.jpg', NULL),
(3, 'Tình yêu', 19, 19, 'assets/images/artwork/Love.jpg', NULL),
(4, 'Tập trung', 19, 18, 'assets/images/artwork/Focus.jpg', NULL),
(8, 'Sơn Tùng', 6, 2, 'assets/images/artwork/son_tung.jpg', 'Việt Nam'),
(9, 'Hoàng Dũng', 7, 2, 'assets/images/artwork/hoang_dung.jpg', 'Việt Nam'),
(10, 'Bùi Anh Tuấn', 1, 11, 'assets/images/artwork/bui_anh_tuan.jpg', 'Việt Nam'),
(11, 'Đức phúc', 4, 2, 'assets/images/artwork/duc_phuc.jpg', 'Việt Nam'),
(12, 'HieuThuHai', 3, 4, 'assets/images/artwork/hieu_thu_hai.jpg', 'Việt Nam'),
(13, 'Vũ', 2, 14, 'assets/images/artwork/vu.jpg', 'Việt Nam'),
(14, 'Alan Walker', 5, 15, 'assets/images/artwork/alan_walker.jpg', 'US-UK'),
(15, 'Charlie Puth', 8, 2, 'assets/images/artwork/charlie_puth.jpg', 'US-UK'),
(16, 'Taylor Swift', 9, 2, 'assets/images/artwork/taylor_swift.jpg', 'US-UK'),
(17, 'Ed Sheeran', 10, 2, 'assets/images/artwork/ed_sheeran.jpg', 'US-UK'),
(18, 'Justin Bieber', 11, 2, 'assets/images/artwork/justin_bieber.jpg', 'US-UK'),
(19, 'Maroon 5', 12, 2, 'assets/images/artwork/maroon_5.jpg', 'US-UK'),
(20, 'BTS', 13, 16, 'assets/images/artwork/BTS.jpg', 'Hàn Quốc'),
(21, 'New Jeans', 14, 16, 'assets/images/artwork/new_jeans.jpg', 'Hàn Quốc'),
(22, 'IU', 15, 16, 'assets/images/artwork/IU.jpg', 'Hàn Quốc'),
(23, 'EXO', 16, 16, 'assets/images/artwork/exo.jpg', 'Hàn Quốc'),
(24, 'BlackPink', 17, 16, 'assets/images/artwork/blackpink.jpg', 'Hàn Quốc'),
(25, 'Twice', 18, 16, 'assets/images/artwork/twice.jpg', 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Bùi Anh Tuấn'),
(2, 'Vũ'),
(3, 'HieuThuHai'),
(4, 'Đức Phúc'),
(5, 'Alan Walker'),
(6, 'Sơn Tùng'),
(7, 'Hoàng Dũng'),
(8, 'Charlie Puth'),
(9, 'Taylor Swift'),
(10, 'Ed Sheeran'),
(11, 'Justin Bieber'),
(12, 'Marroon 5'),
(13, 'BTS'),
(14, 'NewJeans'),
(15, 'IU'),
(16, 'EXO'),
(17, 'BlackPink'),
(18, 'Twice'),
(19, 'SoundSpace'),
(20, 'Andiez');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` mediumtext DEFAULT NULL,
  `artist` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `bannerPath` text DEFAULT NULL,
  `Country` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `artist`, `genre`, `bannerPath`, `Country`) VALUES
(1, 'Chào mừng bạn đã tới với SoundSpace', 19, 11, 'assets/images/banner/Project SoundSpace.png', ''),
(2, 'Đêm hội âm nhạc', 19, 0, 'assets/images/banner/banner2.png', NULL),
(3, 'banner3', 19, 1, 'assets/images/banner/banner3.jpg', NULL),
(10, 'NTPMM', 19, 2, 'assets/images/banner/NTPMM.png', 'Việt Nam'),
(11, 'Anh trai say Hi', 19, 1, 'assets/images/banner/ATSH.jpeg', 'Việt Nam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Rock'),
(2, 'Pop'),
(3, 'Hip-hop'),
(4, 'Rap'),
(5, 'R & B'),
(6, 'Classical'),
(7, 'Techno'),
(8, 'Jazz'),
(9, 'Folk'),
(10, 'Country'),
(11, 'Ballad'),
(12, 'Love'),
(13, 'Beat'),
(14, 'Indie'),
(15, 'EDM'),
(16, 'K-Pop'),
(17, 'chill'),
(18, 'focus'),
(19, 'love'),
(20, 'best'),
(21, 'deep');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `owner` varchar(50) NOT NULL,
  `dateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `playlists`
--

INSERT INTO `playlists` (`id`, `name`, `owner`, `dateCreated`) VALUES
(13, 'yêu thích', 'son2k4', '2024-05-29 00:00:00'),
(15, 'love', 'customer', '2024-05-30 00:00:00'),
(16, 'new', 'son2k4', '2024-05-30 00:00:00'),
(17, 'moi', 'Maycute', '2024-06-17 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `playlistsongs`
--

CREATE TABLE `playlistsongs` (
  `id` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `playlistId` int(11) NOT NULL,
  `playlistOrder` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `playlistsongs`
--

INSERT INTO `playlistsongs` (`id`, `songId`, `playlistId`, `playlistOrder`) VALUES
(8, 1, 10, 0),
(9, 2, 8, 0),
(10, 51, 13, 0),
(11, 91, 15, 0),
(12, 64, 13, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recently_played`
--

CREATE TABLE `recently_played` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `song_id` int(11) NOT NULL,
  `played_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `artist` text DEFAULT NULL,
  `album` int(11) NOT NULL,
  `genre` int(11) NOT NULL,
  `duration` varchar(8) NOT NULL,
  `path` varchar(500) NOT NULL,
  `albumOrder` int(11) NOT NULL,
  `plays` int(11) NOT NULL,
  `banner` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `songs`
--

INSERT INTO `songs` (`id`, `title`, `artist`, `album`, `genre`, `duration`, `path`, `albumOrder`, `plays`, `banner`) VALUES
(1, 'Chờ anh nhé', '7', 9, 2, '5:22', 'assets/music/cho_anh_nhe.mp3', 1, 34, '1'),
(2, 'Đôi mươi', '7', 9, 2, '4:20', '	\r\nassets/music/DoiMuoi_HoangDung.mp3', 2, 22, '2'),
(3, 'Đoạn kết mới', '7', 9, 2, '4:54', '	\r\nassets/music/DoanKetMoi_HoangDung.mp3', 3, 23, '1'),
(4, 'Nàng thơ', '7', 9, 2, '4:14', 'assets/music/Nang_tho.mp3', 4, 24, '3'),
(5, 'Chờ anh nhé x Chỉ còn lại tình yêu', '7,1', 9, 2, '6:21', 'assets/music/ChoAnhNheChiConLaiTinhYeu_HoangDung.mp3', 5, 14, '3'),
(38, 'Alone', '5', 14, 15, '2:40', 'assets/music/Alan_Alone.mp3', 1, 3, '1'),
(40, 'Faded', '5', 14, 15, '3:32', 'assets/music/Alan_Faded.mp3', 2, 3, '2'),
(41, 'On My Way', '5', 14, 15, '3:13', 'assets/music/Alan_OnMyWay.mp3', 3, 1, '3'),
(42, 'Forever Young', '17', 24, 16, '3:54', 'assets/music/BlackPink_ForeverYoung.mp3', 1, 2, '2'),
(43, 'How You Like That', '17', 24, 16, '3:03', 'assets/music/BlackPink_HowYouLikeThat.mp3', 2, 2, NULL),
(44, 'Love Sick Girl', '17', 24, 16, '3:11', 'assets/music/BlackPink_LoveSickGirl.mp3', 3, 0, NULL),
(45, 'Playing With Fire', '17', 24, 16, '3:17', 'assets/music/BlackPink_PlayWithFire.mp3', 4, 1, NULL),
(46, 'Boy With Luv', '13', 20, 16, '3:52', 'assets/music/BTS_BoyWithLuv.mp3', 1, 2, NULL),
(47, 'Dynamite', '13', 20, 16, '3:17', 'assets/music/BTS_Dynamite.mp3', 2, 2, NULL),
(48, 'Just One Day', '13', 20, 16, '4:13', 'assets/music/BTS_JustOneDay.mp3', 3, 11, NULL),
(49, 'Spring Day', '13', 20, 16, '4:34', 'assets/music/BTS_SpringDay.mp3', 4, 1, NULL),
(50, 'Hẹn một mai', '1', 10, 2, '4:30', 'assets/music/BuiAnhTuan_HenMotMai.mp3', 1, 4, NULL),
(51, 'Vẽ lại bức tranh', '1', 10, 2, '4:59', 'assets/music/BuiAnhTuan_VeLaiBucTranh.mp3', 2, 6, NULL),
(52, 'Attention', '8', 15, 5, '3:31', 'assets/music/CharliePuth_Attention.mp3', 1, 1, NULL),
(53, 'Dangerously', '8', 15, 5, '3:21', 'assets/music/CharliePuth_Dangerously.mp3', 2, 3, NULL),
(54, 'Light Switch', '8', 15, 5, '3:06', 'assets/music/CharliePuth_LightSwitch.mp3', 3, 2, NULL),
(55, 'Ánh nắng của anh', '4', 11, 11, '4:25', 'assets/music/DucPhuc_AnhNangCuaAnh.mp3', 1, 5, NULL),
(56, 'Hơn cả yêu', '4', 11, 11, '5:43', 'assets/music/DucPhuc_HonCaYeu.mp3', 2, 2, NULL),
(57, 'Yêu được không', '4', 11, 11, '5:31', 'assets/music/DucPhuc_YeuDuocKhong.mp3', 3, 2, NULL),
(58, 'Perfect', '10', 17, 9, '4:23', 'assets/music/EdSheeran_Perfect.mp3', 1, 0, NULL),
(59, 'Shape Of You', '10', 17, 9, '3:55', 'assets/music/EdSheeran_ShapeOfYou.mp3', 2, 4, NULL),
(61, 'Love Shot', '16', 23, 16, '3:20', 'assets/music/Exo_LoveShot.mp3', 1, 2, NULL),
(62, 'The Eve', '16', 23, 16, '2:55', 'assets/music/Exo_TheEve.mp3', 2, 1, NULL),
(63, 'Universe', '16', 23, 16, '4:23', 'assets/music/Exo_Universe.mp3', 3, 2, NULL),
(64, 'Hẹn gặp em dưới ánh trăng', '3', 12, 4, '3:52', 'assets/music/Gerdnang_HenGapEmDuoiAnhTrang.mp3', 1, 19, NULL),
(65, 'Không thể say', '3', 12, 4, '4:20', 'assets/music/HieuThuHai_KhongTheSay.mp3', 2, 14, NULL),
(66, 'Ngủ một mình', '3', 12, 4, '3:25', 'assets/music/HieuThuHai_NguMotMinh.mp3', 3, 6, NULL),
(67, 'Blueming', '15', 22, 16, '3:50', 'assets/music/IU_Blueming.mp3', 1, 2, NULL),
(68, 'Eight', '15', 22, 16, '2:46', 'assets/music/IU_Eight.mp3', 2, 0, NULL),
(69, 'Love Wins All', '15', 22, 16, '4:28', 'assets/music/IU_LoveWinAll.mp3', 3, 0, NULL),
(70, 'My Sea', '15', 22, 16, '5:37', 'assets/music/IU_MySea.mp3', 4, 1, NULL),
(71, 'Baby', '11', 18, 2, '4:33', 'assets/music/JustinBieber_Baby.mp3', 1, 11, NULL),
(72, 'Sorry', '11', 18, 15, '3:19', 'assets/music/JustinBieber_Sorry.mp3', 2, 6, NULL),
(73, 'Stay', '11', 18, 2, '2:19', 'assets/music/JustinBieber_Stay.mp3', 3, 3, NULL),
(74, 'Ghost', '11', 18, 2, '2:32', 'assets/music/JustinBierber_Ghost.mp3', 4, 6, NULL),
(75, 'Girl Like You', '12', 19, 5, '3:52', 'assets/music/Maroon5_GirlLikeYou.mp3', 1, 3, NULL),
(76, 'Memories', '12', 19, 5, '3:04', 'assets/music/Maroon5_Memories.mp3', 2, 4, NULL),
(77, 'Sugar', '12', 19, 5, '3:52', 'assets/music/Maroon5_Sugar.mp3', 3, 4, NULL),
(78, 'Ditto', '14', 21, 16, '3:06', 'assets/music/Newjeans_Ditto.mp3', 1, 2, NULL),
(79, 'Hype Boy', '14', 21, 16, '2:58', 'assets/music/Newjeans_HypeBoy.mp3', 2, 2, NULL),
(80, 'Super Shy', '14', 21, 16, '2:34', 'assets/music/Newjeans_SuperShy.mp3', 3, 1, NULL),
(81, 'OMG', '14', 21, 16, '3:32', 'assets/music/Newjeans_OMG.mp3', 4, 1, NULL),
(82, 'Cruel Summer', '9', 16, 2, '2:57', 'assets/music/TaylorSwift_CruelSummer.mp3', 1, 2, NULL),
(83, 'You Belong With Me', '9', 16, 2, '3:52', 'assets/music/TaylorSwift_YouBelongWithMe.mp3', 2, 2, NULL),
(84, 'Like Ooh Ahh', '18', 25, 16, '3:37', 'assets/music/Twice_LikeOohAhh.mp3', 1, 0, NULL),
(85, 'Likey', '18', 25, 16, '3:27', 'assets/music/Twice_Likey.mp3', 2, 0, NULL),
(86, 'What is Love', '18', 25, 16, '3:28', 'assets/music/Twice_WhatIsLove.mp3', 3, 0, NULL),
(87, 'Anh Nhớ ra', '2', 13, 14, '4:36', 'assets/music/Vu_AnhNhoRa.mp3', 1, 3, NULL),
(88, 'Bước qua mùa Cô Đơn', '2', 13, 14, '4:34', 'assets/music/Vu_BuocQuaMuaCoDon.mp3', 2, 0, NULL),
(89, 'Những lời hứa bỏ quên', '2', 13, 14, '4:02', 'assets/music/Vu_NhungLoiHuaBoQuen.mp3', 3, 0, NULL),
(90, 'Chúng ta của tương lai', '6', 8, 2, '4:36', 'assets/music/SonTung_ChungTaCuaTuongLai.mp3', 1, 8, NULL),
(91, 'Chúng ta của hiện tại', '6', 8, 2, '5:01', 'assets/music/SonTung_ChungTaCuaHienTai.mp3', 2, 50, NULL),
(92, 'Piano Chill', '19', 4, 21, '35:15', 'assets/music/SoundSpace_TapTrung.mp3', 1, 1, NULL),
(93, 'Hơn cả yêu', '4', 3, 11, '5:43', 'assets/music/DucPhuc_HonCaYeu.mp3', 1, 2, NULL),
(94, 'Đôi mươi', '7', 3, 2, '4:20', 'assets/music/DoiMuoi_HoangDung.mp3', 2, 1, NULL),
(95, 'Đừng làm trái tim anh đau', '6', 8, 2, '5:25', 'assets/music/SonTung_DungLamTraiTimAnhDau.mp3', 3, 1, NULL),
(96, 'Thật tuyệt khi ở bên em', '20', 2, 2, '5:15', 'assets/music/Andiez_ThatTuyetVoiKhiOBenEm.mp3', 1, 3, NULL),
(97, 'Đôi giày chưa vừa Size', '20', 1, 11, '5:18', 'assets/music/Andiez_DoiGiayChuaVuaSize.mp3', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(32) NOT NULL,
  `signUpDate` datetime NOT NULL,
  `profilePic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `firstName`, `lastName`, `email`, `password`, `signUpDate`, `profilePic`) VALUES
(5, 'Tuong2k4', 'Đỗ ', 'Tường', 'Tuong@gmail.com', '2c0cdf2074cbea068b669c9ca4ca8748', '2024-05-23 00:00:00', 'assets/images/artwork/Chill.jpg'),
(6, 'Son2k4', 'Võ Đinh', 'Trung Sơn', 'Trungsonbd2004@gmail.com', '924d77bb43db05d124aacf28da36a172', '2024-05-29 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(7, 'SoundSpace', 'Sound', 'Space', 'Soundspaceg8@gmail.com', 'b49c78ea3d1d8923cf6c7ea7412d85e6', '2024-05-30 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(8, 'customer', 'Quy', 'Nhơn', 'Quynhonqnu2004@gmail.com', '91ec1f9324753048c0096d036a694f86', '2024-05-30 00:00:00', 'assets/images/profile-pics/head_emerald.png'),
(9, 'Maycute', 'Tran', 'Nguyen', 'Nguyentran2k4@gmail.com', '3eb56cae3913812a171265f7840c30b4', '2024-06-17 00:00:00', 'assets/images/profile-pics/head_emerald.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_ac`
--
ALTER TABLE `admin_ac`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `playlistsongs`
--
ALTER TABLE `playlistsongs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recently_played`
--
ALTER TABLE `recently_played`
  ADD PRIMARY KEY (`id`),
  ADD KEY `song_id` (`song_id`);

--
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_ac`
--
ALTER TABLE `admin_ac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `playlistsongs`
--
ALTER TABLE `playlistsongs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `recently_played`
--
ALTER TABLE `recently_played`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `recently_played`
--
ALTER TABLE `recently_played`
  ADD CONSTRAINT `recently_played_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
