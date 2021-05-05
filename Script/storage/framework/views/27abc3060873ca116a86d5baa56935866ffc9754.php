<?php $__env->startSection('title'); ?><?php echo e($response->title.' - ', false); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>

<meta property="og:type" content="website" />
<meta property="og:image:width" content="<?php echo e(App\Helper::getWidth('public/campaigns/large/'.$response->large_image), false); ?>"/>
<meta property="og:image:height" content="<?php echo e(App\Helper::getHeight('public/campaigns/large/'.$response->large_image), false); ?>"/>

<!-- Current locale and alternate locales -->
<meta property="og:locale" content="en_US" />
<meta property="og:locale:alternate" content="es_ES" />

<!-- Og Meta Tags -->
<link rel="canonical" href="<?php echo e(url("campaign/$response->id").'/'.str_slug($response->title), false); ?>"/>
<meta property="og:site_name" content="<?php echo e($settings->title, false); ?>"/>
<meta property="og:url" content="<?php echo e(url("campaign/$response->id").'/'.str_slug($response->title), false); ?>"/>
<meta property="og:image" content="<?php echo e(url('public/campaigns/large',$response->large_image), false); ?>"/>

<meta property="og:title" content="<?php echo e($response->title, false); ?>"/>
<meta property="og:description" content="<?php echo e(strip_tags($response->description), false); ?>"/>
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="<?php echo e(url('public/campaigns/large',$response->large_image), false); ?>" />
<meta name="twitter:title" content="<?php echo e($response->title, false); ?>" />
<meta name="twitter:description" content="<?php echo e(strip_tags($response->description), false); ?>"/>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-5">

<div class="row">
	<?php if(session()->has('donation_cancel')): ?>
	<div class="alert alert-danger text-center btn-block mb-3 alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
			<i class="far fa-times-circle mr-1"></i> <?php echo e(trans('misc.donation_cancel'), false); ?>

		</div>
		<?php endif; ?>

			<?php if(session('donation_success')): ?>
	<div class="alert alert-success text-center btn-block mb-3 alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">×</span>
								</button>
			<i class="fa fa-check mr-1"></i> <?php echo e(trans('misc.donation_success'), false); ?>

		</div>
		<?php endif; ?>

		<?php if(session('donation_pending')): ?>
<div class="alert alert-info text-center btn-block mb-3 alert-dismissible fade show" role="alert">
	<button type="button" class="close text-dark" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
		<i class="fa fa-info-circle mr-1"></i> <?php echo e(trans('misc.donation_pending'), false); ?>

	</div>
	<?php endif; ?>


<!-- Col MD -->
<div class="col-md-7 margin-bottom-20">

	<div class="text-center mb-2 position-relative">
		<?php if($response->featured == 1): ?>
		<div class="ribbon-1" title="<?php echo e(trans('misc.featured_campaign'), false); ?>"><i class="fa fa-award"></i></div>
	<?php endif; ?>

	<?php if($response->video == ''): ?>
		<img class="img-fluid rounded-lg" style="display: inline-block;" src="<?php echo e(url('public/campaigns/large',$response->large_image), false); ?>" />
	<?php else: ?>

		<?php if(in_array(App\Helper::videoUrl($response->video), array('youtube.com','www.youtube.com','youtu.be','www.youtu.be'))): ?>

		<div class="embed-responsive embed-responsive-16by9 mb-2">
			<iframe class="embed-responsive-item" height="360" src="https://www.youtube.com/embed/<?php echo e(App\Helper::getYoutubeId($response->video), false); ?>" allowfullscreen></iframe>
		</div>
		<?php endif; ?>

		<?php if(in_array(App\Helper::videoUrl($response->video), array('vimeo.com','player.vimeo.com'))): ?>

		<div class="embed-responsive embed-responsive-16by9">
			<iframe class="embed-responsive-item" src="https://player.vimeo.com/video/<?php echo e(App\Helper::getVimeoId($response->video), false); ?>" allowfullscreen></iframe>
		</div>
		<?php endif; ?>

	<?php endif; ?>

</div>

