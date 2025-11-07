<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2025-10-11 07:03:09 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 65
ERROR - 2025-10-11 07:03:09 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 70
ERROR - 2025-10-11 10:33:10 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 238
ERROR - 2025-10-11 10:51:29 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 238
ERROR - 2025-10-11 11:06:43 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 238
ERROR - 2025-10-11 07:36:46 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 07:36:48 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 11:06:49 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 238
ERROR - 2025-10-11 08:14:55 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 08:15:18 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 65
ERROR - 2025-10-11 08:15:18 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\Auth.php 70
ERROR - 2025-10-11 11:51:03 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 225
ERROR - 2025-10-11 08:21:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 08:21:10 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 11:51:28 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 225
ERROR - 2025-10-11 08:23:56 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 08:24:23 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 08:57:41 --> Severity: Warning --> Undefined array key "HTTP_HOST" C:\xampp\htdocs\demo_insurance\application\config\config.php 28
ERROR - 2025-10-11 09:37:41 --> Not Found: Migrate/current
ERROR - 2025-10-11 13:28:03 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 279
ERROR - 2025-10-11 09:58:08 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 13:28:08 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 279
ERROR - 2025-10-11 09:58:37 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 11:41:26 --> Query error: Unknown column 'agent_od' in 'field list' - Invalid query: CREATE OR REPLACE VIEW view_insurance_auto_calculation AS
        SELECT
            id,
            COALESCE(od_premium, 0) AS od_premium,
            COALESCE(tp_premium, 0) AS tp_premium,
            COALESCE(net_premium, 0) AS net_premium,
            COALESCE(gross_premium, 0) AS gross_premium,
            COALESCE(company_od, 0) AS company_od,
            COALESCE(company_tp, 0) AS company_tp,
            COALESCE(company_net, 0) AS company_net,
            ROUND(GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(company_od, 0) / 100)), 2) AS company_odpayout,
            ROUND(GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(company_tp, 0) / 100)), 2) AS company_tppayout,
            ROUND(GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(company_net, 0) / 100)), 2) AS company_netpayout,
            ROUND(
                GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(company_od, 0) / 100))
                + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(company_tp, 0) / 100))
                + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(company_net, 0) / 100)),
            2) AS company_totpayout,
            COALESCE(company_paymentmode, '') AS company_paymentmode,
            COALESCE(agent_od, 0) AS agent_od,
            COALESCE(agent_tp, 0) AS agent_tp,
            COALESCE(agent_net, 0) AS agent_net,
            ROUND(GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100)), 2) AS agent_odpayout,
            ROUND(GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100)), 2) AS agent_tppayout,
            ROUND(GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)), 2) AS agent_netpayout,
            ROUND(
                GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)),
            2) AS agent_commission,
            
            COALESCE(paid_type, '') AS payment_type,
            -- Agency Paid Gross Premium (line 379)
            CASE 
                WHEN paid_type = 'Agency Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS agent_paid,
            -- Agency Paid Commission (line 380)
            CASE 
                WHEN paid_type = 'Agency Paid' THEN ROUND(agent_commission, 2)
                ELSE 0.00
            END AS balance_to_agent,
            -- Company Paid Gross Premium (line 381)
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS company_payment_amount,
            -- Company Paid Agent Amount (line 382) - This is gross_premium - agent_commission
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium - agent_commission, 2)
                ELSE 0.00
            END AS agent_payable,
            -- Amount From Agent (line 383) - Conditional display
            CASE 
                WHEN paid_type = 'Company Paid' THEN COALESCE(amount_from_agent, 0)
                ELSE 0.00
            END AS amount_from_agent,
            -- Balance calculation (lines 314-319)
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - agent_commission) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(agent_commission, 2)
            END AS balance,
            -- Net calculation (lines 323-331) - Same as balance
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - agent_commission) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(agent_commission, 2)
            END AS net
        FROM ins_insurance_record
