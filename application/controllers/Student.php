<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

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
        $this->load->model('Student_model','student');
    }
	
	public function profile($id)
	{
		if($this->session->has_userdata('student_id') || $this->session->has_userdata('user_id'))
		{

			$student = $this->student->getStudent($id);
			$account = $this->student->getStudentAccount($this->session->userdata('user_id'));
			$status = $this->student->getStudentStatus($id);
			$coa = $this->student->getStudentCoA($this->session->userdata('student_id'));
			$evaluation = $this->student->getStudentEvaluation($id);

			
			if(!empty($coa[0]->company_address) || isset($coa[0]->company_address))
			{
				// $location = $this->geocode($coa[0]->company_address);
				$company_address = $coa[0]->company_address;
				$data = array(
					'title' => 'CICT Practicum Monitoring System',
					'student' => $student,
					'account' => $account,
					'status' => $status,
					'company_address' => $company_address,
					'coa' => $coa,
					'evaluation' => $evaluation
					// 'lat' => $location[0],
					// 'long' => $location[1],
					// 'formatted_address' => $location[2]
					
				);
			}
			else
			{
				// $location = $this->geocode($account[0]->address);
				$company_address = $account[0]->address;
				$data = array(
					'title' => 'CICT Practicum Monitoring System',
					'student' => $student,
					'account' => $account,
					'status' => $status,
					'company_address' => $company_address,
					'evaluation' => $evaluation 
					// 'lat' => $location[0],
					// 'long' => $location[1],
					// 'formatted_address' => $location[2]
				);
			}

	
			
			$this->load->view('templates/header',$data);
			$this->load->view('student/navbar');
			$this->load->view('student/home');
			$this->load->view('templates/footer');
		}
		else
		{
			show_404();
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



	public function company($company ='')
	{
		if($this->session->has_userdata('student_id') && $this->session->has_userdata('user_id'))
			{
				if($company == '')
				{
					$data = array(
						'title' => 'Online CICT Practicum Management System',
						'error' => ''
					);
					$this->load->view('templates/header',$data);
					$this->load->view('student/navbar');
					$this->load->view('student/company/company');
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
					$this->load->view('student/navbar');
					$this->load->view('student/company/company_details');
					$this->load->view('templates/footer');
				}
			}
			else
			{
				show_404();
			}
	}






	public function announcements()
	{
			$data = array(
				'title' => 'Online CICT Practicum Management System'
			);
			$this->load->view('templates/header',$data);
			$this->load->view('student/navbar');
			$this->load->view('student/announcements');
			$this->load->view('templates/footer');
	}


	public function sheet_a()
	{
		if($this->session->has_userdata('student_id') && $this->session->has_userdata('user_id'))
		{


			$student = $this->student->getStudent($this->session->userdata('student_id'));
			$account = $this->student->getStudentAccount($this->session->userdata('user_id'));
			$status = $this->student->getStudentStatus($this->session->userdata('student_id'));
			

			$data = array(
				'title' => 'Online CICT Practicum Management System',
				'student' => $student,
				'account' => $account,
				'status' => $status
			);
			$this->load->view('templates/header',$data);
			$this->load->view('student/navbar');
			$this->load->view('student/forms/sheet_a');
			$this->load->view('templates/footer');
		}
		else
		{
			show_404();
		}
		
	}



	public function forms($form = '',$student_id = '')
	{
		if($this->session->has_userdata('student_id') && $this->session->has_userdata('user_id'))
		{
			$student = $this->student->getStudent($this->session->userdata('student_id'));
			$account = $this->student->getStudentAccount($this->session->userdata('user_id'));
			$status = $this->student->getStudentStatus($this->session->userdata('student_id'));
				

			$data = array(
					'title' => 'CICT Practicum Monitoring System',
					'student' => $student,
					'account' => $account,
					'status' => $status,
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
			if($form == '')
			{
				
				$this->load->view('templates/header',$data);
				$this->load->view('student/navbar');
				$this->load->view('student/forms');
				$this->load->view('templates/footer');
			}
			else if($form == 'sheet_a')
			{
				$this->load->view('templates/header',$data);
				$this->load->view('student/navbar');
				$this->load->view('student/forms/sheet_a');
				$this->load->view('templates/footer');
			}
			else if($form == 'sheet_b')
			{
				
				$this->load->view('templates/header',$data);
				$this->load->view('student/navbar');
				$this->load->view('student/forms/sheet_b');
				$this->load->view('templates/footer');
			}

			else if($form == 'waiver')
			{
				
				$this->load->view('templates/header',$data);
				$this->load->view('student/navbar');
				$this->load->view('student/forms/waiver');
				$this->load->view('templates/footer');
			}

			else if($form = 'weekly_progress_reports')
			{


						$student = $this->student->getStudent($this->session->userdata('student_id'));
						$account = $this->student->getStudentAccount($this->session->userdata('user_id'));
						$status = $this->student->getStudentStatus($this->session->userdata('student_id'));
						$coa = $this->student->getStudentCoA($this->session->userdata('student_id'));

						$data = array(
							'title' => 'Online CICT Practicum Management System',
							'student' => $student,
							'account' => $account,
							'status' => $status,
							'coa' => $coa,
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
						$this->load->view('student/navbar');
						$this->load->view('student/forms/weekly_progress_reports');
						$this->load->view('templates/footer');
				

			}

			

		}
		else
		{
			show_404();
		}


		
	}


	public function do_upload()
        {
        		$folderName = $this->session->userdata('user_id');
				$path = "./uploads/student/$folderName/";

				if(!file_exists($path))
				{
				   mkdir($path);
				}

                $config['upload_path']          =  $path;
                $config['allowed_types']        = 'gif|jpg|png|doc|docx';
          

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());

                
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

						$upload_data = $this->upload->data(); //Returns array of containing all of the data related to the file you uploaded.
						$file_name = $upload_data['file_name'];
						$data = array(
							'file_name' => $upload_data['file_name'],
							'form_type' => $this->input->post('form_type'),
							'file_path' => base_url() . 'uploads/student/' . $folderName . '/' . $upload_data['file_name'],
							'user_id' => $this->session->userdata('user_id')
						);
						$file = $this->student->addAttachedFile($data);
						if($file > 0)
						{
							echo '<script>alert("Successfully uploaded file")</script>';
							redirect('student/forms');
						}
                        
                }
        }


	public function logout()
	{
		$student_data = array('user_id', 'student_id', 'logged_in');
		$this->session->unset_userdata($student_data);
		redirect('/main');
	}
	
}
