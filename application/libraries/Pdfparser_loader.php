<?php
defined('BASEPATH') OR exit('No direct script access allowed');

spl_autoload_register(function ($class) {
    $prefix = 'Smalot\\PdfParser\\';
    $base_dir = FCPATH . 'application/libraries/pdfparser-master/src/Smalot/PdfParser/';

    // Check if the class uses the namespace prefix
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    // Get the relative class name
    $relative_class = substr($class, $len);

    // Replace namespace separator with directory separator in the relative class name
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // If the file exists, require it
    if (file_exists($file)) {
        require $file;
    }
});

require_once FCPATH . 'application/libraries/pdfparser-master/src/Smalot/PdfParser/Parser.php';

class Pdfparser_loader {

    private $parser;

    public function __construct() {
        $this->parser = new \Smalot\PdfParser\Parser();
    }

    public function parseFile($filePath) {
        return $this->parser->parseFile($filePath);
    }
}