ERROR - 2025-10-11 11:46:31 --> Query error: Unknown column 'agent_od' in 'field list' - Invalid query: CREATE OR REPLACE VIEW view_insurance_auto_calculation AS
        SELECT
            id,
            COALESCE(od_premium, 0) AS od_premium,
            COALESCE(tp_premium, 0) AS tp_premium,
            COALESCE(net_premium, 0) AS net_premium,
            COALESCE(gross_premium, 0) AS gross_premium,
            COALESCE(company_od, 0) AS company_od,
            COALESCE(company_tp, 0) AS company_tp,
            COALESCE(company_net, 0) AS company_net,
            ROUND(GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(company_od, 0) / 100)), 2) AS company_odpayout,
            ROUND(GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(company_tp, 0) / 100)), 2) AS company_tppayout,
            ROUND(GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(company_net, 0) / 100)), 2) AS company_netpayout,
            ROUND(
                GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(company_od, 0) / 100))
                + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(company_tp, 0) / 100))
                + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(company_net, 0) / 100)),
            2) AS company_totpayout,
            COALESCE(company_paymentmode, '') AS company_paymentmode,
            COALESCE(agent_od, 0) AS agent_od,
            COALESCE(agent_tp, 0) AS agent_tp,
            COALESCE(agent_net, 0) AS agent_net,
            ROUND(GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100)), 2) AS agent_odpayout,
            ROUND(GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100)), 2) AS agent_tppayout,
            ROUND(GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)), 2) AS agent_netpayout,
            ROUND(
                GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)),
            2) AS agent_commission,
            
            COALESCE(paid_type, '') AS payment_type,
            -- Agency Paid Gross Premium (line 379)
            CASE 
                WHEN paid_type = 'Agency Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS agent_paid,
            -- Agency Paid Commission (line 380)
            CASE 
                WHEN paid_type = 'Agency Paid' THEN ROUND(agent_commission, 2)
                ELSE 0.00
            END AS balance_to_agent,
            -- Company Paid Gross Premium (line 381)
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS company_payment_amount,
            -- Company Paid Agent Amount (line 382) - This is gross_premium - agent_commission
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium - agent_commission, 2)
                ELSE 0.00
            END AS agent_payable,
            -- Amount From Agent (line 383) - Conditional display
            CASE 
                WHEN paid_type = 'Company Paid' THEN COALESCE(amount_from_agent, 0)
                ELSE 0.00
            END AS amount_from_agent,
            -- Balance calculation (lines 314-319)
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - agent_commission) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(agent_commission, 2)
            END AS balance,
            -- Net calculation (lines 323-331) - Same as balance
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - agent_commission) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(agent_commission, 2)
            END AS net
        FROM ins_insurance_record
ERROR - 2025-10-11 11:56:59 --> Query error: Unknown column 'agent_commission' in 'field list' - Invalid query: CREATE OR REPLACE VIEW view_insurance_auto_calculation AS
        SELECT
            id,
            COALESCE(od_premium, 0) AS od_premium,
            COALESCE(tp_premium, 0) AS tp_premium,
            COALESCE(net_premium, 0) AS net_premium,
            COALESCE(gross_premium, 0) AS gross_premium,
            COALESCE(company_od, 0) AS company_od,
            COALESCE(company_tp, 0) AS company_tp,
            COALESCE(company_net, 0) AS company_net,
            ROUND(GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(company_od, 0) / 100)), 2) AS company_odpayout,
            ROUND(GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(company_tp, 0) / 100)), 2) AS company_tppayout,
            ROUND(GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(company_net, 0) / 100)), 2) AS company_netpayout,
            ROUND(
                GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(company_od, 0) / 100))
                + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(company_tp, 0) / 100))
                + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(company_net, 0) / 100)),
            2) AS company_totpayout,
            COALESCE(company_paymentmode, '') AS company_paymentmode,
            COALESCE(agent_od, 0) AS agent_od,
            COALESCE(agent_tp, 0) AS agent_tp,
            COALESCE(agent_net, 0) AS agent_net,
            ROUND(GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100)), 2) AS agent_odpayout,
            ROUND(GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100)), 2) AS agent_tppayout,
            ROUND(GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)), 2) AS agent_netpayout,
            ROUND(
                GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)),
            2) AS agent_commission,
            
            COALESCE(paid_type, '') AS payment_type,
            -- Agency Paid Gross Premium (line 379)
            CASE 
                WHEN paid_type = 'Agency Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS agent_paid,
            -- Agency Paid Commission (line 380)
            CASE 
                WHEN paid_type = 'Agency Paid' THEN ROUND(agent_commission, 2)
                ELSE 0.00
            END AS balance_to_agent,
            -- Company Paid Gross Premium (line 381)
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS company_payment_amount,
            -- Company Paid Agent Amount (line 382) - This is gross_premium - agent_commission
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium - agent_commission, 2)
                ELSE 0.00
            END AS agent_payable,
            -- Amount From Agent (line 383) - Conditional display
            CASE 
                WHEN paid_type = 'Company Paid' THEN COALESCE(amount_from_agent, 0)
                ELSE 0.00
            END AS amount_from_agent,
            -- Balance calculation (lines 314-319)
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - agent_commission) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(agent_commission, 2)
            END AS balance,
            -- Net calculation (lines 323-331) - Same as balance
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - agent_commission) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(agent_commission, 2)
            END AS net
        FROM ins_insurance_record
