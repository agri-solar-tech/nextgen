<?php
/**
 * Requires the "PHP Email Form" library
 * The "PHP Email Form" library is available only in the pro version of the template
 * The library should be uploaded to: vendor/php-email-form/php-email-form.php
 * For more info and help: https://bootstrapmade.com/php-email-form/
 */

// Replace with your real receiving email address
$receiving_email_address = 'yassineouyahya9@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    die("Method Not Allowed");
}

if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address");
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = $_POST['email'];
$contact->from_email = $_POST['email'];
$contact->subject = "New Subscription: " . $_POST['email'];

// SMTP Configuration (Use one of the provided Gmail accounts)
$contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'lexusczeck55462@gmail.com', // Change to one of the emails
    'password' => 'poxfelikaglbhrel', // Corresponding App Password
    'port' => '587',
    'encryption' => 'tls'
);

$contact->add_message($_POST['email'], 'Email');

echo $contact->send();
?>
