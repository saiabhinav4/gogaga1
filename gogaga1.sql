-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 05:20 PM
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
-- Database: `gogaga1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `bankDetail_id` int(11) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `branchName` varchar(255) DEFAULT NULL,
  `bankAddress` text DEFAULT NULL,
  `accountNumber` varchar(20) NOT NULL,
  `ifscCode` varchar(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`bankDetail_id`, `bankName`, `branchName`, `bankAddress`, `accountNumber`, `ifscCode`, `user_id`) VALUES
(1, 'Axis', NULL, 'nizamabad', '3452455555', 'Axis2345678', 7);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `departmentName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `departmentName`) VALUES
(1, 'Human Resources'),
(2, 'Sales'),
(3, 'Marketing'),
(4, 'Operations-Indian Holidays'),
(5, 'Operations-International Holidays'),
(6, 'Bookings'),
(7, 'Reservations'),
(8, 'Accounts'),
(9, 'VISA'),
(10, 'Marketing Designing'),
(11, 'IT-Web Development'),
(12, 'Training'),
(13, 'Admin'),
(14, 'Customer Support'),
(15, 'Partner Support');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `district_id` int(11) NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`district_id`, `district`, `state_id`) VALUES
(1, 'Anantapur', 1),
(2, 'Chittoor', 1),
(3, 'East Godavari', 1),
(4, 'Alluri Sitarama Raju', 1),
(5, 'Anakapalli', 1),
(6, 'Annamaya', 1),
(7, 'Bapatla', 1),
(8, 'Eluru', 1),
(9, 'Guntur', 1),
(10, 'Kadapa', 1),
(11, 'Kakinada ', 1),
(12, 'Konaseema', 1),
(13, 'Krishna', 1),
(14, 'Kurnool', 1),
(15, 'Manyam', 1),
(16, 'N T Rama Rao', 1),
(17, 'Nandyal', 1),
(18, 'Nellore', 1),
(19, 'Palnadu', 1),
(20, 'Prakasam', 1),
(21, 'Sri Balaji', 1),
(22, 'Sri Satya Sai', 1),
(23, 'Srikakulam', 1),
(24, 'Visakhapatnam', 1),
(25, 'Vizianagaram', 1),
(26, 'West Godavari', 1),
(27, 'Anjaw', 2),
(28, 'Central Siang', 2),
(29, 'Changlang', 2),
(30, 'Dibang Valley', 2),
(31, 'East Kameng', 2),
(32, 'East Siang', 2),
(33, 'Kamle', 2),
(34, 'Kra Daadi', 2),
(35, 'Kurung Kumey', 2),
(36, 'Lepa Rada', 2),
(37, 'Lohit', 2),
(38, 'Longding', 2),
(39, 'Lower Dibang Valley', 2),
(40, 'Lower Siang', 2),
(41, 'Lower Subansiri', 2),
(42, 'Namsai', 2),
(43, 'Pakke Kessang', 2),
(44, 'Papum Pare', 2),
(45, 'Shi Yomi', 2),
(46, 'Tawang', 2),
(47, 'Tirap', 2),
(48, 'Upper Siang', 2),
(49, 'Upper Subansiri', 2),
(50, 'West Kameng', 2),
(51, 'West Siang', 2),
(52, 'Baksa', 3),
(53, 'Barpeta', 3),
(54, 'Bongaigaon', 3),
(55, 'Cachar', 3),
(56, 'Charaideo', 3),
(57, 'Chirang', 3),
(58, 'Darrang', 3),
(59, 'Dhemaji', 3),
(60, 'Dhubri', 3),
(61, 'Dibrugarh', 3),
(62, 'Dima Hasao', 3),
(63, '6lpara', 3),
(64, 'Golaghat', 3),
(65, 'Hailakandi', 3),
(66, 'Jorhat', 3),
(67, 'Kamrup', 3),
(68, 'Kamrup Metropolitan', 3),
(69, 'Karbi Anglong', 3),
(70, 'Karimganj', 3),
(71, 'Kokrajhar', 3),
(72, 'Lakhimpur', 3),
(73, 'Majuli', 3),
(74, 'Morigaon', 3),
(75, 'Nagaon', 3),
(76, 'Nalbari', 3),
(77, 'Sivasagar', 3),
(78, 'Sonitpur', 3),
(79, 'South Salmara-Mankachar', 3),
(80, 'Tinsukia', 3),
(81, 'Udalguri', 3),
(82, 'West Karbi Anglong', 3),
(83, 'Araria', 4),
(84, 'Arwal', 4),
(85, 'Aurangabad', 4),
(86, 'Banka', 4),
(87, 'Begusarai', 4),
(88, 'Bhagalpur', 4),
(89, 'Bhojpur', 4),
(90, 'Buxar', 4),
(91, 'Darbhanga', 4),
(92, 'East Champaran', 4),
(93, 'Gaya', 4),
(94, 'Gopalganj', 4),
(95, 'Jamui', 4),
(96, 'Jehanabad', 4),
(97, 'Kaimur', 4),
(98, 'Katihar', 4),
(99, 'Khagaria', 4),
(100, 'Kishanganj', 4),
(101, 'Lakhisarai', 4),
(102, 'Madhepura', 4),
(103, 'Madhubani', 4),
(104, 'Munger', 4),
(105, 'Muzaffarpur', 4),
(106, 'Nalanda', 4),
(107, 'Nawada', 4),
(108, 'Patna', 4),
(109, 'Purnia', 4),
(110, 'Rohtas', 4),
(111, 'Saharsa', 4),
(112, 'Samastipur', 4),
(113, 'Saran', 4),
(114, 'Sheikhpura', 4),
(115, 'Sheohar', 4),
(116, 'Sitamarhi', 4),
(117, 'Siwan', 4),
(118, 'Supaul', 4),
(119, 'Vaishali', 4),
(120, 'West Champaran', 4),
(121, 'Balod', 5),
(122, 'Baloda Bazar', 5),
(123, 'Balrampur', 5),
(124, 'Bastar', 5),
(125, 'Bemetara', 5),
(126, 'Bijapur', 5),
(127, 'Bilaspur', 5),
(128, 'Dantewada', 5),
(129, 'Dhamtari', 5),
(130, 'Durg', 5),
(131, 'Gariaband', 5),
(132, 'Gaurela Pendra Marwahi', 5),
(133, 'Janjgir Champa', 5),
(134, 'Jashpur', 5),
(135, 'Kabirdham', 5),
(136, 'Kanker', 5),
(137, 'Khairagarh', 5),
(138, 'Kondagaon', 5),
(139, 'Korba', 5),
(140, 'Koriya', 5),
(141, 'Mahasamund', 5),
(142, 'Manendragarh', 5),
(143, 'Mohla Manpur', 5),
(144, 'Mungeli', 5),
(145, 'Narayanpur', 5),
(146, 'Raigarh', 5),
(147, 'Raipur', 5),
(148, 'Rajnandgaon', 5),
(149, 'Sakti', 5),
(150, 'Sarangarh Bilaigarh', 5),
(151, 'Sukma', 5),
(152, 'Surajpur', 5),
(153, 'Surguja', 5),
(154, 'North Goa', 6),
(155, 'South Goa', 6),
(156, 'Ahmedabad', 7),
(157, 'Amreli', 7),
(158, 'Anand', 7),
(159, 'Aravalli', 7),
(160, 'Banaskantha', 7),
(161, 'Bharuch', 7),
(162, 'Bhavnagar', 7),
(163, 'Botad', 7),
(164, 'Chhota Udaipur', 7),
(165, 'Dahod', 7),
(166, 'Dang', 7),
(167, 'Devbhoomi Dwarka', 7),
(168, 'Gandhinagar', 7),
(169, 'Gir Somnath', 7),
(170, 'Jamnagar', 7),
(171, 'Junagadh', 7),
(172, 'Kheda', 7),
(173, 'Kutch', 7),
(174, 'Mahisagar', 7),
(175, 'Mehsana', 7),
(176, 'Morbi', 7),
(177, 'Narmada', 7),
(178, 'Navsari', 7),
(179, 'Panchmahal', 7),
(180, 'Patan', 7),
(181, 'Porbandar', 7),
(182, 'Rajkot', 7),
(183, 'Sabarkantha', 7),
(184, 'Surat', 7),
(185, 'Surendranagar', 7),
(186, 'Tapi', 7),
(187, 'Vadodara', 7),
(188, 'Valsad', 7),
(189, 'Ambala', 8),
(190, 'Bhiwani', 8),
(191, 'Charkhi Dadri', 8),
(192, 'Faridabad', 8),
(193, 'Fatehabad', 8),
(194, 'Gurugram', 8),
(195, 'Hisar', 8),
(196, 'Jhajjar', 8),
(197, 'Jind', 8),
(198, 'Kaithal', 8),
(199, 'Karnal', 8),
(200, 'Kurukshetra', 8),
(201, 'Mahendragarh', 8),
(202, 'Mewat', 8),
(203, 'Palwal', 8),
(204, 'Panchkula', 8),
(205, 'Panipat', 8),
(206, 'Rewari', 8),
(207, 'Rohtak', 8),
(208, 'Sirsa', 8),
(209, 'Sonipat', 8),
(210, 'Yamunanagar', 8),
(211, 'Bilaspur', 9),
(212, 'Chamba', 9),
(213, 'Hamirpur', 9),
(214, 'Kangra', 9),
(215, 'Kinnaur', 9),
(216, 'Kullu', 9),
(217, 'Lahaul Spiti', 9),
(218, 'Mandi', 9),
(219, 'Shimla', 9),
(220, 'Sirmaur', 9),
(221, 'Solan', 9),
(222, 'Una', 9),
(223, 'Bokaro', 10),
(224, 'Chatra', 10),
(225, 'Deoghar', 10),
(226, 'Dhanbad', 10),
(227, 'Dumka', 10),
(228, 'East Singhbhum', 10),
(229, 'Garhwa', 10),
(230, 'Giridih', 10),
(231, 'Godda', 10),
(232, 'Gumla', 10),
(233, 'Hazaribagh', 10),
(234, 'Jamtara', 10),
(235, 'Khunti', 10),
(236, 'Koderma', 10),
(237, 'Latehar', 10),
(238, 'Lohardaga', 10),
(239, 'Pakur', 10),
(240, 'Palamu', 10),
(241, 'Ramgarh', 10),
(242, 'Ranchi', 10),
(243, 'Sahebganj', 10),
(244, 'Seraikela Kharsawan', 10),
(245, 'Simdega', 10),
(246, 'West Singhbhum', 10),
(247, 'Bagalkot', 11),
(248, 'Bangalore Rural', 11),
(249, 'Bangalore Urban', 11),
(250, 'Belgaum', 11),
(251, 'Bellary', 11),
(252, 'Bidar', 11),
(253, 'Chamarajanagar', 11),
(254, 'Chikkaballapur', 11),
(255, 'Chikkamagaluru', 11),
(256, 'Chitradurga', 11),
(257, 'Dakshina Kannada', 11),
(258, 'Davanagere', 11),
(259, 'Dharwad', 11),
(260, 'Gadag', 11),
(261, 'Gulbarga', 11),
(262, 'Hassan', 11),
(263, 'Haveri', 11),
(264, 'Kodagu', 11),
(265, 'Kolar', 11),
(266, 'Koppal', 11),
(267, 'Mandya', 11),
(268, 'Mysore', 11),
(269, 'Raichur', 11),
(270, 'Ramanagara', 11),
(271, 'Shimoga', 11),
(272, 'Tumkur', 11),
(273, 'Udupi', 11),
(274, 'Uttara Kannada', 11),
(275, 'Vijayanagara', 11),
(276, 'Vijayapura ', 11),
(277, 'Yadgir', 11),
(278, 'Alappuzha', 12),
(279, 'Ernakulam', 12),
(280, 'Idukki', 12),
(281, 'Kannur', 12),
(282, 'Kasaragod', 12),
(283, 'Kollam', 12),
(284, 'Kottayam', 12),
(285, 'Kozhikode', 12),
(286, 'Malappuram', 12),
(287, 'Palakkad', 12),
(288, 'Pathanamthitta', 12),
(289, 'Thiruvananthapuram', 12),
(290, 'Thrissur', 12),
(291, 'Wayanad', 12),
(292, 'Agar Malwa', 13),
(293, 'Alirajpur', 13),
(294, 'Anuppur', 13),
(295, 'Ashoknagar', 13),
(296, 'Balaghat', 13),
(297, 'Barwani', 13),
(298, 'Betul', 13),
(299, 'Bhind', 13),
(300, 'Bhopal', 13),
(301, 'Burhanpur', 13),
(302, 'Chachaura', 13),
(303, 'Chhatarpur', 13),
(304, 'Chhindwara', 13),
(305, 'Damoh', 13),
(306, 'Datia', 13),
(307, 'Dewas', 13),
(308, 'Dhar', 13),
(309, 'Dindori', 13),
(310, 'Guna', 13),
(311, 'Gwalior', 13),
(312, 'Harda', 13),
(313, 'Hoshangabad', 13),
(314, 'Indore', 13),
(315, 'Jabalpur', 13),
(316, 'Jhabua', 13),
(317, 'Katni', 13),
(318, 'Khandwa', 13),
(319, 'Khargone', 13),
(320, 'Maihar', 13),
(321, 'Mandla', 13),
(322, 'Mandsaur', 13),
(323, 'Morena', 13),
(324, 'Nagda', 13),
(325, 'Narsinghpur', 13),
(326, 'Neemuch', 13),
(327, 'Niwari', 13),
(328, 'Panna', 13),
(329, 'Raisen', 13),
(330, 'Rajgarh', 13),
(331, 'Ratlam', 13),
(332, 'Rewa', 13),
(333, 'Sagar', 13),
(334, 'Satna', 13),
(335, 'Sehore', 13),
(336, 'Seoni', 13),
(337, 'Shahdol', 13),
(338, 'Shajapur', 13),
(339, 'Sheopur', 13),
(340, 'Shivpuri', 13),
(341, 'Sidhi', 13),
(342, 'Singrauli', 13),
(343, 'Tikamgarh', 13),
(344, 'Ujjain', 13),
(345, 'Umaria', 13),
(346, 'Vidisha', 13),
(347, 'Ahmednagar', 14),
(348, 'Akola', 14),
(349, 'Amravati', 14),
(350, 'Aurangabad', 14),
(351, 'Beed', 14),
(352, 'Bhandara', 14),
(353, 'Buldhana', 14),
(354, 'Chandrapur', 14),
(355, 'Dhule', 14),
(356, 'Gadchiroli', 14),
(357, 'Gondia', 14),
(358, 'Hingoli', 14),
(359, 'Jalgaon', 14),
(360, 'Jalna', 14),
(361, 'Kolhapur', 14),
(362, 'Latur', 14),
(363, 'Mumbai City', 14),
(364, 'Mumbai Suburban', 14),
(365, 'Nagpur', 14),
(366, 'Nanded', 14),
(367, 'Nandurbar', 14),
(368, 'Nashik', 14),
(369, 'Osmanabad', 14),
(370, 'Palghar', 14),
(371, 'Parbhani', 14),
(372, 'Pune', 14),
(373, 'Raigad', 14),
(374, 'Ratnagiri', 14),
(375, 'Sangli', 14),
(376, 'Satara', 14),
(377, 'Sindhudurg', 14),
(378, 'Solapur', 14),
(379, 'Thane', 14),
(380, 'Wardha', 14),
(381, 'Washim', 14),
(382, 'Yavatmal', 14),
(383, 'Bishnupur', 15),
(384, 'Chandel', 15),
(385, 'Churachandpur', 15),
(386, 'Imphal East', 15),
(387, 'Imphal West', 15),
(388, 'Jiribam', 15),
(389, 'Kakching', 15),
(390, 'Kamjong', 15),
(391, 'Kangpokpi', 15),
(392, 'Noney', 15),
(393, 'Pherzawl', 15),
(394, 'Senapati', 15),
(395, 'Tamenglong', 15),
(396, 'Tengnoupal', 15),
(397, 'Thoubal', 15),
(398, 'Ukhrul', 15),
(399, 'East Garo Hills', 16),
(400, 'East Jaintia Hills', 16),
(401, 'East Khasi Hills', 16),
(402, 'Mairang', 16),
(403, 'North Garo Hills', 16),
(404, 'Ri Bhoi', 16),
(405, 'South Garo Hills', 16),
(406, 'South West Garo Hills', 16),
(407, 'South West Khasi Hills', 16),
(408, 'West Garo Hills', 16),
(409, 'West Jaintia Hills', 16),
(410, 'West Khasi Hills', 16),
(411, 'Aizawl', 17),
(412, 'Champhai', 17),
(413, 'Hnahthial', 17),
(414, 'Kolasib', 17),
(415, 'Khawzawl', 17),
(416, 'Lawngtlai', 17),
(417, 'Lunglei', 17),
(418, 'Mamit', 17),
(419, 'Saiha', 17),
(420, 'Serchhip', 17),
(421, 'Saitual', 17),
(422, 'Chumukedima', 18),
(423, 'Dimapur', 18),
(424, 'Kiphire', 18),
(425, 'Kohima', 18),
(426, 'Longleng', 18),
(427, 'Mokokchung', 18),
(428, 'Mon', 18),
(429, 'Niuland', 18),
(430, 'Noklak', 18),
(431, 'Peren', 18),
(432, 'Phek', 18),
(433, 'Shamator', 18),
(434, 'Tseminyu', 18),
(435, 'Tuensang', 18),
(436, 'Wokha', 18),
(437, 'Zunheboto', 18),
(438, 'Angul', 19),
(439, 'Balangir', 19),
(440, 'Balasore', 19),
(441, 'Bargarh', 19),
(442, 'Bhadrak', 19),
(443, 'Boudh', 19),
(444, 'Cuttack', 19),
(445, 'Debagarh', 19),
(446, 'Dhenkanal', 19),
(447, 'Gajapati', 19),
(448, 'Ganjam', 19),
(449, 'Jagatsinghpur', 19),
(450, 'Jajpur', 19),
(451, 'Jharsuguda', 19),
(452, 'Kalahandi', 19),
(453, 'Kandhamal', 19),
(454, 'Kendrapara', 19),
(455, 'Kendujhar', 19),
(456, 'Khordha', 19),
(457, 'Koraput', 19),
(458, 'Malkangiri', 19),
(459, 'Mayurbhanj', 19),
(460, 'Nabarangpur', 19),
(461, 'Nayagarh', 19),
(462, 'Nuapada', 19),
(463, 'Puri', 19),
(464, 'Rayagada', 19),
(465, 'Sambalpur', 19),
(466, 'Subarnapur', 19),
(467, 'Sundergarh', 19),
(468, 'Amritsar', 20),
(469, 'Barnala', 20),
(470, 'Bathinda', 20),
(471, 'Faridkot', 20),
(472, 'Fatehgarh Sahib', 20),
(473, 'Fazilka', 20),
(474, 'Firozpur', 20),
(475, 'Gurdaspur', 20),
(476, 'Hoshiarpur', 20),
(477, 'Jalandhar', 20),
(478, 'Kapurthala', 20),
(479, 'Ludhiana', 20),
(480, 'Malerkotla', 20),
(481, 'Mansa', 20),
(482, 'Moga', 20),
(483, 'Mohali', 20),
(484, 'Muktsar', 20),
(485, 'Pathankot', 20),
(486, 'Patiala', 20),
(487, 'Rupnagar', 20),
(488, 'Sangrur', 20),
(489, 'Shaheed Bhagat Singh Nagar', 20),
(490, 'Tarn Taran', 20),
(491, 'Ajmer', 21),
(492, 'Alwar', 21),
(493, 'Banswara', 21),
(494, 'Baran', 21),
(495, 'Barmer', 21),
(496, 'Bharatpur', 21),
(497, 'Bhilwara', 21),
(498, 'Bikaner', 21),
(499, 'Bundi', 21),
(500, 'Chittorgarh', 21),
(501, 'Churu', 21),
(502, 'Dausa', 21),
(503, 'Dholpur', 21),
(504, 'Dungarpur', 21),
(505, 'Hanumangarh', 21),
(506, 'Jaipur', 21),
(507, 'Jaisalmer', 21),
(508, 'Jalore', 21),
(509, 'Jhalawar', 21),
(510, 'Jhunjhunu', 21),
(511, 'Jodhpur', 21),
(512, 'Karauli', 21),
(513, 'Kota', 21),
(514, 'Nagaur', 21),
(515, 'Pali', 21),
(516, 'Pratapgarh', 21),
(517, 'Rajsamand', 21),
(518, 'Sawai Madhopur', 21),
(519, 'Sikar', 21),
(520, 'Sirohi', 21),
(521, 'Sri Ganganagar', 21),
(522, 'Tonk', 21),
(523, 'Udaipur', 21),
(524, 'East Sikkim', 22),
(525, 'North Sikkim', 22),
(526, 'Pakyong', 22),
(527, 'Soreng', 22),
(528, 'South Sikkim', 22),
(529, 'West Sikkim', 22),
(530, 'Ariyalur', 23),
(531, 'Chengalpattu', 23),
(532, 'Chennai', 23),
(533, 'Coimbatore', 23),
(534, 'Cuddalore', 23),
(535, 'Dharmapuri', 23),
(536, 'Dindigul', 23),
(537, 'Erode', 23),
(538, 'Kallakurichi', 23),
(539, 'Kanchipuram', 23),
(540, 'Kanyakumari', 23),
(541, 'Karur', 23),
(542, 'Krishnagiri', 23),
(543, 'Madurai', 23),
(544, 'Mayiladuthurai ', 23),
(545, 'Nagapattinam', 23),
(546, 'Namakkal', 23),
(547, 'Nilgiris', 23),
(548, 'Perambalur', 23),
(549, 'Pudukkottai', 23),
(550, 'Ramanathapuram', 23),
(551, 'Ranipet', 23),
(552, 'Salem', 23),
(553, 'Sivaganga', 23),
(554, 'Tenkasi', 23),
(555, 'Thanjavur', 23),
(556, 'Theni', 23),
(557, 'Thoothukudi', 23),
(558, 'Tiruchirappalli', 23),
(559, 'Tirunelveli', 23),
(560, 'Tirupattur', 23),
(561, 'Tiruppur', 23),
(562, 'Tiruvallur', 23),
(563, 'Tiruvannamalai', 23),
(564, 'Tiruvarur', 23),
(565, 'Vellore', 23),
(566, 'Viluppuram', 23),
(567, 'Virudhunagar', 23),
(568, 'Adilabad', 24),
(569, 'Bhadradri Kothagudem', 24),
(570, 'Hyderabad', 24),
(571, 'Jagtial', 24),
(572, 'Jangaon', 24),
(573, 'Jayashankar', 24),
(574, 'Jogulamba', 24),
(575, 'Kamareddy', 24),
(576, 'Karimnagar', 24),
(577, 'Khammam', 24),
(578, 'Komaram Bheem', 24),
(579, 'Mahabubabad', 24),
(580, 'Mahbubnagar', 24),
(581, 'Mancherial', 24),
(582, 'Medak', 24),
(583, 'Medchal', 24),
(584, 'Mulugu', 24),
(585, 'Nagarkurnool', 24),
(586, 'Nalgonda', 24),
(587, 'Narayanpet', 24),
(588, 'Nirmal', 24),
(589, 'Nizamabad', 24),
(590, 'Peddapalli', 24),
(591, 'Rajanna Sircilla', 24),
(592, 'Ranga Reddy', 24),
(593, 'Sangareddy', 24),
(594, 'Siddipet', 24),
(595, 'Suryapet', 24),
(596, 'Vikarabad', 24),
(597, 'Wanaparthy', 24),
(598, 'Warangal', 24),
(599, 'Hanamkonda', 24),
(600, 'Yadadri Bhuvanagiri', 24),
(601, 'Dhalai', 25),
(602, 'Gomati', 25),
(603, 'Khowai', 25),
(604, 'North Tripura', 25),
(605, 'Sepahijala', 25),
(606, 'South Tripura', 25),
(607, 'Unakoti', 25),
(608, 'West Tripura', 25),
(609, 'Agra', 26),
(610, 'Aligarh', 26),
(611, 'Ambedkar Nagar', 26),
(612, 'Amethi', 26),
(613, 'Amroha', 26),
(614, 'Auraiya', 26),
(615, 'Ayodhya', 26),
(616, 'Azamgarh', 26),
(617, 'Baghpat', 26),
(618, 'Bahraich', 26),
(619, 'Ballia', 26),
(620, 'Balrampur', 26),
(621, 'Banda', 26),
(622, 'Barabanki', 26),
(623, 'Bareilly', 26),
(624, 'Basti', 26),
(625, 'Bhadohi', 26),
(626, 'Bijnor', 26),
(627, 'Budaun', 26),
(628, 'Bulandshahr', 26),
(629, 'Chandauli', 26),
(630, 'Chitrakoot', 26),
(631, 'Deoria', 26),
(632, 'Etah', 26),
(633, 'Etawah', 26),
(634, 'Farrukhabad', 26),
(635, 'Fatehpur', 26),
(636, 'Firozabad', 26),
(637, 'Gautam Buddha Nagar', 26),
(638, 'Ghaziabad', 26),
(639, 'Ghazipur', 26),
(640, 'Gonda', 26),
(641, 'Gorakhpur', 26),
(642, 'Hamirpur', 26),
(643, 'Hapur', 26),
(644, 'Hardoi', 26),
(645, 'Hathras', 26),
(646, 'Jalaun', 26),
(647, 'Jaunpur', 26),
(648, 'Jhansi', 26),
(649, 'Kannauj', 26),
(650, 'Kanpur Dehat', 26),
(651, 'Kanpur Nagar', 26),
(652, 'Kasganj', 26),
(653, 'Kaushambi', 26),
(654, 'Kheri', 26),
(655, 'Kushinagar', 26),
(656, 'Lalitpur', 26),
(657, 'Lucknow', 26),
(658, 'Maharajganj', 26),
(659, 'Mahoba', 26),
(660, 'Mainpuri', 26),
(661, 'Mathura', 26),
(662, 'Mau', 26),
(663, 'Meerut', 26),
(664, 'Mirzapur', 26),
(665, 'Moradabad', 26),
(666, 'Muzaffarnagar', 26),
(667, 'Pilibhit', 26),
(668, 'Pratapgarh', 26),
(669, 'Prayagraj', 26),
(670, 'Raebareli', 26),
(671, 'Rampur', 26),
(672, 'Saharanpur', 26),
(673, 'Sambhal', 26),
(674, 'Sant Kabir Nagar', 26),
(675, 'Shahjahanpur', 26),
(676, 'Shamli', 26),
(677, 'Shravasti', 26),
(678, 'Siddharthnagar', 26),
(679, 'Sitapur', 26),
(680, 'Sonbhadra', 26),
(681, 'Sultanpur', 26),
(682, 'Unnao', 26),
(683, 'Varanasi', 26),
(684, 'Almora', 27),
(685, 'Bageshwar', 27),
(686, 'Chamoli', 27),
(687, 'Champawat', 27),
(688, 'Dehradun', 27),
(689, 'Haridwar', 27),
(690, 'Nainital', 27),
(691, 'Pauri', 27),
(692, 'Pithoragarh', 27),
(693, 'Rudraprayag', 27),
(694, 'Tehri', 27),
(695, 'Udham Singh Nagar', 27),
(696, 'Uttarkashi', 27),
(697, 'Alipurduar', 28),
(698, 'Bankura', 28),
(699, 'Birbhum', 28),
(700, 'Cooch Behar', 28),
(701, 'Dakshin Dinajpur', 28),
(702, 'Darjeeling', 28),
(703, 'Hooghly', 28),
(704, 'Howrah', 28),
(705, 'Jalpaiguri', 28),
(706, 'Jhargram', 28),
(707, 'Kalimpong', 28),
(708, 'Kolkata', 28),
(709, 'Malda', 28),
(710, 'Murshidabad', 28),
(711, 'Nadia', 28),
(712, 'North 24 Parganas', 28),
(713, 'Paschim Bardhaman', 28),
(714, 'Paschim Medinipur', 28),
(715, 'Purba Bardhaman', 28),
(716, 'Purba Medinipur', 28),
(717, 'Purulia', 28),
(718, 'South 24 Parganas', 28),
(719, 'Uttar Dinajpur', 28);

