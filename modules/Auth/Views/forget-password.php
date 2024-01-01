<?= $this->extend(config('auth.views.layout')) ?>

<?= $this->section('title', lang('Auth.forgotPassword')) ?>
<?= $this->section('heading', lang('Auth.useMagicLink')) ?>
<?= $this->section('description', __('On comprend, il se passe des choses. Entrez simplement votre adresse e-mail ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe')) ?>

<?= $this->section('content') ?>

<form role="form" action="<?= url_to('magic-link') ?>" method="post">
	<div class="mb-3 input-group">
		<input name="email" type="email" value="<?= old('email', auth()->user()?->email) ?>" class="form-control form-control-lg" placeholder="<?= lang('Auth.email') ?>" required autocomplete="email" />
		<span class="input-group-text text-body"><i aria-hidden="true" class="fas fa-envelope"></i></span>
	</div>
	
	<div class="text-center">
		<button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0"><?= lang('Auth.send') ?></button>
	</div>
</form>

<?= $this->stop() ?>

<?= $this->start('form-footer') ?>

<p class="mb-4 text-sm mx-auto">
	<a href="<?= url_to('login') ?>" class="text-primary text-gradient font-weight-bold"><?= lang('Auth.backToLogin') ?></a>
</p>

<?= $this->endSection() ?>