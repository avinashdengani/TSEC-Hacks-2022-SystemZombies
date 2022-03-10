@extends('layouts.dashboard.dashboard')

@section('title', 'Create a form | CodeMate')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <div class="card shadow p-3">
                    <div class="card-body">
                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="d-flex flex-row justify-content-evenly" id="create-user-form">
                            @csrf
                            <div class="d-flex register-as justify-content-center login-side-image bg-blue">

                                <img src="{{ asset('images/blog.png') }}" class="rounded" width="100%" alt="CodeMate Register">

                            </div>
                            <div class="col-md-6 content p-5">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input
                                            id="title"
                                            type="text"
                                            class="form-control @error('title') is-invalid @enderror user-select-none mb-3"
                                            name="title"
                                            placeholder="Enter title"
                                            value="{{ old('title') }}"
                                            autocomplete="title"
                                            autofocus>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input
                                            id="excerpt"
                                            type="text"
                                            class="form-control @error('excerpt') is-invalid @enderror user-select-none mb-3"
                                            name="excerpt"
                                            placeholder="Enter excerpt"
                                            value="{{ old('excerpt') }}"
                                            autocomplete="excerpt"
                                            autofocus>

                                        @error('excerpt')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input
                                            id="content"
                                            type="text"
                                            class="form-control @error('content') is-invalid @enderror user-select-none mb-3"
                                            name="content"
                                            placeholder="Enter content"
                                            value="{{ old('content') }}"
                                            autocomplete="content"
                                            autofocus>

                                        @error('content')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label for="category_id"></i>Domain</label>
                                        <select name="category_id" id="category_id" class="form-control select2">
                                            <option></option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id}}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <div class="col-md-12">
                                        <label for="tag"></i>Tags</label>
                                        <select name="tags[]" id="tags" class="form-control select2" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id}}">{{ $tag->name }}</option>
                                        @endforeach
                                        </select>

                                        @error('tag')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <div class="col-md-12">
                                        <input
                                            id="image"
                                            type="file"
                                            class="form-control @error('image') is-invalid @enderror user-select-none mb-3"
                                            name="image"
                                            placeholder="Select your image"
                                            value="{{ old('image') }}"
                                            autocomplete="image"
                                            autofocus>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 d-flex justify-content-between m-0 mt-2">
                                        <button type="submit" class="btn btn-success">
                                            Submit
                                        </button>
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

            $('.select2').select2({
                placeholder: 'Select an option',
                id: '-1',
            });

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
                    job_title: {
                        required: true,
                    },
                    headline: {
                        required: true,
                    },
                    phone: {
                        required: true,
                        numeric: true,
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
