<?php $__env->startSection('title'); ?><?php echo e($category->name.' - ', false); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="py-5 bg-primary bg-sections" style="background-image: url('<?php echo e(asset('public/img-category'), false); ?>/<?php echo e($category->image == '' ? 'default.jpg' : $category->image, false); ?>')">
  <div class="btn-block text-center text-white position-relative">
    <h1><?php echo e($category->name, false); ?></h1>
    <?php if( $data->total() != 0 ): ?>
     	<p>(<?php echo e(number_format($data->total()), false); ?>) <?php echo e(trans_choice('misc.campaign_available_category',$data->total() ), false); ?></p>
     <?php else: ?>
     	<p><?php echo e($settings->title, false); ?></p>
     <?php endif; ?>
  </div>
</div><!-- container -->

<div class="py-5 bg-white">
	<?php if( $data->total() != 0 ): ?>

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

pagination('<?php echo e(url("ajax/category"), false); ?>?slug=<?php echo e($category->slug, false); ?>&page=', '<?php echo e(trans('misc.error'), false); ?>');

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/default/category.blade.php ENDPATH**/ ?>