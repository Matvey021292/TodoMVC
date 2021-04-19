<?php


namespace App\Controllers;


use App\Views\View;
use Symfony\Component\HttpFoundation\Session\Session;

class Controller
{
    public $view;
    public $message = [];
    public $fields = [];
    public $session;

    public function __construct()
    {
        $this->view = new View();

        $this->session = new Session();
        $this->session->start();


        if ($this->session->get('message') != null) {
            $this->message = $this->session->get('message');
            $this->session->remove('message');
        }

        if ($this->session->get('fields') != null) {
            $this->fields = $this->session->get('fields');
            $this->session->remove('fields');
        }

        $login = $this->is_login();

        $this->view->add('login', $login);
        $this->view->add('messages', $this->message);

        $this->view->view('layouts/index');
    }

    public function is_login()
    {
        return $this->session->get('login');
    }

    protected function renderOutput()
    {
        $this->view->renderOutput();
    }
}