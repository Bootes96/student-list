<?php if (isset($_SESSION['registered'])) : ?>
    <div class="alert alert-success">
        <?php echo $_SESSION['registered'];
        unset($_SESSION['registered']); ?>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <div class="search-container">
        <form action="search" class="input-group rounded" autocomplete="off">
            <input type="text" class="form-control rounded" placeholder="Поиск" aria-label="Search" aria-describedby="search-addon" name="query" />
            <span class="input-group-text border-0" id="search-addon">
                <button class="btn-search" type="submit"><i class="fa fa-search"></i></button>
            </span>
            <div id="livesearch"></div>
        </form>
    </div>
<?php if ($users) : ?>
        <div class="row table-row titles">
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
                <div class="col-md-3"><a href="user/?id=<?= htmlspecialchars($user['id'], ENT_QUOTES); ?>"><?= htmlspecialchars($user['name'], ENT_QUOTES); ?></a></div>
                <div class="col-md-3"><a href="user/?id=<?= htmlspecialchars($user['id'], ENT_QUOTES); ?>"><?= htmlspecialchars($user['lastname'], ENT_QUOTES); ?></a></div>
                <div class="col-md-3"><?= htmlspecialchars($user['groupnumber'], ENT_QUOTES); ?></div>
                <div class="col-md-3"><?= htmlspecialchars($user['points'], ENT_QUOTES); ?></div>
            </div>
        <?php endforeach; ?>
        <div class="text-center">
            <?php if ($pagination->countPages > 1) : ?>
                <?= $pagination; ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>