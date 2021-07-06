

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
                      <th class="active"><?php echo e(trans('misc.payment_gateway'), false); ?></th>
                      <th class="active"><?php echo e(trans('misc.reward'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.date'), false); ?></th>
                      <th class="active"><?php echo e(trans('admin.actions'), false); ?></th>
                    </tr><!-- /.TR -->

                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($donation->id, false); ?></td>
                      <td><?php echo e($donation->fullname, false); ?></td>
                      <td>
                          <?php if(isset($donation->campaigns()->id)): ?>
                        <a href="<?php echo e(url('campaign',$donation->campaigns_id), false); ?>" target="_blank">
                        <?php echo e(str_limit($donation->campaigns()->title, 10, '...'), false); ?> <i class="fa fa-external-link-square"></i>
                      </a>
                      <?php else: ?>
                      <em class="text-muted"><?php echo e(trans('misc.campaign_deleted'), false); ?></em>
                      <?php endif; ?>
                      </td>
                      <td><?php echo e($donation->email, false); ?></td>
                      <td><?php echo e(App\Helper::amountFormat($donation->donation), false); ?></td>
                      <td><?php echo e($donation->payment_gateway, false); ?></td>
                      <td><?php if( $donation->rewards_id ): ?><i class="icon-gift"></i><?php else: ?> - <?php endif; ?></td>
                      <td><?php echo e(date($settings->date_format, strtotime($donation->date)), false); ?></td>

                      <td> <a href="<?php echo e(url('panel/admin/donations',$donation->id), false); ?>" class="btn btn-success btn-xs padding-btn">
                      		<?php echo e(trans('admin.view'), false); ?>

                      	</a>

                        <?php if($donation->approved == 0  ): ?>
                          <span class="label label-warning"><?php echo e(trans('admin.pending'), false); ?></span>
                        <?php endif; ?>

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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/donations.blade.php ENDPATH**/ ?>