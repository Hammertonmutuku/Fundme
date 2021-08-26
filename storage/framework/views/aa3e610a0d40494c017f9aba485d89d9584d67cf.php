<?php

	//$settings = App\Models\AdminSettings::first();
	$authUser = App\Models\Campaigns::whereUserId(1)->get();

	// Total
	$total_campaigns = App\Models\Campaigns::whereUserId(Auth::User()->id)->count();
	$campaigns       = App\Models\Campaigns::whereUserId(Auth::User()->id)->orderBy('id','DESC')->take(1)->get();

	//$total_raised_funds = $authUser->donations()->sum('donation');

	$_donations = App\Models\Donations::leftJoin('campaigns', function($join) {
		 $join->on('donations.campaigns_id', '=', 'campaigns.id');
	 })
	 ->where('campaigns.user_id',Auth::user()->id)
	 ->where('donations.approved','1')
	 ->select('donations.*')
	 ->addSelect('campaigns.id')
	 ->addSelect('campaigns.title')
	 ->orderBy('donations.id','DESC');

	$total_raised_funds = $_donations->sum('donation');


	$total_donations = App\Models\Donations::count();

?>


<?php $__env->startSection('css'); ?>
<link href="<?php echo e(asset('public/plugins/morris/morris.css'), false); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.css'), false); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo e(trans('admin.dashboard'), false); ?>

          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo e(url('dashboard'), false); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('admin.home'), false); ?></a></li>
            <li class="active"><?php echo e(trans('admin.dashboard'), false); ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="row">

        <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo e($_donations->count(), false); ?></h3>
                  <p><?php echo e(trans_choice('misc.donation_plural', $_donations->count()), false); ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-cash"></i>
                </div>
								<a href="<?php echo e(url('dashboard/donations'), false); ?>" class="small-box-footer"><?php echo e(trans('misc.view_more'), false); ?> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

        <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3><?php echo e(\App\Helper::amountFormat($total_raised_funds), false); ?></h3>
                  <p><?php echo e(trans('misc.funds_raised'), false); ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-social-usd"></i>
                </div>
								<span class="small-box-footer"><?php echo e(trans('misc.funds_raised'), false); ?></span>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo e(\App\Helper::formatNumber( $total_campaigns ), false); ?></h3>
                  <p><?php echo e(trans_choice('misc.campaigns_plural', $total_campaigns), false); ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-speakerphone"></i>
                </div>
								<a href="<?php echo e(url('dashboard/campaigns'), false); ?>" class="small-box-footer"><?php echo e(trans('misc.view_more'), false); ?> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
          </div>

        <div class="row">

			<section class="col-md-7">
			  <div class="nav-tabs-custom">
			    <ul class="nav nav-tabs pull-right ui-sortable-handle">
			        <li class="pull-left header"><i class="ion ion-cash"></i> <?php echo e(trans('misc.donations_last_30_days'), false); ?></li>
			    </ul>
			    <div class="tab-content">
			        <div class="tab-pane active">
			          <div class="chart" id="chart1"></div>
			        </div>
			    </div>
			</div>
		  </section>

			<section class="col-md-5">

          <div class="box box-solid bg-teal-gradient">
            <div class="box-header">
              <i class="fa fa-th"></i>

              <h3 class="box-title"><?php echo e(trans('misc.funds_raised_last'), false); ?></h3>
            </div>
            <div class="box-body border-radius-none">
              <div class="chart" id="line-chart"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		  </section>

        </div><!-- ./row -->

        <div class="row">


					<div class="col-md-6">
						<div class="box box-primary">
							 <div class="box-header with-border">
								 <h3 class="box-title"><?php echo e(trans('misc.recent_donations'), false); ?></h3>
								 <div class="box-tools pull-right">
								 </div>
							 </div><!-- /.box-header -->

							 <?php if( $_donations->count() != 0 ): ?>
							 <div class="box-body">

								 <ul class="products-list product-list-in-box">

								<?php $__currentLoopData = $_donations->take(1)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

									 <li class="item">
										 <div class="product-img">
											 <img src="<?php echo e(asset('public/avatar/default.jpg'), false); ?>" style="height: auto !important;" />
										 </div>
										 <div class="product-info">
											 <a href="<?php echo e(url('campaign',$donation->campaigns_id), false); ?>" target="_blank" class="product-title"><?php echo e($donation->title, false); ?>

												 <span class="label label-success pull-right"><?php echo e(App\Helper::amountFormat($donation->donation), false); ?></span>
												 </a>
											 <span class="product-description">
												 <?php echo e(trans('misc.by'), false); ?> <?php echo e($donation->fullname, false); ?> / <?php echo e(date($settings->date_format, strtotime($donation->date)), false); ?>

											 </span>
										 </div>
									 </li><!-- /.item -->
									 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								 </ul>
							 </div><!-- /.box-body -->

							 <div class="box-footer text-center">
								 <a href="<?php echo e(url('dashboard/donations'), false); ?>" class="uppercase"><?php echo e(trans('misc.view_all'), false); ?></a>
							 </div><!-- /.box-footer -->

							 <?php else: ?>
								<div class="box-body">
								 <h5><?php echo e(trans('admin.no_result'), false); ?></h5>
									</div><!-- /.box-body -->

							 <?php endif; ?>

						 </div>
					 </div>



           <div class="col-md-6">
             <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo e(trans('misc.recent_campaigns'), false); ?></h3>
                  <div class="box-tools pull-right">
                  </div>
                </div><!-- /.box-header -->

                <?php if( $total_campaigns != 0 ): ?>
                <div class="box-body">

                  <ul class="products-list product-list-in-box">

                 <?php $__currentLoopData = $campaigns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campaign): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <?php
                switch (  $campaign->status ) {
							  case 'active':
								  $color_status = 'success';
								  $txt_status = trans('misc.active');
								  break;

							case 'pending':
								  $color_status = 'warning';
								  $txt_status = trans('admin.pending');
								  break;
						  }

							if($campaign->finalized == 1) {
								$color_status = 'default';
								$txt_status = trans('misc.finalized');
							}
                       ?>
                    <li class="item">
                      <div class="product-img">
                        <img src="<?php echo e(asset('public/campaigns/small/').'/'.$campaign->small_image, false); ?>" style="height: auto !important;" />
                      </div>
                      <div class="product-info">
                        <a href="<?php echo e(url('campaign',$campaign->id), false); ?>" target="_blank" class="product-title"><?php echo e($campaign->title, false); ?>

                        	<span class="label label-<?php echo e($color_status, false); ?> pull-right"><?php echo e($txt_status, false); ?></span>
                        	</a>
                        <span class="product-description">
                        	<?php if( isset($campaign->user()->id) ): ?>
                          <?php echo e(trans('misc.by'), false); ?> <?php echo e($campaign->user()->name, false); ?> / <?php echo e(date($settings->date_format, strtotime($campaign->date)), false); ?>

                          <?php else: ?>
                          <?php echo e(trans('misc.user_not_available'), false); ?>

                          <?php endif; ?>
                        </span>
                      </div>
                    </li><!-- /.item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </ul>
                </div><!-- /.box-body -->

                <div class="box-footer text-center">
                  <a href="<?php echo e(url('dashboard/campaigns'), false); ?>" class="uppercase"><?php echo e(trans('misc.view_all'), false); ?></a>
                </div><!-- /.box-footer -->

                <?php else: ?>
                 <div class="box-body">
                	<h5><?php echo e(trans('admin.no_result'), false); ?></h5>
                	 </div><!-- /.box-body -->

                <?php endif; ?>

              </div>
            </div>


        </div><!-- ./row -->

          <!-- Your Page Content Here -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

	<!-- Morris -->
	<script src="<?php echo e(asset('public/plugins/morris/raphael-min.js'), false); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/morris/morris.min.js'), false); ?>" type="text/javascript"></script>

	<!-- knob -->

	<script type="text/javascript">

