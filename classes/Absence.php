<?php

namespace classes;

use PDO;
use PDOException;

class Absence
{
   private $fullName;
   private $address;
   private $enrollmentNumber;
   private $contactNumber;
   private $sportType;
   private $dateFrom;
   private $dateTo;
   private $numberOfDates; 
   private $reasonForAbsence;




   public function __construct() {
    // Constructor code here
}

    public function saveAbsenceRecord($fullName, $address, $enrollmentNumber, $contactNumber, $sportType, $dateFrom, $dateTo, $numberOfDates, $reasonForAbsence, $con)
    {
        try {
            $query = "INSERT INTO absencerecords (fullName, address, enrollmentNumber, contactNumber, sportType, dateFrom, dateTo, numberOfDates, reasonForAbsence)
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
           $pstmt = $con->prepare($query);
    
           $pstmt->bindValue(1,$fullName);
           $pstmt->bindValue(2,$address);
           $pstmt->bindValue(3,$enrollmentNumber);
           $pstmt->bindValue(4,$contactNumber);
           $pstmt->bindValue(5,$sportType);
           $pstmt->bindValue(6,$dateFrom);
           $pstmt->bindValue(7,$dateTo);
           $pstmt->bindValue(8,$numberOfDates);
           $pstmt->bindValue(9,$reasonForAbsence);
    
           $pstmt->execute();
           return ($pstmt->rowCount() > 0);
       } catch (PDOException $exc) {
           die("Error in Feedback class's save function: " . $exc->getMessage());
       }
   }
   public function getAllAbsenceRecords($con) {
    try {
        $query = "SELECT * FROM absencerecords ORDER BY id DESC";
        $stmt = $con->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $exc) {
        die("Error : " . $exc->getMessage());
    }
}
    
}    