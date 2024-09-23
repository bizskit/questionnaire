-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 09:32 AM
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
-- Database: `questionnaire_new4`
--

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `choice_id` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสตัวเลือก',
  `question_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสคำถาม',
  `choice_text` varchar(255) NOT NULL COMMENT 'ข้อความตัวเลือก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`choice_id`, `question_id`, `choice_text`) VALUES
(00001, 0004, '1.ไม่กิน'),
(00002, 0004, '2.กินแต่ไม่บ่อย(1-2วัน)'),
(00003, 0004, '3.กินเป็นบางครั้ง(3-4วัน)'),
(00004, 0004, '4.กินเป็นประจำ(5-6วัน)'),
(00005, 0004, '5.กินทุกวัน'),
(00006, 0005, '1.ไม่ได้ออกกำลังกาย'),
(00007, 0005, '2.น้อยกว่า 3 วันต่อสัปดาห์'),
(00008, 0005, '3.จำนวน 3 วันต่อสัปดาห์'),
(00009, 0005, '4.มากกว่า 3 วันต่อสัปดาห์'),
(00010, 0005, '5.ทุกวัน'),
(00011, 0006, '1.สูบเป็นประจำ'),
(00012, 0006, '2.สูบบ่อยครั้ง'),
(00013, 0006, '3.สูบนานๆครั้ง'),
(00014, 0006, '4.ไม่สูบแต่เคยสูบ'),
(00015, 0006, '5.ไม่เคยสูบเลย'),
(00016, 0007, '1.ดื่มเกือบทุกวัน/เกือบทุกสัปดาห์'),
(00017, 0007, '2.ดื่มเกือบทุกเดือน'),
(00018, 0007, '3.ดื่มปีละ 1-2 ครั้ง'),
(00019, 0007, '4.ไม่ดื่มแต่เคยดื่ม'),
(00020, 0007, '5.ไม่เคยดื่มเลย'),
(00021, 0008, '1.ไม่พอใจเลย/พอใจน้อยที่สุด'),
(00022, 0008, '2.พอใจน้อย'),
(00023, 0008, '3.พอใจปานกลาง'),
(00024, 0008, '4.พอใจมาก'),
(00025, 0008, '5.พอใจมากที่สุด'),
(00026, 0009, '1.ไม่พอใจเลย/พอใจน้อยที่สุด'),
(00027, 0009, '2.พอใจน้อย'),
(00028, 0009, '3.พอใจปานกลาง'),
(00029, 0009, '4.พอใจมาก'),
(00030, 0009, '5.พอใจมากที่สุด'),
(00031, 0010, '1.ไม่ได้ทำ/น้อยที่สุด'),
(00032, 0010, '2.น้อย'),
(00033, 0010, '3.ปานกลาง'),
(00034, 0010, '4.มาก'),
(00035, 0010, '5.มากที่สุด'),
(00036, 0011, '1.เครียดมากที่สุด'),
(00037, 0011, '2.เครียดมาก'),
(00038, 0011, '3.เครียดปานกลาง'),
(00039, 0011, '4.เครียดน้อย'),
(00040, 0011, '5.ไม่เครียดเลย'),
(00041, 0012, '1.ไม่เป็นไปตามที่คาดหวังเลย'),
(00042, 0012, '2.เป็นไปตามที่คาดหวังเล็กน้อย'),
(00043, 0012, '3.เป็นไปตามที่คาดหวังปานกลาง'),
(00044, 0012, '4.เป็นไปตามที่คาดหวังมาก'),
(00045, 0012, '5.เป็นไปตามที่คาดหวังมากที่สุด'),
(00046, 0013, '1.ไม่สามารถจัดการได้เลย'),
(00047, 0013, '2.จัดการได้น้อยมาก'),
(00048, 0013, '3.จัดการได้ปานกลาง'),
(00049, 0013, '4.จัดการได้มาก'),
(00050, 0013, '5.จัดการได้มากที่สุด'),
(00051, 0014, '1.ไม่รู้สึกเลย/น้อยที่สุด'),
(00052, 0014, '2.น้อยมาก'),
(00053, 0014, '3.ปานกลาง'),
(00054, 0014, '4.มาก'),
(00055, 0014, '5.มากที่สุด'),
(00056, 0015, '1.ไม่เคย/แทบจะไม่เคยช่วย'),
(00057, 0015, '2.นานๆ ครั้ง'),
(00058, 0015, '3.ช่วยบ้างบางครั้ง'),
(00059, 0015, '4.ช่วยแทบทุกครั้ง'),
(00060, 0015, '5.ช่วยทุกครั้ง'),
(00061, 0020, '1.ไม่เต็มใจ/เต็มใจน้อยที่สุด'),
(00062, 0020, '2.น้อย'),
(00063, 0020, '3.ปานกลาง'),
(00064, 0020, '4.มาก'),
(00065, 0020, '5.มากที่สุด'),
(00066, 0021, '1.ไม่เข้าร่วม/เข้าร่วมน้อยที่สุด'),
(00067, 0021, '2.น้อย'),
(00068, 0021, '3.ปานกลาง'),
(00069, 0021, '4.มาก'),
(00070, 0021, '5.มากที่สุด'),
(00071, 0022, '1.ไม่ทำ/ทำน้อยที่สุด'),
(00072, 0022, '2.น้อย'),
(00073, 0022, '3.ปานกลาง'),
(00074, 0022, '4.มาก'),
(00075, 0022, '5.มากที่สุด'),
(00076, 0023, '1.ไม่ทำ/ทำน้อยที่สุด'),
(00077, 0023, '2.น้อย'),
(00078, 0023, '3.ปานกลาง'),
(00079, 0023, '4.มาก'),
(00080, 0023, '5.มากที่สุด'),
(00081, 0024, '1.ไม่ปฏิบัติ/ปฏิบัติน้อยที่สุด'),
(00082, 0024, '2.น้อย'),
(00083, 0024, '3.ปานกลาง'),
(00084, 0024, '4.มาก'),
(00085, 0024, '5.มากที่สุด'),
(00086, 0025, '1.ไม่ยอมรับ/ยอมรับน้อยที่สุด'),
(00087, 0025, '2.น้อย'),
(00088, 0025, '3.ปานกลาง'),
(00089, 0025, '4.มาก'),
(00090, 0025, '5.มากที่สุด'),
(00091, 0026, '1.ไม่ยอมรับ/ยอมรับน้อยที่สุด'),
(00092, 0026, '2.น้อย'),
(00093, 0026, '3.ปานกลาง'),
(00094, 0026, '4.มาก'),
(00095, 0026, '5.มากที่สุด'),
(00096, 0027, '1.ไม่ตอบแทน/ตอบแทนน้อยที่สุด'),
(00097, 0027, '2.น้อย'),
(00098, 0027, '3.ปานกลาง'),
(00099, 0027, '4.มาก'),
(00100, 0027, '5.มากที่สุด'),
(00221, 0040, '1.เป็นภาระหนักที่สุด'),
(00222, 0040, '2.เป็นภาระหนักมาก'),
(00223, 0040, '3.เป็นภาระปานกลาง'),
(00224, 0040, '4.เป็นภาระน้อย'),
(00225, 0040, '5.ไม่เป็นภาระ/ไม่ได้ผ่อนชำระ/ไม่มีหนี้สิน'),
(00226, 0041, '1.ไม่ตรงเวลาทุกครั้ง'),
(00227, 0041, '2.ไม่ตรงเวลาบ่อยครั้ง'),
(00228, 0041, '3.ตรงเวลาเป็นบางครั้ง'),
(00229, 0041, '4.ตรงเวลาเกือบทุกครั้ง'),
(00230, 0041, '5.ตรงเวลาทุกครั้ง/ไม่ได้ผ่อนชำระ/ไม่มีหนี้สิน'),
(00231, 0042, '1.ไม่มี/มีน้อยที่สุด'),
(00232, 0042, '2.มี/เก็บออมเพียงเล็กน้อย'),
(00233, 0042, '3.มี/เก็บออมปานกลาง'),
(00234, 0042, '4.มี/เก็บออมมาก'),
(00235, 0042, '5.มี/เก็บออมมากที่สุด'),
(00236, 0043, '1.รายจ่ายเกินกว่ารายได้มาก'),
(00237, 0043, '2.รายจ่ายเกินกว่าเล็กน้อย'),
(00238, 0043, '3.รายจ่ายพอๆ กับรายได้'),
(00239, 0043, '4.รายจ่ายน้อยกว่ารายได้'),
(00240, 0043, '5.รายจ่ายน้อยกว่ารายได้มาก'),
(00241, 0028, '1.ไม่เพียงพอ'),
(00242, 0028, '2.น้อย'),
(00243, 0028, '3.ปานกลาง'),
(00244, 0028, '4.มาก'),
(00245, 0028, '5.มากที่สุด'),
(00251, 0029, '1.ไม่ทำ/ทำน้อยที่สุด'),
(00252, 0029, '2.น้อย'),
(00253, 0029, '3.ปานกลาง'),
(00254, 0029, '4.มาก'),
(00255, 0029, '5.มากที่สุด'),
(00256, 0030, '1.ไม่มี/มีน้อยที่สุด'),
(00257, 0030, '2.น้อย'),
(00258, 0030, '3.ปานกลาง'),
(00259, 0030, '4.มาก'),
(00260, 0030, '5.มากที่สุด'),
(00261, 0031, '1.ไม่มี/มีน้อยที่สุด'),
(00262, 0031, '2.น้อย'),
(00263, 0031, '3.ปานกลาง'),
(00264, 0031, '4.มาก'),
(00265, 0031, '5.มากที่สุด'),
(00266, 0032, '1.ไม่ปฏิบัติ/ปฏิบัติน้อยที่สุด'),
(00267, 0032, '2.น้อย'),
(00268, 0032, '3.ปานกลาง'),
(00269, 0032, '4.มาก'),
(00270, 0032, '5.มากที่สุด'),
(00271, 0033, '1.ไม่รู้สึก/รู้สึกน้อยที่สุด'),
(00272, 0033, '2.น้อย'),
(00273, 0033, '3.ปานกลาง'),
(00274, 0033, '4.มาก'),
(00275, 0033, '5.มากที่สุด'),
(00276, 0034, '1.ไม่มี/มีน้อยที่สุด'),
(00277, 0034, '2.น้อย'),
(00278, 0034, '3.ปานกลาง'),
(00279, 0034, '4.มาก'),
(00280, 0034, '5.มากที่สุด'),
(00281, 0035, '1.ไม่มี/มีน้อยที่สุด'),
(00282, 0035, '2.น้อย'),
(00283, 0035, '3.ปานกลาง'),
(00284, 0035, '4.มาก'),
(00285, 0035, '5.มากที่สุด'),
(00286, 0036, '1.ไม่มี/มีน้อยที่สุด'),
(00287, 0036, '2.น้อย'),
(00288, 0036, '3.ปานกลาง'),
(00289, 0036, '4.มาก'),
(00290, 0033, '5.มากที่สุด'),
(00291, 0037, '1.ไม่สนใจ/สนใจน้อยที่สุด'),
(00292, 0037, '2.น้อย'),
(00293, 0037, '3.ปานกลาง'),
(00294, 0037, '4.มาก'),
(00295, 0037, '5.มากที่สุด'),
(00296, 0038, '1.ไม่สนใจ/สนใจน้อยที่สุด'),
(00297, 0038, '2.น้อย'),
(00298, 0038, '3.ปานกลาง'),
(00299, 0038, '4.มาก'),
(00300, 0038, '5.มากที่สุด'),
(00301, 0039, '1.ไม่มีโอกาส/มีโอกาสน้อยที่สุด'),
(00302, 0039, '2.น้อย'),
(00303, 0039, '3.ปานกลาง'),
(00304, 0039, '4.มาก'),
(00305, 0039, '5.มากที่สุด'),
(00306, 0044, '1.ไม่มี/มีน้อยที่สุด'),
(00307, 0044, '2.น้อย'),
(00308, 0044, '3.ปานกลาง'),
(00309, 0044, '4.มาก'),
(00310, 0044, '5.มากที่สุด'),
(00311, 0045, '1.ไม่มี/มีน้อยที่สุด'),
(00312, 0045, '2.น้อย'),
(00313, 0045, '3.ปานกลาง'),
(00314, 0045, '4.มาก'),
(00315, 0045, '5.มากที่สุด'),
(00316, 0046, '1.ไม่มั่นคง/มั่นคงน้อยที่สุด'),
(00317, 0046, '2.มั่นคงน้อย'),
(00318, 0046, '3.มั่นคงปานกลาง'),
(00319, 0046, '4.มั่นคงมาก'),
(00320, 0046, '5.มั่นคงมากที่สุด'),
(00321, 0047, '1.ไม่มีส่วนร่วม/มีน้อยที่สุด'),
(00322, 0047, '2.มีส่วนร่วมบ้างเล็กน้อย'),
(00323, 0047, '3.มีส่วนร่วมปานกลาง'),
(00324, 0047, '4.มีส่วนร่วมมาก'),
(00325, 0047, '5.มีส่วนร่วมมากที่สุด'),
(00326, 0048, '1.ไม่ได้เลย/ได้รับน้อยที่สุด'),
(00327, 0048, '2.ได้รับเล็กน้อย'),
(00328, 0048, '3.ได้รับพอสมควร'),
(00329, 0048, '4.ได้รับมาก'),
(00330, 0048, '5.ได้รับมากที่สุด'),
(00331, 0049, '1.ไม่เหมาะสม/เหมาะสมน้อยที่สุด'),
(00332, 0049, '2.น้อย'),
(00333, 0049, '3.ปานกลาง'),
(00334, 0049, '4.มาก'),
(00335, 0049, '5.มากที่สุด'),
(00336, 0050, '1.ไม่ถูกต้องทุกครั้ง'),
(00337, 0050, '2.ไม่ถูกต้องบ่อยครั้ง'),
(00338, 0050, '3.ถูกต้องเป็นบางครั้ง'),
(00339, 0050, '4.ถูกต้องเกือบทุกครั้ง'),
(00340, 0050, '5.ถูกต้องทุกครั้ง'),
(00341, 0051, '1.ไม่ตรงเวลาทุกครั้ง'),
(00342, 0051, '2.ไม่ตรงเวลาบ่อยครั้ง'),
(00343, 0051, '3.ตรงเวลาบ้างเป็นบางครั้ง'),
(00344, 0051, '4.ตรงเวลาเกือบทุกครั้ง'),
(00345, 0051, '5.ตรวเวลาทุกครั้ง'),
(00346, 0052, '1.ไม่คุ้มค่า/คุ้มค่าน้อยที่สุด'),
(00347, 0052, '2.คุ้มค่าน้อย'),
(00348, 0052, '3.คุ้มค่าปานกลาง'),
(00349, 0052, '4.คุ้มค่ามาก'),
(00350, 0052, '5.คุ้มค่ามากที่สุด'),
(00351, 0053, '1.ไม่ได้รับ/ได้รับน้อยที่สุด'),
(00352, 0053, '2.น้อย'),
(00353, 0053, '3.ปานกลาง'),
(00354, 0053, '4.มาก'),
(00355, 0053, '5.มากที่สุด'),
(00356, 0054, '1.ไม่พอใจเลย/พอใจน้อยที่สุด'),
(00357, 0054, '2.พอใจน้อย'),
(00358, 0054, '3.พอใจปานกลาง'),
(00359, 0054, '4.พอใจมาก'),
(00360, 0054, '5.พอใจมากที่สุด'),
(00361, 0055, '1.ไม่พอใจเลย/พอใจน้อยที่สุด'),
(00362, 0055, '2.พอใจน้อย'),
(00363, 0055, '3.พอใจปานกลาง'),
(00364, 0055, '4.พอใจมาก'),
(00365, 0055, '5.พอใจมากที่สุด'),
(00366, 0056, '1.ไม่ให้/ให้น้อยที่สุด'),
(00367, 0056, '2.น้อย'),
(00368, 0056, '3.ปานกลาง'),
(00369, 0056, '4.มาก'),
(00370, 0056, '5.มากที่สุด'),
(00371, 0057, '1.ไม่เหมือน/เหมือนน้อยที่สุด'),
(00372, 0057, '2.น้อย'),
(00373, 0057, '3.ปานกลาง'),
(00374, 0057, '4.มาก'),
(00375, 0057, '5.มากที่สุด'),
(00376, 0058, '1.ไม่สื่อสารเลย/สื่อสารน้อยที่สุด'),
(00377, 0058, '2.น้อย'),
(00378, 0058, '3.ปานกลาง'),
(00379, 0058, '4.มาก'),
(00380, 0058, '5.มากที่สุด'),
(00381, 0059, '1.ไม่มี/มีน้อยที่สุด'),
(00382, 0059, '2.น้อย'),
(00383, 0059, '3.ปานกลาง'),
(00384, 0059, '4.มาก'),
(00385, 0059, '5.มากที่สุด'),
(00391, 0036, '5.มากที่สุด'),
(00402, 0064, '1.ไม่มี/มีน้อยที่สุด'),
(00403, 0064, '2.น้อย'),
(00404, 0064, '3.ปานกลาง'),
(00405, 0064, '4.มาก'),
(00406, 0064, '5.มากที่สุด'),
(00407, 0065, '1.ไม่มี/แนะนำน้อยที่สุด'),
(00408, 0065, '2.น้อย'),
(00409, 0065, '3.ปานกลาง'),
(00410, 0065, '4.มาก'),
(00411, 0065, '5.มากที่สุด'),
(00412, 0066, '1.ไม่มี/ปกป้องน้อยที่สุด'),
(00413, 0066, '2.น้อย'),
(00414, 0066, '3.ปานกลาง'),
(00415, 0066, '4.มาก'),
(00416, 0066, '5.มากที่สุด'),
(00417, 0067, '1.ไม่ภาคภูมิใจ/ภูมิใจน้อยที่สุด'),
(00418, 0067, '2.น้อย'),
(00419, 0067, '3.ปานกลาง'),
(00420, 0067, '4.มาก'),
(00421, 0067, '5.มากที่สุด'),
(00422, 0068, '1.ลาออกแน่นอน'),
(00423, 0068, '2.อาจจะลาออก'),
(00424, 0068, '3.น่าจะลาออก'),
(00425, 0068, '4.ไม่ลาออก'),
(00426, 0068, '5.ไม่ลาออกแน่นอน'),
(00427, 0069, '1.ไปแน่นอน/ไปทันที'),
(00428, 0069, '2.คิดว่าจะไป'),
(00429, 0069, '3.ไม่แน่ใจ'),
(00430, 0069, '4.ไม่ไป'),
(00431, 0069, '5.ไม่ไปแน่นอน'),
(00432, 0070, '1.ไม่/รู้สึกน้อยที่สุด'),
(00433, 0070, '2.น้อย'),
(00434, 0070, '3.ปานกลาง'),
(00435, 0070, '4.มาก'),
(00436, 0070, '5.มากที่สุด'),
(00437, 0071, '1.ไม่/ทุ่มเทน้อยที่สุด'),
(00438, 0071, '2.น้อย'),
(00439, 0071, '3.ปานกลาง'),
(00440, 0071, '4.มาก'),
(00441, 0071, '5.มากที่สุด'),
(00442, 0072, '1.ไม่/น้อยที่สุด'),
(00443, 0072, '2.น้อย'),
(00444, 0072, '3.ปานกลาง'),
(00445, 0072, '4.มาก'),
(00446, 0072, '5.มากที่สุด'),
(00447, 0073, '1.ไม่มี/มีน้อยที่สุด'),
(00448, 0073, '2.น้อย'),
(00449, 0073, '3.ปานกลาง'),
(00450, 0073, '4.มาก'),
(00451, 0073, '5.มากที่สุด'),
(00452, 0074, '1.ทำงาน 1-2 วัน'),
(00453, 0074, '2.ทำงาน 3-4 วัน'),
(00454, 0074, '3.ทำงาน 5 วัน'),
(00455, 0074, '4.ทำงาน 6 วัน'),
(00456, 0074, '5.ทำงานทุกวัน'),
(00457, 0075, '1.น้อยกว่า 6 ชั่วโมง'),
(00458, 0075, '2.6-8 ชั่วโมง'),
(00459, 0075, '3.9-10 ชั่วโมง'),
(00460, 0075, '4.11-12 ชั่วโมง'),
(00461, 0075, '5.มากกว่า 12 ชั่วโมง'),
(00462, 0076, '1.น้อยกว่า 1 ชั่วโมง'),
(00463, 0076, '2.1-2 ชั่วโมง'),
(00464, 0076, '3.3-5 ชั่วโมง'),
(00465, 0076, '4.6-7 ชั่วโมง'),
(00466, 0076, '5.8 ชั่วโมง'),
(00467, 0077, '1.ไม่มี/มีน้อยที่สุด'),
(00468, 0077, '2.น้อย'),
(00469, 0077, '3.ปานกลาง'),
(00470, 0077, '4.มาก'),
(00471, 0077, '5.มากที่สุด'),
(00472, 0078, '1.ไม่ตรงตามวุฒิ/น้อยที่สุด'),
(00473, 0078, '2.น้อย'),
(00474, 0078, '3.ปานกลาง'),
(00475, 0078, '4.มาก'),
(00476, 0078, '5.มากที่สุด');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสแผนก',
  `department_name` varchar(255) NOT NULL COMMENT 'ชื่อแผนก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`) VALUES
