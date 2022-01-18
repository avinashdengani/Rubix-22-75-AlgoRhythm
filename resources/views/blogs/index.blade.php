@extends('layouts.app')

@section('title', 'Browse Recipe | Foodie')

@section('styles')
<style>
.bg-cover {
        background-size: cover !important;
        background-image: url(images/ui/10.png) ;

    }

.bg-covers {
    background-size: cover !important;
    background-image: url(images/ui/12.png) ;

}

.bg-covering {
    background-size: cover !important;
    background-image: url("https://images.ctfassets.net/3s5io6mnxfqz/1ammRwvkhYhKcreYNUDFv4/e55cd1116eb5542e0402060b085a6168/AdobeStock_205001600.jpeg?fm=jpg&w=800&fl=progressive") ;

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

{{-- PRODUCT CARDS THRICE FOR MY RECIPES --}}
<div class="container" style="padding-top: 0%;">
    <div class="text-center section">
        <h1 class="mb-4">Explore Recipes added by our users</h1>
        <a href="#" style="font-size: 15px;color:black;font-weight:bold">Want To Add A Recipe?</a>
    </div>
    <div class="row pb-5 mb-4">
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
                        <p class="small text-muted m-0">Posted on {{$recipe->created_date}}</p>
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
