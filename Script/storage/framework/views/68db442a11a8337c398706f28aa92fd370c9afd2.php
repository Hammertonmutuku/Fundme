

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
            		<?php echo e(trans('misc.payment_settings'), false); ?> <i class="fa fa-angle-right margin-separator"></i>
                PayPal

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

                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php echo e(url()->current(), false); ?>" enctype="multipart/form-data">

                	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">

					<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          <hr />

          <!-- Start Box Body -->
           <div class="box-body">
             <div class="form-group">
               <label class="col-sm-2 control-label"><?php echo e(trans('admin.fee'), false); ?></label>
               <div class="col-sm-10">
                 <input type="text" value="<?php echo e($data->fee, false); ?>" name="fee" class="form-control" placeholder="<?php echo e(trans('admin.fee'), false); ?>">
               </div>
             </div>
           </div><!-- /.box-body -->

           <!-- Start Box Body -->
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label"><?php echo e(trans('admin.fee_cents'), false); ?></label>
                <div class="col-sm-10">
                  <input type="text" value="<?php echo e($data->fee_cents, false); ?>" name="fee_cents" class="form-control" placeholder="<?php echo e(trans('admin.fee_cents'), false); ?>">
                </div>
              </div>
            </div><!-- /.box-body -->

              <!-- Start Box Body -->
               <div class="box-body">
                 <div class="form-group">
                   <label class="col-sm-2 control-label"><?php echo e(trans('admin.paypal_account'), false); ?></label>
                   <div class="col-sm-10">
                     <input type="text" value="<?php echo e($data->email, false); ?>" name="email" class="form-control" placeholder="<?php echo e(trans('admin.paypal_account'), false); ?>">
                     <p class="help-block"><?php echo e(trans('admin.paypal_account_donations'), false); ?></p>
                   </div>
                 </div>
               </div><!-- /.box-body -->

               <!-- Start Box Body -->
               <div class="box-body">
                 <div class="form-group">
                   <label class="col-sm-2 control-label"><?php echo e(trans('admin.status'), false); ?></label>
                   <div class="col-sm-10">
                     <div class="radio">
                     <label class="padding-zero">
                       <input type="radio" value="1" name="enabled" <?php if( $data->enabled == 1 ): ?> checked="checked" <?php endif; ?> checked>
                       <?php echo e(trans('admin.active'), false); ?>

                     </label>
                   </div>
                   <div class="radio">
                     <label class="padding-zero">
                       <input type="radio" value="0" name="enabled" <?php if( $data->enabled == 0 ): ?> checked="checked" <?php endif; ?>>
                       <?php echo e(trans('admin.disabled'), false); ?>

                     </label>
                   </div>
                   </div>
                 </div>
               </div><!-- /.box-body -->

               <!-- Start Box Body -->
               <div class="box-body">
                 <div class="form-group">
                   <label class="col-sm-2 control-label">PayPal Sandbox</label>
                   <div class="col-sm-10">
                     <div class="radio">
                     <label class="padding-zero">
                       <input type="radio" value="true" name="sandbox" <?php if( $data->sandbox == 'true' ): ?> checked="checked" <?php endif; ?> checked>
                       On
                     </label>
                   </div>
                   <div class="radio">
                     <label class="padding-zero">
                       <input type="radio" value="false" name="sandbox" <?php if( $data->sandbox == 'false' ): ?> checked="checked" <?php endif; ?>>
                       Off
                     </label>
                   </div>
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

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/paypal-settings.blade.php ENDPATH**/ ?>