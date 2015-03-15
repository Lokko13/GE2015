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

		if($row->isVoted == "Y"){
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

	function _Vote($curr_user, $postdata){
		//abstain vote values
		$abstain_val = ['pabstain', 'viabstain', 'veabstain', 'tabstain', 'sabstain', 'cpabstain', 'crabstain', 'la1Abstain', 'la2Abstain'];
		
		$this->load->model('candidate_model');
		$this->load->model('abstain_model');

		//prepare array into a list of candidate_id and abstains. Fixes LA Rep
		$voted_id = $this->_preProcessVotes($postdata);

		$cast_vote = array();

		//loop through ballot votes
		foreach($voted_id as $voted_candidate){ //voted candidate is candidate id
			//get candidate position
			$thisCandidate = $this->candidate_model->_getCandidate($voted_candidate);
			

			if(in_array($voted_candidate, $abstain_val)){
				//check if abstained on position
				$c = $this->session->userdata('college');
				$this->abstain_model->_addAbstainVote($curr_user, $voted_candidate, $c); //voter_id, position abstained, user college
			}
			else{
				//add vote to candidate
				$x = array(
					'voter_id' => $curr_user,
					'candidate_id' => $voted_candidate,
					'position' => $thisCandidate->position
				);
				array_push($cast_vote, $x);
			}
		}
		if(count($cast_vote) > 0){
			$this->db->insert_batch('votes_for',$cast_vote);
		}
		
		//update voted status
		$this->db->where('voter_id', $curr_user);
		$this->db->update('voter', array('isVoted' => 'Y'));
	}

	function _preProcessVotes($data){
		$processed = array();

		foreach($data as $x){//This could be recursion
			if( is_array($x) ){ //LA rep
				foreach($x as $inner){
					array_push($processed, $inner);
				}
			}
			else{
				array_push($processed, $x);
			}
		}
		return $processed;
	}

	function _addVoter(){
		return;
	}

	function _removeVoter(){
		return;
	}
}