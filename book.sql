-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 12:06 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--
CREATE DATABASE IF NOT EXISTS `book` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `book`;

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `binhluan_id` int(11) NOT NULL,
  `tenbinhluan` varchar(255) NOT NULL,
  `binhluan` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `danhgia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `binhluan`
--

INSERT INTO `binhluan` (`binhluan_id`, `tenbinhluan`, `binhluan`, `product_id`, `danhgia`) VALUES
(28, 'trần hùng', 'hay', 4, 5),
(32, 'Trần Việt Hùng', 'Tệ!', 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `category_id`) VALUES
(1, 'Văn Học', 1),
(2, 'Kỹ năng sống', 1),
(3, 'Dạy con', 1),
(4, 'Thiếu nhi', 1),
(5, 'Cổ Tích Việt Nam', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Sách'),
(2, 'Truyện Tranh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `product_desc` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  `price` int(15) NOT NULL,
  `number_page` int(15) NOT NULL,
  `number_book_sold` int(15) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `author`, `product_desc`, `date`, `price`, `number_page`, `number_book_sold`, `product_img`, `product_category`) VALUES
(1, 'Lời nhắn cuối cùng', 1, 1, 'Tùng Dương', '', '2023-02-03', 80000, 200, 2, 'loi-nhan-cuoi-cung_122801_1.jpg', 'Văn học'),
(2, 'Ngôi thứ nhất', 1, 1, 'Thùy Dương', '', '2022-03-01', 120000, 150, 0, 'ngoi-thu-nhat-so-it_122802_1.jpg', 'Văn học'),
(3, 'Tiệm cắt tóc trông về phía biển', 1, 1, 'Thùy Dương', '', '2023-02-03', 120000, 200, 2, 'tiem-cat-toc-trong-ve-phia-bien_122753_1.jpg', 'Văn học'),
(4, 'Nỗi nhục', 1, 1, 'Thùy Dương', '', '2023-02-03', 96000, 180, 0, 'noi-nhuc-nobel-prize-in-literature-2022-_122806_1.jpg', 'Văn học'),
(5, 'Người mẹ', 1, 1, 'Thùy Dương', '', '2023-02-03', 96000, 150, 5, 'nguoi-me_122810_1.jpg', 'Văn học'),
(6, 'Người bạn triệu phú', 1, 1, 'Tùng Dương', '', '2023-02-03', 80000, 200, 0, 'nguoi-ban-trieu-phu_122778_1.jpg', 'Văn học'),
(7, 'Phụ nữ vô hình', 1, 1, 'Thùy Dương', '', '2022-03-01', 96000, 200, 0, 'phu-nu-vo-hinh_122754_1.jpg', 'Văn học'),
(8, 'Thượng ngàn', 1, 1, 'Thùy Dương', '', '2023-02-03', 120000, 240, 0, 'thuong-ngan_122815_1.jpg', 'Văn học'),
(9, 'Tỏ giăng tỏ đèn', 1, 1, 'Tùng Dương', '', '2022-03-01', 96000, 180, 0, 'to-giang-to-den_122844_1 (1).jpg', 'Văn học'),
(10, 'Con đường bay qua làn ranh sinh diệt', 1, 1, 'Tùng Dương', '', '2022-03-01', 120000, 150, 0, 'con-duong-bay-qua-lan-ranh-sinh-diet_122812_1.jpg', 'Văn học'),
(11, 'Bà tôi là Runner', 1, 4, 'Tùng Dương', '', '2022-03-01', 96000, 200, 0, 'ba-to-la-runner_122841_2.jpg', 'Thiếu nhi'),
(12, 'Làng Ồn Ào vui ơi là vui', 1, 4, 'Tùng Dương', '', '2023-02-03', 96000, 150, 0, 'lu-tre-lang-on-ao-vui-oi-la-vui_122808_1.jpg', 'Thiếu nhi'),
(13, 'Mặt Trăng', 1, 4, 'Thùy Dương', '', '2023-02-03', 96000, 150, 0, 'nhung-cau-hoi-to-mo-va-giai-dap-thu-vi-ve-mat-trang_122750_1.jpg', 'Thiếu nhi'),
(14, 'Thánh Gióng', 2, 5, 'Thùy Dương', '', '2023-02-03', 96000, 150, 0, 'vietnamese-folklore-the-story-of-saint-giong-chuyen-ong-giong_122765_1.jpg', 'Thiếu nhi'),
(15, 'Tấm cám', 2, 5, 'Thùy Dương', '', '2022-03-01', 96000, 200, 0, 'vietnamese-folklore-the-story-of-a-vietnamese-cinderella-truyen-tam-cam_122764_2.jpg', 'Thiếu nhi'),
(16, 'Sự tích con hổ', 2, 5, 'Thùy Dương', '', '2023-02-03', 120000, 150, 2, 'vietnamese-folklore-the-story-of-a-man-in-the-moon-su-tich-chu-cuoi-cung-trang_122762_2.jpg', 'Thiếu nhi'),
(17, 'Sơn tinh Thủy tinh', 2, 5, 'Thùy Dương', '', '2022-03-01', 96000, 200, 2, 'vietnamese-folklore-the-legend-of-mountain-and-water-genies-son-tinh-thuy-tinh_122761_1.jpg', 'Thiếu nhi'),
(18, 'Trạng Quỳnh', 2, 5, 'Tùng Dương', '', '2022-03-01', 120000, 180, 0, 'vietnamese-folklore-square-and-round-rice-cakes-su-tich-banh-chung-banh-day_122759_1.jpg', 'Thiếu nhi'),
(19, 'Sự tích cây nêu', 2, 5, 'Tùng Dương', '', '2022-03-01', 120000, 180, 0, 'vietnamese-folklore-the-new-year-pole-su-tich-cay-neu-ngay-tet_122760_1.jpg', 'Thiếu nhi'),
(20, 'Sự tích hồ gươm', 2, 5, 'Tùng Dương', '', '2023-02-03', 96000, 180, 0, 'vietnamese-folklore-the-legend-of-sword-lake-su-tich-ho-guom_122763_1.jpg', 'Thiếu nhi'),
(21, 'Tâm lí học', 1, 2, 'Thùy Dương', '', '2022-03-01', 120000, 200, 0, 'tam-ly-hoc-ve-nhung-chung-quai-la_122827_1.jpg', 'Kỹ năng sống'),
(22, 'Sức mạng nội tại', 1, 2, 'Thùy Dương', '', '2022-03-01', 96000, 200, 0, 'suc-manh-noi-tai_122740_1.jpg', 'Kỹ năng sống'),
(23, 'Sinh tồn giữa thiên nhiên', 1, 2, 'Tùng Dương', '', '2022-03-01', 120000, 150, 0, 'sinh-ton-giua-thien-nhien-cam-nang-toan-tap-ve-da-ngoai_122736_1.jpg', 'Kỹ năng sống'),
(24, 'Muộn phiền ơi biến đi', 1, 2, 'Tùng Dương', '', '2023-02-03', 96000, 150, 0, 'muon-phien-oi-bien-di-_122738_1.jpg', 'Kỹ năng sống'),
(25, 'Kế hoạch nghỉ hưu sung túc', 1, 2, 'Thùy Dương', '', '2022-03-01', 96000, 150, 0, 'ke-hoach-nghi-huu-sung-tuc_122786_1.jpg', 'Kỹ năng sống'),
(26, 'Đọc vị các mối quan hệ', 1, 2, 'Thùy Dương', '', '2023-02-03', 80000, 180, 0, 'doc-vi-cac-moi-quan-he_122825_1.jpg', 'Kỹ năng sống'),
(27, 'Chầm chậm mà sống', 1, 2, 'Thùy Dương', '', '2023-02-03', 96000, 200, 0, 'cham-cham-ma-song_122739_1.jpg', 'Kỹ năng sống'),
(28, 'Thao túng về tiền', 1, 2, 'Thùy Dương', '', '2022-03-01', 96000, 240, 0, '122826_thao-tung-ve-tien_122824_1.jpg', 'Kỹ năng sống'),
(29, 'Bí quyết sống', 1, 2, 'Thùy Dương', '', '2022-03-01', 80000, 150, 0, 'bi-quyet-song-tinh-thuc-trong-8-ngay_122742_1.jpg', 'Kỹ năng sống'),
(30, 'Cha mẹ ái kỷ', 1, 3, 'Thùy Dương', '', '2022-03-01', 96000, 200, 0, 'cha-me-ai-ky-cach-de-nuoi-day-dua-tre-hanh-phuc-khoe-manh-va-kien-cuong_121807_1.jpg', 'Dạy con'),
(31, 'Con tập đi cha mẹ tập bình tĩnh', 1, 3, 'Tùng Dương', '', '2023-02-03', 120000, 150, 0, 'con-tap-di-cha-me-tap-binh-tinh_122568_1.jpg', 'Dạy con'),
(32, 'Đứa trẻ khỏe mạnh về cảm xúc', 1, 3, 'Thùy Dương', '', '2023-02-03', 96000, 150, 0, '-dua-tre-khoe-manh-ve-cam-xuc_121086_1.jpg', 'Dạy con'),
(33, 'Làm cha mẹ hoàn hảo', 1, 3, 'Thùy Dương', '', '2022-03-01', 120000, 150, 0, 'lam-cha-me-hoan-hao_121060_1.jpg', 'Dạy con'),
(34, 'Thôi không khủng hoảng', 1, 3, 'Thùy Dương', '', '2022-03-01', 96000, 200, 0, 'lam-sao-de-cha-me-thoi-khung-hoang_122626_1.jpg', 'Dạy con'),
(35, 'Người mẹ giàu', 1, 3, 'Tùng Dương', '', '2022-03-01', 96000, 150, 0, 'nguoi-me-“giau-co”-cung-con-bay-vao-tuoi-tho-yeu-thuong_122618_1.jpg', 'Dạy con'),
(36, 'Vừa mềm vừa dẻo', 1, 3, 'Thùy Dương', '', '2022-03-01', 96000, 200, 0, 'vua-mem-vua-deo-be-oi-dung-an-nhieu-bot-mi-_121812_2.jpg', 'Dạy con'),
(37, 'Vừa ngọt ngào vừa đáng sợ', 1, 3, 'Thùy Dương', '', '2022-03-01', 120000, 200, 0, 'vua-ngot-ngao-vua-dang-so-be-oi-dung-an-nhieu-duong-_121810_1.jpg', 'Dạy con'),
(38, 'Vừa thô ráp vừa lấp lánh', 1, 3, 'Thùy Dương', '', '2022-03-01', 96000, 150, 0, 'vua-tho-rap-vua-lap-lanh-be-oi-dung-an-nhieu-muoi-_121811_1.jpg', 'Dạy con'),
(39, 'Thánh Gióng', 1, 4, 'Thùy Dương', '', '2022-03-01', 96000, 150, 0, 'vietnamese-folklore-the-story-of-saint-giong-chuyen-ong-giong_122765_1.jpg', 'Thiếu nhi'),
(40, 'Tấm cám', 1, 4, 'Thùy Dương', '', '2022-03-01', 96000, 150, 0, 'vietnamese-folklore-the-story-of-a-vietnamese-cinderella-truyen-tam-cam_122764_2.jpg', 'Thiếu nhi'),
(41, 'Sự tích con hổ', 1, 4, 'Thùy Dương', '', '2022-03-01', 96000, 150, 0, 'vietnamese-folklore-the-story-of-a-man-in-the-moon-su-tich-chu-cuoi-cung-trang_122762_2.jpg', 'Thiếu nhi'),
(42, 'Sự tích cây nêu', 1, 4, 'Thùy Dương', '', '2023-02-03', 96000, 150, 0, 'vietnamese-folklore-the-new-year-pole-su-tich-cay-neu-ngay-tet_122760_1.jpg', 'Thiếu nhi'),
(43, 'Sự tích hồ gươm', 1, 4, 'Thùy Dương', '', '2022-03-01', 96000, 150, 0, 'vietnamese-folklore-the-legend-of-sword-lake-su-tich-ho-guom_122763_1.jpg', 'Thiếu nhi'),
(44, 'Sơn tinh Thủy tinh', 1, 4, 'Thùy Dương', '', '2022-03-01', 96000, 150, 0, 'vietnamese-folklore-the-legend-of-mountain-and-water-genies-son-tinh-thuy-tinh_122761_1.jpg', 'Thiếu nhi'),
(45, 'Sự tích bánh trưng bánh dày', 1, 4, 'Thùy Dương', 'abc', '2022-03-01', 96000, 200, 9, 'vietnamese-folklore-square-and-round-rice-cakes-su-tich-banh-chung-banh-day_122759_1.jpg', 'Thiếu nhi'),
(49, 'ÁDASD', 0, 0, 'ÁDADASDASD', '', '0000-00-00', 0, 0, 0, 'vietnamese-folklore-square-and-round-rice-cakes-su-tich-banh-chung-banh-day_122759_1.jpg', 'ÁDAD');

-- --------------------------------------------------------

--
-- Table structure for table `thanhvien`
--

CREATE TABLE `thanhvien` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thanhvien`
--

INSERT INTO `thanhvien` (`id`, `name`, `email`, `phone`, `password`, `role`) VALUES
(1, 'hungadmin', 'hungadmin@gmail.com', '0562948850', '25f9e794323b453885f5181f1b624d0b', 'admin'),
(2, 'viethung', 'vhung@gmail.com', '023654789', '25f9e794323b453885f5181f1b624d0b', 'user'),
(4, 'hungtran', 'hungtran@gmail.com', '0562948850', '25f9e794323b453885f5181f1b624d0b', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`binhluan_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `binhluan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
