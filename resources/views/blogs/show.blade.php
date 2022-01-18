@extends('layouts.app')

@section('title', 'Recipe | Foodie')

@section('styles')
<style>


    </style>
@endsection

@section('content')


<!-- Page Content -->
<div class="container">
    <div class="section">

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
                <h5 class="small text-muted m-0">Cuisine: {{$recipe->cuisineType}}</h5>
                <h5 class="small text-muted m-0">Dish Type: {{$recipe->dishType}}</h5>
                <h5 class="small text-muted m-0">Meal Type: {{$recipe->mealType}}</h5>
                <h5 class="small text-muted m-0">Posted {{$recipe->created_date}}</h5>
                <h3 class="my-3">Recipe:</h3>
                <ul>
                    {{$recipe->recipe}}
                </ul>
            </div>
    </div>
    <!-- /.row -->

    </div>

  </div>
  <!-- /.container -->

@endsection
