<?php require_once APP . "/views/partials/head.php";?>
<body>
    <main>
        <header class="header">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <a href="<?=PATH;?>"><img src="img/student-list.png" alt="logo"></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-info">
                        <?php if(isset($_COOKIE['hash'])): ?>
                            <a href="user/?id=<?=$_COOKIE['id'];?>">Профиль</a>
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
    </main>
    <?php require_once APP . "/views/partials/footer.php";?>
</body>

</html>