var deleteProductAjax = function (route, routeForProductList, user_id, csrf_token){
    $.ajax(
        {
            type: 'DELETE',
            url: route,
            data: {
                _token: csrf_token
            },
            success: function (){
                ajaxMethodForGroceryList(routeForProductList, csrf_token, user_id);
                popUpMessage('bg-success', "Item deleted successfully!");
            },
            error: function (e){
                popUpMessage('bg-danger', " Some error occured! Please try again later.");
            }
        }
    );
}