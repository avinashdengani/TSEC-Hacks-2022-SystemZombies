<script src="{{ asset('js/api/github.js') }}"></script>
<script>
    $('#user-img').attr('src', getAvatar('{{$user->github_username}}'));
</script>
