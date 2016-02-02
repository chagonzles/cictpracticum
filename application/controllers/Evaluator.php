<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Evaluator extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->helper('download');
        $this->load->helper(array('form', 'url'));
        $this->load->model('Evaluator_model','evaluator');
    }


    public function home()
    {
    	if($this->session->has_userdata('evaluator_id') && $this->session->has_userdata('user_id'))
    	{
    		$account = $this->evaluator->getEvaluatorAccount($this->session->userdata('user_id'));
    		$evaluator = $this->evaluator->getEvaluatorPosition($this->session->userdata('user_id'));
    		$company = $this->evaluator->getEvaluatorCompany($this->session->userdata('user_id'));
    		$data = array(
				'title' => 'Online CICT Practicum Management System',
				'account' => $account,
				'evaluator' => $evaluator,
				'company'=> $company,
				'months' => array(
								'Jan',
								'Feb',
								'Mar',
								'Apr',
								'May',
								'Jun',
								'Jul',
								'Aug',
								'Sep',
								'Oct',
								'Nov',
								'Dec'
				),
				'monthno' => 1,
				'day_names' => array(
						'Mon',
						'Tue',
						'Wed',
						'Thu',
						'Fri',
						'Sat',
						'Sun'
				)
			);
    		$this->load->view('templates/header',$data);
			$this->load->view('evaluator/navbar');
			$this->load->view('evaluator/home');
			$this->load->view('templates/footer');
    	}
    	else
    	{
    		show_404();
    	}
    }
	
	public function register()
	{

		$data = array(
						'title' => 'Online CICT Practicum Management System',
						'error' => '',
						'months' => array(
								'Jan',
								'Feb',
								'Mar',
								'Apr',
								'May',
								'Jun',
								'Jul',
								'Aug',
								'Sep',
								'Oct',
								'Nov',
								'Dec'
							),
							'monthno' => 1
		);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('evaluator/register');
		$this->load->view('templates/footer');
	}

	public function evaluation()
	{

		$data = array(
						'title' => 'Online CICT Practicum Management System',
						'error' => '',
						
		);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('evaluator/evaluation');
		$this->load->view('templates/footer');
	}






	public function logout()
	{
		$evaluator_data = array('user_id', 'position', 'logged_in');
		$this->session->unset_userdata($evaluator_data);
		redirect('/');
	}
	
}
