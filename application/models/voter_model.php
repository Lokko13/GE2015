<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function _authenticate($id, $pass){
		//fitler user input
		$this->db->where('voter_id', $id);
		$this->db->where('password', $pass);

		//check admin existance
		$q = $this->db->get('voter');
		
		if($q->num_rows == 1){
			return true;
		}
		else{
			return false;
		}
	}

	function _isVoted($id){
		//filter with id
		$row = $this->_getVoter($id);

		if($row->voting == "Y"){
			return true;
		}
		else{
			return false;
		}
	}

	function _getVoter($id){
		$this->db->where('voter_id', $id);
		$q = $this->db->get('voter');
		return $q->row();	
	}

	function _addVoter(){
		return;
	}

	function _removeVoter(){
		return;
	}
}