ERROR - 2025-10-11 11:59:28 --> Query error: Unknown column 'agent_commission' in 'field list' - Invalid query: CREATE OR REPLACE VIEW view_insurance_auto_calculation AS
        SELECT
            id,
            COALESCE(od_premium, 0) AS od_premium,
            COALESCE(tp_premium, 0) AS tp_premium,
            COALESCE(net_premium, 0) AS net_premium,
            COALESCE(gross_premium, 0) AS gross_premium,
            COALESCE(company_od, 0) AS company_od,
            COALESCE(company_tp, 0) AS company_tp,
            COALESCE(company_net, 0) AS company_net,
            ROUND(GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(company_od, 0) / 100)), 2) AS company_odpayout,
            ROUND(GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(company_tp, 0) / 100)), 2) AS company_tppayout,
            ROUND(GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(company_net, 0) / 100)), 2) AS company_netpayout,
            ROUND(
                GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(company_od, 0) / 100))
                + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(company_tp, 0) / 100))
                + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(company_net, 0) / 100)),
            2) AS company_totpayout,
            COALESCE(company_paymentmode, '') AS company_paymentmode,
            COALESCE(agent_od, 0) AS agent_od,
            COALESCE(agent_tp, 0) AS agent_tp,
            COALESCE(agent_net, 0) AS agent_net,
            ROUND(GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100)), 2) AS agent_odpayout,
            ROUND(GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100)), 2) AS agent_tppayout,
            ROUND(GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)), 2) AS agent_netpayout,
            ROUND(
                GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)),
            2) AS agent_commission,
            
            COALESCE(paid_type, '') AS payment_type,
            -- Agency Paid Gross Premium (line 379)
            CASE 
                WHEN paid_type = 'Agency Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS agent_paid,
            -- Agency Paid Commission (line 380)
            CASE 
                WHEN paid_type = 'Agency Paid' THEN ROUND(agent_commission, 2)
                ELSE 0.00
            END AS balance_to_agent,
            -- Company Paid Gross Premium (line 381)
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS company_payment_amount,
            -- Company Paid Agent Amount (line 382) - This is gross_premium - agent_commission
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium - agent_commission, 2)
                ELSE 0.00
            END AS agent_payable,
            -- Amount From Agent (line 383) - Conditional display
            CASE 
                WHEN paid_type = 'Company Paid' THEN COALESCE(amount_from_agent, 0)
                ELSE 0.00
            END AS amount_from_agent,
            -- Balance calculation (lines 314-319)
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - agent_commission) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(agent_commission, 2)
            END AS balance,
            -- Net calculation (lines 323-331) - Same as balance
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - agent_commission) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(agent_commission, 2)
            END AS net
        FROM ins_insurance_record
