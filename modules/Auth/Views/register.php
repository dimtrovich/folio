<?= $this->extend(config('auth.views.layout')) ?>

<?= $this->section('title', lang('Auth.register')) ?>
<?= $this->section('heading', __('Inscrivez-vous pour commencer')) ?>

<?= $this->section('content') ?>

<form role="form" action="<?= url_to('register') ?>" method="post">
	<div class="mb-3 input-group">
		<input name="text" type="username" value="<?= old('username') ?>" class="form-control form-control-lg" placeholder="<?= lang('Auth.username') ?>" />
		<span class="input-group-text text-body"><i aria-hidden="true" class="fas fa-user"></i></span>
	</div>
	<div class="mb-3 input-group">
		<input name="email" type="email" value="<?= old('email') ?>" class="form-control form-control-lg" placeholder="<?= lang('Auth.email') ?>" />
		<span class="input-group-text text-body"><i aria-hidden="true" class="fas fa-envelope"></i></span>
	</div>
	<div class="mb-3 input-group">
		<input name="password" type="password" class="form-control form-control-lg" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" value="" />
		<span class="input-group-text text-body"><i aria-hidden="true" class="fas fa-lock"></i></span>
	</div>
	<div class="mb-3 input-group">
		<input name="password_confirmation" type="password" class="form-control form-control-lg" placeholder="<?= lang('Auth.passwordConfirm') ?>" autocomplete="off" value="" />
		<span class="input-group-text text-body"><i aria-hidden="true" class="fas fa-key"></i></span>
	</div>
	
	<div class="text-center">
		<button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"><?= lang('Auth.register') ?></button>
	</div>
</form>

<?= $this->stop() ?>

<?= $this->start('form-footer') ?>

<p class="mb-4 text-sm mx-auto">
	<?= lang('Auth.haveAccount') ?>
	<a href="<?= url_to('login') ?>" class="text-primary text-gradient font-weight-bold"><?= lang('Auth.login') ?></a>
</p>

<?= $this->endSection() ?>