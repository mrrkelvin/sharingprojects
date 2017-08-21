<?php
	class Projects extends CI_Controller{
		public function index($offset = 0){

			// Pagination Config
			$config['base_url'] = base_url().'projects/index/';
			$config['total_rows'] = $this->db->count_all('projects');
			$config['display_pages'] = FALSE;
			$config['per_page'] = 3;
			$config['uri_segment'] = 3;
			$config['attributes'] = array('class' => 'pagination-link');

			// Init Pagination
			$this->pagination->initialize($config);
			
			$data['title'] = 'Latest Projects';

			$data['projects'] = $this->project_model->get_projects(FALSE, $config['per_page'], $offset);
			$category_id = $this->input->post('category_id');
			$data['categories'] = $this->project_model->get_categories();
			$data['categoriesFiltered'] = $this->project_model->get_categories_filtered($category_id);

			$this->load->view('templates/header');
			$this->load->view('projects/index', $data);
			$this->load->view('templates/footer');
		}

		public function all($slug = NULL){
			
			$data['title'] = 'All Projects';

			$data['projects'] = $this->project_model->get_all_projects();
			// $category_id = $this->project_model->get_all_projects_catID();;
			// $data['category_name'] = $this->category_model->get_category_name($category_id);
			// $user_id = $data['projects']['user_id'];
			// $data['student_name'] = $this->user_model->get_name($user_id);

			$this->load->view('templates/header');
			$this->load->view('projects/all', $data);
			$this->load->view('templates/footer');

		}

		public function videograph($slug = NULL){
			$data['title'] = 'Project Data';
			$data['project'] = $this->project_model->get_projects_view($slug);
			$category = $data['project']['category_name'];
			if ($category == 'Video'){
				$data['designrating1'] = $this->project_model->get_design_rating1($slug);
				$data['designrating2'] = $this->project_model->get_design_rating2($slug);
				$data['designrating3'] = $this->project_model->get_design_rating3($slug);
				$data['designrating4'] = $this->project_model->get_design_rating4($slug);
				$data['designrating5'] = $this->project_model->get_design_rating5($slug);
				$data['videorating1'] = $this->project_model->get_video_rating1($slug);
				$data['videorating2'] = $this->project_model->get_video_rating2($slug);
				$data['videorating3'] = $this->project_model->get_video_rating3($slug);
				$data['videorating4'] = $this->project_model->get_video_rating4($slug);
				$data['videorating5'] = $this->project_model->get_video_rating5($slug);
				$data['audiorating1'] = $this->project_model->get_audio_rating1($slug);
				$data['audiorating2'] = $this->project_model->get_audio_rating2($slug);
				$data['audiorating3'] = $this->project_model->get_audio_rating3($slug);
				$data['audiorating4'] = $this->project_model->get_audio_rating4($slug);
				$data['audiorating5'] = $this->project_model->get_audio_rating5($slug);
				$data['storylinerating1'] = $this->project_model->get_storyline_rating1($slug);
				$data['storylinerating2'] = $this->project_model->get_storyline_rating2($slug);
				$data['storylinerating3'] = $this->project_model->get_storyline_rating3($slug);
				$data['storylinerating4'] = $this->project_model->get_storyline_rating4($slug);
				$data['storylinerating5'] = $this->project_model->get_storyline_rating5($slug);
				$data['creativityrating1'] = $this->project_model->get_creativity_rating1($slug);
				$data['creativityrating2'] = $this->project_model->get_creativity_rating2($slug);
				$data['creativityrating3'] = $this->project_model->get_creativity_rating3($slug);
				$data['creativityrating4'] = $this->project_model->get_creativity_rating4($slug);
				$data['creativityrating5'] = $this->project_model->get_creativity_rating5($slug);
			}else if($category == 'Web'){
				$data['designrating1'] = $this->project_model->get_design_rating1($slug);
				$data['designrating2'] = $this->project_model->get_design_rating2($slug);
				$data['designrating3'] = $this->project_model->get_design_rating3($slug);
				$data['designrating4'] = $this->project_model->get_design_rating4($slug);
				$data['designrating5'] = $this->project_model->get_design_rating5($slug);
				$data['responsivenessrating1'] = $this->project_model->get_responsiveness_rating1($slug);
				$data['responsivenessrating2'] = $this->project_model->get_responsiveness_rating2($slug);
				$data['responsivenessrating3'] = $this->project_model->get_responsiveness_rating3($slug);
				$data['responsivenessrating4'] = $this->project_model->get_responsiveness_rating4($slug);
				$data['responsivenessrating5'] = $this->project_model->get_responsiveness_rating5($slug);
				$data['functionalityrating1'] = $this->project_model->get_functionality_rating1($slug);
				$data['functionalityrating2'] = $this->project_model->get_functionality_rating2($slug);
				$data['functionalityrating3'] = $this->project_model->get_functionality_rating3($slug);
				$data['functionalityrating4'] = $this->project_model->get_functionality_rating4($slug);
				$data['functionalityrating5'] = $this->project_model->get_functionality_rating5($slug);
				$data['interactivityrating1'] = $this->project_model->get_interactivity_rating1($slug);
				$data['interactivityrating2'] = $this->project_model->get_interactivity_rating2($slug);
				$data['interactivityrating3'] = $this->project_model->get_interactivity_rating3($slug);
				$data['interactivityrating4'] = $this->project_model->get_interactivity_rating4($slug);
				$data['interactivityrating5'] = $this->project_model->get_interactivity_rating5($slug);
				$data['creativityrating1'] = $this->project_model->get_creativity_rating1($slug);
				$data['creativityrating2'] = $this->project_model->get_creativity_rating2($slug);
				$data['creativityrating3'] = $this->project_model->get_creativity_rating3($slug);
				$data['creativityrating4'] = $this->project_model->get_creativity_rating4($slug);
				$data['creativityrating5'] = $this->project_model->get_creativity_rating5($slug);
			}

			$data['interestedyes'] = $this->project_model->get_interested_yes($slug);
			$data['interestedno'] = $this->project_model->get_interested_no($slug);

			// $category_id = $this->project_model->get_all_projects_catID();;
			// $data['category_name'] = $this->category_model->get_category_name($category_id);
			// $user_id = $data['projects']['user_id'];
			// $data['student_name'] = $this->user_model->get_name($user_id);

			$this->load->view('templates/header');
			$this->load->view('projects/videograph', $data);
			$this->load->view('templates/footer');
		}

		public function webgraph($slug = NULL){
			$data['title'] = 'Project Data';
			$data['project'] = $this->project_model->get_projects_view($slug);
			$category = $data['project']['category_name'];
			if ($category == 'Video'){
				$data['designrating1'] = $this->project_model->get_design_rating1($slug);
				$data['designrating2'] = $this->project_model->get_design_rating2($slug);
				$data['designrating3'] = $this->project_model->get_design_rating3($slug);
				$data['designrating4'] = $this->project_model->get_design_rating4($slug);
				$data['designrating5'] = $this->project_model->get_design_rating5($slug);
				$data['videorating1'] = $this->project_model->get_video_rating1($slug);
				$data['videorating2'] = $this->project_model->get_video_rating2($slug);
				$data['videorating3'] = $this->project_model->get_video_rating3($slug);
				$data['videorating4'] = $this->project_model->get_video_rating4($slug);
				$data['videorating5'] = $this->project_model->get_video_rating5($slug);
				$data['audiorating1'] = $this->project_model->get_audio_rating1($slug);
				$data['audiorating2'] = $this->project_model->get_audio_rating2($slug);
				$data['audiorating3'] = $this->project_model->get_audio_rating3($slug);
				$data['audiorating4'] = $this->project_model->get_audio_rating4($slug);
				$data['audiorating5'] = $this->project_model->get_audio_rating5($slug);
				$data['storylinerating1'] = $this->project_model->get_storyline_rating1($slug);
				$data['storylinerating2'] = $this->project_model->get_storyline_rating2($slug);
				$data['storylinerating3'] = $this->project_model->get_storyline_rating3($slug);
				$data['storylinerating4'] = $this->project_model->get_storyline_rating4($slug);
				$data['storylinerating5'] = $this->project_model->get_storyline_rating5($slug);
				$data['creativityrating1'] = $this->project_model->get_creativity_rating1($slug);
				$data['creativityrating2'] = $this->project_model->get_creativity_rating2($slug);
				$data['creativityrating3'] = $this->project_model->get_creativity_rating3($slug);
				$data['creativityrating4'] = $this->project_model->get_creativity_rating4($slug);
				$data['creativityrating5'] = $this->project_model->get_creativity_rating5($slug);
			}else if($category == 'Web'){
				$data['designrating1'] = $this->project_model->get_design_rating1($slug);
				$data['designrating2'] = $this->project_model->get_design_rating2($slug);
				$data['designrating3'] = $this->project_model->get_design_rating3($slug);
				$data['designrating4'] = $this->project_model->get_design_rating4($slug);
				$data['designrating5'] = $this->project_model->get_design_rating5($slug);
				$data['responsivenessrating1'] = $this->project_model->get_responsiveness_rating1($slug);
				$data['responsivenessrating2'] = $this->project_model->get_responsiveness_rating2($slug);
				$data['responsivenessrating3'] = $this->project_model->get_responsiveness_rating3($slug);
				$data['responsivenessrating4'] = $this->project_model->get_responsiveness_rating4($slug);
				$data['responsivenessrating5'] = $this->project_model->get_responsiveness_rating5($slug);
				$data['functionalityrating1'] = $this->project_model->get_functionality_rating1($slug);
				$data['functionalityrating2'] = $this->project_model->get_functionality_rating2($slug);
				$data['functionalityrating3'] = $this->project_model->get_functionality_rating3($slug);
				$data['functionalityrating4'] = $this->project_model->get_functionality_rating4($slug);
				$data['functionalityrating5'] = $this->project_model->get_functionality_rating5($slug);
				$data['interactivityrating1'] = $this->project_model->get_interactivity_rating1($slug);
				$data['interactivityrating2'] = $this->project_model->get_interactivity_rating2($slug);
				$data['interactivityrating3'] = $this->project_model->get_interactivity_rating3($slug);
				$data['interactivityrating4'] = $this->project_model->get_interactivity_rating4($slug);
				$data['interactivityrating5'] = $this->project_model->get_interactivity_rating5($slug);
				$data['creativityrating1'] = $this->project_model->get_creativity_rating1($slug);
				$data['creativityrating2'] = $this->project_model->get_creativity_rating2($slug);
				$data['creativityrating3'] = $this->project_model->get_creativity_rating3($slug);
				$data['creativityrating4'] = $this->project_model->get_creativity_rating4($slug);
				$data['creativityrating5'] = $this->project_model->get_creativity_rating5($slug);
			}

			$data['interestedyes'] = $this->project_model->get_interested_yes($slug);
			$data['interestedno'] = $this->project_model->get_interested_no($slug);

			// $category_id = $this->project_model->get_all_projects_catID();;
			// $data['category_name'] = $this->category_model->get_category_name($category_id);
			// $user_id = $data['projects']['user_id'];
			// $data['student_name'] = $this->user_model->get_name($user_id);

			$this->load->view('templates/header');
			$this->load->view('projects/webgraph', $data);
			$this->load->view('templates/footer');
		}

		public function gamegraph($slug = NULL){
			$data['title'] = 'Project Data';
			$data['project'] = $this->project_model->get_projects_view($slug);
			$category = $data['project']['category_name'];
				$data['designrating1'] = $this->project_model->get_design_rating1($slug);
				$data['designrating2'] = $this->project_model->get_design_rating2($slug);
				$data['designrating3'] = $this->project_model->get_design_rating3($slug);
				$data['designrating4'] = $this->project_model->get_design_rating4($slug);
				$data['designrating5'] = $this->project_model->get_design_rating5($slug);
				$data['responsivenessrating1'] = $this->project_model->get_responsiveness_rating1($slug);
				$data['responsivenessrating2'] = $this->project_model->get_responsiveness_rating2($slug);
				$data['responsivenessrating3'] = $this->project_model->get_responsiveness_rating3($slug);
				$data['responsivenessrating4'] = $this->project_model->get_responsiveness_rating4($slug);
				$data['responsivenessrating5'] = $this->project_model->get_responsiveness_rating5($slug);
				$data['functionalityrating1'] = $this->project_model->get_functionality_rating1($slug);
				$data['functionalityrating2'] = $this->project_model->get_functionality_rating2($slug);
				$data['functionalityrating3'] = $this->project_model->get_functionality_rating3($slug);
				$data['functionalityrating4'] = $this->project_model->get_functionality_rating4($slug);
				$data['functionalityrating5'] = $this->project_model->get_functionality_rating5($slug);
				$data['interactivityrating1'] = $this->project_model->get_interactivity_rating1($slug);
				$data['interactivityrating2'] = $this->project_model->get_interactivity_rating2($slug);
				$data['interactivityrating3'] = $this->project_model->get_interactivity_rating3($slug);
				$data['interactivityrating4'] = $this->project_model->get_interactivity_rating4($slug);
				$data['interactivityrating5'] = $this->project_model->get_interactivity_rating5($slug);
				$data['creativityrating1'] = $this->project_model->get_creativity_rating1($slug);
				$data['creativityrating2'] = $this->project_model->get_creativity_rating2($slug);
				$data['creativityrating3'] = $this->project_model->get_creativity_rating3($slug);
				$data['creativityrating4'] = $this->project_model->get_creativity_rating4($slug);
				$data['creativityrating5'] = $this->project_model->get_creativity_rating5($slug);

			$data['interestedyes'] = $this->project_model->get_interested_yes($slug);
			$data['interestedno'] = $this->project_model->get_interested_no($slug);

			// $category_id = $this->project_model->get_all_projects_catID();;
			// $data['category_name'] = $this->category_model->get_category_name($category_id);
			// $user_id = $data['projects']['user_id'];
			// $data['student_name'] = $this->user_model->get_name($user_id);

			$this->load->view('templates/header');
			$this->load->view('projects/gamegraph', $data);
			$this->load->view('templates/footer');
		}

		public function view($slug = NULL){
			$data['project'] = $this->project_model->get_projects_view($slug);
			$project_id = $data['project']['project_id'];
			$data['comments'] = $this->comment_model->get_comments($project_id);
			$data['commentsCounts'] = $this->comment_model->get_comments_counts($project_id);

			if(empty($data['project'])){
				show_404();
			}

			$data['title'] = $data['project']['title'];

			$this->load->view('templates/header');
			$this->load->view('projects/view', $data);
			$this->load->view('templates/footer');

		}

		public function pending($offset = 0){

			// // Pagination Config
			// $config['base_url'] = base_url().'projects/index/';
			// $config['total_rows'] = $this->db->count_all('projects');
			// $config['per_page'] = 3;
			// $config['uri_segment'] = 3;
			// $config['attributes'] = array('class' => 'pagination-link');

			// // Init Pagination
			// $this->pagination->initialize($config);
			
			$data['title'] = 'Pending Projects';
			$data['projects'] = $this->project_model->get_projects_by_pending(FALSE);

			$this->load->view('templates/header');
			$this->load->view('projects/pending', $data);
			$this->load->view('templates/footer');

		}

		public function pendingview($slug = NULL){
			$data['project'] = $this->project_model->get_projects_by_pending($slug);
			$project_id = $data['project']['project_id'];
			$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);

			if(empty($data['project'])){
				show_404();
			}

			$data['title'] = $data['project']['title'];

			$this->load->view('templates/header');
			$this->load->view('projects/pendingview', $data);
			$this->load->view('templates/footer');

		}

		public function approved($offset = 0){

			// // Pagination Config
			// $config['base_url'] = base_url().'projects/index/';
			// $config['total_rows'] = $this->db->count_all('projects');
			// $config['per_page'] = 3;
			// $config['uri_segment'] = 3;
			// $config['attributes'] = array('class' => 'pagination-link');

			// // Init Pagination
			// $this->pagination->initialize($config);
			
			$data['title'] = 'Approved Projects';
			$data['projects'] = $this->project_model->get_projects_by_approved(FALSE);

			$this->load->view('templates/header');
			$this->load->view('projects/approved', $data);
			$this->load->view('templates/footer');

		}

		public function approvedview($slug = NULL){
			$data['project'] = $this->project_model->get_projects_by_approved($slug);
			$project_id = $data['project']['project_id'];
			$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);

			if(empty($data['project'])){
				show_404();
			}

			$data['title'] = $data['project']['title'];

			$this->load->view('templates/header');
			$this->load->view('projects/approvedview', $data);
			$this->load->view('templates/footer');

		}

		public function rejected($offset = 0){

			// // Pagination Config
			// $config['base_url'] = base_url().'projects/index/';
			// $config['total_rows'] = $this->db->count_all('projects');
			// $config['per_page'] = 3;
			// $config['uri_segment'] = 3;
			// $config['attributes'] = array('class' => 'pagination-link');

			// // Init Pagination
			// $this->pagination->initialize($config);
			
			$data['title'] = 'Rejected Projects';
			$data['projects'] = $this->project_model->get_projects_by_rejected(FALSE);

			$this->load->view('templates/header');
			$this->load->view('projects/rejected', $data);
			$this->load->view('templates/footer');

		}

		public function rejectedview($slug = NULL){
			$data['project'] = $this->project_model->get_projects_by_rejected($slug);
			$project_id = $data['project']['project_id'];
			$data['comments'] = $this->comment_model->get_comments_by_supervisor($project_id);

			if(empty($data['project'])){
				show_404();
			}

			$data['title'] = $data['project']['title'];

			$this->load->view('templates/header');
			$this->load->view('projects/rejectedview', $data);
			$this->load->view('templates/footer');

		}

		public function upload(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['title'] = 'Upload Project';

			$data['categories'] = $this->project_model->get_categories();

			$this->form_validation->set_rules('title', 'Title', 'required');
			$this->form_validation->set_rules('body', 'Body', 'required');
			//$this->form_validation->set_rules('userfile', 'Image', 'required');
			$this->form_validation->set_rules('video_link', 'Youtube Link', 'required|trim|callback_validate_youtube');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('projects/upload', $data);
				$this->load->view('templates/footer');
			}else{

				// Image upload
				    $config = array();
					$config['upload_path'] = './assets/images/projects';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size'] = '2048000';
					$config['max_width'] = '2000';
					$config['max_height'] = '2000';
				    $this->load->library('upload', $config, 'imageupload'); // Create custom object for cover upload
				    $this->imageupload->initialize($config);
				    $upload_image = $this->imageupload->do_upload('image');

				    // File upload
				    $config = array();
				    $config['upload_path'] = './assets/files';
				    $config['allowed_types'] = 'pdf|zip';
				    $config['max_size'] = '100000000';
				    $this->load->library('upload', $config, 'fileupload');  // Create custom object for catalog upload
				    $this->fileupload->initialize($config);
				    $upload_file = $this->fileupload->do_upload('files');

				    // Check uploads success
				    if ($upload_image && $upload_file) {

				      // Both Upload Success

				      // Data of your cover file
				      $image_data = $this->imageupload->data();
				      print_r($image_data);

				      // Data of your catalog file
				      $file_data = $this->fileupload->data();          
				      print_r($file_data);
						$project_image = $_FILES['image']['name'];
				      				$url = $this->input->post('video_link'); 
				parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars); 
				// parse youtube url to get id 
				$video_link = $my_array_of_vars['v']; 
				// send id and video title to database table 
				$this->project_model->upload_project($project_image,$video_link);
				// Set message
				$this->session->set_flashdata('project_created','Your project has been created');

				redirect('projects/pending');
				    } else {

				      // Error Occured in one of the uploads

				      echo 'Image upload Error : ' . $this->imageupload->display_errors() . '<br/>';
				      echo 'File upload Error : ' . $this->fileupload->display_errors() . '<br/>';
				    }
				// //Upload Image
				// $config['upload_path'] = './assets/images/projects';
				// $config['allowed_types'] = 'gif|jpg|png';
				// $config['max_size'] = '2048000';
				// $config['max_width'] = '2000';
				// $config['max_height'] = '2000';

				// $this->load->library('upload', $config);

				// if(!$this->upload->do_upload()){
				// 	$errors = array('error' => $this->upload->display_errors());
				// 	$project_image = 'noimage.jpg';
				// }else{
				// 	$data = array('upload_data' => $this->upload->data());
				// 	$project_image = $_FILES['userfile']['name'];
				// }

				

			}
		}

		// public function download($slug){
		// 	// if(!empty($project_id)){
  //  //          //load download helper
  //           $this->load->helper('download');
            
  //  //          //get file info from database
  //  //          $data['files'] = $this->file->getRows();
  //  //          $fileInfo = $this->file->getRows(array('project_id' => $project_id));
            
  //  //          //file path
  //  //          $file = 'assets/images/uploads'.$fileInfo['project_image'];
		// 	$project_image = $this->project_model->get_project_image($slug);
		// 	$data = 'Here is some text!';

  //           $name= file_get_contents("../assets/images/projects/".'maxresdefault.jpg');
  //           //download file from directory
  //           force_download($name, $data);
		// }

		public function delete($project_id){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->project_model->delete_project($project_id);

			// Set message
			$this->session->set_flashdata('project_deleted','Your project has been deleted');

			redirect('projects');
		}

		public function edit($slug){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$data['project'] = $this->project_model->get_projects($slug);

			// Check user
			if($this->session->userdata('user_id')!=$this->project_model->get_projects($slug)['user_id']){
				redirect('projects');
			}

			$data['categories'] = $this->project_model->get_categories();

			if(empty($data['project'])){
				show_404();
			}

			$data['title'] = 'Edit Project';

			$this->load->view('templates/header');
			$this->load->view('projects/edit', $data);
			$this->load->view('templates/footer');
		}

		public function update(){
			// Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}	
				$url = $this->input->post('video_link'); 
				parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars); 
				// parse youtube url to get id 
				$video_link = $my_array_of_vars['v']; 
				// send id and video title to database table 
			
			$this->project_model->update_project($video_link);

			// Set message
			$this->session->set_flashdata('project_updated','Your project has been updated');

			redirect('projects/pending');
		}

		public function validate_youtube($str){
		    preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $str, $matches);
		    if(!isset($matches[0])){ //if validation not passed
		        $this->form_validation->set_message('validate_youtube', 'Invalid <b>youtube link</b>.');
		        return FALSE;
		    }else{ //if validation passed
		        return TRUE;
		    }
		}

		public function approve($project_id, $slug){
			$email = $this->user_model->get_email($project_id);
			$title = $this->project_model->get_project_titles($project_id);
			$this->project_model->approve_projects($project_id);
			$this->load->library('email');

			$config['protocol'] = "smtp";
			// does not have to be gmail
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; 
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'sharingprojectsplatforms@gmail.com';
			$config['smtp_pass'] = 'MrrKelvin941017';
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['newline'] = "\r\n";
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

				$this->email->from('sharingprojectsplatforms@gmail.com', 'Sharing Projects Platforms');
				$this->email->to($email);
				// $this->email->to('kelvintanchunyin941017@gmail.com');
				$this->email->subject('Your Project is approved');
				$this->email->message('The '.$title.' project is been approved.');

				if($this->email->send())
			     {
			      echo 'Email sent.';
			     }
			     else
			    {
			     show_error($this->email->print_debugger());
			    }
				redirect('projects/all'.$slug);
		}

		public function action($project_id, $slug){
			$email = $this->user_model->get_email($project_id);
			$title = $this->project_model->get_project_titles($project_id);
			if($this->input->post('accept')){
				$this->project_model->approve_projects($project_id);

			$this->load->library('email');

			$config['protocol'] = "smtp";
			// does not have to be gmail
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; 
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'sharingprojectsplatforms@gmail.com';
			$config['smtp_pass'] = 'MrrKelvin941017';
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['newline'] = "\r\n";
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

				$this->email->from('sharingprojectsplatforms@gmail.com', 'Sharing Projects Platforms');
				$this->email->to('kelvintanchunyin941017@gmail.com');
				$this->email->subject('Your Project is approved');
				$this->email->message('The '.$title.' project is been approved.');

				if($this->email->send())
			     {
			      echo 'Email sent.';
			     }
			     else
			    {
			     show_error($this->email->print_debugger());
			    }
				redirect('projects/all'.$slug);
			}else if($this->input->post('reject')){
				// // $this->form_validation->set_rules('name', 'Name', 'required');
				// // $this->form_validation->set_rules('body', 'Body', 'required');
				$this->comment_model->create_comment_supervisor($project_id);
				$this->project_model->reject_projects($project_id);
			$this->load->library('email');

			$config['protocol'] = "smtp";
			// does not have to be gmail
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; 
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'sharingprojectsplatforms@gmail.com';
			$config['smtp_pass'] = 'MrrKelvin941017';
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['newline'] = "\r\n";
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

				$this->email->from('sharingprojectsplatforms@gmail.com', 'Sharing Projects Platforms');
				$this->email->to('kelvintanchunyin941017@gmail.com');
				$this->email->subject('Your Project is rejected');
				$this->email->message('The '.$title.' project is been rejected due to '.$this->input->post('comment_reason').'.\r\n'.'Comments from supervisor: '.$this->input->post('body'));

				if($this->email->send())
			     {
			      echo 'Email sent.';
			     }
			     else
			    {
			     show_error($this->email->print_debugger());
			    }

				redirect('projects/all'.$slug);
			}
			
		}

		public function rejecting($slug){
			$data['project'] = $this->project_model->get_projects_by_pending($slug);

			$this->load->view('templates/header');
			$this->load->view('projects/rejecting', $data);
			$this->load->view('templates/footer');
		}

		public function reject($project_id, $slug){
			$email = $this->user_model->get_email($project_id);
			$title = $this->project_model->get_project_titles($project_id);
			$this->comment_model->create_comment_supervisor($project_id);
			$this->project_model->reject_projects($project_id);
			$this->load->library('email');

			$config['protocol'] = "smtp";
			// does not have to be gmail
			$config['smtp_host'] = 'ssl://smtp.gmail.com'; 
			$config['smtp_port'] = '465';
			$config['smtp_user'] = 'sharingprojectsplatforms@gmail.com';
			$config['smtp_pass'] = 'MrrKelvin941017';
			$config['mailtype'] = 'html';
			$config['charset'] = 'utf-8';
			$config['newline'] = "\r\n";
			$config['wordwrap'] = TRUE;

			$this->email->initialize($config);

				$this->email->from('sharingprojectsplatforms@gmail.com', 'Sharing Projects Platforms');
				$this->email->to($email);
				$this->email->subject('Your Project is rejected');
				$this->email->message('The '.$title.' project is been rejected due to '.$this->input->post('comment_reason').'.\r\n'.'Comments from supervisor: '.$this->input->post('body'));

				if($this->email->send())
			     {
			      echo 'Email sent.';
			     }
			     else
			    {
			     show_error($this->email->print_debugger());
			    }

				redirect('projects/all'.$slug);
		}

		// public function status($id, $slug){
		// 	$this->project_model->status_projects($id);
		// 	redirect('projects/pending/'.$slug);
		// }

		public function discussion(){

			// // Pagination Config
			// $config['base_url'] = base_url().'projects/index/';
			// $config['total_rows'] = $this->db->count_all('projects');
			// $config['per_page'] = 3;
			// $config['uri_segment'] = 3;
			// $config['attributes'] = array('class' => 'pagination-link');

			// // Init Pagination
			// $this->pagination->initialize($config);
			
			$data['project'] = $this->project_model->get_projects_id();
			//$data['comment'] = $this->comment_model->get_comments_id();
			$data['title'] = 'Discussions on feedback';
			$project_id = $data['project']['project_id'];
			//$comment_id = $data['comment']['comment_id'];
			$data['comments'] = $this->comment_model->get_comments_discussions($project_id);
			//$data['discussions'] = $this->comment_model->get_discussions($comment_id);

			if(empty($data['project'])){
				show_404();
			}

			$this->load->view('templates/header');
			$this->load->view('projects/discussion', $data);
			$this->load->view('templates/footer');

		}

	}
