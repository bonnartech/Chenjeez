<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Sanitize and validate input (basic example)
    $name = htmlspecialchars(strip_tags($name));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(strip_tags($phone));
    $message = htmlspecialchars(strip_tags($message));

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Prepare the email content
    $to = "Coverage4u22@gmail.com"; 
    $subject = "New Contact Us Message from $name";
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage:\n$message";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending your message.";
    }
}
?>
