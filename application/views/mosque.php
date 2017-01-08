<?php include_once "header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Mosque</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <a href="<?=base_url()?>mosque/addMosque"><button class="btn btn-primary">Add Mosque</button></a>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Mosque list
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Telp</th>
                                    <th>url</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no=1;
                                foreach ($data as $d){
                                    ?>
                                    <tr>
                                        <td><?=$no?></td>
                                        <td><?=$d['name']?></td>
                                        <td><?=$d['address']?></td>
                                        <td><?=$d['telp']?></td>
                                        <td><?=$d['url']?></td>
                                        <td>
                                            <a href="<?=base_url()?>mosque/editMosque/<?=$d['id_mosque']?>"><button class="btn btn-success"><span class="fa fa-pencil"></span></button></a>
                                            <a href="<?=base_url()?>mosque/deleteMosque/<?=$d['id_mosque']?>" onclick="return confirm('Are you sure you ?');"><button class="btn btn-danger"><span class="fa fa-eraser"></span></button></a>
                                            <a href="<?=base_url()?>mosque/detailMosque/<?=$d['id_mosque']?>"><button class="btn btn-primary"><span class="fa fa-external-link"></span></button></a>
                                        </td>
                                    </tr>
                                    <?php 
                                    $no++;
                                } 
                                ?>
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