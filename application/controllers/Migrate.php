<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('migration');
    }

    public function index() {
        if ($this->migration->latest() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "✅ Migrations completed successfully!\n";
        }
    }
    
    public function current() {
        echo "Current migration version: " . $this->migration->current() . "\n";
    }
    
    public function force() {
        // Force re-run the migration by dropping and recreating the view
        $this->db->query("DROP VIEW IF EXISTS view_insurance_auto_calculation;");
        
        // Load and execute the migration file directly
        $migration_file = APPPATH . 'migrations/001_create_insurance_view.php';
        if (file_exists($migration_file)) {
            include_once($migration_file);
            $migration = new Migration_Create_insurance_view();
            $migration->up();
            echo "✅ View force updated successfully!\n";
        } else {
            echo "❌ Migration file not found!\n";
        }
    }
}
