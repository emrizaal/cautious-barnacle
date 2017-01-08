<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Change Password</h2> 
        <hr>
      </div>
    </div>
    <?=$info?>
    <div class="row">
     <div class="col-md-12">
      <form action="<?=base_url()?>mosque/savePassword" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Old Password:</label>
          <input type="password" class="form-control" id="" name="old" required>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label for="">New Password:</label>
          <input id="inputPassword" type="password" data-minlength="6" class="form-control" id="" name="new" required>
          <div class="help-block">Minimum of 6 characters</div>
        </div>
        <div class="form-group">
          <label for="">Confirm Password:</label>
          <input id="inputPasswordConfirm" data-match="#inputPassword" type="password" class="form-control" id="" name="confirm" required>
          <div class="help-block with-errors"></div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=base_url()?>dashboard"><button type="button" class="btn btn-default">Cancel</button></a>
      </form>
    </div>
  </div>
</div>
<!-- /. PAGE INNER  -->
</div>
<?php 
$this->load->view("footer");
?>