(001, 'แผนกธุรการกำลังพล'),
(002, 'แผนกงบประมาณ'),
(003, 'แผนกการเงิน'),
(004, 'หน้าห้องผู้อำนวยการ'),
(005, 'แผนกฉุกเฉิน'),
(006, 'แผนกทันตกรม'),
(007, 'แผนกลูกค้าสัมพันธ์'),
(008, 'แผนกเอกซเรย์'),
(009, 'แผนกเวชระเบียนและสถิติ'),
(010, 'จุดคัดกรอง'),
(011, 'แผนกตรวจโรคผู้ป่วยนอก'),
(012, 'แผนกพยาธิ'),
(013, 'แผนกเภสัชกรรม'),
(014, 'แผนกเก็บเงินรายได้'),
(015, 'แผนกสื่อสาร'),
(016, 'แผนกตรวจสุขภาพ'),
(017, 'แผนกคุณภาพ'),
(018, 'แผนกผู้ป่วยใน'),
(019, 'แผนกพยาบาล'),
(020, 'แผนกเทคโนโลยีสารสนเทศ'),
(021, 'ศูนย์ไตเทียม'),
(022, 'แผนกแพทย์แผนไทย'),
(023, 'แผนกกายภาพบำบัด'),
(024, 'แผนกโภชนาการ'),
(025, 'แผนกพลาธิการ'),
(026, 'แผนกส่งกำลังและบริการ'),
(027, 'แผนกส่งกำลังสายแพทย์'),
(028, 'แผนกซักรีด-จ่ายกลาง'),
(029, 'โรงรถ'),
(030, 'แผนกยุทธโยธา'),
(031, 'หมวดพล');

