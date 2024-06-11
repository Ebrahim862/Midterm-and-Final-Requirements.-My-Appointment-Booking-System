<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {


    $id = $_POST['id'];
    $idnumber = $_POST['idnumber'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $fulladdress = $_POST['fulladdress'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $civilstatus = $_POST['civilstatus'];
    $gender = $_POST['gender'];
    $appointment_date = $_POST['appointment_date'];
    $appointment = $_POST['appointment'];


    if (!empty($id)) {
        $stmt = $conn->prepare("UPDATE students SET idnumber=?, firstname=?, middlename=?, lastname=?, birthdate=?, fulladdress=?, phonenumber=?, email=?, civilstatus=?, gender=?, appointment_date=?, appointment=? WHERE id = ?");
        $stmt->bind_param("ssssssssssssi", $idnumber, $firstname, $middlename, $lastname, $birthdate, $fulladdress, $phonenumber, $email, $civilstatus, $gender, $appointment_date, $appointment, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO students (idnumber, firstname, middlename, lastname, birthdate, fulladdress, phonenumber, email, civilstatus, gender, appointment_date, appointment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssss", $idnumber, $firstname, $middlename, $lastname, $birthdate, $fulladdress, $phonenumber, $email, $civilstatus, $gender, $appointment_date, $appointment);
    }


    if ($stmt === false || $stmt->errno) {
        echo "Error in prepare statement: " . $conn->error;
        exit();
    }


    if ($stmt->execute()) {

        echo "<p style='font-size: 24px; color: green;'>RECORD SAVED SUCCESSFULLY!</p>";


        header("refresh:2;url={$_SERVER['PHP_SELF']}");
        exit();
    } else {

        echo "Error in execute statement: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request"; 
}

$conn->close();
?>