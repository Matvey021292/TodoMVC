<div class="col-md-6 mx-auto">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Изменить задачу</h5>
        </div>
        <div class="modal-body">
            <form id="create" action="/task/update/<?= isset($fields['id']) ? $fields['id'] : '' ?>" method="post">
                <div class="mb-3">
                    <label for="exampleInputName1" class="form-label">Имя</label>
                    <input name="name" type="text" class="form-control" id="exampleInputName1"
                           value="<?= isset($fields['name']) ? $fields['name'] : '' ?>"
                           aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                           value="<?= isset($fields['email']) ? $fields['email'] : '' ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Описание задачи</label>
                    <textarea name="text" class="form-control" id="exampleInputText1"
                              aria-describedby="emailHelp"><?= isset($fields['text']) ? $fields['text'] : '' ?></textarea>
                </div>
                <div class="mb-3 form-check">
                    <input <?= isset($fields['status']) && $fields['status'] == 1 ? 'checked' : '' ?>
                            class="form-check-input" name="status" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label" for="flexCheckChecked">
                        Выполнено
                    </label>
                </div>
                <button type="submit" class="btn btn-primary w-100 btn-lg">Сохранить задачу</button>
            </form>
        </div>
    </div>
</div>