<?php if( Auth::check()
&&  isset($response->user()->id)
&& Auth::user()->id == $response->user()->id
&& !isset( $deadline )
&& $response->finalized == 0
): ?>
 	<div class="row margin-bottom-20">
		<div class="col-md-3">
			<a class="btn btn-block btn-primary mb-2 no-hover" href="<?php echo e(url('rewards/campaign',$response->id), false); ?>"><?php echo e(trans('misc.add_reward'), false); ?></a>
		</div>
			<div class="col-md-3">
				<a class="btn btn-success btn-block mb-2 no-hover" href="<?php echo e(url('edit/campaign',$response->id), false); ?>"><?php echo e(trans('users.edit'), false); ?></a>
			</div>
			<div class="col-md-3">
				<a class="btn btn-info btn-block mb-2 no-hover" href="<?php echo e(url('update/campaign',$response->id), false); ?>"><?php echo e(trans('misc.add_update'), false); ?></a>
			</div>
			<?php if( $response->donations()->count() == 0 ): ?>
			<div class="col-md-3">
				<a href="#" class="btn btn-danger btn-block mb-2 no-hover" id="deleteCampaign" data-url="<?php echo e(url('delete/campaign',$response->id), false); ?>"><?php echo e(trans('misc.delete'), false); ?></a>
			</div>
			<?php endif; ?>
		</div>

<?php elseif( Auth::check()
&&  isset($response->user()->id)
&& Auth::user()->id == $response->user()->id
&& isset( $deadline )
&& $deadline > $timeNow
&& $response->finalized == 0
): ?>
		<div class="row margin-bottom-20">
			<div class="col-md-3">
				<a class="btn btn-block btn-primary mb-2 no-hover" href="<?php echo e(url('rewards/campaign',$response->id), false); ?>"><?php echo e(trans('misc.add_reward'), false); ?></a>
			</div>
			<div class="col-md-3">
				<a class="btn btn-success btn-block mb-2 no-hover" href="<?php echo e(url('edit/campaign',$response->id), false); ?>"><?php echo e(trans('users.edit'), false); ?></a>
			</div>
			<div class="col-md-3">
				<a class="btn btn-info btn-block mb-2 no-hover" href="<?php echo e(url('update/campaign',$response->id), false); ?>"><?php echo e(trans('misc.post_an_update'), false); ?></a>
			</div>
			<?php if( $response->donations()->count() == 0 ): ?>
			<div class="col-md-3">
				<a href="#" class="btn btn-danger btn-block mb-2 no-hover" id="deleteCampaign" data-url="<?php echo e(url('delete/campaign',$response->id), false); ?>"><?php echo e(trans('misc.delete'), false); ?></a>
			</div>
			<?php endif; ?>
		</div>

		<?php endif; ?>

 </div><!-- /COL MD -->

<!-- Second Panel
==================================== -->
 <div class="col-md-5">

	 <?php if( $response->categories_id != '' ): ?>
	 	<?php if(isset($response->category->id ) && $response->category->mode == 'on'): ?>
	 <small class="btn-block mb-1"><a href="<?php echo e(url('category', $response->category->slug), false); ?>" class="text-muted"><i class="far fa-folder-open"></i> <?php echo e($response->category->name, false); ?></a></small>
 		<?php endif; ?>
 	<?php endif; ?>
	 <h2 class="mb-2 font-weight-bold text-break text-dark"><?php echo e($response->title, false); ?></h2>

