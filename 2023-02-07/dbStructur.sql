
--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
`id` int(11) NOT NULL,
`name` text NOT NULL,
`email` varchar(191) NOT NULL,
`phone_no` varchar(191) NOT NULL,
`password` varchar(255) NOT NULL,
`remember_me` varchar(255) DEFAULT NULL,
`status` int(11) NOT NULL DEFAULT 1,
`created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--


--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--


--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


