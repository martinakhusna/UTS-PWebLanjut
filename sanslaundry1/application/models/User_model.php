<?php
 class User_model extends CI_Model{
  public function register($username, $fullname, $password, $status){
   // User data array
   $data = array(
    'nama_usr' => $fullname,
    'username' => $username,
    'password' => $password,
    'status' => $status
   );

   // Insert user
   return $this->db->insert('user', $data);
  }

  // Log user in
  public function login($username, $password){
   // Validate
   $this->db->where('username', $username);
   $this->db->where('password', $password);

   $result = $this->db->get('user');

   if($result->num_rows() == 1){
    return $result->row(0)->id;
   } else {
    return false;
   }
  }

  // Check username exists
  public function check_username_exists($username){
   $query = $this->db->get_where('user', array('username' => $username));
   if(empty($query->row_array())){
    return true;
   } else {
    return false;
   }
  }


  // Check email exists
  public function check_email_exists($email){
   $query = $this->db->get_where('user', array('email' => $email));
   if(empty($query->row_array())){
    return true;
   } else {
    return false;
   }
  }

  public function edit_data($id, $data){
    $this->db->where('id_user', $id);
    return $this->db->update('user', $data);
}   

public function delete_data($where, $table){
    $this->db->where($where);
    $this->db->delete($table);
}
 }