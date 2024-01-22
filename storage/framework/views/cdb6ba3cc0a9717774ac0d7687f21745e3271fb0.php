
<?php $__env->startSection('title',__('Block Detail Page Advertising |')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'Block Detail Page Advertising';
  $data['title0'] = 'Marketing';
  $data['title1'] = 'Block Detail Page Advertising';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card"> 
    <div class="row">
        
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    
                    <div class="row">
                      <div class="col-lg-8">
                        <h5 class="box-title"><?php echo e(__('List Block Detail Page Ads')); ?></h5>
                      </div>
                      <div class="col-md-4">
                        <div class="widgetbar">
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blockadvertisments.create')): ?>
                              <a  href=" <?php echo e(url('admin/detailadvertise/create')); ?> " class="btn btn-primary-rgba mr-2">
                                  <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add New Block Detail Advertise")); ?>

                              </a>
                          </div>  
                          <?php endif; ?>     
                        </div>
                      </div>

                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="full_detail_table" class="width100 table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th><?php echo e(__('ID')); ?></th>
                          <th><?php echo e(__('Preview')); ?></th>
                          <th><?php echo e(__('Ad Position')); ?></th>
                          <th><?php echo e(__('Details')); ?></th>
                          <th><?php echo e(__('Status')); ?></th>
                          <th><?php echo e(__('Action')); ?></th>
                        </tr>
                      </thead>
                      <tbody>
                
                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                        <tr>
                          <td><?php echo e($key+1); ?></td>
                          <td>
                            <?php if($detail->linkby != 'adsense'): ?>
                            <img src="<?php echo e(url('images/detailads/'.$detail->adimage)); ?>" alt="" class="pro-img">
                            <?php else: ?>
                            <b>
                              <?php echo e(__('Google adsense preview not available !')); ?>

                            </b>
                            <?php endif; ?>
                          </td>
                          <td>
                
                            <?php if($detail->position == 'category'): ?>
                            <p><b><?php echo e(__('On Category Page')); ?></b></p>
                            <?php else: ?>
                            <p><b><?php echo e(__('On Product Detail Page')); ?></b></p>
                            <?php endif; ?>
                
                            <p><b><?php echo e(__('Display On')); ?>:</b>
                
                              <?php
                
                
                              $detailpage = App\Category::where('id',$detail->linked_id)->first();
                
                              if(!isset($detailpage)){
                              $detailpage = App\Product::where('id',$detail->linked_id)->first();
                              }
                
                              ?>
                
                              <?php if(isset($detailpage)): ?>
                              <?php if(isset($detailpage['name'])): ?>
                              <?php echo e($detailpage['name'] ?? '-'); ?>

                              <?php else: ?>
                              <?php echo e($detailpage['title'] ?? '-'); ?>

                              <?php endif; ?>
                              <?php endif; ?>
                            </p>
                          </td>
                          <td>
                            <p><b>Linked To:</b>
                              <?php if(isset($detailpage)): ?>
                              <?php if($detail->linkby == 'detail'): ?>
                              <?php echo e($detail->product['name'] ?? '-'); ?>

                              <?php elseif($detail->linkby == 'category'): ?>
                              <?php echo e($detail->category['title'] ?? '-'); ?>

                              <?php elseif($detail->linkby == 'url'): ?>
                              <?php echo e(__("Custom URL")); ?>

                              <?php elseif($detail->linkby == 'adsense'): ?>
                              <?php echo e(__("Google Adsense Script")); ?>

                              <?php endif; ?></p>
                            <?php if($detail->top_heading !=''): ?>
                            <p><b><?php echo e(__("Heading Text")); ?>:</b> <?php echo e($detail->top_heading); ?></p>
                            <?php endif; ?>
                
                            <?php if($detail->btn_text != ''): ?>
                            <p><b><?php echo e(__("Button text")); ?>:</b> <?php echo e($detail->btn_text); ?></p>
                            <?php endif; ?>
                            <?php endif; ?>
                          </td>
                          <td>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blockadvertisments.edit')): ?>
                            <form action="<?php echo e(route('detail_button.quick.update',$detail->id)); ?>" method="POST">
                              <?php echo e(csrf_field()); ?>

                              <button <?php if(env('DEMO_LOCK')==0): ?> type="submit" <?php else: ?> disabled="disabled"
                                title="<?php echo e(__("This operation is disabled in Demo !")); ?>" <?php endif; ?>
                                class="btn btn-rounded <?php echo e($detail->status==1 ? "btn-success-rgba" : "btn-danger-rgba"); ?>">
                                <?php echo e($detail->status ==1 ? __('Active') : __('Deactive')); ?>

                              </button>
                            </form>
                            <?php endif; ?>
                          </td>
                
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-round btn-primary-rgba" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                              <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blockadvertisments.edit')): ?>
                                  <a class="dropdown-item" href="<?php echo e(route('detailadvertise.edit',$detail->id)); ?>"><i class="feather icon-edit mr-2"></i><?php echo e(__("Edit")); ?></a>
                                  <?php endif; ?>
              
                                  <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blockadvertisments.delete')): ?>
                                  <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete<?php echo e($detail->id); ?>" >
                                    <i class="feather icon-delete mr-2"></i><?php echo e(__("Delete")); ?></a>
                                </a>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blockadvertisments.delete')): ?>
                          <div class="modal fade bd-example-modal-sm" id="delete<?php echo e($detail->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleSmallModalLabel"><?php echo e(__("DELETE")); ?></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                            <h4><?php echo e(__('Are You Sure ?')); ?></h4>
                                            <p><?php echo e(__('Do you really want to delete')); ?>? <?php echo e(__('This process cannot be undone.')); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <form method="post" action="<?php echo e(route('detailadvertise.destroy',$detail->id)); ?>" class="pull-right">
                                            <?php echo e(csrf_field()); ?>

                                            <?php echo e(method_field("DELETE")); ?>

                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__("No")); ?></button>
                                            <button type="submit" class="btn btn-primary"><?php echo e(__("YES")); ?></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                           
                          </td>
                
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>

                  </div>
                </div>
            </div>
        </div>
    </div>
  </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/detailAds/index.blade.php ENDPATH**/ ?>