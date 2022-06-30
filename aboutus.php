<?php
    session_start();
    require 'db.php';
    require 'check_admin.php';
?>
<!DOCTYPE php>
<php lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Что такое THERO?</title>
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
            <a href="index.php" class="logo">THERO</a>
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
        <section class="description">
            <p class="description_text">Ключевая ценность нашей компании — это забота о вашем здоровье. Мы не продвигаем дорогие лекарства и всегда готовы объяснить преимущества и недостатки оригинальных препаратов и дженериков, а также разных товаров с одинаковым действующим веществом.
                Для нас важно правильно сориентировать вас в широком спектре современных фармпрепаратов и способов поддержания здоровья с учетом ваших запросов и возможностей.<br><br>Культура профилактики заболеваний, возможно, пока что не так сильно
                развита в нашей стране. Однако мы прикладываем все усилия, чтобы в первую очередь концентрироваться на предупреждении болезней и пропагандируем этот подход как наиболее рациональный и здоровый метод сохранения телесного и психического
                благополучия.
            </p>
            <img src="./img/png/description_img.png" alt="Фото аптеки" class="description_img">
        </section>
        <section class="adress">
            <p class="adress_heading">Наш адрес: 142300, Россия, Московская область, Чехов, Симферопольское шоссе, 8А</p>
            <p>Чтобы попасть к нам с помощью общественного транспорта, следуйте подсказкам:<br>· С остановки Завод Хроматограф идите в обратном направлении, первый вход в промзону справа, идите по прямой до нефтяных резервуаров. Там вы увидите вывеску.<br>·
                С остановки Монтажный завод идете вдоль лесополосы, входите в промзону, идёте прямо, после охладительных прудов поворачиваете направо, далее будут видны нефтяные резервуары, около них будет видная вывеска.</p>
        </section>
        <section class="map">
            <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/10761/chehov/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Чехов</a><a href="https://yandex.ru/maps/10761/chehov/house/simferopolskoye_shosse_8a/Z04YcgFiS0YBQFtvfX13d31jYA==/?ll=37.463778%2C55.166220&utm_medium=mapframe&utm_source=maps&z=17.6"
                    style="color:#eee;font-size:12px;position:absolute;top:14px;">Симферопольское шоссе, 8А — Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/-/CCUJRIHqWA" width="1200" height="450" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
        </section>
        <p class="schedule_text">График работы: КРУГЛОСУТОЧНО</p>
    </main>

    <footer class="footer_aboutus">
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
                <p class="contacts__text">support@zentech.ru</p>
            </li>
        </ul>
        <ul class="socials__list">
            <li class="socials__item">
                <a href="" class="socials__link"><img src="./img/svg/vk_black.svg" alt="Вконтакте" class="socials-ico"></a>
            </li>
            <li class="socials__item">
                <a href="" class="socials__link"><img src="./img/svg/instagram_black.svg" alt="Инстаграмм" class="socials-ico"></a>
            </li>
            <li class="socials__item">
                <a href="" class="socials__link"><img src="./img/svg/telegram_black.svg" alt="Телеграмм" class="socials-ico"></a>
            </li>
        </ul>
    </footer>
</body>

</php>