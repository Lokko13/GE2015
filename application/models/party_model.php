<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Party_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function _getParty($id){
		$this->db->where('party_id', $id);
		$q = $this->db->get('party');
		return $q->row();	
	}

	function _getAllParty(){
		$q = $this->db->get('party');
		return $q->result();	
	}

	function _getCandidateParty($id){
		$this->db->where('candidate_id', $id);
		$q = $this->db->get('party_candidate');
		$party = $q->row();

		return $this->_getParty($party->party_id);
	}

	function _addParty(){
		return;
	}

	function _removeParty(){
		return;
	}
}