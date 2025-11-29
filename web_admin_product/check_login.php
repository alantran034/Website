<?php
session_start();

if(isset($_SESSION['user_id']) && isset($_SESSION['username'])){
    echo json_encode([
        "status" => 1,
        "logged_in" => true,
        "username" => $_SESSION['username']
    ]);
} else {
    echo json_encode([
        "status" => 0,
        "logged_in" => false
    ]);
}
?>
