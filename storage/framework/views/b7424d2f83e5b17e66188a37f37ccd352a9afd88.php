<?php
	 $data = App\Models\Donations::leftJoin('campaigns', function($join) {
      $join->on('donations.campaigns_id', '=', 'campaigns.id');
    })
    ->where('campaigns.user_id',Auth::user()->id)
		->where('donations.approved','1')
	->select('donations.*')
	->addSelect('campaigns.title')
	->orderBy('donations.id','DESC')
    ->paginate(20);

	  ?>


<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.donations'), false); ?> (<?php echo e($data->total(), false); ?>)
          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">
                  		<?php echo e(trans('misc.donations'), false); ?>

                  	</h3>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
                   <tr>
                      <th class="active">ID</th>
                      <th class="active"><?php echo e(trans('auth.full_name'), false); ?></th>
                      <th class="active"><?php echo e(trans_choice('misc.campaigns_plural', 1), false); ?></th>
                      <th class="active"><?php echo e(trans('auth.email'), false); ?></th>
                      <th class="active"><?php echo e(trans('misc.donation'), false); ?></th>
											<th class="active"><?php echo e(trans('misc.reward'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.date'), false); ?></th>
											<th class="active"><?php echo e(trans('admin.actions'), false); ?></th>
                    </tr><!-- /.TR -->

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($donation->id, false); ?></td>
                      <td><?php echo e($donation->fullname, false); ?></td>
                      <td><a href="<?php echo e(url('campaign',$donation->campaigns_id), false); ?>" target="_blank"><?php echo e(str_limit($donation->campaigns()->title, 10, '...'), false); ?> <i class="fa fa-external-link-square"></i></a></td>
                      <td><?php echo e($donation->email, false); ?></td>
                      <td><?php echo e(App\Helper::amountFormat($donation->donation), false); ?></td>
											<td><?php if( $donation->rewards_id ): ?><i class="icon-gift"></i><?php else: ?> - <?php endif; ?></td>
                      <td><?php echo e(date($settings->date_format, strtotime($donation->date)), false); ?></td>
											<td> <a href="<?php echo e(url('dashboard/donations',$donation->id), false); ?>" class="btn btn-success btn-xs padding-btn">
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

<?php echo $__env->make('users.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/users/donations.blade.php ENDPATH**/ ?>