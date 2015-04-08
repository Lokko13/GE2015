<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	/*
	this function authenticates if the login credentials are valid for an admin user
	*/
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

	/*
	this funnction returns the admin whos id is $id
	*/
	function _getAdmin($id){
		$this->db->where('admin_id', $id);
		$q = $this->db->get('admin');
		return $q->row();	
	}

	/*
	this function returns all the admins of the system
	*/
	function _getAllAdmin(){
		$q = $this->db->get('admin');
		return $q->result();	
	}

	/*
	TODO
	*/
	function _addAdmin(){
		return;
	}

	/*
	TODO
	*/
	function _removeAdmin(){
		return;
	}
}