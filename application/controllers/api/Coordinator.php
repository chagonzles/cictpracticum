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
class Coordinator extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Student_model','student');
        $this->load->model('Coordinator_model','coordinator');
        $this->load->helper('url');
    }

    public function announcements_get()
    {
        $announcements = $this->coordinator->getAnnouncements();
        $this->response($announcements,200);
    }
    //add new announcement
    public function announcement_post()
    {
        $announcement = array(
                'title' => $this->post('title'),
                'content' => $this->post('content'),
                'coordinator_id' => $this->post('coordinator_id') 
        );

        $announcement = $this->coordinator->postAnnouncement($announcement);
        if($announcement > 0)
        {
            $this->response(['response' => 'Successfully posted announcement']);
        }
    }


    public function announcement_put($id)
    {
       $announcement = array(
                'title' => $this->put('title'),
                'content' => $this->put('content'),
                'coordinator_id' => $this->put('coordinator_id') 
        );

        $announcement = $this->coordinator->updateAnnouncement($id,$announcement);
        if($announcement > 0)
        {
            $this->response(['response' => 'Successfully updated announcement']);
        } 
    }


    public function companies_get()
    {
        $companies = $this->coordinator->getAllCompany();
        $this->response($companies,200);
    }

    public function new_companies_get()
    {
        $companies = $this->coordinator->getNewCompanies();
        $this->response($companies,200);
    }
    public function company_get($id)
    {
        $company = $this->coordinator->getCompany($id);
        $this->response($company,200);
    }
    //add new company
    public function company_post()
    {
        $company = array(
                'company_name' => $this->post('company_name'),
                'company_address' => $this->post('company_address'),
                'company_contact_no' => $this->post('company_contact_no'),
                'company_email' => $this->post('company_email'),
                'company_website_url' => $this->post('company_website_url'),
                'company_overview' => $this->post('company_overview'),
                'approved_by_coordinator' => 1
        );


        $company = $this->coordinator->addCompany($company);
        if($company > 0)
        {
            $this->response(['response' => 'Successfully added company']);
        }
    }


    public function student_attached_file_get()
    {
        $attached_file = $this->coordinator->getStudentAttachedFile();
        $this->response($attached_file,200);
    }

    public function approveStudentFile_put($id)
    {
        $approved_attachment = $this->coordinator->approveForm($id);
        if($approved_attachment > 0)
        {
            $this->response(['response' => 'Successfully approved form']);
        }
    }

    public function rejectStudentFile_put($id)
    {
        $rejected_attachment = $this->coordinator->rejectForm($id);
        if($rejected_attachment > 0)
        {
            $this->response(['response' => 'Successfully rejected form']);
        }
    }

    public function login_post()
    {
        $data = array(
            'user_id' => $this->post('user_id'),
            'password' => $this->post('password')
        );
        $coordinator = $this->coordinator->loginCoordinator($data);

        
        if($coordinator > 0)
        {
            $coordinator = $this->getCoordinatorID($this->post('user_id'));
            $newdata = array(
                'user_id'       => $this->post('user_id'),
                'coordinator_id'    => $coordinator[0]->coordinator_id,
                'logged_in'     => TRUE
            );
            
            $this->session->set_userdata($newdata);
            $this->response($newdata,200);
        }
        else if($coordinator == 0)
        {
            $this->response(['response' => 'Incorrect username or password'],200);
        }

    }


    private function getCoordinatorID($user_id)
    {
        $coordinatorID = $this->coordinator->getCoordinatorID($user_id);
        return $coordinatorID;
    }

    private function login($user_id,$coordinator_id)
    {
        $newdata = array(
            'user_id'  => 'user_id',
            'coordinator_id'     => 'coordinator_id',
            'logged_in' => TRUE
        );

        $this->session->set_userdata($newdata);
    }

    public function assessment_get()
    {
        $this->load->library('excel_reader');
        $this->excel_reader->read('uploads/asd.xls');
        $worksheet = $this->excel_reader->sheets[0];

        $assessment_obj = new stdClass();
        $assessment = [];

        for ($i=2; $i <= $worksheet['numRows']; $i++) 
        {
            for ($j=1; $j <= $worksheet['numCols'] ; $j++) 
            { 
                // student id
                
                if($j == 1)
                {   
                    $assessment[$i - 2] = [];
                    $assessment[$i - 2]['student_id'] = $worksheet['cells'][$i][$j];
                }
                elseif($j == 2)
                {
                    $assessment[$i - 2]['student_name'] = $worksheet['cells'][$i][$j];
                }
                elseif($j == 3)
                {
                    $assessment[$i - 2]['yr_section'] = $worksheet['cells'][$i][$j];
                }
                elseif($j == 4)
                {
                    $assessment[$i - 2]['avg_grade'] = $worksheet['cells'][$i][$j];
                }
                elseif($j == 5)
                {   
                    $assessment[$i - 2]['status'] = $worksheet['cells'][$i][$j];
                }
                
                
             } 
        
             
       
        }

        var_dump($assessment);
    }

    public function acceptedstudents_get()
    {
        $acceptedstudents = $this->coordinator->getAcceptedStudents();
        $this->response($acceptedstudents,200);
    }

    public function evaluator_get($id)
    {
        $evaluator = $this->coordinator->getEvaluatorName($id);
        $this->response($evaluator,200);
    }

    public function student_sched_get($student_id)
    {
        $student_sched = $this->coordinator->getStudentSched($student_id);
        $this->response($student_sched,200);
    }

    //STUDENT PROGRAM EVALUATION

    public function student_program_evaluation_list_get()
    {
        $student_evaluation_list = $this->coordinator->getStudentProgramEvaluationList();
        $this->response($student_evaluation_list,200);
    }

    public function student_program_evaluation_info_get($student_id)
    {
        $student_evaluation = $this->coordinator->getStudentProgramEvaluationInfo($student_id);
        $this->response($student_evaluation,200);
    }

    public function student_program_evaluation_courses_get($student_id)
    {
        $student_courses = $this->coordinator->getStudentProgramEvaluationCourses($student_id);
        $this->response($student_courses,200);
    }

    public function student_program_evaluation_course_grade_put()
    {
        $data = array(
            'course_grade' => $this->put('course_grade')
        );

        $grade = $this->coordinator->updateStudentProgEvalCourseGrade($this->put('course_id'),$data);
        
        $this->response($grade,201);
    }

    public function checkIfHasDeficiencies_get($student_id)
    {
        $grade = $this->coordinator->checkIfHasDeficiencies($student_id);
        $this->response($grade,200);
    }


    public function student_prog_eval_status_avg_put($student_id)
    {
        //check if meron inc drp o 5.00
        $deficiencies = $this->coordinator->checkIfHasDeficiencies($student_id);
        //update status = not ok
        if($deficiencies > 0)
        {
            $data = array(
                'status' => 'Not qualified'
            );
            $status = $this->coordinator->updateStudentStatus($data,$student_id);
            if($status > 0)
            {
                $avg = $this->coordinator->updateStudentAverage($student_id);
                if($avg > 0)
                {
                    $this->response(['response' => 'Successfully updated status and average'],200);
                }
            }
        }
        //update status = ok
        else
        {
            $data = array(
                'status' => 'Qualified'
            );
            $status = $this->coordinator->updateStudentStatus($data,$student_id);
            if($status > 0)
            {
                $avg = $this->coordinator->updateStudentAverage($student_id);
                if($avg > 0)
                {
                    $this->response(['response' => 'Successfully updated status and average'],200);
                }
            }
        }
    }
   
}
