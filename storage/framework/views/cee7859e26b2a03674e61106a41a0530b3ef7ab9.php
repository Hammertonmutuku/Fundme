<div class="container">
	<div class="row" id="campaigns">
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    	<?php echo $__env->make('includes.list-campaigns', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
		</div>

		<div class="btn-block text-center py-3 ">
			<?php echo e($data->links('vendor.pagination.loadmore'), false); ?>

		</div>
<?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/includes/campaigns.blade.php ENDPATH**/ ?>