ERROR - 2025-10-11 12:26:05 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 15:56:14 --> Severity: Warning --> Undefined array key "company_od" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 196
ERROR - 2025-10-11 15:56:14 --> Severity: Warning --> Undefined array key "company_tp" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 197
ERROR - 2025-10-11 15:56:14 --> Severity: Warning --> Undefined array key "company_net" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 198
ERROR - 2025-10-11 15:56:14 --> Query error: Column 'company_od' cannot be null - Invalid query: INSERT INTO `ins_insurance_record` (`staff_name`, `agency_id`, `login_id`, `child_id`, `date`, `company`, `insured_name`, `product_type`, `policy_number`, `type`, `registration_no`, `gvw`, `year`, `model`, `contact_no`, `mail_id`, `start_date`, `end_date`, `brokerage_name`, `login_code`, `carrying_capacity`, `pro_code`, `new`, `note`, `gvw_range`, `vehicle_age`, `od_premium`, `tp_premium`, `net_premium`, `gross_premium`, `company_od`, `company_tp`, `company_net`, `company_paymentmode`, `agent_paymentmode`, `paid_type`, `upload_status`, `file_name`, `status`, `received_account`, `received_date`, `created_by`) VALUES ('Admin', '1', '1', '', '2025-10-07', 'UNITED INDIA INSURANCE COMPANY LIMITED', 'MR MURUGAN S', 'TWO WHEELER-1 YEAR OWN DAMAGE COVER BUNDLED WITH 5 YEARS LIABILITY', '0102003125P110905777', '', 'NEW', 0, '2025', 'HONDA / UNICORN CBF 160AR', '', '', '2025-10-07', '2026-10-06', 'POLICYBAZAAR', 'POLBRO002401', '', 'GCV', '', '', 'O - 2000 GVW', 0, 0, 0, 8027, 9471, NULL, NULL, NULL, 'Cash', '', 'Agency Paid', 1, 'c0b2196ca62830b97893075d225a950e.pdf', 'inactive', '', '', '22')
ERROR - 2025-10-11 12:29:13 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 15:59:27 --> Severity: Warning --> Undefined array key "company_od" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 193
ERROR - 2025-10-11 15:59:27 --> Severity: Warning --> Undefined array key "company_tp" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 194
ERROR - 2025-10-11 15:59:27 --> Severity: Warning --> Undefined array key "company_net" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 195
ERROR - 2025-10-11 15:59:27 --> Query error: Column 'company_od' cannot be null - Invalid query: INSERT INTO `ins_insurance_record` (`staff_name`, `agency_id`, `login_id`, `date`, `company`, `insured_name`, `product_type`, `policy_number`, `type`, `registration_no`, `gvw`, `year`, `model`, `contact_no`, `mail_id`, `start_date`, `end_date`, `brokerage_name`, `login_code`, `carrying_capacity`, `pro_code`, `new`, `gvw_range`, `vehicle_age`, `od_premium`, `tp_premium`, `net_premium`, `gross_premium`, `company_od`, `company_tp`, `company_net`, `company_paymentmode`, `paid_type`, `upload_status`, `file_name`, `status`, `created_by`) VALUES ('Admin', '1', '1', '2025-10-07', 'UNITED INDIA INSURANCE COMPANY LIMITED', 'MR MURUGAN S', 'TWO WHEELER-1 YEAR OWN DAMAGE COVER BUNDLED WITH 5 YEARS LIABILITY COVER', '0102003125P110905777', '', 'NEW', 0, '2025', 'HONDA / UNICORN CBF 160AR', '', '', '2025-10-07', '2026-10-06', 'POLICYBAZAAR', 'POLBRO002401', '', 'GCV', '', 'O - 2000 GVW', 0, 0, 0, 8027, 9471, NULL, NULL, NULL, 'Cash', 'Agency Paid', 1, 'a61aeb5e4bb9878c6c4edfe8f3612c20.pdf', 'inactive', '22')
ERROR - 2025-10-11 12:31:49 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:02:04 --> Query error: Unknown column 'login_id' in 'where clause' - Invalid query: SELECT *
FROM `ins_loginid`
WHERE `login_id` = '1'
ORDER BY `updated_date` DESC
 LIMIT 1
ERROR - 2025-10-11 16:02:04 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 313
ERROR - 2025-10-11 12:33:02 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:03:14 --> Query error: Unknown column 'login_id' in 'where clause' - Invalid query: SELECT *
FROM `ins_loginid`
WHERE `login_id` = '1'
ORDER BY `updated_date` DESC
 LIMIT 1
