

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
            <?php echo e(trans('admin.admin'), false); ?>

            	<i class="fa fa-angle-right margin-separator"></i>
            		<?php echo e(trans('admin.general_settings'), false); ?>


            		<i class="fa fa-angle-right margin-separator"></i>
            		<?php echo e(trans('admin.limits'), false); ?>

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
                  <h3 class="box-title"><?php echo e(trans('admin.limits'), false); ?></h3>
                </div><!-- /.box-header -->



                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/settings/limits'), false); ?>" enctype="multipart/form-data">

                	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
                  <?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.result_request_campaigns'), false); ?></label>
                      <div class="col-sm-10">
                      	<select name="result_request" class="form-control">
                      		<option <?php if( $settings->result_request == 3 ): ?> selected="selected" <?php endif; ?> value="3">3</option>
                      		<option <?php if( $settings->result_request == 6 ): ?> selected="selected" <?php endif; ?> value="6">6</option>
                            <option <?php if( $settings->result_request == 9 ): ?> selected="selected" <?php endif; ?> value="9">9</option>
						  	<option <?php if( $settings->result_request == 12 ): ?> selected="selected" <?php endif; ?> value="12">12</option>
						  	<option <?php if( $settings->result_request == 15 ): ?> selected="selected" <?php endif; ?> value="15">15</option>
						  	<option <?php if( $settings->result_request == 18 ): ?> selected="selected" <?php endif; ?> value="18">18</option>
						  	<option <?php if( $settings->result_request == 21 ): ?> selected="selected" <?php endif; ?> value="21">21</option>
                  <option <?php if( $settings->result_request == 24 ): ?> selected="selected" <?php endif; ?> value="24">24</option>
                    <option <?php if( $settings->result_request == 27 ): ?> selected="selected" <?php endif; ?> value="27">27</option>
                      <option <?php if( $settings->result_request == 30 ): ?> selected="selected" <?php endif; ?> value="30">30</option>
                        <option <?php if( $settings->result_request == 33 ): ?> selected="selected" <?php endif; ?> value="33">33</option>
                          <option <?php if( $settings->result_request == 37 ): ?> selected="selected" <?php endif; ?> value="37">37</option>
                            <option <?php if( $settings->result_request == 40 ): ?> selected="selected" <?php endif; ?> value="40">40</option>
                          </select>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group margin-zero">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.file_size_allowed'), false); ?></label>
                      <div class="col-sm-10">
                      	<select name="file_size_allowed" class="form-control">
                            <option <?php if( $settings->file_size_allowed == 1024 ): ?> selected="selected" <?php endif; ?> value="1024">1 MB</option>
						  	<option <?php if( $settings->file_size_allowed == 2048 ): ?> selected="selected" <?php endif; ?> value="2048">2 MB</option>
						  	<option <?php if( $settings->file_size_allowed == 3072 ): ?> selected="selected" <?php endif; ?> value="3072">3 MB</option>
						  	<option <?php if( $settings->file_size_allowed == 4096 ): ?> selected="selected" <?php endif; ?> value="4096">4 MB</option>
						  	<option <?php if( $settings->file_size_allowed == 5120 ): ?> selected="selected" <?php endif; ?> value="5120">5 MB</option>
						  	<option <?php if( $settings->file_size_allowed == 10240 ): ?> selected="selected" <?php endif; ?> value="10240">10 MB</option>
                          </select>
                          <span class="help-block "><?php echo e(trans('admin.upload_max_filesize_info'), false); ?> <strong><?php echo str_replace('M', 'MB', ini_get('upload_max_filesize')) ?></strong></span>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.min_campaign_amount'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="number" min="1" autocomplete="off" value="<?php echo e($settings->min_campaign_amount, false); ?>" name="min_campaign_amount" class="form-control onlyNumber" placeholder="<?php echo e(trans('admin.min_campaign_amount'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                   <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.max_campaign_amount'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="number" min="1" autocomplete="off" value="<?php echo e($settings->max_campaign_amount, false); ?>" name="max_campaign_amount" class="form-control onlyNumber" placeholder="<?php echo e(trans('admin.max_campaign_amount'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.min_donation_amount'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="number" min="1" autocomplete="off" value="<?php echo e($settings->min_donation_amount, false); ?>" name="min_donation_amount" class="form-control onlyNumber" placeholder="<?php echo e(trans('admin.min_donation_amount'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.max_donation_amount'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="number" min="1" autocomplete="off" value="<?php echo e($settings->max_donation_amount, false); ?>" name="max_donation_amount" class="form-control onlyNumber" placeholder="<?php echo e(trans('misc.max_donation_amount'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-success"><?php echo e(trans('admin.save'), false); ?></button>
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

<script type="text/javascript">
$(document).ready(function() {

    $(".onlyNumber").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/limits.blade.php ENDPATH**/ ?>