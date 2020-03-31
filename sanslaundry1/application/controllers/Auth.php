<?php

class Auth extends CI_Controller {

	
	public function index()
	{
		if($this->is_logged()){
			
			redirect('admin/selamat');
		}

		$this->load->view('login');

		
		$isi['username'] = $this->session->userdata('username');
	}
	public function is_logged()
	{
		$is_login = $this->session->userdata('is_login');
	}

	public function register(){
		$data['title'] = "Register";
		$this->load->view('admin/regist/register', $data);
	}

	public function register_simpan(){
		$data['title'] = "Register";
		$this->load->view('admin/regist/register', $data);
	}

	public function cek_login()
	{
		$post = $this->input->post(null, TRUE);
		$this->load->model('model_user');
		$hasil = $this->model_user->login($post);
		if ($hasil->num_rows() > 0){
		    $row = $hasil->row();
		    $params = array(
		        'id_user' => $row->id_user,
		        'username' => $row->username,
		        'nama_usr' => $row->nama_usr,
		        'level' => $row->level,
		        'status' => $row->status
		    );
		    
		    
			if ($row->level == 'admin'){
				echo "<script>
                    alert('Selamat Admin anda berhasil login');
                    window.location='" . base_url('admin') . "';
                </script>";
                $this->session->set_userdata($params);
			}
			elseif (($row->level == 'super') && ($row->status == 'aktif')){
				echo "<script>
                    alert('Selamat anda berhasil login');
                    window.location='" . base_url('admin') . "';
                </script>";
                $this->session->set_userdata($params);
			}else{
				echo "<script>
                    alert('Mohon hubungi admin untuk mengaktifkan akun');
                    window.location='" . base_url('auth') . "';
                </script>";
			}
		}
		else
		{
			echo "<script>
                    alert('Login Gagal, email/password salah');
                    window.location='" . site_url('auth') . "';
                </script>";
		}
		
	}


}


?>