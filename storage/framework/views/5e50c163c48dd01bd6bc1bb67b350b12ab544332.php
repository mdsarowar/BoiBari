<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" <?php if(selected_lang()->rtl_available == 1): ?> dir="rtl" <?php endif; ?>>
    <head>
      <?php if(env('GOOGLE_TAG_MANAGER_ID') != '' && env('GOOGLE_TAG_MANAGER_ENABLED') == true): ?>
        <?php echo $__env->make('googletagmanager::head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>

      <?php if(env('FACEBOOK_PIXEL_ID') != ''): ?>
      <?php echo $__env->make('facebook-pixel::head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php endif; ?>

      <style>
        :root {
          --background_blue_bg_color: #108BEA;
          --background_dark_blue_bg_color: #157ed2;
          --background_light_blue_bg_color: #0f6cb2;
          --background_black_bg_color: #2E353B;
          --background_white_bg_color: #FFF;
          --background_grey_bg_color: #e9e9de;
          --background_yellow_bg_color: #fdd922;
          --background_green_bg_color: #157ed2;
          --background_pink_bg_color: #ff7878;
          --text_white_color: #FFF;
          --text_black_color: #333;
          --text_light_black_color: #666;
          --text_blue_color: #157ed2;
          --text_yellow_color: #FDD922;
          --text_grey_color: #9a9a9a;
          --text_dark_grey_color: #abafb1;
          --text_dark_blue_color: #147ED2;
          --text_green_color: #12CCA7;
          --text_pink_color: #000;
        }

        img.lazy :not(hover-image) {
          background-image: url('//via.placeholder.com/200x200.png?text=loading');
          background-repeat: no-repeat;
          background-position: 50% 50%;
        }
      </style>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="all">
        <?php echo $__env->yieldContent('meta_tags'); ?>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="fallback_locale" content="<?php echo e(config('app.fallback_locale')); ?>">
        <!-- Theme Header Color -->
        <title><?php echo $__env->yieldContent('title'); ?> </title>
        <?php if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' && env('PWA_ENABLE') == 1): ?>
          <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
        <?php endif; ?>
        <link rel="icon" type="image/icon" href="<?php echo e(url('images/genral/'.$fevicon)); ?>"> <!-- favicon-icon -->
        
        <?php if(selected_lang()->rtl_available == 1): ?>
        <link rel="stylesheet" href="<?php echo e(url('frontend/assets/css/bootstrap.rtl.min.css')); ?>">
        <?php else: ?>
        <link rel="stylesheet" href="<?php echo e(url('frontend/assets/css/bootstrap.min.css')); ?>"> 
        <?php endif; ?>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> <!-- google font -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('frontend/assets/vendor/owl_carousel/css/owl.carousel.min.css')); ?>"> <!-- owl carousel css -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('frontend/assets/vendor/owl_carousel/css/owl.theme.default.min.css')); ?>"> <!-- owl theme default css -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('frontend/assets/vendor/slick/css/slick.css')); ?>"/> <!-- slick css -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('frontend/assets/vendor/slick/css/slick-theme.css')); ?>"> <!-- slick theme css -->
       
        <?php if(selected_lang()->rtl_available == 1): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('frontend/assets/css/style.rtl.css')); ?>">
        <?php else: ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('frontend/assets/css/style.css')); ?>">
        <?php endif; ?>
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('frontend/assets/vendor/font_awesome/css/all.min.css')); ?>"/> <!-- font awesome css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    </head>
    <body>
    
        <?php echo $__env->make('frontend.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('sweet::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- home start -->
        <?php echo $__env->yieldContent('content'); ?>

        <!-- Login Code -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="modal-close-btn">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              </div>
              <div class="modal-body">
                <div class="login-modal-block">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login-tab-pane" type="button" role="tab" aria-controls="login-tab-pane" aria-selected="true" title="login">Login</button>
                      </li>
                      <li class="nav-item" role="presentation">
                          <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup-tab-pane" type="button" role="tab" aria-controls="signup-tab-pane" aria-selected="false" title="sign up">Sign Up</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="login-tab-pane" role="tabpanel" aria-labelledby="login-tab" tabindex="0">
                        <div class="login-block">
                          <div class="social-login-block">
                              <h6 class="social-login-title"><?php echo e(__('Enter your credentials to login account')); ?></h6>
                              <ul>
                                <?php if($configs->fb_login_enable=='1'): ?>
                                  <li><a href="<?php echo e(url('login/facebook')); ?>" title="<?php echo e(__('Facebook')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/facebook.png')); ?>" class="img-fluid" alt="<?php echo e(__('Facebook')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if($configs->google_login_enable=='1'): ?>
                                  <li><a href="<?php echo e(url('login/google')); ?>" title="<?php echo e(__('Google')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/google.png')); ?>" class="img-fluid" alt="<?php echo e(__('Google')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if($configs->twitter_enable == 1): ?>
                                  <li><a href="<?php echo e(url('login/twitter')); ?>" title="<?php echo e(__('Twitter')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/twitter.png')); ?>" class="img-fluid" alt="<?php echo e(__('Twitter')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if(env('ENABLE_GITLAB') == 1 ): ?>
                                  <li><a href="<?php echo e(url('login/gitlab')); ?>" title="<?php echo e(__('Github')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/github.png')); ?>" class="img-fluid" alt="<?php echo e(__('Github')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if($configs->linkedin_enable=='1'): ?>
                                  <li><a href="<?php echo e(url('login/linkedin')); ?>" title="<?php echo e(__('Linkedin')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/linkedin.png')); ?>" class="img-fluid" alt="<?php echo e(__('Linkedin')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if($configs->amazon_enable=='1'): ?>
                                  <li><a href="<?php echo e(url('login/amazon')); ?>" title="<?php echo e(__('Amazon Pay')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/amazon-pay.png')); ?>" class="img-fluid" alt="<?php echo e(__('Amazon Pay')); ?>"></a></li>
                                <?php endif; ?>
                              </ul>
                              <h2><span>Or</span></h2>
                          </div>
                          
                            <form novalidate id="loginform" method="POST" class="form register-form outer-top-xs" role="form" action="<?php echo e(route('login')); ?>">
                              <?php echo csrf_field(); ?>
                                <?php if(Module::has('MimSms') && Module::find('MimSms')->isEnabled() && env('MIM_SMS_OTP_ENABLE') == 1 && env('DEFAULT_SMS_CHANNEL') == 'mim'): ?>
                                    <?php echo $__env->make('mimsms::auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php elseif(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled() && env('DEFAULT_SMS_CHANNEL') == 'exabytes'): ?>
                                    <?php echo $__env->make('exabytes::auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php else: ?>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label"><?php echo e(__('Username/E-mail address')); ?>*</label>
                                  <input required type="email" name="email" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" value="<?php echo e(old('email')); ?>" autofocus id="exampleInputEmail1" aria-describedby="emailHelp">
                                  <?php if($errors->has('email')): ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('email')); ?></strong>
                                  </span>
                                  <?php endif; ?>
                                </div>
                                <div class="mb-3">
                                  <div class="row">
                                    <div class="col-lg-6 col-md-6 col-6">
                                      <label for="exampleInputPassword1" class="form-label"><?php echo e(__('Password')); ?>*</label>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                      <div class="forgot-password">
                                      <a href="<?php echo e(route('password.request')); ?>" title="forgot password" data-bs-toggle="modal" data-bs-target="#resetModal"><?php echo e(__('Forgot Password')); ?></a>
                                    </div>
                                  </div>
                                </div>
                                <input required type="password" name="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" id="exampleInputPassword1">
                                <span toggle="#exampleInputPassword1" class="fa-regular fa-eye field-icon toggle-password"></span>
                                <?php if($errors->has('password')): ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('password')); ?></strong>
                                  </span>
                                <?php endif; ?>
                                </div>
                                <div class="mb-3 form-check">
                                  <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                  <label class="form-check-label" for="exampleCheck1"><?php echo e(__('Remember Information')); ?></label>
                                </div>
                                <button class="btn btn-primary" type="submit"><?php echo e(__('Login')); ?></button>
                              
                                <div class="sign-up-acc"><?php echo e(__('Not an account')); ?>? <a href="<?php echo e(route('register')); ?>" title="register"><?php echo e(__('Register')); ?></a></div>
                            </form>
                          <?php endif; ?>
                        </div>
                      </div>
                      
                    <div class="tab-pane fade" id="signup-tab-pane" role="tabpanel" aria-labelledby="signup-tab" tabindex="0">
                        <?php
                            require_once(base_path().'/app/Http/Controllers/price.php');
                            $userterm = App\TermsSettings::firstWhere('key','user-register-term');
                        ?>
                        <?php
                            if(isset($selected_language) && $selected_language->rtl_available == 1){
                                $class = 'offset-md-1';
                            }else{
                                $class = 'offset-md-3';
                            }
                        ?>
                        <div class="login-block">
                        <form role="form" method="POST" action="<?php echo e(route('register')); ?>" novalidate>
                          <?php echo csrf_field(); ?>
                          <?php if(Module::has('MimSms') && Module::find('MimSms')->isEnabled() && env('MIM_SMS_OTP_ENABLE') == 1 && env('DEFAULT_SMS_CHANNEL') == 'mim'): ?>
                              <?php echo $__env->make('mimsms::auth.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <?php elseif(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled() && env('DEFAULT_SMS_CHANNEL') == 'exabytes'): ?>
                              <?php echo $__env->make('exabytes::auth.register', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                          <?php else: ?>
                          <div class="social-login-block">
                              <h6 class="social-login-title"><?php echo e(__('Enter your credentials to login account')); ?></h6>
                              <ul>
                                <?php if($configs->fb_login_enable=='1'): ?>
                                  <li><a href="<?php echo e(url('login/facebook')); ?>" title="<?php echo e(__('Facebook')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/facebook.png')); ?>" class="img-fluid" alt="<?php echo e(__('Facebook')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if($configs->google_login_enable=='1'): ?>
                                  <li><a href="<?php echo e(url('login/google')); ?>" title="<?php echo e(__('Google')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/google.png')); ?>" class="img-fluid" alt="<?php echo e(__('Google')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if($configs->twitter_enable == 1): ?>
                                  <li><a href="<?php echo e(url('login/twitter')); ?>" title="<?php echo e(__('Twitter')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/twitter.png')); ?>" class="img-fluid" alt="<?php echo e(__('Twitter')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if(env('ENABLE_GITLAB') == 1 ): ?>
                                  <li><a href="<?php echo e(url('login/gitlab')); ?>" title="<?php echo e(__('Github')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/github.png')); ?>" class="img-fluid" alt="<?php echo e(__('Github')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if($configs->linkedin_enable=='1'): ?>
                                  <li><a href="<?php echo e(url('login/linkedin')); ?>" title="<?php echo e(__('Linkedin')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/linkedin.png')); ?>" class="img-fluid" alt="<?php echo e(__('Linkedin')); ?>"></a></li>
                                <?php endif; ?>
                                <?php if($configs->amazon_enable=='1'): ?>
                                  <li><a href="<?php echo e(url('login/amazon')); ?>" title="<?php echo e(__('Amazon Pay')); ?>"><img src="<?php echo e(url('frontend/assets/images/login/amazon-pay.png')); ?>" class="img-fluid" alt="<?php echo e(__('Amazon Pay')); ?>"></a></li>
                                <?php endif; ?>
                              </ul>
                              <h2><span>Or</span></h2>
                          </div>
                              <div class="mb-3">
                                <label for="exampleInputName2" class="form-label"><?php echo e(__('Name')); ?>*</label>
                                <input type="text" value="<?php echo e(old('name')); ?>" name="name" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" id="exampleInputName2" aria-describedby="emailHelp">
                                <?php if($errors->has('name')): ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('name')); ?></strong>
                                  </span> 
                                <?php endif; ?>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputEmail2" class="form-label"><?php echo e(__('email')); ?>*</label>
                                <input type="text" value="<?php echo e(old('email')); ?>" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" id="exampleInputEmail2" aria-describedby="emailHelp" name="email" required autofocus>
                                <?php if($errors->has('email')): ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('email')); ?></strong>
                                  </span> 
                                <?php endif; ?>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputphonecode2" class="form-label"><?php echo e(__('Mobile No.')); ?>*</label>
                                <!-- <input type="text" value="<?php echo e(old('phonecode')); ?>" class="form-control <?php echo e($errors->has('phonecode') ? ' is-invalid' : ''); ?>" id="exampleInputphonecode2" aria-describedby="phonecodeHelp" name="phonecode" required> -->
                                <input required pattern="[0-9]+" title="<?php echo e(__('Please enter valid mobile no')); ?>." value="<?php echo e(old('mobile')); ?>" type="text" class="form-control <?php echo e($errors->has('mobile') ? ' is-invalid' : ''); ?>" name="mobile"  required>
                                <?php if($errors->has('mobile')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('mobile')); ?></strong>
                                    </span>
                                <?php endif; ?>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword2" class="form-label"><?php echo e(__('Password')); ?>*</label>
                                <input required type="password" class="form-control <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" id="exampleInputPassword2">
                                <span toggle="#exampleInputPassword2" class="fa-regular fa-eye field-icon toggle-password"></span>
                                <?php if($errors->has('password')): ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($errors->first('password')); ?></strong>
                                  </span> 
                                <?php endif; ?>
                              </div>
                              <div class="mb-3">
                                <label for="exampleInputPassword3" class="form-label"><?php echo e(__('Create Password')); ?>*</label>
                                <input type="password" class="form-control" name="password_confirmation" id="cpassword">
                                <span toggle="#cpassword" class="fa-regular fa-eye field-icon toggle-password"></span>
                              </div>
                              <?php if($aff_system && $aff_system->enable_affilate == 1): ?>
                              <div class="mb-3">
                                  <div class="form-group">
                                      <label class="info-title" for="exampleInputEmail1"><?php echo e(__('ReferCode')); ?> </label>
                                      <input value="<?php echo e(app('request')->input('refercode') ?? old('refercode')); ?>" type="text" name="refer_code"
                                          class="<?php echo e($errors->has('refercode') ? ' is-invalid' : ''); ?> form-control" />

                                      <?php if($errors->has('refercode')): ?>
                                      <span class="invalid-feedback" role="alert">
                                          <strong><?php echo e($errors->first('refercode')); ?></strong>
                                      </span>
                                      <?php endif; ?>
                                  </div>
                              </div>
                              <?php endif; ?>


                              <?php if($genrals_settings && $genrals_settings->captcha_enable == 1): ?>

                              <div class="mb-3">
                                  <div class="form-group">
                                      <?php echo no_captcha()->display(); ?>

                                  </div>

                                  <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                  <p class="text-danger"><b><?php echo e($message); ?></b></p>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>

                              <?php endif; ?>
                              <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="eula" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">I agree with the terms & conditions.</label>
                              </div>
                              <input type="submit" value="Sign Up" class="form-control btn btn-primary">
                              <div class="sign-up-acc">Already have an account? <a href="#" title="login"> Login</a></div>
                          </form>
                          <?php endif; ?>
                        </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="resetModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <div class="modal-close-btn">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
              </div>
              <div class="modal-body">
                <div class="login-modal-block">
                  <h4 class="reset-title">Reset Password</h4>
                  <div class="login-block">
                    <?php if(Module::has('MimSms') && Module::find('MimSms')->isEnabled() && env('MIM_SMS_OTP_ENABLE') == 1 && env('DEFAULT_SMS_CHANNEL') == 'mim'): ?>
                        <?php echo $__env->make('mimsms::auth.forgetpassword', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php elseif(Module::has('Exabytes') && Module::find('Exabytes')->isEnabled() && env('DEFAULT_SMS_CHANNEL') == 'exabytes'): ?>
                        <?php echo $__env->make('exabytes::auth.forgetpassword', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                    <form method="POST" action="<?php echo e(route('password.email')); ?>">
                        <?php echo csrf_field(); ?>
                      <div class="social-login-block">
                        <div class="mb-3">
                          <div id="emailHelp" class="form-text mb-3">Enter your email address or mobile number to reset password.</div>
                            <label for="exampleInputEmail1" class="form-label">E-mail*</label>
                            <input required="" value="<?php echo e(old('email')); ?>" type="email" name="email" class="form-control" placeholder="<?php echo e(__('Email')); ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <?php if($errors->has('email')): ?>
                              <span class="invalid-feedback text-danger" role="alert">
                                  <strong><?php echo e($errors->first('email')); ?></strong>
                              </span>
                            <?php endif; ?>
                          </div>                         
                        </div>
                        <input type="submit" value="Send Password Reset Link" class="form-control">
                      </div>
                    </form>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Login End -->
        
        <!-- Start Footer Section -->
        <?php echo $__env->make('frontend.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Footer Section -->
        
        <?php if(env('GOOGLE_TAG_MANAGER_ID') != '' && env('GOOGLE_TAG_MANAGER_ENABLED') == true): ?>
        <?php echo $__env->make('googletagmanager::body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <?php if(env('FACEBOOK_PIXEL_ID') != ''): ?>
        <?php echo $__env->make('facebook-pixel::body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <!-- End -->
        <!-- Display GDPR7 Cokkie message -->
        <?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo notify_js(); ?>
        <?php echo app('notify')->render(); ?>
        <?php
          $last_cat = 0;
          $first_cat = 0;
          $price_login = App\Genral::first()->login;
          $price_array = array();
          $convert_price = 0;
          $show_price = 0;
          $s_product = App\SimpleProduct::query();
          $get_simple_products = array();
        ?>
        <!-- Messenger Bubble -->
        <?php if(Request::ip() != '::1' && env('MESSENGER_CHAT_BUBBLE_URL') != ''): ?>
        <script src="<?php echo e(env('MESSENGER_CHAT_BUBBLE_URL')); ?>" async></script>
        <?php endif; ?>
        <script>
            var sendurl = <?php echo json_encode(route('ajaxsearch'), 15, 512) ?>;
            var rightclick = <?php echo json_encode($rightclick, 15, 512) ?>;
            var inspect = <?php echo json_encode($inspect, 15, 512) ?>;
            let baseUrl = <?php echo json_encode(url('/'), 15, 512) ?>;
            // var crate = <?php echo json_encode($conversion_rate, 15, 512) ?>;
            var exist = <?php echo json_encode(url('shop'), 15, 512) ?>;
            var setstart = <?php echo json_encode(url('setstart'), 15, 512) ?>;
        </script>
        <script src="<?php echo e(url('js/master.js')); ?>"></script>
        
        <!-- Default Front JS -->
        <?php if(selected_lang()->rtl_available == 1): ?>
        <!-- RTL OWL JS-->
        <script src="<?php echo e(url('front/js/default.js')); ?>"></script>

        <?php else: ?>
        <!-- LTR OWL JS-->
        <script src="<?php echo e(url('front/js/scripts.min.js')); ?>"></script>
        <?php endif; ?>

        <?php if(file_exists(public_path().'/js/custom-js.js')): ?>
        <script defer src="<?php echo e(url('js/custom-js.js')); ?>"></script>
        <?php endif; ?>
        <!-- Sweetalert JS -->
        <script src="<?php echo e(url('front/vendor/js/sweetalert.min.js')); ?>"></script>
                
        <!-- New Frontend Javascript Start -->
        <!-- jquery js-->
        <!-- <script type="text/javascript" src="<?php echo e(url('frontend/assets/js/jquery.min.js')); ?>"></script>  -->
        <script type="text/javascript" src="<?php echo e(url('frontend/assets/js/popper.min.js')); ?>"></script> <!-- popper js-->
        <script type="text/javascript" src="<?php echo e(url('frontend/assets/js/bootstrap.bundle.min.js')); ?>"></script> 
        <script type="text/javascript" src="<?php echo e(url('frontend/assets/vendor/owl_carousel/js/owl.carousel.min.js')); ?>"></script> <!-- owl carousel js-->
        <script type="text/javascript" src="<?php echo e(url('frontend/assets/vendor/feather/feather.min.js')); ?>"></script> <!-- feather js-->
        <script type="text/javascript" src="<?php echo e(url('frontend/assets/vendor/slick/js/slick.min.js')); ?>"></script> <!-- slick min js-->
        <script type="text/javascript" src="<?php echo e(url('js/detailpage.js')); ?>"></script>
        
        <?php if(selected_lang()->rtl_available == 1): ?>
        <!-- RTL OWL JS-->
        <script type="text/javascript" src="<?php echo e(url('frontend/assets/js/theme.rtl.js')); ?>"></script> 

        <?php else: ?>
        <!-- LTR OWL JS-->
        <script type="text/javascript" src="<?php echo e(url('frontend/assets/js/theme.js')); ?>"></script>
        <?php endif; ?>

        <script type="text/javascript" src="<?php echo e(url('frontend/assets/js/frontmaster.js')); ?>"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <?php echo $__env->make('frontend.categoryfilterscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.filters.headscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('frontend.filters.bottomscript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <script>
            $(document).ready(function(){

                $('.product-slider').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: '.product-slider-nav'
                });

                $('.product-slider-nav').slick({
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    vertical: true,
                    asNavFor: '.product-slider',
                    centerMode: false,
                    focusOnSelect: true,
                    prevArrow: ".thumb-prev",
                    nextArrow: ".thumb-next",
                });
                
            }); 

            function searchInput() {
                if($('#ipad_vsearch').val()){
                    $('#searchSubmit').submit();
                }                
            }
        </script>
        <script>
      jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up"><i class="fa-solid fa-chevron-up"></i></div><div class="quantity-button quantity-down"><i class="fa-solid fa-chevron-down"></i></div></div>').insertAfter('.quantity input');
      jQuery('.quantity').each(function() {
        var spinner = jQuery(this),
          input = spinner.find('input[type="number"]'),
          btnUp = spinner.find('.quantity-up'),
          btnDown = spinner.find('.quantity-down'),
          min = input.attr('min'),
          max = input.attr('max');

        btnUp.click(function() {
          var oldValue = parseFloat(input.val());
          if (oldValue >= max) {
            var newVal = oldValue;
          } else {
            var newVal = oldValue + 1;
          }
          spinner.find("input").val(newVal);
          spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
          var oldValue = parseFloat(input.val());
          if (oldValue <= min) {
            var newVal = oldValue;
          } else {
            var newVal = oldValue - 1;
          }
          spinner.find("input").val(newVal);
          spinner.find("input").trigger("change");
        });

      });
    </script>
    <script>
      $('.add_in_wish_simple').on('click',function(){
      
          var status = $(this).data('status');
          var proid = $(this).data('proid');
          
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });

          $.ajax({
              url : '<?php echo e(route("add.simple.pro.in.wishlist")); ?>',
              method : 'GET',
              data : {proid : proid},
              success : function(response){
                  console.log('response',response);
                  if(response.status == 'success'){
                      toastr.success(response.msg,'Success');
                  }else{
                      toastr.error(response.msg,'Failed');
                  }
              }
          });


      });
    </script>
    <script>
      function addSimpleProCard(spid) {
        var formcls = '.addSimpleCardFrom'+spid;
        var formurl = $(formcls).attr('action'); 
  
        $.ajax({
            url : formurl,
            method : 'Post',
            data : $(formcls).serialize(),
            success : function(response){
                if(response.status == 'success'){
                    toastr.success(response.msg,'Success');
                    $('.cart_count').text(response.cart_count);
                }else{
                    toastr.error(response.msg,'Failed');
                }
            }
        });
      }
    </script>
    <script>
      function add_in_wish_variant(proid) {
        
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          $.ajax({
              url : '<?php echo e(route("AddToWishListVariant")); ?>',
              method : 'Post',
              data : {proid : proid},
              success : function(response){
                  if(response.status == 'success'){
                      toastr.success(response.msg,'Success');
                  }else{
                      toastr.error(response.msg,'Failed');
                  }
              }
          });
      }
    </script>
    <script>
      function addVariantProCard(id) {
        var formcls = '.addVariantProCard'+id;
        var formurl = $(formcls).attr('action');  
        $.ajax({
            url : formurl,
            method : 'Post',
            data : $(formcls).serialize(),
            success : function(response){
                if(response.status == 'success'){
                    toastr.success(response.msg,'Success');
                    $('.cart_count').text(response.cart_count);
                }else{
                    toastr.error(response.msg,'Failed');
                }                
            }
        });
      }
    </script>
    <script>
      	$(".search-field-new").autocomplete({
          source: function(request, response) {
            var x = '';
            $.ajax({
              url: '<?php echo e(route("search-on-time")); ?>',
              data: {
                catid: x,
                search: request.term
              },
              dataType: "json",
              success: function(data) {
                var resp = $.map(data, function(obj) {
                  return {
                    label: obj.value,
                    value: obj.value,
                    img: obj.img,
                    url: obj.url
                  }
                });
                response(resp);
              }
            });
          },
          select: function(event, ui) {
            if(ui.item.value != 'No Result found') {
              event.preventDefault();
              location.href = ui.item.url;
            } else {
              return false;
            }
          },
          html: true,
          open: function(event, ui) {
            $(".ui-autocomplete").css("z-index", 1000);
          },
        }).autocomplete("instance")._renderItem = function(ul, item) {
          return $("<li><div><img src='" + item.img + "' class='img-fluid' height='50px' width='50px'><span>" + item.value + "</span></div></li>").appendTo(ul);
        };
    </script>
      <?php echo $__env->yieldContent('script'); ?>
    </body>
</html><?php /**PATH D:\xampp\htdocs\boibari\resources\views/front/layout/master.blade.php ENDPATH**/ ?>