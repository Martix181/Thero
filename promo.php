<?php
    session_start();
    require 'db.php';
    require 'picture_upload.php';
    require 'check_admin.php';
    $query=$pdo->prepare('SELECT * FROM promo');
    $query->execute();
    $promos=$query->fetchAll();
    if(isset($_POST['delete'])){
        $query=$pdo->prepare('DELETE FROM promo WHERE id_promo = :id_promo');
    $query->execute(array(
        "id_promo" => $_POST['delete']
    ));
    header('Location:'.$_SERVER['PHP_SELF']);
    }
    if(isset($_SESSION['id_user'])){
        if(isAdmin($_SESSION['id_user'],$pdo)){
            if(isset($_POST['name'])&isset($_POST['date'])&isset($_FILES['picture'])){
                $can_upload = can_upload($_FILES['picture']);
                if ($can_upload === true){
                    $picture = upload_image($_FILES['picture'], 'pictures');
                    
                    if($_POST["name"]!=""&$_POST["date"]!=""){
    
                        $query=$pdo->prepare('INSERT INTO promo (name, date, picture) VALUES (:name, :date, :picture)');
                        $query->execute(
                            array(
                                'name'=> $_POST['name'],
                                'date'=> $_POST['date'],
                                'picture' => $picture
                                )
                            );
                            $_POST=array();
                            header('Location: promo.php');
                        }
                } else {
                    echo $can_upload;
                }
    }
    }
    }
?>
<!DOCTYPE php>
<php lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Акции THERO</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <header class="header">
        <div class="header__top">

            <ul class="contacts__list">
                <li class="contacts__item">

                    <img src="./img/svg/phone-call.svg" alt="Телефон" class="contacts-ico">
                    <p class="contacts__text">12-34</p>
                </li>
                <li class="contacts__item">
                    <img src="./img/svg/phone-call.svg" alt="Телефон" class="contacts-ico">
                    <p class="contacts__text">8(888)555-14-88</p>
                </li>
                <li class="contacts__item">

                    <img src="./img/svg/email.svg" alt="Почта" class="contacts-ico">
                    <p class="contacts__text">support@zentech.ru</p>
                </li>
            </ul>

            <ul class="socials__list">
                <li class="socials__item">
                    <a href="" class="socials__link"><img src="./img/svg/vk_logo.svg" alt="Вконтакте" class="socials-ico"></a>
                </li>
                <li class="socials__item">
                    <a href="" class="socials__link"><img src="./img/svg/instagram.svg" alt="Инстаграм" class="socials-ico"></a>
                </li>
                <li class="socials__item">
                    <a href="" class="socials__link"><img src="./img/svg/telegram.svg" alt="Телеграмм" class="socials-ico"></a>
                </li>
            </ul>

        </div>
        <nav class="header__bottom">
            <a href="index.php" class="logo__link">
                <p class="logo">THERO</p>
            </a>
            <form class="search" method="get" action="./index.php">
                <input name="search" type="text" class="input" placeholder="Название, производитель, штрих-код или действ. вещество...">
            </form>
            <ul class="header__nav-list">
                <li class="header__nav-item"><a href="./index.php" class="header__nav-link">Главная</a></li>
                <li class="header__nav-item"><a href="./promo.php" class="header__nav-link">Акции</a></li>
                <li class="header__nav-item"><a href="./aboutus.php" class="header__nav-link">О нас</a></li>
                <li class="header__nav-item"><a href="" class="header__nav-link">Корзина</a></li>
                <?php
                if(isset($_SESSION['id_user'])):?>
                <li class="header__nav-item"><a href="./exit.php" class="header__nav-link"><?=$_SESSION["login"]?>/Выйти</a></li>
                <?php else:?>
                <li class="header__nav-item"><a href="./auth.php" class="header__nav-link">Войти</a></li>
                <?php endif;?>
                </ul>
        </nav>
    </header>

    <main class="main">
        <section class="promos">
            <ul class="promo__list">
            <?php
            if(isset($_SESSION['id_user'])){
            if(isAdmin($_SESSION['id_user'],$pdo)){?>   
            <li class="promo__item">
                <form class="new_product-form" action="" method="post" enctype="multipart/form-data">
                    <img src=".\img\png\no-photo.jpg" class="product_img" alt="Изображение">
                    <form action="">
                        <input class="product_input" type="file" name="picture">
                        <input class="product_input" type="text" placeholder="Заголовок" name="name" id="name">
                        <input class="product_input" type="text" placeholder="Дата" name="date" id="date">
                        <div class="product_footer">
                            <button type="submit">Добавить</button>
                        </div>
                    </form>
            </li>
            <?php }} ?>
            <?php foreach($promos as $promo){
        if(strlen($promo['name'])>500){
        $name = substr($promo['name'],0 , 500).'...';
        }
        else{
        $name = substr($promo['name'],0 , 500);
        }?>
                <li class="promo__item">
                    <img src="pictures/<?=$promo["picture"]?>" alt="Изображение">
                    <p class="promo_name"><?=$name?></p>
                    <p class="promo_date"><?=$promo["date"]?></p>
                    <?php
                    if(isset($_SESSION['id_user'])){
                    if(isAdmin($_SESSION['id_user'],$pdo)){?>   
                    <form method="post">
                        <button name="delete" value=<?=$promo['id_promo']?> class="delete_button">Удалить</button>
                    </form>
                    <?php }} ?>
                </li>
                <?php }?>
            </ul>
        </section>
    </main>

    <footer class="footer">
        <ul class="contacts__list_footer">
            <li class="contacts__item">

                <img src="./img/svg/phone-call_black.svg" alt="Телефон" class="contacts-ico">
                <p class="contacts__text">12-34</p>
            </li>
            <li class="contacts__item">
                <img src="./img/svg/phone-call_black.svg" alt="Телефон" class="contacts-ico">
                <p class="contacts__text">8(888)555-14-88</p>
            </li>
            <li class="contacts__item">

                <img src="./img/svg/email_black.svg" alt="Почта" class="contacts-ico">
                <p class="contacts__text">support@thero.ru</p>
            </li>
        </ul>
        <ul class="socials__list">
            <li class="socials__item">
                <p class="socials__link"><img src="./img/svg/vk_black.svg" alt="Вконтакте" class="socials-ico"></p>
            </li>
            <li class="socials__item">
                <p class="socials__link"><img src="./img/svg/instagram_black.svg" alt="Инстаграмм" class="socials-ico"></p>
            </li>
            <li class="socials__item">
                <p class="socials__link"><img src="./img/svg/telegram_black.svg" alt="Телеграмм" class="socials-ico"></p>
            </li>
        </ul>
    </footer>
</body>

</php>