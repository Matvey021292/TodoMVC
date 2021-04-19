<?php


namespace App\Models;


class Task extends Model
{
    protected $table = 'tasks';

    public function __construct()
    {
        parent::__construct();
    }

    public function all($offset = 0, $sort = 'id', $order = 'DESC')
    {
        return $this->db->select($this->table, '*', [
            "LIMIT" => [($offset - 1) * POSTS_COUNT, POSTS_COUNT],
            "ORDER" => [$sort => $order],
        ]);
    }

    public function count()
    {
        return $this->db->count($this->table);
    }

    public function create($name, $email, $text, $status = 0, $edit = 0)
    {
        $this->db->insert($this->table, [
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'text' => htmlspecialchars($text),
            'status' => $status,
            'edit' => $edit
        ]);
    }

    public function get($id)
    {
        return $this->db->select($this->table, '*', [
            "id" => $id
        ]);
    }

    public function update($id, $name, $email, $text, $status = 0)
    {
        $this->db->update($this->table, [
            'name' => htmlspecialchars($name),
            'email' => htmlspecialchars($email),
            'text' => htmlspecialchars($text),
            'status' => $status,
            'edit' => 1,
        ], [
            'id' => $id
        ]);
    }
}