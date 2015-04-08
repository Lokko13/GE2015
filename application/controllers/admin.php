<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$is_logged_in_session = $this->session->userdata('is_logged_in');
		$is_admin = $this->session->userdata('is_admin');
		
		//check login session
		if(!isset($is_logged_in_session) || $is_logged_in_session != true){
			$this->session->set_flashdata('login_error', 'Forced entry! No login detected!');	
			redirect('login');
		}
		else if(!isset($is_admin) || $is_admin != true){
			//check to avoid college errors
			$this->load->model('active_sessions_model');
			$this->active_sessions_model->_removeSession($this->session->userdata('id'));
			$this->session->set_flashdata('login_error', 'User is not an admin! Current session destroyed. Please login again');
			redirect('login');
		}
	}

	function index(){
		$data['main_content'] = 'admin_home_view';
		$data['admin_name'] = $this->_getAdminName();
		$data['voteSummary'] = $this->_getVoteSummary();
		//vote tally
		$data['usg_pres_votes'] = $this->_getVotesFor('USG President');		
		$data['usg_vp_internal_votes'] = $this->_getVotesFor('VP Internals');
		$data['usg_vp_external_votes'] = $this->_getVotesFor('VP Externals');
		$data['usg_treasurer_votes'] = $this->_getVotesFor('Executive Treasurer');
		$data['usg_secretary_votes'] = $this->_getVotesFor('Executive Secretary');
		$data['stc_campus_pres_votes'] = $this->_getVotesFor('STC President');
		$data['stc_college_rep_votes'] = $this->_getVotesForCollegeReps();
		$data['stc_college_rep_abstain'] = $this->_getAbstainForCollegeReps();
		$data['stc_la_rep_votes'] = $this->_getVotesFor('Legislative Assembly Representative');

		$this->load->view('includes/template', $data);
	}

	/*
	function that gets all the active sessions in the db. Loads active sessions admin tools view
	*/
	function ActiveSessions(){
		$this->load->model('active_sessions_model');
		$data['main_content'] = 'admin_activesessions_view';
		$data['admin_name'] = $this->_getAdminName();
		$data['active_sessions'] = $this->active_sessions_model->_getActiveSessions();
		$this->load->view('includes/template', $data);	
	}

	/*
	function that loads the management tools home by default. Loads content depending on the 3rd segment of uri
	*/
	function ManagementTools(){
		switch($this->uri->segment(3)){ // gets string after "managementtools" segment in url
			//load content based on case
			case 'viewAdmin' : 
				$this->load->model('admin_model');
				$data['all_admin'] = $this->admin_model->_getAllAdmin();
				$tool = 'view_admin_view';
				break;
			case 'addAdmin' :
				$tool = 'add_admin_view';
				break;
			case 'removeAdmin' :
				$tool = 'remove_admin_view';
				break;

			case 'viewCandidate' : 
				$this->load->model('candidate_model');
				$data['all_candidate'] = $this->candidate_model->_getAllCandidates();
				$tool = 'view_candidate_view';
				break;
			case 'addCandidate' :
				$tool = 'add_candidate_view';
				break;
			case 'removeCandidate' :
				$tool = 'remove_candidate_view';
				break;

			case 'viewParty' : 
				$this->load->model('party_model');
				$data['all_party'] = $this->party_model->_getAllParty();
				$tool = 'view_party_view';
				break;
			case 'addParty' :
				$tool = 'add_party_view';
				break;
			case 'removeParty' :
				$tool = 'remove_party_view';
				break;
			default :
				$tool = 'default';
				break;
		}

		$data['main_content'] = 'admin_managementtools_home_view';
		$data['admin_name'] = $this->_getAdminName();
		$data['tool_view'] = 'management_tools/' . $tool;
		$this->load->view('includes/template', $data);	
	}

	/*
	function that loads the voter tools view
	*/
	function VoterTools(){
		$data['main_content'] = 'admin_votertools_home_view';
		$data['admin_name'] = $this->_getAdminName();
		$this->load->view('includes/template', $data);	
	}

	/*
	function that returns the currently logged in admin's name
	*/
	function _getAdminName(){
		$this->load->model('admin_model');
		$x = $this->admin_model->_getAdmin($this->session->userdata('id'));
		return $x->first_name . " " . $x->last_name;
	}

	//FUNCTION TO GET TALLY OF VOTES
	
	/*
	function to get the total vote summary and of each college
	*/
	function _getVoteSummary(){ // votes summary isn't dynamic based on colleges, more on hard coded and i feel bad
		$this->load->model('voter_model');
		$arr = array(
			'totalVotes' => $this->voter_model->_getTotalVotes(),
			'totalVoters' => $this->voter_model->_getTotalVoters(),
			//CCS
			'CCStotalVoters' => $this->voter_model->_totalVotersOf('CCS'),
			'CCStotalVotes' => $this->voter_model->_totalVotesOf('CCS'),
			//CLA
			'CLAtotalVoters' => $this->voter_model->_totalVotersOf('CLA'),
			'CLAtotalVotes' => $this->voter_model->_totalVotesOf('CLA'),
			//COB
			'COBtotalVoters' => $this->voter_model->_totalVotersOf('RVR-COB'),
			'COBtotalVotes' => $this->voter_model->_totalVotesOf('RVR-COB'),
			//COE
			'COEtotalVoters' => $this->voter_model->_totalVotersOf('GCOE'),
			'COEtotalVotes' => $this->voter_model->_totalVotesOf('GCOE'),
		);
		//should array_push for each exissting school
		return $arr;
	}

	/*
	function that returns an array containing the candidate an hist number of votes and party of a given position
	*/
	function _getVotesFor($position){
		$arr = array();
		$this->load->model('voter_model');
		$this->load->model('candidate_model');
		$this->load->model('party_model');

		$candidates = $this->candidate_model->_getCandidatesFor($position); //returns candidates for specified position

		//for existing candidates
		foreach($candidates as $candidate){
			$details = $this->voter_model->_getVoter($candidate->ID);
			$p = $this->party_model->_getCandidateParty($candidate->ID);
			$x = array(
				'name' => $details->first_name . " " . $details->last_name,
				'votes' => $this->candidate_model->_numberOfVotesFor($candidate->ID),
				'party' => $p->party_name
			);
			array_push($arr, $x);
		}
		
		//for abstain votes
		$this->load->model('abstain_model');
		$x = array(
			'name' => 'Abstains',
			'votes' => $this->abstain_model->_getNumberOfAbstainOn($position)
		);
		array_push($arr, $x);

		return $arr;
	}

	/*
	function that returns an array containing the candidate an hist number of votes and party for all college reps
	*/
	function _getVotesForCollegeReps(){
		$arr = array();
		$this->load->model('voter_model');
		$this->load->model('candidate_model');
		$this->load->model('abstain_model');
		$this->load->model('party_model');

		$candidates = $this->candidate_model->_getCandidatesFor('%Representative');

		//for existing candidates
		foreach($candidates as $candidate){
			//candidate
			$c = $this->candidate_model->_getCandidate($candidate->ID);
			$p = $this->party_model->_getCandidateParty($candidate->ID);
			//get all except LA rep
			if($c->position != "Legislative Assembly Representative"){
				$details = $this->voter_model->_getVoter($candidate->ID);
				$x = array(
					'name' => $details->first_name . " " . $details->last_name,
					'votes' => $this->candidate_model->_numberOfVotesFor($candidate->ID),
					'position' => $c->position,
					'party' => $p->party_name
				);
				array_push($arr, $x);	
			}
			
		}
		return $arr;
	}

	/*
	function that returns an array containing abstains for each college rep
	*/
	function _getAbstainForCollegeReps(){
		$arr = array();
		$this->load->model('candidate_model');
		$this->load->model('abstain_model');
		
		$candidates = $this->candidate_model->_getCandidatesFor('%Representative'); //this is hax lels

		//for existing candidates
		foreach($candidates as $candidate){
			//candidate
			$c = $this->candidate_model->_getCandidate($candidate->ID);

			//get all except LA rep
			if($c->position != "Legislative Assembly Representative"){
				$abstains = $this->abstain_model->_getNumberOfAbstainOn($c->position);

				$x = array(
					'name' => $c->position,
					'votes' => $abstains
				);
				array_push($arr, $x);	
			}
		}
		return array_unique($arr, SORT_REGULAR);
	}
}