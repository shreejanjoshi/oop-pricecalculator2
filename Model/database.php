<?php


$connection = mysqli_connect('localhost', 'root', '', 'pricecalculator');
if (!$connection) {
    die("Database connection failed");
}