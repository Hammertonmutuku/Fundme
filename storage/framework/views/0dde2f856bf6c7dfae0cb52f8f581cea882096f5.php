<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="_token" content="<?php echo csrf_token(); ?>"/>
    <title><?php echo e(trans('admin.dashboard'), false); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="<?php echo e(asset('public/bootstrap/css/bootstrap.min.css'), false); ?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo e(asset('public/css/font-awesome.min.css'), false); ?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo e(asset('public/fonts/ionicons/css/ionicons.min.css'), false); ?>" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="<?php echo e(asset('public/admin/css/app.css'), false); ?>" rel="stylesheet" type="text/css" />
    <!-- IcoMoon CSS -->
    <link href="<?php echo e(asset('public/css/icomoon.css'), false); ?>" rel="stylesheet">

     <!-- Theme style -->
    <link href="<?php echo e(asset('public/admin/css/AdminLTE.min.css'), false); ?>" rel="stylesheet" type="text/css" />

    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo e(asset('public/admin/css/skins/skin-green.min.css'), false); ?>" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="<?php echo e(URL::asset('public/img/favicon.png'), false); ?>" />

    <link href='//fonts.googleapis.com/css?family=Montserrat:700' rel='stylesheet' type='text/css'>

    <link href="<?php echo e(asset('public/plugins/sweetalert/sweetalert.css'), false); ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?php echo $__env->yieldContent('css'); ?>

    <script type="text/javascript">

    // URL BASE
    var URL_BASE = "<?php echo e(url('/'), false); ?>";

 </script>

  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="skin-green sidebar-mini">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="<?php echo e(url('dashboard'), false); ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b><i class="ion ion-ios-bolt"></i></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b><i class="ion ion-ios-bolt"></i> <?php echo e(trans('admin.dashboard'), false); ?></b></span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

            	<li>
            		<a href="<?php echo e(url('/'), false); ?>"><i class="glyphicon glyphicon-home myicon-right"></i> <?php echo e(trans('misc.go_back_site'), false); ?></a>
            	</li>

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="<?php echo e(asset('public/avatar').'/'.Auth::user()->avatar, false); ?>" class="user-image" alt="User Image" />
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><?php echo e(Auth::user()->name, false); ?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="<?php echo e(asset('public/avatar').'/'.Auth::user()->avatar, false); ?>" class="img-circle" alt="User Image" />
                    <p>
                      <small><?php echo e(Auth::user()->name, false); ?></small>
                    </p>
                  </li>

                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo e(url('account'), false); ?>" class="btn btn-default btn-flat"><?php echo e(trans('users.account_settings'), false); ?></a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo e(url('logout'), false); ?>" class="btn btn-default btn-flat"><?php echo e(trans('users.logout'), false); ?></a>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo e(asset('public/avatar').'/'.Auth::user()->avatar, false); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p class="text-overflow"><?php echo e(Auth::user()->name, false); ?></p>
              <small class="btn-block text-overflow"><a href="javascript:void(0);"><i class="fa fa-circle text-success"></i> <?php echo e(trans('misc.online'), false); ?></a></small>
            </div>
          </div>


          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">

            <li class="header"><?php echo e(trans('admin.main_menu'), false); ?></li>

            <!-- Links -->
            <li <?php if(Request::is('dashboard')): ?> class="active" <?php endif; ?>>
            	<a href="<?php echo e(url('dashboard'), false); ?>"><i class="fa fa-dashboard"></i> <span><?php echo e(trans('admin.dashboard'), false); ?></span></a>
            </li><!-- ./Links -->

             <!-- Links -->
            <li <?php if(Request::is('dashboard/campaigns')): ?> class="active" <?php endif; ?>>
            	<a href="<?php echo e(url('dashboard/campaigns'), false); ?>"><i class="ion ion-speakerphone"></i> <span><?php echo e(trans_choice('misc.campaigns_plural',0), false); ?></span></a>
            </li><!-- ./Links -->

            <!-- Links -->
            <li class="<?php if( Request::is('dashboard/donations') ): ?> active <?php endif; ?>">
            	<a href="<?php echo e(url('dashboard/donations'), false); ?>"><i class="ion ion-cash"></i> <span><?php echo e(trans('misc.donations'), false); ?></span></a>
            </li><!-- ./Links -->

            <!-- Links -->
            <li <?php if(Request::is('dashboard/withdrawals')): ?> class="active" <?php endif; ?>>
            	<a href="<?php echo e(url('dashboard/withdrawals'), false); ?>"><i class="fa fa-university"></i> <span><?php echo e(trans('misc.withdrawals'), false); ?></span></a>
            </li><!-- ./Links -->

          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <?php echo $__env->yieldContent('content'); ?>

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- Default to the left -->
       &copy; <strong><?php echo e($settings->title, false); ?></strong> - <?php echo date('Y'); ?>
      </footer>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

   <!-- jQuery 2.1.4 -->
    <script src="<?php echo e(asset('public/plugins/jQuery/jQuery-2.1.4.min.js'), false); ?>" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?php echo e(asset('public/bootstrap/js/bootstrap.min.js'), false); ?>" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('public/plugins/fastclick/fastclick.min.js'), false); ?>" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('public/admin/js/app.min.js'), false); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('public/plugins/sweetalert/sweetalert.min.js'), false); ?>" type="text/javascript"></script>

    <script src="<?php echo e(asset('public/admin/js/functions.js'), false); ?>" type="text/javascript"></script>

    <?php echo $__env->yieldContent('javascript'); ?>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience. Slimscroll is required when using the
          fixed layout. -->
  </body>
</html>
<?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/users/layout.blade.php ENDPATH**/ ?>