
<?php $__env->startSection('title',__('Admin Dashboard | ')); ?>

<?php $__env->startSection("body"); ?>
<?php
  $data['heading'] = 'Dashboard';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">       
  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('dashboard.states')): ?>         
  <div class="row">
    <div class="col-lg-12 col-xl-12">
      
      <div class="alert alert-success alert-dismissible fade show">
        
        
        <span id="update_text"></span>
  
        <form action="<?php echo e(url("/merge-quick-update")); ?>" method="POST" class="float-right display-none updaterform">
            <?php echo csrf_field(); ?>
            <input required type="hidden" value="" name="filename">
            <input required type="hidden" value="" name="version">
            <button class="btn btn-sm btn-primary-rgba">
              <i class="feather icon-check-circle"></i> <?php echo e(__("Update Now")); ?>

            </button>
        </form>
       
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
  
      </div>

      <div class="row">
        <div class="col-md-3 ">
            <div class="card dashboard-card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($user); ?></h4>
                      <p class="font-14 mb-0 "><?php echo e(__('Total Users')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a href="<?php echo e(route('users.index')); ?>"> <i class="text-success feather icon-user iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>
     
        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4 ><?php echo e($order); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__('Total Orders')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a href="<?php echo e(url('admin/order')); ?>"> <i class="text-warning feather icon-shopping-cart mr-2 iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($totalcancelorder); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__('Total Cancelled Orders')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a href="<?php echo e(url('admin/ord/canceled')); ?>"> <i class="text-danger feather icon-x-circle iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($totalproducts); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__('Total Products')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a href="<?php echo e(url('admin/products')); ?>"> <i class="text-primary feather icon-truck iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>


        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($store); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__('Total Stores')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a href="<?php echo e(url('admin/stores')); ?>"> <i class="text-info feather icon-home iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>



        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($category); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__('Total Categories')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a  href="<?php echo e(url('admin/category')); ?>"> <i class="text-secondary feather icon-shopping-bag iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>


        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($coupan); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__("Total Coupons")); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a href="<?php echo e(url('admin/coupan')); ?>"> <i class="text-success feather icon-grid iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>


        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($faqs); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__('Total FAQ\'s')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a href="<?php echo e(url('admin/faq')); ?>"> <i class="text-warning feather icon-help-circle iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>

        <?php if($genrals_settings->vendor_enable == 1): ?>
        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($pending_payout); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__('Pending Payouts')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a href="<?php echo e(route('seller.payouts.index')); ?>"> <i class="text-danger feather icon-credit-card iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 ">
            <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <h4><?php echo e($totalsellers); ?></h4>
                      <p class="font-14 mb-0"><?php echo e(__('Total sellers (active)')); ?></p>
                    </div>
                    <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                      <a  href="<?php echo e(route('users.index',['filter' => 'sellers'])); ?>"> <i class="text-warning feather icon-users iconsize"></i>
                      </a>
                      </div>
                      
                  </div>
                </div>
            </div>
        </div>

        <?php endif; ?>

        <div class="col-md-3 ">
          <div class="card m-b-30 shadow-sm">
              <div class="card-body">
                <div class="row">
                  <div class="col-8">
                    <h4><?php echo e($total_testinonials); ?></h4>
                    <p class="font-14 mb-0"><?php echo e(__('Total Testimonials (active)')); ?></p>
                  </div>
                  <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                    <a href="<?php echo e(route('testimonial.index')); ?>"> <i class="text-primary feather  icon-sliders iconsize"></i>
                    </a>
                    </div>
                    
                </div>
              </div>
          </div>
        </div>


        <div class="col-md-3 ">
          <div class="card m-b-30 shadow-sm">
              <div class="card-body">
                <div class="row">
                  <div class="col-8">
                    <h4><?php echo e($total_specialoffer); ?></h4>
                    <p class="font-14 mb-0"><?php echo e(__('Total Special offers (active)')); ?></p>
                  </div>
                  <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                    <a  href="<?php echo e(route('special.index')); ?>"> <i class="text-info feather icon-gift iconsize"></i>
                    </a>
                    </div>
                    
                </div>
              </div>
          </div>
        </div>



        <div class="col-md-3 ">
          <div class="card m-b-30 shadow-sm">
              <div class="card-body">
                <div class="row">
                  <div class="col-8">
                    <h4><?php echo e($total_hotdeals); ?></h4>
                    <p class="font-14 mb-0"><?php echo e(__('Total Hotdeals (active)')); ?></p>
                  </div>
                  <div class="col-4 animate__animated animate__fadeIn animate__delay-2s">
                    <a href="<?php echo e(route('hotdeal.index')); ?>"> <i class="text-secondary feather icon-archive iconsize"></i>
                    </a>
                    </div>
                    
                </div>
              </div>
          </div>
       </div>

    </div>



    <div class="row">
         
      <?php if($dashsetting->fb_wid ==1 || $dashsetting->tw_wid==1 || $dashsetting->insta_wid==1): ?>
      <?php
      $connected = @fsockopen("www.facebook.com", 80);
      ?>
           <?php if($dashsetting->fb_wid ==1): ?>
            <div class="col-md-4">
              <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 iconsize">
                      
                     <i class="fa fa-facebook-official text-primary"></i>

                    </div>
                    <div class="col-9">
                     <h4><?php echo e(__('Page Likes')); ?></h4>
                      <?php if($dashsetting->fb_page_id != '' || $dashsetting->fb_page_token != ''): ?>

                      <?php if($connected): ?>
                      <?php

                        $fb_page = "'".$dashsetting->fb_page_id."'";
                        $access_token = "'".$dashsetting->fb_page_token."'";
                        $url = 'https://graph.facebook.com/v3.2/'.$fb_page.'?fields=fan_count&access_token='.$access_token;
                        $curl = curl_init($url);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                        $result = curl_exec($curl);

                        curl_close($curl);
                        if($result) { // if valid json object
                          $result = json_decode($result); // decode json object
                          if(isset($result->fan_count)) { 
                            echo '<h4 class="animate__animated animate__fadeIn animate__delay-1s">'.$result->fan_count.'</h4>';
                          }
                        }
                        else{
                          echo __('Page is not a valid FB Page');
                        }
                      ?>
                      <?php else: ?>
                        <p><b><?php echo e(__('Connection Problem !')); ?></b></p>
                      <?php endif; ?>
                      <?php else: ?>
                        <p class="animate__animated animate__fadeIn animate__delay-1s"><b><?php echo e(__('Set up your facebook page key in Admin Dashboard Setting !')); ?></b></p>
                      <?php endif; ?>
                      
                     
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>

            <?php if($dashsetting->tw_wid==1): ?>
            <div class="col-md-4">
              <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 iconsize">
                      <i class="fa fa-twitter-square text-info"></i>
                     
                    </div>
                    <div class="col-9">
                      <h4><?php echo e(__('Followers')); ?></h4>
                      <?php if($dashsetting->tw_username != ''): ?>

                      <?php if($connected): ?>
                      <?php 
                      
                      $data = @file_get_contents('https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names='.$dashsetting->tw_username); 
                      $parsed =  json_decode($data,true);
                      try{
                        $tw_followers =  $parsed[0]['followers_count'];
                      
                        echo '<h4 class="animate__animated animate__fadeIn animate__delay-1s">'.$tw_followers.'</h4>';
                      }catch(\Exception $e){
                        echo '<span class="info-box-number">'.$e->getCode().''.__('Invalid Username !').'</span>';
                      }
                    ?>
                      <?php else: ?>
                      <p><b><?php echo e(__('Connection Problem !')); ?></b></p>
                      <?php endif; ?>
                      <?php else: ?>
                      <p class="animate__animated animate__fadeIn animate__delay-1s"><b>
                        <?php echo e(__('Set up Twitter username in Admin Dashboard Setting !')); ?>  
                      </b></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>

            <?php if($dashsetting->insta_wid==1): ?>
            <div class="col-md-4">
              <div class="card m-b-30 shadow-sm">
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 iconsize">
                      <i class="fa fa-instagram text-danger"></i>
                     
                    </div>
                    <div class="col-9">
                      <h4><?php echo e(__('Followers')); ?></h4>
                      <?php if($dashsetting->inst_username !=''): ?>

                      <?php if($connected): ?>
                      <?php
                        $raw = @file_get_contents("https://www.instagram.com/$dashsetting->inst_username"); //
                        preg_match('/\"edge_followed_by\"\:\s?\{\"count\"\:\s?([0-9]+)/',$raw,$m);
                        
                        
                        try{
                          echo '<h4 class="animate__animated animate__fadeIn animate__delay-1s">'.$m[1].'</h4>';
                        }catch(\Exception $e){
                          echo '<span class="info-box-number">'.$e->getCode().' '.__('Invalid Username !').'</span>';
                        }
                        
                      ?>
                      <?php else: ?>
                      <p><b><?php echo e(__('Connection Problem !')); ?></b></p>
                      <?php endif; ?>
                      <?php else: ?>
                      <p class="animate__animated animate__fadeIn animate__delay-1s"><b> <?php echo e(__("Set up Instagram username in")); ?> <br><?php echo e(__('Admin Dashboard Setting !')); ?></b></p>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endif; ?>
      <?php endif; ?>
                    

          <div class="col-md-12">
            <div class="shadow-sm card">
              <?php echo $orderchart->container(); ?>

            </div>
          </div>


          <div class=" col-md-6 mt-4">
            <div class="shadow-sm card m-b-30">
                <div class="card-header  bg-primary">                                
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h5 class="card-title mb-0 text-white"><?php echo e(__('Visitors')); ?></h5>
                        </div>
                        <div class="col-3">
                          
                        </div>
                    </div>
                </div>
                <div class="card-body bg-primary">
                  <div id="world-map" style="height: 350px; width: 100%;"></div>
                </div>
            </div>
          </div>
        
          <div class="col-md-6 mt-4">
            <div style="height: 440px; width: 100%;" class="shadow-sm card p-2">
              <?php echo $userchart->container(); ?>

            </div>
          </div>

            <?php if($dashsetting->lat_ord ==1): ?>
            <div class="col-md-8 m-b-30">
              <div class="shadow-sm h-100 card">
                  <div class="card-header">                                
                      <div class="row align-items-center">
                          <div class="col-9">
                              <h5 class="card-title mb-0">
                                <?php echo e(__("Latest Orders")); ?>

                              </h5>
                          </div>
                          <div class="col-3">
                              <div class="dropdown">
                                  <button class="btn btn-link p-0 font-18 float-right" type="button" id="upcomingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="upcomingTask">
                                      <?php if(count($latestorders)): ?>
                                        <a class="dropdown-item font-13" href="<?php echo e(url('admin/order')); ?>">
                                          <?php echo e(__('View All Orders')); ?>

                                        </a>
                                      <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-borderd">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th><?php echo e(__('Order ID')); ?></th>
                              <th><?php echo e(__('Customer name')); ?></th>
                              <th><?php echo e(__('Total Qty')); ?></th>
                              <th><?php echo e(__('Total Price')); ?></th>
                              <th><?php echo e(__('Order Date')); ?></th>
                            </tr>
                          </thead>
                
                          <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $latestorders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                
                            <tr>
                              <td><?php echo e($key+1); ?></td>
                              <td><a title="<?php echo e(__('View order')); ?>"
                                  href="<?php echo e(route('show.order',$order->order_id)); ?>">#<?php echo e($inv_cus->order_prefix.$order->order_id); ?></a>
                              </td>
                              <td><?php echo e($order->user->name); ?></td>
                              <td><?php echo e($order->qty_total); ?></td>
                              <td><i class="<?php echo e($order->paid_in); ?>"></i><?php echo e($order->order_total); ?></td>
                              <td><?php echo e(date('d-M-Y',strtotime($order->created_at))); ?></td>
                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                              <tr>
                                <td colspan="6">
                                  <?php echo e(__("No orders found !")); ?>

                                </td>
                              </tr>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
            </div>
            <?php endif; ?>

            <div class="col-md-4 m-b-30">
              <div class="shadow-sm card">
                <?php echo $piechart->container(); ?>

              </div>
            </div>


            <?php if($genrals_settings->vendor_enable == 1): ?>
            <?php if($dashsetting->rct_str==1): ?>
            <div class="col-md-12">
              <div class="shadow-sm card m-b-30">
                  <div class="card-header">                                
                      <div class="row align-items-center">
                          <div class="col-9">
                              <h5 class="card-title mb-0">
                                <?php echo e(__('Recent store requests')); ?>

                              </h5>
                          </div>
                          <div class="col-3">
                              <div class="dropdown">
                                  <button class="btn btn-link p-0 font-18 float-right" type="button" id="upcomingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="upcomingTask">
                                    <?php if(count($storerequest)): ?>
                                      <a class="dropdown-item font-13" href="<?php echo e(url('admin/appliedform')); ?>">
                                        <?php echo e(__("View all store requests")); ?>

                                      </a>
                                    <?php else: ?>
                                      <a class="dropdown-item font-13" href="#">
                                        <?php echo e(__("No request available")); ?>

                                      </a>
                                    <?php endif; ?>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-borderd">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th><?php echo e(__("Store Name")); ?></th>
                              <th><?php echo e(__('Buisness Email')); ?></th>
                              <th><?php echo e(__('Request By')); ?></th>
                            </tr>
                          </thead>
                
                          <tbody>
                
                            <?php $__empty_1 = true; $__currentLoopData = $storerequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                              <td><?php echo e($key + 1); ?></td>
                              <td><?php echo e($store->name); ?></td>
                              <td><?php echo e($store->email); ?></td>
                              <td><?php echo e($store->owner); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                              <tr>
                                <td align="center" colspan="4">
                                  <b><?php echo e(__("No store request yet !")); ?></b>
                                </td>
                              </tr>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                  </div>
              </div>
            </div>
            <?php endif; ?>
            <?php endif; ?>

            <?php if($dashsetting->rct_pro ==1): ?>
            <div class="col-md-8">
              <div class="shadow-sm card m-b-30">
                  <div class="card-header">                                
                      <div class="row align-items-center">
                          <div class="col-9">
                              <h5 class="card-title mb-0">
                                <?php echo e(__('Recently added products')); ?>

                              </h5>
                          </div>
                          <div class="col-3">
                              <div class="dropdown">
                                  <button class="btn btn-link p-0 font-18 float-right" type="button" id="upcomingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="upcomingTask">
                                  
                                      <a class="dropdown-item font-13" href="<?php echo e(url('admin/products')); ?>">
                                        <?php echo e(__('View all products')); ?>

                                      </a>
                                    
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="card-body">
                   
                        <?php $__currentLoopData = $products->take($dashsetting->max_item_ord); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row mb-2">
                        <div class="text-center col-md-2">
                          <?php if($pro['thumbnail'] != ''): ?>
                            <img class="object-fit" height="50px" src="<?php echo e($pro['thumbnail']); ?>" title="<?php echo e($pro['productname']); ?>" alt="<?php echo e(__("Product image")); ?>">
                          <?php endif; ?>
                        </div>
                        <div class="col-md-8">
                          <a href="<?php echo e($pro['producturl']); ?>" class="product-title"> <?php echo e(substr($pro['productname'],0,50)); ?>

                           </a><br>
                           <span class="product-description">
                            <?php echo e(substr($pro['detail'],0,100)); ?><?php echo e(strlen($pro['detail'])>100 ? "..." : ""); ?>

                          </span>
                        </div>
                        <div class="col-md-2">
                          <span class="badge badge-primary">
                            <?php echo e($pro['price_in']); ?> <?php echo e($pro['price']); ?>  
                          </span>
                          
                        </div>
                       
                      </div>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      
                   
                  </div>
              </div>
            </div>
            <?php endif; ?>

            <?php if($dashsetting->rct_cust ==1): ?>
            <div class="col-md-4">
              <div class="shadow-sm card m-b-30">
                  <div class="card-header">                                
                      <div class="row align-items-center">
                          <div class="col-5">
                              <h5 class="card-title mb-0">
                                <?php echo e(__("Recent Users")); ?>

                              </h5>
                          </div>
                          <div class="col-7">
                            <div class="row">
                              <div class="col-md-10">
                                <span class="<?php echo e(selected_lang()->rtl_available == 0 ? "float-right" : "float-left"); ?> mt-2 badge badge-success"><?php echo e($registerTodayUsers); ?> <?php echo e(__('members today')); ?></span>
                              </div>
                              <div class="col-md-2">
                            
                              <div class="dropdown">
                                
                                  <button class="btn btn-link p-0 font-18 float-right" type="button" id="widgetRevenue" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-horizontal-"></i></button>
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="widgetRevenue">
                                      <a class="dropdown-item font-13"  href="<?php echo e(route('users.index',['filter' => 'customer'])); ?>"><?php echo e(__('View all users')); ?></a>
                                
                                  </div>
                              </div>
                              </div>
                            </div>
                            
                          </div>
                      </div>
                  </div>                            
                  <div class="user-slider">
                    <?php $__currentLoopData = $users =
                    App\User::where('role_id','!=','a')->orderBy('id','DESC')->take($dashsetting->max_item_cust)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="user-slider-item">
                          <div class="card-body text-center">
                              <span >
                                <?php if($user->image !="" && file_exists(public_path().'/images/user/'.$user->image)): ?>
                                <img class="mx-auto d-block user_image" src="<?php echo e(url('images/user/'.$user->image)); ?>" alt="">
                                <?php else: ?>
                                <img class="mx-auto d-block user_image" src="<?php echo e(Avatar::create($user->name)->tobase64()); ?>" alt="">
                                <?php endif; ?>
                              </span>
                              <h5 class="mt-3"><?php echo e($user->name); ?></h5>
                              <p><?php echo e($user->email); ?></p>
                              <p><span class="badge badge-primary-inverse"><?php echo e(date('Y-m-d',strtotime($user->created_at))); ?></span></p>
                          </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                                                   
                  </div>                            
              </div>      
          </div>
          <?php endif; ?>

      

    
      </div>
    </div>
  </div>
  <?php else: ?> 
  <div class="alert alert-primary">
    <span class="info-box-icon <?php echo e($time < 19 ? "bg-orange" : "bg-purple"); ?>">
      <?php if($time < "19"): ?>
        <i class="feather icon-sun"></i>
      <?php else: ?> 
        <i class="feather icon-moon"></i>
      <?php endif; ?>
    </span>
  
    <div class="d-inline info-box-content">
      <span class="font-weight-bold"><?php echo e($day); ?> ! <?php echo e(auth()->user()->name); ?></span>
      <span class="info-box-number">
        <?php echo e($quote); ?>

      </span>
    </div>
    <!-- /.info-box-content -->
  </div>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script src="<?php echo e(url('front/vendor/js/Chart.min.js')); ?>" charset="utf-8"></script>
