
<?php $__env->startSection('title',__('View All Support Tickets | ')); ?>
<?php $__env->startSection('body'); ?>

<?php
  $data['heading'] = 'View All Support Tickets';
  $data['title0'] = 'Site Setting';
  $data['title1'] = 'View All Support Tickets';
?>
<?php echo $__env->make('admin.layouts.topbar',$data, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="contentbar bardashboard-card">   

    <div class="row">
  
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-header">
				  <h5 class="card-title"> <?php echo e(__("View All Support Tickets")); ?></h5>
			    </div>
                
                <div class="card-body">
					<div class="table-responsive">
						<table id="ticket_table" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>#</th>
								<th>
									<?php echo e(__("Ticket No.")); ?>

								</th>
								<th>
									<?php echo e(__("Issue Title")); ?>

								</th>
								<th>
									<?php echo e(__("From")); ?>

								</th>
								<th>
									<?php echo e(__("Status")); ?>

								</th>
								<th>
									<?php echo e(__("Action")); ?>

								</th>
							</tr>
						</thead>
						<tbody>
				
				
						</tbody>
						
						</table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
               

<?php $__env->stopSection(); ?>     
                        
<?php $__env->startSection('custom-script'); ?>
<script>
var url = <?php echo json_encode( route('tickets.admin') ); ?>;
</script>
<script src="<?php echo e(url('js/ticket.js')); ?>"></script>
<?php $__env->stopSection(); ?>     
                    
    
                
<?php echo $__env->make('admin.layouts.master-soyuz', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/ticket/index.blade.php ENDPATH**/ ?>