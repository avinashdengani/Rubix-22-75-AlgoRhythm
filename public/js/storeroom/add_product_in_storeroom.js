var submitAddProductForm = function(route, user_id, routeForStoreroomProducts, csrf_token) {
    console.log('hey');
    let product_id_val = $("#add-product-in-storeroom-form").find('.product_id').val();
    let quantity_val = $("#add-product-in-storeroom-form").find('.quantity').val();
    let unit_id_val = $("#add-product-in-storeroom-form").find('.unit_id').val();
    let expiry_date_val = $("#add-product-in-storeroom-form").find('.expiry_date').val();
    $(".category_id_error").html('');
    $(".product_id_error").html('');
    $(".quantity_error").html('');
    $(".unit_id_error").html('');
    $(".expiry_date_error").html('');
    let formData = {
        product_id: product_id_val,
        quantity: quantity_val,
        unit_id: unit_id_val,
        expiry_date: expiry_date_val,
         _token: csrf_token
    };
    ajaxMethodForStoreroom(route, formData, csrf_token, user_id, routeForStoreroomProducts);
}

const ajaxMethodForStoreroom = function (route, formData, csrf_token, user_id, routeForStoreroomProducts){
    $.ajax(
        {
            type: 'POST',
            url: route,
            data: formData,
            success: function (data){
                $(".product_id").val('').change();
                $(".quantity").val('')
                $(".unit_id").val('').change();
                $(".expiry_date").val('')

                $(".category_id_error").html('');
                $(".product_id_error").html('');
                $(".quantity_error").html('');
                $(".unit_id_error").html('');
                $(".expiry_date_error").html('');

                popUpMessage('bg-success', "Product added successfully in your list!");
                ajaxMethodForStoreroomProducts(routeForStoreroomProducts, csrf_token, user_id);
            },
            error: function (e){
                if(e.responseJSON.errors['category_id'] !== undefined) {
                    $(".category_id_error").html(e.responseJSON.errors['category_id'][0]);
                }
                if(e.responseJSON.errors['product_id'] !== undefined) {
                    $(".product_id_error").html(e.responseJSON.errors['product_id'][0]);
                }
                if(e.responseJSON.errors['category_id'] == undefined  && e.responseJSON.errors['product_id'] == undefined) {
                    popUpMessage('bg-danger', " Some error occured! Please try again later.");
                }
            }
        }
    );
}

const ajaxMethodForStoreroomProducts = function (route, csrf_token, user_id){
    $.ajax(
        {
            type: 'POST',
            url: route,
            data: {
                user_id : user_id,
                _token: csrf_token
            },
            success: function (data){
                $("#purchased-products-list").html('');
                addproductsInStoreroom(data['products']);
            },
            error: function (e){
                popUpMessage('bg-danger', " Some error occured! Please try again later.");
            }
        }
    );
}


const ajaxMethodForConsumed = function (route, csrf_token, product_id, user_id, reloadRoute){
    $.ajax(
        {
            type: 'POST',
            url: route,
            data: {
                user_id : user_id,
                product_id: product_id,
                _token: csrf_token,
                _method: 'PUT'
            },
            success: function (data){
                $("#purchased-products-list").html('');
                ajaxMethodForStoreroomProducts(reloadRoute, csrf_token, user_id);
            },
            error: function (e){
                popUpMessage('bg-danger', " Some error occured! Please try again later.");
            }
        }
    );
}
