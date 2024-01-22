<?php
$genral = App\Genral::first();
$banner = App\BannerSetting::first();
?>
<input type="hidden" class="baseURl" value="<?php echo e(url('/')); ?>">

    <!-- Navbar Fullscreen Start -->
    <section id="navbar" class="navbar-main-block fullscreen-navbar">
        <div class="container">
            <div class="row p-1 mb-1 bg-light text-dark">
                <div class="col-md-1 bg-info  text-center">

                        <div class="fw-bolder">
                            আপডেট
                        </div>

                </div>
                <div class="col-md-11 text-center">

                        <marquee data-v-5606edfa="" behavior="scroll" direction="left"  class="">
                            💥বিসিএস, ব্যাংক, NTRCA, প্রাইমারি সহ সকল কোর্সে ৬০% ডিসকাউন্টে ভর্তি চলছে নতুন বছর
                            উপলক্ষে!! 👉আপনার পছন্দ অনুযায়ী 🕙সকাল এবং বিকাল এর 🕙 ব্যাচ থেকে বেছে নিন আপনার
                            ব্যাচটি...
                        </marquee>

                </div>
            </div>
            <div class="row g-0">










                <div class="col-xl-9 col-lg-12 col-md-12 col-12">
                    <?php if($banner && isset($banner) && $banner->status=='1'): ?>
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <?php echo e(substr($banner->content,0,70)); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><i data-feather="x"></i></button>
                    </div>
                    <?php endif; ?>
                </div>





























































            </div>
        </div>
    </section>
    <!-- Navbar Smallscreen End -->

    <!-- Topbar Fullscreen Start -->
    <section id="topbar" class="topbar-main-block fullscreen-topbar">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-2">
                    <div class="logo" >
                        <a href="<?php echo e(url('/')); ?>" title="<?php echo e($genral->title); ?>"><img src="<?php echo e(url('images/genral/'.$front_logo)); ?>" class="img-fluid" alt="<?php echo e($genral->title); ?>" style="height: 50px;width: 150px"></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="topbar-search-product search-cat-box" id="search-xs">
                        <form method="get" enctype="multipart/form-data" action="<?php echo e(url('search/')); ?>" class="search-form" id="searchSubmit">
                            <div class="input-group">








                                <div class="form-group">
                                    <input type="text" id="ipad_vsearch" class="form-control search-field-new" name="keyword" placeholder="<?php echo e(__('Search For Products Brands And Categories')); ?>">
                                    <a href="javascript:" onclick="searchInput()" title="search"><i data-feather="search"></i></a>
                                    <div id="course_data"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="topbar-product-icon">
                        <ul>
                            <?php if(Auth::check()): ?>
                            <li><a href="<?php echo e(url('wishlist')); ?>" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="<?php echo e(__('Wishlist')); ?>"><i data-feather="heart"></i><span class="topbar-action-badge wishlist_count"><?php echo e(App\Wishlist::where('user_id',Auth::user()->id)->count()); ?></span></a></li>

                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(url('cart')); ?>" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="<?php echo e(__('Cart')); ?>">
                                    <i data-feather="shopping-cart"></i>
                                    <span class="topbar-action-badge cart_count">
                                        <?php
                                            if(Auth::check()){
                                                echo App\Cart::where('user_id', Auth::user()->id)->count();
                                            } else {
//                                                echo Session::get('guest_cart_count')?count([Session::get('guest_cart')]):'0';
                                                echo Session::get('guest_cart_count')? Session::get('guest_cart_count'):'0';
                                            }
                                        ?>


                                    </span>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <?php if(Auth::check()): ?>
                                    <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="<?php echo e(Auth::check()?Auth::user()->name:''); ?>">
                                        <i data-feather="user"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="user-img">
                                                <?php if(Auth::check() && Auth::user()->image != '' && file_exists(public_path() . '/images/user/' . Auth::user()->image)): ?>
                                                    <img src="<?php echo e(url('/images/user/'.Auth::user()->image)); ?>" class="img-fluid" alt="<?php echo e(Auth::check()?Auth::user()->name:''); ?>">
                                                <?php elseif(Auth::check()): ?>
                                                    <img src="<?php echo e(Avatar::create(Auth::user()->name)->toBase64()); ?>" class="img-fluid" alt="<?php echo e(Auth::check()?Auth::user()->name:''); ?>">
                                                <?php else: ?>
                                                    <img src="frontend/assets/images/user.png" class="img-fluid" alt="Profile">
                                                <?php endif; ?>
                                            </div>
                                            <div class="user-dtl">
                                                <h6 class="user-name"><?php echo e(Auth::check()?Auth::user()->name:''); ?></h6>
                                                <p><a href="<?php echo e(Auth::check()?Auth::user()->email:''); ?>" title="<?php echo e(Auth::check()?Auth::user()->email:''); ?>"><?php echo e(Auth::check()?Auth::user()->email:''); ?></a></p>
                                            </div>
                                        </li>
                                        <?php if(Auth::check() && Auth::user()->role_id=='a'): ?>
                                        <li><a class="dropdown-item" href="<?php echo e(route('admin.main')); ?>" title="<?php echo e(__('Admin Dashboard')); ?>"><i data-feather="globe"></i><?php echo e(__('Admin Dashboard')); ?></a></li>
                                        <?php elseif(Auth::check() && Auth::user()->role_id=='v'): ?>
                                            <?php if(isset(Auth::user()->store)): ?>
                                                <li><a class="dropdown-item" href="<?php echo e(route('seller.dboard')); ?>" title="Seller Dashboard"><i data-feather="globe"></i><?php echo e(__('Seller Dashboard')); ?></a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(Auth::check()): ?>
                                        <li><a class="dropdown-item" href="<?php echo e(route('user.profile')); ?>" title="<?php echo e(__('My Account')); ?>"><i data-feather="user"></i><?php echo e(__('My Account')); ?></a></li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:" title="<?php echo e(__('Logout')); ?>" onclick="logout()"><i data-feather="log-out"></i><?php echo e(__('Logout')); ?></a>
                                            <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form display-none">
                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                    <?php else: ?>
                                        <a class="dropdown-toggle" href="javascript:" role="button" data-bs-toggle="modal" data-bs-target="#loginModal">
                                            Login / Register
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Topbar Fullscreen End -->

    <!-- Topbar App Start -->
    <section id="topbar" class="topbar-main-block smallscreen-topbar">
        <div class="container">
            <div class="row">
                <div class="col-4 col-md-1">
                    <div class="hamburger-menu">
                        <span onclick="openNav()" class="hamburger">&#9776; </span>
                        <div id="mySidenav" class="sidenav">
                            <div class="topbar-sidenav">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="logo">
                                            <img src="<?php echo e(url('images/genral/footer/'.$front_logo)); ?>" class="img-fluid" alt="Logo">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" title="close">&times;</a>
                                    </div>
                                </div>
                                <div class="topbar-search-product">
                                    <form action="#" class="search-form">
                                        <div class="input-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="search" placeholder="Search for products, brands and categories">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="menu-tab" data-bs-toggle="tab" data-bs-target="#menu-tab-pane" type="button" role="tab" aria-controls="menu-tab-pane" aria-selected="true"><?php echo e(__('Menu')); ?></button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="categories-tab" data-bs-toggle="tab" data-bs-target="#categories-tab-pane" type="button" role="tab" aria-controls="categories-tab-pane" aria-selected="false"><?php echo e(__('Categories')); ?></button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="menu-tab-pane" role="tabpanel" aria-labelledby="menu-tab" tabindex="0">
                                        <ul class="navbar-nav">
                                            <li class="nav-item">
                                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" title="<?php echo e(__('Categories')); ?>"><i data-feather="award"></i><?php echo e(__('All Categories')); ?></a>
                                                <ul class="dropdown-menu">
                                                    <?php $__currentLoopData = App\Category::where('status','1')->orderBy('position')->paginate(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:" onclick="changeCategory(<?php echo e($cat->id); ?>,'main')" title="<?php echo e($cat->title); ?>">
                                                                <?php echo e($cat->title); ?>

                                                                <?php if(count($cat->subcategory)): ?>
                                                                    <i data-feather="chevron-right"></i>
                                                                <?php endif; ?>
                                                            </a>
                                                            <?php if(count($cat->subcategory)): ?>
                                                                <ul class="submenu dropdown-menu">
                                                                    <?php $__currentLoopData = $cat->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subKey => $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li>
                                                                            <a class="dropdown-item" href="javascript:" onclick="changeCategory(<?php echo e($subcat->id); ?>, 'sub')" title="<?php echo e($subcat->title); ?>"><?php echo e(__($subcat->title)); ?>

                                                                                <?php if(count($subcat->childcategory)): ?>
                                                                                    <i data-feather="chevron-right"></i>
                                                                                <?php endif; ?>
                                                                            </a>
                                                                            <?php if(count($subcat->childcategory)): ?>
                                                                                <ul class="submenu dropdown-menu">
                                                                                    <?php $__currentLoopData = $subcat->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childKey => $childcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                        <li><a class="dropdown-item" href="javascript:" onclick="changeCategory(<?php echo e($childcat->id); ?>, 'child')" title="<?php echo e($childcat->title); ?>"><?php echo e(__($childcat->title)); ?></a></li>
                                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                </ul>
                                                                            <?php endif; ?>
                                                                        </li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link active" aria-current="page" href="<?php echo e(url('/')); ?>" title="Home"><i data-feather="home"></i><?php echo e(__('Home')); ?></a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" aria-current="page" href="<?php echo e(route('all_authors')); ?>" title="Author"><?php echo e(__('Authors')); ?></a>
                                            </li>
                                            <li class="nav-item ">
                                                <a class="nav-link" aria-current="page" href="<?php echo e(route('all_publishers')); ?>" title="Publisher"><?php echo e(__('Publishers')); ?></a>
                                            </li>












































                                            <?php if(Auth::check() && Auth::user()->role_id=='a'): ?>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('admin.main')); ?>" title="<?php echo e(__('Admin Dashboard')); ?>"><i data-feather="globe"></i><?php echo e(__('Admin Dashboard')); ?></a></li>
                                            <?php elseif(Auth::check() && Auth::user()->role_id=='v'): ?>
                                                <?php if(isset(Auth::user()->store)): ?>
                                                    <li class="nav-item"><a class="nav-link" href="<?php echo e(route('seller.dboard')); ?>" title="Seller Dashboard"><i data-feather="globe"></i><?php echo e(__('Seller Dashboard')); ?></a></li>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if(Auth::check()): ?>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo e(route('user.profile')); ?>" title="<?php echo e(__('My Account')); ?>"><i data-feather="user"></i><?php echo e(__('My Account')); ?></a></li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="javascript:" title="<?php echo e(__('Logout')); ?>" onclick="logout()"><i data-feather="log-out"></i><?php echo e(__('Logout')); ?></a>
                                                <form action="<?php echo e(route('logout')); ?>" method="POST" class="logout-form display-none">
                                                    <?php echo e(csrf_field()); ?>

                                                </form>
                                            </li>
                                            <?php else: ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="<?php echo e(url('login')); ?>" title="Login"><i data-feather="log-out"></i><?php echo e(__('Login')); ?></a>
                                                <a class="nav-link" href="<?php echo e(url('register')); ?>" title="Register"><i data-feather="user"></i><?php echo e(__('Register')); ?></a>
                                            </li>
                                            <?php endif; ?>






























                                        </ul>
                                    </div>
                                    <div class="tab-pane fade" id="categories-tab-pane" role="tabpanel" aria-labelledby="categories-tab" tabindex="0">
                                        <ul class="navbar-nav">
                                            <li class="nav-item dropdown" id="myDropdown">
                                                <ul class="dropdown-menu show">

                                                    <?php $__currentLoopData = App\Category::where('status','1')->orderBy('position')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a class="dropdown-item" href="javascript:"  onclick="changeCategory(<?php echo e($cat->id); ?>,'main')" title="<?php echo e($cat->title); ?>">
                                                            <img src="<?php echo e(url('images/category/'.$cat->icon)); ?>" class="img-fluid" alt=" <?php echo e($cat->title); ?> ">
                                                            <?php echo e($cat->title); ?>

                                                            <?php if(count($cat->subcategory)): ?>
                                                            <i data-feather="chevron-right"></i>
                                                            <?php endif; ?>
                                                        </a>
                                                        <?php if(count($cat->subcategory)): ?>
                                                        <ul class="submenu dropdown-menu">
                                                            <?php $__currentLoopData = $cat->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subKey => $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a class="dropdown-item" href="javascript:"  onclick="changeCategory(<?php echo e($subcat->id); ?>,'sub')" title="<?php echo e($subcat->title); ?>"><?php echo e($subcat->title); ?></a>
                                                                <?php if(count($subcat->childcategory)): ?>
                                                                <ul class="submenu dropdown-menu">
                                                                    <?php $__currentLoopData = $subcat->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childKey => $childcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <li><a class="dropdown-item" href="javascript:" onclick="changeCategory(<?php echo e($childcat->id); ?>, 'child')" title="<?php echo e($childcat->title); ?>"><?php echo e(__($childcat->title)); ?></a></li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                                <?php endif; ?>
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-md-5">
                    <div class="logo">
                    <a href="<?php echo e(url('/')); ?>" title="logo"><img src="<?php echo e(url('images/genral/'.$front_logo)); ?>" class="img-fluid" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-4 col-md-6">
                    <div class="topbar-product-icon">
                        <ul>
                            <?php if(Auth::check()): ?>
                            <li><a href="<?php echo e(url('wishlist')); ?>" data-bs-toggle="tooltip" data-bs-placement="down" data-bs-title="<?php echo e(__('Wishlist')); ?>"><i data-feather="heart"></i><span class="topbar-action-badge wishlist_count"><?php echo e(App\Wishlist::where('user_id',Auth::user()->id)->count()); ?></span></a></li>

                            <?php endif; ?>
                            <li>
                                <a href="<?php echo e(url('cart')); ?>" data-bs-toggle="tooltip" data-bs-placement="down" data-bs-title="<?php echo e(__('Cart')); ?>">
                                    <i data-feather="shopping-cart" class="topbar-action-badge cart_count">
                                        <?php
                                            if(Auth::check()){
                                                echo App\Cart::where('user_id', Auth::user()->id)->count();
                                            } else {
                                                echo 'sar';
            //                                        echo Session::get('cart')?count([Session::get('cart')]):'';
                                                echo Session::get('guest_cart')?count([Session::get('guest_cart')]):'';
                                            }
                                        ?>
                                     </i>
                                </a>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <a class=" dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="user">
                                        <i data-feather="user"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="user-img">
                                                <?php if(Auth::check() && Auth::user()->image != '' && file_exists(public_path() . '/images/user/' . Auth::user()->image)): ?>
                                                    <img src="<?php echo e(url('/images/user/'.Auth::user()->image)); ?>" class="img-fluid" alt="<?php echo e(Auth::check()?Auth::user()->name:''); ?>">
                                                <?php elseif(Auth::check()): ?>
                                                    <img src="<?php echo e(Avatar::create(Auth::user()->name)->toBase64()); ?>" class="img-fluid" alt="<?php echo e(Auth::check()?Auth::user()->name:''); ?>">
                                                <?php else: ?>
                                                    <img src="frontend/assets/images/user.png" class="img-fluid" alt="Profile">
                                                <?php endif; ?>
                                            </div>
                                            <div class="user-dtl">
                                                <h6 class="user-name"><?php echo e(Auth::check()?Auth::user()->name:''); ?></h6>
                                                <p><a href="mailto:<?php echo e(Auth::check()?Auth::user()->email:''); ?>" title="Email"><?php echo e(Auth::check()?Auth::user()->email:''); ?></a></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Topbar App End -->

        <!-- Home Start -->
    <section id="home" class="home-main-block product-home">
      <div class="container">
        <div class="row g-0">


























































          <div class="col-xl-12 col-lg-12 col-md-12">
            <nav class="navbar navbar-expand-lg menubar about-menubar">
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class="row">
                        <ul class="navbar-nav">
                            <li class="nav-item active col-md-2">
                                <a  class="form-select " href="#" data-bs-toggle="dropdown" title="<?php echo e(__('Categories')); ?>" ><?php echo e(__('All Categories')); ?> </a>
                                <ul class="dropdown-menu">
                                    <?php $__currentLoopData = App\Category::where('status','1')->orderBy('position')->paginate(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a class="dropdown-item" href="javascript:" onclick="changeCategory(<?php echo e($cat->id); ?>,'main')" title="<?php echo e($cat->title); ?>">
                                                <?php echo e(__($cat->title)); ?>

                                                <?php if(count($cat->subcategory)): ?>
                                                    <i data-feather="chevron-right"></i>
                                                <?php endif; ?>
                                            </a>
                                            <?php if(count($cat->subcategory)): ?>
                                                <ul class="submenu dropdown-menu">
                                                    <?php $__currentLoopData = $cat->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subKey => $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <a class="dropdown-item" href="javascript:" onclick="changeCategory(<?php echo e($subcat->id); ?>, 'sub')" title="<?php echo e($subcat->title); ?>"><?php echo e(__($subcat->title)); ?>

                                                                <?php if(count($subcat->childcategory)): ?>
                                                                    <i data-feather="chevron-right"></i>
                                                                <?php endif; ?>
                                                            </a>
                                                            <?php if(count($subcat->childcategory)): ?>
                                                                <ul class="submenu dropdown-menu">
                                                                    <?php $__currentLoopData = $subcat->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childKey => $childcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <li><a class="dropdown-item" href="javascript:" onclick="changeCategory(<?php echo e($childcat->id); ?>, 'child')" title="<?php echo e($childcat->title); ?>"><?php echo e(__($childcat->title)); ?></a></li>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </ul>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" aria-current="page" href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" aria-current="page" href="<?php echo e(route('all_authors')); ?>" title="Author"><?php echo e(__('Authors')); ?></a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" aria-current="page" href="<?php echo e(route('all_publishers')); ?>" title="Publisher"><?php echo e(__('Publishers')); ?></a>
                            </li>









































                        </ul>

                    </div>

                </div>
              </div>
            </nav>
          </div>
        </div>

      </div>
    </section>
    <!-- Home End -->
    <script>
        function changeCategory(id, pog) {
            var base_URL = $('.baseURl').val();
            var start = '10.00';
            var end = '100000.00';
            var sid=id;
            var url = "<?php echo e(route('all_product', ['id'=>':id','pog'=>':pog'])); ?>";
            url = url.replace(':id', id);
            url = url.replace(':pog', pog);

            window.location=url;













        }
    </script><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/layout/header.blade.php ENDPATH**/ ?>