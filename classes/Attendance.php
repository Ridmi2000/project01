<?php

namespace classes;

class Attendance {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }



public function getAttendanceBySportType($sportType) {
    try {
        $query = "SELECT FullName, EnrollmentNumber FROM Student WHERE SportType LIKE :sportType";
        $stmt = $this->db->prepare($query);
        $sportTypeParam = '%' . $sportType . '%'; // This will find entries containing the specified sport
        $stmt->bindParam(':sportType', $sportTypeParam);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $exc) {
        die("Error getting attendance by sport type: " . $exc->getMessage());
    }
}


    

    public function insertAttendance($sportType, $date, $enrollmentNumber, $fullName, $status) {
        try {
            $query = "INSERT INTO Attendance (SportType, Date, EnrollmentNumber, FullName, Status) VALUES (:sportType, :date, :enrollmentNumber, :fullName, :status)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':sportType', $sportType);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':enrollmentNumber', $enrollmentNumber);
            $stmt->bindParam(':fullName', $fullName);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
        } catch (\PDOException $exc) {
            die("Error inserting attendance: " . $exc->getMessage());
        }
    }


    public function getAttendanceBySportTypeStatusAndDate($sportType, $status, $date) {
    try {
        $query = "SELECT A.EnrollmentNumber, S.FullName, S.Degree
            FROM Attendance AS A
            JOIN Student AS S ON A.EnrollmentNumber = S.EnrollmentNumber
            WHERE A.SportType = :sportType AND A.Status = :status AND A.Date = :date";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sportType', $sportType);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    } catch (\PDOException $exc) {
        die("Error getting attendance by sport, status, and date: " . $exc->getMessage());
    }
}


public function countGirlsAttendanceBySportTypeStatusAndDate($sportType, $status, $date) {
    try {
        $query = "SELECT COUNT(*) as count FROM Attendance AS A
            JOIN Student AS S ON A.EnrollmentNumber = S.EnrollmentNumber
            WHERE A.SportType = :sportType AND A.Status = :status AND A.Date = :date AND S.Gender = 'female'";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sportType', $sportType);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (\PDOException $exc) {
        die("Error counting girls' attendance: " . $exc->getMessage());
    }
}

public function countBoysAttendanceBySportTypeStatusAndDate($sportType, $status, $date) {
    try {
        $query = "SELECT COUNT(*) as count FROM Attendance AS A
            JOIN Student AS S ON A.EnrollmentNumber = S.EnrollmentNumber
            WHERE A.SportType = :sportType AND A.Status = :status AND A.Date = :date AND S.Gender = 'male'";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':sportType', $sportType);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':date', $date);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $result['count'];
    } catch (\PDOException $exc) {
        die("Error counting boys' attendance: " . $exc->getMessage());
    }
}


}
