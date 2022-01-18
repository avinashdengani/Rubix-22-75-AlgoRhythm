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

 <!-- Bootstrap Static Header -->
 <div class="jumbotron bg-cover text-white">
    <div class="container py-5 text-center" style="height:26rem">
        <h1 class="display-4" style="padding-top: 6rem;font-weight:bolder; text-shadow: 5px 5px 10px black;">Find the Perfect Recipe</h1>
        <p class="font-italic mb-0" style="font-size: 1.5rem;font-weight:bold; text-shadow: 5px 5px 10px black;">Start Searching</p>
        <div class="container  mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            class="form-control input-text"
                            placeholder="Search Recipes...."
                            aria-label="Recipient's username"
                            name="search-recipe-input"
                            id="search-recipe-input"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-warning btn-lg" type="button" id="search-recipe">
                                <i class="fas fa-search text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- PRODUCT CARDS --}}
<div class="container py-5">
    <div class="row pb-0 mb-0 recipe-search-result">

    </div>
    <div class="text-center">
        <button class="recipe-load-more btn btn-success mt-5">Load More</button>
    </div>
</div>

<div class="container py-3 mt-5">
    <div class="text-center">
        <h1 class="mb-5">Your Tasty Recipes</h1>
    </div>

    <!-- Card Start -->
    <div class="card">
      <div class="row ">

        <div class="col-md-7 px-3">
          <div class="card-block px-6">
            <h4 class="card-title" style="font-weight: bold">Add Your Own Recipe </h4>
            <p class="card-text mt-5">
              With enough recipes uploaded, you can even create your own digital cookbook to have all your recipes at a glance, alongside ours. Be creative, dig out the family cookbook, and share with your friends—we can’t wait.
            </p>

            <br>
            <a href="#" class="mt-auto btn bg-yellow " style="font-weight: bolder">Add Recipe</a>
          </div>
        </div>
        <!-- Carousel start -->
        <div class="col-md-5 bg-covering">

        </div>
        <!-- End of carousel -->
      </div>
    </div>
    <!-- End of card -->

</div>
{{-- PRODUCT CARDS THRICE FOR MY RECIPES --}}
<div class="container" style="padding-top: 0%;">
    <div class="text-center">
        <h1 class="mb-4">Your Recipe Book</h1>
        <a href="#" style="font-size: 15px;color:black;font-weight:bold">Want To Add A Recipe?</a>
    </div>
    <div class="row pb-5 mb-4">
      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <!-- Card-->
        <div class="card shadow-lg border-0 rounded">
          <div class="card-body p-0"><img src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimagesvc.meredithcorp.io%2Fv3%2Fmm%2Fimage%3Furl%3Dhttps%253A%252F%252Fstatic.onecms.io%252Fwp-content%252Fuploads%252Fsites%252F44%252F2019%252F08%252F26232350%252F4293499.jpg&q=85" alt="" class="w-100 card-img-top">
            <div class="p-4">
              <h5 class="mb-0 mt-1">Veg Peas Harbara</h5>
              <p class="small text-muted mt-1">Cuisine:Indian</p>
              <p class="small text-muted mt-1">Servings:4</p>
              <p class="small text-muted mt-1">Time:20 mins</p>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <!-- Card-->
        <div class="card shadow-lg border-0 rounded">
          <div class="card-body p-0"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfSuRgwuQ8YK31DerHlCF5QQWiU4tq2oRLXg&usqp=CAU" alt="" class="w-100 card-img-top">
            <div class="p-4">
                <h5 class="mb-0 mt-1">Pink Pie</h5>
                <p class="small text-muted mt-1">Cuisine:Desert</p>
                <p class="small text-muted mt-1">Servings:4</p>
                <p class="small text-muted mt-1">Time:20 mins</p>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <!-- Card-->
        <div class="card shadow-lg border-0 rounded">
          <div class="card-body p-0"><img src="https://i.pinimg.com/750x/d2/7c/96/d27c960bad5c30e809c9a9536cbecfa4.jpg" alt="" class="w-100 card-img-top">
            <div class="p-4">
                <h5 class="mb-0 mt-1">Egg Fritchet</h5>
                <p class="small text-muted mt-1">Cuisine:Mexican</p>
                <p class="small text-muted mt-1">Servings:4</p>
                <p class="small text-muted mt-1">Time:40 mins</p>

            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
        <!-- Card-->
        <div class="card shadow-lg border-0 rounded">
          <div class="card-body p-0"><img src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fimagesvc.meredithcorp.io%2Fv3%2Fmm%2Fimage%3Furl%3Dhttps%253A%252F%252Fstatic.onecms.io%252Fwp-content%252Fuploads%252Fsites%252F44%252F2011%252F12%252F27212447%252F45028251.jpg&q=85" alt="" class="w-100 card-img-top">
            <div class="p-4">
                <h5 class="mb-0 mt-1">Strawberry Pancake</h5>
                <p class="small text-muted mt-1">Cuisine:Dessert</p>
                <p class="small text-muted mt-1">Servings:2</p>
                <p class="small text-muted mt-1">Time:10 mins</p>

            </div>
          </div>
        </div>
      </div>
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


