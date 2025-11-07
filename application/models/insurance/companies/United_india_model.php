<?php
	class United_india_model extends CI_Model {

        public function extract_start_date($text) {
			$start_date = null;
			// Pattern 1: Insurance Start Date & Time format
			if (preg_match('/Insurance Start Date & Time\s*:(\d{2}\/\d{2}\/\d{4})/', $text, $matches)) {
				$start_date = date('Y-m-d', strtotime(str_replace('/', '-', $matches[1])));
			}
			// Pattern 2: Effective date of commencement format
			elseif (preg_match('/Effective date of commencement of Insurance.*?(\d{2}\/\d{2}\/\d{4})/', $text, $matches)) {
				$start_date = date('Y-m-d', strtotime(str_replace('/', '-', $matches[1])));
			}
			// Pattern 3: From Hrs on format
			elseif (preg_match('/from.*?(\d{2}\/\d{2}\/\d{4})/', $text, $matches)) {
				$start_date = date('Y-m-d', strtotime(str_replace('/', '-', $matches[1])));
			}
			return $start_date;
		}

		public function extract_end_date($text) {
			$end_date = null;
			// Pattern 1: Insurance expiry Date & Time format
			if (preg_match('/Insurance expiry Date & Time\s*:(\d{2}\/\d{2}\/\d{4})/', $text, $matches)) {
				$end_date = date('Y-m-d', strtotime(str_replace('/', '-', $matches[1])));
			}
			// Pattern 2: Date of Expiry format
			elseif (preg_match('/Date of Expiry of the Insurance.*?(\d{2}\/\d{2}\/\d{4})/', $text, $matches)) {
				$end_date = date('Y-m-d', strtotime(str_replace('/', '-', $matches[1])));
			}
			// Pattern 3: Midnight on format
			elseif (preg_match('/Midnight on\s*(\d{2}\/\d{2}\/\d{4})/', $text, $matches)) {
				$end_date = date('Y-m-d', strtotime(str_replace('/', '-', $matches[1])));
			}
			return $end_date;
		}

		public function extract_brokerage_name($text) {
			if (preg_match('/Agent Name: ([^\n]+)/', $text, $matches)) {
				return trim($matches[1]);
			}
			return null;
		}

		public function extract_login_code($text) {
			if (preg_match('/Agent User Name: ([^\n]+)/', $text, $matches)) {
				return trim($matches[1]);
			}
			return null;
		}

		public function extract_carrying_capacity($text) {
			if (preg_match('/Carrying Capacity\s+(\d+)/', $text, $matches)) {
				return (int)$matches[1];
			}
			return null;
		}
    }