<!DOCTYPE html>
<html lang="<?= config('app.language', 'fr') ?>">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= css_url('style') ?>">
	<?= inertia()->head($page) ?>
</head>
<body>
	<?= inertia()->app($page) ?>
	<script src="<?= lib_js_url('global/global.min') ?>"></script>
<!-- 
	<script src="public/js/custom.min.js" type="text/javascript"></script>
	<script src="public/js/deznav-init.js" type="text/javascript"></script>
	<script src="public/js/demo.js" type="text/javascript"></script>
	<script src="public/js/styleSwitcher.js" type="text/javascript"></script> -->
</body>
</html>