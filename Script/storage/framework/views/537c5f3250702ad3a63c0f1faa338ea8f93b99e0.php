

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
            		<?php echo e(trans('misc.categories'), false); ?>

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
                <form class="form-horizontal" method="post" action="<?php echo e(url('panel/admin/categories/update'), false); ?>" enctype="multipart/form-data">
                	
                	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">	
                	<input type="hidden" name="id" value="<?php echo e($categories->id, false); ?>">	
			
					<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
									
                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.name'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($categories->name, false); ?>" name="name" class="form-control" placeholder="<?php echo e(trans('admin.name'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.slug'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($categories->slug, false); ?>" name="slug" class="form-control" placeholder="<?php echo e(trans('admin.slug'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.status'), false); ?></label>
                      <div class="col-sm-10">
                      	
                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="mode" value="on" <?php if( $categories->mode == 'on' ): ?> checked <?php endif; ?>>
                          <?php echo e(trans('admin.active'), false); ?>

                        </label>
                      </div>
                      
                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="mode" value="off" <?php if( $categories->mode == 'off' ): ?> checked <?php endif; ?>>
                          <?php echo e(trans('admin.disabled'), false); ?>

                        </label>
                      </div>
                      
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  
                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.thumbnail'), false); ?> (<?php echo e(trans('misc.optional'), false); ?>)</label>
                      <div class="col-sm-10">
                      	<div class="btn btn-info box-file">
                      		<input type="file" accept="image/*" name="thumbnail" />
                      		<i class="glyphicon glyphicon-cloud-upload myicon-right"></i> <?php echo e(trans('misc.replace_image'), false); ?>

                      		</div>
                      	
                      <p class="help-block"><?php echo e(trans('admin.thumbnail_desc'), false); ?></p>
                      
                      <div class="btn-default btn-lg btn-border btn-block pull-left text-left display-none fileContainer">
					     	<i class="glyphicon glyphicon-paperclip myicon-right"></i>
					     	<small class="myicon-right file-name-file"></small> <i class="icon-cancel-circle delete-attach-file-2 pull-right" title="<?php echo e(trans('misc.delete'), false); ?>"></i>
					     </div>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                                    
                  <div class="box-footer">
                    <a href="<?php echo e(url('panel/admin/categories'), false); ?>" class="btn btn-default"><?php echo e(trans('admin.cancel'), false); ?></a>
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
	
	<!-- Morris -->
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js'), false); ?>" type="text/javascript"></script>
	
	<script type="text/javascript">
		//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });
	</script>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/edit-categories.blade.php ENDPATH**/ ?>