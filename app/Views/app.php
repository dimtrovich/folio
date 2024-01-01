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
</body>
</html>
