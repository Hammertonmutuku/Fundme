<?php $__env->startSection('title'); ?> <?php echo e(trans('auth.login'), false); ?> -<?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('content'); ?>
      <div class="py-5 bg-primary bg-sections">
        <div class="btn-block text-center text-white position-relative">
          <h1>Thank you for choosing to donate to <?php echo e($campaign, false); ?></h1>
          <p>Make Donate by clicking the pay button below.</p>
        </div>
      </div><!-- container -->
    
    <div class="py-5 bg-white text-center">
    <div class="container margin-bottom-40">
    
      <div class="row">
    <!-- Col MD -->
    <div class="col-md-12">
      <div class="d-flex justify-content-center">
    
            <form action=<?php echo e($action, false); ?>method="post" class="login-form ">
              <input type="hidden" name="cmd" value="_donations">
              <input type="hidden" name="return" value=<?php echo e($urlSuccess, false); ?>>
              <input type="hidden" name="cancel_return"   value=<?php echo e($urlCancel, false); ?>>
              <input type="hidden" name="cancel_return"   value=<?php echo e($urlPaypalIPN, false); ?>>
              <!-- ***** Form Group ***** -->
              <div class="form-group">
                <label><?php echo e(trans('auth.email'), false); ?></label>
                <input type="email" class="form-control"   value="hammertonmutuku@business.example.com" name="business" placeholder="<?php echo e(trans('auth.email'), false); ?>" title="<?php echo e(trans('auth.email'), false); ?>" autocomplete="off">
             </div><!-- ***** Form Group ***** -->
             <!-- ***** Form Group ***** -->
             <div class="form-group">
              <label>Currency</label>
              <input type="text" class="form-control"   value="USD" name="currency_code" placeholder="USD"  autocomplete="off">
             </div><!-- ***** Form Group ***** -->
             <!-- ***** Form Group ***** -->
             <div class="form-group">
              <label>Amount</label>
              <input type="text" class="form-control"   value=<?php echo e($amount, false); ?> name="amount" placeholder="Enter amount"  autocomplete="off">
            </div><!-- ***** Form Group ***** -->
            <!-- ***** Form Group ***** -->
            <div class="form-group">
              <label> Donate to</label>
              <input type="text" class="form-control"    value=<?php echo e($campaign, false); ?> name="item_name"  placeholder="Enter amount"  autocomplete="off">
            </div><!-- ***** Form Group ***** -->
              <input type="image" name="submit"
                  src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif"
                  alt="PayPal - The safer, easier way to pay online">
            </form>
           
         </div><!-- Login Form -->
         
        
         
       </div><!-- /COL MD -->
      </div><!-- ./ -->
      </div><!-- ./ -->
    </div>
     <!-- container wrap-ui -->
    
    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('javascript'); ?>
      <script type="text/javascript">
    
      <?php if(count($errors) > 0): ?>
          scrollElement('#dangerAlert');
        <?php endif; ?>
    
    </script>
    <?php $__env->stopSection(); ?>
    
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/default/paywithpaypal.blade.php ENDPATH**/ ?>