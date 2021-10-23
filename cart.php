<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven Cart</title>

    <!-- Common Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Import CSS Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="cart-trail.css">
    <!-- Import jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Display Header & Footer -->
    <script>
        $(function(){ 
            $("#header").load("common/header.php");
            $("#footer").load("common/footer.php");
        });
    </script>

    
</head>
<body>
<!-- Header -->
<div id="header"></div>

<!-- Main Content Area -->
<div class="content-area">
	<div>
		<h2 class="sora center fs-1 fw-bolder">My Shopping Cart</h2>
	<br>
	<hr>
	<div class="parentbox">
	<?php 
		//connect database
		include ("conn.php"); 
		//get data from database
		$mysql_run=mysqli_query($con, "SELECT * FROM shopping_cart;");
		while ($row=mysqli_fetch_assoc($mysql_run)) {
			$data ='<div class="childbox" onclick="redirect()">
            <!-- Product Image -->
            <div class="productImageHolder">
                <img class="productImage" src="data:image/jpg;base64,'.base64_encode($row['Product_Image']).'" width="200px" height="240px"/>
            </div>
            
            <!-- Product Purchase Info -->
            <div class="productPurchase">
                <!-- product name -->
                <div class="productName">
                    <a href="#">
                        <h3>'.$row['Product_ID'].'</h3>
                    </a>
                </div>
                <!-- product price -->
                <div class="productPrice">
                    <h5>RM </h5><h4>'.$row['Price'].'</h4>
                    <br>
                </div>

                <div class="quantityHolder">
                    <!-- plus button -->
                    <button id="plusBTN">
                        <b>+</b>
                    </button>

                    <!-- quantity -->
                    <input id="productQuantity" type="number" value="1" min="1">

                    <!-- minus button -->
                    <button id="minusBTN">
                        <b>−</b>
                    </button>
                </div>
            </div>

            <!-- Total Price Container-->
            <div class="totalPriceHolder">
                <!-- total price -->
                <div id="totalPrice">
                    <h3>RM 100 . 00</h3>
                </div>
                <!-- remove button -->
                <button id="removeBTN">
                    <b>Remove</b>
                </button>
            </div>
        </div>
			
		';
		//display data
		echo $data;
		
		} 
		mysqli_close($con);//to close the database connection
    ?>

    <div class="checkoutPriceHolder">
        <div class="checkout">
            <h3>Total :</h3>
        </div>
        <div class="checkoutPrice">
            <h3>RM 100 . 00</h3>
        </div>
    </div>
    <!-- checkout button -->
    <a href="#">
        <button id="checkoutBTN">
            Check Out
        </button>
    </a>
</div>

<!-- javascrip -->
<script>
    // Quatity add/minus
    let plusQuantity = document.querySelector("#plusBTN");
    let minusQuantity = document.querySelector("#minusBTN");
    let Quantity = document.querySelector("#productQuantity");

    plusQuantity.addEventListener('click', () => {
        Quantity.value = parseInt(Quantity.value) + 1;
    });

    minusQuantity.addEventListener('click', () => {
        if (Quantity.value <= 1) {
            return;
        }
        Quantity.value = parseInt(Quantity.value) - 1;
    });

    document.querySelectorAll('.productPrice > h4').forEach(x => console.log(x.innerHTML))

    totalPrice = document.querySelector('#totalPrice > h3').innerHTML
    console.log(totalPrice) //= (document.querySelector('#productQuantity.value') * document.querySelectorAll('.productPrice > h4'))
</script>

</body>

<!-- Footer -->
<div id="footer"></div>
</html>