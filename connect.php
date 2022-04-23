<?php
    $host = 'localhost';
    $dbName = 'admin';
    $username = 'root';
    $password = '';
    $conn= mysqli_connect("localhost","root","");
    $dbCon = new PDO("mysql:host=".$host.";dbname=".$dbName, $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $db = "Create database if not exists admin";
    if(!$conn -> query($db))
    {
        die("Cannot create database: ".$conn->error);
    }
    $conn= mysqli_connect("localhost","root","","admin");
    $table_login="Create table if not exists logup(id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,username varchar(255), email varchar(40), address varchar(50), phone int(10), birthday date, CMNDbefore varbinary(255), CMNDafter varbinary(255), confirm int(11))";
    $table_logup="Create table if not exists login(id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,username varchar(255),password varchar(255), email varchar(255))";
    if(!$conn -> query($table_login))
    {
        die("Cannot create table: ".$conn->error);
    }
    if(!$conn -> query($table_logup))
    {
        die("Cannot create table: ".$conn->error);
    }
    mysqli_set_charset($conn,"utf8");
    session_start();
?>