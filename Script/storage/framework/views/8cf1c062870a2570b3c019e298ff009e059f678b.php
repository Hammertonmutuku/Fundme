<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo e(trans('error.error_404'), false); ?></title>
    <link href="<?php echo e(asset('public/css/core.css'), false); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('public/css/styles.css'), false); ?>" rel="stylesheet">
    <link rel="shortcut icon" href="<?php echo e(asset('public/img/favicon.png'), false); ?>" />
  </head>
  <body>
  		<div class="wrap-center">
  			<div class="container">
  				<div class="row">
  					<div class="col-md-12 error-page text-center parallax-fade-top" style="top: 0px; opacity: 1;">
  						<h1>404</h1>
  						<p class="mt-3 mb-5"><?php echo e(trans('error.error_404_subdescription'), false); ?></p>
  						<a href="javascript:history.back();" class="error-link mt-5"><i class="fa fa-long-arrow-alt-left mr-2"></i> <?php echo e(trans('auth.back'), false); ?></a>
  					</div>
  				</div>
  			</div>
  		</div>
  </body>
</html>
<?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/errors/404.blade.php ENDPATH**/ ?>