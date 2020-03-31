<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('mahasiswa_model');
        $this->load->model('cetak_model');
        //$this->load->library('session');

        // validasi level
        if($this->session->userdata('level')!="user"){
           
           redirect('login','refresh');
            
        }
    }

    public function index(){

        $curl = curl_init();                                                                            // untuk inisialisasi curl library
        curl_setopt($curl, CURLOPT_URL, 'http://localhost/new/sanslaundry1/api/paket');                 // untuk mengatur opsi-opsi curl
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);                                                  
        $result = curl_exec($curl);                                                                     // untuk mengeksekusi query curl
        $data['data_paket'] = json_decode($result, TRUE);
        curl_close($curl);                                                                              // untuk menghentikan curl system.

        $data += array(
            'title' => 'Client Sans Laundry',
            'mahasiswa' => $this->mahasiswa_model->datatabels()
        );
        $this->load->view('template/header_datatabels_user',$data);
        $this->load->view('mahasiswa/user',$data);
        $this->load->view('template/footer_datatabels_user');
    }

    public function laporan_pdf(){
        $this->load->library('pdf');

        $data['mahasiswa']= $this->cetak_model->view();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-petanikode.pdf";
        $this->pdf->load_view('mahasiswa/laporan', $data);
    }
}

/* End of file Controllername.php */
?>