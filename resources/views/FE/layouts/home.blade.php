<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<header id="header"><!--header-->
        <div class="header_top" style="background-color:#CCCCCC"><!--header_top-->
            <div class="container" >
                <div class="row">
                    <div class="col-sm-6">
                        <div class="Left-aligned">
                            
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-envelope"></i> dienthoaiminhlong.com</a>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="Right-aligned">
                            <ul class="nav justify-content-end">
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/trang-chu')}}"><img src="{{('public/frontend/images/partner1.png')}}" alt="" /></a>
                        </div>
                        
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="navbar-nav">
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id !=NULL){
                                ?>
                                <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                
                                <?php
                                    }else{
                                ?>
                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
                                <?php
                                    }
                                ?>
                                
                                <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id !=NULL){
                                ?>
                                <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> logout</a></li>
                                
                                <?php
                                    }else{
                                ?>
                                <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Login</a></li>
                                <?php
                                    }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    
                    <div class="col-sm-4">
                        <form action="{{URL::to('/search-Results')}}" method="POST">
                            {{csrf_field()}}
                        <div class="search_box pull-left">
                            <input type="text" style="width: 200px" name="keyword_sub" placeholder="Search"/>
                            <input type="submit" style="width: 50px;color: black" name="search_product" class="fa fa-google-plus">
                        </div>
                        </form>
                    </div>
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-right">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class="active">Home</a></li>
                                <li><a href="{{URL::to('/trang-chu')}}">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
</body>
</html>