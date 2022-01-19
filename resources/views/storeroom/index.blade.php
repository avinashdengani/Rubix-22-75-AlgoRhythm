@extends('layouts.app')

@section('title', 'Store Room | Foodie')

@section('styles')
<style>

h1 {
  font-weight:500;
  letter-spacing: 2px;
  font-size:52px;
}


.header {
  position:relative;
  text-align:center;
  background-image: url(images/ui/14.png) ;
  /* background: linear-gradient(50deg, #338E3C 0%, #8BC34A 100%); */
  color:white;
}

.inner-header {
  height:45vh;
  width:100%;
}

.flex { /*Flexbox for containers*/
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.waves {
  position:relative;
  width: 100%;
  height:12vh;
  margin-bottom:-7px;
  min-height:100px;
  max-height:130px;
}


/* Animation */

.parallax > use {
  animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.parallax > use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.parallax > use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.parallax > use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}

@keyframes move-forever {
  0% {
   transform: translate3d(-90px,0,0);
  }
  100% {
    transform: translate3d(85px,0,0);
  }
}

/*Shrinking for mobile*/
@media (max-width: 768px) {
  .waves {
    height:20px;
    min-height:40px;
  }
  h1 {
    font-size:34px;
  }
}

</style>
@endsection


@section('content')

{{-- HEADER --}}
<div class="header">
    <!--Content before waves-->
    <div class="inner-header flex">

    <path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283" />
    <g><path fill="#fff"
    d="M250.4,0.8C112.7,0.8,1,112.4,1,250.2c0,137.7,111.7,249.4,249.4,249.4c137.7,0,249.4-111.7,249.4-249.4
    C499.8,112.4,388.1,0.8,250.4,0.8z M383.8,326.3c-62,0-101.4-14.1-117.6-46.3c-17.1-34.1-2.3-75.4,13.2-104.1
    c-22.4,3-38.4,9.2-47.8,18.3c-11.2,10.9-13.6,26.7-16.3,45c-3.1,20.8-6.6,44.4-25.3,62.4c-19.8,19.1-51.6,26.9-100.2,24.6l1.8-39.7		c35.9,1.6,59.7-2.9,70.8-13.6c8.9-8.6,11.1-22.9,13.5-39.6c6.3-42,14.8-99.4,141.4-99.4h41L333,166c-12.6,16-45.4,68.2-31.2,96.2	c9.2,18.3,41.5,25.6,91.2,24.2l1.1,39.8C390.5,326.2,387.1,326.3,383.8,326.3z" />
    </g>
    </svg>
    <h1>Your Store-Room</h1>
    </div>

    <!--Waves Container-->
    <div>
    <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
    viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
    <defs>
    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
    </defs>
    <g class="parallax">
    <use xlink:href="#gentle-wave" x="48" y="0" fill="#55AF35" />
    <use xlink:href="#gentle-wave" x="48" y="1" fill="#20941E" />
    <use xlink:href="#gentle-wave" x="48" y="2" fill="#ffff" />
    </g>
    </svg>
    </div>
    <!--Waves end-->

    </div>
    <!--Header ends-->

<!-- Categories Section Begin -->
<div class="container py- mt-0 mb-0" style="background-color: white;max-width: 100%">
    <div class="container">
        <div class="text-center">
            <h1 class="mb-5 mt-5">Items in your Store Room</h1>
        </div>
        <section class="py-8 overflow-hidden">
            <div class="container mt-0">
                <div class="row flex-center mb-0  ">
                    <div class="col-lg-7">
                    </div>

                </div>
                <div class="row flex-center">
                    <div>
                        <a href="#add-product-in-storeroom-form" class="btn bg-darkgreen text-white float-end mb-3 mt-3" id="add-items-btn">
                            <i class="fa fa-plus me-2" style="font-size: 12px;"></i>Add Item
                        </a>
                    </div>
                    <div class="col-12">


                        <div class="carousel slide" id="carouselSearchByFood" data-bs-touch="false" data-bs-interval="false">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">


                        <div class="row pb-5 mb-4" id="purchased-products-list">

                        </div>
                      </div>

                    </div>


                  </div>
                </div>
              </div>
            </div><!-- end of .container-->
        </section>
       </div>

</div>

<div class="container">
    <form id="add-product-in-storeroom-form" class="rounded shadow-lg" action="#" method="POST" style="overflow: hidden" class="col-md-12">
        <div class="m-5">
            <p class="h2 text-center">Add Items</p>
            <div class="d-flex flex-row justify-content-between my-input">
                {{-- Dropdown --}}
                <div class="form-group col-md-6 m-2 p-2" style=" background-color:white" >
                    <label for="category_id" style="font-weight: bolder">Select Category</label>
                    <select name="category_id" id="category_id" class="form-control select2 category_id">
                        <option></option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : ''}}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                        <small id="emailHelp" class="form-text text-danger category_id_error"></small>
                </div>
                {{-- Dropdown --}}
                <div class="form-group col-md-6 m-2 p-2 " style=" background-color:white" >
                    <label for="product_id" style="font-weight: bolder">Add Items to Grocery List</label>
                    <select name="product_id" id="product_id" class="form-control select2 product_id">
                        <option></option>
                    </select>
                        <small id="emailHelp" class="form-text text-danger product_id_error"></small>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-between my-input">
                <div class="form-group col-md-6 m-2 p-2 " style=" background-color:white" >
                    <label for="quantity" style="font-weight: bolder">Quantity</label>
                    <input type="number" class="form-control quantity" name="quantity">
                    <small id="emailHelp" class="form-text text-danger quantity_error"></small>
                </div>

                    {{-- Dropdown --}}
                <div class="form-group col-md-6 m-2 p-2 " style=" background-color:white" >
                    <label for="unit_id" style="font-weight: bolder">Unit</label>
                    <select name="unit_id" id="unit_id" class="form-control select2 unit_id">
                    <option></option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}" {{ old('unit_id') ? 'selected' : ''}}>{{ $unit->name }}</option>
                    @endforeach
                    </select>
                        <small id="emailHelp" class="form-text text-danger unit_id_error"></small>
                </div>
            </div>
            <div class="form-group col-md-6 m-2 p-2">
                <label for="expiry_date"></label>
                <input
                    type="text"
                    style="background-color: white;"
                    placeholder="Select Expiry Date"
                    class="form-control expiry_date"
                    name="expiry_date"
                    value="{{ old('expiry_date') }}"
                    id="expiry_date">
                    <small id="emailHelp" class="form-text text-danger expiry_date_error"></small>
            </div>
            <div class="form-group m-2 d-flex flex-row col-md-6"  style=" background-color:white" >
                <button class="btn btn-success btn-2x m-2" id="add-product-in-grocery" type="button" onclick="submitAddProductForm(`{{route('users.products.purchase', auth()->user()->id )}}`, `{{ auth()->user()->id }}`,  `{{route('user.purchasedProducts')}}`, `{{ csrf_token() }}`);">SUBMIT</button>
            </div>
            <p class="m-3">Didn't find product in list?<button class="btn btn-link text-darkgreen" type="button" class="add-product-btn" onclick="swalFireForAddProduct()">Click here</button></p>
        </div>
    </form>
    {{-- Dropdown --}}
        <div class="mt-5 mb-5 rounded shadow-lg pt-4">
            <p class="h2 text-center">Search Recipes For Available Products</p>
            <div class="d-flex justify-content-center form-group m-2 p-2" style="background-color:white" >
                {{-- <label for="recipe_id" style="font-weight: bolder"></label> --}}
                <div class="col-md-6" style="min-width: 230px;">
                    <select name="recipe_id[]" id="recipe_id" class="form-control select2 recipe_id" multiple>
                        <option></option>
                    </select>

                    <small id="emailHelp" class="form-text text-danger product_id_error"></small>
            </div>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-success" id="search-recipes-btn-in-storeroom">Search Recipes</button>
            </div>
            <div class="container py-5">
                <div class="search-results-count"></div>
                <div class="row pb-0 mb-0 recipe-search-result"></div>
                <div class="text-center">
                    <button class="recipe-load-more btn btn-success mt-5">Load More</button>
                </div>
            </div>
        </div>
