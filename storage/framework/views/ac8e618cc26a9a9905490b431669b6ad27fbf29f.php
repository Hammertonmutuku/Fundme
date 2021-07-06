

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.gallery'), false); ?> (<?php echo e($data->count(), false); ?>)
          </h4>

        </section>

        <?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Main content -->
        <section class="content">

		    <?php if(Session::has('success_message')): ?>
		    <div class="alert alert-success">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
		      <i class="fa fa-check margin-separator"></i> <?php echo e(Session::get('success_message'), false); ?>

		    </div>
		<?php endif; ?>

        	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> <?php echo e(trans('misc.gallery'), false); ?></h3>
                  <div class="box-tools">
                    <aa href="#" data-toggle="modal" data-target="#addNew" class="btn btn-sm btn-success no-shadow pull-right">
	        		<i class="glyphicon glyphicon-plus myicon-right"></i> <?php echo e(trans('misc.add_new'), false); ?>

	        		</a>
                  </div>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $data->count() !=  0 ): ?>
                   <tr>
                      <th class="active">ID</th>
                      <th class="active"><?php echo e(trans('misc.image'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.actions'), false); ?></th>
                    </tr>

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($gallery->id, false); ?></td>
                      <td><img src="<?php echo e(url('public/gallery', 'thumb-'.$gallery->image), false); ?>" width="100" /></td>
                      <td>
                   <?php echo Form::open([
			            'method' => 'post',
			            'url' => ['panel/admin/gallery/delete', $gallery->id],
			            'id' => 'form'.$gallery->id,
			            'class' => 'displayInline'
				        ]); ?>

	            	<?php echo Form::submit(trans('admin.delete'), ['data-url' => $gallery->id, 'class' => 'btn btn-danger btn-sm padding-btn actionDelete']); ?>

	        	<?php echo Form::close(); ?>

                      		</td>

                    </tr><!-- /.TR -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>
                    <hr />
                    	<h3 class="text-center no-found"><?php echo e(trans('misc.no_results_found'), false); ?></h3>
                    <?php endif; ?>

                  </tbody>


                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- ***** Modal Create Subcategories ****** -->
      	<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      	  <div class="modal-dialog">
      	    <div class="modal-content">
      	      <div class="modal-header">
      	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      	        <h4 class="modal-title text-left" id="myModalLabel"><strong><?php echo e(trans('misc.add_new')); ?></strong></h4>
      	      </div>

              <!-- form start -->
             <form class="form-horizontal" method="post" action="<?php echo e(url('panel/admin/gallery/add')); ?>" id="addSubForm" enctype="multipart/form-data">
      	      <div class="modal-body">
                <?php echo csrf_field(); ?>
                <div class="btn btn-info box-file">
                  <input type="file" accept="image/*" name="image" class="filePhoto" />
                  <i class="glyphicon glyphicon-cloud-upload myicon-right"></i>
                  <span class="text-file"><?php echo e(trans('misc.choose_image'), false); ?></span>
                  </div>

              <p class="help-block"><?php echo e(trans('misc.recommended_size'), false); ?> 1280x850 px</p>

              <div class="btn-default btn-lg btn-border btn-block text-left display-none fileContainer" id="fileContainer">
                <i class="glyphicon glyphicon-paperclip myicon-right"></i>
                <small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-image btn pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
               </div>
      	      </div><!-- modal-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-success pull-right"><?php echo e(trans('auth.send')); ?></button>
              </div><!-- /.box-footer -->

              </form>
      	    </div>
      	  </div>
      	</div> <!-- ***** Modal ****** -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">

$(".actionDelete").click(function(e) {
   	e.preventDefault();

   	var element = $(this);
	var id     = element.attr('data-url');
	var form    = $(element).parents('form');

	element.blur();

	swal(
		{   title: "<?php echo e(trans('misc.delete_confirm'), false); ?>",
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

     $(".filePhoto").on('change', function(){

       var element = $(this);

       $('.text-file').html('<?php echo e(trans('misc.choose_image'), false); ?>');

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

               $('.fileContainer').removeClass('display-none');
               $('.file-name-file').html(oFile.name);
             };// <<--- image.onload
           }
             oFReader.readAsDataURL($(this)[0].files[0]);
     		}// Check empty input filed
     	}// window File
     });
     // END UPLOAD PHOTO

     $('.delete-image').click(function(){
           var element = $(this);

           $('.fileContainer').addClass('display-none');
           $('.file-name-file').html('');
           $('.filePhoto').val('');
     });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/gallery.blade.php ENDPATH**/ ?>