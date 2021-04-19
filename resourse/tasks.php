<?php
if (!empty($tasks)): ?>
    <table class="table  table-striped">
        <thead class="table-light">
        <tr>
            <th scope="col"><a data-sort="id" data-order="asc" href="#"></a> ID задачи
                <a data-sort="id" data-order="desc" href="#"></a></th>
            <th scope="col"><a data-sort="name" data-order="asc" href="#"></a> Имя
                <a data-sort="name" data-order="desc" href="#"></a></th>
            <th scope="col"><a data-sort="email" data-order="asc" href="#"></a> Email
                <a data-sort="email" data-order="desc" href="#"></a>
            </th>
            <th scope="col"><a data-sort="text" data-order="asc" href="#"></a> Описание
                <a data-sort="text" data-order="desc" href="#"></a></th>
            <th scope="col"><a data-sort="status" data-order="asc" href="#"></a> Статус
                <a data-sort="status" data-order="desc" href="#"></a></th>
            <?php if (!empty($login)): ?>
                <th>Редактировать</th>
            <?php endif; ?>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($tasks as $task): ?>
            <tr>
                <td><?= $task['id'] ?></td>
                <td><?= $task['name'] ?></td>
                <td><?= $task['email'] ?></td>
                <td><?= $task['text'] ?></td>
                <td>
                    <div><?= ($task['status'] == 0) ? 'В процессе' : 'Выполнено' ?></div>
                    <div><?= ($task['edit'] == 0) ? '' : 'Отредактировано администратором' ?></div>
                </td>
                <?php if (!empty($login)): ?>
                    <td>
                        <a href="/task/edit/<?= $task['id'] ?>"><i class="fa fa-edit"></i></a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php
        endforeach; ?>
        </tbody>
    </table>
    <div class="my-5 text-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php if (isset($count) && $count > POSTS_COUNT): ?>
                    <?php for ($i = 1; $i <= ceil($count / POSTS_COUNT); $i++): ?>
                        <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                            <a data-pagination="<?= $i ?>" class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                        </li>
                    <?php endfor; ?>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
<?php else: ?>
    <div class="text-center">Записей не найдено</div>
<?php endif; ?>
<div class="my-5 text-center">
    <button data-bs-toggle="modal" data-bs-target="#addTaskModal" type="button" class="btn btn-primary btn-lg">Добавить
        задачу
    </button>
</div>

<!-- Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Новая задача</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="create" action="/task/add" method="post">
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
                    <button type="submit" class="btn btn-primary w-100 btn-lg">Добавить задачу</button>
                </form>
            </div>
        </div>
    </div>
</div>