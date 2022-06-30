<?php
session_start();
require "db.php";
require "check_admin.php";
if (isset($_POST["login"]) && isset($_POST["password"])){
    if ($_POST["login"]!="" && $_POST["password"]!=""){
    
$query = $pdo->prepare('SELECT * FROM users WHERE login = :login');
$query->execute(array(
    "login" => $_POST["login"]
 ));
$user = $query->fetch();;
if($user){
    var_dump($user, $_POST,password_verify($_POST["password"], $user['password']) );

    if (password_verify($_POST["password"], $user['password'])) {
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['login'] = $user['login'];
        $_SESSION['auth'] = true;   
        header('Location: index.php');
    } else {
        echo '<a href="auth.php">fgdfе<a>';
    }
}
else{
    echo '<a href="auth.php">Неправильно введены данные<a>';
}
}
else{
    echo '<a href="auth.php">Неправильно введены данные<a>';
}      
} else {
    echo '<a href="auth.php">Неправильно введены данные<a>';
}
