</div>
<!-- /#page-wrapper -->

</div>
<!-- jQuery -->
<script src="<?=base_url()?>assets/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/validator.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url()?>assets/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?=base_url()?>assets/js/sb-admin-2.js"></script>

<script src="<?=base_url()?>assets/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

<script src="<?=base_url()?>assets/js/jquery-ui.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true,
			"scrollX": true
		});
	});

	$( "#datepicker" ).datepicker({
		dateFormat: "yy-mm-dd"
	});

	$('form').validator();

</script>
<script src="<?=base_url();?>assets/tinymce/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector: "textarea",theme: "modern",height: 500,
		plugins: [
		"advlist autolink link image lists charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
		"table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
		],
		toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
		toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
		image_advtab: true ,

		external_filemanager_path:"<?=base_url();?>assets/filemanager/",
		filemanager_title:"Responsive Filemanager" ,
		external_plugins: { "filemanager" : "<?=base_url();?>assets/filemanager/plugin.min.js"}
	});


</script>
</body>

</html>