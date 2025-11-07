<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-11-06 10:51:49 --> Query error: Table 'demo_insurance.ins_state' doesn't exist - Invalid query: SELECT `id`, `name`
FROM `ins_state`
WHERE `status` = 'active'
ORDER BY `name` ASC
ERROR - 2025-11-06 10:51:50 --> Query error: Table 'demo_insurance.ins_district' doesn't exist - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					ist.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state ist ON idc.state_id = ist.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-06 10:51:50 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 963
ERROR - 2025-11-06 12:01:22 --> Query error: Table 'demo_insurance.ins_district' doesn't exist - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					ist.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state ist ON idc.state_id = ist.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-06 12:01:22 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 963
ERROR - 2025-11-06 07:57:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 07:57:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 07:57:38 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 07:57:38 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:16:50 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:16:51 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:17:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:17:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:17:22 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:17:22 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:17:40 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:17:40 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:17:49 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:17:50 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 12:59:14 --> Query error: Table 'demo_insurance.ins_district' doesn't exist - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					ist.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state ist ON idc.state_id = ist.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-06 12:59:14 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 963
ERROR - 2025-11-06 13:00:16 --> Query error: Table 'demo_insurance.ins_district' doesn't exist - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					ist.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state ist ON idc.state_id = ist.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-06 13:00:16 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 963
ERROR - 2025-11-06 13:01:13 --> Query error: Table 'demo_insurance.ins_district' doesn't exist - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					ist.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state ist ON idc.state_id = ist.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-06 13:01:13 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 963
ERROR - 2025-11-06 08:31:30 --> 404 Page Not Found: admin/Master/agent_code_list
ERROR - 2025-11-06 13:04:39 --> Query error: Table 'demo_insurance.ins_rto' doesn't exist - Invalid query: SELECT ir.*, 
						DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') AS formated_created_at, 
						cu.name AS created_by_name 
				FROM ins_rto ir
				LEFT JOIN ci_users cu ON ir.created_by = cu.id
				WHERE 1 = 1
ERROR - 2025-11-06 13:04:39 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 226
ERROR - 2025-11-06 13:06:10 --> Query error: Table 'demo_insurance.ins_rto' doesn't exist - Invalid query: SELECT ir.*, 
						DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') AS formated_created_at, 
						cu.name AS created_by_name 
				FROM ins_rto ir
				LEFT JOIN ci_users cu ON ir.created_by = cu.id
				WHERE 1 = 1
ERROR - 2025-11-06 13:06:10 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 226
ERROR - 2025-11-06 13:06:15 --> Query error: Table 'demo_insurance.ins_agent_code' doesn't exist - Invalid query: SELECT iac.*,
					DATE_FORMAT(iac.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					DATE_FORMAT(iac.updated_at, '%d/%m/%Y %h:%i') AS formated_updated_at,
					cu1.name AS created_by_name,
					cu2.name AS updated_by_name
				FROM ins_agent_code iac
				LEFT JOIN ci_users cu1 ON iac.created_by = cu1.id
				LEFT JOIN ci_users cu2 ON iac.updated_by = cu2.id
				WHERE 1 = 1
ERROR - 2025-11-06 13:06:15 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 1084
ERROR - 2025-11-06 08:36:20 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:36:20 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:37:33 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 08:37:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:10:09 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:10:09 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:10:29 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:10:30 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:11:16 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:11:16 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:14:40 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:14:42 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:14:46 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:14:47 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:15:18 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:15:19 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:18:04 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:18:04 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 10:18:33 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 15:26:06 --> Query error: Table 'demo_insurance.ins_rto' doesn't exist - Invalid query: SELECT *
FROM `ins_rto`
WHERE `status` = 'active'
ERROR - 2025-11-06 15:26:06 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\models\insurance\Master_model.php 141
ERROR - 2025-11-06 15:26:22 --> Query error: Table 'demo_insurance.ins_district' doesn't exist - Invalid query: SELECT idc.*, 
					DATE_FORMAT(idc.created_at, '%d/%m/%Y %h:%i') AS formated_created_at,
					ist.name AS state_name,
					cu1.name AS created_by_name
				FROM ins_district idc
				LEFT JOIN ins_state ist ON idc.state_id = ist.id
				LEFT JOIN ci_users cu1 ON idc.created_by = cu1.id
				WHERE 1 = 1
ERROR - 2025-11-06 15:26:22 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 963
ERROR - 2025-11-06 15:26:31 --> Query error: Table 'demo_insurance.ins_rto' doesn't exist - Invalid query: SELECT *
FROM `ins_rto`
WHERE `status` = 'active'
ERROR - 2025-11-06 15:26:31 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\models\insurance\Master_model.php 141
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:02 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:28 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:37:59 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 12:08:05 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 12:08:05 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 12:08:06 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 16:38:07 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 12:33:18 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 12:33:19 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:20 --> Severity: Warning --> Undefined property: stdClass::$rto_office C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 12:33:35 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 12:33:36 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:03:57 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 17:07:10 --> Severity: Warning --> Undefined property: stdClass::$name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 239
ERROR - 2025-11-06 18:34:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'acs LIMIT 0, 10' at line 10 - Invalid query: SELECT ir.*, 
					DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') AS formated_created_at, 
					cu.name AS created_by_name,
					ist.name AS state_name,
					idc.name AS district_name
				FROM ins_rto ir
				LEFT JOIN ci_users cu ON ir.created_by = cu.id
				LEFT JOIN ins_state ist ON ir.state_id = ist.id
				LEFT JOIN ins_district idc ON ir.district_id = idc.id
				WHERE 1 = 1 ORDER BY ir.rto_code acs LIMIT 0, 10
ERROR - 2025-11-06 18:34:14 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 242
ERROR - 2025-11-06 18:34:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'acs LIMIT 0, 10' at line 10 - Invalid query: SELECT ir.*, 
					DATE_FORMAT(ir.created_at, '%d/%m/%Y %h:%i') AS formated_created_at, 
					cu.name AS created_by_name,
					ist.name AS state_name,
					idc.name AS district_name
				FROM ins_rto ir
				LEFT JOIN ci_users cu ON ir.created_by = cu.id
				LEFT JOIN ins_state ist ON ir.state_id = ist.id
				LEFT JOIN ins_district idc ON ir.district_id = idc.id
				WHERE 1 = 1 ORDER BY ir.rto_code acs LIMIT 0, 10
ERROR - 2025-11-06 18:34:18 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Master.php 242
ERROR - 2025-11-06 14:04:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 14:04:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-06 14:05:38 --> 404 Page Not Found: Public/plugins
