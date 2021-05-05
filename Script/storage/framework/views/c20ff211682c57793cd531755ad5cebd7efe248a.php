<?php $__env->startSection('title'); ?> <?php echo e(trans('users.account_settings'), false); ?> - <?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="jumbotron mb-0 bg-sections text-center">
      <div class="container wrap-jumbotron position-relative">
        <h1><?php echo e(trans('users.account_settings'), false); ?></h1>
        <p class="mb-0">
          <?php echo e(trans('misc.account_desc'), false); ?>

        </p>
      </div>
    </div>

<div class="container py-5">

  <div class="wrap-container">
			<!-- Col MD -->
		<div class="col-md-12">

			<?php if(session('notification')): ?>
			<div class="alert alert-success btn-sm alert-dismissible fade show" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            		<?php echo e(session('notification'), false); ?>

            		</div>
            	<?php endif; ?>

			<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<!-- *********** AVATAR ************* -->

		<form action="<?php echo e(url('upload/avatar'), false); ?>" method="POST" id="formAvatar" accept-charset="UTF-8" enctype="multipart/form-data">
    		<?php echo csrf_field(); ?>

    		<div class="text-center position-relative avatar-wrap">

          <div class="progress-upload">0%</div>

          <?php if(auth()->user()->status != 'pending'): ?>
          <a href="javascript:;" class="position-absolute button-avatar-upload" id="avatar_file">
            <i class="fa fa-camera"></i>
          </a>
          <input type="file" name="photo" id="uploadAvatar" accept="image/*" style="visibility: hidden;">
          <?php endif; ?>

		  

		  <img src="<?php echo e(asset('public/avatar'), false); ?>/<?php echo e(auth()->user()->avatar == '' ? 'default.jpg' : auth()->user() ->avatar, false); ?>"  class="rounded-circle avatarUser" width="125" height="125" />
    		</div>
			</form><!-- *********** AVATAR ************* -->



		<!-- ***** FORM ***** -->
       <form action="<?php echo e(url('account'), false); ?>" method="post" name="form">
          	<?php echo csrf_field(); ?>
            <!-- ***** Form Group ***** -->
            <div class="form-group has-feedback">
            	<label><?php echo e(trans('misc.full_name_misc'), false); ?></label>
              <input type="text" class="form-control" value="<?php echo e(e( auth()->user()->name ), false); ?>" name="full_name" placeholder="<?php echo e(trans('misc.full_name_misc'), false); ?>" title="<?php echo e(trans('misc.full_name_misc'), false); ?>" autocomplete="off">
             </div><!-- ***** Form Group ***** --> 

			<!-- ***** Form Group ***** -->
            <div class="form-group">
            	<label><?php echo e(trans('auth.email'), false); ?></label>
              <input type="email" class="form-control" value="<?php echo e(auth()->user()->email, false); ?>" name="email" placeholder="<?php echo e(trans('auth.email'), false); ?>" title="<?php echo e(trans('auth.email'), false); ?>" autocomplete="off">
         </div><!-- ***** Form Group ***** -->

         <!-- ***** Form Group ***** -->
            <div class="form-group">
            	<label><?php echo e(trans('misc.country'), false); ?></label>
            	<select name="countries_id" class="custom-select" >
                <option value=""><?php echo e(trans('misc.select_your_country'), false); ?></option>
                  <?php $__currentLoopData = App\Models\Countries::orderBy('country_name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option <?php if( auth()->user()->countries_id == $country->id ): ?> selected="selected" <?php endif; ?> value="<?php echo e($country->id, false); ?>"><?php echo e($country->country_name, false); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
            	    </div><!-- ***** Form Group ***** -->

           <button type="submit" id="buttonSubmit" class="btn btn-block btn-lg btn-primary no-hover"><?php echo e(trans('misc.save_changes'), false); ?></button>

           <div class="text-center mt-3">
             <a href="<?php echo e(url('account/password'), false); ?>"><i class="fa fa-lock"></i> <?php echo e(trans('misc.change_password'), false); ?></a>
           </div>

       </form><!-- ***** END FORM ***** -->

		</div><!-- /COL MD -->
  </div><!-- / Wrap -->

 </div><!-- container -->

 <!-- container wrap-ui -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">

	//<<<<<<<=================== * UPLOAD AVATAR  * ===============>>>>>>>//
    $(document).on('change', '#uploadAvatar', function() {

      $('.progress-upload').show();

   (function() {

     var percent = $('.progress-upload');
 		 var percentVal = '0%';

	 $("#formAvatar").ajaxForm({
	 dataType : 'json',

   beforeSend: function() {
      percent.html(percentVal);
  },
  uploadProgress: function(event, position, total, percentComplete) {
      var percentVal = percentComplete + '%';
      percent.html(percentVal);
  },
	 success:  function(e){
	 if (e) {

     if (e.success == false) {
		$('.progress-upload').hide();

		var error = '';
        for($key in e.errors) {
        	error += '' + e.errors[$key] + '';
        }
		swal({
    			title: "<?php echo e(trans('misc.error_oops'), false); ?>",
    			text: ""+ error +"",
    			type: "error",
    			confirmButtonText: "<?php echo e(trans('users.ok'), false); ?>"
    			});

			$('#uploadAvatar').val('');
      percent.html(percentVal);

		} else {

			$('#uploadAvatar').val('');
			$('.avatarUser').attr('src',e.avatar);
      $('.progress-upload').hide();
      percent.html(percentVal);
		}

		}//<-- e
			else {
        $('.progress-upload').hide();
        percent.html(percentVal);
				swal({
    			title: "<?php echo e(trans('misc.error_oops'), false); ?>",
    			text: '<?php echo e(trans("misc.error"), false); ?>',
    			type: "error",
    			confirmButtonText: "<?php echo e(trans('users.ok'), false); ?>"
    			});

				$('#uploadAvatar').val('');
			}
		   }//<----- SUCCESS
		}).submit();
    })(); //<--- FUNCTION %
});//<<<<<<<--- * ON * --->>>>>>>>>>>
//<<<<<<<=================== * UPLOAD AVATAR  * ===============>>>>>>>//
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/users/account.blade.php ENDPATH**/ ?>