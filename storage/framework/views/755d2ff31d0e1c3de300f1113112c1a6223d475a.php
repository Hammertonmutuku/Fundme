<?php $__env->startSection('title'); ?> <?php echo e(trans('auth.login'), false); ?> -<?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('content'); ?>
      <div class="py-5 bg-primary bg-sections">
        <div class="btn-block text-center text-white position-relative">
          <h1>Thank you for choosing to donate to <?php echo e($account, false); ?></h1>
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
                <div id="c2b_response"></div>
              <!-- ***** Form Group ***** -->
              <div class="form-group">
                <label>Phone number</label>
                <input type="tel" class="form-control"   value=<?php echo e($phone, false); ?> name="phone" id="phone" placeholder="+25471234567" autocomplete="off">
             </div><!-- ***** Form Group ***** -->
             <!-- ***** Form Group ***** -->
             <div class="form-group">
              <label>Amount</label>
              <input type="text" class="form-control"   value=<?php echo e($amount, false); ?> name="amount" id="amount" placeholder="Enter amount"  autocomplete="off">
            </div><!-- ***** Form Group ***** -->
            <!-- ***** Form Group ***** -->
            <div class="form-group">
              <label> Donate to</label>
              <input type="text" class="form-control"    value=<?php echo e($account, false); ?> name="item_name" id="account"  placeholder="Enter amount"  autocomplete="off">
            </div><!-- ***** Form Group ***** -->
            <button id="stkpush" class="btn btn-block mt-2 py-2 btn-primary font-weight-ligh">Donate</button>
            </form>
           
         </div><!-- Login Form -->
         
        
         
       </div><!-- /COL MD -->
      </div><!-- ./ -->
      </div><!-- ./ -->
    </div>
     <!-- container wrap-ui -->
    
    <?php $__env->stopSection(); ?>
    
    <?php $__env->startSection('javascript'); ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
      <script type="text/javascript">
     
    
      <?php if(count($errors) > 0): ?>
          scrollElement('#dangerAlert');
        <?php endif; ?>

  
 document.getElementById('stkpush').addEventListener('click', (event) => {
    event.preventDefault()
    
    const requestBody = {
        amount: document.getElementById('amount').value,
        account: document.getElementById('account').value,
        phone: document.getElementById('phone').value
    }

    axios.post('http://localhost/Fundme/Script/stkpush', requestBody)
    .then((response) => {
        if(response.data.ResponseDescription){
            document.getElementById('c2b_response').innerHTML = response.data.ResponseDescription
        } else {
            document.getElementById('c2b_response').innerHTML = response.data.errorMessage
        }
    })
    .catch((error) => {
        console.log(error);
    })
})
    
    </script>
    <?php $__env->stopSection(); ?>
    
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/default/paywithmpesa.blade.php ENDPATH**/ ?>