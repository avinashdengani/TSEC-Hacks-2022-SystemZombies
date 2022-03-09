<script src="{{ asset('js/api/github.js') }}"></script>
<script>
    @auth
        $('.img-profile').attr('src', getAvatar('{{auth()->user()->github_username}}'));
    @endauth
</script>