-- --------------------------------------------------------

--
-- Table structure for table `educational`
--

CREATE TABLE `educational` (
  `educational_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสวุฒิการศึกษา',
  `educational_name` varchar(255) NOT NULL COMMENT 'ชื่อวุฒิการศึกษา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `educational`
--

INSERT INTO `educational` (`educational_id`, `educational_name`) VALUES
(001, 'ระดับมัธยมศึกษาตอนต้น'),
(002, 'ระดับมัธยมศึกษาตอนปลาย'),
(003, 'ประกาศนียบัตรวิชาชีพ(ปวช.)'),
(004, 'ประกาศนียบัตรวิชาชีพชั้นสูง(ปวส.)'),
(005, 'ปริญญาตรี'),
(006, 'ปริญญาโท'),
(007, 'ปริญญาเอก'),
(010, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `genneration`
--

CREATE TABLE `genneration` (
  `genneration_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสรุ่น',
  `genneration_name` varchar(255) NOT NULL COMMENT 'ชื่อรุ่น'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genneration`
--

INSERT INTO `genneration` (`genneration_id`, `genneration_name`) VALUES
(001, 'Gen B เกิด พ.ศ. 2498-2507'),
(002, 'Gen X เกิด พ.ศ. 2508-2522'),
(003, 'Gen Y เกิด พ.ศ. 2523-2540'),
(004, 'Gen Z เกิด พ.ศ. 2541 ขึ้นไป');

-- --------------------------------------------------------

--
-- Table structure for table `headtopic`
--

CREATE TABLE `headtopic` (
  `headtopic_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสแบบสอบถาม',
  `head_name` varchar(255) NOT NULL COMMENT 'ชื่อแบบสอบถาม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `headtopic`
--

INSERT INTO `headtopic` (`headtopic_id`, `head_name`) VALUES
(001, 'แบบสำรวจความสุขด้วยตนเอง: HAPPINOMETER ความสุขวัดเองก็ได้');

-- --------------------------------------------------------

--
-- Table structure for table `headtopicresponses`
--

CREATE TABLE `headtopicresponses` (
  `headtopic_responses_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสการทำแบบสอบถาม',
  `headtopic_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสแบบทดสอบ',
  `id_card` varchar(25) NOT NULL COMMENT 'บัตรประชาชน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `number_year_work`
--

CREATE TABLE `number_year_work` (
  `number_year_work_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสจำนวนปีที่ทำงาน',
  `number_year_work_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'ชื่อจำนวนปีที่ทำงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `number_year_work`
--

INSERT INTO `number_year_work` (`number_year_work_id`, `number_year_work_name`) VALUES
(001, '5 ปี หรือน้อยกว่า '),
(002, '6-10 ปี'),
(003, '11-20 ปี'),
(004, '21 ปี ขึ้นไป');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `position_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสตำแหน่ง',
  `position_name` varchar(255) NOT NULL COMMENT 'ชื่อตำแหน่ง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`position_id`, `position_name`) VALUES
(001, 'ข้าราชการ'),
(002, 'พนักงานราชการ'),
(003, 'ลูกจ้างวิชาชีพ/ลูกจ้างชั่วคราว'),
(004, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสคำถาม',
  `section_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสหัวข้อ',
  `questions_name` varchar(255) NOT NULL COMMENT 'ข้อความคำถาม'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `section_id`, `questions_name`) VALUES
(0004, 001, '1.โดยปกติท่านกินอาหารเช้าเฉลี่ยสัปดาห์ละกี่วัน'),
(0005, 001, '2.ปัจจุบันท่านออกกำลังกายโดยเฉลี่ยสัปดาห์ละกี่วัน'),
(0006, 001, '3.ปัจจุบันท่านสูบบุหรี่/ใบจาก/ยาเส้น หรือไม่'),
(0007, 001, '4.ปัจจุบันท่านดื่มเครื่องดื่มที่มีแอลกอฮอล์ เช่น เหล้า เบียร์ ไวน์ สาโท หรือสุราพื้นบ้านหรือไม่'),
(0008, 001, '5.โดยรวมแล้วท่านพึงพอใจกับสุขภาพกายของท่านหรือไม่'),
(0009, 002, '6.โดยรวมแล้วท่านรู้สึกว่าได้รับการพักผ่อนเพียงพอหรือไม่'),
(0010, 002, '7.โดยรวมแล้วใน 1 สัปดาห์ท่านทำกิจกรรมเพื่อเป็นการพักผ่อนหย่อนใจหรือไม่'),
(0011, 002, '8.โดยรวมแล้วท่านมีความเครียด(เครียดจากการทำงาน/เรื่องครอบครัว/เรื่องอื่นๆ)บ้างหรือไม่'),
(0012, 002, '9.โดยรวมแล้วท่านคิดว่าชีวิตของท่านเป็นไปตามที่ท่านคาดหวังหรือไม่'),
(0013, 002, '10.เมื่อประสบปัญหาในชีวิต โดยทั่วไปท่านสามารถจัดการกับปัญหาได้หรือไม่'),
(0014, 003, '11.โดยรวมแล้ว ท่านรู้สึกเอื้ออาทร/ห่วยใยต่อคนรอบข้างหรือไม่'),
(0015, 003, '12.โดยรวมแล้ว ท่านให้การช่วยเหลือแก่คนรอบข้างหรือไม่'),
(0020, 003, '13.โดยรวมแล้วท่านเต็มใจและยินดี ในการทำประโยชน์เพื่อส่วนรวม หรือไม่'),
(0021, 003, '14.โดยรวมแล้วท่านเข้าร่วมกิจกรรมที่เป็นประโยชน์ต่อสังคม เช่น การปลูกป่า การบริจาคสิ่งของ หรือไม่'),
(0022, 003, '15.โดยรวมแล้วท่านได้ทำกิจกรรมที่สามารถทำได้ด้วยตนเองและมีประโยชน์ต่อสังคม เช่น การคัดแยกขยะ การลดใช้ถุงพลาสติก เป็นต้น'),
(0023, 004, '16.โดยรวมแล้วท่านทำนุบำรุงศิลปวัฒนธรรม/ศาสนา/การให้ทาน หรือไม่'),
(0024, 004, '17.โดยรวมแล้ว ท่านปฏิบัติกิจตามศาสนาเพื่อให้จิตใจสงบ หรือไม่'),
(0025, 004, '18.โดยรวมแล้ว ท่านยกโทษและให้อภัยอย่างจริงใจต่อผู้ที่สำนึกผิด'),
(0026, 004, '19.โดยรวมแล้ว ท่านยอมรับและขอโทษในความผิดที่ทำหรือมีส่วนรับผิดชอบ'),
(0027, 004, '20.โดยรวมแล้ว ท่านตอบแทนผู้มีพระคุณ หรือช่วยเหลือท่าน'),
(0028, 005, '21.ท่านมีเวลาอยู่กับครอบครัว เพียงพอหรือไม่'),
(0029, 005, '22.ท่าน ทำกิจกรรม(ออกกำลังกาย ทำบุญ ซื้อของ ไปทำบุญ ปลูกต้น)'),
(0030, 005, '23.โดยรวมแล้วท่านมีความสุขกับครอบครัวของท่าน หรือไม่'),
(0031, 006, '24.โดยรวมแล้ว เพื่อนบ้าน มีความสัมพันธ์ที่ดีต่อท่านหรือไม่'),
(0032, 006, '25.โดยรวมแล้วท่านปฏิบัติตามกฎระเบียบ/ข้อบังคับของสังคม หรือไม่'),
(0033, 006, '26.โดยรวมแล้วท่านรู้สึก ปลอดภัยในชีวิตและทรัพย์สิน หรือไม่'),
(0034, 006, '27.โดยรวมแล้ว เมื่อท่านมีปัญหา ท่านสามารถขอความช่วยเหลือจากคนในชุมชน หรือไม่'),
(0035, 006, '28.โดยรวมแล้ว ท่านรู้สึกว่า สังคมไทยทุกวันนี้ มีความสงบสุข หรือไม่'),
(0036, 006, '29.โดยรวมแล้วทุกวันนี้ท่านใช้ชีวิตในสังคมอย่างมีความสุข หรือไม่'),
(0037, 007, '30.โดยรวมแล้วท่านสนใจในการแสวงหาความรู้ใหม่ๆ เพิ่มเติมจากแหล่งความรู้ต่างๆ หรือไม่'),
(0038, 007, '31.โดยรวมแล้ว ท่านสนใจที่จะพัฒนาตนเอง เพื่อความก้าวหน้าในชีวิต หรือไม่'),
(0039, 007, '32.ท่านมีโอกาสที่จะได้รับการอบรม/ศึกษาต่อ/ดูงาน เพื่อพัฒนาทักษะและความสามารถของตนเอง หรือไม่'),
(0040, 008, '33.ท่านรู้สึกว่า การผ่อนชำระหนี้สินต่างๆ โดยรวมของท่านในปัจจุบันเป็นภาระ หรือไม่'),
(0041, 008, '34.ท่านผ่อนชำระหนี้ตามกำหนดเวลาทุกครั้งหรือไม่'),
(0042, 008, '35.โดยรวมแล้ว ท่านมีเงินเก็บออมในแต่ละเดือนหรือไม่'),
(0043, 008, '36.โดยรวมแล้ว ค่าตอบแทนที่ท่านได้รับทั้งหมดในแต่ละเดือนเป็นอย่างไร เมื่อเปรียบเทียบกับรายจ่ายทั้งหมดในแต่ละเดือน'),
(0044, 009, '37.งานของท่าน มีความท้าทายและส่งเสริมให้ท่านได้เรียนรู้สิ่งใหม่ๆ หรือไม่'),
(0045, 009, '38.งานของท่าน มีความชัดเจนของโอกาสในการเติบโตในตำแหน่ง หน้าที่หรือไม่'),
(0046, 009, '39.งานของท่านในขณะนี้มีความมั่นคง หรือไม่'),
(0047, 009, '40.ในการทำงาน ท่านสามารถแสดงความคิดเห็นและมีส่วนร่วมในข้อเสนอแนะกับนายจ้าง หรือหัวหน้างาน หรือไม่'),
(0048, 009, '41.ท่านได้รับ การปฎิบัติอย่างถูกต้องตามกฎหมายแรงงาน/พรบ.ข้าราชการ 2551/พรบ.แรงงานรัฐวิสาหกิจสัมพันธ์ 2547/กฎหมายอื่นๆ จากองค์กรของท่าน หรือไม่'),
(0049, 009, '42.ท่านได้รับการพิจารณาเลื่อนขั้น/เลื่อนตำแหน่ง/ปรับขึ้นเงินค่าจ้างประจำปีที่ผ่านมาด้วยความเหมาะสมหรือไม่'),
(0050, 009, '43.ความถูกต้อง ของการจ่ายค่าจ้าง ค่าล่วงเวลา อื่นๆ ที่ท่านได้รับจากองค์กรของท่านเป็นอย่างไร'),
(0051, 009, '44.ความตรงเวลา ของการจ่ายค่าจ้าง ค่าล่วงเวลา อื่นๆ ที่ท่านได้รับจากองค์กรของท่านเป็นอย่างไร'),
(0052, 009, '45.ค่าตอบแทนที่ท่านได้รับคุ้มค่ากับความเสี่ยงที่อาจเกิดจากการทำงาน(การถูกฟ้องร้อง/การได้รับอันตรายจากการทำงาน)'),
(0053, 009, '46.ท่านได้รับการดูแลเกี่ยวกับสุขภาพที่ดีจากองค์กร หรือไม่'),
(0054, 009, '47.ท่านพึงพอใจต่อสภาพแวดล้อมโดยรวมขององค์กร หรือไม่'),
(0055, 009, '48.ท่านพึงพอใจกับสวัสดิการที่องค์กรจัดให้หรือไม่'),
(0056, 009, '49.โดยรวมแล้วที่ทำงานของท่านให้ความสำคัญกับการทำงานเป็นทีมหรือไม่'),
(0057, 009, '50.โดยรวมแล้วความสัมพันธ์ในที่ทำงานของท่านเหมือนพี่เหมือนน้อง หรือไม่'),
(0058, 009, '51.โดยรวมแล้วท่านสื่อสารพูดคุยกับเพื่อนร่วมงานในที่ทำงานหรือไม่'),
(0059, 009, '52.โดยรวมแล้วในที่ทำงานของท่านมีการถ่ายทอดแลกเปลี่ยนแบบอย่างการทำงานระหว่างกันหรือไม่'),
(0064, 009, '53.โดยรวมแล้วท่านทำงานอย่าง มีความสุข หรือไม่'),
(0065, 011, '54.ท่านจะแนะนำญาติ/เพื่อน/คนรู้จักมาทำงานที่องค์กรของท่านหรือไม่'),
(0066, 011, '55.หากมีใครกล่าวถึงองค์กรในทางที่ไม่เหมาะสม ท่านจะปกป้ององค์กรของท่านหรือไม่'),
(0067, 011, '56.ท่านภาคภูมิใจที่ได้เป็นพนักงาน/บุคลากรขององค์กร/ได้ทำงานในองค์กรนี้หรือไม่'),
(0068, 011, '57.ขณะที่ทำงานอยู่ในองค์กรนี้ หากท่านมีโอกาสได้ศึกษาต่อและเมื่อสำเร็จการศึกษาแล้ว ท่านจะทำงานต่อหรือไม่'),
(0069, 011, '58.ถ้าท่านมีโอกาสเปลี่ยนสถานที่ทำงาน หรือองค์กรอื่นชวน/ติดต่อไปทำงาน ท่านพร้อมที่จะไป หรือไม่'),
(0070, 011, '59.ท่านรู้สึกเป็นเจ้าของร่วมขององค์กรที่ท่านทำงานในปัจจุบัน หรือไม่'),
(0071, 011, '60.ท่านทุ่มเททำงานเพื่อประโยชน์ขององค์กรของท่านหรือไม่'),
(0072, 011, '61.ท่านเป็นคน คิดใหม่ ทำใหม่ เพื่อสร้างความก้าวหน้าให้กับองค์กรของท่านหรือไม่'),
(0073, 011, '62.ในแต่ละวัน ท่านทำงานอย่างมีเป้าหมาย หรือไม่'),
(0074, 012, '63.ท่านรู้สึกว่า โดยเฉลี่ยในหนึ่งสัปดาห์ท่านทำงานกี่วัน'),
(0075, 012, '64.ท่านรู้สึกว่าโดยเฉลี่ยท่านทำงานวันละกี่ชั่วโมง'),
(0076, 012, '65.ท่านรู้สึกว่าได้พักผ่อนโดยเฉลี่ย (ไม่รวมการนหลับตอนกลางคืน) วันละกี่ชั่วโมง'),
(0077, 012, '66.หน่วยงานของท่านมีความยึดหยุ่นในการทำงานหรือไม่ (เช่น ความยึดหยุ่นในการทำงานนอกสถานที่ ไม่ต้องเข้างาน/ออก งานตามเวลาที่กำหนด/สามารถเลือกวันหยุดของตนเองได้ ฯลฯ)'),
(0078, 012, '67.ท่านทำงานตรงตามวุฒิการศึกษาหรือไม่');

-- --------------------------------------------------------

--
-- Table structure for table `response`
--

CREATE TABLE `response` (
  `response_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสคำตอบ',
  `question_id` int(4) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสคำถาม',
  `choice_id` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสตัวเลือก',
  `id_card` varchar(25) NOT NULL COMMENT 'บัตรประชาชน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sections_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสหัวข้อ',
  `headtopic_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสแบบสอบถาม',
  `section_name` varchar(255) NOT NULL COMMENT 'ชื่อหัวข้อ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sections_id`, `headtopic_id`, `section_name`) VALUES
(001, 001, 'Happy Body / สุขภาพดี'),
(002, 001, 'Happy Relax / ผ่อนคลายดี'),
(003, 001, 'Happy Heart / น้ำใจดี'),
(004, 001, 'Happy Soul / จิตวิญญาณดี'),
(005, 001, 'Happy Family / ครอบครัวดี'),
(006, 001, 'Happy Society / สังคมดี'),
(007, 001, 'Happy Brain / ใฝ่รู้ดี'),
(008, 001, 'Happy Money / สุขภาพเงินดี'),
(009, 001, 'Happy Work Life (Happy Plus) / การงานดี'),
(011, 001, 'ความผูกพัน'),
(012, 001, 'สมดุลชีวิตกับการทำงาน');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `title_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสคำนำหน้า',
  `title_name` varchar(55) NOT NULL COMMENT 'ชื่อคำนำหน้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`title_id`, `title_name`) VALUES
(014, 'นาย'),
(015, 'นาง'),
(016, 'นางสาว'),
(017, 'พลฯ'),
(018, 'ส.ต.'),
(019, 'ส.ต.หญิง'),
(020, 'ส.ท.'),
(021, 'ส.ท.หญิง'),
(022, 'ส.อ.'),
(023, 'ส.อ.หญิง'),
(024, 'จ.ส.ต.'),
(025, 'จ.ส.ต.หญิง'),
(026, 'จ.ส.ท.'),
(027, 'จ.ส.ท.หญิง'),
(028, 'จ.ส.อ.'),
(029, 'จ.ส.อ.หญิง'),
(030, 'ร.ต.'),
(031, 'ร.ต.หญิง'),
(032, 'ร.ท.'),
(033, 'ร.ท.หญิง'),
(034, 'ร.อ.'),
(035, 'ร.อ.หญิง'),
(036, 'พ.ต.'),
(037, 'พ.ต.หญิง'),
(038, 'พ.ท.'),
(039, 'พ.ท.หญิง'),
(040, 'พ.อ.'),
(041, 'พ.อ.หญิง'),
(042, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสผู้ใช้',
  `title_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสคำนำหน้า',
  `firstname` varchar(55) NOT NULL COMMENT 'ชื่อแรก',
  `lastname` varchar(55) NOT NULL COMMENT 'นามสกุล',
  `id_card` varchar(25) NOT NULL COMMENT 'บัตรประชาชน',
  `department_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสแผนก',
  `sex` varchar(15) NOT NULL COMMENT 'เพศ',
  `educational_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสวุฒิการศึกษา',
  `genneration_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสรุ่น',
  `position_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสตำแหน่ง',
  `work_type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทงาน',
  `number_year_work_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสจำนวนปีที่ทำงาน',
  `role` int(1) UNSIGNED ZEROFILL NOT NULL COMMENT 'สถานะ',
  `weight` varchar(5) NOT NULL COMMENT 'น้ำหนัก',
  `height` varchar(5) NOT NULL COMMENT 'ส่วนสูง',
  `waistline` varchar(5) NOT NULL COMMENT 'รอบแล้ว'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `title_id`, `firstname`, `lastname`, `id_card`, `department_id`, `sex`, `educational_id`, `genneration_id`, `position_id`, `work_type_id`, `number_year_work_id`, `role`, `weight`, `height`, `waistline`) VALUES
(00016, 014, 'ad', 'min', 'adminedit', 020, 'ไม่ระบุ', 005, 004, 003, 004, 001, 1, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `work_type`
--

CREATE TABLE `work_type` (
  `work_type_id` int(3) UNSIGNED ZEROFILL NOT NULL COMMENT 'รหัสประเภทงาน',
  `work_type_name` varchar(255) NOT NULL COMMENT 'ชื่อประเภทงาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_type`
--

INSERT INTO `work_type` (`work_type_id`, `work_type_name`) VALUES
(001, 'แพทย์/ทันตแพทย์'),
(002, 'พยาบาทวิชาชีพ'),
(003, 'กลุ่ม Allied Health'),
(004, 'กลุ่ม Back office'),
(005, 'อื่นๆ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`choice_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `educational`
--
ALTER TABLE `educational`
  ADD PRIMARY KEY (`educational_id`);

--
-- Indexes for table `genneration`
--
ALTER TABLE `genneration`
  ADD PRIMARY KEY (`genneration_id`);

--
-- Indexes for table `headtopic`
--
ALTER TABLE `headtopic`
  ADD PRIMARY KEY (`headtopic_id`);

--
-- Indexes for table `headtopicresponses`
--
ALTER TABLE `headtopicresponses`
  ADD PRIMARY KEY (`headtopic_responses_id`),
  ADD UNIQUE KEY `id_card_2` (`id_card`),
  ADD KEY `headtopic_id` (`headtopic_id`),
  ADD KEY `id_card` (`id_card`);

--
-- Indexes for table `number_year_work`
--
ALTER TABLE `number_year_work`
  ADD PRIMARY KEY (`number_year_work_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `response`
--
ALTER TABLE `response`
  ADD PRIMARY KEY (`response_id`),
  ADD KEY `choice_id` (`choice_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `id_card` (`id_card`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sections_id`),
  ADD KEY `headtopic_id` (`headtopic_id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`title_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `id_card` (`id_card`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `genneration_id` (`genneration_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `title_id` (`title_id`),
  ADD KEY `work_type_id` (`work_type_id`),
  ADD KEY `users_ibfk_7` (`number_year_work_id`),
  ADD KEY `educational_id` (`educational_id`) USING BTREE;

--
-- Indexes for table `work_type`
--
ALTER TABLE `work_type`
  ADD PRIMARY KEY (`work_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `choice_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสตัวเลือก', AUTO_INCREMENT=477;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสแผนก', AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `educational`
--
ALTER TABLE `educational`
  MODIFY `educational_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสวุฒิการศึกษา', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `genneration`
--
ALTER TABLE `genneration`
  MODIFY `genneration_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสรุ่น', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `headtopic`
--
ALTER TABLE `headtopic`
  MODIFY `headtopic_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสแบบสอบถาม', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `headtopicresponses`
--
ALTER TABLE `headtopicresponses`
  MODIFY `headtopic_responses_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสการทำแบบสอบถาม';

--
-- AUTO_INCREMENT for table `number_year_work`
--
ALTER TABLE `number_year_work`
  MODIFY `number_year_work_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสจำนวนปีที่ทำงาน', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `position_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสตำแหน่ง', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำถาม', AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `response`
--
ALTER TABLE `response`
  MODIFY `response_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำตอบ';

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sections_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสหัวข้อ', AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `title_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสคำนำหน้า', AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสผู้ใช้', AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `work_type`
--
ALTER TABLE `work_type`
  MODIFY `work_type_id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'รหัสประเภทงาน', AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE;

--
-- Constraints for table `headtopicresponses`
--
ALTER TABLE `headtopicresponses`
  ADD CONSTRAINT `headtopicresponses_ibfk_1` FOREIGN KEY (`headtopic_id`) REFERENCES `headtopic` (`headtopic_id`),
  ADD CONSTRAINT `headtopicresponses_ibfk_2` FOREIGN KEY (`id_card`) REFERENCES `users` (`id_card`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`sections_id`);

--
-- Constraints for table `response`
--
ALTER TABLE `response`
  ADD CONSTRAINT `response_ibfk_1` FOREIGN KEY (`choice_id`) REFERENCES `choice` (`choice_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `response_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `response_ibfk_3` FOREIGN KEY (`id_card`) REFERENCES `users` (`id_card`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`headtopic_id`) REFERENCES `headtopic` (`headtopic_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`educational_id`) REFERENCES `educational` (`educational_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`genneration_id`) REFERENCES `genneration` (`genneration_id`),
  ADD CONSTRAINT `users_ibfk_4` FOREIGN KEY (`position_id`) REFERENCES `position` (`position_id`),
  ADD CONSTRAINT `users_ibfk_5` FOREIGN KEY (`work_type_id`) REFERENCES `work_type` (`work_type_id`),
  ADD CONSTRAINT `users_ibfk_6` FOREIGN KEY (`title_id`) REFERENCES `title` (`title_id`),
  ADD CONSTRAINT `users_ibfk_7` FOREIGN KEY (`number_year_work_id`) REFERENCES `number_year_work` (`number_year_work_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
