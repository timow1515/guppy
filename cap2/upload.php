<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = 'uploads/';
    $targetFile = $targetDir . basename($_FILES['file']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is an actual image or video
    $check = getimagesize($_FILES['file']['tmp_name']);
    if ($check !== false) {
        echo "File is an image - " . $check['mime'] . ".";
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        echo "File is not an image.";
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "File already exists.";
        $uploadOk = 0;
    }

    // Upload file if all checks pass
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            echo "The file " . basename($_FILES['file']['name']) . " has been uploaded.";
        } else {
            echo "Error uploading the file.";
        }
    }
}
?>
