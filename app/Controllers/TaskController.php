<?php


namespace App\Controllers;


use App\Models\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{

    public function add(Request $request, Response $response)
    {

        if ($request->getMethod() == 'POST') {
            $post = $request->request->all();

            $this->validation($post);

            if (!isset($this->message['danger'])) {
                $task = new Task();
                $task->create($post['name'], $post['email'], $post['text']);
                $this->message['success'][] = 'Задача добавлена';
            } else {
                $this->session->set('fields', $post);
            }
        }

        $this->session->set('message', $this->message);

        $response->headers->set('Location', '/');
        $response->send();
    }

    public function edit($id, Request $request, Response $response)
    {

        if (!$this->is_login()) {
            $this->session->set('message', ['danger' => ['Для редактирования записи авторизируйтесь']]);
            $response->headers->set('Location', '/');
            $response->send();
        }

        $model = new Task();
        $task = $model->get($id);

        if (empty($task)) {
            $response->headers->set('Location', '/');
            $response->send();
        }

        $content = $this->view->view('edit_task', [
            'fields' => $task[0],
        ]);

        $this->view->add('content', $content);

        $this->renderOutput();
    }

    public function update($id, Request $request, Response $response)
    {
        if ($request->getMethod() == 'POST') {

            if (!$this->is_login()) {
                $response->headers->set('Location', '/');
                $this->session->set('message', ['danger' => ['Для редактирования записи авторизируйтесь']]);
                $response->send();
                exit;
            }

            $model = new Task();
            $task = $model->get($id);

            if (empty($task)) {
                $response->headers->set('Location', '/');
                $response->send();
            }

            $post = $request->request->all();
                $this->validation($post);

            if (!isset($this->message['danger'])) {
                $model->update($id, $post['name'], $post['email'], $post['text'], isset($post['status']) ? 1 : 0);
                $this->message['success'][] = 'Задача сохранена';
                $this->session->set('message', $this->message);

                $response->headers->set('Location', "/");
            } else {
                $this->session->set('fields', $post);
                $this->session->set('message', $this->message);

                $response->headers->set('Location', "/task/edit/{$id}");
            }

            $response->send();
        }
    }

    public function validation($post)
    {
        if (empty($post['name'])) {
            $this->message['danger']['name'] = 'Ошибка имени';
        }

        if (empty($post['email'])) {
            $this->message['danger']['email'] = 'Ошибка email';
        } else if (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $this->message['danger']['email'] = "E-mail адрес '{$post['email']}' указан неверно";
        }

        if (empty($post['text'])) {
            $this->message['danger']['text'] = 'Ошибка описания задачи';
        }
    }
}