<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>n50 | <?php echo $this->page ?></title>
    <link rel="stylesheet" type="text/css" href="/skin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/skin/css/styles.css">
</head>
<body>

<div class="n50-header-wrapper">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">n50</a>
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
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="/cart/">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                <span id="js-cart-count">(<?php echo $this->cart_count ?>)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="glyphicon glyphicon-search"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<div class="n50-body-wrapper">

