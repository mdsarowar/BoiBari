
<?php $__env->startSection('title', "Emart | $product->product_name"); ?>
<?php $__env->startSection('meta_tags'); ?>
  <link rel="canonical" href="<?php echo e(url()->full()); ?>" />
  <meta name="robots" content="all">
  <meta property="og:title" content="<?php echo e($product->product_name); ?>" />
  <meta name="keywords" content="<?php echo e($product->tags ?? ''); ?>">
  <meta property="og:description" content="<?php echo e(substr(strip_tags($product->product_detail), 0, 100)); ?><?php echo e(strlen(strip_tags( $product->product_detail))>100 ? '...' : ""); ?>" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?php echo e(url()->full()); ?>" />
  <meta property="og:image" content="<?php echo e(url('images/simple_products/'.$product->thumbnail)); ?>" />
  <meta name="twitter:card" content="summary" />
  <meta name="twitter:description" content="<?php echo e(substr(strip_tags($product->product_detail), 0, 100)); ?><?php echo e(strlen(strip_tags( $product->product_detail))>100 ? '...' : ""); ?>" />
  <meta name="twitter:site" content="<?php echo e(url()->full()); ?>" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Drift Zoom CSS -->
  <link rel="stylesheet" href="<?php echo e(url('css/vendor/drift-basic.min.css')); ?>">
  <!-- Lightbox CSS -->
  <link rel="stylesheet" href="<?php echo e(url('css/lightbox.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection("content"); ?>



<section id="home" class="home-main-block product-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb" class="breadcrumb-main-block">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>"><?php echo e(__('Home')); ?></a></li>
                  
                    </ol>
                </nav>
                <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('<?= URL::to('/'); ?>/frontend/assets/images/wishlist/breadcrum.png');">
                    <div class="breadcrumb-nav">
                        <h3 class="breadcrumb-title">
                        <?php if(!empty($product->childcat->title)): ?>
                          <?php echo e($product->childcat->title ?? ''); ?>

                        <?php else: ?>
                          <?php echo e($product->category->title ?? ''); ?>

                        <?php endif; ?>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home End -->

