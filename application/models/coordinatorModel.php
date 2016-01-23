<?php

class coordinatorModel extends CI_Model {

	public function loginCoordinator($account)
	{
			$user_id = $account['user_id'];
			$password = $account['password'];
			$this->db->select('user_id,password');
			$this->db->where('user_id like binary "'. $user_id . '" and password like binary "' . $password . '"');
			$this->db->from('Account');
			return $this->db->count_all_results();
	}

	// public function registerCoordinator($coordinator,$account,$status)
	// {
	// 		$this->db->insert('Account',$account);
	// 		$this->db->insert('Coordinator',$coordinator);
	// 		$this->db->insert('Coordinator_Status',$status);
	// 		return $this->db->affected_rows();
	// }


	public function getCoordinatorAccount($user_id)
	{
			$this->db->where('user_id',$user_id);
			$query = $this->db->get('Account');
			return $query->result();
	}

	public function getCoordinatorID($user_id)
	{
			$this->db->select('coordinator_id');
			$this->db->where('user_id',$user_id);
			$query = $this->db->get('Coordinator');
			return $query->result();
	}

	public function getAnnouncements()
	{
			$this->db->select('*');
			$query = $this->db->get('Announcement');
			return $query->result();
	}


	public function postAnnouncement($data)
	{
			$this->db->insert('Announcement',$data);
			return $this->db->affected_rows();
	}

	public function updateAnnouncement($id,$data)
	{
			$this->db->where('announcement_id',$id);
			$this->db->update('Announcement',$data);
			return $this->db->affected_rows();
	}

	public function getAllCompany()
	{
			$this->db->where('approved_by_coordinator',1);
			$query = $this->db->get('Company');
			return $query->result();
	}

	public function getNewCompanies()
	{
			$this->db->where('approved_by_coordinator',0);
			$query = $this->db->get('Company');
			return $query->result();
	}

	public function getCompany($id)
	{
			$this->db->where('company_id',$id);
			$query = $this->db->get('Company');
			return $query->result();
	}
	public function addCompany($data)
	{
			$this->db->insert('Company',$data);
			return $this->db->affected_rows();
	}

	public function getStudentAttachedFile()
	{
			$this->db->order_by('attached_file_id', 'DESC');
			$this->db->where('status','pending');
			$query = $this->db->get('Student_Attached_File');
			return $query->result();
	}

	public function approveForm($id)
	{
			$data = array(
				'status' => 'approved'
			);
			$this->db->where('attached_file_id',$id);
			$this->db->update('Student_Attached_File',$data);
			return $this->db->affected_rows();
	}

	public function rejectForm($id)
	{
			$data = array(
				'status' => 'rejected'
			);
			$this->db->where('attached_file_id',$id);
			$this->db->update('Student_Attached_File',$data);
			return $this->db->affected_rows();
	}

	// public function addAssessment($data)
	// {
	// 	$this->db->truncate('Student_Assessment');
	// 	$this->db->insert_batch('Student_Assessment', $data);
	// 	return $this->db->affected_rows();
	// }

	public function addAssessment($data)
	{
		$this->db->insert('Student_Assessment',$data);
		return $this->db->affected_rows();
	}


	public function getAcceptedStudents()
	{
			$this->db->select('Account.lastname, 
			Account.firstname,Account.middle_initial,Student.student_id,
			Student.course,Student.major,Student.user_id,Company.company_name,
			Company.company_address,Cert_of_Acceptance.date_start,Evaluator.evaluator_id');
			$this->db->from('Student');
			$this->db->join('Cert_of_Acceptance','Student.student_id = Cert_of_Acceptance.student_id');
			$this->db->join('Account','Student.user_id = Account.user_id');
			$this->db->join('Company','Cert_of_Acceptance.company_id = Company.company_id');
			$this->db->join('Evaluator','Company.company_id = Evaluator.company_id');
			$query = $this->db->get();
			return $query->result();
	}

	public function getEvaluatorName($evaluator_id)
	{
			$this->db->select('a.firstname, a.lastname');
			$this->db->from('Evaluator e');
			$this->db->join('Account a','a.user_id = e.user_id');
			$this->db->where('e.evaluator_id',$evaluator_id);
			$query = $this->db->get();
			return $query->result();
	}

	public function getStudentSched($student_id)
	{
		$this->db->where('student_id',$student_id);
		$query = $this->db->get('Student_Sched');
		return $query->result();
	}

	//STUDENT PROGRAM EVALUATION

	public function getStudentProgramEvaluationList()
	{
		$query = $this->db->get('Student_Program_Evaluation');
		return $query->result();
	}

	public function getStudentProgramEvaluationInfo($student_id)
	{
		$this->db->where('student_id',$student_id);
		$query = $this->db->get('Student_Program_Evaluation');
		return $query->result();
	}

	public function getStudentProgramEvaluationCourses($student_id)
	{
		$this->db->where('student_id',$student_id);
		$query = $this->db->get('Course');
		return $query->result();
	}


	public function updateStudentProgEvalCourseGrade($course_id,$data)
	{
		$this->db->where('course_id',$course_id);
		$this->db->update('Course',$data);
		return $this->db->affected_rows();
	}

	public function checkIfHasDeficiencies($student_id)
	{
		$deficiencies = array('DRP', 'INC', '5.00');
		
		$this->db->where_in('course_grade', $deficiencies);
		$this->db->from('Course');
		
		return $this->db->count_all_results();
	}

	public function updateStudentStatus($data,$student_id)
	{
		$this->db->where('student_id',$student_id);
		$this->db->update('Student_Program_Evaluation',$data);
		return $this->db->affected_rows();
	}

	public function updateStudentAverage($student_id)
	{
		$query = $this->db->query("UPDATE Student_Program_Evaluation SET avg_grade = 
						(SELECT (sum(course_grade * (course_unit_lec + course_unit_lab))) / (SUM(course_unit_lec) + SUM(course_unit_lab))as TOTAL FROM Course WHERE student_id = '12-12345')
						WHERE student_id = '12-12345';"
						);
		return $this->db->affected_rows();
	}
};