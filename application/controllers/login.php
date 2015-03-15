<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$x = $this->session->userdata('id');
		if( $x != ""){
			$this->load->model('active_sessions_model');
			$this->active_sessions_model->_removeSession($x);
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('is_logged_in');	
			$this->session->unset_userdata('is_admin');	
			$this->session->unset_userdata('college');			
			$this->session->sess_destroy();
		}
	}
	
	public function index()	{
		$data['main_content'] = 'login_view';
		$this->load->view('includes/template', $data);
	}

	public function signInSubmit(){
		//form validation rules
		$this->form_validation->set_rules('inputStudentID','Student ID','trim|required|xss_clean');
		$this->form_validation->set_rules('inputPassword','Password','trim|required|xss_clean');

		//on valid form
		if($this->form_validation->run()){
			$id = $this->input->post('inputStudentID');
			$pass = $this->input->post('inputPassword');
			$this->load->model('active_sessions_model');
			$this->load->model('admin_model');
			$this->load->model('voter_model');		

			if($this->admin_model->_authenticate($id, $pass)){//authenticate if user is an admin
				//create session;
				$admin_sess = array(
					'id' => $id,
					'is_logged_in' => true,
					'is_admin' => true
				);
				$this->session->set_userdata($admin_sess);//set sessiondata
				$this->active_sessions_model->_addSession($id);//insert session in db for tracking
				redirect('admin');//go to admin homepage
			}
			else if($this->voter_model->_authenticate($id, $pass)){//authenticate if user is a voter
				//check if user is still valid for voting
				if(!$this->voter_model->_isVoted($id)){
					//get voter etails
					$voter = $this->voter_model->_getVoter($id);
					//save voter session
					$voter_sess = array(
						'id' => $voter->voter_id,
						'is_logged_in' => true,
						'college' => $voter->college,
						'is_admin' => false
					);
					$this->session->set_userdata($voter_sess);//set sessiondata
					$this->active_sessions_model->_addSession($id);//insert session in db for tracking
					redirect('voter');//go to voter homepage	
				}
				else{
					$this->session->set_flashdata('login_error', 'This ID has already voted!');
					redirect($this);
				}
			}
			else{//user doesnt exit
				$this->session->set_flashdata('login_error', 'Incorrect ID or password! Please contact a comelec official');
				redirect($this);
			}
		}
		else{
			$this->session->set_flashdata('login_error', validation_errors());
			redirect($this);
		}
	}
}