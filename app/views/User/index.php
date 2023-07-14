<div class="container-fluid">
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <?php if (isset($userInfo)) : ?>
        <div class="col-md-4 user-info">
            <h3><?= htmlspecialchars($userInfo['lastname'], ENT_QUOTES); ?> <?= htmlspecialchars($userInfo['name'], ENT_QUOTES); ?></h3>
            <p>Пол: <?= htmlspecialchars($userInfo['gender'], ENT_QUOTES); ?></p>
            <p>Год рождения: <?= htmlspecialchars($userInfo['birthyear'], ENT_QUOTES); ?></p>
            <p>Email: <?= htmlspecialchars($userInfo['email'], ENT_QUOTES); ?></p>
            <p>Местоположение: <?= htmlspecialchars($userInfo['lastname'], ENT_QUOTES) ?></p>
            <p>Группа: <?= htmlspecialchars($userInfo['groupnumber'], ENT_QUOTES); ?></p>
            <p>Количество баллов ЕГЭ: <?= htmlspecialchars($userInfo['points'], ENT_QUOTES); ?></p>
        </div>
        <?php if ($userInfo['hash'] === $_COOKIE['hash']) : ?>
            <a href="user/edit" type="button" class="btn btn-primary">Редактировать профиль</a>
        <?php endif; ?>
    <?php endif; ?>
</div>