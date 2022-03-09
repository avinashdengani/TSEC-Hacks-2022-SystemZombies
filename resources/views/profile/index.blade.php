@extends('layouts.dashboard.dashboard')

@section('title')
    Profile | CodeMate
@endsection

@section('styles')
    <style>
        body {
            background: #eee;
        }

        .border-bottom {
            border-bottom: 2px solid #eee
        }

        .font-weight-300{
            font-weight: 300;
        }

        .font-weight-500{
            font-weight: 500;
        }

        .font-weight-600{
            font-weight: 600;
        }
    </style>
@endsection

@section('content')
        {{-- Profile details --}}

        <div class="profile">
            
        <div>
@endsection

@section('scripts')
    <script>
        $('.profile').append(`
            <div class="container mt-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <div class="card p-3 py-4">
                        <div class="text-center"> 
                        <img id="profile-img" src="" width="100" class="rounded-circle img-profile"> </div>
                        <div class="text-center mt-3">
                            <h5 class="mt-2 mb-0">{{ $user->name }}</h5> <span>{{ $user->job_title }}</span>
                            <div class="px-4 mt-1">
                                <p class="fonts">
                                    {{ $user->headline }}
                                </p>
                                <div class="container">
                                    @foreach ($user->languages as $language)
                                        <span class="badge bg-secondary text-white">{{ $language->name }}</span>    
                                    @endforeach
                                </div>
                            </div>

                            <div class="p-3">
                                <button class="btn btn-outline-primary px-4">Message</button>
                                <button class="btn btn-primary px-4 ms-3">Contact</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Projects --}}
        <div class="container mt-5">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-9">
                <div class="card p-3 projects">
                    <h2>Projects</h2>
                </div>
            </div>
        </div>
        </div>
        `);

        let repos = getRepos('{{$user->github_username}}').reverse();
        repos.forEach(repo => {
            let link = repo['html_url'];
            $(".projects").append(`
                <div class="list border-bottom p-3 d-flex justify-content-between">
                    <div class="ml-3 font-weight-600"><h4>${repo.name}</h4></div>
                    <a href = "${link}" class="text-dark">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    
                </div>
            `);
        });

        $('#profile-img').attr('src', getAvatar('{{$user->github_username}}'));
    </script>
@endsection