<?php if(isset($response->user()->id)): ?>
<!-- Start Panel -->
 	<div class="panel panel-default panel-transparent mb-4">
	  <div class="panel-body">
	    <div class="media none-overflow">
			  <div class="d-flex my-2 align-items-center">
			      <img class="rounded-circle mr-2" src="<?php echo e(url('public/avatar',$response->user()->avatar), false); ?>" width="60" height="60">

						<div class="d-block">
						<?php echo e(trans('misc.by'), false); ?> <strong class="text-dark"><?php echo e($response->user()->name, false); ?></strong>

						<?php if(Auth::guest() || Auth::check() && Auth::user()->id != $response->user()->id): ?>
			    		<a href="#" title="<?php echo e(trans('misc.contact_organizer'), false); ?>" class="text-muted" data-toggle="modal" data-target="#sendEmail">
			    				<i class="fa fa-envelope"></i>
			    		</a>
						<?php endif; ?>

							<div class="d-block">
								<small class="media-heading text-muted btn-block margin-zero"><?php echo e(trans('misc.created'), false); ?> <?php echo e(date($settings->date_format, strtotime($response->date) ), false); ?> <span class="align-middle mx-1" style="font-size:8px;">|</span>
								<?php if( $response->location != '' ): ?>
							 <i class="fa fa-map-marker-alt mr-1"></i> <?php echo e($response->location, false); ?>

							 <?php endif; ?>
							 </small>
							</div>
						</div>
			  </div>
			</div>
	  </div>
	</div><!-- End Panel -->

	<span class="progress progress-xs mb-3">
		<span class="percentage bg-success" style="width: <?php echo e($percentage, false); ?>%" aria-valuemin="0" aria-valuemax="100" role="progressbar"></span>
	</span>

	<small class="btn-block margin-bottom-10 text-muted">
		<strong class="text-strong-small"><?php echo e(App\Helper::amountFormat($response->donations()->sum('donation')), false); ?></strong> <?php echo e(trans('misc.raised_of'), false); ?> <?php echo e(App\Helper::amountFormat($response->goal), false); ?> <?php echo e(strtolower(trans('misc.goal')), false); ?>

		<strong class="text-percentage"><?php echo e($percentage, false); ?>%</strong>
	</small>

	<ul class="list-inline my-4 border-top border-bottom py-3 text-center">
		<li class="list-inline-item border-right" style="width:31%;">
			<i class="fa fa-donate align-baseline text-success"></i> <?php echo e(App\Helper::formatNumber($response->donations()->count()), false); ?> <?php echo e(trans_choice('misc.donation_plural',$response->donations()->count()), false); ?>

		</li>
		<li class="list-inline-item border-right" style="width:31%;">
			<?php if(isset( $deadline ) && $response->finalized == 0): ?>

				<?php if($days_remaining > 0 ): ?>
					<i class="far fa-clock text-success"></i> <?php echo e($days_remaining, false); ?> <?php echo e(trans('misc.days_left'), false); ?>

				<?php elseif($days_remaining == 0 ): ?>
					<i class="far fa-clock text-warning"></i> <?php echo e(trans('misc.last_day'), false); ?>

				<?php else: ?>
					<i class="far fa-clock text-danger"></i> <?php echo e(trans('misc.no_time_anymore'), false); ?>

				<?php endif; ?>

			<?php endif; ?>

			<?php if($response->finalized == 1): ?>
				<i class="far fa-clock text-danger"></i> <?php echo e(trans('misc.finalized'), false); ?>

				<?php endif; ?>

				<?php if(!isset( $deadline) && $response->finalized == 0): ?>
					<i class="fa fa-infinity text-success"></i> <?php echo e(trans('misc.no_deadline'), false); ?>

					<?php endif; ?>
		</li>

		<li class="list-inline-item" style="width:31%;">
			<?php if(auth()->guard()->check()): ?>
				<span class="likeButton <?php echo e($statusLike, false); ?>" data-id="<?php echo e($response->id, false); ?>" data-like="<?php echo e(trans('misc.like'), false); ?>" data-unlike="<?php echo e(trans('misc.unlike'), false); ?>">
					<i class="<?php echo e($icoLike, false); ?> align-baseline text-success"></i>
				</span>
			<?php else: ?>
				<i class="far fa-heart align-baseline text-success"></i>
			<?php endif; ?>
			<span id="countLikes"><?php echo e(App\Helper::formatNumber($response->likes()->count()), false); ?></span> <?php echo e(trans_choice('misc.likes_plural', $response->likes()->count()), false); ?>

		</li>
	</ul>

