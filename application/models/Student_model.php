<?php

class Student_model extends CI_Model {

	public function loginStudent($account)
	{
			$user_id = $account['user_id'];
			$password = $account['password'];
			$this->db->select('user_id,password');
			$this->db->where('user_id like binary "'. $user_id . '" and password like binary "' . $password . '"');
			$this->db->from('Account');
			return $this->db->count_all_results();
	}

	public function registerStudent($student,$account,$status)
	{
			$this->db->insert('Account',$account);
			$this->db->insert('Student',$student);
			$this->db->insert('Student_Status',$status);
			return $this->db->affected_rows();
	}

	public function getStudent($student_id)
	{
			$this->db->where('student_id',$student_id);
			$query = $this->db->get('Student');
			return $query->result();
	}

	// public function getAssessedStudentID($student_id)
	// {
	// 		$this->db->where('student_id',$student_id);
	// 		$this->db->where('status','OK');
	// 		$this->db->from('Student_Assessment');
	// 		return $this->db->count_all_results();
	// }

	public function getAssessedStudentID($student_id)
	{
			$this->db->where('student_id',$student_id);
			$this->db->where('status','Qualified');
			$this->db->from('Student_Program_Evaluation');
			return $this->db->count_all_results();
	}



	public function getAvailableStudent()
	{
			$this->db->select('Account.lastname, Account.firstname,Account.middle_initial,Student.student_id');
			$this->db->from('Student');
			$this->db->join('Cert_of_Acceptance','Student.student_id = Cert_of_Acceptance.student_id');
			$this->db->join('Account','Student.user_id = Account.user_id');
			$query = $this->db->get();
			return $query->result();
	}
	public function getStudentCoA($student_id)
	{
			$this->db->select('*');
			$this->db->from('Cert_of_Acceptance');
			$this->db->join('Company', 'Company.company_id = Cert_of_Acceptance.company_id');
			$this->db->join('Student', 'Student.student_id = Cert_of_Acceptance.student_id');
			$this->db->where('Student.student_id',$student_id);
			$query = $this->db->get();
			return $query->result();
	}


	public function getStudentAccount($user_id)
	{
			$this->db->where('user_id',$user_id);
			$query = $this->db->get('Account');
			return $query->result();
	}

	public function getStudentStatus($student_id)
	{
			$this->db->where('student_id',$student_id);
			$query = $this->db->get('Student_Status');
			return $query->result();
	}

	public function getAllCompany()
	{
			$this->db->where('approved_by_coordinator',1);
			$query = $this->db->get('Company');
			return $query->result();
	}

	public function getCompany($id)
	{
			$this->db->where('company_id',$id);
			$query = $this->db->get('Company');
			return $query->result();
	}

	public function getFamilyBackground($student_id)
	{
		$this->db->where('student_id',$student_id);
		$query = $this->db->get('family_background');
		return $query->result();
	}

	public function getPersonalInformation($student_id)
	{
		$this->db->where('student_id',$student_id);
		$query = $this->db->get('personal_information');
		return $query->result();
	}

	public function getSchoolData($student_id)
	{
		$this->db->where('student_id',$student_id);
		$query = $this->db->get('school_data');
		return $query->result();
	}


	public function getStudentID($user_id)
	{
		$this->db->select('student_id');
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('Student');
		return $query->result();
	}


	public function getStudentsID($student_id)
	{
		$this->db->select('student_id');
		$this->db->where('student_id',$student_id);
		$this->db->from('Student');
		return $this->db->count_all_results();
	}

	public function getStudentsEmail($email)
	{
		$this->db->select('email');
		$this->db->where('email',$email);
		$this->db->from('Account');
		return $this->db->count_all_results();
	}

	public function getStudentsUserID($user_id)
	{
		$this->db->select('user_id');
		$this->db->where('user_id',$user_id);
		$this->db->from('Account');
		return $this->db->count_all_results();
	}
	

	public function getAnnouncements($student_id)
	{
		$this->db->where("seen_by !=",$student_id);
		$this->db->or_where("seen_by", NULL);
		$this->db->select('*');
		$this->db->order_by('announcement_id','DESC');
		$query = $this->db->get('Announcement');
		return $query->result();
	}

	public function seenAnnouncement($data,$id)
	{
		$this->db->where('announcement_id',$id);
		$this->db->update('Announcement',$data);
		return $this->db->affected_rows();
	}

	
	
	public function getAttachedFiles($user_id)
	{
		$this->db->where('user_id',$user_id);
		$query = $this->db->get('Student_Attached_File');
		return $query->result();
	}

	public function addAttachedFile($data)
	{
		$this->db->insert('Student_Attached_File',$data);
		return $this->db->affected_rows();
	}

	public function deleteAttachedFile($id)
	{
		$this->db->where('attached_file_id',$id);
		$this->db->delete('Student_Attached_File');
		return $this->db->affected_rows();
	}
	public function addLocation($data)
	{
		$this->db->insert('Student',$data);
		return $this->db->affected_rows();
	}

	public function addPersonal_Info($data)
	{
		$this->db->insert('Personal_Information',$data);
		return $this->db->affected_rows();
	}

	public function addFamily_Background($data)
	{
		$this->db->insert('Family_Background',$data);
		return $this->db->affected_rows();
	}

	public function getStudentEvaluation($student_id)
	{
		$this->db->select('e.evaluation_id,e.student_id,e.date_commenced,e.date_completed,e.comments,e.total_points,e.grade,e.equivalent,c.criteria_id,c.criteria_name,c.points_scored,c.remarks,er.evaluator_position,a.lastname,a.firstname');
		$this->db->from('Evaluation_Form e');
		$this->db->join('Criteria c','c.evaluation_id = e.evaluation_id');
		$this->db->join('Evaluator er','er.evaluator_id = e.evaluator_id');
		$this->db->join('Account a','a.user_id = er.user_id');
		$this->db->where('student_id',$student_id);
		$this->db->order_by('c.criteria_id','ASC');
		$query = $this->db->get();
		return $query->result();
	}


	public function getStudentOjt($student_id)
	{
			$this->db->select('*');
			$this->db->from('Cert_of_Acceptance');
			$this->db->join('Student', 'Cert_of_Acceptance.student_id = Student.student_id');
			$this->db->join('Account', 'Account.user_id = Student.user_id');
			$this->db->join('Company','Cert_of_Acceptance.company_id = Company.company_id');
			$this->db->join('Student_Status','Student_Status.student_id = Student.student_id');
			$this->db->join('Evaluator','Evaluator.company_id = Company.company_id');
			$this->db->where('Student.student_id',$student_id);
			$query = $this->db->get();
			return $query->result();
	}

	public function postProgressReport($data)
	{
		$this->db->insert('Weekly_Progress_Reports',$data);
		return $this->db->affected_rows();
	}

	public function getWeeklyProgressReports($student_id)
	{
		$this->db->where('student_id',$student_id);
		$query = $this->db->get('Weekly_Progress_Reports');
		return $query->result();
	}

	public function getWeeklyProgressReport($id)
	{
		$this->db->select('*');
		$this->db->from('Weekly_Progress_Reports wpr');
		$this->db->where('wpr.weekly_report_id ',$id);
		$this->db->join('Evaluator ev','ev.evaluator_id = wpr.evaluator_id');
		$this->db->join('Account act','act.user_id = ev.user_id');
		$query = $this->db->get();
		return $query->result();
	}


	public function editProfile($data,$username)
	{

		$this->db->where('user_id',$username);
		$this->db->update('Account',$data);
		return $this->db->affected_rows();
	}
};