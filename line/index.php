<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
    $is_logged_in = true;
} else {
    $user_id = null;
    $user_name = null;
    $is_logged_in = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarhatLine - Главная</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="reg.css">
    <link rel="stylesheet" type="text/css" href="author.css">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

<body>
    <header>
        <img src="logo.png" alt="Логотип компании BarhatLine">
        <h1>BarhatLine</h1>
        <nav>
            <ul class="menu">
                <li><a href="index.php">Главная</a></li>
                <li><a href="about.php">О нас</a></li>
                <li><a href="services.php">Тарифы</a></li>
                <li><a href="contacts.php">Поддержка</a></li>
                <?php
                if ($is_logged_in) {
                    echo '<li><a href="profile.php">Личный кабинет</a></li>';
                }
                ?>
            </ul>

            <div class="user-menu">
                <?php
                if ($is_logged_in) {
                    echo '<div id="user-info">
                            <span id="user-name">Привет, ' . $user_name . '!</span>
                            <a href="logout.php" class="login-button">Выйти</a>';
                } else {
                    echo '<button onclick="show(\'block\')" class="regbutton">Регистрация</button>
                          <button onclick="showAuth(\'block\')" class="authbutton">Авторизация</button>';
                }
                ?>
            </div>
        </nav>

        <!--Формы регистрации и авторизации-->
        <!-- Задний прозрачный фон -->
        <div onclick="show('none')" id="gray"></div>
        <div id="window">
            <!-- Картинка крестика -->
            <img class="close" src="close.png" alt="" onclick="show('none')">
            <div class="form">
                <h2>Регистрация</h2>
                <form action="index1.php" name="f1" method="post">
                    <input type="text" placeholder="Имя" name="name1" class="input">
                    <input type="text" placeholder="Фамилия" name="name2" class="input">
                    <input type="email" placeholder="Ваш email" name="email1" class="input">
                    <input type="email" placeholder="Подтвердите email" name="email2" class="input">
                    <input type="password" placeholder="Пароль" name="pass1" class="input">
                    <input type="password" placeholder="Подтвердите пароль" name="pass2" class="input">
                    <input type='tel' placeholder="Мобильный телефон" name="tel" class="input">
                    <input type="submit" value="Регистрация" name="sab" class="input"> Нажимая «Регистрация»,
                    вы подтверждаете, что прочитали и согласны с нашими Условиями Пользования.
                </form>
            </div>
        </div>

        <!--Задний прозрачный фон для авторизации-->
        <div onclick="showAuth('none')" id="grayAuth"></div>
        <div id="windowAuth">
            <!-- Картинка крестика -->
            <img class="close" src="close.png" alt="" onclick="showAuth('none')">
            <div class="form">
                <h2>Авторизация</h2>
                <form action="auth.php" name="f2" method="post">
                    <input type="email" placeholder="Электронная почта" name="email" class="input">
                    <input type="password" placeholder="Пароль" name="pass" class="input">
                    <input type="submit" value="Войти" name="auth" class="input">
                    <input type="button" value="Зарегистрироваться" onclick="showAuth('none'); show('block')" class="input">
                </form>
            </div>
        </div>
    </header>

    <main>
    <h2>BarhatLine - Ваш идеальный провайдер развлечений и телекоммуникаций</h2>
        <p>
            Добро пожаловать на главную страницу компании BarhatLine! Мы являемся ведущим провайдером развлечений и телекоммуникаций, предоставляющим широкий спектр услуг и продуктов, чтобы удовлетворить все ваши потребности в связи и развлечениях.
        </p>
        <h3>Что делает BarhatLine особенным?</h3>
        <ul>
            <li>Богатый выбор тарифов и услуг: Мы предлагаем разнообразные тарифные планы, чтобы каждый клиент мог выбрать оптимальное соотношение цены и качества в соответствии с своими потребностями. Вы можете наслаждаться высокоскоростным интернетом, многочисленными телевизионными каналами, видео по требованию, потоковыми сервисами и многим другим.</li>
            <li>Безупречное качество связи: Мы гарантируем стабильность и надежность наших услуг связи. Будь то интернет, телефония или телевидение, вы можете полностью полагаться на нашу инфраструктуру, обеспечивающую высокую пропускную способность и минимальные сбои.</li>
            <li>Инновационные технологии: Мы постоянно следим за последними технологическими тенденциями и внедряем новшества в наши услуги. Вы сможете наслаждаться передовыми возможностями, такими как умный дом, облачное хранилище данных, видеоконференции и многое другое.</li>
            <li>Поддержка клиентов: Мы ценим каждого клиента и готовы предоставить профессиональную поддержку в любое время. Наша команда экспертов готова ответить на ваши вопросы, решить проблемы и обеспечить положительный опыт использования наших услуг.</li>
            <li>Индивидуальный подход: Мы стремимся понять потребности и предпочтения каждого клиента. Наша гибкая система тарифов позволяет настроить услуги под ваши требования, чтобы вы получали именно то, что нужно.</li>
            <li>Надежность и безопасность: Мы придаем высочайшее значение безопасности ваших данных и личной информации. Наши системы защищены передовыми технологиями, чтобы обеспечить конфиденциальность и сохранность ваших данных.</li>
        </ul>
        <p>
            Присоединяйтесь к BarhatLine и получите надежного партнера в мире связи и развлечений. Интернет, телевидение, телефония и другие услуги станут доступными с нами. Ознакомьтесь с нашими тарифами, свяжитесь с нами для получения дополнительной информации или зарегистрируйтесь прямо сейчас, чтобы начать использовать наши услуги. Добро пожаловать в мир BarhatLine!
        </p>

        <div class="cta">
            <h2>Готовы начать?</h2>
            <p>Выбирайте тариф , который хотите подключить.</p>
            <a href="services.php">Тарифы</a>
        </div>
    </main>

    <footer>
        &copy; 2023 BarhatLine. Все права защищены.
    </footer>
</body>

</html>
