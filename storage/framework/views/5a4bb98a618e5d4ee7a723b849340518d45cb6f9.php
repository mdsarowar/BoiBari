
<?php $__env->startSection('title',__('Edit Product :product | ',['product' => $product->product_name])); ?>
<?php $__env->startSection('stylesheet'); ?>
    <link rel="stylesheet" href="<?php echo e(url("/css/lightbox.min.css")); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Edit Product';
  $data['title0'] = 'Product Management';
  $data['title1'] = 'Simple Products';
  $data['title2'] = 'Edit Product';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">

    <div class="row">
       
        <div class="col-lg-12">
            <?php if($errors->any()): ?>
            <div class="alert alert-danger" role="alert">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <p><?php echo e($error); ?><button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
            <div class="card m-b-30">
                
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-10">
                            <h5 class="box-title"><?php echo e(__("Edit Product")); ?> <?php echo e($product->product_name); ?></h5>
                        </div>
                        <div class="col-md-2">
                            <div class="widgetbar">
                            <a href="<?php echo e(route('simple-products.index')); ?>" class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="nav custom-tab-line nav-tabs mb-3" id="defaultTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#productdetails" role="tab" aria-controls="productdetails" aria-selected="true"> <i class="feather icon-edit"></i> <?php echo e(__('Product Details')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="manageinventory-tab" data-toggle="tab" href="#manageinventory" role="tab" aria-controls="manageinventory" aria-selected="false"><i class="feather icon-archive"></i> <?php echo e(__('Manage Inventory')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="cashbacksettings-tab" data-toggle="tab" href="#cashbacksettings" role="tab" aria-controls="cashbacksettings" aria-selected="false"><i class="feather icon-dollar-sign"></i> <?php echo e(__('Cashback Settings')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="productspecifications-tab" data-toggle="tab" href="#productspecifications" role="tab" aria-controls="productspecifications" aria-selected="false"><i class="feather icon-align-right"></i> <?php echo e(__("Product Specifications")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="image-tab" data-toggle="tab" href="#image" role="tab" aria-controls="image" aria-selected="false"><i class="feather icon-rotate-cw"></i> <?php echo e(__("360° Image")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="productfaq-tab" data-toggle="tab" href="#productfaq" role="tab" aria-controls="productfaq" aria-selected="false"><i class="feather icon-help-circle"></i> <?php echo e(__("Product FAQ's")); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="preorder-tab" data-toggle="tab" href="#preorder" role="tab" aria-controls="preorder" aria-selected="false"><i class="feather icon-arrow-up-right"></i> <?php echo e(__("Preorder Configuration")); ?></a>
                        </li>
                    </ul>
                    <div class="tab-content" id="defaultTabContent">
                        <!-- Productdetails start -->
                        <div class="tab-pane fade show active" id="productdetails" role="tabpanel" aria-labelledby="productdetails-tab">
                            <!-- Productdetails form start -->

                            <div class="row">
                                <div class="col-md-9">

                                    <!-- <div class="row"> -->
                                    <form action="<?php echo e(route("simple-products.update",$product->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <!-- <div class="col-md-9"> -->
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Product Name:")); ?> <span class="text-danger">*</span></label>
                                                    <input placeholder="<?php echo e(__("Enter product name")); ?>" required type="text" value="<?php echo e($product->product_name); ?>" class="form-control" name="product_name">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark"> <?php echo e(__("Product Brand:")); ?> <span class="text-danger">*</span> </label>
                                                    <select data-placeholder="Please select brand" required="" name="brand_id" class="select2 form-control">
                                                        <option value="">Please Select</option>
                                                        <?php if(!empty($brands_all)): ?>
                                                        <?php $__currentLoopData = $brands_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e($product['brand_id'] == $brand['id'] ? "selected" : ""); ?> value="<?php echo e($brand->id); ?>"> <?php echo e($brand->name); ?> </option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </select>
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-dark"> <?php echo e(__("Key Features:")); ?> </label>
                                                    <textarea class="form-control editor" id="editor1" name="key_features"><?php echo $product->key_features; ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Product Description:")); ?> <span class="text-danger">*</span></label>
                                                    <textarea placeholder="<?php echo e(__("Enter product details")); ?>" class="editor" name="product_detail" id="editor1" cols="30" rows="10"><?php echo e($product->product_detail); ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Product Category:")); ?> <span class="text-danger">*</span></label>
                                                    <select data-placeholder="<?php echo e(__("Please select category")); ?>" name="category_id" id="category_id" class="form-control select2">
                                                        <option value=""><?php echo e(__("Please select category")); ?></option>
                                                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php echo e($product->category_id == $category->id ? "selected" : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark">Product Subcategory: </label>
                                                    <select data-placeholder="<?php echo e(__('Please select subcategory')); ?>"  name="subcategory_id" id="upload_id" class="form-control select2">
                                                        <option value="">Please Select</option>
                                                       <?php if(isset($product->category->subcategory)): ?>
                                                            <?php $__currentLoopData = $product->category->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option <?php echo e($item->id == $product->subcategory_id ? "selected" : ""); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       <?php endif; ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark"> Childcategory:</label>
                                                    <select data-placeholder="Please select childcategory" name="child_id" id="grand" class="form-control select2">
                                                        <option value="">Please choose</option>
                                                        <?php if(isset($product->subcategory->childcategory)): ?>
                                                            <?php $__currentLoopData = $product->subcategory->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option <?php echo e($item->id == $product->child_id ? "selected" : ""); ?> value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Author:")); ?> <span class="text-danger">*</span></label>
                                                    <select data-placeholder="<?php echo e(__("Please select Author")); ?>" name="author_id" id="author_id" class="form-control select2">
                                                        <option value=""><?php echo e(__("Please select Author")); ?></option>
                                                        <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e($product->author_id == $author->id ? "selected" : ""); ?> value="<?php echo e($author->id); ?>"><?php echo e($author->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Publisher:")); ?> <span class="text-danger">*</span></label>
                                                    <select data-placeholder="<?php echo e(__("Please select Publisher")); ?>" name="publisher_id" id="publisher_id" class="form-control select2">
                                                        <option value=""><?php echo e(__("Please select Publisher")); ?></option>
                                                        <?php $__currentLoopData = $publishers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publisher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e($product->publisher_id == $publisher->id ? "selected" : ""); ?> value="<?php echo e($publisher->id); ?>"><?php echo e($publisher->title); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><?php echo e(__("Select Related Products :")); ?></label>
                                                    <select multiple="multiple" name="other_cats[]" id="other_cats" class="form-control select2">
                                                        <?php $__currentLoopData = $simproducts->where('id','!=',$product->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option <?php echo e($product->other_cats != '' && in_array($category->id,$product->other_cats) ? "selected" : ""); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->product_name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                
                                                    <small class="text-primary">
                                                        <i class="feather icon-help-circle"></i> <?php echo e(__("If in list primary category is also present then it will auto remove from this after create product.")); ?>

                                                    </small>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row">

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark">Price: <span  class="text-danger">*</span></label>
                                                    <input min="0" required type="number" placeholder="0" class="form-control" name="actual_selling_price" step="0.01" value="<?php echo e($product->actual_selling_price); ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark">Offer Price: </label>
                                                    <input min="0" type="number" placeholder="0" class="form-control" name="actual_offer_price" step="0.01" value="<?php echo e($product->actual_offer_price); ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Retail Price :")); ?></label>
                                                    <input min="0" type="text" placeholder="Retail Price" class="form-control" name="retail_price" step="0.01" value="<?php echo e($product->retail_price); ?>">
                                                </div>
                                            </div>


                                        </div>


                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Product Thumbnail Image :")); ?><span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input readonly id="thumbnail" name="thumbnail" type="text" class="form-control">
                                                        <div class="input-group-append">
                                                            <span data-input="thumbnail" class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                                                        </div>
                                                    </div>
                                                    <small class="text-muted">
                                                        <i class="fa fa-question-circle"></i> <?php echo e(__("Please select product thumbnail")); ?>

                                                    </small>
                                                </div>
                                            </div>
                    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Product Hover Thumbnail Image :")); ?><span class="text-danger">*</span></label>
                                                    <div class="input-group">
                                                        <input readonly id="hover_thumbnail" name="hover_thumbnail" type="text" class="form-control">
                                                        <div class="input-group-append">
                                                            <span data-input="hover_thumbnail" class="bg-primary text-light midia-toggle input-group-text"><?php echo e(__('Browse')); ?></span>
                                                        </div>
                                                    </div>
                                                    <small class="text-muted">
                                                        <i class="fa fa-question-circle"></i>
                                                        <?php echo e(__("Please select product hover thumbnail")); ?>

                                                    </small>
                                                </div>
                                            </div>
                    
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark"><?php echo e(__("Other Product Images : ")); ?><span class="text-danger">*</span></label>
                                                    <div class="input-group mb-3">
                                                        <div class="custom-file">
                                                            <input multiple type="file" class="custom-file-input" name="images[]" id="upload_gallery">
                                                            <label class="custom-file-label" for="upload_gallery">
                                                                <?php echo e(__("Multiple images can be selected")); ?>

                                                            </label>
                                                        </div>
                                                    </div>
                                                    <small class="text-muted">
                                                        <i class="fa fa-question-circle"></i> <?php echo e(__("Multiple images can be choosen")); ?>

                                                    </small>
                                                </div>
                                            </div>


                                            <div class="<?php echo e($product->product_file !='' ? '' : 'display-none'); ?> product_file col-md-6">
                                                <div class="form-group">
                                                    <label class="text-dark">Update Product File: <span class="text-danger">*</span></label><br>
                                                    <div class="input-group">
                                                        <input multiple type="file" class="custom-file-input" name="product_file" id="upload_gallery" >
                                                        <label class="custom-file-label" for="upload_gallery"> <?php echo e(__("book pdf selected")); ?> </label>
                                                    </div>
                                                    <small class="text-muted">
                                                        <i class="fa fa-question-circle"></i>
                                                        <?php echo e(__("Max file size is 50 MB")); ?>

                                                    </small>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark">Status :</label><br>
                                                    <label class="switch">
                                                        <input type="checkbox" name="status" <?php echo e($product->status == '1' ? "checked" : ""); ?>>
                                                        <span class="knob"></span>
                                                    </label>
                                                    <br>
                                                    <small class="text-muted">
                                                        <i class="fa fa-question-circle"></i> Toggle the product status
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark">Free Shipping :</label> <br>
                                                    <label class="switch">
                                                        <input type="checkbox" name="free_shipping" <?php echo e($product->free_shipping == '1' ? "checked" : ""); ?>>
                                                        <span class="knob"></span>
                                                    </label>
                                                    <br>
                                                    <small class="text-muted">
                                                        <i class="fa fa-question-circle"></i>
                                                        Toggle to allow free shipping on product.
                                                    </small>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark">Featured :</label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" name="featured" <?php echo e($product->featured == '1' ? "checked" : ""); ?>>
                                                        <span class="knob"></span>
                                                    </label>
                                                    <br>
                                                    <small class="text-muted"><i class="fa fa-question-circle"></i>
                                                        Toggle to
                                                        allow product
                                                        is featured.</b></small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark">Cancel available :</label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" name="cancel_avbl"
                                                            <?php echo e($product->cancel_avbl == '1' ? "checked" : ""); ?>>
                                                        <span class="knob"></span>
                                                    </label>
                                                    <br>
                                                    <small class="text-muted"><i class="fa fa-question-circle"></i>
                                                        Toggle to
                                                        allow product
                                                        cancellation on order.</b></small>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="text-dark">Cash on delivery available :</label>
                                                    <br>
                                                    <label class="switch">
                                                        <input type="checkbox" name="cod_avbl"
                                                            <?php echo e($product->cod_avbl == '1' ? "checked" : ""); ?>>
                                                        <span class="knob"></span>
                                                    </label>
                                                    <br>
                                                    <small class="text-muted"><i class="fa fa-question-circle"></i>
                                                        Toggle to
                                                        allow COD on
                                                        product.</b></small>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-4">

                                                <label class="text-dark" for="">Return Available :</label>
                                                <select data-placeholder="Please choose an option" required=""
                                                    class="form-control select2" id="choose_policy" name="return_avbl">
                                                    <option value="">Please choose an option</option>
                                                    <option <?php echo e($product['return_avbl'] =='1' ? "selected" : ""); ?>

                                                        value="1">
                                                        Return Available</option>
                                                    <option <?php echo e($product['return_avbl'] =='0' ? "selected" : ""); ?>

                                                        value="0">
                                                        Return Not Available</option>
                                                </select>
                                                <br>
                                                <small class="text-desc">(Please choose an option that return will be
                                                    available
                                                    for this product or not)</small>


                                            </div>

                                            <div id="policy"
                                                class="<?php echo e($product['return_avbl'] == 1 ? '' : 'display-none'); ?> form-group col-md-4">
                                                <label class="text-dark">
                                                    Select Return Policy: <span class="text-danger">*</span>
                                                </label>
                                                <select data-placeholder="Please select return policy" name="policy_id"
                                                    class="form-control select2">
                                                    <option value="">Please select return policy</option>

                                                    <?php $__currentLoopData = App\admin_return_product::where('status','1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $policy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option <?php echo e($product['policy_id'] == $policy->id ? "selected" : ""); ?>

                                                        value="<?php echo e($policy->id); ?>"><?php echo e($policy->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban"></i>
                                                <?php echo e(__("Reset")); ?></button>
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>
                                                <?php echo e(__("Update")); ?></button>

                                        </div>
                                        <!-- </div> -->
                                    </form>
                                    <!-- </div> -->

                                </div>
                                <div class="col-md-3">
                                    <div class="bg-primary-rgba shadow-sm text-center rounded ">
                                        <label class="mt-2"><?php echo e(__("Current product thumbnail:")); ?></label>
                                        <a href="<?php echo e(url('images/simple_products/'.$product->thumbnail)); ?>"
                                            data-lightbox="image-1" data-title="<?php echo e($product->thumbnail); ?>">
                                        <img src="<?php echo e(url('images/simple_products/'.$product->thumbnail)); ?>" alt="<?php echo e($product->thumbnail); ?>" class="img-fluid img-thumbnail mb-2"/>
                                        </a>
                                    </div>
                                    
                                    <div class="bg-primary-rgba shadow-sm text-center mt-md-3 rounded">
                                        <label class="mt-2"><?php echo e(__("Current product hover-thumbnail:")); ?></label>
                                        <a href="<?php echo e(url('images/simple_products/'.$product->hover_thumbnail)); ?>"
                                            data-lightbox="image-1" data-title="<?php echo e($product->hover_thumbnail); ?>">
                                            <img src="<?php echo e(url('images/simple_products/'.$product->hover_thumbnail)); ?>"
                                                alt="<?php echo e($product->hover_thumbnail); ?>" class="img-fluid img-thumbnail mb-2">
                                        </a>
                                    </div>

                                    <div class="bg-primary-rgba shadow-sm text-center mt-md-3 rounded">

                                        <label class="mt-2"><?php echo e(__("Product Gallery Images:")); ?></label>
                                        <br>
                                        <?php $__empty_1 = true; $__currentLoopData = $product->productGallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        
                                        <a href="<?php echo e(url('images/simple_products/gallery/'.$gallery->image)); ?>"
                                            data-lightbox="image-1" data-title="<?php echo e($gallery->image); ?>">
                                            <img src="<?php echo e(url('images/simple_products/gallery/'.$gallery->image)); ?>"
                                                alt="<?php echo e($gallery->image); ?>" class="img-fluid pro-img img-thumbnail mb-2">
                                        </a>
                                        <i data-imageid="<?php echo e($gallery->id); ?>" class="text-red fa fa-times stick_close_btn"></i>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <?php echo e(__("No images in product gallery.")); ?>

                                        <?php endif; ?>

                                    </div>

                                    <div class="<?php echo e($product->product_file !='' ? "" : "d-none"); ?> well">

                                        <label><?php echo e(__("Current downloadable Product File:")); ?></label>

                                        <p>
                                            <a href="<?php echo e(storage_path('digitalproducts/files/'.$product->product_file)); ?>"><i
                                                    class="fa fa-download"></i> <?php echo e($product->product_file); ?></a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                            <!-- productdetails form end -->
                        </div>
                        <!-- === productdetails end ======== -->

                        <!-- === manageinventory start ======== -->
                        <div class="tab-pane fade" id="manageinventory" role="tabpanel"
                            aria-labelledby="manageinventory-tab">
                            <!-- === manageinventory form start ======== -->
                            <h6><?php echo e(__("Manage Inventory")); ?></h6>
                            <hr>
                            <form action="<?php echo e(route("manage.inventory",$product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__("Stock")); ?> <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="number" min="0"
                                                value="<?php echo e($product->stock ?? old('stock')); ?>" name="stock">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__("Minimum Order Qty.")); ?> <span
                                                    class="text-danger">*</span></label>
                                            <input min="1" type="text" placeholder="0" class="form-control limit"
                                                name="min_order_qty" step="0.01"
                                                value="<?php echo e($product->min_order_qty ?? old('min_order_qty')); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__("Maxium Order Qty.")); ?></label>
                                            <input min="1" type="text" placeholder="0" class="form-control limit"
                                                name="max_order_qty" step="0.01"
                                                value="<?php echo e($product->max_order_qty ?? old('max_order_qty')); ?>">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban mr-2"></i>
                                        <?php echo e(__("Reset")); ?></button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>
                                        <?php echo e(__("Update")); ?></button>
                                    <!-- <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle mr-2"></i> <?php echo e(__("Update")); ?></button> -->
                                </div>

                            </form>
                            <!-- === manageinventory form end ===========-->
                        </div>
                        <!-- === manageinventory end ======== -->

                        <!-- === cashbacksettings start ======== -->
                        <div class="tab-pane fade" id="cashbacksettings" role="tabpanel"
                            aria-labelledby="cashbacksettings-tab">
                            <!-- === cashbacksettings form start ======== -->
                            <h6><?php echo e(__("Cashback Settings")); ?></h6>
                            <hr>
                            <form action="<?php echo e(route("cashback.save",$product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_type" value="simple_product">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="text-dark"><?php echo e(__('Enable Cashback system :')); ?></label>
                                        <br>
                                        <label class="switch">
                                            <input id="enable" type="checkbox" name="enable"
                                                <?php echo e(isset($cashback_settings) && $cashback_settings->enable =='1' ? "checked" : ""); ?>>
                                            <span class="knob"></span>
                                        </label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark"
                                                for="cashback_type"><?php echo e(__("Select cashback type:")); ?> <span
                                                    class="text-danger">*</span> </label>
                                            <select data-placeholder="<?php echo e(__("Select cashback type")); ?>"
                                                name="cashback_type" class="form-control select2">
                                                <option value=""><?php echo e(__("Select cashback type")); ?></option>
                                                <option
                                                    <?php echo e(isset($cashback_settings) && $cashback_settings->cashback_type == 'fix' ? "selected" : ""); ?>

                                                    value="fix"><?php echo e(__("Fix")); ?></option>
                                                <option
                                                    <?php echo e(isset($cashback_settings) && $cashback_settings->cashback_type == 'per' ? "selected" : ""); ?>

                                                    value="per"><?php echo e(__("Percent")); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="discount_type"><?php echo e(__("Discount type:")); ?>

                                                <span class="text-danger">*</span> </label>
                                            <select data-placeholder="<?php echo e(__("Select discount type")); ?>"
                                                name="discount_type" class="form-control select2">
                                                <option value=""><?php echo e(__("Select cashback type")); ?></option>
                                                <option
                                                    <?php echo e(isset($cashback_settings) && $cashback_settings->discount_type == 'flat' ? "selected" : ""); ?>

                                                    value="flat"><?php echo e(__("Flat")); ?></option>
                                                <option
                                                    <?php echo e(isset($cashback_settings) && $cashback_settings->discount_type == 'upto' ? "selected" : ""); ?>

                                                    value="upto"><?php echo e(__("Upto")); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="text-dark" for="discount"><?php echo e(__("Discount:")); ?> <span
                                                    class="text-danger">*</span> </label>
                                            <input min="0" required type="text" placeholder="0"
                                                class="form-control discount2" name="discount" step="0.01"
                                                value="<?php echo e(isset($cashback_settings) ? $cashback_settings->discount : 0); ?>">

                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <button type="reset" class="btn btn-danger mr-1"><i class="fa fa-ban mr-2"></i>
                                            <?php echo e(__("Reset")); ?></button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>
                                            <?php echo e(__("Update")); ?></button>
                                    </div>

                                </div>

                            </form>
                            <!-- === cashbacksettings form end ===========-->
                        </div>
                        <!-- === cashbacksettings end ======== -->

                        <!-- === productspecifications start ======== -->
                        <div class="tab-pane fade" id="productspecifications" role="tabpanel"
                            aria-labelledby="productspecifications-tab">
                            <!-- === productspecifications form start ======== -->

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- card started -->
                                    <div class="card">
                                        <!-- ========= -->
                                        <!-- to show add button start -->
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-md-7">
                                                    <div class="card-header">
                                                        <h5 class="card-title"><?php echo e(__('Edit Product Specification')); ?>

                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="widgetbar">
                                                        <button type="button"
                                                            class="float-right btn btn-danger-rgba mr-2"
                                                            data-toggle="modal" data-target="#bulk_delete_spec"><i
                                                                class="feather icon-trash mr-2"></i> Delete
                                                            Selected</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- to show add button end -->
                                        <!-- card body started -->
                                        <div class="card-body">
                                            <form action="<?php echo e(route('pro.specs.store',$product->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" value="yes" name="simple_product">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <th>
                                                            <div class="inline">
                                                                <input id="checkboxAll" type="checkbox"
                                                                    class="filled-in" name="checked[]" value="all" />
                                                                <label for="checkboxAll"
                                                                    class="material-checkbox"></label>
                                                            </div>

                                                        </th>
                                                        <th><?php echo e(__('Key')); ?></th>
                                                        <th><?php echo e(__('Value')); ?></th>
                                                        <th>#</th>
                                                    </thead>

                                                    <tbody>
                                                        <?php if(isset($product->specs)): ?>
                                                            <?php $__currentLoopData = $product->specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="inline">
                                                                            <input type="checkbox" form="bulk_delete_form"
                                                                                class="filled-in material-checkbox-input"
                                                                                name="checked[]" value="<?php echo e($spec->id); ?>"
                                                                                id="checkbox<?php echo e($spec->id); ?>">
                                                                            <label for="checkbox<?php echo e($spec->id); ?>"
                                                                                class="material-checkbox"></label>
                                                                        </div>
                                                                    </td>
                                                                    <td><?php echo e($spec->prokeys); ?></td>
                                                                    <td><?php echo e($spec->provalues); ?></td>
                                                                    <td>
                                                                        <a data-toggle="modal" title="Edit"
                                                                            data-target="#edit<?php echo e($spec->id); ?>"
                                                                            class="btn btn-sm btn-info">
                                                                            <i class="fa fa-pencil"></i>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <?php endif; ?>
                                                    </tbody>
                                                </table>
                                                <table class="table table-striped table-bordered" id="dynamic_field">

                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <input required="" name="prokeys[]" type="text"
                                                                    class="form-control" value=""
                                                                    placeholder="Product Attribute">
                                                            </td>
                                                            <td>
                                                                <input required="" name="provalues[]" type="text"
                                                                    class="form-control" value=""
                                                                    placeholder="Attribute Value">
                                                            </td>
                                                            <td>
                                                                <button type="button" name="add" id="add"
                                                                    class="btn btn-xs btn-success"><i
                                                                        class="fa fa-plus"></i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>

                                                </table>
                                                <div class="form-group">
                                                    <button type="reset" class="btn btn-danger mr-1"><i
                                                            class="fa fa-ban mr-2"></i><?php echo e(__("Reset")); ?></button>
                                                    <button type="submit" class="btn btn-primary"><i
                                                            class="fa fa-check-circle mr-2"></i><?php echo e(__("Add")); ?></button>
                                                    <!-- <button class="btn btn-primary btn-md"><i class="fa fa-plus"></i> Add</button> -->
                                                </div>
                                            </form>

                                            <?php if(isset($product->specs)): ?>
                                            <?php $__currentLoopData = $product->specs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spec): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div id="edit<?php echo e($spec->id); ?>" class="delete-modal modal fade" role="dialog">
                                                <div class="modal-dialog modal-md">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="modal-title">Edit : <b><?php echo e($spec->prokeys); ?></b>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo e(route('pro.specs.update',$spec->id)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>

                                                                <div class="form-group">
                                                                    <label class="text-dark">Attribute Key:</label>
                                                                    <input required="" type="text" name="pro_key"
                                                                        value="<?php echo e($spec->prokeys); ?>"
                                                                        class="form-control">
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="text-dark">Attribute Value:</label>
                                                                    <input required="" type="text" name="pro_val"
                                                                        value="<?php echo e($spec->provalues); ?>"
                                                                        class="form-control">
                                                                </div>

                                                                <button type="reset" class="btn btn-danger mr-1"><i
                                                                        class="fa fa-ban mr-2"></i><?php echo e(__("Reset")); ?></button>
                                                                <button type="submit" class="btn btn-primary"><i
                                                                        class="fa fa-check-circle mr-2"></i><?php echo e(__("Update")); ?></button>



                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </div><!-- card body end -->
                                    </div><!-- card end -->
                                </div><!-- col end -->
                            </div><!-- row end -->
                            <!-- === productspecifications form end ===========-->
                        </div>
                        <!-- === productspecifications end ======== -->

                        <!-- === image start ======== -->
                        <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">
                            <!-- === image form start ======== -->
                            <div class="row">
                                <div class="col-md-6">
                                    <form action="<?php echo e(route("upload.360",$product->id)); ?>" method="post"
                                        enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label class="text-dark"><?php echo e(__("Upload Product 360° Image")); ?> <span
                                                    class="text-danger">*</span> </label>
                                            <!-- ------ -->
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroupFileAddon01">Upload</span>
                                                </div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="360_image[]"
                                                        id="inputGroupFile01" aria-describedby="inputGroupFileAddon01"
                                                        required>
                                                    <label class="custom-file-label" for="inputGroupFile01">Choose
                                                        file</label>
                                                </div>

                                            </div>
                                            <small><?php echo e(__("You can upload 20 images at a time.")); ?></small>

                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="feather icon-upload mr-2"></i>
                                                <?php echo e(__("Upload")); ?></button>
                                        </div>
                                    </form>

                                    <?php $__empty_1 = true; $__currentLoopData = $product->frames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $frame): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                                    <div class="well">
                                        <div class="row">

                                            <div class="col-md-2">
                                                <a href="<?php echo e(url('images/simple_products/360_images/'.$frame->image)); ?>"
                                                    data-lightbox="image-1" data-title="<?php echo e($frame->image); ?>">
                                                    <img width="50px"
                                                        src="<?php echo e(url('images/simple_products/360_images/'.$frame->image)); ?>"
                                                        alt="<?php echo e($frame->image); ?>" class=" img-thumbnail" />
                                                </a>
                                            </div>

                                            <div class="col-md-8">
                                                <b><?php echo e($frame->image); ?></b>
                                            </div>

                                            <div class="col-md-2">
                                                <i data-imageid="<?php echo e($frame->id); ?>"
                                                    class="delete_image_360 text-red fa fa-trash fa-2x"></i>
                                            </div>

                                        </div>
                                    </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php echo e(__("No frames found !")); ?>

                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label class="text-dark"><?php echo e(__("Current Image:")); ?></label>

                                    <?php if($product->frames()->count()): ?>
                                    <div id='mySpriteSpin'></div>
                                    <?php else: ?>
                                    <div class="well">
                                        <h4>
                                            <?php echo e(__("No preview available...")); ?>

                                        </h4>
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                            <!-- === image form end ===========-->
                        </div>
                        <!-- === image end ======== -->

                        <!-- === productfaq start ======== -->
                        <div class="tab-pane fade" id="productfaq" role="tabpanel" aria-labelledby="productfaq-tab">
                            <!-- === productfaq form start ======== -->

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- card started -->
                                    <div class="card">
                                        <!-- ========= -->
                                        <!-- to show add button start -->
                                        <div class="card-header">
                                            <div class="row align-items-center">
                                                <div class="col-md-7">

                                                </div>
                                                <div class="col-md-5">
                                                    <div class="widgetbar">
                                                        <a data-toggle="modal" data-target="#addFAQ"
                                                            class="float-right btn btn-primary-rgba mr-2"><i
                                                                class="feather icon-plus mr-2"></i> Add FAQ</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- to show add button end -->
                                        <!-- card body started -->
                                        <div class="card-body">
                                            <!-- table to display language start -->
                                            <table id="" class="table table-striped table-bordered">
                                                <thead>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Question</th>
                                                    <th>Answer</th>
                                                    <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $product->faq; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td><?php echo e($key+1); ?></td>
                                                        <td><?php echo e($f->simpleproduct->product_name); ?></td>
                                                        <td><?php echo e($f->question); ?></td>
                                                        <td><?php echo $f->answer; ?></td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-round btn-outline-primary"
                                                                    type="button" id="CustomdropdownMenuButton1"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="feather icon-more-vertical-"></i></button>
                                                                <div class="dropdown-menu"
                                                                    aria-labelledby="CustomdropdownMenuButton1">

                                                                    <a class="dropdown-item btn btn-link"
                                                                        data-toggle="modal"
                                                                        data-target="#editfaq<?php echo e($f->id); ?>">
                                                                        <i
                                                                            class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?>

                                                                    </a>
                                                                    <a class="dropdown-item btn btn-link"
                                                                        data-toggle="modal"
                                                                        data-target="#delete<?php echo e($f->id); ?>">
                                                                        <i
                                                                            class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?>

                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <!-- edit Modal start -->
                                                            <div class="modal fade" id="editfaq<?php echo e($f->id); ?>"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="exampleStandardModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleStandardModalLabel">Edit FAQ:
                                                                                <?php echo e($f->question); ?></h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <!-- form start -->
                                                                            <form
                                                                                action="<?php echo e(route('product_faq.update',$f->id)); ?>"
                                                                                class="form" method="POST" novalidate
                                                                                enctype="multipart/form-data">
                                                                                <?php echo e(method_field("PUT")); ?>

                                                                                <?php echo csrf_field(); ?>

                                                                                <!-- row start -->
                                                                                <div class="row">

                                                                                    <!-- Question -->
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="text-dark"><?php echo e(__('Question :')); ?>

                                                                                                <span
                                                                                                    class="text-danger">*</span></label>
                                                                                            <input required=""
                                                                                                type="text"
                                                                                                name="question"
                                                                                                value="<?php echo e($f->question); ?>"
                                                                                                class="form-control">
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- Answer -->
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <label
                                                                                                class="text-dark"><?php echo e(__('Answer :')); ?>

                                                                                                <span
                                                                                                    class="text-danger">*</span></label>
                                                                                            <textarea required=""
                                                                                                cols="10"
                                                                                                id="answerarea"
                                                                                                name="answer" rows="5"
                                                                                                class="form-control editor"><?php echo e($f->answer); ?></textarea>
                                                                                            <input type="hidden"
                                                                                                readonly name="pro_id"
                                                                                                value="<?php echo e($product->id); ?>">
                                                                                            <small class="text-muted"><i
                                                                                                    class="fa fa-question-circle"></i>
                                                                                                Please enter answer for
                                                                                                above question !
                                                                                            </small>
                                                                                        </div>
                                                                                    </div>

                                                                                    <!-- save button -->
                                                                                    <div class="col-md-12">
                                                                                        <div class="form-group">
                                                                                            <button type="submit"
                                                                                                class="btn btn-primary"><i
                                                                                                    class="fa fa-check-circle"></i>
                                                                                                <?php echo e(__("save")); ?></button>
                                                                                            <button type="button"
                                                                                                class="btn btn-danger"
                                                                                                data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                                                        </div>
                                                                                    </div>

                                                                                </div><!-- row end -->

                                                                            </form>
                                                                            <!-- form end -->
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- edit Modal end -->

                                                            <!-- delete Modal start -->
                                                            <div class="modal fade bd-example-modal-sm"
                                                                id="delete<?php echo e($f->id); ?>" tabindex="-1" role="dialog"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-sm">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="exampleSmallModalLabel"><?php echo e(__("DELETE")); ?></h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4 class="modal-heading">Are You Sure ?
                                                                            </h4>
                                                                            <p>Do you really want to delete this faq?
                                                                                This process cannot be undone.</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <form method="post"
                                                                                action="<?php echo e(url('admin/product_faq/'.$f->id)); ?>"
                                                                                class="pull-right">
                                                                                <?php echo e(csrf_field()); ?>

                                                                                <?php echo e(method_field("DELETE")); ?>

                                                                                <button type="reset"
                                                                                    class="btn btn-secondary"
                                                                                    data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary"><?php echo e(__("YES")); ?></button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- delete Model ended -->
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                            <!-- table to display language data end -->

                                            <!-- create faq Modal start -->
                                            <div class="modal fade" id="addFAQ" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleStandardModalLabel">
                                                                <?php echo e(__('Add new FAQ')); ?></h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- form start -->
                                                            <form action="<?php echo e(url('admin/product_faq')); ?>" class="form"
                                                                method="POST" novalidate enctype="multipart/form-data">
                                                                <?php echo csrf_field(); ?>

                                                                <!-- row start -->
                                                                <div class="row">

                                                                    <!-- Question -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="text-dark"><?php echo e(__('Question :')); ?>

                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <input type="text" name="question"
                                                                                value="<?php echo e(old('question')); ?>"
                                                                                class="form-control">
                                                                            <small class="text-muted"><i
                                                                                    class="fa fa-question-circle"></i>
                                                                                Please write question !</small>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Answer -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label
                                                                                class="text-dark"><?php echo e(__('Answer :')); ?>

                                                                                <span
                                                                                    class="text-danger">*</span></label>
                                                                            <textarea cols="10" id="detail"
                                                                                name="answer" rows="5"
                                                                                class="editor form-control"><?php echo e(old('answer')); ?></textarea>
                                                                            <input type="hidden" readonly name="pro_id"
                                                                                value="<?php echo e($product->id); ?>">
                                                                            <small class="text-muted"><i
                                                                                    class="fa fa-question-circle"></i>
                                                                                Please enter answer for above question !
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" value="1" name="simple_product"/>
                                                                    <!-- save button -->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">

                                                                            <button type="submit"
                                                                                class="btn btn-primary-rgba"><i
                                                                                    class="feather icon-save"></i>
                                                                                <?php echo e(__("Save")); ?></button>
                                                                            <button type="button" class="btn btn-danger-rgba"
                                                                                data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                                                                        </div>
                                                                    </div>

                                                                </div><!-- row end -->

                                                            </form>
                                                            <!-- form end -->
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- create faq Modal end -->

                                        </div><!-- card body end -->
                                    </div><!-- card end -->
                                </div><!-- col end -->
                            </div><!-- row end -->
                            <!-- === productfaq form end ===========-->
                        </div>
                        <!-- === productfaq end ======== -->

                        <div class="tab-pane fade" id="preorder" role="tabpanel" aria-labelledby="preorder-tab">

                            <div class="alert alert-primary">
                                <i class="feather icon-info"></i> <b><?php echo e(__("About Preorder")); ?></b>
                                <ul>
                                    <li>
                                        <?php echo e(__("If you set this product as pre-order then this product will display in front with badge call 'Pre-order'.")); ?>

                                    </li>
                                    <li><?php echo e(__("After enabling the pre-order you can set pre-order payment as partial payment or full payment.")); ?></li>
                                    <li>
                                        <?php echo e(__("If you set product payment as partial payment and your product price is $100 and you set 5% partial payment percentage then customer will pay $5 only and rest $95 will pay by him/her once the product is available in stock.")); ?>

                                    </li>
                                </ul>
                            </div>

                            <form action="<?php echo e(route('preorder.settings',$product->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label><?php echo e(__("Available for pre-order ?")); ?></label>
                                        <br>
                                        <label class="switch">
                                            <input class="pre_order" id="pre_order" type="checkbox" name="pre_order"
                                            <?php echo e($product->pre_order == '1' ? "checked" : ""); ?>>
                                            <span class="knob"></span>
                                        </label>
                                    </div>
        
                                    <div style="display: <?php echo e($product->pre_order == '1' ? "block" : "none"); ?>;" class="preShow form-group col-6">
                                        <label><?php echo e(__("Select pre-order type:")); ?> <span class="text-danger">*</span></label>
                                        <select name="preorder_type" id="preorder_type" class="preorder_type form-control select2">
                                            <option <?php echo e($product->preorder_type == "partial" ? "selected" : ""); ?> value="partial"><?php echo e(__("Partial Payment")); ?></option>
                                            <option <?php echo e($product->preorder_type == "full" ? "selected" : ""); ?>  value="full"><?php echo e(__("Full Payment")); ?></option>
                                        </select>
                                    </div>
        
                                    <div id="partial_payment_per" style="display: <?php echo e($product->pre_order == '1' && $product->preorder_type == "partial" ? "block" : "none"); ?>;" class="preShow form-group col-6">
                                        <label><?php echo e(__("Partial payment in %:")); ?> <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input required placeholder="<?php echo e(__("1")); ?>" type="number" min="1" class="form-control" name="partial_payment_per" value="<?php echo e($product->partial_payment_per); ?>">
                                            <span class="input-group-text">
                                                <i class="feather icon-percent"></i>
                                            </span>
                                        </div>
                                    </div>
        
                                    <div style="display: <?php echo e($product->pre_order == '1' ? "block" : "none"); ?>;" class="preShow form-group col-6">
                                        <label><?php echo e(__("Product available on:")); ?> <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input required id="default-date" placeholder="<?php echo e(now()->addDays(7)->format('Y-m-d')); ?>" value="<?php echo e(date('Y-m-d',strtotime($product->product_avbl_date)) ?? ''); ?>" type="text" class="form-control" name="product_avbl_date">
                                            <span class="input-group-text">
                                                <i class="feather icon-calendar"></i>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="form-group col-12">
                                        <button class="btn btn-md btn-primary-rgba">
                                           <i class="feather icon-save"></i> <?php echo e(__("Update")); ?>

                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                        </div>


                    </div>
                </div><!-- card body end -->

            </div>
        </div>
    </div>
</div>
</div>

<!-- Bulk Delete Modal -->
<div id="bulk_delete_spec" class="delete-modal modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="delete-icon"></div>
        </div>
        <div class="modal-body text-center">
          <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
          <p>Do you really want to delete these products? This process cannot be undone.</p>
        </div>
        <div class="modal-footer">
          <form id="bulk_delete_form" method="post" action="<?php echo e(route('pro.specs.delete',$product->id)); ?>">
            <?php echo csrf_field(); ?>
            <?php echo e(method_field('DELETE')); ?>

            <button type="reset" class="btn btn-gray translate-y-3" data-dismiss="modal"><?php echo e(__("NO")); ?></button>
            <button type="submit" class="btn btn-danger"><?php echo e(__("YES")); ?></button>
          </form>
        </div>
      </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script src='<?php echo e(url('js/lightbox.min.js')); ?>' type='text/javascript'></script>
<script src='//unpkg.com/spritespin@x.x.x/release/spritespin.js' type='text/javascript'></script>
<script src="//unpkg.com/axios/dist/axios.min.js"></script>
<script>
    $("#mySpriteSpin").spritespin({
        // path to the source images.
        frames: 35,
        animate: true,
        responsive: false,
        loop: false,
        orientation: 180,
        reverse: false,
        detectSubsampling: true,
        source: [
            <?php if($product->frames()->count()): ?>
            <?php $__currentLoopData = $product->frames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $frames): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e(url('images/simple_products/360_images/'.$frames->image)); ?>",
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        ],
        width: 700, // width in pixels of the window/frame
        height: 600, // height in pixels of the window/frame
    });

    $('.stick_close_btn').on('click', function () {

        var action = confirm('Are your sure ?');

        if (action == true) {
            var imageid = $(this).data('imageid');

            axios.post('<?php echo e(url("delete/gallery/image/")); ?>', {
                id: imageid
            }).then(res => {

                alert(res.data.msg);
                location.reload();

            }).catch(err => {
                alert(err);
                return false;
            });
        } else {

            alert('Delete cancelled !');
            return false;

        }

    });

    $('.delete_image_360').on('click', function () {

        var action = confirm('Are your sure ?');

        if (action == true) {
            var imageid = $(this).data('imageid');

            axios.post('<?php echo e(route("delete.360")); ?>', {
                id: imageid
            }).then(res => {

                alert(res.data.msg);
                location.reload();

            }).catch(err => {
                alert(err);
                return false;
            });
        } else {

            alert('Delete cancelled !');
            return false;

        }

    });

    $('.pre_order').on('change',function(){

        if($(this).is(':checked')){

            $("select[name='preorder_type']").attr('required','required');
            $('input[name="product_avbl_date"]').attr('required','required');
            $('.preShow').show();

        }else{

            $("select[name='preorder_type']").removeAttr('required','required');
            $('input[name="product_avbl_date"]').removeAttr('required','required');
            $('.preShow').hide();

        }

    });

    $('.preorder_type').on('change',function(){
        var val = $(this).val();

        if(val == 'partial'){

            $('input[name="partial_payment_per"]').attr('required','required');
            $('#partial_payment_per').show();


        }else{

            $('input[name="partial_payment_per"]').removeAttr('required','required');
            $('#partial_payment_per').hide();

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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/simpleproducts/edit.blade.php ENDPATH**/ ?>