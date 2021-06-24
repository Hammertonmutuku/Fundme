

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
            		<?php echo e(trans('misc.payment_settings'), false); ?>


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
                  <h3 class="box-title"><strong><?php echo e(trans('misc.payment_settings'), false); ?></strong></h3>
                </div><!-- /.box-header -->

                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/payments'), false); ?>" enctype="multipart/form-data">

                	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">

					<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.currency_code'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->currency_code, false); ?>" name="currency_code" class="form-control" placeholder="<?php echo e(trans('admin.currency_code'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.currency_symbol'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->currency_symbol, false); ?>" name="currency_symbol" class="form-control" placeholder="<?php echo e(trans('admin.currency_symbol'), false); ?>">
                        <p class="help-block"><?php echo e(trans('admin.notice_currency'), false); ?></p>
                      </div>
                    </div>
                  </div><!-- /.box-body -->


                   <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.fee_donation'), false); ?></label>
                      <div class="col-sm-10">
                      	<select name="fee_donation" class="form-control">
                      		<option <?php if( $settings->fee_donation == '1' ): ?> selected="selected" <?php endif; ?> value="1">1%</option>
                      		<option <?php if( $settings->fee_donation == '2' ): ?> selected="selected" <?php endif; ?> value="2">2%</option>
						  	<option <?php if( $settings->fee_donation == '3' ): ?> selected="selected" <?php endif; ?>  value="3">3%</option>
						  	<option <?php if( $settings->fee_donation == '4' ): ?> selected="selected" <?php endif; ?> value="4">4%</option>
						  	<option <?php if( $settings->fee_donation == '5' ): ?> selected="selected" <?php endif; ?> value="5">5%</option>

						  	<option <?php if( $settings->fee_donation == '6' ): ?> selected="selected" <?php endif; ?> value="6">6%</option>
						  	<option <?php if( $settings->fee_donation == '7' ): ?> selected="selected" <?php endif; ?> value="7">7%</option>
						  	<option <?php if( $settings->fee_donation == '8' ): ?> selected="selected" <?php endif; ?> value="8">8%</option>
						  	<option <?php if( $settings->fee_donation == '9' ): ?> selected="selected" <?php endif; ?> value="9">9%</option>

						  	<option <?php if( $settings->fee_donation == '10' ): ?> selected="selected" <?php endif; ?> value="10">10%</option>
						  	<option <?php if( $settings->fee_donation == '15' ): ?> selected="selected" <?php endif; ?> value="15">15%</option>
                          </select>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                 <div class="box-body">
                   <div class="form-group">
                     <label class="col-sm-2 control-label"><?php echo e(trans('admin.currency_position'), false); ?></label>
                     <div class="col-sm-10">
                       <select name="currency_position" class="form-control">
                         <option <?php if( $settings->currency_position == 'left' ): ?> selected="selected" <?php endif; ?> value="left"><?php echo e($settings->currency_symbol, false); ?>99 - <?php echo e(trans('admin.left'), false); ?></option>
                         <option <?php if( $settings->currency_position == 'right' ): ?> selected="selected" <?php endif; ?> value="right">99<?php echo e($settings->currency_symbol, false); ?> <?php echo e(trans('admin.right'), false); ?></option>
                         </select>
                     </div>
                   </div>
                 </div><!-- /.box-body -->

                 <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo e(trans('misc.decimal_format'), false); ?></label>
                    <div class="col-sm-10">
                      <select name="decimal_format" class="form-control">
                        <option <?php if( $settings->decimal_format == 'dot' ): ?> selected="selected" <?php endif; ?> value="dot">10,989.95</option>
                        <option <?php if( $settings->decimal_format == 'comma' ): ?> selected="selected" <?php endif; ?> value="comma">10.989,95</option>
                        </select>
                    </div>
                  </div>
                </div><!-- /.box-body -->

               <div class="box-footer">
                 <button type="submit" class="btn btn-success"><?php echo e(trans('admin.save'), false); ?></button>
               </div><!-- /.box-footer -->
               </form>

              </div><!-- /.row -->

        	</div><!-- /.content -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

	<!-- icheck -->
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js'), false); ?>" type="text/javascript"></script>

	<script type="text/javascript">
		//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });

        $('input[type="checkbox"]').iCheck({
    	  	checkboxClass: 'icheckbox_square-red',
        	radioClass: 'iradio_square-red',
    	    increaseArea: '20%' // optional
	  });

	</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/payments-settings.blade.php ENDPATH**/ ?>