<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Mail constants
define("MAIL_SMTP_DEBUG", SMTP::DEBUG_OFF);
define("MAIL_CHARSET", "UTF-8");
define("MAIL_HOST", "smtp.gmail.com");
define("MAIL_SMTP_AUTH", true);
define("MAIL_USERNAME", "xmartin@sapalomera.cat");
define("MAIL_PASSWORD", "aaaaaaaaaaaaaaaaaaaa");
define("MAIL_SMTP_SECURE", PHPMailer::ENCRYPTION_SMTPS);
define("MAIL_PORT", 465);
define("BASE_RESET_URL", "http://localhost/UF1/exam/controller/change-password.php?token=");
define("MAIL_SENDER_NAME", "exam UF1");

?>