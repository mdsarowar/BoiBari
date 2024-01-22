


















<?php $__env->startSection('title','Boibari | All Product'); ?>
<?php $__env->startSection("content"); ?>

    <!-- Home Start -->
    <section id="home" class="home-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav aria-label="breadcrumb" class="breadcrumb-main-block">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Filter')); ?></li>
                        </ol>
                    </nav>
                    <div class="about-breadcrumb-block wishlist-breadcrumb"
                         style="background-image: url('frontend/assets/images/wishlist/breadcrum.png');">
                        <div class="breadcrumb-nav">
                            <h3 class="breadcrumb-title"><?php echo e(__('Filter')); ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home End -->

    <!-- Prodcut Start -->
    <section id="product-filter" class="product-filter-main-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="product-filter-sidebar">
                        <form action="<?php echo e(route('filter_product')); ?>" method="Post" class="submitForm">
                            <?php echo csrf_field(); ?>
                            
                            <div class="accordion" id="accordionExample">

                                <div class="product-filter-block checkout-personal-dtl accordion-item">
                                    <div class="accordion-header" id="headingcategory">
                                        <h4 class="section-title accordion-button" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsecategory"
                                            aria-expanded="true"
                                            aria-controls="collapsecategory">Category</h4>
                                        <div id="collapsecategory" class="accordion-collapse collapse show"
                                             aria-labelledby="headingcategory" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <?php $__currentLoopData = App\Category::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <label class="address-checkbox mb-15"><?php echo e($category->title); ?>

                                                                <input <?php echo e(isset($selectcategories)?(in_array($category->id,$selectcategories)) ?'checked':'':''); ?> type="checkbox"
                                                                       id="br<?php echo e($category->id); ?>" onclick="submitForm()"
                                                                       name="categories[]" value="<?php echo e($category->id); ?>">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-filter-block checkout-personal-dtl accordion-item">
                                    <div class="accordion-header" id="headingauthor">
                                        <h4 class="section-title accordion-button" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseauthor"
                                            aria-expanded="true"
                                            aria-controls="collapseauthor">Author</h4>
                                        <div id="collapseauthor" class="accordion-collapse collapse show"
                                             aria-labelledby="headingauthor" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <?php $__currentLoopData = App\Author::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <label class="address-checkbox mb-15"><?php echo e($author->title); ?>

                                                                <input <?php echo e(isset($selectauthors)?(in_array($author->id,$selectauthors)) ?'checked':'':''); ?> type="checkbox"
                                                                       id="br<?php echo e($author->id); ?>" onclick="submitForm()"
                                                                       name="authors[]" value="<?php echo e($author->id); ?>">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-filter-block checkout-personal-dtl accordion-item">
                                    <div class="accordion-header" id="headingpublisher">
                                        <h4 class="section-title accordion-button" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapsepublisher"
                                            aria-expanded="true"
                                            aria-controls="collapsepublisher">Publisher</h4>
                                        <div id="collapsepublisher" class="accordion-collapse collapse show"
                                             aria-labelledby="headingpublisher" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <ul>
                                                    <?php $__currentLoopData = App\Publisher::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <label class="address-checkbox mb-15"><?php echo e($publisher->title); ?>

                                                                <input <?php echo e(isset($selectpublishers)?(in_array($publisher->id,$selectpublishers)) ?'checked':'':''); ?> type="checkbox"
                                                                       id="br<?php echo e($publisher->id); ?>"
                                                                       onclick="submitForm()" name="publishers[]"
                                                                       value="<?php echo e($publisher->id); ?>">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product-filter-img">
                                <img src="<?php echo e(url('frontend/assets/images/product/offer.png')); ?>" class="img-fluid"
                                     alt="">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        
                        <?php if($products): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-3 col-md-4 col-4">
                                    <div class="featured-product-block">
                                        <div class="featured-product-img">

                                            <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>" title="">
                                                <?php if($product->thumbnail != '' && file_exists(public_path().'/images/simple_products/'.$product->thumbnail)): ?>

                                                    <img class="img-fluid"
                                                         src="<?php echo e(url('images/simple_products/'.$product->thumbnail)); ?>"
                                                         alt="<?php echo e($product->product_name); ?>">

                                                <?php else: ?>

                                                    <img class="img-fluid" title=""
                                                         src="<?php echo e(url('images/no-image.png')); ?>" alt="No Image"/>

                                                <?php endif; ?>
                                            </a>
                                            <div class="overlay-bg"></div>
                                            <div class="featured-product-icon">
                                                <ul>
                                                    <li>
                                                        <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>"
                                                           title="eye"><i data-feather="eye"></i></a></li>

                                                    <?php if(auth()->guard()->check()): ?>

                                                        <?php if($product->type != 'ex_product'): ?>

                                                            <li class="lnk wishlist active">
                                                                <a class="text-dark add_in_wish_simple"
                                                                   data-proid="<?php echo e($product->id); ?>"
                                                                   data-status="<?php echo e(inwishlist($product->id)); ?>"
                                                                   data-toggle="tooltip" data-placement="right"
                                                                   title="<?php echo e(__('Wishlist')); ?>" href="javascript:void(0)">
                                                                    <i data-feather="heart"></i>
                                                                </a>
                                                            </li>

                                                        <?php endif; ?>

                                                    <?php endif; ?>
                                                    <li>
                                                        <form method="POST"
                                                              action="<?php echo e($product->type == 'ex_product' ? $product->external_product_link : route('add.cart.simple',['pro_id' => $product->id, 'price' => $product->price, 'offerprice' => $product->offer_price])); ?>"
                                                              class="addSimpleCardFrom<?php echo e($product->id); ?>">
                                                            <?php echo csrf_field(); ?>

                                                            <input name="qty" type="hidden"
                                                                   value="<?php echo e($product->min_order_qty); ?>"
                                                                   max="<?php echo e($product->max_order_qty); ?>"
                                                                   class="qty-section">

                                                            <a href="javascript:"
                                                               onclick="addSimpleProCard(<?php echo e($product->id); ?>)"
                                                               title="<?php echo e(__('Add To Card')); ?>"><i
                                                                        data-feather="briefcase"></i></a>

                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                            <?php if($product['sale_tag'] !== NULL && $product['sale_tag'] != ''): ?>
                                                <div class="featured-product-badge">
                                                <span class="badge" style="background : <?php echo e($product['sale_tag_color']); ?> ; color : <?php echo e($product['sale_tag_text_color']); ?>">
                                                       <?php echo e($product['sale_tag']); ?>

                                                </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="featured-product-dtl">
                                            <div class="row">
                                                <div class="col-xl-8 col-lg-7 col-md-7 col-7">
                                                    <h6 class="featured-product-title truncate">
                                                        <a href="<?php echo e(route('show.product',['id' => $product->id, 'slug' => $product->slug])); ?>">
                                                            <?php echo e($product->product_name); ?>

                                                        </a>
                                                    </h6>










                                                </div>
                                                <div class="col-xl-4 col-lg-5 col-md-5 col-5">
                                                    <div class="featured-product-price">

                                                            <?php if($product->offer_price != 0): ?>


                                                                     <h4 class="text-primary fw-bold" ><?php echo e(price_format($product->offer_price )); ?></h4>


                                                                    <h5 class="text-danger"><del><?php echo e(price_format($product->price )); ?></del></h5>




                                                            <?php else: ?>
                                                            <h4 class="text-primary fw-bold" ><?php echo e(price_format($product->price )); ?></h4>




                                                            <?php endif; ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product End -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function submitForm(varType = '') {
            if (varType) {
                $('.varType').val(varType);
            }
            $('.submitForm').submit();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/pages/all_product.blade.php ENDPATH**/ ?>