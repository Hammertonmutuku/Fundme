<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $__env->make('includes.css_general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php if($settings->color_default <> ''): ?>
	<style>
	.btn-primary:not(:disabled):not(.disabled).active,
	.btn-primary:not(:disabled):not(.disabled):active,
	.show>.btn-primary.dropdown-toggle,
	.btn-primary:hover,
	.btn-primary:focus,
	.btn-primary:active,
	.btn-primary,
	.btn-primary.disabled,
	.btn-primary:disabled {
	    background-color: <?php echo e($settings->color_default, false); ?>;
	    border-color: <?php echo e($settings->color_default, false); ?>;
	}
	</style>
<?php endif; ?>
</head>
<body>
	<div class="container">
	<div class="row">

      <div class="col-xs-12 col-sm-6 col-md-3 col-thumb">
 <?php

	if( str_slug( $response->title ) == '' ) {
		$slugUrl  = '';
	} else {
		$slugUrl  = '/'.str_slug( $response->title );
	}

	$url = url('campaign',$response->id).$slugUrl;
	$percentage = number_format($response->donations()->sum('donation') / $response->goal * 100, 2, '.', '');

	// Deadline
	$timeNow = strtotime(Carbon\Carbon::now());

	if( $response->deadline != '' ) {
	    $deadline = strtotime($response->deadline);

		$date = strtotime($response->deadline);
	    $remaining = $date - $timeNow;

		$days_remaining = floor($remaining / 86400);
	}

?>
<div class="card mb-4 shadow-sm">
	<a href="<?php echo e($url, false); ?>" class="p-relative">
		<?php if($response->featured == 1): ?>
		<div class="ribbon-1" title="<?php echo e(trans('misc.featured_campaign'), false); ?>"><i class="fa fa-award"></i></div>
	<?php endif; ?>
		<img class="card-img-top" src="<?php echo e(asset('public/campaigns/small').'/'.$response->small_image, false); ?>" alt="<?php echo e($response->title, false); ?>">
	</a>
	<div class="card-body">
		<h5 class="card-title text-truncate">
			<a href="<?php echo e($url, false); ?>" class="text-dark">
				<?php echo e($response->title, false); ?>

			</a>
		</h5>
		<div class="progress progress-xs mb-4">
			<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo e($percentage, false); ?>%">
			</div>
		</div>
		<p class="card-text text-truncate"><?php echo e(str_limit(strip_tags($response->description), 80, '...'), false); ?></p>
		<div class="d-flex justify-content-between align-items-center">
			<strong><?php echo e(App\Helper::amountFormat($response->donations()->sum('donation')), false); ?></strong>
			<small class="font-weight-bold"><?php echo e($percentage, false); ?>%</small>
		</div>
		<small class="text-muted"><?php echo e(trans('misc.raised_of'), false); ?> <?php echo e(App\Helper::amountFormat($response->goal), false); ?></small>

		<div class="btn-block">
		<?php if(isset($deadline) && $deadline > $timeNow && $response->finalized == 0): ?>
			<a href="<?php echo e(url('donate/'.$response->id), false); ?>" target="_blank" class="btn btn-main btn-primary no-hover btn-lg btn-block custom-rounded">
				<?php echo e(trans('misc.donate_now'), false); ?>

				</a>

				<?php elseif(! isset($deadline) && $response->finalized == 0): ?>

					<a href="<?php echo e(url('donate/'.$response->id), false); ?>" target="_blank" class="btn btn-main btn-primary no-hover btn-lg btn-block custom-rounded">
						<?php echo e(trans('misc.donate_now'), false); ?>

						</a>
				<?php else: ?>

			<div class="padding-15 btnDisabled text-center custom-rounded" role="alert">
				<i class="fa fa-lock mr-1"></i> <?php echo e(trans('misc.campaign_ended'), false); ?>

			</div>

			<?php endif; ?>
	</div>

		<hr>
		<div class="d-flex justify-content-between align-items-center">
			<span class="text-truncate">
				<img src="<?php echo e(asset('public/avatar').'/'.$response->user()->avatar, false); ?>" width="25" height="25" class="rounded-circle avatar-campaign">
					<small><?php echo e(trans('misc.by'), false); ?> <strong><?php echo e($response->user()->name, false); ?></strong></small>
				</span>
			</span>

			<?php if(isset( $deadline ) && $response->finalized == 0): ?>

				<?php if($days_remaining > 0 ): ?>
					<small class="text-truncate"><i class="far fa-clock text-success"></i> <?php echo e($days_remaining, false); ?> <?php echo e(trans('misc.days_left'), false); ?></small>
				<?php elseif($days_remaining == 0 ): ?>
					<small class="text-truncate"><i class="far fa-clock text-warning"></i> <?php echo e(trans('misc.last_day'), false); ?></small>
				<?php else: ?>
					<small class="text-truncate"><i class="far fa-clock text-danger"></i> <?php echo e(trans('misc.no_time_anymore').$days_remaining, false); ?></small>
				<?php endif; ?>

			<?php endif; ?>

			<?php if($response->finalized == 1): ?>
				<small class="text-truncate"><i class="far fa-clock text-danger"></i> <?php echo e(trans('misc.campaign_ended'), false); ?></small>
				<?php endif; ?>

				<?php if(!isset( $deadline) && $response->finalized == 0): ?>
					<small class="text-truncate"><i class="fa fa-infinity text-success"></i> <?php echo e(trans('misc.no_deadline'), false); ?></small>
					<?php endif; ?>
		</div>
	</div>
</div>

    	   </div><!-- /col-sm-6 col-md-4 -->

    	 </div><!-- /row -->
   </div><!-- /container -->

		<?php echo $__env->make('includes.javascript_general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/includes/embed.blade.php ENDPATH**/ ?>