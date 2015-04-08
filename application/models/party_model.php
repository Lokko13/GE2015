<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Party_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	/*
	this function returns the party details with id same as $id
	*/
	function _getParty($id){
		$this->db->where('party_id', $id);
		$q = $this->db->get('party');
		return $q->row();	
	}

	/*
	This function returns all the party in the db
	*/
	function _getAllParty(){
		$q = $this->db->get('party');
		return $q->result();	
	}

	/*
	this function returns the party details of a given candidate
	*/
	function _getCandidateParty($id){
		$this->db->where('candidate_id', $id);
		$q = $this->db->get('party_candidate');
		$party = $q->row();

		return $this->_getParty($party->party_id);
	}

	/*
	TODO
	*/
	function _addParty(){
		return;
	}

	/*
	TODO
	*/
	function _removeParty(){
		return;
	}
}