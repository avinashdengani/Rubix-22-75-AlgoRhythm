const addproductNodes = function (data, category){
    product_id = $(".product_id");
    oldValue = $(product_id).data('old-value');
    for(let i in data){
        select ="";
        if(data[i]['id'] === oldValue) {
            select = "selected";
        }
        product_id.append(`<option value="${data[i]['id']}" ${select}>` + data[i]['name'] + `</option>`);
    }
}

const isExist = function (category_id){
    return category_id in products_category;
}
var products_category = [];

var initCategoriesAjax = function (route, csrf_token){
    $(document).on('change', '.category_id', function(){
        let category_id = $(this).val();
        let category = this
        let product_id = $(".product_id");
        product_id.empty().append('<option value=""></option>');

        let exist = isExist(category_id);
        if(exist){
            addproductNodes(products_category[category_id], category);
        }else{
            ajaxMethodForCategory(route, csrf_token, category_id, category)
        }
    });
}
var submitGroceryListForm = function(route, user_id, routeForList, csrf_token) {
    let category_id_val = $("#add-product-in-grocery-form").find('.category_id').val();
    let product_id_val = $("#add-product-in-grocery-form").find('.product_id').val();
    let quantity_val = $("#add-product-in-grocery-form").find('.quantity').val();
    let unit_id_val = $("#add-product-in-grocery-form").find('.unit_id').val();
    $(".category_id_error").html('');
    $(".product_id_error").html('');
    $(".quantity_error").html('');
    $(".unit_id_error").html('');
    let formData = {category_id: category_id_val, product_id: product_id_val, quantity: quantity_val, unit_id: unit_id_val, _token: csrf_token};
    ajaxMethodForProduct(route, formData, csrf_token, user_id, routeForList);
}
const ajaxMethodForCategory = function (route, csrf_token, category_id, category){
    $.ajax(
        {
            type: 'POST',
            url: route,
            data: {
                category_id: category_id,
                _token: csrf_token
            },
            success: function (data){
                products_category[category_id] = data['products'];
                addproductNodes(data['products'], category);
            },
            error: function (e){
                popUpMessage('bg-danger', " Some error occured! Please try again later.");
            }
        }
    );
}

const ajaxMethodForProduct = function (route, formData,csrf_token, user_id, routeForList){
    $.ajax(
        {
            type: 'POST',
            url: route,
            data: formData,
            success: function (data){
                $(".product_id").val('').change();
                $(".quantity").val('')
                $(".unit_id").val('').change();

                $(".category_id_error").html('');
                $(".product_id_error").html('');
                $(".quantity_error").html('');
                $(".unit_id_error").html('');
                if(data){
                    popUpMessage('bg-success', "Product added successfully in your list!");
                }else{
                    popUpMessage('bg-danger', "Product already exists in your list!");
                }

                ajaxMethodForGroceryList(routeForList, csrf_token, user_id);
            },
            error: function (e){
                let flag = true;
                if(e.responseJSON.errors['category_id'] !== undefined) {
                    $(".category_id_error").html(e.responseJSON.errors['category_id'][0]);
                    flag = false;
                }
                if(e.responseJSON.errors['product_id'] !== undefined) {
                    $(".product_id_error").html(e.responseJSON.errors['product_id'][0]);
                    flag = false;
                }
                if(e.responseJSON.errors['quantity'] !== undefined) {
                    $(".quantity_error").html(e.responseJSON.errors['quantity'][0]);
                    flag = false;
                }
                if(e.responseJSON.errors['unit_id'] !== undefined) {
                    $(".unit_id_error").html(e.responseJSON.errors['unit_id'][0]);
                    flag = false;
                }
                if(flag) {
                    popUpMessage('bg-danger', " Some error occured! Please try again later.");
                }
            }
        }
    );
}


var products_user = [];

const ajaxMethodForGroceryList = function (route, csrf_token, user_id){
    $.ajax(
        {
            type: 'POST',
            url: route,
            data: {
                user_id : user_id,
                _token: csrf_token
            },
            success: function (data){
                products_user[user_id] = data['products'];
                $("#items-list").html('');
                addproductsInGroceryList(data['products']);
            },
            error: function (e){
                popUpMessage('bg-danger', " Some error occured! Please try again later.");
            }
        }
    );
}

