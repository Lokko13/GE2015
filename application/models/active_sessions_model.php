<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Active_Sessions_Model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}

	function _addSession($id){
		$arr = array(
			'session_id' => md5($id),
			'user_id' => $id,
			'session_ip_address' => $_SERVER['REMOTE_ADDR'],
			'timestamp' => time()
		);
		$this->db->insert('active_sessions', $arr);
		return;
	}

	function _updateSession($id){
		$arr = array(
			'session_ip_address' => $_SERVER['REMOTE_ADDR'],
			'timestamp' => time()
		);
		$this->db->where('session_id', md5($id));
		$this->db->where('user_id', $id);
		$this->db->update('active_sessions', $arr);
	}

	function _removeSession($id){
		$this->db->where('session_id', md5($id));
		$this->db->where('user_id', $id);
		$this->db->delete('active_sessions');
	}

	function _getActiveSessions(){
		$q = $this->db->get('active_sessions');
		return $q->result();
	}

	function _getSession($id){
		$this->db->where('session_id', md5($id));
		$this->db->where('user_id', $id);
		$q = $this->db->get('active_sessions');
		return $q->row();	
	}

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