
const ajaxMethodForDeleteProduct = function (route, csrf_token, user_id, reloadRoute){
    $.ajax(
        {
            type: 'DELETE',
            url: route,
            data: {
                _token: csrf_token
            },
            success: function (data){
                $("#purchased-products-list").html('');
                popUpMessage('bg-success', "Product Deleted!");
                ajaxMethodForStoreroomProducts(reloadRoute, csrf_token, user_id);
            },
            error: function (e){
                popUpMessage('bg-danger', " Some error occured! Please try again later.");
            }
        }
    );
}
