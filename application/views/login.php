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
	

</head>
<body class="bglogin">
	<div class="container" style="padding-top:10%">
		<div id="myModals" class="modal-fade">
			<div class="modal-dialog" style="width:33%">
				<div class="modal-content">
					<div class="modal-header">
						<h4>Login Admin</h4>
					</div>
					<div class="modal-body">
						<?php echo form_open('auth/auth'); 
						if(isset($error) && $error) {
							echo "<p class='bg-danger text-danger' style='padding:10px; border-radius:4px'>Username dan Password yang Anda masukkan salah!</p><br>";
						}
						?>
						
						<form class="form-inline">
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-user-circle-o" aria-hidden="true" title="Username"></i></div>
									<input type="text" name="username" placeholder="Username" required class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-key" aria-hidden="true" title="Password"></i></div>
									<input type="password" name="password" placeholder="Password" required class="form-control">
								</div>
							</div>
							<div style="text-align: right">
								<input type="submit" name="submit" value="Login" class="btn btn-primary">
								<?php echo form_close(); ?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>
