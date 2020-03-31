<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_user extends CI_Controller {
	public function index()
	{
        $isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/admin/data_user';
		$isi['data'] = $this->db->get('user')->result();
		$this->load->view('admin/tampilan_admin',$isi);

			
	}

    public function edit_user($id){
        $where = array('id_user'=> $id);
        $isi['user'] = $this->db->query("SELECT * FROM user us WHERE us.id_user='$id'")->result();
        $isi['nama_usr'] = $this->session->userdata('nama_usr');
		$isi['content'] = 'admin/admin/edit_user';
		$this->load->view('admin/tampilan_admin',$isi);
    }

    public function edit_user_simpan(){
        $this->load->model('user_model');
        $id = $this->input->post('id_user');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $level = $this->input->post('level');
        $status = $this->input->post('status');

        $data = array(
            'nama_usr' => $nama,
            'username' => $username,
            'level' => $level,
            'status' => $status
        );

        $where = array(
            'id_user' => $id
        );

        $this->user_model->edit_data($id, $data);
        echo "<script>
                    alert('data berhasil diubah!');
                    window.location='" . site_url('Data_user/index') . "';
                </script>";
        
    }

    public function delete($id){
        $this->load->model('user_model');
        $where = array('id_user' => $id);
        $this->user_model->delete_data($where, 'user');
            $this->session->set_flashdata('pesan','
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Data berhasil dihapus
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>');
        redirect('Data_user');
    }
}