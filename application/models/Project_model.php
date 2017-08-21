<?php
	class Project_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_projects_view($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}


			if($slug === FALSE){
					$this->db->order_by('projects.project_id', 'DESC');
					$this->db->join('categories','categories.category_id = projects.category_id');
					$query = $this->db->get_where('projects', array('status' => 'approved'));
					return $query->result_array();
				}else{
					$this->db->order_by('projects.project_id', 'DESC');
				$this->db->join('categories','categories.category_id = projects.category_id');
				$query = $this->db->get_where('projects', array('slug' => $slug));
				return $query->row_array();
				}
				
		
			
		}

		public function get_projects($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}

			if($this->input->post('category_id') == null){
				$this->db->order_by('projects.project_id', 'DESC');
					$this->db->join('categories','categories.category_id = projects.category_id');
					$query = $this->db->get_where('projects', array('status' => 'approved'));
					return $query->result_array();
			}else{
				if($slug === FALSE){
					$this->db->order_by('projects.project_id', 'DESC');
					$this->db->join('categories','categories.category_id = projects.category_id');
					$query = $this->db->get_where('projects', array('projects.category_id'=>$this->input->post('category_id'),'status' => 'approved'));
					return $query->result_array();
				}else{
					$this->db->order_by('projects.project_id', 'DESC');
				$this->db->join('categories','categories.category_id = projects.category_id');
				$query = $this->db->get_where('projects', array('projects.category_id'=>$this->input->post('category_id'),'slug' => $slug));
				return $query->row_array();
				}
				
			}
			
		}

		public function upload_project($project_image,$video_link){
			$slug = url_title($this->input->post('title'));
			$this->db->where('user_id', $this->session->userdata('user_id'));
			$q = $this->db->get('users');
			$sv_id = $q->result_array();

			// if ($this->input->post('category_name')=='Video'){
			// 	$data = array(
			// 	'title' => $this->input->post('title'),
			// 	'slug' => $slug.time(),
			// 	'body' => $this->input->post('body'),
			// 	'category_id' => $this->input->post('category_id'),
			// 	'user_id' => $this->session->userdata('user_id'),
			// 	'project_image' => $project_image,
			// 	'video_link' => $video_link,
			// 	'status' => 'pending',
			// 	'sv_id' => $sv_id[0]['sv_id']
			// );
			// }else if($this->input->post('category_name')=='Game'){
			// 	$data = array(
			// 	'title' => $this->input->post('title'),
			// 	'slug' => $slug.time(),
			// 	'body' => $this->input->post('body'),
			// 	'category_id' => $this->input->post('category_id'),
			// 	'user_id' => $this->session->userdata('user_id'),
			// 	'project_image' => $project_image,
			// 	//'website_link' => $this->input->post('website_link'),
			// 	'status' => 'pending',
			// 	'sv_id' => $sv_id[0]['sv_id']
			// );
			// }else if($this->input->post('category_name')=='Web'){
			// 	$data = array(
			// 	'title' => $this->input->post('title'),
			// 	'slug' => $slug.time(),
			// 	'body' => $this->input->post('body'),
			// 	'category_id' => $this->input->post('category_id'),
			// 	'user_id' => $this->session->userdata('user_id'),
			// 	'project_image' => $project_image,
			// 	//'website_link' => $this->input->post('website_link'),
			// 	'status' => 'pending',
			// 	'sv_id' => $sv_id[0]['sv_id']
			// );
			
			// }

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug.time(),
				'body' => $this->input->post('body'),
				'category_id' => $this->input->post('category_id'),
				'user_id' => $this->session->userdata('user_id'),
				'project_image' => $project_image,
				'video_link' => $video_link,
				'status' => 'pending',
				'sv_id' => $sv_id[0]['sv_id']
			);
			

			return $this->db->insert('projects', $data);
		}

		public function delete_project($project_id){
			$image_file_name = $this->db->select('project_image')->get_where('projects', array('project_id' => $project_id))->row()->project_image;
			$cwd = getcwd(); // save the current working directory
			$image_file_path = $cwd."\\assets\\images\\projects\\";
			chdir($image_file_path);
			unlink($image_file_name);
			chdir($cwd); // Restore the previous working directory
			$this->db->where('project_id', $project_id);
			$this->db->delete('projects');
			return true;
		}

		public function update_project($video_link){
			$slug = url_title($this->input->post('title'));

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'body' => $this->input->post('body'),
				'category_id' =>$this->input->post('category_id'),
				'video_link' => $video_link,
				'status' => 'pending'
				);

			$this->db->where('project_id', $this->input->post('project_id'));
			return $this->db->update('projects', $data);
		}

		public function get_categories(){
			$this->db->order_by('category_name');
			$query = $this->db->get('categories');
			return $query->result_array();
		}

		public function get_categories_filtered($category_id){
			$query = $this->db->get_where('categories',array('category_id' => $category_id));
			return $query->result_array();
		}

		public function get_projects_by_category($category_id){
			// $this->db->order_by('projects.project_id', 'DESC');
			// $this->db->join('categories','categories.category_id = projects.category_id');
			$query = $this->db->get_where('projects', array('category_id' => $category_id, 'status' => 'approved'));
			return $query->result_array();
		}

		public function get_projects_by_pending($slug = FALSE){

			if($slug === FALSE){
				$this->db->order_by('projects.project_id', 'DESC');
				$this->db->join('categories','categories.category_id = projects.category_id');
				$this->db->join('users','users.user_id = projects.user_id');
				$query = $this->db->get_where('projects', array('status' => 'pending'));
				return $query->result_array();
			}
			$this->db->order_by('projects.project_id', 'DESC');
			$this->db->join('categories','categories.category_id = projects.category_id');
			$this->db->join('users','users.user_id = projects.user_id');
			$query = $this->db->get_where('projects', array('slug' => $slug));
			return $query->row_array();
			
		}

		public function get_projects_by_approved($slug = FALSE){

			if($slug === FALSE){
				$this->db->order_by('projects.project_id', 'DESC');
				$this->db->join('categories','categories.category_id = projects.category_id');
				$this->db->join('users','users.user_id = projects.user_id');
				$query = $this->db->get_where('projects', array('status' => 'approved'));
				return $query->result_array();
			}
			$this->db->order_by('projects.project_id', 'DESC');
			$this->db->join('categories','categories.category_id = projects.category_id');
			$this->db->join('users','users.user_id = projects.user_id');
			$query = $this->db->get_where('projects', array('slug' => $slug));
			return $query->row_array();
			
		}

		public function get_projects_by_rejected($slug = FALSE){

			if($slug === FALSE){
				$this->db->order_by('projects.project_id', 'DESC');
				$this->db->join('categories','categories.category_id = projects.category_id');
				$this->db->join('users','users.user_id = projects.user_id');
				$query = $this->db->get_where('projects', array('status' => 'rejected'));
				return $query->result_array();
			}
			$this->db->order_by('projects.project_id', 'DESC');
			$this->db->join('categories','categories.category_id = projects.category_id');
			$this->db->join('users','users.user_id = projects.user_id');
			$query = $this->db->get_where('projects', array('slug' => $slug));
			return $query->row_array();
			
		}
		public function approve_projects($project_id){
			$this->db->set('status', 'approved');
			$this->db->where('project_id', $project_id);
			$this->db->update('projects');
		
		}

		public function reject_projects($project_id){
			if($this->input->post('design')){
				$this->db->set('status', 'rejected');
				$this->db->set('reject_reason', $this->input->post('comment_reason'));
				$this->db->where('project_id', $project_id);
				$this->db->update('projects');
			}else if($this->input->post('grammar')){
				$this->db->set('status', 'rejected');
				$this->db->set('reject_reason', $this->input->post('comment_reason'));
				$this->db->where('project_id', $project_id);
				$this->db->update('projects');
			}else if($this->input->post('quality')){
				$this->db->set('status', 'rejected');
				$this->db->set('reject_reason', $this->input->post('comment_reason'));
				$this->db->where('project_id', $project_id);
				$this->db->update('projects');
			}else{
				$this->db->set('status', 'rejected');
				$this->db->set('reject_reason', $this->input->post('comment_reason'));
				$this->db->where('project_id', $project_id);
				$this->db->update('projects');
			}
			
		
		}

		public function changesv($student_id,$sv_id){
			$this->db->set('sv_id', $sv_id);
			$this->db->where('user_id', $student_id);
			$this->db->update('projects');
		
		}

		public function get_projects_id(){
			$query = $this->db->get('projects');
			return $query->row_array();
		
		}

		public function get_project_image($slug){
			$query = $this->db->get_where('projects',array('slug' => $slug));
			$ret = $query->row();
			return $ret->project_image;
		}

		public function get_project_title($slug){
			$query = $this->db->get_where('projects',array('slug' => $slug));
			$ret = $query->row();
			return $ret->title;
		}

		public function get_project_titles($project_id){
			$query = $this->db->get_where('projects',array('project_id' => $project_id));
			$ret = $query->row();
			return $ret->title;
		}

		public function get_all_projects(){
			$this->db->join('categories','categories.category_id = projects.category_id');
			$this->db->join('users','users.user_id = projects.user_id');
			$this->db->order_by('projects.project_id', 'DESC');
			$query = $this->db->get('projects');
			return $query->result_array();
		}

		public function get_all_projects_catID(){
			$query = $this->db->get('projects');
			$ret = $query->row();
			return $ret->category_id;
		}

		public function get_design_rating1($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'design_rating' => 1));
			return $query->num_rows();
		}

		public function get_design_rating2($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'design_rating' => 2));
			return $query->num_rows();
		}

		public function get_design_rating3($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'design_rating' => 3));
			return $query->num_rows();
		}

		public function get_design_rating4($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'design_rating' => 4));
			return $query->num_rows();
		}

		public function get_design_rating5($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'design_rating' => 5));
			return $query->num_rows();
		}

		public function get_video_rating1($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'video_rating' => 1));
			return $query->num_rows();
		}

		public function get_video_rating2($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'video_rating' => 2));
			return $query->num_rows();
		}

		public function get_video_rating3($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'video_rating' => 3));
			return $query->num_rows();
		}

		public function get_video_rating4($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'video_rating' => 4));
			return $query->num_rows();
		}

		public function get_video_rating5($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'video_rating' => 5));
			return $query->num_rows();
		}

		public function get_audio_rating1($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'audio_rating' => 1));
			return $query->num_rows();
		}

		public function get_audio_rating2($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'audio_rating' => 2));
			return $query->num_rows();
		}

		public function get_audio_rating3($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'audio_rating' => 3));
			return $query->num_rows();
		}

		public function get_audio_rating4($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'audio_rating' => 4));
			return $query->num_rows();
		}

		public function get_audio_rating5($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'audio_rating' => 5));
			return $query->num_rows();
		}

		public function get_storyline_rating1($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'storyline_rating' => 1));
			return $query->num_rows();
		}

		public function get_storyline_rating2($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'storyline_rating' => 2));
			return $query->num_rows();
		}

		public function get_storyline_rating3($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'storyline_rating' => 3));
			return $query->num_rows();
		}

		public function get_storyline_rating4($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'storyline_rating' => 4));
			return $query->num_rows();
		}

		public function get_storyline_rating5($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'storyline_rating' => 5));
			return $query->num_rows();
		}

		public function get_creativity_rating1($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'creativity_rating' => 1));
			return $query->num_rows();
		}

		public function get_creativity_rating2($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'creativity_rating' => 2));
			return $query->num_rows();
		}

		public function get_creativity_rating3($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'creativity_rating' => 3));
			return $query->num_rows();
		}

		public function get_creativity_rating4($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'creativity_rating' => 4));
			return $query->num_rows();
		}

		public function get_creativity_rating5($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'creativity_rating' => 5));
			return $query->num_rows();
		}

		public function get_responsiveness_rating1($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'responsiveness_rating' => 1));
			return $query->num_rows();
		}

		public function get_responsiveness_rating2($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'responsiveness_rating' => 2));
			return $query->num_rows();
		}

		public function get_responsiveness_rating3($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'responsiveness_rating' => 3));
			return $query->num_rows();
		}

		public function get_responsiveness_rating4($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'responsiveness_rating' => 4));
			return $query->num_rows();
		}

		public function get_responsiveness_rating5($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'responsiveness_rating' => 5));
			return $query->num_rows();
		}

		public function get_functionality_rating1($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'functionality_rating' => 1));
			return $query->num_rows();
		}

		public function get_functionality_rating2($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'functionality_rating' => 2));
			return $query->num_rows();
		}

		public function get_functionality_rating3($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'functionality_rating' => 3));
			return $query->num_rows();
		}

		public function get_functionality_rating4($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'functionality_rating' => 4));
			return $query->num_rows();
		}

		public function get_functionality_rating5($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'functionality_rating' => 5));
			return $query->num_rows();
		}

		public function get_interactivity_rating1($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'interactivity_rating' => 1));
			return $query->num_rows();
		}

		public function get_interactivity_rating2($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'interactivity_rating' => 2));
			return $query->num_rows();
		}

		public function get_interactivity_rating3($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'interactivity_rating' => 3));
			return $query->num_rows();
		}

		public function get_interactivity_rating4($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'interactivity_rating' => 4));
			return $query->num_rows();
		}

		public function get_interactivity_rating5($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'interactivity_rating' => 5));
			return $query->num_rows();
		}
		
		public function get_interested_yes($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'interested' => 'yes'));
			return $query->num_rows();
		}

		public function get_interested_no($slug = FALSE){
			$query = $this->db->get_where('comments',array('slug' => $slug,'interested' => 'no'));
			return $query->num_rows();
		}

		// public function get_project_slug($project_id){
		// 	$query = $this->db->get_where('projects',array('project_id' => $project_id));
		// 	$ret = $query->row();
		// 	return $ret->slug;
		// }

		// public function status_projects($id){
		// 	$data = array(
		// 		'status' =>$this->input->post('status')
		// 		);

		// 	$this->db->where('id', $this->input->post('id'));
		// 	$this->db->update('projects', $data);
		
		// }
	}