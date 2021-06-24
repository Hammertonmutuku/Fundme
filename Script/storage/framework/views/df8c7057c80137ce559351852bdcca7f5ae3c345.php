<?php $__env->startSection('title'); ?><?php echo e(trans('misc.post_an_update').' - ', false); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

 <div class="jumbotron mb-0 bg-sections text-center">
      <div class="container wrap-jumbotron position-relative">
      	<h1><?php echo e(trans('misc.post_an_update'), false); ?></h1>
        <p class="mb-0">
          <?php echo e($data->title, false); ?>

        </p>
      </div>
    </div>

<div class="container py-5">
	<div class="row">

    <div class="wrap-container-lg">
	<!-- col-md-8 -->
	<div class="col-md-12">

			<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- form start -->
    <form method="POST" action="" enctype="multipart/form-data" id="formUpdateCampaign">

    	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
    	<input type="hidden" name="id" value="<?php echo e($data->id, false); ?>">
		<div class="filer-input-dragDrop position-relative" id="draggable">
			<input type="file" accept="image/*" name="photo" id="filePhoto">

			<!-- previewPhoto -->
			<div class="previewPhoto">

				<div class="btn btn-danger btn-sm btn-remove-photo" id="removePhoto" title="<?php echo e(trans('misc.delete'), false); ?>">
					<i class="fa fa-trash myicon-right"></i>
					</div>

			</div><!-- previewPhoto -->

			<div class="filer-input-inner">
				<div class="filer-input-icon">
					<i class="fa fa-cloud-upload-alt"></i>
					</div>
					<div class="filer-input-text">
						<h3 class="font-weight-light"><?php echo e(trans('misc.click_select_image'), false); ?></h3>
						<h3 class="font-weight-light"><?php echo e(trans('misc.max_size'), false); ?>: <?php echo e($settings->min_width_height_image.' - '.App\Helper::formatBytes($settings->file_size_allowed * 1024), false); ?> </h3>
					</div>
				</div>
			</div>

                  <div class="form-group">
                      <label><?php echo e(trans('misc.update_details'), false); ?></label>
                      	<textarea name="description" rows="4" id="description" class="form-control" placeholder="<?php echo e(trans('misc.update_details_desc'), false); ?>"></textarea>
                    </div>

                    <!-- Alert -->
                    <div class="alert alert-danger d-none-custom mt-2" id="dangerAlert">
                      <ul class="list-unstyled mb-0" id="showErrors"></ul>
                    </div><!-- Alert -->

                  <div class="box-footer">
                  	<hr />
                    <button type="submit" id="buttonUpdateForm" class="btn btn-block btn-lg btn-primary no-hover" data-create="<?php echo e(trans('auth.send'), false); ?>" data-send="<?php echo e(trans('misc.send_wait'), false); ?>"><?php echo e(trans('auth.send'), false); ?></button>
                    <div class="btn-block text-center mt-2">
			           		<a href="<?php echo e(url('campaign',$data->id), false); ?>" class="text-muted">
			           		<i class="fa fa-long-arrow-alt-left"></i>	<?php echo e(trans('auth.back'), false); ?></a>
			           </div>
                  </div><!-- /.box-footer -->

                </form>

               </div><!-- wrap-center -->
		</div><!-- col-md-12-->

	</div><!-- row -->
</div><!-- container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script type="text/javascript">

    $(document).ready(function() {

    $("#onlyNumber").keypress(function(event) {
        return /\d/.test(String.fromCharCode(event.keyCode));
    });
});

$('#removePhoto').click(function(){
	 	$('#filePhoto').val('');
	 	$('.previewPhoto').css({backgroundImage: 'none'}).hide();
	 	$('.filer-input-dragDrop').removeClass('hoverClass');
	 });

//================== START FILE IMAGE FILE READER
$("#filePhoto").on('change', function(){

	var loaded = false;
	if(window.File && window.FileReader && window.FileList && window.Blob){
		if($(this).val()){ //check empty input filed
			oFReader = new FileReader(), rFilter = /^(?:image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/png|image)$/i;
			if($(this)[0].files.length === 0){return}


			var oFile = $(this)[0].files[0];
			var fsize = $(this)[0].files[0].size; //get file size
			var ftype = $(this)[0].files[0].type; // get file type


			if(!rFilter.test(oFile.type)) {
				$('#filePhoto').val('');
				$('.popout').addClass('popout-error').html("<?php echo e(trans('misc.formats_available'), false); ?>").fadeIn(500).delay(5000).fadeOut();
				return false;
			}

			var allowed_file_size = <?php echo e($settings->file_size_allowed * 1024, false); ?>;

			if(fsize>allowed_file_size){
				$('#filePhoto').val('');
				$('.popout').addClass('popout-error').html("<?php echo e(trans('misc.max_size').': '.App\Helper::formatBytes($settings->file_size_allowed * 1024), false); ?>").fadeIn(500).delay(5000).fadeOut();
				return false;
			}
		<?php $dimensions = explode('x',$settings->min_width_height_image); ?>

			oFReader.onload = function (e) {

				var image = new Image();
			    image.src = oFReader.result;

				image.onload = function() {

			    	if( image.width < <?php echo e($dimensions[0], false); ?>) {
			    		$('#filePhoto').val('');
			    		$('.popout').addClass('popout-error').html("<?php echo e(trans('misc.width_min',['data' => $dimensions[0]]), false); ?>").fadeIn(500).delay(5000).fadeOut();
			    		return false;
			    	}

			    	if( image.height < <?php echo e($dimensions[1], false); ?> ) {
			    		$('#filePhoto').val('');
			    		$('.popout').addClass('popout-error').html("<?php echo e(trans('misc.height_min',['data' => $dimensions[1]]), false); ?>").fadeIn(500).delay(5000).fadeOut();
			    		return false;
			    	}

			    	$('.previewPhoto').css({backgroundImage: 'url('+e.target.result+')'}).show();
			    	$('.filer-input-dragDrop').addClass('hoverClass');
			    	var _filname =  oFile.name;
					var fileName = _filname.substr(0, _filname.lastIndexOf('.'));
			    };// <<--- image.onload


           }

           oFReader.readAsDataURL($(this)[0].files[0]);

		}
	} else{
		$('.popout').html('Can\'t upload! Your browser does not support File API! Try again with modern browsers like Chrome or Firefox.').fadeIn(500).delay(5000).fadeOut();
		return false;
	}
});

		$('input[type="file"]').attr('title', window.URL ? ' ' : '');

	</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/campaigns/update.blade.php ENDPATH**/ ?>