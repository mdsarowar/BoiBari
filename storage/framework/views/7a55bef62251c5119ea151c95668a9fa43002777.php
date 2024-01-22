
<?php $__env->startSection('title',__('Create new product | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Create New Product';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'Simple Products';
  $data['title2'] = 'Create New Product';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">
    <div class="row">

        <div class="col-lg-12">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger" role="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p>
                    <?php echo e($error); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
            <div class="card m-b-30">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-lg-10">
                            <h5 class="card-title"> <?php echo e(__("Create New Product")); ?></h5>
                        </div>
                        <div class="col-md-2">
                            <div class="widgetbar">
                            <a href="<?php echo e(route('simple-products.index')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body ml-2">
                    <!-- main content start -->
                    <form action="<?php echo e(route("simple-products.store")); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Type : ")); ?><span class="text-danger">*</span></label>
                                    <select required data-placeholder="<?php echo e(__("Please select product type")); ?>" name="type" id="product_type" class="select2 product_type form-control">
                                        <option value=""><?php echo e(__("Please select product type")); ?></option>
                                        <option <?php echo e(old('type') == 'simple_product' ? "selected" : ""); ?> value="simple_product" selected ><?php echo e(__("Simple Product")); ?> </option>


                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Name : ")); ?><span class="text-danger">*</span></label>
                                    <input placeholder="<?php echo e(__("Enter product name")); ?>" required type="text" value="<?php echo e(old('product_name')); ?>" class="form-control" name="product_name">
                                </div>
                            </div>

                            <div class="ex_pro_link display-none col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Link : ")); ?></label>
                                    <input placeholder="<?php echo e(__("Enter product link: https:// ")); ?>" type="text" value="<?php echo e(old('external_product_link')); ?>" class="form-control" name="external_product_link">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Brand :")); ?> <span class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please Select")); ?>" required="" name="brand_id" class="select2 form-control">
                                        <option value=""><?php echo e(__("Please Select")); ?></option>
                                        <?php if(!empty($brands_all)): ?>
                                        <?php $__currentLoopData = $brands_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($brand->id); ?>"
                                            <?php echo e($brand->id == old('brand_id') ? 'selected="selected"' : ''); ?>>
                                            <?php echo e($brand->name); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>















                        </div>

                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Key Features :")); ?></label>
                            <textarea id="editor1" class="form-control" name="key_features"><?php echo old('key_features'); ?></textarea>
                        </div>

                        <div class="form-group">
                            <label class="text-dark"><?php echo e(__("Product Description : ")); ?><span class="text-danger">*</span></label>
                            <textarea placeholder="<?php echo e(__("Enter product details")); ?>" class="editor" name="product_detail" id="editor1" cols="30" rows="10"><?php echo e(old('product_detail')); ?></textarea>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Category :")); ?><span class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please select category")); ?>" name="category_id" id="category_id" class="form-control select2">
                                        <option value=""><?php echo e(__("Please select category")); ?></option>
                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Subategory :")); ?></label>
                                    <select data-placeholder="Please select subcategory"  name="subcategory_id" id="upload_id" class="form-control select2">
                                        <option value=""><?php echo e(__("Please Select")); ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Childcategory :")); ?></label>
                                    <select data-placeholder="Please select childcategory" name="child_id" id="grand" class="form-control select2">
                                        <option value=""><?php echo e(__("Please Select")); ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Author :")); ?><span class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please select Author")); ?>" name="author_id" id="author_id" class="form-control select2">
                                        <option value=""><?php echo e(__("Please select Author")); ?></option>
                                        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($author->id); ?>"><?php echo e($author->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Publisher :")); ?><span class="text-danger">*</span></label>
                                    <select data-placeholder="<?php echo e(__("Please select Publisher")); ?>" name="publisher_id" id="publisher_id" class="form-control select2">
                                        <option value=""><?php echo e(__("Please select Publisher")); ?></option>
                                        <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($publisher->id); ?>"><?php echo e($publisher->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label><?php echo e(__("Select Related Products :")); ?></label>
                                    <select multiple="multiple" name="other_cats[]" id="other_cats" class="form-control select2">
                                        <?php $__currentLoopData = $simproducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option  <?php echo e(old('other_cats') != '' && in_array($category->id,old('other_cats')) ? "selected" : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->product_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <small class="text-primary">
                                        <i class="feather icon-help-circle"></i> <?php echo e(__("If in list primary category is also present then it will auto remove from this after create product.")); ?>

                                    </small>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Stock")); ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" min="0" name="stock" value="<?php echo e(old('stock')); ?>">
                                </div>
                            </div>











































































                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Price :")); ?><span class="text-danger">*</span></label>
                                    <input min="0" required type="text" placeholder="0" class="form-control" name="actual_selling_price" step="0.01" value="<?php echo e(old('actual_selling_price')); ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Offer Price :")); ?></label>
                                    <input min="0" type="text" placeholder="0" class="form-control" name="actual_offer_price" step="0.01" value="<?php echo e(old('actual_offer_price')); ?>">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Retail Price :")); ?></label>
                                    <input min="0" type="text" placeholder="Retail Price" class="form-control" name="retail_price" step="0.01" value="<?php echo e(old('retail_price')); ?>">
                                </div>
                            </div>
































                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Thumbnail Image :")); ?><span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input required readonly id="thumbnail" name="thumbnail" type="text" class="form-control">
                                        <div class="input-group-append">
                                            <span data-input="thumbnail" class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                                        </div>
                                    </div>
                                    <small class="text-muted">
                                        <i class="fa fa-question-circle"></i> <?php echo e(__("Please select product thumbnail")); ?>

                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Product Hover Thumbnail Image :")); ?><span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input required readonly id="hover_thumbnail" name="hover_thumbnail" type="text" class="form-control">
                                        <div class="input-group-append">
                                            <span data-input="hover_thumbnail" class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                                        </div>
                                    </div>
                                    <small class="text-muted"> 
                                        <i class="fa fa-question-circle"></i><?php echo e(__("Please select product hover thumbnail")); ?>

                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Other Product Images : ")); ?><span class="text-danger">*</span></label>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input multiple type="file" class="custom-file-input" name="images[]" id="upload_gallery" required>
                                            <label class="custom-file-label" for="upload_gallery"> <?php echo e(__("Multiple images can be selected")); ?> </label>
                                        </div>
                                    </div>
                                    <small class="text-muted">
                                        <i class="fa fa-question-circle"></i> <?php echo e(__("Multiple images can be choosen")); ?>

                                    </small>
                                </div>
                            </div>



                        <div class="row">

                            <div class="product_file display-none col-md-3">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Downloadable Product File :")); ?> <span class="text-danger">*</span></label><br>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input multiple type="file" class="custom-file-input" name="product_file" id="upload_gallery" required>
                                            <label class="custom-file-label" for="upload_gallery"> <?php echo e(__("book pdf selected")); ?> </label>
                                        </div>




                                    </div>

                                    <small class="text-muted">
                                        <i class="fa fa-question-circle"></i> <?php echo e(__("Max file size is 50 MB")); ?>

                                    </small>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Status :")); ?></label><br>
                                    <label class="switch">
                                        <input type="checkbox" name="status" <?php echo e(old('status') == '1' ? "checked" : ""); ?>>
                                        <span class="knob"></span>
                                    </label><br>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("Toggle the product status")); ?></b></small>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Free Shipping :")); ?></label> <br>
                                    <label class="switch">
                                        <input type="checkbox" name="free_shipping" <?php echo e(old('free_shipping') == '1' ? "checked" : ""); ?>>
                                        <span class="knob"></span>
                                    </label> <br>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("Toggle to allow free shipping on product.")); ?></b></small>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Featured :")); ?></label> <br>
                                    <label class="switch">
                                        <input type="checkbox" name="featured" <?php echo e(old('featured') == '1' ? "checked" : ""); ?>>
                                        <span class="knob"></span>
                                    </label>
                                    <br>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("Toggle to allow product is featured.")); ?></b></small>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Cancel available :")); ?></label> <br>
                                    <label class="switch">
                                        <input type="checkbox" name="cancel_avbl" <?php echo e(old('cancel_avbl') == '1' ? "checked" : ""); ?>>
                                        <span class="knob"></span>
                                    </label>
                                    <br>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("Toggle to allow product cancellation on order.")); ?></b></small>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="text-dark"><?php echo e(__("Cash on delivery available :")); ?></label><br>
                                    <label class="switch">
                                        <input type="checkbox" name="cod_avbl" <?php echo e(old('cod_avbl') == '1' ? "checked" : ""); ?>>
                                        <span class="knob"></span>
                                    </label>
                                    <br>
                                    <small class="text-muted"><i class="fa fa-question-circle"></i> <?php echo e(__("Toggle to allow COD on product.")); ?></b></small>
                                </div>
                            </div>

                            <div class="last_btn col-md-4">
                                <div class="form-group">
                                    <label class="text-dark" for=""><?php echo e(__("Return Available :")); ?></label>
                                    <br>
                                    <label class="switch" onchange="return_avbls()">
                                        <input class="slider return_avbls" type="checkbox" name="return_avbls" <?php echo e(old('return_avbls') ? 'checked' : ""); ?> />
                                        <span class="knob"></span>
                                    </label>
                                    <br>
                                    <small class="text-desc">(<?php echo e(__("Please choose an option that return will be available for this product or not")); ?>)</small>
                                </div>
                            </div>

                            <div id="return_policy" class="form-group col-md-4">
                                <label class="text-dark"> <?php echo e(__("Select Return Policy :")); ?> <span class="text-danger">*</span></label>
                                <select data-placeholder="<?php echo e(__("Please select return policy")); ?>" name="return_policy" class="form-control choose_policy select2">
                                    <option value=""><?php echo e(__("Please select return policy")); ?></option>
                                    <?php $__currentLoopData = App\admin_return_product::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e(old('policy_id') == $policy->id ? "selected" : ""); ?> value="<?php echo e($policy->id); ?>"><?php echo e($policy->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>


                        <div class="col-md-offset-1 col-md-10 form-group">
                            <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle"></i> <?php echo e(__("Create")); ?></button>
                        </div>

                 </form>
                <!-- main content end -->
            </div>
        </div>
    </div>
</div>



</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
    $('.product_type').on('change', function () {

        var type = $(this).val();

        if (type == 'd_product') {

            $('.ex_pro_link').addClass('display-none');
            $('.product_file').removeClass('display-none');
            $("input[product_file]").attr('required', 'required');
            $("input[external_product_link]").removeAttr('required', 'required');


        } else if (type == 'ex_product') {

            $('.ex_pro_link').removeClass('display-none');
            $('.product_file').addClass('display-none');
            $("input[product_file]").removeAttr('required', 'required');
            $("input[external_product_link]").attr('required', 'required');

        } else {

            $('.ex_pro_link').addClass('display-none');
            $('.product_file').addClass('display-none');
            $("input[product_file]").removeAttr('required', 'required');
            $("input[external_product_link]").removeAttr('required', 'required');
        }

    });

    $(".midia-toggle").midia({
        base_url: '<?php echo e(url('')); ?>',
        directory_name: 'simple_products',
        dropzone : {
            acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif'
        }
    });

    $(".file-toggle").midia({
        base_url: '<?php echo e(url('')); ?>',
        directory_name: 'product_files',
        dropzone : {
            acceptedFiles: '.jpg,.png,.jpeg,.webp,.bmp,.gif,.pdf,.docx,.doc'
        }
    });
</script>
<script>
    $("#return_policy").hide();
    function return_avbls() {
        if($(".return_avbls").prop('checked')){
        $("#return_policy").show();
        } else {
        $("#return_policy").hide();
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/simpleproducts/create.blade.php ENDPATH**/ ?>