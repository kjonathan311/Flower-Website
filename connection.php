<?php
session_start();
$host = 'localhost';
$user = 'root';
$password = 'mysql';
$database = 'artif';
$port = '3306';
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_errno) {
    die($conn->connect_error);
}