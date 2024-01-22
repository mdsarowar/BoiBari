<?php if($row->offer_price != 0): ?>
<p> <?php echo e(__("Offer Price :")); ?> <b><?php echo e($currency_code->symbol); ?><?php echo e(sprintf("%.2f",$row->offer_price)); ?></b> </p>
<?php endif; ?>
<p> <?php echo e(__("Price :")); ?> <b><?php echo e($currency_code->symbol); ?><?php echo e(sprintf("%.2f",$row->price)); ?></b> </p>

<p><a role="button" data-target="#pricingModal<?php echo e($row->id); ?>" data-toggle="modal"><span class="badge badge-pill badge-info"><?php echo e(__("View pricing summary")); ?></span></a></p>

<!-- --------------- -->
<div class="modal fade" id="pricingModal<?php echo e($row->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleStandardModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleStandardModalLabel"><?php echo e(__("Pricing Summary for ").$row->product_name); ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <!-- ------- main content start -->
                  <div class="row">

<div class="<?php echo e($row->offer_price != 0 ? "col-md-6" : "col-md-12"); ?>">
  <h4> <?php echo e(__("Pricing Summary")); ?> </h4>
  <hr>

  <div class="row">
    <div align="left" class="left-col col-md-6">
      <b><?php echo e(__("Net Price:")); ?></b>
    </div>
    <div align="right" class="right-col col-md-6">
      <?php echo e($currency_code->symbol); ?><?php echo e(sprintf("%.2f",$row->actual_selling_price)); ?>

    </div>
  </div>

  <hr>
  <h4>
    <?php echo e(__("Tax Summary")); ?>

  </h4>
  <hr>

  <div class="row">
    <div align="left" class="left-col col-md-6">
      <b>
        <?php echo e(__("Tax")); ?></b>:
    </div>
    <div align="right" class="right-col col-md-6">
      <?php echo e($currency_code->symbol); ?><?php echo e(excl_tax_calculator($row->actual_selling_price,$row->tax)); ?> @ <?php echo e($row->tax); ?>%
    </div>
  </div>

  <hr>
  <h4>
    <?php echo e(__("Commission Summary")); ?>

  </h4>
  <hr>

  <div class="row">
    <div align="left" class="left-col col-md-6">
      <b>
        <?php echo e(__("Commission")); ?></b>:
    </div>
    <div align="right" class="right-col col-md-6">
      <?php echo e($currency_code->symbol); ?><?php echo e(commission_calculator($row->actual_selling_price,$row->tax,$row->category_id)); ?>

    </div>
  </div>
</div>
<?php if($row->offer_price != '0'): ?>
<div class="col-md-6">
  <h4>
    <?php echo e(__("Offer Pricing Summary")); ?>

  </h4>
  <hr>
  <div class="row">
    <div align="left" class="left-col col-md-6">
      <b>
          <?php echo e(__("Net Offer Price:")); ?>

      </b>
    </div>
    <div align="right" class="right-col col-md-6">
      <?php echo e($currency_code->symbol); ?><?php echo e(sprintf("%.2f", $row->actual_offer_price)); ?>

    </div>
  </div>

  <hr>

  <h4>
    <?php echo e(__("Tax Summary")); ?>

  </h4>
  <hr>

  <div class="row">
    <div align="left" class="left-col col-md-6">
      <b>
        <?php echo e(__("Tax")); ?></b>:
    </div>
    <div align="right" class="right-col col-md-6">
      <?php echo e($currency_code->symbol); ?><?php echo e(excl_tax_calculator($row->actual_offer_price,$row->tax)); ?> @ <?php echo e($row->tax); ?>%
    </div>
  </div>

  <hr>
  <h4>
    <?php echo e(__("Commission Summary")); ?>

  </h4>
  <hr>

  <div class="row">
    <div align="left" class="left-col col-md-6">
      <b>
        <?php echo e(__("Commission")); ?></b>:
    </div>
    <div align="right" class="right-col col-md-6">
      <?php echo e($currency_code->symbol); ?><?php echo e(commission_calculator($row->actual_offer_price,$row->tax,$row->category_id)); ?>

    </div>
  </div>

</div>
<?php endif; ?>

</div>
<div class="row">
<div class="<?php echo e($row->offer_price != '0' ? "col-md-6" : "col-md-12"); ?>">
  <hr>
  <h4><?php echo e(__("Final Selling Price")); ?></h4>
  <hr>

  <div class="row">
    <div align="left" class="left-col col-md-6">
      <b>
        <?php echo e(__("Selling Price:")); ?>

      </b>
    </div>
    <div align="right" class="right-col col-md-6">

      <?php echo e($currency_code->symbol); ?><?php echo e(sprintf("%.2f", $row->price )); ?>

      <br> <small>
        <?php echo e(__("(Incl. of Tax)")); ?>

      </small>

    </div>
  </div>

</div>
<?php if($row->offer_price != '0'): ?>
<div class="col-md-6">
  <hr>
  <h4>
    <?php echo e(__("Final Selling Offer Price")); ?>

  </h4>
  <hr>

  <div class="row">
    <div align="left" class="left-col col-md-6">
      <b>
        <?php echo e(__("Selling Offer Price:")); ?>

      </b>
    </div>
    <div align="right" class="right-col col-md-6">
      <?php echo e($currency_code->symbol); ?><?php echo e(sprintf("%.2f", $row->offer_price)); ?> 
       <br> 
       <small>
         <?php echo e(__("(Incl. of Tax)")); ?>

       </small>
    </div>

  </div>

</div>
<?php endif; ?>
</div>
                  <!-- ------- main content end  -->
              </div>
           
          </div>
      </div>
  </div>
<!-- ---------------- --><?php /**PATH D:\xampp\htdocs\boibari\resources\views/admin/simpleproducts/price.blade.php ENDPATH**/ ?>