<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function _getCandidatesFor($position){
		$query = "SELECT candidate.candidate_id AS ID, voter.first_name AS FName, voter.last_name AS LName, party.party_id AS porder
					FROM voter, candidate, party_candidate, party
					WHERE voter.voter_id = candidate.candidate_id
						AND candidate.candidate_id = party_candidate.candidate_id
						AND party_candidate.party_id = party.party_id
						AND candidate.position LIKE ?
					ORDER BY porder";

		$q = $this->db->query($query, $position);

		return $q->result();
	}

	function _getCollegeRep($college){
		return;
	}

	function _getCandidate($id){
		$this->load->model('voter');

		//return candidate array with name TODO
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