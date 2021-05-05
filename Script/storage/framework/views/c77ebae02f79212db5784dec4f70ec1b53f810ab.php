<?php $__env->startSection('content'); ?>
  <!-- CAROUSEL -->
  <div id="myCarousel" class="carousel slide carousel-fade mb-0" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active carousel-cover" style="background: url('public/img/slider-1.jpg') no-repeat center center #232a29; background-size: cover;">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1 class="vivify driveInLeft delay-500 display-4"><?php echo e(trans('slider.slider_1_title'), false); ?></h1>
            <p class="vivify fadeInBottom delay-600"><?php echo e(trans('slider.slider_1_subtitle'), false); ?></p>
            <p class="vivify fadeInRight"><a class="btn btn-lg btn-primary" href="<?php echo e(url('campaigns/latest'), false); ?>" role="button"><?php echo e(trans('misc.explore_campaigns'), false); ?></a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item carousel-cover" style="background: url('public/img/slider-2.jpg') no-repeat center center #232a29; background-size: cover;">
        <div class="container">
          <div class="carousel-caption">
            <h1 class="vivify fadeInTop delay-600 display-4"><?php echo e(trans('slider.slider_2_title'), false); ?></h1>
            <p class="vivify fadeInBottom delay-600"><?php echo e(trans('slider.slider_2_subtitle'), false); ?></p>
            <p class="vivify fadeInLeft"><a class="btn btn-lg btn-primary" href="<?php echo e(url('campaigns/latest'), false); ?>" role="button"><?php echo e(trans('misc.explore_campaigns'), false); ?></a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item carousel-cover" style="background: url('public/img/slider-3.jpg') no-repeat center center #232a29; background-size: cover;">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1 class="vivify fadeInBottom delay-600 display-4"><?php echo e(trans('slider.slider_3_title'), false); ?></h1>
            <p class="vivify fadeInTop delay-600"><?php echo e(trans('slider.slider_3_subtitle'), false); ?></p>
            <p class="vivify fadeInRight"><a class="btn btn-lg btn-primary" href="<?php echo e(url('campaigns/latest'), false); ?>" role="button"><?php echo e(trans('misc.explore_campaigns'), false); ?></a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- ./ CAROUSEL -->

