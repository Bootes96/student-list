<div class="register-main">
    <div class="container-fluid">
        <?php // session_destroy();?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['success'];
                unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>
        <h3>Регистрация</h3>
        <form method="post" action="user/signup" id="signup">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group sign-up-item">
                        <label for="name">Имя</label>
                        <input type="text" name="name" class="form-control" id="name">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="lastname">Фамилия</label>
                        <input type="text" name="lastname" class="form-control" id="lastname">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="birthYear">Год рождения</label>
                        <select class="form-select" name="birthYear" id="birthYear"></select>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="gender">Пол</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="male" checked>
                            <label class="form-check-label" for="gender">
                                Мужской
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="female">
                            <label class="form-check-label" for="gender">
                                Женский
                            </label>
                        </div>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="groupNumber">Номер группы</label>
                        <input type="text" name="groupNumber" class="form-control" id="groupNumber">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="points">Количество баллов ЕГЭ</label>
                        <input type="number" name="points" class="form-control" id="points">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="location">Местоположение</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="location" checked value="resident">
                            <label class="form-check-label" for="location">
                                Местный
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="location" value="nonresident">
                            <label class="form-check-label" for="location">
                                Иногородний
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Зарегистрировать</button>
                </div>
            </div>
        </form>
    </div>
</div>