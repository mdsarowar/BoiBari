<!-- Fevicon -->
<link rel="icon" href="<?php echo e(url('images/genral/'.$fevicon)); ?>" type="image/gif" sizes="16x16">
<!-- Fonts  -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<link href="//fonts.googleapis.com/css2?family=Teko:wght@300&display=swap" rel="stylesheet">

<link href="<?php echo e(url('admin_new/assets/plugins/colorpicker/bootstrap-colorpicker.css')); ?>" rel="stylesheet" type="text/css">  
<!-- theme css -->
<link type="text/css" rel="stylesheet" href="<?php echo e(url("admin_new/assets/css/bootstrap-iconpicker.min.css")); ?>"/>
<!-- Font Awesome -->
<link rel="stylesheet" type="text/css" href="<?php echo e(url('css/font-awesome.min.css')); ?>">


<!-- Sidebar css -->
<?php if($dashsetting->sidebar_enable== 1 || $dashsetting->seller_enable == 1): ?>
<link rel="stylesheet" href="<?php echo e(url('admin_new/assets/css/style_sidebar.css')); ?>" type="text/css">
<?php else: ?>
<link href="<?php echo e(url('admin_new/assets/css/theme.css')); ?>" rel="stylesheet">
<?php endif; ?>

<?php
if(Schema::hasTable('admincustomisations')){
  $color = App\Admincustomisation::first();
}
?>
<?php if(isset($color)): ?>
<style type="text/css">

:root {
    --bg_grey_color: <?php echo e($color['bg_grey_color']); ?>;
    --bg_white_color: <?php echo e($color['bg_white_color']); ?>;
    --text-grey-color: <?php echo e($color['text-grey-color']); ?>;
    --text_dark_color: <?php echo e($color['text_dark_color']); ?>;
    --text_white_color: <?php echo e($color['text_white_color']); ?>;
    --text_blue_color: <?php echo e($color['text_blue_color']); ?>;
}
</style>
<?php else: ?>
<style type="text/css">

:root {
    --bg_grey_color: #9a9a9a;
    --bg_white_color: #FFFFFF;

    --text-grey-color: #9a9a9a;
    --text_dark_color: #141d46;
    --text_white_color: #FFF;
    --text_blue_color: #157ed2;
}
</style>
<?php endif; ?>

<!-- /Sidebar css -->

<!-- Switchery css -->

 <!-- Datepicker css -->
 <link href="<?php echo e(url('admin_new/assets/plugins/datepicker/datepicker.min.css')); ?>" rel="stylesheet" type="text/css">

 <link href="<?php echo e(url('admin_new/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css')); ?>" rel="stylesheet">
 <!-- Touchspin css -->
 <link href="<?php echo e(url('admin_new/assets/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')); ?>" rel="stylesheet" type="text/css">

<link href="<?php echo e(url('admin_new/assets/plugins/switchery/switchery.min.css')); ?>" rel="stylesheet">
<!-- Select2 css -->
<link href="<?php echo e(url('admin_new/assets/plugins/select2/select2.min.css')); ?>" rel="stylesheet" type="text/css">
<!-- Animation CSS -->
<link rel="stylesheet"  href="//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<!-- Slick css -->
<link href="<?php echo e(url('admin_new/assets/plugins/slick/slick.css')); ?>" rel="stylesheet">
<link href="<?php echo e(url('admin_new/assets/plugins/slick/slick-theme.css')); ?>" rel="stylesheet">
<link href="<?php echo e(url('admin_new/assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(url('admin_new/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(url('admin_new/assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(url('admin_new/assets/plugins/pnotify/css/pnotify.custom.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(url('admin_new/assets/css/icons.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(url('admin_new/assets/css/flag-icon.min.css')); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo e(url('admin_new/assets/plugins/datatables/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('admin_new/assets/plugins/datatables/buttons.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />

 <!-- Responsive Datatable css -->
<link href="<?php echo e(url('admin_new/assets/plugins/datatables/responsive.bootstrap4.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php if(selected_lang()->rtl_available == 0): ?>
    <link href="<?php echo e(url('admin_new/assets/css/style.css')); ?>" rel="stylesheet" type="text/css">
<?php else: ?>
    <link href="<?php echo e(url('admin_new/assets/css/style_rtl.css')); ?>" rel="stylesheet" type="text/css">
<?php endif; ?>
 <!-- Preloadrer Pace -->
<link rel="stylesheet" type="text/css" href="<?php echo e(url('css/vendor/pace.min.css')); ?>">
<!-- jQuery ui css -->
<link href="<?php echo e(url('admin_new/assets/plugins/jquery-ui/jquery-ui.min.css')); ?>" rel="stylesheet" type="text/css">
<!-- End css -->

<?php echo notify_css(); ?>
<?php echo midia_css(); ?>

<script src="<?php echo e(url('admin_new/assets/js/jquery.min.js')); ?>"></script>
<?php echo $__env->yieldContent('stylesheet'); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/layouts/head.blade.php ENDPATH**/ ?>