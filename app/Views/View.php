<?php


namespace App\Views;


class View
{
    private $variables = [];

    public function add($variable, $value)
    {
        $this->variables[$variable] = $value;
    }

    public function view($layout, $variable = [])
    {
        extract($variable);
        ob_start();
        if (file_exists(__DIR__ . "/../../resourse/{$layout}.php")) {
            include __DIR__ . "/../../resourse/{$layout}.php";
        } else {
            echo '<div class="text-center">Шаблон не найден</div>';
        }
        return ob_get_clean();
    }


    public function renderOutput()
    {
        extract($this->variables);
        ob_start();
        include __DIR__ . "/../../resourse/layouts/index.php";
        echo ob_get_clean();
    }
}