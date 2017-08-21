<?php
	class Comment_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_projects_view($slug = FALSE, $limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}


			// $this->db->order_by('projects.project_id', 'DESC');
			// 	$this->db->join('categories','categories.category_id = projects.category_id');
				$query = $this->db->get_where('comments', array('slug' => $slug));
				return $query->row_array();
		}

		public function create_comment($project_id,$project_image,$title,$slug){
			if($this->input->post('category_name')=='Video'){
				$data = array(
					'project_id' => $project_id,
					'name' => $this->input->post('name'),
					'body' => $this->input->post('body'),
					'project_image' => $project_image,
					'title' => $title,
					'slug' => $slug,
					'type' => 'public',
					'design_rating' => $this->input->post('design_rating'),
					'video_rating' => $this->input->post('video_rating'),
					'audio_rating' => $this->input->post('audio_rating'),
					'storyline_rating' => $this->input->post('storyline_rating'),
					'creativity_rating' => $this->input->post('creativity_rating'),
					'interested' => $this->input->post('interested'),
				);
			

			}else if($this->input->post('category_name')=='Web'){
				$data = array(
					'project_id' => $project_id,
					'name' => $this->input->post('name'),
					'body' => $this->input->post('body'),
					'project_image' => $project_image,
					'title' => $title,
					'slug' => $slug,
					'type' => 'public',
					'design_rating' => $this->input->post('design_rating'),
					'responsiveness_rating' => $this->input->post('responsiveness_rating'),
					'functionality_rating' => $this->input->post('functionality_rating'),
					'interactivity_rating' => $this->input->post('interactivity_rating'),
					'creativity_rating' => $this->input->post('creativity_rating'),
					'interested' => $this->input->post('interested'),
				);
				
			}else if($this->input->post('category_name')=='Game'){
				$data = array(
					'project_id' => $project_id,
					'name' => $this->input->post('name'),
					'body' => $this->input->post('body'),
					'project_image' => $project_image,
					'title' => $title,
					'slug' => $slug,
					'type' => 'public',
					'design_rating' => $this->input->post('design_rating'),
					'responsiveness_rating' => $this->input->post('responsiveness_rating'),
					'functionality_rating' => $this->input->post('functionality_rating'),
					'interactivity_rating' => $this->input->post('interactivity_rating'),
					'creativity_rating' => $this->input->post('creativity_rating'),
					'interested' => $this->input->post('interested'),
				);
				
			}
			
			return $this->db->insert('comments', $data);
			
		}

		public function create_comment_supervisor($project_id){
			$data = array(
				'project_id' => $project_id,
				'name' => $this->input->post('name'),
				'body' => $this->input->post('body'),
				'comment_reason' => $this->input->post('comment_reason'),
				'type' => 'private',
			);

			return $this->db->insert('comments', $data);
		}

		public function create_comment_discussion($project_id,$comment_id){
			$data = array(
				'project_id' => $project_id,
				'name' => $this->input->post('name'),
				'body' => $this->input->post('body'),
				'comment_ref' => $this->input->post('comment_ref'),
				'type' => 'discussion',
			);
			return $this->db->insert('comments', $data);
		}

		public function get_comments($project_id){
			$query = $this->db->get_where('comments', array('project_id' => $project_id, 'type' => 'public'));
			return $query->result_array();
		}

		public function get_comments_counts($project_id){
			$query = $this->db->get_where('comments', array('project_id' => $project_id, 'type' => 'public'));
			return $query->num_rows();
		}

		public function get_comments_by_supervisor($project_id){
			$query = $this->db->get_where('comments', array('project_id' => $project_id, 'type' => 'private'));
			return $query->result_array();
		}

		public function get_discussions($comment_id){
			$query = $this->db->get_where('comments', array('comment_ref' => $comment_id, 'type' => 'discussion'));
			return $query->result_array();
		}

		public function get_comments_id(){
			$query = $this->db->get('comments');
			return $query->row_array();
		
		}

		public function get_comments_id_byslug($slug){
			$query = $this->db->get_where('comments',array('slug'=>$slug));
			return $query->row_array();
		
		}

		public function get_comments_discussions($project_id){
			if($this->input->post('category') == null){
				$this->db->order_by('comment_id', 'DESC');
				//$this->db->join('projects','comments.project_id = projects.project_id');
				$query = $this->db->get_where('comments', array('type' => 'public'));
				return $query->result_array();
			}else{
				$this->db->order_by('comment_id', 'DESC');
				//$this->db->join('projects','comments.project_id = projects.project_id');
				$query = $this->db->get_where('comments', array('category' => $this->input->post('category'), 'type' => 'public'));
				return $query->result_array();
			}
		}
	}