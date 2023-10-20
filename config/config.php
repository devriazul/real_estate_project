<?php
$dbhost = 'localhost';
$dbname = 'real-state';
$dbuser = 'root';
$dbpass = '';
try {
    $pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
    echo "Connection error :" . $exception->getMessage();
}
define("BASE_URL", "http://localhost:8888/real_estate_project/");
define("ADMIN_URL", BASE_URL."admin/");

define("SMTP_HOST", "sandbox.smtp.mailtrap.io");
define("SMTP_PORT", "587");
define("SMTP_USERNAME", "8f466e0957fe89");
define("SMTP_PASSWORD", "99cce7333a35da");
define("SMTP_ENCRYPTION", "tls");
define("SMTP_FROM", "contact@yourwebsite.com");