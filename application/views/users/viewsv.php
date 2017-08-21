<?php if(!($this->session->userdata('user_role') == 'admin')){
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
                <th>Students' ID</th>
                <th>Students' Name</th>
                <th>Students' Email</th>
                <th>Supervisors' ID</th>
              </tr>
            </thead>
            <tbody>
	            <?php $i = 1; ?>
		            <?php foreach($students as $student) :?>
		              <tr>
		              	<td><?php echo $i; $i++; ?></td>
		              	<td><?php echo $student['user_id']; ?></td>
		              	<td><?= $student['name']; ?></td>
                    <td><?= $student['email']; ?></td>
                    <td><?= $student['sv_id']; ?></td>
		              </tr>
	              	<?php endforeach; ?>
                  <?php if (($i==1)): ?>
                  <tr>
                    <td style="text-align:center;" colspan="6"><?php echo 'No projects!'; ?></td>
                  </tr>
                  <?php endif; ?>
            </tbody>
          </table>
        </div>
<hr>
              <div class="row">
           <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Supervisors' ID</th>
                <th>Supervisors' Name</th>
                <th>Supervisors' Email</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1; ?>
                <?php foreach($supervisors as $supervisor) :?>
                  <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $supervisor['user_id']; ?></td>
                    <td><?= $supervisor['name']; ?></td>
                    <td><?= $supervisor['email']; ?></td>
                  </tr>
                  <?php endforeach; ?>
                  <?php if (($i==1)): ?>
                  <tr>
                    <td style="text-align:center;" colspan="6"><?php echo 'No projects!'; ?></td>
                  </tr>
                  <?php endif; ?>
            </tbody>
          </table>
        </div>
         
        
        
