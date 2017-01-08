<?php 
$this->load->view("header");
?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h2 align="center">Edit Article</h2> 
        <hr>
      </div>
    </div>
    <div class="row">
     <div class="col-md-12">
     <form action="<?=base_url()?>article/updateArticle" method="POST" role="form" enctype="multipart/form-data">
     <input type="hidden" name="id_article" value="<?=$data['id_article']?>">
        <div class="form-group"> 
          <label>Title</label>
          <input type="text" value="<?=$data['title']?>" class="form-control" name="title" required/>
          <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
          <label>Content</label>
          <textarea name="content" class="form-control"><?=$data['content']?></textarea>
        </div>
        <div class="form-group">
          <label>Photo</label>
          <br>
          <img src="<?=base_url()?>assets/image/article/<?=$data['pic']?>" height="300px">
          <input type="file" class="form-control" name="fupload"/>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="<?=base_url()?>article"><button type="button" class="btn btn-default">Cancel</button></a>
      </form>
    </div>
  </div>
</div>
<!-- /. PAGE INNER  -->
</div>
<?php 
$this->load->view("footer");
?>