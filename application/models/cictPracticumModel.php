<?php

class cictPracticumModel extends CI_Model {

	public function loginAccount($account)
	{
			$user_id = $account['user_id'];
			$password = $account['password'];
			$this->db->select('position');
			$this->db->where('user_id like binary "'. $user_id . '" and password like binary "' . $password . '"');
			$query = $this->db->get('Account');
			return $query->result();
	}

	
	public function getStudentAssessment()
	{
			$query = $this->db->get('Student_Assessment');
			return $query->result();
	}
};