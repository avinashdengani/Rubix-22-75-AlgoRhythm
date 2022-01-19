@extends('layouts.app')

@section('title', 'Foodie | Contact')

@section('styles')
<style>
    .bg-cover {
        background-size: cover !important;
        background-image: url(images/ui/16.png) ;
    }

    div [class^="col-"]{
    padding-left:5px;
    padding-right:5px;
    }
    .card{
    cursor:pointer;
    }
    .card-title{  
    font-size:15px;
    transition:1s;
    cursor:pointer;
    }


.get-in-touch {
  max-width: 800px;
  margin: 50px auto;
  position: relative;

}
.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 3.2em;
  line-height: 48px;
  padding-bottom: 48px;
    color: #338E3C;
   
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: #338E3C;
  font-size: 15px;
  line-height: 10px;
  font-weight: 400;
}
.contact-form .input-text:focus {
  outline: none;
}
.contact-form .input-text:focus + .label,
.contact-form .input-text.not-empty + .label {
  -webkit-transform: translateY(-24px);
          transform: translateY(-24px);
}
.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 11px;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: #338E3C;
  cursor: text;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out, 
  -webkit-transform .2s ease-in-out;
}
.contact-form .submit-btn {
  display: inline-block;
  background-color: #338E3C;
  color: #fff;
  letter-spacing: 1px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width:200px;
}

</style>
@endsection


@section('content')

<!-- Bootstrap Static Header -->
<div class="jumbotron bg-cover text-white">
    <div class="container py-5 text-center" style="height:20rem">
        <h1 class="display-4 font-weight-bold" style="padding-top: 6rem">Contact Us</h1>
    </div>
</div>


<section class="get-in-touch mt-5">
    <div class="text-center">
        <h1 class="mb-2">Get In Touch</h1>
        <p>Helpline No:022-65652525<br>Email:foodie123@gmail.com</p>

</div>
    <form class="contact-form row">
       <div class="form-field col-lg-6">
          <input id="name" class="input-text js-input" type="text" required>
          <label class="label" for="name">Name</label>
       </div>
       <div class="form-field col-lg-6 ">
          <input id="email" class="input-text js-input" type="email" required>
          <label class="label" for="email">E-mail</label>
       </div>
       <div class="form-field col-lg-6 ">
          <input id="company" class="input-text js-input" type="text" required>
          <label class="label" for="company">Company Name</label>
       </div>
        <div class="form-field col-lg-6 ">
          <input id="phone" class="input-text js-input" type="text" required>
          <label class="label" for="phone">Contact Number</label>
       </div>
       <div class="form-field col-lg-12">
          <input id="message" class="input-text js-input" type="text" required>
          <label class="label" for="message">Message</label>
       </div>
       <div class="form-field col-lg-12">
          <input class="submit-btn" type="submit" value="Submit">
       </div>
    </form>
 </section>

 
{{-- Team --}}
<div class="container m-5">
    <div class="text-center">
                 <h1 class="mb-5">Our Team</h1>
     </div>
   <div class="row">
     <div class="col-md-3 col-sm-6">
        <div class="card card-block">
       
            <img src="images/ui/basic.png" alt="Photo of sunset">
            <h5 class="card-title text-center mt-3 mb-3">Avinash Dengani</h5>
        
        </div>
     </div>
     <div class="col-md-3 col-sm-6">
       <div class="card card-block">
       
     <img src="images/ui/basic.png" alt="Photo of sunset">
         <h5 class="card-title text-center mt-3 mb-3">Tushar Budhwani</h5>
        
   </div>
     </div>
     <div class="col-md-3 col-sm-6">
       <div class="card card-block">
     <img src="images/ui/basic.png" alt="Photo of sunset">
         <h5 class="card-title text-center mt-3 mb-3">Rahul Jethani</h5>
        
   </div>
     </div>
    <div class="col-md-3 col-sm-6">
        <div class="card card-block">
            <img src="images/ui/nandini.jpg" alt="Photo of sunset">
            <h5 class="card-title text-center mt-3 mb-3">Nandini Gawankar</h5>
        </div>
    </div>    
   
</div>
</div>
 
 


@endsection
