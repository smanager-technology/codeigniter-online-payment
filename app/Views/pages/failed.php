<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>

    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url('assets/favicon/apple-touch-icon-57x57.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('assets/favicon/apple-touch-icon-114x114.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/favicon/apple-touch-icon-72x72.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/favicon/apple-touch-icon-144x144.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url('assets/favicon/apple-touch-icon-60x60.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url('assets/favicon/apple-touch-icon-120x120.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url('assets/favicon/apple-touch-icon-76x76.png') ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url('assets/favicon/apple-touch-icon-152x152.png') ?>" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon/favicon-196x196.png') ?>" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon/favicon-96x96.png') ?>" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon/favicon-32x32.png') ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon/favicon-16x16.png') ?>" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= base_url('assets/favicon/favicon-128.png') ?>" sizes="128x128" />
    <meta name="application-name" content="&nbsp;"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?= base_url('assets/favicon/mstile-144x144.png') ?>" />
    <meta name="msapplication-square70x70logo" content="<?= base_url('assets/favicon/mstile-70x70.png') ?>" />
    <meta name="msapplication-square150x150logo" content="<?= base_url('assets/favicon/mstile-150x150.png') ?>" />
    <meta name="msapplication-wide310x150logo" content="<?= base_url('assets/favicon/mstile-310x150.png') ?>" />
    <meta name="msapplication-square310x310logo" content="<?= base_url('assets/favicon/mstile-310x310.png') ?>" />

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css'>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="<?= base_url('assets/css/fail.css') ?>" />
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="message-box _success _failed">
                <i class="fa fa-times-circle" aria-hidden="true"></i>
                <h2>Your Demo Payment Failed</h2>
                <br />
                <a href="<?= base_url('') ?>"><button class="button">Home</button></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