ERROR - 2025-10-11 16:03:14 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 314
ERROR - 2025-10-11 12:34:09 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:04:23 --> Query error: Unknown column 'login_id' in 'where clause' - Invalid query: SELECT *
FROM `ins_loginid`
WHERE `login_id` = '1'
ORDER BY `updated_date` DESC
 LIMIT 1
ERROR - 2025-10-11 16:04:23 --> Severity: error --> Exception: Call to a member function result_array() on bool C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 313
ERROR - 2025-10-11 12:35:14 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:05:28 --> Query error: Unknown column 'login_id' in 'where clause' - Invalid query: SELECT *
FROM `ins_loginid`
WHERE `login_id` = '1'
ORDER BY `updated_date` DESC
 LIMIT 1
ERROR - 2025-10-11 16:05:28 --> Database query failed in get_company_commission_by_login_id
ERROR - 2025-10-11 12:35:32 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:05:32 --> Severity: Warning --> Undefined property: stdClass::$company_odpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 366
ERROR - 2025-10-11 16:05:32 --> Severity: Warning --> Undefined property: stdClass::$company_tppayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 367
ERROR - 2025-10-11 16:05:32 --> Severity: Warning --> Undefined property: stdClass::$company_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 368
ERROR - 2025-10-11 16:05:32 --> Severity: Warning --> Undefined property: stdClass::$company_totpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 369
ERROR - 2025-10-11 16:05:32 --> Severity: Warning --> Undefined property: stdClass::$agent_odpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 374
ERROR - 2025-10-11 16:05:32 --> Severity: Warning --> Undefined property: stdClass::$agent_tppayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 375
ERROR - 2025-10-11 16:05:32 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 376
ERROR - 2025-10-11 16:05:35 --> Severity: Warning --> Undefined property: stdClass::$company_odpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 366
ERROR - 2025-10-11 16:05:35 --> Severity: Warning --> Undefined property: stdClass::$company_tppayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 367
ERROR - 2025-10-11 16:05:35 --> Severity: Warning --> Undefined property: stdClass::$company_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 368
ERROR - 2025-10-11 16:05:35 --> Severity: Warning --> Undefined property: stdClass::$company_totpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 369
ERROR - 2025-10-11 16:05:35 --> Severity: Warning --> Undefined property: stdClass::$agent_odpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 374
ERROR - 2025-10-11 16:05:35 --> Severity: Warning --> Undefined property: stdClass::$agent_tppayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 375
ERROR - 2025-10-11 16:05:35 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 376
ERROR - 2025-10-11 16:09:02 --> Severity: Warning --> Undefined property: stdClass::$company_odpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 366
ERROR - 2025-10-11 16:09:02 --> Severity: Warning --> Undefined property: stdClass::$company_tppayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 367
ERROR - 2025-10-11 16:09:02 --> Severity: Warning --> Undefined property: stdClass::$company_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 368
ERROR - 2025-10-11 16:09:02 --> Severity: Warning --> Undefined property: stdClass::$company_totpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 369
ERROR - 2025-10-11 16:09:02 --> Severity: Warning --> Undefined property: stdClass::$agent_odpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 374
ERROR - 2025-10-11 16:09:02 --> Severity: Warning --> Undefined property: stdClass::$agent_tppayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 375
ERROR - 2025-10-11 16:09:02 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 376
ERROR - 2025-10-11 12:39:10 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 12:41:28 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 12:41:30 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 12:41:48 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 12:41:49 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "company_odpayout" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 206
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "company_tppayout" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 207
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "company_netpayout" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 208
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "company_totpayout" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 209
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "agent_odpayout" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 214
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "agent_tppayout" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 215
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "agent_netpayout" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 216
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "agent_commission" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 217
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "agent_tobepayable" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 219
ERROR - 2025-10-11 16:12:06 --> Severity: Warning --> Undefined array key "balance" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 222
ERROR - 2025-10-11 16:12:06 --> Query error: Unknown column 'company_odpayout' in 'field list' - Invalid query: INSERT INTO `ins_insurance_record` (`staff_name`, `agency_id`, `login_id`, `child_id`, `date`, `company`, `insured_name`, `product_type`, `policy_number`, `type`, `registration_no`, `gvw`, `year`, `model`, `contact_no`, `mail_id`, `start_date`, `end_date`, `brokerage_name`, `login_code`, `carrying_capacity`, `pro_code`, `new`, `note`, `gvw_range`, `vehicle_age`, `od_premium`, `tp_premium`, `net_premium`, `gross_premium`, `company_od`, `company_tp`, `company_net`, `company_odpayout`, `company_tppayout`, `company_netpayout`, `company_totpayout`, `company_paymentmode`, `agent_od`, `agent_tp`, `agent_net`, `agent_odpayout`, `agent_tppayout`, `agent_netpayout`, `agent_commission`, `agent_paymentmode`, `agent_tobepayable`, `agent_payed`, `gi_payed`, `balance`, `paid_type`, `amount_from_agent`, `upload_status`, `file_name`, `status`, `received_account`, `received_date`, `created_by`) VALUES ('Admin', '1', '1', '', '2025-09-12', 'TATA AIG General Insurance Company Limited', 'H M TYAGARAJA CENTRAL SCHOOL', 'Commercial Vehicle Package Policy', '6303360544 00 00', 'Passenger Carrying Vehicle', 'KA 42 A 2918', 0, '2014', 'TATA MOTORS/STARBU', '', '', '2025-09-14', '2026-09-13', 'INDIA\nINSURE RISK\nMANAGEMENT &\nINSURANCE BROKING\nSERVICES PVT. LTD.', '', '27', 'SCHOOL BUS PACKAGE POLICY', '', '', 'O - 2000 GVW', 11, 418.11, 31611.89, 32030, 37796, '0.00', '0.00', '50.00', NULL, NULL, NULL, NULL, 'Cash', 0, 0, 0, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, 'Agency Paid', '', 1, 'a175f93f09284abe91c2c100f25dd6a3.pdf', 'inactive', '', '', '22')
ERROR - 2025-10-11 12:43:14 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:13:30 --> Severity: Warning --> Undefined array key "agent_commission" C:\xampp\htdocs\demo_insurance\application\models\insurance\Insurance_model.php 210
ERROR - 2025-10-11 16:13:30 --> Query error: Column 'agent_commission' cannot be null - Invalid query: INSERT INTO `ins_insurance_record` (`staff_name`, `agency_id`, `login_id`, `child_id`, `date`, `company`, `insured_name`, `product_type`, `policy_number`, `type`, `registration_no`, `gvw`, `year`, `model`, `contact_no`, `mail_id`, `start_date`, `end_date`, `brokerage_name`, `login_code`, `carrying_capacity`, `pro_code`, `new`, `note`, `gvw_range`, `vehicle_age`, `od_premium`, `tp_premium`, `net_premium`, `gross_premium`, `company_od`, `company_tp`, `company_net`, `company_paymentmode`, `agent_od`, `agent_tp`, `agent_net`, `agent_commission`, `agent_paymentmode`, `paid_type`, `amount_from_agent`, `upload_status`, `file_name`, `status`, `received_account`, `received_date`, `created_by`) VALUES ('Admin', '1', '1', '', '2025-09-27', 'UNITED INDIA INSURANCE COMPANY LIMITED', 'MR THIYAGARAJAN D', 'Goods Carrying Vehicle Package policy', '0102003125P110316682', '', 'TN - 05 - AT - 5076', '2500.00', '2013', 'ASHOK LEYLAND / DOST LS', '', '', '2025-09-28', '2026-09-27', 'POLICYBAZAAR INSURANCE', 'POLBRO002399', '', 'GCV', '', '', '2000 - 3500 GVW', 12, 317, 16149, 16466, 17344, '0.00', '0.00', '50.00', 'Cash', 0, 0, 0, NULL, '', 'Agency Paid', '', 1, '478bfb0bb3fec53a0a57b7bb5c853fd6.pdf', 'inactive', '', '', '22')
ERROR - 2025-10-11 12:44:32 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 12:53:02 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:23:05 --> Query error: Unknown column 'v.updated_date' in 'field list' - Invalid query: SELECT v.*, 
			DATE_FORMAT(v.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(v.date, '%d-%m-%Y') AS formatted_date,
			ag.name AS agency_name,
			ag.mobile_no AS agent_mobile_no,
			ag.email AS agent_email,
			il.name AS login_name
			FROM view_insurance_auto_calculation v
			LEFT JOIN ins_agency ag ON v.agency_id = ag.id
			LEFT JOIN ins_loginid il ON v.login_id = il.id
ERROR - 2025-10-11 16:23:05 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 209
ERROR - 2025-10-11 16:33:44 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id
ERROR - 2025-10-11 16:33:44 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 224
ERROR - 2025-10-11 16:33:44 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id
ERROR - 2025-10-11 16:33:44 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 224
ERROR - 2025-10-11 16:33:44 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id
ERROR - 2025-10-11 16:33:44 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 224
ERROR - 2025-10-11 16:33:49 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id
ERROR - 2025-10-11 16:33:49 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 224
ERROR - 2025-10-11 16:34:00 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id
ERROR - 2025-10-11 16:34:00 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 224
ERROR - 2025-10-11 16:34:02 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id
ERROR - 2025-10-11 16:34:02 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 224
ERROR - 2025-10-11 16:34:09 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id
ERROR - 2025-10-11 16:34:09 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 224
ERROR - 2025-10-11 16:35:43 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59' AND iir.is_delete = 0
ERROR - 2025-10-11 16:35:43 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 294
ERROR - 2025-10-11 13:05:46 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:35:47 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59' AND iir.is_delete = 0
ERROR - 2025-10-11 16:35:47 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 294
ERROR - 2025-10-11 13:07:03 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:37:05 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59' AND iir.is_delete = 0
ERROR - 2025-10-11 16:37:05 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 294
ERROR - 2025-10-11 13:23:04 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 16:53:05 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59' AND iir.is_delete = 0
ERROR - 2025-10-11 16:53:05 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 294
ERROR - 2025-10-11 16:53:41 --> Query error: Unknown column 'v.id' in 'on clause' - Invalid query: SELECT iir.*, 
			ag.email agent_email, ag.mobile_no agent_mobile_no, ag.name agency_name,
			il.name login_name,
			DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
			DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
			-- Calculated fields from view
			v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
			v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
			v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
			v.agent_payable, v.amount_from_agent, v.balance, v.net
			FROM ins_insurance_record iir 
			LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
			LEFT JOIN ins_loginid il ON iir.login_id = il.id
			LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.id WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59' AND iir.is_delete = 0
ERROR - 2025-10-11 16:53:41 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 294
ERROR - 2025-10-11 13:24:34 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 13:39:56 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 17:09:57 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025...' at line 39 - Invalid query: (
				SELECT 
					iir.*, 
					ag.email AS agent_email, ag.mobile_no AS agent_mobile_no, ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					0 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.date IS NULL
			)
			UNION ALL
			(
				SELECT 
					iir.*, 
					ag.email AS agent_email, ag.mobile_no AS agent_mobile_no, ag.name AS agency_name,
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
				WHERE iir.date BETWEEN '2025-10-01' AND '2025-10-11'
			) WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59' AND iir.is_delete = 0
