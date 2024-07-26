<?php
session_start(); // Start a session

require_once 'classes/DbConnector.php';
require_once 'classes/Attendance.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedSport = isset($_POST['selectedSport']) ? $_POST['selectedSport'] : null;
    $selectedDate = isset($_POST['selectedDate']) ? $_POST['selectedDate'] : null;
    $attendanceData = isset($_POST['attendance']) ? $_POST['attendance'] : [];
    $studentNames = isset($_POST['studentNames']) ? $_POST['studentNames'] : [];

    if ($selectedSport && $selectedDate && !empty($attendanceData)) {
        $db = \classes\DbConnector::getConnection();
        $attendance = new \classes\Attendance($db);

        // Loop through the attendance data and insert records into the database
        foreach ($attendanceData as $enrollmentNumber => $status) {
            // Insert attendance data into the database
            $fullName = $studentNames[$enrollmentNumber];
            $attendance->insertAttendance($selectedSport, $selectedDate, $enrollmentNumber, $fullName, $status);
        }

        // Set success message in the session
        $_SESSION['successMessage'] = 'Attendance saved successfully';

        // Redirect back to index.php
        header("Location: mark_attendence.php");
        exit();
    }
}

// Redirect to an error page or back to index.php in case of form submission issues
header("Location: mark_attendence.php?error=1");
