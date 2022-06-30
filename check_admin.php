<?php
    function isAdmin($id_user, $pdo){
    $query=$pdo->prepare('SELECT * FROM admins WHERE id_user = :id_user');
    $query->execute(array('id_user'=> $_SESSION['id_user']));
    $user=$query->fetch();
    if ($user){
        return true;
    }
    else{
        return false;
    }
    }
?>