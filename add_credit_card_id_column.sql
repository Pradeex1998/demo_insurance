-- SQL Query to add credit_card_id column to insurance_policy table
-- Execute this query in your MySQL database

-- Add credit_card_id column
ALTER TABLE `insurance_policy`  
ADD COLUMN `credit_card_id` INT(11) NULL DEFAULT NULL AFTER `payment_mode`;

-- Optional: Add foreign key constraint (uncomment if you want referential integrity)
-- ALTER TABLE `insurance_policy` 
-- ADD CONSTRAINT `fk_insurance_policy_credit_card` 
-- FOREIGN KEY (`credit_card_id`) REFERENCES `ins_credit_card` (`id`) 
-- ON DELETE SET NULL ON UPDATE CASCADE;

-- Verify the column was added
-- DESCRIBE `insurance_policy`;

