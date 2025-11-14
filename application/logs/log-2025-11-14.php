<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-11-14 07:43:26 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 07:43:26 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 07:43:40 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 07:43:41 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 10:23:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 10:23:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 15:14:18 --> Query error: Unknown column 'ins_loginid.agent_code_id' in 'on clause' - Invalid query: 
				SELECT ins_loginid.*, ins_agent_code.name as agent_code_name
				FROM ins_loginid
				LEFT JOIN ins_agent_code on ins_loginid.agent_code_id = ins_agent_code.id
			
ERROR - 2025-11-14 15:14:18 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 352
ERROR - 2025-11-14 15:14:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'LEFT JOIN ins_agent_code on ins_loginid.agent_code_id = ins_agent_code.id
			...' at line 2 - Invalid query: 
				SELECT ins_loginid.id, ins_loginid.name, ins_agent_code.name as agent_code_name
				LEFT JOIN ins_agent_code on ins_loginid.agent_code_id = ins_agent_code.id
				FROM ins_loginid
				LEFT JOIN ins_agent_code on ins_loginid.agent_code_id = ins_agent_code.id
			
ERROR - 2025-11-14 15:14:34 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 353
ERROR - 2025-11-14 15:14:50 --> Query error: Unknown column 'ins_loginid.id' in 'field list' - Invalid query: 
				SELECT ins_loginid.id, ins_loginid.name, ins_agent_code.name as agent_code_name
				FROM ins_loginid il
				LEFT JOIN ins_agent_code iac on il.agent_code_id = iac.id
			
ERROR - 2025-11-14 15:14:50 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 352
ERROR - 2025-11-14 15:16:34 --> Query error: Unknown column 'il.agent_code_id' in 'on clause' - Invalid query: 
				SELECT *
				FROM ins_loginid il
				LEFT JOIN ins_agent_code iac on il.agent_code_id = iac.id
			
ERROR - 2025-11-14 15:16:34 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 352
ERROR - 2025-11-14 10:48:14 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 10:48:14 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 11:23:42 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 11:23:42 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 11:24:12 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 11:24:12 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 16:24:07 --> Query error: Unknown column 'iir.name' in 'where clause' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_id) AS staff_name,
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
					
					AND (iir.name LIKE '%a%' 
					OR ag.name LIKE '%a%' 
					OR iir.company LIKE '%a%' 
					OR iir.insured_name LIKE '%a%' 
					OR iir.product_type LIKE '%a%' 
					OR iir.policy_number LIKE '%a%' 
					OR iir.registration_no LIKE '%a%' 
					OR ag.mobile_no LIKE '%a%' 
					OR ag.email LIKE '%a%' 
					OR iir.year LIKE '%a%' 
					OR iir.model LIKE '%a%' 
					OR iir.status LIKE '%a%' 
					OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%a%' 
					OR DATE_FORMAT(iir.updated_date, '%d/%m/%Y %h:%i') LIKE '%a%') ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-14 16:24:07 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-14 16:24:08 --> Query error: Unknown column 'iir.name' in 'where clause' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_id) AS staff_name,
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
					
					AND (iir.name LIKE '%as%' 
					OR ag.name LIKE '%as%' 
					OR iir.company LIKE '%as%' 
					OR iir.insured_name LIKE '%as%' 
					OR iir.product_type LIKE '%as%' 
					OR iir.policy_number LIKE '%as%' 
					OR iir.registration_no LIKE '%as%' 
					OR ag.mobile_no LIKE '%as%' 
					OR ag.email LIKE '%as%' 
					OR iir.year LIKE '%as%' 
					OR iir.model LIKE '%as%' 
					OR iir.status LIKE '%as%' 
					OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%as%' 
					OR DATE_FORMAT(iir.updated_date, '%d/%m/%Y %h:%i') LIKE '%as%') ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-14 16:24:08 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-14 11:54:11 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 11:54:11 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 16:24:12 --> Query error: Unknown column 'iir.name' in 'where clause' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_id) AS staff_name,
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
					
					AND (iir.name LIKE '%asd%' 
					OR ag.name LIKE '%asd%' 
					OR iir.company LIKE '%asd%' 
					OR iir.insured_name LIKE '%asd%' 
					OR iir.product_type LIKE '%asd%' 
					OR iir.policy_number LIKE '%asd%' 
					OR iir.registration_no LIKE '%asd%' 
					OR ag.mobile_no LIKE '%asd%' 
					OR ag.email LIKE '%asd%' 
					OR iir.year LIKE '%asd%' 
					OR iir.model LIKE '%asd%' 
					OR iir.status LIKE '%asd%' 
					OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%asd%' 
					OR DATE_FORMAT(iir.updated_date, '%d/%m/%Y %h:%i') LIKE '%asd%') ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-14 16:24:12 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-14 16:24:23 --> Query error: Unknown column 'iir.name' in 'where clause' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_id) AS staff_name,
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
					
					AND (iir.name LIKE '%asdd%' 
					OR ag.name LIKE '%asdd%' 
					OR iir.company LIKE '%asdd%' 
					OR iir.insured_name LIKE '%asdd%' 
					OR iir.product_type LIKE '%asdd%' 
					OR iir.policy_number LIKE '%asdd%' 
					OR iir.registration_no LIKE '%asdd%' 
					OR ag.mobile_no LIKE '%asdd%' 
					OR ag.email LIKE '%asdd%' 
					OR iir.year LIKE '%asdd%' 
					OR iir.model LIKE '%asdd%' 
					OR iir.status LIKE '%asdd%' 
					OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%asdd%' 
					OR DATE_FORMAT(iir.updated_date, '%d/%m/%Y %h:%i') LIKE '%asdd%') ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-14 16:24:23 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-14 16:24:24 --> Query error: Unknown column 'iir.name' in 'where clause' - Invalid query: SELECT 
					iir.*, 
					ag.email AS agent_email,
					ag.mobile_no AS agent_mobile_no,
					ag.name AS agency_name,
					il.name AS login_name,
					COALESCE(isf.name, iir.staff_id) AS staff_name,
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
					
					AND (iir.name LIKE '%asddsf%' 
					OR ag.name LIKE '%asddsf%' 
					OR iir.company LIKE '%asddsf%' 
					OR iir.insured_name LIKE '%asddsf%' 
					OR iir.product_type LIKE '%asddsf%' 
					OR iir.policy_number LIKE '%asddsf%' 
					OR iir.registration_no LIKE '%asddsf%' 
					OR ag.mobile_no LIKE '%asddsf%' 
					OR ag.email LIKE '%asddsf%' 
					OR iir.year LIKE '%asddsf%' 
					OR iir.model LIKE '%asddsf%' 
					OR iir.status LIKE '%asddsf%' 
					OR DATE_FORMAT(iir.date, '%d/%m/%Y') LIKE '%asddsf%' 
					OR DATE_FORMAT(iir.updated_date, '%d/%m/%Y %h:%i') LIKE '%asddsf%') ORDER BY iir.id desc LIMIT 0, 10
ERROR - 2025-11-14 16:24:24 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 397
ERROR - 2025-11-14 16:24:28 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%s%' OR
				ip.created_at LIKE '%s%' OR
				ip.policy_no LIKE '%s%' OR
				ip.vehicle_no LIKE '%s%' OR
				ip.customer_name LIKE '%s%' OR
				ip.make LIKE '%s%' OR
				ip.model LIKE '%s%' OR
				ip.vehicle_type LIKE '%s%' OR
				irc.name LIKE '%s%' OR
				ip.mfg_year LIKE '%s%' OR
				ip.age LIKE '%s%' OR
				ip.gvw LIKE '%s%' OR
				ip.ncb LIKE '%s%' OR
				ip.policy_type LIKE '%s%' OR
				ip.start_date LIKE '%s%' OR
				ip.end_date LIKE '%s%' OR
				ip.company_name LIKE '%s%' OR
				iac.name LIKE '%s%' OR
				ip.name LIKE '%s%' OR
				ip.od LIKE '%s%' OR
				ip.tp LIKE '%s%' OR
				ip.net LIKE '%s%' OR
				ip.premium LIKE '%s%' OR
				ip.reward LIKE '%s%' OR
				ia.name LIKE '%s%' OR
				ia.mobile_no LIKE '%s%' OR
				ip.company_grid LIKE '%s%' OR
				ip.company_grid2 LIKE '%s%' OR
				ip.tds LIKE '%s%' OR
				ist.name LIKE '%s%' OR
				ip.verified_status LIKE '%s%' OR
				ip.status LIKE '%s%' OR
				cu1.name LIKE '%s%' OR
				cu2.name LIKE '%s%' OR
				ip.updated_at LIKE '%s%'
			)
ERROR - 2025-11-14 16:24:28 --> Severity: error --> Exception: Call to a member function row() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 177
ERROR - 2025-11-14 11:54:31 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 11:54:31 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 16:24:36 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%sd%' OR
				ip.created_at LIKE '%sd%' OR
				ip.policy_no LIKE '%sd%' OR
				ip.vehicle_no LIKE '%sd%' OR
				ip.customer_name LIKE '%sd%' OR
				ip.make LIKE '%sd%' OR
				ip.model LIKE '%sd%' OR
				ip.vehicle_type LIKE '%sd%' OR
				irc.name LIKE '%sd%' OR
				ip.mfg_year LIKE '%sd%' OR
				ip.age LIKE '%sd%' OR
				ip.gvw LIKE '%sd%' OR
				ip.ncb LIKE '%sd%' OR
				ip.policy_type LIKE '%sd%' OR
				ip.start_date LIKE '%sd%' OR
				ip.end_date LIKE '%sd%' OR
				ip.company_name LIKE '%sd%' OR
				iac.name LIKE '%sd%' OR
				ip.name LIKE '%sd%' OR
				ip.od LIKE '%sd%' OR
				ip.tp LIKE '%sd%' OR
				ip.net LIKE '%sd%' OR
				ip.premium LIKE '%sd%' OR
				ip.reward LIKE '%sd%' OR
				ia.name LIKE '%sd%' OR
				ia.mobile_no LIKE '%sd%' OR
				ip.company_grid LIKE '%sd%' OR
				ip.company_grid2 LIKE '%sd%' OR
				ip.tds LIKE '%sd%' OR
				ist.name LIKE '%sd%' OR
				ip.verified_status LIKE '%sd%' OR
				ip.status LIKE '%sd%' OR
				cu1.name LIKE '%sd%' OR
				cu2.name LIKE '%sd%' OR
				ip.updated_at LIKE '%sd%'
			)
ERROR - 2025-11-14 16:24:36 --> Severity: error --> Exception: Call to a member function row() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 177
ERROR - 2025-11-14 16:55:46 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%a%' OR
				ip.created_at LIKE '%a%' OR
				ip.policy_no LIKE '%a%' OR
				ip.vehicle_no LIKE '%a%' OR
				ip.customer_name LIKE '%a%' OR
				ip.make LIKE '%a%' OR
				ip.model LIKE '%a%' OR
				ip.vehicle_type LIKE '%a%' OR
				irc.name LIKE '%a%' OR
				ip.mfg_year LIKE '%a%' OR
				ip.age LIKE '%a%' OR
				ip.gvw LIKE '%a%' OR
				ip.ncb LIKE '%a%' OR
				ip.policy_type LIKE '%a%' OR
				ip.start_date LIKE '%a%' OR
				ip.end_date LIKE '%a%' OR
				ip.company_name LIKE '%a%' OR
				iac.name LIKE '%a%' OR
				ip.name LIKE '%a%' OR
				ip.od LIKE '%a%' OR
				ip.tp LIKE '%a%' OR
				ip.net LIKE '%a%' OR
				ip.premium LIKE '%a%' OR
				ip.reward LIKE '%a%' OR
				ia.name LIKE '%a%' OR
				ia.mobile_no LIKE '%a%' OR
				ip.company_grid LIKE '%a%' OR
				ip.company_grid2 LIKE '%a%' OR
				ip.tds LIKE '%a%' OR
				ist.name LIKE '%a%' OR
				ip.verified_status LIKE '%a%' OR
				ip.status LIKE '%a%' OR
				cu1.name LIKE '%a%' OR
				cu2.name LIKE '%a%' OR
				ip.updated_at LIKE '%a%'
			)
ERROR - 2025-11-14 16:55:46 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%a%' OR
				ip.created_at LIKE '%a%' OR
				ip.policy_no LIKE '%a%' OR
				ip.vehicle_no LIKE '%a%' OR
				ip.customer_name LIKE '%a%' OR
				ip.make LIKE '%a%' OR
				ip.model LIKE '%a%' OR
				ip.vehicle_type LIKE '%a%' OR
				irc.name LIKE '%a%' OR
				ip.mfg_year LIKE '%a%' OR
				ip.age LIKE '%a%' OR
				ip.gvw LIKE '%a%' OR
				ip.ncb LIKE '%a%' OR
				ip.policy_type LIKE '%a%' OR
				ip.start_date LIKE '%a%' OR
				ip.end_date LIKE '%a%' OR
				ip.company_name LIKE '%a%' OR
				iac.name LIKE '%a%' OR
				ip.name LIKE '%a%' OR
				ip.od LIKE '%a%' OR
				ip.tp LIKE '%a%' OR
				ip.net LIKE '%a%' OR
				ip.premium LIKE '%a%' OR
				ip.reward LIKE '%a%' OR
				ia.name LIKE '%a%' OR
				ia.mobile_no LIKE '%a%' OR
				ip.company_grid LIKE '%a%' OR
				ip.company_grid2 LIKE '%a%' OR
				ip.tds LIKE '%a%' OR
				ist.name LIKE '%a%' OR
				ip.verified_status LIKE '%a%' OR
				ip.status LIKE '%a%' OR
				cu1.name LIKE '%a%' OR
				cu2.name LIKE '%a%' OR
				ip.updated_at LIKE '%a%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 16:55:46 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%adf%' OR
				ip.created_at LIKE '%adf%' OR
				ip.policy_no LIKE '%adf%' OR
				ip.vehicle_no LIKE '%adf%' OR
				ip.customer_name LIKE '%adf%' OR
				ip.make LIKE '%adf%' OR
				ip.model LIKE '%adf%' OR
				ip.vehicle_type LIKE '%adf%' OR
				irc.name LIKE '%adf%' OR
				ip.mfg_year LIKE '%adf%' OR
				ip.age LIKE '%adf%' OR
				ip.gvw LIKE '%adf%' OR
				ip.ncb LIKE '%adf%' OR
				ip.policy_type LIKE '%adf%' OR
				ip.start_date LIKE '%adf%' OR
				ip.end_date LIKE '%adf%' OR
				ip.company_name LIKE '%adf%' OR
				iac.name LIKE '%adf%' OR
				ip.name LIKE '%adf%' OR
				ip.od LIKE '%adf%' OR
				ip.tp LIKE '%adf%' OR
				ip.net LIKE '%adf%' OR
				ip.premium LIKE '%adf%' OR
				ip.reward LIKE '%adf%' OR
				ia.name LIKE '%adf%' OR
				ia.mobile_no LIKE '%adf%' OR
				ip.company_grid LIKE '%adf%' OR
				ip.company_grid2 LIKE '%adf%' OR
				ip.tds LIKE '%adf%' OR
				ist.name LIKE '%adf%' OR
				ip.verified_status LIKE '%adf%' OR
				ip.status LIKE '%adf%' OR
				cu1.name LIKE '%adf%' OR
				cu2.name LIKE '%adf%' OR
				ip.updated_at LIKE '%adf%'
			)
