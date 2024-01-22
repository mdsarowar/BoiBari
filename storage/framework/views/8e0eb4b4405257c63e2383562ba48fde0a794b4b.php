
            <span class="control-label col-md-12" for="first-name">
              <label class="text-dark">
                <?php echo e(__("Auto Detect:")); ?>

              </label>
            </span>

             <div class="col-md-12">

             <label class="switch"> 
             
              <input type="checkbox" class="quizfp toggle-input toggle-buttons" name="auto_detect" onchange="autoDetectLocation('auto-detect')" id="auto-detect" <?php echo e($auto_geo->auto_detect=="1"?'checked':''); ?>>
              <span class="knob"></span> 

              </label>
              
              <label for="auto-detect"></label> 
              <div class="geoLocation-add" ><span class="you-are-login"><?php echo e(__("Currently you are login from")); ?> </span><img class="country-loding" src="<?php echo e(url('images/circle.gif')); ?>"><span class="location-name"></span> <i class="fa fa-map-marker map-icon" aria-hidden="true"></i></div>

            </div>

          
          <div class="col-md-3 col-sm-3 col-xs-6 select-geo">         
            <label class="text-dark"> <?php echo e(__("Geo Location:")); ?> </label> 
          </div>

      <div class="col-md-6 col-sm-6 col-xs-6 select-geo">  
        <select name="geoLocation" class="form-control select2" id="GeoLocationId">
            
             <option value="0"><?php echo e(__("Not Available")); ?></option>
                      <?php $__currentLoopData = $all_country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         
                        
                         <option value="<?php echo e($c->id); ?>" <?php echo e($c->id == $auto_geo->default_geo_location ? 'selected="selected"' : ''); ?>>
                            <?php echo e($c->nicename); ?>

                         </option>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         </select>
       </div>
        <p></p>

        <?php if($auto_geo->auto_detect=="1"): ?>
          
          <div id="baseCurrencyBox">
            <span class="control-label col-md-3 col-sm-12 col-xs-12 currency-by-country margin-top-10">
              <label class="text-dark">
                <?php echo e(__("Currency by Country:")); ?>

              </label>
            </span>
             <div class="col-md-9 col-sm-9 col-xs-12 currency-by-country">
                <label class="switch">
                 <input type="checkbox" name="by-country" onchange="currencybycountry('by-country')" id="by-country" <?php echo e($auto_geo->currency_by_country=="1"?'checked':''); ?>>
                 <span class="knob"></span>
                </label>
                <i class="currency-info"><?php echo e(__("Only working with AUTO DETECT feature. Currency will be selected base on country.")); ?></i>
              </div>
          </div>

        <?php else: ?>

           <div class="display-none" id="baseCurrencyBox">
            <span class="control-label col-md-3 col-sm-12 col-xs-12 currency-by-country margin-top-10">
              <label class="text-dark">
                <?php echo e(__("Currency by Country:")); ?>

              </label>
            </span>
             <div class="col-md-9 col-sm-9 col-xs-12 currency-by-country">
                <label class="switch">
                 <input type="checkbox" name="by-country" onchange="currencybycountry('by-country')" id="by-country" <?php echo e($auto_geo->currency_by_country=="1"?'checked':''); ?>>
                 <span class="knob"></span>
                </label>
                <i class="currency-info"><?php echo e(__("Only working with AUTO DETECT feature. Currency will be selected base on country.")); ?></i>
              </div>
          </div>

        <?php endif; ?>


            
 
            <!-- Table -->
      <form class="<?php echo e($auto_geo->currency_by_country=="1" ? "" : 'display-none'); ?>" id="cur_by_country" method="post" action="<?php echo e(url('admin/location')); ?>">
               <?php echo csrf_field(); ?>
          <table class="table">
             
              <thead>
                <tr>
                  <th scope="col"><?php echo e(__("Currency")); ?></th>
                  <th scope="col"><?php echo e(__("Countries")); ?></th>
                  <th scope="col"><?php echo e(__("Action")); ?></th>
                 
                </tr>
              </thead>
              <tbody>

                <?php if(!empty($check_cur)): ?>
                
                
                      <?php $__currentLoopData = $check_cur; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     
                       
                      <tr>
                       
                      <td>
                        
                       (<?php echo e($currency->currency->symbol); ?>)<?php echo e($currency->currency->code); ?>

                       <input type="hidden" id="currency_id<?php echo e($currency->id); ?>" name="multi_curr<?php echo e($currency->id); ?>" value="<?php echo e($currency->currency->code); ?>">
                        <input type="hidden" id="multi_currency<?php echo e($currency->id); ?>" name="multi_currency<?php echo e($currency->id); ?>" value="<?php echo e($currency->id); ?>">
                      </td>
                      <td>
                       
                      <div>

                      <select class="form-control select2" id="country_id<?php echo e($currency->id); ?>" name="country<?php echo e($currency->id); ?>[]" multiple="multiple">  
                      <?php $__currentLoopData = $all_country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                            <option <?php if(!empty($currency->currencyLocationSettings)): ?> <?php $__currentLoopData = explode(',', $currency->currencyLocationSettings->country_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($c == $country->id): ?> <?php echo e('selected'); ?> <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endif; ?> value="<?php echo e($country->id); ?>"><?php echo e($country->nicename); ?>

                            </option>


                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </select>
                         
                    </div>
                      </td>
                      
                       
                       <td>

                       <div class="dropdown">
                            <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">

                              <a onclick="SelectAllCountry2('country_id<?php echo e($currency->id); ?>','btnid<?php echo e($currency->id); ?>')" id="btnid<?php echo e($currency->id); ?>"class="btn btn-light dropdown-item" isSelected="no"> 
                                <span><?php echo e(__('Select All')); ?>  </span><i class="fa fa-check-square-o"></i>
                              </a>

                              <a onclick="RemoveAllCountry2('country_id<?php echo e($currency->id); ?>','btnid<?php echo e($currency->id); ?>')" id="btnid<?php echo e($currency->id); ?>"class="btn btn-light dropdown-item" isSelected="yes"> 
                              <span><?php echo e(__("Remove All")); ?>  </span><i class="fa fa-window-close"></i>
                              </a>
                               
                            </div>
                        </div>
                        
                      
                       
                       </td>
                     </tr>
                              
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                 <tr>
                  <td colspan="2">
                  <div class="pull-left">
                  <button type="reset" class="btn btn-danger-rgba mr-1"><i class="fa fa-ban mr-2"></i><?php echo e(__("Reset")); ?></button>
                    <button class="btn btn-primary-rgba"><i class="fa fa-check-circle mr-2"></i><?php echo e(__("Save")); ?></button>
                  </div>
                </td>
                </tr>

                 
                
              </tbody>
              
              

          </table>
</form>
     
<script>var baseUrl = "<?= url('/') ?>";</script>
<script src="<?php echo e(url('js/currency.js')); ?>"></script>

<?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/multiCurrency/location.blade.php ENDPATH**/ ?>