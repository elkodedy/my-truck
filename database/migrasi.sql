-- SQL MANUAL

-- ---------------- TRUK -------------------
-- TRUK KATEGORI
DROP TABLE IF EXISTS `tbl_web_truck`;
CREATE TABLE `tbl_web_truck` (
    `truck_id` int(11) NOT NULL,
    `truck_name` varchar(50) NOT NULL,
    `truck_plat` varchar(50) NOT NULL,
    `truck_image` varchar(50) NOT NULL,
    `truck_color` varchar(50) NOT NULL,
    `truck_stnk` varchar(50) NOT NULL,
    `truck_desc` text NOT NULL,
    `createtime` datetime NOT NULL,
    `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_truck`
    ADD PRIMARY KEY (`truck_id`),
    MODIFY `truck_id` int(11) NOT NULL AUTO_INCREMENT;


-- ---------------- WORK -------------------
-- WORK KATEGORI
DROP TABLE IF EXISTS `tbl_web_work`;
CREATE TABLE `tbl_web_work` (
    `work_id` int(11) NOT NULL,
    `work_name` varchar(50) NOT NULL,
    `work_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_work`
    ADD PRIMARY KEY (`work_id`),
    MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT;


-- ---------------- MAINTENANCE -------------------
-- MAINTENANCE KATEGORI
DROP TABLE IF EXISTS `tbl_web_maintenance`;
CREATE TABLE `tbl_web_maintenance` (
    `maintenance_id` int(11) NOT NULL,
    `maintenance_name` varchar(50) NOT NULL,
    `maintenance_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_maintenance`
    ADD PRIMARY KEY (`maintenance_id`),
    MODIFY `maintenance_id` int(11) NOT NULL AUTO_INCREMENT;


-- ---------------- INCOME -------------------
-- INCOME KATEGORI
DROP TABLE IF EXISTS `tbl_web_income`;
CREATE TABLE `tbl_web_income` (
    `income_id` int(11) NOT NULL,
    `truck_id` int(11) NOT NULL,
    `work_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `income_name` varchar(50) NOT NULL,
    `income_count` int(11) NOT NULL,
    `income_amount` int(11) NOT NULL,
    `income_price` int(11) NOT NULL,
    `income_desc` text NOT NULL,
    `income_date` date NOT NULL,
    `createtime` datetime NOT NULL,
    `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_income`
    ADD PRIMARY KEY (`income_id`),
    MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT;



-- ---------------- OUTCOME -------------------
-- OUTCOME KATEGORI
DROP TABLE IF EXISTS `tbl_web_outcome`;
CREATE TABLE `tbl_web_outcome` (
    `outcome_id` int(11) NOT NULL,
    `truck_id` int(11) NOT NULL,
    `work_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `outcome_name` varchar(50) NOT NULL,
    `outcome_count` int(11) NOT NULL,
    `outcome_amount` int(11) NOT NULL,
    `outcome_price` int(11) NOT NULL,
    `outcome_desc` text NOT NULL,
    `outcome_date` date NOT NULL,
    `createtime` datetime NOT NULL,
    `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_outcome`
    ADD PRIMARY KEY (`outcome_id`),
    MODIFY `outcome_id` int(11) NOT NULL AUTO_INCREMENT;
