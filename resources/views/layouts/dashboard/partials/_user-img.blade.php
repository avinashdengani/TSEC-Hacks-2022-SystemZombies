<script src="{{ asset('js/api/github.js') }}"></script>
<script>
    $('.img-profile').attr('src', getAvatar('{{$user->github_username}}'))
</script>
