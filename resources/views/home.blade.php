@extends('layouts.app')

@section('title', 'Home | Foodie')

@section('styles')
<style>
    .bg-cover {
        background-size: cover !important;
        background-image: url(images/ui/header.png) ;

    }

    .bg-covering {
        background-size: cover !important;
        background-image: url(images/ui/8.png)
    }


    .container h1{
        font-weight: bold
    }

    /*---------------------
      Categories
    -----------------------*/

    .categories {
        overflow: hidden;
        margin-top: 10px;
    }

    .categories .container-fluid {
        padding-right: 5px;
    }

    .categories__item {
        height: 260px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        padding-left: 30px;
        margin-bottom: 10px;
        margin-right: 10px;
    }

    .categories__item.categories__large__item {
        height: 530px;
        padding-left: 70px;
    }

    .categories__item.categories__large__item .categories__text {
        max-width: 480px;
    }

    .categories__item.categories__large__item .categories__text p {
        margin-bottom: 15px;
    }

    .categories__text h1 {
        font-family: "Cookie", cursive;
        color: #111111;
        margin-bottom: 5px;
    }

    .categories__text h4 {
        color: #111111;
        font-weight: 700;
    }

    .categories__text p {
        margin-bottom: 10px;
    }

    .categories__text a {
        font-size: 14px;
        color: #338E3C;
        text-transform: uppercase;
        font-weight: bold;
        position: relative;
        padding: 0 0 3px;

    }

    .categories__text a:after {
        position: absolute;
        left: 0;
        bottom: 0;
        height: 2px;
        width: 100%;
        font-weight: bold;
        background:  #338E3C;
        content: "";
    }


    /*** Food Menu ***/
    .nav-pills .nav-item .active {
        border-bottom: 2px solid #338E3C;
    }

    .round-circle {

        width: 150px;
        height: 210px;
        -webkit-border-radius: 25px;
        -moz-border-radius: 25px;
        border-radius: 90%;
    }

    </style>
@endsection

