<div class="register-main">
    <div class="container-fluid">
        <h3>Регистрация</h3>
        <form method="post" action="user/signup" id="signup">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group sign-up-item">
                        <label for="login">Имя</label>
                        <input type="text" name="name" class="form-control" id="name">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="login">Фамилия</label>
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
                        <label for="birthYear">Пол</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="sex">
                            <label class="form-check-label" for="sex">
                                Мужской
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="sex" id="sex1" checked>
                            <label class="form-check-label" for="sex1">
                                Женский
                            </label>
                        </div>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="address">Номер группы</label>
                        <input type="text" name="groupNumber" class="form-control" id="groupNumber">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="address">Количество баллов ЕГЭ</label>
                        <input type="text" name="points" class="form-control" id="points">
                        <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                    </div>
                    <div class="form-group sign-up-item">
                        <label for="birthYear">Местоположение</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="location">
                            <label class="form-check-label" for="location">
                                Местный
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="location" id="location1" checked>
                            <label class="form-check-label" for="location1">
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