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
                        <input type="text" name="name" class="form-control" id="name" required value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="lastname">Фамилия</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" required value="<?= isset($_SESSION['form_data']['lastname']) ? $_SESSION['form_data']['lastname'] : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="birthyear">Год рождения</label>
                        <input type="number" name="birthyear" class="form-control" id="birthyear" required value="<?= isset($_SESSION['form_data']['birthyear']) ? $_SESSION['form_data']['birthyear'] : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="gender">Пол</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Мужской" checked>
                            <label class="form-check-label" for="gender">
                                Мужской
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="gender" value="Женский" <?php if(isset($_SESSION['form_data']['gender']) && $_SESSION['form_data']['gender'] === "Женский") {echo ' checked';}?>>
                            <label class="form-check-label" for="gender">
                                Женский
                            </label>
                        </div>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="groupnumber">Номер группы</label>
                        <input type="text" name="groupnumber" class="form-control" id="groupnumber" required value="<?= isset($_SESSION['form_data']['groupnumber']) ? $_SESSION['form_data']['groupnumber'] : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="points">Количество баллов ЕГЭ</label>
                        <input type="number" name="points" class="form-control" id="points" required value="<?= isset($_SESSION['form_data']['points']) ? $_SESSION['form_data']['points'] : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="location">Местоположение</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="location" checked value="Местный">
                            <label class="form-check-label" for="location">
                                Местный
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="location" value="Иногородний" <?php if(isset($_SESSION['form_data']['location']) && $_SESSION['form_data']['location'] === "Иногородний") {echo ' checked';}?>>
                            <label class="form-check-label" for="location">
                                Иногородний
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Зарегистрировать</button>
                </div>
            </div>
        </form>
        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
    </div>
</div>