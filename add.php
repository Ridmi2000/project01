<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sportName = $_POST['sportName'] ?? '';
    $sportCategory = $_POST['sportCategory'] ?? '';
    $sportType = $_POST['sportType'] ?? '';

    $imagePath = '';

    if (isset($_FILES['sportImage'])) {
        $file_tmp = $_FILES['sportImage']['tmp_name'];
        $file_name = $_FILES['sportImage']['name'];
        $file_size = $_FILES['sportImage']['size'];

        if ($file_size > 2097152) {
            echo "File size is too large. Max size is 2MB.";
            exit();
        }

        $target_dir = "uploads/";
        if (move_uploaded_file($file_tmp, $target_dir . $file_name)) {
            echo "File uploaded successfully.";
            $imagePath = $target_dir . $file_name;
        } else {
            echo "File upload failed.";
        }
    }

    $sql = "INSERT INTO Sports (name, category, type, image_path) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $sportName, $sportCategory, $sportType, $imagePath);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        header("Location: add_sport.php?success=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}

?>
