<?php include_once "header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$data['name']?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <img src="<?=base_url()?>assets/image/ustadz/<?=$data['pic']?>">
    </div>
    <div class="row">
        <div class="col-lg-12">
         <?=$data['description']?>
     </div>
     <a href="<?=base_url()?>ustadz"><button type="button" class="btn btn-default">Back</button></a>
     <!-- /.col-lg-12 -->
 </div>
</div>

<?php include_once "footer.php"; ?>