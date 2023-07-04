<div class="container-fluid">
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($userInfo)) : ?>
        <div class="col-md-4 user-info">
            <h3><?= $userInfo['lastname']; ?> <?= $userInfo['name']; ?></h3>
            <p>Пол: <?= $userInfo['gender']; ?></p>
            <p>Год рождения: <?= $userInfo['birthyear']; ?></p>
            <p>Email: <?= $userInfo['email']; ?></p>
            <p>Местоположение: <?= $userInfo['location']; ?></p>
            <p>Группа: <?= $userInfo['groupnumber']; ?></p>
            <p>Количество баллов ЕГЭ: <?= $userInfo['points']; ?></p>
        </div>
        <?php if ($userInfo['hash'] === $_COOKIE['hash']) : ?>
            <a href="user/edit" type="button" class="btn btn-primary">Редактировать профиль</a>
        <?php endif; ?>
    <?php endif; ?>
</div>