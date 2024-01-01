<?= $this->extend(config('auth.views.layout')) ?>

<?= $this->section('title', lang('Auth.login')) ?>
<?= $this->section('heading', __('Veuillez vous connecter pour continuer')) ?>

<?= $this->section('content') ?>

<form role="form" action="<?= url_to('login') ?>" method="post">
	<div class="mb-3 input-group">
		<input name="email" type="email" value="<?= old('email') ?>" class="form-control form-control-lg" placeholder="<?= lang('Auth.email') ?>" autocomplete="off" />
		<span class="input-group-text text-body"><i aria-hidden="true" class="fas fa-envelope"></i></span>
	</div>
	<div class="mb-3 input-group">
		<input name="password" type="password" class="form-control form-control-lg" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" value="" />
		<span class="input-group-text text-body"><i aria-hidden="true" class="fas fa-lock"></i></span>
	</div>
	<div class="row">
		<div class="col-6">
			<?php if (config('auth.session.allow_remembering')): ?>
			<div class="form-check form-switc">
				<input class="form-check-input" type="checkbox" name="remember" id="remember">
				<label class="form-check-label" for="remember"><?= lang('Auth.rememberMe') ?></label>
			</div>
			<?php endif; ?>
		</div>
		<div class="col-6">
			<?php if (config('auth.allow_magic_link_logins')) : ?>
            <div class="forgot-password small"><a href="<?= url_to('magic-link') ?>"><?= lang('Auth.forgotPassword') ?></a></div>
            <?php endif ?>
		</div>
	</div>
	
	<div class="text-center">
		<button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"><?= lang('Auth.login') ?></button>
	</div>
</form>

<?= $this->stop() ?>

<?= $this->start('form-footer') ?>

<p class="mb-4 text-sm mx-auto">
	<?php if (config('auth.allow_registration')) : ?>
		<?= lang('Auth.needAccount') ?>
		<a href="<?= url_to('register') ?>" class="text-primary text-gradient font-weight-bold"><?= lang('Auth.register') ?></a>
	<?php endif ?>
</p>

<?= $this->endSection() ?>