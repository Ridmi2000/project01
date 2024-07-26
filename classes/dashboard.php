<?php

namespace classes;

use PDO;
use PDOException;

class Dashboard {

    public static function getTotalRegistrations() {
        try {
            $conn = DbConnector::getConnection();
            $query = "SELECT COUNT(*) as count FROM university_students";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['count'];
        } catch (PDOException $exc) {
            die("Error in fetching total registrations: " . $exc->getMessage());
        }
    }

    // You can add more methods here for different dashboard data


        public static function getTotalOrders() {
        try {
            $conn = DbConnector::getConnection();
            $query = "SELECT COUNT(*) as count FROM Orders";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['count'];
        } catch (PDOException $exc) {
            die("Error in fetching total orders: " . $exc->getMessage());
        }
    }


        public static function getTotalDonations() {
        try {
            $conn = DbConnector::getConnection();
            $query = "SELECT COUNT(*) as count FROM donations";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['count'];
        } catch (PDOException $exc) {
            die("Error in fetching total registrations: " . $exc->getMessage());
        }
    }

        public static function getTotalFeedbacks() {
        try {
            $conn = DbConnector::getConnection();
            $query = "SELECT COUNT(*) as count FROM feedback";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['count'];
        } catch (PDOException $exc) {
            die("Error in fetching total registrations: " . $exc->getMessage());
        }
    }

}
