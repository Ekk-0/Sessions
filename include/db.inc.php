<?php

$DB_SERVER_NAME = "localhost";
$DB_USERNAME = $_ENV['DB_USER'];
$DB_PASSWORD = $_ENV['DB_USERPWD'];
$DB_NAME = "loginsystem";

$conn = mysqli_connect($DB_SERVER_NAME, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);