<?= $this->extend(config('auth.views.layout')) ?>

<?= $this->section('title', lang('Auth.login')) ?>
<?= $this->section('heading', __('Veuillez vous connecter pour continuer')) ?>

<?= $this->section('content') ?>

<form role="form" action="<?= url_to('login') ?>" method="post">
	<div class="mb-3 form-group">
		<label class="mb-1"><strong><?= lang('Auth.email') ?></strong></label>
		<input name="email" type="email" value="<?= old('email') ?>" class="form-control" placeholder="<?= lang('Auth.email') ?>" autocomplete="off" />
	</div>
	<div class="mb-3 form-group">
		<label class="mb-1"><strong><?= lang('Auth.password') ?></strong></label>
		<input name="password" type="password" class="form-control" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" value="" />
	</div>

	<div class="form-row d-flex justify-content-between mt-4 mb-2">
		<div class="form-group">
			<?php if (config('auth.session.allow_remembering')): ?>
			<div class="form-check custom-checkbox ms-1">
				<input class="form-check-input" type="checkbox" name="remember" id="remember">
				<label class="form-check-label" for="remember"><?= lang('Auth.rememberMe') ?></label>
			</div>
			<?php endif; ?>
		</div>
		<div class="form-group">
			<?php if (config('auth.allow_magic_link_logins')) : ?>
            <div class="forgot-password small"><a href="<?= url_to('magic-link') ?>"><?= lang('Auth.forgotPassword') ?></a></div>
            <?php endif ?>
		</div>
	</div>
	
	<div class="text-center">
		<button type="submit" class="btn btn-lg btn-primary btn-block mt-4 mb-0"><?= lang('Auth.login') ?></button>
	</div>
</form>

<?= $this->stop() ?>

<?= $this->start('form-footer') ?>

<p class="text-sm mx-auto">
	<?php if (config('auth.allow_registration')) : ?>
		<?= lang('Auth.needAccount') ?>
		<a href="<?= url_to('register') ?>" class="text-primary text-gradient font-weight-bold"><?= lang('Auth.register') ?></a>
	<?php endif ?>
</p>

<?= $this->endSection() ?>
