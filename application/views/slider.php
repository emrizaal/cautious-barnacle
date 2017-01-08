<?php include_once "header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Slider</h1>
        </div>
    </div>
    <div class="row">
    <div class="col-sm-12">
           <div class="panel panel-default">
            <div class="panel-heading">
                Add Slider
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
               <form action="<?=base_url()?>slider/saveSlider" method="POST" role="form" enctype="multipart/form-data">
                  <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control" name="fupload"/>
                  </div>
                  <div class="radio">
                      <label><input type="radio" name="status" value="1" checked>Active</label>
                  </div>
                  <div class="radio">
                      <label><input type="radio" name="status" value="0">Not Active</label>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary">Save</button>
              </form>
          </div>
      </div>
  </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Slider List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Pic</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach($data as $d){
                                    ?>
                                    <tr>
                                        <td><img height="200px" src="<?=base_url()?>assets/image/slider/<?=$d['pic']?>"></td>
                                        <td>
                                            <form method="POST" action="<?=base_url()?>slider/updateStatus">
                                                <input type="hidden" name="id_slider" value=<?=$d['id_slider']?>>
                                                <select class="form-control" name="status">
                                                    <option value="1" <?=$d['status']==1 ? 'selected' : ''?>>Active</option>
                                                    <option value="0" <?=$d['status']==0 ? 'selected' : ''?>>Not Active</option>
                                                </select>
                                                <button type="submit" class="btn btn-xs btn-primary">Update</button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="<?=base_url()?>slider/deleteSlider/<?=$d['id_slider']?>" onclick="return confirm('Are you sure you ?');"><button class="btn btn-danger"><span class="fa fa-eraser"></span></button></a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>

<?php include_once "footer.php"; ?>