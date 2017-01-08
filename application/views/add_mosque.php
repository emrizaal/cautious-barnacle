<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Add Mosque</h2> 
        <hr>
      </div>
    </div>
    <div class="row">
     <div class="col-md-12">
      <form action="<?=base_url()?>mosque/saveMosque" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>feature</label>
          <br>
          <label class="checkbox-inline">
            <input type="hidden" name="kajian" value="0" />
            <input type="checkbox" name="kajian" value="1">Kajian
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="ustadz" value="0" />
            <input type="checkbox" name="ustadz" value="1">Ustadz
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="ebook" value="0" />
            <input type="checkbox" name="ebook" value="1">Ebook
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="article" value="0" />
            <input type="checkbox" name="article" value="1">Article
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="slider" value="0" />
            <input type="checkbox" name="slider" value="1">Slider
          </label>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=base_url()?>mosque"><button type="button" class="btn btn-default">Cancel</button></a>
      </form>
    </div>
  </div>
</div>
<!-- /. PAGE INNER  -->
</div>
<?php 
$this->load->view("footer");
?>