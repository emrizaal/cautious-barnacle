<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Edit Mosque</h2> 
        <hr>
      </div>
    </div>
    <div class="row">
     <div class="col-md-12">
      <form action="<?=base_url()?>mosque/updateMosque" method="POST" role="form" enctype="multipart/form-data">
        <input type="hidden" name="id_mosque" value="<?=$data['id_mosque']?>">
        <div class="form-group">
          <label>Username</label>
          <input type="text" class="form-control" name="username" required value="<?=$data['username']?>" />
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" required value="<?=$data['name']?>"/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" required value="<?=$data['email']?>"/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>feature</label>
          <br>
          <label class="checkbox-inline">
            <input type="hidden" name="kajian" value="0" />
            <input type="checkbox" name="kajian" value="1" <?=$data['kajian']==1 ? 'checked' : ''?>>Kajian
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="ustadz" value="0" />
            <input type="checkbox" name="ustadz" value="1" <?=$data['ustadz']==1 ? 'checked' : ''?>>Ustadz
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="ebook" value="0" />
            <input type="checkbox" name="ebook" value="1" <?=$data['ebook']==1 ? 'checked' : ''?>>Ebook
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="article" value="0" />
            <input type="checkbox" name="article" value="1" <?=$data['article']==1 ? 'checked' : ''?>>Article
          </label>
          <label class="checkbox-inline">
            <input type="hidden" name="slider" value="0" />
            <input type="checkbox" name="slider" value="1" <?=$data['slider']==1 ? 'checked' : ''?>>Slider
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