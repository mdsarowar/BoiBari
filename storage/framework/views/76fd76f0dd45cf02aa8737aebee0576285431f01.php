<?php if($dashsetting->sidebar_enable== 1): ?>
<div class="leftbar sidebar-two" style="background-image: url('images/navbar.png')">
<?php else: ?>
<div class="leftbar">
<?php endif; ?>

<!-- Start Sidebar -->
  <div class="sidebar">
    <!-- Start Navigationbar -->
    <div class="navigationbar">



      <div class="vertical-menu-detail">

        <div class="logobar">
          <a href="<?php echo e(url('/')); ?>" class="logo logo-large">
            <img src="<?php echo e(url('images/genral/'.$genrals_settings->logo)); ?>" class="img-fluid" alt="logo" />
          </a>
        </div>

        
          <div>

            <ul class="vertical-menu">

              <li class="<?php echo e(Nav::isRoute('admin.main')); ?>">
                <a href="<?php echo e(route('admin.main')); ?>">
                  <i class="feather icon-airplay" aria-hidden="true"></i> <span><?php echo e(__('Dashboard')); ?></span>
                </a>
              </li>

              <li class="header"><?php echo e(__('Users')); ?></li>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['users.view','roles.view'])): ?>
                <li class="<?php echo e(Nav::isResource('roles')); ?> <?php echo e(Nav::isResource('users')); ?>">
                  <a href="javaScript:void();">
                    <i class="feather icon-users" aria-hidden="true"></i> <span><?php echo e(__('Users')); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>

                  <ul class="vertical-submenu">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.view')): ?>
                    <li class="<?php echo e(Nav::isResource('users')); ?>"><a href="<?php echo e(route('users.index')); ?> ">
                        <?php echo e(__('All users')); ?> </a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('users.create')): ?>
                    <li class="<?php echo e(Nav::isResource('users.create')); ?>"><a href="<?php echo e(route('users.create',['type' => app('request')->input('filter')])); ?>">
                        <?php echo e(__('Add users')); ?> </a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('roles.view')): ?>

                    <li class="<?php echo e(Nav::isResource('roles')); ?>"><a href="<?php echo e(route('roles.index')); ?>">
                        <?php echo e(__('Roles and Permissions')); ?></a></li>
                    <?php endif; ?>

                  </ul>
                </li>
              <?php endif; ?>

              <li class="header"><?php echo e(__('Stores & Products')); ?></li>

              <?php if(isset($vendor_system) && $vendor_system == 1): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['stores.accept.request','stores.view'])): ?>
                  <li class="<?php echo e(Nav::isRoute('get.store.request')); ?> <?php echo e(Nav::isResource('stores')); ?>">
                    <a href="javaScript:void();">
                      <i class="feather icon-database" aria-hidden="true"></i> <span><?php echo e(__('Store')); ?></span>
                      <i class="feather icon-chevron-right"></i>
                    </a>

                    <ul class="vertical-submenu">


                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stores.view')): ?>
                      <li class="<?php echo e(Nav::isResource('stores')); ?>">
                        <a href="<?php echo e(url('admin/stores')); ?> ">
                          <?php echo e(__('Stores')); ?>

                        </a>
                      </li>
                      <?php endif; ?>




                      <?php if($vendor_system==1): ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('stores.accept.request')): ?>
                      <li class="<?php echo e(Nav::isRoute('get.store.request')); ?>">
                        <a href="<?php echo e(route('get.store.request')); ?>">
                          <?php echo e(__('Stores Request')); ?>

                        </a>
                      </li>
                      <?php endif; ?>
                      <?php endif; ?>


                    </ul>
                  </li>
                <?php endif; ?>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['review.view','brand.view','author.view','category.view','subcategory.view','childcategory.view','products.view','products.import','attributes.view','coupans.view','returnpolicy.view','units.view','specialoffer.view'])): ?>
                <li class="<?php echo e(Nav::isResource('sizechart')); ?> <?php echo e(Nav::isResource('admin/commission_setting')); ?> <?php echo e(Nav::isResource('admin/commission')); ?> <?php echo e(Nav::isRoute('review.index')); ?> <?php echo e(Nav::isRoute('r.ap')); ?> <?php echo e(Nav::isResource('admin/return-policy')); ?> <?php echo e(Nav::isResource('brand')); ?><?php echo e(Nav::isResource('author')); ?> <?php echo e(Nav::isResource('coupan')); ?> <?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('grandcategory')); ?> <?php echo e(Nav::isResource('products')); ?> <?php echo e(Nav::isResource('unit')); ?> <?php echo e(Nav::isResource('special')); ?> <?php echo e(Nav::isRoute('attr.index')); ?> <?php echo e(Nav::isRoute('attr.add')); ?> <?php echo e(Nav::isRoute('opt.edit')); ?> <?php echo e(Nav::isRoute('pro.val')); ?> <?php echo e(Nav::isRoute('add.var')); ?> <?php echo e(Nav::isRoute('manage.stock')); ?> <?php echo e(Nav::isRoute('edit.var')); ?> <?php echo e(Nav::isRoute('pro.vars.all')); ?> <?php echo e(Nav::isRoute('import.page')); ?> <?php echo e(Nav::isRoute('requestedbrands.admin')); ?> ? 'show' : ''">
                  <a href="javaScript:void();">
                    <i class="feather icon-shopping-bag" aria-hidden="true"></i> <span><?php echo e(__('Products Management')); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>
                  <ul class="vertical-submenu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand.view')): ?>
                      <li class="<?php echo e(Nav::isResource('author')); ?>"><a href="<?php echo e(url('admin/author')); ?> "><?php echo e(__('Author')); ?></a></li>















                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand.view')): ?>
                      <li class="<?php echo e(Nav::isResource('publisher')); ?>"><a href="<?php echo e(url('admin/publisher')); ?> "><?php echo e(__('Publisher')); ?></a></li>















                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('brand.view')): ?>
                    <li class="<?php echo e(Nav::isResource('brand')); ?>"><a href="<?php echo e(url('admin/brand')); ?> "><?php echo e(__('Brands')); ?></a></li>
                    <?php if($genrals_settings->vendor_enable == 1): ?>
                      <li class="<?php echo e(Nav::isRoute('requestedbrands.admin')); ?>"><a href="<?php echo e(route('requestedbrands.admin')); ?> "><?php echo e(__('Requested Brands')); ?>


                          <?php
                          $brands = App\Brand::where('is_requested','=','1')->where('status','0')->orderBy('id','DESC')->count();
                          ?>

                          <?php if($brands !=0): ?>
                          <span class="pull-right-container">
                            <small class="label pull-right bg-red"><?php echo e($brands); ?></small>
                          </span>
                          <?php endif; ?>

                        </a>
                      </li>
                    <?php endif; ?>
                    <?php endif; ?>

                    <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?>

                    <?php echo e(Nav::isResource('grandcategory')); ?>">
                      <a href="javaScript:void();"><?php echo e(__('Categories')); ?>

                        <i class="feather icon-chevron-right"></i>
                      </a>
                      <ul class="vertical-submenu">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category.view')): ?>
                        <li
                          class="<?php echo e(Nav::isRoute('category.index')); ?> <?php echo e(Nav::isRoute('category.create')); ?> <?php echo e(Nav::isRoute('category.edit')); ?>">
                          <a href="<?php echo e(url('admin/category')); ?>"><?php echo e(__('Categories')); ?></a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subcategory.view')): ?>
                        <li class="<?php echo e(Nav::isResource('subcategory')); ?>"><a href="<?php echo e(url('admin/subcategory')); ?>"><?php echo e(__('Subcategories')); ?></a></li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('childcategory.view')): ?>
                        <li class="<?php echo e(Nav::isResource('grandcategory')); ?>"><a href="<?php echo e(url('admin/grandcategory')); ?>"><?php echo e(__('Childcategories')); ?></a></li>
                        <?php endif; ?>
                      </ul>
                    </li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.view')): ?>
                    <li
                      class="<?php echo e(Nav::isRoute('pro.vars.all')); ?> <?php echo e(Nav::isResource('products')); ?> <?php echo e(Nav::isRoute('add.var')); ?> <?php echo e(Nav::isRoute('manage.stock')); ?> <?php echo e(Nav::isRoute('edit.var')); ?>">
                      <a href="<?php echo e(url('admin/products')); ?> "><?php echo e(__('Variant Products')); ?> </a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.view')): ?>
                      <li class="<?php echo e(Nav::isResource('simple-products')); ?>">
                        <a href="<?php echo e(route('simple-products.index')); ?> "><?php echo e(__("Simple Products")); ?></a>
                      </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('products.import')): ?>
                    <li class="<?php echo e(Nav::isRoute('import.page')); ?>"><a href="<?php echo e(route('import.page')); ?>"><?php echo e(__('Import Products')); ?></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('attributes.view')): ?>
                    <li
                      class="<?php echo e(Nav::isRoute('pro.val')); ?> <?php echo e(Nav::isRoute('opt.edit')); ?> <?php echo e(Nav::isRoute('attr.add')); ?><?php echo e(Nav::isRoute('attr.index')); ?>">
                      <a href="<?php echo e(route('attr.index')); ?> "><?php echo e(__('Product Attributes')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('coupans.view')): ?>
                    <li class="<?php echo e(Nav::isResource('coupan')); ?>"><a href="<?php echo e(url('admin/coupan')); ?> ">Coupons</a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('returnpolicy.view')): ?>
                    <li class="<?php echo e(Nav::isResource('admin/return-policy')); ?>"><a href="<?php echo e(url('admin/return-policy')); ?> "><?php echo e(__('Return Policy Settings')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('units.view')): ?>
                    <li class="<?php echo e(Nav::isResource('unit')); ?>"><a href="<?php echo e(url('admin/unit')); ?>"><?php echo e(__('Units')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('specialoffer.view')): ?>
                    <li class="<?php echo e(Nav::isResource('special')); ?>"><a href="<?php echo e(url('admin/special')); ?>"><?php echo e(__('Special Offers')); ?></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('review.view')): ?>
                    <li class="<?php echo e(Nav::isRoute('review.index')); ?>"><a href="<?php echo e(url('admin/review')); ?>"><?php echo e(__('All Reviews')); ?></a></li>

                    <li class="<?php echo e(Nav::isRoute('r.ap')); ?>"><a href="<?php echo e(url('admin/review_approval')); ?>"><?php echo e(__('Reviews For Approval')); ?></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('commission.manage')): ?>

                    <?php if($cms && $cms->type =='c'): ?>
                      <li class="<?php echo e(Nav::isResource('admin/commission')); ?>">
                        <a href="<?php echo e(url('admin/commission')); ?>">
                          <?php echo e(__("Commissions")); ?>

                        </a>
                      </li>
                    <?php endif; ?>

                    <li class="<?php echo e(Nav::isResource('admin/commission_setting')); ?>"><a
                        href="<?php echo e(url('admin/commission_setting')); ?> "><?php echo e(__('Commission Setting')); ?></a>
                    </li>

                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sizechart.manage')): ?>

                    <li class="<?php echo e(Nav::isResource('manage/sizechart')); ?>">
                      <a href="<?php echo e(route("sizechart.index")); ?>"><?php echo e(__("Size chart")); ?>

                      </a>
                    </li>

                    <?php endif; ?>

                  </ul>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reported-products.view')): ?>
                <li id="reppro" class="<?php echo e(Nav::isRoute('get.rep.pro')); ?>">
                  <a href="<?php echo e(route('get.rep.pro')); ?>">
                    <i class="feather icon-alert-circle" aria-hidden="true"></i><span><?php echo e(__('Reported Products')); ?></span></a>
                </li>
              <?php endif; ?>

              <li class="header"><?php echo e(__('Financial')); ?></li>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['order.view','invoicesetting.view'])): ?>
                <li id="ordersm"
                  class="<?php echo e(Nav::isResource('admin/rma')); ?> <?php echo e(Nav::isRoute('admin.preorders')); ?> <?php echo e(Nav::isResource('admin.pending.orders')); ?> <?php echo e(Nav::isRoute('admin.can.order')); ?> <?php echo e(Nav::isRoute('return.order.show')); ?> <?php echo e(Nav::isRoute('return.order.detail')); ?> <?php echo e(Nav::isRoute('return.order.index')); ?> <?php echo e(Nav::isResource('order')); ?> <?php echo e(Nav::isResource('invoice')); ?>">

                  <a href="javaScript:void();">
                    <i class="feather icon-shopping-cart" aria-hidden="true"></i> <span><?php echo e(__('Orders & Invoices')); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>

                  <ul class="vertical-submenu">

                    <li class="<?php echo e(Nav::isResource('order')); ?>"><a href="<?php echo e(route('order.index')); ?> "><?php echo e(__('All Orders')); ?></a></li>
                    <li class="<?php echo e(Nav::isRoute('admin.preorders')); ?>"><a href="<?php echo e(route('admin.preorders')); ?>"></i><?php echo e(__('Pre Orders')); ?> </a></li>
                    <li class="<?php echo e(Nav::isResource('admin.pending.orders')); ?>"><a href="<?php echo e(route('admin.pending.orders')); ?>"></i><?php echo e(__('Pending Orders')); ?> </a></li>
                    <li class="<?php echo e(Nav::isRoute('admin.can.order')); ?>"><a href="<?php echo e(route('admin.can.order')); ?>"></i><?php echo e(__('Canceled Orders')); ?> </a></li>

                    <li class="<?php echo e(Nav::isRoute('return.order.index')); ?> <?php echo e(Nav::isRoute('return.order.show')); ?> <?php echo e(Nav::isRoute('return.order.detail')); ?>">
                      <a href="<?php echo e(route('return.order.index')); ?> "><?php echo e(__('Returned Orders')); ?></a></li>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoicesetting.view')): ?>
                    <li class="<?php echo e(Nav::isResource('invoice')); ?>"><a href="<?php echo e(url('admin/invoice')); ?>"><?php echo e(__('Invoice Setting')); ?></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('invoicesetting.view')): ?>
                    <li class="<?php echo e(Nav::isRoute('get.invoice.design')); ?>"><a href="<?php echo e(route('get.invoice.design')); ?>"><?php echo e(__('Invoice Design')); ?></a></li>
                    <?php endif; ?>

                    <li class="<?php echo e(Nav::isResource('admin/rma')); ?>"><a href="<?php echo e(route('rma.index')); ?> "><?php echo e(__('Return Reasons')); ?></a>
                    </li>
                  </ul>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['order.view'])): ?>
                <li class="<?php echo e(Nav::isResource('offline-orders')); ?> <?php echo e(Nav::isRoute('offline.orders.reports')); ?>">

                  <a href="javaScript:void();">
                    <i class="feather icon-shopping-cart" aria-hidden="true"></i><span><?php echo e(__("Inhouse orders")); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>

                  <ul class="vertical-submenu">

                    <li class="<?php echo e(Nav::isResource('offline-orders')); ?>">
                      <a href="<?php echo e(route('offline-orders.index')); ?> ">
                        <?php echo e(__('All Orders')); ?>

                      </a>
                    </li>

                    <li class="<?php echo e(Nav::isResource('offline-orders')); ?>">
                      <a href="<?php echo e(route('offline-orders.create')); ?>"></i>
                        <?php echo e(__('Create order')); ?>

                      </a>
                    </li>

                    <li class="<?php echo e(Nav::isRoute('offline.orders.reports')); ?>">
                      <a href="<?php echo e(route('offline.orders.reports')); ?>"></i>
                        <?php echo e(__('Reports')); ?>

                      </a>
                    </li>
                    
                  </ul>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['shipping.manage','taxsystem.manage'])): ?>
                <li id="shippingtax" class="<?php echo e(Nav::isResource('admin/zone')); ?> <?php echo e(Nav::isResource('shipping')); ?>

                <?php echo e(Nav::isResource('tax')); ?>">
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('shipping.manage')): ?>
                  <a href="javaScript:void();">
                    <i class="feather icon-truck" aria-hidden="true"></i><span><?php echo e(__('Shipping & Taxes')); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>
                  <?php endif; ?>
                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('taxsystem.manage')): ?>
                  <ul class="vertical-submenu">
                    <li class="<?php echo e(Nav::isResource('tax_class')); ?>"><a href="<?php echo e(url('admin/tax_class')); ?>"><?php echo e(__('Tax Classes')); ?></a></li>
                    <li class="<?php echo e(Nav::isRoute('tax.index')); ?><?php echo e(Nav::isRoute('tax.edit')); ?><?php echo e(Nav::isRoute('tax.create')); ?>">
                      <a href="<?php echo e(url('admin/tax')); ?>"><?php echo e(__('Tax Rates')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('admin/zone')); ?>"><a href="<?php echo e(url('admin/zone')); ?>"><?php echo e(__('Zones')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('shipping')); ?>"><a href="<?php echo e(url('admin/shipping')); ?>"><?php echo e(__('Shipping')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('handling.charge')); ?>"><a href="<?php echo e(route('admin.handling.charge.index')); ?>"><?php echo e(__('Handling charges')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('admin/shiping_charg')); ?>"><a href="<?php echo e(url('admin/shiping_charg/index')); ?>"><?php echo e(__('Shipping charges')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('admin/shi_cupan')); ?>"><a href="<?php echo e(url('admin/shi_cupan')); ?>"><?php echo e(__('Shipping coupan')); ?></a></li>
                  </ul>
                  <?php endif; ?>
                </li>
              <?php endif; ?>

              <?php if($genrals_settings->vendor_enable == 1): ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sellerpayout.manage')): ?>

                <li
                  class="<?php echo e(Nav::isRoute('seller.payout.show.complete')); ?> <?php echo e(Nav::isRoute('seller.payouts.index')); ?> <?php echo e(Nav::isRoute('seller.payout.complete')); ?>">
                  <a href="javaScript:void();">
                    <i class="fa fa-slack" aria-hidden="true"></i><span><?php echo e(__('Seller Payouts')); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>
                  <ul class="vertical-submenu">

                    <li class="<?php echo e(Nav::isRoute('seller.payouts.index')); ?>"><a href="<?php echo e(route('seller.payouts.index')); ?> "><?php echo e(__('Pending Payouts')); ?></a></li>

                    <li class="<?php echo e(Nav::isRoute('seller.payout.show.complete')); ?> <?php echo e(Nav::isRoute('seller.payout.complete')); ?>"><a href="<?php echo e(route('seller.payout.complete')); ?>">
                    <?php echo e(__('Completed Payouts')); ?>

                    </a></li>

                  </ul>

                </li>

              <?php endif; ?>

              <?php endif; ?>

              <li class="header"><?php echo e(__('Marketing')); ?></li>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['hotdeals.view','blockadvertisments.view','advertisements.view','testimonials.view','offerpopup.setting','pushnotification.settings'])): ?>
                <li class="<?php echo e(Nav::isResource('flash-sales')); ?> <?php echo e(Nav::isRoute('admin.push.noti.settings')); ?> <?php echo e(Nav::isRoute('offer.get.settings')); ?> <?php echo e(Nav::isResource('testimonial')); ?> <?php echo e(Nav::isResource('adv')); ?> <?php echo e(Nav::isResource('hotdeal')); ?> <?php echo e(Nav::isResource('detailadvertise')); ?>">
                  <a href="javaScript:void();">
                    <i class="feather icon-bar-chart-line-" aria-hidden="true"></i><span><?php echo e(__('Marketing Tools')); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>

                  <ul class="vertical-submenu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hotdeals.view')): ?>
                    <li><a class="<?php echo e(Nav::isResource('admin/hotdeal')); ?>" href="<?php echo e(url('admin/hotdeal')); ?>"><?php echo e(__('Hot Deals')); ?></a></li>
                    <li><a class="<?php echo e(Nav::isResource('mobile/hotdeal')); ?>" href="<?php echo e(url('mobile/hotdeal')); ?>"><?php echo e(__('Mobile Hot Deals')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blockadvertisments.view')): ?>
                    <li class="<?php echo e(Nav::isResource('admin/detailadvertise')); ?>"><a href="<?php echo e(url('admin/detailadvertise')); ?>"><?php echo e(__('Block Advertisments')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('advertisements.view')): ?>
                    <li class="<?php echo e(Nav::isResource('admin/adv')); ?>"><a href="<?php echo e(url('admin/adv')); ?>"><?php echo e(__('Advertisements')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('testimonials.view')): ?>
                    <li class="<?php echo e(Nav::isResource('admin/testimonial')); ?>"><a href="<?php echo e(url('admin/testimonial')); ?> "><?php echo e(__('Testimonials')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('offerpopup.setting')): ?>
                    <li class="<?php echo e(Nav::isRoute('offer.get.settings')); ?>"><a href="<?php echo e(route('offer.get.settings')); ?> "><?php echo e(__('Offer PopUp Settings')); ?></a></li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pushnotification.settings')): ?>
                    <li class="<?php echo e(Nav::isRoute('admin.push.noti.settings')); ?>"><a
                        href="<?php echo e(route('admin.push.noti.settings')); ?>"><?php echo e(__('Push Notifications')); ?></a></li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hotdeals.view')): ?>
                    <li class="<?php echo e(Nav::isResource('flash-sales')); ?>"><a
                      href="<?php echo e(route('flash-sales.index')); ?>"><?php echo e(__('Flash sales')); ?></a></li>
                    <?php endif; ?>

                  </ul>

                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('wallet.manage')): ?>
                <li class="<?php echo e(Nav::isRoute('admin.wallet.settings')); ?>"><a href="<?php echo e(route('admin.wallet.settings')); ?>"><i class="feather icon-briefcase" aria-hidden="true"></i><span><?php echo e(__('Wallet')); ?></span></a></li>
              <?php endif; ?>

              <?php if(Module::has('SellerSubscription') && Module::find('SellerSubscription')->isEnabled()): ?>

                <?php echo $__env->make('sellersubscription::admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

              <?php endif; ?>


              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('affiliatesystem.manage')): ?>
                <li id="slider"
                  class="<?php echo e(Nav::isRoute('admin.affilate.settings')); ?> <?php echo e(Nav::isRoute('admin.affilate.dashboard')); ?>">
                  <a href="javaScript:void();">
                    <i class="feather icon-award"></i><span>
                      <?php echo e(__("Affiliate Manager")); ?>

                    </span>
                    <i class="feather icon-chevron-right"></i>

                    <small class="badge badge-success float-right"><?php echo e(__('NEW')); ?></small>
                    </span>
                  </a>
                  <ul class="vertical-submenu">
                    <li class="<?php echo e(Nav::isRoute('admin.affilate.settings')); ?>">
                      <a href="<?php echo e(route('admin.affilate.settings')); ?> ">
                        <?php echo e(__("Affiliate Settings")); ?>

                      </a>
                    </li>
                    <?php if($aff_system && $aff_system->enable_affilate == 1): ?>
                    <li class="<?php echo e(Nav::isRoute('admin.affilate.dashboard')); ?>">
                      <a href="<?php echo e(route('admin.affilate.dashboard')); ?> ">
                        <span><?php echo e(__("Affiliate Reports")); ?></span>
                      </a>
                    </li>
                    <?php endif; ?>
                  </ul>
                </li>
              <?php endif; ?>

           

              <li class="header"><?php echo e(__('Content')); ?></li>
              
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.view')): ?>
                <li class="<?php echo e(Nav::isRoute('device.logs')); ?> <?php echo e(Nav::isRoute('admin.report.mostviewed')); ?> <?php echo e(Nav::isRoute('admin.stock.report')); ?> <?php echo e(Nav::isRoute('admin.sales.report')); ?>">
                  <a href="javaScript:void();">
                    <i class="fa fa-file-text-o"></i> <span><?php echo e(__("Reports")); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>
                  <ul class="vertical-submenu">

                    <li class="<?php echo e(Nav::isRoute('admin.stock.report')); ?>">
                      <a href="<?php echo e(route('admin.stock.report')); ?>"><span><?php echo e(__("Stock report")); ?></span>
                      </a>
                    </li>

                    <li class="<?php echo e(Nav::isRoute('admin.sales.report')); ?>">
                      <a href="<?php echo e(route('admin.sales.report')); ?>"><span><?php echo e(__("Sales report")); ?></span>
                      </a>
                    </li>

                    <li class="<?php echo e(Nav::isRoute('admin.report.mostviewed')); ?>">
                      <a href="<?php echo e(route('admin.report.mostviewed')); ?>"><span><?php echo e(__("Most viewed products")); ?></span>
                      </a>
                    </li>

                    <li class="<?php echo e(Nav::isRoute('device.logs')); ?>">
                      <a href="<?php echo e(route('device.logs')); ?>"><span><?php echo e(__("Login device history")); ?></span>
                      </a>
                    </li>

                  </ul>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('menu.view')): ?>
                <li id="menum" class="<?php echo e(Nav::isResource('admin/menu')); ?>">
                  <a href="<?php echo e(route('menu.index')); ?>">
                    <i class="feather icon-sliders" aria-hidden="true"></i> <span><?php echo e(__('Menu Management')); ?></span>

                  </a>
                </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('location.manage')): ?>
                <li id="location"
                  class="<?php echo e(Nav::isRoute('country.list.pincode')); ?> <?php echo e(Nav::isResource('country')); ?> <?php echo e(Nav::isRoute('admin.desti')); ?> <?php echo e(Nav::isRoute('country.index')); ?> <?php echo e(Nav::isRoute('state.index')); ?> <?php echo e(Nav::isRoute('city.index')); ?>">
                  <a href="javaScript:void();">
                    <i class="feather icon-globe" aria-hidden="true"></i> <span><?php echo e(__('Locations')); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>


                  <ul class="vertical-submenu">
                    <li class="<?php echo e(Nav::isResource('country')); ?>"><a href="<?php echo e(url('admin/country')); ?>"><?php echo e(__('Countries')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('division')); ?>"><a href="<?php echo e(url('admin/division')); ?>"><?php echo e(__('Division')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('state')); ?>"><a href="<?php echo e(url('admin/state')); ?>"><?php echo e(__('States')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('city')); ?>"><a href="<?php echo e(url('admin/city')); ?>"><?php echo e(__('Cities')); ?></a></li>
                    <li class="<?php echo e(Nav::isRoute('country.list.pincode')); ?><?php echo e(Nav::isRoute('admin.desti')); ?>"><a
                        href="<?php echo e(url('admin/destination')); ?>"><?php echo e(__('Delivery Locations')); ?></a></li>
                  </ul>



                </li>
              <?php endif; ?>

            
              <li class="header"><?php echo e(__('Setting')); ?></li>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('currency.manage')): ?>
  <li id="mscur" class="<?php echo e(Nav::isResource('admin/multiCurrency')); ?>"><a
      href="<?php echo e(url('admin/multiCurrency')); ?> "><i class="fa fa-money"></i><span>
        <?php echo e(__('Currency settings')); ?>  
      </span></a>
  </li>
