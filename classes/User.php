<?php
namespace classes;

use PDO;
use PDOException;

class User {

    private $full_name;
    private $address;
    private $district;
    private $birthday;
    private $nic;
    private $degree;
    private $faculty;
    private $enrollment_no;
    private $phone_no;
    private $university_email;
    private $password;
    private $confirmPassword;
    private $gender;
    private $sport_type;
    private $medical_issues;

    public function __construct($full_name, $address, $district, $birthday, $nic, $degree, $faculty, $enrollment_no, $phone_no, $university_email, $password, $confirmPassword, $gender, $sport_type, $medical_issues) {
        $this->full_name = $full_name;
        $this->address = $address;
        $this->district = $district;
        $this->birthday = $birthday;
        $this->nic = $nic;
        $this->degree = $degree;
        $this->faculty = $faculty;
        $this->enrollment_no = $enrollment_no;
        $this->phone_no = $phone_no;
        $this->university_email = $university_email;
          // $this->password = $password;
        $this->password = password_hash($password, PASSWORD_BCRYPT);  //Hash the password
        $this->confirmPassword = password_hash($confirmPassword, PASSWORD_BCRYPT);
        $this->gender = $gender;
        $this->sport_type = $sport_type;
        $this->medical_issues = $medical_issues;
    }

    public function register($con) {
        try {
            // Check if the email already exists
            if ($this->isEmailExists($con, $this->university_email)) {
                return false; // Email already exists, registration failed
            }

            // Continue with the registration process
            $query = "INSERT INTO university_students (full_name, address, district, birthday, nic, degree, faculty, enrollment_no, phone_no, university_email, password, gender, sport_type, medical_issues, confirm_password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $this->full_name);
            $pstmt->bindValue(2, $this->address);
            $pstmt->bindValue(3, $this->district);
            $pstmt->bindValue(4, $this->birthday);
            $pstmt->bindValue(5, $this->nic);
            $pstmt->bindValue(6, $this->degree);
            $pstmt->bindValue(7, $this->faculty);
            $pstmt->bindValue(8, $this->enrollment_no);
            $pstmt->bindValue(9, $this->phone_no);
            $pstmt->bindValue(10, $this->university_email);
            $pstmt->bindValue(11, $this->password);
            $pstmt->bindValue(12, $this->gender);
            $pstmt->bindValue(13, $this->sport_type);
            $pstmt->bindValue(14, $this->medical_issues);
            $pstmt->bindValue(15, $this->confirmPassword);
            $pstmt->execute();

            return ($pstmt->rowCount() > 0);
        } catch (PDOException $exc) {
            die("Error in User class's register function: " . $exc->getMessage());
        }
    }

    // New method to check if the email already exists
    private function isEmailExists($con, $email)
    {
        try {
            $query = "SELECT * FROM university_students WHERE university_email = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $email);
            $pstmt->execute();

            return $pstmt->fetch(PDO::FETCH_ASSOC) !== false;
        } catch (PDOException $exc) {
            die("Error in User class's isEmailExists function: " . $exc->getMessage());
        }
    }

    public function authenticate($con, $university_email, $password) {
        try {
            // Query to fetch the user's data by university email
            $query = "SELECT * FROM university_students WHERE university_email = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $university_email);
            $pstmt->execute();
            
            // Check if a user with the given university email exists
            if ($pstmt->rowCount() > 0) {
                $user = $pstmt->fetch(PDO::FETCH_ASSOC);
    
                // Verify the provided password against the hashed password in the database
                if (password_verify($password, $user['password'])) {
                    // Password is correct; return the user's data
                    unset($user['password']); // Remove the password from the user data for security
                    return $user;
                }
            }
    
            // Authentication failed (user not found or password incorrect)
            return null;
        } catch (PDOException $exc) {
            die("Error in User class's authenticate function: " . $exc->getMessage());
        }
    }

    public static function getUserById($con, $user_id) {
        try {
            $query = "SELECT * FROM university_students WHERE id = ?";
            $pstmt = $con->prepare($query);
            $pstmt->bindValue(1, $user_id);
            $pstmt->execute();
    
            if ($pstmt->rowCount() > 0) {
                return $pstmt->fetch(PDO::FETCH_ASSOC);
            }
    
            return null;
        } catch (PDOException $exc) {
            die("Error in getUserById: " . $exc->getMessage());
        }
    }

    public static function getAllPlayers($con) {
        try {
            $query = "SELECT * FROM university_students";
            $pstmt = $con->query($query);
            return $pstmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $exc) {
            die("Error getting players: " . $exc->getMessage());
        }
    }
}
