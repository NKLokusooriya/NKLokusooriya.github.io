<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'user' && $password === 'user1234') {
        header('Location: show.php'); 
        exit;
    }
    else{
        echo 'Invalied Log in. Please Try again.';
    }
}
?>