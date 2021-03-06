<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8" />
  <title>8store.ua</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
  href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
  rel="stylesheet"
  />
  <link rel="stylesheet" href="styles/styles.css" />
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css  "
  />
  <link rel="stylesheet" type="text/css" href="jQuery/jquery-ui.css">
  <style>
  .ui-menu { width: 200px; }
  .ui-widget-header { padding: 0.2em; }
  #sidemenu{
    margin-right: 50px;
    margin-top: 0px;
  }
  </style>
  <script src="jQuery/external/jquery/jquery.js"></script>
  <script src="jQuery/jquery-ui.js"></script>
  <script src="script/main.js"></script>
</head>

<body>
  <div class="container">
    <img src="images/mainbg.png" id="main-image" />
  </div>
  
  <section class="categories">
    
    <div class="container">
      <h2>Categories</h2>
      <div class="row" style="display: flex; justify-content: space-between; margin: 100px 0;">
        
        <div class="categories-item">
          <div class="categories-item__content">
            <div class="categories-item__content-name">Monitors</div>
            <div class="categories-item__content-arrow">
              <a href="monitors.php"><img src="images/arrow-right.svg" alt=""></a>
            </div>
          </div>
          <div class="categories-item__monitor">
            <img src="images/monitor.png" alt="">
          </div>
        </div>
        
        <div class="categories-item">
          <div class="categories-item__content">
            <div class="categories-item__content-name">Motherboards</div>
            <div class="categories-item__content-arrow">
              <img src="images/arrow-right.svg" alt="">
            </div>
          </div>
          <div class="categories-item__motherboard">
            <img src="images/Motherboard.png" alt="">
          </div>
        </div>
        
        <div class="categories-item">
          <div class="categories-item__content">
            <div class="categories-item__content-name">Components</div>
            <div class="categories-item__content-arrow">
              <img src="images/arrow-right.svg" alt="">
            </div>
          </div>
          <div class="categories-item__components">
            <img src="images/Components.png" alt="">
          </div>
        </div>
        
        <div class="categories-item">
          <div class="categories-item__content">
            <div class="categories-item__content-name">Laptops</div>
            <div class="categories-item__content-arrow">
              <img src="images/arrow-right.svg" alt="">
            </div>
          </div>
          <div class="categories-item__laptop">
            <img src="images/laptop.png" alt="">
          </div>
        </div>
        
        <a href="/lab1/pages/pc.html">
          <div class="categories-item" id="test">
            <div class="categories-item__content">
              <div class="categories-item__content-name">Desktop-PC</div>
              <div class="categories-item__content-arrow">
                <img src="images/arrow-right.svg" alt="">
              </div>
            </div>
            <div class="categories-item__pc">
              <img src="images/Desktop-PC.png" alt="">
            </div>
          </div>
        </a>
        
      </div>
    </div>
  </section>
  
  <section class="items">
  </section> 
  
  <p>
  <label for="amount">Price range:</label>
  <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
</p>
 
<div id="slider-range"></div>

  <div id="price-slider"> </div>

    <h2>Have any questions?</h2>
    <h2>Fill the form and we will call you back!</h2>
    <form action="./task.php" method="post">
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
          <p>Our online store is designed to sell electronics for every taste and color. The range includes everything for a gamer, student or ordinary office worker. A large selection of components for computers, a wide range of laptops. And most importantly - all this at a low price. We are here for you! 
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
            It is also possible to arrange an installment plan or a loan. For more information, fill out the form above and our employee will contact you shortly.
          </p>
        </div>
        <h3>Delivery</h3>
        <div>
          <p>
            For the delivery of goods, you can choose the following options:
          </p>
          <ul>
            <li>- delivery by Nova Poshta (delivery cost depends on the type of product and delivery address);</li>
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
            Nevertheless, all of our small number of buyers are satisfied with the quality of service and the product itself.
          </p>
        </div>
      </div>
    </div>

    <p>Date: <input type="text" id="datepicker"></p>

    <div id="sidemenu" align="right">
    <ul id="menu">
      <li class="ui-widget-header"><div>Computer accessories</div></li>
      <li><div>Motherboars</div></li>
      <li><div>Videocards</div></li>
      <li><div>Processors</div></li>
      <li class="ui-widget-header"><div>Periphery</div></li>
      <li><div>Headphones</div></li>
      <li><div>Mouses</div></li>
      <li><div>Keyboards</div></li>
    </ul>
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
  