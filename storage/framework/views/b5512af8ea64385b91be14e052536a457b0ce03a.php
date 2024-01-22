<?php $__env->startSection('title',__('Login')); ?>
<?php $__env->startSection('body'); ?>
<div class="body-content">
    <div class="container-fluid">
        <div class="sign-in-page">
            <div class="row">


                <div id="aniBox" class="col-md-6 col-sm-12 sign-in">
                    <h4 class=""><?php echo e(__('Sign in')); ?></h4>
                    <p class=""><?php echo e(__('Login Welcome')); ?></p>
                    <div class="social-sign-in outer-top-xs">

                        <div class="row">

                            <?php if($configs->fb_login_enable=='1'): ?>
                            <div class="col-md-4">
                                <a href="<?php echo e(url('login/facebook')); ?>" title="<?php echo e(__('SignInwithFacebook')); ?>"
                                    class="font-size-12 facebook-sign-in"><i class="fa fa-facebook"></i>Sign in with
                                    <?php echo e(__("Facebook")); ?>    
                                </a>
                            </div>
                            <?php endif; ?>

                            <?php if($configs->google_login_enable=='1'): ?>
                            <div class="col-md-4">
                                <a title="<?php echo e(__('SignInwithGoogle')); ?>" href="<?php echo e(url('login/google')); ?>"
                                    class="google-sign-in"><i class="fa fa-google"></i>
                                    <?php echo e(__('SignInwithGoogle')); ?></a>
                            </div>
                            <?php endif; ?>

                            <?php if($configs->twitter_enable == 1): ?>
                            <div class="col-md-4">
                                <a title="<?php echo e(__('SignInwithTwitter')); ?>" href="<?php echo e(url('login/twitter')); ?>"
                                    class="twitter-sign-in"><i
                                        class="fa fa-twitter"></i><?php echo e(__('Sign In With Twitter')); ?></a>
                            </div>
                            <?php endif; ?>


                        </div>

                        <div class="row margin-top-15">

                            <?php if(env('ENABLE_GITLAB') == 1 ): ?>
                                <div class="col-md-4">
                                    <a title="<?php echo e(__('SignInwithGitLab')); ?>" href="<?php echo e(url('login/gitlab')); ?>"
                                        class="gitlab"><i
                                            class="fa fa-gitlab"></i><?php echo e(__('Sign In with GitLab')); ?></a>
                                </div>
                            <?php endif; ?>


                            <?php if($configs->linkedin_enable=='1'): ?>
                                <div class="col-md-4">
                                    <a title="<?php echo e(__('SignInWithLinkedin')); ?>" href="<?php echo e(url('login/linkedin')); ?>"
                                        class="linkedin-sign-in"><i class="fa fa-linkedin-square" aria-hidden="true"></i>
                                        <?php echo e(__('Sign In With Linkedin')); ?></a>
                                </div>
                            <?php endif; ?>

                            <?php if($configs->amazon_enable=='1'): ?>
                                <div class="col-md-4">
                                    <a title="<?php echo e(__('SignInWithAmazon')); ?>" href="<?php echo e(url('login/amazon')); ?>"
                                        class="amazon-sign-in"><i class="fa fa-amazon" aria-hidden="true"></i>
                                        <?php echo e(__('Sign In With Amazon')); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if(Module::has('MimSms') && Module::find('MimSms')->isEnabled() && env('MIM_SMS_OTP_ENABLE') == 1 && env('DEFAULT_SMS_CHANNEL') == 'mim'): ?>
                        <?php echo $__env->make('mimsms::auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled() && env('DEFAULT_SMS_CHANNEL') == 'exabytes'): ?>
                        <?php echo $__env->make('exabytes::auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        
                        <form novalidate id="loginform" method="POST" class="form register-form outer-top-xs" role="form"
                            action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>

                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1"><?php echo e(__('Email')); ?>

                                    <span>*</span></label>
                                <input required type="email" name="email"
                                    class="form-control unicase-form-control text-input <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                    id="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputPassword1"><?php echo e(__('Password')); ?>

                                    <span>*</span></label>
                                <input required type="password" name="password"
                                    class="<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?> form-control unicase-form-control text-input"
                                    id="password">

                                <?php if($errors->has('password')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                                <?php endif; ?>
                            </div>
                            <div class="radio outer-xs form-check">
                                <label>
                                    <input type="checkbox" name="remember" id="remember"
                                        <?php echo e(old('remember') ? 'checked' : ''); ?>><?php echo e(__('Remember me')); ?>

                                </label>
                                <a href="<?php echo e(route('password.request')); ?>"
                                    class="forgot-password pull-right"><?php echo e(__('Forgot Your Password')); ?></a>
                                <a href="<?php echo e(route('register')); ?>"
                                    class="forgot-password pull-right"><?php echo e(__('New User Register Now')); ?>&nbsp;|&nbsp;&nbsp;</a>

                            </div>
                            <button type="submit" class="signin btn-upper btn btn-primary checkout-page-button"><?php echo e(__('Login')); ?></button>
                        </form>
                    <?php endif; ?>

                </div>
                <!-- Sign-in -->

                <div class="col-md-6">
                    <canvas id="canvas" class="float-right canvaslogin"></canvas>
                </div>

            </div><!-- /.row -->
        </div>
    </div><!-- /.container -->
</div><!-- /.body-content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('head-script'); ?>
<script src="<?php echo e(url('admin_new/plugins/flare/Flare.min.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/plugins/flare/gl-matrix.js')); ?>"></script>
<script src="<?php echo e(url('admin_new/plugins/flare/canvaskit.js')); ?>"></script>
<script src="<?php echo e(url('front/vendor/js/Event.js')); ?>"></script>
<script src="<?php echo e(url('front/vendor/js/loginanimation.js')); ?>"></script>
<script>
    var baseUrl = <?php echo json_encode(url('/'), 15, 512) ?>;
</script>
<script src="<?php echo e(url('js/login.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        'use strict';
        window.addEventListener('load', function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('form');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function (form) {
                form.addEventListener('submit', function (event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    } else {
                        $('.signin').html('<i class="fa fa-circle-o-notch fa-spin fa-fw"></i> <?php echo e(__("Login")); ?>');
                    }
                    form.classList.add('was-validated');

                }, false);

            });
        }, false);
    })();
</script>
<?php echo $__env->yieldPushContent('module-script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("front/layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/auth/login.blade.php ENDPATH**/ ?>