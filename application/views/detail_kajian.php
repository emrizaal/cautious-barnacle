<?php include_once "header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$data['name']?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <img src="<?=base_url()?>assets/image/kajian/<?=$data['pic']?>"" width="200px">
    </div>
    <div class="row">
        <div class="col-lg-12">
        place : <?=$data['place']?> <br>
        date : <?=$data['date']?> <br>
        time_start : <?=$data['time_start']?> <br>
        time_end : <?=$data['time_end']?><br>
        attachment : <a href="<?=base_url()?>assets/image/<?=$data['attachment']?>"></a><br>

        description : <?=$data['description']?>
     </div>
     <a href="<?=base_url()?>kajian"><button type="button" class="btn btn-default">Back</button></a>
     <!-- /.col-lg-12 -->
 </div>
</div>

<?php include_once "footer.php"; ?>