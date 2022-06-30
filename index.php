<?php
    session_start();
    require 'db.php';
    require 'picture_upload.php';
    require 'check_admin.php';
    $query=$pdo->prepare('SELECT * FROM product');
    $query->execute();
    $products=$query->fetchAll();
    if(isset($_GET['search'])){
        $query=$pdo->prepare('SELECT * FROM product WHERE name LIKE :name');
        $text = "%".$_GET['search']."%";
    $query->execute(array(
        "name" => $text 
    ));
    $products=$query->fetchAll();
    }
    if(isset($_POST['delete'])){
        $query=$pdo->prepare('DELETE FROM product WHERE id_product = :id_product');
    $query->execute(array(
        "id_product" => $_POST['delete']
    ));
    header('Location:'.$_SERVER['PHP_SELF']);
    }
    if(isset($_SESSION['id_user'])){
        if(isAdmin($_SESSION['id_user'],$pdo)){
            if(isset($_POST['name'])&isset($_POST['price'])&isset($_FILES['picture'])){
                $can_upload = can_upload($_FILES['picture']);
                if ($can_upload === true){
                    $picture = upload_image($_FILES['picture'], 'pictures');
                    
                    if($_POST["name"]!=""&$_POST["price"]!=""){
    
                        $query=$pdo->prepare('INSERT INTO product (name, price, picture) VALUES (:name, :price, :picture)');
                        $query->execute(
                            array(
                                'name'=> $_POST['name'],
                                'price'=> $_POST['price'],
                                'picture' => $picture
                                )
                            );
                            $_POST=array();
                            header('Location: index.php');
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
    <meta http-equiv="X-UA-Compatible" name="IE=edge">
    <meta name="viewport" name="width=device-width, initial-scale=1.0">
    <title>Интернет-магазин THERO</title>
    <link rel="icon" type="image/gif" href="img\gif\neco-arc-neco.gif">
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
                    <p class="contacts__text">support@thero.ru</p>
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
        <section class="intro">
            <ul class="intro__list">
                <li class="intro__item">
                    <img src="./img/png/ads.png" alt="Реклама">
                </li>
                <li class="intro__item">
                    <img src="./img/png/ads2.png" alt="Реклама">
                </li>
            </ul>
        </section>
        <section class="products">        
            <h2 class="products__name">
                Сейчас популярно
            </h2>
            <ul class="products__list">
            <?php 
            if(isset($_SESSION['id_user'])){
            if(isAdmin($_SESSION['id_user'],$pdo)):?>
            <li class="product__item">
                <form class="new_product-form" method="post" enctype="multipart/form-data">
                    <img src=".\img\png\no-photo.jpg" class="product_img" alt="Изображение">
                    <form action="" >
                        <input class="product_input" type="file" name="picture">
                        <input class="product_input" type="text" placeholder="Название" name="name" id="name">
                        <input class="product_input" type="text" placeholder="Цена" name="price" id="price">
                        <div class="product_footer">
                            <button type="submit">Добавить</button>
                        </div>
                    </form>
            </li>
            <?php endif ;} ?>
        <?php foreach($products as $product){
        if(strlen($product['name'])>500){
        $name = substr($product['name'],0 , 500).'...';
        }
        else{
        $name = substr($product['name'],0 , 500);
        }
        if($product['avalibility']){
        $avalibility = "В наличии";
        }
        else{
            $avalibility = "Нет в наличии";
        }?>
                <li class="product__item">
                    <?php if(!$product['picture']){?>
                        <img src=".\img\png\no-photo.jpg" class="product_img" alt="Изображение">
                    <?php }else{ ?>
                    <img src="pictures/<?=$product["picture"]?>" class="product_img" alt="Изображение">
                    <?php } ?>
                    <p class="product_name"><?=$name?></p>
                    <p class="product_availability"><?=$avalibility?></p>
                    <div class="product_footer">
                        <p class="product_price"><?=$product["price"]?> руб.</p>
                        <button>В корзину</button>
                    </div>
                    <?php
                    if(isset($_SESSION['id_user'])){
                    if(isAdmin($_SESSION['id_user'],$pdo)){?>  
                    <form method="post">
                        <button name="delete" value=<?=$product['id_product']?> class="delete_button">Удалить</button>
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
                <a class="socials__link"><img src="./img/svg/vk_black.svg" alt="Вконтакте" class="socials-ico"></a>
            </li>
            <li class="socials__item">
                <a class="socials__link"><img src="./img/svg/instagram_black.svg" alt="Инстаграмм" class="socials-ico"></a>
            </li>
            <li class="socials__item">
                <a class="socials__link"><img src="./img/svg/telegram_black.svg" alt="Телеграмм" class="socials-ico"></a>
            </li>
        </ul>
    </footer>
</body>

</php>