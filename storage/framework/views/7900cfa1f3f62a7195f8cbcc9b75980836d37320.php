
<?php $__env->startSection('title',__('All Flashdeals')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'All Flashdeals';
  $data['title0'] = 'Marketing Tools';
  $data['title1'] = 'All Flashdeals';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    
                    <div class="row">
                        <div class="col-lg-8">
                            <h3 class="card-title"><?php echo e(__("All flashdeals")); ?></h3>
                        </div>
                        <div class="col-md-4">
                            <div class="widgetbar">
                                <a  href=" <?php echo e(route('flash-sales.create')); ?> " class="btn btn-primary-rgba mr-2">
                                    <i class="feather icon-plus mr-2"></i> <?php echo e(__("Add new flash sale")); ?>

                                </a>
                            </div>
                        </div>
                    </div>
                        
                </div>

                <div class="card-body">
                    <table id="flashdeals" class="table table-striped">
                        <thead>
                            <th>
                                #
                            </th>
                            <th>
                                <?php echo e(__("Deal title")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Start date")); ?>

                            </th>
                            <th>
                                <?php echo e(__("End date")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Banner")); ?>

                            </th>
                            <th>
                                <?php echo e(__("Action")); ?>

                            </th>
                        </thead>

                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
    <script>
            $(function () {
                "use strict";
                var table = $('#flashdeals').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: <?php echo json_encode(route("flash-sales.index"), 15, 512) ?>,
                    language: {
                        searchPlaceholder: "Search deals..."
                    },
                    columns: [
                        {data: 'DT_RowIndex', name: 'flashsales.id', searchable : false},
                        {data : 'title', name : 'flashsales.title'},
                        {data : 'start_date', name : 'flashsales.start_date'},
                        {data : 'end_date', name : 'flashsales.end_date'},
                        {data : 'background_image', name : 'background_image',searchable : false, orderable : false},
                        {data : 'action', name : 'action',searchable : false, orderable : false},
                    ],
                    dom : 'lBfrtip',
                    buttons : [
                        'csv','excel','pdf','print'
                    ],
                    order : [[0,'DESC']]
                });
                
            });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/flashsale/index.blade.php ENDPATH**/ ?>