<!-- Product Start -->
<section id="product" class="product-main-block">
    <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <div class="product-des-img-block">
              <div class="slick-slider-block">
              <div class="slider slider-for">
                  <div id="single-product-gallery-item">
                      <?php if(isset($product->productGallery)): ?>
                          <a href="<?php echo e(url('images/simple_products/gallery/'.$product->productGallery[0]['image'])); ?>" data-title="<?php echo e($product->product_name); ?>">
                              <img src="<?php echo e(url('images/simple_products/gallery/'.$product->productGallery[0]['image'])); ?>" data-zoom="<?php echo e(url('images/simple_products/gallery/'.$product->productGallery[0]['image'])); ?>" class="img-fluid thumb_pro_img img img-fluid zoom-img " alt="">
                          </a>
                      <?php endif; ?>
                  </div>
                </div>
                <div class="slider slider-nav">
                      <?php if(isset($product->productGallery)): ?>
                          <?php if(count($product->productGallery) > 1): ?>
                              <?php $__currentLoopData = $product->productGallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div>
                                  <a href="javascript:">
                                    <img onclick="changeImage2('<?php echo e(url('images/simple_products/gallery/'.$gallery->image)); ?>')" alt='productimage' class="img-fluid" src="<?php echo e(url('images/simple_products/gallery/'.$gallery->image)); ?>">
                                  </a>
                                </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                      <?php endif; ?>
                </div>
              </div>
            </div>
            <div id="details-container"></div>
          </div>
          <div class="col-lg-3 ">
            <div class="deals-dtl-block">
              <div class="deals-avail-block">
                <span><?php echo e(__('Availability')); ?> :</span>
                <?php if($product->pre_order == 1 && $product->product_avbl_date > date('Y-m-d h:i:s')): ?>
                <div class="deal-avail-text text-warning"><?php echo e(__("Available for pre-order")); ?></div>
                <?php else: ?>
                <div class="deal-avail-text <?php echo e($product->stock == 0 ? "text-danger" : "text-success"); ?>"> <?php echo e($product->stock == 0 ? __("Out of Stock") : __("In Stock")); ?></div>
                <?php endif; ?>
              </div>
              
              <h3 class="deals-dtl-title"><?php echo e($product->product_name); ?> </h3>
              <?php if($product->selling_start_at <= date("Y-m-d H:i:s")): ?>
              <?php else: ?> 
                <h3 class="text-warning"><?php echo e(__('ComingSoon')); ?></h3>
              <?php endif; ?>
              <?php

                  $review_t = 0;
                  
                  $price_t = 0;

                  $value_t = 0;

                  $sub_total = 0;

                  $count = count($product->reviews);

                  $onlyrev = array();

                  foreach ($product->reviews->where('status','1') as $review) {
                      $review_t = $review->qty * 5;
                      $price_t = $review->price * 5;
                      $value_t = $review->value * 5;
                      $sub_total = $sub_total + $review_t + $price_t + $value_t;
                  }

                  $count = ($count * 3) * 5;

                  if ($count != "" && $count != 0) {
                    $rat = $sub_total / $count;

                    $ratings_var = ($rat * 100) / 5;

                    $overallrating = ($ratings_var / 2) / 10;
                  }

                  ?>

                <?php
                $count = 0;
                ?>
                <?php if(isset($overallrating)): ?>
                  <?php if(isset($ratings_var)): ?>
                    <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%;" class="star-ratings-sprite-rating"></span></div>
                  <?php endif; ?>
                  <span><?php echo e($count =  count($product->reviews)); ?> <?php echo e(__('Ratings and')); ?> <?php echo e($reviewcount); ?> <?php echo e(__('Reviews')); ?></span>
                <?php else: ?>
                  <span><?php echo e(__('No Rating')); ?></span>
                <?php endif; ?>
                
              <div class="deals-dtl-price">
                <?php if($product->pre_order == 1 && $product->product_avbl_date > date('Y-m-d h:i:s')): ?>
                  <ul>
                    <li class="deals-price">
                      <i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e($product->offer_price != 0 && $product->offer_price != '' ? price_format($product->offer_price) :  price_format($product->price)); ?>

                    </li>
                    <?php if($product->offer_price != 0): ?>
                    <li><s> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format($product->price )); ?><s></li>
                    <?php endif; ?>
                    <li class="deals-price-off">
                      <?php if($product->preorder_type == 'partial'): ?>
                        
                        <?php
                            echo '<p class="text-primary"> (Pay '.$product->partial_payment_per.'% of product price now and rest amount pay when product is available).</p>';
                            $price   = $product->offer_price != 0 ? $product->offer_price : $product->price;
                            $d_price = ($price * $product->partial_payment_per / 100);
                            $d_price = price_format($d_price);
                            $print_price = '<i class="'.session()->get('currency')['value'].'"></i>';
                            echo "<h4 class='text-info'>Pre order payable amount ";
                            echo '<span class="">'.$print_price.$d_price.'</span></h4>';
                            
                        ?>


                      <?php endif; ?>
                    </li>
                  </ul>
                  <?php else: ?>
                  <ul>
                    
                    <li class="deals-price">
                        <!--price-->
                        <i class="<?php echo e(session()->get('currency')['value']); ?>"></i>
                        <?php echo e($product->offer_price != 0 && $product->offer_price != '' ? price_format($product->offer_price) :  price_format($product->price )); ?>

                    </li>
                    <?php if($product->offer_price != 0): ?>
                    <li>
                      <s>
                        <i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(price_format($product->price )); ?>

                      </s>
                    </li>
                    <?php endif; ?>
                    <li class="deals-price-off">
                      <?php if($product->offer_price != 0): ?>
                        <?php
                          
                          $getdisprice = ($product->price) - ($product->offer_price);
                          $gotdis = $getdisprice/($product->price );
                          $offamount = round($gotdis*100);

                        ?>
                         &nbsp;<?php echo e($offamount); ?>% <?php echo e(__("off")); ?> 
                      <?php endif; ?>
                      &nbsp;<i data-toggle="tooltip" data-placement="left" title="<?php echo e($product->tax == '' ? __('Taxes Not Included') : __('Taxes Included')); ?>" data-feather="alert-circle"></i>
                    </li>
                  </ul>
              <?php endif; ?>
              </div>
              <?php if(isset($cashback_settings) && $cashback_settings->enable == 1): ?>
                  <div class="alert alert-success mb-30" role="alert">
                    <?php echo e(__("Buy now and earn cashback in your wallet")); ?> <?php echo e($cashback_settings->discount_type); ?>  <?php if($cashback_settings->cashback_type == 'fix'): ?> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i><b><?php echo e(sprintf("%.2f", $cashback_settings->discount * $conversion_rate)); ?></b> <?php else: ?> <b><?php echo e($cashback_settings->discount.'%'); ?></b> <?php endif; ?> 
                  </div>
              <?php endif; ?>
              <div class="deals-dtl-offers">


































                
                
                <div class="deals-btn">
                  <ul>                    
                    <li>
                    <?php if($product->stock != 0): ?>
                          <?php if($product->pre_order == 1 && $product->product_avbl_date > date('Y-m-d h:i:s')): ?>

                            <?php if($product->preorder_type == 'partial'): ?>
                              <?php 
                                $price   = $product->offer_price != 0 ? $product->offer_price : $product->price;
                                $d_price = ($price * $product->partial_payment_per / 100);
                              ?>
                            <?php endif; ?>

                            <form action="<?php echo e(route('add.cart.simple',['pro_id' => $product->id, 'price' => $product->price, 'offerprice' => $d_price ?? $product->offer_price])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div>
                              <div class="cart-quantity">
                                <div class="quant-input">
                                  <input type="hidden" value="1" name="qty" min="1" max="1" class="qty-section">
                                </div>
                              </div>
                              <div class="add-btn mb-30">
                                <?php if($product->type == 'ex_product'): ?>
                                  <a href="<?php echo e($product->external_product_link); ?>" role="button" class="btn btn-primary"> <?php echo e(__("Buy Now")); ?> <span class="sr-only">(current)</span>
                                  </a>
                                <?php else: ?> 
                                <button type="submit" class="btn btn-primary">
                                  <?php echo e(__("Pre-order now")); ?>

                                </button>
                                <?php endif; ?>
                              </div>
                            </div>
                            </form>

                          <?php else: ?>

                            <form action="<?php echo e(route('add.cart.simple.product',['pro_id' => $product->id, 'price' => $product->price, 'offerprice' => (isset($d_price)) ? $d_price : (($product->offer_price != 0 || $product->offer_price != '') ? $product->offer_price : 0)])); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div>
                              <div class="cart-quantity mb-30">
                                <div class="quant-input">
                                  <input type="hidden" value="1" name="qty" min="<?php echo e($product->min_order_qty); ?>" max="<?php echo e($product->max_order_qty != '' ? $product->max_order_qty : ''); ?>" maxorders="null" class="qty-section">
                                </div>
                              </div>
                              <div class="add-btn mb-30">
                                <?php if($product->type == 'ex_product'): ?>
                                  <a href="<?php echo e($product->external_product_link); ?>" role="button" class="btn btn-primary"> <?php echo e(__("Buy Now")); ?> <span class="sr-only">(current)</span>
                                  </a>
                                <?php else: ?> 
                                <button type="submit" class="btn btn-primary">
                                  <?php echo e(__("Buy Now")); ?>

                                </button>
                                <?php endif; ?>
                              </div>
                            </div>
                            </form>

                          <?php endif; ?>
                      <?php else: ?>
                        <?php if($product->stock == 0): ?>
                              <button type="button" data-target="#notifyMe" data-toggle="modal" class="btn btn-primary"><?php echo e(__("NOTIFY ME")); ?></button>
                        <?php endif; ?>
                      <?php endif; ?>
                    </li>
                    <li class="deals-icon bg-dark ">
                      <form method="POST"
                            action="<?php echo e($product->type == 'ex_product' ? $product->external_product_link : route('add.cart.simple',['pro_id' => $product->id, 'price' => $product->price, 'offerprice' => $product->offer_price])); ?>"
                            class="addSimpleCardFrom<?php echo e($product->id); ?>">
                        <?php echo csrf_field(); ?>

                        <input name="qty" type="hidden"
                               value="<?php echo e($product->min_order_qty); ?>"
                               max="<?php echo e($product->max_order_qty); ?>"
                               class="qty-section">

                        <a href="javascript:" class="text-light"
                           onclick="addSimpleProCard(<?php echo e($product->id); ?>)"
                           data-bs-toggle="tooltip" data-bs-placement="left"
                           data-bs-title="<?php echo e(__('Add To Cart')); ?>"><i
                                  data-feather="shopping-cart"></i> Add To Cart</a>

                      </form>
                    </li>


                  </ul>
                  <div class="row mt-0">
                    <div class="col-md-12">

                        <ul>

                          <li class="deals-icon">



                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#pdfmodal">
                              Show
                            </button>
                          </li>
                          <li class="deals-icon"><a class="add_in_wish_simple" data-proid="<?php echo e($product->id); ?>" data-status="<?php echo e(inwishlist($product->id)); ?>" data-toggle="tooltip" data-placement="right" title="<?php echo e(inwishlist($product->id) == false ? __("Add To WishList") :  __("Remove From Wishlist")); ?>" href="javascript:void(0)"><i data-feather="heart"></i></a></li>
                          <li class="deals-icon"><a href="javascript:" data-toggle="modal" data-placement="right" title="Share" data-target="#sharemodal"><i data-feather="share-2"></i></a></li>

                        </ul>

                        

                        

                        

                        
                        
                        
                        
                        

                        

                        
                        
                        
                        
                        
                        
                        
                        
                        <!-- Share Modal -->
                        <div class="modal fade" id="sharemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">

                              <div class="share-content modal-body">
                                <?php
                                  echo Share::Page(url()->full(),null,[],'<div class="row fs-2">', '</div>')
                                  ->facebook()
                                  ->twitter()
                                  ->telegram()
                                  ->whatsapp();
                                ?>
                              </div>

                            </div>
                          </div>
                        </div>
                        <!-- End Modal -->


                      <!-- pdf Modal -->
                      <div class="modal fade" id="pdfmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><?php echo e($product->product_name); ?></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="share-content modal-body">
                              <?php if(($product->product_file != null)): ?>
                                <embed src="<?php echo e(asset('digitalproducts/files/'.$product->product_file)); ?>" width="100%" height="2100px" />
                              <?php else: ?>
                                <h4>File Not Uploded here!!!</h4>
                              <?php endif; ?>



                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- End Modal -->

                    </div>
                  </div>
                </div>
                
                <?php if($pincodesystem == 1): ?>
                  <div class="deals-delivery-code">
                    <h6 class="delivery-title"><?php echo e(__('Delivery Details')); ?></h6>
                    <form id="myForm" method="post">
                      <?php echo e(csrf_field()); ?>

                      <div class="form-group">

                        <div class="input-group mb-3">
                          <input placeholder="<?php echo e(__('Enter Pincode')); ?>" required class="pincode-input form-control"
                            onchange="SubmitFormData()" type="text" id="deliveryPinCode" value="">
                          <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">
                              <i id="marker-map" class="fa fa-map-marker"></i>
                            </span>
                          </div>
                        </div>

                        <span id="pincodeResponce"></span>
                      </div>
                    </form>
                  </div>
                <?php endif; ?>
                <div>
                  <p></p>
                  <div class="description-heading"><?php echo e(__('Other Services')); ?></div>
                  <div class="price-container info-container">
                    <div class="delivery-detail text-center">
                      <div class="row">
                        <?php if($product->cod_avbl == 1): ?>
                        <div class="col-lg-3 col-4">
                          <div class="image">
                            <img src="<?php echo e(url('/images/icon-cod.png')); ?>" class="img-fluid" alt="img">
                          </div>
                          <div class="detail text-center"><?php echo e(__('Pay on Delivery')); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($product->return_avbl == 1): ?>
                        <div class="col-lg-3 col-4">
                          <div data-toggle="modal" data-target="#returnmodal" class="image">
                            <img src="<?php echo e(url('/images/icon-returns.png')); ?>" class="img-fluid" alt="img">
                          </div>
                          <div class="detail"><?php echo e($product->returnPolicy?$product->returnPolicy->days:''); ?> <?php echo e(__('Days Return')); ?> </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="returnmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                                <h5 class="modal-title" id="myModalLabel"><?php echo e($product->returnPolicy?$product->returnPolicy->name:''); ?></h5>
                              </div>
                              <div class="modal-body">
                                <?php echo $product->returnPolicy?$product->returnPolicy->des:''; ?>

                              </div>

                            </div>
                          </div>
                        </div>
                        <?php else: ?>
                        <div class="col-lg-3 col-4">
                          <div data-toggle="modal" data-target="#returnmodal" class="image">
                            <img src="<?php echo e(url('/images/icon-returns.png')); ?>" class="img-fluid" alt="img">
                          </div>
                          <div class="detail"><?php echo e(__('No Return')); ?></div>
                        </div>
                        <?php endif; ?>
                        <?php if($product->free_shipping == 1): ?> 
                        <div class="col-lg-4 col-4">
                          <div class="image">
                            <img src="<?php echo e(url('/images/icon-delivered.png')); ?>" class="img-fluid" alt="img">
                          </div>
                          <div class="detail"><?php echo e(config('app.name')); ?> <?php echo e(__('Free Delivery')); ?></div>
                        </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="deals-highlight">
                    <h6 class="delivery-title"><?php echo e(__('Highlight')); ?></h6>
                      <ul>
                        <li><?php echo $product->key_features; ?></li>
                      </ul>
                  </div>
                  <?php if(isset($product->key_features)): ?>
                    <div class="report-text">
                      <a href="#reportproduct" data-toggle="modal">
                        <i data-feather="flag"></i><?php echo e(__('Report Product')); ?>.
                      </a>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">

              <div class="row">
                <div class="col-md-12">
                  <div class="card bg-primary mb-2">
                    <div class="card-body">
                      <h4 class="text-light">Related product</h4>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <?php if($latest_products): ?>
                  <?php $__currentLoopData = $latest_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $featured_pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <div class="col-lg-4 col-md-4 col-6">
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

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>

                <?php endif; ?>
              </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Product End -->
    <!-- Product Description Start -->

    <section id="customer-support" class="customer-support-main-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="customer-support-block">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-3">
                  <div class="support-img">
                    <img src="<?php echo e(url('frontend/assets/images/support/shipping icon.png')); ?>" class="img-fluid" alt="">
                  </div>
                </div>
                <div class="col-lg-9 col-md-8 col-9">
                  <h5 class="support-title"><?php echo e(__('Fast Delivery')); ?></h5>
                  <p title="<?php echo e(__('With our partnered courier services your product will be delivered fast')); ?>"><?php echo e(__('With our partnered courier services..')); ?></p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="customer-support-block">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-3">
                  <div class="support-img">
                    <img src="<?php echo e(url('frontend/assets/images/support/quality.png')); ?>" class="img-fluid" alt="">
                  </div>
                </div>
                <div class="col-lg-9 col-md-8 col-9">
                  <h5 class="support-title"><?php echo e(__('Quality Assurance')); ?></h5>
                  <p><?php echo e(__('With')); ?> <?php echo e(config('app.name')); ?> <?php echo e(__('Quality')); ?>.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="customer-support-block">
              <div class="row">
                <div class="col-lg-3 col-md-4 col-3">
                  <div class="support-img">
                    <img src="<?php echo e(url('frontend/assets/images/support/protection.png')); ?>" class="img-fluid" alt="">
                  </div>
                </div>
                <div class="col-lg-9 col-md-8 col-9">
                  <h5 class="support-title"><?php echo e(__('Purchase Protection')); ?></h5>
                  <p><?php echo e(__('Payement Gateway')); ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Product Description Start -->

    <!-- Product Description Start -->
    <section id="product-description" class="product-description-main-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 col-12">
            <div class="des-feature-review-block">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <a class="nav-link active" id="pills-description-tab" data-bs-toggle="pill" href="#pills-description" type="button" role="tab" aria-controls="pills-description" aria-selected="true"><?php echo e(__('Description')); ?></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-features-tab" data-bs-toggle="pill" href="#pills-features" type="button" role="tab" aria-controls="pills-features" aria-selected="false"><?php echo e(__('Product Specifications')); ?></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill" href="#pills-reviews" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false"><?php echo e(__('Reviews and Rating')); ?></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="pills-comments-tab" data-bs-toggle="pill" href="#pills-comments" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false"><?php echo e(count($product->comments)); ?> <?php echo e(__('Comments')); ?></a>
                </li>
                <li class="nav-item" role="presentation">
                  <a class="nav-link" id="v-pro-faqs-tab" data-bs-toggle="pill" href="#v-pro-faqs" type="button" role="tab" aria-controls="pills-reviews" aria-selected="false"><?php echo e(__('FAQs')); ?></a>
                </li>
                <?php if($product->frames()->count()): ?>
                <li class="nav-item" role="presentation">
                  <a class="nav-link"  id="v-tab-pro-360" data-toggle="pill" href="#v-tab-pro-360-tour" role="tab" aria-controls="v-tab-pro-360-tour" aria-selected="false"><?php echo e(__('Product 360째 Tour')); ?></a>
                </li>
                <?php endif; ?>
               
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab" tabindex="0">
                  <div class="description-block">
                    <?php if($product->product_detail != ''): ?>
                  
                    <?php echo $product->product_detail; ?>

                  
                    <?php else: ?>
                    <h4><?php echo e(__('No Description')); ?></h4>
                    <?php endif; ?>
                    
                    <hr>
                    <p>
                      <b><?php echo e(__('Tags')); ?>:</b>
                      <?php
                      $x = explode(',', $product->product_tags);
                      ?>
                      <?php $__currentLoopData = $x; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <span class=""><i data-feather="tag"></i> <?php echo e($tag); ?></span>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-features" role="tabpanel" aria-labelledby="pills-features-tab" tabindex="0">
                  <div class="features-block-fullscreen">
                    <div class="row">
                      
                      <div class="col">
                        <div class="feature-block">
                          <div class="feature-dtl">
                            
                            <?php if(count($product->specs)>0): ?>

                            <table class="table">
                              <tbody>
                                <?php $__currentLoopData = $product->specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                  <th scope="row" class="bg-light bg-gradient"><?php echo e($spec->prokeys); ?></th>
                                  <td><?php echo e($spec->provalues); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                            </table>
                            <?php else: ?>
                              <h4>
                                <?php echo e(__('No Specifications')); ?>

                              </h4>
                            <?php endif; ?>

                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                <?php if($product->frames()->count()): ?>
                  <div class="tab-pane fade" id="v-tab-pro-360-tour" role="tabpanel" aria-labelledby="v-tab-pro-360-tour" tabindex="0">
                      <h5>
                        <?php echo e(__("Move your mouse left or right to rotate the image")); ?>

                      </h5>

                      <div style="margin-left: -80px" id="produdct360tour">

                      </div>
                  </div>
                <?php endif; ?>
            
                <?php if($product->type != 'ex_product'): ?>
                  <div class="tab-pane fade" id="pills-reviews" role="tabpanel" aria-labelledby="pills-reviews-tab" tabindex="0">

                    <?php if(auth()->guard()->check()): ?>

                    <?php
                      $purchased = App\Order::whereJsonContains('simple_pro_ids',$product->id)->where('user_id',Auth::user()->id)->first();

                      $findproinorder = 0;
                      $alreadyrated = $product->reviews->where('user',Auth::user()->id)->first();
                    ?>

                   

                    <?php if($purchased): ?>
                    <?php if(isset($alreadyrated)): ?>


                    <h5>
                      <?php echo e(__('Your Review')); ?>

                    </h5>
                    <hr>
                    <div class="customer-reviews-block">
                      <div class="row">
                        <div class="col-lg-2 col-md-2 col-3">
                          <div class="customer-reviews-img">
                            <?php if($alreadyrated->users->image !=''): ?>
                            <img src="<?php echo e(url('/images/user/'.$alreadyrated->users->image)); ?>" alt=""
                              class="img-fluid rounded-circle">
                            <?php else: ?>
                            <img class="img-fluid rounded-circle"
                              src="<?php echo e(Avatar::create($alreadyrated->users->name)->toBase64()); ?>">
                            <?php endif; ?>
                          </div>
                        </div>

                        <div class="col-lg-10 col-md-10 col-9">
                          <div class="customer-review-dtl">
                            <div class="row mb-3">
                              <div class="col-lg-6 col-md-6 col-6">
                                <h5 class="customer-title"><?php echo e($alreadyrated->users->name); ?></h5>
                                <?php
      
                                  $user_count = count([$alreadyrated]);
                                  $user_sub_total = 0;
                                  $user_review_t = $alreadyrated->price * 5;
                                  $user_price_t = $alreadyrated->price * 5;
                                  $user_value_t = $alreadyrated->value * 5;
                                  $user_sub_total = $user_sub_total + $user_review_t + $user_price_t + $user_value_t;

                                  $user_count = ($user_count * 3) * 5;
                                  $rat1 = $user_sub_total / $user_count;
                                  $ratings_var1 = ($rat1 * 100) / 5;

                                ?>
                                <div class="pull-left">
                                  <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var1; ?>%"
                                      class="star-ratings-sprite-rating"></span>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-6 col-md-6 col-6">
                                <small class="pull-right rating-date">On
                                  <?php echo e(date('jS M Y',strtotime($alreadyrated->created_at))); ?>

                                  <?php if($alreadyrated->status == 1): ?>
                                  <span class="badge badge-success font-weight-bold"><i class="fa fa-check"
                                      aria-hidden="true"></i> <?php echo e(__('Approved')); ?></span>
                                  <?php else: ?>
                                  <span class="badge badge-success font-weight-bold"><i class="fa fa-info-circle"
                                      aria-hidden="true"></i> <?php echo e(__('Pending')); ?></span>
                                  <?php endif; ?>
                                </small>
                              </div>
                            </div>
                            <p><span class="font-weight500"><?php echo e($alreadyrated->review); ?></span></p>
                          </div>
                        </div>
                      </div>
                    </div>

                    <hr>
                    <!-- <a title="<?php echo e(__("View all reviews")); ?>" class="font-weight-bold pull-right" href="<?php echo e(route('allreviews',['id' => $product->id, 'type' => 's'])); ?>"><?php echo e(__('View All Reviews')); ?></a> -->
                    <h5 class="title"><?php echo e(__('Recent Reviews')); ?></h5>

                    <hr>

                    <div class="row">

                      <div class="col-lg-4 col-md-3">
                        <div class="overall-rating-main-block">
                          <div class="overall-rating-block text-center">
                            <?php
                            if(!isset($overallrating)){
                            $overallrating = 0;
                            }
                            ?>
                            <h1><?php echo e(round($overallrating,1)); ?></h1>
                            <div class="overall-rating-title"><?php echo e(__('Overall Rating')); ?></div>
                            <div class="rating">
                              <?php
                              $review_t = 0;
                              $price_t = 0;
                              $value_t = 0;
                              $sub_total = 0;
                              $sub_total = 0;
                              $reviews2 = App\UserReview::where('simple_pro_id', $product->id)->where('status',
                              '1')->get();
                              ?> 
                              <?php if(!empty($reviews2[0])): ?>
                              
                              <?php

                                $count = App\UserReview::where('status', '1')->where('simple_pro_id',
                                $product->id)->count();

                                foreach ($reviews2 as $review) {
                                  $review_t = $review->price * 5;
                                  $price_t = $review->price * 5;
                                  $value_t = $review->value * 5;
                                  $sub_total = $sub_total + $review_t + $price_t + $value_t;
                                }

                                $count = ($count * 3) * 5;
                                $rat = $sub_total / $count;
                                $ratings_var2 = ($rat * 100) / 5;

                              ?>


                              <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%"
                                  class="star-ratings-sprite-rating"></span></div>


                              <?php else: ?>
                              <div class="text-center">
                                <?php echo e(__('No Rating')); ?>

                              </div>
                              <?php endif; ?>
                            </div>
                            <div class="total-review"><?php echo e($count =  count($product->reviews->where('status','1'))); ?>

                              <?php echo e(__('Ratings &')); ?>

                              <?php echo e($reviewcount); ?> <?php echo e(__('reviews')); ?></div>
                          </div>
                          <div class="overall-rating-block">
                            <div class="stat-levels">
                              <label><?php echo e(__('Quality')); ?></label>
                              <div class="stat-1 stat-bar">
                                <span class="stat-bar-rating" role="stat-bar"
                                  style="width: <?php echo e($qualityprogress); ?>%;"><?php echo e($qualityprogress); ?>%</span>
                              </div>
                              <label><?php echo e(__('Price')); ?></label>
                              <div class="stat-2 stat-bar">
                                <span class="stat-bar-rating stat-bar-rating-one" role="stat-bar"
                                  style="width: <?php echo e($priceprogress); ?>%;"><?php echo e($priceprogress); ?>%</span>
                              </div>
                              <label><?php echo e(__('Value')); ?></label>
                              <div class="stat-3 stat-bar">
                                <span class="stat-bar-rating stat-bar-rating-two" role="stat-bar"
                                  style="width: <?php echo e($valueprogress); ?>%;"><?php echo e($valueprogress); ?>%</span>
                              </div>
                            </div>
                          </div>
                          <?php if($overallrating>3.9): ?>
                          <div class="overall-rating-block satisfied-customer-block text-center">
                            <h3>100%</h3>
                            <div class="overall-rating-title"><?php echo e(__('Satisfied Customer')); ?></div>
                            <p><?php echo e(__('All Customers give this product 4 and 5 Star Rating')); ?>.</p>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-lg-8 col-md-9">
                        <!-- All reviews will show here-->
                        <?php $__currentLoopData = $product->reviews->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($review->status == "1"): ?>
                        <div class="customer-reviews-block">  
                          <div class="row">
                            <div class="col-lg-3 col-md-2 col-3">
                              <div class="customer-reviews-img">
                                <?php if($review->users->image !=''): ?>
                                <img src="<?php echo e(url('/images/user/'.$review->users->image)); ?>" alt=""
                                  class=" rounded-circle img-fluid">
                                <?php else: ?>
                                <img class="rounded-circle img-fluid"
                                  src="<?php echo e(Avatar::create($review->users->name)->toBase64()); ?>">
                                <?php endif; ?>
                              </div>
                            </div>
                            <div class="col-lg-9 col-md-10 col-9">
                              <div class="customer-review-dtl">
                                <div class="row mb-3">
                                  <div class="col-lg-6 col-md-6 col-6">
                                    <h5 class="customer-title"><?php echo e($review->users->name); ?></h5>
                                    <?php
                                      $user_count = count([$review]);
                                      $user_sub_total = 0;
                                      $user_review_t = $review->price * 5;
                                      $user_price_t = $review->price * 5;
                                      $user_value_t = $review->value * 5;
                                      $user_sub_total = $user_sub_total + $user_review_t + $user_price_t + $user_value_t;

                                      $user_count = ($user_count * 3) * 5;
                                      $rat1 = $user_sub_total / $user_count;
                                      $ratings_var1 = ($rat1 * 100) / 5;

                                    ?>
                                    <div class="pull-left">
                                      <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var1; ?>%"
                                          class="star-ratings-sprite-rating"></span>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-6">
                                    <small class="pull-right rating-date"><?php echo e(__('On')); ?>

                                    <?php echo e(date('jS M Y',strtotime($review->created_at))); ?></small>
                                  </div>
                                </div>
                                <p><span class="font-weight500"><?php echo e($review->review); ?></span></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!--end-->
                      </div>
                    </div>


                    <?php else: ?>
                    <h5><?php echo e(__('Be the first one to rate this product')); ?></h5>
                    <hr>
                    <?php
                    if(!isset($overallrating)){
                    $overallrating = 0;
                    }
                    ?>
                    <div class="row">
                      <div class="col-lg-4 col-md-3 col-sm-3">
                        <div class="overall-rating-main-block">
                          <div class="overall-rating-block text-center">
                            <h1><?php echo e(round($overallrating,1)); ?></h1>
                            <div class="overall-rating-title"><?php echo e(__('Overall Rating')); ?></div>
                            <div class="rating">
                              <?php
                              $review_t = 0;
                              $price_t = 0;
                              $value_t = 0;
                              $sub_total = 0;
                              $sub_total = 0;
                              $reviews2 = App\UserReview::where('simple_pro_id', $product->id)->where('status',
                              '1')->get();
                              ?> <?php if(!empty($reviews2[0])): ?>
                              <?php
                              $count = App\UserReview::where('status', '1')->where('simple_pro_id',
                              $product->id)->count();
                              foreach ($reviews2 as $review) {
                              $review_t = $review->price * 5;
                              $price_t = $review->price * 5;
                              $value_t = $review->value * 5;
                              $sub_total = $sub_total + $review_t + $price_t + $value_t;
                              }
                              $count = ($count * 3) * 5;
                              $rat = $sub_total / $count;
                              $ratings_var2 = ($rat * 100) / 5;
                              ?>


                              <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%"
                                  class="star-ratings-sprite-rating"></span></div>


                              <?php else: ?>
                              <div class="text-center">
                                <?php echo e(__('No Rating')); ?>

                              </div>
                              <?php endif; ?>
                            </div>
                            <div class="total-review"><?php echo e($count =  count($product->reviews)); ?> Ratings & <?php echo e($reviewcount); ?>

                              reviews</div>
                          </div>
                          <div class="overall-rating-block">
                            <div class="stat-levels">
                              <label><?php echo e(__('Quality')); ?></label>
                              <div class="stat-1 stat-bar">
                                <span class="stat-bar-rating" role="stat-bar"
                                  style="width: <?php echo e($qualityprogress); ?>%;"><?php echo e($qualityprogress); ?>%</span>
                              </div>
                              <label><?php echo e(__('Price')); ?></label>
                              <div class="stat-2 stat-bar">
                                <span class="stat-bar-rating stat-bar-rating-one" role="stat-bar"
                                  style="width: <?php echo e($priceprogress); ?>%;"><?php echo e($priceprogress); ?>%</span>
                              </div>
                              <label><?php echo e(__('Value')); ?></label>
                              <div class="stat-3 stat-bar">
                                <span class="stat-bar-rating stat-bar-rating-two" role="stat-bar"
                                  style="width: <?php echo e($valueprogress); ?>%;"><?php echo e($valueprogress); ?>%</span>
                              </div>
                            </div>
                          </div>
                          <?php if($overallrating>3.9): ?>
                          <div class="overall-rating-block satisfied-customer-block text-center">
                            <h3>100%</h3>
                            <div class="overall-rating-title"><?php echo e(__('Satisfied Customer')); ?></div>
                            <p><?php echo e(__('All Customers give this product 4 and 5 Star Rating')); ?>.</p>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-lg-8 col-md-9 product-add-review">
                        <div class="review-table">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th class="cell-label">&nbsp;</th>
                                  <th>1 star</th>
                                  <th>2 stars</th>
                                  <th>3 stars</th>
                                  <th>4 stars</th>
                                  <th>5 stars</th>
                                </tr>
                              </thead>
                              <form class="cnt-form" method="post"
                                action="<?php echo e(route("simpleproduct.rating",$product->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="simple_product" value="simple_product">
                                <div class="required"><?php echo e($errors->first('quality')); ?></div>
                                <div class="required"><?php echo e($errors->first('Price')); ?></div>
                                <div class="required"><?php echo e($errors->first('Value')); ?></div>
                                <tbody>
                                  <tr>
                                    <td class="cell-label"><?php echo e(__('Quality')); ?> <span class="required">*</span>
                                    </td>
                                    <td><input type="radio" name="quality" class="radio" value="1"></td>
                                    <td><input type="radio" name="quality" class="radio" value="2"></td>
                                    <td><input type="radio" name="quality" class="radio" value="3"></td>
                                    <td><input type="radio" name="quality" class="radio" value="4"></td>
                                    <td><input type="radio" name="quality" class="radio" value="5"></td>
                                  </tr>
                                  <tr>
                                    <td class="cell-label"><?php echo e(__('Price')); ?> <span class="required">*</span>
                                    </td>
                                    <td><input type="radio" name="Price" class="radio" value="1"></td>
                                    <td><input type="radio" name="Price" class="radio" value="2"></td>
                                    <td><input type="radio" name="Price" class="radio" value="3"></td>
                                    <td><input type="radio" name="Price" class="radio" value="4"></td>
                                    <td><input type="radio" name="Price" class="radio" value="5"></td>
                                  </tr>
                                  <tr>
                                    <td class="cell-label"><?php echo e(__('Value')); ?> <span class="required">*</span>
                                    </td>
                                    <td><input type="radio" name="Value" class="radio" value="1"></td>
                                    <td><input type="radio" name="Value" class="radio" value="2"></td>
                                    <td><input type="radio" name="Value" class="radio" value="3"></td>
                                    <td><input type="radio" name="Value" class="radio" value="4"></td>
                                    <td><input type="radio" name="Value" class="radio" value="5"></td>
                                  </tr>
                                </tbody>
                            </table>
                            <!-- /.table .table-bordered -->
                          </div>
                          <!-- /.table-responsive -->
                        </div>
                        <!-- /.review-table -->
                        <div class="review-form">
                          <div class="form-container">
                            <div class="row">
                              <div class="col-sm-6">
                                <div class="form-group">
                                  <input type="hidden" class="form-control txt" id="exampleInputName" name="name" value="
                                  <?php if(Auth::check()): ?> <?php echo e(auth()->user()->id); ?> <?php endif; ?>" placeholder="">
                                  <div class="text-red"><?php echo e($errors->first('name')); ?></div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label class="margin-left15"
                                    for="exampleInputReview"><?php echo e(__('Review')); ?>:</label>
                                  <textarea class="form-control text-rev" name="review" id="exampleInputReview" rows="5"
                                    cols="50" placeholder=""></textarea>
                                </div>
                              </div>
                            </div><!-- /.row -->
                            <div class="action text-right">
                              <button class="btn btn-primary btn-upper"><?php echo e(__('SUBMIT REVIEW')); ?></button>
                            </div><!-- /.action -->
                            </form><!-- /.cnt-form -->
                          </div><!-- /.form-container -->
                        </div><!-- /.review-form -->
                      </div>
                    </div>
                    <!-- /.product-add-review -->
                    <h5><?php echo e(__('Recent Reviews')); ?></h5>

                    <hr>

                    <?php if($product->reviews()->where('status','1')->count()): ?>
                    <?php $__currentLoopData = $product->reviews->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <?php if($review->status == "1"): ?>
                    <div class="row">

                      <div class="col-md-1">
                        <?php if($review->users->image !=''): ?>
                        <img src="<?php echo e(url('/images/user/'.$review->users->image)); ?>" alt="" width="70px" height="70px"
                          class="rounded-circle">
                        <?php else: ?>
                        <img width="70px" height="70px" src="<?php echo e(Avatar::create($review->users->name)->toBase64()); ?>"
                          class="rounded-circle">
                        <?php endif; ?>
                      </div>

                      <div class="col-md-10">
                        <p>
                          <b><i><?php echo e($review->users->name); ?></i></b>
                          <?php
      
                                            $user_count = count([$review]);
                                            $user_sub_total = 0;
                                            $user_review_t = $review->price * 5;
                                            $user_price_t = $review->price * 5;
                                            $user_value_t = $review->value * 5;
                                            $user_sub_total = $user_sub_total + $user_review_t + $user_price_t + $user_value_t;
      
                                            $user_count = ($user_count * 3) * 5;
                                            $rat1 = $user_sub_total / $user_count;
                                            $ratings_var1 = ($rat1 * 100) / 5;
      
                                            ?>
                          <div class="pull-left">
                            <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var1; ?>%"
                                class="star-ratings-sprite-rating"></span>
                            </div>
                          </div>

                          <small class="pull-right rating-date"><?php echo e(__('On')); ?>

                            <?php echo e(date('jS M Y',strtotime($review->created_at))); ?></small>
                          <br>
                          <span class="font-weight500"><?php echo e($review->review); ?></span>
                        </p>
                      </div>

                    </div>
                    <hr>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <h5><i class="fa fa-star"></i> <?php echo e(__('Be the first one to rate this product')); ?></h5>
                    <?php endif; ?>

                    <?php endif; ?>
                    <?php else: ?>
                    <h5><?php echo e(__('Please Purchase This Product to rate it')); ?></h5>
                    <hr>
                    <h5><?php echo e(__('Recent Reviews')); ?></h5>
                    <hr>
                    <?php if(count($product->reviews)>0): ?>

                    <?php if(!isset($overallrating)): ?>
                    <?php
                    $overallrating = 0;
                    ?>
                    <?php endif; ?>
                    <div class="row">

                      <div class="col-lg-4 col-md-3 col-sm-3">
                        <div class="overall-rating-main-block">
                          <div class="overall-rating-block text-center">
                            <h1><?php echo e(round($overallrating,1)); ?></h1>
                            <div class="overall-rating-title"><?php echo e(__('OverallRating')); ?></div>
                            <div class="rating">
                              <?php
                              $review_t = 0;
                              $price_t = 0;
                              $value_t = 0;
                              $sub_total = 0;
                              $sub_total = 0;
                              $reviews2 = App\UserReview::where('status', '1')->where('simple_pro_id',
                              $product->id)->where('status', '1')->get();
                              ?> <?php if(!empty($reviews2[0])): ?>
                              <?php
                              $count = App\UserReview::where('status', '1')->where('simple_pro_id',
                              $product->id)->count();
                              foreach ($reviews2 as $review) {
                              $review_t = $review->price * 5;
                              $price_t = $review->price * 5;
                              $value_t = $review->value * 5;
                              $sub_total = $sub_total + $review_t + $price_t + $value_t;
                              }
                              $count = ($count * 3) * 5;
                              $rat = $sub_total / $count;
                              $ratings_var2 = ($rat * 100) / 5;
                              ?>


                              <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%"
                                  class="star-ratings-sprite-rating"></span></div>


                              <?php else: ?>
                              <div class="text-center">
                                <?php echo e(__('No Rating')); ?>

                              </div>
                              <?php endif; ?>
                            </div>
                            <div class="total-review"><?php echo e($count =  count($product->reviews)); ?> Ratings & <?php echo e($reviewcount); ?>

                              <?php echo e(__('reviews')); ?></div>
                          </div>
                          <div class="overall-rating-block">
                            <div class="stat-levels">
                              <label><?php echo e(__('Quality')); ?></label>
                              <div class="stat-1 stat-bar">
                                <span class="stat-bar-rating" role="stat-bar"
                                  style="width: <?php echo e($qualityprogress); ?>%;"><?php echo e($qualityprogress); ?>%</span>
                              </div>
                              <label><?php echo e(__('Price')); ?></label>
                              <div class="stat-2 stat-bar">
                                <span class="stat-bar-rating stat-bar-rating-one" role="stat-bar"
                                  style="width: <?php echo e($priceprogress); ?>%;"><?php echo e($priceprogress); ?>%</span>
                              </div>
                              <label><?php echo e(__('Value')); ?></label>
                              <div class="stat-3 stat-bar">
                                <span class="stat-bar-rating stat-bar-rating-two" role="stat-bar"
                                  style="width: <?php echo e($valueprogress); ?>%;"><?php echo e($valueprogress); ?>%</span>
                              </div>
                            </div>
                          </div>
                          <?php if($overallrating>3.9): ?>
                          <div class="overall-rating-block satisfied-customer-block text-center">
                            <h3>100%</h3>
                            <div class="overall-rating-title"><?php echo e(__('Satisfied Customer')); ?></div>
                            <p><?php echo e(__('All Customers give this product 4 and 5 Star Rating')); ?></p>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-lg-8 col-md-9">
                        <?php $__currentLoopData = $product->reviews->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <?php if($review->status == "1"): ?>
                          <div class="customer-reviews-block">
                            <div class="row">
                              <div class="col-lg-2 col-md-2 col-3">
                                <div class="customer-reviews-img">
                                  <?php if($review->users->image !=''): ?>
                                  <img src="<?php echo e(url('/images/user/'.$review->users->image)); ?>" alt=""
                                    class=" rounded-circle img-fluid">
                                  <?php else: ?>
                                  <img class="rounded-circle img-fluid"
                                    src="<?php echo e(Avatar::create($review->users->name)->toBase64()); ?>">
                                  <?php endif; ?>
                                </div>
                              </div>
                              <div class="col-lg-10 col-md-10 col-9">
                                <div class="customer-review-dtl">
                                  <div class="row mb-3">
                                    <div class="col-lg-6 col-md-6 col-6">
                                      <h5 class="customer-title"><?php echo e($review->users->name); ?></h5>
                                      <?php
                                        $user_count = count([$review]);
                                        $user_sub_total = 0;
                                        $user_review_t = $review->price * 5;
                                        $user_price_t = $review->price * 5;
                                        $user_value_t = $review->value * 5;
                                        $user_sub_total = $user_sub_total + $user_review_t + $user_price_t + $user_value_t;
      
                                        $user_count = ($user_count * 3) * 5;
                                        $rat1 = $user_sub_total / $user_count;
                                        $ratings_var1 = ($rat1 * 100) / 5;
                                      ?>
                                      <div class="pull-left">
                                        <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var1; ?>%"
                                            class="star-ratings-sprite-rating"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                      <small class="pull-right rating-date"><?php echo e(__('On')); ?>

                                        <?php echo e(date('jS M Y',strtotime($review->created_at))); ?></small>
                                    </div>
                                  </div>
                                  <p><span class="font-weight500"><?php echo e($review->review); ?></span></p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                    <?php else: ?>
                    <h5><i class="fa fa-star"></i> <?php echo e(__('Be the first one to rate this product')); ?></h5>
                    <?php endif; ?>
                    <?php endif; ?>

                    <?php else: ?>
                    <h5><?php echo e(__('Please')); ?> <a href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                      <?php echo e(__('Be the first one to rate this product')); ?></h5>

                    <?php if(count($product->reviews)>0): ?>
                    <hr>
                    <h5><?php echo e(__('Recent Reviews')); ?></h5>

                    <hr>
                    <div class="row">

                      <div class="col-lg-4 col-md-3 col-sm-3">
                        <div class="overall-rating-main-block">
                          <div class="overall-rating-block text-center">
                            <h1><?php echo e(round($overallrating,1)); ?></h1>
                            <div class="overall-rating-title"><?php echo e(__('Overall Rating')); ?></div>
                            <div class="rating">
                              <?php
                              $review_t = 0;
                              $price_t = 0;
                              $value_t = 0;
                              $sub_total = 0;
                              $sub_total = 0;
                              $reviews2 = App\UserReview::where('simple_pro_id', $product->id)->where('status',
                              '1')->get();
                              ?> <?php if(!empty($reviews2[0])): ?>
                              <?php
                              $count = App\UserReview::where('status', '1')->where('simple_pro_id',
                              $product->id)->count();
                              foreach ($reviews2 as $review) {
                              $review_t = $review->price * 5;
                              $price_t = $review->price * 5;
                              $value_t = $review->value * 5;
                              $sub_total = $sub_total + $review_t + $price_t + $value_t;
                              }
                              $count = ($count * 3) * 5;
                              $rat = $sub_total / $count;
                              $ratings_var2 = ($rat * 100) / 5;
                              ?>


                              <div class="star-ratings-sprite">
                                <span style="width:<?php echo $ratings_var; ?>%"
                                  class="star-ratings-sprite-rating"></span>
                              </div>


                              <?php else: ?>
                              <div class="text-center">
                                <?php echo e(__('No Rating')); ?>

                              </div>
                              <?php endif; ?>
                            </div>
                            <div class="total-review"><?php echo e($count =  count($product->reviews)); ?> Ratings & <?php echo e($reviewcount); ?>

                              reviews</div>
                          </div>
                          <div class="overall-rating-block">
                            <div class="stat-levels">
                              <label><?php echo e(__('Quality')); ?></label>
                              <div class="stat-1 stat-bar">
                                <span class="stat-bar-rating" role="stat-bar"
                                  style="width: <?php echo e($qualityprogress); ?>%;"><?php echo e($qualityprogress); ?>%</span>
                              </div>
                              <label><?php echo e(__('Price')); ?></label>
                              <div class="stat-2 stat-bar">
                                <span class="stat-bar-rating stat-bar-rating-one" role="stat-bar"
                                  style="width: <?php echo e($priceprogress); ?>%;"><?php echo e($priceprogress); ?>%</span>
                              </div>
                              <label><?php echo e(__('Value')); ?></label>
                              <div class="stat-3 stat-bar">
                                <span class="stat-bar-rating stat-bar-rating-two" role="stat-bar"
                                  style="width: <?php echo e($valueprogress); ?>%;"><?php echo e($valueprogress); ?>%</span>
                              </div>
                            </div>
                          </div>
                          <?php if($overallrating>3.9): ?>
                          <div class="overall-rating-block satisfied-customer-block text-center">
                            <h3>100%</h3>
                            <div class="overall-rating-title"><?php echo e(__('Satisfied Customer')); ?></div>
                            <p><?php echo e(__('All Customers give this product 4 and 5 Star Rating')); ?></p>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="col-lg-8 col-md-9">
                        <?php $__currentLoopData = $product->reviews->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <?php if($review->status == "1"): ?>
                          <div class="customer-reviews-block">
                            <div class="row">
                              <div class="col-lg-2 col-md-2 col-3">
                                <div class="customer-reviews-img">
                                  <?php if($review->users->image !=''): ?>
                                  <img src="<?php echo e(url('/images/user/'.$review->users->image)); ?>" alt=""
                                    class=" rounded-circle img-fluid">
                                  <?php else: ?>
                                  <img class="rounded-circle img-fluid"
                                    src="<?php echo e(Avatar::create($review->users->name)->toBase64()); ?>">
                                  <?php endif; ?>
                                </div>
                              </div>
                              <div class="col-lg-10 col-md-10 col-9">
                                <div class="customer-review-dtl">
                                  <div class="row mb-3">
                                    <div class="col-lg-6 col-md-6 col-6">
                                      <h5 class="customer-title"><?php echo e($review->users->name); ?></h5>
                                      <?php
        
                                        $user_count = count([$review]);
                                        $user_sub_total = 0;
                                        $user_review_t = $review->price * 5;
                                        $user_price_t = $review->price * 5;
                                        $user_value_t = $review->value * 5;
                                        $user_sub_total = $user_sub_total + $user_review_t + $user_price_t + $user_value_t;
      
                                        $user_count = ($user_count * 3) * 5;
                                        $rat1 = $user_sub_total / $user_count;
                                        $ratings_var1 = ($rat1 * 100) / 5;
        
                                      ?>
                                      <div class="pull-left">
                                        <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var1; ?>%"
                                            class="star-ratings-sprite-rating"></span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-6">
                                      <small class="pull-right rating-date"><?php echo e(__('On')); ?>

                                        <?php echo e(date('jS M Y',strtotime($review->created_at))); ?></small>
                                    </div>
                                    <p><span class="font-weight500"><?php echo e($review->review); ?></span>]</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                    <?php endif; ?>
                    <?php endif; ?>

                  </div>
                <?php endif; ?>
               
                <div class="tab-pane fade" id="pills-comments" role="tabpanel" aria-labelledby="pills-comments-tab" tabindex="0">
                  <h3><i class="fa fa-comments-o"></i> <?php echo e(__('Recent Comments')); ?></h3>
                  <hr>
                  <?php $__empty_1 = true; $__currentLoopData = $product->comments->sortByDesc('id')->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                  <div class="customer-reviews-block">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-3">
                        <div class="customer-reviews-img">
                          <img src="<?php echo e(Avatar::create($comment->name)->toGravatar()); ?>" class="align-self-center mr-3" alt="<?php echo e($comment->name); ?>">
                        </div>
                      </div>
                      <div class="col-lg-10 col-md-10 col-9">
                        <div class="customer-review-dtl">
                          <div class="row mb-3">
                            <div class="col-lg-6 col-md-6 col-6">
                              <h5 class="customer-title"><?php echo e($comment->name); ?></h5>
                            </div>
                            <div class="col-lg-6 col-md-6 col-6">
                              <small class="float-right"><?php echo e($comment->created_at->diffForHumans()); ?></small>
                            </div>
                          </div>
                          <p class="mb-0">
                            <?php echo $comment->comment; ?>

                          </p>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="appendComment">

                  </div>

                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                  <h4><i class="fa fa-trophy"></i> <?php echo e(__("No Comment Product")); ?></h4>

                  <?php endif; ?>

                  <?php if(count($product->comments) > 5): ?>

                  <p></p>
                  <div class="remove-row">
                    <button data-simpleproduct="yes" data-proid="<?php echo e($product->id); ?>" data-id="<?php echo e($comment->id); ?>" class="btn-more btn btn-info btn-sm"><?php echo e(__('Load More')); ?></button>
                  </div>
                  <p></p>

                  <?php endif; ?>
                  <hr>
                  <h5 class="card-title mb-30"><?php echo e(__('Leave A Comment')); ?></h5>

                  <form action="<?php echo e(route('post.comment')); ?>" method="POST" novalidate class="needs-validation">
                    <?php echo csrf_field(); ?>



                    <div class="form-group mb-20">
                      <label><?php echo e(__('Name')); ?>: <span class="text-red">*</span></label>
                      <input value="<?php echo e(old('name')); ?>" required autofocus name="name" type="text" class="form-control"">
                          <span class=" text-red"><?php echo e($errors->first('name')); ?></span>
                    </div>

                    <div class="form-group mb-20">

                      <label><?php echo e(__("Email")); ?>: <span class="text-red">*</span></label>
                      <input value="<?php echo e(old('email')); ?>" required name="email" type="email" class="form-control"
                        aria-describedby="emailHelp">
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                        else.</small>
                      <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                      <span class="text-red"><?php echo e($errors->first('email')); ?></span>
                    </div>



                    <div class="form-group mb-20">
                      <label><?php echo e(__('Comment')); ?>: <span class="text-red">*</span></label>
                      <textarea name="comment" required placeholder="<?php echo e(__('Comment')); ?>"
                        class="form-control" rows="3" cols="30"><?php echo e(old('comment')); ?></textarea>
                      <span class="text-red"><?php echo e($errors->first('comment')); ?></span>
                    </div>

                    <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                  </form>



                </div>
                <div class="tab-pane fade" id="v-pro-faqs" role="tabpanel" aria-labelledby="v-pro-faqs-tab" tabindex="0">
                  <?php $__empty_1 = true; $__currentLoopData = $product->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qid => $fq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <h5>[Q.<?php echo e($qid+1); ?>] <?php echo e($fq->question); ?></h5>
                    <p class="h6"><?php echo $fq->answer; ?></p>
                    <hr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                  <h4><?php echo e(__('NO FAQ')); ?></h4>

                  <?php endif; ?>
                </div>

              </div>
            </div>
          </div>
          <?php if(isset($product->relsetting) && count($product->relsetting)>0): ?>
          <div class="col-lg-5 col-12">
            <?php if(isset($product->relsetting)): ?>
              <div class="related-product-des">
                <h3 class="related-title"><?php echo e(__('Related Product')); ?></h3>
                <?php if($product->relsetting->status == '1'): ?>
                    <?php if(isset($product->relproduct)): ?>
                        <?php $__currentLoopData = $product->relproduct->related_pro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relpro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                              $relproduct = App\Product::find($relpro);
                            ?>
                            <?php if(isset($relproduct)): ?>
                                <?php $__currentLoopData = $relproduct->subvariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orivar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($orivar->def == '1'): ?>
                                        <?php
                                            $var_name_count = count($orivar['main_attr_id']);

                                            $name = array();
                                            $var_name;
                                            $newarr = array();

                                            for($i = 0; $i<$var_name_count; $i++){ 

                                              $var_id=$orivar['main_attr_id'][$i];
                                              $var_name[$i]=$orivar['main_attr_value'][$var_id];
                                              $name[$i]=App\ProductAttributes::where('id',$var_id)->first();

                                            }


                                            try {
                                                $url = url('details') . '/'. str_slug($relproduct->name,'-')  .'/' . $relproduct->id . '?' . $name[0]['attr_name'] . '=' . $var_name[0] . '&' . $name[1]['attr_name'] . '=' . $var_name[1];
                                            } catch (\Exception $e) {
                                                $url = url('details') . '/' .str_slug($relproduct->name,'-')  .'/' . $relproduct->id . '?' . $name[0]['attr_name'] . '=' . $var_name[0];
                                            }

                                        ?>
                                        <div class="related-block">
                                          <div class="row">
                                            <div class="col-lg-10 col-md-10 col-9">
                                              <div class="row">
                                                <div class="col-lg-4 col-md-4 col-5">
                                                  <div class="related-img <?php echo e($orivar->stock ==0 ? "pro-img-box" : ""); ?>">
                                                    <a href="<?php echo e($url); ?>" title="<?php echo e($relproduct->name); ?>">
                                                    <?php if(count($relproduct->subvariants)>0): ?>
                                                        <?php if(isset($orivar->variantimages['image2'])): ?>
                                                          <img class="img-fluid <?php echo e($orivar->stock ==0 ? "filterdimage" : ""); ?>" src="<?php echo e(url('/variantimages/thumbnails/'.$orivar->variantimages['main_image'])); ?>" alt="<?php echo e($relproduct->name); ?>">
                                                        <?php endif; ?>  
                                                    <?php else: ?>
                                                      <img class="img-fluid <?php echo e($orivar->stock ==0 ? "filterdimage" : ""); ?>" title="<?php echo e($relproduct->name); ?>" src="<?php echo e(url('/images/no-image.png')); ?>" alt="No Image" />
                                                    <?php endif; ?>
                                                  </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-7">
                                                  <div class="related-dtl">
                                                    <h6 class="title"><a href="<?php echo e($url); ?>" title="title="<?php echo e($orivar->products?$orivar->products->name:''); ?>""><?php echo e(substr($relproduct->name, 0, 20)); ?><?php echo e(strlen($relproduct->name)>20 ? '...' : ""); ?></a></h6>
                                                      <?php if($orivar->stock == 0): ?>
                                                      <h5 align="center" class="oottext"><?php echo e(__('Out of stock')); ?></h5>
                                                      <?php endif; ?>

                                                      <?php if($orivar->stock != 0 && $orivar->products->selling_start_at != null && $orivar->products->selling_start_at >= date('Y-m-d H:i:s')): ?>
                                                      <h5 align="center" class="oottext2"><?php echo e(__('Coming Soon')); ?> !</h5>
                                                      <?php endif; ?>
                                                      <!-- /.image -->

                                                      <?php if($relproduct->featured=="1"): ?>
                                                      <div class="tag hot"><span><?php echo e(__('Hot')); ?></span></div>
                                                      <?php elseif($product->offer_price=="1"): ?>
                                                      <div class="tag sale"><span><?php echo e(__('Sale')); ?></span></div>
                                                      <?php else: ?>
                                                      <div class="tag new"><span><?php echo e(__('New')); ?></span></div>
                                                      <?php endif; ?>
                                                    <div class="row">
                                                      <div class="col-lg-12 col-md-12">
                                                        <?php
                                                        $reviews = ProductRating::getReview($relpro);
                                                        ?>

                                                        <?php if($reviews != 0): ?>
                                                          <div class="pull-left">
                                                            <div class="star-ratings-sprite"><span style="width:<?php echo $reviews; ?>%"
                                                                class="star-ratings-sprite-rating"></span></div>
                                                          </div>
                                                        <?php else: ?>
                                                          <div class="no-rating"><?php echo e('No Rating'); ?></div>
                                                        <?php endif; ?>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-3">
                                              <div class="related-price">
                                                <?php if($price_login == '0' || Auth::check()): ?>

                                                  <?php

                                                  $result = ProductPrice::getprice($relproduct, $orivar)->getData();

                                                  ?>


                                                  <?php if($result->offerprice == 0): ?>
                                                    <span class="price"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(sprintf("%.2f",$result->mainprice*$conversion_rate)); ?></span>
                                                  <?php else: ?>
                                                    <span class="price"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i><?php echo e(price_format($result->offerprice*$conversion_rate)); ?></span>
                                                    <span class="price-before-discount"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i><?php echo e(price_format($result->mainprice*$conversion_rate)); ?></span>
                                                  <?php endif; ?>

                                                <?php endif; ?>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php else: ?>
                    <?php $__currentLoopData = $product->subcategory->products()->where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relpro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if(isset($product->subcategory->products)): ?>
                        <?php $__currentLoopData = $relpro->subvariants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orivar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                          <?php if($orivar->def == '1' && $product->id != $orivar->products->id): ?>

                            <?php
                            $var_name_count = count($orivar['main_attr_id']);

                            $name = array();
                            $var_name;
                            $newarr = array();
                            for($i = 0; $i<$var_name_count; $i++){ $var_id=$orivar['main_attr_id'][$i];
                              $var_name[$i]=$orivar['main_attr_value'][$var_id];
                              $name[$i]=App\ProductAttributes::where('id',$var_id)->first();

                              }
                              try {
                                  $url = url('details') . '/'. str_slug($relpro->name,'-')  .'/' . $relpro->id . '?' . $name[0]['attr_name'] . '=' . $var_name[0] . '&' . $name[1]['attr_name'] . '=' . $var_name[1];
                              } catch (\Exception $e) {
                                  $url = url('details') . '/' .str_slug($relpro->name,'-')  .'/' . $relpro->id . '?' . $name[0]['attr_name'] . '=' . $var_name[0];
                              }
                            ?>
                            <div class="related-block">
                              <div class="row">
                                <div class="col-lg-10 col-md-10 col-9">
                                  <div class="row">
                                    <div class="col-lg-4 col-md-4 col-5">
                                      <div class="related-img <?php echo e($orivar->stock ==0 ? "pro-img-box" : ""); ?>">
                                        <a href="<?php echo e($url); ?>" title="<?php echo e($product->name); ?>">
                                          <?php if(count($product->subvariants)): ?>

                                            <?php if(isset($orivar->variantimages['image2'])): ?>
                                            <img class="img-fluid <?php echo e($orivar->stock ==0 ? "filterdimage" : ""); ?>" src="<?php echo e(url('/variantimages/thumbnails/'.$orivar->variantimages['main_image'])); ?>" alt="<?php echo e($product->name); ?>">
                                            <?php endif; ?>

                                          <?php else: ?>
                                            <img class="img-fluid <?php echo e($orivar->stock ==0 ? "filterdimage" : ""); ?>" title="<?php echo e($product->name); ?>" src="<?php echo e(url('/images/no-image.png')); ?>" alt="No Image" />
                                          <?php endif; ?>
                                        </a>
                                      </div>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-7">
                                      <div class="related-dtl">
                                        <h6 class="title"><a href="<?php echo e($url); ?>" title="<?php echo e($product->name); ?>"><?php echo e(substr($relpro->name, 0, 20)); ?><?php echo e(strlen($relpro->name)>20 ? '...' : ""); ?></a></h6>
                                        <?php if($orivar->stock == 0): ?>
                                          <h5 align="center" class="oottext"><?php echo e(__('Out of stock')); ?> </h5>
                                        <?php endif; ?>

                                        <?php if($orivar->stock != 0 && $orivar->products->selling_start_at != null && $orivar->products->selling_start_at >= date('Y-m-d H:i:s')): ?>
                                          <h5 align="center" class="oottext2"> <?php echo e(__('Coming Soon')); ?></h5>
                                        <?php endif; ?>

                                        <?php if($product->featured=="1"): ?>
                                          <div class="tag hot"><span> <?php echo e(__('Hot')); ?> </span></div>
                                        <?php elseif($product->offer_price=="1"): ?>
                                          <div class="tag sale"><span> <?php echo e(__('Sale')); ?> </span></div>
                                        <?php else: ?>
                                          <div class="tag new"><span> <?php echo e(__('New')); ?> </span></div>
                                        <?php endif; ?>
                                        <div class="row">
                                          <div class="col-lg-12 col-md-12">
                                            <?php
                                            $reviews = ProductRating::getReview($relpro);
                                            ?>

                                            <?php if($reviews != 0): ?>
                                              <div class="pull-left">
                                                <div class="star-ratings-sprite"><span style="width:<?php echo $reviews; ?>%" class="star-ratings-sprite-rating"></span></div>
                                              </div>
                                            <?php else: ?>
                                              <div class="no-rating"><?php echo e('No Rating'); ?></div>
                                            <?php endif; ?>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-3">
                                  <div class="related-price">
                                    <?php if($price_login == '0' || Auth::check()): ?>

                                      <?php

                                      $result = ProductPrice::getprice($relpro, $orivar)->getData();

                                      ?>

                                      <?php if($result->offerprice == 0): ?>
                                        <span class="price"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i><?php echo e(price_format($result->mainprice*$conversion_rate)); ?></span>
                                      <?php else: ?>
                                        <span class="price"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i><?php echo e(price_format($result->offerprice*$conversion_rate)); ?></span>
                                        <span class="price-before-discount"><i class="<?php echo e(session()->get('currency')['value']); ?>"></i><?php echo e(price_format($result->mainprice*$conversion_rate)); ?></span>
                                      <?php endif; ?>

                                    <?php endif; ?>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <?php endif; ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
                <?php endif; ?>
              </div>
            <?php endif; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </section>
    <!-- Product Description End -->