-- --------------------------------------------------------

--
-- Table structure for table `employeedetails`
--

CREATE TABLE `employeedetails` (
  `employee_id` int(11) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `high_qualif` varchar(255) DEFAULT NULL,
  `year_qualif` int(11) DEFAULT NULL,
  `dateOfJoin` date DEFAULT NULL,
  `work_location` varchar(255) DEFAULT NULL,
  `isfresher` tinyint(1) DEFAULT NULL,
  `schoolName` varchar(255) DEFAULT NULL,
  `percentage` decimal(5,2) DEFAULT NULL,
  `marksheet` blob DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `accessType` enum('Domestic','International','Both') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `package_id` varchar(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_theme` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `cities` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `cost` double NOT NULL,
  `validity` date NOT NULL,
  `itinerary_file` varchar(255) DEFAULT NULL,
  `cost_sheet_file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `package_id`, `package_name`, `package_theme`, `destination`, `cities`, `duration`, `cost`, `validity`, `itinerary_file`, `cost_sheet_file`) VALUES
(1, 'PCK_001', 'Family', 'Holiday', 'Kerala', 'wayanad,  kochi, munnar', '3 days, 3 nights', 26400, '2023-08-17', 'Holiday List - 2023 New.pdf', 'New Dashboard.xls'),
(3, 'PCK_002', 'Friends', 'Summer', 'Goa', 'south goa, main beaches', '4 days, 3 nights', 40000, '2023-09-12', NULL, NULL),
(4, 'PCK_003', 'Family', 'Holy', 'Varanasi', 'varanasi, temple', '2days, 1night', 15350, '2023-07-30', 'goldmannsacc.pdf', 'New Dashboard.xls'),
(5, 'NAT123', 'NAture', 'MainTheme', 'Hyderabad', 'Delhi', '10h', 2, '2023-10-27', 'Screenshot 2023-03-13 193005.png', 'Screenshot 2023-03-13 193021.png');

-- --------------------------------------------------------

--
-- Table structure for table `partnerdetails`
--

CREATE TABLE `partnerdetails` (
  `partner_id` int(11) NOT NULL,
  `yearOfExperience` int(11) DEFAULT NULL,
  `tradeName` varchar(255) DEFAULT NULL,
  `tradeType` varchar(50) DEFAULT NULL,
  `other` text DEFAULT NULL,
  `typeOfTrade` varchar(50) DEFAULT NULL,
  `tradeAddress` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partnerdetails`
--

INSERT INTO `partnerdetails` (`partner_id`, `yearOfExperience`, `tradeName`, `tradeType`, `other`, `typeOfTrade`, `tradeAddress`, `user_id`, `district_id`) VALUES
(1, 3, 'Nature', 'private limited', 'NA', 'dse', 'nizamabad', 7, 28);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `permission_id` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `userType` varchar(255) DEFAULT NULL,
  `isdefault` tinyint(1) DEFAULT NULL,
  `is_lead_add` tinyint(1) DEFAULT NULL,
  `is_lead_proceed` tinyint(1) DEFAULT NULL,
  `is_itinerary_request` tinyint(1) DEFAULT NULL,
  `is_itinerary_submit` tinyint(1) DEFAULT NULL,
  `is_itinerary_upload` tinyint(1) DEFAULT NULL,
  `is_itinerary_view` tinyint(1) DEFAULT NULL,
  `is_itinerary_download` tinyint(1) DEFAULT NULL,
  `is_itinerary_delete` tinyint(1) DEFAULT NULL,
  `is_package_create` tinyint(1) DEFAULT NULL,
  `is_package_edit` tinyint(1) DEFAULT NULL,
  `is_package_download` tinyint(1) DEFAULT NULL,
  `is_package_delete` tinyint(1) DEFAULT NULL,
  `is_customer_view` tinyint(1) DEFAULT NULL,
  `is_customer_download` tinyint(1) DEFAULT NULL,
  `is_partner_view` tinyint(1) DEFAULT NULL,
  `is_partner_edit` tinyint(1) DEFAULT NULL,
  `is_partner_replace` tinyint(1) DEFAULT NULL,
  `is_payment_view` tinyint(1) DEFAULT NULL,
  `is_payment_edit` tinyint(1) DEFAULT NULL,
  `is_credit_add` tinyint(1) DEFAULT NULL,
  `is_credit_connect` tinyint(1) DEFAULT NULL,
  `is_reimbursement_add` tinyint(1) DEFAULT NULL,
  `is_reimbursement_view` tinyint(1) DEFAULT NULL,
  `is_reimbursement_approve` tinyint(1) DEFAULT NULL,
  `is_reimbursement_reject` tinyint(1) DEFAULT NULL,
  `is_receipt_create` tinyint(1) DEFAULT NULL,
  `is_receipt_view` tinyint(1) DEFAULT NULL,
  `is_receipt_edit` tinyint(1) DEFAULT NULL,
  `is_ledger_add` tinyint(1) DEFAULT NULL,
  `is_ledger_view` tinyint(1) DEFAULT NULL,
  `is_ledger_download` tinyint(1) DEFAULT NULL,
  `is_voucher_view` tinyint(1) DEFAULT NULL,
  `is_voucher_manage` tinyint(1) DEFAULT NULL,
  `is_voucher_download` tinyint(1) DEFAULT NULL,
  `is_payout_view` tinyint(1) DEFAULT NULL,
  `is_payout_publish` tinyint(1) DEFAULT NULL,
  `is_payout_download` tinyint(1) DEFAULT NULL,
  `is_cih_view` tinyint(1) DEFAULT NULL,
  `is_cih_download` tinyint(1) DEFAULT NULL,
  `is_pl_view` tinyint(1) DEFAULT NULL,
  `is_pl_download` tinyint(1) DEFAULT NULL,
  `is_cust_support_view` tinyint(1) DEFAULT NULL,
  `is_cust_support_download` tinyint(1) DEFAULT NULL,
  `is_cust_support_review` tinyint(1) DEFAULT NULL,
  `is_cust_support_privileged` tinyint(1) DEFAULT NULL,
  `is_cust_support_voucher` tinyint(1) DEFAULT NULL,
  `is_employee_view` tinyint(1) DEFAULT NULL,
  `is_employee_edit` tinyint(1) DEFAULT NULL,
  `is_leave_add` tinyint(1) DEFAULT NULL,
  `is_leave_view` tinyint(1) DEFAULT NULL,
  `is_leave_approve` tinyint(1) DEFAULT NULL,
  `is_leave_reject` tinyint(1) DEFAULT NULL,
  `is_payroll_view` tinyint(1) DEFAULT NULL,
  `is_payroll_upload` tinyint(1) DEFAULT NULL,
  `is_payroll_generate` tinyint(1) DEFAULT NULL,
  `is_payroll_download` tinyint(1) DEFAULT NULL,
  `is_team_view` tinyint(1) DEFAULT NULL,
  `is_team_add` tinyint(1) DEFAULT NULL,
  `is_team_delete` tinyint(1) DEFAULT NULL,
  `is_supplier_create` tinyint(1) DEFAULT NULL,
  `is_supplier_view` tinyint(1) DEFAULT NULL,
  `is_supplier_disable` tinyint(1) DEFAULT NULL,
  `is_supplier_upload` tinyint(1) DEFAULT NULL,
  `is_escalation_view` tinyint(1) DEFAULT NULL,
  `is_escalation_create` tinyint(1) DEFAULT NULL,
  `is_library_view` tinyint(1) DEFAULT NULL,
  `is_library_upload` tinyint(1) DEFAULT NULL,
  `is_library_delete` tinyint(1) DEFAULT NULL,
  `is_report_create` tinyint(1) DEFAULT NULL,
  `is_report_view` tinyint(1) DEFAULT NULL,
  `is_report_download` tinyint(1) DEFAULT NULL,
  `is_market_add` tinyint(1) DEFAULT NULL,
  `is_market_view` tinyint(1) DEFAULT NULL,
  `is_download` tinyint(1) DEFAULT NULL,
  `is_user_create` tinyint(1) DEFAULT NULL,
  `is_user_invite` tinyint(1) DEFAULT NULL,
  `is_user_view` tinyint(1) DEFAULT NULL,
  `is_user_edit` tinyint(1) DEFAULT NULL,
  `is_user_reset_password` tinyint(1) DEFAULT NULL,
  `is_user_enable` tinyint(1) DEFAULT NULL,
  `is_master_view` tinyint(1) DEFAULT NULL,
  `is_master_add` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `is_itinerary_upload1` tinyint(1) DEFAULT NULL,
  `is_itinerary_save` tinyint(1) DEFAULT NULL,
  `is_itinerary_confirm` tinyint(1) DEFAULT NULL,
  `is_itinerary_publish` tinyint(1) DEFAULT NULL,
  `is_itinerary_qc` tinyint(1) DEFAULT NULL,
  `createdBy` varchar(100) DEFAULT NULL,
  `createdDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_id`, `userName`, `userType`, `isdefault`, `is_lead_add`, `is_lead_proceed`, `is_itinerary_request`, `is_itinerary_submit`, `is_itinerary_upload`, `is_itinerary_view`, `is_itinerary_download`, `is_itinerary_delete`, `is_package_create`, `is_package_edit`, `is_package_download`, `is_package_delete`, `is_customer_view`, `is_customer_download`, `is_partner_view`, `is_partner_edit`, `is_partner_replace`, `is_payment_view`, `is_payment_edit`, `is_credit_add`, `is_credit_connect`, `is_reimbursement_add`, `is_reimbursement_view`, `is_reimbursement_approve`, `is_reimbursement_reject`, `is_receipt_create`, `is_receipt_view`, `is_receipt_edit`, `is_ledger_add`, `is_ledger_view`, `is_ledger_download`, `is_voucher_view`, `is_voucher_manage`, `is_voucher_download`, `is_payout_view`, `is_payout_publish`, `is_payout_download`, `is_cih_view`, `is_cih_download`, `is_pl_view`, `is_pl_download`, `is_cust_support_view`, `is_cust_support_download`, `is_cust_support_review`, `is_cust_support_privileged`, `is_cust_support_voucher`, `is_employee_view`, `is_employee_edit`, `is_leave_add`, `is_leave_view`, `is_leave_approve`, `is_leave_reject`, `is_payroll_view`, `is_payroll_upload`, `is_payroll_generate`, `is_payroll_download`, `is_team_view`, `is_team_add`, `is_team_delete`, `is_supplier_create`, `is_supplier_view`, `is_supplier_disable`, `is_supplier_upload`, `is_escalation_view`, `is_escalation_create`, `is_library_view`, `is_library_upload`, `is_library_delete`, `is_report_create`, `is_report_view`, `is_report_download`, `is_market_add`, `is_market_view`, `is_download`, `is_user_create`, `is_user_invite`, `is_user_view`, `is_user_edit`, `is_user_reset_password`, `is_user_enable`, `is_master_view`, `is_master_add`, `user_id`, `department_id`, `is_itinerary_upload1`, `is_itinerary_save`, `is_itinerary_confirm`, `is_itinerary_publish`, `is_itinerary_qc`, `createdBy`, `createdDate`) VALUES
(6, 'SuperPartner', 'Partner', 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, NULL, 0, 0, 0, 0, 0, 'Abhinav', '2023-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `reference`
--

CREATE TABLE `reference` (
  `reference_id` int(11) NOT NULL,
  `referenceName` varchar(255) NOT NULL,
  `referencePhoneNumber` varchar(15) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reference`
--

INSERT INTO `reference` (`reference_id`, `referenceName`, `referencePhoneNumber`, `user_id`) VALUES
(1, 'sai kumar', '4546576897', 7);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jharkhand'),
(11, 'Karnataka'),
(12, 'Kerala'),
(13, 'Madhya Pradesh'),
(14, 'Maharashtra'),
(15, 'Manipur'),
(16, 'Meghalaya'),
(17, 'Mizoram'),
(18, 'Nagaland'),
(19, 'Odisha'),
(20, 'Punjab'),
(21, 'Rajasthan'),
(22, 'Sikkim'),
(23, 'Tamil Nadu'),
(24, 'Telangana'),
(25, 'Tripura'),
(26, 'Uttar Pradesh'),
(27, 'Uttarakhand'),
(28, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `maritalStatus` varchar(20) DEFAULT NULL,
  `contactNumber` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `code` varchar(10) DEFAULT NULL,
  `dateOfRequest` date DEFAULT NULL,
  `userType` varchar(20) DEFAULT NULL,
  `photoPath` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isAgent` varchar(10) DEFAULT NULL,
  `panNumber` varchar(20) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `fathername`, `address`, `dateOfBirth`, `maritalStatus`, `contactNumber`, `email`, `code`, `dateOfRequest`, `userType`, `photoPath`, `password`, `isAgent`, `panNumber`, `isActive`) VALUES
(7, 'sai', 'Abhinav', 'Suresh', 'HNo:11-34 , nature apartment,  hyderabad', '1991-11-22', 'Single', '7780497061', 'endrapu.saiabhinav4@gmail.com', NULL, '2023-10-02', 'Sales Partner', 'data/images/profile/qwertyu.png', 'e10adc3949ba59abbe56e057f20f883e', '1', 'qwertyu', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`bankDetail_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnerdetails`
--
ALTER TABLE `partnerdetails`
  ADD PRIMARY KEY (`partner_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`permission_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `reference`
--
ALTER TABLE `reference`
  ADD PRIMARY KEY (`reference_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `bankDetail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=720;

--
-- AUTO_INCREMENT for table `employeedetails`
--
ALTER TABLE `employeedetails`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partnerdetails`
--
ALTER TABLE `partnerdetails`
  MODIFY `partner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reference`
--
ALTER TABLE `reference`
  MODIFY `reference_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD CONSTRAINT `bankdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `employeedetails`
--
ALTER TABLE `employeedetails`
  ADD CONSTRAINT `employeedetails_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `partnerdetails`
--
ALTER TABLE `partnerdetails`
  ADD CONSTRAINT `partnerdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `partnerdetails_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `districts` (`district_id`);

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `permissions_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`);

--
-- Constraints for table `reference`
--
ALTER TABLE `reference`
  ADD CONSTRAINT `reference_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