ERROR - 2025-10-11 17:09:57 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 325
ERROR - 2025-10-11 17:10:01 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025...' at line 39 - Invalid query: (
				SELECT 
					iir.*, 
					ag.email AS agent_email, ag.mobile_no AS agent_mobile_no, ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					0 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.date IS NULL
			)
			UNION ALL
			(
				SELECT 
					iir.*, 
					ag.email AS agent_email, ag.mobile_no AS agent_mobile_no, ag.name AS agency_name,
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
				WHERE iir.date BETWEEN '2025-10-01' AND '2025-10-11'
			) WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59' AND iir.is_delete = 0
ERROR - 2025-10-11 17:10:01 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 325
ERROR - 2025-10-11 13:40:06 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 17:10:06 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025...' at line 39 - Invalid query: (
				SELECT 
					iir.*, 
					ag.email AS agent_email, ag.mobile_no AS agent_mobile_no, ag.name AS agency_name,
					il.name AS login_name,
					DATE_FORMAT(iir.updated_date, '%d/%m/%Y %H:%i') AS formatted_updated_date, 
					DATE_FORMAT(iir.date, '%d-%m-%Y') AS formatted_date,
					v.company_odpayout, v.company_tppayout, v.company_netpayout, v.company_totpayout,
					v.agent_odpayout, v.agent_tppayout, v.agent_netpayout, v.agent_commission,
					v.payment_type, v.agent_paid, v.balance_to_agent, v.company_payment_amount,
					v.agent_payable, v.amount_from_agent, v.balance, v.net,
					0 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.date IS NULL
			)
			UNION ALL
			(
				SELECT 
					iir.*, 
					ag.email AS agent_email, ag.mobile_no AS agent_mobile_no, ag.name AS agency_name,
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
				WHERE iir.date BETWEEN '2025-10-01' AND '2025-10-11'
			) WHERE ag.branch_id = '1' AND iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59' AND iir.is_delete = 0
