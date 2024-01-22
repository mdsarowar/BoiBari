
<?php $__env->startSection('title','Emart | My Account'); ?>
<?php $__env->startSection("content"); ?>   
<!-- Home Start -->
<section id="home" class="home-main-block product-home">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <nav aria-label="breadcrumb" class="breadcrumb-main-block">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>" title="Home"><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('Account')); ?></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Chat')); ?></li>
          </ol>
        </nav>
        <div class="about-breadcrumb-block wishlist-breadcrumb" style="background-image: url('<?= URL::to('/'); ?>/frontend/assets/images/wishlist/breadcrum.png');">
          <div class="breadcrumb-nav">
              <h3 class="breadcrumb-title"><?php echo e(__('Chat')); ?></h3>
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
            <?php $active['active'] = 'Mychat'; ?>
          <?php echo $__env->make('frontend.profile.sidebar',$active, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <div class="col-lg-9 col-md-8">
            <div class="tab-content" id="v-pills-tabContent">
                
                <div class="chat-main-block">
                    <div class="mb-20">
                        <h5 class="card-title"><i class="feather icon-message-circle"></i><?php echo e(__('My Chats')); ?></h5>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <?php $__empty_1 = true; $__currentLoopData = $conversations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="shadow-sm card mb-3 border chat-conversation">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="chat-conversation-block">
                                                    <h6 class="box-title"><?php echo e(__('Conversation ID')); ?></h6>
                                                    <p><a href="<?php echo e(route('user.chat.view',$chat->conv_id)); ?>"><?php echo e($chat->conv_id); ?></a></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="chat-conversation-block">
                                                    <h6 class="box-title"><?php echo e(__('Conversation with')); ?></h6>
                                                    <p><?php echo e($chat->sender->name); ?></p>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="chat-conversation-block">
                                                    <h6 class="box-title"><?php echo e(__('Last Message')); ?></h6>
                                                    <p> <b><?php if(isset($chat->chat->last()->message)){ echo $chat->chat->last()->message; } ?> </b> <?php echo e(__('from')); ?> <?php  if(isset($chat->chat->last()->user->name)){ echo $chat->chat->last()->user->name; } ?> -  <?php if(isset($chat->chat->last()->created_at)){ echo $chat->chat->last()->created_at->format('jS M Y - h:i A'); } ?>  </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="chat-list">
                                <div class="chat-search">
                                    <div class="order-block">
                                        <form class="search-form">
                                            <div class="input-group">                        
                                                <div class="form-group">
                                                    <input type="search" name="user" class="form-control" id="search" placeholder="Search">
                                                    <button type="submit">
                                                        <div class="search-icon">
                                                            <i data-feather="search"></i>
                                                        </div>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="chat-user-list">
                                    <ul class="list-unstyled mb-0">
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <a href="<?php echo e(route('adminchat.start',$user->id)); ?>">
                                                <li class="media">
                                                    <?php if($user->image != '' && file_exists(public_path().'/images/user/'.$user->image)): ?>
                                                        <img class="align-self-center mr-3 rounded-circle img-fluid" src="<?php echo e(url('images/user/'.$user->image)); ?>"/>
                                                    <?php else: ?> 
                                                        <img class="align-self-center mr-3 rounded-circle img-fluid" src="<?php echo e(Avatar::create($user->name)->toBase64()); ?>"/>
                                                    <?php endif; ?>
                                                    <div class="media-body">
                                                        <h5><?php echo e($user->name); ?></h5>
                                                        <?php if($user->role_id=='a'): ?>
                                                        <p>Admin</p>
                                                        <?php elseif($user->role_id=='c'): ?>
                                                        <p>Customer</p>
                                                        <?php else: ?>
                                                        <p>Vendor</p>
                                                        <?php endif; ?>
                                                    </div>
                                                </li>
                                            </a>  
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                                    </ul>
                                    <small><?php echo $users->links(); ?></small>  
                                </div>
                            </div>
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
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('frontend/assets/vendor/chat/custom-chat.js')); ?>"></script>
<script src="<?php echo e(url('frontend/assets/js/jquery.slimscroll.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make("frontend.layout.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/profile/chat.blade.php ENDPATH**/ ?>