@section('content')
    <!-- Bootstrap Static Header -->
    <div class="jumbotron bg-cover text-white">
        <div class="container py-5 text-center" style="height:26rem">
            <h1 class="display-4 font-weight-bold" style="padding-top: 6rem; text-shadow: 5px 5px 10px black;">Fresh Ingredients, Better Taste</h1>
            <p class="font-italic mb-0" style="font-size: 1.5rem; text-shadow: 5px 5px 10px black;">Welcome, Name To Foodie</p>
        </div>
    </div>

    <!-- Categories Section Begin -->
    <section class="categories" style="background-color: white">
        <div class="container px-0" >
        <div class="row" style="margin-top: 4rem">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                <h1 class="mb-5" >Explore Features</h1>
            </div>

        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="categories__item categories__large__item" style="background-image: url({{ asset('images/ui/1.png') }})">
                    <div class="categories__text">
                        <h1>Track Product Expiry</h1>
                        <p>Tells you when your food is going to expire so that you can use it before it does. Record the expiry dates of your food/drinks</p>
                        <a href="#">Add product</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item" style="background-image: url({{ asset('images/ui/2.png') }})" >
                            <div class="categories__text">
                                <h4>Grocery List</h4>
                                <p>Use this to make your personal grocery shopping  list, before you forget it.</p>
                                <a href="#">Add Items</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item" style="background-image: url({{ asset('images/ui/3.png') }})">
                            <div class="categories__text" >
                                <h4>Browse Recipes</h4>
                                <p>Find the perfect recipe by searching through our catalogue for the ingredients you have on hand.</p>
                                <a href="#">Check now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item" style="background-image: url({{ asset('images/ui/4.png') }})">
                            <div class="categories__text" >
                                <h4>My Recipes</h4>
                                <p>With enough recipes uploaded, you can even create your own digital cookbook to have all your recipes at a glance, alongside ours.</p>
                                <a href="#">View Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item" style="background-image: url({{ asset('images/ui/5.png') }})">
                            <div class="categories__text">
                                <h4>Nutrition Value</h4>
                                <p>Tracking your food intake will give you insight into many aspects of your eating habits.</p>
                                <a href="#">Track Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    <!-- Categories Section End -->

    <!-- Menu Start -->
    <div class="container-xxl py-5 mt-3" style="background-color: white">
        <div class="container">
            <div class="text-center">
                <h1 class="mb-5">Most Popular Recipes</h1>
            </div>
            <div class="tab-class text-center" >
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1" style="color: #338E3C">
                            <i class="fas fa-coffee fa-2x" style="color: #338E3C"></i>
                            <div class="ps-3">

                                <h6 class="mt-n1 mb-0" style="color: #338E3C">Popular</h6>
                                <h6 class="mt-n1 mb-0" style="color: #338E3C">Breakfast</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2" style="color: #338E3C">
                            <i class="fas fa-hamburger fa-2x" style="color: #338E3C"></i>
                            <div class="ps-3">
                                <h6 class="mt-n1 mb-0" style="color: #338E3C">Special</h6>
                                <h6 class="mt-n1 mb-0" style="color: #338E3C">Lunch</h6>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3" style="color: #338E3C">
                            <i class="fas fa-utensils fa-2x " style="color: #338E3C"></i>
                            <div class="ps-3">
                                <h6 class="mt-n1 mb-0" style="color: #338E3C">Lovely</h6>
                                <h6 class="mt-n1 mb-0" style="color: #338E3C">Dinner</h6>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('images/ui/medu.jpg') }}" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                            <span>Chicken Burger</span>

                                        </h5>
                                        <small class="fst-italic">Ipsum ipsum clita erat amet dolor justo diam</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Menu End -->


    <!-- Categories Section Begin -->
    <div class="container py-5 mt-0 mb-0" style="background-color: white;">
        <div class="container">
            <div class="text-center">
                <h1 class="mb-5 mt-5">Search Recipes By Food</h1>
            </div>
            <section class="py-8 overflow-hidden">
                <div class="container mt-0">
                <div class="row flex-center mb-6  ">
                    <div class="col-lg-7">
                    </div>
                    <div class="col-lg-5 text-lg-end text-center"><a class="btn btn-lg text-800 me-2" href="#" role="button">View All
                </div>
                <div class="row flex-center">
                    <div class="col-12">
                    <div class="carousel slide" id="carouselSearchByFood" data-bs-touch="false" data-bs-interval="false">
                        <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <div class="row h-100 align-items-center">
                            <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="{{ asset('images/ui/italian.jpg') }}" />
                                <div class="card-body ps-0">
                                    <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Italian</h5>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="{{ asset('images/ui/italian.jpg') }}" />
                                <div class="card-body ps-0">
                                    <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Chinese</h5>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="{{ asset('images/ui/italian.jpg') }}" />
                                <div class="card-body ps-0">
                                    <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Indian</h5>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="{{ asset('images/ui/italian.jpg') }}" />
                                <div class="card-body ps-0">
                                    <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Mexican</h5>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="{{ asset('images/ui/italian.jpg') }}" />
                                <div class="card-body ps-0">
                                    <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Mughalia</h5>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="{{ asset('images/ui/italian.jpg') }}" />
                                <div class="card-body ps-0">
                                    <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Burmese</h5>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <!-- end of container-->
            </section>
        </div>
    </div>
    <!-- Categories Section End -->

    <!-- Bootstrap Static Header -->
    <div class="jumbotron bg-covering text-white mt-3">
        <div class="container py-5 text-center" style="height:22rem">
            <h1 class="display-4 font-weight-bold" style="padding-top: 6rem;color: white; font-size: 2rem; text-shadow: 5px 5px 10px black;">Want To Know More About Us?</h1>
            <div class="container">
            <a class="btn btn-lg btn-success shadow mt-6" href="#" style="width: 10rem; align-items:center">Contact Us</a>
            </div>
        </div>
    </div>

@endsection
