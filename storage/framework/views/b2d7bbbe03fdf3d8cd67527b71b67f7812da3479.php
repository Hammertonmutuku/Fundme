<div class="item position-relative">
  <a href="<?php echo e(url('category',$category->slug), false); ?>">
    <img class="img-fluid rounded" src="<?php echo e(asset('public/img-category'), false); ?>/<?php echo e($category->image == '' ? 'default.jpg' : $category->image, false); ?>" alt="<?php echo e($category->name, false); ?>">
    <h5><?php echo e($category->name, false); ?> <small>(<?php echo e($category->campaigns()->count(), false); ?>)</small></h5>
  </a>
</div>
<?php /**PATH /opt/lampp/htdocs/Practice/Fundme/Script/resources/views/includes/categories-listing.blade.php ENDPATH**/ ?>