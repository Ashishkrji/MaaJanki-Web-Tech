<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Data sanitize aur validation
    $url = filter_var(trim($_POST['url']), FILTER_VALIDATE_URL);
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);

    if (!$url) {
        echo "Invalid URL.";
        exit;
    }

    if (!$email) {
        echo "Invalid email address.";
        exit;
    }

    // Email bhejne ke liye variables
    $to = "ashishkrj0@gmail.com";  // Apna email yahan dalein
    $subject = "New Site Performance Check Request";
    $message = "Website URL: $url\nEmail: $email\n";
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Email bhejna
    if (mail($to, $subject, $message, $headers)) {
        echo "Thank you! Your request has been received.";
    } else {
        echo "Sorry, there was a problem sending your request.";
    }
} else {
    // Agar direct URL se access kiya jaye toh
    echo "Invalid request method.";
}
?>