ERROR - 2025-11-14 16:55:46 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%adf%' OR
				ip.created_at LIKE '%adf%' OR
				ip.policy_no LIKE '%adf%' OR
				ip.vehicle_no LIKE '%adf%' OR
				ip.customer_name LIKE '%adf%' OR
				ip.make LIKE '%adf%' OR
				ip.model LIKE '%adf%' OR
				ip.vehicle_type LIKE '%adf%' OR
				irc.name LIKE '%adf%' OR
				ip.mfg_year LIKE '%adf%' OR
				ip.age LIKE '%adf%' OR
				ip.gvw LIKE '%adf%' OR
				ip.ncb LIKE '%adf%' OR
				ip.policy_type LIKE '%adf%' OR
				ip.start_date LIKE '%adf%' OR
				ip.end_date LIKE '%adf%' OR
				ip.company_name LIKE '%adf%' OR
				iac.name LIKE '%adf%' OR
				ip.name LIKE '%adf%' OR
				ip.od LIKE '%adf%' OR
				ip.tp LIKE '%adf%' OR
				ip.net LIKE '%adf%' OR
				ip.premium LIKE '%adf%' OR
				ip.reward LIKE '%adf%' OR
				ia.name LIKE '%adf%' OR
				ia.mobile_no LIKE '%adf%' OR
				ip.company_grid LIKE '%adf%' OR
				ip.company_grid2 LIKE '%adf%' OR
				ip.tds LIKE '%adf%' OR
				ist.name LIKE '%adf%' OR
				ip.verified_status LIKE '%adf%' OR
				ip.status LIKE '%adf%' OR
				cu1.name LIKE '%adf%' OR
				cu2.name LIKE '%adf%' OR
				ip.updated_at LIKE '%adf%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 16:55:50 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%h%' OR
				ip.created_at LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				irc.name LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				ip.age LIKE '%h%' OR
				ip.gvw LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				ip.start_date LIKE '%h%' OR
				ip.end_date LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				iac.name LIKE '%h%' OR
				ip.name LIKE '%h%' OR
				ip.od LIKE '%h%' OR
				ip.tp LIKE '%h%' OR
				ip.net LIKE '%h%' OR
				ip.premium LIKE '%h%' OR
				ip.reward LIKE '%h%' OR
				ia.name LIKE '%h%' OR
				ia.mobile_no LIKE '%h%' OR
				ip.company_grid LIKE '%h%' OR
				ip.company_grid2 LIKE '%h%' OR
				ip.tds LIKE '%h%' OR
				ist.name LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				cu1.name LIKE '%h%' OR
				cu2.name LIKE '%h%' OR
				ip.updated_at LIKE '%h%'
			)
ERROR - 2025-11-14 16:55:50 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%h%' OR
				ip.created_at LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				irc.name LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				ip.age LIKE '%h%' OR
				ip.gvw LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				ip.start_date LIKE '%h%' OR
				ip.end_date LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				iac.name LIKE '%h%' OR
				ip.name LIKE '%h%' OR
				ip.od LIKE '%h%' OR
				ip.tp LIKE '%h%' OR
				ip.net LIKE '%h%' OR
				ip.premium LIKE '%h%' OR
				ip.reward LIKE '%h%' OR
				ia.name LIKE '%h%' OR
				ia.mobile_no LIKE '%h%' OR
				ip.company_grid LIKE '%h%' OR
				ip.company_grid2 LIKE '%h%' OR
				ip.tds LIKE '%h%' OR
				ist.name LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				cu1.name LIKE '%h%' OR
				cu2.name LIKE '%h%' OR
				ip.updated_at LIKE '%h%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 16:55:50 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%hond%' OR
				ip.created_at LIKE '%hond%' OR
				ip.policy_no LIKE '%hond%' OR
				ip.vehicle_no LIKE '%hond%' OR
				ip.customer_name LIKE '%hond%' OR
				ip.make LIKE '%hond%' OR
				ip.model LIKE '%hond%' OR
				ip.vehicle_type LIKE '%hond%' OR
				irc.name LIKE '%hond%' OR
				ip.mfg_year LIKE '%hond%' OR
				ip.age LIKE '%hond%' OR
				ip.gvw LIKE '%hond%' OR
				ip.ncb LIKE '%hond%' OR
				ip.policy_type LIKE '%hond%' OR
				ip.start_date LIKE '%hond%' OR
				ip.end_date LIKE '%hond%' OR
				ip.company_name LIKE '%hond%' OR
				iac.name LIKE '%hond%' OR
				ip.name LIKE '%hond%' OR
				ip.od LIKE '%hond%' OR
				ip.tp LIKE '%hond%' OR
				ip.net LIKE '%hond%' OR
				ip.premium LIKE '%hond%' OR
				ip.reward LIKE '%hond%' OR
				ia.name LIKE '%hond%' OR
				ia.mobile_no LIKE '%hond%' OR
				ip.company_grid LIKE '%hond%' OR
				ip.company_grid2 LIKE '%hond%' OR
				ip.tds LIKE '%hond%' OR
				ist.name LIKE '%hond%' OR
				ip.verified_status LIKE '%hond%' OR
				ip.status LIKE '%hond%' OR
				cu1.name LIKE '%hond%' OR
				cu2.name LIKE '%hond%' OR
				ip.updated_at LIKE '%hond%'
			)
ERROR - 2025-11-14 16:55:50 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%hond%' OR
				ip.created_at LIKE '%hond%' OR
				ip.policy_no LIKE '%hond%' OR
				ip.vehicle_no LIKE '%hond%' OR
				ip.customer_name LIKE '%hond%' OR
				ip.make LIKE '%hond%' OR
				ip.model LIKE '%hond%' OR
				ip.vehicle_type LIKE '%hond%' OR
				irc.name LIKE '%hond%' OR
				ip.mfg_year LIKE '%hond%' OR
				ip.age LIKE '%hond%' OR
				ip.gvw LIKE '%hond%' OR
				ip.ncb LIKE '%hond%' OR
				ip.policy_type LIKE '%hond%' OR
				ip.start_date LIKE '%hond%' OR
				ip.end_date LIKE '%hond%' OR
				ip.company_name LIKE '%hond%' OR
				iac.name LIKE '%hond%' OR
				ip.name LIKE '%hond%' OR
				ip.od LIKE '%hond%' OR
				ip.tp LIKE '%hond%' OR
				ip.net LIKE '%hond%' OR
				ip.premium LIKE '%hond%' OR
				ip.reward LIKE '%hond%' OR
				ia.name LIKE '%hond%' OR
				ia.mobile_no LIKE '%hond%' OR
				ip.company_grid LIKE '%hond%' OR
				ip.company_grid2 LIKE '%hond%' OR
				ip.tds LIKE '%hond%' OR
				ist.name LIKE '%hond%' OR
				ip.verified_status LIKE '%hond%' OR
				ip.status LIKE '%hond%' OR
				cu1.name LIKE '%hond%' OR
				cu2.name LIKE '%hond%' OR
				ip.updated_at LIKE '%hond%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 16:55:51 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%honda%' OR
				ip.created_at LIKE '%honda%' OR
				ip.policy_no LIKE '%honda%' OR
				ip.vehicle_no LIKE '%honda%' OR
				ip.customer_name LIKE '%honda%' OR
				ip.make LIKE '%honda%' OR
				ip.model LIKE '%honda%' OR
				ip.vehicle_type LIKE '%honda%' OR
				irc.name LIKE '%honda%' OR
				ip.mfg_year LIKE '%honda%' OR
				ip.age LIKE '%honda%' OR
				ip.gvw LIKE '%honda%' OR
				ip.ncb LIKE '%honda%' OR
				ip.policy_type LIKE '%honda%' OR
				ip.start_date LIKE '%honda%' OR
				ip.end_date LIKE '%honda%' OR
				ip.company_name LIKE '%honda%' OR
				iac.name LIKE '%honda%' OR
				ip.name LIKE '%honda%' OR
				ip.od LIKE '%honda%' OR
				ip.tp LIKE '%honda%' OR
				ip.net LIKE '%honda%' OR
				ip.premium LIKE '%honda%' OR
				ip.reward LIKE '%honda%' OR
				ia.name LIKE '%honda%' OR
				ia.mobile_no LIKE '%honda%' OR
				ip.company_grid LIKE '%honda%' OR
				ip.company_grid2 LIKE '%honda%' OR
				ip.tds LIKE '%honda%' OR
				ist.name LIKE '%honda%' OR
				ip.verified_status LIKE '%honda%' OR
				ip.status LIKE '%honda%' OR
				cu1.name LIKE '%honda%' OR
				cu2.name LIKE '%honda%' OR
				ip.updated_at LIKE '%honda%'
			)
ERROR - 2025-11-14 16:55:51 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%honda%' OR
				ip.created_at LIKE '%honda%' OR
				ip.policy_no LIKE '%honda%' OR
				ip.vehicle_no LIKE '%honda%' OR
				ip.customer_name LIKE '%honda%' OR
				ip.make LIKE '%honda%' OR
				ip.model LIKE '%honda%' OR
				ip.vehicle_type LIKE '%honda%' OR
				irc.name LIKE '%honda%' OR
				ip.mfg_year LIKE '%honda%' OR
				ip.age LIKE '%honda%' OR
				ip.gvw LIKE '%honda%' OR
				ip.ncb LIKE '%honda%' OR
				ip.policy_type LIKE '%honda%' OR
				ip.start_date LIKE '%honda%' OR
				ip.end_date LIKE '%honda%' OR
				ip.company_name LIKE '%honda%' OR
				iac.name LIKE '%honda%' OR
				ip.name LIKE '%honda%' OR
				ip.od LIKE '%honda%' OR
				ip.tp LIKE '%honda%' OR
				ip.net LIKE '%honda%' OR
				ip.premium LIKE '%honda%' OR
				ip.reward LIKE '%honda%' OR
				ia.name LIKE '%honda%' OR
				ia.mobile_no LIKE '%honda%' OR
				ip.company_grid LIKE '%honda%' OR
				ip.company_grid2 LIKE '%honda%' OR
				ip.tds LIKE '%honda%' OR
				ist.name LIKE '%honda%' OR
				ip.verified_status LIKE '%honda%' OR
				ip.status LIKE '%honda%' OR
				cu1.name LIKE '%honda%' OR
				cu2.name LIKE '%honda%' OR
				ip.updated_at LIKE '%honda%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 16:55:51 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%hond%' OR
				ip.created_at LIKE '%hond%' OR
				ip.policy_no LIKE '%hond%' OR
				ip.vehicle_no LIKE '%hond%' OR
				ip.customer_name LIKE '%hond%' OR
				ip.make LIKE '%hond%' OR
				ip.model LIKE '%hond%' OR
				ip.vehicle_type LIKE '%hond%' OR
				irc.name LIKE '%hond%' OR
				ip.mfg_year LIKE '%hond%' OR
				ip.age LIKE '%hond%' OR
				ip.gvw LIKE '%hond%' OR
				ip.ncb LIKE '%hond%' OR
				ip.policy_type LIKE '%hond%' OR
				ip.start_date LIKE '%hond%' OR
				ip.end_date LIKE '%hond%' OR
				ip.company_name LIKE '%hond%' OR
				iac.name LIKE '%hond%' OR
				ip.name LIKE '%hond%' OR
				ip.od LIKE '%hond%' OR
				ip.tp LIKE '%hond%' OR
				ip.net LIKE '%hond%' OR
				ip.premium LIKE '%hond%' OR
				ip.reward LIKE '%hond%' OR
				ia.name LIKE '%hond%' OR
				ia.mobile_no LIKE '%hond%' OR
				ip.company_grid LIKE '%hond%' OR
				ip.company_grid2 LIKE '%hond%' OR
				ip.tds LIKE '%hond%' OR
				ist.name LIKE '%hond%' OR
				ip.verified_status LIKE '%hond%' OR
				ip.status LIKE '%hond%' OR
				cu1.name LIKE '%hond%' OR
				cu2.name LIKE '%hond%' OR
				ip.updated_at LIKE '%hond%'
			)
ERROR - 2025-11-14 16:55:51 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%hond%' OR
				ip.created_at LIKE '%hond%' OR
				ip.policy_no LIKE '%hond%' OR
				ip.vehicle_no LIKE '%hond%' OR
				ip.customer_name LIKE '%hond%' OR
				ip.make LIKE '%hond%' OR
				ip.model LIKE '%hond%' OR
				ip.vehicle_type LIKE '%hond%' OR
				irc.name LIKE '%hond%' OR
				ip.mfg_year LIKE '%hond%' OR
				ip.age LIKE '%hond%' OR
				ip.gvw LIKE '%hond%' OR
				ip.ncb LIKE '%hond%' OR
				ip.policy_type LIKE '%hond%' OR
				ip.start_date LIKE '%hond%' OR
				ip.end_date LIKE '%hond%' OR
				ip.company_name LIKE '%hond%' OR
				iac.name LIKE '%hond%' OR
				ip.name LIKE '%hond%' OR
				ip.od LIKE '%hond%' OR
				ip.tp LIKE '%hond%' OR
				ip.net LIKE '%hond%' OR
				ip.premium LIKE '%hond%' OR
				ip.reward LIKE '%hond%' OR
				ia.name LIKE '%hond%' OR
				ia.mobile_no LIKE '%hond%' OR
				ip.company_grid LIKE '%hond%' OR
				ip.company_grid2 LIKE '%hond%' OR
				ip.tds LIKE '%hond%' OR
				ist.name LIKE '%hond%' OR
				ip.verified_status LIKE '%hond%' OR
				ip.status LIKE '%hond%' OR
				cu1.name LIKE '%hond%' OR
				cu2.name LIKE '%hond%' OR
				ip.updated_at LIKE '%hond%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 16:55:52 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%ho%' OR
				ip.created_at LIKE '%ho%' OR
				ip.policy_no LIKE '%ho%' OR
				ip.vehicle_no LIKE '%ho%' OR
				ip.customer_name LIKE '%ho%' OR
				ip.make LIKE '%ho%' OR
				ip.model LIKE '%ho%' OR
				ip.vehicle_type LIKE '%ho%' OR
				irc.name LIKE '%ho%' OR
				ip.mfg_year LIKE '%ho%' OR
				ip.age LIKE '%ho%' OR
				ip.gvw LIKE '%ho%' OR
				ip.ncb LIKE '%ho%' OR
				ip.policy_type LIKE '%ho%' OR
				ip.start_date LIKE '%ho%' OR
				ip.end_date LIKE '%ho%' OR
				ip.company_name LIKE '%ho%' OR
				iac.name LIKE '%ho%' OR
				ip.name LIKE '%ho%' OR
				ip.od LIKE '%ho%' OR
				ip.tp LIKE '%ho%' OR
				ip.net LIKE '%ho%' OR
				ip.premium LIKE '%ho%' OR
				ip.reward LIKE '%ho%' OR
				ia.name LIKE '%ho%' OR
				ia.mobile_no LIKE '%ho%' OR
				ip.company_grid LIKE '%ho%' OR
				ip.company_grid2 LIKE '%ho%' OR
				ip.tds LIKE '%ho%' OR
				ist.name LIKE '%ho%' OR
				ip.verified_status LIKE '%ho%' OR
				ip.status LIKE '%ho%' OR
				cu1.name LIKE '%ho%' OR
				cu2.name LIKE '%ho%' OR
				ip.updated_at LIKE '%ho%'
			)
