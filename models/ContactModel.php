<?php
include_once 'data_base.php';

class ContactModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("SELECT * FROM tab_contacts");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM tab_contacts WHERE con_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $phone)
    {
        $stmt = $this->pdo->prepare("INSERT INTO tab_contacts (con_name, con_phone_number) VALUES (?, ?)");
        return $stmt->execute([$name, $phone]);
    }

    public function update($id, $name, $phone)
    {
        $stmt = $this->pdo->prepare("UPDATE tab_contacts SET con_name = ?, con_phone_number = ? WHERE con_id = ?");
        return $stmt->execute([$name, $phone, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM tab_contacts WHERE con_id = ?");
        return $stmt->execute([$id]);
    }
}