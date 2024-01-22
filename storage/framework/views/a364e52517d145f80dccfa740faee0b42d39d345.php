
<?php $__env->startSection('title','Emart | Wishlist'); ?>
<?php $__env->startSection("content"); ?>   
    <!-- Home Start -->
    <section id="home" class="home-main-block product-home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav aria-label="breadcrumb" class="breadcrumb-main-block">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Wishlist')); ?></li>
              </ol>
            </nav>
            <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('frontend/assets/images/wishlist/breadcrum.png');">
              <div class="breadcrumb-nav">
                  <h3 class="breadcrumb-title"><?php echo e(__('Wishlist')); ?></h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Home End -->

    <!-- Wishlist Start -->
    <section id="wishlist" class="wishlist-main-block">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="wishlist-block">
              <div class="alert alert-dismissible fade show" role="alert">
                <div class="table-responsive">
                  <table class="table">
                    <tbody>
                      <?php if(count($data) > 0): ?>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($p->variant && $p->variant->products->status == 1): ?>
                            <tr id="productrow<?php echo e($p->variant->id); ?>">
                              <td style="width:5%;">
                                <a mainid="<?php echo e($p->variant->id); ?>" data-remove="<?php echo e(url('removeWishList/'.$p->variant->id)); ?>" title="<?php echo e(__('Remove it from your Wishlist')); ?>" class="removeFrmWish">
                                  <i class="fa fa-times" aria-hidden="true"></i> 
                                </a>
                              </td>
                              <td style="width:10%;">
                                <a href="<?php echo e(App\Helpers\ProductUrl::getUrl($p->variant->id)); ?>" title="<?php echo e(__('Product Image')); ?>">
                                  <?php if(isset($p->variant->variantimages) && file_exists(public_path().'/variantimages/thumbnails/'.$p->variant->variantimages->main_image)): ?>
                                  <img title="<?php echo e($p->variant->products->name); ?>" src="<?php echo e(url('variantimages/thumbnails/'.$p->variant->variantimages['main_image'])); ?>" alt="<?php echo e($p->variant->variantimages['main_image']); ?>" class="img-fluid">
                                  <?php else: ?> 
                                  <img title="<?php echo e($p->variant->products->name); ?>" src="<?php echo e(url('images/no-image.png')); ?>" alt="<?php echo e($p->variant->variantimages['main_image']); ?>" class="img-fluid">
                                  <?php endif; ?>
                                </a>
                              </td>
                              <td class="brd-rgt p-25 wishlist-title" style="width:35%;"><a href="<?php echo e(App\Helpers\ProductUrl::getUrl($p->variant->id)); ?>" title="<?php echo e($p->variant->products->name); ?>"><?php echo e($p->variant->products->name); ?> <small>(<?php echo e(variantname($p->variant)); ?>)</small></a></td>
                              <td class="brd-rgt p-25" style="width:15%;">
                                <?php if($price_login == 0 || Auth::check()): ?>
                                  <?php
                                  $convert_price = 0;
                                  $show_price = 0;

                                  $commision_setting = App\CommissionSetting::first();

                                  if($commision_setting->type == "flat"){

                                  $commission_amount = $commision_setting->rate;
                                  if($commision_setting->p_type == 'f'){

                                  $totalprice = $p->variant->products->vender_price+$p->variant->price+$commission_amount;
                                  $totalsaleprice = $p->variant->products->vender_offer_price + $p->variant->price + $commission_amount;

                                  if($p->variant->products->vender_offer_price == 0){
                                  $show_price = $totalprice;
                                  }else{
                                  $totalsaleprice;
                                  $convert_price = $totalsaleprice =='' ? $totalprice:$totalsaleprice;
                                  $show_price = $totalprice;
                                  }


                                  }else{

                                  $totalprice = ($p->variant->products->vender_price+$p->variant->price)*$commission_amount;

                                  $totalsaleprice = ($p->variant->products->vender_offer_price+$p->variant->price)*$commission_amount;

                                  $buyerprice = ($p->variant->products->vender_price+$p->variant->price)+($totalprice/100);

                                  $buyersaleprice = ($p->variant->products->vender_offer_price+$p->variant->price)+($totalsaleprice/100);


                                  if($p->variant->products->vender_offer_price ==0){
                                  $show_price = round($buyerprice,2);
                                  }else{
                                  round($buyersaleprice,2);

                                  $convert_price = $buyersaleprice==''?$buyerprice:$buyersaleprice;
                                  $show_price = $buyerprice;
                                  }


                                  }
                                  }else{

                                  $comm = App\Commission::where('category_id',$p->variant->products->category_id)->first();
                                  if(isset($comm)){
                                  if($comm->type=='f'){

                                  $price = $p->variant->products->vender_price + $comm->rate + $p->variant->price;

                                  if($p->variant->products->vender_offer_price != null){
                                  $offer = $p->variant->products->vender_offer_price + $comm->rate + $p->variant->price;
                                  }else{
                                  $offer = $p->variant->products->vender_offer_price;
                                  }

                                  if($p->variant->products->vender_offer_price == 0 || $p->variant->products->vender_offer_price == null){
                                  $show_price = $price;
                                  }else{

                                  $convert_price = $offer;
                                  $show_price = $price;
                                  }


                                  }
                                  else{

                                  $commission_amount = $comm->rate;

                                  $totalprice = ($p->variant->products->vender_price+$p->variant->price)*$commission_amount;

                                  $totalsaleprice = ($p->variant->products->vender_offer_price+$p->variant->price)*$commission_amount;

                                  $buyerprice = ($p->variant->products->vender_price+$p->variant->price)+($totalprice/100);

                                  $buyersaleprice = ($p->variant->products->vender_offer_price+$p->variant->price)+($totalsaleprice/100);


                                  if($p->variant->products->vender_offer_price == 0){
                                  $show_price = round($buyerprice,2);
                                  }else{
                                  $convert_price = round($buyersaleprice,2);

                                  $convert_price = $buyersaleprice==''?$buyerprice:$buyersaleprice;
                                  $show_price = round($buyerprice,2);
                                  }



                                  }
                                  }else{
                                  $commission_amount = 0;

                                  $totalprice = ($p->variant->products->vender_price+$p->variant->price)*$commission_amount;

                                  $totalsaleprice = ($p->variant->products->vender_offer_price+$p->variant->price)*$commission_amount;

                                  $buyerprice = ($p->variant->products->vender_price+$p->variant->price)+($totalprice/100);

                                  $buyersaleprice = ($p->variant->products->vender_offer_price+$p->variant->price)+($totalsaleprice/100);


                                  if($p->variant->products->vender_offer_price == 0){
                                  $show_price = round($buyerprice,2);
                                  }else{
                                  $convert_price = round($buyersaleprice,2);

                                  $convert_price = $buyersaleprice==''?$buyerprice:$buyersaleprice;
                                  $show_price = round($buyerprice,2);
                                  }
                                  }
                                  }
                                  $convert_price_form = $convert_price;
                                  $show_price_form = $show_price;
                                  $convert_price = $convert_price*$conversion_rate;
                                  $show_price = $show_price*$conversion_rate;

                                  ?>

                                  <?php if(Session::has('currency')): ?>
                                    <?php if($convert_price == 0 || $convert_price == 'null'): ?>
                                    <span><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(round($show_price,2)); ?></span>
                                    <?php else: ?>
                                    <span><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(round($convert_price,2)); ?></span>
                                    <span><s><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(round($show_price,2)); ?></s></span>
                                    <?php endif; ?>
                                  <?php endif; ?>

                                <?php endif; ?>
                              </td>
                              
                                <?php if($p->variant->stock == 0): ?>
                                  <td class="brd-rgt p-25 wishlist-out-stock" style="width:15%;"><?php echo e(__('Out of stock')); ?></td>
                                <?php else: ?>
                                <td class="brd-rgt p-25 wishlist-stock" style="width:15%;"><?php echo e(__('In Stock')); ?></td>
                                <?php endif; ?>

                              <td class="brd-rgt p-25" style="width:5%;"><a href="<?php echo e(App\Helpers\ProductUrl::getUrl($p->variant->id)); ?>" title="eye"><i data-feather="eye"></i></a></td>
                              <td class="brd-rgt p-25" style="width:5%;">
                                <form method="POST" action="<?php echo e(route('add.cart',['id' => $p->variant->products->id ,'variantid' =>$p->variant->id, 'varprice' => $show_price_form, 'varofferprice' => $convert_price_form ,'qty' =>$p->variant->min_order_qty])); ?>" class="addVariantProCard<?php echo e($p->variant->products->id); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <a href="javascript:" onclick="addVariantProCard(<?php echo e($p->variant->products->id); ?>)" title="<?php echo e(__('Add to Cart')); ?>"><i data-feather="briefcase"></i></a>  
                                </form>
                              </td>
                              <!-- <td class="p-25" style="width:5%;"><a href="#" title="share"><i data-feather="share-2"></i></a></td> -->
                            </tr>
                          <?php endif; ?>
                          <?php if(isset($p->simple_product) && $p->simple_product->status == '1'): ?>
                            <tr id="productrow<?php echo e($p->simple_product?$p->simple_product->id:''); ?>">
                              <td style="width:5%;"> 
                                <a data-remove="<?php echo e(url('removesimplesWishList/'.$p->simple_product->id)); ?>" title="Remove it from your Wishlist" class="removeFrmWish">
                                  <i class="fa fa-times" aria-hidden="true"></i> 
                                </a>
                              </td>
                              <td style="width:10%;">
                                <a href="<?php echo e(route('show.product',['id' => $p->simple_product->id, 'slug' => $p->simple_product->slug])); ?>" title="">
                                  <?php if($p->simple_product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$p->simple_product->thumbnail)): ?>
                                    <img class="img-fluid" title="<?php echo e($p->simple_product->products_name); ?>" src="<?php echo e(url('images/simple_products/'.$p->simple_product->thumbnail)); ?>" alt="<?php echo e($p->simple_product->thumbnail); ?>">
                                  <?php else: ?> 
                                    <img class="img-fluid" src="<?php echo e(url('images/no-image.png')); ?>" alt="Product Image" />
                                  <?php endif; ?>
                                </a>
                              </td>
                              <td class="brd-rgt p-25 wishlist-title" style="width:35%;"><a href="<?php echo e(route('show.product',['id' => $p->simple_product->id, 'slug' => $p->simple_product->slug])); ?>" title="<?php echo e($p->simple_product->product_name); ?>"><?php echo e($p->simple_product->product_name); ?></a></td>
                              <td class="brd-rgt p-25" style="width:15%;">
                                <?php if($p->simple_product->offer_price == ''): ?>
                                  <span><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(round($p->simple_product->price * $conversion_rate,2)); ?> </span>
                                <?php else: ?>
                                  <span><i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(round($p->simple_product->offer_price * $conversion_rate,2)); ?></span>
                                  <span> <s> <i class="<?php echo e(session()->get('currency')['value']); ?>"></i> <?php echo e(round($p->simple_product->price * $conversion_rate,2)); ?></s></span>
                                <?php endif; ?>
                              </td>
                              <?php if($p->simple_product->stock == 0): ?>
                                <td class="brd-rgt p-25 wishlist-out-stock" style="width:15%;"><?php echo e(__('Out of stock')); ?></td>
                              <?php else: ?>
                                <td class="brd-rgt p-25 wishlist-stock" style="width:15%;"><?php echo e(__('In Stock')); ?></td>
                              <?php endif; ?>
                              <td class="brd-rgt p-25" style="width:5%;"><a href="<?php echo e(route('show.product',['id' => $p->simple_product->id, 'slug' => $p->simple_product->slug])); ?>" title="eye"><i data-feather="eye"></i></a></td>
                              <td class="brd-rgt p-25" style="width:5%;">
                                <form method="POST" action="<?php echo e($p->simple_product->type == 'ex_product' ? $p->simple_product->external_product_link : route('add.cart.simple',['pro_id' => $p->simple_product->id, 'price' => $p->simple_product->price, 'offerprice' => $p->simple_product->offer_price])); ?>" class="addSimpleCardFrom<?php echo e($p->simple_product->id); ?>">
                                    <?php echo csrf_field(); ?>

                                    <input name="qty" type="hidden" value="<?php echo e($p->simple_product->min_order_qty); ?>" max="<?php echo e($p->simple_product->max_order_qty); ?>" class="qty-section">

                                    <a href="javascript:" onclick="addSimpleProCard(<?php echo e($p->simple_product->id); ?>)" title="<?php echo e(__('Add To Cart')); ?>"><i data-feather="briefcase"></i></a>

                                </form>
                              </td>
                              <!-- <td class="p-25" style="width:5%;"><a href="#" title="share"><i data-feather="share-2"></i></a></td> -->
                            </tr>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?> 
                      <h3><i class="fa fa-heart-o"></i> <?php echo e(__("No Data")); ?></h3>
                    <?php endif; ?>
                    </tbody>
                  </table>
                  <div class="text-right">
                  <?php echo e($data->appends(request()->all())->links()); ?>

                  </div>
                  <!-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Wishlist End -->

<?php $__env->stopSection(); ?>
<script type="text/javascript" src="<?php echo e(url('frontend/assets/js/jquery.min.js')); ?>"></script> <!-- jquery js-->
<script src="<?php echo e(url('js/wish2.js')); ?>"></script>
<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/wishlist.blade.php ENDPATH**/ ?>