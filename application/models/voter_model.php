<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	/*
	this function authenticates if the login credentials are valid for a voter
	*/
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

	/*
	This function returns the total number of voters of a given college 
	*/
	function _totalVotersOf($college){ //voters
		$this->db->where('college', $college);
		$q = $this->db->get('voter');
		return $q->num_rows();
	}

	/*
	This function returns the casted votes of a given $college
	*/
	function _totalVotesOf($college){ //votes
		$this->db->where('college', $college);	
		$this->db->where('isVoted', "Y");
		$q = $this->db->get('voter');
		return $q->num_rows();
	}

	/*
	this function returns if the given $id has already voted
	*/
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

	/*
	this function returns the voter that matches the $id
	*/
	function _getVoter($id){
		$this->db->where('voter_id', $id);
		$q = $this->db->get('voter');
		return $q->row();	
	}

	/*
	This function is called when the users cast their vote
	*/
	function _Vote($curr_user, $postdata){
		//abstain vote values
		$abstain_val = array('pabstain', 'viabstain', 'veabstain', 'tabstain', 'sabstain', 'cpabstain', 'crabstain', 'la1Abstain', 'la2Abstain');
		
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

	/*
	pre process votes ino a single dimension array
	*/
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

	/*
	This funnction returns the total number of casted votes
	*/
	function _getTotalVotes(){
		$this->db->where('isVoted', 'Y');
		$q = $this->db->get('voter');
		return  $q->num_rows();
	}

	/*
	This function returns the total number of voters
	*/
	function _getTotalVoters(){
		$q = $this->db->get('voter');
		return  $q->num_rows();
	}

	/*
	TODO
	*/
	function _addVoter(){
		return;
	}

	/*
	TODO
	*/
	function _removeVoter(){
		return;
	}
}