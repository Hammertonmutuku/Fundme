<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="<?php echo e(csrf_token(), false); ?>">
		<meta name="description" content="<?php echo $__env->yieldContent('description_custom'); ?><?php echo e($settings->description, false); ?>">
		<meta name="keywords" content="<?php echo e($settings->keywords, false); ?>" />
		<link rel="shortcut icon" href="<?php echo e(asset('public/img/favicon.ico'), false); ?>" />
		<title><?php $__env->startSection('title'); ?><?php echo $__env->yieldSection(); ?> <?php if(isset($settings->title)): ?><?php echo e($settings->title, false); ?><?php endif; ?></title>

		<?php echo $__env->make('includes.css_general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<?php echo $__env->yieldContent('css'); ?>

<?php if($settings->color_default <> ''): ?>
<style>
::selection{ background-color: <?php echo e($settings->color_default, false); ?>; color: white; }
::moz-selection{ background-color: <?php echo e($settings->color_default, false); ?>; color: white; }
::webkit-selection{ background-color: <?php echo e($settings->color_default, false); ?>; color: white; }

body a,
a:hover,
a:focus,
a.page-link,
.btn-outline-primary {
    color: <?php echo e($settings->color_default, false); ?>;
}
.btn-primary:not(:disabled):not(.disabled).active,
.btn-primary:not(:disabled):not(.disabled):active,
.show>.btn-primary.dropdown-toggle,
.btn-primary:hover,
.btn-primary:focus,
.btn-primary:active,
.btn-primary,
.btn-primary.disabled,
.btn-primary:disabled,
.custom-checkbox .custom-control-input:checked ~ .custom-control-label::before,
.page-item.active .page-link,
.page-link:hover {
    background-color: <?php echo e($settings->color_default, false); ?>;
    border-color: <?php echo e($settings->color_default, false); ?>;
}
.bg-primary,
.dropdown-item:focus,
.dropdown-item:hover,
.dropdown-item.active,
.dropdown-item:active,
.owl-theme .owl-dots .owl-dot.active span,
.owl-theme .owl-dots .owl-dot:hover span,
#updates li:hover:before {
    background-color: <?php echo e($settings->color_default, false); ?>!important;
}
.owl-theme .owl-dots .owl-dot.active span::before,
.owl-theme .owl-dots .owl-dot:hover span::before,
.form-control:focus,
.custom-checkbox .custom-control-input:indeterminate ~ .custom-control-label::before,
.custom-control-input:focus:not(:checked) ~ .custom-control-label::before,
.custom-select:focus,
.btn-outline-primary {
	border-color: <?php echo e($settings->color_default, false); ?>;
}
.custom-control-input:not(:disabled):active~.custom-control-label::before,
.custom-control-input:checked~.custom-control-label::before,
.btn-outline-primary:hover,
.btn-outline-primary:focus,
.btn-outline-primary:not(:disabled):not(.disabled):active {
    color: #fff;
    background-color: <?php echo e($settings->color_default, false); ?>;
    border-color: <?php echo e($settings->color_default, false); ?>;
}
</style>
<?php endif; ?>
	<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/<?php echo e(config('fb_app.lang'), false); ?>/sdk.js#xfbml=1&version=v2.8&appId=<?php echo e(config('fb_app.id'), false); ?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div class="popout font-default"></div>
		<?php echo $__env->make('includes.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main role="main" <?php if(request()->path() != '/'): ?>style="padding-top: 78px;"<?php endif; ?>>
		<?php echo $__env->yieldContent('content'); ?>

			<?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</main>

		<?php echo $__env->make('includes.javascript_general', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

	<?php echo $__env->yieldContent('javascript'); ?>

<script type="text/javascript">
	Cookies.set('cookieBanner');

		$(document).ready(function() {
    if (Cookies('cookieBanner'));
    else {
    	$('.showBanner').fadeIn();
        $("#close-banner").click(function() {
            $(".showBanner").slideUp(50);
            Cookies('cookieBanner', true);
        });
    }
});
</script>
<div id="bodyContainer"></div>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/Fundme/Script/resources/views/app.blade.php ENDPATH**/ ?>