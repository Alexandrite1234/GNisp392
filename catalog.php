<?php
session_start();
require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Мой сайт</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <header>
        <div class="logo">DONUTUS</div>
        <nav>
            <a href="index.php">О нас</a> |
            <a href="#">Где мы</a> |
            <a href="exit.php">Выход</a>
            <button class="smart-basket__min"></button>
        </nav>
        
    </header>
    <main>
    <div class="catalog">
        <div class="card">
          <img src="3.jpg" alt="Product Image">
          <h3>Пончик с манго</h3>
          <p>Цена: <span class="price">35</span> руб.</p>
         
            <div class="product__quantity"></div>
            <button class="add-to-cart-btn"
          
          data-sb-id-or-vendor-code="038"
  data-sb-product-name="Пончик с манго"
  data-sb-product-price="35"
  data-sb-product-quantity="1"
  data-sb-product-img="3.jpg"
          
          >В корзину</button>
          </div>
          <div class="card">
            <img src="3.jpg" alt="Product Image">
            <h3>Пончик с бананом</h3>
            <p>Цена: <span class="price">35</span> руб.</p>
           
              <div class="product__quantity"></div>
              <button class="add-to-cart-btn"
            
            data-sb-id-or-vendor-code="032"
    data-sb-product-name="Пончик с бананом"
    data-sb-product-price="35"
    data-sb-product-quantity="1"
    data-sb-product-img="3.jpg"
            
    >В корзину</button></div>
    <div class="card">
        <img src="3.jpg" alt="Product Image">
        <h3>Пончик с клубникой</h3>
        <p>Цена: <span class="price">35</span> руб.</p>
       
          <div class="product__quantity"></div>
          <button class="add-to-cart-btn"
        
        data-sb-id-or-vendor-code="035"
data-sb-product-name="Пончик с клубникой"
data-sb-product-price="35"
data-sb-product-quantity="1"
data-sb-product-img="3.jpg"
        
        >В корзину</button>
        </div>
        <div class="card">
            <img src="3.jpg" alt="Product Image">
            <h3>Пончик</h3>
            <p>Цена: <span class="price">25</span> руб.</p>
           
              <div class="product__quantity"></div>
              <button class="add-to-cart-btn"
            
            data-sb-id-or-vendor-code="020"
    data-sb-product-name="Пончик"
    data-sb-product-price="25"
    data-sb-product-quantity="1"
    data-sb-product-img="3.jpg"
            
            >В корзину</button>
            </div>
        </div>

        
       
            </main>
    
      

    <footer>
        <p>Номер телефона: +7 (123) 456-78-90</p>
        <div class="social-icons">
            <a href="#"><img src="img/vk.png" alt="Facebook"></a>
            <a href="#"><img src="img/inst.png" alt="Twitter"></a>
            <a href="#"><img src="img/odnoklassniki.png" alt="Instagram"></a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



    <link rel="stylesheet" href="smartbasket/css/smartbasket.min.css">

<div class="smart-basket__wrapper"></div>

<script src="./smartbasket/js/smartbasket.min.js"></script>

	<script>
		$(function () {
			$('.smart-basket__wrapper').smbasket({
				productElement: 'catalog',
				buttonAddToBasket: 'add-to-cart-btn',
				productPrice: 'product__price-number',
				productSize: 'product__size-element',
				
				productQuantityWrapper: 'product__quantity',
				smartBasketMinArea: 'smart-basket__min',
				countryCode: '+7',
				smartBasketCurrency: '₽',
				smartBasketMinIconPath: './smartbasket/img/shopping-basket-wight.svg',

				agreement: {
					isRequired: true,
					isChecked: true,
					isLink: 'https://artstranger.ru/privacy.html',
				},
				nameIsRequired: false,
			});
		});
	</script>
</body>
</html>