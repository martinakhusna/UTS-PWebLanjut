<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . 'libraries/Rest_Controller.php';
require APPPATH . 'libraries/Format.php';

class paket extends REST_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_paket','paket');
    }

    public function index_get()
    {
        $id = $this->get('id_paket');
        if($id === null){
            $paket = $this->paket->getPaket();
        }else{
            $paket = $this->paket->getPaket($id);
        }

        if($paket){
            $this->response([
                'status' => true,
                'data' => $paket
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete(){
        $id = $this->delete('id_paket');

        if($id===null){
            $this->response([
                'status' => false,
                'message' => 'Provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
            if($this->paket->deletePaket($id) > 0) {
                $this->response([
                    'status' => true,
                    'id_paket' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post(){
        $data = [
            'nama_paket' => $this->post('nama_paket'),
            'harga' => $this->post('harga'),
        ];

        if($this->paket->createPaket($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'new paket has been created'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put(){
        $id = $this->put('id_paket');
        $data = [
            'nama_paket' => $this->put('nama_paket'),
            'harga' => $this->put('harga'),
        ];

        if($this->paket->updatePaket($data, $id) > 0){
            $this->response([
                'status' => true,
                'message' => 'data paket has been updated'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }







    

}




?>