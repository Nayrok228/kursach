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
// Check if the connect button is clicked
if (isset($_POST['connect'])) {
    if ($is_logged_in) {
        header("Location: pay.php"); // Redirect to the pay.php page
        exit();
    } else {
        echo '<script>
        function showConfirmationDialog() {
            alert("Для подключения необходимо авторизоваться!");
            }
        </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarhatLine - Тарифы</title>
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
        <section class="services-section">
            <h2>Тарифы</h2>
            <div class="service">
                <h3>Тариф «Базовый»</h3>
                <p>Звонки: 300 минут</p>
                <p>Интернет: 15 Гб</p>
                <p>SMS: 300 sms</p>
                <p>Цена: 450 руб./месяц</p>
                <form method="post">
                <button class="service-button" type="submit" name="connect" onclick="<?php echo ($is_logged_in ? 'window.location.href = \'pay.php\'' : 'showConfirmationDialog()'); ?>">Подключить</button>
                </form>
            </div>
            <div class="service">
                <h3>Тариф «Стандартный»</h3>
                <p>Звонки: 600 минут</p>
                <p>Интернет: 30 Гб</p>
                <p>SMS: 600 sms</p>
                <p>Цена: 750 руб./месяц</p>
                <form method="post">
                <button class="service-button" type="submit" name="connect" onclick="<?php echo ($is_logged_in ? 'window.location.href = \'pay.php\'' : 'showConfirmationDialog()'); ?>">Подключить</button>
                </form>
            </div>
            <div class="service">
                <h3>Тариф «Премиум»</h3>
                <p>Звонки: безлимит</p>
                <p>Интернет: 50 Гб</p>
                <p>SMS: 1000 sms</p>
                <p>Цена: 1200 руб./месяц</p>
                <form method="post">
                <button class="service-button" type="submit" name="connect" onclick="<?php echo ($is_logged_in ? 'window.location.href = \'pay.php\'' : 'showConfirmationDialog()'); ?>">Подключить</button>
                </form>
            </div>
            <div class="service">
                <h3>Тариф «Корпоративный»</h3>
                <p>Звонки: индивидуальный пакет услуг</p>
                <p>Интернет: индивидуальный пакет услуг</p>
                <p>SMS: индивидуальный пакет услуг</p>
                <p>Цена: Уточняйте у нашего менеджера</p>
                <form method="post">
                <button class="service-button" type="submit" name="connect" onclick="<?php echo ($is_logged_in ? 'window.location.href = \'pay.php\'' : 'showConfirmationDialog()'); ?>">Подключить</button>
                </form>
            </div>
        </section>
    </main>

    <footer>
        &copy; 2023 BarhatLine. Все права защищены.
    </footer>

</body>
</html>