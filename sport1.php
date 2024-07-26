
<?php

class sport1 {
    private $db;

    // Constructor to initialize the database connection
    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Method to retrieve all sports
    public function getAllSports() {
        try {
            $stmt = $this->db->query("SELECT * FROM sports");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            // Log or display the error
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Method to delete a sport
   public function deleteSport($id) {
    try {
        $stmt = $this->db->prepare("DELETE FROM sports WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    } catch(PDOException $e) {
        // Log or display the error
        echo "Error: " . $e->getMessage();
        return false;
    }
}


    // Method to close the database connection
    public function closeDBConnection() {
        $this->db = null;
    }
}
?>