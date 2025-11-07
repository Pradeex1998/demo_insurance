<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_insurance_view extends CI_Migration {
    public function up()
    {
        $sql = "CREATE OR REPLACE VIEW view_insurance_auto_calculation AS
        SELECT
            id as ins_id,
            -- COALESCE(od_premium, 0) AS od_premium,
            -- COALESCE(tp_premium, 0) AS tp_premium,
            -- COALESCE(net_premium, 0) AS net_premium,
            -- COALESCE(gross_premium, 0) AS gross_premium,
            -- COALESCE(company_od, 0) AS company_od,
            -- COALESCE(company_tp, 0) AS company_tp,
            -- COALESCE(company_net, 0) AS company_net,
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
            CASE 
                WHEN paid_type = 'Agent Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS agent_paid,
            CASE 
                WHEN paid_type = 'Agent Paid' THEN ROUND(
                    GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                    + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                    + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)), 2)
                ELSE 0.00
            END AS balance_to_agent,
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium, 2)
                ELSE 0.00
            END AS company_payment_amount,
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND(gross_premium - (
                    GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                    + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                    + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100))), 2)
                ELSE 0.00
            END AS agent_payable,
            CASE 
                WHEN paid_type = 'Company Paid' THEN COALESCE(amount_from_agent, 0)
                ELSE 0.00
            END AS amount_from_agent,
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - (
                    GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                    + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                    + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)))) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(
                    GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                    + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                    + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)), 2)
            END AS balance,
            CASE 
                WHEN paid_type = 'Company Paid' THEN ROUND((gross_premium - (
                    GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                    + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                    + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)))) - COALESCE(amount_from_agent, 0), 2)
                ELSE ROUND(
                    GREATEST(0, COALESCE(od_premium, 0) * (COALESCE(agent_od, 0) / 100))
                    + GREATEST(0, COALESCE(tp_premium, 0) * (COALESCE(agent_tp, 0) / 100))
                    + GREATEST(0, COALESCE(net_premium, 0) * (COALESCE(agent_net, 0) / 100)), 2)
            END AS net
        FROM ins_insurance_record";

        $this->db->query($sql);
    }

    public function down()
    {
        $this->db->query("DROP VIEW IF EXISTS view_insurance_auto_calculation;");
    }
}

