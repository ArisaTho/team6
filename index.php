<?php
    session_start();
    require('connect.php');
    require('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SUPERCARCARESHOP | เร็ว แรง</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<style>
    html,body
    {
        background-color: #D3D3D3;
    }
    .container
    {
        width:95%;
    }
    .breadcrumb{
        background-color: #D49B54;
        font-size: 16px;
 
    }
    .breadcrumb a{
        color: black;
    }
    .dropdown:hover .dropdown-menu
    {
        display: block;
        margin-top: 0;
    }
</style>
<body>
    
    <?php include('navbar.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <?php include('group.php'); ?>
            </div>
            <div class="col-lg-9">
                    <?php include('nav.php'); ?>
                    <?php include('carousel.php'); ?>

                    <div class="panel panel-warning" style="margin-top: 20px;">
                    <div class="breadcrumb text-center">สินค้าทั้งหมด</div>
                        <div class="panel-body">
                            <?php
                            $sql_product = SELECT($conn,"tb_products");
                            while($product = $sql_product->fetch_assoc())
                            {
                                $price = ($product['price_product']-$product['discount_product'])+($product['price_product']-$product['discount_product'])*7/100;
                                include('show_product.php');
                            }
                            ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>