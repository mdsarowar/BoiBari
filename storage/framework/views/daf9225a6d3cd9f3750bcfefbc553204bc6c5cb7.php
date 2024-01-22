
<?php $__env->startSection('title',__('Progressive Web App Setting | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'PWA Setting';
  $data['title0'] = 'Front Setting';
  $data['title1'] = 'PWA Setting';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
  <div class="row">
    
    <div class="col-lg-12">
		<?php if($errors->any()): ?>
			<div class="alert alert-danger" role="alert">
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span></button></p>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		<?php endif; ?>
      <div class="card m-b-30">
        <div class="card-header">
          
		  <div class="row">
            <div class="col-lg-8">
				<h5 class="box-title"><?php echo e(__('Progressive Web App Setting')); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <div class="wrapper-tooltip">
                  <button type="button" class="btn btn-primary-rgba"><i class="fa fa-info-circle float-right"></i></button>
                  <div class="tooltip">
				  	<ul>
						<li><b>HTTPS</b> <?php echo e(__("must required in your domain (for enable contact your host provider for SSL configuration)")); ?>.</li>
						<li><b><?php echo e(__("Icons and splash screens")); ?> </b> <?php echo e(__("required and to be updated in Icon Settings.")); ?></li>
					
						</li>
					</ul>
				  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
        <ul class="custom-tab-line nav nav-tabs mb-3" id="defaultTab" role="tablist">
            <li class="nav-item">
				<a class="nav-link active" id="home-tab-line" data-toggle="tab" href="#home-line" role="tab" aria-controls="home-line" aria-selected="true"><i class="feather icon-settings mr-2"></i><?php echo e(__("App Setting")); ?></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" id="profile-tab-line" data-toggle="tab" href="#profile-line" role="tab" aria-controls="profile-line" aria-selected="false"><i class="feather icon-upload mr-2"></i><?php echo e(__("Update Icons")); ?></a>
			</li>
        </ul>

		<div class="tab-content" id="defaultTabContentLine">
			<div class="tab-pane fade show active" id="home-line" role="tabpanel" aria-labelledby="home-tab-line">
				
				<div class="row">
					<div class="col-md-9">
						<form action="<?php echo e(route('pwa.setting.update')); ?>" method="POST" enctype="multipart/form-data">
							<?php echo csrf_field(); ?>
                               <div class="row">
							<div class="form-group col-md-6">
								<label class="text-dark"> <?php echo e(__("Enable PWA:")); ?> </label>
								<br>
								<label class="switch">
									<input id="pwa_enable" type="checkbox" name="PWA_ENABLE"
									<?php echo e(env("PWA_ENABLE") =='1' ? "checked" : ""); ?>>
									<span class="knob"></span>
								</label>
							</div>
							
							<div class="form-group col-md-12">
								<label class="text-dark"> <?php echo e(__('App Name:')); ?> </label>
								<input disabled class="form-control" type="text" name="app_name" value="<?php echo e(config("app.name")); ?>"/>
							</div>

							
							<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark"> <?php echo e(__("Theme Color for header:")); ?> </label>
										<div class="input-group initial-color">
											<input type="text" class="form-control input-lg" value="<?php echo e(env('PWA_THEME_COLOR') ?? ''); ?>" name="PWA_THEME_COLOR"  placeholder="#000000"/>
											<span class="input-group-append">
											<span class="input-group-text colorpicker-input-addon"><i></i></span>
											</span>
										</div>
										
									</div>
							</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark" for="">
											<?php echo e(__("Background Color:")); ?>

										</label>
										<div class="input-group initial-color">
											<input type="text" class="form-control input-lg" value="<?php echo e(env('PWA_BG_COLOR') ?? ''); ?>" name="PWA_BG_COLOR"  placeholder="#000000"/>
											<span class="input-group-append">
											<span class="input-group-text colorpicker-input-addon"><i></i></span>
											</span>
										</div>

										
									</div>
								</div>
							

							
								<div class="col-md-5">
									<div class="form-group">
										<label class="text-dark" for="">
											<?php echo e(__("Shortcut icon for cart:")); ?>

										</label>
										<!--  -->
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
											</div>
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="shorticon_1" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
												<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
											</div>
										</div>
									</div>
								</div>
										
										
								

								<div class="col-md-1 p-3 mb-2 bg-secondary rounded text-white">
								    <?php if($pwa_settings && $pwa_settings['shorticon_1']): ?>
								    <img class="img-fluid"  src="<?php echo e(url('images/icons/'.$pwa_settings?$pwa_settings['shorticon_1']:'')); ?>" alt="<?php echo e($pwa_settings?$pwa_settings['shorticon_1']:''); ?>">
								   
								    <?php endif; ?>
									
								</div>

								<div class="col-md-5">
									<div class="form-group">
										<label class="text-dark" for="">
											<?php echo e(__("Shortcut icon for wishlist:")); ?>

										</label>
										
										<div class="input-group mb-3">
											
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="shorticon_2" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
												<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
											</div>
										</div>
										
									</div>
								</div>
								

								<div class="col-md-1 p-3 mb-2 bg-secondary rounded text-white">
								    <?php if($pwa_settings && $pwa_settings['shorticon_2']): ?>
									<img class="img-fluid" src="<?php echo e(url('images/icons/'.$pwa_settings['shorticon_2'])); ?>" alt="<?php echo e($pwa_settings['shorticon_2']); ?>">
								    <?php endif; ?>
								</div>

								<div class="col-md-5">
									<div class="form-group">
										<label class="text-dark" for=""><?php echo e(__("Shortcut icon for login:")); ?></label>
										<!--  -->
										<div class="input-group mb-3">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="shorticon_3" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" >
												<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
											</div>
										</div>
										<!--  -->
									</div>
								</div>

								<div class="col-md-1 p-3 mb-2 bg-secondary rounded text-white">
								    <?php if($pwa_settings && $pwa_settings['shorticon_3']): ?> 
									<img class="img-fluid"  src="<?php echo e(url('images/icons/'.$pwa_settings['shorticon_3'])); ?>" alt="<?php echo e($pwa_settings['shorticon_3']); ?>">
								    <?php endif; ?>
								</div>

							</div>
							<button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary"><i class="fa fa-check-circle mr-2"></i>
										<?php echo e(__("Update")); ?></button>

						</form>
					</div>

					<div class="col-md-3">
						<img  src="<?php echo e(url('images/pwa.jpg')); ?>" alt="" class="img-fluid">
					</div>

				</div>
			</div>

			<div class="tab-pane fade" id="profile-line" role="tabpanel" aria-labelledby="profile-tab-line">
				<!-- === PWA Icons & Splash screens form start ======== -->
				<h4>
					<?php echo e(__("PWA Icons & Splash screens :")); ?>

				</h4>

				<hr>

				<form action="<?php echo e(route('pwa.icons.update')); ?>" method="POST" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
					<div class="row">
						
						<div class="col-md-8">
							<div class="form-group">
								<label class="text-dark" for=""> <?php echo e(__('PWA Icon')); ?> (512x512): <span class="text-danger">*</span> </label><br>
								
								<div class="input-group mb-3">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name="icon_512" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
											<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
										</div>
										
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<img style="height: 90px;" class="img-responsive" src="<?php echo e(url('images/icons/icon_512x512.png')); ?>" alt="icon_256x256.png">
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label class="text-dark" for=""> <?php echo e(__("PWA Splash Screen")); ?> (2048x2732): <span class="text-danger">*</span> </label>
								<!--  -->
								<div class="input-group mb-3">
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="splash_2048" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
										<label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
									</div>
								</div>
								<!--  -->
								
							</div>
						</div>

						<div class="col-md-4">
							<img style="height: 100px;" class="img-fluid" src="<?php echo e(url('images/icons/splash-2048x2732.png')); ?>" alt="splash-2048x2732.png">
						</div>

						<div class="col-md-12">
						<button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
							<button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i><?php echo e(__("Update")); ?></button>
						</div>
						
					</div>

					

				</form>
				<!-- === PWA Icons & Splash screens form end ===========-->
				</div>
				<!-- === PWA Icons & Splash screens end ======== -->

		    </div>
		</div>
	</div>
</div>
							

									
							

								
                        
                  
     
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
  <script src="<?php echo e(url('js/pwasetting.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/pwa/index.blade.php ENDPATH**/ ?>