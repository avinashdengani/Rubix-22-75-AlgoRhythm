@extends('layouts.app')

@section('title', 'Browse Recipe | Foodie')

@section('styles')
<style>
.bg-cover {
        background-size: cover !important;
        background-image: url(images/ui/22.png) ;

    }

.bg-covers {
    background-size: cover !important;
    background-image: url(images/ui/12.png) ;

}


    .card-block {
    font-size: 1em;
    position: relative;
    margin: 0;
    padding: 1em;
    border: none;
    border-top: 1px solid rgba(34, 36, 38, .1);
    box-shadow: none;

}
.card {
    font-size: 1rem;
    overflow: hidden;
    padding: 5;
    border: none;
    border-radius: 2rem;
    box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px      #d4d4d5;
    margin-top:20px;
}

.btn {
  margin-top: auto;

}

.submit-btn {
  height: 38px;
  width: 240px;
  font-size: 18px;
  font-weight: 800;
  border: none;
  margin-top: 10px;
  background-color: #8BC34A;
  color: #000000;
  border-radius: 4px;
  margin-bottom: 8px;
}


</style>
@endsection

@section('content')
<!-- Bootstrap Static Header -->
<div class="jumbotron bg-cover text-white">
    <div class="container py-5 text-center" style="height:22rem">
        <h1 class="display-4 font-weight-bold" style="padding-top: 6rem; text-shadow: 5px 5px 10px black;">Welcome To Blogs</h1>
        <p class="font-italic mb-0" style="font-size: 1.5rem; text-shadow: 5px 5px 10px black;">Explore authentic recipes of our foodies from all around the world</p>
    </div>
</div>

{{-- PRODUCT CARDS THRICE FOR MY RECIPES --}}
<div class="container">
    <div class="text-center section">
        <h1 class="mb-2">Explore Recipes added by our Foodies</h1>
        <a href="#" style="font-size: 15px;color:black;font-weight:bold">Want To Add A Recipe?</a>
    </div>
    <div class="row pb-5 mb-5">
        @foreach ($recipes as $recipe)
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <!-- Card-->
            <div class="card shadow-lg border-0 rounded">
                <div class="card-body p-0">
                    <img src="{{ asset($recipe->image_path) }}" width="300px" height="300px" class="w-100 card-img-top" alt="{{ $recipe->name }}">
                    <div class="p-4">
                        <p class="mb-2 mt-2 text-dark font-weight-bolder">
                            <strong>{{ $recipe->name }}</strong>
                        </p>
                        <p class="small text-muted m-0">Cuisine: {{$recipe->cuisineType}}</p>
                        <p class="small text-muted m-0">Dish Type: {{$recipe->dishType}}</p>
                        <p class="small text-muted m-0">Meal Type: {{$recipe->mealType}}</p>
                        <p class="small text-muted m-0">Posted at {{$recipe->created_date}}</p>
                        <a class="btn btn-success" href="{{route('blogs.show', $recipe->id)}}" target="_blank" style="width:100%;">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

  </div>
</div>

<!-- Bootstrap Static Header -->
<div class="jumbotron bg-covers text-white mb-5">
    <div class="container py-5 text-center" style="height:20rem">
        <h1 class="display-4" style="padding-top: 6rem;font-weight:bolder; text-shadow: 5px 5px 10px black;">Check Your Kitchen Items</h1>
        <button class="submit-btn" type="submit">Get Started</button>

    </div>
</div>

@endsection
