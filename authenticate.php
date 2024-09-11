<?php
session_start();

$valid_passcode = "yourSecurePasscode"; // Replace with your passcode

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $passcode = $_POST['passcode'];
    if ($passcode === $valid_passcode) {
        $_SESSION['authenticated'] = true;
        header("Location: review.php"); // Redirect to admin interface
        exit();
    } else {
        echo "Invalid passcode.";
    }
}
?>
