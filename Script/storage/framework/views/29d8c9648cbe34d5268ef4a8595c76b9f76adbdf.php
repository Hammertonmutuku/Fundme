

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.categories'), false); ?>

          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

		    <?php if(Session::has('success_message')): ?>
		    <div class="alert alert-success">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
		        <?php echo e(Session::get('success_message'), false); ?>

		    </div>
		<?php endif; ?>

        	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"> <?php echo e(trans('misc.categories'), false); ?></h3>
                  <div class="box-tools">
                    <a href="<?php echo e(url('panel/admin/categories/add'), false); ?>" class="btn btn-sm btn-success no-shadow pull-right">
	        		<i class="glyphicon glyphicon-plus myicon-right"></i> <?php echo e(trans('misc.add_new'), false); ?>

	        		</a>
                  </div>
                </div><!-- /.box-header -->



                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $totalCategories !=  0 ): ?>
                   <tr>
                      <th>ID</th>
                      <th><?php echo e(trans('admin.name'), false); ?></th>
                      <th><?php echo e(trans('admin.actions'), false); ?></th>
                      <th><?php echo e(trans('admin.status'), false); ?></th>
                    </tr>

                  <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($category->id, false); ?></td>
                      <td><?php echo e($category->name, false); ?></td>
                      <td>
                      	<a href="<?php echo e(url('panel/admin/categories/edit/').'/'.$category->id, false); ?>" class="btn btn-success btn-xs padding-btn">
                      		<?php echo e(trans('admin.edit'), false); ?>

                      	</a>

                        <?php echo Form::open([
                          'method' => 'POST',
                          'url' => "panel/admin/categories/delete/$category->id",
                          'class' => 'displayInline'
                        ]); ?>


                        <?php echo Form::button(trans('admin.delete'), ['class' => 'btn btn-danger btn-xs padding-btn actionDelete']); ?>

                        <?php echo Form::close(); ?>


                      		</td>
                      		<?php if( $category->mode == 'on' ) {
                      			$mode = 'success';
                      		} else {
                      			$mode = 'danger';
                      		} ?>
                      <td><span class="label label-<?php echo e($mode, false); ?>"><?php echo e(ucfirst($category->mode), false); ?></span></td>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">

$(".actionDelete").click(function(e) {
   	e.preventDefault();

   	var element = $(this);
	  var form    = $(element).parents('form');
    element.blur();

	swal(
		{   title: "<?php echo e(trans('misc.delete_confirm'), false); ?>",
		 text: "<?php echo e(trans('misc.confirm_delete_category'), false); ?>",
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
		    	 	}
		    	 });


		 });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/categories.blade.php ENDPATH**/ ?>