

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.blog'), false); ?> (<?php echo e($data->total(), false); ?>)
           <a href="<?php echo e(url('panel/admin/blog/create'), false); ?>" class="btn btn-sm btn-success no-shadow">
	        		<i class="glyphicon glyphicon-plus myicon-right"></i> <?php echo e(trans('misc.add_new'), false); ?>

	        		</a>
          </h4>
        </section>

        <!-- Main content -->
        <section class="content">

        	 <?php if(Session::has('info_message')): ?>
		    <div class="alert alert-warning">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
		      <i class="fa fa-warning margin-separator"></i>  <?php echo e(Session::get('info_message'), false); ?>

		    </div>
		<?php endif; ?>

		    <?php if(Session::has('success_message')): ?>
		    <div class="alert alert-success">
		    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
		       <i class="fa fa-check margin-separator"></i>  <?php echo e(Session::get('success_message'), false); ?>

		    </div>
		<?php endif; ?>

        	<div class="row">
            <div class="col-xs-12">
              <div class="box">

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
                   <tr>
                      <th class="active">ID</th>
                      <th class="active"><?php echo e(_('Post'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.date'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.actions'), false); ?></th>
                    </tr>

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($blog->id, false); ?></td>
                      <td><a href="<?php echo e(url('blog/post', $blog->id).'/'.$blog->slug, false); ?>" title="<?php echo e($blog->title, false); ?>" target="_blank"><?php echo e($blog->title, false); ?> <i class="fa fa-external-link-square"></i></a></td>
                      <td><?php echo e(date('d M, Y', strtotime($blog->date)), false); ?></td>
                      <td>

                   <a href="<?php echo e(url('panel/admin/blog', $blog->id), false); ?>" class="btn btn-success btn-sm padding-btn myicon-right">
                      		<?php echo e(trans('admin.edit'), false); ?>

                      	</a>

                        <a href="javascript:void(0);" data-url="<?php echo e(url('panel/admin/blog/delete', $blog->id), false); ?>" class="btn btn-danger btn-sm padding-btn actionDeleteBlog">
                           		<?php echo e(trans('admin.delete'), false); ?>

                           	</a>

                      		</td>

                    </tr><!-- /.TR -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php else: ?>
                    	<h3 class="text-center no-found"><?php echo e(trans('misc.no_results_found'), false); ?></h3>
                  <?php endif; ?>

                  </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
          <?php if($data->hasPages()): ?>
             <?php echo e($data->links(), false); ?>

             <?php endif; ?>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/blog.blade.php ENDPATH**/ ?>