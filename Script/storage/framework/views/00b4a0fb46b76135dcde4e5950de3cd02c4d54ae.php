

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.withdrawals'), false); ?> (<?php echo e($data->total(), false); ?>)
          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

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
                <div class="box-header">
                  <h3 class="box-title">
                  		<?php echo e(trans('misc.withdrawals'), false); ?>

                  	</h3>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
                   <tr>
                      <th class="active">ID</th>
			   		  <th class="active"><?php echo e(trans('misc.campaign'), false); ?></th>
			          <th class="active"><?php echo e(trans('admin.amount'), false); ?></th>
			          <th class="active"><?php echo e(trans('misc.method'), false); ?></th>
			          <th class="active"><?php echo e(trans('admin.status'), false); ?></th>
			          <th class="active"><?php echo e(trans('admin.date'), false); ?></th>
			          <th class="active"><?php echo e(trans('admin.actions'), false); ?></th>
                    </tr><!-- /.TR -->

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdrawal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                      <td><?php echo e($withdrawal->id, false); ?></td>
                      <td>
                      	<a title="<?php echo e($withdrawal->title, false); ?>" href="<?php echo e(url('campaign',$withdrawal->campaigns()->id), false); ?>" target="_blank"><?php echo e(str_limit($withdrawal->campaigns()->title,20,'...'), false); ?> <i class="fa fa-external-link-square"></i></a>
                      	</td>
                      <td><?php if($settings->currency_position == 'left'): ?><?php echo e($settings->currency_symbol.$withdrawal->amount, false); ?><?php else: ?><?php echo e($withdrawal->amount.$settings->currency_symbol, false); ?><?php endif; ?></td>
                      <td><?php echo e($withdrawal->gateway, false); ?></td>
                      <td>
                      	<?php if( $withdrawal->status == 'paid' ): ?>
                      	<span class="label label-success"><?php echo e(trans('misc.paid'), false); ?></span>
                      	<?php else: ?>
                      	<span class="label label-warning"><?php echo e(trans('misc.pending_to_pay'), false); ?></span>
                      	<?php endif; ?>
                      </td>
                      <td><?php echo e(date($settings->date_format, strtotime($withdrawal->date)), false); ?></td>
                      <td>

                      	<a href="<?php echo e(url('panel/admin/withdrawal',$withdrawal->id), false); ?>" class="btn btn-xs btn-success" title="<?php echo e(trans('admin.view'), false); ?>">
                      		<?php echo e(trans('admin.view'), false); ?>

                      	</a>

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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/withdrawals.blade.php ENDPATH**/ ?>