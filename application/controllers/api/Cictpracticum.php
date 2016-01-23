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
class CictPracticum extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('studentModel','student');
        $this->load->model('coordinatorModel','coordinator');
        $this->load->model('CictPracticumModel','cictPracticum');
        $this->load->helper('url');
    }


    public function student_assessment_get()
    {
        $students = $this->cictPracticum->getStudentAssessment();
        $this->response($students,200);
    }
    

    public function account_post()
    {
        $user_id = $this->post('user_id');
        $account = $this->student->getStudentAccount($user_id);
        $this->response($account,200);
    }


   
    public function login_post()
    {
        $data = array(
            'user_id' => $this->post('user_id'),
            'password' => $this->post('password')
        );


        $account = $this->cictPracticum->loginAccount($data);

        if(sizeof($account) > 0)
        {
            if($account[0]->position == 'Student')
            {
                $this->response([['position' => 'Student']],200);
            }
            elseif($account[0]->position == 'Coordinator')
            {
                $this->response([['position' => 'Coordinator']],200);
            }
            elseif($account[0]->position == 'Evaluator')
            {
                $this->response([['position' => 'Evaluator']],200);
            }
        }
        else
        {
            $this->response([['response' => 'Invalid username or password']],200);
        }
       

    }

    

  

   
}
