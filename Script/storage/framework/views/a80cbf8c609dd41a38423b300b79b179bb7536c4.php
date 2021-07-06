<!-- FOOTER -->
<div class="py-5 bg-success text-light">
<footer class="container">
  <div class="row">
    <div class="col-md-3">
      <h5><?php echo e(trans('misc.about'), false); ?></h5>
      <ul class="list-unstyled">
        <?php $__currentLoopData = App\Models\Pages::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a class="link-footer" href="<?php echo e(url('/page',$page->slug), false); ?>"><?php echo e($page->title, false); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <li><a class="link-footer" href="<?php echo e(url('blog'), false); ?>"><?php echo e(trans('misc.blog'), false); ?></a></li><li>
      </ul>
    </div>

    <?php if(App\Models\Categories::count() != 0): ?>
    <div class="col-md-3">
      <h5><?php echo e(trans('misc.categories'), false); ?></h5>
      <ul class="list-unstyled">
        <?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->take(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a class="link-footer" href="<?php echo e(url('category', $category->slug), false); ?>"><?php echo e($category->name, false); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(App\Models\Categories::count() > 5): ?>
        <li><a class="link-footer" href="<?php echo e(url('categories'), false); ?>"><?php echo e(trans('misc.view_all'), false); ?> <i class="fa fa-long-arrow-alt-right"></i></a></li>
      <?php endif; ?>
      </ul>
    </div>
  <?php endif; ?>

    <div class="col-md-3">
      <h5><?php echo e(trans('misc.links'), false); ?></h5>
      <ul class="list-unstyled">
        <li><a class="link-footer" href="<?php echo e(url('campaigns/latest'), false); ?>"><?php echo e(trans('misc.explore'), false); ?></a></li><li>
          <?php if(App\Models\Gallery::count() != 0): ?>
          <li><a class="link-footer" href="<?php echo e(url('gallery'), false); ?>"><?php echo e(trans('misc.gallery'), false); ?></a></li><li>
          <?php endif; ?>
        <li><a class="link-footer" href="<?php echo e(url('create/campaign'), false); ?>"><?php echo e(trans('misc.create_campaign'), false); ?></a></li><li>
          <li><a class="link-footer" href="<?php echo e(url('campaigns/featured'), false); ?>"><?php echo e(trans('misc.featured_campaign'), false); ?></a></li><li>
            <?php if(auth()->guard()->guest()): ?>
              <li><a class="link-footer" href="<?php echo e(url('login'), false); ?>"><?php echo e(trans('auth.login'), false); ?></a></li><li>
              <li><a class="link-footer" href="<?php echo e(url('register'), false); ?>"><?php echo e(trans('auth.sign_up'), false); ?></a></li><li>
              <?php else: ?>
                <li><a class="link-footer" href="<?php echo e(url('account'), false); ?>"><?php echo e(trans('users.account_settings'), false); ?></a></li><li>
                <li><a class="link-footer" href="<?php echo e(url('logout'), false); ?>"><?php echo e(trans('users.logout'), false); ?></a></li><li>
            <?php endif; ?>

      </ul>
    </div>

    <div class="col-md-3" style="margin-top: -38px;">
      <a href="<?php echo e(url('/'), false); ?>">
        <img src="<?php echo e(asset('public/img/Msaada2.png'), false); ?>" style="max-width: 180px; ">
      </a>
      <p class="text-muted" style="
      margin-top: -32px;"><?php echo e($settings->description, false); ?></p>
    </div>
  </div>
</footer>
</div>

<footer class="py-2 bg-success text-muted">
  <div class="container">
    <div class="row">
      <div class="col-md-6 copyright">
        &copy; <?php echo date('Y'); ?> <?php echo e($settings->title, false); ?>

      </div>
      <div class="col-md-6 text-right social-links">
        <span class="mr-2"><?php echo e(trans('misc.follow_us'), false); ?></span>
        <ul class="list-inline float-right list-social">

          <?php if( $settings->twitter != '' ): ?>
            <li class="list-inline-item"><a href="<?php echo e($settings->twitter, false); ?>" class="ico-social"><i class="fab fa-twitter"></i></a></li>
          <?php endif; ?>

        <?php if( $settings->facebook != '' ): ?>
          <li class="list-inline-item"><a href="<?php echo e($settings->facebook, false); ?>" class="ico-social"><i class="fab fa-facebook"></i></a></li>
        <?php endif; ?>

        <?php if( $settings->instagram != '' ): ?>
          <li class="list-inline-item"><a href="<?php echo e($settings->instagram, false); ?>" class="ico-social"><i class="fab fa-instagram"></i></a></li>
        <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</footer>
<?php /**PATH /opt/lampp/htdocs/Practice/Fundme/Script/resources/views/includes/footer.blade.php ENDPATH**/ ?>