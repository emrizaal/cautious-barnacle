<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Edit Kajian</h2> 
        <hr>
      </div>
    </div>
    <div class="row">
     <div class="col-md-12">
       <form action="<?=base_url()?>kajian/updateKajian" method="POST" role="form" enctype="multipart/form-data">
         <input type="hidden" name="id_kajian" value="<?=$data['id_kajian']?>">
         <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="<?=$data['name']?>" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Ustadz</label>
          <select name="ustadz" class="form-control">
            <?php 
            foreach ($ustadz as $u){
              ?>
              <option value="<?=$u['id_ustadz']?>" <?=$u['id_ustadz']==$data['id_ustadz'] ? 'selected' : ''?>><?=$u['name']?></option>
              <?php 
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea name="description" class="form-control"><?=$data['description']?></textarea>
        </div>
        <div class="form-group">
          <label>Place</label>
          <input type="text" class="form-control" name="place" value="<?=$data['place']?>" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Date</label>
          <input type="text" class="form-control" name="date" id="datepicker" value="<?=$data['date']?>" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Time Start</label>
          <input type="text" class="form-control" name="time_start" value="<?=$data['time_start']?>" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Time End</label>
          <input type="text" class="form-control" name="time_end" value="<?=$data['time_end']?>" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Image</label><br>
          <img src="<?=base_url()?>assets/image/kajian/<?=$data['pic']?>" height="300px">
          <input type="file" class="form-control" name="fupload"/>
        </div>
        <div class="form-group">
          <label>Attachment</label><br>
          <a href="<?=base_url()?>assets/image/kajian/<?=$data['attachment']?>" target="_blank"><?=$data['attachment']?></a>
          <input type="file" class="form-control" name="attachment"/>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=base_url()?>kajian"><button type="button" class="btn btn-default">Cancel</button></a>
      </form>
    </div>
  </div>
</div>
<!-- /. PAGE INNER  -->
</div>
<?php 
$this->load->view("footer");
?>