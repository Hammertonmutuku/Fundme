

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.campaigns'), false); ?> (<?php echo e($data->total(), false); ?>)
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
                  		<?php echo e(trans('misc.campaigns'), false); ?>

                  	</h3>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
                   <tr>
                      <th class="active">ID</th>
                      <th class="active"><?php echo e(trans('misc.title'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.user'), false); ?></th>
                      <th class="active"><?php echo e(trans('misc.goal'), false); ?></th>
                      <th class="active"><?php echo e(trans('misc.funds_raised'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.status'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.date'), false); ?></th>
                      <th class="active"><?php echo e(trans('misc.date_deadline'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.actions'), false); ?></th>
                    </tr><!-- /.TR -->

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($campaign->id, false); ?></td>
                      <td><img src="<?php echo e(asset('public/campaigns/small').'/'.$campaign->small_image, false); ?>" width="20" />

                      	<?php if( $campaign->status == 'active' ): ?>
                      	<a title="<?php echo e($campaign->title, false); ?>" href="<?php echo e(url('campaign',$campaign->id), false); ?>" target="_blank">
                      		<?php echo e(str_limit($campaign->title,20,'...'), false); ?> <i class="fa fa-external-link-square"></i>
                      		</a>
                      		<?php else: ?>
                      		<span title="<?php echo e($campaign->title, false); ?>" class="text-muted">
                      		<?php echo e(str_limit($campaign->title,20,'...'), false); ?>

                      		<?php endif; ?>

                      	</td>
                      <td>
                      	<?php echo e($campaign->user()->name ?? trans('misc.user_not_available'), false); ?>

                      	</td>
                      <td><?php echo e(App\Helper::amountFormat($campaign->goal), false); ?></td>
                      <td><?php echo e(App\Helper::amountFormat($campaign->donations()->sum('donation')), false); ?></td>
                      <td>
                      	<?php if( $campaign->status == 'active' && $campaign->finalized == 0 ): ?>
                      	<span class="label label-success"><?php echo e(trans('misc.active'), false); ?></span>
                      	<?php elseif( $campaign->status == 'pending' && $campaign->finalized == 0 ): ?>
                      	<span class="label label-warning"><?php echo e(trans('admin.pending'), false); ?></span>
                      	<?php else: ?>
                      	<span class="label label-default"><?php echo e(trans('misc.finalized'), false); ?></span>
                      	<?php endif; ?>
                      </td>
                      <td><?php echo e(date($settings->date_format, strtotime($campaign->date)), false); ?></td>
                      <td>
                      	<?php if( $campaign->deadline != '' ): ?>
                      	<?php echo e(date($settings->date_format, strtotime($campaign->deadline)), false); ?>

                      	<?php else: ?>
                      	 -
                      	<?php endif; ?>
                      	</td>
                      <td> <a href="<?php echo e(url('panel/admin/campaigns/edit',$campaign->id), false); ?>" class="btn btn-success btn-xs padding-btn">
                      		<?php echo e(trans('admin.edit'), false); ?>

                      	</a> </td>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/campaigns.blade.php ENDPATH**/ ?>