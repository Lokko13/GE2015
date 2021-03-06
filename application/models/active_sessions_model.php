<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Active_Sessions_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	/*
	Adds an active session into the database
	*/
	function _addSession($id){
		$arr = array(
			'session_id' => md5($id), //session id is the hash of the already unique user id
			'user_id' => $id,
			'session_ip_address' => $_SERVER['REMOTE_ADDR'], //ip address where he user logged in
			'timestamp' => time() //current time
		);
		$this->db->insert('active_sessions', $arr);
	}

	/*
	update the session with new ip and time stamp. This is for admin users
	*/
	function _updateSession($id){
		$arr = array(
			'session_ip_address' => $_SERVER['REMOTE_ADDR'],
			'timestamp' => time()
		);
		$this->db->where('session_id', md5($id));
		$this->db->where('user_id', $id);
		$this->db->update('active_sessions', $arr);
	}

	/*
	remove the session that matches the session and user id
	*/
	function _removeSession($id){
		$this->db->where('session_id', md5($id));
		$this->db->where('user_id', $id);
		$this->db->delete('active_sessions');
	}

	/*
	this returns all the active sessions in the db
	*/
	function _getActiveSessions(){
		$q = $this->db->get('active_sessions');
		return $q->result();
	}

	/*
	this returns a session that matches the id
	*/
	function _getSession($id){
		$this->db->where('session_id', md5($id));
		$this->db->where('user_id', $id);
		$q = $this->db->get('active_sessions');
		return $q->row();	
	}

	/*
	this checks if the session of the user is active
	*/
	function _isSessionActive($id){
		$this->db->where('session_id', md5($id));
		$this->db->where('user_id', $id);

		$q = $this->db->get('active_sessions');

		if($q->num_rows == 1){
			return true;
		}
		else{
			return false;
		}
	}
}