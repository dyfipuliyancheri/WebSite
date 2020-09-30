<?php
require 'PHPMailerAutoload.php';
require 'credentials.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header("Access-Control-Allow-Headers: X-Requested-With");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email =  $_POST['email'];

  $mail = new PHPMailer;

  //   $mail->SMTPDebug = 4;                               // Enable verbose debug output

  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'mail.stacka.tech';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = EMAIL;                 // SMTP username
  $mail->Password = PASS;                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to

  $mail->setFrom(EMAIL, 'Quick Enquiry from Web');
  $mail->addAddress('ajwastudio.contactus@gmail.com');
  $mail->addAddress('info@stacka.tech');   // Add a recipient
  $mail->addReplyTo($email, $name);

  $mail->isHTML(true);                                  // Set email format to HTML

  $mail->Subject = 'Quck Enquiry Mail';
  $mail->Body    = 'Email : <b>' . $mail;

  if (!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
    echo 'OK';
  }
}
