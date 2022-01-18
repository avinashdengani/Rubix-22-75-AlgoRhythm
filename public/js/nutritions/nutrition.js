const nutritionAPiUrl = "https://api.edamam.com/api/food-database/v2/parser";
const app_id_value = "1689815d";
const app_key_value="f250576ddcfb530affa4a9f0e53a3c1d";

const searchNutritions = function() {
    $("#search-nutrition").on('click', function() {
        let searchData = $("#search-nutrition-input").val();
        ajaxMethodForNutritionSearch(nutritionAPiUrl, searchData);
    });
}

const onSuccessOfNutrtion = function(data) {
    let innerHtmlData;
    let nutritionSearchResults = $(".nutrition-searched-results");
    if(data['hints'].length <=0) {
        innerHtmlData = `
            <h4>No Results Found</h4>
        `;
        nutritionSearchResults.html(innerHtmlData);
        return;
    }
    let nutrients = data['hints'][0]['food']['nutrients'];

    innerHtmlData = `
                        <h4>Search Resuts for <strong>"${$("#search-nutrition-input").val()}"</strong></h4>
                            <table class="table caption-top">
                                <tbody>
                                    <tr>
                                        <th scope="row">SR NO:</th>
                                        <th>Nutrients</th>
                                        <th>Amount</th>
                                    </tr>
                                    <tr>
                                        <td scope="row">1</td>
                                        <td>Energy (kcal)</td>
                                        <td>${(nutrients['ENERC_KCAL'] != undefined) ? "" + nutrients['ENERC_KCAL'] : "0"} g</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">2</td>
                                        <td>Protein</td>
                                        <td>${(nutrients['PROCNT'] != undefined) ? "" + nutrients['PROCNT'] : "0"} g</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">3</td>
                                        <td>Fat</td>
                                        <td>${(nutrients['FAT'] != undefined) ? "" + nutrients['FAT'] : "0"} g</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">4</td>
                                        <td>Carbohydrate</td>
                                        <td>${(nutrients['CHOCDF'] != undefined) ? "" + nutrients['CHOCDF'] : "0"} g</td>
                                    </tr>
                                    <tr>
                                        <td scope="row">5</td>
                                        <td>Fibre</td>
                                        <td>${(nutrients['FIBTG'] != undefined) ? "" + nutrients['FIBTG'] : "0"} g</td>
                                    </tr>
                                </tbody>
                            </table>
        `;
        nutritionSearchResults.html(innerHtmlData);

}

const ajaxMethodForNutritionSearch = function (route, searchData){
    let params = {
            app_id : app_id_value,
            app_key: app_key_value,
            ingr : searchData
    };

    $.ajax(
        {
            type: 'GET',
            url: route,
            data: params,
            success: function (data){
                onSuccessOfNutrtion(data);
            },
            error: function (e){
                popUpMessage('bg-danger', " Some error occured! Please try again later.");
            }
        }
    );
}
