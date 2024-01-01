<?= $this->extend(config('auth.views.layout')) ?>

<?= $this->section('title', lang('Auth.register')) ?>
<?= $this->section('heading', __('Inscrivez-vous pour commencer')) ?>

<?= $this->section('content') ?>

<form role="form" action="<?= url_to('register') ?>" method="post">
	<div class="mb-3 form-group">
		<label class="mb-1"><strong><?= lang('Auth.username') ?></strong></label>
		<input name="text" type="username" value="<?= old('username') ?>" class="form-control" placeholder="<?= lang('Auth.username') ?>" />
	</div>
	<div class="mb-3 form-group">
		<label class="mb-1"><strong><?= lang('Auth.email') ?></strong></label>
		<input name="email" type="email" value="<?= old('email') ?>" class="form-control" placeholder="<?= lang('Auth.email') ?>" />
	</div>
	<div class="mb-3 form-group">
		<label class="mb-1"><strong><?= lang('Auth.password') ?></strong></label>
		<input name="password" type="password" class="form-control" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" value="" />
	</div>
	<div class="mb-3 form-group">
		<label class="mb-1"><strong><?= lang('Auth.passwordConfirm') ?></strong></label>
		<input name="password_confirmation" type="password" class="form-control" placeholder="<?= lang('Auth.passwordConfirm') ?>" autocomplete="off" value="" />
	</div>
	
	<div class="text-center">
		<button type="submit" class="btn btn-lg btn-primary btn-block mt-4 mb-0"><?= lang('Auth.register') ?></button>
	</div>
</form>

<?= $this->stop() ?>

<?= $this->start('form-footer') ?>

<p class="text-sm mx-auto">
	<?= lang('Auth.haveAccount') ?>
	<a href="<?= url_to('login') ?>" class="text-primary text-gradient font-weight-bold"><?= lang('Auth.login') ?></a>
</p>

<?= $this->endSection() ?>
