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
                Баллы ЕГЭ
                <div class="dropdown">
                    <i class="fa-solid fa-arrow-down-wide-short dropbtn" style="color: #1560BD;" onclick="dropdown()"></i>
                    <div id="dropdown" class="dropdown-content">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sort" id="desc" value="DESC" checked>
                            <label class="form-check-label" for="desc">
                                По убыванию баллов</a>
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sort" id="asc" value="ASC" <?php if (isset($_SESSION['sort']) && $_SESSION['sort'] === "ASC") {
                                                                                                                echo htmlspecialchars(' checked', ENT_QUOTES);
                                                                                                            } ?>>
                            <label class="form-check-label" for="asc">
                                По возрастанию баллов
                            </label>
                        </div>
                    </div>
                </div>
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