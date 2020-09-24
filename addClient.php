<?php
    //ID
    if (!empty($_GET['id'])) {
        $id = trim($_GET['id']);
    } else {
        echo "<br>ID is required";
    }

    //ID number
    if (!empty($_GET['idnumber'])) {
        $idNumber = trim($_GET['idnumber']);
    } else {
        echo "<br>ID Number is required";
    }

    //name
    if (!empty($_GET['name'])) {
        $name = trim($_GET['name']);
    } else {
        echo "<br>Name is required";
    }

    //Surname
    if (!empty($_GET['surname'])) {
        $surname = trim($_GET['surname']);
    } else {
        echo "<br>Surname is required";
    }

    //TelephoneNumber1
    if (!empty($_GET['telephonenumber1'])) {
        $telephoneNumber1 = trim($_GET['telephonenumber1']);
    } else {
        echo "<br>TelephoneNumber1 is required";
    }

    //TelephoneNumber2
    if (!empty($_GET['telephonenumber2'])) {
        $telephoneNumber2 = trim($_GET['telephonenumber2']);
    } else {
        $telephoneNumber2 = NULL;
    }

    //EmailAddress
    if (!empty($_GET['emailaddress'])) {
        $emailAddress = trim($_GET['emailaddress']);
    } else {
        echo "<br>EmailAddress is required";
    }

    //Male
    if (!empty($_GET['male'])) {
        $male = strtolower(trim($_GET['male']));
        if ($male == "yes") {
            $male = 1;
        } else {
            $male = 0;
        }
    } else {
        echo "<br>Male is required";
    }

    //language
    if (!empty($_GET['language'])) {
        $language = strtolower(trim($_GET['language']));
    } else {
        echo "<br>Language is required";
    }

    //Dead
    if (!empty($_GET['dead'])) {
        $dead = (trim($_GET['dead']));
        // $dead = date_create_from_format('y/m/d', $dead);
    } else {
        $dead = NULL;
    }

    //Require Database details once for security
    require_once 'SQL/dbconnect.php';
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<br>Connected To Database successfully"; 
    }
    catch(PDOException $e) {
        echo "<br>ERROR Conecting to Database";
    }

    //Check if all required fields are there and then proceed with Query
    if (!empty($id) && !empty($idNumber) && !empty($name) && !empty($surname) && !empty($telephoneNumber1) && !empty($emailAddress) && !empty($male) && !empty($language)) {
        try {
          $stmt = $conn->prepare("INSERT INTO clients (id, idNumber, name, surname, telephoneNumber1, telephoneNumber2, emailAddress, male, language, dead) 
          VALUES (:a1, :b1, :c1, :d1, :e1, :f1, :g1, :h1, :i1, :j1)" ); 
          //Build Data safely for the query
          $stmt->execute([":a1" => $id, ":b1" => $idNumber, ":c1" => $name, ":d1" => $surname, ":e1" => $telephoneNumber1, ":f1" => $telephoneNumber2, ":g1" => $emailAddress, ":h1" => $male, ":i1" => $language, ":j1" => $dead]);
          // set the PDO error mode to exception
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
        } catch(PDOException $e) {
          echo "<br>" . $e->getMessage();
        }
    } else {
        echo "<br>Empty Fields";
    }

?>