<!-- Report Product Modal -->
<div class="modal fade" id="reportproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h5 class="modal-title p-2" id="myModalLabel"><?php echo e(__('Report Product')); ?> <?php echo e($product->name); ?></h5>
        </div>

        <div class="modal-body">
          <form action="<?php echo e(route('rep.pro',$product->id)); ?>" method="POST">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="simple_product" value="yes">
            <div class="form group">
              <label><?php echo e(__('Subject')); ?>: <span class="text-red">*</span></label>
              <input required type="text" name="title" class="form-control" placeholder="<?php echo e(__('Why you reporting the prdouct enter title')); ?>">
            </div>
            <br>
            <div class="form-group">
              <label><?php echo e(__('Email')); ?>: <span class="text-red">*</span></label>
              <input name="email" required type="email" class="form-control" name="email" placeholder="<?php echo e(__('Enter your email address')); ?>">
            </div>

            <div class="form-group">
              <label><?php echo e(__('Description')); ?>: <span class="text-red">*</span></label>
              <textarea required class="form-control" placeholder="<?php echo e(__('Briefdescriptionofyourissue')); ?>" name="des" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
              <button type="submit" class="btn text-white btn-md bg-primary"><?php echo e(__('SUBMIT FOR REVIEW')); ?></button>
            </div>
          </form>
        </div>

      </div>
    </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="notifyMe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="float-right close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h5 class="p-1 modal-title" id="exampleModalLabel"><?php echo e(__('Notify me')); ?></h5>

        </div>
        <div class="modal-body">
          <form action="<?php echo e(url("/subscribe/for/product/stock/".$product->id)); ?>" method="POST" class="notifyForm">
            <?php echo csrf_field(); ?>
            <p class="help-block text-dark">
              <?php echo e(__("Please enter your email to get notified")); ?>

            </p>
            <div class="form-group">
              <label>Email: <span class="text-red">*</span></label>
              <input name="email" type="email" class="form-control" placeholder="<?php echo e(__("Enter your email")); ?>" required>
            </div>

            <div class="form-group">
              <button type="submit" class="text-light btn btn-md btn-primary">
                <?php echo e(__("Submit")); ?>

              </button>
            </div>
          </form>
        </div>

      </div>
    </div>
