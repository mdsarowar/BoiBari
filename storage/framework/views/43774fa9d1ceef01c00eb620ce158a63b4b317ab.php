
<?php $__env->startSection('title',__('All Orders |')); ?>
<?php $__env->startSection('body'); ?>
<?php
  $data['heading'] = 'Orders';
  $data['title0'] = 'Order & Invoices';
  $data['title1'] = 'Orders';
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
                <h5 class="card-title"> <?php echo e(__("Orders")); ?></h5>
            </div>
            <div class="col-md-4">
              <div class="widgetbar">
                <a type="button" class="btn btn-danger-rgba btn-md z-depth-0" data-toggle="modal" data-target="#bulk_delete"><i class="fa fa-trash"></i> <?php echo e(__('Delete Selected')); ?></a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
         <!-- main content start -->
        <div class="table-responsive">
                        <!-- table to display faq start -->
          <table id="all_orders" class="table table-striped table-bordered">
            <thead>
              <th>
              <div class="inline">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" id="checkboxAll">
                <label for="checkboxAll" class="material-checkbox"></label>
              </div>
              </th>
              <th><?php echo e(__('ID')); ?></th>
              <th><?php echo e(__('Order Type')); ?></th>
              <th><?php echo e(__('Order Id')); ?></th>
              <th><?php echo e(__('Customer Name')); ?></th>
              <th><?php echo e(__('Total Qty')); ?></th>
              <th><?php echo e(__('Total Amount')); ?></th>
              <th><?php echo e(__('Order Date')); ?></th>
              <th><?php echo e(__('Action')); ?></th>
            </thead>
            <tbody>
            </tbody>
          </table>                  
        </div><!-- table-responsive div end -->
      </div>
      </div>
    </div>
   </div>
</div>
​
            
                       
        

<!--bulk delete modal -->
<div id="bulk_delete" class="delete-modal modal fade" role="dialog">
        <div class="modal-dialog modal-sm">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
              <h4 class="modal-heading"><?php echo e(__("Are You Sure ?")); ?></h4>
              <p><?php echo e(__("Do you really want to delete these orders? This process cannot be undone.")); ?></p>
            </div>
            <div class="modal-footer">
             <form id="bulk_delete_form" method="post" action="<?php echo e(route('order.bulk.delete')); ?>">
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
  <script>
      $(function () {
        "use strict";
        var table = $('#all_orders').DataTable({
            processing: true,
            serverSide: true,
            ajax: "<?php echo e(route('order.index')); ?>",
            language: {
              searchPlaceholder: "Search orders..."
            },
            columns: [
                {data: 'checkbox', name: 'checkbox', searchable : false, orderable : false},
                {data: 'DT_RowIndex', name: 'DT_RowIndex', searchable : false, orderable : false},
                {data : 'order_type', name : 'orders.payment_method'},
                {data : 'order_id', name : 'orders.order_id'},
                {data : 'customer_dtl', name : 'user.name'},
                {data : 'total_qty', name : 'orders.qty_total'},
                {data : 'total_amount', name : 'orders.order_total'},
                {data : 'order_date', name : 'orders.created_at'},
                {data: 'action', name: 'action', searchable : false, orderable : false}
            ],
            dom : 'lBfrtip',
            buttons : [
              'csv','excel','pdf','print'
            ],
            order : [[7,'DESC']]
        });
        
  });
  </script>
  <script>var baseUrl = "<?= url('/') ?>";</script>
  <script src="<?php echo e(url('js/order.js')); ?>"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/order/index.blade.php ENDPATH**/ ?>