ERROR - 2025-11-14 16:55:52 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%ho%' OR
				ip.created_at LIKE '%ho%' OR
				ip.policy_no LIKE '%ho%' OR
				ip.vehicle_no LIKE '%ho%' OR
				ip.customer_name LIKE '%ho%' OR
				ip.make LIKE '%ho%' OR
				ip.model LIKE '%ho%' OR
				ip.vehicle_type LIKE '%ho%' OR
				irc.name LIKE '%ho%' OR
				ip.mfg_year LIKE '%ho%' OR
				ip.age LIKE '%ho%' OR
				ip.gvw LIKE '%ho%' OR
				ip.ncb LIKE '%ho%' OR
				ip.policy_type LIKE '%ho%' OR
				ip.start_date LIKE '%ho%' OR
				ip.end_date LIKE '%ho%' OR
				ip.company_name LIKE '%ho%' OR
				iac.name LIKE '%ho%' OR
				ip.name LIKE '%ho%' OR
				ip.od LIKE '%ho%' OR
				ip.tp LIKE '%ho%' OR
				ip.net LIKE '%ho%' OR
				ip.premium LIKE '%ho%' OR
				ip.reward LIKE '%ho%' OR
				ia.name LIKE '%ho%' OR
				ia.mobile_no LIKE '%ho%' OR
				ip.company_grid LIKE '%ho%' OR
				ip.company_grid2 LIKE '%ho%' OR
				ip.tds LIKE '%ho%' OR
				ist.name LIKE '%ho%' OR
				ip.verified_status LIKE '%ho%' OR
				ip.status LIKE '%ho%' OR
				cu1.name LIKE '%ho%' OR
				cu2.name LIKE '%ho%' OR
				ip.updated_at LIKE '%ho%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 16:55:52 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%h%' OR
				ip.created_at LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				irc.name LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				ip.age LIKE '%h%' OR
				ip.gvw LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				ip.start_date LIKE '%h%' OR
				ip.end_date LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				iac.name LIKE '%h%' OR
				ip.name LIKE '%h%' OR
				ip.od LIKE '%h%' OR
				ip.tp LIKE '%h%' OR
				ip.net LIKE '%h%' OR
				ip.premium LIKE '%h%' OR
				ip.reward LIKE '%h%' OR
				ia.name LIKE '%h%' OR
				ia.mobile_no LIKE '%h%' OR
				ip.company_grid LIKE '%h%' OR
				ip.company_grid2 LIKE '%h%' OR
				ip.tds LIKE '%h%' OR
				ist.name LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				cu1.name LIKE '%h%' OR
				cu2.name LIKE '%h%' OR
				ip.updated_at LIKE '%h%'
			)
ERROR - 2025-11-14 16:55:52 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%h%' OR
				ip.created_at LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				irc.name LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				ip.age LIKE '%h%' OR
				ip.gvw LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				ip.start_date LIKE '%h%' OR
				ip.end_date LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				iac.name LIKE '%h%' OR
				ip.name LIKE '%h%' OR
				ip.od LIKE '%h%' OR
				ip.tp LIKE '%h%' OR
				ip.net LIKE '%h%' OR
				ip.premium LIKE '%h%' OR
				ip.reward LIKE '%h%' OR
				ia.name LIKE '%h%' OR
				ia.mobile_no LIKE '%h%' OR
				ip.company_grid LIKE '%h%' OR
				ip.company_grid2 LIKE '%h%' OR
				ip.tds LIKE '%h%' OR
				ist.name LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				cu1.name LIKE '%h%' OR
				cu2.name LIKE '%h%' OR
				ip.updated_at LIKE '%h%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:07:35 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%h%' OR
				ip.created_at LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				irc.name LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				ip.age LIKE '%h%' OR
				ip.gvw LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				ip.start_date LIKE '%h%' OR
				ip.end_date LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				iac.name LIKE '%h%' OR
				ip.name LIKE '%h%' OR
				ip.od LIKE '%h%' OR
				ip.tp LIKE '%h%' OR
				ip.net LIKE '%h%' OR
				ip.premium LIKE '%h%' OR
				ip.reward LIKE '%h%' OR
				ia.name LIKE '%h%' OR
				ia.mobile_no LIKE '%h%' OR
				ip.company_grid LIKE '%h%' OR
				ip.company_grid2 LIKE '%h%' OR
				ip.tds LIKE '%h%' OR
				ist.name LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				cu1.name LIKE '%h%' OR
				cu2.name LIKE '%h%' OR
				ip.updated_at LIKE '%h%'
			)
ERROR - 2025-11-14 17:07:35 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%h%' OR
				ip.created_at LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				irc.name LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				ip.age LIKE '%h%' OR
				ip.gvw LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				ip.start_date LIKE '%h%' OR
				ip.end_date LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				iac.name LIKE '%h%' OR
				ip.name LIKE '%h%' OR
				ip.od LIKE '%h%' OR
				ip.tp LIKE '%h%' OR
				ip.net LIKE '%h%' OR
				ip.premium LIKE '%h%' OR
				ip.reward LIKE '%h%' OR
				ia.name LIKE '%h%' OR
				ia.mobile_no LIKE '%h%' OR
				ip.company_grid LIKE '%h%' OR
				ip.company_grid2 LIKE '%h%' OR
				ip.tds LIKE '%h%' OR
				ist.name LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				cu1.name LIKE '%h%' OR
				cu2.name LIKE '%h%' OR
				ip.updated_at LIKE '%h%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:07:35 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%ho%' OR
				ip.created_at LIKE '%ho%' OR
				ip.policy_no LIKE '%ho%' OR
				ip.vehicle_no LIKE '%ho%' OR
				ip.customer_name LIKE '%ho%' OR
				ip.make LIKE '%ho%' OR
				ip.model LIKE '%ho%' OR
				ip.vehicle_type LIKE '%ho%' OR
				irc.name LIKE '%ho%' OR
				ip.mfg_year LIKE '%ho%' OR
				ip.age LIKE '%ho%' OR
				ip.gvw LIKE '%ho%' OR
				ip.ncb LIKE '%ho%' OR
				ip.policy_type LIKE '%ho%' OR
				ip.start_date LIKE '%ho%' OR
				ip.end_date LIKE '%ho%' OR
				ip.company_name LIKE '%ho%' OR
				iac.name LIKE '%ho%' OR
				ip.name LIKE '%ho%' OR
				ip.od LIKE '%ho%' OR
				ip.tp LIKE '%ho%' OR
				ip.net LIKE '%ho%' OR
				ip.premium LIKE '%ho%' OR
				ip.reward LIKE '%ho%' OR
				ia.name LIKE '%ho%' OR
				ia.mobile_no LIKE '%ho%' OR
				ip.company_grid LIKE '%ho%' OR
				ip.company_grid2 LIKE '%ho%' OR
				ip.tds LIKE '%ho%' OR
				ist.name LIKE '%ho%' OR
				ip.verified_status LIKE '%ho%' OR
				ip.status LIKE '%ho%' OR
				cu1.name LIKE '%ho%' OR
				cu2.name LIKE '%ho%' OR
				ip.updated_at LIKE '%ho%'
			)
ERROR - 2025-11-14 17:07:35 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%ho%' OR
				ip.created_at LIKE '%ho%' OR
				ip.policy_no LIKE '%ho%' OR
				ip.vehicle_no LIKE '%ho%' OR
				ip.customer_name LIKE '%ho%' OR
				ip.make LIKE '%ho%' OR
				ip.model LIKE '%ho%' OR
				ip.vehicle_type LIKE '%ho%' OR
				irc.name LIKE '%ho%' OR
				ip.mfg_year LIKE '%ho%' OR
				ip.age LIKE '%ho%' OR
				ip.gvw LIKE '%ho%' OR
				ip.ncb LIKE '%ho%' OR
				ip.policy_type LIKE '%ho%' OR
				ip.start_date LIKE '%ho%' OR
				ip.end_date LIKE '%ho%' OR
				ip.company_name LIKE '%ho%' OR
				iac.name LIKE '%ho%' OR
				ip.name LIKE '%ho%' OR
				ip.od LIKE '%ho%' OR
				ip.tp LIKE '%ho%' OR
				ip.net LIKE '%ho%' OR
				ip.premium LIKE '%ho%' OR
				ip.reward LIKE '%ho%' OR
				ia.name LIKE '%ho%' OR
				ia.mobile_no LIKE '%ho%' OR
				ip.company_grid LIKE '%ho%' OR
				ip.company_grid2 LIKE '%ho%' OR
				ip.tds LIKE '%ho%' OR
				ist.name LIKE '%ho%' OR
				ip.verified_status LIKE '%ho%' OR
				ip.status LIKE '%ho%' OR
				cu1.name LIKE '%ho%' OR
				cu2.name LIKE '%ho%' OR
				ip.updated_at LIKE '%ho%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:07:36 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%hon%' OR
				ip.created_at LIKE '%hon%' OR
				ip.policy_no LIKE '%hon%' OR
				ip.vehicle_no LIKE '%hon%' OR
				ip.customer_name LIKE '%hon%' OR
				ip.make LIKE '%hon%' OR
				ip.model LIKE '%hon%' OR
				ip.vehicle_type LIKE '%hon%' OR
				irc.name LIKE '%hon%' OR
				ip.mfg_year LIKE '%hon%' OR
				ip.age LIKE '%hon%' OR
				ip.gvw LIKE '%hon%' OR
				ip.ncb LIKE '%hon%' OR
				ip.policy_type LIKE '%hon%' OR
				ip.start_date LIKE '%hon%' OR
				ip.end_date LIKE '%hon%' OR
				ip.company_name LIKE '%hon%' OR
				iac.name LIKE '%hon%' OR
				ip.name LIKE '%hon%' OR
				ip.od LIKE '%hon%' OR
				ip.tp LIKE '%hon%' OR
				ip.net LIKE '%hon%' OR
				ip.premium LIKE '%hon%' OR
				ip.reward LIKE '%hon%' OR
				ia.name LIKE '%hon%' OR
				ia.mobile_no LIKE '%hon%' OR
				ip.company_grid LIKE '%hon%' OR
				ip.company_grid2 LIKE '%hon%' OR
				ip.tds LIKE '%hon%' OR
				ist.name LIKE '%hon%' OR
				ip.verified_status LIKE '%hon%' OR
				ip.status LIKE '%hon%' OR
				cu1.name LIKE '%hon%' OR
				cu2.name LIKE '%hon%' OR
				ip.updated_at LIKE '%hon%'
			)
ERROR - 2025-11-14 17:07:36 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%hon%' OR
				ip.created_at LIKE '%hon%' OR
				ip.policy_no LIKE '%hon%' OR
				ip.vehicle_no LIKE '%hon%' OR
				ip.customer_name LIKE '%hon%' OR
				ip.make LIKE '%hon%' OR
				ip.model LIKE '%hon%' OR
				ip.vehicle_type LIKE '%hon%' OR
				irc.name LIKE '%hon%' OR
				ip.mfg_year LIKE '%hon%' OR
				ip.age LIKE '%hon%' OR
				ip.gvw LIKE '%hon%' OR
				ip.ncb LIKE '%hon%' OR
				ip.policy_type LIKE '%hon%' OR
				ip.start_date LIKE '%hon%' OR
				ip.end_date LIKE '%hon%' OR
				ip.company_name LIKE '%hon%' OR
				iac.name LIKE '%hon%' OR
				ip.name LIKE '%hon%' OR
				ip.od LIKE '%hon%' OR
				ip.tp LIKE '%hon%' OR
				ip.net LIKE '%hon%' OR
				ip.premium LIKE '%hon%' OR
				ip.reward LIKE '%hon%' OR
				ia.name LIKE '%hon%' OR
				ia.mobile_no LIKE '%hon%' OR
				ip.company_grid LIKE '%hon%' OR
				ip.company_grid2 LIKE '%hon%' OR
				ip.tds LIKE '%hon%' OR
				ist.name LIKE '%hon%' OR
				ip.verified_status LIKE '%hon%' OR
				ip.status LIKE '%hon%' OR
				cu1.name LIKE '%hon%' OR
				cu2.name LIKE '%hon%' OR
				ip.updated_at LIKE '%hon%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:07:36 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%hond%' OR
				ip.created_at LIKE '%hond%' OR
				ip.policy_no LIKE '%hond%' OR
				ip.vehicle_no LIKE '%hond%' OR
				ip.customer_name LIKE '%hond%' OR
				ip.make LIKE '%hond%' OR
				ip.model LIKE '%hond%' OR
				ip.vehicle_type LIKE '%hond%' OR
				irc.name LIKE '%hond%' OR
				ip.mfg_year LIKE '%hond%' OR
				ip.age LIKE '%hond%' OR
				ip.gvw LIKE '%hond%' OR
				ip.ncb LIKE '%hond%' OR
				ip.policy_type LIKE '%hond%' OR
				ip.start_date LIKE '%hond%' OR
				ip.end_date LIKE '%hond%' OR
				ip.company_name LIKE '%hond%' OR
				iac.name LIKE '%hond%' OR
				ip.name LIKE '%hond%' OR
				ip.od LIKE '%hond%' OR
				ip.tp LIKE '%hond%' OR
				ip.net LIKE '%hond%' OR
				ip.premium LIKE '%hond%' OR
				ip.reward LIKE '%hond%' OR
				ia.name LIKE '%hond%' OR
				ia.mobile_no LIKE '%hond%' OR
				ip.company_grid LIKE '%hond%' OR
				ip.company_grid2 LIKE '%hond%' OR
				ip.tds LIKE '%hond%' OR
				ist.name LIKE '%hond%' OR
				ip.verified_status LIKE '%hond%' OR
				ip.status LIKE '%hond%' OR
				cu1.name LIKE '%hond%' OR
				cu2.name LIKE '%hond%' OR
				ip.updated_at LIKE '%hond%'
			)
ERROR - 2025-11-14 17:07:36 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%hond%' OR
				ip.created_at LIKE '%hond%' OR
				ip.policy_no LIKE '%hond%' OR
				ip.vehicle_no LIKE '%hond%' OR
				ip.customer_name LIKE '%hond%' OR
				ip.make LIKE '%hond%' OR
				ip.model LIKE '%hond%' OR
				ip.vehicle_type LIKE '%hond%' OR
				irc.name LIKE '%hond%' OR
				ip.mfg_year LIKE '%hond%' OR
				ip.age LIKE '%hond%' OR
				ip.gvw LIKE '%hond%' OR
				ip.ncb LIKE '%hond%' OR
				ip.policy_type LIKE '%hond%' OR
				ip.start_date LIKE '%hond%' OR
				ip.end_date LIKE '%hond%' OR
				ip.company_name LIKE '%hond%' OR
				iac.name LIKE '%hond%' OR
				ip.name LIKE '%hond%' OR
				ip.od LIKE '%hond%' OR
				ip.tp LIKE '%hond%' OR
				ip.net LIKE '%hond%' OR
				ip.premium LIKE '%hond%' OR
				ip.reward LIKE '%hond%' OR
				ia.name LIKE '%hond%' OR
				ia.mobile_no LIKE '%hond%' OR
				ip.company_grid LIKE '%hond%' OR
				ip.company_grid2 LIKE '%hond%' OR
				ip.tds LIKE '%hond%' OR
				ist.name LIKE '%hond%' OR
				ip.verified_status LIKE '%hond%' OR
				ip.status LIKE '%hond%' OR
				cu1.name LIKE '%hond%' OR
				cu2.name LIKE '%hond%' OR
				ip.updated_at LIKE '%hond%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:07:37 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%honda%' OR
				ip.created_at LIKE '%honda%' OR
				ip.policy_no LIKE '%honda%' OR
				ip.vehicle_no LIKE '%honda%' OR
				ip.customer_name LIKE '%honda%' OR
				ip.make LIKE '%honda%' OR
				ip.model LIKE '%honda%' OR
				ip.vehicle_type LIKE '%honda%' OR
				irc.name LIKE '%honda%' OR
				ip.mfg_year LIKE '%honda%' OR
				ip.age LIKE '%honda%' OR
				ip.gvw LIKE '%honda%' OR
				ip.ncb LIKE '%honda%' OR
				ip.policy_type LIKE '%honda%' OR
				ip.start_date LIKE '%honda%' OR
				ip.end_date LIKE '%honda%' OR
				ip.company_name LIKE '%honda%' OR
				iac.name LIKE '%honda%' OR
				ip.name LIKE '%honda%' OR
				ip.od LIKE '%honda%' OR
				ip.tp LIKE '%honda%' OR
				ip.net LIKE '%honda%' OR
				ip.premium LIKE '%honda%' OR
				ip.reward LIKE '%honda%' OR
				ia.name LIKE '%honda%' OR
				ia.mobile_no LIKE '%honda%' OR
				ip.company_grid LIKE '%honda%' OR
				ip.company_grid2 LIKE '%honda%' OR
				ip.tds LIKE '%honda%' OR
				ist.name LIKE '%honda%' OR
				ip.verified_status LIKE '%honda%' OR
				ip.status LIKE '%honda%' OR
				cu1.name LIKE '%honda%' OR
				cu2.name LIKE '%honda%' OR
				ip.updated_at LIKE '%honda%'
			)
