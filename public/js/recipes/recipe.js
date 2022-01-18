const allRecipesAPiUrl = "https://api.edamam.com/api/recipes/v2?type=public";
const app_id_value = "3d58ad94";
const app_key_value="d8f91c71a74f8bc4eb429bd2c76ebcba";

const URL_TYPE_RECIPE = 0;
const URL_TYPE_ALL_RECIPES = 1;
const URL_TYPE_OTHER_RECIPES = 2;

let nextAPiUrl = "";

const searchRecipes = function() {
    $("#search-recipe").on('click', function() {
        let recipeSearchResultParent = $(".recipe-search-result");
        recipeSearchResultParent.html('');
        let searchData = $("#search-recipe-input").val();
        ajaxMethodForRecipeSearch(allRecipesAPiUrl, searchData, URL_TYPE_ALL_RECIPES);
    });

    $(".recipe-load-more").on('click', function() {
        searchData = "";
        ajaxMethodForRecipeSearch(nextAPiUrl, searchData, URL_TYPE_ALL_RECIPES);
        $(this).html(`
            <div class="spinner-border text-light" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        `);
        $(this).attr('disabled', true);
    });
}

const getRecipe = function(recipe) {
    const recipeApilUrl = "https://api.edamam.com/api/recipes/v2/" + recipe + "?type=public";
    let searchData="";
    ajaxMethodForRecipeSearch(recipeApilUrl, searchData, URL_TYPE_RECIPE);
}

const onSuccessOfRecipe = function(data) {
    document.title = data['recipe']['label'] + " | Foodie";

    let ingredients = "";
    let healthLabels = "";
    let recipeSearchedResultParent = $(".recipe-searched-results");
    for(let i=0; i<data['recipe']['ingredientLines'].length; i++) {
        ingredients += `
            <li class="text-muted m-0 p-0">${data['recipe']['ingredientLines'][i]}</li>
        `
    }

    for(let i=0; i<data['recipe']['healthLabels'].length; i++) {
        healthLabels += `
            <span class="badge bg-success p-1 mt-1 user-select-none">${data['recipe']['healthLabels'][i]} <i class="fas fa-utensils"></i></span>
        `
    }

    let innerHtmlData = `
                            <!-- Portfolio Item Heading -->
                            <div class="text-center">
                                <h1 class="mb-4">${data['recipe']['label']}</h1>
                            </div>
                            <div class="col-md-6 mb-3">
                                <img
                                    class="img-fluid m-1 rounded shadow user-select-none"
                                    style="width:90%;"
                                    src="${data['recipe']['image']}"
                                    alt="${data['recipe']['label']}">
                                    <h3 class="my-3 ">Health Labels</h3>
                                    ${healthLabels}
                            </div>

                            <div class="col-md-6">
                                <h5 class="text-muted m-0 p-0" style="text-transform: capitalize;">Cuisine: ${data['recipe']['cuisineType']}</h5>
                                <h5 class="text-muted m-0 p-0" style="text-transform: capitalize;">Dish Type: ${data['recipe']['dishType']}</h5>
                                <h5 class="text-muted m-0 p-0" style="text-transform: capitalize;">Meal Type: ${data['recipe']['mealType']}</h5>
                                <h5 class="text-muted m-0 p-0" style="text-transform: capitalize;">Calories: ${Math.ceil(data['recipe']['calories'])}</h5>
                                <h3 class="my-3">Recipe:</h3>
                                <ul>
                                    ${ingredients}
                                </ul>
                                <h5 class="text-muted m-0 p-0" style="text-transform: capitalize;">Source: ${data['recipe']['source']}</h5>
                                <h5 class="text-muted m-0 p-0" style="text-transform: capitalize;">Reference Links:<a href="${data['recipe']['url']}" target="_blank">${data['recipe']['url']}</a></h5>
                        </div>
        `;
        recipeSearchedResultParent.append(innerHtmlData);
        getOtherRecipes(data['recipe']['cuisineType'][0]);

}
const getOtherRecipes = function(cuisineType) {
    ajaxMethodForRecipeSearch(allRecipesAPiUrl, cuisineType, URL_TYPE_OTHER_RECIPES);
};
const onSuccessOfAllRecipes = function(data) {
    let recipesSearchedResultsParent = $(".recipe-search-result");
    let innerHtmlData;
    let searchResult;
    if(data['count'] <= 0) {
        recipesSearchedResultsParent.html(`
            <h2>No Results Found</h2>
        `);
        return;
    }
    for(let i=0; i<data.hits.length; i++) {
        let recipeId = data.hits[i]['recipe']['uri'].substring(data.hits[i]['recipe']['uri'].indexOf('#') + 1);
        innerHtmlData = `
                <div class="col-md-3 mb-4 mt-4">
                    <div class="card shadow-lg border-0 rounded ">
                        <div class="card-body p-0">
                            <img
                                src="${data.hits[i]['recipe']['image']}"
                                alt="${data.hits[i]['recipe']['label']}"
                                class="w-100 card-img-top recipe-search-result-img">
                            <div class="p-3">
                                <p class="mb-2 mt-2 text-dark font-weight-bolder">
                                    <strong>${truncate(data.hits[i]['recipe']['label'], 25)}</strong>
                                </p>
                                <p class="text-muted m-0 p-0">${truncate('Cuisine:' + data.hits[i]['recipe']['cuisineType'], 25)}</p>
                                <p class="text-muted m-0 p-0">${truncate('Dish Type:' + data.hits[i]['recipe']['dishType'], 25)}</p>
                                <p class="text-muted m-0 p-0">Calories: ${Math.ceil(data.hits[i]['recipe']['calories'])}</p>
                                <a class="btn btn-success" href="/recipes/${recipeId}" target="_blank" style="width:100%;">Read More</a>
                            </div>
                      </div>
                </div>
            </div>
        `;
        searchResult = '<h2>Showing search results ' + '1' + ' to '  + data['to'] + ' of ' + data['count'] + '</h2>'
        recipesSearchedResultsParent.append(innerHtmlData);
    }
    $(".search-results-count").html(searchResult);
    $(".recipe-load-more").html('Load More');
    $(".recipe-load-more").attr('disabled', false);;
    if(data['count'] > data['to']) {
        $(".recipe-load-more").show();
        nextAPiUrl = data['_links']['next']["href"];
    } else {
        $(".recipe-load-more").hide();
        nextAPiUrl = "";
    }
}

