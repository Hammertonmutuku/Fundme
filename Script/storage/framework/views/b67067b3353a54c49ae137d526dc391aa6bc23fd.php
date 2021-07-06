

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/iCheck/all.css'), false); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/tagsinput/jquery.tagsinput.min.css'), false); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
            <?php echo e(trans('admin.admin'), false); ?>

            	<i class="fa fa-angle-right margin-separator"></i>
            		<?php echo e(trans('admin.general_settings'), false); ?>


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
                  <h3 class="box-title"><?php echo e(trans('admin.general_settings'), false); ?></h3>
                </div><!-- /.box-header -->



                <!-- form start -->
                <form class="form-horizontal" method="POST" action="<?php echo e(url('panel/admin/settings'), false); ?>" enctype="multipart/form-data">

                	<input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">

					<?php echo $__env->make('errors.errors-forms', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                 <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.name_site'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->title, false); ?>" name="title" class="form-control" placeholder="<?php echo e(trans('admin.title'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                   <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.welcome_text'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->welcome_text, false); ?>" name="welcome_text" class="form-control" placeholder="<?php echo e(trans('admin.welcome_text'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.welcome_subtitle'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->welcome_subtitle, false); ?>" name="welcome_subtitle" class="form-control" placeholder="<?php echo e(trans('admin.welcome_subtitle'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.keywords'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->keywords, false); ?>" id="tagInput" name="keywords" class="form-control select2">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.description'), false); ?></label>
                      <div class="col-sm-10">

                      	<textarea name="description" rows="4" id="description" class="form-control" placeholder="<?php echo e(trans('admin.description'), false); ?>"><?php echo e($settings->description, false); ?></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                   <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.email_no_reply'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->email_no_reply, false); ?>" name="email_no_reply" class="form-control" placeholder="<?php echo e(trans('admin.email_no_reply'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.email_admin'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->email_admin, false); ?>" name="email_admin" class="form-control" placeholder="<?php echo e(trans('admin.email_admin'), false); ?>">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.link_terms'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->link_terms, false); ?>" name="link_terms" class="form-control" placeholder="https://yousite.com/page/terms">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.link_privacy'), false); ?></label>
                      <div class="col-sm-10">
                        <input type="text" value="<?php echo e($settings->link_privacy, false); ?>" name="link_privacy" class="form-control" placeholder="https://yousite.com/page/privacy">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                 <div class="box-body">
                   <div class="form-group">
                     <label class="col-sm-2 control-label"><?php echo e(trans('admin.date_format'), false); ?></label>
                     <div class="col-sm-10">
                       <select name="date_format" class="form-control">
                         <option <?php if( $settings->date_format == 'M d, Y' ): ?> selected="selected" <?php endif; ?> value="M d, Y"><?php echo date('M d, Y'); ?></option>
                           <option <?php if( $settings->date_format == 'd M, Y' ): ?> selected="selected" <?php endif; ?> value="d M, Y"><?php echo date('d M, Y'); ?></option>
                         <option <?php if( $settings->date_format == 'Y-m-d' ): ?> selected="selected" <?php endif; ?> value="Y-m-d"><?php echo date('Y-m-d'); ?></option>
                           <option <?php if( $settings->date_format == 'm/d/Y' ): ?> selected="selected" <?php endif; ?>  value="m/d/Y"><?php echo date('m/d/Y'); ?></option>
                             <option <?php if( $settings->date_format == 'd/m/Y' ): ?> selected="selected" <?php endif; ?>  value="d/m/Y"><?php echo date('d/m/Y'); ?></option>
                         </select>
                     </div>
                   </div>
                 </div><!-- /.box-body -->

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo e(trans('admin.new_registrations'), false); ?></label>
                    <div class="col-sm-10">

                      <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="registration_active" <?php if( $settings->registration_active == 'on' ): ?> checked="checked" <?php endif; ?> value="on" checked>
                        On
                      </label>
                    </div>

                    <div class="radio">
                      <label class="padding-zero">
                        <input type="radio" name="registration_active" <?php if( $settings->registration_active == 'off' ): ?> checked="checked" <?php endif; ?> value="off">
                        Off
                      </label>
                    </div>

                    </div>
                  </div>
                </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.auto_approve_campaigns'), false); ?></label>
                      <div class="col-sm-10">

                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="auto_approve_campaigns" <?php if( $settings->auto_approve_campaigns == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                          <?php echo e(trans('misc.yes'), false); ?>

                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="auto_approve_campaigns" <?php if( $settings->auto_approve_campaigns == '0' ): ?> checked="checked" <?php endif; ?> value="0">
                          <?php echo e(trans('misc.no'), false); ?>

                        </label>
                      </div>

                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Captcha</label>
                      <div class="col-sm-10">

                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="captcha" <?php if( $settings->captcha == 'on' ): ?> checked="checked" <?php endif; ?> value="on" checked>
                          <?php echo e(trans('misc.yes'), false); ?>

                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="captcha" <?php if( $settings->captcha == 'off' ): ?> checked="checked" <?php endif; ?> value="off">
                          <?php echo e(trans('misc.no'), false); ?>

                        </label>
                      </div>

                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.captcha_on_donations'), false); ?></label>
                      <div class="col-sm-10">

                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="captcha_on_donations" <?php if( $settings->captcha_on_donations == 'on' ): ?> checked="checked" <?php endif; ?> value="on" checked>
                          <?php echo e(trans('misc.yes'), false); ?>

                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="captcha_on_donations" <?php if( $settings->captcha_on_donations == 'off' ): ?> checked="checked" <?php endif; ?> value="off">
                          <?php echo e(trans('misc.no'), false); ?>

                        </label>
                      </div>

                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('admin.email_verification'), false); ?></label>
                      <div class="col-sm-10">

                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="email_verification" <?php if( $settings->email_verification == '1' ): ?> checked="checked" <?php endif; ?> value="1" checked>
                          <?php echo e(trans('misc.yes'), false); ?>

                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="email_verification" <?php if( $settings->email_verification == '0' ): ?> checked="checked" <?php endif; ?> value="0">
                          <?php echo e(trans('misc.no'), false); ?>

                        </label>
                      </div>

                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.facebook_login'), false); ?></label>
                      <div class="col-sm-10">

                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="facebook_login" <?php if( $settings->facebook_login == 'on' ): ?> checked="checked" <?php endif; ?> value="on" checked>
                          On
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="facebook_login" <?php if( $settings->facebook_login == 'off' ): ?> checked="checked" <?php endif; ?> value="off">
                          Off
                        </label>
                      </div>

                      </div>
                    </div>
                  </div><!-- /.box-body -->

                  <!-- Start Box Body -->
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label"><?php echo e(trans('misc.google_login'), false); ?></label>
                      <div class="col-sm-10">

                      	<div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="google_login" <?php if( $settings->google_login == 'on' ): ?> checked="checked" <?php endif; ?> value="on" checked>
                          On
                        </label>
                      </div>

                      <div class="radio">
                        <label class="padding-zero">
                          <input type="radio" name="google_login" <?php if( $settings->google_login == 'off' ): ?> checked="checked" <?php endif; ?> value="off">
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
              </div>

        		</div><!-- /.row -->

        	</div><!-- /.content -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

	<!-- icheck -->
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js'), false); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/tagsinput/jquery.tagsinput.min.js'), false); ?>" type="text/javascript"></script>

	<script type="text/javascript">
		//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });

        $("#tagInput").tagsInput({

		 'delimiter': [','],   // Or a string with a single delimiter. Ex: ';'
		 'width':'auto',
		 'height':'auto',
	     'removeWithBackspace' : true,
	     'minChars' : 3,
	     'maxChars' : 25,
	     'defaultText':'<?php echo e(trans("misc.add_tag"), false); ?>',
	     /*onChange: function() {
         	var input = $(this).siblings('.tagsinput');
         	var maxLen = 4;

			if( input.children('span.tag').length >= maxLen){
			        input.children('div').hide();
			    }
			    else{
			        input.children('div').show();
			    }
			},*/
	});

	</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/settings.blade.php ENDPATH**/ ?>