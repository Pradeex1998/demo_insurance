<?php

defined('BASEPATH') or exit('No direct script access allowed');

//require_once APPPATH . 'vendor\autoload.php';
require_once FCPATH . '/vendor/autoload.php';
use TCPDF as TCPDF;
class Tcpdf_lib extends TCPDF
{
    public function __construct($config = array())
    {
        parent::__construct($config);
        $this->SetLeftMargin(0);    // Adjust the left margin value (in millimeters)
        $this->SetRightMargin(0);
        $this->SetTopMargin(0);
        
    }
}
