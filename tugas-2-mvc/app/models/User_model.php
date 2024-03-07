<?php
class User_model
{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllUser()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultAll();
    }

    public function getUserById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    public function createUser($data)
    {
        $query = "INSERT INTO user VALUES ('', :name, :username)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('username', $data['username']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
