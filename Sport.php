<?php
require_once "DbConnector.php";


class Sport {
    private $db;

    public function __construct() {
        $this->db = new DbConnector();
    }

    public function getAllSports() {
        $sql = "SELECT * FROM Sports";
        $result = $this->db->conn->query($sql);
        return $result;
    }

    public function deleteSport($id) {
        $sql = "DELETE FROM Sports WHERE id = ?";
        $stmt = $this->db->conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }

        $stmt->close();
    }

    public function closeDBConnection() {
        $this->db->closeConnection();
    }
}
