INSERT INTO `tbl_web_asset` (`asset_id`, `asset_name`, `asset_count`, `asset_amount`, `asset_price`, `asset_desc`, `createtime`, `update_at`) VALUES
(1, 'Kunci Ban', 1, 650000, 650000, '', '2022-02-09 00:00:00', '2022-02-09 00:00:00');

INSERT INTO `tbl_web_income` (`income_id`, `income_category_id`, `truck_id`, `user_id`, `income_name`, `income_count`, `income_amount`, `income_price`, `income_desc`, `income_date`, `createtime`, `update_at`) VALUES
(1, 1, 1, 1, 'Antar Batu', 2, 200000, 400000, '<p>qwertyuiiop</p>\r\n', '2022-02-14', '2022-02-09 16:16:02', '2022-02-09 16:16:02');

INSERT INTO `tbl_web_income_category` (`income_category_id`, `income_category_name`, `income_category_desc`) VALUES
(1, 'Distribusi Batu', ''),
(2, 'Distribusi Pasir', '');

INSERT INTO `tbl_web_outcome` (`outcome_id`, `outcome_category_id`, `truck_id`, `user_id`, `outcome_name`, `outcome_count`, `outcome_amount`, `outcome_price`, `outcome_desc`, `outcome_date`, `createtime`, `update_at`) VALUES
(1, 1, 1, 1, 'Ganti Ban Depan Kanan', 1, 500000, 500000, '', '2022-02-09', '2022-02-09 16:24:42', '2022-02-09 16:24:42');

INSERT INTO `tbl_web_outcome_category` (`outcome_category_id`, `outcome_category_name`, `outcome_category_desc`) VALUES
(1, 'Ganti Ban Depan', ''),
(2, 'Ganti Ban Belakang', '');

INSERT INTO `tbl_web_truck` (`truck_id`, `truck_name`, `truck_brand`, `truck_plate`, `truck_image`, `truck_color`, `truck_stnk`, `truck_year`, `truck_desc`, `createtime`, `update_at`) VALUES
(1, 'Dzaky Alfauzan 02', 'Dutro', 'DT 3211 AS', 'thumbnailtruck-20220209155103.png', 'Hijau', '892999921210912', 2019, '<p>qweqw</p>\r\n', '2022-02-09 00:00:00', '2022-02-09 00:00:00'),
(2, 'Dzaky Alfauzan 04', 'Hino', 'ST 9923 KY', 'thumbnailtruck-20220209162621.png', 'Kuning', '3123123999012990', 2020, '', '2022-02-09 00:00:00', '2022-02-09 00:00:00');
