
<?php $__env->startSection('title','BoiBari | My Account'); ?>
<?php $__env->startSection("content"); ?>   
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<!-- Home Start -->
<section id="home" class="home-main-block product-home">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb" class="breadcrumb-main-block">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Account')); ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Manage Address')); ?></li>
          </ol>
        </nav>
        <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('<?= URL::to('/'); ?>/frontend/assets/images/wishlist/breadcrum.png');">
          <div class="breadcrumb-nav">
              <h3 class="breadcrumb-title"><?php echo e(__('Manage Address')); ?></h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Home End -->

<!-- My Account Start -->
<section id="my-account" class="my-account-main-block popular-item-main-block">
  <div class="container">
    <div class="row">
      <?php $active['active'] = 'Address'; ?>
      <?php echo $__env->make('frontend.profile.sidebar',$active, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <div class="col-lg-9 col-md-8">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="personal-info-block">
            <div class="row">
              <div class="col-lg-6">
                <h3 class="section-title"><?php echo e(__('Manage Address')); ?></h3>
              </div>
              <div class="col-lg-6">
                <a href="javascript:" data-bs-toggle="modal" data-bs-target="#mngaddress" class="btn btn-info"><i data-feather="plus" width="18px" height="18px"></i> <?php echo e(__('Add New')); ?></a>
                <!-- Add Modal -->
                <div class="modal fade" id="mngaddress" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="p-2 modal-title" id="myModalLabel"><?php echo e(__('Add Address')); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form action="<?php echo e(route('address.store')); ?>" role="form" method="POST">
                          <?php echo csrf_field(); ?>

                          <?php
                            $ifadd = count(Auth::user()->addresses);
                          ?>

                          <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                              <div class="mb-3">
                                <label class="font-weight-bold" class="font-weight-normal"><?php echo e(__('Name')); ?>:</label>
                                <input required type="text" <?php if($ifadd<1): ?> value="<?php echo e(Auth::user()->name); ?>" <?php else: ?> value="" <?php endif; ?> placeholder="<?php echo e(__('Enter name')); ?>" name="name" class="form-control">
                              </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                              <div class="mb-3">
                                <label class="font-weight-bold" class="font-weight-normal"><?php echo e(__('Phone No')); ?>:</label>
                                <input  required type="text" <?php if($ifadd<1): ?> value="<?php echo e(Auth::user()->mobile); ?>" <?php else: ?> value="" <?php endif; ?> name="phone" placeholder="<?php echo e(__('Enter phone no')); ?>" class="form-control">
                              </div>
                            </div>
                              <?php echo $__env->make('frontend.bdlocation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


















































                            <div class="col-lg-12 col-md-12 col-12">
                              <div class="mb-3">
                                <label class="font-weight-bold" class="font-weight-normal"><?php echo e(__('Address')); ?>: </label>
                                <textarea required name="address" id="address" cols="20" rows="5" class="form-control"><?php echo e(old('address')); ?></textarea>
                              </div>
                            </div>




























                           
                            <div class="col-lg-12 col-md-12 col-12">
                              <div class="mb-3">
                                <div class="form-group checkout-personal-dtl">
                                  <label class="address-checkbox"><?php echo e(__('Set Default Address')); ?>

                                    <input type="checkbox" name="setdef"> 
                                    <span class="checkmark"></span>
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-12">
                              <button class="btn btn-primary"><i data-feather="save"></i><?php echo e(__('Submit')); ?></button>
                            </div>
                          </div>
                        </form>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row mt-4">
                <?php if(count($addresss)>0): ?>
                  <?php $__currentLoopData = $addresss; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                    <table class="table manage-address-block ">







                      <tbody>


                        <tr>
                          <td style="width: 25%">
                            <div class="<?php echo e($address->defaddress == 1 ? "active" : "user-header"); ?>">
                              <h6><?php echo e($address->name); ?>, <?php echo e($address->phone); ?></h6>
                              <?php if($address->defaddress == 1): ?>
                              <div class="ribbon ribbon-top-right"><span><?php echo e(__('Default')); ?></span></div>
                              <?php endif; ?>
                            </div>
                          </td>
                          <td style="width: 60%">
                            <p><?php echo e(strip_tags($address->address)); ?></p>

                          </td>
                          <td style="width: 15%">
                            <div class="manage-add-btn">
                              <button title="<?php echo e(__('Edit Address')); ?>" data-bs-toggle="modal" data-bs-target="#editModal<?php echo e($address->id); ?>" class="editlabel btn btn-sm btn-info">
                                <i data-feather="edit"></i>
                              </button>
                              <button title="<?php echo e(__('Delete Address')); ?>" type="button" <?php if(env('DEMO_LOCK')==0): ?> data-bs-toggle="modal" data-bs-target="#deletemodal<?php echo e($address->id); ?>" <?php else: ?> disabled="" title="This action is disabled in demo !" <?php endif; ?> class="delbtn btn btn-danger btn-sm"><i data-feather="trash"></i></button>
                            </div>
                          </td>
                        </tr>

                      </tbody>
                    </table>

                    
                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal<?php echo e($address->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="p-2 modal-title" id="myModalLabel"><?php echo e(__('Edit Address')); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="<?php echo e(route('address.update',$address->id)); ?>" role="form" method="POST">
                              <?php echo csrf_field(); ?>
                              <div class="row">
                                <div class="col-lg-4 col-md-6 col-12">
                                  <div class="mb-3">
                                    <label class="font-weight-bold" class="font-weight-normal" for="name"><?php echo e(__('Name')); ?>:<span class="required">*</span></label>
                                    <input required="" name="name" type="text" value="<?php echo e($address->name); ?>" placeholder="<?php echo e(__('Name')); ?>" class="form-control">
                                  </div>
                                </div>






                                <div class="col-lg-4 col-md-6 col-12">
                                  <div class="mb-3">
                                    <label class="font-weight-bold" class="font-weight-normal" for="email"><?php echo e(__('PhoneNo')); ?>: <span class="required">*</span></label>
                                    <input  type="text" placeholder="Edit Phone no" class="form-control" name="<?php echo e(__('phone')); ?>" value="<?php echo e($address->phone); ?>">
                                  </div>
                                </div>
                                <?php echo $__env->make('frontend.edit_bdlocation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                









                                <div class="col-lg-12 col-md-12 col-12">
                                  <div class="mb-3">
                                    <label class="font-weight-bold" class="font-weight-normal"><?php echo e(__('Address')); ?>: <span class="required">*</span></label>
                                    <textarea required="" name="address" id="address" cols="20" rows="5" class="form-control"><?php echo e(strip_tags($address->address)); ?></textarea>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-6 col-12">
                                <div class="mb-3">
                                  <div class="form-group checkout-personal-dtl">
                                    <label class="address-checkbox"><?php echo e(__('Set Default Address')); ?>

                                      <input <?php echo e($address->defaddress == 1 ? "checked" : ""); ?> type="checkbox" name="setdef"> 
                                      <span class="checkmark"></span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-6 col-12">
                                <button class="btn btn-primary"><i data-feather="save"></i><?php echo e(__('Update')); ?></button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade delete-modal" id="deletemodal<?php echo e($address->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          <div class="delete-icon"></div>
                        </div>
                        <div class="modal-body text-center">
                          <h5 class="modal-heading"><?php echo e(__('Are You Sure ?')); ?></h5>
                          <p><?php echo e(__('Do you really want to delete this address? This process cannot be undone')); ?>.</p>
                        </div>
                        <div class="modal-footer">
                          <form method="post" action="<?php echo e(route('address.del',$address->id)); ?>" class="pull-right">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field("DELETE")); ?>

                            <button type="reset" class="btn btn-primary translate-y-3" data-bs-dismiss="modal">
                              <?php echo e(__('No')); ?>

                            </button>
                            <button type="submit" class="btn btn-danger">
                              <?php echo e(__('Yes')); ?>

                            </button>
                          </form>
                        </div>
                      </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  <?php echo e($addresss->links()); ?>

                <?php else: ?>
                  <h2><a class="cursor" data-target="#mngaddress" data-toggle="modal"><?php echo e(__('No Address')); ?></a></h2>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- My Account End -->

<?php $__env->stopSection(); ?>
<?php $__env->startSection("script"); ?>
  <script>
    console.log('sarowar');

  </script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/profile/address.blade.php ENDPATH**/ ?>