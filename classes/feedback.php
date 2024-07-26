<?php

namespace classes;

use PDO;
use PDOException;

class Feedback {
private $name;
private $subject;
private $feedbackText;
    

    public function __construct() {
        // Constructor code here
    }

    public function save($name, $subject, $feedbackText, $con) {
        try {
            $query = "INSERT INTO feedback (name, subject, feedback) VALUES (?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $name);
            $pstmt->bindValue(2, $subject);
            $pstmt->bindValue(3, $feedbackText);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in Feedback class's save function: " . $exc->getMessage());
        }
    }

    public function getAllFeedback($con) {
        try {
            $query = "SELECT * FROM feedback ORDER BY id DESC";
            $stmt = $con->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            die("Error in Feedback class's getAllFeedback function: " . $exc->getMessage());
        }
    }

    public function deleteFeedback($feedbackId, $con) {
        try {
            $query = "DELETE FROM feedback WHERE id = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $feedbackId);
            $pstmt->execute();
            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in Feedback class's deleteFeedback function: " . $exc->getMessage());
        }
    }
}
