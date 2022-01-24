@extends('layouts.app')

@section('title', 'Recipe | Foodie')

@section('styles')
<style>
    .show-section{
        margin: 100px;
    }
@media only screen and (max-width: 768px) {
  /* For mobile phones: */
    .show-section{
        margin: 40px;
    }
}
@media only screen and (min-width: 600px) {
  /* For tablets: */
    .show-section{
        margin: 60px;
    }
}


    </style>
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">
        <div class="show-section">
            <!-- Portfolio Item Row -->
            <div class="row recipe-searched-results">
                <!-- Portfolio Item Heading -->
                <div class="text-center">
                    <h1 class="mb-4">{{$recipe->name}}</h1>
                </div>
                <div class="col-md-6 mb-3">
                    <img
                        class="img-fluid m-1 rounded shadow user-select-none"
                        style="width:90%;"
                        src="{{ asset($recipe->image_path) }}"
                        alt="{{$recipe->name}}">
                        <h3 class="my-3 ">Health Labels</h3>
                        @foreach ($recipe->healthlabels as $label)
                            <span class="badge bg-success p-1 mt-1 user-select-none">{{$label->name }}<i class="fas fa-utensils"></i></span>
                        @endforeach
                </div>

                <div class="col-md-6">
                    <h4 class="text-muted m-0">Cuisine: {{$recipe->cuisineType}}</h4>
                    <h4 class="text-muted m-0">Dish Type: {{$recipe->dishType}}</h4>
                    <h4 class="text-muted m-0">Meal Type: {{$recipe->mealType}}</h4>
                    <h4 class="text-muted m-0">Posted {{$recipe->created_date}}</h4>
                    <h3 class="my-3">Recipe:</h3>
                    <ul class="h5">
                        {{$recipe->recipe}}
                    </ul>
                </div>
            </div>
            <!-- /.row -->
        </div>
        {{-- End show-section --}}

        <div class="d-flex flex-row">
            <div class="col-md-9">
                <div class="d-flex flex-column">
                    <div class="heading">
                        <h2 class="text-black font-weight-bold text-capitalize mt-3">Comments</h2>
                    </div>
                    <div class="card p-2 m-2 shadow">
                        <div class="card-body">
                            <div class="comments d-flex flex-column"></div>
                            <div class="form-group">
                                <strong class="sub-heading" style="font-size: 25px;">Enter Comment</strong>
                                <textarea
                                        name="description"
                                        id="description"
                                        rows="3"
                                        class="form-control  @error('description') is-invalid @enderror" >{{old('description')}}</textarea>
                                        <div class="text-danger comment_error"></div>
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-success" onclick="commentOnBlog({{$recipe->id}})" >Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
    <!-- container -->
@endsection








@section('scripts')

    <script>
        let csrf_token = '{{ csrf_token() }}';
        ajaxToAppendAllComments("{{url('blogComments')}}" + '/' + '{{$recipe->id}}' + '/ajax', {_token: csrf_token});
        function commentOnBlog(id) {
            $(".comment_error").html('');
            let route = "{{url('blogs')}}" + '/' + id + '/comment';
            let successMessage = "Comment added successfully!";
            let description = $("#description").val();
            let formData = {id:id, description:description, _token: csrf_token};
            ajaxForCommentOnBlog(route, successMessage, formData);
        }

        function ajaxForCommentOnBlog(route, successMessage, formData) {
            $.ajax({
                type: 'POST',
                url: route,
                data: formData,
                success: function (data){
                    popUpMessage('bg-success', successMessage);
                    $(".comments").html('');
                    $(".comment_error").html('');
                    $("#description").val('');
                    ajaxToAppendAllComments("{{url('blogComments')}}" + '/' + formData.id + '/ajax', formData);
                },
                error: function (e){
                    if(e.responseJSON.errors['description'] !== undefined) {
                        $(".comment_error").html(e.responseJSON.errors['description']);
                    } else {
                        popUpMessage('bg-danger', " Some error occured! Please try again later.");
                    }
                }
            });
        }
        function ajaxToAppendAllComments(route, formData) {
            $.ajax({
                type: 'POST',
                url: route,
                data: formData,
                success: function (data){
                    for(let i=0; i<data.comments.length; i++) {
                        console.log(data.comments[i]);
                        $(".comments").append(`
                            <div class="comment d-flex flex-column border p-2">
                                <p class="text-secondary">${data.comments[i]['description']}</p>
                                <p class="text-secondary">${moment(data.comments[i]['created_at']).fromNow()} by <strong class="text-black">{{auth()->user()->name}}</strong> <img src="{{auth()->user()->image}}" alt=""></p>
                            </div>
                        `);
                    }
                },
                error: function (e){
                    popUpMessage('bg-danger', " Some error occured! Please try again later.");
                }
            });
        }
    </script>
@endsection
