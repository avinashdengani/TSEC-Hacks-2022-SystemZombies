@extends('layouts.dashboard.dashboard')

@section('title', "Suggested Projects | CodeMate")

@section('styles')

    <style>
        .card-img-top {
            width: 10%;
            height: 10%;
            object-fit: cover;
        }
    </style>

@endsection

@section('content')

<div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">Suggested Projects</h3>
            <div class="container">
                <div id="projects">

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

    let projects = getSuggestedProjects(`{{ $user->github_username }}`, 1, 10);

    console.log(projects['items']);

    projects['items'].forEach(project => {
        $('#projects').append(`

        <div class="card">
            <div class="card-body">

                <div class="card m-2">

                    <div class="card-body d-flex justify-content-between">
                            <img class="card-img-top" src="${project['owner']['avatar_url']}" alt="">
                            <h5>
                                <a href="${project['owner']['html_url']}">
                                ${project['owner']['login']} <i class="text-dark fab fa-github fa-lg"></i>
                                </a>
                            </h5>
                        <div class="collaborate">
                        <button type="button" name="btn-collaborate" id="btn-collaborate" class="btn btn-success btn-lg btn-block">Collaborate</button>
                    </div>
                    </div>
                </div>

                <h4 class="card-title">
                    <strong> Project Name </strong> : <a href="${project['html_url']}">${project['name']}</a>
                </h4>
            </div>
        </div>

        `);
    });

</script>

@endsection
