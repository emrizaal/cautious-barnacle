<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Administrator</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href=".<?=base_url()?>assets/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url()?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url()?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="<?=base_url()?>assets/css/admin_style.css" rel="stylesheet">

    <link href="<?=base_url()?>assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?=base_url()?>assets/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Include Editor style. -->
    <link href="<?=base_url();?>assets/wysiwyg/css/froala_editor.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url();?>assets/wysiwyg/css/froala_style.min.css" rel="stylesheet" type="text/css" />

    <!-- Include Code Mirror style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">

    <!-- Include Editor Plugins style. -->
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/char_counter.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/code_view.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/colors.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/emoticons.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/file.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/fullscreen.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/image.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/image_manager.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/line_breaker.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/quick_insert.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/table.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/wysiwyg/css/plugins/video.css">
    
    <link href="<?=base_url()?>assets/css/jquery-ui.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Administrator</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Hello, <?=$this->session->userdata("name");?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url()?>mosque/editProfile/<?=$this->session->userdata('id_mosque')?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="<?=base_url()?>mosque/changePassword/<?=$this->session->userdata('id_mosque')?>"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?=base_url()?>auth/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php 
            $session = $this->session->userdata();
            ?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?=base_url()?>dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?=base_url()?>mosque"><img src="<?=base_url()?>assets/image/mosque/mosque_default.png" width="50"/> Mosque</a>
                        </li>
                        <?php if($session['kajian']==1){?>
                        <li>
                            <a href="<?=base_url()?>kajian"><i class="fa fa-user fa-fw"></i> Kajian</a>
                        </li>
                        <?php } ?>
                        <?php if($session['ustadz']==1){?>
                        <li>
                            <a href="<?=base_url()?>ustadz"><i class="fa fa-user fa-fw"></i> Ustadz</a>
                        </li>
                        <?php } ?>
                        <?php if($session['article']==1){?>
                        <li>
                            <a href="<?=base_url()?>article"><i class="fa fa-user fa-fw"></i> Article</a>
                        </li>
                        <?php } ?>
                        <?php if($session['ebook']==1){?>
                        <li>
                            <a href="<?=base_url()?>ebook"><i class="fa fa-user fa-fw"></i> E-Book</a>
                        </li>
                        <?php } ?>
                        <?php if($session['slider']==1){?>
                        <li>
                            <a href="<?=base_url()?>slider"><i class="fa fa-user fa-fw"></i> Slider</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?=base_url()?>popup"><i class="fa fa-user fa-fw"></i> Pop Up</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
        </nav>