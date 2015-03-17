<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function _getCandidatesFor($position){
		$query = "SELECT DISTINCT candidate.candidate_id AS ID, voter.first_name AS FName, voter.last_name AS LName, party.party_id AS porder
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
		
		//remove this switch case pag na fix na db, retrieve nalang sana using yun ID tas dun base yun $voterCollege
		switch($college){
			case "CCS" : 
				$voterCollege = "CCS Representative";
				break;
			case "CLA" : 
				$voterCollege = "CLA Representative";
				break;
			case "COS" : 
				$voterCollege = "";
				break;
			case "GCOE" : 
				$voterCollege = "COE Representative";
				break;
			case "RVR-COB" : 
				$voterCollege = "COB Representative";
				break;
			case "SOE" : 
				$voterCollege = "";
				break;
		}


		$query = "SELECT candidate.candidate_id AS ID, voter.first_name AS FName, voter.last_name AS LName, party.party_id AS porder
					FROM voter, candidate, party_candidate, party
					WHERE voter.voter_id = candidate.candidate_id
						AND candidate.candidate_id = party_candidate.candidate_id
						AND party_candidate.party_id = party.party_id
						AND candidate.position LIKE ?
					ORDER BY porder";
		
		$q = $this->db->query($query, $voterCollege);

		return $q->result();
	}

	function _getCandidate($id){
		$this->load->model('voter_model');

		$this->db->where('candidate_id', $id);
		$q = $this->db->get('candidate');
		return $q->row();	
	}

	function _getAllCandidates(){
		$candidate_list = array();

		$q = $this->db->get('candidate');
		$candidates = $q->result();

		$this->load->model('voter_model');
		$this->load->model('party_model');

		foreach($candidates as $candid){
			$x = $this->voter_model->_getVoter($candid->candidate_id);
			$party = $this->party_model->_getCandidateParty($candid->candidate_id);
			$arr = array(
				'candidate_id' => $candid->candidate_id,
				'position' => $candid->position,
				'name' => $x->first_name . " " . $x->last_name,
				'party' => $party
			);
			array_push($candidate_list, $arr);
		}

		return $candidate_list;
	}

	function _numberOfVotesFor($id){
		$this->db->where('candidate_id', $id);
		$q = $this->db->get('votes_for');
		return $q->num_rows();
	}

	function _addCandidate(){
		return;
	}

	function _removeCandidate(){
		return;
	}
}