

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
            		<?php echo e(trans('misc.withdrawals'), false); ?> <?php echo e(trans('misc.configure'), false); ?>

          </h4>

        </section>

        <!-- Main content -->
        <section class="content">

          <?php if(session('error')): ?>
        			<div class="alert alert-danger btn-sm alert-fonts" role="alert">
        				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    		<?php echo e(session('error'), false); ?>

                    		</div>
                    	<?php endif; ?>

                    	<?php if(session('success')): ?>
        			<div class="alert alert-success btn-sm alert-fonts" role="alert">
        				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    		<?php echo e(session('success'), false); ?>

                    		</div>
                    	<?php endif; ?>
                      <?php if(session('notification')): ?>
                      <div class="alert alert-success btn-sm alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo e(session('notification'), false); ?>

                                </div>
                      <?php endif; ?>
                    
                      <?php if(session('notify_error')): ?>
                      <div class="alert alert-danger btn-sm alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo e(session('notify_error'), false); ?>

                                </div>
                              <?php endif; ?>

        	<div class="content">

        		<div class="row">

        	<div class="box box-success">
                <div class="box-header with-border">
                  <h5>
                     Withdrwals below 100,000 can be made using mpesa, from withdrawals greater than 100,0000 request for wihdrawal from admin for a bank transfer
                    </h5>
                    <h3><i class="fa fa-mobile myicon-right"></i> Mpesa</h3>
                </div><!-- /.box-header -->   
                    <form action="">
                      <?php echo csrf_field(); ?>
                      <div class="form-group">
                        <div class="box-body">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Phone number</label>
                            <div class="col-sm-10">
                              <input type="text" id="phone" name="phone" class="form-control" placeholder="0712345678">
                            </div>
                          </div>
                        </div><!-- /.box-body -->
                        <div class="form-group">
                          <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Amount</label>
                              <div class="col-sm-10">
                                <input type="text" id="amount" name="amount" class="form-control" placeholder="kes">
                              </div>
                            </div>
                          </div><!-- /.box-body -->
                      
                  <div class="box-footer">

                    <a href="<?php echo e(url('dashboard/withdrawals'), false); ?>" class="btn btn-default"><?php echo e(trans('admin.cancel'), false); ?></a>
                    <button id="b2cSimulate" class="btn btn-success pull-right"  >Withdraw</button>
                  </div><!-- /.box-footer -->
                    </form>

<hr />
<form method="post" action="<?php echo e(url('requestwithdrawal'), false); ?>">
  <input type="hidden" name="_token" value="<?php echo e(csrf_token(), false); ?>">
           <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title"><i class="fa fa-university myicon-right"></i> Request Bank Transfer </h3>
                </div><!-- /.box-header -->

                <div class="form-group">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Amount</label>
                      <div class="col-sm-10">
                        <input type="text" id="amount" name="amount" class="form-control" placeholder="kes">
                      </div>
                    </div>
                  </div><!-- /.box-body -->

                <!-- Start Box Body -->
                <div class="box-body">
                  <div class="form-group">
                    <label class="col-sm-2 control-label"><?php echo e(trans('misc.bank_details'), false); ?></label>
                    <div class="col-sm-10">

                      <textarea name="bank"rows="5" cols="40" class="form-control" placeholder="<?php echo e(trans('misc.bank_details'), false); ?>"></textarea>
                    </div>
                  </div>
                </div><!-- /.box-body -->

                  <div class="box-footer">

                    <a href="<?php echo e(url('dashboard/withdrawals'), false); ?>" class="btn btn-default"><?php echo e(trans('admin.cancel'), false); ?></a>
                    <button type="submit" class="btn btn-success pull-right" href="<?php echo e(route('requestwithdrawal'), false); ?>">Request</button>
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



<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
	<!-- icheck -->
	<script src="<?php echo e(asset('public/plugins/iCheck/icheck.min.js'), false); ?>" type="text/javascript"></script>

	<script type="text/javascript">
  document.getElementById('b2cSimulate').addEventListener('click', (event) => {
    event.preventDefault()
    
    const requestBody = {
        amount: document.getElementById('amount').value,
        phone: document.getElementById('phone').value
    }

    axios.post('http://localhost/Fundme/Script/simulateb2c', requestBody)
    .then((response) => {
        if(response.data.ResponseDescription){
            document.getElementById('c2b_response').innerHTML = response.data.Result.ResultDesc
        } else {
            document.getElementById('c2b_response').innerHTML = response.data.errorMessage
        }
    })
    .catch((error) => {
        console.log(error);
    })
})
		//Flat red color scheme for iCheck
        $('input[type="radio"]').iCheck({
          radioClass: 'iradio_flat-red'
        });

    

	</script>
  <script>
   
  </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/users/withdrawals-configure.blade.php ENDPATH**/ ?>