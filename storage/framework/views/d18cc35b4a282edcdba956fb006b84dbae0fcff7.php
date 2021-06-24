

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/colorpicker/bootstrap-colorpicker.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
            <?php echo e(trans('admin.admin')); ?>

            	<i class="fa fa-angle-right margin-separator"></i>
            		<?php echo e(trans('misc.theme')); ?>

          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="content">

        		<div class="row">

        	<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo e(trans('misc.theme')); ?></h3>
                </div><!-- /.box-header -->

                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo e(url('panel/admin/theme')); ?>" enctype="multipart/form-data">

                	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                  <?php if(session('success_message')): ?>
                    <div class="box-body">
          		    <div class="alert alert-success">
          		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          								<span aria-hidden="true">×</span>
          								</button>
          		        <i class="fa fa-check margin-separator"></i> <?php echo e(session('success_message'), false); ?>

          		    </div>
                  </div>
          		<?php endif; ?>

              <?php if(session('error_max_upload_size')): ?>
                <div class="alert alert-danger">
        		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        								<span aria-hidden="true">×</span>
        								</button>
        		      <i class="fa fa-warning margin-separator"></i>  <?php echo e(trans('misc.max_upload_files', ['post_size' => ini_get("post_max_size")."B"] ), false); ?>

        		    </div>
              <?php endif; ?>

					<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.logo'), false); ?></label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/img/logo.png'), false); ?>" style="background-color: #d0d0d0; width:100px">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="logo" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 150x50 px (PNG)</p>

              <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer" id="fileContainerLogo">
					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.logo_footer'), false); ?></label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/img/watermark.png'), false); ?>" style="width:100px">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="logo_footer" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 150x50 px (PNG)</p>

              <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Favicon</label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/img/favicon.png'), false); ?>">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="favicon" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 48x48 px (PNG)</p>

                      <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.index_image_bottom'), false); ?></label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/img/cover.jpg'), false); ?>" style="width:200px">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="index_image_bottom" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 1280x850 px (JPG)</p>

                      <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Slider 1</label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/img/slider-1.jpg'), false); ?>" style="width:200px">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="slider_1" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 1600x900 px (JPG)</p>

                      <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
        					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
        					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
        					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Slider 2</label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/img/slider-2.jpg'), false); ?>" style="width:200px">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="slider_2" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 1600x900 px (JPG)</p>

                      <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
        					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
        					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
        					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Slider 3</label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/img/slider-3.jpg'), false); ?>" style="width:200px">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="slider_3" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 1600x900 px (JPG)</p>

                      <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
        					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
        					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
        					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->


                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Avatar</label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/avatar/default.jpg'), false); ?>" style="width:180px">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="avatar" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 180x180 px (JPG)</p>

              <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.image_category'), false); ?></label>
                      <div class="col-sm-10">

                        <div class="btn-block" style="margin-bottom:10px;">
                          <img src="<?php echo e(url('/public/img-category/default.jpg'), false); ?>" style="width:200px">
                        </div>

                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="image_category" class="filePhoto" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                          <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                      		</div>

                      <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 457x359 px (JPG)</p>

              <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

          <!-- Start Box Body -->
          <div class="box-body">
            <!-- Color Picker -->
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo app('translator')->get('misc.default_link_color'); ?>:</label>

                <div class="col-sm-2">
                <div class="input-group my-colorpicker2">
                  <div class="input-group-addon" style="border: none; padding: 0">
                    <i style="width:100%; padding: 15px; border-radius: 4px;"></i>
                  </div>
                  <input type="text" style="display:none" readonly="readonly" name="color" value="<?php echo e($settings->color_default, false); ?>" class="form-control">
                </div>
                <!-- /.input group -->
              </div>
              </div>
              <!-- /.form group -->
          </div><!-- /.box-body -->

                  <hr>

                  <p class="help-block btn-block text-center"><?php echo e(trans('misc.clean_cache_browser'), false); ?></p>



                  <div class="box-footer">
                    <a href="<?php echo e(url('panel/admin/categories')); ?>" class="btn btn-default"><?php echo e(trans('admin.cancel')); ?></a>
                    <button type="submit" class="btn btn-success pull-right"><?php echo e(trans('admin.save')); ?></button>
                  </div><!-- /.box-footer -->
                </form>
              </div>

        		</div><!-- /.row -->

        	</div><!-- /.content -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

	<!-- icheck -->
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js')); ?>" type="text/javascript"></script>
  <script src="<?php echo e(asset('public/plugins/colorpicker/bootstrap-colorpicker.min.js')); ?>" type="text/javascript"></script>

	<script type="text/javascript">
		//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });

  $(".filePhoto").on('change', function(){

    var element = $(this);

    element.parents('.box-file').find('.text-file').html('<?php echo e(trans('misc.choose_image'), false); ?>');

  	var loaded = false;
  	if(window.File && window.FileReader && window.FileList && window.Blob){
      // Check empty input filed
  		if($(this).val()) {

  			oFReader = new FileReader(), rFilter = /^(?:image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/png|image)$/i;
  			if($(this)[0].files.length === 0){return}

  			var oFile = $(this)[0].files[0];
        var fsize = $(this)[0].files[0].size; //get file size
  			var ftype = $(this)[0].files[0].type; // get file type

        // Validate formats
        if(!rFilter.test(oFile.type)) {
  				element.val('');
  				alert("<?php echo e(trans('misc.formats_available'), false); ?>");
  				return false;
  			}

        // Validate Size
        if(!rFilter.test(oFile.type)) {
  				element.val('');
  				alert("<?php echo e(trans('misc.formats_available'), false); ?>");
  				return false;
  			}

  			oFReader.onload = function (e) {

  				var image = new Image();
          image.src = oFReader.result;

  				image.onload = function() {

            element.parents('.box-body').find('.fileContainer').removeClass('display-none');
            element.parents('.box-body').find('.file-name-file').html(oFile.name);
          };// <<--- image.onload
        }
          oFReader.readAsDataURL($(this)[0].files[0]);
  		}// Check empty input filed
  	}// window File
  });
  // END UPLOAD PHOTO

  $('.delete-image').click(function(){
        var element = $(this);

        element.parents('.box-body').find('.fileContainer').addClass('display-none');
        element.parents('.box-body').find('.file-name-file').html('');
        element.parents('.box-body').find('.filePhoto').val('');
  });

  //Colorpicker
    $('.my-colorpicker2').colorpicker()

	</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/theme.blade.php ENDPATH**/ ?>