ERROR - 2025-11-14 17:07:37 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%honda%' OR
				ip.created_at LIKE '%honda%' OR
				ip.policy_no LIKE '%honda%' OR
				ip.vehicle_no LIKE '%honda%' OR
				ip.customer_name LIKE '%honda%' OR
				ip.make LIKE '%honda%' OR
				ip.model LIKE '%honda%' OR
				ip.vehicle_type LIKE '%honda%' OR
				irc.name LIKE '%honda%' OR
				ip.mfg_year LIKE '%honda%' OR
				ip.age LIKE '%honda%' OR
				ip.gvw LIKE '%honda%' OR
				ip.ncb LIKE '%honda%' OR
				ip.policy_type LIKE '%honda%' OR
				ip.start_date LIKE '%honda%' OR
				ip.end_date LIKE '%honda%' OR
				ip.company_name LIKE '%honda%' OR
				iac.name LIKE '%honda%' OR
				ip.name LIKE '%honda%' OR
				ip.od LIKE '%honda%' OR
				ip.tp LIKE '%honda%' OR
				ip.net LIKE '%honda%' OR
				ip.premium LIKE '%honda%' OR
				ip.reward LIKE '%honda%' OR
				ia.name LIKE '%honda%' OR
				ia.mobile_no LIKE '%honda%' OR
				ip.company_grid LIKE '%honda%' OR
				ip.company_grid2 LIKE '%honda%' OR
				ip.tds LIKE '%honda%' OR
				ist.name LIKE '%honda%' OR
				ip.verified_status LIKE '%honda%' OR
				ip.status LIKE '%honda%' OR
				cu1.name LIKE '%honda%' OR
				cu2.name LIKE '%honda%' OR
				ip.updated_at LIKE '%honda%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:07:53 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%v%' OR
				ip.created_at LIKE '%v%' OR
				ip.policy_no LIKE '%v%' OR
				ip.vehicle_no LIKE '%v%' OR
				ip.customer_name LIKE '%v%' OR
				ip.make LIKE '%v%' OR
				ip.model LIKE '%v%' OR
				ip.vehicle_type LIKE '%v%' OR
				irc.name LIKE '%v%' OR
				ip.mfg_year LIKE '%v%' OR
				ip.age LIKE '%v%' OR
				ip.gvw LIKE '%v%' OR
				ip.ncb LIKE '%v%' OR
				ip.policy_type LIKE '%v%' OR
				ip.start_date LIKE '%v%' OR
				ip.end_date LIKE '%v%' OR
				ip.company_name LIKE '%v%' OR
				iac.name LIKE '%v%' OR
				ip.name LIKE '%v%' OR
				ip.od LIKE '%v%' OR
				ip.tp LIKE '%v%' OR
				ip.net LIKE '%v%' OR
				ip.premium LIKE '%v%' OR
				ip.reward LIKE '%v%' OR
				ia.name LIKE '%v%' OR
				ia.mobile_no LIKE '%v%' OR
				ip.company_grid LIKE '%v%' OR
				ip.company_grid2 LIKE '%v%' OR
				ip.tds LIKE '%v%' OR
				ist.name LIKE '%v%' OR
				ip.verified_status LIKE '%v%' OR
				ip.status LIKE '%v%' OR
				cu1.name LIKE '%v%' OR
				cu2.name LIKE '%v%' OR
				ip.updated_at LIKE '%v%'
			)
ERROR - 2025-11-14 17:07:53 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%v%' OR
				ip.created_at LIKE '%v%' OR
				ip.policy_no LIKE '%v%' OR
				ip.vehicle_no LIKE '%v%' OR
				ip.customer_name LIKE '%v%' OR
				ip.make LIKE '%v%' OR
				ip.model LIKE '%v%' OR
				ip.vehicle_type LIKE '%v%' OR
				irc.name LIKE '%v%' OR
				ip.mfg_year LIKE '%v%' OR
				ip.age LIKE '%v%' OR
				ip.gvw LIKE '%v%' OR
				ip.ncb LIKE '%v%' OR
				ip.policy_type LIKE '%v%' OR
				ip.start_date LIKE '%v%' OR
				ip.end_date LIKE '%v%' OR
				ip.company_name LIKE '%v%' OR
				iac.name LIKE '%v%' OR
				ip.name LIKE '%v%' OR
				ip.od LIKE '%v%' OR
				ip.tp LIKE '%v%' OR
				ip.net LIKE '%v%' OR
				ip.premium LIKE '%v%' OR
				ip.reward LIKE '%v%' OR
				ia.name LIKE '%v%' OR
				ia.mobile_no LIKE '%v%' OR
				ip.company_grid LIKE '%v%' OR
				ip.company_grid2 LIKE '%v%' OR
				ip.tds LIKE '%v%' OR
				ist.name LIKE '%v%' OR
				ip.verified_status LIKE '%v%' OR
				ip.status LIKE '%v%' OR
				cu1.name LIKE '%v%' OR
				cu2.name LIKE '%v%' OR
				ip.updated_at LIKE '%v%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:07:54 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%	HONDA%' OR
				ip.created_at LIKE '%	HONDA%' OR
				ip.policy_no LIKE '%	HONDA%' OR
				ip.vehicle_no LIKE '%	HONDA%' OR
				ip.customer_name LIKE '%	HONDA%' OR
				ip.make LIKE '%	HONDA%' OR
				ip.model LIKE '%	HONDA%' OR
				ip.vehicle_type LIKE '%	HONDA%' OR
				irc.name LIKE '%	HONDA%' OR
				ip.mfg_year LIKE '%	HONDA%' OR
				ip.age LIKE '%	HONDA%' OR
				ip.gvw LIKE '%	HONDA%' OR
				ip.ncb LIKE '%	HONDA%' OR
				ip.policy_type LIKE '%	HONDA%' OR
				ip.start_date LIKE '%	HONDA%' OR
				ip.end_date LIKE '%	HONDA%' OR
				ip.company_name LIKE '%	HONDA%' OR
				iac.name LIKE '%	HONDA%' OR
				ip.name LIKE '%	HONDA%' OR
				ip.od LIKE '%	HONDA%' OR
				ip.tp LIKE '%	HONDA%' OR
				ip.net LIKE '%	HONDA%' OR
				ip.premium LIKE '%	HONDA%' OR
				ip.reward LIKE '%	HONDA%' OR
				ia.name LIKE '%	HONDA%' OR
				ia.mobile_no LIKE '%	HONDA%' OR
				ip.company_grid LIKE '%	HONDA%' OR
				ip.company_grid2 LIKE '%	HONDA%' OR
				ip.tds LIKE '%	HONDA%' OR
				ist.name LIKE '%	HONDA%' OR
				ip.verified_status LIKE '%	HONDA%' OR
				ip.status LIKE '%	HONDA%' OR
				cu1.name LIKE '%	HONDA%' OR
				cu2.name LIKE '%	HONDA%' OR
				ip.updated_at LIKE '%	HONDA%'
			)
ERROR - 2025-11-14 17:07:54 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%	HONDA%' OR
				ip.created_at LIKE '%	HONDA%' OR
				ip.policy_no LIKE '%	HONDA%' OR
				ip.vehicle_no LIKE '%	HONDA%' OR
				ip.customer_name LIKE '%	HONDA%' OR
				ip.make LIKE '%	HONDA%' OR
				ip.model LIKE '%	HONDA%' OR
				ip.vehicle_type LIKE '%	HONDA%' OR
				irc.name LIKE '%	HONDA%' OR
				ip.mfg_year LIKE '%	HONDA%' OR
				ip.age LIKE '%	HONDA%' OR
				ip.gvw LIKE '%	HONDA%' OR
				ip.ncb LIKE '%	HONDA%' OR
				ip.policy_type LIKE '%	HONDA%' OR
				ip.start_date LIKE '%	HONDA%' OR
				ip.end_date LIKE '%	HONDA%' OR
				ip.company_name LIKE '%	HONDA%' OR
				iac.name LIKE '%	HONDA%' OR
				ip.name LIKE '%	HONDA%' OR
				ip.od LIKE '%	HONDA%' OR
				ip.tp LIKE '%	HONDA%' OR
				ip.net LIKE '%	HONDA%' OR
				ip.premium LIKE '%	HONDA%' OR
				ip.reward LIKE '%	HONDA%' OR
				ia.name LIKE '%	HONDA%' OR
				ia.mobile_no LIKE '%	HONDA%' OR
				ip.company_grid LIKE '%	HONDA%' OR
				ip.company_grid2 LIKE '%	HONDA%' OR
				ip.tds LIKE '%	HONDA%' OR
				ist.name LIKE '%	HONDA%' OR
				ip.verified_status LIKE '%	HONDA%' OR
				ip.status LIKE '%	HONDA%' OR
				cu1.name LIKE '%	HONDA%' OR
				cu2.name LIKE '%	HONDA%' OR
				ip.updated_at LIKE '%	HONDA%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:07:56 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%HONDA%' OR
				ip.created_at LIKE '%HONDA%' OR
				ip.policy_no LIKE '%HONDA%' OR
				ip.vehicle_no LIKE '%HONDA%' OR
				ip.customer_name LIKE '%HONDA%' OR
				ip.make LIKE '%HONDA%' OR
				ip.model LIKE '%HONDA%' OR
				ip.vehicle_type LIKE '%HONDA%' OR
				irc.name LIKE '%HONDA%' OR
				ip.mfg_year LIKE '%HONDA%' OR
				ip.age LIKE '%HONDA%' OR
				ip.gvw LIKE '%HONDA%' OR
				ip.ncb LIKE '%HONDA%' OR
				ip.policy_type LIKE '%HONDA%' OR
				ip.start_date LIKE '%HONDA%' OR
				ip.end_date LIKE '%HONDA%' OR
				ip.company_name LIKE '%HONDA%' OR
				iac.name LIKE '%HONDA%' OR
				ip.name LIKE '%HONDA%' OR
				ip.od LIKE '%HONDA%' OR
				ip.tp LIKE '%HONDA%' OR
				ip.net LIKE '%HONDA%' OR
				ip.premium LIKE '%HONDA%' OR
				ip.reward LIKE '%HONDA%' OR
				ia.name LIKE '%HONDA%' OR
				ia.mobile_no LIKE '%HONDA%' OR
				ip.company_grid LIKE '%HONDA%' OR
				ip.company_grid2 LIKE '%HONDA%' OR
				ip.tds LIKE '%HONDA%' OR
				ist.name LIKE '%HONDA%' OR
				ip.verified_status LIKE '%HONDA%' OR
				ip.status LIKE '%HONDA%' OR
				cu1.name LIKE '%HONDA%' OR
				cu2.name LIKE '%HONDA%' OR
				ip.updated_at LIKE '%HONDA%'
			)
ERROR - 2025-11-14 17:07:56 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%HONDA%' OR
				ip.created_at LIKE '%HONDA%' OR
				ip.policy_no LIKE '%HONDA%' OR
				ip.vehicle_no LIKE '%HONDA%' OR
				ip.customer_name LIKE '%HONDA%' OR
				ip.make LIKE '%HONDA%' OR
				ip.model LIKE '%HONDA%' OR
				ip.vehicle_type LIKE '%HONDA%' OR
				irc.name LIKE '%HONDA%' OR
				ip.mfg_year LIKE '%HONDA%' OR
				ip.age LIKE '%HONDA%' OR
				ip.gvw LIKE '%HONDA%' OR
				ip.ncb LIKE '%HONDA%' OR
				ip.policy_type LIKE '%HONDA%' OR
				ip.start_date LIKE '%HONDA%' OR
				ip.end_date LIKE '%HONDA%' OR
				ip.company_name LIKE '%HONDA%' OR
				iac.name LIKE '%HONDA%' OR
				ip.name LIKE '%HONDA%' OR
				ip.od LIKE '%HONDA%' OR
				ip.tp LIKE '%HONDA%' OR
				ip.net LIKE '%HONDA%' OR
				ip.premium LIKE '%HONDA%' OR
				ip.reward LIKE '%HONDA%' OR
				ia.name LIKE '%HONDA%' OR
				ia.mobile_no LIKE '%HONDA%' OR
				ip.company_grid LIKE '%HONDA%' OR
				ip.company_grid2 LIKE '%HONDA%' OR
				ip.tds LIKE '%HONDA%' OR
				ist.name LIKE '%HONDA%' OR
				ip.verified_status LIKE '%HONDA%' OR
				ip.status LIKE '%HONDA%' OR
				cu1.name LIKE '%HONDA%' OR
				cu2.name LIKE '%HONDA%' OR
				ip.updated_at LIKE '%HONDA%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:08:00 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%t%' OR
				ip.created_at LIKE '%t%' OR
				ip.policy_no LIKE '%t%' OR
				ip.vehicle_no LIKE '%t%' OR
				ip.customer_name LIKE '%t%' OR
				ip.make LIKE '%t%' OR
				ip.model LIKE '%t%' OR
				ip.vehicle_type LIKE '%t%' OR
				irc.name LIKE '%t%' OR
				ip.mfg_year LIKE '%t%' OR
				ip.age LIKE '%t%' OR
				ip.gvw LIKE '%t%' OR
				ip.ncb LIKE '%t%' OR
				ip.policy_type LIKE '%t%' OR
				ip.start_date LIKE '%t%' OR
				ip.end_date LIKE '%t%' OR
				ip.company_name LIKE '%t%' OR
				iac.name LIKE '%t%' OR
				ip.name LIKE '%t%' OR
				ip.od LIKE '%t%' OR
				ip.tp LIKE '%t%' OR
				ip.net LIKE '%t%' OR
				ip.premium LIKE '%t%' OR
				ip.reward LIKE '%t%' OR
				ia.name LIKE '%t%' OR
				ia.mobile_no LIKE '%t%' OR
				ip.company_grid LIKE '%t%' OR
				ip.company_grid2 LIKE '%t%' OR
				ip.tds LIKE '%t%' OR
				ist.name LIKE '%t%' OR
				ip.verified_status LIKE '%t%' OR
				ip.status LIKE '%t%' OR
				cu1.name LIKE '%t%' OR
				cu2.name LIKE '%t%' OR
				ip.updated_at LIKE '%t%'
			)
