

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
					  <dt><?php echo e(trans('misc.transaction_id'), false); ?></dt>
					  <dd><?php echo e($data->txn_id != 'null' ? $data->txn_id : trans('misc.not_available'), false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans('auth.full_name'), false); ?></dt>
					  <dd><?php echo e($data->fullname, false); ?></dd>
					  <!-- ./end -->

					  <!-- start -->
					  <dt><?php echo e(trans_choice('misc.campaigns_plural', 1), false); ?></dt>
					  <dd>
              <?php if(isset($data->campaigns()->id)): ?>
              <a href="<?php echo e(url('campaign',$data->campaigns()->id), false); ?>" target="_blank">
                <?php echo e($data->campaigns()->title, false); ?> <i class="fa fa-external-link-square"></i>
              </a>
            <?php else: ?>
            <em class="text-muted"><?php echo e(trans('misc.campaign_deleted'), false); ?></em>
            <?php endif; ?>
            </dd>
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

            <?php if($data->payment_gateway == 'Bank Transfer' && $data->bank_transfer == ''): ?>
              <br />
              <dt><?php echo e(trans('misc.bank_swift_code'), false); ?></dt>
  					  <dd><?php echo e($data->bank_swift_code, false); ?></dd>

              <dt><?php echo e(trans('misc.account_number'), false); ?></dt>
  					  <dd><?php echo e($data->account_number, false); ?></dd>

              <dt><?php echo e(trans('misc.branch_name'), false); ?></dt>
  					  <dd><?php echo e($data->branch_name, false); ?></dd>

              <dt><?php echo e(trans('misc.branch_address'), false); ?></dt>
  					  <dd><?php echo e($data->branch_address, false); ?></dd>

              <dt><?php echo e(trans('misc.account_name'), false); ?></dt>
  					  <dd><?php echo e($data->account_name, false); ?></dd>

              <dt><?php echo e(trans('misc.iban'), false); ?></dt>
  					  <dd><?php echo e($data->iban, false); ?></dd>
              <br />

            <?php elseif($data->payment_gateway == 'Bank Transfer' && $data->bank_transfer != ''): ?>
              <br />
              <dt><?php echo e(trans('admin.bank_transfer_details'), false); ?></dt>
  					  <dd><?php echo nl2br($data->bank_transfer); ?></dd>
              <br />
            <?php endif; ?>
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
                  	 <a href="<?php echo e(url('panel/admin/donations'), false); ?>" class="btn btn-default"><?php echo e(trans('auth.back'), false); ?></a>

                     <?php if($data->approved == '0'): ?>

                       
                       <?php echo Form::open([
                          'method' => 'POST',
                          'url' => 'delete/donation',
                          'class' => 'displayInline',
                          'id' => 'formDeleteDonation'
                        ]); ?>

                     <?php echo Form::hidden('id',$data->id );; ?>

                     <?php echo Form::submit(trans('misc.delete'), ['class' => 'btn btn-danger pull-right margin-separator actionDelete']); ?>


                    <?php echo Form::close(); ?>


                    
                       <?php echo Form::open([
                          'method' => 'POST',
                          'url' => 'approve/donation',
                          'class' => 'displayInline'
                        ]); ?>

                     <?php echo Form::hidden('id',$data->id );; ?>

                     <?php echo Form::submit(trans('misc.approve_donation'), ['class' => 'btn btn-success pull-right']); ?>


                    <?php echo Form::close(); ?>





                  <?php endif; ?>

                  </div><!-- /.box-footer -->

              </div><!-- box -->
            </div><!-- col -->
         </div><!-- row -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
  <script type="text/javascript">

$(".actionDelete").click(function(e) {
   	e.preventDefault();

   	var element = $(this);
	var id     = element.attr('data-url');

	element.blur();

  swal(
		{   title: "<?php echo e(trans('misc.delete_confirm'), false); ?>",
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
		    	 	$('#formDeleteDonation').submit();
		    	 	//$('#form' + id).submit();
		    	 	}
		    	 });

		 });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/donation-view.blade.php ENDPATH**/ ?>