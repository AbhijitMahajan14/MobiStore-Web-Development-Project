

--
-- Database: `storeprocedure`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `checkavailbilty`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkavailbilty` (IN `email` VARCHAR(255))  NO SQL
SELECT EmailId FROM tblregistration  WHERE EmailId=email$$

DROP PROCEDURE IF EXISTS `login`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login` (IN `useremail` VARCHAR(255), IN `password` VARCHAR(255))  NO SQL
SELECT EmailId,Password from  tblregistration where EmailId=useremail and Password=password$$

DROP PROCEDURE IF EXISTS `registration`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `registration` (IN `fname` VARCHAR(200), IN `emailid` VARCHAR(200), IN `password` VARCHAR(255))  NO SQL
insert into tblregistration(FullName,EmailId,Password) VALUES(fname,emailid,password)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblregistration`
--

DROP TABLE IF EXISTS `tblregistration`;
CREATE TABLE `tblregistration` (
  `id` int(11) NOT NULL,
  `FullName` varchar(200) NOT NULL,
  `EmailId` varchar(200) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblregistration`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblregistration`
--
ALTER TABLE `tblregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblregistration`
--
ALTER TABLE `tblregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