ERROR - 2025-11-14 17:08:00 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%t%' OR
				ip.created_at LIKE '%t%' OR
				ip.policy_no LIKE '%t%' OR
				ip.vehicle_no LIKE '%t%' OR
				ip.customer_name LIKE '%t%' OR
				ip.make LIKE '%t%' OR
				ip.model LIKE '%t%' OR
				ip.vehicle_type LIKE '%t%' OR
				irc.name LIKE '%t%' OR
				ip.mfg_year LIKE '%t%' OR
				ip.age LIKE '%t%' OR
				ip.gvw LIKE '%t%' OR
				ip.ncb LIKE '%t%' OR
				ip.policy_type LIKE '%t%' OR
				ip.start_date LIKE '%t%' OR
				ip.end_date LIKE '%t%' OR
				ip.company_name LIKE '%t%' OR
				iac.name LIKE '%t%' OR
				ip.name LIKE '%t%' OR
				ip.od LIKE '%t%' OR
				ip.tp LIKE '%t%' OR
				ip.net LIKE '%t%' OR
				ip.premium LIKE '%t%' OR
				ip.reward LIKE '%t%' OR
				ia.name LIKE '%t%' OR
				ia.mobile_no LIKE '%t%' OR
				ip.company_grid LIKE '%t%' OR
				ip.company_grid2 LIKE '%t%' OR
				ip.tds LIKE '%t%' OR
				ist.name LIKE '%t%' OR
				ip.verified_status LIKE '%t%' OR
				ip.status LIKE '%t%' OR
				cu1.name LIKE '%t%' OR
				cu2.name LIKE '%t%' OR
				ip.updated_at LIKE '%t%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:08:01 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%the%' OR
				ip.created_at LIKE '%the%' OR
				ip.policy_no LIKE '%the%' OR
				ip.vehicle_no LIKE '%the%' OR
				ip.customer_name LIKE '%the%' OR
				ip.make LIKE '%the%' OR
				ip.model LIKE '%the%' OR
				ip.vehicle_type LIKE '%the%' OR
				irc.name LIKE '%the%' OR
				ip.mfg_year LIKE '%the%' OR
				ip.age LIKE '%the%' OR
				ip.gvw LIKE '%the%' OR
				ip.ncb LIKE '%the%' OR
				ip.policy_type LIKE '%the%' OR
				ip.start_date LIKE '%the%' OR
				ip.end_date LIKE '%the%' OR
				ip.company_name LIKE '%the%' OR
				iac.name LIKE '%the%' OR
				ip.name LIKE '%the%' OR
				ip.od LIKE '%the%' OR
				ip.tp LIKE '%the%' OR
				ip.net LIKE '%the%' OR
				ip.premium LIKE '%the%' OR
				ip.reward LIKE '%the%' OR
				ia.name LIKE '%the%' OR
				ia.mobile_no LIKE '%the%' OR
				ip.company_grid LIKE '%the%' OR
				ip.company_grid2 LIKE '%the%' OR
				ip.tds LIKE '%the%' OR
				ist.name LIKE '%the%' OR
				ip.verified_status LIKE '%the%' OR
				ip.status LIKE '%the%' OR
				cu1.name LIKE '%the%' OR
				cu2.name LIKE '%the%' OR
				ip.updated_at LIKE '%the%'
			)
ERROR - 2025-11-14 17:08:01 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%the%' OR
				ip.created_at LIKE '%the%' OR
				ip.policy_no LIKE '%the%' OR
				ip.vehicle_no LIKE '%the%' OR
				ip.customer_name LIKE '%the%' OR
				ip.make LIKE '%the%' OR
				ip.model LIKE '%the%' OR
				ip.vehicle_type LIKE '%the%' OR
				irc.name LIKE '%the%' OR
				ip.mfg_year LIKE '%the%' OR
				ip.age LIKE '%the%' OR
				ip.gvw LIKE '%the%' OR
				ip.ncb LIKE '%the%' OR
				ip.policy_type LIKE '%the%' OR
				ip.start_date LIKE '%the%' OR
				ip.end_date LIKE '%the%' OR
				ip.company_name LIKE '%the%' OR
				iac.name LIKE '%the%' OR
				ip.name LIKE '%the%' OR
				ip.od LIKE '%the%' OR
				ip.tp LIKE '%the%' OR
				ip.net LIKE '%the%' OR
				ip.premium LIKE '%the%' OR
				ip.reward LIKE '%the%' OR
				ia.name LIKE '%the%' OR
				ia.mobile_no LIKE '%the%' OR
				ip.company_grid LIKE '%the%' OR
				ip.company_grid2 LIKE '%the%' OR
				ip.tds LIKE '%the%' OR
				ist.name LIKE '%the%' OR
				ip.verified_status LIKE '%the%' OR
				ip.status LIKE '%the%' OR
				cu1.name LIKE '%the%' OR
				cu2.name LIKE '%the%' OR
				ip.updated_at LIKE '%the%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:08:09 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%	6303519172 00 00%' OR
				ip.created_at LIKE '%	6303519172 00 00%' OR
				ip.policy_no LIKE '%	6303519172 00 00%' OR
				ip.vehicle_no LIKE '%	6303519172 00 00%' OR
				ip.customer_name LIKE '%	6303519172 00 00%' OR
				ip.make LIKE '%	6303519172 00 00%' OR
				ip.model LIKE '%	6303519172 00 00%' OR
				ip.vehicle_type LIKE '%	6303519172 00 00%' OR
				irc.name LIKE '%	6303519172 00 00%' OR
				ip.mfg_year LIKE '%	6303519172 00 00%' OR
				ip.age LIKE '%	6303519172 00 00%' OR
				ip.gvw LIKE '%	6303519172 00 00%' OR
				ip.ncb LIKE '%	6303519172 00 00%' OR
				ip.policy_type LIKE '%	6303519172 00 00%' OR
				ip.start_date LIKE '%	6303519172 00 00%' OR
				ip.end_date LIKE '%	6303519172 00 00%' OR
				ip.company_name LIKE '%	6303519172 00 00%' OR
				iac.name LIKE '%	6303519172 00 00%' OR
				ip.name LIKE '%	6303519172 00 00%' OR
				ip.od LIKE '%	6303519172 00 00%' OR
				ip.tp LIKE '%	6303519172 00 00%' OR
				ip.net LIKE '%	6303519172 00 00%' OR
				ip.premium LIKE '%	6303519172 00 00%' OR
				ip.reward LIKE '%	6303519172 00 00%' OR
				ia.name LIKE '%	6303519172 00 00%' OR
				ia.mobile_no LIKE '%	6303519172 00 00%' OR
				ip.company_grid LIKE '%	6303519172 00 00%' OR
				ip.company_grid2 LIKE '%	6303519172 00 00%' OR
				ip.tds LIKE '%	6303519172 00 00%' OR
				ist.name LIKE '%	6303519172 00 00%' OR
				ip.verified_status LIKE '%	6303519172 00 00%' OR
				ip.status LIKE '%	6303519172 00 00%' OR
				cu1.name LIKE '%	6303519172 00 00%' OR
				cu2.name LIKE '%	6303519172 00 00%' OR
				ip.updated_at LIKE '%	6303519172 00 00%'
			)
ERROR - 2025-11-14 17:08:09 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%	6303519172 00 00%' OR
				ip.created_at LIKE '%	6303519172 00 00%' OR
				ip.policy_no LIKE '%	6303519172 00 00%' OR
				ip.vehicle_no LIKE '%	6303519172 00 00%' OR
				ip.customer_name LIKE '%	6303519172 00 00%' OR
				ip.make LIKE '%	6303519172 00 00%' OR
				ip.model LIKE '%	6303519172 00 00%' OR
				ip.vehicle_type LIKE '%	6303519172 00 00%' OR
				irc.name LIKE '%	6303519172 00 00%' OR
				ip.mfg_year LIKE '%	6303519172 00 00%' OR
				ip.age LIKE '%	6303519172 00 00%' OR
				ip.gvw LIKE '%	6303519172 00 00%' OR
				ip.ncb LIKE '%	6303519172 00 00%' OR
				ip.policy_type LIKE '%	6303519172 00 00%' OR
				ip.start_date LIKE '%	6303519172 00 00%' OR
				ip.end_date LIKE '%	6303519172 00 00%' OR
				ip.company_name LIKE '%	6303519172 00 00%' OR
				iac.name LIKE '%	6303519172 00 00%' OR
				ip.name LIKE '%	6303519172 00 00%' OR
				ip.od LIKE '%	6303519172 00 00%' OR
				ip.tp LIKE '%	6303519172 00 00%' OR
				ip.net LIKE '%	6303519172 00 00%' OR
				ip.premium LIKE '%	6303519172 00 00%' OR
				ip.reward LIKE '%	6303519172 00 00%' OR
				ia.name LIKE '%	6303519172 00 00%' OR
				ia.mobile_no LIKE '%	6303519172 00 00%' OR
				ip.company_grid LIKE '%	6303519172 00 00%' OR
				ip.company_grid2 LIKE '%	6303519172 00 00%' OR
				ip.tds LIKE '%	6303519172 00 00%' OR
				ist.name LIKE '%	6303519172 00 00%' OR
				ip.verified_status LIKE '%	6303519172 00 00%' OR
				ip.status LIKE '%	6303519172 00 00%' OR
				cu1.name LIKE '%	6303519172 00 00%' OR
				cu2.name LIKE '%	6303519172 00 00%' OR
				ip.updated_at LIKE '%	6303519172 00 00%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:08:12 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%6303519172 00 00%' OR
				ip.created_at LIKE '%6303519172 00 00%' OR
				ip.policy_no LIKE '%6303519172 00 00%' OR
				ip.vehicle_no LIKE '%6303519172 00 00%' OR
				ip.customer_name LIKE '%6303519172 00 00%' OR
				ip.make LIKE '%6303519172 00 00%' OR
				ip.model LIKE '%6303519172 00 00%' OR
				ip.vehicle_type LIKE '%6303519172 00 00%' OR
				irc.name LIKE '%6303519172 00 00%' OR
				ip.mfg_year LIKE '%6303519172 00 00%' OR
				ip.age LIKE '%6303519172 00 00%' OR
				ip.gvw LIKE '%6303519172 00 00%' OR
				ip.ncb LIKE '%6303519172 00 00%' OR
				ip.policy_type LIKE '%6303519172 00 00%' OR
				ip.start_date LIKE '%6303519172 00 00%' OR
				ip.end_date LIKE '%6303519172 00 00%' OR
				ip.company_name LIKE '%6303519172 00 00%' OR
				iac.name LIKE '%6303519172 00 00%' OR
				ip.name LIKE '%6303519172 00 00%' OR
				ip.od LIKE '%6303519172 00 00%' OR
				ip.tp LIKE '%6303519172 00 00%' OR
				ip.net LIKE '%6303519172 00 00%' OR
				ip.premium LIKE '%6303519172 00 00%' OR
				ip.reward LIKE '%6303519172 00 00%' OR
				ia.name LIKE '%6303519172 00 00%' OR
				ia.mobile_no LIKE '%6303519172 00 00%' OR
				ip.company_grid LIKE '%6303519172 00 00%' OR
				ip.company_grid2 LIKE '%6303519172 00 00%' OR
				ip.tds LIKE '%6303519172 00 00%' OR
				ist.name LIKE '%6303519172 00 00%' OR
				ip.verified_status LIKE '%6303519172 00 00%' OR
				ip.status LIKE '%6303519172 00 00%' OR
				cu1.name LIKE '%6303519172 00 00%' OR
				cu2.name LIKE '%6303519172 00 00%' OR
				ip.updated_at LIKE '%6303519172 00 00%'
			)
ERROR - 2025-11-14 17:08:12 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%6303519172 00 00%' OR
				ip.created_at LIKE '%6303519172 00 00%' OR
				ip.policy_no LIKE '%6303519172 00 00%' OR
				ip.vehicle_no LIKE '%6303519172 00 00%' OR
				ip.customer_name LIKE '%6303519172 00 00%' OR
				ip.make LIKE '%6303519172 00 00%' OR
				ip.model LIKE '%6303519172 00 00%' OR
				ip.vehicle_type LIKE '%6303519172 00 00%' OR
				irc.name LIKE '%6303519172 00 00%' OR
				ip.mfg_year LIKE '%6303519172 00 00%' OR
				ip.age LIKE '%6303519172 00 00%' OR
				ip.gvw LIKE '%6303519172 00 00%' OR
				ip.ncb LIKE '%6303519172 00 00%' OR
				ip.policy_type LIKE '%6303519172 00 00%' OR
				ip.start_date LIKE '%6303519172 00 00%' OR
				ip.end_date LIKE '%6303519172 00 00%' OR
				ip.company_name LIKE '%6303519172 00 00%' OR
				iac.name LIKE '%6303519172 00 00%' OR
				ip.name LIKE '%6303519172 00 00%' OR
				ip.od LIKE '%6303519172 00 00%' OR
				ip.tp LIKE '%6303519172 00 00%' OR
				ip.net LIKE '%6303519172 00 00%' OR
				ip.premium LIKE '%6303519172 00 00%' OR
				ip.reward LIKE '%6303519172 00 00%' OR
				ia.name LIKE '%6303519172 00 00%' OR
				ia.mobile_no LIKE '%6303519172 00 00%' OR
				ip.company_grid LIKE '%6303519172 00 00%' OR
				ip.company_grid2 LIKE '%6303519172 00 00%' OR
				ip.tds LIKE '%6303519172 00 00%' OR
				ist.name LIKE '%6303519172 00 00%' OR
				ip.verified_status LIKE '%6303519172 00 00%' OR
				ip.status LIKE '%6303519172 00 00%' OR
				cu1.name LIKE '%6303519172 00 00%' OR
				cu2.name LIKE '%6303519172 00 00%' OR
				ip.updated_at LIKE '%6303519172 00 00%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:08:13 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%00 00%' OR
				ip.created_at LIKE '%00 00%' OR
				ip.policy_no LIKE '%00 00%' OR
				ip.vehicle_no LIKE '%00 00%' OR
				ip.customer_name LIKE '%00 00%' OR
				ip.make LIKE '%00 00%' OR
				ip.model LIKE '%00 00%' OR
				ip.vehicle_type LIKE '%00 00%' OR
				irc.name LIKE '%00 00%' OR
				ip.mfg_year LIKE '%00 00%' OR
				ip.age LIKE '%00 00%' OR
				ip.gvw LIKE '%00 00%' OR
				ip.ncb LIKE '%00 00%' OR
				ip.policy_type LIKE '%00 00%' OR
				ip.start_date LIKE '%00 00%' OR
				ip.end_date LIKE '%00 00%' OR
				ip.company_name LIKE '%00 00%' OR
				iac.name LIKE '%00 00%' OR
				ip.name LIKE '%00 00%' OR
				ip.od LIKE '%00 00%' OR
				ip.tp LIKE '%00 00%' OR
				ip.net LIKE '%00 00%' OR
				ip.premium LIKE '%00 00%' OR
				ip.reward LIKE '%00 00%' OR
				ia.name LIKE '%00 00%' OR
				ia.mobile_no LIKE '%00 00%' OR
				ip.company_grid LIKE '%00 00%' OR
				ip.company_grid2 LIKE '%00 00%' OR
				ip.tds LIKE '%00 00%' OR
				ist.name LIKE '%00 00%' OR
				ip.verified_status LIKE '%00 00%' OR
				ip.status LIKE '%00 00%' OR
				cu1.name LIKE '%00 00%' OR
				cu2.name LIKE '%00 00%' OR
				ip.updated_at LIKE '%00 00%'
			)
