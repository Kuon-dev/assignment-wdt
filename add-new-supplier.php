<?php
ob_start();
session_start();
include "conn.php";
?>


<!DOCTYPE html>
<html>
<head>
    <!-- Page Title -->
    <title>Paws Heaven Add New Product</title>

    <!-- Common Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Import CSS Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <!-- Import jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Display Header & Footer -->
    <script>
        $(function(){ 
            $("#header").load("common/header.php");
            $("#footer").load("common/footer.php");
        });

    </script>
    
    <style>
        .section {
        margin-bottom: 15px;
        width:100%;
        }

        .label {
        text-align: left;
        margin-right: 10px;
        }

        .field {
        width:100%;
        }

        * {
        box-sizing: border-box;
        }

        #container {
        padding: 16px;
        background-color: lightgrey;
        width:800px;
        margin:0 auto;
        }

        input[type=text], input[type=file], input[type=password], input[type=date], input[type=email], input[type=tel], textarea, select {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        font-size:15pt;
        }

        input[type=text]:focus, input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        input[type='radio'] { 
        transform: scale(2); 
        }

        .btn {
        background-color: #555555;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 49%;
        opacity: 0.9;
        display: inline;
        }

        .btn:hover {
        opacity: 1;
        }

        .button {
            background-color: #e7e7e7;
            color: black;
            border: 2px solid #e7e7e7;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            transition-duration: 0.4s;
            cursor: pointer;
            border-radius:7px;
        }

        .button:hover {
            background-color: white;
        }
    </style>

</head>
<body>

<!-- Header -->
<div id="header"></div>

<!-- Main Content Area -->
<div class="content-area">
<?php 
    if (isset($_SESSION["$user_id"])) {
        print '
        <!-- form -->
        <form action="add-supplier.php" method="post" enctype="multipart/form-data" >
    
            <div id="container">
            <h2>Add New Supplier</h2>
                <div class="section">
                    <div class="label">
                        Supplier ID
                    </div>
                    <div class="field">
                        <input type="text" name="Supplier_ID" required>
                    </div>
                </div>
                <div class="section">
                    <div class="label">
                        Supplier Name
                    </div>
                    <div class="field">
                        <input type="text" name="Supplier_Name" required>
                    </div>
                </div>
                <div class="section">
                    <div class="label">
                        Supplier Contact Number
                    </div>
                    <div class="field">
                        <input type="text" name="Supplier_Contact" required>
                    </div>
                </div>
                <div class="section">
                    <div class="label">
                        Street
                    </div>
                    <div class="field">
                        <input type="text" name="Street" required>
                    </div>
                </div>
                <div class="section">
                    <div class="label">
                        City
                    </div>
                    <div class="field">
                        <input type="text" name="City" required>
                    </div>
                </div>
                <div class="section">
                    <div class="label">
                        Zipcode
                    </div>
                    <div class="field">
                        <input type="text" name="Zipcode" required>
                    </div>
                </div>
                <div class="section" style="padding-top:15px;">
                    <div class="label">
                        State
                    </div>
                    <div class="field">
                        <input type="text" name="State" required>
                    </div>
                </div>
                <div class="section">
                    <div class="label">
                        &nbsp;
                    </div>
                    <div class="field">
                        <button type="submit" class="btn" name="submitBtn">Submit</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </div>
            </div>
        </form>
        ';
    }

    else {
        echo"<script>
            alert('You need to sign in first to access this page.');
            window.location.href='registration_panel.php';
            </script>";
    };

?>


</div>

</body>
<!-- Footer -->
<div id="footer"></div>
</html>

<?php

    if(isset($_POST['submitBtn'])) {
        
        //INSERT INTO supplier()

        $Supplier_ID = $_POST['Supplier_ID'];
        $Supplier_Name = $_POST['Supplier_Name'];
        $Supplier_Contact = $_POST['Supplier_Contact'];
        $Street = $_POST['Street'];
        $City = $_POST['City'];
        $Zipcode = $_POST['Zipcode'];
        $State = $_POST['State'];

        print_r($_SESSION);
        print $Supplier_ID;
        print $Supplier_Name;
        print $Supplier_Contact;
        print $Street;
        print $City;
        print $Zipcode;
        print $State;
    }

?>