<script src="<?php echo e(url('front/vendor/js/highcharts.js')); ?>" charset="utf-8"></script>
<script>var baseurl = <?php echo json_encode(url('/'), 15, 512) ?>;</script>
<script src="<?php echo e(url('js/updater.js')); ?>"></script>
<script>
  $(function () {


    $.ajax({
      method: "GET",
      url: '<?php echo e(route("get.visitor.data")); ?>',
      success: function (response) {
        console.log(response);

        $('#world-map').vectorMap({
          map: 'world_mill_en',
          backgroundColor: 'transparent',
          regionStyle: {
            initial: {
              fill: '#e4e4e4',
              'fill-opacity': 1,
              stroke: 'none',
              'stroke-width': 0,
              'stroke-opacity': 1
            }
          },
          series: {
            regions: [{
              values: response,
              scale: ['#f9b9be', '#fbdca2','#6fdca4'],
              normalizeFunction: 'polynomial'
            }]
          },
          onRegionLabelShow: function (e, el, code) {
            if (typeof response[code] != 'undefined') {
              el.html(el.html() + ': ' + response[code] + ' visitors');
            } else {
              el.html(el.html() + ': ' + '0' + ' visitors');
            }

          }
        });

      },
      error: function (err) {
        console.log('Error:' + err);
      }
    });


  });
</script>
<?php echo $userchart->script(); ?>

<?php echo $piechart->script(); ?>

<?php echo $orderchart->script(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("admin/layouts.master-soyuz", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/dashbord/index.blade.php ENDPATH**/ ?>