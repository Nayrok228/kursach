<?php
session_start();
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
    $user_surname = $_SESSION["user_surname"];
    $user_email = $_SESSION["user_email"];
    $user_phone = $_SESSION["user_phone"];
    $is_logged_in = true;

    // Получение данных паспорта и резервного номера телефона из базы данных
    $servername = "tv";
    $username = "root";
    $password = "";
    $dbname = "diplom";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Проверка соединения
    if ($conn->connect_error) {
        die("Ошибка подключения к базе данных: " . $conn->connect_error);
    }

    $sql = "SELECT passport, phone FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passport = $row["passport"];
        $phone = $row["phone"];
    } else {
        $passport = "";
        $phone = "";
    }

    $conn->close();
} else {
    $user_id = null;
    $user_name = null;
    $user_surname = null;
    $user_email = null;
    $user_phone = null;
    $is_logged_in = false;
}
// Обработка обновления профиля
if (isset($_POST["passport"]) && isset($_POST["phone"])) {
    $passport = $_POST["passport"];
    $phone = $_POST["phone"];

    // Обновление данных пользователя в базе данных
    $sql = "UPDATE users SET passport='$passport', phone='$phone' WHERE id=$user_id";
    if ($conn->query($sql) === TRUE) {
        echo "Профиль успешно обновлен.";
        // Обновление сохраненных данных в сессии
        $_SESSION["user_passport"] = $passport;
        $_SESSION["user_phone"] = $phone;
    } else {
        echo "Ошибка при обновлении профиля: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarhatLine - Поддержка</title>
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
                    вы подтверждаете, что прочитали и согласны с нашими Условиями Пользования и Политикой Конфиденциальности.
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
        <section>
            <h2>Личный кабинет</h2>
            <?php
            if ($is_logged_in) {
                if (!empty($passport) && !empty($phone)) {
                    // Данные паспорта и резервного номера телефона уже добавлены
                    echo "<p>Имя: " . $user_name . "</p>";
                    echo "<p>Фамилия: " . $user_surname . "</p>";
                    echo "<p>Электронная почта: " . $user_email . "</p>";
                    echo "<p>Номер телефона: " . $user_phone . "</p>";
                    echo "<p>Паспорт: " . $passport . "</p>";
                    echo "<p>Резервный номер телефона: " . $phone . "</p>";
                } else {
                    // Форма для ввода данных паспорта и резервного номера телефона
                    echo "<p>Имя: " . $user_name . "</p>";
                    echo "<p>Фамилия: " . $user_surname . "</p>";
                    echo "<p>Электронная почта: " . $user_email . "</p>";
                    echo "<p>Номер телефона: " . $user_phone . "</p>";

                    echo '<form action="update_profile.php" method="post">
                            <label for="passport">Паспорт:</label>
                            <input type="text" id="passport" name="passport" placeholder="Введите номер паспорта" required><br>
                            <label for="phone">Резервный номер телефона:</label>
                            <input type="text" id="phone" name="phone" placeholder="Введите резервный номер телефона" required><br>
                            <input type="submit" value="Сохранить">
                        </form>';
                }
            } else {
                echo "<p>Вы не авторизованы.</p>";
            }
            ?>
        </section>
    </main>

    <footer>
        &copy; 2023 BarhatTV. Все права защищены.
    </footer>
</body>

</html>