ERROR - 2025-10-11 17:10:06 --> Severity: error --> Exception: Call to a member function num_rows() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 325
ERROR - 2025-10-11 13:56:38 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 17:45:22 --> Query error: Table 'iir' from one of the SELECTs cannot be used in ORDER clause - Invalid query: (
				SELECT 
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
					0 AS sort_order,
					iir.date AS sort_date
				FROM ins_insurance_record iir
				LEFT JOIN ins_agency ag ON iir.agency_id = ag.id
				LEFT JOIN ins_loginid il ON iir.login_id = il.id
				LEFT JOIN view_insurance_auto_calculation v ON iir.id = v.ins_id
				WHERE iir.date IS NULL
					AND iir.is_delete = 0
					AND ag.branch_id = '1'
					
			)
			UNION ALL
			(
				SELECT 
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
				WHERE iir.date BETWEEN '2025-10-01 00:00:00' AND '2025-10-31 23:59:59'
					AND iir.is_delete = 0
					AND ag.branch_id = '1'
					
			) ORDER BY iir.id DESC LIMIT 0, 10
ERROR - 2025-10-11 17:45:22 --> Severity: error --> Exception: Call to a member function result() on bool C:\xampp\htdocs\demo_insurance\application\controllers\admin\Insurance.php 393
ERROR - 2025-10-11 14:15:27 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 14:17:15 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:09:09 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 83
ERROR - 2025-10-11 18:09:09 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:09:09 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:09:12 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 83
ERROR - 2025-10-11 18:09:12 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:09:12 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:09:16 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Agency.php 168
ERROR - 2025-10-11 14:39:21 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 14:39:22 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:09:23 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Agency.php 168
ERROR - 2025-10-11 14:39:26 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:09:29 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Agency.php 168
ERROR - 2025-10-11 14:39:33 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 14:39:33 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:09:34 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Agency.php 168
ERROR - 2025-10-11 14:40:07 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:15:07 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 83
ERROR - 2025-10-11 18:15:07 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:15:07 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:15:13 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 83
ERROR - 2025-10-11 18:15:13 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:15:13 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 14:45:18 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 14:45:21 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:15:22 --> Severity: Warning --> Undefined array key "user_role" C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 83
ERROR - 2025-10-11 18:15:22 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:15:22 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 14:45:49 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:15:50 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:15:50 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 14:45:54 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 14:45:58 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:15:58 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:15:58 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 14:46:23 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 18:16:24 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:16:24 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 127
ERROR - 2025-10-11 18:19:18 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 128
ERROR - 2025-10-11 18:19:18 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 128
ERROR - 2025-10-11 18:19:21 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 128
ERROR - 2025-10-11 18:19:21 --> Severity: Warning --> Undefined property: stdClass::$agent_netpayout C:\xampp\htdocs\demo_insurance\application\controllers\admin\Reports.php 128
ERROR - 2025-10-11 14:50:51 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 15:00:20 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 15:00:35 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 15:06:31 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 15:06:45 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 15:35:12 --> 404 Page Not Found: Public/plugins
ERROR - 2025-10-11 15:35:30 --> 404 Page Not Found: Public/plugins
