<li class="media py-2">
    <img src="<?php echo e(url('public/img/donor.jpg'), false); ?>" width="60" class="rounded-circle mr-3" alt="<?php echo e($donation->fullname, false); ?>" />
    <div class="media-body">
      <h6 class="mt-0 mb-1"><?php echo e($donation->fullname, false); ?> <span class="font-weight-light"><?php echo e(trans('misc.donated'), false); ?></span> <span class="text-success"><?php echo e(App\Helper::amountFormat($donation->donation), false); ?></span> </h6>
			<?php if( $donation->comment != '' ): ?>
			<p class="mb-0"><?php echo e($donation->comment, false); ?></p>
			<?php endif; ?>
			<small class="btn-block timeAgo text-muted" data="<?php echo e(date('c', strtotime( $donation->date )), false); ?>"></small>
    </div>
  </li>
<?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/includes/listing-donations.blade.php ENDPATH**/ ?>