<!-- Button Donate
============================== -->
<?php if(isset( $deadline ) && $deadline > $timeNow && $response->finalized == 0): ?>
 	<div class="btn-group btn-block margin-bottom-20 <?php if( Auth::check() && Auth::user()->id == $response->user()->id ): ?> d-none <?php endif; ?>">
		<a href="<?php echo e(url('donate/'.$response->id.$slug_url), false); ?>" class="btn btn-main btn-primary no-hover btn-lg btn-block custom-rounded">
			<?php echo e(trans('misc.donate_now'), false); ?>

			</a>
		</div>

		<?php elseif(! isset( $deadline ) && $response->finalized == 0): ?>
		<div class="btn-group btn-block margin-bottom-20 <?php if( Auth::check() && Auth::user()->id == $response->user()->id ): ?> d-none <?php endif; ?>">
		<a href="<?php echo e(url('donate/'.$response->id.$slug_url), false); ?>" class="btn btn-main btn-primary no-hover btn-lg btn-block custom-rounded">
			<?php echo e(trans('misc.donate_now'), false); ?>

			</a>
		</div>

		<?php else: ?>

		<div class="alert btnDisabled text-center btn-block" role="alert">
			<i class="fa fa-lock mr-1"></i> <?php echo e(trans('misc.campaign_ended'), false); ?>

		</div>

		<?php endif; ?>

<?php else: ?>
<div class="alert btnDisabled text-center btn-block" role="alert">
			<i class="fa fa-lock mr-1"></i> <?php echo e(trans('misc.campaign_ended'), false); ?>

		</div>
<?php endif; ?>
<!-- End Button Donate
============================== -->

<?php if($response->finalized != 1): ?>
<div class="btn-group btn-block">
<a href="javascript:;" class="btn btn-main btn-outline-primary no-hover btn-lg" data-toggle="modal" data-target=".share-modal">
	<?php echo e(trans('misc.share'), false); ?>

	</a>
</div>


<!-- Social Share
============================== -->

	<!-- Share modal -->
<div class="modal fade share-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
		<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mySmallModalLabel"><?php echo e(trans('misc.share_on'), false); ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3 col-6 mb-3">
							<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url('campaign',$response->id).'/'.str_slug($response->title), false); ?>" title="Facebook" target="_blank" class="social-share text-muted d-block text-center h6">
								<i class="fab fa-facebook-square facebook-btn"></i>
								<span class="btn-block mt-3">Facebook</span>
							</a>
						</div>
						<div class="col-md-3 col-6 mb-3">
							<a href="https://twitter.com/intent/tweet?url=<?php echo e(url('campaign',$response->id), false); ?>&text=<?php echo e(e( $response->title ), false); ?>" data-url="<?php echo e(url('campaign',$response->id), false); ?>" class="social-share text-muted d-block text-center h6" target="_blank" title="Twitter">
								<i class="fab fa-twitter twitter-btn"></i> <span class="btn-block mt-3">Twitter</span>
							</a>
						</div>
						<div class="col-md-3 col-6 mb-3">
							<a href="fb-messenger://share/?link=<?php echo e(url()->current(), false); ?>&app_id=<?php echo e(config('fb_app.id'), false); ?>" class="social-share text-muted d-block text-center h6" title="Facebook Messenger">
							<i class="fab fa-facebook-messenger fb-messenger"></i> <span class="btn-block mt-3">Messenger</span>
						</a>
					</div>
						<div class="col-md-3 col-6 mb-3">
							<a href="whatsapp://send?text=<?php echo e(url()->current(), false); ?>" data-action="share/whatsapp/share" class="social-share text-muted d-block text-center h6" title="WhatsApp">
								<i class="fab fa-whatsapp btn-whatsapp"></i> <span class="btn-block mt-3">WhatsApp</span>
							</a>
						</div>
						<div class="col-md-3 col-6 mb-3">
							<a href="https://telegram.me/share/url?url=<?php echo e(url()->current(), false); ?>&text=<?php echo e(e( $response->title ), false); ?>" target="_blank"  class="social-share text-muted d-block text-center h6" title="Telegram">
								<i class="fab fa-telegram-plane btn-telegram"></i> <span class="btn-block mt-3">Telegram</span></a>
							</div>
						<div class="col-md-3 col-6 mb-3">
							<a href="mailto:?subject=<?php echo e(e( $response->title ), false); ?>&amp;body=<?php echo e(url('campaign',$response->id), false); ?>" class="social-share text-muted d-block text-center h6" title="<?php echo e(trans('auth.email'), false); ?>">
								<i class="far fa-envelope"></i> <span class="btn-block mt-3"><?php echo e(trans('auth.email'), false); ?></span>
							</a>
						</div>
						<div class="col-md-3 col-6 mb-3">
							<a href="sms://?body=<?php echo e(trans('misc.check_this'), false); ?> <?php echo e(url()->current(), false); ?>" class="social-share text-muted d-block text-center h6" title="<?php echo e(trans('misc.sms'), false); ?>">
								<i class="fa fa-sms"></i> <span class="btn-block mt-3"><?php echo e(trans('misc.sms'), false); ?></span>
							</a>
						</div>
						<div class="col-md-3 col-6 mb-3">
							<a data-toggle="modal" data-target="#embedModal" href="#" class="social-share text-muted d-block text-center h6" title="<?php echo e(trans('misc.embed'), false); ?>">
							<i class="fa fa-code"></i> <span class="btn-block mt-3"><?php echo e(trans('misc.embed'), false); ?></span>
						</a>
					</div>
					</div>

				</div>


				<div class="form-inline">
			        <input type="text" readonly="readonly" id="url_campaign" class="form-control w-100 bg-white" value="<?php echo e(url()->current(), false); ?>">
								<button class="btn btn-primary no-hover ml-1 btn-absolute" id="btn_campaign_url"><?php echo e(trans('misc.copy_link'), false); ?></button>
			    </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<!-- Modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="embedModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary text-white headerModal">
					<h6 class="modal-title">
						<?php echo e(trans('misc.embed_title'), false); ?>

					</h6>
					<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
			 </div><!-- Modal header -->

			 <div class="modal-body">
						 <div class="form-group">
							 <div class="btn-block text-center" style="position: relative;">
								 <div style="position: absolute; width: 100%; height: 100%;"></div>
								 <div style='max-width:350px; margin: 0 auto;'><script src='<?php echo e(url('c',$response->id), false); ?>/widget.js' type='text/javascript'></script></div>
							 </div>

							 <div class="form-inline mt-1">
							 <input type="text" class="form-control w-100 bg-white" value="<div style='width:350px;'><script src='<?php echo e(url('c',$response->id), false); ?>/widget.js' type='text/javascript'></script></div>" readonly="readonly" id="embedCode">
							  <button class="btn btn-primary no-hover ml-1 btn-absolute" id="btn_copy_code"><?php echo e(trans('misc.copy_code'), false); ?></button>
							 </div>
						 </div><!-- /.form-group-->
			 </div>
		</div>
	</div>
