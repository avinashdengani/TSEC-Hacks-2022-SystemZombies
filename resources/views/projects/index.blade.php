@extends('layouts.dashboard.dashboard')

@section('title', "Projects | CodeMate")

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
        .card:before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: #E1BEE7;
            transform: scaleY(1);
            transition: all 0.5s;
            transform-origin: bottom
        }

        .card:after {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: #8E24AA;
            transform: scaleY(0);
            transition: all 0.5s;
            transform-origin: bottom
        }
    </style>
@endsection

@section('content')

<div class="projects">

</div>

@endsection

@section('scripts')

    @include('layouts.dashboard.partials._user-img')

    <script>
        let repos = getRepos('{{$user->github_username}}').reverse();

        let languages;
        repos.forEach(repo => {

            languages = Object.keys(getLanguages('{{$user->github_username}}', repo.name));
            let languagesUsed = '';

            // console.log(languages);

            for(let i=0; i<languages.length; i++) {
                languagesUsed += `<span class="badge bg-secondary text-white">${languages[i]}</span>`;
                // console.log(languages[i]);
            }

            $(".projects").append(`
                <div class="row d-flex">
                    <div class="col-md-6">
                        <div class="card p-3 py-4">
                            <div class="text-center mt-3">
                                <h5 class="mt-2 mb-0">${repo.name}</h5>
                                <div class="px-4 mt-1">
                                    <strong>Your last Commit was: </strong>
                                    <p class="fonts">${getCommitMessages('{{$user->github_username}}', repo.name)[0]}
                                    </p>
                                    <div class="container"> Teck Stacks Used
                                        ${languagesUsed}
                                    </div>
                                    created_at:${moment(repo.created_at, "YYYY-MM-DD").fromNow()}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });

    </script>
@endsection
