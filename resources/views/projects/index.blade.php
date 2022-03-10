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

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="">
          <div class="card-body">
            <h3 class="card-title">Projects</h3>
            <div class="container">
                <div id="" class="d-flex">
                    <div class="row" id="projects">
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection

@section('scripts')

    <script>

        let repos = getRepos('{{$user->github_username}}').reverse();
        let languages;
        repos.forEach(repo => {
            languages = getLanguages('{{$user->github_username}}', repo.name);

            languagesUsed = "";
            languages.forEach(language => {
                languagesUsed += `<span class="badge bg-secondary text-white m-1">${language}</span>`;
            });
            $("#projects").append(`
                <div class="card col-md-3">
                    <div class="">
                        <div class="text-center mt-3">
                            <h3 class="mt-2 mb-0">${repo.name}</h3>
                            <div class="px-4 mt-1">
                                <strong>Your last Commit was: </strong>
                                <p class="fonts">${getLatestCommitMessage('{{$user->github_username}}', repo.name)}
                                </p>
                                <div class="container"> Teck Stacks Used
                                    ${languagesUsed}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `);
        });

    </script>
@endsection
