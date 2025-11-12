<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-11-12 05:54:18 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 05:54:18 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 05:54:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 05:54:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 06:01:38 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 06:01:38 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 06:01:55 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 06:01:56 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:47:27 --> Query error: Not unique table/alias: 'ip' - Invalid query: SELECT `ip`.*, `irc`.`name` AS `rto_company_name`, `iac`.`name` AS `agent_code_name`, `cu1`.`name` AS `created_by_name`, `cu2`.`name` AS `updated_by_name`, `ist`.`name` AS `staff_name`, `ia`.`name` AS `agent_name`, COUNT(DISTINCT ip.id) AS cnt
FROM (`insurance_policy` `ip`, `insurance_policy` `ip`)
LEFT JOIN `ins_rto_company` `irc` ON `ip`.`rto_company_id` = `irc`.`id`
LEFT JOIN `ins_agent_code` `iac` ON `ip`.`agent_code_id` = `iac`.`id`
LEFT JOIN `ci_users` `cu1` ON `ip`.`created_by` = `cu1`.`id`
LEFT JOIN `ci_users` `cu2` ON `ip`.`updated_by` = `cu2`.`id`
LEFT JOIN `ins_staff` `ist` ON `ip`.`staff_id` = `ist`.`id`
LEFT JOIN `ins_agency` `ia` ON `ip`.`agent_id` = `ia`.`id`
LEFT JOIN `ins_rto_company` `irc` ON `ip`.`rto_company_id` = `irc`.`id`
LEFT JOIN `ins_agent_code` `iac` ON `ip`.`agent_code_id` = `iac`.`id`
LEFT JOIN `ci_users` `cu1` ON `ip`.`created_by` = `cu1`.`id`
LEFT JOIN `ci_users` `cu2` ON `ip`.`updated_by` = `cu2`.`id`
LEFT JOIN `ins_staff` `ist` ON `ip`.`staff_id` = `ist`.`id`
LEFT JOIN `ins_agency` `ia` ON `ip`.`agent_id` = `ia`.`id`
ERROR - 2025-11-12 10:47:27 --> Severity: error --> Exception: Call to a member function row() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 96
ERROR - 2025-11-12 07:14:40 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 07:14:40 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 07:15:38 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 07:15:38 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:18:19 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:18:19 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:19:05 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:19:06 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:19:10 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:19:11 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:33:12 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:33:12 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:33:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:33:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:33:55 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 08:33:55 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:25:17 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:25:17 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 14:55:30 --> Query error: Unknown column 'login_id' in 'field list' - Invalid query: UPDATE `insurance_policy` SET `policy_no` = '501300312510001943', `vehicle_no` = 'TN61A6210', `customer_name` = 'MR SEMMALAI R', `make` = 'Mahindra and Mahindra Limited', `model` = 'Mahindra Bolero', `vehicle_type` = 'Goods Carrying Commercial Vehicle', `rto_company_id` = NULL, `mfg_year` = '2011', `age` = 14, `gvw` = 2330, `ncb` = NULL, `policy_type` = 'Motor - Goods Carrying Vehicle - Package', `start_date` = '2025-05-11', `end_date` = '2026-04-11', `company_name` = 'National Insurance Company Limited', `agent_code_id` = '1', `payment_mode` = 'Credit', `credit_card_id` = '1', `od` = 177, `tp` = 16424, `net` = 16601, `premium` = 17503, `reward` = NULL, `agent_id` = '2', `login_id` = '7', `company_grid` = NULL, `company_grid2` = NULL, `tds` = NULL, `staff_id` = '1', `verified_status` = 'missing', `status` = 1, `created_by` = '22', `updated_by` = '22', `updated_at` = '2025-11-12 14:55:30'
WHERE `policy_no` = '501300312510001943'
ERROR - 2025-11-12 10:25:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:25:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:25:59 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:26:00 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:26:17 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:26:18 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:28:23 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:28:23 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 14:58:40 --> Query error: Unknown column 'login_id' in 'field list' - Invalid query: UPDATE `insurance_policy` SET `policy_no` = '0108003125P112543858', `vehicle_no` = 'KA590937', `customer_name` = 'MR MATHAVAN N', `make` = 'MAHINDRA & MAHINDRA', `model` = 'LIMITED / MAHINDRA BOLERO MAXI TRUCK PLU', `vehicle_type` = 'GCV/PUBLIC CARRIER', `rto_company_id` = NULL, `mfg_year` = '2018', `age` = 7, `gvw` = 2670, `ncb` = NULL, `policy_type` = 'Goods Carrying Vehicle Package policy', `start_date` = '2025-06-11', `end_date` = '2026-05-11', `company_name` = 'UNITED INDIA INSURANCE COMPANY LIMITED', `agent_code_id` = '1', `payment_mode` = 'Credit', `credit_card_id` = '1', `od` = 3052, `tp` = 16424, `net` = 19476, `premium` = 20895, `reward` = NULL, `agent_id` = '2', `login_id` = '7', `company_grid` = NULL, `company_grid2` = NULL, `tds` = NULL, `staff_id` = '1', `verified_status` = 'missing', `status` = 1, `created_by` = '22', `updated_by` = '22', `updated_at` = '2025-11-12 14:58:40'
WHERE `policy_no` = '0108003125P112543858'
ERROR - 2025-11-12 10:31:24 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:31:25 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:31:28 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:31:28 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:32:00 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 10:32:01 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:04:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:04:35 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:04:54 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:04:54 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:08:26 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:08:26 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:08:28 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:08:28 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:23:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:23:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:23:50 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:23:50 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:23:56 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:23:57 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:31:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:31:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:32:41 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:32:41 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:35:00 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:35:00 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:35:28 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:35:29 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:36:42 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:36:42 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:38:02 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:38:02 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:38:06 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:38:06 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:43:00 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:43:00 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:43:29 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:51:01 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:51:01 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:51:25 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:54:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:54:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:54:39 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:54:39 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:54:55 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:54:56 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:55:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:55:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:55:52 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:55:52 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:56:49 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:58:33 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:58:33 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:58:48 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:58:48 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:59:13 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 11:59:13 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:00:20 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:00:21 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:00:24 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:00:24 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:03:13 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:03:16 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:10:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:10:35 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:40:43 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:40:43 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:47:25 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:47:25 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:48:16 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:48:16 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:55:21 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:55:21 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:55:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:55:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:55:54 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 12:55:54 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 13:21:50 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 13:21:50 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 13:21:51 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-12 13:21:51 --> 404 Page Not Found: Public/plugins
