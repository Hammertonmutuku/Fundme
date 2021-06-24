 <?php $__env->startSection('title'); ?> <?php echo e($title, false); ?> <?php $__env->stopSection(); ?>

 <?php $__env->startSection('content'); ?>
 <div class="py-5 bg-primary bg-sections">
   <div class="btn-block text-center text-white position-relative">
     <h1><?php echo e($response->title, false); ?></h1>
     <p><?php echo e($settings->title, false); ?></p>
   </div>
 </div><!-- container -->

 <div class="py-5 bg-white">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <dl>
           <dd>
         		<?php echo $response->content; ?>

          </dd>
         </dl>
       </div>
      </div>
   </div>

  </div><!-- container wrap-ui -->
 <?php $__env->stopSection(); ?>

<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/pages/home.blade.php ENDPATH**/ ?>