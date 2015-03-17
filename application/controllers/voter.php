<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter extends CI_Controller {

	function __construct(){
		parent::__construct();
		//login and college sessions
		$is_logged_in_session = $this->session->userdata('is_logged_in');
		$college_session = $this->session->userdata('college');
		
		//check login session
		if(!isset($is_logged_in_session) || $is_logged_in_session != true){
			$this->session->set_flashdata('login_error', 'Forced entry! No login detected!');	
			redirect('login');
		}
		else if(!isset($college_session) || $college_session == ""){
			//check to avoid college errors
			$this->load->model('active_sessions_model');
			$this->active_sessions_model->_removeSession($this->session->userdata('id'));
			$this->session->set_flashdata('login_error', 'College not detected, forcibly logged out! Contact an Comelec Officer');	
			redirect('login');
		}

		$this->load->model('voter_model');
		$this->load->model('candidate_model');

	}

	function index(){
		//view
		$data['main_content'] = 'voter_home_view';
		//session data
		$data['studentName'] = $this->_getStudentName($this->session->userdata('id'));
		$data['college'] = $this->session->userdata('college');
		//candidates
		$data['usg_pres'] = $this->candidate_model->_getCandidatesFor('USG President');
		$data['usg_vp_internal'] = $this->candidate_model->_getCandidatesFor('VP Internals');
		$data['usg_vp_external'] = $this->candidate_model->_getCandidatesFor('VP Externals');
		$data['usg_treasurer'] = $this->candidate_model->_getCandidatesFor('Executive Treasurer');
		$data['usg_secretary'] = $this->candidate_model->_getCandidatesFor('Executive Secretary');
		$data['stc_campus_pres'] = $this->candidate_model->_getCandidatesFor('STC President');
		$data['stc_college_rep'] = $this->_get_STC_CollegeRep($this->session->userdata('college'));
		$data['stc_la_rep'] = $this->candidate_model->_getCandidatesFor('Legislative Assembly Representative');

		$this->load->view('includes/template', $data);
	}

	function _getStudentName($id){
		$voter = $this->voter_model->_getVoter($id);
		$fname = $voter->first_name;
		$lname = $voter->last_name;
		return "$fname $lname";
	}

	function submitVote(){
		$this->voter_model->_Vote($this->session->userdata('id'), $this->input->post());
		//logout the user
		
		//remove session in db
		$this->load->model('active_sessions_model');
		$this->active_sessions_model->_removeSession($this->session->userdata('id')); 

		//remove session
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('is_logged_in');	
		$this->session->unset_userdata('is_admin');	
		$this->session->unset_userdata('college');	
		$this->session->sess_destroy();
		
		$this->success();
	}

	function success(){
		//load view to show message
		$data['main_content'] = 'voter_success_view';
		$this->load->view('includes/template', $data);
		//redirect with delay
		header('refresh: 5; url=' . _controller_url() . 'logout');
	}

	function _get_STC_CollegeRep($college){
		return $this->candidate_model->_getCollegeRep($college);
	}
}