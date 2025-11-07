<?php
	class Godigit_model extends CI_Model {
        
    public function extract_weight($text) {
        if (preg_match('/Gross Vehicle Weight\s*([0-9,\.]+)\s*KG/i', $text, $matches)) {
            return str_replace(',', '', $matches[1]);
        }
        return '';
    }

    public function extract_year_of_manufacture($text) {
        if (preg_match('/Year of Regn\. \/ ([0-9]{4})/', $text, $matches)) {
            return $matches[1];
        }
        // Fallback: Manufacturing Year and Month
        if (preg_match('/Manufacturing Year and Month--\s*([0-9]{4})/', $text, $matches)) {
            return $matches[1];
        }
        return '';
    }

    public function extract_make_model($text) {
        if (preg_match('/Model\/Vehicle Variant\s*([^\n\/]+)\/([^\n]+)/i', $text, $matches)) {
            return trim($matches[1] . ' ' . $matches[2]);
        }
        if (preg_match('/Model\/Vehicle Variant\s*([^\n]+)/i', $text, $matches)) {
            return trim($matches[1]);
        }
        return '';
    }

    public function extract_od_premium($text) {
        if (preg_match('/Own Damage Premium \(`\)\s*([\d,\.]+)/', $text, $matches)) {
            return str_replace(',', '', $matches[1]);
        }
        return 0.00;
    }

    public function extract_tp_premium($text) {
        if (preg_match('/Basic Third-Party Liability \(`\)\s*([\d,\.]+)/', $text, $matches)) {
            return str_replace(',', '', $matches[1]);
        }
        return 0.00;
    }

    public function extract_net_premium($text) {
        if (preg_match('/Net Premium \[A\+B\] \(`\)\s*([\d,\.]+)/', $text, $matches)) {
            return str_replace(',', '', $matches[1]);
        }
        return 0.00;
    }

    public function extract_gross_premium($text) {
        if (preg_match('/Total Premium \(`\)\s*([\d,\.]+)/', $text, $matches)) {
            return str_replace(',', '', $matches[1]);
        }
        return 0.00;
    }

    public function extract_policy_number($text) {
        // Try to match: Policy No. D209025268 / 23062025 Policy Issue Date
        if (preg_match('#Policy No\. ([^/\s]+) /#', $text, $matches)) {
            return trim($matches[1]);
        }
        // Fallback: Policy Number: D209025268
        if (preg_match('/Policy Number[:\.]?\s*([A-Z0-9\-]+)/i', $text, $matches)) {
            return trim($matches[1]);
        }
        return '';
    }
}