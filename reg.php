<!DOCTYPE php>
<php lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в учетную запись</title>
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
                <li class="header__nav-item"><a href="./auth.php" class="header__nav-link">Вход</a></li>
            </ul>
        </nav>
    </header>

    <main class="main">
        <section class="auth">
            <section class="auth_block">
                <p class="auth_header">Регистрация</p>
                <form action="./validate_reg.php" class="authorization_form" method="post">
                    <input type="text" class="auth_input" id="login" name="login" placeholder="Логин" required>
                    <input type="email" class="auth_input" id="email" name="email" placeholder="Эл.почта" required>
                    <input type="password" class="auth_input" id="password" name="password" placeholder="Пароль" required>
                    <input type="password" class="auth_input" id="repeat_password" name="repeat_password" placeholder="Повторите пароль" required>
                    <button type="submit">Зарегистрироваться</button>
                    <a href="./auth.php" class="header__nav-link">Уже есть аккаунт?</a>
                </form>
            </section>
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