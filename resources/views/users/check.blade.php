@if (session()->has('user_id'))
    @include('users.home.sideNav')
@else
    {{session(['sessionExistError'=>'Please login first'])}}
    <script>
        window.location= "/login";
    </script>
@endif