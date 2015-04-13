<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Student_model extends CI_Model{
  function login($username, $password, $isadmin){
    $this -> db -> select('User_session_id, User_account, User_password');
    $this -> db -> from('user');
    $this -> db -> where('User_account', $username);
    $this -> db -> where('User_password', $password);
    $this -> db -> where('User_isadmin', $isadmin);
    $this -> db -> limit(1);

    $query = $this -> db -> get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }
 
  function update_student($username,$password,$data){
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $this->db->update('student', $data);
  }

  function search_database($adviser){
        $this->db->select('*');
        $this->db->from('adviser');
        $this->db->like('last_name', $adviser);
        $this->db->or_like('middle_name', $adviser);
        $this->db->or_like('first_name', $adviser);
        $this->db->or_like('level', $adviser);
        $this->db->or_like('specialization', $adviser);
        $query = $this->db->get();
       
        return $query;
        
  }

}

/* End of file student.php */
/* Location: ./application/models/student.php */