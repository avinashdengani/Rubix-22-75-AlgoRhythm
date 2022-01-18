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

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <h3 class="my-5">Suggested Recipes</h3>

    <div class="row other-recipes">


    </div>
    <!-- /.row -->

    </div>

  </div>
  <!-- /.container -->

@endsection

@section('scripts')
    <script src="{{ asset('js/recipes/recipe.js') }}"></script>
    <script>
        getRecipe('{{$recipe}}');
    </script>
@endsection
