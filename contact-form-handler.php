<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Email you want messages sent to
    $to = "info@slim47.com";

    // Sanitize & collect input
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST["message"]));

    // Check for empty fields
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please fill in all required fields correctly.";
        exit;
    }

    // Email subject
    $subject = "Slim 47 Website Contact Form: $name";

    // Email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Email headers
    $headers = "From: Slim 47 <info@slim47.com>";


    // Send email
    if (mail($to, $subject, $email_content, $headers)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong, please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
