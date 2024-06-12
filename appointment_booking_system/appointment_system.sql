-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 08:10 AM
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
-- Database: `appointment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `idnumber` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `fulladdress` text NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `civilstatus` enum('Single','Married','Divorced','Widowed') NOT NULL,
  `gender` enum('Male','Female','Others') NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `idnumber`, `firstname`, `middlename`, `lastname`, `birthdate`, `fulladdress`, `phonenumber`, `email`, `civilstatus`, `gender`, `appointment_date`, `appointment`, `created_at`) VALUES
(2, '123123123', 'A', 'B', 'C', '2000-11-30', '21312312', '312312312', '345345@gmail.com', 'Single', 'Male', '2024-06-12', '123123', '2024-06-11 03:59:41'),
(3, '20000393', 'Ebrahim', 'Ebrahimm', 'Ebrahimmm', '2000-11-30', 'RH 10, Cotabato City, Maguindanao del Norte', '09531238169', 'ebrahimomar24437@gmail.com', 'Single', 'Male', '2024-06-22', 'Dentist Appointment', '2024-06-11 05:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Ebrahim', 'ebrahimomar237@gmail.com', '$2y$10$QAEYOn63dBQX1QxIbEJx7esMR9J9FKVEfAZ9ZwUVG7m3.ms53waXS'),
(2, 'admin', 'admin@gmail.com', '$2y$10$N7sFLqdgyEZZv80cywepieeRBFZF5IcEv3JGmEQ3e.qIgfjZer9he'),
(3, 'admin2', 'admin2@gmail.com', '$2y$10$NONvLlta3NqrXVrs7IlJE.emr8yg.FuZVjFSm03p.JJDUWuUFVvx2'),
(4, 'Ebrahim', 'Ebrahim@gmail.com', '$2y$10$CwVZM.8yxZE8ZNkBzd5qmOCek2lkd6VJ.H39flTusqwmtBFCttFH.'),
(5, 'ad', 'ad@gmail.com', '$2y$10$H2QdL.klLXIuozBldBQyVeDPZNrwq83nH8/IOHDPFd0bMlRS7h1Mu'),
(6, 'a', 'a@gmail.com', '$2y$10$oF.htUlLHW.xPqQ8/8dKRuR5ID6SQ4xh.mnRQmqdfX9rGIxz4L3ZS'),
(7, 'pop', 'pop@gmail.com', '$2y$10$R860a/l3E.gq/mrvnld3Qu2PvtW6Dfqo5RWF.XOZ3eJKwPIY/Rljm'),
(8, 'rr', 'rr@gmail.com', '$2y$10$SkNjWUX2I796Px9CL8SVjO5m6GYAJ8YjV76i8X.jNC.6R08/kRV9S'),
(9, '1ua_duibhne', '1ua_duibhne@gmail.com', '$2y$10$PtLtlODbs.w6GqbFrn0gAuNqgp./CCLZxEuNVYNCrnbwO9rwFX3Ga'),
(10, 'ebrahimomar', 'ebrahimomar@gmail.com', '$2y$10$0V3ryboO9NfvTSFRTb26D.yl.gI9/gG8BEhPWMLQOymUuIDa3gwsa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
