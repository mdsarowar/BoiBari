 <!-- Start Topbar Mobile -->
 <div class="topbar-mobile">
     <div class="row align-items-center">
         <div class="col-md-12">
             <div class="mobile-logobar">
                 <a href="<?php echo e(url('/')); ?>" class="mobile-logo">

                     <img src="<?php echo e(url('images/genral/'.$genrals_settings->logo)); ?>" class="img-fluid" alt="logo" />

                 </a>
             </div>
             <div class="mobile-togglebar">
                 <ul class="list-inline mb-0">
                     <li class="list-inline-item">
                         <div class="topbar-toggle-icon">
                             <a class="topbar-toggle-hamburger" href="javascript:void();">
                                 <img src="<?php echo e(url('admin_new/assets/images/svg-icon/horizontal.svg')); ?>"
                                     class="img-fluid menu-hamburger-horizontal" alt="horizontal">
                                 <img src="<?php echo e(url('admin_new/assets/images/svg-icon/verticle.svg')); ?>"
                                     class="img-fluid menu-hamburger-vertical" alt="verticle">
                             </a>
                         </div>
                     </li>
                     <li class="list-inline-item">
                         <div class="menubar">
                             <a class="menu-hamburger" href="javascript:void();">
                                 <img src="<?php echo e(url('admin_new/assets/images/svg-icon/menu.svg')); ?>"
                                     class="img-fluid menu-hamburger-collapse" alt="collapse">
                                 <img src="<?php echo e(url('admin_new/assets/images/svg-icon/close.svg')); ?>"
                                     class="img-fluid menu-hamburger-close" alt="close">
                             </a>
                         </div>
                     </li>
                 </ul>
             </div>
         </div>
     </div>
 </div>
 <!-- Start Topbar -->
 <div class="topbar">
     <!-- Start row -->
     <div class="row align-items-center">
         <!-- Start col -->
         <div class="col-md-12 align-self-center">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="breadcrumbbar">
                        <h4 class="page-title"><?php echo e($heading ??''); ?></h4>
                        <div class="breadcrumb-list">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('myadmin')); ?>">Dashboard</a></li>
                                
                                <?php if(isset($title0)): ?>                                   
                                    <li class="breadcrumb-item"><?php echo e($title0 ?? ''); ?></li>
                                <?php endif; ?>
                                <?php if(isset($title1)): ?>                                   
                                <li class="breadcrumb-item"><?php echo e($title1 ?? ''); ?></li>
                                <?php endif; ?>
                                <?php if(isset($title2)): ?>
                                <li class="breadcrumb-item"><?php echo e($title2 ?? ''); ?></li>
                                <?php endif; ?>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="infobar">
                        <ul class="list-inline mb-0">
                            <li class="mt-2 list-inline-item">
                                <a title="Visit site" href="<?php echo e(url('/')); ?>" target="_blank">
                                    <?php echo e(__("Visit Site")); ?> <i class="feather icon-external-link" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <div class="languagebar">
                                    <div class="dropdown">

                                        <select class="langdropdown2 form-control" onchange="changeLang()" id="changed_lng">
                                            <?php $__currentLoopData = \DB::table('locales')->where('status','=',1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(Session::get('changed_language') == $lang->lang_code ? "selected" : ""); ?>

                                                value="<?php echo e($lang->lang_code); ?>"><?php echo e(ucfirst($lang->lang_code)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>


                                    </div>
                                </div>
                            </li>
                            <?php if(in_array('Super Admin',auth()->user()->getRoleNames()->toArray())): ?>
                            <li class="list-inline-item">
                                <div class="settingbar">
                                    <a href="javascript:void(0)" id="infobar-settings-open" class="infobar-icon">
                                        <img src="<?php echo e(url("admin_new/assets/images/svg-icon/settings.svg")); ?>" class="text-center img-fluid" alt="settings">
                                    </a>
                                </div>
                            </li>
                            <?php endif; ?>

                            <li class="list-inline-item">
                                <div class="settingbar">
                                    <a href="javascript:void(0)" id="notification-open" class="infobar-icon">
                                        <img src="<?php echo e(url("admin_new/assets/images/svg-icon/notifications.svg")); ?>"
                                            class="img-fluid" alt="settings">
                                        <span class="live-icon">

                                            <span id="countNoti" class="label label-warning">

                                                <?php echo e(auth()->user()->unreadnotifications()->where('n_type','=','order_v')->count()); ?>


                                            </span>

                                        </span>
                                    </a>
                                </div>
                            </li>


                            <li class="list-inline-item">
                                <div class="profilebar">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="profilelink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                            <?php if(Auth::user()->image != '' &&
                                            file_exists(public_path().'/images/user/'.Auth::user()->image)): ?>
                                            <img src="<?php echo e(url('images/user/'.Auth::user()->image)); ?>" alt="profilephoto"
                                                class="rounded img-fluid">
                                            <?php else: ?>
                                            <img src="<?php echo e(Avatar::create(Auth::user()->name)->toBase64()); ?>" alt="profilephoto"
                                                class="rounded img-fluid">
                                            <?php endif; ?>

                                            <span class="live-icon"><?php echo e(Auth::user()->name); ?></span><span
                                                class="feather icon-chevron-down live-icon"></span></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                            <div class="dropdown-item">
                                                <div class="profilename">
                                                    <h5><?php echo e(Auth::user()->name); ?></h5>
                                                </div>
                                            </div>
                                            <div class="userbox">
                                                <ul class="list-unstyled mb-0">
                                                    <li class="media dropdown-item">
                                                        <?php if(auth()->user()->role_id == 'v'): ?>
                                                        <a href="<?php echo e(route('get.profile')); ?>" class="profile-icon"><img
                                                                src="<?php echo e(url('admin_new/assets/images/svg-icon/crm.svg')); ?>"
                                                                class="img-fluid" alt="user"><?php echo e(__("My Profile")); ?>

                                                        </a>
                                                        <?php else: ?>

                                                        <a href="<?php echo e(url('admin/users/'.Auth::user()->id.'/edit')); ?>"
                                                            class="profile-icon"><img
                                                                src="<?php echo e(url('admin_new/assets/images/svg-icon/crm.svg')); ?>"
                                                                class="img-fluid" alt="user"><?php echo e(__("My Profile")); ?>

                                                        </a>

                                                        <?php endif; ?>
                                                    </li>
                                                    <?php if(auth()->user()->role_id == 'v'): ?>
                                                    <li class="media dropdown-item">
                                                        <a href="<?php echo e(route('store.index')); ?>" class="profile-icon"><img
                                                                src="<?php echo e(url('admin_new/assets/images/svg-icon/ecommerce.svg')); ?>"
                                                                class="img-fluid" alt="user"><?php echo e(__("Your store")); ?></a>
                                                    </li>
                                                    <?php else: ?>
                                                    
                                                    <?php if(isset(auth()->user()->store)): ?>
                                                    <li class="media dropdown-item">
                                                        <a href="<?php echo e(url('admin/stores/'.Auth::user()->store->id.'/edit')); ?>"
                                                            class="profile-icon"><img
                                                                src="<?php echo e(url('admin_new/assets/images/svg-icon/ecommerce.svg')); ?>"
                                                                class="img-fluid" alt="user"><?php echo e(__("Your store")); ?>

                                                        </a>
                                                    </li>
                                                    <?php endif; ?>

                                                    <?php endif; ?>

                                                    <li class="media dropdown-item">
                                                        <a href="<?php echo e(route('logout')); ?>" class="profile-icon" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"><img
                                                                src="<?php echo e(url('admin_new/assets/images/svg-icon/logout.svg')); ?>"
                                                                class="img-fluid" alt="logout">Logout</a>

                                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST"
                                                            style="display: none;">
                                                            <?php echo csrf_field(); ?>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
         </div>
         <!-- End col -->
     </div>
     <!-- End row -->
 </div>
 <?php if(in_array('Super Admin',auth()->user()->getRoleNames()->toArray())): ?>
 <!-- Sidebar quick settings -->
 <div id="infobar-settings-sidebar" class="infobar-settings-sidebar">

     <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
         <h4><?php echo e(__("Settings")); ?></h4><a href="javascript:void(0)" id="infobar-settings-close" class="infobar-settings-close"><img
                 src="<?php echo e(url('admin_new/assets/images/svg-icon/close.svg')); ?>" class="img-fluid menu-hamburger-close"
                 alt="close"></a>
     </div>
     <div class="infobar-settings-sidebar-body">
         <div class="h-100 bg-primary-rgba p-3">

             <form action="<?php echo e(url('/update-quick-setting')); ?>" method="POST">
                 <?php echo csrf_field(); ?>
                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("Enable Multiseller")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input
                             <?php echo e(isset($vendor_system) && $vendor_system == 1 ? "checked" : ""); ?> name="vendor_enable"
                             type="checkbox" class="js-switch-setting-first" /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('If enabled than Multiseller system will be active on your portal.')); ?></small>
                     </div>

                 </div>

                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("Enable Preloader")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input <?php echo e(env('ENABLE_PRELOADER') =='1' ? "checked" : ""); ?>

                             name="ENABLE_PRELOADER" type="checkbox" class="js-switch-setting-first" /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('Enable or disable preloader by toggling it.')); ?></small>
                     </div>

                 </div>

                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("APP DEBUG")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input name="APP_DEBUG" <?php if(env('DEMO_LOCK') !=1): ?>
                             <?php echo e(env('APP_DEBUG') == true ? "checked" : ""); ?> <?php endif; ?> type="checkbox"
                             class="js-switch-setting-first" /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("Turn it")); ?> <b><?php echo e(__('ON')); ?></b>. <?php echo e(__("IF you face 500 error")); ?>.</small>
                     </div>

                 </div>

                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("Disable Right Click?")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input name="right_click" type="checkbox"
                             class="js-switch-setting-first"
                             <?php echo e($genrals_settings->right_click=='1' ? "checked" : ""); ?> /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("If enabled than Right click will not work on whole project.")); ?></small>
                     </div>

                 </div>

                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("Disables Inspect Element?")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input type="checkbox" class="js-switch-setting-first"
                             name="inspect" <?php echo e($genrals_settings->inspect == '1' ? "checked" : ""); ?> /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <b>CTRL+U <?php echo e(__("OR")); ?> CTRL+SHIFT+I</b> <?php echo e(__('keys not work on whole project.')); ?></small>
                     </div>

                 </div>

                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("Login to display price")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input type="checkbox" class="js-switch-setting-first"
                             name="login" <?php echo e($genrals_settings->login=='1' ? "checked" : ""); ?> /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('If enabled only logged in users will able to see product prices.')); ?></small>
                     </div>

                 </div>

                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("Enable email verification on registration?")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input type="checkbox" class="js-switch-setting-first"
                             name="email_verify_enable"
                             <?php echo e($genrals_settings->email_verify_enable == 1 ? "checked" : ""); ?> /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('If enabled than email will be sent to user when register.')); ?></small>
                     </div>

                 </div>

                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("Enable Cash on delivery?")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input type="checkbox" class="js-switch-setting-first"
                             name="COD_ENABLE" <?php echo e(env('COD_ENABLE') == 1 ? "checked" : ""); ?> /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__('If enabled than cash on delivery will enable on payment page.')); ?></small>
                     </div>

                 </div>

                 <div class="p-1 row align-items-center pb-2">

                     <div class="col-md-8">
                         <h6 class="mb-0"><?php echo e(__("Hide sidebar?")); ?></h6>
                     </div>
                     <div class="col-md-4 text-right"><input type="checkbox" class="js-switch-setting-first"
                             name="HIDE_SIDEBAR" <?php echo e(env('HIDE_SIDEBAR') =='1' ? "checked" : ""); ?> /></div>

                     <div class="col-md-12">
                         <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("By toggling it make the full width front page it.")); ?></small>
                     </div>

                 </div>

                 <div class="text-right">
                     <button class="btn btn-md rounded btn-primary-rgba">
                         <i class="feather icon-save"></i> <?php echo e(__("Save settings")); ?>

                     </button>
                 </div>
             </form>

         </div>

     </div>
 </div>
 <?php endif; ?>
 <!-- Notification Sidebar -->
 <div id="notification-sidebar" class="infobar-settings-sidebar">
     <div class="infobar-settings-sidebar-head d-flex w-100 justify-content-between">
         <h4><?php if(auth()->user()->unreadnotifications->where('n_type','=','order_v')->count()): ?>
             <?php echo e(__("You have")); ?> <?php echo e(auth()->user()->unreadnotifications->where('n_type','=','order_v')->count()); ?> <?php echo e(__("New Orders")); ?> <?php echo e(__("Notification!")); ?>

            
             <?php else: ?>
             <span class="text-center"><?php echo e(__("No Notifications")); ?></span>
             <?php endif; ?></h4><a href="javascript:void(0)" id="notification-sidebar-close" class="infobar-settings-close"><img
                 src="<?php echo e(url('admin_new/assets/images/svg-icon/close.svg')); ?>" class="img-fluid menu-hamburger-close"
                 alt="close"></a>
     </div>
     <div class="infobar-settings-sidebar-body">
         <?php if(auth()->user()->unreadnotifications->where('n_type','=','order_v')->count()): ?>
         <a class="mr-3 float-right" href="<?php echo e(route('mark_read_order')); ?>"><?php echo e(__('Mark all as read')); ?></a>
         <div class="clearfix"></div>
         <?php endif; ?>
         <div class="p-3" style="maxheight: 500px;overflow: auto">


             <?php if(auth()->user()->unreadnotifications->where('n_type','=','order_v')->count()): ?>

             <?php $__currentLoopData = auth()->user()->unreadNotifications->where('n_type','=','order_v'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


             <div class="bg-primary-rgba p-3">
                 <a class="font-weight-normal" title="<?php echo e($notification->data['data']); ?>"
                     onclick="markread('<?php echo e($notification->id); ?>')" href="<?php echo e(url($notification->url)); ?>">
                     <img src="<?php echo e(url('admin_new/assets/images/ecommerce/product_04.svg')); ?>" class="img-fluid"
                         width="35" alt="product">
                     #<?php echo e($notification->data['data']); ?>

                 </a>
                 <div class="clearfix"></div>
                 <small class="clearfix float-right"><i class="feather icon-calendar"
                         aria-hidden="true"></i><?php echo e(date('jS M y',strtotime($notification->created_at))); ?></small>

             </div>
             <div class="clearfix"></div>



             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

             <?php else: ?>

             <h4 class="text-center text-primary"><i class="feather icon-bell-off"></i> <?php echo e(__("No Notifications")); ?>

             </h4>

             <?php endif; ?>


         </div>

     </div>
 </div><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/layouts/topbar.blade.php ENDPATH**/ ?>