var IndexToMonth = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun","Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];

//** Charts
new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'chart1',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    <?php
    for ( $i=0; $i < 30; ++$i) {

		$date = date('Y-m-d', strtotime('today - '.$i.' days'));

		$__donations = App\Models\Donations::leftJoin('campaigns', function($join) {
			 $join->on('donations.campaigns_id', '=', 'campaigns.id');
		 })
		 ->where('campaigns.user_id',Auth::user()->id)
		 ->where('donations.approved','1')
		 ->whereRaw("DATE(donations.date) = '".$date."'")->count();

		//print_r(DB::getQueryLog());
    ?>

    { days: '<?php echo $date; ?>', value: <?php echo $__donations ?> },

    <?php } ?>
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'days',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['<?php echo e(trans("misc.donations"), false); ?>'],
  pointFillColors: ['#FF5500'],
  lineColors: ['#DDD'],
  hideHover: 'auto',
  gridIntegers: true,
  resize: true,
  xLabelFormat: function (x) {
                  var month = IndexToMonth[ x.getMonth() ];
                  var year = x.getFullYear();
                  var day = x.getDate();
                  return  day +' ' + month;
                  //return  year + ' '+ day +' ' + month;
              },
          dateFormat: function (x) {
                  var month = IndexToMonth[ new Date(x).getMonth() ];
                  var year = new Date(x).getFullYear();
                  var day = new Date(x).getDate();
                  return day +' ' + month;
                  //return year + ' '+ day +' ' + month;
              },
});// <------------ MORRIS

var line = new Morris.Line({
    element          : 'line-chart',
    resize           : true,
		xLabelFormat: function (x) {
	                  var month = IndexToMonth[ x.getMonth() ];
	                  var year = x.getFullYear();
	                  var day = x.getDate();
	                  return  day +' ' + month;
	                  //return  year + ' '+ day +' ' + month;
	              },
	          dateFormat: function (x) {
	                  var month = IndexToMonth[ new Date(x).getMonth() ];
	                  var year = new Date(x).getFullYear();
	                  var day = new Date(x).getDate();
	                  return day +' ' + month;
	                  //return year + ' '+ day +' ' + month;
	              },
    data             : [
			<?php
	    for ( $i=0; $i < 30; ++$i) {

			$date = date('Y-m-d', strtotime('today - '.$i.' days'));

			$__donations = App\Models\Donations::leftJoin('campaigns', function($join) {
				 $join->on('donations.campaigns_id', '=', 'campaigns.id');
			 })
			 ->where('campaigns.user_id',Auth::user()->id)
			 ->where('donations.approved','1')
			 ->whereRaw("DATE(donations.date) = '".$date."'")->sum('donation');

			//print_r(DB::getQueryLog());
	    ?>

	    { days: '<?php echo $date; ?>', item1: <?php echo $__donations ?> },

	    <?php } ?>

    ],
    xkey             : 'days',
    ykeys            : ['item1'],
    labels           : ['<?php echo e(trans("admin.amount"), false); ?>'],
    lineColors       : ['#efefef'],
    lineWidth        : 2,
    hideHover        : 'auto',
    gridTextColor    : '#fff',
    gridStrokeWidth  : 0.4,
    pointSize        : 4,
    pointStrokeColors: ['#efefef'],
    gridLineColor    : '#efefef',
    gridTextFamily   : 'Open Sans',
    gridTextSize     : 10
  });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/resources/views/users/dashboard.blade.php ENDPATH**/ ?>