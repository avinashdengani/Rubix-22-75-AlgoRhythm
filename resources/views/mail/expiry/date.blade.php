@component('mail::message')
Hey ***{{$user->name}}***! We wanted you to know that your products in storeroom. We are sure you want to utilize the products before they expire.

“100 million people are starving. 1.3 billion tons of food is wasted every year. We do not need to produce more. Instead, we need to act different.”
– Chef Massimo Bottura of Osteria Francescana


You can Obtain different Recipes here that use the below-mentioned products.

### Product Details:<br>

@foreach ($products as $product)

{{$loop->iteration}}. **{{$product->product->name}}**

    **Expiry Date:** {{$product->expiry}} <br>
@endforeach
<br><br>

@component('mail::button', ['url' => route('storeroom.index') ])
View your Storeroom
@endcomponent

@component('mail::button', ['url' => route('recipes.index')])
Explore recipes
@endcomponent

**Thanks,**<br>
**{{ config('app.name') }}**
@endcomponent
