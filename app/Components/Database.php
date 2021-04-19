<?php


namespace App\Components;

use Medoo\Medoo;

class Database extends Medoo
{
    public function __construct()
    {
        parent::__construct([
            'database_type' => DB_TYPE,
            'database_name' => DB_NAME,
            'server' => DB_HOST,
            'username' => DB_USER,
            'password' => DB_PASS
        ]);
    }
}