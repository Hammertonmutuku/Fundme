<?php $__env->startSection('title'); ?><?php echo e(trans('misc.likes').' - ', false); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="jumbotron mb-0 bg-sections text-center">
      <div class="container position-relative">
        <span class="display-4"><i class="fa fa-heart"></i></span>
        <h1><?php echo e(trans('misc.likes'), false); ?></h1>
        <p class="mb-0">
          <?php echo e(trans('misc.likes_users_desc'), false); ?>

        </p>
        </div>
    </div>

<div class="container py-5">
<!-- Col MD -->
<div class="col-md-12 margin-top-20 margin-bottom-20">

	<?php if($data->total() !== 0): ?>

			<div class="row" id="campaigns">
		   <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		    	<?php echo $__env->make('includes.list-campaigns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		    	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		 <?php if($data->lastPage() > 1): ?>
		    <div class="col-md-12">
		    	<hr />
   		  		 <?php echo e($data->links(), false); ?>

		    </div>
		    <?php endif; ?>


		    	 </div><!-- /row -->
	  <?php else: ?>
    <div class="btn-block text-center">
	    			<i class="far fa-times-circle display-4"></i>
	    		</div>

	    		<h3 class="text-center my-3">
	    		<?php echo e(trans('misc.no_results_found'), false); ?>

	    	</h3>
	  <?php endif; ?>

     </div><!-- /COL MD -->
 </div><!-- container wrap-ui -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/users/likes.blade.php ENDPATH**/ ?>