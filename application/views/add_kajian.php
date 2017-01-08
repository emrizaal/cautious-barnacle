<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Add Kajian</h2> 
        <hr>
      </div>
    </div>
    <div class="row">
     <div class="col-md-12">
       <form action="<?=base_url()?>kajian/saveKajian" method="POST" role="form" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Ustadz</label>
          <select name="ustadz" class="form-control" required>
            <?php 
            foreach ($ustadz as $u){
              ?>
              <option value="<?=$u['id_ustadz']?>"><?=$u['name']?></option>
              <?php 
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Description</label>
          <textarea name="description" class="form-control"></textarea>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Place</label>
          <input type="text" class="form-control" name="place" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Date</label>
          <input type="text" class="form-control" name="date" id="datepicker" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Time Start</label>
          <input type="text" class="form-control" name="time_start" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Time End</label>
          <input type="text" class="form-control" name="time_end" required/>
          <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
          <label>Image</label>
          <input type="file" class="form-control" name="fupload"/>
        </div>
        <div class="form-group">
          <label>Attachment</label>
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