<h3>Редактировать профиль</h3>
<?php if (isset($userData)) : ?>
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
    <form method="post" action="user/edit" id="signup">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group sign-up-item">
                    <label for="name">Имя</label>
                    <input type="text" name="name" class="form-control" id="name" required value="<?= $userData['name']; ?>">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group sign-up-item">
                    <label for="lastname">Фамилия</label>
                    <input type="text" name="lastname" class="form-control" id="lastname" required value="<?= $userData['lastname']; ?>">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group sign-up-item">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required value="<?= $userData['email']; ?>">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group sign-up-item">
                    <label for="birthyear">Год рождения</label>
                    <input type="number" name="birthyear" class="form-control" id="birthyear" required value="<?= $userData['birthyear']; ?>">
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
                        <input class="form-check-input" type="radio" name="gender" id="gender" value="Женский" <?php if ($userData['gender'] == 'Женский') {
                                                                                                                    echo ' checked';
                                                                                                                } ?>>
                        <label class="form-check-label" for="gender">
                            Женский
                        </label>
                    </div>
                </div>
                <div class="form-group sign-up-item">
                    <label for="groupnumber">Номер группы</label>
                    <input type="text" name="groupnumber" class="form-control" id="groupnumber" required value="<?= $userData['groupnumber']; ?>">
                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                </div>
                <div class="form-group sign-up-item">
                    <label for="points">Количество баллов ЕГЭ</label>
                    <input type="number" name="points" class="form-control" id="points" required value="<?= $userData['points']; ?>">
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
                        <input class="form-check-input" type="radio" name="location" id="location" value="Иногородний" <?php if ($userData['location'] == 'иногородний') {
                                                                                                                            echo ' checked';
                                                                                                                        } ?>>
                        <label class="form-check-label" for="location">
                            Иногородний
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Сохранить изменения</button>
            </div>
        </div>
    </form>
<?php endif; ?>
<?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>