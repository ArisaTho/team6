<?php
    session_start();
    require('connect.php');
    require('function.php');

    if(!empty($_GET['mode']))
    {
        $mode = $_GET['mode'];
    }
    else
    {
        $mode = "";
    }
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

                    <div class="panel panel-warning" style="margin-top: 20px;">
                        <div class="breadcrumb text-center">สินค้าลดราคา</div>
                        <div class="panel-body">
                            <div style="margin: 20px;" class="text-center">
                                <div class="btn-group">
                                    <a href="promotion.php?mode=h-s" class="btn btn-warning">จากราคามากมาน้อย</a>
                                    <a href="promotion.php?mode=hot" class="btn btn-warning">ยอดนิยม</a>
                                    <a href="promotion.php?mode=s-h" class="btn btn-warning">จากราคาน้อยมามาก</a>
                                </div>
                            </div>
                            <?php
                            if($mode == 'h-s')
                            {
                                $sql = "SELECT * FROM tb_products WHERE discount_product > 0 ORDER BY price_product DESC";
                            }
                            else if($mode == 's-h')
                            {
                                $sql = "SELECT * FROM tb_products WHERE discount_product > 0 ORDER BY price_product ASC";
                            }
                            else
                            {
                                $sql = "SELECT * FROM tb_products WHERE discount_product > 0 ORDER BY view_product DESC";
                            }
                            $sql_product = $conn->query($sql);
                            while($product = $sql_product->fetch_assoc())
                            {
                                $price = ($product['price_product']-$product['discount_product'])+($product['price_product']-$product['discount_product'])*7/100;

                                include('show_product.php');
                            }
                            if($sql_product->num_rows == 0)
                            {
                                echo "<h1 class='text-center'>ไม่พบสินค้า!</h1>";
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