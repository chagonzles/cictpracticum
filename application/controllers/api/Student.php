<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class Student extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Student_model','student');
        $this->load->helper('url');
    }

    public function student_info_get($student_id)
    {
        $student = $this->student->getStudentOjt($student_id);
        $this->response($student,200);
    }

     public function announcements_stud_get()
    {
        $this->response(['response' => 'ok'],200);
    }


     public function student_logged_in_get()
    {
        $student_id = $this->session->userdata('student_id');
        $this->response(['student_id' => $student_id],200);
    }

    public function student_user_id_get()
    {
        $userid = $this->session->userdata('user_id');
        $this->response(['user_id' => $userid],200);
    }
    //get the details and form data of student
    public function view_get($form = NULL,$info = NULL)
    {
        $student_id = $this->session->userdata['student_id'];
        $user_id = $this->session->userdata['user_id'];
   
        if($form == 'info')
        {
            if($info == 'account')
            {
                $account = $this->student->getStudentAccount($this->session->userdata['user_id']);
                $this->response($account,200);
            }
            else if($info == 'status')
            {
                $status = $this->student->getStudentStatus($student_id);
                $this->response($status,200);
            }
            else if($info == '' || $info == NULL)
            {
                $info = $this->student->getStudent($student_id);
                $this->response($info,200);
            }

        }   
        else if($form == 'sheet_b')
        {
                if($info == 'personal_information')
                {
                    $personal_information = $this->student->getPersonalInformation($student_id);
                    $this->response($personal_information,200);
                }
                else if($info == 'family_background')
                {
                    $family_background = $this->student->getFamilyBackground($student_id);
                    $this->response($family_background,200);
                }
                else if($info == 'school_data')
                {
                    $school_data = $this->student->getSchoolData($student_id);
                    $this->response($school_data,200);
                }
        }
        
        
    }

    public function check_user_id_post()
    {
        $user_id = $this->post('user_id');
        $user_id = $this->student->getStudentsUserID($user_id);
        echo $user_id;
    }

    public function check_student_id_get($student_id)
    {
        $student_id = $this->student->getStudentsID($student_id);
        echo $student_id;
    }

    public function available_student_get()
    {
        $student = $this->student->getStudents();
        $this->response($student,200);
    }
    public function check_assessed_student_id_get($student_id)
    {
        $student_id = $this->student->getAssessedStudentID($student_id);
        echo $student_id;
    }
    public function check_email_post()
    {
        $email = $this->post('email');
        $email = $this->student->getStudentsEmail($email);
        echo $email;
    }

    public function account_post()
    {
        $user_id = $this->post('user_id');
        $account = $this->student->getStudentAccount($user_id);
        $this->response($account,200);
    }

    public function status_get($student_id)
    {
        $status = $this->student->getStudentStatus($student_id);
        $this->response($status,200);
    }

    public function info_get($student_id)
    {
        $info = $this->student->getStudent($student_id);
        $this->response($info,200);
    }

    public function session_get()
    {   
            $this->response($this->session->userdata,200);
    }

    public function student_id_get()
    {
            $this->response($this->session->userdata['student_id'],200);
    }

    public function user_id_get()
    {
            $this->response($this->session->userdata['user_id'],200);
    }

    public function sheetb_get()
    {

    }


    //add new student account
    public function index_post()
    {
        $student = array(
                'course' => $this->post('course'),
                'major' => $this->post('major'),
                'age' => $this->post('age'),
                'student_id' => $this->post('student_id'),
                'user_id' => $this->post('user_id')
        );

        $account = array(
                'lastname' => $this->post('lastname'),
                'firstname' => $this->post('firstname'),
                'middle_initial' => $this->post('middle_initial'),
                'birthday' => $this->post('birthday'),
                'email' => $this->post('email'),
                'gender' => $this->post('gender'),
                'address' => $this->post('address'),
                'contact_number' => $this->post('contact_number'),
                'user_id' => $this->post('user_id'),
                'password' => $this->post('password'),
                'position' => 'Student'
        );

        $status = array(
                'student_id' => $this->post('student_id'),
                'semester' => $this->post('semester'),
                'academic_year' => $this->post('academic_year'),
                'no_of_required_hours' => $this->post('no_of_required_hours'),
                'no_of_remaining_hours' => $this->post('no_of_remaining_hours')

        );

        $student = $this->student->registerStudent($student,$account,$status);
        // echo $student;
        if($student > 0)
        {
            $newdata = array(
                'user_id'       => $this->post('user_id'),
                'student_id'    => $this->post('student_id'),
                'logged_in'     => TRUE
            );
            
            $this->session->set_userdata($newdata);
            $this->response(['response' => 'Successfully added new account'],200);
        }
    }

    public function login_post()
    {
        $data = array(
            'user_id' => $this->post('user_id'),
            'password' => $this->post('password')
        );
        $student = $this->student->loginStudent($data);

        
        if($student > 0)
        {
            $student = $this->getStudentID($this->post('user_id'));
            $newdata = array(
                'user_id'       => $this->post('user_id'),
                'student_id'    => $student[0]->student_id,
                'logged_in'     => TRUE
            );
            
            $this->session->set_userdata($newdata);
            $this->response($student,200);
        }
        else if($student == 0)
        {
            $this->response([0 => ['response' => 'Incorrect username or password']],200);
        }

    }

    private function getStudentID($user_id)
    {
        $studentID = $this->student->getStudentID($user_id);
        return $studentID;
    }

    private function login($user_id,$student_id)
    {
        $newdata = array(
            'user_id'  => 'user_id',
            'student_id'     => 'student_id',
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);
    }


    public function announcements_get($student_id)
    {
        $announcements = $this->student->getAnnouncements($student_id);
        $this->response($announcements,200);
    }

    public function announcement_put($id)
    {   
        $data = array(
            'seen_by' => $this->put('student_id')
        );
        $announcement = $this->student->seenAnnouncement($data,$id);
    }

    public function companies_get()
    {
        $companies = $this->student->getAllCompany();
        $this->response($companies,200);
    }

    public function company_get($id)
    {
        $company = $this->student->getCompany($id);
        $this->response($company,200);
    }


    public function attached_files_get()
    {
        $attached_files = $this->student->getAttachedFiles($this->session->userdata('user_id'));
        $this->response($attached_files,200);
    }

    public function attached_file_delete($id)
    {
        $attached_file = $this->student->deleteAttachedFile($id);
        if($attached_file > 0)
        {
            $this->response(['Successfully delete file'],200);
        }
    }

    public function location_post()
    {
        $data = array(
                'lat'       => $this->post('lat'),
                'long'      => $this->post('student_id'),
                'logged_in'     => TRUE
        );
        $location = $this->student->addLocation($data);
        if($location > 0)
        {
            $this->response(['Successfully added location'],200);
        }
    
    }

   


    public function personal_info_post()
    {
        $data = array(
            'height' => $this->post('height'),
            'weight' => $this->post('weight'),
            'civil_status' => $this->post('civil_status'),
            'place_of_birth' => $this->post('place_of_birth'),
            'student_id' => $this->post('student_id')
        );
        $personal_info = $this->student->addPersonal_Info($data);
        if($personal_info > 0)
        {
            $this->response(['response' => 'Successfully added personal info'],200);
        }
    }


    public function family_background_post()
    {
        $data = array(
            'guardian_name' => $this->post('guardian_name'),
            'age' => $this->post('guardian_age'),
            'address' => $this->post('guardian_address'),
            'occupation' => $this->post('guardian_occupation'),
            'relationship' => $this->post('guardian_relationship'),
            'contact_number' => $this->post('guardian_contact_number'),
            'student_id' => $this->post('student_id')
        );
        $family_background = $this->student->addFamily_Background($data);
        if($family_background > 0)
        {
            $this->response(['response' => 'Successfully added family background'],200);
        }
    }

    public function evaluation_get($student_id)
    {
        $evaluation = $this->student->getStudentEvaluation($student_id);
        $this->response($evaluation,200);
    }

    public function weekly_progress_report_post()
    {
        $data = array(
            'week_no' => $this->post('week_no'),
            'task_title' => $this->post('task_title'),
            'task_start_date' => $this->post('task_start_date'),
            'task_end_date' => $this->post('task_end_date'),
            'task_details' => $this->post('task_details'),
            'task_equipped' => $this->post('task_equipped'),
            'student_id' =>  $this->session->userdata('student_id'),
            'evaluator_id' => $this->post('evaluator_id')
        );
        $progress_reports = $this->student->postProgressReport($data);
        if($progress_reports > 0)
        {
            $this->response(['response' => 'Successfully added progress reports'],200);
        }
    }

    public function weekly_progress_reports_get()
    {
        $weekly_progress_reports = $this->student->getWeeklyProgressReports($this->session->userdata('student_id'));
        $this->response($weekly_progress_reports,200);
    }

    public function weekly_progress_report_get($id)
    {
        $weekly_progress_report = $this->student->getWeeklyProgressReport($id);
        $this->response($weekly_progress_report,200);
    }

    //revision
    public function student_edit_profile_put($username)
    {
        $account = array(
                'email' => $this->put('email'),
                'address' => $this->put('address'),
                'contact_number' => $this->put('contact_no'),
        );

        $student = $this->student->editProfile($account,$username);
        if($student > 0)
        {
            $this->response(['response' => 'Successfully updated profile'],200);
        }
    }

   
}