</div>

  <!-- Size chart modal -->
<?php if(isset($product->sizechart) && $product->size_chart != '' && $product->sizechart->status == 1): ?>
  <div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="p-2 modal-title">
                <?php echo e(__('Preview')); ?>

            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body previewTable">
            <?php echo $__env->make('admin.sizechart.previewtable',['template' => $product->sizechart], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger-rgba" data-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
  </div>
<?php endif; ?>
<!-- size chart model end -->



  <?php $__env->stopSection(); ?>
  <?php $__env->startSection('script'); ?>
  <!-- Lightbox JS -->
  <script src="<?php echo e(url('js/lightbox.min.js')); ?>"></script>
  <script src="<?php echo e(url('front/vendor/js/additional-methods.min.js')); ?>"></script>
  <!-- Drfit ZOOM JS -->
  <script src="<?php echo e(url('front/vendor/js/drift.min.js')); ?>"></script>
  <script src="<?php echo e(url('js/share.js')); ?>"></script>
  <script>
    var baseUrl = <?php echo json_encode(url('/'), 15, 512) ?>;
  </script>
  <script src='https://unpkg.com/spritespin@x.x.x/release/spritespin.js' type='text/javascript'></script>
  <script src="<?php echo e(url('js/detailpage.js')); ?>"></script>
  <script>
    var owl = $("#productgalleryItems");
    owl.owlCarousel({
      responsive: {
        0: {
          items: 3
        },
        600: {
          items: 3
        },
        1100: {
          items: 4
        }
      },
      slideSpeed: 300,
      autoPlay: true,
      smartSpeed: 1500,
      margin: 10,
      rtl: false,
      loop: true,
      video: true,
      nav: true,
      rewindNav: true,
      navText: ["<i class='icon fa fa-angle-left'></i>", "<i class='icon fa fa-angle-right'></i>"]
    });

    $("#single-product-gallery-item").on('mouseover',function() {
        $('#details-container').css('z-index', '9999');
    });
        
    $("#single-product-gallery-item").on('mouseout',function() {
      $('#details-container').css('z-index', '0');
    });

    driftzoom();

    function driftzoom() {

      new Drift(document.querySelector('.drift-demo-trigger'), {
        paneContainer: document.querySelector('#details-container'),
        inlinePane: 500,
        inlineOffsetY: -85,
        containInline: true,
        hoverBoundingBox: true,
        zoomFactor: 3,
        handleTouch: false,
        showWhitespaceAtEdges: false
      });
    }

    

    $(function(){

     

      var id = '<?php echo e($product->id); ?>';

        setTimeout(() => {
          

          $.ajax({
              url : '<?php echo e(url("/simple_product/360/images")); ?>',
              type : 'GET',
              dataType : 'json',
              data : {id : id},
              success : function(response){

                $("#produdct360tour").spritespin({
                    // path to the source images.
                      frames : 35,
                      animate : true,
                      responsive : false,
                      loop : false,
                      orientation : 180,
                      reverse : false,
                      detectSubsampling : true,
                      source: response,
                      width   : 600,  // width in pixels of the window/frame
                      height  : 500,  // height in pixels of the window/frame
                });

              }
          });

        }, 2500);

    });
  </script>
  <?php $__env->stopSection(); ?>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/digitalproduct.blade.php ENDPATH**/ ?>