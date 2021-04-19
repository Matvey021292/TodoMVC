<?php

namespace App\Controllers;

use App\Models\Task;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function show(Request $request)
    {
        $login = $this->is_login();

        $model = new Task();

        $params = $request->query->all();

        $page = isset($params['page']) ? $params['page'] : 1;
        $sort = isset($params['sort']) ? $params['sort'] : 'id';
        $order = isset($params['order']) ? strtoupper($params['order']) : 'DESC';

        $tasks = $model->all($page, $sort, $order);
        $count = $model->count();

        $content = $this->view->view('tasks', [
            'tasks' => $tasks,
            'page' => $page,
            'count' => $count,
            'login' => $login,
            'fields' => $this->fields
        ]);

        $this->view->add('fields', $this->fields);
        $this->view->add('title', 'Список задач');
        $this->view->add('login', $login);
        $this->view->add('content', $content);

        $this->renderOutput();
    }
}