const onSuccessOfOtherRecipes = function(data) {
    let otherRecipes = $(".other-recipes");
    for(let i=0; i<4; i++) {
        let recipeId = data.hits[i]['recipe']['uri'].substring(data.hits[i]['recipe']['uri'].indexOf('#') + 1);
        let innerHtmlData = `
                <div class="col-md-3 mb-4 mb-lg-0">
                    <div class="card shadow-lg border-0 rounded">
                        <div class="card-body p-0">
                            <img
                                src="${data.hits[i]['recipe']['image']}"
                                alt="${data.hits[i]['recipe']['label']}"
                                class="w-100 card-img-top recipe-search-result-img">
                            <div class="p-3">
                                <p class="mb-2 mt-2 text-dark font-weight-bolder">
                                    <strong>${truncate(data.hits[i]['recipe']['label'], 20)}</strong>
                                </p>
                                <p class="text-muted m-0 p-0">${truncate('Cuisine:' + data.hits[i]['recipe']['cuisineType'], 20)}</p>
                                <p class="text-muted m-0 p-0">${truncate('Dish Type:' + data.hits[i]['recipe']['dishType'], 20)}</p>
                                <p class="text-muted m-0 p-0">Calories: ${Math.ceil(data.hits[i]['recipe']['calories'])}</p>
                                <a class="btn btn-success" href="/recipes/${recipeId}" target="_blank" style="width:100%;">Read More</a>
                            </div>
                      </div>
                </div>
            </div>
        `;
        otherRecipes.append(innerHtmlData);
    }
}


const ajaxMethodForRecipeSearch = function (route, searchData, isUrlType){
    let params;
    if(isUrlType == URL_TYPE_ALL_RECIPES) {
        params = {
            app_id : app_id_value,
            app_key: app_key_value,
            q : searchData
        }
    } else if(isUrlType == URL_TYPE_RECIPE) {
        params = {
            app_id : app_id_value,
            app_key: app_key_value,
        }
    } else {
        params = {
            app_id : app_id_value,
            app_key: app_key_value,
            cuisineType : searchData
        }
    }

    $.ajax(
        {
            type: 'GET',
            url: route,
            data: params,
            beforeSend: function(xhr){xhr.setRequestHeader('Access-Control-Allow-Origin', '*');},
            success: function (data){
                if(isUrlType == URL_TYPE_ALL_RECIPES) {
                    onSuccessOfAllRecipes(data);
                } else if(isUrlType == URL_TYPE_RECIPE) {
                    onSuccessOfRecipe(data);
                } else {
                    onSuccessOfOtherRecipes(data);
                }
            },
            error: function (e){
                popUpMessage('bg-danger', " Some error occured! Please try again later.");
            }
        }
    );
}


function truncate(str, n){
    return (str.length > n) ? str.substr(0, n-1) + '&hellip;' : str;
};
