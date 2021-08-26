<?php if(count($errors) > 0): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert" id="dangerAlert">
    <ul class="list-unstyled mb-0">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><i class="far fa-times-circle"></i> <?php echo e($error, false); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/Fundme/resources/views/errors/errors-forms.blade.php ENDPATH**/ ?>