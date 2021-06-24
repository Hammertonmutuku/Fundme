

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.campaigns_reported'), false); ?> (<?php echo e($data->total(), false); ?>)
          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  		<?php echo e(trans('misc.campaigns_reported'), false); ?>

                  	</h3>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
                   <tr>
                      <th class="active">ID</th>
                      <th class="active"><?php echo e(trans('admin.user'), false); ?></th>
                      <th class="active"><?php echo e(trans_choice('misc.campaigns_plural', 1), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.date'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.actions'), false); ?></th>
                    </tr><!-- /.TR -->

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($report->id, false); ?></td>
                      <td><?php echo e($report->user()->name, false); ?></td>
                      <td><a href="<?php echo e(url('campaign',$report->campaigns_id), false); ?>" target="_blank"><?php echo e(str_limit($report->campaigns()->title, 10, '...'), false); ?> <i class="fa fa-external-link-square"></i></a></td>
                      <td><?php echo e(date($settings->date_format, strtotime($report->created_at)), false); ?></td>
                      <td> <a href="<?php echo e(url('panel/admin/campaigns/edit',$report->id), false); ?>" class="btn btn-success btn-xs padding-btn">
                      		<?php echo e(trans('admin.view'), false); ?>

                      	</a>

                 <?php echo Form::open([
			            'method' => 'POST',
			            'url' => 'panel/admin/campaigns/reported/delete',
			            'class' => 'displayInline'
				        ]); ?>

				        <?php echo Form::hidden('id',$report->id );; ?>

	            	<?php echo Form::submit(trans('misc.delete'), ['class' => 'btn btn-xs btn-danger actionDelete']); ?>

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
              <?php if( $data->lastPage() > 1 ): ?>
             <?php echo e($data->links(), false); ?>

             <?php endif; ?>
            </div>
          </div>

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/reported-campaigns.blade.php ENDPATH**/ ?>