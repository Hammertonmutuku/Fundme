<div class="btn-block text-center showBanner py-2" style="display:none;">
  <i class="fa fa-cookie-bite"></i> <?php echo e(trans('misc.cookies_text'), false); ?>

  <?php if($settings->link_privacy != ''): ?>
    <a href="<?php echo e($settings->link_privacy, false); ?>" class="mr-2" target="_blank"><strong><?php echo e(trans('misc.learn_more'), false); ?></strong></a>
  <?php endif; ?>
  <button class="btn btn-sm btn-primary" id="close-banner"><?php echo e(trans('misc.got_it'), false); ?></button>
</div>

<?php if(auth()->check() && auth()->user()->status != 'active' ): ?>
<div class="btn-block mt-0 py-2 position-fixed text-center bg-danger" style="bottom:0; z-index:99"><?php echo e(trans('misc.confirm_email'), false); ?> <em><?php echo e(auth()->user()->email, false); ?></em></div>
<?php endif; ?>

<div id="search">
<button type="button" class="close">×</button>
<form autocomplete="off" action="<?php echo e(url('search'), false); ?>" method="get">
    <input type="text" value="" name="q" id="btnItems" placeholder="<?php echo e(trans('misc.search_query'), false); ?>" />
    <button type="submit" class="btn btn-lg no-shadow btn-trans custom-rounded d-none btn_search"  id="btnSearch"><?php echo e(trans('misc.search'), false); ?></button>
</form>
</div>

<header>
  <nav class="navbar navbar-expand-md navbar-inverse fixed-top py-3 <?php if(request()->path() == '/'): ?> scroll <?php else: ?> shadow-sm bg-success <?php endif; ?>">
    <div class="container d-flex font-weight-bold">
      <a class="navbar-brand" href="<?php echo e(url('/'), false); ?>">
        <img src="<?php echo e(asset('public/img/rsz_1rsz_msaada2.png'), false); ?>" style="max-width: 150px; "class="align-baseline" alt="<?php echo e($settings->title, false); ?>" />
      </a>
      <ul class="navbar-nav ml-auto d-lg-none">
        <li class="nav-item">
          <a class="nav-link search" href="#search"><i class="fa fa-search"></i></a>
        </li>
      </ul>

      <button class="navbar-toggler text-white" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">

      <div class="d-lg-none text-right">
        <a href="javascript:;" class="close-menu" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"><i class="fa fa-times"></i></a>
      </div>

        <ul class="navbar-nav mr-auto">

        <?php $__currentLoopData = \App\Models\Pages::where('show_navbar', '1')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $_page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="nav-item <?php if(Request::path() == "page/$_page->slug"): ?>active <?php endif; ?>">
            <a class="nav-link" href="<?php echo e(url('page',$_page->slug), false); ?>"><?php echo e($_page->title, false); ?></a>
          </li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e(trans('misc.explore'), false); ?>

            </a>
            <div class="dropdown-menu dd-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item <?php if(Request::path() == "campaigns/latest"): ?>active <?php endif; ?>" href="<?php echo e(url('campaigns/latest'), false); ?>"><?php echo e(trans('misc.latest'), false); ?></a>
              <a class="dropdown-item <?php if(Request::path() == "campaigns/featured"): ?>active <?php endif; ?>" href="<?php echo e(url('campaigns/featured'), false); ?>"><?php echo e(trans('misc.featured'), false); ?></a>
              <a class="dropdown-item <?php if(Request::path() == "campaigns/popular"): ?>active <?php endif; ?>" href="<?php echo e(url('campaigns/popular'), false); ?>"><?php echo e(trans('misc.popular'), false); ?></a>
                <?php if(App\Models\Gallery::count() != 0): ?>
                <a class="dropdown-item <?php if(Request::path() == "gallery"): ?>active <?php endif; ?>" href="<?php echo e(url('gallery'), false); ?>"><?php echo e(trans('misc.gallery'), false); ?></a>
                <?php endif; ?>
            </div>
          </li>
          <?php if(App\Models\Categories::count() != 0): ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php echo e(trans('misc.categories'), false); ?>

            </a>
            <div class="dropdown-menu dd-menu" aria-labelledby="dropdown01">
              <?php $__currentLoopData = App\Models\Categories::where('mode','on')->orderBy('name')->take(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <a class="dropdown-item <?php if(Request::path() == "category/$category->slug"): ?>active <?php endif; ?>" href="<?php echo e(url('category', $category->slug), false); ?>"><?php echo e($category->name, false); ?></a>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              <?php if(App\Models\Categories::count() > 6): ?>
                <a class="dropdown-item" href="<?php echo e(url('categories'), false); ?>"><?php echo e(trans('misc.view_all'), false); ?> <i class="fa fa-long-arrow-alt-right"></i></a>
              <?php endif; ?>
            </div>
          </li>
          <?php endif; ?>
          <li class="nav-item d-none d-lg-block">
            <a class="nav-link search" href="#search"><i class="fa fa-search"></i></a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">

          <?php if(auth()->guard()->check()): ?>
            <li class="nav-item mr-1 dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
              
                <img src="<?php echo e(asset('public/avatar'), false); ?>/<?php echo e(auth()->user()->avatar == '' ? 'default.jpg': auth()->user()->avatar, false); ?>"  class="rounded-circle avatarUser" width="25" height="25" />
                
                <?php $name = explode(' ', Auth::user()->name); ?>
                <span class="d-lg-none"><?php echo e(trans('users.my_profile'), false); ?></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right dd-menu-user" aria-labelledby="dropdown03">

                <?php if(auth()->user()->role == 'admin'): ?>
                <a class="dropdown-item" href="<?php echo e(url('panel/admin'), false); ?>"><?php echo e(trans('admin.admin'), false); ?></a>
                <div class="dropdown-divider"></div>
              <?php endif; ?>

              <a href="<?php echo e(url('dashboard'), false); ?>" class="dropdown-item">
                <?php echo e(trans('admin.dashboard'), false); ?>

                </a>

              <a href="<?php echo e(url('dashboard/campaigns'), false); ?>" class="dropdown-item">
              <?php echo e(trans('misc.campaigns'), false); ?>

                </a>

              <a href="<?php echo e(url('user/likes'), false); ?>" class="dropdown-item">
                <?php echo e(trans('misc.likes'), false); ?>

                </a>

              <a href="<?php echo e(url('account'), false); ?>" class="dropdown-item">
                <?php echo e(trans('users.account_settings'), false); ?>

                </a>
                <div class="dropdown-divider"></div>

              <a href="<?php echo e(url('logout'), false); ?>" class="logout dropdown-item">
                <?php echo e(trans('users.logout'), false); ?>

              </a>

              </div>
            </li>
          <?php else: ?>

          <li class="nav-item mr-1">
            <a class="nav-link" href="<?php echo e(url('login'), false); ?>"><?php echo e(trans('auth.login'), false); ?></a>
          </li>
          <?php endif; ?>

          <li class="nav-item">
            <a class="nav-link btn btn-primary pr-3 pl-3 btn-create no-hover" href="<?php echo e(url('create/campaign'), false); ?>"><?php echo e(trans('misc.create_campaign'), false); ?></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>
<?php /**PATH /opt/lampp/htdocs/Practice/Fundme/Script/resources/views/includes/navbar.blade.php ENDPATH**/ ?>