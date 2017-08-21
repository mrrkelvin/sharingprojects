                      <?php echo form_open('projects/reject/' .$project['project_id'],'data-toggle="validator"' ); ?>
<div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel"><b>Are you sure to REJECT this <?php echo $project['title']?> project?</b></h4>
                              </div>
<div class="modal-body">
                                <p><b>Please state the reason</b></p>
                                <table class="table table-bordered">
                                  <tr>
                                    <td>Copyright</td>
                                    <td><input type="checkbox" id="design" name="comment_reason" value="Copyright" class="sev_check"></td>
                                  </tr>
                                  <tr>
                                    <td>Grammar Error</td>
                                    <td><input type="checkbox" id="grammar" name="comment_reason" value="Grammar Error" class="sev_check"></td>
                                  </tr>
                                  <tr>
                                    <td>Qualtity</td>
                                    <td><input type="checkbox" id="quality" name="comment_reason" value="Quality" class="sev_check"></td>
                                  </tr>
                                </table>
                                <!-- <h3>Add Comment</h3> -->
                                  <div class="form-group" style="display:none;">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $this->session->userdata('name'); ?>">
                                  </div>
                                  <hr>
                                  <div class="form-group">
                                    <label>Add Comment Here:</label><h5>[Max:100 characters]</h5>
                                    <textarea name="body" maxlength="100" class="form-control has-feedback" required></textarea>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                  </div>
                                  <!-- <input type="hidden" name="slug" value="<?php echo $project['slug']; ?>"> -->
                                  <!-- <button class="btn btn-primary" type="submit">Submit</button> -->
                                <script>
                                  $('.sev_check').click(function() {
                                      $('.sev_check').not(this).prop('checked', false);
                                    });
                                </script>
                              </div>
                              <div class="modal-footer">
<!--                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                                
                                <input type="submit" value="rejected" class="btn btn-danger">
                                
                              </div>

                      </form>