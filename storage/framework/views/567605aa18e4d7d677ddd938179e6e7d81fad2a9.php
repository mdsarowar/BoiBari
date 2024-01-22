<?php echo notify_js(); ?>
<?php echo app('notify')->render(); ?>
<?php echo midia_js(); ?>

<script src="<?php echo e(url('admin_new/assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/bootstrap.min.js')); ?>"></script>

<script src="<?php echo e(url('admin_new/assets/plugins/colorpicker/bootstrap-colorpicker.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/custom/custom-form-colorpicker.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/jszip.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datatables/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/custom/custom-table-datatable.js')); ?>"></script>



<script src="<?php echo e(url('admin_new/assets/js/bootstrap-iconpicker.bundle.min.js')); ?>"></script>


 <!-- Tagsinput js -->
<script src="<?php echo e(url('admin_new/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/bootstrap-tagsinput/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/modernizr.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/detect.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/vertical-menu.js')); ?>"></script>

<!-- chart js -->
<script src="<?php echo e(url('admin_new/assets/plugins/chart.js/chart.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/chart.js/chart-bundle.min.js')); ?>"></script>
<script src="<?php echo e(url('front/vendor/js/moment-with-locales.js')); ?>"></script>
 


<!-- Switchery js -->
<script src="<?php echo e(url('admin_new/assets/plugins/switchery/switchery.min.js')); ?>"></script>
<!-- Apex js -->
<script src="<?php echo e(url('admin_new/assets/plugins/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/apexcharts/irregular-data-series.js')); ?>"></script>    
<!-- Slick js -->
<script src="<?php echo e(url('admin_new/assets/plugins/slick/slick.min.js')); ?>"></script>
<!-- Pnotify js -->
<script src="<?php echo e(url('admin_new/assets/plugins/pnotify/js/pnotify.custom.min.js')); ?>"></script>
<!-- Select2 js -->
<script src="<?php echo e(url('admin_new/assets/plugins/select2/select2.min.js')); ?>"></script>

<script src="<?php echo e(url('admin_new/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/custom/custom-form-touchspin.js')); ?>"></script>

<script src="<?php echo e(url('admin_new/assets/js/bs-custom-file-input.min.js')); ?>"></script>

 <!-- datepicker -->
<script src="<?php echo e(url('admin_new/assets/plugins/datepicker/datepicker.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/datepicker/i18n/datepicker.en.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/custom/custom-form-datepicker.js')); ?>"></script> 


<!-- Vector Maps js -->
<script src="<?php echo e(url('admin_new/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<?php if(selected_lang()->rtl_available == 0): ?>
	<script>var rtl = false;</script>
<?php else: ?> 
	<script>var rtl = true;</script>	
<?php endif; ?>
<script src="<?php echo e(url('admin_new/assets/js/custom/custom-dashboard.js')); ?>"></script>

<!-- TinyMCE Editor -->
<script src="<?php echo e(url('admin_new/assets/plugins/tinymce/tinymce.min.js')); ?>" referrerpolicy="origin"></script>
 
<script src="<?php echo e(url('admin_new/assets/js/master.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/js/core.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/assets/plugins/pace/pace.min.js')); ?>"></script>
  
<script>
	PNotify.desktop.permission();
	<?php if(session('warning')): ?>
		var warning = new PNotify( {
            title: 'Warning', text: '<?php echo e(session('warning')); ?>', type: 'primary', desktop: {
                desktop: true, icon: 'feather icon-thumbs-down'
            }
    	});

    	warning.get().click(function() {
            warning.remove();
        });
	<?php endif; ?>

	<?php if(session('added')): ?>
		var success = new PNotify( {
	            title: 'Success', text: '<?php echo e(session('added')); ?>', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-up'
            }
	    });

	    success.get().click(function() {
            success.remove();
        });
	<?php endif; ?>

	<?php if(session('updated')): ?>
		var info = new PNotify( {
	            title: 'Updated', text: '<?php echo e(session('updated')); ?>', type: 'success', desktop: {
                desktop: true, icon: 'feather icon-thumbs-up'
            }
	    });

	    info.get().click(function() {
            info.remove();
        });
	<?php endif; ?>

	<?php if(session('deleted')): ?>
		var deleted = new PNotify( {
		    title: 'Deleted', text: '<?php echo e(session('deleted')); ?>', type: 'error' , desktop: {
                desktop: true, icon: 'feather icon-trash-2'
            }
		});

		deleted.get().click(function() {
            deleted.remove();
        });
	<?php endif; ?>

	$('.select2').select2();

	$( function() {
		
	    
	
		bsCustomFileInput.init()
	});

</script>
<script>
    var brandindexurl = <?php echo json_encode(route('brand.index'), 15, 512) ?>;
    var cityindex = <?php echo json_encode(route('city.index'), 15, 512) ?>;
    var countyindex = <?php echo json_encode(route('country.index'), 15, 512) ?>;
    var baseUrl = <?php echo json_encode(url('/'), 15, 512) ?>;
</script>
<?php if(auth()->check() && auth()->user()->role_id == 'v'): ?>
<!-- Default Seller js -->
<script src="<?php echo e(url('js/seller.js')); ?>"></script>
<?php elseif(auth()->check() && auth()->user()->role_id == 'a'): ?>
<!-- Default Admin js -->
<script src="<?php echo e(url('js/admin.js')); ?>"></script>
<?php endif; ?>
<?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/layouts/scripts.blade.php ENDPATH**/ ?>