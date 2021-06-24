

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
            		<?php echo e(trans('admin.pages'), false); ?>

            			<i class="fa fa-angle-right margin-separator"></i> 
            				<?php echo e(trans('admin.edit'), false); ?>

          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="content">
        		
        		<div class="row">
    
        	<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo e(trans('admin.edit'), false); ?></h3>
                </div><!-- /.box-header -->
               
               
                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo e(url('panel/admin/pages/'.$data->id), false); ?>">
                	
                	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                	<input type="hidden" name="_method" value="PUT">
			
					<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
									
                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.title'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($data->title, false); ?>" name="title" class="form-control" placeholder="<?php echo e(trans('admin.title'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.slug'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($data->slug, false); ?>" name="slug" class="form-control" placeholder="<?php echo e(trans('admin.slug'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.show_navbar'), false); ?></label>
                      <div class="col-sm-10">
                      	
                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="show_navbar" <?php if( $data->show_navbar == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                          <?php echo e(trans('misc.yes'), false); ?>

                        </label>
                      </div>
                      
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="show_navbar" <?php if( $data->show_navbar == '0' ): ?> checked="checked" <?php endif; ?> value="0">
                          <?php echo e(trans('misc.no'), false); ?>

                        </label>
                      </div>
                      
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.content'), false); ?></label>
                      <div class="col-sm-10">
                      	
                      	<textarea name="content"rows="5" cols="40" id="content" class="form-control" placeholder="<?php echo e(trans('admin.content'), false); ?>"><?php echo e($data->content, false); ?></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <div class="box-footer">
                    <a href="<?php echo e(url('panel/admin/pages'), false); ?>" class="btn btn-default"><?php echo e(trans('admin.cancel'), false); ?></a>
                    <button type="submit" class="btn btn-success pull-right"><?php echo e(trans('admin.save'), false); ?></button>
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
<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js'), false); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('public/plugins/ckeditor/ckeditor.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
		$(function () {
	    // Replace the <textarea id="editor1"> with a CKEditor
	    // instance, using default configuration.
	    	CKEDITOR.replace('content');
	 	 });
	 	 
	 	 //Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/edit-page.blade.php ENDPATH**/ ?>