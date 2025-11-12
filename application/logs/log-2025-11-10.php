<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-11-10 11:30:27 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:30:27 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:30:58 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:32:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:32:35 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:33:44 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:33:45 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:35:49 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:35:49 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:36:31 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:36:31 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 11:44:33 --> 404 Page Not Found: admin/Master/staff_list
ERROR - 2025-11-10 16:32:15 --> Severity: Warning --> Undefined property: stdClass::$staff_name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 447
ERROR - 2025-11-10 16:32:15 --> Severity: Warning --> Undefined property: stdClass::$staff_name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 447
ERROR - 2025-11-10 16:32:15 --> Severity: Warning --> Undefined property: stdClass::$staff_name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 447
ERROR - 2025-11-10 16:32:15 --> Severity: Warning --> Undefined property: stdClass::$staff_name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 447
ERROR - 2025-11-10 16:32:15 --> Severity: Warning --> Undefined property: stdClass::$staff_name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 447
ERROR - 2025-11-10 16:32:15 --> Severity: Warning --> Undefined property: stdClass::$staff_name C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 447
ERROR - 2025-11-10 16:34:44 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON (iir.staff_id IS NOT NULL AND isf.id = iir.staff_id) OR (iir.staff_id IS NULL AND isf.name = iir.staff_name)
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:34:44 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 396
ERROR - 2025-11-10 16:35:49 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON (iir.staff_id IS NOT NULL AND isf.id = iir.staff_id) OR (iir.staff_id IS NULL AND isf.name = iir.staff_name)
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:35:49 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 396
ERROR - 2025-11-10 16:36:23 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON iir.staff_id = isf.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:36:23 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 396
ERROR - 2025-11-10 12:06:29 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:06:29 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 16:36:30 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON iir.staff_id = isf.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:36:30 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 396
ERROR - 2025-11-10 16:39:23 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON iir.staff_id = isf.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:39:23 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-10 16:58:47 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON iir.staff_id = isf.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:58:47 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-10 16:59:10 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON iir.staff_id = isf.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					AND iir.login_id IN (9)
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:59:10 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-10 16:59:13 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON iir.staff_id = isf.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:59:13 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-10 16:59:14 --> Query error: Unknown column 'iir.staff_name' in 'field list' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_name) AS staff_name_display,
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
				LEFT JOIN ins_staff isf ON iir.staff_id = isf.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.created_date BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND iir.is_delete = 0
					
					 ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-10 16:59:14 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-10 12:32:20 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:32:20 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:43:09 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:43:09 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:47:01 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:47:01 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:47:25 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:47:25 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:47:44 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-10 12:47:44 --> 404 Page Not Found: Public/plugins
