<?php
require '../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

$DB_SERVER_NAME = "localhost";
$DB_USERNAME = $_ENV['DB_USER'];
$DB_PASSWORD = $_ENV['DB_HOSTPWD'];
$DB_NAME = "loginsystem";

$conn = mysqli_connect($DB_SERVER_NAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);