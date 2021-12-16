<?php

require_once 'php/config/connect.php';

// Начинаем сессию
session_start([
  // Stay logged in for an hour
  'cookie_lifetime' => 3600,
]);

?>
<!DOCTYPE html>
<html lang='<?= $_COOKIE['language'] ?>'>

<head>
  <meta charset="UTF-8" />
  <title>8store.ua</title>

  <!-- CSS: -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css  " />
  <link rel="shortcut icon" href="./images/icon/WebIcon.ico" type="image/x-icon">

  <link rel="stylesheet" type="text/css" href="jQuery/jquery-ui.css">
  <link rel="stylesheet" href="styles/styles.css" />
  <!-- CSS for Flags: -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/css/flag-icons.min.css" integrity="sha512-UwbBNAFoECXUPeDhlKR3zzWU3j8ddKIQQsDOsKhXQGdiB5i3IHEXr9kXx82+gaHigbNKbTDp3VY/G6gZqva6ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  <!-- У меня это не работает: -->
  <!-- <script src="jQuery/external/jquery/jquery.js"></script>
  <script src="jQuery/jquery-ui.js"></script>
  <script src="script/main.js"></script> -->


  <!-- Scripts: -->
  <script src="script/languages/en.js"></script>
  <script src="script/languages/ru.js"></script>
  <script src="script/languages/uk.js"></script>

  <script src="script/lang.js"></script>
  <!-- ----- -->
</head>




<!-- 
В этом файле текст, вписанный в теги,
будет отображаться на странице те миллисекунды, пока подгружаются переводы.
(или если перевода данного кусочка просто нет)

(То есть этот текст будет заменён на выбранный пользователем язык.)

Переводы находятся в файлах в папке script/languages/

Чтобы что-то перевести, нужно
- в этом документе добавить id="..." элементу, внутри которого будет текст 
(и только текст! всё остальное внутри этого элемента сотрётся!)
- прописать этот id в файлах папки script/languages/
-->

