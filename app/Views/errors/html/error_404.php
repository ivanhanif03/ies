<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>404 Page Not Found</title>
    <link rel="icon" href="<?= base_url('img/ies_icon.png') ?>">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url('stisla/modules/bootstrap/bootstrap.min.css') ?>">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url('stisla/css/style.css') ?>">
    <link rel="stylesheet" href="<?= base_url('stisla/css/components.css') ?>">

    <style>
        body {
            width: 99%;
            height: 100%;
            background-color: #fff;
            color: #052b69;
        }

        div {
            position: absolute;
            width: 400px;
            height: 300px;
            z-index: 15;
            top: 30%;
            left: 50%;
            margin: -100px 0 0 -200px;
            text-align: center;
        }

        h1,
        h2 {
            text-align: center;
        }

        h1 {
            font-size: 60px;
            margin-bottom: 10px;
            border-bottom: 1px solid white;
            padding-bottom: 10px;
        }

        h2,
        p {
            margin-bottom: 20px;
        }

        a {
            margin-top: 10px;
            text-decoration: none;
            padding: 10px 25px;
            background-color: #052b69;
            color: white;
            margin-top: 20px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div>
        <h1>
            <img src="<?= base_url('img/error_404.png') ?>" width="400px">
        </h1>
        <h2>Page not found</h2>
        <p>
            <?php if (ENVIRONMENT !== 'production') : ?>
                <?= nl2br(esc($message)) ?>
            <?php else : ?>
                Sorry! Cannot seem to find the page you were looking for.
            <?php endif ?>
        </p>
        <a href='<?= base_url() ?>'>Back to Site</a>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url('stisla/modules/bootstrap/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('stisla/js/stisla.js') ?>"></script>

    <!-- Template JS File -->
    <script src="<?= base_url('stisla/js/scripts.js') ?>"></script>
    <script src="<?= base_url('stisla/js/custom.js') ?>"></script>
</body>

</html>