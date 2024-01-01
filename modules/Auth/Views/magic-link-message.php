<?= $this->extend(config('auth.views.layout')) ?>

<?= $this->section('title', lang('Auth.useMagicLink')) ?>
<?= $this->section('heading', lang('Auth.checkYourEmail')) ?>

<?= $this->section('content') ?>

<p><?= lang('Auth.magicLinkDetails', [config('auth.magic_link_lifetime') / 60]) ?></p>

<?= $this->stop() ?>

<?= $this->start('form-footer') ?>

<p class="text-sm mx-auto">
	<a href="<?= url_to('login') ?>" class="text-primary text-gradient font-weight-bold"><?= lang('Auth.backToLogin') ?></a>
</p>

<?= $this->endSection() ?>
