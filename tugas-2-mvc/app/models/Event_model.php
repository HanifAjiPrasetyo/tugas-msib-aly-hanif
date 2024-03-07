<?php
class Event_model
{
    private $table = 'event';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllEvent()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultAll();
    }

    public function getEventById($id)
    {
        $this->db->query("SELECT * FROM " . $this->table . ' WHERE id =:id');
        $this->db->bind('id', $id);
        return $this->db->resultSingle();
    }

    public function createEvent($data)
    {
        $query = "INSERT INTO " . $this->table . " VALUES ('', :name, :date, :detail, :image)";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('date', $data['date']);
        $this->db->bind('detail', $data['detail']);
        $this->db->bind('image', $data['image']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteEvent($data)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateEvent($data)
    {
        $query = "UPDATE " . $this->table . " SET name=:name, date=:date, detail=:detail, image=:image WHERE id=:id";
        $this->db->query($query);
        $this->db->bind('name', $data['name']);
        $this->db->bind('date', $data['date']);
        $this->db->bind('detail', $data['detail']);
        $this->db->bind('image', $data['image']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchEvent()
    {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM " . $this->table . " WHERE name LIKE :keyword OR detail LIKE :keyword";
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        return $this->db->resultAll();
    }

    public function registerEvent($data)
    {
        $query = "INSERT INTO event_register VALUES ('', :user_id, :event_id)";
        $this->db->query($query);
        $this->db->bind('user_id', $data['user_id']);
        $this->db->bind('event_id', $data['event_id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllRegisteredUser()
    {
        $query = "SELECT user.name user_name, event.name event_name, event.image event_image, event.date event_date FROM event_register er INNER JOIN event ON er.event_id = event.id INNER JOIN user ON er.user_id = user.id";
        $this->db->query($query);
        return $this->db->resultAll();
    }
}
