<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Add Ustadz</h2> 
        <hr>
      </div>
    </div>
    <div class="row">
     <div class="col-md-12">
     <form action="<?=base_url()?>ustadz/saveUstadz" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Photo</label>
          <input type="file" class="form-control" name="fupload"/>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=base_url()?>ustadz"><button type="button" class="btn btn-default">Cancel</button></a>
      </form>
    </div>
  </div>
</div>
<!-- /. PAGE INNER  -->
</div>
<?php 
$this->load->view("footer");
?>