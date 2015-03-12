<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function _getCandidatesFor($position){
		
	}

	function _getCandidate($id){
		$this->db->where('candidate_id', $id);
		$q = $this->db->get('candidate');
		return $q->row();	
	}

	function _addCandidate(){
		return;
	}

	function _removeCandidate(){
		return;
	}
}