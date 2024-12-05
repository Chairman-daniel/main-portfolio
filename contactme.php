<?php

// Check if the form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    // Redirect to index.html or show a 403 error
    header('Location: index.html');
    exit;
}

// Check for the token
if (!isset($_POST['token']) || $_POST['token'] !== 'contact_form_token') {
    // Redirect to index.html or show a 403 error
    header('HTTP/1.0 403 Forbidden');
    echo "Access denied. This page cannot be accessed directly.";
    exit;
}


//SETTING UP THE CONTACT FORM
if (isset($_POST['submit'])) {

    //RETRIEVE CONTACT FORM DATA
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //EMAIL ADDRESS TO RECIEVE THE CONTACT FORM MESSAGE
    $to = "danielodilaa@gmail.com"; //my email address
    $subject = "You got a new contact from your Portfolio by: " . $fullname;

    //CONSTRUCT THE EMAIL BODY
    $body = "Full Name: " . $fullname . "\n";
    $body .= "Email Address: " . $email . "\n\n";
    $body .= "Message:\n" . $message . "\n\n";
    $body .= "..........................." . "\n\n";
    $body .= "This email was sent from your portfolio";

    // Set the email headers
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        $sent = "Thank you, your message has been sent.";
        header('location: index.html#contact');
        exit;
    } else {
        $sent = "There was a problem sending your message. Please try again later.";
    }
} else {
    $sent = '';
}
