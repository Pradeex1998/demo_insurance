<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-10-13 11:31:47 --> Query error: Unknown column 'v.payment_type' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:31:47 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:31:50 --> Query error: Unknown column 'v.payment_type' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:31:50 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:31:53 --> Query error: Unknown column 'v.payment_type' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:31:53 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:33:26 --> Query error: Unknown column 'v.company_odpayout' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:33:26 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:34:05 --> Query error: Unknown column 'v.payment_type' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:34:05 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:36:52 --> Query error: Unknown column 'irr.company_paymentmode' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.company_paymentmode AS payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:36:52 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:37:23 --> Query error: Unknown column 'irr.company_paymentmode' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.company_paymentmode AS payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:37:23 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:38:08 --> Query error: Unknown column 'irr.company_paymentmode' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.company_paymentmode, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:38:08 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:40:09 --> Query error: Unknown column 'irr.company_paymentmode' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.company_paymentmode, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:40:09 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:40:15 --> Query error: Unknown column 'irr.company_paymentmode' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.company_paymentmode, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:40:15 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:40:24 --> Query error: Unknown column 'irr.company_paymentmode' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.company_paymentmode, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:40:24 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:40:49 --> Query error: Unknown column 'irr.company_paymentmode' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.company_paymentmode, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:40:49 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:40:58 --> Query error: Unknown column 'irr.company_paymentmode' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.company_paymentmode, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:40:58 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 11:42:56 --> Query error: Unknown column 'irr.paid_type' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					irr.paid_type AS payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					1 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-10-13 11:42:56 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 386
ERROR - 2025-10-13 09:15:00 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:15:01 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:15:12 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:15:13 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:15:13 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:15:14 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:19:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:19:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:21:07 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:21:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:21:45 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:21:45 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:23:19 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:23:19 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:25:05 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:25:07 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:26:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:26:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:27:31 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 09:27:31 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-13 11:36:20 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 65
ERROR - 2025-10-13 11:36:20 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 70
ERROR - 2025-10-13 15:37:39 --> Query error: Unknown column 'iic.company_name' in 'field list' - Invalid query: SELECT il.*, iic.company_name AS rto_company_name, DATE_FORMAT(il.updated_date, '%d/%m/%Y %h:%i') AS formated_updated_date
					FROM ins_loginid il
					LEFT JOIN ins_rto_company irc ON irc.id = il.rto_company_id
					LEFT JOIN ins_insurance_company iic ON iic.id = irc.company_id
ERROR - 2025-10-13 15:37:39 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Loginid.php 115
ERROR - 2025-10-13 15:37:43 --> Query error: Unknown column 'iic.company_name' in 'field list' - Invalid query: SELECT `irc`.`id`, `iic`.`company_name`
FROM `ins_rto_company` `irc`
LEFT JOIN `ins_insurance_company` `iic` ON `iic`.`id` = `irc`.`company_id`
WHERE `irc`.`status` = 'active'
ORDER BY `iic`.`company_name` ASC
ERROR - 2025-10-13 15:37:43 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\models\insurance\Master_model.php 126
ERROR - 2025-10-13 15:40:53 --> Query error: Unknown column 'iic.company_name' in 'field list' - Invalid query: SELECT `irc`.`id`, `iic`.`company_name`
FROM `ins_rto_company` `irc`
LEFT JOIN `ins_insurance_company` `iic` ON `iic`.`id` = `irc`.`company_id`
WHERE `irc`.`status` = 'active'
ORDER BY `iic`.`company_name` ASC
ERROR - 2025-10-13 15:40:53 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\models\insurance\Master_model.php 126
ERROR - 2025-10-13 14:00:34 --> 404 Page Not Found: admin/Reports/company_rtowise_report
ERROR - 2025-10-13 15:09:22 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 65
ERROR - 2025-10-13 15:09:22 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 70
ERROR - 2025-10-13 15:10:16 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 65
ERROR - 2025-10-13 15:10:16 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 70
