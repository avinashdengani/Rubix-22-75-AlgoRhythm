@extends('layouts.app')

@section('title', 'User Registeration | Foodie')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <div class="card shadow p-3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="d-flex flex-row justify-content-evenly" id="create-user-form">
                            @csrf
                            <div
                                class="d-flex register-as justify-content-center login-side-image">

                                <img src="{{ asset('images/auth/auth_img.jpg') }}" class="shadow rounded" width="300px" alt="Image Art">

                            </div>
                            <div class="col-md-6 content p-5">
                                <div class="form-group row">

                                    <div class="col-md-12">

                                        <h2 class="mb-4 font-weight-bolder d-flex justify-content-center">Register</h2>

                                        <input
                                            id="name"
                                            type="text"
                                            class="form-control @error('name') is-invalid @enderror user-select-none mb-3"
                                            name="name"
                                            placeholder="Enter you name"
                                            value="{{ old('name') }}"
                                            autocomplete="name"
                                            autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input
                                                id="email"
                                                type="email"
                                                class="form-control @error('email') is-invalid @enderror user-select-none mb-3"
                                                name="email"
                                                placeholder="Enter you email"
                                                value="{{ old('email') }}"
                                                autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input
                                                id="password"
                                                type="password"
                                                class="form-control @error('password') is-invalid @enderror user-select-none mb-3"
                                                name="password"
                                                placeholder="Enter you password"
                                                autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <input
                                                id="password-confirm"
                                                type="password"
                                                class="form-control user-select-none mb-3"
                                                placeholder="Confirm password"
                                                name="password_confirmation"
                                                autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 d-flex justify-content-between m-0 ">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Register') }}
                                        </button>

                                        <p class="d-inline m-auto user-select-none">Already have an account? <a class="nav-link m-0 p-0 d-inline" href="{{ route('login') }}">Login</a></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
            $.validator.addMethod('myPasswordPattern', function(value, element) {
            return this.optional(element) || (value.match(/[a-z]/) && value.match(/[0-9]/ && value.match(/[A-Z]/)));
        },
        'Password must contain at least one numeric, one capital and one small character.');
        $("#create-user-form").validate({
            rules:
                {
                    name: {
                        required: true,
                        minlength: 3
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8,
                        maxlength: 16,
                        myPasswordPattern: true
                    },
                    password_confirmation: {
                        required: true,
                        minlength: 8,
                        maxlength: 16,
                        myPasswordPattern: true,
                        equalTo: "#password"
                    }
                },
            errorElement: 'p',
            errorPlacement: function(error, element) {
                let verification_id = element[0].attributes[2];
                verification_id = verification_id.value.localeCompare("verification_id");

                let branch = element[0].attributes[1].value.localeCompare("branch");
                if(verification_id == 0) {
                    element = $(".verification_id_class");
                    element.removeClass("mb-3");
                    error.insertAfter(element);
                    error.addClass('text-danger');
                } else if(branch == 0) {
                    error.insertAfter(element);
                    error.addClass('text-danger m-0 ml-3');
                    error.attr('id', 'branch-error');
                }
                else{
                    error.insertAfter(element);
                    error.addClass('text-danger m-0');
                }
            }
        });

        let student_role = $("#student_role");
        let teacher_role = $("#teacher_role");

        student_role.click(function() {
            $(".branch").removeClass('d-none');
            $(".branch").addClass('d-block');
        });
        teacher_role.click(function() {
            $(".branch").removeClass('d-block');
            $(".branch").addClass('d-none');
            $("#branch-error").hide();
        });

    </script>

<script>
    function mediaWatcherFunction(mediaWatcher) {
        if (mediaWatcher.matches) {
            $("#create-user-form").addClass("flex-column");
            $(".my-card").addClass("p-0");
            $(".register-as").addClass("p-3");
            $(".roles").addClass("flex-column-reverse m-auto");
            $(".content").addClass("p-3");
        } else {
            $("#create-user-form").removeClass("flex-column");
            $(".my-card").removeClass("p-0");
            $(".register-as").removeClass("p-3");
            $(".roles").removeClass("flex-column-reverse m-auto");
            $(".content").removeClass("p-3");
        }
    }
    var mediaWatcher = window.matchMedia("(max-width: 768px)");
    mediaWatcherFunction(mediaWatcher);
    mediaWatcher.addListener(mediaWatcherFunction);
</script>
<script>
    function mediaWatcherFunction(mediaWatcher) {
        if (mediaWatcher.matches) {
            $("#create-user-form").addClass("flex-column");
            $(".my-card").addClass("p-0");
            $(".register-as").addClass("p-3");
            $(".roles").addClass("flex-column-reverse m-auto");
            $(".content").addClass("p-3");
        } else {
            $("#create-user-form").removeClass("flex-column");
            $(".my-card").removeClass("p-0");
            $(".register-as").removeClass("p-3");
            $(".roles").removeClass("flex-column-reverse m-auto");
            $(".content").removeClass("p-3");
        }
    }
    var mediaWatcher = window.matchMedia("(max-width: 768px)");
    mediaWatcherFunction(mediaWatcher);
    mediaWatcher.addListener(mediaWatcherFunction);
</script>

<script>
    function mediaWatcher2Function(mediaWatcher) {
        if (mediaWatcher.matches) {
            $(".my-card").addClass("p-0");
            $(".register-as").addClass("p-3");
            $(".register-as").removeClass("col-md-6");
            $(".roles").addClass("flex-column-reverse m-auto");
        } else {
            $(".my-card").removeClass("p-0");
            $(".register-as").addClass("col-md-6");
            $(".register-as").removeClass("p-3");
            $(".roles").removeClass("flex-column-reverse m-auto");
        }
    }
    var mediaWatcher2 = window.matchMedia("(max-width: 992px)");
    mediaWatcher2Function(mediaWatcher2);
    mediaWatcher2.addListener(mediaWatcher2Function);
</script>
@endsection
