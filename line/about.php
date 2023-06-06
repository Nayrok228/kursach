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
    <title>BarhatLine - О Нас</title>
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
        <h2>О нас</h2>
        <p>
            Добро пожаловать на страницу "О нас" компании BarhatLine! Мы рады представить вам нашу компанию и поделиться информацией о нашей миссии, ценностях и достижениях.
        </p>
        <h3>Наша миссия</h3>
        <p>
            Мы стремимся обеспечить высококачественные и инновационные услуги связи и развлечений, которые улучшают жизнь наших клиентов. Наша цель - предоставить надежные и передовые технологии, которые делают связь и развлечения доступными и удовлетворяют разнообразные потребности наших клиентов.
        </p>
        <h3>Наши ценности</h3>
        <ul>
            <li>Качество и надежность: Мы стремимся к высочайшему качеству услуг и обеспечиваем надежность во всем, что мы делаем. Наша инфраструктура и технологии соответствуют самым высоким стандартам, чтобы обеспечить бесперебойную связь и высокую производительность.</li>
            <li>Инновации и развитие: Мы следим за новейшими технологическими тенденциями и постоянно внедряем инновации в наши услуги. Мы стремимся быть лидерами в отрасли, предлагая передовые решения и новые возможности для наших клиентов.</li>
            <li>Клиентоориентированность: Мы ценим каждого клиента и стараемся предоставить ему индивидуальный подход и высокий уровень обслуживания. Мы слушаем и понимаем потребности наших клиентов, чтобы предложить решения, соответствующие их ожиданиям.</li>
            <li>Профессионализм и этика: Мы работаем с высококвалифицированными сотрудниками, которые отличаются профессионализмом и этичностью. Мы стремимся поддерживать прозрачные и доверительные отношения со всеми нашими партнерами и клиентами.</li>
            <li>Социальная ответственность: Мы придаем важность социальной ответственности и вкладываемся в развитие и поддержку нашего сообщества. Мы поддерживаем благотворительные программы и инициативы, способствующие социальному прогрессу и благополучию общества.</li>
        </ul>
        <h3>Наши достижения</h3>
        <p>
            За годы нашей деятельности мы достигли ряда значимых результатов и признания в отрасли. Мы гордимся тем, что:
        </p>
        <ul>
            <li>Становились лидерами рынка связи и развлечений, предлагая высококачественные услуги и инновационные решения.</li>
            <li>Получали награды и признание от экспертов и клиентов за нашу надежность, качество и клиентоориентированность.</li>
            <li>Устанавливали новые стандарты в отрасли и внедряли передовые технологии, которые делают нас лидерами инноваций.</li>
            <li>Развивали партнерские отношения с ведущими компаниями и брендами, чтобы предоставлять нашим клиентам широкий спектр услуг.</li>
        </ul>
        <p>
            Мы продолжаем стремиться к новым высотам и идем в ногу с развитием технологий и потребностей наших клиентов. Мы гордимся тем, что являемся вашим надежным провайдером развлечений и телекоммуникаций, и с нетерпением ждем возможности служить вам.
        </p>
    </main>

    <footer>
        &copy; 2023 BarhatLine. Все права защищены.
    </footer>

</body>
</html>