@extends('layouts.app')

@section('title', 'Foodie | About Us')

@section('styles')
<style>
    .bg-cover {
        background-size: cover !important;
        background-image: url(images/ui/15.png) ;

    }

    .card {
    cursor: pointer
    }

    .hd {
        font-size: 25px;
        font-weight: 550
    }

    .card.hover,
    .card:hover {
        box-shadow: 0 20px 40px rgba(0, 0, 0, .2)
    }


    .card-title {
        font-weight: 600
    }

    button.focus,
    button:focus {
        outline: 0;
        box-shadow: none !important
    }

    .ft {
        margin-top: 25px
    }

    .chk {
        margin-bottom: 5px
    }

    .rck {
        margin-top: 20px;
        padding-bottom: 15px
    }

    .testimonials
{
  padding: 40px 0;
  background: #f1f1f1;
  color: #434343;
  text-align: center;
}

.testimonial-inner
{
  max-width: 1200px;
  margin: auto;
  overflow: hidden;
  padding: 0 20px;
}

.border
{
  width: 160px;
  height: 5px;
  background: #6ab04c;
  margin: 26px auto;
}

.row
{
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
}

.col
{
  flex: 33.33%;
  max-width: 33.33%;
  box-sizing:  border-box;
  padding: 15px;
}

.testimonial
{
  background: #fff;
  padding: 30px;
}

.testimonial img
{
  width: 100px;
  height: 100px;
  border-radius: 50%;
}

.name
{
  font-size: 20px;
  text-transform: uppercase;
  margin: 20px 0;
}

.stars
{
  color: #f0932b;
  margin-bottom: 20px;
}

@media screen and (max-width: 960px)
{
  .col
  {
    flex: 100%;
    max-width: 80%;
  }
}

</style>
@endsection


@section('content')

<!-- Bootstrap Static Header -->
<div class="jumbotron bg-cover text-white">
    <div class="container py-5 text-center" style="height:26rem">
        <h1 class="display-4 font-weight-bold" style="padding-top: 6rem">About Foodie</h1>
        <p class="font-italic mb-0" style="font-size: 1.5rem">Who are we?</p>
    </div>
</div>

<div class='container-fluid mx-auto mt-5 mb-5 col-12' style="text-align: center">
   
    <h1 mb-3>Our Motivation</h1>
    
    <div class="row" style="justify-content: center">
        <div class="card col-md-3 col-12">
            <div class="card-content">
                <div class="card-body"> <img src="https://img.icons8.com/fluency/96/000000/soil.png"/>
                    <div class="shadow"></div>
                    <div class="card-title"> Cost Effective </div>
                    <div class="card-subtitle">
                        <p> <small class="text-muted">After all proper management of grocery is definitely goin to help in Saving money
</small> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img src="https://img.icons8.com/fluency/96/000000/creek.png"/>
                    <div class="card-title"> Towards Better Nature </div>
                    <div class="card-subtitle">
                        <p> <small class="text-muted"> This will also help the environment and help immensely in  slowing down the destruction of nature that happens due to land conversion and pollution</small> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body">  <img src="https://img.icons8.com/fluency/96/000000/soil.png"/>
                    <div class="card-title"> Less Wastage </div>
                    <div class="card-subtitle">
                        <p> <small class="text-muted">Lesser wastage of food will Reduce hunger problems too as more resources will be available
</small> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- TEST --}}
<div class="testimonials">
    <div class="testimonial-inner">
      <h1>Testimonial</h1>
      <div class="border"></div>
      
      <div class="row">
        <div class="col">
          <div class="testimonial">
            <img src="https://images.pexels.com/photos/3211476/pexels-photo-3211476.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
            <div class="name">Sandeep Kiti</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repellat aspernatur temporibus assumenda sint odio minima. Voluptate alias possimus aspernatur voluptates excepturi placeat iusto cupiditate.</p>
          </div>
        </div>
        
        <div class="col">
          <div class="testimonial">
            <img src=https://images.pexels.com/photos/3211476/pexels-photo-3211476.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
            <div class="name">Manish Dsouza</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repellat aspernatur temporibus assumenda sint odio minima. Voluptate alias possimus aspernatur voluptates excepturi placeat iusto cupiditate.</p>
          </div>
        </div>
        
        <div class="col">
          <div class="testimonial">
            <img src="https://images.pexels.com/photos/3211476/pexels-photo-3211476.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940" alt="">
            <div class="name">Sneha Singh</div>
            <div class="stars">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque repellat aspernatur temporibus assumenda sint odio minima. Voluptate alias possimus aspernatur voluptates excepturi placeat iusto cupiditate!</p>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
