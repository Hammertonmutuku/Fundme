

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
           <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.donation'), false); ?> #<?php echo e($data->id, false); ?>

          </h4>
        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="row">
            <div class="col-xs-12">
              <div class="box">

              	<div class="box-body">
              		<dl class="dl-horizontal">

					  <!-- start -->
					  <dt>ID</dt>
					  <dd><?php echo e($data->id, false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('auth.full_name'), false); ?></dt>
					  <dd><?php echo e($data->fullname, false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans_choice('misc.campaigns_plural', 1), false); ?></dt>
					  <dd><a href="<?php echo e(url('campaign',$data->campaigns()->id), false); ?>" target="_blank"><?php echo e($data->campaigns()->title, false); ?> <i class="fa fa-external-link-square"></i></a></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('auth.email'), false); ?></dt>
					  <dd><?php echo e($data->email, false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('misc.donation'), false); ?></dt>
					  <dd><strong class="text-success"><?php echo e(App\Helper::amountFormat($data->donation), false); ?></strong></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('misc.country'), false); ?></dt>
					  <dd><?php echo e($data->country, false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('misc.postal_code'), false); ?></dt>
					  <dd><?php echo e($data->postal_code, false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('misc.payment_gateway'), false); ?></dt>
					  <dd><?php echo e($data->payment_gateway, false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('misc.comment'), false); ?></dt>
					  <dd>
					  	<?php if( $data->comment != '' ): ?>
					  	<?php echo e($data->comment, false); ?>

					  	<?php else: ?>
					  	-------------------------------------
					  	<?php endif; ?>
					  	</dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('admin.date'), false); ?></dt>
					  <dd><?php echo e(date($settings->date_format, strtotime($data->date)), false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('misc.anonymous'), false); ?></dt>
					  <dd>
					  	<?php if( $data->anonymous == '1' ): ?>
					  	<?php echo e(trans('misc.yes'), false); ?>

					  	<?php else: ?>
					  	<?php echo e(trans('misc.no'), false); ?>

					  	<?php endif; ?>
					  	</dd>
					  <!-- ./end -->

            <!-- start -->
					  <dt><?php echo e(trans('misc.reward'), false); ?></dt>
					  <dd>
					  	<?php if( $data->rewards_id ): ?>
               <strong>ID</strong>: <?php echo e($data->rewards()->id, false); ?> <br />
               <strong><?php echo e(trans('misc.title'), false); ?></strong>: <?php echo e($data->rewards()->title, false); ?> <br />
					  	 <strong><?php echo e(trans('misc.amount'), false); ?></strong>: <?php echo e($settings->currency_symbol.$data->rewards()->amount, false); ?> <br />
               <strong><?php echo e(trans('misc.delivery'), false); ?></strong>: <?php echo e(date('F, Y', strtotime($data->rewards()->delivery)), false); ?> <br />
               <strong><?php echo e(trans('misc.description'), false); ?></strong>:<?php echo e($data->rewards()->description, false); ?>

					  	<?php else: ?>
					  	<?php echo e(trans('misc.no'), false); ?>

					  	<?php endif; ?>
					  	</dd>
					  <!-- ./end -->

					</dl>
              	</div><!-- box body -->

              	<div class="box-footer">
                  	 <a href="<?php echo e(url('dashboard/donations'), false); ?>" class="btn btn-default"><?php echo e(trans('auth.back'), false); ?></a>
                  </div><!-- /.box-footer -->

              </div><!-- box -->
            </div><!-- col -->
         </div><!-- row -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/users/donation-view.blade.php ENDPATH**/ ?>