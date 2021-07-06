<?php $__env->startSection('title'); ?><?php echo e(trans('misc.create_campaign').' - ', false); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/plugins/datepicker/datepicker3.css'), false); ?>" rel="stylesheet" type="text/css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
 <div class="jumbotron mb-0 bg-sections text-center">
      <div class="container wrap-jumbotron position-relative">
      	<h1 class="title-site"><?php echo e(trans('misc.create_campaign'), false); ?></h1>
        <p class="mb-0">
          <?php echo e(trans('misc.create_campaign_desc'), false); ?>

        </p>
      </div>
    </div>

<div class="container py-5">
	<div class="row">

    <div class="wrap-container-lg">
	<!-- col-md-8 -->
	<div class="col-md-12">

    <?php if(auth()->user()->status == 'active'): ?>
    <!-- form start -->
    <form method="POST" action="<?php echo e(url('create/campaign'), false); ?>" enctype="multipart/form-data" id="formUpload">
     
     <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">   
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

         <!-- Start Form Group -->
            <div class="form-group">
              <label><?php echo e(trans('misc.campaign_title'), false); ?></label>
                <input type="text" value="<?php echo e(old('title'), false); ?>" name="title" id="title" class="form-control" placeholder="<?php echo e(trans('misc.campaign_title'), false); ?>">
            </div><!-- /.form-group-->

            <!-- Start Form Group -->
               <div class="form-group">
                 <label><?php echo e(trans('misc.video'), false); ?></label>
                   <input type="text" value="<?php echo e(old('video'), false); ?>" name="video" id="video" class="form-control" placeholder="<?php echo e(trans('misc.video_description'), false); ?> (<?php echo e(trans('misc.optional'), false); ?>)">
                   <small class="text-muted"><?php echo e(trans('misc.video_description_2'), false); ?></small>
               </div><!-- /.form-group-->

            <!-- Start Form Group -->
            <div class="form-group">
              <label><?php echo e(trans('misc.choose_a_category'), false); ?></label>
              	<select name="categories_id" class="custom-select">
              		<option value=""><?php echo e(trans('misc.select_one'), false); ?></option>
              	<?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id, false); ?>"><?php echo e($category->name, false); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                </div><!-- /.form-group-->

                  <div class="form-group">
      				    <label><?php echo e(trans('misc.campaign_goal'), false); ?></label>
      				    <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><?php echo e($settings->currency_symbol, false); ?></span>
                    </div>
      				      <input type="number" min="1" class="form-control" name="goal" id="onlyNumber" value="<?php echo e(old('goal'), false); ?>" placeholder="10000">
      				    </div>
      				  </div>

                <!-- Start Form Group -->
                  <div class="form-group">
                    <label><?php echo e(trans('misc.location'), false); ?></label>
                      <input type="text" value="<?php echo e(old('location'), false); ?>" name="location" class="form-control" placeholder="<?php echo e(trans('misc.location'), false); ?>">
                  </div><!-- /.form-group-->

                  <!-- Start Form Group -->
                  <div class="form-group">
                    <label><?php echo e(trans('misc.deadline'), false); ?></label>
                    <div class="input-group">
                    	<div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input type="text" value="<?php echo e(old('deadline'), false); ?>" id="datepicker" name="deadline" class="form-control" placeholder="<?php echo e(trans('misc.deadline'), false); ?>" autocomplete="off">
                    </div>
                    <small class="text-muted"><?php echo e(trans('misc.deadline_desc'), false); ?></small>
                  </div><!-- /.form-group-->


                  <div class="form-group">
                      <label><?php echo e(trans('misc.campaign_description'), false); ?></label>
                      	<textarea name="description" rows="4" id="description" class="form-control" placeholder="<?php echo e(trans('misc.campaign_description_placeholder'), false); ?>"><?php echo e(old('description'), false); ?></textarea>
                        <small class="text-muted"><?php echo e(trans('misc.campaign_description_placeholder'), false); ?></small>
                    </div>

                    <!-- Alert -->
            <div class="alert alert-danger d-none-custom" id="dangerAlert">
							<ul class="list-unstyled m-0" id="showErrors"></ul>
						</div><!-- Alert -->

                  <div class="box-footer">
                  	<hr />
                    <button type="submit" id="buttonFormSubmit" class="btn btn-block btn-lg btn-primary no-hover" data-create="<?php echo e(trans('misc.create_campaign'), false); ?>" data-send="<?php echo e(trans('misc.send_wait'), false); ?>" data-error="<?php echo e(trans('misc.error'), false); ?>">
                      <?php echo e(trans('misc.create_campaign'), false); ?>

                    </button>
                  </div><!-- /.box-footer -->
            
                </form>

                <?php else: ?>

	<div class="btn-block text-center mb-2">
	    			<i class="fa fa-exclamation-triangle display-4"></i>
	    		</div>

	   <h3 class="margin-top-none text-center no-result no-result-mg">
	    	<?php echo e(trans('misc.confirm_email'), false); ?> <strong><?php echo e(Auth::user()->email, false); ?></strong>
        <?php echo e(__('Before proceeding, please check your email for a verification link.'), false); ?>

        <?php echo e(__('If you did not receive the email'), false); ?>, <a href="<?php echo e(route('verify/account/{confirmation_code}'), false); ?>"><?php echo e(__('click here to request another'), false); ?></a>.
	    	</h3>

                <?php endif; ?>

               </div><!-- wrap-center -->
		</div><!-- col-md-12-->

	</div><!-- row -->
</div><!-- container -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
	<script src="<?php echo e(asset('public/js/ckeditor/ckeditor.js'), false); ?>"></script>
	<script src="<?php echo e(asset('public/plugins/datepicker/bootstrap-datepicker.js'), false); ?>" type="text/javascript"></script>

	<script type="text/javascript">

	//Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      startDate: '+7d',
      language: 'en'
    });

    $(document).ready(function() {

    $("#onlyNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
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

    CKEDITOR.replace('description', {
          // Define the toolbar groups as it is a more accessible solution.

          extraPlugins: 'autogrow,image2,embed,youtube',
          removePlugins: 'resize',
          embed_provider : '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
          enterMode: CKEDITOR.ENTER_BR,

          // Toolbar adjustments to simplify the editor.
     toolbar: [{
         name: 'document',
         items: ['Undo', 'Redo']
       },
       {
         name: 'basicstyles',
         items: ['Bold', 'Italic', 'Strike', 'Underline', '-', 'RemoveFormat']
       },
       {
         name: 'links',
         items: ['Link', 'Unlink', 'Anchor']
       },
       {
         name: 'paragraph',
         items: ['BulletedList', 'NumberedList']
       },
       {
         name: 'insert',
         items: ['Image', 'Youtube', 'Embed']
       },
       {
         name: 'tools',
         items: ['Maximize', 'ShowBlocks']
       }
     ],

      // Upload dropped or pasted images to the CKFinder connector (note that the response type is set to JSON).
      filebrowserImageUploadUrl : "<?php echo e(route('upload.image', ['_token' => csrf_token()]), false); ?>",
      filebrowserUploadMethod: 'xhr',
      //uploadUrl: '<?php echo e(route('upload.image', ['_token' => csrf_token() ]), false); ?>',

          // Remove the redundant buttons from toolbar groups defined above.
          removeButtons: 'Subscript,Superscript,Anchor,Styles,Specialchar',
        });

        var data = CKEDITOR.instances.description.getData();

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/campaigns/create.blade.php ENDPATH**/ ?>