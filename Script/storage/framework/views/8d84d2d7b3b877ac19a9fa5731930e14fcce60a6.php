

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
            <?php echo e(trans('admin.dashboard'), false); ?> v<?php echo e($settings->version, false); ?>

          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo e(url('panel/admin'), false); ?>"><i class="fa fa-dashboard"></i> <?php echo e(trans('admin.home'), false); ?></a></li>
            <li class="active"><?php echo e(trans('admin.dashboard'), false); ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

        	<div class="row">

        <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3><?php echo e($total_donations, false); ?></h3>
                  <p><?php echo e(trans_choice('misc.donation_plural', $total_donations), false); ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-cash"></i>
                </div>
								<a href="<?php echo e(url('panel/admin/donations'), false); ?>" class="small-box-footer"><?php echo e(trans('misc.view_more'), false); ?> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

        <div class="col-lg-3">
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

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?php echo e(number_format( \App\Models\User::count()), false); ?></h3>
                  <p><?php echo e(trans('misc.members'), false); ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-ios-people"></i>
                </div>
								<a href="<?php echo e(url('panel/admin/members'), false); ?>" class="small-box-footer"><?php echo e(trans('misc.view_more'), false); ?> <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3><?php echo e(\App\Helper::formatNumber( $total_campaigns ), false); ?></h3>
                  <p><?php echo e(trans_choice('misc.campaigns_plural', $total_campaigns), false); ?></p>
                </div>
                <div class="icon">
                  <i class="ion ion-speakerphone"></i>
                </div>
								<a href="<?php echo e(url('panel/admin/campaigns'), false); ?>" class="small-box-footer"><?php echo e(trans('misc.view_more'), false); ?> <i class="fa fa-arrow-circle-right"></i></a>
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
		  	<!-- Map box -->
              <div class="box box-solid bg-purple-gradient">
                <div class="box-header">

                  <i class="fa fa-map-marker"></i>
                  <h3 class="box-title">
                    <?php echo e(trans('admin.user_countries'), false); ?>

                  </h3>
                </div>
                <div class="box-body">
                  <div id="world-map" style="height: 350px; width: 100%;"></div>
                </div><!-- /.box-body-->
              </div>
              <!-- /.box -->
		  </section>

        </div><!-- ./row -->

        <div class="row">
        	<div class="col-md-6">

                  <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title"><?php echo e(trans('admin.latest_members'), false); ?></h3>
                      <div class="box-tools pull-right">
                      </div>
                    </div><!-- /.box-header -->

										<div class="box-body">
	                    <ul class="products-list product-list-in-box">
	                      <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<?php
													switch (  $user->status ) {
													  case 'active':
														  $user_color_status = 'success';
														  $user_txt_status = trans('misc.active');
														  break;

													case 'pending':
														  $user_color_status = 'info';
														  $user_txt_status = trans('misc.pending');
														  break;

													case 'suspended':
														  $user_color_status = 'warning';
														  $user_txt_status = trans('admin.suspended');
														  break;

												  }
													 ?>

												<li class="item">
		                      <div class="product-img">
		                        <img src="<?php echo e(asset('public/avatar').'/'.$user->avatar, false); ?>" class="img-circle h-auto" onerror="onerror" />
		                      </div>
		                      <div class="product-info">
		                       <?php echo e($user->name, false); ?>

		                        	<span class="label label-<?php echo e($user_color_status, false); ?> pull-right"><?php echo e($user_txt_status, false); ?></span>
		                        	
		                        <span class="product-description">
		                          <?php echo e(date($settings->date_format, strtotime($user->date)), false); ?>

		                        </span>
		                      </div>
		                    </li><!-- /.item -->
	                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                    </ul><!-- /.users-list -->
	                  </div><!-- /.box-body -->

                    <div class="box-footer text-center">
                      <a href="<?php echo e(url('panel/admin/members'), false); ?>" class="uppercase"><?php echo e(trans('admin.view_all_members'), false); ?></a>
                    </div><!-- /.box-footer -->

                  </div><!--/.box -->
                </div>



           <div class="col-md-6">
             <div class="box box-danger">
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
                  <a href="<?php echo e(url('panel/admin/campaigns'), false); ?>" class="uppercase"><?php echo e(trans('misc.view_all'), false); ?></a>
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
	<script src="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'), false); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'), false); ?>" type="text/javascript"></script>
	<script src="<?php echo e(asset('public/plugins/knob/jquery.knob.js'), false); ?>" type="text/javascript"></script>

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
		$_donations = App\Models\Donations::whereRaw("DATE(date) = '".$date."'")->where('approved','1')->count();
		//print_r(DB::getQueryLog());
    ?>

    { days: '<?php echo $date; ?>', value: <?php echo $_donations ?> },

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

/* jQueryKnob */
  $(".knob").knob();

  //jvectormap data
  var visitorsData = {
  <?php

  $users_countries = App\Models\User::where('countries_id', '<>', '')->groupBy('countries_id')->get();

   foreach ( $users_countries as $key ) {

	$total = App\Models\Countries::find($key->countries_id);
   	?>

 	"<?php echo e($key->country()->country_code, false); ?>": <?php echo e($total->users()->count(), false); ?>, <?php } ?>
  };

  //World map by jvectormap
  $('#world-map').vectorMap({
    map: 'world_mill_en',
    backgroundColor: "transparent",
    regionStyle: {
      initial: {
        fill: '#e4e4e4',
        "fill-opacity": 1,
        stroke: 'none',
        "stroke-width": 0,
        "stroke-opacity": 1
      }
    },
    series: {
      regions: [{
          values: visitorsData,
          scale: ["#92c1dc", "#00a65a"],
          normalizeFunction: 'polynomial'
        }]
    },
    onRegionLabelShow: function (e, el, code) {
      if (typeof visitorsData[code] != "undefined")
        el.html(el.html() + ': ' + visitorsData[code] + ' <?php echo e(trans("admin.registered_members"), false); ?>');
    }
  });
  </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>