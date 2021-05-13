<?php $__env->startSection('title'); ?> <?php echo e(trans('auth.sign_up'), false); ?> -<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="py-5 bg-primary bg-sections">
    <div class="btn-block text-center text-white position-relative">
      <h1><?php echo e(trans('auth.sign_up'), false); ?></h1>
      <p><?php echo e($settings->title, false); ?></p>
    </div>
  </div><!-- container -->

<div class="py-5 bg-white text-center">
<div class="container margin-bottom-40">

	<div class="row">
<!-- Col MD -->
<div class="col-md-12">
	<div class="d-flex justify-content-center">

        <form action="<?php echo e(url('register'), false); ?>" method="post" class="login-form text-left <?php if(count($errors) > 0): ?>vivify shake <?php endif; ?>" name="form" id="signup_form">

          <?php echo csrf_field(); ?>

          <?php if($settings->captcha == 'on'): ?>
            <?php echo app('captcha')->renderCaptcha(); ?>
          <?php endif; ?>

          <?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <?php if(session('login_required')): ?>
      			<div class="alert alert-danger" id="dangerAlert">
            		<i class="fa fa-warning"></i> <?php echo e(session('login_required'), false); ?>

            		</div>
              <?php endif; ?>

              <?php if(session('notification')): ?>
      						<div class="alert alert-success text-center">
      							<i class="fa fa-check-circle mr-1"></i> <?php echo e(session('notification'), false); ?>

      						</div>
          		<?php endif; ?>

          <?php if($settings->facebook_login == 'on'): ?>
              <div class="mb-2">
                <a href="<?php echo e(url('oauth/facebook'), false); ?>" class="btn btn-block btn-lg fb-button no-hover" style="color:white;"><i class="fab fa-facebook mr-2"></i> <?php echo e(trans('misc.sign_up_with'), false); ?> Facebook</a>
              </div>
            <?php endif; ?>

            <?php if($settings->google_login == 'on'): ?>
                <div class="mb-2">
                  <a href="<?php echo e(url('oauth/google'), false); ?>" class="btn btn-block btn-lg google-button no-hover"><img src="<?php echo e(url('public/img/google.svg'), false); ?>" width="18" height="18" style="vertical-align: text-bottom;" class="mr-2"> <?php echo e(trans('misc.sign_up_with'), false); ?> Google</a>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                  </div>
                <input type="text" class="form-control" required value="<?php echo e(old('name'), false); ?>" name="name" placeholder="<?php echo e(trans('auth.full_name'), false); ?>" title="<?php echo e(trans('users.full_name'), false); ?>">
              </div>
              </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
              </div>
            <input type="email" class="form-control" required value="<?php echo e(old('email'), false); ?>" name="email" placeholder="<?php echo e(trans('auth.email'), false); ?>" title="<?php echo e(trans('auth.email'), false); ?>">
          </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-key"></i></span>
              </div>
            <input type="password" class="form-control" required name="password" id="password" placeholder="<?php echo e(trans('auth.password'), false); ?>" title="<?php echo e(trans('auth.password'), false); ?>" autocomplete="off">
          </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
              </div>
            <input type="password" class="form-control" required name="password_confirmation" placeholder="<?php echo e(trans('auth.confirm_password'), false); ?>" title="<?php echo e(trans('auth.confirm_password'), false); ?>" autocomplete="off">
          </div>
          </div>

          <div class="form-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-globe"></i></span>
              </div>
              <select required class="custom-select" name="countries_id"> 
                <option value=""><?php echo e(trans('misc.select_your_country'), false); ?></option>
                <?php $__currentLoopData = App\Models\Countries::orderBy('country_name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id, false); ?>" <?php echo e($country->id == 111 ? 'selected' : '', false); ?> ><?php echo e($country->country_name, false); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>

          <div class="custom-control custom-checkbox my-1">
           <input type="checkbox" required <?php if( old('agree_gdpr') ): ?> checked="checked" <?php endif; ?> class="custom-control-input" name="agree_gdpr" id="customControlInline" value="1">
           <label class="custom-control-label" for="customControlInline"><?php echo e(trans('admin.i_agree_gdpr'), false); ?>

           <?php if($settings->link_privacy != ''): ?>
             <a href="<?php echo e($settings->link_privacy, false); ?>" target="_blank"><?php echo e(trans('admin.privacy_policy'), false); ?></a>
           <?php endif; ?>
           </label>

         </div>
          <button type="submit" class="btn btn-block mt-2 py-2 btn-primary font-weight-light"><?php echo e(trans('auth.sign_in'), false); ?></button>
          
          <?php if($settings->captcha == 'on'): ?>
            <small class="btn-block text-center"><?php echo e(trans('misc.protected_recaptcha'), false); ?> <a href="https://policies.google.com/privacy" target="_blank"><?php echo e(trans('misc.privacy'), false); ?></a> - <a href="https://policies.google.com/terms" target="_blank"><?php echo e(trans('misc.terms'), false); ?></a></small>
          <?php endif; ?>
          <div class="text-center mt-2">
            <a href="<?php echo e(url('login'), false); ?>"><?php echo e(trans('auth.already_have_an_account'), false); ?></a>
          </div>
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

    <?php if(session('notification')): ?>
    	$('#signup_form, #dangerAlert').remove();
    <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/auth/register.blade.php ENDPATH**/ ?>