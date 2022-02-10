-- SQL MANUAL

-- ---------------- TRUK -------------------
-- TRUK KATEGORI
DROP TABLE IF EXISTS `tbl_web_truck`;
CREATE TABLE `tbl_web_truck` (
    `truck_id` int(11) NOT NULL,
    `truck_name` varchar(100) NOT NULL,
    `truck_brand` varchar(50) NOT NULL,
    `truck_plate` varchar(50) NOT NULL,
    `truck_image` varchar(50) NOT NULL,
    `truck_color` varchar(50) NOT NULL,
    `truck_stnk` varchar(50) NOT NULL,
    `truck_year` int(11) NOT NULL,
    `truck_base_modal` int(11) NOT NULL,
    `truck_desc` text NOT NULL,
    `createtime` datetime NOT NULL,
    `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_truck`
    ADD PRIMARY KEY (`truck_id`),
    MODIFY `truck_id` int(11) NOT NULL AUTO_INCREMENT;


-- ---------------- income_category -------------------
-- income_category KATEGORI
DROP TABLE IF EXISTS `tbl_web_income_category`;
CREATE TABLE `tbl_web_income_category` (
    `income_category_id` int(11) NOT NULL,
    `income_category_name` varchar(100) NOT NULL,
    `income_category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_income_category`
    ADD PRIMARY KEY (`income_category_id`),
    MODIFY `income_category_id` int(11) NOT NULL AUTO_INCREMENT;


-- ---------------- outcome_category -------------------
-- outcome_category KATEGORI
DROP TABLE IF EXISTS `tbl_web_outcome_category`;
CREATE TABLE `tbl_web_outcome_category` (
    `outcome_category_id` int(11) NOT NULL,
    `outcome_category_name` varchar(100) NOT NULL,
    `outcome_category_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_outcome_category`
    ADD PRIMARY KEY (`outcome_category_id`),
    MODIFY `outcome_category_id` int(11) NOT NULL AUTO_INCREMENT;


-- ---------------- INCOME -------------------
-- INCOME KATEGORI
DROP TABLE IF EXISTS `tbl_web_income`;
CREATE TABLE `tbl_web_income` (
    `income_id` int(11) NOT NULL,
    `income_category_id` int(11) NOT NULL,
    `truck_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `income_name` varchar(100) NOT NULL,
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
    `outcome_category_id` int(11) NOT NULL,
    `truck_id` int(11) NOT NULL,
    `user_id` int(11) NOT NULL,
    `outcome_name` varchar(100) NOT NULL,
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



-- ---------------- ASSET -------------------
-- ASSET KATEGORI
DROP TABLE IF EXISTS `tbl_web_asset`;
CREATE TABLE `tbl_web_asset` (
    `asset_id` int(11) NOT NULL,
    `asset_name` varchar(100) NOT NULL,
    `asset_count` int(11) NOT NULL,
    `asset_amount` int(11) NOT NULL,
    `asset_price` int(11) NOT NULL,
    `asset_desc` text NOT NULL,
    `createtime` datetime NOT NULL,
    `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
ALTER TABLE `tbl_web_asset`
    ADD PRIMARY KEY (`asset_id`),
    MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT;