</div><!-- Modal -->



	<?php if( Auth::check() &&  isset($response->user()->id) && Auth::user()->id != $response->user()->id  ): ?>
	<div class="btn-block text-center mt-1">
		<a href="<?php echo e(url('report/campaign', $response->id), false); ?>/<?php echo e($response->user()->id, false); ?>" class="text-small"><i class="far fa-flag"></i> <?php echo e(trans('misc.report'), false); ?></a>
	</div>
	<?php endif; ?>

<?php if(isset($response->user()->id)): ?>
	<?php echo $__env->make('includes.contact_organizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

 		</div><!-- /COL MD 5 -->
	</div><!-- ./ Row -->
 </div><!-- container -->

 <!-- Third Panel
 ======================================== -->
 <div class="container pb-5">
	 <div class="row">
		 <div class="col-md-8">

			 <!-- Tab Content
			 ====================================== -->
			 <ul class="nav nav-tabs nav-fill">
			   <li class="nav-item active"><a href="#desc" aria-controls="home" role="tab" data-toggle="tab" class="nav-link active text-dark py-3"><strong><?php echo e(trans('misc.story'), false); ?></strong></a></li>
				 <li class="nav-item text-muted"><a href="#donations" aria-controls="home" role="tab" data-toggle="tab" class="nav-link text-dark py-3"><strong><?php echo e(trans('misc.donations'), false); ?></strong></a></li>
			 	 <li class="nav-item text-muted"><a href="#updates" aria-controls="home" role="tab" data-toggle="tab" class="nav-link text-dark py-3"><strong><?php echo e(trans('misc.updates'), false); ?></strong></a></li>
				 <li class="nav-item text-muted"><a href="#comments" aria-controls="home" role="tab" data-toggle="tab" class="nav-link text-dark py-3"><strong><?php echo e(trans('misc.comments'), false); ?></strong></a></li>
			 </ul>

			 <div class="tab-content py-3">

			 		<?php if( $response->description != '' ): ?>
			 		<div role="tabpanel" class="tab-pane fade show active description text-break"id="desc">
			 		<?php echo $response->description; ?>

			 		</div>
			 		<?php endif; ?>

			 		<div role="tabpanel" class="tab-pane fade in description text-break"id="donations">

			 			<?php if( $response->donations()->count() == 0 ): ?>
							<div class="btn-block text-center py-3 text-muted">
			    			<i class="fa fa-donate display-4"></i>
			    		</div>
			 				<span class="text-center btn-block"><?php echo e(trans('misc.no_donations'), false); ?></span>

			 			<?php else: ?>

							  <ul class="list-unstyled" id="listDonations">

			 				    <?php $__currentLoopData = $donations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			 				    <?php
			 				    $letter = str_slug(mb_substr( $donation->fullname, 0, 1,'UTF8'));

			 					if( $letter == '' ) {
			 						$letter = 'N/A';
			 					}

			 					if( $donation->anonymous == 1 ) {
			 						$letter = 'N/A';
			 						$donation->fullname = trans('misc.anonymous');
			 					}
			 				    ?>

			 				     <?php echo $__env->make('includes.listing-donations', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

			 				       	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										 </ul>

										 <div class="text-center py-2 wrap-paginator">
			 				       	 <?php echo e($donations->links('vendor.pagination.loadmore'), false); ?>

											 </div>
										 <?php endif; ?>

									 </div>

			 		<div role="tabpanel" class="tab-pane fade description" id="updates">

			 		<?php if( $updates->total() == 0 ): ?>
						<div class="btn-block text-center py-3 text-muted">
							<i class="fa fa-history display-4"></i>
						</div>
			 			<span class="text-center btn-block"><?php echo e(trans('misc.no_results_found'), false); ?></span>

			 			<?php else: ?>

							<ul id="listUpdates">
			 			<?php $__currentLoopData = $updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 				<?php echo $__env->make('includes.ajax-updates-campaign', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			 				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>

							<div class="text-center py-2">
								<?php echo e($updates->links('vendor.pagination.loadmore'), false); ?>

							</div>

			 			<?php endif; ?>
			 		</div>

					<div role="tabpanel" class="tab-pane fade description text-break" id="comments">
						<div class="btn-block margin-top-20">
							<div class="fb-comments"  data-width="100%" data-href="<?php echo e(url('campaign',$response->id).'/'.str_slug($response->title), false); ?>" data-numposts="5"></div>
						</div>
					</div>
			 </div><!-- ./End Tab Content -->
		 </div><!-- col 8 -->

		 <!-- Rewards
		======================================= -->
		 <?php if( isset( $deadline ) && $deadline > $timeNow && $response->finalized == 0
		 || !isset( $deadline ) && $response->finalized == 0 ): ?>

		 <?php if($response->rewards->count() != 0): ?>

		 <div class="col-md-4">

			 	<?php $__currentLoopData = $response->rewards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reward): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			 		<?php

			 				$pledge = '?pledge='.$reward->id;

			 				if( str_slug( $response->title ) == '' ) {

			 						$slugUrl  = $pledge;
			 					} else {
			 						$slugUrl  = '/'.str_slug( $response->title ).$pledge;
			 					}

			 				$pledgeClaimed = $response->donations()->where('rewards_id',$reward->id)->count();

			 				if( $pledgeClaimed < $reward->quantity ) {
			 					$url_campaign = url('donate/'.$response->id.$slugUrl);
			 				} else {
			 					$url_campaign = 'javascript:void(0);';
			 				}

			 		 ?>
			 	<!-- Start Panel -->
			 	<a href="<?php if( Auth::check() && Auth::user()->id == $response->user_id ): ?> <?php echo e(url('edit/rewards',$reward->id), false); ?> <?php else: ?> <?php echo e($url_campaign, false); ?> <?php endif; ?>" class="selectReward">

					<span class="cardSelectRewardBox">
			 			<span class="cardSelectReward">
			 				<span class="cardSelectRewardText">
			 					<?php if( Auth::check() && Auth::user()->id == $response->user_id ): ?>
			 				 <i class="fa fa-pencil-alt"></i>	<?php echo e(trans('misc.edit_reward'), false); ?>

			 			 <?php elseif($pledgeClaimed < $reward->quantity): ?>
			 					<?php echo e(trans('misc.select_reward'), false); ?>

			 				<?php else: ?>
			 					<?php echo e(trans('misc.sold'), false); ?>

			 				<?php endif; ?>
			 				</span>
			 			</span>
			 		</span>

					<div class="card mb-2" style="position: initial;">
					  <div class="card-body">

							<h6 class="card-title" style="line-height: inherit;">
			          <i class="fa fa-gift"></i> <?php echo e(trans('misc.reward'), false); ?>

			        </h6>

			        <hr />

					    <h5 class="card-title">
								<small><?php echo e(trans('misc.pledge'), false); ?></small> <strong class="font-default"><?php echo e(App\Helper::amountFormat($reward->amount), false); ?></strong>
						</h5>
					    <h6 class="card-subtitle mb-2 text-muted"><?php echo e($reward->title, false); ?></h6>
					    <p class="card-text"><?php echo e($reward->description, false); ?></p>

							<small class="btn-block margin-bottom-10 <?php if( $pledgeClaimed == $reward->quantity ): ?>text-danger <?php else: ?> text-muted <?php endif; ?>">
			 					<i class="far fa-user"></i> <?php echo e(trans('misc.reward_claimed', ['claim' => $pledgeClaimed, 'total' => $reward->quantity]), false); ?> <?php if( $pledgeClaimed == $reward->quantity ): ?> <span class="label label-danger"><?php echo e(trans('misc.sold'), false); ?></span> <?php endif; ?>
			 				</small>

							<small class="btn-block text-muted">
			 					<i class="far fa-clock"></i> <?php echo e(trans('misc.delivery'), false); ?>:
			 				</small>
			 				<strong><?php echo e(date('F, Y', strtotime($reward->delivery)), false); ?></strong>
					  </div>
					</div>


			 	<div class="panel panel-default d-none">
			  		<div class="panel-body">

			 			<h3 class="btn-block margin-zero" style="line-height: inherit;">
			 				<small><?php echo e(trans('misc.pledge'), false); ?></small>
			 				<strong class="font-default"><?php echo e(App\Helper::amountFormat($reward->amount), false); ?></strong>
			 				</h3>
			 				<h4><?php echo e($reward->title, false); ?></h4>
			 				<p class="wordBreak">
			 					<?php echo e($reward->description, false); ?>

			 				</p>
			 				<small class="btn-block margin-bottom-10 <?php if( $pledgeClaimed == $reward->quantity ): ?>text-danger <?php else: ?> text-muted <?php endif; ?>">
			 					<?php echo e(trans('misc.reward_claimed', ['claim' => $pledgeClaimed, 'total' => $reward->quantity]), false); ?> <?php if( $pledgeClaimed == $reward->quantity ): ?> <span class="label label-danger"><?php echo e(trans('misc.sold'), false); ?></span> <?php endif; ?>
			 				</small>

			 				<small class="btn-block text-muted">
			 					<?php echo e(trans('misc.delivery'), false); ?>:
			 				</small>
			 				<strong><?php echo e(date('F, Y', strtotime($reward->delivery)), false); ?></strong>
			 		</div><!-- panel-body -->
			 	</div><!-- End Panel -->

			 </a>
			 	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		 </div><!-- col 4 -->
	 		<?php endif; ?>
	 <?php endif; ?> 
	 </div><!-- row -->
 </div><!-- container -->

<?php if($data->total() != 0): ?>
 <!-- New Campaigns
 ========================= -->
 <div class="py-5 bg-light">
	 <div class="btn-block text-center mb-5">
		 <h1><?php echo e(trans('misc.related_campaigns'), false); ?></h1>
		 <p>
			 <?php echo e(trans('misc.related_campaigns_subtitle'), false); ?>

		 </p>
	 </div>
	 <div class="container">
		 <div class="row">
			 <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				 <?php echo $__env->make('includes.list-campaigns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		 </div>
	 </div>
 </div>
 <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">

$("#embedCode,#url_campaign").click(function() {
	var $this = $(this);
    $this.select();
		});

textTruncate('#desc', ' <?php echo e(trans("misc.view_more"), false); ?>');

$(document).on('click','#updates .loadPaginator', function(r){
	r.preventDefault();
	 $(this).addClass('disabled').html('<span class="spinner-border"></span>');

			var page = $(this).attr('href').split('page=')[1];
			$.ajax({
				url: '<?php echo e(url("ajax/campaign/updates"), false); ?>?id=<?php echo e($response->id, false); ?>&page=' + page
			}).done(function(data){
				if( data ) {
					$('.loadPaginator').remove();

					$( data ).appendTo( "#listUpdates" );
					jQuery(".timeAgo").timeago();
				} else {
					alert( "<?php echo e(trans('misc.error'), false); ?>" );
				}
				//<**** - Tooltip
			});
	});

$(document).on('click','.loadPaginator', function(e){
			e.preventDefault();
		$(this).addClass('disabled').html('<span class="spinner-border"></span>');

			var page = $(this).attr('href').split('page=')[1];
			$.ajax({
				url: '<?php echo e(url("ajax/donations"), false); ?>?id=<?php echo e($response->id, false); ?>&page=' + page
			}).done(function(data){
				if( data ) {
					$('.loadPaginator, .wrap-paginator').remove();

					$( data ).appendTo( "#listDonations" );
					jQuery(".timeAgo").timeago();
					Holder.run({images:".holderImage"})
				} else {
					bootbox.alert( "<?php echo e(trans('misc.error'), false); ?>" );
				}
				//<**** - Tooltip
			});
		});

		<?php if( Auth::check() ): ?>

$("#deleteCampaign").click(function(e) {
   	e.preventDefault();

   	var element = $(this);
	var url     = element.attr('data-url');

	element.blur();

	swal(
		{   title: "<?php echo e(trans('misc.delete_confirm'), false); ?>",
		 text: "<?php echo e(trans('misc.confirm_delete_campaign'), false); ?>",
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
		    	 	window.location.href = url;
		    	 	}
		    	 });

		 });

		 <?php if(session('noty_error')): ?>
    		swal({
    			title: "<?php echo e(trans('misc.error_oops'), false); ?>",
    			text: "<?php echo e(trans('misc.already_sent_report'), false); ?>",
    			type: "error",
    			confirmButtonText: "<?php echo e(trans('users.ok'), false); ?>"
    			});
   		 <?php endif; ?>

   		 <?php if(session('noty_success')): ?>
    		swal({
    			title: "<?php echo e(trans('misc.thanks'), false); ?>",
    			text: "<?php echo e(trans('misc.send_success'), false); ?>",
    			type: "success",
    			confirmButtonText: "<?php echo e(trans('users.ok'), false); ?>"
    			});
   		 <?php endif; ?>

		<?php endif; ?>

		// Copy Code Embed
		$(document).on('click','#btn_copy_code', function(){
						copyToClipboard('#embedCode',this);
				});
				// Copy Link Campaign
				$('#btn_campaign_url').click(function(){
                copyToClipboard('#url_campaign',this);
            });



				function copyToClipboard(element,btn) {
            var $temp = $('<input>');
            $("body").append($temp);
            $temp.val($(element).val()).select();
						$(element).select().focus();
            document.execCommand("copy");
						$(btn).html('<i class="fa fa-check"></i> <?php echo e(trans('misc.copied'), false); ?>').removeClass('btn-primary').addClass('btn-success');
						//$('.popout').addClass('popout bg-success').html("Campaign URL has been copied.").fadeIn(500).delay(5000).fadeOut();
            $temp.remove();
		        }

		$('.selectReward').hover(

	   function () {
	      $(this).find('.cardSelectRewardBox').fadeIn();
	   },

	   function () {
	      $(this).find('.cardSelectRewardBox').fadeOut();
	   }
	);

</script>

<?php $__env->stopSection(); ?>
<?php session()->forget('donation_cancel') ?>
<?php session()->forget('donation_success') ?>
<?php session()->forget('donation_pending') ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/campaigns/view.blade.php ENDPATH**/ ?>