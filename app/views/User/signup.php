<div class="register-main">
    <div class="container-fluid">
        <?php // session_destroy();?>
        <?php if (isset($_SESSION['error'])) : ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <h3>Регистрация</h3>
        <form method="post" action="user/signup" id="signup">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group sign-up-item">
                        <label for="name">Имя</label>
                        <input type="text" name="name" class="form-control" id="name" required value="<?= isset($_SESSION['form_data']['name']) ? htmlspecialchars($_SESSION['form_data']['name'], ENT_QUOTES) : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="lastname">Фамилия</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" required value="<?= isset($_SESSION['form_data']['lastname']) ? htmlspecialchars($_SESSION['form_data']['lastname'], ENT_QUOTES) : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required value="<?= isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email'], ENT_QUOTES) : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="birthyear">Год рождения</label>
                        <input type="number" name="birthyear" class="form-control" id="birthyear" required value="<?= isset($_SESSION['form_data']['birthyear']) ? htmlspecialchars($_SESSION['form_data']['birthyear'], ENT_QUOTES) : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="gender">Пол</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Мужской" checked>
                            <label class="form-check-label" for="male">
                                Мужской
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Женский" <?php if(isset($_SESSION['form_data']['gender']) && $_SESSION['form_data']['gender'] === "женский") {echo htmlspecialchars(' checked', ENT_QUOTES);}?>>
                            <label class="form-check-label" for="female">
                                Женский
                            </label>
                        </div>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="groupnumber">Номер группы</label>
                        <input type="text" name="groupnumber" class="form-control" id="groupnumber" required value="<?= isset($_SESSION['form_data']['groupnumber']) ? htmlspecialchars($_SESSION['form_data']['groupnumber'], ENT_QUOTES) : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="points">Количество баллов ЕГЭ</label>
                        <input type="number" name="points" class="form-control" id="points" required value="<?= isset($_SESSION['form_data']['points']) ? htmlspecialchars($_SESSION['form_data']['points'], ENT_QUOTES) : ''; ?>">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="location">Местоположение</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="resident" checked value="Местный">
                            <label class="form-check-label" for="resident">
                                Местный
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="nonresident" value="Иногородний" <?php if(isset($_SESSION['form_data']['location']) && $_SESSION['form_data']['location'] === "Иногородний") {echo htmlspecialchars(' checked', ENT_QUOTES);}?>>
                            <label class="form-check-label" for="nonresident">
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