<?php $__env->startSection('title'); ?><?php echo e($title.' - ', false); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="py-5 bg-primary bg-sections">
  <div class="btn-block text-center text-white">

    <?php if(request()->path() == "campaigns/featured"): ?>
      <span class="display-4"><i class="fa fa-award"></i></span>
    <?php endif; ?>

    <?php if(request()->path() == "campaigns/popular"): ?>
      <span class="display-4"><i class="fa fa-heart"></i></span>
    <?php endif; ?>

    <h1><?php echo e($title, false); ?></h1>
    <p>
      <?php echo e($subtitle, false); ?>

    </p>
  </div>
</div><!-- container -->

<div class="py-5 bg-white">

	<?php if($data->total() != 0): ?>

	     <?php echo $__env->make('includes.campaigns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	  <?php else: ?>
	  <div class="btn-block text-center">
	    			<i class="far fa-times-circle display-4"></i>
	    		</div>

	    		<h3 class="text-center my-3">
	    		<?php echo e(trans('misc.no_results_found'), false); ?>

	    	</h3>
	  <?php endif; ?>
 </div><!-- container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script type="text/javascript">

pagination('<?php echo e(url()->current(), false); ?>?page=', '<?php echo e(trans('misc.error'), false); ?>');

		</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/resources/views/index/explore-campaigns.blade.php ENDPATH**/ ?>