<?php if($categories->count() != 0): ?>
  <div class="section py-5">
    <div class="btn-block text-center mb-5">
      <h1><?php echo e(trans('misc.browse_by_category'), false); ?></h1>
      <p>
        <?php echo e(trans('misc.categories_subtitle'), false); ?>

      </p>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="owl-carousel owl-theme">
            <?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo $__env->make('includes.categories-listing', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if($data->total() != 0): ?>

<?php if($dataFeatured->total() != 0): ?>
  <!-- Featured Campaigns -->
  <div class="section py-5">
    <div class="btn-block text-center mb-5">
      <span class="display-4 text-warning"><i class="fa fa-award"></i></span>
      <h1><?php echo e(trans('misc.featured_campaign'), false); ?></h1>
      <p>
        <?php echo e(trans('misc.featured_campaigns_subtitle'), false); ?>

      </p>
    </div>
    <div class="container">
      <div class="row">
        <?php $__currentLoopData = $dataFeatured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
         	<?php echo $__env->make('includes.list-campaigns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    </div>

    <?php if($dataFeatured->total() > 3): ?>
    <div class="btn-block text-center py-3">
      <a href="<?php echo e(url('campaigns/featured'), false); ?>" class="btn btn-primary btn-main p-2 px-5 btn-lg rounded">
              <?php echo e(trans('misc.view_all'), false); ?> <small class="pl-1"><i class="fa fa-long-arrow-alt-right"></i></small>
            </a>
    </div>
    <?php endif; ?>
  </div>
<?php endif; ?>

    <!-- New Campaigns
    ========================= -->
    <div class="section py-5">
      <div class="btn-block text-center mb-5">
        <h1><?php echo e(trans('misc.explore_new_campaign'), false); ?></h1>
        <p>
          <?php echo e(trans('misc.recent_campaigns'), false); ?>

        </p>
      </div>
      <div class="container">
        <div class="row">
          <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('includes.list-campaigns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>

      <?php if($data->total() > $settings->result_request): ?>
      <div class="btn-block text-center py-3">
      <a href="<?php echo e(url('campaigns/latest'), false); ?>" class="btn btn-primary btn-main p-2 px-5 btn-lg rounded">
              <?php echo e(trans('misc.view_all'), false); ?> <small class="pl-1"><i class="fa fa-long-arrow-alt-right"></i></small>
            </a>
      </div>
      <?php endif; ?>
    </div>

    <!-- Counter -->
    <div class="py-5 bg-success text-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="d-flex py-3 my-3 my-lg-0 justify-content-center">
              <span class="mr-3 display-4"><i class="fa fa-users align-baseline"></i></span>
              <div>
                <h3 class="mb-0"><?php echo App\Helper::formatNumbersStats(App\Models\User::count()); ?></h3>
                <h5 class="font-weight-light text-uppercase"><?php echo e(trans('misc.members'), false); ?></h5>
              </div>
            </div>

          </div>
          <div class="col-md-4">
            <div class="d-flex py-3 my-3 my-lg-0 justify-content-center">
              <span class="mr-3 display-4"><i class="fa fa-bullhorn align-baseline"></i></span>
              <div>
                <h3 class="mb-0"><?php echo App\Helper::formatNumbersStats(App\Models\Campaigns::where('status','active')->count()); ?></h3>
                <h5 class="font-weight-light text-uppercase"><?php echo e(trans('misc.campaigns'), false); ?></h5>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="d-flex py-3 my-3 my-lg-0 justify-content-center">
              <span class="mr-3 display-4"><i class="fa fa-hand-holding-usd align-baseline"></i></span>
              <div>
                <h3 class="mb-0"><?php if($settings->currency_position == 'left'): ?> <?php echo e($settings->currency_symbol, false); ?><?php endif; ?><?php echo App\Helper::formatNumbersStats(App\Models\Donations::where('approved','1')->sum('donation')); ?><?php if($settings->currency_position == 'right'): ?><?php echo e($settings->currency_symbol, false); ?> <?php endif; ?></h3>
                <h5 class="font-weight-light text-uppercase"><?php echo e(trans('misc.funds_raised'), false); ?></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

	<?php else: ?>
	<div class="py-5 mb-5">
		<div class="text-center">
			<div class="btn-block">
	    			<i class="fa fa-bullhorn display-4"></i>
	    		</div>

	    		<h3 class="my-3">
	    	<?php echo e(trans('misc.no_campaigns'), false); ?>

	    	</h3>
        <a class="btn btn-primary p-2 px-5 btn-lg" href="<?php echo e(url('create/campaign'), false); ?>" role="button"><?php echo e(trans('misc.create_campaign'), false); ?></a>
		</div>
	</div>
	<?php endif; ?>

  <div class="jumbotron m-0 text-white text-center position-relative rounded-0">
    <div class="parallax-cover bg-cover" style="background-image: url('public/img/cover.jpg')"></div>
    <div class="container position-relative">
      <h1><?php echo e(trans('misc.title_cover_bottom'), false); ?></h1>
      <p><?php echo e($settings->welcome_subtitle, false); ?></p>
      <p><a class="btn btn-primary p-2 px-5 btn-lg" href="<?php echo e(url('create/campaign'), false); ?>" role="button"><?php echo e(trans('misc.create_campaign'), false); ?></a></p>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
		<script type="text/javascript">

    pagination('<?php echo e(url("ajax/campaigns"), false); ?>?page=', '<?php echo e(trans('misc.error'), false); ?>');

    // Owl Carousel
    $('.owl-carousel').owlCarousel({
      margin:10,
      items : <?php echo e($categories->count(), false); ?>,
      responsive: {
        0:{
              items:1
          },
          600:{
              items:2
          },
          1000:{
              items:4
          }
      }
    });

   <?php if(session('success_verify')): ?>
  		swal({
  			title: "<?php echo e(trans('misc.welcome'), false); ?>",
  			text: "<?php echo e(trans('users.account_validated'), false); ?>",
  			type: "success",
  			confirmButtonText: "<?php echo e(trans('users.ok'), false); ?>"
  			});
  		 <?php endif; ?>

  		 <?php if(session('error_verify')): ?>
  		swal({
  			title: "<?php echo e(trans('misc.error_oops'), false); ?>",
  			text: "<?php echo e(trans('users.code_not_valid'), false); ?>",
  			type: "error",
  			confirmButtonText: "<?php echo e(trans('users.ok'), false); ?>"
  			});
  		 <?php endif; ?>
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/index/home.blade.php ENDPATH**/ ?>