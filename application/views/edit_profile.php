<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Edit Mosque Profile</h2> 
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
          <label>Address</label>
          <input type="text" class="form-control" name="address" required value="<?=$data['address']?>"/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Telp</label>
          <input type="text" class="form-control" name="telp" required value="<?=$data['telp']?>"/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" required value="<?=$data['email']?>"/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Url</label>
          <input type="text" class="form-control" name="url" required value="<?=$data['url']?>"/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Longitude</label>
          <input type="text" class="form-control" name="longitude" required value="<?=$data['longitude']?>"/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Latitude</label>
          <input type="text" class="form-control" name="latitude" required value="<?=$data['latitude']?>"/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Pic :</label>
          <br>
          <?php 
          $pic = 'mosque_default.png';
          if(!empty($data['pic'])){
            $pic = $data['pic'];
          }
          ?>
          <img src="<?=base_url()?>assets/image/mosque/<?=$pic?>" width="150"/>
          <input type="file" class="form-control" name="fupload">
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