ERROR - 2025-11-14 17:08:13 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%00 00%' OR
				ip.created_at LIKE '%00 00%' OR
				ip.policy_no LIKE '%00 00%' OR
				ip.vehicle_no LIKE '%00 00%' OR
				ip.customer_name LIKE '%00 00%' OR
				ip.make LIKE '%00 00%' OR
				ip.model LIKE '%00 00%' OR
				ip.vehicle_type LIKE '%00 00%' OR
				irc.name LIKE '%00 00%' OR
				ip.mfg_year LIKE '%00 00%' OR
				ip.age LIKE '%00 00%' OR
				ip.gvw LIKE '%00 00%' OR
				ip.ncb LIKE '%00 00%' OR
				ip.policy_type LIKE '%00 00%' OR
				ip.start_date LIKE '%00 00%' OR
				ip.end_date LIKE '%00 00%' OR
				ip.company_name LIKE '%00 00%' OR
				iac.name LIKE '%00 00%' OR
				ip.name LIKE '%00 00%' OR
				ip.od LIKE '%00 00%' OR
				ip.tp LIKE '%00 00%' OR
				ip.net LIKE '%00 00%' OR
				ip.premium LIKE '%00 00%' OR
				ip.reward LIKE '%00 00%' OR
				ia.name LIKE '%00 00%' OR
				ia.mobile_no LIKE '%00 00%' OR
				ip.company_grid LIKE '%00 00%' OR
				ip.company_grid2 LIKE '%00 00%' OR
				ip.tds LIKE '%00 00%' OR
				ist.name LIKE '%00 00%' OR
				ip.verified_status LIKE '%00 00%' OR
				ip.status LIKE '%00 00%' OR
				cu1.name LIKE '%00 00%' OR
				cu2.name LIKE '%00 00%' OR
				ip.updated_at LIKE '%00 00%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:08:57 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%d%' OR
				ip.created_at LIKE '%d%' OR
				ip.policy_no LIKE '%d%' OR
				ip.vehicle_no LIKE '%d%' OR
				ip.customer_name LIKE '%d%' OR
				ip.make LIKE '%d%' OR
				ip.model LIKE '%d%' OR
				ip.vehicle_type LIKE '%d%' OR
				irc.name LIKE '%d%' OR
				ip.mfg_year LIKE '%d%' OR
				ip.age LIKE '%d%' OR
				ip.gvw LIKE '%d%' OR
				ip.ncb LIKE '%d%' OR
				ip.policy_type LIKE '%d%' OR
				ip.start_date LIKE '%d%' OR
				ip.end_date LIKE '%d%' OR
				ip.company_name LIKE '%d%' OR
				iac.name LIKE '%d%' OR
				ip.name LIKE '%d%' OR
				ip.od LIKE '%d%' OR
				ip.tp LIKE '%d%' OR
				ip.net LIKE '%d%' OR
				ip.premium LIKE '%d%' OR
				ip.reward LIKE '%d%' OR
				ia.name LIKE '%d%' OR
				ia.mobile_no LIKE '%d%' OR
				ip.company_grid LIKE '%d%' OR
				ip.company_grid2 LIKE '%d%' OR
				ip.tds LIKE '%d%' OR
				ist.name LIKE '%d%' OR
				ip.verified_status LIKE '%d%' OR
				ip.status LIKE '%d%' OR
				cu1.name LIKE '%d%' OR
				cu2.name LIKE '%d%' OR
				ip.updated_at LIKE '%d%'
			)
ERROR - 2025-11-14 17:08:57 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%d%' OR
				ip.created_at LIKE '%d%' OR
				ip.policy_no LIKE '%d%' OR
				ip.vehicle_no LIKE '%d%' OR
				ip.customer_name LIKE '%d%' OR
				ip.make LIKE '%d%' OR
				ip.model LIKE '%d%' OR
				ip.vehicle_type LIKE '%d%' OR
				irc.name LIKE '%d%' OR
				ip.mfg_year LIKE '%d%' OR
				ip.age LIKE '%d%' OR
				ip.gvw LIKE '%d%' OR
				ip.ncb LIKE '%d%' OR
				ip.policy_type LIKE '%d%' OR
				ip.start_date LIKE '%d%' OR
				ip.end_date LIKE '%d%' OR
				ip.company_name LIKE '%d%' OR
				iac.name LIKE '%d%' OR
				ip.name LIKE '%d%' OR
				ip.od LIKE '%d%' OR
				ip.tp LIKE '%d%' OR
				ip.net LIKE '%d%' OR
				ip.premium LIKE '%d%' OR
				ip.reward LIKE '%d%' OR
				ia.name LIKE '%d%' OR
				ia.mobile_no LIKE '%d%' OR
				ip.company_grid LIKE '%d%' OR
				ip.company_grid2 LIKE '%d%' OR
				ip.tds LIKE '%d%' OR
				ist.name LIKE '%d%' OR
				ip.verified_status LIKE '%d%' OR
				ip.status LIKE '%d%' OR
				cu1.name LIKE '%d%' OR
				cu2.name LIKE '%d%' OR
				ip.updated_at LIKE '%d%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:08:58 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%done%' OR
				ip.created_at LIKE '%done%' OR
				ip.policy_no LIKE '%done%' OR
				ip.vehicle_no LIKE '%done%' OR
				ip.customer_name LIKE '%done%' OR
				ip.make LIKE '%done%' OR
				ip.model LIKE '%done%' OR
				ip.vehicle_type LIKE '%done%' OR
				irc.name LIKE '%done%' OR
				ip.mfg_year LIKE '%done%' OR
				ip.age LIKE '%done%' OR
				ip.gvw LIKE '%done%' OR
				ip.ncb LIKE '%done%' OR
				ip.policy_type LIKE '%done%' OR
				ip.start_date LIKE '%done%' OR
				ip.end_date LIKE '%done%' OR
				ip.company_name LIKE '%done%' OR
				iac.name LIKE '%done%' OR
				ip.name LIKE '%done%' OR
				ip.od LIKE '%done%' OR
				ip.tp LIKE '%done%' OR
				ip.net LIKE '%done%' OR
				ip.premium LIKE '%done%' OR
				ip.reward LIKE '%done%' OR
				ia.name LIKE '%done%' OR
				ia.mobile_no LIKE '%done%' OR
				ip.company_grid LIKE '%done%' OR
				ip.company_grid2 LIKE '%done%' OR
				ip.tds LIKE '%done%' OR
				ist.name LIKE '%done%' OR
				ip.verified_status LIKE '%done%' OR
				ip.status LIKE '%done%' OR
				cu1.name LIKE '%done%' OR
				cu2.name LIKE '%done%' OR
				ip.updated_at LIKE '%done%'
			)
ERROR - 2025-11-14 17:08:58 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%done%' OR
				ip.created_at LIKE '%done%' OR
				ip.policy_no LIKE '%done%' OR
				ip.vehicle_no LIKE '%done%' OR
				ip.customer_name LIKE '%done%' OR
				ip.make LIKE '%done%' OR
				ip.model LIKE '%done%' OR
				ip.vehicle_type LIKE '%done%' OR
				irc.name LIKE '%done%' OR
				ip.mfg_year LIKE '%done%' OR
				ip.age LIKE '%done%' OR
				ip.gvw LIKE '%done%' OR
				ip.ncb LIKE '%done%' OR
				ip.policy_type LIKE '%done%' OR
				ip.start_date LIKE '%done%' OR
				ip.end_date LIKE '%done%' OR
				ip.company_name LIKE '%done%' OR
				iac.name LIKE '%done%' OR
				ip.name LIKE '%done%' OR
				ip.od LIKE '%done%' OR
				ip.tp LIKE '%done%' OR
				ip.net LIKE '%done%' OR
				ip.premium LIKE '%done%' OR
				ip.reward LIKE '%done%' OR
				ia.name LIKE '%done%' OR
				ia.mobile_no LIKE '%done%' OR
				ip.company_grid LIKE '%done%' OR
				ip.company_grid2 LIKE '%done%' OR
				ip.tds LIKE '%done%' OR
				ist.name LIKE '%done%' OR
				ip.verified_status LIKE '%done%' OR
				ip.status LIKE '%done%' OR
				cu1.name LIKE '%done%' OR
				cu2.name LIKE '%done%' OR
				ip.updated_at LIKE '%done%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:08:59 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%m%' OR
				ip.created_at LIKE '%m%' OR
				ip.policy_no LIKE '%m%' OR
				ip.vehicle_no LIKE '%m%' OR
				ip.customer_name LIKE '%m%' OR
				ip.make LIKE '%m%' OR
				ip.model LIKE '%m%' OR
				ip.vehicle_type LIKE '%m%' OR
				irc.name LIKE '%m%' OR
				ip.mfg_year LIKE '%m%' OR
				ip.age LIKE '%m%' OR
				ip.gvw LIKE '%m%' OR
				ip.ncb LIKE '%m%' OR
				ip.policy_type LIKE '%m%' OR
				ip.start_date LIKE '%m%' OR
				ip.end_date LIKE '%m%' OR
				ip.company_name LIKE '%m%' OR
				iac.name LIKE '%m%' OR
				ip.name LIKE '%m%' OR
				ip.od LIKE '%m%' OR
				ip.tp LIKE '%m%' OR
				ip.net LIKE '%m%' OR
				ip.premium LIKE '%m%' OR
				ip.reward LIKE '%m%' OR
				ia.name LIKE '%m%' OR
				ia.mobile_no LIKE '%m%' OR
				ip.company_grid LIKE '%m%' OR
				ip.company_grid2 LIKE '%m%' OR
				ip.tds LIKE '%m%' OR
				ist.name LIKE '%m%' OR
				ip.verified_status LIKE '%m%' OR
				ip.status LIKE '%m%' OR
				cu1.name LIKE '%m%' OR
				cu2.name LIKE '%m%' OR
				ip.updated_at LIKE '%m%'
			)
ERROR - 2025-11-14 17:08:59 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%m%' OR
				ip.created_at LIKE '%m%' OR
				ip.policy_no LIKE '%m%' OR
				ip.vehicle_no LIKE '%m%' OR
				ip.customer_name LIKE '%m%' OR
				ip.make LIKE '%m%' OR
				ip.model LIKE '%m%' OR
				ip.vehicle_type LIKE '%m%' OR
				irc.name LIKE '%m%' OR
				ip.mfg_year LIKE '%m%' OR
				ip.age LIKE '%m%' OR
				ip.gvw LIKE '%m%' OR
				ip.ncb LIKE '%m%' OR
				ip.policy_type LIKE '%m%' OR
				ip.start_date LIKE '%m%' OR
				ip.end_date LIKE '%m%' OR
				ip.company_name LIKE '%m%' OR
				iac.name LIKE '%m%' OR
				ip.name LIKE '%m%' OR
				ip.od LIKE '%m%' OR
				ip.tp LIKE '%m%' OR
				ip.net LIKE '%m%' OR
				ip.premium LIKE '%m%' OR
				ip.reward LIKE '%m%' OR
				ia.name LIKE '%m%' OR
				ia.mobile_no LIKE '%m%' OR
				ip.company_grid LIKE '%m%' OR
				ip.company_grid2 LIKE '%m%' OR
				ip.tds LIKE '%m%' OR
				ist.name LIKE '%m%' OR
				ip.verified_status LIKE '%m%' OR
				ip.status LIKE '%m%' OR
				cu1.name LIKE '%m%' OR
				cu2.name LIKE '%m%' OR
				ip.updated_at LIKE '%m%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:09:00 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%mis%' OR
				ip.created_at LIKE '%mis%' OR
				ip.policy_no LIKE '%mis%' OR
				ip.vehicle_no LIKE '%mis%' OR
				ip.customer_name LIKE '%mis%' OR
				ip.make LIKE '%mis%' OR
				ip.model LIKE '%mis%' OR
				ip.vehicle_type LIKE '%mis%' OR
				irc.name LIKE '%mis%' OR
				ip.mfg_year LIKE '%mis%' OR
				ip.age LIKE '%mis%' OR
				ip.gvw LIKE '%mis%' OR
				ip.ncb LIKE '%mis%' OR
				ip.policy_type LIKE '%mis%' OR
				ip.start_date LIKE '%mis%' OR
				ip.end_date LIKE '%mis%' OR
				ip.company_name LIKE '%mis%' OR
				iac.name LIKE '%mis%' OR
				ip.name LIKE '%mis%' OR
				ip.od LIKE '%mis%' OR
				ip.tp LIKE '%mis%' OR
				ip.net LIKE '%mis%' OR
				ip.premium LIKE '%mis%' OR
				ip.reward LIKE '%mis%' OR
				ia.name LIKE '%mis%' OR
				ia.mobile_no LIKE '%mis%' OR
				ip.company_grid LIKE '%mis%' OR
				ip.company_grid2 LIKE '%mis%' OR
				ip.tds LIKE '%mis%' OR
				ist.name LIKE '%mis%' OR
				ip.verified_status LIKE '%mis%' OR
				ip.status LIKE '%mis%' OR
				cu1.name LIKE '%mis%' OR
				cu2.name LIKE '%mis%' OR
				ip.updated_at LIKE '%mis%'
			)
ERROR - 2025-11-14 17:09:00 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%mis%' OR
				ip.created_at LIKE '%mis%' OR
				ip.policy_no LIKE '%mis%' OR
				ip.vehicle_no LIKE '%mis%' OR
				ip.customer_name LIKE '%mis%' OR
				ip.make LIKE '%mis%' OR
				ip.model LIKE '%mis%' OR
				ip.vehicle_type LIKE '%mis%' OR
				irc.name LIKE '%mis%' OR
				ip.mfg_year LIKE '%mis%' OR
				ip.age LIKE '%mis%' OR
				ip.gvw LIKE '%mis%' OR
				ip.ncb LIKE '%mis%' OR
				ip.policy_type LIKE '%mis%' OR
				ip.start_date LIKE '%mis%' OR
				ip.end_date LIKE '%mis%' OR
				ip.company_name LIKE '%mis%' OR
				iac.name LIKE '%mis%' OR
				ip.name LIKE '%mis%' OR
				ip.od LIKE '%mis%' OR
				ip.tp LIKE '%mis%' OR
				ip.net LIKE '%mis%' OR
				ip.premium LIKE '%mis%' OR
				ip.reward LIKE '%mis%' OR
				ia.name LIKE '%mis%' OR
				ia.mobile_no LIKE '%mis%' OR
				ip.company_grid LIKE '%mis%' OR
				ip.company_grid2 LIKE '%mis%' OR
				ip.tds LIKE '%mis%' OR
				ist.name LIKE '%mis%' OR
				ip.verified_status LIKE '%mis%' OR
				ip.status LIKE '%mis%' OR
				cu1.name LIKE '%mis%' OR
				cu2.name LIKE '%mis%' OR
				ip.updated_at LIKE '%mis%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:09:01 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%missing%' OR
				ip.created_at LIKE '%missing%' OR
				ip.policy_no LIKE '%missing%' OR
				ip.vehicle_no LIKE '%missing%' OR
				ip.customer_name LIKE '%missing%' OR
				ip.make LIKE '%missing%' OR
				ip.model LIKE '%missing%' OR
				ip.vehicle_type LIKE '%missing%' OR
				irc.name LIKE '%missing%' OR
				ip.mfg_year LIKE '%missing%' OR
				ip.age LIKE '%missing%' OR
				ip.gvw LIKE '%missing%' OR
				ip.ncb LIKE '%missing%' OR
				ip.policy_type LIKE '%missing%' OR
				ip.start_date LIKE '%missing%' OR
				ip.end_date LIKE '%missing%' OR
				ip.company_name LIKE '%missing%' OR
				iac.name LIKE '%missing%' OR
				ip.name LIKE '%missing%' OR
				ip.od LIKE '%missing%' OR
				ip.tp LIKE '%missing%' OR
				ip.net LIKE '%missing%' OR
				ip.premium LIKE '%missing%' OR
				ip.reward LIKE '%missing%' OR
				ia.name LIKE '%missing%' OR
				ia.mobile_no LIKE '%missing%' OR
				ip.company_grid LIKE '%missing%' OR
				ip.company_grid2 LIKE '%missing%' OR
				ip.tds LIKE '%missing%' OR
				ist.name LIKE '%missing%' OR
				ip.verified_status LIKE '%missing%' OR
				ip.status LIKE '%missing%' OR
				cu1.name LIKE '%missing%' OR
				cu2.name LIKE '%missing%' OR
				ip.updated_at LIKE '%missing%'
			)
