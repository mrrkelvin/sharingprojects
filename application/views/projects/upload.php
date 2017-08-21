<?php if(!($this->session->userdata('user_role') == 'student')){
        $this->session->set_flashdata('Not_auth','Your are now loggout');
        redirect('users/logout');
      }
      ?>
<h2><?= $title; ?></h2>

<?php echo form_open_multipart('projects/upload','data-toggle="validator"'); ?>
    <style>
    p{

      color: red;
      margin-left: 10px;
    }
    </style>
  <div class="form-group has-feedback">
    <label>Title</label>
    <input type="text" class="form-control" minlength="3" maxlength="50" name="title" placeholder="Add Title" required>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group has-feedback">
    <label>Description</label>
    <textarea  class="form-control" name="body" placeholder="Add Body" required></textarea>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group has-feedback">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach ($categories as $category): ?>
        <option value="<?php echo $category['category_id']; ?>"><?php echo $category['category_name']; ?></option>
      <?php endforeach; ?>
    </select>
    </select>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
  <!-- <script>
        function choice() {
            if (document.getElementById("role").value == 'Video'){
              document.getElementById("demo").style.display = "block";
              document.getElementById("demo2").style.display = "none";
            }else{
              document.getElementById("demo").style.display = "none";
              document.getElementById("demo2").style.display = "block";
            }
        }
      </script> -->
  <div class="form-group has-feedback">
    <label>Upload Image</label><span> [Max size--2MB, Types--.gif/.jpg/.png]</span>
    <input type="file" name="image" size="20">
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
    <div class="form-group has-feedback">
    <label>Upload File</label><span> [Max size--100MB, Types--.pdf/.zip]</span>
    <input type="file" name="files" size="20">
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
  <div class="form-group has-feedback">
    <label>Upload Video</label>
    <input type="text" class="form-control" pattern="http://www\.youtube\.com\/(.+)|https://www\.youtube\.com\/(.+)" name="video_link" value="" required>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div>
<!--     <div class="form-group has-feedback" id="demo2" style="display:none;">
    <label>Upload Website</label>
    <input type="text" class="form-control" pattern="https?://.+" name="website_link" value="" required>
    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    <div class="help-block with-errors"></div>
  </div> -->
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