<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  
class Model_paket extends CI_model {

	
	public function getdata($key)
	{
		$this->db->where('id_paket',$key);
		$hasil = $this->db->get('paket');
		return $hasil;
	}
	public function getupdate($key,$data)
	{
		$this->db->where('id_paket',$key);
		$this->db->update('paket', $data);
	}	
		public function getinsert($data)
	{
		$this->db->insert('paket',$data);
	}	
	public function getdelete($key)
	{
		$this->db->where('id_paket',$key);
		$this->db->delete('paket');
	}	


	///////////////////////////////////////////////////
						//API
	///////////////////////////////////////////////////
	
	public function getPaket($id = null){
        if($id == null){
            return $this->db->get('paket')->result_array();
        }else{
            return $this->db->get_where('paket', ['id_paket'=>$id])->result_array();
        }
    }

    public function deletePaket($id){
        $this->db->delete('paket',['id_paket' => $id]);
        return $this->db->affected_rows();
    }

    public function createPaket($data){
        $this->db->insert('paket', $data);
        return $this->db->affected_rows();
    }

    public function updatePaket($data, $id){
        $this->db->update('paket', $data, ['id_paket' => $id]);
        return $this->db->affected_rows();
    }
	
}
