-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 05, 2022 lúc 11:17 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tuyendung_backup`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_phone` int(11) DEFAULT NULL,
  `admin_adress` varchar(255) DEFAULT NULL,
  `admin_image` varchar(255) DEFAULT NULL,
  `admin_status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`, `admin_adress`, `admin_image`, `admin_status`) VALUES
(1, 'Trần Tất Thành', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 869984922, 'TP.Tam Điệp,T.Ninh Bình', NULL, NULL),
(2, 'Thanh', 'thanh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '', '', NULL),
(3, '', 'admin1@gmail.com', '123456', NULL, NULL, NULL, NULL),
(4, 'Trần Tất Thành', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 869984922, 'Tam Điệp,Ninh Bình', NULL, NULL),
(13, 'thanh', 'testvalidate@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 0),
(14, 'Nguyễn Hồ Ca', 'hoca@gmail.com', '25d55ad283aa400af464c76d713c07ad', 869984922, 'Hà Nam', NULL, 1),
(15, 'Nguyễn Văn Linh', 'lingnguyen12@gmail.com', '25d55ad283aa400af464c76d713c07ad', 536987450, 'Tam Điệp, Ninh Bình', NULL, 0),
(16, 'Trần Văn Khanh', 'khanhtran0303@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apply_job`
--

CREATE TABLE `apply_job` (
  `id_apply_job` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `create_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `apply_job`
--

INSERT INTO `apply_job` (`id_apply_job`, `id_job`, `id_user`, `create_at`) VALUES
(1, 1, 1, '2022-06-02'),
(2, 1, 2, '2022-05-27'),
(3, 8, 5, '2022-06-01'),
(5, 7, 5, '2022-05-30'),
(6, 1, 5, '2022-05-25'),
(8, 8, 2, '2022-05-31'),
(9, 11, 1, NULL),
(10, 10, 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_status` int(11) DEFAULT NULL,
  `category_desc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `category_name`, `category_status`, `category_desc`) VALUES
(1, 'Công nghệ thông tin', 1, '<p>content after changed</p>'),
(2, 'Cơ khí', 0, 'content'),
(5, 'Marketing', 1, '<p>content</p>\r\n\r\n<p>content</p>'),
(6, 'Bảo hiểm', 1, NULL),
(7, 'Bất động sản', 1, NULL),
(8, 'Du lịch', 1, NULL),
(10, 'IT phần mềm', 1, '<p>Thuộc lĩnh vực công nghệ thông tin, bao gồm các các công việc</p>\r\n\r\n<p>liên quan xây dựng website, mobile app...</p>'),
(11, 'Kế toán', 1, NULL),
(12, 'Xuất nhập khẩu', 1, NULL),
(13, 'Xây dựng', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_desc` text NOT NULL,
  `company_image` varchar(255) DEFAULT NULL,
  `company_adress` varchar(255) DEFAULT NULL,
  `company_status` int(11) DEFAULT NULL,
  `company_introduce` text DEFAULT NULL,
  `outstanding` int(11) DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `company_staff` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_desc`, `company_image`, `company_adress`, `company_status`, `company_introduce`, `outstanding`, `company_logo`, `company_staff`) VALUES
(1, 'suzuki', '<p>ere and adn adnsd asdasd asdasd asdasdasd asdsad sdsdad asdasd asdasd asdasd sad sad sad asd asd asdasd asds ds d sad asd</p>\r\n\r\n<p>thành lập từ năm 2013 đến nay đặt được nhiều</p>\r\n\r\n<p>thành tích cao trong công nghệ.</p>', 'hinh-nen-among-us-2003.jpg', 'số 4, Cầu giấy, Hà Nội', 1, NULL, NULL, NULL, NULL),
(3, 'IKa', '<p>Công ty Ika</p>\r\n\r\n<p>Do nhà sáng lập trần Tất Thành</p>\r\n\r\n<p>mục đích để test ckeditor.</p>', 'hinh-nen-among-us-2003.jpg', 'Ngõ 8, Nguyễn Văn Lộc', 1, NULL, NULL, NULL, NULL),
(14, 'demo thôi', '<p>ere and adn adnsd asdasd asdasd asdasdasd asdsad sdsdad asdasd asdasd asdasd sad sad sad asd asd asdasd asds ds d sad asd</p>\r\n\r\n<p>Do Trần Tất Thành sáng lập để demo</p>\r\n\r\n<p>ok chưa.</p>', 'hinh-nen-among-us-2003.jpg', 'Số 4, Dịch vọng hậu,Hà Nội', 1, NULL, NULL, NULL, NULL),
(16, 'SamSung', '<p>Công ty này để test</p>\r\n\r\n<p>Ok không</p>', 'samsung.jpg', '12 Bắc Ninh', 1, NULL, 1, 'samsung.jpg', 235),
(17, 'FPT', '<p>FPT Software là tên gọi khác của công ty TNHH Phần Mềm FPT với nhiệm vụ chính là gia công phần mềm tại Việt Nam và nước ngoài.</p>\r\n\r\n<p>FPT Software theo đuổi mục tiêu gia công phần mềm để đáp ứng cho nhu cầu phát triển CNTT của các hãng phần mềm trong nước,</p>\r\n\r\n<p>các công ty lớn trong nước và tham vọng hơn là xuất khẩu phần mềm trên toàn thế giới cho các công ty nước ngoài biết đến tập đoàn FPT,</p>\r\n\r\n<p>mục đích chính là vươn đến tầm cao mới thông qua công nghệ nhằm nâng cao năng suất lao động.</p>', 'fptsotfware5.jpg', 'Công viên hòa bình', 1, NULL, 1, 'anhdemo.jpg', NULL),
(18, 'test ne', '<p>test ne</p>', 'hinh-nen-among-us-20076.jpg', 'test ne', 2, NULL, NULL, NULL, NULL),
(19, 'ADAMO', '<p>Adamo là công ty phát triển phần mềm, gia công ứng dụng CNTT quốc tế tại Việt Nam. Hiện Adamo cung cấp các dịch vụ phát triển ứng dụng điện thoại thông minh và giải pháp cho khách hàng tại Mỹ, châu Âu, Úc và Singapore.</p>\r\n\r\n<p>Tại Adamo Digital, mục tiêu của chúng tôi là phát triển ứng dụng di động và giải pháp website đáp ứng nhu cầu của khách hàng đồng thời tạo ra trải nghiệm tuyệt vời cho người dùng cuối. Chúng tôi chuyển đổi ý tưởng kinh doanh của khách hàng thành các sản phẩm thiết thực và hiệu quả.</p>', 'adamo-logo.jpg', 'Tầng 03, Tòa nhà Goldseason, 47 Nguyễn Tuân, Thanh Xuân, Hà Nội', 1, NULL, 1, 'adamo.png', 70);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_job`
--

CREATE TABLE `detail_job` (
  `id_detail_job` int(11) NOT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_job` int(11) NOT NULL,
  `detail_job_desc` varchar(2000) NOT NULL,
  `detail_job_request` varchar(2000) NOT NULL,
  `detail_job_salary` int(11) DEFAULT NULL,
  `detail_job_status` int(11) DEFAULT NULL,
  `detail_job_duration` date DEFAULT NULL,
  `salary_up` int(11) NOT NULL,
  `salary_down` int(11) NOT NULL,
  `experience` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `detail_job`
--

INSERT INTO `detail_job` (`id_detail_job`, `id_company`, `id_job`, `detail_job_desc`, `detail_job_request`, `detail_job_salary`, `detail_job_status`, `detail_job_duration`, `salary_up`, `salary_down`, `experience`) VALUES
(1, 14, 1, 'Công ty MISA tuyển dụng 25 thực tập sinh PHP', 'Tiếng Anh đọc hiểu tài liệu', 3000000, 0, '2022-04-23', 1000000, 5000000, 2),
(2, 1, 3, '<p>1. Số lượng tuyển dụng 25 kế toán</p>\r\n<p>1. Số lượng tuyển dụng 25 kế toán</p>\r\n<p>1. Số lượng tuyển dụng 25 kế toán</p>\r\n<p>1. Số lượng tuyển dụng 25 kế toán</p>', '<p>1. Số lượng tuyển dụng 25 kế toán</p>\r\n<p>1. Số lượng tuyển dụng 25 kế toán</p>', 3000000, 1, '2022-04-21', 1000000, 3000000, 1),
(3, 3, 7, '<p>1. Được đào tạo 2 tháng về magento, shopify....</p>\r\n\r\n<p>2. Sau 1 tháng đầu tiên ứng viên sẽ được training on job, hưởng chế độ đầy đủ của nhận viên thử việc (hưởng 80% lương nhân viên chính thức) 4tr8.</p>\r\n\r\n<p>3. Team building 2 lần/năm</p>', '<p>1. Thành thạo HTML, CSS, JS<br />\r\n2. Biết PHP là một lợi thế</p>', 3000000, 0, '2022-05-14', 1000000, 3000000, 1),
(4, 16, 8, '<p>Đây là content</p>', '<p>Đây là content</p>', 0, 0, '2022-06-04', 1000000, 3000000, NULL),
(6, 17, 10, '<p><strong>- Phụ trách kịch bản video / content guideline cho KOLs (KOls là người nổi tiếng, người có tầm ảnh hưởng) đang hợp tác truyền thông cho sản phẩm Edupia</strong><br />\r\n<strong>- Triển khai các nội dung quảng cáo khác ( FB, Google....)</strong><br />\r\n<strong>- Check duyệt và chỉnh sửa nội dung đảm bảo KOLs truyền tải đúng thông điệp sản phẩm&nbsp;</strong><br />\r\n- Phối hợp cùng team KOLs / Design đảm bảo chất lượng và tiến độ triển khai<br />\r\n- Phối hợp xây dựng big idea, nội dung chi tiết cho campaign chung của team&nbsp;</p>', '<p>1. Tốt nghiệp các trường đại học chuyên ngành marketing.</p>\r\n\r\n<p>2. Có thểm làm fulltime từ từ 2 đến thứ 6.</p>', 0, 0, '2022-05-28', 3000000, 6000000, 1),
(7, 19, 11, '1. Được training 2 tháng cho nhân viên thử việc.\r\n2. Đạo tạo viết content, marketing chuyên nghiệp.', '1. Ứng viên có thể làm fulltime từ thứ 2 đến thứ 6.\r\n2. Tốt nghiệp đại học khối ngành marketing.\r\n3. Đã có kinh nghiệm làm marketing là một lợi thế.', NULL, NULL, '2022-06-04', 10000000, 7000000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail_roles`
--

CREATE TABLE `detail_roles` (
  `id_detail_roles` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `detail_roles`
--

INSERT INTO `detail_roles` (`id_detail_roles`, `admin_id`, `roles_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(5, 4, 2),
(3, 14, 2),
(4, 15, 2),
(6, 16, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `distribution`
--

CREATE TABLE `distribution` (
  `id_distribution` int(11) NOT NULL,
  `distribution_name` varchar(255) NOT NULL,
  `distribution_status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `distribution`
--

INSERT INTO `distribution` (`id_distribution`, `distribution_name`, `distribution_status`, `image`) VALUES
(1, 'Hà Nội', 1, 'pic1.jpg\r\n'),
(2, 'TP.Hồ Chí Minh', 1, 'pic2.jpg'),
(3, 'Đà Nẵng', 1, 'pic3.jpg'),
(4, 'Ninh Bình', 1, 'pic4.jpg'),
(5, 'Nam Định\r\n', 1, ''),
(6, 'Bắc Ninh', 1, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `experience`
--

CREATE TABLE `experience` (
  `id_experience` int(11) NOT NULL,
  `experience_title` text NOT NULL,
  `experience_desc` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `experience_start` date NOT NULL,
  `experience_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `experience`
--

INSERT INTO `experience` (`id_experience`, `experience_title`, `experience_desc`, `id_user`, `experience_start`, `experience_end`) VALUES
(1, 'werwer', 'wer', 1, '2022-04-15', '2022-04-18'),
(2, 'op\'op\'', 'op\'op\'', 1, '2022-04-07', '2022-04-08'),
(3, 'tyj', 'tyj', 1, '2022-04-22', '2022-04-10'),
(4, 'tyj', 'tyj', 1, '2022-04-14', '2022-04-20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourite_job`
--

CREATE TABLE `favourite_job` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_job` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `favourite_job`
--

INSERT INTO `favourite_job` (`id`, `id_user`, `id_job`) VALUES
(17, 1, 1),
(18, 1, 7),
(24, 1, 11),
(19, 2, 1),
(21, 2, 7),
(22, 5, 8),
(16, 6, 1),
(23, 7, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `job_desc` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `job_date` timestamp NULL DEFAULT current_timestamp(),
  `job_status` int(11) DEFAULT NULL,
  `id_distribution` int(11) NOT NULL,
  `id_working_format` int(11) NOT NULL,
  `job_view` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `job`
--

INSERT INTO `job` (`job_id`, `job_desc`, `id_user`, `id_category`, `job_date`, `job_status`, `id_distribution`, `id_working_format`, `job_view`) VALUES
(1, 'MISA tuyển web developer C#, PHP', 1, 1, '0000-00-00 00:00:00', 3, 1, 1, 25),
(3, 'Công ty Danisa tuyển dụng kế toán', 1, 1, '2022-04-16 17:00:00', 4, 1, 2, 15),
(7, 'Tuyển dụng php', 1, 1, '2022-05-01 19:34:54', 3, 1, 1, 46),
(8, 'Tuyển dụng nhận viên bán hàng', 4, 1, '2021-05-02 15:14:21', 3, 2, 1, 15),
(10, 'FPT tuyển dụng nhân viên marketing', 4, 5, '2022-05-22 09:44:46', 3, 2, 1, 45),
(11, 'ADAMO tuyển dụng Digital Marketing', 15, 5, '2022-06-03 20:53:35', 3, 6, 1, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_recruiter` int(11) DEFAULT NULL,
  `notification_title` text DEFAULT NULL,
  `notification_content` text DEFAULT NULL,
  `notification_status` int(11) NOT NULL,
  `id_job` int(11) DEFAULT NULL,
  `notification_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`id`, `id_user`, `id_recruiter`, `notification_title`, `notification_content`, `notification_status`, `id_job`, `notification_date`) VALUES
(1, 5, NULL, 'Nhà tuyển dụng đã xem hồ sơ của bạn', NULL, 0, 8, '2022-05-12 11:55:05'),
(2, 1, NULL, 'Nhà tuyển dụng đã xem hồ sơ của bạn', NULL, 0, 1, '2022-05-13 22:50:36'),
(3, 2, NULL, 'Nhà tuyển dụng đã xem hồ sơ của bạn', NULL, 0, 1, '2022-05-13 22:50:57'),
(4, 2, NULL, 'Nhà tuyển dụng đã xem hồ sơ của bạn', NULL, 0, 9, '2022-05-14 22:32:48'),
(5, 2, NULL, 'Nhà tuyển dụng đã xem hồ sơ của bạn', NULL, 0, 8, '2022-05-28 01:41:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `profile_skill` text NOT NULL,
  `profile_title` varchar(255) NOT NULL,
  `profile_education` text DEFAULT NULL,
  `profile_link` varchar(255) DEFAULT NULL,
  `profile_interest` text DEFAULT NULL,
  `profile_career_goals` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `profile`
--

INSERT INTO `profile` (`id_profile`, `id_user`, `profile_skill`, `profile_title`, `profile_education`, `profile_link`, `profile_interest`, `profile_career_goals`) VALUES
(2, 1, '<p>PHP, HTML, CSS, JS</p>', 'Fresher web developer', 'Đại học giao thông vận tải', NULL, 'Korea of firm', '<p>Mục tiêu ngắn hạn:Tìm được nơi thực tập. Mục tiêu dài hạn: trở thành web developer.</p>'),
(3, 2, 'wefwef', 'wefwefwe', 'fwef', 'wefwef', 'wefwef', 'test'),
(4, 5, '<p>CSS, HTML, PHP, C#</p>', 'test', 'Dai Hoc Giao Thong Van Tai', 'imsoybad.com', 'test', '<p>web developer</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id_roles` int(11) NOT NULL,
  `roles_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id_roles`, `roles_name`) VALUES
(1, 'admin'),
(2, 'tuyendung'),
(3, 'ungvien');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social`
--

CREATE TABLE `social` (
  `id_user` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `user` int(11) NOT NULL,
  `provider_user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `social`
--

INSERT INTO `social` (`id_user`, `provider`, `user`, `provider_user_id`) VALUES
(1, 'facebook', 7, '3183063032024216');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_phone` int(11) DEFAULT NULL,
  `user_adress` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_phone`, `user_adress`, `user_email`, `user_password`, `user_image`) VALUES
(1, 'Trần Tất Thành', 869984922, 'Ninh Bình', 'tranthanh2820@gmail.com', '73052ed69b963447dc37fd564a53d244', '967902c65824c288259406ac76ab5bd966.jpg'),
(2, 'Cường FB', 869984922, 'Thanh hóa', 'demo@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'hinh-nen-among-us-20048.jpg'),
(3, 'Thành', NULL, NULL, 'demo3@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL),
(4, 'demo4', NULL, NULL, 'demo4@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL),
(5, 'Nguyễn Văn test', 869984922, 'Tam Điệp, Ninh Bình', 'test@gmail.com', '25d55ad283aa400af464c76d713c07ad', '967902c65824c288259406ac76ab5bd962.jpg'),
(6, 'Nguyễn Văn test 2', NULL, NULL, 'test2@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL),
(7, 'Thành Trần', NULL, NULL, 'xin1nucuoi2820@gmail.com', '', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `working_format`
--

CREATE TABLE `working_format` (
  `id_working_format` int(11) NOT NULL,
  `working_format_name` varchar(255) NOT NULL,
  `working_format_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `working_format`
--

INSERT INTO `working_format` (`id_working_format`, `working_format_name`, `working_format_status`) VALUES
(1, 'Toàn thời gian', 1),
(2, 'Bán thời gian', 1),
(3, 'Thực tập', 1),
(4, 'Remote - Làm việc từ xa', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `apply_job`
--
ALTER TABLE `apply_job`
  ADD PRIMARY KEY (`id_apply_job`),
  ADD KEY `id_job` (`id_job`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Chỉ mục cho bảng `detail_job`
--
ALTER TABLE `detail_job`
  ADD PRIMARY KEY (`id_detail_job`),
  ADD KEY `id_company` (`id_company`,`id_job`),
  ADD KEY `id_job` (`id_job`);

--
-- Chỉ mục cho bảng `detail_roles`
--
ALTER TABLE `detail_roles`
  ADD PRIMARY KEY (`id_detail_roles`),
  ADD KEY `admin_id` (`admin_id`,`roles_id`),
  ADD KEY `roles_id` (`roles_id`);

--
-- Chỉ mục cho bảng `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`id_distribution`);

--
-- Chỉ mục cho bảng `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`id_experience`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `favourite_job`
--
ALTER TABLE `favourite_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`id_job`),
  ADD KEY `id_job` (`id_job`);

--
-- Chỉ mục cho bảng `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `id_user` (`id_user`,`id_category`,`id_distribution`,`id_working_format`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_working_format` (`id_working_format`),
  ADD KEY `id_distribution` (`id_distribution`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_roles`);

--
-- Chỉ mục cho bảng `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `working_format`
--
ALTER TABLE `working_format`
  ADD PRIMARY KEY (`id_working_format`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `apply_job`
--
ALTER TABLE `apply_job`
  MODIFY `id_apply_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `detail_job`
--
ALTER TABLE `detail_job`
  MODIFY `id_detail_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `detail_roles`
--
ALTER TABLE `detail_roles`
  MODIFY `id_detail_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `distribution`
--
ALTER TABLE `distribution`
  MODIFY `id_distribution` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `experience`
--
ALTER TABLE `experience`
  MODIFY `id_experience` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `favourite_job`
--
ALTER TABLE `favourite_job`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id_roles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `social`
--
ALTER TABLE `social`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `working_format`
--
ALTER TABLE `working_format`
  MODIFY `id_working_format` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `apply_job`
--
ALTER TABLE `apply_job`
  ADD CONSTRAINT `apply_job_ibfk_1` FOREIGN KEY (`id_job`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_job_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `detail_job`
--
ALTER TABLE `detail_job`
  ADD CONSTRAINT `detail_job_ibfk_1` FOREIGN KEY (`id_company`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_job_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `detail_roles`
--
ALTER TABLE `detail_roles`
  ADD CONSTRAINT `detail_roles_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_roles_ibfk_2` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id_roles`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `experience`
--
ALTER TABLE `experience`
  ADD CONSTRAINT `experience_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `favourite_job`
--
ALTER TABLE `favourite_job`
  ADD CONSTRAINT `favourite_job_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favourite_job_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `job` (`job_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `job_ibfk_2` FOREIGN KEY (`id_working_format`) REFERENCES `working_format` (`id_working_format`),
  ADD CONSTRAINT `job_ibfk_3` FOREIGN KEY (`id_distribution`) REFERENCES `distribution` (`id_distribution`) ON UPDATE CASCADE,
  ADD CONSTRAINT `job_ibfk_5` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
