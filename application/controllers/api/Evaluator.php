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
class Evaluator extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Evaluator_model','evaluator');
        $this->load->helper('url');
    }


    public function login_post()
    {
        $data = array(
            'user_id' => $this->post('user_id'),
            'password' => $this->post('password')
        );
        $evaluator = $this->evaluator->loginEvaluator($data);

        
        if($evaluator > 0)
        {
            $evaluator = $this->evaluator->getEvaluatorID($this->post('user_id'));
            $newdata = array(
                'user_id'       => $this->post('user_id'),
                'evaluator_id'    => $evaluator[0]->evaluator_id,
                'logged_in'     => TRUE,
                'company_id'    => $evaluator[0]->company_id
            );
            
            $this->session->set_userdata($newdata);
            $this->response($newdata,200);
        }
        else if($evaluator == 0)
        {
            $this->response(['response' => 'Incorrect username or password'],200);
        }

    }


     //add new evaluator account
    public function index_post()
    {
        
        $account = array(
                'lastname' => $this->post('lastname'),
                'firstname' => $this->post('firstname'),
                'middle_initial' => $this->post('middle_initial'),
                'birthday' => $this->post('birthday'),
                'gender' => $this->post('gender'),
                'user_id' => $this->post('user_id'),
                'password' => $this->post('password'),
                'position' => 'Evaluator'
        );

        $account = $this->evaluator->addAccount($account);
        if($account > 0)
        {
            $evaluator = array(
                'user_id' => $this->post('user_id'),
                'company_id' => $this->post('company_id'),
                'evaluator_position' => $this->post('evaluator_position')
            );

            $evaluator = $this->evaluator->addEvaluator($evaluator);
            if($evaluator > 0)
            {
                $newdata = array(
                    'user_id'       => $this->post('user_id'),
                    'logged_in'     => TRUE,
                    'evaluator_id'      => $evaluator,
                    'company_id'    => $this->post('company_id')
                );
                $this->session->set_userdata($newdata);
                $this->response(['response' => 'Successfully added new evaluator'],200);
            }
            
        }


        
    }


    //add new company
    public function company_post()
    {
        $company = array(
                'company_name' => $this->post('company_name'),
                'company_address' => $this->post('company_address'),
                'company_contact_no' => $this->post('company_contact_no'),
                'company_email' => $this->post('company_email'),
                'company_overview' => $this->post('company_overview'),
                'company_website_url' => $this->post('company_website_url'),
                'approved_by_coordinator' => 1
        );


        $company = $this->evaluator->addCompany($company);
        if($company > 0)
        {
            $this->response(['company_id' => $company]);
        }
    }


    public function student_sched_post($student_id)
    {
       $data = array(
            'sched_day' => $this->post('day'),
            'sched_time' => $this->post('time'),
            'student_id' => $student_id
       );
       $student_sched = $this->evaluator->addStudentSched($data);

    }

    public function student_sched_get($student_id)
    {
        $student_sched = $this->evaluator->getStudentSched($student_id);
        $this->response($student_sched,200);
    }

    public function evaluator_company_get($user_id)
    {
        $company = $this->evaluator->getEvaluatorCompany($user_id);
        $this->response($company,200);
    }

    public function student_all_get()
    {
        $students = $this->evaluator->getAvailableStudents();
        $this->response($students,200);
    }

    public function student_ojt_get()
    {
        $student_ojt = $this->evaluator->getStudentOjt($this->session->userdata['company_id']);
        $this->response($student_ojt,200);
    }

    public function add_student_post()
    {
        $coa = array(
                'division_dept' => $this->post('division_dept'),
                'date_start' => $this->post('date_start'),
                'student_id' => $this->post('student_id'),
                'company_id' => $this->session->userdata['company_id'],
                'approved_by_evaluator' => 1,
                'approved_by_dean' => 1,
                'approved_by_coordinator' => 1
        );
        $coa = $this->evaluator->addStudent($coa);
        if($coa > 0)
        {
            $this->response(['response' => 'Successfully added new student'],200);
        }
    }




    public function companies_get()
    {
        $companies = $this->evaluator->getAllCompany();
        $this->response($companies,200);
    }
    
    public function check_user_id_post()
    {
        $user_id = $this->post('user_id');
        $user_id = $this->evaluator->checkUserID($user_id);
        echo $user_id;
    }

    public function check_student_id_get($student_id)
    {
        $student_id = $this->student->getStudentsID($student_id);
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



    public function attached_files_get()
    {
        $attached_files = $this->student->getAttachedFiles();
        $this->response($attached_files,200);
    }

    public function evaluator_get()
    {
        $id = $this->session->userdata('evaluator_id');
        $evaluator_info = $this->evaluator->getEvaluatorInfo($id);
        $this->response($evaluator_info,200);
    }


    public function evaluation_post()
    {
        $data = array(
            'student_id' => $this->post('student_id'),
            'evaluator_id' => $this->session->userdata('evaluator_id'),
            'date_commenced' => $this->post('date_commenced'),
            'date_completed' => $this->post('date_completed'),
            'comments' => $this->post('comments'),
            'total_points' => $this->post('total_points'),
            'grade' => $this->post('grade'),
            'equivalent' => $this->post('equivalent')
        );


        $evaluation = $this->evaluator->addEvaluation($data);
        if($evaluation > 0)
        {
            $this->response(['evaluation_id' => $evaluation],201);
        }

    }

    public function criteria_post($evaluation_id)
    {
        $data = array(
            'criteria_name' => $this->post('criteria_name'),
            'points_scored' => $this->post('points_scored'),
            'remarks' => $this->post('remarks'),
            'evaluation_id' => $evaluation_id
        );
        $criteria = $this->evaluator->addCriteria($data);
        if($criteria > 0)
        {
            $this->response(['response' => 'Successfully posted criteria'],201);
        }
    }

    public function evaluation_get($student_id)
    {
        $evaluation = $this->evaluator->getStudentEvaluation($student_id);
        if($evaluation > 0)
        {
            $this->response(['response' => 'Already evaluated']);
        }
    }
  

   
}