<body>
  <?php include 'php/store/includes/choose-lang.php' ?>

  <h1 id="greeting">Hello</h1>

  <div class="container">
    <img src="images/mainbg.png" id="main-image" />
  </div>


  <!-- Регистрация и Авторизация -->
  <section class="regaut" id="regaut">

    <!-- Дальше этого момента я не переводил -->
    <!--  -->
    <!--  -->
    <!--  -->






    <div class="container">
      <?php

      // if NOT :
      if (!(
        (isset($_COOKIE['secret_user_cookie'])) and
        (isset($_SESSION['secret_user_cookie'])) and
        ($_COOKIE['secret_user_cookie'] == $_SESSION['secret_user_cookie'])
      )) {

        // Then we are NOT logged in!

      ?>
        <h2>Registration and Authorization</h2>

        <div class="row">
          <div class="col">
            <h3>Registration:</h3> <br>
            <form action="php/regaut/reg.php" method="post">
              <p>Имя</p>
              <input type="text" name="name" id="name" placeholder="введите Ваше имя" autocomplete="off"><br><br>

              <p>Фамилия</p>
              <input type="text" name="surname" id="surname" placeholder="введите Вашу фамилию" autocomplete="off"><br><br>

              <p>*Логин</p>
              <input type="text" name="login" class="login" placeholder="придумайте логин" autocomplete="off" required><br><br>

              <p>*Пароль</p>
              <input type="password" name="password" placeholder="придумайте пароль" autocomplete="off" class="psw-input" id="set-psw" required><br><br>

              <!-- A checkbox to toggle between password visibility -->
              <div>
                <input type="checkbox" onclick="togglePswVisibl('set-psw')" id="set-passw-chkbx">
                <label for="set-passw-chkbx">Show Password</label>
              </div>

              <input type="submit" class="button" value="Регистрация"></input>

            </form>

            <!-- Feedback after trying to register -->
            <?php
            if (isset($_GET['registered'])) {
              if ($_GET['registered'] == 'success') {
                echo '<h2>You have been SUCCESSFULLY Registered!</h2>';
              } else {
                echo '<p>You were NOT Registered!</p>';
                echo "<p><b>MySQL Error:</b> "
                  . str_replace('|', ' ', $_GET['error'])
                  . "</p>";
              }
            }
            ?>
          </div>


          <div class="col">
            <h3>Authorization:</h3> <br>
            <form action="php/regaut/aut.php" method="post">
              <p>*Логин</p>
              <input type="text" name="login" class="login" placeholder="Ваш логин" autocomplete="off" required>

              <p>*Пароль</p>
              <input type="password" name="password" placeholder="Ваш пароль" autocomplete="off" class="psw-input" id="enter-psw" required><br><br>

              <!-- A checkbox to toggle between password visibility -->
              <div>
                <input type="checkbox" onclick="togglePswVisibl('enter-psw')" id="entr-passw-chkbx">
                <label for="entr-passw-chkbx">Show Password</label>
              </div>

              <input type="submit" class="button" value="Авторизация"></input>
            </form>



            <!-- Скрывать / показывать пароль -->
            <script>
              function togglePswVisibl(id) {
                let psw = document.getElementById(id);
                if (psw.type === "password") {
                  psw.type = "text";
                } else {
                  psw.type = "password";
                }
              }
            </script>

            <!-- Проверка на неверно введённые логин и пароль -->
            <?php
            if (isset($_GET['login-attempt']) and $_GET['login-attempt'] == 'failed') {
              echo "<h3 style=\"color:pink\">Пользователь не найден! Неверный логин или пароль. Попробуйте ещё раз.</h3>";
            } ?>
          </div>
        <?php
      } else {


        // ELSE..



        // We are LOGGED IN !




        // Welcome user
        echo "<h2> <span id=\"logged_in_welcome\"> Добро пожаловать, </span>";

        // User name CAN BE NULL:        
        if (!(isset($_COOKIE['user'])) or !$_COOKIE['user']) {
          // Пользователь не задал своего имени
          echo "<span id=\"logged_in_user\">  дорогой пользователь  <span>";
        } else {
          // У пользователя задано имя
          echo $_COOKIE['user'];
        }
        echo "!!! </h2>"; // the closing tag
        ?>

        

          <div class="row">
            <div class="col">
              <!-- Check if the user is admin: -->

              <?php
              if ($_SESSION["user_is_admin"] == '1') { ?>
                <h2> You are the admin! </h2>

                <!-- Admin panel link: -->
                <a href="php/store/admin/admin-panel.php" class="button">
                  Manage products
                </a>

                <!-- Просмотреть таблицу всех зарегистрированных пользователей -->
                <p>
                  <a href="php/DATA/data.php" class="button">
                    <span id="check-user-data">Проверить данные пользователей</span>
                  </a>
                </p>
              <?php
              }
              ?>
            </div>

            <div class="col">
              <!-- 
            Logged-in users can authorise to another account immediately
            (without the need to manually logging out) 
            -->
              <h3>Quick Authorization:</h3> <br>
              <form action="php/regaut/aut.php" method="post">
                <p>*Логин</p>
                <input type="text" name="login" class="login" placeholder="Ваш логин" autocomplete="off" required value="<?= $_SESSION['last_entered_login'] ?>">

                <p>*Пароль</p>
                <input type="password" name="password" placeholder="Ваш пароль" autocomplete="off" class="psw-input" id="enter-psw" required value="<?= $_SESSION['last_entered_password'] ?>"><br><br>

                <!-- A checkbox to toggle between password visibility -->
                <div>
                  <input type="checkbox" onclick="togglePswVisibl('enter-psw')" id="entr-passw-chkbx">
                  <label for="entr-passw-chkbx">Show Password</label>
                </div>

                <!-- Скрывать / показывать пароль -->
                <script>
                  function togglePswVisibl(id) {
                    let psw = document.getElementById(id);
                    if (psw.type === "password") {
                      psw.type = "text";
                    } else {
                      psw.type = "password";
                    }
                  }
                </script>

                <input type="submit" class="button" value="Авторизация"></input>
              </form>

              <!-- Log out button -->
              <a href="php/regaut/exit.php" class="button"> Log out <a>
            </div>


            <!--End of the LOGGED IN Part -->
          <?php } ?>

          </div>
  </section>



  <!-- Categories of products -->
  <section class="categories">

    <div class="container">
      <h2>Categories</h2>
      <div class="row" style="display: flex; justify-content: space-between; margin: 100px 0;">

        <div class="categories-item">
          <a href="php/store/choose-goods.php?category=monitor">
            <div class="categories-item__content">
              <div class="categories-item__content-name">Monitors</div>
              <div class="categories-item__content-arrow">
                <img src="images/arrow-right.svg" alt="">
              </div>
            </div>
            <div class="categories-item__monitor">
              <img src="images/monitor.png" alt="">
            </div>
          </a>
        </div>

        <div class="categories-item">
          <a href="php/store/choose-goods.php?category=motherboard">
            <div class="categories-item__content">
              <div class="categories-item__content-name">Motherboards</div>
              <div class="categories-item__content-arrow">
                <img src="images/arrow-right.svg" alt="">
              </div>
            </div>
            <div class="categories-item__motherboard">
              <img src="images/Motherboard.png" alt="">
            </div>
          </a>
        </div>

        <div class="categories-item">
          <a href="php/store/choose-goods.php?category=component">
            <div class="categories-item__content">
              <div class="categories-item__content-name">Components</div>
              <div class="categories-item__content-arrow">
                <img src="images/arrow-right.svg" alt="">
              </div>
            </div>
            <div class="categories-item__components">
              <img src="images/Components.png" alt="">
            </div>
          </a>
        </div>

        <div class="categories-item">
          <a href="php/store/choose-goods.php?category=laptop">
            <div class="categories-item__content">
              <div class="categories-item__content-name">Laptops</div>
              <div class="categories-item__content-arrow">
                <img src="images/arrow-right.svg" alt="">
              </div>
            </div>
            <div class="categories-item__laptop">
              <img src="images/laptop.png" alt="">
            </div>
          </a>
        </div>

        <div class="categories-item">
          <a href="php/store/choose-goods.php?category=desktop">
            <div class="categories-item__content">
              <div class="categories-item__content-name">
                Desktop-PC
              </div>
              <div class="categories-item__content-arrow">
                <img src="images/arrow-right.svg" alt="">
              </div>
            </div>
            <div class="categories-item__pc">
              <img src="images/Desktop-PC.png" alt="">
            </div>
          </a>
        </div>

  </section>

  <section class="items">
  </section>






  <!-- Footer -->
  <br><br>
  <hr>
  <br><br>
  <p>
    <label for="amount">Price range:</label>
    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
  </p>

  <div id="slider-range"></div>

  <div id="price-slider"> </div>

  <h2>Have any questions?</h2>
  <h2>Fill the form and we will call you back!</h2>
  <form action="php/call-me-back.php" method="post">
    <fieldset>
      <div>
        <label for="firstname">Name</label>
        <input id="firstname" name="firstname" title="Please provide your name.">
      </div>
      <div>
        <label for="lastname">Surname</label>
        <input id="lastname" name="lastname" title="Please provide also your surname.">
      </div>
      <div>
        <label for="address">Phone number</label>
        <input id="address" name="address" title="Your phone number to call you.">
      </div>
      <button>Call me back!</button>
    </fieldset>
  </form>

  <div id="faq">
    <div id="accordion">
      <h3>About us</h3>
      <div>
        <p>
          8store.ua - is a new player in the electronics market.</p>
        <p>
          Our online store is designed to sell electronics for every taste and color. The range includes
          everything for a gamer, student or ordinary office worker. A large selection of components for
          computers, a wide range of laptops. And most importantly - all this at a low price. We are here for
          you!
        </p>
      </div>
      <h3>Payment</h3>
      <div>
        <p>
          For your convenience, we offer various payment methods:
        <ul>
          <li>- in cash upon receipt of the goods;</li>
          <li>- full prepayment with any Visa or Mastercard;</li>
          <li>- prepayment of 50% with subsequent payment upon receipt;</li>
        </ul>
        It is also possible to arrange an installment plan or a loan. For more information, fill out the form
        above and our employee will contact you shortly.
        </p>
      </div>
      <h3>Delivery</h3>
      <div>
        <p>
          For the delivery of goods, you can choose the following options:
        </p>
        <ul>
          <li>- delivery by Nova Poshta (delivery cost depends on the type of product and delivery address);
          </li>
          <li>- delivery by Ukrposhta;</li>
          <li>- delivery by JustIn;</li>
          <li>- pickup from Kiev;</li>
        </ul>
      </div>
      <h3>Reviews</h3>
      <div>
        <p>
          We are a young company that has just entered the market, so we do not have a lot of reviews.
        </p>
        <p>
          Nevertheless, all of our small number of buyers are satisfied with the quality of service and the
          product itself.
        </p>
      </div>
    </div>
  </div>

  <p>Date: <input type="text" id="datepicker"></p>

  <div id="sidemenu" align="right">
    <ul id="menu">
      <li class="ui-widget-header">
        <div>Computer accessories</div>
      </li>
      <li>
        <div>Motherboars</div>
      </li>
      <li>
        <div>Videocards</div>
      </li>
      <li>
        <div>Processors</div>
      </li>
      <li class="ui-widget-header">
        <div>Periphery</div>
      </li>
      <li>
        <div>Headphones</div>
      </li>
      <li>
        <div>Mouses</div>
      </li>
      <li>
        <div>Keyboards</div>
      </li>
    </ul>
  </div>

  <div id="welcome">
        <label for="name">Имя:</label>
        <input type="text" id="name" placeholder="Например, Иван">
        <button id="send">Отправить</button>
  </div>

  <div class="social">
    <a class="socialLink" href="#">
      <img class="socialImg" src="images/icon/Instagram.svg" alt="Oh, no, my instagram">
    </a>
    <a class="socialLink" href="#">
      <img class="socialImg" src="images/icon/Pinterest.svg" alt="Oh, no, my Pinterest">
    </a>
    <a class="socialLink" href="#">
      <img class="socialImg" src="images/icon/Twitter.svg" alt="Oh, no, my Twitter">
    </a>
    <a class="socialLink" href="#">
      <img class="socialImg" src="images/icon/TikTok.svg" alt="Oh, no, my TikTok">
    </a>
  </div>


</body>

</html>