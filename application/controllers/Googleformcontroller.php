<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Googleformcontroller extends CI_Controller {

    public function saveFormData() {
        // Get form data from the Google Sheets script
        $data = json_decode(file_get_contents('php://input'), true);

        // Validate and process the data as needed
        // For simplicity, we will directly insert into the database

        // Load the CodeIgniter database library if not autoloaded
        $this->load->database();

        // Assuming you have a 'responses' table with fields corresponding to your form
        $this->db->insert('google_responses', $data);

        // Optionally, you can perform additional actions or return a response
        echo json_encode(['status' => 'success']);
    }
}
