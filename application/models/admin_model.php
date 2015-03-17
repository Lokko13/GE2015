<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function _authenticate($id, $pass){
		//fitler user input
		$this->db->where('admin_id', $id);
		$this->db->where('password', $pass);

		//check admin existance
		$q = $this->db->get('admin');
		
		if($q->num_rows == 1){
			return true;
		}
		else{
			return false;
		}
	}

	function _getAdmin($id){
		$this->db->where('admin_id', $id);
		$q = $this->db->get('admin');
		return $q->row();	
	}

	function _getAllAdmin(){
		$q = $this->db->get('admin');
		return $q->result();	
	}

	function _addAdmin(){
		return;
	}

	function _removeAdmin(){
		return;
	}
}