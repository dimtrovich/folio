<!DOCTYPE html>
<html lang="<?= config('app.language') ?>">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, maximum-scale=1" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Author" content="Dimitri Sitchet Tomkeu">
	<title><?= $this->show('title', true) ?> - Folio</title>
	<link rel="icon" href="<?= img_url('logo/folio-mini-transparent.png') ?>" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" />
	<link rel="stylesheet" type="text/css" href="<?= lib_css_url('fontawesome/6.4.0/css/all.min') ?>" />
	<link rel="stylesheet" type="text/css" href="<?= css_url('admin.min') ?>" />
</head>

<body>

	<main class="main-content  mt-0">
		<section>
			<div class="page-header min-vh-100">
				<div class="container">
					<div class="row flex-row-reverse">
						<div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
							<div class="card">
								<div class="card-header pb-0 text-start">
									<h4 class="font-weight-bolder text-primary"><?= $this->show('title') ?></h4>
									<h5 class="mb-0 font-weight-lighter"><?= $this->show('heading') ?></h5>
									<h6 class="small font-weight-lighter text-muted"><?= $this->show('description') ?></h6>
								</div>
								<div class="card-body">
									<?php if ($error = $errors->line('default')) : ?>
										<div class="text-white small alert alert-dismissible fade show alert-danger" role="alert">
											<h4 class="alert-heading h4"><?= __('Erreur') ?></h4>
											<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<p class="p-0 m-0"><?= $error ?></p>
										</div>
									<?php elseif ($errors->count()): ?>
										<div class="text-white small alert alert-dismissible fade show alert-danger" role="alert">
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
									<div class="text-white small alert alert-dismissible fade show alert-success" role="alert">
										<button type="button" class="btn-close" data-bs-dismiss="alert"
											aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<p><?= session('message') ?></p>
									</div>
									<?php endif ?>
									<?= $this->renderView() ?>
								</div>
								<div class="card-footer small text-center pt-0 px-lg-2 px-1">
									<?= $this->show('form-footer') ?>
								</div>
							</div>
						</div>
						<div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
							<div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden"
								style="background-image: url('img/signin-ill.jpg'); background-size: cover;">
								<span class="mask bg-gradient-primary opacity-6"></span>
								
								<img src="<?= img_url('logo/folio-transparent.png') ?>" />

								<?= $this->show('aside-left') ?>
								<h4 class="mt-5 text-white font-weight-bolder position-relative">
									Avoir un <b class="text-dark">portfolio</b> peut faire toute la <b class="text-dark">difference</b>
								</h4>
								<p class="text-white position-relative">
									The more effortless the writing looks, the more effort the writer actually put into the process.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<script src="<?= lib_js_url('bootstrap/js/bootstrap-5.2.min.js') ?>"></script>
</body>

</html>
