@extends('layouts.app')

@section('title', 'Recipe | Foodie')

@section('styles')
<style>
    .show-section{
        margin: 100px;
    }
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
    .show-section{
        margin: 40px;
    }
}
@media only screen and (min-width: 600px) {
  /* For tablets: */
    .show-section{
        margin: 60px;
    }
}


    </style>
@endsection

@section('content')


<!-- Page Content -->
<div class="container">
    <div class="show-section">

    <!-- Portfolio Item Row -->
    <div class="row recipe-searched-results">
            <!-- Portfolio Item Heading -->
            <div class="text-center">
                <h1 class="mb-4">{{$recipe->name}}</h1>
            </div>
            <div class="col-md-6 mb-3">
                <img
                    class="img-fluid m-1 rounded shadow user-select-none"
                    style="width:90%;"
                    src="{{ asset($recipe->image_path) }}"
                    alt="{{$recipe->name}}">
                    <h3 class="my-3 ">Health Labels</h3>
                    @foreach ($recipe->healthlabels as $label)
                        <span class="badge bg-success p-1 mt-1 user-select-none">{{$label->name }}<i class="fas fa-utensils"></i></span>
                    @endforeach
            </div>

            <div class="col-md-6">
                <h4 class="text-muted m-0">Cuisine: {{$recipe->cuisineType}}</h4>
                <h4 class="text-muted m-0">Dish Type: {{$recipe->dishType}}</h4>
                <h4 class="text-muted m-0">Meal Type: {{$recipe->mealType}}</h4>
                <h4 class="text-muted m-0">Posted {{$recipe->created_date}}</h4>
                <h3 class="my-3">Recipe:</h3>
                <ul class="h5">
                    {{$recipe->recipe}}
                </ul>
            </div>
    </div>
    <!-- /.row -->

    </div>
    {{-- End show-section --}}

  </div>
  <!-- /.container -->

@endsection
