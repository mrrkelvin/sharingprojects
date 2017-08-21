<?php if(!($this->session->userdata('user_id') == $project['user_id'])){
        $this->session->set_flashdata('Not_auth','Your are now loggout');
        redirect('users/logout');
      }
      ?>
<h2><?= $title ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('projects/update'); ?>
<input type="hidden" name="project_id" value="<?php echo $project['project_id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $project['title']; ?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"><?php echo $project['body']; ?></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['name']; ?></option>p
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label>Upload Video</label>
    <input type="text" class="form-control" name="video_link" value="">
  </div>
<!--   <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div> -->
  <button type="submit" class="btn btn-default">Submit</button>
</form>