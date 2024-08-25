<?php helper('html'); ?>
<!doctype html>
<html lang="<?= service('request')->getLocale() ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <title><?= lang('Halberd.title2FA') ?></title>

    <?= link_tag('css/halberd.css') ?>
</head>

<body>
    <h1><?= lang('Halberd.title2FA') ?></h1>

<?php if (session('error')) : ?>
    <p><?= session('error') ?></p>
<?php endif ?>

    <p><?= lang(isset($qrcode) ? 'Halberd.googleApp' : 'Halberd.confirmCode') ?></p>

<?php if(isset($qrcode)): ?>
    <p><svg version="1.1" viewBox="-4 -4 45 45"><path d="<?= $qrcode ?>" /></svg></p>

    <p><?= lang('Halberd.problems', ['placeholder' => $secret]) ?></p>
<?php endif ?>
    
    <form action="<?= url_to('auth-action-verify') ?>" method="post">
        <?= csrf_field() ?>
        <input type="number" name="token" placeholder="000000" inputmode="numeric" pattern="[0-9]{6}" required />
        <button type="submit"><?= lang('Auth.confirm') ?></button>
    </form>
</body>
</html>
