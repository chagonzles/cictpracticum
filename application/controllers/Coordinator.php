<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coordinator extends CI_Controller {

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
        $this->load->model('Coordinator_model','coordinator');
        $this->load->model('Student_model','student');
        $this->load->helper(array('form', 'url'));
        
        
    }

    public function home()
    {
    	if($this->session->has_userdata('coordinator_id') && $this->session->has_userdata('user_id'))
    	{
    		$account = $this->coordinator->getCoordinatorAccount($this->session->userdata('user_id'));
    		$data = array(
				'title' => 'Online CICT Practicum Management System',
				'account' => $account
			);
    		$this->load->view('templates/header',$data);
			$this->load->view('coordinator/navbar');
			$this->load->view('coordinator/profile');
			$this->load->view('templates/footer');

    	}
    	else
    	{
    		show_404();
    	}
    }

    public function notifications()
	{
			if($this->session->has_userdata('coordinator_id') && $this->session->has_userdata('user_id'))
			{
				$data = array(
					'title' => 'Online CICT Practicum Management System',
					'error' => ''
				);
				$this->load->view('templates/header',$data);
				$this->load->view('coordinator/navbar');
				$this->load->view('coordinator/notifications');
				$this->load->view('templates/footer');
			}
			else
			{
				show_404();
			}
	}

	
	public function announcements()
	{
			if($this->session->has_userdata('coordinator_id') && $this->session->has_userdata('user_id'))
			{
				$data = array(
					'title' => 'Online CICT Practicum Management System',
					'error' => ''
				);
				$this->load->view('templates/header',$data);
				$this->load->view('coordinator/navbar');
				$this->load->view('coordinator/announcements');
				$this->load->view('templates/footer');
			}
			else
			{
				show_404();
			}
	}

	public function company($company ='')
	{
		if($this->session->has_userdata('coordinator_id') && $this->session->has_userdata('user_id'))
			{
				if($company == '')
				{
					$data = array(
						'title' => 'Online CICT Practicum Management System',
						'error' => ''
					);
					$this->load->view('templates/header',$data);
					$this->load->view('coordinator/navbar');
					$this->load->view('coordinator/company');
					$this->load->view('templates/footer');
				}
				else
				{
					$data = array(
						'title' => 'Online CICT Practicum Management System',
						'error' => '',
						'company' => $this->coordinator->getCompany($company)
					);
					$this->load->view('templates/header',$data);
					$this->load->view('coordinator/navbar');
					$this->load->view('coordinator/company_details');
					$this->load->view('templates/footer');
				}
			}
			else
			{
				show_404();
			}
	}


	public function student($student_id = '',$user_id = '')
	{
		if($this->session->has_userdata('coordinator_id') && $this->session->has_userdata('user_id') && $student_id != '' && $user_id != '')
		{

			$student = $this->student->getStudent($student_id);
			$account = $this->student->getStudentAccount($user_id);
			$status = $this->student->getStudentStatus($student_id);
			$coa = $this->student->getStudentCoA($student_id);
			$evaluation = $this->student->getStudentEvaluation($student_id);
			
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
				
			}
			
			$this->load->view('templates/header',$data);
			$this->load->view('coordinator/navbar');
			$this->load->view('coordinator/student_details');
			$this->load->view('templates/footer');
		}
		elseif($student_id == '' && $user_id == '')
		{
					$data = array(
						'title' => 'Online CICT Practicum Management System',
						'error' => ''
					);
					$this->load->view('templates/header',$data);
					$this->load->view('coordinator/navbar');
					$this->load->view('coordinator/student');
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

	// public function do_upload()
 //    {
 //            $config['upload_path']          = './uploads/';
 //            $config['allowed_types'] 		= 'gif|jpg|png';
 //            $config['max_size']             = 100;
 //            $config['max_width']            = 1024;
 //            $config['max_height']           = 768;

 //            $this->load->library('upload', $config);

 //            if ( ! $this->upload->do_upload())
 //            {
 //                    $error = array('error' => $this->upload->display_errors());
             
                   
 //            }
 //            else
 //            {

 //                    $data = array('upload_data' => $this->upload->data());
                  	
 //                    redirect('coordinator/announcements');
 //            }
 //    }



	public function assessment()
	{
		if($this->session->has_userdata('coordinator_id') && $this->session->has_userdata('user_id'))
			{
				$data = array(
					'title' => 'Online CICT Practicum Management System',
					'error' => ''
				);
				$this->load->view('templates/header',$data);
				$this->load->view('coordinator/navbar');
				$this->load->view('coordinator/assessment');
				$this->load->view('templates/footer');
			}
			else
			{
				show_404();
			}
	}


	public function program_evaluation()
	{
		if($this->session->has_userdata('coordinator_id') && $this->session->has_userdata('user_id'))
			{
				$data = array(
					'title' => 'Online CICT Practicum Management System',
					'error' => ''
				);
				$this->load->view('templates/header',$data);
				$this->load->view('coordinator/navbar');
				$this->load->view('coordinator/student_program_evaluation');
				$this->load->view('templates/footer');
			}
			else
			{
				show_404();
			}
	}

    public function do_upload()
        {
        		$folderName = $this->input->post('student_id');
				$path = "./uploads/student/$folderName/";

				if(!file_exists($path))
				{
				   mkdir($path);
				}

                $config['upload_path']          =  $path;
                $config['allowed_types']        = 'xlsx|xls';
          

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
						
						$this->load->library('excel_reader');
				        $this->excel_reader->read('uploads/coordinator/' . $file_name);
				        $worksheet = $this->excel_reader->sheets[0];

				        $assessment_obj = new stdClass();
				        $assessment = [];
				        //student id
				        // var_dump($worksheet['cells'][1][2]);
				        //student name
				        echo 'student_id '. $worksheet['cells'][1][2] . '<br/>' .
				        	'yr and section' . $worksheet['cells'][1][4] . '<br />' .
				        	'student name ' . $worksheet['cells'][2][2] . '<br />' .
				        	'status' . $worksheet['cells'][2][4];


				        $assessment = array(
				        	'student_id' => $worksheet['cells'][1][2],
				        	'yr_section' => $worksheet['cells'][1][4],
				        	'student_name' => $worksheet['cells'][2][2],
				        	'status' => $worksheet['cells'][2][4],
				        	'avg_grade' => $worksheet['cells'][12][8],
				        	'attached_file_url' => base_url() . 'uploads/student/' . $folderName . '/' . $upload_data['file_name']
				        );


				        $rows = $this->coordinator->addAssessment($assessment);
						if($rows > 0)
						{
							redirect('coordinator/assessment');
						}

				    //dating working
				  //       for ($i=2; $i <= $worksheet['numRows']; $i++) 
				  //       {
				  //           for ($j=1; $j <= $worksheet['numCols'] ; $j++) 
				  //           { 
				  //               // student id
				                
				  //               if($j == 1)
				  //               {   
				  //                   $assessment[$i - 2] = [];
				  //                   $assessment[$i - 2]['student_id'] = $worksheet['cells'][$i][$j];
				  //               }
				  //               elseif($j == 2)
				  //               {
				  //                   $assessment[$i - 2]['student_name'] = $worksheet['cells'][$i][$j];
				  //               }
				  //               elseif($j == 3)
				  //               {
				  //                   $assessment[$i - 2]['yr_section'] = $worksheet['cells'][$i][$j];
				  //               }
				  //               elseif($j == 4)
				  //               {
				  //                   $assessment[$i - 2]['avg_grade'] = $worksheet['cells'][$i][$j];
				  //               }
				  //               elseif($j == 5)
				  //               {   
				  //                   $assessment[$i - 2]['status'] = $worksheet['cells'][$i][$j];
				  //               }
				                
				                
				  //            } 
				        
				             
				       		
				  //       }


						// $rows = $this->coordinator->addAssessment($assessment);
						// if($rows > 0)
						// {
						// 	redirect('coordinator/assessment');
						// }

                        
                }
        }



    public function upload_assessment()
        {
        		
				$path = "./uploads/coordinator/";

				if(!file_exists($path))
				{
				   mkdir($path);
				}

                $config['upload_path']          =  $path;
                $config['allowed_types']        = 'xlsx|xls';
          

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
						
						$this->load->library('excel_reader');
				        $this->excel_reader->read('uploads/coordinator/' . $file_name);
				        $worksheet = $this->excel_reader->sheets[0];

				        $assessment_obj = new stdClass();
				        $assessment = [];

				        var_dump($assessment_obj);

				  //       for ($i=2; $i <= $worksheet['numRows']; $i++) 
				  //       {
				  //           for ($j=1; $j <= $worksheet['numCols'] ; $j++) 
				  //           { 
				  //               // student id
				                
				  //               if($j == 1)
				  //               {   
				  //                   $assessment[$i - 2] = [];
				  //                   $assessment[$i - 2]['student_id'] = $worksheet['cells'][$i][$j];
				  //               }
				  //               elseif($j == 2)
				  //               {
				  //                   $assessment[$i - 2]['student_name'] = $worksheet['cells'][$i][$j];
				  //               }
				  //               elseif($j == 3)
				  //               {
				  //                   $assessment[$i - 2]['yr_section'] = $worksheet['cells'][$i][$j];
				  //               }
				  //               elseif($j == 4)
				  //               {
				  //                   $assessment[$i - 2]['avg_grade'] = $worksheet['cells'][$i][$j];
				  //               }
				  //               elseif($j == 5)
				  //               {   
				  //                   $assessment[$i - 2]['status'] = $worksheet['cells'][$i][$j];
				  //               }
				                
				                
				  //            } 
				        
				             
				       		
				  //       }


						// $rows = $this->coordinator->addAssessment($assessment);
						// if($rows > 0)
						// {
						// 	redirect('coordinator/assessment');
						// }

                        
                }
        }



	public function logout()
	{
		$student_data = array('user_id', 'coordinator_id', 'logged_in');
		$this->session->unset_userdata($student_data);
		redirect('/');
	}
	
}
