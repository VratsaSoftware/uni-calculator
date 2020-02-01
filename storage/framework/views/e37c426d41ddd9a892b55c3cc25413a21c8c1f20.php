<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Scripts -->

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
	<script src="<?php echo e(asset('js/skel.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/skel-layers.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/init.js')); ?>"></script>
	<noscript>
		
	<!-- Styles -->
		<link href="<?php echo e(asset('css/skel.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('css/style-xlarge.css')); ?>" rel="stylesheet">
	</noscript>
	
	<!-- Meta -->

	<meta charset="UTF-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<!-- Title -->

	<title><?php echo $__env->yieldContent('title'); ?></title>

</head>
<body>

	

	<?php echo $__env->make('inc.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	
	

	<?php echo $__env->yieldContent('content'); ?>
	
	

	<?php echo $__env->make('inc.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\Mentorship\Mentorship\resources\views/layouts/app.blade.php ENDPATH**/ ?>