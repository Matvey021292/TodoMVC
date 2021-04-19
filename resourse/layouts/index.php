<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="/dist/css/custom.css" rel="stylesheet">
    <title><?= !empty($title) ? $title : '' ?></title>
</head>
<body>
<div class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
    <div class="container-fluid">
        <a class="navbar-brand">Bejee</a>
        <?php if (empty($login)) { ?>
            <a class="btn btn-outline-primary" href="/login">Войти</a>
        <?php } else { ?>
            <div>
                <a class="p-2 text-dark" href="#"><b><?= $login ?></b></a>
                <a class="btn btn-outline-warning" href="/logout">Выйти</a>
            </div>
        <?php } ?>
    </div>
</div>
<div class="container my-5">
    <?php if (!empty($messages)): ?>
        <?php foreach ($messages as $k => $items): ?>
            <div class="row">
                <div class="col-md-12">
                    <div class=" alert alert-<?= $k ?>" role="alert">
                        <?php foreach ($items as $message): ?>
                            <div><?= $message ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12 ">
            <?php if (!empty($content)): ?>
                <?= $content ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="/dist/js/app.js"></script>
</body>
</html>
