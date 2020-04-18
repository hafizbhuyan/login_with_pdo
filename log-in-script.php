<?php

session_start();

require 'pdo-connect.php';

if (isset($_POST['log-in-user'])) {
    // Get the values from the login form
    $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    // Get the user account info for the given email
    $sql = "SELECT id, email, password FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);

    // Bind value
    $stmt->bindValue(':email', $email);

    // Execute
    $stmt->execute();

    // Fetch row
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // if $row is FALSE
    if ($user === false) {
        $_SESSION["error_msg"] = "Incorrect email or password.";
        header('location: sign-in.php');
        exit();
    } else {
        // User account found. Check to see if the given password
        // matches the password hash stored in users table
        $validPassword = password_verify($passwordAttempt, $user['password']);

        // if $validPassword is TRUE, login is successful
        if ($validPassword) {

            // Provide the user with a login session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();

            header('location: homepage.html');
            exit;
        } else {
            $_SESSION["error_msg"] = "Incorrect email or password.";
            header('location: sign-in.php');
            exit();
        }
    }
}

?>