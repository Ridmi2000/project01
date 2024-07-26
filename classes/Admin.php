<?php

namespace classes;

use PDO;
use PDOException;

class Admin {
    private $full_name;
    private $university_email;
    private $password; // Note that the password is no longer hashed
    private $sport_type;
    private $phone_no;
    private $is_team_captain;
    private $address;
    private $district;
    private $birthday;
    private $nic;
    private $degree;
    private $faculty;
    private $enrollment_no;
    private $gender;
    private $medical_issues;

    public function __construct($full_name, $university_email, $password, $sport_type, $phone_no, $is_team_captain, $address, $district, $birthday, $nic, $degree, $faculty, $enrollment_no, $gender, $medical_issues) {
        $this->full_name = $full_name;
        $this->university_email = $university_email;
        $this->password = $password; // Password is stored as-is, not hashed
        $this->sport_type = $sport_type;
        $this->phone_no = $phone_no;
        $this->is_team_captain = $is_team_captain;
        $this->address = $address;
        $this->district = $district;
        $this->birthday = $birthday;
        $this->nic = $nic;
        $this->degree = $degree;
        $this->faculty = $faculty;
        $this->enrollment_no = $enrollment_no;
        $this->gender = $gender;
        $this->medical_issues = $medical_issues;
    }

    public function admin_authenticate($con, $university_email, $password) {
        try {
            // Query to fetch the admin's data by university email
            $query = "SELECT * FROM admin WHERE university_email = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $university_email);
            $pstmt->execute();

            // Check if an admin with the given university email exists
            if ($pstmt->rowCount() > 0) {
                $admin = $pstmt->fetch(PDO::FETCH_ASSOC);

                // Verify the provided password against the stored password in the database
                if ($password === $admin['password']) {
                    // Password is correct; return the admin's data
                    return $admin;
                }
            }

            // Authentication failed (admin not found or password incorrect)
            return null;
        } catch (PDOException $exc) {
            die("Error in Admin class's admin_authenticate function: " . $exc->getMessage());
        }
    }
    public function addAdmin($con) {
        try {
            $query = "INSERT INTO admin (full_name, university_email, password, sport_type, phone_no, is_team_captain, address, district, birthday, nic, degree, faculty, enrollment_no, gender, medical_issues) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->execute([$this->full_name, $this->university_email, $this->password, $this->sport_type, $this->phone_no, $this->is_team_captain, $this->address, $this->district, $this->birthday, $this->nic, $this->degree, $this->faculty, $this->enrollment_no, $this->gender, $this->medical_issues]);
        } catch (PDOException $exc) {
            die("Error adding admin: " . $exc->getMessage());
        }
    }
    
    public static function deleteAdmin($con, $admin_id) {
        try {
            $query = "DELETE FROM admin WHERE id = ?";
            $pstmt = $con->prepare($query);
            $pstmt->execute([$admin_id]);
        } catch (PDOException $exc) {
            die("Error deleting admin: " . $exc->getMessage());
        }
    }

    public static function getAdminById($con, $admin_id) {
        try {
            $query = "SELECT * FROM admin WHERE id = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $admin_id);
            $pstmt->execute();
    
            if ($pstmt->rowCount() > 0) {
                return $pstmt->fetch(PDO::FETCH_ASSOC);
            }
    
            return null;
        } catch (PDOException $exc) {
            die("Error in getAdminById: " . $exc->getMessage());
        }
    }
    
    public static function getAllAdmins($con) {
        try {
            $query = "SELECT * FROM admin";
            $pstmt = $con->query($query);
            return $pstmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            die("Error getting admins: " . $exc->getMessage());
        }
    }
    
}
?>

