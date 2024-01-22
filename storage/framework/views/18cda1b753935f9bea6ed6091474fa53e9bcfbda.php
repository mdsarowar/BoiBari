
<?php $__env->startSection('title','Emart | Home'); ?>
<?php $__env->startSection("content"); ?>

    <?php if($offersettings && $offersettings->enable_popup=='1' && Cookie::get('popup') == ''): ?>
        <!-- Modal Start -->
        <div id="homemodal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="modal-home-img"
                                     style="background-image: url('<?= URL::to('/'); ?>/images/offerpopup/<?php echo e($offersettings->image); ?>');"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="modal-home-block text-center">
                                    <h3 class="section-title"
                                        style="color: <?php echo e($offersettings->heading_color); ?>;"><?php echo e($offersettings?$offersettings->heading:''); ?></h3>
                                    <h4 class="section-sub-title"
                                        style="color: <?php echo e($offersettings->subheading_color); ?>;"><?php echo e($offersettings?$offersettings->subheading:''); ?></h4>
                                    <p style="color: <?php echo e($offersettings->description_text_color); ?>;"><?php echo e($offersettings?$offersettings->description:''); ?></p>
                                    <?php if($offersettings->enable_button=='1' && $offersettings->button_text): ?>
                                        <a href="<?php echo e($offersettings?$offersettings->button_link:''); ?>"
                                           class="btn btn-primary"
                                           title="<?php echo e($offersettings?$offersettings->button_text:''); ?>"
                                           style="color: <?php echo e($offersettings->button_color); ?>;"><span
                                                    style="color: <?php echo e($offersettings->button_text_color); ?>;"><?php echo e($offersettings?$offersettings->button_text:''); ?></span></a>
                                    <?php endif; ?>
                                    <div class="form-check">
                                        <input class="form-check-input offerpop_not_show" type="checkbox"
                                               name="do_not_show_me" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">Don't show me this popup
                                            again !</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
    <?php endif; ?>

    <!-- Home Start [slider] -->
    <section id="home" class="home-main-block" data-aos="fade-left">
        <div class="container-fluid">
            <div class="row g-0">
                
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="fade-home-slider">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <div class="home-image">
                                    <img src="<?php echo e(url('images/slider/'.$slider->image)); ?>" class="img-fluid" alt=""
                                         style="height: 300px">
                                </div>
                                <div class="home-block" data-aos="fade-up">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="home-title-block">
                                                <h3 class="home-title"
                                                    style="color: <?php echo e($slider->headingtextcolor); ?>;"><?php echo e($slider->heading); ?></h3>
                                                <h6 class="home-sub-title"
                                                    style="color: <?php echo e($slider->subheadingcolor); ?>;"><?php echo e($slider->topheading); ?></h6>
                                            </div>
                                            <div class="home-dtl">
                                                <p style="color: <?php echo e($slider->short_description_color); ?>;"><?php echo e($slider->short_description); ?></p>
                                                <?php if($slider->call_support_status=='1'): ?>
                                                    <div class="home-contact">
                                                        <div class="contact-icon">
                                                            <i data-feather="phone-call"
                                                               style="color: <?php echo e($slider->call_icon_color); ?>;"></i>
                                                        </div>
                                                        <div class="contact-dtl">
                                                            <h6 class="contact-title"
                                                                style="color: <?php echo e($slider->call_title_color); ?>;"><?php echo e($slider->call_title); ?></h6>
                                                            <p style="color: <?php echo e($slider->call_no_color); ?>;"><?php echo e($slider->call_no); ?></p>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home End -->


    <?php if(!empty($top_categories)): ?>
        <!-- Top Categories Start -->
        <section id="customer-support" class="customer-support-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1; margin-bottom: 15px">
                    <div class="col-lg-6">
                        <h3 class="section-title text-light"><?php echo e(__('Top Categories')); ?> </h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all-btn">
                            <a href="<?php echo e(route('all_category')); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <?php $__currentLoopData = $top_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6" style="margin-bottom: 20px">
                            <div class="customer-support-block border-hover" data-aos="fade-right">
                                <div class="border-hover-two">
                                    <a href="<?php echo e(route('all_product',[$cat->id,'main'])); ?>">
                                        <div class="row">
                                            <div class="col-lg-3 col-4">
                                                <div class="support-img">
                                                    
                                                    <?php if($cat->image != '' && file_exists(public_path() . '/images/category/' . $cat->image)): ?>
                                                        <img src="<?php echo e(url('images/category/'.$cat->image)); ?>"
                                                             class="img-fluid shipping-img" alt="<?php echo e(__($cat->title)); ?>">
                                                    <?php else: ?>
                                                        <img class="img-fluid shipping-img" title="<?php echo e(__($cat->title)); ?>"
                                                             src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"/>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-8">
                                                <div class="support-dtl">
                                                    <h5 class="support-title"><?php echo e($cat->title); ?></h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <!-- Top Categories End -->
    <?php endif; ?>



    <?php if(count($top_selles)): ?>

        <!-- Top seller Start -->
        <section id="top-seller" class="feature-brand-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1; margin-bottom: 15px">
                    <div class="col-lg-6">
                        <h3 class="section-title text-light"><?php echo e(__('Top Seller Books')); ?></h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all-btn">
                            <a href="<?php echo e(route('all_product')); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="topseler-slider" class="featured-brand-slidersr-main-block owl-carousel owl-theme">
                            <?php $__currentLoopData = $top_selles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item" data-aos="fade-right">
                                    <div class="featured-brand-block border-hover">
                                        <div class="border-hover-two">
                                            <div class="featured-product-img">
                                                <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>" title="">
                                                    <?php if($featured_pro->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$featured_pro->thumbnail)): ?>
                                                        <img src="<?php echo e(url('images/simple_products/'.$featured_pro->thumbnail)); ?>"
                                                             class="img-fluid"
                                                             alt="<?php echo e(__($featured_pro->product_name)); ?>"
                                                             style="height: 200px">
                                                    <?php else: ?>
                                                        <img class="img-fluid"
                                                             title="<?php echo e($featured_pro->product_name); ?>"
                                                             src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"
                                                             style="height: 200px">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="featured-product-icon">
                                                    <ul>
                                                        <li>
                                                            <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                                               data-bs-title="<?php echo e(__('View')); ?>"><i
                                                                        data-feather="eye"></i></a></li>
                                                        <?php if(auth()->guard()->check()): ?>

                                                            <?php if($featured_pro->type != 'ex_product'): ?>

                                                                <?php if(inwishlist($featured_pro->id)): ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple add-wishlist"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php else: ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>

                                                            <?php endif; ?>

                                                        <?php endif; ?>
                                                        <li>
                                                            <form method="POST"
                                                                  action="<?php echo e($featured_pro->type == 'ex_product' ? $featured_pro->external_product_link : route('add.cart.simple',['pro_id' => $featured_pro->id, 'price' => $featured_pro->price, 'offerprice' => $featured_pro->offer_price])); ?>"
                                                                  class="addSimpleCardFrom<?php echo e($featured_pro->id); ?>">
                                                                <?php echo csrf_field(); ?>

                                                                <input name="qty" type="hidden"
                                                                       value="<?php echo e($featured_pro->min_order_qty); ?>"
                                                                       max="<?php echo e($featured_pro->max_order_qty); ?>"
                                                                       class="qty-section">

                                                                <a href="javascript:"
                                                                   onclick="addSimpleProCard(<?php echo e($featured_pro->id); ?>)"
                                                                   data-bs-toggle="tooltip" data-bs-placement="left"
                                                                   data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                                                            data-feather="shopping-cart"></i></a>

                                                            </form>
                                                        </li>





                                                    </ul>
                                                </div>
                                                <div class="featured-product-badge">
                                                    <?php if($featured_pro->offer_price != 0): ?>
                                                        <?php
                                                            $conversion_rate = 1;
                                                            $getdisprice = ($featured_pro->price*$conversion_rate) - ($featured_pro->offer_price * $conversion_rate);
                                                            $gotdis = $getdisprice/($featured_pro->price * $conversion_rate);
                                                            $offamount = round($gotdis*100);

                                                        ?>
                                                        <span class="badge text-bg-warning"><?php echo e($offamount); ?>% <?php echo e(__("off")); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="featured-product-dtl">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <h6 class="featured-product-title truncate"><a
                                                                    href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                                    title="<?php echo e(__($featured_pro->product_name)); ?>"><?php echo e(__($featured_pro->product_name)); ?></a>
                                                        </h6>
                                                        <p>By <span><a href="#" title=""
                                                                       class="store-name"><?php echo e(__($featured_pro->store?$featured_pro->store->name:'')); ?></a></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="featured-product-price">
                                                            <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                            <?php echo e($featured_pro->offer_price != 0 && $featured_pro->offer_price != '' ? price_format($featured_pro->offer_price) :  price_format($featured_pro->price)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Top Seller End -->
    <?php endif; ?>

    <?php if(!empty($featured_products)): ?>
        <!-- Feature Products Start -->
        <section id="feature-brand" class="feature-brand-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1; margin-bottom: 15px">
                    <div class="col-lg-6">
                        <h3 class="section-title text-light"><?php echo e(__('Featured Products')); ?></h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all-btn">
                            <a href="<?php echo e(route('all_product')); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div id="featured-brand-slider" class="featured-brand-slider-main-block owl-carousel owl-theme">
                            <?php $__currentLoopData = $featured_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item" data-aos="fade-right">
                                    <div class="featured-brand-block border-hover">
                                        <div class="border-hover-two">
                                            <div class="featured-product-img">
                                                <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>" title="">
                                                    <?php if($featured_pro->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$featured_pro->thumbnail)): ?>
                                                        <img src="<?php echo e(url('images/simple_products/'.$featured_pro->thumbnail)); ?>"
                                                             class="img-fluid"
                                                             alt="<?php echo e(__($featured_pro->product_name)); ?>"
                                                             style="height: 200px">
                                                    <?php else: ?>
                                                        <img class="img-fluid"
                                                             title="<?php echo e($featured_pro->product_name); ?>"
                                                             src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"
                                                             style="height: 200px">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="featured-product-icon">
                                                    <ul>
                                                        <li>
                                                            <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                                               data-bs-title="<?php echo e(__('View')); ?>"><i
                                                                        data-feather="eye"></i></a></li>
                                                        <?php if(auth()->guard()->check()): ?>

                                                            <?php if($featured_pro->type != 'ex_product'): ?>

                                                                <?php if(inwishlist($featured_pro->id)): ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple add-wishlist"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php else: ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>

                                                            <?php endif; ?>

                                                        <?php endif; ?>
                                                        <li>
                                                            <form method="POST"
                                                                  action="<?php echo e($featured_pro->type == 'ex_product' ? $featured_pro->external_product_link : route('add.cart.simple',['pro_id' => $featured_pro->id, 'price' => $featured_pro->price, 'offerprice' => $featured_pro->offer_price])); ?>"
                                                                  class="addSimpleCardFrom<?php echo e($featured_pro->id); ?>">
                                                                <?php echo csrf_field(); ?>

                                                                <input name="qty" type="hidden"
                                                                       value="<?php echo e($featured_pro->min_order_qty); ?>"
                                                                       max="<?php echo e($featured_pro->max_order_qty); ?>"
                                                                       class="qty-section">

                                                                <a href="javascript:"
                                                                   onclick="addSimpleProCard(<?php echo e($featured_pro->id); ?>)"
                                                                   data-bs-toggle="tooltip" data-bs-placement="left"
                                                                   data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                                                            data-feather="shopping-cart"></i></a>

                                                            </form>
                                                        </li>





                                                    </ul>
                                                </div>
                                                <div class="featured-product-badge">
                                                    <?php if($featured_pro->offer_price != 0): ?>
                                                        <?php
                                                            $conversion_rate = 1;
                                                            $getdisprice = ($featured_pro->price*$conversion_rate) - ($featured_pro->offer_price * $conversion_rate);
                                                            $gotdis = $getdisprice/($featured_pro->price * $conversion_rate);
                                                            $offamount = round($gotdis*100);

                                                        ?>
                                                        <span class="badge text-bg-warning"><?php echo e($offamount); ?>% <?php echo e(__("off")); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="featured-product-dtl">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <h6 class="featured-product-title truncate"><a
                                                                    href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                                    title="<?php echo e(__($featured_pro->product_name)); ?>"><?php echo e(__($featured_pro->product_name)); ?></a>
                                                        </h6>
                                                        <p>By <span><a href="#" title=""
                                                                       class="store-name"><?php echo e(__($featured_pro->store?$featured_pro->store->name:'')); ?></a></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="featured-product-price">
                                                            <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                            <?php echo e($featured_pro->offer_price != 0 && $featured_pro->offer_price != '' ? price_format($featured_pro->offer_price) :  price_format($featured_pro->price)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Feature Products End -->
    <?php endif; ?>

    <?php if(count($latest_products)): ?>
        <!-- Latest product Start -->
        <section id="featured-product" class="featured-product-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1">
                    <div class="col-lg-6 col-8">
                        <h3 class="section-title text-light"><?php echo e(__('Latest Products')); ?></h3>
                    </div>
                    <div class="col-lg-6 col-4">
                        <div class="view-all-btn">

                            <a href="<?php echo e(route('all_product')); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if(count($latest_products)): ?>
                        <div class="col-lg-4" data-aos="fade-right">
                            <div class="featured-block">
                                <a href="<?php echo e(route('show.product',['id' => $latest_products[0]->id, 'slug' => $latest_products[0]->slug])); ?>">
                                    <div class="featured-img">
                                        <?php if($latest_products[0]->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$latest_products[0]->thumbnail)): ?>
                                            <img src="<?php echo e(url('images/simple_products/'.$latest_products[0]->thumbnail)); ?>"
                                                 class="img-fluid" alt="<?php echo e(__($latest_products[0]->product_name)); ?>"
                                                 style="height: 450px">
                                        <?php else: ?>
                                            <img class="img-fluid" title="<?php echo e($latest_products[0]->product_name); ?>"
                                                 src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"/>
                                        <?php endif; ?>
                                    </div>
                                </a>

                                <div class="featured-badge">
                                    <?php if($latest_products[0]->offer_price != 0): ?>
                                        <?php
                                            $conversion_rate = 1;
                                            $getdisprice = ($latest_products[0]->price*$conversion_rate) - ($latest_products[0]->offer_price * $conversion_rate);
                                            $gotdis = $getdisprice/($latest_products[0]->price * $conversion_rate);
                                            $offamount = round($gotdis*100);

                                        ?>
                                        <span class="badge text-bg-warning"><?php echo e($offamount); ?>% <?php echo e(__("off")); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="featured-dtl">
                                <div class="featured-title-star">
                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <h4 class="featured-dtl-title truncate"><a
                                                        href="<?php echo e(route('show.product',['id' => $latest_products[0]->id, 'slug' => $latest_products[0]->slug])); ?>"
                                                        title="<?php echo e(__($latest_products[0]->product_name)); ?>"><?php echo e(__($latest_products[0]->product_name)); ?></a>
                                            </h4>
                                            <p><?php echo e(__('By')); ?> <span><a href="#" title=""
                                                                     class="store-name"><?php echo e(__($latest_products[0]->store?$latest_products[0]->store->name:'')); ?></a></span>
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                                <?php

                                                $review_t = 0;

                                                $price_t = 0;

                                                $value_t = 0;

                                                $sub_total = 0;

                                                $ratings_var = 0;

                                                $count = count($latest_products[0]->reviews);

                                                $onlyrev = array();

                                                foreach ($latest_products[0]->reviews as $review) {
                                                    $review_t = $review->qty * 5;
                                                    $price_t = $review->price * 5;
                                                    $value_t = $review->value * 5;
                                                    $sub_total = $sub_total + $review_t + $price_t + $value_t;
                                                }

                                                $count = ($count * 3) * 5;

                                                if ($count != "" && $count > 0) {
                                                    $rat = $sub_total / $count;

                                                    $ratings_var = ($rat * 100) / 5;

                                                    $overallrating = ($ratings_var / 2) / 10;
                                                }

                                                ?>
                                            <?php if(isset($ratings_var)): ?>
                                                <div class="star-ratings-sprite"><span
                                                            style="width:<?php echo $ratings_var; ?>%;"
                                                            class="star-ratings-sprite-rating"></span></div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="featured-price-btn">
                                    <div class="row">
                                        <div class="col-lg-6 col-6">
                                            <div class="featured-price">
                                                <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                <?php echo e($latest_products[0]->offer_price != 0 && $latest_products[0]->offer_price != '' ? price_format($latest_products[0]->offer_price) :  price_format($latest_products[0]->price)); ?>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-6">
                                            <div class="featured-add-btn">
                                                <form method="POST"
                                                      action="<?php echo e($latest_products[0]->type == 'ex_product' ? $latest_products[0]->external_product_link : route('add.cart.simple',['pro_id' => $latest_products[0]->id, 'price' => $latest_products[0]->price, 'offerprice' => $latest_products[0]->offer_price])); ?>"
                                                      class="addSimpleCardFrom<?php echo e($latest_products[0]->id); ?>">
                                                    <?php echo csrf_field(); ?>

                                                    <input name="qty" type="hidden"
                                                           value="<?php echo e($latest_products[0]->min_order_qty); ?>"
                                                           max="<?php echo e($latest_products[0]->max_order_qty); ?>"
                                                           class="qty-section">

                                                    <a href="javascript:" class="btn btn-primary"
                                                       onclick="addSimpleProCard(<?php echo e($latest_products[0]->id); ?>)"
                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                       data-bs-title="<?php echo e(__('Add To Cart')); ?>"><?php echo e(__('Add')); ?><i
                                                                data-feather="shopping-cart"></i></a>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-8" data-aos="fade-up">
                        <div class="row">
                            <?php if($latest_products): ?>
                                <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $featured_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(!$key==0): ?>
                                        <div class="col-lg-3 col-md-3 col-4">
                                            <div class="featured-product-block">
                                                <div class="featured-product-img">
                                                    <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>" title="">
                                                        <?php if($featured_pro->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$featured_pro->thumbnail)): ?>
                                                            <img src="<?php echo e(url('images/simple_products/'.$featured_pro->thumbnail)); ?>"
                                                                 class="img-fluid"
                                                                 alt="<?php echo e(__($featured_pro->product_name)); ?>"
                                                                 style="height: 200px">
                                                        <?php else: ?>
                                                            <img class="img-fluid"
                                                                 title="<?php echo e($featured_pro->product_name); ?>"
                                                                 src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"
                                                                 style="height: 200px">
                                                        <?php endif; ?>
                                                    </a>
                                                    <div class="featured-product-icon">
                                                        <ul>
                                                            <li>
                                                                <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                                   data-bs-toggle="tooltip" data-bs-placement="left"
                                                                   data-bs-title="<?php echo e(__('View')); ?>"><i
                                                                            data-feather="eye"></i></a></li>
                                                            <?php if(auth()->guard()->check()): ?>

                                                                <?php if($featured_pro->type != 'ex_product'): ?>

                                                                    <?php if(inwishlist($featured_pro->id)): ?>
                                                                        <li>
                                                                            <a class="add_in_wish_simple add-wishlist"
                                                                               data-proid="<?php echo e($featured_pro->id); ?>"
                                                                               data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="left"
                                                                               data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                               href="javascript:void(0)">
                                                                                <i data-feather="heart"></i>
                                                                            </a>
                                                                        </li>
                                                                    <?php else: ?>
                                                                        <li>
                                                                            <a class="add_in_wish_simple"
                                                                               data-proid="<?php echo e($featured_pro->id); ?>"
                                                                               data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                               data-bs-toggle="tooltip"
                                                                               data-bs-placement="left"
                                                                               data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                               href="javascript:void(0)">
                                                                                <i data-feather="heart"></i>
                                                                            </a>
                                                                        </li>
                                                                    <?php endif; ?>

                                                                <?php endif; ?>

                                                            <?php endif; ?>
                                                            <li>
                                                                <form method="POST"
                                                                      action="<?php echo e($featured_pro->type == 'ex_product' ? $featured_pro->external_product_link : route('add.cart.simple',['pro_id' => $featured_pro->id, 'price' => $featured_pro->price, 'offerprice' => $featured_pro->offer_price])); ?>"
                                                                      class="addSimpleCardFrom<?php echo e($featured_pro->id); ?>">
                                                                    <?php echo csrf_field(); ?>

                                                                    <input name="qty" type="hidden"
                                                                           value="<?php echo e($featured_pro->min_order_qty); ?>"
                                                                           max="<?php echo e($featured_pro->max_order_qty); ?>"
                                                                           class="qty-section">

                                                                    <a href="javascript:"
                                                                       onclick="addSimpleProCard(<?php echo e($featured_pro->id); ?>)"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                                                                data-feather="shopping-cart"></i></a>

                                                                </form>
                                                            </li>





                                                        </ul>
                                                    </div>
                                                    <div class="featured-product-badge">
                                                        <?php if($featured_pro->offer_price != 0): ?>
                                                            <?php
                                                                $conversion_rate = 1;
                                                                $getdisprice = ($featured_pro->price*$conversion_rate) - ($featured_pro->offer_price * $conversion_rate);
                                                                $gotdis = $getdisprice/($featured_pro->price * $conversion_rate);
                                                                $offamount = round($gotdis*100);

                                                            ?>
                                                            <span class="badge text-bg-warning"><?php echo e($offamount); ?>% <?php echo e(__("off")); ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="featured-product-dtl">
                                                    <div class="row">
                                                        <div class="col-lg-7">
                                                            <h6 class="featured-product-title truncate"><a
                                                                        href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                                        title="<?php echo e(__($featured_pro->product_name)); ?>"><?php echo e(__($featured_pro->product_name)); ?></a>
                                                            </h6>
                                                            <p>By <span><a href="#" title=""
                                                                           class="store-name"><?php echo e(__($featured_pro->store?$featured_pro->store->name:'')); ?></a></span>
                                                            </p>
                                                        </div>
                                                        <div class="col-lg-5">
                                                            <div class="featured-product-price">
                                                                <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                                <?php echo e($featured_pro->offer_price != 0 && $featured_pro->offer_price != '' ? price_format($featured_pro->offer_price) :  price_format($featured_pro->price)); ?>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php
                                    $conversion_rate = 1;
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Latest product End -->
    <?php else: ?>
            <?php $conversion_rate = 1; ?>
    <?php endif; ?>

    <?php if(count($bcs_products)): ?>
        <!-- BCS Books Start -->
        <section id="feature-brand" class="feature-brand-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1; margin-bottom: 15px">
                    <div class="col-lg-6">
                        <h3 class="section-title text-light"><?php echo e(__('BCS Books')); ?></h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all-btn">
                            <a href="<?php echo e(route('all_product',[$bcs->id,'main'])); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div id="bcs-book-slider" class="featured-brand-slider-main-block owl-carousel owl-theme">
                            <?php $__currentLoopData = $bcs_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item" data-aos="fade-right">
                                    <div class="featured-brand-block border-hover">
                                        <div class="border-hover-two">
                                            <div class="featured-product-img">
                                                <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>" title="">
                                                    <?php if($featured_pro->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$featured_pro->thumbnail)): ?>
                                                        <img src="<?php echo e(url('images/simple_products/'.$featured_pro->thumbnail)); ?>"
                                                             class="img-fluid"
                                                             alt="<?php echo e(__($featured_pro->product_name)); ?>"
                                                             style="height: 200px">
                                                    <?php else: ?>
                                                        <img class="img-fluid"
                                                             title="<?php echo e($featured_pro->product_name); ?>"
                                                             src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"
                                                             style="height: 200px">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="featured-product-icon">
                                                    <ul>
                                                        <li>
                                                            <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                                               data-bs-title="<?php echo e(__('View')); ?>"><i
                                                                        data-feather="eye"></i></a></li>
                                                        <?php if(auth()->guard()->check()): ?>

                                                            <?php if($featured_pro->type != 'ex_product'): ?>

                                                                <?php if(inwishlist($featured_pro->id)): ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple add-wishlist"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php else: ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>

                                                            <?php endif; ?>

                                                        <?php endif; ?>
                                                        <li>
                                                            <form method="POST"
                                                                  action="<?php echo e($featured_pro->type == 'ex_product' ? $featured_pro->external_product_link : route('add.cart.simple',['pro_id' => $featured_pro->id, 'price' => $featured_pro->price, 'offerprice' => $featured_pro->offer_price])); ?>"
                                                                  class="addSimpleCardFrom<?php echo e($featured_pro->id); ?>">
                                                                <?php echo csrf_field(); ?>

                                                                <input name="qty" type="hidden"
                                                                       value="<?php echo e($featured_pro->min_order_qty); ?>"
                                                                       max="<?php echo e($featured_pro->max_order_qty); ?>"
                                                                       class="qty-section">

                                                                <a href="javascript:"
                                                                   onclick="addSimpleProCard(<?php echo e($featured_pro->id); ?>)"
                                                                   data-bs-toggle="tooltip" data-bs-placement="left"
                                                                   data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                                                            data-feather="shopping-cart"></i></a>

                                                            </form>
                                                        </li>





                                                    </ul>
                                                </div>
                                                <div class="featured-product-badge">
                                                    <?php if($featured_pro->offer_price != 0): ?>
                                                        <?php
                                                            $conversion_rate = 1;
                                                            $getdisprice = ($featured_pro->price*$conversion_rate) - ($featured_pro->offer_price * $conversion_rate);
                                                            $gotdis = $getdisprice/($featured_pro->price * $conversion_rate);
                                                            $offamount = round($gotdis*100);

                                                        ?>
                                                        <span class="badge text-bg-warning"><?php echo e($offamount); ?>% <?php echo e(__("off")); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="featured-product-dtl">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <h6 class="featured-product-title truncate"><a
                                                                    href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                                    title="<?php echo e(__($featured_pro->product_name)); ?>"><?php echo e(__($featured_pro->product_name)); ?></a>
                                                        </h6>
                                                        <p>By <span><a href="#" title=""
                                                                       class="store-name"><?php echo e(__($featured_pro->store?$featured_pro->store->name:'')); ?></a></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="featured-product-price">
                                                            <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                            <?php echo e($featured_pro->offer_price != 0 && $featured_pro->offer_price != '' ? price_format($featured_pro->offer_price) :  price_format($featured_pro->price)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- BCS Books End -->
    <?php endif; ?>


    <?php if(count($deals) && $deals): ?>
        <!-- Flash Deal Start -->
        <section id="flash-deal" class="flash-deal-main-block">
            <div class="container">
                <h3 class="section-title"><?php echo e(__('Flash Deals')); ?> <i data-feather="zap"></i></h3>
                <div class="fade-home-slider">
                    <?php $__currentLoopData = $deals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <a href="<?php echo e(route('flashdeals.view',['id' => $deal->id, 'slug' => str_slug($deal->title,'-')])); ?>"
                               title="<?php echo e($deal->title); ?>">
                                <div class="flashdeal-bg-block">
                                    <div class="flashdeal-bg-block-img">
                                        <img src="<?php echo e(url('frontend/assets/images/flash_deals/flash-deal-bg.png')); ?>"
                                             class="img-fluid" alt="<?php echo e($deal->title); ?>">
                                        <div class="flashdeal-bg-dtl">
                                            <div class="row">
                                                <div class="col-lg-8" data-aos="fade-right">
                                                    <h4 class="section-title"><?php echo e($deal->title); ?></h4>
                                                    <div class="badge text-bg-warning sale-date"><?php echo e(date('d', strtotime($deal->start_date))); ?>

                                                        <sup>st</sup><?php echo e(date('F', strtotime($deal->start_date))); ?>

                                                        - <?php echo e(date('d', strtotime($deal->end_date))); ?>

                                                        <sup>th</sup> <?php echo e(date('F', strtotime($deal->end_date))); ?></div>
                                                </div>
                                                <div class="col-lg-4" data-aos="fade-left">
                                                    <div class="flashdeal-bg-img">
                                                        <img src="<?php echo e(url('images/flashdeals/'.$deal->background_image)); ?>"
                                                             class="img-fluid" alt="<?php echo e($deal->title); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <!-- Flash Deal End -->
    <?php endif; ?>

    <?php if(!empty($authors)): ?>
        <!-- Authors Start -->
        <section id="customer-support" class="customer-support-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1; margin-bottom: 15px">
                    <div class="col-lg-6">
                        <h3 class="section-title text-light"><?php echo e(__('Author')); ?></h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all-btn">
                            <a href="<?php echo e(route('all_authors')); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6" style="margin-bottom: 20px">
                            <div class="customer-support-block border-hover" data-aos="fade-right">
                                <div class="border-hover-two">
                                    <a href="<?php echo e(route('all_product',[$author->id,'author'])); ?>">
                                        <div class="row">
                                            <div class="col-lg-3 col-4">
                                                <div class="support-img">
                                                    
                                                    <?php if($author->image != '' && file_exists(public_path() . '/images/Author/' . $author->image)): ?>
                                                        <img src="<?php echo e(url('images/Author/'.$author->image)); ?>"
                                                             class="img-fluid shipping-img" alt="<?php echo e(__($author->title)); ?>">
                                                    <?php else: ?>
                                                        <img class="img-fluid shipping-img" title="<?php echo e(__($author->title)); ?>"
                                                             src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"/>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-8">
                                                <div class="support-dtl">
                                                    <h5 class="support-title"><?php echo e($author->title); ?></h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
        <!-- Authors End -->
    <?php endif; ?>


    <?php if(count($bank_products)): ?>
        <!-- Bank Books Start -->
        <section id="feature-brand" class="feature-brand-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1; margin-bottom: 15px">
                    <div class="col-lg-6">
                        <h3 class="section-title text-light"><?php echo e(__('Bank Books')); ?></h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all-btn">
                            <a href="<?php echo e(route('all_product',[$bank->id,'main'])); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div id="bank-book-slider" class="featured-brand-slider-main-block owl-carousel owl-theme">
                            <?php $__currentLoopData = $bank_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item" data-aos="fade-right">
                                    <div class="featured-brand-block border-hover">
                                        <div class="border-hover-two">
                                            <div class="featured-product-img">
                                                <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>" title="">
                                                    <?php if($featured_pro->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$featured_pro->thumbnail)): ?>
                                                        <img src="<?php echo e(url('images/simple_products/'.$featured_pro->thumbnail)); ?>"
                                                             class="img-fluid"
                                                             alt="<?php echo e(__($featured_pro->product_name)); ?>"
                                                             style="height: 200px">
                                                    <?php else: ?>
                                                        <img class="img-fluid"
                                                             title="<?php echo e($featured_pro->product_name); ?>"
                                                             src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"
                                                             style="height: 200px">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="featured-product-icon">
                                                    <ul>
                                                        <li>
                                                            <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                                               data-bs-title="<?php echo e(__('View')); ?>"><i
                                                                        data-feather="eye"></i></a></li>
                                                        <?php if(auth()->guard()->check()): ?>

                                                            <?php if($featured_pro->type != 'ex_product'): ?>

                                                                <?php if(inwishlist($featured_pro->id)): ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple add-wishlist"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php else: ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>

                                                            <?php endif; ?>

                                                        <?php endif; ?>
                                                        <li>
                                                            <form method="POST"
                                                                  action="<?php echo e($featured_pro->type == 'ex_product' ? $featured_pro->external_product_link : route('add.cart.simple',['pro_id' => $featured_pro->id, 'price' => $featured_pro->price, 'offerprice' => $featured_pro->offer_price])); ?>"
                                                                  class="addSimpleCardFrom<?php echo e($featured_pro->id); ?>">
                                                                <?php echo csrf_field(); ?>

                                                                <input name="qty" type="hidden"
                                                                       value="<?php echo e($featured_pro->min_order_qty); ?>"
                                                                       max="<?php echo e($featured_pro->max_order_qty); ?>"
                                                                       class="qty-section">

                                                                <a href="javascript:"
                                                                   onclick="addSimpleProCard(<?php echo e($featured_pro->id); ?>)"
                                                                   data-bs-toggle="tooltip" data-bs-placement="left"
                                                                   data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                                                            data-feather="shopping-cart"></i></a>

                                                            </form>
                                                        </li>





                                                    </ul>
                                                </div>
                                                <div class="featured-product-badge">
                                                    <?php if($featured_pro->offer_price != 0): ?>
                                                        <?php
                                                            $conversion_rate = 1;
                                                            $getdisprice = ($featured_pro->price*$conversion_rate) - ($featured_pro->offer_price * $conversion_rate);
                                                            $gotdis = $getdisprice/($featured_pro->price * $conversion_rate);
                                                            $offamount = round($gotdis*100);

                                                        ?>
                                                        <span class="badge text-bg-warning"><?php echo e($offamount); ?>% <?php echo e(__("off")); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="featured-product-dtl">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <h6 class="featured-product-title truncate"><a
                                                                    href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                                    title="<?php echo e(__($featured_pro->product_name)); ?>"><?php echo e(__($featured_pro->product_name)); ?></a>
                                                        </h6>
                                                        <p>By <span><a href="#" title=""
                                                                       class="store-name"><?php echo e(__($featured_pro->store?$featured_pro->store->name:'')); ?></a></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="featured-product-price">
                                                            <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                            <?php echo e($featured_pro->offer_price != 0 && $featured_pro->offer_price != '' ? price_format($featured_pro->offer_price) :  price_format($featured_pro->price)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bank Books End -->
    <?php endif; ?>

    <?php if(!empty($academic_products)): ?>
        <!-- Academic Start -->
        <section id="feature-brand" class="feature-brand-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1; margin-bottom: 15px">
                    <div class="col-lg-6">
                        <h3 class="section-title text-light"><?php echo e(__('Academic Books')); ?></h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all-btn">
                            <a href="<?php echo e(route('all_product',[$academic->id,'main'])); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12">
                        <div id="academic-slider" class="featured-brand-slider-main-block owl-carousel owl-theme">
                            <?php $__currentLoopData = $academic_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $featured_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="item" data-aos="fade-right">
                                    <div class="featured-brand-block border-hover">
                                        <div class="border-hover-two">
                                            <div class="featured-product-img">
                                                <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>" title="">
                                                    <?php if($featured_pro->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$featured_pro->thumbnail)): ?>
                                                        <img src="<?php echo e(url('images/simple_products/'.$featured_pro->thumbnail)); ?>"
                                                             class="img-fluid"
                                                             alt="<?php echo e(__($featured_pro->product_name)); ?>"
                                                             style="height: 200px">
                                                    <?php else: ?>
                                                        <img class="img-fluid"
                                                             title="<?php echo e($featured_pro->product_name); ?>"
                                                             src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"
                                                             style="height: 200px">
                                                    <?php endif; ?>
                                                </a>
                                                <div class="featured-product-icon">
                                                    <ul>
                                                        <li>
                                                            <a href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                                               data-bs-title="<?php echo e(__('View')); ?>"><i
                                                                        data-feather="eye"></i></a></li>
                                                        <?php if(auth()->guard()->check()): ?>

                                                            <?php if($featured_pro->type != 'ex_product'): ?>

                                                                <?php if(inwishlist($featured_pro->id)): ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple add-wishlist"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php else: ?>
                                                                    <li>
                                                                        <a class="add_in_wish_simple"
                                                                           data-proid="<?php echo e($featured_pro->id); ?>"
                                                                           data-bs-status="<?php echo e(inwishlist($featured_pro->id)); ?>"
                                                                           data-bs-toggle="tooltip"
                                                                           data-bs-placement="left"
                                                                           data-bs-title="<?php echo e(__('Wishlist')); ?>"
                                                                           href="javascript:void(0)">
                                                                            <i data-feather="heart"></i>
                                                                        </a>
                                                                    </li>
                                                                <?php endif; ?>

                                                            <?php endif; ?>

                                                        <?php endif; ?>
                                                        <li>
                                                            <form method="POST"
                                                                  action="<?php echo e($featured_pro->type == 'ex_product' ? $featured_pro->external_product_link : route('add.cart.simple',['pro_id' => $featured_pro->id, 'price' => $featured_pro->price, 'offerprice' => $featured_pro->offer_price])); ?>"
                                                                  class="addSimpleCardFrom<?php echo e($featured_pro->id); ?>">
                                                                <?php echo csrf_field(); ?>

                                                                <input name="qty" type="hidden"
                                                                       value="<?php echo e($featured_pro->min_order_qty); ?>"
                                                                       max="<?php echo e($featured_pro->max_order_qty); ?>"
                                                                       class="qty-section">

                                                                <a href="javascript:"
                                                                   onclick="addSimpleProCard(<?php echo e($featured_pro->id); ?>)"
                                                                   data-bs-toggle="tooltip" data-bs-placement="left"
                                                                   data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                                                            data-feather="shopping-cart"></i></a>

                                                            </form>
                                                        </li>





                                                    </ul>
                                                </div>
                                                <div class="featured-product-badge">
                                                    <?php if($featured_pro->offer_price != 0): ?>
                                                        <?php
                                                            $conversion_rate = 1;
                                                            $getdisprice = ($featured_pro->price*$conversion_rate) - ($featured_pro->offer_price * $conversion_rate);
                                                            $gotdis = $getdisprice/($featured_pro->price * $conversion_rate);
                                                            $offamount = round($gotdis*100);

                                                        ?>
                                                        <span class="badge text-bg-warning"><?php echo e($offamount); ?>% <?php echo e(__("off")); ?></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="featured-product-dtl">
                                                <div class="row">
                                                    <div class="col-lg-7">
                                                        <h6 class="featured-product-title truncate"><a
                                                                    href="<?php echo e(route('show.product',['id' => $featured_pro->id, 'slug' => $featured_pro->slug])); ?>"
                                                                    title="<?php echo e(__($featured_pro->product_name)); ?>"><?php echo e(__($featured_pro->product_name)); ?></a>
                                                        </h6>
                                                        <p>By <span><a href="#" title=""
                                                                       class="store-name"><?php echo e(__($featured_pro->store?$featured_pro->store->name:'')); ?></a></span>
                                                        </p>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <div class="featured-product-price">
                                                            <i class="<?php echo e(session()->get('currency')?session()->get('currency')['value']:''); ?>"></i>
                                                            <?php echo e($featured_pro->offer_price != 0 && $featured_pro->offer_price != '' ? price_format($featured_pro->offer_price) :  price_format($featured_pro->price)); ?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Academic End -->
    <?php endif; ?>

    <?php if(!empty($publishers)): ?>
        <!-- Publisher Start -->
        <section id="customer-support" class="customer-support-main-block">
            <div class="container">
                <div class="row" style="background-color: #0a6aa1; margin-bottom: 15px">
                    <div class="col-lg-6">
                        <h3 class="section-title text-light"><?php echo e(__('Publisher')); ?></h3>
                    </div>
                    <div class="col-lg-6">
                        <div class="view-all-btn">
                            <a href="<?php echo e(route('all_publishers')); ?>" type="button" class="btn btn-primary"
                               title="<?php echo e(__('View All')); ?>"><?php echo e(__('View All')); ?></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6 col-sm-6" style="margin-bottom: 20px">
                            <div class="customer-support-block border-hover" data-aos="fade-right">
                                <div class="border-hover-two">
                                    <a href="<?php echo e(route('all_product',[$publisher->id,'publish'])); ?>">
                                        <div class="row">
                                            <div class="col-lg-3 col-4">
                                                <div class="support-img">
                                                    
                                                    <?php if($publisher->image != '' && file_exists(public_path() . '/images/Publishers/' . $publisher->image)): ?>
                                                        <img src="<?php echo e(url('images/Publishers/'.$publisher->image)); ?>"
                                                             class="img-fluid shipping-img" alt="<?php echo e(__($publisher->title)); ?>">
                                                    <?php else: ?>
                                                        <img class="img-fluid shipping-img" title="<?php echo e(__($publisher->title)); ?>"
                                                             src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"/>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-8">
                                                <div class="support-dtl">
                                                    <h5 class="support-title"><?php echo e($publisher->title); ?></h5>
                                                    <p></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
        <!-- Publisher End -->
    <?php endif; ?>

    <!-- three_layout_banners -->
    <?php if(isset($three_layout_banners) && $three_layout_banners): ?>
        <section id="offer-one" class="offer-one-main-block">






























































        </section>
    <?php endif; ?>

    <?php if(count($categories_tab)): ?>
        <!-- Popular Item Start -->










































































































































































































































































        <!-- Popular Item End -->
    <?php endif; ?>



    <?php if($two_adv_banners && isset($two_adv_banners)): ?>
        <!-- Offer Two Start -->









































        <!-- Offer Two End -->
    <?php endif; ?>

    <?php if($blogs && count($blogs)): ?>
        <!-- Blog Start -->

























































        <!-- Blog End -->
    <?php endif; ?>

    <?php if($genral && $genral->content && $genral->writer): ?>
        <!-- Background Start -->









        <!-- Background End -->
    <?php endif; ?>

    <?php if($stores && count($stores)): ?>
        <!-- Clients Start -->

























        <!-- Clients End -->
    <?php endif; ?>






































<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function () {
            $('.categorylist').show();
        });
    </script>
    <script>
        $('.offerpop_not_show').on('change', function () {

            if ($(this).is(":checked")) {
                var opt = 1;
            } else {
                var opt = 0;
            }

            $.ajax({
                type: 'GET',
                url: '<?php echo e(route("offer.pop.not.show")); ?>',
                data: {opt: opt},
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                }
            });

        });
    </script>

    <script>
        $(document).ready(function(){
            // $(".owl-carousel").owlCarousel();
            var owl = $('.owl1-carousel');
            console.log('sar');
            owl.owlCarousel({
                items:4,
                loop:true,
                margin:10,
                autoplay:true,
                autoplayTimeout:100,
                autoplayHoverPause:true
            });
            // $('.play').on('click',function(){
            //     owl.trigger('play.owl.autoplay',[1000])
            // })
            // $('.stop').on('click',function(){
            //     owl.trigger('stop.owl.autoplay')
            // })
        });
    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/home.blade.php ENDPATH**/ ?>