</div>
@endsection

@section('scripts')
    <script>
        $('.select2').select2({
            placeholder: 'Select an option',
            width: 'resolve',
            allowClear: true,
        });

    </script>
    <script src="{{asset('js/products/add_product.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('js/storeroom/add_product_in_storeroom.js')}}"></script>
    <script src="{{asset('js/storeroom/delete_product_in_storeroom.js')}}"></script>
    <script>


    const addproductsInStoreroom = function (data){

    let productsForRecipe = $('#recipe_id');
    productsForRecipe.html("");

    itemsList = $("#purchased-products-list");
    for(let i in data){
        let j=i;
        let markAsConsummedRoute = `{{ url('users/' . auth()->user()->id . '/products') }}` + "/" + data[i]['product']['id'] + "/mark-as-consumed";

        let deleteProductRoute = `{{ url('storeroom')}}` + "/" + data[i]['id'] + "/delete";

        itemsList.append(`
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0 mt-5">
                <!-- Card-->
                <div class="shadow card border-0 rounded">
                    <img class="img-fluid round-circle h-100"
                        src="{{ url('storage')}}`+ '/' + data[i]['product']['image'] + `"
                        style="width:300px !important; height:300px !important;" />
                        <div class="card-header d-flex flex-row justify-content-between">
                            <div class="">
                                <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">${data[i]['product']['name']}</h5>
                            </div>
                                <button class="btn btn-primary" type="submit" onclick="ajaxMethodForConsumed('${markAsConsummedRoute}', '${csrf_token}', ${data[i]['product']['id']}, ${user_id}, '${reloadRoute}' )">
                                    <i class="fas fa-drumstick-bite"></i>
                                </button>
                                <button class="btn btn-outline-danger" type="submit" onclick="ajaxMethodForDeleteProduct('${deleteProductRoute}', '${csrf_token}', '${user_id}', '${reloadRoute}' )">
                                    <i class="fas fa-trash"></i>
                                </button>

                           </div>
                    <div class="card-body">
                        <div class="">
                            <p class="">Unit: ${data[i]['quantity']} ${data[i]['unit']['name']}</p>
                            <p class="">Product will expire <strong style="font-size:15px;" class="badge ${getDateDifference(data[i]['expiry_date']) < 7 ? 'bg-danger' : 'bg-success'}">${moment(data[i]['expiry_date'], "YYYY-MM-DD").fromNow()}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
                `);

                productsForRecipe.append(`
                    <option value="${data[i]['product']['name']}">${data[i]['product']['name']}</option>
                `);
            }

        }

        function getDateDifference(date){
            var date1 = new Date();
            var date2 = new Date(date);

            // To calculate the time difference of two dates
            var Difference_In_Time = date2.getTime() - date1.getTime();

            // To calculate the no. of days between two dates
            return Difference_In_Time / (1000 * 3600 * 24);
        }
        let reloadRoute = `{{ route('user.purchasedProducts') }}`;
        let user_id = `{{ auth()->user()->id }}`;
        let csrf_token = '{{ csrf_token() }}';
        ajaxMethodForStoreroomProducts(reloadRoute, csrf_token, user_id);
    </script>

    <script src="{{asset('js/products/delete_product.js')}}"></script>
    <script>
        const addproductsInGroceryList = function (data){
            itemsList = $("#items-list");

            for(let i in data){
                let j=i;
                let user_id = "{{ auth()->user()->id }}";
                let route = `{{ url('users/' . auth()->user()->id . '/products') }}` + "/" + data[i]['product']['id'];
                let routeForGroceryList = `{{ url('userProducts/ajax') }}`;
                let csrf_token = "{{ csrf_token() }}";

                itemsList.append(`
                    <tr>
                        <td scope="row">${++j}</td>
                        <td>${data[i]['product']['name']}</td>
                        <td>${data[i]['quantity']} ${data[i]['unit']['name']} </td>
                        <td>
                            <button type="button" class="btn btn-outline-primary" onclick="swalFireForMarkAsPurchased('${data[i]['product']['id']}')"><i class="fas fa-check fa-sm"> </i> </button>
                            <button type="button" class="btn btn-outline-danger" onclick="deleteProductAjax('${route}', '${routeForGroceryList}', '${user_id}', '${csrf_token}')"> <i class="fas fa-trash fa-sm"> </i> </button>
                            <button type="button" class="btn btn-outline-warning" onclick="swalFireForEditGrocery(${data[i]['product']['id']}, '${data[i]['quantity']}')"> <i class="fas fa-pencil fa-sm"> </i> </button>
                            </td>
                    </tr>
                `);
            }
        }
    </script>
    <script>
        initCategoriesAjax("{{route('products.getDataForCategory')}}" , "{{ csrf_token() }}");
    </script>

    <script>
        function swalFireForAddProduct()
        {
            Swal.fire({
                    showConfirmButton: false,
                    html: `<div class="p-1">
                    <i class="fas fa-info-circle text-center mb-2 text-darkgreen" style="font-size: 80px;"></i>
                    <h3>Didn't find product? Add your own product now. </h3>
                    <form action="{{route('products.store')}}" method="POST" enctype='multipart/form-data' id="add-product-form">
                        @csrf
                        <div class="form-group" style=" background-color:white" >
                            <h6 class="p-0 mt-1 mb-0" style="text-align: left;" for="category_id">Select Category</h6><br>
                            <select name="category_id" id="category_id" class="form-control select2 category_id m-0 p-0" style="background-color:white;">
                                <option></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                                @error('category_id')
                                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="form-group mt-2" style=" background-color:white" >
                            <h6 for="products" style="text-align: left;" class="mb-3 mt-4">Enter your product name</h6>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2" style=" background-color:white" >
                            <h6 class="mb-3 mt-4" style="text-align: left;" for="products">Enter your product calories</h6>
                            <input
                                type="number"
                                id="calories"
                                name="calories"
                                value="{{ old('calories') }}"
                                class="form-control  @error('calories') is-invalid @enderror">
                            @error('calories')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-2" style=" background-color:white" >
                            <h6 class="mb-3 mt-4" style="text-align: left;" for="products">Choose product image</h6>
                            <input
                                type="file"
                                id="image"
                                name="image"
                                value="{{ old('image') }}"
                                class="form-control  @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    <button class="btn btn-success mt-3" type="submit">Add Product</button>
                    </form>
                </div>
                    `,
                    buttonsStyling: false

                });
        }
    </script>


    <script>
        function swalFireForEditGrocery(product_id, quantity)
        {
            let user_id = "{{ auth()->user()->id }}";
            let route = `{{ url('users/' . auth()->user()->id . '/products') }}` + "/" + product_id;
            let routeForGroceryList = `{{ url('userProducts/ajax') }}`;
            let csrf_token = "{{ csrf_token() }}";
            Swal.fire({
                    icon: "",
                    html: `
                    <form action="${route}" method="POST" id="add-grocery-form" class="d-flex flex-column" style="overflow: hidden">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group " style=" background-color:white" >
                                <label for="quantity" style="font-weight: bolder" class="m-2">Quantity</label>
                                <input
                                    type="number"
                                    class="form-control quantity"
                                    name="quantity"
                                    value="${quantity}">
                                <small id="emailHelp" class="form-text text-danger quantity_error"></small>
                            </div>
                            @error('quantity')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="row">
                            {{-- Dropdown --}}
                            <div class="form-group " style=" background-color:white" >
                                <label for="unit_id" style="font-weight: bolder" class="m-2">Unit</label>
                                <select name="unit_id" id="unit_id" class="form-control select2 unit_id">
                                <option></option>
                                @foreach ($units as $unit)
                                    <option value="{{ $unit->id }}" >{{ $unit->name }}</option>
                                @endforeach
                                </select>
                                    <small id="emailHelp" class="form-text text-danger unit_id_error"></small>
                            </div>
                            @error('unit_id')
                                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button class="btn btn-success mt-3 " type="submit">Save</button>
                    </form>
                    `,
                    buttonsStyling: true,
                    showCancelButton: true,
                    showConfirmButton: false,
                    customClass: 'swal-wide',
                });
        }
    </script>
    <script src="{{asset('js/recipes/recipe.js')}}"></script>

    <script>
        $("#add-product-form").validate({
            rules:
                {
                    name: {
                        required: true
                    },
                    calories: {
                        required: true,
                        number: true
                    },
                    image: {
                        required: true
                    },
                    category_id: {
                        required: true
                    },
                },
            errorElement: 'p',
            errorPlacement: function(error, element) {
                if (error) {
                    error.insertAfter(element);
                    error.addClass('text-danger');
                }
            },
        });
    </script>

    <script>
        flatpickr("#expiry_date", {
            enableTime: false,
            dateFormat: "Y-m-d H:i",
            minDate:"today"
        });

    </script>

    <script>
        function mediaWatcherFunction(mediaWatcher) {
            if (mediaWatcher.matches) {
                $(".my-input").removeClass("flex-row");
                $(".my-input").addClass("flex-column");
            } else {
                $(".my-input").addClass("flex-row");
                $(".my-input").removeClass("flex-column");
            }
        }
        var mediaWatcher = window.matchMedia("(max-width: 800px)");
        mediaWatcherFunction(mediaWatcher);
        mediaWatcher.addListener(mediaWatcherFunction);

        new MySmoothScroll("#add-items-btn");
            $(".recipe-load-more").hide();
        searchRecipesOfStoreroomProducts();
    </script>
@endsection
