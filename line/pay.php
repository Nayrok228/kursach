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

// Проверяем, была ли отправлена форма оплаты
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["phone"])) {
    // Получаем данные из формы
    $username = $_POST["username"];
    $phone = $_POST["phone"];

    // Здесь можно добавить код для сохранения данных в базу данных или выполнения других операций

    // Показываем сообщение об успешной заявке
    $success_message = "Заявка успешно создана! С вами скоро свяжутся для уточнения и подтверждения.";

    // Можно также перенаправить пользователя на другую страницу после создания заявки
    // header("Location: success.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarhatLine - Страница оплаты тарифов</title>
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
    <section class="payment-section">
    <div class="payment-icon-container">
    <img src="pay.png" alt="Иконка оплаты" class="payment-icon">
  </div>
  <div class="payment-content">
    <h2>Создание заявки на подключение тарифа BarhatLine</h2>
    <p>Для создания заявки для подключения тарифа, введите номер телефона:</p>

      <?php
      if (!empty($user_name)) {
          // Если пользователь авторизован, отображаем его имя в скрытом поле формы
          echo '<form class="payment-form" method="POST" action="">
                  <input type="hidden" name="username" value="' . $user_name . '">
                  <input type="tel" name="phone" placeholder="Номер телефона" class="input">
                  <button type="submit" class="pay-button">Оплатить</button>
                </form>';

          // Показываем сообщение об успешной заявке, если оно есть
          if (isset($success_message)) {
              echo '<p class="success-message">' . $success_message . '</p>';
          }
      } else {
          // Если пользователь не авторизован, отображаем сообщение об ошибке
          echo '<p>Ошибка: Пользователь не авторизован.</p>';
      }
      ?>
    </section>
  </main>

  <footer>
    &copy; 2023 BarhatLine. Все права защищены.
  </footer>
</body>
</html>
