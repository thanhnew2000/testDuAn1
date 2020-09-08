-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 07, 2019 lúc 02:01 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `image`) VALUES
(2, 'Lớp 12', 'THPT_FPT_tuyen_sinh1.jpg'),
(3, 'Lớp 11', '12.jpg'),
(4, 'Lớp 10', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_course` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `content` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id_comment`, `id_course`, `date_time`, `content`, `id_user`) VALUES
(1, 4, '0000-00-00 00:00:00', 'Bài giảng hay', 1),
(5, 4, '0000-00-00 00:00:00', 'sfdg', 1),
(6, 7, '2019-11-30 14:20:00', 'Hay thầy oi\r\n', 1),
(7, 6, '2019-12-03 05:04:24', 'ab', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id_course` int(11) NOT NULL,
  `name_course` varchar(500) NOT NULL,
  `image` varchar(300) NOT NULL,
  `infomation` text NOT NULL,
  `id_subcategory` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`id_course`, `name_course`, `image`, `infomation`, `id_subcategory`, `id_teacher`) VALUES
(3, 'Làm chủ môn văn 12', '', '																																																						Làm chủ môn văn 12																																																', 2, 1),
(4, 'Khóa học ngữ pháp cơ bản 2019', '1.jpg', '<p>Nếu so s&aacute;nh học tiếng Anh giống như việc x&acirc;y một ng&ocirc;i nh&agrave;, th&igrave; ngữ ph&aacute;p tiếng Anh đ&oacute;ng vai tr&ograve; l&agrave; nền m&oacute;ng v&agrave; khung nh&agrave;. M&oacute;ng v&agrave; khung chắc th&igrave; nh&agrave; sẽ x&acirc;y được cao, v&agrave; dĩ nhi&ecirc;n c&oacute; thể x&acirc;y hay mở rộng th&ecirc;m nhiều những chi tiết thiết kế kh&aacute;c, v&agrave; ngược lại. Theo thứ tự th&igrave; m&oacute;ng v&agrave; phần khung phải l&agrave; l&agrave; phần được x&acirc;y dựng đầu ti&ecirc;n. Từ h&igrave;nh h&igrave;nh ảnh li&ecirc;n tưởng so s&aacute;nh n&agrave;y, c&oacute; thể &nbsp;khẳng định rằng, h&atilde;y bắt đầu học tiếng Anh bằng việc học v&agrave; củng cố ngữ ph&aacute;p. Đặc biệt hơn đối với c&aacute;c em học sinh sắp bước qua kỳ thi THPTQG m&ocirc;n Anh Văn tới đ&acirc;y th&igrave; ngữ ph&aacute;p cũng đ&oacute;ng vai tr&ograve; hểt sức quan trọng với lượng kiến thức chiếm tới (30%).</p>\r\n\r\n<p><strong>KHO&Aacute; HỌC NGỮ PH&Aacute;P TIẾNG ANH CỦA C&Ocirc; MAI PHƯƠNG TR&Ecirc;N HỌC HIỂU&nbsp;C&Oacute; G&Igrave; ĐẶC BIỆT?</strong></p>\r\n\r\n<p>KH&Oacute;A HỌC NGỮ PH&Aacute;P TIẾNG ANH &nbsp;với kiến thức &nbsp;tổng hợp xuy&ecirc;n suốt kiến thức &nbsp;ngữ ph&aacute;p tiếng Anh 10 ,11 v&agrave; 12 đầy đủ v&agrave; chi tiết nhất với hơn 70 video b&agrave;i giảng mới do ch&iacute;nh c&ocirc; Mai Phương bi&ecirc;n soạn, đứng lớp giảng dạy, hơn 100 b&agrave;i luyện tập k&egrave;m theo sau mỗi chuy&ecirc;n đề c&ugrave;ng hơn 80 b&agrave;i thi online c&oacute; t&iacute;nh điểm k&egrave;m theo để c&aacute;c em luyện tập, bổ sung v&agrave; củng lại c&aacute;c kiến ph&uacute;c ngữ ph&aacute;p tiếng anh &nbsp;gi&uacute;p c&aacute;c em đạt điểm cao trong k&igrave; thi THPT m&ocirc;n Tiếng Anh.</p>\r\n', 3, 2),
(5, ' Lấy gốc căn bản môn Toán 12', '2.jpg', '<p>Kh&oacute;a học bao gồm 16 chuy&ecirc;n đề với 180 b&agrave;i giảng kết hợp tự luận, trắc nghiệm v&agrave; 105 đề thi 100% trắc nghiệm.</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;Đầy đủ c&aacute;c b&agrave;i giảng cơ bản v&agrave; n&acirc;ng cao, c&aacute;c b&agrave;i giảng mới v&agrave; kĩ năng trắc nghiệm mới được cập nhật thường xuy&ecirc;n. B&ecirc;n cạnh đ&oacute; c&ograve;n c&oacute; c&aacute;c b&agrave;i giảng về sử dụng MTCT để giải c&aacute;c b&agrave;i to&aacute;n.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;&nbsp;Hệ thống b&agrave;i tập phong ph&uacute; c&oacute; đ&aacute;p &aacute;n chi tiết. C&oacute; thi online gi&uacute;p học sinh tiếp cận dần với &aacute;p lực thời gian trắc nghiệm.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Đặc điểm nổi bật của kh&oacute;a học: Dạy rất kĩ, chuy&ecirc;n s&acirc;u từng dạng b&agrave;i, vấn đề. Đầy đủ kiến thức 11, 12.</p>\r\n\r\n<p>&nbsp;&nbsp;&nbsp;Mục ti&ecirc;u kh&oacute;a học: Học sinh Đạt 9 điểm To&aacute;n trong đề thi THPTQG 2020.</p>\r\n', 1, 3),
(6, 'Toán đại số lớp 12 trên 8+', '3.png', '<p>Kh&oacute;a học gi&uacute;p bạn &ocirc;n tập, nắm vững kiến thức cơ bản của chương tr&igrave;nh học tr&ecirc;n lớp một c&aacute;ch r&otilde; r&agrave;ng v&agrave; chi tiết th&ocirc;ng qua b&agrave;i giảng video.</p>\r\n', 1, 4),
(7, 'Nắm vứng các tác phẩm lớp 12', '3.jpg', '<p>Tại sao n&ecirc;n tham gia kh&oacute;a học n&agrave;y?<br />\r\n*** Người thầy c&oacute; bộ t&agrave;i liệu khủng nhất Việt Nam, Thầy l&agrave; chủ bi&ecirc;n của hơn 12 đầu s&aacute;ch hỗ trợ học tr&ograve; tr&ecirc;n to&agrave;n quốc.<br />\r\n*** Giọng giảng của thầy lu&ocirc;n truyền được lửa tới học tr&ograve;, cam kết kh&ocirc;ng bao giờ để c&aacute;c em ngủ gật trong 1 giờ học văn, tr&aacute;i lại cực h&agrave;o hứng v&agrave; c&oacute; những trận cười nghi&ecirc;ng ngả.<br />\r\n*** C&oacute; h&agrave;ng ng&agrave;n học sinh theo học mỗi năm v&agrave; đ&atilde; đạt được hiệu quả ngay trong những b&agrave;i giảng đầu ti&ecirc;n.<br />\r\n*** Thầy l&agrave; địa chỉ uy t&iacute;n của nhiều bậc phụ huynh nổi tiếng c&oacute; con theo học như Nghệ sĩ Xu&acirc;n Hinh, NSND Ho&agrave;ng Dũng, &hellip;.<br />\r\n???C&ograve;n đợi chờ g&igrave; nữa, h&atilde;y đặt ngay h&ocirc;m nay để nhận trọn ưu đ&atilde;i.</p>\r\n', 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dethu`
--

CREATE TABLE `dethu` (
  `id` int(11) NOT NULL,
  `id_sub` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dethu`
--

INSERT INTO `dethu` (`id`, `id_sub`) VALUES
(1, 2),
(1, 1),
(1, 3),
(1, 2),
(1, 1),
(1, 5),
(5, 3),
(5, 0),
(5, 0),
(5, 0),
(5, 0),
(5, 0),
(2, 2),
(2, 3),
(2, 5),
(2, 3),
(2, 4),
(2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id_history` int(11) NOT NULL,
  `id_lesson` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id_history`, `id_lesson`, `date_time`, `id_user`) VALUES
(1, 5, '2019-12-04 08:00:30', 1),
(2, 6, '2019-12-04 08:00:38', 1),
(3, 7, '2019-12-04 08:00:49', 1),
(4, 7, '2019-12-04 08:01:37', 1),
(5, 7, '2019-12-04 08:11:44', 1),
(6, 7, '2019-12-04 08:12:38', 1),
(7, 7, '2019-12-02 08:12:42', 1),
(8, 7, '2019-12-04 08:24:01', 1),
(9, 60, '2019-12-04 09:15:59', 1),
(10, 61, '2019-12-04 09:16:01', 1),
(11, 62, '2019-12-04 09:21:11', 1),
(12, 36, '2019-12-04 10:36:30', 2),
(13, 36, '2019-12-04 10:36:36', 2),
(14, 36, '2019-12-04 10:53:14', 2),
(15, 81, '2019-12-04 13:11:09', 1),
(16, 88, '2019-12-04 13:11:13', 1),
(17, 88, '2019-12-04 13:11:17', 1),
(18, 5, '2019-12-04 13:11:44', 1),
(19, 5, '2019-12-04 13:11:53', 1),
(20, 17, '2019-12-04 13:11:56', 1),
(21, 5, '2019-12-07 07:57:32', 1),
(22, 5, '2019-12-07 07:59:05', 1),
(23, 5, '2019-12-07 07:59:30', 1),
(24, 5, '2019-12-07 07:59:42', 1),
(25, 5, '2019-12-07 08:00:21', 1),
(26, 5, '2019-12-07 08:00:36', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson`
--

CREATE TABLE `lesson` (
  `id_lesson` int(11) NOT NULL,
  `name_lesson` varchar(350) NOT NULL,
  `video` text NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lesson`
--

INSERT INTO `lesson` (`id_lesson`, `name_lesson`, `video`, `id_topic`) VALUES
(4, 'Làm chủ văn 2', '', 11),
(5, 'Bài 1: Thì hiện tại đơn', 'https://www.youtube.com/embed/o_kFRa6hc3A', 12),
(6, 'Bài 2: Thì hiện tại tiếp diễn', 'https://www.youtube.com/embed/o_kFRa6hc3A', 12),
(7, 'Bài 3: Thì hiện tại hoàn thành', 'https://www.youtube.com/embed/o_kFRa6hc3A', 12),
(8, 'Bài 4: Thì quá khứ đơn', 'https://www.youtube.com/embed/D-DOQ_28UD0', 12),
(9, 'Bài 5: Thì quá khứ tiếp diễn', 'https://www.youtube.com/embed/D-DOQ_28UD0', 12),
(10, 'Bài 6: Thì quá khứ hoàn thành', 'https://www.youtube.com/embed/D-DOQ_28UD0', 12),
(11, 'Bài 7: Thì tương lai đơn', 'https://www.youtube.com/embed/D-DOQ_28UD0', 12),
(12, 'Bài 8: Thì tương lại tiếp diễn', 'https://www.youtube.com/embed/D-DOQ_28UD0', 12),
(13, 'Bài 9: Thì tương lai hoàn thành', 'https://www.youtube.com/embed/D-DOQ_28UD0', 12),
(14, 'Bài 10: Thì tương lai hoàn thành tiếp diễn', 'https://www.youtube.com/embed/D-DOQ_28UD0', 12),
(15, 'Bài 11: Câu điều kiện loại 1', 'https://www.youtube.com/embed/hYq3X5LToOc', 13),
(16, 'Bài 12: Câu điều kiện loại 2', 'https://www.youtube.com/embed/Ah7EWHYNvyw', 13),
(17, 'Bài 13: Câu điều kiện loại 3', 'https://www.youtube.com/embed/uRlvlymPP1E', 13),
(18, 'Bài 14: Câu điều kiện 4', 'https://www.youtube.com/embed/uRlvlymPP1E', 13),
(19, 'Bài 16: Câu bị động 1', 'https://www.youtube.com/embed/voYiyn3Pazc', 14),
(20, 'Bài 17: Câu bị động 2', 'https://www.youtube.com/embed/voYiyn3Pazc', 14),
(21, 'Bài 18: Câu bị động 3', 'https://www.youtube.com/embed/voYiyn3Pazc', 14),
(22, 'Bài 19: Câu bị động 4', 'https://www.youtube.com/embed/voYiyn3Pazc', 14),
(23, 'Bài 20: Câu bị động 5', 'https://www.youtube.com/embed/wbmr7DPZsOg', 14),
(24, 'Bài 21: Câu bị động 6', 'https://www.youtube.com/embed/R-oUz0Ui0wY', 14),
(25, 'Bài 22: Liên từ 1', 'https://youtu.be/3EmxzfkE07o', 15),
(26, 'Bài 23: Liên từ 2', 'https://youtu.be/2twsBR7DYBg', 15),
(27, 'Bài 24: Liên từ 4', 'https://youtu.be/2twsBR7DYBg', 15),
(28, 'Bài 25 : Mệnh đề quan hệ 1', 'https://youtu.be/2twsBR7DYBg', 16),
(29, 'Bài 26: Mệnh đề quan hệ 2', 'https://youtu.be/2twsBR7DYBg', 16),
(30, 'Bài 27: Mệnh đề quan hệ 3', 'https://youtu.be/2twsBR7DYBg', 16),
(31, 'Bài 28: Mệnh đề quan hệ 4', 'https://youtu.be/2twsBR7DYBg', 16),
(32, 'Bài 32: Câu điều ước 1', 'https://youtu.be/93_sRvHHEo4', 17),
(33, 'Bài 33: Câu điều ước 2', 'https://youtu.be/93_sRvHHEo4', 17),
(34, 'Bài 34: Câu điều ước 3', 'https://youtu.be/93_sRvHHEo4', 17),
(35, 'Bài 35: Câu điều ước 4', 'https://youtu.be/93_sRvHHEo4', 17),
(36, 'Bài 1: Giới thiệu về hàm số mũ và logarit ', 'https://www.youtube.com/embed/gSu22ryO9eg', 18),
(37, 'Bài 2: Giới thiệu về hàm số mũ và logarit tiết 2', 'https://www.youtube.com/embed/gSu22ryO9eg', 18),
(38, 'Bài 3: Bài toán rút gọn sử dụng công thức hàm số logarit tiết 1', 'https://www.youtube.com/embed/eyB2ROFMcsk', 18),
(39, 'Bài 4: Bài toán rút gọn sử dụng công thức hàm số logarit tiết 2', 'https://www.youtube.com/embed/eyB2ROFMcsk', 18),
(40, 'Bài 5: Tính giá trị của biểu thức logarit theo tham số tiết 1', 'https://www.youtube.com/embed/_0yEhLune0A', 18),
(41, 'Bài 6: Tính giá trị của biểu thức logarit theo tham số tiết 2', 'https://www.youtube.com/embed/_0yEhLune0A', 18),
(42, 'Bài 7: Bài toán rút gọn sử dụng công thức hàm số logarit tiết 3', 'https://www.youtube.com/embed/_0yEhLune0A', 18),
(43, 'Bài 8: Khảo sát tính đơn điệu của hàm số', 'https://www.youtube.com/embed/joOjLN1Ocj4', 19),
(44, 'Bài 9: Tim tham số m để hàm số đơn điệu ', 'https://www.youtube.com/embed/joOjLN1Ocj4', 19),
(45, 'Bài 10: Trắc nhiệm tính đơn điệu của hàm sô', 'https://www.youtube.com/embed/L5dBIwglgPY', 19),
(46, 'Bài 11: Ứng dụng tính đơn điệu của hàm sô', 'https://www.youtube.com/embed/db6S7R_UkTo', 19),
(47, 'Bài 12: Phương trình tiếp tuyến p1', 'https://www.youtube.com/embed/s1yzAwbYB80', 20),
(48, 'Bài 13: Phương trình tiếp tuyến p2', 'https://www.youtube.com/embed/s1yzAwbYB80', 20),
(49, 'Bài 14: Phương trình tiếp tuyến p3', 'https://www.youtube.com/embed/s1yzAwbYB80', 20),
(50, 'Bài 15: Phương trình tiếp tuyến p5', 'https://www.youtube.com/embed/s1yzAwbYB80', 20),
(51, 'Bài 16: Phương trình tiếp tuyến p6', 'https://www.youtube.com/embed/s1yzAwbYB80', 20),
(52, 'Bài 17: Giới thiệu nguyên hàm tích phần và cơ bản', 'https://www.youtube.com/embed/s3Cwl_naSZI', 21),
(53, 'Bài 18: Nguyên hàm tích phân p1', 'https://www.youtube.com/embed/s3Cwl_naSZI', 21),
(54, 'Bài 19: Nguyên hàm tích phân p3', 'https://www.youtube.com/embed/s3Cwl_naSZI', 21),
(55, 'Bài 20: Nguyên hàm cơ bản p1', 'https://www.youtube.com/embed/s3Cwl_naSZI', 21),
(56, 'Bài 21: Nguyên hàm cơ bản p2', 'https://www.youtube.com/embed/s3Cwl_naSZI', 21),
(57, 'Bài 22: Nguyên hàm cơ bản p3', 'https://www.youtube.com/embed/s3Cwl_naSZI', 21),
(58, 'Bài 23: Nguyên hàm cơ bản p4', 'https://www.youtube.com/embed/s3Cwl_naSZI', 21),
(59, 'Bài 1: Chuyên Đề Hàm Số | Tìm Khoảng Đơn Điệu ', 'https://www.youtube.com/embed/IYB40UrPHSo', 22),
(60, 'Bài 2: Tìm m Để Hàm Đơn Điệu Trên TXĐ', 'https://www.youtube.com/embed/ZU9JQRK12fg', 22),
(61, 'Bài 3: Tìm m Để Hàm Đơn Điệu Trên Khoảng (a;b)', 'https://www.youtube.com/embed/gLWi1gfSdgI', 22),
(62, 'Bài 4: Tìm m Để Hàm Đơn Điệu Trên Đoạn Có Độ Dài L', 'https://www.youtube.com/embed/jXNNr4uIHxc', 22),
(63, 'Bài 5: Tìm Cực Đại Cực Tiểu Của Hàm Số ', 'https://www.youtube.com/embed/qJ7laLiUp-4', 23),
(64, 'Bài 6: Tìm m Để Hàm Số Đạt Cực Trị Tại Xo', 'https://www.youtube.com/embed/qJ7laLiUp-4', 23),
(65, 'Bài 7: Cực Trị Hàm Bậc Ba', 'https://www.youtube.com/embed/qJ7laLiUp-4', 23),
(66, 'Bài 8: Cực Trị Hàm Trùng Phương', 'https://www.youtube.com/embed/gxwhkgCfox0', 23),
(67, 'Bài 9: Min Max Của Hàm Không Chứa Tham Số ', 'https://www.youtube.com/embed/3upY5xQkTiM', 23),
(68, 'Bài 10 : Cực đại cực tiểu tổng kết', 'https://www.youtube.com/embed/3upY5xQkTiM', 23),
(69, 'Bài 11: Cực đại thêm', 'https://www.youtube.com/embed/D-DOQ_28UD0', 23),
(71, 'Bài 12: Phương Trình Bậc Nhất Theo Sin Và Cos', 'https://www.youtube.com/embed/qJ7laLiUp-4\"', 24),
(72, 'Bài 13: Phương Trình Đẳng Cấp Bậc Hai', 'https://www.youtube.com/embed/GgZlnQ_CneU', 24),
(73, 'Bài 14: Phương Trình Đối Xứng Theo Sin Và Cos', 'https://www.youtube.com/embed/D-DOQ_28UD0', 24),
(74, 'Bài 15: Tương giao hai đồ thị 1', 'https://www.youtube.com/embed/fM50rLFHc6g', 25),
(75, 'Bài 16: Tương giao hai đồ thị 2', 'https://www.youtube.com/embed/fM50rLFHc6g', 25),
(76, 'Bài 17: Tương giao hai đồ thị 3', 'https://www.youtube.com/embed/Vep3UIAEJpM', 25),
(77, 'Bài 18: Tương giao hai đồ thị 4', 'https://www.youtube.com/embed/Vep3UIAEJpM', 25),
(78, 'Bài 19: Tương giao hai đồ thị 5', 'https://www.youtube.com/embed/Vep3UIAEJpM', 25),
(79, 'Bài 20: Số phức cơ bản', 'https://www.youtube.com/embed/Vep3UIAEJpM', 26),
(80, 'Bài 21: Số phức cơ bản 2', 'https://www.youtube.com/embed/Vep3UIAEJpM', 26),
(81, 'Bài 1: Tây Tiến', 'https://www.youtube.com/embed/UzTMgmwULF4', 27),
(82, 'Bài 2: Việt Bắc', 'https://www.youtube.com/embed/UzTMgmwULF4', 27),
(83, 'Bài 3: Đất nước', 'https://www.youtube.com/embed/UzTMgmwULF4', 27),
(84, 'Bài 4: Tiếng hát con tàu', 'https://www.youtube.com/embed/UzTMgmwULF4', 27),
(85, 'Bài 5: Sóng', 'https://www.youtube.com/embed/UzTMgmwULF4', 27),
(86, 'Bài 7: Đàn ghi ta của Lor-ca', 'https://www.youtube.com/embed/UzTMgmwULF4', 27),
(87, 'Bài 8: Bắc ơi', 'https://www.youtube.com/embed/UzTMgmwULF4', 27),
(88, 'Bài 9: Ai đã đặt tên cho dòng sông', 'https://www.youtube.com/embed/ls2JvnPWr9s', 28),
(89, 'Bài 9: Ai đã đặt tên cho dòng sông', 'https://www.youtube.com/embed/ls2JvnPWr9s', 28),
(90, 'Bài 10: Người lái đò', 'https://www.youtube.com/embed/ls2JvnPWr9s', 28),
(91, 'Bài 11: Vợ chồng A Phủ', 'https://www.youtube.com/embed/R8qIJxFNS5Y', 29),
(92, 'Bài 12: Vợ Nhặt', 'https://www.youtube.com/embed/R8qIJxFNS5Y', 29),
(93, 'Bài 13: Chiếc thuyền ngoài xa', 'https://www.youtube.com/embed/R8qIJxFNS5Y', 29),
(94, 'Bài 14: Hồn trương ba da hàng thịt', 'https://www.youtube.com/embed/R8qIJxFNS5Y', 29),
(95, 'Bài 15: Những đưa con trong gia đình', 'https://www.youtube.com/embed/R8qIJxFNS5Y', 29),
(96, 'Bài 16: Rừng xà nu', 'https://www.youtube.com/embed/R8qIJxFNS5Y', 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `name_question` varchar(500) NOT NULL,
  `image` varchar(200) NOT NULL,
  `a` varchar(250) NOT NULL,
  `b` varchar(250) NOT NULL,
  `c` varchar(250) NOT NULL,
  `d` varchar(250) NOT NULL,
  `answer` varchar(10) NOT NULL,
  `level` int(11) NOT NULL,
  `id_subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`id_question`, `name_question`, `image`, `a`, `b`, `c`, `d`, `answer`, `level`, `id_subcategory`) VALUES
(1, 'Sáng tác của Nguyễn Ái Quốc, Hồ Chí Minh không bao gồm những thể loại nào trong các thể loại sau đây:', '', 'Văn chính luận.', 'Truyện kí.', 'Thơ ca.', 'Hò vè', 'd', 2, 2),
(2, ':Thể loại nào trong các thể loại văn học sau đây ra đời trong giai đoạn kháng chiến chống Pháp (1946 - 1954) ?', '', 'Truyện ngắn', 'Kí', 'Thơ', 'Truyện dài', 'b', 2, 2),
(3, 'Quê hương của Quang Dũng ở ?', '', 'Hà Nội', 'Hà Tây', 'Hà Nam', 'Hội An', 'b', 3, 2),
(4, 'Quang Dũng sinh năm nào ?', '', '1915', '1912', '1921', '1919', 'c', 3, 2),
(5, ' Đoàn quân Tây tiến được thành lập năm nào sau đây:', '', '1946', '1947', '1948', '1949', 'b', 3, 2),
(6, 'Cảm hứng chung của bài thơ Tây tiến là:', '', 'Bi', 'Hùng (hào hùng)', 'Bá đạo', 'Bi hùng', 'd', 1, 2),
(7, 'Bút pháp tiêu biểu của bài thơ Tây Tiến là:', '', 'Hiện thực', 'Lãng mạn', 'Hiện thực XHCN', 'Trào lộng\r\n', 'b', 1, 2),
(8, '<p>Hoạt động nghệ thuật của Nguyễn Đ&igrave;nh Thi nổi bật nhất ở lĩnh vực n&agrave;o ?</p>\r\n', '', 'Viết văn', 'Làm thơ', 'Soạn nhạc', 'Viết phê bình', 'b', 1, 2),
(9, '<p>B&agrave;i thơ Đất nước được in ở tập thơ n&agrave;o ?</p>\r\n', '', 'Bài thơ Hắc Hải.', 'Dòng sông trong xanh.', 'Tia nắng..', 'Người chiến sỹ.', 'd', 1, 2),
(10, 'Trong thơ Đất nước khi nói về mùa “thu nay” chủ thể trữ tình đứng ở đâu để bộc lộ cảm xúc ?', '', 'Phố phường Hà Nội.', 'Ở một nơi không xác định.', 'Miền đồi núi xa xôi.', 'Núi đồi chiến khu Việt Bắc.', 'd', 1, 2),
(11, 'Năm sinh, năm mất của nhà thơ Chế Lan Viên là năm nào sau đây:', '', '1920 - 1985', '1920 - 1989', '1925 - 1989', '1925 - 1985', 'c', 2, 2),
(12, '<p>The nurse is always kind and gentle to us. She is a very _________ person.</p>\r\n', '', 'caring', 'careful', 'careless', 'care', 'a', 3, 3),
(13, 'Tam is willing to help his mother with the household _________.', '', 'chord', 'chores', 'jobs', 'choir', 'a', 2, 3),
(14, 'hoir\r\n\r\n3. Phở, a kind of noodle, is one of her favourite _________ when she visits Vietnam.', '', 'courses', 'plates', 'bowls', 'dishes', 'c', 3, 3),
(19, '<pre>\r\nShe is ____ singer I have ever met.</pre>\r\n', '', 'worse', 'bad', 'the worst', 'badly', 'c', 2, 3),
(20, 'Mary is ....... responsible as Peter', '', 'more ', 'the most', 'much', 'as', 'd', 2, 3),
(21, 'It is ....... in the city than it is in the country.', '', 'noisily', 'more noisier ', 'noisier', 'noisy', 'c', 2, 3),
(22, 'She sings ........... among the singers I have known', '', 'the most beautiful     ', 'the most beautifully ', 'the more beautiful', 'the more beautifully', 'c', 2, 3),
(23, '<p>She is ....... student in my class.</p>\r\n', '', 'most hard-working ', 'more hard-working', 'as hard-working', ' the most hard-working', 'd', 2, 2),
(24, 'The English test was ....... than I thought it would be.', '', 'the easier ', 'more easy', 'easiest', 'easier', 'd', 2, 3),
(25, 'English is thought to be ....... than Math.', '', 'harder     ', 'the more hard', 'hardest', 'the hardest', 'a', 2, 3),
(26, 'Jupiter is ....... planet in the solar system.', '', 'the biggest', 'the bigger ', 'bigger ', 'biggest', 'a', 2, 3),
(27, 'She runs ...... in my class', '', 'the slowest ', 'the most slow', 'the slowly', ' the most slowly', 'd', 2, 3),
(28, 'My house is ....... hers.', '', 'cheap than  ', 'cheaper', 'more cheap than ', 'cheaper than', 'd', 2, 3),
(29, 'Her office is ....... away than mine', '', 'father  ', 'more far ', 'farther', 'farer', 'c', 2, 3),
(30, 'Tom is ....... than David.', '', 'handsome   ', 'more handsome ', 'the more handsome', ' the most handsome', 'c', 2, 3),
(31, 'He did the test ........... I did.', '', 'as bad as  ', 'adder than ', 'more badly than', 'worse than', 'd', 2, 3),
(32, 'A boat is ....... than a plane.', '', 'slower', 'slowest', 'more slow', 'more slower', 'a', 2, 3),
(33, ' My new sofa is ....... than the old one.', '', 'more comfortable   ', 'more comfortabler  ', 'comfortably', 'comfortable', 'a', 2, 3),
(34, 'My sister dances ........... than me.', '', 'gooder', 'weller ', ' better', 'more good', 'c', 1, 3),
(35, 'My bedroom is ....... room in my house.', '', 'tidier than ', 'the tidiest', 'the most tidy  ', 'more tidier', 'b', 1, 3),
(36, 'This road is ....... than that road.', '', 'narrow  ', ' the most narrow', 'more narrower', 'narrower', 'a', 1, 3),
(37, 'He drives ....... his brother.', '', 'more carefully than   ', 'more careful than     ', 'more carefully', 'as careful as', 'a', 3, 3),
(38, 'It was ....... day of the year.', '', 'the colder  ', 'the coldest', ' coldest ', 'colder', 'a', 1, 3),
(39, 'He failed in the election just because he ___________ his opponent.', '', 'overestimated ', 'underestimated', 'understated', 'undercharged', 'a', 1, 3),
(40, 'They ________because it is a national holiday.', '', 'don’t work', 'won’t work', 'haven’t worked ', 'aren’t working', 'a', 1, 3),
(41, 'She’s finished the course, ____________?', '', 'hasn’t she ', 'doesn’t she', 'didn’t she', 'isn’t she', 'a', 1, 3),
(42, '“Would you like a beer?” “ Not while I’m ___________”', '', 'in the act', 'in order ', 'on duty ', 'under control', 'a', 1, 3),
(43, 'Some friends of mine are really fashion-conscious, while __________ are quite simple.', '', 'some other', 'some others', 'anothers', 'the other', 'a', 1, 3),
(44, 'Eric is going to be very lonely living by himself in that remote area.', '', 'Eric will live by himself in that distant place and he will feel very lonely.', 'Eric enjoys being on his own, so living in that remote place won’t bother him much', 'That area is very far from the city, so Eric will be alone most of the time.', 'Remote areas are often lonely to live in, but Eric enjoys the solitude.', 'a', 1, 3),
(45, 'Having prepared for the worst, they were pleasantly surprised to find themselves bypassed by the\r\nhurricane.', '', 'Even if the hurricane had hit them, they wouldn’t have been affected much.', 'It was such a relief when the hurricane did not strike them, though they had prepared for the worst.', 'Had they not made such extensive preparations, they would have suffered even worse damage.', 'While they had made preparations for the hurricane, it was still a relief that they did not suffe damage.', 'a', 1, 3),
(46, ' …….what he says, he wasn’t even there when the crime was committed.', '', 'Following ', 'According to ', 'Hearing', 'meaning', 'a', 3, 3),
(47, 'he has impressed his employers considerably and …………he is soon to be promoted.', '', 'nevertheless  ', 'accordingly ', 'yet', 'eventually', 'a', 3, 3),
(48, 'He gave his listeners a vivid……….. of his journey through Peru.', '', 'account  ', 'tale   ', 'communication  ', 'plot', 'a', 3, 3),
(49, ' Will you be taking my precious experience into………… when you fix my salary?', '', 'possession', 'account', 'mind', 'scale', 'a', 3, 3),
(50, 'The policeman stopped him when he was driving home and…………. him of speeding.', '', 'charged ', 'accused ', 'blamed', 'arrested', 'a', 3, 3),
(51, 'He is very short: ________ sisters are taller.', '', 'both of them', 'his both', 'both his', 'the two both his', 'a', 3, 3),
(52, 'When ________ dinner.', '', 'have you', 'do you have', ' you have', 'you are having', 'a', 3, 3),
(53, 'Kate is the best ________ the three.', '', 'in', 'from', 'than', 'of', 'a', 3, 3),
(54, ' Are you ready? - ________.', '', 'Already not', 'Quite not', 'Yet not', 'Not yet', 'a', 3, 3),
(55, 'Leave your dirty shoes ________ the door.', '', 'out from', 'out', 'outside', 'out of', 'a', 3, 3),
(56, '<p>He________ swim very well.</p>\r\n', '', 'not can', 'cannot', 'doesnt can', 'dont can', 'a', 3, 3),
(57, '<p>His landlady doesn&#39;t ________ of his having parties.</p>\r\n', '', 'appreciate', 'support', ' approve', 'agree', 'a', 3, 3),
(58, '<p>Thế n&agrave;o l&agrave; luận cứ trong b&agrave;i văn nghị luận?</p>\r\n', '', 'Là ý kiến của người viết về vấn đề được bàn luận trong bài văn.', 'Là cách thức, phương pháp triển khai vấn đề trong bài văn.', 'Là những quan niệm, đánh giá của người viết về vấn đề được bàn luận.', 'Là các tài liệu dùng làm cơ sở thuyết minh luận điểm.', 'a', 3, 2),
(59, '<p>Nội dung quan trọng nhất trong văn bản &quot;Nhận đường&quot; (Nguyễn Đ&igrave;nh Thi) l&agrave; g&igrave;?</p>\r\n', '', 'Khẳng định giá trị của văn học nghệ thuật đối với cuộc sống.', 'Đề cao vai trò của quan điểm nghệ thuật trong sáng tác.', 'hẳng định văn nghệ sĩ phải phục vụ cuộc chiến đấu của dân tộc.', 'Ngợi ca những tác phẩm viết về cuộc kháng chiến chống Pháp.', 'a', 3, 2),
(60, '<p>Thế n&agrave;o l&agrave; luận chứng trong b&agrave;i văn nghị luận?</p>\r\n', '', 'Là cách phối hợp, tổ chức các lý lẽ và dẫn chứng để thuyết minh cho luận điểm.', 'Là cách sử dụng và phân tích dẫn chứng để làm sáng tỏ vấn đề cần bàn luận.', 'Là việc sử dụng kết hợp giữa lý lẽ và dẫn chứng thực tế để làm sáng tỏ vấn đề.', 'Là cách sử dụng và phân tích lý lẽ để làm sáng tỏ vấn đề cần bàn luận.', 'a', 3, 2),
(61, '<p>Quang Dũng viết b&agrave;i thơ&nbsp;<em>T&acirc;y Tiến</em>&nbsp;bằng b&uacute;t ph&aacute;p:</p>\r\n', '', 'hiện thực', 'lãng mạn', 'trào lộng', 'châm biếm, mỉa mai', 'a', 3, 2),
(62, '<p>B&agrave;i thơ&nbsp;<em>&quot;Đất nước&quot;</em>&nbsp;thể hiện những cảm nhận của Nguyễn Đ&igrave;nh Thi về:</p>\r\n', '', 'vẻ đẹp mùa thu Hà Nội những ngày đầu kháng chiến chống Pháp.', 'đất nước Việt Nam hiền hòa, đau thương nhưng quật khởi, hào hùng trong kháng chiến.', 'vẻ đẹp mùa thu Việt Bắc trong hiện tại miền Bắc giành được độc lập.', 'tội ác tày trời của kẻ thù và sức vùng dậy quật khởi của nhân dân ta.', 'a', 3, 2),
(63, '<p>Trong b&agrave;i thơ&nbsp;<strong>&quot;Đất nước&quot;</strong>&nbsp;của Nguyễn Đ&igrave;nh Thi, khi n&oacute;i về&nbsp;<strong>&quot;m&ugrave;a thu nay&quot;</strong>&nbsp;chủ thể trữ t&igrave;nh đứng ở đ&acirc;u để bộc lộ cảm x&uacute;c:</p>\r\n', '', 'Phố phường Hà Nội', 'Tây Ninh', 'Việt Bắc', 'Tây Bắc', 'a', 3, 2),
(64, '<p>C&acirc;u thơ n&agrave;o sau đ&acirc;y (tr&iacute;ch trong b&agrave;i &quot;T&acirc;y Tiến&quot; của Quang Dũng) thể hiện r&otilde; n&eacute;t nhất c&aacute;ch n&oacute;i vừa rất tự nhi&ecirc;n, hồn nhi&ecirc;n, vừa đậm chất l&iacute;nh?</p>\r\n', '', 'Mường lát hoa về trong đêm hơi.', 'Nhớ ôi Tây Tiến cơm lên khói.', 'Nhớ về rừng núi nhớ chơi vơi', 'Heo hút cồn mây súng ngửi trời.', 'a', 3, 2),
(65, '<p>C&oacute; thể cho rằng &quot;Việt Bắc l&agrave; kh&uacute;c h&ugrave;ng ca, kh&uacute;c t&igrave;nh ca về C&aacute;ch mạng, về cuộc kh&aacute;ng chiến v&agrave; con người kh&aacute;ng chiến&quot; v&igrave; b&agrave;i thơ đ&atilde;:</p>\r\n', '', 'ghi lại chặng đường Cách mạng và kháng chiến gian khổ mà anh hùng, nhất là tình nghĩa gắn bó thắm thiết của những người kháng chiến với Việt Bắc, với nhân dân đất nước.', 'ca ngợi Cách mạng, ca ngợi Đảng, ca ngợi Bác Hồ và tình nghĩa của nhân dân Việt Bắc.', 'miêu tả thành công bức tranh thiên nhiên và con người Việt Bắc trong kháng chiến.', 'thể hiện sâu sắc tình nghĩa thủy chung giữa người cán bộ Cách mạng với nhân dân Việt Bắc.', 'a', 3, 2),
(66, '<p>Việt Bắc l&agrave; một b&agrave;i thơ c&oacute; nghệ thuật biểu hiện đậm đ&agrave; t&iacute;nh d&acirc;n tộc bởi:</p>\r\n', '', 'hể thơ lục bát, kết cấu đối đáp giao duyên của ca dao.', 'ngôn ngữ thơ gần gũi lời ăn tiếng nói của nhân dân.', 'thể thơ lục bát, kết cấu đối đáp của ca dao, ngôn ngữ giàu hình ảnh và đậm sắc thái dân gian.', 'sử dụng nhiều ca dao, thành ngữ, tục ngữ', 'a', 3, 2),
(67, '<p>T&aacute;c phẩm&nbsp;<strong>&quot;Đất nước&quot;</strong>&nbsp;của Nguyễn Khoa Điềm vốn l&agrave;:</p>\r\n', '', 'Một đoạn trích trong trường ca \"Mặt đường khát vọng\"', 'ngôn ngữ thơ gần gũi với lời ăn tiếng nói của nhân dân', ' thể thơ đối đáp, kết cấu đối đáp của ca dao, ngôn ngữ giàu hình ảnh và đậm sắc thái dân gian.', 'sử dụng nhiều thành ngữ, ca dao, tục ngữ.', 'a', 3, 2),
(68, '<p>B&agrave;i thơ &quot;Ngồi buồn nhớ Mẹ ta xưa&quot; của Nguyễn Duy c&oacute; nội dung:</p>\r\n', '', 'kể về công ơn sinh thành, dưỡng dục của người mẹ.', 'ca ngợi đức hy sinh của người mẹ.', 'bộc lộ lòng biết ơn đối với người mẹ.', 'ca ngợi công ơn và tấm lòng yêu thương mênh mông, hy sinh tất cả vì con của người mẹ.', 'a', 2, 2),
(69, '<p>Phong c&aacute;ch ng&ocirc;n ngữ nghệ thuật được thể hiện ở những đặc trưng cơ bản n&agrave;o:</p>\r\n', '', 'Tính trừu tượng, tính truyền cảm, tính cá thể hóa.', 'Tính hình tượng, tính truyền cảm, tính cá thể hóa.', 'Tính truyền cảm, tính tượng hình, tính tượng thanh.', 'Tính tượng hình, tính tượng thanh, tính biểu cảm.', 'a', 3, 2),
(70, '<p>Chi tiết n&agrave;o sau đ&acirc;y&nbsp;<strong><em>kh&ocirc;ng ch&iacute;nh x&aacute;c</em></strong>&nbsp;khi giới thiệu về A Phủ(&quot;<em>Vợ chồng A Phủ&quot;</em>&nbsp;của T&ocirc; Ho&agrave;i):</p>\r\n', '', 'A Phủ là người yêu của Mị.', 'A Phủ khỏe, chạy nhanh như ngựa.', ' A Phủ cày giỏi và đi săn bò tót rất bạo.', 'A Phủ mồ côi, nghèo khổ và không thể lấy vợ.', 'c', 2, 2),
(71, '<p>B&agrave;i thơ&nbsp;<strong>&quot;Đất nước&quot;</strong>&nbsp;của Nguyễn Khoa Điềm ti&ecirc;u biểu cho giọng thơ n&agrave;o sau đ&acirc;y:</p>\r\n', '', 'Trữ tình - Chính trị.', 'Trữ tình - Triết lý.', 'Trữ tình - Chính luận.', 'Trữ tình - lãng mạn.', 'a', 2, 2),
(72, '<p>N&eacute;t đẹp nổi bật đ&aacute;ng tr&acirc;n trọng ở b&agrave; cụ Tứ (<strong>&quot;Vợ nhặt&quot;</strong>&nbsp;của Kim L&acirc;n) l&agrave;:</p>\r\n', '', 'chịu thương chịu khó.', 'cần mẫn lao động.', 'nhân hậu, giàu tình thương yêu.', 'giản dị, chất phác.', 'a', 2, 2),
(73, '<p>T&aacute;c phẩm n&agrave;o sau đ&acirc;y&nbsp;<strong>kh&ocirc;ng phải</strong>&nbsp;của Nguyễn Trung Th&agrave;nh?</p>\r\n', '', 'Đất nước đứng lên', 'Rừng xà nu', 'Đất Quảng', 'Bức thư Cà Mau', 'a', 2, 2),
(74, '<p>Cảm hứng của t&ugrave;y b&uacute;t&nbsp;<strong><em>S&ocirc;ng Đ&agrave;</em></strong>&nbsp;được khơi gợi từ:</p>\r\n', '', 'hiện thực cuộc kháng chiến chống Pháp ở Tây Bắc.', 'thực tiễn xây dựng cuộc sống mới ở Tây Bắc.', 'hình ảnh con sông Đà.', 'hình ảnh thiên nhiên Tây Bắc.', 'a', 2, 2),
(75, '<p>T&aacute;c phẩm n&agrave;o sau đ&acirc;y kh&ocirc;ng phải của H&ecirc;-ming-u&ecirc;?</p>\r\n', '', 'Tự do', 'Ông già và biển cả.', 'Chuông nguyện hồn ai.', 'Giã từ vũ khí.', 'a', 3, 2),
(76, '<p>T&aacute;c phẩm&nbsp;<strong>&quot;Thương nhớ mười hai&quot;</strong>&nbsp;của Vũ Bằng thuộc thể loại:</p>\r\n', '', 'Truyện ngắn', 'Hồi kí', 'Phóng sự', 'Bút kí- tùy bút.', 'a', 2, 2),
(77, '<p>Trong truyện ngắn&nbsp;<strong>&quot;Rừng x&agrave; nu&quot;</strong>, từ chủ đề, cốt truyện, b&uacute;t ph&aacute;p x&acirc;y dựng nh&acirc;n vật, tới giọng điệu v&agrave; ng&ocirc;n ngữ t&aacute;c phẩm đều được bao tr&ugrave;m &nbsp;bởi khuynh hướng s&aacute;ng t&aacute;c n&agrave;o?</p>\r\n', '', 'Lãng mạn', 'Hiện thực', 'Sử thi', 'Siêu thực', 'a', 2, 2),
(78, '<p>Trong t&aacute;c phẩm&nbsp;<strong>&quot;Những đứa con trong gia đ&igrave;nh&quot;</strong>&nbsp;của Nguyễn Thi, truyền thống n&agrave;o đ&atilde; gắn b&oacute; những con người trong gia đ&igrave;nh với nhau?</p>\r\n', '', 'Yêu nước, căm thù giặc, thủy chung son sắt với quê hương, cách mạng.', 'Giàu lòng căm thù giặc và yêu tha thiết quê hương, đất nước.', 'Đi theo cách mạng để bảo vệ gia đình, quê hương, đất nước.', 'Căm thù đối với tội ác tàn bạo mà giặc đã gây ra cho gia đình.', 'a', 2, 2),
(79, '<p>Nhận x&eacute;t n&agrave;o đ&uacute;ng về giọng điệu của hai c&acirc;u thơ n&oacute;i về sự gian khổ, khắc nghiệt của cuộc h&agrave;nh qu&acirc;n:<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&quot;Anh bạn d&atilde;i dầu kh&ocirc;ng bước nữa<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Gục l&ecirc;n s&uacute;ng mũ bỏ qu&ecirc;n đời&quot;<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &am', '', 'Giọng vừa xót xa, vừa cứng cỏi, ngang tàng.', 'Giọng lâm li, chua chát và chán chường..', 'Giọng đùa vui, cố giấu nỗi buồn đau, tê tái.', 'Giọng điệu khách quan, rất thờ ơ, lạnh lùng.', 'a', 2, 2),
(80, '<p>H&igrave;nh ảnh n&agrave;o sau đ&acirc;y c&oacute; trong b&agrave;i thơ&nbsp;<em>&quot;Việt Bắc&quot;</em>&nbsp;<strong>kh&ocirc;ng thể hiện</strong>&nbsp;n&eacute;t ri&ecirc;ng của con người Việt Bắc?</p>\r\n', '', 'Người mẹ địu con lên rẫy.', 'Cô gái hái măng giữa rừng.', 'Dân công đỏ đuốc từng đoàn.', 'Con người với \"dao gài thắt lưng\" khi đi rừng, đi rẫy.', 'a', 2, 2),
(81, '<p>Trong b&agrave;i thơ &quot;S&oacute;ng&quot;, Xu&acirc;n Quỳnh đ&atilde; kh&aacute;i qu&aacute;t được những đặc điểm, cũng l&agrave; phẩm chất cao đẹp của t&igrave;nh y&ecirc;u đ&iacute;ch thực l&agrave;:</p>\r\n', '', 'Hồn nhiên, tha thiết, thủy chung, giàu niềm tin và khát vọng.', 'Tha thiết, nồng nàn, thủy chung son sắt, tin yêu tuyệt đối.', 'E ấp, kín đáo, hồn nhiên, chung thủy sắt son.', 'Mạnh mẽ, mãnh liệt, thủy chung, giàu khát vọng.', 'a', 2, 2),
(82, '<p>H&igrave;nh tượng s&oacute;ng trong b&agrave;i thơ&nbsp;<strong>&quot;S&oacute;ng&quot;</strong>&nbsp;được x&acirc;y dựng theo hướng ph&aacute;t triển:</p>\r\n', '', 'biểu hiện trái ngược nhau -> con sóng nhớ bờ -> muốn ra bể -> con nào chẳng tới bờ -> muốn tan thành trăm con sóng nhỏ...', 'sóng nhớ bờ -> muốn ra bể -> biểu hiện trái ngược nhau -> con nào chẳng tới bờ ...', 'sóng nhớ bờ -> biểu hiện trái ngược nhau -> muốn ra bể - con nào chẳng tới bờ ...', 'biểu hiện trái ngược nhau -> muốn ra bể -> con sóng nhớ bờ -> con sóng chẳng tới bờ -> muốn tan thành trăm con sóng nhỏ ...', 'a', 2, 2),
(83, '<p>Chất suy tưởng triết l&yacute; v&agrave; sự đa dạng phong ph&uacute; của thế giới h&igrave;nh ảnh thơ l&agrave; n&eacute;t phong c&aacute;ch nổi bật nhất của nh&agrave; thơ n&agrave;o sau đ&acirc;y:</p>\r\n', '', 'Tố Hữu', 'Nguyễn Đình Thi', 'Chế Lan Viên', 'Hoàng Cầm', 'a', 1, 2),
(84, '<p>&Yacute; n&agrave;o sau đ&acirc;y&nbsp;<strong>kh&ocirc;ng</strong>&nbsp;nằm trong mạch suy nghĩ v&agrave; cảm x&uacute;c của Nguyễn Khoa Điềm về đất nước:</p>\r\n', '', 'Đất nước gần gũi, thân thích, bình dị trong cuộc sống hàng ngày của con người.', 'Đất nước là sự hội tụ của các bình diện lịch sử - văn hóa -địa lý.', 'Đất nước là của nhân dân, do nhân dân làm ra.', 'Đất nước với những đau thương mất mát trong chiến tranh và ngời sáng trong tương lai.', 'a', 1, 2),
(85, '<p>C&acirc;u n&agrave;o trong những c&acirc;u sau l&agrave; c&acirc;u c&oacute; khởi ngữ?</p>\r\n', '', 'Học tập đối với tôi là vấn đề quan trọng nhất.', 'Học tập là mục đích của tôi.', 'Đối với tôi, học tập là quan trọng nhất.', 'Quan trọng nhất đối với tôi là học tập.', 'a', 1, 2),
(86, '<p>Trong c&aacute;c văn bản sau, văn bản n&agrave;o thuộc loại văn bản ch&iacute;nh luận?</p>\r\n', '', '\"Nhận đường\" của Nguyễn Đình Thi.', ' \"Tuyên ngôn độc lập\" của Hồ Chí Minh.', ' \"Luận về một chính sách khai hóa\" của Phan Chu Trinh.', '\"Một thời đại trong thi ca\" của Hoài Thanh.', 'a', 1, 2),
(87, '<p>C&acirc;u n&agrave;o sau đ&acirc;y thuộc kiểu c&acirc;u bị động?</p>\r\n', '', 'Dầu lửa mới chỉ được sử dụng từ giữa thế kỷ XIX.', 'Người ta sử dụng dầu lửa bắt đầu từ giữa thế kỷ XIX.', 'Sử dụng dầu lửa là một phát minh của khoa học.', 'Việc sử dụng dầu lửa đem lại nhiều lợi ích.', 'a', 1, 2),
(88, '<p>Trong b&agrave;i văn nghị luận, khi dẫn luận cứ phải biết:</p>\r\n', '', 'Phân tích, bình luận luận cứ để làm sáng tỏ luận điểm.', 'Hướng vào luận điểm của bài văn.', 'Chọn những luận cứ thực tế hoặc những luận cứ lí lẽ.', 'Chọn những luận cứ hấp dẫn, độc đáo, tiêu biểu.', 'a', 1, 2),
(89, '<p>Trong c&aacute;c c&acirc;u thơ: &quot;S&oacute;ng t&igrave;m ra tận bể - &Ocirc;i con s&oacute;ng nhớ bờ.&quot;, Xu&acirc;n Quỳnh đ&atilde; vận dụng biện ph&aacute;p tu từ n&agrave;o sau đ&acirc;y:</p>\r\n', '', 'ẩn dụ', 'hoán dụ', 'nhân hóa', 'so sánh', 'a', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `result_test`
--

CREATE TABLE `result_test` (
  `id_result` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_test` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `result_test`
--

INSERT INTO `result_test` (`id_result`, `id_user`, `id_test`, `point`) VALUES
(9, 1, 13, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name_role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id_role`, `name_role`) VALUES
(1, 'Người dùng '),
(100, 'Quản trị\r\n');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `logo` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `sdt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`logo`, `email`, `sdt`) VALUES
('logo.png', 'hochieu@gmail.com', 839271932);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `share`
--

CREATE TABLE `share` (
  `id_share` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `share`
--

INSERT INTO `share` (`id_share`, `id_user`, `content`, `status`, `date_time`) VALUES
(15, 1, 'Thank you\r\n', 1, '0000-00-00 00:00:00'),
(16, 1, 'Thank you\r\n', 2, '0000-00-00 00:00:00'),
(17, 1, 'Ahihi', 0, '2019-11-30 00:00:00'),
(18, 1, 'Em theo học cô Lanh cả 3 năm học THPT, nhờ cô mà em có định hướng rõ ràng trong cuộc sống, phát triển toàn diễn cả về kiến thức và kỹ năng sống. Kết quả thi THPTQG em đạt 8.4 môn Toán và đỗ vào ĐH KTQD ', 2, '2019-11-30 08:52:45'),
(19, 2, '“Các khóa học trên website rất bổ ích, giúp em có nhiều thêm kỹ năng sống làm việc. Em cảm thấy rất tự tin và luôn tràn đầy năng lượng”', 2, '2019-11-30 14:23:39'),
(20, 3, '\"Với những bài giảng và định hướng mục tiêu điểm số rõ ràng đã giúp con đỗ Đh Y Hà Nội thật tuyệt vời \"', 2, '2019-11-30 14:28:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide_advert`
--

CREATE TABLE `slide_advert` (
  `id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide_advert`
--

INSERT INTO `slide_advert` (`id`, `image`, `title`, `link`) VALUES
(1, 'THPT_FPT_tuyen_sinh1.jpg', 'Học mọi lúc mọi nơi ', ''),
(2, '2.png', '', 'chitietkhoahoc.php?idkh=7'),
(3, 'advert.png', '', ''),
(4, 'advert2.png', '', ''),
(5, '1.jpg', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subcategory`
--

CREATE TABLE `subcategory` (
  `id_subcategory` int(11) NOT NULL,
  `name_subcategory` varchar(200) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `subcategory`
--

INSERT INTO `subcategory` (`id_subcategory`, `name_subcategory`, `id_category`) VALUES
(1, 'Toán', 2),
(2, 'Văn', 2),
(3, 'Anh', 2),
(4, 'Lý ', 2),
(5, 'Hóa', 2),
(6, 'Sinh', 2),
(7, 'Toán', 3),
(8, 'Văn', 3),
(9, 'Anh', 3),
(10, 'Lý', 3),
(11, 'Hóa', 3),
(12, 'Sinh', 3),
(13, 'Toán', 4),
(14, 'Văn', 4),
(15, 'Anh', 4),
(16, 'Lý', 4),
(17, 'Hóa', 4),
(18, 'Sinh', 4),
(19, 'Thể dục ', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `id_teacher` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `infomation` text NOT NULL,
  `phone_numbers` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` int(11) NOT NULL,
  `specialize` varchar(100) NOT NULL,
  `image` varchar(250) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `workplace` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`id_teacher`, `name`, `birthday`, `infomation`, `phone_numbers`, `email`, `address`, `gender`, `specialize`, `image`, `degree`, `workplace`) VALUES
(1, 'Nguyễn Thị Lanh', '1970-05-02', '    <p style=\"font-size=:12px\">Phương pháp dạy học tiên tiến, giúp học sinh hiểu nhanh, nhớ lâu, phát huy tính sáng tạo, và khả năng xử lý từ phức tạp thành đơn giản.                                                                     \r\n Đặc biệt truyền cảm hứng để học sinh phát huy khả năng chủ động tìm tòi học hỏi.</p>\r\n\r\n<p>Cô đã giúp hàng nghìn học sinh thi đỗ vào các trường đại học top đầu như Đh Kinh Tế Quốc Dân, Đại Học Ngoại Thương, Học Viện Hậu Cần, Học Viện An Ninh....</p>\r\n																												', 2147483647, 'giaolanh@gmail.com', 'A9 - Kim mã - Hà nội', 2, 'Toán', 'colanh.jpg', 'Thạc Sĩ', 'Trường THPT Chu Văn An'),
(2, 'Vũ Phương Mai', '1970-10-10', '<p>C&ocirc; l&agrave; người lu&ocirc;n t&iacute;ch cực giảng dạy v&agrave; đạt được nhiều th&agrave;nh t&iacute;ch trong nghề.&nbsp;Năm 2017<strong> </strong>c&ocirc; đ&atilde; xuất bản s&aacute;ch TOEIC cho người Việt Nam gi&uacute;p cho nhiều bạn trẻ hiểu r&otilde; hơn v&agrave; nắm bắt kiến thức tiếng anh một c&aacute;ch dễ d&agrave;ng</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 2147483647, 'phuongmai@gmail.com', 'Cầu giấy - Hà Nội', 2, 'Tiếng Anh', 'comaiphuong.png', 'Thạc Sĩ', 'Trường THPT Chuyên Bắc Ninh'),
(3, 'Nguyễn Quốc Chí', '1980-05-10', '<p>Gi&aacute;o vi&ecirc;n đầu ti&ecirc;n tại H&agrave; Nội luyện thi v&agrave;o ĐH Quốc Gia v&agrave; thi đ&aacute;nh gi&aacute; năng lực ĐH Quốc Gia HN với số điểm tuyệt đối.</p>\r\n', 932198214, 'quocchi@gmail.com', 'Thanh xuân - Đống đa - Hà nội', 1, 'Toán', 'thayquocchi.png', 'Thạc Sĩ', 'Trường THPT Chu Văn An'),
(4, 'Đinh Tiến Nguyện', '1981-05-15', '<p>Mặc d&ugrave; tuổi đời c&ograve;n rất trẻ nhưng với&nbsp;kiến thức chuy&ecirc;n m&ocirc;n vững chắc, sự tự tin, lối giảng b&agrave;i cuốn h&uacute;t, c&oacute; hồn xen lẫn sự h&agrave;i hước d&iacute; dỏm<strong>&nbsp;</strong>đ&atilde; được c&aacute;c trung t&acirc;m luyện thi lớn nhất H&agrave; Nội như TT. Đa Minh (ĐHBKHN), Trung t&acirc;m Xu&acirc;n Thủy (ĐH Dược), TT Học M&atilde;i Đống Đa&hellip; mời về l&agrave;m gi&aacute;o vi&ecirc;n luyện thi ch&iacute;nh.</p>\r\n', 932184412, 'tiennguyen@gmail.com', 'Đống đa- Hà Nội', 1, 'Toán', 'thaytiennguyen.jpg', 'Thạc Sĩ', 'Trường THPT Chu Văn An'),
(5, 'Phạm Minh Nhật', '1990-05-05', '        <p>Thầy Phạm Minh Nhật Là một trong số những giáo viên nổi tiếng luyện thi môn Ngữ Văn, có hàng nghìn học trò theo học mỗi năm. Thầy là giáo viên tâm huyết yêu nghề với 9 năm liên tiếp đoán trúng đề thi ĐH.                  </p>\r\n\r\n<p>Với phương châm điều quan trọng nhất là truyền được cảm hứng và khơi dậy năng khiếu văn chương ở học trò. Thầy luôn giúp các bạn nhỏ thêm yêu thích những tác phẩm văn học và hiểu được trọn vẹn giá trị của chúng.</p>\r\n																																																								', 948324325, 'phamminhnhat@gmail.com', 'Đống đa - Thanh Xuân - Hà Nội', 1, 'Văn', 'thayminhnhat.jpg', 'Cử Nhân', 'THPT Chuyên Hà Nội');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

CREATE TABLE `test` (
  `id_test` int(11) NOT NULL,
  `name_test` varchar(500) NOT NULL,
  `time_test` int(11) NOT NULL,
  `id_subcategory` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`id_test`, `name_test`, `time_test`, `id_subcategory`) VALUES
(11, 'Đề kiểm tra 15 phút giữa kì ', 15, 2),
(12, 'Đề kiểm tra 45 phút kì 1', 45, 3),
(13, 'Đề thi số 1', 45, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test_question`
--

CREATE TABLE `test_question` (
  `id_test` int(11) NOT NULL,
  `id_question` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `test_question`
--

INSERT INTO `test_question` (`id_test`, `id_question`) VALUES
(11, 1),
(11, 4),
(11, 63),
(11, 75),
(11, 58),
(11, 82),
(11, 2),
(11, 70),
(11, 68),
(11, 71),
(11, 87),
(11, 84),
(11, 10),
(11, 6),
(11, 88),
(12, 14),
(12, 47),
(12, 57),
(12, 48),
(12, 53),
(12, 55),
(12, 46),
(12, 12),
(12, 52),
(12, 49),
(12, 50),
(12, 51),
(12, 54),
(12, 37),
(12, 56),
(12, 19),
(12, 26),
(12, 30),
(12, 32),
(12, 21),
(12, 24),
(12, 22),
(12, 28),
(12, 13),
(12, 33),
(12, 29),
(12, 31),
(12, 27),
(12, 20),
(12, 25),
(12, 41),
(12, 38),
(12, 42),
(12, 34),
(12, 36),
(12, 35),
(12, 43),
(12, 39),
(12, 45),
(12, 44),
(13, 60),
(13, 75),
(13, 62),
(13, 61),
(13, 66),
(13, 5),
(13, 59),
(13, 58),
(13, 64),
(13, 67),
(13, 65),
(13, 3),
(13, 4),
(13, 69),
(13, 63),
(13, 80),
(13, 70),
(13, 79),
(13, 73),
(13, 1),
(13, 2),
(13, 77),
(13, 82),
(13, 74),
(13, 11),
(13, 76),
(13, 23),
(13, 71),
(13, 78),
(13, 81),
(13, 87),
(13, 9),
(13, 10),
(13, 88),
(13, 8),
(13, 83),
(13, 89),
(13, 6),
(13, 7),
(13, 84);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topic`
--

CREATE TABLE `topic` (
  `id_topic` int(11) NOT NULL,
  `name_topic` varchar(500) NOT NULL,
  `id_course` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `topic`
--

INSERT INTO `topic` (`id_topic`, `name_topic`, `id_course`) VALUES
(11, 'Tích Phân', 3),
(12, 'Các thì tiếng anh cơ bản ', 4),
(13, 'Câu Điều Kiện', 4),
(14, 'Câu Bị Động', 4),
(15, 'Liên Từ', 4),
(16, 'Mệnh Đề Quan Hệ', 4),
(17, 'Câu Điều Ước', 4),
(18, 'Hàm số mũ và logarit', 5),
(19, 'Hàm số', 5),
(20, 'Phương trình tiếp tuyến', 5),
(21, 'Nguyên hàm', 5),
(22, 'Hàm Số', 6),
(23, 'Cực đại - Cực tiểu', 6),
(24, 'Lượng Giác', 6),
(25, 'Tương giao đồ thị', 6),
(26, 'Số phức', 6),
(27, 'Tác phẩm thơ kì 1 lớp 12', 7),
(28, 'Tác phẩm văn suôi kì 1', 7),
(29, 'Tác phẩm văn suôi kì 2', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone_numbers` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `name`, `phone_numbers`, `email`, `birthday`, `address`, `gender`, `image`, `role_id`, `status`) VALUES
(1, 'moimoi', '$2y$10$Achin4YMtF9E4qZWia0Jw.c0Y8ypgSuZrbWXXUcmAJ4dMr0NcJlDy', 'Văn Thành', 917483647, 'nva@mail.com', '2001-05-05', 'Kim Mã -Hà Nội', 1, '1.png', 100, 1),
(2, 'ngocvananh', '$2y$10$KEIUVOCEArhPzREo5/bjFOLFVm6.Gxd9YASAk0m58J8w6k/HRTYJq', 'Ngọc Anh', 921482147, 'vananh@gmail.com', '2000-05-05', 'Kim Mã -Hà Nội', 2, '3.jpg', 1, 1),
(3, 'ngocmyduyen', '$2y$10$D6ZuXJuQsmjGcko.iTSBI.hyrZp1ApFpzr7wqqD9yqelyDLF90tZG', 'Mỹ Duyên', 2147483647, 'myduyen@gmail.com', '2001-05-05', 'Kim Mã -Hà Nội', 2, 'anhmoi.jpg', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_course`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id_history`);

--
-- Chỉ mục cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id_lesson`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Chỉ mục cho bảng `result_test`
--
ALTER TABLE `result_test`
  ADD PRIMARY KEY (`id_result`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Chỉ mục cho bảng `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`id_share`);

--
-- Chỉ mục cho bảng `slide_advert`
--
ALTER TABLE `slide_advert`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id_subcategory`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id_teacher`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id_test`);

--
-- Chỉ mục cho bảng `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id_course` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id_lesson` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `result_test`
--
ALTER TABLE `result_test`
  MODIFY `id_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `share`
--
ALTER TABLE `share`
  MODIFY `id_share` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id_subcategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id_teacher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `test`
--
ALTER TABLE `test`
  MODIFY `id_test` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
