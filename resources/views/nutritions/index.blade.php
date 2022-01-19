@extends('layouts.app')

@section('title', 'Product Nutrition | Foodie')

@section('styles')
<style>
    .bg-cover {
        background-size: cover !important;
        background-image: url(images/ui/21.png) ;

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
        <div class="container py-2 text-center" style="height:26rem">
            <h3 class="display-4 font-weight-bold" style="padding-top: 6rem; text-shadow: 5px 5px 10px black;">Dieting isn't complicated. <br> if you eat 2,000 calories, you have to burn it off. Simple as that.</h3>
        </div>
    </div>

    {{-- Search Content  --}}
    <div class="container mt-5 mb-5">
        <div class="" style="max-width: 70%; margin: 0 auto;">
            <div class="mb-3">
                <h2 class="text-center">Enter Product Name for Nutrition Value</h2>
                <h5 class="text-center m-5">It's wise to want to know the nutritional value of the foods you eat. A healthy diet is vital for feeling your best—strong, happy, and energetic.Find nutrition breakout right from an apple to any fancy dish, curated specially for our health freak foodies.</h5>
                <div class="input-group ">
                    <input type="text" id="search-nutrition-input" class="form-control" placeholder="Item name" aria-label="Item name" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="search-nutrition"><i class="fas fa-search"></i></button>
                </div>

                <div class="nutrition-searched-results">

                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap Static Header -->
    <div class="jumbotron bg-covering text-white mt-5">
        <div class="container py-5 text-center" style="height:22rem">
            <h1 class="display-4 font-weight-bold" style="padding-top: 6rem;color: white; font-size: 2rem; text-shadow: 5px 5px 10px black;">Want To Know More About Us?</h1>
            <div class="container">
            <a class="btn btn-lg btn-primary mt-6" href="#" style="width: 10rem; align-items:center">Contact Us</a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{asset('js/nutritions/nutrition.js')}}"></script>
    <script>
        searchNutritions();
    </script>
@endsection
