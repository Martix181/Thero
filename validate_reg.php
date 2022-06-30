<?php
session_start();
require "db.php";
if (isset($_POST["login"])&isset($_POST["email"])&isset($_POST["password"])&isset($_POST["repeat_password"])){
if ($_POST["login"]!=""&$_POST["email"]!=""&$_POST["password"]!=""&$_POST["repeat_password"]!=""){
$query = $pdo->prepare('SELECT * FROM users WHERE login = :login');
$query->execute(array(
    "login" => $_POST["login"]
 ));
$check_exists = $query->fetch();
 if(!$check_exists){
    if ($_POST["password"] == $_POST["repeat_password"]){
        
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $query = $pdo->prepare('INSERT INTO users (login, email, password) VALUES (:login, :email, :password)');
    $query->execute(array(
        "login" => $_POST["login"],
        "email" => $_POST["email"],
        "password" => $password
    ));
    header('Location: auth.php');
    }  
    else{
    header('Location: reg.php');
    }
} 
else{
    header('Location: reg.php');
}  
}
else{
    header('Location: reg.php');
}
}
else{
    header('Location: reg.php');
}      
