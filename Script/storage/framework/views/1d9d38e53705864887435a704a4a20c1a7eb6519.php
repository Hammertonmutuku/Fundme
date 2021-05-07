<?php if($paginator->hasMorePages()): ?>
  <a href="<?php echo e($paginator->nextPageUrl(), false); ?>" class="btn btn-primary p-2 px-5 btn-lg rounded loadPaginator" id="paginator">
    <?php echo e(trans('misc.loadmore'), false); ?> <small class="pl-1"><i class="far fa-arrow-alt-circle-down"></i></small>
  </a>
<?php endif; ?>
<?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/vendor/pagination/loadmore.blade.php ENDPATH**/ ?>