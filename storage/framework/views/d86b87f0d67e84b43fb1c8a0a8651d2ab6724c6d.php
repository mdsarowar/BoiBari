
<?php $__env->startSection('title',__("Edit Store |")); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Edit Store';
  $data['title0'] = 'Stores & Products';
  $data['title1'] = 'All Stores';
  $data['title2'] = 'Edit Store';
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
            <div class="col-lg-8">
              <h5 class="box-title"><?php echo e(__("Edit Store")); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a href=" <?php echo e(url('admin/stores')); ?> " class="btn btn-primary-rgba"><i class="feather icon-arrow-left mr-2"></i><?php echo e(__("Back")); ?></a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
         <!-- main content start -->

         <!-- form start -->
         <form action="<?php echo e(url('admin/stores/'.$store->id)); ?>" class="form" method="POST" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <?php echo e(method_field('PUT')); ?>

                       
                    <div class="row">

                    <div class="col-md-4">
                    <div class="form-group">
                      <label class="text-dark">
                        <?php echo e(__('Store ID')); ?>:
                      </label>
                      <input class="form-control" type="text" readonly value="<?php echo e($store->uuid ?? "Not set"); ?>">
                      <small class="text-muted">
                        <i class="fa fa-question-circle"></i> <?php echo e(__('If you did not see store id hit update button to get it.')); ?>

                      </small>
                    </div>
                    </div>

                    <!-- storeOwner -->
                    <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Store Owner')); ?> : <span class="text-danger">*</span></label>
                                <select class="select2 form-control" name="user_id" required>
                                  <option value=""><?php echo e(__("Please Choose Store Owner")); ?></option>
                                  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <optgroup label="<?php echo e($user->email); ?>">
                                    <option <?php echo e($store->user_id == $user->id ? "selected" : ""); ?>  value="<?php echo e($user->id); ?>"> <?php echo e($user->name); ?></option>
                                    </optgroup>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <small>
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Choose Store Owner')); ?>

                                </small>
                          </div>
                      </div>
                      
                      <!-- Store name -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Store Name :')); ?> <span class="text-danger">*</span></label>
                              <input type="text" value="<?php echo e($store->name); ?>" autofocus="" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter Page Name')); ?>" name="name" required="">
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Enter Store Name')); ?>

                              </small>
                          </div>
                      </div>

                      <!-- email -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Business Email :')); ?> <span class="text-danger">*</span></label>
                              <input type="text" value="<?php echo e($store->email); ?>" autofocus="" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Please enter buisness email')); ?>" name="email" required="">
                              <small>
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please enter buisness email')); ?>

                              </small>
                          </div>
                      </div>

                      <!-- VAT/GSTIN No: -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('VAT/GSTIN No :')); ?> </label>
                              <input type="text" value="<?php echo e($store->vat_no); ?>" autofocus="" class="form-control <?php $__errorArgs = ['vat_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Please enter your GSTIN/VAT No.')); ?>" name="vat_no">
                              <small>
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please enter valid GSTIN/VAT No.')); ?>

                              </small>
                          </div>
                      </div>

                      <!-- Phone -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Phone :')); ?> </label>
                              <input pattern="[0-9]+" title="<?php echo e(__("Invalid phone no.")); ?>" placeholder="<?php echo e(__('Please enter Phoneno.')); ?>" type="text" id="first-name" name="phone" value="<?php echo e($store->phone); ?>" class="form-control">
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please enter Phoneno.')); ?>

                              </small>
                          </div>
                      </div>

                      <!-- Mobile -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Mobile :')); ?> <span class="text-danger">*</span></label>
                              <input pattern="[0-9]+" title="Invalid mobile no." placeholder="Please enter mobile no." type="text" id="first-name" name="mobile" class="form-control" value="<?php echo e($store->mobile); ?>">
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please select Mobile no.')); ?>

                              </small>
                          </div>
                      </div>

                        <!-- Country -->
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Country')); ?> : <span class="text-danger">*</span></label>
                              <select data-placeholder="<?php echo e(__('Please select country')); ?>" name="country_id" id="country_id" class="form-control select2 col-md-7 col-xs-12">
                                <option value="0"><?php echo e(__("Please Choose")); ?></option>
                                <?php $__currentLoopData = $countrys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                              $iso3 = $country->country;
                
                                              $country_name = DB::table('allcountry')->
                                              where('iso3',$iso3)->first();
                
                                               ?>
                                <option <?php echo e($store->country_id == $country_name->id ? 'selected' : ""); ?> value="<?php echo e($country_name->id); ?> "><?php echo e($country_name->nicename); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
              
                              <small>
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please select country')); ?>

                              </small>
                          </div>
                      </div>

                      <!-- state -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('State')); ?> : <span class="text-danger">*</span></label>
                              <select data-placeholder="<?php echo e(__('Please select state')); ?>" required name="state_id" id="upload_id" class="select2 form-control">
  
                                <option value=""><?php echo e(__("Please Choose")); ?></option>
                                <?php $__currentLoopData = $store->country->states; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $state): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option <?php echo e($store->state_id != 0 && $store->state_id == $state->id ? "selected" : ""); ?> value="<?php echo e($state->id); ?>"><?php echo e($state->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please select state')); ?>

                              </small>
                          </div>
                      </div>

                      <!-- city -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('City')); ?> : <span class="text-danger">*</span></label>
                              <select data-placeholder="<?php echo e(__('Please select city')); ?>" required name="city_id" id="city_id" class="select2 form-control">
                                <option value=""><?php echo e(__("Please Choose")); ?></option>
                                <?php if(isset($store->state->city)): ?>
                                    <?php $__currentLoopData = $store->state->city; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option <?php echo e($store->city_id != 0 && $store->city_id == $city->id ? "selected" : ""); ?> value="<?php echo e($city->id); ?>"><?php echo e($city->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                              </select>
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please select city')); ?>

                              </small>
                          </div>
                      </div>

                      <!-- pincode -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Pincode')); ?> :</label>
                              <input pattern="[0-9]+" title="<?php echo e(__("Invalid pincode/zipcode")); ?>" placeholder="<?php echo e(__('Please enter pincode')); ?>" type="text" id="first-name" name="pin_code" class="form-control" value="<?php echo e($store['pin_code']); ?>">
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please enter pincode')); ?>

                              </small>
                          </div>
                      </div>

                      <!-- choosePayout -->
                      <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Please select prerfed payout:')); ?> :</label>
                              <select class="select2 form-control" name="preferd" id="preferd" required>
                                <option value=""><?php echo e(__('admin.preferPayout')); ?></option>
                                <option <?php echo e($store['preferd'] == 'paypal' ? 'selected' : ""); ?> value="paypal"><?php echo e(__('Paypal')); ?></option>
                                <option <?php echo e($store['preferd'] == 'paytm' ? 'selected' : ""); ?> value="paytm"><?php echo e(__('Paytm')); ?></option>
                                <option <?php echo e($store['preferd'] == 'bank' ? 'selected' : ""); ?> value="bank"><?php echo e(__('Bank Transfer')); ?></option>
                              </select>
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please select prerfed payout')); ?>

                              </small>
                          </div>
                      </div>

                        <!-- paypalemail -->
                        <div class="col-md-4">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Paypal Email')); ?> :</label>
                                <input value="<?php echo e($store['paypal_email']); ?>" type="text" class="form-control" class="form-control" name="paypal_email" placeholder="eg:seller@paypal.com">
                                <small class="text-muted">
                                  <i class="fa fa-question-circle"></i> <?php echo e(__('Please enter paypal email')); ?>

                                </small>
                          </div>
                      </div>

                      <!-- paypalemail -->
                      <div class="col-md-4">
                      <div class="form-group">
                            <label class="text-dark"> <?php echo e(__("Paytm Mobile No.")); ?> : (<?php echo e(__('admin.IndiaApplicable')); ?>)</label>
                            <input value="<?php echo e($store['paytem_mobile']); ?>" type="text" class="form-control" class="form-control" name="paytem_mobile" placeholder="eg:7894561230">
                            <small class="text-muted">
                              <i class="fa fa-question-circle"></i> <?php echo e(__('Please enter mobile no.')); ?>

                            </small>
                      </div>
                      </div>

                      <!-- AccountNumber -->
                      <div class="col-md-4">
                      <div class="form-group">
                        <label class="text-dark"><?php echo e(__('Account No.')); ?></label>
                        <input class="form-control" pattern="[0-9]+" title="<?php echo e(__("Invalid account no.")); ?>" type="text"  name="account"
                          value="<?php echo e($store['account']); ?>" placeholder="<?php echo e(__('Please Enter Account Number')); ?>"> <span
                          class="required"><?php echo e($errors->first('account')); ?></span>
                      </div>
                      </div>

                      <!-- AccountName -->
                      <div class="col-md-4">
                      <div class="form-group">
                        <label class="text-dark"><?php echo e(__('Account Name')); ?> :</label>
                        <input class="form-control" type="text" name="account_name" value="<?php echo e($store['account_name']); ?>"
                          placeholder="<?php echo e(__('Please Enter Account Name')); ?>"> <span
                          class="required"><?php echo e($errors->first('bank_name')); ?></span>
                      </div>
                      </div>

                      <!-- BankName -->
                      <div class="col-md-4">
                      <div class="form-group">
                        <label class="text-dark"> <?php echo e(__('BankName')); ?> :</label>
                        <input class="form-control"  type="text" name="bank_name" value="<?php echo e($store['bank_name']); ?>"
                          placeholder="<?php echo e(__('Please Enter Bank Name')); ?>"> <span
                          class="required"><?php echo e($errors->first('bank_name')); ?></span>
                      </div>
                      </div>

                      <!-- IFSC Code -->
                      <div class="col-md-4">
                      <div class="form-group">
                        <label class="text-dark"> <?php echo e(__('IFSC Code')); ?> :</label>
                        <input class="form-control"  type="text" name="ifsc" value="<?php echo e($store['ifsc']); ?>"
                          placeholder="<?php echo e(__('Please Enter IFSC Code')); ?>"> <span
                          class="required"><?php echo e($errors->first('ifsc')); ?></span>
                      </div>
                      </div>

                      <!-- BranchAddress -->
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Branch Address')); ?> : </label>
                          <input class="form-control"  type="text" id="first-name" name="branch" placeholder="<?php echo e(__("Please Enter Branch Address")); ?>"
                            value="<?php echo e($store['branch']); ?>">
                          <span class="required"><?php echo e($errors->first('branch')); ?></span>
                        </div>
                      </div>

                      <!-- Logo -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Logo')); ?> :</label>
                          
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" id="img_upload_input" name="store_logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" onchange="readURL(this);" required/>
                              <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose Logo")); ?> </label>
                            </div>
                          </div> <br>
                          <div class="thumbnail-img-block mb-3">
                            <img id="image-pre" class="img-fluid" alt="">
                          </div>  

                        </div>
                      </div>

                        <!-- Store cover photo -->
                        <div class="col-md-4">
                        <div class="form-group">
                        <label class="text-dark">
                          <?php echo e(__('Store cover photo :')); ?>

                        </label>
                        <div class="input-group mb-3">
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" name="cover_photo" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                              <label class="custom-file-label" for="inputGroupFile01"><?php echo e(__("Choose file")); ?> </label>
                          </div>
                        </div>
                        <small>
                          <i class="fa fa-question-circle"></i>  
                            • <?php echo e(__("It will display on your store page.")); ?>

                            • <?php echo e(__("Recommnaded size is :")); ?> <b>1500 x 440 px</b>
                            • <?php echo e(__("Allow format is")); ?> <b>jpg,jpeg,png,gif</b>     
                        </small>
                      </div>
                      </div>

                        <!-- Store Address -->
                      <div class="col-md-6">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Store Address :')); ?> <span class="text-danger">*</span></label>
                              <textarea class="form-control" required name="address" id="address" cols="30" rows="5"><?php echo $store->address; ?></textarea>
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('Please enter address')); ?>

                              </small>
                          </div>
                      </div>

                        <!-- Store description -->
                        <div class="col-md-6">
                          <div class="form-group">
                              <label class="text-dark"><?php echo e(__('Store description :')); ?> <span class="text-danger">*</span></label>
                              <textarea class="form-control" required name="description" id="description" cols="30" rows="5"><?php echo e($store->description); ?></textarea>
                              <small class="text-muted">
                                <i class="fa fa-question-circle"></i> <?php echo e(__('It will display on your store page.')); ?>

                              </small>
                          </div>
                      </div>

                      

                        <!-- Status -->
                        <div class="col-md-6">
                        <div class="form-group">
                          <label class="text-dark"><?php echo e(__('Status')); ?> </label><br>
                          <label class="switch">
                            <input class="slider" type="checkbox" name="status" <?php echo e($store['status'] == '1' ? "checked" : ""); ?> />
                            <span class="knob"></span>
                          </label>
                          <br>
                          <small><?php echo e(__('Toggle the store status')); ?></small>
                      </div>
                      </div>

                      <!-- Verified Store -->
                      <div class="col-md-6">
                      <div class="form-group">
                        <label class="text-dark"><?php echo e(__('Verified Store :')); ?></label><br>
                        <label class="switch">
                          <input <?php echo e($store['verified_store'] == '1' ? "checked" : ""); ?> type="checkbox" name="verified_store">
                          <span class="knob"></span>
                        </label>
                        <br>
                        <small><?php echo e(__('(On The Product detail page if store is verified than it will add')); ?> <i class="fa fa-check-circle text-green"></i> <?php echo e(__('Symbol next to the store name.)')); ?></small>
                      </div>
                      </div>

                      <div class="col-12">
                        <div class="alert alert-success">
                            <ul>
                              <li><?php echo e(__("In order to get google place api key Google Maps platform account is required you can know more about")); ?> <a target="__blank" class="alert-link" href="https://mapsplatform.google.com/"><?php echo e(__("here")); ?></a></li>
                              <li>
                                <?php echo e(__("To find your place id use this ")); ?> <a target="__blank" href="https://developers.google.com/maps/documentation/javascript/examples/places-placeid-finder" class="alert-link"><?php echo e(__('tool')); ?></a>
                              </li>

                              <li>
                                <?php echo e(__("To get Place API Key head over to ")); ?> <a target="__blank" class="alert-link" href="https://developers.google.com/maps/documentation/places/web-service/overview"><?php echo e(__("here")); ?></a>
                              </li>
                            </ul>
                        </div>
                      </div>

                      <div class="col-4">
                        <div class="form-group">
                            <label><?php echo e(__("Show Google reviews & ratings on store page?")); ?></label>
                            <br>
                            <label class="switch">
                              <input <?php echo e($store->show_google_reviews == 1 ? "checked" : ""); ?> id="show_google_reviews" class="show_google_reviews" type="checkbox" name="show_google_reviews"
                                >
                              <span class="knob"></span>
                            </label>
                        </div>
                      </div>

                      <div class="col-4 placeid" style="display:<?php echo e($store->show_google_reviews == 1 ? "block" : "none"); ?>">
                        <div class="form-group">
                            <label><?php echo e(__("Google Place ID")); ?> <span class="text-danger">*</span></label>
                            <input <?php echo e($store->show_google_reviews == 1 ? "required=required" : ""); ?> value="<?php echo e($store->google_place_id ?? ''); ?>" name="google_place_id" type="text" class="pkey form-control" placeholder="<?php echo e(__("Enter your google place id key")); ?>">
                        </div>
                      </div>

                      <div class="col-4 placeapi" style="display:<?php echo e($store->show_google_reviews == 1 ? "block" : "none"); ?>">

                        <div class="form-group">
                            <label><?php echo e(__("Google Place API Key")); ?> <span class="text-danger">*</span> </label>
                            <input <?php echo e($store->show_google_reviews == 1 ? "required=required" : ""); ?> value="<?php echo e($store->google_place_api_key ?? ''); ?>" name="google_place_api_key" type="text" class="pkey form-control" placeholder="<?php echo e(__("Enter your google place api key")); ?>">
                        </div>

                      </div>
                                    
                      <!-- create and close button -->
                      <div class="col-md-12">
                          <div class="form-group">
                              <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban"></i> <?php echo e(__("Reset")); ?></button>
                              <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                              <?php echo e(__("Update")); ?></button>
                          </div>
                      </div>

                    </div><!-- row end -->
                                              
                  </form>
                  <!-- form end -->

         <!-- main content end -->
        </div>
      </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('custom-script'); ?>
<script>
  var baseUrl = <?php echo json_encode(url('/'), 15, 512) ?>;
</script>
<script>
  $(".show_google_reviews").on('change',function(){
    if($(this).is(":checked")){

        $('.placeid,.placeapi').show();

        $('.pkey').each(function(index,value){
          $(this).attr('required','required');
        });

    }else{
      $('.placeid,.placeapi').hide();

      $('.pkey').each(function(index,value){
          $(this).removeAttr('required','required');
      });

    }
  });
</script>
<script src="<?php echo e(url('js/ajaxlocationlist.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/store/edit.blade.php ENDPATH**/ ?>