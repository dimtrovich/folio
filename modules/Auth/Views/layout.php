<!DOCTYPE html>
<html lang="<?= config('app.language') ?>">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Author" content="Dimitri Sitchet Tomkeu">
	<title><?= $this->show('title', true) ?> - Folio</title>
	<link rel="stylesheet" href="<?= css_url('style') ?>">
</head>

<body class="vh-100">
	<main class="authincation h-100">
		<div class="container h-100">
			<div class="row justify-content-center h-100 align-items-center">
				<div class="col-md-6">
					<div class="authincation-content">
						<div class="row no-gutters">
							<div class="col-xl-12">
								<div class="auth-form">
									<div class="text-center">
										<a href=""><img src="<?= img_url('logo/folio-transparent.png') ?>" alt=""></a>
										<h4 class="text-center"><?= $this->show('title') ?></h4>
									</div>
									<h5 class="text-center small text-mutted mb-5"><?= $this->show('heading') ?></h5>

									<?php if ($error = $errors->line('default')) : ?>
									<div class="text-white small alert alert-dismissible fade show alert-danger"
										role="alert">
										<h4 class="alert-heading h4"><?= __('Erreur') ?></h4>
										<button type="button" class="btn-close" data-bs-dismiss="alert"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<p class="p-0 m-0"><?= $error ?></p>
									</div>
									<?php elseif ($errors->count()): ?>
									<div class="text-white small alert alert-dismissible fade show alert-danger"
										role="alert">
										<h4 class="alert-heading h4"><?= __('Erreur') ?></h4>
										<button type="button" class="btn-close" data-bs-dismiss="alert"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<p><?php foreach ($errors->all() as $error) : ?>
											<?= $error ?>
											<br>
											<?php endforeach ?></p>
									</div>
									<?php endif ?>
									<?php if (session('message') !== null) : ?>
									<div class="text-white small alert alert-dismissible fade show alert-success"
										role="alert">
										<button type="button" class="btn-close" data-bs-dismiss="alert"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<p><?= session('message') ?></p>
									</div>
									<?php endif ?>

									<?= $this->renderView() ?>
									
									<div class="new-account mt-3">
										<?= $this->show('form-footer') ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="<?= lib_js_url('global/global.min') ?>"></script>
</body>

</html>
