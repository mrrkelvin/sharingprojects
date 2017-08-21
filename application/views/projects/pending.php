<?php if(!($this->session->userdata('user_role') == 'admin') && !($this->session->userdata('user_role') == 'supervisor') && !($this->session->userdata('user_role') == 'student')){
        $this->session->set_flashdata('Not_auth','Your are now loggout');
        redirect('users/logout');
      }
      ?>
<div class="page-header">
        <h2><?= $title ?></h2>
      </div>
      <div class="row">
           <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th width="350">Title</th>
                <th>Category</th>
                <th>Students</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
	            <?php $i = 1; ?>
		            <?php foreach($projects as $project) :?>
                  <?php if($this->session->userdata('user_id') == $project['user_id'] || $this->session->userdata('user_role') == 'admin' || $this->session->userdata('user_id') == $project['sv_id']): ?>
		              <tr>
		              	<td><?php echo $i; $i++; ?></td>
		              	<td><?php echo $project['title']; ?></td>
		              	<td><?= $project['category_name']; ?></td>
		              	<td><?= $project['name']; ?></td>
		              	<td><?php echo $project['status']; ?></td>
		              	<td>
                    <?php echo form_open('projects/approve/' .$project['project_id']); ?>
                      <a class="btn btn-default" href="<?php echo site_url('/projects/' .$project['slug']); ?>" style="margin:5px">Read More</a>
                      <?php if($this->session->userdata('user_role') == 'supervisor'): ?>
                      <?php if(!($project['status'] == 'approved')): ?>
                        <input type="submit" value="Approve Project" class="btn btn-success">
                      <?php endif; ?>
                        <?php if($project['status'] == 'pending'): ?>
                      
                        <a class="btn btn-danger" href="<?php echo base_url(); ?>projects/rejecting/<?php echo $project['slug']; ?>">Reject Project</a>
                      
                      <?php endif; ?>



                      <?php endif; ?>
                      </form>
                    </td>
		              </tr>
                  <?php endif; ?>
	              	<?php endforeach; ?>
                  <?php if (($i==1)): ?>
                  <tr>
                    <td style="text-align:center;" colspan="6"><?php echo 'No pending projects!'; ?></td>
                  </tr>
                  <?php endif; ?>
            </tbody>
          </table>
        </div>
         
        
        
