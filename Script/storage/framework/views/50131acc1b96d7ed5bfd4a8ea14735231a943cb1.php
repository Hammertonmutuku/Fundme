

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h4>
           <?php echo e(trans('admin.admin'), false); ?> <i class="fa fa-angle-right margin-separator"></i> <?php echo e(trans('misc.withdrawals'), false); ?> (<?php echo e($data->total(), false); ?>)
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
                  <h5>
                  		<strong><?php echo e(trans('misc.default_withdrawal'), false); ?></strong>: <?php if( Auth::user()->payment_gateway == '' ): ?> <?php echo e(trans('misc.unconfigured'), false); ?> <?php else: ?> <?php echo e(Auth::user()->payment_gateway, false); ?> <?php endif; ?>
                  	</h5>

                    <div class="box-tools">
                      <a href="<?php echo e(url('dashboard/withdrawals/configure'), false); ?>" class="btn btn-sm btn-success no-shadow pull-right">
                        <i class="fa fa-cog myicon-right"></i> withdraw
                      </a>
                    </div>
                </div><!-- /.box-header -->

                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
               <tbody>

               	<?php if( $data->total() !=  0 && $data->count() != 0 ): ?>
                   <tr>
                      <th class="active">ID</th>
			   		  <th class="active"><?php echo e(trans('misc.campaign'), false); ?></th>
			          <th class="active"><?php echo e(trans('admin.amount'), false); ?></th>
			          <th class="active"><?php echo e(trans('misc.method'), false); ?></th>
			          <th class="active"><?php echo e(trans('admin.status'), false); ?></th>
			          <th class="active"><?php echo e(trans('admin.date'), false); ?></th>
			          <th class="active"><?php echo e(trans('admin.actions'), false); ?></th>
                    </tr><!-- /.TR -->

<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdrawal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr>
                      <td><?php echo e($withdrawal->id, false); ?></td>
                      <td>
                      	<a title="<?php echo e($withdrawal->title, false); ?>" href="<?php echo e(url('campaign',$withdrawal->campaigns()->id), false); ?>" target="_blank"><?php echo e(str_limit($withdrawal->campaigns()->title,20,'...'), false); ?> <i class="fa fa-external-link-square"></i></a>
                      	</td>
                      <td><?php if($settings->currency_position == 'left'): ?><?php echo e($settings->currency_symbol.$withdrawal->amount, false); ?><?php else: ?><?php echo e($withdrawal->amount.$settings->currency_symbol, false); ?><?php endif; ?></td>
                      <td><?php echo e($withdrawal->gateway, false); ?></td>
                      <td>
                      	<?php if( $withdrawal->status == 'paid' ): ?>
                      	<span class="label label-success"><?php echo e(trans('misc.paid'), false); ?></span>
                      	<?php else: ?>
                      	<span class="label label-warning"><?php echo e(trans('misc.pending_to_pay'), false); ?></span>
                      	<?php endif; ?>
                      </td>
                      <td><?php echo e(date($settings->date_format, strtotime($withdrawal->date)), false); ?></td>
                      <td>

                        <?php if( $withdrawal->status != 'paid' ): ?>
                              	<?php echo Form::open([
        			            'method' => 'POST',
        			            'url' => "delete/withdrawal/$withdrawal->id",
        			            'class' => 'displayInline'
        				        ]); ?>


        	            	<?php echo Form::button(trans('misc.delete'), ['class' => 'btn btn-danger btn-xs deleteW']); ?>

        	        	<?php echo Form::close(); ?>


        	        	<?php else: ?>

        	        	- <?php echo e(trans('misc.paid'), false); ?> -

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
		  
		 

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">

 document.getElementById('b2cSimulate').addEventListener('click', (event) => {
    event.preventDefault()
    
    const requestBody = {
        amount: document.getElementById('amount').value,
        occasion: document.getElementById('occasion').value,
		remarks: document.getElementById('remarks').value,
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

$(".deleteW").click(function(e) {
   	e.preventDefault();

   	var element = $(this);
    var form    = $(element).parents('form');
    element.blur();

	swal(
		{   title: "<?php echo e(trans('misc.delete_confirm'), false); ?>",
		 text: "<?php echo e(trans('misc.confirm_delete_withdrawal'), false); ?>",
		  type: "warning",
		  showLoaderOnConfirm: true,
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		   confirmButtonText: "<?php echo e(trans('misc.yes_confirm'), false); ?>",
		   cancelButtonText: "<?php echo e(trans('misc.cancel_confirm'), false); ?>",
		    closeOnConfirm: false,
		    },
		    function(isConfirm){
		    	 if (isConfirm) {
		    	 	form.submit();
		    	 	}
		    	 });


		 });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/users/withdrawals.blade.php ENDPATH**/ ?>