<div class="col-lg-3 col-md-4">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link <?php echo e($active=='Info'?'active':''); ?>" href="<?php echo e(url('profile')); ?>"><i data-feather="user"></i><?php echo e(__('Personal Info')); ?></a>
        <a class="nav-link <?php echo e($active=='Address'?'active':''); ?>" href="<?php echo e(url('manageaddress')); ?>"><i data-feather="columns"></i><?php echo e(__('Manage Address')); ?></a>
        <a class="nav-link <?php echo e($active=='2Fa'?'active':''); ?>" href="<?php echo e(url('2fa')); ?>"><i data-feather="unlock"></i><?php echo e(__('2FA Auth')); ?></a>
        <?php if($aff_system && $aff_system->enable_affilate == 1): ?>
        <a class="nav-link <?php echo e($active=='Affilate'?'active':''); ?>" href="<?php echo e(url('user/affiliate/settings')); ?>"><i data-feather="users"></i><?php echo e(__('Affiliate Dashboard')); ?></a>
        <?php endif; ?>
        <a class="nav-link <?php echo e($active=='Myorder'?'active':''); ?>" href="<?php echo e(url('order')); ?>"><i data-feather="crosshair"></i><?php echo e(__('My Orders')); ?></a>
        <a class="nav-link <?php echo e($active=='Mychat'?'active':''); ?>" href="<?php echo e(url('mychats')); ?>"><i data-feather="message-circle"></i><?php echo e(__('My Chats')); ?></a>
        <!-- <?php if($wallet_system == 1): ?> -->
        <a class="nav-link <?php echo e($active=='Wallet'?'active':''); ?>" <?php echo e(Nav::isRoute('user.wallet.show')); ?>" href="<?php echo e(route('user.wallet.show')); ?>"><i data-feather="credit-card"></i> <?php echo e(__('My Wallet')); ?></a>
        <!-- <?php endif; ?> -->
        <a class="nav-link <?php echo e($active=='Failedt'?'active':''); ?>" href="<?php echo e(url('myfailedtranscations')); ?>"><i data-feather="list"></i><?php echo e(__('My Failed Trancations')); ?></a>
        <a class="nav-link <?php echo e($active=='Ticket'?'active':''); ?>" href="<?php echo e(url('mytickets')); ?>"><i data-feather="file"></i><?php echo e(__('My Tickets')); ?></a>
        <a class="nav-link <?php echo e($active=='Mybankac'?'active':''); ?>" href="<?php echo e(url('mybank')); ?>"><i data-feather="credit-card"></i><?php echo e(__('My Bank Accounts')); ?></a>
        <?php if($vendor_system == 1): ?>
            <?php if(empty($sellerac) && Auth::user()->role_id != "a"): ?>
            <a class="nav-link" id="v-applysellerac-tab" data-bs-toggle="pill" href="#v-applysellerac" type="button" role="tab" aria-controls="v-applysellerac" aria-selected="false"><i data-feather="check-circle"></i><?php echo e(__('Apply for Seller Account')); ?></a>
            <?php elseif(Auth::user()->role_id != "a"): ?>
            <a class="nav-link" id="v-sellerac-tab" data-bs-toggle="pill" href="#v-sellerac" type="button" role="tab" aria-controls="v-sellerac" aria-selected="false"><i data-feather="aperture"></i><?php echo e(__('Seller Dashboard')); ?></a>
            <?php endif; ?>
        <?php endif; ?>
        <a class="nav-link <?php echo e($active=='ChangePassword'?'active':''); ?>" href="<?php echo e(url('change/password')); ?>"><i data-feather="key"></i><?php echo e(__('Change Password')); ?></a>

    </div>
</div><?php /**PATH D:\xampp\htdocs\boibari\resources\views/frontend/profile/sidebar.blade.php ENDPATH**/ ?>