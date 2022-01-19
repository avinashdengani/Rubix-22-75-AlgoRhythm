
@extends('layouts.app')

@section('title', 'Add Recipe | Foodie')

@section('styles')
<style>

    /*** Hero Header ***/
    .page-header { background: url(https://format-com-cld-res.cloudinary.com/image/private/s--xxDPnhWc--/c_limit,g_center,h_1200,w_65535/fl_keep_iptc.progressive.apng/v1/79dfcac45b5edad29b8c8cba6d4fce0d/Screen_Shot_2560-05-03_at_11_27_57_PM.png)no-repeat; position: relative; background-size: cover; }
    .page-caption { padding-top: 170px; padding-bottom: 174px; }
    .page-title { font-size: 46px;color: rgb(0, 0, 0); font-weight: 800; text-align: center; }

    .card-section { position: relative; bottom: 50px; }
    .card-block { padding: 40px; }
    .section-title { margin-bottom: 20px;}
    .card-block {
        padding: 30px;
    }

    h2,p{
        color: #fff
    }


    .section-contact {
        padding: 120px;

    }



    .section-contact .form-contact .single-input {
        position: relative;
        margin-top: 30px;
    }

    .section-contact .form-contact .single-input i {
        position: absolute;
        top: 8px;
        left: 15px;
        color: #338E3C;
    }

    .section-contact .form-contact .single-input input,
    .section-contact .form-contact .single-input textarea {
        width: 100%;
        border: none;
        border-bottom: 2px solid #000000;
        padding-left: 50px;
        padding-bottom: 15px;
        font-size: 15px;
        font-weight: 700;
    }

    .section-contact .form-contact .single-input textarea {
        height: 150px;
        min-height: 50px;
    }


    .section-contact .form-contact .submit-input input {
        margin-top: 40px;
        padding: 15px 50px;
        background-color: #338E3C;
        color: #fff;
        border: none;
        font-weight: 700;

    }

    .section-contact .form-contact .submit-input input:hover {
        background-color: #FEA116;
    }


    .bg-covers {
        background-size: cover !important;
        background: url(https://backend.localtraveller.com/sites/default/files/styles/blog_lead/public/news/veggiebowl%20%282%29.jpg?h=9fa886cf&itok=0N5JOcif)

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
        box-shadow: 0 1px 3px 0 #d4d4d5, 0 0 0 1px  #d4d4d5;
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

<!-- Hero Start -->

 <!-- page-header -->
 <div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-caption">
                    <h1 class="page-title bg-light">Your Recipe Book</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page-header-->
<!-- news -->
<div class="card-section">
    <div class="container">
        <div class="card-block bg-darkgreen">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- section-title -->
                    <div class="section-title">
                        <h2>You can choose the ingredients you want to make your perfect recipe, and add it to your recipe section. The feature allows you to:
                        </h2>
                        <p> 1. Name your recipe<br>
                        2. Input the ingredients, macros and method<br>
                        3. Save all the ingredients to your recipe section. </p>
                    </div>
                    <!-- /.section-title -->
                </div>
            </div>
        </div>

        </div>
<!-- Hero End -->


{{-- RECIPE ADD FORM --}}

	<!-- START RECIPE SECTION -->
	<div class="container">
		<div class="section-contact">
			<div class="row justify-content-center">
				<div class="col-12">
					<div class="header-section text-center">
						<div class="text-center">
                            <h1 class="mb-4">Create Your Own Recipes</h1>
                        </div>
						<p class="description text-black mb-5" >The Create Your Own Recipe feature does exactly what it says - you can literally create any recipe you want to put together a fully customised meal. </p>

					</div>
				</div>
			</div>
			<div class="form-contact">
				<form class="" method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                    @csrf
					<div class="row">
                        <div class="col-md-6">
                            <label for="Category">HEALTH LABELS</label>
                            <select name="healthlabel_id[]" id="healthlabel_id" class="form-control select2" multiple>
                                <option></option>
                                    @foreach ($healthlabels as $label)
                                        @if($label->id == old('healthlabel_id'))
                                            <option value="{{$label->id}}" selected>{{$label->name}}</option>
                                        @else
                                            <option value="{{$label->id}}">{{$label->name}}</option>
                                        @endif
                                    @endforeach
                            </select>
                            @error('healthlabel_id')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="published_at">PUBISHED AT</label>
                            <input type="text" style="background-color: white;"
                                class="form-control"
                                name="published_at"
                                value="{{ old('published_at') }}"
                                id="published_at">
                            @error('published_at')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mt-4">
                            <label for="image">RECIPE IMAGE</label>
                            <input type="file" 
                                    class="form-control @error('image') is-invalid @enderror"
                                    name="image"
                                    id="image">
                            @error('image')
                            <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6">
							<div class="single-input">
								<i class="fas fa-cauldron"></i>
								<input
                                    type="text"
                                    name="calories"
                                    placeholder="RECIPE CALORIES"
                                     value="{{ old('calories') }}">
                                @error('calories')
                                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
							</div>
						</div>

						<div class="col-md-6">
							<div class="single-input">
								<i class="fas fa-cauldron"></i>
								<input type="text" name="name" placeholder="RECIPE NAME" value="{{ old('name') }}">
							</div>
                            @error('name')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
						</div>
						<div class="col-md-6">
							<div class="single-input">
								<i class="fas fa-seedling"></i>
								<input type="text" name="cuisineType" placeholder="CUISINE TYPE e.g (Indian/Chinese)" value="{{ old('cuisineType') }}">
							</div>
                            @error('cuisineType')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
						</div>
						<div class="col-md-6">
							<div class="single-input">
								<i class="fas fa-stroopwafel"></i>
								<input type="text" name="mealType" placeholder="MEAL TYPE e.g (Lunch/Dinner)" value="{{ old('mealType') }}">
							</div>
                            @error('mealType')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
						</div>
						<div class="col-md-6">
							<div class="single-input">
								<i class="fas fa-candy-cane"></i>
								<input type="text" name="dishType" placeholder="DISH TYPE e.g (Main Course/ Snacks)" value="{{ old('dishType') }}">
							</div>
                            @error('dishType')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
						</div>
						<div class="col-12">
							<div class="single-input">
								<i class="fas fa-hamburger"></i>
								<textarea placeholder="RECIPE" name="recipe" >{{ old('recipe') }}</textarea>
							</div>
                            @error('recipe')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
						</div>
						<div class="col-12">
							<div class="submit-input text-center mt-4">
								<button class="btn btn-success btn-lg" type="submit" name="submit">SUBMIT</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- / END RECIPE SECTION -->
	</div>
{{-- RECIPE FORM ENDS --}}


{{-- PRODUCT CARDS THRICE FOR MY RECIPES --}}
<div class="container" style="padding-top: 0%;">
    <div class="text-center">
        <h1 class="mb-4">Your Recipe Book</h1>
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

@section('scripts')
<script>
    $('.select2').select2({
        placeholder: 'Select an option',
        allowClear: true
    });

    flatpickr("#published_at", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate:"today"
    });
</script>
@endsection
