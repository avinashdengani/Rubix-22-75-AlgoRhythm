@extends('layouts.app')

@section('title', 'Grocery List | Foodie')

@section('styles')
    <style>
        .bg-cover {
            background-size: cover !important;
            background-image: url(images/ui/9.png) ;

        }

        .justify-content-center {
            -ms-flex-pack: center !important;
            justify-content: center !important;
        }

    </style>
@endsection

@section('content')
<form id="add-product-in-grocery-form" action="#" method="POST">
    <!-- Bootstrap Static Header -->
    <div class="jumbotron bg-cover text-white">
        <div class="container py-5 text-center" style="height:26rem">
            <h1 class="display-4 font-weight-bold" style="padding-top: 6rem;  text-shadow: 5px 5px 10px black;">Keep Your Grocery List Ready</h1>
            <p class="font-italic mb-0" style="font-size: 1.5rem;  text-shadow: 5px 5px 10px black;">Making Grocery Shopping Easier</p>
        </div>
    </div>

        {{-- Dropdown --}}
    <div class="form-group p-5" style=" background-color:white" >
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
    <div class="form-group p-5" style=" background-color:white" >
        <label for="product_id" style="font-weight: bolder">Add Items to Grocery List</label>
        <select name="product_id" id="product_id" class="form-control select2 product_id">
            <option></option>
        </select>
            <small id="emailHelp" class="form-text text-danger product_id_error"></small>
        <button class="btn btn-success rounded-circle" type="button" class="add-product-btn" onclick="swalFireForAddProduct()"><i class="fas fa-info-circle"></i></button>
    </div>

    <div class="row">
        <div class="form-group p-5 col-md-2" style=" background-color:white" >
            <label for="quantity" style="font-weight: bolder">Quantity</label>
            <input type="number" class="form-control quantity" name="quantity">
            <small id="emailHelp" class="form-text text-danger quantity_error"></small>
        </div>
        {{-- Dropdown --}}
        <div class="form-group p-5 col-md-2" style=" background-color:white" >
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

    <div class="form-group p-5" style=" background-color:white" >
        <button class="btn btn-success" id="add-product-in-grocery" type="button" onclick="submitGroceryListForm(`{{route('users.products.store', auth()->user()->id)}}`, `{{ auth()->user()->id }}`,  `{{route('user.getGroceryList')}}`, `{{ csrf_token() }}`);">Submit</button>
    </div>

</form>

{{-- ADD --}}
<div class="container"  style="background-color:white;max-width: 100%">
    <div class="text-center">
        <h1 class="mb-5 mt-5">Your Grocery List</h1>
    </div>
<div class="modal-dialog " style="background-color:white" >
    <div class="modal-content" >
        <div class="modal-header">
            <h4 class="modal-title" id="staticBackdropLabel">Your Grocery List</h4>
        </div>
        <div class="modal-body mt-0"> <span>Items In Your Grocery List</span>
            <div class="mt-3">
                <table class="table caption-top">
                    <tbody id="items-list">
                    <tr>
                        <th scope="row">Sr No</th>
                        <th>Items</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($groceryList as $list)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $list->product->name }}</td>
                            <td>{{ $list->quantity }} {{ $list->unit->name }} </td>
                            <td><button type="button" class="btn btn-outline-danger" onclick="deleteProductAjax(`{{ route('users.products.destroy', [auth()->user()->id, $list->product->id]) }}`, ` {{route('user.getGroceryList')}}`, `{{ auth()->user()->id }}`, `{{ csrf_token() }}`)"> <i class="fas fa-trash fa-sm"> </i> </button></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>


{{-- SUGGESTED ITEMS --}}

<!-- Categories Section Begin -->
<div class="container py- mt-0 mb-0" style="background-color: white;max-width: 100%">
    <div class="container">
        <div class="text-center">
            <h1 class="mb-5 mt-5">Items That You Consumed Recently</h1>
        </div>
        <section class="py-8 overflow-hidden">
            <div class="container mt-0">
              <div class="row flex-center mb-0  ">
                <div class="col-lg-7">
                </div>

              </div>
              <div class="row flex-center">
                <div class="col-12">
                  <div class="carousel slide" id="carouselSearchByFood" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="10000">
                        <div class="row h-100 align-items-center">
                          <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                            <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="images/vendor/apple.jpg" />
                              <div class="card-body ps-0">
                                <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Apple</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                            <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="images/vendor/apple.jpg" />
                              <div class="card-body ps-0">
                                <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Butter</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                            <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="images/vendor/apple.jpg" />
                              <div class="card-body ps-0">
                                <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Peanuts</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                            <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="images/vendor/apple.jpg" />
                              <div class="card-body ps-0">
                                <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Chicken</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                            <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="images/vendor/apple.jpg" />
                              <div class="card-body ps-0">
                                <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Lays</h5>
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                            <div class="card card-span round-circle" style="border-color: white"><img class="img-fluid round-circle h-100" src="images/vendor/apple.jpg" />
                              <div class="card-body ps-0">
                                <h5 class="text-center fw-bolder text-1000 text-truncate mb-2">Cookies</h5>
                              </div>
                            </div>
                          </div>

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
<!-- Categories Section End -->

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

    <script src="{{asset('js/products/delete_product.js')}}"></script>
    <script>
        const addproductsInGroceryList = function (data){
            console.log(data);
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
                        <td><button type="button" class="btn btn-outline-danger" onclick="deleteProductAjax('${route}', '${routeForGroceryList}', '${user_id}', '${csrf_token}')"> <i class="fas fa-trash fa-sm"> </i> </button></td>
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
                    icon: "info",
                    html: `Didn't found product? Add your own product now<br>
                    <form action="{{route('products.store')}}" method="POST" enctype='multipart/form-data' id="add-product-form">
                        @csrf
                        <div class="form-group" style=" background-color:white" >
                            <label for="category_id" style="font-weight: bolder">Select Category</label><br>
                            <select name="category_id" id="category_id" class="form-control select2 category_id" style=" background-color:white;">
                                <option></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                                @error('category_id')
                                    <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                        </div>
                        <div class="form-group" style=" background-color:white" >
                            <label for="products">Enter your product name</label>
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
                        <div class="form-group" style=" background-color:white" >
                            <label for="products">Enter your product calories</label>
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
                        <div class="form-group" style=" background-color:white" >
                            <label for="products">Choose product image</label>
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
                        <button class="btn btn-success" type="submit">Add Product</button>
                    </form>
                    `,
                    buttonsStyling: false,
                    confirmButtonText: "Ok, got it!",
                    customClass: {
                        confirmButton: "btn font-weight-bold btn-light",

                    }
                });
        }
    </script>

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
@endsection
