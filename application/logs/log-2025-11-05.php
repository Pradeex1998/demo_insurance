<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-11-05 17:27:32 --> Query error: Table 'demo_insurance.ins_rto' doesn't exist - Invalid query: SELECT ir.*, 
						DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') AS formated_created_at, 
						cu.name AS created_by_name 
				FROM ins_rto ir
				LEFT JOIN ci_users cu ON ir.created_by = cu.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:27:32 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 226
ERROR - 2025-11-05 17:34:42 --> Query error: Table 'demo_insurance.ins_rto' doesn't exist - Invalid query: SELECT ir.*, 
						DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') AS formated_created_at, 
						cu.name AS created_by_name 
				FROM ins_rto ir
				LEFT JOIN ci_users cu ON ir.created_by = cu.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:34:42 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 226
ERROR - 2025-11-05 17:34:48 --> Query error: Table 'demo_insurance.ins_rto' doesn't exist - Invalid query: SELECT ir.*, 
						DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') AS formated_created_at, 
						cu.name AS created_by_name 
				FROM ins_rto ir
				LEFT JOIN ci_users cu ON ir.created_by = cu.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:34:48 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 226
ERROR - 2025-11-05 17:39:23 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_...' at line 1 - Invalid query: SELECT is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state is
				LEFT JOIN ci_users cu1 ON is.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:39:23 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 17:39:29 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT `id`, `name`
FROM `ins_state`
WHERE `status` = 'active'
ORDER BY `name` ASC
ERROR - 2025-11-05 17:39:29 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is ON idc.state_id = is.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1...' at line 6 - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					is.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state is ON idc.state_id = is.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:39:29 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 950
ERROR - 2025-11-05 17:39:32 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_...' at line 1 - Invalid query: SELECT is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state is
				LEFT JOIN ci_users cu1 ON is.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:39:32 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 13:09:35 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:09:35 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:09:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:09:38 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:39:38 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_...' at line 1 - Invalid query: SELECT is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state is
				LEFT JOIN ci_users cu1 ON is.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:39:38 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 13:11:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:11:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:41:39 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT st.*, 
					DATE_FORMAT(st.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state st
				LEFT JOIN ci_users cu1 ON st.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:41:39 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 13:11:56 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:11:56 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:41:57 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT st.*, 
					DATE_FORMAT(st.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state st
				LEFT JOIN ci_users cu1 ON st.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:41:57 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 13:13:15 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:13:16 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:43:18 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:43:18 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1 ORDER BY ins_state.created_at desc LIMIT 0, 10
ERROR - 2025-11-05 17:43:18 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 844
ERROR - 2025-11-05 13:13:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:13:35 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:43:36 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:43:36 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1 ORDER BY ins_state.created_at desc LIMIT 0, 10
ERROR - 2025-11-05 17:43:36 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 844
ERROR - 2025-11-05 13:14:10 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:14:11 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:44:11 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:44:11 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1 ORDER BY ins_state.created_at desc LIMIT 0, 10
ERROR - 2025-11-05 17:44:11 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 844
ERROR - 2025-11-05 13:14:29 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:14:29 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:44:29 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:44:29 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1 ORDER BY ins_state.created_at desc LIMIT 0, 10
ERROR - 2025-11-05 13:14:46 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:14:47 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:44:47 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT ins_state.*, 
					DATE_FORMAT(ins_state.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state
				LEFT JOIN ci_users cu1 ON ins_state.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 13:17:33 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:17:33 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:17:49 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:17:50 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:49:03 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_...' at line 1 - Invalid query: SELECT is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state is
				LEFT JOIN ci_users cu1 ON is.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:49:03 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 17:49:09 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_...' at line 1 - Invalid query: SELECT is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state is
				LEFT JOIN ci_users cu1 ON is.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:49:09 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 17:49:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_...' at line 1 - Invalid query: SELECT is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state is
				LEFT JOIN ci_users cu1 ON is.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:49:28 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 17:49:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_...' at line 1 - Invalid query: SELECT is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state is
				LEFT JOIN ci_users cu1 ON is.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:49:52 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 13:20:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:20:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:20:39 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:20:39 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:50:39 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_...' at line 1 - Invalid query: SELECT is.*, 
					DATE_FORMAT(is.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					cu1.name AS created_by_name
				FROM ins_state is
				LEFT JOIN ci_users cu1 ON is.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:50:39 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 833
ERROR - 2025-11-05 13:21:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:21:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:22:55 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:22:56 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:53:36 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is ON idc.state_id = is.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1...' at line 6 - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					is.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state is ON idc.state_id = is.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 17:53:36 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 950
ERROR - 2025-11-05 13:23:39 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:23:39 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 17:59:24 --> Query error: Duplicate entry 'ANDHRA PRADESH' for key 'unique_name' - Invalid query: INSERT INTO `ins_state` (`name`, `status`, `created_by`, `created_at`) VALUES ('ANDHRA PRADESH', 'active', '22', '2025-11-05 17:59:24')
ERROR - 2025-11-05 17:59:43 --> Query error: Duplicate entry 'ANDHRA PRADESH' for key 'unique_name' - Invalid query: INSERT INTO `ins_state` (`name`, `status`, `created_by`, `created_at`) VALUES ('ANDHRA PRADESH', 'active', '22', '2025-11-05 17:59:43')
ERROR - 2025-11-05 18:03:04 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is ON idc.state_id = is.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1...' at line 6 - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					is.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state is ON idc.state_id = is.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 18:03:04 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 957
ERROR - 2025-11-05 13:33:17 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:33:18 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:33:19 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:33:20 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 18:03:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'is ON idc.state_id = is.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1...' at line 6 - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					is.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state is ON idc.state_id = is.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 18:03:20 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 957
ERROR - 2025-11-05 13:35:10 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 13:35:11 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 18:15:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-05 19:22:05 --> Query error: Table 'demo_insurance.ins_district' doesn't exist - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					ist.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state ist ON idc.state_id = ist.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-05 19:22:05 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 963
