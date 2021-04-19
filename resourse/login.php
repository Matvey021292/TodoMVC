<div class="col-md-4 mx-auto">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Вход</h5>
        </div>
        <div class="modal-body mb-2">
            <form action="/login" method="post">
                <div class="mb-3">
                    <label for="staticlogin1" class="col-form-label">Логин</label>
                    <div class="">
                        <input type="text" name="login" class="form-control" id="staticlogin1"
                               value="<?= isset($fields['login']) ? $fields['login'] : '' ?>">
                    </div>
                </div>
                <div class="mb-3 ">
                    <label for="inputPassword1" class="col-form-label">Пароль</label>
                    <div class="">
                        <input type="password" name="password" class="form-control" id="inputPassword1"
                               value="<?= isset($fields['password']) ? $fields['password'] : '' ?>">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-lg">Войти</button>
            </form>
        </div>
    </div>
</div>