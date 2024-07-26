<?php

namespace classes;

use PDO;
use PDOException;

class Donation
{
    private $full_name;
    private $email;
    private $address;
    private $contact_number;
    private $nic_number;
    private $occupation;
    private $donation_date;
    private $donation_amount;
    private $description;

    public function __construct(
        $full_name,
        $email,
        $address,
        $contact_number,
        $nic_number,
        $occupation,
        $donation_date,
        $donation_amount,
        $description
    ) {
        $this->full_name = $full_name;
        $this->email = $email;
        $this->address = $address;
        $this->contact_number = $contact_number;
        $this->nic_number = $nic_number;
        $this->occupation = $occupation;
        $this->donation_date = $donation_date;
        $this->donation_amount = $donation_amount;
        $this->description = $description;
    }

    // Inside Donation class

public function submitDonation(PDO $db): bool {
    try {
        $stmt = $db->prepare("INSERT INTO donations (full_name, email, address, contact_number, nic_number, occupation, donation_date, donation_amount, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bindParam(1, $this->full_name);
        $stmt->bindParam(2, $this->email);
        $stmt->bindParam(3, $this->address);
        $stmt->bindParam(4, $this->contact_number);
        $stmt->bindParam(5, $this->nic_number);
        $stmt->bindParam(6, $this->occupation);
        $stmt->bindParam(7, $this->donation_date);
        $stmt->bindParam(8, $this->donation_amount);
        $stmt->bindParam(9, $this->description);

        return $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}


    public static function getAllDonations($db)
    {
        try {
            // Fetch all donation records
            $query = "SELECT * FROM donations";
            $statement = $db->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            // Handle exceptions
            die("Error getting donations: " . $exc->getMessage());
        }
    }
}

?>
