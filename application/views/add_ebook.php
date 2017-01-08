<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Add Ebook</h2> 
        <hr>
      </div>
    </div>
    <div class="row">
     <div class="col-md-12">
     <form action="<?=base_url()?>ebook/saveEbook" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" name="title" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label>Url</label>
          <input type="text" class="form-control" name="url" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Image</label>
          <input type="file" class="form-control" name="fupload"/>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=base_url()?>ebook"><button type="button" class="btn btn-default">Cancel</button></a>
      </form>
    </div>
  </div>
</div>
<!-- /. PAGE INNER  -->
</div>
<?php 
$this->load->view("footer");
?>