-- SQL Query to add agent premium columns to ins_loginid table
-- Execute these queries in your MySQL database

-- Add agent_odpremium column
ALTER TABLE `ins_loginid` 
ADD COLUMN `agent_odpremium` DECIMAL(10,2) DEFAULT 0.00 NULL AFTER `net_premium`;

-- Add agent_tppremium column
ALTER TABLE `ins_loginid` 
ADD COLUMN `agent_tppremium` DECIMAL(10,2) DEFAULT 0.00 NULL AFTER `agent_odpremium`;

-- Add agent_netpremium column
ALTER TABLE `ins_loginid` 
ADD COLUMN `agent_netpremium` DECIMAL(10,2) DEFAULT 0.00 NULL AFTER `agent_tppremium`;

-- Verify the columns were added
-- DESCRIBE `ins_loginid`;

