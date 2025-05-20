<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>by <?= anchor('#', 'RSIGondanglegi Team'); ?> <?= date('Y');?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
			<div class="modal-header bg-danger py-3">
				<h6 class="modal-title m-0 font-weight-bold text-white" id="exampleModalLabel">Ready to Leave?</h6>
				<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
            <div class="modal-body py-3">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer py-2">
				<a href="<?= base_url('auth/logout'); ?>" class="btn btn-primary btn-sm btn-icon-split">
					<span class="icon"><i class="fas fa-sign-out-alt"></i></span>
					<span class="text">Logout</span>
				</a>
				<button type="button" class="btn btn-danger btn-sm btn-icon-split" data-dismiss="modal">
					<span class="icon"><i class="fa fa-times"></i></span>
					<span class="text">Cancel</span>
				</button>
					
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="<?= base_url('assets/'); ?>vendor/datatables/buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/responsive/js/responsive.bootstrap4.min.js"></script>
	
<!-- Page level custom scripts -->
<script src="<?= base_url('assets/'); ?>vendor/summernote/summernote-bs4.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/ckeditor/ckeditor.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/dropify/dropify.min.js"></script>

<!-- tooltip button -->
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

  <!-- extraPlugins : 'syntaxhighlight', -->
<script type="text/javascript">
	$(function () {
		CKEDITOR.replace( 'ckeditor' ,{
			height: '300px',
				  
			toolbar: [
				 ['Source'] ,
				 ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','Blockquote','-','Styles','-','Format','-','FontSize'] 
				
			   ]              
		});
	});
</script>
		
<!-- Editor - Summernote -->
<script>
	$(document).ready(function(){
		$('#summernote').summernote({
			
			toolbar: [
				  ['font', ['bold', 'italic', 'underline','strikethrough', 'superscript', 'subscript', 'clear']],
				  ['para', ['ul', 'ol', 'paragraph']],
				  ['view', ['fullscreen', 'codeview', 'help']]
			],
			placeholder: 'write here...',
		});

	});
</script>
<script>
	$(document).ready(function(){
		$('.dropify').dropify({
			messages: {
                default: 'Drag atau drop untuk memilih gambar',
                replace: 'Ganti',
                remove:  'Hapus',
                error:   'error'
            }
		});
	});
	
</script>
<script>
    $('.form-check-input').on('click', function() {
        const sectionId = $(this).data('section');
        const roleId = $(this).data('role');
        $.ajax({
            url: "<?= base_url('myadmin/manage/changeaccess'); ?>",
            type: 'post',
            data: {
                sectionId: sectionId,
                roleId: roleId
            },
            success: function() {
                document.location.href = "<?= base_url('myadmin/manage/role/'); ?>"
                //document.location.href = "<?= base_url('myadmin/manage/role/'); ?>" + roleId
				//location.reload();
            }
        });

    });

    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>

<!-- DataTable custon export -->
<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#dataTable').DataTable({
			buttons: ['copy', 'csv', 'print', 'excel', 'pdf'],
			dom: "<'row px-2 px-md-4 pt-2'<'col-md-3'l><'col-md-5 text-center'B><'col-md-4'f>>" +
				"<'row'<'col-md-12'tr>>" +
				"<'row px-2 px-md-4 py-3'<'col-md-5'i><'col-md-7'p>>",
			lengthMenu: [
				[10, 25, 50, 100, -1],
				[10, 25, 50, 100, "All"]
			],
			columnDefs: [{
				targets: -1,
				orderable: false,
				searchable: false
			}]
		});

		table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
	});
</script>	
</body>

</html>