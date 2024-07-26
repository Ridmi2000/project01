<?php
use classes\DbConnector;
use classes\User;
use classes\Admin;
session_start();

if (isset($_POST['submit'])) {
    $university_email = $_POST['university_email'];
    $password = $_POST['password'];
    $remember = isset($_POST['remember']) ? $_POST['remember'] : 0;

    require_once 'classes/User.php';
    require_once 'classes/Admin.php';
    require_once 'classes/DbConnector.php';

    $con = DbConnector::getConnection();

    $user = new User('', '', '', '', '', '', '', '', '', $university_email, $password, '', '', '', '');
    $authenticated_user = $user->authenticate($con, $university_email, $password);

    if ($authenticated_user) {
        // User authentication successful
        $_SESSION['user_id'] = $authenticated_user['id'];
        $_SESSION['user_full_name'] = $authenticated_user['full_name'];

        if ($remember) {
            // Set cookies if "Remember Me" is checked
            setcookie("remember_email", $university_email, time() + 3600 * 24 * 365);
            setcookie("remember", $remember, time() + 3600 * 24 * 365);
        } else {
            // Clear cookies if "Remember Me" is not checked
            setcookie("remember_email", "", time() - 36000);
            setcookie("remember", "", time() - 3600);
        }

        header("Location: home_page.php");
        exit();
    } else {
        $admin = new Admin('', $university_email, $password, '', '', '', '', '', '', '', '', '', '', '', '');
        $authenticated_admin = $admin->admin_authenticate($con, $university_email, $password);

        if ($authenticated_admin) {
            // Admin authentication successful
            $_SESSION['admin_id'] = $authenticated_admin['id'];
            $_SESSION['admin_full_name'] = $authenticated_admin['full_name'];

            if ($remember) {
                // Set cookies if "Remember Me" is checked
                setcookie("remember_email", $university_email, time() + 3600 * 24 * 365);
                setcookie("remember", $remember, time() + 3600 * 24 * 365);
            } else {
                // Clear cookies if "Remember Me" is not checked
                setcookie("remember_email", "", time() - 36000);
                setcookie("remember", "", time() - 3600);
            }

            header("Location: admin_dashboard.php");
            exit();
        } else {
            // Authentication failed for both user and admin
            $_SESSION['login_error'] = "Invalid credentials. Please try again.";
            header("Location: index.php?status=2"); // Redirect with an error status
            exit();
        }
    }
} else {
    header("Location: index.php?status=0"); // Redirect with a "required values not submitted" status
    exit();
}
?>
