
<?php $__env->startSection('title','Boibari | My Account'); ?>
<?php $__env->startSection("content"); ?>   
    <!-- Home Start -->
    <section id="home" class="home-main-block product-home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb" class="breadcrumb-main-block">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Account')); ?></li>
              </ol>
            </nav>
            <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('<?= URL::to('/'); ?>/frontend/assets/images/wishlist/breadcrum.png');">
              <div class="breadcrumb-nav">
                  <h3 class="breadcrumb-title"><?php echo e(__('Account')); ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home End -->

    <!-- My Account Start -->
    <section id="my-account" class="my-account-main-block popular-item-main-block">
      <div class="container">
        <div class="row">
            <?php $active['active'] = 'Info'; ?>
          <?php echo $__env->make('frontend.profile.sidebar',$active, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="col-lg-9 col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                
                <div class="personal-info-block">
                    <div>
                        <h3 class="section-title"><?php echo e(__('Personal Information')); ?></h3>
                    </div>
                    <div>
                        <form method="post" action="<?php echo e(url('update_profile/'.$user->id)); ?>" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-30">
                                        <label for="firstname" class="form-label"><?php echo e(__('UserName')); ?> : <span class="required">*</span></label>
                                        <input autofocus type="text" id="firstname" required name="name" value="<?php echo e($user->name); ?>" class="form-control" placeholder="Please enter User name">
                                        <span class="required"><?php echo e($errors->first('name')); ?></span>
                                    </div>
                                </div>







                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-30">
                                        <label for="mob" class="form-label"><?php echo e(__('Mobile No.')); ?> <span class="required">*</span></label>
                                        <input placeholder="Please enter mobile no" type="text" id="mob" name="mobile" value="<?php echo e($user->mobile); ?>" class="form-control">
                                        <span class="required"><?php echo e($errors->first('mobile')); ?></span>
                                    </div>
                                </div>






                                <?php echo $__env->make('frontend.bdlocation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-lg-6 col-md-6">
                                    <div class="mb-30">
                                        <label for="profile" class="form-label"><?php echo e(__('Profile')); ?></label>
                                        <input type="file" id="profile" name="image" onchange="readURL(this);" class="form-control">
                                    </div><br>
                                    <div class="thumbnail-img-block mb-3">
                                    <img id="image-pre" class="img-fluid" alt="">
                                    </div>  
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-form-btn">
                                        <input type="submit" value="Update Profile" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- My Account End -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
<script>
    $('.thumbnail-img-block').hide();
    function readURL(input) {

      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('.thumbnail-img-block').show();
          $('#image-pre').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/profile/personal_info.blade.php ENDPATH**/ ?>