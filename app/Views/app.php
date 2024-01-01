<!DOCTYPE html>
<html lang="<?= config('app.language', 'fr') ?>">
<head>
	<meta charset="UTF-8">  
	<title inertia>Folio</title>
	<link rel="icon" href="<?= img_url('logo/folio-mini-transparent.png') ?>" type="image/x-icon" />
  	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
  	<link rel="stylesheet" type="text/css" href="<?= lib_css_url('fontawesome/6.4.0/css/all.min') ?>" />
  	<link rel="stylesheet" type="text/css" href="<?= lib_css_url('perfect-scrollbar/perfect-scrollbar') ?>" />
  	<link rel="stylesheet" type="text/css" href="<?= css_url('admin.min') ?>" />
  	<link rel="stylesheet" type="text/css" href="<?= css_url('admin.custom') ?>" />
	<?= inertia()->head($page) ?>
</head>
<body>
	<?= inertia()->app($page) ?>
	<script src="<?= lib_js_url('global/global.min') ?>"></script>
</body>
</html>
