<div class="container-fluid">
    <div class="search-container">
        <div class="input-group rounded">
            <input type="search" class="form-control rounded" placeholder="Поиск" aria-label="Search" aria-describedby="search-addon" />
            <span class="input-group-text border-0" id="search-addon">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>
    <?php if($users): ?>
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
    <?php foreach($users as $user): ?>
    <a href="user/?id=<?=$user['id'];?>">
    <div class="row table-row">
        <div class="col-md-3"><?= $user['name'];?></div>
        <div class="col-md-3"><?= $user['lastname'];?></div>
        <div class="col-md-3"><?= $user['groupnumber'];?></div>
        <div class="col-md-3"><?= $user['points'];?></div>
    </div>
    </a>
    <?php endforeach;?>
    <div class="text-center">
        <?php if($pagination->countPages > 1): ?>
            <?=$pagination;?>
        <?php endif;?>
    </div>
</div>
<?php endif;?>
