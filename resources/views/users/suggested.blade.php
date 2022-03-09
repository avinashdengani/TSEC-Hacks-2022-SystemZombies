@extends('layouts.dashboard.dashboard')

@section('title', "Suggested Users | CodeMate")

@section('styles')
    <style>
        .card-img-top {
            width: 20%;
            height: 20%;
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
            <h3 class="card-title">Suggested Users</h3>
            <div class="container">
                <div id="users">

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

    let langUsers = getUserSuggestionsAccordingToLanguages(`{{ $user->github_username }}`, 1, 20);
    let commitLangUsers = getUserSuggestionsAccordingToCommitStyle(langUsers);


    
    // console.log(langUsers);
    // console.log(commitLangUsers);

    console.log(getUser(langUsers[0]));
    console.log(ajaxFunction(base_url + `users/${langUsers[0]}`));

    if (commitLangUsers && commitLangUsers.length > 0) {
        $('#users').append(`    
            <h4>Common Commiting Style</h4>
        `);
        commitLangUsers.forEach(commitLangUser => {
            let userImage = getAvatar(commitLangUser);
            $('#users').append(`

            <div class="card">
                <img class="card-img-top" src="${userImage}" alt="">
                <div class="card-body">
                    <h4 class="card-title">
                        ${commitLangUser}
                    </h4>
                </div>
            </div>

            `);
        });
    }
    if (langUsers && langUsers.length > 0) {
        $('#users').append(`    
            <h5>Common Language Users</h5>
        `);
        langUsers.forEach(langUser => {
            let userImage = getAvatar(langUser);
            $('#users').append(`

            <div class="card m-2">
                <img class="card-img-top" src="${userImage}" alt="">
                <div class="card-body  d-flex justify-content-between">
                    <h6 class="card-title">
                        ${langUser}
                    </h6>
                    <a href="https://github.com/${langUser}" class="text-dark p-1">
                            <i class="fab fa-github fa-lg"></i>
                    </a>
                    <div class="collabrate">
                        <button type="button" name="btn-collabrate" id="btn-collabrate" class="btn btn-success btn-lg btn-block">Collabrate</button>                           
                    </div>
                </div>
            </div>

            `);
        });
    }
</script>

@endsection


{{-- @section()
<div class="card">
    <div class="card-body">

        <div class="card">
            <img class="card-img-top" src="userimage" alt="">
            <div class="card-body">
                <h4 class="card-title">

                </h4>
            </div>
        </div>

        <h4 class="card-title">

        </h4>
        <p class="card-text">

        </p>
    </div>
</div>
@endsection --}}