<?php endif; ?>
<li class="<?php echo e(Nav::isRoute('admincustomisation')); ?>">
    <a href="<?php echo e(url('admincustomisation')); ?>"><i
        class="feather icon-settings text-secondary"></i><span><span><?php echo e(__('Admin Color Setting')); ?></span></a>
</li>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['pages.view','blog.view','site-settings.style-settings','site-settings.footer-customize','site-settings.social-handle','pwa.setting.index','color-options.manage','faq.view','widget-settings.manage','payment-gateway.manage','manual-payment.view','sliders.manage'])): ?>
  <li
    class="<?php echo e(Nav::isResource('page')); ?> <?php echo e(Nav::isResource('blog')); ?> <?php echo e(Nav::isResource('social')); ?> <?php echo e(Nav::isRoute('footer.index')); ?> <?php echo e(Nav::isRoute('customstyle')); ?> <?php echo e(Nav::isRoute('front.slider')); ?> <?php echo e(Nav::isResource('slider')); ?> <?php echo e(Nav::isRoute('payment.gateway.settings')); ?> <?php echo e(Nav::isRoute('manual.payment.gateway')); ?> <?php echo e(Nav::isRoute('widget.setting')); ?> <?php echo e(Nav::isResource('faq')); ?> <?php echo e(Nav::isRoute('admin.theme.index')); ?> <?php echo e(Nav::isRoute('pwa.setting.index')); ?>">
    <a href="javaScript:void();">
      <i class="feather icon-settings" aria-hidden="true"></i> <span><?php echo e(__("Front Settings")); ?></span>
      <i class="feather icon-chevron-right"></i>
    </a>

    <ul class="vertical-submenu">

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('sliders.manage')): ?>
      <li id="slider" class="treeview <?php echo e(Nav::isRoute('front.slider')); ?> <?php echo e(Nav::isResource('slider')); ?>">
        <a href="#"><span>Sliders</span>
          <i class="feather icon-chevron-right"></i>
        </a>
        <ul class="vertical-submenu">
          <li class="<?php echo e(Nav::isResource('slider')); ?>"><a href="<?php echo e(url('admin/slider')); ?> "><?php echo e(__('Sliders')); ?></a></li>
          <!-- <li class="<?php echo e(Nav::isResource('slider')); ?>"><a href="<?php echo e(url('admin/slider2')); ?> "><?php echo e(__('Sliders 2')); ?></a></li>
			      <li class="<?php echo e(Nav::isResource('slider3')); ?>"><a href="<?php echo e(url('admin/slider3')); ?> ">Sliders 3</a></li> -->
          <li class="<?php echo e(Nav::isRoute('front.slider')); ?>">
            <a href="<?php echo e(route('front.slider')); ?> "><span><?php echo e(__('Top Category Slider')); ?></span></a>
          </li>
        </ul>
      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pwasettings.manage')): ?>
      <li class="<?php echo e(Nav::isRoute('pwa.setting.index')); ?>"><a title="<?php echo e(__('Progressive Web App Setting')); ?>"
          href="<?php echo e(route('pwa.setting.index')); ?> "><span><?php echo e(__('PWA Settings')); ?></span></a>
      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('color-options.manage')): ?>
      <li id="theme-settings" class="<?php echo e(Nav::isRoute('admin.theme.index')); ?>">
        <a href="<?php echo e(route('admin.theme.index')); ?>"><span><?php echo e(__('Color Options')); ?></span>
        </a>
      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('faq.view')): ?>
      <li id="faqs" class="<?php echo e(Nav::isResource('faq')); ?>"><a href="<?php echo e(url('admin/faq')); ?> "><span><?php echo e(__('FAQ\'s')); ?></span></a>
      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('widget-settings.manage')): ?>

      <li class="<?php echo e(Nav::isRoute('widget.setting')); ?>">

        <a href="<?php echo e(route('widget.setting')); ?>"><span><?php echo e(__('Widgets Settings')); ?></span></span></a>

      </li>

      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment-gateway.manage')): ?>
      <li class="<?php echo e(Nav::isRoute('payment.gateway.settings')); ?>">

        <a href="<?php echo e(route('payment.gateway.settings')); ?>"><span><?php echo e(__('Payment Gateway Settings')); ?></span></a>

      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manual-payment.view')): ?>
      <li class="<?php echo e(Nav::isRoute('manual.payment.gateway')); ?>">

        <a href="<?php echo e(route('manual.payment.gateway')); ?>"><span><?php echo e(__("Offline Payment Gateway")); ?></span></a>

      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.style-settings')): ?>
      <li class="<?php echo e(Nav::isRoute('customstyle')); ?>">
        <a href="<?php echo e(route('customstyle')); ?>"><span><?php echo e(__('Custom Style and JS')); ?></span></a>
      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.footer-customize')): ?>
      <li class="<?php echo e(Nav::isRoute('footer.index')); ?>"><a href="<?php echo e(url('admin/footer')); ?> "><?php echo e(__("Footer Customizations")); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.social-handle')): ?>
      <li class="<?php echo e(Nav::isResource('social')); ?>"><a href="<?php echo e(url('admin/social')); ?> "><?php echo e(__('Social Handler Settings')); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog.view')): ?>
      <li class="<?php echo e(Nav::isResource('blog')); ?>"><a href="<?php echo e(url('admin/blog')); ?>"><?php echo e(__('Blogs')); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pages.view')): ?>
      <li class="<?php echo e(Nav::isResource('page')); ?>"><a href="<?php echo e(url('admin/page')); ?>"><?php echo e(__('Pages')); ?></a>
      </li>
      <?php endif; ?>
      <li class="<?php echo e(Nav::isResource('front/content')); ?>"><a href="<?php echo e(url('admin/front/content')); ?>"><?php echo e(__('Front Content')); ?></a></li>
      
      <li class="<?php echo e(Nav::isResource('news/letter')); ?>"><a href="<?php echo e(url('admin/news/letter')); ?>"><?php echo e(__('News Letter')); ?></a></li>
    </ul>
  </li>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['terms-settings.update','others.abuse-word-manage','site-settings.bank-settings','site-settings.dashboard-settings','site-settings.dashboard-settings1','site-settings.footer-customize','site-settings.genral-settings','site-settings.genral-settings','site-settings.language','site-settings.mail-settings','site-settings.maintenance-mode','site-settings.sms-settings','site-settings.social-handle','site-settings.social-login-settings','site-settings.style-settings'])): ?>

  <li id="sitesetting" class="<?php echo e(Nav::isResource('admin/seo-directory')); ?> <?php echo e(Nav::isRoute('get.user.terms')); ?> <?php echo e(Nav::isRoute('sms.settings')); ?>

    <?php echo e(Nav::isRoute('get.view.m.mode')); ?> <?php echo e(Nav::isRoute('site.lang')); ?>

    <?php echo e(Nav::isResource('admin/abuse')); ?> <?php echo e(Nav::isResource('admin/bank_details')); ?>

    <?php echo e(Nav::isRoute('genral.index')); ?> <?php echo e(Nav::isRoute('mail.getset')); ?> <?php echo e(Nav::isRoute('gen.set')); ?>

    <?php echo e(Nav::isResource('page')); ?> <?php echo e(Nav::isRoute('seo.index')); ?> <?php echo e(Nav::isRoute('api.setApiView')); ?>

    <?php echo e(Nav::isRoute('get.paytm.setting')); ?> <?php echo e(Nav::isResource('page')); ?> <?php echo e(Nav::isRoute('admin.dash')); ?> <?php echo e(Nav::isRoute('static.trans')); ?>">
    <a href="javaScript:void();">
      <i class="feather icon-grid" aria-hidden="true"></i><span><?php echo e(__('Site Settings')); ?></span>
      <i class="feather icon-chevron-right"></i>
    </a>
    <ul class="vertical-submenu">

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.genral-settings')): ?>
      <li class="<?php echo e(Nav::isRoute('genral.index')); ?>"><a href="<?php echo e(url('admin/genral')); ?>"><?php echo e(__('General Settings')); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('seo.manage')): ?>
      <li class="<?php echo e(Nav::isRoute('seo.index')); ?>"><a href="<?php echo e(url('admin/seo')); ?> ">SEO</a></li>
      <li class="<?php echo e(Nav::isResource('admin/seo-directory')); ?>"><a href="<?php echo e(route('seo-directory.index')); ?> "><?php echo e(__('SEO directory')); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.language')): ?>
      <li class="<?php echo e(Nav::isRoute('static.trans')); ?> <?php echo e(Nav::isRoute('site.lang')); ?>"><a
          href="<?php echo e(route('site.lang')); ?>"><?php echo e(__('Site Languages')); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.mail-settings')): ?>
      <li class="<?php echo e(Nav::isRoute('mail.getset')); ?>"><a href="<?php echo e(url('admin/mail-settings')); ?>"><?php echo e(__('Mail Settings')); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.social-login-settings')): ?>
      <li class="<?php echo e(Nav::isRoute('gen.set')); ?>"><a href="<?php echo e(route('gen.set')); ?>"><?php echo e(__('Social Login Settings')); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.sms-settings')): ?>
      <li class="<?php echo e(Nav::isRoute('sms.settings')); ?>"><a href="<?php echo e(route('sms.settings')); ?>"><?php echo e(__('SMS Settings')); ?></a></li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.dashboard-settings')): ?>
      <li class="<?php echo e(Nav::isRoute('admin.dash')); ?>">
        <a href="<?php echo e(route('admin.dash')); ?>"><span><?php echo e(__('Admin Dashboard Settings')); ?></span></a>
      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.seller-settings')): ?>
      <li class="<?php echo e(Nav::isRoute('admin.seller')); ?>">
        <a href="<?php echo e(route('admin.seller')); ?>"><span><?php echo e(__('Best Seller')); ?></span></a>
      </li>
      <?php endif; ?>

      <li class="<?php echo e(Nav::isRoute('admin.banner')); ?>">
        <a href="<?php echo e(route('admin.banner')); ?>"><span><?php echo e(__('Banner Settings')); ?></span></a>
      </li>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.maintenance-mode')): ?>
      <li class="<?php echo e(Nav::isRoute('get.view.m.mode')); ?>">
        <a href="<?php echo e(route('get.view.m.mode')); ?>"><span><?php echo e(__("Maintenance Mode")); ?></span></a>
      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('terms-settings.update')): ?>
      <li id="sitesetting" class="<?php echo e(Nav::isRoute('get.user.terms')); ?>">
        <a href="<?php echo e(route('get.user.terms')); ?>"><span><?php echo e(__('Terms Pages')); ?></span>
        </a>
      </li>
      <?php endif; ?>

      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('site-settings.bank-settings')): ?>
      <li class="<?php echo e(Nav::isResource('admin/bank_details')); ?>"><a href="<?php echo e(url('admin/bank_details')); ?> "></i><span><?php echo e(__('Bank Details')); ?></span></a></li>
      <?php endif; ?>


      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('others.abuse-word-manage')): ?>
      <li class="<?php echo e(Nav::isResource('admin/abuse')); ?>">
        <a href="<?php echo e(url('admin/abuse')); ?>"><span><?php echo e(__('Abuse Word Settings')); ?></span></a>
      </li>
      <?php endif; ?>
    </ul>
  </li>

