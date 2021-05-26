

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css'), false); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/select2/select2.min.css'), false); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
            <?php echo e(trans('admin.admin'), false); ?>

            			<i class="fa fa-angle-right margin-separator"></i>
            				<?php echo e(trans('misc.add_payment'), false); ?>

          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

          <?php if(Session::has('success_message')): ?>
         <div class="alert alert-success">
           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">×</span>
                 </button>
           <i class="fa fa-check margin-separator"></i> <?php echo e(Session::get('success_message'), false); ?>

         </div>
     <?php endif; ?>

        	<div class="content">

        		<div class="row">

        	<div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo e(trans('misc.add_payment'), false); ?></h3>
                </div><!-- /.box-header -->


                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo e(url('panel/admin/payment/add'), false); ?>">

                	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">

					<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <!-- Start Box Body -->
          <div class="box-body">
            <div class="form-group">
              <label class="col-sm-2 control-label"><?php echo e(trans('misc.campaign'), false); ?></label>
              <div class="col-sm-10">
                <select name="campaign" class="form-control select2">
                  <option value=""><?php echo e(trans('misc.select_one'), false); ?></option>
                <?php $__currentLoopData = App\Models\Campaigns::where('status', 'active')->where('finalized','0')->orderBy('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($campaign->id, false); ?>">ID #<?php echo e($campaign->id, false); ?> - <?php echo e($campaign->title, false); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  </select>
              </div>
            </div>
          </div><!-- /.box-body -->

                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.donation'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="number" value="<?php echo e(old('donation'), false); ?>" name="donation" class="form-control" placeholder="<?php echo e(trans('misc.donation'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('auth.full_name'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e(old('full_name'), false); ?>" name="full_name" class="form-control" placeholder="<?php echo e(trans('auth.full_name'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('auth.email'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="email" value="<?php echo e(old('email'), false); ?>" name="email" class="form-control" placeholder="<?php echo e(trans('auth.email'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.country'), false); ?></label>
                      <div class="col-sm-10">
                        <select name="country" class="form-control select2">
                          <option value=""><?php echo e(trans('misc.select_one'), false); ?></option>
                        <?php $__currentLoopData = App\Models\Countries::orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($country->name, false); ?>"><?php echo e($country->name, false); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                          </select>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.postal_code'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e(old('postal_code'), false); ?>" name="postal_code" class="form-control" placeholder="<?php echo e(trans('misc.postal_code'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.transaction_id'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e(old('transaction_id'), false); ?>" name="transaction_id" class="form-control" placeholder="<?php echo e(trans('misc.transaction_id'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.payment_gateway'), false); ?></label>
                      <div class="col-sm-10">

                    <?php $__currentLoopData = PaymentGateways::where('enabled', '1')->where('type', '<>', 'bank')->orderBy('type')->get();; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      	<div class="radio">
                        <label class="padding-zero">
                          <input <?php if(PaymentGateways::where('enabled', '1')->where('type', '<>', 'bank')->count() == 1): ?> checked <?php endif; ?> type="radio" name="payment_gateway" value="<?php echo e($payment->name, false); ?>" class="custom-control-input paymentGateway">
                          <?php echo e($payment->name, false); ?>

                        </label>
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
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
<script src="<?php echo e(asset('public/plugins/select2/select2.full.min.js'), false); ?>" type="text/javascript"></script>
<script type="text/javascript">
$('.select2').select2();

	 	  //Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });
	</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/add-payment.blade.php ENDPATH**/ ?>