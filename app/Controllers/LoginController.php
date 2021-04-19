<?php


namespace App\Controllers;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function show(Request $request, Response $response)
    {

        if ($this->is_login()) {
            $response->headers->set('Location', '/');
            $response->send();
        }

        $content = $this->view->view('login', [
            'fields' => $this->fields
        ]);

        $this->view->add('title', 'Вход');
        $this->view->add('content', $content);
        $this->renderOutput();

    }

    public function login(Request $request, Response $response)
    {

        if ($request->getMethod() == 'POST') {

            $params = $request->request->all();

            $this->validation($params);

            if (empty($this->message['danger'])) {
                if ($params['login'] != ADMIN_LOGIN || md5($params['password']) != ADMIN_PASS) {
                    $this->message['danger'][] = 'Неправильный пароль или логин';

                } else {
                    $this->session->set('login', $params['login']);
                    $response->headers->set('Location', '/');
                    $response->send();
                }
            }

            $this->session->set('fields', $params);
        }

        $this->session->set('message', $this->message);
        $response->headers->set('Location', '/login');
        $response->send();
    }

    public function logout(Response $response)
    {
        $this->session->remove('login');
        $response->headers->set('Location', '/');
        $response->send();
    }

    public function validation($params)
    {

        if (empty($params['login'])) {
            $this->message['danger']['login'] = 'Введите имя пользователя';
        }

        if (empty($params['password'])) {
            $this->message['danger']['password'] = 'Введите пароль';
        }
    }
}