<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('mediamanager.manage')): ?>

  <li class="<?php echo e(Nav::isRoute('media.manager')); ?>"><a href="<?php echo e(route('media.manager')); ?>"><i class="feather icon-image" aria-hidden="true"></i><span><?php echo e(__("Media Manager")); ?></span></a></li>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('chat.manage')): ?>
  <li id="ticket" class="<?php echo e(Nav::hasSegment(['chats','chat'])); ?>">
    <a href="<?php echo e(route('admin.chat.list')); ?>">
      <i class="feather icon-message-circle" aria-hidden="true"></i><span><?php echo e(__("My Chats")); ?></span></a>
  </li>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('addon-manager.manage')): ?>
  <li class="<?php echo e(Nav::isRoute('addonmanger.index')); ?>"><a
      href="<?php echo e(route('addonmanger.index')); ?> "><i class="feather icon-download"></i><span><?php echo e(__("Add-on Manager")); ?> <small class="badge badge-success float-right"><?php echo e(__('NEW')); ?></small></span>
    </a>
  </li>
<?php endif; ?>

              <li class="header"><?php echo e(__('Support')); ?></li>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('support-ticket.manage')): ?>

                <li id="ticket" class="<?php echo e(Nav::isRoute('tickets.admin')); ?> <?php echo e(Nav::isRoute('ticket.show')); ?>">
                  <a href="<?php echo e(route('tickets.admin')); ?>">
                    <i class="feather icon-volume-1" aria-hidden="true"></i><span><?php echo e(__('Support Tickets')); ?></span></a>
                </li>

              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['others.importdemo','others.database-backup','others.systemstatus'])): ?>
                <li
                  class="<?php echo e(Nav::isRoute('others.settings')); ?> <?php echo e(Nav::isRoute('systemstatus')); ?> <?php echo e(Nav::isRoute('admin.import.demo')); ?> <?php echo e(Nav::isRoute('admin.backup.settings')); ?>">
                  <a href="javaScript:void();">
                    <i class="feather icon-help-circle" aria-hidden="true"></i><span><?php echo e(__('Help & Support')); ?></span>
                    <i class="feather icon-chevron-right"></i>
                  </a>
                  <ul class="vertical-submenu">

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('others.importdemo')): ?>
                    <li class="<?php echo e(Nav::isRoute('admin.import.demo')); ?>">
                      <a href="<?php echo e(url('/admin/import-demo')); ?>"><span><?php echo e(__('Import Demo')); ?></span></a>
                    </li>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('others.database-backup')): ?>
                    <li id="reppro" class="<?php echo e(Nav::isRoute('admin.backup.settings')); ?>">
                      <a href="<?php echo e(route('admin.backup.settings')); ?>"><span><?php echo e(__('Database Backup')); ?></span></a>
                    </li>
                    <?php endif; ?>

                    <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('others.systemstatus')): ?>
                    <li class="<?php echo e(Nav::isRoute('systemstatus')); ?>">
                      <a href="<?php echo e(route('systemstatus')); ?>"><span><?php echo e(__('System Status')); ?></span>
                      </a>
                    </li>
                    <?php endif; ?> -->

                    <?php if(auth()->user()->getRoleNames()->contains('Super Admin')): ?>
                    <li class="<?php echo e(Nav::isRoute('others.settings')); ?>">
                      <a href="<?php echo e(route('others.settings')); ?>"><span><?php echo e(__("Remove Public & Force HTTPS")); ?></span>
                      </a>
                    </li>
                    <?php endif; ?>

                  </ul>
                </li>
              <?php endif; ?>

              <li>
                <a href="<?php echo e(url('clear-cache')); ?>">
                  <i class="feather icon-zap"></i><span><?php echo e(__('Clear Cache')); ?></span>
                </a>
              </li>

            </ul>
          </div>



      </div>
    </div>
    <!-- End Navigationbar -->
  </div>
  <!-- End Sidebar -->
</div><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/layouts/mainsidebar.blade.php ENDPATH**/ ?>