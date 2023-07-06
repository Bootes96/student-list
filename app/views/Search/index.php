<div class="container-fluid">
    <div class="search-container">
        <form action="search" class="input-group rounded" autocomplete="off">
            <input type="text" class="form-control rounded" placeholder="Поиск" aria-label="Search" aria-describedby="search-addon" name="query" />
            <span class="input-group-text border-0" id="search-addon">
                <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
            </span>
        </form>
    </div>
    <?php if (isset($_SESSION['error'])) : ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['error'];
            unset($_SESSION['error']); ?>
        </div>
    <?php endif; ?>
    <?php if ($users) : ?>
        <div class="search-query">
            <h3>Показаны результаты по запросу: <span><?= !empty($query) ? $query : ''; ?></span></h3>
        </div>
        <div class="row table-row">
            <div class="col-md-3 title">Имя</div>
            <div class="col-md-3 title">Фамилия</div>
            <div class="col-md-3 title">Номер группы</div>
            <div class="col-md-3 title">
                <i class="fa-sharp fa-solid fa-arrow-down"></i>
                <i class="fa-sharp fa-solid fa-arrow-up"></i>
                Количество баллов
            </div>
        </div>
        <?php foreach ($users as $user) : ?>
            <div class="row table-row">
                <div class="col-md-3"><a href="user/?id=<?= $user['id']; ?>"><?= $user['name']; ?></a></div>
                <div class="col-md-3"><a href="user/?id=<?= $user['id']; ?>"><?= $user['lastname']; ?></a></div>
                <div class="col-md-3"><?= $user['groupnumber']; ?></div>
                <div class="col-md-3"><?= $user['points']; ?></div>
            </div>
        <?php endforeach; ?>
        <div class="text-center">
            <?php if ($pagination->countPages > 1) : ?>
                <?= $pagination; ?>
            <?php endif; ?>
        </div>
</div>
<?php endif; ?>