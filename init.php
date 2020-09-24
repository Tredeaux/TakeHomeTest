<?php
    // Database Details (Unsecure for test purposes)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "apiDB";

    //Create Database
    try {
      $conn = new PDO("mysql:host=$servername", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "<br>Connected To mySQL successfully<br>"; 
      $sql = "CREATE DATABASE apiDB";
      $conn->exec($sql);
      echo "<br>Database created successfully<br>";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }

    //Create Table
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
      // sql to create table
      $sql = "CREATE TABLE clients (
      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
      idNumber VARCHAR(13) NOT NULL,
      name VARCHAR(30) NOT NULL,
      surname VARCHAR(30) NOT NULL,
      telephoneNumber1 VARCHAR(10) NOT NULL,
      telephoneNumber2 VARCHAR(10),
      emailAddress VARCHAR(50),
      male BOOLEAN NOT NULL,
      language VARCHAR(30) NOT NULL,
      dead DATETIME
      )";
    
      // use exec() because no results are returned
      $conn->exec($sql);
      echo "<br>Table clients created successfully";
    } catch(PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    //CLose connection
    $conn = null;
?>