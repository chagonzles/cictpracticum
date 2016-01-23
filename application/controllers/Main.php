<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
        // $this->load->library('email',$config);
	$this->load->helper('path');
        $this->load->model('studentModel','student');
    }
	
	public function index()
	{
		if($this->session->has_userdata('student_id') && $this->session->has_userdata('user_id'))
		{
			redirect('student/profile/' . $this->session->userdata('student_id'));
		}
		else if($this->session->has_userdata('coordinator_id') && $this->session->has_userdata('user_id'))
		{
			redirect('coordinator/home');
		}
		else if($this->session->has_userdata('evaluator_id') && $this->session->has_userdata('user_id'))
		{
			redirect('evaluator/home');
		}
		else
		{
			$data = array(
			'title' => 'Online CICT Practicum Management System'
			);
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('login');
			$this->load->view('templates/footer');
		}
	}

	public function login()
	{

		$data = array(
			'title' => 'Online CICT Practicum Management System'
		);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('login');
		$this->load->view('templates/footer');
	}

	public function download()
	{
		// $this->load->helper('download');
		// echo base_url() . 'assets/img/logo-bpsu.gif';
		// force_download('assets/img/logo-bpsu.gif', NULL, true);

		redirect(base_url() . 'uploads/waiver.doc');
	}

	public function student_assessment()
	{
		$data = array(
			'title' => 'Online CICT Practicum Management System'
		);
		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('student_assessment');
		$this->load->view('templates/footer');
	}
	public function register()
	{
		// $this->download();
		// $data['months'] = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		$data = array(
			'title' => 'CICT Practicum Monitoring System',
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
		$this->load->view('register');
		$this->load->view('templates/footer');
	}


	public function company($company ='')
	{
		
				if($company == '')
				{
					$data = array(
						'title' => 'Online CICT Practicum Management System',
						'error' => ''
					);
					$this->load->view('templates/header',$data);
					$this->load->view('templates/navbar');
					$this->load->view('company');
					$this->load->view('templates/footer');
				}
				else
				{
					$data = array(
						'title' => 'Online CICT Practicum Management System',
						'error' => '',
						'company' => $this->student->getCompany($company)
					);
					$this->load->view('templates/header',$data);
					$this->load->view('templates/navbar');
					$this->load->view('company_details');
					$this->load->view('templates/footer');
				}
		
			
		
	}




	// function to geocode address, it will return false if unable to geocode address
	private function geocode($address){
	 
	    // url encode the address
	    $address = urlencode($address);
	     
	    // google map geocode api url
	    $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address={$address}";
	 
	    // get the json response
	    $resp_json = file_get_contents($url);
	     
	    // decode the json
	    $resp = json_decode($resp_json, true);
	 
	    // response status will be 'OK', if able to geocode given address 
	    if($resp['status']=='OK'){
	 
	        // get the important data
	        $lati = $resp['results'][0]['geometry']['location']['lat'];
	        $longi = $resp['results'][0]['geometry']['location']['lng'];
	        $formatted_address = $resp['results'][0]['formatted_address'];
	         
	        // verify if data is complete
	        if($lati && $longi && $formatted_address){
	         
	            // put the data in the array
	            $data_arr = array();            
	             
	            array_push(
	                $data_arr, 
	                    $lati, 
	                    $longi, 
	                    $formatted_address
	                );
	             
	            return $data_arr;
	             
	        }else{
	            return false;
	        }
	         
	    }else{
	        return false;
	    }
	}


	public function do_upload()
        {
        		
				// $path = "./uploads/student/";

				// if(!file_exists($path))
				// {
				//    mkdir($path);
				// }

    //             $config['upload_path']          =  $path;
    //             $config['allowed_types']        = 'pdf|doc|docx';
          

    //             $this->load->library('upload', $config);

    //             if ( ! $this->upload->do_upload('userfile'))
    //             {
    //                     $error = array('error' => $this->upload->display_errors());

                
    //             }
    //             else
    //             {
    //                     $data = array('upload_data' => $this->upload->data());

				// 		$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
				// 		$file_name = $upload_data['file_name'];
				// 		$data = array(
				// 			'file_name' => $upload_data['file_name'],
				// 			'form_type' => $this->input->post('form_type')
							
				// 		);
						
						

							 $sender_email = 'cictpracticum2015@gmail.com';
					        $username = 'cictpracticum2015';
					        $user_password = 'bpsucict2016';
					        $subject = 'try lang';
					        $message = 'gumana ka na!';

					        // The mail sending protocol.
							$config['protocol'] = 'smtp';
							// SMTP Server Address for Gmail.
							$config['smtp_host'] = 'ssl://smtp.googlemail.com';
							// SMTP Port - the port that you is required
							$config['smtp_port'] = 465;
							// SMTP Username like. (abc@gmail.com)
							$config['smtp_user'] = $sender_email;
							// SMTP Password like (abc***##)
							$config['smtp_pass'] = $user_password;
							// Load email library and passing configured values to email library
							$this->load->library('email', $config);
							// Sender email address
							$this->email->from($sender_email, $username);
							// Receiver email address.for single email
							// $this->email->to($receiver_email);
							//send multiple email
							$this->email->to('cictpracticum2015@gmail.com');
							// Subject of email
							$this->email->subject($subject);
							// Message in email
							$this->email->message($message);
							// It returns boolean TRUE or FALSE based on success or failure
							$this->email->send(); 



							// // echo '<script>alert("Successfully uploaded file")</script>';
							// $this->email->from('dev.charlenegonzales@gmail.com', 'Charlene Gonzales');
							// $this->email->to('dev.charlenegonzales@gmail.com'); 
							// $this->email->subject('Email Test');
							// $this->email->message('Testing the email class.'); 
							// // $path = set_realpath('uploads/student/');
							// // $this->email->attach($path . $data['file_name']);
							// $this->email->send();

							echo '<script>alert(' .$this->email->print_debugger() . ');</script>';

							
						
                }
        


        public function send_email()
        {
        		$config= Array(
            'protocol'  =>'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user'=>  'cictpracticum2015@gmail.com',
            'smtp_pass' => 'bpsucict2016'
            );

        $this->load->library('email',$config);
        $this->email->set_newline("\r\n");
        $this->email->from('cictpracticum2015@gmail.com','jhe');
        $this->email->to('cictpracticum2015@gmail.com');
        $this->email->subject('this is email with subject');
        $this->email->message('it s working properly');

        if($this->email->send())
        {
            echo "your email send";
        }
        else
        {
            show_error($this->email->print_debugger());
        }
  
        		

        }

	
}
