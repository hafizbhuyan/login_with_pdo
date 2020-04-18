<?php

session_start();

require 'pdo-connect.php';

if (isset($_POST['sign-up-user'])) {
    // Get the values from the registration form
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $password = !empty($_POST['password']) ? trim($_POST['password']) : null;

    // Construct and prepare the SQL statement
    $sql = "SELECT COUNT(email) AS num FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    // Bind the provided username to the prepared statement
    $stmt->bindValue(':email', $email);

    // Execute
    $stmt->execute();

    // Fetch the row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row['num'] > 0) {
        $_SESSION["error_msg"] = "That email already exists.";
        exit;
        header('location: login-register.php');
    }

    $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

    // Prepare the INSERT statement
    $sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
    $stmt = $pdo->prepare($sql);

    // Bind variables
    $stmt->bindValue(':email', $email);
    $stmt->bindValue(':password', $passwordHash);

    // Execute the statement and insert the new account
    $result = $stmt->execute();

    // If the registration process is successful
    if ($result) {
        header('location: homepage.html');
    }
}

?>