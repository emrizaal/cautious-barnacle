<?php include_once "header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Article</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <a href="<?=base_url()?>article/addArticle"><button class="btn btn-primary">Add Article</button></a>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Article List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pic</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach($data as $d){
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><img height="200px" src="<?=base_url()?>assets/image/article/<?=$d['pic']?>"></td>
                                        <td><?=$d['title']?></td>
                                        <td><?=substr($d['content'], 0,255)?></td>
                                        <td>
                                            <a href="<?=base_url()?>article/editArticle/<?=$d['id_article']?>"><button class="btn btn-success"><span class="fa fa-pencil"></span></button></a>
                                            <a href="<?=base_url()?>article/deleteArticle/<?=$d['id_article']?>" onclick="return confirm('Are you sure you ?');"><button class="btn btn-danger"><span class="fa fa-eraser"></span></button></a>
                                            <a href="<?=base_url()?>article/detailArticle/<?=$d['id_article']?>"><button class="btn btn-primary"><span class="fa fa-external-link"></span></button></a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
</div>

<?php include_once "footer.php"; ?>