<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_m extends CI_Model{
	public function showAllEmployee(){
	
		$query = $this->db->select(['id','firstname','lastname','email','image_path'])
                          ->where(['status'=>1])
                          ->get('users');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}

	public function addEmployee(){
		$field = array(
			'username'=>$this->input->post('txtuname'),
			'password'=>$this->input->post('pass'),
			'firstname'=>$this->input->post('txtfname'),
			'lastname'=>$this->input->post('txtlname'),
			'email'=>$this->input->post('txtemail'),
			'image_path'=>$this->input->post('file')
			);
		$this->db->insert('users', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

	public function editEmployee(){
		$id = $this->input->get('id');
		$this->db->where('id', $id);
		$query = $this->db->get('users');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function updateEmployee(){
		$id = $this->input->post('txtId');
		$field = array(
			'username'=>$this->input->post('txtuname'),
			'password'=>$this->input->post('pass'),
		'firstname'=>$this->input->post('txtfName'),
		'lastname'=>$this->input->post('txtlname'),
		'email'=>$this->input->post('txtemail')
		
		);
		$this->db->where('id', $id);
		$this->db->update('users', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}

  

	function deleteEmployee(){
		$id = $this->input->get('id');
        $this->db->set('status','status-1');
		$this->db->where('id', $id);
		$this->db->update('users');
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}