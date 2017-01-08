<?php include_once "header.php"; ?>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Kajian</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    
    <div class="row">
        <div class="col-lg-12">
            <a href="<?=base_url()?>kajian/addKajian"><button class="btn btn-primary">Add Kajian</button></a>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Kajian List
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Ustadz</th>
                                    <th>Place</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Attendance</th>
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
                                        <td><?=$d['name']?></td>
                                        <td><?=$d['ustadz']?></td>
                                        <td><?=$d['place']?></td>
                                        <td><?=$d['date']?></td>
                                        <td><?=date('H:i',strtotime($d['time_start']))?> - <?=date('H:i',strtotime($d['time_end']))?></td>
                                        <td><b><?=$d['attendance']?></b> Attend</td>
                                        <td>
                                            <a href="<?=base_url()?>kajian/editKajian/<?=$d['id_kajian']?>"><button class="btn btn-success"><span class="fa fa-pencil"></span></button></a>
                                            <a href="<?=base_url()?>kajian/deleteKajian/<?=$d['id_kajian']?>" onclick="return confirm('Are you sure you ?');"><button class="btn btn-danger"><span class="fa fa-eraser"></span></button></a>
                                            <a href="<?=base_url()?>Kajian/detailKajian/<?=$d['id_kajian']?>"><button class="btn btn-primary"><span class="fa fa-external-link"></span></button></a>
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