ERROR - 2025-11-14 17:09:01 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%missing%' OR
				ip.created_at LIKE '%missing%' OR
				ip.policy_no LIKE '%missing%' OR
				ip.vehicle_no LIKE '%missing%' OR
				ip.customer_name LIKE '%missing%' OR
				ip.make LIKE '%missing%' OR
				ip.model LIKE '%missing%' OR
				ip.vehicle_type LIKE '%missing%' OR
				irc.name LIKE '%missing%' OR
				ip.mfg_year LIKE '%missing%' OR
				ip.age LIKE '%missing%' OR
				ip.gvw LIKE '%missing%' OR
				ip.ncb LIKE '%missing%' OR
				ip.policy_type LIKE '%missing%' OR
				ip.start_date LIKE '%missing%' OR
				ip.end_date LIKE '%missing%' OR
				ip.company_name LIKE '%missing%' OR
				iac.name LIKE '%missing%' OR
				ip.name LIKE '%missing%' OR
				ip.od LIKE '%missing%' OR
				ip.tp LIKE '%missing%' OR
				ip.net LIKE '%missing%' OR
				ip.premium LIKE '%missing%' OR
				ip.reward LIKE '%missing%' OR
				ia.name LIKE '%missing%' OR
				ia.mobile_no LIKE '%missing%' OR
				ip.company_grid LIKE '%missing%' OR
				ip.company_grid2 LIKE '%missing%' OR
				ip.tds LIKE '%missing%' OR
				ist.name LIKE '%missing%' OR
				ip.verified_status LIKE '%missing%' OR
				ip.status LIKE '%missing%' OR
				cu1.name LIKE '%missing%' OR
				cu2.name LIKE '%missing%' OR
				ip.updated_at LIKE '%missing%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:10:47 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				CAST(ip.id AS CHAR) LIKE '%h%' OR
				DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p') LIKE '%h%' OR
				DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p') LIKE '%h%' OR
				DATE_FORMAT(ip.created_at, '%Y-%m-%d') LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				COALESCE(irc.name, '') LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				CAST(ip.age AS CHAR) LIKE '%h%' OR
				CAST(ip.gvw AS CHAR) LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				DATE_FORMAT(ip.start_date, '%d-%m-%Y') LIKE '%h%' OR
				DATE_FORMAT(ip.start_date, '%Y-%m-%d') LIKE '%h%' OR
				DATE_FORMAT(ip.end_date, '%d-%m-%Y') LIKE '%h%' OR
				DATE_FORMAT(ip.end_date, '%Y-%m-%d') LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				COALESCE(iac.name, '') LIKE '%h%' OR
				COALESCE(ip.name, '') LIKE '%h%' OR
				CAST(ip.od AS CHAR) LIKE '%h%' OR
				CAST(ip.tp AS CHAR) LIKE '%h%' OR
				CAST(ip.net AS CHAR) LIKE '%h%' OR
				CAST(ip.premium AS CHAR) LIKE '%h%' OR
				CAST(ip.reward AS CHAR) LIKE '%h%' OR
				COALESCE(ia.name, '') LIKE '%h%' OR
				COALESCE(ia.mobile_no, '') LIKE '%h%' OR
				CAST(COALESCE(ip.company_grid, '') AS CHAR) LIKE '%h%' OR
				CAST(COALESCE(ip.company_grid2, '') AS CHAR) LIKE '%h%' OR
				CAST(COALESCE(ip.tds, '') AS CHAR) LIKE '%h%' OR
				COALESCE(ist.name, '') LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				COALESCE(cu1.name, '') LIKE '%h%' OR
				COALESCE(cu2.name, '') LIKE '%h%' OR
				DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p') LIKE '%h%' OR
				DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p') LIKE '%h%' OR
				DATE_FORMAT(ip.updated_at, '%Y-%m-%d') LIKE '%h%'
			)
ERROR - 2025-11-14 17:10:47 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				CAST(ip.id AS CHAR) LIKE '%h%' OR
				DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p') LIKE '%h%' OR
				DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p') LIKE '%h%' OR
				DATE_FORMAT(ip.created_at, '%Y-%m-%d') LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				COALESCE(irc.name, '') LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				CAST(ip.age AS CHAR) LIKE '%h%' OR
				CAST(ip.gvw AS CHAR) LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				DATE_FORMAT(ip.start_date, '%d-%m-%Y') LIKE '%h%' OR
				DATE_FORMAT(ip.start_date, '%Y-%m-%d') LIKE '%h%' OR
				DATE_FORMAT(ip.end_date, '%d-%m-%Y') LIKE '%h%' OR
				DATE_FORMAT(ip.end_date, '%Y-%m-%d') LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				COALESCE(iac.name, '') LIKE '%h%' OR
				COALESCE(ip.name, '') LIKE '%h%' OR
				CAST(ip.od AS CHAR) LIKE '%h%' OR
				CAST(ip.tp AS CHAR) LIKE '%h%' OR
				CAST(ip.net AS CHAR) LIKE '%h%' OR
				CAST(ip.premium AS CHAR) LIKE '%h%' OR
				CAST(ip.reward AS CHAR) LIKE '%h%' OR
				COALESCE(ia.name, '') LIKE '%h%' OR
				COALESCE(ia.mobile_no, '') LIKE '%h%' OR
				CAST(COALESCE(ip.company_grid, '') AS CHAR) LIKE '%h%' OR
				CAST(COALESCE(ip.company_grid2, '') AS CHAR) LIKE '%h%' OR
				CAST(COALESCE(ip.tds, '') AS CHAR) LIKE '%h%' OR
				COALESCE(ist.name, '') LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				COALESCE(cu1.name, '') LIKE '%h%' OR
				COALESCE(cu2.name, '') LIKE '%h%' OR
				DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p') LIKE '%h%' OR
				DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p') LIKE '%h%' OR
				DATE_FORMAT(ip.updated_at, '%Y-%m-%d') LIKE '%h%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:10:48 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				CAST(ip.id AS CHAR) LIKE '%hon%' OR
				DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p') LIKE '%hon%' OR
				DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p') LIKE '%hon%' OR
				DATE_FORMAT(ip.created_at, '%Y-%m-%d') LIKE '%hon%' OR
				ip.policy_no LIKE '%hon%' OR
				ip.vehicle_no LIKE '%hon%' OR
				ip.customer_name LIKE '%hon%' OR
				ip.make LIKE '%hon%' OR
				ip.model LIKE '%hon%' OR
				ip.vehicle_type LIKE '%hon%' OR
				COALESCE(irc.name, '') LIKE '%hon%' OR
				ip.mfg_year LIKE '%hon%' OR
				CAST(ip.age AS CHAR) LIKE '%hon%' OR
				CAST(ip.gvw AS CHAR) LIKE '%hon%' OR
				ip.ncb LIKE '%hon%' OR
				ip.policy_type LIKE '%hon%' OR
				DATE_FORMAT(ip.start_date, '%d-%m-%Y') LIKE '%hon%' OR
				DATE_FORMAT(ip.start_date, '%Y-%m-%d') LIKE '%hon%' OR
				DATE_FORMAT(ip.end_date, '%d-%m-%Y') LIKE '%hon%' OR
				DATE_FORMAT(ip.end_date, '%Y-%m-%d') LIKE '%hon%' OR
				ip.company_name LIKE '%hon%' OR
				COALESCE(iac.name, '') LIKE '%hon%' OR
				COALESCE(ip.name, '') LIKE '%hon%' OR
				CAST(ip.od AS CHAR) LIKE '%hon%' OR
				CAST(ip.tp AS CHAR) LIKE '%hon%' OR
				CAST(ip.net AS CHAR) LIKE '%hon%' OR
				CAST(ip.premium AS CHAR) LIKE '%hon%' OR
				CAST(ip.reward AS CHAR) LIKE '%hon%' OR
				COALESCE(ia.name, '') LIKE '%hon%' OR
				COALESCE(ia.mobile_no, '') LIKE '%hon%' OR
				CAST(COALESCE(ip.company_grid, '') AS CHAR) LIKE '%hon%' OR
				CAST(COALESCE(ip.company_grid2, '') AS CHAR) LIKE '%hon%' OR
				CAST(COALESCE(ip.tds, '') AS CHAR) LIKE '%hon%' OR
				COALESCE(ist.name, '') LIKE '%hon%' OR
				ip.verified_status LIKE '%hon%' OR
				ip.status LIKE '%hon%' OR
				COALESCE(cu1.name, '') LIKE '%hon%' OR
				COALESCE(cu2.name, '') LIKE '%hon%' OR
				DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p') LIKE '%hon%' OR
				DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p') LIKE '%hon%' OR
				DATE_FORMAT(ip.updated_at, '%Y-%m-%d') LIKE '%hon%'
			)
ERROR - 2025-11-14 17:10:48 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				CAST(ip.id AS CHAR) LIKE '%hon%' OR
				DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p') LIKE '%hon%' OR
				DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p') LIKE '%hon%' OR
				DATE_FORMAT(ip.created_at, '%Y-%m-%d') LIKE '%hon%' OR
				ip.policy_no LIKE '%hon%' OR
				ip.vehicle_no LIKE '%hon%' OR
				ip.customer_name LIKE '%hon%' OR
				ip.make LIKE '%hon%' OR
				ip.model LIKE '%hon%' OR
				ip.vehicle_type LIKE '%hon%' OR
				COALESCE(irc.name, '') LIKE '%hon%' OR
				ip.mfg_year LIKE '%hon%' OR
				CAST(ip.age AS CHAR) LIKE '%hon%' OR
				CAST(ip.gvw AS CHAR) LIKE '%hon%' OR
				ip.ncb LIKE '%hon%' OR
				ip.policy_type LIKE '%hon%' OR
				DATE_FORMAT(ip.start_date, '%d-%m-%Y') LIKE '%hon%' OR
				DATE_FORMAT(ip.start_date, '%Y-%m-%d') LIKE '%hon%' OR
				DATE_FORMAT(ip.end_date, '%d-%m-%Y') LIKE '%hon%' OR
				DATE_FORMAT(ip.end_date, '%Y-%m-%d') LIKE '%hon%' OR
				ip.company_name LIKE '%hon%' OR
				COALESCE(iac.name, '') LIKE '%hon%' OR
				COALESCE(ip.name, '') LIKE '%hon%' OR
				CAST(ip.od AS CHAR) LIKE '%hon%' OR
				CAST(ip.tp AS CHAR) LIKE '%hon%' OR
				CAST(ip.net AS CHAR) LIKE '%hon%' OR
				CAST(ip.premium AS CHAR) LIKE '%hon%' OR
				CAST(ip.reward AS CHAR) LIKE '%hon%' OR
				COALESCE(ia.name, '') LIKE '%hon%' OR
				COALESCE(ia.mobile_no, '') LIKE '%hon%' OR
				CAST(COALESCE(ip.company_grid, '') AS CHAR) LIKE '%hon%' OR
				CAST(COALESCE(ip.company_grid2, '') AS CHAR) LIKE '%hon%' OR
				CAST(COALESCE(ip.tds, '') AS CHAR) LIKE '%hon%' OR
				COALESCE(ist.name, '') LIKE '%hon%' OR
				ip.verified_status LIKE '%hon%' OR
				ip.status LIKE '%hon%' OR
				COALESCE(cu1.name, '') LIKE '%hon%' OR
				COALESCE(cu2.name, '') LIKE '%hon%' OR
				DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p') LIKE '%hon%' OR
				DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p') LIKE '%hon%' OR
				DATE_FORMAT(ip.updated_at, '%Y-%m-%d') LIKE '%hon%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:10:49 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				CAST(ip.id AS CHAR) LIKE '%honda%' OR
				DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p') LIKE '%honda%' OR
				DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p') LIKE '%honda%' OR
				DATE_FORMAT(ip.created_at, '%Y-%m-%d') LIKE '%honda%' OR
				ip.policy_no LIKE '%honda%' OR
				ip.vehicle_no LIKE '%honda%' OR
				ip.customer_name LIKE '%honda%' OR
				ip.make LIKE '%honda%' OR
				ip.model LIKE '%honda%' OR
				ip.vehicle_type LIKE '%honda%' OR
				COALESCE(irc.name, '') LIKE '%honda%' OR
				ip.mfg_year LIKE '%honda%' OR
				CAST(ip.age AS CHAR) LIKE '%honda%' OR
				CAST(ip.gvw AS CHAR) LIKE '%honda%' OR
				ip.ncb LIKE '%honda%' OR
				ip.policy_type LIKE '%honda%' OR
				DATE_FORMAT(ip.start_date, '%d-%m-%Y') LIKE '%honda%' OR
				DATE_FORMAT(ip.start_date, '%Y-%m-%d') LIKE '%honda%' OR
				DATE_FORMAT(ip.end_date, '%d-%m-%Y') LIKE '%honda%' OR
				DATE_FORMAT(ip.end_date, '%Y-%m-%d') LIKE '%honda%' OR
				ip.company_name LIKE '%honda%' OR
				COALESCE(iac.name, '') LIKE '%honda%' OR
				COALESCE(ip.name, '') LIKE '%honda%' OR
				CAST(ip.od AS CHAR) LIKE '%honda%' OR
				CAST(ip.tp AS CHAR) LIKE '%honda%' OR
				CAST(ip.net AS CHAR) LIKE '%honda%' OR
				CAST(ip.premium AS CHAR) LIKE '%honda%' OR
				CAST(ip.reward AS CHAR) LIKE '%honda%' OR
				COALESCE(ia.name, '') LIKE '%honda%' OR
				COALESCE(ia.mobile_no, '') LIKE '%honda%' OR
				CAST(COALESCE(ip.company_grid, '') AS CHAR) LIKE '%honda%' OR
				CAST(COALESCE(ip.company_grid2, '') AS CHAR) LIKE '%honda%' OR
				CAST(COALESCE(ip.tds, '') AS CHAR) LIKE '%honda%' OR
				COALESCE(ist.name, '') LIKE '%honda%' OR
				ip.verified_status LIKE '%honda%' OR
				ip.status LIKE '%honda%' OR
				COALESCE(cu1.name, '') LIKE '%honda%' OR
				COALESCE(cu2.name, '') LIKE '%honda%' OR
				DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p') LIKE '%honda%' OR
				DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p') LIKE '%honda%' OR
				DATE_FORMAT(ip.updated_at, '%Y-%m-%d') LIKE '%honda%'
			)
ERROR - 2025-11-14 17:10:49 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT ip.*,
			irc.name AS rto_company_name,
			iac.name AS agent_code_name,
			cu1.name AS created_by_name,
			cu2.name AS updated_by_name,
			ist.name AS staff_name,
			ia.name AS agent_name,
			ia.mobile_no AS agent_mobile_no,
			il.name AS login_name
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				CAST(ip.id AS CHAR) LIKE '%honda%' OR
				DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p') LIKE '%honda%' OR
				DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p') LIKE '%honda%' OR
				DATE_FORMAT(ip.created_at, '%Y-%m-%d') LIKE '%honda%' OR
				ip.policy_no LIKE '%honda%' OR
				ip.vehicle_no LIKE '%honda%' OR
				ip.customer_name LIKE '%honda%' OR
				ip.make LIKE '%honda%' OR
				ip.model LIKE '%honda%' OR
				ip.vehicle_type LIKE '%honda%' OR
				COALESCE(irc.name, '') LIKE '%honda%' OR
				ip.mfg_year LIKE '%honda%' OR
				CAST(ip.age AS CHAR) LIKE '%honda%' OR
				CAST(ip.gvw AS CHAR) LIKE '%honda%' OR
				ip.ncb LIKE '%honda%' OR
				ip.policy_type LIKE '%honda%' OR
				DATE_FORMAT(ip.start_date, '%d-%m-%Y') LIKE '%honda%' OR
				DATE_FORMAT(ip.start_date, '%Y-%m-%d') LIKE '%honda%' OR
				DATE_FORMAT(ip.end_date, '%d-%m-%Y') LIKE '%honda%' OR
				DATE_FORMAT(ip.end_date, '%Y-%m-%d') LIKE '%honda%' OR
				ip.company_name LIKE '%honda%' OR
				COALESCE(iac.name, '') LIKE '%honda%' OR
				COALESCE(ip.name, '') LIKE '%honda%' OR
				CAST(ip.od AS CHAR) LIKE '%honda%' OR
				CAST(ip.tp AS CHAR) LIKE '%honda%' OR
				CAST(ip.net AS CHAR) LIKE '%honda%' OR
				CAST(ip.premium AS CHAR) LIKE '%honda%' OR
				CAST(ip.reward AS CHAR) LIKE '%honda%' OR
				COALESCE(ia.name, '') LIKE '%honda%' OR
				COALESCE(ia.mobile_no, '') LIKE '%honda%' OR
				CAST(COALESCE(ip.company_grid, '') AS CHAR) LIKE '%honda%' OR
				CAST(COALESCE(ip.company_grid2, '') AS CHAR) LIKE '%honda%' OR
				CAST(COALESCE(ip.tds, '') AS CHAR) LIKE '%honda%' OR
				COALESCE(ist.name, '') LIKE '%honda%' OR
				ip.verified_status LIKE '%honda%' OR
				ip.status LIKE '%honda%' OR
				COALESCE(cu1.name, '') LIKE '%honda%' OR
				COALESCE(cu2.name, '') LIKE '%honda%' OR
				DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p') LIKE '%honda%' OR
				DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p') LIKE '%honda%' OR
				DATE_FORMAT(ip.updated_at, '%Y-%m-%d') LIKE '%honda%'
			)
			ORDER BY ip.id DESC
			LIMIT 0, 10
