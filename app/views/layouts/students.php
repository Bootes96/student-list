<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <header class="header">
        <div class="row">
            <div class="col-md-6">
                <div class="logo">
                    <a href="<?=PATH;?>"><img src="img/student-list.png" alt="logo"></a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-info">
                    <?php if(!empty($_SESSION['user'])): ?>
                        <a href="/profile">Профиль</a>
                    <?php else: ?>
                        <a href="user/signup">Регистрация</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <?= $content; ?>
    </div>
    <footer class="footer">
        <div class="logo">
            <a href="<?=PATH;?>"><img src="img/student-list.png" alt="logo"></a>
        </div>
        <script src="js/main.js"></script>
    </footer>
</body>

</html>