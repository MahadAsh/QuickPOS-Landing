<?php
// process.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and get variables
    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING));

    // Validate empty fields
    if (empty($name) || empty($email) || empty($message)) {
        // Redirect back with an error
        header("Location: index.php?error=empty_fields#contact");
        exit();
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=invalid_email#contact");
        exit();
    }

    // Simulate success processing (e.g. sending an email or saving to DB)
    // mail("admin@quickpos.com", "New Contact from $name", $message, "From: $email");

    // Redirect to Thank You page
    header("Location: thank-you.html");
    exit();
} else {
    // If not POST request, redirect back to home
    header("Location: index.php");
    exit();
}
?>
