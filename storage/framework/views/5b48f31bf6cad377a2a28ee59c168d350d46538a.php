

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css'), false); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
            <?php echo e(trans('admin.admin'), false); ?>

            	<i class="fa fa-angle-right margin-separator"></i>
            		<?php echo e(trans('admin.edit'), false); ?>


            		<i class="fa fa-angle-right margin-separator"></i>
            		<?php echo e($data->title, false); ?>


          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="content">

       <div class="row">

       	<div class="col-md-9">

        	<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo e(trans('admin.edit'), false); ?></h3>
                </div><!-- /.box-header -->

                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/campaigns/edit/'.$data->id), false); ?>" enctype="multipart/form-data">

                	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">

					<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.campaign_title'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($data->title, false); ?>" name="title" class="form-control" placeholder="<?php echo e(trans('misc.title'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                  	<div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.choose_a_category'), false); ?></label>
                      <div class="col-sm-10">
                      	<select name="categories_id" class="form-control">
                      		<option value=""><?php echo e(trans('misc.select_one'), false); ?></option>
                      	<?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if( $category->id == $data->categories_id ): ?> selected="selected" <?php endif; ?> value="<?php echo e($category->id, false); ?>"><?php echo e($category->name, false); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>
                  </div>
                    </div><!-- /.box-body -->


                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.campaign_goal'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="number" min="1" autocomplete="off" value="<?php echo e($data->goal, false); ?>" name="goal" class="form-control onlyNumber" placeholder="<?php echo e(trans('misc.campaign_goal'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.location'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($data->location, false); ?>" name="location" class="form-control onlyNumber" placeholder="<?php echo e(trans('misc.location'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.campaign_description'), false); ?></label>
                      <div class="col-sm-10">
                        <textarea name="description" rows="5" id="description" class="form-control  tinymce-txt" placeholder="<?php echo e(trans('misc.campaign_description_placeholder'), false); ?>"><?php echo e($data->description, false); ?></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.status'), false); ?></label>
                      <div class="col-sm-10">
                        <select name="finalized" class="form-control" >
                        	<option <?php if($data->finalized == '0' && $data->status == 'pending'): ?> selected="selected" <?php endif; ?> value="pending"><?php echo e(trans('admin.pending'), false); ?></option>
                      		<option <?php if($data->finalized == '0'  && $data->status == 'active'): ?> selected="selected" <?php endif; ?> value="0"><?php echo e(trans('admin.active'), false); ?></option>
                      		<option <?php if($data->finalized == '1'  && $data->status == 'active'): ?> selected="selected" <?php endif; ?> value="1"><?php echo e(trans('misc.finalized'), false); ?></option>
                          </select>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.featured'), false); ?></label>
                      <div class="col-sm-10">

                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="featured" <?php if( $data->featured == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                          <?php echo e(trans('misc.yes'), false); ?>

                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="featured" <?php if( $data->featured == '0' ): ?> checked="checked" <?php endif; ?> value="0">
                          <?php echo e(trans('misc.no'), false); ?>

                        </label>
                      </div>

                      </div>
                    </div>
                  </div><!-- /.box-body -->


                  <div class="box-footer">
                  	 <a href="<?php echo e(url('panel/admin/campaigns'), false); ?>" class="btn btn-default"><?php echo e(trans('admin.cancel'), false); ?></a>
                    <button type="submit" class="btn btn-success pull-right"><?php echo e(trans('admin.save'), false); ?></button>
                  </div><!-- /.box-footer -->
                </form>
              </div>

        </div><!-- /. col-md-9 -->

        <div class="col-md-3">

        	<div class="block-block text-center">
        		<img src="<?php echo e(asset('public/campaigns/small').'/'.$data->small_image, false); ?>" class="thumbnail img-responsive">
        	</div>


<?php if($data->donations()->count() == 0): ?>
		<div class="block-block text-center">
		<?php echo Form::open([
			            'method' => 'POST',
			            'url' => 'panel/admin/campaign/delete',
			            'class' => 'displayInline'
				        ]); ?>

				        <?php echo Form::hidden('id',$data->id );; ?>

	            	<?php echo Form::submit(trans('misc.delete_campaign'), ['class' => 'btn btn-lg btn-danger btn-block margin-bottom-10 actionDelete']); ?>

	        	<?php echo Form::close(); ?>

	        </div>
        <?php endif; ?>


		</div><!-- col-md-3 -->

        		</div><!-- /.row -->

        	</div><!-- /.content -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

	<!-- icheck -->
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js'), false); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/tinymce/tinymce.min.js'), false); ?>" type="text/javascript"></script>

	<script type="text/javascript">

		$(document).ready(function() {
    $(".onlyNumber").keydown(function (e) {
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

$(".actionDelete").click(function(e) {
   	e.preventDefault();

   	var element = $(this);
	var id     = element.attr('data-url');
	var form    = $(element).parents('form');

	element.blur();

	swal(
		{   title: "<?php echo e(trans('misc.delete_confirm'), false); ?>",
		text: "<?php echo e(trans('misc.confirm_delete_campaign'), false); ?>",
		  type: "warning",
		  showLoaderOnConfirm: true,
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		   confirmButtonText: "<?php echo e(trans('misc.yes_confirm'), false); ?>",
		   cancelButtonText: "<?php echo e(trans('misc.cancel_confirm'), false); ?>",
		    closeOnConfirm: false,
		    },
		    function(isConfirm){
		    	 if (isConfirm) {
		    	 	form.submit();
		    	 	//$('#form' + id).submit();
		    	 	}
		    	 });


		 });

		//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });

        		function initTinymce() {
			tinymce.remove('.tinymce-txt');
tinymce.init({
  selector: '.tinymce-txt',
  relative_urls: false,
  resize: true,
  menubar:false,
    statusbar: false,
    forced_root_block : false,
    extended_valid_elements : "span[!class]",
    //visualblocks_default_state: true,
  setup: function(editor){

    	editor.on('change',function(){
    		editor.save();
    	});
   },
  theme: 'modern',
  height: 150,
  plugins: [
    'advlist autolink autoresize lists link image charmap preview hr anchor pagebreak', //image
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save code contextmenu directionality', //
    'emoticons template paste textcolor colorpicker textpattern ' //imagetools
  ],
  toolbar1: 'undo redo | bold italic underline strikethrough charmap | bullist numlist  | link | image | media',
  image_advtab: true,
 });

}

initTinymce();

	</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/edit-campaign.blade.php ENDPATH**/ ?>