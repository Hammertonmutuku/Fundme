 <?php
	if (str_slug( $key->title ) == '' ) {
		$slugUrl  = '';
	} else {
		$slugUrl  = '/'.str_slug( $key->title );
	}

	$url = url('campaign',$key->id).$slugUrl;
	$percentage = number_format($key->donations()->sum('donation') / $key->goal * 100, 2, '.', '');

  // Deadline
	$timeNow = strtotime(Carbon\Carbon::now());

	if ($key->deadline != '') {
	    $deadline = strtotime($key->deadline);

		$date = strtotime($key->deadline);
	    $remaining = $date - $timeNow;

		$days_remaining = floor($remaining / 86400);
	}
?>
<div class="col-md-4">
  <div class="card campaigns mb-4 shadow-sm">
    <a href="<?php echo e($url, false); ?>" class="p-relative">
      <?php if($key->featured == 1): ?>
      <div class="ribbon-1" title="<?php echo e(trans('misc.featured_campaign'), false); ?>"><i class="fa fa-award"></i></div>
    <?php endif; ?>
      <img class="card-img-top" src="<?php echo e(asset('public/campaigns/small').'/'.$key->small_image, false); ?>" alt="<?php echo e($key->title, false); ?>">
    </a>
    <div class="card-body">
      <?php if(isset($key->category->id ) && $key->category->mode == 'on'): ?>
      <small class="btn-block mb-1"><a href="<?php echo e(url('category', $key->category->slug), false); ?>" class="text-muted"><i class="far fa-folder-open"></i> <?php echo e($key->category->name, false); ?></a></small>
    <?php endif; ?>
      <h5 class="card-title text-truncate">
        <a href="<?php echo e($url, false); ?>" class="text-dark">
          <?php echo e($key->title, false); ?>

        </a>
      </h5>
      <div class="progress progress-xs mb-4">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo e($percentage, false); ?>%">
        </div>
      </div>
      <p class="card-text text-truncate"><?php echo e(str_limit(strip_tags($key->description), 80, '...'), false); ?></p>
      <div class="d-flex justify-content-between align-items-center">
        <strong><?php echo e(App\Helper::amountFormat($key->donations()->sum('donation')), false); ?></strong>
        <small class="font-weight-bold"><?php echo e($percentage, false); ?>%</small>
      </div>
      <small class="text-muted"><?php echo e(trans('misc.raised_of'), false); ?> <?php echo e(App\Helper::amountFormat($key->goal), false); ?></small>
      <hr>
      <div class="d-flex justify-content-between align-items-center">
        <span class="text-truncate">
          <img src="<?php echo e(asset('public/avatar').'/'.$key->user()->avatar, false); ?>" width="25" height="25" class="rounded-circle avatar-campaign">
            <small><?php echo e(trans('misc.by'), false); ?> <strong><?php echo e($key->user()->name, false); ?></strong></small>
          </span>
        </span>

        <?php if(isset( $deadline ) && $key->finalized == 0): ?>

          <?php if($days_remaining > 0 ): ?>
            <small class="text-truncate"><i class="far fa-clock text-success"></i> <?php echo e($days_remaining, false); ?> <?php echo e(trans('misc.days_left'), false); ?></small>
          <?php elseif($days_remaining == 0 ): ?>
            <small class="text-truncate"><i class="far fa-clock text-warning"></i> <?php echo e(trans('misc.last_day'), false); ?></small>
          <?php else: ?>
            <small class="text-truncate"><i class="far fa-clock text-danger"></i> <?php echo e(trans('misc.no_time_anymore').$days_remaining, false); ?></small>
          <?php endif; ?>

        <?php endif; ?>

        <?php if($key->finalized == 1): ?>
          <small class="text-truncate"><i class="far fa-clock text-danger"></i> <?php echo e(trans('misc.campaign_ended'), false); ?></small>
          <?php endif; ?>

          <?php if(!isset( $deadline) && $key->finalized == 0): ?>
            <small class="text-truncate"><i class="fa fa-infinity text-success"></i> <?php echo e(trans('misc.no_deadline'), false); ?></small>
            <?php endif; ?>
      </div>
    </div>
  </div>
</div><!-- /col -->
<?php /**PATH /opt/lampp/htdocs/Practice/Fundme/Script/resources/views/includes/list-campaigns.blade.php ENDPATH**/ ?>