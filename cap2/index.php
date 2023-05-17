<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

// Display the homepage content
echo "Welcome, " . $_SESSION['username'] . "! This is the homepage.";

// Display the upload form
echo '
<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="file" required>
    <input type="submit" value="Upload">
</form>';

// Display the uploaded files
$files = glob('uploads/*');
if ($files) {
    echo "<h2>Uploaded Files:</h2>";
    foreach ($files as $file) {
        echo "<a href='$file' target='_blank'>$file</a><br>";
    }
}
?>
	