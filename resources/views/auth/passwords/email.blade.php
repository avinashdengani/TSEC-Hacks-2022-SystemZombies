@extends('layouts.app')

@section('title', 'Forgot Password | CodeMate')

<style>
.cardbody{
    height: 33rem
}
</style>

@section('content')
    <div class="container">
        <div class="row justify-content-center ml-0 mr-0 pl-0 pr-0">
            <div class="col-md-12">
                <div class="card d-flex flex-row shadow p-4 justify-content-evenly">
                    <div class="d-flex flex-column justify-content-center login-side-image bg-blue">
                        <img src="{{ asset('images/logo/logo_with_title.png') }}" class="rounded " alt="image" width="350px">
                    </div>
                    <div class="col-md-6 login-body">
                        <div class="card-body">

                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}" id="forgot-password-form">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-md-12 m-0 text-center ml-3 p-0">
                                            <i class="far fa-user-circle text-success mb-4" style="font-size: 150px;"></i>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="">
                                        <input
                                                id="email"
                                                type="email"
                                                class="form-control @error('email') is-invalid @enderror user-select-none mb-3"
                                                name="email"
                                                placeholder="Enter your email"
                                                value="{{ old('email') }}"
                                                autocomplete="email"
                                                autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="d-flex align-content-center">
                                        <button type="submit" class="btn btn-success" style="margin: 0 auto;">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function mediaWatcherFunction(mediaWatcher) {
            if (mediaWatcher.matches) {
                $(".card").addClass("p-0");
            } else {
                $(".card").removeClass("p-0");
            }
        }
        var mediaWatcher = window.matchMedia("(max-width: 992px)");
        mediaWatcherFunction(mediaWatcher);
        mediaWatcher.addListener(mediaWatcherFunction);
    </script>

    <script>
        $("#forgot-password-form").validate({
            rules:
                {
                    email: {
                        required: true,
                        email: true
                    },
                },

            errorElement: 'p',
            errorPlacement: function(error, element) {
                if (error) {
                    error.insertAfter(element);
                    error.addClass('text-danger');
                }
            }
        });
    </script>
@endsection
