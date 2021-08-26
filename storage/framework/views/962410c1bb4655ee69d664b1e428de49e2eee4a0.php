<?php $__env->startSection('title'); ?><?php echo e(e($title), false); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
  <div class="py-5 bg-primary bg-sections">
    <div class="btn-block text-center text-white position-relative">
      <h1><?php echo e(trans('misc.search'), false); ?></h1>
      <p><?php echo e(trans('misc.result_of'), false); ?> "<?php echo e($q, false); ?>" <?php echo e($total, false); ?> <?php echo e(trans_choice('misc.campaigns_plural',$total), false); ?></p>
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

          <div class="btn-block text-center">
          <a class="btn btn-lg btn-main no-hover btn-primary" href="<?php echo e(url('categories'), false); ?>" role="button"><?php echo e(trans('misc.browse_by_category'), false); ?> <small class="pl-1"><i class="fa fa-long-arrow-alt-right"></i></small></a>
        </div>
  	  <?php endif; ?>
   </div><!-- container -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript">

  pagination('<?php echo e(url("ajax/search"), false); ?>?slug=<?php echo e($q, false); ?>&page=', '<?php echo e(trans('misc.error'), false); ?>');

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/resources/views/default/search.blade.php ENDPATH**/ ?>