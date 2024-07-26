<?php

namespace classes;

require_once('DbConnector.php');

class SportKit
{
    public static function addSportKit($sportName, $availableColors, $availableSizes, $price, $description, $image)
    {
        try {
            $conn = DbConnector::getConnection();
            $sql = "INSERT INTO SportsKits (sportName, availableColors, availableSizes, price, description, image) 
                    VALUES (:sportName, :availableColors, :availableSizes, :price, :description, :image)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':sportName', $sportName);
            $stmt->bindParam(':availableColors', $availableColors);
            $stmt->bindParam(':availableSizes', $availableSizes);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image);
            $stmt->execute();

            // Image handling - example: move the uploaded image to the "uploads" folder
            move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);

            return true; // If insertion is successful
        } catch (\PDOException $e) {
            return false; // If there's an error in the database operation
        }
    }

  public static function getAllKits()
{
    $conn = DbConnector::getConnection();
    $sql = "SELECT id, sportName, availableColors, availableSizes, price, description, image FROM SportsKits";
    $stmt = $conn->query($sql);
    return $stmt->fetchAll();
}


    public function getAllSportsKits() {
        $db = DbConnector::getConnection();
        
        $query = "SELECT * FROM SportsKits";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        $kits = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return $kits;
    }


    public static function getSportKitById($con, $kit_id)
    {
        $query = "SELECT * FROM sport_kits WHERE id = :kit_id LIMIT 1";
        $statement = $con->prepare($query);
        $statement->bindParam(':kit_id', $kit_id);
        $statement->execute();

        $kit = $statement->fetch(PDO::FETCH_ASSOC);

        return $kit ? $kit : null;
    }
    
public function updateSportKit($kitId, $sportName, $availableColors,) {
    try {
       
         $query = "UPDATE SportsKits SET sportName = :sportName, availableColors = :availableColors WHERE id = :kitId";
        // Bind parameters and execute the query

         $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sportName', $sportName);
        $stmt->bindParam(':availableColors', $availableColors);
         $stmt->bindParam(':kitId', $kitId);
         $stmt->execute();
    } catch (\PDOException $exc) {
        die("Error updating sport kit: " . $exc->getMessage());
    }
}


// Inside your SportKit class
public static function deleteSportKit($kit_id) {
    try {
        $conn = DbConnector::getConnection();
        $query = "DELETE FROM SportsKits WHERE id = :kit_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':kit_id', $kit_id);
        $stmt->execute();
        return true; // If deletion is successful
    } catch (\PDOException $e) {
        return false; // If there's an error in the database operation
    }
}



}