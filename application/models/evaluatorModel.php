<?php

class evaluatorModel extends CI_Model {


	public function addAccount($data)
	{
		$this->db->insert('Account',$data);
		return $this->db->affected_rows();
	}

	public function addEvaluator($data)
	{
		$this->db->insert('Evaluator',$data);
		return $this->db->insert_id();
	}

	public function getEvaluatorAccount($user_id)
	{
			$this->db->where('user_id',$user_id);
			$query = $this->db->get('Account');
			return $query->result();
	}

	public function getEvaluatorID($user_id)
	{
			$this->db->select('evaluator_id,company_id');
			$this->db->where('user_id',$user_id);
			$query = $this->db->get('Evaluator');
			return $query->result();
	}

	public function getEvaluatorPosition($user_id)
	{
			$this->db->select('evaluator_position');
			$this->db->where('user_id',$user_id);
			$query = $this->db->get('Evaluator');
			return $query->result();
	}

	public function getEvaluatorCompany($user_id)
	{
	 		$this->db->select('*');
			$this->db->from('Evaluator');
			$this->db->where('user_id',$user_id);
			$this->db->join('Company', 'Evaluator.company_id = Company.company_id');
			$query = $this->db->get();
			return $query->result();
	}

	public function getAllStudent()
	{
			$this->db->select('*');
			$this->db->from('Student');
			$this->db->join('Account', 'Student.user_id  = Account.user_id');
			$query = $this->db->get();
			return $query->result();
	}

	public function getAvailableStudents()
	{
			$this->db->select('Student.student_id,Account.lastname,Account.firstname,Account.middle_initial');
			$this->db->from('Student');
			$this->db->join('Account','Student.user_id = Account.user_id');
			$this->db->join('Cert_of_Acceptance','Cert_of_Acceptance.student_id = Student.student_id','left');
			$this->db->where('Cert_of_Acceptance.coa_id IS NULL');
			$query = $this->db->get();
			return $query->result();	
	}

	public function getStudentOjt($company_id)
	{
			$this->db->select('*');
			$this->db->from('Cert_of_Acceptance');
			$this->db->join('Student', 'Cert_of_Acceptance.student_id = Student.student_id');
			$this->db->join('Account', 'Account.user_id = Student.user_id');
			$this->db->join('Company','Cert_of_Acceptance.company_id = Company.company_id');
			$this->db->join('Student_Status','Student_Status.student_id = Student.student_id');
			$this->db->where('Cert_of_Acceptance.company_id',$company_id);
			$query = $this->db->get();
			return $query->result();
	}

	public function addStudent($data)
	{
			$this->db->insert('Cert_of_Acceptance',$data);
			return $this->db->insert_id();
	}


	public function loginEvaluator($account)
	{
			$user_id = $account['user_id'];
			$password = $account['password'];
			$this->db->select('user_id,password');
			$this->db->where('user_id like binary "'. $user_id . '" and password like binary "' . $password . '"');
			$this->db->from('Account');
			return $this->db->count_all_results();
	}



	
	public function addAttachedFile($data)
	{
		$this->db->insert('Attached_File',$data);
		return $this->db->affected_rows();
	}

	public function getAttachedFiles()
	{
		$query = $this->db->get('Attached_File');
		return $query->result();
	}

	public function checkUserID($user_id)
	{
		$this->db->select('user_id');
		$this->db->where('user_id',$user_id);
		$this->db->from('Account');
		return $this->db->count_all_results();
	}

	public function getAllCompany()
	{
		$this->db->where('approved_by_coordinator',1);
		$query = $this->db->get('Company');
		return $query->result();
	}

	public function addCompany($data)
	{
		$this->db->insert('Company',$data);
		return $this->db->insert_id();
	}
	
	public function addStudentSched($data)
	{
		$this->db->insert('Student_Sched',$data);
		return $this->db->affected_rows();
	}

	public function getStudentSched($student_id)
	{
		$this->db->where('student_id',$student_id);
		$query = $this->db->get('Student_Sched');
		return $query->result();
	}

	public function getEvaluatorInfo($evaluator_id)
	{
		$this->db->select('*');
		$this->db->from('Evaluator');
		$this->db->join('Account', 'Account.user_id = Evaluator.user_id');
		$this->db->where('Evaluator.evaluator_id',$evaluator_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function addEvaluation($data)
	{
		$this->db->insert('Evaluation_Form',$data);
		return $this->db->insert_id();
	}

	public function addCriteria($data)
	{
		$this->db->insert('Criteria',$data);
		return $this->db->affected_rows();
	}

	public function getStudentEvaluation($student_id)
	{
		$this->db->where('student_id',$student_id);
		$this->db->from('Evaluation_Form');
		return $this->db->count_all_results();
	}

	
};