<?php defined('BASEPATH') OR exit('No direct script access allowed');

USE Dompdf\Dompdf;
CLASS Pdf extends Dompdf{
    /**
     * PDF Filename
     * @var String
     */
    PUBLIC $filename;
    PUBLIC function __construct(){
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     * 
     * @access protected
     * @return void
     */
    protected function ci(){
        return get_instance();
    }

    public function load_view($view, $data = array()){
        $html = $this->ci()->load->view($view, $data, TRUE);
        $this->load_html($html);
        // render the PDR
        $this->render();
            // Output the generated PDF to Browser
                $this->stream($this->filename, array("Attachment" => false));
    }
}