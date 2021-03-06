<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>n50 | <?php echo $this->page ?></title>

    <?php if ( get_class($this) == 'Product' ) : ?>
        <meta property="og:title" content="<?php echo $this->product['name'] ?>" />
        <meta property="og:description" content="<?php echo $this->product['description'] ?>" />
        <meta property="og:type" content="product" />
        <meta property="og:url" content="http://<?php echo $_SERVER['SERVER_NAME'] ?>/product/<?php echo $this->product['slug'] ?>" />
        <meta property="og:image" content="http://<?php echo $_SERVER['SERVER_NAME'] ?><?php echo $this->product['images'][0] ?>" />
        <meta property="og:site_name" content="Central Dozen" />
        <meta property="og:price:amount" content="<?php echo number_format($this->product['price'], 2) ?>" />
        <meta property="og:price:currency" content="USD" />
        <meta property="og:availability" content="instock" />
        <?php foreach ( $this->product['related_products'] as $related_product ) : ?>
            <meta property="og:see_also" content="http://<?php echo $_SERVER['SERVER_NAME'] ?>/product/<?php echo $related_product['slug'] ?>" />
        <?php endforeach; ?>
    <?php endif; ?>


    <link rel="stylesheet" type="text/css" href="/skin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/skin/css/styles.css">

</head>
<body>

<?php if ( $this->loadModel('admin')->isAdminLoggedIn() ) : ?>
    <div class="n50-admin-bar-wrapper">
        <div class="container">
            <a href="/admin/" class="btn btn-primary">Admin</a>
        </div>
    </div>
<?php endif; ?>

<div class="n50-header-wrapper">
    <div class="container">
        <div class="logo text-center">
            <a href="/">
                <img src="/skin/images/logo-diamond.png" alt="n50" width="200">
            </a>
        </div>
        <nav class="navbar navbar-default n50-top-buffer-md">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/cart/" class="visible-xs-block pull-right n50-mobile-cart-icon">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    <span id="js-cart-count">(<?php echo $this->cart_count ?>)</span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <?php foreach ( $this->category_links as $category ) :  ?>
                        <li>
                            <a href="/category/<?php echo $category['slug'] ?>/">
                                <?php echo $category['name'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-xs">
                    <li>
                        <a href="/cart/">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                            <span id="js-cart-count">(<?php echo $this->cart_count ?>)</span>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="#">
                            <span class="glyphicon glyphicon-search"></span>
                        </a>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>
</div>

<div class="n50-body-wrapper">