ERROR - 2025-11-14 17:17:51 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt 
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%a%')
ERROR - 2025-11-14 17:17:51 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: 
			SELECT 
				ip.*,
				irc.name AS rto_company_name,
				iac.name AS agent_code_name,
				cu1.name AS created_by_name,
				cu2.name AS updated_by_name,
				ist.name AS staff_name,
				ia.name AS agent_name,
				ia.mobile_no AS agent_mobile_no,
				il.name AS login_name
			
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%a%')
			ORDER BY ip.id DESC
			LIMIT 0, 10
		
ERROR - 2025-11-14 17:17:52 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt 
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%adf%')
ERROR - 2025-11-14 17:17:52 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: 
			SELECT 
				ip.*,
				irc.name AS rto_company_name,
				iac.name AS agent_code_name,
				cu1.name AS created_by_name,
				cu2.name AS updated_by_name,
				ist.name AS staff_name,
				ia.name AS agent_name,
				ia.mobile_no AS agent_mobile_no,
				il.name AS login_name
			
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%adf%')
			ORDER BY ip.id DESC
			LIMIT 0, 10
		
ERROR - 2025-11-14 17:17:53 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt 
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%h%')
ERROR - 2025-11-14 17:17:53 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: 
			SELECT 
				ip.*,
				irc.name AS rto_company_name,
				iac.name AS agent_code_name,
				cu1.name AS created_by_name,
				cu2.name AS updated_by_name,
				ist.name AS staff_name,
				ia.name AS agent_name,
				ia.mobile_no AS agent_mobile_no,
				il.name AS login_name
			
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%h%')
			ORDER BY ip.id DESC
			LIMIT 0, 10
		
ERROR - 2025-11-14 17:17:53 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt 
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%hond%')
ERROR - 2025-11-14 17:17:53 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: 
			SELECT 
				ip.*,
				irc.name AS rto_company_name,
				iac.name AS agent_code_name,
				cu1.name AS created_by_name,
				cu2.name AS updated_by_name,
				ist.name AS staff_name,
				ia.name AS agent_name,
				ia.mobile_no AS agent_mobile_no,
				il.name AS login_name
			
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%hond%')
			ORDER BY ip.id DESC
			LIMIT 0, 10
		
ERROR - 2025-11-14 17:17:54 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt 
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%honda%')
ERROR - 2025-11-14 17:17:54 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: 
			SELECT 
				ip.*,
				irc.name AS rto_company_name,
				iac.name AS agent_code_name,
				cu1.name AS created_by_name,
				cu2.name AS updated_by_name,
				ist.name AS staff_name,
				ia.name AS agent_name,
				ia.mobile_no AS agent_mobile_no,
				il.name AS login_name
			
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%honda%')
			ORDER BY ip.id DESC
			LIMIT 0, 10
		
ERROR - 2025-11-14 17:17:57 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt 
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%t%')
ERROR - 2025-11-14 17:17:57 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: 
			SELECT 
				ip.*,
				irc.name AS rto_company_name,
				iac.name AS agent_code_name,
				cu1.name AS created_by_name,
				cu2.name AS updated_by_name,
				ist.name AS staff_name,
				ia.name AS agent_name,
				ia.mobile_no AS agent_mobile_no,
				il.name AS login_name
			
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%t%')
			ORDER BY ip.id DESC
			LIMIT 0, 10
		
ERROR - 2025-11-14 17:17:57 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt 
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%tn%')
ERROR - 2025-11-14 17:17:57 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: 
			SELECT 
				ip.*,
				irc.name AS rto_company_name,
				iac.name AS agent_code_name,
				cu1.name AS created_by_name,
				cu2.name AS updated_by_name,
				ist.name AS staff_name,
				ia.name AS agent_name,
				ia.mobile_no AS agent_mobile_no,
				il.name AS login_name
			
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			LEFT JOIN ins_loginid il ON ip.login_id = il.id
			WHERE ip.is_delete = 0
		 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (CONCAT_WS(' | ',
				CAST(ip.id AS CHAR),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
				COALESCE(ip.policy_no, ''),
				COALESCE(ip.vehicle_no, ''),
				COALESCE(ip.customer_name, ''),
				COALESCE(ip.make, ''),
				COALESCE(ip.model, ''),
				COALESCE(ip.vehicle_type, ''),
				COALESCE(irc.name, ''),
				COALESCE(ip.mfg_year, ''),
				CAST(COALESCE(ip.age, 0) AS CHAR),
				CAST(COALESCE(ip.gvw, 0) AS CHAR),
				COALESCE(ip.ncb, ''),
				COALESCE(ip.policy_type, ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
				COALESCE(ip.company_name, ''),
				COALESCE(iac.name, ''),
				COALESCE(ip.name, ''),
				CAST(COALESCE(ip.od, 0) AS CHAR),
				CAST(COALESCE(ip.tp, 0) AS CHAR),
				CAST(COALESCE(ip.net, 0) AS CHAR),
				CAST(COALESCE(ip.premium, 0) AS CHAR),
				CAST(COALESCE(ip.reward, 0) AS CHAR),
				COALESCE(ia.name, ''),
				COALESCE(ia.mobile_no, ''),
				CAST(COALESCE(ip.company_grid, '') AS CHAR),
				CAST(COALESCE(ip.company_grid2, '') AS CHAR),
				CAST(COALESCE(ip.tds, '') AS CHAR),
				COALESCE(ist.name, ''),
				COALESCE(ip.verified_status, ''),
				COALESCE(ip.status, ''),
				COALESCE(cu1.name, ''),
				COALESCE(cu2.name, ''),
				COALESCE(il.name, ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
				IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
			) LIKE '%tn%')
			ORDER BY ip.id DESC
			LIMIT 0, 10
		
ERROR - 2025-11-14 17:18:40 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT COUNT(DISTINCT ip.id) AS cnt
			FROM insurance_policy ip
			LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
			LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
			LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
			LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
			LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
			LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
			 WHERE ip.is_delete = 0 AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59' AND (
				ip.id LIKE '%h%' OR
				ip.created_at LIKE '%h%' OR
				ip.policy_no LIKE '%h%' OR
				ip.vehicle_no LIKE '%h%' OR
				ip.customer_name LIKE '%h%' OR
				ip.make LIKE '%h%' OR
				ip.model LIKE '%h%' OR
				ip.vehicle_type LIKE '%h%' OR
				irc.name LIKE '%h%' OR
				ip.mfg_year LIKE '%h%' OR
				ip.age LIKE '%h%' OR
				ip.gvw LIKE '%h%' OR
				ip.ncb LIKE '%h%' OR
				ip.policy_type LIKE '%h%' OR
				ip.start_date LIKE '%h%' OR
				ip.end_date LIKE '%h%' OR
				ip.company_name LIKE '%h%' OR
				iac.name LIKE '%h%' OR
				ip.name LIKE '%h%' OR
				ip.od LIKE '%h%' OR
				ip.tp LIKE '%h%' OR
				ip.net LIKE '%h%' OR
				ip.premium LIKE '%h%' OR
				ip.reward LIKE '%h%' OR
				ia.name LIKE '%h%' OR
				ia.mobile_no LIKE '%h%' OR
				ip.company_grid LIKE '%h%' OR
				ip.company_grid2 LIKE '%h%' OR
				ip.tds LIKE '%h%' OR
				ist.name LIKE '%h%' OR
				ip.verified_status LIKE '%h%' OR
				ip.status LIKE '%h%' OR
				cu1.name LIKE '%h%' OR
				cu2.name LIKE '%h%' OR
				ip.updated_at LIKE '%h%'
			)
ERROR - 2025-11-14 17:18:40 --> Severity: error --> Exception: Call to a member function row() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 177
ERROR - 2025-11-14 12:48:54 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 12:48:54 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 12:55:10 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 12:55:11 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 17:25:16 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT 
					ip.*,
					irc.name AS rto_company_name,
					iac.name AS agent_code_name,
					cu1.name AS created_by_name,
					cu2.name AS updated_by_name,
					ist.name AS staff_name,
					ia.name AS agent_name,
					ia.mobile_no AS agent_mobile_no,
					il.name AS login_name
				FROM insurance_policy ip
				LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
				LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
				LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
				LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
				LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
				LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
				LEFT JOIN ins_loginid il ON ip.login_id = il.id
				WHERE ip.is_delete = 0
					AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND (CONCAT_WS(' | ',
					CAST(ip.id AS CHAR),
					IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
					IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
					IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
					IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
					IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
					COALESCE(ip.policy_no, ''),
					COALESCE(ip.vehicle_no, ''),
					COALESCE(ip.customer_name, ''),
					COALESCE(ip.make, ''),
					COALESCE(ip.model, ''),
					COALESCE(ip.vehicle_type, ''),
					COALESCE(irc.name, ''),
					COALESCE(ip.mfg_year, ''),
					CAST(COALESCE(ip.age, 0) AS CHAR),
					CAST(COALESCE(ip.gvw, 0) AS CHAR),
					COALESCE(ip.ncb, ''),
					COALESCE(ip.policy_type, ''),
					IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
					IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
					IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
					IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
					COALESCE(ip.company_name, ''),
					COALESCE(iac.name, ''),
					COALESCE(ip.name, ''),
					CAST(COALESCE(ip.od, 0) AS CHAR),
					CAST(COALESCE(ip.tp, 0) AS CHAR),
					CAST(COALESCE(ip.net, 0) AS CHAR),
					CAST(COALESCE(ip.premium, 0) AS CHAR),
					CAST(COALESCE(ip.reward, 0) AS CHAR),
					COALESCE(ia.name, ''),
					COALESCE(ia.mobile_no, ''),
					CAST(COALESCE(ip.company_grid, '') AS CHAR),
					CAST(COALESCE(ip.company_grid2, '') AS CHAR),
					CAST(COALESCE(ip.tds, '') AS CHAR),
					COALESCE(ist.name, ''),
					COALESCE(ip.verified_status, ''),
					COALESCE(ip.status, ''),
					COALESCE(cu1.name, ''),
					COALESCE(cu2.name, ''),
					COALESCE(il.name, ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
				) LIKE '%h%')
				ORDER BY ip.id desc
ERROR - 2025-11-14 17:25:16 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 184
ERROR - 2025-11-14 17:25:17 --> Query error: Unknown column 'ip.name' in 'where clause' - Invalid query: SELECT 
					ip.*,
					irc.name AS rto_company_name,
					iac.name AS agent_code_name,
					cu1.name AS created_by_name,
					cu2.name AS updated_by_name,
					ist.name AS staff_name,
					ia.name AS agent_name,
					ia.mobile_no AS agent_mobile_no,
					il.name AS login_name
				FROM insurance_policy ip
				LEFT JOIN ins_rto_company irc ON ip.rto_company_id = irc.id
				LEFT JOIN ins_agent_code iac ON ip.agent_code_id = iac.id
				LEFT JOIN ci_users cu1 ON ip.created_by = cu1.id
				LEFT JOIN ci_users cu2 ON ip.updated_by = cu2.id
				LEFT JOIN ins_staff ist ON ip.staff_id = ist.id
				LEFT JOIN ins_agency ia ON ip.agent_id = ia.id
				LEFT JOIN ins_loginid il ON ip.login_id = il.id
				WHERE ip.is_delete = 0
					AND ip.created_at BETWEEN '2025-11-01 00:00:00' AND '2025-11-30 23:59:59'
					AND (CONCAT_WS(' | ',
					CAST(ip.id AS CHAR),
					IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y'), ''),
					IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y'), ''),
					IFNULL(DATE_FORMAT(ip.created_at, '%Y-%m-%d'), ''),
					IFNULL(DATE_FORMAT(ip.created_at, '%d-%m-%Y %h:%i %p'), ''),
					IFNULL(DATE_FORMAT(ip.created_at, '%d/%m/%Y %h:%i %p'), ''),
					COALESCE(ip.policy_no, ''),
					COALESCE(ip.vehicle_no, ''),
					COALESCE(ip.customer_name, ''),
					COALESCE(ip.make, ''),
					COALESCE(ip.model, ''),
					COALESCE(ip.vehicle_type, ''),
					COALESCE(irc.name, ''),
					COALESCE(ip.mfg_year, ''),
					CAST(COALESCE(ip.age, 0) AS CHAR),
					CAST(COALESCE(ip.gvw, 0) AS CHAR),
					COALESCE(ip.ncb, ''),
					COALESCE(ip.policy_type, ''),
					IFNULL(DATE_FORMAT(ip.start_date, '%d-%m-%Y'), ''),
					IFNULL(DATE_FORMAT(ip.start_date, '%Y-%m-%d'), ''),
					IFNULL(DATE_FORMAT(ip.end_date, '%d-%m-%Y'), ''),
					IFNULL(DATE_FORMAT(ip.end_date, '%Y-%m-%d'), ''),
					COALESCE(ip.company_name, ''),
					COALESCE(iac.name, ''),
					COALESCE(ip.name, ''),
					CAST(COALESCE(ip.od, 0) AS CHAR),
					CAST(COALESCE(ip.tp, 0) AS CHAR),
					CAST(COALESCE(ip.net, 0) AS CHAR),
					CAST(COALESCE(ip.premium, 0) AS CHAR),
					CAST(COALESCE(ip.reward, 0) AS CHAR),
					COALESCE(ia.name, ''),
					COALESCE(ia.mobile_no, ''),
					CAST(COALESCE(ip.company_grid, '') AS CHAR),
					CAST(COALESCE(ip.company_grid2, '') AS CHAR),
					CAST(COALESCE(ip.tds, '') AS CHAR),
					COALESCE(ist.name, ''),
					COALESCE(ip.verified_status, ''),
					COALESCE(ip.status, ''),
					COALESCE(cu1.name, ''),
					COALESCE(cu2.name, ''),
					COALESCE(il.name, ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y'), ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y'), ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%Y-%m-%d'), ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%d-%m-%Y %h:%i %p'), ''),
					IFNULL(DATE_FORMAT(ip.updated_at, '%d/%m/%Y %h:%i %p'), '')
				) LIKE '%ho%')
				ORDER BY ip.id desc
ERROR - 2025-11-14 17:25:17 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance_policy.php 184
ERROR - 2025-11-14 12:57:43 --> 404 Page Not Found: Public/plugins
ERROR - 2025-11-14 12:57:43 --> 404 Page Not Found: Public/plugins
