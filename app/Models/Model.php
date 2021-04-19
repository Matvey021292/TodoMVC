<?php

namespace App\Models;

use App\Components\Database;
use PDOException;

class Model
{
    protected $db;

    public function __construct()
    {
        try {
            $this->db = new Database();
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
}