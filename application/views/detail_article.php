<?php include_once "header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$data['title']?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <img height="300px" src="<?=base_url()?>assets/image/article/<?=$data['pic']?>">
    </div>
    <div class="row">
        <div class="col-lg-12">
         <?=$data['content']?>
     </div>
     <a href="<?=base_url()?>article"><button type="button" class="btn btn-default">Back</button></a>
     <!-- /.col-lg-12 -->
 </div>
</div>

<?php include_once "footer.php"; ?>